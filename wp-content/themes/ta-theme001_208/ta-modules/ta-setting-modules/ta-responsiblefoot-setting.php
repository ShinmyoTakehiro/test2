<?php
/*******************************************************************************************************/
/*
/* テックエイドの成長する自作ホームページWordPressテーマ『 TAテーマ001 (ta-theme001) 』
/*
/* ta-responsiblefoot-setting.php: ( Latest Version 2.00 2017.02.20 )
/*
/* このプログラムの著作権、使用権、その他全ての権利はde集まれ株式会社に属します。
/* The copyright, royalty and all the other rights of this program belong to deatsumare Corporation.
/*
/* File Version 履歴
/* File Version 2.00 2017.02.20: first edition by Kotaro Kashiwamura.
/*
/*******************************************************************************************************/
if ( TA_HIEND_PI ) { require_once( TA_HIEND_PI_DIR . '/setting-modules/ta-theme001-highend-responsible-setting.php' ); } ?>
<div id="ta-setting-form">
  <!-- タイトルとタブ -->
  <div id="ta-menu-group">
    <div id="ta-menu-title-container">
      <h2 id="ta-menu-title">TAフォーマット・『レスポンシブデザイン』フッター設定メニュー</h2>
      <?php ta_ver_display(); ?>
    </div>
    <a id="ta-menu-talink-anc" href="http://theme001.tec-aid.com/" target="_blank"><div id="ta-menu-talink"></div></a>
  </div>
<?php
ta_development_disp();
ta_setting_scroll();
ta_setting_message_disp();
$ta_tabs = array( 'basic' => '基本設定', 'headline' => 'ヘッドライン（h2～h5）', );
$ta_tabs = apply_filters( 'ta_responsiblefoot_settting_page_tab', $ta_tabs ); //フィルターフック'ta_responsiblefoot_settting_page_tab'を設置
$valid_tab = ta_tab_lists( $ta_tabs );  //タブの設置と有効タブの検出 ?>
  
  
  <?php if ( 'basic' == $valid_tab ) { ?>
  <!-- 基本設定 -->
  <div class="table" id="ta-responsiblefoot-tab-basic">
    <?php ta_setting_form_start( 'responsiblefoot', 'basic' ); ?>
    <table class="ta-setting-table">
      <!-- レスポンシブデザイン<br>フッター基本設定 -->
      <tr>
        <th id="ta_responsible_foot_basic_title" class="big-title"><a href="JavaScript:void(0);">フッター基本設定</a><?php ta_man2_gd( 'resfoot/basic#setting' ); ?></h3>
        <td>
          <div id="ta_responsible_foot_basic_disp" class="init-nodisp">
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <h4>フッターブロック1の表示</h4>
                  <?php ta_alternative_input_checkbox( 'ta_responsible_footer_group1block_onoff', '表示する' ); ?>
                  <p class="res-onoff-exp-under"></p>
                </td>
                <td>
                  <h4>フッターブロック2の表示</h4>
                  <?php ta_alternative_input_checkbox( 'ta_responsible_footer_group2block_onoff', '表示する' ); ?>
                  <p class="res-onoff-exp-under"></p>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <h4>フッター画像の表示</h4>
                  <?php ta_alternative_input_checkbox( 'ta_responsible_footer_footerimg_onoff', '表示する' ); ?>
                  <p class="res-onoff-exp-under" style="margin-bottom:1em;"></p>
                </td>
                <td>
                  <h4>フッター画像の幅</h4>
                  <?php ta_simple_input( 'ta_responsible_footer_footerimg_width', '％', 'short_box' ); ?>
                  <p>※ 端末表示幅に対する比率</p>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>フッター画像代替テキストの太さ</h4>
            <?php ta_fontweight_selection( 'ta_responsible_footer_footerimg_fontweight' ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <?php ta_linkedtext_setting( 
                    'フッター画像代替テキスト',
                    'ta_responsible_footer_footerimg_text_color', 'valid',
                    'ta_responsible_footer_footerimg_text_under',
                    'ta_responsible_footer_footerimg_text_colorhover', 'valid',
                    'ta_responsible_footer_footerimg_text_underhover' ); ?>
            <p>※ 代替テキスト下線はリンク付の場合に有効です</p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <h4>サブフッター画像の表示</h4>
                  <?php ta_alternative_input_checkbox( 'ta_responsible_footer_footerimgsub_onoff', '表示する' ); ?>
                  <p class="res-onoff-exp-under"></p>
                </td>
                <td>
                  <h4>サブフッター画像の幅</h4>
                  <?php ta_simple_input( 'ta_responsible_footer_footerimgsub_width', '％', 'short_box' ); ?>
                  <p>※ 端末表示幅に対する比率</p>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <h4>フッターフリーテキストの表示</h4>
                  <?php ta_alternative_input_checkbox( 'ta_responsible_footer_freetext_onoff', '表示する' ); ?>
                  <p class="res-onoff-exp-under"></p>
                </td>
                <td>
                  <h4>フッターフリーテキスト枠の幅</h4>
                  <?php ta_simple_input( 'ta_responsible_footer_freetext_width', '％', 'short_box' ); ?>
                  <p>※ 端末表示幅に対する比率</p>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <h4>フッターメニューの表示</h4>
                  <?php ta_alternative_input_checkbox( 'ta_responsible_footer_footermenu_onoff', '表示する' ); ?>
                  <p class="res-onoff-exp-under"></p>
                </td>
                <td>
                  <h4>フッターメニュー枠の幅</h4>
                  <?php ta_simple_input( 'ta_responsible_footer_footermenu_width', '％', 'short_box' ); ?>
                  <p>※ 端末表示幅に対する比率</p>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>フッターウィジェットの表示</h4>
            <?php ta_alternative_input_checkbox( 'ta_responsible_footer_widgetarea_onoff', '表示する' ); ?>
            <p class="res-onoff-exp-under"></p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>フッターコンテンツ間隔</h4>
            <?php ta_simple_input( 'ta_responsible_footer_fixed_space', 'ピクセル', 'short_box' ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
             <!-- 詳細設定 -->
            <h4 id="ta_responsible_footer_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
            <div id="ta_responsible_footer_pro_disp" class="pro-disp init-nodisp">
              <h4>フッターのレスポンシブデザイン共通フォントサイズ</h4>
              <?php ta_simple_input( 'ta_responsible_footer_font_size', '％', 'short_box' ); ?>
              <p>※ フッター内の一般フォントに適応されます</p>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <?php ta_paragraph_setting( 'ta_responsible_footer_font', 'フッター', 'responsive_check' ); ?>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>コンテンツフレームとフッターとの間隔</h4>
              <?php ta_simple_input( 'ta_responsible_footer_top_padding', 'ピクセル', 'short_box' ); ?>
              <p>※ メイン、サイドバー、サブサイドバーをまとめてコンテンツフレームと呼びます</p>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>フッターブロック1上部余白</h4>
                    <?php ta_simple_input( 'ta_responsible_footer_group1block_margintop', 'ピクセル', 'short_box' ); ?>
                  </td>
                  <td>
                    <h4>フッターブロック2上部余白</h4>
                    <?php ta_simple_input( 'ta_responsible_footer_group2block_margintop', 'ピクセル', 'short_box' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>フッターウィジェットエリアのセンタリング</h4>
              <?php ta_alternative_input_checkbox( 'ta_responsible_footer_widgetarea_centering', 'センタリングする' ); ?>
              <p>※ センタリングできないウィジェットもあります</p>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-3contents-table">
                <tr>
                  <td>
                    <h4>コピーライト上部余白</h4>
                    <?php ta_simple_input( 'ta_responsible_footer_copyrightcontainer_paddingtop', 'ピクセル', 'short_box' ); ?>
                  </td>
                  <td>
                    <h4>コピーライト下部余白</h4>
                    <?php ta_simple_input( 'ta_responsible_footer_copyrightcontainer_paddingbottom', 'ピクセル', 'short_box' ); ?>
                  </td>
                  <td>
                    <h4>コピーライトの上下枠幅</h4>
                    <?php ta_simple_input( 'ta_responsible_footer_copyright_padding', 'ピクセル', 'short_box' ); ?>
                    <p>※ 上下に同じ幅ののりしろができます</p>
                  </td>
                </tr>
              </table>
            </div><!-- end of #ta_responsible_footer_pro_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_responsible_foot_basic_disp -->
        </td>
      </tr>
      <!-- レスポンシブデザイン時のフッター背景色・背景画像 -->
      <tr>
        <?php ta_common_frame_setting( 'ta_responsible_footer_frame', 'フッター<br>背景色・背景画像', 'invalid', 'valid' ); ?>
      </tr>
    </table>
    <?php ta_setting_form_end( 'responsiblefoot', 'レスポンシブデザイン『フッター基本設定』設定更新', 'basic' ); ?>
  </div><!-- end of #ta-responsiblefoot-tab-footer -->
  <?php } ?>
  
  
  <?php if ( 'headline' == $valid_tab ) { ?>
  <!-- ヘッドライン（h2～h5）-->
  <div class="table" id="ta-responsiblefoot-tab-headline">
    <?php ta_setting_form_start( 'responsiblefoot', 'headline' ); ?>
    <table class="ta-setting-table">
      <!-- h2タイトル -->
      <tr>
        <th id="ta_responsible_footer_h2_setting_title" class="big-title"><a href="JavaScript:void(0);">h2 フッタータイトル</a><?php ta_man2_gd( 'resfoot/hl' ); ?><br><span class="small-font"><?php echo esc_html( '<h2 class="footer_title"></h2>' ) . '<br>' . esc_html( '[footer-h2][/footer-h2]' ); ?></span></th>
        <td>
          <div id="ta_responsible_footer_h2_setting_disp" class="init-nodisp">
            <table class="ta-fullcontents-table">
              <tr>
                <td style="width:20em;">
                  <h4>PCデザイン流用 or レスポンシブ専用</h4>
                  <?php ta_alternative_input_checkbox( 'ta_responsible_footer_h2_senyo_onoff', 'レスポンシブ専用を使用する' ); ?>
                </td>
                <td>
                  <h4>PCデザイン流用時のフォントサイズ</h4>
                  <?php ta_simple_input( 'ta_responsible_footer_h2_size2common', '％', 'short_box' ); ?>
                  <p>※ フッターレスポンシブデザイン共通フォントサイズに対する比率</p>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4 id="ta_responsible_footer_h2_title" class="pro-title"><a href="JavaScript:void(0);">h2レスポンシブ専用設定</a></h4>
            <div id="ta_responsible_footer_h2_disp" class="pro-disp init-nodisp">
              <div class="h2_area">
                <?php ta_headline_confirm( 'ta_responsible_footer_h2', 'h2', 'footer_title' ); ?>
              </div>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <?php ta_responsive_headline_register( 'ta_responsible_footer_h2', 'none' ); ?>
            </div><!-- end of #ta_responsible_footer_h2_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_responsible_sidebar_h2_setting_disp -->
        </td>
      </tr>
      <!-- h3タイトル -->
      <tr>
        <th id="ta_responsible_footer_h3_setting_title" class="big-title"><a href="JavaScript:void(0);">h3 フッタータイトル</a><?php ta_man2_gd( 'resfoot/hl' ); ?><br><span class="small-font"><?php echo esc_html( '<h3 class="footer_title"></h3>' ) . '<br>' . esc_html( '[footer-h3][/footer-h3]' ); ?></span></th>
        <td>
          <div id="ta_responsible_footer_h3_setting_disp" class="init-nodisp">
            <table class="ta-fullcontents-table">
              <tr>
                <td style="width:20em;">
                  <h4>PCデザイン流用 or レスポンシブ専用</h4>
                  <?php ta_alternative_input_checkbox( 'ta_responsible_footer_h3_senyo_onoff', 'レスポンシブ専用を使用する' ); ?>
                </td>
                <td>
                  <h4>PCデザイン流用時のフォントサイズ</h4>
                  <?php ta_simple_input( 'ta_responsible_footer_h3_size2common', '％', 'short_box' ); ?>
                  <p>※ フッターレスポンシブデザイン共通フォントサイズに対する比率</p>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4 id="ta_responsible_footer_h3_title" class="pro-title"><a href="JavaScript:void(0);">h3レスポンシブ専用設定</a></h4>
            <div id="ta_responsible_footer_h3_disp" class="pro-disp init-nodisp">
              <div class="h3_area">
                <?php ta_headline_confirm( 'ta_responsible_footer_h3', 'h3', 'footer_title' ); ?>
              </div>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <?php ta_responsive_headline_register( 'ta_responsible_footer_h3', 'none' ); ?>
            </div><!-- end of #ta_responsible_footer_h3_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_responsible_sidebar_h3_setting_disp -->
        </td>
      </tr>
      <!-- h4タイトル -->
      <tr>
        <th id="ta_responsible_footer_h4_setting_title" class="big-title"><a href="JavaScript:void(0);">h4 フッタータイトル</a><?php ta_man2_gd( 'resfoot/hl' ); ?><br><span class="small-font"><?php echo esc_html( '<h4 class="footer_title"></h4>' ) . '<br>' . esc_html( '[footer-h4][/footer-h4]' ); ?></span></th>
        <td>
          <div id="ta_responsible_footer_h4_setting_disp" class="init-nodisp">
            <table class="ta-fullcontents-table">
              <tr>
                <td style="width:20em;">
                  <h4>PCデザイン流用 or レスポンシブ専用</h4>
                  <?php ta_alternative_input_checkbox( 'ta_responsible_footer_h4_senyo_onoff', 'レスポンシブ専用を使用する' ); ?>
                </td>
                <td>
                  <h4>PCデザイン流用時のフォントサイズ</h4>
                  <?php ta_simple_input( 'ta_responsible_footer_h4_size2common', '％', 'short_box' ); ?>
                  <p>※ フッターレスポンシブデザイン共通フォントサイズに対する比率</p>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4 id="ta_responsible_footer_h4_title" class="pro-title"><a href="JavaScript:void(0);">h4レスポンシブ専用設定</a></h4>
            <div id="ta_responsible_footer_h4_disp" class="pro-disp init-nodisp">
              <div class="h4_area">
                <?php ta_headline_confirm( 'ta_responsible_footer_h4', 'h4', 'footer_title' ); ?>
              </div>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <?php ta_responsive_headline_register( 'ta_responsible_footer_h4', 'none' ); ?>
            </div><!-- end of #ta_responsible_footer_h4_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_responsible_sidebar_h4_setting_disp -->
        </td>
      </tr>
      <!-- h5タイトル -->
      <tr>
        <th id="ta_responsible_footer_h5_setting_title" class="big-title"><a href="JavaScript:void(0);">h5 フッタータイトル</a><?php ta_man2_gd( 'resfoot/hl' ); ?><br><span class="small-font"><?php echo esc_html( '<h5 class="footer_title"></h5>' ) . '<br>' . esc_html( '[footer-h5][/footer-h5]' ); ?></span></th>
        <td>
          <div id="ta_responsible_footer_h5_setting_disp" class="init-nodisp">
            <table class="ta-fullcontents-table">
              <tr>
                <td style="width:20em;">
                  <h4>PCデザイン流用 or レスポンシブ専用</h4>
                  <?php ta_alternative_input_checkbox( 'ta_responsible_footer_h5_senyo_onoff', 'レスポンシブ専用を使用する' ); ?>
                </td>
                <td>
                  <h4>PCデザイン流用時のフォントサイズ</h4>
                  <?php ta_simple_input( 'ta_responsible_footer_h5_size2common', '％', 'short_box' ); ?>
                  <p>※ フッターレスポンシブデザイン共通フォントサイズに対する比率</p>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4 id="ta_responsible_footer_h5_title" class="pro-title"><a href="JavaScript:void(0);">h5レスポンシブ専用設定</a></h4>
            <div id="ta_responsible_footer_h5_disp" class="pro-disp init-nodisp">
              <div class="h5_area">
                <?php ta_headline_confirm( 'ta_responsible_footer_h5', 'h5', 'footer_title' ); ?>
              </div>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <?php ta_responsive_headline_register( 'ta_responsible_footer_h5', 'none' ); ?>
            </div><!-- end of #ta_responsible_footer_h5_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_responsible_sidebar_h5_setting_disp -->
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'responsiblefoot', 'レスポンシブデザイン『フッターヘッドライン（h2～h5）』設定更新', 'headline' ); ?>
  </div><!-- end of #ta-responsiblefoot-tab-headline -->
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
