<!DOCTYPE html>
<html>
<head>
	<?php 
		echo \useful\Factory::create('Link')
			->css(
				$values['css']['main']['location'],
				$values['css']['main']['type'],
				$values['css']['main']['rel']
			);
	?>
</head>
<body>
	<div id='container'>
		<div id='header'>
			<div id='site-title'><?php require_once($values['subviews']['header']['blog_front_title']); ?></div>
			<div id='site-description'><?php require_once($values['subviews']['header']['blog_front_description']); ?></div>
		</div>
		<div id='content'>
			<?php require_once($values['subviews']['blog_front_body']); ?>
		</div>
		<div id='footer'></div>
	</div>
</body>
</html>
