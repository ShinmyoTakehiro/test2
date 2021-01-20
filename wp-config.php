<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、インストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さずにこのファイルを "wp-config.php" という名前でコピーして
 * 直接編集して値を入力してもかまいません。
 *
 * このファイルは、以下の設定を含みます。
 *
 * * MySQL 設定
 * * 秘密鍵
 * * データベーステーブル接頭辞
 * * ABSPATH
 *
 * @link http://wpdocs.osdn.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86
 *
 * @package WordPress
 */

// 注意:
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.osdn.jp/%E7%94%A8%E8%AA%9E%E9%9B%86#.E3.83.86.E3.82.AD.E3.82.B9.E3.83.88.E3.82.A8.E3.83.87.E3.82.A3.E3.82.BF 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define('DB_NAME', 'LAA1136172-i0neit');

/** MySQL データベースのユーザー名 */
define('DB_USER', 'LAA1136172');

/** MySQL データベースのパスワード */
define('DB_PASSWORD', 'U0tcn1am');

/** MySQL のホスト名 */
define('DB_HOST', 'mysql141.phy.lolipop.lan');

/** データベースのテーブルを作成する際のデータベースの文字セット */
define('DB_CHARSET', 'utf8');

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define('DB_COLLATE', '');

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '#c:0am.&ZRP5:uyaq=b,>3%7KZf/,O0T$5vDSfRm,Oz}OeWVp356:!K=,6Y"ju)"');
define('SECURE_AUTH_KEY', 'AG|]Jn%^QT_?Iu;4)IRbrxR)Nb0(!9g3;"/2.=<BFthtkf.b0.Mj-H|3lK)+cSPF');
define('LOGGED_IN_KEY', '7%djsip29kfr3Xb7LZi*0>DU+f/m>N-p,mlm@n,W$MYzA,1]M%>:E+wayke+&BWS');
define('NONCE_KEY', '<0-I%yL|]YFGrh+*Z;d?9ot_oMZ"Nib8(0<uqg2;#}eGYC4aPF{7_wV%TR"PP/i7');
define('AUTH_SALT', 'o:Na%D$s6v?^#Y}?LKwt>LSC0J`_>D%Gmg4-t(H7h[S"|0h[JEtA_amB{.Kf[/Ff');
define('SECURE_AUTH_SALT', 'hq<X$w0wC0,[%QEmp0}@b}?:He#wr6eqO=Hs>!5j0:vqZlp0sA{-.I/?g3.(%AVq');
define('LOGGED_IN_SALT', 'ea}mP@.~K{:Ve%%IM4,-xK@fWOiWO*&+hFeB*#wVX?eBe)C^;[W2!7_FX`iC3:q[');
define('NONCE_SALT', 'rG@qG<TB=2|X*J{_nqdO_swhu6NXC9fbpQ<H%NLKSH`c.gJ{e#Mq2ok@&z(x&l$o');

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix  = 'wp1_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 *
 * その他のデバッグに利用できる定数については Codex をご覧ください。
 *
 * @link http://wpdocs.osdn.jp/WordPress%E3%81%A7%E3%81%AE%E3%83%87%E3%83%90%E3%83%83%E3%82%B0
 */
define('WP_DEBUG', false);

/* 編集が必要なのはここまでです ! WordPress でブログをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
  define('ABSPATH', dirname(__FILE__) . '/');
}

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
