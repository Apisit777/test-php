<?php
// $server_service="10.100.59.151";
// $user_service="crm-kty";
// $pass_service="6tJRVPrfpZw7c7x6KYvCyF4MnqLz8j93";
// $db_service="donate_kty";

$server_service="localhost";
$user_service="root";
$pass_service="";
$db_service="basic-laravel-search-school";

$kty_donate = new mysqli($server_service, $user_service, $pass_service, $db_service);

if ($kty_donate -> connect_errno) {
    $jarr[] =  array(
        "status"=>"N",   
        "remark"=>$kty_donate -> connect_error
    );
    echo  json_encode($jarr);
    return false;
}

// echo "Connection success";

$kty_donate -> set_charset("utf8");

?>