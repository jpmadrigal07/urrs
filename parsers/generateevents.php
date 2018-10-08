<?php  
include_once("../include/loginstatus.php");

$output = '';
$bookdate = $_POST["bookdate"];
$bookdate = date("Y-m-d H:i:s", strtotime($bookdate));
$bookdate1 = date("F d, Y", strtotime($bookdate));
$count = 0;

$output .= '<div class="table-responsive">
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
  <tbody>';

$sql = "SELECT * FROM urrs_event_booking WHERE event_booking_date = '$bookdate' AND event_booking_status = '1' ORDER BY id DESC";
$query = mysqli_query($db_conn, $sql);
while($row = mysqli_fetch_array($query)) {
    $count++;
    $title = $row["event_booking_title"];
    $department = $row["department_id"];
    $room = $row["room_id"];
    $organizer = $row["event_booking_organizer"];
    $email = $row["event_booking_email"];
    $totime = $row["event_booking_to_time"];
    $fromtime = $row["event_booking_from_time"];

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

    $output .= '
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

$output .= '</tbody>
</table>
</div>';

echo $output;

?>  