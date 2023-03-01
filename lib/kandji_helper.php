<?php

namespace munkireport\module\kandji;

use Kandji_model;

class Kandji_helper
{
    /**
     *
     * @param object Kandji machine instance
     * @author jc0b
     **/
    public function pull_kandji_data($serial_number)
    {
        // Error message
        $error = '';

        // Trim off any slashes on the right
        $kandji_api_endpoint = rtrim(conf('kandji_api_endpoint'), '/');

        // Get computer data from Kandji
        $url = "{$kandji_api_endpoint}/api/v1/devices/?serial_number={$Kandji_machine->serial_number}";
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

        return $json;
    }

    /**
     * Retrieve url
     *
     * @return JSON object if successful, FALSE if failed
     * @author n8felton, tweaked for Jamf by Tuxudo, then tweaked for Kandji by jc0b
     *
     **/
    public function send_kandji_query($url)
    {

        $kandji_api_key = conf('kandji_api_key');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10); // Timeout of 10 seconds
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
}