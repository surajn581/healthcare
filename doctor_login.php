<?php
$d_licence=$_POST['d_licence'];
$d_password=$_POST['d_password'];

if (!empty($p_username) || !empty($d_password))
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
		$sql="SELECT * FROM doctor_login where Licence_number=$d_licence";
		$result=mysqli_query($conn, $sql);
		if(mysqli_num_rows($result)==1)
		{
			$user_row = mysqli_fetch_array($result);
			if($user_row['password']==$d_password)
			{
				echo "login successfull";
				header('Location: http://localhost/healthcare/permission.html');
				exit();
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