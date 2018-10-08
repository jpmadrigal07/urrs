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

    <link rel="icon" type="image/png" href="image/favicon.png" />

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
                <a class="navbar-brand" href="index.php">URRS</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li><a href="index.php">Calendar</a></li>
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
                                        <th>Organizer</th>
                                        <th>Date</th>
                                        <th>Department</th>
                                        <th>Room</th>
                                        <th>Time</th>
                                        <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM urrs_event_booking WHERE user_id = '$log_id' AND event_booking_status = '1' ORDER BY id DESC";
                                        $query = mysqli_query($db_conn, $sql);
                                        $count = 0;
                                        while($row = mysqli_fetch_array($query)) {
                                            $count++;
                                            $bookdate = $row["event_booking_date"];
                                            $title = $row["event_booking_title"];
                                            $department = $row["department_id"];
                                            $room = $row["room_id"];
                                            $organizer = $row["event_booking_organizer"];
                                            $email = $row["event_booking_email"];
                                            $totime = $row["event_booking_to_time"];
                                            $fromtime = $row["event_booking_from_time"];

                                            $bookdate1 = date("F d, Y", strtotime($bookdate));
                                        
                                            $fromtimetext = "";
                                            if($fromtime == "1") {
                                                $fromtimetext = "06:00 am";
                                            } else if($fromtime == "2") {
                                                $fromtimetext = "07:00 am";
                                            } else if($fromtime == "3") {
                                                $fromtimetext = "08:00 am";
                                            } else if($fromtime == "4") {
                                                $fromtimetext = "09:00 am";
                                            } else if($fromtime == "5") {
                                                $fromtimetext = "10:00 am";
                                            } else if($fromtime == "6") {
                                                $fromtimetext = "11:00 am";
                                            } else if($fromtime == "7") {
                                                $fromtimetext = "12:00 pm";
                                            } else if($fromtime == "8") {
                                                $fromtimetext = "01:00 pm";
                                            } else if($fromtime == "9") {
                                                $fromtimetext = "02:00 pm";
                                            } else if($fromtime == "10") {
                                                $fromtimetext = "03:00 pm";
                                            } else if($fromtime == "11") {
                                                $fromtimetext = "04:00 pm";
                                            } else if($fromtime == "12") {
                                                $fromtimetext = "05:00 pm";
                                            } else if($fromtime == "13") {
                                                $fromtimetext = "06:00 pm";
                                            } else if($fromtime == "14") {
                                                $fromtimetext = "07:00 pm";
                                            }
                                        
                                            $totimetext = "";
                                            if($totime == "1") {
                                                $totimetext = "06:00 am";
                                            } else if($totime == "2") {
                                                $totimetext = "07:00 am";
                                            } else if($totime == "3") {
                                                $totimetext = "08:00 am";
                                            } else if($totime == "4") {
                                                $totimetext = "09:00 am";
                                            } else if($totime == "5") {
                                                $totimetext = "10:00 am";
                                            } else if($totime == "6") {
                                                $totimetext = "11:00 am";
                                            } else if($totime == "7") {
                                                $totimetext = "12:00 pm";
                                            } else if($totime == "8") {
                                                $totimetext = "01:00 pm";
                                            } else if($totime == "9") {
                                                $totimetext = "02:00 pm";
                                            } else if($totime == "10") {
                                                $totimetext = "03:00 pm";
                                            } else if($totime == "11") {
                                                $totimetext = "04:00 pm";
                                            } else if($totime == "12") {
                                                $totimetext = "05:00 pm";
                                            } else if($totime == "13") {
                                                $totimetext = "06:00 pm";
                                            } else if($totime == "14") {
                                                $totimetext = "07:00 pm";
                                            }
                                        
                                            $sql1 = "SELECT * FROM urrs_department WHERE id='$department' AND department_status = '1'";
                                            $query1 = mysqli_query($db_conn, $sql1);
                                            while($row1 = mysqli_fetch_array($query1)) {  
                                                $deptname = $row1["department_name"];
                                            }
                                        
                                            $sql2 = "SELECT * FROM urrs_room WHERE id='$room' AND room_status = '1'";
                                            $query2 = mysqli_query($db_conn, $sql2);
                                            while($row2 = mysqli_fetch_array($query2)) {  
                                                $roomname = $row2["room_name"];
                                            }
                                        
                                            echo '
                                            <tr>
                                              <td>'.$count.'</td>
                                              <td>'.$title.'</td>           
                                              <td>'.$organizer.'</td>
                                              <td>'.$bookdate1.'</td>
                                              <td>'.$deptname.'</td>
                                              <td>'.$roomname.'</td>
                                              <td>'.$fromtimetext.' - '.$totimetext.'</td>
                                              <td>'.$email.'</td>
                                            </tr>
                                            ';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

            <?php } ?>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


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

    </script>

</body>

</html>
