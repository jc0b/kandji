<?php

use munkireport\processors\Processor;

class Kandji_processor extends Processor
{
    public function run($data)
    {   
        echo $data;
        configAppendFile(__DIR__ . '/config.php');
        $modelData = ['serial_number' => $this->serial_number];
        $module_dir = dirname(__FILE__);
        // Check if we should enable Kandji lookup
        if (conf('kandji_enable')) {
            // Load Kandji helper
            require_once($module_dir.'/lib/kandji_helper.php');
            $kandji_helper = new munkireport\module\kandji\kandji_helper;
            $kandji_helper->pull_kandji_data($modelData);
            // ^^ Comment and uncomment to turn off and on
        }

        return $this;
    }
}