<?php
if (!empty($_COOKIE['sid'])) {
	session_id($_COOKIE['sid']);
}
session_start();
require_once '../setting.php';
require_once '../auth.php';
$base_url = 'http://'.$_SERVER['HTTP_HOST'];
if ($_SESSION["role"]>'3') {
	$db_user = "u0063822_gv";
	$db_pass = "vJ32-x035!9293";
	if (isset($_POST['online'])) {
		$doOnline = safeMe($_POST['online']);
		$dbh = new PDO('mysql:host=localhost;dbname=u0063822_gview;charset=utf8', $db_user, $db_pass);
		try {
			$dbh->beginTransaction();
			$dbh->exec("update system set online=$doOnline where id=1");
			$dbh->commit();
			unset($_POST['online']);
		} catch (Exception $e) {
			$dbh->rollBack();
			echo "Ошибка: " . $e->getMessage();
		};
	};
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
	if ($system->online) {
		echo "Система включена";
	} else {
		echo "Система выключена";
	};
	echo '<form action="index.php" method="post"><button value="1" name="online"';
	if ($system->online) echo " disabled='disabled' ";
	echo '>Online</button><button value="0" name="online"';
	if (!$system->online) echo " disabled='disabled' ";
	echo '>Offline</button></form></div>';
	echo '<a href="'.$base_url.'/">Main page</a>';
} else {
header('HTTP/1.1 403 incorrect user');
echo 'Access denied / Доступ ограничен';
};
function safeMe($var){
	$var = strip_tags($var);
	$var = htmlentities($var);
	return stripslashes($var);
}
?>