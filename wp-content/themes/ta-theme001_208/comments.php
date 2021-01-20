<?php
/*******************************************************************************************************/
/*
/* テックエイドの成長する自作ホームページWordPressテーマ『 TAテーマ001 (ta-theme001) 』
/*
/* comments.php: ( Latest Version 2.00 2016.02.23 )
/*
/* このプログラムの著作権、使用権、その他全ての権利はde集まれ株式会社に属します。
/* The copyright, royalty and all the other rights of this program belong to deatsumare Corporation.
/*
/* File Version 履歴
/* File Version 2.00 2016.02.23: first edition by Kotaro Kashiwamura.
/*
/*******************************************************************************************************/
if ( post_password_required() ) { return; } ?>
  <section id="comments">
<?php
if ( have_comments() ) {
  $ta_common_comment_disp_title_factor = ta_read_op( 'ta_common_comment_disp_title_factor' );
  $ta_common_comment_disp_title = ta_read_op( 'ta_common_comment_disp_title' );
  $ta_common_comment_disp_title = str_replace( '%name%', get_the_title(), $ta_common_comment_disp_title );
  $ta_common_comment_disp_title = str_replace( '%num%', get_comments_number(), $ta_common_comment_disp_title );
  $ta_common_comment_disp_avatar_size = ta_read_op( 'ta_common_comment_disp_avatar_size' ); ?>
    <<?php echo $ta_common_comment_disp_title_factor; ?> id="comments-list-title" class="title">
      <?php echo $ta_common_comment_disp_title; ?>
    </<?php echo $ta_common_comment_disp_title_factor; ?>>
    <ol class="commentlist">
      <?php wp_list_comments( 'avatar_size=' . $ta_common_comment_disp_avatar_size ); ?>
    </ol>
<?php
  if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { ?>
    <nav class="navigation">
      <ul>
        <li class="nav-previous"><?php previous_comments_link('古いコメント'); ?></li>
        <li class="nav-next"><?php next_comments_link('新しいコメント '); ?></li>
      </ul>
    </nav>
<?php
  }
}
if ( comments_open() ) {
  $ta_common_comment_write_title_factor = ta_read_op( 'ta_common_comment_write_title_factor' );
  $ta_common_comment_write_title = ta_read_op( 'ta_common_comment_write_title' ); ?>
    <<?php echo $ta_common_comment_write_title_factor; ?> id="comment-form-title" class="title">
      <?php echo $ta_common_comment_write_title; ?>
    </<?php echo $ta_common_comment_write_title_factor; ?>>
<?php
}
comment_form(); ?>
  </section>
