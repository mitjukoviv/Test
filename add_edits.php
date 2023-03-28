<?php
	include_once('sql.php');
	include_once('config.php');
	
	$arr['name'] = "'".$_POST['name']."'";
	$arr['knowledge'] = "'".$_POST['knowledge']."'";
	$arr['ability'] = "'".$_POST['ability']."'";
	$arr['skill'] = "'".$_POST['skill']."'";
	$arr['discipline_id'] = $_POST['discipline_id'];
	
	$DB = new sql($host,$user,$pass,$data);	
	
	$DB->insert_record('edits',$arr);