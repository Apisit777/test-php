<?php

$server_service="10.100.59.151";
$user_service="crm-kty";
$pass_service="6tJRVPrfpZw7c7x6KYvCyF4MnqLz8j93";
$db_service="service_pos_kty";
$db_donate="donate_kty";

try {
    /// Handler for MySQL
    $dns_mem = new PDO("mysql:host=$server_service;dbname=$db_service", $user_service, $pass_service); 
    $dns_mem->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dns_mem->exec("set names utf8");
}
catch(PDOException $e) {
    echo $e->getMessage();
}
?>