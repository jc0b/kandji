<?php

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

        $model = Kandji_model::firstOrNew(['serial_number' => $this->serial_number]);

        $model->fill($mylist);

        // Check if we should enable Kandji lookup
        if (conf('kandji_enable')) {
            // Load Kandji helper
            require_once($module_dir.'/lib/kandji_helper.php');
            $kandji_helper = new munkireport\module\kandji\kandji_helper;
            $kandji_helper->pull_kandji_data($model);
            // ^^ Comment and uncomment to turn off and on
        }

        return $this;
    }
}