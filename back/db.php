<?php
$db_user = 'get';
$db_pass = '9293';

if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])) {
$uHash = $_COOKIE["hash"]; //обезопасить!!!
$uId = $_COOKIE["id"];
if ($uHash!='null' or $uId!='null') {
	try {
		$dbh = new PDO('mysql:host=localhost;dbname=gview;charset=utf8', $db_user, $db_pass);
		foreach($dbh->query('SELECT hash,name from users WHERE id="'.$uId.'"') as $row) {
			if ($row['hash'] === $uHash) {
				$isSign = true;
				$userName = $row['name'];
			} else {
				$isSign = false;
				setcookie("hash", "null");
				setcookie("id", "null");
			};
		};
		$dbh = null;
	} catch (PDOException $e) {
		die();
	};
};
};

function hashGen($length=6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;  
    while (strlen($code) < $length) {
        $code .= $chars[mt_rand(0,$clen)];  
    }
    return $code;
};
?>