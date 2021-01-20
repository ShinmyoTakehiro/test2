<?php
/*******************************************************************************************************/
/*
/* テックエイドの成長する自作ホームページWordPressテーマ『 TAテーマ001 (ta-theme001) 』
/*
/* ta-responsibleside-setting.php: ( Latest Version 2.00 2017.02.20 )
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
      <h2 id="ta-menu-title">TAフォーマット・『レスポンシブデザイン』サイドバー設定メニュー</h2>
      <?php ta_ver_display(); ?>
    </div>
    <a id="ta-menu-talink-anc" href="http://theme001.tec-aid.com/" target="_blank"><div id="ta-menu-talink"></div></a>
  </div>
<?php
ta_development_disp();
ta_setting_scroll();
ta_setting_message_disp();
$ta_tabs = array( 'basic' => '基本設定', 'headline' => 'ヘッドライン（h2～h5）', 'decoline' => '装飾（1～4）', );
$ta_tabs = apply_filters( 'ta_responsibleside_settting_page_tab', $ta_tabs ); //フィルターフック'ta_responsibleside_settting_page_tab'を設置
$valid_tab = ta_tab_lists( $ta_tabs );  //タブの設置と有効タブの検出 ?>
  
  
  <?php if ( 'basic' == $valid_tab ) { ?>
  <!-- 基本設定 -->
  <div class="table" id="ta-responsibleside-tab-basic">
    <?php ta_setting_form_start( 'responsibleside', 'basic' ); ?>
    <table class="ta-setting-table">
      <!-- レスポンシブデザイン<br>サイドバー基本設定 -->
      <tr>
        <th id="ta_responsible_side_basic_title" class="big-title"><a href="JavaScript:void(0);">サイドバー基本設定</a><?php ta_man2_gd( 'resside/basic#setting' ); ?></th>
        <td>
          <div id="ta_responsible_side_basic_disp" class="init-nodisp">
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_responsible_sidebar_latestposts_setting();
} else { ?>
            <h4 style="color:#bbbbbb" class="no-ta-thm001highend">サイドバー最新投稿ダイジェスト定位置表示</h4>
<?php
} ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>サイドバー各種投稿ダイジェスト定位置一括表示</h4>
            <?php ta_alternative_input_checkbox( 'ta_responsible_sidebar_postdigest_onoff', '表示する' ); ?>
            <p class="res-onoff-exp-under"></p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>サイドバーウィジェットエリアの表示</h4>
            <?php ta_alternative_input_checkbox( 'ta_responsible_sidebar_widgetarea_onoff', '表示する' ); ?>
            <p class="res-onoff-exp-under"></p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>サイドバーコンテンツ間隔</h4>
            <?php ta_simple_input( 'ta_responsible_sidebar_fixed_space', 'ピクセル', 'short_box' ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <!-- 詳細設定 -->
            <h4 id="ta_responsible_sidebar_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
            <div id="ta_responsible_sidebar_pro_disp" class="pro-disp init-nodisp">
              <h4>サイドバーのレスポンシブデザイン共通フォントサイズ</h4>
              <?php ta_simple_input( 'ta_responsible_sidebar_font_size', '％', 'short_box' ); ?>
              <p>※ サイドバー内の一般フォントに適応されます</p>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <?php ta_paragraph_setting( 'ta_responsible_sidebar_font', 'サイドバー', 'responsive_check' ); ?>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-3contents-table">
                <tr>
                  <td>
                    <h4>サイドバーの上側余白</h4>
                    <?php ta_simple_input( 'ta_responsible_sidebar_top_margin', 'ピクセル', 'short_box' ); ?>
                  </td>
                  <td>
                    <h4>サイドバーの下側余白</h4>
                    <?php ta_simple_input( 'ta_responsible_sidebar_bottom_margin', 'ピクセル', 'short_box' ); ?>
                  </td>
                  <td>
                    <h4>サイドバーの上下枠幅</h4>
                    <?php ta_simple_input( 'ta_responsible_sidebar_tb_padding', 'ピクセル', 'short_box' ); ?>
                    <p>※ 上下に同じ幅ののりしろができます</p>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>サイドバーウィジェットエリアのセンタリング</h4>
              <?php ta_alternative_input_checkbox( 'ta_responsible_sidebar_widgetarea_centering', 'センタリングする' ); ?>
              <p>※ センタリングできないウィジェットもあります</p>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>サイドバー上側に区切り線を表示する</h4>
              <?php ta_alternative_input_checkbox( 'ta_responsible_sidebar_top_border_onoff', '区切り線を表示する' ); ?>
              <p>※ アディショナルモード時は下側</p>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-3contents-table">
                <tr>
                  <td>
                    <h4>区切り線の種類</h4>
                    <?php $init = ta_read_op( 'ta_responsible_sidebar_top_border_kind' ); ?>
                    <table class="ta-fullcontents-table">
                      <tr>
                        <td style="width:7em;">
                          <p><input type="radio" name="ta_responsible_sidebar_top_border_kind" value="solid" <?php if ( "solid" == $init ) echo 'checked="checked"' ?>> 実線</p>
                        </td>
                        <td>
                          <p><input type="radio" name="ta_responsible_sidebar_top_border_kind" value="double" <?php if ( "double" == $init ) echo 'checked="checked"' ?>> 二重線</p>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <p><input type="radio" name="ta_responsible_sidebar_top_border_kind" value="dotted" <?php if ( "dotted" == $init ) echo 'checked="checked"' ?>> 点線</p>
                        </td>
                        <td>
                          <p><input type="radio" name="ta_responsible_sidebar_top_border_kind" value="groove" <?php if ( "groove" == $init ) echo 'checked="checked"' ?>> groove</p>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <p><input type="radio" name="ta_responsible_sidebar_top_border_kind" value="dashed" <?php if ( "dashed" == $init ) echo 'checked="checked"' ?>> 破線</p>
                        </td>
                        <td>
                          <p><input type="radio" name="ta_responsible_sidebar_top_border_kind" value="ridge" <?php if ( "ridge" == $init ) echo 'checked="checked"' ?>> ridge</p>
                        </td>
                      </tr>
                    </table>
                  </td>
                  <td>
                    <h4>区切り線の太さ</h4>
                    <?php ta_simple_input( 'ta_responsible_sidebar_top_border_size', 'ピクセル', 'short_box' ); ?>
                  </td>
                  <td>
                    <h4>区切り線の色</h4>
                    <?php ta_color_picker_no_tomei_process( 'ta_responsible_sidebar_top_border_color', 'valid' ); ?>
                  </td>
                </tr>
              </table>
            </div><!-- end of #ta_responsible_sidebar_pro_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_responsible_side_basic_disp -->
        </td>
      </tr>
      <!-- レスポンシブデザイン時のサイドバーの背景色・背景画像 -->
      <tr>
        <?php ta_highend_frame_setting( 'ta_responsible_sidebar_frame', 'サイドバー<br>背景色・背景画像' ); ?>
      </tr>
    </table>
    <?php ta_setting_form_end( 'responsibleside', 'レスポンシブデザイン『サイドバー基本設定』設定更新', 'basic' ); ?>
  </div><!-- end of #ta-responsibleside-tab-sidebar -->
  <?php } ?>
  
  
  <?php if ( 'headline' == $valid_tab ) { ?>
  <!-- ヘッドライン（h2～h5）-->
  <div class="table" id="ta-responsibleside-tab-headline">
    <?php ta_setting_form_start( 'responsibleside', 'headline' ); ?>
    <table class="ta-setting-table">
      <!-- h2タイトル -->
      <tr>
        <th id="ta_responsible_sidebar_h2_setting_title" class="big-title"><a href="JavaScript:void(0);">h2 サイドバータイトル</a><?php ta_man2_gd( 'resside/hl' ); ?><br><span class="small-font"><?php echo esc_html( '<h2 class="sidebar_title"></h2>' ) . '<br>' . esc_html( '[sidebar-h2][/sidebar-h2]' ); ?></span></th>
        <td>
          <div id="ta_responsible_sidebar_h2_setting_disp" class="init-nodisp">
            <table class="ta-fullcontents-table">
              <tr>
                <td style="width:20em;">
                  <h4>PCデザイン流用 or レスポンシブ専用</h4>
                  <?php ta_alternative_input_checkbox( 'ta_responsible_sidebar_h2_senyo_onoff', 'レスポンシブ専用を使用する' ); ?>
                </td>
                <td>
                  <h4>PCデザイン流用時のフォントサイズ</h4>
                  <?php ta_simple_input( 'ta_responsible_sidebar_h2_size2common', '％', 'short_box' ); ?>
                  <p>※ サイドバーレスポンシブデザイン共通フォントサイズに対する比率</p>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4 id="ta_responsible_sidebar_h2_title" class="pro-title"><a href="JavaScript:void(0);">h2レスポンシブ専用設定</a></h4>
            <div id="ta_responsible_sidebar_h2_disp" class="pro-disp init-nodisp">
              <div class="h2_area">
                <?php ta_headline_confirm( 'ta_responsible_sidebar_h2', 'h2', 'sidebar_title' ); ?>
              </div>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <?php ta_responsive_headline_register( 'ta_responsible_sidebar_h2', 'none' ); ?>
            </div><!-- end of #ta_responsible_sidebar_h2_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_responsible_sidebar_h2_setting_disp -->
        </td>
      </tr>
      <!-- h3タイトル -->
      <tr>
        <th id="ta_responsible_sidebar_h3_setting_title" class="big-title"><a href="JavaScript:void(0);">h3 サイドバータイトル</a><?php ta_man2_gd( 'resside/hl' ); ?><br><span class="small-font"><?php echo esc_html( '<h3 class="sidebar_title"></h3>' ) . '<br>' . esc_html( '[sidebar-h3][/sidebar-h3]' ); ?></span></th>
        <td>
          <div id="ta_responsible_sidebar_h3_setting_disp" class="init-nodisp">
            <table class="ta-fullcontents-table">
              <tr>
                <td style="width:20em;">
                  <h4>PCデザイン流用 or レスポンシブ専用</h4>
                  <?php ta_alternative_input_checkbox( 'ta_responsible_sidebar_h3_senyo_onoff', 'レスポンシブ専用を使用する' ); ?>
                </td>
                <td>
                  <h4>PCデザイン流用時のフォントサイズ</h4>
                  <?php ta_simple_input( 'ta_responsible_sidebar_h3_size2common', '％', 'short_box' ); ?>
                  <p>※ サイドバーレスポンシブデザイン共通フォントサイズに対する比率</p>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4 id="ta_responsible_sidebar_h3_title" class="pro-title"><a href="JavaScript:void(0);">h3レスポンシブ専用設定</a></h4>
            <div id="ta_responsible_sidebar_h3_disp" class="pro-disp init-nodisp">
              <div class="h3_area">
                <?php ta_headline_confirm( 'ta_responsible_sidebar_h3', 'h3', 'sidebar_title' ); ?>
              </div>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <?php ta_responsive_headline_register( 'ta_responsible_sidebar_h3', 'none' ); ?>
            </div><!-- end of #ta_responsible_sidebar_h3_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_responsible_sidebar_h3_setting_disp -->
        </td>
      </tr>
      <!-- h4タイトル -->
      <tr>
        <th id="ta_responsible_sidebar_h4_setting_title" class="big-title"><a href="JavaScript:void(0);">h4 サイドバータイトル</a><?php ta_man2_gd( 'resside/hl' ); ?><br><span class="small-font"><?php echo esc_html( '<h4 class="sidebar_title"></h4>' ) . '<br>' . esc_html( '[sidebar-h4][/sidebar-h4]' ); ?></span></th>
        <td>
          <div id="ta_responsible_sidebar_h4_setting_disp" class="init-nodisp">
            <table class="ta-fullcontents-table">
              <tr>
                <td style="width:20em;">
                  <h4>PCデザイン流用 or レスポンシブ専用</h4>
                  <?php ta_alternative_input_checkbox( 'ta_responsible_sidebar_h4_senyo_onoff', 'レスポンシブ専用を使用する' ); ?>
                </td>
                <td>
                  <h4>PCデザイン流用時のフォントサイズ</h4>
                  <?php ta_simple_input( 'ta_responsible_sidebar_h4_size2common', '％', 'short_box' ); ?>
                  <p>※ サイドバーレスポンシブデザイン共通フォントサイズに対する比率</p>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4 id="ta_responsible_sidebar_h4_title" class="pro-title"><a href="JavaScript:void(0);">h4レスポンシブ専用設定</a></h4>
            <div id="ta_responsible_sidebar_h4_disp" class="pro-disp init-nodisp">
              <div class="h4_area">
                <?php ta_headline_confirm( 'ta_responsible_sidebar_h4', 'h4', 'sidebar_title' ); ?>
              </div>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <?php ta_responsive_headline_register( 'ta_responsible_sidebar_h4', 'none' ); ?>
            </div><!-- end of #ta_responsible_sidebar_h4_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_responsible_sidebar_h4_setting_disp -->
        </td>
      </tr>
      <!-- h5タイトル -->
      <tr>
        <th id="ta_responsible_sidebar_h5_setting_title" class="big-title"><a href="JavaScript:void(0);">h5 サイドバータイトル</a><?php ta_man2_gd( 'resside/hl' ); ?><br><span class="small-font"><?php echo esc_html( '<h5 class="sidebar_title"></h5>' ) . '<br>' . esc_html( '[sidebar-h5][/sidebar-h5]' ); ?></span></th>
        <td>
          <div id="ta_responsible_sidebar_h5_setting_disp" class="init-nodisp">
            <table class="ta-fullcontents-table">
              <tr>
                <td style="width:20em;">
                  <h4>PCデザイン流用 or レスポンシブ専用</h4>
                  <?php ta_alternative_input_checkbox( 'ta_responsible_sidebar_h5_senyo_onoff', 'レスポンシブ専用を使用する' ); ?>
                </td>
                <td>
                  <h4>PCデザイン流用時のフォントサイズ</h4>
                  <?php ta_simple_input( 'ta_responsible_sidebar_h5_size2common', '％', 'short_box' ); ?>
                  <p>※ サイドバーレスポンシブデザイン共通フォントサイズに対する比率</p>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4 id="ta_responsible_sidebar_h5_title" class="pro-title"><a href="JavaScript:void(0);">h5レスポンシブ専用設定</a></h4>
            <div id="ta_responsible_sidebar_h5_disp" class="pro-disp init-nodisp">
              <div class="h5_area">
                <?php ta_headline_confirm( 'ta_responsible_sidebar_h5', 'h5', 'sidebar_title' ); ?>
              </div>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <?php ta_responsive_headline_register( 'ta_responsible_sidebar_h5', 'none' ); ?>
            </div><!-- end of #ta_responsible_sidebar_h5_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_responsible_sidebar_h4_setting_disp -->
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'responsibleside', 'レスポンシブデザイン『サイドバーヘッドライン（h2～h5）』設定更新', 'headline' ); ?>
  </div><!-- end of #ta-responsibleside-tab-headline -->
  <?php } ?>
  
  
  <?php if ( 'decoline' == $valid_tab ) { ?>
  <!-- 装飾（1～4）-->
  <div class="table" id="ta-responsibleside-tab-decoline">
<?php
if ( TA_HIEND_PI ) { ?>
    <?php ta_setting_form_start( 'responsibleside', 'decoline' ); ?>
    <table class="ta-setting-table">
<?php
  ta_thm001highend_responsible_sidebar_deco_setting( 1 );
  ta_thm001highend_responsible_sidebar_deco_setting( 2 );
  ta_thm001highend_responsible_sidebar_deco_setting( 3 );
  ta_thm001highend_responsible_sidebar_deco_setting( 4 ); ?>
    </table>
    <?php ta_setting_form_end( 'responsibleside', 'レスポンシブデザイン『サイドバー装飾（1～4）』設定更新', 'decoline' ); ?>
<?php
} else { ?>
    <table class="ta-setting-table">
      <tr>
        <th id="ta_responsible_sidebar_deco1_setting_title_no_thm001highend" class="no-ta-thm001highend">サイドバー装飾1<?php ta_man2_gd( 'resside/deco' ); ?><br><span class="small-font"><?php echo esc_html( '<h6 class="sidebar_deco1"></h6>' ) . '<br>' . esc_html( '[side-deco1][/side-deco1]' ); ?></span></th>
        <td></td>
      </tr>
      <tr>
        <th id="ta_responsible_sidebar_deco2_setting_title_no_thm001highend" class="no-ta-thm001highend">サイドバー装飾2<?php ta_man2_gd( 'resside/deco' ); ?><br><span class="small-font"><?php echo esc_html( '<h6 class="sidebar_deco2"></h6>' ) . '<br>' . esc_html( '[side-deco2][/side-deco2]' ); ?></span></th>
        <td></td>
      </tr>
      <tr>
        <th id="ta_responsible_sidebar_deco3_setting_title_no_thm001highend" class="no-ta-thm001highend">サイドバー装飾3<?php ta_man2_gd( 'resside/deco' ); ?><br><span class="small-font"><?php echo esc_html( '<h6 class="sidebar_deco3"></h6>' ) . '<br>' . esc_html( '[side-deco3][/side-deco3]' ); ?></span></th>
        <td></td>
      </tr>
      <tr>
        <th id="ta_responsible_sidebar_deco4_setting_title_no_thm001highend" class="no-ta-thm001highend">サイドバー装飾4<?php ta_man2_gd( 'resside/deco' ); ?><br><span class="small-font"><?php echo esc_html( '<h6 class="sidebar_deco4"></h6>' ) . '<br>' . esc_html( '[side-deco4][/side-deco4]' ); ?></span></th>
        <td></td>
      </tr>
    </table>
<?php
} ?>
  </div><!-- end of #ta-responsibleside-tab-decoline -->
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
