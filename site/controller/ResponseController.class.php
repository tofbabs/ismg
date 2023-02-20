<?php

/**
 * Send SMS Controller
 * Manages and routes all outgoing SMS from application
 */

class ResponseController extends Controller {
	
	function __construct() {
		$this->template = new Template();
	}
    
    function index(){
        
        // Check if smsc is set else use default set for Profile
        $shortcode = isset($_GET['shortcode']) ? $_GET['shortcode'] : exit("Error! Incomplete Parameter: Shortcode not Present");
        $msisdn = isset($_GET['msisdn']) ? $_GET['msisdn'] : exit("Error! Incomplete Parameter: MSISDN");
        $timestamp = isset($_GET['timestamp']) ? $_GET['timestamp'] : '';
        $msg = isset($_GET['msg']) ? $_GET['msg'] : '';
        $network = isset($_GET['network']) ? $_GET['network'] : '';

        $r = new ReceivedSms();
        $r->setShortcode($shortcode);
        $r->setMsisdn($msisdn);
        // $r->setTimestamp($timestamp);
        $r->setMsg($msg);

        $r->save();

        $param = array('shortcode' => $shortcode, 'MSSID' => $msisdn, 'message' => $msg, 'time' => $timestamp, 'network'=>$network );
        $param = http_build_query($param);
        $this->route($param);
    }
    
    static function get_http_response_code($url) {

        $headers = get_headers($url);
        return substr($headers[0], 9, 3);

    }

    function route($param){
        // This routes to Internal Applications 
        
// 		echo $param;
        //ROUTE_URL. "?" . $param
        // Get Header from Mobilotto Game Engine
        $resp = self::get_http_response_code( ROUTE_URL. "?" . $param );
        echo $resp;
        
        // Is Server Available
        if( $resp != "200"){
           
           self::failedLog($param);

        }
        
    }
    
    static function failedLog($data){
		$my_file = UPLOAD_PATH . 'failed.csv';
		if(!isset($handle)){
			$handle = fopen($my_file, 'a') or die('Cannot open file:  '.$my_file);
		}
		
		$data = $data . "\n";
		// echo "DEBUG: Logging Billing Data $data";
		fwrite($handle, $data);
	}

    
   
}

?>