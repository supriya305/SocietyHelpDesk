<?php
define('DB_SERVER','bf2tr8x8e0uvlwfawzxr-mysql.services.clever-cloud.com');
define('DB_USER','uyhwl4s1c1jvukns');
define('DB_PASS' ,'FG1MVKdg1Cvj3zrrpnrx');
define('DB_NAME', 'bf2tr8x8e0uvlwfawzxr');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
date_default_timezone_set('Asia/Kolkata');
$currentTime = date( 'd-m-Y h:i:s A', time () );
// Check connection
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>