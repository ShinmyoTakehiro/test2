<?php
/*******************************************************************************************************/
/*
/* テックエイドの成長する自作ホームページWordPressテーマ『 TAテーマ001 (ta-theme001) 』
/*
/* ta-main-custombox-callback.php: ( Latest Version 2.04 2017.02.24 )
/*
/* このプログラムの著作権、使用権、その他全ての権利はde集まれ株式会社に属します。
/* The copyright, royalty and all the other rights of this program belong to deatsumare Corporation.
/*
/* File Version 履歴
/* File Version 2.00 2016.02.28: first edition by Kotaro Kashiwamura.
/* File Version 2.01 2016.03.14: h3タイトルアコーディオン展開
/*                               ta_post_setting_show()処理追加 by Kotaro Kashiwamura.
/* File Version 2.02 2016.06.28: トップページフリーエリアのh3 classからfirst-title削除 by Kotaro Kashiwamura.
/* File Version 2.03 2016.08.27: 通常表示（コンテンツをPC時に表示するか）の追加
/*                               順序番号の位置修正 by Kotaro Kashiwamura.
/* File Version 2.04 2017.02.24: 体裁調整 by Kotaro Kashiwamura.
/*
/*******************************************************************************************************/
ta_post_setting_show();
if ( TA_HIEND_PI ) { require_once( TA_HIEND_PI_DIR . '/general-modules/ta-theme001-highend-custombox.php' ); } ?>
<div id="ta-post-setting-form">
<?php
//認証にnonceを使用する
wp_nonce_field( 'ta_nonce_key', 'ta_custombox' ); ?>
  <div class="ta-manual-info" style="margin-bottom:1em;"><a href="http://theme001.tec-aid.com/thm001_manual_p2/thm001_manual_basicope_p2#freearea_use" target="_blank"><span class="dashicons dashicons-editor-help"></span></a></div>
  <h4>順序番号（0以上の整数）</h4>
  <?php $init_value = ( '' == get_post_meta( get_the_ID(), '_ta_post_order', true ) ) ? ta_init( 'ta_post_order' ) - 100 : get_post_meta( get_the_ID(), '_ta_post_order', true ) - 100; ?>
  <p><input class="short_box" type="text" name="ta_post_order" value="<?php echo $init_value; ?>" /></p>
  <span class="outer-fixed-space"></span>
  <table class="ta-setting-table">
    <?php ta_top_custombox_message_disp(); ?>
    <!-- トップページフリーエリア -->
    <tr>
      <th id="ta_freearea_basical_setting_title" class="big-title"><a href="JavaScript:void(0);">トップページフリーエリア</a></th>
      <td>
        <div id="ta_freearea_basical_setting_disp" class="init-nodisp">
          <?php ta_toppage_top_margin_setting( 'ta_post', get_the_ID() ); ?>
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <h4>フリーエリアのタイトルの表示設定</h4>
          <?php ta_alternative_input( 'ta_post_freearea_title_onoff', '表示', '非表示', 'postmeta', 'common', get_the_ID() ); ?>
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <!-- 詳細設定 -->
          <h4 id="ta_post_freearea_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
          <div id="ta_post_freearea_pro_disp" class="pro-disp init-nodisp">
            <h4>フリーエリアのタイトル要素名設定</h4>
            <?php ta_factor_selection_process( 'ta_post_freearea_title_factor', 'postmeta', get_the_ID(), 'common', 'メイン' ); ?>
          </div><!-- end of #ta_post_freearea_pro_disp -->
          <span class="fixed-space"></span>
        </div><!-- end of #ta_freearea_basical_setting_disp -->
      </td>
    </tr>
    <!-- トップページフリーエリア・バナー画像・付随文 -->
    <tr>
      <th id="ta_freearea_banner_imgtxt_title" class="big-title"><a href="JavaScript:void(0);">トップページフリーエリア<br>バナー画像・付随文</a></th>
      <td>
        <div id="ta_freearea_banner_imgtxt_disp" class="init-nodisp">
          <h4>バナー画像</h4>
          <?php ta_img_upload_process( 'ta_post_freearea_img', 'postmeta', get_the_ID() ); ?>
          <p>※ 縦横幅の最大値を500ピクセルに制限しています</p>
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <h4>バナー画像のリンク</h4>
          <?php ta_link_process_w_newwin( 'ta_post_freearea_img_link', 'postmeta', get_the_ID() ); ?>
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <h4>バナー画像付随文</h4>
          <?php ta_text_input( 'ta_post_freearea_text', 'long_box', 'postmeta', get_the_ID() ) ?>
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <h4>バナー画像付随文のリンク</h4>
          <?php ta_link_process_w_newwin( 'ta_post_freearea_text_link', 'postmeta', get_the_ID() ); ?>
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <!-- 詳細設定 -->
          <h4 id="ta_post_freearea_img_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
          <div id="ta_post_freearea_img_pro_disp" class="pro-disp init-nodisp">
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <h4>バナー画像・付随文<br>センタリング</h4>
                  <?php ta_alternative_input_checkbox( 'ta_post_freearea_img_centering', 'センタリングする', 'postmeta', get_the_ID() ); ?>
                </td>
                <td>
                  <h4>付随文の位置</h4>
                  <?php $ta_post_freearea_text_position = ta_read_post( get_the_ID(), 'ta_post_freearea_text_position' ); ?>
                  <p><input type="radio" name="ta_post_freearea_text_position" value="none" <?php if ( "none" == $ta_post_freearea_text_position ) echo 'checked="checked"' ?>> 表示しない</p>
                  <p><input type="radio" name="ta_post_freearea_text_position" value="top" <?php if ( "top" == $ta_post_freearea_text_position ) echo 'checked="checked"' ?>> 画像の上</p>
                  <p><input type="radio" name="ta_post_freearea_text_position" value="bottom" <?php if ( "bottom" == $ta_post_freearea_text_position ) echo 'checked="checked"' ?>> 画像の下</p>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <h4>通常表示<br>バナー画像の幅</h4>
                  <?php ta_simple_input( 'ta_post_main_freearea_img_width', '％', 'short_box', 'postmeta', get_the_ID() ); ?>
                </td>
                <td>
                  <h4>レスポンシブデザイン<br>バナー画像の幅</h4>
                  <?php ta_simple_input( 'ta_post_freearea_img_width_for_rsp', '％', 'short_box', 'postmeta', get_the_ID() ); ?>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <h4>バナー画像の左側余白</h4>
                  <?php ta_simple_input( 'ta_post_freearea_img_leftmargin', '％', 'short_box', 'postmeta', get_the_ID() ); ?>
                </td>
                <td>
                  <h4>付随文の左側余白</h4>
                  <?php ta_simple_input( 'ta_post_freearea_text_leftmargin', 'ピクセル', 'short_box', 'postmeta', get_the_ID() ); ?>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <h4>付随文サイズ</h4>
                  <?php ta_simple_input( 'ta_post_freearea_text_fontsize', '％', 'short_box', 'postmeta', get_the_ID() ); ?>
                </td>
                <td>
                  <h4>付随文の太さ</h4>
                  <?php ta_fontweight_selection_posttype( 'ta_post_freearea_text_fontweight', get_the_ID() ); ?>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>リンク付付随文の下線</h4>
            <?php ta_alternative_input_checkbox( 'ta_post_freearea_text_underline_onoff', '表示する', 'postmeta', get_the_ID() ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <h4>付随文の色</h4>
                  <?php ta_color_picker_no_tomei_process_posttype( 'ta_post_freearea_text_fontcolor', get_the_ID() ); ?>
                </td>
                <td>
                  <h4>付随文のHOVER色</h4>
                  <?php ta_color_picker_no_tomei_process_posttype( 'ta_post_freearea_text_fontcolorhover', get_the_ID() ); ?>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <h4>付随文の上余白（padding）</h4>
                  <?php ta_simple_input( 'ta_post_freearea_text_tpadding', 'em', 'short_box', 'postmeta', get_the_ID() ); ?>
                </td>
                <td>
                  <h4>付随文の下余白（padding）</h4>
                  <?php ta_simple_input( 'ta_post_freearea_text_bpadding', 'em', 'short_box', 'postmeta', get_the_ID() ); ?>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
          </div><!-- end of #ta_post_freearea_img_pro_disp -->
          <span class="fixed-space"></span>
        </div><!-- end of #ta_freearea_banner_imgtxt_disp -->
      </td>
    </tr>
    <!-- コンテンツ枠（本コンテンツ、バナー画像、付随文の全てを囲む枠です）-->
    <tr>
      <th id="ta_freearea_frame_border_title" class="big-title"><a href="JavaScript:void(0);">トップページフリーエリア<br>コンテンツ枠</a></th>
      <td>
        <div id="ta_freearea_frame_border_disp" class="init-nodisp">
          <span class="fixed-space"></span>
          <p>※ 本コンテンツ、バナー画像、付随文の全てを囲む枠です</p>
          <table class="ta-2contents-table">
            <tr>
              <td>
                <h4>通常表示<br>コンテンツ枠幅</h4>
                <?php ta_simple_input( 'ta_post_freearea_imgtext_width', '％', 'short_box', 'postmeta', get_the_ID() ); ?>
              </td>
              <td>
                <h4>レスポンシブデザイン<br>コンテンツ枠幅</h4>
                <?php ta_simple_input( 'ta_post_freearea_imgtext_width_for_rsp', '％', 'short_box', 'postmeta', get_the_ID() ); ?>
              </td>
            </tr>
          </table>
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <!-- 詳細設定 -->
          <h4 id="ta_post_freearea_imgtext_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
          <div id="ta_post_freearea_imgtext_pro_disp" class="pro-disp init-nodisp">
<?php
if ( TA_HIEND_PI ) {
  ta_freearea_imgtext_border();
} else { ?>
            <h4 class="no-ta-thm001highend">コンテンツ枠境界線</h3>
<?php
} ?>
          </div><!-- end of #ta_post_freearea_imgtext_pro_disp -->
          <span class="fixed-space"></span>
        </div><!-- end of #ta_freearea_frame_border_disp -->
      </td>
    </tr>
    <!-- トップページフリーエリア・レスポンシブ表示 -->
    <tr>
      <th id="ta_freearea_responsible_disp_title" class="big-title"><a href="JavaScript:void(0);">トップページフリーエリア<br>レスポンシブ表示</a></th>
      <td>
        <div id="ta_freearea_responsible_disp_disp" class="init-nodisp">
          <span class="fixed-space"></span>
          <?php ta_alternative_input_checkbox( 'ta_post_freearea_responsible_disp_onoff', 'このコンテンツをレスポンシブ有効時に表示する', 'postmeta', get_the_ID() ); ?>
        </div><!-- end of #ta_freearea_responsible_disp_disp -->
      </td>
    </tr>
    <!-- トップページフリーエリア・通常表示 -->
    <tr>
      <th id="ta_post_freearea_normal_disp_title" class="big-title"><a href="JavaScript:void(0);">トップページフリーエリア<br>通常表示</a></th>
      <td>
        <div id="ta_post_freearea_normal_disp_disp" class="init-nodisp">
          <span class="fixed-space"></span>
          <?php ta_alternative_input_checkbox( 'ta_post_freearea_normal_disp_onoff', 'このコンテンツを通常表示（PC時に表示）する', 'postmeta', get_the_ID() ); ?>
        </div><!-- end of #ta_post_freearea_normal_disp_disp -->
      </td>
    </tr>
  </table>
</div>
