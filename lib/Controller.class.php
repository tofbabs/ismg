<?php
/**
 * Base Controller class
 */
class Controller {
	
    protected $template;
    
	function __construct() {
		$this->template = new Template();
		
		if ( $this->is_session_started() === FALSE ) {
            session_start();
            $this->setView('', 'login');
        }
		
		// $url = 'http://209.59.165.76:13013/status.xml';
        $xml = simplexml_load_file(URL);
        // print_r($xml);
        $status = explode(' ', $xml->status); 
        $this->setVariable('status', $status);

        $sent = $xml->sms->sent->total;
        $received = $xml->sms->received->total ;
        $dlr = $xml->dlr->received->total ;
        $queued = $xml->sms->sent->queued ;

        $active = array();
        $smscs = array();

        foreach ($xml->smscs->smsc as $smsc) {
            # code...
            // echo (string)$smsc->id;
            $search = array_search((string)$smsc->id, $active);
            if (is_numeric($search)){
                # code...
                continue;
            }
            array_push($active, (string)$smsc->id);
            array_push($smscs, $smsc);
 
        }


        $this->setVariable('sent', $sent);
        $this->setVariable('received', $received);
        $this->setVariable('queued', $queued);
        $this->setVariable('dlr', $dlr);

        $this->setVariable('smscs', $smscs);
    
	}
    
    function index(){
        error_log("Controller[".get_called_class()."] index method is not defined");
    }
    
    protected function setView($folder,$file){
        $this->template->set($folder,$file);
    }
    protected function setVariable($key,$value){
        $this->template->setVariable($key,$value);
    }

    function notifyBar($type, $msg){
        switch ($type) {
            case 'success':
                # code...
                $this->setVariable('info' ,'<div class="alert alert-success" role="alert">
                          <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                          <span class="sr-only">Success:</span>'. $msg .'</div>');
                break;
            case 'error':
                  # code...
                $this->setVariable('info' ,'<div class="alert alert-error" role="alert">
                          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                          <span class="sr-only">Error:</span>'. $msg .'</div>');
                  break;  

            default:
                # code...
                break;
        }
    }

    protected function is_session_started(){
        if ( php_sapi_name() !== 'cli' ) {
            if ( version_compare(phpversion(), '5.4.0', '>=') ) {
                return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
            } else {
                return session_id() === '' ? FALSE : TRUE;
            }
        }
        return FALSE;
    }
    
    function __destruct(){
        $this->template->render();
    }
}

?>