<?php echo \application\classes\ClassFactory::create('Form')->open('blog_admin_users','add','<div class=\'line\'>','</div>'); ?>
<div class='line title'>username</div>
<div class='line'><input type='text' name='username' class='text' /></div>
<div class='line title'>password</div>
<div class='line'><input type='text' name='password' class='text' /></div>
<div class='line title'>level</div>
<div class='line'><input type='text' name='level' class='text' /></div>
<div class='line'><input type='submit' name='add' value='add' class='submit' /></div>
<?php echo \application\classes\ClassFactory::create('Form')->close(); ?>
