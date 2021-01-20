<?php
/*******************************************************************************************************/
/*
/* テックエイドの成長する自作ホームページWordPressテーマ『 TAテーマ001 (ta-theme001) 』
/*
/* ta-responsiblesidesub-setting.php: ( Latest Version 2.00 2017.02.20 )
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
      <h2 id="ta-menu-title">TAフォーマット・『レスポンシブデザイン』サブサイドバー設定メニュー</h2>
      <?php ta_ver_display(); ?>
    </div>
    <a id="ta-menu-talink-anc" href="http://theme001.tec-aid.com/" target="_blank"><div id="ta-menu-talink"></div></a>
  </div>
<?php
ta_development_disp();
ta_setting_scroll();
ta_setting_message_disp();
$ta_tabs = array( 'basic' => '基本設定', 'headline' => 'ヘッドライン（h2～h5）', );
$ta_tabs = apply_filters( 'ta_responsiblesidesub_settting_page_tab', $ta_tabs ); //フィルターフック'ta_responsiblesidesub_settting_page_tab'を設置
$valid_tab = ta_tab_lists( $ta_tabs );  //タブの設置と有効タブの検出 ?>
  
  
  <?php if ( 'basic' == $valid_tab ) { ?>
  <!-- 基本設定 -->
  <div class="table" id="ta-responsiblesidesub-tab-basic">
    <?php ta_setting_form_start( 'responsiblesidesub', 'basic' ); ?>
    <table class="ta-setting-table">
      <!-- レスポンシブデザイン<br>サブサイドバー基本設定 -->
      <tr>
        <th id="ta_responsible_sidesub_basic_title" class="big-title"><a href="JavaScript:void(0);">サブサイドバー基本設定</a><?php ta_man2_gd( 'resside/basic#setting' ); ?></h3>
        <td>
          <div id="ta_responsible_sidesub_basic_disp" class="init-nodisp">
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_responsible_sidebarsub_digest_setting();
} else { ?>
            <h4 style="color:#bbbbbb" class="no-ta-thm001highend">サブサイドバー最新投稿ダイジェスト定位置表示</h4>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4 style="color:#bbbbbb" class="no-ta-thm001highend">サブサイドバー各種投稿ダイジェスト定位置一括表示</h4>
<?php
} ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>サブサイドバーウィジェットエリアの表示</h4>
            <?php ta_alternative_input_checkbox( 'ta_responsible_sidebarsub_widgetarea_onoff', '表示する' ); ?>
            <p class="res-onoff-exp-under"></p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>サブサイドバーコンテンツ間隔</h4>
            <?php ta_simple_input( 'ta_responsible_sidebarsub_fixed_space', 'ピクセル', 'short_box' ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <!-- 詳細設定 -->
            <h4 id="ta_responsible_sidebarsub_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
            <div id="ta_responsible_sidebarsub_pro_disp" class="pro-disp init-nodisp">
              <h4>サブサイドバーのレスポンシブデザイン共通フォントサイズ</h4>
              <?php ta_simple_input( 'ta_responsible_sidebarsub_font_size', '％', 'short_box' ); ?>
              <p>※ サブサイドバー内の一般フォントに適応されます</p>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <?php ta_paragraph_setting( 'ta_responsible_sidebarsub_font', 'サブサイドバー', 'responsive_check' ); ?>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-3contents-table">
                <tr>
                  <td>
                    <h4>サブサイドバーの上側余白</h4>
                    <?php ta_simple_input( 'ta_responsible_sidebarsub_top_margin', 'ピクセル', 'short_box' ); ?>
                  </td>
                  <td>
                    <h4>サブサイドバーの下側余白</h4>
                    <?php ta_simple_input( 'ta_responsible_sidebarsub_bottom_margin', 'ピクセル', 'short_box' ); ?>
                  </td>
                  <td>
                    <h4>サブサイドバーの上下枠幅</h4>
                    <?php ta_simple_input( 'ta_responsible_sidebarsub_tb_padding', 'ピクセル', 'short_box' ); ?>
                    <p>※ 上下に同じ幅ののりしろができます</p>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>サブサイドバーウィジェットエリアのセンタリング</h4>
              <?php ta_alternative_input_checkbox( 'ta_responsible_sidebarsub_widgetarea_centering', 'センタリングする' ); ?>
              <p>※ センタリングできないウィジェットもあります</p>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>サブサイドバー上側に区切り線を表示する</h4>
              <?php ta_alternative_input_checkbox( 'ta_responsible_sidebarsub_top_border_onoff', '区切り線を表示する' ); ?>
              <p>※ アディショナルモード時は下側</p>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-3contents-table">
                <tr>
                  <td>
                    <h4>区切り線の種類</h4>
                    <?php $init = ta_read_op( 'ta_responsible_sidebarsub_top_border_kind' ); ?>
                    <table class="ta-fullcontents-table">
                      <tr>
                        <td style="width:7em;">
                          <p><input type="radio" name="ta_responsible_sidebarsub_top_border_kind" value="solid" <?php if ( "solid" == $init ) echo 'checked="checked"' ?>> 実線</p>
                        </td>
                        <td>
                          <p><input type="radio" name="ta_responsible_sidebarsub_top_border_kind" value="double" <?php if ( "double" == $init ) echo 'checked="checked"' ?>> 二重線</p>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <p><input type="radio" name="ta_responsible_sidebarsub_top_border_kind" value="dotted" <?php if ( "dotted" == $init ) echo 'checked="checked"' ?>> 点線</p>
                        </td>
                        <td>
                          <p><input type="radio" name="ta_responsible_sidebarsub_top_border_kind" value="groove" <?php if ( "groove" == $init ) echo 'checked="checked"' ?>> groove</p>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <p><input type="radio" name="ta_responsible_sidebarsub_top_border_kind" value="dashed" <?php if ( "dashed" == $init ) echo 'checked="checked"' ?>> 破線</p>
                        </td>
                        <td>
                          <p><input type="radio" name="ta_responsible_sidebarsub_top_border_kind" value="ridge" <?php if ( "ridge" == $init ) echo 'checked="checked"' ?>> ridge</p>
                        </td>
                      </tr>
                    </table>
                  </td>
                  <td>
                    <h4>区切り線の太さ</h4>
                    <?php ta_simple_input( 'ta_responsible_sidebarsub_top_border_size', 'ピクセル', 'short_box' ); ?>
                  </td>
                  <td>
                    <h4>区切り線の色</h4>
                    <?php ta_color_picker_no_tomei_process( 'ta_responsible_sidebarsub_top_border_color', 'valid' ); ?>
                  </td>
                </tr>
              </table>
            </div><!-- end of #ta_responsible_sidebarsub_pro_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_responsible_sidesub_basic_disp -->
        </td>
      </tr>
      <!-- レスポンシブデザイン時のサブサイドバーの背景色・背景画像 -->
      <tr>
        <?php ta_highend_frame_setting( 'ta_responsible_sidebarsub_frame', 'サブサイドバー<br>背景色・背景画像' ); ?>
      </tr>
    </table>
    <?php ta_setting_form_end( 'responsiblesidesub', 'レスポンシブデザイン『サブサイドバー基本設定』設定更新', 'basic' ); ?>
  </div><!-- end of #ta-responsiblesidesub-tab-sidebarsub -->
  <?php } ?>
  
  
  <?php if ( 'headline' == $valid_tab ) { ?>
  <!-- ヘッドライン（h2～h5）-->
  <div class="table" id="ta-responsiblesidesub-tab-headline">
    <?php ta_setting_form_start( 'responsiblesidesub', 'headline' ); ?>
    <table class="ta-setting-table">
      <!-- h2タイトル -->
      <tr>
        <th id="ta_responsible_sidebarsub_h2_setting_title" class="big-title"><a href="JavaScript:void(0);">h2 サブサイドバータイトル</a><?php ta_man2_gd( 'resside/hl' ); ?><br><span class="small-font"><?php echo esc_html( '<h2 class="sidebarsub_title"></h2>' ) . '<br>' . esc_html( '[sidebarsub-h2][/sidebarsub-h2]' ); ?></span></th>
        <td>
          <div id="ta_responsible_sidebarsub_h2_setting_disp" class="init-nodisp">
            <table class="ta-fullcontents-table">
              <tr>
                <td style="width:20em;">
                  <h4>PCデザイン流用 or レスポンシブ専用</h4>
                  <?php ta_alternative_input_checkbox( 'ta_responsible_sidebarsub_h2_senyo_onoff', 'レスポンシブ専用を使用する' ); ?>
                </td>
                <td>
                  <h4>PCデザイン流用時のフォントサイズ</h4>
                  <?php ta_simple_input( 'ta_responsible_sidebarsub_h2_size2common', '％', 'short_box' ); ?>
                  <p>※ サブサイドバーレスポンシブデザイン共通フォントサイズに対する比率</p>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4 id="ta_responsible_sidebarsub_h2_title" class="pro-title"><a href="JavaScript:void(0);">h2レスポンシブ専用設定</a></h4>
            <div id="ta_responsible_sidebarsub_h2_disp" class="pro-disp init-nodisp">
              <div class="h2_area">
                <?php ta_headline_confirm( 'ta_responsible_sidebarsub_h2', 'h2', 'sidebarsub_title' ); ?>
              </div>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <?php ta_responsive_headline_register( 'ta_responsible_sidebarsub_h2', 'none' ); ?>
            </div><!-- end of #ta_responsible_sidebarsub_h2_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_responsible_sidebar_h2_setting_disp -->
        </td>
      </tr>
      <!-- h3タイトル -->
      <tr>
        <th id="ta_responsible_sidebarsub_h3_setting_title" class="big-title"><a href="JavaScript:void(0);">h3 サブサイドバータイトル</a><?php ta_man2_gd( 'resside/hl' ); ?><br><span class="small-font"><?php echo esc_html( '<h3 class="sidebarsub_title"></h3>' ) . '<br>' . esc_html( '[sidebarsub-h3][/sidebarsub-h3]' ); ?></span></th>
        <td>
          <div id="ta_responsible_sidebarsub_h3_setting_disp" class="init-nodisp">
            <table class="ta-fullcontents-table">
              <tr>
                <td style="width:20em;">
                  <h4>PCデザイン流用 or レスポンシブ専用</h4>
                  <?php ta_alternative_input_checkbox( 'ta_responsible_sidebarsub_h3_senyo_onoff', 'レスポンシブ専用を使用する' ); ?>
                </td>
                <td>
                  <h4>PCデザイン流用時のフォントサイズ</h4>
                  <?php ta_simple_input( 'ta_responsible_sidebarsub_h3_size2common', '％', 'short_box' ); ?>
                  <p>※ サブサイドバーレスポンシブデザイン共通フォントサイズに対する比率</p>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4 id="ta_responsible_sidebarsub_h3_title" class="pro-title"><a href="JavaScript:void(0);">h3レスポンシブ専用設定</a></h4>
            <div id="ta_responsible_sidebarsub_h3_disp" class="pro-disp init-nodisp">
              <div class="h3_area">
                <?php ta_headline_confirm( 'ta_responsible_sidebarsub_h3', 'h3', 'sidebarsub_title' ); ?>
              </div>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <?php ta_responsive_headline_register( 'ta_responsible_sidebarsub_h3', 'none' ); ?>
            </div><!-- end of #ta_responsible_sidebarsub_h3_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_responsible_sidebar_h3_setting_disp -->
        </td>
      </tr>
      <!-- h4タイトル -->
      <tr>
        <th id="ta_responsible_sidebarsub_h4_setting_title" class="big-title"><a href="JavaScript:void(0);">h4 サブサイドバータイトル</a><?php ta_man2_gd( 'resside/hl' ); ?><br><span class="small-font"><?php echo esc_html( '<h4 class="sidebarsub_title"></h4>' ) . '<br>' . esc_html( '[sidebarsub-h4][/sidebarsub-h4]' ); ?></span></th>
        <td>
          <div id="ta_responsible_sidebarsub_h4_setting_disp" class="init-nodisp">
            <table class="ta-fullcontents-table">
              <tr>
                <td style="width:20em;">
                  <h4>PCデザイン流用 or レスポンシブ専用</h4>
                  <?php ta_alternative_input_checkbox( 'ta_responsible_sidebarsub_h4_senyo_onoff', 'レスポンシブ専用を使用する' ); ?>
                </td>
                <td>
                  <h4>PCデザイン流用時のフォントサイズ</h4>
                  <?php ta_simple_input( 'ta_responsible_sidebarsub_h4_size2common', '％', 'short_box' ); ?>
                  <p>※ サブサイドバーレスポンシブデザイン共通フォントサイズに対する比率</p>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4 id="ta_responsible_sidebarsub_h4_title" class="pro-title"><a href="JavaScript:void(0);">h4レスポンシブ専用設定</a></h4>
            <div id="ta_responsible_sidebarsub_h4_disp" class="pro-disp init-nodisp">
              <div class="h4_area">
                <?php ta_headline_confirm( 'ta_responsible_sidebarsub_h4', 'h4', 'sidebarsub_title' ); ?>
              </div>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <?php ta_responsive_headline_register( 'ta_responsible_sidebarsub_h4', 'none' ); ?>
            </div><!-- end of #ta_responsible_sidebarsub_h4_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_responsible_sidebar_h4_setting_disp -->
        </td>
      </tr>
      <!-- h5タイトル -->
      <tr>
        <th id="ta_responsible_sidebarsub_h5_setting_title" class="big-title"><a href="JavaScript:void(0);">h5 サブサイドバータイトル</a><?php ta_man2_gd( 'resside/hl' ); ?><br><span class="small-font"><?php echo esc_html( '<h5 class="sidebarsub_title"></h5>' ) . '<br>' . esc_html( '[sidebarsub-h5][/sidebarsub-h5]' ); ?></span></th>
        <td>
          <div id="ta_responsible_sidebarsub_h5_setting_disp" class="init-nodisp">
            <table class="ta-fullcontents-table">
              <tr>
                <td style="width:20em;">
                  <h4>PCデザイン流用 or レスポンシブ専用</h4>
                  <?php ta_alternative_input_checkbox( 'ta_responsible_sidebarsub_h5_senyo_onoff', 'レスポンシブ専用を使用する' ); ?>
                </td>
                <td>
                  <h4>PCデザイン流用時のフォントサイズ</h4>
                  <?php ta_simple_input( 'ta_responsible_sidebarsub_h5_size2common', '％', 'short_box' ); ?>
                  <p>※ サブサイドバーレスポンシブデザイン共通フォントサイズに対する比率</p>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4 id="ta_responsible_sidebarsub_h5_title" class="pro-title"><a href="JavaScript:void(0);">h5レスポンシブ専用設定</a></h4>
            <div id="ta_responsible_sidebarsub_h5_disp" class="pro-disp init-nodisp">
              <div class="h5_area">
                <?php ta_headline_confirm( 'ta_responsible_sidebarsub_h5', 'h5', 'sidebarsub_title' ); ?>
              </div>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <?php ta_responsive_headline_register( 'ta_responsible_sidebarsub_h5', 'none' ); ?>
            </div><!-- end of #ta_responsible_sidebarsub_h5_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_responsible_sidebar_h5_setting_disp -->
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'responsiblesidesub', 'レスポンシブデザイン『サブサイドバーヘッドライン（h2～h5）』設定更新', 'headline' ); ?>
  </div><!-- end of #ta-responsiblesidesub-tab-headline -->
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
