<?php session_start(); ?>
<?php require_once "../class/database/db.php";
    $db=new Database;
    $db->connect();
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
        <!-- Not logined code -->
        <div id="no-login">

        <h1> Not logged in</h1>

        <input type="button" name="login" />
        <input type="button" name="signup" />

        </div>

        <?php

            }
            else
            {

        ?>




    <?php 
    }
    ?>





<!-- footer-->
<?php require "../components/footer.php" ?>

<!-- footer ends-->

<?php $db->disconnect(); ?>