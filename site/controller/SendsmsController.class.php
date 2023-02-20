<?php

/**
 * Send SMS Controller
 * Manages and routes all outgoing SMS from application
 */

class SendsmsController extends Controller {
	private $time;

	function __construct() {
        $this->template = new Template();
        // $this->setVariable('title', substr(get_class(),0,-10));
        $this->time = round(microtime(true));
	}
    
    function index(){

        // Sample URL: http://64.150.185.206:13031/ismg/sendsms?username=mobilloto&password=mobilloto&from=33088&to=2348182113062&msg=MAGA%20DON%20PAY
        // Authenticate Sending Profile
        $p = Profile::getOne(array('name' => $_GET['username']));

        if(null == $p->getId()){
            exit("304: User Doesn't Exist");
        }elseif ($_GET['password'] != trim($p->getPassword())) {
            # code...
            exit("301: Bad Authentication, Username and Password Mismatch");
        }
    	
        // Check if smsc is set else use default set for Profile
        $smsc = $smsc = trim($p->getSMSC());

        // echo $smsc;
        $from = $p->getShortcode();

        $to = isset($_GET['to']) ? $_GET['to'] : exit("305: MSISDN Not Set");
        $msg = isset($_GET['msg']) ? $_GET['msg'] : '';

        // Generating Callback URL params
        $data = array(
            'username' => $_GET['username'],
            'shortcode' => $from,
            'msisdn' => $to,
            'smsc' => $smsc,
            'dlr' => '%d'
        );

        // Building Callback Parameters
        $callback_params = http_build_query($data);
        // Generating DLR URL
        $callback_url = "64.150.185.206/ismg/report?" . $callback_params;
        
        echo $this->sendSms($from, $to, urlencode($msg), $smsc, $callback_url, $_GET['username'] );

            

        
    }

    function sendSms($shortcode, $msisdn, $msg, $smsc, $callback, $profile){
        $s = new SendSms();

        $s->setSender($shortcode);
        $s->setReceiver($msisdn);
        $s->setMsgdata($msg);
        $s->setSmsc($smsc);
        $s->setAccount($profile);
        $s->setDLRUrl($callback);
        $s->setTime($this->time);
        //$s->setMClass(2);
        $s->setCoding(0);
        $s->setCharset();


        // Predefined parameters
        $s->setMomt();
        $s->setSmstype();
        $s->setDLRMask();
        
        // Save Parameters in SQLBox SendSms table
        $s->save();
        return "0: Message Sent to SMSC";
        
    }

   //  function smsBoxSend($msg, $smsc, $msisdn, $shortcode){
// 
//         $data = array(
//             'username' => 'mobilloto', 
//             'password' => 'mobilloto', 
//             'from' => $shortcode,
//             'to' => $msisdn,
//             'smsc' => $smsc,
//             'text' => $msg
//             );
// 
//         $params = http_build_query($data);
//         $resp = Utils::postData('http://64.150.185.206:13031/ismg/sendsms', $params );
//         if ($resp['code'] == 200) {
//             # code...
//             return "0: Message Sent to SMSC";
//         }
// 
//     }
   
}

?>