<?php

/**
 * 	Retry Controller 
 * 	Started by a daily cronjob
 * 	Runs concurrently with ISMG
 */

class RetryController extends Controller {

	function __construct() {
		$this->template = new Template();
	}
    
    function index(){
    
    	$filename = UPLOAD_PATH . "failed.csv";

        // Query Activity table to get All Current Matches
        
        $failed = file($filename);
        
		//Delete Existing failed.csv file 
		unlink($filename);
// 		print_r($failed);
		
		foreach ($failed as $value){
		
			if ($value == '' || $failed == ' ') {
                # code...
            	continue;
        	}
        	echo $value . '</br>';
        	ResponseController::route($value);  
		
		}
    	

    }
   
}

?>