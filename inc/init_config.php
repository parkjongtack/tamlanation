<?php
error_reporting(0);
//UTF-8선언
header('Content-Type: text/html; charset=UTF-8');

//세션
if(!isset($_SESSION)) 
{ 
    session_start(); 
}

//db연결
$link = mysqli_connect("db.tamrakuk.gabia.io", "tamrakuk", "rhksfleogod04", "dbtamrakuk");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

//echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
//echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

function m_check(){
    $mAgent = array("iPhone","iPod","Android","Blackberry", 
    "Opera Mini", "Windows ce", "Nokia", "sony" );
    $chkMobile = false;
    for($i=0; $i<sizeof($mAgent); $i++){
        if(stripos( $_SERVER['HTTP_USER_AGENT'], $mAgent[$i] )){
            $chkMobile = true;
            break;
        }
    }
    return $chkMobile;
}
$mobile_check = (m_check() == true) ? "/mobile" : "";

?>