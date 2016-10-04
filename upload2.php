 

<?php
 if($_SERVER['REQUEST_METHOD']=='POST'){
 $file_name = $_FILES['image']['name'];
 $file_size = $_FILES['image']['size'];
 $file_type = $_FILES['image']['type'];
 $temp_name = $_FILES['image']['tmp_name'];
 
 $location = "uploads/";
 
 move_uploaded_file($temp_name, $location.$file_name);
 echo "http://ec2-52-66-4-99.ap-south-1.compute.amazonaws.com/uploads/".$file_name;
 }


 else{
 echo "Error";
 }

 ?>