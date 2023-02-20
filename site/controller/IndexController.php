<?php
/**
 * Site Index Controller
 */
class IndexController extends DashboardController {
	
	function __construct() {
		parent::__construct();
	}
    
     function shutdown($smsc){
    
    	$url = 'http://64.150.185.206:13013/stop-smsc?smsc=' . trim($smsc) . '&password=mobilloto';
    	$resp = file_get_contents($url);
    	echo "<script>alert('" . $resp . "')</script>";
    	$this->setView('', 'dashboard');
    }	
    
    function start($smsc){
    
    	$url = 'http://64.150.185.206:13013/start-smsc?smsc=' . trim($smsc) . '&password=mobilloto';
    	$resp = file_get_contents($url);
    	echo "<script>alert('" . $resp . "')</script>";
    	$this->setView('', 'dashboard');
    }
   
}

?>