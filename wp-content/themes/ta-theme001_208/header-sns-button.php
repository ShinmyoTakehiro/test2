<?php
/*******************************************************************************************************/
/*
/* テックエイドの成長する自作ホームページWordPressテーマ『 TAテーマ001 (ta-theme001) 』
/*
/* header-sns-button.php: ( Latest Version 2.02 2017.04.10 )
/*
/* このプログラムの著作権、使用権、その他全ての権利はde集まれ株式会社に属します。
/* The copyright, royalty and all the other rights of this program belong to deatsumare Corporation.
/*
/* File Version 履歴
/* File Version 2.00 2015.12.14: first edition by Kotaro Kashiwamura.
/* File Version 2.01 2016.12.24: bloginfo修正 by Kotaro Kashiwamura.
/* File Version 2.02 2017.04.10: .ta-sns-box-height追加 by Kotaro Kashiwamura.
/*
/*******************************************************************************************************/

$ta_common_smo_header_display_sns = ta_read_op( 'ta_common_smo_header_display_sns' ); ?>
<ul class="header-sns ta-sns-box-height">
<?php
if ( ta_sns_display_check( $ta_common_smo_header_display_sns, "twitter" ) ) { ?>
  <li class="header-sns-tweet"></li>
<?php
}
if ( ta_sns_display_check( $ta_common_smo_header_display_sns, "facebook" ) ) { ?>
  <li class="header-sns-fb-like"></li>
<?php
}
if ( ta_sns_display_check( $ta_common_smo_header_display_sns, "line" ) ) { ?>
  <li class="header-sns-line"><a href="http://line.me/R/msg/text/?<?php the_title(); ?>%0D%0A<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri() . "/images/ta_sns_logo/linebutton_20x20.png"; ?>" width="20" height="20" alt="LINEで送る" /></a></li>
<?php
}
if ( ta_sns_display_check( $ta_common_smo_header_display_sns, "hatebu" ) ) { ?>
  <li class="header-sns-hatebu"></li>
<?php
}
if ( ta_sns_display_check( $ta_common_smo_header_display_sns, "gplus" ) ) { ?>
  <li class="header-sns-gplus"></li>
<?php
} ?>
</ul>
<?php
