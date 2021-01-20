<?php
/*******************************************************************************************************/
/*
/* テックエイドの成長する自作ホームページWordPressテーマ『 TAテーマ001 (ta-theme001) 』
/*
/* content-archive.php: ( Latest Version 2.01 2017.03.01 )
/*
/* このプログラムの著作権、使用権、その他全ての権利はde集まれ株式会社に属します。
/* The copyright, royalty and all the other rights of this program belong to deatsumare Corporation.
/*
/* File Version 履歴 
/* File Version 2.00 2016.01.31: first edition by Kotaro Kashiwamura.
/* File Version 2.01 2017.03.01: コンテンツグループ表示バグ修正 by Kotaro Kashiwamura.
/*
/*******************************************************************************************************/
$full_onoff = ta_read_op( 'ta_common_listpage_full_content_onoff' );
$row_num = ta_read_op( 'ta_common_listpage_row_num' );
$count = 1;
while ( have_posts() ) {
  the_post();
  if ( ( 1 == $count % $row_num || 1 == $row_num ) && $count != 1) { ?>
</div><!-- end of .info-contents-group -->
<div class="info-contents-group">
<?php
  } ?>
  <div class="info-contents <?php if ( 0 == $count % $row_num ) echo 'info-contents-edge'; ?>">
<?php
  ta_digest_timecat_title_selection( 'common', 'listpage', 'ind', '', $count );          //独立欄
  if ( 'valid' == $full_onoff ) {
    ta_digest_display_full( 'common', 'listpage', '' );
  } else if ( 'valid' == ta_read_op( 'ta_common_listpage_cgp_onoff' ) ) { ?>
    <div class="info-contents-thmimg-excerpt">
<?php
    ta_digest_display_thumbnail( $count );                                               //Thumbnail Image (div.info-contents-thmimg) ?>
      <div class="info-contents-excerpt info-contents-excerpt-<?php echo $count; ?>">
<?php
    ta_digest_timecat_title_selection( 'common', 'listpage', 'cg_top', '', $count );     //コンテンツグループ上部
    ta_digest_display_excerpt( 'common', 'listpage' );                                   //Excerpt Contents
    ta_digest_timecat_title_selection( 'common', 'listpage', 'cg_bottom', '', $count );  //コンテンツグループ下部 ?>
      </div><!-- end of .info-contents-excerpt -->
    </div><!-- end of .info-contents-thmimg-excerpt -->
<?php
  } ?>
  </div><!-- end of .info-contents -->
<?php
  ta_archive_style( $count );
  $count++;
}
