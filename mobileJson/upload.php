 

<?php
 if($_SERVER['REQUEST_METHOD']=='POST'){
 $file_name = $_FILES['myFile']['name'];
 $file_size = $_FILES['myFile']['size'];
 $file_type = $_FILES['myFile']['type'];
 $temp_name = $_FILES['myFile']['tmp_name'];
 
 $location = "uploads/";
 
 move_uploaded_file($temp_name, $location.$file_name);
 echo "http://ec2-52-66-4-99.ap-south-1.compute.amazonaws.com/uploads/".$file_name;
 }


 else{
 echo "Error";
 }

 ?>