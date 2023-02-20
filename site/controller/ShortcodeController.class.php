<?php
/**
 * Site Index Controller
 */
class ShortcodeController extends Controller {
	
	function __construct() {
		parent::__construct();
        $this->setVariable('title', substr(get_class(),0,-10));
	}
    
    function index(){

        if ( $this->is_session_started() === FALSE ) {
            session_start();
            $this->setView('', 'login');
        }

        // Show List of Profiles1
        $this->view();
    }

    public function add(){
    	# code...

          
    	
    	if(isset($_POST['addBtn'])) {

    		$s = new Shortcode();
    		$s->setCode($_POST['code']);
    		$s->setSMSC($_POST['smsc']);
            $s->setValue($_POST['value']);
            $s->setType($_POST['type']);
    		$s->save();

            $this->notifyBar('success','New Shortcode Successfully Added');
    	}
        $this->setVariableSMSC(); 
        $this->setView('', 'new-shortcode');
    }

    public function view()
    {
    	# code...
    	$s = Shortcode::getAll();

    	$this->setVariable('shortcodes', $s);
    	$this->setView('', 'list-shortcode');
    }

    function delete($value){
        $u = Shortcode::getOne(array('code' => $value));
        $u->delete();
        $this->view();
    }

    function edit($value){


        if (!isset($value)) {
            # code...
            $this->setView('', 'new-shortcode');
            exit();
        }
        $s = Shortcode::getOne(array('code' => $value));

        $this->setVariableSMSC();
        $this->setVariable('shortcode', $s);
        $this->setView('', 'new-shortcode');

    }

    function setVariableSMSC(){
        $xml = simplexml_load_file(URL);

        $active = array();
        $smscs = array();

        foreach ($xml->smscs->smsc as $smsc) {

            $search = array_search((string)$smsc->id, $active);
            if (is_numeric($search)){
                # code...
                continue;
            }
            array_push($active, (string)$smsc->id);
            array_push($smscs, $smsc);
        
        }

        $this->setVariable('smscs', $smscs);     
    }
   
}

?>