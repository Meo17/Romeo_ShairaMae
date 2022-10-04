<?php
session_start();
include('databasecon.php');

	if (!empty($_POST['full_name'])) {

		$school_id = trim ($_POST['school_id']);
		$full_name = trim ($_POST['full_name']);
		$check = checkname($full_name,$school_id) ;
		if(!empty($check)){
			echo  "true";
		} else {
			echo  "false";
		}
	}
?>