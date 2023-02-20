<?php

/**
 * Report Controller
 * Manages and routes all internal and external API
 */

class ReportController extends Controller {

	function __construct(){
		$this->template = new Template();
	}
    
    function index(){

        // Check if smsc is set else use default set for Profile
        $shortcode = isset($_GET['shortcode']) ? $_GET['shortcode'] : exit("Error! Incomplete Parameter: Shortcode not Present");
        $msisdn = isset($_GET['msisdn']) ? $_GET['msisdn'] : exit("Error! Incomplete Parameter: MSISDN");
        $profile = isset($_GET['profile']) ? $_GET['profile'] : '';
        $status = isset($_GET['status']) ? $_GET['status'] : '';
        $smsc = isset($_GET['smsc']) ? $_GET['smsc'] : '';


        $r = new DLR();
        $r->setShortcode($shortcode);
        $r->setMsisdn($msisdn);
        $r->setProfile($profile);
        $r->setStatus($status);
        $r->setSmsc($smsc);

        $r->save();
    }

    function api($data){


    	// Usage Statistics Interface
    	if ($data == 'usage'){
    		$today = date("Y-m-d");
    		$time = strtotime($today .'-5 days');
    		$out = array();
    		$date = '';
    		while ($date != $today) {
    			# code...sample data
    			// $sent = $received = $dlr = rand(0,10);

    			$date = date("Y-m-d", $time);
    			$d = new data();
    			$d->date = $date;

    			$d->sent = SentSms::getCount(array('date' => $date, 'momt'=> 'MT'));
    			$d->received = ReceivedSms::getCount(array('timestamp' => $date));
//     			$d->dlr = SentSms::getCount(array('date' => $date, 'momt'=> 'DLR'));
    			$out[] = $d;

    			$time = strtotime($date .'+1 days');

    		}
    		echo json_encode($out);
		    
    	}
    }
   
}

class data
{
   	public $date;
   	public $sent;
//    	public $dlr;
   	public $received;
}

?>