<?php
/**
 * Site Index Controller
 */
class LoginController extends Controller {
	
	function __construct() {
		parent::__construct();
		$this->setVariable('title', substr(get_class(),0,-10));
		
	}
    
    function index(){
        
        unset($_SESSION['user']);
        session_destroy();
        $this->setView('', 'login');
        
    }
   
}

?>