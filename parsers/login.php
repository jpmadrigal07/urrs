<?php

// AJAX CALLS THIS LOGIN CODE TO EXECUTE
if (isset($_POST["u"])) {
	// CONNECT TO THE DATABASE
	include_once("../include/db_conn.php");
	// GATHER THE POSTED DATA INTO LOCAL VARIABLES AND SANTIZE
	$u = mysqli_real_escape_string($db_conn, $_POST['u']);
	$p = $_POST['p'];
	$l = $_POST['l'];
	// GET USER IP ADRESS
	$ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
	// FORM DATA ERROR HANDLING
	if ($u == "" || $p == "") {
		echo "login_failed";
		exit();
	} else {
	// END FORM DATA ERROR HANDLING
		$sql = "SELECT id, user_pass, user_level FROM urrs_user WHERE user_username='$u' LIMIT 1";
		$query = mysqli_query($db_conn, $sql);
		$row = mysqli_fetch_row($query);
		$db_id = $row[0];
		$db_pass_str = $row[1];
		$db_level = $row[2];
		if ($p != $db_pass_str) {
			echo "login_failed";
			exit();
		} else if ($db_level != $l) {
			echo "login_failed_level";
			exit();
		} else {
			// CREATE THEIR SESSION AND COOKIES
			$_SESSION['userid'] = $db_id;
			$_SESSION['password'] = $db_pass_str;
			setcookie("id", $db_id, strtotime( '+30 days' ), "/", "", "", TRUE);
			setcookie("pass", $db_pass_str, strtotime( '+30 days' ), "/", "", "", TRUE);
			// UPDATE THEIR "IP" AND "LASTLOGIN" FIELDS
			$sql = "UPDATE urrs_user SET user_ip='$ip', user_last_login=now() WHERE id='$db_id' LIMIT 1";
			$query = mysqli_query($db_conn, $sql);
			echo $db_id;
			exit();
		}
	}
	exit();
}	

?>