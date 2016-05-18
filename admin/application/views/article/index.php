<?php $this->load->view('header') ?>
<script>
	function highlight(id,color)
	{
		$("#"+id).css("backgroundColor",color);
	}
</script>
<table cellspacing="1" cellpadding="2" border="0" width="100%">
	<tr>
		<td colspan="3">
				<img src="images/users.png" width="30" align="absmiddle"> <b>All Article</b>
		</td>
		<td colspan="5" align="right">
			 <img src="images/add_user.png" width="30" align="absmiddle">
			 <a href="<?=site_url();?>article/add_article">Add Article</a>
		</td>
	</tr>
	<tr>
		<td colspan="8">
				<b>Total Found : <?=count($article)?></b><br><b></b>
		</td>
	</tr>
    <tr bgcolor="#bbbbbb" align="center">
        <td width="6%">
            <b>Article ID</b>
			&nbsp;
			<a href='<?=site_url();?>article?type=id&sort=asc'><img src='<?=site_url();?>images/asc.png' width='15' align='absmiddle'></a>
			<a href='<?=site_url();?>article?type=id&sort=desc'><img src='<?=site_url();?>images/desc.png' width='15' align='absmiddle'></a>
        </td>
        <td width="12%">
            <b>Member Email</b> 
			&nbsp;
			<a href='<?=site_url();?>article?type=email&sort=asc'><img src='<?=site_url();?>images/asc.png' width='15' align='absmiddle'></a>
			<a href='<?=site_url();?>article?type=email&sort=desc'><img src='<?=site_url();?>images/desc.png' width='15' align='absmiddle'></a>
        </td>
		<td width="20%">
            <b>Article Topic</b>
			&nbsp;
			<a href='<?=site_url();?>article?type=topic&sort=asc'><img src='<?=site_url();?>images/asc.png' width='15' align='absmiddle'></a>
			<a href='<?=site_url();?>article?type=topic&sort=desc'><img src='<?=site_url();?>images/desc.png' width='15' align='absmiddle'></a>
        </td>
		<td width="34%">
           <b>Article</b>
		   &nbsp;
			<a href='<?=site_url();?>article?type=article_body&sort=asc'><img src='<?=site_url();?>images/asc.png' width='15' align='absmiddle'></a>
			<a href='<?=site_url();?>article?type=article_body&sort=desc'><img src='<?=site_url();?>images/desc.png' width='15' align='absmiddle'></a>
        </td>
		<td width="3%">
           <b>Document</b>
        </td>
		<td width="3%">
           <b>Status</b>
			<a href='<?=site_url();?>article?type=status&sort=asc'><img src='<?=site_url();?>images/asc.png' width='15' align='absmiddle'></a>
			<a href='<?=site_url();?>article?type=status&sort=desc'><img src='<?=site_url();?>images/desc.png' width='15' align='absmiddle'></a>
        </td>
		<td width="09%">
           <b>Submission Date</b>
			<a href='<?=site_url();?>article?type=post_time&sort=asc'><img src='<?=site_url();?>images/asc.png' width='15' align='absmiddle'></a>
			<a href='<?=site_url();?>article?type=post_time&sort=desc'><img src='<?=site_url();?>images/desc.png' width='15' align='absmiddle'></a>
        </td>	
		<td width="5%">
            <b>Action</b> 
        </td>
    </tr>
    <?php foreach($article as $item){?>
	<tr bgcolor="efefef" align="center" id="rows<?=$item['id'];?>" >
		<td >
			<a href="<?=site_url();?>article/details/<?=$item['id'];?>"><?=$item['id']?></a>   	   	   	   	 
		</td>
		<td >
		   <?=$item['email']?>
		</td>
		<td align='left'>
		   <?=$item['topic'];?>
		</td>
		<td align='left'>
		   <?=word_limiter($item['article_body'],50);?>
		</td>
		<td width="3%">
			<?if($item['document']!=""):?>
				<a href="<?=site_url();?>article/download/<?=$item['id'];?>"> Download </a>
			<?endif;?>
        </td>
		<td>
		   <?=$item['status'];?>
		</td>
		<td>
		   <?=date('m / d / Y',$item['post_time']);?>
		</td>
		<td width="2%">
			<a href='<?=site_url();?>article/delete/<?=$item['id']?>' onclick="return confirm('Are you sure you want to delete the \'<?=$item['topic']?>\' Article')" onmouseover="highlight('rows<?=$item['id'];?>','#bbbbbb')" onmouseout="highlight('rows<?=$item['id'];?>','#efefef')" >Delete</a> 
		</td>
	</tr>
    <?php }?>
</table>
<?php $this->load->view('footer') ?>

