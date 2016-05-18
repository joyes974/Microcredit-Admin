<?php $this->load->view('header');  ?>

<?php echo validation_errors(); ?>



<div id="leftcolumn">
<?php echo form_open('emplog'); ?>
<h1> <?=$error?> </h1>
<h5>Username</h5>
<input type="text" name="username" value="<?php echo set_value('username') ; ?>" size="50" />

<h5>Password</h5>
<input type="password" name="password" value="<?php echo set_value('password'); ?>" size="50" />

<input type='hidden' name='Submit' value='Submit'>
<div><br><br><input type="submit" value="Submit" /></div>

</form>
</div>



<?php $this->load->view('footer_1');  ?>