<?php

if(isset($_POST["addeventbookingdate"])) {

  include_once("../include/db_conn.php");
  include_once("../include/loginstatus.php");

  $bookingdate = $_POST['addeventbookingdate'];
  $department = $_POST['addeventdepartment'];
  $room = $_POST['addeventroom'];
  $from = $_POST['addeventfrom'];
  $to = $_POST['addeventto'];
  $title = $_POST['addeventtitle'];
  $organizer = $_POST['addeventorganizer'];
  $email = $_POST['addeventemail'];
  $phone = $_POST['addeventphone'];

  $bookingdate = date("Y-m-d H:i:s", strtotime($bookingdate));

  $sql = "SELECT * FROM urrs_event_booking WHERE user_id='$log_id' AND event_booking_title='$title' AND event_booking_date='$bookingdate' AND department_id = '$department' AND room_id = '$room' AND event_booking_from_time = '$from' AND event_booking_to_time = '$to' AND event_booking_status = '1' LIMIT 1";
  $query = mysqli_query($db_conn, $sql);
  $check = mysqli_num_rows($query);

  if($check > 0) { 
    echo "exist";
  } else {
    $sql_code = "INSERT INTO urrs_event_booking (user_id, event_booking_title, event_booking_date, department_id, room_id, event_booking_organizer, event_booking_email, event_booking_phone, event_booking_from_time,	event_booking_to_time, 	event_booking_date_created, event_booking_status)
      VALUES ('$log_id','$title','$bookingdate','$department','$room','$organizer','$email','$phone','$from','$to',NOW(),'1')";
    $query = mysqli_query($db_conn, $sql_code);
    echo "successinsert";
  }

  exit();

}

?>