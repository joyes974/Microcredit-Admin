<?php $this->load->view('header');

?>
<table width='100%' align='center' cellpadding="10" cellspacing="0">

    <tr>
        <td align='center'>
            <form action="<?=site_url('users/login');?>"  method="POST">
            <fieldset style="width:300px" align="center">
            <legend class="h2"><font color='#0072bc' size='2'><b>User Login</b></font></legend>
            <table width="100%" cellpadding="2" cellspacing="2" border="0" align="center">
              <tr>
                <td colspan='2' class="err" align='center'><?=$error?></td>
            </tr>
            <tr>
                <td colspan='2' class="err" align='center'><?php if($this->validation->error_string!=""){?>
					  <div class="err">Enter the username and password</div>
						<?php }?>	
				</td>
			</tr>
			<tr>
				<td class="b_11"><b>Email</b></td>
				<td><input type="text" name="username" size="25" value="<?=$_REQUEST[username]?>"></td>
			</tr>
			<tr>
				<td class="b_11"><b>Password</b></td>
				<td><input type="password" name="password" size="25" value="<?=$_REQUEST[password]?>"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="submit" value="Log In"></td>
			</tr>
            </table>
            </fieldset>
            </form>
        </td>
    </tr>


</table>

<?php $this->load->view('footer');  ?>
