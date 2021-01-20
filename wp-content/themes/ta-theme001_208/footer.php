<?php
/***************************************************************************************************************/
/*
/* テックエイドの成長する自作ホームページWordPressテーマ『 TAテーマ001 (ta-theme001) 』
/*
/* footer.php: ( Latest Version 2.04 2016.11.20 )
/*
/* このプログラムの著作権、使用権、その他全ての権利はde集まれ株式会社に属します。
/* The copyright, royalty and all the other rights of this program belong to deatsumare Corporation.
/*
/* File Version 履歴
/* File Version 2.00 2016.02.28: first edition by Kotaro Kashiwamura.
/* File Version 2.01 2016.03.08: ページ表示速度改善機能をプロへ変更 by Kotaro Kashiwamura.
/* File Version 2.02 2016.05.05: 「HTMLファイル読み込み完了後にスタイルシートを読み込む」削除 by Kotaro Kashiwamura.
/* File Version 2.03 2016.08.20: アディショナルモードに誘導機能追加 by Kotaro Kashiwamura.
/* File Version 2.04 2016.11.20: ta-backto-top追加 by Kotaro Kashiwamura.
/*
/***************************************************************************************************************/ ?>
        </div><!-- end of #wrap -->
      </div><!-- end of #body-wrap -->
      <div id="outer-footer-container">
        <?php ta_footer_container(); ?>
      </div><!-- end of #outer-footer-container -->
      <?php if ( 'valid' == ta_read_op( 'ta_common_back2top_text_fixed_onoff' ) ) { get_template_part('ta-backto-top'); } ?>
    </div><!-- end of #slow-show -->
<?php
wp_enqueue_script( 'scrolljs', get_template_directory_uri() . '/js/ta_scroll.min.js' );
wp_footer();
include_once( TEMPLATEPATH . '/ta-modules/ta-php2freejs.php' );
if ( TA_HIEND_PI ) { ta_thm001highend_guidance_ope(); } ?>
  </body>
</html>
