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

            <div class="container-fluid">
                <div class="col-xs-12">
                    <div class="cycle-slideshow">
                        <img src="http://malsup.github.io/images/p1.jpg" width="100%" height="450px" style="min-width: 100%">
                        <img src="http://malsup.github.io/images/p2.jpg" width="100%" height="450px"  style="min-width: 100%">
                        <img src="http://malsup.github.io/images/p3.jpg" width="100%" height="450px" style="min-width: 100%">
                        <img src="http://malsup.github.io/images/p4.jpg" width="100%" height="450px"  style="min-width: 100%">
                    </div>
                </div>
            </div>





            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-4">
                        <h3 class="text-center">Center aligned text.</h3>

                        <p class="text-justify">Justified text.</p>

                        <p></p>
                    </div>

                    <div class="col-md-4">
                        <h3 class="text-center">Center aligned text.</h3>

                        <p class="text-justify">Justified text.</p>
                    </div>

                    <div class="col-md-4">
                        <h3 class="text-center">Center aligned text.</h3>

                        <p class="text-justify">Justified text.</p>
                    </div>
                </div>
            </div>
        </div>



                    <div class="modal fade" id="loginModal" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 style="color:red;"><span class="glyphicon glyphicon-lock"></span> Login</h4>
                                </div>
                                <div class="modal-body">
                                  <form role="form">
                                    <div class="form-group">
                                      <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
                                      <input type="text" class="form-control" id="usrname" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                      <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                                      <input type="text" class="form-control" id="psw" placeholder="Enter password">
                                    </div>
                                    <div class="checkbox">
                                      <label><input type="checkbox" value="" checked>Remember me</label>
                                    </div>
                                    <button type="submit" class="btn btn-default btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
                                  </form>
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                  <p>Not a member? <a href="#">Sign Up</a></p>
                                  <p>Forgot <a href="#">Password?</a></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="signupModal" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 style="color:red;"><span class="glyphicon glyphicon-lock"></span> Signup</h4>
                                </div>
                                <div class="modal-body">


                                  <form role="form">
                                    <div class="form-group">
                                      <label for="usrname"><span class="glyphicon glyphicon-user"></span>First name:</label>
                                      <input type="text" class="form-control" id="usrname" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                      <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Last name:</label>
                                      <input type="text" class="form-control" id="psw" placeholder="Enter password">
                                    </div>
                                    <div class="checkbox">
                                      <label><input type="checkbox" value="" checked>Remember me</label>
                                    </div>
                                    <button type="submit" class="btn btn-default btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Signup</button>
                                  </form>




                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                  <p>Not a member? <a href="#">Sign Up</a></p>
                                  <p>Forgot <a href="#">Password?</a></p>
                                </div>
                            </div>
                        </div>
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