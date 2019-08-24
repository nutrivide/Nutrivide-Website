<?php 

require 'vendor/autoload.php';
$detect = new Mobile_Detect;

if ( $detect->isMobile() ) {
    include_once("index_mobile.html");
}

else{
    include_once("index.html");
}

 ?>