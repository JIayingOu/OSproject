<html>
<head>
<title>欧盛订单管理系统</title>
<meta charset="utf-8" />
<link href="../bootstrap-3.3.6/dist/css/bootstrap.css" rel="stylesheet" />
<script src="../jquery/jquery-3.0.0.js"></script>
<script src="../bootstrap-3.3.6/dist/js/bootstrap.js"></script>
<style>
.containar
{
	width: 100%;
	height: 100%;
}
.logonUI
{
	position:absolute;
	top:20%;
	left:40%;
	width:350px;
	height:250px;
	border:1px #000000 solid;
}
</style>
</head>

<body>
<div class="containar">
     <form class="logonUI" action="" method="post">        
          <span>账号:</span>
          <input type="text" id="inputAccount" name="adminName"><br />		  
          <span>密码:</span>
          <input type="password" id="inputPassword" name="password"><br />         
          <button type="button" class="btn btn-success" id="logonButton">登录</button>
     </form>
</div>

<script>
$(document).ready(function(){
    $("#logonButton").click(function()
	{
		systemlogon();
	});
});

function systemlogon()
{
	if($("#inputAccount").val() == "" || $("#inputAccount").val() == null)
	{
		alert("账号不能为空！");
	}
	else if($("#inputPassword").val() == "" || $("#inputPassword").val() == null)
	     {
			 alert("密码不能为空！");
		 }
		 else formSubmitOfLogon();
}

function formSubmitOfLogon()
{
	var P_adminName = $("#inputAccount").val() ;
	var P_password = $("#inputPassword").val() ;
	$.post("logon.php" , {"adminName" : "P_adminName" , "password" : "P_password"} , function(data , status){callBackFun(data , status);} );
}

function callBackFun(CB_data , CB_status)
{
	var j_data = eval( "(" + CB_data + ")" );
	switch(j_data.sql_status)
	{
		case 0:
		case 2:
		case 3:{ alert(j_data.str); break; }
		case 1:
		{
			break;
		}
	}     	
     		 
}
</script>
</body>

</html>