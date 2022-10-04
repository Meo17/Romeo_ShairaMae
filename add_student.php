<?php
session_start();
include('databasecon.php');

	if (!empty($_POST['school_id'])) {

		$school_id = trim ($_POST['school_id']);
		$full_name = trim ($_POST['full_name']);
		$score     = trim ($_POST['score']);

		add_student($school_id,$full_name,$score);
		echo "true";
	} else {
		echo "false";
	}
?>