<?php

require('Database.php');
//$db = Database::getInstance();
//$mysqli = $db->getConnection();

class DbFunction
{

	function registration($name, $umobile, $email, $password)
	{
	    $plan = "basic";
		$status = "1";
		$client_id = "M" . rand(11111, 99999);
		$userid = $umobile;
		$pin = rand(111111, 999999);
		$balance = "0";
		date_default_timezone_set('Asia/Kolkata');
		$d = date('Y-m-d');
		$t = date('h:i:s A');
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "insert into clients (client_id,name,email,mobile,userid,password,pin,reg_date,balance,status,plan)values(?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = $mysqli->prepare($query);
		if (false === $stmt) {

			trigger_error("Error in query: " . mysqli_connect_error(), E_USER_ERROR);
		} else {

			$stmt->bind_param('sssssssssss', $client_id, $name, $email, $umobile, $userid, $password, $pin, $d, $balance, $status, $plan);
			$stmt->execute();

			$respnse = "success";
			$nam ="MSPE API" ;
    $mailFrom = "mspe@mspe.in";
    $link = "https://api.mspe.in/";
    $message = "Welcome to Ms Pe Family.\n\n UserId - ".$client_id.".\n\n Password -".$password.".\n\n Pin -".$pin.".\n\n Login link -".$link;
    $subject = "Api Registration";
    $mailTo =$email;
    $headers ="From: ".$mailFrom;
    $txt ="You received an e-mail from ".$nam.".\n\n".$message;
      
     mail($mailTo,$subject,$txt,$headers);
			return $respnse;
		}
	}
	
	function payrequest($client_id,$op_bal,$cl_bal, $bank, $pmode, $amount, $pdate, $trid, $status)
	{
		
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "insert into client_wallet (client_id,op_bal,amount,cl_bal,date,bank,pmode,tr_id,status)values(?,?,?,?,?,?,?,?,?)";
		$stmt = $mysqli->prepare($query);
		if (false === $stmt) {

			trigger_error("Error in query: " . mysqli_connect_error(), E_USER_ERROR);
		} else {

			$stmt->bind_param('sssssssss', $client_id, $op_bal,$amount,$cl_bal,$pdate,$bank, $pmode, $trid, $status);
			$stmt->execute();

			$respnse = "success";
			
			return $respnse;
		    }
	}
	
		
	function insert_ad_tr($open,$amount,$type,$trid)
	{
		date_default_timezone_set('Asia/Kolkata');
		$d = date('Y-m-d');
		$t = date('h:i:s A');
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "insert into ad_wallet (open,amount,type,date,time,trid)values(?,?,?,?,?,?)";
		$stmt = $mysqli->prepare($query);
		if (false === $stmt) {

			trigger_error("Error in query: " . mysqli_connect_error(), E_USER_ERROR);
		} else {

			$stmt->bind_param('ssssss', $open,$amount,$type,$d,$t,$trid);
			$stmt->execute();

			$respnse = "success";
			
			return $respnse;
		    }
	}
	

	function login($loginid, $password)
	{

		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT * FROM clients where client_id=? and password=? ";
		$stmt = $mysqli->prepare($query);
		if (false === $stmt) {

			trigger_error("Error in query: " . mysqli_connect_error(), E_USER_ERROR);
		} else {

			$stmt->bind_param('ss', $loginid, $password);
			$stmt->execute();
			$stmt->bind_result($loginid, $password);
			$rs = $stmt->fetch();
			if (!$rs) {
				header('location:login.php');
			} else {
				$respnse = "success";
				return $respnse;
			}
		}
	}
	
	function adlogin($loginid, $password)
	{

		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT * FROM admin where user_id=? and password=? ";
		$stmt = $mysqli->prepare($query);
		if (false === $stmt) {

			trigger_error("Error in query: " . mysqli_connect_error(), E_USER_ERROR);
		} else {

			$stmt->bind_param('ss', $loginid, $password);
			$stmt->execute();
			$stmt->bind_result($loginid, $password);
			$rs = $stmt->fetch();
			if (!$rs) {
				header('location:admin/index.php');
			} else {
				$respnse = "success";
				return $respnse;
			}
		}
	}
    function update_admin($table, $data , $ad_id)
    {
     	$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "update admin set $table=? where user_id=?";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param('ss', $data, $ad_id);
		$stmt->execute();
		$data = "success";
		return $data;   
    }

	function update_user( $value, $amount)
	{
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "update clients set balance=? where client_id=?";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param('ss', $amount, $value);
		$stmt->execute();
		$data = "success";
		return $data;
	}
	function updateopstatus($status,$opid)
	{
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "update operator set status=? where op_id=?";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param('ss', $status, $opid);
		$stmt->execute();
		$data = "success";
		return $data;
	}
	
	function update_client_wallet($value, $status)
	{
	  
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "update client_wallet set status=? where tr_id=?";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param('ss', $status, $value);
		$stmt->execute();
		$data = "success";
		return $data;
	}  
	 

	function getopdata($operator_id)
	{

		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = " SELECT * FROM operator WHERE op_id='$operator_id'";
		$stmt = $mysqli->query($query);
		if (false === $stmt) {
			trigger_error("Error in query: " . mysqli_connect_error(), E_USER_ERROR);
		} else {
			$data = $stmt->fetch_object();
		}
		return $data;
	}

	function showop($status)
	{

		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT * FROM operator WHERE status = '$status'";
		$stmt = $mysqli->query($query);
		return $stmt;
	}
	

    function showopp()
	{

		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT * FROM operator ";
		$stmt = $mysqli->query($query);
		return $stmt;
	}

    function api_data($table, $value)
	{
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT * FROM api WHERE $table = '$value'";
		$stmt = $mysqli->query($query);
		$data = $stmt->fetch_object();
		return $data;
	}

    function getuser($condition1, $value1, $condition2, $value2)
	{

		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT * FROM clients WHERE $condition1 = '$value1' and $condition2 = '$value2'";
		if ($stmt = $mysqli->query($query)) {
			$data = $stmt->fetch_object();
			return $data;
		} else {
			return "error";
		}
	}

    function getuserinfo($table, $value)
	{

		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT * FROM clients WHERE $table = '$value'";
		if ($stmt = $mysqli->query($query)) {
			$data = $stmt->fetch_object();
			return $data;
		} else {
			return "error";
		}
	}
	
	function getadmininfo($table, $value)
	{

		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT * FROM admin WHERE $table = '$value'";
		if ($stmt = $mysqli->query($query)) {
			$data = $stmt->fetch_object();
			return $data;
		} else {
			return "error";
		}
	}

	function checkuser($client_id, $password)
	{
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT * FROM clients WHERE client_id = '$client_id' and password = '$password'";
		$stmt = $mysqli->prepare($query);
		$stmt->execute();
		$rs = $stmt->fetch();
		if (!$rs) {
			return "failed";
		} else {
			return "success";
		}
	}

	function getapiinfo($table, $value)
	{

		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT * FROM api WHERE $table = '$value'";
		$stmt = $mysqli->query($query);
		$data = $stmt->fetch_object();
		return $data;
	}

	function tokenupdate($token, $client_id)
	{
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "update clients set api_key=? where client_id=?";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param('ss', $token, $client_id);
		$stmt->execute();
		return "success";
	}

	function ipupdate($ip, $client_id)
	{
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "update clients set device_id=? where client_id=?";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param('si', $ip, $client_id);
		$stmt->execute();
		return "success";
	}

	function chngpwd($oldpwd, $newpwd)
	{
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "update clients set password=? where password=?";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param('si', $newpwd, $oldpwd);
		$stmt->execute();
		return "success";
	}

	function showtr($table, $value, $from, $till)
	{
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT * FROM transaction WHERE $table = '$value' ORDER BY id DESC LIMIT $from,$till";
		$stmt = $mysqli->query($query);
		return $stmt;
	}
	
	function showrch($from, $till)
	{
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT * FROM transaction  ORDER BY id DESC LIMIT $from,$till";
		$stmt = $mysqli->query($query);
		return $stmt;
	}
	
	function showclientwallettr($table, $value, $from, $till)
	{
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT * FROM client_wallet WHERE $table = '$value' ORDER BY id DESC LIMIT $from,$till";
		$stmt = $mysqli->query($query);
		return $stmt;
	}
	

	function showalltr($table, $value)
	{
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT * FROM transaction WHERE $table = '$value'";
		if ($stmt = $mysqli->prepare($query)) {

			/* execute query */
			$stmt->execute();

			/* store result */
			$stmt->store_result();
		}
		return $stmt->num_rows();
	}
	
	function showallrch()
	{
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT * FROM transaction";
		if ($stmt = $mysqli->prepare($query)) {

			/* execute query */
			$stmt->execute();

			/* store result */
			$stmt->store_result();
		}
		return $stmt->num_rows();
	}
	
	function totalcl()
	{
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT * FROM clients";
		if ($stmt = $mysqli->prepare($query)) {

			/* execute query */
			$stmt->execute();

			/* store result */
			$stmt->store_result();
		}
		return $stmt->num_rows();
	}
	
function showallclienttr($table, $value)
	{
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT * FROM client_wallet WHERE $table = '$value'";
		if ($stmt = $mysqli->prepare($query)) {

			/* execute query */
			$stmt->execute();

			/* store result */
			$stmt->store_result();
		}
		return $stmt->num_rows();
	}

	function totaltr($table, $value, $rdata)
	{
	    date_default_timezone_set('Asia/Kolkata');
	    $date = date('Y-m-d');
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT SUM($rdata) AS '$rdata' FROM transaction WHERE $table = '$value' and status='success' and date='$date'";
		$stmt = $mysqli->query($query);
		$data = $stmt->fetch_object();
		return $data;
	}
	
	function todaytr($rdata)
	{
	    date_default_timezone_set('Asia/Kolkata');
	    $date = date('Y-m-d');
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT SUM($rdata) AS '$rdata' FROM transaction WHERE status='success' and date='$date'";
		$stmt = $mysqli->query($query);
		$data = $stmt->fetch_object();
		return $data;
	}
	


	function fundrequest($limit)
	{

		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT * FROM client_wallet order by id desc LIMIT $limit";
		$stmt = $mysqli->query($query);
		return $stmt;
	}
	
	function ad_wallet_data()
	{

		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT * FROM ad_wallet order by id desc LIMIT 15";
		$stmt = $mysqli->query($query);
		return $stmt;
	}
	
	function fundreq($status)
	{

		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT * FROM client_wallet WHERE status='$status' ";
		$stmt = $mysqli->query($query);
		return $stmt;
	}
	
	function alltr($limit)
	{
	    $db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT  * FROM transaction order by id desc LIMIT $limit";
		$stmt = $mysqli->query($query);
		return $stmt;  
	}
	
	function client()
	{
	    $db = Database::getInstance();
	    $mysqli = $db->getConnection();
	    $query = "SELECT * FROM clients order by id DESC";
	    $stmt = $mysqli->query($query);
	    return $stmt;
	}
	
	function useravail($mobile,$email)
	{
	    $db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT * FROM clients WHERE mobile = '$mobile' or email = '$email'";
	if ($stmt = $mysqli->prepare($query)) {

			/* execute query */
			$stmt->execute();

			/* store result */
			$stmt->store_result();
		}
		return $stmt->num_rows();
	}
	
}
