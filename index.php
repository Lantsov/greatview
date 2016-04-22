<?php

if (!empty($_COOKIE['sid'])) {
    session_id($_COOKIE['sid']);
}
session_start();
require_once 'back/setting.php';
require_once 'back/auth.php';
$page_id = 'index';
require 'front/base_top.php';
require 'front/header.php';
if ($site_on) {
	require 'front/index.php';
} else {
	require 'front/site_off.php';
};
require 'front/base_bottom.php';
?>