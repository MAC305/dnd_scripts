<?php      
echo "<pre>";
/* print_r($_SERVER); */
$server_name = $_SERVER["SERVER_NAME"];
$Url = "http://localhost/crm_api/";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $Url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,"action=check_connection&host_name=localhost&user_name=root&password=&database_name=crm_checking");
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 50000);
curl_setopt($ch, CURLOPT_TIMEOUT, 50000);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
echo $output = curl_exec($ch);
curl_close($ch);
/* print_r(json_decode($output)); */
?>