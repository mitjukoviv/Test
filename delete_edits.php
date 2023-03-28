<?php
	include_once('sql.php');
	include_once('config.php');
	
	$arr['id'] = $_POST['id'];
	
	$DB = new sql($host,$user,$pass,$data);	
	
	$DB->delete_record('edits',$arr);