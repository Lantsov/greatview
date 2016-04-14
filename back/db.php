<?php
$db_user = 'get';
$db_pass = '9293';


try {
    $dbh = new PDO('mysql:host=localhost;dbname=gview;charset=utf8', $db_user, $db_pass);
    foreach($dbh->query('SELECT id from users') as $row) {
        print_r($row);
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
























?>