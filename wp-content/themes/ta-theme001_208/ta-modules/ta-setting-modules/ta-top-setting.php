<?php
/*******************************************************************************************************/
/*
/* テックエイドの成長する自作ホームページWordPressテーマ『 TAテーマ001 (ta-theme001) 』
/*
/* ta-top-setting.php: ( Latest Version 2.04 2017.04.12 )
/*
/* このプログラムの著作権、使用権、その他全ての権利はde集まれ株式会社に属します。
/* The copyright, royalty and all the other rights of this program belong to deatsumare Corporation.
/*
/* File Version 履歴
/* File Version 2.00 2016.03.05: first edition by Kotaro Kashiwamura.
/* File Version 2.01 2016.03.07: 最新投稿ダイジェスト位置、ウィジェット位置変更 by Kotaro Kashiwamura.
/* File Version 2.02 2016.08.29: h1追記表記、トップキャッチテキスト装飾追加 by Kotaro Kashiwamura.
/* File Version 2.03 2017.03.10: 色選択修正、体裁調整、ajax化 by Kotaro Kashiwamura.
/* File Version 2.04 2017.04.12: 体裁調整 by Kotaro Kashiwamura.
/*
/*******************************************************************************************************/
if ( TA_HIEND_PI ) { require_once( TA_HIEND_PI_DIR . '/setting-modules/ta-theme001-highend-top-setting.php' ); } ?>
<div id="ta-setting-form">
  <!-- タイトルとタブ -->
  <div id="ta-menu-group">
    <div id="ta-menu-title-container">
      <h2 id="ta-menu-title">TAテーマ001・トップページ設定メニュー</h2>
      <?php ta_ver_display(); ?>
    </div>
    <a id="ta-menu-talink-anc" href="http://theme001.tec-aid.com/" target="_blank"><div id="ta-menu-talink"></div></a>
  </div>
<?php
ta_development_disp();
ta_setting_scroll();
ta_setting_message_disp();
$ta_tabs = array( 'frame' => 'フレームタイプ・閲覧制限', 'exparea' => '説明エリア', 'topcatch' => 'トップキャッチ', 'freearea' => 'フリーエリア', 'latestposts' => '最新投稿ダイジェスト', 'postdigest' => '各種投稿ダイジェスト', 'widget' => 'ウィジェット', 'seosmo' => 'SEO・SMO', 'etc' => 'その他', );
$ta_tabs = apply_filters( 'ta_top_settting_page_tab', $ta_tabs ); //フィルターフック'ta_top_settting_page_tab'を設置
$valid_tab = ta_tab_lists( $ta_tabs );  //タブの設置と有効タブの検出 ?>
  
  
  <?php if ( 'frame' == $valid_tab ) { ?>
  <!-- フレームタイプ・閲覧制限 -->
  <div class="table" id="ta-top-tab-frame">
    <?php ta_setting_form_start( 'top', 'frame' ); ?>
    <table class="ta-setting-table">
      <!-- フレームタイプ -->
      <tr>
        <th id="ta_top_frame_type_title" class="big-title"><a href="JavaScript:void(0);">フレームタイプ</a><?php ta_man2_gd( 'top/frame#frame_type' ); ?></th>
        <td>
          <div id="ta_top_frame_type_disp" class="init-nodisp">
<?php
ta_frametype_selection_process( 'ta_top_frame_type', 'option' );
$ta_common_frame_type = ta_read_op( 'ta_common_frame_type' );
$ta_top_frame_type = ta_read_op( 'ta_top_frame_type' );
if ( 'common_style' == $ta_top_frame_type ) {
  $ta_frame_type_formain = $ta_common_frame_type;
} else {
  $ta_frame_type_formain = $ta_top_frame_type;
}
$ta_common_sidebar_width = ta_read_op( 'ta_common_sidebar_width' );
$ta_common_sidebarsub_width = ta_read_op( 'ta_common_sidebarsub_width' );
$ta_common_mainright_margin = ta_read_op( 'ta_common_mainright_margin' );
$ta_common_mainleft_margin = ta_read_op( 'ta_common_mainleft_margin' );
switch ( $ta_frame_type_formain ) {
  case 'main_sidebar':
    $ta_top_main_width = 100 - $ta_common_sidebar_width - $ta_common_mainright_margin;
    break;
  case 'sidebar_main':
    $ta_top_main_width = 100 - $ta_common_sidebar_width - $ta_common_mainleft_margin;
    break;
  case 'main_only':
    $ta_top_main_width = 100;
    break;
  case 'sidebarsub_main_sidebar':
    $ta_top_main_width = 100 - $ta_common_sidebar_width - $ta_common_sidebarsub_width - $ta_common_mainleft_margin - $ta_common_mainright_margin;
    break;
} ?>
            <input type="hidden" id="ta_top_main_width" name="ta_top_main_width" value="<?php echo $ta_top_main_width; ?>" />
            <span class="fixed-space"></span>
          </div><!-- end of #ta_top_frame_type_disp -->
        </td>
      </tr>
      <!-- トップページの閲覧制限 -->
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_top_view_limit_setting();
} else { ?>
      <tr>
        <th class="no-ta-thm001highend">トップページ閲覧制限<?php ta_man2_gd( 'top/frame#view_limit' ); ?></th>
        <td></td>
      </tr>
<?php
} ?>
    </table>
    <?php ta_setting_form_end( 'top', 'トップページ『フレームタイプ・閲覧制限』設定更新', 'frame' ); ?>
  </div><!-- end of #ta-top-tab-frame -->
  <?php } ?>
  
  
  <?php if ( 'exparea' == $valid_tab ) { ?>
  <!-- 説明エリア -->
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_exp_freearea_setting();
} else { ?>
  <div class="table" id="ta-top-tab-exparea">
    <table class="ta-setting-table">
      <!-- 説明エリア -->
      <tr>
        <th class="no-ta-thm001highend">トップページ説明エリア<?php ta_man2_gd( 'top/exp_fa' ); ?><br>（TA説明エリア）</th>
        <td></td>
      </tr>
    </table>
  </div><!-- end of #ta-top-tab-exparea -->
<?php
} ?>
  <?php } ?>
  
  
  <?php if ( 'topcatch' == $valid_tab ) { ?>
  <!-- トップキャッチエリア -->
  <div class="table" id="ta-top-tab-topcatch">
    <?php ta_setting_form_start( 'top', 'topcatch' ); ?>
    <table class="ta-setting-table">
      <!-- トップキャッチエリア -->
      <tr>
        <th id="ta_top_topcatch_commonsetting_title" class="big-title"><a href="JavaScript:void(0);">トップキャッチエリア<br>共通設定</a><?php ta_man2_gd( 'top/topcatch#common' ); ?></th>
        <td>
          <div id="ta_top_topcatch_commonsetting_disp" class="init-nodisp">
            <table class="ta-3contents-table">
              <tr>
                <td>
                  <h4>トップキャッチの個数</h4>
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_top_topcatch_setting();
} else { 
  $ta_top_topcatch_num = ta_read_op( 'ta_top_topcatch_num' );
  if ( $ta_top_topcatch_num > 3 ) { $ta_top_topcatch_num = 3; } ?>
                  <p><input type="radio" name="ta_top_topcatch_num" value=0 <?php if ( 0 == $ta_top_topcatch_num ) echo 'checked="checked"'; ?>> 表示しない</p>
                  <p><input type="radio" name="ta_top_topcatch_num" value=1 <?php if ( 1 == $ta_top_topcatch_num ) echo 'checked="checked"'; ?>> 1個</p>
                  <p><input type="radio" name="ta_top_topcatch_num" value=2 <?php if ( 2 == $ta_top_topcatch_num ) echo 'checked="checked"'; ?>> 2個</p>
                  <p><input type="radio" name="ta_top_topcatch_num" value=3 <?php if ( 3 == $ta_top_topcatch_num ) echo 'checked="checked"'; ?>> 3個</p>
                  <p><span style="color:#bbbbbb" class="no-ta-thm001highend-yoko">4個以上:</span></p>
<?php
} ?>
                </td>
                <td>
                  <h4>トップキャッチ間の余白</h4>
                  <?php ta_simple_input( 'ta_top_topcatch_space', '％', 'short_box' ); ?>
                </td>
                <td>
                  <h4>リンク新規ウィンドウ</h4>
                  <?php ta_alternative_input_checkbox( 'ta_top_topcatch_link_newwin_onoff', '新規ウィンドウで開く' ); ?>
                  <p>※ リンク時に新規ウィンドウで開きます</p>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <?php ta_main_top_margin_setting( 'ta_top_topcatch' ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <table class="ta-fullcontents-table">
              <tr>
                <td style="width:20em;">
                  <h4>トップキャッチ枠のタイトル</h4>
                  <?php ta_alternative_input_checkbox( 'ta_top_topcatch_frame_title_onoff', '使用する' ); ?>
                </td>
                <td style="width:20em;">
                  <h4>トップキャッチ枠のタイトル要素名</h4>
                  <?php ta_factor_selection_process( 'ta_top_topcatch_frame_title_factor', 'option', 0, 'none', 'メイン' ); ?>
                </td>
                <td>
                  <h4 class="ta-html-strip">トップキャッチ枠タイトル名</h4>
                  <?php ta_text_input( 'ta_top_topcatch_frame_title', 'middle_box' ); ?>
                </td>
              <tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <table class="ta-3contents-table">
              <tr>
                <td>
                  <h4>トップキャッチ個別のタイトル</h4>
                  <p>※ トップキャッチ個別のタイトルの
                  <br>オンオフは個別設定内で行います</p>
                </td>
                <td>
                  <h4>トップキャッチ個別のタイトル要素名</h4>
                  <?php ta_factor_selection_process( 'ta_top_topcatch_title_factor', 'option', 0, 'none', 'メイン' ); ?>
                </td>
                <td>
                  <h4>トップキャッチ個別のタイトル名</h4>
                  <p>※ トップキャッチ個別のタイトル名の
                  <br>入力は個別設定内で行います</p>
                </td>
              <tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <!-- 詳細設定 -->
            <h4 id="ta_top_topcatch_common_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
            <div id="ta_top_topcatch_common_disp" class="pro-disp init-nodisp">
              <h4 class="ta-html-strip">トップキャッチリンク誘導名</h4>
              <?php ta_text_input( 'ta_top_topcatch_continue_text', 'middle_box' ); ?>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>トップキャッチテキスト装飾</h4>
              <?php ta_alternative_input_checkbox( 'ta_top_topcatch_text_onlyfor_onoff', 'トップキャッチ専用を使用する' ); ?>
              <span class="fixed-space"></span>
              <hr class="related-border">
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>トップキャッチ専用のテキストサイズ</h4>
                    <?php ta_simple_input( 'ta_top_topcatch_text_size', '％', 'short_box' ); ?>
                  </td>
                  <td>
                    <h4>トップキャッチ専用のテキスト太さ</h4>
                    <?php ta_fontweight_selection( 'ta_top_topcatch_text_weight' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="related-border">
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>トップキャッチ専用のテキスト色</h4>
                    <?php ta_color_picker_no_tomei_process( 'ta_top_topcatch_text_color', 'valid' ); ?>
                  </td>
                  <td>
                    <h4>トップキャッチ専用のテキスト高さ</h4>
                    <?php ta_simple_input( 'ta_top_topcatch_text_p_lineheight', 'em', 'short_box' ); ?>
                  </td>
                <tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="related-border">
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>トップキャッチ専用のテキスト上マージン</h4>
                    <?php ta_simple_input( 'ta_top_topcatch_text_p_topmargin', 'em', 'short_box' ); ?>
                  </td>
                  <td>
                    <h4>トップキャッチ専用のテキスト下マージン</h4>
                    <?php ta_simple_input( 'ta_top_topcatch_text_p_bottommargin', 'em', 'short_box' ); ?>
                  </td>
                <tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="related-border">
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>トップキャッチ専用のテキスト左マージン</h4>
                    <?php ta_simple_input( 'ta_top_topcatch_text_p_leftmargin', 'em', 'short_box' ); ?>
                  </td>
                  <td>
                    <h4>トップキャッチ専用のテキスト右マージン</h4>
                    <?php ta_simple_input( 'ta_top_topcatch_text_p_rightmargin', 'em', 'short_box' ); ?>
                  </td>
                <tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="related-border">
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>トップキャッチ専用のリンク誘導サイズ</h4>
                    <?php ta_simple_input( 'ta_top_topcatch_continue_text_size', '％', 'short_box' ); ?>
                  </td>
                  <td>
                    <h4>トップキャッチ専用のリンク誘導太さ</h4>
                    <?php ta_fontweight_selection( 'ta_top_topcatch_continue_text_weight' ); ?>
                  </td>
                <tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="related-border">
              <?php ta_linkedtext_setting( 
                      'トップキャッチ専用のリンク誘導',
                      'ta_top_topcatch_continue_text_anchor_color', 'invalid',
                      'ta_top_topcatch_continue_text_anchor_under',
                      'ta_top_topcatch_continue_text_anchor_colorhover', 'invalid',
                      'ta_top_topcatch_continue_text_anchor_underhover' ); ?>
            </div><!-- end of #ta_top_topcatch_common_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_top_topcatch_commonsetting_disp -->
        </td>
      </tr>
      <?php
      if ( TA_HIEND_PI ) {
        for ( $i = 0; $i < 6; $i++ ) { ?>
      <tr>
        <!-- トップキャッチ#<?php echo $i + 1; ?> -->
        <th id="ta_top_topcatch<?php echo $i + 1; ?>_pro_title" class="big-title"><a href="JavaScript:void(0);">トップキャッチ#<?php echo $i + 1; ?></a><?php ta_man2_gd( 'top/topcatch#contents' ); ?></th>
        <td>
          <div id="ta_top_topcatch<?php echo $i + 1; ?>_pro_disp" class="init-nodisp">
            <table class="ta-fullcontents-table">
              <tr>
                <td style="width:20em;">
                  <h4>トップキャッチタイトル</h4>
                  <?php ta_alternative_input_checkbox( 'ta_top_topcatch_title_onoff' . ( $i + 1 ), '使用する' ); ?>
                </td>
                <td>
                  <h4 class="ta-html-strip">トップキャッチ#<?php echo $i + 1; ?>タイトル名</h4>
                  <?php ta_text_input( 'ta_top_topcatch_title' . ( $i + 1 ), 'middle_box' ); ?>
                </td>
              <tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>トップキャッチ#<?php echo $i + 1; ?>画像</h4>
            <?php ta_img_upload_process( 'ta_top_topcatch_pic' . ( $i + 1 ) ); ?>
            <p>※ 縦横幅の最大値を500ピクセルに制限しています</p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4 class="ta-html-strip">トップキャッチ#<?php echo $i + 1; ?>テキスト</h4>
            <?php $init_value = ta_read_op( 'ta_top_topcatch_text' . ( $i + 1 ) ); ?>
            <p><textarea id="ta_top_topcatch_text<?php echo $i + 1; ?>" name="ta_top_topcatch_text<?php echo $i + 1; ?>" rows="5" cols="67"><?php ta_deleteyen( $init_value ); ?></textarea>
            <p><a href="JavaScript:void(0);" onClick="ta_no_disp('#ta_top_topcatch_text<?php echo $i + 1; ?>');" >テキストを非表示にする</a></p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>トップキャッチ#<?php echo $i + 1; ?>のリンク</h4>
            <?php ta_link_process( 'ta_top_topcatch_link' . ( $i + 1 ) ); ?>
            <span class="fixed-space"></span>
            <span class="fixed-space"></span>
          </div><!-- end of #ta_top_topcatch<?php echo $i + 1; ?>_pro_disp -->
        </td>
      </tr>
      <?php
        }
      } else {
        for ( $i = 0; $i < 3; $i++ ) { ?>
      <tr>
        <!-- トップキャッチ#<?php echo $i + 1; ?> -->
        <th id="ta_top_topcatch<?php echo $i + 1; ?>_pro_title" class="big-title"><a href="JavaScript:void(0);">トップキャッチ#<?php echo $i + 1; ?></a><?php ta_man2_gd( 'top/topcatch#contents' ); ?></th>
        <td>
          <div id="ta_top_topcatch<?php echo $i + 1; ?>_pro_disp" class="init-nodisp">
            <table class="ta-fullcontents-table">
              <tr>
                <td style="width:20em;">
                  <h4>トップキャッチタイトル</h4>
                  <?php ta_alternative_input_checkbox( 'ta_top_topcatch_title_onoff' . ( $i + 1 ), '使用する' ); ?>
                </td>
                <td>
                  <h4 class="ta-html-strip">トップキャッチ#<?php echo $i + 1; ?>タイトル名</h4>
                  <?php ta_text_input( 'ta_top_topcatch_title' . ( $i + 1 ), 'middle_box' ); ?>
                </td>
              <tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>トップキャッチ#<?php echo $i + 1; ?>画像</h4>
            <?php ta_img_upload_process( 'ta_top_topcatch_pic' . ( $i + 1 ) ); ?>
            <p>※ 縦横幅の最大値を500ピクセルに制限しています</p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4 class="ta-html-strip">トップキャッチ#<?php echo $i + 1; ?>テキスト</h4>
            <?php $init_value = ta_read_op( 'ta_top_topcatch_text' . ( $i + 1 ) ); ?>
            <p><textarea id="ta_top_topcatch_text<?php echo $i + 1; ?>" name="ta_top_topcatch_text<?php echo $i + 1; ?>" rows="5" cols="67"><?php ta_deleteyen( $init_value ); ?></textarea>
            <p><a href="JavaScript:void(0);" onClick="ta_no_disp('#ta_top_topcatch_text<?php echo $i + 1; ?>');" >テキストを非表示にする</a></p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>トップキャッチ#<?php echo $i + 1; ?>のリンク</h4>
            <?php ta_link_process( 'ta_top_topcatch_link' . ( $i + 1 ) ); ?>
            <span class="fixed-space"></span>
            <span class="fixed-space"></span>
          </div><!-- end of #ta_top_topcatch<?php echo $i + 1; ?>_pro_disp -->
        </td>
      </tr>
      <?php
        }
        for ( $i = 3; $i < 6; $i++ ) { ?>
      <tr>
        <!-- トップキャッチ#<?php echo $i + 1; ?> -->
        <th style="color:#bbbbbb" class="no-ta-thm001highend" id="ta_top_topcatch<?php echo $i + 1; ?>_pro_title">トップキャッチ#<?php echo $i + 1; ?><?php ta_man2_gd( 'top/topcatch#contents' ); ?></th>
        <td></td>
      </tr>
      <?php
        }
      } ?>
    </table>
    <?php ta_setting_form_end( 'top', 'トップページ『トップキャッチエリア』設定更新', 'topcatch' ); ?>
  </div><!-- end of #ta-top-tab-topcatch -->
  <?php } ?>
  
  
  <?php if ( 'freearea' == $valid_tab ) { ?>
  <!-- フリーエリア -->
  <div class="table" id="ta-top-tab-freearea">
    <?php ta_setting_form_start( 'top', 'freearea' ); ?>
    <table class="ta-setting-table">
      <!-- トップページフリーエリア -->
      <tr>
        <th>トップページフリーエリア<?php ta_man2_gd( 'top/top_fa' ); ?><br>（TAトップFA）</th>
        <td>
          <h4>トップページフリーエリア</h4>
          <?php ta_alternative_input_checkbox( 'ta_top_freearea_onoff', '使用する' ); ?>
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <!-- 詳細設定 -->
          <h4 id="ta_top_freearea_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
          <div id="ta_top_freearea_pro_disp" class="pro-disp init-nodisp">
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <h4>トップページフリーエリア<br>タイトル表示共通設定</h4>
                  <?php ta_alternative_input_checkbox( 'ta_top_freearea_title_onoff', '表示する' ); ?>
                </td>
                <td>
                  <h4>トップページフリーエリア<br>タイトル要素名共通設定</h4>
                  <?php ta_factor_selection_process( 'ta_top_freearea_title_factor', 'option', 0, 'none', 'メイン' ); ?>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>トップページフリーエリア投稿コンテンツ（TAトップFA）の表示順</h4>
            <?php $init_value = ta_read_op( 'ta_top_freearea_display_order' ); ?>
            <p><input type="radio" name="ta_top_freearea_display_order" value="DESC" <?php if ( "DESC" == $init_value ) echo 'checked="checked"'; ?>> 順序番号の降順（大から小）</p>
            <p><input type="radio" name="ta_top_freearea_display_order" value="ASC" <?php if ( "ASC" == $init_value ) echo 'checked="checked"'; ?>> 順序番号の昇順（小から大）</p>
            <p>※ ステータスが“公開済み”のコンテンツが対象です</p>
          </div><!-- end of #ta_top_freearea_pro_disp -->
          <span class="fixed-space"></span>
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'top', 'トップページ『フリーエリア』設定更新', 'freearea' ); ?>
  </div><!-- end of #ta-top-tab-freearea -->
  <?php } ?>
  
  
  <?php if ( 'latestposts' == $valid_tab ) { ?>
  <!-- 最新投稿ダイジェスト -->
  <div class="table" id="ta-top-tab-latestposts">
    <?php ta_setting_form_start( 'top', 'latestposts' ); ?>
    <table class="ta-setting-table">
      <!-- 最新投稿ダイジェスト -->
      <tr>
        <th>最新投稿ダイジェスト<?php ta_man2_gd( 'top/latestposts' ); ?><br>（全ての投稿が対象）</th>
        <td>
          <div class="ta-setting-inline-gp">
            <div class="inline-gp-7_0em">
              <h4>最新投稿ダイジェスト定位置表示</h4>
              <div class="digest_steady_onoff_cover">
                <?php ta_alternative_input_checkbox( 'ta_top_latestposts_onoff', '定位置表示を使用する' ); ?>
              </div>
            </div>
<?php
if ( TA_HIEND_PI ) { ?>
            <div id="ta_top_latestposts_shortcode" class="inline-gp-0">
              <h4>最新投稿ダイジェストショートコード</h4>
              <p>以下のショートコードをTA説明エリア、TAトップFAに張り付けることができます</p>
              <p><input readonly value='[ta_latestposts_disp]' onclick="this.select(0,this.value.length)" style="width:12em;"/></p>
              <p style="color:#ff0000;">※ 指定の場所以外ではCSSデザインが正しく表示されません</p>
              <p>※ ページャーは使用できません</p>
            </div>
<?php
} else { ?>
            <h4 class="no-ta-thm001highend" style="color:#bbbbbb;margin-top:0;">最新投稿ダイジェストショートコード</h4>
<?php
} ?>
          </div>
<?php
$disp_status = ( 'invalid' == ta_read_op( 'ta_top_latestposts_onoff' ) ) ? 'block': 'none'; ?>
          <style type="text/css">
            #ta_top_latestposts_shortcode { display: <?php echo $disp_status; ?> }
          </style>
          <span class="fixed-space"></span>
          <hr class="fixed-border">
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_top_latestposts_position_setting();
} else { ?>
          <h4 class="no-ta-thm001highend" style="color:#bbbbbb;">最新投稿ダイジェスト定位置表示の位置</h4>
          <p>※ トップページフリーエリアの下に固定</p>
<?php
} ?>
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <?php ta_main_top_margin_setting( 'ta_top_latestposts' ); ?>
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <!-- 詳細設定 -->
          <h4 id="ta_top_latestposts_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
          <div id="ta_top_latestposts_pro_disp" class="pro-disp init-nodisp">
            <?php ta_latestposts_setting_detail( 'top' ); ?>
          </div><!-- end of #ta_top_latestposts_pro_disp -->
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <!-- 記事のデザイン設定 -->
          <h4 id="ta_top_latestposts_article_pro_title" class="pro-title"><a href="JavaScript:void(0);">記事のデザイン設定</a></h4>
          <div id="ta_top_latestposts_article_pro_disp" class="pro-disp init-nodisp">
            <?php ta_article_digest_design( 'top_latestposts' ); ?>
          </div><!-- end of #ta_top_latestposts_article_pro_disp -->
          <span class="fixed-space"></span>
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'top', 'トップページ『最新投稿ダイジェスト』設定更新', 'latestposts' ); ?>
  </div><!-- end of #ta-top-tab-latestposts -->
  <?php } ?>
  
  
  <?php if ( 'postdigest' == $valid_tab ) { ?>
  <!-- 各種投稿ダイジェスト -->
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_top_postdigest_setting();
} else { ?>
  <div class="table" id="ta-top-tab-postdigest">
    <table class="ta-setting-table">
      <!-- 各種投稿ダイジェスト -->
      <tr>
        <th class="no-ta-thm001highend">各種投稿ダイジェスト<?php ta_man2_gd( 'top/postdigest' ); ?></th>
        <td></td>
      </tr>
    </table>
  </div><!-- end of #ta-top-tab-postdigest -->
<?php
} ?>
  <?php } ?>
  
  
  <?php if ( 'widget' == $valid_tab ) { ?>
  <!-- ウィジェット -->
  <div class="table" id="ta-top-tab-widget">
    <?php ta_setting_form_start( 'top', 'widget' ); ?>
    <table class="ta-setting-table">
      <!-- 各種投稿ダイジェスト -->
      <tr>
        <th>トップページウィジェット<?php ta_man2_gd( 'top/widget' ); ?></th>
        <td>
          <h4>ウィジェット</h4>
          <?php ta_alternative_input_checkbox( 'ta_top_widget_onoff', '使用する' ); ?>
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <!-- 詳細設定 -->
          <h4 id="ta_top_widget_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
          <div id="ta_top_widget_pro_disp" class="pro-disp init-nodisp">
            <h4>タイトルの要素名設定</h4>
            <?php ta_factor_selection_process( 'ta_top_widget_title_factor', 'option', 0, 'none', 'メイン' ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
      
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_top_widget_position_setting();
} else { ?>
            <h4 class="no-ta-thm001highend" style="color:#bbbbbb;">ウィジェットの位置</h4>
            <p>※ トップページフリーエリアの下に固定です</p>
<?php
} ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>センタリング</h4>
            <?php ta_alternative_input_checkbox( 'ta_top_widget_centering', 'センタリングする' ); ?>
            <p>※ センタリングできないウィジェットもあります</p>
            <span class="fixed-space"></span>
          </div><!-- end of #ta_top_widget_pro_disp -->
          <span class="fixed-space"></span>
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'top', 'トップページ『ウィジェット』設定更新', 'widget' ); ?>
  </div><!-- end of #ta-top-tab-widget -->
  <?php } ?>
  
  
  <?php if ( 'seosmo' == $valid_tab ) { ?>
  <!-- SEO・SMO -->
  <div class="table" id="ta-top-tab-seosmo">
    <?php ta_setting_form_start( 'top', 'seosmo' ); ?>
    <table class="ta-setting-table">
      <!-- SEO -->
      <tr>
        <th id="ta_top_seo_title" class="big-title"><a href="JavaScript:void(0);">トップページSEO設定</a><?php ta_man2_gd( 'top/seosmo#seo' ); ?></th>
        <td>
          <div id="ta_top_seo_disp" class="init-nodisp">
            <h4 class="ta-html-strip">SEOキーワード</h4>
            <?php ta_text_input( 'ta_top_seo_keywords', 'long_box' ); ?>
            <p>※ コロン","で区切って入力してください。共通キーワードの前に追加されます</p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4 class="ta-html-strip">SEOディスクリプション</h4>
            <?php ta_textarea_input( 'ta_top_seo_description', 5, 67 ); ?>
            <p>※ 120文字以内で入力してください。設定が未入力の場合は共通ディスクリプションが採用されます</p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4 class="ta-html-esc-asisexe">トップページh1表記</h4>
            <?php ta_text_input( 'ta_top_h1_content', 'long_box' ); ?>
            <p>※ 設定しない場合はh1共通表記設定が採用されます</p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>トップページh1表記方法</h4>
            <?php $init_value = ta_read_op( 'ta_top_h1_disp' ); ?>
            <p><input type="radio" name="ta_top_h1_disp" value="top_h1" <?php if ( "top_h1" == $init_value ) echo 'checked="checked"' ?>> トップページh1表記のみ</p>
            <p><input type="radio" name="ta_top_h1_disp" value="top_h1_common_add" <?php if ( "top_h1_common_add" == $init_value ) echo 'checked="checked"' ?>> トップページh1表記 ＋ h1共通追加記述</p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>カノニカルタグ設定</h4>
            <?php ta_text_input( 'ta_top_canonical_domain', 'long_box' ); ?>
            <p>※ 設定しない場合はWordPressに登録されているドメインが採用されます</p>
            <span class="fixed-space"></span>
          </div><!-- end of #ta_top_seo_disp -->
        </td>
      </tr>
      <!-- トップページSNSボタン -->
      <tr>
        <th id="ta_top_smo_sns_position_title" class="big-title"><a href="JavaScript:void(0);">トップページSNSボタン</a><?php ta_man2_gd( 'top/seosmo#sns_button' ); ?></th>
        <td>
          <div id="ta_top_smo_sns_position_disp" class="init-nodisp">
            <h4>トップページメインコンテンツのSNS表記個別設定</h4>
            <?php ta_sns_position_selection( 'ta_top_sns_position' ); ?>
            <span class="fixed-space"></span>
          </div><!-- end of #ta_top_smo_sns_position_disp -->
        </td>
      </tr>
      <!-- トップページOGP -->
      <tr>
        <th id="ta_top_smo_ogp_title" class="big-title"><a href="JavaScript:void(0);">トップページOGP</a><?php ta_man2_gd( 'top/seosmo#ogp' ); ?></th>
        <td>
          <div id="ta_top_smo_ogp_disp" class="init-nodisp">
            <h4>OGPタグ出力設定</h4>
            <?php ta_alternative_input_checkbox( 'ta_top_ogp_onoff', '出力する' ); ?>
            <p>※ トップページのみの設定です</p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <!-- 詳細設定 -->
            <h4 id="ta_top_smo_ogp_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
            <div id="ta_top_smo_ogp_pro_disp" class="pro-disp init-nodisp">
              <h4 class="ta-html-strip">OGPタイトルの設定</h4>
              <?php ta_text_input( 'ta_top_ogp_title', 'long_box' ); ?>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4 class="ta-html-strip">OGPサイト名の設定</h4>
              <?php ta_text_input( 'ta_top_ogp_site_name', 'long_box' ); ?>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4 class="ta-html-strip">OGPディスクリプションの設定</h4>
              <?php ta_text_input( 'ta_top_ogp_description', 'long_box' ); ?>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>OGP画像の設定</h4>
              <?php ta_img_upload_process( 'ta_top_ogp_image' ); ?>
              <p>※ 縦横幅の最大値を500ピクセルに制限しています</p>
              <span class="fixed-space"></span>
            </div><!-- end of #ta_top_smo_ogp_pro_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_top_smo_ogp_disp -->
        </td>
      </tr>
      <!-- トップページTwitter Cards -->
      <tr>
        <th id="ta_top_smo_twittercards_title" class="big-title"><a href="JavaScript:void(0);">トップページTwitter Cards</a><?php ta_man2_gd( 'top/seosmo#twittercards' ); ?></th>
        <td>
          <div id="ta_top_smo_twittercards_disp" class="init-nodisp">
            <h4>Twitter Cardsタグ出力設定</h4>
            <?php ta_alternative_input_checkbox( 'ta_top_twittercards_onoff', '出力する' ); ?>
            <p>※ トップページのみの設定です</p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <!-- 詳細設定 -->
            <h4 id="ta_top_smo_twittercards_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
            <div id="ta_top_smo_twittercards_pro_disp" class="pro-disp init-nodisp">
              <h4 class="ta-html-strip">Twitter Cardsタイトルの設定</h4>
              <?php ta_text_input( 'ta_top_twittercards_title', 'long_box' ); ?>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4 class="ta-html-strip">Twitter Cardsディスクリプションの設定</h4>
              <?php ta_text_input( 'ta_top_twittercards_description', 'long_box' ); ?>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>Twitter Cards画像の設定</h4>
              <?php ta_img_upload_process( 'ta_top_twittercards_image' ); ?>
              <p>※ 縦横幅の最大値を500ピクセルに制限しています</p>
              <span class="fixed-space"></span>
            </div><!-- end of #ta_top_smo_twittercards_pro_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_top_smo_twittercards_disp -->
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'top', 'トップページ『SEO・SMO』設定更新', 'seosmo' ); ?>
  </div><!-- end of #ta-top-tab-seosmo -->
  <?php } ?>
  
  
  <?php if ( 'etc' == $valid_tab ) { ?>
  <!-- その他 -->
  <div class="table" id="ta-top-tab-etc">
    <?php ta_setting_form_start( 'top', 'etc' ); ?>
    <table class="ta-setting-table">
      <!-- サイトマップ掲載 -->
      <tr>
        <th id="ta_top_sitemap_title" class="big-title"><a href="JavaScript:void(0);">サイトマップ掲載</a><?php ta_man2_gd( 'top/etc' ); ?></th>
        <td>
          <div id="ta_top_sitemap_disp" class="init-nodisp">
            <?php ta_alternative_input_checkbox( 'ta_top_sitemap_disp_onoff', 'テックエイドサイトマップの表示から除外する' ); ?>
            <p>※ トップページをサイトマップに載せるか削除するか：通常は掲載します</p>
          </div><!-- end of #ta_top_sitemap_disp -->
        </td>
      </tr>
      <!-- インデックス・フォロー -->
      <tr>
        <th id="ta_top_indexfollow_title" class="big-title"><a href="JavaScript:void(0);">インデックス・フォロー</a><?php ta_man2_gd( 'top/etc' ); ?></th>
        <td>
          <div id="ta_top_indexfollow_disp" class="init-nodisp">
            <span class="fixed-space"></span>
            <?php $init_value = ta_read_op( 'ta_top_indexfollow' ); ?>
            <p><input type="radio" name="ta_top_indexfollow" value="none" <?php if ( "none" == $init_value ) echo 'checked="checked"' ?>> 対象にする</p>
            <p><input type="radio" name="ta_top_indexfollow" value="noindex,follow" <?php if ( "noindex,follow" == $init_value ) echo 'checked="checked"' ?>> 対象にしない（noindex, follow: 推奨）</p>
            <p><input type="radio" name="ta_top_indexfollow" value="noindex,nofollow" <?php if ( "noindex,nofollow" == $init_value ) echo 'checked="checked"' ?>> 対象にしない（noindex, nofollow）</p>
            <p style="width:95%;">※ トップページを検索エンジンの対象にするかどうか：通常は対象にします。（WordPress設定の『表示設定』⇒『検索エンジンでの表示』の設定が優先します）</p>
            <span class="fixed-space"></span>
          </div><!-- end of #ta_top_indexfollow_disp -->
        </td>
      </tr>
      <!-- トップページコンテンツ間隔 -->
      <tr>
        <th id="ta_top_fixed_space_title" class="big-title"><a href="JavaScript:void(0);">トップページコンテンツ間隔</a><?php ta_man2_gd( 'top/etc' ); ?></th>
        <td>
          <span class="fixed-space"></span>
          <div id="ta_top_fixed_space_disp" class="init-nodisp">
            <?php ta_simple_input( 'ta_top_fixed_space', 'ピクセル', 'short_box' ); ?>
          </div><!-- end of #ta_top_fixed_space_disp -->
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'top', 'トップページ『その他』設定更新', 'etc' ); ?>
  </div><!-- end of #ta-top-tab-etc -->
  <?php } ?>
</div>
<?php
ta_progress_disp();
ta_info_disp(); ?>
