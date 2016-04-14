<?php
require_once 'back/setting.php';
$page_id = 'index';
require_once 'back/front.php';
require 'front/base_top.php';
require 'front/header.php';
if ($site_on) {
	require 'front/index.php';
} else {
	require 'front/site_off.php';
};
require 'front/base_bottom.php';
?>