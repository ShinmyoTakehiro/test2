<?php
/*******************************************************************************************************/
/*
/* テックエイドの成長する自作ホームページWordPressテーマ『 TAテーマ001 (ta-theme001) 』
/*
/* ta-page-custombox-callback.php: ( Latest Version 2.05 2017.04.12 )
/*
/* このプログラムの著作権、使用権、その他全ての権利はde集まれ株式会社に属します。
/* The copyright, royalty and all the other rights of this program belong to deatsumare Corporation.
/*
/* File Version 履歴
/* File Version 2.00 2016.02.23: first edition by Kotaro Kashiwamura.
/* File Version 2.01 2016.03.14: h3タイトルアコーディオン展開
/*                               ta_post_setting_show()処理追加 by Kotaro Kashiwamura.
/* File Version 2.02 2016.06.28: コンテンツ先頭余白設定のh3 classからfirst-title削除 by Kotaro Kashiwamura.
/* File Version 2.03 2016.08.29: h1表記修正、ヘッダー画像設定追加 by Kotaro Kashiwamura.
/* File Version 2.04 2017.03.08: 体裁調整 by Kotaro Kashiwamura.
/* File Version 2.05 2017.04.12: 体裁調整 by Kotaro Kashiwamura.
/*
/*******************************************************************************************************/
ta_post_setting_show();
if ( TA_HIEND_PI ) { require_once( TA_HIEND_PI_DIR . '/general-modules/ta-theme001-highend-custombox.php' ); } ?>
<div id="ta-post-setting-form">
<?php
//認証にnonceを使用する
wp_nonce_field( 'ta_nonce_key', 'ta_custombox' );
$front_id = get_option( 'page_on_front'); //フロントページのIDを取得
if ( $front_id != get_the_ID() ) { ?>
  <div class="ta-manual-info" style="margin-bottom:1em;"><a href="http://theme001.tec-aid.com/thm001_manual_p2/thm001_manual_basicope_p2#page_use" target="_blank"><span class="dashicons dashicons-editor-help"></span></a></div>
  <table class="ta-setting-table">
    <?php ta_custombox_message_disp(); ?>
    <!-- コンテンツトップ余白 -->
    <tr>
      <th id="ta_post_top_margin_common_title" class="big-title"><a href="JavaScript:void(0);">コンテンツトップ余白</a></th>
      <td>
        <div id="ta_post_top_margin_common_disp" class="init-nodisp">
          <?php ta_main_top_margin_common_setting( 'ta_post', get_the_ID() ); ?>
          <span class="fixed-space"></span>
        </div><!-- end of #ta_post_top_margin_common_disp -->
      </td>
    </tr>
    <!-- データ入力用のフォーム -->
    <tr>
      <th id="ta_post_frame_type_title" class="big-title"><a href="JavaScript:void(0);">フレームタイプ</a></th>
      <td>
        <div id="ta_post_frame_type_disp" class="init-nodisp">
          <span class="fixed-space"></span>
          <?php ta_frametype_selection_process( 'ta_post_frame_type', 'postmeta', get_the_ID() ); ?>
          <span class="fixed-space"></span>
        </div><!-- end of #ta_post_frame_type_disp -->
      </td>
    </tr>
    <!-- 基本パーツ表示 -->
    <tr>
      <th id="ta_post_custom_title" class="big-title"><a href="JavaScript:void(0);">基本パーツ表示</a></th>
      <td>
        <div id="ta_post_custom_disp" class="init-nodisp">
          <?php ta_parts_select_checkboxes( 'ta_post_custom', 'postmeta', 'common', get_the_ID() ); ?>
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <h4>固定ページSNSボタン</h4>
          <?php ta_sns_position_selection( 'ta_post_sns_position', 'page', 'postmeta', get_the_ID() ); ?>
          <span class="fixed-space"></span>
        </div><!-- end of #ta_post_custom_disp -->
      </td>
    </tr>
    <!-- 固定ページSEO -->
    <tr>
      <th id="ta_post_seo_title" class="big-title"><a href="JavaScript:void(0);">固定ページSEO</a></th>
      <td>
        <div id="ta_post_seo_disp" class="init-nodisp">
          <h4 class="ta-html-strip">SEOキーワード</h4>
          <?php ta_text_input( 'ta_post_seo_keywords', 'long_box', 'postmeta', get_the_ID() ); ?>
          <p>※ コロン","で区切って入力してください。共通キーワードの前に追加されます</p>
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <h4 class="ta-html-strip">SEOディスクリプション</h4>
          <?php ta_textarea_input( 'ta_post_seo_description', 5, 67, 'postmeta', get_the_ID() ); ?>
<?php
if ( 'valid' == ta_read_op( 'ta_common_seo_description_excerptonoff' ) ) { ?>
          <p>※ 120文字以内で入力してください。設定が未入力の場合は本文の抜粋（120文字）が採用されます</p>
<?php
} else { ?>
          <p>※ 120文字以内で入力してください。設定が未入力の場合は共通ディスクリプションが採用されます</p>
<?php
} ?>
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <h4 class="ta-html-esc-asisexe">h1表記</h4>
          <?php ta_text_input( 'ta_post_h1_content', 'long_box', 'postmeta', get_the_ID() ); ?>
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <h4>カノニカルタグ設定</h4>
          <?php ta_text_input( 'ta_post_canonical_domain', 'long_box', 'postmeta', get_the_ID() ); ?>
          <p>※ 設定しない場合はWordPressに登録されているドメインが採用されます</p>
          <span class="fixed-space"></span>
        </div><!-- end of #ta_post_seo_disp -->
      </td>
    </tr>
    <!-- 固定ページOGP -->
    <tr>
      <th id="ta_post_ogp_title" class="big-title"><a href="JavaScript:void(0);">固定ページOGP</a></th>
      <td>
        <div id="ta_post_ogp_disp" class="init-nodisp">
          <h4>OGPタグ出力設定</h4>
          <?php ta_alternative_input_checkbox( 'ta_post_ogp_onoff', '出力する', 'postmeta', get_the_ID() ); ?>
          <p class="cb-onoff-exp-under"></p>
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <!-- 詳細設定 -->
          <h4 id="ta_post_ogp_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
          <div id="ta_post_ogp_pro_disp" class="pro-disp init-nodisp">
            <h4 class="ta-html-strip">OGPタイトルの設定</h4>
            <?php ta_text_input( 'ta_post_ogp_title', 'long_box', 'postmeta', get_the_ID() ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4 class="ta-html-strip">OGPサイト名の設定</h4>
            <?php ta_text_input( 'ta_post_ogp_site_name', 'long_box', 'postmeta', get_the_ID() ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4 class="ta-html-strip">OGPディスクリプションの設定</h4>
            <?php ta_text_input( 'ta_post_ogp_description', 'long_box', 'postmeta', get_the_ID() ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>OGP画像の設定</h4>
            <?php ta_img_upload_process( 'ta_post_ogp_image', 'postmeta', get_the_ID() ); ?>
            <p>※ 縦横幅の最大値を500ピクセルに制限しています</p>
          </div><!-- end of #ta_post_ogp_pro_disp -->
          <span class="fixed-space"></span>
        </div><!-- end of #ta_post_ogp_disp -->
      </td>
    </tr>
    <!-- 固定ページTwitter Cards -->
    <tr>
      <th id="ta_post_twittercards_title" class="big-title"><a href="JavaScript:void(0);">固定ページTwitter Cards</a></th>
      <td>
        <div id="ta_post_twittercards_disp" class="init-nodisp">
          <h4>Twitter Cardsタグ出力設定</h4>
          <?php ta_alternative_input_checkbox( 'ta_post_twittercards_onoff', '出力する', 'postmeta', get_the_ID() ); ?>
          <p class="cb-onoff-exp-under"></p>
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <!-- 詳細設定 -->
          <h4 id="ta_post_twittercards_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
          <div id="ta_post_twittercards_pro_disp" class="pro-disp init-nodisp">
            <h4 class="ta-html-strip">Twitter Cardsタイトルの設定</h4>
            <?php ta_text_input( 'ta_post_twittercards_title', 'long_box', 'postmeta', get_the_ID() ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4 class="ta-html-strip">Twitter Cardsディスクリプションの設定</h4>
            <?php ta_text_input( 'ta_post_twittercards_description', 'long_box', 'postmeta', get_the_ID() ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>Twitter Cards画像の設定</h4>
            <?php ta_img_upload_process( 'ta_post_twittercards_image', 'postmeta', get_the_ID() ); ?>
            <p>※ 縦横幅の最大値を500ピクセルに制限しています</p>
          </div><!-- end of #ta_post_twittercards_pro_disp -->
          <span class="fixed-space"></span>
        </div><!-- end of #ta_post_twittercards_disp -->
      </td>
    </tr>
    <!-- ヘッダー画像 -->
    <tr>
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_page_header_img_setting();
} else { ?>
      <th class="no-ta-thm001highend">固定ページのヘッダー画像</th>
      <td></td>
<?php
} ?>
    </tr>
    <!-- タイトル上のアイキャッチ画像 -->
    <tr>
      <th id="ta_page_eyecatch_title" class="big-title"><a href="JavaScript:void(0);">タイトル上のアイキャッチ画像</a></th>
      <td>
        <div id="ta_page_eyecatch_disp" class="init-nodisp">
          <span class="fixed-space"></span>
          <?php $ta_page_eyecatch_onoff = ta_read_post( get_the_ID(), 'ta_page_eyecatch_onoff' ); ?>
          <p><input type="radio" name="ta_page_eyecatch_onoff" value="common" <?php if ( "common" == $ta_page_eyecatch_onoff ) echo 'checked="checked"' ?>> 共通設定</p>
          <p><input type="radio" name="ta_page_eyecatch_onoff" value="valid" <?php if ( "valid" == $ta_page_eyecatch_onoff ) echo 'checked="checked"' ?>> 表示する</p>
          <p><input type="radio" name="ta_page_eyecatch_onoff" value="invalid" <?php if ( "invalid" == $ta_page_eyecatch_onoff ) echo 'checked="checked"' ?>> 表示しない</p>
          <p>※ タイトルの上の画像は4：1の横長切り抜き画像になります</p>
          <span class="fixed-space"></span>
        </div><!-- end of #ta_page_eyecatch_disp -->
      </td>
    </tr>
    <!-- 閲覧制限 -->
    <tr>
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_page_view_limit_setting( '固定ページ' );
} else { ?>
      <th class="no-ta-thm001highend">固定ページの閲覧制限</th>
      <td></td>
<?php
} ?>
    </tr>
    <!-- サイトマップ掲載 -->
    <tr>
      <th id="ta_post_sitemap_title" class="big-title"><a href="JavaScript:void(0);">サイトマップ掲載</a></th>
      <td>
        <div id="ta_post_sitemap_disp" class="init-nodisp">
          <span class="fixed-space"></span>
          <?php ta_alternative_input_checkbox( 'ta_post_sitemap_disp_onoff', 'この固定ページをテックエイドサイトマップに表示させない', 'postmeta', get_the_ID() ); ?>
        </div><!-- end of #ta_post_sitemap_disp -->
      </td>
    </tr>
    <!-- インデックス・フォロー処理 -->
    <tr>
      <th id="ta_post_indexfollow_title" class="big-title"><a href="JavaScript:void(0);">インデックス・フォロー処理</a></th>
      <td>
        <div id="ta_post_indexfollow_disp" class="init-nodisp">
          <?php $init_value = ta_read_post( get_the_ID(), 'ta_post_indexfollow' ); ?>
          <span class="fixed-space"></span>
          <p><input type="radio" name="ta_post_indexfollow" value="none" <?php if ( "none" == $init_value ) echo 'checked="checked"' ?>> 対象にする</p>
          <p><input type="radio" name="ta_post_indexfollow" value="noindex,follow" <?php if ( "noindex,follow" == $init_value ) echo 'checked="checked"' ?>> 対象にしない（noindex, follow: 推奨）</p>
          <p><input type="radio" name="ta_post_indexfollow" value="noindex,nofollow" <?php if ( "noindex,nofollow" == $init_value ) echo 'checked="checked"' ?>> 対象にしない（noindex, nofollow）</p>
          <p>※ この固定ページを検索エンジンの対象にするかどうかを設定します。（WordPress設定の『表示設定』⇒『検索エンジンでの表示』の設定が優先します）</p>
          <span class="fixed-space"></span>
        </div><!-- end of #ta_post_indexfollow_disp -->
      </td>
    </tr>
  </table>
<?php
} else { ?>
  <p>トップページの設定はTAフォーマット設定メニューの “トップページ” の中で行ってください。</p>
<?php
} ?>
</div>
