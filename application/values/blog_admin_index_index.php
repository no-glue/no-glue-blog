<?php

return array(
	'css'=>array(
		'main'=>array(
			'location'=>'application/css/blog_admin.css',
			'type'=>'text/css',
			'rel'=>'stylesheet'
		)
	),
	'subviews'=>array(
		'header'=>array(
			'blog_admin_title'=>'blog_admin_title.php',
			'blog_admin_description'=>'blog_admin_description.php'
		),
		'blog_admin_menu'=>'empty.php',
		'blog_admin_body'=>'blog_admin_log_in.php'
	)
);
