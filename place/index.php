<?php
if (!empty($_COOKIE['sid'])) {
    session_id($_COOKIE['sid']);
}
session_start();
require_once '../back/setting.php';
require_once '../back/auth.php';
require '../back/place_type.php';
$page_id = 'place';
$db_user = "u0063822_gv";
$db_pass = "vJ32-x035!9293";
if (Auth\User::isAuthorized()) {
	if (isset($_POST['do']) and $_POST['do']='addvisit') {
		$pl_id = safeMe($_POST['visit-place']);
		$us_id = safeMe($_POST['visit-user']);
		$number = safeMe($_POST['visit-num']) + 1;
		$dbh = new PDO('mysql:host=localhost;dbname=u0063822_gview;charset=utf8', $db_user, $db_pass);
		try {
			$dbh->beginTransaction();
			$dbh->exec("insert into place_visit (place_id, user_id) values ($pl_id, $us_id)");
			$dbh->commit();
		} catch (Exception $e) {
			$dbh->rollBack();
			echo "Ошибка: " . $e->getMessage();
		};
		try {
			$dbh->beginTransaction();
			$dbh->exec("update place set visits=$number where id=$pl_id");
			$dbh->commit();
		} catch (Exception $e) {
			$dbh->rollBack();
			echo "Ошибка: " . $e->getMessage();
		};
	};
};
/*if ($_SESSION["role"]>'2') {
	require '../front/top_admin.php';
};*/
//require '../front/base_top.php';
//require '../front/header.php';
if ($site_on or $_SESSION["role"]>'3') {
	if (isset($_GET['place'])) {
		$place_id = safeMe($_GET['place']);
		if(!ctype_digit($place_id)){
header('HTTP/1.1 404 Not Found');
$page_id = '404';
			require '../front/base_top.php';
			require '../front/header.php';
			require '../front/404.php';
		}else{
			try {
			    $dbh = new PDO('mysql:host=localhost;dbname=u0063822_gview;charset=utf8', $db_user, $db_pass);
			    foreach($dbh->query("select location, about, howtogo, takewith, photo, user_id, short_text, type, poll, visits, comments from place where id=$place_id") as $row) {
			       	$place->location = $row['location'];
			       	$place->about = $row['about'];
			       	$place->howtogo = $row['howtogo'];
			       	if ($row['takewith']) {
			       		$place->take = explode("|", $row['takewith']);
			       	} else {
			       		$place->take = false;
			       	};
			       	if ($row['photo']) {
			       		$place->photo = explode("|", $row['photo']);
			       	} else {
			       		$place->photo = false;
			       	};
			       	$place->autor = $row['user_id'];
			       	$place->short = $row['short_text'];
			       	$place->type = explode("|", $row['type']);
			       	$place->poll = $row['poll'];
			       	$place->visits = $row['visits'];
			       	$place->comments = $row['visits'];
			    };
			    $dbh = null;
			} catch (PDOException $e) {
			    print "Error!: " . $e->getMessage() . "<br/>";
			    die();
			};
			if ($place->visits > '0') {
				try {
				    $dbh = new PDO('mysql:host=localhost;dbname=u0063822_gview;charset=utf8', $db_user, $db_pass);
				    foreach($dbh->query("select users.id, users.avatar, users.name from users inner join place_visit on place_visit.user_id=users.id where place_visit.place_id = $place_id") as $rows) {
				       	$visit->user->id[] = $rows['id'];
				       	if ($_SESSION["user_id"]=$rows['id']) {
				       		$iwashere['place_id'] = true;
				       	};
				       	if ($rows['avatar']) {
				       		$visit->user->avatar[] = $rows['avatar'];
				       	} else {
				       		$visit->user->avatar[] = $defaultAvatar;
				       	};
				       	$visit->user->name[] = $rows['name'];
				    };
				    $dbh = null;
				} catch (PDOException $e) {
				    print "Error!: " . $e->getMessage() . "<br/>";
				    die();
				};
			};
			if ($place->about) {
				require '../front/base_top.php';
				require '../front/header.php';
				require '../front/place_page.php';
			} else {
header('HTTP/1.1 404 Not Found');
unset($page_id);
$page_id = '404';
				require '../front/base_top.php';
				require '../front/header.php';
				require '../front/404.php';
			};
		};
	} else {
		echo "error";
	};
} else {
	require '../front/base_top.php';
	require '../front/header.php';
	require '../front/site_off.php';
};
require '../front/base_bottom.php';

function safeMe($var){
    $var = strip_tags($var);
    $var = htmlentities($var);
    return stripslashes($var);
}
?>


