<?php
session_start();
include('databasecon.php');

	if (!empty($_POST['schoolname'])) {
		$schoolname= trim ($_POST['schoolname']);
		add_school($schoolname);
		echo "true";
	}  else {
		echo "false";
	}
?>