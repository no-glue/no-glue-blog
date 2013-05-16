<!DOCTYPE html>
<html>
<head>
	<?php 
		echo \application\classes\ClassWorker::work(
			'Links',
			'css',
			array(
				'location'=>$values['css']['main']['location'],
				'type'=>$values['css']['main']['type'],
				'rel'=>$values['css']['main']['rel']
			)
		); 
	?>
</head>
<body>
	<div id='container'>
		<div id='header'>
			<div id='site-title'><?php require_once($values['subviews']['header']['blog_admin_title']); ?></div>
			<div id='site-description'><?php require_once($values['subviews']['header']['blog_admin_description']); ?></div>
		</div>
		<div id='content'>
			<div id='right-content'><?php require_once($values['subviews']['blog_admin_menu']); ?></div>
			<div id='left-content'><?php require_once($values['subviews']['blog_admin_body']); ?></div>
		</div>
		<div id='footer'></div>
	</div>
</body>
</html>
