<?php
include_once("include/loginstatus.php");
// If user is already logged in
if (isset($_SESSION["userid"])) {
  header("location: account.php?id=".$_SESSION["userid"]."&dashboard=focus");
  exit();
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

    <link rel="icon" type="image/png" href="image/logo.png" />

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
	      <li><a href="#" onclick="showModalLogin('1')">Admin</a></li>
	      <li><a href="#" onclick="showModalLogin('2')">Student</a></li>
	      <li><a href="#" onclick="showModalLogin('3')">Faculty</a></li>
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
              <div class="col-md-6">
                <button style="width: 100%" class="btn btn-default" onclick="showModalAddEvent();">Add Event</button>
              </div>
              <div class="col-md-6">
                <button style="width: 100%" class="btn btn-default" onclick="showModalEventLists();">View Events</button>
              </div>
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
            <h5 class="modal-title" id="exampleModalLabel">Add Events</h5>
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
                  <label>Event Title</label>
                  <input class="form-control" id="a" name="email" type="text" autofocus>
                </div>
                <div class="form-group">
                  <label>Event Organizer</label>
                  <input class="form-control" id="b" name="password" type="text">
                </div>
                <div class="form-group">
                  <label>Email Address</label>
                  <input class="form-control" id="c" name="email" type="email">
                </div>
                <div class="form-group">
                  <label>Phone Number</label>
                  <input class="form-control" id="d" name="password" type="text">
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" value="">06:00 am - 07:00 am</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" value="">07:00 am - 08:00 am</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" value="">08:00 am - 09:00 am</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" value="">09:00 am - 10:00 am</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" value="">10:00 am - 11:00 am</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" value="">11:00 am - 12:00 pm</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" value="">12:00 pm - 01:00 pm</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" value="">01:00 pm - 02:00 pm</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" value="">02:00 pm - 03:00 pm</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" value="">03:00 pm - 04:00 pm</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" value="">04:00 pm - 05:00 pm</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" value="">05:00 pm - 06:00 pm</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" value="">06:00 pm - 07:00 pm</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" value="">07:00 pm - 08:00 pm</label>
                </div>
              </fieldset>
            </form>
          </div>
          <div class="modal-footer">
            <a class="btn btn-success" id="addEventBtn" style="width: 100%;" onclick="showModalAddEvent();">Add</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="showEventLists" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Event Lists</h5>
          </div>
          <div class="modal-body">
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
          <div class="modal-footer">
            <a class="btn btn-danger" id="logBtn1" onclick="login1('1')">Close</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade bd-example-modal-sm" id="showAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            			<input class="form-control" placeholder="Username" id="ulog1" name="email" type="email" autofocus>
            		</div>
            		<div class="form-group">
            			<input class="form-control" placeholder="Password" id="plog1" name="password" type="password" value="">
            		</div>
            	</fieldset>
            </form>
          </div>
          <div class="modal-footer">
            <a class="btn btn-primary" id="logBtn1" onclick="login1('1')">Login</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade bd-example-modal-sm" id="showStudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            			<input class="form-control" placeholder="Username" id="ulog2" name="email" type="email" autofocus>
            		</div>
            		<div class="form-group">
            			<input class="form-control" placeholder="Password" id="plog2" name="password" type="password" value="">
            		</div>
            	</fieldset>
            </form>
          </div>
          <div class="modal-footer">
            <a class="btn btn-primary" id="logBtn2" onclick="login2('2')">Login</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade bd-example-modal-sm" id="showFaculty" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            			<input class="form-control" placeholder="Username" id="ulog3" name="email" type="email" autofocus>
            		</div>
            		<div class="form-group">
            			<input class="form-control" placeholder="Password" id="plog3" name="password" type="password" value="">
            		</div>
            	</fieldset>
            </form>
          </div>
          <div class="modal-footer">
            <a class="btn btn-primary" id="logBtn3" onclick="login3('3')">Login</a>
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
                  window.location = "account.php?id="+ajax.responseText+"&dashboard=focus";
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
                  window.location = "account.php?id="+ajax.responseText+"&dashboard=focus";
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
                  window.location = "account.php?id="+ajax.responseText+"&dashboard=focus";
                }
              }
            }
            ajax.send("u="+u+"&p="+p+"&l="+l);
          }
        }
    </script>

</body>

</html>
