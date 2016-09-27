<?php
  class classOfMysql
  {
	  protected $servername ;
	  protected $account ; 
	  protected $password ;
	  protected $DBname ;
	  private $myConn;
	  
	  function __construct($in_servername , $in_account , $in_password , $in_DBname)
	  {
		  $this->servername = $in_servername;
		  $this->account = $in_account;
		  $this->password = $in_password;
		  $this->DBname = $in_DBname;
	  }
	  
	  function __destruct()
	  {
		  if(isset($this->myConn))
		  {
			  $conn = $this->myConn;
			  $conn->close();
		  }
		  
	  }
	  
	  function connect()
	  {
		  $newConn = @new MySQLi($this->servername , $this->account , $this->password , $this->DBname);
		  if($newConn->connect_error !== NULL)
		  {
			  throw new Exception($newConn->connect_error , $newConn->connect_errno);
		  }
		  return $this->myConn = $newConn;
	  }
	  
  }
?>