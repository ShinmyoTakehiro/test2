<?php
/**********************************************************************************************************/
/*
/* テックエイドの成長する自作ホームページWordPressテーマ『 TAテーマ001 (ta-theme001) 』
/*
/* front-page.php: ( Latest Version 2.02 2017.01.22 )
/*
/* このプログラムの著作権、使用権、その他全ての権利はde集まれ株式会社に属します。
/* The copyright, royalty and all the other rights of this program belong to deatsumare Corporation.
/*
/* File Version 履歴
/* File Version 2.00 2016.02.24: first edition by Kotaro Kashiwamura.
/* File Version 2.01 2016.03.07: 最新投稿ダイジェスト位置、ウィジェット位置変更 by Kotaro Kashiwamura.
/* File Version 2.02 2017.01.22: ta-backto-top修正 by Kotaro Kashiwamura.
/*
/**********************************************************************************************************/
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
  if ( TA_HIEND_PI && 'valid' == ta_read_op( 'ta_top_view_limit_onoff' ) ) {
    $ta_top_view_limit = ta_read_op( 'ta_top_view_limit' );
    $ta_top_view_limit_link = ta_read_op( 'ta_top_view_limit_link' );
    $ta_top_view_limit_txt = ta_read_op( 'ta_top_view_limit_txt' );
  } else {
    $ta_top_view_limit = "none";
    $ta_top_view_limit_link = "no_link";
    $ta_top_view_limit_txt = "no_disp";
  }
  if ( 'valid' == $ta_header_glblnv_img_2main_onoff ) {
    ta_header_globalnavi_image();
  }
  if ( TA_HIEND_PI ) {
    $ta_top_latestposts_position = ta_read_op( 'ta_top_latestposts_position' );
    $ta_top_widget_position = ta_read_op( 'ta_top_widget_position' );
  } else {
    $ta_top_latestposts_position = 'free_b';
    $ta_top_widget_position = 'free_b';
  }
  $ta_top_postdigest_position = ta_read_op( 'ta_top_postdigest_position' );
  if ( 'none' == $ta_top_view_limit || current_user_can( $ta_top_view_limit ) ) {
    //メインコンテンツSNSボタン
    ta_top_sns_display( 'top', 'top_bottom' );
    //ダイジェスト（説明エリア上）
    if ( 'exp_t' == $ta_top_latestposts_position ) { ta_latestposts_display( 'top' ); }   //最新投稿ダイジェスト（全ての投稿が対象）の表示
    if ( 'exp_t' == $ta_top_postdigest_position ) {
      if ( TA_HIEND_PI ) { ta_postdigest_display( 'top' ); } //各種投稿ダイジェスト
    }
    if ( 'exp_t' == $ta_top_widget_position ) {
      ta_top_demo_widget_display();             //トップページウィジェットデモ画面
      ta_top_widget_display();                  //ウィジェットの表示
    }
    //トップページデモ画面（説明エリア）
    ta_top_demo_exp_display();
    //説明エリア
    if ( TA_HIEND_PI ) { ta_thm001highend_exp_freearea_ope( 'exp' ); }
    //ダイジェスト（説明エリア下）
    if ( 'exp_b' == $ta_top_latestposts_position ) { ta_latestposts_display( 'top' ); }   //最新投稿ダイジェスト（全ての投稿が対象）の表示
    if ( 'exp_b' == $ta_top_postdigest_position ) {
      if ( TA_HIEND_PI ) { ta_postdigest_display( 'top' ); } //各種投稿ダイジェスト
    }
    if ( 'exp_b' == $ta_top_widget_position ) {
      ta_top_demo_widget_display();             //トップページウィジェットデモ画面
      ta_top_widget_display();                  //ウィジェットの表示
    }
    //トップキャッチエリア
    ta_topcatch_display();
    //ダイジェスト（フリーエリア上）
    if ( 'free_t' == $ta_top_latestposts_position ) { ta_latestposts_display( 'top' ); }  //最新投稿ダイジェスト（全ての投稿が対象）の表示
    if ( 'free_t' == $ta_top_postdigest_position ) {
      if ( TA_HIEND_PI ) { ta_postdigest_display( 'top' ); } //各種投稿ダイジェスト
    }
    if ( 'free_t' == $ta_top_widget_position ) {
      ta_top_demo_widget_display();             //トップページウィジェットデモ画面
      ta_top_widget_display();                  //ウィジェットの表示
    }
    //トップページデモ画面（フリーエリア）
    ta_top_demo_fa_display();
    //メインコンテンツフリーエリア
    ta_top_freearea_display( 'top' );
    //ダイジェスト（フリーエリア下）
    if ( 'free_b' == $ta_top_latestposts_position ) { ta_latestposts_display( 'top' ); }  //最新投稿ダイジェスト（全ての投稿が対象）の表示
    if ( 'free_b' == $ta_top_postdigest_position ) {
      if ( TA_HIEND_PI ) { ta_postdigest_display( 'top' ); } //各種投稿ダイジェスト
    }
    if ( 'free_b' == $ta_top_widget_position ) {
      ta_top_demo_widget_display();             //トップページウィジェットデモ画面
      ta_top_widget_display();                  //ウィジェットの表示
    }
    //メインコンテンツSNSボタン
    ta_top_sns_display( 'bottom', 'top_bottom' );
    //エンドロールフリーエリア
    if ( TA_HIEND_PI ) { ta_thm001highend_endroll_freearea_ope( 'front' ); }
    if ( 'invalid' == ta_read_op( 'ta_common_back2top_text_fixed_onoff' ) ) { get_template_part('ta-backto-top'); }
    ta_footer_container();
  } else {
    if ( 'no_link' != $ta_top_view_limit_link ) { ?>
      <script type="text/javascript">
        var next_url = '<?php echo $ta_top_view_limit_link; ?>';
        location.href=next_url;
      </script>
<?php
      exit;
    } else if ( 'no_disp' != $ta_top_view_limit_txt ) {
      ta_eschtml2html_wbr( $ta_top_view_limit_txt );
    }
  } ?>
        </div><!-- end of #content -->
      </div><!-- end of #main -->
<?php
  $ta_common_frame_type = ta_read_op( 'ta_common_frame_type' );
  $ta_top_frame_type = ta_read_op( 'ta_top_frame_type' );
  if ( 'common_style' == $ta_top_frame_type ) {
    $ta_top_frame_type = $ta_common_frame_type;
  }
  if ( "sidebarsub_main_sidebar" == $ta_top_frame_type ) { get_sidebar('sub'); } ?>
    </div><!-- end of #main-sidebarsub -->
<?php
  if ( "main_only" != $ta_top_frame_type ) { get_sidebar(); } ?>
  </div><!-- end of #container -->
<?php
  get_footer();
} ?>
