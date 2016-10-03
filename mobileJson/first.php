<?php 
 
    $user   = urldecode($_POST['usernameValue']);
    $pass   = urldecode($_POST['passValue']);
    $result = Array();   
    
    if($user == "shubam" && $pass == "shubam")
    {
    	$result['code']="1";
    }
    else
    {
    	$result['code']="0";
    }

   	header("Content-type : application/json");
	echo json_encode($result);
 ?>