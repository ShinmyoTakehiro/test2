<?php
/**********************************************************************************************************/
/*
/* テックエイドの成長する自作ホームページWordPressテーマ『 TAテーマ001 (ta-theme001) 』
/*
/* ta-mainte.php: ( Latest Version 2.01 2016.12.24 )
/*
/* このプログラムの著作権、使用権、その他全ての権利はde集まれ株式会社に属します。
/* The copyright, royalty and all the other rights of this program belong to deatsumare Corporation.
/*
/* File Version 履歴
/* File Version 2.00 2016.02.23: first edition by Kotaro Kashiwamura.
/* File Version 2.01 2016.12.24: bloginfo修正 by Kotaro Kashiwamura.
/*
/**********************************************************************************************************/
if( 'valid' == ta_read_op( 'ta_common_mainte_mode_onoff' ) ) { ?>
<!DOCTYPE HTML>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="UTF-8" />
<?php
$ta_responsible_base_onoff = ta_read_op( 'ta_responsible_base_onoff' );
if ( "valid" == $ta_responsible_base_onoff ) { ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
} ?>
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <meta http-equiv="Content-Script-Type" content="text/javascript" />
    <title>メンテナンス中です | <?php bloginfo('name'); ?></title>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/css/ta-dynamic-mainte.css" />
    <meta name='robots' content='noindex,follow' />
  </head>
  <body>
    <div id="maintenance">
<?php
$ta_common_mainte_title = ta_read_op( 'ta_common_mainte_title' );
if ( "no_disp" != $ta_common_mainte_title ) { ?>
      <h1><?php ta_eschtml2html_wbr( $ta_common_mainte_title ); ?></h1>
<?php
} ?>
      <div id="content">
<?php
$ta_common_mainte_subtitle = ta_read_op( 'ta_common_mainte_subtitle' );
if ( "no_disp" != $ta_common_mainte_subtitle ) { ?>
        <h3><?php ta_eschtml2html_wbr( $ta_common_mainte_subtitle ); ?></h3>
<?php
} ?>
        <p><?php ta_eschtml2html_wbr( ta_read_op( 'ta_common_mainte_content' ) ); ?></p>
<?php
$ta_common_mainte_login_onoff = ta_read_op( 'ta_common_mainte_login_onoff' );
if ( 'valid' == $ta_common_mainte_login_onoff ) { ?>
        <p><a href="<?php echo get_bloginfo('url').'/wp-admin/' ?>">スタッフ</a></p>
<?php
}
$ta_common_mainte_copyright = ta_read_op( 'ta_common_mainte_copyright' );
if ( "no_disp" != $ta_common_mainte_copyright ) { ?>
        <div id="copyright"><small><?php ta_eschtml2html_wbr( $ta_common_mainte_copyright ); ?></small></div>
<?php
} ?>
      </div>
    </div>
  </body>
</html>
<?php
} else {
  echo 'このページは表示できません';
}
