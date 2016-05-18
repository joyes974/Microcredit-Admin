<?php $this->load->view('header');  ?>

<?php echo validation_errors(); ?>

<?php echo form_open('user'); ?>
<div id="leftcolumn">
<h5>Username</h5>
<input type="text" name="username" value="<?php echo set_value('Username') ; ?>" size="50" />

<h5>Password</h5>
<input type="password" name="password" value="<?php echo set_value('password'); ?>" size="50" />

<h5>Password Confirm</h5>
<input type="password" name="passconf" value="<?php echo set_value('passconf'); ?>" size="50" />

<h5>Fullname</h5>
<input type="text" name="fullname" size="50">

<h5>Address</h5>
<input type="text" name="address" size="40">

<h5>Mobile</h5>
<input type="text" name="mobile" size="15">

<h5>Email Address</h5>
<input type="text" name="email" value="<?php echo set_value('email'); ?>" size="50" />

<div><br><br><input type="submit" value="Submit" /></div>

</form>
</div>

<?php $this->load->view('footer_1');  ?>