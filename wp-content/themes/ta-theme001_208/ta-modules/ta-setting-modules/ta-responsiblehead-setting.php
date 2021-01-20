<?php
/*******************************************************************************************************/
/*
/* テックエイドの成長する自作ホームページWordPressテーマ『 TAテーマ001 (ta-theme001) 』
/*
/* ta-responsiblehead-setting.php: ( Latest Version 2.00 2017.03.03 )
/*
/* このプログラムの著作権、使用権、その他全ての権利はde集まれ株式会社に属します。
/* The copyright, royalty and all the other rights of this program belong to deatsumare Corporation.
/*
/* File Version 履歴
/* File Version 2.00 2017.03.03: first edition by Kotaro Kashiwamura.
/*
/*******************************************************************************************************/
if ( TA_HIEND_PI ) { require_once( TA_HIEND_PI_DIR . '/setting-modules/ta-theme001-highend-responsible-setting.php' ); } ?>
<div id="ta-setting-form">
  <!-- タイトルとタブ -->
  <div id="ta-menu-group">
    <div id="ta-menu-title-container">
      <h2 id="ta-menu-title">TAフォーマット・『レスポンシブデザイン』ヘッダー設定メニュー</h2>
      <?php ta_ver_display(); ?>
    </div>
    <a id="ta-menu-talink-anc" href="http://theme001.tec-aid.com/" target="_blank"><div id="ta-menu-talink"></div></a>
  </div>
<?php
ta_development_disp();
ta_setting_scroll();
ta_setting_message_disp();
$ta_tabs = array( 'header' => '基本設定', 'logoarea' => 'ロゴエリア', 'infoarea' => '連絡先エリア', 'searcharea' => '検索エリア', 'globalmenu' => 'グローバルメニュー', 'headimg' => 'ヘッダー画像', );
$ta_tabs = apply_filters( 'ta_responsiblehead_settting_page_tab', $ta_tabs ); //フィルターフック'ta_responsiblehead_settting_page_tab'を設置
$valid_tab = ta_tab_lists( $ta_tabs );  //タブの設置と有効タブの検出 ?>
  
  
  <?php if ( 'header' == $valid_tab ) { ?>
  <!-- ヘッダー -->
  <div class="table" id="ta-responsiblehead-tab-header">
    <?php ta_setting_form_start( 'responsiblehead', 'header' ); ?>
    <table class="ta-setting-table">
      <!-- ヘッダーのレスポンシブデザイン設定 -->
      <tr>
        <th id="ta_responsible_header_basic_title" class="big-title"><a href="JavaScript:void(0);">ヘッダー基本設定</a><?php ta_man2_gd( 'reshead/basic#setting' ); ?></th>
        <td>
          <div id="ta_responsible_header_basic_disp" class="init-nodisp">
            <!-- 通常表示 -->
            <h4>ヘッダーの表示</h4>
            <?php ta_alternative_input_checkbox( 'ta_responsible_header_onoff', '表示する' ); ?>
            <p class="res-onoff-exp-under"></p>
            <p>※ グローバルメニューとヘッダー画像（ヘッダーフリーエリア）は含みません</p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <!-- 詳細設定 -->
            <h4 id="ta_responsible_header_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
            <div id="ta_responsible_header_pro_disp" class="pro-disp init-nodisp">
              <h4>ヘッダーのレスポンシブデザイン共通フォントサイズ</h4>
              <?php ta_simple_input( 'ta_responsible_header_font_size', '％', 'short_box' ); ?>
              <p>※ ヘッダー内の一般フォントに適応されます</p>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <?php ta_paragraph_setting( 'ta_responsible_header_font', 'ヘッダー', 'responsive_check' ); ?>
              <p style="margin-top:-0.7em;">※ 専用パラグラフ設定はヘッダーフリーエリア内に適応されます</p>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>ヘッダーの上側余白</h4>
                    <?php ta_simple_input( 'ta_responsible_header_top_margin', 'ピクセル', 'short_box' ); ?>
                  </td>
                  <td>
                    <h4>ヘッダーの下側余白</h4>
                    <?php ta_simple_input( 'ta_responsible_header_bottom_margin', 'ピクセル', 'short_box' ); ?>
                  </td>
                </tr>
              </table>
            </div><!-- end of #ta_responsible_header_pro_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_responsible_header_basic_disp -->
        </td>
      </tr>
      <!-- レスポンシブデザイン時のヘッダーの背景色・画像 -->
      <tr>
        <?php ta_common_frame_setting( 'ta_responsible_header_frame', 'ヘッダーバナーエリア<br>背景色・画像', 'invalid', 'valid' ); ?>
      </tr>
    </table>
    <?php ta_setting_form_end( 'responsiblehead', 'レスポンシブデザイン『ヘッダー』設定更新', 'header' ); ?>
  </div><!-- end of #ta-responsiblehead-tab-header -->
  <?php } ?>
  
  
  <?php if ( 'logoarea' == $valid_tab ) { ?>
  <!-- ロゴエリアのレスポンシブデザイン設定 -->
  <div class="table" id="ta-responsiblehead-tab-logoarea">
    <?php ta_setting_form_start( 'responsiblehead', 'logoarea' ); ?>
    <table class="ta-setting-table">
      <!-- ロゴエリアのレスポンシブデザイン設定 -->
      <tr>
        <th id="ta_responsible_header_logoarea_title">ロゴエリア<?php ta_man2_gd( 'reshead/logoarea' ); ?></th>
        <td>
          <!-- 通常表示 -->
          <h4>ロゴエリアの表示</h4>
          <?php ta_alternative_input_checkbox( 'ta_responsible_header_logoarea_onoff', '表示する' ); ?>
          <p class="res-onoff-exp-under"></p>
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <!-- ロゴエリアh1表記のレスポンシブデザイン設定 -->
          <h4 id="ta_responsible_header_logoarea_h1_title" class="big-title"><a href="JavaScript:void(0);">ロゴエリアh1表記のレスポンシブデザイン設定</a></h4>
          <div id="ta_responsible_header_logoarea_h1_disp" class="init-nodisp">
            <div style="margin-top:-1em;">
              <?php ta_responsible_detail_setting( 'ta_responsible_header_logoarea_h1', 'ロゴエリアh1 ', 'valid' ); ?>
            </div>
            <span class="fixed-space"></span>
            <hr class="fixed-border" style="margin-left:20px;">
            <!-- テキスト装飾設定 -->
            <h4 id="ta_responsible_header_logoarea_h1_textdeco_title" class="pro-title" style="margin-left:20px;"><a href="JavaScript:void(0);">テキスト装飾設定</a></h4>
            <div id="ta_responsible_header_logoarea_h1_textdeco_disp" class="pro-disp init-nodisp" style="margin-left:20px;">
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>ロゴエリアh1文字色</h4>
                    <?php ta_color_picker_process( 'ta_responsible_header_logoarea_h1_color', 'valid' ); ?>
                  </td>
                  <td>
                    <h4>ロゴエリアh1文字の太さ</h4>
                    <?php ta_fontweight_selection( 'ta_responsible_header_logoarea_h1_fontweight' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <?php ta_linkedtext_setting( 
                      'ロゴエリアh1リンク付文字',
                      'ta_responsible_header_logoarea_h1_anchor_color', 'valid',
                      'ta_responsible_header_logoarea_h1_anchor_under',
                      'ta_responsible_header_logoarea_h1_anchor_colorhover', 'valid',
                      'ta_responsible_header_logoarea_h1_anchor_underhover' ); ?>
            </div><!-- end of #ta_responsible_header_logoarea_h1_textdeco_disp -->
          </div><!-- end of #ta_responsible_header_logoarea_h1_disp -->
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <!-- ロゴエリア画像（代替テキスト）のレスポンシブデザイン設定 -->
          <h4 id="ta_responsible_header_logoarea_img_title" class="big-title"><a href="JavaScript:void(0);">ロゴエリア画像（代替テキスト）のレスポンシブデザイン設定</a></h4>
          <div id="ta_responsible_header_logoarea_img_disp" class="init-nodisp">
            <div style="margin-top:-1em;">
              <?php ta_responsible_detail_setting( 'ta_responsible_header_logoarea_img', 'ロゴエリア画像<br>（代替テキスト）', 'valid' ); ?>
            </div>
            <span class="fixed-space"></span>
            <hr class="fixed-border" style="margin-left:20px;">
            <!-- テキスト装飾設定 -->
            <h4 id="ta_responsible_header_logoarea_img_textdeco_title" class="pro-title" style="margin-left:20px;"><a href="JavaScript:void(0);">テキスト装飾設定</a></h4>
            <div id="ta_responsible_header_logoarea_img_textdeco_disp" class="pro-disp init-nodisp" style="margin-left:20px;">
              <h4>ロゴエリア代替テキストの太さ</h4>
              <?php ta_fontweight_selection( 'ta_responsible_header_logoarea_img_fontweight' ); ?>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <?php ta_linkedtext_setting( 
                      'ロゴエリア代替テキスト',
                      'ta_responsible_header_logoarea_img_text_color', 'valid',
                      'ta_responsible_header_logoarea_img_text_under',
                      'ta_responsible_header_logoarea_img_text_colorhover', 'valid',
                      'ta_responsible_header_logoarea_img_text_underhover' ); ?>
              <p>※ 代替テキスト下線はリンク付の場合に有効です</p>
            </div><!-- end of #ta_responsible_header_logoarea_img_textdeco_disp -->
          </div><!-- end of #ta_responsible_header_logoarea_img_disp -->
          <span class="fixed-space"></span>
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'responsiblehead', 'レスポンシブデザイン『ロゴエリア』設定更新', 'logoarea' ); ?>
  </div><!-- end of #ta-responsiblehead-tab-logoarea -->
  <?php } ?>
  
  
  <?php if ( 'infoarea' == $valid_tab ) { ?>
  <!-- 連絡先エリアのレスポンシブデザイン設定 -->
  <div class="table" id="ta-responsiblehead-tab-infoarea">
    <?php ta_setting_form_start( 'responsiblehead', 'infoarea' ); ?>
    <table class="ta-setting-table">
      <!-- 連絡先エリアのレスポンシブデザイン設定 -->
      <tr>
        <th id="ta_responsible_header_infoarea_title">連絡先エリア<?php ta_man2_gd( 'reshead/infoarea' ); ?></th>
        <td>
          <!-- 通常表示 -->
          <h4>連絡先エリアの表示</h4>
          <?php ta_alternative_input_checkbox( 'ta_responsible_header_infoarea_onoff', '表示する' ); ?>
          <p class="res-onoff-exp-under"></p>
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <!-- 連絡先エリア画像（代替テキスト）のレスポンシブデザイン設定 -->
          <h4 id="ta_responsible_header_infoarea_img_title" class="big-title"><a href="JavaScript:void(0);">連絡先エリア画像（代替テキスト）のレスポンシブデザイン設定</a></h4>
          <div id="ta_responsible_header_infoarea_img_disp" class="init-nodisp">
            <div style="margin-top:-1em;">
              <?php ta_responsible_detail_setting( 'ta_responsible_header_infoarea_img', '連絡先エリア画像<br>（代替テキスト）', 'valid' ); ?>
            </div>
            <span class="fixed-space"></span>
            <hr class="fixed-border" style="margin-left:20px;">
            <!-- テキスト装飾設定 -->
            <h4 id="ta_responsible_header_infoarea_img_textdeco_title" class="pro-title" style="margin-left:20px;"><a href="JavaScript:void(0);">テキスト装飾設定</a></h4>
            <div id="ta_responsible_header_infoarea_img_textdeco_disp" class="pro-disp init-nodisp" style="margin-left:20px;">
              <h4>連絡先エリア代替テキストの太さ</h4>
              <?php ta_fontweight_selection( 'ta_responsible_header_infoarea_img_fontweight' ); ?>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <?php ta_linkedtext_setting( 
                      '連絡先エリア代替テキスト',
                      'ta_responsible_header_infoarea_img_text_color', 'valid',
                      'ta_responsible_header_infoarea_img_text_under',
                      'ta_responsible_header_infoarea_img_text_colorhover', 'valid',
                      'ta_responsible_header_infoarea_img_text_underhover' ); ?>
              <p>※ 代替テキスト下線はリンク付の場合に有効です</p>
            </div><!-- end of #ta_responsible_header_infoarea_img_textdeco_disp -->
          </div><!-- end of #ta_responsible_header_infoarea_img_disp -->
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <!-- 連絡先エリア簡易メニューのレスポンシブデザイン設定 -->
          <h4 id="ta_responsible_header_infoarea_menu_title" class="big-title"><a href="JavaScript:void(0);">連絡先エリア簡易メニューのレスポンシブデザイン設定</a></h4>
          <div id="ta_responsible_header_infoarea_menu_disp" class="init-nodisp">
            <div style="margin-top:-1em;">
              <?php ta_responsible_detail_setting( 'ta_responsible_header_infoarea_menu', '連絡先エリア簡易メニュー', 'invalid' ); ?>
            </div>
            <span class="fixed-space"></span>
            <hr class="fixed-border" style="margin-left:20px;">
            <!-- テキスト装飾設定 -->
            <h4 id="ta_responsible_header_infoarea_menu_textdeco_title" class="pro-title" style="margin-left:20px;"><a href="JavaScript:void(0);">テキスト装飾設定</a></h4>
            <div id="ta_responsible_header_infoarea_menu_textdeco_disp" class="pro-disp init-nodisp" style="margin-left:20px;">
              <h4>連絡先エリア簡易メニューの太さ</h4>
              <?php ta_fontweight_selection( 'ta_responsible_header_infoarea_menu_fontweight' ); ?>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <?php ta_linkedtext_setting( 
                      '連絡先エリア簡易メニュー',
                      'ta_responsible_header_infoarea_menu_text_color', 'valid',
                      'ta_responsible_header_infoarea_menu_text_under',
                      'ta_responsible_header_infoarea_menu_text_colorhover', 'valid',
                      'ta_responsible_header_infoarea_menu_text_underhover' ); ?>
            </div><!-- end of #ta_responsible_header_infoarea_menu_textdeco_disp -->
          </div><!-- end of #ta_responsible_header_infoarea_menu_disp -->
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <!-- 連絡先エリアSNS表記のレスポンシブデザイン設定 -->
          <h4 id="ta_responsible_header_infoarea_sns_title" class="big-title"><a href="JavaScript:void(0);">連絡先エリアSNS表記のレスポンシブデザイン設定</a></h4>
          <div id="ta_responsible_header_infoarea_sns_disp" class="init-nodisp">
            <div style="margin-top:-1em;">
              <?php ta_responsible_detail_setting( 'ta_responsible_header_infoarea_sns', '連絡先エリアSNS表記', 'invalid' ); ?>
            </div>
          </div><!-- end of #ta_responsible_header_infoarea_sns_disp -->
          <span class="fixed-space"></span>
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'responsiblehead', 'レスポンシブデザイン『連絡先エリア』設定更新', 'infoarea' ); ?>
  </div><!-- end of #ta-responsiblehead-tab-infoarea -->
  <?php } ?>
  
  
  <?php if ( 'searcharea' == $valid_tab ) { ?>
  <!-- 検索エリアのレスポンシブデザイン設定 -->
  <div class="table" id="ta-responsiblehead-tab-searcharea">
    <?php ta_setting_form_start( 'responsiblehead', 'searcharea' ); ?>
    <table class="ta-setting-table">
      <!-- 検索エリアのレスポンシブデザイン設定 -->
      <tr>
        <th id="ta_responsible_header_searcharea_title">検索エリア<?php ta_man2_gd( 'reshead/searcharea' ); ?></th>
        <td>
          <!-- 通常表示 -->
          <h4>検索エリアの表示</h4>
          <?php ta_alternative_input_checkbox( 'ta_responsible_header_searcharea_onoff', '表示する' ); ?>
          <p class="res-onoff-exp-under"></p>
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <!-- 検索エリア検索ボックスのレスポンシブデザイン設定 -->
          <h4 id="ta_responsible_header_searcharea_search_title" class="big-title"><a href="JavaScript:void(0);">検索エリア検索ボックスのレスポンシブデザイン設定</a></h4>
          <div id="ta_responsible_header_searcharea_search_disp" class="init-nodisp">
            <div style="margin-top:-1em;">
              <?php ta_responsible_detail_setting( 'ta_responsible_header_searcharea_search', '検索エリア検索ボックス', 'invalid' ); ?>
            </div>
          </div><!-- end of #ta_responsible_header_searcharea_search_disp -->
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <!-- 検索エリア簡易メニューのレスポンシブデザイン設定 -->
          <h4 id="ta_responsible_header_searcharea_menu_title" class="big-title"><a href="JavaScript:void(0);">検索エリア簡易メニューのレスポンシブデザイン設定</a></h4>
          <div id="ta_responsible_header_searcharea_menu_disp" class="init-nodisp">
            <div style="margin-top:-1em;">
              <?php ta_responsible_detail_setting( 'ta_responsible_header_searcharea_menu', '検索エリア簡易メニュー', 'invalid' ); ?>
            </div>
            <span class="fixed-space"></span>
            <hr class="fixed-border" style="margin-left:20px;">
            <!-- テキスト装飾設定 -->
            <h4 id="ta_responsible_header_searcharea_menu_textdeco_title" class="pro-title" style="margin-left:20px;"><a href="JavaScript:void(0);">テキスト装飾設定</a></h4>
            <div id="ta_responsible_header_searcharea_menu_textdeco_disp" class="pro-disp init-nodisp" style="margin-left:20px;">
              <h4>検索エリア簡易メニューの太さ</h4>
              <?php ta_fontweight_selection( 'ta_responsible_header_searcharea_menu_fontweight' ); ?>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <?php ta_linkedtext_setting( 
                      '検索エリア簡易メニュー',
                      'ta_responsible_header_searcharea_menu_text_color', 'valid',
                      'ta_responsible_header_searcharea_menu_text_under',
                      'ta_responsible_header_searcharea_menu_text_colorhover', 'valid',
                      'ta_responsible_header_searcharea_menu_text_underhover' ); ?>
            </div><!-- end of #ta_responsible_header_searcharea_menu_textdeco_disp -->
          </div><!-- end of #ta_responsible_header_searcharea_menu_disp -->
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <!-- 検索エリアSNS表記のレスポンシブデザイン設定 -->
          <h4 id="ta_responsible_header_searcharea_sns_title" class="big-title"><a href="JavaScript:void(0);">検索エリアSNS表記のレスポンシブデザイン設定</a></h4>
          <div id="ta_responsible_header_searcharea_sns_disp" class="init-nodisp">
            <div style="margin-top:-1em;">
              <?php ta_responsible_detail_setting( 'ta_responsible_header_searcharea_sns', '検索エリアSNS表記', 'invalid' ); ?>
            </div>
          </div><!-- end of #ta_responsible_header_searcharea_sns_disp -->
          <span class="fixed-space"></span>
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'responsiblehead', 'レスポンシブデザイン『検索エリア』設定更新', 'searcharea' ); ?>
  </div><!-- end of #ta-responsiblehead-tab-searcharea -->
  <?php } ?>
  
  
  <?php if ( 'globalmenu' == $valid_tab ) { ?>
  <!-- グローバルメニュー -->
  <div class="table" id="ta-responsiblehead-tab-globalmenu">
    <?php ta_setting_form_start( 'responsiblehead', 'globalmenu' ); ?>
    <table class="ta-setting-table">
      <!-- グローバルメニューのレスポンシブデザイン共通設定 -->
      <tr>
        <th id="ta_responsible_glbnavi_basic_setting_title" class="big-title"><a href="JavaScript:void(0);">グローバルメニュー共通設定</a><?php ta_man2_gd( 'reshead/globalmenu#common' ); ?></th>
        <td>
          <div id="ta_responsible_glbnavi_basic_setting_disp" class="init-nodisp">
            <!-- 通常表示 -->
            <h4>グローバルメニューの表示</h4>
            <?php ta_alternative_input_checkbox( 'ta_responsible_glbnavi_onoff', '表示する' ); ?>
            <p class="res-onoff-exp-under"></p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <!-- 詳細設定 -->
            <h4 id="ta_responsible_glbnavi_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
            <div id="ta_responsible_glbnavi_pro_disp" class="pro-disp init-nodisp">
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>グローバルナビの上側余白</h4>
                    <?php ta_simple_input( 'ta_responsible_glbnavi_top_margin', 'ピクセル', 'short_box' ); ?>
                    <p>※ 縦型、横型両方に有効</p>
                  </td>
                  <td>
                    <h4>グローバルナビの下側余白</h4>
                    <?php ta_simple_input( 'ta_responsible_glbnavi_bottom_margin', 'ピクセル', 'short_box' ); ?>
                    <p>※ 縦型、横型両方に有効</p>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>横型グローバルナビの表示方法</h4>
              <?php ta_alternative_input_checkbox( 'ta_responsible_glbnavi_w_padding_onoff', '左右余白付き' ); ?>
              <p>※ 横型のみに有効</p>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>横型グローバルナビテキストのサイズ比</h4>
              <?php ta_simple_input( 'ta_responsible_glbnavi_text_size_ratio', '％', 'short_box' ); ?>
              <p>※ PC用横型のテキストサイズに対しての比率。横型のみに有効</p>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>横型グローバルナビメニュー全体高さのサイズ比</h4>
              <?php ta_simple_input( 'ta_responsible_glbnavi_height_size_ratio', '％', 'short_box' ); ?>
              <p>※ PC用横型のメニュー全体高さに対しての比率。横型のみに有効</p>
            </div><!-- end of #ta_responsible_glbnavi_pro_disp -->
          </div><!-- end of #ta_responsible_glbnavi_basic_setting_disp -->
          <span class="fixed-space"></span>
        </td>
      </tr>
      <!-- レスポンシブの縦型グローバルメニュー設定 -->
      <tr>
        <th id="ta_responsible_glbnavi_vertical_setting_title" class="big-title"><a href="JavaScript:void(0);">縦型グローバルメニュー</a><?php ta_man2_gd( 'reshead/globalmenu#vertical' ); ?></th>
        <td>
          <div id="ta_responsible_glbnavi_vertical_setting_disp" class="init-nodisp">
            <span class="fixed-space"></span>
            <?php ta_alternative_input_checkbox( 'ta_responsible_glbnavi_vertical_onoff', '有効にする' ); ?>
            <p class="res-onoff-exp-under"></p>
            <p>※ 無効の場合はPC用横型の設定を流用します</p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <!-- 縦型グローバルメニュー（メニューボックス）設定 -->
            <h4 id="ta_responsible_glbnavi_menubox_title" class="big-title"><a href="JavaScript:void(0);">縦型グローバルメニュー（メニューボックス）設定</a></h4>
            <div id="ta_responsible_glbnavi_menubox_disp" class="init-nodisp" style="margin-left:20px;">
              <!-- 通常表示 -->
              <h4>メニューボックス文字</h4>
              <?php ta_text_input( 'ta_responsible_glbnavi_menubox_text', 'middle_box' ); ?>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>メニューボックス文字色</h4>
                    <?php ta_color_picker_no_tomei_process( 'ta_responsible_glbnavi_menubox_anchor_color', 'valid' ); ?>
                  </td>
                  <td>
                    <!-- メニューボックス背景色(グラデーション) -->
                    <h4>メニューボックス背景色</h4>
                    <?php ta_color_picker_no_tomei_grad_process( 'ta_responsible_glbnavi_menubox_box_color', 'valid' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <!-- 詳細設定 -->
              <h4 id="ta_responsible_glbnavi_menubox_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
              <div id="ta_responsible_glbnavi_menubox_pro_disp" class="pro-disp init-nodisp">
                <table class="ta-2contents-table">
                  <tr>
                    <td>
                      <h4>メニューボックス文字のサイズ</h4>
                      <?php ta_simple_input( 'ta_responsible_glbnavi_menubox_size', '％', 'short_box' ); ?>
                    </td>
                    <td>
                      <h4>メニューボックス文字の太さ</h4>
                      <?php ta_fontweight_selection( 'ta_responsible_glbnavi_menubox_weight' ); ?>
                    </td>
                  </tr>
                </table>
                <span class="fixed-space"></span>
                <hr class="fixed-border">
                <table class="ta-2contents-table">
                  <tr>
                    <td>
                      <h4>メニューボックスの表示方法</h4>
                      <?php ta_alternative_input_checkbox( 'ta_responsible_glbnavi_menubox_w_padding_onoff', '左右余白付き' ); ?>
                    </td>
                    <td>
                      <h4>メニューボックス文字の位置</h4>
                      <?php $init_value = ta_read_op( 'ta_responsible_glbnavi_menubox_position' ); ?>
                      <p><input type="radio" name="ta_responsible_glbnavi_menubox_position" value="left" <?php if ( "left" == $init_value ) echo 'checked="checked"'; ?>> 左寄せ</p>
                      <p><input type="radio" name="ta_responsible_glbnavi_menubox_position" value="center" <?php if ( "center" == $init_value ) echo 'checked="checked"'; ?>> 中央</p>
                      <p><input type="radio" name="ta_responsible_glbnavi_menubox_position" value="right" <?php if ( "right" == $init_value ) echo 'checked="checked"'; ?>> 右寄せ</p>
                    </td>
                  </tr>
                </table>
                <span class="fixed-space"></span>
                <hr class="fixed-border">
                <table class="ta-2contents-table">
                  <tr>
                    <td>
                      <h4>メニューボックス文字の端余白</h4>
                      <?php ta_simple_input( 'ta_responsible_glbnavi_menubox_edge_margin', '％（50％以下）', 'short_box' ); ?>
                      <p>※ 位置が中央の場合は無効</p>
                    </td>
                    <td>
                      <h4>メニューボックスボックスの高さ</h4>
                      <?php ta_simple_input( 'ta_responsible_glbnavi_menubox_height', 'ピクセル', 'short_box' ); ?>
                      <p>※ 文字の上下に加算されます</p>
                    </td>
                  </tr>
                </table>
                <span class="fixed-space"></span>
                <hr class="fixed-border">
                <table class="ta-2contents-table">
                  <tr>
                    <td>
                      <h4>HOVER時のメニューボックス文字色</h4>
                      <?php ta_color_picker_no_tomei_process( 'ta_responsible_glbnavi_menubox_anchor_colorhover', 'valid' ); ?>
                    </td>
                    <td>
                      <!-- HOVER時のメニューボックス背景色(グラデーション) -->
                      <h4>HOVER時のメニューボックス背景色</h4>
                      <?php ta_color_picker_no_tomei_grad_process( 'ta_responsible_glbnavi_menubox_box_colorhover', 'valid' ); ?>
                    </td>
                  </tr>
                </table>
              </div><!-- end of #ta_responsible_glbnavi_menubox_pro_disp -->
            </div><!-- end of #ta_responsible_glbnavi_menubox_disp -->
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <!-- 縦型グローバルメニュー（メインメニュー）設定 -->
            <h4 id="ta_responsible_glbnavi_mainmenu_title" class="big-title"><a href="JavaScript:void(0);">縦型グローバルメニュー（メインメニュー）設定</a></h4>
            <div id="ta_responsible_glbnavi_mainmenu_disp" class="init-nodisp" style="margin-left:20px;">
              <!-- 通常表示 -->
              <h4>メインメニューの高さ</h4>
              <?php ta_simple_input( 'ta_responsible_glbnavi_mainmenu_height', 'ピクセル', 'short_box' ); ?>
              <p>※ 文字の上下に加算されます</p>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4 class="ta-html-esc">メインメニューテキストの前に付けるマーカー</h4>
              <?php ta_text_input_w_nodisp( 'ta_responsible_glbnavi_mainmenu_marker_before_text', 'middle_box' ); ?>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <!-- 詳細設定 -->
              <h4 id="ta_responsible_glbnavi_mainmenu_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
              <div id="ta_responsible_glbnavi_mainmenu_pro_disp" class="pro-disp init-nodisp">
                <table class="ta-3contents-table">
                  <tr>
                    <td>
                      <h4>メインメニュー幅</h4>
                      <?php ta_simple_input( 'ta_responsible_glbnavi_mainmenu_menubar_ratio', '％', 'short_box' ); ?>
                      <p>※ メニューボックスに対する比率</p>
                    </td>
                    <td>
                      <h4>メインメニューテキストサイズ</h4>
                      <?php ta_simple_input( 'ta_responsible_glbnavi_mainmenu_fontsize', 'ピクセル', 'short_box' ); ?>
                    </td>
                    <td>
                      <h4>メインメニューテキストの太さ</h4>
                      <?php ta_fontweight_selection( 'ta_responsible_glbnavi_mainmenu_fontweight' ); ?>
                    </td>
                  </tr>
                </table>
                <span class="fixed-space"></span>
                <hr class="fixed-border">
                <table class="ta-2contents-table">
                  <tr>
                    <td>
                      <h4>メインメニューテキスト色</h4>
                      <?php ta_color_picker_no_tomei_process( 'ta_responsible_glbnavi_mainmenu_fontcolor', 'valid' ); ?>
                    </td>
                    <td>
                      <h4>HOVER時のメインメニューテキスト色</h4>
                      <?php ta_color_picker_no_tomei_process( 'ta_responsible_glbnavi_mainmenu_fontcolorhover', 'valid' ); ?>
                    </td>
                  </tr>
                </table>
                <span class="fixed-space"></span>
                <hr class="fixed-border">
                <table class="ta-2contents-table">
                  <tr>
                    <td>
                      <!-- メインメニューテキスト背景色(グラデーション) -->
                      <h4>メインメニューテキスト背景色</h4>
                      <?php ta_color_picker_no_tomei_grad_process( 'ta_responsible_glbnavi_mainmenu_backcolor', 'valid' ); ?>
                    </td>
                    <td>
                      <!-- HOVER時のメインメニューテキスト背景色(グラデーション) -->
                      <h4>HOVER時のメインメニューテキスト背景色</h4>
                      <?php ta_color_picker_no_tomei_grad_process( 'ta_responsible_glbnavi_mainmenu_backcolorhover', 'valid' ); ?>
                    </td>
                  </tr>
                </table>
                <span class="fixed-space"></span>
                <hr class="fixed-border">
                <table class="ta-2contents-table">
                  <tr>
                    <td>
                      <h4>メインメニューテキストの位置</h4>
                      <?php $init_value = ta_read_op( 'ta_responsible_glbnavi_mainmenu_position' ); ?>
                      <p><input type="radio" name="ta_responsible_glbnavi_mainmenu_position" value="left" <?php if ( "left" == $init_value ) echo 'checked="checked"'; ?>> 左寄せ</p>
                      <p><input type="radio" name="ta_responsible_glbnavi_mainmenu_position" value="center" <?php if ( "center" == $init_value ) echo 'checked="checked"'; ?>> 中央</p>
                      <p><input type="radio" name="ta_responsible_glbnavi_mainmenu_position" value="right" <?php if ( "right" == $init_value ) echo 'checked="checked"'; ?>> 右寄せ</p>
                    </td>
                    <td>
                      <h4>メインメニューテキストの端余白</h4>
                      <?php ta_simple_input( 'ta_responsible_glbnavi_mainmenu_edge_margin', '％（50％以下）', 'short_box' ); ?>
                      <p>※ 位置が中央の場合は無効</p>
                    </td>
                  </tr>
                </table>
              </div><!-- end of #ta_responsible_glbnavi_mainmenu_pro_disp -->
            </div><!-- end of #ta_responsible_glbnavi_mainmenu_disp -->
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <!-- 縦型グローバルメニュー（サブメニュー）設定 -->
            <h4 id="ta_responsible_glbnavi_submenu_title" class="big-title"><a href="JavaScript:void(0);">縦型グローバルメニュー（サブメニュー）設定</a></h4>
            <div id="ta_responsible_glbnavi_submenu_disp" class="init-nodisp" style="margin-left:20px;">
              <!-- 通常表示 -->
              <h4>サブメニューの高さ</h4>
              <?php ta_simple_input( 'ta_responsible_glbnavi_submenu_height', 'ピクセル', 'short_box' ); ?>
              <p>※ 文字の上下に加算されます</p>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4 class="ta-html-esc">サブメニューテキストの前に付けるマーカー</h4>
              <?php ta_text_input_w_nodisp( 'ta_responsible_glbnavi_submenu_marker_before_text', 'middle_box' ); ?>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <!-- 詳細設定 -->
              <h4 id="ta_responsible_glbnavi_submenu_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
              <div id="ta_responsible_glbnavi_submenu_pro_disp" class="pro-disp init-nodisp">
                <table class="ta-3contents-table">
                  <tr>
                    <td>
                      <h4>サブメニュー幅 </h4>
                      <?php ta_simple_input( 'ta_responsible_glbnavi_submenu_menubar_ratio', '％', 'short_box' ); ?>
                      <p>※ メニューボックスに対する比率</p>
                    </td>
                    <td>
                      <h4>サブメニューテキストサイズ</h4>
                      <?php ta_simple_input( 'ta_responsible_glbnavi_submenu_fontsize', 'ピクセル', 'short_box' ); ?>
                    </td>
                    <td>
                      <h4>サブメニューテキストの太さ</h4>
                      <?php ta_fontweight_selection( 'ta_responsible_glbnavi_submenu_fontweight' ); ?>
                    </td>
                  </tr>
                </table>
                <span class="fixed-space"></span>
                <hr class="fixed-border">
                <table class="ta-2contents-table">
                  <tr>
                    <td>
                      <h4>サブメニューテキスト色</h4>
                      <?php ta_color_picker_no_tomei_process( 'ta_responsible_glbnavi_submenu_fontcolor', 'valid' ); ?>
                    </td>
                    <td>
                      <h4>HOVER時のサブメニューテキスト色</h4>
                      <?php ta_color_picker_no_tomei_process( 'ta_responsible_glbnavi_submenu_fontcolorhover', 'valid' ); ?>
                    </td>
                  </tr>
                </table>
                <span class="fixed-space"></span>
                <hr class="fixed-border">
                <table class="ta-2contents-table">
                  <tr>
                    <td>
                      <!-- サブメニューテキスト背景色(グラデーション) -->
                      <h4>サブメニューテキスト背景色</h4>
                      <?php ta_color_picker_no_tomei_grad_process( 'ta_responsible_glbnavi_submenu_backcolor', 'valid' ); ?>
                    </td>
                    <td>
                      <!-- HOVER時のサブメニューテキスト背景色(グラデーション) -->
                      <h4>HOVER時のサブメニューテキスト背景色</h4>
                      <?php ta_color_picker_no_tomei_grad_process( 'ta_responsible_glbnavi_submenu_backcolorhover', 'valid' ); ?>
                    </td>
                  </tr>
                </table>
                <span class="fixed-space"></span>
                <hr class="fixed-border">
                <table class="ta-2contents-table">
                  <tr>
                    <td>
                      <h4>サブメニューテキストの位置</h4>
                      <?php $init_value = ta_read_op( 'ta_responsible_glbnavi_submenu_position' ); ?>
                      <p><input type="radio" name="ta_responsible_glbnavi_submenu_position" value="left" <?php if ( "left" == $init_value ) echo 'checked="checked"'; ?>> 左寄せ</p>
                      <p><input type="radio" name="ta_responsible_glbnavi_submenu_position" value="center" <?php if ( "center" == $init_value ) echo 'checked="checked"'; ?>> 中央</p>
                      <p><input type="radio" name="ta_responsible_glbnavi_submenu_position" value="right" <?php if ( "right" == $init_value ) echo 'checked="checked"'; ?>> 右寄せ</p>
                    </td>
                    <td>
                      <h4>サブメニューテキストの端余白</h4>
                      <?php ta_simple_input( 'ta_responsible_glbnavi_submenu_edge_margin', '％（50％以下）', 'short_box' ); ?>
                      <p>※ 位置が中央の場合は無効</p>
                    </td>
                  </tr>
                </table>
              </div><!-- end of #ta_responsible_glbnavi_submenu_pro_disp -->
            </div><!-- end of #ta_responsible_glbnavi_submenu_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_responsible_glbnavi_vertical_setting_disp -->
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'responsiblehead', 'レスポンシブデザイン『グローバルメニュー』設定更新', 'globalmenu' ); ?>
  </div><!-- end of #ta-responsiblehead-tab-globalmenu -->
  <?php } ?>
  
  
  <?php if ( 'headimg' == $valid_tab ) { ?>
  <!-- ヘッダー画像 -->
  <div class="table" id="ta-responsiblehead-tab-headimg">
    <?php ta_setting_form_start( 'responsiblehead', 'headimg' ); ?>
    <table class="ta-setting-table">
      <!-- グローバルメニューのレスポンシブデザイン共通設定 -->
      <tr>
        <th id="ta_responsible_headerimg_title">ヘッダー画像<?php ta_man2_gd( 'reshead/headimg' ); ?></th>
        <td>
          <!-- 通常表示 -->
          <h4>ヘッダー画像の表示</h4>
          <?php ta_alternative_input_checkbox( 'ta_responsible_headerimg_onoff', '表示する' ); ?>
          <p class="res-onoff-exp-under"></p>
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <!-- 詳細設定 -->
          <h4 id="ta_responsible_headerimg_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
          <div id="ta_responsible_headerimg_pro_disp" class="pro-disp init-nodisp">
            <table class="ta-3contents-table">
              <tr>
                <td>
                  <h4>ヘッダー画像の表示方法</h4>
                  <?php ta_alternative_input_checkbox( 'ta_responsible_headerimg_w_padding_onoff', '左右余白付きコンテンツ' ); ?>
                </td>
                <td>
                  <h4>ヘッダー画像の上側余白</h4>
                  <?php ta_simple_input( 'ta_responsible_headerimg_top_margin', 'ピクセル', 'short_box' ); ?>
                </td>
                <td>
                  <h4>ヘッダー画像の下側余白</h4>
                  <?php ta_simple_input( 'ta_responsible_headerimg_bottom_margin', 'ピクセル', 'short_box' ); ?>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <table class="ta-3contents-table">
              <tr>
                <td>
                  <h4>ヘッダー画像テキストの表示</h4>
                  <?php ta_alternative_input_checkbox( 'ta_responsible_headerimg_text_onoff', '表示する' ); ?>
                  <p>※ WordPress標準ヘッダー画像のみ有効</p>
                </td>
                <td>
                  <h4>ヘッダー画像テキストサイズ</h4>
                  <?php ta_simple_input( 'ta_responsible_headerimg_fontsize', 'ピクセル', 'short_box' ); ?>
                </td>
                <td>
                  <h4>ヘッダー画像テキストの太さ</h4>
                  <?php ta_fontweight_selection( 'ta_responsible_headerimg_fontweight' ); ?>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <h4>ヘッダー画像テキストの横位置</h4>
                  <?php ta_simple_input( 'ta_responsible_headerimg_position_x', 'ピクセル', 'short_box' ); ?>
                </td>
                <td>
                  <h4>ヘッダー画像テキストの縦位置</h4>
                  <?php ta_simple_input( 'ta_responsible_headerimg_position_y', 'ピクセル', 'short_box' ); ?>
                </td>
              </tr>
            </table>
          </div><!-- end of #ta_responsible_headerimg_pro_disp -->
          <span class="fixed-space"></span>
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'responsiblehead', 'レスポンシブデザイン『ヘッダー画像』設定更新', 'headimg' ); ?>
  </div><!-- end of #ta-responsiblehead-tab-headimg -->
  <?php } ?>
</div>
<?php
ta_progress_disp();
ta_info_disp(); ?>
