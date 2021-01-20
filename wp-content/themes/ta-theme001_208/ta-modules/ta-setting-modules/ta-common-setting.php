<?php
/***************************************************************************************************************/
/*
/* テックエイドの成長する自作ホームページWordPressテーマ『 TAテーマ001 (ta-theme001) 』
/*
/* ta-common-setting.php: ( Latest Version 2.07 2017.04.12 )
/*
/* このプログラムの著作権、使用権、その他全ての権利はde集まれ株式会社に属します。
/* The copyright, royalty and all the other rights of this program belong to deatsumare Corporation.
/*
/* File Version 履歴
/* File Version 2.00 2016.03.05: first edition by Kotaro Kashiwamura.
/* File Version 2.01 2016.03.14: フリーPHP削除
/*                               SNSボタンオンオフ機能追加 by Kotaro Kashiwamura.
/* File Version 2.02 2016.05.08: PHPバージョン（5.2以降）記述追加 by Kotaro Kashiwamura.
/* File Version 2.03 2016.06.20: 無効フレームサイズの強調、PROの削除 by Kotaro Kashiwamura.
/* File Version 2.04 2016.08.29: ta_common_font_p_lineheight追加
/*                               SEOツールの出力オンオフ追加
/*                               共通パラグラフ設定に左右マージン追加、h1共通表記修正、
/*                               標準フォントにhover下線表示追加 by Kotaro Kashiwamura.
/* File Version 2.05 2016.09.16: SEO設定の集中管理画面追加 by Kotaro Kashiwamura.
/* File Version 2.06 2017.03.11: 体裁調整、ta_sitemap_general_setting追加、ajax化 by Kotaro Kashiwamura.
/* File Version 2.07 2017.04.12: アイキャッチ画像のサイズの共通設定注釈追加、管理画面アクセス制限注釈追加、
/*                               ta_common_body_wrap_marginbottom_select追加 by Kotaro Kashiwamura.
/*
/***************************************************************************************************************/
if ( TA_HIEND_PI ) { require_once( TA_HIEND_PI_DIR . '/setting-modules/ta-theme001-highend-common-setting.php' ); } ?>
<div id="ta-setting-form">
  <!-- タイトルとタブ -->
  <div id="ta-menu-group">
    <div id="ta-menu-title-container">
      <h2 id="ta-menu-title">TAテーマ001・共通設定メニュー</h2>
      <?php ta_ver_display(); ?>
    </div>
    <a id="ta-menu-talink-anc" href="http://theme001.tec-aid.com/" target="_blank"><div id="ta-menu-talink"></div></a>
  </div>
<?php
ta_development_disp();
ta_setting_scroll();
ta_setting_message_disp();
$ta_tabs = array( 'frame' => '基本設定', 'basic' => 'カラー・フォント', 'background' => 'body背景色・画像', 'bgbar' => 'body背景バー', 'contents' => '各種ページデザイン', 'limit' => '各種ページ閲覧制限', 'seosmo' => 'SEO・SMO', 'sitemap' => 'サイトマップ', 'freecssjsphp' => 'フリーCSS・JS', 'etc' => 'その他', 'system' => '使用システム情報', );
$ta_tabs = apply_filters( 'ta_common_settting_page_tab', $ta_tabs );  //フィルターフック'ta_common_settting_page_tab'を設置
$valid_tab = ta_tab_lists( $ta_tabs );  //タブの設置と有効タブの検出 ?>
  
  
  <?php if ( 'frame' == $valid_tab ) { ?>
  <!-- 基本設定 -->
  <div class="table" id="ta-common-tab-frame">
    <?php ta_setting_form_start( 'common', 'frame' ); ?>
    <table class="ta-setting-table">
      <!-- デモ表示 -->
      <tr>
        <th id="ta_theme_demo_title" class="big-title"><a href="JavaScript:void(0);">デモ表示</a><?php ta_man2_gd( 'common/frame#demo' ); ?><br><span id="ta_theme_demo_title_span" style="color:#ff7f00;">（デモ表示中です）</span></th>
        <?php $css_value = ( 'valid' == ta_read_op( 'ta_theme_demo' ) ) ? 'block': 'none'; ?>
        <style> #ta_theme_demo_title_span { display: <?php echo $css_value; ?>; } </style>
        <td>
          <span class="fixed-space"></span>
          <div id="ta_theme_demo_disp" class="init-nodisp">
            <?php ta_alternative_input_checkbox( 'ta_theme_demo', '表示する' ); ?>
          </div><!-- end of #ta_theme_demo_disp -->
        </td>
      </tr>
      <!-- 共通フレームタイプ -->
      <tr>
        <th id="ta_common_frame_type_title" class="big-title"><a href="JavaScript:void(0);">共通フレームタイプ</a><?php ta_man2_gd( 'common/frame#frame_type' ); ?></th>
        <td>
          <div id="ta_common_frame_type_disp" class="init-nodisp">
            <span class="fixed-space"></span>
            <?php ta_frametype_selection_process( 'ta_common_frame_type', 'common_setting' ); ?>
            <span class="fixed-space"></span>
          </div><!-- end of #ta_common_frame_type_disp -->
        </td>
      </tr>
      <!-- 共通フレームタイプ確認 -->
      <tr>
<?php
$ta_common_frame_size_check_onoff = ta_read_op( 'ta_common_frame_size_check_onoff' ); ?>
        <th id="ta_common_frame_size_check_title" class="big-title"><a href="JavaScript:void(0);">共通フレームタイプ確認</a><?php ta_man2_gd( 'common/frame#frame_check' ); ?><br><span id="ta_common_frame_size_check_title_span" style="color:#ff7f00;">（確認モード中です）</span></th>
        <?php $css_value = ( 'valid' == $ta_common_frame_size_check_onoff ) ? 'block': 'none'; ?>
        <style> #ta_common_frame_size_check_title_span { display: <?php echo $css_value; ?>; } </style>
        <td>
          <div id="ta_common_frame_size_check_disp" class="init-nodisp">
            <span class="fixed-space"></span>
            <?php ta_alternative_input_checkbox( 'ta_common_frame_size_check_onoff', '確認モードにする' ); ?>
          </div><!-- end of #ta_common_frame_size_check_disp -->
        </td>
      </tr>
      <!-- フレームサイズ -->
      <tr>
        <th id="ta_common_frame_width_title" class="class-big-title"><a href="JavaScript:void(0);">フレームサイズ</a><?php ta_man2_gd( 'common/frame#frame_size' ); ?></th>
        <td>
          <div class="ta_common_frame_width_disp init-nodisp">
            <div id="ta_common_frame_err_frm_over" style="display:none;">
              <div class="error">
                <ul>
                  <li><span class="ta-err-message">フレームサイズエラー:</span>設定幅の合計値が100%を超えています。（このエラーメッセージは5秒後に消えます）</li>
                </ul>
              </div>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
            </div>
            <div id="ta_common_frame_err_frm_det" style="display:none;">
              <div class="error">
                <ul>
                  <li><span class="ta-err-message">フレームサイズエラー:</span>予期しないエラーです。サーバー管理者にご相談ください。（このエラーメッセージは5秒後に消えます）</li>
                </ul>
              </div>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
            </div>
<?php
$ta_common_frame_type = ta_read_op( 'ta_common_frame_type' );
$ta_common_frame_width = ta_read_op( 'ta_common_frame_width' );
$ta_common_side2wrap_onoff = ta_read_op( 'ta_common_side2wrap_onoff' );
if ( TA_HIEND_PI ) { ?>
            <h4 class="ta_common_frame_width_cover">ホームページフレームの幅</h4>
            <span class="ta_common_frame_width_cover"><?php ta_simple_input( 'ta_common_frame_width', 'ピクセル', 'short_box' ); ?></span>
<?php
} else { ?>
            <h4>ホームページフレームの幅</h4>
            <?php ta_simple_input( 'ta_common_frame_width', 'ピクセル', 'short_box' ); ?>
<?php
}
if ( 'valid' == $ta_common_side2wrap_onoff ) { ?>
            <style type="text/css">
              #ta_common_frame_width,
              .ta_common_frame_width_cover {
                color: #bbbbbb!important;
              }
            </style>
<?php
} ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>#WRAPの幅</h4>
            <?php ta_simple_input( 'ta_common_wrap_add_width', 'ピクセル', 'short_box' ); ?>
            <p>※ スマートフォンやタブレット等のレスポンシブを使用しない場合の余白になります
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>メインコンテンツの幅はフレームタイプに従って自動計算されます</h4>
            <span class="fixed-space"></span>
            <?php $ta_top_main_width = ta_read_op( 'ta_top_main_width' ); ?>
            <?php //echo '( 参考トップページ：' . floor( $ta_common_frame_width * $ta_top_main_width / 100 ) . ' ピクセル )'; ?>
            <hr class="fixed-border">
            <table class="ta-2contents-table">
              <tr>
                <td>
<?php
if ( 'sidebarsub_main_sidebar' != $ta_common_frame_type ) { ?>
                  <h4 style="color:#bbbbbb;">サブサイドバーの幅</h4>
                  <style type="text/css">
                    #ta_common_sidebarsub_width,
                    .ta_common_sidebarsub_width_cover {
                      color: #bbbbbb;
                    }
                  </style>
<?php
} else { ?>
                  <h4>サブサイドバーの幅</h4>
<?php
} ?>
                  <span class="ta_common_sidebarsub_width_cover"><?php ta_simple_input( 'ta_common_sidebarsub_width', '％', 'short_box' ); ?></span>
<?php
$ta_common_sidebarsub_width = ta_read_op( 'ta_common_sidebarsub_width' );
if ( ! TA_HIEND_PI || 'valid' != $ta_common_side2wrap_onoff ) { ?>
                  <span class="ta_common_sidebarsub_width_cover cal_width"><?php echo '( ' . floor( $ta_common_frame_width * $ta_common_sidebarsub_width / 100 ) . ' ピクセル )'; ?></span>
<?php
} else { ?>
                  <span class="fixed-space"></span>
<?php
} ?>
                </td>
                <td>
<?php
if ( 'main_only' == $ta_common_frame_type ) { ?>
                  <h4 style="color:#bbbbbb;">サイドバーの幅</h4>
                  <style type="text/css">
                    #ta_common_sidebar_width,
                    .ta_common_sidebar_width_cover {
                      color: #bbbbbb;
                    }
                  </style>
<?php
} else { ?>
                  <h4>サイドバーの幅</h4>
<?php
} ?>
                  <span class="ta_common_sidebar_width_cover"><?php ta_simple_input( 'ta_common_sidebar_width', '％', 'short_box' ); ?></span>
<?php
$ta_common_sidebar_width = ta_read_op( 'ta_common_sidebar_width' );
if ( ! TA_HIEND_PI || 'valid' != $ta_common_side2wrap_onoff ) { ?>
                  <span class="ta_common_sidebar_width_cover cal_width"><?php echo '( ' . floor( $ta_common_frame_width * $ta_common_sidebar_width / 100 ) . ' ピクセル )'; ?></span>
<?php
} else { ?>
                  <span class="fixed-space"></span>
<?php
} ?>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <table class="ta-2contents-table">
              <tr>
                <td>
<?php
if ( ! ( TA_HIEND_PI && 'valid' == $ta_common_side2wrap_onoff ) && ( 'main_only' == $ta_common_frame_type || 'main_sidebar' == $ta_common_frame_type ) ) { ?>
                  <h4 style="color:#bbbbbb;">メインコンテンツの左余白幅</h4>
                  <style type="text/css">
                    #ta_common_mainleft_margin,
                    .ta_common_mainleft_margin_cover {
                      color: #bbbbbb;
                    }
                  </style>
<?php
} else { ?>
                  <h4>メインコンテンツの左余白幅</h4>
<?php
} ?>
                  <span class="ta_common_mainleft_margin_cover"><?php ta_simple_input( 'ta_common_mainleft_margin', '％', 'short_box' ); ?></span>
<?php
$ta_common_mainleft_margin = ta_read_op( 'ta_common_mainleft_margin' );
if ( ! TA_HIEND_PI || 'valid' != $ta_common_side2wrap_onoff ) { ?>
                  <span class="ta_common_mainleft_margin_cover cal_width"><?php echo '( ' . floor( $ta_common_frame_width * $ta_common_mainleft_margin / 100 ) . ' ピクセル )'; ?></span>
<?php
} else { ?>
                  <span class="fixed-space"></span>
<?php
} ?>
                </td>
                <td>
<?php
if ( ! ( TA_HIEND_PI && 'valid' == $ta_common_side2wrap_onoff ) && ( 'main_only' == $ta_common_frame_type || 'sidebar_main' == $ta_common_frame_type ) ) { ?>
                  <h4 style="color:#bbbbbb;">メインコンテンツの右余白幅</h4>
                  <style type="text/css">
                    #ta_common_mainright_margin,
                    .ta_common_mainright_margin_cover {
                      color: #bbbbbb;
                    }
                  </style>
<?php
} else { ?>
                  <h4>メインコンテンツの右余白幅</h4>
<?php
} ?>
                  <span class="ta_common_mainright_margin_cover"><?php ta_simple_input( 'ta_common_mainright_margin', '％', 'short_box' ); ?></span>
<?php
$ta_common_mainright_margin = ta_read_op( 'ta_common_mainright_margin' );
if ( ! TA_HIEND_PI || 'valid' != $ta_common_side2wrap_onoff ) { ?>
                  <span class="ta_common_mainright_margin_cover cal_width"><?php echo '( ' . floor( $ta_common_frame_width * $ta_common_mainright_margin / 100 ) . ' ピクセル )'; ?></span>
<?php
} else { ?>
                  <span class="fixed-space"></span>
<?php
} ?>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
          </div><!-- end of .ta_common_frame_width_disp -->
        </td>
      </tr>
      <!-- コンテンツフレーム位置 -->
      <tr>
        <th id="ta_common_contents_frame_position_title" class="class-big-title"><a href="JavaScript:void(0);">コンテンツフレーム位置</a><?php ta_man2_gd( 'common/frame#frame_position' ); ?></th>
        <td>
          <div class="ta_common_contents_frame_position_disp init-nodisp">
            <h4>コンテンツフレームとヘッダー部コンテンツとの間隔</h4>
            <?php ta_simple_input( 'ta_common_container_paddingtop', 'ピクセル', 'short_box' ); ?>
            <p>※ コンテンツフレームとはメイン、サイドバー、サブサイドバーの総称です</p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4 style="margin-bottom:-0.5em;">コンテンツフレームとフッター部コンテンツとの間隔</h4>
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <h4>対象コンテンツフレーム</h4>
                  <?php $init_value = ta_read_op( 'ta_common_body_wrap_marginbottom_select' ); ?>
                  <p><input type="radio" name="ta_common_body_wrap_marginbottom_select" value="all" <?php if ( "all" == $init_value ) echo 'checked="checked"'; ?>> メインと（サブ）サイドバー</p>
                  <p><input type="radio" name="ta_common_body_wrap_marginbottom_select" value="main" <?php if ( "main" == $init_value ) echo 'checked="checked"'; ?>> メインのみ</p>
                </td>
                <td>
                  <h4>間隔</h4>
                  <?php ta_simple_input( 'ta_common_body_wrap_marginbottom', 'ピクセル', 'short_box' ); ?>
                </td>
              </tr>
            </table>
            <p>※ フッターがメイン枠にある場合は上部コンテンツとの間隔となります</p>
            <span class="fixed-space"></span>
          </div><!-- end of .ta_common_contents_frame_position_disp -->
        </td>
      </tr>
      <!-- ブラウザ全幅表示 -->
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_fullwidth_setting();
} else { ?>
      <tr>
        <th class="no-ta-thm001highend">ブラウザ全幅表示<?php ta_man2_gd( 'common/frame#fullwidth' ); ?></th>
        <td></td>
      </tr>
<?php
} ?>
    </table>
    <?php ta_setting_form_end( 'common', '共通『基本設定』設定更新', 'frame' ); ?>
  </div><!-- end of #ta-common-tab-frame -->
  <?php } ?>
  
  
  <?php if ( 'basic' == $valid_tab ) { ?>
  <!-- カラー・フォント -->
  <div class="table" id="ta-common-tab-basic">
    <?php ta_setting_form_start( 'common', 'basic' ); ?>
    <table class="ta-setting-table">
      <!-- サイトイメージカラー -->
      <tr>
        <th id="ta_common_site_image_color_title" class="big-title"><a href="JavaScript:void(0);">サイトイメージカラー</a><?php ta_man2_gd( 'common/colorfont#color' ); ?></th>
        <td>
          <div id="ta_common_site_image_color_disp" class="init-nodisp">
            <table class="ta-fullcontents-table">
              <tr>
                <td style="width:20em;">
                  <h4>背景色</h4>
                  <?php ta_color_picker_process( 'ta_common_site_bg_color' ); ?>
                  <p style="margin-top:-0.5em;">※ サイト全体の背景色（想定色）</p>
                </td>
                <td>
                  <h4>ハイライト色</h4>
                  <?php ta_color_picker_process( 'ta_common_site_hl_color' ); ?>
                  <p style="margin-top:-0.5em;">※ タイトル等の背景色（想定色）</p>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <table class="ta-fullcontents-table">
              <tr>
                <td style="width:20em;">
                  <h4>標準テキスト色</h4>
                  <?php ta_color_picker_process( 'ta_common_site_text_on_bg_color' ); ?>
                  <p style="margin-top:-0.5em;">※ 通常のテキスト色（想定色）</p>
                </td>
                <td>
                  <h4>ハイライト背景用テキスト色</h4>
                  <?php ta_color_picker_process( 'ta_common_site_text_on_hl_color' ); ?>
                  <p style="margin-top:-0.5em;">※ ハイライト色上のテキスト色（想定色）</p>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
          </div><!-- end of #ta_common_site_image_color_disp -->
        </td>
      </tr>
      <!-- 共通フォント -->
      <tr>
        <th id="ta_common_font_title" class="class-big-title"><a href="JavaScript:void(0);">共通フォント</a><?php ta_man2_gd( 'common/colorfont#font' ); ?></th>
        <td>
          <div class="ta_common_font_disp init-nodisp">
            <span class="fixed-space"></span>
<?php
$test_family = ta_read_op( 'ta_common_font_family' );
$test_size = ta_read_op( 'ta_common_font_size' );
$test_bg_color = ta_select_color_w_image_color( 'ta_common_top_outframe_color' );
if ( TA_HIEND_PI ) {
  $test_bg_grad_onoff = ta_read_op( 'ta_common_top_outframe_color_grad_onoff' );
} else {
  $test_bg_grad_onoff = "invalid";
}
/***** グラデーション関するスタイル */
function test_gradient_color_style() {
  $direct = ta_read_op( 'ta_common_top_outframe_color_grd_direct' );
  $start_color = ta_select_color_w_image_color( 'ta_common_top_outframe_color_grd_start_color' );
  $mid_onoff = ta_read_op( 'ta_common_top_outframe_color_grd_mid_color_onoff' );
  $mid_pos = ta_read_op( 'ta_common_top_outframe_color_grd_mid_color_pos' );
  if ( $mid_pos < 0 ) { $mid_pos = 0; } else if ( $mid_pos > 100 ) { $mid_pos = 100; }
  $mid_color = ta_select_color_w_image_color( 'ta_common_top_outframe_color_grd_mid_color' );
  if ( 'valid' == $mid_onoff ) { $mid_info = $mid_color . ' ' . $mid_pos . '%, '; } else { $mid_info = ''; }
  $stop_color = ta_select_color_w_image_color( 'ta_common_top_outframe_color_grd_stop_color' );
  switch ( $direct ) {
    case 'bottom':
      $new_direct = 'top';
      $direct_num = 0;
      $new_start_color = $start_color;
      $new_stop_color = $stop_color;
      break;
    case 'top':
      $new_direct = 'bottom';
      $direct_num = 0;
      $new_start_color = $stop_color;
      $new_stop_color = $start_color;
      break;
    case 'right':
      $new_direct = 'left';
      $direct_num = 1;
      $new_start_color = $start_color;
      $new_stop_color = $stop_color;
      break;
    case 'left':
      $new_direct = 'right';
      $direct_num = 1;
      $new_start_color = $stop_color;
      $new_stop_color = $start_color;
      break;
    default:
      $new_direct = 'top';
      $direct_num = 0;
      $new_start_color = $start_color;
      $new_stop_color = $stop_color;
  } ?>
  filter: progid:DXImageTransform.Microsoft.Gradient(GradientType=<?php echo $direct_num; ?>, StartColorStr='<?php echo $new_start_color; ?>', EndColorStr='<?php echo $new_stop_color; ?>');
  background: -ms-linear-gradient(<?php echo $new_direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%);
  background: -o-linear-gradient(<?php echo $new_direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%);
  background: -moz-linear-gradient(<?php echo $new_direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%);
  background: -webkit-linear-gradient(<?php echo $new_direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%);
  background: linear-gradient(to <?php echo $direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%);
<?php
}
$test_color = ta_select_color_w_image_color( 'ta_common_font_color' );
$test_anchor_color = ta_read_op( 'ta_common_font_anchor_color' );
$test_anchor_under = ( 'valid' == ta_read_op( 'ta_common_font_anchor_under' ) ) ? 'underline' : 'none';
$test_anchor_colorhover = ta_read_op( 'ta_common_font_anchor_colorhover' );
$test_anchor_underhover = ( 'valid' == ta_read_op( 'ta_common_font_anchor_underhover' ) ) ? 'underline' : 'none';
if ( 'none' == $test_family ) {
  echo '<p id="ta-testview-original" >現在の共通フォントです。背景はトップページの色です。（背景画は表示されません）<a href="JavaScript:void(0);">ここをクリック！</a>（Font familyは表示するブラウザーに依存します。0123456789-/%&$#_"!<>?abcdefg）</p>';
} else {
  echo '<p id="ta-testview-modified" >現在の共通フォントです。背景はトップページの色です。（背景画は表示されません）<a href="JavaScript:void(0);">ここをクリック！</a>（Font familyは表示するブラウザーに依存します。0123456789-/%&$#_"!<>?abcdefg）</p>';
} ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <style type="text/css">
            <!--
              #ta-testview-original {
                width: 95%;
                font-family: ヒラギノ角ゴ Pro W3, Hiragino Kaku Gothic Pro, メイリオ, Meiryo, Osaka, ＭＳ Ｐゴシック, MS PGothic, sans-serif;
                padding: 10px;
<?php
  if ( 'invalid' == $test_bg_grad_onoff ) { ?>
                background-color: <?php echo $test_bg_color; ?>;
<?php
  } else {
    test_gradient_color_style();
  } ?>
                color: <?php echo $test_color; ?>;
                font-size: <?php echo $test_size; ?>%;
              }
              #ta-testview-original a {
                color: <?php echo $test_anchor_color; ?>;
                text-decoration: <?php echo $test_anchor_under; ?>;
              }
              #ta-testview-original a:hover {
                color: <?php echo $test_anchor_colorhover; ?>;
                text-decoration: <?php echo $test_anchor_underhover; ?>;
              }
              #ta-testview-modified {
                width: 95%;
                font-family: <?php echo $test_family; ?>;
                padding: 10px;
<?php
  if ( 'invalid' == $test_bg_grad_onoff ) { ?>
                background-color: <?php echo $test_bg_color; ?>;
<?php
  } else {
    test_gradient_color_style();
  } ?>
                color: <?php echo $test_color; ?>;
                font-size: <?php echo $test_size; ?>%;
              }
              #ta-testview-modified a {
                color: <?php echo $test_anchor_color; ?>;
                text-decoration: <?php echo $test_anchor_under; ?>;
              }
              #ta-testview-modified a:hover {
                color: <?php echo $test_anchor_colorhover; ?>;
                text-decoration: <?php echo $test_anchor_underhover; ?>;
              }
            -->
            </style>
            <h4>フォントファミリー</h4>
            <?php $init_value = ta_read_op( 'ta_common_font_family' ); ?>
            <table class="ta-fullcontents-table">
              <tr>
                <td style="width:20em;">
                  <p><input type="radio" name="ta_common_font_family" value="none" <?php if ( "none" == $init_value ) echo 'checked="checked"'; ?>> 指定しない（オリジナル設定）</p>
                </td>
                <td>
                  <p><input type="radio" name="ta_common_font_family" value="cursive" <?php if ( "cursive" == $init_value ) echo 'checked="checked"'; ?>> 筆記体のフォント</p>
                </td>
              </tr>
              <tr>
                <td style="width:20em;">
                  <p><input type="radio" name="ta_common_font_family" value="sans_serif" <?php if ( "sans_serif" == $init_value ) echo 'checked="checked"' ?>> 飾りが無いフォント（ゴシックなど）</p>
                </td>
                <td>
                  <p><input type="radio" name="ta_common_font_family" value="fantasy" <?php if ( "fantasy" == $init_value ) echo 'checked="checked"'; ?>> 装飾的なフォント</p>
                </td>
              </tr>
              <tr>
                <td style="width:20em;">
                  <p><input type="radio" name="ta_common_font_family" value="serif" <?php if ( "serif" == $init_value ) echo 'checked="checked"'; ?>> 飾り付きのフォント（明朝など）</p>
                </td>
                <td>
                  <p><input type="radio" name="ta_common_font_family" value="monospace" <?php if ( "monospace" == $init_value ) echo 'checked="checked"'; ?>> 等幅のフォント</p>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <h4>テキストの共通サイズ</h4>
                  <?php ta_simple_input( 'ta_common_font_size', '％', 'short_box' ); ?>
                </td>
                <td>
                  <h4>テキストの共通色</h4>
                  <?php ta_color_picker_no_tomei_process( 'ta_common_font_color', 'valid', 'valid', 'invalid' ); ?>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <h4>リンク付テキスト共通色</h4>
                  <?php ta_color_picker_no_tomei_process( 'ta_common_font_anchor_color' ); ?>
                </td>
                <td>
                  <h4>リンク付テキスト下線</h4>
                  <?php ta_alternative_input_checkbox( 'ta_common_font_anchor_under', '表示する' ); ?>
               </td>
              </tr>
            </table>
            <hr class="fixed-border">
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <h4>HOVER時の<br>リンク付テキスト共通色</h4>
                  <?php ta_color_picker_no_tomei_process( 'ta_common_font_anchor_colorhover' ); ?>
                </td>
                <td>
                  <h4>HOVER時の<br>リンク付テキスト下線</h4>
                  <?php ta_alternative_input_checkbox( 'ta_common_font_anchor_underhover', '表示する' ); ?>
                </td>
              </tr>
            </table>
          </div><!-- end of .ta_common_font_disp -->
        </td>
      </tr>
      <!-- 共通パラグラフ -->
      <tr>
        <th id="ta_common_paragraph_design_title" class="big-title"><a href="JavaScript:void(0);">共通パラグラフ</a><?php ta_man2_gd( 'common/colorfont#paragraph_aimg' ); ?></th>
        <td>
          <div id="ta_common_paragraph_design_disp" class="init-nodisp">
            <span class="fixed-space"></span>
            <?php ta_paragraph_setting( 'ta_common_font', '共通', 'common' ); ?>
          </div><!-- end of #ta_common_paragraph_design_disp -->
        </td>
      </tr>
      <!-- 共通リンク付き画像デザイン -->
      <tr>
        <th id="ta_common_aimg_design_title" class="big-title"><a href="JavaScript:void(0);">共通リンク付画像デザイン</a><?php ta_man2_gd( 'common/colorfont#paragraph_aimg' ); ?></th>
        <td>
          <div id="ta_common_aimg_design_disp" class="init-nodisp">
            <table class="ta-fullcontents-table">
              <tr>
                <td style="width:20em;">
                  <h4>共通リンク付画像の透明度</h4>
                  <?php ta_simple_input( 'ta_common_font_aimg_opacity', '', 'short_box' ); ?>
                  <p>※ 0.0：透明 ～ 1.0：非透明</p>
                </td>
                <td>
                  <h4>HOVER時の共通リンク付画像の透明度</h4>
                  <?php ta_simple_input( 'ta_common_font_aimg_opacityhover', '', 'short_box' ); ?>
                  <p>※ 0.0：透明 ～ 1.0：非透明</p>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
          </div><!-- end of #ta_common_aimg_design_disp -->
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'common', '共通『カラー・フォント』設定更新', 'basic' ); ?>
  </div><!-- end of #ta-common-tab-basic -->
  <?php } ?>
  
  
  <?php if ( 'background' == $valid_tab ) { ?>
  <!-- 背景色・背景画像 -->
  <div class="table" id="ta-common-tab-background">
    <?php ta_setting_form_start( 'common', 'background' ); ?>
    <table class="ta-setting-table">
      <!-- トップページのbody背景色・画像 -->
      <?php ta_common_bodywrap_setting( 'ta_common_top_outframe', 'トップページ', 'valid' ); ?>
      <!-- トップページ以外のbody背景色・画像 -->
      <?php ta_common_bodywrap_setting( 'ta_common_outframe', 'トップページ以外', 'valid' ); ?>
    </table>
    <?php ta_setting_form_end( 'common', '共通『body背景色・画像』設定更新', 'background' ); ?>
  </div><!-- end of #ta-common-tab-background -->
  <?php } ?>
  
  
  <?php if ( 'bgbar' == $valid_tab ) { ?>
  <!-- body背景バー -->
  <div class="table" id="ta-common-tab-bgbar">
    <?php ta_setting_form_start( 'common', 'bgbar' ); ?>
    <table class="ta-setting-table">
      <!-- トップページのbody背景バー -->
      <?php ta_common_bodybar_setting( 'ta_common_top_outframe', 'トップページ', 'valid' ); ?>
      <!-- トップページ以外のbody背景バー -->
      <?php ta_common_bodybar_setting( 'ta_common_outframe', 'トップページ以外', 'valid' ); ?>
    </table>
    <?php ta_setting_form_end( 'common', '共通『body背景バー』設定更新', 'bgbar' ); ?>
  </div><!-- end of #ta-common-tab-bgbar -->
  <?php } ?>
  
  
  <?php if ( 'contents' == $valid_tab ) { ?>
  <!-- 各種ページデザイン -->
  <div class="table" id="ta-common-tab-contents">
    <?php ta_setting_form_start( 'common', 'contents' ); ?>
    <table class="ta-setting-table">
      <tr>
        <!-- 固定ページ共通設定（トップページは除く）-->
        <th id="ta_common_fixedpage_title" class="big-title"><a href="JavaScript:void(0);">固定ページ<br>デザイン共通設定</a><?php ta_man2_gd( 'common/contents#page' ); ?><br>（トップページは除く）</th>
        <td>
          <div id="ta_common_fixedpage_disp" class="init-nodisp">
            <!-- 通常表示 -->
            <?php ta_parts_select_checkboxes( 'ta_common_page_custom' ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <!-- 詳細設定 -->
            <h4 id="ta_common_fixedpage_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
            <div id="ta_common_fixedpage_pro_disp" class="pro-disp init-nodisp">
              <h4>固定ページh1表記方法</h4>
              <?php $init_value = ta_read_op( 'ta_common_page_h1_disp' ); ?>
              <p><input type="radio" name="ta_common_page_h1_disp" value="page_h1" <?php if ( "page_h1" == $init_value ) echo 'checked="checked"' ?>> 各固定ページh1表記のみ</p>
              <p><input type="radio" name="ta_common_page_h1_disp" value="page_h1_common_add" <?php if ( "page_h1_common_add" == $init_value ) echo 'checked="checked"' ?>> 各固定ページh1表記 ＋ h1共通追加記述</p>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>タイトル上のアイキャッチ画像の共通設定</h3>
              <?php ta_alternative_input_checkbox( 'ta_common_page_eyecatch_onoff', '表示する' ); ?>
              <p>※ タイトルの上の画像は4：1の横長切り抜き画像になります</p>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <?php ta_main_top_margin_common_setting( 'ta_common_page' ); ?>
              <span class="fixed-space"></span>
            </div><!-- end of #ta_common_fixedpage_pro_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_common_fixedpage_disp -->
        </td>
      </tr>
      <!-- 投稿記事ページ共通設定 -->
      <tr>
        <th id="ta_common_postpage_title" class="big-title"><a href="JavaScript:void(0);">投稿記事ページ<br>デザイン共通設定</a><?php ta_man2_gd( 'common/contents#post' ); ?></th>
        <td>
          <div id="ta_common_postpage_disp" class="init-nodisp">
            <!-- 通常表示 -->
            <?php ta_parts_select_checkboxes( 'ta_common_post_custom' ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
             <!-- 詳細設定 -->
            <h4 id="ta_common_postpage_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
            <div id="ta_common_postpage_pro_disp" class="pro-disp init-nodisp">
              <h4>投稿記事ページh1表記方法</h4>
              <?php $init_value = ta_read_op( 'ta_common_post_h1_disp' ); ?>
              <p><input type="radio" name="ta_common_post_h1_disp" value="post_h1" <?php if ( "post_h1" == $init_value ) echo 'checked="checked"' ?>> 各投稿記事ページh1表記のみ</p>
              <p><input type="radio" name="ta_common_post_h1_disp" value="post_h1_common_add" <?php if ( "post_h1_common_add" == $init_value ) echo 'checked="checked"' ?>> 各投稿記事ページh1表記 ＋ h1共通追加記述</p>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>アイキャッチ画像のサイズの共通設定</h3>
              <?php $ta_common_post_eyecatch_size = ta_read_op( 'ta_common_post_eyecatch_size' ); ?>
              <p><input type="radio" name="ta_common_post_eyecatch_size" value="thumbnail" <?php if ( "thumbnail" == $ta_common_post_eyecatch_size ) echo 'checked="checked"' ?>> サムネイル</p>
              <p><input type="radio" name="ta_common_post_eyecatch_size" value="medium" <?php if ( "medium" == $ta_common_post_eyecatch_size ) echo 'checked="checked"' ?>> 中サイズ</p>
              <p><input type="radio" name="ta_common_post_eyecatch_size" value="large" <?php if ( "large" == $ta_common_post_eyecatch_size ) echo 'checked="checked"' ?>> 大サイズ</p>
              <p>※ サイズの（幅、高さ）数値はWordPress設定『メディア』⇒『画像サイズ』で設定します</p>
              <p>※ サイズ設定に関わらず投稿枠の最大幅で制限されます</p>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>アイキャッチ画像の位置の共通設定</h3>
              <?php $ta_common_post_eyecatch_position = ta_read_op( 'ta_common_post_eyecatch_position' ); ?>
              <p><input type="radio" name="ta_common_post_eyecatch_position" value="top" <?php if ( "top" == $ta_common_post_eyecatch_position ) echo 'checked="checked"' ?>> タイトルの上</p>
              <p><input type="radio" name="ta_common_post_eyecatch_position" value="left" <?php if ( "left" == $ta_common_post_eyecatch_position ) echo 'checked="checked"' ?>> 記事の左上</p>
              <p><input type="radio" name="ta_common_post_eyecatch_position" value="center" <?php if ( "center" == $ta_common_post_eyecatch_position ) echo 'checked="checked"' ?>> 記事の中央上（文字の回り込み無し）</p>
              <p><input type="radio" name="ta_common_post_eyecatch_position" value="right" <?php if ( "right" == $ta_common_post_eyecatch_position ) echo 'checked="checked"' ?>> 記事の右上</p>
              <p>※ タイトルの上の画像は4：1の横長切り抜き画像になります</p>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <?php ta_main_top_margin_common_setting( 'ta_common_post' ); ?>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>日時カテゴリー欄の位置</h4>
              <?php $init = ta_read_op( 'ta_common_post_title_timecat' ); ?>
              <p><input type="radio" name="ta_common_post_title_timecat" value="upper" <?php if ( "upper" == $init ) echo 'checked="checked"'; ?>> 記事タイトル欄の上</p>
              <p><input type="radio" name="ta_common_post_title_timecat" value="lower" <?php if ( "lower" == $init ) echo 'checked="checked"'; ?>> 記事タイトル欄の下</p>
              <p><input type="radio" name="ta_common_post_title_timecat" value="none" <?php if ( "none" == $init ) echo 'checked="checked"'; ?>> 未使用</p>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-3contents-table">
                <tr>
                  <td>
                    <h4>日時カテゴリー欄</h4>
                    <?php $init = ta_read_op( 'ta_common_post_timecat' ); ?>
                    <p><input type="radio" name="ta_common_post_timecat" value="time-cat" <?php if ( "time-cat" == $init ) echo 'checked="checked"'; ?>> 左：日時、右：カテゴリー</p>
                    <p><input type="radio" name="ta_common_post_timecat" value="cat-time" <?php if ( "cat-time" == $init ) echo 'checked="checked"'; ?>> 左：カテゴリー、右：日時</p>
                  </td>
                  <td>
                    <h4>日時</h4>
                    <?php ta_alternative_input_checkbox( 'ta_common_post_time_onoff', '表示する' ); ?>
                  </td>
                  <td>
                    <h4>カテゴリー</h4>
                    <?php ta_alternative_input_checkbox( 'ta_common_post_cat_onoff', '表示する' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-3contents-table">
                <tr>
                  <td>
                    <h4>日時文字の色</h4>
                    <?php ta_color_picker_no_tomei_process( 'ta_common_post_time_color', 'valid' ); ?>
                  </td>
                  <td>
                    <h4>日時文字のサイズ</h4>
                    <?php ta_simple_input( 'ta_common_post_time_size', '％', 'short_box' ); ?>
                  </td>
                  <td>
                    <h4>日時文字の太さ</h4>
                    <?php ta_fontweight_selection( 'ta_common_post_time_weight' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>日時文字の時計マーク <span class="dashicons dashicons-clock"></span></h4>
              <?php ta_alternative_input_checkbox( 'ta_common_post_watchmark_onoff', '表示する' ); ?>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>カテゴリー文字のサイズ</h4>
                    <?php ta_simple_input( 'ta_common_post_cat_size', '％', 'short_box' ); ?>
                  </td>
                  <td>
                    <h4>カテゴリー文字の太さ</h4>
                    <?php ta_fontweight_selection( 'ta_common_post_cat_weight' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-3contents-table">
                <tr>
                  <td>
                    <h4>カテゴリー表示の高さ</h4>
                    <?php ta_simple_input( 'ta_common_post_cat_height', 'em', 'short_box' ); ?>
                  </td>
                  <td>
                    <h4>カテゴリー表示の最小幅</h4>
                    <?php ta_simple_input( 'ta_common_post_cat_width', 'em', 'short_box' ); ?>
                  </td>
                  <td>
                    <h4>カテゴリー表示の角の丸み</h4>
                    <?php ta_simple_input( 'ta_common_post_cat_round', 'ピクセル', 'short_box' ); ?>
                    <p>※ 丸み無しは0を入力してください</p>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
            </div><!-- end of #ta_common_postpage_pro_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_common_postpage_disp -->
        </td>
      </tr>
      <tr>
      <!-- 一覧（アーカイブ）-->
        <th id="ta_common_listpage_title" class="big-title"><a href="JavaScript:void(0);">一覧（アーカイブ）<br>デザイン共通設定</a><?php ta_man2_gd( 'common/contents#list' ); ?></th>
        <td>
          <div id="ta_common_listpage_disp" class="init-nodisp">
            <!-- 通常表示 -->
            <?php ta_parts_select_checkboxes( 'ta_common_listpage' ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <!-- 詳細設定 -->
            <h4 id="ta_common_listpage_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
            <div id="ta_common_listpage_pro_disp" class="pro-disp init-nodisp">
              <h4>一覧（アーカイブ）h1表記方法</h4>
              <?php $init_value = ta_read_op( 'ta_common_listpage_h1_disp' ); ?>
              <p><input type="radio" name="ta_common_listpage_h1_disp" value="listpage_h1" <?php if ( "listpage_h1" == $init_value ) echo 'checked="checked"' ?>> h1共通表記のみ</p>
              <p><input type="radio" name="ta_common_listpage_h1_disp" value="listpage_h1_common_add" <?php if ( "listpage_h1_common_add" == $init_value ) echo 'checked="checked"' ?>> h1共通表記 ＋ h1共通追加記述</p>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>一覧ページのインデックス・フォロー処理</h4>
              <?php $init_value = ta_read_op( 'ta_common_listpage_indexfollow' ); ?>
              <p><input type="radio" name="ta_common_listpage_indexfollow" value="none" <?php if ( "none" == $init_value ) echo 'checked="checked"' ?>> 対象にする</p>
              <p><input type="radio" name="ta_common_listpage_indexfollow" value="noindex,follow" <?php if ( "noindex,follow" == $init_value ) echo 'checked="checked"' ?>> 対象にしない（noindex, follow: 推奨）</p>
              <p><input type="radio" name="ta_common_listpage_indexfollow" value="noindex,nofollow" <?php if ( "noindex,nofollow" == $init_value ) echo 'checked="checked"' ?>> 対象にしない（noindex, nofollow）</p>
              <p style="width:95%;">※ アーカイブや検索などの一覧ページを検索エンジンの対象にするかどうか（WordPress設定の『表示設定』⇒『検索エンジンでの表示』の設定が優先します）</p>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <?php ta_main_top_margin_setting( 'ta_common_listpage' ); ?>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <?php ta_archive_setting_detail(); ?>
            </div><!-- end of #ta_common_listpage_pro_disp -->
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <!-- 記事のデザイン設定 -->
            <h4 id="ta_common_listpage_article_pro_title" class="pro-title"><a href="JavaScript:void(0);">記事のデザイン設定</a></h4>
            <div id="ta_common_listpage_article_pro_disp" class="pro-disp init-nodisp">
              <?php ta_article_digest_design( 'common_listpage' ); ?>
            </div><!-- end of #ta_common_listpage_article_pro_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_common_listpage_disp -->
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'common', '共通『各種ページデザイン』設定更新', 'contents' ); ?>
  </div><!-- end of #ta-common-tab-contents -->
  <?php } ?>
  
  
  <?php if ( 'limit' == $valid_tab ) { ?>
  <!-- 各種ページ閲覧制限 -->
  <div class="table" id="ta-common-tab-limit">
    <?php ta_setting_form_start( 'common', 'limit' ); ?>
    <table class="ta-setting-table">
<?php
if ( TA_HIEND_PI ) { ?>
      <tr>
        <?php ta_thm001highend_common_view_limit_setting( 'ta_common_page', '固定ページ（トップページは除く）' ); ?>
      </tr>
      <tr>
        <?php ta_thm001highend_common_view_limit_setting( 'ta_common_cat', '投稿記事（カテゴリー）' ); ?>
      </tr>
      <tr>
        <?php ta_thm001highend_common_view_limit_setting( 'ta_common_yearmonth', '年月別一覧ページ' ); ?>
      </tr>
      <tr>
        <?php ta_thm001highend_common_view_limit_setting( 'ta_common_search', '検索結果ページ' ); ?>
      </tr>
<?php
} else { ?>
      <tr>
        <th class="no-ta-thm001highend">固定ページ（トップページは除く）<br>閲覧制限共通設定</a><?php ta_man2_gd( 'common/limit' ); ?></th>
        <td></td>
      </tr>
      <tr>
        <th class="no-ta-thm001highend">投稿記事（カテゴリー）<br>閲覧制限共通設定</a><?php ta_man2_gd( 'common/limit' ); ?></th>
        <td></td>
      </tr>
      <tr>
        <th class="no-ta-thm001highend">年月別一覧ページ<br>閲覧制限共通設定</a><?php ta_man2_gd( 'common/limit' ); ?></th>
        <td></td>
      </tr>
      <tr>
        <th class="no-ta-thm001highend">検索結果ページ<br>閲覧制限共通設定</a><?php ta_man2_gd( 'common/limit' ); ?></th>
        <td></td>
      </tr>
<?php
} ?>
    </table>
    <?php ta_setting_form_end( 'common', '共通『各種ページ閲覧制限』設定更新', 'limit' ); ?>
  </div><!-- end of #ta-common-tab-limit -->
  <?php } ?>
  
  
  <?php if ( 'seosmo' == $valid_tab ) { ?>
  <!-- SEO・SMO -->
  <div class="table" id="ta-common-tab-seosmo">
    <?php ta_setting_form_start( 'common', 'seosmo' ); ?>
    <table class="ta-setting-table">
      <tr>
        <!-- SEO -->
        <th id="ta_common_seo_title" class="big-title"><a href="JavaScript:void(0);">SEO</a><?php ta_man2_gd( 'common/seosmo#seo' ); ?></th>
        <td>
          <div id="ta_common_seo_disp" class="init-nodisp">
            <!-- 通常表示 -->
            <h4 class="ta-html-strip">共通キーワード</h4>
            <?php ta_text_input( 'ta_common_seo_common_keywords', 'long_box' ); ?>
            <p>※ コロン","で区切って入力してください。トップページのキーワード、他のページのベースになります</p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4 class="ta-html-strip">共通ディスクリプション</h4>
            <?php ta_textarea_input( 'ta_common_seo_common_description', 5, 67 ); ?>
            <p>※ 120文字以内で入力してください。トップページと、他のページ設定が未入力の場合のディスクリプションになります</p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4 class="ta-html-esc-asisexe">h1共通表記設定</h4>
            <?php ta_text_input( 'ta_common_seo_common_h1_content', 'long_box' ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <!-- 詳細設定 -->
            <h4 id="ta_common_seo_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
            <div id="ta_common_seo_pro_disp" class="pro-disp init-nodisp">
              <h4>SEOツールの出力</h4>
              <p><?php ta_alternative_input_checkbox( 'ta_common_seo_title_onoff', 'タイトルを出力する' ); ?></p>
              <p><?php ta_alternative_input_checkbox( 'ta_common_seo_keywords_onoff', 'キーワードを出力する' ); ?></p>
              <p><?php ta_alternative_input_checkbox( 'ta_common_seo_description_onoff', 'ディスクリプションを出力する' ); ?></p>
              <p>※ SEO用プラグインと競合する際にオフにして不具合を回避できます</p>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>サイトタイトルフォーマット</h4>
              <?php $init_value = ta_read_op( 'ta_common_seo_site_title_format' ); ?>
              <p><input type="radio" name="ta_common_seo_site_title_format" value="normal" <?php if ( "normal" == $init_value ) echo 'checked="checked"' ?>> 通常フォーム</p>
              <p><input type="radio" name="ta_common_seo_site_title_format" value="ta_type" <?php if ( "ta_type" == $init_value ) echo 'checked="checked"'; ?>> 特別フォーム</p>
              <p>※ WordPress設定一般の“サイトのタイトル”と“キャッチフレーズ”を組み合わせて表示させます。
              <br>『通常フォーム』： トップページは“サイトのタイトル”｜“キャッチフレーズ”、他のページは、“各ページの名称”｜“サイトのタイトル”と出力します。
              <br>『特別フォーム』： トップページ以外も“各ページの名称”｜“キャッチフレーズ”と出力します。</p>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>キーワードへの追加</h4>
              <p><?php ta_alternative_input_checkbox( 'ta_common_seo_cat_keywordonoff', '投稿記事カテゴリー名を追加する' ); ?></p>
              <p><?php ta_alternative_input_checkbox( 'ta_common_seo_tag_keywordonoff', '投稿記事タグ名を追加する' ); ?></p>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>トップページ以外の<br>ディスクリプション未設定時の表示</h4>
                    <?php ta_alternative_input( 'ta_common_seo_description_excerptonoff', '本文の抜粋（120文字）を表示', '共通ディスクリプションを表示' ); ?>
                  </td>
                  <td>
                    <h4>トップページ以外の<br>h1表記未設定時の表示</h4>
                    <?php ta_alternative_input( 'ta_common_seo_h1_commononoff', 'h1共通表記を表示', '各ページの設定を表示' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-fullcontents-table">
                <tr>
                  <td style="width:20em;">
                    <h4>h1共通追加記述</h4>
                    <?php ta_alternative_input_checkbox( 'ta_common_seo_h1_after_content_onoff', 'h1表記の後に共通追加記述を表示する' ); ?>
                  </td>
                  <td>
                    <h4 class="ta-html-esc-asisexe">h1共通追加記述内容</h4>
                    <?php ta_text_input( 'ta_common_seo_h1_after_content', 'long_box' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>カノニカルタグ出力</h4>
              <?php ta_alternative_input_checkbox( 'ta_common_seo_canonicalonoff', 'カノニカルタグ情報を出力する' ); ?>
              <p>※ 各ページで設定されるカノニカルタグ情報</p>
              <span class="fixed-space"></span>
            </div><!-- end of #ta_common_seo_pro_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_common_seo_disp -->
        </td>
      </tr>
      <!-- SNSボタン -->
      <tr>
        <th id="ta_common_smo_sns_button_title" class="big-title"><a href="JavaScript:void(0);">SNSボタン</a><?php ta_man2_gd( 'common/seosmo#sns_button' ); ?></th>
        <td>
          <div id="ta_common_smo_sns_button_disp" class="init-nodisp">
            <!-- 通常表示 -->
            <h4>SNSボタン</h4>
            <?php ta_alternative_input_checkbox( 'ta_common_smo_sns_button_onoff', 'SNSボタンを使用する' ); ?>
            <p>※ 未使用にするとテーマ内の全てのSNSボタン関係の設定が無効になります</p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
<?php
//チェックボックス配列から名前を探す関数
function ta_sns_check( $sns_array, $sns_name ) {
  foreach ( (array)$sns_array as $name ) {  //配列にキャスト
    if ( $sns_name == $name ) {
      echo 'checked="checked"';
    }
  }
} ?>
            <h4>ヘッダーに表示させるSNSボタンの選択</h4>
            <?php $init_value = ta_read_op( 'ta_common_smo_header_display_sns' ); ?>
            <p><input type="checkbox" name="ta_common_smo_header_display_sns[]" value="twitter" <?php ta_sns_check($init_value, "twitter"); ?>> Twitter</p>
            <p><input type="checkbox" name="ta_common_smo_header_display_sns[]" value="facebook" <?php ta_sns_check($init_value, "facebook"); ?>> Facebook</p>
            <p><input type="checkbox" name="ta_common_smo_header_display_sns[]" value="line" <?php ta_sns_check($init_value, "line"); ?>> Line</p>
            <p><input type="checkbox" name="ta_common_smo_header_display_sns[]" value="hatebu" <?php ta_sns_check($init_value, "hatebu"); ?>> はてなブックマーク</p>
            <p><input type="checkbox" name="ta_common_smo_header_display_sns[]" value="gplus" <?php ta_sns_check($init_value, "gplus"); ?>> Google+</p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>メインコンテンツに表示させるSNSボタンの選択</h4>
            <?php $init_value = ta_read_op( 'ta_common_smo_main_display_sns' ); ?>
            <p><input type="checkbox" name="ta_common_smo_main_display_sns[]" value="twitter" <?php ta_sns_check($init_value, "twitter"); ?>> Twitter</p>
            <p><input type="checkbox" name="ta_common_smo_main_display_sns[]" value="facebook" <?php ta_sns_check($init_value, "facebook"); ?>> Facebook</p>
            <p><input type="checkbox" name="ta_common_smo_main_display_sns[]" value="line" <?php ta_sns_check($init_value, "line"); ?>> Line</p>
            <p><input type="checkbox" name="ta_common_smo_main_display_sns[]" value="hatebu" <?php ta_sns_check($init_value, "hatebu"); ?>> はてなブックマーク</p>
            <p><input type="checkbox" name="ta_common_smo_main_display_sns[]" value="gplus" <?php ta_sns_check($init_value, "gplus"); ?>> Google+</p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <!-- 詳細設定 -->
            <h4 id="ta_common_smo_sns_button_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
            <div id="ta_common_smo_sns_button_pro_disp" class="pro-disp init-nodisp">
              <table class="ta-3contents-table">
                <tr>
                  <td>
                    <h4>固定ページメインコンテンツ<br>SNS表記共通設定</h4>
                    <?php ta_sns_position_selection( 'ta_common_smo_page_common_sns_position' ); ?>
                  </td>
                  <td>
                    <h4>投稿ページメインコンテンツ<br>SNS表記共通設定</h4>
                    <?php ta_sns_position_selection( 'ta_common_smo_post_common_sns_position' ); ?>
                  </td>
                  <td>
                    <h4>一覧ページメインコンテンツ<br>SNS表記共通設定</h4>
                    <?php ta_sns_position_selection( 'ta_common_smo_listpage_sns_position' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <div class="ta-setting-inline-gp">
                <div class="inline-gp-50">
                  <h4>トップページメインコンテンツの上側SNS表記の位置調整</h4>
                  <div class="ta-setting-inline-gp">
                    <div class="inline-gp-20">
                      <?php ta_simple_input( 'ta_common_smo_top_sns_top_toppadding', '上余白： ピクセル', 'short_box' ); ?>
                    </div>
                    <div class="inline-gp-0">
                      <?php ta_simple_input( 'ta_common_smo_top_sns_top_bottompadding', '下余白： ピクセル', 'short_box' ); ?>
                    </div>
                  </div>
                </div>
                <div class="inline-gp-0">
                  <h4>トップページメインコンテンツの下側SNS表記の位置調整</h4>
                  <div class="ta-setting-inline-gp">
                    <div class="inline-gp-20">
                      <?php ta_simple_input( 'ta_common_smo_top_sns_bottom_toppadding', '上余白： ピクセル', 'short_box' ); ?>
                    </div>
                    <div class="inline-gp-0">
                      <?php ta_simple_input( 'ta_common_smo_top_sns_bottom_bottompadding', '下余白： ピクセル', 'short_box' ); ?>
                    </div>
                  </div>
                </div>
              </div>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <div class="ta-setting-inline-gp">
                <div class="inline-gp-50">
                  <h4>固定ページメインコンテンツの上側SNS表記の位置調整</h4>
                  <div class="ta-setting-inline-gp">
                    <div class="inline-gp-20">
                      <?php ta_simple_input( 'ta_common_smo_page_sns_top_toppadding', '上余白： ピクセル', 'short_box' ); ?>
                    </div>
                    <div class="inline-gp-0">
                      <?php ta_simple_input( 'ta_common_smo_page_sns_top_bottompadding', '下余白： ピクセル', 'short_box' ); ?>
                    </div>
                  </div>
                </div>
                <div class="inline-gp-0">
                  <h4>固定ページメインコンテンツの下側SNS表記の位置調整</h4>
                  <div class="ta-setting-inline-gp">
                    <div class="inline-gp-20">
                      <?php ta_simple_input( 'ta_common_smo_page_sns_bottom_toppadding', '上余白： ピクセル', 'short_box' ); ?>
                      </div>
                    <div class="inline-gp-0">
                      <?php ta_simple_input( 'ta_common_smo_page_sns_bottom_bottompadding', '下余白： ピクセル', 'short_box' ); ?>
                    </div>
                  </div>
                </div>
              </div>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <div class="ta-setting-inline-gp">
                <div class="inline-gp-50">
                  <h4>投稿ページメインコンテンツの上側SNS表記の位置調整</h4>
                  <div class="ta-setting-inline-gp">
                    <div class="inline-gp-20">
                      <?php ta_simple_input( 'ta_common_smo_post_sns_top_toppadding', '上余白： ピクセル', 'short_box' ); ?>
                    </div>
                    <div class="inline-gp-0">
                      <?php ta_simple_input( 'ta_common_smo_post_sns_top_bottompadding', '下余白： ピクセル', 'short_box' ); ?>
                    </div>
                  </div>
                </div>
                <div class="inline-gp-0">
                  <h4>投稿ページメインコンテンツの下側SNS表記の位置調整</h4>
                  <div class="ta-setting-inline-gp">
                    <div class="inline-gp-20">
                      <?php ta_simple_input( 'ta_common_smo_post_sns_bottom_toppadding', '上余白： ピクセル', 'short_box' ); ?>
                    </div>
                    <div class="inline-gp-0">
                      <?php ta_simple_input( 'ta_common_smo_post_sns_bottom_bottompadding', '下余白： ピクセル', 'short_box' ); ?>
                    </div>
                  </div>
                </div>
              </div>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <div class="ta-setting-inline-gp">
                <div class="inline-gp-50">
                  <h4>一覧ページメインコンテンツの上側SNS表記の位置調整</h4>
                  <div class="ta-setting-inline-gp">
                    <div class="inline-gp-20">
                      <?php ta_simple_input( 'ta_common_smo_listpage_sns_top_toppadding', '上余白： ピクセル', 'short_box' ); ?>
                    </div>
                    <div class="inline-gp-0">
                      <?php ta_simple_input( 'ta_common_smo_listpage_sns_top_bottompadding', '下余白： ピクセル', 'short_box' ); ?>
                    </div>
                  </div>
                </div>
                <div class="inline-gp-0">
                  <h4>一覧ページメインコンテンツの下側SNS表記の位置調整</h4>
                  <div class="ta-setting-inline-gp">
                    <div class="inline-gp-20">
                      <?php ta_simple_input( 'ta_common_smo_listpage_sns_bottom_toppadding', '上余白： ピクセル', 'short_box' ); ?>
                    </div>
                    <div class="inline-gp-0">
                      <?php ta_simple_input( 'ta_common_smo_listpage_sns_bottom_bottompadding', '下余白： ピクセル', 'short_box' ); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- end of #ta_common_smo_sns_button_pro_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_common_smo_sns_button_disp -->
        </td>
      </tr>
      <!-- OGP共通 -->
      <tr>
        <th id="ta_common_smo_ogp_title" class="big-title"><a href="JavaScript:void(0);">OGP共通</a><?php ta_man2_gd( 'common/seosmo#ogp' ); ?></th>
        <td>
          <div id="ta_common_smo_ogp_disp" class="init-nodisp">
            <!-- 通常表示 -->
            <h4>OGPタグ共通設定</h4>
            <?php ta_alternative_input_checkbox( 'ta_common_smo_ogp_common_onoff', 'OGPタグを出力する' ); ?>
            <p>※ 各ページで設定されるOGPタグ情報の出力設定より優先します</p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <!-- 詳細設定 -->
            <h4 id="ta_common_smo_ogp_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
            <div id="ta_common_smo_ogp_pro_disp" class="pro-disp init-nodisp">
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>OGPタグタイプ</h4>
                    <p>タイプは"article"になります。</p>
                  </td>
                  <td>
                    <h4>OGPタグ地域</h4>
                    <p>地域は"ja_JP"になります。</p>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>fb:admins</h4>
                    <?php ta_text_input_w_nodisp( 'ta_common_smo_ogp_admins', 'middle_box' ); ?>
                    <p>※ 未使用時は“表示無し”をクリック</p>
                  </td>
                  <td>
                    <h4>fb:app_id</h4>
                    <?php ta_text_input_w_nodisp( 'ta_common_smo_ogp_appid', 'middle_box' ); ?>
                    <p>※ 未使用時は“表示無し”をクリック</p>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>OGP画像の共通設定</h4>
              <?php ta_img_upload_process( 'ta_common_smo_ogp_common_image' ); ?>
              <p>※ 縦横幅の最大値を500ピクセルに制限しています</p>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>各ページのOGP画像が未設定時にOGPタグに出力する画像</h4>
              <?php $init_value = ta_read_op( 'ta_common_smo_ogp_def_img' ); ?>
              <p><input type="radio" name="ta_common_smo_ogp_def_img" value="none" <?php if ( "none" == $init_value ) echo 'checked="checked"' ?>> OGP画像を出力しない</p>
              <p><input type="radio" name="ta_common_smo_ogp_def_img" value="eyecatch" <?php if ( "eyecatch" == $init_value ) echo 'checked="checked"' ?>> 各ページのアイキャッチ画像</p>
              <p><input type="radio" name="ta_common_smo_ogp_def_img" value="common" <?php if ( "common" == $init_value ) echo 'checked="checked"'; ?>> 共通設定のOGP画像</p>
              <p>※ トップページの場合、アイキャッチ画像の選択は共通設定となります</p>
              <span class="fixed-space"></span>
            </div><!-- end of #ta_common_smo_ogp_pro_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_common_smo_ogp_disp -->
        </td>
      </tr>
      <!-- Twitter Cards共通設定 -->
      <tr>
        <th id="ta_common_smo_twittercards_title" class="big-title"><a href="JavaScript:void(0);">Twitter Cards共通</a><?php ta_man2_gd( 'common/seosmo#twittercards' ); ?></th>
        <td>
          <div id="ta_common_smo_twittercards_disp" class="init-nodisp">
            <!-- 通常表示 -->
            <h4>Twitter Cardsタグ共通設定</h4>
            <?php ta_alternative_input_checkbox( 'ta_common_smo_twittercards_common_onoff', 'Twitter Cardsタグを出力する' ); ?>
            <p>※ 各ページで設定されるTwitter Cardsタグ情報の出力設定より優先します</p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <!-- 詳細設定 -->
            <h4 id="ta_common_smo_twittercards_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
            <div id="ta_common_smo_twittercards_pro_disp" class="pro-disp init-nodisp">
              <h4 class="ta-html-strip">登録Twitterアカウント</h4>
              <?php ta_text_input( 'ta_common_smo_twittercards_account', 'middle_box' ); ?>
              <p>※ 先頭に@を付けても付けなくてもOKです</p>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>Twitter Cardsタグタイプ</h4>
              <p>タイプは"summary"になります。</p>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>Twitter Cards画像の共通設定</h4>
              <?php ta_img_upload_process( 'ta_common_smo_twittercards_common_image' ); ?>
              <p>※ 縦横幅の最大値を500ピクセルに制限しています</p>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>各ページのTwitter Cards画像が未設定時にTwitter Cardsタグに出力する画像</h4>
              <?php $init_value = ta_read_op( 'ta_common_smo_twittercards_def_img' ); ?>
              <p><input type="radio" name="ta_common_smo_twittercards_def_img" value="none" <?php if ( "none" == $init_value ) echo 'checked="checked"' ?>> Twitter Cards画像を出力しない</p>
              <p><input type="radio" name="ta_common_smo_twittercards_def_img" value="eyecatch" <?php if ( "eyecatch" == $init_value ) echo 'checked="checked"' ?>> 各ページのアイキャッチ画像</p>
              <p><input type="radio" name="ta_common_smo_twittercards_def_img" value="common" <?php if ( "common" == $init_value ) echo 'checked="checked"'; ?>> 共通設定のTwitter Cards画像</p>
              <p>※ トップページの場合、アイキャッチ画像の選択は共通設定となります</p>
              <span class="fixed-space"></span>
            </div><!-- end of #ta_common_smo_twittercards_pro_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_common_smo_twittercards_disp -->
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'common', '共通『SEO・SMO』設定更新', 'seosmo' ); ?>
  </div><!-- end of #ta-common-tab-seosmo -->
  <?php } ?>
  
  
  <?php if ( 'sitemap' == $valid_tab ) { ?>
  <!-- サイトマップ -->
  <div class="table" id="ta-common-tab-sitemap">
    <?php ta_setting_form_start( 'common', 'sitemap' ); ?>
    <table class="ta-setting-table">
      <tr>
        <!-- 基本設定 -->
        <th id="ta_common_sitemap_base_title" class="big-title"><a href="JavaScript:void(0);">基本設定</a><?php ta_man2_gd( 'common/sitemap#base' ); ?></th>
        <td>
          <div id="ta_common_sitemap_base_disp" class="init-nodisp">
            <!-- 通常表示 -->
            <h4>サイトマップ使用</h4>
            <?php ta_alternative_input_checkbox( 'ta_common_sitemap_onoff', '使用する' ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <!-- 詳細設定 -->
            <h4 id="ta_common_sitemap_base_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
            <div id="ta_common_sitemap_base_pro_disp" class="pro-disp init-nodisp">
              <table class="ta-fullcontents-table">
                <tr>
                  <td style="width:20em;">
                    <h4>表示コンテンツ</h4>
                    <?php $init_value = ta_read_op( 'ta_common_sitemap_disp_contents' ); ?>
                    <p><input type="radio" name="ta_common_sitemap_disp_contents" value="page_cat" <?php if ( "page_cat" == $init_value ) echo 'checked="checked"'; ?>> 固定ページ → カテゴリーの順</p>
                    <p><input type="radio" name="ta_common_sitemap_disp_contents" value="cat_page" <?php if ( "cat_page" == $init_value ) echo 'checked="checked"'; ?>> カテゴリー → 固定ページの順</p>
                    <p><input type="radio" name="ta_common_sitemap_disp_contents" value="page_only" <?php if ( "page_only" == $init_value ) echo 'checked="checked"'; ?>> 固定ページのみ</p>
                    <p><input type="radio" name="ta_common_sitemap_disp_contents" value="cat_only" <?php if ( "cat_only" == $init_value ) echo 'checked="checked"'; ?>> カテゴリーのみ</p>
                  </td>
                  <td>
                    <h4>新規ウィンドウ</h4>
                    <?php ta_alternative_input_checkbox( 'ta_common_sitemap_link_newwin_onoff', '新規ウィンドウで開く' ); ?>
                    <p>※ リンク時に新規ウィンドウで開きます</p>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>表示階層</h4>
              <?php $init_value = ta_read_op( 'ta_common_sitemap_disp_depth_num' ); ?>
              <table class="ta-fullcontents-table">
                <tr>
                  <td style="width:15em;">
                    <p><input type="radio" name="ta_common_sitemap_disp_depth_num" value="1" <?php if ( "1" == $init_value ) echo 'checked="checked"'; ?>> 1層まで（親のみ）</p>
                  </td>
                  <td>
                    <p><input type="radio" name="ta_common_sitemap_disp_depth_num" value="4" <?php if ( "4" == $init_value ) echo 'checked="checked"'; ?>> 4層</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p><input type="radio" name="ta_common_sitemap_disp_depth_num" value="2" <?php if ( "2" == $init_value ) echo 'checked="checked"'; ?>> 2層まで（子まで）</p>
                  </td>
                  <td>
                    <p><input type="radio" name="ta_common_sitemap_disp_depth_num" value="5" <?php if ( "5" == $init_value ) echo 'checked="checked"'; ?>> 5層</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p><input type="radio" name="ta_common_sitemap_disp_depth_num" value="3" <?php if ( "3" == $init_value ) echo 'checked="checked"'; ?>> 3層まで（孫まで）</p>
                  </td>
                  <td>
                    <p><input type="radio" name="ta_common_sitemap_disp_depth_num" value="0" <?php if ( "0" == $init_value ) echo 'checked="checked"'; ?>> 制限なし</p>
                  </td>
                </tr>
              </table>
              <p>※ 親 → 子 → 孫 ・・・のどこまで表示するかの指定です</p>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>固定ページ一覧のタイトル</h4>
                    <?php ta_text_input_w_nodisp( 'ta_common_sitemap_page_title', 'middle_box' ); ?>
                  </td>
                  <td>
                    <h4>カテゴリー一覧のタイトル</h4>
                    <?php ta_text_input_w_nodisp( 'ta_common_sitemap_cat_title', 'middle_box' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>カテゴリー毎の投稿数</h4>
                    <?php ta_alternative_input_checkbox( 'ta_common_sitemap_cat_postnum_onoff', '表示する' ); ?>
                  </td>
                  <td>
                    <h4>カテゴリーの子以降の投稿数</h4>
                    <?php ta_alternative_input_checkbox( 'ta_common_sitemap_cat_parent_postnum_onoff', '親に含める' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>表示するカテゴリー数</h4>
                    <?php ta_simple_input( 'ta_common_sitemap_cat_num_limit', '個', 'short_box' ); ?>
                    <p>※ 0は無制限： 子孫等も含みます</p>
                  </td>
                  <td>
                    <h4>投稿記事の無いカテゴリーの表示</h4>
                    <?php ta_alternative_input_checkbox( 'ta_common_sitemap_cat_disp_nopost_onoff', '表示しない' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>テックエイドサイトマップを表示させる<br>固定ページのスラッグ（slug）名</h4>
              <?php ta_text_input( 'ta_common_sitemap_page_slug', 'middle_box' ); ?>
              <span class="fixed-space"></span>
            </div><!-- end of #ta_common_sitemap_base_pro_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_common_sitemap_base_disp -->
        </td>
      </tr>
      <!-- デザイン設定 -->
      <tr>
        <th id="ta_common_sitemap_design_title" class="big-title"><a href="JavaScript:void(0);">デザイン設定</a><?php ta_man2_gd( 'common/sitemap#design' ); ?></th>
        <td>
          <div id="ta_common_sitemap_design_disp" class="init-nodisp">
            <!-- 通常表示 -->
            <h4>タイトルの要素名設定</h4>
            <?php ta_factor_selection_process( 'ta_common_sitemap_title_factor', 'option', 0, 'none', 'メイン' ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <!-- 親項目の詳細設定 -->
            <?php ta_sitemap_general_setting( 'ta_common_sitemap_parent', '親項目', 'pro-disp' ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <!-- 子孫項目の詳細設定 -->
            <?php ta_sitemap_general_setting( 'ta_common_sitemap_children', '子孫項目', 'pro-disp' ); ?>
            <span class="fixed-space"></span>
          </div><!-- end of #ta_common_sitemap_design_disp -->
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'common', '共通『サイトマップ』設定更新', 'sitemap' ); ?>
  </div><!-- end of #ta-common-tab-sitemap -->
  <?php } ?>
  
  
  <?php if ( 'freecssjsphp' == $valid_tab ) { ?>
  <!-- フリーCSS・JS -->
  <div class="table" id="ta-common-tab-freecssjsphp">
    <?php ta_setting_form_start( 'common', 'freecssjsphp' ); ?>
    <table class="ta-setting-table">
      <tr>
        <th id="ta_common_freecss_title" class="big-title"><a href="JavaScript:void(0);">フリーCSS</a><?php ta_man2_gd( 'common/freecssjs#css' ); ?></th>
        <td>
          <div id="ta_common_freecss_disp" class="init-nodisp">
            <!-- 通常表示 -->
            <h4>フリーCSS機能</h4>
            <?php ta_alternative_input_checkbox( 'ta_common_freecss_onoff', 'フリーCSS機能を有効にする' ); ?>
            <p>※ 動作に不具合がある場合は無効にして下さい</p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <!-- 詳細設定 -->
            <h4 id="ta_common_freecss_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
            <div id="ta_common_freecss_pro_disp" class="pro-disp init-nodisp">
              <h4>フリーCSSコード</h4>
              <?php ta_textarea_input( 'ta_common_freecss_code', 5, 67 ); ?>
              <p>フリーCSSファイルのパスは、テーマ直下/css/ta-dynamic-freecss.cssです</p>
            </div><!-- end of #ta_common_freecss_pro_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_common_freecss_disp -->
        </td>
      </tr>
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_freejs_setting();
} else { ?>
      <tr>
        <th class="no-ta-thm001highend">フリーJavaScript<?php ta_man2_gd( 'common/freecssjs#js' ); ?></th>
        <td></td>
      </tr>
<?php
} ?>
    </table>
    <?php ta_setting_form_end( 'common', '共通『フリーCSS・JS』設定更新', 'freecssjsphp' ); ?>
  </div><!-- end of #ta-common-freecssjsphp -->
  <?php } ?>
  
  
  <?php if ( 'etc' == $valid_tab ) { ?>
  <!-- その他 -->
  <div class="table" id="ta-common-tab-etc">
    <?php ta_setting_form_start( 'common', 'etc' ); ?>
    <table class="ta-setting-table">
      <!-- コメント機能 -->
      <tr>
        <th id="ta_common_comment_func_title" class="big-title"><a href="JavaScript:void(0);">コメント機能</a><?php ta_man2_gd( 'common/etc#comment' ); ?></th>
        <td>
          <div id="ta_common_comment_func_disp" class="init-nodisp">
            <h4>コメント機能</h4>
            <?php ta_alternative_input_checkbox( 'ta_common_comment_func_onoff', '投稿のコメント機能（入力欄、表示欄）を非表示にする' ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <!-- 詳細設定 -->
            <h4 id="ta_common_comment_detail_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
            <div id="ta_common_comment_detail_pro_disp" class="pro-disp init-nodisp">
              <table class="ta-fullcontents-table">
                <tr>
                  <td style="width:20em;">
                    <h4>コメント表示タイトルの要素名設定</h4>
                    <?php ta_factor_selection_process( 'ta_common_comment_disp_title_factor', 'option', 0, 'none', 'メイン' ); ?>
                  </td>
                  <td>
                    <h4 class="ta-html-strip">コメント表示タイトル</h4>
                    <?php ta_text_input( 'ta_common_comment_disp_title', 'long_box' ); ?>
                    <p>※ %name%の箇所に投稿記事名、%num%の箇所にコメント数を表示させることができます</p>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>アバター画像のサイズ</h4>
              <?php ta_simple_input( 'ta_common_comment_disp_avatar_size', 'ピクセル', 'short_box' ); ?>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-fullcontents-table">
                <tr>
                  <td style="width:20em;">
                    <h4>コメント記入タイトルの要素名設定</h4>
                    <?php ta_factor_selection_process( 'ta_common_comment_write_title_factor', 'option', 0, 'none', 'メイン' ); ?>
                  </td>
                  <td>
                    <h4 class="ta-html-strip">コメント記入タイトル</h4>
                    <?php ta_text_input( 'ta_common_comment_write_title', 'long_box' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
            </div><!-- end of #ta_common_comment_detail_pro_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_common_comment_func_disp -->
        </td>
      </tr>
      <!-- モバイル端末のランドスケープ表示 -->
      <tr>
        <th id="ta_common_landscape_setting_title" class="big-title"><a href="JavaScript:void(0);">モバイル端末の<br>ランドスケープ表示</a><?php ta_man2_gd( 'common/etc#landscape' ); ?></th>
        <td>
          <div id="ta_common_landscape_setting_disp" class="init-nodisp">
            <h4>フォントサイズ自動調整（ランドスケープ表示）</h4>
            <?php ta_alternative_input_checkbox( 'ta_common_landscape_no_as_onoff', '無効にする' ); ?>
            <p>※ 多くのスマホ端末が採用しているランドスケープ（端末横向き）時のフォントサイズ自動調整の設定です。フォントサイズの比率に違和感がある場合に無効にします。</p>
            <span class="fixed-space"></span>
          </div><!-- end of #ta_common_landscape_setting_disp -->
        </td>
      </tr>
      <!-- エラー404表示 -->
      <tr>
        <th id="ta_common_error404_disp_title" class="big-title"><a href="JavaScript:void(0);">エラー404表示</a><?php ta_man2_gd( 'common/etc#error404' ); ?></th>
        <td>
          <div id="ta_common_error404_disp_disp" class="init-nodisp">
            <h4 class="ta-html-strip">エラー404表示タイトル</h4>
            <?php ta_text_input_w_nodisp( 'ta_common_error404_title', 'long_box' ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4 class="ta-html-esc-asisexe">エラー404表示フリーテキスト</h4>
            <?php ta_textarea_input( 'ta_common_error404_freetext', 5, 67 ); ?>
            <p>※ エラー404表示はドメイン内のページがアクセスできない場合に表示されます</p>
            <span class="fixed-space"></span>
          </div><!-- end of #ta_common_error404_disp_disp -->
        </td>
      </tr>
      <!-- メンテナンスモード -->
      <tr>
        <th id="ta_common_mainte_mode_title" class="big-title"><a href="JavaScript:void(0);">メンテナンスモード</a><?php ta_man2_gd( 'common/etc#mainte' ); ?></th>
        <td>
          <div id="ta_common_mainte_mode_disp" class="init-nodisp">
            <h4>メンテナンスモード</h4>
            <?php ta_alternative_input_checkbox( 'ta_common_mainte_mode_onoff', 'メンテナンスモードにする' ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>メンテナンスモード時の閲覧可能者</h4>
            <?php $init_value = ta_read_op( 'ta_common_mainte_work_person' ); ?>
            <p><input type="radio" name="ta_common_mainte_work_person" value="edit_themes" <?php if ( "edit_themes" == $init_value ) echo 'checked="checked"'; ?>> 管理者</p>
            <p><input type="radio" name="ta_common_mainte_work_person" value="edit_pages" <?php if ( "edit_pages" == $init_value ) echo 'checked="checked"' ?>> 編集者以上</p>
            <p><input type="radio" name="ta_common_mainte_work_person" value="publish_posts" <?php if ( "publish_posts" == $init_value ) echo 'checked="checked"' ?>> 投稿者以上</p>
            <p><input type="radio" name="ta_common_mainte_work_person" value="edit_posts" <?php if ( "edit_posts" == $init_value ) echo 'checked="checked"' ?>> 寄稿者以上</p>
            <p><input type="radio" name="ta_common_mainte_work_person" value="read" <?php if ( "read" == $init_value ) echo 'checked="checked"' ?>> ログインユーザー全て</p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4 class="ta-html-esc-asisexe">メンテナンス表示タイトル</h4>
            <?php ta_text_input_w_nodisp( 'ta_common_mainte_title', 'long_box' ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4 class="ta-html-esc-asisexe">メンテナンス表示サブタイトル</h4>
            <?php ta_text_input_w_nodisp( 'ta_common_mainte_subtitle', 'long_box' ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4 class="ta-html-esc-asisexe">メンテナンス表示テキスト</h4>
            <?php ta_textarea_input( 'ta_common_mainte_content', 5, 67 ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4 class="ta-html-esc-asisexe">メンテナンス表示コピーライト</h4>
            <?php ta_text_input_w_nodisp( 'ta_common_mainte_copyright', 'long_box' ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <!-- 詳細設定 -->
            <h4 id="ta_common_mainte_mode_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
            <div id="ta_common_mainte_mode_pro_disp" class="pro-disp init-nodisp">
              <table class="ta-3contents-table">
                <tr>
                  <td>
                    <h4>背景色</h4>
                    <?php ta_color_picker_process( 'ta_common_mainte_mode_color', 'valid' ); ?>
                  </td>
                  <td>
                    <h4>テキストの色</h4>
                    <?php ta_color_picker_no_tomei_process( 'ta_common_mainte_font_color', 'valid' ); ?>
                  </td>
                  <td>
                    <h4>スタッフ用ログイン表示</h4>
                    <?php ta_alternative_input_checkbox( 'ta_common_mainte_login_onoff', '表示する' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <?php ta_linkedtext_setting( 
                      'リンク付テキスト',
                      'ta_common_mainte_font_anchor_color', 'invalid',
                      'ta_common_mainte_font_anchor_under',
                      'ta_common_mainte_font_anchor_colorhover', 'invalid',
                      'ta_common_mainte_font_anchor_underhover' ); ?>
            </div><!-- end of #ta_common_mainte_mode_pro_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_common_mainte_mode_disp -->
        </td>
      </tr>
      <!-- 管理画面アクセス制限 -->
      <tr>
        <th id="ta_common_adminpage_limit_title" class="big-title"><a href="JavaScript:void(0);">管理画面アクセス制限</a><?php ta_man2_gd( 'common/etc#adminpage' ); ?></th>
        <td>
          <div id="ta_common_adminpage_limit_disp" class="init-nodisp">
            <table class="ta-fullcontents-table">
              <tr>
                <td style="width:20em;">
                  <h4>管理画面アクセス可能者</h4>
                  <?php $init_value = ta_read_op( 'ta_common_adminpage_limit' ); ?>
                  <p><input type="radio" name="ta_common_adminpage_limit" value="edit_themes" <?php if ( "edit_themes" == $init_value ) echo 'checked="checked"'; ?>> 管理者</p>
                  <p><input type="radio" name="ta_common_adminpage_limit" value="edit_pages" <?php if ( "edit_pages" == $init_value ) echo 'checked="checked"' ?>> 編集者以上</p>
                  <p><input type="radio" name="ta_common_adminpage_limit" value="publish_posts" <?php if ( "publish_posts" == $init_value ) echo 'checked="checked"' ?>> 投稿者以上</p>
                  <p><input type="radio" name="ta_common_adminpage_limit" value="edit_posts" <?php if ( "edit_posts" == $init_value ) echo 'checked="checked"' ?>> 寄稿者以上</p>
                  <p><input type="radio" name="ta_common_adminpage_limit" value="read" <?php if ( "read" == $init_value ) echo 'checked="checked"' ?>> ログインユーザー全て</p>
                </td>
                <td>
                  <h4>ツールバー（admin bar）表示</h4>
                  <?php ta_alternative_input_checkbox( 'ta_common_adminpage_limit_bar_onoff', '管理画面アクセス禁止者のツールバーを非表示にする' ); ?>
                  <span class="fixed-space"></span>
                  <p>※ チェックを入れるとツールバー（admin bar）が表示されなくなるため、管理画面アクセス禁止者は
                  <br>ブラウザクッキーの有効期限が切れるまでログアウトができませんので運用にご注意ください。</p>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <p>※ ご使用の会員制化プラグイン等に同様の機能がある場合は本設定はオフにしてください</p>
            <span class="fixed-space"></span>
          </div><!-- end of #ta_common_adminpage_limit_disp -->
        </td>
      </tr>
      <!-- JavaScript未使用（未設定）ブラウザへの注意文表示 -->
      <tr>
        <th id="ta_common_js_warning_title" class="big-title"><a href="JavaScript:void(0);">JavaScript注意文</a><?php ta_man2_gd( 'common/etc#js_warning' ); ?></th>
        <td>
          <div id="ta_common_js_warning_disp" class="init-nodisp">
            <p>『TAテーマ001』はJavaScriptを使用しています。JavaScriptに対応していないブラウザ（ほとんどありません）、またはJavaScript設定を意図的にオフにしているブラウザでは正しく表示されない可能性があります。
            <br>そのため、最近のJavaScriptを使用する多くのホームページではJavaScript有効設定を促す注意文を表示します。（表示はご覧のブラウザーのJavaScript設定をオフにしてご確認ください）</p>
            <h4>JavaScript未使用（未設定）ブラウザへの注意文表示</h4>
            <?php ta_alternative_input_checkbox( 'ta_common_js_warning_onoff', 'JavaScript設定がオフの場合に注意文を表示する' ); ?>
            <span class="fixed-space"></span>
          </div><!-- end of #ta_common_js_warning_disp -->
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'common', '共通『その他』設定更新', 'etc' ); ?>
  </div><!-- end of #ta-common-tab-etc -->
  <?php } ?>
  
  
  <?php if ( 'system' == $valid_tab ) { ?>
  <!-- 使用システム情報 -->
  <div class="table" id="ta-common-tab-system">
    <table class="ta-setting-table">
      <!-- バージョン -->
      <tr>
        <th id="ta_common_version_title" class="big-title"><a href="JavaScript:void(0);">テーマファイル<br>バージョン</a><?php ta_man2_gd( 'common/system#version' ); ?></th>
        <td>
          <div id="ta_common_version_disp" class="init-nodisp">
            <h4>製品バージョン</h4>
            <p><?php echo 'TAテーマ001 (ta-theme001): ' . TATHEME001_VER; ?></p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <?php if ( TA_DVLP_PI ) { ta_thm001developer_latestfile_display(); } ?>
            <h4>WPメインファイル</h4>
<?php
if ( TA_DVLP_PI ) {
  ta_thm001developer_file_version_display();
} else { ?>
            <p><?php echo '404.php: ' . ERROR404_PHP_VER; ?></p>
            <p><?php echo 'archive.php: ' . ARCHIVE_PHP_VER; ?></p>
            <p><?php echo 'comments.php: ' . COMMENTS_PHP_VER; ?></p>
            <p><?php echo 'content-archive.php: ' . CONTENTARCHIVE_PHP_VER; ?></p>
            <p><?php echo 'footer.php: ' . FOOTER_PHP_VER; ?></p>
            <p><?php echo 'front-page.php: ' . FRONTPAGE_PHP_VER; ?></p>
            <p><?php echo 'functions.php: ' . FUNCTIONS_PHP_VER; ?></p>
            <p><?php echo 'header.php: ' . HEADER_PHP_VER; ?></p>
            <p><?php echo 'header-sns-button.php: ' . HEADERSNSBUTTON_PHP_VER; ?></p>
            <p><?php echo 'main-sns-button.php: ' . MAINSNSBUTTON_PHP_VER; ?></p>
            <p><?php echo 'page.php: ' . PAGE_PHP_VER; ?></p>
            <p><?php echo 'search.php: ' . SEARCH_PHP_VER; ?></p>
            <p><?php echo 'sidebar.php: ' . SIDEBAR_PHP_VER; ?></p>
            <p><?php echo 'sidebar-sub.php: ' . SIDEBARSUB_PHP_VER; ?></p>
            <p><?php echo 'single.php: ' . SINGLE_PHP_VER; ?></p>
            <p><?php echo 'ta-backto-top.php: ' . TABACKTOTOP_PHP_VER; ?></p>
            <p><?php echo 'ta-sitemap.php: ' . TASITEMAP_PHP_VER; ?></p>
            <p><?php echo 'ta-mainte.php: ' . TAMAINTE_PHP_VER; ?></p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>CSS（固定）ファイル</h4>
            <p><?php echo 'ta-admin-setting.css: ' . TAADMINSETTING_CSS_VER; ?></p>
            <p><?php echo 'ta-common.css-base: ' . TACOMMON_CSS_VER; ?></p>
            <p><?php echo 'ta-reset.css-base: ' . TARESET_CSS_VER; ?></p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>JavaScriptファイル</h4>
            <p><?php echo 'ta_scroll.js-base: ' . TASCROLL_JS_VER; ?></p>
            <p><?php echo 'ta-admin-functions.js: ' . TAADMINFUNCTIONS_JS_VER; ?></p>
            <p><?php echo 'ta-admin-setting-colorpicker.js: ' . TAADMINSETTINGCOLORPICKER_JS_VER; ?></p>
            <p><?php echo 'ta-admin-setting-upload.js: ' . TAADMINSETTINGUPLOAD_JS_VER; ?></p>
            <p><?php echo 'ta-sns.js-base: ' . TASNS_JS_VER; ?></p>
            <p><?php echo 'ta-wp-setting.js-base: ' . TAWPSETTING_JS_VER; ?></p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>TAモジュール（共通）</h4>
            <p><?php echo 'ta-admin-update.php: ' . TAADMINUPDATE_PHP_VER; ?></p>
            <p><?php echo 'ta-init.php: ' . TAINIT_PHP_VER; ?></p>
            <p><?php echo 'ta-php2ajax.php: ' . TAPHP2AJAX_PHP_VER; ?></p>
            <p><?php echo 'ta-php2freejs.php: ' . TAPHP2FREEJS_PHP_VER; ?></p>
            <p><?php echo 'ta-php2js-value.php: ' . TAPHP2JSVALUE_PHP_VER; ?></p>
            <p><?php echo 'ta-save-post.php: ' . TASAVEPOST_PHP_VER; ?></p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>TAモジュール（カスタムボックス）</h4>
            <p><?php echo 'ta-main-custombox-callback.php: ' . TAMAINCUSTOMBOXCALLBACK_PHP_VER; ?></p>
            <p><?php echo 'ta-page-custombox-callback.php: ' . TAPAGECUSTOMBOXCALLBACK_PHP_VER; ?></p>
            <p><?php echo 'ta-post-custombox-callback.php: ' . TAPOSTCUSTOMBOXCALLBACK_PHP_VER; ?></p>
            <p><?php echo 'ta-side-custombox-callback.php: ' . TASIDECUSTOMBOXCALLBACK_PHP_VER; ?></p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>TAモジュール（動的CSS生成）</h4>
            <p><?php echo 'ta-dynamic-php2css.php: ' . TADYNAMICPHP2CSS_PHP_VER; ?></p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>TAモジュール（設定値入力）</h4>
            <p><?php echo 'ta-common-setting.php: ' . TACOMMONSETTING_PHP_VER; ?></p>
            <p><?php echo 'ta-footer-setting.php: ' . TAFOOTERSETTING_PHP_VER; ?></p>
            <p><?php echo 'ta-header-setting.php: ' . TAHEADERSETTING_PHP_VER; ?></p>
            <p><?php echo 'ta-main-setting.php: ' . TAMAINSETTING_PHP_VER; ?></p>
            <p><?php echo 'ta-responsible-setting.php: ' . TARESPONSIBLESETTING_PHP_VER; ?></p>
            <p><?php echo 'ta-responsiblehead-setting.php: ' . TARESPONSIBLEHEADSETTING_PHP_VER; ?></p>
            <p><?php echo 'ta-responsiblemain-setting.php: ' . TARESPONSIBLEMAINSETTING_PHP_VER; ?></p>
            <p><?php echo 'ta-responsibleside-setting.php: ' . TARESPONSIBLESIDESETTING_PHP_VER; ?></p>
            <p><?php echo 'ta-responsiblesidesub-setting.php: ' . TARESPONSIBLESIDESUBSETTING_PHP_VER; ?></p>
            <p><?php echo 'ta-responsiblefoot-setting.php: ' . TARESPONSIBLEFOOTSETTING_PHP_VER; ?></p>
            <p><?php echo 'ta-seocentral-setting.php: ' . TASEOCENTRALSETTING_PHP_VER; ?></p>
            <p><?php echo 'ta-short-setting.php: ' . TASHORTSETTING_PHP_VER; ?></p>
            <p><?php echo 'ta-sidebar-setting.php: ' . TASIDEBARSETTING_PHP_VER; ?></p>
            <p><?php echo 'ta-sidebarsub-setting.php: ' . TASIDEBARSUBSETTING_PHP_VER; ?></p>
            <p><?php echo 'ta-tools-setting.php: ' . TATOOLSSETTING_PHP_VER; ?></p>
            <p><?php echo 'ta-top-setting.php: ' . TATOPSETTING_PHP_VER; ?></p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>TAモジュール（関数）</h4>
            <p><?php echo 'ta-setting-functions.php: ' . TASETTINGFUNCTIONS_PHP_VER; ?></p>
            <p><?php echo 'ta-template-functions.php: ' . TATEMPLATEFUNCTIONS_PHP_VER; ?></p>
            <p><?php echo 'ta-css-functions.php: ' . TACSSFUNCTIONS_PHP_VER; ?></p>
<?php
  if ( TA_HIEND_PI ) { ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>プラグインTA-THEME001-HIGHEND（プラグイン記述）</h4>
            <p><?php echo 'ta-theme001-highend_' . str_replace( ".", "", TATHEME001 ) . '.php: ' . TATHEME001HIGHEND_PHP_VER; ?></p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>プラグインTA-THEME001-HIGHEND（カスタムボックス）</h4>
            <p><?php echo 'ta-endroll-custombox-callback.php: ' . TAENDROLLCUSTOMBOXCALLBACK_PHP_VER; ?></p>
            <p><?php echo 'ta-exp-custombox-callback.php: ' . TAEXPCUSTOMBOXCALLBACK_PHP_VER; ?></p>
            <p><?php echo 'ta-footer-custombox-callback.php: ' . TAFOOTERCUSTOMBOXCALLBACK_PHP_VER; ?></p>
            <p><?php echo 'ta-header-custombox-callback.php: ' . TAHEADERCUSTOMBOXCALLBACK_PHP_VER; ?></p>
            <p><?php echo 'ta-sidesub-custombox-callback.php: ' . TASIDESUBCUSTOMBOXCALLBACK_PHP_VER; ?></p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>プラグインTA-THEME001-HIGHEND（汎用）</h4>
            <p><?php echo 'ta-theme001-highend-css.php: ' . TATHEME001HIGHEND_CSS_PHP_VER; ?></p>
            <p><?php echo 'ta-theme001-highend-custombox.php: ' . TATHEME001HIGHEND_CUSTOMBOX_PHP_VER; ?></p>
            <p><?php echo 'ta-theme001-highend-freejs.php: ' . TATHEME001HIGHEND_FREEJS_PHP_VER; ?></p>
            <p><?php echo 'ta-theme001-highend-init.php: ' . TATHEME001HIGHEND_INIT_PHP_VER; ?></p>
            <p><?php echo 'ta-theme001-highend-savepost.php: ' . TATHEME001HIGHEND_SAVEPOST_PHP_VER; ?></p>
            <p><?php echo 'ta-theme001-highend-template.php: ' . TATHEME001HIGHEND_TEMPLATE_PHP_VER; ?></p>
            <p><?php echo 'ta-theme001-highend-update.php: ' . TATHEME001HIGHEND_UPDATE_PHP_VER; ?></p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>プラグインTA-THEME001-HIGHEND（設定値入力）</h4>
            <p><?php echo 'ta-theme001-highend-common-setting.php: ' . TATHEME001HIGHEND_COMMONSETTING_PHP_VER; ?></p>
            <p><?php echo 'ta-theme001-highend-footer-setting.php: ' . TATHEME001HIGHEND_FOOTERSETTING_PHP_VER; ?></p>
            <p><?php echo 'ta-theme001-highend-header-setting.php: ' . TATHEME001HIGHEND_HEADERSETTING_PHP_VER; ?></p>
            <p><?php echo 'ta-theme001-highend-main-setting.php: ' . TATHEME001HIGHEND_MAINSETTING_PHP_VER; ?></p>
            <p><?php echo 'ta-theme001-highend-responsible-setting.php: ' . TATHEME001HIGHEND_RESPONSIBLESETTING_PHP_VER; ?></p>
            <p><?php echo 'ta-theme001-highend-short-setting.php: ' . TATHEME001HIGHEND_SHORTSETTING_PHP_VER; ?></p>
            <p><?php echo 'ta-theme001-highend-sidebar-setting.php: ' . TATHEME001HIGHEND_SIDEBARSETTING_PHP_VER; ?></p>
            <p><?php echo 'ta-theme001-highend-sidebarsub-setting.php: ' . TATHEME001HIGHEND_SIDEBARSUBSETTING_PHP_VER; ?></p>
            <p><?php echo 'ta-theme001-highend-tools-setting.php: ' . TATHEME001HIGHEND_TOOLSSETTING_PHP_VER; ?></p>
            <p><?php echo 'ta-theme001-highend-top-setting.php: ' . TATHEME001HIGHEND_TOPSETTING_PHP_VER; ?></p>
<?php
  }
} ?>
            <span class="fixed-space"></span>
          </div><!-- end of #ta_common_version_disp -->
        </td>
      <tr>
      <!-- お使いの環境情報 -->
      <tr>
        <th id="ta_common_server_title" class="big-title"><a href="JavaScript:void(0);">お使いの環境情報</a><?php ta_man2_gd( 'common/system#server' ); ?></th>
        <td>
          <div id="ta_common_server_disp" class="init-nodisp">
            <h4>ホストサーバー情報</h4>
            <?php echo 'OS名： ' . php_uname('s'); ?>
            <span class="fixed-space"></span>
            <hr class="related-border">
            <?php echo 'ホスト名： ' . php_uname('n'); ?>
            <span class="fixed-space"></span>
            <hr class="related-border">
            <?php echo 'ホストIPアドレス： ' . gethostbyname(php_uname('n')); ?>
            <span class="fixed-space"></span>
            <hr class="related-border">
            <?php echo 'リリース名： ' . php_uname('r'); ?>
            <span class="fixed-space"></span>
            <hr class="related-border">
            <?php echo 'バージョン： ' . php_uname('v'); ?>
            <span class="fixed-space"></span>
            <hr class="related-border">
            <?php echo 'マシン型： ' . php_uname('m'); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>PHP情報</h4>
            <?php echo 'Version： ' . phpversion(); ?>
            <p>※ TAテーマ001はZipArchiveクラスを使用している箇所（設定ソースファイル管理機能）があります。
            <br>安定した動作をさせるためにZipArchiveクラスを標準で持つPHP Version 5.2以降が最低でも必要です。（推奨はPHP Version 5.6 以降です）</p>
            <p>※ TAテーマ001はPHP Version 7シリーズに対応しています。</p>
            <span class="fixed-space"></span>
            <hr class="related-border">
            <?php echo 'max_execution_time = ' . ini_get('max_execution_time'); ?>
            <p>※ 無限ループなどを引き起こしているPHPスクリプトが強制終了されるまでの時間です。（秒単位）
            <br>非力なサーバーでは比較的重い処理でも作用する場合があります。
            <br>php.ini等で設定できますが、サーバー管理者に依頼することをおすすめします。</p>
            <span class="fixed-space"></span>
            <hr class="related-border">
            <?php echo 'memory_limit = ' . ini_get('memory_limit'); ?>
            <p>※ PHPプログラムが使用できる最大のメモリ容量です。（バイト単位）
            <br>php.ini等で設定できますが、サーバー管理者に依頼することをおすすめします。</p>
            <span class="fixed-space"></span>
            <hr class="related-border">
            <?php echo 'post_max_size = ' . ini_get('post_max_size'); ?>
            <p>※ POSTデータの許容最大サイズです。（バイト単位）
            <br>php.ini等で設定できますが、サーバー管理者に依頼することをおすすめします。</p>
            <span class="fixed-space"></span>
            <hr class="related-border">
            <?php echo 'upload_max_filesize = ' . ini_get('upload_max_filesize'); ?>
            <p>※ アップロードファイルの許容最大サイズです。（バイト単位）
            <br>php.ini等で設定できますが、サーバー管理者に依頼することをおすすめします。</p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>WordPressバージョン情報</h4>
            <p>Version： <?php bloginfo('version'); ?></p>
            <p>※ TAテーマ001はWordPress Version 4.4 以降をお使いください。</p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>現在使用のブラウザ情報</h4>
            <p><?php echo $_SERVER['HTTP_USER_AGENT']; ?></p>
            <p>※ TAテーマ001の設定ではIE10以上、または最新バージョンのChrome、Firefoxなどの使用をおすすめします。</p>
            <span class="fixed-space"></span>
          </div><!-- end of #ta_common_server_disp -->
        </td>
      <tr>
    </table>
  </div><!-- end of #ta-common-tab-system -->
  <?php } ?>
</div>
<?php
ta_progress_disp();
ta_info_disp(); ?>
