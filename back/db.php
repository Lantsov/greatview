<?php
$db_user = 'get';
$db_pass = '9293';
/*
public function dbConnect()
{
	$dbh = new PDO('mysql:host=localhost;dbname=gview;charset=utf8', $db_user, $db_pass);
	return true;
};

public function signIn()
{
	# code...
};

*/
try {
    $dbh = new PDO('mysql:host=localhost;dbname=gview;charset=utf8', $db_user, $db_pass);
    $pMail = 'admin@gmail.com';//$_POST['email'];
    $pPass = password_hash(/*$_POST['pass']*/'vj32-x035', PASSWORD_DEFAULT);
    foreach($dbh->query('SELECT mail,password from users') as $row) {
        if ($row['mail'] = $pMail and $row['password'] = $pPass) {
        	$isSign = true;
        	$_COOKIE['auth'] = $pPass;
        	setcookie("auth", $pPass, time()+604800);
        	echo $_COOKIE['auth'];
        } else {
        	$isSign = false;
        	setcookie("auth", $pPass, time()+604800);
        }
        
        
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
























?>