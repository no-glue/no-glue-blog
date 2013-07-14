<?php require_once('blog_admin_posts_index_title.php'); ?>
<?php require_once('blog_admin_posts_index_menu.php'); ?>
<div class='line'>
	<table class='show'>
		<thead>
			<tr>
				<th>id</th>
				<th>name</th>
				<th>title</th>
				<th>body</th>
			</tr>
		</thead>
		<tbody>
			<?php while($post=$values['posts']->fetch()): ?>
			<tr>
				<td>
					<div class='line'><?php echo $post->getId(); ?></div>
					<div class='line'><?php echo \application\classes\Factory::create('Link')->lineForm('blog_admin_posts','view',$post->getId(),array('class'=>'submit')); ?></div>
					<div class='line'>
						<?php echo \application\classes\Factory::create('Link')->lineForm('blog_admin_posts','index',$post->getId(),array('class'=>'submit'),'delete','post'); ?>
					</div>
				</td>
				<td>
					<?php echo $post->getName(); ?>
				</td>
				<td><?php echo \application\classes\Factory::create('Text')->cut($post->getTitle()); ?></td>
				<td><?php echo \application\classes\Factory::create('Text')->cut($post->getBody()); ?></td>
			</tr>
			<?php endwhile; ?>
		</tbody>
	</table>
</div>
