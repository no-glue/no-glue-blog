<?php echo \useful\Factory::create('Form')->open('blog_admin_users','view','<div class=\'line\'>','</div>'); ?>
<div class='line title'>username</div>
<div class='line'><input type='text' name='username' value='<?php echo $values['user']->getUsername(); ?>' class='text' /></div>
<div class='line title'>password</div>
<div class='line'><input type='text' name='password' class='text' /></div>
<div class='line title'>level</div>
<div class='line'><input type='text' name='level' value='<?php echo $values['user']->getLevel(); ?>' class='text' /></div>
<div class='line'><input type='hidden' name='created_at' value='<?php echo $values['user']->getCreatedAt(); ?>' /></div>
<div class='line'><input type='hidden' name='id' value='<?php echo $values['user']->getId(); ?>' /></div>
<div class='line'><input type='submit' name='update' value='update' class='submit' /></div>
<?php echo \useful\Factory::create('Form')->close(); ?>
<div class='line title'>created at</div>
<div class='line'><?php echo date('Y-m-d H:i:s',$values['user']->getCreatedAt()); ?></div>
<div class='line title'>modified at</div>
<div class='line'><?php echo date('Y-m-d H:i:s',$values['user']->getModifiedAt()); ?></div>
