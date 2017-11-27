<?php
/* Change path info depending on your file locations */
require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;

if($detect->isMobile())
{
    header('Location: mb.html');
    exit;
}else{
	 header('Location: dt.html');
    exit;
}

?>