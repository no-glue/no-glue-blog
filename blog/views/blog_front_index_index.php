<?php while($post=$values['posts']->fetch()): ?>
<div class='line'><?php echo $post->getTitle();?></div>
<div class='line'><?php echo $post->getBody();?></div>
<?php endwhile; ?>
