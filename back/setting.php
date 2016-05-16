<?php
$base_url = 'http://'.$_SERVER['HTTP_HOST'];
unset($page_id);
$db_user = "u0063822_gv";
$db_pass = "vJ32-x035!9293";
// touch DB #################################################
try {
	$dbh = new PDO('mysql:host=localhost;dbname=u0063822_gview;charset=utf8', $db_user, $db_pass);
	foreach($dbh->query("select online from system") as $sys) {
		$system->online = $sys['online'];
	};
	$dbh = null;
} catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
	die();
};
//###########################################################
if ($system->online) {
	$site_on = true;
} else {
	$site_on = false;
};





$defaultAvatar = $base_url."/content/avatars/default.png";
?>