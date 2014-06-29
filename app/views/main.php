<!DOCTYPE html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui" />
	<title>Bitter</title>
	<link rel="shortcut icon" href="/bitter/images/crowThumb.png">
    
    <link href='http://fonts.googleapis.com/css?family=Amatic+SC:700,400' rel='stylesheet' type='text/css'>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<!-- Main CSS -->
	<link rel="stylesheet" href="/bitter/css/styles.css">

	<!-- Payload CSS -->
	<?php echo Payload::get_css(); ?>

	<!-- Modernizr -->
<script src="/bitter/bower_components/modernizr/modernizr.js"></script>

</head>
<body>

	<div class="page">
		<?php echo $primary_header; ?>
		<?php echo $main_content; ?>
	</div>

	<!-- Include Common Scripts -->
	<script src="/bitter/bower_components/jquery/dist/jquery.js"></script>
	<script src="/bitter/bower_components/ReptileForms/dist/reptileforms.js"></script>

	<!-- Get JS -->
	<script>var app = {};app.settings=<?php echo Payload::get_settings(); ?>;</script>
	<?php echo Payload::get_js(); ?>
	
	<!-- Main JS -->
	<script src="/bitter/js/main.js"></script>

</body>
</html>