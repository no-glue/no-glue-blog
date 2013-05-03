<table>
	<thead>
		<tr>
			<th>id</th>
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
			<td><?php echo $post->getId(); ?></td>
			<td><?php echo $post->getName(); ?></td>
			<td><?php echo \application\classes\Text::cut($post->getTitle()); ?></td>
			<td><?php echo \application\classes\Text::cut($post->getBody()); ?></td>
			<td><?php echo gmdate('Y-m-d',$post->getCreatedAt()); ?></td>
			<td><?php echo gmdate('Y-m-d',$post->getModifiedAt()); ?></td>
		</tr>
		<?php endwhile; ?>
	</tbody>
</table>
