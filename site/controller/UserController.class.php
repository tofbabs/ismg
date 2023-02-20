<?php
/**
 * Site Index Controller
 */
class UserController extends Controller {
	
	function __construct() {

		parent::__construct();

        $this->setVariable('title', substr(get_class(),0,-10));
	}
    
    function index(){
        
        // Show List of Profiles1
        $this->view();

    }

   public function add(){
    	# code...
    	
    	if(isset($_POST['editUserBtn'])) $this->edit($_POST['id']);
    	if(isset($_POST['addUserBtn'])) {

    		$user = new Profile();
    		$user->setUsername(Utils::sanitize($_POST['username']));
    		$user->setPassword(Utils::sanitize($_POST['password']));
            $user->setShortcode(Utils::sanitize($_POST['shortcode']));
            $user->setSMSC(Utils::sanitize($_POST['smsc']));
            $user->setType('send_profile');
			$user->save();
    		
    		print_r($user);
            
            $msg = 'Profile Successfully Updated';
            $this->notifyBar('success', $msg);

            $this->view();

    	}
        else
        $this->setView('', 'add-new-user');
    }


    public function view()
    {
    	# code...
    	$u = Profile::getAll(array('type' => 'send_profile'));
    	// print_r($u);
    	$this->setVariable('users', $u);
    	$this->setView('', 'list-user');
    }

    function delete($value){
        $u = Profile::getOne(array('name' => $value));
        $u->delete();
        $this->view();
    }

    function edit($value){

        $user = Profile::getOne(array('id' => $value));

		if(isset($_POST['editUserBtn'])) {

			echo Utils::sanitize($_POST['username']);
    		$user->setUsername(Utils::sanitize($_POST['username']));
    		$user->setPassword(Utils::sanitize($_POST['password']));
            $user->setShortcode(Utils::sanitize($_POST['shortcode']));
            $user->setSMSC(Utils::sanitize($_POST['smsc']));
            
            print_r($user);
            
    		$user->update();
            
            $msg = 'New Profile Added';
            $this->notifyBar('success', $msg);

            $this->view();
            exit();

    	}
        if (!isset($value)) {
            # code...
            $this->notifyBar('error','No profile Selected, Create New');
        } 
		if ($user->getType() == 'administrator'){
        
        	$this->setVariable('role', 'admin');
        		
        }
        
        $this->setVariable('profile', $user);
        
        $this->setView('', 'add-new-user');

    }
   
}

?>