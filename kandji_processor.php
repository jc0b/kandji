<?php

/**
 * Kandji processor class
 *
 * @package munkireport
 * @author jc0b
 **/

use CFPropertyList\CFPropertyList;
use munkireport\processors\Processor;

class Kandji_processor extends Processor
{
    public function run($plist)
    {   
        if ( ! $plist){
            throw new Exception("Error Processing Request: No property list found", 1);
        }
        configAppendFile(__DIR__ . '/config.php');
        $module_dir = dirname(__FILE__);

        $parser = new CFPropertyList();
        $parser->parse($plist, CFPropertyList::FORMAT_XML);
        $mylist = $parser->toArray();

        // Retrieve Kandji MR record (if existing)
        try {
            $model = Kandji_model::select()
                ->where('serial_number', $this->serial_number)
                ->firstOrFail();
        } catch (\Throwable $th) {
            $model = new Kandji_model();
        }

        $model->fill($mylist);

        // Check if we should enable Kandji lookup
        if (conf('kandji_enable')) {
            // Load Kandji helper
            require_once($module_dir.'/lib/kandji_helper.php');
            $kandji_helper = new munkireport\module\kandji\kandji_helper;
            $json = $kandji_helper->pull_kandji_data($model);

            // Transpose Kandji API output into Kandji model
            // General section 
            $mylist['name'] = $json[0]->device_name;
            $mylist['asset_tag'] = $json[0]->asset_tag;
            $mylist['blueprint_id'] = $json[0]->blueprint_id;
            $mylist['blueprint_name'] = $json[0]->blueprint_name;
            $mylist['last_check_in'] = $kandji_helper->convert_time_to_epoch($json[0]->last_check_in);
            $mylist['last_enrollment'] = $kandji_helper->convert_time_to_epoch($json[0]->last_enrollment);
            $mylist['first_enrollment'] = $kandji_helper->convert_time_to_epoch($json[0]->first_enrollment);

            // Location section
            $mylist['realname'] = $json[0]->user->name;
            $mylist['email_address'] = $json[0]->user->email;

        }

        $model->fill($mylist)->save();        
    }
}