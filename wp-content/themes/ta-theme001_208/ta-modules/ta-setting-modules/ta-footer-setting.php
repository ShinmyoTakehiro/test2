<?php
/************************************************************************************************************************/
/*
/* テックエイドの成長する自作ホームページWordPressテーマ『 TAテーマ001 (ta-theme001) 』
/*
/* ta-footer-setting.php: ( Latest Version 2.06 2017.04.11 )
/*
/* このプログラムの著作権、使用権、その他全ての権利はde集まれ株式会社に属します。
/* The copyright, royalty and all the other rights of this program belong to deatsumare Corporation.
/*
/* File Version 履歴
/* File Version 2.00 2016.03.05: first edition by Kotaro Kashiwamura.
/* File Version 2.01 2016.03.07: ウィジェット位置変更 by Kotaro Kashiwamura.
/* File Version 2.02 2016.06.16: ヘッドライン確認エリア調整 by Kotaro Kashiwamura.
/* File Version 2.03 2016.08.22: フッターパラグラフ設定追加、標準フォントにhover表示追加 by Kotaro Kashiwamura.
/* File Version 2.04 2017.02.22: フッターメニュー表記修正、体裁調整、ajax化 by Kotaro Kashiwamura.
/* File Version 2.05 2017.03.22: フッターメニュー注釈文の誤記修正 by Kotaro Kashiwamura.
/* File Version 2.06 2017.04.11: ブラウザ全幅表示時の定位置フッター追加、フッター画像注釈修正 by Kotaro Kashiwamura.
/*
/************************************************************************************************************************/
if ( TA_HIEND_PI ) { require_once( TA_HIEND_PI_DIR . '/setting-modules/ta-theme001-highend-footer-setting.php' ); } ?>
<div id="ta-setting-form">
  <!-- タイトルとタブ -->
  <div id="ta-menu-group">
    <div id="ta-menu-title-container">
      <h2 id="ta-menu-title">TAテーマ001・フッター設定メニュー</h2>
      <?php ta_ver_display(); ?>
    </div>
    <a id="ta-menu-talink-anc" href="http://theme001.tec-aid.com/" target="_blank"><div id="ta-menu-talink"></div></a>
  </div>
<?php
ta_development_disp();
ta_setting_scroll();
ta_setting_message_disp();
$ta_tabs = array( 'frame' => '基本設定', 'font' => 'フォント', 'titleh2' => 'h2', 'titleh3' => 'h3', 'titleh4' => 'h4', 'titleh5' => 'h5', 'freearea' => 'フリーエリア', 'block' => '各ブロック設定', 'footimg' => 'フッター画像', 'contents' => 'フッターコンテンツ', 'widget' => 'ウィジェット', 'copyright' => 'コピーライト', 'etc' => 'その他', );
$ta_tabs = apply_filters( 'ta_footer_settting_page_tab', $ta_tabs ); //フィルターフック'ta_footer_settting_page_tab'を設置
$valid_tab = ta_tab_lists( $ta_tabs );  //タブの設置と有効タブの検出 ?>
  
  
  <?php if ( 'frame' == $valid_tab ) { ?>
  <!-- 基本設定 -->
  <div class="table" id="ta-footer-tab-frame">
    <?php ta_setting_form_start( 'footer', 'frame' ); ?>
    <table class="ta-setting-table">
      <!-- フッター背景色・画像 -->
      <tr>
        <?php ta_common_frame_setting( 'ta_footer_frame', 'フッター背景色・画像', 'invalid', 'valid' ); ?>
      </tr>
      <!-- フッター上部のりしろ -->
      <tr>
        <th id="ta_footer_container_paddingtop_title" class="big-title"><a href="JavaScript:void(0);">フッター上部のりしろ</a><?php ta_man2_gd( 'footer/frame#paddingtop' ); ?></th>
        <td>
          <span class="fixed-space"></span>
          <div id="ta_footer_container_paddingtop_disp" class="init-nodisp">
            <?php ta_simple_input( 'ta_footer_container_paddingtop', 'ピクセル', 'short_box' ); ?>
          </div><!-- end of #ta_footer_container_paddingtop_disp -->
        </td>
      </tr>
      <!-- フッターの位置（メイン枠への移動）-->
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_footer_container2main_setting();
} else { ?>
      <tr>
        <th class="no-ta-thm001highend">フッターの位置<?php ta_man2_gd( 'footer/frame#position' ); ?></th>
        <td></td>
      </tr>
      <tr>
        <th class="no-ta-thm001highend">ブラウザ全幅表示時の<br>定位置フッター<?php ta_man2_gd( 'footer/frame#fullwidth' ); ?></th>
        <td></td>
      </tr>
<?php
} ?>
    </table>
    <?php ta_setting_form_end( 'footer', 'フッター『基本設定』設定更新', 'frame' ); ?>
  </div><!-- end of #ta-footer-tab-frame -->
  <?php } ?>
  
  
  <?php if ( 'font' == $valid_tab ) { ?>
  <!-- フォント -->
  <div class="table" id="ta-footer-tab-font">
    <?php ta_setting_form_start( 'footer', 'font' ); ?>
    <table class="ta-setting-table">
      <!-- フッター標準フォント -->
      <tr>
        <?php ta_common_font_setting( 'ta_footer_font', 'フッター', 'pulldown', 'anchor' ); ?>
      </tr>
      <!-- フッターパラグラフ設定 -->
      <tr>
        <th id="ta_footer_paragraph_design_title" class="big-title"><a href="JavaScript:void(0);">フッター<br>パラグラフデザイン</a><?php ta_man2_gd( 'footer/font#paragraph' ); ?></th>
        <td>
          <div id="ta_footer_paragraph_design_disp" class="init-nodisp">
            <?php ta_paragraph_setting( 'ta_footer_font', 'フッター', 'pc_check' ); ?>
          </div><!-- end of #ta_footer_paragraph_design_disp -->
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'footer', 'フッター『フォント』設定更新', 'font' ); ?>
  </div><!-- end of #ta-footer-tab-font -->
  <?php } ?>
  
  
  <?php if ( 'titleh2' == $valid_tab ) { ?>
  <!-- h2 -->
  <div class="table" id="ta-footer-tab-titleh2">
    <?php ta_setting_form_start( 'footer', 'titleh2' ); ?>
    <table class="ta-setting-table">
      <!-- h2 フッタータイトル表示 -->
      <tr>
        <th></th>
        <td>
          <div class="h2_area">
            <?php ta_headline_confirm( 'ta_footer_headline_h2', 'h2', 'footer_title' ); ?>
          </div>
        </td>
      </tr>
      <!-- h2 フッタータイトル -->
      <tr>
        <th>h2 フッタータイトル<?php ta_man2_gd( 'footer/hl' ); ?><br><span class="small-font"><?php echo esc_html( '<h2 class="footer_title"></h2>' ) . '<br>' . esc_html( '[footer-h2][/footer-h2]' ); ?></span></th>
        <td>
          <?php ta_headline_register( 'ta_footer_headline_h2', 'common' ); ?>
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'footer', 'フッター『h2タイトル』設定更新', 'titleh2' ); ?>
  </div><!-- end of #ta-footer-tab-titleh2 -->
  <?php } ?>
  
  
  <?php if ( 'titleh3' == $valid_tab ) { ?>
  <!-- h3 -->
  <div class="table" id="ta-footer-tab-titleh3">
    <?php ta_setting_form_start( 'footer', 'titleh3' ); ?>
    <table class="ta-setting-table">
      <!-- h3 フッタータイトル表示 -->
      <tr>
        <th></th>
        <td>
          <div class="h3_area">
            <?php ta_headline_confirm( 'ta_footer_headline_h3', 'h3', 'footer_title' ); ?>
          </div>
        </td>
      </tr>
      <!-- h3 フッタータイトル -->
      <tr>
        <th>h3 フッタータイトル<?php ta_man2_gd( 'footer/hl' ); ?><br><span class="small-font"><?php echo esc_html( '<h3 class="footer_title"></h3>' ) . '<br>' . esc_html( '[footer-h3][/footer-h3]' ); ?></span></th>
        <td>
          <?php ta_headline_register( 'ta_footer_headline_h3', 'common' ); ?>
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'footer', 'フッター『h3タイトル』設定更新', 'titleh3' ); ?>
  </div><!-- end of #ta-footer-tab-titleh3 -->
  <?php } ?>
  
  
  <?php if ( 'titleh4' == $valid_tab ) { ?>
  <!-- h4 -->
  <div class="table" id="ta-footer-tab-titleh4">
    <?php ta_setting_form_start( 'footer', 'titleh4' ); ?>
    <table class="ta-setting-table">
      <!-- h4 フッタータイトル表示 -->
      <tr>
        <th></th>
        <td>
          <div class="h4_area">
            <?php ta_headline_confirm( 'ta_footer_headline_h4', 'h4', 'footer_title' ); ?>
          </div>
        </td>
      </tr>
      <!-- h4 フッタータイトル -->
      <tr>
        <th>h4 フッタータイトル<?php ta_man2_gd( 'footer/hl' ); ?><br><span class="small-font"><?php echo esc_html( '<h4 class="footer_title"></h4>' ) . '<br>' . esc_html( '[footer-h4][/footer-h4]' ); ?></span></th>
        <td>
          <?php ta_headline_register( 'ta_footer_headline_h4', 'common' ); ?>
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'footer', 'フッター『h4タイトル』設定更新', 'titleh4' ); ?>
  </div><!-- end of #ta-footer-tab-titleh4 -->
  <?php } ?>
  
  
  <?php if ( 'titleh5' == $valid_tab ) { ?>
  <!-- h5 -->
  <div class="table" id="ta-footer-tab-titleh5">
    <?php ta_setting_form_start( 'footer', 'titleh5' ); ?>
    <table class="ta-setting-table">
      <!-- h5 フッタータイトル表示 -->
      <tr>
        <th></th>
        <td>
          <div class="h5_area">
            <?php ta_headline_confirm( 'ta_footer_headline_h5', 'h5', 'footer_title' ); ?>
          </div>
        </td>
      </tr>
      <!-- h5 フッタータイトル -->
      <tr>
        <th>h5 フッタータイトル<?php ta_man2_gd( 'footer/hl' ); ?><br><span class="small-font"><?php echo esc_html( '<h5 class="footer_title"></h5>' ) . '<br>' . esc_html( '[footer-h5][/footer-h5]' ); ?></span></th>
        <td>
          <?php ta_headline_register( 'ta_footer_headline_h5', 'common' ); ?>
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'footer', 'フッター『h5タイトル』設定更新', 'titleh5' ); ?>
  </div><!-- end of #ta-footer-tab-titleh5 -->
  <?php } ?>
  
  
  <?php if ( 'freearea' == $valid_tab ) { ?>
  <!-- フリーエリア -->
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_footer_freearea_setting();
} else { ?>
  <div class="table" id="ta-footer-tab-freearea">
    <table class="ta-setting-table">
      <!-- フッターフリーエリア -->
      <tr>
        <th class="no-ta-thm001highend">フッターフリーエリア<?php ta_man2_gd( 'footer/footer_fa' ); ?><br>（TAフッターFA）</th>
        <td></td>
      </tr>
    </table>
  </div><!-- end of #ta-footer-tab-freearea -->
<?php
} ?>
  <?php } ?>
  
  
  <?php if ( 'block' == $valid_tab ) { ?>
  <!-- 各ブロック設定 -->
  <div class="table" id="ta-footer-tab-block">
    <?php ta_setting_form_start( 'footer', 'block' ); ?>
    <table class="ta-setting-table">
      <!-- フッター各ブロック設定 -->
      <tr>
        <th>フッター各ブロック設定<?php ta_man2_gd( 'footer/block' ); ?><br><span id="ta_footer_block_size_check_span" style="color:#ff7f00;">（確認モード実行中です）</span></th>
        <td>
          <?php if ( 'valid' == ta_read_op( 'ta_footer_block_size_check' ) ) { $css_value = 'inline'; } else { $css_value = 'none'; } ?>
          <style type="text/css"> #ta_footer_block_size_check_span { display: <?php echo $css_value; ?>; }</style>
          <div id="ta_footer_block_err_ftr_over" style="display:none;">
            <div class="error">
              <ul>
                <li><span class="ta-err-message">フッター各ブロックサイズエラー:</span>設定幅の合計値が100%を超えています。</li>
              </ul>
            </div>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
          </div>
          <div id="ta_footer_block_err_ftr_det" style="display:none;">
            <div class="error">
              <ul>
                <li><span class="ta-err-message">フッター各ブロックサイズエラー:</span>予期しないエラーです。サーバー管理者にご相談ください。</li>
              </ul>
            </div>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
          </div>
          <h4>表示方法</h4>
          <?php $init_value = ta_read_op( 'ta_footer_disp_group' ); ?>
          <table class="ta-3contents-table">
            <tr>
              <td>
                <p><input type="radio" name="ta_footer_disp_group" value="none" <?php if ( "none" == $init_value ) echo 'checked="checked"'; ?>> 表示しない</p>
              </td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td>
                <p><input type="radio" name="ta_footer_disp_group" value="h_g1_g2" <?php if ( "h_g1_g2" == $init_value ) echo 'checked="checked"'; ?>> 横2列：左からブロック1-ブロック2</p>
              </td>
              <td>
                <p><input type="radio" name="ta_footer_disp_group" value="v_g1_g2" <?php if ( "v_g1_g2" == $init_value ) echo 'checked="checked"'; ?>> 縦2段：上からブロック1-ブロック2</p>
              </td>
              <td>
                <p><input type="radio" name="ta_footer_disp_group" value="g1_only" <?php if ( "g1_only" == $init_value ) echo 'checked="checked"'; ?>> 単体：ブロック1</p>
              </td>
            </tr>
            <tr>
              <td>
                <p><input type="radio" name="ta_footer_disp_group" value="h_g2_g1" <?php if ( "h_g2_g1" == $init_value ) echo 'checked="checked"'; ?>> 横2列：左からブロック2-ブロック1</p>
              </td>
              <td>
                <p><input type="radio" name="ta_footer_disp_group" value="v_g2_g1" <?php if ( "v_g2_g1" == $init_value ) echo 'checked="checked"'; ?>> 縦2段：上からブロック2-ブロック1</p>
              </td>
              <td>
                <p><input type="radio" name="ta_footer_disp_group" value="g2_only" <?php if ( "g2_only" == $init_value ) echo 'checked="checked"'; ?>> 単体：ブロック2</p>
              </td>
            </tr>
          </table>
          <p>※ブロック1：フッター画像＋フッターフリーテキスト＋サブフッター画像、ブロック2：フッターメニュー</p>
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <h4>フッター各ブロック設定の確認</h4>
          <?php ta_alternative_input_checkbox( 'ta_footer_block_size_check', '確認モードにする' ); ?>
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <!-- 詳細設定 -->
          <h4 id="ta_footer_block_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
          <div id="ta_footer_block_pro_disp" class="pro-disp init-nodisp">
            <h4 class="ta-html-strip">ブロック1タイトル</h4>
            <?php ta_text_input_w_nodisp( 'ta_footer_group1_block_title', 'long_box' ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4 class="ta-html-strip">ブロック2タイトル</h4>
            <?php ta_text_input_w_nodisp( 'ta_footer_group2_block_title', 'long_box' ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>ブロックタイトルの要素名設定</h4>
            <?php ta_factor_selection_process( 'ta_footer_group_title_factor', 'option', 0, 'none', 'フッター' ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <h4>ブロック1幅</h4>
                  <?php ta_simple_input( 'ta_footer_group1_block_size', '％', 'short_box' ); ?>
                  <p>※ フッター幅に対する割合<br>（横2列時とフッター画像に有効）</p>
                </td>
                <td>
                  <h4>フッターブロック1上部余白</h4>
                  <?php ta_simple_input( 'ta_footer_vertical_group1_distance', 'ピクセル', 'short_box' ); ?>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <h4>ブロック2幅</h4>
                  <?php ta_simple_input( 'ta_footer_group2_block_size', '％', 'short_box' ); ?>
                  <p>※ フッター幅に対する割合<br>（横2列時に有効）</p>
                </td>
                <td>
                  <h4>フッターブロック2上部余白</h4>
                  <?php ta_simple_input( 'ta_footer_vertical_group2_distance', 'ピクセル', 'short_box' ); ?>
                </td>
              </tr>
            </table>
          </div><!-- end of #ta_footer_block_pro_disp -->
          <span class="fixed-space"></span>
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'footer', 'フッター『各ブロック』設定更新', 'block' ); ?>
  </div><!-- end of #ta-footer-tab-block -->
  <?php } ?>
  
  
  <?php if ( 'footimg' == $valid_tab ) { ?>
  <!-- フッター画像 -->
  <div class="table" id="ta-footer-tab-footimg">
    <?php ta_setting_form_start( 'footer', 'footimg' ); ?>
    <table class="ta-setting-table">
      <!-- フッター画像 -->
      <tr>
        <th id="ta_footer_pic_setting_title" class="big-title"><a href="JavaScript:void(0);">フッター画像</a><?php ta_man2_gd( 'footer/footimg#pic' ); ?><br>（ブロック1）</th>
        <td>
          <div id="ta_footer_pic_setting_disp" class="init-nodisp">
            <h4>フッター画像</h4>
            <?php ta_img_upload_process( 'ta_footer_pic' ); ?>
            <p>※ 縦横幅の最大値を500ピクセルに制限しています</p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>フッター画像エリアのリンク</h4>
            <?php ta_link_process_w_newwin( 'ta_footer_pic_link' ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <!-- 詳細設定 -->
            <h4 id="ta_footer_pic_setting_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
            <div id="ta_footer_pic_setting_pro_disp" class="pro-disp init-nodisp">
              <h4>フッター画像の幅</h4>
              <?php ta_simple_input( 'ta_footer_pic_size', '％', 'short_box' ); ?>
              <p>※ 高さは自動調節：ブロック1幅に対する割合</p>
              <p>※ 固定サイズを一定にするため、縦横配置に関わらず『各ブロック設定』のブロック1幅設定値が有効になります</p>
              <p>※ フッター幅レイアウトがブラウザ追従（固定幅以外）の場合はブロック1幅設定値は無効になります</p>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4 class="ta-html-esc-asisexe">フッター画像エリアに表示する代替テキスト</h4>
              <?php ta_textarea_input( 'ta_footer_pic_text', 5, 67 ); ?>
              <a href="JavaScript:void(0);" onClick="ta_no_disp('#ta_footer_pic_text');" >代替テキストを非表示にする</a>
              <p>※ 画像がある場合は無効</p>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>代替テキストサイズ</h4>
                    <?php ta_simple_input( 'ta_footer_pic_text_size', '％', 'short_box' ); ?>
                  </td>
                  <td>
                    <h4>代替テキストテキストの太さ</h4>
                    <?php ta_fontweight_selection( 'ta_footer_pic_text_weight' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <?php ta_linkedtext_setting( 
                      '代替テキスト',
                      'ta_footer_pic_text_color', 'invalid',
                      'ta_footer_pic_text_hoverunder',
                      'ta_footer_pic_text_hover', 'invalid',
                      'ta_footer_pic_text_hoverunder2' ); ?>
              <p>※ 代替テキスト下線はリンク付の場合に有効です</p>
            </div><!-- end of #ta_footer_pic_setting_pro_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_footer_pic_setting_disp -->
        </td>
      </tr>
      <!-- サブフッター画像 -->
      <tr>
        <th id="ta_footer_subpic_setting_title" class="big-title"><a href="JavaScript:void(0);">サブフッター画像</a><?php ta_man2_gd( 'footer/footimg#subpic' ); ?><br>（ブロック１）</th>
        <td>
          <div id="ta_footer_subpic_setting_disp" class="init-nodisp">
            <h4>サブフッター画像</h4>
            <?php ta_img_upload_process( 'ta_footer_subpic' ); ?>
            <p>※ 縦横幅の最大値を500ピクセルに制限しています</p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>サブフッター画像エリアのリンク</h4>
            <?php ta_link_process_w_newwin( 'ta_footer_subpic_link' ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <!-- 詳細設定 -->
            <h4 id="ta_footer_subpic_setting_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
            <div id="ta_footer_subpic_setting_pro_disp" class="pro-disp init-nodisp">
              <h4>サブフッター画像の幅</h4>
              <?php ta_simple_input( 'ta_footer_subpic_size', '％', 'short_box' ); ?>
              <p>※ 高さは自動調節：ブロック1幅に対する割合</p>
              <p>※ 固定サイズを一定にするため、縦横配置に関わらず『各ブロック設定』のブロック1幅設定値が有効になります</p>
              <p>※ フッター幅レイアウトがブラウザ追従（固定幅以外）の場合はブロック1幅設定値は無効になります</p>
            </div><!-- end of #ta_footer_subpic_setting_pro_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_footer_subpic_setting_disp -->
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'footer', 'フッター『フッター画像』設定更新', 'footimg' ); ?>
  </div><!-- end of #ta-footer-tab-footimg -->
  <?php } ?>
  
  
  <?php if ( 'contents' == $valid_tab ) { ?>
  <!-- フッターコンテンツ -->
  <div class="table" id="ta-footer-tab-contents">
    <?php ta_setting_form_start( 'footer', 'contents' ); ?>
    <table class="ta-setting-table">
      <!-- フッターフリーテキスト -->
      <tr>
        <th id="ta_footer_freetext_title" class="big-title"><a href="JavaScript:void(0);">フッターフリーテキスト</a><?php ta_man2_gd( 'footer/contents#freetext' ); ?><br>（ブロック1）</th>
        <td>
          <div id="ta_footer_freetext_disp" class="init-nodisp">
            <h4 class="ta-html-esc-asisexe">フッターフリーテキスト</h4>
            <?php ta_textarea_input( 'ta_footer_freetext', 5, 67 ); ?>
            <a href="JavaScript:void(0);" onClick="ta_no_disp('#ta_footer_freetext');" >フリーテキストを非表示にする</a>
            <p>※ フリーテキストには、TAテーマ設定の『フッター』で設定したh2～h5のヘッドラインが使用できます。</p>
            <p>※ ヘッドラインには、<?php echo esc_html( '<h2 class="footer_title">***</h2>、<h3 class="footer_title">***</h3>、<h4 class="footer_title">***</h4>、<h5 class="footer_title">***</h5>' ); ?><br>の様にクラス"footer_title"を付けてください。</p>
            <span class="fixed-space"></span>
          </div><!-- end of #ta_footer_freetext_disp -->
        </td>
      </tr>
      <!-- TAフッターメニュー -->
      <tr>
        <th id="ta_footer_menu_title" class="big-title"><a href="JavaScript:void(0);">TAフッターメニュー</a><?php ta_man2_gd( 'footer/contents#menu' ); ?><br>（ブロック2）</th>
        <td>
          <div id="ta_footer_menu_disp" class="init-nodisp">
            <span class="fixed-space"></span>
            <p>※ TAフッターメニュー（横型の子孫展開無し）はWordPress標準のメニュー機能を使用しています。有効にするためには関連付けが必要です。
            <br>関連付けの方法は<a href="http://theme001.tec-aid.com/thm001_manual_p2/thm001_manual_basicope_p2#readymade_menu" target="_blank">こちら</a>をご覧ください。</p>
            <h4>メニュー</h4>
            <?php ta_alternative_input_checkbox( 'ta_footer_menu_onoff', '表示する' ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>メニュースタイル</h4>
            <?php ta_alternative_input( 'ta_footer_menu_style', '縦型', '横型' ); //valid:縦型, invalid:横型 ?>
            <p>※ 横型の子孫展開は表示されません</p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <!-- 親項目の詳細設定 -->
            <?php ta_footermenu_general_setting( 'ta_footer_menu_parent', '親項目', 'pro-disp' ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <!-- 子孫項目の詳細設定 -->
            <?php ta_footermenu_general_setting( 'ta_footer_menu_children', '子孫項目', 'pro-disp' ); ?>
            <span class="fixed-space"></span>
          </div><!-- end of #ta_footer_menu_disp -->
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'footer', 'フッター『コンテンツ』設定更新', 'contents' ); ?>
  </div><!-- end of #ta-footer-tab-contents -->
  <?php } ?>
  
  
  <?php if ( 'widget' == $valid_tab ) { ?>
  <!-- ウィジェット -->
  <div class="table" id="ta-footer-tab-widget">
    <?php ta_setting_form_start( 'footer', 'widget' ); ?>
    <table class="ta-setting-table">
      <!-- フッターウィジェット -->
      <tr>
        <th>フッターウィジェット<?php ta_man2_gd( 'footer/widget' ); ?></th>
        <td>
          <h4>ウィジェット</h4>
          <?php ta_alternative_input_checkbox( 'ta_footer_widget_onoff', '使用する' ); ?>
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <!-- 詳細設定 -->
          <h4 id="ta_footer_widget_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
          <div id="ta_footer_widget_pro_disp" class="pro-disp init-nodisp">
            <h4>フッターウィジェットのタイトル要素名共通設定</h4>
            <?php ta_factor_selection_process( 'ta_footer_widget_title_factor', 'option', 0, 'none', 'フッター' ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_footer_widget_position_setting();
} else { ?>
            <h4 class="no-ta-thm001highend" style="color:#bbbbbb;">ウィジェットの位置</h4>
            <p>※ ブロック2の下に固定です</p>
<?php
} ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>センタリング</h4>
            <?php ta_alternative_input_checkbox( 'ta_footer_widget_centering', 'センタリングする' ); ?>
            <p>※ センタリングできないウィジェットもあります</p>
          </div><!-- end of #ta_footer_widget_pro_disp -->
          <span class="fixed-space"></span>
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'footer', 'フッター『ウィジェット』設定更新', 'widget' ); ?>
  </div><!-- end of #ta-footer-tab-widget -->
  <?php } ?>
  
  
  <?php if ( 'copyright' == $valid_tab ) { ?>
  <!-- コピーライト -->
  <div class="table" id="ta-footer-tab-copyright">
    <?php ta_setting_form_start( 'footer', 'copyright' ); ?>
    <table class="ta-setting-table">
      <!-- コピーライト -->
      <tr>
        <th>コピーライト<?php ta_man2_gd( 'footer/copyright' ); ?></th>
        <td>
          <h4 class="ta-html-esc-asisexe">コピーライト表記</h4>
          <?php ta_text_input_w_nodisp( 'ta_footer_copyright_title', 'long_box' ); ?>
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <h4>コピーライトの位置</h4>
          <?php $init_value = ta_read_op( 'ta_footer_copyright_position' ); ?>
          <p><input type="radio" name="ta_footer_copyright_position" value="left" <?php if ( "left" == $init_value ) echo 'checked="checked"'; ?>> 左</p>
          <p><input type="radio" name="ta_footer_copyright_position" value="center" <?php if ( "center" == $init_value ) echo 'checked="checked"'; ?>> 中央</p>
          <p><input type="radio" name="ta_footer_copyright_position" value="right" <?php if ( "right" == $init_value ) echo 'checked="checked"'; ?>> 右</p>
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <!-- 詳細設定 -->
          <h4 id="ta_footer_copyright_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
          <div id="ta_footer_copyright_pro_disp" class="pro-disp init-nodisp">
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <h4>コピーライト表記サイズ</h4>
                  <?php ta_simple_input( 'ta_footer_copyright_title_size', '％', 'short_box' ); ?>
                </td>
                <td>
                  <h4>コピーライト表記の太さ</h4>
                  <?php ta_fontweight_selection( 'ta_footer_copyright_title_weight' ); ?>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <h4>コピーライト上部余白</h4>
                  <?php ta_simple_input( 'ta_footer_copyright_paddingtop', 'ピクセル', 'short_box' ); ?>
                </td>
                <td>
                  <h4>コピーライト下部余白</h4>
                  <?php ta_simple_input( 'ta_footer_copyright_paddingbottom', 'ピクセル', 'short_box' ); ?>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <h4>コピーライト表記の色</h4>
                  <?php ta_color_picker_no_tomei_process( 'ta_footer_copyright_title_color', 'valid' ); ?>
                </td>
                <td>
                  <h4>コピーライトエリアの背景色</h4>
                  <?php ta_color_picker_process( 'ta_footer_copyright_bg_color', 'valid' ); ?>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>コピーライトの上下枠幅</h4>
            <?php ta_simple_input( 'ta_footer_copyright_padding', 'ピクセル', 'short_box' ); ?>
            <p>※ 上下に同じ幅ののりしろが出来る</p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <h4>コピーライト上部線サイズ</h4>
                  <?php ta_simple_input( 'ta_footer_copyright_border_size', 'ピクセル', 'short_box' ); ?>
                  <p>※ 非表示の場合は0を入力してください</p>
                </td>
                <td>
                  <h4>コピーライト上部線色</h4>
                  <?php ta_color_picker_no_tomei_process( 'ta_footer_copyright_border_color', 'valid' ); ?>
                </td>
              </tr>
            </table>
          </div><!-- end of #ta_footer_copyright_pro_disp -->
          <span class="fixed-space"></span>
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'footer', 'フッター『コピーライト』設定更新', 'copyright' ); ?>
  </div><!-- end of #ta-footer-tab-copyright -->
  <?php } ?>
  
  
  <?php if ( 'etc' == $valid_tab ) { ?>
  <!-- その他 -->
  <div class="table" id="ta-footer-tab-etc">
    <?php ta_setting_form_start( 'footer', 'etc' ); ?>
    <table class="ta-setting-table">
      <!-- フッターコンテンツ間隔 -->
      <tr>
        <th>フッターコンテンツ間隔<?php ta_man2_gd( 'footer/etc' ); ?></th>
        <td>
          <span class="fixed-space"></span>
          <?php ta_simple_input( 'ta_footer_fixed_space', 'ピクセル', 'short_box' ); ?>
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'footer', 'フッター『その他』設定更新', 'etc' ); ?>
  </div><!-- end of #ta-footer-tab-etc -->
  <?php } ?>
</div>
<?php
ta_progress_disp();
$footer_bg_color_select = ta_read_op( 'ta_common_top_outframe_color_select' );
$footer_bg_color = ta_read_op( 'ta_common_top_outframe_color' );
if ( 'common_site_bg' == $footer_bg_color_select ) { $footer_bg_color = ta_read_op( 'ta_common_site_bg_color' ); }
else if ( 'common_site_hl' == $footer_bg_color_select ) { $footer_bg_color = ta_read_op( 'ta_common_site_hl_color' ); }
else if ( 'common_site_text_on_bg' == $footer_bg_color_select ) { $footer_bg_color = ta_read_op( 'ta_common_site_text_on_bg_color' ); }
else if ( 'common_site_text_on_hl' == $footer_bg_color_select ) { $footer_bg_color = ta_read_op( 'ta_common_site_text_on_hl_color' ); } ?>
<style type="text/css">
<!--
  #ta-setting-form .h2_area,
  #ta-setting-form .h3_area,
  #ta-setting-form .h4_area,
  #ta-setting-form .h5_area {
  margin-top: 1em;
  margin-bottom: 1em;
  padding: 20px 10px;
  background-color: <?php echo $footer_bg_color; ?>;
-->
</style>
<?php ta_info_disp(); ?>
