<?php echo \application\classes\Factory::create('Form')->open('blog_admin_index','index','<div class=\'line\'>','</div>'); ?>
<div class='line title'>username</div>
<div class='line'><input type='text' name='username' class='text' /></div>
<div class='line title'>password</div>
<div class='line'><input type='password' name='password' class='text' /></div>
<div class='line'><input type='submit' name='login' value='log in' class='submit' /></div>
<?php echo \application\classes\Factory::create('Form')->close(); ?>
