<table class='show'>
	<thead>
		<tr>
			<th>name</th>
			<th>title</th>
			<th>body</th>
			<th>created at</th>
			<th>modified at</th>
		</tr>
	</thead>
	<tbody>
		<?php while($post=$values['posts']->fetch()): ?>
		<tr>
			<td>
				<div class='line'><?php echo $post->getName(); ?></div>
				<div class='line'>
					<?php echo \application\classes\ClassFactory::create('Links')->lineForm('',''); ?>
					<?php echo \application\classes\ClassFactory::create('Links')->lineForm('',''); ?>
				</div>
			</td>
			<td><?php echo \application\classes\ClassFactory::create('Text')->cut($post->getTitle()); ?></td>
			<td><?php echo \application\classes\ClassFactory::create('Text')->cut($post->getBody()); ?></td>
			<td><?php echo date('Y-m-d',$post->getCreatedAt()); ?></td>
			<td><?php echo date('Y-m-d',$post->getModifiedAt()); ?></td>
		</tr>
		<?php endwhile; ?>
	</tbody>
</table>
