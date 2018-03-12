<?php
require_once 'setting.php';
require_once 'db.php';
try {
    $dbh = new PDO('mysql:host=localhost;dbname=$db_name;charset=utf8', $db_user, $db_pass);
    $pMail = safeMe($_POST['email']);//'admin@greatview.ru';//
    $pPass = /*password_hash(*/safeMe($_POST['pass'])/*, PASSWORD_DEFAULT)*/;
    $pPass = md5(md5($solt).md5(md5($pPass).md5($solt)));
    foreach($dbh->query('SELECT id,password,name,sex,avatar from users WHERE mail="'.$pMail.'"') as $row) {
        if ($row['password'] === $pPass) {
            $isSign = true;
            $hash = md5(hashGen(10));
            $uId = $row['id'];
            $updateHash = $dbh->query('UPDATE users SET hash="'.$hash.'" WHERE id="'.$uId.'"');
            setcookie("hash", $hash, time()+604800, "/");
            setcookie("id", $uId, time()+604800, "/");
            setcookie("sex", $row['sex'], time()+604800, "/");
            if (!$row['avatar']) {
                setcookie("avatar", $defaultAvatar, time()+604800, "/");
            } else {
                setcookie("avatar", $row['avatar'], time()+604800, "/");
            };
            echo "&nbsp;<script> loginOk(); </script> ";
        } else {
            $isSign = false;
            setcookie("hash", null, time()-604800);
            echo "<span class='login-error'><i class='fa fa-exclamation-triangle '></i> Логин и/или пароль указаны неверно</span>";
        }
    }
    $dbh = null;
} catch (PDOException $e) {
    die();
}


?>

