<div id="sidebar"> 
    <div class="sidebox"> 
      <h1>Main menu</h1>
      <ul>
        <li><a href="<?=site_url();?>">Home</a></li>
        <li><a href="http://www.sec.ac.bd">About Us</a></li>
        <li><a href="http://www.kiva.org">Links</a></li>
		<li><? if($this->common->is_elogin()) { ?><a href="<?=site_url();?>logout" class="menu">Logout</a>
		<br><a href="<?=site_url();?>user" class="menu">User Register</a>
		<br><a href="<?=site_url();?>m_collection" class="menu">Collection</a>
		
		
		<? } 
		
				else { ?>
					<a href="<?=site_url();?>emplog" class="menu">Login</a>
									
					<? 
					
					} ?></li>
					
					
		
      </ul>
      <p>&nbsp;</p>
    </div>
    
  </div>
  <p id="footer"> </p>
</div>
</body>
</html>