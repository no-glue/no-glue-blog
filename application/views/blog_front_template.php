<!DOCTYPE html>
<html>
<head>
	<?php echo $values->css['main']; ?>
</head>
<body>
	<div id='container'>
		<div id='header'>
			<?php require_once($values->subviews['header']['blog_front_title']); ?>
			<?php require_once($values->subviews['header']['blog_front_description']); ?>
			<?php require_once($values->subviews['blog_front_menu']); ?>
		</div>
		<div id='content'>
			<?php require_once($values->subviews['blog_front_body']); ?>
		</div>
		<div id='footer'></div>
	</div>
</body>
</html>
</html>
