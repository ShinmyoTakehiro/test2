<?php
/******************************************************************************************************************/
/*
/* テックエイドの成長する自作ホームページWordPressテーマ『 TAテーマ001 (ta-theme001) 』
/*
/* ta-tools-setting.php: ( Latest Version 2.05 2017.03.11 )
/*
/* このプログラムの著作権、使用権、その他全ての権利はde集まれ株式会社に属します。
/* The copyright, royalty and all the other rights of this program belong to deatsumare Corporation.
/*
/* File Version 履歴
/* File Version 2.00 2016.02.28: first edition by Kotaro Kashiwamura.
/* File Version 2.01 2016.03.08: ページ表示速度改善機能をプロへ変更 by Kotaro Kashiwamura.
/* File Version 2.02 2016.05.05: 「HTMLファイル読み込み完了後にスタイルシートを読み込む」削除 by Kotaro Kashiwamura.
/* File Version 2.03 2016.06.20: ProとHighendの統合 by Kotaro Kashiwamura.
/* File Version 2.04 2016.08.22: パンくずナビ修正 by Kotaro Kashiwamura.
/* File Version 2.05 2017.03.11: 体裁修正、色選択修正、ページ表示速度改善削除
/*                               進捗表示追加、ajax化 by Kotaro Kashiwamura.
/*
/******************************************************************************************************************/
if ( TA_HIEND_PI ) { require_once( TA_HIEND_PI_DIR . '/setting-modules/ta-theme001-highend-tools-setting.php' ); } ?>
<div id="ta-setting-form">
  <!-- タイトルとタブ -->
  <div id="ta-menu-group">
    <div id="ta-menu-title-container">
      <h2 id="ta-menu-title">TAテーマ001・便利ツール設定メニュー</h2>
      <?php ta_ver_display(); ?>
    </div>
    <a id="ta-menu-talink-anc" href="http://theme001.tec-aid.com/" target="_blank"><div id="ta-menu-talink"></div></a>
  </div>
<?php
ta_development_disp();
ta_setting_scroll();
ta_setting_message_disp();
$ta_tabs = array( 'frame' => '基本設定', 'pager' => 'ページャー', 'gadget' => '装飾・小物', 'source' => '設定ソースファイル' );
$ta_tabs = apply_filters( 'ta_tools_settting_page_tab', $ta_tabs ); //フィルターフック'ta_tools_settting_page_tab'を設置
$valid_tab = ta_tab_lists( $ta_tabs );  //タブの設置と有効タブの検出 ?>
  
  
  <?php if ( 'frame' == $valid_tab ) { ?>
  <!-- 基本設定 -->
  <div class="table" id="ta-tools-tab-frame">
    <?php ta_setting_form_start( 'tools', 'frame' ); ?>
    <table class="ta-setting-table">
      <!-- CSSファイル生成 -->
      <tr>
<?php
$ta_theme_no_cssfile = ta_read_op( 'ta_theme_no_cssfile' );
if ( 'valid' == $ta_theme_no_cssfile ) { ?>
        <th id="ta_tools_cssfile_title" class="big-title"><a href="JavaScript:void(0);">CSSファイル生成</a><?php ta_man2_gd( 'tools/frame#cssfile' ); ?><br><span style="color:#ff7f00;">（設定更新時にCSSファイル<br>を生成しません）</th>
<?php
} else { ?>
        <th id="ta_tools_cssfile_title" class="big-title"><a href="JavaScript:void(0);">CSSファイル生成</a><?php ta_man2_gd( 'tools/frame#cssfile' ); ?></th>
<?php
} ?>
        <td>
          <div id="ta_tools_cssfile_msg" style="display:none;">
            <div class="updated">
              <ul>
                <li></li>
              </ul>
            </div>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
          </div>
          <div id="ta_tools_cssfile_disp" class="init-nodisp">
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <h4>CSSファイル生成</h4>
                  <?php ta_alternative_input_checkbox( 'ta_theme_no_cssfile', 'CSSファイルの同時生成をしない' ); ?>
                </td>
                <td>
                  <h4>すべてのCSSファイル生成</h4>
                  <?php ta_alternative_input_checkbox( 'ta_theme_allcss_onoff', 'すべてのCSSファイル生成を許可する' ); ?>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <p style="width:85%;">※ 各設定ページで同時生成されるCSSファイルは設定箇所に対応するCSSファイルです。（独立生成の場合はすべてのCSSファイル生成を行います）同時生成の際にすべてのCSSファイルを生成するには“すべてのCSSファイル生成”にチェックを入れて”便利ツール『基本設定』設定更新”をクリックします。</p>
            <span class="fixed-space"></span>
          </div><!-- end of #ta_tools_cssfile_disp -->
        </td>
      </tr>
      <!-- wpautop関数 -->
      <tr>
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_wpautop_invalid_setting();
} else { ?>
        <th class="no-ta-thm001highend">wpautop関数<?php ta_man2_gd( 'tools/frame#wpautop' ); ?></th>
        <td></td>
<?php
} ?>
      </tr>
      <!-- 挿入画像の「リンク先」の初期値 -->
      <tr>
        <th id="image_default_link_type_title" class="big-title"><a href="JavaScript:void(0);">挿入画像<br>「リンク先」初期値</a><?php ta_man2_gd( 'tools/frame#link_type' ); ?></th>
        <td>
          <div id="image_default_link_type_disp" class="init-nodisp">
            <h4>挿入画像の「リンク先」の初期値</h4>
            <?php $init_value = ( '' == get_option( 'image_default_link_type' ) ) ? 'none' : get_option( 'image_default_link_type' ); ?>
            <p><input type="radio" name="image_default_link_type" value="none" <?php if ( "none" == $init_value ) echo 'checked="checked"'; ?>> なし</p>
            <p><input type="radio" name="image_default_link_type" value="file" <?php if ( "file" == $init_value ) echo 'checked="checked"'; ?>> ファイルのURL</p>
            <p><input type="radio" name="image_default_link_type" value="post" <?php if ( "post" == $init_value ) echo 'checked="checked"'; ?>> 添付ファイル投稿URL</p>
            <p>※ TAテーマ001の画像アップローダーは“ファイルのURL”を選択すると便利です</p>
            <span class="fixed-space"></span>
          </div><!-- end of #image_default_link_type_disp -->
        </td>
      </tr>
      <!-- ページスロー表示 -->
      <tr>
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_slowshow_setting();
} else { ?>
        <th class="no-ta-thm001highend">ページスロー表示<?php ta_man2_gd( 'tools/frame#slowshow' ); ?></th>
        <td></td>
<?php
} ?>
      </tr>
      <!-- 制御用コード挿入 -->
      <tr>
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_insert_dscrptn_setting();
} else { ?>
        <th class="no-ta-thm001highend">制御用コード挿入<?php ta_man2_gd( 'tools/frame#insert' ); ?></th>
        <td></td>
<?php
} ?>
      </tr>
    </table>
    <?php ta_setting_form_end( 'tools', '便利ツール『基本設定』設定更新', 'frame' ); ?>
  </div><!-- end of #ta-tools-tab-frame -->
  <?php } ?>
  
  
  <?php if ( 'pager' == $valid_tab ) { ?>
  <!-- ページャー -->
  <div class="table" id="ta-tools-tab-pager">
    <?php ta_setting_form_start( 'tools', 'pager' ); ?>
    <table class="ta-setting-table">
      <!-- ページャー（ページ番号表記タイプ）-->
      <tr>
        <th id="ta_tools_pager1_title" class="big-title"><a href="JavaScript:void(0);">ページャー<br>（ページ番号表記）</a><?php ta_man2_gd( 'tools/pager#pager1' ); ?></th>
        <td>
          <div id="ta_tools_pager1_disp" class="init-nodisp">
            <table class="ta-3contents-table">
              <tr>
                <td>
                  <h4>上部コンテンツからの位置</h4>
                  <?php ta_simple_input( 'ta_common_pager1_margintop', 'ピクセル', 'short_box' ); ?>
                </td>
                <td>
                  <h4>表示テキストのサイズ</h4>
                  <?php ta_simple_input( 'ta_common_pager1_text_size', '％', 'short_box' ); ?>
                </td>
                <td>
                  <h4>HOVER時の表示テキストの太さ</h4>
                  <?php ta_fontweight_selection( 'ta_common_pager1_text_weight' ); ?>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <!-- 詳細設定 -->
            <h4 id="ta_tools_pager1_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
            <div id="ta_tools_pager1_pro_disp" class="pro-disp init-nodisp">
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>表示テキスト色</h4>
                    <?php ta_color_picker_no_tomei_process( 'ta_common_pager1_text_color', 'valid' ); ?>
                  </td>
                  <td>
                    <h4>HOVER時の表示テキスト色</h4>
                    <?php ta_color_picker_no_tomei_process( 'ta_common_pager1_text_colorhover', 'valid' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>表示テキスト背景色</h4>
                    <?php ta_color_picker_process( 'ta_common_pager1_text_bgcolor', 'valid' ); ?>
                  </td>
                  <td>
                    <h4>HOVER時の表示テキストの背景色</h4>
                    <?php ta_color_picker_no_tomei_process( 'ta_common_pager1_text_bgcolorhover', 'valid' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>表示テキストの上下余白</h4>
                    <?php ta_simple_input( 'ta_common_pager1_text_paddingtb', 'ピクセル', 'short_box' ); ?>
                  </td>
                  <td>
                    <h4>表示テキストの左右余白</h4>
                    <?php ta_simple_input( 'ta_common_pager1_text_paddinglr', 'ピクセル', 'short_box' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-3contents-table">
                <tr>
                  <td>
                    <h4>表示テキスト枠のサイズ</h4>
                    <?php ta_simple_input( 'ta_common_pager1_frame_size', 'ピクセル', 'short_box' ); ?>
                  </td>
                  <td>
                    <h4>表示テキスト枠色</h4>
                    <?php ta_color_picker_no_tomei_process( 'ta_common_pager1_frame_color', 'valid' ); ?>
                  </td>
                  <td>
                    <h4>HOVER時の表示テキスト枠色</h4>
                    <?php ta_color_picker_no_tomei_process( 'ta_common_pager1_frame_colorhover', 'valid' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-3contents-table">
                <tr>
                  <td>
                    <h4>選択ページ番号の色</h4>
                    <?php ta_color_picker_no_tomei_process( 'ta_common_pager1_selected_text_color', 'valid' ); ?>
                  </td>
                  <td>
                    <h4>選択ページ番号の背景色</h4>
                    <?php ta_color_picker_process( 'ta_common_pager1_selected_text_bgcolor', 'valid' ); ?>
                  </td>
                  <td>
                    <h4>選択ページ番号枠の色</h4>
                    <?php ta_color_picker_no_tomei_process( 'ta_common_pager1_selected_frame_color', 'valid' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>ドット表示の色</h4>
                    <?php ta_color_picker_no_tomei_process( 'ta_common_pager1_dots_color', 'valid' ); ?>
                  </td>
                  <td>
                    <h4>ドット表示の太さ</h4>
                    <?php ta_fontweight_selection( 'ta_common_pager1_dots_weight' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>中間表示するページ数</h4>
              <?php ta_simple_input( 'ta_common_pager1_mid_size', '個', 'short_box' ); ?>
              <span class="fixed-space"></span>
            </div><!-- end of #ta_tools_pager1_pro_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_tools_pager1_disp -->
        </td>
      </tr>
      <!-- ページャー（前次表記タイプ）-->
      <tr>
        <th id="ta_tools_pager_prenext_title" class="big-title"><a href="JavaScript:void(0);">ページャー<br>（前次表記）</a><?php ta_man2_gd( 'tools/pager#prenext' ); ?></th>
        <td>
          <div id="ta_tools_pager_prenext_disp" class="init-nodisp">
            <table class="ta-3contents-table">
              <tr>
                <td>
                  <h4>上部コンテンツからの位置</h4>
                  <?php ta_simple_input( 'ta_common_pager_prenext_margintop', 'ピクセル', 'short_box' ); ?>
                </td>
                <td>
                  <h4>前次ページマークのサイズ</h4>
                  <?php ta_simple_input( 'ta_common_pager_prenext_size', '％', 'short_box' ); ?>
                </td>
                <td>
                  <h4>前次ページマークの太さ</h4>
                  <?php ta_fontweight_selection( 'ta_common_pager_prenext_weight' ); ?>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <!-- 詳細設定 -->
            <h4 id="ta_tools_pager_prenext_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
            <div id="ta_tools_pager_prenext_pro_disp" class="pro-disp init-nodisp">
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>前ページマーク</h4>
                    <?php ta_text_input( 'ta_common_pager_prenext_pre_name', 'middle_box' ); ?>
                  </td>
                  <td>
                    <h4>次ページマーク</h4>
                    <?php ta_text_input( 'ta_common_pager_prenext_next_name', 'middle_box' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>前次ページマーク下線</h4>
              <?php ta_alternative_input_checkbox( 'ta_common_pager_prenext_underline_onoff', '表示する' ); ?>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>前次ページマーク色</h4>
                    <?php ta_color_picker_no_tomei_process( 'ta_common_pager_prenext_color', 'valid' ); ?>
                  </td>
                  <td>
                    <h4>HOVER時の前次ページマーク色</h4>
                    <?php ta_color_picker_no_tomei_process( 'ta_common_pager_prenext_colorhover', 'valid' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>前次ページマーク背景色</h4>
                    <?php ta_color_picker_no_tomei_process( 'ta_common_pager_prenext_bgcolor', 'valid' ); ?>
                  </td>
                  <td>
                    <h4>HOVER時の前次ページマーク背景色</h4>
                    <?php ta_color_picker_no_tomei_process( 'ta_common_pager_prenext_bgcolorhover', 'valid' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-3contents-table">
                <tr>
                  <td>
                    <h4>前次ページマーク背景の高さ</h4>
                    <?php ta_simple_input( 'ta_common_pager_prenext_height', 'em', 'short_box' ); ?>
                  </td>
                  <td>
                    <h4>前次ページマーク背景の最小幅</h4>
                    <?php ta_simple_input( 'ta_common_pager_prenext_minwidth', 'em', 'short_box' ); ?>
                  </td>
                  <td>
                    <h4>前次ページマーク背景の角の丸み</h4>
                    <?php ta_simple_input( 'ta_common_pager_prenext_round', 'ピクセル', 'short_box' ); ?>
                    <p>※ 丸み無しは0を入力してください</p>
                  </td>
                </tr>
              </table>
            </div><!-- end of #ta_tools_pager_prenext_pro_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_tools_pager_prenext_disp -->
        </td>
      </tr>
      <!-- ページャー（投稿の前後記事へのリンク）-->
      <tr>
        <th id="ta_tools_pager2_title" class="big-title"><a href="JavaScript:void(0);">ページャー<br>（投稿の前後記事）</a><?php ta_man2_gd( 'tools/pager#pager2' ); ?></th>
        <td>
          <div id="ta_tools_pager2_disp" class="init-nodisp">
            <!-- 通常表示 -->
            <h4>ページャー（投稿の前後記事へのリンク）出力設定</h4>
            <?php ta_alternative_input_checkbox( 'ta_common_pager2_onoff', '出力する' ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <table class="ta-3contents-table">
              <tr>
                <td>
                  <h4>上部コンテンツからの位置</h4>
                  <?php ta_simple_input( 'ta_common_pager2_margintop', 'ピクセル', 'short_box' ); ?>
                </td>
                <td>
                  <h4>表示テキストのサイズ</h4>
                  <?php ta_simple_input( 'ta_common_pager2_text_size', '％', 'short_box' ); ?>
                </td>
                <td>
                  <h4>表示テキストの太さ</h4>
                  <?php ta_fontweight_selection( 'ta_common_pager2_text_weight' ); ?>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <!-- 詳細設定 -->
            <h4 id="ta_tools_pager2_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
            <div id="ta_tools_pager2_pro_disp" class="pro-disp init-nodisp">
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>表示テキスト色</h4>
                    <?php ta_color_picker_no_tomei_process( 'ta_common_pager2_text_color', 'valid' ); ?>
                  </td>
                  <td>
                    <h4>HOVER時の表示テキスト色</h4>
                    <?php ta_color_picker_no_tomei_process( 'ta_common_pager2_text_colorhover', 'valid' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>前投稿用挿入文字</h4>
                    <?php ta_text_input( 'ta_common_pager2_pre_insert', 'short_box' ); ?>
                  </td>
                  <td>
                    <h4>後投稿用挿入文字</h4>
                    <?php ta_text_input( 'ta_common_pager2_after_insert', 'short_box' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>左側ページャーの左端からの位置</h4>
                    <?php ta_simple_input( 'ta_common_pager2_marginleft', 'ピクセル', 'short_box' ); ?>
                  </td>
                  <td>
                    <h4>右側ページャーの右端からの位置</h4>
                    <?php ta_simple_input( 'ta_common_pager2_marginright', 'ピクセル', 'short_box' ); ?>
                  </td>
                </tr>
              </table>
            </div><!-- end of #ta_tools_pager2_pro_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_tools_pager2_disp -->
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'tools', '便利ツール『ページャー』設定更新', 'pager' ); ?>
  </div><!-- end of #ta-tools-pager -->
  <?php } ?>
  
  
  <?php if ( 'gadget' == $valid_tab ) { ?>
  <!-- 装飾・小物 -->
  <div class="table" id="ta-tools-tab-gadget">
    <?php ta_setting_form_start( 'tools', 'gadget' ); ?>
    <table class="ta-setting-table">
      <!-- パンくずナビ -->
      <tr>
        <th id="ta_tools_bread_title" class="big-title"><a href="JavaScript:void(0);">パンくずナビ</a><?php ta_man2_gd( 'tools/gadget#bread' ); ?></th>
        <td>
          <div id="ta_tools_bread_disp" class="init-nodisp">
            <!-- 通常表示 -->
            <table class="ta-3contents-table">
              <tr>
                <td>
                  <h4>トップページ表記</h4>
                  <?php ta_text_input( 'ta_common_bread_top_text', 'middle_box' ); ?>
                </td>
                <td>
                  <h4>ページ名間挿入記号文字</h4>
                  <?php ta_text_input( 'ta_common_bread_text_between_pages', 'short_box' ); ?>
                </td>
                <td>
                  <h4>メインコンテンツの最上部に移動</h4>
                  <?php ta_alternative_input_checkbox( 'ta_common_bread_tomain_onoff', '移動させる' ); ?>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <h4>親ページテキスト色</h4>
                  <?php ta_color_picker_no_tomei_process( 'ta_common_bread_parent_color', 'valid' ); ?>
                </td>
                <td>
                  <h4>HOVER時の親ページ表示テキスト色</h4>
                  <?php ta_color_picker_no_tomei_process( 'ta_common_bread_parent_colorhover', 'valid' ); ?>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>現ページテキスト色</h4>
            <?php ta_color_picker_no_tomei_process( 'ta_common_bread_current_color', 'valid' ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <!-- 詳細設定 -->
            <h4 id="ta_tools_bread_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
            <div id="ta_tools_bread_pro_disp" class="pro-disp init-nodisp">
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>表示テキストのサイズ</h4>
                    <?php ta_simple_input( 'ta_common_bread_text_size', '％', 'short_box' ); ?>
                  </td>
                  <td>
                    <h4>表示テキストの太さ</h4>
                    <?php ta_fontweight_selection( 'ta_common_bread_text_weight' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>親ページテキスト下線</h4>
              <?php ta_alternative_input_checkbox( 'ta_common_bread_parent_underonoff', '表示する' ); ?>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-3contents-table">
                <tr>
                  <td>
                    <h4>上部コンテンツとの余白</h4>
                    <?php ta_simple_input( 'ta_common_bread_paddingtop', 'ピクセル', 'short_box' ); ?>
                  </td>
                  <td>
                    <h4>左端との余白</h4>
                    <?php ta_simple_input( 'ta_common_bread_paddingleft', 'ピクセル', 'short_box' ); ?>
                  </td>
                  <td>
                    <h4>下部コンテンツとの余白</h4>
                    <?php ta_simple_input( 'ta_common_bread_paddingbottom', 'ピクセル', 'short_box' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>ページ名間挿入記号文字（ <?php echo ta_read_op( 'ta_common_bread_text_between_pages' ); ?> ）との間隔</h4>
              <?php ta_simple_input( 'ta_common_bread_margin2arrow', 'ピクセル', 'short_box' ); ?>
              <span class="fixed-space"></span>
            </div><!-- end of #ta_tools_bread_pro_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_tools_bread_disp -->
        </td>
      </tr>
      <!-- バックトゥートップスクロール -->
      <tr>
        <th id="ta_tools_back2top_title" class="big-title"><a href="JavaScript:void(0);">バックトゥートップ<br>スクロール</a><?php ta_man2_gd( 'tools/gadget#back2top' ); ?></th>
        <td>
          <div id="ta_tools_back2top_disp" class="init-nodisp">
            <!-- 通常表示 -->
            <h4>バックトゥートップスクロール表示</h4>
            <?php ta_alternative_input_checkbox( 'ta_common_back2top_disponoff', 'バックトゥートップスクロールを表示する' ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <!-- 詳細設定 -->
            <h4 id="ta_tools_back2top_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
            <div id="ta_tools_back2top_pro_disp" class="pro-disp init-nodisp">
              <h4>バックトゥートップスクロール画像</h4>
              <?php ta_img_upload_process( 'ta_common_back2top_img' ); ?>
              <p>※ 縦横幅の最大値を500ピクセルに制限しています</p>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>バックトゥートップスクロール画像の高さ</h4>
              <?php ta_simple_input( 'ta_common_back2top_img_height', 'ピクセル', 'short_box' ); ?>
              <p>※ 幅はオリジナル比率で自動計算されます</p>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>バックトゥートップスクロール<br>画像透明度</h4>
                    <?php ta_simple_input( 'ta_common_back2top_img_opacity', '', 'short_box' ); ?>
                    <p>※ 0.0：透明 ～ 1.0非透明</p>
                  </td>
                  <td>
                    <h4>HOVER時のバックトゥートップスクロール<br>画像透明度</h4>
                    <?php ta_simple_input( 'ta_common_back2top_img_opacityhover', '', 'short_box' ); ?>
                    <p>※ 0.0：透明 ～ 1.0非透明</p>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4 class="ta-html-strip">バックトゥートップスクロールの代替テキスト</h4>
              <?php ta_text_input_w_nodisp( 'ta_common_back2top_text', 'middle_box' ); ?>
              <p>※ 画像がある場合は無効</p>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>代替テキストのサイズ</h4>
                    <?php ta_simple_input( 'ta_common_back2top_text_size', '％', 'short_box' ); ?>
                  </td>
                  <td>
                    <h4>代替テキストの太さ</h4>
                    <?php ta_fontweight_selection( 'ta_common_back2top_text_weight' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <?php ta_linkedtext_setting( 
                      '代替テキスト',
                      'ta_common_back2top_text_color', 'invalid',
                      'ta_common_back2top_text_under',
                      'ta_common_back2top_text_colorhover', 'invalid',
                      'ta_common_back2top_text_underhover' ); ?>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>代替テキスト背景色</h4>
                    <?php ta_color_picker_process( 'ta_common_back2top_text_bgcolor', 'valid' ); ?>
                  </td>
                  <td>
                    <h4>HOVER時の代替テキスト背景色</h4>
                    <?php ta_color_picker_no_tomei_process( 'ta_common_back2top_text_bgcolorhover', 'valid' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>代替テキスト背景の高さ上乗せ</h4>
                    <?php ta_simple_input( 'ta_common_back2top_text_height', 'em', 'short_box' ); ?>
                  </td>
                  <td>
                    <h4>代替テキスト背景の左右のびしろ</h4>
                    <?php ta_simple_input( 'ta_common_back2top_text_lr_padding', 'em', 'short_box' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>代替テキスト背景の角の丸み</h4>
                    <?php ta_simple_input( 'ta_common_back2top_text_round', 'ピクセル', 'short_box' ); ?>
                    <p>※ 丸み無しは0を入力してください</p>
                  </td>
                  <td>
                    <h4>丸み位置の制限</h4>
                    <?php ta_alternative_input_checkbox( 'ta_common_back2top_text_round_upper_onoff', '上部のみに丸みをつける' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>コンテンツから独立させて位置を固定</h4>
              <?php ta_alternative_input_checkbox( 'ta_common_back2top_text_fixed_onoff', 'コンテンツから独立させる' ); ?>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>位置固定座標（下端から）</h4>
                    <?php ta_simple_input( 'ta_common_back2top_text_fixed_bottom', 'ピクセル', 'short_box' ); ?>
                  </td>
                  <td>
                    <h4>位置固定座標（右端から）</h4>
                    <?php ta_simple_input( 'ta_common_back2top_text_fixed_right', 'ピクセル', 'short_box' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>位置固定時に表示有効になるトップからのスクロール総量</h4>
              <?php ta_simple_input( 'ta_common_back2top_fm_top_amount', 'ピクセル', 'short_box' ); ?>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-3contents-table">
                <tr>
                  <td>
                    <h4>コンテンツ埋め込み時の<br>上部コンテンツとの余白</h4>
                    <?php ta_simple_input( 'ta_common_back2top_topmargin', 'ピクセル', 'short_box' ); ?>
                  </td>
                  <td>
                    <h4>コンテンツ埋め込み時の位置</h4>
                    <?php $init_value = ta_read_op( 'ta_common_back2top_position' ); ?>
                    <p><input type="radio" name="ta_common_back2top_position" value="left" <?php if ( "left" == $init_value ) echo 'checked="checked"'; ?>> 左寄せ</p>
                    <p><input type="radio" name="ta_common_back2top_position" value="center" <?php if ( "center" == $init_value ) echo 'checked="checked"'; ?>> 中央</p>
                    <p><input type="radio" name="ta_common_back2top_position" value="right" <?php if ( "right" == $init_value ) echo 'checked="checked"'; ?>> 右寄せ</p>
                  </td>
                  <td>
                    <h4>コンテンツ埋め込み時の端余白</h4>
                    <?php ta_simple_input( 'ta_common_back2top_edge_margin', 'ピクセル', 'short_box' ); ?>
                    <p>※ 位置が中央の場合は無効</p>
                  </td>
                </tr>
              </table>
            </div><!-- end of #ta_tools_back2top_pro_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_tools_back2top_disp -->
        </td>
      </tr>
      <!-- ファビコン -->
      <tr>
        <th id="ta_tools_favicon_title" class="big-title"><a href="JavaScript:void(0);">ファビコン</a><?php ta_man2_gd( 'tools/gadget#favicon' ); ?></th>
        <td>
          <div id="ta_tools_favicon_disp" class="init-nodisp">
            <!-- 通常表示 -->
            <h4>ファビコン表示</h4>
            <?php ta_alternative_input_checkbox( 'ta_common_favicon_disponoff', 'ファビコンを表示する' ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <!-- 詳細設定 -->
            <h4 id="ta_tools_favicon_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
            <div id="ta_tools_favicon_pro_disp" class="pro-disp init-nodisp">
              <h4>ファビコン画像</h4>
              <?php ta_img_upload_process( 'ta_common_favicon_img' ); ?>
              <p>※ アップロードするファイル名は必ずfavicon.icoにしてください：ファビコン仕様に従った画像以外は正しく表示されません</p>
            </div><!-- end of #ta_tools_favicon_pro_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_tools_favicon_disp -->
        </td>
      </tr>
      <!-- アップルタッチアイコン -->
      <tr>
        <th id="ta_tools_appletouch_title" class="big-title"><a href="JavaScript:void(0);">アップルタッチアイコン</a><?php ta_man2_gd( 'tools/gadget#appletouch' ); ?></th>
        <td>
          <div id="ta_tools_appletouch_disp" class="init-nodisp">
            <!-- 通常表示 -->
            <h4>アップルタッチアイコン表示</h4>
            <?php ta_alternative_input_checkbox( 'ta_common_appletouch_disponoff', 'アップルタッチアイコンを表示する' ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <!-- 詳細設定 -->
            <h4 id="ta_tools_appletouch_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
            <div id="ta_tools_appletouch_pro_disp" class="pro-disp init-nodisp">
              <h4>アップルタッチアイコン画像</h4>
              <?php ta_img_upload_process( 'ta_common_appletouch_img' ); ?>
              <p>※ アップロードするファイル名は必ずapple-touch-icon.pngにしてください：アップルタッチアイコン仕様に従った画像以外は正しく表示されません</p>
            </div><!-- end of #ta_tools_appletouch_pro_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_tools_appletouch_disp -->
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'tools', '便利ツール『装飾・小物』設定更新', 'gadget' ); ?>
  </div><!-- end of #ta-tools-gadget -->
  <?php } ?>
  
  
  <?php if ( 'source' == $valid_tab ) { ?>
  <!-- 設定ソース -->
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_source_setting();
} else { ?>
  <div class="table" id="ta-tools-tab-source">
    <?php ta_setting_form_start( 'tools', 'source' ); ?>
    <table class="ta-setting-table">
      <!-- 設定ソースファイルによる初期化 -->
      <tr>
        <th class="no-ta-thm001highend">設定ソースファイル反映<?php ta_man2_gd( 'tools/source#set' ); ?></th>
        <td></td>
      </tr>
      <!-- 設定ソースファイル作成 -->
      <tr>
        <th class="no-ta-thm001highend">設定ソースファイル作成<?php ta_man2_gd( 'tools/source#create' ); ?></th>
        <td></td>
      </tr>
      <!-- 設定ソースファイルの削除 -->
      <tr>
        <th class="no-ta-thm001highend">設定ソースファイルの削除<?php ta_man2_gd( 'tools/source#delete' ); ?></th>
        <td></td>
      </tr>
      <!-- 設定ソース（zip圧縮）ファイルのエクスポート -->
      <tr>
        <th class="no-ta-thm001highend">設定ソース（zip圧縮）ファイル<br>エクスポート<?php ta_man2_gd( 'tools/source#export' ); ?></th>
        <td></td>
      </tr>
      <!-- 設定ソース（zip圧縮）ファイルのインポート -->
      <tr>
        <th class="no-ta-thm001highend">設定ソース（zip圧縮）ファイル<br>インポート<?php ta_man2_gd( 'tools/source#import' ); ?></th>
        <td></td>
      </tr>
      <!-- テーマ出荷時値への初期化 -->
      <tr>
        <th id="ta_tools_reset_title" class="nocookie-big-title"><a href="JavaScript:void(0);">テーマ出荷時値への初期化</a><?php ta_man2_gd( 'tools/source#reset' ); ?></th>
        <td>
          <div id="ta_tools_source_resetmsg" style="display:none;">
            <div class="updated">
              <ul>
                <li></li>
              </ul>
            </div>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
          </div>
          <div id="ta_tools_reset_disp" class="init-nodisp">
            <h4>テーマ出荷時値への初期化</h4>
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <p>初期化データ1（クリックで拡大）</p>
                  <a href="http://deatsumare.sakura.ne.jp/init_data_images/init_data1.png" target="_blank"><img style="width:235px;" src="<?php echo get_template_directory_uri(); ?>/images/ta-admin-images/init_data1.png" /></a>
                </td>
                <td>
                  <p>初期化データ2（クリックで拡大）</p>
                  <a href="http://deatsumare.sakura.ne.jp/init_data_images/init_data2.png" target="_blank"><img style="width:235px;" src="<?php echo get_template_directory_uri(); ?>/images/ta-admin-images/init_data2.png" /></a>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <span class="fixed-space"></span>
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <p>初期化データの選択</p>
                  <?php $init_value = ( '' == get_option( '_ta_common_reset_dataname' ) ) ? 1 : get_option( '_ta_common_reset_dataname' ); ?>
                  <p><input type="radio" name="ta_common_reset_dataname" value=1 <?php if ( 1 == $init_value ) echo 'checked="checked"'; ?>> データ1（～ Ver.2.06）</p>
                  <p><input type="radio" name="ta_common_reset_dataname" value=2 <?php if ( 2 == $init_value ) echo 'checked="checked"'; ?>> データ2（Ver.2.07 ～）</p>
                </td>
                <td>
                  <p>初期化の許可</p>
                  <?php ta_alternative_input_checkbox( 'ta_common_reset_onoff', 'データ初期化を許可する' ); ?>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <p style="color:#ff0000;font-weight:bold;">※ データベースの全ての設定を削除します</p>
            <p>※ 数十秒かかる場合もあります</p>
            <span class="fixed-space"></span>
          </div><!-- end of #ta_tools_reset_disp -->
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'tools', '便利ツール『設定ソースファイル』設定更新', 'source' ); ?>
  </div><!-- end of #ta-tools-tab-source -->
<?php
} ?>
  <?php } ?>
</div>
<?php
ta_progress_disp();
ta_info_disp(); ?>
