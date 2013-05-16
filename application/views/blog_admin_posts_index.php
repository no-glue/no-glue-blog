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
				<div class='line'><?php echo \application\classes\ClassWorker::work('Links','lineForm',array('class'=>'blog_admin_posts','name'=>'view','item_id'=>$post->getId())); ?></div>
				<div class='line'>
					<?php echo \application\classes\ClassWorker::work('Links','lineForm',array('name'=>'','id'=>'')); ?>
				</div>
			</td>
			<td><?php echo \application\classes\ClassWorker::work('Text','cut',array('text'=>$post->getTitle())); ?></td>
			<td><?php echo \application\classes\ClassWorker::work('Text','cut',array('text'=>$post->getBody())); ?></td>
			<td><?php echo date('Y-m-d H:i:s',$post->getCreatedAt()); ?></td>
			<td><?php echo date('Y-m-d H:i:s',$post->getModifiedAt()); ?></td>
		</tr>
		<?php endwhile; ?>
	</tbody>
</table>
