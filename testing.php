<?php
session_start();
if(!isset($_SESSION["username"]))
{
	header("location:google.com");
}
else
{
?>
<!DOCTYPE html>
<html>
<head>
	<title>testing</title>
</head>
<body>
<p>logged in as: <?php echo $_SESSION["username"]; ?></p>
</body>
</html>
<?php
}
?>