<?php 
 
    
    require_once "../class/database/db.php";
    $db=new Database;
    $db->connect();

    $fname = urldecode($_POST['fname']);
    $lname = urldecode($_POST['lname']);
    $gender = urldecode($_POST['gender']);
    $email = urldecode($_POST['email']);
    $username = urldecode($_POST['username']);
    $password = md5(urldecode($_POST['password'])); 



    $result = Array();   



    $query = "INSERT INTO `users`(user_id, fname, lname, gender, email, username, password) VALUES (NULL,'$fname' , '$lname', '$gender', '$email','$username', '$password')";


     if($db->makeQuery($query))
        {
            $result['code']="1"; //successful
        }
    else
        {
            $result['code']="0"; //not successful
        }


   	header("Content-type : application/json");
	echo json_encode($result);
 

 ?>
