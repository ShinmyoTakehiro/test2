<?php
/***********************************************************************************************************************************/
/*
/* テックエイドの成長する自作ホームページWordPressテーマ『 TAテーマ001 (ta-theme001) 』
/*
/* ta-header-setting.php: ( Latest Version 2.04 2017.04.12 )
/*
/* このプログラムの著作権、使用権、その他全ての権利はde集まれ株式会社に属します。
/* The copyright, royalty and all the other rights of this program belong to deatsumare Corporation.
/*
/* File Version 履歴
/* File Version 2.00 2016.03.05: first edition by Kotaro Kashiwamura.
/* File Version 2.01 2016.06.20: ロゴエリア・連絡先エリアのコンテンツ表示方法追加、無効サイズの強調 by Kotaro Kashiwamura.
/* File Version 2.02 2016.08.29: ヘッダーパラグラフ設定追加、h1表記修正、標準フォントにhover表示追加 by Kotaro Kashiwamura.
/* File Version 2.03 2017.03.10: 連絡先エリアの簡易メニュー表記修正、色選択修正、ajax化 by Kotaro Kashiwamura.
/* File Version 2.04 2017.04.12: ヘッダー画像挿入注釈文の誤記修正 by Kotaro Kashiwamura.
/*
/***********************************************************************************************************************************/
if ( TA_HIEND_PI ) { require_once( TA_HIEND_PI_DIR . '/setting-modules/ta-theme001-highend-header-setting.php' ); } ?>
<div id="ta-setting-form">
  <!-- タイトルとタブ -->
  <div id="ta-menu-group">
    <div id="ta-menu-title-container">
      <h2 id="ta-menu-title">TAテーマ001・ヘッダー設定メニュー</h2>
      <?php ta_ver_display(); ?>
    </div>
    <a id="ta-menu-talink-anc" href="http://theme001.tec-aid.com/" target="_blank"><div id="ta-menu-talink"></div></a>
  </div>
<?php
ta_development_disp();
ta_setting_scroll();
ta_setting_message_disp();
$ta_tabs = array( 'frame' => '基本設定', 'font' => 'フォント', 'logoarea' => 'ロゴエリア', 'infoarea' => '連絡先エリア', 'searcharea' => '検索エリア', 'glabalmenu' => 'TAグローバルメニュー', 'headimg' => 'ヘッダー画像', 'freearea' => 'フリーエリア', );
$ta_tabs = apply_filters( 'ta_header_settting_page_tab', $ta_tabs ); //フィルターフック'ta_header_settting_page_tab'を設置
$valid_tab = ta_tab_lists( $ta_tabs );  //タブの設置と有効タブの検出 ?>
  
  
  <?php if ( 'frame' == $valid_tab ) { ?>
  <!-- 基本設定 -->
  <div class="table" id="ta-header-tab-frame">
    <p style="padding-top:1em;">※ バナーエリアは、ヘッダーのロゴエリア・連絡先エリア・検索エリアを指します</p>
    <?php ta_setting_form_start( 'header', 'frame' ); ?>
    <table class="ta-setting-table">
      <!-- ヘッダーの背景色・背景画像 -->
      <tr>
        <?php ta_common_frame_setting( 'ta_header_frame', 'バナーエリア背景色・画像', 'invalid', 'valid' ); ?>
      </tr>
      <!-- ヘッダーバナーエリアタイプ -->
      <tr>
        <th id="ta_header_bannerarea_type_title" class="big-title"><a href="JavaScript:void(0);">バナーエリアのタイプ</a><?php ta_man2_gd( 'header/frame#bannerarea_type' ); ?><br><span id="ta_header_bannerarea_type_title_span" style="color:#ff7f00;">（確認モード実行中です）</span></th>
        <?php if ( 'valid' == ta_read_op( 'ta_header_size_check' ) ) { $css_value = 'inline'; } else { $css_value = 'none'; } ?>
        <style type="text/css"> #ta_header_bannerarea_type_title_span { display: <?php echo $css_value; ?>; } </style>
        <td>
          <div id="ta_header_bannerarea_type_disp" class="init-nodisp">
            <div id="ta_header_bannerarea_type_pro_disp">
              <span class="fixed-space"></span>
              <?php $ta_header_bannerarea_type = ta_read_op( 'ta_header_bannerarea_type' ); ?>
              <p><input type="radio" name="ta_header_bannerarea_type" value="logo_info_search" <?php if ( "logo_info_search" == $ta_header_bannerarea_type ) echo 'checked="checked"'; ?>> ロゴ（左）＋ 連絡先（中央）＋ 検索（右）</p>
              <p><input type="radio" name="ta_header_bannerarea_type" value="logo_info" <?php if ( "logo_info" == $ta_header_bannerarea_type ) echo 'checked="checked"'; ?>> ロゴ（左）＋ 連絡先（右）</p>
              <p><input type="radio" name="ta_header_bannerarea_type" value="logo_search" <?php if ( "logo_search" == $ta_header_bannerarea_type ) echo 'checked="checked"'; ?>> ロゴ（左）＋ 検索（右）</p>
              <p><input type="radio" name="ta_header_bannerarea_type" value="logo_only" <?php if ( "logo_only" == $ta_header_bannerarea_type ) echo 'checked="checked"'; ?>> ロゴのみ</p>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>ヘッダーバナーエリアタイプの確認</h4>
              <?php ta_alternative_input_checkbox( 'ta_header_size_check', '確認モードにする' ); ?>
              <p>※ 簡易メニューの左右詰め表示等は反映されません：実表示でご確認ください</p>
              <span class="fixed-space"></span>
            </div><!-- end of #ta_header_bannerarea_type_pro_disp -->
          </div><!-- end of #ta_header_bannerarea_type_disp -->
        </td>
      </tr>
      <!-- ヘッダーバナーエリアのサイズ -->
      <tr>
        <th id="ta_header_height_title" class="big-title"><a href="JavaScript:void(0);">バナーエリアのサイズ</a><?php ta_man2_gd( 'header/frame#bannerarea_size' ); ?></th>
        <td>
          <div id="ta_header_frame_err_hdbn_over" style="display:none;">
            <div class="error">
              <ul>
                <li><span class="ta-err-message">ヘッダーバナーエリアサイズエラー:</span>設定幅の合計値が100%を超えています。（このエラーメッセージは5秒後に消えます）</li>
              </ul>
            </div>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
          </div>
          <div id="ta_header_frame_err_hdbn_det" style="display:none;">
            <div class="error">
              <ul>
                <li><span class="ta-err-message">ヘッダーバナーエリアサイズエラー:</span>予期しないエラーです。サーバー管理者にご相談ください。（このエラーメッセージは5秒後に消えます）</li>
              </ul>
            </div>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
          </div>
          <div id="ta_header_height_disp" class="init-nodisp">
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <h4>ヘッダーバナーエリアの高さ</h4>
                  <?php ta_simple_input( 'ta_header_height', 'ピクセル', 'short_box' ); ?>
                </td>
                <td>
                  <h4>ヘッダーバナーエリアの下側余白</h4>
                  <?php ta_simple_input( 'ta_header_marginbottom', 'ピクセル', 'short_box' ); ?>
                </td>
              <tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <table class="ta-3contents-table">
              <tr>
                <td>
                  <h4>ロゴエリア左余白</h4>
                  <?php ta_simple_input( 'ta_header_logo_left_padding', '％', 'short_box' ); ?>
                </td>
                <td>
                  <h4>ロゴエリア幅</h4>
                  <?php ta_simple_input( 'ta_header_logo_width', '％', 'short_box' ); ?>
                </td>
                <td>
                  <h4>ロゴエリア右余白</h4>
                  <?php ta_simple_input( 'ta_header_logo_right_padding', '％', 'short_box' ); ?>
                </td>
              <tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <table class="ta-2contents-table">
              <tr>
                <td>
<?php
if ( 'logo_search' == $ta_header_bannerarea_type || 'logo_only' == $ta_header_bannerarea_type ) { ?>
                  <h4 style="color:#bbbbbb;">連絡先エリア幅</h4>
                  <span class="ta_header_info_width_cover"><?php ta_simple_input( 'ta_header_info_width', '％', 'short_box' ); ?></span>
                </td>
                <td>
                  <h4 style="color:#bbbbbb;">連絡先エリア右余白</h4>
                  <span class="ta_header_info_right_padding_cover"><?php ta_simple_input( 'ta_header_info_right_padding', '％', 'short_box' ); ?></span>
                </td>
              <tr>
            </table>
            <style type="text/css">
              #ta_header_info_width,
              #ta_header_info_right_padding,
                .ta_header_info_width_cover,
                .ta_header_info_right_padding_cover {
                  color: #bbbbbb;
              }
            </style>
<?php
} else { ?>
                  <h4>連絡先エリア幅</h4>
                  <?php ta_simple_input( 'ta_header_info_width', '％', 'short_box' ); ?>
                </td>
                <td>
                  <h4>連絡先エリア右余白</h4>
                  <?php ta_simple_input( 'ta_header_info_right_padding', '％', 'short_box' ); ?>
                </td>
              <tr>
            </table>
<?php
} ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <table class="ta-2contents-table">
              <tr>
                <td>
<?php
if ( 'logo_info' == $ta_header_bannerarea_type || 'logo_only' == $ta_header_bannerarea_type ) { ?>
                  <h4 style="color:#bbbbbb;">検索エリア幅</h4>
                  <span class="ta_header_search_width_cover"><?php ta_simple_input( 'ta_header_search_width', '％', 'short_box' ); ?></span>
                </td>
                <td>
                  <h4 style="color:#bbbbbb;">検索エリア右余白</h4>
                  <span class="ta_header_search_right_padding_cover"><?php ta_simple_input( 'ta_header_search_right_padding', '％', 'short_box' ); ?></span>
                </td>
              <tr>
            </table>
            <style type="text/css">
              #ta_header_search_width,
              #ta_header_search_right_padding,
                .ta_header_search_width_cover,
                .ta_header_search_right_padding_cover {
                  color: #bbbbbb;
              }
            </style>
<?php
} else { ?>
                  <h4>検索エリア幅</h4>
                  <?php ta_simple_input( 'ta_header_search_width', '％', 'short_box' ); ?>
                </td>
                <td>
                  <h4>検索エリア右余白</h4>
                  <?php ta_simple_input( 'ta_header_search_right_padding', '％', 'short_box' ); ?>
                </td>
              <tr>
            </table>
<?php
} ?>
            <span class="fixed-space"></span>
          </div><!-- end of #ta_header_height_disp -->
        </td>
      <tr>
      <!-- ヘッダーバナーエリアの位置（フレーム外への移動）-->
      <tr>
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_bannerarea2wrap_setting();
} else { ?>
        <th class="no-ta-thm001highend">バナーエリアの位置<?php ta_man2_gd( 'header/frame#bannerarea_pos' ); ?></th>
        <td></td>
<?php
} ?>
      </tr>
      <!-- グローバルメニューとヘッダー画像の位置（メイン枠への移動）-->
      <tr>
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_glblnv_img_2main_setting();
} else { ?>
        <th class="no-ta-thm001highend">グローバルメニューと<br>ヘッダー画像の位置<?php ta_man2_gd( 'header/frame#glblnv_img_pos' ); ?></th>
        <td></td>
<?php
} ?>
      </tr>
    </table>
    <?php ta_setting_form_end( 'header', 'ヘッダー『基本設定』設定更新', 'frame' ); ?>
  </div><!-- end of #ta-header-tab-frame -->
  <?php } ?>
  
  
  <?php if ( 'font' == $valid_tab ) { ?>
  <!-- フォント -->
  <div class="table" id="ta-header-tab-font">
    <?php ta_setting_form_start( 'header', 'font' ); ?>
    <table class="ta-setting-table">
      <!-- ヘッダー標準フォント -->
      <tr>
        <?php ta_common_font_setting( 'ta_header_font', 'ヘッダーフリーエリア<br>', 'pulldown', 'anchor' ); ?>
      <tr>
      <!-- ヘッダーパラグラフ設定 -->
      <tr>
        <th id="ta_header_paragraph_design_title" class="big-title"><a href="JavaScript:void(0);">ヘッダーフリーエリア<br>パラグラフデザイン</a><?php ta_man2_gd( 'header/font#paragraph' ); ?></th>
        <td>
          <div id="ta_header_paragraph_design_disp" class="init-nodisp">
            <?php ta_paragraph_setting( 'ta_header_font', 'ヘッダーフリーエリア', 'pc_check' ); ?>
          </div><!-- end of #ta_header_paragraph_design_disp -->
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'header', 'ヘッダー『フォント』設定更新', 'font' ); ?>
  </div><!-- end of #ta-header-tab-font -->
  <?php } ?>
  
  
  <?php if ( 'logoarea' == $valid_tab ) { ?>
  <!-- ロゴエリア -->
  <div class="table" id="ta-header-tab-logoarea">
    <?php ta_setting_form_start( 'header', 'logoarea' ); ?>
    <table class="ta-setting-table">
      <!-- ロゴエリアの調整 -->
      <tr>
        <th id="ta_header_logo_setting_title" class="big-title"><a href="JavaScript:void(0);">ロゴエリアの調整</a><?php ta_man2_gd( 'header/logoarea#setting' ); ?></th>
        <td>
          <div id="ta_header_logo_setting_disp" class="init-nodisp">
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <h4>ロゴエリアの上端からの位置</h4>
                  <?php ta_simple_input( 'ta_header_logo_top_padding', 'ピクセル', 'short_box' ); ?>
                </td>
                <td>
                  <h4>ロゴ画像の高さ</h4>
                  <?php ta_simple_input( 'ta_header_logoimg_height', 'ピクセル', 'short_box' ); ?>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>ロゴエリアコンテンツ（ロゴ画像とh1表記）の表示方法</h4>
            <?php $init_value = ta_read_op( 'ta_header_logo_contents_layout' ); ?>
            <p><input type="radio" name="ta_header_logo_contents_layout" value="left" <?php if ( "left" == $init_value ) echo 'checked="checked"'; ?>> 左詰め</p>
            <p><input type="radio" name="ta_header_logo_contents_layout" value="center" <?php if ( "center" == $init_value ) echo 'checked="checked"'; ?>> 中央</p>
            <p><input type="radio" name="ta_header_logo_contents_layout" value="right" <?php if ( "right" == $init_value ) echo 'checked="checked"'; ?>> 右詰め</p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <table class="ta-3contents-table">
              <tr>
                <td>
                  <h4>h1表記の位置</h4>
                  <?php $init_value = ta_read_op( 'ta_header_h1_position' ); ?>
                  <p><input type="radio" name="ta_header_h1_position" value="top" <?php if ( "top" == $init_value ) echo 'checked="checked"'; ?>> ロゴの上</p>
                  <p><input type="radio" name="ta_header_h1_position" value="bottom" <?php if ( "bottom" == $init_value ) echo 'checked="checked"'; ?>> ロゴの下</p>
                  <p><input type="radio" name="ta_header_h1_position" value="none" <?php if ( "none" == $init_value ) echo 'checked="checked"'; ?>> 非表示</p>
                </td>
                <td>
                  <h4>h1表記のサイズ</h4>
                  <?php ta_simple_input( 'ta_header_h1_size', 'ピクセル', 'short_box' ); ?>
                </td>
                <td>
                  <h4>h1表記の高さ</h4>
                  <?php ta_simple_input( 'ta_header_h1_lineheight', 'em', 'short_box' ); ?>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <table class="ta-3contents-table">
              <tr>
                <td>
                  <h4>h1表記の左余白</h4>
                  <?php ta_simple_input( 'ta_header_h1_margin_l', 'ピクセル', 'short_box' ); ?>
                </td>
                <td>
                  <h4>h1表記の上余白</h4>
                  <?php ta_simple_input( 'ta_header_h1_margin_t', 'ピクセル', 'short_box' ); ?>
                </td>
                <td>
                  <h4>h1表記の下余白</h4>
                  <?php ta_simple_input( 'ta_header_h1_margin_b', 'ピクセル', 'short_box' ); ?>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <h4>h1文字色</h4>
                  <?php ta_color_picker_process( 'ta_header_h1_content_color', 'valid' ); ?>
                </td>
                <td>
                  <h4>h1文字の太さ</h4>
                  <?php ta_fontweight_selection( 'ta_header_h1_content_color_fontweight' ); ?>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <?php ta_linkedtext_setting( 
                    'リンク付h1文字',
                    'ta_header_h1_content_anchor_color', 'valid',
                    'ta_header_h1_content_anchor_under',
                    'ta_header_h1_content_anchor_colorhover', 'valid',
                    'ta_header_h1_content_anchor_underhover' ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <table class="ta-fullcontents-table">
              <tr>
                <td style="width:20em;">
                  <h4>h1表記幅延長</h4>
                  <?php ta_alternative_input_checkbox( 'ta_header_h1_long_onoff', 'ヘッダーバナーエリア幅にする' ); ?>
                  <p>※ 通常はロゴエリア幅</p>
                </td>
                <td>
                  <h4>h1表記リンク新規ウィンドウ</h4>
                  <?php ta_alternative_input_checkbox( 'ta_header_h1_content_link_newwin_onoff', '新規ウィンドウで開く' ); ?>
                  <p>※ h1表記リンク時に新規ウィンドウで開きます</p>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
          </div><!-- end of #ta_header_logo_setting_disp -->
        </td>
      </tr>
      <!-- ロゴエリアの画像・リンク -->
      <tr>
        <th id="ta_header_logo_pic_setting_title" class="big-title"><a href="JavaScript:void(0);">ロゴエリアの画像・リンク</a><?php ta_man2_gd( 'header/logoarea#pic' ); ?></th>
        <td>
          <div id="ta_header_logo_pic_setting_disp" class="init-nodisp">
            <span class="fixed-space"></span>
            <h4>ロゴエリアの画像</h4>
            <?php ta_img_upload_process( 'ta_header_logo_pic' ); ?>
            <p>※ 縦横幅の最大値を500ピクセルに制限しています</p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>ロゴエリアのリンク</h4>
            <?php ta_link_process_w_newwin( 'ta_header_logo_link' ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4 class="ta-html-esc-asisexe">ロゴエリアに表示する代替テキスト</h4>
            <?php ta_textarea_input( 'ta_header_logo_text', 5, 67 ); ?>
            <a href="JavaScript:void(0);" onClick="ta_no_disp('#ta_header_logo_text');" >代替テキストを非表示にする</a>
            <p>※ 画像がある場合は無効</p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <!-- 詳細設定 -->
            <h4 id="ta_header_logo_pic_setting_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
            <div id="ta_header_logo_pic_setting_pro_disp" class="pro-disp init-nodisp">
              <table class="ta-2contents-table">
              <tr>
                <td>
                    <h4>代替テキストサイズ</h4>
                    <?php ta_simple_input( 'ta_header_logo_text_size', 'ピクセル', 'short_box' ); ?>
                  </td>
                  <td>
                    <h4>代替テキストの太さ</h4>
                    <?php ta_fontweight_selection( 'ta_header_logo_text_fontweight' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <?php ta_linkedtext_setting( 
                      '代替テキスト',
                      'ta_header_logo_text_color', 'invalid',
                      'ta_header_logo_text_under_onoff',
                      'ta_header_logo_text_hover', 'invalid',
                      'ta_header_logo_text_hoverunder_onoff' ); ?>
              <p>※ 代替テキスト下線はリンク付の場合に有効です</p>
            </div><!-- end of #ta_header_logo_pic_setting_pro_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_header_logo_pic_setting_disp -->
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'header', 'ヘッダー『ロゴエリア』設定更新', 'logoarea' ); ?>
  </div><!-- end of #ta-header-tab-logoarea -->
  <?php } ?>
  
  
  <?php if ( 'infoarea' == $valid_tab ) { ?>
  <!-- 連絡先エリア -->
  <div class="table" id="ta-header-tab-infoarea">
    <?php ta_setting_form_start( 'header', 'infoarea' ); ?>
    <table class="ta-setting-table">
      <!-- 連絡先エリアの調整 -->
      <tr>
        <th id="ta_header_info_setting_title" class="big-title"><a href="JavaScript:void(0);">連絡先エリアの調整</a><?php ta_man2_gd( 'header/infoarea#setting' ); ?></th>
        <td>
          <div id="ta_header_info_setting_disp" class="init-nodisp">
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <h4>連絡先エリアの上端からの位置</h4>
                  <?php ta_simple_input( 'ta_header_info_top_padding', 'ピクセル', 'short_box' ); ?>
                </td>
                <td>
                  <h4>連絡先画像の高さ</h4>
                  <?php ta_simple_input( 'ta_header_infoimg_height', 'ピクセル', 'short_box' ); ?>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>連絡先エリアコンテンツ（連絡先画像とSNSボタン）の表示方法</h4>
            <?php $init_value = ta_read_op( 'ta_header_info_contents_layout' ); ?>
            <p><input type="radio" name="ta_header_info_contents_layout" value="left" <?php if ( "left" == $init_value ) echo 'checked="checked"'; ?>> 左詰め</p>
            <p><input type="radio" name="ta_header_info_contents_layout" value="center" <?php if ( "center" == $init_value ) echo 'checked="checked"'; ?>> 中央</p>
            <p><input type="radio" name="ta_header_info_contents_layout" value="right" <?php if ( "right" == $init_value ) echo 'checked="checked"'; ?>> 右詰め</p>
            <p>※ 簡易メニューは“連絡先エリア簡易メニュー”にて設定</p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <table class="ta-3contents-table">
              <tr>
                <td>
                  <h4>連絡先エリア簡易メニュー表記</h4>
                  <?php ta_alternative_input_checkbox( 'ta_header_info_menu_onoff', '表示する' ); ?>
                  <p>※ 子孫展開無しの横型</p>
                </td>
                <td>
                  <h4>簡易メニュー表記の左端からの位置</h4>
                  <?php ta_simple_input( 'ta_header_info_menu_left_margin', 'ピクセル', 'short_box' ); ?>
                </td>
                <td>
                  <h4>簡易メニュー表記と連絡先画像間の余白</h4>
                  <?php ta_simple_input( 'ta_header_info_menu_margin2info_pic', 'ピクセル', 'short_box' ); ?>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <h4>連絡先の下部のSNS表記</h4>
                  <?php ta_alternative_input_checkbox( 'ta_header_info_sns_onoff', '表示する' ); ?>
                </td>
                <td>
                  <h4>SNS表記と連絡先画像間の余白</h4>
                  <?php ta_simple_input( 'ta_header_info_sns_margin2info_pic', 'ピクセル', 'short_box' ); ?>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
          </div><!-- end of #ta_header_info_setting_disp -->
        </td>
      </tr>
      <!-- 連絡先エリアの画像・リンク -->
      <tr>
        <th id="ta_header_info_pic_setting_title" class="big-title"><a href="JavaScript:void(0);">連絡先エリアの画像・リンク</a><?php ta_man2_gd( 'header/infoarea#pic' ); ?></th>
        <td>
          <div id="ta_header_info_pic_setting_disp" class="init-nodisp">
            <span class="fixed-space"></span>
            <h4>連絡先エリアの画像</h4>
            <?php ta_img_upload_process( 'ta_header_info_pic' ); ?>
            <p>※ 縦横幅の最大値を500ピクセルに制限しています</p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>連絡先エリアのリンク</h4>
            <?php ta_link_process_w_newwin( 'ta_header_info_link' ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4 class="ta-html-esc-asisexe">連絡先エリアに表示する代替テキスト</h4>
            <?php ta_textarea_input( 'ta_header_info_text', 5, 67 ); ?>
            <a href="JavaScript:void(0);" onClick="ta_no_disp('#ta_header_info_text');" >代替テキストを非表示にする</a>
            <p>※ 画像がある場合は無効</p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <!-- 詳細設定 -->
            <h4 id="ta_header_info_pic_setting_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
            <div id="ta_header_info_pic_setting_pro_disp" class="pro-disp init-nodisp">
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>代替テキストサイズ</h4>
                    <?php ta_simple_input( 'ta_header_info_text_size', 'ピクセル', 'short_box' ); ?>
                  </td>
                  <td>
                    <h4>代替テキストの太さ</h4>
                    <?php ta_fontweight_selection( 'ta_header_info_text_fontweight' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <?php ta_linkedtext_setting( 
                      '代替テキスト',
                      'ta_header_info_text_color', 'invalid',
                      'ta_header_info_text_under_onoff',
                      'ta_header_info_text_hover', 'invalid',
                      'ta_header_info_text_hoverunder_onoff' ); ?>
              <p>※ 代替テキスト下線はリンク付の場合に有効です</p>
            </div><!-- end of #ta_header_info_pic_setting_pro_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_header_info_pic_setting_disp -->
        </td>
      </tr>
      <!-- 連絡先エリア簡易メニュー -->
      <tr>
        <th id="ta_header_info_simplemenu_title" class="big-title"><a href="JavaScript:void(0);">連絡先エリア簡易メニュー</a><?php ta_man2_gd( 'header/infoarea#simplemenu' ); ?></th>
        <td>
          <div id="ta_header_info_simplemenu_disp" class="init-nodisp">
            <span class="fixed-space"></span>
            <p>※ 連絡先エリア簡易メニュー（子孫展開無しの横型）はWordPress標準のメニュー機能を使用しています。
            <br>有効にするためには関連付けが必要です。 関連付けの方法は<a href="http://theme001.tec-aid.com/thm001_manual_p2/thm001_manual_basicope_p2#readymade_menu" target="_blank">こちら</a>をご覧ください。</p>
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <h4>テキストサイズ</h4>
                  <?php ta_simple_input( 'ta_header_info_simplemenu_fontsize', 'ピクセル', 'short_box' ); ?>
                </td>
                <td>
                  <h4>テキストの太さ</h4>
                  <?php ta_fontweight_selection( 'ta_header_info_simplemenu_fontweight' ); ?>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <?php ta_linkedtext_setting( 
                    'テキスト',
                    'ta_header_info_simplemenu_color', 'invalid',
                    'ta_header_info_simplemenu_underline_onoff',
                    'ta_header_info_simplemenu_colorhover', 'invalid',
                    'ta_header_info_simplemenu_hoverunderline_onoff' ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <table class="ta-fullcontents-table">
              <tr>
                <td style="width:20em;">
                  <h4>メニューのレイアウト</h4>
                  <?php $init_value = ta_read_op( 'ta_header_info_simplemenu_layout' ); ?>
                  <p><input type="radio" name="ta_header_info_simplemenu_layout" value="normal" <?php if ( "normal" == $init_value ) echo 'checked="checked"'; ?>> 左詰め表示</p>
                  <p><input type="radio" name="ta_header_info_simplemenu_layout" value="even" <?php if ( "even" == $init_value ) echo 'checked="checked"'; ?>> 等間隔表示</p>
                  <p><input type="radio" name="ta_header_info_simplemenu_layout" value="right" <?php if ( "right" == $init_value ) echo 'checked="checked"'; ?>> 右詰め表示</p>
                  <p>※ 間隔・枠の個数は次設定にて</p>
                </td>
                <td>
                  <h4>メニューの間隔（左詰め・右詰め表示用）／アイテムの個数（等間隔表示用）</h4>
                  <?php ta_simple_input( 'ta_header_info_simplemenu_num', 'em または 個', 'short_box' ); ?>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
          </div><!-- end of #ta_header_info_simplemenu_disp -->
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'header', 'ヘッダー『連絡先エリア』設定更新', 'infoarea' ); ?>
  </div><!-- end of #ta-header-tab-infoarea -->
  <?php } ?>
  
  
  <?php if ( 'searcharea' == $valid_tab ) { ?>
  <!-- 検索エリア -->
  <div class="table" id="ta-header-tab-searcharea">
    <?php ta_setting_form_start( 'header', 'searcharea' ); ?>
    <table class="ta-setting-table">
      <!-- 検索エリアの調整 -->
      <tr>
        <th id="ta_header_search_setting_title" class="big-title"><a href="JavaScript:void(0);">検索エリアの調整</a><?php ta_man2_gd( 'header/searcharea#setting' ); ?></th>
        <td>
          <div id="ta_header_search_setting_disp" class="init-nodisp">
            <table class="ta-fullcontents-table">
              <tr>
                <td style="width:20em;">
                  <h4>検索エリアの上端からの位置</h4>
                  <?php ta_simple_input( 'ta_header_search_top_padding', 'ピクセル', 'short_box' ); ?>
                </td>
                <td>
                  <h4>検索ボックスの幅</h4>
                  <?php ta_simple_input( 'ta_header_search_width_size', '％', 'short_box' ); ?>
                  <p>※ 検索エリア幅に対する比率：非表示は0を入力</p>
                </td>
              </tr>
            </table>
            <div id="search-box-exp">
              <p style="margin:5px 0;">※ この枠内の設定はWordPressウィジェットの検索ボックスのデザインにも反映されます</p>
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>検索ボックスの高さ</h4>
                    <?php ta_simple_input( 'ta_header_search_height_size', 'em', 'short_box' ); ?>
                  </td>
                  <td>
                    <h4>検索ボックス枠の角丸み</h4>
                    <?php ta_simple_input( 'ta_header_search_radius_size', 'ピクセル', 'short_box' ); ?>
                    <p>※ 丸み無しは0を入力してください</p>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="related-border">
              <table class="ta-3contents-table">
                <tr>
                  <td>
                    <h4>検索ボックス文字の色</h4>
                    <?php ta_color_picker_no_tomei_process( 'ta_header_search_color', 'valid' ); ?>
                  </td>
                  <td>
                    <h4>検索ボックスの色</h4>
                    <?php ta_color_picker_process( 'ta_header_search_bgcolor', 'valid' ); ?>
                  </td>
                  <td>
                    <h4>検索ボックス枠の色</h4>
                    <?php ta_color_picker_no_tomei_process( 'ta_header_search_border_color', 'valid' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="related-border">
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>検索送信部テキスト</h4>
                    <?php ta_text_input_w_nodisp( 'ta_header_search_submit_title', 'middle_box' ); ?>
                  </td>
                  <td>
                    <h4>検索送信部の幅</h4>
                    <?php ta_simple_input( 'ta_header_search_submit_width_size', '％', 'short_box' ); ?>
                    <p>※ 検索ボックス幅に対する比率</p>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="related-border">
              <table class="ta-fullcontents-table">
                <tr>
                  <td style="width:20em;">
                    <h4>検索送信部テキストの色</h4>
                    <?php ta_color_picker_no_tomei_process( 'ta_header_search_submit_title_color', 'valid' ); ?>
                  </td>
                  <td style="width:20em;">
                    <h4>検索送信部の背景色</h4>
                    <?php ta_color_picker_process( 'ta_header_search_submit_bgcolor', 'valid' ); ?>
                  </td>
                  <td>
                    <h4>検索送信部画像（虫眼鏡）の色</h4>
                    <?php $init_value = ta_read_op( 'ta_header_search_glass' ); ?>
                    <table style="width:100%;">
                      <tr>
                        <td style="width:7em;">
                          <p><input type="radio" name="ta_header_search_glass" value="black" <?php if ( "black" == $init_value ) echo 'checked="checked"'; ?>> 黒</p>
                        </td>
                        <td>
                          <p><input type="radio" name="ta_header_search_glass" value="pink" <?php if ( "pink" == $init_value ) echo 'checked="checked"'; ?>> ピンク</p>
                        </td>
                      </tr>
                    </table>
                    <table style="width:100%;">
                      <tr>
                        <td style="width:7em;">
                          <p><input type="radio" name="ta_header_search_glass" value="blue" <?php if ( "blue" == $init_value ) echo 'checked="checked"'; ?>> 青</p>
                        </td>
                        <td>
                          <p><input type="radio" name="ta_header_search_glass" value="purple" <?php if ( "purple" == $init_value ) echo 'checked="checked"'; ?>> 紫</p>
                        </td>
                      </tr>
                    </table>
                    <table style="width:100%;">
                      <tr>
                        <td style="width:7em;">
                          <p><input type="radio" name="ta_header_search_glass" value="gray" <?php if ( "gray" == $init_value ) echo 'checked="checked"'; ?>> グレー</p>
                        </td>
                        <td>
                          <p><input type="radio" name="ta_header_search_glass" value="red" <?php if ( "red" == $init_value ) echo 'checked="checked"'; ?>> 赤</p>
                        </td>
                      </tr>
                    </table>
                    <table style="width:100%;">
                      <tr>
                        <td style="width:7em;">
                          <p><input type="radio" name="ta_header_search_glass" value="green" <?php if ( "green" == $init_value ) echo 'checked="checked"'; ?>> 緑</p>
                        </td>
                        <td>
                          <p><input type="radio" name="ta_header_search_glass" value="white" <?php if ( "white" == $init_value ) echo 'checked="checked"'; ?>> 白</p>
                        </td>
                      </tr>
                    </table>
                    <table style="width:100%;">
                      <tr>
                        <td style="width:7em;">
                          <p><input type="radio" name="ta_header_search_glass" value="orange" <?php if ( "orange" == $init_value ) echo 'checked="checked"'; ?>> オレンジ</p>
                        </td>
                        <td>
                          <p><input type="radio" name="ta_header_search_glass" value="yellow" <?php if ( "yellow" == $init_value ) echo 'checked="checked"'; ?>> 黄</p>
                        </td>
                      </tr>
                    </table>
                    <p>※ 送信部テキストが“no_disp”の場合に有効です</p>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
            </div>
            <table class="ta-fullcontents-table">
              <tr>
                <td style="width:20em;">
                  <h4>検索エリア簡易メニュー表記</h4>
                  <?php ta_alternative_input_checkbox( 'ta_header_search_menu_onoff', '表示する' ); ?>
                  <p>※ 子孫展開無しの横型</p>
                </td>
                <td style="width:20em;">
                  <h4>簡易メニュー表記の右端からの位置</h4>
                  <?php ta_simple_input( 'ta_header_search_menu_right_margin', 'ピクセル', 'short_box' ); ?>
                </td>
                <td>
                  <h4>簡易メニュー表記と検索ボックス画像間の余白</h4>
                  <?php ta_simple_input( 'ta_header_search_menu_margin2search_pic', 'ピクセル', 'short_box' ); ?>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <h4>検索の下部のSNS表記</h4>
                  <?php ta_alternative_input_checkbox( 'ta_header_search_sns_onoff', '表示する' ); ?>
                </td>
                <td>
                  <h4>SNS表記と検索ボックス画像間の余白</h4>
                  <?php ta_simple_input( 'ta_header_search_sns_margin2search_pic', 'ピクセル', 'short_box' ); ?>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
          </div><!-- end of #ta_header_search_setting_disp -->
        </td>
      </tr>
      <!-- 検索エリア簡易メニュー -->
      <tr>
        <th id="ta_header_search_simplemenu_title" class="big-title"><a href="JavaScript:void(0);">検索エリア簡易メニュー</a><?php ta_man2_gd( 'header/searcharea#simplemenu' ); ?></th>
        <td>
          <div id="ta_header_search_simplemenu_disp" class="init-nodisp">
            <span class="fixed-space"></span>
            <p>※ 検索エリア簡易メニュー（子孫展開無しの横型）はWordPress標準のメニュー機能を使用しています。
            <br>有効にするためには関連付けが必要です。 関連付けの方法は<a href="http://theme001.tec-aid.com/thm001_manual_p2/thm001_manual_basicope_p2#readymade_menu" target="_blank">こちら</a>をご覧ください。</p>
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <h4>テキストサイズ</h4>
                  <?php ta_simple_input( 'ta_header_search_simplemenu_fontsize', 'ピクセル', 'short_box' ); ?>
                </td>
                <td>
                  <h4>テキストの太さ</h4>
                  <?php ta_fontweight_selection( 'ta_header_search_simplemenu_fontweight' ); ?>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <?php ta_linkedtext_setting( 
                    'テキスト',
                    'ta_header_search_simplemenu_color', 'invalid',
                    'ta_header_search_simplemenu_underline_onoff',
                    'ta_header_search_simplemenu_colorhover', 'invalid',
                    'ta_header_search_simplemenu_hoverunderline_onoff' ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <table class="ta-fullcontents-table">
              <tr>
                <td style="width:20em;">
                  <h4>メニューのレイアウト</h4>
                  <?php $init_value = ta_read_op( 'ta_header_search_simplemenu_layout' ); ?>
                  <p><input type="radio" name="ta_header_search_simplemenu_layout" value="normal" <?php if ( "normal" == $init_value ) echo 'checked="checked"'; ?>> 右詰め表示（間隔は設定にて）</p>
                  <p><input type="radio" name="ta_header_search_simplemenu_layout" value="even" <?php if ( "even" == $init_value ) echo 'checked="checked"'; ?>> 等間隔表示（枠の個数は設定にて）</p>
                </td>
                <td>
                  <h4>メニューの間隔／アイテムの個数</h4>
                  <?php ta_simple_input( 'ta_header_search_simplemenu_num', 'em または 個', 'short_box' ); ?>
                  <p>※ メニューのレイアウト方法に従って内容が変わります</p>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
          </div><!-- end of #ta_header_search_simplemenu_disp -->
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'header', 'ヘッダー『検索エリア』設定更新', 'searcharea' ); ?>
  </div><!-- end of #ta-header-tab-searcharea -->
  <?php } ?>
  
  
  <?php if ( 'glabalmenu' == $valid_tab ) { ?>
  <!-- TAグローバルメニュー -->
  <div class="table" id="ta-header-tab-glabalmenu">
    <p style="margin-top:1em;">※ TAグローバルメニューはWordPress標準のメニュー機能を使用しています。有効にするためには関連付けが必要です。
    関連付けの方法は<a href="http://theme001.tec-aid.com/thm001_manual_p2/thm001_manual_basicope_p2#readymade_menu" target="_blank">こちら</a>をご覧ください。</p>
    <?php ta_setting_form_start( 'header', 'glabalmenu' ); ?>
    <table class="ta-setting-table">
      <!-- グローバルメニューバー -->
      <tr>
        <th id="ta_header_glabalmenubar_setting_title" class="big-title"><a href="JavaScript:void(0);">グローバルメニューバー</a><?php ta_man2_gd( 'header/glblmn#bar' ); ?></th>
        <td>
          <div id="ta_header_glabalmenubar_setting_disp" class="init-nodisp">
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <h4>位置</h4>
                  <?php $init_value = ta_read_op( 'ta_header_glabalmenu_position' ); ?>
                  <p><input type="radio" name="ta_header_glabalmenu_position" value="top" <?php if ( "top" == $init_value ) echo 'checked="checked"'; ?>> ヘッダー画像の上</p>
                  <p><input type="radio" name="ta_header_glabalmenu_position" value="bottom" <?php if ( "bottom" == $init_value ) echo 'checked="checked"'; ?>> ヘッダー画像の下</p>
                  <p><input type="radio" name="ta_header_glabalmenu_position" value="none" <?php if ( "none" == $init_value ) echo 'checked="checked"'; ?>> 非表示</p>
                </td>
                <td>
                  <h4>メニューアイテムの数</h4>
                  <?php ta_simple_input( 'ta_header_glabalmenu_itemnum', '個', 'short_box' ); ?>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <!-- 詳細設定 -->
            <h4 id="ta_header_glabalmenubar_setting_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
            <div id="ta_header_glabalmenubar_setting_pro_disp" class="pro-disp init-nodisp">
              <h4>メニュー全体高さ</h4>
              <?php ta_simple_input( 'ta_header_glabalmenu_wholeheight', 'ピクセル', 'short_box' ); ?>
              <span class="fixed-space"></span>
              <p>※ メニュー全体幅はグローバルメニューが存在するエリアの100%の幅となります。</p>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>メニュー上部の余白</h4>
                    <?php ta_simple_input( 'ta_header_glabalmenu_topmargin', 'ピクセル', 'short_box' ); ?>
                  </td>
                  <td>
                    <h4>メニュー下部の余白</h4>
                    <?php ta_simple_input( 'ta_header_glabalmenu_bottommargin', 'ピクセル', 'short_box' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>メニュー枠装飾の選択</h4>
                    <?php $init_value = ta_read_op( 'ta_header_glabalmenu_frame_select' ); ?>
                    <p><input type="radio" name="ta_header_glabalmenu_frame_select" value="vertical" <?php if ( "vertical" == $init_value ) echo 'checked="checked"'; ?>> 左右縦バー</p>
                    <p><input type="radio" name="ta_header_glabalmenu_frame_select" value="square" <?php if ( "square" == $init_value ) echo 'checked="checked"'; ?>> 四方囲みバー</p>
                    <p><input type="radio" name="ta_header_glabalmenu_frame_select" value="under" <?php if ( "under" == $init_value ) echo 'checked="checked"'; ?>> 下線バー</p>
                    <p><input type="radio" name="ta_header_glabalmenu_frame_select" value="over" <?php if ( "over" == $init_value ) echo 'checked="checked"'; ?>> 上線バー</p>
                    <p><input type="radio" name="ta_header_glabalmenu_frame_select" value="none" <?php if ( "none" == $init_value ) echo 'checked="checked"'; ?>> 無し</p>
                  </td>
                  <td>
                    <h4>メニュー枠装飾の色</h4>
                    <?php ta_color_picker_no_tomei_process( 'ta_header_glabalmenu_frame_color', 'valid' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-fullcontents-table">
                <tr>
                  <td style="width:20em;">
                    <h4>メニュー枠装飾サイズ</h4>
                    <?php ta_simple_input( 'ta_header_glabalmenu_frame_size', 'ピクセル', 'short_box' ); ?>
                  </td>
                  <td>
                    <h4>下線バー、上線バー選択時のメニュー枠縮小幅</h4>
                    <?php ta_simple_input( 'ta_header_glabalmenu_frame_margin_size', '％', 'short_box' ); ?>
                    <span class="fixed-space"></span>
                    <p>※ メニュー枠縮小幅は通常メニュー枠幅に対する比率になります。</p>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>現在のページを設定色で示す</h4>
              <?php ta_alternative_input_checkbox( 'ta_header_glabalmenu_current_frame_color_onoff', '有効にする' ); ?>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>現在のページを示すメニュー色</h4>
                    <?php ta_color_picker_no_tomei_process( 'ta_header_glabalmenu_current_text_color', 'valid' ); ?>
                  </td>
                  <td>
                    <!-- 現在のページを示すメニュー背景色(グラデーション) -->
                    <h4>現在のページを示すメニュー背景色</h4>
                    <?php ta_color_picker_no_tomei_grad_process( 'ta_header_glabalmenu_current_frame_color', 'valid' ); ?>
                  </td>
                </tr>
              </table>
            </div><!-- end of #ta_header_glabalmenubar_setting_pro_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_header_glabalmenubar_setting_disp -->
        </td>
      </tr>
      <!-- グローバルメインメニューテキスト -->
      <tr>
        <th id="ta_header_mainmenu_setting_title" class="big-title"><a href="JavaScript:void(0);">グローバルメニュー<br>メインテキスト</a><?php ta_man2_gd( 'header/glblmn#main_text' ); ?></th>
        <td>
          <div id="ta_header_mainmenu_setting_disp" class="init-nodisp">
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <h4>メインテキストサイズ</h4>
                  <?php ta_simple_input( 'ta_header_glabalmenu_fontsize', 'ピクセル', 'short_box' ); ?>
                </td>
                <td>
                  <h4>メインテキストの太さ</h4>
                  <?php ta_fontweight_selection( 'ta_header_glabalmenu_fontweight' ); ?>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <!-- 詳細設定 -->
            <h4 id="ta_header_mainmenu_setting_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
            <div id="ta_header_mainmenu_setting_pro_disp" class="pro-disp init-nodisp">
              <table class="ta-fullcontents-table">
                <tr>
                  <td style="width:20em">
                    <h4>メインテキスト色</h4>
                    <?php ta_color_picker_no_tomei_process( 'ta_header_glabalmenu_fontcolor', 'valid' ); ?>
                  </td>
                  <td>
                    <!-- メインテキスト背景色(グラデーション) -->
                    <h4>メインテキスト背景色</h4>
                    <?php ta_color_picker_grad_process( 'ta_header_glabalmenu_backcolor', 'valid' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-fullcontents-table">
                <tr>
                  <td style="width:20em">
                    <h4>HOVER時のメインテキスト色</h4>
                    <?php ta_color_picker_no_tomei_process( 'ta_header_glabalmenu_fontcolorhover', 'valid' ); ?>
                  </td>
                  <td>
                    <!-- HOVER時のメインテキスト背景色(グラデーション) -->
                    <h4>HOVER時のメインテキスト背景色</h4>
                    <?php ta_color_picker_grad_process( 'ta_header_glabalmenu_backcolorhover', 'valid' ); ?>
                  </td>
                </tr>
              </table>
            </div><!-- end of #ta_header_mainmenu_setting_pro_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_header_mainmenu_setting_disp -->
        </td>
      </tr>
      <!-- グローバルサブメニューテキスト -->
      <tr>
        <th id="ta_header_submenu_setting_title" class="big-title"><a href="JavaScript:void(0);">グローバルメニュー<br>サブテキスト</a><?php ta_man2_gd( 'header/glblmn#sub_text' ); ?></th>
        <td>
          <div id="ta_header_submenu_setting_disp" class="init-nodisp">
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <h4>サブテキストサイズ</h4>
                  <?php ta_simple_input( 'ta_header_glabalsubmenu_fontsize', 'ピクセル', 'short_box' ); ?>
                </td>
                <td>
                  <h4>サブテキストの太さ</h4>
                  <?php ta_fontweight_selection( 'ta_header_glabalsubmenu_fontweight' ); ?>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <!-- 詳細設定 -->
            <h4 id="ta_header_submenu_setting_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
            <div id="ta_header_submenu_setting_pro_disp" class="pro-disp init-nodisp">
              <table class="ta-fullcontents-table">
                <tr>
                  <td style="width:20em">
                    <h4>サブテキスト色</h4>
                    <?php ta_color_picker_no_tomei_process( 'ta_header_glabalsubmenu_fontcolor', 'valid' ); ?>
                  </td>
                  <td>
                    <!-- サブテキスト背景色(グラデーション) -->
                    <h4>サブテキスト背景色</h4>
                    <?php ta_color_picker_grad_process( 'ta_header_glabalsubmenu_backcolor', 'valid' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-fullcontents-table">
                <tr>
                  <td style="width:20em">
                    <h4>HOVER時のサブテキスト色</h4>
                    <?php ta_color_picker_no_tomei_process( 'ta_header_glabalsubmenu_fontcolorhover', 'valid' ); ?>
                  </td>
                  <td>
                    <!-- HOVER時のサブテキスト背景色(グラデーション) -->
                    <h4>HOVER時のサブテキスト背景色</h4>
                    <?php ta_color_picker_grad_process( 'ta_header_glabalsubmenu_backcolorhover', 'valid' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>サブメニューの幅</h4>
                    <?php ta_simple_input( 'ta_header_glabalsubmenu_width', '％', 'short_box' ); ?>
                    <p>※ メインメニュー比</p>
                  </td>
                  <td>
                    <h4>サブメニューの高さ</h4>
                    <?php ta_simple_input( 'ta_header_glabalsubmenu_height', '％', 'short_box' ); ?>
                    <p>※ メインメニュー比</p>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-3contents-table">
                <tr>
                  <td>
                    <h4>サブメニュー境界線の種類</h4>
                    <?php $init = ta_read_op( 'ta_header_glabalsubmenu_border_kind' ); ?>
                    <p><input type="radio" name="<?php echo 'ta_header_glabalsubmenu_border_kind'; ?>" value="solid" <?php if ( "solid" == $init ) echo 'checked="checked"' ?>> 実線</p>
                    <p><input type="radio" name="<?php echo 'ta_header_glabalsubmenu_border_kind'; ?>" value="dotted" <?php if ( "dotted" == $init ) echo 'checked="checked"' ?>> 点線</p>
                    <p><input type="radio" name="<?php echo 'ta_header_glabalsubmenu_border_kind'; ?>" value="dashed" <?php if ( "dashed" == $init ) echo 'checked="checked"' ?>> 破線</p>
                    <p><input type="radio" name="<?php echo 'ta_header_glabalsubmenu_border_kind'; ?>" value="double" <?php if ( "double" == $init ) echo 'checked="checked"' ?>> 二重線</p>
                    <p><input type="radio" name="<?php echo 'ta_header_glabalsubmenu_border_kind'; ?>" value="none" <?php if ( "none" == $init ) echo 'checked="checked"' ?>> 無し</p>
                  </td>
                  <td>
                    <h4>サブメニュー境界線の太さ</h4>
                    <?php ta_simple_input( 'ta_header_glabalsubmenu_border_size', 'ピクセル', 'short_box' ); ?>
                  </td>
                  <td>
                    <h4>サブメニュー境界線の色</h4>
                    <?php ta_color_picker_no_tomei_process( 'ta_header_glabalsubmenu_border_color', 'valid' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
            </div><!-- end of #ta_header_submenu_setting_pro_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_header_submenu_setting_disp -->
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'header', 'ヘッダー『グローバルメニュー』設定更新', 'glabalmenu' ); ?>
  </div><!-- end of #ta-header-tab-glabalmenu -->
  <?php } ?>
  
  
  <?php if ( 'headimg' == $valid_tab ) { ?>
  <!-- ヘッダー画像 -->
  <div class="table" id="ta-header-tab-headimg">
    <?php ta_setting_form_start( 'header', 'headimg' ); ?>
    <table class="ta-setting-table">
      <!-- ヘッダー画像 -->
      <tr>
        <th id="ta_header_headimg_setting_title" class="big-title"><a href="JavaScript:void(0);">ヘッダー画像</a><?php ta_man2_gd( 'header/headimg#setting' ); ?></th>
        <td>
          <div id="ta_header_headimg_setting_disp" class="init-nodisp">
            <h4>ヘッダー画像の選択</h4>
            <?php $init_value = ta_read_op( 'ta_header_headimg_select' ); ?>
            <p><input type="radio" name="ta_header_headimg_select" value="original" <?php if ( "original" == $init_value ) echo 'checked="checked"'; ?>> WordPress標準ヘッダー画像</p>
            <p><input type="radio" name="ta_header_headimg_select" value="fa" <?php if ( "fa" == $init_value ) echo 'checked="checked"'; ?>><?php if ( ! TA_HIEND_PI ) { ?><span style="color:#aaaaaa;" class="no-ta-thm001highend-yoko"><?php } ?> フリーエリア<?php if ( ! TA_HIEND_PI ) { ?></span><?php } ?></p>
            <p><input type="radio" name="ta_header_headimg_select" value="none" <?php if ( "none" == $init_value ) echo 'checked="checked"'; ?>> 非表示</p>
<?php
if ( ! TA_HIEND_PI ) { ?>
            <p id="ta_header_headimg_select_warning" style="margin-top:5px;color:#ff0000;">※ フリーエリアを使用するためには『TA Theme001 HighEnd』のプラグインが必要です</p>
<?php
} ?>
            <?php if ( "fa" == $init_value ) { $css_value = 'inline'; } else { $css_value = 'none'; } ?>
            <style type="text/css"> #ta_header_headimg_select_warning { display: <?php echo $css_value; ?>; } </style>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <h4>WordPress標準ヘッダー画像の幅</h4>
                  <?php ta_simple_input( 'ta_header_headimg_width', 'ピクセル', 'short_box' ); ?>
                </td>
                <td>
                  <h4>WordPress標準ヘッダー画像の高さ</h4>
                  <?php ta_simple_input( 'ta_header_headimg_height', 'ピクセル', 'short_box' ); ?>
                </td>
              </tr>
            </table>
            <p>※ ヘッダー画像がメイン枠に挿入されている場合、設定されたヘッダー画像の幅と高さは無効となり、
            <br>メイン枠の幅が100%幅として採用され、高さは同縦横比率で自動計算されます。</p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>WordPress標準ヘッダー画像のリンク先</h4>
            <?php ta_link_process_w_newwin( 'ta_header_headimg_link' ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>ヘッダー画像の挿入ページ</h4>
            <?php $init_value = ta_read_op( 'ta_header_headimg_insertpage' ); ?>
            <p><input type="radio" name="ta_header_headimg_insertpage" value="top_only" <?php if ( "top_only" == $init_value ) echo 'checked="checked"'; ?>> トップページのみ</p>
            <p><input type="radio" name="ta_header_headimg_insertpage" value="all" <?php if ( "all" == $init_value ) echo 'checked="checked"'; ?>> 全てのページ</p>
            <p><?php if ( ! TA_HIEND_PI ) { ?><span style="color:#aaaaaa;" class="no-ta-thm001highend-yoko"><?php } ?>※ 各々の固定ページ、カテゴリーは個別のヘッダー画像を設定できます。<?php if ( ! TA_HIEND_PI ) { ?></span><?php } ?></p>
            <span class="fixed-space"></span>
          </div><!-- end of #ta_header_headimg_setting_disp -->
        </td>
      </tr>
      <!-- ヘッダー画像に被せるテキスト -->
      <tr>
        <th id="ta_header_headimg_text_setting_title" class="big-title"><a href="JavaScript:void(0);">ヘッダー画像テキスト</a><?php ta_man2_gd( 'header/headimg#text' ); ?></th>
        <td>
          <div id="ta_header_headimg_text_setting_disp" class="init-nodisp">
            <span class="fixed-space"></span>
            <h4>ヘッダー画像テキストの表示</h4>
            <?php ta_alternative_input_checkbox( 'ta_header_headimg_text_onoff', '表示する' ); ?>
            <p>※ ヘッダー画像テキストはWordPress標準ヘッダー画像上に表示されます。</p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4 class="ta-html-strip">ヘッダー画像テキスト</h4>
            <?php $init_value = ta_read_op( 'ta_header_headimg_text' ); ?>
            <p><textarea name="ta_header_headimg_text" rows="5" cols="67"><?php ta_deleteyen( $init_value ); ?></textarea>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <!-- 詳細設定 -->
            <h4 id="ta_header_headimg_text_setting_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
            <div id="ta_header_headimg_text_setting_pro_disp" class="pro-disp init-nodisp">
              <table class="ta-3contents-table">
                <tr>
                  <td>
                    <h4>ヘッダー画像テキストサイズ</h4>
                    <?php ta_simple_input( 'ta_header_headimg_fontsize', 'ピクセル', 'short_box' ); ?>
                  </td>
                  <td>
                    <h4>ヘッダー画像テキストの太さ</h4>
                    <?php ta_fontweight_selection( 'ta_header_headimg_fontweight' ); ?>
                  </td>
                  <td>
                    <h4>ヘッダー画像テキストの色</h4>
                    <?php ta_color_picker_no_tomei_process( 'ta_header_headimg_fontcolor', 'valid' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>ヘッダー画像テキスト横位置</h4>
                    <?php ta_simple_input( 'ta_header_headimg_position_x', 'ピクセル', 'short_box' ); ?>
                  </td>
                  <td>
                    <h4>ヘッダー画像テキスト縦位置</h4>
                    <?php ta_simple_input( 'ta_header_headimg_position_y', 'ピクセル', 'short_box' ); ?>
                  </td>
                </tr>
              </table>
            </div><!-- end of #ta_header_headimg_text_setting_pro_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_header_headimg_text_setting_disp -->
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'header', 'ヘッダー『ヘッダー画像』設定更新', 'headimg' ); ?>
  </div><!-- end of #ta-header-tab-headimg -->
  <?php } ?>
  
  
  <?php if ( 'freearea' == $valid_tab ) { ?>
  <!-- フリーエリア -->
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_header_freearea_setting();
} else { ?>
  <div class="table" id="ta-header-tab-freearea">
    <table class="ta-setting-table">
      <!-- ヘッダーフリーエリア -->
      <tr>
        <th class="no-ta-thm001highend">ヘッダーフリーエリア<?php ta_man2_gd( 'header/header_fa' ); ?><br>（TAヘッダーFA）</th>
        <td></td>
      </tr>
    </table>
  </div><!-- end of #ta-header-tab-freearea -->
<?php
} ?>
  <?php } ?>
</div>
<?php
ta_progress_disp();
ta_info_disp(); ?>
