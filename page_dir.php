<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
		<style type="text/css">
			body {font-size:10px; color:#777777; font-family:arial;}
			h1{font-size:64px; color:#555555; margin: 70px 0 50px 0;}
			p{margin-top: 30px}
			.center{text-align:center; margin-left:auto;margin-right:auto;}
			a:link {color: #34536A;}
			a:visited {color: #34536A;}
			a:active {color: #34536A;}
			a:hover {color: #34536A;}
		</style>
	</head>
	<body>
		<div class='row'>
			<div class='col-2'>
				<h3>
					<a href="index.html">На главную</a><br><br>
				</h3>
			</div>
			<div class='col-1'>
				<button class='btn btn-success' onClick='Save();'>Сохранить</button>
			</div>
			<div class='col-1'>
				<button class='btn btn-danger' onClick='Discard();'>Отменить</button>
			</div>
		</div>
	</body>

	<?php
		include_once('sql.php');
		include_once('config.php');
		include_once('model.php');
		
		$DB = new sql($host,$user,$pass,$data);		
		$page = new model($DB);
		
		$page->show_edits('dir');
		$page->show_program('dir');
	?>
	<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
	<script src='script.js'></script>
</html>