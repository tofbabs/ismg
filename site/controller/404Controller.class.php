<?php
/**
 * Site Index Controller
 */
class 404Controller extends Controller {
	
	function __construct() {
		parent::__construct();
        $this->setVariable('title', substr(get_class(),0,-10));
	}
    
    function index(){       
        $this->setView('', 'dashboard');
    }
   
}

?>