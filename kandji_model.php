<?php

class Kandji_model extends \Model {
    
    protected $error = '';
    protected $module_dir;
    
    public function __construct($serial = '')
    {
        parent::__construct('id', 'kandji'); // Primary key, tablename
        $this->rs['id'] = '';
        $this->rs['serial_number'] = $serial;
        $this->rs['kandji_id'] = 0;
        $this->rs['name'] = '';
        $this->rs['kandji_agent_version'] = '';
        $this->rs['asset_tag'] = '';
        $this->rs['last_check_in'] = 0;
        $this->rs['last_enrollment'] = 0;
        $this->rs['first_enrollment'] = 0;
        $this->rs['blueprint_id'] = '';
        $this->rs['blueprint_name'] = '';
        $this->rs['realname'] = '';
        $this->rs['email_address'] = '';
        

        if ($serial) {
            $this->retrieve_record($serial);
        }
        
        $this->serial_number = $serial;
        
        $this->module_dir = dirname(__FILE__);
        
        // Add local config
        configAppendFile(__DIR__ . '/config.php');
    }

    /**
    * Get Kandji data
    *
    * @return void
    * @author jc0b
    **/
    public function run_kandji_stats()
    {
        // Check if we should enable Kandji lookup
        if (conf('kandji_enable')) {
            // Load Kandji helper
            require_once($this->module_dir.'/lib/kandji_helper.php');
            $kandji_helper = new munkireport\module\kandji\kandji_helper;
            $kandji_helper->pull_kandji_data($this);
            // ^^ Comment and uncomment to turn off and on
        }
         
        return $this;
    }
    
    /**
    * Process method, is called by the client
    *
    * @return void
    * @author jc0b
    **/
    public function process()
    {
        $this->run_kandji_stats();
    }
}
