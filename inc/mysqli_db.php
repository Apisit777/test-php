<?php
$server_service="10.100.59.151";
$user_service="crm-kty";
$pass_service="6tJRVPrfpZw7c7x6KYvCyF4MnqLz8j93";
$db_service="service_pos_kty";

$ktymem = new mysqli($server_service, $user_service, $pass_service, $db_service);
if ($ktymem -> connect_errno) {
    $jarr[] =  array(
        "status"=>"N",   
        "remark"=>$ktymem -> connect_error
    );
    echo  json_encode($jarr);
    return false;
}

$ktymem -> set_charset("utf8");


?>