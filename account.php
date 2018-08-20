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
