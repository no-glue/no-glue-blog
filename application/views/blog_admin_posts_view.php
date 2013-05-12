<?php echo \application\classes\ClassFactory::create('Form')->open('blog_admin_posts','update','<div class=\'line\'>','</div>'); ?>
<div class='line'>name</div>
<div class='line'><input type='text' name='name' value='<?php echo $values['post']->getName(); ?>' /></div>
<div class='line'>title</div>
<div class='line'><input type='text' name='title' value='<?php echo $values['post']->getTitle(); ?>' /></div>
<div class='line'>body</div>
<div class='line'><textarea name='body'><?php echo $values['post']->getBody(); ?>'</textarea></div>
<div class='line'>created at</div>
<div class='line'><?php echo date('Y-m-d H:i:s',$values['post']->getCreatedAt()); ?></div>
<div class='line'>modified at</div>
<div class='line'><?php echo date('Y-m-d H:i:s',$values['post']->getModifiedAt()); ?></div>
<div class='line'><input type='hidden' name='id' value='<?php echo $values['post']->getId(); ?>' /></div>
<div class='line'><input type='submit' name='update' value='update' /></div>
<?php echo \application\classes\ClassFactory::create('Form')->close(); ?>
