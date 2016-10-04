<?php session_start(); ?>
<?php require_once "../class/database/db.php";
    $db=new Database;
    $db->connect();

    include_once "../function.php";
?>


<!-- header-->
<?php require "../components/header.php" ?>
<!-- header ends-->

 <div id="wrapper">


        <!-- navigation starts-->
        <?php require "../components/navigation.php" ?>
        <!-- navigation ends-->


         <?php 
        if(!isset($_SESSION['user_id']))
        {
        ?>

        	<script type="text/javascript">
        		window.location="index.php";
        	</script>
        <?php 
   		 }
   		 else
   		 {
   		 	if(isset($_GET['video_id']))
   		 	{
   		 		$vid = $_GET['video_id'];
   		 		$query="SELECT * FROM `videos` WHERE id='$vid'";
   		 		$result = $db->makeQuery($query);
   		 		$row = mysqli_fetch_assoc($result)
   		 		
   		 		$name = $row['name'];
   		 		$title = $row['title'];
   		 		$desc = $row['description'];
   		 		$tag = $row['tag'];
   		 		$user = $row['user_id'];
   		 		$tsp = $row['timestamp'];
   		 		

        ?>



        <div class="container-fluid">
	        <div class="row">
		        <div class="col-xs-offset-1 col-xs-10">
		        
		        <video width="100%" height="400px" controls>
                  <source src="//stream.flowplayer.org/bauhaus.mp4.mp4" type="video/mp4">
                  Your browser does not support the video tag.
                </video>
		        
		        </div>
	        </div>


	        <br clear="all">

	        <div class="row">
	        	<form action="" method="POST">
	        	<textarea name="new_comment"></textarea>
	        	<input type="submit" name="comment">
	        	</form>
	        </div>

	        
	        <div class="row">



	        	<div class="col-xs-11 col-sm-6">
	        	<h2 class="text-center"><u>Normal User</u></h2>

	       		 	<!-- comment-->
	        		<div class="col-xs-12">
	        		<?php

	        			$query = "SELECT * FROM `comments` WHERE video_id='$vid_id' and role = 0";
	        			$result = $db->makeQuery($query);
	        			while($row = mysqli_fetch_assoc($result))
	        			{ 
	        		?>
	        			<h3><u><?php $row['user_name'] ?></u>u></h3>
	        			<br>
	        			<p class="text-justify"><?php echo $row['message']; ?></p>
	        			<hr>

        			<?php } ?>
	        		</div> 
	        	
	        	</div>

	        	<div class="col-xs-11 col-sm-6">
  		        	<h2 class="text-center"><u>Authority</u></h2>

  		        	 	<!-- comment-->
	        		<div class="col-xs-12">
	        		<?php

	        			$query = "SELECT * FROM `comments` WHERE video_id='$vid_id' and role = 1";
	        			$result = $db->makeQuery($query);
	        			while($row = mysqli_fetch_assoc($result))
	        			{ 
	        		?>
	        			<h3><u><?php $row['user_name'] ?></u>u></h3>
	        			<br>
	        			<p class="text-justify"><?php echo $row['message']; ?></p>
	        			<hr>
	        			<?php } ?>
	        		</div> 



	        	</div>

	        </div>




        </div>










        <?php 
        	}
        } 

        ?>