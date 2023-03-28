<?php
	include_once('sql.php');
	include_once('config.php');
	
	$arr['name'] = "'".$_POST['name']."'";
	$arr['knowledge'] = "'".$_POST['knowledge']."'";
	$arr['ability'] = "'".$_POST['ability']."'";
	$arr['skill'] = "'".$_POST['skill']."'";
	$arr['program_id'] = $_POST['program_id'];
	
	$DB = new sql($host,$user,$pass,$data);	
	
	$DB->insert_record('discipline',$arr);