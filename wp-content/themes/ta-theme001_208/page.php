<?php
/*******************************************************************************************************/
/*
/* テックエイドの成長する自作ホームページWordPressテーマ『 TAテーマ001 (ta-theme001) 』
/*
/* page.php: ( Latest Version 2.03 2017.03.24 )
/*
/* このプログラムの著作権、使用権、その他全ての権利はde集まれ株式会社に属します。
/* The copyright, royalty and all the other rights of this program belong to deatsumare Corporation.
/*
/* File Version 履歴
/* File Version 2.00 2016.02.24: first edition by Kotaro Kashiwamura.
/* File Version 2.01 2016.03.14: SNSボタンオンオフ機能追加 by Kotaro Kashiwamura.
/* File Version 2.02 2016.11.20: ta-backto-top修正 by Kotaro Kashiwamura.
/* File Version 2.03 2017.03.24: 全幅表示用1/4サムネール画像article_image_wide_top追加 by Kotaro Kashiwamura.
/*
/*******************************************************************************************************/
$ta_common_mainte_work_person = ta_read_op( 'ta_common_mainte_work_person' );
if( 'valid' == ta_read_op( 'ta_common_mainte_mode_onoff' ) && ! current_user_can( $ta_common_mainte_work_person ) ){
  get_template_part( 'ta-mainte' );
} else {
  get_header(); ?>
<div id="container">
  <div id="main-sidebarsub">
    <div id="main" role="main">
      <div id="content">
<?php
  if ( TA_HIEND_PI ) {
    $ta_header_glblnv_img_2main_onoff = ta_read_op( 'ta_header_glblnv_img_2main_onoff' );
  } else {
    $ta_header_glblnv_img_2main_onoff = 'invalid';
  }
  if ( TA_HIEND_PI && 'valid' == ta_read_op( 'ta_common_page_view_limit_onoff' ) ) {
    $ta_common_page_view_limit = ta_read_op( 'ta_common_page_view_limit' );
    $ta_common_page_view_limit_link = ta_read_op( 'ta_common_page_view_limit_link' );
    $ta_common_page_view_limit_txt = ta_read_op( 'ta_common_page_view_limit_txt' );
    $ta_post_view_limit = ta_read_post( get_the_ID(), 'ta_post_view_limit' );
  } else {
    $ta_common_page_view_limit = "none";
    $ta_common_page_view_limit_link = "no_link";
    $ta_common_page_view_limit_txt = "no_disp";
    $ta_post_view_limit = 'common';
  }
  if ( 'common' == $ta_post_view_limit ) {
    $ta_this_view_limit = $ta_common_page_view_limit;
    $ta_this_view_limit_txt = $ta_common_page_view_limit_txt;
  } else {
    $ta_this_view_limit = $ta_post_view_limit;
    $ta_this_view_limit_txt = $ta_common_page_view_limit_txt;
  }
  if ( 'valid' == $ta_header_glblnv_img_2main_onoff ) {
    ta_header_globalnavi_image();
  }
  $ta_post_each_top_margin = ta_read_post( get_the_ID(), 'ta_post_each_top_margin' );
  if ( 'common' == $ta_post_each_top_margin ) {
    $page_class = ( 'value' == ta_read_op( 'ta_common_page_top_margin' ) ) ? ' class="ta-page-top-margin"' : ' class="' . ta_read_op( 'ta_common_page_top_margin' ) . '"';
  } else if ( 'value' == $ta_post_each_top_margin ) {
    $page_class = '';
    $ta_post_each_top_margin_value = ta_read_post( get_the_ID(), 'ta_post_each_top_margin_value' );
    echo '<style type="text/css">#page-container-' . get_the_ID() . '{margin-top:' . $ta_post_each_top_margin_value . 'px;}</style>';
  } else {
    $page_class = ' class="' . $ta_post_each_top_margin . '"';
  } ?>
        <div id="page-container-<?php echo get_the_ID(); ?>"<?php echo $page_class; ?>>
<?php
  if ( 'none' == $ta_this_view_limit || current_user_can( $ta_this_view_limit ) ) {
    //SNS表示
    $ta_common_smo_sns_button_onoff = ta_read_op( 'ta_common_smo_sns_button_onoff' );
    $ta_common_smo_page_common_sns_position = ta_read_op( 'ta_common_smo_page_common_sns_position' );
    $ta_post_sns_position = ta_read_post( get_the_ID(), 'ta_post_sns_position' );
    if ( "common_style" == $ta_post_sns_position ) {
      $ta_this_sns_position = $ta_common_smo_page_common_sns_position;
    } else {
      $ta_this_sns_position = $ta_post_sns_position;
    }
    //タイトル表示
    $ta_common_page_custom_title_onoff = ta_read_op( 'ta_common_page_custom_title_onoff' );
    $ta_post_custom_title_onoff = ta_read_post( get_the_ID(), 'ta_post_custom_title_onoff' );
    if ( 'common' == $ta_post_custom_title_onoff ) {
      $ta_title_onoff = $ta_common_page_custom_title_onoff;
    } else {
      $ta_title_onoff = $ta_post_custom_title_onoff;
    }
    //通常の固定ページ表示 ここから
    $ta_common_page_eyecatch_onoff = ta_read_op( 'ta_common_page_eyecatch_onoff' );
    $ta_page_eyecatch_onoff = ta_read_post( get_the_ID(), 'ta_page_eyecatch_onoff' );
    if ( 'common' == $ta_page_eyecatch_onoff ) { $ta_page_eyecatch_onoff = $ta_common_page_eyecatch_onoff; }
    //全幅表示設定
    if ( TA_HIEND_PI ) {
      $ta_common_side2wrap_onoff = ta_read_op( 'ta_common_side2wrap_onoff' );
      $ta_common_side2wrap_ec_varsize_onoff = ta_read_op( 'ta_common_side2wrap_ec_varsize_onoff' );
    } else {
      $ta_common_side2wrap_onoff = "invalid";
      $ta_common_side2wrap_ec_varsize_onoff = "invalid";
    }
    if( have_posts() ) {
      while( have_posts() ) {
        the_post();
        if ( 'valid' == $ta_page_eyecatch_onoff && has_post_thumbnail() ) {
          if ( 'valid' == $ta_common_side2wrap_onoff && 'valid' == $ta_common_side2wrap_ec_varsize_onoff ) { ?>
          <div class="eyecatch-img-top"><?php the_post_thumbnail('article_image_wide_top', array('alt' => the_title_attribute('echo=0'), 'title' => the_title_attribute('echo=0'))); ?></div>
<?php
          } else { ?>
          <div class="eyecatch-img-top"><?php the_post_thumbnail('article_image_top', array('alt' => the_title_attribute('echo=0'), 'title' => the_title_attribute('echo=0'))); ?></div>
<?php
          }
        }
        //固定ページコンテンツSNSボタン
        if ( 'valid' == $ta_common_smo_sns_button_onoff ) {
          if ( "top" == $ta_this_sns_position || "top_bottom" == $ta_this_sns_position ) { ?>
          <div class="main-contents-sns-top"><?php get_template_part('main-sns-button'); ?></div>
<?php
          }
        }
        if ( 'invalid' == $ta_title_onoff ) { ?>
          <h2 class="title"><?php the_title(); ?></h2>
<?php
        }
        the_content();
      }
    }
    //サイトマップ用のファイルを読み込む
    $ta_common_sitemap_onoff = ta_read_op( 'ta_common_sitemap_onoff' );
    $ta_common_sitemap_page_slug = ta_read_op( 'ta_common_sitemap_page_slug' );
    if ( 'valid' == $ta_common_sitemap_onoff && is_page( $ta_common_sitemap_page_slug ) ) { get_template_part( 'ta-sitemap' ); }
    //固定ページコンテンツSNSボタン
    if ( 'valid' == $ta_common_smo_sns_button_onoff ) {
      if ( "bottom" == $ta_this_sns_position || "top_bottom" == $ta_this_sns_position ) { ?>
          <div class="main-contents-sns-bottom"><?php get_template_part('main-sns-button'); ?></div>
<?php
      }
    }
    //エンドロールフリーエリア
    if ( TA_HIEND_PI ) { ta_thm001highend_endroll_freearea_ope( 'page' ); }
    if ( 'invalid' == ta_read_op( 'ta_common_back2top_text_fixed_onoff' ) ) { get_template_part('ta-backto-top'); }
    //通常の固定ページ表示 ここまで
  } else {
    if ( 'no_link' != $ta_common_page_view_limit_link ) { ?>
      <script type="text/javascript">
        var next_url = '<?php echo $ta_common_page_view_limit_link; ?>';
        location.href=next_url;
      </script>
<?php
      exit;
    } else if ( 'no_disp' != $ta_this_view_limit_txt ) {
      ta_eschtml2html_wbr( $ta_this_view_limit_txt );
    }
  } ?>
        </div><!-- end of #page-container -->
<?php
  ta_footer_container(); ?>
      </div><!-- end of #content -->
    </div><!-- end of #main -->
<?php
  $ta_common_frame_type = ta_read_op( 'ta_common_frame_type' );
  $ta_post_frame_type = ta_read_post( get_the_ID(), 'ta_post_frame_type' );
  if ( 'common_style' == $ta_post_frame_type ) {
    $ta_post_frame_type = $ta_common_frame_type;
  }
  if ( "sidebarsub_main_sidebar" == $ta_post_frame_type ) {
    get_sidebar('sub');
  } ?>
  </div><!-- end of #main-sidebarsub -->
<?php
  if ( "main_only" != $ta_post_frame_type ) {
    get_sidebar();
  } ?>
</div><!-- end of #container -->
<?php
  get_footer();
} ?>
