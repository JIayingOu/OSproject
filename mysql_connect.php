<?php
    include_once("mysql_config.php");
	//创建MYSQL数据库链接
	$conn = new MySQLi(mysql_severName , mysql_userName , mysql_password , mysql_OSDB); 
	if ($conn->connect_error) 
	{
		die("连接失败: " . $conn->connect_error);
    }
?>