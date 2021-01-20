<?php
/*******************************************************************************************************/
/*
/* テックエイドの成長する自作ホームページWordPressテーマ『 TAテーマ001 (ta-theme001) 』
/*
/* ta-main-setting.php: ( Latest Version 2.03 2017.02.20 )
/*
/* このプログラムの著作権、使用権、その他全ての権利はde集まれ株式会社に属します。
/* The copyright, royalty and all the other rights of this program belong to deatsumare Corporation.
/*
/* File Version 履歴
/* File Version 2.00 2016.03.05: first edition by Kotaro Kashiwamura.
/* File Version 2.01 2016.06.16: ヘッドライン確認エリア調整、装飾1～4の追加 by Kotaro Kashiwamura.
/* File Version 2.02 2016.08.22: メインパラグラフ設定追加、標準フォントにhover表示追加 by Kotaro Kashiwamura.
/* File Version 2.03 2017.02.20: メイン区切り線ショートコード設定追加、体裁調整、ajax化 by Kotaro Kashiwamura.
/*
/*******************************************************************************************************/
if ( TA_HIEND_PI ) { require_once( TA_HIEND_PI_DIR . '/setting-modules/ta-theme001-highend-main-setting.php' ); } ?>
<div id="ta-setting-form">
  <!-- タイトルとタブ -->
  <div id="ta-menu-group">
    <div id="ta-menu-title-container">
      <h2 id="ta-menu-title">TAテーマ001・メイン設定メニュー</h2>
      <?php ta_ver_display(); ?>
    </div>
    <a id="ta-menu-talink-anc" href="http://theme001.tec-aid.com/" target="_blank"><div id="ta-menu-talink"></div></a>
  </div>
<?php
ta_development_disp();
ta_setting_scroll();
ta_setting_message_disp();
$ta_tabs = array( 'frame' => '背景色・画像', 'font' => 'フォント', 'titleh2' => 'h2', 'titleh3' => 'h3', 'titleh4' => 'h4', 'titleh5' => 'h5', 'deco1' => '装飾1', 'deco2' => '装飾2', 'deco3' => '装飾3', 'deco4' => '装飾4', 'freearea' => 'フリーエリア', 'etc' => 'その他', );
$ta_tabs = apply_filters( 'ta_main_settting_page_tab', $ta_tabs ); //フィルターフック'ta_main_settting_page_tab'を設置
$valid_tab = ta_tab_lists( $ta_tabs );  //タブの設置と有効タブの検出 ?>


  <?php if ( 'frame' == $valid_tab ) { ?>
  <!-- 背景色・画像 -->
  <div class="table" id="ta-main-tab-frame">
    <?php ta_setting_form_start( 'main', 'frame' ); ?>
    <table class="ta-setting-table">
      <!-- メインコンテンツの背景色・画像 -->
      <tr>
        <?php ta_main_frame_setting_no_accordion(); ?>
      </tr>
    </table>
    <?php ta_setting_form_end( 'main', 'メイン『背景色・画像』設定更新', 'frame' ); ?>
  </div><!-- end of #ta-main-tab-frame -->
  <?php } ?>
  
  
  <?php if ( 'font' == $valid_tab ) { ?>
  <!-- フォント -->
  <div class="table" id="ta-main-tab-font">
    <?php ta_setting_form_start( 'main', 'font' ); ?>
    <table class="ta-setting-table">
      <!-- メイン標準フォント -->
      <tr>
        <?php ta_common_font_setting( 'ta_main_font', 'メイン', 'pulldown', 'anchor' ); ?>
      </tr>
      <!-- メインパラグラフ設定 -->
      <tr>
        <th id="ta_main_paragraph_design_title" class="big-title"><a href="JavaScript:void(0);">メイン<br>パラグラフデザイン</a><?php ta_man2_gd( 'main/font#paragraph' ); ?></th>
        <td>
          <div id="ta_main_paragraph_design_disp" class="init-nodisp">
            <?php ta_paragraph_setting( 'ta_main_font', 'メイン', 'pc_check' ); ?>
          </div><!-- end of #ta_main_paragraph_design_disp -->
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'main', 'メイン『フォント』設定更新', 'font' ); ?>
  </div><!-- end of #ta-main-tab-font -->
  <?php } ?>
  
  
  <?php if ( 'titleh2' == $valid_tab ) { ?>
  <!-- h2 -->
  <div class="table" id="ta-main-tab-titleh2">
    <?php ta_setting_form_start( 'main', 'titleh2' ); ?>
    <table class="ta-setting-table">
      <!-- h2 メインタイトル表示 -->
      <tr>
        <th></th>
        <td>
          <div class="h2_area">
            <?php ta_headline_confirm( 'ta_main_headline_h2', 'h2' ); ?>
          </div>
        </td>
      </tr>
      <!-- h2 メインタイトル -->
      <tr>
        <th>h2 メインタイトル<?php ta_man2_gd( 'main/hl' ); ?><br><span class="small-font"><?php echo esc_html( '<h2 class="title"></h2>' ) . '<br>' . esc_html( '[main-h2][/main-h2]' ); ?></span></th>
        <td>
          <?php ta_headline_register( 'ta_main_headline_h2', 'none' ); ?>
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'main', 'メイン『h2タイトル』設定更新', 'titleh2' ); ?>
  </div><!-- end of #ta-main-tab-titleh2 -->
  <?php } ?>
  
  
  <?php if ( 'titleh3' == $valid_tab ) { ?>
  <!-- h3 -->
  <div class="table" id="ta-main-tab-titleh3">
    <?php ta_setting_form_start( 'main', 'titleh3' ); ?>
    <table class="ta-setting-table">
      <!-- h3 メインタイトル表示 -->
      <tr>
        <th></th>
        <td>
          <div class="h3_area">
            <?php ta_headline_confirm( 'ta_main_headline_h3', 'h3' ); ?>
          </div>
        </td>
      </tr>
      <!-- h3 メインタイトル -->
      <tr>
        <th>h3 メインタイトル<?php ta_man2_gd( 'main/hl' ); ?><br><span class="small-font"><?php echo esc_html( '<h3 class="title"></h3>' ) . '<br>' . esc_html( '[main-h3][/main-h3]' ); ?></span></th>
        <td>
          <?php ta_headline_register( 'ta_main_headline_h3', 'none' ); ?>
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'main', 'メイン『h3タイトル』設定更新', 'titleh3' ); ?>
  </div><!-- end of #ta-main-tab-titleh3 -->
  <?php } ?>
  
  
  <?php if ( 'titleh4' == $valid_tab ) { ?>
  <!-- h4 -->
  <div class="table" id="ta-main-tab-titleh4">
    <?php ta_setting_form_start( 'main', 'titleh4' ); ?>
    <table class="ta-setting-table">
      <!-- h4 メインタイトル表示 -->
      <tr>
        <th></th>
        <td>
          <div class="h4_area">
            <?php ta_headline_confirm( 'ta_main_headline_h4', 'h4' ); ?>
          </div>
        </td>
      </tr>
      <!-- h4 メインタイトル -->
      <tr>
        <th>h4 メインタイトル<?php ta_man2_gd( 'main/hl' ); ?><br><span class="small-font"><?php echo esc_html( '<h4 class="title"></h4>' ) . '<br>' . esc_html( '[main-h4][/main-h4]' ); ?></span></th>
        <td>
          <?php ta_headline_register( 'ta_main_headline_h4', 'none' ); ?>
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'main', 'メイン『h4タイトル』設定更新', 'titleh4' ); ?>
  </div><!-- end of #ta-main-tab-titleh4 -->
  <?php } ?>
  
  
  <?php if ( 'titleh5' == $valid_tab ) { ?>
  <!-- h5 -->
  <div class="table" id="ta-main-tab-titleh5">
    <?php ta_setting_form_start( 'main', 'titleh5' ); ?>
    <table class="ta-setting-table">
      <!-- h5 メインタイトル表示 -->
      <tr>
        <th></th>
        <td>
          <div class="h5_area">
            <?php ta_headline_confirm( 'ta_main_headline_h5', 'h5' ); ?>
          </div>
        </td>
      </tr>
      <!-- h5 メインタイトル -->
      <tr>
        <th>h5 メインタイトル<?php ta_man2_gd( 'main/hl' ); ?><br><span class="small-font"><?php echo esc_html( '<h5 class="title"></h5>' ) . '<br>' . esc_html( '[main-h5][/main-h5]' ); ?></span></th>
        <td>
          <?php ta_headline_register( 'ta_main_headline_h5', 'none' ); ?>
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'main', 'メイン『h5タイトル』設定更新', 'titleh5' ); ?>
  </div><!-- end of #ta-main-tab-titleh5 -->
  <?php } ?>
  
  
  <?php if ( 'deco1' == $valid_tab ) { ?>
  <!-- 装飾1 -->
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_main_deco_setting( 1 );
} else { ?>
  <div class="table" id="ta-main-tab-deco1">
    <table class="ta-setting-table">
      <tr>
        <th class="no-ta-thm001highend">メイン装飾1<?php ta_man2_gd( 'main/deco' ); ?><br><span class="small-font"><?php echo esc_html( '<h6 class="deco1"></h6>' ) . '<br>' . esc_html( '[main-deco1][/main-deco1]' ); ?></span></th>
        <td></td>
      </tr>
    </table>
  </div><!-- end of #ta-main-tab-deco1 -->
<?php
} ?>
  <?php } ?>
  
  
  <?php if ( 'deco2' == $valid_tab ) { ?>
  <!-- 装飾2 -->
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_main_deco_setting( 2 );
} else { ?>
  <div class="table" id="ta-main-tab-deco2">
    <table class="ta-setting-table">
      <tr>
        <th class="no-ta-thm001highend">メイン装飾2<?php ta_man2_gd( 'main/deco' ); ?><br><span class="small-font"><?php echo esc_html( '<h6 class="deco2"></h6>' ) . '<br>' . esc_html( '[main-deco2][/main-deco2]' ); ?></span></th>
        <td></td>
      </tr>
    </table>
  </div><!-- end of #ta-main-tab-deco2 -->
<?php
} ?>
  <?php } ?>
  
  
  <?php if ( 'deco3' == $valid_tab ) { ?>
  <!-- 装飾3 -->
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_main_deco_setting( 3 );
} else { ?>
  <div class="table" id="ta-main-tab-deco3">
    <table class="ta-setting-table">
      <tr>
        <th class="no-ta-thm001highend">メイン装飾3<?php ta_man2_gd( 'main/deco' ); ?><br><span class="small-font"><?php echo esc_html( '<h6 class="deco3"></h6>' ) . '<br>' . esc_html( '[main-deco3][/main-deco3]' ); ?></span></th>
        <td></td>
      </tr>
    </table>
  </div><!-- end of #ta-main-tab-deco3 -->
<?php
} ?>
  <?php } ?>
  
  
  <?php if ( 'deco4' == $valid_tab ) { ?>
  <!-- 装飾4 -->
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_main_deco_setting( 4 );
} else { ?>
  <div class="table" id="ta-main-tab-deco4">
    <table class="ta-setting-table">
      <tr>
        <th class="no-ta-thm001highend">メイン装飾4<?php ta_man2_gd( 'main/deco' ); ?><br><span class="small-font"><?php echo esc_html( '<h6 class="deco4"></h6>' ) . '<br>' . esc_html( '[main-deco4][/main-deco4]' ); ?></span></th>
        <td></td>
      </tr>
    </table>
  </div><!-- end of #ta-main-tab-deco4 -->
<?php
} ?>
  <?php } ?>
  
  
  <?php if ( 'freearea' == $valid_tab ) { ?>
  <!-- フリーエリア -->
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_endroll_freearea_setting();
} else { ?>
  <div class="table" id="ta-main-tab-freearea">
    <table class="ta-setting-table">
      <!-- エンドロールフリーエリア -->
      <tr>
        <th class="no-ta-thm001highend">エンドロールフリーエリア<?php ta_man2_gd( 'main/endroll_fa' ); ?><br>（TAエンドロールFA）</th>
        <td></td>
      </tr>
    </table>
  </div><!-- end of #ta-main-tab-freearea -->
<?php
} ?>
  <?php } ?>
  
  
  <?php if ( 'etc' == $valid_tab ) { ?>
  <!-- その他 -->
  <div class="table" id="ta-main-tab-etc">
    <?php ta_setting_form_start( 'main', 'etc' ); ?>
    <table class="ta-setting-table">
      <!-- メインコンテンツ間隔 -->
      <tr>
        <th id="ta_main_fixed_space_title" class="big-title"><a href="JavaScript:void(0);">メイン<br>コンテンツ間隔</a><?php ta_man2_gd( 'main/etc#fixed_space' ); ?></th>
        <td>
          <div id="ta_main_fixed_space_disp" class="init-nodisp">
            <span class="fixed-space"></span>
            <?php ta_simple_input( 'ta_main_fixed_space', 'ピクセル', 'short_box' ); ?>
          </div><!-- end of #ta_main_fixed_space_disp -->
        </td>
      </tr>
      <!-- メイン区切り線ショートコード -->
      <tr>
        <th id="ta_main_separator_title" class="big-title"><a href="JavaScript:void(0);">メイン区切り線<br>ショートコード</a><?php ta_man2_gd( 'main/etc#separator' ); ?></th>
        <td>
          <div id="ta_main_separator_disp" class="init-nodisp">
            <h4>以下のショートコードをメインの編集画面（投稿記事、固定ページ、TA説明エリア、TAトップFA、TAエンドロールFA）でお使いください。</h4>
            <p><input readonly value='[main_separator]' onclick="this.select(0,this.value.length)" style="width:13em;"/></p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <h4>区切り線の太さ</h4>
                  <?php ta_simple_input( 'ta_main_separator_size', 'ピクセル', 'short_box' ); ?>
                </td>
                <td>
                  <h4>区切り線の種類</h4>
                  <?php $init = ta_read_op( 'ta_main_separator_kind' ); ?>
                  <table class="ta-fullcontents-table">
                    <tr>
                      <td style="width:7em;">
                        <p><input type="radio" name="ta_main_separator_kind" value="solid" <?php if ( "solid" == $init ) echo 'checked="checked"' ?>> 実線</p>
                      </td>
                      <td>
                        <p><input type="radio" name="ta_main_separator_kind" value="double" <?php if ( "double" == $init ) echo 'checked="checked"' ?>> 二重線</p>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <p><input type="radio" name="ta_main_separator_kind" value="dotted" <?php if ( "dotted" == $init ) echo 'checked="checked"' ?>> 点線</p>
                      </td>
                      <td>
                        <p><input type="radio" name="ta_main_separator_kind" value="groove" <?php if ( "groove" == $init ) echo 'checked="checked"' ?>> groove</p>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <p><input type="radio" name="ta_main_separator_kind" value="dashed" <?php if ( "dashed" == $init ) echo 'checked="checked"' ?>> 破線</p>
                      </td>
                      <td>
                        <p><input type="radio" name="ta_main_separator_kind" value="ridge" <?php if ( "ridge" == $init ) echo 'checked="checked"' ?>> ridge</p>
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
                  <?php ta_color_picker_no_tomei_grad_process( 'ta_main_separator_kind_color', 'valid' ); ?>
                </td>
                <td>
                  <h4>区切り線上部余白</h4>
                  <?php ta_simple_input( 'ta_main_separator_tmargin', 'ピクセル', 'short_box' ); ?>
                </td>
                <td>
                  <h4>区切り線下部余白</h4>
                  <?php ta_simple_input( 'ta_main_separator_bmargin', 'ピクセル', 'short_box' ); ?>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
          </div><!-- end of #ta_main_separator_disp -->
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'main', 'メイン『その他』設定更新', 'etc' ); ?>
  </div><!-- end of #ta-main-tab-etc -->
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
  margin-bottom: 1em;
  padding: 20px 10px;
  background-color: <?php echo $main_bg_color; ?>;
}
-->
</style>
<?php ta_info_disp(); ?>
