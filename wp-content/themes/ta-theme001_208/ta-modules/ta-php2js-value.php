<?php
/*******************************************************************************************************/
/*
/* テックエイドの成長する自作ホームページWordPressテーマ『 TAテーマ001 (ta-theme001) 』
/*
/* ta-php2js-value.php: ( Latest Version 2.01 2017.03.11 )
/*
/* このプログラムの著作権、使用権、その他全ての権利はde集まれ株式会社に属します。
/* The copyright, royalty and all the other rights of this program belong to deatsumare Corporation.
/*
/* File Version 履歴
/* File Version 2.00 2016.02.20: first edition by Kotaro Kashiwamura.
/* File Version 2.01 2017.03.11: ダイジェスト記事のリンク時の新規ウィンドウ設定追加 by Kotaro Kashiwamura.
/*
/*******************************************************************************************************/

/******************************************************/
/*  TAフォーマット・共通設定メニュー
/******************************************************/
/******************* フレーム *******************/
//***** iPad, iPhoneの判別
$ta_device_name = ta_mobile_tablet( 'name' );

//***** フレームタイプ
$ta_common_frame_size_check_onoff = ta_read_op( 'ta_common_frame_size_check_onoff' );
$common_frame_type = ta_read_op( 'ta_common_frame_type' );
if ( is_front_page() ) {
  $top_frame_type = ta_read_op( 'ta_top_frame_type' );
  if( "common_style" == $top_frame_type ) {
    $frame_type = $common_frame_type;
  } else {
    $frame_type = $top_frame_type;
  }
  $current_page = "front";
} else if ( is_page() || is_single() ) {
  $post_frame_type = ta_read_post( get_the_ID(), 'ta_post_frame_type' );
  if( "common_style" == $post_frame_type ) {
    $frame_type = $common_frame_type;
  } else {
    $frame_type = $post_frame_type;
  }
  if ( is_page() ) {
    $current_page = "page";
  } else {
    $current_page = "single";
  }
} else {
  $frame_type = $common_frame_type;
  $current_page = "archive";
}

//***** フレームサイズ
//ホームページフレームの幅（ピクセル）: #headerのwidthの値
$header_width = ta_read_op( 'ta_common_frame_width' );
//ラップの幅（ピクセル）: #wrapのwidthの値
$wrap_add = ta_read_op( 'ta_common_wrap_add_width' );
$wrap_width   = $header_width + $wrap_add;
//サイドバーの幅（％）: #sidebarのwidthの値
$sidebar_width_ratio = ta_read_op( 'ta_common_sidebar_width' );
$sidebar_width = floor( $header_width * $sidebar_width_ratio / 100 );  //小数点以下を切り捨て
//サブサイドバーの幅（％）: #sidebarsubのwidthの値
$sidebarsub_width_ratio = ta_read_op( 'ta_common_sidebarsub_width' );
$sidebarsub_width = floor( $header_width * $sidebarsub_width_ratio / 100 );  //小数点以下を切り捨て
//メインコンテンツ間の右余白幅（％）: #mainのmargin-rightの値
$mainright_margin_ratio = ta_read_op( 'ta_common_mainright_margin' );
$mainright_margin = floor( $header_width * $mainright_margin_ratio / 100 );  //小数点以下を切り捨て
//メインコンテンツ間の左余白幅（％）: #mainのmargin-leftの値
$mainleft_margin_ratio = ta_read_op( 'ta_common_mainleft_margin' );
$mainleft_margin = floor( $header_width * $mainleft_margin_ratio / 100 );  //小数点以下を切り捨て
//背景がある場合のコンテンツエリアの枠幅: #mainのwidth, paddingの値
$ta_main_frame_padding = ta_read_op( 'ta_main_frame_padding' );


/******************* SMO *******************/
//***** SNSボタン
//ヘッダーに表示させるSNSボタンの選択
$header_sns_array = ta_read_op( 'ta_common_smo_header_display_sns' );
$header_sns_twitter = 'off';
$header_sns_hatebu = 'off';
$header_sns_gplus = 'off';
$header_sns_facebook = 'off';
foreach ( (array)$header_sns_array as $name ) {
  if ( "twitter" == $name ) $header_sns_twitter = 'on';
  if ( "hatebu" == $name ) $header_sns_hatebu = 'on';
  if ( "gplus" == $name ) $header_sns_gplus = 'on';
  if ( "facebook" == $name ) $header_sns_facebook = 'on';
}

//メインコンテンツに表示させるSNSボタンの選択
$main_sns_array = ta_read_op( 'ta_common_smo_main_display_sns' );
$main_sns_twitter = 'off';
$main_sns_hatebu = 'off';
$main_sns_gplus = 'off';
$main_sns_facebook = 'off';
foreach ( (array)$main_sns_array as $name ) {
  if ( "twitter" == $name ) $main_sns_twitter = 'on';
  if ( "hatebu" == $name ) $main_sns_hatebu = 'on';
  if ( "gplus" == $name ) $main_sns_gplus = 'on';
  if ( "facebook" == $name ) $main_sns_facebook = 'on';
}

/******************* 装飾・小物 *******************/
//***** バックトゥートップスクロール
//コンテンツから独立させて位置を固定
$ta_common_back2top_text_fixed_onoff = ta_read_op( 'ta_common_back2top_text_fixed_onoff' );
//表示が有効になるトップからのスクロール総量
$ta_common_back2top_fm_top_amount = ta_read_op( 'ta_common_back2top_fm_top_amount' );


/******************************************************/
/*  TAフォーマット・ヘッダー設定メニュー
/******************************************************/
/******************* フレーム *******************/
//***** ヘッダーバナーエリアのサイズ
$ta_header_size_check = ta_read_op( 'ta_header_size_check' );
$ta_header_logoimgarea_off = ( 'no_image' == ta_read_op( 'ta_header_logo_pic' ) && 'no_disp' == ta_read_op( 'ta_header_logo_text' ) );
$ta_header_infoimgarea_off = ( 'no_image' == ta_read_op( 'ta_header_info_pic' ) && 'no_disp' == ta_read_op( 'ta_header_info_text' ) );
if ( TA_HIEND_PI ) {
  $ta_header_bannerarea2wrap_onoff = ta_read_op( 'ta_header_bannerarea2wrap_onoff' );
} else {
  $ta_header_bannerarea2wrap_onoff = "invalid";
}

/******************* グローバル（ヘッダー）メニュー *******************/
//***** サブメニューの幅（メインメニュー比）
$ta_header_glabalsubmenu_width = ta_read_op( 'ta_header_glabalsubmenu_width' );


/******************************************************/
/*  TAフォーマット・サイドバー・サブサイドバー設定メニュー
/******************************************************/
/******************* フレーム *******************/
if ( TA_HIEND_PI ) {
  $ta_sidebar_frame_arrange_height_onoff = ta_read_op( 'ta_sidebar_frame_arrange_height_onoff' );
  $ta_sidebarsub_frame_arrange_height_onoff = ta_read_op( 'ta_sidebarsub_frame_arrange_height_onoff' );
} else {
  $ta_sidebar_frame_arrange_height_onoff = "invalid";
  $ta_sidebarsub_frame_arrange_height_onoff = "invalid";
}
if ( TA_HIEND_PI ) {
  $ta_common_side2wrap_onoff = ta_read_op( 'ta_common_side2wrap_onoff' );
} else {
  $ta_common_side2wrap_onoff = "invalid";
}
$ta_common_sidebar2wrap_top_distance = ta_read_op( 'ta_common_sidebar2wrap_top_distance' );
$ta_common_side2wrap_fixed_onoff = ta_read_op( 'ta_common_side2wrap_fixed_onoff' );
$ta_common_sidebarsub2wrap_top_distance = ta_read_op( 'ta_common_sidebarsub2wrap_top_distance' );
$ta_common_sidesub2wrap_fixed_onoff = ta_read_op( 'ta_common_sidesub2wrap_fixed_onoff' );


/******************************************************/
/*  TAフォーマット・フッター設定メニュー
/******************************************************/
/******************* 各ブロック設定 *******************/
//***** フッター各ブロック設定
$ta_footer_block_size_check = ta_read_op( 'ta_footer_block_size_check' );
if ( TA_HIEND_PI ) {
  $ta_footer_container2main_onoff = ta_read_op( 'ta_footer_container2main_onoff' );
} else {
  $ta_footer_container2main_onoff = "invalid";
}


/******************************************************/
/*  ダイジェスト記事のリンク時の新規ウィンドウ設定
/******************************************************/
$ta_common_listpage_newwin_onoff = ta_read_op( 'ta_common_listpage_newwin_onoff' );
$ta_top_latestposts_newwin_onoff = ta_read_op( 'ta_top_latestposts_newwin_onoff' );
$ta_sidebar_postdigest_newwin_onoff = ta_read_op( 'ta_sidebar_postdigest_newwin_onoff' );
if ( TA_HIEND_PI ) {
  $ta_top_postdigest_newwin_onoff = ta_read_op( 'ta_top_postdigest_newwin_onoff' );
  $ta_sidebar_latestposts_newwin_onoff = ta_read_op( 'ta_sidebar_latestposts_newwin_onoff' );
  $ta_sidebarsub_latestposts_newwin_onoff = ta_read_op( 'ta_sidebarsub_latestposts_newwin_onoff' );
  $ta_sidebarsub_postdigest_newwin_onoff = ta_read_op( 'ta_sidebarsub_postdigest_newwin_onoff' );
} else {
  $ta_top_postdigest_newwin_onoff = "invalid";
  $ta_sidebar_latestposts_newwin_onoff = "invalid";
  $ta_sidebarsub_latestposts_newwin_onoff = "invalid";
  $ta_sidebarsub_postdigest_newwin_onoff = "invalid";
}


/******************************************************/
/*  ヘッドライン・装飾のリンク時の新規ウィンドウ設定
/******************************************************/
$ta_main_headline_h2_newwin_onoff = ta_read_op( 'ta_main_headline_h2_newwin_onoff' );
$ta_main_headline_h3_newwin_onoff = ta_read_op( 'ta_main_headline_h3_newwin_onoff' );
$ta_main_headline_h4_newwin_onoff = ta_read_op( 'ta_main_headline_h4_newwin_onoff' );
$ta_main_headline_h5_newwin_onoff = ta_read_op( 'ta_main_headline_h5_newwin_onoff' );
$ta_sidebar_headline_h2_newwin_onoff = ta_newwin_setting_php2js( 'ta_sidebar_headline_h2' );
$ta_sidebar_headline_h3_newwin_onoff = ta_newwin_setting_php2js( 'ta_sidebar_headline_h3' );
$ta_sidebar_headline_h4_newwin_onoff = ta_newwin_setting_php2js( 'ta_sidebar_headline_h4' );
$ta_sidebar_headline_h5_newwin_onoff = ta_newwin_setting_php2js( 'ta_sidebar_headline_h5' );
$ta_sidebarsub_headline_h2_newwin_onoff = ta_newwin_setting_php2js( 'ta_sidebarsub_headline_h2' );
$ta_sidebarsub_headline_h3_newwin_onoff = ta_newwin_setting_php2js( 'ta_sidebarsub_headline_h3' );
$ta_sidebarsub_headline_h4_newwin_onoff = ta_newwin_setting_php2js( 'ta_sidebarsub_headline_h4' );
$ta_sidebarsub_headline_h5_newwin_onoff = ta_newwin_setting_php2js( 'ta_sidebarsub_headline_h5' );
$ta_footer_headline_h2_newwin_onoff = ta_newwin_setting_php2js( 'ta_footer_headline_h2' );
$ta_footer_headline_h3_newwin_onoff = ta_newwin_setting_php2js( 'ta_footer_headline_h3' );
$ta_footer_headline_h4_newwin_onoff = ta_newwin_setting_php2js( 'ta_footer_headline_h4' );
$ta_footer_headline_h5_newwin_onoff = ta_newwin_setting_php2js( 'ta_footer_headline_h5' );
if ( TA_HIEND_PI ) {
  $ta_main_deco1_newwin_onoff = ta_read_op( 'ta_main_deco1_newwin_onoff' );
  $ta_main_deco2_newwin_onoff = ta_read_op( 'ta_main_deco2_newwin_onoff' );
  $ta_main_deco3_newwin_onoff = ta_read_op( 'ta_main_deco3_newwin_onoff' );
  $ta_main_deco4_newwin_onoff = ta_read_op( 'ta_main_deco4_newwin_onoff' );
  $ta_sidebar_deco1_newwin_onoff = ta_newwin_setting_php2js( 'ta_sidebar_deco1' );
  $ta_sidebar_deco2_newwin_onoff = ta_newwin_setting_php2js( 'ta_sidebar_deco2' );
  $ta_sidebar_deco3_newwin_onoff = ta_newwin_setting_php2js( 'ta_sidebar_deco3' );
  $ta_sidebar_deco4_newwin_onoff = ta_newwin_setting_php2js( 'ta_sidebar_deco4' );
} else {
  $ta_main_deco1_newwin_onoff = "invalid";
  $ta_main_deco2_newwin_onoff = "invalid";
  $ta_main_deco3_newwin_onoff = "invalid";
  $ta_main_deco4_newwin_onoff = "invalid";
  $ta_sidebar_deco1_newwin_onoff = "invalid";
  $ta_sidebar_deco2_newwin_onoff = "invalid";
  $ta_sidebar_deco3_newwin_onoff = "invalid";
  $ta_sidebar_deco4_newwin_onoff = "invalid";
}


/******************* JavaScript変数生成 *******************/
echo '    <script type="text/javascript">
      <!--
      var ta_device_name = "' . $ta_device_name . '";
      var ta_common_frame_size_check_onoff = "' . $ta_common_frame_size_check_onoff . '";
      var frame_type = "' . $frame_type . '";
      var current_page = "' . $current_page . '";
      var header_width = "' . $header_width . '";
      var wrap_width = "' . $wrap_width . '";
      var sidebar_width = "' . $sidebar_width . '";
      var sidebarsub_width = "' . $sidebarsub_width . '";
      var mainright_margin = "' . $mainright_margin . '";
      var mainleft_margin = "' . $mainleft_margin . '";
      var ta_main_frame_padding = "' . $ta_main_frame_padding . '";
      var header_sns_twitter = "' . $header_sns_twitter . '";
      var header_sns_hatebu = "' . $header_sns_hatebu . '";
      var header_sns_gplus = "' . $header_sns_gplus . '";
      var header_sns_facebook = "' . $header_sns_facebook . '";
      var main_sns_twitter = "' . $main_sns_twitter . '";
      var main_sns_hatebu = "' . $main_sns_hatebu . '";
      var main_sns_gplus = "' . $main_sns_gplus . '";
      var main_sns_facebook = "' . $main_sns_facebook . '";
      var ta_common_back2top_text_fixed_onoff = "' . $ta_common_back2top_text_fixed_onoff . '";
      var ta_common_back2top_fm_top_amount = "' . $ta_common_back2top_fm_top_amount . '";
      var ta_header_size_check = "' . $ta_header_size_check . '";
      var ta_header_logoimgarea_off = "' . $ta_header_logoimgarea_off . '";
      var ta_header_infoimgarea_off = "' . $ta_header_infoimgarea_off . '";
      var ta_header_bannerarea2wrap_onoff = "' . $ta_header_bannerarea2wrap_onoff . '";
      var ta_header_glabalsubmenu_width = "' . $ta_header_glabalsubmenu_width . '";
      var ta_sidebar_frame_arrange_height_onoff = "' . $ta_sidebar_frame_arrange_height_onoff . '";
      var ta_sidebarsub_frame_arrange_height_onoff = "' . $ta_sidebarsub_frame_arrange_height_onoff . '";
      var ta_common_side2wrap_onoff = "' . $ta_common_side2wrap_onoff . '";
      var ta_common_sidebar2wrap_top_distance = "' . $ta_common_sidebar2wrap_top_distance . '";
      var ta_common_side2wrap_fixed_onoff = "' . $ta_common_side2wrap_fixed_onoff . '";
      var ta_common_sidebarsub2wrap_top_distance = "' . $ta_common_sidebarsub2wrap_top_distance . '";
      var ta_common_sidesub2wrap_fixed_onoff = "' . $ta_common_sidesub2wrap_fixed_onoff . '";
      var ta_footer_block_size_check = "' . $ta_footer_block_size_check . '";
      var ta_footer_container2main_onoff = "' . $ta_footer_container2main_onoff . '";
      var ta_common_listpage_newwin_onoff = "' . $ta_common_listpage_newwin_onoff . '";
      var ta_top_latestposts_newwin_onoff = "' . $ta_top_latestposts_newwin_onoff . '";
      var ta_top_postdigest_newwin_onoff = "' . $ta_top_postdigest_newwin_onoff . '";
      var ta_sidebar_latestposts_newwin_onoff = "' . $ta_sidebar_latestposts_newwin_onoff . '";
      var ta_sidebar_postdigest_newwin_onoff = "' . $ta_sidebar_postdigest_newwin_onoff . '";
      var ta_sidebarsub_latestposts_newwin_onoff = "' . $ta_sidebarsub_latestposts_newwin_onoff . '";
      var ta_sidebarsub_postdigest_newwin_onoff = "' . $ta_sidebarsub_postdigest_newwin_onoff . '";
      var ta_main_headline_h2_newwin_onoff = "' . $ta_main_headline_h2_newwin_onoff . '";
      var ta_main_headline_h3_newwin_onoff = "' . $ta_main_headline_h3_newwin_onoff . '";
      var ta_main_headline_h4_newwin_onoff = "' . $ta_main_headline_h4_newwin_onoff . '";
      var ta_main_headline_h5_newwin_onoff = "' . $ta_main_headline_h5_newwin_onoff . '";
      var ta_sidebar_headline_h2_newwin_onoff = "' . $ta_sidebar_headline_h2_newwin_onoff . '";
      var ta_sidebar_headline_h3_newwin_onoff = "' . $ta_sidebar_headline_h3_newwin_onoff . '";
      var ta_sidebar_headline_h4_newwin_onoff = "' . $ta_sidebar_headline_h4_newwin_onoff . '";
      var ta_sidebar_headline_h5_newwin_onoff = "' . $ta_sidebar_headline_h5_newwin_onoff . '";
      var ta_sidebarsub_headline_h2_newwin_onoff = "' . $ta_sidebarsub_headline_h2_newwin_onoff . '";
      var ta_sidebarsub_headline_h3_newwin_onoff = "' . $ta_sidebarsub_headline_h3_newwin_onoff . '";
      var ta_sidebarsub_headline_h4_newwin_onoff = "' . $ta_sidebarsub_headline_h4_newwin_onoff . '";
      var ta_sidebarsub_headline_h5_newwin_onoff = "' . $ta_sidebarsub_headline_h5_newwin_onoff . '";
      var ta_footer_headline_h2_newwin_onoff = "' . $ta_footer_headline_h2_newwin_onoff . '";
      var ta_footer_headline_h3_newwin_onoff = "' . $ta_footer_headline_h3_newwin_onoff . '";
      var ta_footer_headline_h4_newwin_onoff = "' . $ta_footer_headline_h4_newwin_onoff . '";
      var ta_footer_headline_h5_newwin_onoff = "' . $ta_footer_headline_h5_newwin_onoff . '";
      var ta_main_deco1_newwin_onoff = "' . $ta_main_deco1_newwin_onoff . '";
      var ta_main_deco2_newwin_onoff = "' . $ta_main_deco2_newwin_onoff . '";
      var ta_main_deco3_newwin_onoff = "' . $ta_main_deco3_newwin_onoff . '";
      var ta_main_deco4_newwin_onoff = "' . $ta_main_deco4_newwin_onoff . '";
      var ta_sidebar_deco1_newwin_onoff = "' . $ta_sidebar_deco1_newwin_onoff . '";
      var ta_sidebar_deco2_newwin_onoff = "' . $ta_sidebar_deco2_newwin_onoff . '";
      var ta_sidebar_deco3_newwin_onoff = "' . $ta_sidebar_deco3_newwin_onoff . '";
      var ta_sidebar_deco4_newwin_onoff = "' . $ta_sidebar_deco4_newwin_onoff . '";
      //-->
    </script>';
