<?php
include_once("include/loginstatus.php");
if (!isset($_SESSION["userid"])) {
  header("location: index.php");
  exit();
}

// VARIABLES
$id = "";
$accname = "";
$email = "";
$password = "";
$ip = "";
$datereg = "";
$lastlogin = "";
$level = "";
$pheading = "";
$pbody = "";
$fname = "";
$user_count = 0;
$alert_count = 0;
$seller_count = 0;
$supplier_count = 0;

// GET USER ID
if(isset($_GET["id"])){
  $id = preg_replace('#[^a-z0-9-]#i', '', $_GET['id']);
} else {
  header("location: index.php");
  exit(); 
}

// SELECT USER INFO
$sql_user = "SELECT * FROM urrs_user WHERE id='$id' LIMIT 1";
$user_query = mysqli_query($db_conn, $sql_user);
while ($row = mysqli_fetch_array($user_query, MYSQLI_ASSOC)) {
  $id = $row["id"];
  $fname = $row["user_full_name"];
  $username = $row["user_username"];
  $password = $row["user_pass"];
  $ip = $row["user_ip"];
  $datereg = $row["user_date_created"];
  $lastlogin = $row["user_last_login"];
  $level = $row["user_level"];
}

// CHECK TO SEE IF THE VIEWER IS THE ACCOUNT USER
$isOwner = "No";

if($id == $log_id && $user_ok == true){
  $isOwner = "Yes";
}

// ROUTE
if(

  (
    !isset($_GET["dashboard"])
    && !isset($_GET["booking"])
    && !isset($_GET["reports"])
    && !isset($_GET["recentabuse"]) 
    && !isset($_GET["alerts"]) 
    && !isset($_GET["statistics"])          
    )

// IF ADMIN LEVEL
  || (isset($_GET["dashboard"]) && trim($_GET["dashboard"]) != "focus") 

  || (isset($_GET["booking"]) && trim($_GET["booking"]) != "focus")

  || (isset($_GET["reports"]) && trim($_GET["reports"]) != "focus")

  || (isset($_GET["recentabuse"]) && trim($_GET["recentabuse"]) != "focus")
  
  || (isset($_GET["alerts"]) && trim($_GET["alerts"]) != "focus")  

  || (isset($_GET["statistics"]) && trim($_GET["statistics"]) != "focus")  

  ) {
  $pheading = "Erorr 404";
  $pbody = "Page not found.";
} else if (isset($_GET["dashboard"]) && trim($_GET["dashboard"]) == "focus"){
  $pheading = "Dashboard";
  $classactivedashboard = "active";
} else if (isset($_GET["booking"]) && trim($_GET["booking"]) == "focus"){
  $pheading = "Booking Details";
  $classactiveusers = "active";
} else if (isset($_GET["reports"]) && trim($_GET["reports"]) == "focus"){
  $pheading = "Reports";
  $classactivereports = "active";
} else if (isset($_GET["recentabuse"]) && trim($_GET["recentabuse"]) == "focus"){
  $pheading = "Recent Crimes";
  $classactiveabuseannouncement = "active";
} else if (isset($_GET["alerts"]) && trim($_GET["alerts"]) == "focus"){
  $pheading = "Alerts";
  $classactivealerts = "active";
} else if (isset($_GET["statistics"]) && trim($_GET["statistics"]) == "focus"){
  $pheading = "Statistics";
  $classactivestatistics = "active";
} else {
  $pheading = "Erorr 404";
  $pbody = "Page not found.";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>URRS - Account</title>

    <link rel="icon" type="image/png" href="image/logo.png" />

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css?refresh=true" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">URRS</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <?php echo $fname; ?> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="account.php?id=<?php echo $id; ?>&dashboard=focus"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="account.php?id=<?php echo $id; ?>&booking=focus"><i class="fa fa-calendar" aria-hidden="true"></i> Booking Details</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-list-ol" aria-hidden="true"></i> Date Wise</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-list-ul" aria-hidden="true"></i> Name Wise</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <?php if (isset($_GET["dashboard"]) && trim($_GET["dashboard"]) == "focus") { ?>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><?php echo $pheading; ?></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-check fa-5x" aria-hidden="true"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $alert_count; ?></div>
                                        <div>Date Reserved</div>
                                    </div>
                                </div>
                            </div>
                            <a href="account.php?id=<?php echo $id; ?>&alerts=focus">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $user_count; ?></div>
                                        <div>Users Account</div>
                                    </div>
                                </div>
                            </div>
                            <a href="account.php?id=<?php echo $id; ?>&users=focus">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <?php } else if (isset($_GET["booking"]) && trim($_GET["booking"]) == "focus") { ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header"><?php echo $pheading; ?></h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Organize</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Research and Ddevelopment Conference</td>           
                                            <td>John Doe</td>
                                            <td>2018/6/2</td>
                                            <td>11:00 am - 12:00 pm, 01:00 pm - 02:00pm</td>
                                            <td>john@john.com</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Aquiantance Party</td>           
                                            <td>Adam Smith</td>
                                            <td>2018/6/3</td>
                                            <td>11:00 am - 12:00 pm, 01:00 pm - 02:00pm</td>
                                            <td>adam@admin.com</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>JS Prom Night</td>           
                                            <td>Jane Doe</td>
                                            <td>2018/6/4</td>
                                            <td>11:00 am - 12:00 pm, 01:00 pm - 02:00pm</td>
                                            <td>jane@jane.com</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Paint Exhibit</td>           
                                            <td>Smith Shock</td>
                                            <td>2018/6/5</td>
                                            <td>11:00 am - 12:00 pm, 01:00 pm - 02:00pm</td>
                                            <td>smith@smith.com</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Student Council Election</td>           
                                            <td>Tatum Channing</td>
                                            <td>2018/6/6</td>
                                            <td>11:00 am - 12:00 pm, 01:00 pm - 02:00pm</td>
                                            <td>tatum@tatum.com</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

            <?php } else if (isset($_GET["reports"]) && trim($_GET["reports"]) == "focus") { ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header"><?php echo $pheading; ?></h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-3">
                            <form role="form" onsubmit="return false;">
                            <fieldset>
                                <span id="statusaddreport"></span>
                                <div class="form-group" >
                                  <select class="form-control" id="add-report-ra">
                                    <option value="">Republic Act</option>
                                    <option value="1">Acts of Lasciviuosness RA 7610</option>
                                    <option value="2">Physical Abuse RA 9262</option>
                                    <option value="3">Violation of RA 7610, Child Abuse RA 7610</option>
                                    <option value="4">Statutory Rape RA 8353</option>
                                    <option value="5">Rape RA 8353</option>
                                    <option value="6">Violation of RA 9262</option>
                                    <option value="7">Slight Physical Injury in Relation to RA 7610</option>
                                    <option value="8">Rape in Relation to RA 7610 RA 8353</option>
                                    <option value="9">Physical Abuse RA 7610</option>
                                    <option value="10">Attempted Rape in Relation to RA 7610</option>
                                    <option value="11">Attempted Rape 8353</option>
                                    <option value="12">Sexual Physical Injury RA 9262</option>
                                    <option value="13">Rape (4 Counts) RA 8353</option>
                                    <option value="14">Economic Abuse RA 9262</option>
                                    <option value="15">Frustrated Parricide in Relation RA 7610</option>
                                    <option value="16">Physical Injury in Relation to RA 7610</option>
                                    <option value="17">Unjust Vexation RA 7610</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Type of Violence" id="add-report-type-violence" name="email" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Case Number" id="add-report-case-number" name="email" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Report Name" id="add-report-name" name="email" type="text" autofocus>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button id="addReportBtn" class="btn btn-lg btn-primary btn-block" onclick="addReportNews()">Add</button>
                            </fieldset>
                        </form>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Republic Act</th>
                                            <th>Type of Violence</th>
                                            <th>Case Number</th>
                                            <th>Name</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM hervoice_report ORDER BY id DESC";
                                        $query = mysqli_query($db_conn, $sql);
                                        $count = 0;
                                        while($row = mysqli_fetch_array($query)) {  
                                            $count++; 

                                            $recid = $row["id"];
                                            $ra = $row["report_ra"];
                                            $type = $row["report_type_violence"];
                                            $case = $row["report_case_number"];  
                                            $name = $row["report_name"];  
                                            $date = $row["report_date"];
                                            $newDate = date("M d, Y H:i A", strtotime($date));

                                            $ratext = "";

                                            if($ra == "1") {
                                                $ratext = "Acts of Lasciviuosness RA 7610";
                                            } else if($ra == "2") {
                                                $ratext = "Physical Abuse RA 9262";
                                            } else if($ra == "3") {
                                                $ratext = "Violation of RA 7610, Child Abuse RA 7610";
                                            } else if($ra == "4") {
                                                $ratext = "Statutory Rape RA 8353";
                                            } else if($ra == "5") {
                                                $ratext = "Rape RA 8353";
                                            } else if($ra == "6") {
                                                $ratext = "Violation of RA 9262";
                                            } else if($ra == "7") {
                                                $ratext = "Slight Physical Injury in Relation to RA 7610";
                                            } else if($ra == "8") {
                                                $ratext = "Rape in Relation to RA 7610 RA 8353";
                                            } else if($ra == "9") {
                                                $ratext = "Physical Abuse RA 7610";
                                            } else if($ra == "10") {
                                                $ratext = "Attempted Rape in Relation to RA 7610";
                                            } else if($ra == "11") {
                                                $ratext = "Attempted Rape 8353";
                                            } else if($ra == "12") {
                                                $ratext = "Sexual Physical Injury RA 9262";
                                            } else if($ra == "13") {
                                                $ratext = "Rape (4 Counts) RA 8353";
                                            } else if($ra == "14") {
                                                $ratext = "Economic Abuse RA 9262";
                                            } else if($ra == "15") {
                                                $ratext = "Frustrated Parricide in Relation RA 7610";
                                            } else if($ra == "16") {
                                                $ratext = "Physical Injury in Relation to RA 7610";
                                            } else if($ra == "17") {
                                                $ratext = "Unjust Vexation RA 7610";
                                            }



                                            echo '
                                            <tr>
                                            <td>'.$count.'</td>
                                            <td>'.$ratext.'</td>   
                                            <td>'.$type.'</td>           
                                            <td>'.$case.'</td>
                                            <td>'.$name.'</td>
                                            <td>'.$newDate.'</td>
                                            </tr>
                                            ';   

                                          }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

            <?php } else if (isset($_GET["recentabuse"]) && trim($_GET["recentabuse"]) == "focus") { ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header"><?php echo $pheading; ?></h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-3">
                            <form role="form" onsubmit="return false;">
                            <fieldset>
                                <span id="statusaddabusenews"></span>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Title" id="add-news-title" name="email" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Write content here..." rows="5" id="add-news-content"></textarea>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button id="addAbuseNewsBtn" class="btn btn-lg btn-primary btn-block" onclick="addAbuseNews()">Add</button>
                            </fieldset>
                        </form>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Content</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM hervoice_abuse_news WHERE abuse_news_status = '1' ORDER BY id DESC";
                                        $query = mysqli_query($db_conn, $sql);
                                        $count = 0;
                                        while($row = mysqli_fetch_array($query)) {  
                                            $count++; 

                                            $recid = $row["id"];
                                            $title = $row["abuse_news_title"];
                                            $content = $row["abuse_news_content"];  
                                            $date = $row["abuse_news_date"];
                                            $newDate = date("M d, Y H:i A", strtotime($date));

                                            echo '
                                            <tr>
                                            <td>'.$count.'</td>
                                            <td>'.$title.'</td>           
                                            <td>'.$content.'</td>
                                            <td>'.$newDate.'</td>
                                            <td><a href="#" onclick="deleteAbuseNews('.$recid.')">Delete</a></td>
                                            </tr>
                                            ';   

                                          }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

            <?php } else if (isset($_GET["alerts"]) && trim($_GET["alerts"]) == "focus") { ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header"><?php echo $pheading; ?></h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Full Name</th>
                                            <th>Date</th>
                                            <th>Phone Number</th>
                                            <th>View Location</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM hervoice_alert WHERE alert_status = '1' ORDER BY id DESC";
                                        $query = mysqli_query($db_conn, $sql);
                                        $count = 0;
                                        while($row = mysqli_fetch_array($query)) {  
                                            $count++; 

                                            $recid = $row["id"];
                                            $uid = $row["user_id"];
                                            $lat = $row["alert_lat"];  
                                            $lng = $row["alert_lng"];
                                            $date = $row["alert_date"];
                                            $newDate = date("M d, Y H:i A", strtotime($date));

                                            $sql1 = "SELECT * FROM hervoice_user WHERE id = '$uid' AND user_status = '1' LIMIT 1";
                                            $query1 = mysqli_query($db_conn, $sql1);
                                            while ($row1 = mysqli_fetch_array($query1, MYSQLI_ASSOC)) {
                                                $fullname = $row1["user_full_name"];
                                                $phone = $row1["user_phone_number"];  
                                            }

                                            echo '
                                            <tr>
                                            <td>'.$count.'</td>
                                            <td>'.$fullname.'</td>           
                                            <td>'.$newDate.'</td>
                                            <td>'.$phone.'</td>
                                            <td><a href="userlocation.php?lat='.$lat.'&lng='.$lng.'&fullname='.$fullname.'" target="_blank">View Location</a></td>
                                            </tr>
                                            ';   

                                          }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            <?php } else if (isset($_GET["statistics"]) && trim($_GET["statistics"]) == "focus") { ?>
                <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header"><?php echo $pheading; ?></h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- <div class="row">
                        <div class="col-lg-6">
                            <img src="image/2.png" class="img-thumbnail" alt="1">
                        </div>
                        <div class="col-lg-6">
                            <img src="image/3.png" class="img-thumbnail" alt="1">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="image/1.png" class="img-thumbnail" alt="1">
                        </div>
                        <div class="col-lg-6">
                            <img src="image/4.png" class="img-thumbnail" alt="1">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-3">
                            <img src="image/5.png" class="img-thumbnail" alt="1">
                        </div>
                    </div>
                    <br> -->
                    <iframe src="statistics.php" style="height:580px;width:100%" frameBorder="0" scrolling="no"></iframe>
            <?php } ?>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

        <!-- Modal -->
    <div class="modal fade bd-example-modal-sm" id="showAlert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Message</h5>
          </div>
          <div class="modal-body">
            <center><h2>New alerts found!</h2></center>
          </div>
          <div class="modal-footer">
            <a class="btn btn-danger" href="#" onclick="ignoreAlerts('2')">Ignore</a>
            <a class="btn btn-primary" onclick="ignoreAlerts('1')">See Alerts</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Sound -->
    <audio id="alertAudio">
      <source src="sound/alertsound.mp3" type="audio/mpeg">
    </audio>


    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="vendor/raphael/raphael.min.js"></script>
    <script src="vendor/morrisjs/morris.min.js"></script>
    <script src="data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <script src="js/main.js"></script>
    <script src="js/ajax.js"></script>

    <script type="text/javascript">

      function approveAccount(rid) {
        if (rid == "") {

        } else {
            var ajax = ajaxObj("POST", "parsers/account.php");
            ajax.onreadystatechange = function() {
              if(ajaxReturn(ajax) == true) {
                  if (ajax.responseText == "successupdate"){
                      window.location = "account.php?id=<?php echo $id; ?>&users=focus";
                  }
              }
            }
          ajax.send("approveaccountid="+rid);
        }
      }

        function addAbuseNews() {
        var title = _("add-news-title").value;
        var content = _("add-news-content").value;
        var load = '<center><i class="fa fa-circle-o-notch fa-spin" style="color: #999; margin-bottom: 10px;"></i><center>';
        var error = '<div style="color: red; margin-bottom: 10px;">Incomplete Parameters.</div>';
        var status = _("statusaddabusenews");
        var button = _("addAbuseNewsBtn");
        status.innerHTML = load;
        if (title == "" || content == "") {
            status.innerHTML = error;
        } else {
            button.disabled = true;
            status.innerHTML = load;
            var ajax = ajaxObj("POST", "parsers/account.php");
            ajax.onreadystatechange = function() {
              if(ajaxReturn(ajax) == true) {
                  if (ajax.responseText == "successinsert"){
                      window.location = "account.php?id=<?php echo $id; ?>&recentabuse=focus";
                  } else {
                      button.disabled = false;
                      status.innerHTML = '<div style="color: red; margin-bottom: 10px;">Data already exist.</div>';
                  }
              }
            }
          ajax.send("addabusenewstitle="+title+"&addabusenewscontent="+content);
        }
      }

      function addReportNews() {
        var ra = _("add-report-ra").value;
        var type = _("add-report-type-violence").value;
        var number = _("add-report-case-number").value;
        var name = _("add-report-name").value;
        var load = '<center><i class="fa fa-circle-o-notch fa-spin" style="color: #999; margin-bottom: 10px;"></i><center>';
        var error = '<div style="color: red; margin-bottom: 10px;">Incomplete Parameters.</div>';
        var status = _("statusaddreport");
        var button = _("addReportBtn");
        status.innerHTML = load;
        if (ra == "" || type == "" || number == "" || name == "") {
            status.innerHTML = error;
        } else {
            button.disabled = true;
            status.innerHTML = load;
            var ajax = ajaxObj("POST", "parsers/account.php");
            ajax.onreadystatechange = function() {
              if(ajaxReturn(ajax) == true) {
                  if (ajax.responseText == "successinsert"){
                      window.location = "account.php?id=<?php echo $id; ?>&reports=focus";
                  } else {
                      button.disabled = false;
                      status.innerHTML = '<div style="color: red; margin-bottom: 10px;">Data already exist.</div>';
                  }
              }
            }
          ajax.send("addreporttype="+type+"&addreportra="+ra+"&addreportnumber="+number+"&addreportname="+name);
        }
      }

      function deleteAbuseNews(rid) {
        var ajax = ajaxObj("POST", "parsers/account.php");
        ajax.onreadystatechange = function() {
            if(ajaxReturn(ajax) == true) {
                if (ajax.responseText == "successupdate"){
                    window.location = "account.php?id=<?php echo $id; ?>&recentabuse=focus";
                }
            }
        }
        ajax.send("deleteabusenewsid="+rid);
      }
      function ignoreAlerts(value) {
        var ajax = ajaxObj("POST", "parsers/account.php");
        ajax.onreadystatechange = function() {
            if(ajaxReturn(ajax) == true) {
                if (ajax.responseText == "successupdate"){
                    showHideAlertModal("2");
                    if(value == "1") {
                        window.location = "account.php?id=<?php echo $id; ?>&alerts=focus";
                    }
                }
            }
        }
        ajax.send("ignorealerts=ignore");
      }

    </script>

</body>

</html>
