<?php
/**
 * Created by PhpStorm.
 * User: KThanksBye
 * Date: 7/16/2015
 * Time: 2:34 PM
 */
$url = "http://www.snapdeal.com/omn/getOmnitureCode";
$mobile = $_GET["mobile"];
if(isset($mobile)) {
    $ch = curl_init();                    // initiate curl
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt($ch, CURLOPT_POST, true);  // tell curl you want to post something
    curl_setopt($ch, CURLOPT_POSTFIELDS, "eventType=sendAppDownloadSMS&status=sent"); // define what you want to post
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return the output in string format
    $output = curl_exec($ch); // execute
    curl_close($ch); // close curl handle
    var_dump($output);
    echo "SMS Sent";
    //header("Location: " . $_SERVER['PHP_SELF']."?mobile=$mobile");
} else {
    echo "Check url -> append ?mobile=9999999999";
}
?>