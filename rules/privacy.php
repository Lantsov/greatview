<?php
if (!empty($_COOKIE['sid'])) {
    session_id($_COOKIE['sid']);
}
session_start();
require_once '../back/setting.php';
require_once '../back/auth.php';
$page_id = 'rules';
require '../back/db.php';
require '../front/base_top.php';
require '../front/header.php';
require '../front/page_start.php';
echo <<<END

<h1>Представляем политику конфиденциальности GreatView.ru</h1>

<p>Пользуясь сервисом GreatView.ru, вы доверяете нам свои личные данные. Чтобы узнать, какие сведения мы собираем и как их используем, внимательно изучите нашу политику конфиденциальности. А на странице Мой аккаунт вы найдете все необходимые настройки и инструменты для защиты данных и конфиденциальности.</p>

<p></p>


END;
require '../front/page_end.php';
require '../front/base_bottom.php';
?>