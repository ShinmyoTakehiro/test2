<?php
/****************************************************************************************************/
/*
/* テックエイドの成長する自作ホームページWordPressテーマ『 TAテーマ001 (ta-theme001) 』
/*
/* ta-css-functions.php: ( Latest Version 2.05 2017.04.15 )
/*
/* このプログラムの著作権、使用権、その他全ての権利はde集まれ株式会社に属します。
/* The copyright, royalty and all the other rights of this program belong to deatsumare Corporation.
/*
/* File Version 履歴
/* File Version 2.00 2016.02.28: first edition by Kotaro Kashiwamura.
/* File Version 2.01 2016.03.30: ヘッドラインに文字下線追加
/*                               ダイジェストデザイン記事境界線内の背景色追加 by Kotaro Kashiwamura.
/* File Version 2.02 2016.06.20: ヘッドラインのタイトル前方装飾画像位置調整追加
/*                               ta_responsive_headline_style_w_php追加 by Kotaro Kashiwamura.
/* File Version 2.03 2016.08.26: ta_headline_style_w_php, ta_responsive_headline_style_w_php修正
/*                               ta_paragraph_style追加、ダイジェストに抜粋文字装飾追加 by Kotaro Kashiwamura.
/* File Version 2.04 2017.03.06: 体裁調整、ta_gradient_color_style追加、色選択修正 by Kotaro Kashiwamura.
/* File Version 2.05 2017.04.15: ta_headline_style_w_php, ta_responsive_headline_style_w_php修正 by Kotaro Kashiwamura.
/*
/****************************************************************************************************/

/***** グラデーション関するスタイル */
function ta_gradient_color_style( $keyname, $imgurl1 = 'no_image', $imgurl2 = 'no_image' ) {
  $direct = ta_read_op( $keyname . '_grd_direct' );
  $start_color = ta_select_color_w_image_color( $keyname . '_grd_start_color' );
  $mid_onoff = ta_read_op( $keyname . '_grd_mid_color_onoff' );
  $mid_pos = ta_read_op( $keyname . '_grd_mid_color_pos' );
  if ( $mid_pos < 0 ) { $mid_pos = 0; } else if ( $mid_pos > 100 ) { $mid_pos = 100; }
  $mid_color = ta_select_color_w_image_color( $keyname . '_grd_mid_color' );
  if ( 'valid' == $mid_onoff ) { $mid_info = $mid_color . ' ' . $mid_pos . '%, '; } else { $mid_info = ''; }
  $stop_color = ta_select_color_w_image_color( $keyname . '_grd_stop_color' );
  switch ( $direct ) {
    case 'bottom':
      $new_direct = 'top';
      $direct_num = 0;
      $new_start_color = $start_color;
      $new_stop_color = $stop_color;
      break;
    case 'top':
      $new_direct = 'bottom';
      $direct_num = 0;
      $new_start_color = $stop_color;
      $new_stop_color = $start_color;
      break;
    case 'right':
      $new_direct = 'left';
      $direct_num = 1;
      $new_start_color = $start_color;
      $new_stop_color = $stop_color;
      break;
    case 'left':
      $new_direct = 'right';
      $direct_num = 1;
      $new_start_color = $stop_color;
      $new_stop_color = $start_color;
      break;
    default:
      $new_direct = 'top';
      $direct_num = 0;
      $new_start_color = $start_color;
      $new_stop_color = $stop_color;
  }
  if ( 'no_image' != $imgurl1 && 'no_image' == $imgurl2 ) { ?>
  background-image: url("<?php echo $imgurl1; ?>");
  background: url("<?php echo $imgurl1; ?>"), -ms-linear-gradient(<?php echo $new_direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%);
  background: url("<?php echo $imgurl1; ?>"), -o-linear-gradient(<?php echo $new_direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%);
  background: url("<?php echo $imgurl1; ?>"), -moz-linear-gradient(<?php echo $new_direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%);
  background: url("<?php echo $imgurl1; ?>"), -webkit-linear-gradient(<?php echo $new_direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%);
  background: url("<?php echo $imgurl1; ?>"), linear-gradient(to <?php echo $direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%);
<?php
  } else if ( 'no_image' == $imgurl1 && 'no_image' != $imgurl2 ) { ?>
  background-image: url("<?php echo $imgurl2; ?>");
  background: url("<?php echo $imgurl2; ?>"), -ms-linear-gradient(<?php echo $new_direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%);
  background: url("<?php echo $imgurl2; ?>"), -o-linear-gradient(<?php echo $new_direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%);
  background: url("<?php echo $imgurl2; ?>"), -moz-linear-gradient(<?php echo $new_direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%);
  background: url("<?php echo $imgurl2; ?>"), -webkit-linear-gradient(<?php echo $new_direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%);
  background: url("<?php echo $imgurl2; ?>"), linear-gradient(to <?php echo $direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%);
<?php
  } else if ( 'no_image' != $imgurl1 && 'no_image' != $imgurl2 ) { ?>
  background-image: url("<?php echo $imgurl1; ?>"), url("<?php echo $imgurl2; ?>");
  background: url("<?php echo $imgurl1; ?>"), url("<?php echo $imgurl2; ?>"), -ms-linear-gradient(<?php echo $new_direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%);
  background: url("<?php echo $imgurl1; ?>"), url("<?php echo $imgurl2; ?>"), -o-linear-gradient(<?php echo $new_direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%);
  background: url("<?php echo $imgurl1; ?>"), url("<?php echo $imgurl2; ?>"), -moz-linear-gradient(<?php echo $new_direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%);
  background: url("<?php echo $imgurl1; ?>"), url("<?php echo $imgurl2; ?>"), -webkit-linear-gradient(<?php echo $new_direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%);
  background: url("<?php echo $imgurl1; ?>"), url("<?php echo $imgurl2; ?>"), linear-gradient(to <?php echo $direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%);
<?php
  } else { ?>
  filter: progid:DXImageTransform.Microsoft.Gradient(GradientType=<?php echo $direct_num; ?>, StartColorStr='<?php echo $new_start_color; ?>', EndColorStr='<?php echo $new_stop_color; ?>');
  background: -ms-linear-gradient(<?php echo $new_direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%);
  background: -o-linear-gradient(<?php echo $new_direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%);
  background: -moz-linear-gradient(<?php echo $new_direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%);
  background: -webkit-linear-gradient(<?php echo $new_direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%);
  background: linear-gradient(to <?php echo $direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%);
<?php
  }
}


/***** グラデーション関するスタイル(レスポンシブ用) */
function ta_responsible_gradient_color_style( $keyname, $imgurl = 'no_image' ) {
  $direct = ta_read_op( $keyname . '_grd_direct' );
  $start_color = ta_select_color_w_image_color( $keyname . '_grd_start_color' );
  $mid_onoff = ta_read_op( $keyname . '_grd_mid_color_onoff' );
  $mid_pos = ta_read_op( $keyname . '_grd_mid_color_pos' );
  if ( $mid_pos < 0 ) { $mid_pos = 0; } else if ( $mid_pos > 100 ) { $mid_pos = 100; }
  $mid_color = ta_select_color_w_image_color( $keyname . '_grd_mid_color' );
  if ( 'valid' == $mid_onoff ) { $mid_info = $mid_color . ' ' . $mid_pos . '%, '; } else { $mid_info = ''; }
  $stop_color = ta_select_color_w_image_color( $keyname . '_grd_stop_color' );
  switch ( $direct ) {
    case 'bottom':
      $new_direct = 'top';
      $direct_num = 0;
      $new_start_color = $start_color;
      $new_stop_color = $stop_color;
      break;
    case 'top':
      $new_direct = 'bottom';
      $direct_num = 0;
      $new_start_color = $stop_color;
      $new_stop_color = $start_color;
      break;
    case 'right':
      $new_direct = 'left';
      $direct_num = 1;
      $new_start_color = $start_color;
      $new_stop_color = $stop_color;
      break;
    case 'left':
      $new_direct = 'right';
      $direct_num = 1;
      $new_start_color = $stop_color;
      $new_stop_color = $start_color;
      break;
    default:
      $new_direct = 'top';
      $direct_num = 0;
      $new_start_color = $start_color;
      $new_stop_color = $stop_color;
  }
  if ( 'no_image' != $imgurl ) { ?>
  background-image: url("<?php echo $imgurl; ?>")!important;
  background: url("<?php echo $imgurl; ?>"), -ms-linear-gradient(<?php echo $new_direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%)!important;
  background: url("<?php echo $imgurl; ?>"), -o-linear-gradient(<?php echo $new_direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%)!important;
  background: url("<?php echo $imgurl; ?>"), -moz-linear-gradient(<?php echo $new_direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%)!important;
  background: url("<?php echo $imgurl; ?>"), -webkit-linear-gradient(<?php echo $new_direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%)!important;
  background: url("<?php echo $imgurl; ?>"), linear-gradient(to <?php echo $direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%)!important;
<?php
  } else { ?>
  filter: progid:DXImageTransform.Microsoft.Gradient(GradientType=<?php echo $direct_num; ?>, StartColorStr='<?php echo $new_start_color; ?>', EndColorStr='<?php echo $new_stop_color; ?>')!important;
  background: -ms-linear-gradient(<?php echo $new_direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%)!important;
  background: -o-linear-gradient(<?php echo $new_direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%)!important;
  background: -moz-linear-gradient(<?php echo $new_direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%)!important;
  background: -webkit-linear-gradient(<?php echo $new_direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%)!important;
  background: linear-gradient(to <?php echo $direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%)!important;
<?php
  }
}


/***** パラグラフに関するスタイル(PC) */
function ta_paragraph_style( $keyname, $place ) {
  $onlyfor_onoff = ta_read_op( $keyname . '_onlyfor_onoff' );
  if ( 'valid' == $onlyfor_onoff ) {
    $lineheight = ta_read_op( $keyname . '_p_lineheight' );
    $top = ta_read_op( $keyname . '_p_topmargin' );
    $bottom = ta_read_op( $keyname . '_p_bottommargin' );
    $left = ta_read_op( $keyname . '_p_leftmargin' );
    $right = ta_read_op( $keyname . '_p_rightmargin' );
  } else {
    $lineheight = ta_read_op( 'ta_common_font_p_lineheight' );
    $top = ta_read_op( 'ta_common_font_p_topmargin' );
    $bottom = ta_read_op( 'ta_common_font_p_bottommargin' );
    $left = ta_read_op( 'ta_common_font_p_leftmargin' );
    $right = ta_read_op( 'ta_common_font_p_rightmargin' );
  } ?>
<?php echo $place; ?> p {
  line-height: <?php echo $lineheight; ?>em;
  margin: <?php echo $top; ?>em <?php echo $right; ?>em <?php echo $bottom; ?>em <?php echo $left; ?>em;
}
<?php
}


/***** パラグラフに関するスタイル(レスポンシブ) */
function ta_responsive_paragraph_style( $keyname, $pc_keyname, $place ) {
  $onlyfor_onoff = ta_read_op( $keyname . '_onlyfor_onoff' );
  $pc_onlyfor_onoff = ta_read_op( $pc_keyname . '_onlyfor_onoff' );
  if ( 'valid' == $onlyfor_onoff ) {
    $lineheight = ta_read_op( $keyname . '_p_lineheight' );
    $top = ta_read_op( $keyname . '_p_topmargin' );
    $bottom = ta_read_op( $keyname . '_p_bottommargin' );
    $left = ta_read_op( $keyname . '_p_leftmargin' );
    $right = ta_read_op( $keyname . '_p_rightmargin' );
  } else {
    if ( 'valid' == $pc_onlyfor_onoff ) {
      $lineheight = ta_read_op( $pc_keyname . '_p_lineheight' );
      $top = ta_read_op( $pc_keyname . '_p_topmargin' );
      $bottom = ta_read_op( $pc_keyname . '_p_bottommargin' );
      $left = ta_read_op( $pc_keyname . '_p_leftmargin' );
      $right = ta_read_op( $pc_keyname . '_p_rightmargin' );
    } else {
      $lineheight = ta_read_op( 'ta_common_font_p_lineheight' );
      $top = ta_read_op( 'ta_common_font_p_topmargin' );
      $bottom = ta_read_op( 'ta_common_font_p_bottommargin' );
      $left = ta_read_op( 'ta_common_font_p_leftmargin' );
      $right = ta_read_op( 'ta_common_font_p_rightmargin' );
    }
  } ?>
<?php echo $place; ?> p {
  line-height: <?php echo $lineheight; ?>em!important;
  margin: <?php echo $top; ?>em <?php echo $right; ?>em <?php echo $bottom; ?>em <?php echo $left; ?>em!important;
}
<?php
}


/***** ダイジェストに関するスタイル */
function ta_digest_disp_style_w_php( $place ) {
  $id_prefix = ( 'top' == $place ) ? 'main' : $place;
  //***** 最新投稿ダイジェスト
  $latestposts_post_distance = ta_read_op( 'ta_' . $place . '_latestposts_post_distance' );
  $latestposts_post_border_type = ta_read_op( 'ta_' . $place . '_latestposts_post_border_type' );
  $latestposts_post_border_size = ta_read_op( 'ta_' . $place . '_latestposts_post_border_size' );
  $latestposts_post_border_color = ta_select_color_w_image_color( 'ta_' . $place . '_latestposts_post_border_color' );
  $latestposts_post_border_bgcolor = ta_select_color_w_image_color( 'ta_' . $place . '_latestposts_post_border_bgcolor' );
  $latestposts_post_border_kind = ta_read_op( 'ta_' . $place . '_latestposts_post_border_kind' );
  $latestposts_post_border_padding = ta_read_op( 'ta_' . $place . '_latestposts_post_border_padding' );
  $latestposts_row_num = ta_read_op( 'ta_' . $place . '_latestposts_row_num' );
  $latestposts_row_distance = ta_read_op( 'ta_' . $place . '_latestposts_row_distance' );
  $latestposts_timecat = ta_read_op( 'ta_' . $place . '_latestposts_timecat' );
  $latestposts_time_onoff = ta_read_op( 'ta_' . $place . '_latestposts_time_onoff' );
  $latestposts_time_color = ta_select_color_w_image_color( 'ta_' . $place . '_latestposts_time_color' );
  $latestposts_time_size = ta_read_op( 'ta_' . $place . '_latestposts_time_size' );
  $latestposts_time_weight = ta_read_op( 'ta_' . $place . '_latestposts_time_weight' );
  $latestposts_watchmark_onoff = ta_read_op( 'ta_' . $place . '_latestposts_watchmark_onoff' );
  $latestposts_cat_onoff = ta_read_op( 'ta_' . $place . '_latestposts_cat_onoff' );
  $latestposts_cat_size = ta_read_op( 'ta_' . $place . '_latestposts_cat_size' );
  $latestposts_cat_weight = ta_read_op( 'ta_' . $place . '_latestposts_cat_weight' );
  $latestposts_cat_width = ta_read_op( 'ta_' . $place . '_latestposts_cat_width' );
  $latestposts_cat_height = ta_read_op( 'ta_' . $place . '_latestposts_cat_height' );
  $latestposts_cat_round = ta_read_op( 'ta_' . $place . '_latestposts_cat_round' );
  $latestposts_img_name = ta_read_op( 'ta_' . $place . '_latestposts_img_size' );
  $latestposts_img_size = explode( 'ta_square_image', $latestposts_img_name );
  $latestposts_img_pos = ta_read_op( 'ta_' . $place . '_latestposts_img_pos' );
  $latestposts_img_padding = ta_read_op( 'ta_' . $place . '_latestposts_img_padding' );
  $latestposts_excerpt_minheight = ta_read_op( 'ta_' . $place . '_latestposts_excerpt_minheight' );
  $latestposts_excerpt_tpadding = ta_read_op( 'ta_' . $place . '_latestposts_excerpt_tpadding' );
  $latestposts_excerpt_bpadding = ta_read_op( 'ta_' . $place . '_latestposts_excerpt_bpadding' );
  $latestposts_excerpt_onlyfor_onoff = ta_read_op( 'ta_' . $place . '_latestposts_excerpt_onlyfor_onoff' );
  $latestposts_excerpt_size = ta_read_op( 'ta_' . $place . '_latestposts_excerpt_size' );
  $latestposts_excerpt_weight = ta_read_op( 'ta_' . $place . '_latestposts_excerpt_weight' );
  $latestposts_excerpt_lineheight = ta_read_op( 'ta_' . $place . '_latestposts_excerpt_lineheight' );
  $latestposts_excerpt_anchor_color = ta_select_color_w_image_color( 'ta_' . $place . '_latestposts_excerpt_anchor_color' );
  $latestposts_excerpt_anchor_under = ( 'valid' == ta_read_op( 'ta_' . $place . '_latestposts_excerpt_anchor_under' ) ) ? 'underline' : 'none';
  $latestposts_excerpt_anchor_colorhover = ta_select_color_w_image_color( 'ta_' . $place . '_latestposts_excerpt_anchor_colorhover' );
  $latestposts_excerpt_anchor_underhover = ( 'valid' == ta_read_op( 'ta_' . $place . '_latestposts_excerpt_anchor_underhover' ) ) ? 'underline' : 'none';
  $latestposts_release_mark_onoff = ta_read_op( 'ta_' . $place . '_latestposts_release_mark_onoff' );
  $latestposts_release_mark_padding = ta_read_op( 'ta_' . $place . '_latestposts_release_mark_padding' );
  $latestposts_release_mark_text_color = ta_select_color_w_image_color( 'ta_' . $place . '_latestposts_release_mark_text_color' );
  $latestposts_release_mark_text_weight = ta_read_op( 'ta_' . $place . '_latestposts_release_mark_text_weight' );
  $latestposts_release_mark_text_bgcolor = ta_select_color_w_image_color( 'ta_' . $place . '_latestposts_release_mark_text_bgcolor' );
  $latestposts_release_mark_text_round = ta_read_op( 'ta_' . $place . '_latestposts_release_mark_text_round' );
  //サイトイメージカラー
  $ta_common_site_bg_color = ta_read_op( 'ta_common_site_bg_color' );
  $ta_common_site_hl_color = ta_read_op( 'ta_common_site_hl_color' );
  $ta_common_site_text_on_bg_color = ta_read_op( 'ta_common_site_text_on_bg_color' );
  $ta_common_site_text_on_hl_color = ta_read_op( 'ta_common_site_text_on_hl_color' );
  //対象テキストカラー
  $color_place = ( 'top' == $place ) ? 'main' : $place;
  $font_color_select = ta_read_op( 'ta_' . $color_place . '_font_color_select' );
  $font_color = ta_read_op( 'ta_' . $color_place . '_font_color' );
  if ( 'common_site_bg' == $font_color_select ) { $font_color = $ta_common_site_bg_color; }
  else if ( 'common_site_hl' == $font_color_select ) { $font_color = $ta_common_site_hl_color; }
  else if ( 'common_site_text_on_bg' == $font_color_select ) { $font_color = $ta_common_site_text_on_bg_color; }
  else if ( 'common_site_text_on_hl' == $font_color_select ) { $font_color = $ta_common_site_text_on_hl_color; }
  //右側続き誘導マーク
  $latestposts_rightmark = ta_read_op( 'ta_' . $place . '_latestposts_excerpt_rightmark' );
  $latestposts_rightmark_color = ta_select_color_w_image_color( 'ta_' . $place . '_latestposts_excerpt_rightmark_color' );
  $latestposts_rightmark_size = ta_read_op( 'ta_' . $place . '_latestposts_excerpt_rightmark_size' );
  $latestposts_rightmark_weight = ta_read_op( 'ta_' . $place . '_latestposts_excerpt_rightmark_weight' );
  $latestposts_rightmark_width = ta_read_op( 'ta_' . $place . '_latestposts_excerpt_rightmark_width' );
  $latestposts_rightmark_opacity = ta_read_op( 'ta_' . $place . '_latestposts_excerpt_rightmark_opacity' );
  $latestposts_rightmark_opacityhover = ta_read_op( 'ta_' . $place . '_latestposts_excerpt_rightmark_opacityhover' );
  //下側続き誘導マーク
  $latestposts_lowermark = ta_read_op( 'ta_' . $place . '_latestposts_excerpt_lowermark' );
  $latestposts_lowermark_title_underline = ( 'valid' == ta_read_op( 'ta_' . $place . '_latestposts_excerpt_lowermark_title_underline_onoff' ) ) ? 'underline' : 'none';
  $latestposts_lowermark_title_hoverunderline = ( 'valid' == ta_read_op( 'ta_' . $place . '_latestposts_excerpt_lowermark_title_hoverunderline_onoff' ) ) ? 'underline' : 'none';
  $latestposts_lowermark_title_size = ta_read_op( 'ta_' . $place . '_latestposts_excerpt_lowermark_title_size' );
  $latestposts_lowermark_title_weight = ta_read_op( 'ta_' . $place . '_latestposts_excerpt_lowermark_title_weight' );
  $latestposts_lowermark_title_color = ta_select_color_w_image_color( 'ta_' . $place . '_latestposts_excerpt_lowermark_title_color' );
  $latestposts_lowermark_title_colorhover = ta_select_color_w_image_color( 'ta_' . $place . '_latestposts_excerpt_lowermark_title_colorhover' );
  $latestposts_lowermark_bgcolor = ta_select_color_w_image_color( 'ta_' . $place . '_latestposts_excerpt_lowermark_bgcolor' );
  $latestposts_lowermark_bgcolorhover = ta_select_color_w_image_color( 'ta_' . $place . '_latestposts_excerpt_lowermark_bgcolorhover' );
  $latestposts_lowermark_height = ta_read_op( 'ta_' . $place . '_latestposts_excerpt_lowermark_height' );
  $latestposts_lowermark_minwidth = ta_read_op( 'ta_' . $place . '_latestposts_excerpt_lowermark_minwidth' );
  $latestposts_lowermark_round = ta_read_op( 'ta_' . $place . '_latestposts_excerpt_lowermark_round' );
  $latestposts_lowermark_paddingtop = ta_read_op( 'ta_' . $place . '_latestposts_excerpt_lowermark_paddingtop' ); ?>
/***** 最新投稿ダイジェストに関する可変スタイル */
#<?php echo $id_prefix; ?>-whatsnew .info-contents-group {
  width: 100%;
  display: inline-block;
  vertical-align: bottom;
}

#<?php echo $id_prefix; ?>-whatsnew .info-contents-group .info-contents {
  margin-bottom: <?php echo $latestposts_post_distance; ?>px;
  float: left;
  box-sizing: border-box;
  background-color: <?php echo $latestposts_post_border_bgcolor; ?>;
  width : <?php echo floor( ( 100 - $latestposts_row_distance * ( $latestposts_row_num - 1 ) ) / $latestposts_row_num ); ?>%;
  margin-right: <?php echo $latestposts_row_distance; ?>%;
<?php
  if ( 'b' == $latestposts_post_border_type ) { ?>
  padding-bottom: <?php echo $latestposts_post_border_padding; ?>px;
  border-bottom: <?php echo $latestposts_post_border_size; ?>px <?php echo $latestposts_post_border_kind; ?> <?php echo $latestposts_post_border_color; ?>;
<?php
  } else if ( 'l-b' == $latestposts_post_border_type ) { ?>
  padding-left: <?php echo $latestposts_post_border_padding; ?>px;
  padding-bottom: <?php echo $latestposts_post_border_padding; ?>px;
  border-left: <?php echo $latestposts_post_border_size; ?>px <?php echo $latestposts_post_border_kind; ?> <?php echo $latestposts_post_border_color; ?>;
  border-bottom: <?php echo $latestposts_post_border_size; ?>px <?php echo $latestposts_post_border_kind; ?> <?php echo $latestposts_post_border_color; ?>;
<?php
  } else if ( 'r-b' == $latestposts_post_border_type ) { ?>
  padding-right: <?php echo $latestposts_post_border_padding; ?>px;
  padding-bottom: <?php echo $latestposts_post_border_padding; ?>px;
  border-right: <?php echo $latestposts_post_border_size; ?>px <?php echo $latestposts_post_border_kind; ?> <?php echo $latestposts_post_border_color; ?>;
  border-bottom: <?php echo $latestposts_post_border_size; ?>px <?php echo $latestposts_post_border_kind; ?> <?php echo $latestposts_post_border_color; ?>;
<?php
  } else if ( 'square' == $latestposts_post_border_type ) { ?>
  padding: <?php echo $latestposts_post_border_padding; ?>px;
  border: <?php echo $latestposts_post_border_size; ?>px <?php echo $latestposts_post_border_kind; ?> <?php echo $latestposts_post_border_color; ?>;
<?php
  } ?>
}

#<?php echo $id_prefix; ?>-whatsnew .info-contents-group .info-contents-edge {
  margin-right: 0;
}

#<?php echo $id_prefix; ?>-whatsnew .info-contents-timecat {
  width: 100%;
  display: inline-block;
  vertical-align: bottom;
}

<?php
  if ( 'time-cat' == $latestposts_timecat ) { ?>
#<?php echo $id_prefix; ?>-whatsnew .info-contents-timecat .info-contents-time {
  float: left;
  color: <?php echo $latestposts_time_color; ?>;
  font-size: <?php echo $latestposts_time_size; ?>%;
  font-weight: <?php echo $latestposts_time_weight; ?>;
<?php
    if ( 'invalid' == $latestposts_time_onoff ) { ?>
  display: none;
<?php
    } ?>
}

#<?php echo $id_prefix; ?>-whatsnew .info-contents-timecat .info-contents-cat {
  float: right;
  font-size: <?php echo $latestposts_cat_size; ?>%;
  font-weight: <?php echo $latestposts_cat_weight; ?>;
  min-width: <?php echo $latestposts_cat_width; ?>em;
  text-align: center;
  line-height: <?php echo $latestposts_cat_height; ?>em;
  height: <?php echo $latestposts_cat_height; ?>em;
  border-radius: <?php echo $latestposts_cat_round; ?>px;
<?php
    if ( 'invalid' == $latestposts_cat_onoff ) { ?>
  display: none;
<?php
    } ?>
}

<?php
  } else { ?>
#<?php echo $id_prefix; ?>-whatsnew .info-contents-timecat .info-contents-time {
  float: right;
  color: <?php echo $latestposts_time_color; ?>;
  font-size: <?php echo $latestposts_time_size; ?>%;
  font-weight: <?php echo $latestposts_time_weight; ?>;
<?php
    if ( 'invalid' == $latestposts_time_onoff ) { ?>
  display: none;
<?php
    } ?>
}

#<?php echo $id_prefix; ?>-whatsnew .info-contents-timecat .info-contents-cat {
  float: left;
  font-size: <?php echo $latestposts_cat_size; ?>%;
  font-weight: <?php echo $latestposts_cat_weight; ?>;
  min-width: <?php echo $latestposts_cat_width; ?>em;
  text-align: center;
  line-height: <?php echo $latestposts_cat_height; ?>em;
  height: <?php echo $latestposts_cat_height; ?>em;
  border-radius: <?php echo $latestposts_cat_round; ?>px;
<?php
    if ( 'invalid' == $latestposts_cat_onoff ) { ?>
  display: none;
<?php
    } ?>
}

<?php
  }

  if ( 'valid' == $latestposts_watchmark_onoff ) { ?>
#<?php echo $id_prefix; ?>-whatsnew .info-contents-timecat .info-contents-time::before {
  content: "\f469";
  background-color: transparent;
  color: <?php echo $latestposts_time_color; ?>;
  font-family: dashicons;
  font-size: <?php echo $latestposts_time_size; ?>%;
  font-weight: <?php echo $latestposts_time_weight; ?>;
  margin-right: 0.3em;
  padding: 0 0;
}

<?php
  }
  
  if ( 'valid' == $latestposts_release_mark_onoff ) { ?>
#<?php echo $id_prefix; ?>-whatsnew .ta-<?php echo $place; ?>-latestposts-release-mark {
  height: 1.3em;
  width: auto;
  padding: 0 <?php echo $latestposts_release_mark_padding; ?>px 0 0;
}

#<?php echo $id_prefix; ?>-whatsnew .ta-<?php echo $place; ?>-latestposts-release-text {
  color: <?php echo $latestposts_release_mark_text_color; ?>;
  background-color: <?php echo $latestposts_release_mark_text_bgcolor; ?>;
  border-radius: <?php echo $latestposts_release_mark_text_round; ?>px;
  font-size: 74%;
  font-weight: <?php echo $latestposts_release_mark_text_weight; ?>;
  padding: 1px 5px;
  vertical-align: middle;
  margin: 0 <?php echo $latestposts_release_mark_padding; ?>px 0 0;
}

<?php
  } ?>
#<?php echo $id_prefix; ?>-whatsnew .info-contents-thmimg-excerpt {
  display: inline-block;
  vertical-align: bottom;
  width: 100%;
}

#<?php echo $id_prefix; ?>-whatsnew .info-contents-thmimg-excerpt .info-contents-thmimg {
  float: <?php echo $latestposts_img_pos; ?>;
<?php
  if ( 'left' == $latestposts_img_pos ) { ?>
  padding-right: <?php echo $latestposts_img_padding; ?>px;
<?php
  } else { ?>
  padding-left: <?php echo $latestposts_img_padding; ?>px;
<?php
  }
  if ( 'none' != $latestposts_img_name ) { ?>
  height: <?php echo $latestposts_img_size[1]; ?>px;
  width: <?php echo $latestposts_img_size[1]; ?>px;
<?php
  } else { ?>
  display: none;
<?php
  } ?>
}

#<?php echo $id_prefix; ?>-whatsnew .info-contents-thmimg-excerpt .info-contents-excerpt {
<?php
  if ( 'left' == $latestposts_img_pos ) { ?>
  float: right;
<?php
  } else { ?>
  float: left;
<?php
  } ?>
}

<?php
  if ( 'none' != $latestposts_img_name ) { ?>
#<?php echo $id_prefix; ?>-whatsnew .info-contents-thmimg-excerpt .info-contents-excerpt .digest-excerpt-withimage {
  min-height: <?php echo $latestposts_excerpt_minheight; ?>px;
}

<?php
  } ?>
#<?php echo $id_prefix; ?>-whatsnew .info-contents-thmimg-excerpt .info-contents-excerpt p {
  margin: 0!important;
  padding: <?php echo $latestposts_excerpt_tpadding; ?>em 0 <?php echo $latestposts_excerpt_bpadding; ?>em;
<?php
  if ( 'none' != $latestposts_rightmark ) { ?>
  width: <?php echo ( 100 - $latestposts_rightmark_width ); ?>%;
<?php
  }
  if ( 'valid' == $latestposts_excerpt_onlyfor_onoff ) { ?>
  font-size: <?php echo $latestposts_excerpt_size; ?>%!important;
  font-weight: <?php echo $latestposts_excerpt_weight; ?>!important;
  line-height: <?php echo $latestposts_excerpt_lineheight; ?>em!important;
<?php
  } ?>
}

<?php
  if ( 'valid' == $latestposts_excerpt_onlyfor_onoff ) { ?>
#<?php echo $id_prefix; ?>-whatsnew .info-contents .info-contents-thmimg-excerpt .info-contents-excerpt .digest-excerpt a {
  color: <?php echo $latestposts_excerpt_anchor_color; ?>;
  text-decoration: <?php echo $latestposts_excerpt_anchor_under; ?>;
}

#<?php echo $id_prefix; ?>-whatsnew .info-contents .info-contents-thmimg-excerpt .info-contents-excerpt .digest-excerpt a:hover {
  color: <?php echo $latestposts_excerpt_anchor_colorhover; ?>;
  text-decoration: <?php echo $latestposts_excerpt_anchor_underhover; ?>;
}
<?php
  } ?>

#<?php echo $id_prefix; ?>-whatsnew .info-contents-thmimg-excerpt .info-contents-excerpt .digest-excerpt {
  position: relative;
}

#<?php echo $id_prefix; ?>-whatsnew .info-contents-thmimg-excerpt .info-contents-excerpt .digest-excerpt a {
  text-decoration: none;
  color: <?php echo $font_color; ?>;
}

<?php
  if ( 'none' != $latestposts_rightmark ) { ?>
#<?php echo $id_prefix; ?>-whatsnew .info-contents-thmimg-excerpt .info-contents-excerpt p::after {
  display: inline-block;
  width: <?php echo $latestposts_rightmark_width; ?>%;
  text-align: center;
  position: absolute;
  top: 40%;
  right: 0;
  content: '\<?php echo $latestposts_rightmark; ?>';
  color: <?php echo $latestposts_rightmark_color; ?>;
  font-weight: <?php echo $latestposts_rightmark_weight; ?>;
  font-size: <?php echo $latestposts_rightmark_size; ?>%;
  font-family: dashicons;
  opacity: <?php echo $latestposts_rightmark_opacity; ?>;
}

#<?php echo $id_prefix; ?>-whatsnew .info-contents-thmimg-excerpt .info-contents-excerpt a:hover p::after {
  opacity: <?php echo $latestposts_rightmark_opacityhover; ?>;
}

<?php
  }
  if ( 'none' != $latestposts_lowermark ) { ?>
#<?php echo $id_prefix; ?>-whatsnew .info-contents-thmimg-excerpt .info-contents-excerpt .excerpt-lowermark-container {
  display: inline-block;
  vertical-align: bottom;
  width: 100%;
  padding-top: <?php echo $latestposts_lowermark_paddingtop; ?>px;
}

#<?php echo $id_prefix; ?>-whatsnew .info-contents-thmimg-excerpt .info-contents-excerpt .excerpt-lowermark-container .excerpt-lowermark {
  display: block;
  float: <?php echo $latestposts_lowermark; ?>;
  text-align: center;
  text-decoration: <?php echo $latestposts_lowermark_title_underline; ?>;
  color: <?php echo $latestposts_lowermark_title_color; ?>;
  background-color: <?php echo $latestposts_lowermark_bgcolor; ?>;
  font-weight: <?php echo $latestposts_lowermark_title_weight; ?>;
  height: <?php echo $latestposts_lowermark_height; ?>em;
  line-height: <?php echo $latestposts_lowermark_height; ?>em;
  font-size: <?php echo $latestposts_lowermark_title_size; ?>%;
  min-width: <?php echo $latestposts_lowermark_minwidth; ?>em;
  border-radius: <?php echo $latestposts_lowermark_round; ?>px;
}

#<?php echo $id_prefix; ?>-whatsnew .info-contents-thmimg-excerpt .info-contents-excerpt a:hover .excerpt-lowermark-container .excerpt-lowermark {
  background-color: <?php echo $latestposts_lowermark_bgcolorhover; ?>;
  color: <?php echo $latestposts_lowermark_title_colorhover; ?>;
  text-decoration: <?php echo $latestposts_lowermark_title_hoverunderline; ?>;
}

<?php
  } ?>
#<?php echo $id_prefix; ?>-whatsnew .info-contents-fullimg {
  width: 100%;
  text-align: center;
}

#<?php echo $id_prefix; ?>-whatsnew .info-contents-fullimg img {
  width: 100%;
  height: auto;
  display: block;
}

<?php
  //***** 各種投稿ダイジェスト
  $postdigest_post_distance = ta_read_op( 'ta_' . $place . '_postdigest_post_distance' );
  $postdigest_post_border_type = ta_read_op( 'ta_' . $place . '_postdigest_post_border_type' );
  $postdigest_post_border_size = ta_read_op( 'ta_' . $place . '_postdigest_post_border_size' );
  $postdigest_post_border_color = ta_select_color_w_image_color( 'ta_' . $place . '_postdigest_post_border_color' );
  $postdigest_post_border_bgcolor = ta_select_color_w_image_color( 'ta_' . $place . '_postdigest_post_border_bgcolor' );
  $postdigest_post_border_kind = ta_read_op( 'ta_' . $place . '_postdigest_post_border_kind' );
  $postdigest_post_border_padding = ta_read_op( 'ta_' . $place . '_postdigest_post_border_padding' );
  $postdigest_row_num = ta_read_op( 'ta_' . $place . '_postdigest_row_num' );
  $postdigest_row_distance = ta_read_op( 'ta_' . $place . '_postdigest_row_distance' );
  $postdigest_timecat = ta_read_op( 'ta_' . $place . '_postdigest_timecat' );
  $postdigest_time_onoff = ta_read_op( 'ta_' . $place . '_postdigest_time_onoff' );
  $postdigest_time_color = ta_select_color_w_image_color( 'ta_' . $place . '_postdigest_time_color' );
  $postdigest_time_size = ta_read_op( 'ta_' . $place . '_postdigest_time_size' );
  $postdigest_time_weight = ta_read_op( 'ta_' . $place . '_postdigest_time_weight' );
  $postdigest_watchmark_onoff = ta_read_op( 'ta_' . $place . '_postdigest_watchmark_onoff' );
  $postdigest_cat_onoff = ta_read_op( 'ta_' . $place . '_postdigest_cat_onoff' );
  $postdigest_cat_size = ta_read_op( 'ta_' . $place . '_postdigest_cat_size' );
  $postdigest_cat_weight = ta_read_op( 'ta_' . $place . '_postdigest_cat_weight' );
  $postdigest_cat_width = ta_read_op( 'ta_' . $place . '_postdigest_cat_width' );
  $postdigest_cat_height = ta_read_op( 'ta_' . $place . '_postdigest_cat_height' );
  $postdigest_cat_round = ta_read_op( 'ta_' . $place . '_postdigest_cat_round' );
  $postdigest_img_name = ta_read_op( 'ta_' . $place . '_postdigest_img_size' );
  $postdigest_img_size = explode( 'ta_square_image', $postdigest_img_name );
  $postdigest_img_pos = ta_read_op( 'ta_' . $place . '_postdigest_img_pos' );
  $postdigest_img_padding = ta_read_op( 'ta_' . $place . '_postdigest_img_padding' );
  $postdigest_excerpt_minheight = ta_read_op( 'ta_' . $place . '_postdigest_excerpt_minheight' );
  $postdigest_excerpt_tpadding = ta_read_op( 'ta_' . $place . '_postdigest_excerpt_tpadding' );
  $postdigest_excerpt_bpadding = ta_read_op( 'ta_' . $place . '_postdigest_excerpt_bpadding' );
  $postdigest_excerpt_onlyfor_onoff = ta_read_op( 'ta_' . $place . '_postdigest_excerpt_onlyfor_onoff' );
  $postdigest_excerpt_size = ta_read_op( 'ta_' . $place . '_postdigest_excerpt_size' );
  $postdigest_excerpt_weight = ta_read_op( 'ta_' . $place . '_postdigest_excerpt_weight' );
  $postdigest_excerpt_lineheight = ta_read_op( 'ta_' . $place . '_postdigest_excerpt_lineheight' );
  $postdigest_excerpt_anchor_color = ta_select_color_w_image_color( 'ta_' . $place . '_postdigest_excerpt_anchor_color' );
  $postdigest_excerpt_anchor_under = ( 'valid' == ta_read_op( 'ta_' . $place . '_postdigest_excerpt_anchor_under' ) ) ? 'underline' : 'none';
  $postdigest_excerpt_anchor_colorhover = ta_select_color_w_image_color( 'ta_' . $place . '_postdigest_excerpt_anchor_colorhover' );
  $postdigest_excerpt_anchor_underhover = ( 'valid' == ta_read_op( 'ta_' . $place . '_postdigest_excerpt_anchor_underhover' ) ) ? 'underline' : 'none';
  $postdigest_release_mark_onoff = ta_read_op( 'ta_' . $place . '_postdigest_release_mark_onoff' );
  $postdigest_release_mark_padding = ta_read_op( 'ta_' . $place . '_postdigest_release_mark_padding' );
  $postdigest_release_mark_text_color = ta_select_color_w_image_color( 'ta_' . $place . '_postdigest_release_mark_text_color' );
  $postdigest_release_mark_text_weight = ta_read_op( 'ta_' . $place . '_postdigest_release_mark_text_weight' );
  $postdigest_release_mark_text_bgcolor = ta_select_color_w_image_color( 'ta_' . $place . '_postdigest_release_mark_text_bgcolor' );
  $postdigest_release_mark_text_round = ta_read_op( 'ta_' . $place . '_postdigest_release_mark_text_round' );
  //サイトイメージカラー
  $ta_common_site_bg_color = ta_read_op( 'ta_common_site_bg_color' );
  $ta_common_site_hl_color = ta_read_op( 'ta_common_site_hl_color' );
  $ta_common_site_text_on_bg_color = ta_read_op( 'ta_common_site_text_on_bg_color' );
  $ta_common_site_text_on_hl_color = ta_read_op( 'ta_common_site_text_on_hl_color' );
  //対象テキストカラー
  $color_place = ( 'top' == $place ) ? 'main' : $place;
  $font_color_select = ta_read_op( 'ta_' . $color_place . '_font_color_select' );
  $font_color = ta_read_op( 'ta_' . $color_place . '_font_color' );
  if ( 'common_site_bg' == $font_color_select ) { $font_color = $ta_common_site_bg_color; }
  else if ( 'common_site_hl' == $font_color_select ) { $font_color = $ta_common_site_hl_color; }
  else if ( 'common_site_text_on_bg' == $font_color_select ) { $font_color = $ta_common_site_text_on_bg_color; }
  else if ( 'common_site_text_on_hl' == $font_color_select ) { $font_color = $ta_common_site_text_on_hl_color; }
  //続き誘導マーク
  $postdigest_rightmark = ta_read_op( 'ta_' . $place . '_postdigest_excerpt_rightmark' );
  $postdigest_rightmark_color = ta_select_color_w_image_color( 'ta_' . $place . '_postdigest_excerpt_rightmark_color' );
  $postdigest_rightmark_size = ta_read_op( 'ta_' . $place . '_postdigest_excerpt_rightmark_size' );
  $postdigest_rightmark_weight = ta_read_op( 'ta_' . $place . '_postdigest_excerpt_rightmark_weight' );
  $postdigest_rightmark_width = ta_read_op( 'ta_' . $place . '_postdigest_excerpt_rightmark_width' );
  $postdigest_rightmark_opacity = ta_read_op( 'ta_' . $place . '_postdigest_excerpt_rightmark_opacity' );
  $postdigest_rightmark_opacityhover = ta_read_op( 'ta_' . $place . '_postdigest_excerpt_rightmark_opacityhover' );
  //下側続き誘導マーク
  $postdigest_lowermark = ta_read_op( 'ta_' . $place . '_postdigest_excerpt_lowermark' );
  $postdigest_lowermark_title_underline = ( 'valid' == ta_read_op( 'ta_' . $place . '_postdigest_excerpt_lowermark_title_underline_onoff' ) ) ? 'underline' : 'none';
  $postdigest_lowermark_title_hoverunderline = ( 'valid' == ta_read_op( 'ta_' . $place . '_postdigest_excerpt_lowermark_title_hoverunderline_onoff' ) ) ? 'underline' : 'none';
  $postdigest_lowermark_title_size = ta_read_op( 'ta_' . $place . '_postdigest_excerpt_lowermark_title_size' );
  $postdigest_lowermark_title_weight = ta_read_op( 'ta_' . $place . '_postdigest_excerpt_lowermark_title_weight' );
  $postdigest_lowermark_title_color = ta_select_color_w_image_color( 'ta_' . $place . '_postdigest_excerpt_lowermark_title_color' );
  $postdigest_lowermark_title_colorhover = ta_select_color_w_image_color( 'ta_' . $place . '_postdigest_excerpt_lowermark_title_colorhover' );
  $postdigest_lowermark_bgcolor = ta_select_color_w_image_color( 'ta_' . $place . '_postdigest_excerpt_lowermark_bgcolor' );
  $postdigest_lowermark_bgcolorhover = ta_select_color_w_image_color( 'ta_' . $place . '_postdigest_excerpt_lowermark_bgcolorhover' );
  $postdigest_lowermark_height = ta_read_op( 'ta_' . $place . '_postdigest_excerpt_lowermark_height' );
  $postdigest_lowermark_minwidth = ta_read_op( 'ta_' . $place . '_postdigest_excerpt_lowermark_minwidth' );
  $postdigest_lowermark_round = ta_read_op( 'ta_' . $place . '_postdigest_excerpt_lowermark_round' );
  $postdigest_lowermark_paddingtop = ta_read_op( 'ta_' . $place . '_postdigest_excerpt_lowermark_paddingtop' ); ?>
/***** 各種投稿ダイジェストに関する可変スタイル */
#<?php echo $id_prefix; ?>-catdigest .info-contents-group {
  width: 100%;
  display: inline-block;
  vertical-align: bottom;
}

#<?php echo $id_prefix; ?>-catdigest .info-contents-group .info-contents {
  margin-bottom: <?php echo $postdigest_post_distance; ?>px;
  float: left;
  box-sizing: border-box;
  background-color: <?php echo $postdigest_post_border_bgcolor; ?>;
  width : <?php echo floor( ( 100 - $postdigest_row_distance * ( $postdigest_row_num - 1 ) ) / $postdigest_row_num ); ?>%;
  margin-right: <?php echo $postdigest_row_distance; ?>%;
<?php
  if ( 'b' == $postdigest_post_border_type ) { ?>
  padding-bottom: <?php echo $postdigest_post_border_padding; ?>px;
  border-bottom: <?php echo $postdigest_post_border_size; ?>px <?php echo $postdigest_post_border_kind; ?> <?php echo $postdigest_post_border_color; ?>;
<?php
  } else if ( 'l-b' == $postdigest_post_border_type ) { ?>
  padding-left: <?php echo $postdigest_post_border_padding; ?>px;
  padding-bottom: <?php echo $postdigest_post_border_padding; ?>px;
  border-left: <?php echo $postdigest_post_border_size; ?>px <?php echo $postdigest_post_border_kind; ?> <?php echo $postdigest_post_border_color; ?>;
  border-bottom: <?php echo $postdigest_post_border_size; ?>px <?php echo $postdigest_post_border_kind; ?> <?php echo $postdigest_post_border_color; ?>;
<?php
  } else if ( 'r-b' == $postdigest_post_border_type ) { ?>
  padding-right: <?php echo $postdigest_post_border_padding; ?>px;
  padding-bottom: <?php echo $postdigest_post_border_padding; ?>px;
  border-right: <?php echo $postdigest_post_border_size; ?>px <?php echo $postdigest_post_border_kind; ?> <?php echo $postdigest_post_border_color; ?>;
  border-bottom: <?php echo $postdigest_post_border_size; ?>px <?php echo $postdigest_post_border_kind; ?> <?php echo $postdigest_post_border_color; ?>;
<?php
  } else if ( 'square' == $postdigest_post_border_type ) { ?>
  padding: <?php echo $postdigest_post_border_padding; ?>px;
  border: <?php echo $postdigest_post_border_size; ?>px <?php echo $postdigest_post_border_kind; ?> <?php echo $postdigest_post_border_color; ?>;
<?php
  } ?>
}

#<?php echo $id_prefix; ?>-catdigest .info-contents-group .info-contents-edge {
  margin-right: 0;
}

#<?php echo $id_prefix; ?>-catdigest .info-contents-timecat {
  width: 100%;
  display: inline-block;
  vertical-align: bottom;
}

<?php
  if ( 'time-cat' == $postdigest_timecat ) { ?>
#<?php echo $id_prefix; ?>-catdigest .info-contents-timecat .info-contents-time {
  float: left;
  color: <?php echo $postdigest_time_color; ?>;
  font-size: <?php echo $postdigest_time_size; ?>%;
  font-weight: <?php echo $postdigest_time_weight; ?>;
<?php
    if ( 'invalid' == $postdigest_time_onoff ) { ?>
  display: none;
<?php
    } ?>
}
  
#<?php echo $id_prefix; ?>-catdigest .info-contents-timecat .info-contents-cat {
  float: right;
  font-size: <?php echo $postdigest_cat_size; ?>%;
  font-weight: <?php echo $postdigest_cat_weight; ?>;
  min-width: <?php echo $postdigest_cat_width; ?>em;
  text-align: center;
  line-height: <?php echo $postdigest_cat_height; ?>em;
  height: <?php echo $postdigest_cat_height; ?>em;
  border-radius: <?php echo $postdigest_cat_round; ?>px;
<?php
    if ( 'invalid' == $postdigest_cat_onoff ) { ?>
  display: none;
<?php
    } ?>
}

<?php
  } else { ?>
#<?php echo $id_prefix; ?>-catdigest .info-contents-timecat .info-contents-time {
  float: right;
  color: <?php echo $postdigest_time_color; ?>;
  font-size: <?php echo $postdigest_time_size; ?>%;
  font-weight: <?php echo $postdigest_time_weight; ?>;
<?php
    if ( 'invalid' == $postdigest_time_onoff ) { ?>
  display: none;
<?php
    } ?>
}

#<?php echo $id_prefix; ?>-catdigest .info-contents-timecat .info-contents-cat {
  float: left;
  font-size: <?php echo $postdigest_cat_size; ?>%;
  font-weight: <?php echo $postdigest_cat_weight; ?>;
  min-width: <?php echo $postdigest_cat_width; ?>em;
  text-align: center;
  line-height: <?php echo $postdigest_cat_height; ?>em;
  height: <?php echo $postdigest_cat_height; ?>em;
  border-radius: <?php echo $postdigest_cat_round; ?>px;
<?php
    if ( 'invalid' == $postdigest_cat_onoff ) { ?>
  display: none;
<?php
    } ?>
}

<?php
  }

  if ( 'valid' == $postdigest_watchmark_onoff ) { ?>
#<?php echo $id_prefix; ?>-catdigest .info-contents-timecat .info-contents-time::before {
  content: "\f469";
  background-color: transparent;
  color: <?php echo $postdigest_time_color; ?>;
  font-family: dashicons;
  font-size: <?php echo $postdigest_time_size; ?>%;
  font-weight: <?php echo $postdigest_time_weight; ?>;
  margin-right: 0.3em;
  padding: 0 0;
}

<?php
  }
  
  if ( 'valid' == $postdigest_release_mark_onoff ) { ?>
#<?php echo $id_prefix; ?>-catdigest .ta-<?php echo $place; ?>-postdigest-release-mark {
  height: 1.3em;
  width: auto;
  padding: 0 <?php echo $postdigest_release_mark_padding; ?>px 0 0;
}

#<?php echo $id_prefix; ?>-catdigest .ta-<?php echo $place; ?>-postdigest-release-text {
  color: <?php echo $postdigest_release_mark_text_color; ?>;
  background-color: <?php echo $postdigest_release_mark_text_bgcolor; ?>;
  border-radius: <?php echo $postdigest_release_mark_text_round; ?>px;
  font-size: 74%;
  font-weight: <?php echo $postdigest_release_mark_text_weight; ?>;
  padding: 1px 5px;
  vertical-align: middle;
  margin: 0 <?php echo $postdigest_release_mark_padding; ?>px 0 0;
}

<?php
  } ?>
#<?php echo $id_prefix; ?>-catdigest .info-contents-thmimg-excerpt {
  display: inline-block;
  vertical-align: bottom;
  width: 100%;
}

#<?php echo $id_prefix; ?>-catdigest .info-contents-thmimg-excerpt .info-contents-thmimg {
  float: <?php echo $postdigest_img_pos; ?>;
<?php
  if ( 'left' == $postdigest_img_pos ) { ?>
  padding-right: <?php echo $postdigest_img_padding; ?>px;
<?php
  } else { ?>
  padding-left: <?php echo $postdigest_img_padding; ?>px;
<?php
  }
  if ( 'none' != $postdigest_img_name ) { ?>
  height: <?php echo $postdigest_img_size[1]; ?>px;
  width: <?php echo $postdigest_img_size[1]; ?>px;
<?php
  } else { ?>
  display: none;
<?php
  } ?>
}

#<?php echo $id_prefix; ?>-catdigest .info-contents-thmimg-excerpt .info-contents-excerpt {
<?php
  if ( 'left' == $postdigest_img_pos ) { ?>
  float: right;
<?php
  } else { ?>
  float: left;
<?php
  } ?>
}

<?php
  if ( 'none' != $postdigest_img_name ) { ?>
#<?php echo $id_prefix; ?>-catdigest .info-contents-thmimg-excerpt .info-contents-excerpt .digest-excerpt-withimage {
  min-height: <?php echo $postdigest_excerpt_minheight; ?>px;
}

<?php
  } ?>
#<?php echo $id_prefix; ?>-catdigest .info-contents-thmimg-excerpt .info-contents-excerpt p {
  margin: 0!important;
  padding: <?php echo $postdigest_excerpt_tpadding; ?>em 0 <?php echo $postdigest_excerpt_bpadding; ?>em;
<?php
  if ( 'none' != $postdigest_rightmark ) { ?>
  width: <?php echo ( 100 - $postdigest_rightmark_width ); ?>%;
<?php
  }
  if ( 'valid' == $postdigest_excerpt_onlyfor_onoff ) { ?>
  font-size: <?php echo $postdigest_excerpt_size; ?>%!important;
  font-weight: <?php echo $postdigest_excerpt_weight; ?>!important;
  line-height: <?php echo $postdigest_excerpt_lineheight; ?>em!important;
<?php
  } ?>
}

<?php
  if ( 'valid' == $postdigest_excerpt_onlyfor_onoff ) { ?>
#<?php echo $id_prefix; ?>-catdigest .info-contents .info-contents-thmimg-excerpt .info-contents-excerpt .digest-excerpt a {
  color: <?php echo $postdigest_excerpt_anchor_color; ?>;
  text-decoration: <?php echo $postdigest_excerpt_anchor_under; ?>;
}

#<?php echo $id_prefix; ?>-catdigest .info-contents .info-contents-thmimg-excerpt .info-contents-excerpt .digest-excerpt a:hover {
  color: <?php echo $postdigest_excerpt_anchor_colorhover; ?>;
  text-decoration: <?php echo $postdigest_excerpt_anchor_underhover; ?>;
}
<?php
  } ?>

#<?php echo $id_prefix; ?>-catdigest .info-contents-thmimg-excerpt .info-contents-excerpt .digest-excerpt {
  position: relative;
}

#<?php echo $id_prefix; ?>-catdigest .info-contents-thmimg-excerpt .info-contents-excerpt .digest-excerpt a {
  text-decoration: none;
  color: <?php echo $font_color; ?>;
}

<?php
  if ( 'none' != $postdigest_rightmark ) { ?>
#<?php echo $id_prefix; ?>-catdigest .info-contents-thmimg-excerpt .info-contents-excerpt p::after {
  display: inline-block;
  width: <?php echo $postdigest_rightmark_width; ?>%;
  text-align: center;
  position: absolute;
  top: 40%;
  right: 0;
  content: '\<?php echo $postdigest_rightmark; ?>';
  color: <?php echo $postdigest_rightmark_color; ?>;
  font-weight: <?php echo $postdigest_rightmark_weight; ?>;
  font-size: <?php echo $postdigest_rightmark_size; ?>%;
  font-family: dashicons;
  opacity: <?php echo $postdigest_rightmark_opacity; ?>;
}

#<?php echo $id_prefix; ?>-catdigest .info-contents-thmimg-excerpt .info-contents-excerpt a:hover p::after {
  opacity: <?php echo $postdigest_rightmark_opacityhover; ?>;
}

<?php
  }
  if ( 'none' != $postdigest_lowermark ) { ?>
#<?php echo $id_prefix; ?>-catdigest .info-contents-thmimg-excerpt .info-contents-excerpt .excerpt-lowermark-container {
  display: inline-block;
  vertical-align: bottom;
  width: 100%;
  padding-top: <?php echo $postdigest_lowermark_paddingtop; ?>px;
}

#<?php echo $id_prefix; ?>-catdigest .info-contents-thmimg-excerpt .info-contents-excerpt .excerpt-lowermark-container .excerpt-lowermark {
  display: block;
  float: <?php echo $postdigest_lowermark; ?>;
  text-align: center;
  text-decoration: <?php echo $postdigest_lowermark_title_underline; ?>;
  color: <?php echo $postdigest_lowermark_title_color; ?>;
  background-color: <?php echo $postdigest_lowermark_bgcolor; ?>;
  font-weight: <?php echo $postdigest_lowermark_title_weight; ?>;
  height: <?php echo $postdigest_lowermark_height; ?>em;
  line-height: <?php echo $postdigest_lowermark_height; ?>em;
  font-size: <?php echo $postdigest_lowermark_title_size; ?>%;
  min-width: <?php echo $postdigest_lowermark_minwidth; ?>em;
  border-radius: <?php echo $postdigest_lowermark_round; ?>px;
}

#<?php echo $id_prefix; ?>-catdigest .info-contents-thmimg-excerpt .info-contents-excerpt a:hover .excerpt-lowermark-container .excerpt-lowermark {
  background-color: <?php echo $postdigest_lowermark_bgcolorhover; ?>;
  color: <?php echo $postdigest_lowermark_title_colorhover; ?>;
  text-decoration: <?php echo $postdigest_lowermark_title_hoverunderline; ?>;
}

<?php
  } ?>
#<?php echo $id_prefix; ?>-catdigest .info-contents-fullimg {
  width: 100%;
  text-align: center;
}

#<?php echo $id_prefix; ?>-catdigest .info-contents-fullimg img {
  width: 100%;
  height: auto;
  display: block;
}  

<?php
}


/***** アーカイブに関するスタイル */
function ta_archive_disp_style_w_php() {
  $archive_post_distance = ta_read_op( 'ta_common_listpage_post_distance' );
  $archive_post_border_type = ta_read_op( 'ta_common_listpage_post_border_type' );
  $archive_post_border_size = ta_read_op( 'ta_common_listpage_post_border_size' );
  $archive_post_border_color = ta_select_color_w_image_color( 'ta_common_listpage_post_border_color' );
  $archive_post_border_bgcolor = ta_select_color_w_image_color( 'ta_common_listpage_post_border_bgcolor' );
  $archive_post_border_kind = ta_read_op( 'ta_common_listpage_post_border_kind' );
  $archive_post_border_padding = ta_read_op( 'ta_common_listpage_post_border_padding' );
  $archive_row_num = ta_read_op( 'ta_common_listpage_row_num' );
  $archive_row_distance = ta_read_op( 'ta_common_listpage_row_distance' );
  $archive_timecat = ta_read_op( 'ta_common_listpage_timecat' );
  $archive_time_onoff = ta_read_op( 'ta_common_listpage_time_onoff' );
  $archive_time_color = ta_select_color_w_image_color( 'ta_common_listpage_time_color' );
  $archive_time_size = ta_read_op( 'ta_common_listpage_time_size' );
  $archive_time_weight = ta_read_op( 'ta_common_listpage_time_weight' );
  $archive_watchmark_onoff = ta_read_op( 'ta_common_listpage_watchmark_onoff' );
  $archive_cat_onoff = ta_read_op( 'ta_common_listpage_cat_onoff' );
  $archive_cat_size = ta_read_op( 'ta_common_listpage_cat_size' );
  $archive_cat_weight = ta_read_op( 'ta_common_listpage_cat_weight' );
  $archive_cat_width = ta_read_op( 'ta_common_listpage_cat_width' );
  $archive_cat_height = ta_read_op( 'ta_common_listpage_cat_height' );
  $archive_cat_round = ta_read_op( 'ta_common_listpage_cat_round' );
  $archive_img_name = ta_read_op( 'ta_common_listpage_img_size' );
  $archive_img_size = explode( 'ta_square_image', $archive_img_name );
  $archive_img_pos = ta_read_op( 'ta_common_listpage_img_pos' );
  $archive_img_padding = ta_read_op( 'ta_common_listpage_img_padding' );
  $archive_excerpt_minheight = ta_read_op( 'ta_common_listpage_excerpt_minheight' );
  $archive_excerpt_tpadding = ta_read_op( 'ta_common_listpage_excerpt_tpadding' );
  $archive_excerpt_bpadding = ta_read_op( 'ta_common_listpage_excerpt_bpadding' );
  $archive_excerpt_onlyfor_onoff = ta_read_op( 'ta_common_listpage_excerpt_onlyfor_onoff' );
  $archive_excerpt_size = ta_read_op( 'ta_common_listpage_excerpt_size' );
  $archive_excerpt_weight = ta_read_op( 'ta_common_listpage_excerpt_weight' );
  $archive_excerpt_lineheight = ta_read_op( 'ta_common_listpage_excerpt_lineheight' );
  $archive_excerpt_anchor_color = ta_select_color_w_image_color( 'ta_common_listpage_excerpt_anchor_color' );
  $archive_excerpt_anchor_under = ( 'valid' == ta_read_op( 'ta_common_listpage_excerpt_anchor_under' ) ) ? 'underline' : 'none';
  $archive_excerpt_anchor_colorhover = ta_select_color_w_image_color( 'ta_common_listpage_excerpt_anchor_colorhover' );
  $archive_excerpt_anchor_underhover = ( 'valid' == ta_read_op( 'ta_common_listpage_excerpt_anchor_underhover' ) ) ? 'underline' : 'none';
  $archive_release_mark_onoff = ta_read_op( 'ta_common_listpage_release_mark_onoff' );
  $archive_release_mark_padding = ta_read_op( 'ta_common_listpage_release_mark_padding' );
  $archive_release_mark_text_color = ta_select_color_w_image_color( 'ta_common_listpage_release_mark_text_color' );
  $archive_release_mark_text_weight = ta_read_op( 'ta_common_listpage_release_mark_text_weight' );
  $archive_release_mark_text_bgcolor = ta_select_color_w_image_color( 'ta_common_listpage_release_mark_text_bgcolor' );
  $archive_release_mark_text_round = ta_read_op( 'ta_common_listpage_release_mark_text_round' );
  //サイトイメージカラー
  $ta_common_site_bg_color = ta_read_op( 'ta_common_site_bg_color' );
  $ta_common_site_hl_color = ta_read_op( 'ta_common_site_hl_color' );
  $ta_common_site_text_on_bg_color = ta_read_op( 'ta_common_site_text_on_bg_color' );
  $ta_common_site_text_on_hl_color = ta_read_op( 'ta_common_site_text_on_hl_color' );
  //対象テキストカラー
  $font_color_select = ta_read_op( 'ta_main_font_color_select' );
  $font_color = ta_read_op( 'ta_main_font_color' );
  if ( 'common_site_bg' == $font_color_select ) { $font_color = $ta_common_site_bg_color; }
  else if ( 'common_site_hl' == $font_color_select ) { $font_color = $ta_common_site_hl_color; }
  else if ( 'common_site_text_on_bg' == $font_color_select ) { $font_color = $ta_common_site_text_on_bg_color; }
  else if ( 'common_site_text_on_hl' == $font_color_select ) { $font_color = $ta_common_site_text_on_hl_color; }
  //続き誘導マーク
  $archive_rightmark = ta_read_op( 'ta_common_listpage_excerpt_rightmark' );
  $archive_rightmark_color = ta_select_color_w_image_color( 'ta_common_listpage_excerpt_rightmark_color' );
  $archive_rightmark_size = ta_read_op( 'ta_common_listpage_excerpt_rightmark_size' );
  $archive_rightmark_weight = ta_read_op( 'ta_common_listpage_excerpt_rightmark_weight' );
  $archive_rightmark_width = ta_read_op( 'ta_common_listpage_excerpt_rightmark_width' );
  $archive_rightmark_opacity = ta_read_op( 'ta_common_listpage_excerpt_rightmark_opacity' );
  $archive_rightmark_opacityhover = ta_read_op( 'ta_common_listpage_excerpt_rightmark_opacityhover' );
  //下側続き誘導マーク
  $archive_lowermark = ta_read_op( 'ta_common_listpage_excerpt_lowermark' );
  $archive_lowermark_title_underline = ( 'valid' == ta_read_op( 'ta_common_listpage_excerpt_lowermark_title_underline_onoff' ) ) ? 'underline' : 'none';
  $archive_lowermark_title_hoverunderline = ( 'valid' == ta_read_op( 'ta_common_listpage_excerpt_lowermark_title_hoverunderline_onoff' ) ) ? 'underline' : 'none';
  $archive_lowermark_title_size = ta_read_op( 'ta_common_listpage_excerpt_lowermark_title_size' );
  $archive_lowermark_title_weight = ta_read_op( 'ta_common_listpage_excerpt_lowermark_title_weight' );
  $archive_lowermark_title_color = ta_select_color_w_image_color( 'ta_common_listpage_excerpt_lowermark_title_color' );
  $archive_lowermark_title_colorhover = ta_select_color_w_image_color( 'ta_common_listpage_excerpt_lowermark_title_colorhover' );
  $archive_lowermark_bgcolor = ta_select_color_w_image_color( 'ta_common_listpage_excerpt_lowermark_bgcolor' );
  $archive_lowermark_bgcolorhover = ta_select_color_w_image_color( 'ta_common_listpage_excerpt_lowermark_bgcolorhover' );
  $archive_lowermark_height = ta_read_op( 'ta_common_listpage_excerpt_lowermark_height' );
  $archive_lowermark_minwidth = ta_read_op( 'ta_common_listpage_excerpt_lowermark_minwidth' );
  $archive_lowermark_round = ta_read_op( 'ta_common_listpage_excerpt_lowermark_round' );
  $archive_lowermark_paddingtop = ta_read_op( 'ta_common_listpage_excerpt_lowermark_paddingtop' ); ?>
/***** アーカイブに関する可変スタイル */
#archive-list .info-contents-group {
  width: 100%;
  display: inline-block;
  vertical-align: bottom;
}

#archive-list .info-contents-group .info-contents {
  margin-bottom: <?php echo $archive_post_distance; ?>px;
  float: left;
  box-sizing: border-box;
  background-color: <?php echo $archive_post_border_bgcolor; ?>;
  width : <?php echo floor( ( 100 - $archive_row_distance * ( $archive_row_num - 1 ) ) / $archive_row_num ); ?>%;
  margin-right: <?php echo $archive_row_distance; ?>%;
<?php
  if ( 'b' == $archive_post_border_type ) { ?>
  padding-bottom: <?php echo $archive_post_border_padding; ?>px;
  border-bottom: <?php echo $archive_post_border_size; ?>px <?php echo $archive_post_border_kind; ?> <?php echo $archive_post_border_color; ?>;
<?php
  } else if ( 'l-b' == $archive_post_border_type ) { ?>
  padding-left: <?php echo $archive_post_border_padding; ?>px;
  padding-bottom: <?php echo $archive_post_border_padding; ?>px;
  border-left: <?php echo $archive_post_border_size; ?>px <?php echo $archive_post_border_kind; ?> <?php echo $archive_post_border_color; ?>;
  border-bottom: <?php echo $archive_post_border_size; ?>px <?php echo $archive_post_border_kind; ?> <?php echo $archive_post_border_color; ?>;
<?php
  } else if ( 'r-b' == $archive_post_border_type ) { ?>
  padding-right: <?php echo $archive_post_border_padding; ?>px;
  padding-bottom: <?php echo $archive_post_border_padding; ?>px;
  border-right: <?php echo $archive_post_border_size; ?>px <?php echo $archive_post_border_kind; ?> <?php echo $archive_post_border_color; ?>;
  border-bottom: <?php echo $archive_post_border_size; ?>px <?php echo $archive_post_border_kind; ?> <?php echo $archive_post_border_color; ?>;
<?php
  } else if ( 'square' == $archive_post_border_type ) { ?>
  padding: <?php echo $archive_post_border_padding; ?>px;
  border: <?php echo $archive_post_border_size; ?>px <?php echo $archive_post_border_kind; ?> <?php echo $archive_post_border_color; ?>;
<?php
  } ?>
}

#archive-list .info-contents-group .info-contents-edge {
  margin-right: 0;
}

#archive-list .info-contents-timecat {
  width: 100%;
  display: inline-block;
  vertical-align: bottom;
}

<?php
  if ( 'time-cat' == $archive_timecat ) { ?>
#archive-list .info-contents-timecat .info-contents-time {
  float: left;
  color: <?php echo $archive_time_color; ?>;
  font-size: <?php echo $archive_time_size; ?>%;
  font-weight: <?php echo $archive_time_weight; ?>;
<?php
    if ( 'invalid' == $archive_time_onoff ) { ?>
  display: none;
<?php
    } ?>
}

#archive-list .info-contents-timecat .info-contents-cat {
  float: right;
  font-size: <?php echo $archive_cat_size; ?>%;
  font-weight: <?php echo $archive_cat_weight; ?>;
  min-width: <?php echo $archive_cat_width; ?>em;
  text-align: center;
  line-height: <?php echo $archive_cat_height; ?>em;
  height: <?php echo $archive_cat_height; ?>em;
  border-radius: <?php echo $archive_cat_round; ?>px;
<?php
    if ( 'invalid' == $archive_cat_onoff ) { ?>
  display: none;
<?php
    } ?>
}

<?php
  } else { ?>
#archive-list .info-contents-timecat .info-contents-time {
  float: right;
  color: <?php echo $archive_time_color; ?>;
  font-size: <?php echo $archive_time_size; ?>%;
  font-weight: <?php echo $archive_time_weight; ?>;
<?php
    if ( 'invalid' == $archive_time_onoff ) { ?>
  display: none;
<?php
    } ?>
}

#archive-list .info-contents-timecat .info-contents-cat {
  float: left;
  font-size: <?php echo $archive_cat_size; ?>%;
  font-weight: <?php echo $archive_cat_weight; ?>;
  min-width: <?php echo $archive_cat_width; ?>em;
  text-align: center;
  line-height: <?php echo $archive_cat_height; ?>em;
  height: <?php echo $archive_cat_height; ?>em;
  border-radius: <?php echo $archive_cat_round; ?>px;
<?php
    if ( 'invalid' == $archive_cat_onoff ) { ?>
  display: none;
<?php
    } ?>
}

<?php
  }
  
  if ( 'valid' == $archive_watchmark_onoff ) { ?>
#archive-list .info-contents-timecat .info-contents-time::before {
  content: "\f469";
  background-color: transparent;
  color: <?php echo $archive_time_color; ?>;
  font-family: dashicons;
  font-size: <?php echo $archive_time_size; ?>%;
  font-weight: <?php echo $archive_time_weight; ?>;
  margin-right: 0.3em;
  padding: 0 0;
}

<?php
  }
  
  if ( 'valid' == $archive_release_mark_onoff ) { ?>
#archive-list .ta-common-listpage-release-mark {
  height: 1.3em;
  width: auto;
  padding: 0 <?php echo $archive_release_mark_padding; ?>px 0 0;
}

#archive-list .ta-common-listpage-release-text {
  color: <?php echo $archive_release_mark_text_color; ?>;
  background-color: <?php echo $archive_release_mark_text_bgcolor; ?>;
  border-radius: <?php echo $archive_release_mark_text_round; ?>px;
  font-size: 74%;
  font-weight: <?php echo $archive_release_mark_text_weight; ?>;
  padding: 1px 5px;
  vertical-align: middle;
  margin: 0 <?php echo $archive_release_mark_padding; ?>px 0 0;
}

<?php
  } ?>
#archive-list .info-contents-thmimg-excerpt {
  display: inline-block;
  vertical-align: bottom;
  width: 100%;
}

#archive-list .info-contents-thmimg-excerpt .info-contents-thmimg {
  float: <?php echo $archive_img_pos; ?>;
<?php
  if ( 'left' == $archive_img_pos ) { ?>
  padding-right: <?php echo $archive_img_padding; ?>px;
<?php
  } else { ?>
  padding-left: <?php echo $archive_img_padding; ?>px;
<?php
  }
  if ( 'none' != $archive_img_name ) { ?>
  height: <?php echo $archive_img_size[1]; ?>px;
  width: <?php echo $archive_img_size[1]; ?>px;
<?php
  } else { ?>
  display: none;
<?php
  } ?>
}

#archive-list .info-contents-thmimg-excerpt .info-contents-excerpt {
<?php
  if ( 'left' == $archive_img_pos ) { ?>
  float: right;
<?php
  } else { ?>
  float: left;
<?php
  } ?>
}

<?php
  if ( 'none' != $archive_img_name ) { ?>
#archive-list .info-contents-thmimg-excerpt .info-contents-excerpt .digest-excerpt-withimage {
  min-height: <?php echo $archive_excerpt_minheight; ?>px;
}

<?php
  } ?>
#archive-list .info-contents-thmimg-excerpt .info-contents-excerpt p {
  margin: 0!important;
  padding: <?php echo $archive_excerpt_tpadding; ?>em 0 <?php echo $archive_excerpt_bpadding; ?>em;
<?php
  if ( 'none' != $archive_rightmark ) { ?>
  width: <?php echo ( 100 - $archive_rightmark_width ); ?>%;
<?php
  }
  if ( 'valid' == $archive_excerpt_onlyfor_onoff ) { ?>
  font-size: <?php echo $archive_excerpt_size; ?>%!important;
  font-weight: <?php echo $archive_excerpt_weight; ?>!important;
  line-height: <?php echo $archive_excerpt_lineheight; ?>em!important;
<?php
  } ?>
}

<?php
  if ( 'valid' == $archive_excerpt_onlyfor_onoff ) { ?>
#archive-list .info-contents .info-contents-thmimg-excerpt .info-contents-excerpt .digest-excerpt a {
  color: <?php echo $archive_excerpt_anchor_color; ?>!important;
  text-decoration: <?php echo $archive_excerpt_anchor_under; ?>!important;
}

#archive-list .info-contents .info-contents-thmimg-excerpt .info-contents-excerpt .digest-excerpt a:hover {
  color: <?php echo $archive_excerpt_anchor_colorhover; ?>!important;
  text-decoration: <?php echo $archive_excerpt_anchor_underhover; ?>!important;
}
<?php
  } ?>

#archive-list .info-contents-thmimg-excerpt .info-contents-excerpt .digest-excerpt {
  position: relative;
}

#archive-list .info-contents-thmimg-excerpt .info-contents-excerpt .digest-excerpt a {
  text-decoration: none;
  color: <?php echo $font_color; ?>;
}

<?php
  if ( 'none' != $archive_rightmark ) { ?>
#archive-list .info-contents-thmimg-excerpt .info-contents-excerpt p::after {
  display: inline-block;
  width: <?php echo $archive_rightmark_width; ?>%;
  text-align: center;
  position: absolute;
  top: 40%;
  right: 0;
  content: '\<?php echo $archive_rightmark; ?>';
  color: <?php echo $archive_rightmark_color; ?>;
  font-weight: <?php echo $archive_rightmark_weight; ?>;
  font-size: <?php echo $archive_rightmark_size; ?>%;
  font-family: dashicons;
  opacity: <?php echo $archive_rightmark_opacity; ?>;
}

#archive-list .info-contents-thmimg-excerpt .info-contents-excerpt a:hover p::after {
  opacity: <?php echo $archive_rightmark_opacityhover; ?>;
}

<?php
  }
  if ( 'none' != $archive_lowermark ) { ?>
#archive-list .info-contents-thmimg-excerpt .info-contents-excerpt .excerpt-lowermark-container {
  display: inline-block;
  vertical-align: bottom;
  width: 100%;
  padding-top: <?php echo $archive_lowermark_paddingtop; ?>px;
}

#archive-list .info-contents-thmimg-excerpt .info-contents-excerpt .excerpt-lowermark-container .excerpt-lowermark {
  display: block;
  float: <?php echo $archive_lowermark; ?>;
  text-align: center;
  text-decoration: <?php echo $archive_lowermark_title_underline; ?>;
  color: <?php echo $archive_lowermark_title_color; ?>;
  background-color: <?php echo $archive_lowermark_bgcolor; ?>;
  font-weight: <?php echo $archive_lowermark_title_weight; ?>;
  height: <?php echo $archive_lowermark_height; ?>em;
  line-height: <?php echo $archive_lowermark_height; ?>em;
  font-size: <?php echo $archive_lowermark_title_size; ?>%;
  min-width: <?php echo $archive_lowermark_minwidth; ?>em;
  border-radius: <?php echo $archive_lowermark_round; ?>px;
}

#archive-list .info-contents-thmimg-excerpt .info-contents-excerpt a:hover .excerpt-lowermark-container .excerpt-lowermark {
  background-color: <?php echo $archive_lowermark_bgcolorhover; ?>;
  color: <?php echo $archive_lowermark_title_colorhover; ?>;
  text-decoration: <?php echo $archive_lowermark_title_hoverunderline; ?>;
}

<?php
  } ?>
#archive-list .info-contents-fullimg {
  width: 100%;
  text-align: center;
}

#archive-list .info-contents-fullimg img {
  width: 100%;
  height: auto;
  display: block;
}

<?php
}


/***** ヘッドラインに関するスタイル */
function ta_headline_style_w_php( $key_name, $factor_name ) {
  $headline_type = ta_read_op( $key_name . '_type' );
  // タイプがcommonの時はkeynameをmainの名前に変更して共通設定を読み込む
  if ( 'common' == $headline_type ) {
    $key_name = str_replace("sidebarsub", "main", $key_name );
    $key_name = str_replace("sidebar", "main", $key_name );
    $key_name = str_replace("footer", "main", $key_name );
  }
  $headline_type = ta_read_op( $key_name . '_type' );
  $headline_size = ta_read_op( $key_name . '_size' );
  $headline_hl_lineheight = ta_read_op( $key_name . '_hl_lineheight' );
  $headline_centering = ta_read_op( $key_name . '_centering' );
  $headline_position = ta_read_op( $key_name . '_position' );
  $headline_weight = ta_read_op( $key_name . '_weight' );
  $headline_color = ta_select_color_w_image_color( $key_name . '_color' );
  $headline_linkedcolor = ta_select_color_w_image_color( $key_name . '_linkedcolor' );
  $headline_left_size = ta_read_op( $key_name . '_left_size' );
  $headline_left_color = ta_select_color_w_image_color( $key_name . '_left_color' );
  if ( TA_HIEND_PI ) {
    $headline_left_color_grad_onoff = ta_read_op( $key_name . '_left_color_grad_onoff' );
  } else {
    $headline_left_color_grad_onoff = "invalid";
  }
  $headline_over_onoff = ta_read_op( $key_name . '_over_onoff' );
  $headline_over_kind = ta_read_op( $key_name . '_over_kind' );
  $headline_over_size = ta_read_op( $key_name . '_over_size' );
  $headline_over_color = ta_select_color_w_image_color( $key_name . '_over_color' );
  if ( TA_HIEND_PI ) {
    if ( 'left' != $headline_type ) {
      $headline_over_color_grad_onoff = ta_read_op( $key_name . '_over_color_grad_onoff' );
    } else {
      $headline_over_color_grad_onoff = "invalid";
    }
  } else {
    $headline_over_color_grad_onoff = "invalid";
  }
  $headline_under_onoff = ta_read_op( $key_name . '_under_onoff' );
  $headline_under_kind = ta_read_op( $key_name . '_under_kind' );
  $headline_under_size = ta_read_op( $key_name . '_under_size' );
  $headline_under_color = ta_select_color_w_image_color( $key_name . '_under_color' );
  if ( TA_HIEND_PI ) {
    $headline_under_color_grad_onoff = ta_read_op( $key_name . '_under_color_grad_onoff' );
  } else {
    $headline_under_color_grad_onoff = "invalid";
  }
  $headline_box_color = ta_select_color_w_image_color( $key_name . '_box_color' );
  if ( TA_HIEND_PI ) {
    $headline_box_color_grad_onoff = ta_read_op( $key_name . '_box_color_grad_onoff' );
  } else {
    $headline_box_color_grad_onoff = "invalid";
  }
  $headline_box_round = ta_read_op( $key_name . '_box_round' );
  $headline_arrow_direction1 = ta_read_op( $key_name . '_arrow_direction1' );
  $headline_arrow_size1 = round( 15 * ta_read_op( $key_name . '_arrow_size1' ) / 100 );
  $headline_arrow_position1 = ta_read_op( $key_name . '_arrow_position1' );
  $headline_arrow_direction2 = ta_read_op( $key_name . '_arrow_direction2' );
  $headline_arrow_size2 = ta_read_op( $key_name . '_arrow_size2' );
  $headline_padding_top = ta_read_op( $key_name . '_padding_top' );
  $headline_padding_bottom = ta_read_op( $key_name . '_padding_bottom' );
  $headline_margin_top = ta_read_op( $key_name . '_margin_top' );
  $headline_margin_bottom = ta_read_op( $key_name . '_margin_bottom' );
  $headline_colorhover = ta_select_color_w_image_color( $key_name . '_colorhover' );
  $headline_font_style_onoff = ta_read_op( $key_name . '_font_style_onoff' );
  $headline_font_underline = ( 'valid' == ta_read_op( $key_name . '_font_ul_onoff' ) ) ? 'underline' : 'none';
  $headline_font_hoverunderline = ( 'valid' == ta_read_op( $key_name . '_font_hoverul_onoff' ) ) ? 'underline' : 'none';
  if ( TA_HIEND_PI ) {
    $headline_dec_pic = ta_read_op( $key_name . '_dec_pic' );
    $headline_pic_position = ta_read_op( $key_name . '_pic_position' );
    $headline_pic_repeat_onoff = ( 'valid' == ta_read_op( $key_name . '_pic_repeat_onoff' ) ) ? 'repeat-x' : 'no-repeat';
  } else {
    $headline_dec_pic = 'no_image';
    $headline_pic_position = 'back';
    $headline_pic_repeat_onoff = 'no-repeat';
  }
  $headline_bpic_rmargin = ta_read_op( $key_name . '_bpic_rmargin' );
  $headline_bpic_toppos = ta_read_op( $key_name . '_bpic_toppos' );
  $over_grad_cond = ( ( 'simple' == $headline_type || 'box' == $headline_type ) && 'valid' == $headline_over_color_grad_onoff && 'valid' == $headline_over_onoff ); //上線がグラデーションである条件
  //リセット ?>
<?php echo $factor_name; ?>::before {
  top: auto;
  bottom: auto;
  left: auto;
  right: auto;
  position: static;
  content: normal;
  margin: auto;
  display: inline;
  width: auto;
  height: auto;
  background: none;
  border-radius: 0;
  all: initial;
  font-size: 100%;
}

<?php echo $factor_name; ?> {
  width: auto;
  box-sizing: border-box;
  position: static;
  vertical-align: baseline;
  text-align: left;
  border: none;
  background: none;
  border-radius: 0;
  box-shadow: none;
  margin: 0;
  padding: 0;
  outline: 0;
  font-size: 100%;
  text-decoration: none;
  text-shadow: none;
  all: initial;
  display: block;
}

<?php echo $factor_name; ?> a,
<?php echo $factor_name; ?> a:hover {
  margin: 0;
  padding: 0;
  outline: 0;
  font-size: 100%;
  vertical-align: baseline;
  background: transparent;
  text-decoration: none;
  border: none;
  box-shadow: none;
  text-shadow: none;
}

<?php echo $factor_name; ?>::after {
  top: auto;
  bottom: auto;
  left: auto;
  right: auto;
  content: normal;
  position: static;
  display: inline;
  width: auto;
  height: auto;
  border: none;
  margin: auto;
  background: none;
  border-radius: 0;
  all: initial;
  font-size: 100%;
}

<?php
  if ( ( 'no_image' != $headline_dec_pic && 'before' == $headline_pic_position ) && ! ( $over_grad_cond || 'balloon2' == $headline_type ) ) {
  echo $factor_name; ?>::before {
  position: relative;
  content: url(<?php echo $headline_dec_pic; ?>);
  top: <?php echo $headline_bpic_toppos; ?>em;
  margin-right: <?php echo $headline_bpic_rmargin; ?>em;
}

<?php
  }
  echo $factor_name; ?> {
<?php
  if ( 'no_image' != $headline_dec_pic && 'back' == $headline_pic_position ) { ?>
  background-image: url(<?php echo $headline_dec_pic; ?>);
<?php
  } ?>
  margin: 0;
  padding: 0;
  border: none;
  font-size: <?php echo $headline_size; ?>px;
  line-height: <?php echo $headline_hl_lineheight; ?>em;
  min-height: <?php echo $headline_hl_lineheight; ?>em;
<?php
  if ( 'valid' == $headline_centering ) { ?>
  text-align: center;
<?php
  }
  if ( 'left' == $headline_type && 'valid' == $headline_left_color_grad_onoff ) { ?>
  padding-left: <?php echo $headline_position; ?>%;
  padding-left: -webkit-calc(<?php echo $headline_position; ?>% + <?php echo $headline_left_size; ?>px);
  padding-left: calc(<?php echo $headline_position; ?>% + <?php echo $headline_left_size; ?>px);
<?php
  } else { ?>
  padding-left: <?php echo $headline_position; ?>%;
<?php
  } ?>
  font-weight: <?php echo $headline_weight; ?>;
  padding-top: <?php echo $headline_padding_top; ?>px;
  padding-bottom: <?php echo $headline_padding_bottom; ?>px;
  margin-top: <?php echo $headline_margin_top; ?>px;
  margin-bottom: <?php echo $headline_margin_bottom; ?>px;
<?php
  if ( 'left' == $headline_type ) { 
    if ( 'invalid' == $headline_left_color_grad_onoff ) { ?>
  border-left: <?php echo $headline_left_size; ?>px solid <?php echo $headline_left_color; ?>;
<?php
    } else { ?>
  position: relative;
<?php
    }
  }
  if ( 'simple' == $headline_type || 'left' == $headline_type || 'box' == $headline_type ) {
    if ( 'valid' == $headline_under_onoff ) {
      if ( 'invalid' == $headline_under_color_grad_onoff ) { ?>
  border-bottom: <?php echo $headline_under_size; ?>px <?php echo $headline_under_kind; ?> <?php echo $headline_under_color; ?>;
<?php
      } else { ?>
  position: relative;
<?php
      }
    }
    if ( 'valid' == $headline_over_onoff ) {
      if ( 'invalid' == $headline_over_color_grad_onoff ) { ?>
  border-top: <?php echo $headline_over_size; ?>px <?php echo $headline_over_kind; ?> <?php echo $headline_over_color; ?>;
<?php
      } else { ?>
  position: relative;
<?php
      }
    }
  }
  // Box
  if ( 'simple' != $headline_type && 'left' != $headline_type ) { ?>
  width: <?php echo ( 100 - $headline_position ); ?>%;
  position: relative;
  display: inline-block;
  vertical-align: bottom;
<?php
    if ( 'box' != $headline_type ) { ?>
  border-bottom: none;
<?php
    }
    if ( 'invalid' == $headline_box_color_grad_onoff ) { ?>
  background-color: <?php echo $headline_box_color; ?>;
<?php
  } else {
    if ( 'back' == $headline_pic_position ) {
      ta_gradient_color_style( $key_name . '_box_color', $headline_dec_pic );
    } else {
      ta_gradient_color_style( $key_name . '_box_color' );
    }
  } ?>
  border-radius: <?php echo $headline_box_round; ?>px;
<?php
  } ?>
}

<?php
  // over
  if ( $over_grad_cond ) {
    echo $factor_name; ?>::before {
  content: "";
  position: absolute;
  display: block;
  width: 100%;
  height: <?php echo $headline_over_size; ?>px;
  top: -<?php echo $headline_over_size; ?>px;
  left: 0;
  <?php ta_gradient_color_style( $key_name . '_over_color' ); ?>
}

<?php
  }
  // under
  if ( ( 'simple' == $headline_type || 'left' == $headline_type || 'box' == $headline_type ) && 'valid' == $headline_under_color_grad_onoff && 'valid' == $headline_under_onoff ) {
    echo $factor_name; ?>::after {
  content: "";
  position: absolute;
  display: block;
  width: 100%;
  height: <?php echo $headline_under_size; ?>px;
  bottom: -<?php echo $headline_under_size; ?>px;
  left: 0;
  <?php ta_gradient_color_style( $key_name . '_under_color' ); ?>
}

<?php
  }
  // left
  if ( 'left' == $headline_type && 'valid' == $headline_left_color_grad_onoff ) {
    echo $factor_name; ?>::before {
  content: "";
  position: absolute;
  display: block;
  width: <?php echo $headline_left_size; ?>px;
  height: <?php echo $headline_hl_lineheight; ?>em;
  padding-top: <?php echo $headline_padding_top; ?>px;
  padding-bottom: <?php echo $headline_padding_bottom; ?>px;
  top: 0;
  left: 0;
  <?php ta_gradient_color_style( $key_name . '_left_color' ); ?>
}

<?php
  }
  // Arrow for balloon1
  if ( 'balloon1' == $headline_type ) {
    echo $factor_name; ?>::after {
  content: "";
  position: absolute;
  display: block;
  width: 0px;
  height: 0px;
  border-style: solid;
<?php
    if ( 'top' == $headline_arrow_direction1 ) { ?>
  top: -<?php echo $headline_arrow_size1; ?>px; left: <?php echo $headline_arrow_position1; ?>%;
  margin-left: -<?php echo $headline_arrow_size1; ?>px;
  border-width: 0 <?php echo $headline_arrow_size1; ?>px <?php echo $headline_arrow_size1; ?>px <?php echo $headline_arrow_size1; ?>px;
  border-color: transparent transparent <?php echo $headline_box_color; ?> transparent;
<?php
    } else if ( 'left' == $headline_arrow_direction1 ) { ?>
  top: 50%; left: -<?php echo $headline_arrow_size1; ?>px;
  margin-top: -<?php echo $headline_arrow_size1; ?>px;
  border-width: <?php echo $headline_arrow_size1; ?>px <?php echo $headline_arrow_size1; ?>px <?php echo $headline_arrow_size1; ?>px 0;
  border-color: transparent <?php echo $headline_box_color; ?> transparent transparent;
<?php
    } else if ( 'bottom' == $headline_arrow_direction1 ) { ?>
  bottom: -<?php echo $headline_arrow_size1; ?>px; left: <?php echo $headline_arrow_position1; ?>%;
  margin-left: -<?php echo $headline_arrow_size1; ?>px;
  border-width: <?php echo $headline_arrow_size1; ?>px <?php echo $headline_arrow_size1; ?>px 0 <?php echo $headline_arrow_size1; ?>px;
  border-color: <?php echo $headline_box_color; ?> transparent transparent transparent;
<?php
    } else if ( 'right' == $headline_arrow_direction1 ) { ?>
  top: 50%; right: -<?php echo $headline_arrow_size1; ?>px;
  margin-top: -<?php echo $headline_arrow_size1; ?>px;
  border-width: <?php echo $headline_arrow_size1; ?>px 0 <?php echo $headline_arrow_size1; ?>px <?php echo $headline_arrow_size1; ?>px;
  border-color: transparent transparent transparent <?php echo $headline_box_color; ?>;
<?php
    } ?>
}

<?php
  }
  // Arrow for balloon2
  if ( 'balloon2' == $headline_type ) {
    echo $factor_name; ?>::before {
  content: "";
  position: absolute;
  display: block;
  width: <?php echo round( 15 * $headline_arrow_size2 / 100 ); ?>px;
  height: <?php echo round( 15 * $headline_arrow_size2 / 100 ); ?>px;
  background: <?php echo $headline_box_color; ?>;
  border-radius: 50%;
<?php
    if ( 'right-top' == $headline_arrow_direction2 ) { ?>
  top: <?php echo round( -17 * $headline_arrow_size2 / 100 ); ?>px; right: <?php echo round( 15 * $headline_arrow_size2 / 100 ); ?>px;
<?php
    } else if ( 'left-top' == $headline_arrow_direction2 ) { ?>
  top: <?php echo round( -17 * $headline_arrow_size2 / 100 ); ?>px; left: <?php echo round( 15 * $headline_arrow_size2 / 100 ); ?>px;
<?php
    } else if ( 'right-bottom' == $headline_arrow_direction2 ) { ?>
  bottom: <?php echo round( -17 * $headline_arrow_size2 / 100 ); ?>px; right: <?php echo round( 15 * $headline_arrow_size2 / 100 ); ?>px;
<?php
    } else if ( 'left-bottom' == $headline_arrow_direction2 ) { ?>
  bottom: <?php echo round( -17 * $headline_arrow_size2 / 100 ); ?>px; left: <?php echo round( 15 * $headline_arrow_size2 / 100 ); ?>px;
<?php
    } ?>
}

<?php
  }
  if ( 'balloon2' == $headline_type ) {
    echo $factor_name; ?>::after {
  content: "";
  position: absolute;
  display: block;
  width: <?php echo round( 8 * $headline_arrow_size2 / 100 ); ?>px;
  height: <?php echo round( 8 * $headline_arrow_size2 / 100 ); ?>px;
  background: <?php echo $headline_box_color; ?>;
  border-radius: 50%;
<?php
    if ( 'right-top' == $headline_arrow_direction2 ) { ?>
  top: <?php echo round( -25 * $headline_arrow_size2 / 100 ); ?>px; right: <?php echo round( 25 * $headline_arrow_size2 / 100 ); ?>px;
<?php
    } else if ( 'left-top' == $headline_arrow_direction2 ) { ?>
  top: <?php echo round( -25 * $headline_arrow_size2 / 100 ); ?>px; left: <?php echo round( 25 * $headline_arrow_size2 / 100 ); ?>px;
<?php
    } else if ( 'right-bottom' == $headline_arrow_direction2 ) { ?>
  bottom: <?php echo round( -25 * $headline_arrow_size2 / 100 ); ?>px; right: <?php echo round( 25 * $headline_arrow_size2 / 100 ); ?>px;
<?php
    } else if ( 'left-bottom' == $headline_arrow_direction2 ) { ?>
  bottom: <?php echo round( -25 * $headline_arrow_size2 / 100 ); ?>px; left: <?php echo round( 25 * $headline_arrow_size2 / 100 ); ?>px;
<?php
    } ?>
}

<?php
  }
  if ( 'no_image' != $headline_dec_pic && 'back' == $headline_pic_position ) {
    echo $factor_name; ?> {
  background-repeat: <?php echo $headline_pic_repeat_onoff; ?>;
}

<?php
  }
  if ( 'invalid' == $headline_font_style_onoff ) {
    echo $factor_name; ?> {
  color: <?php echo $headline_color; ?>;
}

<?php
  echo $factor_name; ?> a {
  color: <?php echo $headline_linkedcolor; ?>;
  text-decoration: <?php echo $headline_font_underline; ?>;
}

<?php
  echo $factor_name; ?> a:hover {
  color: <?php echo $headline_colorhover; ?>;
  text-decoration: <?php echo $headline_font_hoverunderline; ?>;
}

<?php
  } else {
    echo $factor_name; ?> {
  color: <?php echo ta_select_color_w_image_color( 'ta_common_font_color' ); ?>;
}

<?php
    echo $factor_name; ?> a {
  color: <?php echo ta_read_op( 'ta_common_font_anchor_color' ); ?>;
  text-decoration: <?php echo ( 'valid' == ta_read_op( 'ta_common_font_anchor_under' ) ) ? 'underline' : 'none'; ?>;
}

<?php
  echo $factor_name; ?> a:hover {
  color: <?php echo ta_read_op( 'ta_common_font_anchor_colorhover' ); ?>;
  text-decoration: <?php echo ( 'valid' == ta_read_op( 'ta_common_font_anchor_underhover' ) ) ? 'underline' : 'none'; ?>;
}

<?php
  }
}


/***** レスポンシブ専用ヘッドラインに関するスタイル */
function ta_responsive_headline_style_w_php( $key_name, $factor_name ) {
  $headline_type = ta_read_op( $key_name . '_type' );
  // タイプがcommonの時はkeynameをmainの名前に変更して共通設定を読み込む
  if ( 'common' == $headline_type ) {
    $key_name = str_replace("sidebarsub", "main", $key_name );
    $key_name = str_replace("sidebar", "main", $key_name );
    $key_name = str_replace("footer", "main", $key_name );
  }
  $headline_type = ta_read_op( $key_name . '_type' );
  $headline_size = ta_read_op( $key_name . '_size' );
  $headline_hl_lineheight = ta_read_op( $key_name . '_hl_lineheight' );
  $headline_centering = ta_read_op( $key_name . '_centering' );
  $headline_position = ta_read_op( $key_name . '_position' );
  $headline_weight = ta_read_op( $key_name . '_weight' );
  $headline_color = ta_select_color_w_image_color( $key_name . '_color' );
  $headline_linkedcolor = ta_select_color_w_image_color( $key_name . '_linkedcolor' );
  $headline_left_size = ta_read_op( $key_name . '_left_size' );
  $headline_left_color = ta_select_color_w_image_color( $key_name . '_left_color' );
  if ( TA_HIEND_PI ) {
    $headline_left_color_grad_onoff = ta_read_op( $key_name . '_left_color_grad_onoff' );
  } else {
    $headline_left_color_grad_onoff = "invalid";
  }
  $headline_over_onoff = ta_read_op( $key_name . '_over_onoff' );
  $headline_over_size = ta_read_op( $key_name . '_over_size' );
  $headline_over_kind = ta_read_op( $key_name . '_over_kind' );
  $headline_over_color = ta_select_color_w_image_color( $key_name . '_over_color' );
  if ( TA_HIEND_PI ) {
    if ( 'left' != $headline_type ) {
      $headline_over_color_grad_onoff = ta_read_op( $key_name . '_over_color_grad_onoff' );
    } else {
      $headline_over_color_grad_onoff = "invalid";
    }
  } else {
    $headline_over_color_grad_onoff = "invalid";
  }
  $headline_under_onoff = ta_read_op( $key_name . '_under_onoff' );
  $headline_under_kind = ta_read_op( $key_name . '_under_kind' );
  $headline_under_size = ta_read_op( $key_name . '_under_size' );
  $headline_under_color = ta_select_color_w_image_color( $key_name . '_under_color' );
  if ( TA_HIEND_PI ) {
    $headline_under_color_grad_onoff = ta_read_op( $key_name . '_under_color_grad_onoff' );
  } else {
    $headline_under_color_grad_onoff = "invalid";
  }
  $headline_box_color = ta_select_color_w_image_color( $key_name . '_box_color' );
  if ( TA_HIEND_PI ) {
    $headline_box_color_grad_onoff = ta_read_op( $key_name . '_box_color_grad_onoff' );
  } else {
    $headline_box_color_grad_onoff = "invalid";
  }
  $headline_box_round = ta_read_op( $key_name . '_box_round' );
  $headline_arrow_direction1 = ta_read_op( $key_name . '_arrow_direction1' );
  $headline_arrow_size1 = round( 15 * ta_read_op( $key_name . '_arrow_size1' ) / 100 );
  $headline_arrow_position1 = ta_read_op( $key_name . '_arrow_position1' );
  $headline_arrow_direction2 = ta_read_op( $key_name . '_arrow_direction2' );
  $headline_arrow_size2 = ta_read_op( $key_name . '_arrow_size2' );
  $headline_padding_top = ta_read_op( $key_name . '_padding_top' );
  $headline_padding_bottom = ta_read_op( $key_name . '_padding_bottom' );
  $headline_margin_top = ta_read_op( $key_name . '_margin_top' );
  $headline_margin_bottom = ta_read_op( $key_name . '_margin_bottom' );
  $headline_colorhover = ta_select_color_w_image_color( $key_name . '_colorhover' );
  $headline_font_style_onoff = ta_read_op( $key_name . '_font_style_onoff' );
  $headline_font_underline = ( 'valid' == ta_read_op( $key_name . '_font_ul_onoff' ) ) ? 'underline' : 'none';
  $headline_font_hoverunderline = ( 'valid' == ta_read_op( $key_name . '_font_hoverul_onoff' ) ) ? 'underline' : 'none';
  if ( TA_HIEND_PI ) {
    $headline_dec_pic = ta_read_op( $key_name . '_dec_pic' );
    $headline_pic_position = ta_read_op( $key_name . '_pic_position' );
    $headline_pic_repeat_onoff = ( 'valid' == ta_read_op( $key_name . '_pic_repeat_onoff' ) ) ? 'repeat-x' : 'no-repeat';
  } else {
    $headline_dec_pic = 'no_image';
    $headline_pic_position = 'back';
    $headline_pic_repeat_onoff = 'no-repeat';
  }
  $headline_bpic_rmargin = ta_read_op( $key_name . '_bpic_rmargin' );
  $headline_bpic_toppos = ta_read_op( $key_name . '_bpic_toppos' );
  //リセット
  echo $factor_name; ?>::before {
  top: auto!important;
  bottom: auto!important;
  left: auto!important;
  right: auto!important;
  position: static!important;
  content: normal!important;
  margin: auto!important;
  display: inline!important;
  width: auto!important;
  height: auto!important;
  background: none!important;
  border-radius: 0!important;
  all: initial!important;
  font-size: 100%!important;
}

<?php
  echo $factor_name; ?> {
  width: auto!important;
  box-sizing: border-box!important;
  position: static!important;
  vertical-align: baseline!important;
  text-align: left!important;
  border: none!important;
  background: none!important;
  border-radius: 0!important;
  box-shadow: none!important;
  margin: 0!important;
  padding: 0!important;
  outline: 0!important;
  font-size: 100%!important;
  text-decoration: none!important;
  text-shadow: none!important;
  all: initial!important;
  display: block!important;
}

<?php echo $factor_name; ?> a,
<?php echo $factor_name; ?> a:hover {
  margin: 0!important;
  padding: 0!important;
  outline: 0!important;
  font-size: 100%!important;
  vertical-align: baseline!important;
  background: transparent!important;
  text-decoration: none!important;
  border: none!important;
  box-shadow: none!important;
  text-shadow: none!important;
}

<?php
  echo $factor_name; ?>::after {
  top: auto!important;
  bottom: auto!important;
  left: auto!important;
  right: auto!important;
  content: normal!important;
  position: static!important;
  display: inline!important;
  width: auto!important;
  height: auto!important;
  border: none!important;
  margin: auto!important;
  background: none!important;
  border-radius: 0!important;
  all: initial!important;
  font-size: 100%!important;
}

<?php
  $over_grad_cond = ( ( 'simple' == $headline_type || 'box' == $headline_type ) && 'valid' == $headline_over_color_grad_onoff && 'valid' == $headline_over_onoff ); //上線がグラデーションである条件
  if ( ( 'no_image' != $headline_dec_pic && 'before' == $headline_pic_position ) && ! ( $over_grad_cond || 'balloon2' == $headline_type ) ) {
  echo $factor_name; ?>::before {
  position: relative!important;
  content: url(<?php echo $headline_dec_pic; ?>)!important;
  top: <?php echo $headline_bpic_toppos; ?>em!important;
  margin-right: <?php echo $headline_bpic_rmargin; ?>em!important;
}

<?php
  }
  echo $factor_name; ?> {
<?php
  if ( 'no_image' != $headline_dec_pic && 'back' == $headline_pic_position ) { ?>
  background-image: url(<?php echo $headline_dec_pic; ?>)!important;
<?php
  } ?>
  margin: 0!important;
  padding: 0!important;
  border: none!important;
  font-size: <?php echo $headline_size; ?>px!important;
  line-height: <?php echo $headline_hl_lineheight; ?>em!important;
  min-height: <?php echo $headline_hl_lineheight; ?>em!important;
<?php
  if ( 'valid' == $headline_centering ) { ?>
  text-align: center!important;
<?php
  }
  if ( 'left' == $headline_type && 'valid' == $headline_left_color_grad_onoff ) { ?>
  padding-left: <?php echo $headline_position; ?>%!important;
  padding-left: -webkit-calc(<?php echo $headline_position; ?>% + <?php echo $headline_left_size; ?>px)!important;
  padding-left: calc(<?php echo $headline_position; ?>% + <?php echo $headline_left_size; ?>px)!important;
<?php
  } else { ?>
  padding-left: <?php echo $headline_position; ?>%!important;
<?php
  } ?>
  font-weight: <?php echo $headline_weight; ?>!important;
  padding-top: <?php echo $headline_padding_top; ?>px!important;
  padding-bottom: <?php echo $headline_padding_bottom; ?>px!important;
  margin-top: <?php echo $headline_margin_top; ?>px!important;
  margin-bottom: <?php echo $headline_margin_bottom; ?>px!important;
<?php
  if ( 'left' == $headline_type ) {
    if ( 'invalid' == $headline_left_color_grad_onoff ) { ?>
  border-left: <?php echo $headline_left_size; ?>px solid <?php echo $headline_left_color; ?>!important;
<?php
    } else { ?>
  position: relative!important;
<?php
    }
  }
  if ( 'simple' == $headline_type || 'left' == $headline_type || 'box' == $headline_type ) {
    if ( 'valid' == $headline_under_onoff ) {
      if ( 'invalid' == $headline_under_color_grad_onoff ) { ?>
  border-bottom: <?php echo $headline_under_size; ?>px <?php echo $headline_under_kind; ?> <?php echo $headline_under_color; ?>!important;
<?php
      } else { ?>
  position: relative!important;
<?php
      }
    }
    if ( 'valid' == $headline_over_onoff ) {
      if ( 'invalid' == $headline_over_color_grad_onoff ) { ?>
  border-top: <?php echo $headline_over_size; ?>px <?php echo $headline_over_kind; ?> <?php echo $headline_over_color; ?>!important;
<?php
      } else { ?>
  position: relative!important;
<?php
      }
    }
  }
  // Box
  if ( 'simple' != $headline_type && 'left' != $headline_type ) { ?>
  width: 100%!important;
  box-sizing: border-box!important;
  position: relative!important;
  display: inline-block!important;
  vertical-align: bottom!important;
<?php
    if ( 'box' != $headline_type ) { ?>
  border-bottom: none!important;
<?php
    }
    if ( 'invalid' == $headline_box_color_grad_onoff ) { ?>
  background-color: <?php echo $headline_box_color; ?>!important;
<?php
  } else {
    if ( 'back' == $headline_pic_position ) {
      ta_responsible_gradient_color_style( $key_name . '_box_color', $headline_dec_pic );
    } else {
      ta_responsible_gradient_color_style( $key_name . '_box_color' );
    }
  } ?>
  border-radius: <?php echo $headline_box_round; ?>px!important;
<?php
  } ?>
}

<?php
  // over
  if ( $over_grad_cond ) {
    echo $factor_name; ?>::before {
  content: ""!important;
  position: absolute!important;
  display: block!important;
  width: 100%!important;
  height: <?php echo $headline_over_size; ?>px!important;
  top: -<?php echo $headline_over_size; ?>px!important;
  left: 0!important;
  <?php ta_responsible_gradient_color_style( $key_name . '_over_color' ); ?>
}

<?php
  }
  // under
  if ( ( 'simple' == $headline_type || 'left' == $headline_type || 'box' == $headline_type ) && 'valid' == $headline_under_color_grad_onoff && 'valid' == $headline_under_onoff ) {
    echo $factor_name; ?>::after {
  content: ""!important;
  position: absolute!important;
  display: block!important;
  width: 100%!important;
  height: <?php echo $headline_under_size; ?>px!important;
  bottom: -<?php echo $headline_under_size; ?>px!important;
  left: 0!important;
  <?php ta_responsible_gradient_color_style( $key_name . '_under_color' ); ?>
}

<?php
  }
  // left
  if ( 'left' == $headline_type && 'valid' == $headline_left_color_grad_onoff ) {
    echo $factor_name; ?>::before {
  content: ""!important;
  position: absolute!important;
  display: block!important;
  width: <?php echo $headline_left_size; ?>px!important;
  height: <?php echo $headline_hl_lineheight; ?>em!important;
  padding-top: <?php echo $headline_padding_top; ?>px!important;
  padding-bottom: <?php echo $headline_padding_bottom; ?>px!important;
  top: 0!important;
  left: 0!important;
  <?php ta_responsible_gradient_color_style( $key_name . '_left_color' ); ?>
}

<?php
  }
  // Arrow for balloon1
  if ( 'balloon1' == $headline_type ) {
    echo $factor_name; ?>::after {
  content: ""!important;
  position: absolute!important;
  display: block!important;
  width: 0px!important;
  height: 0px!important;
  border-style: solid!important;
<?php
    if ( 'top' == $headline_arrow_direction1 ) { ?>
  top: -<?php echo $headline_arrow_size1; ?>px!important; left: <?php echo $headline_arrow_position1; ?>%!important;
  margin-left: -<?php echo $headline_arrow_size1; ?>px!important;
  border-width: 0 <?php echo $headline_arrow_size1; ?>px <?php echo $headline_arrow_size1; ?>px <?php echo $headline_arrow_size1; ?>px!important;
  border-color: transparent transparent <?php echo $headline_box_color; ?> transparent!important;
<?php
    } else if ( 'left' == $headline_arrow_direction1 ) { ?>
  top: 50%!important; left: -<?php echo $headline_arrow_size1; ?>px!important;
  margin-top: -<?php echo $headline_arrow_size1; ?>px!important;
  border-width: <?php echo $headline_arrow_size1; ?>px <?php echo $headline_arrow_size1; ?>px <?php echo $headline_arrow_size1; ?>px 0!important;
  border-color: transparent <?php echo $headline_box_color; ?> transparent transparent!important;
<?php
    } else if ( 'bottom' == $headline_arrow_direction1 ) { ?>
  bottom: -<?php echo $headline_arrow_size1; ?>px!important; left: <?php echo $headline_arrow_position1; ?>%!important;
  margin-left: -<?php echo $headline_arrow_size1; ?>px!important;
  border-width: <?php echo $headline_arrow_size1; ?>px <?php echo $headline_arrow_size1; ?>px 0 <?php echo $headline_arrow_size1; ?>px!important;
  border-color: <?php echo $headline_box_color; ?> transparent transparent transparent!important;
<?php
    } else if ( 'right' == $headline_arrow_direction1 ) { ?>
  top: 50%!important; right: -<?php echo $headline_arrow_size1; ?>px!important;
  margin-top: -<?php echo $headline_arrow_size1; ?>px!important;
  border-width: <?php echo $headline_arrow_size1; ?>px 0 <?php echo $headline_arrow_size1; ?>px <?php echo $headline_arrow_size1; ?>px!important;
  border-color: transparent transparent transparent <?php echo $headline_box_color; ?>!important;
<?php
    } ?>
}

<?php
  }
  // Arrow for balloon2
  if ( 'balloon2' == $headline_type ) {
    echo $factor_name; ?>::before {
  content: ""!important;
  position: absolute!important;
  display: block!important;
  width: <?php echo round( 15 * $headline_arrow_size2 / 100 ); ?>px!important;
  height: <?php echo round( 15 * $headline_arrow_size2 / 100 ); ?>px!important;
  background: <?php echo $headline_box_color; ?>!important;
  border-radius: 50%!important;
<?php
    if ( 'right-top' == $headline_arrow_direction2 ) { ?>
  top: <?php echo round( -17 * $headline_arrow_size2 / 100 ); ?>px!important; right: <?php echo round( 15 * $headline_arrow_size2 / 100 ); ?>px!important;
<?php
    } else if ( 'left-top' == $headline_arrow_direction2 ) { ?>
  top: <?php echo round( -17 * $headline_arrow_size2 / 100 ); ?>px!important; left: <?php echo round( 15 * $headline_arrow_size2 / 100 ); ?>px!important;
<?php
    } else if ( 'right-bottom' == $headline_arrow_direction2 ) { ?>
  bottom: <?php echo round( -17 * $headline_arrow_size2 / 100 ); ?>px!important; right: <?php echo round( 15 * $headline_arrow_size2 / 100 ); ?>px!important;
<?php
    } else if ( 'left-bottom' == $headline_arrow_direction2 ) { ?>
  bottom: <?php echo round( -17 * $headline_arrow_size2 / 100 ); ?>px!important; left: <?php echo round( 15 * $headline_arrow_size2 / 100 ); ?>px!important;
<?php
    } ?>
}

<?php
  }
  if ( 'balloon2' == $headline_type ) {
    echo $factor_name; ?>::after {
  content: ""!important;
  position: absolute!important;
  display: block!important;
  width: <?php echo round( 8 * $headline_arrow_size2 / 100 ); ?>px!important;
  height: <?php echo round( 8 * $headline_arrow_size2 / 100 ); ?>px!important;
  background: <?php echo $headline_box_color; ?>!important;
  border-radius: 50%!important;
<?php
    if ( 'right-top' == $headline_arrow_direction2 ) { ?>
  top: <?php echo round( -25 * $headline_arrow_size2 / 100 ); ?>px!important; right: <?php echo round( 25 * $headline_arrow_size2 / 100 ); ?>px!important;
<?php
    } else if ( 'left-top' == $headline_arrow_direction2 ) { ?>
  top: <?php echo round( -25 * $headline_arrow_size2 / 100 ); ?>px!important; left: <?php echo round( 25 * $headline_arrow_size2 / 100 ); ?>px!important;
<?php
    } else if ( 'right-bottom' == $headline_arrow_direction2 ) { ?>
  bottom: <?php echo round( -25 * $headline_arrow_size2 / 100 ); ?>px!important; right: <?php echo round( 25 * $headline_arrow_size2 / 100 ); ?>px!important;
<?php
    } else if ( 'left-bottom' == $headline_arrow_direction2 ) { ?>
  bottom: <?php echo round( -25 * $headline_arrow_size2 / 100 ); ?>px!important; left: <?php echo round( 25 * $headline_arrow_size2 / 100 ); ?>px!important;
<?php
    } ?>
}

<?php
  }
  if ( 'no_image' != $headline_dec_pic && 'back' == $headline_pic_position ) {
    echo $factor_name; ?> {
  background-repeat: <?php echo $headline_pic_repeat_onoff; ?>!important;
}

<?php
  }
  if ( 'invalid' == $headline_font_style_onoff ) {
    echo $factor_name; ?> {
  color: <?php echo $headline_color; ?>!important;
}

<?php
  echo $factor_name; ?> a {
  color: <?php echo $headline_linkedcolor; ?>!important;
  text-decoration: <?php echo $headline_font_underline; ?>!important;
}

<?php
  echo $factor_name; ?> a:hover {
  color: <?php echo $headline_colorhover; ?>!important;
  text-decoration: <?php echo $headline_font_hoverunderline; ?>!important;
}

<?php
  } else {
    echo $factor_name; ?> {
  color: <?php echo ta_select_color_w_image_color( 'ta_common_font_color' ); ?>!important;
}

<?php
    echo $factor_name; ?> a {
  color: <?php echo ta_read_op( 'ta_common_font_anchor_color' ); ?>!important;
  text-decoration: <?php echo ( 'valid' == ta_read_op( 'ta_common_font_anchor_under' ) ) ? 'underline' : 'none'; ?>!important;
}

<?php
  echo $factor_name; ?> a:hover {
  color: <?php echo ta_read_op( 'ta_common_font_anchor_colorhover' ); ?>!important;
  text-decoration: <?php echo ( 'valid' == ta_read_op( 'ta_common_font_anchor_underhover' ) ) ? 'underline' : 'none'; ?>!important;
}

<?php
  }
}


/******** レスポンシブデザイン基本設定共通関数 ********/
function ta_responsible_detail_style_w_php( $key_name, $id_class_name, $rewidth = 'valid', $size2common_onoff='valid' ) {
  $base_switch_width = ta_read_op( 'ta_responsible_base_switch_width' );
  $base_onoff = ta_read_op( 'ta_responsible_base_onoff' );
  $base_width_w_padding = ta_read_op( 'ta_responsible_base_width_w_padding' );
  $onoff = ta_read_op( $key_name . '_onoff' );
  $position = ta_read_op( $key_name . '_position' );
  $w_padding_onoff = ta_read_op( $key_name . '_w_padding_onoff' );
  $top_margin = ta_read_op( $key_name . '_top_margin' );
  $bottom_margin = ta_read_op( $key_name . '_bottom_margin' );
  $edge_margin = ta_read_op( $key_name . '_edge_margin' );
  $size2common = ta_read_op( $key_name . '_size2common' );
  if ( 'valid' == $base_onoff && 'valid' == $onoff ) {  ?>
@media only screen and (max-width : <?php echo $base_switch_width; ?>px){
  <?php echo $id_class_name; ?> {
<?php
    if ( 'valid' == $size2common_onoff ) { ?>
    font-size: <?php echo $size2common; ?>%!important;
<?php
    } ?>
    height: auto!important;
    text-align: <?php echo $position; ?>!important;
    margin-top: <?php echo $top_margin; ?>px!important;
    margin-bottom: <?php echo $bottom_margin; ?>px!important;
<?php
    if ( 'left' == $position ) { ?>
    margin-left: <?php echo $edge_margin ; ?>%!important;
    margin-right: auto!important;
<?php
      if ( 'invalid' == $rewidth ) { ?>
    float: left!important;
<?php
      } else if ( 'valid' == $w_padding_onoff ) { ?>
    width: <?php echo ( $base_width_w_padding - $edge_margin ); ?>%!important;
    padding: 0 <?php echo round( ( 100 - $base_width_w_padding ) / 2 ); ?>%!important;
<?php
      } else { ?>
    width: <?php echo ( 100 - $edge_margin ); ?>%!important;
    padding: 0!important; <?php
      }
    } else if ( 'right' == $position ) { ?>
    margin-left: auto!important;
    margin-right: <?php echo $edge_margin; ?>%!important;
<?php
      if ( 'invalid' == $rewidth ) { ?>
    float: right!important;
<?php
      } else if ( 'valid' == $w_padding_onoff ) { ?>
    width: <?php echo ( $base_width_w_padding - $edge_margin ); ?>%!important;
    padding: 0 <?php echo round( ( 100 - $base_width_w_padding ) / 2 ); ?>%!important;
<?php
      } else { ?>
    width: <?php echo ( 100 - $edge_margin ); ?>%!important;
    padding: 0!important;
<?php
      }
    } else { ?>
    margin-left: auto!important;
    margin-right: auto!important;
<?php
      if ( 'invalid' == $rewidth ) { ?>
    float: none!important;
<?php
      } else if ( 'valid' == $w_padding_onoff ) { ?>
    width: <?php echo $base_width_w_padding; ?>%!important;
    padding: 0 <?php echo round( ( 100 - $base_width_w_padding ) / 2 ); ?>%!important;
<?php
      } else { ?>
    width: 100%!important;
    padding: 0!important;
<?php
      }
    } ?>
    display: inline-block!important;
    vertical-align: bottom!important;
  }
}

<?php
  } else { ?>
@media only screen and (max-width : <?php echo $base_switch_width; ?>px){
  <?php echo $id_class_name; ?> { display: none!important; }
}

<?php
  }
}
