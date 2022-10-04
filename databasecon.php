<?php

function db(){
		return new PDO("mysql:host=localhost; dbname=exam;", "root","");
}

function add_school($schoolname){
	$db = db();
	$sql = "INSERT INTO school(schoolname) VALUES(?)";
	$s = $db->prepare($sql);
	$s->execute(array($schoolname));
	$db = null;
}

function retschool(){
	$db = db();	
	$sql = "SELECT * FROM  school ";
	$s = $db->query($sql);
	$ret = $s->fetchAll();
	$db = null;
	return $ret;
}

function add_student($school_id,$full_name,$score) {
	$db = db();
	$sql = "INSERT INTO  student(school_id,full_name,score) VALUES(?,?,?)";
	$s = $db->prepare($sql);
	$s->execute(array($school_id,$full_name,$score));
	$db = null;
}
 function checkname($name, $school_id){
	$db = db();	
	$sql = "SELECT * FROM  student WHERE full_name ='$name' and school_id = '$school_id'";
	$s = $db->query($sql);
	$st = $s->fetchAll();
	$db = null;
	return $st;
 }

 function ret_students(){
	$db = db();	
	$sql = "SELECT * FROM  student  st INNER JOIN  school s ON st.school_id = s.id order by st.full_name asc ";
	$s = $db->query($sql);
	$ret = $s->fetchAll();
	$db = null;
	return $ret;
}
