<?php exit('<pre>'.print_r($values['posts']->fetch(),true).'</pre>'); ?><?php while(($post=$values['posts']->fetch())!=NULL): ?>
<?php echo $post->getTitle(); ?>
<?php endwhile; ?>
blog admin posts index

