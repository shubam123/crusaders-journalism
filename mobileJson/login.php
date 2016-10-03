<?php 


    require_once "../class/database/db.php";
    $db = new Database;
    $db->connect();

 
    $user = urldecode($_POST['usernameValue']);
    $pass = md5(urldecode($_POST['passValue'])); 


    $result = Array();  

    $query = "SELECT * FROM `users` WHERE username = '$user' and password = '$pass'";

    $resultq = $db->makeQuery($query) or die('Query failed!' . mysqli_error($db->connection));

    $num_rows = mysqli_num_rows($resultq);

    if($num_rows == 1)
        {
            $result['code']="1"; // if credentials are right
            
            while($row = mysqli_fetch_assoc($resultq))
            {
            $result['user_id'] = $row['user_id'];
            $result['fname']= $row['fname'];
            $result['lname']= $row['lname'];
            $result['gender']= $row['gender'];
            $result['email']= $row['email'];
            $result['username']= $row['username'];
            $result['password']= $row['password'];

            }
        }
    else
        {
            $result['code']="0"; // if credentials are wrong
        }




    header("Content-type : application/json");
    echo json_encode($result); 
 ?>





 