<?php
require_once 'db.php';

function hashGen($length=6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;  
    while (strlen($code) < $length) {
        $code .= $chars[mt_rand(0,$clen)];  
    }
    return $code;
};
try {
    $dbh = new PDO('mysql:host=localhost;dbname=gview;charset=utf8', $db_user, $db_pass);
    $pMail = $_POST['email'];//'admin@greatview.ru';//
    $pPass = $_POST['pass'];//'$2y$10$.dQRIgbJ/kY8JZil4cz0/';//password_hash(/*$_POST['pass']*/'vj32-x0351', PASSWORD_DEFAULT);
    foreach($dbh->query('SELECT id,password,name from users WHERE mail="'.$pMail.'"') as $row) {
        if ($row['password'] === $pPass) {
            $isSign = true;
            $hash = md5(hashGen(10));
            $uId = $row['id'];
            $updateHash = $dbh->query('UPDATE users SET hash="'.$hash.'" WHERE id="'.$uId.'"');
            setcookie("hash", $hash, time()+604800, "/");
            setcookie("id", $uId, time()+604800, "/");
            $userName = $row['name'];
            header("Location: ".$_SERVER['HTTP_REFERER']);
        } else {
            $isSign = false;
            setcookie("hash", null, time()-604800);
            echo "error";
        }
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    
    die();
}

?>