<?php
/*

-------------Basic action section--------------------

*/
$request = $_SERVER['REQUEST_URI'];
switch($request)
{
	case "$root/rejestracja":
	$request = "register";
	break;
	case "$root/validRegister":
	$request = "validRegister";
	break;
	case "$root/zaloguj":
	$request = "login";
	break;
	case "$root/validLogin":
	$request = "validLogin";
	break;
	case "$root/logout":
	include("./model/logout.php");
	$request = "logout";
	break;
	case "$root/loginSuccess":
	$request = "loginSuccess";
	break;
	case "$root":
	$request = "home";
	break;
}

/*

-------------Register section--------------------

*/

if($request == "validRegister")
{
	include("./model/register.php");
	$registerModel = new RegisterUser($db, $address);
	try{
	$registerModel->checkAvailability();
	$registerModel->checkLoginLength();
	$registerModel->checkPasswordLength();
	$registerModel->registerUser();
}
catch(Exception $e)
{
echo $e->getMessage();
}
}

/*

-------------Login section--------------------

*/
if($request == "validLogin")
{
	var_dump($_SESSION);
	if(isset($_POST["login"]) && isset($_POST["password"]))
	{
	include("./model/login.php");
	$login = new login($db, $_POST);
	try{
	$login->Auth();
	header("location:".$address."loginSuccess", 301);
}
catch(Exception $e)
{
echo $e->getMessage();
}
}//else
		//header("location: ".$address);
}
include("public/views/main.php");

?>