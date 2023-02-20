<?php
/**
 * LogTail  Controller
 */

class LogController extends Controller {
	
	function __construct() {
		$this->template = new Template();
        $this->setVariable('title', substr(get_class(),0,-10));
	}
    
    function index(){

        // $this->setVariable('smscs', $smscs);        
        $this->setView('', 'log');
    }

    function tail(){
        $cmd = "tail -20 " . LOG_PATH;
        exec("$cmd 2>&1", $output);
        foreach($output as $outputline) {
            
            echo ("$outputline \n");
            echo "</br>";
        }
    }
   
}

?>