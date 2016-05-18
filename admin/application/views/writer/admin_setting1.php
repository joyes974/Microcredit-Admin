<?php $this->load->view('header'); ?>
<table cellpadding ="0" cellspacing="0" border="0" width="100%">
        <tr height='25'>
            <td class="err"><?=$error?></td>
        </tr>
        <tr height="110">
                <td align="center" valign="top">
                        <form method="post" action="<?=site_url()?>writer/update_employee">
                        <table cellpadding ="0" cellspacing="5" border="0" width="98%" style = "border:#efefef 1px solid">
                                <tr>
                                        <td colspan="2">
                                                <b>Edit Admin Settings</b>
                                        </td>
                                </tr>
                                <tr>
                                        <td colspan="2">
                                                &nbsp;
                                        </td>
                                </tr>

                                <tr>
                                        <td width="25%">
                                                <b>Admin Username :</b>
                                        </td>
                                        <td>
                                                <input type="text" name="admin_username" value="<?=$emp_details[fullname]?>" size="35">
                                        </td>
                                </tr>

                                <tr>
                                        <td width="25%">
                                                <b>Admin Email :</b>
                                        </td>
                                        <td>
                                                <input type="text" name="admin_email" value="<?=$emp_details[email]?>" size="35">
                                        </td>
                                </tr>
                                <tr>
                                        <td>
                                        </td>
                                        <td>
                                                <input type="submit" name="submit" value="Update">
                                        </td>
                                </tr>
                        </table>
                        </form>
                </td>
        </tr>
        <tr>
            <td height='30' class='err'><?=$pass_error?></td>
        </tr>

        <tr height = "170">
                <td>
                        <form action = "<?=site_url()?>setting/admin_setting" method = "POST">
                        <table cellpadding ="0" cellspacing="5" border="0" width="98%" style = "border:#efefef 1px solid">
                                <tr>
                                        <td colspan = "2">
                                                <b>Change Password </b>
                                        </td>
                                </tr>
                                <tr>
                                        <td colspan="2">
                                                &nbsp;
                                        </td>
                                </tr>
                                <tr>
                                        <td width="25%">
                                                <b>Old Password :</b>
                                        </td>
                                        <td>
                                                <input type="password" name="old_password" value="<?=$_REQUEST[old_password]?>" size="35">
                                        </td>
                                </tr>

                                <tr>
                                        <td width="25%">
                                                <b>New Password :</b>
                                        </td>
                                        <td>
                                                <input type="password" name="new_password" value="<?=$_REQUEST[new_password]?>" size="35">
                                        </td>
                                </tr>
                                 <tr>
                                        <td width="25%">
                                                <b>Confirm Password :</b>
                                        </td>
                                        <td>
                                                <input type="password" name="confirm_password" value="<?=$_REQUEST[confirm_password]?>" size="35">
                                        </td>
                                </tr>
                                <tr>
                                        <td>
                                        </td>
                                        <td>
                                                <input type = "submit" name = "submit" value = "Change">
                                        </td>
                                </tr>
                        </table>
                        </form>
                </td>
        </tr>

</table>
<?php $this->load->view('footer'); ?>

