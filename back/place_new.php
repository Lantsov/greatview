<?php
$db_user = "gview";
$db_pass = "vj32-x035";
try {
    $dbh = new PDO('mysql:host=localhost;dbname=gview;charset=utf8', $db_user, $db_pass);
    foreach($dbh->query("select id, location, user_id, short_text, preview, style, type, poll, visits, comments from place where active='1' ORDER BY id DESC limit 0,20") as $row) {
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