<?php session_start(); ?>
<?php require_once "classes/database/db.php";
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


  	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link href="assets/css/bootstrap/bstrap-custom.css" rel="stylesheet" type="text/css" />
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
	<!--css files end here-->

	<!--js files-->
  	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
   	<script type="text/javascript" src="assets/js/cycle2.js"></script>
	<!--js files end here-->

	<title>SRM hackathon</title>
</head>

<body id="home">







</body>
</html>
<?php $db->disconnect(); ?>