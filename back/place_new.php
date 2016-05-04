<?php
$db_user = "u0063822_gv";
$db_pass = "vJ32-x035!9293";
try {
    $dbh = new PDO('mysql:host=localhost;dbname=u0063822_gview;charset=utf8', $db_user, $db_pass);
    foreach($dbh->query("select id, location, user_id, short_text, preview, style, type, poll, visits, comments from place where active='1' limit 0,20") as $row) {
       	if ($row['style'] = '1') {
       		require 'front/item_index_type1.php';
       	}
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>