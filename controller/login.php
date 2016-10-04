
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

    if(isset($_POST['login']))
	{
		$username = htmlspecialchars($_POST['username']);
		$password = md5(htmlspecialchars($_POST['password']));

		$username = mysqli_real_escape_string($db->connection, $username);
		$password = mysqli_real_escape_string($db->connection, $password);

		echo $username . "<br>" . $password;


		$query = "SELECT * FROM users WHERE username = '$username' and password = '$password'";
	
		$result = $db->makeQuery($query) or die('Query failed!' . mysqli_error($db->connection));

		$num_rows = mysqli_num_rows($result);

		echo $num_rows;

		if($num_rows == 1)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$_SESSION['user_id'] = $row['user_id'];
				$_SESSION['fname']= $row['fname'];
				$_SESSION['lname']=$row['lname'];
				$_SESSION['gender']=$row['gender'];
				$_SESSION['email']=$row['email'];
				$_SESSION['username']=$row['username'];
				$_SESSION['password']=$row['password'];
				$_SESSION['role']=0;
				header("Location: ../index.html");
				exit();
			}
		}

		else
		{
			$message = "Login failed!";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
	}

?>