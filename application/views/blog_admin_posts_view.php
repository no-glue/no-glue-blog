<?php $post=$values['posts']->fetch(); ?>

<div class='line'>name</div>
<div class='line'><?php echo $post->getName(); ?></div>
<div class='line'>title</div>
<div class='line'><?php echo $post->getTitle(); ?></div>
<div class='line'>body</div>
<div class='line'><?php echo $post->getBody(); ?></div>
<div class='line'>created at</div>
<div class='line'><?php echo $post->createdAt(); ?></div>
<div class='line'>modified at</div>
<div class='line'><?php echo $post->ModifiedAt(); ?></div>

