<?php
/******************************************************************************************************/
/*
/* テックエイドの成長する自作ホームページWordPressテーマ『 TAテーマ001 (ta-theme001) 』
/*
/* functions.php: ( Latest Version */$func_ver ='2.08 2017.04.17';/* )
/*
/* このプログラムの著作権、使用権、その他全ての権利はde集まれ株式会社に属します。
/* The copyright, royalty and all the other rights of this program belong to deatsumare Corporation.
/*
/* File Version 履歴
/* File Version 2.00 2016.03.07: first edition by Kotaro Kashiwamura.
/* File Version 2.01 2016.03.14: バージョン変更、フリーPHP削除
/*                               SNSボタンオンオフ機能追加 by Kotaro Kashiwamura.
/* File Version 2.02 2016.05.03: バージョン変更 by Kotaro Kashiwamura.
/* File Version 2.03 2016.06.20: バージョン変更、ProとHighendの統合 by Kotaro Kashiwamura.
/* File Version 2.04 2016.07.01: バージョン変更
/*                               カスタム投稿タイプクイック編集の順序番号編集 by Kotaro Kashiwamura.
/* File Version 2.05 2016.08.10: バージョン変更 by Kotaro Kashiwamura.
/* File Version 2.06 2016.09.16: バージョン変更
/*                               カスタム投稿のmenu_positionを31から開始
/*                               SEO設定の集中管理画面追加 by Kotaro Kashiwamura.
/* File Version 2.07 2017.02.27: バージョン変更、TA画像説明付メニューのregister_nav_menus設定追加
/*                               体裁調整、レスポンシブ設定分離、bloginfo修正、
/*                               カスタム投稿ページを無効化（404化）、ajax化 by Kotaro Kashiwamura.
/* File Version 2.08 2017.04.17: バージョン変更、親テーマ用のget_template_directory_uriに変更、
/*                               全幅表示用1/4サムネール画像article_image_wide_top追加 by Kotaro Kashiwamura.
/*
/******************************************************************************************************/

/**********************************************************************************/
/********************************* プラグイン定義 *********************************/
/**********************************************************************************/
//プラグイン
if ( function_exists( 'ta_developer_plugin_208' ) ) {
  define( 'TA_DVLP_PI', ta_developer_plugin_208() );
} else {
  define( 'TA_DVLP_PI', 0 );
}
if ( function_exists( 'ta_hightend_plugin_208' ) ) {
  define( 'TA_HIEND_PI', ta_hightend_plugin_208() );
} else {
  define( 'TA_HIEND_PI', 0 );
}
//プラグインパス
if ( ! defined( 'TA_HIEND_PI_DIR' ) ) { define( 'TA_HIEND_PI_DIR', WP_PLUGIN_DIR . '/ta-theme001-highend_208' ); }


/**********************************************************************************/
/********************************* バージョン定義 *********************************/
/**********************************************************************************/
//日本時間ゾーンに設定
date_default_timezone_set( 'Asia/Tokyo' );

//TA Theme001 developer関数群
if ( TA_DVLP_PI ) { ta_developer_functions_208(); }

//製品バージョン
$file = file_get_contents( TEMPLATEPATH . '/style.css' );
$value1 = explode( 'Version:', $file );
$value2 = explode( '*/', $value1[1] );
if ( TA_DVLP_PI ) {
  ta_thm001developer_version_define( $value2 );
} else {
  define( 'TATHEME001', trim( $value2[0] ) );
  define( 'TATHEME001_VER', 'Version ' . trim( $value2[0] ) );
  define( 'LATESTFILE', '' );
}

//WPメインファイル
$dir = TEMPLATEPATH . '/';
define( 'ERROR404_PHP_VER',                   'Version ' . ta_get_the_version( $dir . '404.php' ) );                            //404.php
define( 'ARCHIVE_PHP_VER',                    'Version ' . ta_get_the_version( $dir . 'archive.php' ) );                        //archive.php
define( 'COMMENTS_PHP_VER',                   'Version ' . ta_get_the_version( $dir . 'comments.php' ) );                       //comments.php
define( 'CONTENTARCHIVE_PHP_VER',             'Version ' . ta_get_the_version( $dir . 'content-archive.php' ) );                //content-archive.php
define( 'FOOTER_PHP_VER',                     'Version ' . ta_get_the_version( $dir . 'footer.php' ) );                         //footer.php
define( 'FRONTPAGE_PHP_VER',                  'Version ' . ta_get_the_version( $dir . 'front-page.php' ) );                     //front-page.php
if ( TA_DVLP_PI ) {
  ta_thm001developer_functions_version_define( $func_ver );
} else {
  define( 'FUNCTIONS_PHP_VER',                'Version ' . $func_ver );                                                         //functions.php
}
define( 'HEADER_PHP_VER',                     'Version ' . ta_get_the_version( $dir . 'header.php' ) );                         //header.php
define( 'HEADERSNSBUTTON_PHP_VER',            'Version ' . ta_get_the_version( $dir . 'header-sns-button.php' ) );              //header-sns-button.php
define( 'MAINSNSBUTTON_PHP_VER',              'Version ' . ta_get_the_version( $dir . 'main-sns-button.php' ) );                //main-sns-button.php
define( 'PAGE_PHP_VER',                       'Version ' . ta_get_the_version( $dir . 'page.php' ) );                           //page.php
define( 'SEARCH_PHP_VER',                     'Version ' . ta_get_the_version( $dir . 'search.php' ) );                         //search.php
define( 'SIDEBAR_PHP_VER',                    'Version ' . ta_get_the_version( $dir . 'sidebar.php' ) );                        //sidebar.php
define( 'SIDEBARSUB_PHP_VER',                 'Version ' . ta_get_the_version( $dir . 'sidebar-sub.php' ) );                    //sidebar-sub.php
define( 'SINGLE_PHP_VER',                     'Version ' . ta_get_the_version( $dir . 'single.php' ) );                         //single.php
define( 'TABACKTOTOP_PHP_VER',                'Version ' . ta_get_the_version( $dir . 'ta-backto-top.php' ) );                  //ta-backto-top.php
define( 'TASITEMAP_PHP_VER',                  'Version ' . ta_get_the_version( $dir . 'ta-sitemap.php' ) );                     //ta-sitemap.php
define( 'TAMAINTE_PHP_VER',                   'Version ' . ta_get_the_version( $dir . 'ta-mainte.php' ) );                      //ta-mainte.php
//CSS（固定）ファイル
$dir = TEMPLATEPATH . '/css/';
define( 'TAADMINSETTING_CSS_VER',             'Version ' . ta_get_the_version( $dir . 'ta-admin-setting.css' ) );               //ta-admin-setting.css
define( 'TACOMMON_CSS_VER',                   'Version ' . ta_get_the_version( $dir . 'ta-common.css-base' ) );                 //ta-common.css-base
define( 'TARESET_CSS_VER',                    'Version ' . ta_get_the_version( $dir . 'ta-reset.css-base' ) );                  //ta-reset.css-base
//JavaScriptファイル
$dir = TEMPLATEPATH . '/js/';
define( 'TASCROLL_JS_VER',                    'Version ' . ta_get_the_version( $dir . 'ta_scroll.js-base' ) );                  //ta_scroll.js-base
define( 'TAADMINFUNCTIONS_JS_VER',            'Version ' . ta_get_the_version( $dir . 'ta-admin-functions.js' ) );              //ta-admin-functions.js
define( 'TAADMINSETTINGCOLORPICKER_JS_VER',   'Version ' . ta_get_the_version( $dir . 'ta-admin-setting-colorpicker.js' ) );    //ta-admin-setting-colorpicker.js
define( 'TAADMINSETTINGUPLOAD_JS_VER',        'Version ' . ta_get_the_version( $dir . 'ta-admin-setting-upload.js' ) );         //ta-admin-setting-upload.js
define( 'TASNS_JS_VER',                       'Version ' . ta_get_the_version( $dir . 'ta-sns.js-base' ) );                     //ta-sns.js-base
define( 'TAWPSETTING_JS_VER',                 'Version ' . ta_get_the_version( $dir . 'ta-wp-setting.js-base' ) );              //ta-wp-setting.js-base
//TAモジュール（共通）
$dir = TEMPLATEPATH . '/ta-modules/';
define( 'TAADMINUPDATE_PHP_VER',              'Version ' . ta_get_the_version( $dir . 'ta-admin-update.php' ) );                //ta-admin-update.php
define( 'TAINIT_PHP_VER',                     'Version ' . ta_get_the_version( $dir . 'ta-init.php' ) );                        //ta-init.php
define( 'TAPHP2AJAX_PHP_VER',                 'Version ' . ta_get_the_version( $dir . 'ta-php2ajax.php' ) );                    //ta-php2ajax.php
define( 'TAPHP2FREEJS_PHP_VER',               'Version ' . ta_get_the_version( $dir . 'ta-php2freejs.php' ) );                  //ta-php2freejs.php
define( 'TAPHP2JSVALUE_PHP_VER',              'Version ' . ta_get_the_version( $dir . 'ta-php2js-value.php' ) );                //ta-php2js-value.php
define( 'TASAVEPOST_PHP_VER',                 'Version ' . ta_get_the_version( $dir . 'ta-save-post.php' ) );                   //ta-save-post.php
//TAモジュール（カスタムボックス）
$dir = TEMPLATEPATH . '/ta-modules/ta-custombox-modules/';
define( 'TAMAINCUSTOMBOXCALLBACK_PHP_VER',    'Version ' . ta_get_the_version( $dir . 'ta-main-custombox-callback.php' ) );     //ta-main-custombox-callback.php
define( 'TAPAGECUSTOMBOXCALLBACK_PHP_VER',    'Version ' . ta_get_the_version( $dir . 'ta-page-custombox-callback.php' ) );     //ta-page-custombox-callback.php
define( 'TAPOSTCUSTOMBOXCALLBACK_PHP_VER',    'Version ' . ta_get_the_version( $dir . 'ta-post-custombox-callback.php' ) );     //ta-post-custombox-callback.php
define( 'TASIDECUSTOMBOXCALLBACK_PHP_VER',    'Version ' . ta_get_the_version( $dir . 'ta-side-custombox-callback.php' ) );     //ta-side-custombox-callback.php
//TAモジュール（動的CSS生成）
$dir = TEMPLATEPATH . '/ta-modules/ta-php2css-modules/';
define( 'TADYNAMICPHP2CSS_PHP_VER',           'Version ' . ta_get_the_version( $dir . 'ta-dynamic-php2css.php' ) );             //ta-dynamic-php2css.php
//TAモジュール（設定値入力）
$dir = TEMPLATEPATH . '/ta-modules/ta-setting-modules/';
define( 'TACOMMONSETTING_PHP_VER',            'Version ' . ta_get_the_version( $dir . 'ta-common-setting.php' ) );              //ta-common-setting.php
define( 'TATOOLSSETTING_PHP_VER',             'Version ' . ta_get_the_version( $dir . 'ta-tools-setting.php' ) );               //ta-tools-setting.php
define( 'TASHORTSETTING_PHP_VER',             'Version ' . ta_get_the_version( $dir . 'ta-short-setting.php' ) );               //ta-short-setting.php
define( 'TAFOOTERSETTING_PHP_VER',            'Version ' . ta_get_the_version( $dir . 'ta-footer-setting.php' ) );              //ta-footer-setting.php
define( 'TAHEADERSETTING_PHP_VER',            'Version ' . ta_get_the_version( $dir . 'ta-header-setting.php' ) );              //ta-header-setting.php
define( 'TAMAINSETTING_PHP_VER',              'Version ' . ta_get_the_version( $dir . 'ta-main-setting.php' ) );                //ta-main-setting.php
define( 'TARESPONSIBLESETTING_PHP_VER',       'Version ' . ta_get_the_version( $dir . 'ta-responsible-setting.php' ) );         //ta-responsible-setting.php
define( 'TARESPONSIBLEHEADSETTING_PHP_VER',   'Version ' . ta_get_the_version( $dir . 'ta-responsiblehead-setting.php' ) );     //ta-responsiblehead-setting.php
define( 'TARESPONSIBLEMAINSETTING_PHP_VER',   'Version ' . ta_get_the_version( $dir . 'ta-responsiblemain-setting.php' ) );     //ta-responsiblemain-setting.php
define( 'TARESPONSIBLESIDESETTING_PHP_VER',   'Version ' . ta_get_the_version( $dir . 'ta-responsibleside-setting.php' ) );     //ta-responsibleside-setting.php
define( 'TARESPONSIBLESIDESUBSETTING_PHP_VER','Version ' . ta_get_the_version( $dir . 'ta-responsiblesidesub-setting.php' ) );  //ta-responsiblesidesub-setting.php
define( 'TARESPONSIBLEFOOTSETTING_PHP_VER',   'Version ' . ta_get_the_version( $dir . 'ta-responsiblefoot-setting.php' ) );     //ta-responsiblefoot-setting.php
define( 'TASEOCENTRALSETTING_PHP_VER',        'Version ' . ta_get_the_version( $dir . 'ta-seocentral-setting.php' ) );          //ta-seocentral-setting.php
define( 'TASIDEBARSETTING_PHP_VER',           'Version ' . ta_get_the_version( $dir . 'ta-sidebar-setting.php' ) );             //ta-sidebar-setting.php
define( 'TASIDEBARSUBSETTING_PHP_VER',        'Version ' . ta_get_the_version( $dir . 'ta-sidebarsub-setting.php' ) );          //ta-sidebarsub-setting.php
define( 'TATOPSETTING_PHP_VER',               'Version ' . ta_get_the_version( $dir . 'ta-top-setting.php' ) );                 //ta-top-setting.php
//TAモジュール（関数）
$dir = TEMPLATEPATH . '/ta-modules/ta-functions-modules/';
define( 'TASETTINGFUNCTIONS_PHP_VER',         'Version ' . ta_get_the_version( $dir . 'ta-setting-functions.php' ) );           //ta-setting-functions.php
define( 'TATEMPLATEFUNCTIONS_PHP_VER',        'Version ' . ta_get_the_version( $dir . 'ta-template-functions.php' ) );          //ta-template-functions.php
define( 'TACSSFUNCTIONS_PHP_VER',             'Version ' . ta_get_the_version( $dir . 'ta-css-functions.php' ) );               //ta-css-functions.php
//プラグインTA-THEME001-HIGHEND
if ( TA_HIEND_PI ) {
  //プラグインTA-THEME001-HIGHEND（プラグイン記述）
  $dir = TA_HIEND_PI_DIR . '/';
  define( 'TATHEME001HIGHEND_PHP_VER',          'Version ' . ta_get_the_version( $dir . 'ta-theme001-highend_' . str_replace( ".", "", TATHEME001 ) . '.php' ) );   //ta-theme001-highend_ver.php
  //プラグインTA-THEME001-HIGHEND（カスタムボックス）
  $dir = TA_HIEND_PI_DIR . '/custombox-modules/';
  define( 'TAENDROLLCUSTOMBOXCALLBACK_PHP_VER',           'Version ' . ta_get_the_version( $dir . 'ta-endroll-custombox-callback.php' ) );            //ta-endroll-custombox-callback.php
  define( 'TAEXPCUSTOMBOXCALLBACK_PHP_VER',               'Version ' . ta_get_the_version( $dir . 'ta-exp-custombox-callback.php' ) );                //ta-exp-custombox-callback.php
  define( 'TAFOOTERCUSTOMBOXCALLBACK_PHP_VER',            'Version ' . ta_get_the_version( $dir . 'ta-footer-custombox-callback.php' ) );             //ta-footer-custombox-callback.php
  define( 'TAHEADERCUSTOMBOXCALLBACK_PHP_VER',            'Version ' . ta_get_the_version( $dir . 'ta-header-custombox-callback.php' ) );             //ta-header-custombox-callback.php
  define( 'TASIDESUBCUSTOMBOXCALLBACK_PHP_VER',           'Version ' . ta_get_the_version( $dir . 'ta-sidesub-custombox-callback.php' ) );            //ta-sidesub-custombox-callback.php
  //プラグインTA-THEME001-HIGHEND（汎用）
  $dir = TA_HIEND_PI_DIR . '/general-modules/';
  define( 'TATHEME001HIGHEND_CSS_PHP_VER',                'Version ' . ta_get_the_version( $dir . 'ta-theme001-highend-css.php' ) );                  //ta-theme001-highend-css.php
  define( 'TATHEME001HIGHEND_CUSTOMBOX_PHP_VER',          'Version ' . ta_get_the_version( $dir . 'ta-theme001-highend-custombox.php' ) );            //ta-theme001-highend-custombox.php
  define( 'TATHEME001HIGHEND_FREEJS_PHP_VER',             'Version ' . ta_get_the_version( $dir . 'ta-theme001-highend-freejs.php' ) );               //ta-theme001-highend-freejs.php
  define( 'TATHEME001HIGHEND_INIT_PHP_VER',               'Version ' . ta_get_the_version( $dir . 'ta-theme001-highend-init.php' ) );                 //ta-theme001-highend-init.php
  define( 'TATHEME001HIGHEND_SAVEPOST_PHP_VER',           'Version ' . ta_get_the_version( $dir . 'ta-theme001-highend-savepost.php' ) );             //ta-theme001-highend-savepost.php
  define( 'TATHEME001HIGHEND_TEMPLATE_PHP_VER',           'Version ' . ta_get_the_version( $dir . 'ta-theme001-highend-template.php' ) );             //ta-theme001-highend-template.php
  define( 'TATHEME001HIGHEND_UPDATE_PHP_VER',             'Version ' . ta_get_the_version( $dir . 'ta-theme001-highend-update.php' ) );               //ta-theme001-highend-update.php
  //プラグインTA-THEME001-HIGHEND（設定値入力）
  $dir = TA_HIEND_PI_DIR . '/setting-modules/';
  define( 'TATHEME001HIGHEND_COMMONSETTING_PHP_VER',      'Version ' . ta_get_the_version( $dir . 'ta-theme001-highend-common-setting.php' ) );       //ta-theme001-highend-common-setting.php
  define( 'TATHEME001HIGHEND_FOOTERSETTING_PHP_VER',      'Version ' . ta_get_the_version( $dir . 'ta-theme001-highend-footer-setting.php' ) );       //ta-theme001-highend-footer-setting.php
  define( 'TATHEME001HIGHEND_HEADERSETTING_PHP_VER',      'Version ' . ta_get_the_version( $dir . 'ta-theme001-highend-header-setting.php' ) );       //ta-theme001-highend-header-setting.php
  define( 'TATHEME001HIGHEND_MAINSETTING_PHP_VER',        'Version ' . ta_get_the_version( $dir . 'ta-theme001-highend-main-setting.php' ) );         //ta-theme001-highend-main-setting.php
  define( 'TATHEME001HIGHEND_RESPONSIBLESETTING_PHP_VER', 'Version ' . ta_get_the_version( $dir . 'ta-theme001-highend-responsible-setting.php' ) );  //ta-theme001-highend-responsible-setting.php
  define( 'TATHEME001HIGHEND_SHORTSETTING_PHP_VER',       'Version ' . ta_get_the_version( $dir . 'ta-theme001-highend-short-setting.php' ) );        //ta-theme001-highend-short-setting.php
  define( 'TATHEME001HIGHEND_SIDEBARSETTING_PHP_VER',     'Version ' . ta_get_the_version( $dir . 'ta-theme001-highend-sidebar-setting.php' ) );      //ta-theme001-highend-sidebar-setting.php
  define( 'TATHEME001HIGHEND_SIDEBARSUBSETTING_PHP_VER',  'Version ' . ta_get_the_version( $dir . 'ta-theme001-highend-sidebarsub-setting.php' ) );   //ta-theme001-highend-sidebarsub-setting.php
  define( 'TATHEME001HIGHEND_TOOLSSETTING_PHP_VER',       'Version ' . ta_get_the_version( $dir . 'ta-theme001-highend-tools-setting.php' ) );        //ta-theme001-highend-tools-setting.php
  define( 'TATHEME001HIGHEND_TOPSETTING_PHP_VER',         'Version ' . ta_get_the_version( $dir . 'ta-theme001-highend-top-setting.php' ) );          //ta-theme001-highend-top-setting.php
}

//対象ファイルからバージョン情報を読み取る関数
function ta_get_the_version( $path ) {
  $file = file_get_contents( $path, NULL, NULL, 1, 1000 );
  $value1 = explode( 'Latest Version', $file );
  $value2 = explode( ')', $value1[1] );
  if ( TA_DVLP_PI ) {
    return ta_thm001developer_getting_filedate( $path, $value2 );
  } else {
    return trim( $value2[0] );
  }
}

//バージョン表示
function ta_ver_display() { ?>
<p style="width:100%;">『テーマ』：<?php echo 'Ver. ' . TATHEME001; echo ( TA_HIEND_PI ) ? ',　『HighEnd』：Ver. ' . TA_HIEND_PI : ''; ?></p>
<?php
}

//世界標準時間ゾーンに戻す（WordPress標準）
date_default_timezone_set( 'UTC' );

/**********************************************************************************/
/******************************* プラグイン関数読込 *******************************/
/**********************************************************************************/
//TA Theme001 HighEnd関数群
if ( TA_HIEND_PI ) { ta_hightend_functions_208(); }


/********************************************************************************/
/*********************************** システム ***********************************/
/********************************************************************************/
/********* 設定ソースファイル用 *********/
define( 'TASOURCEFILE_SEPARATOR', '%%?,?%%' );
if ( TA_HIEND_PI ) { define( 'TAMAINFA_LIM', -1 ); } else { define( 'TAMAINFA_LIM', 2 ); }
if ( TA_HIEND_PI ) { define( 'TASIDEFA_LIM', -1 ); } else { define( 'TASIDEFA_LIM', 2 ); }

/********* 事前読み込みファイル *********/
require_once( TEMPLATEPATH . '/ta-modules/ta-init.php' );
require_once( TEMPLATEPATH . '/ta-modules/ta-functions-modules/ta-setting-functions.php' );
require_once( TEMPLATEPATH . '/ta-modules/ta-functions-modules/ta-template-functions.php' );


/********* テーマを設定時に自動で固定ページの作成および表示設定の変更を行う *********/
add_action( 'after_setup_theme', 'ta_create_pages' );
function ta_create_pages() {
  if ( 'page' == get_option( 'show_on_front' ) ) {        //フロントページの表示（管理画面「設定」-「表示設定」）が固定ページ
    return;
  } else {
    if ( null == get_page_by_path( 'home' ) ) {
      $frontpage = wp_insert_post(
        array(
          'post_title'   => 'ホーム',
          'post_name'    => 'home',
          'post_status'  => 'publish',
          'post_type'    => 'page',
          'menu_order'   => 0,
          'post_content' => '',
        )
      );
      update_option( 'show_on_front', 'page' );           //フロントページの表示（管理画面「設定」-「表示設定」）を固定ページにする
      update_option( 'page_on_front', $frontpage );       //フロントページの表示 >フロントページ（管理画面「設定」-「表示設定」）を'ホーム'にする
    }
    if ( null == get_page_by_path( 'ta_sitemap' ) ) {
      $ta_sitemap = wp_insert_post(
        array(
          'post_title'   => 'サイトマップ',
          'post_name'    => 'ta_sitemap',
          'post_status'  => 'publish',
          'post_type'    => 'page',
          'menu_order'   => 100,
          'post_content' => '',
        )
      );
    }
  }
}


/********* テーマが有効になった際の設定 *********/
add_action( 'after_switch_theme', 'ta_switch_theme' );
function ta_switch_theme() { update_option( '_ta_switch_theme_process', 'valid' ); }   //テーマ有効時初期設定宣言


/********* WordPress標準機能設定 *********/
//WP標準カノニカルタグ出力を無効
remove_action( 'wp_head', 'rel_canonical' );

//アイキャッチ画像を有効
add_theme_support('post-thumbnails');

//アイキャッチ画像サイズ
set_post_thumbnail_size(600, 250, false);

//各種サイズを追加
$ta_common_frame_width = ta_read_op( 'ta_common_frame_width' );
$ta_wp_large_size_width = get_option( 'large_size_w' );
add_image_size( 'ta_square_image60', 60, 60, true );
add_image_size( 'ta_square_image90', 90, 90, true );
add_image_size( 'ta_square_image120', 120, 120, true );
add_image_size( 'ta_square_image180', 180, 180, true );
add_image_size( 'ta_square_image240', 240, 240, true );
add_image_size( 'article_image_top', $ta_common_frame_width, round( $ta_common_frame_width / 4 ), true );
add_image_size( 'article_image_wide_top', $ta_wp_large_size_width, round( $ta_wp_large_size_width / 4 ), true );

//カスタムヘッダー
$ta_header_headimg_width = ta_read_op( 'ta_header_headimg_width' );
$ta_header_headimg_height = ta_read_op( 'ta_header_headimg_height' );
$ta_default_image = '%s/images/ta-header-images/ta_default_image.png';
add_theme_support(
 'custom-header',
 array(
  'width' => $ta_header_headimg_width,
  'height' => $ta_header_headimg_height,
  'header-text' => false,
  'default-image' => $ta_default_image,
  'admin-head-callback' => '__return_false',
 )
);

//ウィジェットを出力
add_action( 'widgets_init', 'ta_widgets_init' );
function ta_widgets_init() {
  $ta_top_widget_title_factor = ta_read_op( 'ta_top_widget_title_factor' );
  register_sidebar( array(
    'name' => 'トップページ',
    'id' => 'main-contents',
    'before_widget' => '<aside id="%1$s" class="ta-widget-container fixed-space %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<' . $ta_top_widget_title_factor . ' class="title">',
    'after_title' => '</' . $ta_top_widget_title_factor . '>',
  ) );

  $ta_sidebar_widget_title_factor = ta_read_op( 'ta_sidebar_widget_title_factor' );
  register_sidebar( array(
    'name' => 'サイドバー',
    'id' => 'sidebar',
    'before_widget' => '<aside id="%1$s" class="ta-widget-container fixed-space %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<' . $ta_sidebar_widget_title_factor . ' class="sidebar_title">',
    'after_title' => '</' . $ta_sidebar_widget_title_factor . '>',
  ) );

  $ta_sidebarsub_widget_title_factor = ta_read_op( 'ta_sidebarsub_widget_title_factor' );
  register_sidebar( array(
    'name' => 'サブサイドバー',
    'id' => 'sidebarsub',
    'before_widget' => '<aside id="%1$s" class="ta-widget-container fixed-space %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<' . $ta_sidebarsub_widget_title_factor . ' class="sidebarsub_title">',
    'after_title' => '</' . $ta_sidebarsub_widget_title_factor . '>',
  ) );

  $ta_footer_widget_title_factor = ta_read_op( 'ta_footer_widget_title_factor' );
  register_sidebar( array(
    'name' => 'フッター',
    'id' => 'footer',
    'before_widget' => '<aside id="%1$s" class="ta-widget-container fixed-space %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<' . $ta_footer_widget_title_factor . ' class="footer_title">',
    'after_title' => '</' . $ta_footer_widget_title_factor . '>',
  ) );
}

// カスタムメニューの設定
register_nav_menus(
  array(
    'ta_headertop_info_menu' => 'TAヘッダートップメニュー（連絡先エリア簡易メニュー）',
    'ta_headertop_search_menu' => 'TAヘッダートップメニュー（検索エリア簡易メニュー）',
    'ta_global_navigation' => 'TAグローバルメニュー（ナビゲーション）',
  )
);

register_nav_menus( array( 'ta_sidebar_menu1' => 'TAサイドバーメニュー#1', ) );

if ( TA_HIEND_PI ) { for ( $i = 2; $i <= 10; $i++ ) { register_nav_menus( array( 'ta_sidebar_menu' . $i => 'TAサイドバーメニュー#' . $i, ) ); } }

register_nav_menus( array( 'ta_footer_menu' => 'TAフッターメニュー', ) );

if ( TA_HIEND_PI ) {
  register_nav_menus(
    array(
      'ta_versatile_menu1' => 'TA汎用メニュー#1',
      'ta_versatile_menu2' => 'TA汎用メニュー#2',
      'ta_versatile_menu3' => 'TA汎用メニュー#3',
      'ta_versatile_menu4' => 'TA汎用メニュー#4',
      'ta_versatile_menu5' => 'TA汎用メニュー#5',
      'ta_imgexp_menu_a' => 'TA画像説明付メニューA',
      'ta_imgexp_menu_b' => 'TA画像説明付メニューB',
    )
  );
}


/********* テックエイドフォーマット設定 *********/
//トップレベルメニューを出力
add_action( 'admin_menu', 'ta_admin_menu' );
function ta_admin_menu() {
  add_menu_page(
    'TAテーマ001設定<br>『標準デザイン』',
    'TAテーマ001設定<br>『標準デザイン』',
    'administrator',
    'ta_setting_menu',
    'ta_common_setting',
    get_template_directory_uri() . '/images/ta-admin-images/tec-aid-logo.png',
    '80.5'
  );

  add_submenu_page(
    'ta_setting_menu',
    '共通設定',
    '共通設定',
    'administrator',
    'ta_common_setting',
    'ta_common_setting'
  );
  
  add_submenu_page(
    'ta_setting_menu',
    'トップページ設定',
    'トップページ',
    'administrator',
    'ta_top_setting',
    'ta_top_setting'
  );

  add_submenu_page(
    'ta_setting_menu',
    'ヘッダー設定',
    'ヘッダー',
    'administrator',
    'ta_header_setting',
    'ta_header_setting'
  );

  add_submenu_page(
    'ta_setting_menu',
    'メイン設定',
    'メイン',
    'administrator',
    'ta_main_setting',
    'ta_main_setting'
  );

  add_submenu_page(
    'ta_setting_menu',
    'サイドバー設定',
    'サイドバー',
    'administrator',
    'ta_sidebar_setting',
    'ta_sidebar_setting'
  );

  add_submenu_page(
    'ta_setting_menu',
    'サブサイドバー設定',
    'サブサイドバー',
    'administrator',
    'ta_sidebarsub_setting',
    'ta_sidebarsub_setting'
  );

  add_submenu_page(
    'ta_setting_menu',
    'フッター設定',
    'フッター',
    'administrator',
    'ta_footer_setting',
    'ta_footer_setting'
  );

  add_submenu_page(
    'ta_setting_menu',
    '便利ツール設定',
    '便利ツール',
    'administrator',
    'ta_tools_setting',
    'ta_tools_setting'
  );

  add_submenu_page(
    'ta_setting_menu',
    '汎用ショートコード設定',
    '汎用ショートコード',
    'administrator',
    'ta_short_setting',
    'ta_short_setting'
  );

  add_submenu_page(
    'ta_setting_menu',
    'SEO設定集中管理',
    'SEO設定集中管理',
    'administrator',
    'ta_seocentral_setting',
    'ta_seocentral_setting'
  );
}

add_action( 'admin_menu', 'ta_admin_responsive_menu' );
function ta_admin_responsive_menu() {
  add_menu_page(
    'TAテーマ001設定<br>『レスポンシブ』',
    'TAテーマ001設定<br>『レスポンシブ』',
    'administrator',
    'ta_responsive_setting_menu',
    'ta_responsible_setting',
    get_template_directory_uri() . '/images/ta-admin-images/tec-aid-res-logo.png',
    '80.6'
  );

  add_submenu_page(
    'ta_responsive_setting_menu',
    '(R) 共通設定',
    '(R) 共通設定',
    'administrator',
    'ta_responsible_setting',
    'ta_responsible_setting'
  );
  
  add_submenu_page(
    'ta_responsive_setting_menu',
    '(R) ヘッダー',
    '(R) ヘッダー',
    'administrator',
    'ta_responsiblehead_setting',
    'ta_responsiblehead_setting'
  );
  
  add_submenu_page(
    'ta_responsive_setting_menu',
    '(R) メイン（トップ）',
    '(R) メイン（トップ）',
    'administrator',
    'ta_responsiblemain_setting',
    'ta_responsiblemain_setting'
  );
  
  add_submenu_page(
    'ta_responsive_setting_menu',
    '(R) サイドバー',
    '(R) サイドバー',
    'administrator',
    'ta_responsibleside_setting',
    'ta_responsibleside_setting'
  );
  
  add_submenu_page(
    'ta_responsive_setting_menu',
    '(R) サブサイドバー',
    '(R) サブサイドバー',
    'administrator',
    'ta_responsiblesidesub_setting',
    'ta_responsiblesidesub_setting'
  );
  
  add_submenu_page(
    'ta_responsive_setting_menu',
    '(R) フッター',
    '(R) フッター',
    'administrator',
    'ta_responsiblefoot_setting',
    'ta_responsiblefoot_setting'
  );
}

//共通設定メニュー
function ta_common_setting() {
  include_once( TEMPLATEPATH . '/ta-modules/ta-setting-modules/ta-common-setting.php' );
}

//便利ツールメニュー
function ta_tools_setting() {
  include_once( TEMPLATEPATH . '/ta-modules/ta-setting-modules/ta-tools-setting.php' );
}

//汎用ショートコードメニュー
function ta_short_setting() {
  include_once( TEMPLATEPATH . '/ta-modules/ta-setting-modules/ta-short-setting.php' );
}

//トップページ設定メニュー
function ta_top_setting() {
  include_once( TEMPLATEPATH . '/ta-modules/ta-setting-modules/ta-top-setting.php' );
}

//ヘッダー設定メニュー
function ta_header_setting() {
  include_once( TEMPLATEPATH . '/ta-modules/ta-setting-modules/ta-header-setting.php' );
}

//メイン設定メニュー
function ta_main_setting() {
  include_once( TEMPLATEPATH . '/ta-modules/ta-setting-modules/ta-main-setting.php' );
}

//サイドバー設定メニュー
function ta_sidebar_setting() {
  include_once( TEMPLATEPATH . '/ta-modules/ta-setting-modules/ta-sidebar-setting.php' );
}

//サブサイドバー設定メニュー
function ta_sidebarsub_setting() {
  include_once( TEMPLATEPATH . '/ta-modules/ta-setting-modules/ta-sidebarsub-setting.php' );
}

//フッター設定メニュー
function ta_footer_setting() {
  include_once( TEMPLATEPATH . '/ta-modules/ta-setting-modules/ta-footer-setting.php' );
}

//レスポンシブデザイン『基本・共通』設定メニュー
function ta_responsible_setting() {
  include_once( TEMPLATEPATH . '/ta-modules/ta-setting-modules/ta-responsible-setting.php' );
}

//レスポンシブデザイン『ヘッダー』設定メニュー
function ta_responsiblehead_setting() {
  include_once( TEMPLATEPATH . '/ta-modules/ta-setting-modules/ta-responsiblehead-setting.php' );
}

//レスポンシブデザイン『メイン（トップページ）』設定メニュー
function ta_responsiblemain_setting() {
  include_once( TEMPLATEPATH . '/ta-modules/ta-setting-modules/ta-responsiblemain-setting.php' );
}

//レスポンシブデザイン『サイドバー』設定メニュー
function ta_responsibleside_setting() {
  include_once( TEMPLATEPATH . '/ta-modules/ta-setting-modules/ta-responsibleside-setting.php' );
}

//レスポンシブデザイン『サブサイドバー』設定メニュー
function ta_responsiblesidesub_setting() {
  include_once( TEMPLATEPATH . '/ta-modules/ta-setting-modules/ta-responsiblesidesub-setting.php' );
}

//レスポンシブデザイン『フッター』設定メニュー
function ta_responsiblefoot_setting() {
  include_once( TEMPLATEPATH . '/ta-modules/ta-setting-modules/ta-responsiblefoot-setting.php' );
}

//SEO集中管理画面メニュー
function ta_seocentral_setting() {
  include_once( TEMPLATEPATH . '/ta-modules/ta-setting-modules/ta-seocentral-setting.php' );
}

//設定情報をオプションに保存
add_action( 'admin_post_tasetting', 'ta_admin_update' );  //POST通信
add_action( 'wp_ajax_tasetting', 'ta_admin_update' );     //Ajax通信
function ta_admin_update() {
  include_once( TEMPLATEPATH . '/ta-modules/ta-admin-update.php' );
}


/********* 管理画面HTMLファイルにCSSとJavaScriptを追加する *********/
add_action( 'admin_enqueue_scripts', 'ta_admin_scripts' );
function ta_admin_scripts() {
  //管理画面用CSSファイル
  $create_time = filemtime( TEMPLATEPATH . '/css/ta-admin-setting.css' );
  wp_enqueue_style( 'ta-admin-setting', get_template_directory_uri() . '/css/ta-admin-setting.css', array(), $create_time );
  //管理画面用メディアアップロード用ファイル
  wp_enqueue_style( 'thickbox' );
  $create_time = filemtime( TEMPLATEPATH . '/js/ta-admin-setting-upload.js' );
  wp_enqueue_script( 'ta-admin-setting-upload', get_template_directory_uri() . '/js/ta-admin-setting-upload.js', array( 'media-upload', 'thickbox', 'jquery' ), $create_time, true );
  //管理画面用カラーピッカー用ファイル
  wp_enqueue_style( 'wp-color-picker' );
  $create_time = filemtime( TEMPLATEPATH . '/js/ta-admin-setting-colorpicker.js' );
  wp_enqueue_script( 'ta-admin-setting-colorpicker', get_template_directory_uri() . '/js/ta-admin-setting-colorpicker.js', array( 'wp-color-picker' ), $create_time, true );
  //jQueryプラグインjs.cookie.jsの追加
  wp_enqueue_script( 'jquery-cookie', get_template_directory_uri() . '/js/js.cookie.js', array(), '0' );
  //管理画面用JavaScript関数ファイル
  $create_time = filemtime( TEMPLATEPATH . '/js/ta-admin-functions.js' );
  wp_enqueue_script( 'ta-admin-functions', get_template_directory_uri() . '/js/ta-admin-functions.js', array( 'jquery' ), $create_time, true );
  wp_localize_script( 'ta-admin-functions', 'images_url', array( 'url' => get_template_directory_uri() . '/images/') );
}


/********* サイトHTMLファイルにCSSとJavaScriptファイルを追加する *********/
add_action( 'wp_enqueue_scripts', 'ta_wp_scripts' );
function ta_wp_scripts() {
  //サイト用JavaScriptファイル
  $create_time = filemtime( TEMPLATEPATH . '/js/ta-wp-setting.min.js' );
  wp_enqueue_script( 'ta-wp-setting', get_template_directory_uri() . '/js/ta-wp-setting.min.js', array( 'jquery' ), $create_time, true );

  //サイトSNS用JavaScript関数ファイル
  if ( 'valid' == ta_read_op( 'ta_common_smo_sns_button_onoff' ) ) {
    $create_time = filemtime( TEMPLATEPATH . '/js/ta-sns.min.js' );
    wp_enqueue_script( 'ta-sns', get_template_directory_uri() . '/js/ta-sns.min.js', array( 'jquery' ), $create_time, true );
  }
  //WordPressダッシュアイコンCSS（dashicons-css）の読み出し
  wp_enqueue_style( 'dashicons' );
}


/********* テックエイドフリーエリア用カスタム投稿タイプを追加 *********/
add_action('init', 'ta_register_post_type');
function ta_register_post_type() {
  $capabilities = array(
    'edit_posts' => 'edit_tatypes',                         //自分の投稿を編集する権限
    'edit_others_posts' => 'edit_others_tatypes',           //他のユーザーの投稿を編集する権限
    'publish_posts' => 'publish_tatypes',                   //投稿を公開する権限
    'read_private_posts' => 'read_private_tatypes',         //プライベート投稿を閲覧する権限
    'delete_posts' => 'delete_tatypes',                     //自分の投稿を削除する権限
    'delete_private_posts' => 'delete_private_tatypes',     //プライベート投稿を削除する権限
    'delete_published_posts' => 'delete_published_tatypes', //公開済み投稿を削除する権限
    'delete_others_posts' => 'delete_others_tatypes',       //他のユーザーの投稿を削除する権限
    'edit_private_posts' => 'edit_private_tatypes',         //プライベート投稿を編集する権限
    'edit_published_posts' => 'edit_published_tatypes',     //公開済みの投稿を編集する権限
  );
  // 管理者に独自権限を付与
  $role = get_role( 'administrator' );
  foreach ( $capabilities as $cap ) {
      $role->add_cap( $cap );
  }
  register_post_type(
    'ta_main_fa',
    array(
      'labels' => array(
        'name' => 'TAトップFA',
        'add_new_item' => '内容を追加',
        'edit_item' => '内容の編集',
      ),
      'public' => true,
      'hierarchical' => true,
      'exclude_from_search'  => true,
      'menu_icon' => get_template_directory_uri() . '/images/ta-admin-images/tec-aid-fa-logo.png',
      'menu_position' => 33,
      'capability_type' => 'tatype',
      'capabilities' => $capabilities,
      'map_meta_cap' => true,
      'supports' => array(
        'title',
        'editor',
      ),
    )
  );
  register_post_type(
    'ta_sidebar_fa',
    array(
      'labels' => array(
        'name' => 'TAサイドFA',
        'add_new_item' => '内容を追加',
        'edit_item' => '内容の編集',
      ),
      'public' => true,
      'hierarchical' => true,
      'exclude_from_search'  => true,
      'menu_icon' => get_template_directory_uri() . '/images/ta-admin-images/tec-aid-fa-logo.png',
      'menu_position' => 34,
      'capability_type' => 'tatype',
      'capabilities' => $capabilities,
      'map_meta_cap' => true,
      'supports' => array(
        'title',
        'editor',
      ),
    )
  );
}

//カスタム投稿の管理画面リストのソート条件指定
add_filter('pre_get_posts', 'ta_resort_by_ordernum');
function ta_resort_by_ordernum( $custom_post_query ) {
  if ( is_admin() ) {
    $custom_post_name = ( isset( $custom_post_query->query['post_type'] ) ) ? $custom_post_query->query['post_type'] : '';
    $custom_post_status = ( isset( $custom_post_query->query['post_status'] ) ) ? $custom_post_query->query['post_status'] : '';
    if ( 'ta_main_fa' == $custom_post_name && 'publish' == $custom_post_status ) {
      $custom_post_query->set( 'posts_per_page', TAMAINFA_LIM );
      $custom_post_query->set( 'meta_key', '_ta_post_order' );
      $custom_post_query->set( 'orderby', 'meta_value_num' );
      $custom_post_query->set( 'order', ta_read_op( 'ta_top_freearea_display_order' ) );
    }
    if ( 'ta_sidebar_fa' == $custom_post_name && 'publish' == $custom_post_status ) {
      $custom_post_query->set( 'posts_per_page', TASIDEFA_LIM );
      $custom_post_query->set( 'meta_key', '_ta_post_order' );
      $custom_post_query->set( 'orderby', 'meta_value_num' );
      $custom_post_query->set( 'order', ta_read_op( 'ta_sidebar_freearea_display_order' ) );
    }
  }
}


/********* カスタム投稿タイプに順序番号を表示する関数 *********/
//順序を表示
add_action( 'manage_pages_custom_column', 'add_order_value_custompost', 10, 2 );
function add_order_value_custompost( $column_name, $post_id ) {
  if( 'order' == $column_name ) { echo ta_read_post( $post_id, 'ta_post_order' ) - 100; }
}

//ta_main_fa
add_filter( 'manage_ta_main_fa_posts_columns', 'add_order_frame_ta_main_fa' );
function add_order_frame_ta_main_fa( $columns ) {
  $columns['order'] = '順序番号';
  $sort_number = array( 'cb' => 0, 'order' => 1, 'title' => 2, 'date' => 3 );
  $sort = array();
  foreach( $columns as $key => $value ) {
    $sort[] = $sort_number{$key};
  }
  array_multisort( $sort, $columns );
  return $columns;
}

//ta_sidebar_fa
add_filter( 'manage_ta_sidebar_fa_posts_columns', 'add_order_frame_ta_sidebar_fa' );
function add_order_frame_ta_sidebar_fa( $columns ) {
  $columns['order'] = '順序番号';
  $sort_number = array( 'cb' => 0, 'order' => 1, 'title' => 2, 'date' => 3 );
  $sort = array();
  foreach( $columns as $key => $value ) {
    $sort[] = $sort_number{$key};
  }
  array_multisort( $sort, $columns );
  return $columns;
}


/********* カスタム投稿タイプのクイック編集で順序番号を編集する関数 *********/
//クイック編集画面の項目表示
function ta_custom_quickedit( $column_name, $post_type ) {
  if ( 'ta_header_fa'   == $post_type || 'ta_exp_fa'        == $post_type || 'ta_main_fa'   == $post_type ||
       'ta_sidebar_fa'  == $post_type || 'ta_sidebarsub_fa' == $post_type || 'ta_footer_fa' == $post_type ||
       'ta_endroll_fa'  == $post_type ) {
    if ( 'order' == $column_name ) {
      wp_nonce_field( 'ta_quick_nonce_key', 'ta_custombox_quick' ); ?>
  <fieldset id="ta-custom-quickedit-order" class="inline-edit-col-right">
    <div class="inline-edit-col column-order">
      <label class="inline-edit-group">
        <span class="title">順序番号</span><input style="width:50px;" name="ta_post_order" />
      </label>
    </div>
  </fieldset>
<?php
    }
  }
}
add_action( 'quick_edit_custom_box', 'ta_custom_quickedit', 10, 2 );

//クイック編集画面の順序番号に現値を表示
function ta_custom_quickedit_dtcp() {
  global $post_type;
  if ( 'ta_header_fa'   == $post_type || 'ta_exp_fa'        == $post_type || 'ta_main_fa'   == $post_type ||
       'ta_sidebar_fa'  == $post_type || 'ta_sidebarsub_fa' == $post_type || 'ta_footer_fa' == $post_type ||
       'ta_endroll_fa'  == $post_type ) { ?>
  <script type="text/javascript">
  (function($) {
    var $wp_inline_edit = inlineEditPost.edit;
    inlineEditPost.edit = function( id ) {
      $wp_inline_edit.apply( this, arguments );
      var $post_id = 0;
      if ( typeof( id ) == 'object' ) { $post_id = parseInt( this.getId( id ) ); }
      if ( $post_id > 0 ) {
        var $edit_row = $( '#edit-' + $post_id );
        var $post_row = $( '#post-' + $post_id );
        var $order = $( '.column-order', $post_row ).html();
        $( ':input[name="ta_post_order"]', $edit_row ).val( $order );
      }
    };
  })(jQuery);
  </script>
<?php
  }
}
add_action('admin_footer-edit.php', 'ta_custom_quickedit_dtcp');

//クイック編集画面の順序番号データを格納
function ta_custom_quickedit_dtsave( $post_id ) {
  $slug = get_post_type( $post_id );
  if ( 'ta_header_fa'   == $slug || 'ta_exp_fa'        == $slug || 'ta_main_fa'   == $slug ||
       'ta_sidebar_fa'  == $slug || 'ta_sidebarsub_fa' == $slug || 'ta_footer_fa' == $slug ||
       'ta_endroll_fa'  == $slug ) {
    //nonceの確認
    if ( ! isset( $_POST['ta_custombox_quick'] ) ) return;
    if ( ! wp_verify_nonce( $_POST['ta_custombox_quick'], 'ta_quick_nonce_key' ) ) return;
    ta_update_postmeta( $post_id, 'ta_post_order', 'nump100' );
    echo '<script type="text/javascript">window.location.reload();</script>';
  }
}
add_action( 'save_post', 'ta_custom_quickedit_dtsave' );


/********* テックエイド専用メタボックスを追加 *********/
//admin_menuアクションフックでカスタムボックスを追加
add_action( 'admin_menu', 'ta_add_custom_box' );
function ta_add_custom_box() {
  //固定ページカスタムボックス
  add_meta_box(
    'ta_page_custombox',            //メタボックスを囲むdivタグのid属性値
    'TAテーマ001設定',              //メタボックスのタイトル
    'ta_page_custombox_callback',   //メタボックスの内容を表示するコールバック関数名
    'page',                         //ページの種類として'post'、'page'、'link'、'dashboard'、カスタム投稿タイプ名の何れかを指定
    'advanced'                      //メタボックスの種別として'normal'、'advanced'、'side'の何れかを指定（省略時は'advanced')
  );
  //投稿ページカスタムボックス
  add_meta_box(
    'ta_post_custombox',            //メタボックスを囲むdivタグのid属性値
    'TAテーマ001設定',              //メタボックスのタイトル
    'ta_post_custombox_callback',   //メタボックスの内容を表示するコールバック関数名
    'post',                         //ページの種類として'post'、'page'、'link'、'dashboard'、カスタム投稿タイプ名の何れかを指定
    'advanced'                      //メタボックスの種別として'normal'、'advanced'、'side'の何れかを指定（省略時は'advanced')
  );
  //カスタム投稿タイプ(TAトップFA)カスタムボックス
  add_meta_box(
    'ta_main_custombox',            //メタボックスを囲むdivタグのid属性値
    'TAテーマ001設定',              //メタボックスのタイトル
    'ta_main_custombox_callback',   //メタボックスの内容を表示するコールバック関数名
    'ta_main_fa',                   //ページの種類として'post'、'page'、'link'、'dashboard'、カスタム投稿タイプ名の何れかを指定
    'advanced'                      //メタボックスの種別として'normal'、'advanced'、'side'の何れかを指定（省略時は'advanced')
  );
  //カスタム投稿タイプ(TAサイドFA)カスタムボックス
  add_meta_box(
    'ta_side_custombox',            //メタボックスを囲むdivタグのid属性値
    'TAテーマ001設定',              //メタボックスのタイトル
    'ta_side_custombox_callback',   //メタボックスの内容を表示するコールバック関数名
    'ta_sidebar_fa',                //ページの種類として'post'、'page'、'link'、'dashboard'、カスタム投稿タイプ名の何れかを指定
    'advanced'                      //メタボックスの種別として'normal'、'advanced'、'side'の何れかを指定（省略時は'advanced')
  );
}

//固定ページカスタムボックスのコールバック関数
function ta_page_custombox_callback() {
  include_once( TEMPLATEPATH . '/ta-modules/ta-custombox-modules/ta-page-custombox-callback.php' );
}

//投稿ページカスタムボックスのコールバック関数
function ta_post_custombox_callback() {
  include_once( TEMPLATEPATH . '/ta-modules/ta-custombox-modules/ta-post-custombox-callback.php' );
}

//カスタム投稿タイプ(TAトップFA)カスタムボックスのコールバック関数
function ta_main_custombox_callback() {
  include_once( TEMPLATEPATH . '/ta-modules/ta-custombox-modules/ta-main-custombox-callback.php' );
}

//カスタム投稿タイプ(TAサイドFA)カスタムボックスのコールバック関数
function ta_side_custombox_callback() {
  include_once( TEMPLATEPATH . '/ta-modules/ta-custombox-modules/ta-side-custombox-callback.php' );
}


/********* カスタム投稿ページを無効化（404化）*********/
add_action( 'template_redirect', 'ta_custompost_to_404' );
function ta_custompost_to_404() {
  if ( is_singular( array( 'ta_header_fa', 'ta_exp_fa', 'ta_main_fa', 'ta_sidebar_fa', 'ta_sidebarsub_fa', 'ta_footer_fa', 'ta_endroll_fa' ) ) ) {
    global $wp_query;
    $wp_query->set_404();
    status_header( 404 );
  }
}


/********* カスタムフィールドに保存 *********/
add_action( 'save_post', 'ta_save_post' );
function ta_save_post( $post_id ) {
  include_once( TEMPLATEPATH . '/ta-modules/ta-save-post.php' );
}


/********* 固定ページでquery_postsが上手く行かないバグの対策 *********/
add_action( 'parse_query', 'my_parse_query' );
function my_parse_query( $query ) {
  if ( !isset( $query->query_vars['paged'] ) && isset( $query->query_vars['page'] ) )
    $query->query_vars['paged'] = $query->query_vars['page'];
}


/********* ダッシュボードウィジェット *********/
add_action( 'wp_dashboard_setup', 'ta_dashboard_info_insert' );
function ta_dashboard_info_insert() {
  global $wp_meta_boxes;
  wp_add_dashboard_widget( 'ta_dashboard_info', 'TAテーマ001', 'ta_dashboard_info_contents' );
}
function ta_dashboard_info_contents() { ?>
  <p>お使いのTAテーマ001はVersion <?php echo TATHEME001; ?>です。</p>
  <div style="display:inline-block;width:100%;vertical-align:bottom;">
    <a style="float:left;" href="http://theme001.tec-aid.com/" target="_blank">TAテーマ001公式サイト</a>
    <a style="float:right;" href="http://tec-aid.com/" target="_blank"><img width=100 alt="tec-aid" src="<?php echo get_template_directory_uri(); ?>/images/ta-admin-images/ta-menu-talink3.png" /></a>
  </div>
<?php
}


/********* ユーザーエージェント *********/
function ta_mobile_tablet( $mode ) {
  $ta_ua = mb_strtolower( $_SERVER['HTTP_USER_AGENT'] );
  if ( strpos( $ta_ua, 'iphone' ) !== false ) {
    $device_name = 'iphone';
    $device_cat = 'mobile';
  } else if ( strpos( $ta_ua, 'ipod' ) !== false ) {
    $device_name = 'ipod';
    $device_cat = 'mobile';
  } else if ( ( strpos( $ta_ua, 'android' ) !== false ) && ( strpos( $ta_ua, 'mobile' ) !== false ) ) {
    $device_name = 'android_phone';
    $device_cat = 'mobile';
  } else if ( ( strpos( $ta_ua, 'windows' ) !== false ) && ( strpos( $ta_ua, 'phone' ) !== false ) ) {
    $device_name = 'windows_phone';
    $device_cat = 'mobile';
  } else if ( ( strpos( $ta_ua, 'firefox' ) !== false ) && ( strpos( $ta_ua, 'mobile' ) !== false ) ) {
    $device_name = 'firefox_phone';
    $device_cat = 'mobile';
  } else if ( strpos( $ta_ua, 'blackberry' ) !== false ) {
    $device_name = 'blackberry';
    $device_cat = 'mobile';
  } else if ( strpos( $ta_ua, 'ipad' ) !== false ) {
    $device_name = 'ipad';
    $device_cat = 'tablet';
  } else if ( ( strpos( $ta_ua, 'windows' ) !== false ) && ( strpos( $ta_ua, 'touch' ) !== false && ( strpos( $ta_ua, 'tablet pc' ) == false ) ) ) {
    $device_name = 'windows_tablet';
    $device_cat = 'tablet';
  } else if ( ( strpos( $ta_ua, 'android' ) !== false ) && ( strpos( $ta_ua, 'mobile' ) === false ) ) {
    $device_name = 'android_tablet';
    $device_cat = 'tablet';
  } else if ( ( strpos( $ta_ua, 'firefox' ) !== false ) && ( strpos( $ta_ua, 'tablet' ) !== false ) ) {
    $device_name = 'firefox_tablet';
    $device_cat = 'tablet';
  } else if ( ( strpos( $ta_ua, 'kindle' ) !== false ) || ( strpos( $ta_ua, 'silk' ) !== false ) ) {
    $device_name = 'kindle';
    $device_cat = 'tablet';
  } else if ( ( strpos( $ta_ua, 'playbook' ) !== false ) ) {
    $device_name = 'playbook';
    $device_cat = 'tablet';
  } else {
    $device_name = 'others';
    $device_cat = 'others';
  }
  if ( 'name' == $mode ) {
    return $device_name;
  } else {
    return $device_cat;
  }
}


/********* 管理画面アクセス制限 *********/
add_action( 'auth_redirect', 'ta_adminpage_access_limit' );
function ta_adminpage_access_limit( $user_id ) {
  $user = get_userdata( $user_id );
  $limited_user = ta_read_op( 'ta_common_adminpage_limit' );
  if ( ! $user->has_cap( $limited_user ) ) {
    wp_redirect( get_home_url() );
    exit();
  }
}

//ツールバー（admin bar）表示
add_action( 'after_setup_theme', 'ta_adminpage_access_limit_hide_bar' );
function ta_adminpage_access_limit_hide_bar() {
  $var_onoff = ta_read_op( 'ta_common_adminpage_limit_bar_onoff' );
  $user = wp_get_current_user();
  $limited_user = ta_read_op( 'ta_common_adminpage_limit' );
  if ( 'valid' == $var_onoff && isset( $user->data ) && ! $user->has_cap( $limited_user ) ) {
    show_admin_bar( false );
  }
}
