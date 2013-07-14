<?php echo \application\classes\Factory::create('Form')->open('blog_admin_posts','view','<div class=\'line\'>','</div>'); ?>
<div class='line title'>name</div>
<div class='line'><input type='text' name='name' value='<?php echo $values['post']->getName(); ?>' class='text' /></div>
<div class='line title'>title</div>
<div class='line'><input type='text' name='title' value='<?php echo $values['post']->getTitle(); ?>' class='text' /></div>
<div class='line title'>body</div>
<div class='line'><textarea name='body' class='text-area'><?php echo $values['post']->getBody(); ?></textarea></div>
<div class='line'><input type='hidden' name='created_at' value='<?php echo $values['post']->getCreatedAt(); ?>' /></div>
<div class='line'><input type='hidden' name='id' value='<?php echo $values['post']->getId(); ?>' /></div>
<div class='line'><input type='submit' name='update' value='update' class='submit' /></div>
<?php echo \application\classes\Factory::create('Form')->close(); ?>
<div class='line title'>created at</div>
<div class='line'><?php echo date('Y-m-d H:i:s',$values['post']->getCreatedAt()); ?></div>
<div class='line title'>modified at</div>
<div class='line'><?php echo date('Y-m-d H:i:s',$values['post']->getModifiedAt()); ?></div>
