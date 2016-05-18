<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>

<title>Microcredit</title>

<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />

<link href="<?=base_url();?>css/style1.css" rel="stylesheet" type="text/css" />

</head>

<body>

<div id="container"> 
  <div id="header"> 
    <h1>Online Microcredit Management</h1>

    <img class="header" src="<?=base_url();?>images/header.jpg" alt="header" /> </div>
  <div id="leftcolumn"> 
    <h1>Introduction</h1>

    <p>Microcredit is the extension of very small loans (microloans) to those in poverty designed to spur entrepreneurship. These individuals lack collateral, steady employment and a verifiable credit history and therefore cannot meet even the most minimal qualifications to gain access to traditional credit. Microcredit is a part of microfinance, which is the provision of a wider range of financial services to the very poor.
Microcredit is a financial innovation that is generally considered to have originated with the Grameen Bank in Bangladesh.</p>
  <h1>Microcredit and the Web</h1>

    <p>The principles of microcredit have also been applied in attempting to address several non-poverty-related issues. Among these, multiple Internet-based organizations have developed platforms that facilitate a modified form of peer-to-peer lending where a loan is not made in the form of a single, direct loan, but as the aggregation of a number of smaller loans—often at a negligible interest rate. There are several ways by which the general public can participate in alleviating poverty using Web platforms.
New platforms that connect lenders to micro-entrepreneurs are emerging on the Web, for example Kiva, Zidisha, Lend for Peace,the Microloan Foundation, and iMicroInvest. Another WWW-based microlender United Prosperity uses a variation on the usual microlending model; with United Prosperity the micro-lender provides a guarantee to a local bank which then lends back double that amount to the micro-entrpreneur. United Prosperity claims this provides both greater leverage and allows the micro-entrepreneur to develop a credit history with their local bank for future loans. In 2009, the US-based nonprofit Zidisha became the first peer-to-peer microlending platform to link lenders and borrowers directly across international borders without local intermediaries.
  </p></div>
  <div id="sidebar"> 
    <div class="sidebox"> 
      <h1>Main menu</h1>
      <ul>
        <li><a href="<?=site_url();?>">Home</a></li>
        <li><a href="http://www.sec.ac.bd">About Us</a></li>
        <li><a href="http://www.kiva.org">Links</a></li>
		<li><? if($this->common->is_login()) { ?><a href="<?=site_url();?>/logout" class="menu">Logout</a><? } 
					else { ?>
					<a href="<?=site_url();?>login" class="menu">Login</a><? } ?></li>
      </ul>
      <p>&nbsp;</p>
    </div>
    
  </div>
  <p id="footer">Copyright © 2005 | All Rights Reserved  </p>
</div>
</body>
</html>