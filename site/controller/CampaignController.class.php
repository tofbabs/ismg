<?php

/**
 * Site Index Controller
 */

class CampaignController extends Controller {
	
	function __construct() {
		parent::__construct();
		$p = Profile::getAll(array('type'=>'send_profile'));
		$this->setVariable('profile', $p);
        $this->setVariable('title', substr(get_class(),0,-10));
	}
    
    function index(){
    	
        $this->setView('', 'bulk-campaign');
    }

    function bulk(){

    	if(isset($_POST['startCampaignBtn'])) {
    		
    		print_r($_POST);
    		$profile = trim($_POST['profile']);

			$p = Profile::getOne(array('name' => $profile));

            $shortcode = $p->getShortcode();
            $msg = $_POST['msg'];
            $smsc = $p->getSMSC();
            $callback = urlencode(ROOT_URL . "report?username=campaign&dlr=%d");
    		$uploaddir = UPLOAD_PATH;
			
			$info = '';
			
			if(isset($_FILES['file']['name'])){
                $uploadfile = $uploaddir . basename($_FILES['file']['name']);
                if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                    $info = 'File Uploaded Successfully';
                    $this->notifyBar('success',$info);
                } 
                else {
                    $info = 'Upload Failed';
                   $this->notifyBar('error',$info);
                }

        		if (($handle = fopen($uploadfile, "r")) !== FALSE) {

        		    while (($data = fgetcsv($handle, 14, "\n")) !== FALSE || ($data = fgetcsv($handle, 14, ",")) !== FALSE) {

        		        $msisdn = $data[0];
                        // echo $msisdn;
                        if ($msisdn == "") {
                            # code...
                            continue;
                        }
                        $s = new SendsmsController();
                        $s->sendSms($shortcode, $msisdn, $msg, $smsc, $callback, 'campaign');

        		    }

        		    fclose($handle);
        		    $this->notifyBar('success', $info . '\n Broadcast sent');
        		}
        		else
        		$this->notifyBar('error', $info . '\n Broadcast Failed');

    	   }
    	   
           if(isset($_POST['msisdn'])){

        		$arrMsisdn = explode(',', $_POST['msisdn']);
        		foreach($arrMsisdn as $msisdn){
        		  $s = new SendsmsController();
                  $s->sendSms($shortcode, trim($msisdn), $msg, $smsc, $callback, 'campaign');
        		}
                $this->notifyBar('success', $info . '\n Broadcast sent');
    	   }

    	}
		
        $this->setView('', 'bulk-campaign');

    }

    function single(){
        # code...
        
        if(isset($_POST['testCampaignBtn'])) {
        
	        $profile = trim($_POST['profile']);

			$p = Profile::getOne(array('name' => $profile));
			
// 			print_r($p);
            $shortcode = $p->getShortcode();
            $smsc = $p->getSMSC();
            $msg = $_POST['msg'];
            $msisdn = $_POST['msisdn'];
            $callback = urlencode(ROOT_URL . "report?username=campaign&dlr=%d");

            $s = new SendsmsController();
            $s->sendSms($shortcode, $msisdn, $msg, $smsc, $callback, 'campaign');

            $this->notifyBar('success','SMS sent');

        }

        $s = Shortcode::getAll(array('type' => 'MT'));
        $this->setVariable('shortcodes', $s);  

        $this->setView('', 'single-campaign');
    }
   
}

?>