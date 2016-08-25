<?php
    include_once("mysql_connect.php");
    $account = $_POST["adminName"];
	$password = $_POST["password"];
	$sql = "SELECT * FROM administrator WHERE adminName = '$account' AND password = '$password' ;";
	$res = $conn->query($sql);
	switch($res->num_rows)
	{
	case 0:
	{
		j_echo(0 , "账号或密码不正确");
		break;
	}
	case 1:
	{
		$res_array = $res->fetch_assoc();
		switch($res_array["status"])
		{
			case 0:
			{
				$sql_status = 1;
		        $sql = "UPDATE administrator SET status = 1 WHERE adminName = '$account' AND password = '$password' ; ";
                break;				
		    }
			case 1:
			{
				j_echo(2 , "该账号已经正在登录");
				break;
			}
		}
		break;
	}
	default:
	{
		j_echo(3 , "系统维护，请联系系统运维人员！");
		break;
	}
	}
	
	function j_echo ($j_sql_status , $j_str)
	{
		$sql_status = $j_sql_status;
		$str = $j_str;
		$data = array("sql_status" => $sql_status , "str" => $str);
        echo json_encode($data);
	}
?>