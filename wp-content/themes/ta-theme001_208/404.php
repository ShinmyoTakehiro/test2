<?php
/*******************************************************************************************************/
/*
/* テックエイドの成長する自作ホームページWordPressテーマ『 TAテーマ001 (ta-theme001) 』
/*
/* 404.php: ( Latest Version 2.01 2017.03.03 )
/*
/* このプログラムの著作権、使用権、その他全ての権利はde集まれ株式会社に属します。
/* The copyright, royalty and all the other rights of this program belong to deatsumare Corporation.
/*
/* File Version 履歴
/* File Version 2.00 2015.12.14: first edition by Kotaro Kashiwamura.
/* File Version 2.01 2017.03.03: タイトルの非表示処理 by Kotaro Kashiwamura.
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
  $ta_common_error404_title = ta_read_op( 'ta_common_error404_title' );
  if ( "no_disp" != $ta_common_error404_title ) { ?>
          <h2 class="title">
            <?php ta_deleteyen( $ta_common_error404_title ); ?>
          </h2>
<?php
  }
  $ta_common_error404_freetext = ta_read_op( 'ta_common_error404_freetext' );
  if ( "" != $ta_common_error404_freetext ) { ?>
          <p><?php ta_eschtml2html_wbr( $ta_common_error404_freetext ); ?></p>
<?php
  }
  get_template_part('ta_backto_top'); ?>
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
