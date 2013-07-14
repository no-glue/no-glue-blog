<?php echo \application\classes\Factory::create('Form')->open('blog_admin_posts','add','<div class=\'line\'>','</div>'); ?>
<div class='line title'>name</div>
<div class='line'><input type='text' name='name' class='text' /></div>
<div class='line title'>title</div>
<div class='line'><input type='text' name='title' class='text' /></div>
<div class='line title'>body</div>
<div class='line'><textarea name='body' class='text-area'></textarea></div>
<div class='line'><input type='submit' name='add' value='add' class='submit' /></div>
<?php echo \application\classes\Factory::create('Form')->close(); ?>
