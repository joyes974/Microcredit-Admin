<?php $this->load->view('header');  ?>

<?php echo validation_errors(); ?>

<?php echo form_open('l_app'); ?>

<div id="leftcolumn">
<h1> <?=isset($error)?$error:""?> </h1>
<h5>Asking Amount:</h5>
<input type="text" name="asking" value="<?php echo set_value('asking') ; ?>" size="50" onkeypress="return numeralsOnly(event)"/>

<h5>Loan Skim:</h5>
<input type="radio" name="skim" value="skim1" checked />Skim1&nbsp;&nbsp;&nbsp;<input type="radio" name="skim" value="skim2"/>Skim2

<h5>Nomini Name:</h5>
<input type="text" name="nomini" value="<?php echo set_value('nomini'); ?>" size="50" />

<div><br><br><input type="submit" value="Submit" /></div>

</form>
</div>
<?php $this->load->view('footer');  ?>