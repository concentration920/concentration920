<?php
/** 
 * WordPress 基本設定
 *
 * このファイルは、MySQL、テーブル接頭辞、秘密鍵、言語、ABSPATH の設定を含みます。
 * より詳しい情報は {@link http://wpdocs.sourceforge.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86 
 * wp-config.php の編集} を参照してください。MySQL の設定情報はホスティング先より入手できます。
 *
 * このファイルはインストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さず、このファイルを "wp-config.php" という名前でコピーして直接編集し値を
 * 入力しても構いません。
 *
 * @package WordPress
 */

// 注意:
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.sourceforge.jp/Codex:%E8%AB%87%E8%A9%B1%E5%AE%A4 参照)
// を使用し必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - こちらの情報はホスティング先から入手してください。 ** //
/** WordPress のデータベース名 */
define('DB_NAME', 'LAA0157204-s2utj2');

/** MySQL のユーザー名 */
define('DB_USER', 'LAA0157204');

/** MySQL のパスワード */
define('DB_PASSWORD', 'w7wX59u7');

/** MySQL のホスト名 (ほとんどの場合変更する必要はありません。) */
define('DB_HOST', 'mysql559.phy.lolipop.jp');

/** データベーステーブルのキャラクターセット (ほとんどの場合変更する必要はありません。) */
define('DB_CHARSET', 'utf8');

/** データベースの照合順序 (ほとんどの場合変更する必要はありません。) */
define('DB_COLLATE', '');

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/ WordPress.org の秘密鍵サービス}
 * で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、
 * すべてのユーザーを強制的に再ログインさせることができます。
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '8v0wzSy)#}ylqXhI8=HYcT$tnKfMBPXDEGs:r$(z2Hs)8H=.$LlkX9c|XcF1>*r;');
define('SECURE_AUTH_KEY', '<@a>_Dv#NMc_W<y"<b>;"^.?(?zq=vk{8";lkwPKT604#40TTtLkID4t2>cJMil|');
define('LOGGED_IN_KEY', '}(HP./Pg@-}et(,_VtDgQ//!AEqDL!0*z6#YRgzosNN/E:+Jbl/sFTa*"G;/1Ur+');
define('NONCE_KEY', '4q(?6RtvcKPJxc0YOCP?R77Uwv2n}nX9U)c2.M|CmES1ot=.sKGA:a*0^$u#W0{_');
/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix  = 'wp3_';

/**
 * ローカル言語 - このパッケージでは初期値として 'ja' (日本語 UTF-8) が設定されています。
 *
 * WordPress のローカル言語を設定します。設定した言語に対応する MO ファイルが 
 * wp-content/languages にインストールされている必要があります。例えば de.mo を 
 * wp-content/languages にインストールし WPLANG を 'de' に設定することでドイツ語がサポートされます。
 */
define ('WPLANG', 'ja');

// 編集が必要なのはここまでです ! WordPress でブログをお楽しみください。

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
