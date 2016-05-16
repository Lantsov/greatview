<?php
if (!empty($_COOKIE['sid'])) {
    session_id($_COOKIE['sid']);
}
session_start();
require_once 'back/setting.php';
require_once 'back/auth.php';
require 'back/place_type.php';
$page_id = 'index';
if ($_SESSION["role"]>'2') {
	require 'front/top_admin.php';
};
require 'front/base_top.php';
require 'front/header.php';
if ($site_on or $_SESSION["role"]>'3') {
	require 'front/index.php';
} else {
	require 'front/site_off.php';
};
require 'front/base_bottom.php';
?>