<?php
/**
 * Site Index Controller
 */
class DashboardController extends Controller {
	
	function __construct() {
		parent::__construct();
        $this->setVariable('title', substr(get_class(),0,-10));
	}
    
    function index(){

        if(isset($_POST['loginBtn'])){

            $user = isset($_POST['username']) ? trim($_POST['username']) : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';

            $p = Profile::getOne(array('name' => $_POST['username']));

            print_r($p);

            if($p->getPassword() == $password || $p->getPassword() !== ''){
            
            	$_SESSION['user'] = $p;
                $this->setView('', 'dashboard');
            	
            }else{
               $this->setView('', 'login');
            }
        }
        
        if(isset($_SESSION['user'])){
            $this->setView('', 'dashboard');
        }
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