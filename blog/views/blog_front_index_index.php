<?php while($post=$values['posts']->fetch()): ?>
<div class='line title'><?php echo $post->getTitle();?></div>
<div class='line'><?php echo nl2br(\useful\Factory::create('Text')->cut($post->getBody(),300);)?></div>
<div class='line'><?php echo \useful\Factory::create('Link')->link('blog_front_index','more','more',array('id'=>$post->getId()));?></div>
<?php endwhile; ?>
