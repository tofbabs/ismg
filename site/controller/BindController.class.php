<?php
/**
 * Site Index Controller
 */
class BindController extends Controller {
	
	function __construct() {
		parent::__construct();
        $this->setVariable('title', substr(get_class(),0,-10));
	}
    
    function index(){
        $xml = simplexml_load_file(URL);
        // print_r($xml);
        $status = array_slice(explode(' ', $xml->status), 2); 
        $this->setVariable('status', $status);

        $sent = $xml->sms->sent->total;
        $received = $xml->sms->received->total ;
        $dlr = $xml->dlr->received->total ;
        $queued = $xml->sms->sent->queued ;

        $active = array();
        $smscs = array();

        foreach ($xml->smscs->smsc as $smsc) {
            # code...
            
            $search = array_search((string)$smsc->id, $active);
            if (is_numeric($search)){
                # code...
                // If Still same SMSC, add up data
                $smscs[$search]->failed += $smsc->failed;
                $smscs[$search]->queued += $smsc->queued;
                $smscs[$search]->sms->received += $smsc->sms->received;
                $smscs[$search]->sms->sent += $smsc->sms->sent;
                $smscs[$search]->dlr->received += $smsc->dlr->received;

                continue;

            }
            array_push($active, (string)$smsc->id);
            array_push($smscs, $smsc);
 
        }

        // print_r($smscs);
        $this->setVariable('smscs', $smscs);        

        $this->setView('', 'binds');
    }
   
}

?>