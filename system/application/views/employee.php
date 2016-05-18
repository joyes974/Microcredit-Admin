<html>
<head>
<title>Registration</title>
</head>
<body>

<?php echo validation_errors(); ?>

<?php echo form_open('user/employee'); ?>

<h5>Username</h5>
<input type="text" name="username" value="<?php echo set_value('Username') ; ?>" size="50" />

<h5>Password</h5>
<input type="password" name="password" value="<?php echo set_value('password'); ?>" size="50" />

<h5>Password Confirm</h5>
<input type="password" name="passconf" value="<?php echo set_value('passconf'); ?>" size="50" />

<div><br><br><input type="submit" value="Submit" /></div>

</form>

</body>
</html>
