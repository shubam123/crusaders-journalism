<?php //This is the logout script ?>
<?php
session_start(); //to ensure you are using same session
session_unset();
session_destroy(); //destroy the session
ob_start();
header("Location:../index.html"); //to redirect back to "index.php" after logging out
ob_end_flush();
exit();
?>