
<?php session_start(); ?>
<?php

	if(isset($_SESSION['user_id']))
	{
		header("Location: ../index.html");
		exit();
	}
?>


<?php 
	require_once "../class/database/db.php";
    $db=new Database;
    $db->connect();


    if(isset($_POST['submit']))
    {

		$fname = htmlspecialchars($_POST['fname']);
		$lname = htmlspecialchars($_POST['lname']);
		$gender = htmlspecialchars($_POST['gender']);
		$email = htmlspecialchars($_POST['email']);
		$username = htmlspecialchars($_POST['username']);
		$password = md5(htmlspecialchars($_POST['password']));		

		$fname = mysqli_real_escape_string($db->connection, $fname);
		$lname = mysqli_real_escape_string($db->connection, $lname);
		$dob = mysqli_real_escape_string($db->connection, $dob);
		$gender = mysqli_real_escape_string($db->connection, $gender);
		$email = mysqli_real_escape_string($db->connection, $email);
		$username = mysqli_real_escape_string($db->connection, $username);
		$password = mysqli_real_escape_string($db->connection, $password);


		$query = "INSERT INTO `users`(user_id, fname, lname, gender, email, username, password) VALUES (NULL,'$fname' , '$lname', '$gender', '$email','$username', '$password')";


		if($db->makeQuery($query))
		{
			$message = "Account created";
			echo "<script type='text/javascript'>alert('$message');</script>";
			header('Location: ../index.html');
			exit();
		}
		else
		{
			die("query error" . mysqli_error($db->connection));
		}


	}
















?>
