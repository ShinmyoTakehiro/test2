<?php
/*******************************************************************************************************/
/*
/* テックエイドの成長する自作ホームページWordPressテーマ『 TAテーマ001 (ta-theme001) 』
/*
/* ta-backto-top.php: ( Latest Version 2.01 2016.05.08 )
/*
/* このプログラムの著作権、使用権、その他全ての権利はde集まれ株式会社に属します。
/* The copyright, royalty and all the other rights of this program belong to deatsumare Corporation.
/*
/* File Version 履歴
/* File Version 2.00 2016.02.28: first edition by Kotaro Kashiwamura.
/* File Version 2.01 2016.05.08: ta_common_back2top_imgを'built_in'付タイプに修正 by Kotaro Kashiwamura.
/*
/*******************************************************************************************************/

$ta_common_back2top_disponoff = ta_read_op( 'ta_common_back2top_disponoff' );
$ta_common_back2top_text = ta_read_op( 'ta_common_back2top_text' );
$ta_common_back2top_img = ta_read_op_builtin_img( 'ta_common_back2top_img' );
if ( 'valid' == $ta_common_back2top_disponoff ) { ?>
<div class="fixed-space" id="ta_backto_top">
  <a onclick="ta_scrollup(); return false;" href="#wrap">
<?php
  if ( 'no_image' != $ta_common_back2top_img) { ?>
    <img src="<?php echo $ta_common_back2top_img; ?>" alt="back-to-top" />
<?php
  } else if ( 'no_disp' != $ta_common_back2top_text ) {
    ta_deleteyen( $ta_common_back2top_text );
  } ?>
  </a>
</div>
<?php
}
