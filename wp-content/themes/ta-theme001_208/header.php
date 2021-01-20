<?php
/******************************************************************************************************************/
/*
/* テックエイドの成長する自作ホームページWordPressテーマ『 TAテーマ001 (ta-theme001) 』
/*
/* header.php: ( Latest Version 2.05 2017.03.22 )
/*
/* このプログラムの著作権、使用権、その他全ての権利はde集まれ株式会社に属します。
/* The copyright, royalty and all the other rights of this program belong to deatsumare Corporation.
/*
/* File Version 履歴
/* File Version 2.00 2016.02.28: first edition by Kotaro Kashiwamura.
/* File Version 2.01 2016.03.28: ページ表示速度改善機能をプロへ変更
/*                               viewport系の修正 by Kotaro Kashiwamura.
/* File Version 2.02 2016.05.08: ta_common_favicon_img, ta_common_appletouch_imgを'built_in'付タイプに修正
/*                               「HTMLファイル読み込み完了後にスタイルシートを読み込む」削除 by Kotaro Kashiwamura.
/* File Version 2.03 2016.08.20: タイトルのオンオフ追加 by Kotaro Kashiwamura.
/* File Version 2.04 2017.02.26: 背景バー用のBOX追加、header-globalnavi-image-container位置修正、
/*                               テーマ有効時の初期値処理追加 by Kotaro Kashiwamura.
/* File Version 2.05 2017.03.22: 親テーマ用のget_template_directory_uriに変更 by Kotaro Kashiwamura.
/*
/******************************************************************************************************************/
$ta_switch_theme_process = get_option( '_ta_switch_theme_process' );
$ta_common_reset_dataname = get_option( '_ta_common_reset_dataname' );
if ( isset( $_POST['ta_init_dataname_submit'] ) && $_POST['ta_init_dataname_submit'] ) {
  if ( check_admin_referer( 'ta_init_dataname_nonce_key', 'ta_init_dataname_setting_menu' ) ) {
    $value = isset( $_POST['ta_init_dataname'] ) ? $_POST['ta_init_dataname'] : 0;
    if ( $value ) {
      update_option( '_ta_common_reset_dataname', $value );
    } else {
      update_option( '_ta_common_reset_dataname', 1 );
    }
    require_once( TEMPLATEPATH . '/ta-modules/ta-php2css-modules/ta-dynamic-php2css.php' );
    //CSSファイル生成
    ta_dynamic_css_create();
    ta_dynamic_dg_css_create();
    ta_dynamic_hl_css_create();
    ta_dynamic_st_css_create();
    ta_dynamic_reshl_css_create();
    ta_dynamic_maintecss_create();
    ta_dynamic_freecss_create();
  }
  delete_option( '_ta_switch_theme_process' );      //テーマ設定プロセス宣言解除
  header( "Location: {$_SERVER['SCRIPT_NAME']}" );  //$_POSTリセットのためのリダイレクト
} else if ( '' != $ta_common_reset_dataname && 'valid' == $ta_switch_theme_process ) {
  require_once( TEMPLATEPATH . '/ta-modules/ta-php2css-modules/ta-dynamic-php2css.php' );
  //CSSファイル生成
  ta_dynamic_css_create();
  ta_dynamic_dg_css_create();
  ta_dynamic_hl_css_create();
  ta_dynamic_st_css_create();
  ta_dynamic_reshl_css_create();
  ta_dynamic_maintecss_create();
  ta_dynamic_freecss_create();
  delete_option( '_ta_switch_theme_process' );      //テーマ設定プロセス宣言解除
}
if ( TA_HIEND_PI ) { require_once( TA_HIEND_PI_DIR . '/general-modules/ta-theme001-highend-template.php' ); } ?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="UTF-8" />
<?php
$ta_responsible_base_onoff = ta_read_op( 'ta_responsible_base_onoff' );
$ta_responsible_viewport_onoff = ta_read_op( 'ta_responsible_viewport_onoff' );
$ta_responsible_viewport_width = ( 0 == ta_read_op( 'ta_responsible_viewport_width' ) ) ? 'device-width': ta_read_op( 'ta_responsible_viewport_width' );
$ta_responsible_viewport_init_scale = ta_read_op( 'ta_responsible_viewport_init_scale' );
$ta_responsible_viewport_min_scale = ta_read_op( 'ta_responsible_viewport_min_scale' );
$ta_responsible_viewport_max_scale = ta_read_op( 'ta_responsible_viewport_max_scale' );
$ta_responsible_viewport_scalable = ta_read_op( 'ta_responsible_viewport_scalable' );
if ( "valid" == $ta_responsible_base_onoff && "valid" == $ta_responsible_viewport_onoff ) { ?>
    <meta name="viewport" content="<?php if ( -1 != $ta_responsible_viewport_width ) { echo 'width=' . $ta_responsible_viewport_width; } if ( -1 != $ta_responsible_viewport_init_scale ) { echo ', initial-scale=' . $ta_responsible_viewport_init_scale; } if ( -1 != $ta_responsible_viewport_min_scale ) { echo ', minimum-scale=' . $ta_responsible_viewport_min_scale; } if ( -1 != $ta_responsible_viewport_max_scale ) { echo ', maximum-scale=' . $ta_responsible_viewport_max_scale; } if ( 'no' == $ta_responsible_viewport_scalable ) { echo ', user-scalable=no'; } ?>">
<?php
} ?>
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <meta http-equiv="Content-Script-Type" content="text/javascript" />
<?php
if ( 'valid' == ta_read_op( 'ta_common_seo_title_onoff' ) ) { ?>
    <title><?php ta_display_title(); ?></title>
<?php
}
$create_ta_reset = filemtime( TEMPLATEPATH . '/css/ta-reset.min.css' );
$create_ta_common = filemtime( TEMPLATEPATH . '/css/ta-common.min.css' );
$create_ta_dynamic = filemtime( TEMPLATEPATH . '/css/ta-dynamic.css' );
$create_ta_dynamic_dg = filemtime( TEMPLATEPATH . '/css/ta-dynamic-dg.css' );
$create_ta_dynamic_hl = filemtime( TEMPLATEPATH . '/css/ta-dynamic-hl.css' );
$create_ta_dynamic_st = filemtime( TEMPLATEPATH . '/css/ta-dynamic-st.css' );
$create_ta_dynamic_reshl = filemtime( TEMPLATEPATH . '/css/ta-dynamic-reshl.css' );
$create_ta_dynamic_freecss = filemtime( TEMPLATEPATH . '/css/ta-dynamic-freecss.css' ); ?>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri() . '/css/ta-reset.min.css?ver=' . $create_ta_reset; ?>" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri() . '/css/ta-common.min.css?ver=' . $create_ta_common; ?>" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri() . '/css/ta-dynamic.css?ver=' . $create_ta_dynamic; ?>" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri() . '/css/ta-dynamic-dg.css?ver=' . $create_ta_dynamic_dg; ?>" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri() . '/css/ta-dynamic-hl.css?ver=' . $create_ta_dynamic_hl; ?>" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri() . '/css/ta-dynamic-st.css?ver=' . $create_ta_dynamic_st; ?>" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri() . '/css/ta-dynamic-reshl.css?ver=' . $create_ta_dynamic_reshl; ?>" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri() . '/css/ta-dynamic-freecss.css?ver=' . $create_ta_dynamic_freecss; ?>" />
<?php
$ta_common_favicon_disponoff = ta_read_op( 'ta_common_favicon_disponoff' );
$ta_common_favicon_img = ta_read_op_builtin_img( 'ta_common_favicon_img' );
if ( 'valid' == $ta_common_favicon_disponoff ) { ?>
    <link rel="shortcut icon" href="<?php echo $ta_common_favicon_img; ?>" />
<?php
}
$ta_common_appletouch_disponoff = ta_read_op( 'ta_common_appletouch_disponoff' );
$ta_common_appletouch_img = ta_read_op_builtin_img( 'ta_common_appletouch_img' );
if ( 'valid' == $ta_common_appletouch_disponoff ) { ?>
    <link rel="apple-touch-icon-precomposed" href="<?php echo $ta_common_appletouch_img; ?>" />
<?php
}
if ( TA_HIEND_PI ) {
  if ( 'valid' == ta_read_op( 'ta_common_insert_dscrptn_head_onoff' ) ) {
    echo ta_eschtml2html( ta_read_op( 'ta_common_insert_dscrptn_head_code' ) );
  }
}
include( TEMPLATEPATH . '/ta-modules/ta-php2js-value.php' );
ta_meta_keywords_display();
ta_meta_description_display();
ta_meta_robots_display();
ta_link_canonical_display();
ta_meta_ogp_display();
ta_meta_twittercards_display();
ta_frame_dynamic_css();
if ( TA_HIEND_PI ) { ta_thm001highend_slowshow_ope(); }
ta_bg_img_disp_css();
wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
<?php
ta_reset_dataname_disp();
if ( TA_HIEND_PI ) {
  if ( 'valid' == ta_read_op( 'ta_common_insert_dscrptn_body_onoff' ) ) {
    echo ta_eschtml2html( ta_read_op( 'ta_common_insert_dscrptn_body_code' ) );
  }
} ?>

    <div id="slow-show">
      <div id="body-wrap">
        <div id="back-top-bar"></div>
        <div id="back-gmenu-bar"></div>
        <div id="back-free-bar"></div>
<?php
if ( TA_HIEND_PI ) { ?>
        <div id="outer-header-container">
          <?php ta_header_bannerarea(); ?>
        </div><!-- end of #outer-header-container -->
<?php
}
//サイドバー・サブサイドバーの位置（フレーム外への移動）
if ( TA_HIEND_PI ) {
  $ta_common_side2wrap_onoff = ta_read_op( 'ta_common_side2wrap_onoff' );
} else {
  $ta_common_side2wrap_onoff = "invalid";
}
if ( 'valid' == $ta_common_side2wrap_onoff ) { ?>
        <div id="outer-sidebar-container">
          <?php ta_sidebar_container(); ?>
        </div><!-- end of #outer-sidebar-container -->
        <div id="outer-sidebarsub-container">
          <?php ta_sidebarsub_container(); ?>
        </div><!-- end of #outer-sidebarsub-container -->
<?php
} ?>
        <div id="wrap">
<?php
if ( TA_HIEND_PI ) { ta_thm001highend_additional_mode_disp(); } ?>
          <div id="header-container">
            <?php ta_header_bannerarea(); ?>
          </div><!-- end of #header-container -->

<?php
if ( TA_HIEND_PI ) {
  $ta_header_glblnv_img_2main_onoff = ta_read_op( 'ta_header_glblnv_img_2main_onoff' );
} else {
  $ta_header_glblnv_img_2main_onoff = 'invalid';
}
if ( 'invalid' == $ta_header_glblnv_img_2main_onoff ) { ?>
          <div id="header-globalnavi-image-container">
            <?php ta_header_globalnavi_image(); ?>
          </div><!-- end of #header-globalnavi-image-container -->
<?php
} ?>
