<?php
/*******************************************************************************************************/
/*
/* テックエイドの成長する自作ホームページWordPressテーマ『 TAテーマ001 (ta-theme001) 』
/*
/* ta-responsible-setting.php: ( Latest Version 2.04 2017.02.27 )
/*
/* このプログラムの著作権、使用権、その他全ての権利はde集まれ株式会社に属します。
/* The copyright, royalty and all the other rights of this program belong to deatsumare Corporation.
/*
/* File Version 履歴
/* File Version 2.00 2016.03.07: first edition by Kotaro Kashiwamura.
/* File Version 2.01 2016.03.28: viewport系の修正 by Kotaro Kashiwamura.
/* File Version 2.02 2016.06.17: レスポンシブデザイン専用ヘッドラインの追加
/*                               メインとサイドバーに装飾1～4の追加 by Kotaro Kashiwamura.
/* File Version 2.03 2016.09.03: ta_responsible_footer_group2block_onoffレイアウト修正
/*                               パラグラフ設定追加 by Kotaro Kashiwamura.
/* File Version 2.04 2017.02.27: 色選択修正、体裁調整、レスポンシブ設定分割、ajax化 by Kotaro Kashiwamura.
/*
/*******************************************************************************************************/
if ( TA_HIEND_PI ) { require_once( TA_HIEND_PI_DIR . '/setting-modules/ta-theme001-highend-responsible-setting.php' ); } ?>
<div id="ta-setting-form">
  <!-- タイトルとタブ -->
  <div id="ta-menu-group">
    <div id="ta-menu-title-container">
      <h2 id="ta-menu-title">TAフォーマット・『レスポンシブデザイン』共通設定メニュー</h2>
      <?php ta_ver_display(); ?>
    </div>
    <a id="ta-menu-talink-anc" href="http://theme001.tec-aid.com/" target="_blank"><div id="ta-menu-talink"></div></a>
  </div>
<?php
ta_development_disp();
ta_setting_scroll();
ta_setting_message_disp();
$ta_tabs = array( 'basic' => '基本設定', 'bg' => 'body背景色・画像', 'bgbar' => 'body背景バー', 'additional' => 'アディショナルモード', 'digest' => 'ダイジェスト・一覧', 'freecss' => 'フリーCSS', );
$ta_tabs = apply_filters( 'ta_responsible_settting_page_tab', $ta_tabs ); //フィルターフック'ta_responsible_settting_page_tab'を設置
$valid_tab = ta_tab_lists( $ta_tabs );  //タブの設置と有効タブの検出 ?>
  
  
  <?php if ( 'basic' == $valid_tab ) { ?>
  <!-- 基本設定 -->
  <div class="tablevtab" id="ta-responsible-tab-basic">
    <?php ta_setting_form_start( 'responsible', 'basic' ); ?>
    <table class="ta-setting-table">
      <!-- レスポンシブデザイン基本設定 -->
      <tr>
        <th id="ta_responsible_basic_setting_title" class="big-title"><a href="JavaScript:void(0);">基本設定</a><?php ta_man2_gd( 'responsible/basic#setting' ); ?></th>
        <td>
          <div id="ta_responsible_basic_setting_disp" class="init-nodisp">
            <!-- 通常表示 -->
            <h4>レスポンシブデザイン</h4>
            <?php ta_alternative_input_checkbox( 'ta_responsible_base_onoff', '使用する' ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <!-- 詳細設定 -->
            <h4 id="ta_responsible_base_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
            <div id="ta_responsible_base_pro_disp" class="pro-disp init-nodisp">
              <h4>レスポンシブデザイン時のサイドバー表示</h4>
              <?php ta_alternative_input_checkbox( 'ta_responsible_base_sidebar_onoff', '表示する' ); ?>
              <p class="res-onoff-exp-under"></p>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>レスポンシブデザイン時のサブサイドバー表示</h4>
              <?php ta_alternative_input_checkbox( 'ta_responsible_base_sidebarsub_onoff', '表示する' ); ?>
              <p class="res-onoff-exp-under"></p>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>レスポンシブデザインに切り替わる画面ピクセル幅</h4>
              <?php ta_simple_input( 'ta_responsible_base_switch_width', 'ピクセル', 'short_box' ); ?>
              <p>※ 一般的なスマートフォンの縦表示のみが対象の場合は640 ピクセル、
              横表示も含める場合は770 ピクセルを入力します。</p>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>レスポンシブデザインの左右余白付きコンテンツの幅</h4>
              <?php ta_simple_input( 'ta_responsible_base_width_w_padding', '％', 'short_box' ); ?>
              <p>※ 100 ％以下：100 ％との差は左右の均等余白になります。</p>
            </div><!-- end of #ta_responsible_base_pro_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_responsible_basic_setting_disp -->
        </td>
      </tr>
      <!-- レスポンシブデザインviewport -->
      <tr>
        <th id="ta_responsible_viewport_setting_title" class="big-title"><a href="JavaScript:void(0);">viewport</a><?php ta_man2_gd( 'responsible/basic#viewport' ); ?></th>
        <td>
          <div id="ta_responsible_viewport_setting_disp" class="init-nodisp">
            <span class="fixed-space"></span>
            <p>ヘッダーに記述される下記の"viewport"の各項目の値を設定します</p>
            <span class="fixed-space"></span>
            <p>&lt;meta name="viewport" content="width=『仮想表示幅』, initial-scale=『初期拡大倍率』, minimum-scale=『最小倍率』, maximum-scale=『最大倍率』, user-scalable=『拡大縮小操作』"&gt;</p>
            <span class="fixed-space"></span>
            <p>※ 比較的多い設定は&lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;です</p>
            <p>※ viewportの解釈（効果）はOSによって異なりますのでご留意ください。特にiOS（iPhone、iPadなどのOS）はバージョンによって解釈が一定ではありません</p>
            <span class="fixed-space"></span>
            <h4>viewport設定出力</h4>
            <?php ta_alternative_input_checkbox( 'ta_responsible_viewport_onoff', '出力する' ); ?>
            <p>※ レスポンシブデザインが有効の時に有効です</p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>仮想表示幅</h4>
            <?php ta_simple_input( 'ta_responsible_viewport_width', 'ピクセル', 'short_box' ); ?>
            <p>※ 200～10000の範囲：端末に任せる場合の“device-width”は0を、未使用の場合は-1を入力してください</p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>初期拡大倍率</h4>
            <?php ta_simple_input( 'ta_responsible_viewport_init_scale', '倍', 'short_box' ); ?>
            <p>※ 最小倍率～最大倍率の範囲：未使用の場合は-1を入力してください</p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>最小倍率</h4>
            <?php ta_simple_input( 'ta_responsible_viewport_min_scale', '倍', 'short_box' ); ?>
            <p>※ 0～10の範囲：未使用の場合は-1を入力してください</p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>最大倍率</h4>
            <?php ta_simple_input( 'ta_responsible_viewport_max_scale', '倍', 'short_box' ); ?>
            <p>※ 0～10の範囲：未使用の場合は-1を入力してください</p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>ユーザーの拡大縮小操作許可</h4>
            <?php $init_value = ta_read_op( 'ta_responsible_viewport_scalable' ); ?>
            <p><input type="radio" name="ta_responsible_viewport_scalable" value="yes" <?php if ( "yes" == $init_value ) echo 'checked="checked"'; ?>> 許可する</p>
            <p><input type="radio" name="ta_responsible_viewport_scalable" value="no" <?php if ( "no" == $init_value ) echo 'checked="checked"'; ?>> 許可しない</p>
            <span class="fixed-space"></span>
          </div><!-- end of #ta_responsible_viewport_setting_disp -->
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'responsible', 'レスポンシブデザイン『基本設定』設定更新', 'basic' ); ?>
  </div><!-- end of #ta-responsible-tab-basic -->
  <?php } ?>
  
  
  <?php if ( 'bg' == $valid_tab ) { ?>
  <!-- 背景 -->
  <div class="tablevtab" id="ta-responsible-tab-bg">
    <?php ta_setting_form_start( 'responsible', 'bg' ); ?>
    <table class="ta-setting-table">
      <!-- レスポンシブデザイン時のトップページフレーム外背景色・背景画像 -->
      <tr>
        <?php ta_common_frame_setting( 'ta_responsible_top_outframe', 'トップページ<br>body背景色・画像', 'invalid', 'valid' ); ?>
      </tr>
      <!-- レスポンシブデザイン時のトップページ以外ページのフレーム外背景色・背景画像 -->
      <tr>
        <?php ta_common_frame_setting( 'ta_responsible_outframe', 'トップページ以外<br>body背景色・画像', 'invalid', 'valid' ); ?>
      </tr>
    </table>
    <?php ta_setting_form_end( 'responsible', 'レスポンシブデザイン『body背景色・画像』設定更新', 'bg' ); ?>
  </div><!-- end of #ta-responsible-tab-bg -->
  <?php } ?>
  
  
  <?php if ( 'bgbar' == $valid_tab ) { ?>
  <!-- 背景バー -->
  <div class="tablevtab" id="ta-responsible-tab-bgbar">
    <?php ta_setting_form_start( 'responsible', 'bgbar' ); ?>
    <table class="ta-setting-table">
      <!-- レスポンシブデザイン時のトップページフレーム外背景バー -->
      <tr>
        <?php ta_responsible_bar_setting( 'ta_responsible_top_outframe', 'トップページ<br>body背景バー', 'invalid', 'valid' ); ?>
      </tr>
      <!-- レスポンシブデザイン時のトップページ以外ページのフレーム外背景バー -->
      <tr>
        <?php ta_responsible_bar_setting( 'ta_responsible_outframe', 'トップページ以外<br>body背景バー', 'invalid', 'valid' ); ?>
      </tr>
    </table>
    <?php ta_setting_form_end( 'responsible', 'レスポンシブデザイン『body背景バー』設定更新', 'bgbar' ); ?>
  </div><!-- end of #ta-responsible-tab-bgbar -->
  <?php } ?>
  
  
  <?php if ( 'additional' == $valid_tab ) { ?>
  <!-- アディショナルモード -->
  <div class="tablevtab" id="ta-responsible-tab-additional">
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_additional_mode_setting();
} else { ?>
    <table class="ta-setting-table">
      <!-- アディショナルモード -->
      <tr>
        <th id="ta_responsible_additional_mode_title_no_thm001highend" class="no-ta-thm001highend">アディショナルモード<?php ta_man2_gd( 'responsible/additional' ); ?></th>
        <td></td>
      </tr>
    </table>
<?php
} ?>
  </div><!-- end of #ta-responsible-tab-additional -->
  <?php } ?>
  
  
  <?php if ( 'digest' == $valid_tab ) { ?>
  <!-- ダイジェスト・一覧 -->
  <div class="tablevtab" id="ta-responsible-tab-digest">
    <?php ta_setting_form_start( 'responsible', 'digest' ); ?>
    <table class="ta-setting-table">
      <!-- トップページのダイジェスト -->
      <tr>
        <th id="ta_responsible_top_digest_setting_title" class="big-title"><a href="JavaScript:void(0);">トップページ<br>ダイジェスト</a><?php ta_man2_gd( 'responsible/digest#top_digest' ); ?></th>
        <td>
          <div id="ta_responsible_top_digest_setting_disp" class="init-nodisp">
            <h4 id="ta_responsible_top_latestposts_title" class="pro-title"><a href="JavaScript:void(0);">トップページ最新投稿ダイジェスト</a></h4>
            <div id="ta_responsible_top_latestposts_disp" class="pro-disp init-nodisp">
              <span class="fixed-space"></span>
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <?php ta_alternative_input_checkbox( 'ta_responsible_top_latestposts_rows_onoff', '記事列数を1列にする' ); ?>
                  </td>
                  <td>
                    <?php ta_alternative_input_checkbox( 'ta_responsible_top_latestposts_excerpt_onoff', '抜粋コンテンツを非表示にする' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>コンテンツグループ画像のサイズ</h4>
              <?php $init = ta_read_op( 'ta_responsible_top_latestposts_img_size' ); ?>
              <table class="ta-fullcontents-table">
                <tr>
                  <td style="width:10em;">
                    <p><input type="radio" name="ta_responsible_top_latestposts_img_size" value="same" <?php if ( "same" == $init ) echo 'checked="checked"'; ?>> 標準と同じ</p>
                  </td>
                  <td></td>
                </tr>
                <tr>
                  <td>
                    <p><input type="radio" name="ta_responsible_top_latestposts_img_size" value="ta_square_image240" <?php if ( "ta_square_image240" == $init ) echo 'checked="checked"'; ?>> 240 x 240 px</p>
                  </td>
                  <td>
                    <p><input type="radio" name="ta_responsible_top_latestposts_img_size" value="ta_square_image90" <?php if ( "ta_square_image90" == $init ) echo 'checked="checked"'; ?>> 90 x 90 px</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p><input type="radio" name="ta_responsible_top_latestposts_img_size" value="ta_square_image180" <?php if ( "ta_square_image180" == $init ) echo 'checked="checked"'; ?>> 180 x 180 px</p>
                  </td>
                  <td>
                    <p><input type="radio" name="ta_responsible_top_latestposts_img_size" value="ta_square_image60" <?php if ( "ta_square_image60" == $init ) echo 'checked="checked"'; ?>> 60 x 60 px</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p><input type="radio" name="ta_responsible_top_latestposts_img_size" value="ta_square_image120" <?php if ( "ta_square_image120" == $init ) echo 'checked="checked"'; ?>> 120 x 120 px</p>
                  </td>
                  <td>
                    <p><input type="radio" name="ta_responsible_top_latestposts_img_size" value="none" <?php if ( "none" == $init ) echo 'checked="checked"'; ?>> 非表示</p>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>コンテンツグループ抜粋枠の最小高さ</h4>
                    <?php $init = ta_read_op( 'ta_responsible_top_latestposts_excerpt_minheight_type' ); ?>
                    <p><input type="radio" name="ta_responsible_top_latestposts_excerpt_minheight_type" value="same" <?php if ( "same" == $init ) echo 'checked="checked"'; ?>> 標準と同じ</p>
                    <p><input type="radio" name="ta_responsible_top_latestposts_excerpt_minheight_type" value="custom" <?php if ( "custom" == $init ) echo 'checked="checked"'; ?>> カスタム設定値</p>
                    <p>※ コンテンツグループ画像と<br>サイズバランスを取るための設定です</p>
                  </td>
                  <td>
                    <h4>カスタム設定値</h4>
                    <?php ta_simple_input( 'ta_responsible_top_latestposts_excerpt_minheight', 'ピクセル', 'short_box' ); ?>
                  </td>
                </tr>
              </table>
            </div><!-- end of #ta_responsible_top_latestposts_disp -->
            <span class="fixed-space"></span>
            <hr class="fixed-border">
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_responsible_dl_top_postdigest_setting();
} else { ?>
            <h4 style="color:#bbbbbb" class="no-ta-thm001highend">トップページ各種投稿ダイジェスト</h4>
<?php
} ?>
            <span class="fixed-space"></span>
          </div><!-- end of #ta_responsible_top_digest_setting_disp -->
        </td>
      </tr>
      <!-- サイドバーのダイジェスト -->
      <tr>
        <th id="ta_responsible_sidebar_digest_setting_title" class="big-title"><a href="JavaScript:void(0);">サイドバー<br>ダイジェスト</a><?php ta_man2_gd( 'responsible/digest#sidebar_digest' ); ?></th>
        <td>
          <div id="ta_responsible_sidebar_digest_setting_disp" class="init-nodisp">
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_responsible_dl_sidebar_latestposts_setting();
} else { ?>
          <h4 style="color:#bbbbbb" class="no-ta-thm001highend">サイドバー最新投稿ダイジェスト</h4>
<?php
} ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4 id="ta_responsible_sidebar_postdigest_title" class="pro-title"><a href="JavaScript:void(0);">サイドバー各種投稿ダイジェスト</a></h4>
            <div id="ta_responsible_sidebar_postdigest_disp" class="pro-disp init-nodisp">
              <span class="fixed-space"></span>
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <?php ta_alternative_input_checkbox( 'ta_responsible_sidebar_postdigest_rows_onoff', '記事列数を1列にする' ); ?>
                  </td>
                  <td>
                    <?php ta_alternative_input_checkbox( 'ta_responsible_sidebar_postdigest_excerpt_onoff', '抜粋コンテンツを非表示にする' ); ?>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <h4>コンテンツグループ画像のサイズ</h4>
              <?php $init = ta_read_op( 'ta_responsible_sidebar_postdigest_img_size' ); ?>
              <table class="ta-fullcontents-table">
                <tr>
                  <td style="width:10em;">
                    <p><input type="radio" name="ta_responsible_sidebar_postdigest_img_size" value="same" <?php if ( "same" == $init ) echo 'checked="checked"'; ?>> 標準と同じ</p>
                  </td>
                  <td></td>
                </tr>
                <tr>
                  <td>
                    <p><input type="radio" name="ta_responsible_sidebar_postdigest_img_size" value="ta_square_image240" <?php if ( "ta_square_image240" == $init ) echo 'checked="checked"'; ?>> 240 x 240 px</p>
                  </td>
                  <td>
                    <p><input type="radio" name="ta_responsible_sidebar_postdigest_img_size" value="ta_square_image90" <?php if ( "ta_square_image90" == $init ) echo 'checked="checked"'; ?>> 90 x 90 px</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p><input type="radio" name="ta_responsible_sidebar_postdigest_img_size" value="ta_square_image180" <?php if ( "ta_square_image180" == $init ) echo 'checked="checked"'; ?>> 180 x 180 px</p>
                  </td>
                  <td>
                    <p><input type="radio" name="ta_responsible_sidebar_postdigest_img_size" value="ta_square_image60" <?php if ( "ta_square_image60" == $init ) echo 'checked="checked"'; ?>> 60 x 60 px</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p><input type="radio" name="ta_responsible_sidebar_postdigest_img_size" value="ta_square_image120" <?php if ( "ta_square_image120" == $init ) echo 'checked="checked"'; ?>> 120 x 120 px</p>
                  </td>
                  <td>
                    <p><input type="radio" name="ta_responsible_sidebar_postdigest_img_size" value="none" <?php if ( "none" == $init ) echo 'checked="checked"'; ?>> 非表示</p>
                  </td>
                </tr>
              </table>
              <span class="fixed-space"></span>
              <hr class="fixed-border">
              <table class="ta-2contents-table">
                <tr>
                  <td>
                    <h4>コンテンツグループ抜粋枠の最小高さ</h4>
                    <?php $init = ta_read_op( 'ta_responsible_sidebar_postdigest_excerpt_minheight_type' ); ?>
                    <p><input type="radio" name="ta_responsible_sidebar_postdigest_excerpt_minheight_type" value="same" <?php if ( "same" == $init ) echo 'checked="checked"'; ?>> 標準と同じ</p>
                    <p><input type="radio" name="ta_responsible_sidebar_postdigest_excerpt_minheight_type" value="custom" <?php if ( "custom" == $init ) echo 'checked="checked"'; ?>> カスタム設定値</p>
                    <p>※ コンテンツグループ画像と<br>サイズバランスを取るための設定です</p>
                  </td>
                  <td>
                    <h4>カスタム設定値</h4>
                    <?php ta_simple_input( 'ta_responsible_sidebar_postdigest_excerpt_minheight', 'ピクセル', 'short_box' ); ?>
                  </td>
                </tr>
              </table>
            </div><!-- end of #ta_responsible_sidebar_postdigest_disp -->
            <span class="fixed-space"></span>
          </div><!-- end of #ta_responsible_sidebar_digest_setting_disp -->
        </td>
      </tr>
      <!-- サブサイドバーのダイジェスト -->
      <tr>
        <th id="ta_responsible_sidebarsub_digest_setting_title" class="big-title"><a href="JavaScript:void(0);">サブサイドバー<br>ダイジェスト</a><?php ta_man2_gd( 'responsible/digest#sidebar_digest' ); ?></th>
        <td>
          <div id="ta_responsible_sidebarsub_digest_setting_disp" class="init-nodisp">
    
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_responsible_dl_sidebarsub_digest_setting();
} else { ?>
          <h4 style="color:#bbbbbb" class="no-ta-thm001highend">サブサイドバー最新投稿ダイジェスト</h4>
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <h4 style="color:#bbbbbb" class="no-ta-thm001highend">サブサイドバー各種投稿ダイジェスト</h4>
          <span class="fixed-space"></span>
<?php
} ?>
          </div><!-- end of #ta_responsible_sidebarsub_digest_setting_disp -->
        </td>
      </tr>
      <!-- 一覧（アーカイブ）-->
      <tr>
        <th id="ta_responsible_archive_digest_setting_title" class="big-title"><a href="JavaScript:void(0);">一覧（アーカイブ）</a><?php ta_man2_gd( 'responsible/digest#archive_digest' ); ?></th>
        <td>
          <div id="ta_responsible_archive_digest_setting_disp" class="init-nodisp">
            <span class="fixed-space"></span>
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <?php ta_alternative_input_checkbox( 'ta_responsible_archive_rows_onoff', '記事列数を1列にする' ); ?>
                </td>
                <td>
                  <?php ta_alternative_input_checkbox( 'ta_responsible_archive_excerpt_onoff', '抜粋コンテンツを非表示にする' ); ?>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>コンテンツグループ画像のサイズ</h4>
            <?php $init = ta_read_op( 'ta_responsible_archive_img_size' ); ?>
            <table class="ta-fullcontents-table">
              <tr>
                <td style="width:10em;">
                  <p><input type="radio" name="ta_responsible_archive_img_size" value="same" <?php if ( "same" == $init ) echo 'checked="checked"'; ?>> 標準と同じ</p>
                </td>
                <td></td>
              </tr>
              <tr>
                <td>
                  <p><input type="radio" name="ta_responsible_archive_img_size" value="ta_square_image240" <?php if ( "ta_square_image240" == $init ) echo 'checked="checked"'; ?>> 240 x 240 px</p>
                </td>
                <td>
                  <p><input type="radio" name="ta_responsible_archive_img_size" value="ta_square_image90" <?php if ( "ta_square_image90" == $init ) echo 'checked="checked"'; ?>> 90 x 90 px</p>
                </td>
              </tr>
              <tr>
                <td>
                  <p><input type="radio" name="ta_responsible_archive_img_size" value="ta_square_image180" <?php if ( "ta_square_image180" == $init ) echo 'checked="checked"'; ?>> 180 x 180 px</p>
                </td>
                <td>
                  <p><input type="radio" name="ta_responsible_archive_img_size" value="ta_square_image60" <?php if ( "ta_square_image60" == $init ) echo 'checked="checked"'; ?>> 60 x 60 px</p>
                </td>
              </tr>
              <tr>
                <td>
                  <p><input type="radio" name="ta_responsible_archive_img_size" value="ta_square_image120" <?php if ( "ta_square_image120" == $init ) echo 'checked="checked"'; ?>> 120 x 120 px</p>
                </td>
                <td>
                  <p><input type="radio" name="ta_responsible_archive_img_size" value="none" <?php if ( "none" == $init ) echo 'checked="checked"'; ?>> 非表示</p>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <h4>コンテンツグループ抜粋枠の最小高さ</h4>
                  <?php $init = ta_read_op( 'ta_responsible_archive_excerpt_minheight_type' ); ?>
                  <p><input type="radio" name="ta_responsible_archive_excerpt_minheight_type" value="same" <?php if ( "same" == $init ) echo 'checked="checked"'; ?>> 標準と同じ</p>
                  <p><input type="radio" name="ta_responsible_archive_excerpt_minheight_type" value="custom" <?php if ( "custom" == $init ) echo 'checked="checked"'; ?>> カスタム設定値</p>
                  <p>※ コンテンツグループ画像と<br>サイズバランスを取るための設定です</p>
                </td>
                <td>
                  <h4>カスタム設定値</h4>
                  <?php ta_simple_input( 'ta_responsible_archive_excerpt_minheight', 'ピクセル', 'short_box' ); ?>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
          </div><!-- end of #ta_responsible_archive_digest_setting_disp -->
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'responsible', 'レスポンシブデザイン『ダイジェスト・一覧』設定更新', 'digest' ); ?>
  </div><!-- end of #ta-responsible-digest -->
  <?php } ?>
  
  
  <?php if ( 'freecss' == $valid_tab ) { ?>
  <!-- レスポンシブデザインフリーCSS -->
  <div class="tablevtab" id="ta-responsible-tab-freecss">
    <?php ta_setting_form_start( 'responsible', 'freecss' ); ?>
    <table class="ta-setting-table">
      <!-- レスポンシブデザインフリーCSS -->
      <tr>
        <th id="ta_responsible_freecss_title">フリーCSS<?php ta_man2_gd( 'responsible/freecss' ); ?></th>
        <td>
          <!-- 通常表示 -->
          <h4>レスポンシブデザインフリーCSS機能</h4>
          <?php ta_alternative_input_checkbox( 'ta_responsible_freecss_onoff', 'レスポンシブデザインフリーCSS機能を有効にする' ); ?>
          <p>※ 動作に不具合がある場合は無効にして下さい</p>
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <!-- 詳細設定 -->
          <h4 id="ta_responsible_freecss_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
          <div id="ta_responsible_freecss_pro_disp" class="pro-disp init-nodisp">
            <h4>レスポンシブデザインフリーCSSコード</h4>
            <?php ta_textarea_input( 'ta_responsible_freecss_code', 5, 67 ); ?>
            <p>フリーCSSファイルのパスは、テーマ直下/css/ta-dynamic-freecss.cssです</p>
          </div><!-- end of #ta_common_freecss_pro_disp -->
          <span class="fixed-space"></span>
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'responsible', 'レスポンシブデザイン『フリーCSS』設定更新', 'freecss' ); ?>
  </div><!-- end of #ta-responsible-freecss -->
  <?php } ?>
</div>
<?php
ta_progress_disp();
ta_info_disp(); ?>
