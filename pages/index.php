<?php session_start(); ?>
<?php require_once "../class/database/db.php";
    $db=new Database;
    $db->connect();

    include_once "../function.php";
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
                        <h3 class="text-center">CRUSADERS</h3>

                        <p class="text-justify">People's Voice</p>

                        <p></p>
                    </div>

                    <div class="col-md-4">
                        <h3 class="text-center">MAKING A DIFFERENCE</h3>

                        <p class="text-justify">Taking Journalism to the next level.</p>
                    </div>

                    <div class="col-md-4">
                        <h3 class="text-center">SRM HACKATHON</h3>

                        <p class="text-justify">Some random content.</p>
                    </div>
                </div>
            </div>
        </div>



                <!-- modals -->

                    <div class="modal fade" id="loginModal" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 style="color:red;"><span class="glyphicon glyphicon-lock"></span> Login</h4>
                                </div>
                                <div class="modal-body">

                                <!-- form to login-->
                                  <form role="form" method="POST" action="../controller/login.php">
                                    <div class="form-group">
                                      <label for="username"><span class="glyphicon glyphicon-user"></span> Username</label>
                                      <input type="text" class="form-control" id="username" name="username" placeholder="Enter email or username" required="true">
                                    </div>

                                    <div class="form-group">
                                      <label for="password"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                                      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required="true">
                                    </div>

                                    <div class="checkbox">
                                      <label><input type="checkbox" value="" checked>Remember me</label>
                                    </div>

                                    <button type="submit" class="btn btn-default btn-success btn-block" name="login"><span class="glyphicon glyphicon-off"></span> Login</button>
                                  </form>
                                  <!-- form ends-->


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
                                  <h4 style="color:red;"><span class="glyphicon glyphicon-lock"></span>Signup</h4>
                                </div>
                                <div class="modal-body">

                                <!-- form to signup -->
                                  <form role="form" method="POST" action="../controller/signup.php">

                                    <div class="form-group">
                                      <label for="fname"><span class="glyphicon glyphicon-user"></span>First name:</label>
                                      <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter first name" required="true">
                                    </div>

                                    <div class="form-group">
                                      <label for="lname"><span class="glyphicon glyphicon-eye-open"></span>Last name:</label>
                                      <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter last name" required="true">
                                    </div>

                                    <div class="form-group">
                                      <label for="gender"><span class="glyphicon glyphicon-eye-open"></span>Gender:</label>
                                        <div class="row text-center">
                                            <div class="col-xs-4">
                                            <input class="form-control" type="radio" name="gender" value="male" checked/>
                                            Male
                                            </div>
                                            <div class="col-xs-4">
                                            <input class="form-control" type="radio" name="gender" value="female" />
                                            Female
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                      <label for="email"><span class="glyphicon glyphicon-user"></span>Email-id:</label>
                                      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required="true">
                                    </div>

                                    <div class="form-group">
                                      <label for="username"><span class="glyphicon glyphicon-user"></span>Username:</label>
                                      <input type="text" class="form-control" id="username" name="username" placeholder="Enter date of birth" required="true">
                                    </div>


                                    <div class="form-group">
                                      <label for="password"><span class="glyphicon glyphicon-eye-open"></span> Password:</label>
                                      <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required="true">
                                    </div>

                                    
                                    <div class="checkbox">
                                      <label><input type="checkbox" value="" required="true">You have read our Terms&Services</label>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-default btn-success btn-block" name="submit"><span class="glyphicon glyphicon-off"></span> Signup</button>
                                  </form>

                                <!-- form ends here -->




                                </div>

                            </div>
                        </div>
                    </div>




        <?php

            }
            else
            {

        ?>

        <div id="login">
          <div class="container-fluid">

          <?php $loc = "../uploads/videos/"; ?>
            
            <!-- section1-->
            <h2><b><u>RECENT</u></b></h2>
            <br clear="all"><br>
            <div class="row">


            <?php

              $query ="SELECT * FROM `videos` ORDER BY `timestamp` ASC LIMIT 4";
              $result = $db->makeQuery($query);
              
              while($row = mysqli_fetch_assoc($result))
              {
                $url = $loc . $row['name'];
                $title = $row['title'];
                ?>
                <div class="col-xs-10 col-sm-3">
                <a href="single_item.php?video_id=<?php echo $row['id'] ?>">
                <video height="250px" width="250px" controls>
                  <source src='<?php echo $url; ?>' type="video/mp4">
                  Your browser does not support the video tag.
                </video>
                <p class="text-center"><?php echo $title; ?></p>
                </a>
              </div>

            <?php
              }
            ?>


              </div>




            <br clear="all"><br>


            <!-- section2-->
            <h2><b><u>NEGLECTED</u></b></h2>
            <br clear="all"><br>
            <div class="row">

          <?php
            $query ="SELECT * FROM `videos`";
            $result = $db->makeQuery($query);
            while($row = mysqli_fetch_assoc($result))
            {

              if(noaction($row['timestamp'])>=30)
              {

          ?>
            <?php
              $url = $loc . $row['name'];
                $title = $row['title'];
                ?>
                <div class="col-xs-10 col-sm-3">
                <a href="single_item.php?video_id=<?php echo $row['id'] ?>">
                <video height="250px" width="250px" controls>
                  <source src='<?php echo $url; ?>' type="video/mp4">
                  Your browser does not support the video tag.
                </video>
                <p class="text-center"><?php echo $title; ?></p>
                </a>

          <?php
              }
             }
          ?>

              <div class="col-xs-10 col-sm-3">
                <video width="250px" height="250px" controls>
                  <source src="movie.mp4" type="video/mp4">
                  <source src="movie.ogg" type="video/ogg">
                  Your browser does not support the video tag.
                </video>
              </div>



            </div>          
            


            <br clear="all"><br>



            <!-- section3-->
            <h2><b><u>Successful</u></b></h2>
            <br clear="all"><br>          

            <div class="row">



             <?php

              $query ="SELECT * FROM `videos` WHERE `action` = 1 LIMIT 4";
              $result = $db->makeQuery($query);
             
             while($row = mysqli_fetch_assoc($result))
              {
                $url = $loc . $row['name'];
                $title = $row['title'];
                ?>
                <div class="col-xs-10 col-sm-3">
                <a href="single_item.php?video_id=<?php echo $row['id'] ?>">
                <video height="250px" width="250px" controls>
                  <source src='<?php echo $url; ?>' type="video/mp4">
                  Your browser does not support the video tag.
                </video>
                <p class="text-center"><?php echo $title; ?></p>
                </a>
              </div>

            <?php
              }
            ?>


              <div class="col-xs-10 col-sm-3">
                <video width="250px" height="250px" controls>
                  <source src="movie.mp4" type="video/mp4">
                  <source src="movie.ogg" type="video/ogg">
                  Your browser does not support the video tag.
                </video>
              </div>


        
            </div>

            <br clear="all"><br>



            <!-- section4-->
            <h2><b><u>Proximate:</u></b></h2>
            <br clear="all"><br>
            <div class="row">


            <div class="col-xs-10 col-sm-3">
                <video width="250px" height="250px" controls>
                  <source src="movie.mp4" type="video/mp4">
                  <source src="movie.ogg" type="video/ogg">
                  Your browser does not support the video tag.
                </video>
              </div>

              <div class="col-xs-10 col-sm-3 ">
                <video width="250px" height="250px" controls>
                  <source src="movie.mp4" type="video/mp4">
                  <source src="movie.ogg" type="video/ogg">
                  Your browser does not support the video tag.
                </video>
              </div>

              <div class="col-xs-10 col-sm-3 ">
                <video width="250px" height="250px" controls>
                  <source src="movie.mp4" type="video/mp4">
                  <source src="movie.ogg" type="video/ogg">
                  Your browser does not support the video tag.
                </video>
              </div>

              

            <br clear="all"><br>

            </div>
          </div>
        </div>




        <!-- modals -->

                    <div class="modal fade" id="uploadModal" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 style="color:red;"><span class="glyphicon glyphicon-lock"></span>Upload Video</h4>
                                </div>
                                <div class="modal-body">

                                <!-- form to upload video-->
                                  <form role="form" method="POST" action="../controller/upload_video.php" enctype="multipart/form-data" >

                                      <div class="form-group">
                                        <label for="upload"><span class="glyphicon glyphicon-user"></span>Video:</label>
                                        <input id="file1" name="file1" type="file" class="form-control" />
                                      </div>
                                      <div class="form-group">
                                          <label for="title"><span class="glyphicon glyphicon-user"></span>Title:</label>
                                          <input type="text" class="form-control" name="video_title" placeholder="Enter Title" required="true"/>
                                      </div>
                                     
                                      <div class="form-group">
                                          <label for="description"><span class="glyphicon glyphicon-user"></span>Description:</label>
                                          <textarea name="video_description" class="form-control" placeholder="Enter Description" required></textarea>
                                      </div>

                                      <div class="form-group">
                                          <label for="description"><span class="glyphicon glyphicon-user"></span>Tag:</label>
                                          <select class="form-control" name="video_tag" autofocus required="true">
                                              <option value="">Select one...</option>
                                              <?php
                                                $query = "SELECT * FROM `tags`";
                                                $result = $db->makeQuery($query);
                                                while($row = mysqli_fetch_assoc($result))
                                                {
                                                  echo "<option value=" . $row['tag_id'] . ">" . $row['tag_name'] . "</option>";
                                                }

                                              ?>
                                           </select>
                                      </div>


                                    <button type="submit" class="btn btn-default btn-success btn-block" name="upload"><span class="glyphicon glyphicon-off"></span> Upload</button>

                                  </form>
                                  <!-- form ends-->


                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>









    




    <?php 
    }
    ?>





<!-- footer-->
<?php require "../components/footer.php" ?>

<!-- footer ends-->

<?php $db->disconnect(); ?>