<?php $this->load->view('header') ?>
<table cellspacing="1" cellpadding="2" border="0" width="100%">
	<tr>
		<td colspan="4">
				<img src="images/users.png" width="30" align="absmiddle"> <b>All Page Content</b>
		</td>
		
	</tr>
	<tr>
		<td colspan="5">
				<b>Total Found : <?=count($m_collection)?></b><br><b></b>
		</td>
	</tr>
    <tr bgcolor="bbbbbb" align="center">
        <td width="6%">
            <b>Member ID</b>
        </td>
		<td width="12%">
            <b>Monthly Collection</b> 
		</td>
        <td width="12%">
            <b>Monthly Rate</b> 
		</td>
		<td width="10%">
            <b>Total Due</b> 
		</td>
		<td width="10%">
            <b>Fine</b>
        </td>
        <td width="6%">
            <b>Book</b>
        </td>
        <td width="12%">
            <b>Total Deposite</b>
        </td>	
        <td width="10%">
            <b>Total Pay</b>
        </td>
        <td width="12%">
           <b>Register Date</b>
			
        </td>			
		<td width="10%">
            <b>Action</b> 
        </td>
    </tr>
        <?php foreach($m_collection as $item){?>
	<tr bgcolor="efefef" align="center" id="rows<?=$item['id'];?>" >
		<td >
			<?=$item['id']?>   	   	   	   	 
		</td>
		<td >
		   <?=$item['name']?>
		</td>
		<td align='left'>
		   <?=$item['m_collection'];?>
		</td>
		<td align='left'> 	 	 	
		   <?=$item['m_rate'];?><br />
		</td>
		<td align='left'> 	 	 	
		   <?=$item['due'];?><br />
		</td>
		<td align='left'> 	 	 	
		   <?=$item['fine'];?><br />
		</td>
		<td align='left'> 	 	 	
		   <?=$item['book'];?><br />
		</td>
		
		<td>
		   <?=$item['t_deposite'];?>
		</td>
		<td>
		   <?=$item['t_pay'];?>
		</td>
		<td>
		   <?=show_date($item['date']);?>
		</td>
		<td align='left'>
		   <?=date("m/d/Y",$item['update_time']);?>
		</td>
		
	</tr>
    <?php }?>
</table>
<?php $this->load->view('footer') ?>

