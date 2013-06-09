<?php echo \application\classes\ClassFactory::create('Form')->open('blog_admin_users','view','<div class=\'line\'>','</div>'); ?>
<div class='line title'>username</div>
<div class='line'><input type='text' name='username' value='<?php echo $values['user']->getUsername(); ?>' class='text' /></div>
<div class='line title'>password</div>
<div class='line'><input type='text' name='username' class='text' /></div>
<div class='line title'>level</div>
<div class='line'><input type='text' name='username' value='<?php echo $values['user']->getLevel(); ?>' class='text' /></div>
<div class='line'><input type='submit' name='update' value='update' class='submit' /></div>
<?php echo \application\classes\ClassFactory::create('Form')->close(); ?>
<div class='line title'>created at</div>
<div class='line'><?php echo date('Y-m-d H:i:s',$values['user']->getCreatedAt()); ?></div>
<div class='line title'>modified at</div>
<div class='line'><?php echo date('Y-m-d H:i:s',$values['user']->getModifiedAt()); ?></div>
