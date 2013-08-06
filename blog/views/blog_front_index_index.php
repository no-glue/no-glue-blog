<?php while($post=$values['posts']->fetch()): ?>
<div class='line title'><?php echo $post->getTitle();?></div>
<div class='line'><?php echo \useful\Factory::create('Text')->cut($post->getBody(),300);?></div>
<?php endwhile; ?>
