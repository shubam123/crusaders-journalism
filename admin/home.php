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
        <?php require "../components/navigation_admin.php" ?>
        <!-- navigation ends-->

         <?php 
        if(!isset($_SESSION['tag_id']))
        {
        ?>
        <script type="text/javascript">
            window.loaction = "index.php";
        </script>

        <?php
        }
        else
        {

        ?>


        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">26</div>

                                    <div>Total Comments!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">12</div>
                                    <div>Issues Completed</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-arrows fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">12</div>
                                    <div>New Issues</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">13</div>
                                    <div>Negleted Issues</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            </div>

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">RECENT</h1>
                    </div>

                    <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            RECENT VIDEOS
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Uploaded By:</th>
                                        <th>Date</th>
                                        <th>Video</th>
                                    </tr>
                                </thead>

                                <tbody>


                                <?php
                                $num=1;
                                $t=$_SESSION['tag_id'];
                                $query = "SELECT * FROM videos WHERE tag=$t";
                                $result = $db->makeQuery($query) or die("Error" . mysqli_error($db->connection));
                                while($row=mysqli_fetch_assoc($result))
                                {
                                    if($num%2==1)
                                        echo "<tr class='odd gradeA'>";
                                    else
                                        echo "<tr class='even gradeA'>";
                                ?>
                                    
                                        <td><?php echo $row['title']; ?></td>
                                        <td><?php echo $row['description']; ?></td>
                                        <td><?php echo $row['user_id']; ?></td>
                                        <td class="center"><?php echo $row['timestamp']; ?></td>
                                        <?php $vid_id = $row['id']; ?>
                                        <td class="center"><?php echo "<a href=". "'../pages/single_item.php?video_id=$vid_id'>"; ?> Link</a></td>
                                    </tr>


                                <?php } ?>



                                </tbody>
                            </table>
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->




                    <!-- /.col-lg-12 -->
            </div>



            </div>




        <?php } ?>




<!-- footer-->
<?php require "../components/footer.php" ?>




<!-- footer ends-->

<?php $db->disconnect(); ?>