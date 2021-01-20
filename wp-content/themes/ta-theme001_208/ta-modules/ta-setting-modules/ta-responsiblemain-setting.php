<?php
/*******************************************************************************************************/
/*
/* テックエイドの成長する自作ホームページWordPressテーマ『 TAテーマ001 (ta-theme001) 』
/*
/* ta-responsiblemain-setting.php: ( Latest Version 2.00 2017.03.04 )
/*
/* このプログラムの著作権、使用権、その他全ての権利はde集まれ株式会社に属します。
/* The copyright, royalty and all the other rights of this program belong to deatsumare Corporation.
/*
/* File Version 履歴
/* File Version 2.00 2017.03.04: first edition by Kotaro Kashiwamura.
/*
/*******************************************************************************************************/
if ( TA_HIEND_PI ) { require_once( TA_HIEND_PI_DIR . '/setting-modules/ta-theme001-highend-responsible-setting.php' ); } ?>
<div id="ta-setting-form">
  <!-- タイトルとタブ -->
  <div id="ta-menu-group">
    <div id="ta-menu-title-container">
      <h2 id="ta-menu-title">TAフォーマット・『レスポンシブデザイン』メイン（トップ）設定メニュー</h2>
      <?php ta_ver_display(); ?>
    </div>
    <a id="ta-menu-talink-anc" href="http://theme001.tec-aid.com/" target="_blank"><div id="ta-menu-talink"></div></a>
  </div>
<?php
ta_development_disp();
ta_setting_scroll();
ta_setting_message_disp();
$ta_tabs = array( 'basic' => '基本設定', 'headline' => 'ヘッドライン（h2～h5）', 'decoline' => '装飾（1～4）', );
$ta_tabs = apply_filters( 'ta_responsiblemain_settting_page_tab', $ta_tabs ); //フィルターフック'ta_responsiblemain_settting_page_tab'を設置
$valid_tab = ta_tab_lists( $ta_tabs );  //タブの設置と有効タブの検出 ?>
  
  
  <?php if ( 'basic' == $valid_tab ) { ?>
  <!-- 基本設定 -->
  <div class="table" id="ta-responsiblemain-tab-basic">
    <?php ta_setting_form_start( 'responsiblemain', 'basic' ); ?>
    <table class="ta-setting-table">
      <!-- レスポンシブデザイン<br>メイン（トップページ）基本設定 -->
      <tr>
        <th id="ta_responsible_main_basic_title" class="big-title"><a href="JavaScript:void(0);">メイン（トップページ）<br>基本設定</a><?php ta_man2_gd( 'resmain/basic#setting' ); ?></th>
        <td>
          <div id="ta_responsible_main_basic_disp" class="init-nodisp">
            <table class="ta-fullcontents-table">
              <tr>
                <td style="width:20em;">
                  <h4>トップページキャッチエリアの表示方法</h4>
                  <?php ta_alternative_input_checkbox( 'ta_responsible_top_topcatch_tate_onoff', '縦に独立表示する' ); ?>
                  <span class="fixed-space"></span>
                  <p>※ 縦表示時は右画像幅設定が有効</p>
                </td>
                <td>
                  <h4>（トップページキャッチエリア）画像幅</h4>
                  <?php ta_simple_input( 'ta_responsible_top_topcatch_img_width', '％', 'short_box' ); ?>
                  <p>※ 端末表示幅に対する比率です</p>
                  <p>※ 非表示は0を入力してください（トップページキャッチエリア自体が非表示になります）</p>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_responsible_imgexp_menu_setting();
} else { ?>
            <h4 style="color:#bbbbbb" class="no-ta-thm001highend">画像と説明付きメニューAのレスポンシブデザイン設定</h4>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4 style="color:#bbbbbb" class="no-ta-thm001highend">画像と説明付きメニューBのレスポンシブデザイン設定</h4>
<?php
} ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>トップページ最新投稿ダイジェスト定位置表示</h4>
            <?php ta_alternative_input_checkbox( 'ta_responsible_main_top_latestposts_onoff', '表示する' ); ?>
            <p class="res-onoff-exp-under"></p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_responsible_top_postdigest_setting();
} else { ?>
            <h4 style="color:#bbbbbb" class="no-ta-thm001highend">トップページ各種投稿ダイジェスト定位置一括表示</h4>
<?php
} ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>トップページウィジェットエリアの表示</h4>
            <?php ta_alternative_input_checkbox( 'ta_responsible_main_top_widgetarea_onoff', '表示する' ); ?>
            <p class="res-onoff-exp-under"></p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <h4>トップページコンテンツ間隔</h4>
                  <?php ta_simple_input( 'ta_responsible_top_fixed_space', 'ピクセル', 'short_box' ); ?>
                </td>
                <td>
                  <h4>メインコンテンツ間隔</h4>
                  <?php ta_simple_input( 'ta_responsible_main_fixed_space', 'ピクセル', 'short_box' ); ?>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <!-- 詳細設定 -->
            <h4 id="ta_responsible_main_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
            <div id="ta_responsible_main_pro_disp" class="pro-disp init-nodisp">
              <h4>メインコンテンツのレスポンシブデザイン共通フォントサイズ</h4>
              <?php ta_simple_input( 'ta_responsible_main_font_size', '％', 'short_box' ); ?>
              <p>※ メインコンテンツ内の一般フォントに適応されます</p>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <?php ta_paragraph_setting( 'ta_responsible_main_font', 'メイン', 'responsive_check' ); ?>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>パンくずナビのフォントサイズ</h4>
              <?php ta_simple_input( 'ta_responsible_main_bread_size2common', '％', 'short_box' ); ?>
              <p>※ メインコンテンツレスポンシブデザイン共通フォントサイズに対する比率</p>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-3contents-table">
                <tr>
                  <td>
                    <h4>メインコンテンツの上側余白</h4>
                    <?php ta_simple_input( 'ta_responsible_main_top_margin', 'ピクセル', 'short_box' ); ?>
                  </td>
                  <td>
                    <h4>メインコンテンツの下側余白</h4>
                    <?php ta_simple_input( 'ta_responsible_main_bottom_margin', 'ピクセル', 'short_box' ); ?>
                  </td>
                  <td>
                    <h4>コンテンツエリアの上下枠幅</h4>
                    <?php ta_simple_input( 'ta_responsible_main_tb_padding', 'ピクセル', 'short_box' ); ?>
                    <p>※ 上下に同じ幅ののりしろができます</p>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>トップページウィジェットエリアのセンタリング</h4>
              <?php ta_alternative_input_checkbox( 'ta_responsible_main_top_widgetarea_centering', 'センタリングする' ); ?>
              <p>※ センタリングできないウィジェットもあります</p>
            </div><!-- end of #ta_responsible_main_pro_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_responsible_main_basic_disp -->
        </td>
      </tr>
      <!-- レスポンシブデザイン時のメインコンテンツの背景色・背景画像 -->
      <tr>
        <?php ta_highend_frame_setting( 'ta_responsible_main_frame', 'メイン<br>背景色・背景画像' ); ?>
      </tr>
    </table>
    <?php ta_setting_form_end( 'responsiblemain', 'レスポンシブデザイン『メイン（トップ）基本設定』設定更新', 'basic' ); ?>
  </div><!-- end of #ta-responsiblemain-tab-basic -->
  <?php } ?>
  
  
  <?php if ( 'headline' == $valid_tab ) { ?>
  <!-- ヘッドライン（h2～h5）-->
  <div class="table" id="ta-responsiblemain-tab-headline">
    <?php ta_setting_form_start( 'responsiblemain', 'headline' ); ?>
    <table class="ta-setting-table">
      <!-- h2タイトル -->
      <tr>
        <th id="ta_responsible_main_h2_setting_title" class="big-title"><a href="JavaScript:void(0);">h2 メインタイトル</a><?php ta_man2_gd( 'resmain/hl' ); ?><br><span class="small-font"><?php echo esc_html( '<h2 class="title"></h2>' ) . '<br>' . esc_html( '[main-h2][/main-h2]' ); ?></span></th>
        <td>
          <div id="ta_responsible_main_h2_setting_disp" class="init-nodisp">
            <table class="ta-fullcontents-table">
              <tr>
                <td style="width:20em;">
                  <h4>PCデザイン流用 or レスポンシブ専用</h4>
                  <?php ta_alternative_input_checkbox( 'ta_responsible_main_h2_senyo_onoff', 'レスポンシブ専用を使用する' ); ?>
                </td>
                <td>
                  <h4>PCデザイン流用時のフォントサイズ</h4>
                  <?php ta_simple_input( 'ta_responsible_main_h2_size2common', '％', 'short_box' ); ?>
                  <p>※ メインコンテンツのレスポンシブデザイン共通フォントサイズに対する比率</p>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4 id="ta_responsible_main_h2_title" class="pro-title"><a href="JavaScript:void(0);">h2レスポンシブ専用設定</a></h4>
            <div id="ta_responsible_main_h2_disp" class="pro-disp init-nodisp">
              <div class="h2_area">
                <?php ta_headline_confirm( 'ta_responsible_main_h2', 'h2' ); ?>
              </div>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <?php ta_responsive_headline_register( 'ta_responsible_main_h2', 'none' ); ?>
            </div><!-- end of #ta_responsible_main_h2_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_responsible_main_h2_setting_disp -->
        </td>
      </tr>
      <!-- h3タイトル -->
      <tr>
        <th id="ta_responsible_main_h3_setting_title" class="big-title"><a href="JavaScript:void(0);">h3 メインタイトル</a><?php ta_man2_gd( 'resmain/hl' ); ?><br><span class="small-font"><?php echo esc_html( '<h3 class="title"></h3>' ) . '<br>' . esc_html( '[main-h3][/main-h3]' ); ?></span></a></th>
        <td>
          <div id="ta_responsible_main_h3_setting_disp" class="init-nodisp">
            <table class="ta-fullcontents-table">
              <tr>
                <td style="width:20em;">
                  <h4>PCデザイン流用 or レスポンシブ専用</h4>
                  <?php ta_alternative_input_checkbox( 'ta_responsible_main_h3_senyo_onoff', 'レスポンシブ専用を使用する' ); ?>
                </td>
                <td>
                  <h4>PCデザイン流用時のフォントサイズ</h4>
                  <?php ta_simple_input( 'ta_responsible_main_h3_size2common', '％', 'short_box' ); ?>
                  <p>※ メインコンテンツのレスポンシブデザイン共通フォントサイズに対する比率</p>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4 id="ta_responsible_main_h3_title" class="pro-title"><a href="JavaScript:void(0);">h3レスポンシブ専用設定</a></h4>
            <div id="ta_responsible_main_h3_disp" class="pro-disp init-nodisp">
              <div class="h3_area">
                <?php ta_headline_confirm( 'ta_responsible_main_h3', 'h3' ); ?>
              </div>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <?php ta_responsive_headline_register( 'ta_responsible_main_h3', 'none' ); ?>
            </div><!-- end of #ta_responsible_main_h3_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_responsible_main_h3_setting_disp -->
        </td>
      </tr>
      <!-- h4タイトル -->
      <tr>
        <th id="ta_responsible_main_h4_setting_title" class="big-title"><a href="JavaScript:void(0);">h4 メインタイトル</a><?php ta_man2_gd( 'resmain/hl' ); ?><br><span class="small-font"><?php echo esc_html( '<h4 class="title"></h4>' ) . '<br>' . esc_html( '[main-h4][/main-h4]' ); ?></span></a></th>
        <td>
          <div id="ta_responsible_main_h4_setting_disp" class="init-nodisp">
            <table class="ta-fullcontents-table">
              <tr>
                <td style="width:20em;">
                  <h4>PCデザイン流用 or レスポンシブ専用</h4>
                  <?php ta_alternative_input_checkbox( 'ta_responsible_main_h4_senyo_onoff', 'レスポンシブ専用を使用する' ); ?>
                </td>
                <td>
                  <h4>PCデザイン流用時のフォントサイズ</h4>
                  <?php ta_simple_input( 'ta_responsible_main_h4_size2common', '％', 'short_box' ); ?>
                  <p>※ メインコンテンツのレスポンシブデザイン共通フォントサイズに対する比率</p>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4 id="ta_responsible_main_h4_title" class="pro-title"><a href="JavaScript:void(0);">h4レスポンシブ専用設定</a></h4>
            <div id="ta_responsible_main_h4_disp" class="pro-disp init-nodisp">
              <div class="h4_area">
                <?php ta_headline_confirm( 'ta_responsible_main_h4', 'h4' ); ?>
              </div>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <?php ta_responsive_headline_register( 'ta_responsible_main_h4', 'none' ); ?>
            </div><!-- end of #ta_responsible_main_h4_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_responsible_main_h4_setting_disp -->
        </td>
      </tr>
      <!-- h5タイトル -->
      <tr>
        <th id="ta_responsible_main_h5_setting_title" class="big-title"><a href="JavaScript:void(0);">h5 メインタイトル</a><?php ta_man2_gd( 'resmain/hl' ); ?><br><span class="small-font"><?php echo esc_html( '<h5 class="title"></h5>' ) . '<br>' . esc_html( '[main-h5][/main-h5]' ); ?></span></th>
        <td>
          <div id="ta_responsible_main_h5_setting_disp" class="init-nodisp">
            <table class="ta-fullcontents-table">
              <tr>
                <td style="width:20em;">
                  <h4>PCデザイン流用 or レスポンシブ専用</h4>
                  <?php ta_alternative_input_checkbox( 'ta_responsible_main_h5_senyo_onoff', 'レスポンシブ専用を使用する' ); ?>
                </td>
                <td>
                  <h4>PCデザイン流用時のフォントサイズ</h4>
                  <?php ta_simple_input( 'ta_responsible_main_h5_size2common', '％', 'short_box' ); ?>
                  <p>※ メインコンテンツのレスポンシブデザイン共通フォントサイズに対する比率</p>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4 id="ta_responsible_main_h5_title" class="pro-title"><a href="JavaScript:void(0);">h5レスポンシブ専用設定</a></h4>
            <div id="ta_responsible_main_h5_disp" class="pro-disp init-nodisp">
              <div class="h5_area">
                <?php ta_headline_confirm( 'ta_responsible_main_h5', 'h5' ); ?>
              </div>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <?php ta_responsive_headline_register( 'ta_responsible_main_h5', 'none' ); ?>
            </div><!-- end of #ta_responsible_main_h5_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_responsible_main_h5_setting_disp -->
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'responsiblemain', 'レスポンシブデザイン『メインヘッドライン（h2～h5）』設定更新', 'headline' ); ?>
  </div><!-- end of #ta-responsiblemain-tab-headline -->
  <?php } ?>
  
  
  <?php if ( 'decoline' == $valid_tab ) { ?>
  <!-- 装飾（1～4）-->
  <div class="table" id="ta-responsiblemain-tab-decoline">
<?php
if ( TA_HIEND_PI ) { ?>
    <?php ta_setting_form_start( 'responsiblemain', 'decoline' ); ?>
    <table class="ta-setting-table">
<?php
  ta_thm001highend_responsible_main_deco_setting( 1 );
  ta_thm001highend_responsible_main_deco_setting( 2 );
  ta_thm001highend_responsible_main_deco_setting( 3 );
  ta_thm001highend_responsible_main_deco_setting( 4 ); ?>
    </table>
    <?php ta_setting_form_end( 'responsiblemain', 'レスポンシブデザイン『メイン装飾（1～4）』設定更新', 'decoline' ); ?>
<?php
} else { ?>
    <table class="ta-setting-table">
      <tr>
        <th id="ta_responsible_main_deco1_setting_title_no_thm001highend" class="no-ta-thm001highend">メイン装飾1<?php ta_man2_gd( 'resmain/deco' ); ?><br><span class="small-font"><?php echo esc_html( '<h6 class="deco1"></h6>' ) . '<br>' . esc_html( '[main-deco1][/main-deco1]' ); ?></span></th>
        <td></td>
      </tr>
      <tr>
        <th id="ta_responsible_main_deco2_setting_title_no_thm001highend" class="no-ta-thm001highend">メイン装飾2<?php ta_man2_gd( 'resmain/deco' ); ?><br><span class="small-font"><?php echo esc_html( '<h6 class="deco2"></h6>' ) . '<br>' . esc_html( '[main-deco2][/main-deco2]' ); ?></span></th>
        <td></td>
      </tr>
      <tr>
        <th id="ta_responsible_main_deco3_setting_title_no_thm001highend" class="no-ta-thm001highend">メイン装飾3<?php ta_man2_gd( 'resmain/deco' ); ?><br><span class="small-font"><?php echo esc_html( '<h6 class="deco3"></h6>' ) . '<br>' . esc_html( '[main-deco3][/main-deco3]' ); ?></span></th>
        <td></td>
      </tr>
      <tr>
        <th id="ta_responsible_main_deco4_setting_title_no_thm001highend" class="no-ta-thm001highend">メイン装飾4<?php ta_man2_gd( 'resmain/deco' ); ?><br><span class="small-font"><?php echo esc_html( '<h6 class="deco4"></h6>' ) . '<br>' . esc_html( '[main-deco4][/main-deco4]' ); ?></span></th>
        <td></td>
      </tr>
    </table>
<?php
} ?>
  </div><!-- end of #ta-responsiblemain-tab-decoline -->
  <?php } ?>
</div>
<?php
ta_progress_disp();
$main_bg_color_select = ta_read_op( 'ta_common_top_outframe_color_select' );
$main_bg_color = ta_read_op( 'ta_common_top_outframe_color' );
if ( 'common_site_bg' == $main_bg_color_select ) { $main_bg_color = ta_read_op( 'ta_common_site_bg_color' ); }
else if ( 'common_site_hl' == $main_bg_color_select ) { $main_bg_color = ta_read_op( 'ta_common_site_hl_color' ); }
else if ( 'common_site_text_on_bg' == $main_bg_color_select ) { $main_bg_color = ta_read_op( 'ta_common_site_text_on_bg_color' ); }
else if ( 'common_site_text_on_hl' == $main_bg_color_select ) { $main_bg_color = ta_read_op( 'ta_common_site_text_on_hl_color' ); } ?>
<style type="text/css">
<!--
  #ta-setting-form .h2_area,
  #ta-setting-form .h3_area,
  #ta-setting-form .h4_area,
  #ta-setting-form .h5_area,
  #ta-setting-form .h6_area {
  margin-top: 1em;
  padding: 20px 10px;
  background-color: <?php echo $main_bg_color; ?>;
}
-->
</style>
<?php ta_info_disp(); ?>
