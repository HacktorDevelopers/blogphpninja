
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<title><?php $title?></title>
		<?php echo link_tag('resources/css/bootstrap/bootstrap.min.css')?>
		<?php echo link_tag('resources/css/style.css')?>
		<?php echo link_tag('resources/font/awesome/css/all.css')?>
	</head>
	<body class="bg-light container-fluid">
	<!--GENERAL BODY CONTAINER-->
	<div class="container bg-light" style="margin-top: 100px;">
	
		<div class="navbar fixed-top navbar-light bg-dark">
			
			<a class="navbar-brand">
				<img class="logo" src="<?php echo site_url()?>resources/images/logo.png" />
				&nbsp; &nbsp;<?php echo $project_name?>
					<h6 class="card-subtitle mb-2 text-muted text-right">Learn PHP</h6>
			</a>
			<p class="text-left text-success"><?php echo $user = $this->session->user_data? "Online" : "offline"?></p>
		</div>
		<p class="alert fixed-top" style="display:none; margin-top:95px;" id="msg"></p>
