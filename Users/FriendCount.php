<?php
	$UserId = $_GET["UserId"];
	if($UserId=="" or $UserId==nil){ die(); }
	$ProfileURL = "http://www.roblox.com/user.aspx?id=" . $UserId;
	$ProfileContent = file_get_contents($ProfileURL);
	$Start = strpos($ProfileContent,'<span id="ctl00_cphRoblox_rbxUserStatisticsPane_lFriendsStatistics">');
	$End = strpos(substr($ProfileContent,$Start),"</span>");
	$Amount = substr($ProfileContent,$Start,$End);
	$Amount = substr($Amount,strlen('<span id="ctl00_cphRoblox_rbxUserStatisticsPane_lFriendsStatistics">'));
	$Amount = str_replace(",","",$Amount);
  
	$JSON = array(
		UserId => $UserId,
		Friends => $Amount,
	);
	
	echo json_encode($JSON);
?>