<?php
/*****************************************************************************************************************/
/*
/* テックエイドの成長する自作ホームページWordPressテーマ『 TAテーマ001 (ta-theme001) 』
/*
/* ta-dynamic-php2css.php: ( Latest Version 2.06 2017.04.11  )
/*
/* このプログラムの著作権、使用権、その他全ての権利はde集まれ株式会社に属します。
/* The copyright, royalty and all the other rights of this program belong to deatsumare Corporation.
/*
/* File Version 履歴
/* File Version 2.00 2016.03.07: first edition by Kotaro Kashiwamura.
/* File Version 2.01 2016.03.14: ta_sidebar_postdigest_catlink_title_underline_onoff記述ミス修正
/*                               ロゴ、連絡エリア画像の高さ調整変更 by Kotaro Kashiwamura.
/* File Version 2.02 2016.05.08: bodyhome_bg_img_url, body_bg_img_url, ta_footer_frame_pic,
/*                               ta_responsible_footer_frame_picを'built_in'付タイプに修正 by Kotaro Kashiwamura.
/* File Version 2.03 2016.06.19: レスポンシブデザイン専用ヘッドラインの追加
/*                               メインとサイドバーに装飾1～4の追加
/*                               ロゴエリア・連絡先エリアのコンテンツ表示方法追加
/*                               ブラウザ全幅モード時のフレーム外ヘッダーバナーエリア幅の修正 by Kotaro Kashiwamura.
/* File Version 2.04 2016.08.26: #header-globalnavi-image-container, #container修正、
/*                               共通パラグラフ設定に高さと左右マージン追加、レスポンシブ有効制限のバグ修正、
/*                               $ta_responsible_additional_logoarea_onoff削除
/*                               メインパラグラフ設定追加、h1表記修正、共通フォントにhover下線表示追加、
/*                               パンくずナビ修正、トップキャッチテキスト装飾追加 by Kotaro Kashiwamura.
/* File Version 2.05 2017.03.12: メイン・（サブ）サイドバー区切り線追加
/*                               背景色グラデーション、背景バー追加、#body-wrapバグ修正
/*                               #ta_backto_top記述変更、z-index修正、色選択修正
/*                               bloginfo修正 by Kotaro Kashiwamura.
/* File Version 2.06 2017.04.11: 体裁調整、フッター画像幅修正、メインとフッター間隔修正 by Kotaro Kashiwamura.
/*
/*****************************************************************************************************************/
require_once( TEMPLATEPATH . '/ta-modules/ta-functions-modules/ta-css-functions.php' );
if ( TA_HIEND_PI ) { require_once( TA_HIEND_PI_DIR . '/general-modules/ta-theme001-highend-css.php' ); }
function ta_dynamic_css_create() {
  ob_start(); //バッファリング開始 ?>
@charset "UTF-8";

/******************************************************/
/*  このCSSファイルは自動的に生成されています。
/*  設定を変更すると上書きされますのでご注意ください。
/*
/*          de集まれ株式会社　技術支援(テックエイド)部
/******************************************************/



/******************************************************/
/*  TAフォーマット・PHP to CSS・レイアウト
/******************************************************/

/******************* レイアウト *******************/
<?php
  //***** フレームタイプ
  $ta_common_frame_type = ta_read_op( 'ta_common_frame_type' );
  $frame_type = $ta_common_frame_type;
  //***** フレームサイズ
  $header_width = ta_read_op( 'ta_common_frame_width' );
  $wrap_add = ta_read_op( 'ta_common_wrap_add_width' );
  $wrap_width   = $header_width + $wrap_add;
  $sidebar_width_ratio = ta_read_op( 'ta_common_sidebar_width' );
  $sidebar_width = floor( $header_width * $sidebar_width_ratio / 100 );  //小数点以下を切り捨て
  $sidebarsub_width_ratio = ta_read_op( 'ta_common_sidebarsub_width' );
  $sidebarsub_width = floor( $header_width * $sidebarsub_width_ratio / 100 );  //小数点以下を切り捨て
  $mainright_margin_ratio = ta_read_op( 'ta_common_mainright_margin' );
  $mainright_margin = floor( $header_width * $mainright_margin_ratio / 100 );  //小数点以下を切り捨て
  $mainleft_margin_ratio = ta_read_op( 'ta_common_mainleft_margin' );
  $mainleft_margin = floor( $header_width * $mainleft_margin_ratio / 100 );  //小数点以下を切り捨て
  $ta_main_frame_padding = ta_read_op( 'ta_main_frame_padding' );
  $ta_sidebar_frame_padding = ta_read_op( 'ta_sidebar_frame_padding' );
  $ta_sidebarsub_frame_padding = ta_read_op( 'ta_sidebarsub_frame_padding' );

  //***** コンテンツフレーム位置
  $ta_common_container_paddingtop = ta_read_op( 'ta_common_container_paddingtop' );
  $ta_common_body_wrap_marginbottom_select = ta_read_op( 'ta_common_body_wrap_marginbottom_select' );
  $ta_common_body_wrap_marginbottom = ta_read_op( 'ta_common_body_wrap_marginbottom' );

  /******************* イメージカラー *******************/
  $ta_common_site_bg_color = ta_read_op( 'ta_common_site_bg_color' );
  $ta_common_site_hl_color = ta_read_op( 'ta_common_site_hl_color' );
  $ta_common_site_text_on_bg_color = ta_read_op( 'ta_common_site_text_on_bg_color' );
  $ta_common_site_text_on_hl_color = ta_read_op( 'ta_common_site_text_on_hl_color' );

  /******************* 基本背景 *******************/
  $bodyhome_bg_color = ta_select_color_w_image_color( 'ta_common_top_outframe_color' );
  if ( TA_HIEND_PI ) {
    $ta_common_top_outframe_grad_onoff = ta_read_op( 'ta_common_top_outframe_color_grad_onoff' );
  } else {
    $ta_common_top_outframe_grad_onoff = "invalid";
  }
  $bodyhome_bg_img_url = ta_read_op_builtin_img( 'ta_common_top_outframe_pic' );
  $bodyhome_bg_img_rule = ta_read_op( 'ta_common_top_outframe_pic_rule' );
  $bodyhome_bg_img_margin = ta_read_op( 'ta_common_top_outframe_pic_margin' );
  $bodyhome_bg_img2_url = ta_read_op( 'ta_common_top_outframe_pic2' );
  $bodyhome_bg_img2_rule = ta_read_op( 'ta_common_top_outframe_pic2_rule' );
  $bodyhome_bg_img2_margin = ta_read_op( 'ta_common_top_outframe_pic2_margin' );
  $ta_common_top_outframe_bar_top_onoff = ta_read_op( 'ta_common_top_outframe_bar_top_onoff' );
  $ta_common_top_outframe_bar_top_width = ta_read_op( 'ta_common_top_outframe_bar_top_width' );
  $ta_common_top_outframe_bar_top_color = ta_select_color_w_image_color( 'ta_common_top_outframe_bar_top_color' );
  if ( TA_HIEND_PI ) {
    $ta_common_top_outframe_bar_top_grad_onoff = ta_read_op( 'ta_common_top_outframe_bar_top_color_grad_onoff' );
  } else {
    $ta_common_top_outframe_bar_top_grad_onoff = "invalid";
  }
  $ta_common_top_outframe_bar_bottom_onoff = ta_read_op( 'ta_common_top_outframe_bar_bottom_onoff' );
  $ta_common_top_outframe_bar_bottom_width = ta_read_op( 'ta_common_top_outframe_bar_bottom_width' );
  $ta_common_top_outframe_bar_bottom_color = ta_select_color_w_image_color( 'ta_common_top_outframe_bar_bottom_color' );
  if ( TA_HIEND_PI ) {
    $ta_common_top_outframe_bar_bottom_grad_onoff = ta_read_op( 'ta_common_top_outframe_bar_bottom_color_grad_onoff' );
  } else {
    $ta_common_top_outframe_bar_bottom_grad_onoff = "invalid";
  }
  $ta_common_top_outframe_bar_gmenu_onoff = ta_read_op( 'ta_common_top_outframe_bar_gmenu_onoff' );
  $ta_common_top_outframe_bar_gmenu_width = ta_read_op( 'ta_common_top_outframe_bar_gmenu_width' );
  $ta_common_top_outframe_bar_gmenu_distance = ta_read_op( 'ta_common_top_outframe_bar_gmenu_distance' );
  $ta_common_top_outframe_bar_gmenu_color = ta_select_color_w_image_color( 'ta_common_top_outframe_bar_gmenu_color' );
  if ( TA_HIEND_PI ) {
    $ta_common_top_outframe_bar_gmenu_grad_onoff = ta_read_op( 'ta_common_top_outframe_bar_gmenu_color_grad_onoff' );
  } else {
    $ta_common_top_outframe_bar_gmenu_grad_onoff = "invalid";
  }
  $ta_common_top_outframe_bar_free_onoff = ta_read_op( 'ta_common_top_outframe_bar_free_onoff' );
  $ta_common_top_outframe_bar_free_width = ta_read_op( 'ta_common_top_outframe_bar_free_width' );
  $ta_common_top_outframe_bar_free_distance = ta_read_op( 'ta_common_top_outframe_bar_free_distance' );
  $ta_common_top_outframe_bar_free_color = ta_select_color_w_image_color( 'ta_common_top_outframe_bar_free_color' );
  if ( TA_HIEND_PI ) {
    $ta_common_top_outframe_bar_free_grad_onoff = ta_read_op( 'ta_common_top_outframe_bar_free_color_grad_onoff' );
  } else {
    $ta_common_top_outframe_bar_free_grad_onoff = "invalid";
  }
  $body_bg_color = ta_select_color_w_image_color( 'ta_common_outframe_color' );
  if ( TA_HIEND_PI ) {
    $ta_common_outframe_grad_onoff = ta_read_op( 'ta_common_outframe_color_grad_onoff' );
  } else {
    $ta_common_outframe_grad_onoff = "invalid";
  }
  $body_bg_img_url = ta_read_op_builtin_img( 'ta_common_outframe_pic' );
  $body_bg_img_rule = ta_read_op( 'ta_common_outframe_pic_rule' );
  $body_bg_img_margin = ta_read_op( 'ta_common_outframe_pic_margin' );
  $body_bg_img2_url = ta_read_op( 'ta_common_outframe_pic2' );
  $body_bg_img2_rule = ta_read_op( 'ta_common_outframe_pic2_rule' );
  $body_bg_img2_margin = ta_read_op( 'ta_common_outframe_pic2_margin' );
  $ta_common_outframe_bar_top_onoff = ta_read_op( 'ta_common_outframe_bar_top_onoff' );
  $ta_common_outframe_bar_top_width = ta_read_op( 'ta_common_outframe_bar_top_width' );
  $ta_common_outframe_bar_top_color = ta_select_color_w_image_color( 'ta_common_outframe_bar_top_color' );
  if ( TA_HIEND_PI ) {
    $ta_common_outframe_bar_top_grad_onoff = ta_read_op( 'ta_common_outframe_bar_top_color_grad_onoff' );
  } else {
    $ta_common_outframe_bar_top_grad_onoff = "invalid";
  }
  $ta_common_outframe_bar_bottom_onoff = ta_read_op( 'ta_common_outframe_bar_bottom_onoff' );
  $ta_common_outframe_bar_bottom_width = ta_read_op( 'ta_common_outframe_bar_bottom_width' );
  $ta_common_outframe_bar_bottom_color = ta_select_color_w_image_color( 'ta_common_outframe_bar_bottom_color' );
  if ( TA_HIEND_PI ) {
    $ta_common_outframe_bar_bottom_grad_onoff = ta_read_op( 'ta_common_outframe_bar_bottom_color_grad_onoff' );
  } else {
    $ta_common_outframe_bar_bottom_grad_onoff = "invalid";
  }
  $ta_common_outframe_bar_gmenu_onoff = ta_read_op( 'ta_common_outframe_bar_gmenu_onoff' );
  $ta_common_outframe_bar_gmenu_width = ta_read_op( 'ta_common_outframe_bar_gmenu_width' );
  $ta_common_outframe_bar_gmenu_distance = ta_read_op( 'ta_common_outframe_bar_gmenu_distance' );
  $ta_common_outframe_bar_gmenu_color = ta_select_color_w_image_color( 'ta_common_outframe_bar_gmenu_color' );
  if ( TA_HIEND_PI ) {
    $ta_common_outframe_bar_gmenu_grad_onoff = ta_read_op( 'ta_common_outframe_bar_gmenu_color_grad_onoff' );
  } else {
    $ta_common_outframe_bar_gmenu_grad_onoff = "invalid";
  }
  $ta_common_outframe_bar_free_onoff = ta_read_op( 'ta_common_outframe_bar_free_onoff' );
  $ta_common_outframe_bar_free_width = ta_read_op( 'ta_common_outframe_bar_free_width' );
  $ta_common_outframe_bar_free_distance = ta_read_op( 'ta_common_outframe_bar_free_distance' );
  $ta_common_outframe_bar_free_color = ta_select_color_w_image_color( 'ta_common_outframe_bar_free_color' );
  if ( TA_HIEND_PI ) {
    $ta_common_outframe_bar_free_grad_onoff = ta_read_op( 'ta_common_outframe_bar_free_color_grad_onoff' );
  } else {
    $ta_common_outframe_bar_free_grad_onoff = "invalid";
  }
  $ta_header_marginbottom = ta_read_op( 'ta_header_marginbottom' );
  if ( TA_HIEND_PI ) {
    $ta_header_bannerarea2wrap_onoff = ta_read_op( 'ta_header_bannerarea2wrap_onoff' );
    $ta_header_bannerarea2wrap_contentpos_onoff = ta_read_op( 'ta_header_bannerarea2wrap_contentpos_onoff' );
  } else {
    $ta_header_bannerarea2wrap_onoff = "invalid";
    $ta_header_bannerarea2wrap_contentpos_onoff = "invalid";
  }
  if ( TA_HIEND_PI ) {
    $ta_common_side2wrap_onoff = ta_read_op( 'ta_common_side2wrap_onoff' );
  } else {
    $ta_common_side2wrap_onoff = "invalid";
  }

  switch ( $frame_type ) {
    case 'main_sidebar':
      //main-sidebarsub
      $main_sidebarsub_float = 'left';
      //main
      $main_float = 'left';
      $main_margin_left = 0;
      $main_margin_right = 0;
      //content
      $cal_main_width = $header_width - $sidebar_width - $mainright_margin - 2 * $ta_main_frame_padding;
      $content_float = 'left';
      $content_padding = $ta_main_frame_padding;
      $content_width = $cal_main_width;
      //sidebar
      $sidebar_container_float = 'right';
      //sidebarsub
      $sidebarsub_container_float = 'left';
      break;
    case 'sidebar_main':
      //main-sidebarsub
      $main_sidebarsub_float = 'right';
      //main
      $main_float = 'right';
      $main_margin_left = 0;
      $main_margin_right = 0;
      //content
      $cal_main_width = $header_width - $sidebar_width - $mainleft_margin - 2 * $ta_main_frame_padding;
      $content_float = 'right';
      $content_padding = $ta_main_frame_padding;
      $content_width = $cal_main_width;
      //sidebar
      $sidebar_container_float = 'left';
      //sidebarsub
      $sidebarsub_container_float = 'left';
      break;
    case 'main_only':
      //main-sidebarsub
      $main_sidebarsub_float = 'left';
      //main
      $main_float = 'left';
      $main_margin_left = 0;
      $main_margin_right = 0;
      //content
      $cal_main_width = $header_width - 2 * $ta_main_frame_padding;
      $content_float = 'left';
      $content_padding = $ta_main_frame_padding;
      $content_width = $cal_main_width;
      //sidebar
      $sidebar_container_float = 'left';
      //sidebarsub
      $sidebarsub_container_float = 'left';
      break;
    case 'sidebarsub_main_sidebar':
      //main-sidebarsub
      $main_sidebarsub_float = 'left';
      //main
      $main_float = 'right';
      $main_margin_left = $mainleft_margin;
      $main_margin_right = $mainright_margin;
      //content
      $cal_main_width = $header_width - $sidebar_width - $sidebarsub_width - $mainleft_margin - $mainright_margin - 2 * $ta_main_frame_padding;
      $content_float = 'left';
      $content_padding = $ta_main_frame_padding;
      $content_width = $cal_main_width;
      //sidebar
      $sidebar_container_float = 'right';
      //sidebarsub
      $sidebarsub_container_float = 'left';
      break;
  }

  switch ( $bodyhome_bg_img_rule ) {
    case 'top_x':
      $bodyhome_repeat = 'repeat-x';
      $bodyhome_position = 'left top ' . $bodyhome_bg_img_margin . 'px';
      break;
    case 'bottom_x':
      $bodyhome_repeat = 'repeat-x';
      $bodyhome_position = 'left bottom ' . $bodyhome_bg_img_margin . 'px';
      break;
    case 'top_only':
      $bodyhome_repeat = 'no-repeat';
      $bodyhome_position = 'center top ' . $bodyhome_bg_img_margin . 'px';
      break;
    case 'bottom_only':
      $bodyhome_repeat = 'no-repeat';
      $bodyhome_position = 'center bottom ' . $bodyhome_bg_img_margin . 'px';
      break;
    case 'x_y':
      $bodyhome_repeat = 'repeat';
      $bodyhome_position = 'left top';
      break;
  }

  switch ( $bodyhome_bg_img2_rule ) {
    case 'top_x':
      $bodyhome2_repeat = 'repeat-x';
      $bodyhome2_position = 'left top ' . $bodyhome_bg_img2_margin . 'px';
      break;
    case 'bottom_x':
      $bodyhome2_repeat = 'repeat-x';
      $bodyhome2_position = 'left bottom ' . $bodyhome_bg_img2_margin . 'px';
      break;
    case 'top_only':
      $bodyhome2_repeat = 'no-repeat';
      $bodyhome2_position = 'center top ' . $bodyhome_bg_img2_margin . 'px';
      break;
    case 'bottom_only':
      $bodyhome2_repeat = 'no-repeat';
      $bodyhome2_position = 'center bottom ' . $bodyhome_bg_img2_margin . 'px';
      break;
    case 'x_y':
      $bodyhome2_repeat = 'repeat';
      $bodyhome2_position = 'left top';
      break;
  }

  switch ( $body_bg_img_rule ) {
    case 'top_x':
      $body_repeat = 'repeat-x';
      $body_position = 'left top ' . $body_bg_img_margin . 'px';
      break;
    case 'bottom_x':
      $body_repeat = 'repeat-x';
      $body_position = 'left bottom ' . $body_bg_img_margin . 'px';
      break;
    case 'top_only':
      $body_repeat = 'no-repeat';
      $body_position = 'center top ' . $body_bg_img_margin . 'px';
      break;
    case 'bottom_only':
      $body_repeat = 'no-repeat';
      $body_position = 'center bottom ' . $body_bg_img_margin . 'px';
      break;
    case 'x_y':
      $body_repeat = 'repeat';
      $body_position = 'left top';
      break;
  }

  switch ( $body_bg_img2_rule ) {
    case 'top_x':
      $body2_repeat = 'repeat-x';
      $body2_position = 'left top ' . $body_bg_img2_margin . 'px';
      break;
    case 'bottom_x':
      $body2_repeat = 'repeat-x';
      $body2_position = 'left bottom ' . $body_bg_img2_margin . 'px';
      break;
    case 'top_only':
      $body2_repeat = 'no-repeat';
      $body2_position = 'center top ' . $body_bg_img2_margin . 'px';
      break;
    case 'bottom_only':
      $body2_repeat = 'no-repeat';
      $body2_position = 'center bottom ' . $body_bg_img2_margin . 'px';
      break;
    case 'x_y':
      $body2_repeat = 'repeat';
      $body2_position = 'left top';
      break;
  }
  if ( TA_HIEND_PI ) {
    $ta_footer_container2main_onoff = ta_read_op( 'ta_footer_container2main_onoff' );
  } else {
    $ta_footer_container2main_onoff = "invalid";
  } ?>

/***** body wrap */
html {
  overflow-y: scroll;
}

#body-wrap {
  position: relative;
  z-index: 10;
<?php
  if ( 'valid' == $ta_header_bannerarea2wrap_onoff && 'valid' == $ta_header_bannerarea2wrap_contentpos_onoff ) { ?>
  margin-top: -<?php echo ta_read_op( 'ta_header_height' ); ?>px;
<?php
  }
  if ( 'valid' != $ta_footer_container2main_onoff && 'all' == $ta_common_body_wrap_marginbottom_select ) { ?>
  padding-bottom: <?php echo $ta_common_body_wrap_marginbottom; ?>px;
<?php
  } ?>
  min-width: <?php echo $wrap_width; ?>px;
<?php
  if ( 'valid' == $ta_common_side2wrap_onoff ) { ?>
  display: inline-block;
  vertical-align: bottom;
<?php
  } ?>
}

body.home #body-wrap {
<?php
  if ( 'invalid' == $ta_common_top_outframe_grad_onoff ) { ?>
  background-color: <?php echo $bodyhome_bg_color; ?>;
<?php
    if ( 'no_image' != $bodyhome_bg_img_url && 'no_image' == $bodyhome_bg_img2_url ) { ?>
  background-image: url("<?php echo $bodyhome_bg_img_url; ?>");
<?php
    } else if ( 'no_image' == $bodyhome_bg_img_url && 'no_image' != $bodyhome_bg_img2_url ) { ?>
  background-image: url("<?php echo $bodyhome_bg_img2_url; ?>");
<?php
    } else if ( 'no_image' != $bodyhome_bg_img_url && 'no_image' != $bodyhome_bg_img2_url ) { ?>
  background-image: url("<?php echo $bodyhome_bg_img_url; ?>"), url("<?php echo $bodyhome_bg_img2_url; ?>");
<?php
    }
  } else {
    ta_gradient_color_style( 'ta_common_top_outframe_color', $bodyhome_bg_img_url, $bodyhome_bg_img2_url );
  }
  if ( 'no_image' != $bodyhome_bg_img_url && 'no_image' == $bodyhome_bg_img2_url ) { ?>
  background-repeat: <?php echo $bodyhome_repeat; ?>;
  background-position: <?php echo $bodyhome_position; ?>;
<?php
  } else if ( 'no_image' == $bodyhome_bg_img_url && 'no_image' != $bodyhome_bg_img2_url ) { ?>
  background-repeat: <?php echo $bodyhome2_repeat; ?>;
  background-position: <?php echo $bodyhome2_position; ?>;
<?php
  } else if ( 'no_image' != $bodyhome_bg_img_url && 'no_image' != $bodyhome_bg_img2_url ) { ?>
  background-repeat: <?php echo $bodyhome_repeat; ?>, <?php echo $bodyhome2_repeat; ?>;
  background-position: <?php echo $bodyhome_position; ?>, <?php echo $bodyhome2_position; ?>;
<?php
  } ?>
}

body:not(.home) #body-wrap {
<?php
  if ( 'invalid' == $ta_common_outframe_grad_onoff ) { ?>
  background-color: <?php echo $body_bg_color; ?>;
<?php
    if ( 'no_image' != $body_bg_img_url && 'no_image' == $body_bg_img2_url ) { ?>
  background-image: url("<?php echo $body_bg_img_url; ?>");
<?php
    } else if ( 'no_image' == $body_bg_img_url && 'no_image' != $body_bg_img2_url ) { ?>
  background-image: url("<?php echo $body_bg_img2_url; ?>");
<?php
    } else if ( 'no_image' != $body_bg_img_url && 'no_image' != $body_bg_img2_url ) { ?>
  background-image: url("<?php echo $body_bg_img_url; ?>"), url("<?php echo $body_bg_img2_url; ?>");
<?php
    }
  } else {
    ta_gradient_color_style( 'ta_common_outframe_color', $body_bg_img_url, $body_bg_img2_url );
  }
  if ( 'no_image' != $body_bg_img_url && 'no_image' == $body_bg_img2_url ) { ?>
  background-repeat: <?php echo $body_repeat; ?>;
  background-position: <?php echo $body_position; ?>;
<?php
  } else if ( 'no_image' == $body_bg_img_url && 'no_image' != $body_bg_img2_url ) { ?>
  background-repeat: <?php echo $body2_repeat; ?>;
  background-position: <?php echo $body2_position; ?>;
<?php
  } else if ( 'no_image' != $body_bg_img_url && 'no_image' != $body_bg_img2_url ) { ?>
  background-repeat: <?php echo $body_repeat; ?>, <?php echo $body2_repeat; ?>;
  background-position: <?php echo $body_position; ?>, <?php echo $body2_position; ?>;
<?php
  } ?>
}

<?php
  if ( 'valid' == $ta_common_top_outframe_bar_top_onoff ) { ?>
body.home #body-wrap #back-top-bar {
  position: absolute;
  top: 0;
  left: 0;
  height: <?php echo $ta_common_top_outframe_bar_top_width; ?>px;
  width: 100%;
  z-index: 11;
<?php
    if ( 'invalid' == $ta_common_top_outframe_bar_top_grad_onoff ) { ?>
  background-color: <?php echo $ta_common_top_outframe_bar_top_color; ?>;
<?php
    } else { 
      ta_gradient_color_style( 'ta_common_top_outframe_bar_top_color' );
    } ?>
}

<?php
  } else { ?>
body.home #body-wrap #back-top-bar {
  display: none;
}

<?php
  }
  if ( 'valid' == $ta_common_top_outframe_bar_bottom_onoff ) {
    if ( 'valid' == $ta_footer_container2main_onoff ) { ?>
body.home #footer-container {
  position: relative;
}

<?php
    } ?>
body.home #footer-container #back-bottom-bar {
  position: absolute;
  bottom: 0;
  left: 0;
  height: <?php echo $ta_common_top_outframe_bar_bottom_width; ?>px;
  width: 100%;
  z-index: 778;
<?php
    if ( 'invalid' == $ta_common_top_outframe_bar_bottom_grad_onoff ) { ?>
  background-color: <?php echo $ta_common_top_outframe_bar_bottom_color; ?>;
<?php
    } else { 
      ta_gradient_color_style( 'ta_common_top_outframe_bar_bottom_color' );
    } ?>
}

body.home #footer-container #footer {
  position: relative;
  z-index: 888;
}

<?php
  } else { ?>
body.home #footer-container #back-bottom-bar {
  display: none;
}

<?php
  }
  if ( 'valid' == $ta_common_top_outframe_bar_gmenu_onoff ) { ?>
body.home #body-wrap #back-gmenu-bar {
  position: absolute;
  top: <?php echo $ta_common_top_outframe_bar_gmenu_distance; ?>px;
  left: 0;
  height: <?php echo $ta_common_top_outframe_bar_gmenu_width; ?>px;
  width: 100%;
  z-index: 11;
<?php
    if ( 'invalid' == $ta_common_top_outframe_bar_gmenu_grad_onoff ) { ?>
  background-color: <?php echo $ta_common_top_outframe_bar_gmenu_color; ?>;
<?php
    } else {
      ta_gradient_color_style( 'ta_common_top_outframe_bar_gmenu_color' );
    } ?>
}

<?php
  } else { ?>
body.home #body-wrap #back-gmenu-bar {
  display: none;
}

<?php
  }
  if ( 'valid' == $ta_common_top_outframe_bar_free_onoff ) { ?>
body.home #body-wrap #back-free-bar {
  position: absolute;
  top: <?php echo $ta_common_top_outframe_bar_free_distance; ?>px;
  left: 0;
  height: <?php echo $ta_common_top_outframe_bar_free_width; ?>px;
  width: 100%;
  z-index: 11;
<?php
    if ( 'invalid' == $ta_common_top_outframe_bar_free_grad_onoff ) { ?>
  background-color: <?php echo $ta_common_top_outframe_bar_free_color; ?>;
<?php
    } else {
      ta_gradient_color_style( 'ta_common_top_outframe_bar_free_color' );
    } ?>
}

<?php
  } else { ?>
body.home #body-wrap #back-free-bar {
  display: none;
}

<?php
  }
  if ( 'valid' == $ta_common_outframe_bar_top_onoff ) { ?>
body:not(.home) #body-wrap #back-top-bar {
  position: absolute;
  top: 0;
  left: 0;
  height: <?php echo $ta_common_outframe_bar_top_width; ?>px;
  width: 100%;
  z-index: 11;
<?php
    if ( 'invalid' == $ta_common_outframe_bar_top_grad_onoff ) { ?>
  background-color: <?php echo $ta_common_outframe_bar_top_color; ?>;
<?php
    } else { 
      ta_gradient_color_style( 'ta_common_outframe_bar_top_color' );
    } ?>
}

<?php
  } else { ?>
body:not(.home) #body-wrap #back-top-bar {
  display: none;
}

<?php
  }
  if ( 'valid' == $ta_common_outframe_bar_bottom_onoff ) {
    if ( 'valid' == $ta_footer_container2main_onoff ) { ?>
body:not(.home) #footer-container {
  position: relative;
}

<?php
    } ?>
body:not(.home) #footer-container #back-bottom-bar {
  position: absolute;
  bottom: 0;
  left: 0;
  height: <?php echo $ta_common_outframe_bar_bottom_width; ?>px;
  width: 100%;
  z-index: 778;
<?php
    if ( 'invalid' == $ta_common_outframe_bar_bottom_grad_onoff ) { ?>
  background-color: <?php echo $ta_common_outframe_bar_bottom_color; ?>;
<?php
    } else { 
      ta_gradient_color_style( 'ta_common_outframe_bar_bottom_color' );
    } ?>
}

body:not(.home) #footer-container #footer {
  position: relative;
  z-index: 888;
}

<?php
  } else { ?>
body:not(.home) #footer-container #back-bottom-bar {
  display: none;
}

<?php
  }
  if ( 'valid' == $ta_common_outframe_bar_gmenu_onoff ) { ?>
body:not(.home) #body-wrap #back-gmenu-bar {
  position: absolute;
  top: <?php echo $ta_common_outframe_bar_gmenu_distance; ?>px;
  left: 0;
  height: <?php echo $ta_common_outframe_bar_gmenu_width; ?>px;
  width: 100%;
  z-index: 11;
<?php
    if ( 'invalid' == $ta_common_outframe_bar_gmenu_grad_onoff ) { ?>
  background-color: <?php echo $ta_common_outframe_bar_gmenu_color; ?>;
<?php
    } else {
      ta_gradient_color_style( 'ta_common_outframe_bar_gmenu_color' );
    } ?>
}

<?php
  } else { ?>
body:not(.home) #body-wrap #back-gmenu-bar {
  display: none;
}

<?php
  }
  if ( 'valid' == $ta_common_outframe_bar_free_onoff ) { ?>
body:not(.home) #body-wrap #back-free-bar {
  position: absolute;
  top: <?php echo $ta_common_outframe_bar_free_distance; ?>px;
  left: 0;
  height: <?php echo $ta_common_outframe_bar_free_width; ?>px;
  width: 100%;
  z-index: 11;
<?php
    if ( 'invalid' == $ta_common_outframe_bar_free_grad_onoff ) { ?>
  background-color: <?php echo $ta_common_outframe_bar_free_color; ?>;
<?php
    } else {
      ta_gradient_color_style( 'ta_common_outframe_bar_free_color' );
    } ?>
}

<?php
  } else { ?>
body:not(.home) #body-wrap #back-free-bar {
  display: none;
}

<?php
  } ?>

#wrap {
  width: <?php echo $wrap_width; ?>px;
  margin: 0 auto;
  overflow: hidden;
  position: relative;
  z-index: 100;
}

/***** ヘッダー */
#header {
<?php
  if ( 'valid' == $ta_common_side2wrap_onoff ) { ?>
  width: 100%;
  padding: 0;
<?php
  } else { ?>
  width: <?php echo $header_width; ?>px;
  padding: 0 5px;
<?php
  } ?>
  margin: 0 auto <?php echo $ta_header_marginbottom; ?>px;
  overflow: hidden;
}

/***** グローバルメニュー */
#ta-mobile-global-navi {
  display: none;
}

/***** 全てのコンテンツを包括 */
#container {
  width: <?php echo $header_width; ?>px;
  padding: <?php echo $ta_common_container_paddingtop; ?>px 0 0;
  overflow: hidden;
  margin: 0 auto;
}

/***** メイン＋サブサイドバー */
#main-sidebarsub {
  float: <?php echo $main_sidebarsub_float; ?>;
}

/***** メイン */
#main {
  line-height: 1.3em;
  float: <?php echo $main_float; ?>;
  margin-left: <?php echo $main_margin_left; ?>px;
  margin-right: <?php echo $main_margin_right; ?>px;
<?php
  if ( 'valid' != $ta_footer_container2main_onoff && 'main' == $ta_common_body_wrap_marginbottom_select ) { ?>
  padding-bottom: <?php echo $ta_common_body_wrap_marginbottom; ?>px;
<?php
  } ?>
}

/***** コンテンツ */
#content {
  width: <?php echo $content_width; ?>px;
  float: <?php echo $content_float; ?>px;
  padding: <?php echo $content_padding; ?>px;
}

/***** サイドバー */
#sidebar-container {
  float: <?php echo $sidebar_container_float; ?>;
}

#sidebar {
  line-height: 1.3em;
  width: <?php echo $sidebar_width - 2 * $ta_sidebar_frame_padding; ?>px;
  padding: <?php echo $ta_sidebar_frame_padding; ?>px;
  float: left;
}

/***** サブサイドバー */
#sidebarsub-container {
  float: <?php echo $sidebarsub_container_float; ?>;
}

#sidebarsub {
  line-height: 1.3em;
  width: <?php echo $sidebarsub_width - 2 * $ta_sidebarsub_frame_padding; ?>px;
  padding: <?php echo $ta_sidebarsub_frame_padding; ?>px;
  float: left;
}

/***** フッター */
#footer-container {
  line-height: 1.3em;
  min-width: <?php echo $wrap_width; ?>px;
}

#footer-container #footer {
  width: <?php echo $header_width; ?>px;
  margin: 0 auto;
  clear: both;
}



/******************************************************/
/*  TAフォーマット・PHP to CSS・共通（コモン）
/******************************************************/

/******************* 共通（コモン）*******************/
/***** 基本フォントに関する可変スタイル */
<?php
  $ta_common_font_family = ta_read_op( 'ta_common_font_family' );
  if ( 'none' == $ta_common_font_family ) {
    $ta_font_family = '"ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro", "メイリオ", Meiryo, Osaka, "ＭＳ Ｐゴシック", "MS PGothic", sans-serif';
  } else {
    $ta_font_family = $ta_common_font_family;
  }
  $ta_font_size = ta_read_op( 'ta_common_font_size' );
  $ta_font_color = ta_select_color_w_image_color( 'ta_common_font_color' );
  $ta_font_anchor_color = ta_read_op( 'ta_common_font_anchor_color' );
  $ta_font_anchor_under = ( 'valid' == ta_read_op( 'ta_common_font_anchor_under' ) ) ? 'underline' : 'none';
  $ta_font_anchor_colorhover = ta_read_op( 'ta_common_font_anchor_colorhover' );
  $ta_font_anchor_underhover = ( 'valid' == ta_read_op( 'ta_common_font_anchor_underhover' ) ) ? 'underline' : 'none';
  $ta_common_font_p_lineheight = ta_read_op( 'ta_common_font_p_lineheight' );
  $ta_common_font_p_topmargin = ta_read_op( 'ta_common_font_p_topmargin' );
  $ta_common_font_p_bottommargin = ta_read_op( 'ta_common_font_p_bottommargin' );
  $ta_common_font_p_leftmargin = ta_read_op( 'ta_common_font_p_leftmargin' );
  $ta_common_font_p_rightmargin = ta_read_op( 'ta_common_font_p_rightmargin' );
  $ta_common_font_aimg_opacity = ta_read_op( 'ta_common_font_aimg_opacity' );
  $ta_common_font_aimg_opacityhover = ta_read_op( 'ta_common_font_aimg_opacityhover' );
  $ta_common_landscape_no_as_onoff = ta_read_op( 'ta_common_landscape_no_as_onoff' ); ?>

body {
  font-size: <?php echo $ta_font_size; ?>%;
  font-family: <?php echo $ta_font_family; ?>;
  color: <?php echo $ta_font_color; ?>;
  line-height: 1.3em;
<?php
  if ( 'valid' == $ta_common_landscape_no_as_onoff ) { ?>
  -webkit-text-size-adjust: 100%;
<?php
  } ?>
}

a {
  color: <?php echo $ta_font_anchor_color; ?>;
  text-decoration: <?php echo $ta_font_anchor_under; ?>;
}

a:link, a:visited {
  color: <?php echo $ta_font_anchor_color; ?>;
  text-decoration: <?php echo $ta_font_anchor_under; ?>;
}

a:hover, a:active {
  color: <?php echo $ta_font_anchor_colorhover; ?>;
  text-decoration: <?php echo $ta_font_anchor_underhover; ?>;
}

p {
  margin: <?php echo $ta_common_font_p_topmargin; ?>em <?php echo $ta_common_font_p_rightmargin; ?>em <?php echo $ta_common_font_p_bottommargin; ?>em <?php echo $ta_common_font_p_leftmargin; ?>em;
  line-height: <?php echo $ta_common_font_p_lineheight; ?>em;
}

a img {
  opacity: <?php echo $ta_common_font_aimg_opacity; ?>;
}

a img:hover {
  opacity: <?php echo $ta_common_font_aimg_opacityhover; ?>;
}

/***** ページャー（ページ番号表記タイプ）*/
<?php
  /******************* ページャー *******************/
  //***** ページャー（ページ番号表記タイプ）
  $ta_common_pager1_text_color = ta_select_color_w_image_color( 'ta_common_pager1_text_color' );
  $ta_common_pager1_margintop = ta_read_op( 'ta_common_pager1_margintop' );
  $ta_common_pager1_text_size = ta_read_op( 'ta_common_pager1_text_size' );
  $ta_common_pager1_text_weight = ta_read_op( 'ta_common_pager1_text_weight' );
  $ta_common_pager1_text_colorhover = ta_select_color_w_image_color( 'ta_common_pager1_text_colorhover' );
  $ta_common_pager1_text_bgcolor = ta_select_color_w_image_color( 'ta_common_pager1_text_bgcolor' );
  $ta_common_pager1_text_bgcolorhover = ta_select_color_w_image_color( 'ta_common_pager1_text_bgcolorhover' );
  $ta_common_pager1_text_paddingtb = ta_read_op( 'ta_common_pager1_text_paddingtb' );
  $ta_common_pager1_text_paddinglr = ta_read_op( 'ta_common_pager1_text_paddinglr' );
  $ta_common_pager1_frame_size = ta_read_op( 'ta_common_pager1_frame_size' );
  $ta_common_pager1_frame_color = ta_select_color_w_image_color( 'ta_common_pager1_frame_color' );
  $ta_common_pager1_frame_colorhover = ta_select_color_w_image_color( 'ta_common_pager1_frame_colorhover' );
  $ta_common_pager1_selected_text_color = ta_select_color_w_image_color( 'ta_common_pager1_selected_text_color' );
  $ta_common_pager1_selected_text_bgcolor = ta_select_color_w_image_color( 'ta_common_pager1_selected_text_bgcolor' );
  $ta_common_pager1_selected_frame_color = ta_select_color_w_image_color( 'ta_common_pager1_selected_frame_color' );
  $ta_common_pager1_dots_color = ta_select_color_w_image_color( 'ta_common_pager1_dots_color' );
  $ta_common_pager1_dots_weight = ta_read_op( 'ta_common_pager1_dots_weight' ); ?>
#main .ta_pager,
#sidebar .ta_pager,
#sidebarsub .ta_pager {
  font-size: <?php echo $ta_common_pager1_text_size; ?>%;
  margin: <?php echo $ta_common_pager1_margintop; ?>px 0 0;
  padding: 0;
  text-align: center;
}

#main .ta_pager a,
#sidebar .ta_pager a,
#sidebarsub .ta_pager a {
  text-decoration: none!important;
  padding: <?php echo $ta_common_pager1_text_paddingtb . 'px ' . $ta_common_pager1_text_paddinglr; ?>px;
  color: <?php echo $ta_common_pager1_text_color; ?>;
  background-color: <?php echo $ta_common_pager1_text_bgcolor; ?>;
  border: <?php echo $ta_common_pager1_frame_size . 'px solid ' . $ta_common_pager1_frame_color; ?>;
  display: inline-block;
}

#main .ta_pager a:hover,
#sidebar .ta_pager a:hover,
#sidebarsub .ta_pager a:hover {
  font-weight: <?php echo $ta_common_pager1_text_weight; ?>;
  color: <?php echo $ta_common_pager1_text_colorhover; ?>;
  background-color: <?php echo $ta_common_pager1_text_bgcolorhover; ?>;
  border: <?php echo $ta_common_pager1_frame_size . 'px solid ' . $ta_common_pager1_frame_colorhover; ?>;
}

#main .ta_pager span,
#sidebar .ta_pager span,
#sidebarsub .ta_pager span {
  padding: <?php echo $ta_common_pager1_text_paddingtb . 'px ' . $ta_common_pager1_text_paddinglr; ?>px;
  color: <?php echo $ta_common_pager1_selected_text_color; ?>;
  font-weight: bold;
  border: 1px solid #3f1f00;
  display: inline-block;
}

#main .ta_pager span.dots,
#sidebar .ta_pager span.dots,
#sidebarsub .ta_pager span.dots {
  font-weight: <?php echo $ta_common_pager1_dots_weight; ?>;
  color: <?php echo $ta_common_pager1_dots_color; ?>;
  border: none;
}

#main .ta_pager span:not(.dots),
#sidebar .ta_pager span:not(.dots),
#sidebarsub .ta_pager span:not(.dots) {
  border: <?php echo $ta_common_pager1_frame_size . 'px solid ' . $ta_common_pager1_selected_frame_color; ?>;
  background-color: <?php echo $ta_common_pager1_selected_text_bgcolor; ?>;
}

/***** ページャー（前次表記タイプ）*/
<?php
  /******************* ページャー *******************/
  //***** ページャー（前次表記タイプ）
  $ta_common_pager_prenext_margintop = ta_read_op( 'ta_common_pager_prenext_margintop' );
  $ta_common_pager_prenext_underline = ( 'valid' == ta_read_op( 'ta_common_pager_prenext_underline_onoff' ) ) ? 'underline' : 'none';
  $ta_common_pager_prenext_size = ta_read_op( 'ta_common_pager_prenext_size' );
  $ta_common_pager_prenext_weight = ta_read_op( 'ta_common_pager_prenext_weight' );
  $ta_common_pager_prenext_color = ta_select_color_w_image_color( 'ta_common_pager_prenext_color' );
  $ta_common_pager_prenext_colorhover = ta_select_color_w_image_color( 'ta_common_pager_prenext_colorhover' );
  $ta_common_pager_prenext_bgcolor = ta_select_color_w_image_color( 'ta_common_pager_prenext_bgcolor' );
  $ta_common_pager_prenext_bgcolorhover = ta_select_color_w_image_color( 'ta_common_pager_prenext_bgcolorhover' );
  $ta_common_pager_prenext_height = ta_read_op( 'ta_common_pager_prenext_height' );
  $ta_common_pager_prenext_minwidth = ta_read_op( 'ta_common_pager_prenext_minwidth' );
  $ta_common_pager_prenext_round = ta_read_op( 'ta_common_pager_prenext_round' ); ?>
#main .ta-prenext-pager,
#sidebar .ta-prenext-pager,
#sidebarsub .ta-prenext-pager {
  display: inline-block;
  vertical-align: bottom;
  width: 100%;
  margin-top: <?php echo $ta_common_pager_prenext_margintop; ?>px;
}

#main .ta-prenext-pager-pre,
#sidebar .ta-prenext-pager-pre,
#sidebarsub .ta-prenext-pager-pre {
  float: left;
}

#main .ta-prenext-pager-next,
#sidebar .ta-prenext-pager-next,
#sidebarsub .ta-prenext-pager-next {
  float: right;
}

#main .ta-prenext-pager-pre a,
#main .ta-prenext-pager-next a,
#sidebar .ta-prenext-pager-pre a,
#sidebar .ta-prenext-pager-next a,
#sidebarsub .ta-prenext-pager-pre a,
#sidebarsub .ta-prenext-pager-next a {
  display: block;
  text-align: center;
  text-decoration: <?php echo $ta_common_pager_prenext_underline; ?>;
  font-size: <?php echo $ta_common_pager_prenext_size; ?>%;
  font-weight: <?php echo $ta_common_pager_prenext_weight; ?>;
  min-width: <?php echo $ta_common_pager_prenext_minwidth; ?>em;
  color: <?php echo $ta_common_pager_prenext_color; ?>;
  background-color: <?php echo $ta_common_pager_prenext_bgcolor; ?>;
  height: <?php echo $ta_common_pager_prenext_height; ?>em;
  line-height: <?php echo $ta_common_pager_prenext_height; ?>em;
  border-radius: <?php echo $ta_common_pager_prenext_round; ?>px;
}

#main .ta-prenext-pager-pre a:hover,
#main .ta-prenext-pager-next a:hover,
#sidebar .ta-prenext-pager-pre a:hover,
#sidebar .ta-prenext-pager-next a:hover,
#sidebarsub .ta-prenext-pager-pre a:hover,
#sidebarsub .ta-prenext-pager-next a:hover {
  color: <?php echo $ta_common_pager_prenext_colorhover; ?>;
  background-color: <?php echo $ta_common_pager_prenext_bgcolorhover; ?>;
}

/***** ページャー（投稿の前次記事へのリンク）*/
<?php
  $ta_common_pager2_text_color = ta_select_color_w_image_color( 'ta_common_pager2_text_color' );
  $ta_common_pager2_margintop = ta_read_op( 'ta_common_pager2_margintop' );
  $ta_common_pager2_marginleft = ta_read_op( 'ta_common_pager2_marginleft' );
  $ta_common_pager2_marginright = ta_read_op( 'ta_common_pager2_marginright' );
  $ta_common_pager2_text_size = ta_read_op( 'ta_common_pager2_text_size' );
  $ta_common_pager2_text_weight = ta_read_op( 'ta_common_pager2_text_weight' );
  $ta_common_pager2_text_colorhover = ta_select_color_w_image_color( 'ta_common_pager2_text_colorhover' ); ?>
#main .ta-previous-next-post-link {
  font-size: <?php echo $ta_common_pager2_text_size; ?>%;
  font-weight: <?php echo $ta_common_pager2_text_weight; ?>;
  color: <?php echo $ta_common_pager2_text_color; ?>;
  margin: <?php echo $ta_common_pager2_margintop; ?>px 0 0;
  padding: 0;
  clear: both;
  display: inline-block;
  vertical-align: bottom;
  width: 100%;
}

#main .ta-previous-next-post-link a {
  color: <?php echo $ta_common_pager2_text_color; ?>;
}

#main .ta-previous-next-post-link a:hover {
  color: <?php echo $ta_common_pager2_text_colorhover; ?>;
}

#main .ta-previous-next-post-link .ta-previous-post-link {
  float: left;
  margin-left: <?php echo $ta_common_pager2_marginleft; ?>px;
}

#main .ta-previous-next-post-link .ta-previous-post-link a {
  text-decoration: none;
}

#main .ta-previous-next-post-link .ta-next-post-link {
  float: right;
  margin-right: <?php echo $ta_common_pager2_marginright; ?>px;
}

#main .ta-previous-next-post-link .ta-next-post-link a {
  text-decoration: none;
}

/***** パンくずナビ */
<?php
  $ta_common_bread_parent_color = ta_select_color_w_image_color( 'ta_common_bread_parent_color' );
  $ta_common_bread_current_color = ta_select_color_w_image_color( 'ta_common_bread_current_color' );
  $ta_common_bread_parent_colorhover = ta_select_color_w_image_color( 'ta_common_bread_parent_colorhover' );
  $ta_common_bread_parent_underonoff = ta_read_op( 'ta_common_bread_parent_underonoff' );
  $ta_common_bread_text_size = ta_read_op( 'ta_common_bread_text_size' );
  $ta_common_bread_text_weight = ta_read_op( 'ta_common_bread_text_weight' );
  $ta_common_bread_paddingtop = ta_read_op( 'ta_common_bread_paddingtop' );
  $ta_common_bread_paddingleft = ta_read_op( 'ta_common_bread_paddingleft' );
  $ta_common_bread_paddingbottom = ta_read_op( 'ta_common_bread_paddingbottom' );
  $ta_common_bread_margin2arrow = ta_read_op( 'ta_common_bread_margin2arrow' ); ?>
#ta_bread_crumb {
  font-size: <?php echo $ta_common_bread_text_size; ?>%;
  font-weight: <?php echo $ta_common_bread_text_weight; ?>;
  color: <?php echo $ta_common_bread_current_color; ?>;
  clear: both;
  width: 100%;
  display: inline-block;
  vertical-align: bottom;
  padding: <?php echo $ta_common_bread_paddingtop . 'px 0 ' . $ta_common_bread_paddingbottom . 'px ' . $ta_common_bread_paddingleft; ?>px;
}

#ta_bread_crumb a,
#main #content #ta_bread_crumb a {
  color: <?php echo $ta_common_bread_parent_color; ?>;
<?php
  if ( 'invalid' == $ta_common_bread_parent_underonoff ) { ?>
  text-decoration: none;
<?php
  } else { ?>
  text-decoration: underline;
<?php
  } ?>
}

#ta_bread_crumb a:hover,
#main #content #ta_bread_crumb a:hover {
  color: <?php echo $ta_common_bread_parent_colorhover; ?>;
}

#ta_bread_crumb div {
  float: left;
}

#ta_bread_crumb span.top_title {
  padding: <?php echo '0 ' . $ta_common_bread_margin2arrow; ?>px 0 0;
}

#ta_bread_crumb span {
  padding: <?php echo '0 ' . $ta_common_bread_margin2arrow; ?>px;
}

/***** SMO SNSボタン */
<?php
  $ta_common_smo_top_sns_top_toppadding = ta_read_op( 'ta_common_smo_top_sns_top_toppadding' );
  $ta_common_smo_top_sns_top_bottompadding = ta_read_op( 'ta_common_smo_top_sns_top_bottompadding' );
  $ta_common_smo_top_sns_bottom_toppadding = ta_read_op( 'ta_common_smo_top_sns_bottom_toppadding' );
  $ta_common_smo_top_sns_bottom_bottompadding = ta_read_op( 'ta_common_smo_top_sns_bottom_bottompadding' );
  $ta_common_smo_page_sns_top_toppadding = ta_read_op( 'ta_common_smo_page_sns_top_toppadding' );
  $ta_common_smo_page_sns_top_bottompadding = ta_read_op( 'ta_common_smo_page_sns_top_bottompadding' );
  $ta_common_smo_page_sns_bottom_toppadding = ta_read_op( 'ta_common_smo_page_sns_bottom_toppadding' );
  $ta_common_smo_page_sns_bottom_bottompadding = ta_read_op( 'ta_common_smo_page_sns_bottom_bottompadding' );
  $ta_common_smo_post_sns_top_toppadding = ta_read_op( 'ta_common_smo_post_sns_top_toppadding' );
  $ta_common_smo_post_sns_top_bottompadding = ta_read_op( 'ta_common_smo_post_sns_top_bottompadding' );
  $ta_common_smo_post_sns_bottom_toppadding = ta_read_op( 'ta_common_smo_post_sns_bottom_toppadding' );
  $ta_common_smo_post_sns_bottom_bottompadding = ta_read_op( 'ta_common_smo_post_sns_bottom_bottompadding' );
  $ta_common_smo_listpage_sns_top_toppadding = ta_read_op( 'ta_common_smo_listpage_sns_top_toppadding' );
  $ta_common_smo_listpage_sns_top_bottompadding = ta_read_op( 'ta_common_smo_listpage_sns_top_bottompadding' );
  $ta_common_smo_listpage_sns_bottom_toppadding = ta_read_op( 'ta_common_smo_listpage_sns_bottom_toppadding' );
  $ta_common_smo_listpage_sns_bottom_bottompadding = ta_read_op( 'ta_common_smo_listpage_sns_bottom_bottompadding' ); ?>
/* 共通 */
ul.ta-sns-box-height {
  height: 20px;
}

.main-contents-sns-top {
  padding: 10px 0;
  text-align: left;
}

.main-contents-sns-bottom {
  padding: 70px 0 10px;
  text-align: left;
}

.main-contents-sns-top ul li,
.main-contents-sns-bottom ul li {
  display: inline-block;
  list-style: outside none none;
  margin-right: 5px;
  vertical-align: top;
}

/* トップページメインコンテンツ */
.home .main-contents-sns-top {
  padding: <?php echo $ta_common_smo_top_sns_top_toppadding . 'px 0 ' . $ta_common_smo_top_sns_top_bottompadding; ?>px;
}

.home .main-contents-sns-bottom {
  padding: <?php echo $ta_common_smo_top_sns_bottom_toppadding . 'px 0 ' . $ta_common_smo_top_sns_bottom_bottompadding; ?>px;
}

/* 固定ページメインコンテンツ */
.page:not(.home) .main-contents-sns-top {
  padding: <?php echo $ta_common_smo_page_sns_top_toppadding . 'px 0 ' . $ta_common_smo_page_sns_top_bottompadding; ?>px;
}

.page:not(.home) .main-contents-sns-bottom {
  padding: <?php echo $ta_common_smo_page_sns_bottom_toppadding . 'px 0 ' . $ta_common_smo_page_sns_bottom_bottompadding; ?>px;
}

/* 投稿ページメインコンテンツ */
.single .main-contents-sns-top {
  padding: <?php echo $ta_common_smo_post_sns_top_toppadding . 'px 0 ' . $ta_common_smo_post_sns_top_bottompadding; ?>px;
}

.single .main-contents-sns-bottom {
  padding: <?php echo $ta_common_smo_post_sns_bottom_toppadding . 'px 0 ' . $ta_common_smo_post_sns_bottom_bottompadding; ?>px;
}

/* 一覧ページメインコンテンツ */
.archive .main-contents-sns-top {
  padding: <?php echo $ta_common_smo_listpage_sns_top_toppadding . 'px 0 ' . $ta_common_smo_listpage_sns_top_bottompadding; ?>px;
}

.archive .main-contents-sns-bottom {
  padding: <?php echo $ta_common_smo_listpage_sns_bottom_toppadding . 'px 0 ' . $ta_common_smo_listpage_sns_bottom_bottompadding; ?>px;
}

/***** 装飾・小物 */
/* バックトゥートップスクロール */
<?php
  $ta_common_back2top_text_size = ta_read_op( 'ta_common_back2top_text_size' );
  $ta_common_back2top_text_weight = ta_read_op( 'ta_common_back2top_text_weight' );
  $ta_common_back2top_text_color = ta_select_color_w_image_color( 'ta_common_back2top_text_color' );
  $ta_common_back2top_text_under = ta_read_op( 'ta_common_back2top_text_under' );
  $ta_common_back2top_text_underhover = ta_read_op( 'ta_common_back2top_text_underhover' );
  $ta_common_back2top_text_colorhover = ta_select_color_w_image_color( 'ta_common_back2top_text_colorhover' );
  $ta_common_back2top_img = ta_read_op( 'ta_common_back2top_img' );
  $ta_common_back2top_img_opacity = ta_read_op( 'ta_common_back2top_img_opacity' );
  $ta_common_back2top_img_opacityhover = ta_read_op( 'ta_common_back2top_img_opacityhover' );
  $ta_common_back2top_img_height = ta_read_op( 'ta_common_back2top_img_height' );
  $ta_common_back2top_text_bgcolor = ta_select_color_w_image_color( 'ta_common_back2top_text_bgcolor' );
  $ta_common_back2top_text_bgcolorhover = ta_select_color_w_image_color( 'ta_common_back2top_text_bgcolorhover' );
  $ta_common_back2top_text_height = ta_read_op( 'ta_common_back2top_text_height' );
  $ta_common_back2top_text_lr_padding = ta_read_op( 'ta_common_back2top_text_lr_padding' );
  $ta_common_back2top_text_round = ta_read_op( 'ta_common_back2top_text_round' );
  $ta_common_back2top_text_round_upper_onoff = ta_read_op( 'ta_common_back2top_text_round_upper_onoff' );
  $ta_common_back2top_text_fixed_onoff = ta_read_op( 'ta_common_back2top_text_fixed_onoff' );
  $ta_common_back2top_text_fixed_bottom = ta_read_op( 'ta_common_back2top_text_fixed_bottom' );
  $ta_common_back2top_text_fixed_right = ta_read_op( 'ta_common_back2top_text_fixed_right' );
  $ta_common_back2top_topmargin = ta_read_op( 'ta_common_back2top_topmargin' );
  $ta_common_back2top_position = ta_read_op( 'ta_common_back2top_position' );
  $ta_common_back2top_edge_margin = ta_read_op( 'ta_common_back2top_edge_margin' );
  if ( 'valid' == $ta_common_back2top_text_fixed_onoff ) { ?>
#ta_backto_top {
  position: fixed;
  right: <?php echo $ta_common_back2top_text_fixed_right; ?>px;
  bottom: <?php echo $ta_common_back2top_text_fixed_bottom; ?>px;
  margin: 0!important;
  z-index: 999;
}
<?php
  } else { ?>

#ta_backto_top {
  clear: both;
  width: 100%;
  text-align: <?php echo $ta_common_back2top_position; ?>;
}
<?php
  } ?>

#ta_backto_top img {
  width: auto;
  height: <?php echo $ta_common_back2top_img_height; ?>px;
  opacity: <?php echo $ta_common_back2top_img_opacity; ?>;
}

#ta_backto_top a {
<?php
  if ( 'no_image' != $ta_common_back2top_img ) { ?>
  hight: <?php echo $ta_common_back2top_img_height; ?>px;
  line-height: <?php echo $ta_common_back2top_img_height; ?>px;
<?php
  } else { ?>
  background-color: <?php echo $ta_common_back2top_text_bgcolor; ?>;
  hight: <?php echo ( 1 + $ta_common_back2top_text_height); ?>em;
  line-height: <?php echo ( 1 + $ta_common_back2top_text_height); ?>em;
  padding: 0 <?php echo $ta_common_back2top_text_lr_padding; ?>em;
<?php
    if ( 'invalid' == $ta_common_back2top_text_round_upper_onoff ) { ?>
  border-radius: <?php echo $ta_common_back2top_text_round; ?>px;
<?php
    } else { ?>
  border-top-left-radius: <?php echo $ta_common_back2top_text_round; ?>px;
  border-top-right-radius: <?php echo $ta_common_back2top_text_round; ?>px;
<?php
    }
  } ?>
  width: auto;
<?php
  if ( 'valid' == $ta_common_back2top_text_fixed_onoff ) { ?>
  margin: 0!important;
<?php
  } else { ?>
  margin-top: <?php echo $ta_common_back2top_topmargin; ?>px;
<?php
    if ( 'left' == $ta_common_back2top_position ) { ?>
  margin-left: <?php echo $ta_common_back2top_edge_margin; ?>px;
<?php
    } else if ( 'right' == $ta_common_back2top_position ) { ?>
  margin-right: <?php echo $ta_common_back2top_edge_margin; ?>px;
<?php
    }
  } ?>
  display: inline-block;
  vertical-align: bottom;
  color: <?php echo $ta_common_back2top_text_color; ?>;
  font-size: <?php echo $ta_common_back2top_text_size; ?>%;
  font-weight: <?php echo $ta_common_back2top_text_weight; ?>;
  text-decoration: <?php echo ( 'valid' == $ta_common_back2top_text_under ) ? 'underline' : 'none'; ?>;
}

#ta_backto_top a:hover {
  color: <?php echo $ta_common_back2top_text_colorhover; ?>;
  background-color: <?php echo $ta_common_back2top_text_bgcolorhover; ?>;
  text-decoration: <?php echo ( 'valid' == $ta_common_back2top_text_underhover ) ? 'underline' : 'none'; ?>;
}

#ta_backto_top a:hover img {
  opacity: <?php echo $ta_common_back2top_img_opacityhover; ?>;
}

/***** 固定ページCSS */
<?php
  $ta_common_page_top_margin_value = ta_read_op( 'ta_common_page_top_margin_value' ); ?>
.ta-page-top-margin {
  margin-top: <?php echo $ta_common_page_top_margin_value; ?>px;
}

/***** 投稿記事CSS */
<?php
  $ta_common_post_top_margin_value = ta_read_op( 'ta_common_post_top_margin_value' );
  $ta_common_post_timecat = ta_read_op( 'ta_common_post_timecat' );
  $ta_common_post_time_onoff = ta_read_op( 'ta_common_post_time_onoff' );
  $ta_common_post_cat_onoff = ta_read_op( 'ta_common_post_cat_onoff' );
  $ta_common_post_time_color = ta_select_color_w_image_color( 'ta_common_post_time_color' );
  $ta_common_post_time_size = ta_read_op( 'ta_common_post_time_size' );
  $ta_common_post_time_weight = ta_read_op( 'ta_common_post_time_weight' );
  $ta_common_post_watchmark_onoff = ta_read_op( 'ta_common_post_watchmark_onoff' );
  $ta_common_post_cat_size = ta_read_op( 'ta_common_post_cat_size' );
  $ta_common_post_cat_weight = ta_read_op( 'ta_common_post_cat_weight' );
  $ta_common_post_cat_height = ta_read_op( 'ta_common_post_cat_height' );
  $ta_common_post_cat_width = ta_read_op( 'ta_common_post_cat_width' );
  $ta_common_post_cat_round = ta_read_op( 'ta_common_post_cat_round' ); ?>
.ta-single-top-margin {
  margin-top: <?php echo $ta_common_post_top_margin_value; ?>px;
}

#content .single-timecat {
  width: 100%;
  display: inline-block;
  vertical-align: bottom;
}

<?php
  if ( 'time-cat' == $ta_common_post_timecat ) { ?>
#content .single-timecat .single-time {
  float: left;
  color: <?php echo $ta_common_post_time_color; ?>;
  font-size: <?php echo $ta_common_post_time_size; ?>%;
  font-weight: <?php echo $ta_common_post_time_weight; ?>;
<?php
    if ( 'invalid' == $ta_common_post_time_onoff ) { ?>
  display: none;
<?php
    } ?>
}

#content .single-timecat .single-cat {
  float: right;
  font-size: <?php echo $ta_common_post_cat_size; ?>%;
  font-weight: <?php echo $ta_common_post_cat_weight; ?>;
  min-width: <?php echo $ta_common_post_cat_width; ?>em;
  text-align: center;
  line-height: <?php echo $ta_common_post_cat_height; ?>em;
  height: <?php echo $ta_common_post_cat_height; ?>em;
  border-radius: <?php echo $ta_common_post_cat_round; ?>px;
  text-decoration: none;
<?php
    if ( 'invalid' == $ta_common_post_cat_onoff ) { ?>
  display: none;
<?php
    } ?>
}

<?php
  } else { ?>
#content .single-timecat .single-time {
  float: right;
  color: <?php echo $ta_common_post_time_color; ?>;
  font-size: <?php echo $ta_common_post_time_size; ?>%;
  font-weight: <?php echo $ta_common_post_time_weight; ?>;
<?php
    if ( 'invalid' == $ta_common_post_time_onoff ) { ?>
  display: none;
<?php
    } ?>
}

#content .single-timecat .single-cat {
  float: left;
  font-size: <?php echo $ta_common_post_cat_size; ?>%;
  font-weight: <?php echo $ta_common_post_cat_weight; ?>;
  min-width: <?php echo $ta_common_post_cat_width; ?>em;
  text-align: center;
  line-height: <?php echo $ta_common_post_cat_height; ?>em;
  height: <?php echo $ta_common_post_cat_height; ?>em;
  border-radius: <?php echo $ta_common_post_cat_round; ?>px;
  text-decoration: none;
<?php
    if ( 'invalid' == $ta_common_post_cat_onoff ) { ?>
  display: none;
<?php
    } ?>
}

<?php
  }

  if ( 'valid' == $ta_common_post_watchmark_onoff ) { ?>
#content .single-timecat .single-time::before {
  content: "\f469";
  background-color: transparent;
  color: <?php echo $ta_common_post_time_color; ?>;
  font-family: dashicons;
  font-size: <?php echo $ta_common_post_time_size; ?>%;
  font-weight: <?php echo $ta_common_post_time_weight; ?>;
  margin-right: 0.3em;
  padding: 0 0;
}

<?php
  }

/***** アーカイブCSS */
  ta_archive_disp_style_w_php();
  $ta_common_listpage_top_margin_value = ta_read_op( 'ta_common_listpage_top_margin_value' ); ?>
.ta-archive-top-margin {
  margin-top: <?php echo $ta_common_listpage_top_margin_value; ?>px;
}

.search .archive-contents {
  margin-bottom: 20px;
}

/***** 簡易最新投稿ダイジェストCSS */
<?php
  $ta_common_simple_latestposts_post_title_color = ta_select_color_w_image_color( 'ta_common_simple_latestposts_post_title_color' );
  $ta_common_simple_latestposts_post_title_color_hover = ta_select_color_w_image_color( 'ta_common_simple_latestposts_post_title_color_hover' );
  $ta_common_simple_latestposts_post_title_underline_onoff = ta_read_op( 'ta_common_simple_latestposts_post_title_underline_onoff' );
  $ta_common_simple_latestposts_post_title_underlinehover_onoff = ta_read_op( 'ta_common_simple_latestposts_post_title_underlinehover_onoff' );
  $ta_common_simple_latestposts_post_title_size = ta_read_op( 'ta_common_simple_latestposts_post_title_size' );
  $ta_common_simple_latestposts_post_title_weight = ta_read_op( 'ta_common_simple_latestposts_post_title_weight' );
  $ta_common_simple_latestposts_time_color = ta_select_color_w_image_color( 'ta_common_simple_latestposts_time_color' );
  $ta_common_simple_latestposts_time_weight = ta_read_op( 'ta_common_simple_latestposts_time_weight' );
  $ta_common_simple_latestposts_time_width = ta_read_op( 'ta_common_simple_latestposts_time_width' );
  $ta_common_simple_latestposts_watchmark_onoff = ta_read_op( 'ta_common_simple_latestposts_watchmark_onoff' );
  $ta_common_simple_latestposts_release_mark_text_color = ta_select_color_w_image_color( 'ta_common_simple_latestposts_release_mark_text_color' );
  $ta_common_simple_latestposts_release_mark_text_weight = ta_read_op( 'ta_common_simple_latestposts_release_mark_text_weight' );
  $ta_common_simple_latestposts_release_mark_text_bgcolor = ta_select_color_w_image_color( 'ta_common_simple_latestposts_release_mark_text_bgcolor' );
  $ta_common_simple_latestposts_release_mark_text_round = ta_read_op( 'ta_common_simple_latestposts_release_mark_text_round' );
  $ta_common_simple_latestposts_release_mark_padding = ta_read_op( 'ta_common_simple_latestposts_release_mark_padding' );
  $ta_common_simple_latestposts_padding = ta_read_op( 'ta_common_simple_latestposts_padding' );
  $ta_common_simple_latestposts_post_border_kind = ta_read_op( 'ta_common_simple_latestposts_post_border_kind' );
  $ta_common_simple_latestposts_post_border_size = ta_read_op( 'ta_common_simple_latestposts_post_border_size' );
  $ta_common_simple_latestposts_post_border_color = ta_select_color_w_image_color( 'ta_common_simple_latestposts_post_border_color' ); ?>
.simple-whatsnew .simple-info-wrap .info-contents {
  display: inline-block;
  vertical-align: bottom;
  width: 100%;
  height: auto;
  font-size: <?php echo $ta_common_simple_latestposts_post_title_size; ?>%;
  padding: <?php echo $ta_common_simple_latestposts_padding; ?>px 0;
<?php
  if ( 'none' != $ta_common_simple_latestposts_post_border_kind ) { ?>
  border-bottom: <?php echo $ta_common_simple_latestposts_post_border_size; ?>px <?php echo $ta_common_simple_latestposts_post_border_kind; ?> <?php echo $ta_common_simple_latestposts_post_border_color; ?>;
<?php
  } ?>
}

.simple-whatsnew .simple-info-wrap .info-contents .info-contents-time time {
  float: left;
  width: <?php echo $ta_common_simple_latestposts_time_width; ?>em;
  height: auto;
  line-height: 1.3em;
  height: 1.3em;
  color: <?php echo $ta_common_simple_latestposts_time_color; ?>;
  font-weight: <?php echo $ta_common_simple_latestposts_time_weight; ?>;
}

<?php
  if ( 'valid' == $ta_common_simple_latestposts_watchmark_onoff ) { ?>
.simple-whatsnew .simple-info-wrap .info-contents .info-contents-time time::before {
  content: "\f469";
  background-color: transparent;
  color: <?php echo $ta_common_simple_latestposts_time_color; ?>;
  font-family: dashicons;
  font-weight: n<?php echo $ta_common_simple_latestposts_time_weight; ?>;
  margin-right: 0.3em;
  padding: 0 0;
}

<?php
  } ?>
#header_freearea .simple-whatsnew .simple-info-wrap .info-contents .info-contents-title .info-title,
#main .simple-whatsnew .simple-info-wrap .info-contents .info-contents-title .info-title,
#sidebar .simple-whatsnew .simple-info-wrap .info-contents .info-contents-title .info-title,
#sidebarsub .simple-whatsnew .simple-info-wrap .info-contents .info-contents-title .info-title,
#content #footer-container .simple-whatsnew .simple-info-wrap .info-contents .info-contents-title .info-title,
#outer-footer-container #footer-container .simple-whatsnew .simple-info-wrap .info-contents .info-contents-title .info-title {
  display: inline-block;
  vertical-align: bottom;
  min-height: 1.3em;
  width: 60%; /* IE8以下とAndroid4.3以下用 */
  width: -webkit-calc(100% - <?php echo $ta_common_simple_latestposts_time_width; ?>em);
  width: calc(100% - <?php echo $ta_common_simple_latestposts_time_width; ?>em);
}

#header_freearea .simple-whatsnew .simple-info-wrap .info-contents .info-contents-title .info-title img,
#main .simple-whatsnew .simple-info-wrap .info-contents .info-contents-title .info-title img,
#sidebar .simple-whatsnew .simple-info-wrap .info-contents .info-contents-title .info-title img,
#sidebarsub .simple-whatsnew .simple-info-wrap .info-contents .info-contents-title .info-title img,
#content #footer-container .simple-whatsnew .simple-info-wrap .info-contents .info-contents-title .info-title img,
#outer-footer-container #footer-container .simple-whatsnew .simple-info-wrap .info-contents .info-contents-title .info-title img {
  float: left!important;  /* レスポンシブデザイン条件よりも優先する */
  height: 1.3em!important;  /* レスポンシブデザイン条件よりも優先する */
  margin-right: <?php echo $ta_common_simple_latestposts_release_mark_padding; ?>px!important;  /* レスポンシブデザイン条件よりも優先する */
}

#header_freearea .simple-whatsnew .simple-info-wrap .info-contents .info-contents-title .info-title span,
#main .simple-whatsnew .simple-info-wrap .info-contents .info-contents-title .info-title span,
#sidebar .simple-whatsnew .simple-info-wrap .info-contents .info-contents-title .info-title span,
#sidebarsub .simple-whatsnew .simple-info-wrap .info-contents .info-contents-title .info-title span,
#content #footer-container .simple-whatsnew .simple-info-wrap .info-contents .info-contents-title .info-title span,
#outer-footer-container #footer-container .simple-whatsnew .simple-info-wrap .info-contents .info-contents-title .info-title span {
  border-radius: <?php echo $ta_common_simple_latestposts_release_mark_text_round; ?>px;
  color: <?php echo $ta_common_simple_latestposts_release_mark_text_color; ?>;
  background-color: <?php echo $ta_common_simple_latestposts_release_mark_text_bgcolor; ?>;
  margin-right: <?php echo $ta_common_simple_latestposts_release_mark_padding; ?>px;
  font-weight: <?php echo $ta_common_simple_latestposts_release_mark_text_weight; ?>;
  font-size: 74%;
  padding: 1px 5px;
  vertical-align: middle;
}

#header_freearea .simple-whatsnew .simple-info-wrap .info-contents .info-contents-title a,
#main .simple-whatsnew .simple-info-wrap .info-contents .info-contents-title a,
#sidebar .simple-whatsnew .simple-info-wrap .info-contents .info-contents-title a,
#sidebarsub .simple-whatsnew .simple-info-wrap .info-contents .info-contents-title a,
#content #footer-container .simple-whatsnew .simple-info-wrap .info-contents .info-contents-title a,
#outer-footer-container #footer-container .simple-whatsnew .simple-info-wrap .info-contents .info-contents-title a {
  color: <?php echo $ta_common_simple_latestposts_post_title_color; ?>;
  font-weight: <?php echo $ta_common_simple_latestposts_post_title_weight; ?>;
<?php
  if ( 'valid' == $ta_common_simple_latestposts_post_title_underline_onoff ) { ?>
  text-decoration: underline;
<?php
  } else { ?>
  text-decoration: none;
<?php
  } ?>
}

#header_freearea .simple-whatsnew .simple-info-wrap .info-contents .info-contents-title a:hover,
#main .simple-whatsnew .simple-info-wrap .info-contents .info-contents-title a:hover,
#sidebar .simple-whatsnew .simple-info-wrap .info-contents .info-contents-title a:hover,
#sidebarsub .simple-whatsnew .simple-info-wrap .info-contents .info-contents-title a:hover,
#content #footer-container .simple-whatsnew .simple-info-wrap .info-contents .info-contents-title a:hover,
#outer-footer-container #footer-container .simple-whatsnew .simple-info-wrap .info-contents .info-contents-title a:hover {
  color: <?php echo $ta_common_simple_latestposts_post_title_color_hover; ?>;
<?php
  if ( 'valid' == $ta_common_simple_latestposts_post_title_underlinehover_onoff ) { ?>
  text-decoration: underline;
<?php
  } else { ?>
  text-decoration: none;
<?php
  } ?>
}



/******************************************************/
/*  TAフォーマット・PHP to CSS・トップ
/******************************************************/

/******************* トップ *******************/
<?php
  /***** トップページウィジェットに関する可変スタイル */
  //***** トップページウィジェット
  $ta_top_widget_centering = ta_read_op( 'ta_top_widget_centering' );
  $ta_top_fixed_space = ta_read_op( 'ta_top_fixed_space' );
  if ( 'valid' == $ta_top_widget_centering ) { ?>
#main .ta-widget-container *:not(.title) {
  text-align: center;
}

#main .ta-widget-container table {
  display: inline;
  margin-left: auto;
  margin-right: auto;
}
<?php
  } ?>

body.home #main #content .fixed-space {
  margin-top: <?php echo $ta_top_fixed_space; ?>px;
}

body.home #main #content .fixed-space:first-child {
  margin-top: 0;
}

/***** トップキャッチエリアに関する可変スタイル */
<?php
  $ta_top_topcatch_num = ta_read_op( 'ta_top_topcatch_num' );
  if ( ! TA_HIEND_PI ) {
    if ( $ta_top_topcatch_num > 3 ) { $ta_top_topcatch_num = 3; }
  }
  $ta_top_topcatch_space = ta_read_op( 'ta_top_topcatch_space' );
  $ta_top_topcatch_top_margin_value = ta_read_op( 'ta_top_topcatch_top_margin_value' );
  $ta_top_topcatch_text_onlyfor_onoff = ta_read_op( 'ta_top_topcatch_text_onlyfor_onoff' );
  $ta_top_topcatch_text_color = ta_select_color_w_image_color( 'ta_top_topcatch_text_color' );
  $ta_top_topcatch_text_size = ta_read_op( 'ta_top_topcatch_text_size' );
  $ta_top_topcatch_text_weight = ta_read_op( 'ta_top_topcatch_text_weight' );
  $ta_top_topcatch_text_p_lineheight = ta_read_op( 'ta_top_topcatch_text_p_lineheight' );
  $ta_top_topcatch_text_p_topmargin = ta_read_op( 'ta_top_topcatch_text_p_topmargin' );
  $ta_top_topcatch_text_p_bottommargin = ta_read_op( 'ta_top_topcatch_text_p_bottommargin' );
  $ta_top_topcatch_text_p_leftmargin = ta_read_op( 'ta_top_topcatch_text_p_leftmargin' );
  $ta_top_topcatch_text_p_rightmargin = ta_read_op( 'ta_top_topcatch_text_p_rightmargin' );
  $ta_top_topcatch_continue_text_size = ta_read_op( 'ta_top_topcatch_continue_text_size' );
  $ta_top_topcatch_continue_text_weight = ta_read_op( 'ta_top_topcatch_continue_text_weight' );
  $ta_top_topcatch_continue_text_anchor_color = ta_select_color_w_image_color( 'ta_top_topcatch_continue_text_anchor_color' );
  $ta_top_topcatch_continue_text_anchor_under = ( 'valid' == ta_read_op( 'ta_top_topcatch_continue_text_anchor_under' ) ) ? 'underline' : 'none';
  $ta_top_topcatch_continue_text_anchor_colorhover = ta_select_color_w_image_color( 'ta_top_topcatch_continue_text_anchor_colorhover' );
  $ta_top_topcatch_continue_text_anchor_underhover = ( 'valid' == ta_read_op( 'ta_top_topcatch_continue_text_anchor_underhover' ) ) ? 'underline' : 'none';
  if ( $ta_top_topcatch_num ) { ?>
.ta-topcatch-top-margin {
  margin-top: <?php echo $ta_top_topcatch_top_margin_value; ?>px;
}

#ta-topcatch-area {
  display: inline-block;
  vertical-align: bottom;
  width: 100%;
}

.ta-topcatch-img-container {
  width: 100%;
}

.ta-topcatch-img-container img {
  margin-right: auto;
  margin-left: auto;
  display: block;
}
  
.ta-topcatch-continue {
  float: right;
}

<?php
    if ( 'valid' == $ta_top_topcatch_text_onlyfor_onoff ) { ?>
#main p.ta-topcatch-text {
  color: <?php echo $ta_top_topcatch_text_color; ?>!important;
  font-size: <?php echo $ta_top_topcatch_text_size; ?>%!important;
  font-weight: <?php echo $ta_top_topcatch_text_weight; ?>!important;
  line-height: <?php echo $ta_top_topcatch_text_p_lineheight; ?>em!important;
  margin: <?php echo $ta_top_topcatch_text_p_topmargin; ?>em <?php echo $ta_top_topcatch_text_p_rightmargin; ?>em <?php echo $ta_top_topcatch_text_p_bottommargin; ?>em <?php echo $ta_top_topcatch_text_p_leftmargin; ?>em!important;
}

#main #ta-topcatch-area .ta-topcatch-continue {
  font-size: <?php echo $ta_top_topcatch_continue_text_size; ?>%;
  font-weight: <?php echo $ta_top_topcatch_continue_text_weight; ?>;
  color: <?php echo $ta_top_topcatch_continue_text_anchor_color; ?>;
  text-decoration: <?php echo $ta_top_topcatch_continue_text_anchor_under; ?>;
}

#main #ta-topcatch-area .ta-topcatch-continue:hover {
  color: <?php echo $ta_top_topcatch_continue_text_anchor_colorhover; ?>;
  text-decoration: <?php echo $ta_top_topcatch_continue_text_anchor_underhover; ?>;
}

<?php
    }
    for ( $i = 0; $i < $ta_top_topcatch_num; $i++ ) { ?>
#ta-topcatch<?php echo ($i + 1); ?> {
  float: left;
  width: <?php echo floor( ( 100 - ( $ta_top_topcatch_num - 1 ) * $ta_top_topcatch_space ) / $ta_top_topcatch_num ); ?>%;
<?php
      if ( 0 != $i ) { ?>
  margin-left: <?php echo $ta_top_topcatch_space; ?>%;
<?php
      } ?>
}

<?php
    }
  } ?>



/******************************************************/
/*  TAフォーマット・PHP to CSS・ヘッダー
/******************************************************/

/******************* フレーム *******************/
<?php
  /******************* フレーム *******************/
  //***** ヘッダー(#header)の背景色・背景画像
  $ta_header_frame_color = ta_select_color_w_image_color( 'ta_header_frame_color' );
  if ( TA_HIEND_PI ) {
    $ta_header_frame_grad_onoff = ta_read_op( 'ta_header_frame_color_grad_onoff' );
  } else {
    $ta_header_frame_grad_onoff = "invalid";
  }
  $ta_header_frame_pic = ta_read_op( 'ta_header_frame_pic' );
  $ta_header_frame_pic_rule = ta_read_op( 'ta_header_frame_pic_rule' );
  $ta_header_frame_pic_margin = ta_read_op( 'ta_header_frame_pic_margin' );
  //***** ヘッダー（バナーエリア）の高さ: #headerのheightの値
  $ta_header_height = ta_read_op( 'ta_header_height' );
  //***** ヘッダー(#header)の標準フォント
  $ta_header_font_size = ta_read_op( 'ta_header_font_size' );
  $ta_header_font_anchor_onlyfor_onoff = ta_read_op( 'ta_header_font_anchor_onlyfor_onoff' );
  $ta_header_font_normal_text_color = ta_select_color_w_image_color( 'ta_header_font_normal_text_color' );
  $ta_header_font_anchor_color = ta_select_color_w_image_color( 'ta_header_font_anchor_color' );
  $ta_header_font_anchor_under = ( 'valid' == ta_read_op( 'ta_header_font_anchor_under' ) ) ? 'underline' : 'none';
  $ta_header_font_anchor_colorhover = ta_select_color_w_image_color( 'ta_header_font_anchor_colorhover' );
  $ta_header_font_anchor_underhover = ( 'valid' == ta_read_op( 'ta_header_font_anchor_underhover' ) ) ? 'underline' : 'none';
  if ( TA_HIEND_PI ) {
    $ta_header_bannerarea2wrap_opacity = ta_read_op( 'ta_header_bannerarea2wrap_opacity' );
  } else {
    $ta_header_bannerarea2wrap_opacity = 1.0;
  }

  switch ( $ta_header_frame_pic_rule ) {
    case 'top_x':
      $header_frame_repeat = 'repeat-x';
      $header_frame_position = 'left top ' . $ta_header_frame_pic_margin . 'px';
      break;
    case 'bottom_x':
      $header_frame_repeat = 'repeat-x';
      $header_frame_position = 'left bottom ' . $ta_header_frame_pic_margin . 'px';
      break;
    case 'top_only':
      $header_frame_repeat = 'no-repeat';
      $header_frame_position = 'center top ' . $ta_header_frame_pic_margin . 'px';
      break;
    case 'bottom_only':
      $header_frame_repeat = 'no-repeat';
      $header_frame_position = 'center bottom ' . $ta_header_frame_pic_margin . 'px';
      break;
    case 'x_y':
      $header_frame_repeat = 'repeat';
      $header_frame_position = 'left top';
      break;
  }
  if ( 'valid' == $ta_header_bannerarea2wrap_onoff ) { ?>
#header-container {
  display: none;
}

#outer-header-container {
  display: block;
<?php
    if ( 'invalid' == $ta_header_frame_grad_onoff ) { ?>
  background-color: <?php echo $ta_header_frame_color; ?>;
<?php
      if ( 'no_image' != $ta_header_frame_pic ) { ?>
  background-image: url("<?php echo $ta_header_frame_pic; ?>");
<?php
      }
    } else {
      ta_gradient_color_style( 'ta_header_frame_color', $ta_header_frame_pic );
    }
    if ( 'no_image' != $ta_header_frame_pic ) { ?>
  background-repeat: <?php echo $header_frame_repeat; ?>;
  background-position: <?php echo $header_frame_position; ?>;
<?php
    } ?>
  opacity: <?php echo $ta_header_bannerarea2wrap_opacity; ?>;
  position: fixed;
  width: 100%;
  top: 0;
  height: <?php echo $ta_header_height; ?>px;
  z-index: 999;
}

#header {
  height: <?php echo $ta_header_height; ?>px;
  z-index: 999;
}

#wrap {
  margin-top: <?php echo $ta_header_height; ?>px;
}

<?php
  } else { ?>
#header-container {
  display: block;
<?php
    if ( 'valid' == $ta_common_side2wrap_onoff ) { ?>
  width: 100%;
<?php
    } ?>
}

#outer-header-container {
  display: none;
}

#header {
<?php
    if ( 'invalid' == $ta_header_frame_grad_onoff ) { ?>
  background-color: <?php echo $ta_header_frame_color; ?>;
<?php
      if ( 'no_image' != $ta_header_frame_pic ) { ?>
  background-image: url("<?php echo $ta_header_frame_pic; ?>");
<?php
      }
    } else {
      ta_gradient_color_style( 'ta_header_frame_color', $ta_header_frame_pic );
    }
    if ( 'no_image' != $ta_header_frame_pic ) { ?>
  background-repeat: <?php echo $header_frame_repeat; ?>;
  background-position: <?php echo $header_frame_position; ?>;
<?php
    } ?>
  height: <?php echo $ta_header_height; ?>px;
}

<?php
  } ?>
#header_freearea {
  font-size: <?php echo $ta_header_font_size; ?>%;
<?php
  if ( 'valid' == $ta_header_font_anchor_onlyfor_onoff ) { ?>
  color: <?php echo $ta_header_font_normal_text_color; ?>;
<?php
  } ?>
}

<?php
  if ( 'valid' == $ta_header_font_anchor_onlyfor_onoff ) { ?>
#header_freearea a:link,
#header_freearea a:visited {
  color: <?php echo $ta_header_font_anchor_color; ?>;
  text-decoration: <?php echo $ta_header_font_anchor_under; ?>;
}

#header_freearea a:hover,
#header_freearea a:active {
  color: <?php echo $ta_header_font_anchor_colorhover; ?>;
  text-decoration: <?php echo $ta_header_font_anchor_underhover; ?>;
}

<?php
  }
  ta_paragraph_style( 'ta_header_font', '#main #header_freearea' );
  ta_paragraph_style( 'ta_header_font', '#header_freearea' ); ?>

/******************* ロゴエリア *******************/
<?php
  /******************* ロゴエリア *******************/
  $header_width = ta_read_op( 'ta_common_frame_width' );
  $ta_header_logo_width_ratio = ta_read_op( 'ta_header_logo_width' );
  $ta_header_logo_width = floor( $header_width * $ta_header_logo_width_ratio / 100 );
  $ta_header_logo_top_padding = ta_read_op( 'ta_header_logo_top_padding' );
  $ta_header_logo_left_padding_ratio = ta_read_op( 'ta_header_logo_left_padding' );
  $ta_header_logo_left_padding = floor( $header_width * $ta_header_logo_left_padding_ratio / 100 );
  $ta_header_logo_right_padding_ratio = ta_read_op( 'ta_header_logo_right_padding' );
  $ta_header_logo_right_padding = floor( $header_width * $ta_header_logo_right_padding_ratio / 100 );
  $ta_header_logoimg_height = ta_read_op( 'ta_header_logoimg_height' );
  $ta_header_logo_contents_layout = ta_read_op( 'ta_header_logo_contents_layout' );
  $ta_header_h1_size = ta_read_op( 'ta_header_h1_size' );
  $ta_header_h1_lineheight = ta_read_op( 'ta_header_h1_lineheight' );
  $ta_header_h1_margin_t = ta_read_op( 'ta_header_h1_margin_t' );
  $ta_header_h1_margin_b = ta_read_op( 'ta_header_h1_margin_b' );
  $ta_header_h1_margin_l = ta_read_op( 'ta_header_h1_margin_l' );
  $ta_header_h1_content_color = ta_select_color_w_image_color( 'ta_header_h1_content_color' );
  $ta_header_h1_content_color_fontweight = ta_read_op( 'ta_header_h1_content_color_fontweight' );
  $ta_header_h1_content_anchor_color = ta_select_color_w_image_color( 'ta_header_h1_content_anchor_color' );
  $ta_header_h1_content_anchor_under = ( 'valid' == ta_read_op( 'ta_header_h1_content_anchor_under' ) ) ? 'underline' : 'none';
  $ta_header_h1_content_anchor_colorhover = ta_select_color_w_image_color( 'ta_header_h1_content_anchor_colorhover' );
  $ta_header_h1_content_anchor_underhover = ( 'valid' == ta_read_op( 'ta_header_h1_content_anchor_underhover' ) ) ? 'underline' : 'none';
  $ta_header_h1_long_onoff = ta_read_op( 'ta_header_h1_long_onoff' );
  $ta_header_logo_text_size = ta_read_op( 'ta_header_logo_text_size' );
  $ta_header_logo_text_fontweight = ta_read_op( 'ta_header_logo_text_fontweight' );
  $ta_header_logo_text_color = ta_select_color_w_image_color( 'ta_header_logo_text_color' );
  $ta_header_logo_text_under_onoff = ( 'valid' == ta_read_op( 'ta_header_logo_text_under_onoff' ) ) ? 'underline' : 'none';
  $ta_header_logo_text_hover = ta_select_color_w_image_color( 'ta_header_logo_text_hover' );
  $ta_header_logo_text_hoverunder_onoff = ( 'valid' == ta_read_op( 'ta_header_logo_text_hoverunder_onoff' ) ) ? 'underline' : 'none'; ?>
#logo-group {
<?php
  if ( 'valid' == $ta_common_side2wrap_onoff ) { ?>
  width: <?php echo $ta_header_logo_width_ratio; ?>%;
  margin-left: <?php echo $ta_header_logo_left_padding_ratio; ?>%;
  margin-right: <?php echo $ta_header_logo_right_padding_ratio; ?>%;
<?php
  } else { ?>
  width: <?php echo $ta_header_logo_width; ?>px;
  margin-left: <?php echo $ta_header_logo_left_padding; ?>px;
  margin-right: <?php echo $ta_header_logo_right_padding; ?>px;
<?php
  } ?>
  padding-top: <?php echo $ta_header_logo_top_padding; ?>px;
  overflow: hidden;
  float: left;
  text-align: <?php echo $ta_header_logo_contents_layout; ?>;
}

#logo-group a {
  color: <?php echo $ta_header_logo_text_color; ?>;
  text-decoration: <?php echo $ta_header_logo_text_under_onoff; ?>;
}

#logo-group a:hover {
  color: <?php echo $ta_header_logo_text_hover; ?>;
  text-decoration: <?php echo $ta_header_logo_text_hoverunder_onoff; ?>;
}

#logo-group-img {
<?php
  if ( 'valid' == $ta_common_side2wrap_onoff ) { ?>
  width: 100%;
<?php
  } else { ?>
  width: <?php echo $ta_header_logo_width; ?>px;
<?php
  } ?>
  max-height: <?php echo $ta_header_logoimg_height; ?>px;
  height: auto;
  overflow: hidden;
  margin: 0;
  clear: both;
}

#logo-group-img img {
  max-height: <?php echo $ta_header_logoimg_height; ?>px;
  width: auto;
  height: auto;
<?php
  if ( 'valid' == $ta_common_side2wrap_onoff ) { ?>
  max-width: 100%;
<?php
  } else { ?>
  max-width: <?php echo $ta_header_logo_width; ?>px;
<?php
  } ?>
}

#logo-group-img a {
  display: block;
}

#logo-group-noimg {
  font-size: <?php echo $ta_header_logo_text_size; ?>px;
  font-weight: <?php echo $ta_header_logo_text_fontweight; ?>;
  overflow: hidden;
  clear: both;
  height: auto;
  line-height: 1.3em;
}

#logo-group-noanc {
  color: <?php echo $ta_header_logo_text_color; ?>;
}

#logo-group-h1-text {
<?php
  if ( 'valid' == $ta_common_side2wrap_onoff ) {
    if ( 'valid' == $ta_header_h1_long_onoff ) { ?>
  width: 100%;
  position: absolute;
  z-index: 999;
<?php
    } else { ?>
  width: 100%;
<?php
    }
  } else {
    if ( 'valid' == $ta_header_h1_long_onoff ) { ?>
  width: <?php echo $header_width; ?>px;
  position: absolute;
  z-index: 999;
<?php
    } else { ?>
  width: <?php echo $ta_header_logo_width; ?>px;
<?php
    }
  } ?>
  font-size: <?php echo $ta_header_h1_size; ?>px;
  line-height: <?php echo $ta_header_h1_lineheight; ?>em;
  font-weight: <?php echo $ta_header_h1_content_color_fontweight; ?>;
  color: <?php echo $ta_header_h1_content_color; ?>;
  margin-top: <?php echo $ta_header_h1_margin_t; ?>px;
  margin-bottom: <?php echo $ta_header_h1_margin_b; ?>px;
  margin-left: <?php echo $ta_header_h1_margin_l; ?>px;
  margin-right: 0;
  overflow: hidden;
  clear: both;
}

#banner-area #logo-group #logo-group-h1-text a {
  color: <?php echo $ta_header_h1_content_anchor_color; ?>;
  text-decoration: <?php echo $ta_header_h1_content_anchor_under; ?>;
}

#banner-area #logo-group #logo-group-h1-text a:hover {
  color: <?php echo $ta_header_h1_content_anchor_colorhover; ?>;
  text-decoration: <?php echo $ta_header_h1_content_anchor_underhover; ?>;
}

<?php
if ( 'valid' == $ta_header_h1_long_onoff ) { ?>
#logo-group-img {
  margin-top: <?php echo round($ta_header_h1_size * $ta_header_h1_lineheight + $ta_header_h1_margin_t + $ta_header_h1_margin_b); ?>px;
}
<?php
} ?>

/******************* ヘッダーSNSグループ共通CSS *******************/
.sns-group {
  width: 316px;
  height: auto;
  clear: both;
  text-align: right;
  display: inline-block;
  vertical-align: bottom;
}

.sns-group ul {
  width: 316px;
  height: auto;
  margin: 0;
  padding: 0;
}

.sns-group ul.ta-sns-box-height {
  height: 20px;
}

.sns-group ul li {
  display: inline-block;
  list-style: outside none none;
  margin-right: 5px;
  vertical-align: top;
}

/******************* 連絡先エリア *******************/
<?php
  /******************* 連絡先エリア *******************/
  $ta_header_info_width_ratio = ta_read_op( 'ta_header_info_width' );
  $ta_header_info_width = floor( $header_width * $ta_header_info_width_ratio / 100 );
  $ta_header_info_top_padding = ta_read_op( 'ta_header_info_top_padding' );
  $ta_header_info_right_padding_ratio = ta_read_op( 'ta_header_info_right_padding' );
  $ta_header_info_right_padding = floor( $header_width * $ta_header_info_right_padding_ratio / 100 );
  $ta_header_infoimg_height = ta_read_op( 'ta_header_infoimg_height' );
  $ta_header_info_contents_layout = ta_read_op( 'ta_header_info_contents_layout' );
  $ta_header_info_menu_left_margin = ta_read_op( 'ta_header_info_menu_left_margin' );
  $ta_header_info_menu_margin2info_pic = ta_read_op( 'ta_header_info_menu_margin2info_pic' );
  $ta_header_info_simplemenu_fontsize = ta_read_op( 'ta_header_info_simplemenu_fontsize' );
  $ta_header_info_simplemenu_fontweight = ta_read_op( 'ta_header_info_simplemenu_fontweight' );
  $ta_header_info_simplemenu_underline = ( 'valid' == ta_read_op( 'ta_header_info_simplemenu_underline_onoff' ) ) ? 'underline' : 'none';
  $ta_header_info_simplemenu_hoverunderline = ( 'valid' == ta_read_op( 'ta_header_info_simplemenu_hoverunderline_onoff' ) ) ? 'underline' : 'none';
  $ta_header_info_simplemenu_color = ta_select_color_w_image_color( 'ta_header_info_simplemenu_color' );
  $ta_header_info_simplemenu_colorhover = ta_select_color_w_image_color( 'ta_header_info_simplemenu_colorhover' );
  $ta_header_info_simplemenu_layout = ta_read_op( 'ta_header_info_simplemenu_layout' );
  $ta_header_info_simplemenu_num = ta_read_op( 'ta_header_info_simplemenu_num' );
  $ta_header_info_sns_margin2info_pic = ta_read_op( 'ta_header_info_sns_margin2info_pic' );
  $ta_header_info_text_size = ta_read_op( 'ta_header_info_text_size' );
  $ta_header_info_text_fontweight = ta_read_op( 'ta_header_info_text_fontweight' );
  $ta_header_info_text_color = ta_select_color_w_image_color( 'ta_header_info_text_color' );
  $ta_header_info_text_under_onoff = ( 'valid' == ta_read_op( 'ta_header_info_text_under_onoff' ) ) ? 'underline' : 'none';
  $ta_header_info_text_hover = ta_select_color_w_image_color( 'ta_header_info_text_hover' );
  $ta_header_info_text_hoverunder_onoff = ( 'valid' == ta_read_op( 'ta_header_info_text_hoverunder_onoff' ) ) ? 'underline' : 'none'; ?>
#info-group {
<?php
  if ( 'valid' == $ta_common_side2wrap_onoff ) { ?>
  width: <?php echo $ta_header_info_width_ratio; ?>%;
  margin-right: <?php echo $ta_header_info_right_padding_ratio; ?>%;
<?php
  } else { ?>
  width: <?php echo $ta_header_info_width; ?>px;
  margin-right: <?php echo $ta_header_info_right_padding; ?>px;
<?php
  } ?>
  padding-top: <?php echo $ta_header_info_top_padding; ?>px;
  padding-left: 0;
  padding-bottom: 0;
  overflow: hidden;
  float: left;
  text-align: <?php echo $ta_header_info_contents_layout; ?>;
}

#ta-headertop-info-menu {
  margin-left: <?php echo $ta_header_info_menu_left_margin; ?>px;
  margin-bottom: <?php echo $ta_header_info_menu_margin2info_pic; ?>px;
  clear: both;
<?php
  if ( 'valid' != $ta_header_bannerarea2wrap_onoff && 'valid' == $ta_common_side2wrap_onoff ) { ?>
  width : 100%; /* IE8以下とAndroid4.3以下用 */
  width : -webkit-calc( 100% - <?php echo $ta_header_info_menu_left_margin; ?>px );
  width : calc( 100% - <?php echo $ta_header_info_menu_left_margin; ?>px );
<?php
  } else { ?>
  width: <?php echo $ta_header_info_width - $ta_header_info_menu_left_margin; ?>px;
<?php
  } ?>
}

#ta-headertop-info-menu ul {
  display: inline-block;
  vertical-align: bottom;
  width: 100%;
}

#ta-headertop-info-menu li {
<?php
  if ( 'normal' == $ta_header_info_simplemenu_layout ) { ?>
  float: left;
  margin-left: <?php echo $ta_header_info_simplemenu_num; ?>em;
<?php
  } else if ( 'right' == $ta_header_info_simplemenu_layout ) { ?>
  float: right;
  margin-right: <?php echo $ta_header_info_simplemenu_num; ?>em;
<?php
  } else {
    if ( 0 != $ta_header_info_simplemenu_num ) { ?>
  width: <?php echo ( 100 / $ta_header_info_simplemenu_num ); ?>%;
  text-align: center;
  float: left;
<?php
    } else { ?>
  float: left;
  margin-left: <?php echo $ta_header_info_simplemenu_num; ?>em;
<?php
    }
  } ?>
}

#ta-headertop-info-menu li:first-child {
<?php
  if ( 'normal' == $ta_header_info_simplemenu_layout ) { ?>
  margin-left: 0;
<?php
  } else if ( 'right' == $ta_header_info_simplemenu_layout ) { ?>
  margin-right: 0;
<?php
  } else {
    if ( 0 != $ta_header_info_simplemenu_num ) { ?>
  width: <?php echo ( 100 / $ta_header_info_simplemenu_num ); ?>%;
  text-align: center;
<?php
    } else { ?>
  margin-left: 0;
<?php
    }
  } ?>
}

#ta-headertop-info-menu li a {
  font-size: <?php echo $ta_header_info_simplemenu_fontsize; ?>px;
  font-weight: <?php echo $ta_header_info_simplemenu_fontweight; ?>;
  text-decoration: <?php echo $ta_header_info_simplemenu_underline; ?>;
  color: <?php echo $ta_header_info_simplemenu_color; ?>;
}

#ta-headertop-info-menu li a:hover {
  color: <?php echo $ta_header_info_simplemenu_colorhover; ?>;
  text-decoration: <?php echo $ta_header_info_simplemenu_hoverunderline; ?>;
}

#ta-headertop-info-menu li li {
  display: none;
}

#info-group-img {
<?php
  if ( 'valid' == $ta_common_side2wrap_onoff ) { ?>
  width: 100%;
<?php
  } else { ?>
  width: <?php echo $ta_header_info_width; ?>px;
<?php
  } ?>
  max-height: <?php echo $ta_header_infoimg_height; ?>px;
  height: auto;
  overflow: hidden;
  margin: 0;
  clear: both;
}

#info-group-img img {
  max-height: <?php echo $ta_header_infoimg_height; ?>px;
  width: auto;
  height: auto;
<?php
  if ( 'valid' == $ta_common_side2wrap_onoff ) { ?>
  max-width: 100%;
<?php
  } else { ?>
  max-width: <?php echo $ta_header_info_width; ?>px;
<?php
  } ?>
}

#info-group-img a {
  color: <?php echo $ta_header_info_text_color; ?>;
  display: block;
  text-decoration: <?php echo $ta_header_info_text_under_onoff; ?>;
}

#info-group-img a:hover {
  color: <?php echo $ta_header_info_text_hover; ?>;
  text-decoration: <?php echo $ta_header_info_text_hoverunder_onoff; ?>;
}

#info-group-noimg {
  font-size: <?php echo $ta_header_info_text_size; ?>px;
  font-weight: <?php echo $ta_header_info_text_fontweight; ?>;
  overflow: hidden;
  clear: both;
  height: auto;
  line-height: 1.3em;
}

#info-group-noanc {
  color: <?php echo $ta_header_info_text_color; ?>;
}

#info-group .sns-group {
<?php
  if ( 'valid' != $ta_header_bannerarea2wrap_onoff && 'valid' == $ta_common_side2wrap_onoff ) { ?>
  width: 100%;
<?php
  } else { ?>
  width: <?php echo $ta_header_info_width; ?>px;
<?php
  } ?>
  margin-top:  <?php echo $ta_header_info_sns_margin2info_pic; ?>px;
  text-align: <?php echo $ta_header_info_contents_layout; ?>;
}

#info-group .sns-group ul {
<?php
  if ( 'valid' != $ta_header_bannerarea2wrap_onoff && 'valid' == $ta_common_side2wrap_onoff ) { ?>
  width: 100%;
<?php
  } else { ?>
  width: <?php echo $ta_header_info_width; ?>px;
<?php
  } ?>
}

/******************* 検索エリア *******************/
<?php
  /******************* 検索エリア *******************/
  $ta_header_search_width_ratio = ta_read_op( 'ta_header_search_width' );
  $ta_header_search_width = floor( $header_width * $ta_header_search_width_ratio / 100 );
  $ta_header_search_top_padding = ta_read_op( 'ta_header_search_top_padding' );
  $ta_header_search_right_padding_ratio = ta_read_op( 'ta_header_search_right_padding' );
  $ta_header_search_right_padding = floor( $header_width * $ta_header_search_right_padding_ratio / 100 );
  $ta_header_search_width_size = ta_read_op( 'ta_header_search_width_size' );
  $ta_header_search_height_size = ta_read_op( 'ta_header_search_height_size' );
  $ta_header_search_color = ta_select_color_w_image_color( 'ta_header_search_color' );
  $ta_header_search_bgcolor = ta_select_color_w_image_color( 'ta_header_search_bgcolor' );
  $ta_header_search_border_color = ta_select_color_w_image_color( 'ta_header_search_border_color' );
  $ta_header_search_glass = ta_read_op( 'ta_header_search_glass' );
  $ta_header_search_submit_title = ta_read_op( 'ta_header_search_submit_title' );
  $ta_header_search_height_size = ta_read_op( 'ta_header_search_height_size' );
  $ta_header_search_submit_title_color = ta_select_color_w_image_color( 'ta_header_search_submit_title_color' );
  $ta_header_search_submit_bgcolor = ta_select_color_w_image_color( 'ta_header_search_submit_bgcolor' );
  $ta_header_search_submit_width_size = ta_read_op( 'ta_header_search_submit_width_size' );
  $ta_header_search_radius_size = ta_read_op( 'ta_header_search_radius_size' );
  $ta_header_search_menu_right_margin = ta_read_op( 'ta_header_search_menu_right_margin' );
  $ta_header_search_menu_margin2search_pic = ta_read_op( 'ta_header_search_menu_margin2search_pic' );
  $ta_header_search_simplemenu_fontsize = ta_read_op( 'ta_header_search_simplemenu_fontsize' );
  $ta_header_search_simplemenu_fontweight = ta_read_op( 'ta_header_search_simplemenu_fontweight' );
  $ta_header_search_simplemenu_underline = ( 'valid' == ta_read_op( 'ta_header_search_simplemenu_underline_onoff' ) ) ? 'underline' : 'none';
  $ta_header_search_simplemenu_hoverunderline = ( 'valid' == ta_read_op( 'ta_header_search_simplemenu_hoverunderline_onoff' ) ) ? 'underline' : 'none';
  $ta_header_search_simplemenu_color = ta_select_color_w_image_color( 'ta_header_search_simplemenu_color' );
  $ta_header_search_simplemenu_colorhover = ta_select_color_w_image_color( 'ta_header_search_simplemenu_colorhover' );
  $ta_header_search_simplemenu_layout = ta_read_op( 'ta_header_search_simplemenu_layout' );
  $ta_header_search_simplemenu_num = ta_read_op( 'ta_header_search_simplemenu_num' );
  $ta_header_search_sns_margin2search_pic = ta_read_op( 'ta_header_search_sns_margin2search_pic' ); ?>
#search-group {
<?php
  if ( 'valid' == $ta_common_side2wrap_onoff ) { ?>
  width: <?php echo $ta_header_search_width_ratio; ?>%;
  margin-right: <?php echo $ta_header_search_right_padding_ratio; ?>%;
<?php
  } else { ?>
  width: <?php echo $ta_header_search_width; ?>px;
  margin-right: <?php echo $ta_header_search_right_padding; ?>px;
<?php
  } ?>
  padding-top: <?php echo $ta_header_search_top_padding; ?>px;
  float: right;
  text-align: right;
}

#ta-headertop-search-menu {
  margin-right: <?php echo $ta_header_search_menu_right_margin; ?>px;
  margin-bottom: <?php echo $ta_header_search_menu_margin2search_pic; ?>px;
  clear: both;
<?php
  if ( 'valid' == $ta_common_side2wrap_onoff ) { ?>
  width : 100%; /* IE8以下とAndroid4.3以下用 */
  width : -webkit-calc( 100% - <?php echo $ta_header_search_menu_right_margin; ?>px );
  width : calc( 100% - <?php echo $ta_header_search_menu_right_margin; ?>px );
<?php
  } else { ?>
  width: <?php echo $ta_header_search_width - $ta_header_search_menu_right_margin; ?>px;
<?php
  } ?>
}

#ta-headertop-search-menu ul {
  display: inline-block;
  vertical-align: bottom;
<?php
  if ( 'even' == $ta_header_search_simplemenu_layout ) { ?>
  width: 100%;
<?php
  } ?>
}

#ta-headertop-search-menu li {
<?php
  if ( 'normal' == $ta_header_search_simplemenu_layout ) { ?>
  float: left;
  margin-left: <?php echo $ta_header_search_simplemenu_num; ?>em;
<?php
  } else {
    if ( 0 != $ta_header_search_simplemenu_num ) { ?>
  width: <?php echo ( 100 / $ta_header_search_simplemenu_num ); ?>%;
  text-align: center;
  float: left;
<?php
    } else { ?>
  float: left;
  margin-left: <?php echo $ta_header_search_simplemenu_num; ?>em;
<?php
    }
  } ?>
}

#ta-headertop-search-menu li:first-child {
<?php
  if ( 'normal' == $ta_header_search_simplemenu_layout ) { ?>
  margin-left: 0;
<?php
  } else {
    if ( 0 != $ta_header_search_simplemenu_num ) { ?>
  width: <?php echo ( 100 / $ta_header_search_simplemenu_num ); ?>%;
  text-align: center;
<?php
    } else { ?>
  margin-left: 0;
<?php
    }
  } ?>
}

#ta-headertop-search-menu li a {
  font-size: <?php echo $ta_header_search_simplemenu_fontsize; ?>px;
  font-weight: <?php echo $ta_header_search_simplemenu_fontweight; ?>;
  text-decoration: <?php echo $ta_header_search_simplemenu_underline; ?>;
  color: <?php echo $ta_header_search_simplemenu_color; ?>;
}

#ta-headertop-search-menu li a:hover {
  color: <?php echo $ta_header_search_simplemenu_colorhover; ?>;
  text-decoration: <?php echo $ta_header_search_simplemenu_hoverunderline; ?>;
}

#ta-headertop-search-menu li li {
  display: none;
}

#search-group #search {
<?php
  if ( 0 == $ta_header_search_width_size ) { ?>
  display: none;
<?php
  } else { ?>
  display: block;
  width: <?php echo $ta_header_search_width_size; ?>%;
  float: right;
<?php
  } ?>
}

#search-group #search #searchform {
<?php
  if ( 0 == $ta_header_search_width_size ) { ?>
  display: none;
<?php
  } else { ?>
  width: 100%;
<?php
  } ?>
}

#searchform {
<?php
  if ( 0 == $ta_header_search_width_size ) { ?>
  display: none;
<?php
  } else { ?>
  display: inline-block;
  vertical-align: bottom;
  width: 180px;
<?php
  } ?>
}

#searchform #searchbox {
  width: 100%;
}

#searchform #searchbox p {
  margin: 0;
}

#searchform #searchbox input#s {
  display: block;
  float: left;
  width: <?php echo ( 100 - $ta_header_search_submit_width_size ); ?>%;
  height: <?php echo $ta_header_search_height_size; ?>em;
  color: <?php echo $ta_header_search_color; ?>;
  background-color: <?php echo $ta_header_search_bgcolor; ?>;
  border: medium none;
  box-sizing: border-box;
  border: 1px solid <?php echo $ta_header_search_border_color; ?>;
  border-top-left-radius: <?php echo $ta_header_search_radius_size; ?>px;
  border-bottom-left-radius: <?php echo $ta_header_search_radius_size; ?>px;
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
  padding: 0;
  margin: 0;
}

#searchform #searchbox #searchsubmit {
<?php
  if ( 'no_disp' == $ta_header_search_submit_title ) { ?>
  background: url("<?php echo get_template_directory_uri(); ?>/images/ta-header-images/search_glass_<?php echo $ta_header_search_glass; ?>.png") no-repeat center center <?php echo $ta_header_search_submit_bgcolor; ?>;
  background-size: contain;
<?php
  } else { ?>
  color: <?php echo $ta_header_search_submit_title_color; ?>;
  background-color: <?php echo $ta_header_search_submit_bgcolor; ?>;
<?php
  } ?>
  float: left;
  border: medium none;
  box-sizing: border-box;
  cursor: pointer;
  width: <?php echo $ta_header_search_submit_width_size; ?>%;
  height: <?php echo $ta_header_search_height_size; ?>em;
  display: block;
  border-top: 1px solid <?php echo $ta_header_search_border_color; ?>;
  border-right: 1px solid <?php echo $ta_header_search_border_color; ?>;
  border-bottom: 1px solid <?php echo $ta_header_search_border_color; ?>;
  border-top-right-radius: <?php echo $ta_header_search_radius_size; ?>px;
  border-bottom-right-radius: <?php echo $ta_header_search_radius_size; ?>px;
  border-top-left-radius: 0;
  border-bottom-left-radius: 0;
}

#searchform #searchbox #searchsubmit:hover {
  opacity: 0.7;
}

#search-group .sns-group {
<?php
  if ( 'valid' == $ta_common_side2wrap_onoff ) { ?>
  width: 100%;
<?php
  } else { ?>
  width: <?php echo $ta_header_search_width; ?>px;
<?php
  } ?>
  margin-top: <?php echo $ta_header_search_sns_margin2search_pic; ?>px;
}

#search-group .sns-group ul {
<?php
  if ( 'valid' == $ta_common_side2wrap_onoff ) { ?>
  width: 100%;
<?php
  } else { ?>
  width: <?php echo $ta_header_search_width; ?>px;
<?php
  } ?>
}

/******************* グローバル（ヘッダー）メニュー *******************/
<?php
  /******************* グローバル（ヘッダー）メニュー *******************/
  $ta_header_glabalmenu_wholeheight = ta_read_op( 'ta_header_glabalmenu_wholeheight' );
  $ta_header_glabalmenu_topmargin = ta_read_op( 'ta_header_glabalmenu_topmargin' );
  $ta_header_glabalmenu_bottommargin = ta_read_op( 'ta_header_glabalmenu_bottommargin' );
  $ta_header_glabalmenu_itemnum = ta_read_op( 'ta_header_glabalmenu_itemnum' );
  $ta_header_glabalmenu_fontsize = ta_read_op( 'ta_header_glabalmenu_fontsize' );
  $ta_header_glabalmenu_fontweight = ta_read_op( 'ta_header_glabalmenu_fontweight' );
  $ta_header_glabalmenu_fontcolor = ta_select_color_w_image_color( 'ta_header_glabalmenu_fontcolor' );
  $ta_header_glabalmenu_fontcolorhover = ta_select_color_w_image_color( 'ta_header_glabalmenu_fontcolorhover' );
  $ta_header_glabalmenu_backcolor = ta_select_color_w_image_color( 'ta_header_glabalmenu_backcolor' );
  if ( TA_HIEND_PI ) {
    $ta_header_glabalmenu_backcolor_grad_onoff = ta_read_op( 'ta_header_glabalmenu_backcolor_grad_onoff' );
  } else {
    $ta_header_glabalmenu_backcolor_grad_onoff = "invalid";
  }
  $ta_header_glabalmenu_backcolorhover = ta_select_color_w_image_color( 'ta_header_glabalmenu_backcolorhover' );
  if ( TA_HIEND_PI ) {
    $ta_header_glabalmenu_backcolorhover_grad_onoff = ta_read_op( 'ta_header_glabalmenu_backcolorhover_grad_onoff' );
  } else {
    $ta_header_glabalmenu_backcolorhover_grad_onoff = "invalid";
  }
  $ta_header_glabalmenu_frame_select = ta_read_op( 'ta_header_glabalmenu_frame_select' );
  $ta_header_glabalmenu_frame_color = ta_select_color_w_image_color( 'ta_header_glabalmenu_frame_color' );
  $ta_header_glabalmenu_frame_size = ta_read_op( 'ta_header_glabalmenu_frame_size' );
  $ta_header_glabalmenu_frame_margin_size = ta_read_op( 'ta_header_glabalmenu_frame_margin_size' );
  $ta_header_glabalmenu_current_frame_color_onoff = ta_read_op( 'ta_header_glabalmenu_current_frame_color_onoff' );
  $ta_header_glabalmenu_current_text_color = ta_select_color_w_image_color( 'ta_header_glabalmenu_current_text_color' );
  $ta_header_glabalmenu_current_frame_color = ta_select_color_w_image_color( 'ta_header_glabalmenu_current_frame_color' );
  if ( TA_HIEND_PI ) {
    $ta_header_glabalmenu_current_frame_color_grad_onoff = ta_read_op( 'ta_header_glabalmenu_current_frame_color_grad_onoff' );
  } else {
    $ta_header_glabalmenu_current_frame_color_grad_onoff = "invalid";
  }
  $ta_header_glabalsubmenu_fontsize = ta_read_op( 'ta_header_glabalsubmenu_fontsize' );
  $ta_header_glabalsubmenu_fontweight = ta_read_op( 'ta_header_glabalsubmenu_fontweight' );
  $ta_header_glabalsubmenu_fontcolor = ta_select_color_w_image_color( 'ta_header_glabalsubmenu_fontcolor' );
  $ta_header_glabalsubmenu_fontcolorhover = ta_select_color_w_image_color( 'ta_header_glabalsubmenu_fontcolorhover' );
  $ta_header_glabalsubmenu_backcolor = ta_select_color_w_image_color( 'ta_header_glabalsubmenu_backcolor' );
  if ( TA_HIEND_PI ) {
    $ta_header_glabalsubmenu_backcolor_grad_onoff = ta_read_op( 'ta_header_glabalsubmenu_backcolor_grad_onoff' );
  } else {
    $ta_header_glabalsubmenu_backcolor_grad_onoff = "invalid";
  }
  $ta_header_glabalsubmenu_backcolorhover = ta_select_color_w_image_color( 'ta_header_glabalsubmenu_backcolorhover' );
  if ( TA_HIEND_PI ) {
    $ta_header_glabalsubmenu_backcolorhover_grad_onoff = ta_read_op( 'ta_header_glabalsubmenu_backcolorhover_grad_onoff' );
  } else {
    $ta_header_glabalsubmenu_backcolorhover_grad_onoff = "invalid";
  }
  $ta_header_glabalsubmenu_width_ratio = ta_read_op( 'ta_header_glabalsubmenu_width' );
  $ta_header_glabalsubmenu_height_ratio = ta_read_op( 'ta_header_glabalsubmenu_height' );
  $ta_header_glabalsubmenu_border_size = ta_read_op( 'ta_header_glabalsubmenu_border_size' );
  $ta_header_glabalsubmenu_border_color = ta_select_color_w_image_color( 'ta_header_glabalsubmenu_border_color' );
  $ta_header_glabalsubmenu_border_kind = ta_read_op( 'ta_header_glabalsubmenu_border_kind' ); ?>
#header-globalnavi-image-container {
  display: inline-block;
  vertical-align: bottom;
  width: 100%;
}

#ta-mb-global-navi-group,
#ta-mb-global-navi-menubuttom,
#ta-mb-global-navi-container {
  display: none;
}

#ta-global-navi {
  width: 100%;
  margin-top: <?php echo $ta_header_glabalmenu_topmargin; ?>px;
  margin-bottom: <?php echo $ta_header_glabalmenu_bottommargin; ?>px;
  margin-left: auto;
  margin-right: auto;
  content: '';
  display: table;
}

<?php
  $ta_header_glabalmenu_itemnum_noedge = $ta_header_glabalmenu_itemnum - 1;
  if ( $ta_header_glabalmenu_itemnum > 1 ) { ?>
#ta-global-navi > ul > li:not(:last-child) {
<?php
    if ( 'vertical' == $ta_header_glabalmenu_frame_select || 'square' == $ta_header_glabalmenu_frame_select ) { ?>
  width: <?php echo floor( 10 * ( 95 / $ta_header_glabalmenu_itemnum ) ) / 10; ?>%; /* IE8以下とAndroid4.3以下用 95%で枠サイズを許容 */
  width: -webkit-calc(<?php echo floor( 10 * ( 100 / $ta_header_glabalmenu_itemnum ) ) / 10; ?>% - <?php echo 2 * $ta_header_glabalmenu_frame_size; ?>px);
  width: calc(<?php echo floor( 10 * ( 100 / $ta_header_glabalmenu_itemnum ) ) / 10; ?>% - <?php echo 2 * $ta_header_glabalmenu_frame_size; ?>px);
<?php
    } else if ( 'under' == $ta_header_glabalmenu_frame_select || 'over' == $ta_header_glabalmenu_frame_select ) { ?>
  width: <?php echo floor( 10 * $ta_header_glabalmenu_frame_margin_size / $ta_header_glabalmenu_itemnum ) / 10; ?>%;
  margin-right: <?php echo floor( 10 * ( ( 100 - $ta_header_glabalmenu_frame_margin_size ) / $ta_header_glabalmenu_itemnum_noedge ) ) / 10; ?>%;
<?php
    } else { ?>
  width: <?php echo floor( 10 * ( 100 / $ta_header_glabalmenu_itemnum ) ) / 10; ?>%;
<?php
    } ?>
}

#ta-global-navi > ul > li:last-child {
<?php
    if ( 'vertical' == $ta_header_glabalmenu_frame_select || 'square' == $ta_header_glabalmenu_frame_select ) { ?>
  width: <?php echo floor( 10 * ( 95 / $ta_header_glabalmenu_itemnum ) ) / 10; ?>%; /* IE8以下とAndroid4.3以下用 95%で枠サイズを許容 */
  width: -webkit-calc(<?php echo floor( 10 * ( 100 / $ta_header_glabalmenu_itemnum ) ) / 10; ?>% - <?php echo $ta_header_glabalmenu_frame_size; ?>px);
  width: calc(<?php echo floor( 10 * ( 100 / $ta_header_glabalmenu_itemnum ) ) / 10; ?>% - <?php echo $ta_header_glabalmenu_frame_size; ?>px);
<?php
    } else if ( 'under' == $ta_header_glabalmenu_frame_select || 'over' == $ta_header_glabalmenu_frame_select ) { ?>
  width: <?php echo floor( 10 * $ta_header_glabalmenu_frame_margin_size / $ta_header_glabalmenu_itemnum ) / 10; ?>%;
<?php
    } else { ?>
  width: <?php echo floor( 10 * ( 100 / $ta_header_glabalmenu_itemnum ) ) / 10; ?>%;
<?php
    } ?>
}

<?php
  } else if ( $ta_header_glabalmenu_itemnum == 1 ) { ?>
#ta-global-navi > ul > li {
<?php
    if ( 'vertical' == $ta_header_glabalmenu_frame_select || 'square' == $ta_header_glabalmenu_frame_select ) { ?>
  width: <?php echo floor( 10 * ( 95 / $ta_header_glabalmenu_itemnum ) ) / 10; ?>%; /* IE8以下とAndroid4.3以下用 95%で枠サイズを許容 */
  width: -webkit-calc(<?php echo floor( 10 * ( 100 / $ta_header_glabalmenu_itemnum ) ) / 10; ?>% - <?php echo $ta_header_glabalmenu_frame_size; ?>px);
  width: calc(<?php echo floor( 10 * ( 100 / $ta_header_glabalmenu_itemnum ) ) / 10; ?>% - <?php echo $ta_header_glabalmenu_frame_size; ?>px);
<?php
    } else if ( 'under' == $ta_header_glabalmenu_frame_select || 'over' == $ta_header_glabalmenu_frame_select ) { ?>
  width: <?php echo floor( 10 * $ta_header_glabalmenu_frame_margin_size / $ta_header_glabalmenu_itemnum ) / 10; ?>%;
  margin-left: <?php echo floor( 10 * ( ( 100 - $ta_header_glabalmenu_frame_margin_size ) / 2 ) ) / 10; ?>%;
  margin-right: <?php echo floor( 10 * ( ( 100 - $ta_header_glabalmenu_frame_margin_size ) / 2 ) ) / 10; ?>%;
<?php
    } else { ?>
  width: <?php echo floor( 10 * ( 100 / $ta_header_glabalmenu_itemnum ) ) / 10; ?>%;
<?php
    } ?>
}

<?php
  } ?>

#ta-global-navi > ul > li {
  float: left;
  overflow: visible;
}

#ta-global-navi > ul > li:first-child {
<?php
  if ( 0 != $ta_header_glabalmenu_itemnum ) {
    if ( 'vertical' == $ta_header_glabalmenu_frame_select ) { ?>
  border-left: <?php echo $ta_header_glabalmenu_frame_size; ?>px solid <?php echo $ta_header_glabalmenu_frame_color; ?>;
  border-right: <?php echo $ta_header_glabalmenu_frame_size; ?>px solid <?php echo $ta_header_glabalmenu_frame_color; ?>;
<?php
    } else if ( 'square' == $ta_header_glabalmenu_frame_select ) { ?>
  border: <?php echo $ta_header_glabalmenu_frame_size; ?>px solid <?php echo $ta_header_glabalmenu_frame_color; ?>;
<?php
    } else if ( 'under' == $ta_header_glabalmenu_frame_select ) { ?>
  border-bottom: <?php echo $ta_header_glabalmenu_frame_size; ?>px solid <?php echo $ta_header_glabalmenu_frame_color; ?>;
<?php
    } else if ( 'over' == $ta_header_glabalmenu_frame_select ) { ?>
  border-top: <?php echo $ta_header_glabalmenu_frame_size; ?>px solid <?php echo $ta_header_glabalmenu_frame_color; ?>;
<?php
    }
  } ?>
}

#ta-global-navi > ul > li:not(:first-child) {
<?php
  if ( 0 != $ta_header_glabalmenu_itemnum ) {
    if ( 'vertical' == $ta_header_glabalmenu_frame_select ) { ?>
  border-right: <?php echo $ta_header_glabalmenu_frame_size; ?>px solid <?php echo $ta_header_glabalmenu_frame_color; ?>;
<?php
    } else if ( 'square' == $ta_header_glabalmenu_frame_select ) { ?>
  border-top: <?php echo $ta_header_glabalmenu_frame_size; ?>px solid <?php echo $ta_header_glabalmenu_frame_color; ?>;
  border-right: <?php echo $ta_header_glabalmenu_frame_size; ?>px solid <?php echo $ta_header_glabalmenu_frame_color; ?>;
  border-bottom: <?php echo $ta_header_glabalmenu_frame_size; ?>px solid <?php echo $ta_header_glabalmenu_frame_color; ?>;
<?php
    } else if ( 'under' == $ta_header_glabalmenu_frame_select ) { ?>
  border-bottom: <?php echo $ta_header_glabalmenu_frame_size; ?>px solid <?php echo $ta_header_glabalmenu_frame_color; ?>;
<?php
    } else if ( 'over' == $ta_header_glabalmenu_frame_select ) { ?>
  border-top: <?php echo $ta_header_glabalmenu_frame_size; ?>px solid <?php echo $ta_header_glabalmenu_frame_color; ?>;
<?php
    }
  } ?>
}

#ta-global-navi > ul > li > a {
  display: block;
  font-size: <?php echo $ta_header_glabalmenu_fontsize; ?>px;
  font-weight: <?php echo $ta_header_glabalmenu_fontweight; ?>;
  color: <?php echo $ta_header_glabalmenu_fontcolor; ?>;
<?php
  if ( 'invalid' == $ta_header_glabalmenu_backcolor_grad_onoff ) { ?>
  background: none;
  background-color: <?php echo $ta_header_glabalmenu_backcolor; ?>;
<?php
  } else {
    ta_gradient_color_style( 'ta_header_glabalmenu_backcolor' );
  } ?>
  text-align: center;
  padding: 0;
<?php
  if ( 'square' == $ta_header_glabalmenu_frame_select ) { ?>
  height: <?php echo $ta_header_glabalmenu_wholeheight - 2 * $ta_header_glabalmenu_frame_size; ?>px;
<?php
  } else if ( 'under' == $ta_header_glabalmenu_frame_select || 'over' == $ta_header_glabalmenu_frame_select ) { ?>
  height: <?php echo $ta_header_glabalmenu_wholeheight - $ta_header_glabalmenu_frame_size; ?>px;
<?php
  } else { ?>
  height: <?php echo $ta_header_glabalmenu_wholeheight; ?>px;
<?php
  } ?>
  overflow: hidden;
  text-decoration: none;
  line-height: <?php echo $ta_header_glabalmenu_wholeheight; ?>px;
}

<?php
  if ( 'valid' == $ta_header_glabalmenu_current_frame_color_onoff ) { ?>
#ta-global-navi > ul > li.current_page_item > a,
#ta-global-navi > ul > li.current-menu-item > a {
  color: <?php echo $ta_header_glabalmenu_current_text_color; ?>;
<?php
    if ( 'invalid' == $ta_header_glabalmenu_current_frame_color_grad_onoff ) { ?>
  background: none;
  background-color: <?php echo $ta_header_glabalmenu_current_frame_color; ?>;
<?php
    } else {
      ta_gradient_color_style( 'ta_header_glabalmenu_current_frame_color' );
    } ?>
}
<?php
  } ?>

#ta-global-navi > ul > li > a:hover {
  color: <?php echo $ta_header_glabalmenu_fontcolorhover; ?>;
<?php
  if ( 'invalid' == $ta_header_glabalmenu_backcolorhover_grad_onoff ) { ?>
  background: none;
  background-color: <?php echo $ta_header_glabalmenu_backcolorhover; ?>;
<?php
  } else {
    ta_gradient_color_style( 'ta_header_glabalmenu_backcolorhover' );
  } ?>
}

#ta-global-navi li > ul {
  ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=99)";
  /* internet explorer 8 */
  background: #fff;
  filter: alpha(opacity=99);
  /* internet explorer 5~7 */
  display: none;
  position: absolute;
  margin-top: -2px;
  background: rgba(255, 255, 255, 0.9);
  font-size: <?php echo $ta_header_glabalsubmenu_fontsize; ?>px;
  font-weight: <?php echo $ta_header_glabalsubmenu_fontweight; ?>;
}

#ta-global-navi li:hover > ul {
  display: inline-block;
  vertical-align: bottom;
  z-index: 103;
}

#ta-global-navi li li {
  position: relative;
<?php
  if ( 'none' != $ta_header_glabalsubmenu_border_kind ) { ?>
  border-top: <?php echo $ta_header_glabalsubmenu_border_size; ?>px <?php echo $ta_header_glabalsubmenu_border_kind; ?> <?php echo $ta_header_glabalsubmenu_border_color; ?>;
<?php
  } ?>
}

#ta-global-navi li li:first-child {
  border-top: none;
}

#ta-global-navi li li > a {
  display: block;
  padding: 0 2em;
  text-decoration: none;
  color: <?php echo $ta_header_glabalsubmenu_fontcolor; ?>;
<?php
  if ( 'invalid' == $ta_header_glabalsubmenu_backcolor_grad_onoff ) { ?>
  background: none;
  background-color: <?php echo $ta_header_glabalsubmenu_backcolor; ?>;
<?php
  } else {
    ta_gradient_color_style( 'ta_header_glabalsubmenu_backcolor' );
  } ?>
  height: <?php echo $ta_header_glabalmenu_wholeheight * $ta_header_glabalsubmenu_height_ratio / 100; ?>px;
  line-height: <?php echo $ta_header_glabalmenu_wholeheight * $ta_header_glabalsubmenu_height_ratio / 100; ?>px;
  z-index: 103;
}

#ta-global-navi li li > a:hover {
  color: <?php echo $ta_header_glabalsubmenu_fontcolorhover; ?>;
<?php
  if ( 'invalid' == $ta_header_glabalsubmenu_backcolorhover_grad_onoff ) { ?>
  background: none;
  background-color: <?php echo $ta_header_glabalsubmenu_backcolorhover; ?>;
<?php
  } else {
    ta_gradient_color_style( 'ta_header_glabalsubmenu_backcolorhover' );
  } ?>
}

#ta-global-navi li li > ul {
  background: rgba(222, 245, 255, 0.9);
  ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=99)";
  /* internet explorer 8 */
  background: #def5ff;
  filter: alpha(opacity=99);
  /* internet explorer 5~7 */
  display: none;
}

#ta-global-navi li li ul {
  top: 0;
  left: 100%;
  z-index: 103;
}

#ta-global-navi li:last-child li ul {
  top: 0;
  right: 200%;
  z-index: 103;
}

/******************* ヘッダー画像 *******************/
<?php
  /******************* ヘッダー画像 *******************/
  $ta_header_headimg_fontsize = ta_read_op( 'ta_header_headimg_fontsize' );
  $ta_header_headimg_fontweight = ta_read_op( 'ta_header_headimg_fontweight' );
  $ta_header_headimg_fontcolor = ta_select_color_w_image_color( 'ta_header_headimg_fontcolor' );
  $ta_header_headimg_position_x = ta_read_op( 'ta_header_headimg_position_x' );
  $ta_header_headimg_position_y = ta_read_op( 'ta_header_headimg_position_y' ); ?>
#header_image {
  text-align: center;
  padding: 0;
  overflow: hidden;
  position: relative;
  z-index: 101;
}

#header_image a {
  display: block;
  text-decoration: none;
}

#header_image_text {
  font-size: <?php echo $ta_header_headimg_fontsize; ?>px;
  font-weight: <?php echo $ta_header_headimg_fontweight; ?>;
  line-height: 1.3em;
  text-align: left;
  display: block;
  position: absolute;
  color: <?php echo $ta_header_headimg_fontcolor; ?>;
  overflow: hidden;
  left: <?php echo $ta_header_headimg_position_x; ?>px;
  top: <?php echo $ta_header_headimg_position_y; ?>px;
}

/******************* JavaScript設定表示 *******************/
#no-js-disp {
  position: absolute;
  top: 25px;
  width: <?php echo $header_width; ?>px;
  z-index: 105;
}

#no-js-disp p {
  width: <?php echo $header_width; ?>px;
  padding: 0.3em 0;
  text-align: center;
  font-size: 25px;
  font-weight: bold;
  z-index: 105;
  background-color: <?php echo $ta_common_site_hl_color; ?>;
  color: <?php echo $ta_common_site_text_on_hl_color; ?>;
  line-height: 2em;
}



/******************************************************/
/*  TAフォーマット・PHP to CSS・メイン
/******************************************************/

/******************* フレーム *******************/
/***** メインコンテンツ(#main)の背景色・背景画像 */
<?php
  //***** メインコンテンツ(#main)の背景色・背景画像
  $ta_main_frame_color = ta_select_color_w_image_color( 'ta_main_frame_color' );
  if ( TA_HIEND_PI ) {
    $ta_main_frame_grad_onoff = ta_read_op( 'ta_main_frame_color_grad_onoff' );
    $ta_main_frame_pic = ta_read_op( 'ta_main_frame_pic' );
    $ta_main_frame_pic_rule = ta_read_op( 'ta_main_frame_pic_rule' );
    $ta_main_frame_pic_margin = ta_read_op( 'ta_main_frame_pic_margin' );
  } else {
    $ta_main_frame_grad_onoff = "invalid";
    $ta_main_frame_pic = "no_image";
    $ta_main_frame_pic_rule = "top_x";
    $ta_main_frame_pic_margin = '0';
  }
  //***** メイン(#main)標準フォント
  $ta_main_font_size = ta_read_op( 'ta_main_font_size' );
  $ta_main_font_anchor_onlyfor_onoff = ta_read_op( 'ta_main_font_anchor_onlyfor_onoff' );
  $ta_main_font_normal_text_color = ta_select_color_w_image_color( 'ta_main_font_normal_text_color' );
  $ta_main_font_anchor_color = ta_select_color_w_image_color( 'ta_main_font_anchor_color' );
  $ta_main_font_anchor_under = ( 'valid' == ta_read_op( 'ta_main_font_anchor_under' ) ) ? 'underline' : 'none';
  $ta_main_font_anchor_colorhover = ta_select_color_w_image_color( 'ta_main_font_anchor_colorhover' );
  $ta_main_font_anchor_underhover = ( 'valid' == ta_read_op( 'ta_main_font_anchor_underhover' ) ) ? 'underline' : 'none';

  /******************* その他 *******************/
  //***** メインコンテンツ間隔設定: #main .fixed-spaceのmargin-topの値
  $ta_main_fixed_space = ta_read_op( 'ta_main_fixed_space' );
  //***** メイン区切り線表示設定
  $ta_main_separator_size = ta_read_op( 'ta_main_separator_size' );
  $ta_main_separator_kind = ta_read_op( 'ta_main_separator_kind' );
  $ta_main_separator_kind_color = ta_select_color_w_image_color( 'ta_main_separator_kind_color' );
  if ( TA_HIEND_PI ) {
    $ta_main_separator_kind_color_grad_onoff = ta_read_op( 'ta_main_separator_kind_color_grad_onoff' );
  } else {
    $ta_main_separator_kind_color_grad_onoff = "invalid";
  }
  $ta_main_separator_tmargin = ta_read_op( 'ta_main_separator_tmargin' );
  $ta_main_separator_bmargin = ta_read_op( 'ta_main_separator_bmargin' );

  switch ( $ta_main_frame_pic_rule ) {
    case 'top_x':
      $main_frame_repeat = 'repeat-x';
      $main_frame_position = 'left top ' . $ta_main_frame_pic_margin . 'px';
      break;
    case 'bottom_x':
      $main_frame_repeat = 'repeat-x';
      $main_frame_position = 'left bottom ' . $ta_main_frame_pic_margin . 'px';
      break;
    case 'top_only':
      $main_frame_repeat = 'no-repeat';
      $main_frame_position = 'center top ' . $ta_main_frame_pic_margin . 'px';
      break;
    case 'bottom_only':
      $main_frame_repeat = 'no-repeat';
      $main_frame_position = 'center bottom ' . $ta_main_frame_pic_margin . 'px';
      break;
    case 'x_y':
      $main_frame_repeat = 'repeat';
      $main_frame_position = 'left top';
      break;
  } ?>
#main {
  font-size: <?php echo $ta_main_font_size; ?>%;
<?php
  if ( 'invalid' == $ta_main_frame_grad_onoff ) { ?>
  background-color: <?php echo $ta_main_frame_color; ?>;
<?php
    if ( 'no_image' != $ta_main_frame_pic ) { ?>
  background-image: url("<?php echo $ta_main_frame_pic; ?>");
<?php
    }
  } else {
    ta_gradient_color_style( 'ta_main_frame_color', $ta_main_frame_pic );
  }
  if ( 'no_image' != $ta_main_frame_pic ) { ?>
  background-repeat: <?php echo $main_frame_repeat; ?>;
  background-position: <?php echo $main_frame_position; ?>;
<?php
  } ?>
}

#main #content .fixed-space {
  margin-top: <?php echo $ta_main_fixed_space; ?>px;
}

#main #content .fixed-space:first-child {
  margin-top: 0;
}

#main #content .ta-main-separator {
  margin-top: <?php echo $ta_main_separator_tmargin; ?>px;
  margin-bottom: <?php echo $ta_main_separator_bmargin; ?>px;
<?php
  if ( 'invalid' == $ta_main_separator_kind_color_grad_onoff ) { ?>
  border-width: <?php echo $ta_main_separator_size; ?>px 0 0 0;
  border-style: <?php echo $ta_main_separator_kind; ?>;
  border-color: <?php echo $ta_main_separator_kind_color; ?>;
<?php
  } else { ?>
  border: none;
<?php
    ta_gradient_color_style( 'ta_main_separator_kind_color' );
  } ?>
  height: <?php echo $ta_main_separator_size; ?>px;
}

<?php
if ( 'valid' == $ta_main_font_anchor_onlyfor_onoff ) { ?>
#main {
  color: <?php echo $ta_main_font_normal_text_color; ?>;
}

#main a:link,
#main a:visited {
  color: <?php echo $ta_main_font_anchor_color; ?>;
  text-decoration: <?php echo $ta_main_font_anchor_under; ?>;
}

#main a:hover,
#main a:active {
  color: <?php echo $ta_main_font_anchor_colorhover; ?>;
  text-decoration: <?php echo $ta_main_font_anchor_underhover; ?>;
}

<?php
  }
  ta_paragraph_style( 'ta_main_font', '#main' ); ?>



/******************************************************/
/*  TAフォーマット・PHP to CSS・サイドバー
/******************************************************/

/******************* フレーム *******************/
/***** サイドバー(#sidebar)の背景色・背景画像 */
<?php
  //***** サイドバーコンテンツ(#sidebar)の背景色・背景画像
  $ta_sidebar_frame_color = ta_select_color_w_image_color( 'ta_sidebar_frame_color' );
  if ( TA_HIEND_PI ) {
    $ta_sidebar_frame_grad_onoff = ta_read_op( 'ta_sidebar_frame_color_grad_onoff' );
    $ta_sidebar_frame_pic = ta_read_op( 'ta_sidebar_frame_pic' );
    $ta_sidebar_frame_pic_rule = ta_read_op( 'ta_sidebar_frame_pic_rule' );
    $ta_sidebar_frame_pic_margin = ta_read_op( 'ta_sidebar_frame_pic_margin' );
  } else {
    $ta_sidebar_frame_grad_onoff = "invalid";
    $ta_sidebar_frame_pic = "no_image";
    $ta_sidebar_frame_pic_rule = "top_x";
    $ta_sidebar_frame_pic_margin = '0';
  }
  //***** サイドバー(#sidebar)標準フォント
  $ta_sidebar_font_size = ta_read_op( 'ta_sidebar_font_size' );
  $ta_sidebar_font_anchor_onlyfor_onoff = ta_read_op( 'ta_sidebar_font_anchor_onlyfor_onoff' );
  $ta_sidebar_font_normal_text_color = ta_select_color_w_image_color( 'ta_sidebar_font_normal_text_color' );
  $ta_sidebar_font_anchor_color = ta_select_color_w_image_color( 'ta_sidebar_font_anchor_color' );
  $ta_sidebar_font_anchor_under = ( 'valid' == ta_read_op( 'ta_sidebar_font_anchor_under' ) ) ? 'underline' : 'none';
  $ta_sidebar_font_anchor_colorhover = ta_select_color_w_image_color( 'ta_sidebar_font_anchor_colorhover' );
  $ta_sidebar_font_anchor_underhover = ( 'valid' == ta_read_op( 'ta_sidebar_font_anchor_underhover' ) ) ? 'underline' : 'none';
  //***** サイドバーウィジェット
  $ta_sidebar_widget_centering = ta_read_op( 'ta_sidebar_widget_centering' );

  /******************* その他 *******************/
  //***** サイドバーコンテンツ間隔設定: #sidebar .fixed-spaceのmargin-topの値
  $ta_sidebar_fixed_space = ta_read_op( 'ta_sidebar_fixed_space' );
  //***** サイドバー区切り線表示設定
  $ta_sidebar_separator_size = ta_read_op( 'ta_sidebar_separator_size' );
  $ta_sidebar_separator_kind = ta_read_op( 'ta_sidebar_separator_kind' );
  $ta_sidebar_separator_kind_color = ta_select_color_w_image_color( 'ta_sidebar_separator_kind_color' );
  if ( TA_HIEND_PI ) {
    $ta_sidebar_separator_kind_color_grad_onoff = ta_read_op( 'ta_sidebar_separator_kind_color_grad_onoff' );
  } else {
    $ta_sidebar_separator_kind_color_grad_onoff = "invalid";
  }
  $ta_sidebar_separator_tmargin = ta_read_op( 'ta_sidebar_separator_tmargin' );
  $ta_sidebar_separator_bmargin = ta_read_op( 'ta_sidebar_separator_bmargin' );

  switch ( $ta_sidebar_frame_pic_rule ) {
    case 'top_x':
      $sidebar_frame_repeat = 'repeat-x';
      $sidebar_frame_position = 'left top ' . $ta_sidebar_frame_pic_margin . 'px';
      break;
    case 'bottom_x':
      $sidebar_frame_repeat = 'repeat-x';
      $sidebar_frame_position = 'left bottom ' . $ta_sidebar_frame_pic_margin . 'px';
      break;
    case 'top_only':
      $sidebar_frame_repeat = 'no-repeat';
      $sidebar_frame_position = 'center top ' . $ta_sidebar_frame_pic_margin . 'px';
      break;
    case 'bottom_only':
      $sidebar_frame_repeat = 'no-repeat';
      $sidebar_frame_position = 'center bottom ' . $ta_sidebar_frame_pic_margin . 'px';
      break;
    case 'x_y':
      $sidebar_frame_repeat = 'repeat';
      $sidebar_frame_position = 'left top';
      break;
  } ?>
#sidebar {
  font-size: <?php echo $ta_sidebar_font_size; ?>%;
<?php
  if ( 'invalid' == $ta_sidebar_frame_grad_onoff ) { ?>
  background-color: <?php echo $ta_sidebar_frame_color; ?>;
<?php
    if ( 'no_image' != $ta_sidebar_frame_pic ) { ?>
  background-image: url("<?php echo $ta_sidebar_frame_pic; ?>");
<?php
    }
  } else {
    ta_gradient_color_style( 'ta_sidebar_frame_color', $ta_sidebar_frame_pic );
  }
  if ( 'no_image' != $ta_sidebar_frame_pic ) { ?>
  background-repeat: <?php echo $sidebar_frame_repeat; ?>;
  background-position: <?php echo $sidebar_frame_position; ?>;
<?php
  } ?>
}

#sidebar .ta-sidebar-separator {
  margin-top: <?php echo $ta_sidebar_separator_tmargin; ?>px;
  margin-bottom: <?php echo $ta_sidebar_separator_bmargin; ?>px;
<?php
  if ( 'invalid' == $ta_sidebar_separator_kind_color_grad_onoff ) { ?>
  border-width: <?php echo $ta_sidebar_separator_size; ?>px 0 0 0;
  border-style: <?php echo $ta_sidebar_separator_kind; ?>;
  border-color: <?php echo $ta_sidebar_separator_kind_color; ?>;
<?php
  } else { ?>
  border: none;
<?php
    ta_gradient_color_style( 'ta_sidebar_separator_kind_color' );
  } ?>
  height: <?php echo $ta_sidebar_separator_size; ?>px;
}

<?php
if ( 'valid' == $ta_sidebar_font_anchor_onlyfor_onoff ) { ?>
#sidebar {
  color: <?php echo $ta_sidebar_font_normal_text_color; ?>;
}

#sidebar a:link,
#sidebar a:visited {
  color: <?php echo $ta_sidebar_font_anchor_color; ?>;
  text-decoration: <?php echo $ta_sidebar_font_anchor_under; ?>;
}

#sidebar a:hover,
#sidebar a:active {
  color: <?php echo $ta_sidebar_font_anchor_colorhover; ?>;
  text-decoration: <?php echo $ta_sidebar_font_anchor_underhover; ?>;
}

<?php
  }
  ta_paragraph_style( 'ta_sidebar_font', '#sidebar' ); ?>

<?php
  /***** サイドバーウィジェットに関する可変スタイル */
  //***** サイドバーウィジェット
  if ( 'valid' == $ta_sidebar_widget_centering ) { ?>
#sidebar .ta-widget-container *:not(.sidebar_title) {
  text-align: center;
}

#sidebar .ta-widget-container table {
  display: inline;
  margin-left: auto;
  margin-right: auto;
}

<?php
  } ?>
#container #sidebar .fixed-space:first-child,
#additional-container #sidebar .fixed-space:first-child,
#outer-sidebar-container #sidebar .fixed-space:first-child {
  margin-top: 0;
}

#container #sidebar .fixed-space,
#additional-container #sidebar .fixed-space,
#outer-sidebar-container #sidebar .fixed-space {
  margin-top: <?php echo $ta_sidebar_fixed_space; ?>px;
}



/******************************************************/
/*  TAフォーマット・PHP to CSS・サブサイドバー
/******************************************************/

/******************* フレーム *******************/
/***** サブサイドバー(#sidebarsub)の背景色・背景画像 */
<?php
  /******************* フレーム *******************/
  //***** サブサイドバーコンテンツ(#sidebarsub)の背景色・背景画像
  $ta_sidebarsub_frame_color = ta_select_color_w_image_color( 'ta_sidebarsub_frame_color' );
  if ( TA_HIEND_PI ) {
    $ta_sidebarsub_frame_grad_onoff = ta_read_op( 'ta_sidebarsub_frame_color_grad_onoff' );
    $ta_sidebarsub_frame_pic = ta_read_op( 'ta_sidebarsub_frame_pic' );
    $ta_sidebarsub_frame_pic_rule = ta_read_op( 'ta_sidebarsub_frame_pic_rule' );
    $ta_sidebarsub_frame_pic_margin = ta_read_op( 'ta_sidebarsub_frame_pic_margin' );
  } else {
    $ta_sidebarsub_frame_grad_onoff = "invalid";
    $ta_sidebarsub_frame_pic = "no_image";
    $ta_sidebarsub_frame_pic_rule = "top_x";
    $ta_sidebarsub_frame_pic_margin = '0';
  }
  //***** サブサイドバー(#sidebarsub)標準フォント
  $ta_sidebarsub_font_size = ta_read_op( 'ta_sidebarsub_font_size' );
  $ta_sidebarsub_font_anchor_onlyfor_onoff = ta_read_op( 'ta_sidebarsub_font_anchor_onlyfor_onoff' );
  $ta_sidebarsub_font_normal_text_color = ta_select_color_w_image_color( 'ta_sidebarsub_font_normal_text_color' );
  $ta_sidebarsub_font_anchor_color = ta_select_color_w_image_color( 'ta_sidebarsub_font_anchor_color' );
  $ta_sidebarsub_font_anchor_under = ( 'valid' == ta_read_op( 'ta_sidebarsub_font_anchor_under' ) ) ? 'underline' : 'none';
  $ta_sidebarsub_font_anchor_colorhover = ta_select_color_w_image_color( 'ta_sidebarsub_font_anchor_colorhover' );
  $ta_sidebarsub_font_anchor_underhover = ( 'valid' == ta_read_op( 'ta_sidebarsub_font_anchor_underhover' ) ) ? 'underline' : 'none';
  //***** サブサイドバーウィジェット
  $ta_sidebarsub_widget_centering = ta_read_op( 'ta_sidebarsub_widget_centering' );

  /******************* その他 *******************/
  //***** サブサイドバーコンテンツ間隔設定: #sidebarsub .fixed-spaceのmargin-topの値
  $ta_sidebarsub_fixed_space = ta_read_op( 'ta_sidebarsub_fixed_space' );
  //***** サブサイドバー区切り線表示設定
  $ta_sidebarsub_separator_size = ta_read_op( 'ta_sidebarsub_separator_size' );
  $ta_sidebarsub_separator_kind = ta_read_op( 'ta_sidebarsub_separator_kind' );
  $ta_sidebarsub_separator_kind_color = ta_select_color_w_image_color( 'ta_sidebarsub_separator_kind_color' );
  if ( TA_HIEND_PI ) {
    $ta_sidebarsub_separator_kind_color_grad_onoff = ta_read_op( 'ta_sidebarsub_separator_kind_color_grad_onoff' );
  } else {
    $ta_sidebarsub_separator_kind_color_grad_onoff = "invalid";
  }
  $ta_sidebarsub_separator_tmargin = ta_read_op( 'ta_sidebarsub_separator_tmargin' );
  $ta_sidebarsub_separator_bmargin = ta_read_op( 'ta_sidebarsub_separator_bmargin' );

  switch ( $ta_sidebarsub_frame_pic_rule ) {
    case 'top_x':
      $sidebarsub_frame_repeat = 'repeat-x';
      $sidebarsub_frame_position = 'left top ' . $ta_sidebarsub_frame_pic_margin . 'px';
      break;
    case 'bottom_x':
      $sidebarsub_frame_repeat = 'repeat-x';
      $sidebarsub_frame_position = 'left bottom ' . $ta_sidebarsub_frame_pic_margin . 'px';
      break;
    case 'top_only':
      $sidebarsub_frame_repeat = 'no-repeat';
      $sidebarsub_frame_position = 'center top ' . $ta_sidebarsub_frame_pic_margin . 'px';
      break;
    case 'bottom_only':
      $sidebarsub_frame_repeat = 'no-repeat';
      $sidebarsub_frame_position = 'center bottom ' . $ta_sidebarsub_frame_pic_margin . 'px';
      break;
    case 'x_y':
      $sidebarsub_frame_repeat = 'repeat';
      $sidebarsub_frame_position = 'left top';
      break;
  } ?>
#sidebarsub {
  font-size: <?php echo $ta_sidebarsub_font_size; ?>%;
<?php
  if ( 'invalid' == $ta_sidebarsub_frame_grad_onoff ) { ?>
  background-color: <?php echo $ta_sidebarsub_frame_color; ?>;
<?php
    if ( 'no_image' != $ta_sidebarsub_frame_pic ) { ?>
  background-image: url("<?php echo $ta_sidebarsub_frame_pic; ?>");
<?php
    }
  } else {
    ta_gradient_color_style( 'ta_sidebarsub_frame_color', $ta_sidebarsub_frame_pic );
  }
  if ( 'no_image' != $ta_sidebarsub_frame_pic ) { ?>
  background-repeat: <?php echo $sidebarsub_frame_repeat; ?>;
  background-position: <?php echo $sidebarsub_frame_position; ?>;
<?php
  } ?>
}

#sidebarsub .ta-sidebarsub-separator {
  margin-top: <?php echo $ta_sidebarsub_separator_tmargin; ?>px;
  margin-bottom: <?php echo $ta_sidebarsub_separator_bmargin; ?>px;
<?php
  if ( 'invalid' == $ta_sidebarsub_separator_kind_color_grad_onoff ) { ?>
  border-width: <?php echo $ta_sidebarsub_separator_size; ?>px 0 0 0;
  border-style: <?php echo $ta_sidebarsub_separator_kind; ?>;
  border-color: <?php echo $ta_sidebarsub_separator_kind_color; ?>;
<?php
  } else { ?>
  border: none;
<?php
    ta_gradient_color_style( 'ta_sidebarsub_separator_kind_color' );
  } ?>
  height: <?php echo $ta_sidebarsub_separator_size; ?>px;
}

<?php
if ( 'valid' == $ta_sidebarsub_font_anchor_onlyfor_onoff ) { ?>
#sidebarsub {
  color: <?php echo $ta_sidebarsub_font_normal_text_color; ?>;
}

#sidebarsub a:link,
#sidebarsub a:visited {
  color: <?php echo $ta_sidebarsub_font_anchor_color; ?>;
  text-decoration: <?php echo $ta_sidebarsub_font_anchor_under; ?>;
}

#sidebarsub a:hover,
#sidebarsub a:active {
  color: <?php echo $ta_sidebarsub_font_anchor_colorhover; ?>;
  text-decoration: <?php echo $ta_sidebarsub_font_anchor_underhover; ?>;
}

<?php
  }
  ta_paragraph_style( 'ta_sidebarsub_font', '#sidebarsub' ); ?>

<?php
  /***** サブサイドバーウィジェットに関する可変スタイル */
  //***** サブサイドバーウィジェット
  if ( 'valid' == $ta_sidebarsub_widget_centering ) { ?>
#sidebarsub .ta-widget-container *:not(.sidebarsub_title) {
  text-align: center;
}

#sidebarsub .ta-widget-container table {
  display: inline;
  margin-left: auto;
  margin-right: auto;
}

<?php
  } ?>
#container #sidebarsub .fixed-space:first-child,
#additional-container #sidebarsub .fixed-space:first-child,
#outer-sidebarsub-container #sidebarsub .fixed-space:first-child {
  margin-top: 0;
}

#container #sidebarsub .fixed-space,
#additional-container #sidebarsub .fixed-space,
#outer-sidebarsub-container #sidebarsub .fixed-space {
  margin-top: <?php echo $ta_sidebarsub_fixed_space; ?>px;
}



/******************************************************/
/*  TAフォーマット・PHP to CSS・フッター
/******************************************************/

/******************* フッター *******************/
/***** フッターメニューに関する可変スタイル */
<?php
  $ta_footer_menu_style = ta_read_op( 'ta_footer_menu_style' ); //valid:縦型, invalid:横型
  $ta_footer_menu_parent_size = ta_read_op( 'ta_footer_menu_parent_size' );
  $ta_footer_menu_parent_weight = ta_read_op( 'ta_footer_menu_parent_weight' );
  $ta_footer_menu_parent_color = ta_select_color_w_image_color( 'ta_footer_menu_parent_color' );
  $ta_footer_menu_parent_anchor_color = ta_select_color_w_image_color( 'ta_footer_menu_parent_anchor_color' );
  $ta_footer_menu_parent_anchor_colorhover = ta_select_color_w_image_color( 'ta_footer_menu_parent_anchor_colorhover' );
  $ta_footer_menu_parent_anchor_underonoff = ta_read_op( 'ta_footer_menu_parent_anchor_underonoff' );
  $ta_footer_menu_parent_anchor_hoverunderonoff = ta_read_op( 'ta_footer_menu_parent_anchor_hoverunderonoff' );
  $ta_footer_menu_parent_paddingtop = ta_read_op( 'ta_footer_menu_parent_paddingtop' );
  $ta_footer_menu_parent_paddingleft = ta_read_op( 'ta_footer_menu_parent_paddingleft' );
  $ta_footer_menu_parent_listmarker = ta_read_op( 'ta_footer_menu_parent_listmarker' );
  $ta_footer_menu_children_size = ta_read_op( 'ta_footer_menu_children_size' );
  $ta_footer_menu_children_weight = ta_read_op( 'ta_footer_menu_children_weight' );
  $ta_footer_menu_children_color = ta_select_color_w_image_color( 'ta_footer_menu_children_color' );
  $ta_footer_menu_children_anchor_color = ta_select_color_w_image_color( 'ta_footer_menu_children_anchor_color' );
  $ta_footer_menu_children_anchor_colorhover = ta_select_color_w_image_color( 'ta_footer_menu_children_anchor_colorhover' );
  $ta_footer_menu_children_anchor_underonoff = ta_read_op( 'ta_footer_menu_children_anchor_underonoff' );
  $ta_footer_menu_children_anchor_hoverunderonoff = ta_read_op( 'ta_footer_menu_children_anchor_hoverunderonoff' );
  $ta_footer_menu_children_paddingtop = ta_read_op( 'ta_footer_menu_children_paddingtop' );
  $ta_footer_menu_children_paddingleft = ta_read_op( 'ta_footer_menu_children_paddingleft' );
  $ta_footer_menu_children_listmarker = ta_read_op( 'ta_footer_menu_children_listmarker' );
  if ( 'invalid' == $ta_footer_menu_style ) { ?>
#ta-footer-menu {
  display: inline-block;
  vertical-align: bottom;
  width: 100%;
  height: auto;
  clear: both;
}

#ta-footer-menu li li {
  display: none;
}
<?php
} ?>

#ta-footer-menu li {
  font-size: <?php echo $ta_footer_menu_parent_size; ?>%;
  font-weight: <?php echo $ta_footer_menu_parent_weight; ?>;
  color: <?php echo $ta_footer_menu_parent_color; ?>;
<?php
  if ( 'valid' == $ta_footer_menu_style ) { ?>
  padding-top: <?php echo $ta_footer_menu_parent_paddingtop; ?>px;
  padding-left: <?php echo $ta_footer_menu_parent_paddingleft; ?>px;
<?php
  } else { ?>
  margin-left: <?php echo $ta_footer_menu_parent_paddingleft; ?>px;
  float: left;
<?php
  } ?>
  list-style-type: <?php echo $ta_footer_menu_parent_listmarker; ?>;
  list-style-position: inside;
}

#content #footer-container #ta-footer-menu li a,
#outer-footer-container #footer-container #ta-footer-menu li a {
  color: <?php echo $ta_footer_menu_parent_anchor_color; ?>;
  text-decoration: <?php echo ( 'valid' == $ta_footer_menu_parent_anchor_underonoff ) ? 'underline' : 'none'; ?>;
}

#content #footer-container #ta-footer-menu li a:hover,
#outer-footer-container #footer-container #ta-footer-menu li a:hover {
  color: <?php echo $ta_footer_menu_parent_anchor_colorhover; ?>;
  text-decoration: <?php echo ( 'valid' == $ta_footer_menu_parent_anchor_hoverunderonoff ) ? 'underline' : 'none'; ?>;
}

#ta-footer-menu > ul > li:first-child {
  padding-top: 0;
<?php
  if ( 'invalid' == $ta_footer_menu_style ) { ?>
  margin-left: 0;
<?php
  } ?>
}

<?php
  if ( 'valid' == $ta_footer_menu_style ) { ?>
#ta-footer-menu li li {
  font-size: <?php echo $ta_footer_menu_children_size; ?>%;
  font-weight: <?php echo $ta_footer_menu_children_weight; ?>;
  color: <?php echo $ta_footer_menu_children_color; ?>;
  padding-top: <?php echo $ta_footer_menu_children_paddingtop; ?>px;
  padding-left: <?php echo $ta_footer_menu_children_paddingleft; ?>px;
  list-style-type: <?php echo $ta_footer_menu_children_listmarker; ?>;
  list-style-position: inside;
}

#content #footer-container #ta-footer-menu li li a,
#outer-footer-container #footer-container #ta-footer-menu li li a {
  color: <?php echo $ta_footer_menu_children_anchor_color; ?>;
  text-decoration: <?php echo ( 'valid' == $ta_footer_menu_children_anchor_underonoff ) ? 'underline' : 'none'; ?>;
}

#content #footer-container #ta-footer-menu li li a:hover,
#outer-footer-container #footer-container #ta-footer-menu li li a:hover {
  color: <?php echo $ta_footer_menu_children_anchor_colorhover; ?>;
  text-decoration: <?php echo ( 'valid' == $ta_footer_menu_children_anchor_hoverunderonoff ) ? 'underline' : 'none'; ?>;
}
<?php
  } ?>

/******************* フレーム *******************/
/***** フッター(#footer-container)の背景色・背景画像 */
<?php
  /******************* フレーム *******************/
  $ta_footer_frame_color = ta_select_color_w_image_color( 'ta_footer_frame_color' );
  if ( TA_HIEND_PI ) {
    $ta_footer_frame_grad_onoff = ta_read_op( 'ta_footer_frame_color_grad_onoff' );
  } else {
    $ta_footer_frame_grad_onoff = "invalid";
  }
  $ta_footer_frame_pic = ta_read_op_builtin_img( 'ta_footer_frame_pic' );
  $ta_footer_frame_pic_rule = ta_read_op( 'ta_footer_frame_pic_rule' );
  $ta_footer_frame_pic_margin = ta_read_op( 'ta_footer_frame_pic_margin' );
  $ta_footer_container_paddingtop = ta_read_op( 'ta_footer_container_paddingtop' );

  //***** フッター(#footer)標準フォント
  $ta_footer_font_size = ta_read_op( 'ta_footer_font_size' );
  $ta_footer_font_anchor_onlyfor_onoff = ta_read_op( 'ta_footer_font_anchor_onlyfor_onoff' );
  $ta_footer_font_normal_text_color = ta_select_color_w_image_color( 'ta_footer_font_normal_text_color' );
  $ta_footer_font_anchor_color = ta_select_color_w_image_color( 'ta_footer_font_anchor_color' );
  $ta_footer_font_anchor_under = ( 'valid' == ta_read_op( 'ta_footer_font_anchor_under' ) ) ? 'underline' : 'none';
  $ta_footer_font_anchor_colorhover = ta_select_color_w_image_color( 'ta_footer_font_anchor_colorhover' );
  $ta_footer_font_anchor_underhover = ( 'valid' == ta_read_op( 'ta_footer_font_anchor_underhover' ) ) ? 'underline' : 'none';

  //***** フッター各ブロック設定
  $ta_footer_disp_group = ta_read_op( 'ta_footer_disp_group' );
  $ta_footer_group1_block_size = ta_read_op( 'ta_footer_group1_block_size' );
  $ta_footer_vertical_group1_distance = ta_read_op( 'ta_footer_vertical_group1_distance' );
  $ta_footer_group2_block_size = ta_read_op( 'ta_footer_group2_block_size' );
  $ta_footer_vertical_group2_distance = ta_read_op( 'ta_footer_vertical_group2_distance' );

  //***** フッター画像
  $ta_footer_pic_size = ta_read_op( 'ta_footer_pic_size' );
  $ta_footer_pic_text_size = ta_read_op( 'ta_footer_pic_text_size' );
  $ta_footer_pic_text_weight = ta_read_op( 'ta_footer_pic_text_weight' );
  $ta_footer_pic_text_hoverunder = ( 'valid' == ta_read_op( 'ta_footer_pic_text_hoverunder' ) ) ? 'underline' : 'none';
  $ta_footer_pic_text_hoverunder2 = ( 'valid' == ta_read_op( 'ta_footer_pic_text_hoverunder2' ) ) ? 'underline' : 'none';
  $ta_footer_pic_text_color = ta_select_color_w_image_color( 'ta_footer_pic_text_color' );
  $ta_footer_pic_text_hover = ta_select_color_w_image_color( 'ta_footer_pic_text_hover' );

  //***** サブフッター画像
  $ta_footer_subpic_size = ta_read_op( 'ta_footer_subpic_size' );

  //***** フッターウィジェット
  $ta_footer_widget_centering = ta_read_op( 'ta_footer_widget_centering' );

  //***** コピーライト
  $ta_footer_copyright_position = ta_read_op( 'ta_footer_copyright_position' );
  $ta_footer_copyright_paddingtop = ta_read_op( 'ta_footer_copyright_paddingtop' );
  $ta_footer_copyright_paddingbottom = ta_read_op( 'ta_footer_copyright_paddingbottom' );
  $ta_footer_copyright_title_size = ta_read_op( 'ta_footer_copyright_title_size' );
  $ta_footer_copyright_title_weight = ta_read_op( 'ta_footer_copyright_title_weight' );
  $ta_footer_copyright_title_color = ta_select_color_w_image_color( 'ta_footer_copyright_title_color' );
  $ta_footer_copyright_bg_color = ta_select_color_w_image_color( 'ta_footer_copyright_bg_color' );
  $ta_footer_copyright_padding = ta_read_op( 'ta_footer_copyright_padding' );
  $ta_footer_copyright_border_size = ta_read_op( 'ta_footer_copyright_border_size' );
  $ta_footer_copyright_border_color = ta_select_color_w_image_color( 'ta_footer_copyright_border_color' );

  /******************* その他 *******************/
  //***** フッターコンテンツ間隔設定定: #footer-container .fixed-spaceのmargin-topの値
  $ta_footer_fixed_space = ta_read_op( 'ta_footer_fixed_space' );
  //***** ブラウザ全幅表示時の定位置フッターコンテンツのレイアウト
  if ( TA_HIEND_PI ) {
    $ta_footer_fullwidth_select = ta_read_op( 'ta_footer_fullwidth_select' );
  } else {
    $ta_footer_fullwidth_select = "fixed";
  }

  switch ( $ta_footer_frame_pic_rule ) {
    case 'top_x':
      $footer_frame_repeat = 'repeat-x';
      $footer_frame_position = 'left top ' . $ta_footer_frame_pic_margin . 'px';
      break;
    case 'bottom_x':
      $footer_frame_repeat = 'repeat-x';
      $footer_frame_position = 'left bottom ' . $ta_footer_frame_pic_margin . 'px';
      break;
    case 'top_only':
      $footer_frame_repeat = 'no-repeat';
      $footer_frame_position = 'center top ' . $ta_footer_frame_pic_margin . 'px';
      break;
    case 'bottom_only':
      $footer_frame_repeat = 'no-repeat';
      $footer_frame_position = 'center bottom ' . $ta_footer_frame_pic_margin . 'px';
      break;
    case 'x_y':
      $footer_frame_repeat = 'repeat';
      $footer_frame_position = 'left top';
      break;
  }

  $frame_type = ta_read_op( 'ta_common_frame_type' );
  $header_width = ta_read_op( 'ta_common_frame_width' );
  $sidebar_width_ratio = ta_read_op( 'ta_common_sidebar_width' );
  $sidebar_width = floor( $header_width * $sidebar_width_ratio / 100 );  //小数点以下を切り捨て
  $sidebarsub_width_ratio = ta_read_op( 'ta_common_sidebarsub_width' );
  $sidebarsub_width = floor( $header_width * $sidebarsub_width_ratio / 100 );  //小数点以下を切り捨て
  $mainright_margin_ratio = ta_read_op( 'ta_common_mainright_margin' );
  $mainright_margin = floor( $header_width * $mainright_margin_ratio / 100 );  //小数点以下を切り捨て
  $mainleft_margin_ratio = ta_read_op( 'ta_common_mainleft_margin' );
  $mainleft_margin = floor( $header_width * $mainleft_margin_ratio / 100 );  //小数点以下を切り捨て
  $ta_main_frame_padding = ta_read_op( 'ta_main_frame_padding' );

  switch ( $frame_type ) {
    case 'main_sidebar':
      $content_width = $header_width - $sidebar_width - $mainright_margin - 2 * $ta_main_frame_padding;
      break;
    case 'sidebar_main':
      $content_width = $header_width - $sidebar_width - $mainleft_margin - 2 * $ta_main_frame_padding;
      break;
    case 'main_only':
      $content_width = $header_width - 2 * $ta_main_frame_padding;
      break;
    case 'sidebarsub_main_sidebar':
      $content_width = $header_width - $sidebar_width - $sidebarsub_width - $mainleft_margin - $mainright_margin - 2 * $ta_main_frame_padding;
      break;
  }

  if ( 'h_g1_g2' == $ta_footer_disp_group ) {
    $group1_display = 'block';
    $group1_float = 'left';
    if ( 'valid' == $ta_footer_container2main_onoff ) {
      if ( 'valid' == $ta_common_side2wrap_onoff ) {
        $group1_width = $ta_footer_group1_block_size;
      } else {
        $group1_width = floor( $content_width * $ta_footer_group1_block_size / 100);
      }
    } else {
      if ( 'valid' == $ta_common_side2wrap_onoff ) {
        $group1_width = $ta_footer_group1_block_size;
      } else {
        $group1_width = floor( $header_width * $ta_footer_group1_block_size / 100);
      }
    }
    $group1_clear = 'none';
    $group2_display = 'block';
    $group2_float = 'right';
    if ( 'valid' == $ta_footer_container2main_onoff ) {
      if ( 'valid' == $ta_common_side2wrap_onoff ) {
        $group2_width = $ta_footer_group2_block_size;
      } else {
        $group2_width = floor( $content_width * $ta_footer_group2_block_size / 100);
      }
    } else {
      if ( 'valid' == $ta_common_side2wrap_onoff ) {
        $group2_width = $ta_footer_group2_block_size;
      } else {
        $group2_width = floor( $header_width * $ta_footer_group2_block_size / 100);
      }
    }
    $group2_clear = 'none';
  } else if ( 'h_g2_g1' == $ta_footer_disp_group ) {
    $group1_display = 'block';
    $group1_float = 'right';
    if ( 'valid' == $ta_footer_container2main_onoff ) {
      if ( 'valid' == $ta_common_side2wrap_onoff ) {
        $group1_width = $ta_footer_group1_block_size;
      } else {
        $group1_width = floor( $content_width * $ta_footer_group1_block_size / 100);
      }
    } else {
      if ( 'valid' == $ta_common_side2wrap_onoff ) {
        $group1_width = $ta_footer_group1_block_size;
      } else {
        $group1_width = floor( $header_width * $ta_footer_group1_block_size / 100);
      }
    }
    $group1_clear = 'none';
    $group2_display = 'block';
    $group2_float = 'left';
    if ( 'valid' == $ta_footer_container2main_onoff ) {
      if ( 'valid' == $ta_common_side2wrap_onoff ) {
        $group2_width = $ta_footer_group2_block_size;
      } else {
        $group2_width = floor( $content_width * $ta_footer_group2_block_size / 100);
      }
    } else {
      if ( 'valid' == $ta_common_side2wrap_onoff ) {
        $group2_width = $ta_footer_group2_block_size;
      } else {
        $group2_width = floor( $header_width * $ta_footer_group2_block_size / 100);
      }
    }
    $group2_clear = 'none';
  } else if ( 'v_g1_g2' == $ta_footer_disp_group ) {
    $group1_display = 'block';
    $group1_float = 'none';
    if ( 'valid' == $ta_footer_container2main_onoff ) {
      if ( 'valid' == $ta_common_side2wrap_onoff ) {
        $group1_width = 100;
      } else {
        $group1_width = $content_width;
      }
    } else {
      if ( 'valid' == $ta_common_side2wrap_onoff ) {
        $group1_width = 100;
      } else {
        $group1_width = $header_width;
      }
    }
    $group1_clear = 'both';
    $group2_display = 'block';
    $group2_float = 'none';
    if ( 'valid' == $ta_footer_container2main_onoff ) {
      if ( 'valid' == $ta_common_side2wrap_onoff ) {
        $group2_width = 100;
      } else {
        $group2_width = $content_width;
      }
    } else {
      if ( 'valid' == $ta_common_side2wrap_onoff ) {
        $group2_width = 100;
      } else {
        $group2_width = $header_width;
      }
    }
    $group2_clear = 'both';
  } else if ( 'v_g2_g1' == $ta_footer_disp_group ) {
    $group1_display = 'block';
    $group1_float = 'none';
    if ( 'valid' == $ta_footer_container2main_onoff ) {
      if ( 'valid' == $ta_common_side2wrap_onoff ) {
        $group1_width = 100;
      } else {
        $group1_width = $content_width;
      }
    } else {
      if ( 'valid' == $ta_common_side2wrap_onoff ) {
        $group1_width = 100;
      } else {
        $group1_width = $header_width;
      }
    }
    $group1_clear = 'both';
    $group2_display = 'block';
    $group2_float = 'none';
    if ( 'valid' == $ta_footer_container2main_onoff ) {
      if ( 'valid' == $ta_common_side2wrap_onoff ) {
        $group2_width = 100;
      } else {
        $group2_width = $content_width;
      }
    } else {
      if ( 'valid' == $ta_common_side2wrap_onoff ) {
        $group2_width = 100;
      } else {
        $group2_width = $header_width;
      }
    }
    $group2_clear = 'both';
  } else if ( 'g1_only' == $ta_footer_disp_group ) {
    $group1_display = 'block';
    $group1_float = 'none';
    if ( 'valid' == $ta_footer_container2main_onoff ) {
      if ( 'valid' == $ta_common_side2wrap_onoff ) {
        $group1_width = 100;
      } else {
        $group1_width = $content_width;
      }
    } else {
      if ( 'valid' == $ta_common_side2wrap_onoff ) {
        $group1_width = 100;
      } else {
        $group1_width = $header_width;
      }
    }
    $group1_clear = 'both';
    $group2_display = 'none';
    $group2_float = 'none';
    $group2_width = 0;
    $group2_clear = 'none';
  } else if ( 'g2_only' == $ta_footer_disp_group ) {
    $group1_display = 'none';
    $group1_float = 'none';
    $group1_width = 0;
    $group1_clear = 'none';
    $group2_display = 'block';
    $group2_float = 'none';
    if ( 'valid' == $ta_footer_container2main_onoff ) {
      if ( 'valid' == $ta_common_side2wrap_onoff ) {
        $group2_width = 100;
      } else {
        $group2_width = $content_width;
      }
    } else {
      if ( 'valid' == $ta_common_side2wrap_onoff ) {
        $group2_width = 100;
      } else {
        $group2_width = $header_width;
      }
    }
    $group2_clear = 'both';
  } else {
    $group1_display = 'none';
    $group1_float = 'none';
    $group1_width = 0;
    $group1_clear = 'none';
    $group2_display = 'none';
    $group2_float = 'none';
    $group2_width = 0;
    $group2_clear = 'none';
  }
  if ( 'valid' == $ta_footer_container2main_onoff ) { ?>
#outer-footer-container {
  display: none;
}

#content #footer-container {
  display: block;
  width: 100%;
  min-width: 100%;
  height: auto;
  margin-top: <?php echo ta_read_op( 'ta_common_body_wrap_marginbottom' ); ?>px;
}

#content #footer-container #footer {
  width: 100%;
}
<?php
  } else { ?>
#outer-footer-container {
  position: relative;
  display: block;
  z-index: 777;
}

#content #footer-container {
  display: none;
}

<?php
  } ?>
#content #footer-container,
#outer-footer-container #footer-container {
  font-size: <?php echo $ta_footer_font_size; ?>%;
  padding-top: <?php echo $ta_footer_container_paddingtop; ?>px;
<?php
  if ( 'invalid' == $ta_footer_frame_grad_onoff ) { ?>
  background-color: <?php echo $ta_footer_frame_color; ?>;
<?php
    if ( 'no_image' != $ta_footer_frame_pic ) { ?>
  background-image: url("<?php echo $ta_footer_frame_pic; ?>");
<?php
    }
  } else {
    ta_gradient_color_style( 'ta_footer_frame_color', $ta_footer_frame_pic );
  }
  if ( 'no_image' != $ta_footer_frame_pic ) { ?>
  background-repeat: <?php echo $footer_frame_repeat; ?>;
  background-position: <?php echo $footer_frame_position; ?>;
<?php
  } ?>
}

<?php
if ( 'valid' == $ta_footer_font_anchor_onlyfor_onoff ) { ?>
#content #footer-container,
#outer-footer-container #footer-container {
  color: <?php echo $ta_footer_font_normal_text_color; ?>;
}

#content #footer-container a:link,
#content #footer-container a:visited,
#outer-footer-container #footer-container a:link,
#outer-footer-container #footer-container a:visited {
  color: <?php echo $ta_footer_font_anchor_color; ?>;
  text-decoration: <?php echo $ta_footer_font_anchor_under; ?>;
}

#content #footer-container a:hover,
#content #footer-container a:active,
#outer-footer-container #footer-container a:hover,
#outer-footer-container #footer-container a:active {
  color: <?php echo $ta_footer_font_anchor_colorhover; ?>;
  text-decoration: <?php echo $ta_footer_font_anchor_underhover; ?>;
}

<?php
  }
  ta_paragraph_style( 'ta_footer_font', '#content #footer-container' );
  ta_paragraph_style( 'ta_footer_font', '#outer-footer-container #footer-container' ); ?>

#footer-container #footer-group-container,
#footer-freearea-container {
  width: 100%;
  display: inline-block;
  vertical-align: bottom;
}

#footer-container #footer-group1-contents {
  display: <?php echo $group1_display; ?>;
  float: <?php echo $group1_float; ?>;
<?php
  if ( 'valid' == $ta_common_side2wrap_onoff ) { ?>
  width: <?php echo $group1_width; ?>%;
<?php
  } else { ?>
  width: <?php echo $group1_width; ?>px;
<?php
  } ?>
  clear: <?php echo $group1_clear; ?>;
  padding-top: <?php echo $ta_footer_vertical_group1_distance; ?>px;
  overflow: hidden;
}

#footer-container #footer-group2-contents {
  display: <?php echo $group2_display; ?>;
  float: <?php echo $group2_float; ?>;
<?php
  if ( 'valid' == $ta_common_side2wrap_onoff ) { ?>
  width: <?php echo $group2_width; ?>%;
<?php
  } else { ?>
  width: <?php echo $group2_width; ?>px;
<?php
  } ?>
  clear: <?php echo $group2_clear; ?>;
  padding-top: <?php echo $ta_footer_vertical_group2_distance; ?>px;
  overflow: hidden;
}

#footer-image img {
<?php
  if ( 'valid' == $ta_footer_container2main_onoff ) {
    if ( 'valid' == $ta_common_side2wrap_onoff ) { ?>
  width: <?php echo $ta_footer_pic_size; ?>%;
<?php
    } else { ?>
  width: <?php echo floor( $content_width * ( $ta_footer_group1_block_size / 100 ) * ( $ta_footer_pic_size / 100 ) ); ?>px;
<?php
    }
  } else {
    if ( 'valid' == $ta_common_side2wrap_onoff && 'fixed' != $ta_footer_fullwidth_select ) { ?>
  width: <?php echo $ta_footer_pic_size; ?>%;
<?php
    } else { ?>
  width: <?php echo floor( $header_width * ( $ta_footer_group1_block_size / 100 ) * ( $ta_footer_pic_size / 100 ) ); ?>px;
<?php
    }
  } ?>
  height: auto;
}

#footer-noimg {
  font-size: <?php echo $ta_footer_pic_text_size; ?>%;
  font-weight: <?php echo $ta_footer_pic_text_weight; ?>;
  text-decoration: none;
}

#content #footer-container #footer-image a,
#outer-footer-container #footer-container #footer-image a {
  color: <?php echo $ta_footer_pic_text_color; ?>;
  text-decoration: <?php echo $ta_footer_pic_text_hoverunder; ?>;
}

#content #footer-container #footer-image a:hover,
#outer-footer-container #footer-container #footer-image a:hover {
  color: <?php echo $ta_footer_pic_text_hover; ?>;
  text-decoration: <?php echo $ta_footer_pic_text_hoverunder2; ?>;
}

#footer-noanc {
  color: <?php echo $ta_footer_pic_text_color; ?>;
}

#footer-sub-image img {
<?php
  if ( 'valid' == $ta_footer_container2main_onoff ) {
    if ( 'valid' == $ta_common_side2wrap_onoff ) { ?>
  width: <?php echo $ta_footer_subpic_size; ?>%;
<?php
    } else { ?>
  width: <?php echo floor( $content_width * ( $ta_footer_group1_block_size / 100 ) * ( $ta_footer_subpic_size / 100 ) ); ?>px;
<?php
    }
  } else {
    if ( 'valid' == $ta_common_side2wrap_onoff && 'fixed' != $ta_footer_fullwidth_select ) { ?>
  width: <?php echo $ta_footer_subpic_size; ?>%;
<?php
    } else { ?>
  width: <?php echo floor( $header_width * ( $ta_footer_group1_block_size / 100 ) * ( $ta_footer_subpic_size / 100 ) ); ?>px;
<?php
    }
  } ?>
  height: auto;
}

<?php
  if ( 'valid' == $ta_footer_widget_centering ) { ?>
#footer-container .ta-widget-container *:not(.footer_title) {
  text-align: center;
}

#footer-container .ta-widget-container table {
  display: inline;
  margin-left: auto;
  margin-right: auto;
}
<?php
  } ?>

#footer-container #copyright-container {
  clear: both;
<?php
  if ( 'valid' == $ta_footer_container2main_onoff ) {
    if ( 'valid' == $ta_common_side2wrap_onoff ) { ?>
  width: 100%;
<?php
    } else { ?>
  width: <?php echo $content_width; ?>px;
<?php
    }
  } else { ?>
  width: <?php echo $header_width; ?>px;
<?php
  } ?>
  padding-top: <?php echo $ta_footer_copyright_paddingtop; ?>px;
  padding-bottom: <?php echo $ta_footer_copyright_paddingbottom; ?>px;
}

#content #footer-container #copyright,
#outer-footer-container #footer-container #copyright {
  clear: both;
<?php
  if ( 'valid' == $ta_footer_container2main_onoff ) {
    if ( 'valid' == $ta_common_side2wrap_onoff ) { ?>
  width: 100%;
<?php
    } else { ?>
  width: <?php echo $content_width; ?>px;
<?php
    }
  } else { ?>
  width: <?php echo $header_width; ?>px;
<?php
  } ?>
  border-top: <?php echo $ta_footer_copyright_border_size . 'px solid ' . $ta_footer_copyright_border_color; ?>;
  color: <?php echo $ta_footer_copyright_title_color; ?>;
  background-color: <?php echo $ta_footer_copyright_bg_color; ?>;
  font-size: <?php echo $ta_footer_copyright_title_size; ?>%;
  font-weight: <?php echo $ta_footer_copyright_title_weight; ?>;
  text-align: <?php echo $ta_footer_copyright_position; ?>;
  padding-top: <?php echo $ta_footer_copyright_padding; ?>px;
  padding-bottom: <?php echo $ta_footer_copyright_padding; ?>px;
}

#content #footer-container #copyright a,
#outer-footer-container #footer-container #copyright a {
  color: <?php echo $ta_footer_copyright_title_color; ?>;
  background-color: <?php echo $ta_footer_copyright_bg_color; ?>;
  font-size: 100%;
  font-weight: normal;
  text-decoration: none;
  padding-top: <?php echo $ta_footer_copyright_padding; ?>px;
  padding-bottom: <?php echo $ta_footer_copyright_padding; ?>px;
}

#content #footer-container #copyright a:hover,
#content #footer-container #copyright a:active,
#outer-footer-container #footer-container #copyright a:hover,
#outer-footer-container #footer-container #copyright a:active {
  color: <?php echo $ta_footer_copyright_title_color; ?>;
  background-color: <?php echo $ta_footer_copyright_bg_color; ?>;
  text-decoration: none;
}

#outer-footer-container #footer-container #footer .fixed-space,
#content #footer-container #footer .fixed-space {
  margin-top: <?php echo $ta_footer_fixed_space; ?>px;
}



/******************************************************/
/*  このCSSファイルは自動的に生成されています。
/*  設定を変更すると上書きされますのでご注意ください。
/*
/*          de集まれ株式会社　技術支援(テックエイド)部
/******************************************************/



/******************************************************/
/*  TAフォーマット・PHP to CSS・レスポンシブデザイン
/******************************************************/

/******************* レスポンシブデザイン *******************/
/***** レスポンシブデザインに関する可変スタイル */
<?php
  if ( TA_HIEND_PI ) {
    $ta_common_side2wrap_onoff = ta_read_op( 'ta_common_side2wrap_onoff' );
  } else {
    $ta_common_side2wrap_onoff = "invalid";
  }
  /******** レスポンシブデザイン基本設定 ********/
  $ta_responsible_base_onoff = ta_read_op( 'ta_responsible_base_onoff' );
  $ta_responsible_base_sidebar_onoff = ta_read_op( 'ta_responsible_base_sidebar_onoff' );
  $ta_responsible_base_sidebarsub_onoff = ta_read_op( 'ta_responsible_base_sidebarsub_onoff' );
  $ta_responsible_base_switch_width = ta_read_op( 'ta_responsible_base_switch_width' );
  $ta_responsible_base_width_w_padding = ta_read_op( 'ta_responsible_base_width_w_padding' );

  /******** アディショナルモード設定 ********/
  if ( TA_HIEND_PI ) {
    $ta_responsible_additional_onoff = ta_read_op( 'ta_responsible_additional_onoff' );
    $ta_responsible_additional_sidebar_onoff = ta_read_op( 'ta_responsible_additional_sidebar_onoff' );
    $ta_responsible_additional_sidebarsub_onoff = ta_read_op( 'ta_responsible_additional_sidebarsub_onoff' );
    $ta_responsible_additional_header_height = ta_read_op( 'ta_responsible_additional_header_height' );
    $ta_responsible_additional_trigger_type = ta_read_op( 'ta_responsible_additional_trigger_type' );
    $ta_responsible_additional_trigger_width = ta_read_op( 'ta_responsible_additional_trigger_width' );
    $ta_responsible_additional_trigger_color = ta_select_color_w_image_color( 'ta_responsible_additional_trigger_color' );
    $ta_responsible_additional_closer_type = ta_read_op( 'ta_responsible_additional_closer_type' );
    $ta_responsible_additional_closer_width = ta_read_op( 'ta_responsible_additional_closer_width' );
    $ta_responsible_additional_closer_color = ta_select_color_w_image_color( 'ta_responsible_additional_closer_color' );
    $ta_responsible_additional_balloon_onoff = ta_read_op( 'ta_responsible_additional_balloon_onoff' );
    $ta_responsible_additional_balloon_size = ta_read_op( 'ta_responsible_additional_balloon_size' );
    $ta_responsible_additional_balloon_color = ta_select_color_w_image_color( 'ta_responsible_additional_balloon_color' );
    $ta_responsible_additional_balloon_top = ta_read_op( 'ta_responsible_additional_balloon_top' );
    $ta_responsible_additional_balloon_left = ta_read_op( 'ta_responsible_additional_balloon_left' );
    $ta_responsible_additional_logoarea_resize = ta_read_op( 'ta_responsible_additional_logoarea_resize' );
    $ta_responsible_additional_logoarea_text_size = ta_read_op( 'ta_responsible_additional_logoarea_text_size' );
    $ta_responsible_additional_logoarea_toppadding = ta_read_op( 'ta_responsible_additional_logoarea_toppadding' );
    $ta_responsible_additional_search_onoff = ta_read_op( 'ta_responsible_additional_search_onoff' );
    $ta_responsible_additional_header_edgepadding = ta_read_op( 'ta_responsible_additional_header_edgepadding' );
    $ta_responsible_additional_guidance_onoff = ta_read_op( 'ta_responsible_additional_guidance_onoff' );
    $ta_responsible_additional_guidance_text = ta_read_op( 'ta_responsible_additional_guidance_text' );
    $ta_responsible_additional_guidance_size = ta_read_op( 'ta_responsible_additional_guidance_size' );
    $ta_responsible_additional_guidance_fontweight = ta_read_op( 'ta_responsible_additional_guidance_fontweight' );
    $ta_responsible_additional_guidance_color = ta_select_color_w_image_color( 'ta_responsible_additional_guidance_color' );
    $ta_responsible_additional_guidance_top = ta_read_op( 'ta_responsible_additional_guidance_top' );
    $ta_responsible_additional_guidance_left = ta_read_op( 'ta_responsible_additional_guidance_left' );
    $ta_responsible_additional_guidance_period = ta_read_op( 'ta_responsible_additional_guidance_period' );
  } else {
    $ta_responsible_additional_onoff = "invalid";
    $ta_responsible_additional_sidebar_onoff = "invalid";
    $ta_responsible_additional_sidebarsub_onoff = "invalid";
    $ta_responsible_additional_header_height = 50;
    $ta_responsible_additional_trigger_type = "f333";
    $ta_responsible_additional_trigger_width = 50;
    $ta_responsible_additional_trigger_color = "#000000";
    $ta_responsible_additional_closer_type = "f158";
    $ta_responsible_additional_closer_width = 50;
    $ta_responsible_additional_closer_color = "#000000";
    $ta_responsible_additional_balloon_onoff = "valid";
    $ta_responsible_additional_balloon_size = 20;
    $ta_responsible_additional_balloon_color = "#000000";
    $ta_responsible_additional_balloon_top = 40;
    $ta_responsible_additional_balloon_left = 3;
    $ta_responsible_additional_logoarea_resize = 60;
    $ta_responsible_additional_logoarea_text_size = 16;
    $ta_responsible_additional_logoarea_toppadding = 0;
    $ta_responsible_additional_search_onoff = "valid";
    $ta_responsible_additional_header_edgepadding = 2;
    $ta_responsible_additional_guidance_onoff = "invalid";
    $ta_responsible_additional_guidance_text = "";
    $ta_responsible_additional_guidance_size = 16;
    $ta_responsible_additional_guidance_fontweight = "bold";
    $ta_responsible_additional_guidance_color = "#000000";
    $ta_responsible_additional_guidance_top = 50;
    $ta_responsible_additional_guidance_left = 5;
    $ta_responsible_additional_guidance_period = 3000;
  }
  $ta_header_frame_color = ta_select_color_w_image_color( 'ta_header_frame_color' );
  $ta_header_logo_text_color = ta_select_color_w_image_color( 'ta_header_logo_text_color' );
  $ta_header_logo_text_hover = ta_select_color_w_image_color( 'ta_header_logo_text_hover' );
  $ta_header_search_border_color = ta_select_color_w_image_color( 'ta_header_search_border_color');
  $ta_header_search_radius_size = ta_read_op( 'ta_header_search_radius_size');
  $ta_header_search_glass = ta_read_op( 'ta_header_search_glass' );
  $ta_header_search_height_size = ta_read_op( 'ta_header_search_height_size' );
  $ta_header_search_color = ta_select_color_w_image_color( 'ta_header_search_color' );
  $ta_header_search_bgcolor = ta_select_color_w_image_color( 'ta_header_search_bgcolor' );


  //***** トップページのフレーム外(body.home #body-wrap)背景色・背景画像
  $bodyhome_bg_color = ta_select_color_w_image_color( 'ta_responsible_top_outframe_color' );
  if ( TA_HIEND_PI ) {
    $ta_responsible_top_outframe_grad_onoff = ta_read_op( 'ta_responsible_top_outframe_color_grad_onoff' );
  } else {
    $ta_responsible_top_outframe_grad_onoff = "invalid";
  }
  $bodyhome_bg_img_url = ta_read_op( 'ta_responsible_top_outframe_pic' );
  $bodyhome_bg_img_rule = ta_read_op( 'ta_responsible_top_outframe_pic_rule' );
  $bodyhome_bg_img_margin = ta_read_op( 'ta_responsible_top_outframe_pic_margin' );
  $ta_responsible_top_outframe_bar_top_onoff = ta_read_op( 'ta_responsible_top_outframe_bar_top_onoff' );
  $ta_responsible_top_outframe_bar_top_width = ta_read_op( 'ta_responsible_top_outframe_bar_top_width' );
  $ta_responsible_top_outframe_bar_top_color = ta_select_color_w_image_color( 'ta_responsible_top_outframe_bar_top_color' );
  if ( TA_HIEND_PI ) {
    $ta_responsible_top_outframe_bar_top_grad_onoff = ta_read_op( 'ta_responsible_top_outframe_bar_top_color_grad_onoff' );
  } else {
    $ta_responsible_top_outframe_bar_top_grad_onoff = "invalid";
  }
  $ta_responsible_top_outframe_bar_bottom_onoff = ta_read_op( 'ta_responsible_top_outframe_bar_bottom_onoff' );
  $ta_responsible_top_outframe_bar_bottom_width = ta_read_op( 'ta_responsible_top_outframe_bar_bottom_width' );
  $ta_responsible_top_outframe_bar_bottom_color = ta_select_color_w_image_color( 'ta_responsible_top_outframe_bar_bottom_color' );
  if ( TA_HIEND_PI ) {
    $ta_responsible_top_outframe_bar_bottom_grad_onoff = ta_read_op( 'ta_responsible_top_outframe_bar_bottom_color_grad_onoff' );
  } else {
    $ta_responsible_top_outframe_bar_bottom_grad_onoff = "invalid";
  }
  $ta_responsible_top_outframe_bar_free_onoff = ta_read_op( 'ta_responsible_top_outframe_bar_free_onoff' );
  $ta_responsible_top_outframe_bar_free_width = ta_read_op( 'ta_responsible_top_outframe_bar_free_width' );
  $ta_responsible_top_outframe_bar_free_distance = ta_read_op( 'ta_responsible_top_outframe_bar_free_distance' );
  $ta_responsible_top_outframe_bar_free_color = ta_select_color_w_image_color( 'ta_responsible_top_outframe_bar_free_color' );
  if ( TA_HIEND_PI ) {
    $ta_responsible_top_outframe_bar_free_grad_onoff = ta_read_op( 'ta_responsible_top_outframe_bar_free_color_grad_onoff' );
  } else {
    $ta_responsible_top_outframe_bar_free_grad_onoff = "invalid";
  }
  switch ( $bodyhome_bg_img_rule ) {
    case 'top_x':
      $bodyhome_repeat = 'repeat-x';
      $bodyhome_position = 'left top ' . $bodyhome_bg_img_margin . 'px';
      break;
    case 'bottom_x':
      $bodyhome_repeat = 'repeat-x';
      $bodyhome_position = 'left bottom ' . $bodyhome_bg_img_margin . 'px';
      break;
    case 'top_only':
      $bodyhome_repeat = 'no-repeat';
      $bodyhome_position = 'center top ' . $bodyhome_bg_img_margin . 'px';
      break;
    case 'bottom_only':
      $bodyhome_repeat = 'no-repeat';
      $bodyhome_position = 'center bottom ' . $bodyhome_bg_img_margin . 'px';
      break;
    case 'x_y':
      $bodyhome_repeat = 'repeat';
      $bodyhome_position = 'left top';
      break;
  }

  //***** トップページ以外のフレーム外(body #body-wrap)背景色・背景画像
  $body_bg_color = ta_select_color_w_image_color( 'ta_responsible_outframe_color' );
  if ( TA_HIEND_PI ) {
    $ta_responsible_outframe_grad_onoff = ta_read_op( 'ta_responsible_outframe_color_grad_onoff' );
  } else {
    $ta_responsible_outframe_grad_onoff = "invalid";
  }
  $body_bg_img_url = ta_read_op( 'ta_responsible_outframe_pic' );
  $body_bg_img_rule = ta_read_op( 'ta_responsible_outframe_pic_rule' );
  $body_bg_img_margin = ta_read_op( 'ta_responsible_outframe_pic_margin' );
  $ta_responsible_outframe_bar_top_onoff = ta_read_op( 'ta_responsible_outframe_bar_top_onoff' );
  $ta_responsible_outframe_bar_top_width = ta_read_op( 'ta_responsible_outframe_bar_top_width' );
  $ta_responsible_outframe_bar_top_color = ta_select_color_w_image_color( 'ta_responsible_outframe_bar_top_color' );
  if ( TA_HIEND_PI ) {
    $ta_responsible_outframe_bar_top_grad_onoff = ta_read_op( 'ta_responsible_outframe_bar_top_color_grad_onoff' );
  } else {
    $ta_responsible_outframe_bar_top_grad_onoff = "invalid";
  }
  $ta_responsible_outframe_bar_bottom_onoff = ta_read_op( 'ta_responsible_outframe_bar_bottom_onoff' );
  $ta_responsible_outframe_bar_bottom_width = ta_read_op( 'ta_responsible_outframe_bar_bottom_width' );
  $ta_responsible_outframe_bar_bottom_color = ta_select_color_w_image_color( 'ta_responsible_outframe_bar_bottom_color' );
  if ( TA_HIEND_PI ) {
    $ta_responsible_outframe_bar_bottom_grad_onoff = ta_read_op( 'ta_responsible_outframe_bar_bottom_color_grad_onoff' );
  } else {
    $ta_responsible_outframe_bar_bottom_grad_onoff = "invalid";
  }
  $ta_responsible_outframe_bar_free_onoff = ta_read_op( 'ta_responsible_outframe_bar_free_onoff' );
  $ta_responsible_outframe_bar_free_width = ta_read_op( 'ta_responsible_outframe_bar_free_width' );
  $ta_responsible_outframe_bar_free_distance = ta_read_op( 'ta_responsible_outframe_bar_free_distance' );
  $ta_responsible_outframe_bar_free_color = ta_select_color_w_image_color( 'ta_responsible_outframe_bar_free_color' );
  if ( TA_HIEND_PI ) {
    $ta_responsible_outframe_bar_free_grad_onoff = ta_read_op( 'ta_responsible_outframe_bar_free_color_grad_onoff' );
  } else {
    $ta_responsible_outframe_bar_free_grad_onoff = "invalid";
  }
  switch ( $body_bg_img_rule ) {
    case 'top_x':
      $body_repeat = 'repeat-x';
      $body_position = 'left top ' . $body_bg_img_margin . 'px';
      break;
    case 'bottom_x':
      $body_repeat = 'repeat-x';
      $body_position = 'left bottom ' . $body_bg_img_margin . 'px';
      break;
    case 'top_only':
      $body_repeat = 'no-repeat';
      $body_position = 'center top ' . $body_bg_img_margin . 'px';
      break;
    case 'bottom_only':
      $body_repeat = 'no-repeat';
      $body_position = 'center bottom ' . $body_bg_img_margin . 'px';
      break;
    case 'x_y':
      $body_repeat = 'repeat';
      $body_position = 'left top';
      break;
  }

  //***** レスポンシブデザイン時のヘッダーの背景色・背景画像
  $ta_responsible_header_frame_color = ta_select_color_w_image_color( 'ta_responsible_header_frame_color' );
  if ( TA_HIEND_PI ) {
    $ta_responsible_header_frame_grad_onoff = ta_read_op( 'ta_responsible_header_frame_color_grad_onoff' );
  } else {
    $ta_responsible_header_frame_grad_onoff = "invalid";
  }
  $ta_responsible_header_frame_pic = ta_read_op( 'ta_responsible_header_frame_pic' );
  $ta_responsible_header_frame_pic_rule = ta_read_op( 'ta_responsible_header_frame_pic_rule' );
  $ta_responsible_header_frame_pic_margin = ta_read_op( 'ta_responsible_header_frame_pic_margin' );
  $ta_responsible_header_frame_bar_top_onoff = ta_read_op( 'ta_responsible_header_frame_bar_top_onoff' );
  $ta_responsible_header_frame_bar_top_width = ta_read_op( 'ta_responsible_header_frame_bar_top_width' );
  $ta_responsible_header_frame_bar_top_color = ta_select_color_w_image_color( 'ta_responsible_header_frame_bar_top_color' );
  if ( TA_HIEND_PI ) {
    $ta_responsible_header_frame_bar_top_grad_onoff = ta_read_op( 'ta_responsible_header_frame_bar_top_grad_onoff' );
  } else {
    $ta_responsible_header_frame_bar_top_grad_onoff = "invalid";
  }
  $ta_responsible_header_frame_bar_bottom_onoff = ta_read_op( 'ta_responsible_header_frame_bar_bottom_onoff' );
  $ta_responsible_header_frame_bar_bottom_width = ta_read_op( 'ta_responsible_header_frame_bar_bottom_width' );
  $ta_responsible_header_frame_bar_bottom_color = ta_select_color_w_image_color( 'ta_responsible_header_frame_bar_bottom_color' );
  if ( TA_HIEND_PI ) {
    $ta_responsible_header_frame_bar_bottom_grad_onoff = ta_read_op( 'ta_responsible_header_frame_bar_bottom_grad_onoff' );
  } else {
    $ta_responsible_header_frame_bar_bottom_grad_onoff = "invalid";
  }
  $ta_responsible_header_frame_bar_free_onoff = ta_read_op( 'ta_responsible_header_frame_bar_free_onoff' );
  $ta_responsible_header_frame_bar_free_width = ta_read_op( 'ta_responsible_header_frame_bar_free_width' );
  $ta_responsible_header_frame_bar_free_distance = ta_read_op( 'ta_responsible_header_frame_bar_free_distance' );
  $ta_responsible_header_frame_bar_free_color = ta_select_color_w_image_color( 'ta_responsible_header_frame_bar_free_color' );
  if ( TA_HIEND_PI ) {
    $ta_responsible_header_frame_bar_free_grad_onoff = ta_read_op( 'ta_responsible_header_frame_bar_free_grad_onoff' );
  } else {
    $ta_responsible_header_frame_bar_free_grad_onoff = "invalid";
  }
  switch ( $ta_responsible_header_frame_pic_rule ) {
    case 'top_x':
      $header_frame_repeat = 'repeat-x';
      $header_frame_position = 'left top ' . $ta_responsible_header_frame_pic_margin . 'px';
      break;
    case 'bottom_x':
      $header_frame_repeat = 'repeat-x';
      $header_frame_position = 'left bottom ' . $ta_responsible_header_frame_pic_margin . 'px';
      break;
    case 'top_only':
      $header_frame_repeat = 'no-repeat';
      $header_frame_position = 'center top ' . $ta_responsible_header_frame_pic_margin . 'px';
      break;
    case 'bottom_only':
      $header_frame_repeat = 'no-repeat';
      $header_frame_position = 'center bottom ' . $ta_responsible_header_frame_pic_margin . 'px';
      break;
    case 'x_y':
      $header_frame_repeat = 'repeat';
      $header_frame_position = 'left top';
      break;
  }

  //レスポンシブデザイン基本レイアウト
  if ( 'valid' == $ta_responsible_base_onoff ) { ?>
@media only screen and (max-width : <?php echo $ta_responsible_base_switch_width; ?>px){
  /******* 共通 *******/
  html {
    overflow-y: scroll;
    overflow-x: hidden;
  }
  
<?php
    if ( 'valid' == $ta_header_bannerarea2wrap_onoff && 'valid' == $ta_header_bannerarea2wrap_contentpos_onoff ) { ?>
  /******* #body-wrapのリセット *******/
  #body-wrap {
    margin-top: 0!important;
  }
  
<?php
    }
    if ( 'valid' == $ta_common_side2wrap_onoff ) { ?>
  /******* サイドバー・サブサイドバーのフレーム外移動時の処理 *******/
  #body-wrap {
    display: block!important;
  }
  
  #body-wrap #wrap {
    float: none!important;
  }
  
  #outer-sidebar-container,
  #outer-sidebarsub-container {
    display: none!important;
  }
  
<?php
    } ?>
  /******* body #body-wrap *******/
  body.home #body-wrap {
    background: none!important;
<?php
    if ( 'invalid' == $ta_responsible_top_outframe_grad_onoff ) { ?>
    background-color: <?php echo $bodyhome_bg_color; ?>!important;
<?php
      if ( 'no_image' != $bodyhome_bg_img_url ) { ?>
    background-image: url("<?php echo $bodyhome_bg_img_url; ?>")!important;
<?php
      }
    } else {
      ta_responsible_gradient_color_style( 'ta_responsible_top_outframe_color', $bodyhome_bg_img_url );
    }
    if ( 'no_image' != $bodyhome_bg_img_url ) { ?>
    background-repeat: <?php echo $bodyhome_repeat; ?>!important;
    background-position: <?php echo $bodyhome_position; ?>!important;
<?php
    } ?>
  }

  body:not(.home) #body-wrap {
    background: none!important;
<?php
    if ( 'invalid' == $ta_responsible_outframe_grad_onoff ) { ?>
    background-color: <?php echo $body_bg_color; ?>!important;
<?php
      if ( 'no_image' != $body_bg_img_url ) { ?>
    background-image: url("<?php echo $body_bg_img_url; ?>")!important;
<?php
      }
    } else {
      ta_responsible_gradient_color_style( 'ta_responsible_outframe_color', $body_bg_img_url );
    }
    if ( 'no_image' != $body_bg_img_url ) { ?>
    background-repeat: <?php echo $body_repeat; ?>!important;
    background-position: <?php echo $body_position; ?>!important;
<?php
    } ?>
  }

<?php
    if ( 'valid' == $ta_responsible_top_outframe_bar_top_onoff ) { ?>
body.home #body-wrap #back-top-bar {
  display: block!important;
  position: absolute!important;
  top: 0!important;
  left: 0!important;
  height: <?php echo $ta_responsible_top_outframe_bar_top_width; ?>px!important;
  width: 100%!important;
  z-index: 11!important;
  background-image: none!important;
<?php
      if ( 'invalid' == $ta_responsible_top_outframe_bar_top_grad_onoff ) { ?>
  background-color: <?php echo $ta_responsible_top_outframe_bar_top_color; ?>!important;
<?php
      } else { 
        ta_responsible_gradient_color_style( 'ta_responsible_top_outframe_bar_top_color' );
      } ?>
}

<?php
    } else { ?>
body.home #body-wrap #back-top-bar {
  display: none!important;
}

<?php
    }
    if ( 'valid' == $ta_responsible_top_outframe_bar_bottom_onoff ) { ?>
body.home #footer-container #back-bottom-bar {
  display: block!important;
  position: absolute!important;
  bottom: 0!important;
  left: 0!important;
  height: <?php echo $ta_responsible_top_outframe_bar_bottom_width; ?>px!important;
  width: 100%!important;
  z-index: 778!important;
  background-image: none!important;
<?php
      if ( 'invalid' == $ta_responsible_top_outframe_bar_bottom_grad_onoff ) { ?>
  background-color: <?php echo $ta_responsible_top_outframe_bar_bottom_color; ?>!important;
<?php
      } else { 
        ta_responsible_gradient_color_style( 'ta_responsible_top_outframe_bar_bottom_color' );
      } ?>
}

body.home #footer-container #footer {
  position: relative;
  z-index: 888!important;
}

<?php
    } else { ?>
body.home #footer-container #back-bottom-bar {
  display: none!important;
}

<?php
    } ?>
body.home #body-wrap #back-gmenu-bar {
  display: none!important;
}

<?php
    if ( 'valid' == $ta_responsible_top_outframe_bar_free_onoff ) { ?>
body.home #body-wrap #back-free-bar {
  display: block!important;
  position: absolute!important;
  top: <?php echo $ta_responsible_top_outframe_bar_free_distance; ?>px!important;
  left: 0!important;
  height: <?php echo $ta_responsible_top_outframe_bar_free_width; ?>px!important;
  width: 100%!important;
  z-index: 11!important;
  background-image: none!important;
<?php
      if ( 'invalid' == $ta_responsible_top_outframe_bar_free_grad_onoff ) { ?>
  background-color: <?php echo $ta_responsible_top_outframe_bar_free_color; ?>!important;
<?php
      } else {
        ta_responsible_gradient_color_style( 'ta_responsible_top_outframe_bar_free_color' );
      } ?>
}

<?php
    } else { ?>
body.home #body-wrap #back-free-bar {
  display: none!important;
}

<?php
    }
    if ( 'valid' == $ta_responsible_outframe_bar_top_onoff ) { ?>
body:not(.home) #body-wrap #back-top-bar {
  display: block!important;
  position: absolute!important;
  top: 0!important;
  left: 0!important;
  height: <?php echo $ta_responsible_outframe_bar_top_width; ?>px!important;
  width: 100%!important;
  z-index: 11!important;
  background-image: none!important;
<?php
      if ( 'invalid' == $ta_responsible_outframe_bar_top_grad_onoff ) { ?>
  background-color: <?php echo $ta_responsible_outframe_bar_top_color; ?>!important;
<?php
      } else { 
        ta_responsible_gradient_color_style( 'ta_responsible_outframe_bar_top_color' );
      } ?>
}

<?php
    } else { ?>
body:not(.home) #body-wrap #back-top-bar {
  display: none!important;
}

<?php
    }
    if ( 'valid' == $ta_responsible_outframe_bar_bottom_onoff ) { ?>
body:not(.home) #footer-container #back-bottom-bar {
  display: block!important;
  position: absolute!important;
  bottom: 0!important;
  left: 0!important;
  height: <?php echo $ta_responsible_outframe_bar_bottom_width; ?>px!important;
  width: 100%!important;
  z-index: 778!important;
  background-image: none!important;
<?php
      if ( 'invalid' == $ta_responsible_outframe_bar_bottom_grad_onoff ) { ?>
  background-color: <?php echo $ta_responsible_outframe_bar_bottom_color; ?>!important;
<?php
      } else { 
        ta_responsible_gradient_color_style( 'ta_responsible_outframe_bar_bottom_color' );
      } ?>
}

body:not(.home) #footer-container #footer {
  position: relative;
  z-index: 888!important;
}

<?php
    } else { ?>
body:not(.home) #footer-container #back-bottom-bar {
  display: none!important;
}

<?php
    } ?>
body:not(.home) #body-wrap #back-gmenu-bar {
  display: none!important;
}

<?php
    if ( 'valid' == $ta_responsible_outframe_bar_free_onoff ) { ?>
body:not(.home) #body-wrap #back-free-bar {
  display: block!important;
  position: absolute!important;
  top: <?php echo $ta_responsible_outframe_bar_free_distance; ?>px!important;
  left: 0!important;
  height: <?php echo $ta_responsible_outframe_bar_free_width; ?>px!important;
  width: 100%!important;
  z-index: 11!important;
  background-image: none!important;
<?php
      if ( 'invalid' == $ta_responsible_outframe_bar_free_grad_onoff ) { ?>
  background-color: <?php echo $ta_responsible_outframe_bar_free_color; ?>!important;
<?php
      } else {
        ta_responsible_gradient_color_style( 'ta_responsible_outframe_bar_free_color' );
      } ?>
}

<?php
    } else { ?>
body:not(.home) #body-wrap #back-free-bar {
  display: none!important;
}

<?php
    }
    if ( 'valid' == $ta_responsible_additional_onoff ) { ?>
  /******* サイドバー・サブサイドバー標準表示を無効 *******/
  #container #sidebar-container,
  #container #sidebarsub-container {
    display: none!important;
  }
  
  /******* アディショナル表示を有効 *******/
  #additional-header {
    display: inline-block!important;
    vertical-align: bottom!important;
    width: 100%!important;
    height: <?php echo $ta_responsible_additional_header_height; ?>px!important;
    overflow: hidden!important;
<?php
      if ( 'invalid' == $ta_responsible_header_frame_grad_onoff ) { ?>
    background: none!important;
    background-color: <?php echo $ta_responsible_header_frame_color; ?>!important;
<?php
        if ( 'no_image' != $ta_responsible_header_frame_pic ) { ?>
    background-image: url("<?php echo $ta_responsible_header_frame_pic; ?>")!important;
<?php
        }
      } else {
        ta_responsible_gradient_color_style( 'ta_responsible_header_frame_color', $ta_responsible_header_frame_pic );
      }
      if ( 'no_image' != $ta_responsible_header_frame_pic ) { ?>
    background-repeat: <?php echo $header_frame_repeat; ?>!important;
    background-position: <?php echo $header_frame_position; ?>!important;
<?php
      } ?>
  }
  
  #additional-container {
    display: block;
    width: 100%!important;
    background-color: <?php echo $ta_header_frame_color; ?>!important;
    clear: both!important;
  }
  
<?php
      if ( 'valid' == $ta_responsible_additional_sidebar_onoff ) { ?>
  #additional-container #additional-content #sidebar-container {
    display: block!important;
  }
  
<?php
      }
      if ( 'valid' == $ta_responsible_additional_sidebarsub_onoff ) { ?>
  #additional-container #additional-content #sidebarsub-container {
    display: block!important;
  }
  
<?php
      } ?>
  
  /******* 標準ヘッダーのロゴエリア、連絡先エリア、検索エリアを無効 *******/
  #header {
    display: none!important;
  }
  
  /******* アディショナル表示開始マーク *******/
  #additional-header #additional-trigger {
    float: left!important;
    width: 20%!important;
    height: <?php echo $ta_responsible_additional_header_height; ?>px!important;
    padding-left: <?php echo $ta_responsible_additional_header_edgepadding; ?>%!important;
  }
  
  #additional-header #additional-trigger .trigger-icon::before {
    border: medium none!important;
    box-sizing: border-box!important;
    content: "\<?php echo $ta_responsible_additional_trigger_type; ?>"!important;
    display: inline-block!important;
    vertical-align: bottom!important;
    float: left!important;
    font: 400 <?php echo $ta_responsible_additional_trigger_width * 4 / 5; ?>px/<?php echo $ta_responsible_additional_trigger_width * 9 / 10; ?>px Dashicons!important;
    height: <?php echo $ta_responsible_additional_trigger_width * 22 / 25; ?>px!important;
    margin: 0!important;
    outline: 0 none!important;
    padding: 0!important;
    text-align: center!important;
    text-decoration: none!important;
    vertical-align: middle!important;
    width: <?php echo $ta_responsible_additional_trigger_width; ?>px!important;
    color: <?php echo $ta_responsible_additional_trigger_color; ?>!important;
    line-height: <?php echo $ta_responsible_additional_header_height; ?>px!important;
  }
  
  #additional-header #additional-trigger .closer-icon::before {
    border: medium none!important;
    box-sizing: border-box!important;
    content: "\<?php echo $ta_responsible_additional_closer_type; ?>"!important;
    display: inline-block!important;
    vertical-align: bottom!important;
    float: left!important;
    font: 400 <?php echo $ta_responsible_additional_closer_width * 4 / 5; ?>px/<?php echo $ta_responsible_additional_closer_width * 9 / 10; ?>px Dashicons!important;
    height: <?php echo $ta_responsible_additional_closer_width * 22 / 25; ?>px!important;
    margin: 0!important;
    outline: 0 none!important;
    padding: 0!important;
    text-align: center!important;
    text-decoration: none!important;
    vertical-align: middle!important;
    width: <?php echo $ta_responsible_additional_closer_width; ?>px!important;
    color: <?php echo $ta_responsible_additional_closer_color; ?>!important;
    line-height: <?php echo $ta_responsible_additional_header_height; ?>px!important;
  }
  
  #additional-header #additional-logoarea {
    float: left!important;
    width: <?php echo 60 - 2 * $ta_responsible_additional_header_edgepadding; ?>%!important;
    height: <?php echo $ta_responsible_additional_header_height; ?>px!important;
    text-align: center;
  }
  
  #additional-header #additional-logoarea #additional-logo-group-h1-text {
    display: none!important;
  }
  
  #additional-header #additional-logoarea img {
    width: auto!important;
    height: <?php echo $ta_responsible_additional_header_height * $ta_responsible_additional_logoarea_resize / 100; ?>px!important;
    margin-top: <?php echo $ta_responsible_additional_header_height * ( 100 - $ta_responsible_additional_logoarea_resize ) / 200; ?>px!important;
  }
  
  #additional-header #additional-logo-group-img {
    display: block!important;
    width: auto!important;
    font-weight: bold;
    font-size: <?php echo $ta_responsible_additional_logoarea_text_size; ?>px!important;
    padding-top: <?php echo $ta_responsible_additional_logoarea_toppadding; ?>px!important;
    color: <?php echo $ta_header_logo_text_color; ?>!important;
    text-decoration: none!important;
  }
  
  #additional-header #additional-logo-group-img a {
    display: block!important;
    width: auto!important;
    font-weight: bold;
    font-size: <?php echo $ta_responsible_additional_logoarea_text_size; ?>px!important;
    padding-top: <?php echo $ta_responsible_additional_logoarea_toppadding; ?>px!important;
    color: <?php echo $ta_header_logo_text_color; ?>!important;
    text-decoration: none!important;
  }
  
  #additional-header #additional-logo-group-img a:hover {
    color: <?php echo $ta_header_logo_text_hover; ?>!important;
  }

  #additional-header #additional-search {
    display: inline-block!important;
    vertical-align: bottom!important;
    float: right!important;
    width: 20%!important;
    height: <?php echo $ta_responsible_additional_header_height; ?>px!important;
    padding-right: <?php echo $ta_responsible_additional_header_edgepadding; ?>%!important;
  }

  #additional-search #search {
    float: right!important;
  }

  #additional-search #search #searchsubmit {
    display: none!important;
  }

  #additional-search #search input#s {
    background: url("<?php echo get_template_directory_uri(); ?>/images/ta-header-images/search_glass_<?php echo $ta_header_search_glass; ?>.png") no-repeat right center transparent!important;
    background-size: auto <?php echo $ta_header_search_height_size; ?>em!important;
    float: right!important;
    cursor: pointer!important;
    width: <?php echo $ta_header_search_height_size; ?>em!important;
    height: <?php echo $ta_header_search_height_size; ?>em!important;
    margin-right: 1px!important;
    border: medium none!important;
    border-radius: 0!important;
    color: #000000!important;
    z-index: 999!important;
    transition: width 500ms ease 0s, background 500ms ease 0s!important;
    font-size: 13px!important;
    padding: 0!important;
    margin-top : echo ( $ta_responsible_additional_header_height / 2 ); ?>px; /* IE8以下とAndroid4.3以下用 */
    margin-top : -webkit-calc( <?php echo ( $ta_responsible_additional_header_height / 2 ); ?>px - <?php echo ( $ta_header_search_height_size / 2 ); ?>em );
    margin-top : calc( <?php echo ( $ta_responsible_additional_header_height / 2 ); ?>px - <?php echo ( $ta_header_search_height_size / 2 ); ?>em );
  }
  
  #additional-search #search input#s:focus {
    background-size: auto <?php echo $ta_header_search_height_size; ?>em!important;
    width: 100%!important;
    height: <?php echo $ta_header_search_height_size; ?>em!important;
    margin-right: 0!important;
    color: <?php echo $ta_header_search_color; ?>!important;
    background-color: <?php echo $ta_header_search_bgcolor; ?>!important;
    border: 1px solid <?php echo $ta_header_search_border_color; ?>!important;
    border-top-right-radius: <?php echo $ta_header_search_radius_size; ?>px!important;
    border-bottom-right-radius: <?php echo $ta_header_search_radius_size; ?>px!important;
    border-top-left-radius: <?php echo $ta_header_search_radius_size; ?>px!important;
    border-bottom-left-radius: <?php echo $ta_header_search_radius_size; ?>px!important;
  }

<?php
      if ( 'valid' == $ta_responsible_additional_balloon_onoff ) { ?>
  #additional-container::before {
    border-bottom: <?php echo $ta_responsible_additional_balloon_size; ?>px solid <?php echo $ta_responsible_additional_balloon_color; ?>;
    border-left: <?php echo $ta_responsible_additional_balloon_size; ?>px solid transparent;
    border-right: <?php echo $ta_responsible_additional_balloon_size; ?>px solid transparent;
    content: "";
    display: block;
    height: 0;
    left: <?php echo $ta_responsible_additional_balloon_left; ?>%;
    margin: 0;
    position: absolute;
    top: <?php echo $ta_responsible_additional_balloon_top; ?>px;
    width: 0;
  }
  
<?php
      }
      if ( 'valid' == $ta_responsible_additional_guidance_onoff ) { ?>
  body {
    position:relative;
    z-index: 0;
  }
  
  #additional-guidance {
    font-size: <?php echo $ta_responsible_additional_guidance_size; ?>px;
    font-weight: <?php echo $ta_responsible_additional_guidance_fontweight; ?>;
    color: <?php echo $ta_responsible_additional_guidance_color; ?>;
    position: absolute;
    z-index: 999;
    top: <?php echo $ta_responsible_additional_guidance_top; ?>px;
    left: <?php echo $ta_responsible_additional_guidance_left; ?>%;
  }
  
<?php
      }
    } ?>
  /******* 各コンテンツ内の画像の枠越えを防ぐ *******/
  #header img,
  #content img:not(.ta-top-latestposts-release-mark):not(.ta-top-postdigest-release-mark):not(.ta-common-listpage-release-mark),
  #sidebar img:not(.ta-sidebar-latestposts-release-mark):not(.ta-sidebar-postdigest-release-mark),
  #sidebarsub img:not(.ta-sidebarsub-latestposts-release-mark):not(.ta-sidebarsub-postdigest-release-mark),
  #footer img {
    max-width: 100%!important;
    height: auto!important;
  }

  /******* サイズリセット *******/
  #body-wrap,
  #footer-container {
    min-width: 100%!important;
    width: auto!important;
  }
  
  #wrap,
  #header,
  #banner-area,
  #logo-group,
  #info-group,
  #search-group,
  #ta-mb-global-navi-group,
  #ta-mb-global-navi-container,
  #ta-global-navi,
  #header_image,
  #header_image img,
  #header_freearea,
  #header_freearea img,
  #container,
  #main-sidebarsub,
  #main,
  #sidebar-container,
  #sidebarsub-container,
  #footer-container,
  #copyright-container {
    width: 100%!important;
    height: auto!important;
    margin: 0!important;
    padding: 0!important;
  }
  
  /******* サイズ確認モード時の幅情報削除 *******/
  .size-check {
    display: none!important;
  }
  
}

<?php
  /******** レスポンシブデザインサイドバーレイアウト ********/
    if ( "invalid" == $ta_responsible_base_sidebar_onoff ) { ?>
@media only screen and (max-width : <?php echo $ta_responsible_base_switch_width; ?>px){
  #sidebar-container { display: none!important; float: none!important; }
  #sidebar { display: none!important; float: none!important; }
}

<?php
    }

  /******** レスポンシブデザインサブサイドバーレイアウト ********/
    if ( "invalid" == $ta_responsible_base_sidebarsub_onoff ) { ?>
@media only screen and (max-width : <?php echo $ta_responsible_base_switch_width; ?>px){
  #sidebarsub-container { display: none!important; float: none!important; }
  #sidebarsub { display: none!important; float: none!important; }
}

<?php
    }

  /******** ヘッダーのレスポンシブデザイン設定 ********/
    $ta_responsible_header_onoff = ta_read_op( 'ta_responsible_header_onoff' );
    $ta_responsible_header_top_margin = ta_read_op( 'ta_responsible_header_top_margin' );
    $ta_responsible_header_bottom_margin = ta_read_op( 'ta_responsible_header_bottom_margin' );
    $ta_responsible_header_font_size = ta_read_op( 'ta_responsible_header_font_size' ); ?>
@media only screen and (max-width : <?php echo $ta_responsible_base_switch_width; ?>px){
  #outer-header-container {
    display: none;!important;
  }

<?php
    if ( 'invalid' == $ta_responsible_additional_onoff ) { ?>
  #header-container {
    display: block;!important;
  }
<?php
    } ?>
  
  #header {
    background: none!important;
<?php
    if ( "invalid" == $ta_responsible_header_onoff ) { ?>
    display: none!important;
<?php
    } ?>
    font-size: <?php echo $ta_responsible_header_font_size; ?>%!important;
    margin-top: <?php echo $ta_responsible_header_top_margin; ?>px!important;
    margin-bottom: <?php echo $ta_responsible_header_bottom_margin; ?>px!important;
<?php
      if ( 'invalid' == $ta_responsible_header_frame_grad_onoff ) { ?>
    background-color: <?php echo $ta_responsible_header_frame_color; ?>!important;
<?php
        if ( 'no_image' != $ta_responsible_header_frame_pic ) { ?>
    background-image: url("<?php echo $ta_responsible_header_frame_pic; ?>")!important;
<?php
        }
      } else {
        ta_responsible_gradient_color_style( 'ta_responsible_header_frame_color', $ta_responsible_header_frame_pic );
      }
      if ( 'no_image' != $ta_responsible_header_frame_pic ) { ?>
    background-repeat: <?php echo $header_frame_repeat; ?>!important;
    background-position: <?php echo $header_frame_position; ?>!important;
<?php
      } ?>
  }
  
  <?php ta_responsive_paragraph_style( 'ta_responsible_header_font', 'ta_header_font', '#header' ); ?>
  #header-globalnavi-image-container {
    font-size: <?php echo $ta_responsible_header_font_size; ?>%!important;
  }
  
  <?php ta_responsive_paragraph_style( 'ta_responsible_header_font', 'ta_header_font', '#header-globalnavi-image-container' ); ?>
}

<?php
    $ta_responsible_header_logoarea_onoff = ta_read_op( 'ta_responsible_header_logoarea_onoff' );
    if ( "invalid" == $ta_responsible_header_logoarea_onoff ) { ?>
@media only screen and (max-width : <?php echo $ta_responsible_base_switch_width; ?>px){
  #logo-group { display: none!important; }
}

<?php
    }
    ta_responsible_detail_style_w_php( 'ta_responsible_header_logoarea_h1', '#logo-group-h1-text', 'valid', 'valid' );
    $ta_responsible_header_logoarea_h1_color = ta_select_color_w_image_color( 'ta_responsible_header_logoarea_h1_color' );
    $ta_responsible_header_logoarea_h1_fontweight = ta_read_op( 'ta_responsible_header_logoarea_h1_fontweight' );
    $ta_responsible_header_logoarea_h1_anchor_color = ta_select_color_w_image_color( 'ta_responsible_header_logoarea_h1_anchor_color' );
    $ta_responsible_header_logoarea_h1_anchor_under = ta_read_op( 'ta_responsible_header_logoarea_h1_anchor_under' );
    $ta_responsible_header_logoarea_h1_anchor_colorhover = ta_select_color_w_image_color( 'ta_responsible_header_logoarea_h1_anchor_colorhover' );
    $ta_responsible_header_logoarea_h1_anchor_underhover = ta_read_op( 'ta_responsible_header_logoarea_h1_anchor_underhover' ); ?>
@media only screen and (max-width : <?php echo $ta_responsible_base_switch_width; ?>px){
  #logo-group-h1-text {
    color: <?php echo $ta_responsible_header_logoarea_h1_color; ?>!important;
    font-weight: <?php echo $ta_responsible_header_logoarea_h1_fontweight; ?>!important;
  }
  
  #logo-group-h1-text a {
    color: <?php echo $ta_responsible_header_logoarea_h1_anchor_color; ?>!important;
    text-decoration: <?php echo ( 'valid' == $ta_responsible_header_logoarea_h1_anchor_under ) ? 'underline' : 'none'; ?>!important;
  }
  
  #logo-group-h1-text a:hover {
    color: <?php echo $ta_responsible_header_logoarea_h1_anchor_colorhover; ?>!important;
    text-decoration: <?php echo ( 'valid' == $ta_responsible_header_logoarea_h1_anchor_underhover ) ? 'underline' : 'none'; ?>!important;
  }
}

<?php
    ta_responsible_detail_style_w_php( 'ta_responsible_header_logoarea_img', '#logo-group-img', 'valid', 'invalid' );
    $ta_responsible_header_logoarea_img_fontweight = ta_read_op( 'ta_responsible_header_logoarea_img_fontweight' );
    $ta_responsible_header_logoarea_img_text_color = ta_select_color_w_image_color( 'ta_responsible_header_logoarea_img_text_color' );
    $ta_responsible_header_logoarea_img_text_under = ta_read_op( 'ta_responsible_header_logoarea_img_text_under' );
    $ta_responsible_header_logoarea_img_text_colorhover = ta_select_color_w_image_color( 'ta_responsible_header_logoarea_img_text_colorhover' );
    $ta_responsible_header_logoarea_img_text_underhover = ta_read_op( 'ta_responsible_header_logoarea_img_text_underhover' ); ?>
@media only screen and (max-width : <?php echo $ta_responsible_base_switch_width; ?>px){
  #logo-group-img #logo-group-noimg {
    color: <?php echo $ta_responsible_header_logoarea_img_text_color; ?>!important;
    font-weight: <?php echo $ta_responsible_header_logoarea_img_fontweight; ?>!important;
  }
  
  #logo-group #logo-group-img a,
  #logo-group #logo-group-img a:hover {
    text-decoration: none!important;
  }
  
  #logo-group #logo-group-img a #logo-group-noimg,
  #logo-group #logo-group-img #logo-group-noimg a {
    color: <?php echo $ta_responsible_header_logoarea_img_text_color; ?>!important;
    text-decoration: <?php echo ( 'valid' == $ta_responsible_header_logoarea_img_text_under ) ? 'underline' : 'none'; ?>!important;
  }
  
  #logo-group #logo-group-img a:hover #logo-group-noimg,
  #logo-group #logo-group-img #logo-group-noimg a:hover {
    color: <?php echo $ta_responsible_header_logoarea_img_text_colorhover; ?>!important;
    text-decoration: <?php echo ( 'valid' == $ta_responsible_header_logoarea_img_text_underhover ) ? 'underline' : 'none'; ?>!important;
  }
}

<?php
    $ta_responsible_header_logoarea_img_size2common = ta_read_op( 'ta_responsible_header_logoarea_img_size2common' ); ?>
@media only screen and (max-width : <?php echo $ta_responsible_base_switch_width; ?>px){
  #logo-group-noimg { font-size: <?php echo $ta_responsible_header_logoarea_img_size2common; ?>%!important; }
}

<?php
    $ta_responsible_header_infoarea_onoff = ta_read_op( 'ta_responsible_header_infoarea_onoff' );
    if ( "invalid" == $ta_responsible_header_infoarea_onoff ) { ?>
@media only screen and (max-width : <?php echo $ta_responsible_base_switch_width; ?>px){
  #info-group { display: none!important; }
}

<?php
    }
    ta_responsible_detail_style_w_php( 'ta_responsible_header_infoarea_img', '#info-group-img', 'valid', 'invalid' );
    $ta_responsible_header_infoarea_img_fontweight = ta_read_op( 'ta_responsible_header_infoarea_img_fontweight' );
    $ta_responsible_header_infoarea_img_text_color = ta_select_color_w_image_color( 'ta_responsible_header_infoarea_img_text_color' );
    $ta_responsible_header_infoarea_img_text_under = ta_read_op( 'ta_responsible_header_infoarea_img_text_under' );
    $ta_responsible_header_infoarea_img_text_colorhover = ta_select_color_w_image_color( 'ta_responsible_header_infoarea_img_text_colorhover' );
    $ta_responsible_header_infoarea_img_text_underhover = ta_read_op( 'ta_responsible_header_infoarea_img_text_underhover' ); ?>
@media only screen and (max-width : <?php echo $ta_responsible_base_switch_width; ?>px){
  #info-group-img #info-group-noimg {
    color: <?php echo $ta_responsible_header_infoarea_img_text_color; ?>!important;
    font-weight: <?php echo $ta_responsible_header_infoarea_img_fontweight; ?>!important;
  }
  
  #info-group #info-group-img a,
  #info-group #info-group-img a:hover {
    text-decoration: none!important;
  }
  
  #info-group #info-group-img a #info-group-noimg,
  #info-group #info-group-img #info-group-noimg a {
    color: <?php echo $ta_responsible_header_infoarea_img_text_color; ?>!important;
    text-decoration: <?php echo ( 'valid' == $ta_responsible_header_infoarea_img_text_under ) ? 'underline' : 'none'; ?>!important;
  }
  
  #info-group #info-group-img a:hover #info-group-noimg,
  #info-group #info-group-img #info-group-noimg a:hover {
    color: <?php echo $ta_responsible_header_infoarea_img_text_colorhover; ?>!important;
    text-decoration: <?php echo ( 'valid' == $ta_responsible_header_infoarea_img_text_underhover ) ? 'underline' : 'none'; ?>!important;
  }
}

<?php
    $ta_responsible_header_infoarea_img_size2common = ta_read_op( 'ta_responsible_header_infoarea_img_size2common' ); ?>
@media only screen and (max-width : <?php echo $ta_responsible_base_switch_width; ?>px){
  #info-group-noimg { font-size: <?php echo $ta_responsible_header_infoarea_img_size2common; ?>%!important; }
}

<?php
    ta_responsible_detail_style_w_php( 'ta_responsible_header_infoarea_menu', '#ta-headertop-info-menu', 'valid', 'invalid' );
    $ta_responsible_header_infoarea_menu_fontweight = ta_read_op( 'ta_responsible_header_infoarea_menu_fontweight' );
    $ta_responsible_header_infoarea_menu_text_color = ta_select_color_w_image_color( 'ta_responsible_header_infoarea_menu_text_color' );
    $ta_responsible_header_infoarea_menu_text_under = ta_read_op( 'ta_responsible_header_infoarea_menu_text_under' );
    $ta_responsible_header_infoarea_menu_text_colorhover = ta_select_color_w_image_color( 'ta_responsible_header_infoarea_menu_text_colorhover' );
    $ta_responsible_header_infoarea_menu_text_underhover = ta_read_op( 'ta_responsible_header_infoarea_menu_text_underhover' ); ?>
@media only screen and (max-width : <?php echo $ta_responsible_base_switch_width; ?>px){
  #ta-headertop-info-menu a,
  #ta-headertop-info-menu a:hover {
    text-decoration: none!important;
  }
  
  #ta-headertop-info-menu a {
    color: <?php echo $ta_responsible_header_infoarea_menu_text_color; ?>!important;
    font-weight: <?php echo $ta_responsible_header_infoarea_menu_fontweight; ?>!important;
    text-decoration: <?php echo ( 'valid' == $ta_responsible_header_infoarea_menu_text_under ) ? 'underline' : 'none'; ?>!important;
  }
  
  #ta-headertop-info-menu a:hover {
    color: <?php echo $ta_responsible_header_infoarea_menu_text_colorhover; ?>!important;
    text-decoration: <?php echo ( 'valid' == $ta_responsible_header_infoarea_menu_text_underhover ) ? 'underline' : 'none'; ?>!important;
  }
}

<?php
    $ta_header_info_simplemenu_layout = ta_read_op( 'ta_header_info_simplemenu_layout' ); ?>
@media only screen and (max-width : <?php echo $ta_responsible_base_switch_width; ?>px){
  #ta-headertop-info-menu ul {
    display: inline-block!important;
    vertical-align: bottom!important;
<?php
    if ( 'even' == $ta_header_info_simplemenu_layout ) { ?>
    width: 100%!important;
<?php
    } else { ?>
    width: auto!important;
<?php
    } ?>
  }
}

<?php
    ta_responsible_detail_style_w_php( 'ta_responsible_header_infoarea_sns', '#info-group .sns-group, #info-group .sns-group ul', 'valid', 'invalid' );
    $ta_responsible_header_searcharea_onoff = ta_read_op( 'ta_responsible_header_searcharea_onoff' );
    if ( "invalid" == $ta_responsible_header_searcharea_onoff ) { ?>
@media only screen and (max-width : <?php echo $ta_responsible_base_switch_width; ?>px){
  #search-group { display: none!important; }
}

<?php
    }
    $ta_responsible_header_searcharea_search_position = ta_read_op( 'ta_responsible_header_searcharea_search_position' );
    if ( "center" == $ta_responsible_header_searcharea_search_position ) { ?>
@media only screen and (max-width : <?php echo $ta_responsible_base_switch_width; ?>px){
  #search-group { text-align: center!important; }
}

<?php
    }
    ta_responsible_detail_style_w_php( 'ta_responsible_header_searcharea_search', '#search-group #search', 'valid', 'invalid' );
    $ta_responsible_header_searcharea_search_width = ta_read_op( 'ta_responsible_header_searcharea_search_width' );
    $ta_responsible_header_searcharea_search_position = ta_read_op( 'ta_responsible_header_searcharea_search_position' ); ?>
@media only screen and (max-width : <?php echo $ta_responsible_base_switch_width; ?>px){
  #search-group #search form {
    width: <?php echo $ta_responsible_header_searcharea_search_width; ?>%!important;
<?php
    if ( 'right' == $ta_responsible_header_searcharea_search_position ) { ?>
    float: right!important;
<?php
    } else if ( 'left' == $ta_responsible_header_searcharea_search_position ) { ?>
    float: left!important;
<?php
    } else { ?>
    float: none!important;
<?php
    } ?>
  }
}

<?php
    ta_responsible_detail_style_w_php( 'ta_responsible_header_searcharea_menu', '#ta-headertop-search-menu', 'valid', 'invalid' );
    $ta_responsible_header_searcharea_menu_fontweight = ta_read_op( 'ta_responsible_header_searcharea_menu_fontweight' );
    $ta_responsible_header_searcharea_menu_text_color = ta_select_color_w_image_color( 'ta_responsible_header_searcharea_menu_text_color' );
    $ta_responsible_header_searcharea_menu_text_under = ta_read_op( 'ta_responsible_header_searcharea_menu_text_under' );
    $ta_responsible_header_searcharea_menu_text_colorhover = ta_select_color_w_image_color( 'ta_responsible_header_searcharea_menu_text_colorhover' );
    $ta_responsible_header_searcharea_menu_text_underhover = ta_read_op( 'ta_responsible_header_searcharea_menu_text_underhover' ); ?>
@media only screen and (max-width : <?php echo $ta_responsible_base_switch_width; ?>px){
  #ta-headertop-search-menu a,
  #ta-headertop-search-menu a:hover {
    text-decoration: none!important;
  }
  
  #ta-headertop-search-menu a {
    color: <?php echo $ta_responsible_header_searcharea_menu_text_color; ?>!important;
    font-weight: <?php echo $ta_responsible_header_searcharea_menu_fontweight; ?>!important;
    text-decoration: <?php echo ( 'valid' == $ta_responsible_header_searcharea_menu_text_under ) ? 'underline' : 'none'; ?>!important;
  }
  
  #ta-headertop-search-menu a:hover {
    color: <?php echo $ta_responsible_header_searcharea_menu_text_colorhover; ?>!important;
    text-decoration: <?php echo ( 'valid' == $ta_responsible_header_searcharea_menu_text_underhover ) ? 'underline' : 'none'; ?>!important;
  }
}

@media only screen and (max-width : <?php echo $ta_responsible_base_switch_width; ?>px){
  #ta-headertop-search-menu ul {
    display: inline-block!important;
    vertical-align: bottom!important;
  }
}

<?php
    ta_responsible_detail_style_w_php( 'ta_responsible_header_searcharea_sns', '#search-group .sns-group, #search-group .sns-group ul', 'valid', 'invalid' );
    $ta_header_glabalmenu_wholeheight = ta_read_op( 'ta_header_glabalmenu_wholeheight' );
    $ta_header_glabalmenu_frame_size = ta_read_op( 'ta_header_glabalmenu_frame_size' );
    $ta_header_glabalmenu_frame_select = ta_read_op( 'ta_header_glabalmenu_frame_select' );
    $ta_header_glabalmenu_fontsize = ta_read_op( 'ta_header_glabalmenu_fontsize' );
    $ta_header_glabalsubmenu_fontsize = ta_read_op( 'ta_header_glabalsubmenu_fontsize' );
    /******** グローバルナビのレスポンシブデザイン設定 ********/
    $ta_responsible_glbnavi_onoff = ta_read_op( 'ta_responsible_glbnavi_onoff' );
    $ta_responsible_glbnavi_top_margin = ta_read_op( 'ta_responsible_glbnavi_top_margin' );
    $ta_responsible_glbnavi_bottom_margin = ta_read_op( 'ta_responsible_glbnavi_bottom_margin' );
    $ta_responsible_glbnavi_w_padding_onoff = ta_read_op( 'ta_responsible_glbnavi_w_padding_onoff' );
    $ta_responsible_glbnavi_text_size_ratio = ta_read_op( 'ta_responsible_glbnavi_text_size_ratio' );
    $ta_responsible_glbnavi_height_size_ratio = ta_read_op( 'ta_responsible_glbnavi_height_size_ratio' );
    $ta_responsible_glbnavi_vertical_onoff = ta_read_op( 'ta_responsible_glbnavi_vertical_onoff' );
    //メニューボックス関係
    $ta_responsible_glbnavi_menubox_anchor_color = ta_select_color_w_image_color( 'ta_responsible_glbnavi_menubox_anchor_color' );
    $ta_responsible_glbnavi_menubox_box_color = ta_select_color_w_image_color( 'ta_responsible_glbnavi_menubox_box_color' );
    if ( TA_HIEND_PI ) {
      $ta_responsible_glbnavi_menubox_box_color_grad_onoff = ta_read_op( 'ta_responsible_glbnavi_menubox_box_color_grad_onoff' );
    } else {
      $ta_responsible_glbnavi_menubox_box_color_grad_onoff = "invalid";
    }
    $ta_responsible_glbnavi_menubox_size = ta_read_op( 'ta_responsible_glbnavi_menubox_size' );
    $ta_responsible_glbnavi_menubox_weight = ta_read_op( 'ta_responsible_glbnavi_menubox_weight' );
    $ta_responsible_glbnavi_menubox_w_padding_onoff = ta_read_op( 'ta_responsible_glbnavi_menubox_w_padding_onoff' );
    $ta_responsible_glbnavi_menubox_position = ta_read_op( 'ta_responsible_glbnavi_menubox_position' );
    $ta_responsible_glbnavi_menubox_edge_margin = ta_read_op( 'ta_responsible_glbnavi_menubox_edge_margin' );
    $ta_responsible_glbnavi_menubox_height = ta_read_op( 'ta_responsible_glbnavi_menubox_height' );
    $ta_responsible_glbnavi_menubox_anchor_colorhover = ta_select_color_w_image_color( 'ta_responsible_glbnavi_menubox_anchor_colorhover' );
    $ta_responsible_glbnavi_menubox_box_colorhover = ta_select_color_w_image_color( 'ta_responsible_glbnavi_menubox_box_colorhover' );
    if ( TA_HIEND_PI ) {
      $ta_responsible_glbnavi_menubox_box_colorhover_grad_onoff = ta_read_op( 'ta_responsible_glbnavi_menubox_box_colorhover_grad_onoff' );
    } else {
      $ta_responsible_glbnavi_menubox_box_colorhover_grad_onoff = "invalid";
    }
    //メインメニュー関係
    $ta_responsible_glbnavi_mainmenu_menubar_ratio = ta_read_op( 'ta_responsible_glbnavi_mainmenu_menubar_ratio' );
    $ta_responsible_glbnavi_mainmenu_fontsize = ta_read_op( 'ta_responsible_glbnavi_mainmenu_fontsize' );
    $ta_responsible_glbnavi_mainmenu_fontweight = ta_read_op( 'ta_responsible_glbnavi_mainmenu_fontweight' );
    $ta_responsible_glbnavi_mainmenu_fontcolor = ta_select_color_w_image_color( 'ta_responsible_glbnavi_mainmenu_fontcolor' );
    $ta_responsible_glbnavi_mainmenu_fontcolorhover = ta_select_color_w_image_color( 'ta_responsible_glbnavi_mainmenu_fontcolorhover' );
    $ta_responsible_glbnavi_mainmenu_backcolor = ta_select_color_w_image_color( 'ta_responsible_glbnavi_mainmenu_backcolor' );
    if ( TA_HIEND_PI ) {
      $ta_responsible_glbnavi_mainmenu_backcolor_grad_onoff = ta_read_op( 'ta_responsible_glbnavi_mainmenu_backcolor_grad_onoff' );
    } else {
      $ta_responsible_glbnavi_mainmenu_backcolor_grad_onoff = "invalid";
    }
    $ta_responsible_glbnavi_mainmenu_backcolorhover = ta_select_color_w_image_color( 'ta_responsible_glbnavi_mainmenu_backcolorhover' );
    if ( TA_HIEND_PI ) {
      $ta_responsible_glbnavi_mainmenu_backcolorhover_grad_onoff = ta_read_op( 'ta_responsible_glbnavi_mainmenu_backcolorhover_grad_onoff' );
    } else {
      $ta_responsible_glbnavi_mainmenu_backcolorhover_grad_onoff = "invalid";
    }
    $ta_responsible_glbnavi_mainmenu_height = ta_read_op( 'ta_responsible_glbnavi_mainmenu_height' );
    $ta_responsible_glbnavi_mainmenu_marker_before_text = ta_read_op( 'ta_responsible_glbnavi_mainmenu_marker_before_text' );
    $ta_responsible_glbnavi_mainmenu_marker_before_text = str_replace( '&', '\\', $ta_responsible_glbnavi_mainmenu_marker_before_text );
    $ta_responsible_glbnavi_mainmenu_marker_before_text = str_replace( '#', '', $ta_responsible_glbnavi_mainmenu_marker_before_text );
    $ta_responsible_glbnavi_mainmenu_marker_before_text = str_replace( 'x', '', $ta_responsible_glbnavi_mainmenu_marker_before_text );
    $ta_responsible_glbnavi_mainmenu_marker_before_text = str_replace( ';', '', $ta_responsible_glbnavi_mainmenu_marker_before_text );
    $ta_responsible_glbnavi_mainmenu_position = ta_read_op( 'ta_responsible_glbnavi_mainmenu_position' );
    $ta_responsible_glbnavi_mainmenu_edge_margin = ta_read_op( 'ta_responsible_glbnavi_mainmenu_edge_margin' );
    //サブメニュー関係
    $ta_responsible_glbnavi_submenu_height = ta_read_op( 'ta_responsible_glbnavi_submenu_height' );
    $ta_responsible_glbnavi_submenu_marker_before_text = ta_read_op( 'ta_responsible_glbnavi_submenu_marker_before_text' );
    $ta_responsible_glbnavi_submenu_marker_before_text = str_replace( '&', '\\', $ta_responsible_glbnavi_submenu_marker_before_text );
    $ta_responsible_glbnavi_submenu_marker_before_text = str_replace( '#', '', $ta_responsible_glbnavi_submenu_marker_before_text );
    $ta_responsible_glbnavi_submenu_marker_before_text = str_replace( 'x', '', $ta_responsible_glbnavi_submenu_marker_before_text );
    $ta_responsible_glbnavi_submenu_marker_before_text = str_replace( ';', '', $ta_responsible_glbnavi_submenu_marker_before_text );
    $ta_responsible_glbnavi_submenu_menubar_ratio = ta_read_op( 'ta_responsible_glbnavi_submenu_menubar_ratio' );
    $ta_responsible_glbnavi_submenu_fontsize = ta_read_op( 'ta_responsible_glbnavi_submenu_fontsize' );
    $ta_responsible_glbnavi_submenu_fontweight = ta_read_op( 'ta_responsible_glbnavi_submenu_fontweight' );
    $ta_responsible_glbnavi_submenu_fontcolor = ta_select_color_w_image_color( 'ta_responsible_glbnavi_submenu_fontcolor' );
    $ta_responsible_glbnavi_submenu_fontcolorhover = ta_select_color_w_image_color( 'ta_responsible_glbnavi_submenu_fontcolorhover' );
    $ta_responsible_glbnavi_submenu_backcolor = ta_select_color_w_image_color( 'ta_responsible_glbnavi_submenu_backcolor' );
    if ( TA_HIEND_PI ) {
      $ta_responsible_glbnavi_submenu_backcolor_grad_onoff = ta_read_op( 'ta_responsible_glbnavi_submenu_backcolor_grad_onoff' );
    } else {
      $ta_responsible_glbnavi_submenu_backcolor_grad_onoff = "invalid";
    }
    $ta_responsible_glbnavi_submenu_backcolorhover = ta_select_color_w_image_color( 'ta_responsible_glbnavi_submenu_backcolorhover' );
    if ( TA_HIEND_PI ) {
      $ta_responsible_glbnavi_submenu_backcolorhover_grad_onoff = ta_read_op( 'ta_responsible_glbnavi_submenu_backcolorhover_grad_onoff' );
    } else {
      $ta_responsible_glbnavi_submenu_backcolorhover_grad_onoff = "invalid";
    }
    $ta_responsible_glbnavi_submenu_position = ta_read_op( 'ta_responsible_glbnavi_submenu_position' );
    $ta_responsible_glbnavi_submenu_edge_margin = ta_read_op( 'ta_responsible_glbnavi_submenu_edge_margin' );
    if ( 'valid' == $ta_responsible_glbnavi_vertical_onoff ) { ?>
@media only screen and (max-width : <?php echo $ta_responsible_base_switch_width; ?>px){
  #ta-mb-global-navi-group {
<?php
      if ( "invalid" == $ta_responsible_glbnavi_onoff ) { ?>
    display: none!important;
<?php
      } else { ?>
    display: block!important;
<?php
      } ?>
    margin-top: <?php echo $ta_responsible_glbnavi_top_margin; ?>px!important;
    margin-bottom: <?php echo $ta_responsible_glbnavi_bottom_margin; ?>px!important;
    clear: both!important;
  }

  #ta-mb-global-navi-container {
    background-color: transparent!important;
    border-top: 0!important;
    border-bottom: 0!important;
  }

  /* メニューボックス関係 */
  #ta-mb-global-navi-menubuttom {
    display: block!important;
<?php
      if ( 'valid' == $ta_responsible_glbnavi_menubox_w_padding_onoff ) { ?>
    width: <?php echo $ta_responsible_base_width_w_padding; ?>%!important;
    padding: 0 <?php echo round( ( 100 - $ta_responsible_base_width_w_padding ) / 2 ); ?>%!important;
<?php
      } else { ?>
    width: 100%!important;
<?php
      } ?>
  }

  #ta-mb-global-navi-menubuttom-frame {
    display: block!important;
    width: 100%!important;
    height: auto!important;
    padding: <?php echo $ta_responsible_glbnavi_menubox_height; ?>px 0!important;
<?php
      if ( 'invalid' == $ta_responsible_glbnavi_menubox_box_color_grad_onoff ) { ?>
    background: none!important;
    background-color: <?php echo $ta_responsible_glbnavi_menubox_box_color; ?>!important;
<?php
      } else {
        ta_responsible_gradient_color_style( 'ta_responsible_glbnavi_menubox_box_color' );
      } ?>
    text-align: <?php echo $ta_responsible_glbnavi_menubox_position; ?>!important;
  }

  #ta-mb-global-navi-menubuttom-frame span {
    display: inline-block!important;
    vertical-align: bottom!important;
<?php
      if ( 'left' == $ta_responsible_glbnavi_menubox_position ) { ?>
    margin-left: <?php echo $ta_responsible_glbnavi_menubox_edge_margin; ?>%!important;
<?php
      } else if ( 'right' == $ta_responsible_glbnavi_menubox_position ) { ?>
    margin-right: <?php echo $ta_responsible_glbnavi_menubox_edge_margin; ?>%!important;
<?php
      } else { ?>
    margin 0 auto!important;
<?php
      } ?>
  }

  #ta-mb-global-navi-menubuttom a {
    text-decoration: none;
    color: <?php echo $ta_responsible_glbnavi_menubox_anchor_color; ?>!important;
    font-weight: <?php echo $ta_responsible_glbnavi_menubox_weight; ?>!important;
    font-size: <?php echo $ta_responsible_glbnavi_menubox_size; ?>%!important;
    line-height: 1.3em!important;
  }

  #ta-mb-global-navi-menubuttom a:hover #ta-mb-global-navi-menubuttom-frame {
    color: <?php echo $ta_responsible_glbnavi_menubox_anchor_colorhover; ?>!important;
<?php
      if ( 'invalid' == $ta_responsible_glbnavi_menubox_box_colorhover_grad_onoff ) { ?>
    background: none!important;
    background-color: <?php echo $ta_responsible_glbnavi_menubox_box_colorhover; ?>!important;
<?php
      } else {
        ta_responsible_gradient_color_style( 'ta_responsible_glbnavi_menubox_box_colorhover' );
      } ?>
  }

  /* メインメニュー関係 */
  #ta-mb-global-navi-container {
<?php
      if ( 'valid' == $ta_responsible_glbnavi_menubox_w_padding_onoff ) { ?>
    width: <?php echo $ta_responsible_base_width_w_padding; ?>%!important;
    padding: 0 <?php echo round( ( 100 - $ta_responsible_base_width_w_padding ) / 2 ); ?>%!important;
<?php
      } else { ?>
    width: 100%!important;
<?php
      } ?>
  }
  
  #ta-mb-global-navi-container #ta-global-navi ul,
  #ta-mb-global-navi-container #ta-global-navi ul li,
  #ta-mb-global-navi-container #ta-global-navi ul li a {
    width: <?php echo $ta_responsible_glbnavi_mainmenu_menubar_ratio; ?>%!important;
    padding: 0 <?php echo round( ( 100 - $ta_responsible_glbnavi_mainmenu_menubar_ratio ) / 2 ); ?>%!important;
    height: auto;!important;
    margin: 0!important;
    border: 0!important;
    text-align: <?php echo $ta_responsible_glbnavi_mainmenu_position; ?>!important;
  }

  #ta-mb-global-navi-container #ta-global-navi ul li a {
<?php
      if ( 'left' == $ta_responsible_glbnavi_mainmenu_position ) { ?>
    width: <?php echo ( $ta_responsible_glbnavi_mainmenu_menubar_ratio - $ta_responsible_glbnavi_mainmenu_edge_margin ); ?>%!important;
    padding: <?php echo $ta_responsible_glbnavi_mainmenu_height; ?>px <?php echo round( ( 100 - $ta_responsible_glbnavi_mainmenu_menubar_ratio ) / 2 ); ?>% <?php echo $ta_responsible_glbnavi_mainmenu_height; ?>px <?php echo $ta_responsible_glbnavi_mainmenu_edge_margin + round( ( 100 - $ta_responsible_glbnavi_mainmenu_menubar_ratio ) / 2 ); ?>%!important;
<?php
      } else if ( 'right' == $ta_responsible_glbnavi_mainmenu_position ) { ?>
    width: <?php echo ( $ta_responsible_glbnavi_mainmenu_menubar_ratio - $ta_responsible_glbnavi_mainmenu_edge_margin ); ?>%!important;
    padding: <?php echo $ta_responsible_glbnavi_mainmenu_height; ?>px <?php echo $ta_responsible_glbnavi_mainmenu_edge_margin + round( ( 100 - $ta_responsible_glbnavi_mainmenu_menubar_ratio ) / 2 ); ?>% <?php echo $ta_responsible_glbnavi_mainmenu_height; ?>px <?php echo round( ( 100 - $ta_responsible_glbnavi_mainmenu_menubar_ratio ) / 2 ); ?>%!important;
<?php
      } else { ?>
    width: <?php echo $ta_responsible_glbnavi_mainmenu_menubar_ratio; ?>%!important;
    padding: <?php echo $ta_responsible_glbnavi_mainmenu_height; ?>px <?php echo round( ( 100 - $ta_responsible_glbnavi_mainmenu_menubar_ratio ) / 2 ); ?>%!important;
<?php
      } ?>
    font-size: <?php echo $ta_responsible_glbnavi_mainmenu_fontsize; ?>px!important;
    font-weight: <?php echo $ta_responsible_glbnavi_mainmenu_fontweight; ?>!important;
    color: <?php echo $ta_responsible_glbnavi_mainmenu_fontcolor; ?>!important;
<?php
      if ( 'invalid' == $ta_responsible_glbnavi_mainmenu_backcolor_grad_onoff ) { ?>
    background: none!important;
    background-color: <?php echo $ta_responsible_glbnavi_mainmenu_backcolor; ?>!important;
<?php
      } else {
        ta_responsible_gradient_color_style( 'ta_responsible_glbnavi_mainmenu_backcolor' );
      } ?>
    height: auto;!important;
    border: 0!important;
  }

  #ta-mb-global-navi-container #ta-global-navi ul li a:hover {
    color: <?php echo $ta_responsible_glbnavi_mainmenu_fontcolorhover; ?>!important;
<?php
      if ( 'invalid' == $ta_responsible_glbnavi_mainmenu_backcolorhover_grad_onoff ) { ?>
    background: none!important;
    background-color: <?php echo $ta_responsible_glbnavi_mainmenu_backcolorhover; ?>!important;
<?php
      } else {
        ta_responsible_gradient_color_style( 'ta_responsible_glbnavi_mainmenu_backcolorhover' );
      } ?>
  }

  /* サブメニュー関係 */
  #ta-mb-global-navi-container #ta-global-navi ul ul,
  #ta-mb-global-navi-container #ta-global-navi ul ul li,
  #ta-mb-global-navi-container #ta-global-navi ul ul li a {
    width: 100%!important;
    height: auto!important;
    position: static!important;
    margin: 0!important;
    padding: 0!important;
    background-color: transparent;
    text-align: <?php echo $ta_responsible_glbnavi_submenu_position; ?>!important;
  }

  #ta-mb-global-navi-container #ta-global-navi ul ul li a {
<?php
      if ( 'left' == $ta_responsible_glbnavi_submenu_position ) { ?>
    width: <?php echo ( $ta_responsible_glbnavi_submenu_menubar_ratio - $ta_responsible_glbnavi_submenu_edge_margin ); ?>%!important;
    padding: <?php echo $ta_responsible_glbnavi_submenu_height; ?>px 0 <?php echo $ta_responsible_glbnavi_submenu_height; ?>px <?php echo $ta_responsible_glbnavi_submenu_edge_margin; ?>%!important;
<?php
      } else if ( 'right' == $ta_responsible_glbnavi_submenu_position ) { ?>
    width: <?php echo ( $ta_responsible_glbnavi_submenu_menubar_ratio - $ta_responsible_glbnavi_submenu_edge_margin ); ?>%!important;
    padding: <?php echo $ta_responsible_glbnavi_submenu_height; ?>px <?php echo $ta_responsible_glbnavi_submenu_edge_margin; ?>% <?php echo $ta_responsible_glbnavi_submenu_height; ?>px 0!important;
<?php
      } else { ?>
    width: <?php echo $ta_responsible_glbnavi_submenu_menubar_ratio; ?>%!important;
    padding: <?php echo $ta_responsible_glbnavi_submenu_height; ?>px 0!important;
<?php
      } ?>
    height: auto!important;
    margin: 0 0 0 <?php echo ( 100 - $ta_responsible_glbnavi_submenu_menubar_ratio ); ?>%!important;
    font-size: <?php echo $ta_responsible_glbnavi_submenu_fontsize; ?>px!important;
    font-weight: <?php echo $ta_responsible_glbnavi_submenu_fontweight; ?>!important;
    color: <?php echo $ta_responsible_glbnavi_submenu_fontcolor; ?>!important;
<?php
      if ( 'invalid' == $ta_responsible_glbnavi_submenu_backcolor_grad_onoff ) { ?>
    background: none!important;
    background-color: <?php echo $ta_responsible_glbnavi_submenu_backcolor; ?>!important;
<?php
      } else {
        ta_responsible_gradient_color_style( 'ta_responsible_glbnavi_submenu_backcolor' );
      } ?>
  }

  #ta-mb-global-navi-container #ta-global-navi ul ul li a:hover {
    color: <?php echo $ta_responsible_glbnavi_submenu_fontcolorhover; ?>!important;
<?php
      if ( 'invalid' == $ta_responsible_glbnavi_submenu_backcolorhover_grad_onoff ) { ?>
    background: none!important;
    background-color: <?php echo $ta_responsible_glbnavi_submenu_backcolorhover; ?>!important;
<?php
      } else {
        ta_responsible_gradient_color_style( 'ta_responsible_glbnavi_submenu_backcolorhover' );
      } ?>
  }

  #ta-mb-global-navi-container #ta-global-navi ul ul ul li a {
<?php
      if ( 'left' == $ta_responsible_glbnavi_submenu_position ) { ?>
    width: <?php echo ( ( $ta_responsible_glbnavi_submenu_menubar_ratio * $ta_responsible_glbnavi_submenu_menubar_ratio / 100 ) - $ta_responsible_glbnavi_submenu_edge_margin ); ?>%!important;
<?php
      } else if ( 'right' == $ta_responsible_glbnavi_submenu_position ) { ?>
    width: <?php echo ( ( $ta_responsible_glbnavi_submenu_menubar_ratio * $ta_responsible_glbnavi_submenu_menubar_ratio / 100 ) - $ta_responsible_glbnavi_submenu_edge_margin ); ?>%!important;
<?php
      } else { ?>
    width: <?php echo ( $ta_responsible_glbnavi_submenu_menubar_ratio * $ta_responsible_glbnavi_submenu_menubar_ratio / 100 ); ?>%!important;
<?php
      } ?>
    margin: 0 0 0 <?php echo ( 100 - ( $ta_responsible_glbnavi_submenu_menubar_ratio * $ta_responsible_glbnavi_submenu_menubar_ratio / 100 ) ); ?>%!important;
  }

  #ta-global-navi-container,
  #ta-mb-global-navi-container {
    display: none;
  }

  #ta-mb-global-navi-container #ta-global-navi {
    margin-top: 0!important;
  }

<?php
      if ( 'no_disp' != $ta_responsible_glbnavi_mainmenu_marker_before_text ) { ?>
  #ta-mb-global-navi-container #ta-global-navi ul li a::before {
    content: '<?php echo $ta_responsible_glbnavi_mainmenu_marker_before_text; ?>'!important;
  }
  
<?php
      } ?>

<?php
      if ( 'no_disp' != $ta_responsible_glbnavi_submenu_marker_before_text ) { ?>
  #ta-mb-global-navi-container #ta-global-navi ul ul li a::before {
    content: '<?php echo $ta_responsible_glbnavi_submenu_marker_before_text; ?>'!important;
  }
  
<?php
      } ?>
}

<?php
    } else { ?>
@media only screen and (max-width : <?php echo $ta_responsible_base_switch_width; ?>px){
  #ta-global-navi {
<?php
      if ( 'valid' == $ta_responsible_glbnavi_w_padding_onoff ) { ?>
    width: <?php echo $ta_responsible_base_width_w_padding; ?>%!important;
    padding: 0 <?php echo round( ( 100 - $ta_responsible_base_width_w_padding ) / 2 ); ?>%!important;
<?php
      } ?>
    margin-top: <?php echo $ta_responsible_glbnavi_top_margin; ?>px!important;
    margin-bottom: <?php echo $ta_responsible_glbnavi_bottom_margin; ?>px!important;
  }
  
  #ta-global-navi > ul > li > a {
  font-size: <?php echo ( $ta_responsible_glbnavi_text_size_ratio / 100 ) * $ta_header_glabalmenu_fontsize; ?>px!important;
<?php
      if ( 'square' == $ta_header_glabalmenu_frame_select ) { ?>
    height: <?php echo ( $ta_responsible_glbnavi_height_size_ratio / 100 ) * $ta_header_glabalmenu_wholeheight - 2 * $ta_header_glabalmenu_frame_size; ?>px!important;
<?php
      } else if ( 'under' == $ta_header_glabalmenu_frame_select || 'over' == $ta_header_glabalmenu_frame_select ) { ?>
    height: <?php echo ( $ta_responsible_glbnavi_height_size_ratio / 100 ) * $ta_header_glabalmenu_wholeheight - $ta_header_glabalmenu_frame_size; ?>px!important;
<?php
      } else { ?>
    height: <?php echo ( $ta_responsible_glbnavi_height_size_ratio / 100 ) * $ta_header_glabalmenu_wholeheight; ?>px!important;
<?php
      } ?>
    line-height: <?php echo ( $ta_responsible_glbnavi_height_size_ratio / 100 ) * $ta_header_glabalmenu_wholeheight; ?>px!important;
  }
  
  #ta-global-navi li li > a {
    height: <?php echo ( $ta_responsible_glbnavi_height_size_ratio / 100 ) * $ta_header_glabalmenu_wholeheight * ( $ta_header_glabalsubmenu_height_ratio / 100 ); ?>px!important;
    line-height: <?php echo ( $ta_responsible_glbnavi_height_size_ratio / 100 ) * $ta_header_glabalmenu_wholeheight * ( $ta_header_glabalsubmenu_height_ratio / 100 ); ?>px!important;
  }

  #ta-global-navi li > ul {
    font-size: <?php echo ( $ta_responsible_glbnavi_text_size_ratio / 100 ) * $ta_header_glabalsubmenu_fontsize; ?>px!important;
  }

}

<?php
    }
    /******** ヘッダー画像のレスポンシブデザイン設定 ********/
    $ta_responsible_headerimg_onoff = ta_read_op( 'ta_responsible_headerimg_onoff' );
    $ta_responsible_headerimg_w_padding_onoff = ta_read_op( 'ta_responsible_headerimg_w_padding_onoff' );
    $ta_responsible_headerimg_top_margin = ta_read_op( 'ta_responsible_headerimg_top_margin' );
    $ta_responsible_headerimg_bottom_margin = ta_read_op( 'ta_responsible_headerimg_bottom_margin' );
    $ta_responsible_headerimg_text_onoff = ta_read_op( 'ta_responsible_headerimg_text_onoff' );
    $ta_responsible_headerimg_fontsize = ta_read_op( 'ta_responsible_headerimg_fontsize' );
    $ta_responsible_headerimg_fontweight = ta_read_op( 'ta_responsible_headerimg_fontweight' );
    $ta_responsible_headerimg_position_x = ta_read_op( 'ta_responsible_headerimg_position_x' );
    $ta_responsible_headerimg_position_y = ta_read_op( 'ta_responsible_headerimg_position_y' ); ?>
@media only screen and (max-width : <?php echo $ta_responsible_base_switch_width; ?>px){
  #header_image,
  #header_freearea {
<?php
    if ( "invalid" == $ta_responsible_headerimg_onoff ) { ?>
    display: none!important;
<?php
    }
    if ( 'valid' == $ta_responsible_headerimg_w_padding_onoff ) { ?>
    width: <?php echo $ta_responsible_base_width_w_padding; ?>%!important;
    padding: 0 <?php echo round( ( 100 - $ta_responsible_base_width_w_padding ) / 2 ); ?>%!important;
<?php
    } ?>
    margin-top: <?php echo $ta_responsible_headerimg_top_margin; ?>px!important;
    margin-bottom: <?php echo $ta_responsible_headerimg_bottom_margin; ?>px!important;
  }

<?php
    if ( 'valid' == $ta_responsible_headerimg_text_onoff ) { ?>
  #header_image_text {
    font-size: <?php echo $ta_responsible_headerimg_fontsize; ?>px!important;
    font-weight: <?php echo $ta_responsible_headerimg_fontweight; ?>!important;
    left: <?php echo $ta_responsible_headerimg_position_x; ?>px!important;
    top: <?php echo $ta_responsible_headerimg_position_y; ?>px!important;
  }
  
<?php
    } else { ?>
  #header_image_text {
    display: none!important;
  }
<?php
    } ?>
}

<?php
    /******** トップページのレスポンシブデザイン設定 ********/
    $ta_responsible_top_topcatch_tate_onoff = ta_read_op( 'ta_responsible_top_topcatch_tate_onoff' );
    $ta_responsible_top_topcatch_img_width = ta_read_op( 'ta_responsible_top_topcatch_img_width' );
    if ( TA_HIEND_PI ) {
      $ta_responsible_imgexp_menu_a_tate_onoff = ta_read_op( 'ta_responsible_imgexp_menu_a_tate_onoff' );
      $ta_responsible_imgexp_menu_a_img_width = ta_read_op( 'ta_responsible_imgexp_menu_a_img_width' );
      $ta_responsible_imgexp_menu_b_tate_onoff = ta_read_op( 'ta_responsible_imgexp_menu_b_tate_onoff' );
      $ta_responsible_imgexp_menu_b_img_width = ta_read_op( 'ta_responsible_imgexp_menu_b_img_width' );
    } else {
      $ta_responsible_imgexp_menu_a_tate_onoff = 'valid';
      $ta_responsible_imgexp_menu_a_img_width = 60;
      $ta_responsible_imgexp_menu_b_tate_onoff = 'valid';
      $ta_responsible_imgexp_menu_b_img_width = 60;
    }
    $ta_responsible_top_fixed_space = ta_read_op( 'ta_responsible_top_fixed_space' ); ?>
@media only screen and (max-width : <?php echo $ta_responsible_base_switch_width; ?>px){
  body.home #main #content .fixed-space {
    margin-top: <?php echo $ta_responsible_top_fixed_space; ?>px!important;
  }
  
<?php
    if ( 'valid' == $ta_responsible_top_topcatch_tate_onoff ) { ?>
  #ta-topcatch1,
  #ta-topcatch2,
  #ta-topcatch3,
  #ta-topcatch4,
  #ta-topcatch5,
  #ta-topcatch6 {
    width: 100%!important;
    margin-left: 0!important;
  }

<?php
      if ( 0 == $ta_responsible_top_topcatch_img_width ) { ?>
  #ta-topcatch-area-container {
    display: none!important;
  }
  
<?php
      } else { ?>
  .ta-topcatch-img-container {
    width: <?php echo $ta_responsible_top_topcatch_img_width; ?>%!important;
    margin-right: auto!important;
    margin-left: auto!important;
  }
  
<?php
      } ?>
  #ta-topcatch2,
  #ta-topcatch3,
  #ta-topcatch4,
  #ta-topcatch5,
  #ta-topcatch6 {
    margin-top: <?php echo $ta_responsible_top_fixed_space; ?>px!important;
  }
  
<?php
    }
    if ( 'valid' == $ta_responsible_imgexp_menu_a_tate_onoff ) {
      if ( 0 == $ta_responsible_imgexp_menu_a_img_width ) { ?>
  #ta-imgexp-menu-container-a .ta-imgexp-menu-block {
    display: none!important;
  }
  
<?php } else { ?>
  #ta-imgexp-menu-container-a .ta-imgexp-menu-block {
    width: <?php echo $ta_responsible_imgexp_menu_a_img_width; ?>%!important;
    margin-left: <?php echo ( 100 - $ta_responsible_imgexp_menu_a_img_width ) / 2; ?>%!important;
    margin-top: <?php echo $ta_responsible_top_fixed_space; ?>px!important;
  }
  
  #ta-imgexp-menu-container-a .ta-imgexp-menu-block:first-child {
    margin-top: 0!important;
  }
  
<?php
      }
    }
    if ( 'valid' == $ta_responsible_imgexp_menu_b_tate_onoff ) {
      if ( 0 == $ta_responsible_imgexp_menu_b_img_width ) { ?>
  #ta-imgexp-menu-container-b .ta-imgexp-menu-block {
    display: none!important;
  }
  
<?php } else { ?>
  #ta-imgexp-menu-container-b .ta-imgexp-menu-block {
    width: <?php echo $ta_responsible_imgexp_menu_b_img_width; ?>%!important;
    margin-left: <?php echo ( 100 - $ta_responsible_imgexp_menu_b_img_width ) / 2; ?>%!important;
    margin-top: <?php echo $ta_responsible_top_fixed_space; ?>px!important;
  }
  
  #ta-imgexp-menu-container-b .ta-imgexp-menu-block:first-child {
    margin-top: 0!important;
  }
  
<?php
      }
    } ?>
}

<?php
    /******** メインコンテンツのレスポンシブデザイン設定 ********/
    $ta_responsible_main_top_margin = ta_read_op( 'ta_responsible_main_top_margin' );
    $ta_responsible_main_bottom_margin = ta_read_op( 'ta_responsible_main_bottom_margin' );
    $ta_responsible_main_tb_padding = ta_read_op( 'ta_responsible_main_tb_padding' );
    $ta_responsible_main_top_latestposts_onoff = ta_read_op( 'ta_responsible_main_top_latestposts_onoff' );
    $ta_responsible_main_top_postdigest_onoff = ta_read_op( 'ta_responsible_main_top_postdigest_onoff' );
    $ta_responsible_main_top_widgetarea_onoff = ta_read_op( 'ta_responsible_main_top_widgetarea_onoff' );
    $ta_responsible_main_top_widgetarea_centering = ta_read_op( 'ta_responsible_main_top_widgetarea_centering' );
    $ta_responsible_main_font_size = ta_read_op( 'ta_responsible_main_font_size' );
    $ta_responsible_main_bread_size2common = ta_read_op( 'ta_responsible_main_bread_size2common' );
    $ta_responsible_main_fixed_space = ta_read_op( 'ta_responsible_main_fixed_space' );
    //***** レスポンシブデザイン時のメインコンテンツの背景色・背景画像
    $ta_responsible_main_frame_color = ta_select_color_w_image_color( 'ta_responsible_main_frame_color' );
    if ( TA_HIEND_PI ) {
      $ta_responsible_main_frame_grad_onoff = ta_read_op( 'ta_responsible_main_frame_color_grad_onoff' );
      $ta_responsible_main_frame_pic = ta_read_op( 'ta_responsible_main_frame_pic' );
      $ta_responsible_main_frame_pic_rule = ta_read_op( 'ta_responsible_main_frame_pic_rule' );
      $ta_responsible_main_frame_pic_margin = ta_read_op( 'ta_responsible_main_frame_pic_margin' );
    } else {
      $ta_responsible_main_frame_grad_onoff = "invalid";
      $ta_responsible_main_frame_pic = "no_image";
      $ta_responsible_main_frame_pic_rule = "top_x";
      $ta_responsible_main_frame_pic_margin = '0';
    }
    switch ( $ta_responsible_main_frame_pic_rule ) {
      case 'top_x':
        $main_frame_repeat = 'repeat-x';
        $main_frame_position = 'left top ' . $ta_responsible_main_frame_pic_margin . 'px';
        break;
      case 'bottom_x':
        $main_frame_repeat = 'repeat-x';
        $main_frame_position = 'left bottom ' . $ta_responsible_main_frame_pic_margin . 'px';
        break;
      case 'top_only':
        $main_frame_repeat = 'no-repeat';
        $main_frame_position = 'center top ' . $ta_responsible_main_frame_pic_margin . 'px';
        break;
      case 'bottom_only':
        $main_frame_repeat = 'no-repeat';
        $main_frame_position = 'center bottom ' . $ta_responsible_main_frame_pic_margin . 'px';
        break;
      case 'x_y':
        $main_frame_repeat = 'repeat';
        $main_frame_position = 'left top';
        break;
    } ?>
@media only screen and (max-width : <?php echo $ta_responsible_base_switch_width; ?>px){
  #main {
    background: none!important;
    margin-top: <?php echo $ta_responsible_main_top_margin; ?>px!important;
    margin-bottom: <?php echo $ta_responsible_main_bottom_margin; ?>px!important;
    font-size: <?php echo $ta_responsible_main_font_size; ?>%!important;
<?php
      if ( 'invalid' == $ta_responsible_main_frame_grad_onoff ) { ?>
    background-color: <?php echo $ta_responsible_main_frame_color; ?>!important;
<?php
        if ( 'no_image' != $ta_responsible_main_frame_pic ) { ?>
    background-image: url("<?php echo $ta_responsible_main_frame_pic; ?>")!important;
<?php
        }
      } else {
        ta_responsible_gradient_color_style( 'ta_responsible_main_frame_color', $ta_responsible_main_frame_pic );
      }
    if ( 'no_image' != $ta_responsible_main_frame_pic ) { ?>
    background-repeat: <?php echo $main_frame_repeat; ?>!important;
    background-position: <?php echo $main_frame_position; ?>!important;
<?php
    } ?>
  }
  
  <?php ta_responsive_paragraph_style( 'ta_responsible_main_font', 'ta_main_font', '#main' ); ?>
  
  #content {
    width: <?php echo $ta_responsible_base_width_w_padding; ?>%!important;
    padding: <?php echo $ta_responsible_main_tb_padding; ?>px <?php echo round( ( 100 - $ta_responsible_base_width_w_padding ) / 2 ); ?>%!important;
  }
  
  #main #content .fixed-space {
    margin-top: <?php echo $ta_responsible_main_fixed_space; ?>px!important;
  }
  
<?php
    if ( 'invalid' == $ta_responsible_main_top_latestposts_onoff ) { ?>
  #main-whatsnew {
    display: none!important;
  }
  
<?php
    }
    if ( 'invalid' == $ta_responsible_main_top_postdigest_onoff ) { ?>
  #main-catdigest {
    display: none!important;
  }
  
<?php
    }
    if ( 'invalid' == $ta_responsible_main_top_widgetarea_onoff ) { ?>
  #content .ta-widget-container {
    display: none!important;
  }
  
<?php
    }
    if ( 'valid' == $ta_responsible_main_top_widgetarea_centering ) { ?>
  #content .ta-widget-container *:not(.title) {
    text-align: center!important;
  }
  
  #content .ta-widget-container table {
    display: inline!important;
    margin-left: auto!important;
    margin-right: auto!important;
  }
  
<?php
    } ?>
}

@media only screen and (max-width : <?php echo $ta_responsible_base_switch_width; ?>px){
  #ta_bread_crumb {
    font-size: <?php echo floor($ta_responsible_main_font_size * $ta_responsible_main_bread_size2common / 100); ?>%!important;
  }
}

<?php
    /******** サイドバーのレスポンシブデザイン設定 ********/
    $ta_responsible_sidebar_top_margin = ta_read_op( 'ta_responsible_sidebar_top_margin' );
    $ta_responsible_sidebar_bottom_margin = ta_read_op( 'ta_responsible_sidebar_bottom_margin' );
    $ta_responsible_sidebar_tb_padding = ta_read_op( 'ta_responsible_sidebar_tb_padding' );
    $ta_responsible_sidebar_latestposts_onoff = ta_read_op( 'ta_responsible_sidebar_latestposts_onoff' );
    $ta_responsible_sidebar_postdigest_onoff = ta_read_op( 'ta_responsible_sidebar_postdigest_onoff' );
    $ta_responsible_sidebar_widgetarea_onoff = ta_read_op( 'ta_responsible_sidebar_widgetarea_onoff' );
    $ta_responsible_sidebar_widgetarea_centering = ta_read_op( 'ta_responsible_sidebar_widgetarea_centering' );
    $ta_responsible_sidebar_top_border_onoff = ta_read_op( 'ta_responsible_sidebar_top_border_onoff' );
    $ta_responsible_sidebar_top_border_size = ta_read_op( 'ta_responsible_sidebar_top_border_size' );
    $ta_responsible_sidebar_top_border_kind = ta_read_op( 'ta_responsible_sidebar_top_border_kind' );
    $ta_responsible_sidebar_top_border_color = ta_select_color_w_image_color( 'ta_responsible_sidebar_top_border_color' );
    $ta_responsible_sidebar_font_size = ta_read_op( 'ta_responsible_sidebar_font_size' );

    $ta_responsible_sidebar_fixed_space = ta_read_op( 'ta_responsible_sidebar_fixed_space' );
    //***** レスポンシブデザイン時のメインコンテンツの背景色・背景画像
    $ta_responsible_sidebar_frame_color = ta_select_color_w_image_color( 'ta_responsible_sidebar_frame_color' );
    if ( TA_HIEND_PI ) {
      $ta_responsible_sidebar_frame_grad_onoff = ta_read_op( 'ta_responsible_sidebar_frame_color_grad_onoff' );
      $ta_responsible_sidebar_frame_pic = ta_read_op( 'ta_responsible_sidebar_frame_pic' );
      $ta_responsible_sidebar_frame_pic_rule = ta_read_op( 'ta_responsible_sidebar_frame_pic_rule' );
      $ta_responsible_sidebar_frame_pic_margin = ta_read_op( 'ta_responsible_sidebar_frame_pic_margin' );
    } else {
      $ta_responsible_sidebar_frame_grad_onoff = "invalid";
      $ta_responsible_sidebar_frame_pic = "no_image";
      $ta_responsible_sidebar_frame_pic_rule = "top_x";
      $ta_responsible_sidebar_frame_pic_margin = '0';
    }
    switch ( $ta_responsible_sidebar_frame_pic_rule ) {
      case 'top_x':
        $sidebar_frame_repeat = 'repeat-x';
        $sidebar_frame_position = 'left top ' . $ta_responsible_sidebar_frame_pic_margin . 'px';
        break;
      case 'bottom_x':
        $sidebar_frame_repeat = 'repeat-x';
        $sidebar_frame_position = 'left bottom ' . $ta_responsible_sidebar_frame_pic_margin . 'px';
        break;
      case 'top_only':
        $sidebar_frame_repeat = 'no-repeat';
        $sidebar_frame_position = 'center top ' . $ta_responsible_sidebar_frame_pic_margin . 'px';
        break;
      case 'bottom_only':
        $sidebar_frame_repeat = 'no-repeat';
        $sidebar_frame_position = 'center bottom ' . $ta_responsible_sidebar_frame_pic_margin . 'px';
        break;
      case 'x_y':
        $sidebar_frame_repeat = 'repeat';
        $sidebar_frame_position = 'left top';
        break;
    } ?>
@media only screen and (max-width : <?php echo $ta_responsible_base_switch_width; ?>px){
  #sidebar {
    background: none!important;
    padding-bottom: 0;
    margin-bottom: 0;
    min-height: 0!important;
<?php
    if ( 'invalid' == $ta_responsible_sidebar_frame_grad_onoff ) { ?>
    background-color: <?php echo $ta_responsible_sidebar_frame_color; ?>!important;
<?php
      if ( 'no_image' != $ta_responsible_sidebar_frame_pic ) { ?>
    background-image: url("<?php echo $ta_responsible_sidebar_frame_pic; ?>")!important;
<?php
      }
    } else {
      ta_responsible_gradient_color_style( 'ta_responsible_sidebar_frame_color', $ta_responsible_sidebar_frame_pic );
    }
    if ( 'no_image' != $ta_responsible_sidebar_frame_pic ) { ?>
    background-repeat: <?php echo $sidebar_frame_repeat; ?>!important;
    background-position: <?php echo $sidebar_frame_position; ?>!important;
<?php
    } ?>
  }

  #sidebar-container {
    font-size: <?php echo $ta_responsible_sidebar_font_size; ?>%!important;
    padding-top: <?php echo $ta_responsible_sidebar_top_margin; ?>px!important;
    padding-bottom: <?php echo $ta_responsible_sidebar_bottom_margin; ?>px!important;
<?php
    if ( 'valid' == $ta_responsible_sidebar_top_border_onoff ) {
      if ( 'valid' == $ta_responsible_additional_onoff ) { ?>
    border-bottom: <?php echo $ta_responsible_sidebar_top_border_size; ?>px <?php echo $ta_responsible_sidebar_top_border_kind; ?> <?php echo $ta_responsible_sidebar_top_border_color; ?>!important;
<?php
      } else { ?>
    border-top: <?php echo $ta_responsible_sidebar_top_border_size; ?>px <?php echo $ta_responsible_sidebar_top_border_kind; ?> <?php echo $ta_responsible_sidebar_top_border_color; ?>!important;
<?php
      }
    } ?>
  }
  
  <?php ta_responsive_paragraph_style( 'ta_responsible_sidebar_font', 'ta_sidebar_font', '#sidebar-container' ); ?>
  
  #sidebar {
    width: <?php echo $ta_responsible_base_width_w_padding; ?>%!important;
    padding: <?php echo $ta_responsible_sidebar_tb_padding; ?>px <?php echo round( ( 100 - $ta_responsible_base_width_w_padding ) / 2 ); ?>%!important;
  }
  
  #container #sidebar .fixed-space,
  #additional-container #sidebar .fixed-space,
  #outer-sidebar-container #sidebar .fixed-space {
    margin-top: <?php echo $ta_responsible_sidebar_fixed_space; ?>px!important;
  }
  
<?php
    if ( 'invalid' == $ta_responsible_sidebar_latestposts_onoff ) { ?>
  #sidebar #sidebar-whatsnew {
    display: none!important;
  }
  
<?php
    }
    if ( 'invalid' == $ta_responsible_sidebar_postdigest_onoff ) { ?>
  #sidebar-catdigest {
    display: none!important;
  }
  
<?php
    }
    if ( 'invalid' == $ta_responsible_sidebar_widgetarea_onoff ) { ?>
  #sidebar .ta-widget-container {
    display: none!important;
  }
  
<?php
    }
    if ( 'valid' == $ta_responsible_sidebar_widgetarea_centering ) { ?>
  #sidebar .ta-widget-container *:not(.sidebar_title) {
    text-align: center!important;
  }
  
  #sidebar .ta-widget-container table {
    display: inline!important;
    margin-left: auto!important;
    margin-right: auto!important;
  }
  
<?php
    } ?>
}

<?php
    /******** サブサイドバーのレスポンシブデザイン設定 ********/
    $ta_responsible_sidebarsub_top_margin = ta_read_op( 'ta_responsible_sidebarsub_top_margin' );
    $ta_responsible_sidebarsub_bottom_margin = ta_read_op( 'ta_responsible_sidebarsub_bottom_margin' );
    $ta_responsible_sidebarsub_tb_padding = ta_read_op( 'ta_responsible_sidebarsub_tb_padding' );
    $ta_responsible_sidebarsub_latestposts_onoff = ta_read_op( 'ta_responsible_sidebarsub_latestposts_onoff' );
    $ta_responsible_sidebarsub_postdigest_onoff = ta_read_op( 'ta_responsible_sidebarsub_postdigest_onoff' );
    $ta_responsible_sidebarsub_widgetarea_onoff = ta_read_op( 'ta_responsible_sidebarsub_widgetarea_onoff' );
    $ta_responsible_sidebarsub_widgetarea_centering = ta_read_op( 'ta_responsible_sidebarsub_widgetarea_centering' );
    $ta_responsible_sidebarsub_top_border_onoff = ta_read_op( 'ta_responsible_sidebarsub_top_border_onoff' );
    $ta_responsible_sidebarsub_top_border_size = ta_read_op( 'ta_responsible_sidebarsub_top_border_size' );
    $ta_responsible_sidebarsub_top_border_kind = ta_read_op( 'ta_responsible_sidebarsub_top_border_kind' );
    $ta_responsible_sidebarsub_top_border_color = ta_select_color_w_image_color( 'ta_responsible_sidebarsub_top_border_color' );
    $ta_responsible_sidebarsub_font_size = ta_read_op( 'ta_responsible_sidebarsub_font_size' );
    $ta_responsible_sidebarsub_fixed_space = ta_read_op( 'ta_responsible_sidebarsub_fixed_space' );
    //***** レスポンシブデザイン時のサブメインコンテンツの背景色・背景画像
    $ta_responsible_sidebarsub_frame_color = ta_select_color_w_image_color( 'ta_responsible_sidebarsub_frame_color' );
    if ( TA_HIEND_PI ) {
      $ta_responsible_sidebarsub_frame_grad_onoff = ta_read_op( 'ta_responsible_sidebarsub_frame_color_grad_onoff' );
      $ta_responsible_sidebarsub_frame_pic = ta_read_op( 'ta_responsible_sidebarsub_frame_pic' );
      $ta_responsible_sidebarsub_frame_pic_rule = ta_read_op( 'ta_responsible_sidebarsub_frame_pic_rule' );
      $ta_responsible_sidebarsub_frame_pic_margin = ta_read_op( 'ta_responsible_sidebarsub_frame_pic_margin' );
    } else {
      $ta_responsible_sidebarsub_frame_grad_onoff = "invalid";
      $ta_responsible_sidebarsub_frame_pic = "no_image";
      $ta_responsible_sidebarsub_frame_pic_rule = "top_x";
      $ta_responsible_sidebarsub_frame_pic_margin = '0';
    }
    switch ( $ta_responsible_sidebarsub_frame_pic_rule ) {
      case 'top_x':
        $sidebarsub_frame_repeat = 'repeat-x';
        $sidebarsub_frame_position = 'left top ' . $ta_responsible_sidebarsub_frame_pic_margin . 'px';
        break;
      case 'bottom_x':
        $sidebarsub_frame_repeat = 'repeat-x';
        $sidebarsub_frame_position = 'left bottom ' . $ta_responsible_sidebarsub_frame_pic_margin . 'px';
        break;
      case 'top_only':
        $sidebarsub_frame_repeat = 'no-repeat';
        $sidebarsub_frame_position = 'center top ' . $ta_responsible_sidebarsub_frame_pic_margin . 'px';
        break;
      case 'bottom_only':
        $sidebarsub_frame_repeat = 'no-repeat';
        $sidebarsub_frame_position = 'center bottom ' . $ta_responsible_sidebarsub_frame_pic_margin . 'px';
        break;
      case 'x_y':
        $sidebarsub_frame_repeat = 'repeat';
        $sidebarsub_frame_position = 'left top';
        break;
    } ?>
@media only screen and (max-width : <?php echo $ta_responsible_base_switch_width; ?>px){
  #sidebarsub {
    background: none!important;
    padding-bottom: 0;
    margin-bottom: 0;
    min-height: 0!important;
<?php
    if ( 'invalid' == $ta_responsible_sidebarsub_frame_grad_onoff ) { ?>
    background-color: <?php echo $ta_responsible_sidebarsub_frame_color; ?>!important;
<?php
      if ( 'no_image' != $ta_responsible_sidebarsub_frame_pic ) { ?>
    background-image: url("<?php echo $ta_responsible_sidebarsub_frame_pic; ?>")!important;
<?php
      }
    } else {
      ta_responsible_gradient_color_style( 'ta_responsible_sidebarsub_frame_color', $ta_responsible_sidebarsub_frame_pic );
    }
    if ( 'no_image' != $ta_responsible_sidebarsub_frame_pic ) { ?>
    background-repeat: <?php echo $sidebarsub_frame_repeat; ?>!important;
    background-position: <?php echo $sidebarsub_frame_position; ?>!important;
<?php
    } ?>
  }

  #sidebarsub-container {
    font-size: <?php echo $ta_responsible_sidebarsub_font_size; ?>%!important;
    padding-top: <?php echo $ta_responsible_sidebarsub_top_margin; ?>px!important;
    padding-bottom: <?php echo $ta_responsible_sidebarsub_bottom_margin; ?>px!important;
<?php
    if ( 'valid' == $ta_responsible_sidebarsub_top_border_onoff ) {
      if ( 'valid' == $ta_responsible_additional_onoff ) { ?>
    border-bottom: <?php echo $ta_responsible_sidebarsub_top_border_size; ?>px <?php echo $ta_responsible_sidebarsub_top_border_kind; ?> <?php echo $ta_responsible_sidebarsub_top_border_color; ?>!important;
<?php
      } else { ?>
    border-top: <?php echo $ta_responsible_sidebarsub_top_border_size; ?>px <?php echo $ta_responsible_sidebarsub_top_border_kind; ?> <?php echo $ta_responsible_sidebarsub_top_border_color; ?>!important;
<?php
      }
    } ?>
  }
  
  <?php ta_responsive_paragraph_style( 'ta_responsible_sidebarsub_font', 'ta_sidebarsub_font', '#sidebarsub-container' ); ?>
  
  #sidebarsub {
    width: <?php echo $ta_responsible_base_width_w_padding; ?>%!important;
    padding: <?php echo $ta_responsible_sidebarsub_tb_padding; ?>px <?php echo round( ( 100 - $ta_responsible_base_width_w_padding ) / 2 ); ?>%!important;
  }
  
  #container #sidebarsub .fixed-space,
  #additional-container #sidebarsub .fixed-space,
  #outer-sidebarsub-container #sidebarsub .fixed-space {
    margin-top: <?php echo $ta_responsible_sidebarsub_fixed_space; ?>px!important;
  }
  
<?php
    if ( 'invalid' == $ta_responsible_sidebarsub_latestposts_onoff ) { ?>
  #sidebarsub #sidebarsub-whatsnew {
    display: none!important;
  }
  
<?php
    }
    if ( 'invalid' == $ta_responsible_sidebarsub_postdigest_onoff ) { ?>
  #sidebarsub-catdigest {
    display: none!important;
  }
  
<?php
    }
    if ( 'invalid' == $ta_responsible_sidebarsub_widgetarea_onoff ) { ?>
  #sidebarsub .ta-widget-container {
    display: none!important;
  }
  
<?php
    }
    if ( 'valid' == $ta_responsible_sidebarsub_widgetarea_centering ) { ?>
  #sidebarsub .ta-widget-container *:not(.sidebarsub_title) {
    text-align: center!important;
  }
  
  #sidebarsub .ta-widget-container table {
    display: inline!important;
    margin-left: auto!important;
    margin-right: auto!important;
  }
  
<?php
    } ?>
}

<?php
    /******** フッターのレスポンシブデザイン設定 ********/
    $ta_responsible_footer_top_padding = ta_read_op( 'ta_responsible_footer_top_padding' );
    $ta_responsible_footer_group1block_onoff = ta_read_op( 'ta_responsible_footer_group1block_onoff' );
    $ta_responsible_footer_group1block_margintop = ta_read_op( 'ta_responsible_footer_group1block_margintop' );
    $ta_responsible_footer_group2block_onoff = ta_read_op( 'ta_responsible_footer_group2block_onoff' );
    $ta_responsible_footer_group2block_margintop = ta_read_op( 'ta_responsible_footer_group2block_margintop' );
    $ta_responsible_footer_footerimg_onoff = ta_read_op( 'ta_responsible_footer_footerimg_onoff' );
    $ta_responsible_footer_footerimg_width = ta_read_op( 'ta_responsible_footer_footerimg_width' );
    $ta_responsible_footer_footerimg_fontweight = ta_read_op( 'ta_responsible_footer_footerimg_fontweight' );
    $ta_responsible_footer_footerimg_text_color = ta_select_color_w_image_color( 'ta_responsible_footer_footerimg_text_color' );
    $ta_responsible_footer_footerimg_text_under = ta_read_op( 'ta_responsible_footer_footerimg_text_under' );
    $ta_responsible_footer_footerimg_text_colorhover = ta_select_color_w_image_color( 'ta_responsible_footer_footerimg_text_colorhover' );
    $ta_responsible_footer_footerimg_text_underhover = ta_read_op( 'ta_responsible_footer_footerimg_text_underhover' );
    $ta_responsible_footer_freetext_onoff = ta_read_op( 'ta_responsible_footer_freetext_onoff' );
    $ta_responsible_footer_freetext_width = ta_read_op( 'ta_responsible_footer_freetext_width' );
    $ta_responsible_footer_footerimgsub_onoff = ta_read_op( 'ta_responsible_footer_footerimgsub_onoff' );
    $ta_responsible_footer_footerimgsub_width = ta_read_op( 'ta_responsible_footer_footerimgsub_width' );
    $ta_responsible_footer_footermenu_onoff = ta_read_op( 'ta_responsible_footer_footermenu_onoff' );
    $ta_responsible_footer_footermenu_width = ta_read_op( 'ta_responsible_footer_footermenu_width' );
    $ta_responsible_footer_widgetarea_onoff = ta_read_op( 'ta_responsible_footer_widgetarea_onoff' );
    $ta_responsible_footer_widgetarea_centering = ta_read_op( 'ta_responsible_footer_widgetarea_centering' );
    $ta_responsible_footer_copyrightcontainer_paddingtop = ta_read_op( 'ta_responsible_footer_copyrightcontainer_paddingtop' );
    $ta_responsible_footer_copyrightcontainer_paddingbottom = ta_read_op( 'ta_responsible_footer_copyrightcontainer_paddingbottom' );
    $ta_responsible_footer_copyright_padding = ta_read_op( 'ta_responsible_footer_copyright_padding' );
    $ta_responsible_footer_font_size = ta_read_op( 'ta_responsible_footer_font_size' );
    //***** フッター(#footer-container)背景色・背景画像
    $ta_responsible_footer_frame_color = ta_select_color_w_image_color( 'ta_responsible_footer_frame_color' );
    if ( TA_HIEND_PI ) {
      $ta_responsible_footer_frame_grad_onoff = ta_read_op( 'ta_responsible_footer_frame_color_grad_onoff' );
    } else {
      $ta_responsible_footer_frame_grad_onoff = "invalid";
    }
    $ta_responsible_footer_frame_pic = ta_read_op_builtin_img( 'ta_responsible_footer_frame_pic' );
    $ta_responsible_footer_frame_pic_rule = ta_read_op( 'ta_responsible_footer_frame_pic_rule' );
    $ta_responsible_footer_frame_pic_margin = ta_read_op( 'ta_responsible_footer_frame_pic_margin' );
    switch ( $ta_responsible_footer_frame_pic_rule ) {
      case 'top_x':
        $footer_frame_repeat = 'repeat-x';
        $footer_frame_position = 'left top ' . $ta_responsible_footer_frame_pic_margin . 'px';
        break;
      case 'bottom_x':
        $footer_frame_repeat = 'repeat-x';
        $footer_frame_position = 'left bottom ' . $ta_responsible_footer_frame_pic_margin . 'px';
        break;
      case 'top_only':
        $footer_frame_repeat = 'no-repeat';
        $footer_frame_position = 'center top ' . $ta_responsible_footer_frame_pic_margin . 'px';
        break;
      case 'bottom_only':
        $footer_frame_repeat = 'no-repeat';
        $footer_frame_position = 'center bottom ' . $ta_responsible_footer_frame_pic_margin . 'px';
        break;
      case 'x_y':
        $footer_frame_repeat = 'repeat';
        $footer_frame_position = 'left top';
        break;
    }
    $ta_responsible_footer_fixed_space = ta_read_op( 'ta_responsible_footer_fixed_space' ); ?>
@media only screen and (max-width : <?php echo $ta_responsible_base_switch_width; ?>px){
  /******* フッター *******/
  #outer-footer-container {
    width: 100%!important;
    display: block!important;
  }

  #content #footer-container {
    display: none!important;
  }
  
  #footer-container #footer .fixed-space {
    margin-top: <?php echo $ta_responsible_footer_fixed_space; ?>px!important;
  }
  
  #footer {
    width: <?php echo $ta_responsible_base_width_w_padding; ?>%!important;
    padding: 0 <?php echo round( ( 100 - $ta_responsible_base_width_w_padding ) / 2 ); ?>%!important;
  }
  
  #footer-container {
    background: none!important;
    font-size: <?php echo $ta_responsible_footer_font_size; ?>%!important;
<?php
    if ( 'invalid' == $ta_responsible_footer_frame_grad_onoff ) { ?>
    background-color: <?php echo $ta_responsible_footer_frame_color; ?>!important;
<?php
      if ( 'no_image' != $ta_responsible_footer_frame_pic ) { ?>
    background-image: url("<?php echo $ta_responsible_footer_frame_pic; ?>")!important;
<?php
      }
    } else {
      ta_responsible_gradient_color_style( 'ta_responsible_footer_frame_color', $ta_responsible_footer_frame_pic );
    }
    if ( 'no_image' != $ta_responsible_footer_frame_pic ) { ?>
    background-repeat: <?php echo $footer_frame_repeat; ?>!important;
    background-position: <?php echo $footer_frame_position; ?>!important;
<?php
    } ?>
  }
  
  <?php ta_responsive_paragraph_style( 'ta_responsible_footer_font', 'ta_footer_font', '#footer-container' ); ?>
  
  #body-wrap {
    padding-bottom: <?php echo $ta_responsible_footer_top_padding; ?>px!important;
  }
  
  #footer-group1-contents {
    width: 100%!important;
<?php
    if ( 'invalid' == $ta_responsible_footer_group1block_onoff ) { ?>
    display: none!important;
<?php
    } ?>
    padding: <?php echo $ta_responsible_footer_group1block_margintop; ?>px 0 0!important;
  }
  
<?php
    if ( 'invalid' == $ta_responsible_footer_footerimg_onoff ) { ?>
  #footer-group1-contents #footer-image {
    display: none!important;
  }
  
<?php
    }
    if ( 'invalid' == $ta_responsible_footer_freetext_onoff ) { ?>
  #footer-group1-contents #footer-freetext-container {
    display: none!important;
  }
  
<?php
    } else { ?>
  #footer-group1-contents #footer-freetext-container {
    width: 100%!important;
  }
  
  #footer-group1-contents #footer-freetext {
    width: <?php echo $ta_responsible_footer_freetext_width; ?>%!important;
    margin-left: auto!important;
    margin-right: auto!important;
  }
  
<?php
    }
    if ( 'invalid' == $ta_responsible_footer_footerimgsub_onoff ) { ?>
  #footer-group1-contents #footer-sub-image {
    display: none!important;
  }
  
<?php
    } ?>
  #footer-group2-contents {
    width: 100%!important;
<?php
    if ( 'invalid' == $ta_responsible_footer_group2block_onoff ) { ?>
    display: none!important;
<?php
    } ?>
    padding: <?php echo $ta_responsible_footer_group2block_margintop; ?>px 0 0!important;
  }
  
<?php
    if ( 'invalid' == $ta_responsible_footer_footermenu_onoff ) { ?>
  #footer-group2-contents #ta-footer-menu-container {
    display: none!important;
  }
  
<?php
    } else if ( 100 != $ta_responsible_footer_footermenu_width ) { ?>
  #footer-group2-contents #ta-footer-menu-container {
    display: inline-block!important;
    vertical-align: bottom!important;
    width: 100%!important;
  }
  
  #footer-group2-contents #ta-footer-menu {
    display: block!important;
    width: <?php echo $ta_responsible_footer_footermenu_width; ?>%!important;
    margin-left: auto!important;
    margin-right: auto!important;
  }
  
<?php
    }
    if ( 'invalid' == $ta_responsible_footer_widgetarea_onoff ) { ?>
  #footer .ta-widget-container {
    display: none!important;
  }
  
<?php
    }
    if ( 'valid' == $ta_responsible_footer_widgetarea_centering ) { ?>
  #footer .ta-widget-container *:not(.footer_title) {
    text-align: center!important;
  }
  
  #footer .ta-widget-container table {
    display: inline!important;
    margin-left: auto!important;
    margin-right: auto!important;
  }
  
<?php
    } ?>
  #footer-group1-contents img,
  #footer-group2-contents img {
    max-width: 100%!important;
  }
  
  #footer-image {
    width: <?php echo $ta_responsible_footer_footerimg_width; ?>%!important;
    height: auto!important;
    margin-left: auto!important;
    margin-right: auto!important;
  }
  
  #footer-image img {
    display: block!important;
    width: auto!important;
    height: auto!important;
    margin-left: auto!important;
    margin-right: auto!important;
  }
  
  #footer-sub-image {
    width: <?php echo $ta_responsible_footer_footerimgsub_width; ?>%!important;
    height: auto!important;
    margin-left: auto!important;
    margin-right: auto!important;
  }
  
  #footer-sub-image img {
    display: block!important;
    width: auto!important;
    height: auto!important;
    margin-left: auto!important;
    margin-right: auto!important;
  }

  /******* コピーライト *******/
  #copyright-container {
    width: 100%!important;
    padding-top: <?php echo $ta_responsible_footer_copyrightcontainer_paddingtop; ?>px!important;
    padding-bottom: <?php echo $ta_responsible_footer_copyrightcontainer_paddingbottom; ?>px!important;
  }
  
  #copyright {
    width: <?php echo $ta_responsible_base_width_w_padding; ?>%!important;
    padding: <?php echo $ta_responsible_footer_copyright_padding; ?>px <?php echo round( ( 100 - $ta_responsible_base_width_w_padding ) / 2 ); ?>%!important;
  }
  
}

@media only screen and (max-width : <?php echo $ta_responsible_base_switch_width; ?>px){
  #footer-noimg {
    font-weight: <?php echo $ta_responsible_footer_footerimg_fontweight; ?>!important;
    text-decoration: none;
  }

  #footer-image a,
  #footer-image a:hover {
    text-decoration: none!important;
  }
  
  #footer-image a {
    color: <?php echo $ta_responsible_footer_footerimg_text_color; ?>!important;
    font-weight: <?php echo $ta_responsible_footer_footerimg_fontweight; ?>!important;
    text-decoration: <?php echo ( 'valid' == $ta_responsible_footer_footerimg_text_under ) ? 'underline' : 'none'; ?>!important;
  }
  
  #footer-image a:hover {
    color: <?php echo $ta_responsible_footer_footerimg_text_colorhover; ?>!important;
    text-decoration: <?php echo ( 'valid' == $ta_responsible_footer_footerimg_text_underhover ) ? 'underline' : 'none'; ?>!important;
  }
  
  #footer-noanc {
    color: <?php echo $ta_responsible_footer_footerimg_text_color; ?>!important;
  }
}

/***** ウィジェット共通CSS */
@media only screen and (max-width : <?php echo $ta_responsible_base_switch_width; ?>px){
  .ta-widget-container li {
    margin-bottom: 1em!important;
  }
}

<?php
    /******** ダイジェスト・一覧のレスポンシブデザイン設定 ********/
    $ta_responsible_top_latestposts_rows_onoff = ta_read_op( 'ta_responsible_top_latestposts_rows_onoff' );
    $ta_responsible_top_latestposts_excerpt_onoff = ta_read_op( 'ta_responsible_top_latestposts_excerpt_onoff' );
    $ta_responsible_top_latestposts_img_size = ta_read_op( 'ta_responsible_top_latestposts_img_size' );
    $ta_responsible_top_latestposts_excerpt_minheight_type = ta_read_op( 'ta_responsible_top_latestposts_excerpt_minheight_type' );
    $ta_responsible_top_latestposts_excerpt_minheight = ta_read_op( 'ta_responsible_top_latestposts_excerpt_minheight' );
    $ta_responsible_top_postdigest_rows_onoff = ta_read_op( 'ta_responsible_top_postdigest_rows_onoff' );
    $ta_responsible_top_postdigest_excerpt_onoff = ta_read_op( 'ta_responsible_top_postdigest_excerpt_onoff' );
    $ta_responsible_top_postdigest_img_size = ta_read_op( 'ta_responsible_top_postdigest_img_size' );
    $ta_responsible_top_postdigest_excerpt_minheight_type = ta_read_op( 'ta_responsible_top_postdigest_excerpt_minheight_type' );
    $ta_responsible_top_postdigest_excerpt_minheight = ta_read_op( 'ta_responsible_top_postdigest_excerpt_minheight' );
    $ta_responsible_sidebar_latestposts_rows_onoff = ta_read_op( 'ta_responsible_sidebar_latestposts_rows_onoff' );
    $ta_responsible_sidebar_latestposts_excerpt_onoff = ta_read_op( 'ta_responsible_sidebar_latestposts_excerpt_onoff' );
    $ta_responsible_sidebar_latestposts_img_size = ta_read_op( 'ta_responsible_sidebar_latestposts_img_size' );
    $ta_responsible_sidebar_latestposts_excerpt_minheight_type = ta_read_op( 'ta_responsible_sidebar_latestposts_excerpt_minheight_type' );
    $ta_responsible_sidebar_latestposts_excerpt_minheight = ta_read_op( 'ta_responsible_sidebar_latestposts_excerpt_minheight' );
    $ta_responsible_sidebar_postdigest_rows_onoff = ta_read_op( 'ta_responsible_sidebar_postdigest_rows_onoff' );
    $ta_responsible_sidebar_postdigest_excerpt_onoff = ta_read_op( 'ta_responsible_sidebar_postdigest_excerpt_onoff' );
    $ta_responsible_sidebar_postdigest_img_size = ta_read_op( 'ta_responsible_sidebar_postdigest_img_size' );
    $ta_responsible_sidebar_postdigest_excerpt_minheight_type = ta_read_op( 'ta_responsible_sidebar_postdigest_excerpt_minheight_type' );
    $ta_responsible_sidebar_postdigest_excerpt_minheight = ta_read_op( 'ta_responsible_sidebar_postdigest_excerpt_minheight' );
    $ta_responsible_sidebarsub_latestposts_rows_onoff = ta_read_op( 'ta_responsible_sidebarsub_latestposts_rows_onoff' );
    $ta_responsible_sidebarsub_latestposts_excerpt_onoff = ta_read_op( 'ta_responsible_sidebarsub_latestposts_excerpt_onoff' );
    $ta_responsible_sidebarsub_latestposts_img_size = ta_read_op( 'ta_responsible_sidebarsub_latestposts_img_size' );
    $ta_responsible_sidebarsub_latestposts_excerpt_minheight_type = ta_read_op( 'ta_responsible_sidebarsub_latestposts_excerpt_minheight_type' );
    $ta_responsible_sidebarsub_latestposts_excerpt_minheight = ta_read_op( 'ta_responsible_sidebarsub_latestposts_excerpt_minheight' );
    $ta_responsible_sidebarsub_postdigest_rows_onoff = ta_read_op( 'ta_responsible_sidebarsub_postdigest_rows_onoff' );
    $ta_responsible_sidebarsub_postdigest_excerpt_onoff = ta_read_op( 'ta_responsible_sidebarsub_postdigest_excerpt_onoff' );
    $ta_responsible_sidebarsub_postdigest_img_size = ta_read_op( 'ta_responsible_sidebarsub_postdigest_img_size' );
    $ta_responsible_sidebarsub_postdigest_excerpt_minheight_type = ta_read_op( 'ta_responsible_sidebarsub_postdigest_excerpt_minheight_type' );
    $ta_responsible_sidebarsub_postdigest_excerpt_minheight = ta_read_op( 'ta_responsible_sidebarsub_postdigest_excerpt_minheight' );
    $ta_responsible_archive_rows_onoff = ta_read_op( 'ta_responsible_archive_rows_onoff' );
    $ta_responsible_archive_excerpt_onoff = ta_read_op( 'ta_responsible_archive_excerpt_onoff' );
    $ta_responsible_archive_img_size = ta_read_op( 'ta_responsible_archive_img_size' );
    $ta_responsible_archive_excerpt_minheight_type = ta_read_op( 'ta_responsible_archive_excerpt_minheight_type' );
    $ta_responsible_archive_excerpt_minheight = ta_read_op( 'ta_responsible_archive_excerpt_minheight' ); ?>
/***** ダイジェスト・一覧 */
@media only screen and (max-width : <?php echo $ta_responsible_base_switch_width; ?>px){
<?php
    if ( 'valid' == $ta_responsible_top_latestposts_rows_onoff ) { ?>
  #main-whatsnew .info-contents-group .info-contents {
    width: 100%!important;
    margin-left: 0!important;
    margin-right: 0!important;
  }
  
<?php
    }
    if ( 'valid' == $ta_responsible_top_latestposts_excerpt_onoff ) { ?>
  #main-whatsnew .info-contents-group .info-contents .info-contents-excerpt p {
    display: none!important;
  }
  
<?php
    }
    if ( 'same' != $ta_responsible_top_latestposts_img_size && 'same' != $ta_responsible_top_latestposts_excerpt_minheight_type ) {
      if ( 'none' != $ta_responsible_top_latestposts_img_size ) { ?>
  #main-whatsnew .info-contents-thmimg-excerpt .info-contents-excerpt .digest-excerpt-withimage {
    min-height: <?php echo $ta_responsible_top_latestposts_excerpt_minheight; ?>px!important;
  }

<?php
      } else { ?>
  #main-whatsnew .info-contents-thmimg-excerpt .info-contents-excerpt .digest-excerpt-withimage {
    min-height: 0!important;
  }

<?php
      }
    }
    if ( 'valid' == $ta_responsible_top_postdigest_rows_onoff ) { ?>
  #main-catdigest .info-contents-group .info-contents {
    width: 100%!important;
    margin-left: 0!important;
    margin-right: 0!important;
  }
  
<?php
    }
    if ( 'valid' == $ta_responsible_top_postdigest_excerpt_onoff ) { ?>
  #main-catdigest .info-contents-group .info-contents .info-contents-excerpt p {
    display: none!important;
  }

<?php
    }
    if ( 'same' != $ta_responsible_top_postdigest_img_size && 'same' != $ta_responsible_top_postdigest_excerpt_minheight_type ) {
      if ( 'none' != $ta_responsible_top_postdigest_img_size ) { ?>
  #main-catdigest .info-contents-thmimg-excerpt .info-contents-excerpt .digest-excerpt-withimage {
    min-height: <?php echo $ta_responsible_top_postdigest_excerpt_minheight; ?>px!important;
  }

<?php
      } else { ?>
  #main-catdigest .info-contents-thmimg-excerpt .info-contents-excerpt .digest-excerpt-withimage {
    min-height: 0!important;
  }

<?php
      }
    }
    if ( 'valid' == $ta_responsible_sidebar_latestposts_rows_onoff ) { ?>
  #sidebar-whatsnew .info-contents-group .info-contents {
    width: 100%!important;
    margin-left: 0!important;
    margin-right: 0!important;
  }
  
<?php
    }
    if ( 'valid' == $ta_responsible_sidebar_latestposts_excerpt_onoff ) { ?>
  #sidebar-whatsnew .info-contents-group .info-contents .info-contents-excerpt p {
    display: none!important;
  }
  
<?php
    }
    if ( 'same' != $ta_responsible_sidebar_latestposts_img_size && 'same' != $ta_responsible_sidebar_latestposts_excerpt_minheight_type ) {
      if ( 'none' != $ta_responsible_sidebar_latestposts_img_size ) { ?>
  #sidebar-whatsnew .info-contents-thmimg-excerpt .info-contents-excerpt .digest-excerpt-withimage {
    min-height: <?php echo $ta_responsible_sidebar_latestposts_excerpt_minheight; ?>px!important;
  }

<?php
      } else { ?>
  #sidebar-whatsnew .info-contents-thmimg-excerpt .info-contents-excerpt .digest-excerpt-withimage {
    min-height: 0!important;
  }

<?php
      }
    }
    if ( 'valid' == $ta_responsible_sidebar_postdigest_rows_onoff ) { ?>
  #sidebar-catdigest .info-contents-group .info-contents {
    width: 100%!important;
    margin-left: 0!important;
    margin-right: 0!important;
  }
  
<?php
    }
    if ( 'valid' == $ta_responsible_sidebar_postdigest_excerpt_onoff ) { ?>
  #sidebar-catdigest .info-contents-group .info-contents .info-contents-excerpt p {
    display: none!important;
  }

<?php
    }
    if ( 'same' != $ta_responsible_sidebar_postdigest_img_size && 'same' != $ta_responsible_sidebar_postdigest_excerpt_minheight_type ) {
      if ( 'none' != $ta_responsible_sidebar_postdigest_img_size ) { ?>
  #sidebar-catdigest .info-contents-thmimg-excerpt .info-contents-excerpt .digest-excerpt-withimage {
    min-height: <?php echo $ta_responsible_sidebar_postdigest_excerpt_minheight; ?>px!important;
  }

<?php
      } else { ?>
  #sidebar-catdigest .info-contents-thmimg-excerpt .info-contents-excerpt .digest-excerpt-withimage {
    min-height: 0!important;
  }

<?php
      }
    }
    if ( 'valid' == $ta_responsible_sidebarsub_latestposts_rows_onoff ) { ?>
  #sidebarsub-whatsnew .info-contents-group .info-contents {
    width: 100%!important;
    margin-left: 0!important;
    margin-right: 0!important;
  }
  
<?php
    }
    if ( 'valid' == $ta_responsible_sidebarsub_latestposts_excerpt_onoff ) { ?>
  #sidebarsub-whatsnew .info-contents-group .info-contents .info-contents-excerpt p {
    display: none!important;
  }
  
<?php
    }
    if ( 'same' != $ta_responsible_sidebarsub_latestposts_img_size && 'same' != $ta_responsible_sidebarsub_latestposts_excerpt_minheight_type ) {
      if ( 'none' != $ta_responsible_sidebarsub_latestposts_img_size ) { ?>
  #sidebarsub-whatsnew .info-contents-thmimg-excerpt .info-contents-excerpt .digest-excerpt-withimage {
    min-height: <?php echo $ta_responsible_sidebarsub_latestposts_excerpt_minheight; ?>px!important;
  }

<?php
      } else { ?>
  #sidebarsub-whatsnew .info-contents-thmimg-excerpt .info-contents-excerpt .digest-excerpt-withimage {
    min-height: 0!important;
  }

<?php
      }
    }
    if ( 'valid' == $ta_responsible_sidebarsub_postdigest_rows_onoff ) { ?>
  #sidebarsub-catdigest .info-contents-group .info-contents {
    width: 100%!important;
    margin-left: 0!important;
    margin-right: 0!important;
  }
  
<?php
    }
    if ( 'valid' == $ta_responsible_sidebarsub_postdigest_excerpt_onoff ) { ?>
  #sidebarsub-catdigest .info-contents-group .info-contents .info-contents-excerpt p {
    display: none!important;
  }

<?php
    }
    if ( 'same' != $ta_responsible_sidebarsub_postdigest_img_size && 'same' != $ta_responsible_sidebarsub_postdigest_excerpt_minheight_type ) {
      if ( 'none' != $ta_responsible_sidebarsub_postdigest_img_size ) { ?>
  #sidebarsub-catdigest .info-contents-thmimg-excerpt .info-contents-excerpt .digest-excerpt-withimage {
    min-height: <?php echo $ta_responsible_sidebarsub_postdigest_excerpt_minheight; ?>px!important;
  }

<?php
      } else { ?>
  #sidebarsub-catdigest .info-contents-thmimg-excerpt .info-contents-excerpt .digest-excerpt-withimage {
    min-height: 0!important;
  }

<?php
      }
    }
    if ( 'valid' == $ta_responsible_archive_rows_onoff ) { ?>
  #archive-list .info-contents-group .info-contents {
    width: 100%!important;
    margin-left: 0!important;
    margin-right: 0!important;
  }
  
<?php
    }
    if ( 'valid' == $ta_responsible_archive_excerpt_onoff ) { ?>
  #archive-list .info-contents-group .info-contents .info-contents-excerpt p {
    display: none!important;
  }

<?php
    }
    if ( 'same' != $ta_responsible_archive_img_size && 'same' != $ta_responsible_archive_excerpt_minheight_type ) {
      if ( 'none' != $ta_responsible_archive_img_size ) { ?>
  #archive-list .info-contents-thmimg-excerpt .info-contents-excerpt .digest-excerpt-withimage {
    min-height: <?php echo $ta_responsible_archive_excerpt_minheight; ?>px!important;
  }

<?php
      } else { ?>
  #archive-list .info-contents-thmimg-excerpt .info-contents-excerpt .digest-excerpt-withimage {
    min-height: 0!important;
  }

<?php
      }
    } ?>
}
<?php
  }


  $output = ob_get_contents();  //データを取得
  ob_end_clean();               //データをクリア
  file_put_contents( TEMPLATEPATH . '/css/ta-dynamic.css', $output );
  return;
}


function ta_dynamic_dg_css_create() {
  ob_start(); //バッファリング開始 ?>
@charset "UTF-8";

/******************************************************/
/*  このCSSファイルは自動的に生成されています。
/*  設定を変更すると上書きされますのでご注意ください。
/*
/*          de集まれ株式会社　技術支援(テックエイド)部
/******************************************************/

/******************************************************/
/*  各種ダイジェスト
/******************************************************/

/***** トップページダイジェストCSS */
<?php
  $ta_top_latestposts_top_margin_value = ta_read_op( 'ta_top_latestposts_top_margin_value' );
  $ta_top_postdigest_top_margin_value = ta_read_op( 'ta_top_postdigest_top_margin_value' );
  $ta_top_postdigest_catlink_title_underline_onoff = ( 'valid' == ta_read_op( 'ta_top_postdigest_catlink_title_underline_onoff' ) ) ? 'underline' : 'none';
  $ta_top_postdigest_catlink_title_size = ta_read_op( 'ta_top_postdigest_catlink_title_size' );
  $ta_top_postdigest_catlink_title_weight = ta_read_op( 'ta_top_postdigest_catlink_title_weight' );
  $ta_top_postdigest_catlink_title_color = ta_select_color_w_image_color( 'ta_top_postdigest_catlink_title_color' );
  $ta_top_postdigest_catlink_title_colorhover = ta_select_color_w_image_color( 'ta_top_postdigest_catlink_title_colorhover' );
  $ta_top_postdigest_catlink_bgcolor = ta_select_color_w_image_color( 'ta_top_postdigest_catlink_bgcolor' );
  $ta_top_postdigest_catlink_bgcolorhover = ta_select_color_w_image_color( 'ta_top_postdigest_catlink_bgcolorhover' );
  $ta_top_postdigest_catlink_minwidth = ta_read_op( 'ta_top_postdigest_catlink_minwidth' );
  $ta_top_postdigest_catlink_round = ta_read_op( 'ta_top_postdigest_catlink_round' );
  $ta_top_postdigest_catlink_margintop = ta_read_op( 'ta_top_postdigest_catlink_margintop' );
  $ta_top_postdigest_catlink_height = ta_read_op( 'ta_top_postdigest_catlink_height' ); ?>
.ta-top-latestposts-top-margin {
  margin-top: <?php echo $ta_top_latestposts_top_margin_value; ?>px;
}

.ta-top-postdigest-top-margin {
  margin-top: <?php echo $ta_top_postdigest_top_margin_value; ?>px;
}

#main #main-catdigest .postdigest-list {
  display: inline-block;
  vertical-align: bottom;
  width: 100%;
  height: auto;
  margin-top: <?php echo $ta_top_postdigest_catlink_margintop; ?>px;
}

#main #main-catdigest .postdigest-list a {
  float: right;
  text-align: center;
  line-height: <?php echo $ta_top_postdigest_catlink_height; ?>em;
  font-size: <?php echo $ta_top_postdigest_catlink_title_size; ?>%;
  font-weight: <?php echo $ta_top_postdigest_catlink_title_weight; ?>;
  color: <?php echo $ta_top_postdigest_catlink_title_color; ?>;
  background-color: <?php echo $ta_top_postdigest_catlink_bgcolor; ?>;
  min-width: <?php echo $ta_top_postdigest_catlink_minwidth; ?>em;
  text-decoration: <?php echo $ta_top_postdigest_catlink_title_underline_onoff; ?>;
  border-radius: <?php echo $ta_top_postdigest_catlink_round; ?>px;
}

#main #main-catdigest .postdigest-list a:hover {
  color: <?php echo $ta_top_postdigest_catlink_title_colorhover; ?>;
  background-color: <?php echo $ta_top_postdigest_catlink_bgcolorhover; ?>;
}

<?php ta_digest_disp_style_w_php( 'top' ); ?>

/***** サイドバーダイジェストCSS */
<?php
  $ta_sidebar_latestposts_top_margin_value = ta_read_op( 'ta_sidebar_latestposts_top_margin_value' );
  $ta_sidebar_postdigest_top_margin_value = ta_read_op( 'ta_sidebar_postdigest_top_margin_value' );
  $ta_sidebar_postdigest_catlink_title_underline_onoff = ( 'valid' == ta_read_op( 'ta_sidebar_postdigest_catlink_title_underline_onoff' ) ) ? 'underline' : 'none';
  $ta_sidebar_postdigest_catlink_title_size = ta_read_op( 'ta_sidebar_postdigest_catlink_title_size' );
  $ta_sidebar_postdigest_catlink_title_weight = ta_read_op( 'ta_sidebar_postdigest_catlink_title_weight' );
  $ta_sidebar_postdigest_catlink_title_color = ta_select_color_w_image_color( 'ta_sidebar_postdigest_catlink_title_color' );
  $ta_sidebar_postdigest_catlink_title_colorhover = ta_select_color_w_image_color( 'ta_sidebar_postdigest_catlink_title_colorhover' );
  $ta_sidebar_postdigest_catlink_bgcolor = ta_select_color_w_image_color( 'ta_sidebar_postdigest_catlink_bgcolor' );
  $ta_sidebar_postdigest_catlink_bgcolorhover = ta_select_color_w_image_color( 'ta_sidebar_postdigest_catlink_bgcolorhover' );
  $ta_sidebar_postdigest_catlink_minwidth = ta_read_op( 'ta_sidebar_postdigest_catlink_minwidth' );
  $ta_sidebar_postdigest_catlink_round = ta_read_op( 'ta_sidebar_postdigest_catlink_round' );
  $ta_sidebar_postdigest_catlink_margintop = ta_read_op( 'ta_sidebar_postdigest_catlink_margintop' );
  $ta_sidebar_postdigest_catlink_height = ta_read_op( 'ta_sidebar_postdigest_catlink_height' ); ?>
.ta-sidebar-latestposts-top-margin {
  margin-top: <?php echo $ta_sidebar_latestposts_top_margin_value; ?>px;
}

.ta-sidebar-postdigest-top-margin {
  margin-top: <?php echo $ta_sidebar_postdigest_top_margin_value; ?>px;
}

#sidebar #sidebar-catdigest .postdigest-list {
  display: inline-block;
  vertical-align: bottom;
  width: 100%;
  height: auto;
  margin-top: <?php echo $ta_sidebar_postdigest_catlink_margintop; ?>px;
}

#sidebar #sidebar-catdigest .postdigest-list a {
  float: right;
  text-align: center;
  line-height: <?php echo $ta_sidebar_postdigest_catlink_height; ?>em;
  font-size: <?php echo $ta_sidebar_postdigest_catlink_title_size; ?>%;
  font-weight: <?php echo $ta_sidebar_postdigest_catlink_title_weight; ?>;
  color: <?php echo $ta_sidebar_postdigest_catlink_title_color; ?>;
  background-color: <?php echo $ta_sidebar_postdigest_catlink_bgcolor; ?>;
  min-width: <?php echo $ta_sidebar_postdigest_catlink_minwidth; ?>em;
  text-decoration: <?php echo $ta_sidebar_postdigest_catlink_title_underline_onoff; ?>;
  border-radius: <?php echo $ta_sidebar_postdigest_catlink_round; ?>px;
}

#sidebar #sidebar-catdigest .postdigest-list a:hover {
  color: <?php echo $ta_sidebar_postdigest_catlink_title_colorhover; ?>;
  background-color: <?php echo $ta_sidebar_postdigest_catlink_bgcolorhover; ?>;
}

<?php ta_digest_disp_style_w_php( 'sidebar' ); ?>

/***** サブサイドバーダイジェストCSS */
<?php
  $ta_sidebarsub_latestposts_top_margin_value = ta_read_op( 'ta_sidebarsub_latestposts_top_margin_value' );
  $ta_sidebarsub_postdigest_top_margin_value = ta_read_op( 'ta_sidebarsub_postdigest_top_margin_value' );
  $ta_sidebarsub_postdigest_catlink_title_underline_onoff = ( 'valid' == ta_read_op( 'ta_sidebarsub_postdigest_catlink_title_underline_onoff' ) ) ? 'underline' : 'none';
  $ta_sidebarsub_postdigest_catlink_title_size = ta_read_op( 'ta_sidebarsub_postdigest_catlink_title_size' );
  $ta_sidebarsub_postdigest_catlink_title_weight = ta_read_op( 'ta_sidebarsub_postdigest_catlink_title_weight' );
  $ta_sidebarsub_postdigest_catlink_title_color = ta_select_color_w_image_color( 'ta_sidebarsub_postdigest_catlink_title_color' );
  $ta_sidebarsub_postdigest_catlink_title_colorhover = ta_select_color_w_image_color( 'ta_sidebarsub_postdigest_catlink_title_colorhover' );
  $ta_sidebarsub_postdigest_catlink_bgcolor = ta_select_color_w_image_color( 'ta_sidebarsub_postdigest_catlink_bgcolor' );
  $ta_sidebarsub_postdigest_catlink_bgcolorhover = ta_select_color_w_image_color( 'ta_sidebarsub_postdigest_catlink_bgcolorhover' );
  $ta_sidebarsub_postdigest_catlink_minwidth = ta_read_op( 'ta_sidebarsub_postdigest_catlink_minwidth' );
  $ta_sidebarsub_postdigest_catlink_round = ta_read_op( 'ta_sidebarsub_postdigest_catlink_round' );
  $ta_sidebarsub_postdigest_catlink_margintop = ta_read_op( 'ta_sidebarsub_postdigest_catlink_margintop' );
  $ta_sidebarsub_postdigest_catlink_height = ta_read_op( 'ta_sidebarsub_postdigest_catlink_height' ); ?>
.ta-sidebarsub-latestposts-top-margin {
  margin-top: <?php echo $ta_sidebarsub_latestposts_top_margin_value; ?>px;
}

.ta-sidebarsub-postdigest-top-margin {
  margin-top: <?php echo $ta_sidebarsub_postdigest_top_margin_value; ?>px;
}

#sidebarsub #sidebarsub-catdigest .postdigest-list {
  display: inline-block;
  vertical-align: bottom;
  width: 100%;
  height: auto;
  margin-top: <?php echo $ta_sidebarsub_postdigest_catlink_margintop; ?>px;
}

#sidebarsub #sidebarsub-catdigest .postdigest-list a {
  float: right;
  text-align: center;
  line-height: <?php echo $ta_sidebarsub_postdigest_catlink_height; ?>em;
  font-size: <?php echo $ta_sidebarsub_postdigest_catlink_title_size; ?>%;
  font-weight: <?php echo $ta_sidebarsub_postdigest_catlink_title_weight; ?>;
  color: <?php echo $ta_sidebarsub_postdigest_catlink_title_color; ?>;
  background-color: <?php echo $ta_sidebarsub_postdigest_catlink_bgcolor; ?>;
  min-width: <?php echo $ta_sidebarsub_postdigest_catlink_minwidth; ?>em;
  text-decoration: <?php echo $ta_sidebarsub_postdigest_catlink_title_underline_onoff; ?>;
  border-radius: <?php echo $ta_sidebarsub_postdigest_catlink_round; ?>px;
}

#sidebarsub #sidebarsub-catdigest .postdigest-list a:hover {
  color: <?php echo $ta_sidebarsub_postdigest_catlink_title_colorhover; ?>;
  background-color: <?php echo $ta_sidebarsub_postdigest_catlink_bgcolorhover; ?>;
}

<?php ta_digest_disp_style_w_php( 'sidebarsub' );

  $output = ob_get_contents();  //データを取得
  ob_end_clean();               //データをクリア
  file_put_contents( TEMPLATEPATH . '/css/ta-dynamic-dg.css', $output );
  return;
}


function ta_dynamic_hl_css_create() {
  ob_start(); //バッファリング開始 ?>
@charset "UTF-8";

/******************************************************/
/*  このCSSファイルは自動的に生成されています。
/*  設定を変更すると上書きされますのでご注意ください。
/*
/*          de集まれ株式会社　技術支援(テックエイド)部
/******************************************************/

/******************************************************/
/*  ヘッドラインに関する可変スタイル
/******************************************************/

<?php
  //ヘッダーフリーエリア用タイトル
  if ( TA_HIEND_PI ) {
    ta_headline_style_w_php( 'ta_main_headline_h2', '#header_freearea h2.header_title' );
    ta_headline_style_w_php( 'ta_main_headline_h3', '#header_freearea h3.header_title' );
    ta_headline_style_w_php( 'ta_main_headline_h4', '#header_freearea h4.header_title' );
    ta_headline_style_w_php( 'ta_main_headline_h5', '#header_freearea h5.header_title' );
  }
  //メイン用タイトル
  ta_headline_style_w_php( 'ta_main_headline_h2', '#main h2.title' );
  ta_headline_style_w_php( 'ta_main_headline_h3', '#main h3.title' );
  ta_headline_style_w_php( 'ta_main_headline_h4', '#main h4.title' );
  ta_headline_style_w_php( 'ta_main_headline_h5', '#main h5.title' );
  //メイン用装飾
  if ( TA_HIEND_PI ) {
    ta_headline_style_w_php( 'ta_main_deco1', '#main h6.deco1' );
    ta_headline_style_w_php( 'ta_main_deco2', '#main h6.deco2' );
    ta_headline_style_w_php( 'ta_main_deco3', '#main h6.deco3' );
    ta_headline_style_w_php( 'ta_main_deco4', '#main h6.deco4' );
  }
  //サイドバー用タイトル
  ta_headline_style_w_php( 'ta_sidebar_headline_h2', '#sidebar h2.sidebar_title' );
  ta_headline_style_w_php( 'ta_sidebar_headline_h3', '#sidebar h3.sidebar_title' );
  ta_headline_style_w_php( 'ta_sidebar_headline_h4', '#sidebar h4.sidebar_title' );
  ta_headline_style_w_php( 'ta_sidebar_headline_h5', '#sidebar h5.sidebar_title' );
  //サイドバー用装飾
  if ( TA_HIEND_PI ) {
    ta_headline_style_w_php( 'ta_sidebar_deco1', '#sidebar h6.sidebar_deco1' );
    ta_headline_style_w_php( 'ta_sidebar_deco2', '#sidebar h6.sidebar_deco2' );
    ta_headline_style_w_php( 'ta_sidebar_deco3', '#sidebar h6.sidebar_deco3' );
    ta_headline_style_w_php( 'ta_sidebar_deco4', '#sidebar h6.sidebar_deco4' );
  }
  //サブサイドバー用タイトル
  ta_headline_style_w_php( 'ta_sidebarsub_headline_h2', '#sidebarsub h2.sidebarsub_title' );
  ta_headline_style_w_php( 'ta_sidebarsub_headline_h3', '#sidebarsub h3.sidebarsub_title' );
  ta_headline_style_w_php( 'ta_sidebarsub_headline_h4', '#sidebarsub h4.sidebarsub_title' );
  ta_headline_style_w_php( 'ta_sidebarsub_headline_h5', '#sidebarsub h5.sidebarsub_title' );
  //フッター用タイトル
  ta_headline_style_w_php( 'ta_footer_headline_h2', '#content #footer-container h2.footer_title' );
  ta_headline_style_w_php( 'ta_footer_headline_h3', '#content #footer-container h3.footer_title' );
  ta_headline_style_w_php( 'ta_footer_headline_h4', '#content #footer-container h4.footer_title' );
  ta_headline_style_w_php( 'ta_footer_headline_h5', '#content #footer-container h5.footer_title' );
  ta_headline_style_w_php( 'ta_footer_headline_h2', '#outer-footer-container #footer-container h2.footer_title' );
  ta_headline_style_w_php( 'ta_footer_headline_h3', '#outer-footer-container #footer-container h3.footer_title' );
  ta_headline_style_w_php( 'ta_footer_headline_h4', '#outer-footer-container #footer-container h4.footer_title' );
  ta_headline_style_w_php( 'ta_footer_headline_h5', '#outer-footer-container #footer-container h5.footer_title' );


  $output = ob_get_contents();  //データを取得
  ob_end_clean();               //データをクリア
  file_put_contents( TEMPLATEPATH . '/css/ta-dynamic-hl.css', $output );
  return;
}


function ta_dynamic_st_css_create() {
  ob_start(); //バッファリング開始 ?>
@charset "UTF-8";

/******************************************************/
/*  このCSSファイルは自動的に生成されています。
/*  設定を変更すると上書きされますのでご注意ください。
/*
/*          de集まれ株式会社　技術支援(テックエイド)部
/******************************************************/

/******************************************************/
/*  TAショートコード
/******************************************************/

/***** TA汎用メニューCSS */
<?php
  if ( TA_HIEND_PI ) { ta_thm001highend_versatile_menu_style(); } ?>

/***** 画像と説明付きメニューCSS */
<?php
  if ( TA_HIEND_PI ) {
    ta_thm001highend_imgexp_menu_style( 'a' );
    ta_thm001highend_imgexp_menu_style( 'b' );
  }

  $output = ob_get_contents();  //データを取得
  ob_end_clean();               //データをクリア
  file_put_contents( TEMPLATEPATH . '/css/ta-dynamic-st.css', $output );
  return;
}


function ta_dynamic_reshl_css_create() {
  ob_start(); //バッファリング開始 ?>
@charset "UTF-8";

/******************************************************/
/*  このCSSファイルは自動的に生成されています。
/*  設定を変更すると上書きされますのでご注意ください。
/*
/*          de集まれ株式会社　技術支援(テックエイド)部
/******************************************************/

/******************************************************/
/*  レスポンシブヘッドラインに関する可変スタイル
/******************************************************/

<?php
  if ( 'valid' == ta_read_op( 'ta_responsible_base_onoff' ) ) { ?>
@media only screen and (max-width : <?php echo ta_read_op( 'ta_responsible_base_switch_width' ); ?>px){
/***** for main */
<?php
    $ta_responsible_main_h2_senyo_onoff = ta_read_op( 'ta_responsible_main_h2_senyo_onoff' );
    $ta_responsible_main_h3_senyo_onoff = ta_read_op( 'ta_responsible_main_h3_senyo_onoff' );
    $ta_responsible_main_h4_senyo_onoff = ta_read_op( 'ta_responsible_main_h4_senyo_onoff' );
    $ta_responsible_main_h5_senyo_onoff = ta_read_op( 'ta_responsible_main_h5_senyo_onoff' );
    $ta_responsible_main_h2_size2common = ta_read_op( 'ta_responsible_main_h2_size2common' );
    $ta_responsible_main_h3_size2common = ta_read_op( 'ta_responsible_main_h3_size2common' );
    $ta_responsible_main_h4_size2common = ta_read_op( 'ta_responsible_main_h4_size2common' );
    $ta_responsible_main_h5_size2common = ta_read_op( 'ta_responsible_main_h5_size2common' );
    $ta_responsible_main_deco1_senyo_onoff = ta_read_op( 'ta_responsible_main_deco1_senyo_onoff' );
    $ta_responsible_main_deco2_senyo_onoff = ta_read_op( 'ta_responsible_main_deco2_senyo_onoff' );
    $ta_responsible_main_deco3_senyo_onoff = ta_read_op( 'ta_responsible_main_deco3_senyo_onoff' );
    $ta_responsible_main_deco4_senyo_onoff = ta_read_op( 'ta_responsible_main_deco4_senyo_onoff' );
    $ta_responsible_main_deco1_size2common = ta_read_op( 'ta_responsible_main_deco1_size2common' );
    $ta_responsible_main_deco2_size2common = ta_read_op( 'ta_responsible_main_deco2_size2common' );
    $ta_responsible_main_deco3_size2common = ta_read_op( 'ta_responsible_main_deco3_size2common' );
    $ta_responsible_main_deco4_size2common = ta_read_op( 'ta_responsible_main_deco4_size2common' );
    if ( 'valid' == $ta_responsible_main_h2_senyo_onoff ) {
      ta_responsive_headline_style_w_php( 'ta_responsible_main_h2', '#main h2.title' );
    } else { ?>
  #main h2.title {
    font-size: <?php echo $ta_responsible_main_h2_size2common; ?>%!important;
  }
<?php
    }
    if ( 'valid' == $ta_responsible_main_h3_senyo_onoff ) {
      ta_responsive_headline_style_w_php( 'ta_responsible_main_h3', '#main h3.title' );
    } else { ?>
  #main h3.title {
    font-size: <?php echo $ta_responsible_main_h3_size2common; ?>%!important;
  }
<?php
    }
    if ( 'valid' == $ta_responsible_main_h4_senyo_onoff ) {
      ta_responsive_headline_style_w_php( 'ta_responsible_main_h4', '#main h4.title' );
    } else { ?>
  #main h4.title {
    font-size: <?php echo $ta_responsible_main_h4_size2common; ?>%!important;
  }
<?php
    }
    if ( 'valid' == $ta_responsible_main_h5_senyo_onoff ) {
      ta_responsive_headline_style_w_php( 'ta_responsible_main_h5', '#main h5.title' );
    } else { ?>
  #main h5.title {
    font-size: <?php echo $ta_responsible_main_h5_size2common; ?>%!important;
  }
<?php
    }
    if ( 'valid' == $ta_responsible_main_deco1_senyo_onoff ) {
      ta_responsive_headline_style_w_php( 'ta_responsible_main_deco1', '#main h6.deco1' );
    } else { ?>
  #main h6.deco1 {
    font-size: <?php echo $ta_responsible_main_deco1_size2common; ?>%!important;
  }
<?php
    }
    if ( 'valid' == $ta_responsible_main_deco2_senyo_onoff ) {
      ta_responsive_headline_style_w_php( 'ta_responsible_main_deco2', '#main h6.deco2' );
    } else { ?>
  #main h6.deco2 {
    font-size: <?php echo $ta_responsible_main_deco2_size2common; ?>%!important;
  }
<?php
    }
    if ( 'valid' == $ta_responsible_main_deco3_senyo_onoff ) {
      ta_responsive_headline_style_w_php( 'ta_responsible_main_deco3', '#main h6.deco3' );
    } else { ?>
  #main h6.deco3 {
    font-size: <?php echo $ta_responsible_main_deco3_size2common; ?>%!important;
  }
<?php
    }
    if ( 'valid' == $ta_responsible_main_deco4_senyo_onoff ) {
      ta_responsive_headline_style_w_php( 'ta_responsible_main_deco4', '#main h6.deco4' );
    } else { ?>
  #main h6.deco4 {
    font-size: <?php echo $ta_responsible_main_deco4_size2common; ?>%!important;
  }
<?php
    } ?>

/***** for sidebar */
<?php
    $ta_responsible_sidebar_h2_senyo_onoff = ta_read_op( 'ta_responsible_sidebar_h2_senyo_onoff' );
    $ta_responsible_sidebar_h3_senyo_onoff = ta_read_op( 'ta_responsible_sidebar_h3_senyo_onoff' );
    $ta_responsible_sidebar_h4_senyo_onoff = ta_read_op( 'ta_responsible_sidebar_h4_senyo_onoff' );
    $ta_responsible_sidebar_h5_senyo_onoff = ta_read_op( 'ta_responsible_sidebar_h5_senyo_onoff' );
    $ta_responsible_sidebar_h2_size2common = ta_read_op( 'ta_responsible_sidebar_h2_size2common' );
    $ta_responsible_sidebar_h3_size2common = ta_read_op( 'ta_responsible_sidebar_h3_size2common' );
    $ta_responsible_sidebar_h4_size2common = ta_read_op( 'ta_responsible_sidebar_h4_size2common' );
    $ta_responsible_sidebar_h5_size2common = ta_read_op( 'ta_responsible_sidebar_h5_size2common' );
    $ta_responsible_sidebar_deco1_senyo_onoff = ta_read_op( 'ta_responsible_sidebar_deco1_senyo_onoff' );
    $ta_responsible_sidebar_deco2_senyo_onoff = ta_read_op( 'ta_responsible_sidebar_deco2_senyo_onoff' );
    $ta_responsible_sidebar_deco3_senyo_onoff = ta_read_op( 'ta_responsible_sidebar_deco3_senyo_onoff' );
    $ta_responsible_sidebar_deco4_senyo_onoff = ta_read_op( 'ta_responsible_sidebar_deco4_senyo_onoff' );
    $ta_responsible_sidebar_deco1_size2common = ta_read_op( 'ta_responsible_sidebar_deco1_size2common' );
    $ta_responsible_sidebar_deco2_size2common = ta_read_op( 'ta_responsible_sidebar_deco2_size2common' );
    $ta_responsible_sidebar_deco3_size2common = ta_read_op( 'ta_responsible_sidebar_deco3_size2common' );
    $ta_responsible_sidebar_deco4_size2common = ta_read_op( 'ta_responsible_sidebar_deco4_size2common' );
    if ( 'valid' == $ta_responsible_sidebar_h2_senyo_onoff ) {
      ta_responsive_headline_style_w_php( 'ta_responsible_sidebar_h2', '#sidebar h2.sidebar_title' );
    } else { ?>
  #sidebar h2.sidebar_title {
    font-size: <?php echo $ta_responsible_sidebar_h2_size2common; ?>%!important;
  }
<?php
    }
    if ( 'valid' == $ta_responsible_sidebar_h3_senyo_onoff ) {
      ta_responsive_headline_style_w_php( 'ta_responsible_sidebar_h3', '#sidebar h3.sidebar_title' );
    } else { ?>
  #sidebar h3.sidebar_title {
    font-size: <?php echo $ta_responsible_sidebar_h3_size2common; ?>%!important;
  }
<?php
    }
    if ( 'valid' == $ta_responsible_sidebar_h4_senyo_onoff ) {
      ta_responsive_headline_style_w_php( 'ta_responsible_sidebar_h4', '#sidebar h4.sidebar_title' );
    } else { ?>
  #sidebar h4.sidebar_title {
    font-size: <?php echo $ta_responsible_sidebar_h4_size2common; ?>%!important;
  }
<?php
    }
    if ( 'valid' == $ta_responsible_sidebar_h5_senyo_onoff ) {
      ta_responsive_headline_style_w_php( 'ta_responsible_sidebar_h5', '#sidebar h5.sidebar_title' );
    } else { ?>
  #sidebar h5.sidebar_title {
    font-size: <?php echo $ta_responsible_sidebar_h5_size2common; ?>%!important;
  }
<?php
    }
    if ( 'valid' == $ta_responsible_sidebar_deco1_senyo_onoff ) {
      ta_responsive_headline_style_w_php( 'ta_responsible_sidebar_deco1', '#sidebar h6.sidebar_deco1' );
    } else { ?>
  #sidebar h6.sidebar_deco1 {
    font-size: <?php echo $ta_responsible_sidebar_deco1_size2common; ?>%!important;
  }
<?php
    }
    if ( 'valid' == $ta_responsible_sidebar_deco2_senyo_onoff ) {
      ta_responsive_headline_style_w_php( 'ta_responsible_sidebar_deco2', '#sidebar h6.sidebar_deco2' );
    } else { ?>
  #sidebar h6.sidebar_deco2 {
    font-size: <?php echo $ta_responsible_sidebar_deco2_size2common; ?>%!important;
  }
<?php
    }
    if ( 'valid' == $ta_responsible_sidebar_deco3_senyo_onoff ) {
      ta_responsive_headline_style_w_php( 'ta_responsible_sidebar_deco3', '#sidebar h6.sidebar_deco3' );
    } else { ?>
  #sidebar h6.sidebar_deco3 {
    font-size: <?php echo $ta_responsible_sidebar_deco3_size2common; ?>%!important;
  }
<?php
    }
    if ( 'valid' == $ta_responsible_sidebar_deco4_senyo_onoff ) {
      ta_responsive_headline_style_w_php( 'ta_responsible_sidebar_deco4', '#sidebar h6.sidebar_deco4' );
    } else { ?>
  #sidebar h6.sidebar_deco4 {
    font-size: <?php echo $ta_responsible_sidebar_deco4_size2common; ?>%!important;
  }
<?php
    } ?>

/***** for sidebarsub */
<?php
    $ta_responsible_sidebarsub_h2_senyo_onoff = ta_read_op( 'ta_responsible_sidebarsub_h2_senyo_onoff' );
    $ta_responsible_sidebarsub_h3_senyo_onoff = ta_read_op( 'ta_responsible_sidebarsub_h3_senyo_onoff' );
    $ta_responsible_sidebarsub_h4_senyo_onoff = ta_read_op( 'ta_responsible_sidebarsub_h4_senyo_onoff' );
    $ta_responsible_sidebarsub_h5_senyo_onoff = ta_read_op( 'ta_responsible_sidebarsub_h5_senyo_onoff' );
    $ta_responsible_sidebarsub_h2_size2common = ta_read_op( 'ta_responsible_sidebarsub_h2_size2common' );
    $ta_responsible_sidebarsub_h3_size2common = ta_read_op( 'ta_responsible_sidebarsub_h3_size2common' );
    $ta_responsible_sidebarsub_h4_size2common = ta_read_op( 'ta_responsible_sidebarsub_h4_size2common' );
    $ta_responsible_sidebarsub_h5_size2common = ta_read_op( 'ta_responsible_sidebarsub_h5_size2common' );
    if ( 'valid' == $ta_responsible_sidebarsub_h2_senyo_onoff ) {
      ta_responsive_headline_style_w_php( 'ta_responsible_sidebarsub_h2', '#sidebarsub h2.sidebarsub_title' );
    } else { ?>
  #sidebarsub h2.sidebarsub_title {
    font-size: <?php echo $ta_responsible_sidebarsub_h2_size2common; ?>%!important;
  }
<?php
    }
    if ( 'valid' == $ta_responsible_sidebarsub_h3_senyo_onoff ) {
      ta_responsive_headline_style_w_php( 'ta_responsible_sidebarsub_h3', '#sidebarsub h3.sidebarsub_title' );
    } else { ?>
  #sidebarsub h3.sidebarsub_title {
    font-size: <?php echo $ta_responsible_sidebarsub_h3_size2common; ?>%!important;
  }
<?php
    }
    if ( 'valid' == $ta_responsible_sidebarsub_h4_senyo_onoff ) {
      ta_responsive_headline_style_w_php( 'ta_responsible_sidebarsub_h4', '#sidebarsub h4.sidebarsub_title' );
    } else { ?>
  #sidebarsub h4.sidebarsub_title {
    font-size: <?php echo $ta_responsible_sidebarsub_h4_size2common; ?>%!important;
  }
<?php
    }
    if ( 'valid' == $ta_responsible_sidebarsub_h5_senyo_onoff ) {
      ta_responsive_headline_style_w_php( 'ta_responsible_sidebarsub_h5', '#sidebarsub h5.sidebarsub_title' );
    } else { ?>
  #sidebarsub h5.sidebarsub_title {
    font-size: <?php echo $ta_responsible_sidebarsub_h5_size2common; ?>%!important;
  }
<?php
    } ?>

/***** for footer */
<?php
    $ta_responsible_footer_h2_senyo_onoff = ta_read_op( 'ta_responsible_footer_h2_senyo_onoff' );
    $ta_responsible_footer_h3_senyo_onoff = ta_read_op( 'ta_responsible_footer_h3_senyo_onoff' );
    $ta_responsible_footer_h4_senyo_onoff = ta_read_op( 'ta_responsible_footer_h4_senyo_onoff' );
    $ta_responsible_footer_h5_senyo_onoff = ta_read_op( 'ta_responsible_footer_h5_senyo_onoff' );
    $ta_responsible_footer_h2_size2common = ta_read_op( 'ta_responsible_footer_h2_size2common' );
    $ta_responsible_footer_h3_size2common = ta_read_op( 'ta_responsible_footer_h3_size2common' );
    $ta_responsible_footer_h4_size2common = ta_read_op( 'ta_responsible_footer_h4_size2common' );
    $ta_responsible_footer_h5_size2common = ta_read_op( 'ta_responsible_footer_h5_size2common' );
    if ( 'valid' == $ta_responsible_footer_h2_senyo_onoff ) {
      ta_responsive_headline_style_w_php( 'ta_responsible_footer_h2', '#footer h2.footer_title' );
    } else { ?>
  #footer h2.footer_title {
    font-size: <?php echo $ta_responsible_footer_h2_size2common; ?>%!important;
  }
<?php
    }
    if ( 'valid' == $ta_responsible_footer_h3_senyo_onoff ) {
      ta_responsive_headline_style_w_php( 'ta_responsible_footer_h3', '#footer h3.footer_title' );
    } else { ?>
  #footer h3.footer_title {
    font-size: <?php echo $ta_responsible_footer_h3_size2common; ?>%!important;
  }
<?php
    }
    if ( 'valid' == $ta_responsible_footer_h4_senyo_onoff ) {
      ta_responsive_headline_style_w_php( 'ta_responsible_footer_h4', '#footer h4.footer_title' );
    } else { ?>
  #footer h4.footer_title {
    font-size: <?php echo $ta_responsible_footer_h4_size2common; ?>%!important;
  }
<?php
    }
    if ( 'valid' == $ta_responsible_footer_h5_senyo_onoff ) {
      ta_responsive_headline_style_w_php( 'ta_responsible_footer_h5', '#footer h5.footer_title' );
    } else { ?>
  #footer h5.footer_title {
    font-size: <?php echo $ta_responsible_footer_h5_size2common; ?>%!important;
  }
<?php
    } ?>
}
<?php
  }


  $output = ob_get_contents();  //データを取得
  ob_end_clean();               //データをクリア
  file_put_contents( TEMPLATEPATH . '/css/ta-dynamic-reshl.css', $output );
  return;
}


function ta_dynamic_freecss_create() {
  ob_start(); //バッファリング開始 ?>
@charset "UTF-8";

/******************************************************/
/*  このCSSファイルは自動的に生成されています。
/*  設定を変更すると上書きされますのでご注意ください。
/*
/*          de集まれ株式会社　技術支援(テックエイド)部
/******************************************************/

/******************************************************/
/*  フリーCSS
/******************************************************/
<?php
  if ( 'valid' == ta_read_op( 'ta_common_freecss_onoff' ) ) { ?>
/***** フリーCSS */
<?php
    echo ta_eschtml2html( ta_read_op( 'ta_common_freecss_code' ) );
  }
  if ( 'valid' == ta_read_op( 'ta_responsible_freecss_onoff' ) ) { ?>


/***** レスポンシブデザインフリーCSS */
@media only screen and (max-width : <?php echo ta_read_op( 'ta_responsible_base_switch_width' ); ?>px){
<?php
    echo ta_eschtml2html( ta_read_op( 'ta_responsible_freecss_code' ) ); ?>

}
<?php
  }

  $output = ob_get_contents();  //データを取得
  ob_end_clean();               //データをクリア
  file_put_contents( TEMPLATEPATH . '/css/ta-dynamic-freecss.css', $output );
  return;
}

function ta_dynamic_maintecss_create() {
  ob_start(); //バッファリング開始 ?>
@charset "utf-8";

/******************************************************/
/*  このCSSファイルは自動的に生成されています。
/*  設定を変更すると上書きされますのでご注意ください。
/*
/*          de集まれ株式会社　技術支援(テックエイド)部
/******************************************************/

/******************************************************/
/*  TAフォーマット・PHP to CSS・メンテナンス
/******************************************************/

/******************* メンテナンス *******************/
<?php
  $ta_common_mainte_mode_color = ta_select_color_w_image_color( 'ta_common_mainte_mode_color' );
  $ta_common_mainte_font_color = ta_select_color_w_image_color( 'ta_common_mainte_font_color' );
  $ta_common_mainte_font_anchor_color = ta_select_color_w_image_color( 'ta_common_mainte_font_anchor_color' );
  $ta_common_mainte_font_anchor_under = ( 'valid' == ta_read_op( 'ta_common_mainte_font_anchor_under' ) ) ? 'underline' : 'none';
  $ta_common_mainte_font_anchor_colorhover = ta_select_color_w_image_color( 'ta_common_mainte_font_anchor_colorhover' );
  $ta_common_mainte_font_anchor_underhover = ( 'valid' == ta_read_op( 'ta_common_mainte_font_anchor_underhover' ) ) ? 'underline' : 'none'; ?>
/******************* リセット *******************/
html, body, div, span, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, abbr, address, cite, code, del, dfn, em, img, ins, kbd, q, samp, small, strong, sub, sup, var, b, i, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, figcaption, figure, footer, header, hgroup, menu, nav, section, summary, time, mark, audio, video {
  margin: 0;
  padding: 0;
  border: 0;
  outline: 0;
  font-size: 100%;
  vertical-align: baseline;
  background: transparent;
}

address, article, aside, figure, figcaption, footer, header, hgroup, hr, legend, menu, nav, section, summary {
  display: block;
}

ul, ol {
  list-style-type: none;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
}

a img {
  border: none;
}

img {
  vertical-align: top;
}

mark {
  background: none;
}

input {
  opacity: 1;
}

body {
  color: <?php echo $ta_common_mainte_font_color; ?>;
  background-color: <?php echo $ta_common_mainte_mode_color; ?>;
  font-family: "メイリオ", "ＭＳ Ｐゴシック", Osaka, "ヒラギノ角ゴ Pro";
  font-size: 100%;
  line-height: 1.3em;
  margin: 0;
  padding: 0;
}

a {
  color: <?php echo $ta_common_mainte_font_anchor_color; ?>;
  text-decoration: <?php echo $ta_common_mainte_font_anchor_under; ?>;
}

a:hover {
  color: <?php echo $ta_common_mainte_font_anchor_colorhover; ?>;
  text-decoration: <?php echo $ta_common_mainte_font_anchor_underhover; ?>;
}

h1 {
  padding-top: 100px;
  font-size: 150%;
  text-align: center;
}

h3 {
  margin-top: 50px;
  font-size: 125%;
  text-align: center;
}

p {
  font-size: 100%;
  text-align: center;
  margin: 1em 0 1em;
  padding: 1em 0 1em;
}

#copyright {
  text-align: center;
}

@media only screen and (max-width : 640px){
  /******* 共通 *******/
  html {
    overflow-y: scroll;
    overflow-x: hidden;
  }
  html,
  body {
    width: 96%;
    padding: 0 2%;
    font-size: 85%;
    -webkit-text-size-adjust: 100%;
    -ms-text-size-adjust: 100%;
  }
  
  body * {
    text-align: center!important;
  }
  
}


<?php
  $output = ob_get_contents();  //データを取得
  ob_end_clean();               //データをクリア
  file_put_contents( TEMPLATEPATH . '/css/ta-dynamic-mainte.css', $output );
  return;
}
