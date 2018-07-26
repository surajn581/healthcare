<?php
session_start();

$p_aadhar=$_POST['p_aadhar'];
$p_password=$_POST['p_password'];

if (!empty($p_username) || !empty($p_password))
{
	$host="localhost";
	$dbUsername="root";
	$dbPassword="";
	$dbname="healthcare";

	$conn= new mysqli($host, $dbUsername, $dbPassword, $dbname);

	if(mysqli_connect_error())
	{
		die('Connect Error('. mysqli_connect_errno().')'.mysqli_connect_error());
	}
	else
	{
		$sql="SELECT * FROM patient_login where Aadhar_number=$p_aadhar";
		$result=mysqli_query($conn, $sql);
		if(mysqli_num_rows($result)==1)
		{
			$user_row = mysqli_fetch_array($result);
			if($user_row['password']==$p_password)
			{
				echo "login successfull";
				$_SESSION["username"]=$p_aadhar;
				$_SESSION["password"]=$p_password;
				header("location:mainpage.php");
			}
			else
			{
				echo "username or password is incorrect";
			}
		}
		else
		{
			echo "no such aadhar number exists in our record";
		}
	}



}
?>