<?php
	include_once('sql.php');
	include_once('config.php');
	
	$new['id'] = $_POST['id'];
	
	$DB = new sql($host,$user,$pass,$data);	
	
	$edits = $DB->get_record('edits',['id' => $new['id']])->fetch_array(MYSQLI_ASSOC);
	
	$arr['knowledge'] = $edits['knowledge'];
	$arr['ability'] = $edits['ability'];
	$arr['skill'] = $edits['skill'];
	$search['id'] = $edits['discipline_id'];
	
	$DB->update_record('discipline',$search,$arr);
	
	$DB->delete_record('edits',$new);