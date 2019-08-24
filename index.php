<?php 

require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;

if ( $detect->isMobile() ) {
    include_once("index.html");
}

else{
    include_once("index_mobile.html");
}

 ?>