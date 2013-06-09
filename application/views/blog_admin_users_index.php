<?php require_once('blog_admin_users_index_title.php'); ?>
<?php require_once('blog_admin_users_index_menu.php'); ?>
<div class='line'>
	<table class='show'>
		<thead>
			<tr>
				<th>id</th>
				<th>username</th>
				<th>level</th>
			</tr>
		</thead>
		<tbody>
			<?php while($user=$values['users']->fetch()): ?>
			<tr>
				<td>
					<div class='line'><?php echo $user->getId(); ?></div>
					<div class='line'><?php echo \application\classes\ClassFactory::create('Link')->lineForm('blog_admin_users','view',$user->getId(),array('class'=>'submit')); ?></div>
					<div class='line'>
						<?php echo \application\classes\ClassFactory::create('Link')->lineForm('blog_admin_users','index',$user->getId(),array('class'=>'submit'),'delete','post'); ?>
					</div>
				</td>
				<td>
					<?php echo $user->getUsername(); ?>
				</td>
				<td><?php echo $user->getLevel(); ?></td>
			</tr>
			<?php endwhile; ?>
		</tbody>
	</table>
</div>
