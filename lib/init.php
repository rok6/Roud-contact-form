<?php
mb_language('ja');
date_default_timezone_set('Asia/Tokyo');

session_start();

//$site_url を基に config.php にて BASE_URL を設定
$site_url = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://' ) . $_SERVER['HTTP_HOST'];

//共通関数
require_once(__DIR__ . '/functions.php');
//コンタクトフォームクラス
require_once(__DIR__ . '/CF.php');
//設定
require_once(__DIR__ . '/../config.php');
