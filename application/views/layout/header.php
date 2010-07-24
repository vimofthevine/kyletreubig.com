<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Kyle Treubig's Website</title>
		<?php echo HTML::style('assets/css/reset.css') ?> 
		<?php echo HTML::style('assets/css/style.css') ?> 

		<?php echo HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js') ?> 
		<?php echo HTML::script('assets/js/common.js') ?> 
		<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body>

		<header>
			<hgroup>
				<h1><?php echo HTML::anchor('', __('Kyle Treubig')) ?></h1>
				<h2>Musician, Web Developer</h2>
			</hgroup>
			<?php echo $menu ?> 
		</header>
