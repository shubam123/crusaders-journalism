
<?php session_start(); ?>
<?php

	if(isset($_SESSION['tag_id']))
	{
		header("Location:../home.php");
		exit();
	}
?>

<?php 

	require_once "../../class/database/db.php";
    $db=new Database;
    $db->connect();

    if(isset($_POST['submit']))
	{
		$username = htmlspecialchars($_POST['username']);
		$password = htmlspecialchars($_POST['password']);

		$username = mysqli_real_escape_string($db->connection, $username);
		$password = mysqli_real_escape_string($db->connection, $password);



		$query = "SELECT * FROM officials WHERE username = '$username' and password = '$password'";
	
		$result = $db->makeQuery($query) or die('Query failed!' . mysqli_error($db->connection));

		$num_rows = mysqli_num_rows($result);

		echo $num_rows;

		if($num_rows == 1)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$_SESSION['tag_id'] = $row['tag_id'];
				$_SESSION['name']= $row['name'];
				$_SESSION['username']=$row['username'];
				$_SESSION['password']=$row['password'];
				$_SESSION['role']=1;
				header("Location: ../home.php");
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