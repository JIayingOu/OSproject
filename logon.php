<?php
    include_once("mysql_connect.php");
    $account = "admin";//$_POST["adminName"];
	$password = "admin";//$_POST["password"];
	$sql = "SELECT adminName FROM administrator WHERE adminName = '$account' AND password = '$password' ;";
	$res = $conn->query($sql);
	var_dump($res);
?>