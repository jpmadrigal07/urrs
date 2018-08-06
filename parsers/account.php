<?php

if(isset($_POST["date"])) {

  include_once("../includes/db_conn.php");
  include_once("../includes/loginstatus.php");

  $date = $_POST['date'];
  $elco = $_POST['elco'];
  $elapp = $_POST['elapp'];
  $sponcom = $_POST['sponcom'];
  $gasera = $_POST['gasera'];
  $staele = $_POST['staele'];
  $lpg = $_POST['lpg'];
  $chem = $_POST['chem'];
  $phyro = $_POST['phyro'];
  $matlig = $_POST['matlig'];
  $light = $_POST['light'];
  $exp = $_POST['exp'];
  $resfire = $_POST['resfire'];
  $edufire = $_POST['edufire'];
  $hcfire = $_POST['hcfire'];
  $stofire = $_POST['stofire'];
  $bizfire = $_POST['bizfire'];
  $mixfire = $_POST['mixfire'];
  $indfire = $_POST['indfire'];
  $commer = $_POST['commer'];
  $assembly = $_POST['assembly'];
  $others = $_POST['others'];
  $grass = $_POST['grass'];
  $post = $_POST['post'];
  $veh = $_POST['veh'];
  $fatci = $_POST['fatci'];
  $fatbf = $_POST['fatbf'];
  $injci = $_POST['injci'];
  $injbf = $_POST['injbf'];

  $sql = "SELECT * FROM alab_fire_record WHERE fire_record_date='$date' AND user_id = '$log_id' LIMIT 1";
  $query = mysqli_query($db_conn, $sql);
  $check = mysqli_num_rows($query);

  if($check > 0) { 

    echo "samedata";

  } else {

    $sql_user = "INSERT INTO alab_fire_record (user_id, fire_record_elco, fire_record_elapp, fire_record_sponcom, fire_record_gasera, fire_record_staele, fire_record_lpg, fire_record_chem, fire_record_phyro, fire_record_matlig, fire_record_light, fire_record_exp, fire_record_resfire, fire_record_edufire, fire_record_hcfire, fire_record_stofire, fire_record_bizfire, fire_record_mixfire, fire_record_indfire, fire_record_commer, fire_record_assembly, fire_record_others, fire_record_grass, fire_record_post, fire_record_veh, fire_record_fatci, fire_record_fatbf, fire_record_injci, fire_record_injbf, fire_record_date, fire_record_date_created, fire_record_status)
    VALUES ('$log_id','$elco','$elapp', '$sponcom', '$gasera','$staele','$lpg', '$chem', '$phyro','$matlig','$light', '$exp', '$resfire','$edufire','$hcfire', '$stofire', '$bizfire','$mixfire','$indfire', '$commer', '$assembly','$others','$grass', '$post', '$veh','$fatci','$fatbf', '$injci', '$injbf', '$date', NOW(), '1')";
    $query = mysqli_query($db_conn, $sql_user);
    echo "successinsert";

  }

  exit();

}

if(isset($_POST["updateemail"])) {

  include_once("../includes/db_conn.php");
  include_once("../includes/loginstatus.php");

  $email = $_POST['updateemail'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM ppbms_user WHERE id='$log_id' LIMIT 1";
  $query = mysqli_query($db_conn, $sql);
  $check = mysqli_num_rows($query);

  if($check > 0) { 

    while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
      $emaildb = $row["user_email"];
      $passworddb = $row["user_pass"];
    }

    if($email == $emaildb && $password == $passworddb) {
      echo "samedata";
    } else {
      $sql = "UPDATE ppbms_user SET user_email='$email', user_pass='$password' WHERE id='$log_id' LIMIT 1";
      $query = mysqli_query($db_conn, $sql);
      echo "successinsert";
    }

  } else {

    echo "error";

  }

  exit();

}

if(isset($_POST["newalertcount"])) {

  include_once("../include/db_conn.php");
  include_once("../include/loginstatus.php");

  $sql = "SELECT * FROM hervoice_alert WHERE alert_seen = '1' LIMIT 1";
  $query = mysqli_query($db_conn, $sql);
  $check = mysqli_num_rows($query);

  echo $check;

  exit();

}

if(isset($_POST["ignorealerts"])) {

  include_once("../include/db_conn.php");
  include_once("../include/loginstatus.php");


  $sql = "UPDATE hervoice_alert SET alert_seen='2' WHERE alert_seen='1'";
  $query = mysqli_query($db_conn, $sql);
  echo "successupdate";

  exit();

}


if(isset($_POST["addbarcodemiddletextcode"])) {

  include_once("../includes/db_conn.php");
  include_once("../includes/loginstatus.php");

  $code = $_POST['addbarcodemiddletextcode'];

  $sql = "SELECT * FROM ppbms_barcode_middle_text WHERE barcode_middle_text_code='$code' LIMIT 1";
  $query = mysqli_query($db_conn, $sql);
  $check = mysqli_num_rows($query);

  if($check > 0) { 

  	echo "samedata";

  } else {

    $sql_code = "INSERT INTO ppbms_barcode_middle_text (barcode_middle_text_code, barcode_middle_text_status)
    VALUES ('$code','1')";
    $query = mysqli_query($db_conn, $sql_code);
    echo "successinsert";

  }

  exit();

}

if(isset($_POST["approveaccountid"])) {

  include_once("../include/db_conn.php");
  include_once("../include/loginstatus.php");

  $rid = $_POST['approveaccountid'];

  $sql = "UPDATE hervoice_user SET user_status='1' WHERE id='$rid' LIMIT 1";
  $query = mysqli_query($db_conn, $sql);
  echo "successupdate";

  exit();

}

if(isset($_POST["updatebarcodemiddletextid"])) {

  include_once("../includes/db_conn.php");
  include_once("../includes/loginstatus.php");

  $rid = $_POST['updatebarcodemiddletextid'];
  $code = $_POST['updatebarcodemiddletextcode'];

  $sql = "UPDATE ppbms_barcode_middle_text SET barcode_middle_text_code='$code' WHERE id='$rid' LIMIT 1";
  $query = mysqli_query($db_conn, $sql);
  echo "successupdate";

  exit();

}

if(isset($_POST["updateareapriceid"])) {

  include_once("../includes/db_conn.php");
  include_once("../includes/loginstatus.php");

  $rid = $_POST['updateareapriceid'];
  $price = $_POST['updateareapriceprice'];

  $sql = "UPDATE ppbms_area_price SET area_price_price='$price' WHERE id='$rid' LIMIT 1";
  $query = mysqli_query($db_conn, $sql);
  echo "successupdate";

  exit();

}

if(isset($_POST["deletebarcodemiddletextid"])) {

  include_once("../includes/db_conn.php");
  include_once("../includes/loginstatus.php");

  $rid = $_POST['deletebarcodemiddletextid'];

  $sql = "UPDATE ppbms_barcode_middle_text SET barcode_middle_text_status='2' WHERE id='$rid' LIMIT 1";
  $query = mysqli_query($db_conn, $sql);
  echo "successupdate";

  exit();

}

if(isset($_POST["adddispatchcontrolmessengername"])) {

  include_once("../includes/db_conn.php");
  include_once("../includes/loginstatus.php");

  $name = $_POST['adddispatchcontrolmessengername'];
  $address = $_POST['adddispatchcontrolmessengeraddress'];
  $prepared = $_POST['adddispatchcontrolmessengerprepared'];
  $date = $_POST['adddispatchcontrolmessengerdate'];
  $newDate = date("Y-m-d H:i:s", strtotime($date));

  $sql = "SELECT * FROM ppbms_dispatch_control_messenger WHERE dispatch_control_messenger_name='$name' AND dispatch_control_messenger_address='$address' AND dispatch_control_messenger_prepared='$address' AND dispatch_control_messenger_date='$address' AND dispatch_control_messenger_status = '1' LIMIT 1";
  $query = mysqli_query($db_conn, $sql);
  $check = mysqli_num_rows($query);

  if($check > 0) { 

    echo "samedata";

  } else {

    $sql_code = "INSERT INTO ppbms_dispatch_control_messenger (dispatch_control_messenger_name, dispatch_control_messenger_address, dispatch_control_messenger_prepared, dispatch_control_messenger_date, dispatch_control_messenger_status)
    VALUES ('$name','$address','$prepared','$newDate','1')";
    $query = mysqli_query($db_conn, $sql_code);
    echo "successinsert";

  }

  exit();

}

if(isset($_POST["addabusenewstitle"])) {

  include_once("../include/db_conn.php");
  include_once("../include/loginstatus.php");

  $title = $_POST['addabusenewstitle'];
  $content = $_POST['addabusenewscontent'];

  $sql = "SELECT * FROM hervoice_abuse_news WHERE abuse_news_title='$title' AND abuse_news_content='$content' LIMIT 1";
  $query = mysqli_query($db_conn, $sql);
  $check = mysqli_num_rows($query);

  if($check > 0) { 

    echo "samedata";

  } else {

    $sql_user = "INSERT INTO hervoice_abuse_news (abuse_news_title, abuse_news_content, abuse_news_date, abuse_news_status)
    VALUES ('$title', '$content', NOW(), '1')";
    $query = mysqli_query($db_conn, $sql_user);
    echo "successinsert";

  }

  mysqli_close($db_conn);

  exit();

}

if(isset($_POST["addreporttype"])) {

  include_once("../include/db_conn.php");
  include_once("../include/loginstatus.php");

  $ra = $_POST['addreportra'];
  $type = $_POST['addreporttype'];
  $number = $_POST['addreportnumber'];
  $name = $_POST['addreportname'];

  $sql = "SELECT * FROM hervoice_report WHERE report_ra='$ra' AND report_type_violence='$type' AND report_case_number='$number' AND report_name='$name' LIMIT 1";
  $query = mysqli_query($db_conn, $sql);
  $check = mysqli_num_rows($query);

  if($check > 0) { 

    echo "samedata";

  } else {

    $sql_user = "INSERT INTO hervoice_report (report_ra, report_type_violence, report_case_number, report_name, report_date)
    VALUES ('$ra', '$type', '$number', '$name', NOW())";
    $query = mysqli_query($db_conn, $sql_user);
    echo "successinsert";

  }

  mysqli_close($db_conn);

  exit();

}

if(isset($_POST["deleteabusenewsid"])) {

  include_once("../include/db_conn.php");
  include_once("../include/loginstatus.php");

  $rid = $_POST['deleteabusenewsid'];

  $sql = "UPDATE hervoice_abuse_news SET abuse_news_status='2' WHERE id='$rid' LIMIT 1";
  $query = mysqli_query($db_conn, $sql);
  echo "successupdate";

  mysqli_close($db_conn);

  exit();

}

if(isset($_POST["updatedispatchcontrolmessengerid"])) {

  include_once("../includes/db_conn.php");
  include_once("../includes/loginstatus.php");

  $rid = $_POST['updatedispatchcontrolmessengerid'];
  $name = $_POST['updatedispatchcontrolmessengername'];
  $address = $_POST['updatedispatchcontrolmessengeaddress'];
  $prepared = $_POST['updatedispatchcontrolmessengerprepared'];
  $date = $_POST['updatedispatchcontrolmessengerdate'];
  $newDate = date("Y-m-d H:i:s", strtotime($date));

  $sql = "UPDATE ppbms_dispatch_control_messenger SET dispatch_control_messenger_name='$name', dispatch_control_messenger_address='$address', dispatch_control_messenger_prepared='$prepared', dispatch_control_messenger_date='$newDate' WHERE id='$rid' LIMIT 1";
  $query = mysqli_query($db_conn, $sql);
  echo "successupdate";

  exit();

}

if(isset($_POST["deletedispatchcontrolmessengerid"])) {

  include_once("../includes/db_conn.php");
  include_once("../includes/loginstatus.php");

  $rid = $_POST['deletedispatchcontrolmessengerid'];

  $sql = "UPDATE ppbms_dispatch_control_messenger SET dispatch_control_messenger_status='2' WHERE id='$rid' LIMIT 1";
  $query = mysqli_query($db_conn, $sql);
  echo "successupdate";

  exit();

}

if(isset($_POST["adddispatchcontroldatamessengerid"])) {

  include_once("../includes/db_conn.php");
  include_once("../includes/loginstatus.php");

  $rid = $_POST['adddispatchcontroldatamessengerid'];
  $cyclecode = $_POST['adddispatchcontroldatacyclecode'];
  $date = $_POST['adddispatchcontroldatapickupdate'];
  $newDate1 = date("Y-m-d H:i:s", strtotime($date));
  $newDate2 = date("m/d/y", strtotime($date));
  $sender = $_POST['adddispatchcontroldatasender'];
  $deltype = $_POST['adddispatchcontroldatadeltype'];

  $sql = "SELECT * FROM ppbms_dispatch_control_data WHERE dispatch_control_messenger_id='$rid' AND dispatch_control_data_cycle_code='$cyclecode' AND dispatch_control_data_pickup_date='$newDate1' AND dispatch_control_data_sender='$sender' AND dispatch_control_data_del_type = '$deltype' AND dispatch_control_data_status = '1' LIMIT 1";
  $query = mysqli_query($db_conn, $sql);
  $check = mysqli_num_rows($query);

  $sql_cycle_code = "SELECT * FROM ppbms_record WHERE record_cycle_code='$cyclecode' AND record_pud='$newDate2' AND record_sender='$sender' AND record_deltype='$deltype' LIMIT 1";
  $query_cycle_code = mysqli_query($db_conn, $sql_cycle_code);
  $check_cycle_code = mysqli_num_rows($query_cycle_code);

  if($check > 0) { 

    echo "samedata";

  } else {

    if($check_cycle_code > 0) {

      $sql_code = "INSERT INTO ppbms_dispatch_control_data (dispatch_control_messenger_id, dispatch_control_data_cycle_code, dispatch_control_data_pickup_date, dispatch_control_data_sender, dispatch_control_data_del_type, dispatch_control_data_status)
      VALUES ('$rid','$cyclecode','$newDate1','$sender','$deltype','1')";
      $query = mysqli_query($db_conn, $sql_code);
      echo "successinsert";

    } else {

      echo "datanotexists";

    }

  }

  exit();

}

if(isset($_POST["deleteencodelistsid"])) {

  include_once("../includes/db_conn.php");
  include_once("../includes/loginstatus.php");

  $rid = $_POST['deleteencodelistsid'];

  $sql = "UPDATE ppbms_encode_list SET encode_lists_status='2' WHERE id='$rid' LIMIT 1";
  $query = mysqli_query($db_conn, $sql);

  if($query) {
    $sql1 = "UPDATE ppbms_record SET record_status_status='2' WHERE encode_lists_id='$rid'";
    $query1 = mysqli_query($db_conn, $sql1);
  }
  echo "successupdate";

  exit();

}

if(isset($_POST["updaterecordbarcode"])) {

  include_once("../includes/db_conn.php");
  include_once("../includes/loginstatus.php");

  $barcode = $_POST['updaterecordbarcode'];
  $daterecieve = $_POST['updaterecorddaterecieve'];
  $recieveby = $_POST['updaterecordrecieveby'];
  $relation = $_POST['updaterecordrelation'];
  $messenger = $_POST['updaterecordmessenger'];
  $status = $_POST['updaterecordstatus'];
  $reasonrts = $_POST['updaterecordreasonrts'];
  $remarks = $_POST['updaterecordremarks'];
  $datereported = $_POST['updaterecorddatereported'];
  $newDate1 = date("Y-m-d H:i:s", strtotime($daterecieve));
  $newDate2 = date("Y-m-d H:i:s", strtotime($datereported));

  $sql = "UPDATE ppbms_record SET record_date_receive='$newDate1', record_receive_by='$recieveby',   record_relation='$relation', record_messenger='$messenger', record_status='$status', record_reason_rts='$reasonrts', record_remarks='$remarks', record_date_reported='$newDate2' WHERE record_bar_code='$barcode' LIMIT 1";
  $query = mysqli_query($db_conn, $sql);
  echo "successupdate";

  exit();

}

if(isset($_POST["qname"])) {

  include_once("../includes/db_conn.php");
  include_once("../includes/loginstatus.php");

  $name = $_POST['qname'];

  $sql = "SELECT * FROM oes_question_list WHERE q_list_name='$name' LIMIT 1";
  $query = mysqli_query($db_conn, $sql);
  $check = mysqli_num_rows($query);

  if($check > 0) { 

  	echo "samedata";

  } else {

    $sql_user = "INSERT INTO oes_question_list (q_list_name, q_list_date_created, q_list_status)
    VALUES ('$name', NOW(), '1')";
    $query = mysqli_query($db_conn, $sql_user);
    echo "successinsert";

  }

  exit();

}

if(isset($_POST["aname"])) {

  include_once("../includes/db_conn.php");
  include_once("../includes/loginstatus.php");

  $name = $_POST['aname'];

  $sql = "SELECT * FROM oes_answer_list WHERE a_list_name='$name' LIMIT 1";
  $query = mysqli_query($db_conn, $sql);
  $check = mysqli_num_rows($query);

  if($check > 0) { 

  	echo "samedata";

  } else {

    $sql_user = "INSERT INTO oes_answer_list (a_list_name, a_list_date_created, a_list_status)
    VALUES ('$name', NOW(), '1')";
    $query = mysqli_query($db_conn, $sql_user);
    echo "successinsert";

  }

  exit();

}

?>