<?php
/***************************************************************************************************************/
/*
/* テックエイドの成長する自作ホームページWordPressテーマ『 TAテーマ001 (ta-theme001) 』
/*
/* ta-sidebarsub-setting.php: ( Latest Version 2.03 2017.02.20 )
/*
/* このプログラムの著作権、使用権、その他全ての権利はde集まれ株式会社に属します。
/* The copyright, royalty and all the other rights of this program belong to deatsumare Corporation.
/*
/* File Version 履歴
/* File Version 2.00 2016.03.05: first edition by Kotaro Kashiwamura.
/* File Version 2.01 2016.06.16: ヘッドライン確認エリア調整 by Kotaro Kashiwamura.
/* File Version 2.02 2016.08.22: サブサイドバーパラグラフ設定追加、標準フォントにhover表示追加 by Kotaro Kashiwamura.
/* File Version 2.03 2017.02.20: サブサイドバー区切り線追加、体裁調整、ajax化 by Kotaro Kashiwamura.
/*
/***************************************************************************************************************/
if ( TA_HIEND_PI ) { require_once( TA_HIEND_PI_DIR . '/setting-modules/ta-theme001-highend-sidebarsub-setting.php' ); } ?>
<div id="ta-setting-form">
  <!-- タイトルとタブ -->
  <div id="ta-menu-group">
    <div id="ta-menu-title-container">
      <h2 id="ta-menu-title">TAテーマ001・サブサイドバー設定メニュー</h2>
      <?php ta_ver_display(); ?>
    </div>
    <a id="ta-menu-talink-anc" href="http://theme001.tec-aid.com/" target="_blank"><div id="ta-menu-talink"></div></a>
  </div>
<?php
ta_development_disp();
ta_setting_scroll();
ta_setting_message_disp();
$ta_tabs = array( 'frame' => '背景色・画像', 'font' => 'フォント', 'titleh2' => 'h2', 'titleh3' => 'h3', 'titleh4' => 'h4', 'titleh5' => 'h5', 'freearea' => 'フリーエリア', 'latestposts' => '最新投稿ダイジェスト', 'postdigest' => '各種投稿ダイジェスト', 'widget' => 'ウィジェット', 'etc' => 'その他', );
$ta_tabs = apply_filters( 'ta_sidebarsub_settting_page_tab', $ta_tabs ); //フィルターフック'ta_sidebarsub_settting_page_tab'を設置
$valid_tab = ta_tab_lists( $ta_tabs );  //タブの設置と有効タブの検出 ?>
  
  
  <?php if ( 'frame' == $valid_tab ) { ?>
  <!-- 背景色・画像 -->
  <div class="table" id="ta-sidebarsub-tab-frame">
    <?php ta_setting_form_start( 'sidebarsub', 'frame' ); ?>
    <table class="ta-setting-table">
      <!-- サブサイドバーの背景色・画像 -->
      <tr>
        <?php ta_sidebar_frame_setting_no_accordion( 'ta_sidebarsub_frame', 'サブサイドバー背景色・画像', 'valid', 'valid' ); ?>
      </tr>
    </table>
    <?php ta_setting_form_end( 'sidebarsub', 'サブサイドバー『背景色・画像』設定更新', 'frame' ); ?>
  </div><!-- end of #ta-sidebarsub-tab-frame -->
  <?php } ?>
  
  
  <?php if ( 'font' == $valid_tab ) { ?>
  <!-- フォント -->
  <div class="table" id="ta-sidebarsub-tab-font">
    <?php ta_setting_form_start( 'sidebarsub', 'font' ); ?>
    <table class="ta-setting-table">
      <!-- サブサイドバー標準フォント -->
      <tr>
        <?php ta_common_font_setting( 'ta_sidebarsub_font', 'サブサイドバー', 'pulldown', 'anchor' ); ?>
      </tr>
      <!-- サブサイドバーパラグラフ設定 -->
        <th id="ta_sidebarsub_paragraph_design_title" class="big-title"><a href="JavaScript:void(0);">サブサイドバー<br>パラグラフデザイン</a><?php ta_man2_gd( 'sidebar/font#paragraph' ); ?></th>
        <td>
          <div id="ta_sidebarsub_paragraph_design_disp" class="init-nodisp">
            <?php ta_paragraph_setting( 'ta_sidebarsub_font', 'サブサイドバー', 'pc_check' ); ?>
          </div><!-- end of #ta_sidebarsub_paragraph_design_disp -->
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'sidebarsub', 'サブサイドバー『フォント』設定更新', 'font' ); ?>
  </div><!-- end of #ta-sidebarsub-tab-font -->
  <?php } ?>
  
  
  <?php if ( 'titleh2' == $valid_tab ) { ?>
  <!-- h2 -->
  <div class="table" id="ta-sidebarsub-tab-titleh2">
    <?php ta_setting_form_start( 'sidebarsub', 'titleh2' ); ?>
    <table class="ta-setting-table">
      <!-- h2 サブサイドバータイトル表示 -->
      <tr>
        <th></th>
        <td>
          <div class="h2_area">
            <?php ta_headline_confirm( 'ta_sidebarsub_headline_h2', 'h2', 'sidebarsub_title' ); ?>
          </div>
        </td>
      </tr>
      <!-- h2 サブサイドバータイトル -->
      <tr>
        <th>h2 サブサイドバータイトル<?php ta_man2_gd( 'sidebar/hl' ); ?><br><span class="small-font"><?php echo esc_html( '<h2 class="sidebarsub_title"></h2>' ) . '<br>' . esc_html( '[sidebarsub-h2][/sidebarsub-h2]' ); ?></span></th>
        <td>
          <?php ta_headline_register( 'ta_sidebarsub_headline_h2', 'common' ); ?>
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'sidebarsub', 'サブサイドバー『h2タイトル』設定更新', 'titleh2' ); ?>
  </div><!-- end of #ta-sidebarsub-tab-titleh2 -->
  <?php } ?>
  
  
  <?php if ( 'titleh3' == $valid_tab ) { ?>
  <!-- h3 -->
  <div class="table" id="ta-sidebarsub-tab-titleh3">
    <?php ta_setting_form_start( 'sidebarsub', 'titleh3' ); ?>
    <table class="ta-setting-table">
      <!-- h3 サブサイドバータイトル表示 -->
      <tr>
        <th></th>
        <td>
          <div class="h3_area">
            <?php ta_headline_confirm( 'ta_sidebarsub_headline_h3', 'h3', 'sidebarsub_title' ); ?>
          </div>
        </td>
      </tr>
      <!-- h3 サブサイドバータイトル -->
      <tr>
        <th>h3 サブサイドバータイトル<?php ta_man2_gd( 'sidebar/hl' ); ?><br><span class="small-font"><?php echo esc_html( '<h3 class="sidebarsub_title"></h3>' ) . '<br>' . esc_html( '[sidebarsub-h3][/sidebarsub-h3]' ); ?></span></th>
        <td>
          <?php ta_headline_register( 'ta_sidebarsub_headline_h3', 'common' ); ?>
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'sidebarsub', 'サブサイドバー『h3タイトル』設定更新', 'titleh3' ); ?>
  </div><!-- end of #ta-sidebarsub-tab-titleh3 -->
  <?php } ?>
  
  
  <?php if ( 'titleh4' == $valid_tab ) { ?>
  <!-- h4 -->
  <div class="table" id="ta-sidebarsub-tab-titleh4">
    <?php ta_setting_form_start( 'sidebarsub', 'titleh4' ); ?>
    <table class="ta-setting-table">
      <!-- h4 サブサイドバータイトル表示 -->
      <tr>
        <th></th>
        <td>
          <div class="h4_area">
            <?php ta_headline_confirm( 'ta_sidebarsub_headline_h4', 'h4', 'sidebarsub_title' ); ?>
          </div>
        </td>
      </tr>
      <!-- h4 サブサイドバータイトル -->
      <tr>
        <th>h4 サブサイドバータイトル<?php ta_man2_gd( 'sidebar/hl' ); ?><br><span class="small-font"><?php echo esc_html( '<h4 class="sidebarsub_title"></h4>' ) . '<br>' . esc_html( '[sidebarsub-h4][/sidebarsub-h4]' ); ?></span></th>
        <td>
          <?php ta_headline_register( 'ta_sidebarsub_headline_h4', 'common' ); ?>
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'sidebarsub', 'サブサイドバー『h4タイトル』設定更新', 'titleh4' ); ?>
  </div><!-- end of #ta-sidebarsub-tab-titleh4 -->
  <?php } ?>
  
  
  <?php if ( 'titleh5' == $valid_tab ) { ?>
  <!-- h5 -->
  <div class="table" id="ta-sidebarsub-tab-titleh5">
    <?php ta_setting_form_start( 'sidebarsub', 'titleh5' ); ?>
    <table class="ta-setting-table">
      <!-- h5 サブサイドバータイトル表示 -->
      <tr>
        <th></th>
        <td>
          <div class="h5_area">
            <?php ta_headline_confirm( 'ta_sidebarsub_headline_h5', 'h5', 'sidebarsub_title' ); ?>
          </div>
        </td>
      </tr>
      <!-- h5 サブサイドバータイトル -->
      <tr>
        <th>h5 サブサイドバータイトル<?php ta_man2_gd( 'sidebar/hl' ); ?><br><span class="small-font"><?php echo esc_html( '<h5 class="sidebarsub_title"></h5>' ) . '<br>' . esc_html( '[sidebarsub-h5][/sidebarsub-h5]' ); ?></span></th>
        <td>
          <?php ta_headline_register( 'ta_sidebarsub_headline_h5', 'common' ); ?>
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'sidebarsub', 'サブサイドバー『h5タイトル』設定更新', 'titleh5' ); ?>
  </div><!-- end of #ta-sidebarsub-tab-titleh5 -->
  <?php } ?>
  
  
  <?php if ( 'freearea' == $valid_tab ) { ?>
  <!-- フリーエリア -->
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_sidebarsub_freearea_setting();
} else { ?>
  <div class="table" id="ta-sidebarsub-tab-freearea">
    <table class="ta-setting-table">
      <!-- サブサイドバーフリーエリア -->
      <tr>
        <th class="no-ta-thm001highend">サブサイドバーフリーエリア<?php ta_man2_gd( 'sidebar/sidebar_fa' ); ?><br>（TAサブサイドFA）</th>
        <td></td>
      </tr>
    </table>
  </div><!-- end of #ta-sidebarsub-tab-freearea -->
<?php
} ?>
  <?php } ?>
  
  
  <?php if ( 'latestposts' == $valid_tab ) { ?>
  <!-- 最新投稿ダイジェスト -->
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_sidebarsub_latestposts_setting();
} else { ?>
  <div class="table" id="ta-sidebarsub-tab-latestposts">
    <table class="ta-setting-table">
      <!-- 最新投稿ダイジェスト -->
      <tr>
        <th class="no-ta-thm001highend">最新投稿ダイジェスト<?php ta_man2_gd( 'sidebar/latestposts' ); ?><br>（全ての投稿が対象）</th>
        <td></td>
      </tr>
    </table>
  </div><!-- end of #ta-sidebarsub-tab-latestposts -->
<?php
} ?>
  <?php } ?>
  
  
  <?php if ( 'postdigest' == $valid_tab ) { ?>
  <!-- 各種投稿ダイジェスト -->
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_sidebarsub_postdigest_setting();
} else { ?>
  <div class="table" id="ta-sidebarsub-tab-postdigest">
    <table class="ta-setting-table">
      <!-- 各種投稿ダイジェスト -->
      <tr>
        <th class="no-ta-thm001highend">各種投稿ダイジェスト<?php ta_man2_gd( 'sidebar/postdigest' ); ?></th>
        <td></td>
      </tr>
    </table>
  </div><!-- end of #ta-sidebarsub-tab-postdigest -->
<?php
} ?>
  <?php } ?>
  
  
  <?php if ( 'widget' == $valid_tab ) { ?>
  <!-- ウィジェット -->
  <div class="table" id="ta-sidebarsub-tab-widget">
    <?php ta_setting_form_start( 'sidebarsub', 'widget' ); ?>
    <table class="ta-setting-table">
      <!-- サブサイドバーウィジェット -->
      <tr>
        <th>サブサイドバーウィジェット<?php ta_man2_gd( 'sidebar/widget' ); ?></th>
        <td>
          <h4>ウィジェット</h4>
          <?php ta_alternative_input_checkbox( 'ta_sidebarsub_widget_onoff', '使用する' ); ?>
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <!-- 詳細設定 -->
          <h4 id="ta_sidebarsub_widget_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
          <div id="ta_sidebarsub_widget_pro_disp" class="pro-disp init-nodisp">
            <h4>ウィジェットタイトルの要素名設定</h4>
            <?php ta_factor_selection_process( 'ta_sidebarsub_widget_title_factor', 'option', 0, 'none', 'サブサイドバー' ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>ウィジェットの位置</h4>
            <?php $init_value = ta_read_op( 'ta_sidebarsub_widget_position' ); ?>
            <p><input type="radio" name="ta_sidebarsub_widget_position" value="top" <?php if ( "top" == $init_value ) echo 'checked="checked"'; ?>> フリーエリアの上</p>
            <p><input type="radio" name="ta_sidebarsub_widget_position" value="middle" <?php if ( "middle" == $init_value ) echo 'checked="checked"'; ?>> フリーエリアの下</p>
            <p><input type="radio" name="ta_sidebarsub_widget_position" value="bottom" <?php if ( "bottom" == $init_value ) echo 'checked="checked"'; ?>> 最下部</p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>センタリング</h4>
            <?php ta_alternative_input_checkbox( 'ta_sidebarsub_widget_centering', 'センタリングする' ); ?>
            <p>※ センタリングできないウィジェットもあります</p>
          </div><!-- end of #ta_sidebarsub_widget_pro_disp -->
          <span class="fixed-space"></span>
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'sidebarsub', 'サブサイドバー『ウィジェット』設定更新', 'widget' ); ?>
  </div><!-- end of #ta-sidebarsub-tab-widget -->
  <?php } ?>
  
  
  <?php if ( 'etc' == $valid_tab ) { ?>
  <!-- その他 -->
  <div class="table" id="ta-sidebarsub-tab-etc">
    <?php ta_setting_form_start( 'sidebarsub', 'etc' ); ?>
    <table class="ta-setting-table">
      <!-- サブサイドバーコンテンツ間隔 -->
      <tr>
        <th id="ta_sidebarsub_fixed_space_title" class="big-title"><a href="JavaScript:void(0);">サブサイドバー<br>コンテンツ間隔</a><?php ta_man2_gd( 'sidebar/etc#fixed_space' ); ?></th>
        <td>
          <span class="fixed-space"></span>
          <div id="ta_sidebarsub_fixed_space_disp" class="init-nodisp">
            <?php ta_simple_input( 'ta_sidebarsub_fixed_space', 'ピクセル', 'short_box' ); ?>
          </div><!-- end of #ta_sidebarsub_fixed_space_disp -->
        </td>
      </tr>
      <!-- サブサイドバー区切り線ショートコード -->
      <tr>
        <th id="ta_sidebarsub_separator_title" class="big-title"><a href="JavaScript:void(0);">サブサイドバー区切り線<br>ショートコード</a><?php ta_man2_gd( 'sidebar/etc#separator' ); ?></th>
        <td>
          <div id="ta_sidebarsub_separator_disp" class="init-nodisp">
            <h4>以下のショートコードをサブサイドバーの編集画面（TAサブサイドFA）でお使いください。</h4>
            <p><input readonly value='[sidebarsub_separator]' onclick="this.select(0,this.value.length)" style="width:13em;"/></p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <h4>区切り線の太さ</h4>
                  <?php ta_simple_input( 'ta_sidebarsub_separator_size', 'ピクセル', 'short_box' ); ?>
                </td>
                <td>
                  <h4>区切り線の種類</h4>
                  <?php $init = ta_read_op( 'ta_sidebarsub_separator_kind' ); ?>
                  <table class="ta-fullcontents-table">
                    <tr>
                      <td style="width:7em;">
                        <p><input type="radio" name="ta_sidebarsub_separator_kind" value="solid" <?php if ( "solid" == $init ) echo 'checked="checked"' ?>> 実線</p>
                      </td>
                      <td>
                        <p><input type="radio" name="ta_sidebarsub_separator_kind" value="double" <?php if ( "double" == $init ) echo 'checked="checked"' ?>> 二重線</p>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <p><input type="radio" name="ta_sidebarsub_separator_kind" value="dotted" <?php if ( "dotted" == $init ) echo 'checked="checked"' ?>> 点線</p>
                      </td>
                      <td>
                        <p><input type="radio" name="ta_sidebarsub_separator_kind" value="groove" <?php if ( "groove" == $init ) echo 'checked="checked"' ?>> groove</p>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <p><input type="radio" name="ta_sidebarsub_separator_kind" value="dashed" <?php if ( "dashed" == $init ) echo 'checked="checked"' ?>> 破線</p>
                      </td>
                      <td>
                        <p><input type="radio" name="ta_sidebarsub_separator_kind" value="ridge" <?php if ( "ridge" == $init ) echo 'checked="checked"' ?>> ridge</p>
                      </td>
                    </tr>
                  </table>
                  <p>※ グラデーション使用時は実線になります</p>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <table class="ta-3contents-table">
              <tr>
                <td>
                  <!-- 区切り線の色(グラデーション) -->
                  <h4>区切り線の色</h4>
                  <?php ta_color_picker_no_tomei_grad_process( 'ta_sidebarsub_separator_kind_color', 'valid' ); ?>
                </td>
                <td>
                  <h4>区切り線上部余白</h4>
                  <?php ta_simple_input( 'ta_sidebarsub_separator_tmargin', 'ピクセル', 'short_box' ); ?>
                </td>
                <td>
                  <h4>区切り線下部余白</h4>
                  <?php ta_simple_input( 'ta_sidebarsub_separator_bmargin', 'ピクセル', 'short_box' ); ?>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
          </div><!-- end of #ta_sidebarsub_separator_disp -->
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'sidebarsub', 'サブサイドバー『その他』設定更新', 'etc' ); ?>
  </div><!-- end of #ta-sidebarsub-tab-etc -->
  <?php } ?>
</div>
<?php
ta_progress_disp();
$sidebarsub_bg_color_select = ta_read_op( 'ta_common_top_outframe_color_select' );
$sidebarsub_bg_color = ta_read_op( 'ta_common_top_outframe_color' );
if ( 'common_site_bg' == $sidebarsub_bg_color_select ) { $sidebarsub_bg_color = ta_read_op( 'ta_common_site_bg_color' ); }
else if ( 'common_site_hl' == $sidebarsub_bg_color_select ) { $sidebarsub_bg_color = ta_read_op( 'ta_common_site_hl_color' ); }
else if ( 'common_site_text_on_bg' == $sidebarsub_bg_color_select ) { $sidebarsub_bg_color = ta_read_op( 'ta_common_site_text_on_bg_color' ); }
else if ( 'common_site_text_on_hl' == $sidebarsub_bg_color_select ) { $sidebarsub_bg_color = ta_read_op( 'ta_common_site_text_on_hl_color' ); } ?>
<style type="text/css">
<!--
  #ta-setting-form .h2_area,
  #ta-setting-form .h3_area,
  #ta-setting-form .h4_area,
  #ta-setting-form .h5_area {
  margin-top: 1em;
  margin-bottom: 1em;
  padding: 20px 10px;
  background-color: <?php echo $sidebarsub_bg_color; ?>;
-->
</style>
<?php ta_info_disp(); ?>
