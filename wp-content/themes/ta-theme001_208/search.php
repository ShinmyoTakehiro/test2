<?php
/*******************************************************************************************************/
/*
/* テックエイドの成長する自作ホームページWordPressテーマ『 TAテーマ001 (ta-theme001) 』
/*
/* search.php: ( Latest Version 2.02 2016.11.20 )
/*
/* このプログラムの著作権、使用権、その他全ての権利はde集まれ株式会社に属します。
/* The copyright, royalty and all the other rights of this program belong to deatsumare Corporation.
/*
/* File Version 履歴
/* File Version 2.00 2016.02.24: first edition by Kotaro Kashiwamura.
/* File Version 2.01 2016.03.14: SNSボタンオンオフ機能追加 by Kotaro Kashiwamura.
/* File Version 2.02 2016.11.20: ta-backto-top修正 by Kotaro Kashiwamura.
/*
/*******************************************************************************************************/
$ta_common_mainte_work_person = ta_read_op( 'ta_common_mainte_work_person' );
if( 'valid' == ta_read_op( 'ta_common_mainte_mode_onoff' ) && ! current_user_can( $ta_common_mainte_work_person ) ){
  get_template_part( 'ta-mainte' );
} else {
  get_header();
  $archive_class = ( 'value' == ta_read_op( 'ta_common_listpage_top_margin' ) ) ? 'ta-archive-top-margin' : ta_read_op( 'ta_common_listpage_top_margin' ); ?>
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
  if ( TA_HIEND_PI && 'valid' == ta_read_op( 'ta_common_search_view_limit_onoff' ) ) {
    $ta_common_search_view_limit = ta_read_op( 'ta_common_search_view_limit' );
    $ta_common_search_view_limit_link = ta_read_op( 'ta_common_search_view_limit_link' );
    $ta_common_search_view_limit_txt = ta_read_op( 'ta_common_search_view_limit_txt' );
  } else {
    $ta_common_search_view_limit = "none";
    $ta_common_search_view_limit_link = "no_link";
    $ta_common_search_view_limit_txt = "no_disp";
  }
  if ( 'valid' == $ta_header_glblnv_img_2main_onoff ) {
    ta_header_globalnavi_image();
  } ?>
          <div id="search-container" class="<?php echo $archive_class; ?>">
<?php
  if ( 'none' == $ta_common_search_view_limit || current_user_can( $ta_common_search_view_limit ) ) {
    //SNS表示
    $ta_common_smo_sns_button_onoff = ta_read_op( 'ta_common_smo_sns_button_onoff' );
    $ta_this_sns_position = ta_read_op( 'ta_common_smo_listpage_sns_position' );
    //一覧ページSNSボタン
    if ( 'valid' == $ta_common_smo_sns_button_onoff ) {
      if ( "top" == $ta_this_sns_position || "top_bottom" == $ta_this_sns_position ) { ?>
            <div class="main-contents-sns-top"><?php get_template_part('main-sns-button'); ?></div>
<?php
      }
    } ?>
            <h2 class="title">「<?php the_search_query(); ?>」の検索結果</h2>
            <div id="archive-list">
              <div class="info-contents-group head">
<?php
    if ( have_posts() && get_search_query() ) {
      get_template_part('content-archive'); ?>
              </div><!-- end of .info-contents-group -->
            </div><!-- end of #archive-list -->
<?php
      //ページャー表示
      $ta_common_listpage_pager_type = ta_read_op( 'ta_common_listpage_pager_type' );
      if ( 'none' != $ta_common_listpage_pager_type ) {
        if ( 'numdisp' == $ta_common_listpage_pager_type ) {
          ta_pager();
        } else {
          ta_pager_prenext( 'archive' );
        }
      }
    } else { ?>
                <p>お探しの記事が見つかりません。</p>
              </div><!-- end of .info-contents-group -->
            </div><!-- end of #archive-list -->
<?php
    }
    //一覧ページSNSボタン
    if ( 'valid' == $ta_common_smo_sns_button_onoff ) {
      if ( "bottom" == $ta_this_sns_position || "top_bottom" == $ta_this_sns_position ) { ?>
            <div class="main-contents-sns-bottom"><?php get_template_part('main-sns-button'); ?></div>
<?php
      }
    }
    //エンドロールフリーエリア
    if ( TA_HIEND_PI ) { ta_thm001highend_endroll_freearea_ope( 'list' ); }
    if ( 'invalid' == ta_read_op( 'ta_common_back2top_text_fixed_onoff' ) ) { get_template_part('ta-backto-top'); }
  } else {
    if ( 'no_link' != $ta_common_search_view_limit_link ) { ?>
      <script type="text/javascript">
        var next_url = '<?php echo $ta_common_search_view_limit_link; ?>';
        location.href=next_url;
      </script>
<?php
      exit;
    } else if ( 'no_disp' != $ta_common_search_view_limit_txt ) { ta_eschtml2html_wbr( $ta_common_search_view_limit_txt ); }
  } ?>
          </div><!-- end of #search-container -->
<?php
  ta_footer_container(); ?>
        </div><!-- end of #content -->
      </div><!-- end of #main -->
<?php
  $ta_common_frame_type = ta_read_op( 'ta_common_frame_type' );
  if ( "sidebarsub_main_sidebar" == $ta_common_frame_type ) {
    get_sidebar('sub');
  } ?>
    </div><!-- end of #main-sidebarsub -->
<?php
  if ( "main_only" != $ta_common_frame_type ) {
    get_sidebar();
  } ?>
  </div><!-- end of #container -->
<?php
  get_footer();
} ?>
