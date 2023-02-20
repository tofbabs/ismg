<?php

/*
	Utility operation e.g. Debug to Console, 
*/

class Utils{

	static function debug_to_console( $data ) {

	    if ( is_array( $data ) )
	        $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
	    
	    else
	        $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

	    echo $output;
	}
	
	static function sanitize($dirty){
		 $whiteSpace = '';  //if you dnt even want to allow white-space set it to ''
		 $pattern = '/[^a-zA-Z0-9'  . $whiteSpace . ']/u';
    	 $cleared = preg_replace($pattern, '', (string) $dirty);
    	 return trim($cleared);
	}

	static function postData($url, $params = array()){

		// Get cURL resource
$curl = curl_init();
// Set some options - we are passing in a useragent too here
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $url,
    CURLOPT_POST => 1,
    CURLOPT_POSTFIELDS => $params
));
        
        $retval = curl_exec($curl);
        $retcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        
        curl_close($curl);

        return array('code' => $retcode, 'response' => $retval);

	}
	
	static function get_http_response_code($url) {

        $headers = get_headers($url);
        return substr($headers[0], 9, 3);

    }


}

