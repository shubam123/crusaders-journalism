<?php session_start(); ?>
<?php require_once "../class/database/db.php";
    $db=new Database;
    $db->connect();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=0" />


	
	<meta name="description" content="The place where you can share what's going wrong with you and in your surroundings and can discuss how to achieve the optimum solution." />
	<meta name="robots" content="index,follow" />
	<meta name="keywords" content="Eye, Crime, India, Problems , Currouption" />

	<!--css files-->



	<title>SRM hackathon</title>
</head>

<body id="home">







</body>
</html>
<?php $db->disconnect(); ?>