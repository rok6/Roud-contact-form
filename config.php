<?php
//error
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

define('ROOT_DIR', __DIR__ . DIRECTORY_SEPARATOR);


/**
 * 初期設定
 *===============================================*/

//パスの設定
define('BASE_URL', $site_url . '/contact/');

//ページタイトル
define('PAGE_TITLE', 'コンタクトフォーム');

//送信先メールアドレス
define('ADMIN_MAIL', 'yourmail@example.com');

//自動返信用メールアドレス
define('REPLY_MAIL', 'yourmail@example.com');


/**
 * フォーム設定
 *===============================================*/

$CF = new_form(array(
  'mail_on'  => false,  //メール送信の有効化
  'reply_on' => false,  //自動返信機能の有効化
  'prefix'   => 'cf_',  //id および name のプレフィクス
));

$CF->add_field('name', array(
  'type'        => 'text',
  'label'       => 'お名前',
  'placeholder' => 'お名前を入力してください',
  'default'     => '',
  'rules'       => array( 'required', ),
));

$CF->add_field('email', array(
  'type'        => 'email',
  'label'       => 'メールアドレス',
  'placeholder' => 'メールアドレスを入力してください',
  'default'     => '',
  'rules'        => array(),
));
