<?php

/**
 * Kandji module class
 *
 * @package munkireport
 * @author jc0b
 **/
// use munkireport\module\machine\Machine_model;
// use munkireport\module\kandji\kandji_processor as Kandji_processor;
use munkireport\models\MRModel as Eloquent;

use Illuminate\Support\Facades\DB;


class Temp_machine_model extends Eloquent
{
    protected $table = 'machine';
}

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
     * @author jc0b
     **/
    public function get_kandji_version()
    {
        $kandji_version_data = Kandji_model::selectRaw("COALESCE(SUM(CASE WHEN kandji_agent_version IS NOT NULL THEN 1 END), 0) AS count, kandji_agent_version")->filter()->groupBy('kandji_agent_version')->orderBy('count', 'desc')->get()->toArray();
        $obj = new View();
        $obj->view('json', array('msg' => $kandji_version_data));
    }


    /**
     * REST API for retrieving last checkin data for widget
     *
     * @author jc0b
     **/
     public function get_last_checkin()
     {        
        $currentdate = date_timestamp_get(date_create());
        $week = $currentdate - 604800;
        $month = $currentdate - 2592000;

        $checkin_data = Kandji_model::selectRaw("COALESCE(SUM(CASE WHEN last_check_in <= $month THEN 1 END), 0) AS red, 
            COALESCE(SUM(CASE WHEN last_check_in <= $week AND last_check_in > $month THEN 1 END), 0) AS yellow, 
            COALESCE(SUM(CASE WHEN last_check_in > $week AND last_check_in > 0 THEN 1 END), 0) AS green")
        ->filter()
        ->first()
        ->toLabelCount();

        $obj = new View();
        $obj->view('json', array('msg' => $checkin_data));
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
            // $machine = new Kandji_model();
            // $filter = get_machine_group_filter();

            // $machinedata = Machine_model::selectRaw("serial_number")->filter()->get()->toArray();

            $machinedata = Temp_machine_model::selectRaw("serial_number")->filter()->get()->toArray();
            echo $machinedata2;
            // $sql = "SELECT machine.serial_number
            //     FROM machine
            //     LEFT JOIN reportdata USING (serial_number)
            //     $filter";

            // Loop through each serial number for processing
            $out = array();
            foreach ($machinedata as $serialobj) {
                $out[] = $serialobj->serial_number;
            }
            $obj = new View();
            $obj->view('json', array('msg' => $machinedata));
        } else {

            $kandji = new Kandji_model();
            $kandji->serial_number = $incoming_serial;
            $kandji->kandji_id = 0;
            $kandji_status = $this->run_kandji_stats($kandji);

            // Check if machine exists in Kandji
            if ($kandji->kandji_id == 0 ){
                $out = array("serial"=>$incoming_serial,"status"=>"Machine not found in Kandji!");
            } else {
                $out = array("serial"=>$incoming_serial,"status"=>"Machine processed");
            }
            $obj = new View();
            $obj->view('json', array('msg' => $out));
        }
    }

    /**
    * Get Kandji data
    *
    * @return void
    * @author jc0b
    **/
    function run_kandji_stats(&$kandji_model)
    {
        $module_dir = dirname(__FILE__);
        // Check if we should enable Kandji lookup
        if (conf('kandji_enable')) {
            // Load Kandji helper
            require_once($module_dir.'/lib/kandji_helper.php');
            $kandji_helper = new munkireport\module\kandji\kandji_helper;
            $kandji_helper->pull_kandji_data($kandji_model);
            // ^^ Comment and uncomment to turn off and on
        }
         
        return $this;
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
            $kandji = new Kandji_model();
            $kandji->serial_number = $serial;
            $this->run_kandji_stats($kandji);
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
        $machinedata = Kandji_model::select("kandji.*")->where("kandji.serial_number", $serial_number)->filter()->get();
        $obj = new View();
        $obj->view('json', array('msg' => $machinedata[0]));
    }
} // End class kandji_module
