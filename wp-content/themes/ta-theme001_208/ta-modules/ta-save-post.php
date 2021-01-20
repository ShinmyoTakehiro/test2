<?php
/*******************************************************************************************************/
/*
/* テックエイドの成長する自作ホームページWordPressテーマ『 TAテーマ001 (ta-theme001) 』
/*
/* ta-save-post.php: ( Latest Version 2.03 2016.12.15 )
/*
/* このプログラムの著作権、使用権、その他全ての権利はde集まれ株式会社に属します。
/* The copyright, royalty and all the other rights of this program belong to deatsumare Corporation.
/*
/* File Version 履歴
/* File Version 2.00 2016.02.23: first edition by Kotaro Kashiwamura.
/* File Version 2.01 2016.07.01: 順序番号の格納関数はクイック編集にも存在コメント by Kotaro Kashiwamura.
/* File Version 2.02 2016.08.29: ta_post_freearea_normal_disp_onoff追加、h1表記修正、
/*                               固定ページヘッダー画像設定追加 by Kotaro Kashiwamura.
/* File Version 2.03 2016.12.15: ta_post_freearea_menu_num設定追加 by Kotaro Kashiwamura.
/*
/*******************************************************************************************************/
if ( TA_HIEND_PI ) { require_once( TA_HIEND_PI_DIR . '/general-modules/ta-theme001-highend-savepost.php' ); }
//nonceの確認
if ( ! isset( $_POST['ta_custombox'] ) ) return $post_id;
if ( ! wp_verify_nonce( $_POST['ta_custombox'], 'ta_nonce_key' ) ) return $post_id;

//自動保存ルーチンのチェック
if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return $post_id;

//TAエンドロールFA表示
ta_update_postmeta( $post_id, 'ta_endroll_freearea_post_cmmn_onoff', 'as_is' );
ta_update_postmeta( $post_id, 'ta_endroll_freearea_post_frnt_onoff', 'single_check' );
ta_update_postmeta( $post_id, 'ta_endroll_freearea_post_page_onoff', 'single_check' );
ta_update_postmeta( $post_id, 'ta_endroll_freearea_post_post_onoff', 'single_check' );
ta_update_postmeta( $post_id, 'ta_endroll_freearea_post_list_onoff', 'single_check' );
//順序番号（nonce key違いでクイック編集処理にも同関数が存在する）
ta_update_postmeta( $post_id, 'ta_post_order', 'nump100' );
//コンテンツ先頭余白　（マージン）
ta_update_postmeta( $post_id, 'ta_post_header_top_margin', 'as_is' );
ta_update_postmeta( $post_id, 'ta_post_top_margin', 'as_is' );
ta_update_postmeta( $post_id, 'ta_post_top_margin_value', 'numeral' );
ta_update_postmeta( $post_id, 'ta_post_each_top_margin', 'as_is' );
ta_update_postmeta( $post_id, 'ta_post_each_top_margin_value', 'numeral' );
//個別のフレームタイプ
ta_update_postmeta( $post_id, 'ta_post_frame_type', 'as_is' );
//既存パーツ表示設定
ta_update_postmeta( $post_id, 'ta_post_custom_bgimg_onoff', 'as_is' );
ta_update_postmeta( $post_id, 'ta_post_custom_common_onoff', 'as_is' );
ta_update_postmeta( $post_id, 'ta_post_custom_banner_onoff', 'single_check' );
ta_update_postmeta( $post_id, 'ta_post_custom_image_onoff', 'single_check' );
ta_update_postmeta( $post_id, 'ta_post_custom_global_onoff', 'single_check' );
ta_update_postmeta( $post_id, 'ta_post_custom_bread_onoff', 'single_check' );
ta_update_postmeta( $post_id, 'ta_post_custom_title_onoff', 'as_is' );
ta_update_postmeta( $post_id, 'ta_post_custom_footer_onoff', 'as_is' );
//個別のSEO設定
ta_update_postmeta( $post_id, 'ta_post_seo_keywords', 'strip_html' );
ta_update_postmeta( $post_id, 'ta_post_seo_description', 'excerpt_nocr', 120 );
ta_update_postmeta( $post_id, 'ta_post_h1_content', 'text' );
ta_update_postmeta( $post_id, 'ta_post_canonical_domain', 'url' );
//個別のSNSボタン位置
ta_update_postmeta( $post_id, 'ta_post_sns_position', 'as_is' );
//個別のOGP
ta_update_postmeta( $post_id, 'ta_post_ogp_onoff', 'single_check' );
ta_update_postmeta( $post_id, 'ta_post_ogp_title', 'strip_html' );
ta_update_postmeta( $post_id, 'ta_post_ogp_site_name', 'strip_html' );
ta_update_postmeta( $post_id, 'ta_post_ogp_description', 'strip_html' );
ta_update_postmeta( $post_id, 'ta_post_ogp_image', 'url' );
//個別のTwitter Cards
ta_update_postmeta( $post_id, 'ta_post_twittercards_onoff', 'single_check' );
ta_update_postmeta( $post_id, 'ta_post_twittercards_title', 'strip_html' );
ta_update_postmeta( $post_id, 'ta_post_twittercards_description', 'strip_html' );
ta_update_postmeta( $post_id, 'ta_post_twittercards_image', 'url' );
//アイキャッチ画像のサイズ
ta_update_postmeta( $post_id, 'ta_post_eyecatch_size', 'as_is' );
//アイキャッチ画像の位置
ta_update_postmeta( $post_id, 'ta_post_eyecatch_position', 'as_is' );
//タイトル上のアイキャッチ画像
ta_update_postmeta( $post_id, 'ta_page_eyecatch_onoff', 'as_is' );
//フリーエリアのタイトルの表示設定
ta_update_postmeta( $post_id, 'ta_post_freearea_title_onoff', 'as_is' );
//フリーエリアのタイトル要素名設定
ta_update_postmeta( $post_id, 'ta_post_freearea_title_factor', 'as_is' );
//バナー画像・付随文の強制センタリング
ta_update_postmeta( $post_id, 'ta_post_freearea_img_centering', 'single_check' );
//バナー画像
ta_update_postmeta( $post_id, 'ta_post_freearea_img', 'url' );
//バナー画像のリンク
ta_update_postmeta( $post_id, 'ta_post_freearea_img_link', 'url' );
//バナー画像のリンク新規ウィンドウ
ta_update_postmeta( $post_id, 'ta_post_freearea_img_link_newwin_onoff', 'single_check' );
//バナー画像の指定幅（ヘッダー専用）
ta_update_postmeta( $post_id, 'ta_post_header_freearea_img_width', 'numeral' );
//バナー画像の指定幅（説明専用）
ta_update_postmeta( $post_id, 'ta_post_exp_freearea_img_width', 'numeral' );
//バナー画像の指定幅（メイン専用）
ta_update_postmeta( $post_id, 'ta_post_main_freearea_img_width', 'numeral' );
//バナー画像の指定幅（サイドバー専用）
ta_update_postmeta( $post_id, 'ta_post_sidebar_freearea_img_width', 'numeral' );
//バナー画像の指定幅（サブサイドバー専用）
ta_update_postmeta( $post_id, 'ta_post_sidebarsub_freearea_img_width', 'numeral' );
//バナー画像の指定幅（フッター専用）
ta_update_postmeta( $post_id, 'ta_post_footer_freearea_img_width', 'numeral' );
//バナー画像の指定幅（エンドロール専用）
ta_update_postmeta( $post_id, 'ta_post_endroll_freearea_img_width', 'numeral' );
//レスポンシブデザイン時のバナー画像の指定幅
ta_update_postmeta( $post_id, 'ta_post_freearea_img_width_for_rsp', 'numeral' );
//バナー画像の左側余白
ta_update_postmeta( $post_id, 'ta_post_freearea_img_leftmargin', 'numeral' );
//バナー画像の付随文
ta_update_postmeta( $post_id, 'ta_post_freearea_text', 'text' );
//バナー画像付随文のリンク
ta_update_postmeta( $post_id, 'ta_post_freearea_text_link', 'url' );
//バナー画像付随文のリンク新規ウィンドウ
ta_update_postmeta( $post_id, 'ta_post_freearea_text_link_newwin_onoff', 'single_check' );
//バナー画像付随文の左側余白
ta_update_postmeta( $post_id, 'ta_post_freearea_text_leftmargin', 'numeral' );
//バナー画像付随文の位置
ta_update_postmeta( $post_id, 'ta_post_freearea_text_position', 'as_is' );
//付随文サイズ
ta_update_postmeta( $post_id, 'ta_post_freearea_text_fontsize', 'numeral' );
//付随文の太さ
ta_update_postmeta( $post_id, 'ta_post_freearea_text_fontweight', 'as_is' );
//付随文の色
ta_update_postmeta( $post_id, 'ta_post_freearea_text_fontcolor_select', 'as_is' );
ta_update_postmeta( $post_id, 'ta_post_freearea_text_fontcolor', 'as_is' );
//付随文のHOVER色
ta_update_postmeta( $post_id, 'ta_post_freearea_text_fontcolorhover_select', 'as_is' );
ta_update_postmeta( $post_id, 'ta_post_freearea_text_fontcolorhover', 'as_is' );
//付随文の下線
ta_update_postmeta( $post_id, 'ta_post_freearea_text_underline_onoff', 'single_check' );
//付随文の上余白
ta_update_postmeta( $post_id, 'ta_post_freearea_text_tpadding', 'numeral' );
//付随文の下余白
ta_update_postmeta( $post_id, 'ta_post_freearea_text_bpadding', 'numeral' );
//メニュー番号
ta_update_postmeta( $post_id, 'ta_post_freearea_menu_num', 'as_is' );
//バナー画像・付随文エリア境界線
if ( TA_HIEND_PI ) { ta_thm001highend_post_freearea_imgtext_border( $post_id ); }
//バナー画像・付随文エリア幅
ta_update_postmeta( $post_id, 'ta_post_freearea_imgtext_width', 'numeral' );
//レスポンシブデザイン時のバナー画像・付随文エリア幅
ta_update_postmeta( $post_id, 'ta_post_freearea_imgtext_width_for_rsp', 'numeral' );
//サイトマップ掲載
ta_update_postmeta( $post_id, 'ta_post_sitemap_disp_onoff', 'single_check' );
//インデックス・フォロー処理
ta_update_postmeta( $post_id, 'ta_post_indexfollow', 'as_is' );
//フリースペース非表示ページ選択
if ( TA_HIEND_PI ) { ta_thm001highend_post_freearea_no_display( $post_id ); }
//レスポンシブ表示
ta_update_postmeta( $post_id, 'ta_post_freearea_responsible_disp_onoff', 'single_check' );
//PC表示
ta_update_postmeta( $post_id, 'ta_post_freearea_normal_disp_onoff', 'single_check' );
//閲覧制限設定
if ( TA_HIEND_PI ) { ta_thm001highend_post_view_limit( $post_id ); }
//ヘッダー画像設定
if ( TA_HIEND_PI ) { ta_thm001highend_page_header_img( $post_id ); }
