<div id="sidebar"> 
    <div class="sidebox"> 
      <h1>Main menu</h1>
      <ul>
       <li><a href="<?=site_url();?>">Home</a></li>
        <li><a href="http://www.sec.ac.bd">About Us</a></li>
        <li><a href="http://www.kiva.org">Links</a></li>
		<li><? if($this->common->is_login()) { ?><a href="<?=site_url();?>logout" class="menu">Logout</a><? } 
					else { ?>
					<a href="<?=site_url();?>login" class="menu">Login</a><? } ?></li>
      </ul>
      <p>&nbsp;</p>
    </div>
    
  </div>
  <p id="footer"> </p>
</div>
</body>
</html>