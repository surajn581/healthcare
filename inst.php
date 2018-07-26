<?php

	//collecting patient details	
	$patient_aadhar=$_POST['patient_aadhar'];
	$patient_name=$_POST['patient_name'];
	$patient_age=$_POST['patient_age'];
	$patient_symptoms=$_POST['patient_symptoms'];
	$patient_diagnosis=$_POST['patient_diagnosis'];
	$patient_treatment=$_POST['patient_treatment'];
	$patient_prescription=$_POST['patient_presciption'];
	$patient_next_appointment=$_POST['patient_next_appointment'];
	$patient_weight=$_POST['patient_weight'];
	$patient_height=$_POST['patient_height'];
	$comment=$_POST['comment'];

if (!empty($patient_aadhar) || !empty($patient_name) || !empty($patient_age) || !empty($patient_symptoms) || !empty($patient_diagnosis) ||
!empty($patient_treatment) || !empty($patient_prescription))
{
	//database details
	$host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "healthcare";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if (mysqli_connect_error()) 
    {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } 
    else 
    {
    	$INSERT = "INSERT Into patient_details (Aadhar_Number, name, age, symptoms, diagnosis, treatment, prescription, next_appointment, comment, weight, height) values(?,?,?,?,?,?,?,?,?,?,?)";
		$stmt=$conn->prepare($INSERT);
		$stmt->bind_param("ssissssssii",$patient_aadhar, $patient_name, $patient_age, $patient_symptoms, $patient_diagnosis, $patient_treatment, $patient_prescription, $patient_next_appointment,$comment, $patient_weight, $patient_height);
		$stmt->execute();
		echo "Details have been updated";
		$stmt->close();
		$conn->close();
	}
}

else
{
	echo "Please fill the required fields";
	die();
}


?>