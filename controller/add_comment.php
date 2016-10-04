
<?php session_start(); ?>
<?php

	
?>


<?php 
	require_once "../class/database/db.php";
    $db=new Database;
    $db->connect();

    $video_id = $_GET['video_id'];
    $comm = $_GET['comment'];
    $user_name = $_SESSION['username'];
    $role = $_SESSION['role'];


    if(isset($_SESSION['user_id']))
    {
    	$user_id = $_SESSION['user_id'];
		$query = "INSERT INTO `comments`(video_id, user_id, user_name, comment, role) VALUES ('$video_id','$user_id','$user_name','$comm','$role')";
	}
	if(isset($_SESSION['tag_id']))
	{
		$tag_id = $_SESSION['tag_id'];
		$query = "INSERT INTO `comments`(video_id, user_id, user_name, comment, role) VALUES ('$video_id','$tag_id','$user_name','$comm','$role')";
	}

		if($db->makeQuery($query))
		{		
			header('Location: ../pages/single_item.php?video_id=' . $video_id);
			exit();
			
		}
		else
		{
			die("query error" . mysqli_error($db->connection));
		}


?>
