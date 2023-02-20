<?php
error_reporting(E_ALL);
	ini_set("display_errors", 1);
	date_default_timezone_set('Africa/Lagos');
define('ROOT',dirname(realpath(__FILE__))."/");
/**
 * 
 * DO NOT DEFINE ANY CONSTANTS HERE. DEFINE THOSE IN CONFIG.PHP
 * 
 */
$thisDir=explode("/", ROOT);
$conflen=strlen(array_pop($thisDir));
$B=substr(__FILE__, 0, strrpos(__FILE__, '/'));
$A=substr($_SERVER['DOCUMENT_ROOT'], strrpos($_SERVER['DOCUMENT_ROOT'], $_SERVER['PHP_SELF']));
$C=substr($B, strlen($A));
$posconf=strlen($C) - $conflen;
$D=substr($C, 0, $posconf);
$host='http://' . $_SERVER['SERVER_NAME'] . '/' . $D;

define('ROOT_URL', $host);

include(ROOT . 'system/config/config.php');
include(ROOT . 'lib/functions.php');

/**
 * Set error reporting
 */
function setErrorLogging(){
    if(DEVELOPMENT_ENVIRONMENT == true){
        error_reporting(E_ALL);
        ini_set('display_errors', "1");
    }else{
        error_reporting(E_ALL);
        ini_set('display_errors', "0");
    }
    ini_set('log_errors', "1");
    ini_set('error_log',ROOT . 'system/log/error_log.php');
}
/**
 * Trace function which outputs variables to system/log/output.php file
 */
function trace($var,$append=false){
    $oldString="<?php\ndie();/*";
    if($append){
        $oldString=file_get_contents(ROOT . 'system/log/output.php') . "/*";
    }
    file_put_contents(ROOT . 'system/log/output.php', $oldString . "\n---\n" . print_r($var, true) . "\n*/");
}

/** Check for Magic Quotes and remove them **/
function stripSlashesDeep($value) {
    $value = is_array($value) ? array_map('stripSlashesDeep', $value) : stripslashes($value);
    return $value;
}

function removeMagicQuotes() {
    if ( get_magic_quotes_gpc() ) {
        $_GET    = stripSlashesDeep($_GET   );
        $_POST   = stripSlashesDeep($_POST  );
        $_COOKIE = stripSlashesDeep($_COOKIE);
    }
}

/** Check register globals and remove them **/
function unregisterGlobals() {
    if (ini_get('register_globals')) {
        $array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
        foreach ($array as $value) {
            foreach ($GLOBALS[$value] as $key => $var) {
                if ($var === $GLOBALS[$key]) {
                    unset($GLOBALS[$key]);
                }
            }
        }
    }
}

/** Main Call Function **/
function callHook() {
    global $url;
    global $area;
    $url = rtrim($url,"/");
    $urlArray = array();
    $urlArray = explode("/",$url);
    // print_r($urlArray);
    $controller = DEFAULT_CONROLLER;
    // echo $controller;
    $action = DEFAULT_ACTION;
    $data = NULL;
    //Check if the call is to admin area
    if($urlArray[0] == "admin"){
        $area = "admin";
        array_shift($urlArray);
    }
    //Controller
    if(isset($urlArray[0]) && !empty($urlArray[0])){
        $controller = array_shift($urlArray);
    }
    //Action
    if(isset($urlArray[0]) && !empty($urlArray[0])){
        $action = array_shift($urlArray);
    }

    //Data
    if(isset($urlArray[0]) && !empty($urlArray[0])){
        $data = array_shift($urlArray);
    }
    //Setup database
    Database::getInstance('pgsql:host='.DB_HOST.';dbname='.DB_NAME.';', DB_USER, DB_PASS);
    
    //LOAD THE CONTROLLER
    $controllerName = $controller;
    $controller = ucwords($controller);

    $model = rtrim($controller, 's');
    $controller .= 'Controller';
    // echo $controller;
    $dispatch = new $controller();
    
    
    if ((int)method_exists($controller, $action)) {

        call_user_func(array($dispatch,$action) , $data);
    } else {
        error_log("Unknown page/action, Controller = ".$controller.", action = ".$action);
    }
}

function __autoload($className){
    $paths = array(
        ROOT."/lib/",
        ROOT."/site/controller/",
        ROOT."/admin/controller/",
        ROOT."/common/",
        ROOT."/common/model/"
    );
    foreach($paths as $path){
        if(file_exists($path.$className.".class.php")){
            require_once($path.$className.".class.php");
            break;
        }
    }
}

$area = "site";

setErrorLogging();
removeMagicQuotes();
unregisterGlobals();
callHook();

?>