<?php
session_start();
require("./config/environment.php");
include("database/dbConnection.php");
$db = new dbConnection($dBconfig);
require("./router.php");
?>