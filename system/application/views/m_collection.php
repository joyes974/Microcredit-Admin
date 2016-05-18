<?php $this->load->view('header');  ?>
<?php echo validation_errors(); ?>

<?php echo form_open('m_collection'); ?>
<div id="leftcolumn">
<h5>Account number</h5>
<input type="text" name="username" value="<?php echo set_value('Username') ; ?>" size="50" onkeypress="return numeralsOnly(event)" />

<h5>Fullname</h5>
<input type="text" name="fullname" value="<?php echo set_value('fullname'); ?>" size="50">

<h5>Month number</h5>
<input type="text" name="mnumber" value="<?php echo set_value('mnumber'); ?>" size="50" onkeypress="return numeralsOnly(event)" />

<h5>Monthly rate</h5>
<input type="text" name="mrate" value="<?php echo set_value('mrate'); ?>" size="50" onkeypress="return numeralsOnly(event)"/>

<h5>Due</h5>
<input type="text" name="due" size="40" onkeypress="return numeralsOnly(event)">

<h5>Fine</h5>
<input type="text" name="fine" size="15" onkeypress="return numeralsOnly(event)">

<h5>Book</h5>
<input type="text" name="book" value="<?php echo set_value('book'); ?>" size="50" onkeypress="return numeralsOnly(event)"/>

<h5>Total deposit</h5>
<input type="text" name="tdeposit" value="<?php echo set_value('tdeposit'); ?>" size="50" onkeypress="return numeralsOnly(event)"/>

<h5>Total payment</h5>
<input type="text" name="tpay" value="<?php echo set_value('tpay'); ?>" size="50" onkeypress="return numeralsOnly(event)"/>

<div><br><br><input type="submit" value="Submit" /></div>

</form>
</div>
<?php $this->load->view('footer_1');  ?>