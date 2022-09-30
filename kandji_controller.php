<?php

/**
 * Kandji module class
 *
 * @package munkireport
 * @author jc0b
 **/
class kandji_controller extends Module_controller
{
    public function __construct()
    {
        // No authentication, the client needs to get here
        // Store module path
        $this->module_path = dirname(__FILE__);

        // Add local config
        configAppendFile(__DIR__ . '/config.php');
    }

    public function index()
    {
        echo "You've loaded the Kandji module!";
    }

    // Add the admin page
    public function admin()
    {
        $obj = new View();
        $obj->view('kandji_admin', [], $this->module_path.'/views/');
    }
    
    
    /**
     * Get Kandji version for widget
     *
     * @return void
     * @author tuxudo
     **/
    public function get_kandji_version()
    {
        $sql = "SELECT COUNT(CASE WHEN kandji_agent_version <> '' AND kandji_agent_version IS NOT NULL THEN 1 END) AS count, kandji_agent_version 
                FROM kandji
                LEFT JOIN reportdata USING (serial_number)
                ".get_machine_group_filter()."
                GROUP BY kandji_agent_version
                ORDER BY count DESC";

        $queryobj = new Kandji_model;
        jsonView($queryobj->query($sql));
    }


    /**
     * REST API for retrieving last checkin data for widget
     *
     * @author tuxudo
     **/
     public function get_last_checkin()
     {        
         $currentdate = date_timestamp_get(date_create());
         $week = $currentdate - 604800;
         $month = $currentdate - 2592000;

         $sql = Kandji_model::selectRaw("COUNT( CASE WHEN $month >= last_check_in THEN 1 END) AS red,
                        COUNT( CASE WHEN $week. >= last_check_in AND last_check_in > $month THEN 1 END) AS yellow,
                        COUNT( CASE WHEN last_check_in > $week AND last_check_in > 0 THEN 1 END) AS green
                        FROM kandji
                        LEFT JOIN reportdata USING (serial_number)")
                    ->filter();
                    ->first();
         // $sql = "SELECT COUNT( CASE WHEN ".$month." >= last_check_in THEN 1 END) AS red,
         //                COUNT( CASE WHEN ".$week." >= last_check_in AND last_check_in > ".$month." THEN 1 END) AS yellow,
         //                COUNT( CASE WHEN last_check_in > ".$week." AND last_check_in > 0 THEN 1 END) AS green
         //                FROM kandji
         //                LEFT JOIN reportdata USING (serial_number)
         //                ".get_machine_group_filter();

        $obj = new View();
        $obj->view('json', array('msg' => $sql));
         // $queryobj = new Kandji_model();
         // foreach($queryobj->query($sql)[0] as $label => $value){
         //       $out[] = ['label' => $label, 'count' => $value];
         // }
         // jsonView($out);
     }

    /**
     * Pull in Kandji data for all serial numbers :D
     *
     * @return void
     * @author tuxudo
     **/
    public function pull_all_kandji_data($incoming_serial = '')
    {
        // Check if we are returning a list of all serials or processing a serial
        // Returns either a list of all serial numbers in MunkiReport OR
        // a JSON of what serial number was just ran with the status of the run
        if ( $incoming_serial == ''){
            // Get all the serial numbers in an object
            $machine = new Kandji_model();
            $filter = get_machine_group_filter();

            $sql = "SELECT machine.serial_number
                FROM machine
                LEFT JOIN reportdata USING (serial_number)
                $filter";

            // Loop through each serial number for processing
            $out = array();
            foreach ($machine->query($sql) as $serialobj) {
                $out[] = $serialobj->serial_number;
            }
            jsonView($out);
        } else {

            $kandji = new Kandji_model($incoming_serial);
            $kandji_status = $kandji->run_kandji_stats();

            // Check if machine exists in Kandji
            if ($kandji_status->rs['kandji_id'] == 0 ){
                $out = array("serial"=>$incoming_serial,"status"=>"Machine not found in Kandji!");
            } else {
                $out = array("serial"=>$incoming_serial,"status"=>"Machine processed");
            }
            jsonView($out);
        }
    }

    /**
     * Force data pull from Kandji
     *
     * @return void
     * @author tuxudo
     **/
    public function recheck_kandji($serial = '')
    {
        if (authorized_for_serial($serial)) {
            $kandji = new Kandji_model($serial);
            $kandji->run_kandji_stats();
        }

        redirect("clients/detail/$serial#tab_kandji-tab");
    }

    /**
     * Get Kandji information for serial_number
     *
     * @param string $serial serial number
     **/
    public function get_data($serial_number = '')
    {
        $kandji = new Kandji_model($serial_number);
        jsonView($kandji->rs);
    }
} // End class kandji_module
