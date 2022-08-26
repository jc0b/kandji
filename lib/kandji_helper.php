<?php

namespace munkireport\module\kandji;

class Kandji_helper
{
    /**
     *
     * @param object Kandji model instance
     * @author jc0b
     **/
    public function pull_kandji_data(&$Kandji_model)
    {
        // Error message
        $error = '';

        // Trim off any slashes on the right
        $kandji_api_endpoint = rtrim(conf('kandji_api_endpoint'), '/');

        // Get computer data from Kandji
        $url = "{$kandji_api_endpoint}/api/v1/devices/?serial_number={$Kandji_model->serial_number}";
        $kandji_computer_result = $this->send_kandji_query($url);

        if(! $kandji_computer_result){
            print_r("No data received from Kandji");
            exit();
        }

        // Process computer data
        $json = json_decode($kandji_computer_result);

        if( ! $json){
            $error = 'Machine not found in Kandji!';
            return $error;
        }

        // Transpose Jamf API output into Jamf model
        // General section 
        $Kandji_model->kandji_id = $json[0]->device_id;
        $Kandji_model->name = $json[0]->device_name;
        $Kandji_model->kandji_agent_version = $json[0]->agent_version;
        $Kandji_model->asset_tag = $json[0]->asset_tag;
        $Kandji_model->blueprint_id = $json[0]->blueprint_id;
        $Kandji_model->blueprint_name = $json[0]->blueprint_name;
        $Kandji_model->last_check_in = convert_time_to_epoch($json[0]->last_check_in);
        $Kandji_model->last_enrollment = convert_time_to_epoch($json[0]->last_enrollment);
        $Kandji_model->first_enrollment = convert_time_to_epoch($json[0]->first_enrollment);

        // Location section
        $Kandji_model->realname = $json[0]->user->name;
        $Kandji_model->email_address = $json[0]->user->email;

        // Save the data, Protecc the data
        $Kandji_model->save();
        $error = 'Kandji data processed';
        return $error;
    }

    /**
     * Retrieve url
     *
     * @return JSON object if successful, FALSE if failed
     * @author n8felton, tweaked for Jamf by Tuxudo
     *
     **/
    public function get_kandji_url($url)
    {

        $kandji_api_key = conf('kandji_api_key')
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10); // Timeout of 10 seconds
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, $jamf_verify_ssl);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $jamf_verify_ssl);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array ('Accept: application/json', 'Authorization: Bearer '.$kandji_api_key));

        $return = curl_exec($ch);
        
        // Check for timeout
        if (curl_errno($ch) && curl_errno($ch) == 28) {
            error_log("MunkiReport:- Kandji server timed out for - ".$url, 0);
            return false;
        } else if (curl_errno($ch)) {
            error_log("MunkiReport:- There was an error getting data from the Kandji server: ".curl_errno($ch)." - ".$url, 0);
            return false;
        }

        return $return;
    }

    /**
     * Retrieve url as XML
     *
     * @return XML object if successful, FALSE if failed
     * @author n8felton, tweaked for Jamf by Tuxudo
     *
     **/
    public function get_jamf_url_xml($url)
    {
        $jamf_verify_ssl = conf('jamf_verify_ssl');
        if(conf('jamf_verify_ssl') == FALSE || $jamf_verify_ssl == "false" || $jamf_verify_ssl == "FALSE" || $jamf_verify_ssl == "0" || $jamf_verify_ssl == 0){
            $jamf_verify_ssl = 0;
        } else {
            $jamf_verify_ssl = 1;
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10); // Timeout of 10 seconds
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, $jamf_verify_ssl);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $jamf_verify_ssl);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array ('Accept: document/xml', 'Authorization: Bearer '.$this->get_jamf_bearer_token()));

        $return = curl_exec($ch);
        
        // Check for timeout
        if (curl_errno($ch) && curl_errno($ch) == 28) {
            error_log("MunkiReport:- Jamf server timed out for - ".$url, 0);
            return false;
        } else if (curl_errno($ch)) {
            error_log("MunkiReport:- There was an error getting data from the Jamf server: ".curl_errno($ch)." - ".$url, 0);
            return false;
        }

        return $return;
    }

    /**
     * Convert Kandji timestamps to epochs
     * 
     * @return Unix epoch
     * @author jc0b
     * 
     **/
    private function convert_time_to_epoch($date)
    {
        $dt = new DateTime($date);
        return $dt->getTimestamp();
    }
}