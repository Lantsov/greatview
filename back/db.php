<?php
$db_user = 'get';
$db_pass = '9293';

if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])) {
$uHash = $_COOKIE["hash"]; //обезопасить!!!
$uId = $_COOKIE["id"];
try {
    $dbh = new PDO('mysql:host=localhost;dbname=gview;charset=utf8', $db_user, $db_pass);
    foreach($dbh->query('SELECT hash,name from users WHERE id="'.$uId.'"') as $row) {
        if ($row['hash'] === $uHash) {
            $isSign = true;
            $userName = $row['name'];
        } else {
            $isSign = false;
            setcookie("auth", null, time()-604800);
            echo "error";
        }
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    
    die();
}
}



?>