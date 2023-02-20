<?php
include_once ROOT.'/common/GameLogic.class.php';
include_once ROOT.'/common/model/Flash.class.php';

/**
* SMSController Class
*/
class SmsController extends Controller
{
	private $game;

	public function index(){

		$keyword = isset($_GET['MESSAGE']) ? strtoupper($_GET['MESSAGE']) : exit(0);
		$short_code = isset($_GET['SHORTCODE']) ? $_GET['SHORTCODE'] : exit(0);
		// $time = isset($_GET['TIMESTAMP']) ? $_GET['TIMESTAMP'] : exit(0);
		$msisdn = isset($_GET['SENDER']) ? $_GET['SENDER'] : exit(0);
		
		// Resolve Keyword and Perform Action
		// Submit a response and send to user
		$resp = $this->resolveKeywordToAction($keyword,$msisdn);
		// echo $resp;
		SmsController::sendSms($msisdn,$resp, $short_code);

	}

	/*
	SMS HANDLER
	*/
	function resolveKeywordToAction($key, $msisdn){
		
	    $key = explode(" ", $key);

	    if ($key[0] == 'WL') {
	        # code...
	        return $this->register($msisdn);
	    }

	    if ($key[0] == 'PLAY') {
	        # code...
	        return $this->getQuestion($msisdn);
	    }

	    if ($key[0] == 'HELP') {
	        # code...
	        return $this->getHelp($msisdn);
	    }

	    if ($key[0] == 'TABLE') {
	        # code...
	        return $this->getTable();
	    }

	    if ($key[0] == 'POINTS') {
	        # code...
	        return $this->getPoints($msisdn);
	    }

	    if ($key[0] == 'STOP') {
	        # code...
	        return $this->stop($msisdn);
	    }

	    if ($key[0]=='SCORE') {
	    	# code...
	    	
	    	if(isset($key[1])){

	    		return $this->getScoreTeam($key[1]);
	    	}

	    	return $this->getScorePlayerTeam($msisdn);

	    }
	    if ($key[0]=='CLUB') {
	    	# code...
	    	if($this->isClub($key[1]) == TRUE){

	    		return $this->addClub($key[1],$msisdn);
	    	}
	    }
	    

	    if($key[0]=='A' || $key[0] == 'B' || $key[0] == 'C'){

			$game = new GameEngine($msisdn);
			// print_r($game);
			$pass = $game->evaluateResponse($key[0]); 
			if ($pass == 0) {
				# code...
				$msg = "You have {$pass} points" . Flash::getOne(array('type' => 0), 'RAND()')->getMsg();
				SmsController::sendSms($msisdn, $msg , 4080); 
			}
			else{
				$msg = "You have {$pass} points" . Flash::getOne(array('type' => 1), 'RAND()')->getMsg();
				SmsController::sendSms($msisdn, $msg , 4080); 
			}
	    	
	    	return $this->getQuestion($msisdn);
	    }

	    return 'Text HELP to 4080. You have entered a non existing keyword';

	}

	function isClub($key){
		// Use Club GetAll
		$c = Club::getAll();
		foreach ($c as $club) {
			# code...
			if($key == $club->getName())
			return TRUE;

		}
		return FALSE;		

	}

	function getQuestion($msisdn){

		$p = Player::getOne(array('msisdn' => $msisdn));
		$stance = GameEngine::haveMatch($msisdn);

		// print_r($stance);
		if($stance == NULL){
			$m = Match::getNextMatch(array('home' => $p->getClub()), 'match_time ASC');
			if ($m != NULL) {
				# code...
				return "The next league match is on day ". $m->getTime() .", Get questions correct to score pts. Man of the match wins N10,000";
			}
			return "No more matches this season";
		}

		$game = new GameEngine($msisdn);
		$q = $game->fetchQuestion($stance);
		if(is_object($q)){
			$question['stmt'] = $q->getStmt();
			$question['opt'] = $q->getOpt();
			return implode("\n",$question);
		}

		return $q;
	}

	public function getPoints($msisdn){

		$p = Player::getOne(array('msisdn' => $msisdn));
		return $p->getPhone() . " has " . $p->getTotalPoints();
	}
	static function sendSms($msisdn, $msg, $sender){
		# code...
		$url = "http://184.173.247.178:13013/cgi-bin/sendsms?username=insolsoft&password=dm4dcy&to=". $msisdn ."&from=" . $sender . "&text=". $msg;
		// echo $url;

		/*
			// Get cURL resource
			$curl = curl_init();
			// Set some options - we are passing in a useragent too here
			curl_setopt_array($curl, array(
		  		CURLOPT_RETURNTRANSFER => 1,
		    	CURLOPT_URL => $url
			));
			// Send the request & save response to $resp
			$resp = curl_exec($curl);
			// Close request to clear up some resources
			curl_close($curl);

		*/
	}

	

	public function register($_msisdn){
		
		$u = Player::getOne(array('msisdn' => $_msisdn));
		// print_r($u);
		if(null == $u->getId()){
			$u->setPhone($_msisdn);
			$u->setVerCode(1);
			$u->save();

			return "Welcome to World League. To select your club, send club name from list to xxxxx for free. Barcelona \n Real Madrid \n Man Utd \n Bayern Mun \n Chelsea \n Arsenal \n Liverpool \n Man City";
		}
		if($u->getClub() == ''){
			return "Welcome to World League. To select your club, send club name from list to xxxxx for free. Barcelona \n Real Madrid \n Man Utd \n Bayern Mun \n Chelsea \n Arsenal \n Liverpool \n Man City";;
		}
		
		// print_r($m);
		if (!$u->isActive() && $u->getVerified() == 1) {
			# code...
			$u->setActive(1);
			$u->save();
			return "You are now active again. Start Playing. Get questions correct to score pts. Man of the match wins N10,000";

		}

		$stance = GameEngine::clubHaveMatch($u->getClub());
		if (isset($stance)) {
			# code...
			$m = Match::getOne(array($stance => $u->getClub()));
			return $this->getQuestion($_msisdn);

		}
		$m = Match::getNextMatch(array('home' => $u->getClub()));
		return "You have joined ". $u->getClub() .". Your sign-on fee is 100 pts. The next league match is on day " . $m->getTime() . " Get questions correct to score pts. Man of the match wins N10,000";

	}

	function addClub($_club, $_msisdn){

			$u = Player::getOne(array('msisdn' => $_msisdn));
			// print_r($u);
			$c = Club::getOne(array('name' => $_club));

			if($u->getClub() == null){
				$u->setClub($c->getKeyword());
				// GEt 100 points Bonus
				$u->setTotalPoints('100');
				$u->setActive('1');
				$u->save();
				return "You have joined ". $c->getName() ." Your sign-on fee is 100 pts. The next league match is on day, dd-mm-yy Get questions correct to score pts. Man of the match wins N10,000";
			}
			return "You already joined ". $u->getClub() . ". The next league match is on day, dd-mmm. Get questions correct to score pts. Man of the match wins N10,000";
			
		}

	function stop($_msisdn){

		$u = Player::getOne(array('msisdn' => $_msisdn));
		$u->setActive(NULL);
		$u->save();
		return "You have opted out of the World League service. To join the service again send WL to 4080 for FREE.";
		
	}

	function getTable(){

		$c = Club::getAll(array(), 'points desc');
		$buf = array();
		$table = array();
		foreach ($c as $club) {
			# code...
			$buf = $club->getName();
			$buf .= " " . $club->getPoints();
			array_push($table, $buf);

		}
		$table = implode("\n" , $table);
		// print_r($table);
		return $table;
		
	}

	function getScorePlayerTeam($phone){
		$p = Player::getOne(array('msisdn'=>$phone));
		// print_r($p);
		return $this->getScoreTeam($p->getClub());
	}

	function getScoreTeam($club){


		$stance = GameEngine::clubHaveMatch($club);
		$m = Match::getCurrentMatch(array($stance=>$club));
		// print_r($m);
		$result = $m->getHomeTeam() . " " . $m->getHomeScore() . " v " ;
		$result .= $m->getAwayScore() . " " . $m->getAwayTeam();

		return $result;
	}

	function displayQuestion($question){
		$id = array_shift($question);
		$stmt = array_shift($question);
		array_pop($question);array_pop($question);
		echo $stmt . "</br>";
		foreach ($question as $key => $value) {
			# code...
			echo $key . ": " . $value . " ";
		}
	}

	public function getHelp(){
		# code...
		return "To start playing, Send WL  \n Check Points - Text Points \n to 4080";
	}

}

?>