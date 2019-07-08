<?php       
error_reporting(0);
$pass_array = array();
if(isset($_POST["action"]) && $_POST["action"] == "check_connection"){
	if(!isset($_POST["host_name"]) || !isset($_POST["user_name"]) || !isset($_POST["password"]) || !isset($_POST["database_name"])){
		$pass_array = array("status" => "404", "message" => "Parameter Missing Require Parameter is host_name,user_name,password,database_name");
		echo json_encode($pass_array);
		die();
	}
	$host_name = $_POST["host_name"];
	$user_name = $_POST["user_name"];
	$password = $_POST["password"];
	$database_name = $_POST["database_name"];
	$conn = mysqli_connect($host_name,$user_name,$password,$database_name);
	if(!$conn){
		$pass_array = array("status" => "404","message" => mysqli_connect_error());
		echo json_encode($pass_array);
		die();
	}else{
		$random_string = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(20/strlen($x)))),1,20);
		$pass_array = array("status" => "200","auth_id" => $random_string);
		echo json_encode($pass_array);
		die();
	}
}else{
	$pass_array = array("status" => "404","message" => "No Request Found");
	echo json_encode($pass_array);
	die();
}
?>