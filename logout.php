<?php
setcookie("hash", "null");
setcookie("id", "null");
require_once 'back/setting.php';
require 'back/db.php';
$isSign = false;
try {
	$dbh = new PDO('mysql:host=localhost;dbname=gview;charset=utf8', $db_user, $db_pass);
	$updateHash = $dbh->query('UPDATE users SET hash=null WHERE id="'.$uId.'"');
	$dbh = null;
} catch (PDOException $e) {
	die();
};
header("Location: ".$_SERVER['HTTP_REFERER']);
?>