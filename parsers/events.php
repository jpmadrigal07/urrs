<?php
include_once("../include/db_conn.php");
header('Content-Type: application/json');
/*
 * Following code will list all the products
 */
// array for JSON response

$response = array();

// get all products from products tables
$sql = "SELECT * FROM urrs_event_booking WHERE event_booking_status = '1'";
$query = mysqli_query($db_conn, $sql);
$check = mysqli_num_rows($query);

// check for empty result
if ($check > 0) {
    // looping through all results
    // products node
    $response["events"] = array();

    while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
        // temp user array
        $res = array();
        $bookingdate = $row["event_booking_date"];

        $bookingdatemonth = date("m", strtotime($bookingdate));
        $bookingdateday = date("d", strtotime($bookingdate));
        $bookingdateyear = date("Y", strtotime($bookingdate));

        $res["month"] = $bookingdatemonth;
        $res["day"] = $bookingdateday;
        $res["year"] = $bookingdateyear;

        $res["title"] = $row["event_booking_title"];
        $res["description"] = $row["event_booking_organizer"];

        // push single product into final response array
        array_push($response["events"], $res);
    }

    // echoing JSON response
    echo json_encode($response, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
} else {
    $response["events"] = array();
    echo json_encode($response, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
}

?>
