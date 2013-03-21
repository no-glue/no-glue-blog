<!DOCTYPE html>
<html>
<head>
	<?php echo $values->css['main']; ?>
</head>
<body>
	<div id='container'>
		<div id='header'>
			<?php require_once($values->subviews['header']['site_title']); ?>
			<?php require_once($values->subviews['header']['site_description']); ?>
			<?php require_once($values->subviews['menu']); ?>
		</div>
		<div id='content'>
			<?php require_once($values->subviews['body']); ?>
		</div>
		<div id='footer'></div>
	</div>
</body>
</html>
</html>
