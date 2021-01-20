<?php
/****************************************************************************************************/
/*
/* テックエイドの成長する自作ホームページWordPressテーマ『 TAテーマ001 (ta-theme001) 』
/*
/* ta-template-functions.php: ( Latest Version 2.06 2017.04.10 )
/*
/* このプログラムの著作権、使用権、その他全ての権利はde集まれ株式会社に属します。
/* The copyright, royalty and all the other rights of this program belong to deatsumare Corporation.
/*
/* File Version 履歴
/* File Version 2.00 2016.03.07: first edition by Kotaro Kashiwamura.
/* File Version 2.01 2016.03.30: showposts -> posts_per_page変更
/*                               サイドバー各種投稿ダイジェスト位置、サイドバーウィジェット位置変更
/*                               フッターウィジェット位置変更
/*                               フリーエリアバナー画像付随文バグ修正
/*                               ta_bread_crumb()のカスタム投稿タイプへの対応
/*                               SNSボタンオンオフ機能追加
/*                               カスタム投稿タイプのシングル表示をロボット検索拒否
/*                               ダイジェストデザインコンテンツグループ表示追加
/*                               フリーエリア境界線内背景色追加 by Kotaro Kashiwamura.
/* File Version 2.02 2016.05.08: ta_top_topcatch_pic, ta_header_logo_picを'built_in'付タイプに修正
/*                               by Kotaro Kashiwamura.
/* File Version 2.03 2016.06.30: ta_google_map_disp_no_shortcode()削除
/*                               ta_post_freearea_imgtext_border_round追加
/*                               フッターメニュー不具合(containerの有無)修正
/*                               ハイエンド無効時のTA汎用背景装飾ショートコード処理追加 by Kotaro Kashiwamura.
/* File Version 2.04 2016.08.29: ta_meta_keywords_display(), ta_meta_description_display()にオンオフ機能追加
/*                               トップページフリーエリア、サイドバーフリーエリア、個別ページ背景画表示関数
/*                               のレスポンシブオフ時の制限バグ修正
/*                               カスタム投稿にPC表示オンオフ機能追加、ta_logo_group_h1_text修正、
/*                               パンくずナビのメインコンテンツへの移動追加、
/*                               フリーエリアのリンクCSS修正、トップキャッチエリア修正
/*                               ヘッドライン用ショートコード追加、コピーライトPro制限削除
/*                               各ページ専用ヘッダー画像の設定追加 by Kotaro Kashiwamura.
/* File Version 2.05 2017.03.11: サイドバーメニュー追加、メイン・（サブ）サイドバー区切り線追加
/*                               サイドバーデモ画面（サイドバーメニュー）追加
/*                               ta_footer_container()にdiv#back-bottom-bar追加、get_the_categoryを
/*                               使用している箇所をis_singular('post')に変更、
/*                               テーマ初期設定に関する関数追加 by Kotaro Kashiwamura.
/* File Version 2.06 2017.04.10: ta_frame_dynamic_css()に全幅モード時の可変アイキャッチ画像設定追加、
/*                               レスポン時のタイトル上アイキャッチ画像の最大高さ解除追加、
/*                               定位置フッターのブラウザ全幅表示追従機能追加 by Kotaro Kashiwamura.
/*
/****************************************************************************************************/

/************************************************************************************************/
/*********************************** トップページに関する関数 ***********************************/
/************************************************************************************************/
//トップキャッチエリア
function ta_topcatch_display() {
  $ta_top_topcatch_num = ta_read_op( 'ta_top_topcatch_num' );
  $ta_top_topcatch_link_newwin_onoff = ta_read_op( 'ta_top_topcatch_link_newwin_onoff' );
  $ta_top_topcatch_frame_title_onoff = ta_read_op( 'ta_top_topcatch_frame_title_onoff' );
  $ta_top_topcatch_frame_title_factor = ta_read_op( 'ta_top_topcatch_frame_title_factor' );
  $ta_top_topcatch_frame_title = ta_read_op( 'ta_top_topcatch_frame_title' );
  $ta_top_topcatch_title_factor = ta_read_op( 'ta_top_topcatch_title_factor' );
  $topcatch_class = ( 'value' == ta_read_op( 'ta_top_topcatch_top_margin' ) ) ? 'ta-topcatch-top-margin' : ta_read_op( 'ta_top_topcatch_top_margin' );
  $ta_top_topcatch_continue_text = ta_read_op( 'ta_top_topcatch_continue_text' );
  if ( $ta_top_topcatch_num ) { ?>
        <div id="ta-topcatch-area-container" class="<?php echo $topcatch_class; ?>">
<?php
    if ( 'valid' == $ta_top_topcatch_frame_title_onoff ) { ?>
          <<?php echo $ta_top_topcatch_frame_title_factor; ?> class="ta-topcatch-frame-title title">
<?php
      ta_deleteyen( $ta_top_topcatch_frame_title ); ?>
          </<?php echo $ta_top_topcatch_frame_title_factor; ?>>
<?php
    } ?>
          <div id="ta-topcatch-area">
<?php
    for ( $i = 0; $i < $ta_top_topcatch_num; $i++ ) {
      $ta_top_topcatch_title_onoff = ta_read_op( 'ta_top_topcatch_title_onoff' . ( $i + 1 ) );
      $ta_top_topcatch_title = ta_read_op( 'ta_top_topcatch_title' . ( $i + 1 ) );
      if ( $i < 3 ) {
        $ta_top_topcatch_pic = ta_read_op_builtin_img( 'ta_top_topcatch_pic' . ( $i + 1 ) );
      } else {
        $ta_top_topcatch_pic = ta_read_op( 'ta_top_topcatch_pic' . ( $i + 1 ) );
      }
      $ta_top_topcatch_text = ta_read_op( 'ta_top_topcatch_text' . ( $i + 1 ) );
      $ta_top_topcatch_link = ta_read_op( 'ta_top_topcatch_link' . ( $i + 1 ) ); ?>
            <div id="ta-topcatch<?php echo ($i + 1); ?>">
<?php
      if ( 'valid' == $ta_top_topcatch_title_onoff ) { ?>
              <<?php echo $ta_top_topcatch_title_factor; ?> class="ta-topcatch-title title">
<?php
        if ( 'no_link' != $ta_top_topcatch_link ) { ?>
                <a href="<?php echo $ta_top_topcatch_link; ?>">
<?php
        }
        ta_deleteyen( $ta_top_topcatch_title );
        if ( 'no_link' != $ta_top_topcatch_link ) { ?>
                </a>
<?php
        } ?>
              </<?php echo $ta_top_topcatch_title_factor; ?>>
<?php
      }
      if ( "no_image" != $ta_top_topcatch_pic ) { ?>
              <div class="ta-topcatch-img-container">
<?php
        if ( 'no_link' != $ta_top_topcatch_link ) { ?>
                <a href="<?php echo $ta_top_topcatch_link; ?>">
<?php
        } ?>
                  <img src="<?php echo $ta_top_topcatch_pic; ?>" alt="<?php ta_deleteyen( $ta_top_topcatch_title ); ?>" />
<?php
        if ( 'no_link' != $ta_top_topcatch_link ) { ?>
                </a>
<?php
        } ?>
              </div>
<?php
      }
      if ( 'no_disp' != $ta_top_topcatch_text ) { ?>
              <p class="ta-topcatch-text"><?php ta_eschtml2html_wbr( $ta_top_topcatch_text ); ?></p>
<?php
        if ( 'no_link' != $ta_top_topcatch_link ) { ?>
              <a class="ta-topcatch-continue" href="<?php echo $ta_top_topcatch_link; ?>"><?php echo $ta_top_topcatch_continue_text; ?></a>
<?php
        }
      } ?>
            </div><!-- end of #ta-topcatch<?php echo ($i + 1); ?> -->
<?php
    } ?>
          </div><!-- end of #ta-topcatch-area -->
        </div><!-- end of #ta-topcatch-area-container -->
<?php
    if ( 'valid' == $ta_top_topcatch_link_newwin_onoff ) { ?>
        <script type="text/javascript">
          jQuery( '#ta-topcatch-area-container a' ).attr( 'target' , '_blank' );
        </script>
<?php
    }
  }
}


//トップページフリーエリアの表記
function ta_top_freearea_display( $single_ver ) {
  $ta_common_top_freearea_onoff = ta_read_op( 'ta_top_freearea_onoff' );
  $ta_common_top_freearea_title_onoff = ta_read_op( 'ta_top_freearea_title_onoff' );
  $ta_top_freearea_display_order = ta_read_op( 'ta_top_freearea_display_order' );
  if ( "valid" == $ta_common_top_freearea_onoff || 'single' == $single_ver ) {
    $args = array(
     'post_type'      =>  'ta_main_fa',
     'post_status'    =>  'publish',
     'posts_per_page' =>  TAMAINFA_LIM,
     'meta_key'       =>  '_ta_post_order',
     'orderby'        =>  'meta_value_num',
     'order'          =>  $ta_top_freearea_display_order,
    );
    if ( 'single' != $single_ver ) { $sub_query = new WP_Query( $args ); }
    if ( ( 'single' != $single_ver ) ? $sub_query->have_posts() : have_posts() ) {
      while ( ( 'single' != $single_ver ) ? $sub_query->have_posts() : have_posts() ) {
        ( 'single' != $single_ver ) ? $sub_query->the_post() : the_post();
        $post_id = get_the_ID();
        $ta_post_top_margin = ta_read_post( $post_id, 'ta_post_top_margin' );
        if ( 'value' == $ta_post_top_margin ) {
          $top_class = '';
          $ta_post_top_margin_value = ta_read_post( $post_id, 'ta_post_top_margin_value' );
          echo '<style type="text/css">#main-freearea-contents-' . $post_id . '{margin-top:' . $ta_post_top_margin_value . 'px;}</style>';
        } else {
          $top_class = ' class="' . $ta_post_top_margin . '"';
        }
        echo '<div id="main-freearea-contents-' . $post_id . '"' . $top_class . '>';
        $ta_post_freearea_title_onoff = ta_read_post( $post_id, 'ta_post_freearea_title_onoff' );
        if ( "common" == $ta_post_freearea_title_onoff ) {
          $ta_top_freearea_title_onoff = $ta_common_top_freearea_title_onoff;
        } else {
          $ta_top_freearea_title_onoff = $ta_post_freearea_title_onoff;
        }
        if ( "valid" == $ta_top_freearea_title_onoff ) {   ?>
    <<?php ta_top_freearea_title_factor( $post_id ); ?> class="title"><?php the_title() ?></<?php ta_top_freearea_title_factor( $post_id ); ?>>
<?php
        } ?>
    <div class="ta_top_freearea_display">
<?php
        the_content();
        $ta_post_freearea_img_centering = ta_read_post( $post_id, 'ta_post_freearea_img_centering' );
        $ta_post_freearea_img = ta_read_post( $post_id, 'ta_post_freearea_img' );
        $ta_post_freearea_img_link = ta_read_post( $post_id, 'ta_post_freearea_img_link' );
        $ta_post_main_freearea_img_width = ta_read_post( $post_id, 'ta_post_main_freearea_img_width' );
        $ta_post_freearea_img_leftmargin = ta_read_post( $post_id, 'ta_post_freearea_img_leftmargin' );
        $ta_post_freearea_text = ta_read_post( $post_id, 'ta_post_freearea_text' );
        $ta_post_freearea_text_link = ta_read_post( $post_id, 'ta_post_freearea_text_link' );
        $ta_post_freearea_text_leftmargin = ta_read_post( $post_id, 'ta_post_freearea_text_leftmargin' );
        $ta_post_freearea_text_position = ta_read_post( $post_id, 'ta_post_freearea_text_position' );
        if ( TA_HIEND_PI ) {
          $ta_post_freearea_imgtext_border_type = ta_read_post( $post_id, 'ta_post_freearea_imgtext_border_type' );
          $ta_post_freearea_imgtext_border_bgcolor = ta_select_color_w_image_color_posttype( $post_id, 'ta_post_freearea_imgtext_border_bgcolor' );
        } else {
          $ta_post_freearea_imgtext_border_type = "none";
          $ta_post_freearea_imgtext_border_bgcolor = "transparent";
        }
        $ta_post_freearea_imgtext_border_size = ta_read_post( $post_id, 'ta_post_freearea_imgtext_border_size' );
        $ta_post_freearea_imgtext_border_color = ta_select_color_w_image_color_posttype( $post_id, 'ta_post_freearea_imgtext_border_color' );
        $ta_post_freearea_imgtext_border_round = ta_read_post( $post_id, 'ta_post_freearea_imgtext_border_round' );
        $ta_post_freearea_imgtext_border_kind = ta_read_post( $post_id, 'ta_post_freearea_imgtext_border_kind' );
        $ta_post_freearea_imgtext_border_padding = ta_read_post( $post_id, 'ta_post_freearea_imgtext_border_padding' );
        $ta_post_freearea_imgtext_width = ta_read_post( $post_id, 'ta_post_freearea_imgtext_width' );
        $ta_post_freearea_text_fontsize = ta_read_post( $post_id, 'ta_post_freearea_text_fontsize' );
        $ta_post_freearea_text_fontweight = ta_read_post( $post_id, 'ta_post_freearea_text_fontweight' );
        $ta_post_freearea_text_fontcolor = ta_select_color_w_image_color_posttype( $post_id, 'ta_post_freearea_text_fontcolor' );
        $ta_post_freearea_text_fontcolorhover = ta_select_color_w_image_color_posttype( $post_id, 'ta_post_freearea_text_fontcolorhover' );
        $ta_post_freearea_text_underline_onoff = ( 'valid' == ta_read_post( $post_id, 'ta_post_freearea_text_underline_onoff' ) ) ? 'underline' : 'none';
        $ta_post_freearea_text_tpadding = ta_read_post( $post_id, 'ta_post_freearea_text_tpadding' );
        $ta_post_freearea_text_bpadding = ta_read_post( $post_id, 'ta_post_freearea_text_bpadding' );
        $ta_post_freearea_img_width_for_rsp = ta_read_post( $post_id, 'ta_post_freearea_img_width_for_rsp' );
        $ta_post_freearea_imgtext_width_for_rsp = ta_read_post( $post_id, 'ta_post_freearea_imgtext_width_for_rsp' );
        $ta_post_freearea_img_link_newwin_onoff = ( 'valid' == ta_read_post( $post_id, 'ta_post_freearea_img_link_newwin_onoff' ) ) ? 'target="_blank"' : '';
        $ta_post_freearea_text_link_newwin_onoff = ( 'valid' == ta_read_post( $post_id, 'ta_post_freearea_text_link_newwin_onoff' ) ) ? 'target="_blank"' : '';
        if ( 'no_image' != $ta_post_freearea_img ) { ?>
      <div <?php if ( 'valid' == $ta_post_freearea_img_centering ) { ?>style="text-align:center;" <?php } ?>class="sidebar_freearea_img" id="freearea_img_<?php echo $post_id; ?>">
<?php
          if ( 'top' == $ta_post_freearea_text_position ) {
            if ( 'no_link' != $ta_post_freearea_text_link ) { ?>
        <a class="attend-text-anc" href="<?php echo $ta_post_freearea_text_link ?>" <?php echo $ta_post_freearea_text_link_newwin_onoff; ?>>
<?php
            } ?>
          <div class="attend-text" style="margin-left:<?php echo $ta_post_freearea_text_leftmargin; ?>px" ><?php ta_eschtml2html_wbr( $ta_post_freearea_text ); ?></div>
<?php
            if ( 'no_link' != $ta_post_freearea_text_link ) { ?>
        </a>
<?php
            }
          }
          if ( 'no_link' != $ta_post_freearea_img_link ) { ?>
        <a href="<?php echo $ta_post_freearea_img_link ?>" <?php echo $ta_post_freearea_img_link_newwin_onoff; ?>>
<?php
          } ?>
          <img id="img-<?php echo $post_id; ?>" style="margin-left:<?php echo $ta_post_freearea_img_leftmargin; ?>%;width:<?php echo $ta_post_main_freearea_img_width; ?>%;height:auto" alt="freearea_img_<?php echo $post_id; ?>" src="<?php echo $ta_post_freearea_img; ?>" />
<?php
          if ( 'no_link' != $ta_post_freearea_img_link ) { ?>
        </a>
<?php
          }
          if ( 'bottom' == $ta_post_freearea_text_position ) {
            if ( 'no_link' != $ta_post_freearea_text_link ) { ?>
        <a class="attend-text-anc" href="<?php echo $ta_post_freearea_text_link ?>" <?php echo $ta_post_freearea_text_link_newwin_onoff; ?>>
<?php
            } ?>
          <div class="attend-text" style="margin-left:<?php echo $ta_post_freearea_text_leftmargin; ?>px" ><?php ta_eschtml2html_wbr( $ta_post_freearea_text ); ?></div>
<?php
            if ( 'no_link' != $ta_post_freearea_text_link ) { ?>
        </a>
<?php
            }
          } ?>
      </div>
<?php
        } ?>
    </div>
    <style type="text/css">
      #main-freearea-contents-<?php echo $post_id; ?> {
        box-sizing: border-box;
        background-color: <?php echo $ta_post_freearea_imgtext_border_bgcolor; ?>;
        width: <?php echo $ta_post_freearea_imgtext_width; ?>%;
        margin-left: <?php echo ( 100 - $ta_post_freearea_imgtext_width ) / 2; ?>%;
<?php
        if ( 'b' == $ta_post_freearea_imgtext_border_type ) { ?>
        padding: 0 0 <?php echo $ta_post_freearea_imgtext_border_padding; ?>px;
        border-bottom: <?php echo $ta_post_freearea_imgtext_border_size; ?>px <?php echo $ta_post_freearea_imgtext_border_kind; ?> <?php echo $ta_post_freearea_imgtext_border_color; ?>;
<?php
        } else if ( 'l-b' == $ta_post_freearea_imgtext_border_type ) { ?>
        padding: 0 0 <?php echo $ta_post_freearea_imgtext_border_padding; ?>px <?php echo $ta_post_freearea_imgtext_border_padding; ?>px;
        border-bottom: <?php echo $ta_post_freearea_imgtext_border_size; ?>px <?php echo $ta_post_freearea_imgtext_border_kind; ?> <?php echo $ta_post_freearea_imgtext_border_color; ?>;
        border-left: <?php echo $ta_post_freearea_imgtext_border_size; ?>px <?php echo $ta_post_freearea_imgtext_border_kind; ?> <?php echo $ta_post_freearea_imgtext_border_color; ?>;
<?php
        } else if ( 'r-b' == $ta_post_freearea_imgtext_border_type ) { ?>
        padding: 0 <?php echo $ta_post_freearea_imgtext_border_padding; ?>px <?php echo $ta_post_freearea_imgtext_border_padding; ?>px 0;
        border-bottom: <?php echo $ta_post_freearea_imgtext_border_size; ?>px <?php echo $ta_post_freearea_imgtext_border_kind; ?> <?php echo $ta_post_freearea_imgtext_border_color; ?>;
        border-right: <?php echo $ta_post_freearea_imgtext_border_size; ?>px <?php echo $ta_post_freearea_imgtext_border_kind; ?> <?php echo $ta_post_freearea_imgtext_border_color; ?>;
<?php
        } else if ( 'square' == $ta_post_freearea_imgtext_border_type ) { ?>
        padding: <?php echo $ta_post_freearea_imgtext_border_padding; ?>px;
        border: <?php echo $ta_post_freearea_imgtext_border_size; ?>px <?php echo $ta_post_freearea_imgtext_border_kind; ?> <?php echo $ta_post_freearea_imgtext_border_color; ?>;
<?php
        } ?>
        border-radius: <?php echo $ta_post_freearea_imgtext_border_round; ?>px;
<?php
        if ( 'invalid' == ta_read_post( $post_id, 'ta_post_freearea_normal_disp_onoff' ) ) { ?>
        display: none;
<?php
        } else { ?>
        display: block;
<?php
        } ?>
      }

      #main-freearea-contents-<?php echo $post_id; ?> .attend-text {
        font-size: <?php echo $ta_post_freearea_text_fontsize; ?>%;
        font-weight: <?php echo $ta_post_freearea_text_fontweight; ?>;
        color: <?php echo $ta_post_freearea_text_fontcolor; ?>;
        padding-top: <?php echo $ta_post_freearea_text_tpadding; ?>em;
        padding-bottom: <?php echo $ta_post_freearea_text_bpadding; ?>em;
      }
      
      #main #main-freearea-contents-<?php echo $post_id; ?> .attend-text-anc {
        color: <?php echo $ta_post_freearea_text_fontcolor; ?>;
        text-decoration: <?php echo $ta_post_freearea_text_underline_onoff; ?>;
      }
      
      #main #main-freearea-contents-<?php echo $post_id; ?> .attend-text-anc:hover,
      #main #main-freearea-contents-<?php echo $post_id; ?> .attend-text-anc:hover .attend-text {
        color: <?php echo $ta_post_freearea_text_fontcolorhover; ?>;
      }
    </style>
<?php
        if ( 'valid' == ta_read_op( 'ta_responsible_base_onoff' ) ) { ?>
    <style type="text/css">
      @media only screen and (max-width : <?php echo ta_read_op( 'ta_responsible_base_switch_width' ); ?>px){
        #main-freearea-contents-<?php echo $post_id; ?> {
          box-sizing: border-box;
<?php
          if ( 'invalid' == ta_read_post( $post_id, 'ta_post_freearea_responsible_disp_onoff' ) ) { ?>
          display: none!important;
<?php
          } else { ?>
          display: block!important;
<?php
          }
          if ( $ta_post_freearea_imgtext_width_for_rsp >= 0 ) { ?>
          width: <?php echo $ta_post_freearea_imgtext_width_for_rsp; ?>%!important;
          margin-left: <?php echo ( 100 - $ta_post_freearea_imgtext_width_for_rsp ) / 2; ?>%!important;
<?php
          } ?>
        }
        #main-freearea-contents-<?php echo $post_id; ?> #img-<?php echo $post_id; ?> {
          margin-left:<?php echo $ta_post_freearea_img_leftmargin; ?>%!important;
          width: <?php echo $ta_post_freearea_img_width_for_rsp; ?>%!important;
        }
      }
    </style>
<?php
        } ?>
  </div>
<?php
      }
    }
    if ( 'single' != $single_ver ) { wp_reset_postdata(); }
  }
}

//トップページフリーエリアのタイトル要素
function ta_top_freearea_title_factor( $post_id ) {
  $common_value = ta_read_op( 'ta_top_freearea_title_factor' );
  $post_value = ta_read_post( $post_id, 'ta_post_freearea_title_factor' );
  if ( 'common' == $post_value ) {
    $value = $common_value;
  } else {
    $value = $post_value;
  }
  echo $value;
}

function ta_top_widget_display() {
  $ta_top_widget_onoff = ta_read_op( 'ta_top_widget_onoff' );
  if ( "valid" == $ta_top_widget_onoff ) {
    dynamic_sidebar( 'main-contents' );
  }
}

function ta_top_sns_display( $pos1, $pos2 ) {
  $ta_common_smo_sns_button_onoff = ta_read_op( 'ta_common_smo_sns_button_onoff' );
  $ta_top_sns_position = ta_read_op( 'ta_top_sns_position' );
  if ( 'valid' == $ta_common_smo_sns_button_onoff ) {
    if ( $pos1 == $ta_top_sns_position || $pos2 == $ta_top_sns_position ) { ?>
          <div class="main-contents-sns-<?php echo $pos1; ?>"><?php get_template_part('main-sns-button'); ?></div>
<?php
    }
  }
}

//トップページデモ画面
function ta_top_demo_exp_display() {
  if ( 'valid' == ta_read_op( 'ta_theme_demo' ) ) {?>
  <div style="border:2px solid black;margin-bottom:30px;">
    <p style="font-size:120%;">（デモ表示：説明エリア）</p>
    <p style="font-size:220%;text-align:center;line-height:1.5em;">投稿記事のように<br />任意のコンテンツを<br />複数個挿入できます</p>
  </div>
<?php
  }
}

function ta_top_demo_fa_display() {
  if ( 'valid' == ta_read_op( 'ta_theme_demo' ) ) {?>
  <div style="border:2px solid black;margin-top: 30px;margin-bottom: 30px;">
    <p style="font-size:120%;">（デモ表示：トップフリーエリア）</p>
    <p style="font-size:220%;text-align:center;line-height:1.5em;">投稿記事のように<br />任意のコンテンツを<br />複数個挿入できます</p>
  </div>
<?php
  }
}

function ta_top_demo_widget_display() {
  if ( 'valid' == ta_read_op( 'ta_theme_demo' ) ) {
    $ta_top_widget_title_factor = ta_read_op( 'ta_top_widget_title_factor' );
    $init_args = array(
      'before_widget' => '<aside class="ta-widget-container fixed-space %s">',
      'after_widget' => '</aside>',
      'before_title' => '<' . $ta_top_widget_title_factor . ' class="title">',
      'after_title' => '</' . $ta_top_widget_title_factor . '>',
    );
    $instance = array(
      'title' => '最近のコメント (widgetデモ)',
    );
    the_widget( 'WP_Widget_Recent_Comments', $instance, $init_args );
  }
}


/********************************************************************************************/
/******************************** テーマ初期設定に関する関数 ********************************/
/********************************************************************************************/
function ta_reset_dataname_disp() {
  $ta_common_reset_dataname = get_option( '_ta_common_reset_dataname' );
  $ta_switch_theme_process = get_option( '_ta_switch_theme_process' );
  if ( '' == $ta_common_reset_dataname && 'valid' == $ta_switch_theme_process ) { ?>
  <div id="disp-after-setup-theme">
    <div style="font-size:110%;display:inline-block;vertical-align:bottom;width:100%;">
      <h2 style="float:left;">TAテーマ001 Version <?php echo TATHEME001; ?> 初期設定</h2>
      <img style="height:2em;float:right;display:block;" src="<?php echo get_template_directory_uri(); ?>/images/ta-header-images/logo.png"/>
    </div>
    <p style="margin-top:1em;font-size:90%;">TAテーマ001（Ver. <?php echo TATHEME001; ?>）をご採用いただきましてありがとうございます。<br>各種初期設定をしますので当てはまる条件を選んで『テーマ初期設定実行』ボタンをクリックしてください。</p>
    <form method="post" action="" enctype="multipart/form-data">
      <?php wp_nonce_field( 'ta_init_dataname_nonce_key', 'ta_init_dataname_setting_menu' ); ?>
      <p style="font-weight:bold;margin-bottom:0.5em;"><input type="radio" name="ta_init_dataname" value=0 checked="checked"> TAテーマ001の旧バージョンからのバージョンアップ</p>
      <p style="color:#ff0000;font-size:90%;">※ バージョンアップの方が新規インストール専用を選択するとサイトデザインが乱れる可能性がありますのでご注意ください。</p>
      <table style="width:49em;">
        <tr>
          <td>
            <p style="font-weight:bold;margin-bottom:0.2em;"><input type="radio" name="ta_init_dataname" value=1> 新規インストール専用（デザイン#1）</p>
            <a href="http://deatsumare.sakura.ne.jp/init_data_images/init_data1.png" target="_blank"><img style="margin-left:2em;width:235px;" src="<?php echo get_template_directory_uri(); ?>/images/ta-admin-images/init_data1.png" /></a>
          </td>
          <td>
            <p style="font-weight:bold;margin-bottom:0.2em;"><input type="radio" name="ta_init_dataname" value=2> 新規インストール専用（デザイン#2）</p>
            <a href="http://deatsumare.sakura.ne.jp/init_data_images/init_data2.png" target="_blank"><img style="margin-left:2em;width:235px;" src="<?php echo get_template_directory_uri(); ?>/images/ta-admin-images/init_data2.png" /></a>
          </td>
        </tr>
      </table>
      <p style="margin-top:0.5em;font-size:90%;">※ 新規インストール専用のデザインの画像をクリックすると拡大します。</p>
      <div id="setting_submit" style="margin-top:1em;text-align:center;">
        <p><input type="submit" id="ta-init-dataname-submit" name="ta_init_dataname_submit" value="テーマ初期設定実行" /></p>
      </div>
    </form>
  </div>
  <style type="text/css">
    #body-wrap {
      opacity: 0.2;
    }
    #disp-after-setup-theme {
      padding: 1em 2em 0 2em!important;
      margin-left: -22.5em!important;
      position: fixed!important;
      top: 10em!important;
      left: 50%!important;
      width: 45em!important;
      height: auto!important;
      background-color:#f1f1f1!important;
      border: 5px solid #aaaaaa;
      z-index: 999;
    }
    #ta-init-dataname-submit {
      background: #0085ba;
      border-color: #0073aa #006799 #006799;
      -webkit-box-shadow: 0 1px 0 #006799;
      box-shadow: 0 1px 0 #006799;
      color: #fff;
      text-decoration: none;
      text-shadow: 0 -1px 1px #006799,1px 0 1px #006799,0 1px 1px #006799,-1px 0 1px #006799;
      display: inline-block;
      text-decoration: none;
      font-size: 13px;
      line-height: 26px;
      height: 28px;
      margin: 0;
      padding: 0 10px 1px;
      cursor: pointer;
      border-width: 1px;
      border-style: solid;
      -webkit-appearance: none;
      -webkit-border-radius: 3px;
      border-radius: 3px;
      white-space: nowrap;
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
    }
    #ta-init-dataname-submit:hover {
      background: #008ec2;
      border-color: #006799;
      color: #fff;
    }
  </style>
<?php
  }
}


/********************************************************************************************/
/*********************************** ヘッダーに関する関数 ***********************************/
/********************************************************************************************/
//ヘッダーバナーエリア
function ta_header_bannerarea() {
  $ta_common_js_warning_onoff = ta_read_op( 'ta_common_js_warning_onoff' );
  $ta_header_logo_pic = ta_read_op_builtin_img( 'ta_header_logo_pic' );
  $ta_header_logo_text = ta_read_op( 'ta_header_logo_text' );
  $ta_header_logo_link = ta_read_op( 'ta_header_logo_link' );
  $ta_header_bannerarea_type = ta_read_op( 'ta_header_bannerarea_type' );
  $ta_header_h1_position = ta_read_op( 'ta_header_h1_position' );
  $ta_header_h1_content_link_newwin_onoff = ta_read_op( 'ta_header_h1_content_link_newwin_onoff' );
  $ta_header_info_pic = ta_read_op( 'ta_header_info_pic' );
  $ta_header_info_text = $init_value = ta_read_op( 'ta_header_info_text' );
  $ta_header_info_link = ta_read_op( 'ta_header_info_link' );
  $ta_header_info_sns_onoff = ta_read_op( 'ta_header_info_sns_onoff' );
  $ta_header_search_sns_onoff = ta_read_op( 'ta_header_search_sns_onoff' );
  //SNSボタン（オンオフ）
  $ta_common_smo_sns_button_onoff = ta_read_op( 'ta_common_smo_sns_button_onoff' );
  //ヘッダー部表示（固定ページ共通）
  $ta_common_page_custom_banner_onoff = ta_read_op( 'ta_common_page_custom_banner_onoff' );
  //ヘッダー部表示（投稿記事ページ共通）
  $ta_common_post_custom_banner_onoff = ta_read_op( 'ta_common_post_custom_banner_onoff' );
  //ヘッダー部表示（一覧ページ共通）
  $ta_common_listpage_banner_onoff = ta_read_op( 'ta_common_listpage_banner_onoff' );
  //ヘッダー部表示（投稿個別）
  $ta_post_custom_common_onoff = ta_read_post( get_the_ID(), 'ta_post_custom_common_onoff' );
  $ta_post_custom_banner_onoff = ta_read_post( get_the_ID(), 'ta_post_custom_banner_onoff' );
  //ヘッダー部表示（カテゴリー個別：一覧ページ）
  if ( is_archive() ) {
    $cat_id = get_query_var('cat');
    $ta_cat_header_common_onoff = ( '' == get_option( '_ta_cat_header_common_onoff_' . $cat_id ) ) ? 'valid' : get_option( '_ta_cat_header_common_onoff_' . $cat_id );
    $ta_cat_banner_onoff = ( '' == get_option( '_ta_cat_banner_onoff_' . $cat_id ) ) ? 'invalid' : get_option( '_ta_cat_banner_onoff_' . $cat_id );
  } else {
    $ta_cat_header_common_onoff = '';
    $ta_cat_banner_onoff = '';
  }
  if ( is_page() ) {  //固定ページ
    if ( 'valid' == $ta_post_custom_common_onoff ) {
      $ta_banner_onoff = $ta_common_page_custom_banner_onoff;
    } else {
      $ta_banner_onoff = $ta_post_custom_banner_onoff;
    }
  } else if ( is_archive() ) {  //一覧ページ
    if ( 'valid' == $ta_cat_header_common_onoff ) {
      $ta_banner_onoff = $ta_common_listpage_banner_onoff;
    } else {
      $ta_banner_onoff = $ta_cat_banner_onoff;
    }
  } else {  //投稿記事ページ
    if ( 'valid' == $ta_post_custom_common_onoff ) {
      $ta_banner_onoff = $ta_common_post_custom_banner_onoff;
    } else {
      $ta_banner_onoff = $ta_post_custom_banner_onoff;
    }
  }
  //ヘッダーバナーエリアの記述
  if ( is_front_page() || 'invalid' == $ta_banner_onoff ) { ?>
      <div id="header" role="banner">
<?php
    if ( 'valid' == $ta_common_js_warning_onoff ) { ?>
        <noscript>
          <div id="no-js-disp">
            <p><?php bloginfo('name'); ?>は<br/>JavaScriptを使用しています。<br/>お使いのブラウザの設定を有効にして下さい。</p>
          </div>
        </noscript>
<?php
    } ?>
        <div id="banner-area">
          <div id="logo-group">
<?php
    if ( "top" == $ta_header_h1_position ) { ?>
            <h1 id="logo-group-h1-text"><?php ta_logo_group_h1_text(); ?></h1>
<?php
    } ?>
            <<?php ta_logo_group_img_factor(); ?> id="logo-group-img">
<?php
    if ( "no_link" != $ta_header_logo_link ) { ?>
              <a href="<?php echo $ta_header_logo_link; ?>" <?php ta_target_blank( 'ta_header_logo_link' ); ?>>
<?php
    } else { ?>
              <div id="logo-group-noanc">
<?php
    }
    if ( "no_image" != $ta_header_logo_pic ) { ?>
                <img src="<?php echo $ta_header_logo_pic; ?>" alt="<?php bloginfo('description'); bloginfo('name'); ?>" />
<?php
    } else { ?>
                <div id="logo-group-noimg"><?php if ( 'no_disp' != $ta_header_logo_text ) ta_eschtml2html_wbr( $ta_header_logo_text ); ?></div>
<?php
    }
    if ( "no_link" != $ta_header_logo_link ) { ?>
              </a>
<?php
    } else { ?>
              </div><!-- end of #logo-group-noanc -->
<?php
    } ?>
            </<?php ta_logo_group_img_factor(); ?>><!-- end of #logo-group-img -->
<?php
    if ( "bottom" == $ta_header_h1_position ) { ?>
            <h1 id="logo-group-h1-text"><?php ta_logo_group_h1_text(); ?></h1>
<?php
    } ?>
          </div><!-- end of #logo-group -->
<?php
    //連絡先グループ
    if ( "logo_info_search" == $ta_header_bannerarea_type || "logo_info" ==  $ta_header_bannerarea_type ) { ?>
          <div id="info-group">
<?php
      //ヘッダートップメニュー（連絡先エリア簡易メニュー）
      $ta_header_info_menu_onoff = ta_read_op( 'ta_header_info_menu_onoff' );
      if ( "valid" == $ta_header_info_menu_onoff ) {
        if ( has_nav_menu( 'ta_headertop_info_menu' ) ) {
          wp_nav_menu( array(
            'container' => 'div',
            'container_id' => 'ta-headertop-info-menu',
            'theme_location' => 'ta_headertop_info_menu',
          ) );
        } else { ?>
            <div id="ta-headertop-info-menu">
              <ul>
              <?php wp_list_pages( 'title_li=' ); ?>
              </ul>
            </div><!-- end of #ta-headertop-info-menu-->
<?php
        }
      } ?>
            <div id="info-group-img">
<?php
      if ( "no_link" != $ta_header_info_link ) { ?>
              <a href="<?php echo $ta_header_info_link; ?>" <?php ta_target_blank( 'ta_header_info_link' ); ?>>
<?php
      } else { ?>
              <div id="info-group-noanc">
<?php
      }
      if ( "no_image" != $ta_header_info_pic ) { ?>
                <img src="<?php echo $ta_header_info_pic; ?>" alt="<?php bloginfo('description'); bloginfo('name'); ?>" />
<?php
      } else { ?>
                <div id="info-group-noimg"><?php if ( 'no_disp' != $ta_header_info_text ) ta_eschtml2html_wbr( $ta_header_info_text ); ?></div>
<?php
      }
      if ( "no_link" != $ta_header_info_link ) { ?>
              </a>
<?php
      } else { ?>
              </div><!-- end of #info-group-noanc -->
<?php
      } ?>
            </div><!-- end of #info-group-img -->
<?php
      if ( 'valid' == $ta_common_smo_sns_button_onoff && 'valid' == $ta_header_info_sns_onoff ) {?>
            <div class="sns-group">
<?php
        get_template_part('header-sns-button'); ?>
            </div>
<?php
      } ?>
          </div><!-- end of #info-group-->
<?php
    }
    //検索グループ
    if ( "logo_info_search" == $ta_header_bannerarea_type || "logo_search" ==  $ta_header_bannerarea_type ) { ?>
          <div id="search-group">
<?php
      //ヘッダートップメニュー（検索エリア簡易メニュー）
      $ta_header_search_menu_onoff = ta_read_op( 'ta_header_search_menu_onoff' );
      if ( "valid" == $ta_header_search_menu_onoff ) {
        if ( has_nav_menu( 'ta_headertop_search_menu' ) ) {
          wp_nav_menu( array(
            'container' => 'div',
            'container_id' => 'ta-headertop-search-menu',
            'theme_location' => 'ta_headertop_search_menu',
          ) );
        } else { ?>
            <div id="ta-headertop-search-menu">
              <ul>
              <?php wp_list_pages( 'title_li=' ); ?>
              </ul>
            </div><!-- end of #ta-headertop-search-menu-->
<?php
        }
      } ?>
            <div id="search" role="search">
<?php
      echo get_search_form(); ?>
            </div><!-- end of #search -->
<?php
      if ( 'valid' == $ta_common_smo_sns_button_onoff && 'valid' == $ta_header_search_sns_onoff ) {?>
            <div class="sns-group">
<?php
        get_template_part('header-sns-button'); ?>
            </div>
<?php
      } ?>
          </div><!-- end of #search-group-->
<?php
    } ?>
        </div><!-- end of #banner-area -->
      </div><!-- end of #header -->
<?php
    if ( 'valid' == $ta_header_h1_content_link_newwin_onoff ) { ?>
      <script type="text/javascript">
        jQuery( '#logo-group-h1-text a' ).attr( 'target' , '_blank' );
      </script>
<?php
    }
  }
}

//ヘッダーバナーエリア
function ta_header_globalnavi_image() {
  //ヘッダー部表示（固定ページ共通）
  $ta_common_page_custom_image_onoff = ta_read_op( 'ta_common_page_custom_image_onoff' );
  $ta_common_page_custom_global_onoff = ta_read_op( 'ta_common_page_custom_global_onoff' );
  $ta_common_page_custom_bread_onoff = ta_read_op( 'ta_common_page_custom_bread_onoff' );
  //ヘッダー部表示（投稿記事ページ共通）
  $ta_common_post_custom_image_onoff = ta_read_op( 'ta_common_post_custom_image_onoff' );
  $ta_common_post_custom_global_onoff = ta_read_op( 'ta_common_post_custom_global_onoff' );
  $ta_common_post_custom_bread_onoff = ta_read_op( 'ta_common_post_custom_bread_onoff' );
  //ヘッダー部表示（一覧ページ共通）
  $ta_common_listpage_image_onoff = ta_read_op( 'ta_common_listpage_image_onoff' );
  $ta_common_listpage_global_onoff = ta_read_op( 'ta_common_listpage_global_onoff' );
  $ta_common_listpage_bread_onoff = ta_read_op( 'ta_common_listpage_bread_onoff' );
  //ヘッダー部表示（投稿個別）
  $ta_post_custom_common_onoff = ta_read_post( get_the_ID(), 'ta_post_custom_common_onoff' );
  $ta_post_custom_image_onoff = ta_read_post( get_the_ID(), 'ta_post_custom_image_onoff' );
  $ta_post_custom_global_onoff = ta_read_post( get_the_ID(), 'ta_post_custom_global_onoff' );
  $ta_post_custom_bread_onoff = ta_read_post( get_the_ID(), 'ta_post_custom_bread_onoff' );
  //ヘッダー部表示（カテゴリー個別：一覧ページ）
  if ( is_archive() ) {
    $cat_id = get_query_var('cat');
    $ta_cat_header_common_onoff = ( '' == get_option( '_ta_cat_header_common_onoff_' . $cat_id ) ) ? 'valid' : get_option( '_ta_cat_header_common_onoff_' . $cat_id );
    $ta_cat_image_onoff = ( '' == get_option( '_ta_cat_image_onoff_' . $cat_id ) ) ? 'invalid' : get_option( '_ta_cat_image_onoff_' . $cat_id );
    $ta_cat_global_onoff = ( '' == get_option( '_ta_cat_global_onoff_' . $cat_id ) ) ? 'invalid' : get_option( '_ta_cat_global_onoff_' . $cat_id );
    $ta_cat_bread_onoff = ( '' == get_option( '_ta_cat_bread_onoff_' . $cat_id ) ) ? 'invalid' : get_option( '_ta_cat_bread_onoff_' . $cat_id );
  } else {
    $ta_cat_header_common_onoff = '';
    $ta_cat_image_onoff = '';
    $ta_cat_global_onoff = '';
    $ta_cat_bread_onoff = '';
  }
  if ( is_page() ) {  //固定ページ
    if ( 'valid' == $ta_post_custom_common_onoff ) {
      $ta_image_onoff = $ta_common_page_custom_image_onoff;
      $ta_global_onoff = $ta_common_page_custom_global_onoff;
      $ta_bread_onoff = $ta_common_page_custom_bread_onoff;
    } else {
      $ta_image_onoff = $ta_post_custom_image_onoff;
      $ta_global_onoff = $ta_post_custom_global_onoff;
      $ta_bread_onoff = $ta_post_custom_bread_onoff;
    }
  } else if ( is_archive() ) {  //一覧ページ
    if ( 'valid' == $ta_cat_header_common_onoff ) {
      $ta_image_onoff = $ta_common_listpage_image_onoff;
      $ta_global_onoff = $ta_common_listpage_global_onoff;
      $ta_bread_onoff = $ta_common_listpage_bread_onoff;
    } else {
      $ta_image_onoff = $ta_cat_image_onoff;
      $ta_global_onoff = $ta_cat_global_onoff;
      $ta_bread_onoff = $ta_cat_bread_onoff;
    }
  } else {  //投稿記事ページ
    if ( 'valid' == $ta_post_custom_common_onoff ) {
      $ta_image_onoff = $ta_common_post_custom_image_onoff;
      $ta_global_onoff = $ta_common_post_custom_global_onoff;
      $ta_bread_onoff = $ta_common_post_custom_bread_onoff;
    } else {
      $ta_image_onoff = $ta_post_custom_image_onoff;
      $ta_global_onoff = $ta_post_custom_global_onoff;
      $ta_bread_onoff = $ta_post_custom_bread_onoff;
    }
  } ?>
      <div id="header-globalnavi-image">
<?php
  /*********** グローバルメニューの表示 ここから ***********/
  //グローバルナビ（ヘッダー画像の上位の場合）
  $ta_header_glabalmenu_position = ta_read_op( 'ta_header_glabalmenu_position' );
  if ( is_front_page() || 'invalid' == $ta_global_onoff ) {
    if ( 'top' == $ta_header_glabalmenu_position ) {
      ta_global_navi_module();
    }
  }
  /*********** グローバルメニューの表示 ここまで ***********/

  /*********** ヘッダー画像の表示 ここから ***********/
  //ヘッダー画像
  $ta_header_headimg_select = ta_read_op( 'ta_header_headimg_select' );
  $ta_header_headimg_link = ta_read_op( 'ta_header_headimg_link' );
  $ta_header_headimg_link_newwin_onoff = ta_read_op( 'ta_header_headimg_link_newwin_onoff' );
  $ta_header_headimg_insertpage = ta_read_op( 'ta_header_headimg_insertpage' );
  $ta_header_headimg_text_onoff = ta_read_op( 'ta_header_headimg_text_onoff' );
  $ta_header_headimg_text = ta_read_op( 'ta_header_headimg_text' );
  if ( TA_HIEND_PI && is_page() ) {  //固定ページ
    $ta_page_header_img_kind = ta_read_post( get_the_ID(), 'ta_page_header_img_kind' );
    $ta_page_header_img_pic = ta_read_post( get_the_ID(), 'ta_page_header_img_pic' );
    $ta_page_header_img_link = ta_read_post( get_the_ID(), 'ta_page_header_img_link' );
    $ta_page_header_img_link_newwin_onoff = ta_read_post( get_the_ID(), 'ta_page_header_img_link_newwin_onoff' );
    $ta_page_header_img_shortcode = ta_read_post( get_the_ID(), 'ta_page_header_img_shortcode' );
  } else if ( TA_HIEND_PI && ( is_category() ) ) {  //カテゴリー一覧
    $cat_id = get_query_var('cat');
    $ta_page_header_img_kind = ( '' == get_option( '_ta_cat_header_img_kind_' . $cat_id ) ) ? 'common' : get_option( '_ta_cat_header_img_kind_' . $cat_id );
    $ta_page_header_img_pic = ( '' == get_option( '_ta_cat_header_img_pic_' . $cat_id ) ) ? 'no_image' : get_option( '_ta_cat_header_img_pic_' . $cat_id );
    $ta_page_header_img_link = ( '' == get_option( '_ta_cat_header_img_link_' . $cat_id ) ) ? 'no_link' : get_option( '_ta_cat_header_img_link_' . $cat_id );
    $ta_page_header_img_link_newwin_onoff = ( '' == get_option( '_ta_cat_header_img_link_newwin_onoff_' . $cat_id ) ) ? 'no_link' : get_option( '_ta_cat_header_img_link_newwin_onoff_' . $cat_id );
    $ta_page_header_img_shortcode = ( '' == get_option( '_ta_cat_header_img_shortcode_' . $cat_id ) ) ? '' : get_option( '_ta_cat_header_img_shortcode_' . $cat_id );
  } else if ( TA_HIEND_PI && ( is_singular( 'post' ) ) ) {  //投稿記事
    $cat = get_the_category();
    $cat_id = $cat[0]->cat_ID;
    $ta_page_header_img_kind = ( '' == get_option( '_ta_cat_header_img_kind_' . $cat_id ) ) ? 'common' : get_option( '_ta_cat_header_img_kind_' . $cat_id );
    $ta_page_header_img_pic = ( '' == get_option( '_ta_cat_header_img_pic_' . $cat_id ) ) ? 'no_image' : get_option( '_ta_cat_header_img_pic_' . $cat_id );
    $ta_page_header_img_link = ( '' == get_option( '_ta_cat_header_img_link_' . $cat_id ) ) ? 'no_link' : get_option( '_ta_cat_header_img_link_' . $cat_id );
    $ta_page_header_img_link_newwin_onoff = ( '' == get_option( '_ta_cat_header_img_link_newwin_onoff_' . $cat_id ) ) ? 'no_link' : get_option( '_ta_cat_header_img_link_newwin_onoff_' . $cat_id );
    $ta_page_header_img_shortcode = ( '' == get_option( '_ta_cat_header_img_shortcode_' . $cat_id ) ) ? '' : get_option( '_ta_cat_header_img_shortcode_' . $cat_id );
  } else {
    $ta_page_header_img_kind = 'common';
    $ta_page_header_img_pic = 'no_image';
    $ta_page_header_img_link = 'no_link';
    $ta_page_header_img_link_newwin_onoff  = 'invalid';
    $ta_page_header_img_shortcode = '';
  }
  if ( TA_HIEND_PI && ! is_front_page() && 'common' != $ta_page_header_img_kind && 'invalid' == $ta_image_onoff ) {
    if ( 'image' == $ta_page_header_img_kind ) { ?>
        <div id="header_image">
<?php
      if ( 'no_link' != $ta_page_header_img_link ) { ?>
          <a href="<?php echo $ta_page_header_img_link; ?>">
<?php
      }
      if ( 'no_image' != $ta_page_header_img_pic ) { ?>
          <img src="<?php echo $ta_page_header_img_pic; ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="<?php bloginfo('description'); bloginfo('name'); ?>" />
<?php
      }
      if ( 'no_link' != $ta_page_header_img_link ) { ?>
          </a>
<?php
      } ?>
        </div><!-- #header_image end -->
<?php
      if ( 'valid' == $ta_page_header_img_link_newwin_onoff ) { ?>
        <script type="text/javascript">
          jQuery( '#header_image a' ).attr( 'target' , '_blank' );
        </script>
<?php
      }
    } else if ( 'shortcode' == $ta_page_header_img_kind ) { ?>
        <div id="header_freearea">
          <?php echo do_shortcode( $ta_page_header_img_shortcode ); ?>
        </div><!-- #header_freearea end -->
<?php
    }
  } else if ( is_front_page() || 'invalid' == $ta_image_onoff ) {
    if ( ( is_front_page() || "all" == $ta_header_headimg_insertpage ) && 'none' != $ta_header_headimg_select ) { 
      if ( 'original' == $ta_header_headimg_select ) { ?>
        <div id="header_image">
<?php
        if ( 'no_link' != $ta_header_headimg_link ) { ?>
          <a href="<?php echo $ta_header_headimg_link; ?>">
<?php
        }
        if ( 'valid' == $ta_header_headimg_text_onoff ) { ?>
          <h1 id="header_image_text"><?php ta_eschtml2html_wbr( $ta_header_headimg_text ); ?></h1>
<?php
        } ?>
          <img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="<?php bloginfo('description'); bloginfo('name'); ?>" />
<?php
        if ( 'no_link' != $ta_header_headimg_link ) { ?>
          </a>
<?php
        } ?>
        </div><!-- #header_image end -->
<?php
        if ( 'valid' == $ta_header_headimg_link_newwin_onoff ) { ?>
        <script type="text/javascript">
          jQuery( '#header_image a' ).attr( 'target' , '_blank' );
        </script>
<?php
        }
      } else { ?>
        <div id="header_freearea">
<?php
        if ( TA_HIEND_PI ) { ta_thm001highend_header_freearea_ope( 'header' ); } ?>
        </div><!-- #header_freearea end -->
<?php
      }
    }
  }
  /*********** ヘッダー画像の表示 ここまで ***********/

  /*********** グローバルメニューの表示 ここから ***********/
  //グローバルナビ（ヘッダー画像の下位の場合）
  if ( is_front_page() || 'invalid' == $ta_global_onoff ) {
    if ( 'bottom' == $ta_header_glabalmenu_position ) {
      ta_global_navi_module();
    }
  }
  /*********** グローバルメニューの表示 ここまで ***********/

  $search_terms = isset( $_GET['s'] );
  if ( $search_terms ) { ?>
        <script type="text/javascript">
          jQuery('#additional-search #search input#s').val('');
        </script>
<?php
  }

  /*********** パンくずナビの表示 ここから ***********/
  if ( is_front_page() || 'invalid' == $ta_bread_onoff ) {
    //パンくずナビ
    if ( !is_404() && !$search_terms && !is_singular( array( 'ta_header_fa', 'ta_exp_fa', 'ta_main_fa', 'ta_sidebar_fa', 'ta_sidebarsub_fa', 'ta_footer_fa', 'ta_endroll_fa' ) ) ) {
      if ( !is_front_page() ) {
        ta_bread_crumb();
        if ( 'valid' == ta_read_op( 'ta_common_bread_tomain_onoff' ) ) { ?>
        <script type="text/javascript">
          jQuery(function() {
            jQuery('#ta_bread_crumb').prependTo('#content');
          });
        </script>
<?php
        }
      }
    }
  }
  /*********** パンくずナビの表示 ここまで ***********/ ?>
      </div><!-- #header-globalnavi-image end -->
<?php
}

//サイトタイトルタグのテキストを出力
function ta_display_title() {
  global $page, $paged;
  if ( is_404() ) {
    echo '404 Not Found | ';
    bloginfo('name');
  } else if( "ta_type" == ta_read_op( 'ta_common_seo_site_title_format' ) ) {
    if ( is_search() ) {
      wp_title( '', true, 'left' );
      echo ' | ';
    } elseif ( is_front_page() ) {
      bloginfo('name');
      echo ' | ';
    } else {
      wp_title( '|', true, 'right' );
    }
    bloginfo('description');
  } else {
    if ( is_search() ) {
      wp_title( '', true, 'left' );
      echo ' | ';
      bloginfo('name');
    } elseif ( is_front_page() ) {
      bloginfo('name');
      echo ' | ';
      bloginfo('description');
    } else {
      wp_title( '|', true, 'right' );
      bloginfo('name');
    }
  }
  
  if ( $paged >= 2 || $page >= 2 ) {
    echo ' | ' . sprintf( '%sページ', max( $paged, $page ) );
  }
}

//メタデータのキーワードを出力
function ta_meta_keywords_display() {
  $ta_common_seo_common_keywords = ta_read_op( 'ta_common_seo_common_keywords' );
  $ta_top_seo_keywords = ta_read_op( 'ta_top_seo_keywords' );
  $ta_post_seo_keywords = ta_read_post( get_the_ID(), 'ta_post_seo_keywords' );
  $ta_common_seo_cat_keywordonoff = ta_read_op( 'ta_common_seo_cat_keywordonoff' );
  $ta_common_seo_tag_keywordonoff = ta_read_op( 'ta_common_seo_tag_keywordonoff' );
  if( is_singular( 'post' ) ) {
    $ta_post_cats = get_the_category();
    $ta_post_cat = "";
    foreach ( (array)$ta_post_cats as $data ) {
      if ( "" != $ta_post_cat ) { $ta_post_cat .= ','; }
      if ( "" != $data ) { $ta_post_cat .= $data->name; }
    }
    $ta_post_tags = get_the_tags();
    $ta_post_tag = "";
    foreach ( (array)$ta_post_tags as $data ) {
      if ( "" != $ta_post_tag ) { $ta_post_tag .= ','; }
      if ( "" != $data ) { $ta_post_tag .= $data->name; }
    }
  }
  $ta_seo_keywords = "";
  /* トップページ */
  if ( is_front_page() ) {
    if( "" != $ta_top_seo_keywords && "" != $ta_common_seo_common_keywords ) {
      $ta_seo_keywords = $ta_top_seo_keywords . ',' . $ta_common_seo_common_keywords;
    } else {
      $ta_seo_keywords = $ta_top_seo_keywords . $ta_common_seo_common_keywords;
    }
  } else if ( is_page() || is_singular( 'post' ) ) {
    if( "" != $ta_post_seo_keywords && "" != $ta_common_seo_common_keywords ) {
      $ta_seo_keywords = $ta_post_seo_keywords . ',' . $ta_common_seo_common_keywords;
    } else {
      $ta_seo_keywords = $ta_post_seo_keywords . $ta_common_seo_common_keywords;
    }
    if ( is_singular( 'post' ) ) {
      if ( 'valid' == $ta_common_seo_cat_keywordonoff ) { 
        if( "" != $ta_post_cat && "" != $ta_seo_keywords ) {
          $ta_seo_keywords = $ta_post_cat . ',' . $ta_seo_keywords;
        } else {
          $ta_seo_keywords = $ta_post_cat . $ta_seo_keywords;
        }
      }
      if ( 'valid' == $ta_common_seo_tag_keywordonoff ) {
        if( "" != $ta_post_tag && "" != $ta_seo_keywords ) {
          $ta_seo_keywords = $ta_post_tag . ',' . $ta_seo_keywords;
        } else {
          $ta_seo_keywords = $ta_post_tag . $ta_seo_keywords;
        }
      }
    }
  } else {
    $ta_seo_keywords = $ta_common_seo_common_keywords;
  }
  if ( 'valid' == ta_read_op( 'ta_common_seo_keywords_onoff' ) ) { ?>
  
    <!-- keywords -->
    <meta name="keywords" content="<?php ta_deleteyen( $ta_seo_keywords ); ?>" />
    <!-- keywords -->
<?php
  }
}

//メタデータのディスクリプションを出力
function ta_meta_description_display() {
  $ta_common_seo_common_description = ta_read_op( 'ta_common_seo_common_description' );
  $ta_top_seo_description = ta_read_op( 'ta_top_seo_description' );
  $ta_post_seo_description = ta_read_post( get_the_ID(), 'ta_post_seo_description' );
  $ta_common_seo_description_excerptonoff = ta_read_op( 'ta_common_seo_description_excerptonoff' );

  /* トップページ */
  if ( is_front_page() ) {
    if( "" != $ta_top_seo_description ) {
      $ta_seo_description = $ta_top_seo_description;
    } else {
      $ta_seo_description = $ta_common_seo_common_description;
    }
  } else if ( is_page() || is_single() ) {
    if( "" != $ta_post_seo_description ) {
      $ta_seo_description = $ta_post_seo_description;
    } else {
      if ( 'valid' == $ta_common_seo_description_excerptonoff ) {
        $value = get_post()->post_content;
        $value = strip_tags( $value );  //htmlタグの削除
        /* 改行などを無視して文章を設定文字数抜粋する */
        $value = strip_shortcodes( $value );
        $value = str_replace( '&nbsp;', "", $value );
        $value = str_replace( array( "\r\n","\r","\n" ), '', $value );
        $value = wp_html_excerpt( $value, 120 );
        $ta_seo_description = $value;
      } else {
        $ta_seo_description = $ta_common_seo_common_description;
      }
    }
  } else {
    $ta_seo_description = $ta_common_seo_common_description;
  }
  if ( 'valid' == ta_read_op( 'ta_common_seo_description_onoff' ) ) { ?>
    <!-- description -->
    <meta name="description" content="<?php ta_deleteyen( $ta_seo_description ); ?>" />
    <!-- description -->
<?php
  }
}

//メタデータのロボットインデックス・フォローを出力
function ta_meta_robots_display() {
  $blog_public = get_option( 'blog_public' ); //1: open, 0: reject
  $ta_top_indexfollow = ta_read_op( 'ta_top_indexfollow' );
  $ta_post_indexfollow = ta_read_post( get_the_ID(), 'ta_post_indexfollow' );
  $ta_common_listpage_indexfollow = ta_read_op( 'ta_common_listpage_indexfollow' );
  
  if ( $blog_public ) {
    if ( is_front_page() ) {
      if ( 'none' != $ta_top_indexfollow ) { ?>
    <!-- robots index-follow -->
    <meta name='robots' content='<?php echo $ta_top_indexfollow; ?>' />
    <!-- robots index-follow -->
<?php
      }
    } else if ( is_page() || is_single() ) {
      if ( is_singular( array( 'ta_header_fa', 'ta_exp_fa', 'ta_main_fa', 'ta_sidebar_fa', 'ta_sidebarsub_fa', 'ta_footer_fa', 'ta_endroll_fa' ) ) ) { ?>
    <!-- robots index-follow -->
    <meta name='robots' content='noindex,follow' />
    <!-- robots index-follow -->
<?php
      } else if ( 'none' != $ta_post_indexfollow ) { ?>
    <!-- robots index-follow -->
    <meta name='robots' content='<?php echo $ta_post_indexfollow; ?>' />
    <!-- robots index-follow -->
<?php
      }
    } else {
      if ( 'none' != $ta_common_listpage_indexfollow ) { ?>
    <!-- robots index-follow -->
    <meta name='robots' content='<?php echo $ta_common_listpage_indexfollow; ?>' />
    <!-- robots index-follow -->
<?php
      }
    }
  }
}

//リンクデータのカノニカルタグを出力
function ta_link_canonical_display() {
  $ta_common_seo_canonicalonoff = ta_read_op( 'ta_common_seo_canonicalonoff' );
  $ta_top_canonical_domain = ta_read_op( 'ta_top_canonical_domain' );
  $ta_post_canonical_domain = ta_read_post( get_the_ID(), 'ta_post_canonical_domain' );

  /* トップページ */
  if ( 'valid' == $ta_common_seo_canonicalonoff ) {
    if ( is_front_page() ) {
      if( "" == $ta_top_canonical_domain ) {
        $ta_seo_canonical_domain = home_url('/');
      } else {
        $ta_seo_canonical_domain = $ta_top_canonical_domain;
      }
    } else if ( is_page() || is_single() ) {
      if( "" == $ta_post_canonical_domain ) {
        $ta_seo_canonical_domain = get_permalink();
      } else {
        $ta_seo_canonical_domain = $ta_post_canonical_domain;
      }
    } else {
      $ta_seo_canonical_domain = home_url('/');
    } ?>
    <!-- canonical -->
    <link rel='canonical' href='<?php echo $ta_seo_canonical_domain; ?>' />
    <!-- canonical -->
<?php
  }
}

//メタデータのOGPを出力
function ta_meta_ogp_display() {
  //共通
  $ta_common_smo_ogp_common_onoff = ta_read_op( 'ta_common_smo_ogp_common_onoff' );
  $ta_common_smo_ogp_admins = ta_read_op( 'ta_common_smo_ogp_admins' );
  $ta_common_smo_ogp_appid = ta_read_op( 'ta_common_smo_ogp_appid' );
  $ta_common_smo_ogp_common_image = ta_read_op( 'ta_common_smo_ogp_common_image' );
  $ta_common_smo_ogp_def_img = ta_read_op( 'ta_common_smo_ogp_def_img' );
  //トップページ
  $ta_top_ogp_onoff = ta_read_op( 'ta_top_ogp_onoff' );
  $ta_top_ogp_title = ta_read_op( 'ta_top_ogp_title' );
  $ta_top_ogp_site_name = ta_read_op( 'ta_top_ogp_site_name' );
  $ta_top_ogp_description = ta_read_op( 'ta_top_ogp_description' );
  $ta_top_ogp_image = ta_read_op( 'ta_top_ogp_image' );
  //固定、投稿ページ
  $ta_post_ogp_onoff = ta_read_post( get_the_ID(), 'ta_post_ogp_onoff' );
  $ta_post_ogp_title = ta_read_post( get_the_ID(), 'ta_post_ogp_title' );
  $ta_post_ogp_site_name = ta_read_post( get_the_ID(), 'ta_post_ogp_site_name' );
  $ta_post_ogp_description = ta_read_post( get_the_ID(), 'ta_post_ogp_description' );
  $ta_post_ogp_image = ta_read_post( get_the_ID(), 'ta_post_ogp_image' );
  
  //トップページ
  if ( is_front_page() && "valid" == $ta_common_smo_ogp_common_onoff && "valid" == $ta_top_ogp_onoff ) { ?>
    <!-- OGP -->
<?php
    if ( 'no_disp' != $ta_common_smo_ogp_admins ) { ?>
    <meta property="fb:admins" content="<?php ta_deleteyen( $ta_common_smo_ogp_admins ); ?>"/>
<?php
    } ?>
<?php
    if ( 'no_disp' != $ta_common_smo_ogp_appid ) { ?>
    <meta property="fb:app_id" content="<?php ta_deleteyen( $ta_common_smo_ogp_appid ); ?>"/>
<?php
    } ?>
    <meta property="og:title" content="<?php ta_deleteyen( $ta_top_ogp_title ); ?>"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="<?php echo home_url('/') ?>"/>
<?php
  if ( "no_image" != $ta_top_ogp_image ) { ?>
    <meta property="og:image" content="<?php echo $ta_top_ogp_image; ?>" />
<?php
  } else if ( "no_image" != $ta_common_smo_ogp_common_image ) { 
    if ( 'none' != $ta_common_smo_ogp_def_img ) { ?>
    <meta property="og:image" content="<?php echo $ta_common_smo_ogp_common_image; ?>" />
<?php
    }
  } ?>
    <meta property="og:site_name" content="<?php ta_deleteyen( $ta_top_ogp_site_name ); ?>"/>
    <meta property="og:description" content="<?php ta_deleteyen( $ta_top_ogp_description ); ?>"/>
    <!-- OGP -->
<?php
  //固定、投稿ページ
  } else if ( ( is_page() || is_single() )  && "valid" == $ta_common_smo_ogp_common_onoff && "valid" == $ta_post_ogp_onoff ) { ?>
    <!-- OGP -->
<?php
    if ( 'no_disp' != $ta_common_smo_ogp_admins ) { ?>
    <meta property="fb:admins" content="<?php ta_deleteyen( $ta_common_smo_ogp_admins ); ?>"/>
<?php
    } ?>
<?php
    if ( 'no_disp' != $ta_common_smo_ogp_appid ) { ?>
    <meta property="fb:app_id" content="<?php ta_deleteyen( $ta_common_smo_ogp_appid ); ?>"/>
<?php
    } ?>
    <meta property="og:title" content="<?php ta_deleteyen( $ta_post_ogp_title ); ?>"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="<?php echo get_permalink(); ?>"/>
<?php
    if ( "eyecatch" == $ta_common_smo_ogp_def_img ) {
      if ( "no_image" != $ta_post_ogp_image ) { ?>
    <meta property="og:image" content="<?php echo $ta_post_ogp_image; ?>" />
<?php
      } else if ( '' != get_post_thumbnail_id() ) { ?>
    <meta property="og:image" content="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" />
<?php
      }
    } else if ( "common" == $ta_common_smo_ogp_def_img ) {
      if ( "no_image" != $ta_post_ogp_image ) { ?>
    <meta property="og:image" content="<?php echo $ta_post_ogp_image; ?>" />
<?php
      } else if ( "no_image" != $ta_common_smo_ogp_common_image ) { ?>
    <meta property="og:image" content="<?php echo $ta_common_smo_ogp_common_image; ?>" />
<?php
      }
    } else {
      if ( "no_image" != $ta_post_ogp_image ) { ?>
    <meta property="og:image" content="<?php echo $ta_post_ogp_image; ?>" />
<?php
      }
    } ?>
    <meta property="og:site_name" content="<?php ta_deleteyen( $ta_post_ogp_site_name ); ?>"/>
    <meta property="og:description" content="<?php ta_deleteyen( $ta_post_ogp_description ); ?>"/>
    <!-- OGP -->
<?php
  }
}

//メタデータのTwitter Cardsを出力
function ta_meta_twittercards_display() {
  //共通
  $ta_common_smo_twittercards_common_onoff = ta_read_op( 'ta_common_smo_twittercards_common_onoff' );
  $ta_common_smo_twittercards_account = ta_read_op( 'ta_common_smo_twittercards_account' );
  if ( "" != $ta_common_smo_twittercards_account ) {
    $ta_common_smo_twittercards_account = ( substr( $ta_common_smo_twittercards_account, 0, 1 ) == '@' ? '' : '@' ) . $ta_common_smo_twittercards_account;
  }
  $ta_common_smo_twittercards_common_image = ta_read_op( 'ta_common_smo_twittercards_common_image' );
  $ta_common_smo_twittercards_def_img = ta_read_op( 'ta_common_smo_twittercards_def_img' );
  //トップページ
  $ta_top_twittercards_onoff = ta_read_op( 'ta_top_twittercards_onoff' );
  $ta_top_twittercards_title = ta_read_op( 'ta_top_twittercards_title' );
  $ta_top_twittercards_description = ta_read_op( 'ta_top_twittercards_description' );
  $ta_top_twittercards_image = ta_read_op( 'ta_top_twittercards_image' );
  //固定、投稿ページ
  $ta_post_twittercards_onoff = ta_read_post( get_the_ID(), 'ta_post_twittercards_onoff' );
  $ta_post_twittercards_title = ta_read_post( get_the_ID(), 'ta_post_twittercards_title' );
  $ta_post_twittercards_description = ta_read_post( get_the_ID(), 'ta_post_twittercards_description' );
  $ta_post_twittercards_image = ta_read_post( get_the_ID(), 'ta_post_twittercards_image' );
  
  //トップページ
  if ( is_front_page() && "valid" == $ta_common_smo_twittercards_common_onoff && "valid" == $ta_top_twittercards_onoff ) { ?>
    <!-- Twitter Cards -->
    <meta name="twitter:title" content="<?php ta_deleteyen( $ta_top_twittercards_title ); ?>" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:url" content="<?php echo home_url('/') ?>" />
<?php
    if ( "no_image" != $ta_top_twittercards_image ) { ?>
    <meta name="twitter:image" content="<?php echo $ta_top_twittercards_image; ?>" />
<?php
    } else if ( "no_image" != $ta_common_smo_twittercards_common_image ) {
      if ( 'none' != $ta_common_smo_twittercards_def_img ) { ?>
    <meta name="twitter:image" content="<?php echo $ta_common_smo_twittercards_common_image; ?>" />
<?php
      }
    } ?>
    <meta name="twitter:description" content="<?php ta_deleteyen( $ta_top_twittercards_description ); ?>" />
<?php
    if ( "" != $ta_common_smo_twittercards_account ) { ?>
    <meta name="twitter:site" content="<?php ta_deleteyen( $ta_common_smo_twittercards_account ); ?>" />
<?php
    } ?>
    <!-- Twitter Cards -->
<?php
  //固定、投稿ページ
  } else if ( ( is_page() || is_single() )  && "valid" == $ta_common_smo_twittercards_common_onoff && "valid" == $ta_post_twittercards_onoff ) { ?>
    <!-- Twitter Cards -->
    <meta name="twitter:title" content="<?php ta_deleteyen( $ta_post_twittercards_title ); ?>" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:url" content="<?php echo get_permalink(); ?>"/>
<?php
    if ( "eyecatch" == $ta_common_smo_twittercards_def_img ) {
      if ( "no_image" != $ta_post_twittercards_image ) { ?>
    <meta name="twitter:image" content="<?php echo $ta_post_twittercards_image; ?>" />
<?php
      } else if ( '' != get_post_thumbnail_id() ) { ?>
    <meta name="twitter:image" content="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" />
<?php
      }
    } else if ( "common" == $ta_common_smo_twittercards_def_img ) {
      if ( "no_image" != $ta_post_twittercards_image ) { ?>
    <meta name="twitter:image" content="<?php echo $ta_post_twittercards_image; ?>" />
<?php
      } else if ( "no_image" != $ta_common_smo_twittercards_common_image ) { ?>
    <meta name="twitter:image" content="<?php echo $ta_common_smo_twittercards_common_image; ?>" />
<?php
      }
    } else {
      if ( "no_image" != $ta_post_twittercards_image ) { ?>
    <meta name="twitter:image" content="<?php echo $ta_post_twittercards_image; ?>" />
<?php
      }
    } ?>
    <meta name="twitter:description" content="<?php ta_deleteyen( $ta_post_twittercards_description ); ?>"/>
<?php
    if ( "" != $ta_common_smo_twittercards_account ) { ?>
    <meta name="twitter:site" content="<?php ta_deleteyen( $ta_common_smo_twittercards_account ); ?>" />
<?php
    } ?>
    <!-- Twitter Cards -->
<?php
  }
}

//フレームの動的CSS発生関数
function ta_frame_dynamic_css() {
  $common_frame_type = ta_read_op( 'ta_common_frame_type' );
  if ( is_front_page() ) {
    $top_frame_type = ta_read_op( 'ta_top_frame_type' );
    if( "common_style" == $top_frame_type ) {
      $frame_type = $common_frame_type;
    } else {
      $frame_type = $top_frame_type;
    }
  } else if ( is_page() || is_single() ) {
    $post_frame_type = ta_read_post( get_the_ID(), 'ta_post_frame_type' );
    if( "common_style" == $post_frame_type ) {
      $frame_type = $common_frame_type;
    } else {
      $frame_type = $post_frame_type;
    }
  } else {
    $frame_type = $common_frame_type;
  }
  //ホームページフレームの幅（ピクセル）: #headerのwidthの値
  $header_width = ta_read_op( 'ta_common_frame_width' );
  //ラップの幅（ピクセル）: #wrapのwidthの値
  $wrap_add = ta_read_op( 'ta_common_wrap_add_width' );
  $wrap_width   = $header_width + $wrap_add;
  //サイドバーの幅（％）: #sidebarのwidthの値
  $sidebar_width_ratio = ta_read_op( 'ta_common_sidebar_width' );
  $sidebar_width = floor( $header_width * $sidebar_width_ratio / 100 );  //小数点以下を切り捨て
  //サブサイドバーの幅（％）: #sidebarsubのwidthの値
  $sidebarsub_width_ratio = ta_read_op( 'ta_common_sidebarsub_width' );
  $sidebarsub_width = floor( $header_width * $sidebarsub_width_ratio / 100 );  //小数点以下を切り捨て
  //メインコンテンツ間の右余白幅（％）: #mainのmargin-rightの値
  $mainright_margin_ratio = ta_read_op( 'ta_common_mainright_margin' );
  $mainright_margin = floor( $header_width * $mainright_margin_ratio / 100 );  //小数点以下を切り捨て
  //メインコンテンツ間の左余白幅（％）: #mainのmargin-leftの値
  $mainleft_margin_ratio = ta_read_op( 'ta_common_mainleft_margin' );
  $mainleft_margin = floor( $header_width * $mainleft_margin_ratio / 100 );  //小数点以下を切り捨て
  //背景がある場合のコンテンツエリアの枠幅: #mainのwidth, paddingの値
  $ta_main_frame_padding = ta_read_op( 'ta_main_frame_padding' );
  //***** アイキャッチ画像の位置：#single-content .eyecatch-img imgのfloatの値
  $ta_common_post_eyecatch_position = ta_read_op( 'ta_common_post_eyecatch_position' );
  $ta_post_eyecatch_position = ta_read_post( get_the_ID(), 'ta_post_eyecatch_position' );
  if ( 'common' == $ta_post_eyecatch_position ) { $ta_post_eyecatch_position = $ta_common_post_eyecatch_position; }
  if ( 'top' == $ta_post_eyecatch_position ) { $ta_post_eyecatch_position = 'none'; }
  //サイドバー・サブサイドバーの位置（全幅表示：フレーム外への移動）
  if ( TA_HIEND_PI ) {
    $ta_common_side2wrap_onoff = ta_read_op( 'ta_common_side2wrap_onoff' );
    $ta_common_side2wrap_ec_varsize_onoff = ta_read_op( 'ta_common_side2wrap_ec_varsize_onoff' );
    $ta_common_side2wrap_ec_max_size = ta_read_op( 'ta_common_side2wrap_ec_max_size' );
    $ta_common_side2wrap_topec_max_size = ta_read_op( 'ta_common_side2wrap_topec_max_size' );
    $ta_common_sidebar2wrap_top_distance = ta_read_op( 'ta_common_sidebar2wrap_top_distance' );
    $ta_common_side2wrap_fixed_onoff = ta_read_op( 'ta_common_side2wrap_fixed_onoff' );
    $ta_common_sidebarsub2wrap_top_distance = ta_read_op( 'ta_common_sidebarsub2wrap_top_distance' );
    $ta_common_sidesub2wrap_fixed_onoff = ta_read_op( 'ta_common_sidesub2wrap_fixed_onoff' );
    $ta_footer_container2main_onoff = ta_read_op( 'ta_footer_container2main_onoff' );
    $ta_footer_fullwidth_select = ta_read_op( 'ta_footer_fullwidth_select' );
    $ta_footer_fullwidth_lspace = ta_read_op( 'ta_footer_fullwidth_lspace' );
    $ta_footer_fullwidth_rspace = ta_read_op( 'ta_footer_fullwidth_rspace' );
  } else {
    $ta_common_side2wrap_onoff = "invalid";
    $ta_common_side2wrap_ec_varsize_onoff = "invalid";
    $ta_common_side2wrap_ec_max_size = 100;
    $ta_common_side2wrap_topec_max_size = 100;
    $ta_common_sidebar2wrap_top_distance = 0;
    $ta_common_side2wrap_fixed_onoff = "invalid";
    $ta_common_sidebarsub2wrap_top_distance = 0;
    $ta_common_sidesub2wrap_fixed_onoff = "invalid";
    $ta_footer_container2main_onoff = "invalid";
    $ta_footer_fullwidth_select = 'fixed';
    $ta_footer_fullwidth_lspace = 0;
    $ta_footer_fullwidth_rspace = 0;
  }
  /******** レスポンシブデザイン基本設定 ********/
  $ta_responsible_base_onoff = ta_read_op( 'ta_responsible_base_onoff' );
  $ta_responsible_base_switch_width = ta_read_op( 'ta_responsible_base_switch_width' );
  /******** 端末の種類 ********/
  $device_cat = ta_mobile_tablet( 'cat' );
  switch ( $frame_type ) {
    case 'main_sidebar': ?>
    <style type="text/css">
      #main-sidebarsub {
        float: left;
      }
      #main {
        float: left;
        margin-left: 0;
        margin-right: 0;
      }
      #content {
        float: left;
<?php
      $cal_main_width = $header_width - $sidebar_width - $mainright_margin;
      if ( 0 != $ta_main_frame_padding ) {
        $cal_main_width = $cal_main_width - 2 * $ta_main_frame_padding; ?>
        padding: <?php echo $ta_main_frame_padding; ?>px;
<?php
      } ?>
        width: <?php echo $cal_main_width; ?>px;
      }
      #single-content .eyecatch-img img {
        float: <?php echo $ta_post_eyecatch_position; ?>;
      }
<?php
      if ( 'left' == $ta_post_eyecatch_position ) { ?>
      #content .eyecatch-img img {
<?php
        if ( 'valid' == $ta_common_side2wrap_onoff && 'valid' == $ta_common_side2wrap_ec_varsize_onoff ) { ?>
        max-width: <?php echo $ta_common_side2wrap_ec_max_size; ?>%;
<?php
        } else { ?>
        max-width: <?php echo ( $cal_main_width - 10 ); ?>px;
<?php
        } ?>
        padding: 5px 10px 5px 0;
      }
<?php
      } else if ( 'right' == $ta_post_eyecatch_position ) { ?>
      #content .eyecatch-img img {
<?php
        if ( 'valid' == $ta_common_side2wrap_onoff && 'valid' == $ta_common_side2wrap_ec_varsize_onoff ) { ?>
        max-width: <?php echo $ta_common_side2wrap_ec_max_size; ?>%;
<?php
        } else { ?>
        max-width: <?php echo ( $cal_main_width - 10 ); ?>px;
<?php
        } ?>
        padding: 5px 0 5px 10px;
      }
<?php
      } else { ?>
      #content .eyecatch-img {
        text-align: center;
      }
      #content .eyecatch-img img {
<?php
        if ( 'valid' == $ta_common_side2wrap_onoff && 'valid' == $ta_common_side2wrap_ec_varsize_onoff ) { ?>
        max-width: <?php echo $ta_common_side2wrap_ec_max_size; ?>%;
<?php
        } else { ?>
        max-width: <?php echo $cal_main_width; ?>px;
<?php
        } ?>
        padding: 5px 0 5px 0;
      }
<?php
      } ?>
      #content .eyecatch-img-top img {
<?php
        if ( 'valid' == $ta_common_side2wrap_onoff && 'valid' == $ta_common_side2wrap_ec_varsize_onoff ) { ?>
        max-width: <?php echo $ta_common_side2wrap_topec_max_size; ?>%;
<?php
        } else { ?>
        max-width: <?php echo $cal_main_width; ?>px;
        max-height: <?php echo round( $cal_main_width / 4 ); ?>px;
<?php
        } ?>
      }
      #sidebar-container {
        float: right;
      }
      #sidebarsub-container {
        display: none;
      }
<?php
      if ( 'valid' == $ta_common_side2wrap_onoff ) { ?>
      #body-wrap,
      #outer-footer-container {
<?php
        if ( 'others' != $device_cat ) {  //PC以外 ?>
        width: <?php echo $wrap_width; ?>px;
<?php
        } else { //PC ?>
        min-width: 0;
        width: 100%;
<?php
        } ?>
      }
<?php
        if ( 'invalid' == $ta_footer_container2main_onoff && 'fixed' != $ta_footer_fullwidth_select ) { ?>
      #footer-container {
        min-width: 0;
        width: 100%;
      }
      #footer-container #footer {
<?php
          if ( 'main' == $ta_footer_fullwidth_select ) { ?>
        width: <?php echo ( 100 - ( $mainright_margin_ratio + $mainleft_margin_ratio + $sidebar_width_ratio ) ); ?>%;
        padding-left: <?php echo $mainleft_margin_ratio; ?>%;
        padding-right: <?php echo $sidebar_width_ratio + $mainright_margin_ratio; ?>%;
<?php
          } else { ?>
        width: <?php echo ( 100 - ( $ta_footer_fullwidth_lspace + $ta_footer_fullwidth_rspace ) ); ?>%;
        padding-left: <?php echo $ta_footer_fullwidth_lspace; ?>%;
        padding-right: <?php echo $ta_footer_fullwidth_rspace; ?>%;
<?php
          } ?>
      }
      #footer-container #copyright-container {
        width: 100%;
      }
      #content #footer-container #copyright,
      #outer-footer-container #footer-container #copyright {
        width: 100%;
      }
<?php   } ?>
      #outer-sidebar-container {
<?php
        if ( 'valid' == $ta_common_side2wrap_fixed_onoff ) {  //fixed時 ?>
        position: fixed;
        right: 0;
<?php
        } else {  //relative時 ?>
        position: relative;
        float: right;
<?php
        } ?>
        margin-top: <?php echo $ta_common_sidebar2wrap_top_distance; ?>px;
        width: <?php echo $sidebar_width_ratio; ?>%;
      }
      #outer-sidebar-container #sidebar-container {
        width: 100%;
      }
      #outer-sidebar-container #sidebar-container #sidebar {
        width: 100%;
        box-sizing: border-box;
      }
      #wrap {
        float: right;
        padding-right: <?php echo $mainright_margin_ratio; ?>%;
        padding-left: <?php echo $mainleft_margin_ratio; ?>%;
        width: <?php echo ( 100 - ( $mainright_margin_ratio + $mainleft_margin_ratio + $sidebar_width_ratio ) ); ?>%;
<?php
        if ( 'valid' == $ta_common_side2wrap_fixed_onoff ) {  //fixed時 ?>
        margin-right: <?php echo $sidebar_width_ratio; ?>%;
<?php
        } ?>
      }
      #container {
        width: 100%;
        padding-left: 0;
        padding-right: 0;
      }
      #container #main-sidebarsub,
      #container #main,
      #container #content {
        float: right;
        width: 100%;
        padding-left: 0;
        padding-right: 0;
        margin-left: 0;
        margin-right: 0;
      }
      #container #sidebar-container {
        display: none;
      }
<?php
        if ( 'valid' == $ta_responsible_base_onoff ) { ?>
      @media only screen and (max-width : <?php echo $ta_responsible_base_switch_width; ?>px){
        #container #sidebar-container {
          display: block;
        }
      }
<?php
        }
      } ?>
    </style>
<?php
      break;
    case 'sidebar_main': ?>
    <style type="text/css">
      #main-sidebarsub {
        float: right;
      }
      #main {
        float: right;
        margin-left: 0;
        margin-right: 0;
      }
      #content {
        float: right;
<?php
      $cal_main_width = $header_width - $sidebar_width - $mainleft_margin;
      if( 0 != $ta_main_frame_padding ) {
        $cal_main_width = $cal_main_width - 2 * $ta_main_frame_padding; ?>
        padding: <?php echo $ta_main_frame_padding; ?>px;
<?php
      } ?>
        width: <?php echo $cal_main_width; ?>px;
      }
      #single-content .eyecatch-img img {
        float: <?php echo $ta_post_eyecatch_position; ?>;
      }
<?php
      if ( 'left' == $ta_post_eyecatch_position ) { ?>
      #content .eyecatch-img img {
<?php
        if ( 'valid' == $ta_common_side2wrap_onoff && 'valid' == $ta_common_side2wrap_ec_varsize_onoff ) { ?>
        max-width: <?php echo $ta_common_side2wrap_ec_max_size; ?>%;
<?php
        } else { ?>
        max-width: <?php echo ( $cal_main_width - 10 ); ?>px;
<?php
        } ?>
        padding: 5px 10px 5px 0;
      }
<?php
      } else if ( 'right' == $ta_post_eyecatch_position ) { ?>
      #content .eyecatch-img img {
<?php
        if ( 'valid' == $ta_common_side2wrap_onoff && 'valid' == $ta_common_side2wrap_ec_varsize_onoff ) { ?>
        max-width: <?php echo $ta_common_side2wrap_ec_max_size; ?>%;
<?php
        } else { ?>
        max-width: <?php echo ( $cal_main_width - 10 ); ?>px;
<?php
        } ?>
        padding: 5px 0 5px 10px;
      }
<?php
      } else { ?>
      #content .eyecatch-img {
        text-align: center;
      }
      #content .eyecatch-img img {
<?php
        if ( 'valid' == $ta_common_side2wrap_onoff && 'valid' == $ta_common_side2wrap_ec_varsize_onoff ) { ?>
        max-width: <?php echo $ta_common_side2wrap_ec_max_size; ?>%;
<?php
        } else { ?>
        max-width: <?php echo $cal_main_width; ?>px;
<?php
        } ?>
        padding: 5px 0 5px 0;
      }
<?php
      } ?>
      #content .eyecatch-img-top img {
<?php
        if ( 'valid' == $ta_common_side2wrap_onoff && 'valid' == $ta_common_side2wrap_ec_varsize_onoff ) { ?>
        max-width: <?php echo $ta_common_side2wrap_topec_max_size; ?>%;
<?php
        } else { ?>
        max-width: <?php echo $cal_main_width; ?>px;
        max-height: <?php echo round( $cal_main_width / 4 ); ?>px;
<?php
        } ?>
      }
      #sidebar-container {
        float: left;
      }
      #sidebarsub-container {
        display: none;
      }
<?php
      if ( 'valid' == $ta_common_side2wrap_onoff ) { ?>
      #body-wrap,
      #outer-footer-container {
<?php
        if ( 'others' != $device_cat ) {  //PC以外 ?>
        width: <?php echo $wrap_width; ?>px;
<?php
        } else { //PC ?>
        min-width: 0;
        width: 100%;
<?php
        } ?>
      }
<?php
        if ( 'invalid' == $ta_footer_container2main_onoff && 'fixed' != $ta_footer_fullwidth_select ) { ?>
      #footer-container {
        min-width: 0;
        width: 100%;
      }
      #footer-container #footer {
<?php
          if ( 'main' == $ta_footer_fullwidth_select ) { ?>
        width: <?php echo ( 100 - ( $mainright_margin_ratio + $mainleft_margin_ratio + $sidebar_width_ratio ) ); ?>%;
        padding-left: <?php echo $sidebar_width_ratio + $mainleft_margin_ratio; ?>%;
        padding-right: <?php echo $mainright_margin_ratio; ?>%;
<?php
          } else { ?>
        width: <?php echo ( 100 - ( $ta_footer_fullwidth_lspace + $ta_footer_fullwidth_rspace ) ); ?>%;
        padding-left: <?php echo $ta_footer_fullwidth_lspace; ?>%;
        padding-right: <?php echo $ta_footer_fullwidth_rspace; ?>%;
<?php
          } ?>
      }
      #footer-container #copyright-container {
        width: 100%;
      }
      #content #footer-container #copyright,
      #outer-footer-container #footer-container #copyright {
        width: 100%;
      }
<?php   } ?>
      #outer-sidebar-container {
<?php
        if ( 'valid' == $ta_common_side2wrap_fixed_onoff ) {  //fixed時 ?>
        position: fixed;
        left: 0;
<?php
        } else {  //relative時 ?>
        position: relative;
        float: left;
<?php
        } ?>
        margin-top: <?php echo $ta_common_sidebar2wrap_top_distance; ?>px;
        width: <?php echo $sidebar_width_ratio; ?>%;
      }
      #outer-sidebar-container #sidebar-container {
        width: 100%;
      }
      #outer-sidebar-container #sidebar-container #sidebar {
        width: 100%;
        box-sizing: border-box;
      }
      #wrap {
        float: left;
        padding-right: <?php echo $mainright_margin_ratio; ?>%;
        padding-left: <?php echo $mainleft_margin_ratio; ?>%;
        width: <?php echo ( 100 - ( $mainright_margin_ratio + $mainleft_margin_ratio + $sidebar_width_ratio ) ); ?>%;
<?php
        if ( 'valid' == $ta_common_side2wrap_fixed_onoff ) {  //fixed時 ?>
        margin-left: <?php echo $sidebar_width_ratio; ?>%;
<?php
        } ?>
      }
      #container {
        width: 100%;
        padding-left: 0;
        padding-right: 0;
      }
      #container #main-sidebarsub,
      #container #main,
      #container #content {
        float: left;
        width: 100%;
        padding-left: 0;
        padding-right: 0;
        margin-left: 0;
        margin-right: 0;
      }
      #container #sidebar-container {
        display: none;
      }
<?php
        if ( 'valid' == $ta_responsible_base_onoff ) { ?>
      @media only screen and (max-width : <?php echo $ta_responsible_base_switch_width; ?>px){
        #container #sidebar-container {
          display: block;
        }
      }
<?php
        }
      } ?>
    </style>
<?php
      break;
    case 'main_only': ?>
    <style type="text/css">
      #main-sidebarsub {
        float: left;
      }
      #main {
        float: left;
        margin-left: 0;
        margin-right: 0;
      }
      #content {
        float: left;
<?php
      $cal_main_width = $header_width;
      if( 0 != $ta_main_frame_padding ) {
        $cal_main_width = $cal_main_width - 2 * $ta_main_frame_padding; ?>
        padding: <?php echo $ta_main_frame_padding; ?>px;
<?php
      } ?>
        width: <?php echo $cal_main_width; ?>px;
      }
      #single-content .eyecatch-img img {
        float: <?php echo $ta_post_eyecatch_position; ?>;
      }
<?php
      if ( 'left' == $ta_post_eyecatch_position ) { ?>
      #content .eyecatch-img img {
<?php
        if ( 'valid' == $ta_common_side2wrap_onoff && 'valid' == $ta_common_side2wrap_ec_varsize_onoff ) { ?>
        max-width: <?php echo $ta_common_side2wrap_ec_max_size; ?>%;
<?php
        } else { ?>
        max-width: <?php echo ( $cal_main_width - 10 ); ?>px;
<?php
        } ?>
        padding: 5px 10px 5px 0;
      }
<?php
      } else if ( 'right' == $ta_post_eyecatch_position ) { ?>
      #content .eyecatch-img img {
<?php
        if ( 'valid' == $ta_common_side2wrap_onoff && 'valid' == $ta_common_side2wrap_ec_varsize_onoff ) { ?>
        max-width: <?php echo $ta_common_side2wrap_ec_max_size; ?>%;
<?php
        } else { ?>
        max-width: <?php echo ( $cal_main_width - 10 ); ?>px;
<?php
        } ?>
        padding: 5px 0 5px 10px;
      }
<?php
      } else { ?>
      #content .eyecatch-img {
        text-align: center;
      }
      #content .eyecatch-img img {
<?php
        if ( 'valid' == $ta_common_side2wrap_onoff && 'valid' == $ta_common_side2wrap_ec_varsize_onoff ) { ?>
        max-width: <?php echo $ta_common_side2wrap_ec_max_size; ?>%;
<?php
        } else { ?>
        max-width: <?php echo $cal_main_width; ?>px;
<?php
        } ?>
        padding: 5px 0 5px 0;
      }
<?php
      } ?>
      #content .eyecatch-img-top img {
<?php
        if ( 'valid' == $ta_common_side2wrap_onoff && 'valid' == $ta_common_side2wrap_ec_varsize_onoff ) { ?>
        max-width: <?php echo $ta_common_side2wrap_topec_max_size; ?>%;
<?php
        } else { ?>
        max-width: <?php echo $cal_main_width; ?>px;
        max-height: <?php echo round( $cal_main_width / 4 ); ?>px;
<?php
        } ?>
      }
      #sidebar-container {
        display: none;
      }
      #sidebarsub-container {
        display: none;
      }
<?php
      if ( 'valid' == $ta_common_side2wrap_onoff ) { ?>
      #body-wrap,
      #outer-footer-container {
<?php
        if ( 'others' != $device_cat ) {  //PC以外 ?>
        width: <?php echo $wrap_width; ?>px;
<?php
        } else { //PC ?>
        min-width: 0;
        width: 100%;
<?php
        } ?>
      }
<?php
        if ( 'invalid' == $ta_footer_container2main_onoff && 'fixed' != $ta_footer_fullwidth_select ) { ?>
      #footer-container {
        min-width: 0;
        width: 100%;
      }
      #footer-container #footer {
<?php
          if ( 'main' == $ta_footer_fullwidth_select ) { ?>
        width: <?php echo ( 100 - ( $mainright_margin_ratio + $mainleft_margin_ratio ) ); ?>%;
        padding-left: <?php echo $mainleft_margin_ratio; ?>%;
        padding-right: <?php echo $mainright_margin_ratio; ?>%;
<?php
          } else { ?>
        width: <?php echo ( 100 - ( $ta_footer_fullwidth_lspace + $ta_footer_fullwidth_rspace ) ); ?>%;
        padding-left: <?php echo $ta_footer_fullwidth_lspace; ?>%;
        padding-right: <?php echo $ta_footer_fullwidth_rspace; ?>%;
<?php
          } ?>
      }
      #footer-container #copyright-container {
        width: 100%;
      }
      #content #footer-container #copyright,
      #outer-footer-container #footer-container #copyright {
        width: 100%;
      }
<?php   } ?>
      #wrap {
        float: left;
        padding-right: <?php echo $mainright_margin_ratio; ?>%;
        padding-left: <?php echo $mainleft_margin_ratio; ?>%;
        width: <?php echo ( 100 - ( $mainright_margin_ratio + $mainleft_margin_ratio ) ); ?>%;
      }
      #container {
        width: 100%;
        padding-left: 0;
        padding-right: 0;
      }
      #container #main-sidebarsub,
      #container #main,
      #container #content {
        width: 100%;
        padding-left: 0;
        padding-right: 0;
        margin-left: 0;
        margin-right: 0;
      }
<?php
      } ?>
    </style>
<?php
      break;
    case 'sidebarsub_main_sidebar': ?>
    <style type="text/css">
      #main-sidebarsub {
        float: left;
      }
      #main {
        float: right;
        margin-left: <?php echo $mainleft_margin; ?>px;
        margin-right: <?php echo $mainright_margin; ?>px;
      }
      #content {
        float: left;
<?php
      $cal_main_width = $header_width - $sidebar_width - $sidebarsub_width - $mainleft_margin - $mainright_margin;
      if( 0 != $ta_main_frame_padding ) {
        $cal_main_width = $cal_main_width - 2 * $ta_main_frame_padding; ?>
        padding: <?php echo $ta_main_frame_padding; ?>px;
<?php
      } ?>
        width: <?php echo $cal_main_width; ?>px;
      }
      #single-content .eyecatch-img img {
        float: <?php echo $ta_post_eyecatch_position; ?>;
      }
<?php
      if ( 'left' == $ta_post_eyecatch_position ) { ?>
      #content .eyecatch-img img {
<?php
        if ( 'valid' == $ta_common_side2wrap_onoff && 'valid' == $ta_common_side2wrap_ec_varsize_onoff ) { ?>
        max-width: <?php echo $ta_common_side2wrap_ec_max_size; ?>%;
<?php
        } else { ?>
        max-width: <?php echo ( $cal_main_width - 10 ); ?>px;
<?php
        } ?>
        padding: 5px 10px 5px 0;
      }
<?php
      } else if ( 'right' == $ta_post_eyecatch_position ) { ?>
      #content .eyecatch-img img {
<?php
        if ( 'valid' == $ta_common_side2wrap_onoff && 'valid' == $ta_common_side2wrap_ec_varsize_onoff ) { ?>
        max-width: <?php echo $ta_common_side2wrap_ec_max_size; ?>%;
<?php
        } else { ?>
        max-width: <?php echo ( $cal_main_width - 10 ); ?>px;
<?php
        } ?>
        padding: 5px 0 5px 10px;
      }
<?php
      } else { ?>
      #content .eyecatch-img {
        text-align: center;
      }
      #content .eyecatch-img img {
<?php
        if ( 'valid' == $ta_common_side2wrap_onoff && 'valid' == $ta_common_side2wrap_ec_varsize_onoff ) { ?>
        max-width: <?php echo $ta_common_side2wrap_ec_max_size; ?>%;
<?php
        } else { ?>
        max-width: <?php echo $cal_main_width; ?>px;
<?php
        } ?>
        padding: 5px 0 5px 0;
      }
<?php
      } ?>
      #content .eyecatch-img-top img {
<?php
        if ( 'valid' == $ta_common_side2wrap_onoff && 'valid' == $ta_common_side2wrap_ec_varsize_onoff ) { ?>
        max-width: <?php echo $ta_common_side2wrap_topec_max_size; ?>%;
<?php
        } else { ?>
        max-width: <?php echo $cal_main_width; ?>px;
        max-height: <?php echo round( $cal_main_width / 4 ); ?>px;
<?php
        } ?>
      }
      #sidebar-container {
        float: right;
      }
      #sidebarsub-container {
        float: left;
      }
<?php
      if ( 'valid' == $ta_common_side2wrap_onoff ) { ?>
      #body-wrap,
      #outer-footer-container {
<?php
        if ( 'others' != $device_cat ) {  //PC以外 ?>
        width: <?php echo $wrap_width; ?>px;
<?php
        } else { //PC ?>
        min-width: 0;
        width: 100%;
<?php
        } ?>
      }
<?php
        if ( 'invalid' == $ta_footer_container2main_onoff && 'fixed' != $ta_footer_fullwidth_select ) { ?>
      #footer-container {
        min-width: 0;
        width: 100%;
      }
      #footer-container #footer {
<?php
          if ( 'main' == $ta_footer_fullwidth_select ) { ?>
        width: <?php echo ( 100 - ( $mainright_margin_ratio + $mainleft_margin_ratio + $sidebar_width_ratio + $sidebarsub_width_ratio ) ); ?>%;
        padding-left: <?php echo $sidebarsub_width_ratio + $mainleft_margin_ratio; ?>%;
        padding-right: <?php echo $sidebar_width_ratio + $mainright_margin_ratio; ?>%;
<?php
          } else { ?>
        width: <?php echo ( 100 - ( $ta_footer_fullwidth_lspace + $ta_footer_fullwidth_rspace ) ); ?>%;
        padding-left: <?php echo $ta_footer_fullwidth_lspace; ?>%;
        padding-right: <?php echo $ta_footer_fullwidth_rspace; ?>%;
<?php
          } ?>
      }
      #footer-container #copyright-container {
        width: 100%;
      }
      #content #footer-container #copyright,
      #outer-footer-container #footer-container #copyright {
        width: 100%;
      }
<?php   } ?>
      #outer-sidebar-container {
<?php
        if ( 'valid' == $ta_common_side2wrap_fixed_onoff ) {  //fixed時 ?>
        position: fixed;
        right: 0;
<?php
        } else {  //relative時 ?>
        position: relative;
        float: right;
<?php
        } ?>
        margin-top: <?php echo $ta_common_sidebar2wrap_top_distance; ?>px;
        width: <?php echo $sidebar_width_ratio; ?>%;
      }
      #outer-sidebar-container #sidebar-container {
        width: 100%;
      }
      #outer-sidebar-container #sidebar-container #sidebar {
        width: 100%;
        box-sizing: border-box;
      }
      #outer-sidebarsub-container {
<?php
        if ( 'valid' == $ta_common_sidesub2wrap_fixed_onoff ) {  //fixed時 ?>
        position: fixed;
        left: 0;
<?php
        } else {  //relative時 ?>
        position: relative;
        float: left;
<?php
        } ?>
        margin-top: <?php echo $ta_common_sidebarsub2wrap_top_distance; ?>px;
        width: <?php echo $sidebarsub_width_ratio; ?>%;
      }
      #outer-sidebarsub-container #sidebarsub-container {
        width: 100%;
      }
      #outer-sidebarsub-container #sidebarsub-container #sidebarsub {
        width: 100%;
        box-sizing: border-box;
      }
      #wrap {
        float: right;
        margin-right: <?php echo $mainright_margin_ratio; ?>%;
        margin-left: <?php echo $mainleft_margin_ratio; ?>%;
        width: <?php echo ( 100 - ( $mainright_margin_ratio + $mainleft_margin_ratio + $sidebar_width_ratio + $sidebarsub_width_ratio ) ); ?>%;
<?php
        if ( 'valid' == $ta_common_sidesub2wrap_fixed_onoff ) {  //fixed時 ?>
        margin-left: <?php echo ( $sidebarsub_width_ratio + $mainleft_margin_ratio ); ?>%;
<?php
        } else {  //relative時 ?>
        margin-left: <?php echo $mainleft_margin_ratio; ?>%;
<?php
        }
        if ( 'valid' == $ta_common_side2wrap_fixed_onoff ) {  //fixed時 ?>
        margin-right: <?php echo ( $sidebar_width_ratio + $mainright_margin_ratio ); ?>%;
<?php
        } else {  //relative時 ?>
        margin-right: <?php echo $mainright_margin_ratio; ?>%;
<?php
        } ?>
      }
      #container {
        width: 100%;
        padding-left: 0;
        padding-right: 0;
      }
      #container #main-sidebarsub,
      #container #main,
      #container #content {
        width: 100%;
        padding-left: 0;
        padding-right: 0;
        margin-left: 0;
        margin-right: 0;
      }
      #container #sidebar-container {
        display: none;
      }
      #container #sidebarsub-container {
        display: none;
      }
<?php
        if ( 'valid' == $ta_responsible_base_onoff ) { ?>
      @media only screen and (max-width : <?php echo $ta_responsible_base_switch_width; ?>px){
        #container #sidebar-container {
          display: block;
        }
        #container #sidebarsub-container {
          display: block;
        }
      }
<?php
        }
      } ?>
    </style>
<?php
      break;
  }
  if ( 'valid' == $ta_responsible_base_onoff ) { ?>
    <style type="text/css">
      @media only screen and (max-width : <?php echo $ta_responsible_base_switch_width; ?>px){
        #content .eyecatch-img-top img {
          max-height: none!important;
        }
      }
    </style>
<?php
  }
}

//個別ページ背景画表示関数
function ta_bg_img_disp_css() {
  require_once( TEMPLATEPATH . '/ta-modules/ta-functions-modules/ta-css-functions.php' );
  $ta_common_page_custom_bgimg_onoff = ta_read_op( 'ta_common_page_custom_bgimg_onoff' );
  $ta_common_post_custom_bgimg_onoff = ta_read_op( 'ta_common_post_custom_bgimg_onoff' );
  $ta_common_listpage_bgimg_onoff = ta_read_op( 'ta_common_listpage_bgimg_onoff' );
  $ta_post_custom_bgimg_onoff = ta_read_post( get_the_ID(), 'ta_post_custom_bgimg_onoff' );
  if ( is_archive() ) {
    $cat_id = get_query_var('cat');
    $ta_cat_bgimg_onoff = ( '' == get_option( '_ta_cat_bgimg_onoff_' . $cat_id ) ) ? 'common' : get_option( '_ta_cat_bgimg_onoff_' . $cat_id );
  } else {
    $ta_cat_bgimg_onoff = '';
  }
  if ( is_page() ) {  //固定ページ
    if ( 'common' == $ta_post_custom_bgimg_onoff ) {
      $ta_bgimg_onoff = $ta_common_page_custom_bgimg_onoff;
    } else {
      $ta_bgimg_onoff = $ta_post_custom_bgimg_onoff;
    }
  } else if ( is_archive() ) {  //一覧ページ
    if ( 'common' == $ta_cat_bgimg_onoff ) {
      $ta_bgimg_onoff = $ta_common_listpage_bgimg_onoff;
    } else {
      $ta_bgimg_onoff = $ta_cat_bgimg_onoff;
    }
  } else {  //投稿記事ページ
    if ( 'common' == $ta_post_custom_bgimg_onoff ) {
      $ta_bgimg_onoff = $ta_common_post_custom_bgimg_onoff;
    } else {
      $ta_bgimg_onoff = $ta_post_custom_bgimg_onoff;
    }
  }
  if ( TA_HIEND_PI ) {
    $ta_common_outframe_grad_onoff = ta_read_op( 'ta_common_outframe_color_grad_onoff' );
    $ta_responsible_outframe_grad_onoff = ta_read_op( 'ta_responsible_outframe_color_grad_onoff' );
  } else {
    $ta_common_outframe_grad_onoff = "invalid";
    $ta_responsible_outframe_grad_onoff = "invalid";
  }
  $ta_responsible_base_switch_width = ta_read_op( 'ta_responsible_base_switch_width' );
  if ( !is_front_page() && 'valid' == $ta_bgimg_onoff ) { ?>
      <style type="text/css">
        html body.page #body-wrap,
        html body.single #body-wrap,
        html body.archive #body-wrap {
          background: none;
<?php
    if ( 'invalid' == $ta_common_outframe_grad_onoff ) { ?>
          background-color: <?php echo ta_select_color_w_image_color( 'ta_common_outframe_color' ); ?>;
<?php
    } else {
      ta_gradient_color_style( 'ta_common_outframe_color' );
    } ?>
        }
<?php
    if ( 'valid' == ta_read_op( 'ta_responsible_base_onoff' ) ) { ?>
        @media only screen and (max-width : <?php echo $ta_responsible_base_switch_width; ?>px){
          html body.page #body-wrap,
          html body.single #body-wrap,
          html body.archive #body-wrap {
            background: none!important;
<?php
      if ( 'invalid' == $ta_responsible_outframe_grad_onoff ) { ?>
            background-color: <?php echo ta_select_color_w_image_color( 'ta_responsible_outframe_color' ); ?>!important;
<?php
      } else {
        ta_responsible_gradient_color_style( 'ta_responsible_outframe_color' );
      } ?>
          }
        }
<?php
    } ?>
      </style>
<?php
  }
}

//ロゴグループのロゴ画像要素名
function ta_logo_group_img_factor() {
  if ( is_front_page() ) {
    echo "h1";
  } else {
    echo "div";
  }
}

//ロゴグループのh1テキスト表記を出力
function ta_logo_group_h1_text() {
  $common_h1_content = ta_read_op( 'ta_common_seo_common_h1_content' );
  if ( 'valid' == ta_read_op( 'ta_common_seo_h1_after_content_onoff' ) ) {
    $common_h1_after_content = ta_read_op( 'ta_common_seo_h1_after_content' );
  } else {
    $common_h1_after_content = '';
  }
  $top_h1_content = ta_read_op( 'ta_top_h1_content' );
  $ta_top_h1_disp = ta_read_op( 'ta_top_h1_disp' );
  $post_h1_content = ta_read_post( get_the_ID(), 'ta_post_h1_content' );
  $ta_common_seo_h1_commononoff = ta_read_op( 'ta_common_seo_h1_commononoff' );
  $ta_common_page_h1_disp = ta_read_op( 'ta_common_page_h1_disp' );
  $ta_common_post_h1_disp = ta_read_op( 'ta_common_post_h1_disp' );
  $ta_common_listpage_h1_disp = ta_read_op( 'ta_common_listpage_h1_disp' );
  if ( is_front_page() ) {
    if ( "top_h1" == $ta_top_h1_disp ) { $common_h1_after_content = ''; }
    if ( "" == $top_h1_content ) {
      $h1_content = ta_eschtml2html_wbr( $common_h1_content . $common_h1_after_content );
    } else {
      $h1_content = ta_eschtml2html_wbr( $top_h1_content . $common_h1_after_content );
    }
  } else if ( is_page() ) {
    if ( "page_h1" == $ta_common_page_h1_disp ) { $common_h1_after_content = ''; }
    if ( "valid" == $ta_common_seo_h1_commononoff ) {
      $h1_content = ta_eschtml2html_wbr( $common_h1_content . $common_h1_after_content );
    } else {
      if ( "" == $post_h1_content ) {
        $h1_content = ta_eschtml2html_wbr( get_the_title() . $common_h1_after_content );
      } else {
        $h1_content = ta_eschtml2html_wbr( $post_h1_content . $common_h1_after_content );
      }
    }
  } else if ( is_single() ) {
    if ( "post_h1" == $ta_common_post_h1_disp ) { $common_h1_after_content = ''; }
    if ( "valid" == $ta_common_seo_h1_commononoff ) {
      $h1_content = ta_eschtml2html_wbr( $common_h1_content . $common_h1_after_content );
    } else {
      if ( "" == $post_h1_content ) {
        $h1_content = ta_eschtml2html_wbr( get_the_title() . $common_h1_after_content );
      } else {
        $h1_content = ta_eschtml2html_wbr( $post_h1_content . $common_h1_after_content );
      }
    }
  } else {
    if ( "listpage_h1" == $ta_common_listpage_h1_disp ) { $common_h1_after_content = ''; }
    $h1_content = ta_eschtml2html_wbr( $common_h1_content . $common_h1_after_content );
  }
  ta_deleteyen( $h1_content );
}

//SNS表示用のチェックボックス配列から名前を探す関数
function ta_sns_display_check( $sns_array, $sns_name ) {
  foreach ( (array)$sns_array as $name ) {
    if ( $sns_name == $name ) {
      return true;
    }
  }
}

//検索ボックス
function ta_search_form( $form ) {
  $ta_header_search_submit_title = ( 'no_disp' == ta_read_op( 'ta_header_search_submit_title' ) ) ? '' : ta_read_op( 'ta_header_search_submit_title' );
  $form = '
    <form role="search" method="get" id="searchform" action="'.home_url( '/' ).'" >
      <div id="searchbox">
        <label class="screen-reader-text" for="s">' . __('Search for:') . '</label>
        <input type="text" value="' . get_search_query() . '" name="s" id="s" />
        <input type="submit" id="searchsubmit" value="'. $ta_header_search_submit_title .'" />
      </div>
    </form>
  ';
  return $form;
}
add_filter( 'get_search_form', 'ta_search_form' );


/********* グローバルナビに関する関数 *********/
//wp_nav_menuにslugのクラス属性を追加する。グローバルナビに独自画像を使用する場合に使用する
function ta_slugname_add_class( $css, $item ) {
  if ( $item->object == 'page' ) {
    $page = get_post( $item->object_id );
    $css[] = 'ta-slug-name-' . esc_attr( $page->post_name );
  }
  return $css;
}

//グローバルナビの共通関数
function ta_global_navi_module() {
  add_filter('nav_menu_css_class', 'ta_slugname_add_class', 10, 2);
  $value = wp_nav_menu( array( 'container' => 'div', 'container_id' => 'ta-global-navi', 'theme_location' => 'ta_global_navigation','echo' => false, 'depth' => 3, ) );
  $ta_responsible_glbnavi_menubox_text = ta_read_op( 'ta_responsible_glbnavi_menubox_text' ); ?>
  <div id="ta-global-navi-container">
<?php
  if ( has_nav_menu( 'ta_global_navigation' ) ) {
    echo $value;
  } else { ?>
    <div id="ta-global-navi">
      <ul>
        <?php wp_list_pages( 'title_li=' ); ?>
      </ul>
    </div><!-- end of #ta-global-navi-->
<?php
  } ?>
  </div><!-- end of #ta-global-navi-container -->
  <div id="ta-mb-global-navi-group">
    <div id="ta-mb-global-navi-menubuttom">
      <a href="JavaScript:void(0);">
        <div id="ta-mb-global-navi-menubuttom-frame">
          <span><?php ta_deleteyen( $ta_responsible_glbnavi_menubox_text ); ?></span>
        </div>
      </a>
    </div>
    <div id="ta-mb-global-navi-container">
<?php
  if ( has_nav_menu( 'ta_global_navigation' ) ) {
    echo $value;
  } else { ?>
    <div id="ta-global-navi">
      <ul>
        <?php wp_list_pages( 'title_li=' ); ?>
      </ul>
    </div><!-- end of #ta-global-navi-->
<?php
  } ?>
    </div><!-- end of #ta-mb-global-navi-container -->
  </div><!-- end of #ta-mb-global-navi-group -->
<?php
  remove_filter( 'nav_menu_css_class', 'ta_slugname_add_class');
}


/**********************************************************************************************/
/*********************************** サイドバーに関する関数 ***********************************/
/**********************************************************************************************/
//サイドバー
function ta_sidebar_container() { ?>
  <div id="sidebar-container">
    <div id="sidebar">
<?php
  $ta_sidebar_latestposts_position = ta_read_op( 'ta_sidebar_latestposts_position' );
  if ( TA_HIEND_PI ) {
    $ta_sidebar_postdigest_position = ta_read_op( 'ta_sidebar_postdigest_position' );
  } else {
    $ta_sidebar_postdigest_position = 'free_b';
  }
  //ダイジェスト（フリーエリア上）
  if ( 'free_t' == $ta_sidebar_latestposts_position ) {
    if ( TA_HIEND_PI ) { ta_latestposts_display( 'sidebar' ); }   //最新投稿ダイジェスト（全ての投稿が対象）の表示
  }
  if ( 'free_t' == $ta_sidebar_postdigest_position ) { ta_postdigest_display( 'sidebar' ); }                            //各種投稿ダイジェスト
  //サイドバーデモ画面（サイドバーメニュー）
  ta_side_demo_menu_display();
  //ウィジェットの表示(フリーエリアの上)
  ta_sidebar_widget( 'top' );
  //サイドバーデモ画面（フリーエリア）
  ta_side_demo_fa_display();
  //サイドバーフリーエリア
  ta_sidebar_freearea_display( 'sidebar' );
  //ウィジェットの表示(フリーエリアの下)
  ta_sidebar_widget( 'middle' );
  //ダイジェスト（フリーエリア下）
  if ( 'free_b' == $ta_sidebar_latestposts_position ) {
    if ( TA_HIEND_PI ) { ta_latestposts_display( 'sidebar' ); }   //最新投稿ダイジェスト（全ての投稿が対象）の表示
  }
  if ( 'free_b' == $ta_sidebar_postdigest_position ) { ta_postdigest_display( 'sidebar' ); }                            //各種投稿ダイジェスト
  ta_sidebar_widget( 'bottom' );  //ウィジェットの表示 ?>
    </div><!-- end of #sidebar -->
  </div><!-- end of #sidebar-container -->
<?php
}

//サイドバーデモ画面（サイドバーメニュー）
function ta_side_demo_menu_display() {
  if ( 'valid' == ta_read_op( 'ta_theme_demo' ) ) {?>
    <h2 class="sidebar_title fixed-space">サイドバーメニュー（デモ）</h2>
    <h5 class="sidebar_title"><a href="">メニュー#1</a></h5>
    <h5 class="sidebar_title"><a href="">メニュー#2</a></h5>
    <h5 class="sidebar_title"><a href="">メニュー#3</a></h5>
    <h5 class="sidebar_title"><a href="">メニュー#4</a></h5>
    <h5 class="sidebar_title"><a href="">メニュー#5</a></h5>
    <p>※ WordPressのメニュー機能とサイドバーフリーエリアを使って簡単にサイドバーにメニュー設定が可能です。</p>
    <p>※ メニュー項目の装飾はヘッドライン装飾を指定します。（上記デモのメニュー項目はh5を使用しています）</p>
<?php
  }
}

//サイドバーフリーエリアの表記
function ta_sidebar_freearea_display( $single_ver ) {
  $ta_common_sidebar_freearea_onoff = ta_read_op( 'ta_sidebar_freearea_onoff' );
  $ta_common_sidebar_freearea_title_onoff = ta_read_op( 'ta_sidebar_freearea_title_onoff' );
  $ta_sidebar_freearea_display_order = ta_read_op( 'ta_sidebar_freearea_display_order' );
  if ( "valid" == $ta_common_sidebar_freearea_onoff || 'single' == $single_ver ) {
    if ( is_front_page() ) {
      $current_page = 'top';
    } else if ( is_page() ) {
      $current_page = 'page';
    } else if ( is_single() ) {
      $current_page = 'post';
    } else if ( is_archive() || is_search() ) {
      $current_page = 'list';
    } else if ( is_404() ) {
      $current_page = '404';
    }
    $args = array(
     'post_type'      =>  'ta_sidebar_fa',
     'post_status'    =>  'publish',
     'posts_per_page' =>  TASIDEFA_LIM,
     'meta_key'       =>  '_ta_post_order',
     'orderby'        =>  'meta_value_num',
     'order'          =>  $ta_sidebar_freearea_display_order,
    );
    if ( 'single' != $single_ver ) { $sub_query = new WP_Query( $args ); }
    if ( ( 'single' != $single_ver ) ? $sub_query->have_posts() : have_posts() ) {
      while ( ( 'single' != $single_ver ) ? $sub_query->have_posts() : have_posts() ) {
        ( 'single' != $single_ver ) ? $sub_query->the_post() : the_post();
        $post_id = get_the_ID();
        if ( TA_HIEND_PI ) {
          $ta_post_freearea_no_display = ta_read_post( $post_id, 'ta_post_freearea_no_display' );
        } else {
          $ta_post_freearea_no_display = array();
        }
        $disp_ok = 1;
        if ( in_array( $current_page, (array)$ta_post_freearea_no_display ) ) {
          $disp_ok = 0;
        }
        if ( $disp_ok || 'single' == $single_ver ) {
          $ta_post_top_margin = ta_read_post( $post_id, 'ta_post_top_margin' );
          if ( 'value' == $ta_post_top_margin ) {
            $top_class = '';
            $ta_post_top_margin_value = ta_read_post( $post_id, 'ta_post_top_margin_value' );
            echo '<style type="text/css">#sidebar-freearea-contents-' . $post_id . '{margin-top:' . $ta_post_top_margin_value . 'px;}</style>';
          } else {
            $top_class = ' class="' . $ta_post_top_margin . '"';
          }
          echo '<div id="sidebar-freearea-contents-' . $post_id . '"' . $top_class . '>';
          $ta_post_freearea_title_onoff = ta_read_post( $post_id, 'ta_post_freearea_title_onoff' );
          if ( "common" == $ta_post_freearea_title_onoff ) {
            $ta_sidebar_freearea_title_onoff = $ta_common_sidebar_freearea_title_onoff;
          } else {
            $ta_sidebar_freearea_title_onoff = $ta_post_freearea_title_onoff;
          }
          if ( "valid" == $ta_sidebar_freearea_title_onoff ) { ?>
    <<?php ta_sidebar_freearea_title_factor( $post_id ); ?> class="sidebar_title"><?php the_title() ?></<?php ta_sidebar_freearea_title_factor( $post_id ); ?>>
<?php
        } ?>
    <div class="sidebar_freearea_frame">
<?php
          the_content();
          $ta_post_freearea_img_centering = ta_read_post( $post_id, 'ta_post_freearea_img_centering' );
          $ta_post_freearea_img = ta_read_post( $post_id, 'ta_post_freearea_img' );
          $ta_post_freearea_img_link = ta_read_post( $post_id, 'ta_post_freearea_img_link' );
          $ta_post_sidebar_freearea_img_width = ta_read_post( $post_id, 'ta_post_sidebar_freearea_img_width' );
          $ta_post_freearea_img_leftmargin = ta_read_post( $post_id, 'ta_post_freearea_img_leftmargin' );
          $ta_post_freearea_text = ta_read_post( $post_id, 'ta_post_freearea_text' );
          $ta_post_freearea_text_link = ta_read_post( $post_id, 'ta_post_freearea_text_link' );
          $ta_post_freearea_text_leftmargin = ta_read_post( $post_id, 'ta_post_freearea_text_leftmargin' );
          $ta_post_freearea_text_position = ta_read_post( $post_id, 'ta_post_freearea_text_position' );
          if ( TA_HIEND_PI ) {
            $ta_post_freearea_imgtext_border_type = ta_read_post( $post_id, 'ta_post_freearea_imgtext_border_type' );
            $ta_post_freearea_imgtext_border_bgcolor = ta_select_color_w_image_color_posttype( $post_id, 'ta_post_freearea_imgtext_border_bgcolor' );
          } else {
            $ta_post_freearea_imgtext_border_type = "none";
            $ta_post_freearea_imgtext_border_bgcolor = "transparent";
          }
          $ta_post_freearea_imgtext_border_size = ta_read_post( $post_id, 'ta_post_freearea_imgtext_border_size' );
          $ta_post_freearea_imgtext_border_color = ta_select_color_w_image_color_posttype( $post_id, 'ta_post_freearea_imgtext_border_color' );
          $ta_post_freearea_imgtext_border_round = ta_read_post( $post_id, 'ta_post_freearea_imgtext_border_round' );
          $ta_post_freearea_imgtext_border_kind = ta_read_post( $post_id, 'ta_post_freearea_imgtext_border_kind' );
          $ta_post_freearea_imgtext_border_padding = ta_read_post( $post_id, 'ta_post_freearea_imgtext_border_padding' );
          $ta_post_freearea_imgtext_width = ta_read_post( $post_id, 'ta_post_freearea_imgtext_width' );
          $ta_post_freearea_text_fontsize = ta_read_post( $post_id, 'ta_post_freearea_text_fontsize' );
          $ta_post_freearea_text_fontweight = ta_read_post( $post_id, 'ta_post_freearea_text_fontweight' );
          $ta_post_freearea_text_fontcolor = ta_select_color_w_image_color_posttype( $post_id, 'ta_post_freearea_text_fontcolor' );
          $ta_post_freearea_text_fontcolorhover = ta_select_color_w_image_color_posttype( $post_id, 'ta_post_freearea_text_fontcolorhover' );
          $ta_post_freearea_text_underline_onoff = ( 'valid' == ta_read_post( $post_id, 'ta_post_freearea_text_underline_onoff' ) ) ? 'underline' : 'none';
          $ta_post_freearea_text_tpadding = ta_read_post( $post_id, 'ta_post_freearea_text_tpadding' );
          $ta_post_freearea_text_bpadding = ta_read_post( $post_id, 'ta_post_freearea_text_bpadding' );
          $ta_post_freearea_img_width_for_rsp = ta_read_post( $post_id, 'ta_post_freearea_img_width_for_rsp' );
          $ta_post_freearea_imgtext_width_for_rsp = ta_read_post( $post_id, 'ta_post_freearea_imgtext_width_for_rsp' );
          $ta_post_freearea_menu_num = ta_read_post( $post_id, 'ta_post_freearea_menu_num' );
          $ta_post_freearea_img_link_newwin_onoff = ( 'valid' == ta_read_post( $post_id, 'ta_post_freearea_img_link_newwin_onoff' ) ) ? 'target="_blank"' : '';
          $ta_post_freearea_text_link_newwin_onoff = ( 'valid' == ta_read_post( $post_id, 'ta_post_freearea_text_link_newwin_onoff' ) ) ? 'target="_blank"' : '';
          if ( 'no_image' != $ta_post_freearea_img ) { ?>
      <div <?php if ( 'valid' == $ta_post_freearea_img_centering ) { ?>style="text-align:center;" <?php } ?>class="sidebar-freearea-img" id="freearea-img-<?php echo $post_id; ?>">
<?php
            if ( 'top' == $ta_post_freearea_text_position ) {
              if ( 'no_link' != $ta_post_freearea_text_link ) { ?>
        <a class="attend-text-anc" href="<?php echo $ta_post_freearea_text_link ?>" <?php echo $ta_post_freearea_text_link_newwin_onoff; ?>>
<?php
              } ?>
          <div class="attend-text" style="margin-left:<?php echo $ta_post_freearea_text_leftmargin; ?>px" ><?php ta_eschtml2html_wbr( $ta_post_freearea_text ); ?></div>
<?php
              if ( 'no_link' != $ta_post_freearea_text_link ) { ?>
        </a>
<?php
              }
            }
            if ( 'no_link' != $ta_post_freearea_img_link ) { ?>
        <a href="<?php echo $ta_post_freearea_img_link ?>" <?php echo $ta_post_freearea_img_link_newwin_onoff; ?>>
<?php
            } ?>
          <img id="img-<?php echo $post_id; ?>" style="margin-left:<?php echo $ta_post_freearea_img_leftmargin; ?>%;width:<?php echo $ta_post_sidebar_freearea_img_width; ?>%;height:auto" alt="freearea_img_<?php echo $post_id; ?>" src="<?php echo $ta_post_freearea_img; ?>" />
<?php
            if ( 'no_link' != $ta_post_freearea_img_link ) { ?>
        </a>
<?php
            }
            if ( 'bottom' == $ta_post_freearea_text_position ) {
              if ( 'no_link' != $ta_post_freearea_text_link ) { ?>
        <a class="attend-text-anc" href="<?php echo $ta_post_freearea_text_link ?>" <?php echo $ta_post_freearea_text_link_newwin_onoff; ?>>
<?php
              } ?>
          <div class="attend-text" style="margin-left:<?php echo $ta_post_freearea_text_leftmargin; ?>px" ><?php ta_eschtml2html_wbr( $ta_post_freearea_text ); ?></div>
<?php
              if ( 'no_link' != $ta_post_freearea_text_link ) { ?>
        </a>
<?php
              }
            } ?>
      </div>
<?php
          }
          if ( 'none' != $ta_post_freearea_menu_num ) {
            $mune_factor = ta_read_op( 'ta_sidebar_menu_factor' . $ta_post_freearea_menu_num );
            if ( 'none' == $mune_factor ) {
              $mune_factor_b = '<p class="sidebar-menu-p">';
              $mune_factor_a = '</p>';
            } else {
              $mune_factor_b = '<' . $mune_factor . ' class="sidebar_title">';
              $mune_factor_a = '</' . $mune_factor . '>';
            }
            if ( has_nav_menu( 'ta_sidebar_menu' . $ta_post_freearea_menu_num ) ) {
              $menuarray = array(
                'container' => 'div',
                'container_id' => 'ta-sidebar-menu' . $ta_post_freearea_menu_num,
                'container_class' => 'ta-sidebar-menu',
                'theme_location' => 'ta_sidebar_menu' . $ta_post_freearea_menu_num,
                'echo' => false,
                'items_wrap' => '%3$s',
                'before' => $mune_factor_b,
                'after' => $mune_factor_a,
                'depth' => 1,
              );
              echo strip_tags( wp_nav_menu( $menuarray ), '<div><p><h2><h3><h4><h5><a>' );
            } else { ?>
              <p class="ta-sidebar-menu-error">TAサイドバーメニュー#<?php echo $ta_post_freearea_menu_num; ?>は存在しない、または関連付けが完了していない可能性があります。</p>
<?php
            }
          } ?>
    </div>
    <style type="text/css">
      #sidebar-freearea-contents-<?php echo $post_id; ?> {
        box-sizing: border-box;
        background-color: <?php echo $ta_post_freearea_imgtext_border_bgcolor; ?>;
        width: <?php echo $ta_post_freearea_imgtext_width; ?>%;
        margin-left: <?php echo ( 100 - $ta_post_freearea_imgtext_width ) / 2; ?>%;
<?php
          if ( 'b' == $ta_post_freearea_imgtext_border_type ) { ?>
        padding: 0 0 <?php echo $ta_post_freearea_imgtext_border_padding; ?>px;
        border-bottom: <?php echo $ta_post_freearea_imgtext_border_size; ?>px <?php echo $ta_post_freearea_imgtext_border_kind; ?> <?php echo $ta_post_freearea_imgtext_border_color; ?>;
<?php
          } else if ( 'l-b' == $ta_post_freearea_imgtext_border_type ) { ?>
        padding: 0 0 <?php echo $ta_post_freearea_imgtext_border_padding; ?>px <?php echo $ta_post_freearea_imgtext_border_padding; ?>px;
        border-bottom: <?php echo $ta_post_freearea_imgtext_border_size; ?>px <?php echo $ta_post_freearea_imgtext_border_kind; ?> <?php echo $ta_post_freearea_imgtext_border_color; ?>;
        border-left: <?php echo $ta_post_freearea_imgtext_border_size; ?>px <?php echo $ta_post_freearea_imgtext_border_kind; ?> <?php echo $ta_post_freearea_imgtext_border_color; ?>;
<?php
          } else if ( 'r-b' == $ta_post_freearea_imgtext_border_type ) { ?>
        padding: 0 <?php echo $ta_post_freearea_imgtext_border_padding; ?>px <?php echo $ta_post_freearea_imgtext_border_padding; ?>px 0;
        border-bottom: <?php echo $ta_post_freearea_imgtext_border_size; ?>px <?php echo $ta_post_freearea_imgtext_border_kind; ?> <?php echo $ta_post_freearea_imgtext_border_color; ?>;
        border-right: <?php echo $ta_post_freearea_imgtext_border_size; ?>px <?php echo $ta_post_freearea_imgtext_border_kind; ?> <?php echo $ta_post_freearea_imgtext_border_color; ?>;
<?php
          } else if ( 'square' == $ta_post_freearea_imgtext_border_type ) { ?>
        padding: <?php echo $ta_post_freearea_imgtext_border_padding; ?>px;
        border: <?php echo $ta_post_freearea_imgtext_border_size; ?>px <?php echo $ta_post_freearea_imgtext_border_kind; ?> <?php echo $ta_post_freearea_imgtext_border_color; ?>;
<?php
          } ?>
        border-radius: <?php echo $ta_post_freearea_imgtext_border_round; ?>px;
<?php
          if ( 'invalid' == ta_read_post( $post_id, 'ta_post_freearea_normal_disp_onoff' ) ) { ?>
        display: none;
<?php
          } else { ?>
        display: block;
<?php
          } ?>
      }

      #sidebar-freearea-contents-<?php echo $post_id; ?> .attend-text {
        font-size: <?php echo $ta_post_freearea_text_fontsize; ?>%;
        font-weight: <?php echo $ta_post_freearea_text_fontweight; ?>;
        color: <?php echo $ta_post_freearea_text_fontcolor; ?>;
        padding-top: <?php echo $ta_post_freearea_text_tpadding; ?>em;
        padding-bottom: <?php echo $ta_post_freearea_text_bpadding; ?>em;
      }
      
      #sidebar #sidebar-freearea-contents-<?php echo $post_id; ?> .attend-text-anc {
        color: <?php echo $ta_post_freearea_text_fontcolor; ?>;
        text-decoration: <?php echo $ta_post_freearea_text_underline_onoff; ?>;
      }
      
      #sidebar #sidebar-freearea-contents-<?php echo $post_id; ?> .attend-text-anc:hover,
      #sidebar #sidebar-freearea-contents-<?php echo $post_id; ?> .attend-text-anc:hover .attend-text {
        color: <?php echo $ta_post_freearea_text_fontcolorhover; ?>;
      }
    </style>
<?php
          if ( 'valid' == ta_read_op( 'ta_responsible_base_onoff' ) ) { ?>
    <style type="text/css">
      @media only screen and (max-width : <?php echo ta_read_op( 'ta_responsible_base_switch_width' ); ?>px){
        #sidebar-freearea-contents-<?php echo $post_id; ?> {
          box-sizing: border-box;
<?php
            if ( 'invalid' == ta_read_post( $post_id, 'ta_post_freearea_responsible_disp_onoff' ) ) { ?>
          display: none!important;
<?php
            } else { ?>
          display: block!important;
<?php
            }
            if ( $ta_post_freearea_imgtext_width_for_rsp >= 0 ) { ?>
          width: <?php echo $ta_post_freearea_imgtext_width_for_rsp; ?>%!important;
          margin-left: <?php echo ( 100 - $ta_post_freearea_imgtext_width_for_rsp ) / 2; ?>%!important;
<?php
            } ?>
        }
        #sidebar-freearea-contents-<?php echo $post_id; ?> #img-<?php echo $post_id; ?> {
          margin-left:<?php echo $ta_post_freearea_img_leftmargin; ?>%!important;
          width: <?php echo $ta_post_freearea_img_width_for_rsp; ?>%!important;
        }
      }
    </style>
<?php
          } ?>
  </div>
<?php
        }
      }
    }
    if ( 'single' != $single_ver ) { wp_reset_postdata(); }
  }
}

//サイドバーフリーエリアのタイトル要素
function ta_sidebar_freearea_title_factor( $post_id ) {
  $common_value = ta_read_op( 'ta_sidebar_freearea_title_factor' );
  $post_value = ta_read_post( $post_id, 'ta_post_freearea_title_factor' );
  if ( 'common' == $post_value ) {
    $value = $common_value;
  } else {
    $value = $post_value;
  }
  echo $value;
}

//サイドバーデモ画面（フリーエリア）
function ta_side_demo_fa_display() {
  if ( 'valid' == ta_read_op( 'ta_theme_demo' ) ) {?>
  <div style="border:2px solid black;margin-top: 30px;margin-bottom: 30px;">
    <p style="font-size:75%;">（デモ表示：サイドバーフリーエリア）</p>
    <p style="font-size:110%;text-align:center;line-height:1.5em;">投稿記事のように<br />任意のコンテンツを<br />複数個挿入できます</p>
    <p style="font-size:75%;text-align:center;line-height:1.5em;">※ widgetエリアは当フリーエリアの<br />上部、または下部に配置できます</p>
  </div>
<?php
  }
}

//サイドバーウィジェット
function ta_sidebar_widget( $place ) {
  $ta_sidebar_widget_onoff = ta_read_op( 'ta_sidebar_widget_onoff' );
  if ( TA_HIEND_PI ) {
    $ta_sidebar_widget_position = ta_read_op( 'ta_sidebar_widget_position' );
  } else {
    $ta_sidebar_widget_position = 'top';
  }
  if ( "valid" == $ta_sidebar_widget_onoff && $place == $ta_sidebar_widget_position ) {
    if ( 'valid' == ta_read_op( 'ta_theme_demo' ) ) {
      $ta_sidebar_widget_title_factor = ta_read_op( 'ta_sidebar_widget_title_factor' );
      $init_args = array(
        'before_widget' => '<aside class="ta-widget-container fixed-space %s">',
        'after_widget' => '</aside>',
        'before_title' => '<' . $ta_sidebar_widget_title_factor . ' class="sidebar_title">',
        'after_title' => '</' . $ta_sidebar_widget_title_factor . '>',
      );
      $instance = array(
        'title' => 'TecAid (widgetデモ)',
        'url' => 'http://tec-aid.com/feed/',
        'items' => 5,
      );
      the_widget( 'WP_Widget_RSS', $instance, $init_args );
      $instance = array(
        'title' => 'メタ情報 (widgetデモ)',
      );
      the_widget( 'WP_Widget_Meta', $instance, $init_args );
      $instance = array(
        'title' => 'アーカイブ (widgetデモ)',
        'count' => 1,
      );
      the_widget( 'WP_Widget_Archives', $instance, $init_args );
    }
    dynamic_sidebar( 'sidebar' );
  }
}


/**************************************************************************************************/
/*********************************** サブサイドバーに関する関数 ***********************************/
/**************************************************************************************************/
//サブサイドバー
function ta_sidebarsub_container() { ?>
  <div id="sidebarsub-container">
    <div id="sidebarsub">
<?php
  $ta_sidebarsub_latestposts_position = ta_read_op( 'ta_sidebarsub_latestposts_position' );
  $ta_sidebarsub_postdigest_position = ta_read_op( 'ta_sidebarsub_postdigest_position' );
  //ダイジェスト（フリーエリア上）
  if ( 'free_t' == $ta_sidebarsub_latestposts_position ) {
    if ( TA_HIEND_PI ) { ta_latestposts_display( 'sidebarsub' ); }  //最新投稿ダイジェスト（全ての投稿が対象）の表示
  }
  if ( 'free_t' == $ta_sidebarsub_postdigest_position ) {
    if ( TA_HIEND_PI ) { ta_postdigest_display( 'sidebarsub' ); }   //各種投稿ダイジェスト
  }
  ta_sidebarsub_widget( 'top' );  //ウィジェットの表示
  //サブサイドバーデモ画面（フリーエリア）
  ta_sidesub_demo_fa_display();
  //サブサイドバーフリーエリア
  if ( TA_HIEND_PI ) { ta_thm001highend_sidebarsub_freearea_ope( 'sidebarsub' ); }
  //ウィジェットの表示(フリーエリアの下)
  ta_sidebarsub_widget( 'middle' );
  //ダイジェスト（フリーエリア下）
  if ( 'free_b' == $ta_sidebarsub_latestposts_position ) {
    if ( TA_HIEND_PI ) { ta_latestposts_display( 'sidebarsub' ); }  //最新投稿ダイジェスト（全ての投稿が対象）の表示
  }
  if ( 'free_b' == $ta_sidebarsub_postdigest_position ) {
    if ( TA_HIEND_PI ) { ta_postdigest_display( 'sidebarsub' ); }   //各種投稿ダイジェスト
  }
  ta_sidebarsub_widget( 'bottom' ); //ウィジェットの表示 ?>
    </div><!-- end of #sidebarsub -->
  </div><!-- end of #sidebarsub-container -->
<?php
}

//サブサイドバーデモ画面
function ta_sidesub_demo_fa_display() {
  if ( 'valid' == ta_read_op( 'ta_theme_demo' ) ) {?>
  <div style="border:2px solid black;margin-top: 30px;margin-bottom: 30px;">
    <p style="font-size:75%;">（デモ表示：サブサイドバーフリーエリア）</p>
    <p style="font-size:110%;text-align:center;line-height:1.5em;">投稿記事のように<br />任意のコンテンツを<br />複数個挿入できます</p>
    <p style="font-size:75%;text-align:center;line-height:1.5em;">※ widgetエリアは当フリーエリアの<br />上部、または下部に配置できます</p>
  </div>
<?php
  }
}

function ta_sidebarsub_widget( $place ) {
  $ta_sidebarsub_widget_onoff = ta_read_op( 'ta_sidebarsub_widget_onoff' );
  $ta_sidebarsub_widget_position = ta_read_op( 'ta_sidebarsub_widget_position' );
  if ( "valid" == $ta_sidebarsub_widget_onoff && $place == $ta_sidebarsub_widget_position ) {
    if ( 'valid' == ta_read_op( 'ta_theme_demo' ) ) {
      $ta_sidebarsub_widget_title_factor = ta_read_op( 'ta_sidebarsub_widget_title_factor' );
      $init_args = array(
        'before_widget' => '<aside class="ta-widget-container fixed-space %s">',
        'after_widget' => '</aside>',
        'before_title' => '<' . $ta_sidebarsub_widget_title_factor . ' class="sidebarsub_title">',
        'after_title' => '</' . $ta_sidebarsub_widget_title_factor . '>',
      );
      $instance = array(
        'title' => '固定ページ (widgetデモ)',
      );
      the_widget( 'WP_Widget_Pages', $instance, $init_args );
      $instance = array(
        'title' => 'カテゴリー (widgetデモ)',
        'count' => 1,
      );
      the_widget( 'WP_Widget_Categories', $instance, $init_args );
      $instance = array(
        'title' => 'カレンダー (widgetデモ)',
      );
      the_widget( 'WP_Widget_Calendar', $instance, $init_args );
    }
    dynamic_sidebar( 'sidebarsub' );
  }
}


/********************************************************************************************/
/*********************************** フッターに関する関数 ***********************************/
/********************************************************************************************/
//フッターコンテナ
function ta_footer_container() {
  //フッター表示処理
  $ta_common_page_custom_footer_onoff = ta_read_op( 'ta_common_page_custom_footer_onoff' );
  $ta_common_post_custom_footer_onoff = ta_read_op( 'ta_common_post_custom_footer_onoff' );
  $ta_common_listpage_footer_onoff = ta_read_op( 'ta_common_listpage_footer_onoff' );
  $ta_post_custom_footer_onoff = ta_read_post( get_the_ID(), 'ta_post_custom_footer_onoff' );
  $ta_footer_disp_group = ta_read_op( 'ta_footer_disp_group' );
  $ta_footer_freearea_position = ta_read_op( 'ta_footer_freearea_position' );
  if ( is_archive() ) {
    $cat_id = get_query_var('cat');
    $ta_cat_footer_onoff = ( '' == get_option( '_ta_cat_footer_onoff_' . $cat_id ) ) ? 'common' : get_option( '_ta_cat_footer_onoff_' . $cat_id );
  } else {
    $ta_cat_footer_onoff = '';
  }
  if ( is_page() ) {  //固定ページ
    if ( 'common' == $ta_post_custom_footer_onoff ) {
      $ta_footer_onoff = $ta_common_page_custom_footer_onoff;
    } else {
      $ta_footer_onoff = $ta_post_custom_footer_onoff;
    }
  } else if ( is_archive() ) {  //一覧ページ
    if ( 'common' == $ta_cat_footer_onoff ) {
      $ta_footer_onoff = $ta_common_listpage_footer_onoff;
    } else {
      $ta_footer_onoff = $ta_cat_footer_onoff;
    }
  } else {  //投稿記事ページ
    if ( 'common' == $ta_post_custom_footer_onoff ) {
      $ta_footer_onoff = $ta_common_post_custom_footer_onoff;
    } else {
      $ta_footer_onoff = $ta_post_custom_footer_onoff;
    }
  }
  if ( is_front_page() || 'invalid' == $ta_footer_onoff ) { ?>
  <div id="footer-container">
    <div id="back-bottom-bar"></div>
    <div id="footer">
<?php
    //フリーエリア（上）
    if ( 'top' == $ta_footer_freearea_position ) {
      if ( TA_HIEND_PI ) { ta_thm001highend_footer_freearea_ope( 'footer' ); }
    } ?>
      <div id="footer-group-container">
<?php
    //ブロックコンテンツ
    if ( 'v_g2_g1' != $ta_footer_disp_group ) {
      ta_footer_group1();
      ta_footer_group2();
    } else {
      ta_footer_group2();
      ta_footer_group1();
    } ?>
      </div><!-- end of #footer-group-container -->
<?php
    //フリーエリア（下）
    if ( 'bottom' == $ta_footer_freearea_position ) {
      if ( TA_HIEND_PI ) { ta_thm001highend_footer_freearea_ope( 'footer' ); }
    } ?>
      <div id="copyright-container">
        <?php ta_footer_copyright(); ?>
      </div><!-- end of #copyright-container -->
    </div><!-- end of #footer -->
  </div><!-- end of #footer-container -->
<?php
  }
}

//フッターグループ1コンテンツエリア
function ta_footer_group1() { ?>
  <div id="footer-group1-contents">
<?php
  //ウィジェットの表示(グループ1ブロックの上)
  $ta_footer_widget_onoff = ta_read_op( 'ta_footer_widget_onoff' );
  if ( TA_HIEND_PI ) {
    $ta_footer_widget_position = ta_read_op( 'ta_footer_widget_position' );
  } else {
    $ta_footer_widget_position = 'group2-bottom';
  }
  if ( "valid" == $ta_footer_widget_onoff && 'group1-top' == $ta_footer_widget_position ) { ?>
    <div id="footer-widget-container">
<?php
    ta_footer_widget_demo();
    dynamic_sidebar( 'footer' ); ?>
    </div>
<?php
  }
  $ta_footer_group_title_factor = ta_read_op( 'ta_footer_group_title_factor' );
  //グループ1ブロックタイトル
  $ta_footer_group1_block_title = ta_read_op( 'ta_footer_group1_block_title' );
  if ( "no_disp" != $ta_footer_group1_block_title ) { ?>
    <<?php echo $ta_footer_group_title_factor; ?> id="footer-group1-contents-title" class="footer_title fixed-space">
<?php
    ta_deleteyen( $ta_footer_group1_block_title ); ?>
    </<?php echo $ta_footer_group_title_factor; ?>><!-- end of #footer-group1-contents-title -->
<?php
  }
  $ta_footer_pic = ta_read_op( 'ta_footer_pic' );
  $ta_footer_pic_text = ( 'no_disp' == ta_read_op( 'ta_footer_pic_text' ) ) ? '': ta_read_op( 'ta_footer_pic_text' );
  if ( "no_image" != $ta_footer_pic || "" != $ta_footer_pic_text ) { ?>
    <div id="footer-image" class="fixed-space">
<?php
    $ta_footer_pic_link = ta_read_op( 'ta_footer_pic_link' );
    if ( "no_link" != $ta_footer_pic_link ) { ?>
      <a href="<?php echo $ta_footer_pic_link; ?>" <?php ta_target_blank( 'ta_footer_pic_link' ); ?>>
<?php
    } else { ?>
      <div id="footer-noanc">
<?php
    }
    if ( "no_image" != $ta_footer_pic ) { ?>
        <img src="<?php echo $ta_footer_pic; ?>" alt="<?php bloginfo('description'); bloginfo('name'); ?>" />
<?php
    } else { ?>
        <div id="footer-noimg"><?php ta_eschtml2html_wbr( $ta_footer_pic_text ); ?></div>
<?php
    }
    if ( "no_link" != $ta_footer_pic_link ) { ?>
      </a>
<?php
    } else { ?>
      </div><!-- end of #footer-noanc -->
<?php
    } ?>
    </div><!-- end of #footer-image -->
<?php
  }
  //フッターフリーテキスト
  $ta_footer_freetext = ( 'no_disp' == ta_read_op( 'ta_footer_freetext' ) ) ? '': ta_read_op( 'ta_footer_freetext' );
  if ( "" != $ta_footer_freetext ) { ?>
    <div id="footer-freetext-container" class="fixed-space">
      <div id="footer-freetext">
<?php
    ta_eschtml2html_wbr( $ta_footer_freetext ); ?>
      </div><!-- end of #footer-freetext -->
    </div><!-- end of #footer-freetext-container -->
<?php
  }
  $ta_footer_subpic = ta_read_op( 'ta_footer_subpic' );
  if ( "no_image" != $ta_footer_subpic ) { ?>
            <!-- サブフッター画像 -->
    <div id="footer-sub-image" class="fixed-space">
<?php
    $ta_footer_subpic_link = ta_read_op( 'ta_footer_subpic_link' );
    if ( "no_link" != $ta_footer_subpic_link ) { ?>
      <a href="<?php echo $ta_footer_subpic_link; ?>" <?php ta_target_blank( 'ta_footer_subpic_link' ); ?>>
<?php
    } else { ?>
      <div id="footer-sub-noanc">
<?php
    } ?>
        <img src="<?php echo $ta_footer_subpic; ?>" alt="<?php bloginfo('description'); bloginfo('name'); ?>" />
<?php
    if ( "no_link" != $ta_footer_subpic_link ) { ?>
      </a>
<?php
    } else { ?>
      </div><!-- end of #footer-sub-noanc -->
<?php
    } ?>
    </div><!-- end of #footer-sub-image -->
<?php
  }
  //ウィジェットの表示(グループ1ブロックの下)
  if ( "valid" == $ta_footer_widget_onoff && 'group1-bottom' == $ta_footer_widget_position ) { ?>
    <div id="footer-widget-container">
<?php
    ta_footer_widget_demo();
    dynamic_sidebar( 'footer' ); ?>
    </div>
<?php
  } ?>
  </div><!-- end of #footer-group1-contents -->
<?php
}

//フッターグループ2コンテンツエリア
function ta_footer_group2() { ?>
  <div id="footer-group2-contents">
<?php
  //ウィジェットの表示(グループ2ブロックの上)
  $ta_footer_widget_onoff = ta_read_op( 'ta_footer_widget_onoff' );
  if ( TA_HIEND_PI ) {
    $ta_footer_widget_position = ta_read_op( 'ta_footer_widget_position' );
  } else {
    $ta_footer_widget_position = 'group2-bottom';
  }
  if ( "valid" == $ta_footer_widget_onoff && 'group2-top' == $ta_footer_widget_position ) { ?>
    <div id="footer-widget-container">
<?php
    ta_footer_widget_demo();
    dynamic_sidebar( 'footer' ); ?>
    </div>
<?php
  }
  //グループ2ブロックタイトル
  $ta_footer_group_title_factor = ta_read_op( 'ta_footer_group_title_factor' );
  $ta_footer_group2_block_title = ta_read_op( 'ta_footer_group2_block_title' );
  if ( "no_disp" != $ta_footer_group2_block_title ) { ?>
    <<?php echo $ta_footer_group_title_factor; ?> id="footer-group2-contents-title" class="footer_title fixed-space">
<?php
    ta_deleteyen( $ta_footer_group2_block_title ); ?>
    </<?php echo $ta_footer_group_title_factor; ?>><!-- end of #footer-group2-contents-title -->
<?php
  } ?>
    <div class="fixed-space"> </div>
<?php
  //TAフッターメニュー
  $ta_footer_menu_onoff = ta_read_op( 'ta_footer_menu_onoff' );
  if ( "valid" == $ta_footer_menu_onoff ) { ?>
    <div id="ta-footer-menu-container">
<?php
    if ( has_nav_menu( 'ta_footer_menu' ) ) {
      wp_nav_menu( array(
        'container' => 'div',
        'container_id' => 'ta-footer-menu',
        'theme_location' => 'ta_footer_menu',
      ) );
    } else { ?>
      <div id="ta-footer-menu">
        <ul>
          <?php wp_list_pages( 'title_li=' ); ?>
        </ul>
      </div><!-- end of #ta-footer-menu-->
<?php
    } ?>
    </div><!-- end of #ta-footer-menu-container-->
<?php
  }
  //ウィジェットの表示(グループ2ブロックの下)
  if ( "valid" == $ta_footer_widget_onoff && 'group2-bottom' == $ta_footer_widget_position ) { ?>
    <div id="footer-widget-container">
<?php
    ta_footer_widget_demo();
    dynamic_sidebar( 'footer' ); ?>
    </div>
<?php
  } ?>
  </div><!-- end of #footer-group2-contents -->
<?php
}

//コピーライト
function ta_footer_copyright() {
  $ta_footer_copyright_title = ta_read_op( 'ta_footer_copyright_title' ); ?>
  <div id="copyright">
<?php
  if ( "no_disp" != $ta_footer_copyright_title ) { ?>
    <small id="copyright-content"><?php ta_eschtml2html_wbr( $ta_footer_copyright_title ); ?></small>
<?php
  }
  if ( ! TA_HIEND_PI ) { ?>
    <small><a href="http://theme001.tec-aid.com/" target="_blank"> WordPress TAテーマ001 by TEC-AID</a></small>
<?php
  } ?>
  </div><!-- end of #copyright -->
<?php
}

//フッターデモ画面関数
function ta_footer_widget_demo() {
  if ( 'valid' == ta_read_op( 'ta_theme_demo' ) ) {
    $ta_footer_widget_title_factor = ta_read_op( 'ta_footer_widget_title_factor' );
    $init_args1 = array(
      'before_widget' => '<aside id="demo-widget1" class="ta-widget-container fixed-space">',
      'after_widget' => '</aside>',
      'before_title' => '<' . $ta_footer_widget_title_factor . ' class="footer_title">',
      'after_title' => '</' . $ta_footer_widget_title_factor . '>',
    );
    $init_args2 = array(
      'before_widget' => '<aside id="demo-widget2" class="ta-widget-container fixed-space">',
      'after_widget' => '</aside>',
      'before_title' => '<' . $ta_footer_widget_title_factor . ' class="footer_title">',
      'after_title' => '</' . $ta_footer_widget_title_factor . '>',
    );
    the_widget( 'WP_Widget_Search', 'title=検索 (widgetデモ)', $init_args1 );
    the_widget( 'WP_Widget_Text', 'title=テキスト（widgetデモ）&text=<p style="margin:0.5em 0;">上部の検索とこのテキスト表示はウィジェットのデモです。お好きなウィジェットをお好きな位置に表示できます。</p><p style="margin:0 0 0.5em;">※ フッターフリーエリアには、投稿記事のように任意のコンテンツを複数個挿入できます。</p>', $init_args2 );
  }
}


/**************************************************************************************************/
/*********************************** 共通（コモン）に関する関数 ***********************************/
/**************************************************************************************************/
//ページャーに関する関数
function ta_pager() {
  $ta_common_pager1_mid_size = ta_read_op( 'ta_common_pager1_mid_size' );
  global $wp_rewrite;
  global $wp_query;
  global $paged;
  if ( $paged ) { $ta_paged = $paged; } else { $ta_paged = 1; }  //先頭ページは0と表記されるため1を代入
  $ta_pager_base = get_pagenum_link( 1 ); //ページ分割される前の対象のベースパーマリンクを取得
  /* サーチ結果一覧の場合： ベースパーマリンクにクエリー項目'?'が先頭以外に見つかるかパーマリンク設定がデフォルトの場合（）*/
  if ( strpos( $ta_pager_base, '?' ) || ! $wp_rewrite->using_permalinks() ) { 
    $ta_pager_format = '';  //ベースパーマリンクにクエリー'?paged = %#%'を追加するためページ指定部は必要ない
    $ta_pager_base = add_query_arg( 'paged', '%#%' ); //ベースパーマリンクにクエリー'?paged = %#%'を追加
  /* カテゴリーやタグ一覧の場合 */
  } else {
    //ベースパーマリンクの最後が'/'の時は'page/%#%/'、最後が'/'以外の時は'/page/%#%/'
    $ta_pager_format = ( substr( $ta_pager_base, -1, 1 ) == '/' ? '' : '/' ) . 'page/%#%/'; //'%#%'にページ数が代入される
    $ta_pager_base .= '%_%';  //ベースパーマリンクの最後に'%_%'を付加。'%_%'がformatの値と置換される
  }
  echo '<div class="ta_pager">';
  if ( 1 != $ta_paged ) {
    echo '<a href="' . get_pagenum_link( 1 ) . '">&laquo;</a> ';
  }
  echo paginate_links( array(
    'base'      => $ta_pager_base,
    'format'    => $ta_pager_format,
    'total'     => $wp_query->max_num_pages,
    'mid_size'  => $ta_common_pager1_mid_size,
    'current'   => $ta_paged,
    'prev_text' => '<',
    'next_text' => '>',
  ) );
  if ( $wp_query->max_num_pages != $ta_paged ) {
    if ( '' == $ta_pager_format ) {
      $ta_pager_base = str_replace( '%#%', $wp_query->max_num_pages, $ta_pager_base );
    } else {
      $ta_pager_format = str_replace( '%#%', $wp_query->max_num_pages, $ta_pager_format );
      $ta_pager_base = str_replace( '%_%', $ta_pager_format, $ta_pager_base );
    }
    echo ' <a href="' . $ta_pager_base . '">&raquo;</a> ';
  }
  echo '</div>';
}

function ta_pager_prenext( $prefix ) {
  global $paged;
  if ( $paged ) { $ta_paged = $paged; } else { $ta_paged = 1; }  //先頭ページは0と表記されるため1を代入 ?>
  <div class="ta-prenext-pager <?php echo $prefix; ?>-digest-pager">
<?php
    $ta_common_pager_prenext_pre_name = ta_read_op( 'ta_common_pager_prenext_pre_name' );
    $previous_page = get_previous_posts_page_link();
    if( $ta_paged != 1 ){ ?>
    <div class="ta-prenext-pager-pre"><a href="<?php echo $previous_page; ?>"><?php echo $ta_common_pager_prenext_pre_name; ?></a></div>
<?php
    }
    global $wp_query;
    $ta_common_pager_prenext_next_name = ta_read_op( 'ta_common_pager_prenext_next_name' );
    $next_page=get_next_posts_page_link();
    if( $ta_paged != $wp_query->max_num_pages ) { ?>
    <div class="ta-prenext-pager-next"><a href="<?php echo $next_page; ?>"><?php echo $ta_common_pager_prenext_next_name; ?></a></div>
<?php
    } ?>
  </div><!-- end of .<?php echo $prefix; ?>-digest-pager -->
<?php
}
  
//投稿の前後記事へのリンクに関する関数
function ta_previous_next_post_link() {
  $ta_common_pager2_onoff = ta_read_op( 'ta_common_pager2_onoff' );
  $ta_common_pager2_pre_insert = ta_read_op( 'ta_common_pager2_pre_insert' );
  $ta_common_pager2_after_insert = ta_read_op( 'ta_common_pager2_after_insert' );
  if ( 'valid' == $ta_common_pager2_onoff ) {
    $common_exp_vald = ta_read_op( 'ta_common_expiration_onoff' );
    $prev = get_previous_post();
    if ( '' == $prev ) {
      $prev_exp_vald = '';
      $prev_exp_date = '';
    } else {
      $prev_exp_vald = ta_read_post( $prev->ID, 'ta_post_expiration_onoff' );
      $prev_exp_date = ta_read_post( $prev->ID, 'ta_post_expiration_datetime' );
    }
    $next = get_next_post();
    if ( '' == $next ) {
      $next_exp_vald = '';
      $next_exp_date = '';
    } else {
      $next_exp_vald = ta_read_post( $next->ID, 'ta_post_expiration_onoff' );
      $next_exp_date = ta_read_post( $next->ID, 'ta_post_expiration_datetime' );
    }
    //日本時間ゾーンに設定
    date_default_timezone_set( 'Asia/Tokyo' );
    $prev_ok = 1;
    if ( 'valid' == $common_exp_vald && 'valid' == $prev_exp_vald && strtotime( $prev_exp_date ) - strtotime( date('Y-m-d') ) < 0 ) { $prev_ok = 0; }
    $next_ok = 1;
    if ( 'valid' == $common_exp_vald && 'valid' == $next_exp_vald && strtotime( $next_exp_date ) - strtotime( date('Y-m-d') ) < 0 ) { $next_ok = 0; }
    //世界標準時間ゾーンに戻す（WordPress標準）
    date_default_timezone_set( 'UTC' ); ?>
  <div class="ta-previous-next-post-link">
<?php
    if ( $prev_ok ) { ?>
    <div class="ta-previous-post-link"><?php previous_post_link( $ta_common_pager2_pre_insert . ' %link', '%title', true ); ?></div>
<?php
    }
    if ( $next_ok ) { ?>
    <div class="ta-next-post-link"><?php next_post_link( '%link ' . $ta_common_pager2_after_insert, '%title', true ); ?></div>
<?php
    } ?>
  </div>
<?php
  }
}

//microdata形式パンくずナビに関する関数
function ta_bread_crumb() {
  global $post;
  $m_mark = 'http://data-vocabulary.org/Breadcrumb';
  $html_list = '';
  $top_text = ta_read_op( 'ta_common_bread_top_text' );
  $text_btwn_pages = ta_read_op( 'ta_common_bread_text_between_pages' );
  if ( !is_home() && !is_admin() ) {
    $html_list .= '<div id="ta_bread_crumb"><div itemscope itemtype=' . $m_mark . '>';
    $html_list .= '<a href="'. home_url('/') .'" itemprop="url"><span itemprop="title" class="top_title">' . $top_text . '</span></a>' . $text_btwn_pages . '</div>';
    if ( is_category() ) {
      $cat = get_queried_object();
      if ( $cat->parent != 0 ) {
        $ancestors = array_reverse(get_ancestors( $cat->cat_ID, 'category' ) );
        foreach( $ancestors as $ancestor ) {
          $html_list .= '<div itemscope itemtype=' . $m_mark . '><a href="' . get_category_link( $ancestor ) . '" itemprop="url"><span itemprop="title">'. get_cat_name( $ancestor ) . '</span></a>' . $text_btwn_pages . '</div>';
        }
      }
    } else if ( is_page() ) {
      if ( $post->post_parent != 0 ) {
        $ancestors = array_reverse( get_post_ancestors( $post->ID ) );
        foreach( $ancestors as $ancestor ) {
          if ( home_url('/') != get_the_permalink( $ancestor ) ) {
            $html_list .= '<div itemscope itemtype=' . $m_mark . '><a href="' . get_permalink( $ancestor ) . '" itemprop="url"><span itemprop="title">' . get_the_title( $ancestor ) . '</span></a>' . $text_btwn_pages . '</div>';
          }
        }
      }
    } else if ( is_singular( 'post' ) ){
      $categories = get_the_category( $post->ID );
      if ( array() != $categories ) {   //カスタム投稿タイプなどへの対応
        $cat = $categories[0];
        if ( $cat->category_parent != 0 ) {
          $ancestors = array_reverse( get_ancestors( $cat->cat_ID, 'category' ) );
          foreach( $ancestors as $ancestor ) {
            $html_list .= '<div itemscope itemtype=' . $m_mark . '><a href="' . get_category_link( $ancestor ) . '" itemprop="url"><span itemprop="title">' . get_cat_name( $ancestor ) . '</span></a>' . $text_btwn_pages . '</div>';
          }
        }
        $html_list .= '<div itemscope itemtype=' . $m_mark . '><a href="' . get_category_link( $cat->term_id ) . '" itemprop="url"><span itemprop="title">' . $cat->cat_name . '</span></a>' . $text_btwn_pages . '</div>';
      }
    }
    $html_list .= '<div><span>'. wp_title( '', false, 'right' ) . '</span></div>';  //現在のページのタイトル表示
    $html_list .= '</div><!-- end of #ta_bread_crumb -->';
  }
  echo $html_list;
}


/********* 最新投稿ダイジェストに関する関数 *********/
//最新投稿ダイジェスト（全ての投稿が対象）の表示
function ta_latestposts_display( $place ) {
  $onoff = ta_read_op( 'ta_' . $place . '_latestposts_onoff' );
  $full_onoff = ta_read_op( 'ta_' . $place . '_latestposts_full_content_onoff' );
  $cgp_onoff = ta_read_op( 'ta_' . $place . '_latestposts_cgp_onoff' );
  $row_num = ta_read_op( 'ta_' . $place . '_latestposts_row_num' );
  $ta_id_prefix = ( 'top' == $place ) ? 'main' : $place;
  $ta_title_prefix = ( 'top' == $place ) ? '' : $place . '_';
  $top_class = ( 'value' == ta_read_op( 'ta_' . $place . '_latestposts_top_margin' ) ) ? 'ta-' . $place . '-latestposts-top-margin' : ta_read_op( 'ta_' . $place . '_latestposts_top_margin' );
  if ( "valid" == $onoff ) {
    $paged = ta_latestposts_query_posts( $place ); ?>
  <div id="<?php echo $ta_id_prefix; ?>-whatsnew" class="<?php echo $top_class; ?>">
    <aside id="<?php echo $ta_id_prefix; ?>-whatsnew-info">
<?php
    ta_latestposts_frame_title( $place, $ta_title_prefix ); ?>
      <div class="<?php echo $ta_id_prefix; ?>-info-wrap">
        <div class="info-contents-group head">
<?php
    if ( have_posts() ) {
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
        ta_digest_timecat_title_selection( $place, 'latestposts', 'ind', $ta_title_prefix, $count );          //独立欄
        if ( 'valid' == $full_onoff ) {
          ta_digest_display_full( $place, 'latestposts', $ta_title_prefix );
        } else if ( 'valid' == $cgp_onoff ) { ?>
              <div class="info-contents-thmimg-excerpt">
<?php
          ta_digest_display_thumbnail( $count );                                                              //Thumbnail Image (div.info-contents-thmimg) ?>
                <div class="info-contents-excerpt info-contents-excerpt-<?php echo $count; ?>">
<?php
          ta_digest_timecat_title_selection( $place, 'latestposts', 'cg_top', $ta_title_prefix, $count );     //コンテンツグループ上部
          ta_digest_display_excerpt( $place, 'latestposts' );                                                 //Excerpt Contents
          ta_digest_timecat_title_selection( $place, 'latestposts', 'cg_bottom', $ta_title_prefix, $count );  //コンテンツグループ下部 ?>
                </div><!-- end of .info-contents-excerpt -->
              </div><!-- end of .info-contents-thmimg-excerpt -->
<?php
        } ?>
            </div><!-- end of .info-contents -->
<?php
      ta_latestposts_style( $place, $ta_id_prefix, $count );
      $count++;
      }
    } ?>
        </div><!-- end of .info-contents-group -->
      </div>
    </aside><!-- end of #<?php echo $ta_id_prefix; ?>-whatsnew-info -->
  </div><!-- end of #<?php echo $ta_id_prefix; ?>-whatsnew -->
<?php
    ta_latestposts_pager( $place, $ta_id_prefix );
    wp_reset_postdata();
    wp_reset_query();
  }
}


/********* 最新投稿ダイジェストに関するショートコード関数（ページャーは使用不可）*********/
if ( ! TA_HIEND_PI ) {
  function ta_latestposts_disp_shortcode_no_shortcode() { return ''; }
  add_shortcode( 'ta_latestposts_disp', 'ta_latestposts_disp_shortcode_no_shortcode' );
}


/********* 各種投稿ダイジェスト一括表示に関する関数 *********/
//各種投稿ダイジェスト一括表示
function ta_postdigest_display( $place ) {
  $onoff = ta_read_op( 'ta_' . $place . '_postdigest_onoff' );
  $titles = ta_read_op( 'ta_' . $place . '_postdigest_titles' );
  $full_onoff = ta_read_op( 'ta_' . $place . '_postdigest_full_content_onoff' );
  $cgp_onoff = ta_read_op( 'ta_' . $place . '_postdigest_cgp_onoff' );
  $row_num = ta_read_op( 'ta_' . $place . '_postdigest_row_num' );
  $ta_id_prefix = ( 'top' == $place ) ? 'main' : $place;
  $ta_title_prefix = ( 'top' == $place ) ? '' : $place . '_';
  $top_class = ( 'value' == ta_read_op( 'ta_' . $place . '_postdigest_top_margin' ) ) ? 'ta-' . $place . '-postdigest-top-margin' : ta_read_op( 'ta_' . $place . '_postdigest_top_margin' );
  if ( "valid" == $onoff ) { ?>
  <div id="<?php echo $ta_id_prefix; ?>-catdigest" class="<?php echo $top_class; ?>">
<?php
    foreach ( $titles as $cat_name ) {
      if ( is_array( term_exists( $cat_name, 'category' ) ) ) {
        $paged = ta_postdigest_query_posts( $place, $cat_name ); ?>
    <aside id="cat-<?php echo get_category_by_slug( $cat_name )->term_id; ?>-info" class="<?php echo $top_class; ?>">
<?php
        ta_postdigest_frame_title( $place, $ta_title_prefix, $cat_name ); ?>
      <div class="<?php echo $ta_id_prefix; ?>-info-wrap">
        <div class="info-contents-group head">
<?php
        if ( have_posts() ) {
          $count = 1;
          while ( have_posts() ) {
            the_post();
            if ( ( 1 == $count % $row_num || 1 == $row_num ) && $count != 1) { ?>
        </div><!-- end of .info-contents-group -->
        <div class="info-contents-group">
<?php
            } ?>
            <div class="info-contents  <?php if ( 0 == $count % $row_num ) echo 'info-contents-edge'; ?>">
<?php
            ta_digest_timecat_title_selection( $place, 'postdigest', 'ind', $ta_title_prefix, $count );          //独立欄
            if ( 'valid' == $full_onoff ) {
              ta_digest_display_full( $place, 'postdigest', $ta_title_prefix );
            } else if ( 'valid' == $cgp_onoff ) { ?>
              <div class="info-contents-thmimg-excerpt">
<?php
              ta_digest_display_thumbnail( $count );                                                             //Thumbnail Image (div.info-contents-thmimg) ?>
                <div class="info-contents-excerpt info-contents-excerpt-<?php echo $count; ?>">
<?php
              ta_digest_timecat_title_selection( $place, 'postdigest', 'cg_top', $ta_title_prefix, $count );     //コンテンツグループ上部
              ta_digest_display_excerpt( $place, 'postdigest' );                                                 //Excerpt Contents
              ta_digest_timecat_title_selection( $place, 'postdigest', 'cg_bottom', $ta_title_prefix, $count );  //コンテンツグループ下部 ?>
                </div><!-- end of .info-contents-excerpt -->
              </div><!-- end of .info-contents-thmimg-excerpt -->
<?php
            } ?>
            </div><!-- end of .info-contents -->
<?php
          ta_postdigest_style( $place, $ta_id_prefix, $cat_name, $count );
          $count++;
          }
        } ?>
        </div><!-- end of .info-contents-group -->
      </div>
    </aside>
<?php
        ta_postdigest_pager( $place, $ta_id_prefix, $cat_name );
        wp_reset_postdata();
        wp_reset_query();
      }
    } ?>
  </div>
<?php
  }
}


/********* 各種投稿ダイジェスト個別表示に関するショートコード関数（ページャーは使用不可）*********/
if ( ! TA_HIEND_PI ) {
  function ta_postdigest_disp_shortcode_no_shortcode() { return ''; }
  add_shortcode( 'ta_postdigest_disp', 'ta_postdigest_disp_shortcode_no_shortcode' );
}


//Digest Frame Title
function ta_latestposts_frame_title( $place, $ta_title_prefix ) {
  $title_onoff = ta_read_op( 'ta_' . $place . '_latestposts_title_onoff' );
  $title_factor = ta_read_op( 'ta_' . $place . '_latestposts_title_factor' );
  $title = ta_read_op( 'ta_' . $place . '_latestposts_title' );
  if ( 'valid' == $title_onoff ) { ?>
      <<?php echo $title_factor; ?> class="<?php echo $ta_title_prefix; ?>title"><?php ta_deleteyen( $title ); ?></<?php echo $title_factor; ?>>
<?php
  }
}

function ta_postdigest_frame_title( $place, $ta_title_prefix, $cat_name ) {
  $title_onoff = ta_read_op( 'ta_' . $place . '_postdigest_title_onoff' );
  $title_link_onoff = ta_read_op( 'ta_' . $place . '_postdigest_title_link_onoff' );
  $title_factor = ta_read_op( 'ta_' . $place . '_postdigest_title_factor' );
  if ( 'valid' == $title_onoff ) {
    if ( 'valid' == $title_link_onoff ) { ?>
      <<?php echo $title_factor; ?> class="<?php echo $ta_title_prefix; ?>title"><a href="<?php echo get_term_link( $cat_name, 'category' ); ?>"><?php echo esc_html( get_category_by_slug( $cat_name )->name ); ?></a></<?php echo $title_factor; ?>>
<?php
    } else { ?>
      <<?php echo $title_factor; ?> class="<?php echo $ta_title_prefix; ?>title"><?php echo esc_html( get_category_by_slug( $cat_name )->name ); ?></<?php echo $title_factor; ?>>
<?php
    }
  }
}

//Query
function ta_latestposts_query_posts( $place ) {
  $num = ta_read_op( 'ta_' . $place . '_latestposts_num' );
  $nodis_cats = ta_read_op( 'ta_' . $place . '_latestposts_nodis_cats' );
  $cat = '';
  $cnt = 0;
  foreach ( $nodis_cats as $nodis_cat ) {
    if ( 0 == $cnt ) {
      $cat .= '&cat=';
    } else {
      $cat .= ',';
    }
    $cat .= '-' . $nodis_cat;
    $cnt++;
  }
  $pager_type = ta_read_op( 'ta_' . $place . '_latestposts_pager_type' );
  $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ): 1;
  if ( 'none' != $pager_type ) {
    query_posts( 'posts_per_page=' . $num . '&paged=' . $paged . $cat );
  } else {
    query_posts( 'posts_per_page=' . $num . $cat );
  }
  return $paged;
}

function ta_postdigest_query_posts( $place, $cat_name ) {
  $num = ta_read_op( 'ta_' . $place . '_postdigest_num' );
  $pager_type = ta_read_op( 'ta_' . $place . '_postdigest_pager_type' );
  $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ): 1;
  if ( 'none' != $pager_type ) {
    query_posts( 'posts_per_page=' . $num . '&paged=' . $paged . '&category_name=' . $cat_name  );
  } else {
    query_posts( 'posts_per_page=' . $num . '&category_name=' . $cat_name );
  }
  return $paged;
}

//Timecat Or Title Selection
function ta_digest_timecat_title_selection( $place, $role, $position, $ta_title_prefix, $count ) {
  $full_onoff = ta_read_op( 'ta_' . $place . '_' . $role . '_full_content_onoff' );
  if ( 'valid' != $full_onoff ) {
    $value = ta_read_op( 'ta_' . $place . '_' . $role . '_' . $position );
    if ( 'timecat-title' == $value ) { 
      ta_digest_display_timecat( $count );
      ta_digest_display_title( $place, $role, $ta_title_prefix );
    } else if ( 'title-timecat' == $value ) {
      ta_digest_display_title( $place, $role, $ta_title_prefix );
      ta_digest_display_timecat( $count );
    } else if ( 'timecat' == $value ) {
      ta_digest_display_timecat( $count );
    } else if ( 'title' == $value ) {
      ta_digest_display_title( $place, $role, $ta_title_prefix );
    }
  }
}

//Date & Category
function ta_digest_display_timecat( $count ) {
  $cat = get_the_category();
  if ( array() != $cat ) {
    $cat = $cat[0];
    $cat_name = $cat->cat_name; ?>
  <div class="info-contents-timecat">
    <time class="info-contents-time entry-date" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time(get_option('date_format')); ?></time>
    <a href="<?php echo get_category_link( $cat->term_id ); ?>"><span class="info-contents-cat info-contents-cat-<?php echo $count; ?>"><?php echo $cat_name; ?></span></a>
  </div><!-- end of .info-contents-timecat -->
<?php
  } else { ?>
  <div class="info-contents-timecat">
    <time class="info-contents-time entry-date" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time(get_option('date_format')); ?></time>
    <span class="info-contents-cat info-contents-cat-<?php echo $count; ?>">　</span>
  </div><!-- end of .info-contents-timecat -->
<?php
  }
}

//Title
function ta_digest_display_title( $place, $role, $title_prefix ) {
  $mark_onoff = ta_read_op( 'ta_' . $place . '_' . $role . '_release_mark_onoff' );
  $mark_days = ta_read_op( 'ta_' . $place . '_' . $role . '_release_mark_days' );
  $mark_pic = ta_read_op( 'ta_' . $place . '_' . $role . '_release_mark_pic' );
  $mark_text = ta_read_op( 'ta_' . $place . '_' . $role . '_release_mark_text' );
  $title_factor = ta_read_op( 'ta_' . $place . '_' . $role . '_post_title_factor' );
  $date_diff = ( strtotime( date_i18n("Y-m-d") ) - strtotime( get_the_time('Y-m-d') ) ) / ( 60 * 60 * 24);
  $mark_valid = ( $date_diff <= $mark_days ) ? 1: 0; ?>
  <div class="info-contents-title">
<?php
  if ( 'valid' == $mark_onoff && $mark_valid ) {
    if ( 'no_image' != $mark_pic ) { ?>
    <<?php echo $title_factor; ?> class="info-title <?php echo $title_prefix; ?>title">
      <img class="ta-<?php echo $place; ?>-<?php echo $role; ?>-release-mark" src="<?php echo $mark_pic; ?>" alt="release-mark" />
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </<?php echo $title_factor; ?>>
<?php
    } else { ?>
    <<?php echo $title_factor; ?> class="info-title <?php echo $title_prefix; ?>title">
      <span class="ta-<?php echo $place; ?>-<?php echo $role; ?>-release-text"><?php echo $mark_text; ?></span>
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </<?php echo $title_factor; ?>>
<?php
    }
  } else { ?>
    <<?php echo $title_factor; ?> class="info-title <?php echo $title_prefix; ?>title">
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </<?php echo $title_factor; ?>>
<?php
  } ?>
  </div><!-- end of .info-contents-title -->
<?php
}

//Full Image & Contents
function ta_digest_display_full( $place, $role, $title_prefix ) { ?>
  <div class="info-contents-fullimg-content">
<?php
  if ( has_post_thumbnail() ) { ?>
    <div class="info-contents-fullimg">
      <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail( 'full', array('alt' => the_title_attribute( 'echo=0' ), 'title' => the_title_attribute( 'echo=0' ) ) ); ?>
      </a>
    </div><!-- end of .info-contents-fullimg -->
<?php
  }
  ta_digest_display_title( $place, $role, $title_prefix ); ?>
    <div class="info-contents-content">
      <?php the_content();  //Full Contents ?>
    </div><!-- end of .info-contents-content -->
  </div><!-- end of .info-contents-fullimg-content -->
<?php
}

//Thumbnail Image
function ta_digest_display_thumbnail( $count ) {
  if ( has_post_thumbnail() ) { ?>
  <div class="info-contents-thmimg info-contents-thmimg-count-<?php echo $count; ?>">
    <a href="<?php the_permalink(); ?>">
      <?php the_post_thumbnail('ta_square_image240', array('alt' => the_title_attribute('echo=0'), 'title' => the_title_attribute('echo=0'))); ?>
    </a>
  </div><!-- end of .info-contents-thmimg -->
<?php
  }
}

//Excerpt Content
function ta_digest_display_excerpt( $place, $role ) {
  $excerpt = ta_read_op( 'ta_' . $place . '_' . $role . '_excerpt' );
  $lowermark = ta_read_op( 'ta_' . $place . '_' . $role . '_excerpt_lowermark' );
  $lowermark_title = ta_read_op( 'ta_' . $place . '_' . $role . '_excerpt_lowermark_title' );
  // 改行などを無視して抜粋文を出力する
  $p = get_post( get_the_ID() );
  $content = strip_shortcodes( $p->post_content );
  $content = str_replace( '&nbsp;', "", $content );
  $content = str_replace( array( "\r\n","\r","\n" ), '', $content );
  if ( $excerpt > 0 && '' != $content ) { ?>
    <div class="digest-excerpt <?php if ( has_post_thumbnail() ) echo 'digest-excerpt-withimage';?>">
      <a href="<?php the_permalink(); ?>">
        <p>
          <?php echo wp_html_excerpt( $content, $excerpt, ' ...' );
    if ( 'none' != $lowermark ) { ?>
          <span class="excerpt-lowermark-container">
            <span class="excerpt-lowermark">
              <?php echo $lowermark_title; ?>
            </span>
          </span>
<?php
    } ?>
        </p>
      </a>
    </div>
<?php
  } else { ?>
    <div class="digest-excerpt"></div>
<?php
  }
}

//Style
function ta_latestposts_style( $place, $ta_id_prefix, $count ) {
  $img_padding = ta_read_op( 'ta_' . $place . '_latestposts_img_padding' );
  $img_name = ta_read_op( 'ta_' . $place . '_latestposts_img_size' );
  $img_size = explode( 'ta_square_image', $img_name );
  $responsible_base_onoff = ta_read_op( 'ta_responsible_base_onoff' );
  $responsible_base_switch_width = ta_read_op( 'ta_responsible_base_switch_width' );
  $responsible_img_name = ta_read_op( 'ta_responsible_' . $place . '_latestposts_img_size' );
  $responsible_img_size = explode( 'ta_square_image', $responsible_img_name );
  $cat = get_the_category(); ?>
  <style type="text/css">
<?php
  if ( array() != $cat ) {
    $cat = $cat[0];
    $ta_cat_bg_color = ( '' == get_option( '_' . 'ta_cat_bg_color_'. $cat->term_id ) ) ? 'transparent' : get_option( '_' . 'ta_cat_bg_color_'. $cat->term_id );
    $ta_cat_text_color = ( '' == get_option( '_' . 'ta_cat_text_color_'. $cat->term_id ) ) ? '#000000' : get_option( '_' . 'ta_cat_text_color_'. $cat->term_id ); ?>
    #<?php echo $ta_id_prefix; ?>-whatsnew .info-contents-timecat .info-contents-cat-<?php echo $count; ?> {
      color: <?php echo $ta_cat_text_color; ?>;
      background-color: <?php echo $ta_cat_bg_color; ?>;
    }
<?php
  } else { ?>
    #<?php echo $ta_id_prefix; ?>-whatsnew .info-contents-timecat .info-contents-cat-<?php echo $count; ?> {
      color: #000000;
      background-color: 'transparent';
    }
    
<?php
  } ?>
    #<?php echo $ta_id_prefix; ?>-whatsnew .info-contents-thmimg-excerpt .info-contents-excerpt-<?php echo $count; ?> {
<?php
  if ( 'none' != $img_name && has_post_thumbnail() ) { ?>
      min-height: <?php echo $img_size[1]; ?>px;
      width : 50%; /* IE8以下とAndroid4.3以下用 */
      width : -webkit-calc(100% - <?php echo ( $img_size[1] + $img_padding ); ?>px);
      width : calc(100% - <?php echo ( $img_size[1] + $img_padding ); ?>px);
<?php
  } else { ?>
      min-height: 0;
      width : 100%;
<?php
  } ?>
    }
    
<?php
  if ( 'valid' == $responsible_base_onoff ) { ?>
    @media only screen and (max-width : <?php echo $responsible_base_switch_width; ?>px){
<?php
    if ( 'same' != $responsible_img_name ) { ?>
      #<?php echo $ta_id_prefix; ?>-whatsnew .info-contents-thmimg-excerpt .info-contents-thmimg-count-<?php echo $count; ?> {
<?php
      if ( 'none' != $responsible_img_name && has_post_thumbnail() ) { ?>
        width: <?php echo $responsible_img_size[1]; ?>px!important;
        height: <?php echo $responsible_img_size[1]; ?>px!important;
        display: block!important;
<?php
      } else { ?>
        display: none!important;
<?php
      } ?>
      }
    
      #<?php echo $ta_id_prefix; ?>-whatsnew .info-contents-thmimg-excerpt .info-contents-excerpt-<?php echo $count; ?> {
<?php
      if ( 'none' != $responsible_img_name && has_post_thumbnail() ) { ?>
        min-height: <?php echo $responsible_img_size[1]; ?>px!important;
        width : 50%; /* IE8以下とAndroid4.3以下用 */
        width : -webkit-calc(100% - <?php echo ( $responsible_img_size[1] + $img_padding ); ?>px)!important;
        width : calc(100% - <?php echo ( $responsible_img_size[1] + $img_padding ); ?>px)!important;
<?php
      } else { ?>
        min-height: 0!important;
        width : 100%!important;
<?php
      }
    } ?>
      }
    }

<?php
  } ?>
  </style>
<?php
}

function ta_postdigest_style( $place, $ta_id_prefix, $cat_name, $count ) {
  $cat_id = get_category_by_slug( $cat_name )->term_id;
  $ta_cat_bg_color = ( '' == get_option( '_' . 'ta_cat_bg_color_'. $cat_id ) ) ? 'transparent' : get_option( '_' . 'ta_cat_bg_color_'. $cat_id );
  $ta_cat_text_color = ( '' == get_option( '_' . 'ta_cat_text_color_'. $cat_id ) ) ? '#000000' : get_option( '_' . 'ta_cat_text_color_'. $cat_id );
  $img_padding = ta_read_op( 'ta_' . $place . '_postdigest_img_padding' );
  $img_name = ta_read_op( 'ta_' . $place . '_postdigest_img_size' );
  $img_size = explode( 'ta_square_image', $img_name );
  $responsible_base_onoff = ta_read_op( 'ta_responsible_base_onoff' );
  $responsible_base_switch_width = ta_read_op( 'ta_responsible_base_switch_width' );
  $responsible_img_name = ta_read_op( 'ta_responsible_' . $place . '_postdigest_img_size' );
  $responsible_img_size = explode( 'ta_square_image', $responsible_img_name ); ?>
  <style type="text/css">
    #<?php echo $ta_id_prefix; ?>-catdigest #cat-<?php echo $cat_id; ?>-info .info-contents-timecat .info-contents-cat-<?php echo $count; ?> {
      color: <?php echo $ta_cat_text_color; ?>;
      background-color: <?php echo $ta_cat_bg_color; ?>;
    }
    
    #<?php echo $ta_id_prefix; ?>-catdigest #cat-<?php echo $cat_id; ?>-info .info-contents-thmimg-excerpt .info-contents-excerpt-<?php echo $count; ?> {
<?php
    if ( 'none' != $img_name && has_post_thumbnail() ) { ?>
      min-height: <?php echo $img_size[1]; ?>px;
      width : 50%; /* IE8以下とAndroid4.3以下用 */
      width : -webkit-calc(100% - <?php echo ( $img_size[1] + $img_padding ); ?>px);
      width : calc(100% - <?php echo ( $img_size[1] + $img_padding ); ?>px);
<?php
    } else { ?>
      min-height: 0;
      width : 100%;
<?php
    } ?>
    }

<?php
  if ( 'valid' == $responsible_base_onoff ) { ?>
    @media only screen and (max-width : <?php echo $responsible_base_switch_width; ?>px){
<?php
    if ( 'same' != $responsible_img_name ) { ?>
      #<?php echo $ta_id_prefix; ?>-catdigest .info-contents-thmimg-excerpt .info-contents-thmimg-count-<?php echo $count; ?> {
<?php
      if ( 'none' != $responsible_img_name && has_post_thumbnail() ) { ?>
        width: <?php echo $responsible_img_size[1]; ?>px!important;
        height: <?php echo $responsible_img_size[1]; ?>px!important;
        display: block!important;
<?php
      } else { ?>
        display: none!important;
<?php
      } ?>
      }
    
      #<?php echo $ta_id_prefix; ?>-catdigest #cat-<?php echo $cat_id; ?>-info .info-contents-thmimg-excerpt .info-contents-excerpt-<?php echo $count; ?> {
<?php
      if ( 'none' != $responsible_img_name && has_post_thumbnail() ) { ?>
        min-height: <?php echo $responsible_img_size[1]; ?>px!important;
        width : 50%; /* IE8以下とAndroid4.3以下用 */
        width : -webkit-calc(100% - <?php echo ( $responsible_img_size[1] + $img_padding ); ?>px)!important;
        width : calc(100% - <?php echo ( $responsible_img_size[1] + $img_padding ); ?>px)!important;
<?php
      } else { ?>
        min-height: 0!important;
        width : 100%!important;
<?php
      }
    } ?>
      }
    }

<?php
  } ?>
  </style>
<?php
}

function ta_archive_style( $count ) {
  $img_padding = ta_read_op( 'ta_common_listpage_img_padding' );
  $img_name = ta_read_op( 'ta_common_listpage_img_size' );
  $img_size = explode( 'ta_square_image', $img_name );
  $responsible_base_onoff = ta_read_op( 'ta_responsible_base_onoff' );
  $responsible_base_switch_width = ta_read_op( 'ta_responsible_base_switch_width' );
  $responsible_img_name = ta_read_op( 'ta_responsible_archive_img_size' );
  $responsible_img_size = explode( 'ta_square_image', $responsible_img_name );
  $cat = get_the_category(); ?>
  <style type="text/css">
<?php
  if ( array() != $cat ) {
    $cat = $cat[0];
    $cat_id = $cat->term_id;
    $ta_cat_bg_color = ( '' == get_option( '_' . 'ta_cat_bg_color_'. $cat_id ) ) ? 'transparent' : get_option( '_' . 'ta_cat_bg_color_'. $cat_id );
    $ta_cat_text_color = ( '' == get_option( '_' . 'ta_cat_text_color_'. $cat_id ) ) ? '#000000' : get_option( '_' . 'ta_cat_text_color_'. $cat_id ); ?>
    #archive-list .info-contents-timecat .info-contents-cat-<?php echo $count; ?> {
      color: <?php echo $ta_cat_text_color; ?>;
      background-color: <?php echo $ta_cat_bg_color; ?>;
    }
<?php
  } else { ?>
    #archive-list .info-contents-timecat .info-contents-cat-<?php echo $count; ?> {
      color: #000000;
      background-color: 'transparent';
    }
<?php
  } ?>
    #archive-list .info-contents-thmimg-excerpt .info-contents-excerpt-<?php echo $count; ?> {
<?php
  if ( 'none' != $img_name && has_post_thumbnail() ) { ?>
      min-height: <?php echo $img_size[1]; ?>px;
      width : 50%; /* IE8以下とAndroid4.3以下用 */
      width : -webkit-calc(100% - <?php echo ( $img_size[1] + $img_padding ); ?>px);
      width : calc(100% - <?php echo ( $img_size[1] + $img_padding ); ?>px);
<?php
  } else { ?>
      min-height: 0;
      width : 100%;
<?php
  } ?>
    }
    
<?php
  if ( 'valid' == $responsible_base_onoff ) { ?>
    @media only screen and (max-width : <?php echo $responsible_base_switch_width; ?>px){
<?php
    if ( 'same' != $responsible_img_name ) { ?>
      #archive-list .info-contents-thmimg-excerpt .info-contents-thmimg-count-<?php echo $count; ?> {
<?php
      if ( 'none' != $responsible_img_name && has_post_thumbnail() ) { ?>
        width: <?php echo $responsible_img_size[1]; ?>px!important;
        height: <?php echo $responsible_img_size[1]; ?>px!important;
        display: block!important;
<?php
      } else { ?>
        display: none!important;
<?php
      } ?>
      }
    
      #archive-list .info-contents-thmimg-excerpt .info-contents-excerpt-<?php echo $count; ?> {
<?php
      if ( 'none' != $responsible_img_name && has_post_thumbnail() ) { ?>
        min-height: <?php echo $responsible_img_size[1]; ?>px!important;
        width : 50%; /* IE8以下とAndroid4.3以下用 */
        width : -webkit-calc(100% - <?php echo ( $responsible_img_size[1] + $img_padding ); ?>px)!important;
        width : calc(100% - <?php echo ( $responsible_img_size[1] + $img_padding ); ?>px)!important;
<?php
      } else { ?>
        min-height: 0!important;
        width : 100%!important;
<?php
      }
    } ?>
      }
    }

<?php
  } ?>
  </style>
<?php
}

//Pager
function ta_latestposts_pager( $place, $ta_id_prefix ) {
  $pager_type = ta_read_op( 'ta_' . $place . '_latestposts_pager_type' );
  if ( 'none' != $pager_type ) {
    if ( 'numdisp' == $pager_type ) {
      ta_pager();
    } else {
      ta_pager_prenext( $ta_id_prefix );
    }
  }
}

function ta_postdigest_pager( $place, $ta_id_prefix, $cat_name ) {
  $pager_type = ta_read_op( 'ta_' . $place . '_postdigest_pager_type' );
  if ( 'none' != $pager_type ) {
    if ( 'numdisp' == $pager_type ) {
      ta_pager();
    } else {
      ta_pager_prenext( $ta_id_prefix );
    }
  } else {
    $catlink_onoff = ta_read_op( 'ta_' . $place . '_postdigest_catlink_onoff' );
    $catlink_title = ta_read_op( 'ta_' . $place . '_postdigest_catlink_title' );
    $catlink_title = str_replace( '%cat%', esc_html( get_category_by_slug( $cat_name )->name ), $catlink_title );
    if ( 'valid' == $catlink_onoff ) { ?>
  <span class="postdigest-list">
    <a href="<?php echo get_term_link( $cat_name, 'category' ); ?>"><?php echo $catlink_title; ?></a>
  </span>
<?php
    }
  }
}


/********* 簡易最新投稿ダイジェストショートコード *********/
function ta_simple_latestposts_disp( $atts ){
  extract( shortcode_atts( array( 'title_prefix' => 'main', ), $atts ) );
  $frame_title_onoff = ta_read_op( 'ta_common_simple_latestposts_title_onoff' );
  $frame_title_factor = ta_read_op( 'ta_common_simple_latestposts_title_factor' );
  $frame_title = ta_read_op( 'ta_common_simple_latestposts_title' );
  $num = ta_read_op( 'ta_common_simple_latestposts_num' );
  $nodis_cats = ta_read_op( 'ta_common_simple_latestposts_nodis_cats' );
  $disp_order = ta_read_op( 'ta_common_simple_latestposts_disp_order' );
  $title_prefix = ( 'main' == $title_prefix ) ? '' : $title_prefix . '_';
  $newwin_onoff = ta_read_op( 'ta_common_simple_latestposts_post_newwin_onoff' );
  $args = array( 
    'posts_per_page'=> $num,
    'category__not_in' => $nodis_cats,
  );
  $simple_query = new WP_Query( $args ); //サブクエリ
  ob_start(); ?>
          <div class="simple-whatsnew">
            <aside class="simple-whatsnew-info">
<?php
  if ( 'valid' == $frame_title_onoff ) { ?>
              <<?php echo $frame_title_factor; ?> class="<?php echo $title_prefix; ?>title"><?php ta_deleteyen( $frame_title ); ?></<?php echo $frame_title_factor; ?>>
<?php
  } ?>
              <div class="simple-info-wrap">
                <ul>
<?php
  if ( $simple_query->have_posts() ) {
    while ( $simple_query->have_posts() ) {
      $simple_query->the_post(); ?>
                  <li>
                    <div class="info-contents">
<?php
        ta_simple_digest_display_time();
        ta_simple_digest_display_title(); ?>
                    </div>
                  </li>
<?php
    }
  } ?>
                </ul>
              </div>
            </aside><!-- end of .simple-whatsnew-info -->
          </div><!-- end of .simple-whatsnew -->
<?php
  if ( 'valid' == $newwin_onoff ) { ?>
          <script type="text/javascript">
            jQuery( '.simple-whatsnew a' ).attr( 'target' , '_blank' );
          </script>
<?php
  }
  wp_reset_postdata();
  $simple_latestposts_disp_code = ob_get_contents();
  ob_end_clean();
  return $simple_latestposts_disp_code;
}
add_shortcode( 'ta_simple_latestposts_disp', 'ta_simple_latestposts_disp' );

//Date
function ta_simple_digest_display_time() { ?>
  <div class="info-contents-time">
    <time class="info-contents-time entry-date" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time(get_option('date_format')); ?></time>
  </div><!-- end of .info-contents-time -->
<?php
}

//Title
function ta_simple_digest_display_title() {
  $mark_onoff = ta_read_op( 'ta_common_simple_latestposts_release_mark_onoff' );
  $mark_days = ta_read_op( 'ta_common_simple_latestposts_release_mark_days' );
  $mark_pic = ta_read_op( 'ta_common_simple_latestposts_release_mark_pic' );
  $mark_text = ta_read_op( 'ta_common_simple_latestposts_release_mark_text' );
  $date_diff = ( strtotime( date_i18n("Y-m-d") ) - strtotime( get_the_time('Y-m-d') ) ) / ( 60 * 60 * 24);
  $mark_valid = ( $date_diff <= $mark_days ) ? 1: 0; ?>
  <div class="info-contents-title">
<?php
  if ( 'valid' == $mark_onoff && $mark_valid ) {
    if ( 'no_image' != $mark_pic ) { ?>
    <div class="info-title">
      <img class="ta-common-simple-latestposts-release-mark" src="<?php echo $mark_pic; ?>" alt="release-mark" />
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </div>
<?php
    } else { ?>
    <div class="info-title">
      <span class="ta-common-simple-latestposts-release-text"><?php echo $mark_text; ?></span>
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </div>
<?php
    }
  } else { ?>
    <div class="info-title">
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </div>
<?php
  } ?>
  </div><!-- end of .info-contents-title -->
<?php
}


/********* 投稿シングルの日時カテゴリー表示 *********/
//Date & Category
function ta_single_display_timecat( $position ) {
  $ta_common_post_title_timecat = ta_read_op( 'ta_common_post_title_timecat' );
  $cat = get_the_category();
  if ( array() != $cat ) {
    $cat = $cat[0];
    $ta_cat_bg_color = ( '' == get_option( '_' . 'ta_cat_bg_color_'. $cat->term_id ) ) ? 'transparent' : get_option( '_' . 'ta_cat_bg_color_'. $cat->term_id );
    $ta_cat_text_color = ( '' == get_option( '_' . 'ta_cat_text_color_'. $cat->term_id ) ) ? '#000000' : get_option( '_' . 'ta_cat_text_color_'. $cat->term_id );
    if ( $position == $ta_common_post_title_timecat ) { ?>
  <div class="single-timecat">
    <time class="single-time entry-date" datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time>
    <a class="single-cat" style="color:<?php echo $ta_cat_text_color; ?>;background-color:<?php echo $ta_cat_bg_color; ?>" href="<?php echo get_category_link( $cat->term_id ); ?>"><span><?php echo $cat->cat_name; ?></span></a>
  </div><!-- end of .single-timecat -->
<?php
    }
  } else {
    if ( $position == $ta_common_post_title_timecat ) { ?>
  <div class="single-timecat">
    <time class="single-time entry-date" datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time>
    <a class="single-cat" href="#"><span>　</span></a>
  </div><!-- end of .single-timecat -->
<?php
    }
  }
}


/********* メイン区切り線表示ショートコード *********/
function ta_main_separator_disp() {
  return '<hr class="ta-main-separator">';
}
add_shortcode( 'メイン区切り線', 'ta_main_separator_disp' );
add_shortcode( 'main_separator', 'ta_main_separator_disp' );


/********* サイドバー区切り線表示ショートコード *********/
function ta_sidebar_separator_disp() {
  return '<hr class="ta-sidebar-separator">';
}
add_shortcode( 'サイドバー区切り線', 'ta_sidebar_separator_disp' );
add_shortcode( 'sidebar_separator', 'ta_sidebar_separator_disp' );


/********* サブサイドバー区切り線表示ショートコード *********/
function ta_sidebarsub_separator_disp() {
  return '<hr class="ta-sidebarsub-separator">';
}
add_shortcode( 'サブサイドバー区切り線', 'ta_sidebarsub_separator_disp' );
add_shortcode( 'sidebarsub_separator', 'ta_sidebarsub_separator_disp' );


/********* TA汎用メニュー表示ショートコード *********/
if ( ! TA_HIEND_PI ) {
  function ta_versatile_menu_no_disp() {
    return '';
  }
  add_shortcode( 'ta_versatile_menu_disp', 'ta_versatile_menu_no_disp' );
}


/********* 画像と説明付きメニューショートコード（プラグイン無の処理）*********/
if ( ! TA_HIEND_PI ) {
  function ta_imgexp_menu_no_shortcode() { return ''; }
  add_shortcode( 'ta_imgexp_menu', 'ta_imgexp_menu_no_shortcode' );
}


/********* 汎用インラインブロック表示ショートコード *********/
if ( ! TA_HIEND_PI ) {
  function ta_inline_block_start_no_shortcode() { return ''; }
  add_shortcode( '配列(始)', 'ta_inline_block_start_no_shortcode' );
  add_shortcode( 'auto_layout_begin', 'ta_inline_block_start_no_shortcode' );
}

if ( ! TA_HIEND_PI ) {
  function ta_inline_block_end_no_shortcode() { return ''; }
  add_shortcode( '配列(終)', 'ta_inline_block_end_no_shortcode' );
  add_shortcode( 'auto_layout_end', 'ta_inline_block_end_no_shortcode' );
}

if ( ! TA_HIEND_PI ) {
  function ta_left_content_start_no_shortcode() { return ''; }
  add_shortcode( '左寄(始)', 'ta_left_content_start_no_shortcode' );
  add_shortcode( 'left_content_begin', 'ta_left_content_start_no_shortcode' );
}

if ( ! TA_HIEND_PI ) {
  function ta_left_content_end_no_shortcode() { return ''; }
  add_shortcode( '左寄(終)', 'ta_left_content_end_no_shortcode' );
  add_shortcode( 'left_content_end', 'ta_left_content_end_no_shortcode' );
}

if ( ! TA_HIEND_PI ) {
  function ta_right_content_start_no_shortcode() { return ''; }
  add_shortcode( '右寄(始)', 'ta_right_content_start_no_shortcode' );
  add_shortcode( 'right_content_begin', 'ta_right_content_start_no_shortcode' );
}

if ( ! TA_HIEND_PI ) {
  function ta_right_content_end_no_shortcode() { return ''; }
  add_shortcode( '右寄(終)', 'ta_right_content_end_no_shortcode' );
  add_shortcode( 'right_content_end', 'ta_right_content_end_no_shortcode' );
}


/********* アコーディオン展開ショートコード *********/
if ( ! TA_HIEND_PI ) {
  function ta_accordion_title_no_shortcode() { return ''; }
  add_shortcode( 'アコーディオン題目', 'ta_accordion_title_no_shortcode' );
  add_shortcode( 'ta_accordion_title', 'ta_accordion_title_no_shortcode' );
  
  function ta_accordion_title_start_no_shortcode() { return ''; }
  add_shortcode( 'アコーディオン題目(始)', 'ta_accordion_title_start_no_shortcode' );
  add_shortcode( 'ta_accordion_title_begin', 'ta_accordion_title_start_no_shortcode' );
  
  function ta_accordion_title_end_no_shortcode() { return ''; }
  add_shortcode( 'アコーディオン題目(終)', 'ta_accordion_title_end_no_shortcode' );
  add_shortcode( 'ta_accordion_title_end', 'ta_accordion_title_end_no_shortcode' );
}

if ( ! TA_HIEND_PI ) {
  function ta_accordion_content_no_shortcode() { return ''; }
  add_shortcode( 'アコーディオン内容', 'ta_accordion_content_no_shortcode' );
  add_shortcode( 'ta_accordion_content', 'ta_accordion_content_no_shortcode' );
  
  function ta_accordion_content_start_no_shortcode() { return ''; }
  add_shortcode( 'アコーディオン内容(始)', 'ta_accordion_content_start_no_shortcode' );
  add_shortcode( 'ta_accordion_content_begin', 'ta_accordion_content_start_no_shortcode' );
  
  function ta_accordion_content_end_no_shortcode() { return ''; }
  add_shortcode( 'アコーディオン内容(終)', 'ta_accordion_content_end_no_shortcode' );
  add_shortcode( 'ta_accordion_content_end', 'ta_accordion_content_end_no_shortcode' );
}


/********* TA汎用背景装飾ショートコード *********/
if ( ! TA_HIEND_PI ) {
  function ta_genbg_disp_start_no_shortcode() { return ''; }
  add_shortcode( '背景装飾(始)', 'ta_genbg_disp_start_no_shortcode' );
  add_shortcode( 'ta_genbg_begin', 'ta_genbg_disp_start_no_shortcode' );
}

if ( ! TA_HIEND_PI ) {
  function ta_genbg_disp_end_no_shortcode() { return ''; }
  add_shortcode( '背景装飾(終)', 'ta_genbg_disp_end_no_shortcode' );
  add_shortcode( 'ta_genbg_end', 'ta_genbg_disp_end_no_shortcode' );
}


/********* メインヘッドラインに関するショートコード関数 *********/
//h2
function ta_main_headline2_disp( $atts, $content = "" ){
  extract( shortcode_atts( array( 't' => '' ), $atts ) );
  $title = 'title';
  $num = '2';
  $class = ( 'fix' == $t ) ? ' fixed-space' : '';
  $unit = 'px';
  ob_start();
  if ( 'fix' == $t ) { ?>
  <h<?php echo $num; ?> class="<?php echo $title . $class; ?>"><?php echo $content; ?></h<?php echo $num; ?>>
<?php
  } else if ( '' == $t ) { ?>
  <h<?php echo $num; ?> class="<?php echo $title; ?>"><?php echo $content; ?></h<?php echo $num; ?>>
<?php
  } else { ?>
  <h<?php echo $num; ?> class="<?php echo $title; ?>" style="margin-top:<?php echo $t . $unit; ?>"><?php echo $content; ?></h<?php echo $num; ?>>
<?php
  }
  return ob_get_clean();
}
add_shortcode( 'メインh2', 'ta_main_headline2_disp' );
add_shortcode( 'main-h2', 'ta_main_headline2_disp' );

//h3
function ta_main_headline3_disp( $atts, $content = "" ){
  extract( shortcode_atts( array( 't' => '' ), $atts ) );
  $title = 'title';
  $num = '3';
  $class = ( 'fix' == $t ) ? ' fixed-space' : '';
  $unit = 'px';
  ob_start();
  if ( 'fix' == $t ) { ?>
  <h<?php echo $num; ?> class="<?php echo $title . $class; ?>"><?php echo $content; ?></h<?php echo $num; ?>>
<?php
  } else if ( '' == $t ) { ?>
  <h<?php echo $num; ?> class="<?php echo $title; ?>"><?php echo $content; ?></h<?php echo $num; ?>>
<?php
  } else { ?>
  <h<?php echo $num; ?> class="<?php echo $title; ?>" style="margin-top:<?php echo $t . $unit; ?>"><?php echo $content; ?></h<?php echo $num; ?>>
<?php
  }
  return ob_get_clean();
}
add_shortcode( 'メインh3', 'ta_main_headline3_disp' );
add_shortcode( 'main-h3', 'ta_main_headline3_disp' );

//h4
function ta_main_headline4_disp( $atts, $content = "" ){
  extract( shortcode_atts( array( 't' => '' ), $atts ) );
  $title = 'title';
  $num = '4';
  $class = ( 'fix' == $t ) ? ' fixed-space' : '';
  $unit = 'px';
  ob_start();
  if ( 'fix' == $t ) { ?>
  <h<?php echo $num; ?> class="<?php echo $title . $class; ?>"><?php echo $content; ?></h<?php echo $num; ?>>
<?php
  } else if ( '' == $t ) { ?>
  <h<?php echo $num; ?> class="<?php echo $title; ?>"><?php echo $content; ?></h<?php echo $num; ?>>
<?php
  } else { ?>
  <h<?php echo $num; ?> class="<?php echo $title; ?>" style="margin-top:<?php echo $t . $unit; ?>"><?php echo $content; ?></h<?php echo $num; ?>>
<?php
  }
  return ob_get_clean();
}
add_shortcode( 'メインh4', 'ta_main_headline4_disp' );
add_shortcode( 'main-h4', 'ta_main_headline4_disp' );

//h5
function ta_main_headline5_disp( $atts, $content = "" ){
  extract( shortcode_atts( array( 't' => '' ), $atts ) );
  $title = 'title';
  $num = '5';
  $class = ( 'fix' == $t ) ? ' fixed-space' : '';
  $unit = 'px';
  ob_start();
  if ( 'fix' == $t ) { ?>
  <h<?php echo $num; ?> class="<?php echo $title . $class; ?>"><?php echo $content; ?></h<?php echo $num; ?>>
<?php
  } else if ( '' == $t ) { ?>
  <h<?php echo $num; ?> class="<?php echo $title; ?>"><?php echo $content; ?></h<?php echo $num; ?>>
<?php
  } else { ?>
  <h<?php echo $num; ?> class="<?php echo $title; ?>" style="margin-top:<?php echo $t . $unit; ?>"><?php echo $content; ?></h<?php echo $num; ?>>
<?php
  }
  return ob_get_clean();
}
add_shortcode( 'メインh5', 'ta_main_headline5_disp' );
add_shortcode( 'main-h5', 'ta_main_headline5_disp' );


/********* サイドバーヘッドラインに関するショートコード関数 *********/
//h2
function ta_sidebar_headline2_disp( $atts, $content = "" ){
  extract( shortcode_atts( array( 't' => '' ), $atts ) );
  $title = 'sidebar_title';
  $num = '2';
  $class = ( 'fix' == $t ) ? ' fixed-space' : '';
  $unit = 'px';
  ob_start();
  if ( 'fix' == $t ) { ?>
  <h<?php echo $num; ?> class="<?php echo $title . $class; ?>"><?php echo $content; ?></h<?php echo $num; ?>>
<?php
  } else if ( '' == $t ) { ?>
  <h<?php echo $num; ?> class="<?php echo $title; ?>"><?php echo $content; ?></h<?php echo $num; ?>>
<?php
  } else { ?>
  <h<?php echo $num; ?> class="<?php echo $title; ?>" style="margin-top:<?php echo $t . $unit; ?>"><?php echo $content; ?></h<?php echo $num; ?>>
<?php
  }
  return ob_get_clean();
}
add_shortcode( 'サイドバーh2', 'ta_sidebar_headline2_disp' );
add_shortcode( 'sidebar-h2', 'ta_sidebar_headline2_disp' );

//h3
function ta_sidebar_headline3_disp( $atts, $content = "" ){
  extract( shortcode_atts( array( 't' => '' ), $atts ) );
  $title = 'sidebar_title';
  $num = '3';
  $class = ( 'fix' == $t ) ? ' fixed-space' : '';
  $unit = 'px';
  ob_start();
  if ( 'fix' == $t ) { ?>
  <h<?php echo $num; ?> class="<?php echo $title . $class; ?>"><?php echo $content; ?></h<?php echo $num; ?>>
<?php
  } else if ( '' == $t ) { ?>
  <h<?php echo $num; ?> class="<?php echo $title; ?>"><?php echo $content; ?></h<?php echo $num; ?>>
<?php
  } else { ?>
  <h<?php echo $num; ?> class="<?php echo $title; ?>" style="margin-top:<?php echo $t . $unit; ?>"><?php echo $content; ?></h<?php echo $num; ?>>
<?php
  }
  return ob_get_clean();
}
add_shortcode( 'サイドバーh3', 'ta_sidebar_headline3_disp' );
add_shortcode( 'sidebar-h3', 'ta_sidebar_headline3_disp' );

//h4
function ta_sidebar_headline4_disp( $atts, $content = "" ){
  extract( shortcode_atts( array( 't' => '' ), $atts ) );
  $title = 'sidebar_title';
  $num = '4';
  $class = ( 'fix' == $t ) ? ' fixed-space' : '';
  $unit = 'px';
  ob_start();
  if ( 'fix' == $t ) { ?>
  <h<?php echo $num; ?> class="<?php echo $title . $class; ?>"><?php echo $content; ?></h<?php echo $num; ?>>
<?php
  } else if ( '' == $t ) { ?>
  <h<?php echo $num; ?> class="<?php echo $title; ?>"><?php echo $content; ?></h<?php echo $num; ?>>
<?php
  } else { ?>
  <h<?php echo $num; ?> class="<?php echo $title; ?>" style="margin-top:<?php echo $t . $unit; ?>"><?php echo $content; ?></h<?php echo $num; ?>>
<?php
  }
  return ob_get_clean();
}
add_shortcode( 'サイドバーh4', 'ta_sidebar_headline4_disp' );
add_shortcode( 'sidebar-h4', 'ta_sidebar_headline4_disp' );

//h5
function ta_sidebar_headline5_disp( $atts, $content = "" ){
  extract( shortcode_atts( array( 't' => '' ), $atts ) );
  $title = 'sidebar_title';
  $num = '5';
  $class = ( 'fix' == $t ) ? ' fixed-space' : '';
  $unit = 'px';
  ob_start();
  if ( 'fix' == $t ) { ?>
  <h<?php echo $num; ?> class="<?php echo $title . $class; ?>"><?php echo $content; ?></h<?php echo $num; ?>>
<?php
  } else if ( '' == $t ) { ?>
  <h<?php echo $num; ?> class="<?php echo $title; ?>"><?php echo $content; ?></h<?php echo $num; ?>>
<?php
  } else { ?>
  <h<?php echo $num; ?> class="<?php echo $title; ?>" style="margin-top:<?php echo $t . $unit; ?>"><?php echo $content; ?></h<?php echo $num; ?>>
<?php
  }
  return ob_get_clean();
}
add_shortcode( 'サイドバーh5', 'ta_sidebar_headline5_disp' );
add_shortcode( 'sidebar-h5', 'ta_sidebar_headline5_disp' );


if ( ! TA_HIEND_PI ) {
  /********* ヘッダーヘッドラインに関するショートコード関数 *********/
  //h2
  function ta_header_headline2_disp_no_shortcode( $atts, $content = "" ){
    extract( shortcode_atts( array( 't' => '' ), $atts ) );
    $num = '2';
    ob_start();
    if ( 'fix' == $t ) { ?>
    <h<?php echo $num; ?> class="fixed-space"><?php echo $content; ?></h<?php echo $num; ?>>
  <?php
    } else if ( '' == $t ) { ?>
    <h<?php echo $num; ?>><?php echo $content; ?></h<?php echo $num; ?>>
  <?php
    } else { ?>
    <h<?php echo $num; ?> style="margin-top:<?php echo $t; ?>px"><?php echo $content; ?></h<?php echo $num; ?>>
  <?php
    }
    return ob_get_clean();
  }
  add_shortcode( 'ヘッダーh2', 'ta_header_headline2_disp_no_shortcode' );
  add_shortcode( 'header-h2', 'ta_header_headline2_disp_no_shortcode' );
  
  //h3
  function ta_header_headline3_disp_no_shortcode( $atts, $content = "" ){
    extract( shortcode_atts( array( 't' => '' ), $atts ) );
    $num = '3';
    ob_start();
    if ( 'fix' == $t ) { ?>
    <h<?php echo $num; ?> class="fixed-space"><?php echo $content; ?></h<?php echo $num; ?>>
  <?php
    } else if ( '' == $t ) { ?>
    <h<?php echo $num; ?>><?php echo $content; ?></h<?php echo $num; ?>>
  <?php
    } else { ?>
    <h<?php echo $num; ?> style="margin-top:<?php echo $t; ?>px"><?php echo $content; ?></h<?php echo $num; ?>>
  <?php
    }
    return ob_get_clean();
  }
  add_shortcode( 'ヘッダーh3', 'ta_header_headline3_disp_no_shortcode' );
  add_shortcode( 'header-h3', 'ta_header_headline3_disp_no_shortcode' );
  
  //h4
  function ta_header_headline4_disp_no_shortcode( $atts, $content = "" ){
    extract( shortcode_atts( array( 't' => '' ), $atts ) );
    $num = '4';
    ob_start();
    if ( 'fix' == $t ) { ?>
    <h<?php echo $num; ?> class="fixed-space"><?php echo $content; ?></h<?php echo $num; ?>>
  <?php
    } else if ( '' == $t ) { ?>
    <h<?php echo $num; ?>><?php echo $content; ?></h<?php echo $num; ?>>
  <?php
    } else { ?>
    <h<?php echo $num; ?> style="margin-top:<?php echo $t; ?>px"><?php echo $content; ?></h<?php echo $num; ?>>
  <?php
    }
    return ob_get_clean();
  }
  add_shortcode( 'ヘッダーh4', 'ta_header_headline4_disp_no_shortcode' );
  add_shortcode( 'header-h4', 'ta_header_headline4_disp_no_shortcode' );
  
  //h5
  function ta_header_headline5_disp_no_shortcode( $atts, $content = "" ){
    extract( shortcode_atts( array( 't' => '' ), $atts ) );
    $num = '5';
    ob_start();
    if ( 'fix' == $t ) { ?>
    <h<?php echo $num; ?> class="fixed-space"><?php echo $content; ?></h<?php echo $num; ?>>
  <?php
    } else if ( '' == $t ) { ?>
    <h<?php echo $num; ?>><?php echo $content; ?></h<?php echo $num; ?>>
  <?php
    } else { ?>
    <h<?php echo $num; ?> style="margin-top:<?php echo $t; ?>px"><?php echo $content; ?></h<?php echo $num; ?>>
  <?php
    }
    return ob_get_clean();
  }
  add_shortcode( 'ヘッダーh5', 'ta_header_headline5_disp_no_shortcode' );
  add_shortcode( 'header-h5', 'ta_header_headline5_disp_no_shortcode' );
  
  
  /********* サブサイドバーヘッドラインに関するショートコード関数 *********/
  //h2
  function ta_sidebarsub_headline2_disp_no_shortcode( $atts, $content = "" ){
    extract( shortcode_atts( array( 't' => '' ), $atts ) );
    $num = '2';
    ob_start();
    if ( 'fix' == $t ) { ?>
    <h<?php echo $num; ?> class="fixed-space"><?php echo $content; ?></h<?php echo $num; ?>>
  <?php
    } else if ( '' == $t ) { ?>
    <h<?php echo $num; ?>><?php echo $content; ?></h<?php echo $num; ?>>
  <?php
    } else { ?>
    <h<?php echo $num; ?> style="margin-top:<?php echo $t; ?>px"><?php echo $content; ?></h<?php echo $num; ?>>
  <?php
    }
    return ob_get_clean();
  }
  add_shortcode( 'サブサイドバーh2', 'ta_sidebarsub_headline2_disp_no_shortcode' );
  add_shortcode( 'sidebarsub-h2', 'ta_sidebarsub_headline2_disp_no_shortcode' );
  
  //h3
  function ta_sidebarsub_headline3_disp_no_shortcode( $atts, $content = "" ){
    extract( shortcode_atts( array( 't' => '' ), $atts ) );
    $num = '3';
    ob_start();
    if ( 'fix' == $t ) { ?>
    <h<?php echo $num; ?> class="fixed-space"><?php echo $content; ?></h<?php echo $num; ?>>
  <?php
    } else if ( '' == $t ) { ?>
    <h<?php echo $num; ?>><?php echo $content; ?></h<?php echo $num; ?>>
  <?php
    } else { ?>
    <h<?php echo $num; ?> style="margin-top:<?php echo $t; ?>px"><?php echo $content; ?></h<?php echo $num; ?>>
  <?php
    }
    return ob_get_clean();
  }
  add_shortcode( 'サブサイドバーh3', 'ta_sidebarsub_headline3_disp_no_shortcode' );
  add_shortcode( 'sidebarsub-h3', 'ta_sidebarsub_headline3_disp_no_shortcode' );
  
  //h4
  function ta_sidebarsub_headline4_disp_no_shortcode( $atts, $content = "" ){
    extract( shortcode_atts( array( 't' => '' ), $atts ) );
    $num = '4';
    ob_start();
    if ( 'fix' == $t ) { ?>
    <h<?php echo $num; ?> class="fixed-space"><?php echo $content; ?></h<?php echo $num; ?>>
  <?php
    } else if ( '' == $t ) { ?>
    <h<?php echo $num; ?>><?php echo $content; ?></h<?php echo $num; ?>>
  <?php
    } else { ?>
    <h<?php echo $num; ?> style="margin-top:<?php echo $t; ?>px"><?php echo $content; ?></h<?php echo $num; ?>>
  <?php
    }
    return ob_get_clean();
  }
  add_shortcode( 'サブサイドバーh4', 'ta_sidebarsub_headline4_disp_no_shortcode' );
  add_shortcode( 'sidebarsub-h4', 'ta_sidebarsub_headline4_disp_no_shortcode' );
  
  //h5
  function ta_sidebarsub_headline5_disp_no_shortcode( $atts, $content = "" ){
    extract( shortcode_atts( array( 't' => '' ), $atts ) );
    $num = '5';
    ob_start();
    if ( 'fix' == $t ) { ?>
    <h<?php echo $num; ?> class="fixed-space"><?php echo $content; ?></h<?php echo $num; ?>>
  <?php
    } else if ( '' == $t ) { ?>
    <h<?php echo $num; ?>><?php echo $content; ?></h<?php echo $num; ?>>
  <?php
    } else { ?>
    <h<?php echo $num; ?> style="margin-top:<?php echo $t; ?>px"><?php echo $content; ?></h<?php echo $num; ?>>
  <?php
    }
    return ob_get_clean();
  }
  add_shortcode( 'サブサイドバーh5', 'ta_sidebarsub_headline5_disp_no_shortcode' );
  add_shortcode( 'sidebarsub-h5', 'ta_sidebarsub_headline5_disp_no_shortcode' );
  
  
  /********* フッターヘッドラインに関するショートコード関数 *********/
  //h2
  function ta_footer_headline2_disp_no_shortcode( $atts, $content = "" ){
    extract( shortcode_atts( array( 't' => '' ), $atts ) );
    $num = '2';
    ob_start();
    if ( 'fix' == $t ) { ?>
    <h<?php echo $num; ?> class="fixed-space"><?php echo $content; ?></h<?php echo $num; ?>>
  <?php
    } else if ( '' == $t ) { ?>
    <h<?php echo $num; ?>><?php echo $content; ?></h<?php echo $num; ?>>
  <?php
    } else { ?>
    <h<?php echo $num; ?> style="margin-top:<?php echo $t; ?>px"><?php echo $content; ?></h<?php echo $num; ?>>
  <?php
    }
    return ob_get_clean();
  }
  add_shortcode( 'フッターh2', 'ta_footer_headline2_disp_no_shortcode' );
  add_shortcode( 'footer-h2', 'ta_footer_headline2_disp_no_shortcode' );
  
  //h3
  function ta_footer_headline3_disp_no_shortcode( $atts, $content = "" ){
    extract( shortcode_atts( array( 't' => '' ), $atts ) );
    $num = '3';
    ob_start();
    if ( 'fix' == $t ) { ?>
    <h<?php echo $num; ?> class="fixed-space"><?php echo $content; ?></h<?php echo $num; ?>>
  <?php
    } else if ( '' == $t ) { ?>
    <h<?php echo $num; ?>><?php echo $content; ?></h<?php echo $num; ?>>
  <?php
    } else { ?>
    <h<?php echo $num; ?> style="margin-top:<?php echo $t; ?>px"><?php echo $content; ?></h<?php echo $num; ?>>
  <?php
    }
    return ob_get_clean();
  }
  add_shortcode( 'フッターh3', 'ta_footer_headline3_disp_no_shortcode' );
  add_shortcode( 'footer-h3', 'ta_footer_headline3_disp_no_shortcode' );
  
  //h4
  function ta_footer_headline4_disp_no_shortcode( $atts, $content = "" ){
    extract( shortcode_atts( array( 't' => '' ), $atts ) );
    $num = '4';
    ob_start();
    if ( 'fix' == $t ) { ?>
    <h<?php echo $num; ?> class="fixed-space"><?php echo $content; ?></h<?php echo $num; ?>>
  <?php
    } else if ( '' == $t ) { ?>
    <h<?php echo $num; ?>><?php echo $content; ?></h<?php echo $num; ?>>
  <?php
    } else { ?>
    <h<?php echo $num; ?> style="margin-top:<?php echo $t; ?>px"><?php echo $content; ?></h<?php echo $num; ?>>
  <?php
    }
    return ob_get_clean();
  }
  add_shortcode( 'フッターh4', 'ta_footer_headline4_disp_no_shortcode' );
  add_shortcode( 'footer-h4', 'ta_footer_headline4_disp_no_shortcode' );
  
  //h5
  function ta_footer_headline5_disp_no_shortcode( $atts, $content = "" ){
    extract( shortcode_atts( array( 't' => '' ), $atts ) );
    $num = '5';
    ob_start();
    if ( 'fix' == $t ) { ?>
    <h<?php echo $num; ?> class="fixed-space"><?php echo $content; ?></h<?php echo $num; ?>>
  <?php
    } else if ( '' == $t ) { ?>
    <h<?php echo $num; ?>><?php echo $content; ?></h<?php echo $num; ?>>
  <?php
    } else { ?>
    <h<?php echo $num; ?> style="margin-top:<?php echo $t; ?>px"><?php echo $content; ?></h<?php echo $num; ?>>
  <?php
    }
    return ob_get_clean();
  }
  add_shortcode( 'フッターh5', 'ta_footer_headline5_disp_no_shortcode' );
  add_shortcode( 'footer-h5', 'ta_footer_headline5_disp_no_shortcode' );
  
  
  /********* メイン装飾に関するショートコード関数 *********/
  //装飾1
  function ta_main_deco1_disp_no_shortcode( $atts, $content = "" ){
    extract( shortcode_atts( array( 't' => '' ), $atts ) );
    ob_start();
    if ( 'fix' == $t ) { ?>
    <h6 class="fixed-space"><?php echo $content; ?></h6>
  <?php
    } else if ( '' == $t ) { ?>
    <h6><?php echo $content; ?></h6>
  <?php
    } else { ?>
    <h6 style="margin-top:<?php echo $t; ?>px"><?php echo $content; ?></h6>
  <?php
    }
    return ob_get_clean();
  }
  add_shortcode( 'メイン装飾1', 'ta_main_deco1_disp_no_shortcode' );
  add_shortcode( 'main-deco1', 'ta_main_deco1_disp_no_shortcode' );
  
  //装飾2
  function ta_main_deco2_disp_no_shortcode( $atts, $content = "" ){
    extract( shortcode_atts( array( 't' => '' ), $atts ) );
    ob_start();
    if ( 'fix' == $t ) { ?>
    <h6 class="fixed-space"><?php echo $content; ?></h6>
  <?php
    } else if ( '' == $t ) { ?>
    <h6><?php echo $content; ?></h6>
  <?php
    } else { ?>
    <h6 style="margin-top:<?php echo $t; ?>px"><?php echo $content; ?></h6>
  <?php
    }
    return ob_get_clean();
  }
  add_shortcode( 'メイン装飾2', 'ta_main_deco2_disp_no_shortcode' );
  add_shortcode( 'main-deco2', 'ta_main_deco2_disp_no_shortcode' );
  
  //装飾3
  function ta_main_deco3_disp_no_shortcode( $atts, $content = "" ){
    extract( shortcode_atts( array( 't' => '' ), $atts ) );
    ob_start();
    if ( 'fix' == $t ) { ?>
    <h6 class="fixed-space"><?php echo $content; ?></h6>
  <?php
    } else if ( '' == $t ) { ?>
    <h6><?php echo $content; ?></h6>
  <?php
    } else { ?>
    <h6 style="margin-top:<?php echo $t; ?>px"><?php echo $content; ?></h6>
  <?php
    }
    return ob_get_clean();
  }
  add_shortcode( 'メイン装飾3', 'ta_main_deco3_disp_no_shortcode' );
  add_shortcode( 'main-deco3', 'ta_main_deco3_disp_no_shortcode' );
  
  //装飾4
  function ta_main_deco4_disp_no_shortcode( $atts, $content = "" ){
    extract( shortcode_atts( array( 't' => '' ), $atts ) );
    ob_start();
    if ( 'fix' == $t ) { ?>
    <h6 class="fixed-space"><?php echo $content; ?></h6>
  <?php
    } else if ( '' == $t ) { ?>
    <h6><?php echo $content; ?></h6>
  <?php
    } else { ?>
    <h6 style="margin-top:<?php echo $t; ?>px"><?php echo $content; ?></h6>
  <?php
    }
    return ob_get_clean();
  }
  add_shortcode( 'メイン装飾4', 'ta_main_deco4_disp_no_shortcode' );
  add_shortcode( 'main-deco4', 'ta_main_deco4_disp_no_shortcode' );
  
  
  /********* サイド装飾に関するショートコード関数 *********/
  //装飾1
  function ta_side_deco1_disp_no_shortcode( $atts, $content = "" ){
    extract( shortcode_atts( array( 't' => '' ), $atts ) );
    ob_start();
    if ( 'fix' == $t ) { ?>
    <h6 class="fixed-space"><?php echo $content; ?></h6>
  <?php
    } else if ( '' == $t ) { ?>
    <h6><?php echo $content; ?></h6>
  <?php
    } else { ?>
    <h6 style="margin-top:<?php echo $t; ?>px"><?php echo $content; ?></h6>
  <?php
    }
    return ob_get_clean();
  }
  add_shortcode( 'サイド装飾1', 'ta_side_deco1_disp_no_shortcode' );
  add_shortcode( 'side-deco1', 'ta_side_deco1_disp_no_shortcode' );
  
  //装飾2
  function ta_side_deco2_disp_no_shortcode( $atts, $content = "" ){
    extract( shortcode_atts( array( 't' => '' ), $atts ) );
    ob_start();
    if ( 'fix' == $t ) { ?>
    <h6 class="fixed-space"><?php echo $content; ?></h6>
  <?php
    } else if ( '' == $t ) { ?>
    <h6><?php echo $content; ?></h6>
  <?php
    } else { ?>
    <h6 style="margin-top:<?php echo $t; ?>px"><?php echo $content; ?></h6>
  <?php
    }
    return ob_get_clean();
  }
  add_shortcode( 'サイド装飾2', 'ta_side_deco2_disp_no_shortcode' );
  add_shortcode( 'side-deco2', 'ta_side_deco2_disp_no_shortcode' );
  
  //装飾3
  function ta_side_deco3_disp_no_shortcode( $atts, $content = "" ){
    extract( shortcode_atts( array( 't' => '' ), $atts ) );
    ob_start();
    if ( 'fix' == $t ) { ?>
    <h6 class="fixed-space"><?php echo $content; ?></h6>
  <?php
    } else if ( '' == $t ) { ?>
    <h6><?php echo $content; ?></h6>
  <?php
    } else { ?>
    <h6 style="margin-top:<?php echo $t; ?>px"><?php echo $content; ?></h6>
  <?php
    }
    return ob_get_clean();
  }
  add_shortcode( 'サイド装飾3', 'ta_side_deco3_disp_no_shortcode' );
  add_shortcode( 'side-deco3', 'ta_side_deco3_disp_no_shortcode' );
  
  //装飾4
  function ta_side_deco4_disp_no_shortcode( $atts, $content = "" ){
    extract( shortcode_atts( array( 't' => '' ), $atts ) );
    ob_start();
    if ( 'fix' == $t ) { ?>
    <h6 class="fixed-space"><?php echo $content; ?></h6>
  <?php
    } else if ( '' == $t ) { ?>
    <h6><?php echo $content; ?></h6>
  <?php
    } else { ?>
    <h6 style="margin-top:<?php echo $t; ?>px"><?php echo $content; ?></h6>
  <?php
    }
    return ob_get_clean();
  }
  add_shortcode( 'サイド装飾4', 'ta_side_deco4_disp_no_shortcode' );
  add_shortcode( 'side-deco4', 'ta_side_deco4_disp_no_shortcode' );
}