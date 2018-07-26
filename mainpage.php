<?php
session_start();

if(!isset($_SESSION["username"]))
{
	header("location:google.com");
}
else
{
	$host="localhost";
	$dbUsername="root";
	$dbPassword="";
	$dbname="healthcare";
	$username=$_SESSION["username"];

	$conn= new mysqli($host, $dbUsername, $dbPassword, $dbname);

	if(mysqli_connect_error())
	{
		die('Connect Error('. mysqli_connect_errno().')'.mysqli_connect_error());
	}
	else
	{
		$sql="SELECT * FROM patient_details WHERE Aadhar_Number=$username";
		$get_row="SELECT * FROM patient_details WHERE Aadhar_Number=$username LIMIT 1";
		$result=mysqli_query($conn,$sql);
		$one_row=$result=mysqli_query($conn,$get_row);
		$user_row=mysqli_fetch_array($one_row);
		echo "Username = ";
		echo $user_row["name"];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Patient Data</title>
	<link rel="stylesheet" href="pstyle.css">
</head>
<body>

<header>
	<div class="container">
		<div id="branding">
			<h1><span class="highlight">Patient</span> Database</h1>
		</div>

		<div id="personalinfo">
			<div class="photo"><img src="photo.jpg" class="center"></div>
			<div class="details">
				<ul>
					<li><h3>Name: <?php echo $user_row['name']; ?></h3></li>
					<li><h3>Age : <?php echo $user_row['age']; ?></h3></li>
					<li><h3>Weight : <?php echo $user_row['weight']; ?></h3></li>
					<li><h3>Height : <?php echo $user_row['height']; ?></h3></li>
				</ul>
			</div>
		</div>

		<nav>
			<ul>
				<li><a href='http://localhost/healthcare/first.html'>Logout</a></li>
			</ul>
		</nav>
	</div>
</header>

<section id="current">
<div class="current_head"><h2>Current medical condition</h2></div>
<div class="current_details">
	<ul>
			<li><h3>Age : <?php echo $user_row['age']; ?></h3></li>
			<li><h3>Weight : <?php echo $user_row['weight']; ?></h3></li>
			<li><h3>Height : <?php echo $user_row['height']; ?></h3></li>
			<li><h3>Symptoms : <?php echo $user_row['symptoms']; ?></h3></li>
			<li><h3>Diagnosis : <?php echo $user_row['diagnosis']; ?></h3></li>
			<li><h3>Treatment : <?php echo $user_row['treatment']; ?></h3></li>
			<li><h3>Prescription : <?php echo $user_row['prescription']; ?></h3></li>
			<li><h3>Next Appointment : <?php echo $user_row['next_appointment']; ?></h3></li>
			<li><h3>Comment : <?php echo $user_row['comment']; ?></h3></li>
	</ul>
</div>

<section id="patient_history">
	<div class="display_table">
	<?php 

	while ($row = $result->fetch_assoc())
	{
    	echo $row['classtype']."<br>";
	}
	?>
	</div>
</section>


</body>
</html>
<?php } }?>