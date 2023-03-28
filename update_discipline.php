<?php
	include_once('sql.php');
	include_once('config.php');
	
	$arr['name'] = $_POST['name'];
	$arr['knowledge'] = $_POST['knowledge'];
	$arr['ability'] = $_POST['ability'];
	$arr['skill'] = $_POST['skill'];
	$search['id'] = $_POST['discipline_id'];
	
	$DB = new sql($host,$user,$pass,$data);	
	
	$DB->update_record('discipline',$search,$arr);