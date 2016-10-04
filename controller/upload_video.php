<?php //This script will verify the video upload. ?>
<?php session_start(); ?>
<?php require_once "../class/database/db.php"; 
	 $db=new Database;
	 $db->connect();
?>
<?php
	//if(isset($_POST['upload']))
	//{
		$title = $_POST['video_title'];
		$description = $_POST['video_description'];
		$tag = $_POST['video_tag'];

		//upload process starts
	   	$file_name = $_FILES['file1']['name'];
    	$file_size = $_FILES['file1']['size'];
		$file_type = $_FILES['file1']['type'];
		$temp_name = $_FILES['file1']['tmp_name'];
		 
		$location = "../uploads/videos/";


		$up = move_uploaded_file($temp_name, $location.$file_name);		
		if($up)
		{
		
			
			$uid = $_SESSION['user_id'];

			$query = "INSERT INTO `videos`(`id`, `name`,`title`, `description`, `tag`, `user_id`) VALUES (NULL,'$file_name', '$title', '$description','$tag', '$uid')";
			$db->makeQuery($query) or die("Error" . mysqli_error($db->connection));
		}






	//}


?>