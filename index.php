<?php
include_once("include/loginstatus.php");

// SELECT USER INFO
$sql_user = "SELECT * FROM urrs_user WHERE id='$log_id' LIMIT 1";
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


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>URRS - Home</title>

    <link rel="icon" type="image/png" href="image/favicon.png" />

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css?refresh=123" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/index.css?refresh=123" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

    <script src="dist/js/simplecalendar.js" type="text/javascript"></script>

    <script src="dist/js/moment.js" type="text/javascript"></script>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

	<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">URRS</a>
	    </div>
	    <ul class="nav navbar-nav navbar-right">
      <?php if (isset($_SESSION["userid"])) { ?>
        <li><a href="account.php?id=<?php echo $log_id ?>&dashboard=focus">My Account</a></li>
	      <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <?php echo $fname; ?> <i class="fa fa-caret-down"></i>
          </a>
          <ul class="dropdown-menu dropdown-user">
            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
            </li>
          </ul>
        </li>
      <?php } else { ?>
        <li><a href="#" onclick="showModalLogin('1')">Admin</a></li>
        <li><a href="#" onclick="showModalLogin('2')">Student</a></li>
        <li><a href="#" onclick="showModalLogin('3')">Faculty</a></li>
        <li><a href="#">Register</a></li>
      <?php } ?>
	    </ul>
	  </div>
	</nav>

    <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <center><h1 class="page-header">University Room Reservation System
        </h1></center>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="calendar hidden-print">
          <div class="date-options">
            <input type="hidden" name="" id="month"> <input type="hidden" name="" id="day"> <input type="hidden" name="" id="year"> <input type="hidden" name="" id="wholedate">
            <span style="float: right; font-size: 20px;"><a href="#" class="close">x</a></span>
            <br><br>
            <span id="date-selected" style="font-size: 25px;"></span>
            <hr style="border-color: #aeb3b4;">
            <div class="row">
            <?php if (isset($_SESSION["userid"])) { ?>
              <div class="col-md-6">
                <button style="width: 100%" class="btn btn-default" onclick="showModalAddEvent();">Add Event</button>
              </div>
              <div class="col-md-6">
                <button style="width: 100%" class="btn btn-default" onclick="showModalEventLists();">View Events</button>
              </div>
            <?php } else { ?>
              <div class="col-md-12">
                <button style="width: 100%" class="btn btn-default" onclick="showModalEventLists();">View Events</button>
              </div>
            <?php } ?>
            </div>
          </div>
          <div class="list">
          </div>
          <header>
            <h2 class="month"></h2>
            <a class="btn-prev fontawesome-angle-left" href="#"><</a>
            <a class="btn-next fontawesome-angle-right" href="#">></a>
          </header>
          <table>
            <thead class="event-days">
              <tr></tr>
            </thead>
            <tbody class="event-calendar">
              <tr class="1"></tr>
              <tr class="2"></tr>
              <tr class="3"></tr>
              <tr class="4"></tr>
              <tr class="5"></tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
    <div class="modal fade bd-example-modal-md" id="showAddEvent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Event</h5>
          </div>
          <div class="modal-body">
            <form role="form" onsubmit="return false;">
              <fieldset>
                <span id="statusaddevent"></span>
                <div class="form-group">
                  <label>Booking Date</label>
                  <input class="form-control" id="add-event-booking-date" name="email" type="text" disabled="disabled">
                </div>
                <div class="form-group">
									<label class="control-label">Department</label>
										<select class="form-control" id="add-event-department">
											<option value=""></option>
                      <?php
                        $sql1 = "SELECT * FROM urrs_department WHERE 	department_status = '1'";
                        $query1 = mysqli_query($db_conn, $sql1);
                        while($row1 = mysqli_fetch_array($query1)) {  
                            $rid = $row1["id"];
                            $deptname = $row1["department_name"];

                            echo '
                            <option value="'.$rid.'">'.$deptname.'</option>
                            ';
                        }
                      ?>
										</select>
								</div>
                <div class="form-group" id="department-1" hidden="true">
									<label class="control-label">Room</label>
										<select class="form-control" id="add-event-room-department-1">
											<option value=""></option>
											<?php
                        $sql2 = "SELECT * FROM urrs_room WHERE department_id='1' AND room_status = '1'";
                        $query2 = mysqli_query($db_conn, $sql2);
                        while($row2 = mysqli_fetch_array($query2)) {  
                            $rid = $row2["id"];
                            $roomname = $row2["room_name"];

                            echo '
                            <option value="'.$rid.'">'.$roomname.'</option>
                            ';
                        }
                      ?>
										</select>
								</div>
                <div class="form-group" id="department-2" hidden="true">
									<label class="control-label">Room</label>
										<select class="form-control" id="add-event-room-department-2">
											<option value=""></option>
											<?php
                        $sql2 = "SELECT * FROM urrs_room WHERE department_id='2' AND room_status = '1'";
                        $query2 = mysqli_query($db_conn, $sql2);
                        while($row2 = mysqli_fetch_array($query2)) {  
                            $rid = $row2["id"];
                            $roomname = $row2["room_name"];

                            echo '
                            <option value="'.$rid.'">'.$roomname.'</option>
                            ';
                        }
                      ?>
										</select>
								</div>
                <div class="form-group" id="department-3" hidden="true">
									<label class="control-label">Room</label>
										<select class="form-control" id="add-event-room-department-3">
											<option value=""></option>
											<?php
                        $sql2 = "SELECT * FROM urrs_room WHERE department_id='3' AND room_status = '1'";
                        $query2 = mysqli_query($db_conn, $sql2);
                        while($row2 = mysqli_fetch_array($query2)) {  
                            $rid = $row2["id"];
                            $roomname = $row2["room_name"];

                            echo '
                            <option value="'.$rid.'">'.$roomname.'</option>
                            ';
                        }
                      ?>
										</select>
								</div>
                <div class="form-group" hidden="true" id="fromtime">
									<label class="control-label">From (Time)</label>
											<span id="fromtimeselect"></span>
								</div>
                <div class="form-group" hidden="true" id="totime">
									<label class="control-label">To (Time)</label>
                      <span id="totimeselect"></span>
								</div>
                <div class="form-group">
                  <label>Event Title</label>
                  <input class="form-control" id="add-event-title" name="email" type="text" autofocus>
                </div>
                <div class="form-group">
                  <label>Event Organizer</label>
                  <input class="form-control" id="add-event-organizer" name="passwor" type="text">
                </div>
                <div class="form-group">
                  <label>Email Address</label>
                  <input class="form-control" id="add-event-email" name="email" type="email">
                </div>
                <div class="form-group">
                  <label>Phone Number</label>
                  <input class="form-control" id="add-event-phone" name="password" type="text">
                </div>
              </fieldset>
            </form>
          </div>
          <div class="modal-footer">
            <a class="btn btn-success" id="addEventBtn" style="width: 100%;" onclick="addEventRecord()">Add</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="showEventLists" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" style="width:1350px;" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Event Lists</h5>
          </div>
          <div class="modal-body">
          <span id="eventlists"></span>
          </div>
          <div class="modal-footer">
            <a class="btn btn-danger" id="logBtn1" data-dismiss="modal">Close</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade bd-example-modal-sm" id="showAdmin" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Admin Login</h5>
          </div>
          <div class="modal-body">
            <form role="form" onsubmit="return false;">
            	<fieldset>
            		<span id="statuslog1"></span>
            		<div class="form-group">
            			<input class="form-control" placeholder="Username" id="ulog1" type="text" autofocus>
            		</div>
            		<div class="form-group">
            			<input class="form-control" placeholder="Password" id="plog1" type="password" value="">
            		</div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" id="logBtn1" onclick="login1('1')">Login</button>
            </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade bd-example-modal-sm" id="showStudent" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Student Login</h5>
          </div>
          <div class="modal-body">
            <form role="form" onsubmit="return false;">
            	<fieldset>
            		<span id="statuslog2"></span>
            		<div class="form-group">
            			<input class="form-control" placeholder="Username" id="ulog2" type="text" autofocus>
            		</div>
            		<div class="form-group">
            			<input class="form-control" placeholder="Password" id="plog2" type="password" value="">
            		</div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" id="logBtn2" onclick="login2('2')">Login</button>
            </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>

   <!-- Modal -->
   <div class="modal fade bd-example-modal-sm" id="showFaculty" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Faculty Login</h5>
          </div>
          <div class="modal-body">
            <form role="form" onsubmit="return false;">
            	<fieldset>
            		<span id="statuslog3"></span>
            		<div class="form-group">
            			<input class="form-control" placeholder="Username" id="ulog3" type="text" autofocus>
            		</div>
            		<div class="form-group">
            			<input class="form-control" placeholder="Password" id="plog3" type="password" value="">
            		</div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" id="logBtn3" onclick="login3('3')">Login</button>
            </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <script src="js/main.js"></script>
    <script src="js/ajax.js"></script>

    <script>

    	 function showModalLogin(user) {
	        if(user == "1") {
	            $('#showAdmin').modal('show');
	        } else if(user == "2") {
	            $('#showStudent').modal('show');
	        } else if(user == "3") {
	            $('#showFaculty').modal('show');
	        }
	      }

        function showModalAddEvent() {
            $('#showAddEvent').modal('show');
            var bookingdate = $('#wholedate').val();
            $('#add-event-booking-date').val(bookingdate);
        }

        function showModalEventLists() {
            $('#showEventLists').modal('show');
            generateEvents();
        }

        function login1(l) {
          var u = _("ulog1").value;
          var p = _("plog1").value;
          var status = _("statuslog1");
          status.innerHTML = '<center><i class="fa fa-circle-o-notch fa-spin" style="color: #999; margin-bottom: 10px;"></i></center>';
          if (u == "" || p == "") {
            status.innerHTML = '<div style="color: red; margin-bottom: 10px;">Incomplete Parameters.</div>';
          } else {
            _("logBtn1").disabled = true;
            status.innerHTML = '<center><i class="fa fa-circle-o-notch fa-spin" style="color: #999; margin-bottom: 10px;"></i></center>';
            var ajax = ajaxObj("POST", "parsers/login.php");
            ajax.onreadystatechange = function() {
              if(ajaxReturn(ajax) == true) {
                if (ajax.responseText == "login_failed"){
                  status.innerHTML = '<div style="color: red; margin-bottom: 10px;">Wrong Username or Password.</div>';
                  _("logBtn1").disabled = false;
                } else if (ajax.responseText == "login_failed_level"){
                  status.innerHTML = '<div style="color: red; margin-bottom: 10px;">This is not an admin account!</div>';
                  _("logBtn1").disabled = false;
                } else {
                  window.location = "index.php";
                }
              }
            }
            ajax.send("u="+u+"&p="+p+"&l="+l);
          }
        }

        function login2(l) {
          var u = _("ulog2").value;
          var p = _("plog2").value;
          var status = _("statuslog2");
          status.innerHTML = '<center><i class="fa fa-circle-o-notch fa-spin" style="color: #999; margin-bottom: 10px;"></i></center>';
          if (u == "" || p == "") {
            status.innerHTML = '<div style="color: red; margin-bottom: 10px;">Incomplete Parameters.</div>';
          } else {
            _("logBtn2").disabled = true;
            status.innerHTML = '<center><i class="fa fa-circle-o-notch fa-spin" style="color: #999; margin-bottom: 10px;"></i></center>';
            var ajax = ajaxObj("POST", "parsers/login.php");
            ajax.onreadystatechange = function() {
              if(ajaxReturn(ajax) == true) {
                if (ajax.responseText == "login_failed"){
                  status.innerHTML = '<div style="color: red; margin-bottom: 10px;">Wrong Username or Password.</div>';
                  _("logBtn2").disabled = false;
                } else if (ajax.responseText == "login_failed_level"){
                  status.innerHTML = '<div style="color: red; margin-bottom: 10px;">This is not aa student account!</div>';
                  _("logBtn1").disabled = false;
                } else {
                  window.location = "index.php";
                }
              }
            }
            ajax.send("u="+u+"&p="+p+"&l="+l);
          }
        }

        function login3(l) {
          var u = _("ulog3").value;
          var p = _("plog3").value;
          var status = _("statuslog3");
          status.innerHTML = '<center><i class="fa fa-circle-o-notch fa-spin" style="color: #999; margin-bottom: 10px;"></i></center>';
          if (u == "" || p == "") {
            status.innerHTML = '<div style="color: red; margin-bottom: 10px;">Incomplete Parameters.</div>';
          } else {
            _("logBtn3").disabled = true;
            status.innerHTML = '<center><i class="fa fa-circle-o-notch fa-spin" style="color: #999; margin-bottom: 10px;"></i></center>';
            var ajax = ajaxObj("POST", "parsers/login.php");
            ajax.onreadystatechange = function() {
              if(ajaxReturn(ajax) == true) {
                if (ajax.responseText == "login_failed"){
                  status.innerHTML = '<div style="color: red; margin-bottom: 10px;">Wrong Username or Password.</div>';
                  _("logBtn3").disabled = false;
                } else if (ajax.responseText == "login_failed_level"){
                  status.innerHTML = '<div style="color: red; margin-bottom: 10px;">This is not a faculty account!</div>';
                  _("logBtn1").disabled = false;
                } else {
                  window.location = "index.php";
                }
              }
            }
            ajax.send("u="+u+"&p="+p+"&l="+l);
          }
        }

        $("#add-event-department").change(function () {
            var filterValue = $("#add-event-department").val();
            if (filterValue == "1") {
                $("#department-1").show();
                $("#department-2").hide();
                $("#department-3").hide();
            } else if (filterValue == "2") {
                $("#department-1").hide();
                $("#department-2").show();
                $("#department-3").hide();
            } else if (filterValue == "3") {
                $("#department-1").hide();
                $("#department-2").hide();
                $("#department-3").show();
            } else {
               $("#department-1").hide();
               $("#department-2").hide();
               $("#department-3").hide();
            }
        }); 

        $("#add-event-room-department-1,#add-event-room-department-2,#add-event-room-department-3").change(function () {
            var filterValue1 = "";
            if($("#add-event-room-department-1").val() != "" && $("#add-event-room-department-2").val() == "" && $("#add-event-room-department-3").val() == "") {
              filterValue1 = $("#add-event-room-department-1").val();
            } else if($("#add-event-room-department-1").val() == "" && $("#add-event-room-department-2").val() != "" && $("#add-event-room-department-3").val() == "") {
              filterValue1 = $("#add-event-room-department-2").val();
            } else if($("#add-event-room-department-1").val() == "" && $("#add-event-room-department-2").val() == "" && $("#add-event-room-department-3").val() != "") {
              filterValue1 = $("#add-event-room-department-3").val();
            }
            var filterValue2 = $("#add-event-booking-date").val();

            if(filterValue1 != "") {
              $("#fromtime").show();
              $("#totime").show();

              $.ajax({ 
                  url:"parsers/generatetimefromto.php",  
                  method:"post",  
                  data:{type:"1",roomid:filterValue1,bookdate:filterValue2},  
                  dataType:"text",  
                  success:function(data) {
                      $('#fromtimeselect').html(data);
                  }  
              });

              $.ajax({ 
                  url:"parsers/generatetimefromto.php",  
                  method:"post",  
                  data:{type:"2",roomid:filterValue1,bookdate:filterValue2},  
                  dataType:"text",  
                  success:function(data) {
                      $('#totimeselect').html(data);  
                  }  
              });
            } else {
              $("#fromtime").hide();
              $("#totime").hide();
            }

        }); 

      function addEventRecord() {
        var bookingdate = _("add-event-booking-date").value;
        var department = _("add-event-department").value;
        var room = "";
        if(_("add-event-room-department-1").value != "" && _("add-event-room-department-2").value == "" && _("add-event-room-department-3").value == "") {
          room = _("add-event-room-department-1").value;
        } else if(_("add-event-room-department-1").value == "" && _("add-event-room-department-2").value != "" && _("add-event-room-department-3").value == "") {
          room = _("add-event-room-department-2").value;
        } else if(_("add-event-room-department-1").value == "" && _("add-event-room-department-2").value == "" && _("add-event-room-department-3").value != "") {
          room = _("add-event-room-department-3").value;
        }
        var title = _("add-event-title").value;
        var organizer = _("add-event-organizer").value;
        var email = _("add-event-email").value;
        var phone = _("add-event-phone").value;
        var load = '<center><i class="fa fa-circle-o-notch fa-spin" style="color: #999; margin-bottom: 10px;"></i><center>';
        var error = '<div style="color: red; margin-bottom: 10px;">Incomplete Parameters.</div>';
        var status = _("statusaddevent");
        var button = _("addEventBtn");
        status.innerHTML = load;
        if (bookingdate == "" || department == "" || room == "" || title == "" || organizer == "" || email == "" || phone == "") {
            status.innerHTML = error;
        } else {
            var from = _("add-event-from").value;
            var to = _("add-event-to").value;
            if (from == "" || to == "") {
                status.innerHTML = error;
            } else {
            button.disabled = true;
            status.innerHTML = load;
            var ajax = ajaxObj("POST", "parsers/account.php");
            ajax.onreadystatechange = function() {
              if(ajaxReturn(ajax) == true) {
                  if (ajax.responseText == "successinsert"){
                      window.location = "index.php";
                  } else if (ajax.responseText == "exist"){
                      button.disabled = false;
                      status.innerHTML = '<div style="color: red; margin-bottom: 10px;">Event is already exist!</div>';
                  } else {
                      button.disabled = false;
                      status.innerHTML = '<div style="color: red; margin-bottom: 10px;">Unknown error! Error Details: '+ ajax.responseText +'</div>';
                  }
              }
            }
          ajax.send("addeventbookingdate="+bookingdate+"&addeventdepartment="+department+"&addeventroom="+room+"&addeventfrom="+from+"&addeventto="+to+"&addeventtitle="+title+"&addeventorganizer="+organizer+"&addeventemail="+email+"&addeventphone="+phone);
        }
        }
      }
      
      function generateEvents() {
        var date = $("#wholedate").val();
        $.ajax({ 
          url:"parsers/generateevents.php",  
          method:"post",  
          data:{bookdate:date},  
          dataType:"text",  
          success:function(data) {
            $('#eventlists').html(data);  
          }  
        });
      }
        
    </script>

</body>

</html>
