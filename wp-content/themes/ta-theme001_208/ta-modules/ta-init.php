<?php
/*****************************************************************************************************/
/*
/* テックエイドの成長する自作ホームページWordPressテーマ『 TAテーマ001 (ta-theme001) 』
/*
/* ta-init.php: ( Latest Version 2.08 2017.04.11 )
/*
/* このプログラムの著作権、使用権、その他全ての権利はde集まれ株式会社に属します。
/* The copyright, royalty and all the other rights of this program belong to deatsumare Corporation.
/*
/* File Version 履歴
/* File Version 2.00 2016.03.07: first edition by Kotaro Kashiwamura.
/* File Version 2.01 2016.03.30: フリーPHP削除、ヘッドラインに文字下線追加
/*                               SNSボタンオンオフ機能追加、viewport系の修正
/*                               ダイジェストデザインコンテンツグループ表示追加
/*                               ダイジェストデザイン記事境界線内の背景色追加
/*                               コンテンツ枠境界線内の背景色追加 by Kotaro Kashiwamura.
/* File Version 2.02 2016.05.14: ta_common_style_last_onoff削除
/*                               テーマ内蔵画像の初期値を'built_in'に変更
/*                               ta_responsible_sidebar_top_margin 25を0に変更 by Kotaro Kashiwamura.
/* File Version 2.03 2016.06.20: ヘッドラインのタイトル前方装飾画像位置調整追加
/*                               レスポンシブデザイン専用ヘッドラインの追加
/*                               メインとサイドバーに装飾1～4の追加
/*                               ロゴエリア・連絡先エリアのコンテンツ表示方法追加
/*                               ProとHighendの統合 by Kotaro Kashiwamura.
/* File Version 2.04 2016.06.30: レスポンシブデザイン専用装飾1～4のバグ修正
/*                               コンテンツ枠境界の丸み追加
/*                               TA汎用背景装飾追加 by Kotaro Kashiwamura.
/* File Version 2.05 2016.08.29: 共通パラグラフ設定に高さと左右マージン追加
/*                               SEOツールの出力オンオフ追加、ta_post_freearea_normal_disp_onoff追加
/*                               パラグラフ設定追加、汎用背景装飾初期値変更,
/*                               ta_headline_initに境界線種類追加、h1表記修正
/*                               共通フォントにhover下線表示追加、各標準フォントにhover表示追加
/*                               パンくずナビのメインコンテンツへの移動等の修正
/*                               トップキャッチテキスト装飾追加、ダイジェストの抜粋文字装飾追加、
/*                               固定ページヘッダー画像追加 by Kotaro Kashiwamura.
/* File Version 2.06 2016.09.26: SEO設定の集中管理画面追加 by Kotaro Kashiwamura.
/* File Version 2.07 2017.03.11: サイドバーメニュー追加、メイン・（サブ）サイドバー区切り線追加
/*                               サイドバーh5初期値変更、defaultデザイン変更
/*                               背景色グラデーション、背景バー追加、サイトマップ修正
/*                               色選択修正、JavaScriptライブラリ読み込みの非同期化削除、
/*                               ta_initdata_sel()追加、再帰防止ta_other_data()追加 by Kotaro Kashiwamura.
/* File Version 2.08 2017.04.11: TA_DVLP_PIが有効時にコメントとメンテナンス初期値を有効、
/*                               ta_common_body_wrap_marginbottom_select追加 by Kotaro Kashiwamura.
/*
/*****************************************************************************************************/
if ( TA_HIEND_PI ) { require_once( TA_HIEND_PI_DIR . '/general-modules/ta-theme001-highend-init.php' ); }

function ta_init( $key_name ) {
//共通設定メニュー
  //フレーム
    //デモ画像
    if ( "ta_theme_demo" == $key_name ) { return 'valid'; }
    //フレームタイプ
    if ( "ta_common_frame_type" == $key_name ) { return 'main_sidebar'; }
    //フレームサイズ
    if ( "ta_common_frame_width" == $key_name ) { return 950; }
    if ( "ta_common_wrap_add_width" == $key_name ) { return 30; }
    if ( "ta_common_sidebar_width" == $key_name ) { return 24; }
    if ( "ta_common_sidebarsub_width" == $key_name ) { return 24; }
    if ( "ta_common_mainright_margin" == $key_name ) { return 4; }
    if ( "ta_common_mainleft_margin" == $key_name ) { return 4; }
    if ( "ta_common_frame_size_check_onoff" == $key_name ) { return 'invalid'; }
    //サイドバー・サブサイドバーの位置（フレーム外への移動）
    if ( TA_HIEND_PI ) {
      $value = ta_thm001highend_fullwidth_init( $key_name );
      if ( 'ta_no_fit' != $value ) { return $value; }
    }
    //コンテンツフレーム位置
    if ( "ta_common_container_paddingtop" == $key_name ) { return ta_initdata_sel( 40, 30 ); }
    if ( "ta_common_body_wrap_marginbottom_select" == $key_name ) { return 'all'; }
    if ( "ta_common_body_wrap_marginbottom" == $key_name ) { return ta_initdata_sel( 100, 50 ); }
    //閲覧制限共通設定
    if ( "ta_common_page_view_limit_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_common_page_view_limit" == $key_name ) { return "none"; }
    if ( "ta_common_page_view_limit_link" == $key_name ) { return "no_link"; }
    if ( "ta_common_page_view_limit_txt" == $key_name ) { return "このページをご覧になるには閲覧権限が必要です。"; }
    if ( "ta_common_cat_view_limit_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_common_cat_view_limit" == $key_name ) { return "none"; }
    if ( "ta_common_cat_view_limit_link" == $key_name ) { return "no_link"; }
    if ( "ta_common_cat_view_limit_txt" == $key_name ) { return "このページをご覧になるには閲覧権限が必要です。"; }
    if ( "ta_common_yearmonth_view_limit_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_common_yearmonth_view_limit" == $key_name ) { return "none"; }
    if ( "ta_common_yearmonth_view_limit_link" == $key_name ) { return "no_link"; }
    if ( "ta_common_yearmonth_view_limit_txt" == $key_name ) { return "このページをご覧になるには閲覧権限が必要です。"; }
    if ( "ta_common_search_view_limit_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_common_search_view_limit" == $key_name ) { return "none"; }
    if ( "ta_common_search_view_limit_link" == $key_name ) { return "no_link"; }
    if ( "ta_common_search_view_limit_txt" == $key_name ) { return "このページをご覧になるには閲覧権限が必要です。"; }
  //カラー・背景・フォント
    //サイトイメージカラー
    if ( "ta_common_site_bg_color" == $key_name ) { return 'transparent'; }
    if ( "ta_common_site_hl_color" == $key_name ) { return ta_initdata_sel( '#934900', '#dd3333' ); }
    if ( "ta_common_site_text_on_bg_color" == $key_name ) { return '#3f1f00'; }
    if ( "ta_common_site_text_on_hl_color" == $key_name ) { return '#ffffff'; }
    //基本背景
    //トップページのフレーム外背景色・背景画像
    if ( "ta_common_top_outframe_color_select" == $key_name ) { return 'common_site_bg'; }
    if ( "ta_common_top_outframe_color" == $key_name ) { return '#fffff5'; }
    $value = ta_gradient_color_init( $key_name, 'ta_common_top_outframe_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    if ( "ta_common_top_outframe_pic" == $key_name ) { return ta_initdata_sel( 'built_in', 'no_image' ); }
    if ( "ta_common_top_outframe_pic_rule" == $key_name ) { return "top_x"; }
    if ( "ta_common_top_outframe_pic_margin" == $key_name ) { return 0; }
    if ( "ta_common_top_outframe_pic2" == $key_name ) { return "no_image"; }
    if ( "ta_common_top_outframe_pic2_rule" == $key_name ) { return "bottom_x"; }
    if ( "ta_common_top_outframe_pic2_margin" == $key_name ) { return 0; }
    $value = ta_bg_bar_init( $key_name, 'ta_common_top_outframe', 'top' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_bg_bar_init( $key_name, 'ta_common_top_outframe', 'bottom' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_bg_bar_init( $key_name, 'ta_common_top_outframe', 'gmenu' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_bg_bar_init( $key_name, 'ta_common_top_outframe', 'free' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    //トップページ以外のフレーム外背景色・背景画像
    if ( "ta_common_outframe_color_select" == $key_name ) { return 'common_site_bg'; }
    if ( "ta_common_outframe_color" == $key_name ) { return '#fffff5'; }
    $value = ta_gradient_color_init( $key_name, 'ta_common_outframe_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    if ( "ta_common_outframe_pic" == $key_name ) { return ta_initdata_sel( 'built_in', 'no_image' ); }
    if ( "ta_common_outframe_pic_rule" == $key_name ) { return "top_x"; }
    if ( "ta_common_outframe_pic_margin" == $key_name ) { return 0; }
    if ( "ta_common_outframe_pic2" == $key_name ) { return "no_image"; }
    if ( "ta_common_outframe_pic2_rule" == $key_name ) { return "bottom_x"; }
    if ( "ta_common_outframe_pic2_margin" == $key_name ) { return 0; }
    $value = ta_bg_bar_init( $key_name, 'ta_common_outframe', 'top' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_bg_bar_init( $key_name, 'ta_common_outframe', 'bottom' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_bg_bar_init( $key_name, 'ta_common_outframe', 'gmenu' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_bg_bar_init( $key_name, 'ta_common_outframe', 'free' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    //フォント
    if ( "ta_common_font_family" == $key_name ) { return "none"; }
    if ( "ta_common_font_size" == $key_name ) { return 100; }
    if ( "ta_common_font_color_select" == $key_name ) { return 'common_site_text_on_bg'; }
    if ( "ta_common_font_color" == $key_name ) { return '#3f1f00'; }
    if ( "ta_common_font_anchor_color" == $key_name ) { return '#3a7fcf'; }
    if ( "ta_common_font_anchor_under" == $key_name ) { return 'valid'; }
    if ( "ta_common_font_anchor_colorhover" == $key_name ) { return '#66a5ed'; }
    if ( "ta_common_font_anchor_underhover" == $key_name ) { return 'valid'; }
    //その他共通デザイン
    if ( "ta_common_font_p_lineheight" == $key_name ) { return 1.3; }
    if ( "ta_common_font_p_topmargin" == $key_name ) { return 0.5; }
    if ( "ta_common_font_p_bottommargin" == $key_name ) { return 1.2; }
    if ( "ta_common_font_p_leftmargin" == $key_name ) { return 0; }
    if ( "ta_common_font_p_rightmargin" == $key_name ) { return 0; }
    if ( "ta_common_font_aimg_opacity" == $key_name ) { return 1.0; }
    if ( "ta_common_font_aimg_opacityhover" == $key_name ) { return 0.8; }
  //SEO・SMO
    //SEO
    if ( "ta_common_seo_title_onoff" == $key_name ) { return "valid"; }
    if ( "ta_common_seo_keywords_onoff" == $key_name ) { return "valid"; }
    if ( "ta_common_seo_description_onoff" == $key_name ) { return "valid"; }
    if ( "ta_common_seo_common_keywords" == $key_name ) { return ""; }
    if ( "ta_common_seo_common_description" == $key_name ) { return get_bloginfo('description'); }
    if ( "ta_common_seo_common_h1_content" == $key_name ) { return get_bloginfo('description'); }
    if ( "ta_common_seo_site_title_format" == $key_name ) { return "normal"; }
    if ( "ta_common_seo_cat_keywordonoff" == $key_name ) { return "invalid"; }
    if ( "ta_common_seo_tag_keywordonoff" == $key_name ) { return "invalid"; }
    if ( "ta_common_seo_description_excerptonoff" == $key_name ) { return "valid"; }
    if ( "ta_common_seo_h1_commononoff" == $key_name ) { return "invalid"; }
    if ( "ta_common_seo_h1_after_content_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_common_seo_h1_after_content" == $key_name ) { return ""; }
    if ( "ta_common_seo_canonicalonoff" == $key_name ) { return "valid"; }
    //SMO
    //SNSボタン
    if ( "ta_common_smo_sns_button_onoff" == $key_name ) { return "valid"; }
    if ( "ta_common_smo_header_display_sns" == $key_name ) { return array( "twitter", "facebook", "line"); }
    if ( "ta_common_smo_main_display_sns" == $key_name ) { return array( "twitter", "facebook", "line", "hatebu", "gplus" ); }
    if ( "ta_common_smo_page_common_sns_position" == $key_name ) { return "bottom"; }
    if ( "ta_common_smo_post_common_sns_position" == $key_name ) { return "bottom"; }
    if ( "ta_common_smo_listpage_sns_position" == $key_name ) { return "bottom"; }
    if ( "ta_common_smo_top_sns_top_toppadding" == $key_name ) { return 10; }
    if ( "ta_common_smo_top_sns_top_bottompadding" == $key_name ) { return 10; }
    if ( "ta_common_smo_top_sns_bottom_toppadding" == $key_name ) { return 70; }
    if ( "ta_common_smo_top_sns_bottom_bottompadding" == $key_name ) { return 10; }
    if ( "ta_common_smo_page_sns_top_toppadding" == $key_name ) { return 10; }
    if ( "ta_common_smo_page_sns_top_bottompadding" == $key_name ) { return 10; }
    if ( "ta_common_smo_page_sns_bottom_toppadding" == $key_name ) { return 70; }
    if ( "ta_common_smo_page_sns_bottom_bottompadding" == $key_name ) { return 10; }
    if ( "ta_common_smo_post_sns_top_toppadding" == $key_name ) { return 10; }
    if ( "ta_common_smo_post_sns_top_bottompadding" == $key_name ) { return 10; }
    if ( "ta_common_smo_post_sns_bottom_toppadding" == $key_name ) { return 70; }
    if ( "ta_common_smo_post_sns_bottom_bottompadding" == $key_name ) { return 10; }
    if ( "ta_common_smo_listpage_sns_top_toppadding" == $key_name ) { return 10; }
    if ( "ta_common_smo_listpage_sns_top_bottompadding" == $key_name ) { return 10; }
    if ( "ta_common_smo_listpage_sns_bottom_toppadding" == $key_name ) { return 70; }
    if ( "ta_common_smo_listpage_sns_bottom_bottompadding" == $key_name ) { return 10; }
    //OGP
    if ( "ta_common_smo_ogp_common_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_common_smo_ogp_admins" == $key_name ) { return "no_disp"; }
    if ( "ta_common_smo_ogp_appid" == $key_name ) { return "no_disp"; }
    if ( "ta_common_smo_ogp_common_image" == $key_name ) { return "no_image"; }
    if ( "ta_common_smo_ogp_def_img" == $key_name ) { return "eyecatch"; }
    //Twitter Cards
    if ( "ta_common_smo_twittercards_common_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_common_smo_twittercards_account" == $key_name ) { return ""; }
    if ( "ta_common_smo_twittercards_common_image" == $key_name ) { return "no_image"; }
    if ( "ta_common_smo_twittercards_def_img" == $key_name ) { return "eyecatch"; }
  //サイトマップ
    if ( "ta_common_sitemap_onoff" == $key_name ) { return "valid"; }
    if ( "ta_common_sitemap_disp_contents" == $key_name ) { return "page_cat"; }
    if ( "ta_common_sitemap_link_newwin_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_common_sitemap_page_title" == $key_name ) { return "固定ページ"; }
    if ( "ta_common_sitemap_cat_title" == $key_name ) { return "記事カテゴリー"; }
    if ( "ta_common_sitemap_disp_depth_num" == $key_name ) { return 3; }
    if ( "ta_common_sitemap_cat_postnum_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_common_sitemap_cat_parent_postnum_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_common_sitemap_cat_num_limit" == $key_name ) { return 0; }
    if ( "ta_common_sitemap_cat_disp_nopost_onoff" == $key_name ) { return 'valid'; }
    if ( "ta_common_sitemap_page_slug" == $key_name ) { return 'ta_sitemap'; }
    //デザイン設定
    if ( "ta_common_sitemap_title_factor" == $key_name ) { return 'h4'; }
    if ( "ta_common_sitemap_parent_size" == $key_name ) { return '100'; }
    if ( "ta_common_sitemap_parent_weight" == $key_name ) { return 'normal'; }
    if ( "ta_common_sitemap_parent_color_select" == $key_name ) { return 'common_site_text_on_bg'; }
    if ( "ta_common_sitemap_parent_color" == $key_name ) { return ta_other_data( 'ta_common_font_color', '#3f1f00' ); }
    if ( "ta_common_sitemap_parent_anchor_color_select" == $key_name ) { return 'selectable'; }
    if ( "ta_common_sitemap_parent_anchor_color" == $key_name ) { return ta_other_data( 'ta_common_font_anchor_color', '#3a7fcf' ); }
    if ( "ta_common_sitemap_parent_anchor_colorhover_select" == $key_name ) { return 'selectable'; }
    if ( "ta_common_sitemap_parent_anchor_colorhover" == $key_name ) { return ta_other_data( 'ta_common_font_anchor_colorhover', '#66a5ed' ); }
    if ( "ta_common_sitemap_parent_anchor_underonoff" == $key_name ) { return 'invalid'; }
    if ( "ta_common_sitemap_parent_anchor_hoverunderonoff" == $key_name ) { return 'invalid'; }
    if ( "ta_common_sitemap_parent_paddingtop" == $key_name ) { return '10'; }
    if ( "ta_common_sitemap_parent_paddingleft" == $key_name ) { return '10'; }
    if ( "ta_common_sitemap_parent_listmarker" == $key_name ) { return 'none'; }
    if ( "ta_common_sitemap_children_size" == $key_name ) { return '90'; }
    if ( "ta_common_sitemap_children_weight" == $key_name ) { return 'normal'; }
    if ( "ta_common_sitemap_children_color_select" == $key_name ) { return 'common_site_text_on_bg'; }
    if ( "ta_common_sitemap_children_color" == $key_name ) { return ta_other_data( 'ta_common_font_color', '#3f1f00' ); }
    if ( "ta_common_sitemap_children_anchor_color_select" == $key_name ) { return 'selectable'; }
    if ( "ta_common_sitemap_children_anchor_color" == $key_name ) { return ta_other_data( 'ta_common_font_anchor_color', '#3a7fcf' ); }
    if ( "ta_common_sitemap_children_anchor_colorhover_select" == $key_name ) { return 'selectable'; }
    if ( "ta_common_sitemap_children_anchor_colorhover" == $key_name ) { return ta_other_data( 'ta_common_font_anchor_colorhover', '#66a5ed' ); }
    if ( "ta_common_sitemap_children_anchor_underonoff" == $key_name ) { return 'invalid'; }
    if ( "ta_common_sitemap_children_anchor_hoverunderonoff" == $key_name ) { return 'invalid'; }
    if ( "ta_common_sitemap_children_paddingtop" == $key_name ) { return '10'; }
    if ( "ta_common_sitemap_children_paddingleft" == $key_name ) { return '30'; }
    if ( "ta_common_sitemap_children_listmarker" == $key_name ) { return 'circle'; }
  //フリーCSS・JS
    //フリーCSS
    if ( "ta_common_freecss_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_common_freecss_code" == $key_name ) { return "/* ここにCSSコードを記入してください */"; }
    //フリーJavaScript
    if ( TA_HIEND_PI ) {
      $value = ta_thm001highend_freejs_init( $key_name );
      if ( 'ta_no_fit' != $value ) { return $value; }
    }
  //固定ページ・投稿記事・一覧
    //固定ページ共通設定
    if ( "ta_common_page_h1_disp" == $key_name ) { return "page_h1_common_add"; }
    $value = ta_parts_select_init( $key_name, "ta_common_page_custom", "invalid", "invalid", "invalid", "invalid", "invalid", "invalid", "invalid" );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_top_margin_init( $key_name, 'ta_common_page' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    if ( "ta_common_page_eyecatch_onoff" == $key_name ) { return "invalid"; }
    //投稿記事共通設定
    if ( "ta_common_post_h1_disp" == $key_name ) { return "post_h1_common_add"; }
    $value = ta_parts_select_init( $key_name, "ta_common_post_custom", "invalid", "invalid", "invalid", "invalid", "invalid", "invalid", "invalid" );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_top_margin_init( $key_name, 'ta_common_post' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    if ( "ta_common_post_eyecatch_size" == $key_name ) { return "large"; }
    if ( "ta_common_post_eyecatch_position" == $key_name ) { return "center"; }
    if ( "ta_common_post_title_timecat" == $key_name ) { return "lower"; }
    if ( "ta_common_post_timecat" == $key_name ) { return "cat-time"; }
    if ( "ta_common_post_time_onoff" == $key_name ) { return "valid"; }
    if ( "ta_common_post_cat_onoff" == $key_name ) { return "valid"; }
    if ( "ta_common_post_time_color_select" == $key_name ) { return "selectable"; }
    if ( "ta_common_post_time_color" == $key_name ) { return "#aaaaaa"; }
    if ( "ta_common_post_time_size" == $key_name ) { return 90; }
    if ( "ta_common_post_time_weight" == $key_name ) { return "normal"; }
    if ( "ta_common_post_watchmark_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_common_post_cat_size" == $key_name ) { return 90; }
    if ( "ta_common_post_cat_weight" == $key_name ) { return "bold"; }
    if ( "ta_common_post_cat_height" == $key_name ) { return 2; }
    if ( "ta_common_post_cat_width" == $key_name ) { return 6; }
    if ( "ta_common_post_cat_round" == $key_name ) { return 0; }
    //一覧（アーカイブ）
    if ( "ta_common_listpage_h1_disp" == $key_name ) { return "listpage_h1_common_add"; }
    $value = ta_parts_select_init( $key_name, "ta_common_listpage", "invalid", "invalid", "invalid", "invalid", "invalid", "invalid", "invalid" );
    if ( 'ta_no_fit' != $value ) { return $value; }
    if ( "ta_common_listpage_indexfollow" == $key_name ) { return "none"; }
    if ( "ta_common_listpage_pager_type" == $key_name ) { return "numdisp"; }
    $value = ta_top_margin_init( $key_name, 'ta_common_listpage' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    if ( "ta_common_listpage_full_content_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_common_listpage_post_distance" == $key_name ) { return 10; }
    if ( "ta_common_listpage_row_num" == $key_name ) { return 1; }
    if ( "ta_common_listpage_row_distance" == $key_name ) { return 10; }
    if ( "ta_common_listpage_post_border_type" == $key_name ) { return "b"; }
    if ( "ta_common_listpage_post_border_size" == $key_name ) { return 1; }
    if ( "ta_common_listpage_post_border_color_select" == $key_name ) { return "selectable"; }
    if ( "ta_common_listpage_post_border_color" == $key_name ) { return "#aaaaaa"; }
    if ( "ta_common_listpage_post_border_bgcolor_select" == $key_name ) { return "selectable"; }
    if ( "ta_common_listpage_post_border_bgcolor" == $key_name ) { return "transparent"; }
    if ( "ta_common_listpage_post_border_kind" == $key_name ) { return "solid"; }
    if ( "ta_common_listpage_post_border_padding" == $key_name ) { return 10; }
    $value = ta_article_digest_design_init(
      $key_name,
      'common_listpage',            //$place_and_role
      'invalid',                    //$newwin_onoff
      'title',                      //$ind
      'none',                       //$cg_top
      'timecat',                    //$cg_bottom
      'h4',                         //$post_title_factor
      'time-cat',                   //$timecat
      'valid',                      //$time_onoff
      'valid',                      //$cat_onoff
      'selectable',                 //$time_color_select
      '#aaaaaa',                    //$time_color
      90,                           //$time_size
      'normal',                     //$time_weight
      90,                           //$cat_size
      'bold',                       //$cat_weight
      2,                            //$cat_height
      6,                            //$cat_width
      '0',                          //$cat_round
      'invalid',                    //$watchmark_onoff
      'valid',                      //$cgp_onoff
      'left',                       //$img_pos
      6,                            //$img_padding
      'ta_square_image120',         //$img_size
      50,                           //$excerpt
      90,                           //$excerpt_minheight
      '0',                          //$excerpt_tpadding
      1.2,                          //$excerpt_bpadding
      'invalid',                    //$excerpt_onlyfor_onoff
      100,                          //$excerpt_size
      'normal',                     //$excerpt_weight
      1.3,                          //$excerpt_lineheight
      'selectable',                 //$excerpt_anchor_color_select
      '#3a7fcf',                    //$excerpt_anchor_color
      'valid',                      //$excerpt_anchor_under
      'selectable',                 //$excerpt_anchor_colorhover_select
      '#66a5ed',                    //$excerpt_anchor_colorhover
      'valid',                      //$excerpt_anchor_underhover
      'f345',                       //$rightmark
      'selectable',                 //$rightmark_color_select
      '#aaaaaa',                    //$rightmark_color
      150,                          //$rightmark_size
      'bold',                       //$rightmark_weight
      10,                           //$rightmark_width
      0.6,                          //$rightmark_opacity
      1.0,                          //$rightmark_opacityhover
      'none',                       //$lowermark
      '&raquo; この記事を読む',     //$lowermark_title
      'invalid',                    //$lowermark_title_underline_onoff
      'invalid',                    //$lowermark_title_hoverunderline_onoff
      60,                           //$lowermark_title_size
      'normal',                     //$lowermark_title_weight
      'selectable',                 //$lowermark_title_color_select
      '#666666',                    //$lowermark_title_color
      'selectable',                 //$lowermark_title_colorhover_select
      '#666666',                    //$lowermark_title_colorhover
      'selectable',                 //$lowermark_bgcolor_select
      '#efefef',                    //$lowermark_bgcolor
      'selectable',                 //$lowermark_bgcolorhover_select
      '#e5e5e5',                    //$lowermark_bgcolorhover
      2,                            //$lowermark_height
      10,                           //$lowermark_minwidth
      '0',                          //$lowermark_round
      10,                           //$lowermark_paddingtop
      'valid',                      //$mark_onoff
      7,                            //$mark_days
      'no_image',                   //$mark_pic
      'NEW',                        //$mark_text
      'selectable',                 //$mark_text_color_select
      '#ffffff',                    //$mark_text_color
      'normal',                     //$mark_text_weight
      'selectable',                 //$mark_text_bgcolor_select
      '#ff4500',                    //$mark_text_bgcolor
      2,                            //$mark_text_round
      '0'                           //$mark_padding
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
  //その他
    //コメント機能
    if ( "ta_common_comment_func_onoff" == $key_name ) { if ( TA_DVLP_PI ) { return "valid"; } else { return "invalid"; } }
    if ( "ta_common_comment_disp_title_factor" == $key_name ) { return "h3"; }
    if ( "ta_common_comment_disp_title" == $key_name ) { return "『%name%』に%num%件のコメント"; }
    if ( "ta_common_comment_disp_avatar_size" == $key_name ) { return 40; }
    if ( "ta_common_comment_write_title_factor" == $key_name ) { return "h3"; }
    if ( "ta_common_comment_write_title" == $key_name ) { return "コメントを残す"; }
    //モバイル端末のランドスケープ表示
    if ( "ta_common_landscape_no_as_onoff" == $key_name ) { return "invalid"; }
    //エラー４０４表示
    if ( "ta_common_error404_title" == $key_name ) { return "お探しのページは見つかりませんでした。"; }
    if ( "ta_common_error404_freetext" == $key_name ) { return "このページは、掲載終了・アドレス変更されたか、一時的にご利用できない可能性がございます。入力に間違いがないか再度ご確認ください。"; }
    //メンテナンスモード
    if ( "ta_common_mainte_mode_onoff" == $key_name ) { if ( TA_DVLP_PI ) { return "valid"; } else { return "invalid"; } }
    if ( "ta_common_mainte_work_person" == $key_name ) { return "edit_themes"; }
    if ( "ta_common_mainte_title" == $key_name ) { return get_bloginfo('name'); }
    if ( "ta_common_mainte_subtitle" == $key_name ) { return "メンテナンス中です"; }
    if ( "ta_common_mainte_content" == $key_name ) { return '<div style="font-size:90%;text-align:center;">申し訳ありませんが、暫くしてから再度アクセスをお願いします。</div>'; }
    if ( "ta_common_mainte_copyright" == $key_name ) { return ta_other_data( 'ta_footer_copyright_title', "Copyright &copy; ". get_bloginfo('name') . " All rights reserved." ); }
    if ( "ta_common_mainte_mode_color_select" == $key_name ) { return 'selectable'; }
    if ( "ta_common_mainte_mode_color" == $key_name ) { return ta_other_data( 'ta_common_site_bg_color', 'transparent' ); }
    if ( "ta_common_mainte_font_color_select" == $key_name ) { return 'selectable'; }
    if ( "ta_common_mainte_font_color" == $key_name ) { return ta_other_data( 'ta_common_site_text_on_bg_color', '#3f1f00' ); }
    if ( "ta_common_mainte_font_anchor_color_select" == $key_name ) { return 'selectable'; }
    if ( "ta_common_mainte_font_anchor_color" == $key_name ) { return ta_other_data( 'ta_common_font_anchor_color', '#3a7fcf' ); }
    if ( "ta_common_mainte_font_anchor_under" == $key_name ) { return ta_other_data( 'ta_common_font_anchor_under', 'valid' ); }
    if ( "ta_common_mainte_font_anchor_underhover" == $key_name ) { return ta_other_data( 'ta_common_font_anchor_underhover', 'valid' ); }
    if ( "ta_common_mainte_font_anchor_colorhover_select" == $key_name ) { return 'selectable'; }
    if ( "ta_common_mainte_font_anchor_colorhover" == $key_name ) { return ta_other_data( 'ta_common_font_anchor_colorhover', '#66a5ed' ); }
    if ( "ta_common_mainte_login_onoff" == $key_name ) { return "valid"; }
    //管理画面アクセス制限
    if ( "ta_common_adminpage_limit" == $key_name ) { return "read"; }
    if ( "ta_common_adminpage_limit_bar_onoff" == $key_name ) { return "invalid"; }
    //JavaScript未使用（未設定）ブラウザへの注意文表示
    if ( "ta_common_js_warning_onoff" == $key_name ) { return "valid"; }
//便利ツールメニュー
  //フレーム
    //CSSファイル生成
    if ( "ta_theme_no_cssfile" == $key_name ) { return 'invalid'; }
    //wpautop関数
    if ( "ta_common_wpautop_page" == $key_name ) { return 'invalid'; }
    if ( "ta_common_wpautop_post" == $key_name ) { return 'invalid'; }
    if ( "ta_common_wpautop_ta_header_fa" == $key_name ) { return 'invalid'; }
    if ( "ta_common_wpautop_ta_exp_fa" == $key_name ) { return 'invalid'; }
    if ( "ta_common_wpautop_ta_main_fa" == $key_name ) { return 'invalid'; }
    if ( "ta_common_wpautop_ta_sidebar_fa" == $key_name ) { return 'invalid'; }
    if ( "ta_common_wpautop_ta_sidebarsub_fa" == $key_name ) { return 'invalid'; }
    if ( "ta_common_wpautop_ta_footer_fa" == $key_name ) { return 'invalid'; }
    if ( "ta_common_wpautop_ta_endroll_fa" == $key_name ) { return 'invalid'; }
    //ページスロー表示
    if ( TA_HIEND_PI ) {
      $value = ta_thm001highend_slowshow_init( $key_name );
      if ( 'ta_no_fit' != $value ) { return $value; }
    }
    //制御用コード挿入
    if ( TA_HIEND_PI ) {
      $value = ta_thm001highend_insert_dscrptn_init( $key_name );
      if ( 'ta_no_fit' != $value ) { return $value; }
    }
  //装飾・小物
    //ページャー（ページ番号表記タイプ）
    if ( "ta_common_pager1_text_color_select" == $key_name ) { return 'common_site_text_on_bg'; }
    if ( "ta_common_pager1_text_color" == $key_name ) { return ta_other_data( 'ta_common_font_color', '#3f1f00' ); }
    if ( "ta_common_pager1_margintop" == $key_name ) { return 30; }
    if ( "ta_common_pager1_text_size" == $key_name ) { return 100; }
    if ( "ta_common_pager1_text_weight" == $key_name ) { return "normal"; }
    if ( "ta_common_pager1_text_colorhover_select" == $key_name ) { return 'common_site_text_on_bg'; }
    if ( "ta_common_pager1_text_colorhover" == $key_name ) { return ta_other_data( 'ta_common_font_color', '#3f1f00' ); }
    if ( "ta_common_pager1_text_bgcolor_select" == $key_name ) { return "selectable"; }
    if ( "ta_common_pager1_text_bgcolor" == $key_name ) { return "transparent"; }
    if ( "ta_common_pager1_text_bgcolorhover_select" == $key_name ) { return "selectable"; }
    if ( "ta_common_pager1_text_bgcolorhover" == $key_name ) { return "#e8e8e3"; }
    if ( "ta_common_pager1_text_paddingtb" == $key_name ) { return 5; }
    if ( "ta_common_pager1_text_paddinglr" == $key_name ) { return 10; }
    if ( "ta_common_pager1_frame_size" == $key_name ) { return 1; }
    if ( "ta_common_pager1_frame_color_select" == $key_name ) { return "selectable"; }
    if ( "ta_common_pager1_frame_color" == $key_name ) { return "#cccccc"; }
    if ( "ta_common_pager1_frame_colorhover_select" == $key_name ) { return "selectable"; }
    if ( "ta_common_pager1_frame_colorhover" == $key_name ) { return "#cccccc"; }
    if ( "ta_common_pager1_selected_text_color_select" == $key_name ) { return 'common_site_text_on_bg'; }
    if ( "ta_common_pager1_selected_text_color" == $key_name ) { return ta_other_data( 'ta_common_font_color', '#3f1f00' ); }
    if ( "ta_common_pager1_selected_text_bgcolor_select" == $key_name ) { return "selectable"; }
    if ( "ta_common_pager1_selected_text_bgcolor" == $key_name ) { return "transparent"; }
    if ( "ta_common_pager1_selected_frame_color_select" == $key_name ) { return 'common_site_text_on_bg'; }
    if ( "ta_common_pager1_selected_frame_color" == $key_name ) { return ta_other_data( 'ta_common_font_color', '#3f1f00' ); }
    if ( "ta_common_pager1_dots_color_select" == $key_name ) { return "selectable"; }
    if ( "ta_common_pager1_dots_color" == $key_name ) { return "#777777"; }
    if ( "ta_common_pager1_dots_weight" == $key_name ) { return "normal"; }
    if ( "ta_common_pager1_mid_size" == $key_name ) { return 5; }
    //ページャー（前次表記タイプ）
    if ( "ta_common_pager_prenext_pre_name" == $key_name ) { return "&laquo; 前のページ"; }
    if ( "ta_common_pager_prenext_next_name" == $key_name ) { return "次のページ &raquo;"; }
    if ( "ta_common_pager_prenext_margintop" == $key_name ) { return 30; }
    if ( "ta_common_pager_prenext_underline_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_common_pager_prenext_size" == $key_name ) { return 100; }
    if ( "ta_common_pager_prenext_weight" == $key_name ) { return "normal"; }
    if ( "ta_common_pager_prenext_color_select" == $key_name ) { return "selectable"; }
    if ( "ta_common_pager_prenext_color" == $key_name ) { return "#3f1f00"; }
    if ( "ta_common_pager_prenext_colorhover_select" == $key_name ) { return "selectable"; }
    if ( "ta_common_pager_prenext_colorhover" == $key_name ) { return "#aaaaaa"; }
    if ( "ta_common_pager_prenext_bgcolor_select" == $key_name ) { return "selectable"; }
    if ( "ta_common_pager_prenext_bgcolor" == $key_name ) { return "transparent"; }
    if ( "ta_common_pager_prenext_bgcolorhover_select" == $key_name ) { return "selectable"; }
    if ( "ta_common_pager_prenext_bgcolorhover" == $key_name ) { return "transparent"; }
    if ( "ta_common_pager_prenext_height" == $key_name ) { return 2; }
    if ( "ta_common_pager_prenext_minwidth" == $key_name ) { return 8; }
    if ( "ta_common_pager_prenext_round" == $key_name ) { return 2; }
    //ページャー（投稿の前後記事へのリンク）
    if ( "ta_common_pager2_onoff" == $key_name ) { return "valid"; }
    if ( "ta_common_pager2_text_color_select" == $key_name ) { return 'common_site_text_on_bg'; }
    if ( "ta_common_pager2_text_color" == $key_name ) { return ta_other_data( 'ta_common_font_color', '#3f1f00' ); }
    if ( "ta_common_pager2_pre_insert" == $key_name ) { return "&laquo;"; }
    if ( "ta_common_pager2_after_insert" == $key_name ) { return "&raquo;"; }
    if ( "ta_common_pager2_margintop" == $key_name ) { return 30; }
    if ( "ta_common_pager2_marginleft" == $key_name ) { return 0; }
    if ( "ta_common_pager2_marginright" == $key_name ) { return 0; }
    if ( "ta_common_pager2_text_size" == $key_name ) { return 100; }
    if ( "ta_common_pager2_text_weight" == $key_name ) { return "normal"; }
    if ( "ta_common_pager2_text_colorhover_select" == $key_name ) { return 'selectable'; }
    if ( "ta_common_pager2_text_colorhover" == $key_name ) { return '#aaaaaa'; }
    //パンくずナビ
    if ( "ta_common_bread_top_text" == $key_name ) { return "ホーム"; }
    if ( "ta_common_bread_text_between_pages" == $key_name ) { return "&gt;"; }
    if ( "ta_common_bread_tomain_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_common_bread_parent_color_select" == $key_name ) { return "selectable"; }
    if ( "ta_common_bread_parent_color" == $key_name ) { return "#3a7fcf"; }
    if ( "ta_common_bread_current_color_select" == $key_name ) { return 'common_site_text_on_bg'; }
    if ( "ta_common_bread_current_color" == $key_name ) { return ta_other_data( 'ta_common_font_color', '#3f1f00' ); }
    if ( "ta_common_bread_parent_colorhover_select" == $key_name ) { return 'selectable'; }
    if ( "ta_common_bread_parent_colorhover" == $key_name ) { return '#66a5ed'; }
    if ( "ta_common_bread_parent_underonoff" == $key_name ) { return "valid"; }
    if ( "ta_common_bread_text_size" == $key_name ) { return 90; }
    if ( "ta_common_bread_text_weight" == $key_name ) { return "normal"; }
    if ( "ta_common_bread_paddingtop" == $key_name ) { return 10; }
    if ( "ta_common_bread_paddingleft" == $key_name ) { return 20; }
    if ( "ta_common_bread_paddingbottom" == $key_name ) { return 0; }
    if ( "ta_common_bread_margin2arrow" == $key_name ) { return 10; }
    //バックトゥートップスクロール
    if ( "ta_common_back2top_disponoff" == $key_name ) { return "valid"; }
    if ( "ta_common_back2top_img" == $key_name ) { return ta_initdata_sel( 'built_in', 'no_image' ); }
    if ( "ta_common_back2top_img_height" == $key_name ) { return 49; }
    if ( "ta_common_back2top_img_opacity" == $key_name ) { return 0.6; }
    if ( "ta_common_back2top_img_opacityhover" == $key_name ) { return 1.0; }
    if ( "ta_common_back2top_text" == $key_name ) { return "ページの先頭へ"; }
    if ( "ta_common_back2top_text_size" == $key_name ) { return ta_initdata_sel( 110, 100 ); }
    if ( "ta_common_back2top_text_weight" == $key_name ) { return "bold"; }
    if ( "ta_common_back2top_text_color_select" == $key_name ) { return 'selectable'; }
    if ( "ta_common_back2top_text_color" == $key_name ) { return ta_initdata_sel( '#68b4ff', '#ffffff' ); }
    if ( "ta_common_back2top_text_under" == $key_name ) { return "invalid"; }
    if ( "ta_common_back2top_text_underhover" == $key_name ) { return "invalid"; }
    if ( "ta_common_back2top_text_bgcolor_select" == $key_name ) { return 'selectable'; }
    if ( "ta_common_back2top_text_bgcolor" == $key_name ) { return ta_initdata_sel( 'transparent', '#ff69b4' ); }
    if ( "ta_common_back2top_text_colorhover_select" == $key_name ) { return 'selectable'; }
    if ( "ta_common_back2top_text_colorhover" == $key_name ) { return ta_initdata_sel( '#aaaaaa', '#ffffff' ); }
    if ( "ta_common_back2top_text_bgcolorhover_select" == $key_name ) { return 'selectable'; }
    if ( "ta_common_back2top_text_bgcolorhover" == $key_name ) { return ta_initdata_sel( 'transparent', '#ff3299' ); }
    if ( "ta_common_back2top_text_height" == $key_name ) { return ta_initdata_sel( 0.3, 1 ); }
    if ( "ta_common_back2top_text_lr_padding" == $key_name ) { return 1; }
    if ( "ta_common_back2top_text_round" == $key_name ) { return ta_initdata_sel( 0, 10 ); }
    if ( "ta_common_back2top_text_round_upper_onoff" == $key_name ) { return ta_initdata_sel( "invalid", "valid" ); }
    if ( "ta_common_back2top_text_fixed_onoff" == $key_name ) { return "valid"; }
    if ( "ta_common_back2top_text_fixed_bottom" == $key_name ) { return ta_initdata_sel( 10, 0 ); }
    if ( "ta_common_back2top_text_fixed_right" == $key_name ) { return 10; }
    if ( "ta_common_back2top_topmargin" == $key_name ) { return 20; }
    if ( "ta_common_back2top_position" == $key_name ) { return "right"; }
    if ( "ta_common_back2top_edge_margin" == $key_name ) { return 20; }
    if ( "ta_common_back2top_fm_top_amount" == $key_name ) { return 300; }
    //ファビコン
    if ( "ta_common_favicon_disponoff" == $key_name ) { return "valid"; }
    if ( "ta_common_favicon_img" == $key_name ) { return 'built_in'; }
    //アップルタッチアイコン
    if ( "ta_common_appletouch_disponoff" == $key_name ) { return "valid"; }
    if ( "ta_common_appletouch_img" == $key_name ) { return 'built_in'; }
    //設定ソースファイル作成
    if ( "ta_common_selected_setting_source" == $key_name ) { return "none"; }
//汎用ショートコードメニュー
  //汎用ツール
    //簡易最新投稿ダイジェスト設定
    if ( "ta_common_simple_latestposts_title_onoff" == $key_name ) { return "valid"; }
    if ( "ta_common_simple_latestposts_title_factor" == $key_name ) { return "h2"; }
    if ( "ta_common_simple_latestposts_title" == $key_name ) { return "新着情報"; }
    if ( "ta_common_simple_latestposts_nodis_cats" == $key_name ) { return array(); }
    if ( "ta_common_simple_latestposts_num" == $key_name ) { return 5; }
    if ( "ta_common_simple_latestposts_padding" == $key_name ) { return 3; }
    if ( "ta_common_simple_latestposts_post_border_size" == $key_name ) { return 1; }
    if ( "ta_common_simple_latestposts_post_border_color_select" == $key_name ) { return "selectable"; }
    if ( "ta_common_simple_latestposts_post_border_color" == $key_name ) { return "#aaaaaa"; }
    if ( "ta_common_simple_latestposts_post_border_kind" == $key_name ) { return "solid"; }
    if ( "ta_common_simple_latestposts_post_title_color_select" == $key_name ) { return "selectable"; }
    if ( "ta_common_simple_latestposts_post_title_color" == $key_name ) { return "#000000"; }
    if ( "ta_common_simple_latestposts_post_title_color_hover_select" == $key_name ) { return "selectable"; }
    if ( "ta_common_simple_latestposts_post_title_color_hover" == $key_name ) { return "#aaaaaa"; }
    if ( "ta_common_simple_latestposts_post_title_underline_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_common_simple_latestposts_post_title_underlinehover_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_common_simple_latestposts_post_newwin_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_common_simple_latestposts_post_title_size" == $key_name ) { return 100; }
    if ( "ta_common_simple_latestposts_post_title_weight" == $key_name ) { return "normal"; }
    if ( "ta_common_simple_latestposts_time_color_select" == $key_name ) { return "selectable"; }
    if ( "ta_common_simple_latestposts_time_color" == $key_name ) { return "#aaaaaa"; }
    if ( "ta_common_simple_latestposts_time_weight" == $key_name ) { return "normal"; }
    if ( "ta_common_simple_latestposts_time_width" == $key_name ) { return 8.5; }
    if ( "ta_common_simple_latestposts_watchmark_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_common_simple_latestposts_release_mark_onoff" == $key_name ) { return "valid"; }
    if ( "ta_common_simple_latestposts_release_mark_days" == $key_name ) { return 7; }
    if ( "ta_common_simple_latestposts_release_mark_pic" == $key_name ) { return 'no_image'; }
    if ( "ta_common_simple_latestposts_release_mark_text" == $key_name ) { return "NEW"; }
    if ( "ta_common_simple_latestposts_release_mark_text_color_select" == $key_name ) { return "selectable"; }
    if ( "ta_common_simple_latestposts_release_mark_text_color" == $key_name ) { return "#ffffff"; }
    if ( "ta_common_simple_latestposts_release_mark_text_weight" == $key_name ) { return "normal"; }
    if ( "ta_common_simple_latestposts_release_mark_text_bgcolor_select" == $key_name ) { return "selectable"; }
    if ( "ta_common_simple_latestposts_release_mark_text_bgcolor" == $key_name ) { return "#ff4500"; }
    if ( "ta_common_simple_latestposts_release_mark_text_round" == $key_name ) { return 2; }
    if ( "ta_common_simple_latestposts_release_mark_padding" == $key_name ) { return 5; }
    //TA汎用メニュー
    if ( TA_HIEND_PI ) {
      $value = ta_thm001highend_versatile_menu_init( $key_name );
      if ( 'ta_no_fit' != $value ) { return $value; }
    }
    //画像と説明付きメニュー
    if ( TA_HIEND_PI ) {
      $value = ta_thm001highend_imgexp_menu_init( $key_name );
      if ( 'ta_no_fit' != $value ) { return $value; }
    }
    //TA汎用背景装飾
    $value = ta_genbg_init( $key_name, 1 );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_genbg_init( $key_name, 2 );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_genbg_init( $key_name, 3 );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_genbg_init( $key_name, 4 );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_genbg_init( $key_name, 5 );
    if ( 'ta_no_fit' != $value ) { return $value; }
//トップページ設定メニュー
  //フレームタイプ
    if ( "ta_top_frame_type" == $key_name ) { return "common_style"; }
    if ( "ta_top_main_width" == $key_name ) { return 72; }
    //閲覧制限共通設定
    if ( "ta_top_view_limit_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_top_view_limit" == $key_name ) { return "none"; }
    if ( "ta_top_view_limit_link" == $key_name ) { return "no_link"; }
    if ( "ta_top_view_limit_txt" == $key_name ) { return "このページをご覧になるには閲覧権限が必要です。"; }
  //トップページ説明エリア
    if ( TA_HIEND_PI ) {
      $value = ta_thm001highend_exp_freearea_init( $key_name );
      if ( 'ta_no_fit' != $value ) { return $value; }
    }
  //トップキャッチエリア
    $value = ta_top_margin_init_fixed_space( $key_name, 'ta_top_topcatch' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    if ( "ta_top_topcatch_num" == $key_name ) { return 3; }
    if ( "ta_top_topcatch_link_newwin_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_top_topcatch_frame_title_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_top_topcatch_frame_title_factor" == $key_name ) { return "h2"; }
    if ( "ta_top_topcatch_frame_title" == $key_name ) { return "キャッチエリア"; }
    if ( "ta_top_topcatch_title_factor" == $key_name ) { return "h3"; }
    if ( "ta_top_topcatch_space" == $key_name ) { return 3; }
    if ( "ta_top_topcatch_continue_text" == $key_name ) { return "続きを見る"; }
    if ( "ta_top_topcatch_text_onlyfor_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_top_topcatch_text_color_select" == $key_name ) { return "common_site_text_on_bg"; }
    if ( "ta_top_topcatch_text_color" == $key_name ) { return ta_other_data( 'ta_common_site_text_on_bg_color', '#3f1f00' ); }
    if ( "ta_top_topcatch_text_size" == $key_name ) { return 100; }
    if ( "ta_top_topcatch_text_weight" == $key_name ) { return "normal"; }
    if ( "ta_top_topcatch_text_p_lineheight" == $key_name ) { return "1.3"; }
    if ( "ta_top_topcatch_text_p_topmargin" == $key_name ) { return "0.5"; }
    if ( "ta_top_topcatch_text_p_bottommargin" == $key_name ) { return "1.2"; }
    if ( "ta_top_topcatch_text_p_leftmargin" == $key_name ) { return "0"; }
    if ( "ta_top_topcatch_text_p_rightmargin" == $key_name ) { return "0"; }
    if ( "ta_top_topcatch_continue_text_size" == $key_name ) { return 100; }
    if ( "ta_top_topcatch_continue_text_weight" == $key_name ) { return "normal"; }
    if ( "ta_top_topcatch_continue_text_anchor_color_select" == $key_name ) { return "selectable"; }
    if ( "ta_top_topcatch_continue_text_anchor_color" == $key_name ) { return "#3a7fcf"; }
    if ( "ta_top_topcatch_continue_text_anchor_under" == $key_name ) { return "valid"; }
    if ( "ta_top_topcatch_continue_text_anchor_colorhover_select" == $key_name ) { return "selectable"; }
    if ( "ta_top_topcatch_continue_text_anchor_colorhover" == $key_name ) { return "#66a5ed"; }
    if ( "ta_top_topcatch_continue_text_anchor_underhover" == $key_name ) { return "valid"; }
    if ( "ta_top_topcatch_title_onoff1" == $key_name ) { return "valid"; }
    if ( "ta_top_topcatch_title1" == $key_name ) { return "キャッチ#1"; }
    if ( "ta_top_topcatch_pic1" == $key_name ) { return 'built_in'; }
    if ( "ta_top_topcatch_text1" == $key_name ) { return "ここにキャッチ#1の説明を書きます。\r\n\r\nキャッチタイトル、画像、説明テキスト、リンク先は簡単に変更できます。\r\n\r\n画像の幅は自動的に調整されます。\r\n\r\n画像の高さもオリジナル比で自動的に調整されます。\r\n\r\n特別な固定ページへのリンクなどに使用できます。"; }
    if ( "ta_top_topcatch_link1" == $key_name ) { return "#"; }
    if ( "ta_top_topcatch_title_onoff2" == $key_name ) { return "valid"; }
    if ( "ta_top_topcatch_title2" == $key_name ) { return "キャッチ#2"; }
    if ( "ta_top_topcatch_pic2" == $key_name ) { return 'built_in'; }
    if ( "ta_top_topcatch_text2" == $key_name ) { return "ここにキャッチ#2の説明を書きます。\r\n\r\nキャッチタイトルのデザインはh2～h5の中から選択できます。\r\n\r\nキャッチは非表示または最大6個まで設定できます。\r\n\r\nキャッチ間の余白も設定可能です。\r\n\r\n投稿や別サイトへのリンクも可能です。"; }
    if ( "ta_top_topcatch_link2" == $key_name ) { return "#"; }
    if ( "ta_top_topcatch_title_onoff3" == $key_name ) { return "valid"; }
    if ( "ta_top_topcatch_title3" == $key_name ) { return "キャッチ#3"; }
    if ( "ta_top_topcatch_pic3" == $key_name ) { return 'built_in'; }
    if ( "ta_top_topcatch_text3" == $key_name ) { return "ここにキャッチ#3の説明を書きます。\r\n\r\n他のキャッチと画像の縦横比を揃えたり、文字数で高さを揃えたりすると見やすくなります。"; }
    if ( "ta_top_topcatch_link3" == $key_name ) { return "#"; }
    if ( TA_HIEND_PI ) {
      $value = ta_thm001highend_top_topcatch_init( $key_name );
      if ( 'ta_no_fit' != $value ) { return $value; }
    }
  //トップページフリーエリア
    if ( "ta_top_freearea_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_top_freearea_title_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_top_freearea_title_factor" == $key_name ) { return "h2"; }
    if ( "ta_top_freearea_display_order" == $key_name ) { return "ASC"; }
  //最新投稿ダイジェスト（全ての投稿が対象）
    if ( "ta_top_latestposts_onoff" == $key_name ) { return "valid"; }
    if ( "ta_top_latestposts_position" == $key_name ) { return "free_b"; }
    $value = ta_top_margin_init_fixed_space( $key_name, 'ta_top_latestposts' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_latestposts_detail_init(
      $key_name,
      'top',                        //$place
      'valid',                      //$title_onoff
      'h2',                         //$title_factor
      '新着情報',                   //$title
      array(),                      //$nodis_cats
      5,                            //$num
      'invalid',                    //$full_content_onoff
      'none',                       //$pager_type
      10,                           //$post_distance
      1,                            //$row_num
      15,                           //$row_distance
      'b',                          //$border_type
      1,                            //$border_size
      'selectable',                 //$border_color_select
      '#aaaaaa',                    //$border_color
      'selectable',                 //$border_bgcolor_select
      'transparent',                //$border_bgcolor
      'solid',                      //$border_kind
      10                            //$border_padding
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_article_digest_design_init(
      $key_name,
      'top_latestposts',            //$place_and_role
      'invalid',                    //$newwin_onoff
      'title',                      //$ind
      'none',                       //$cg_top
      'timecat',                    //$cg_bottom
      'h4',                         //$post_title_factor
      'time-cat',                   //$timecat
      'valid',                      //$time_onoff
      'valid',                      //$cat_onoff
      'selectable',                 //$time_color_select
      '#aaaaaa',                    //$time_color
      90,                           //$time_size
      'normal',                     //$time_weight
      90,                           //$cat_size
      'bold',                       //$cat_weight
      2,                            //$cat_height
      6,                            //$cat_width
      '0',                          //$cat_round
      'valid',                      //$watchmark_onoff
      'valid',                      //$cgp_onoff
      'left',                       //$img_pos
      10,                           //$img_padding
      'ta_square_image90',          //$img_size
      50,                           //$excerpt
      60,                           //$excerpt_minheight
      '0',                          //$excerpt_tpadding
      1.2,                          //$excerpt_bpadding
      'invalid',                    //$excerpt_onlyfor_onoff
      100,                          //$excerpt_size
      'normal',                     //$excerpt_weight
      1.3,                          //$excerpt_lineheight
      'selectable',                 //$excerpt_anchor_color_select
      '#3a7fcf',                    //$excerpt_anchor_color
      'valid',                      //$excerpt_anchor_under
      'selectable',                 //$excerpt_anchor_colorhover_select
      '#66a5ed',                    //$excerpt_anchor_colorhover
      'valid',                      //$excerpt_anchor_underhover
      'f345',                       //$rightmark
      'selectable',                 //$rightmark_color_select
      '#aaaaaa',                    //$rightmark_color
      150,                          //$rightmark_size
      'bold',                       //$rightmark_weight
      10,                           //$rightmark_width
      0.6,                          //$rightmark_opacity
      1.0,                          //$rightmark_opacityhover
      'none',                       //$lowermark
      '&raquo; この記事を読む',     //$lowermark_title
      'invalid',                    //$lowermark_title_underline_onoff
      'invalid',                    //$lowermark_title_hoverunderline_onoff
      60,                           //$lowermark_title_size
      'normal',                     //$lowermark_title_weight
      'selectable',                 //$lowermark_title_color_select
      '#666666',                    //$lowermark_title_color
      'selectable',                 //$lowermark_title_colorhover_select
      '#666666',                    //$lowermark_title_colorhover
      'selectable',                 //$lowermark_bgcolor_select
      '#efefef',                    //$lowermark_bgcolor
      'selectable',                 //$lowermark_bgcolorhover_select
      '#e5e5e5',                    //$lowermark_bgcolorhover
      2,                            //$lowermark_height
      10,                           //$lowermark_minwidth
      '0',                          //$lowermark_round
      10,                           //$lowermark_paddingtop
      'valid',                      //$mark_onoff
      7,                            //$mark_days
      'no_image',                   //$mark_pic
      'NEW',                        //$mark_text
      'selectable',                 //$mark_text_color_select
      '#ffffff',                    //$mark_text_color
      'normal',                     //$mark_text_weight
      'selectable',                 //$mark_text_bgcolor_select
      '#ff4500',                    //$mark_text_bgcolor
      2,                            //$mark_text_round
      '0'                           //$mark_padding
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
  //各種投稿ダイジェスト
    if ( "ta_top_postdigest_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_top_postdigest_position" == $key_name ) { return "free_b"; }
    $value = ta_top_margin_init_fixed_space( $key_name, 'ta_top_postdigest' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_postdigest_detail_init(
      $key_name,
      'top',                        //$place
      'valid',                      //$title_onoff
      'valid',                      //$title_link_onoff
      'h2',                         //$title_factor
      array(),                      //$titles
      5,                            //$num
      'invalid',                    //$full_content_onoff
      'valid',                      //$catlink_onoff
      '%cat%の一覧を見る',          //$catlink_title
      'valid',                      //$catlink_title_underline_onoff
      100,                          //$catlink_title_size
      'normal',                     //$catlink_title_weight
      'selectable',                 //$catlink_title_color_select
      '#3f1f00',                    //$catlink_title_color
      'selectable',                 //$catlink_title_colorhover_select
      '#aaaaaa',                    //$catlink_title_colorhover
      'selectable',                 //$catlink_bgcolor_select
      'transparent',                //$catlink_bgcolor
      'selectable',                 //$catlink_bgcolorhover_select
      'transparent',                //$catlink_bgcolorhover
      2,                            //$catlink_height
      4,                            //$catlink_minwidth
      '0',                          //$catlink_round
      25,                           //$catlink_margintop
      'none',                       //$pager_type
      10,                           //$post_distance
      1,                            //$row_num
      15,                           //$row_distance
      'b',                          //$border_type
      1,                            //$border_size
      'selectable',                 //$border_color_select
      '#aaaaaa',                    //$border_color
      'selectable',                 //$border_bgcolor_select
      'transparent',                //$border_bgcolor
      'solid',                      //$border_kind
      '0'                           //$border_padding
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_article_digest_design_init(
      $key_name,
      'top_postdigest',             //$place_and_role
      'invalid',                    //$newwin_onoff
      'title',                      //$ind
      'none',                       //$cg_top
      'timecat',                    //$cg_bottom
      'h4',                         //$post_title_factor
      'time-cat',                   //$timecat
      'valid',                      //$time_onoff
      'valid',                      //$cat_onoff
      'selectable',                 //$time_color_select
      '#aaaaaa',                    //$time_color
      90,                           //$time_size
      'normal',                     //$time_weight
      90,                           //$cat_size
      'bold',                       //$cat_weight
      2,                            //$cat_height
      6,                            //$cat_width
      '0',                          //$cat_round
      'valid',                      //$watchmark_onoff
      'valid',                      //$cgp_onoff
      'left',                       //$img_pos
      10,                           //$img_padding
      'ta_square_image90',          //$img_size
      50,                           //$excerpt
      60,                           //$excerpt_minheight
      '0',                          //$excerpt_tpadding
      1.2,                          //$excerpt_bpadding
      'invalid',                    //$excerpt_onlyfor_onoff
      100,                          //$excerpt_size
      'normal',                     //$excerpt_weight
      1.3,                          //$excerpt_lineheight
      'selectable',                 //$excerpt_anchor_color_select
      '#3a7fcf',                    //$excerpt_anchor_color
      'valid',                      //$excerpt_anchor_under
      'selectable',                 //$excerpt_anchor_colorhover_select
      '#66a5ed',                    //$excerpt_anchor_colorhover
      'valid',                      //$excerpt_anchor_underhover
      'f345',                       //$rightmark
      'selectable',                 //$rightmark_color_select
      '#aaaaaa',                    //$rightmark_color
      150,                          //$rightmark_size
      'bold',                       //$rightmark_weight
      10,                           //$rightmark_width
      0.6,                          //$rightmark_opacity
      1.0,                          //$rightmark_opacityhover
      'none',                       //$lowermark
      '&raquo; この記事を読む',     //$lowermark_title
      'invalid',                    //$lowermark_title_underline_onoff
      'invalid',                    //$lowermark_title_hoverunderline_onoff
      60,                           //$lowermark_title_size
      'normal',                     //$lowermark_title_weight
      'selectable',                 //$lowermark_title_color_select
      '#666666',                    //$lowermark_title_color
      'selectable',                 //$lowermark_title_colorhover_select
      '#666666',                    //$lowermark_title_colorhover
      'selectable',                 //$lowermark_bgcolor_select
      '#efefef',                    //$lowermark_bgcolor
      'selectable',                 //$lowermark_bgcolorhover_select
      '#e5e5e5',                    //$lowermark_bgcolorhover
      2,                            //$lowermark_height
      10,                           //$lowermark_minwidth
      '0',                          //$lowermark_round
      10,                           //$lowermark_paddingtop
      'valid',                      //$mark_onoff
      7,                            //$mark_days
      'no_image',                   //$mark_pic
      'NEW',                        //$mark_text
      'selectable',                 //$mark_text_color_select
      '#ffffff',                    //$mark_text_color
      'normal',                     //$mark_text_weight
      'selectable',                 //$mark_text_bgcolor_select
      '#ff4500',                    //$mark_text_bgcolor
      2,                            //$mark_text_round
      '0'                           //$mark_padding
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
  //トップページウィジェット
    if ( "ta_top_widget_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_top_widget_title_factor" == $key_name ) { return "h2"; }
    if ( "ta_top_widget_position" == $key_name ) { return "free_b"; }
    if ( "ta_top_widget_centering" == $key_name ) { return "invalid"; }
  //トップページSEO設定
    if ( "ta_top_seo_keywords" == $key_name ) { return ""; }
    if ( "ta_top_seo_description" == $key_name ) { return ""; }
    if ( "ta_top_h1_content" == $key_name ) { return ta_other_data( 'ta_common_seo_common_h1_content', get_bloginfo('description') ); }
    if ( "ta_top_h1_disp" == $key_name ) { return "top_h1_common_add"; }
    if ( "ta_top_canonical_domain" == $key_name ) { return ""; }
  //SMO
    //トップページSNSボタン
    if ( "ta_top_sns_position" == $key_name ) { return "none"; }
    //トップページOGP設定
    if ( "ta_top_ogp_onoff" == $key_name ) { return "valid"; }
    if ( "ta_top_ogp_title" == $key_name ) { return get_bloginfo('name'); }
    if ( "ta_top_ogp_site_name" == $key_name ) { return get_bloginfo('name'); }
    if ( "ta_top_ogp_description" == $key_name ) { return get_bloginfo('description'); }
    if ( "ta_top_ogp_image" == $key_name ) { return "no_image"; }
    //トップページTwitter Cards設定
    if ( "ta_top_twittercards_onoff" == $key_name ) { return "valid"; }
    if ( "ta_top_twittercards_title" == $key_name ) { return get_bloginfo('name'); }
    if ( "ta_top_twittercards_description" == $key_name ) { return get_bloginfo('description'); }
    if ( "ta_top_twittercards_image" == $key_name ) { return "no_image"; }
  //その他
    if ( "ta_top_sitemap_disp_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_top_indexfollow" == $key_name ) { return "none"; }
    if ( "ta_top_fixed_space" == $key_name ) { return ta_initdata_sel( 50, 30 ); }
//ヘッダー設定メニュー
  //フレーム
    //ヘッダーの背景色・背景画像
    if ( "ta_header_frame_color_select" == $key_name ) { return 'selectable'; }
    if ( "ta_header_frame_color" == $key_name ) { return 'transparent'; }
    $value = ta_gradient_color_init( $key_name, 'ta_header_frame_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    if ( "ta_header_frame_pic" == $key_name ) { return "no_image"; }
    if ( "ta_header_frame_pic_rule" == $key_name ) { return "top_x"; }
    if ( "ta_header_frame_pic_margin" == $key_name ) { return 0; }
    //バナーエリアタイプ
    if ( "ta_header_bannerarea_type" == $key_name ) { return "logo_info_search"; }
    if ( "ta_header_size_check" == $key_name ) { return "invalid"; }
    //ヘッダー（バナーエリア）のサイズ
    if ( "ta_header_logo_width" == $key_name ) { return 40; }
    if ( "ta_header_logo_left_padding" == $key_name ) { return 0; }
    if ( "ta_header_logo_right_padding" == $key_name ) { return 2; }
    if ( "ta_header_info_width" == $key_name ) { return 22; }
    if ( "ta_header_info_right_padding" == $key_name ) { return 1; }
    if ( "ta_header_search_width" == $key_name ) { return 35; }
    if ( "ta_header_search_right_padding" == $key_name ) { return 0; }
    if ( "ta_header_height" == $key_name ) { return ta_initdata_sel( 150, 100 ); }
    if ( "ta_header_marginbottom" == $key_name ) { return ta_initdata_sel( 10, 0 ); }
    //ヘッダーバナーエリアの位置（フレーム外への移動）
    if ( TA_HIEND_PI ) {
      $value = ta_thm001highend_bannerarea2wrap_init( $key_name );
      if ( 'ta_no_fit' != $value ) { return $value; }
    }
    //グローバルメニューとヘッダー画像の位置
    if ( TA_HIEND_PI ) {
      $value = ta_thm001highend_glblnv_img_2main_init( $key_name );
      if ( 'ta_no_fit' != $value ) { return $value; }
    }
  //フォント
    if ( "ta_header_font_size" == $key_name ) { return 80; }
    if ( "ta_header_font_anchor_onlyfor_onoff" == $key_name ) { return 'invalid'; }
    if ( "ta_header_font_normal_text_color_select" == $key_name ) { return 'selectable'; }
    if ( "ta_header_font_normal_text_color" == $key_name ) { return '#3f1f00'; }
    if ( "ta_header_font_anchor_color_select" == $key_name ) { return 'selectable'; }
    if ( "ta_header_font_anchor_color" == $key_name ) { return '#3a7fcf'; }
    if ( "ta_header_font_anchor_under" == $key_name ) { return 'valid'; }
    if ( "ta_header_font_anchor_colorhover_select" == $key_name ) { return 'selectable'; }
    if ( "ta_header_font_anchor_colorhover" == $key_name ) { return '#66a5ed'; }
    if ( "ta_header_font_anchor_underhover" == $key_name ) { return 'valid'; }
    $value = ta_paragraph_init( $key_name, "ta_header_font" );
    if ( 'ta_no_fit' != $value ) { return $value; }
  //ロゴエリア
    //ロゴエリアの調整
    if ( "ta_header_logo_top_padding" == $key_name ) { return ta_initdata_sel( 10, 0 ); }
    if ( "ta_header_logoimg_height" == $key_name ) { return 57; }
    if ( "ta_header_logo_contents_layout" == $key_name ) { return "left"; }
    if ( "ta_header_h1_position" == $key_name ) { return "top"; }
    if ( "ta_header_h1_size" == $key_name ) { return ta_initdata_sel( 16, 14 ); }
    if ( "ta_header_h1_lineheight" == $key_name ) { return ta_initdata_sel( 1.3, 1.5 ); }
    if ( "ta_header_h1_margin_t" == $key_name ) { return ta_initdata_sel( 15, 3 ); }
    if ( "ta_header_h1_margin_b" == $key_name ) { return ta_initdata_sel( 15, 10 ); }
    if ( "ta_header_h1_margin_l" == $key_name ) { return 0; }
    if ( "ta_header_h1_content_color_select" == $key_name ) { return 'selectable'; }
    if ( "ta_header_h1_content_color" == $key_name ) { return ta_initdata_sel( '#828282', '#ffffff' ); }
    if ( "ta_header_h1_content_color_fontweight" == $key_name ) { return 'normal'; }
    if ( "ta_header_h1_content_anchor_color_select" == $key_name ) { return 'selectable'; }
    if ( "ta_header_h1_content_anchor_color" == $key_name ) { return ta_initdata_sel( '#828282', '#ffffff' ); }
    if ( "ta_header_h1_content_anchor_under" == $key_name ) { return 'invalid'; }
    if ( "ta_header_h1_content_anchor_colorhover_select" == $key_name ) { return 'selectable'; }
    if ( "ta_header_h1_content_anchor_colorhover" == $key_name ) { return ta_initdata_sel( '#b2b2b2', '#dddddd' ); }
    if ( "ta_header_h1_content_anchor_underhover" == $key_name ) { return 'invalid'; }
    if ( "ta_header_h1_content_link_newwin_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_header_h1_long_onoff" == $key_name ) { return 'invalid'; }
    //ロゴエリアの画像・リンク
    if ( "ta_header_logo_pic" == $key_name ) { return 'built_in'; }
    if ( "ta_header_logo_link" == $key_name ) { return home_url('/'); }
    if ( "ta_header_logo_link_newwin_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_header_logo_text" == $key_name ) { return "テックエイド\r\n成長するホームページ"; }
    if ( "ta_header_logo_text_size" == $key_name ) { return 23; }
    if ( "ta_header_logo_text_fontweight" == $key_name ) { return 'bold'; }
    if ( "ta_header_logo_text_color_select" == $key_name ) { return 'selectable'; }
    if ( "ta_header_logo_text_color" == $key_name ) { return '#ffb76f'; }
    if ( "ta_header_logo_text_under_onoff" == $key_name ) { return 'invalid'; }
    if ( "ta_header_logo_text_hover_select" == $key_name ) { return 'selectable'; }
    if ( "ta_header_logo_text_hover" == $key_name ) { return '#aaaaaa'; }
    if ( "ta_header_logo_text_hoverunder_onoff" == $key_name ) { return 'invalid'; }
  //連絡先エリア
    //連絡先エリアの調整
    if ( "ta_header_info_top_padding" == $key_name ) { return ta_initdata_sel( 65, 35 ); }
    if ( "ta_header_infoimg_height" == $key_name ) { return 50; }
    if ( "ta_header_info_contents_layout" == $key_name ) { return "left"; }
    if ( "ta_header_info_menu_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_header_info_menu_left_margin" == $key_name ) { return 10; }
    if ( "ta_header_info_menu_margin2info_pic" == $key_name ) { return 10; }
    if ( "ta_header_info_sns_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_header_info_sns_margin2info_pic" == $key_name ) { return 10; }
    //連絡エリアの画像・リンク
    if ( "ta_header_info_pic" == $key_name ) { return "no_image"; }
    if ( "ta_header_info_link" == $key_name ) { return "#"; }
    if ( "ta_header_info_link_newwin_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_header_info_text" == $key_name ) { return "お問い合わせ"; }
    if ( "ta_header_info_text_size" == $key_name ) { return 30; }
    if ( "ta_header_info_text_fontweight" == $key_name ) { return ta_initdata_sel( 'bold', 'normal' ); }
    if ( "ta_header_info_text_color_select" == $key_name ) { return 'selectable'; }
    if ( "ta_header_info_text_color" == $key_name ) { return ta_initdata_sel( '#68b4ff', '#3f1f00' ); }
    if ( "ta_header_info_text_under_onoff" == $key_name ) { return 'invalid'; }
    if ( "ta_header_info_text_hover_select" == $key_name ) { return 'selectable'; }
    if ( "ta_header_info_text_hover" == $key_name ) { return '#aaaaaa'; }
    if ( "ta_header_info_text_hoverunder_onoff" == $key_name ) { return 'invalid'; }
    //連絡先エリアの簡易メニュー
    if ( "ta_header_info_simplemenu_fontsize" == $key_name ) { return 13; }
    if ( "ta_header_info_simplemenu_fontweight" == $key_name ) { return "normal"; }
    if ( "ta_header_info_simplemenu_underline_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_header_info_simplemenu_color_select" == $key_name ) { return 'selectable'; }
    if ( "ta_header_info_simplemenu_color" == $key_name ) { return '#3f1f00'; }
    if ( "ta_header_info_simplemenu_colorhover_select" == $key_name ) { return 'selectable'; }
    if ( "ta_header_info_simplemenu_colorhover" == $key_name ) { return '#aaaaaa'; }
    if ( "ta_header_info_simplemenu_hoverunderline_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_header_info_simplemenu_layout" == $key_name ) { return 'normal'; }
    if ( "ta_header_info_simplemenu_num" == $key_name ) { return 2; }
  //検索エリア
    //検索エリアの調整
    if ( "ta_header_search_top_padding" == $key_name ) { return ta_initdata_sel( 45, 2 ); }
    if ( "ta_header_search_width_size" == $key_name ) { return 50; }
    if ( "ta_header_search_height_size" == $key_name ) { return 1.5; }
    if ( "ta_header_search_color_select" == $key_name ) { return "selectable"; }
    if ( "ta_header_search_color" == $key_name ) { return "#000000"; }
    if ( "ta_header_search_bgcolor_select" == $key_name ) { return "selectable"; }
    if ( "ta_header_search_bgcolor" == $key_name ) { return "#ffffff"; }
    if ( "ta_header_search_border_color_select" == $key_name ) { return "selectable"; }
    if ( "ta_header_search_border_color" == $key_name ) { return "#d4d4d4"; }
    if ( "ta_header_search_radius_size" == $key_name ) { return ta_initdata_sel( 10, 0 ); }
    if ( "ta_header_search_submit_title" == $key_name ) { return "no_disp"; }
    if ( "ta_header_search_submit_title_color_select" == $key_name ) { return "selectable"; }
    if ( "ta_header_search_submit_title_color" == $key_name ) { return "#000000"; }
    if ( "ta_header_search_submit_bgcolor_select" == $key_name ) { return "selectable"; }
    if ( "ta_header_search_submit_bgcolor" == $key_name ) { return ta_initdata_sel( "transparent", "#ffffff" ); }
    if ( "ta_header_search_submit_width_size" == $key_name ) { return 20; }
    if ( "ta_header_search_glass" == $key_name ) { return ta_initdata_sel( "orange", "blue" ); }
    if ( "ta_header_search_menu_onoff" == $key_name ) { return "valid"; }
    if ( "ta_header_search_menu_right_margin" == $key_name ) { return 0; }
    if ( "ta_header_search_menu_margin2search_pic" == $key_name ) { return ta_initdata_sel( 10, 8 ); }
    if ( "ta_header_search_sns_onoff" == $key_name ) { return "valid"; }
    if ( "ta_header_search_sns_margin2search_pic" == $key_name ) { return ta_initdata_sel( 15, 10 ); }
    //検索エリアの簡易メニュー
    if ( "ta_header_search_simplemenu_fontsize" == $key_name ) { return 13; }
    if ( "ta_header_search_simplemenu_fontweight" == $key_name ) { return "normal"; }
    if ( "ta_header_search_simplemenu_underline_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_header_search_simplemenu_color_select" == $key_name ) { return 'selectable'; }
    if ( "ta_header_search_simplemenu_color" == $key_name ) { return ta_initdata_sel( '#3f1f00', '#ffffff' ); }
    if ( "ta_header_search_simplemenu_colorhover_select" == $key_name ) { return 'selectable'; }
    if ( "ta_header_search_simplemenu_colorhover" == $key_name ) { return ta_initdata_sel( '#aaaaaa', '#dddddd' ); }
    if ( "ta_header_search_simplemenu_hoverunderline_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_header_search_simplemenu_layout" == $key_name ) { return 'normal'; }
    if ( "ta_header_search_simplemenu_num" == $key_name ) { return 2; }
  //グローバル（ヘッダー）メニュー
    //グローバルメニューバー
    if ( "ta_header_glabalmenu_position" == $key_name ) { return "bottom"; }
    if ( "ta_header_glabalmenu_itemnum" == $key_name ) { return 6; }
    if ( "ta_header_glabalmenu_wholeheight" == $key_name ) { return ta_initdata_sel( 40, 30 ); }
    if ( "ta_header_glabalmenu_topmargin" == $key_name ) { return 10; }
    if ( "ta_header_glabalmenu_bottommargin" == $key_name ) { return 10; }
    if ( "ta_header_glabalmenu_frame_select" == $key_name ) { return 'none'; }
    if ( "ta_header_glabalmenu_frame_color_select" == $key_name ) { return 'selectable'; }
    if ( "ta_header_glabalmenu_frame_color" == $key_name ) { return '#dddddd'; }
    if ( "ta_header_glabalmenu_frame_size" == $key_name ) { return 1; }
    if ( "ta_header_glabalmenu_frame_margin_size" == $key_name ) { return 90; }
    if ( "ta_header_glabalmenu_current_frame_color_onoff" == $key_name ) { return "valid"; }
    if ( "ta_header_glabalmenu_current_text_color_select" == $key_name ) { return 'selectable'; }
    if ( "ta_header_glabalmenu_current_text_color" == $key_name ) { return ta_initdata_sel( '#666666', '#ffffff' ); }
    if ( "ta_header_glabalmenu_current_frame_color_select" == $key_name ) { return 'selectable'; }
    if ( "ta_header_glabalmenu_current_frame_color" == $key_name ) { return ta_initdata_sel( '#ffbaba', '#dd3333' ); }
    $value = ta_gradient_color_init( $key_name, 'ta_header_glabalmenu_current_frame_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    //グローバルメインメニューテキスト
    if ( "ta_header_glabalmenu_fontsize" == $key_name ) { return 16; }
    if ( "ta_header_glabalmenu_fontweight" == $key_name ) { return "normal"; }
    if ( "ta_header_glabalmenu_fontcolor_select" == $key_name ) { return 'selectable'; }
    if ( "ta_header_glabalmenu_fontcolor" == $key_name ) { return '#666666'; }
    if ( "ta_header_glabalmenu_fontcolorhover_select" == $key_name ) { return 'selectable'; }
    if ( "ta_header_glabalmenu_fontcolorhover" == $key_name ) { return ta_initdata_sel( '#999999', '#ffffff' ); }
    if ( "ta_header_glabalmenu_backcolor_select" == $key_name ) { return 'selectable'; }
    if ( "ta_header_glabalmenu_backcolor" == $key_name ) { return ta_initdata_sel( '#f0efeb', 'transparent' ); }
    $value = ta_gradient_color_init( $key_name, 'ta_header_glabalmenu_backcolor' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    if ( "ta_header_glabalmenu_backcolorhover_select" == $key_name ) { return 'selectable'; }
    if ( "ta_header_glabalmenu_backcolorhover" == $key_name ) { return ta_initdata_sel( '#e8e8e3', '#00c0c0' ); }
    $value = ta_gradient_color_init( $key_name, 'ta_header_glabalmenu_backcolorhover' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    //グローバルサブメニューテキスト
    if ( "ta_header_glabalsubmenu_fontsize" == $key_name ) { return 14; }
    if ( "ta_header_glabalsubmenu_fontweight" == $key_name ) { return "normal"; }
    if ( "ta_header_glabalsubmenu_fontcolor_select" == $key_name ) { return 'selectable'; }
    if ( "ta_header_glabalsubmenu_fontcolor" == $key_name ) { return ta_initdata_sel( '#000000', '#666666' ); }
    if ( "ta_header_glabalsubmenu_fontcolorhover_select" == $key_name ) { return 'selectable'; }
    if ( "ta_header_glabalsubmenu_fontcolorhover" == $key_name ) { return ta_initdata_sel( '#000000', '#ffffff' ); }
    if ( "ta_header_glabalsubmenu_backcolor_select" == $key_name ) { return 'selectable'; }
    if ( "ta_header_glabalsubmenu_backcolor" == $key_name ) { return ta_initdata_sel( '#e2ffe2', '#ffedff' ); }
    $value = ta_gradient_color_init( $key_name, 'ta_header_glabalsubmenu_backcolor' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    if ( "ta_header_glabalsubmenu_backcolorhover_select" == $key_name ) { return 'selectable'; }
    if ( "ta_header_glabalsubmenu_backcolorhover" == $key_name ) { return ta_initdata_sel( '#e8e8e3', '#00c0c0' ); }
    $value = ta_gradient_color_init( $key_name, 'ta_header_glabalsubmenu_backcolorhover' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    if ( "ta_header_glabalsubmenu_width" == $key_name ) { return 100; }
    if ( "ta_header_glabalsubmenu_height" == $key_name ) { return 80; }
    if ( "ta_header_glabalsubmenu_border_size" == $key_name ) { return 1; }
    if ( "ta_header_glabalsubmenu_border_color_select" == $key_name ) { return 'selectable'; }
    if ( "ta_header_glabalsubmenu_border_color" == $key_name ) { return '#aaaaaa'; }
    if ( "ta_header_glabalsubmenu_border_kind" == $key_name ) { return 'solid'; }
  //ヘッダー画像
    if ( "ta_header_headimg_select" == $key_name ) { return "original"; }
    if ( "ta_header_headimg_width" == $key_name ) { return ta_other_data( 'ta_common_frame_width', '950' ); }
    if ( "ta_header_headimg_height" == $key_name ) { return 250; }
    if ( "ta_header_headimg_link" == $key_name ) { return home_url('/'); }
    if ( "ta_header_headimg_link_newwin_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_header_headimg_insertpage" == $key_name ) { return "top_only"; }
    //ヘッダー画像に被せるテキスト
    if ( "ta_header_headimg_text_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_header_headimg_text" == $key_name ) { return ""; }
    if ( "ta_header_headimg_fontsize" == $key_name ) { return 30; }
    if ( "ta_header_headimg_fontweight" == $key_name ) { return "normal"; }
    if ( "ta_header_headimg_fontcolor_select" == $key_name ) { return 'selectable'; }
    if ( "ta_header_headimg_fontcolor" == $key_name ) { return '#777777'; }
    if ( "ta_header_headimg_position_x" == $key_name ) { return 5; }
    if ( "ta_header_headimg_position_y" == $key_name ) { return 40; }
  //ヘッダーフリーエリア
    if ( TA_HIEND_PI ) {
      $value = ta_thm001highend_header_freearea_init( $key_name );
      if ( 'ta_no_fit' != $value ) { return $value; }
    }
//メイン設定メニュー
  //フレーム
    //メインコンテンツの背景色・背景画像
    if ( "ta_main_frame_color_select" == $key_name ) { return 'selectable'; }
    if ( "ta_main_frame_color" == $key_name ) { return 'transparent'; }
    $value = ta_gradient_color_init( $key_name, 'ta_main_frame_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    if ( TA_HIEND_PI ) {
      $value = ta_thm001highend_main_frame_init( $key_name );
      if ( 'ta_no_fit' != $value ) { return $value; }
    }
    if ( "ta_main_frame_padding" == $key_name ) { return 0; }
  //フォント
    if ( "ta_main_font_size" == $key_name ) { return 100; }
    if ( "ta_main_font_anchor_onlyfor_onoff" == $key_name ) { return 'invalid'; }
    if ( "ta_main_font_normal_text_color_select" == $key_name ) { return 'selectable'; }
    if ( "ta_main_font_normal_text_color" == $key_name ) { return '#3f1f00'; }
    if ( "ta_main_font_anchor_color_select" == $key_name ) { return 'selectable'; }
    if ( "ta_main_font_anchor_color" == $key_name ) { return '#3a7fcf'; }
    if ( "ta_main_font_anchor_under" == $key_name ) { return 'valid'; }
    if ( "ta_main_font_anchor_colorhover_select" == $key_name ) { return 'selectable'; }
    if ( "ta_main_font_anchor_colorhover" == $key_name ) { return '#66a5ed'; }
    if ( "ta_main_font_anchor_underhover" == $key_name ) { return 'valid'; }
    $value = ta_paragraph_init( $key_name, "ta_main_font" );
    if ( 'ta_no_fit' != $value ) { return $value; }
  //h2
    $value = ta_headline_init( 
      $key_name,
      'ta_main_headline_h2',                                                  // $headline_key_name
      ta_initdata_sel( 'box', 'left' ),                                       // $type
      '20',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      ta_initdata_sel( '3', '2' ),                                            // $position
      'bold',                                                                 // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      ta_initdata_sel( 'common_site_text_on_hl', 'common_site_text_on_bg' ),  // $color_select
      '#ffffff',                                                              // $color
      ta_other_data( 'ta_main_headline_h2_color_select', ta_initdata_sel( 'common_site_text_on_hl', 'common_site_text_on_bg' ) ), // $linkedcolor_select
      ta_other_data( 'ta_main_headline_h2_color', '#ffffff' ),                // $linkedcolor
      ta_initdata_sel( '5', '1' ),                                            // $left_size
      ta_initdata_sel( 'common_site_hl', 'selectable' ),                      // $left_color_select
      ta_initdata_sel( '#3f1f00', '#eeeeee' ),                                // $left_color
      ta_initdata_sel( 'invalid', 'valid' ),                                  // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      ta_initdata_sel( '#aaaaaa', '#eeeeee' ),                                // $over_color
      ta_initdata_sel( 'invalid', 'valid' ),                                  // $under_onoff
      'solid',                                                                // $under_kind
      ta_initdata_sel( '1', '5' ),                                            // $under_size
      'selectable',                                                           // $under_color_select
      ta_initdata_sel( '#aaaaaa', '#dd3333' ),                                // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '10',                                                                   // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '10',                                                                   // $padding_top
      ta_initdata_sel( '6', '5' ),                                            // $padding_bottom
      '0',                                                                    // $margin_top
      '20',                                                                   // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_main_headline_h2_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_main_headline_h2_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_main_headline_h2_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_main_headline_h2_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
  //h3
    $value = ta_headline_init( 
      $key_name,
      'ta_main_headline_h3',                                                  // $headline_key_name
      'left',                                                                 // $type
      '18',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '2',                                                                    // $position
      'bold',                                                                 // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_bg',                                               // $color_select
      '#3f1f00',                                                              // $color
      ta_other_data( 'ta_main_headline_h3_color_select', 'common_site_text_on_bg' ), // $linkedcolor_select
      ta_other_data( 'ta_main_headline_h3_color', '#3f1f00' ),                // $linkedcolor
      '3',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'valid',                                                                // $under_onoff
      'solid',                                                                // $under_kind
      ta_initdata_sel( '1', '3' ),                                            // $under_size
      'selectable',                                                           // $under_color_select
      ta_initdata_sel( '#aaaaaa', '#eeeeee' ),                                // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '5',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '2',                                                                    // $padding_top
      ta_initdata_sel( '2', '0' ),                                            // $padding_bottom
      '0',                                                                    // $margin_top
      ta_initdata_sel( '20', '15' ),                                          // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_main_headline_h3_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_main_headline_h3_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_main_headline_h3_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_main_headline_h3_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
  //h4
    $value = ta_headline_init(
      $key_name,
      'ta_main_headline_h4',                                                  // $headline_key_name
      'simple',                                                               // $type
      '16',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '0',                                                                    // $position
      'bold',                                                                 // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_bg',                                               // $color_select
      '#3f1f00',                                                              // $color
      ta_other_data( 'ta_main_headline_h4_color_select', 'common_site_text_on_bg' ), // $linkedcolor_select
      ta_other_data( 'ta_main_headline_h4_color', '#3f1f00' ),                // $linkedcolor
      '5',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'invalid',                                                              // $under_onoff
      'solid',                                                                // $under_kind
      '1',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '5',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '0',                                                                    // $padding_top
      '0',                                                                    // $padding_bottom
      '0',                                                                    // $margin_top
      '14',                                                                   // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_main_headline_h4_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_main_headline_h4_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_main_headline_h4_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_main_headline_h4_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
  //h5
    $value = ta_headline_init(
      $key_name,
      'ta_main_headline_h5',                                                  // $headline_key_name
      'simple',                                                               // $type
      '16',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '0',                                                                    // $position
      'normal',                                                               // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_bg',                                               // $color_select
      '#3f1f00',                                                              // $color
      ta_other_data( 'ta_main_headline_h5_color_select', 'common_site_text_on_bg' ), // $linkedcolor_select
      ta_other_data( 'ta_main_headline_h5_color', '#3f1f00' ),                // $linkedcolor
      '5',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'valid',                                                                // $under_onoff
      'solid',                                                                // $under_kind
      '1',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '5',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '0',                                                                    // $padding_top
      '0',                                                                    // $padding_bottom
      '0',                                                                    // $margin_top
      '14',                                                                   // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_main_headline_h5_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_main_headline_h5_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_main_headline_h5_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_main_headline_h5_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
  //装飾1
    $value = ta_headline_init( 
      $key_name,
      'ta_main_deco1',                                                        // $headline_key_name
      'simple',                                                               // $type
      '16',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '0',                                                                    // $position
      'normal',                                                               // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_bg',                                               // $color_select
      '#3f1f00',                                                              // $color
      ta_other_data( 'ta_main_deco1_color_select', 'common_site_text_on_bg' ), // $linkedcolor_select
      ta_other_data( 'ta_main_deco1_color', '#3f1f00' ),                      // $linkedcolor
      '5',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'invalid',                                                              // $under_onoff
      'solid',                                                                // $under_kind
      '1',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '5',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '0',                                                                    // $padding_top
      '0',                                                                    // $padding_bottom
      '0',                                                                    // $margin_top
      '14',                                                                   // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_main_deco1_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_main_deco1_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_main_deco1_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_main_deco1_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
  //装飾2
    $value = ta_headline_init( 
      $key_name,
      'ta_main_deco2',                                                        // $headline_key_name
      'simple',                                                               // $type
      '16',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '0',                                                                    // $position
      'normal',                                                               // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_bg',                                               // $color_select
      '#3f1f00',                                                              // $color
      ta_other_data( 'ta_main_deco2_color_select', 'common_site_text_on_bg' ), // $linkedcolor_select
      ta_other_data( 'ta_main_deco2_color', '#3f1f00' ),                      // $linkedcolor
      '5',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'invalid',                                                              // $under_onoff
      'solid',                                                                // $under_kind
      '1',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '5',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '0',                                                                    // $padding_top
      '0',                                                                    // $padding_bottom
      '0',                                                                    // $margin_top
      '14',                                                                   // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_main_deco2_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_main_deco2_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_main_deco2_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_main_deco2_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
  //装飾3
    $value = ta_headline_init( 
      $key_name,
      'ta_main_deco3',                                                        // $headline_key_name
      'simple',                                                               // $type
      '16',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '0',                                                                    // $position
      'normal',                                                               // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_bg',                                               // $color_select
      '#3f1f00',                                                              // $color
      ta_other_data( 'ta_main_deco3_color_select', 'common_site_text_on_bg' ), // $linkedcolor_select
      ta_other_data( 'ta_main_deco3_color', '#3f1f00' ),                      // $linkedcolor
      '5',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'invalid',                                                              // $under_onoff
      'solid',                                                                // $under_kind
      '1',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '5',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '0',                                                                    // $padding_top
      '0',                                                                    // $padding_bottom
      '0',                                                                    // $margin_top
      '14',                                                                   // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_main_deco3_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_main_deco3_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_main_deco3_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_main_deco3_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
  //装飾4
    $value = ta_headline_init( 
      $key_name,
      'ta_main_deco4',                                                        // $headline_key_name
      'simple',                                                               // $type
      '16',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '0',                                                                    // $position
      'normal',                                                               // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_bg',                                               // $color_select
      '#3f1f00',                                                              // $color
      ta_other_data( 'ta_main_deco4_color_select', 'common_site_text_on_bg' ), // $linkedcolor_select
      ta_other_data( 'ta_main_deco4_color', '#3f1f00' ),                      // $linkedcolor
      '5',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'invalid',                                                              // $under_onoff
      'solid',                                                                // $under_kind
      '1',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '5',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '0',                                                                    // $padding_top
      '0',                                                                    // $padding_bottom
      '0',                                                                    // $margin_top
      '14',                                                                   // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_main_deco4_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_main_deco4_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_main_deco4_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_main_deco4_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
  //フリーエリア
    if ( TA_HIEND_PI ) {
      $value = ta_thm001highend_endroll_freearea_init( $key_name );
      if ( 'ta_no_fit' != $value ) { return $value; }
    }
  //その他
    if ( "ta_main_fixed_space" == $key_name ) { return ta_initdata_sel( 50, 30 ); }
    if ( "ta_main_separator_size" == $key_name ) { return 1; }
    if ( "ta_main_separator_kind" == $key_name ) { return 'solid'; }
    if ( "ta_main_separator_kind_color_select" == $key_name ) { return 'selectable'; }
    if ( "ta_main_separator_kind_color" == $key_name ) { return '#aaaaaa'; }
    $value = ta_gradient_color_init( $key_name, 'ta_main_separator_kind_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    if ( "ta_main_separator_tmargin" == $key_name ) { return 20; }
    if ( "ta_main_separator_bmargin" == $key_name ) { return 20; }
//サイドバー設定メニュー
  //フレーム
    //サイドバーの背景色・背景画像
    if ( "ta_sidebar_frame_color_select" == $key_name ) { return 'selectable'; }
    if ( "ta_sidebar_frame_color" == $key_name ) { return 'transparent'; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebar_frame_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    if ( TA_HIEND_PI ) {
      $value = ta_thm001highend_arrange_height_onoff_init( 'sidebar', $key_name );
      if ( 'ta_no_fit' != $value ) { return $value; }
    }
    if ( TA_HIEND_PI ) {
      $value = ta_thm001highend_side_frame_init( 'sidebar', $key_name );
      if ( 'ta_no_fit' != $value ) { return $value; }
    }
    if ( "ta_sidebar_frame_padding" == $key_name ) { return 0; }
  //フォント
    if ( "ta_sidebar_font_size" == $key_name ) { return 90; }
    if ( "ta_sidebar_font_anchor_onlyfor_onoff" == $key_name ) { return 'invalid'; }
    if ( "ta_sidebar_font_normal_text_color_select" == $key_name ) { return 'selectable'; }
    if ( "ta_sidebar_font_normal_text_color" == $key_name ) { return '#3f1f00'; }
    if ( "ta_sidebar_font_anchor_color_select" == $key_name ) { return 'selectable'; }
    if ( "ta_sidebar_font_anchor_color" == $key_name ) { return '#3a7fcf'; }
    if ( "ta_sidebar_font_anchor_under" == $key_name ) { return 'valid'; }
    if ( "ta_sidebar_font_anchor_colorhover_select" == $key_name ) { return 'selectable'; }
    if ( "ta_sidebar_font_anchor_colorhover" == $key_name ) { return '#66a5ed'; }
    if ( "ta_sidebar_font_anchor_underhover" == $key_name ) { return 'valid'; }
    $value = ta_paragraph_init( $key_name, "ta_sidebar_font" );
    if ( 'ta_no_fit' != $value ) { return $value; }
  //h2
    $value = ta_headline_init(
      $key_name,
      'ta_sidebar_headline_h2',                                               // $headline_key_name
      ta_initdata_sel( 'box', 'left' ),                                       // $type
      '16',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '5',                                                                    // $position
      'bold',                                                                 // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      ta_initdata_sel( 'common_site_text_on_hl', 'common_site_text_on_bg' ),  // $color_select
      '#ffffff',                                                              // $color
      ta_other_data( 'ta_sidebar_headline_h2_color_select', ta_initdata_sel( 'common_site_text_on_hl', 'common_site_text_on_bg' ) ), // $linkedcolor_select
      ta_other_data( 'ta_sidebar_headline_h2_color', '#ffffff' ),             // $linkedcolor
      ta_initdata_sel( '5', '1' ),                                            // $left_size
      ta_initdata_sel( 'common_site_hl', 'selectable' ),                      // $left_color_select
      ta_initdata_sel( '#3f1f00', '#eeeeee' ),                                // $left_color
      ta_initdata_sel( 'invalid', 'valid' ),                                  // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      ta_initdata_sel( '#aaaaaa', '#eeeeee' ),                                // $over_color
      ta_initdata_sel( 'invalid', 'valid' ),                                  // $under_onoff
      'solid',                                                                // $under_kind
      ta_initdata_sel( '1', '3' ),                                            // $under_size
      'selectable',                                                           // $under_color_select
      ta_initdata_sel( '#aaaaaa', '#dd3333' ),                                // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '8',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      ta_initdata_sel( '8', '10' ),                                           // $padding_top
      '5',                                                                    // $padding_bottom
      '0',                                                                    // $margin_top
      ta_initdata_sel( '20', '15' ),                                          // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebar_headline_h2_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebar_headline_h2_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebar_headline_h2_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebar_headline_h2_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
  //h3
    $value = ta_headline_init(
      $key_name,
      'ta_sidebar_headline_h3',                                               // $headline_key_name
      'left',                                                                 // $type
      '16',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '5',                                                                    // $position
      'normal',                                                               // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_bg',                                               // $color_select
      '#3f1f00',                                                              // $color
      ta_other_data( 'ta_sidebar_headline_h3_color_select', 'common_site_text_on_bg' ), // $linkedcolor_select
      ta_other_data( 'ta_sidebar_headline_h3_color', '#3f1f00' ),             // $linkedcolor
      '5',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'valid',                                                                // $under_onoff
      'solid',                                                                // $under_kind
      '3',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '5',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '3',                                                                    // $padding_top
      '3',                                                                    // $padding_bottom
      '0',                                                                    // $margin_top
      '14',                                                                   // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebar_headline_h3_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebar_headline_h3_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebar_headline_h3_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebar_headline_h3_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
  //h4
    $value = ta_headline_init(
      $key_name,
      'ta_sidebar_headline_h4',                                               // $headline_key_name
      'simple',                                                               // $type
      '15',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '0',                                                                    // $position
      'bold',                                                                 // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_bg',                                               // $color_select
      '#3f1f00',                                                              // $color
      ta_other_data( 'ta_sidebar_headline_h4_color_select', 'common_site_text_on_bg' ), // $linkedcolor_select
      ta_other_data( 'ta_sidebar_headline_h4_color', '#3f1f00' ),             // $linkedcolor
      '5',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'invalid',                                                              // $under_onoff
      'solid',                                                                // $under_kind
      '1',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '5',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '0',                                                                    // $padding_top
      '0',                                                                    // $padding_bottom
      '0',                                                                    // $margin_top
      '8',                                                                    // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebar_headline_h4_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebar_headline_h4_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebar_headline_h4_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebar_headline_h4_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
  //h5
    $value = ta_headline_init(
      $key_name,
      'ta_sidebar_headline_h5',                                               // $headline_key_name
      ta_initdata_sel( 'simple', 'box' ),                                     // $type
      ta_initdata_sel( '16', '13.5' ),                                        // $size
      '1.3',                                                                  // $hl_lineheight
      ta_initdata_sel( 'invalid', 'valid' ),                                  // $centering
      '0',                                                                    // $position
      'normal',                                                               // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      ta_initdata_sel( 'common_site_text_on_bg', 'common_site_text_on_hl' ),  // $color_select
      '#3f1f00',                                                              // $color
      ta_other_data( 'ta_sidebar_headline_h5_color_select', ta_initdata_sel( 'common_site_text_on_bg', 'common_site_text_on_hl' ) ), // $linkedcolor_select
      ta_other_data( 'ta_sidebar_headline_h5_color', '#3f1f00' ),             // $linkedcolor
      '5',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'valid',                                                                // $under_onoff
      'solid',                                                                // $under_kind
      '1',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      ta_initdata_sel( 'common_site_hl', 'selectable' ),                      // $box_color_select
      ta_initdata_sel( '#3f1f00', '#00c0c0' ),                                // $box_color
      '0',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      ta_initdata_sel( '0', '4' ),                                            // $padding_top
      ta_initdata_sel( '0', '4' ),                                            // $padding_bottom
      '0',                                                                    // $margin_top
      ta_initdata_sel( '14', '5' ),                                           // $margin_bottom
      'selectable',                                                           // $colorhover_select
      ta_initdata_sel( '#aaaaaa', '#dddddd' ),                                // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebar_headline_h5_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebar_headline_h5_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebar_headline_h5_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebar_headline_h5_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
  //装飾1
    $value = ta_headline_init( 
      $key_name,
      'ta_sidebar_deco1',                                                     // $headline_key_name
      'simple',                                                               // $type
      '16',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '0',                                                                    // $position
      'normal',                                                               // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_bg',                                               // $color_select
      '#3f1f00',                                                              // $color
      ta_other_data( 'ta_sidebar_deco1_color_select', 'common_site_text_on_bg' ), // $linkedcolor_select
      ta_other_data( 'ta_sidebar_deco1_color', '#3f1f00' ),                   // $linkedcolor
      '5',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'invalid',                                                              // $under_onoff
      'solid',                                                                // $under_kind
      '1',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '5',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '0',                                                                    // $padding_top
      '0',                                                                    // $padding_bottom
      '0',                                                                    // $margin_top
      '14',                                                                   // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebar_deco1_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebar_deco1_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebar_deco1_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebar_deco1_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
  //装飾2
    $value = ta_headline_init( 
      $key_name,
      'ta_sidebar_deco2',                                                     // $headline_key_name
      'simple',                                                               // $type
      '16',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '0',                                                                    // $position
      'normal',                                                               // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_bg',                                               // $color_select
      '#3f1f00',                                                              // $color
      ta_other_data( 'ta_sidebar_deco2_color_select', 'common_site_text_on_bg' ), // $linkedcolor_select
      ta_other_data( 'ta_sidebar_deco2_color', '#3f1f00' ),                   // $linkedcolor
      '5',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'invalid',                                                              // $under_onoff
      'solid',                                                                // $under_kind
      '1',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '5',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '0',                                                                    // $padding_top
      '0',                                                                    // $padding_bottom
      '0',                                                                    // $margin_top
      '14',                                                                   // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebar_deco2_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebar_deco2_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebar_deco2_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebar_deco2_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
  //装飾3
    $value = ta_headline_init( 
      $key_name,
      'ta_sidebar_deco3',                                                     // $headline_key_name
      'simple',                                                               // $type
      '16',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '0',                                                                    // $position
      'normal',                                                               // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_bg',                                               // $color_select
      '#3f1f00',                                                              // $color
      ta_other_data( 'ta_sidebar_deco3_color_select', 'common_site_text_on_bg' ), // $linkedcolor_select
      ta_other_data( 'ta_sidebar_deco3_color', '#3f1f00' ),                   // $linkedcolor
      '5',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'invalid',                                                              // $under_onoff
      'solid',                                                                // $under_kind
      '1',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '5',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '0',                                                                    // $padding_top
      '0',                                                                    // $padding_bottom
      '0',                                                                    // $margin_top
      '14',                                                                   // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebar_deco3_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebar_deco3_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebar_deco3_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebar_deco3_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
  //装飾4
    $value = ta_headline_init( 
      $key_name,
      'ta_sidebar_deco4',                                                     // $headline_key_name
      'simple',                                                               // $type
      '16',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '0',                                                                    // $position
      'normal',                                                               // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_bg',                                               // $color_select
      '#3f1f00',                                                              // $color
      ta_other_data( 'ta_sidebar_deco4_color_select', 'common_site_text_on_bg' ), // $linkedcolor_select
      ta_other_data( 'ta_sidebar_deco4_color', '#3f1f00' ),                   // $linkedcolor
      '5',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'invalid',                                                              // $under_onoff
      'solid',                                                                // $under_kind
      '1',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '5',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '0',                                                                    // $padding_top
      '0',                                                                    // $padding_bottom
      '0',                                                                    // $margin_top
      '14',                                                                   // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebar_deco4_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebar_deco4_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebar_deco4_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebar_deco4_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
  //フリーエリア
    if ( "ta_sidebar_freearea_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_sidebar_freearea_title_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_sidebar_freearea_title_factor" == $key_name ) { return "h2"; }
    if ( "ta_sidebar_freearea_display_order" == $key_name ) { return "ASC"; }
  //最新投稿ダイジェスト（全ての投稿が対象）
    if ( "ta_sidebar_latestposts_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_sidebar_latestposts_position" == $key_name ) { return "free_b"; }
    $value = ta_top_margin_init_fixed_space( $key_name, 'ta_sidebar_latestposts' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_latestposts_detail_init(
      $key_name,
      'sidebar',                    //$place
      'valid',                      //$title_onoff
      'h2',                         //$title_factor
      '新着情報',                   //$title
      array(),                      //$nodis_cats
      5,                            //$num
      'invalid',                    //$full_content_onoff
      'none',                       //$pager_type
      10,                           //$post_distance
      1,                            //$row_num
      15,                           //$row_distance
      'b',                          //$border_type
      1,                            //$border_size
      'selectable',                 //$border_color_select
      '#aaaaaa',                    //$border_color
      'selectable',                 //$border_bgcolor_select
      'transparent',                //$border_bgcolor
      'solid',                      //$border_kind
      '0'                           //$border_padding
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_article_digest_design_init(
      $key_name,
      'sidebar_latestposts',        //$place_and_role
      'invalid',                    //$newwin_onoff
      'title-timecat',              //$ind
      'none',                       //$cg_top
      'none',                       //$cg_bottom
      'h4',                         //$post_title_factor
      'time-cat',                   //$timecat
      'valid',                      //$time_onoff
      'valid',                      //$cat_onoff
      'selectable',                 //$time_color_select
      '#aaaaaa',                    //$time_color
      90,                           //$time_size
      'normal',                     //$time_weight
      90,                           //$cat_size
      'bold',                       //$cat_weight
      2,                            //$cat_height
      6,                            //$cat_width
      '0',                          //$cat_round
      'invalid',                    //$watchmark_onoff
      'valid',                      //$cgp_onoff
      'left',                       //$img_pos
      10,                           //$img_padding
      'ta_square_image60',          //$img_size
      30,                           //$excerpt
      '0',                          //$excerpt_minheight
      '0',                          //$excerpt_tpadding
      1.2,                          //$excerpt_bpadding
      'invalid',                    //$excerpt_onlyfor_onoff
      100,                          //$excerpt_size
      'normal',                     //$excerpt_weight
      1.3,                          //$excerpt_lineheight
      'selectable',                 //$excerpt_anchor_color_select
      '#3a7fcf',                    //$excerpt_anchor_color
      'valid',                      //$excerpt_anchor_under
      'selectable',                 //$excerpt_anchor_colorhover_select
      '#66a5ed',                    //$excerpt_anchor_colorhover
      'valid',                      //$excerpt_anchor_underhover
      'f345',                       //$rightmark
      'selectable',                 //$rightmark_color_select
      '#aaaaaa',                    //$rightmark_color
      150,                          //$rightmark_size
      'bold',                       //$rightmark_weight
      10,                           //$rightmark_width
      0.6,                          //$rightmark_opacity
      1.0,                          //$rightmark_opacityhover
      'none',                       //$lowermark
      '&raquo; この記事を読む',     //$lowermark_title
      'invalid',                    //$lowermark_title_underline_onoff
      'invalid',                    //$lowermark_title_hoverunderline_onoff
      70,                           //$lowermark_title_size
      'normal',                     //$lowermark_title_weight
      'selectable',                 //$lowermark_title_color_select
      '#666666',                    //$lowermark_title_color
      'selectable',                 //$lowermark_title_colorhover_select
      '#666666',                    //$lowermark_title_colorhover
      'selectable',                 //$lowermark_bgcolor_select
      '#efefef',                    //$lowermark_bgcolor
      'selectable',                 //$lowermark_bgcolorhover_select
      '#e5e5e5',                    //$lowermark_bgcolorhover
      2,                            //$lowermark_height
      10,                           //$lowermark_minwidth
      '0',                          //$lowermark_round
      10,                           //$lowermark_paddingtop
      'valid',                      //$mark_onoff
      7,                            //$mark_days
      'no_image',                   //$mark_pic
      'NEW',                        //$mark_text
      'selectable',                 //$mark_text_color_select
      '#ffffff',                    //$mark_text_color
      'normal',                     //$mark_text_weight
      'selectable',                 //$mark_text_bgcolor_select
      '#ff4500',                    //$mark_text_bgcolor
      2,                            //$mark_text_round
      '0'                           //$mark_padding
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
  //各種投稿ダイジェスト
    if ( "ta_sidebar_postdigest_onoff" == $key_name ) { return "valid"; }
    if ( "ta_sidebar_postdigest_position" == $key_name ) { return "free_b"; }
    $value = ta_top_margin_init_fixed_space( $key_name, 'ta_sidebar_postdigest' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $categories = get_categories( 'get=all' );
    $value = ta_postdigest_detail_init(
      $key_name,
      'sidebar',                    //$place
      'valid',                      //$title_onoff
      'valid',                      //$title_link_onoff
      'h2',                         //$title_factor
      array( $categories[0]->slug ),  //$titles
      5,                            //$num
      'invalid',                    //$full_content_onoff
      'valid',                      //$catlink_onoff
      '%cat%の一覧を見る',          //$catlink_title
      'valid',                      //$catlink_title_underline_onoff
      100,                          //$catlink_title_size
      'normal',                     //$catlink_title_weight
      'selectable',                 //$catlink_title_color_select
      '#3f1f00',                    //$catlink_title_color
      'selectable',                 //$catlink_title_colorhover_select
      '#aaaaaa',                    //$catlink_title_colorhover
      'selectable',                 //$catlink_bgcolor_select
      'transparent',                //$catlink_bgcolor
      'selectable',                 //$catlink_bgcolorhover_select
      'transparent',                //$catlink_bgcolorhover
      2,                            //$catlink_height
      4,                            //$catlink_minwidth
      '0',                          //$catlink_round
      25,                           //$catlink_margintop
      'none',                       //$pager_type
      10,                           //$post_distance
      1,                            //$row_num
      10,                           //$row_distance
      'b',                          //$border_type
      1,                            //$border_size
      'selectable',                 //$border_color_select
      '#aaaaaa',                    //$border_color
      'selectable',                 //$border_bgcolor_select
      'transparent',                //$border_bgcolor
      'solid',                      //$border_kind
      10                            //$border_padding
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_article_digest_design_init(
      $key_name,
      'sidebar_postdigest',         //$place_and_role
      'invalid',                    //$newwin_onoff
      'title-timecat',              //$ind
      'none',                       //$cg_top
      'none',                       //$cg_bottom
      'h4',                         //$post_title_factor
      'time-cat',                   //$timecat
      'valid',                      //$time_onoff
      'valid',                      //$cat_onoff
      'selectable',                 //$time_color_select
      '#aaaaaa',                    //$time_color
      90,                           //$time_size
      'normal',                     //$time_weight
      90,                           //$cat_size
      'bold',                       //$cat_weight
      2,                            //$cat_height
      6,                            //$cat_width
      '0',                          //$cat_round
      'invalid',                    //$watchmark_onoff
      'valid',                      //$cgp_onoff
      'left',                       //$img_pos
      10,                           //$img_padding
      'ta_square_image60',          //$img_size
      30,                           //$excerpt
      '0',                          //$excerpt_minheight
      '0',                          //$excerpt_tpadding
      1.2,                          //$excerpt_bpadding
      'invalid',                    //$excerpt_onlyfor_onoff
      100,                          //$excerpt_size
      'normal',                     //$excerpt_weight
      1.3,                          //$excerpt_lineheight
      'selectable',                 //$excerpt_anchor_color_select
      '#3a7fcf',                    //$excerpt_anchor_color
      'valid',                      //$excerpt_anchor_under
      'selectable',                 //$excerpt_anchor_colorhover_select
      '#66a5ed',                    //$excerpt_anchor_colorhover
      'valid',                      //$excerpt_anchor_underhover
      'f345',                       //$rightmark
      'selectable',                 //$rightmark_color_select
      '#aaaaaa',                    //$rightmark_color
      150,                          //$rightmark_size
      'bold',                       //$rightmark_weight
      10,                           //$rightmark_width
      0.6,                          //$rightmark_opacity
      1.0,                          //$rightmark_opacityhover
      'none',                       //$lowermark
      '&raquo; この記事を読む',     //$lowermark_title
      'invalid',                    //$lowermark_title_underline_onoff
      'invalid',                    //$lowermark_title_hoverunderline_onoff
      70,                           //$lowermark_title_size
      'normal',                     //$lowermark_title_weight
      'selectable',                 //$lowermark_title_color_select
      '#666666',                    //$lowermark_title_color
      'selectable',                 //$lowermark_title_colorhover_select
      '#666666',                    //$lowermark_title_colorhover
      'selectable',                 //$lowermark_bgcolor_select
      '#efefef',                    //$lowermark_bgcolor
      'selectable',                 //$lowermark_bgcolorhover_select
      '#e5e5e5',                    //$lowermark_bgcolorhover
      2,                            //$lowermark_height
      10,                           //$lowermark_minwidth
      '0',                          //$lowermark_round
      10,                           //$lowermark_paddingtop
      'valid',                      //$mark_onoff
      7,                            //$mark_days
      'no_image',                   //$mark_pic
      'NEW',                        //$mark_text
      'selectable',                 //$mark_text_color_select
      '#ffffff',                    //$mark_text_color
      'normal',                     //$mark_text_weight
      'selectable',                 //$mark_text_bgcolor_select
      '#ff4500',                    //$mark_text_bgcolor
      2,                            //$mark_text_round
      '0'                           //$mark_padding
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
  //ウィジェット
    if ( "ta_sidebar_widget_onoff" == $key_name ) { return "valid"; }
    if ( "ta_sidebar_widget_title_factor" == $key_name ) { return "h2"; }
    if ( "ta_sidebar_widget_position" == $key_name ) { return "top"; }
    if ( "ta_sidebar_widget_centering" == $key_name ) { return "invalid"; }
  //サイドバーメニュー
    if ( "ta_sidebar_menu_factor1" == $key_name ) { return "none"; }
    if ( "ta_sidebar_menu_factor2" == $key_name ) { return "none"; }
    if ( "ta_sidebar_menu_factor3" == $key_name ) { return "none"; }
    if ( "ta_sidebar_menu_factor4" == $key_name ) { return "none"; }
    if ( "ta_sidebar_menu_factor5" == $key_name ) { return "none"; }
    if ( "ta_sidebar_menu_factor6" == $key_name ) { return "none"; }
    if ( "ta_sidebar_menu_factor7" == $key_name ) { return "none"; }
    if ( "ta_sidebar_menu_factor8" == $key_name ) { return "none"; }
    if ( "ta_sidebar_menu_factor9" == $key_name ) { return "none"; }
    if ( "ta_sidebar_menu_factor10" == $key_name ) { return "none"; }
  //その他
    //サイドバーコンテンツ間隔設定
    if ( "ta_sidebar_fixed_space" == $key_name ) { return ta_initdata_sel( 50, 30 ); }
    if ( "ta_sidebar_separator_size" == $key_name ) { return 1; }
    if ( "ta_sidebar_separator_kind" == $key_name ) { return 'solid'; }
    if ( "ta_sidebar_separator_kind_color_select" == $key_name ) { return 'selectable'; }
    if ( "ta_sidebar_separator_kind_color" == $key_name ) { return '#aaaaaa'; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebar_separator_kind_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    if ( "ta_sidebar_separator_tmargin" == $key_name ) { return 20; }
    if ( "ta_sidebar_separator_bmargin" == $key_name ) { return 20; }
//サブサイドバー設定メニュー
  //フレーム
    //サブサイドバーの背景色・背景画像
    if ( "ta_sidebarsub_frame_color_select" == $key_name ) { return 'selectable'; }
    if ( "ta_sidebarsub_frame_color" == $key_name ) { return 'transparent'; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebarsub_frame_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    if ( TA_HIEND_PI ) {
      $value = ta_thm001highend_arrange_height_onoff_init( 'sidebarsub', $key_name );
      if ( 'ta_no_fit' != $value ) { return $value; }
    }
    if ( TA_HIEND_PI ) {
      $value = ta_thm001highend_side_frame_init( 'sidebarsub', $key_name );
      if ( 'ta_no_fit' != $value ) { return $value; }
    }
    if ( "ta_sidebarsub_frame_padding" == $key_name ) { return 0; }
  //フォント
    if ( "ta_sidebarsub_font_size" == $key_name ) { return 90; }
    if ( "ta_sidebarsub_font_anchor_onlyfor_onoff" == $key_name ) { return 'invalid'; }
    if ( "ta_sidebarsub_font_normal_text_color_select" == $key_name ) { return 'selectable'; }
    if ( "ta_sidebarsub_font_normal_text_color" == $key_name ) { return '#3f1f00'; }
    if ( "ta_sidebarsub_font_anchor_color_select" == $key_name ) { return 'selectable'; }
    if ( "ta_sidebarsub_font_anchor_color" == $key_name ) { return '#3a7fcf'; }
    if ( "ta_sidebarsub_font_anchor_under" == $key_name ) { return 'valid'; }
    if ( "ta_sidebarsub_font_anchor_colorhover_select" == $key_name ) { return 'selectable'; }
    if ( "ta_sidebarsub_font_anchor_colorhover" == $key_name ) { return '#66a5ed'; }
    if ( "ta_sidebarsub_font_anchor_underhover" == $key_name ) { return 'valid'; }
    $value = ta_paragraph_init( $key_name, "ta_sidebarsub_font" );
    if ( 'ta_no_fit' != $value ) { return $value; }
  //h2
    $value = ta_headline_init(
      $key_name,
      'ta_sidebarsub_headline_h2',                                            // $headline_key_name
      'box',                                                                  // $type
      '16',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '5',                                                                    // $position
      'bold',                                                                 // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_hl',                                               // $color_select
      '#ffffff',                                                              // $color
      ta_other_data( 'ta_sidebarsub_headline_h2_color_select', 'common_site_text_on_hl' ), // $linkedcolor_select
      ta_other_data( 'ta_sidebarsub_headline_h2_color', '#ffffff' ),          // $linkedcolor
      '5',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'invalid',                                                              // $under_onoff
      'solid',                                                                // $under_kind
      '1',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '8',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '8',                                                                    // $padding_top
      '5',                                                                    // $padding_bottom
      '0',                                                                    // $margin_top
      '20',                                                                   // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebarsub_headline_h2_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebarsub_headline_h2_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebarsub_headline_h2_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebarsub_headline_h2_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
  //h3
    $value = ta_headline_init(
      $key_name,
      'ta_sidebarsub_headline_h3',                                            // $headline_key_name
      'left',                                                                 // $type
      '16',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '5',                                                                    // $position
      'normal',                                                               // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_bg',                                               // $color_select
      '#3f1f00',                                                              // $color
      ta_other_data( 'ta_sidebarsub_headline_h3_color_select', 'common_site_text_on_bg' ), // $linkedcolor_select
      ta_other_data( 'ta_sidebarsub_headline_h3_color', '#3f1f00' ),          // $linkedcolor
      '5',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'valid',                                                                // $under_onoff
      'solid',                                                                // $under_kind
      '3',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '5',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '3',                                                                    // $padding_top
      '3',                                                                    // $padding_bottom
      '0',                                                                    // $margin_top
      '14',                                                                   // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebarsub_headline_h3_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebarsub_headline_h3_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebarsub_headline_h3_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebarsub_headline_h3_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
  //h4
    $value = ta_headline_init(
      $key_name,
      'ta_sidebarsub_headline_h4',                                            // $headline_key_name
      'simple',                                                               // $type
      '15',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '0',                                                                    // $position
      'bold',                                                                 // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_bg',                                               // $color_select
      '#3f1f00',                                                              // $color
      ta_other_data( 'ta_sidebarsub_headline_h4_color_select', 'common_site_text_on_bg' ), // $linkedcolor_select
      ta_other_data( 'ta_sidebarsub_headline_h4_color', '#3f1f00' ),          // $linkedcolor
      '5',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'invalid',                                                              // $under_onoff
      'solid',                                                                // $under_kind
      '1',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '5',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '0',                                                                    // $padding_top
      '0',                                                                    // $padding_bottom
      '0',                                                                    // $margin_top
      '8',                                                                    // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebarsub_headline_h4_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebarsub_headline_h4_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebarsub_headline_h4_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebarsub_headline_h4_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
  //h5
    $value = ta_headline_init(
      $key_name,
      'ta_sidebarsub_headline_h5',                                            // $headline_key_name
      'simple',                                                               // $type
      '16',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '0',                                                                    // $position
      'normal',                                                               // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_bg',                                               // $color_select
      '#3f1f00',                                                              // $color
      ta_other_data( 'ta_sidebarsub_headline_h5_color_select', 'common_site_text_on_bg' ), // $linkedcolor_select
      ta_other_data( 'ta_sidebarsub_headline_h5_color', '#3f1f00' ),          // $linkedcolor
      '5',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'valid',                                                                // $under_onoff
      'solid',                                                                // $under_kind
      '1',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '5',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '0',                                                                    // $padding_top
      '0',                                                                    // $padding_bottom
      '0',                                                                    // $margin_top
      '14',                                                                   // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebarsub_headline_h5_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebarsub_headline_h5_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebarsub_headline_h5_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebarsub_headline_h5_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
  //フリーエリア
    if ( "ta_sidebarsub_freearea_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_sidebarsub_freearea_title_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_sidebarsub_freearea_title_factor" == $key_name ) { return "h2"; }
    if ( "ta_sidebarsub_freearea_display_order" == $key_name ) { return "ASC"; }
  //最新投稿ダイジェスト（全ての投稿が対象）
    if ( "ta_sidebarsub_latestposts_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_sidebarsub_latestposts_position" == $key_name ) { return "free_b"; }
    $value = ta_top_margin_init_fixed_space( $key_name, 'ta_sidebarsub_latestposts' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_latestposts_detail_init(
      $key_name,
      'sidebarsub',                 //$place
      'valid',                      //$title_onoff
      'h2',                         //$title_factor
      '新着情報',                   //$title
      array(),                      //$nodis_cats
      5,                            //$num
      'invalid',                    //$full_content_onoff
      'none',                       //$pager_type
      10,                           //$post_distance
      1,                            //$row_num
      15,                           //$row_distance
      'b',                          //$border_type
      1,                            //$border_size
      'selectable',                 //$border_color_select
      '#aaaaaa',                    //$border_color
      'selectable',                 //$border_bgcolor_select
      'transparent',                //$border_bgcolor
      'solid',                      //$border_kind
      '0'                           //$border_padding
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_article_digest_design_init(
      $key_name,
      'sidebarsub_latestposts',     //$place_and_role
      'invalid',                    //$newwin_onoff
      'title-timecat',              //$ind
      'none',                       //$cg_top
      'none',                       //$cg_bottom
      'h4',                         //$post_title_factor
      'time-cat',                   //$timecat
      'valid',                      //$time_onoff
      'valid',                      //$cat_onoff
      'selectable',                 //$time_color_select
      '#aaaaaa',                    //$time_color
      90,                           //$time_size
      'normal',                     //$time_weight
      90,                           //$cat_size
      'bold',                       //$cat_weight
      2,                            //$cat_height
      6,                            //$cat_width
      '0',                          //$cat_round
      'invalid',                    //$watchmark_onoff
      'valid',                      //$cgp_onoff
      'left',                       //$img_pos
      10,                           //$img_padding
      'ta_square_image60',          //$img_size
      30,                           //$excerpt
      '0',                          //$excerpt_minheight
      '0',                          //$excerpt_tpadding
      1.2,                          //$excerpt_bpadding
      'invalid',                    //$excerpt_onlyfor_onoff
      100,                          //$excerpt_size
      'normal',                     //$excerpt_weight
      1.3,                          //$excerpt_lineheight
      'selectable',                 //$excerpt_anchor_color_select
      '#3a7fcf',                    //$excerpt_anchor_color
      'valid',                      //$excerpt_anchor_under
      'selectable',                 //$excerpt_anchor_colorhover_select
      '#66a5ed',                    //$excerpt_anchor_colorhover
      'valid',                      //$excerpt_anchor_underhover
      'f345',                       //$rightmark
      'selectable',                 //$rightmark_color_select
      '#aaaaaa',                    //$rightmark_color
      150,                          //$rightmark_size
      'bold',                       //$rightmark_weight
      10,                           //$rightmark_width
      0.6,                          //$rightmark_opacity
      1.0,                          //$rightmark_opacityhover
      'none',                       //$lowermark
      '&raquo; この記事を読む',     //$lowermark_title
      'invalid',                    //$lowermark_title_underline_onoff
      'invalid',                    //$lowermark_title_hoverunderline_onoff
      70,                           //$lowermark_title_size
      'normal',                     //$lowermark_title_weight
      'selectable',                 //$lowermark_title_color_select
      '#666666',                    //$lowermark_title_color
      'selectable',                 //$lowermark_title_colorhover_select
      '#666666',                    //$lowermark_title_colorhover
      'selectable',                 //$lowermark_bgcolor_select
      '#efefef',                    //$lowermark_bgcolor
      'selectable',                 //$lowermark_bgcolorhover_select
      '#e5e5e5',                    //$lowermark_bgcolorhover
      2,                            //$lowermark_height
      10,                           //$lowermark_minwidth
      '0',                          //$lowermark_round
      10,                           //$lowermark_paddingtop
      'valid',                      //$mark_onoff
      7,                            //$mark_days
      'no_image',                   //$mark_pic
      'NEW',                        //$mark_text
      'selectable',                 //$mark_text_color_select
      '#ffffff',                    //$mark_text_color
      'normal',                     //$mark_text_weight
      'selectable',                 //$mark_text_bgcolor_select
      '#ff4500',                    //$mark_text_bgcolor
      2,                            //$mark_text_round
      '0'                           //$mark_padding
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
  //各種投稿ダイジェスト
    if ( "ta_sidebarsub_postdigest_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_sidebarsub_postdigest_position" == $key_name ) { return "free_b"; }
    $value = ta_top_margin_init_fixed_space( $key_name, 'ta_sidebarsub_postdigest' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_postdigest_detail_init(
      $key_name,
      'sidebarsub',                 //$place
      'valid',                      //$title_onoff
      'valid',                      //$title_link_onoff
      'h2',                         //$title_factor
      array(),                      //$titles
      5,                            //$num
      'invalid',                    //$full_content_onoff
      'valid',                      //$catlink_onoff
      '%cat%の一覧を見る',          //$catlink_title
      'valid',                      //$catlink_title_underline_onoff
      100,                          //$catlink_title_size
      'normal',                     //$catlink_title_weight
      'selectable',                 //$catlink_title_color_select
      '#3f1f00',                    //$catlink_title_color
      'selectable',                 //$catlink_title_colorhover_select
      '#aaaaaa',                    //$catlink_title_colorhover
      'selectable',                 //$catlink_bgcolor_select
      'transparent',                //$catlink_bgcolor
      'selectable',                 //$catlink_bgcolorhover_select
      'transparent',                //$catlink_bgcolorhover
      2,                            //$catlink_height
      4,                            //$catlink_minwidth
      '0',                          //$catlink_round
      25,                           //$catlink_margintop
      'none',                       //$pager_type
      10,                           //$post_distance
      1,                            //$row_num
      10,                           //$row_distance
      'b',                          //$border_type
      1,                            //$border_size
      'selectable',                 //$border_color_select
      '#aaaaaa',                    //$border_color
      'selectable',                 //$border_bgcolor_select
      'transparent',                //$border_bgcolor
      'solid',                      //$border_kind
      '0'                           //$border_padding
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_article_digest_design_init(
      $key_name,
      'sidebarsub_postdigest',      //$place_and_role
      'invalid',                    //$newwin_onoff
      'title-timecat',              //$ind
      'none',                       //$cg_top
      'none',                       //$cg_bottom
      'h4',                         //$post_title_factor
      'time-cat',                   //$timecat
      'valid',                      //$time_onoff
      'valid',                      //$cat_onoff
      'selectable',                 //$time_color_select
      '#aaaaaa',                    //$time_color
      90,                           //$time_size
      'normal',                     //$time_weight
      90,                           //$cat_size
      'bold',                       //$cat_weight
      2,                            //$cat_height
      6,                            //$cat_width
      '0',                          //$cat_round
      'invalid',                    //$watchmark_onoff
      'valid',                      //$cgp_onoff
      'left',                       //$img_pos
      10,                           //$img_padding
      'ta_square_image60',          //$img_size
      30,                           //$excerpt
      '0',                          //$excerpt_minheight
      '0',                          //$excerpt_tpadding
      1.2,                          //$excerpt_bpadding
      'invalid',                    //$excerpt_onlyfor_onoff
      100,                          //$excerpt_size
      'normal',                     //$excerpt_weight
      1.3,                          //$excerpt_lineheight
      'selectable',                 //$excerpt_anchor_color_select
      '#3a7fcf',                    //$excerpt_anchor_color
      'valid',                      //$excerpt_anchor_under
      'selectable',                 //$excerpt_anchor_colorhover_select
      '#66a5ed',                    //$excerpt_anchor_colorhover
      'valid',                      //$excerpt_anchor_underhover
      'f345',                       //$rightmark
      'selectable',                 //$rightmark_color_select
      '#aaaaaa',                    //$rightmark_color
      150,                          //$rightmark_size
      'bold',                       //$rightmark_weight
      10,                           //$rightmark_width
      0.6,                          //$rightmark_opacity
      1.0,                          //$rightmark_opacityhover
      'none',                       //$lowermark
      '&raquo; この記事を読む',     //$lowermark_title
      'invalid',                    //$lowermark_title_underline_onoff
      'invalid',                    //$lowermark_title_hoverunderline_onoff
      70,                           //$lowermark_title_size
      'normal',                     //$lowermark_title_weight
      'selectable',                 //$lowermark_title_color_select
      '#666666',                    //$lowermark_title_color
      'selectable',                 //$lowermark_title_colorhover_select
      '#666666',                    //$lowermark_title_colorhover
      'selectable',                 //$lowermark_bgcolor_select
      '#efefef',                    //$lowermark_bgcolor
      'selectable',                 //$lowermark_bgcolorhover_select
      '#e5e5e5',                    //$lowermark_bgcolorhover
      2,                            //$lowermark_height
      10,                           //$lowermark_minwidth
      '0',                          //$lowermark_round
      10,                           //$lowermark_paddingtop
      'valid',                      //$mark_onoff
      7,                            //$mark_days
      'no_image',                   //$mark_pic
      'NEW',                        //$mark_text
      'selectable',                 //$mark_text_color_select
      '#ffffff',                    //$mark_text_color
      'normal',                     //$mark_text_weight
      'selectable',                 //$mark_text_bgcolor_select
      '#ff4500',                    //$mark_text_bgcolor
      2,                            //$mark_text_round
      '0'                           //$mark_padding
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
  //ウィジェット
    if ( "ta_sidebarsub_widget_onoff" == $key_name ) { return "valid"; }
    if ( "ta_sidebarsub_widget_title_factor" == $key_name ) { return "h2"; }
    if ( "ta_sidebarsub_widget_position" == $key_name ) { return "top"; }
    if ( "ta_sidebarsub_widget_centering" == $key_name ) { return "invalid"; }
  //その他
    //サブサイドバーコンテンツ間隔設定
    if ( "ta_sidebarsub_fixed_space" == $key_name ) { return 50; }
    if ( "ta_sidebarsub_separator_size" == $key_name ) { return 1; }
    if ( "ta_sidebarsub_separator_kind" == $key_name ) { return 'solid'; }
    if ( "ta_sidebarsub_separator_kind_color_select" == $key_name ) { return 'selectable'; }
    if ( "ta_sidebarsub_separator_kind_color" == $key_name ) { return '#aaaaaa'; }
    $value = ta_gradient_color_init( $key_name, 'ta_sidebarsub_separator_kind_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    if ( "ta_sidebarsub_separator_tmargin" == $key_name ) { return 20; }
    if ( "ta_sidebarsub_separator_bmargin" == $key_name ) { return 20; }
//フッター設定メニュー
  //フレーム
    //フッターの背景色・背景画像
    if ( "ta_footer_frame_color_select" == $key_name ) { return ta_initdata_sel( 'common_site_bg', 'selectable' ); }
    if ( "ta_footer_frame_color" == $key_name ) { return ta_initdata_sel( '#ffffff', '#00c0c0' ); }
    $value = ta_gradient_color_init( $key_name, 'ta_footer_frame_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    if ( "ta_footer_frame_pic" == $key_name ) { return ta_initdata_sel( 'built_in', 'no_image' ); }
    if ( "ta_footer_frame_pic_rule" == $key_name ) { return "top_x"; }
    if ( "ta_footer_frame_pic_margin" == $key_name ) { return 0; }
    //フッターコンテンツ群先頭ラインの位置
    if ( "ta_footer_container_paddingtop" == $key_name ) { return ta_initdata_sel( 20, 0 ); }
    //フッターの位置（メイン枠への移動）
    if ( TA_HIEND_PI ) {
      $value = ta_thm001highend_footer_container2main_init( $key_name );
      if ( 'ta_no_fit' != $value ) { return $value; }
    }
  //フォント
    if ( "ta_footer_font_size" == $key_name ) { return ta_initdata_sel( 100, 90 ); }
    if ( "ta_footer_font_anchor_onlyfor_onoff" == $key_name ) { return ta_initdata_sel( 'invalid', 'valid' ); }
    if ( "ta_footer_font_normal_text_color_select" == $key_name ) { return 'selectable'; }
    if ( "ta_footer_font_normal_text_color" == $key_name ) { return ta_initdata_sel( '#3f1f00', '#444444' ); }
    if ( "ta_footer_font_anchor_color_select" == $key_name ) { return 'selectable'; }
    if ( "ta_footer_font_anchor_color" == $key_name ) { return ta_initdata_sel( '#3a7fcf', '#ffffff' ); }
    if ( "ta_footer_font_anchor_under" == $key_name ) { return 'valid'; }
    if ( "ta_footer_font_anchor_colorhover_select" == $key_name ) { return 'selectable'; }
    if ( "ta_footer_font_anchor_colorhover" == $key_name ) { return ta_initdata_sel( '#66a5ed', '#dddddd' ); }
    if ( "ta_footer_font_anchor_underhover" == $key_name ) { return 'valid'; }
    $value = ta_paragraph_init( $key_name, "ta_footer_font" );
    if ( 'ta_no_fit' != $value ) { return $value; }
  //h2
    $value = ta_headline_init(
      $key_name,
      'ta_footer_headline_h2',                                                // $headline_key_name
      'common',                                                               // $type
      '20',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '3',                                                                    // $position
      'bold',                                                                 // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_hl',                                               // $color_select
      '#ffffff',                                                              // $color
      ta_other_data( 'ta_footer_headline_h2_color_select', 'common_site_text_on_hl' ), // $linkedcolor_select
      ta_other_data( 'ta_footer_headline_h2_color', '#ffffff' ),              // $linkedcolor
      '5',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'invalid',                                                              // $under_onoff
      'solid',                                                                // $under_kind
      '1',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '10',                                                                   // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '16',                                                                   // $padding_top
      '16',                                                                   // $padding_bottom
      '0',                                                                    // $margin_top
      '27',                                                                   // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_footer_headline_h2_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_footer_headline_h2_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_footer_headline_h2_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_footer_headline_h2_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
  //h3
    $value = ta_headline_init(
      $key_name,
      'ta_footer_headline_h3',                                                // $headline_key_name
      'common',                                                               // $type
      '20',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '2',                                                                    // $position
      'bold',                                                                 // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_bg',                                               // $color_select
      '#3f1f00',                                                              // $color
      ta_other_data( 'ta_footer_headline_h3_color_select', 'common_site_text_on_bg' ), // $linkedcolor_select
      ta_other_data( 'ta_footer_headline_h3_color', '#3f1f00' ),              // $linkedcolor
      '8',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'valid',                                                                // $under_onoff
      'solid',                                                                // $under_kind
      '3',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '5',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '5',                                                                    // $padding_top
      '5',                                                                    // $padding_bottom
      '0',                                                                    // $margin_top
      '27',                                                                   // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_footer_headline_h3_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_footer_headline_h3_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_footer_headline_h3_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_footer_headline_h3_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
  //h4
    $value = ta_headline_init(
      $key_name,
      'ta_footer_headline_h4',                                                // $headline_key_name
      'common',                                                               // $type
      '18',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '2',                                                                    // $position
      'normal',                                                               // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_bg',                                               // $color_select
      '#3f1f00',                                                              // $color
      ta_other_data( 'ta_footer_headline_h4_color_select', 'common_site_text_on_bg' ), // $linkedcolor_select
      ta_other_data( 'ta_footer_headline_h4_color', '#3f1f00' ),              // $linkedcolor
      '5',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'invalid',                                                              // $under_onoff
      'solid',                                                                // $under_kind
      '1',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '5',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '0',                                                                    // $padding_top
      '0',                                                                    // $padding_bottom
      '0',                                                                    // $margin_top
      '14',                                                                   // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_footer_headline_h4_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_footer_headline_h4_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_footer_headline_h4_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_footer_headline_h4_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
  //h5
    $value = ta_headline_init(
      $key_name,
      'ta_footer_headline_h5',                                                // $headline_key_name
      'common',                                                               // $type
      '16',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '0',                                                                    // $position
      'normal',                                                               // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_bg',                                               // $color_select
      '#3f1f00',                                                              // $color
      ta_other_data( 'ta_footer_headline_h5_color_select', 'common_site_text_on_bg' ), // $linkedcolor_select
      ta_other_data( 'ta_footer_headline_h5_color', '#3f1f00' ),              // $linkedcolor
      '5',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'valid',                                                                // $under_onoff
      'solid',                                                                // $under_kind
      '1',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '5',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '0',                                                                    // $padding_top
      '0',                                                                    // $padding_bottom
      '0',                                                                    // $margin_top
      '14',                                                                   // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_footer_headline_h5_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_footer_headline_h5_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_footer_headline_h5_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_footer_headline_h5_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
  //フリーエリア
    if ( TA_HIEND_PI ) {
      $value = ta_thm001highend_footer_freearea_init( $key_name );
      if ( 'ta_no_fit' != $value ) { return $value; }
    }
  //各ブロック設定
    if ( "ta_footer_disp_group" == $key_name ) { return 'v_g2_g1'; }
    if ( "ta_footer_group1_block_title" == $key_name ) { return 'no_disp'; }
    if ( "ta_footer_group2_block_title" == $key_name ) { return 'no_disp'; }
    if ( "ta_footer_group_title_factor" == $key_name ) { return "h3"; }
    if ( "ta_footer_group1_block_size" == $key_name ) { return 60; }
    if ( "ta_footer_vertical_group1_distance" == $key_name ) { return 0; }
    if ( "ta_footer_group2_block_size" == $key_name ) { return 30; }
    if ( "ta_footer_vertical_group2_distance" == $key_name ) { return 0; }
    if ( "ta_footer_block_size_check" == $key_name ) { return "invalid"; }
  //フッター画像
    //フッター画像
    if ( "ta_footer_pic" == $key_name ) { return 'no_image'; }
    if ( "ta_footer_pic_link" == $key_name ) { return 'no_link'; }
    if ( "ta_footer_pic_link_newwin_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_footer_pic_size" == $key_name ) { return 100; }
    if ( "ta_footer_pic_text" == $key_name ) { return 'no_disp'; }
    if ( "ta_footer_pic_text_size" == $key_name ) { return 150; }
    if ( "ta_footer_pic_text_hoverunder" == $key_name ) { return "valid"; }
    if ( "ta_footer_pic_text_hoverunder2" == $key_name ) { return "valid"; }
    if ( "ta_footer_pic_text_color_select" == $key_name ) { return 'selectable'; }
    if ( "ta_footer_pic_text_color" == $key_name ) { return '#3a7fcf'; }
    if ( "ta_footer_pic_text_hover_select" == $key_name ) { return 'selectable'; }
    if ( "ta_footer_pic_text_hover" == $key_name ) { return '#66a5ed'; }
    if ( "ta_footer_pic_text_weight" == $key_name ) { return "normal"; }
    //サブフッター画像
    if ( "ta_footer_subpic" == $key_name ) { return 'no_image'; }
    if ( "ta_footer_subpic_link" == $key_name ) { return 'no_link'; }
    if ( "ta_footer_subpic_link_newwin_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_footer_subpic_size" == $key_name ) { return 50; }
  //フッターコンテンツ
    //フッターフリーテキスト
    if ( "ta_footer_freetext" == $key_name ) { return 'de集まれ株式会社　技術支援(テックエイド)部
〒215-0017 神奈川県川崎市麻生区王禅寺西
<a href="http://tec-aid.com">http://tec-aid.com</a>'; }
    //フッターメニュー
    if ( "ta_footer_menu_onoff" == $key_name ) { return "valid"; }
    if ( "ta_footer_menu_style" == $key_name ) { return "invalid"; }  //valid:縦型, invalid:横型
    $value = ta_footermenu_general_init(
      $key_name,
      'ta_footer_menu_parent',                                                        //$text_general_key_name
      '100',                                                                          //$size
      'normal',                                                                       //$weight
      'common_site_text_on_bg',                                                       //$color_select
      ta_other_data( 'ta_common_font_color', '#3f1f00' ),                             //$color
      'selectable',                                                                   //$anchor_color_select
      ta_initdata_sel( ta_other_data( 'ta_common_font_anchor_color', '#3a7fcf' ), '#ffffff' ),  //$anchor_color
      'selectable',                                                                   //$anchor_colorhover_select
      ta_initdata_sel( ta_other_data( 'ta_common_font_anchor_colorhover', '#66a5ed' ), '#dddddd' ), //$anchor_colorhover
      'invalid',                                                                      //$anchor_underonoff
      'invalid',                                                                      //$anchor_hoverunderonoff
      '10',                                                                           //$paddingtop
      '20',                                                                           //$paddingleft
      'none'                                                                          //$listmarker
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_footermenu_general_init(
      $key_name,
      'ta_footer_menu_children',                                                      //$text_general_key_name
      '90',                                                                           //$size
      'normal',                                                                       //$weight
      'common_site_text_on_bg',                                                       //$color_select
      ta_other_data( 'ta_common_font_color', '#3f1f00' ),                             //$color
      'selectable',                                                                   //$anchor_color_select
      ta_other_data( 'ta_common_font_anchor_color', '#3a7fcf' ),                      //$anchor_color
      'selectable',                                                                   //$anchor_colorhover_select
      ta_other_data( 'ta_common_font_anchor_colorhover', '#66a5ed' ),                 //$anchor_colorhover
      'invalid',                                                                      //$anchor_underonoff
      'invalid',                                                                      //$anchor_hoverunderonoff
      '10',                                                                           //$paddingtop
      '30',                                                                           //$paddingleft
      'none'                                                                          //$listmarker
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
  //ウィジェット
    if ( "ta_footer_widget_onoff" == $key_name ) { return "valid"; }
    if ( "ta_footer_widget_title_factor" == $key_name ) { return "h4"; }
    if ( "ta_footer_widget_position" == $key_name ) { return "group2-bottom"; }
    if ( "ta_footer_widget_centering" == $key_name ) { return "invalid"; }
  //コピーライト
    if ( "ta_footer_copyright_paddingtop" == $key_name ) { return 20; }
    if ( "ta_footer_copyright_paddingbottom" == $key_name ) { return 0; }
    if ( "ta_footer_copyright_title" == $key_name ) { return "Copyright &copy; ". get_bloginfo('name') . " All rights reserved."; }
    if ( "ta_footer_copyright_position" == $key_name ) { return "center"; }
    if ( "ta_footer_copyright_title_size" == $key_name ) { return 75; }
    if ( "ta_footer_copyright_title_weight" == $key_name ) { return "normal"; }
    if ( "ta_footer_copyright_title_color_select" == $key_name ) { return ta_initdata_sel( 'selectable', 'common_site_text_on_bg' ); }
    if ( "ta_footer_copyright_title_color" == $key_name ) { return '#999999'; }
    if ( "ta_footer_copyright_bg_color_select" == $key_name ) { return "selectable"; }
    if ( "ta_footer_copyright_bg_color" == $key_name ) { return "transparent"; }
    if ( "ta_footer_copyright_padding" == $key_name ) { return 10; }
    if ( "ta_footer_copyright_border_size" == $key_name ) { return ta_initdata_sel( 1, 0 ); }
    if ( "ta_footer_copyright_border_color_select" == $key_name ) { return "selectable"; }
    if ( "ta_footer_copyright_border_color" == $key_name ) { return "#dfdfdf"; }
  //その他
    if ( "ta_footer_fixed_space" == $key_name ) { return 15; }
//レスポンシブデザイン
  //基本設定
    if ( "ta_responsible_base_onoff" == $key_name ) { return "valid"; }
    if ( "ta_responsible_base_sidebar_onoff" == $key_name ) { return "valid"; }
    if ( "ta_responsible_base_sidebarsub_onoff" == $key_name ) { return "valid"; }
    if ( "ta_responsible_base_switch_width" == $key_name ) { return 640; }
    if ( "ta_responsible_base_width_w_padding" == $key_name ) { return 94; }
  //アディショナルモード設定
    if ( TA_HIEND_PI ) {
      $value = ta_thm001highend_additional_mode_init( $key_name );
      if ( 'ta_no_fit' != $value ) { return $value; }
    }
  //レスポンシブデザイン有効時のviewport設定
    if ( "ta_responsible_viewport_onoff" == $key_name ) { return "valid"; }
    if ( "ta_responsible_viewport_width" == $key_name ) { return 0; }
    if ( "ta_responsible_viewport_init_scale" == $key_name ) { return '1.0'; }
    if ( "ta_responsible_viewport_min_scale" == $key_name ) { return -1; }
    if ( "ta_responsible_viewport_max_scale" == $key_name ) { return -1; }
    if ( "ta_responsible_viewport_scalable" == $key_name ) { return 'yes'; }
  //背景
    //レスポンシブデザイン時のトップページフレーム外背景色・背景画像
    if ( "ta_responsible_top_outframe_color_select" == $key_name ) { return ta_other_data( 'ta_common_top_outframe_color_select', 'common_site_bg' ); }
    if ( "ta_responsible_top_outframe_color" == $key_name ) { return ta_other_data( 'ta_common_top_outframe_color', '#fffff5' ); }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_top_outframe_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    if ( "ta_responsible_top_outframe_pic" == $key_name ) { return "no_image"; }
    if ( "ta_responsible_top_outframe_pic_rule" == $key_name ) { return "top_x"; }
    if ( "ta_responsible_top_outframe_pic_margin" == $key_name ) { return 0; }
    $value = ta_bg_bar_init( $key_name, 'ta_responsible_top_outframe', 'top' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_bg_bar_init( $key_name, 'ta_responsible_top_outframe', 'bottom' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_bg_bar_init( $key_name, 'ta_responsible_top_outframe', 'free' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    //レスポンシブデザイン時のトップページ以外ページのフレーム外背景色・背景画像
    if ( "ta_responsible_outframe_color_select" == $key_name ) { return ta_other_data( 'ta_common_outframe_color_select', 'common_site_bg' ); }
    if ( "ta_responsible_outframe_color" == $key_name ) { return ta_other_data( 'ta_common_outframe_color', '#fffff5' ); }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_outframe_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    if ( "ta_responsible_outframe_pic" == $key_name ) { return "no_image"; }
    if ( "ta_responsible_outframe_pic_rule" == $key_name ) { return "top_x"; }
    if ( "ta_responsible_outframe_pic_margin" == $key_name ) { return 0; }
    $value = ta_bg_bar_init( $key_name, 'ta_responsible_outframe', 'top' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_bg_bar_init( $key_name, 'ta_responsible_outframe', 'bottom' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_bg_bar_init( $key_name, 'ta_responsible_outframe', 'free' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    //レスポンシブデザイン時のヘッダーの背景色・背景画像
    if ( "ta_responsible_header_frame_color_select" == $key_name ) { return ta_other_data( 'ta_header_frame_color_select', 'selectable' ); }
    if ( "ta_responsible_header_frame_color" == $key_name ) { return ta_other_data( 'ta_header_frame_color', 'transparent' ); }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_header_frame_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    if ( "ta_responsible_header_frame_pic" == $key_name ) { return "no_image"; }
    if ( "ta_responsible_header_frame_pic_rule" == $key_name ) { return "top_x"; }
    if ( "ta_responsible_header_frame_pic_margin" == $key_name ) { return 0; }
    //レスポンシブデザイン時のメインコンテンツの背景色・背景画像
    if ( "ta_responsible_main_frame_color_select" == $key_name ) { return ta_other_data( 'ta_main_frame_color_select', 'selectable' ); }
    if ( "ta_responsible_main_frame_color" == $key_name ) { return ta_other_data( 'ta_main_frame_color', 'transparent' ); }
    if ( TA_HIEND_PI ) {
      $value = ta_thm001highend_responsible_frame_init( 'main', $key_name );
      if ( 'ta_no_fit' != $value ) { return $value; }
    }
    //レスポンシブデザイン時のサイドバーの背景色・背景画像
    if ( "ta_responsible_sidebar_frame_color_select" == $key_name ) { return ta_other_data( 'ta_sidebar_frame_color_select', 'selectable' ); }
    if ( "ta_responsible_sidebar_frame_color" == $key_name ) { return ta_other_data( 'ta_sidebar_frame_color', 'transparent' ); }
    if ( TA_HIEND_PI ) {
      $value = ta_thm001highend_responsible_frame_init( 'sidebar', $key_name );
      if ( 'ta_no_fit' != $value ) { return $value; }
    }
    //レスポンシブデザイン時のサブサイドバーの背景色・背景画像
    if ( "ta_responsible_sidebarsub_frame_color_select" == $key_name ) { return ta_other_data( 'ta_sidebarsub_frame_color_select', 'selectable' ); }
    if ( "ta_responsible_sidebarsub_frame_color" == $key_name ) { return ta_other_data( 'ta_sidebarsub_frame_color', 'transparent' ); }
    if ( TA_HIEND_PI ) {
      $value = ta_thm001highend_responsible_frame_init( 'sidebarsub', $key_name );
      if ( 'ta_no_fit' != $value ) { return $value; }
    }
    //レスポンシブデザイン時のフッター背景色・背景画像
    if ( "ta_responsible_footer_frame_color_select" == $key_name ) { return ta_other_data( 'ta_footer_frame_color_select', ta_initdata_sel( 'common_site_bg', 'selectable' ) ); }
    if ( "ta_responsible_footer_frame_color" == $key_name ) { return ta_other_data( 'ta_footer_frame_color', ta_initdata_sel( '#ffffff', '#00c0c0' ) ); }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_footer_frame_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    if ( "ta_responsible_footer_frame_pic" == $key_name ) { return ta_initdata_sel( 'built_in', 'no_image' ); }
    if ( "ta_responsible_footer_frame_pic_rule" == $key_name ) { return "top_x"; }
    if ( "ta_responsible_footer_frame_pic_margin" == $key_name ) { return 0; }
  //ヘッダー
    //ヘッダーのレスポンシブデザイン設定
    if ( "ta_responsible_header_onoff" == $key_name ) { return "valid"; }
    if ( "ta_responsible_header_font_size" == $key_name ) { return 80; }
    $value = ta_paragraph_init( $key_name, "ta_responsible_header_font" );
    if ( 'ta_no_fit' != $value ) { return $value; }
    if ( "ta_responsible_header_top_margin" == $key_name ) { return ta_initdata_sel( 30, 0 ); }
    if ( "ta_responsible_header_bottom_margin" == $key_name ) { return 10; }
    if ( "ta_responsible_header_logoarea_onoff" == $key_name ) { return "valid"; }
    $value = ta_responsible_detail_init( $key_name, 'ta_responsible_header_logoarea_h1', 'valid', '120', 'center', 'invalid', '0', '0', '0' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    if ( "ta_responsible_header_logoarea_h1_color_select" == $key_name ) { return ta_other_data( 'ta_header_h1_content_color_select', 'selectable' ); }
    if ( "ta_responsible_header_logoarea_h1_color" == $key_name ) { return ta_other_data( 'ta_header_h1_content_color', ta_initdata_sel( '#828282', '#ffffff' ) ); }
    if ( "ta_responsible_header_logoarea_h1_fontweight" == $key_name ) { return ta_other_data( 'ta_header_h1_content_color_fontweight', 'normal' ); }
    if ( "ta_responsible_header_logoarea_h1_anchor_color_select" == $key_name ) { return ta_other_data( 'ta_header_h1_content_anchor_color_select', 'selectable' ); }
    if ( "ta_responsible_header_logoarea_h1_anchor_color" == $key_name ) { return ta_other_data( 'ta_header_h1_content_anchor_color', ta_initdata_sel( '#828282', '#ffffff' ) ); }
    if ( "ta_responsible_header_logoarea_h1_anchor_under" == $key_name ) { return ta_other_data( 'ta_header_h1_content_anchor_under', 'invalid' ); }
    if ( "ta_responsible_header_logoarea_h1_anchor_colorhover_select" == $key_name ) { return ta_other_data( 'ta_header_h1_content_anchor_colorhover_select', 'selectable' ); }
    if ( "ta_responsible_header_logoarea_h1_anchor_colorhover" == $key_name ) { return ta_other_data( 'ta_header_h1_content_anchor_colorhover', ta_initdata_sel( '#b2b2b2', '#dddddd' ) ); }
    if ( "ta_responsible_header_logoarea_h1_anchor_underhover" == $key_name ) { return ta_other_data( 'ta_header_h1_content_anchor_underhover', 'invalid' ); }
    $value = ta_responsible_detail_init( $key_name, 'ta_responsible_header_logoarea_img', 'valid', '200', 'center', 'invalid', '10', '10', '0' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    if ( "ta_responsible_header_logoarea_img_fontweight" == $key_name ) { return ta_other_data( 'ta_header_logo_text_fontweight', 'bold' ); }
    if ( "ta_responsible_header_logoarea_img_text_color_select" == $key_name ) { return ta_other_data( 'ta_header_logo_text_color_select', 'selectable' ); }
    if ( "ta_responsible_header_logoarea_img_text_color" == $key_name ) { return ta_other_data( 'ta_header_logo_text_color', '#ffb76f' ); }
    if ( "ta_responsible_header_logoarea_img_text_under" == $key_name ) { return ta_other_data( 'ta_header_logo_text_under_onoff', 'invalid' ); }
    if ( "ta_responsible_header_logoarea_img_text_colorhover_select" == $key_name ) { return ta_other_data( 'ta_header_logo_text_hover_select', 'selectable' ); }
    if ( "ta_responsible_header_logoarea_img_text_colorhover" == $key_name ) { return ta_other_data( 'ta_header_logo_text_hover', '#aaaaaa' ); }
    if ( "ta_responsible_header_logoarea_img_text_underhover" == $key_name ) { return ta_other_data( 'ta_header_logo_text_hoverunder_onoff', 'invalid' ); }
    if ( "ta_responsible_header_infoarea_onoff" == $key_name ) { return "valid"; }
    $value = ta_responsible_detail_init( $key_name, 'ta_responsible_header_infoarea_img', 'valid', '200', 'center', 'invalid', ta_initdata_sel( '0', '10' ), ta_initdata_sel( '0', '5' ), '0' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    if ( "ta_responsible_header_infoarea_img_fontweight" == $key_name ) { return ta_other_data( 'ta_header_info_text_fontweight', ta_initdata_sel( 'bold', 'normal' ) ); }
    if ( "ta_responsible_header_infoarea_img_text_color_select" == $key_name ) { return ta_other_data( 'ta_header_info_text_color_select', 'selectable' ); }
    if ( "ta_responsible_header_infoarea_img_text_color" == $key_name ) { return ta_other_data( 'ta_header_info_text_color', ta_initdata_sel( '#68b4ff', '#3f1f00' ) ); }
    if ( "ta_responsible_header_infoarea_img_text_under" == $key_name ) { return ta_other_data( 'ta_header_info_text_under_onoff', 'invalid' ); }
    if ( "ta_responsible_header_infoarea_img_text_colorhover_select" == $key_name ) { return ta_other_data( 'ta_header_info_text_hover_select', 'selectable' ); }
    if ( "ta_responsible_header_infoarea_img_text_colorhover" == $key_name ) { return ta_other_data( 'ta_header_info_text_hover', '#aaaaaa' ); }
    if ( "ta_responsible_header_infoarea_img_text_underhover" == $key_name ) { return ta_other_data( 'ta_header_info_text_hoverunder_onoff', 'invalid' ); }
    $value = ta_responsible_detail_init( $key_name, 'ta_responsible_header_infoarea_menu', 'valid', '100', 'center', 'invalid', '0', '0', '0' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    if ( "ta_responsible_header_infoarea_menu_fontweight" == $key_name ) { return ta_other_data( 'ta_header_info_simplemenu_fontweight', 'normal' ); }
    if ( "ta_responsible_header_infoarea_menu_text_color_select" == $key_name ) { return ta_other_data( 'ta_header_info_simplemenu_color_select', 'selectable' ); }
    if ( "ta_responsible_header_infoarea_menu_text_color" == $key_name ) { return ta_other_data( 'ta_header_info_simplemenu_color', '#3f1f00' ); }
    if ( "ta_responsible_header_infoarea_menu_text_under" == $key_name ) { return ta_other_data( 'ta_header_info_simplemenu_underline_onoff', 'invalid' ); }
    if ( "ta_responsible_header_infoarea_menu_text_colorhover_select" == $key_name ) { return ta_other_data( 'ta_header_info_simplemenu_colorhover_select', 'selectable' ); }
    if ( "ta_responsible_header_infoarea_menu_text_colorhover" == $key_name ) { return ta_other_data( 'ta_header_info_simplemenu_colorhover', '#aaaaaa' ); }
    if ( "ta_responsible_header_infoarea_menu_text_underhover" == $key_name ) { return ta_other_data( 'ta_header_info_simplemenu_hoverunderline_onoff', 'invalid' ); }
    $value = ta_responsible_detail_init( $key_name, 'ta_responsible_header_infoarea_sns', 'valid', '100', 'center', 'invalid', '0', '0', '0' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    if ( "ta_responsible_header_searcharea_onoff" == $key_name ) { return "valid"; }
    $value = ta_responsible_detail_init( $key_name, 'ta_responsible_header_searcharea_search', 'valid', '100', 'center', 'invalid', '10', '0', '0' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    if ( "ta_responsible_header_searcharea_search_width" == $key_name ) { return 50; }
    $value = ta_responsible_detail_init( $key_name, 'ta_responsible_header_searcharea_menu', 'invalid', '100', 'center', 'invalid', '0', '0', '0' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    if ( "ta_responsible_header_searcharea_menu_fontweight" == $key_name ) { return ta_other_data( 'ta_header_search_simplemenu_fontweight', 'normal' ); }
    if ( "ta_responsible_header_searcharea_menu_text_color_select" == $key_name ) { return ta_other_data( 'ta_header_search_simplemenu_color_select', 'selectable' ); }
    if ( "ta_responsible_header_searcharea_menu_text_color" == $key_name ) { return ta_other_data( 'ta_header_search_simplemenu_color', ta_initdata_sel( '#3f1f00', '#ffffff' ) ); }
    if ( "ta_responsible_header_searcharea_menu_text_under" == $key_name ) { return ta_other_data( 'ta_header_search_simplemenu_underline_onoff', 'invalid' ); }
    if ( "ta_responsible_header_searcharea_menu_text_colorhover_select" == $key_name ) { return ta_other_data( 'ta_header_search_simplemenu_colorhover_select', 'selectable' ); }
    if ( "ta_responsible_header_searcharea_menu_text_colorhover" == $key_name ) { return ta_other_data( 'ta_header_search_simplemenu_colorhover', ta_initdata_sel( '#aaaaaa', '#dddddd' ) ); }
    if ( "ta_responsible_header_searcharea_menu_text_underhover" == $key_name ) { return ta_other_data( 'ta_header_search_simplemenu_hoverunderline_onoff', 'invalid' ); }
    $value = ta_responsible_detail_init( $key_name, 'ta_responsible_header_searcharea_sns', 'valid', '100', 'center', 'invalid', ta_initdata_sel( '5', '10' ), ta_initdata_sel( '0', '5' ), '0' );
    if ( 'ta_no_fit' != $value ) { return $value; }
  //グローバルメニュー
  //グローバルナビのレスポンシブデザイン設定
    if ( "ta_responsible_glbnavi_onoff" == $key_name ) { return "valid"; }
    if ( "ta_responsible_glbnavi_top_margin" == $key_name ) { return 20; }
    if ( "ta_responsible_glbnavi_bottom_margin" == $key_name ) { return 10; }
    if ( "ta_responsible_glbnavi_w_padding_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_responsible_glbnavi_text_size_ratio" == $key_name ) { return 80; }
    if ( "ta_responsible_glbnavi_height_size_ratio" == $key_name ) { return 80; }
    if ( "ta_responsible_glbnavi_vertical_onoff" == $key_name ) { return "valid"; }
    //メニューボックスのレスポンシブデザイン設定
    if ( "ta_responsible_glbnavi_menubox_text" == $key_name ) { return "MENU"; }
    if ( "ta_responsible_glbnavi_menubox_anchor_color_select" == $key_name ) { return "selectable"; }
    if ( "ta_responsible_glbnavi_menubox_anchor_color" == $key_name ) { return "#ffffff"; }
    if ( "ta_responsible_glbnavi_menubox_box_color_select" == $key_name ) { return "selectable"; }
    if ( "ta_responsible_glbnavi_menubox_box_color" == $key_name ) { return ta_initdata_sel( '#3f1f00', '#00c0c0' ); }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_glbnavi_menubox_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    if ( "ta_responsible_glbnavi_menubox_size" == $key_name ) { return 140; }
    if ( "ta_responsible_glbnavi_menubox_weight" == $key_name ) { return "bold"; }
    if ( "ta_responsible_glbnavi_menubox_w_padding_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_responsible_glbnavi_menubox_position" == $key_name ) { return "center"; }
    if ( "ta_responsible_glbnavi_menubox_edge_margin" == $key_name ) { return 0; }
    if ( "ta_responsible_glbnavi_menubox_height" == $key_name ) { return 10; }
    if ( "ta_responsible_glbnavi_menubox_anchor_colorhover_select" == $key_name ) { return "selectable"; }
    if ( "ta_responsible_glbnavi_menubox_anchor_colorhover" == $key_name ) { return ta_initdata_sel( '#e2ffe2', '#ffffff' ); }
    if ( "ta_responsible_glbnavi_menubox_box_colorhover_select" == $key_name ) { return "selectable"; }
    if ( "ta_responsible_glbnavi_menubox_box_colorhover" == $key_name ) { return ta_initdata_sel( '#3f1f00', '#ff69b4' ); }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_glbnavi_menubox_box_colorhover' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    //メインメニューのレスポンシブデザイン設定
    if ( "ta_responsible_glbnavi_mainmenu_height" == $key_name ) { return 5; }
    if ( "ta_responsible_glbnavi_mainmenu_marker_before_text" == $key_name ) { return "&#xbb;　"; }
    if ( "ta_responsible_glbnavi_mainmenu_menubar_ratio" == $key_name ) { return 100; }
    if ( "ta_responsible_glbnavi_mainmenu_fontsize" == $key_name ) { return ta_other_data( 'ta_header_glabalmenu_fontsize', '16' ); }
    if ( "ta_responsible_glbnavi_mainmenu_fontweight" == $key_name ) { return ta_other_data( 'ta_header_glabalmenu_fontweight', 'normal' ); }
    if ( "ta_responsible_glbnavi_mainmenu_fontcolor_select" == $key_name ) { return ta_other_data( 'ta_header_glabalmenu_fontcolor_select', 'selectable' ); }
    if ( "ta_responsible_glbnavi_mainmenu_fontcolor" == $key_name ) { return ta_other_data( 'ta_header_glabalmenu_fontcolor', '#666666' ); }
    if ( "ta_responsible_glbnavi_mainmenu_fontcolorhover_select" == $key_name ) { return ta_other_data( 'ta_header_glabalmenu_fontcolorhover_select', 'selectable' ); }
    if ( "ta_responsible_glbnavi_mainmenu_fontcolorhover" == $key_name ) { return ta_other_data( 'ta_header_glabalmenu_fontcolorhover', ta_initdata_sel( '#999999', '#ffffff' ) ); }
    if ( "ta_responsible_glbnavi_mainmenu_backcolor_select" == $key_name ) { return ta_other_data( 'ta_header_glabalmenu_backcolor_select', 'selectable' ); }
    if ( "ta_responsible_glbnavi_mainmenu_backcolor" == $key_name ) { return ta_other_data( 'ta_header_glabalmenu_backcolor', ta_initdata_sel( '#f0efeb', 'transparent' ) ); }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_glbnavi_mainmenu_backcolor' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    if ( "ta_responsible_glbnavi_mainmenu_backcolorhover_select" == $key_name ) { return ta_other_data( 'ta_header_glabalmenu_backcolorhover_select', 'selectable' ); }
    if ( "ta_responsible_glbnavi_mainmenu_backcolorhover" == $key_name ) { return ta_other_data( 'ta_header_glabalmenu_backcolorhover', ta_initdata_sel( '#e8e8e3', '#ff69b4' ) ); }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_glbnavi_mainmenu_backcolorhover' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    if ( "ta_responsible_glbnavi_mainmenu_position" == $key_name ) { return "left"; }
    if ( "ta_responsible_glbnavi_mainmenu_edge_margin" == $key_name ) { return 2; }
    //サブメニューのレスポンシブデザイン設定
    if ( "ta_responsible_glbnavi_submenu_height" == $key_name ) { return 5; }
    if ( "ta_responsible_glbnavi_submenu_marker_before_text" == $key_name ) { return "&#xbb;&#xbb;　"; }
    if ( "ta_responsible_glbnavi_submenu_menubar_ratio" == $key_name ) { return 98; }
    if ( "ta_responsible_glbnavi_submenu_fontsize" == $key_name ) { return ta_other_data( 'ta_header_glabalsubmenu_fontsize', '14' ); }
    if ( "ta_responsible_glbnavi_submenu_fontweight" == $key_name ) { return ta_other_data( 'ta_header_glabalsubmenu_fontweight', 'normal' ); }
    if ( "ta_responsible_glbnavi_submenu_fontcolor_select" == $key_name ) { return ta_other_data( 'ta_header_glabalsubmenu_fontcolor_select', 'selectable' ); }
    if ( "ta_responsible_glbnavi_submenu_fontcolor" == $key_name ) { return ta_other_data( 'ta_header_glabalsubmenu_fontcolor', ta_initdata_sel( '#000000', '#666666' ) ); }
    if ( "ta_responsible_glbnavi_submenu_fontcolorhover_select" == $key_name ) { return ta_other_data( 'ta_header_glabalsubmenu_fontcolorhover_select', 'selectable' ); }
    if ( "ta_responsible_glbnavi_submenu_fontcolorhover" == $key_name ) { return ta_other_data( 'ta_header_glabalsubmenu_fontcolorhover', ta_initdata_sel( '#000000', '#ffffff' ) ); }
    if ( "ta_responsible_glbnavi_submenu_backcolor_select" == $key_name ) { return ta_other_data( 'ta_header_glabalsubmenu_backcolor_select', 'selectable' ); }
    if ( "ta_responsible_glbnavi_submenu_backcolor" == $key_name ) { return ta_other_data( 'ta_header_glabalsubmenu_backcolor', ta_initdata_sel( '#e2ffe2', '#ffedff' ) ); }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_glbnavi_submenu_backcolor' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    if ( "ta_responsible_glbnavi_submenu_backcolorhover_select" == $key_name ) { return ta_other_data( 'ta_header_glabalsubmenu_backcolorhover_select', 'selectable' ); }
    if ( "ta_responsible_glbnavi_submenu_backcolorhover" == $key_name ) { return ta_other_data( 'ta_header_glabalsubmenu_backcolorhover', ta_initdata_sel( '#e8e8e3', '#ff69b4' ) ); }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_glbnavi_submenu_backcolorhover' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    if ( "ta_responsible_glbnavi_submenu_position" == $key_name ) { return "left"; }
    if ( "ta_responsible_glbnavi_submenu_edge_margin" == $key_name ) { return 2; }
  //ヘッダー画像
    if ( "ta_responsible_headerimg_onoff" == $key_name ) { return 'valid'; }
    if ( "ta_responsible_headerimg_w_padding_onoff" == $key_name ) { return 'valid'; }
    if ( "ta_responsible_headerimg_top_margin" == $key_name ) { return 5; }
    if ( "ta_responsible_headerimg_bottom_margin" == $key_name ) { return 0; }
    if ( "ta_responsible_headerimg_text_onoff" == $key_name ) { return 'invalid'; }
    if ( "ta_responsible_headerimg_fontsize" == $key_name ) { return ta_other_data( 'ta_header_headimg_fontsize', '30' ); }
    if ( "ta_responsible_headerimg_fontweight" == $key_name ) { return ta_other_data( 'ta_header_headimg_fontweight', 'normal' ); }
    if ( "ta_responsible_headerimg_position_x" == $key_name ) { return ta_other_data( 'ta_header_headimg_position_x', '5' ); }
    if ( "ta_responsible_headerimg_position_y" == $key_name ) { return ta_other_data( 'ta_header_headimg_position_y', '40' ); }
  //メイン
    if ( "ta_responsible_top_topcatch_tate_onoff" == $key_name ) { return 'valid'; }
    if ( "ta_responsible_top_topcatch_img_width" == $key_name ) { return 60; }
    if ( TA_HIEND_PI ) {
      $value = ta_thm001highend_responsible_imgexp_menu_init( $key_name );
      if ( 'ta_no_fit' != $value ) { return $value; }
    }
    if ( "ta_responsible_main_top_latestposts_onoff" == $key_name ) { return 'valid'; }
    if ( "ta_responsible_main_top_postdigest_onoff" == $key_name ) { return 'valid'; }
    if ( "ta_responsible_main_top_widgetarea_onoff" == $key_name ) { return 'valid'; }
    if ( "ta_responsible_main_top_widgetarea_centering" == $key_name ) { return 'valid'; }
    if ( "ta_responsible_top_fixed_space" == $key_name ) { return 20; }
    if ( "ta_responsible_main_fixed_space" == $key_name ) { return 20; }
    if ( "ta_responsible_main_font_size" == $key_name ) { return 80; }
    $value = ta_paragraph_init( $key_name, "ta_responsible_main_font" );
    if ( 'ta_no_fit' != $value ) { return $value; }
    if ( "ta_responsible_main_bread_size2common" == $key_name ) { return ta_initdata_sel( 100, 120 ); }
    //h2
    if ( "ta_responsible_main_h2_senyo_onoff" == $key_name ) { return 'invalid'; }
    if ( "ta_responsible_main_h2_size2common" == $key_name ) { return 120; }
    $value = ta_headline_init( 
      $key_name,
      'ta_responsible_main_h2',                                               // $headline_key_name
      'simple',                                                               // $type
      '16',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '0',                                                                    // $position
      'normal',                                                               // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_bg',                                               // $color_select
      '#3f1f00',                                                              // $color
      ta_other_data( 'ta_responsible_main_h2_color_select', 'common_site_text_on_bg' ), // $linkedcolor_select
      ta_other_data( 'ta_responsible_main_h2_color', '#3f1f00' ),             // $linkedcolor
      '5',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'invalid',                                                              // $under_onoff
      'solid',                                                                // $under_kind
      '1',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '5',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '0',                                                                    // $padding_top
      '0',                                                                    // $padding_bottom
      '0',                                                                    // $margin_top
      '14',                                                                   // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_main_h2_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_main_h2_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_main_h2_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_main_h2_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    //h3
    if ( "ta_responsible_main_h3_senyo_onoff" == $key_name ) { return 'invalid'; }
    if ( "ta_responsible_main_h3_size2common" == $key_name ) { return 110; }
    $value = ta_headline_init( 
      $key_name,
      'ta_responsible_main_h3',                                               // $headline_key_name
      'simple',                                                               // $type
      '16',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '0',                                                                    // $position
      'normal',                                                               // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_bg',                                               // $color_select
      '#3f1f00',                                                              // $color
      ta_other_data( 'ta_responsible_main_h3_color_select', 'common_site_text_on_bg' ), // $linkedcolor_select
      ta_other_data( 'ta_responsible_main_h3_color', '#3f1f00' ),             // $linkedcolor
      '5',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'invalid',                                                              // $under_onoff
      'solid',                                                                // $under_kind
      '1',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '5',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '0',                                                                    // $padding_top
      '0',                                                                    // $padding_bottom
      '0',                                                                    // $margin_top
      '14',                                                                   // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_main_h3_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_main_h3_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_main_h3_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_main_h3_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    //h4
    if ( "ta_responsible_main_h4_senyo_onoff" == $key_name ) { return 'invalid'; }
    if ( "ta_responsible_main_h4_size2common" == $key_name ) { return 100; }
    $value = ta_headline_init( 
      $key_name,
      'ta_responsible_main_h4',                                               // $headline_key_name
      'simple',                                                               // $type
      '16',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '0',                                                                    // $position
      'normal',                                                               // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_bg',                                               // $color_select
      '#3f1f00',                                                              // $color
      ta_other_data( 'ta_responsible_main_h4_color_select', 'common_site_text_on_bg' ), // $linkedcolor_select
      ta_other_data( 'ta_responsible_main_h4_color', '#3f1f00' ),             // $linkedcolor
      '5',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'invalid',                                                              // $under_onoff
      'solid',                                                                // $under_kind
      '1',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '5',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '0',                                                                    // $padding_top
      '0',                                                                    // $padding_bottom
      '0',                                                                    // $margin_top
      '14',                                                                   // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_main_h4_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_main_h4_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_main_h4_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_main_h4_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    //h5
    if ( "ta_responsible_main_h5_senyo_onoff" == $key_name ) { return 'invalid'; }
    if ( "ta_responsible_main_h5_size2common" == $key_name ) { return 100; }
    $value = ta_headline_init( 
      $key_name,
      'ta_responsible_main_h5',                                               // $headline_key_name
      'simple',                                                               // $type
      '16',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '0',                                                                    // $position
      'normal',                                                               // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_bg',                                               // $color_select
      '#3f1f00',                                                              // $color
      ta_other_data( 'ta_responsible_main_h5_color_select', 'common_site_text_on_bg' ), // $linkedcolor_select
      ta_other_data( 'ta_responsible_main_h5_color', '#3f1f00' ),             // $linkedcolor
      '5',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'invalid',                                                              // $under_onoff
      'solid',                                                                // $under_kind
      '1',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '5',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '0',                                                                    // $padding_top
      '0',                                                                    // $padding_bottom
      '0',                                                                    // $margin_top
      '14',                                                                   // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_main_h5_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_main_h5_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_main_h5_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_main_h5_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    //装飾1
    if ( "ta_responsible_main_deco1_senyo_onoff" == $key_name ) { return 'invalid'; }
    if ( "ta_responsible_main_deco1_size2common" == $key_name ) { return 100; }
    $value = ta_headline_init( 
      $key_name,
      'ta_responsible_main_deco1',                                            // $headline_key_name
      'simple',                                                               // $type
      '16',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '0',                                                                    // $position
      'normal',                                                               // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_bg',                                               // $color_select
      '#3f1f00',                                                              // $color
      ta_other_data( 'ta_responsible_main_deco1_color_select', 'common_site_text_on_bg' ), // $linkedcolor_select
      ta_other_data( 'ta_responsible_main_deco1_color', '#3f1f00' ),          // $linkedcolor
      '5',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'invalid',                                                              // $under_onoff
      'solid',                                                                // $under_kind
      '1',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '5',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '0',                                                                    // $padding_top
      '0',                                                                    // $padding_bottom
      '0',                                                                    // $margin_top
      '14',                                                                   // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_main_deco1_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_main_deco1_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_main_deco1_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_main_deco1_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    //装飾2
    if ( "ta_responsible_main_deco2_senyo_onoff" == $key_name ) { return 'invalid'; }
    if ( "ta_responsible_main_deco2_size2common" == $key_name ) { return 100; }
    $value = ta_headline_init( 
      $key_name,
      'ta_responsible_main_deco2',                                            // $headline_key_name
      'simple',                                                               // $type
      '16',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '0',                                                                    // $position
      'normal',                                                               // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_bg',                                               // $color_select
      '#3f1f00',                                                              // $color
      ta_other_data( 'ta_responsible_main_deco2_color_select', 'common_site_text_on_bg' ), // $linkedcolor_select
      ta_other_data( 'ta_responsible_main_deco2_color', '#3f1f00' ),          // $linkedcolor
      '5',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'invalid',                                                              // $under_onoff
      'solid',                                                                // $under_kind
      '1',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '5',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '0',                                                                    // $padding_top
      '0',                                                                    // $padding_bottom
      '0',                                                                    // $margin_top
      '14',                                                                   // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_main_deco2_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_main_deco2_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_main_deco2_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_main_deco2_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    //装飾3
    if ( "ta_responsible_main_deco3_senyo_onoff" == $key_name ) { return 'invalid'; }
    if ( "ta_responsible_main_deco3_size2common" == $key_name ) { return 100; }
    $value = ta_headline_init( 
      $key_name,
      'ta_responsible_main_deco3',                                            // $headline_key_name
      'simple',                                                               // $type
      '16',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '0',                                                                    // $position
      'normal',                                                               // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_bg',                                               // $color_select
      '#3f1f00',                                                              // $color
      ta_other_data( 'ta_responsible_main_deco3_color_select', 'common_site_text_on_bg' ), // $linkedcolor_select
      ta_other_data( 'ta_responsible_main_deco3_color', '#3f1f00' ),          // $linkedcolor
      '5',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'invalid',                                                              // $under_onoff
      'solid',                                                                // $under_kind
      '1',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '5',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '0',                                                                    // $padding_top
      '0',                                                                    // $padding_bottom
      '0',                                                                    // $margin_top
      '14',                                                                   // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_main_deco3_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_main_deco3_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_main_deco3_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_main_deco3_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    //装飾4
    if ( "ta_responsible_main_deco4_senyo_onoff" == $key_name ) { return 'invalid'; }
    if ( "ta_responsible_main_deco4_size2common" == $key_name ) { return 100; }
    $value = ta_headline_init( 
      $key_name,
      'ta_responsible_main_deco4',                                            // $headline_key_name
      'simple',                                                               // $type
      '16',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '0',                                                                    // $position
      'normal',                                                               // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_bg',                                               // $color_select
      '#3f1f00',                                                              // $color
      ta_other_data( 'ta_responsible_main_deco4_color_select', 'common_site_text_on_bg' ), // $linkedcolor_select
      ta_other_data( 'ta_responsible_main_deco4_color', '#3f1f00' ),          // $linkedcolor
      '5',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'invalid',                                                              // $under_onoff
      'solid',                                                                // $under_kind
      '1',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '5',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '0',                                                                    // $padding_top
      '0',                                                                    // $padding_bottom
      '0',                                                                    // $margin_top
      '14',                                                                   // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_main_deco4_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_main_deco4_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_main_deco4_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_main_deco4_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    if ( "ta_responsible_main_top_margin" == $key_name ) { return 5; }
    if ( "ta_responsible_main_bottom_margin" == $key_name ) { return 25; }
    if ( "ta_responsible_main_tb_padding" == $key_name ) { return 0; }
  //サイドバー
    if ( "ta_responsible_sidebar_fixed_space" == $key_name ) { return 20; }
    if ( "ta_responsible_sidebar_font_size" == $key_name ) { return 90; }
    $value = ta_paragraph_init( $key_name, "ta_responsible_sidebar_font" );
    if ( 'ta_no_fit' != $value ) { return $value; }
    //h2
    if ( "ta_responsible_sidebar_h2_senyo_onoff" == $key_name ) { return 'invalid'; }
    if ( "ta_responsible_sidebar_h2_size2common" == $key_name ) { return 120; }
    $value = ta_headline_init( 
      $key_name,
      'ta_responsible_sidebar_h2',                                            // $headline_key_name
      'simple',                                                               // $type
      '16',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '0',                                                                    // $position
      'normal',                                                               // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_bg',                                               // $color_select
      '#3f1f00',                                                              // $color
      ta_other_data( 'ta_responsible_sidebar_h2_color_select', 'common_site_text_on_bg' ), // $linkedcolor_select
      ta_other_data( 'ta_responsible_sidebar_h2_color', '#3f1f00' ),          // $linkedcolor
      '5',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'invalid',                                                              // $under_onoff
      'solid',                                                                // $under_kind
      '1',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '5',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '0',                                                                    // $padding_top
      '0',                                                                    // $padding_bottom
      '0',                                                                    // $margin_top
      '14',                                                                   // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebar_h2_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebar_h2_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebar_h2_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebar_h2_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    //h3
    if ( "ta_responsible_sidebar_h3_senyo_onoff" == $key_name ) { return 'invalid'; }
    if ( "ta_responsible_sidebar_h3_size2common" == $key_name ) { return 110; }
    $value = ta_headline_init( 
      $key_name,
      'ta_responsible_sidebar_h3',                                            // $headline_key_name
      'simple',                                                               // $type
      '16',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '0',                                                                    // $position
      'normal',                                                               // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_bg',                                               // $color_select
      '#3f1f00',                                                              // $color
      ta_other_data( 'ta_responsible_sidebar_h3_color_select', 'common_site_text_on_bg' ), // $linkedcolor_select
      ta_other_data( 'ta_responsible_sidebar_h3_color', '#3f1f00' ),          // $linkedcolor
      '5',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'invalid',                                                              // $under_onoff
      'solid',                                                                // $under_kind
      '1',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '5',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '0',                                                                    // $padding_top
      '0',                                                                    // $padding_bottom
      '0',                                                                    // $margin_top
      '14',                                                                   // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebar_h3_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebar_h3_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebar_h3_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebar_h3_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    //h4
    if ( "ta_responsible_sidebar_h4_senyo_onoff" == $key_name ) { return 'invalid'; }
    if ( "ta_responsible_sidebar_h4_size2common" == $key_name ) { return 100; }
    $value = ta_headline_init( 
      $key_name,
      'ta_responsible_sidebar_h4',                                            // $headline_key_name
      'simple',                                                               // $type
      '16',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '0',                                                                    // $position
      'normal',                                                               // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_bg',                                               // $color_select
      '#3f1f00',                                                              // $color
      ta_other_data( 'ta_responsible_sidebar_h4_color_select', 'common_site_text_on_bg' ), // $linkedcolor_select
      ta_other_data( 'ta_responsible_sidebar_h4_color', '#3f1f00' ),          // $linkedcolor
      '5',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'invalid',                                                              // $under_onoff
      'solid',                                                                // $under_kind
      '1',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '5',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '0',                                                                    // $padding_top
      '0',                                                                    // $padding_bottom
      '0',                                                                    // $margin_top
      '14',                                                                   // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebar_h4_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebar_h4_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebar_h4_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebar_h4_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    //h5
    if ( "ta_responsible_sidebar_h5_senyo_onoff" == $key_name ) { return 'invalid'; }
    if ( "ta_responsible_sidebar_h5_size2common" == $key_name ) { return 100; }
    $value = ta_headline_init( 
      $key_name,
      'ta_responsible_sidebar_h5',                                            // $headline_key_name
      'simple',                                                               // $type
      '16',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '0',                                                                    // $position
      'normal',                                                               // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_bg',                                               // $color_select
      '#3f1f00',                                                              // $color
      ta_other_data( 'ta_responsible_sidebar_h5_color_select', 'common_site_text_on_bg' ), // $linkedcolor_select
      ta_other_data( 'ta_responsible_sidebar_h5_color', '#3f1f00' ),          // $linkedcolor
      '5',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'invalid',                                                              // $under_onoff
      'solid',                                                                // $under_kind
      '1',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '5',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '0',                                                                    // $padding_top
      '0',                                                                    // $padding_bottom
      '0',                                                                    // $margin_top
      '14',                                                                   // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebar_h5_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebar_h5_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebar_h5_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebar_h5_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    //装飾1
    if ( "ta_responsible_sidebar_deco1_senyo_onoff" == $key_name ) { return 'invalid'; }
    if ( "ta_responsible_sidebar_deco1_size2common" == $key_name ) { return 100; }
    $value = ta_headline_init( 
      $key_name,
      'ta_responsible_sidebar_deco1',                                         // $headline_key_name
      'simple',                                                               // $type
      '16',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '0',                                                                    // $position
      'normal',                                                               // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_bg',                                               // $color_select
      '#3f1f00',                                                              // $color
      ta_other_data( 'ta_responsible_sidebar_deco1_color_select', 'common_site_text_on_bg' ), // $linkedcolor_select
      ta_other_data( 'ta_responsible_sidebar_deco1_color', '#3f1f00' ),       // $linkedcolor
      '5',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'invalid',                                                              // $under_onoff
      'solid',                                                                // $under_kind
      '1',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '5',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '0',                                                                    // $padding_top
      '0',                                                                    // $padding_bottom
      '0',                                                                    // $margin_top
      '14',                                                                   // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebar_deco1_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebar_deco1_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebar_deco1_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebar_deco1_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    //装飾2
    if ( "ta_responsible_sidebar_deco2_senyo_onoff" == $key_name ) { return 'invalid'; }
    if ( "ta_responsible_sidebar_deco2_size2common" == $key_name ) { return 100; }
    $value = ta_headline_init( 
      $key_name,
      'ta_responsible_sidebar_deco2',                                         // $headline_key_name
      'simple',                                                               // $type
      '16',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '0',                                                                    // $position
      'normal',                                                               // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_bg',                                               // $color_select
      '#3f1f00',                                                              // $color
      ta_other_data( 'ta_responsible_sidebar_deco2_color_select', 'common_site_text_on_bg' ), // $linkedcolor_select
      ta_other_data( 'ta_responsible_sidebar_deco2_color', '#3f1f00' ),       // $linkedcolor
      '5',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'invalid',                                                              // $under_onoff
      'solid',                                                                // $under_kind
      '1',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '5',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '0',                                                                    // $padding_top
      '0',                                                                    // $padding_bottom
      '0',                                                                    // $margin_top
      '14',                                                                   // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebar_deco2_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebar_deco2_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebar_deco2_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebar_deco2_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    //装飾3
    if ( "ta_responsible_sidebar_deco3_senyo_onoff" == $key_name ) { return 'invalid'; }
    if ( "ta_responsible_sidebar_deco3_size2common" == $key_name ) { return 100; }
    $value = ta_headline_init( 
      $key_name,
      'ta_responsible_sidebar_deco3',                                         // $headline_key_name
      'simple',                                                               // $type
      '16',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '0',                                                                    // $position
      'normal',                                                               // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_bg',                                               // $color_select
      '#3f1f00',                                                              // $color
      ta_other_data( 'ta_responsible_sidebar_deco3_color_select', 'common_site_text_on_bg' ), // $linkedcolor_select
      ta_other_data( 'ta_responsible_sidebar_deco3_color', '#3f1f00' ),       // $linkedcolor
      '5',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'invalid',                                                              // $under_onoff
      'solid',                                                                // $under_kind
      '1',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '5',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '0',                                                                    // $padding_top
      '0',                                                                    // $padding_bottom
      '0',                                                                    // $margin_top
      '14',                                                                   // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebar_deco3_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebar_deco3_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebar_deco3_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebar_deco3_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    //装飾4
    if ( "ta_responsible_sidebar_deco4_senyo_onoff" == $key_name ) { return 'invalid'; }
    if ( "ta_responsible_sidebar_deco4_size2common" == $key_name ) { return 100; }
    $value = ta_headline_init( 
      $key_name,
      'ta_responsible_sidebar_deco4',                                         // $headline_key_name
      'simple',                                                               // $type
      '16',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '0',                                                                    // $position
      'normal',                                                               // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_bg',                                               // $color_select
      '#3f1f00',                                                              // $color
      ta_other_data( 'ta_responsible_sidebar_deco4_color_select', 'common_site_text_on_bg' ), // $linkedcolor_select
      ta_other_data( 'ta_responsible_sidebar_deco4_color', '#3f1f00' ),       // $linkedcolor
      '5',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'invalid',                                                              // $under_onoff
      'solid',                                                                // $under_kind
      '1',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '5',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '0',                                                                    // $padding_top
      '0',                                                                    // $padding_bottom
      '0',                                                                    // $margin_top
      '14',                                                                   // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebar_deco4_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebar_deco4_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebar_deco4_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebar_deco4_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    if ( "ta_responsible_sidebar_top_margin" == $key_name ) { return ta_initdata_sel( 0, 20 ); }
    if ( "ta_responsible_sidebar_bottom_margin" == $key_name ) { return 25; }
    if ( "ta_responsible_sidebar_tb_padding" == $key_name ) { return 0; }
    if ( "ta_responsible_sidebar_latestposts_onoff" == $key_name ) { return 'valid'; }
    if ( "ta_responsible_sidebar_postdigest_onoff" == $key_name ) { return 'valid'; }
    if ( "ta_responsible_sidebar_widgetarea_onoff" == $key_name ) { return 'valid'; }
    if ( "ta_responsible_sidebar_widgetarea_centering" == $key_name ) { return 'valid'; }
    if ( "ta_responsible_sidebar_top_border_onoff" == $key_name ) { return 'valid'; }
    if ( "ta_responsible_sidebar_top_border_size" == $key_name ) { return 5; }
    if ( "ta_responsible_sidebar_top_border_kind" == $key_name ) { return 'dotted'; }
    if ( "ta_responsible_sidebar_top_border_color_select" == $key_name ) { return 'selectable'; }
    if ( "ta_responsible_sidebar_top_border_color" == $key_name ) { return '#aaaaaa'; }
  //サブサイドバー
    if ( "ta_responsible_sidebarsub_fixed_space" == $key_name ) { return 20; }
    if ( "ta_responsible_sidebarsub_font_size" == $key_name ) { return 90; }
    $value = ta_paragraph_init( $key_name, "ta_responsible_sidebarsub_font" );
    if ( 'ta_no_fit' != $value ) { return $value; }
    //h2
    if ( "ta_responsible_sidebarsub_h2_senyo_onoff" == $key_name ) { return 'invalid'; }
    if ( "ta_responsible_sidebarsub_h2_size2common" == $key_name ) { return 120; }
    $value = ta_headline_init( 
      $key_name,
      'ta_responsible_sidebarsub_h2',                                         // $headline_key_name
      'simple',                                                               // $type
      '16',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '0',                                                                    // $position
      'normal',                                                               // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_bg',                                               // $color_select
      '#3f1f00',                                                              // $color
      ta_other_data( 'ta_responsible_sidebarsub_h2_color_select', 'common_site_text_on_bg' ), // $linkedcolor_select
      ta_other_data( 'ta_responsible_sidebarsub_h2_color', '#3f1f00' ),       // $linkedcolor
      '5',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'invalid',                                                              // $under_onoff
      'solid',                                                                // $under_kind
      '1',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '5',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '0',                                                                    // $padding_top
      '0',                                                                    // $padding_bottom
      '0',                                                                    // $margin_top
      '14',                                                                   // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebarsub_h2_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebarsub_h2_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebarsub_h2_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebarsub_h2_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    //h3
    if ( "ta_responsible_sidebarsub_h3_senyo_onoff" == $key_name ) { return 'invalid'; }
    if ( "ta_responsible_sidebarsub_h3_size2common" == $key_name ) { return 110; }
    $value = ta_headline_init( 
      $key_name,
      'ta_responsible_sidebarsub_h3',                                         // $headline_key_name
      'simple',                                                               // $type
      '16',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '0',                                                                    // $position
      'normal',                                                               // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_bg',                                               // $color_select
      '#3f1f00',                                                              // $color
      ta_other_data( 'ta_responsible_sidebarsub_h3_color_select', 'common_site_text_on_bg' ), // $linkedcolor_select
      ta_other_data( 'ta_responsible_sidebarsub_h3_color', '#3f1f00' ),       // $linkedcolor
      '5',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'invalid',                                                              // $under_onoff
      'solid',                                                                // $under_kind
      '1',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '5',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '0',                                                                    // $padding_top
      '0',                                                                    // $padding_bottom
      '0',                                                                    // $margin_top
      '14',                                                                   // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebarsub_h3_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebarsub_h3_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebarsub_h3_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebarsub_h3_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    //h4
    if ( "ta_responsible_sidebarsub_h4_senyo_onoff" == $key_name ) { return 'invalid'; }
    if ( "ta_responsible_sidebarsub_h4_size2common" == $key_name ) { return 100; }
    $value = ta_headline_init( 
      $key_name,
      'ta_responsible_sidebarsub_h4',                                         // $headline_key_name
      'simple',                                                               // $type
      '16',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '0',                                                                    // $position
      'normal',                                                               // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_bg',                                               // $color_select
      '#3f1f00',                                                              // $color
      ta_other_data( 'ta_responsible_sidebarsub_h4_color_select', 'common_site_text_on_bg' ), // $linkedcolor_select
      ta_other_data( 'ta_responsible_sidebarsub_h4_color', '#3f1f00' ),       // $linkedcolor
      '5',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'invalid',                                                              // $under_onoff
      'solid',                                                                // $under_kind
      '1',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '5',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '0',                                                                    // $padding_top
      '0',                                                                    // $padding_bottom
      '0',                                                                    // $margin_top
      '14',                                                                   // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebarsub_h4_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebarsub_h4_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebarsub_h4_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebarsub_h4_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    //h5
    if ( "ta_responsible_sidebarsub_h5_senyo_onoff" == $key_name ) { return 'invalid'; }
    if ( "ta_responsible_sidebarsub_h5_size2common" == $key_name ) { return 100; }
    $value = ta_headline_init( 
      $key_name,
      'ta_responsible_sidebarsub_h5',                                         // $headline_key_name
      'simple',                                                               // $type
      '16',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '0',                                                                    // $position
      'normal',                                                               // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_bg',                                               // $color_select
      '#3f1f00',                                                              // $color
      ta_other_data( 'ta_responsible_sidebarsub_h5_color_select', 'common_site_text_on_bg' ), // $linkedcolor_select
      ta_other_data( 'ta_responsible_sidebarsub_h5_color', '#3f1f00' ),       // $linkedcolor
      '5',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'invalid',                                                              // $under_onoff
      'solid',                                                                // $under_kind
      '1',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '5',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '0',                                                                    // $padding_top
      '0',                                                                    // $padding_bottom
      '0',                                                                    // $margin_top
      '14',                                                                   // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebarsub_h5_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebarsub_h5_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebarsub_h5_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_sidebarsub_h5_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    if ( "ta_responsible_sidebarsub_top_margin" == $key_name ) { return 25; }
    if ( "ta_responsible_sidebarsub_bottom_margin" == $key_name ) { return 25; }
    if ( "ta_responsible_sidebarsub_tb_padding" == $key_name ) { return 0; }
    if ( "ta_responsible_sidebarsub_latestposts_onoff" == $key_name ) { return 'valid'; }
    if ( "ta_responsible_sidebarsub_postdigest_onoff" == $key_name ) { return 'valid'; }
    if ( "ta_responsible_sidebarsub_widgetarea_onoff" == $key_name ) { return 'valid'; }
    if ( "ta_responsible_sidebarsub_widgetarea_centering" == $key_name ) { return 'valid'; }
    if ( "ta_responsible_sidebarsub_top_border_onoff" == $key_name ) { return 'valid'; }
    if ( "ta_responsible_sidebarsub_top_border_size" == $key_name ) { return 5; }
    if ( "ta_responsible_sidebarsub_top_border_kind" == $key_name ) { return 'dotted'; }
    if ( "ta_responsible_sidebarsub_top_border_color_select" == $key_name ) { return 'selectable'; }
    if ( "ta_responsible_sidebarsub_top_border_color" == $key_name ) { return '#aaaaaa'; }
  //フッター
    if ( "ta_responsible_footer_fixed_space" == $key_name ) { return 10; }
    if ( "ta_responsible_footer_font_size" == $key_name ) { return 80; }
    $value = ta_paragraph_init( $key_name, "ta_responsible_footer_font" );
    if ( 'ta_no_fit' != $value ) { return $value; }
    //h2
    if ( "ta_responsible_footer_h2_senyo_onoff" == $key_name ) { return 'invalid'; }
    if ( "ta_responsible_footer_h2_size2common" == $key_name ) { return 120; }
    $value = ta_headline_init( 
      $key_name,
      'ta_responsible_footer_h2',                                             // $headline_key_name
      'simple',                                                               // $type
      '16',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '0',                                                                    // $position
      'normal',                                                               // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_bg',                                               // $color_select
      '#3f1f00',                                                              // $color
      ta_other_data( 'ta_responsible_footer_h2_color_select', 'common_site_text_on_bg' ), // $linkedcolor_select
      ta_other_data( 'ta_responsible_footer_h2_color', '#3f1f00' ),           // $linkedcolor
      '5',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'invalid',                                                              // $under_onoff
      'solid',                                                                // $under_kind
      '1',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '5',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '0',                                                                    // $padding_top
      '0',                                                                    // $padding_bottom
      '0',                                                                    // $margin_top
      '14',                                                                   // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_footer_h2_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_footer_h2_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_footer_h2_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_footer_h2_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    //h3
    if ( "ta_responsible_footer_h3_senyo_onoff" == $key_name ) { return 'invalid'; }
    if ( "ta_responsible_footer_h3_size2common" == $key_name ) { return 110; }
    $value = ta_headline_init( 
      $key_name,
      'ta_responsible_footer_h3',                                             // $headline_key_name
      'simple',                                                               // $type
      '16',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '0',                                                                    // $position
      'normal',                                                               // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_bg',                                               // $color_select
      '#3f1f00',                                                              // $color
      ta_other_data( 'ta_responsible_footer_h3_color_select', 'common_site_text_on_bg' ), // $linkedcolor_select
      ta_other_data( 'ta_responsible_footer_h3_color', '#3f1f00' ),           // $linkedcolor
      '5',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'invalid',                                                              // $under_onoff
      'solid',                                                                // $under_kind
      '1',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '5',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '0',                                                                    // $padding_top
      '0',                                                                    // $padding_bottom
      '0',                                                                    // $margin_top
      '14',                                                                   // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_footer_h3_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_footer_h3_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_footer_h3_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_footer_h3_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    //h4
    if ( "ta_responsible_footer_h4_senyo_onoff" == $key_name ) { return 'invalid'; }
    if ( "ta_responsible_footer_h4_size2common" == $key_name ) { return 100; }
    $value = ta_headline_init( 
      $key_name,
      'ta_responsible_footer_h4',                                             // $headline_key_name
      'simple',                                                               // $type
      '16',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '0',                                                                    // $position
      'normal',                                                               // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_bg',                                               // $color_select
      '#3f1f00',                                                              // $color
      ta_other_data( 'ta_responsible_footer_h4_color_select', 'common_site_text_on_bg' ), // $linkedcolor_select
      ta_other_data( 'ta_responsible_footer_h4_color', '#3f1f00' ),           // $linkedcolor
      '5',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'invalid',                                                              // $under_onoff
      'solid',                                                                // $under_kind
      '1',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '5',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '0',                                                                    // $padding_top
      '0',                                                                    // $padding_bottom
      '0',                                                                    // $margin_top
      '14',                                                                   // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_footer_h4_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_footer_h4_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_footer_h4_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_footer_h4_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    //h5
    if ( "ta_responsible_footer_h5_senyo_onoff" == $key_name ) { return 'invalid'; }
    if ( "ta_responsible_footer_h5_size2common" == $key_name ) { return 100; }
    $value = ta_headline_init( 
      $key_name,
      'ta_responsible_footer_h5',                                             // $headline_key_name
      'simple',                                                               // $type
      '16',                                                                   // $size
      '1.3',                                                                  // $hl_lineheight
      'invalid',                                                              // $centering
      '0',                                                                    // $position
      'normal',                                                               // $weight
      'invalid',                                                              // $font_ul_onoff
      'invalid',                                                              // $newwin_onoff
      'invalid',                                                              // $font_hoverul_onoff
      'common_site_text_on_bg',                                               // $color_select
      '#3f1f00',                                                              // $color
      ta_other_data( 'ta_responsible_footer_h5_color_select', 'common_site_text_on_bg' ), // $linkedcolor_select
      ta_other_data( 'ta_responsible_footer_h5_color', '#3f1f00' ),           // $linkedcolor
      '5',                                                                    // $left_size
      'common_site_hl',                                                       // $left_color_select
      '#3f1f00',                                                              // $left_color
      'invalid',                                                              // $over_onoff
      'solid',                                                                // $over_kind
      '1',                                                                    // $over_size
      'selectable',                                                           // $over_color_select
      '#aaaaaa',                                                              // $over_color
      'invalid',                                                              // $under_onoff
      'solid',                                                                // $under_kind
      '1',                                                                    // $under_size
      'selectable',                                                           // $under_color_select
      '#aaaaaa',                                                              // $under_color
      'common_site_hl',                                                       // $box_color_select
      '#3f1f00',                                                              // $box_color
      '5',                                                                    // $box_round
      'bottom',                                                               // $arrow_direction1
      '100',                                                                  // $arrow_size1
      '10',                                                                   // $arrow_position1
      'left-bottom',                                                          // $arrow_direction2
      '100',                                                                  // $arrow_size2
      '0',                                                                    // $padding_top
      '0',                                                                    // $padding_bottom
      '0',                                                                    // $margin_top
      '14',                                                                   // $margin_bottom
      'selectable',                                                           // $colorhover_select
      '#aaaaaa',                                                              // $colorhover
      'invalid',                                                              // $font_style_onoff
      'no_image',                                                             // $dec_pic
      'back',                                                                 // $pic_position
      'valid',                                                                // $pic_repeat_onoff
      '0',                                                                    // $bpic_rmargin
      '0'                                                                     // $bpic_toppos
    );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_footer_h5_box_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_footer_h5_left_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_footer_h5_over_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    $value = ta_gradient_color_init( $key_name, 'ta_responsible_footer_h5_under_color' );
    if ( 'ta_no_fit' != $value ) { return $value; }
    if ( "ta_responsible_footer_top_padding" == $key_name ) { return ta_initdata_sel( 40, 20 ); }
    if ( "ta_responsible_footer_group1block_onoff" == $key_name ) { return 'valid'; }
    if ( "ta_responsible_footer_group1block_margintop" == $key_name ) { return 0; }
    if ( "ta_responsible_footer_group2block_onoff" == $key_name ) { return 'valid'; }
    if ( "ta_responsible_footer_group2block_margintop" == $key_name ) { return 0; }
    if ( "ta_responsible_footer_footerimg_onoff" == $key_name ) { return 'valid'; }
    if ( "ta_responsible_footer_footerimg_width" == $key_name ) { return 100; }
    if ( "ta_responsible_footer_footerimg_fontweight" == $key_name ) { return ta_other_data( 'ta_footer_pic_text_weight', 'normal' ); }
    if ( "ta_responsible_footer_footerimg_text_color_select" == $key_name ) { return ta_other_data( 'ta_footer_pic_text_color_select', 'selectable' ); }
    if ( "ta_responsible_footer_footerimg_text_color" == $key_name ) { return ta_other_data( 'ta_footer_pic_text_color', '#3a7fcf' ); }
    if ( "ta_responsible_footer_footerimg_text_under" == $key_name ) { return ta_other_data( 'ta_footer_pic_text_hoverunder', 'valid' ); }
    if ( "ta_responsible_footer_footerimg_text_colorhover_select" == $key_name ) { return ta_other_data( 'ta_footer_pic_text_hover_select', 'selectable' ); }
    if ( "ta_responsible_footer_footerimg_text_colorhover" == $key_name ) { return ta_other_data( 'ta_footer_pic_text_hover', '#66a5ed' ); }
    if ( "ta_responsible_footer_footerimg_text_underhover" == $key_name ) { return ta_other_data( 'ta_footer_pic_text_hoverunder2', 'valid' ); }
    if ( "ta_responsible_footer_freetext_onoff" == $key_name ) { return 'valid'; }
    if ( "ta_responsible_footer_freetext_width" == $key_name ) { return 100; }
    if ( "ta_responsible_footer_footerimgsub_onoff" == $key_name ) { return 'valid'; }
    if ( "ta_responsible_footer_footerimgsub_width" == $key_name ) { return 100; }
    if ( "ta_responsible_footer_footermenu_onoff" == $key_name ) { return 'valid'; }
    if ( "ta_responsible_footer_footermenu_width" == $key_name ) { return 100; }
    if ( "ta_responsible_footer_widgetarea_onoff" == $key_name ) { return 'valid'; }
    if ( "ta_responsible_footer_widgetarea_centering" == $key_name ) { return 'invalid'; }
    if ( "ta_responsible_footer_copyrightcontainer_paddingtop" == $key_name ) { return ta_initdata_sel( 0, 30 ); }
    if ( "ta_responsible_footer_copyrightcontainer_paddingbottom" == $key_name ) { return 0; }
    if ( "ta_responsible_footer_copyright_padding" == $key_name ) { return 5; }
  //レスポンシブデザインフリーCSS
    if ( "ta_responsible_freecss_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_responsible_freecss_code" == $key_name ) { return "/* ここにCSSコードを記入してください */"; }
  //ダイジェスト・一覧
    if ( "ta_responsible_top_latestposts_rows_onoff" == $key_name ) { return "valid"; }
    if ( "ta_responsible_top_latestposts_excerpt_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_responsible_top_latestposts_img_size" == $key_name ) { return "same"; }
    if ( "ta_responsible_top_latestposts_excerpt_minheight_type" == $key_name ) { return "same"; }
    if ( "ta_responsible_top_latestposts_excerpt_minheight" == $key_name ) { return 0; }
    if ( "ta_responsible_top_postdigest_rows_onoff" == $key_name ) { return "valid"; }
    if ( "ta_responsible_top_postdigest_excerpt_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_responsible_top_postdigest_img_size" == $key_name ) { return "same"; }
    if ( "ta_responsible_top_postdigest_excerpt_minheight_type" == $key_name ) { return "same"; }
    if ( "ta_responsible_top_postdigest_excerpt_minheight" == $key_name ) { return 0; }
    if ( "ta_responsible_sidebar_latestposts_rows_onoff" == $key_name ) { return "valid"; }
    if ( "ta_responsible_sidebar_latestposts_excerpt_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_responsible_sidebar_latestposts_img_size" == $key_name ) { return "same"; }
    if ( "ta_responsible_sidebar_latestposts_excerpt_minheight_type" == $key_name ) { return "same"; }
    if ( "ta_responsible_sidebar_latestposts_excerpt_minheight" == $key_name ) { return 0; }
    if ( "ta_responsible_sidebar_postdigest_rows_onoff" == $key_name ) { return "valid"; }
    if ( "ta_responsible_sidebar_postdigest_excerpt_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_responsible_sidebar_postdigest_img_size" == $key_name ) { return "same"; }
    if ( "ta_responsible_sidebar_postdigest_excerpt_minheight_type" == $key_name ) { return "same"; }
    if ( "ta_responsible_sidebar_postdigest_excerpt_minheight" == $key_name ) { return 0; }
    if ( "ta_responsible_sidebarsub_latestposts_rows_onoff" == $key_name ) { return "valid"; }
    if ( "ta_responsible_sidebarsub_latestposts_excerpt_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_responsible_sidebarsub_latestposts_img_size" == $key_name ) { return "same"; }
    if ( "ta_responsible_sidebarsub_latestposts_excerpt_minheight_type" == $key_name ) { return "same"; }
    if ( "ta_responsible_sidebarsub_latestposts_excerpt_minheight" == $key_name ) { return 0; }
    if ( "ta_responsible_sidebarsub_postdigest_rows_onoff" == $key_name ) { return "valid"; }
    if ( "ta_responsible_sidebarsub_postdigest_excerpt_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_responsible_sidebarsub_postdigest_img_size" == $key_name ) { return "same"; }
    if ( "ta_responsible_sidebarsub_postdigest_excerpt_minheight_type" == $key_name ) { return "same"; }
    if ( "ta_responsible_sidebarsub_postdigest_excerpt_minheight" == $key_name ) { return 0; }
    if ( "ta_responsible_archive_rows_onoff" == $key_name ) { return "valid"; }
    if ( "ta_responsible_archive_excerpt_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_responsible_archive_img_size" == $key_name ) { return "same"; }
    if ( "ta_responsible_archive_excerpt_minheight_type" == $key_name ) { return "same"; }
    if ( "ta_responsible_archive_excerpt_minheight" == $key_name ) { return 0; }
//SEO設定集中管理
    //固定ページ
    if ( "ta_seocentral_pages_num" == $key_name ) { return 25; }
    if ( "ta_seocentral_pages_status" == $key_name ) { return "any"; }
    if ( "ta_seocentral_pages_orderby" == $key_name ) { return "date"; }
    if ( "ta_seocentral_pages_order" == $key_name ) { return "DESC"; }
    if ( "ta_seocentral_pages_excerpt_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_seocentral_pages_comp_onoff" == $key_name ) { return "invalid"; }
    //投稿記事ページ
    if ( "ta_seocentral_posts_cat" == $key_name ) { return ""; }
    if ( "ta_seocentral_posts_num" == $key_name ) { return 25; }
    if ( "ta_seocentral_posts_status" == $key_name ) { return "any"; }
    if ( "ta_seocentral_posts_orderby" == $key_name ) { return "date"; }
    if ( "ta_seocentral_posts_order" == $key_name ) { return "DESC"; }
    if ( "ta_seocentral_posts_excerpt_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_seocentral_posts_comp_onoff" == $key_name ) { return "invalid"; }
//投稿ページ設定メニュー
    //TAエンドロールFA表示
    if ( "ta_endroll_freearea_post_cmmn_onoff" == $key_name ) { return "valid"; }
    if ( "ta_endroll_freearea_post_frnt_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_endroll_freearea_post_page_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_endroll_freearea_post_post_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_endroll_freearea_post_list_onoff" == $key_name ) { return "invalid"; }
    //順序番号
    if ( "ta_post_order" == $key_name ) { return 100; }
    //コンテンツ先頭余白　（マージン）
    if ( "ta_post_header_top_margin" == $key_name ) { return "mrgn-zero"; }
    if ( "ta_post_top_margin" == $key_name ) { return "fixed-space"; }
    if ( "ta_post_top_margin_value" == $key_name ) { return 50; }
    if ( "ta_post_each_top_margin" == $key_name ) { return "common"; }
    if ( "ta_post_each_top_margin_value" == $key_name ) { return 50; }
    //個別のフレームタイプ
    if ( "ta_post_frame_type" == $key_name ) { return "common_style"; }
    //既存パーツ表示設定
    if ( "ta_post_custom_bgimg_onoff" == $key_name ) { return "common"; }
    if ( "ta_post_custom_common_onoff" == $key_name ) { return "valid"; }
    if ( "ta_post_custom_banner_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_post_custom_image_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_post_custom_global_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_post_custom_bread_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_post_custom_title_onoff" == $key_name ) { return "common"; }
    if ( "ta_post_custom_footer_onoff" == $key_name ) { return "common"; }
    //個別のSEO設定
    if ( "ta_post_seo_keywords" == $key_name ) { return ""; }
    if ( "ta_post_seo_description" == $key_name ) { return ""; }
    if ( "ta_post_h1_content" == $key_name ) { return get_the_title(); }
    if ( "ta_post_canonical_domain" == $key_name ) { return ""; }
    //個別のSMO（SNSボタン位置）設定
    if ( "ta_post_sns_position" == $key_name ) { return "common_style"; }
    //個別のSMO（OGP）設定
    if ( "ta_post_ogp_onoff" == $key_name ) { return "valid"; }
    if ( "ta_post_ogp_title" == $key_name ) { return get_the_title(); }
    if ( "ta_post_ogp_site_name" == $key_name ) { return get_the_title(); }
    if ( "ta_post_ogp_description" == $key_name ) { return get_bloginfo('description'); }
    if ( "ta_post_ogp_image" == $key_name ) { return "no_image"; }
    //個別のSMO（Twitter Cards）設定
    if ( "ta_post_twittercards_onoff" == $key_name ) { return "valid"; }
    if ( "ta_post_twittercards_title" == $key_name ) { return get_the_title(); }
    if ( "ta_post_twittercards_description" == $key_name ) { return get_bloginfo('description'); }
    if ( "ta_post_twittercards_image" == $key_name ) { return "no_image"; }
    //個別のアイキャッチ画像のサイズ
    if ( "ta_post_eyecatch_size" == $key_name ) { return "common"; }
    //個別のアイキャッチ画像の位置
    if ( "ta_post_eyecatch_position" == $key_name ) { return "common"; }
    //個別のタイトル上のアイキャッチ画像
    if ( "ta_page_eyecatch_onoff" == $key_name ) { return "common"; }
    //個別のフリーエリアのタイトルの表示設定
    if ( "ta_post_freearea_title_onoff" == $key_name ) { return "common"; }
    //個別のフリーエリアのタイトル要素名設定
    if ( "ta_post_freearea_title_factor" == $key_name ) { return "common"; }
    //個別のフリーエリアの枠の表示設定
    if ( "ta_post_freearea_frame_onoff" == $key_name ) { return "common"; }
    //バナー画像・付随文のセンタリング
    if ( "ta_post_freearea_img_centering" == $key_name ) { return "valid"; }
    //バナー画像
    if ( "ta_post_freearea_img" == $key_name ) { return "no_image"; }
    //バナー画像のリンク
    if ( "ta_post_freearea_img_link" == $key_name ) { return "no_link"; }
    //バナー画像のリンク新規ウィンドウ
    if ( "ta_post_freearea_img_link_newwin_onoff" == $key_name ) { return "invalid"; }
    //バナー画像の指定幅（ヘッダーフリーエリア専用）
    if ( "ta_post_header_freearea_img_width" == $key_name ) { return 100; }
    //バナー画像の指定幅（説明エリア専用）
    if ( "ta_post_exp_freearea_img_width" == $key_name ) { return 100; }
    //バナー画像の指定幅（メインフリーエリア専用）
    if ( "ta_post_main_freearea_img_width" == $key_name ) { return 100; }
    //バナー画像の指定幅（サイドバーフリーエリア専用）
    if ( "ta_post_sidebar_freearea_img_width" == $key_name ) { return 100; }
    //バナー画像の指定幅（サブサイドバーフリーエリア専用）
    if ( "ta_post_sidebarsub_freearea_img_width" == $key_name ) { return 100; }
    //バナー画像の指定幅（フッターフリーエリア専用）
    if ( "ta_post_footer_freearea_img_width" == $key_name ) { return 100; }
    //バナー画像の指定幅（エンドロールフリーエリア専用）
    if ( "ta_post_endroll_freearea_img_width" == $key_name ) { return 100; }
    //レスポンシブデザイン時のバナー画像の指定幅
    if ( "ta_post_freearea_img_width_for_rsp" == $key_name ) { return 100; }
    //バナー画像の左側余白
    if ( "ta_post_freearea_img_leftmargin" == $key_name ) { return 0; }
    //バナー画像付随文
    if ( "ta_post_freearea_text" == $key_name ) { return "バナー画像付随文"; }
    //バナー画像付随文のリンク
    if ( "ta_post_freearea_text_link" == $key_name ) { return "no_link"; }
    //バナー画像付随文のリンク新規ウィンドウ
    if ( "ta_post_freearea_text_link_newwin_onoff" == $key_name ) { return "invalid"; }
    //バナー画像付随文の左側余白
    if ( "ta_post_freearea_text_leftmargin" == $key_name ) { return 0; }
    //バナー画像付随文の位置
    if ( "ta_post_freearea_text_position" == $key_name ) { return "none"; }
    //付随文サイズ
    if ( "ta_post_freearea_text_fontsize" == $key_name ) { return 100; }
    //付随文の太さ
    if ( "ta_post_freearea_text_fontweight" == $key_name ) { return "normal"; }
    //付随文の色
    if ( "ta_post_freearea_text_fontcolor_select" == $key_name ) { return "selectable"; }
    if ( "ta_post_freearea_text_fontcolor" == $key_name ) { return "#000000"; }
    //付随文のHOVER色
    if ( "ta_post_freearea_text_fontcolorhover_select" == $key_name ) { return "selectable"; }
    if ( "ta_post_freearea_text_fontcolorhover" == $key_name ) { return "#aaaaaa"; }
    //付随文の下線
    if ( "ta_post_freearea_text_underline_onoff" == $key_name ) { return "invalid"; }
    //付随文の上余白
    if ( "ta_post_freearea_text_tpadding" == $key_name ) { return 0.5; }
    //付随文の下余白
    if ( "ta_post_freearea_text_bpadding" == $key_name ) { return 0.5; }
    //メニュー番号
    if ( "ta_post_freearea_menu_num" == $key_name ) { return "none"; }
    //バナー画像・付随文エリア境界線
    if ( "ta_post_freearea_imgtext_border_type" == $key_name ) { return "square"; }
    //バナー画像・付随文エリア境界線の太さ
    if ( "ta_post_freearea_imgtext_border_size" == $key_name ) { return 0; }
    //バナー画像・付随文エリア境界線の色
    if ( "ta_post_freearea_imgtext_border_color_select" == $key_name ) { return "selectable"; }
    if ( "ta_post_freearea_imgtext_border_color" == $key_name ) { return "#aaaaaa"; }
    //バナー画像・付随文エリア境界内の背景色
    if ( "ta_post_freearea_imgtext_border_bgcolor_select" == $key_name ) { return "selectable"; }
    if ( "ta_post_freearea_imgtext_border_bgcolor" == $key_name ) { return "transparent"; }
    //バナー画像・付随文エリア境界の丸み
    if ( "ta_post_freearea_imgtext_border_round" == $key_name ) { return 0; }
    //バナー画像・付随文エリア境界線の種類
    if ( "ta_post_freearea_imgtext_border_kind" == $key_name ) { return "solid"; }
    //バナー画像・付随文エリア境界とコンテンツの余白
    if ( "ta_post_freearea_imgtext_border_padding" == $key_name ) { return 0; }
    //バナー画像・付随文エリア幅
    if ( "ta_post_freearea_imgtext_width" == $key_name ) { return 100; }
    //レスポンシブデザイン時のバナー画像・付随文エリア幅
    if ( "ta_post_freearea_imgtext_width_for_rsp" == $key_name ) { return 100; }
    //サイトマップ掲載
    if ( "ta_post_sitemap_disp_onoff" == $key_name ) { return "invalid"; }
    //インデックス・フォロー処理
    if ( "ta_post_indexfollow" == $key_name ) { return "none"; }
    //フリースペース非表示ページ選択
    if ( "ta_post_freearea_no_display" == $key_name ) { return array(); }
    //レスポンシブ表示
    if ( "ta_post_freearea_responsible_disp_onoff" == $key_name ) { return "valid"; }
    //PC表示
    if ( "ta_post_freearea_normal_disp_onoff" == $key_name ) { return "valid"; }
    //閲覧制限設定
    if ( "ta_post_view_limit" == $key_name ) { return "common"; }
    //ヘッダー画像設定
    if ( "ta_page_header_img_kind" == $key_name ) { return "common"; }
    if ( "ta_page_header_img_pic" == $key_name ) { return "no_image"; }
    if ( "ta_page_header_img_link" == $key_name ) { return "no_link"; }
    if ( "ta_page_header_img_link_newwin_onoff" == $key_name ) { return "invalid"; }
    if ( "ta_page_header_img_shortcode" == $key_name ) { return ""; }
}


/********* テキスト一般設定を初期化する関数 *********/
function ta_text_general_init(
  $key_name,
  $text_general_key_name,
  $size,
  $weight,
  $color_select,
  $color,
  $anchor_color,
  $anchor_underonoff,
  $anchor_colorhover,
  $paddingtop,
  $paddingleft,
  $listmarker ) {
  if ( $text_general_key_name . '_size' == $key_name ) { return $size; }
  else if ( $text_general_key_name . '_weight' == $key_name ) { return $weight; }
  else if ( $text_general_key_name . '_color_select' == $key_name ) { return $color_select; }
  else if ( $text_general_key_name . '_color' == $key_name ) { return $color; }
  else if ( $text_general_key_name . '_anchor_color' == $key_name ) { return $anchor_color; }
  else if ( $text_general_key_name . '_anchor_underonoff' == $key_name ) { return $anchor_underonoff; }
  else if ( $text_general_key_name . '_anchor_colorhover' == $key_name ) { return $anchor_colorhover; }
  else if ( $text_general_key_name . '_paddingtop' == $key_name ) { return $paddingtop; }
  else if ( $text_general_key_name . '_paddingleft' == $key_name ) { return $paddingleft; }
  else if ( $text_general_key_name . '_listmarker' == $key_name ) { return $listmarker; }
  else { return 'ta_no_fit'; }
}


/********* フッターメニュー一般設定を初期化する関数 *********/
function ta_footermenu_general_init(
  $key_name,
  $text_general_key_name,
  $size,
  $weight,
  $color_select,
  $color,
  $anchor_color_select,
  $anchor_color,
  $anchor_colorhover_select,
  $anchor_colorhover,
  $anchor_underonoff,
  $anchor_hoverunderonoff,
  $paddingtop,
  $paddingleft,
  $listmarker ) {
  if ( $text_general_key_name . '_size' == $key_name ) { return $size; }
  else if ( $text_general_key_name . '_weight' == $key_name ) { return $weight; }
  else if ( $text_general_key_name . '_color_select' == $key_name ) { return $color_select; }
  else if ( $text_general_key_name . '_color' == $key_name ) { return $color; }
  else if ( $text_general_key_name . '_anchor_color_select' == $key_name ) { return $anchor_color_select; }
  else if ( $text_general_key_name . '_anchor_color' == $key_name ) { return $anchor_color; }
  else if ( $text_general_key_name . '_anchor_colorhover_select' == $key_name ) { return $anchor_colorhover_select; }
  else if ( $text_general_key_name . '_anchor_colorhover' == $key_name ) { return $anchor_colorhover; }
  else if ( $text_general_key_name . '_anchor_underonoff' == $key_name ) { return $anchor_underonoff; }
  else if ( $text_general_key_name . '_anchor_hoverunderonoff' == $key_name ) { return $anchor_hoverunderonoff; }
  else if ( $text_general_key_name . '_paddingtop' == $key_name ) { return $paddingtop; }
  else if ( $text_general_key_name . '_paddingleft' == $key_name ) { return $paddingleft; }
  else if ( $text_general_key_name . '_listmarker' == $key_name ) { return $listmarker; }
  else { return 'ta_no_fit'; }
}


/********* 最新投稿ダイジェスト詳細設定を初期化する関数 *********/
function ta_latestposts_detail_init(
  $key_name,
  $place,
  $title_onoff,
  $title_factor,
  $title,
  $nodis_cats,
  $num,
  $full_content_onoff,
  $pager_type,
  $post_distance,
  $row_num,
  $row_distance,
  $border_type,
  $border_size,
  $border_color_select,
  $border_color,
  $border_bgcolor_select,
  $border_bgcolor,
  $border_kind,
  $border_padding )
{
  if ( 'ta_' . $place . '_latestposts_title_onoff' == $key_name ) { return $title_onoff; }
  else if ( 'ta_' . $place . '_latestposts_title_factor' == $key_name ) { return $title_factor; }
  else if ( 'ta_' . $place . '_latestposts_title' == $key_name ) { return $title; }
  else if ( 'ta_' . $place . '_latestposts_nodis_cats' == $key_name ) { return $nodis_cats; }
  else if ( 'ta_' . $place . '_latestposts_num' == $key_name ) { return $num; }
  else if ( 'ta_' . $place . '_latestposts_full_content_onoff' == $key_name ) { return $full_content_onoff; }
  else if ( 'ta_' . $place . '_latestposts_pager_type' == $key_name ) { return $pager_type; }
  else if ( 'ta_' . $place . '_latestposts_post_distance' == $key_name ) { return $post_distance; }
  else if ( 'ta_' . $place . '_latestposts_row_num' == $key_name ) { return $row_num; }
  else if ( 'ta_' . $place . '_latestposts_row_distance' == $key_name ) { return $row_distance; }
  else if ( 'ta_' . $place . '_latestposts_post_border_type' == $key_name ) { return $border_type; }
  else if ( 'ta_' . $place . '_latestposts_post_border_size' == $key_name ) { return $border_size; }
  else if ( 'ta_' . $place . '_latestposts_post_border_color_select' == $key_name ) { return $border_color_select; }
  else if ( 'ta_' . $place . '_latestposts_post_border_color' == $key_name ) { return $border_color; }
  else if ( 'ta_' . $place . '_latestposts_post_border_bgcolor_select' == $key_name ) { return $border_bgcolor_select; }
  else if ( 'ta_' . $place . '_latestposts_post_border_bgcolor' == $key_name ) { return $border_bgcolor; }
  else if ( 'ta_' . $place . '_latestposts_post_border_kind' == $key_name ) { return $border_kind; }
  else if ( 'ta_' . $place . '_latestposts_post_border_padding' == $key_name ) { return $border_padding; }
  else { return 'ta_no_fit'; }
}


/********* 各種投稿ダイジェスト詳細設定を初期化する関数 *********/
function ta_postdigest_detail_init(
  $key_name,
  $place,
  $title_onoff,
  $title_link_onoff,
  $title_factor,
  $titles,
  $num,
  $full_content_onoff,
  $catlink_onoff,
  $catlink_title,
  $catlink_title_underline_onoff,
  $catlink_title_size,
  $catlink_title_weight,
  $catlink_title_color_select,
  $catlink_title_color,
  $catlink_title_colorhover_select,
  $catlink_title_colorhover,
  $catlink_bgcolor_select,
  $catlink_bgcolor,
  $catlink_bgcolorhover_select,
  $catlink_bgcolorhover,
  $catlink_height,
  $catlink_minwidth,
  $catlink_round,
  $catlink_margintop,
  $pager_type,
  $post_distance,
  $row_num,
  $row_distance,
  $border_type,
  $border_size,
  $border_color_select,
  $border_color,
  $border_bgcolor_select,
  $border_bgcolor,
  $border_kind,
  $border_padding )
{
  if ( 'ta_' . $place . '_postdigest_title_onoff' == $key_name ) { return $title_onoff; }
  else if ( 'ta_' . $place . '_postdigest_title_link_onoff' == $key_name ) { return $title_link_onoff; }
  else if ( 'ta_' . $place . '_postdigest_title_factor' == $key_name ) { return $title_factor; }
  else if ( 'ta_' . $place . '_postdigest_titles' == $key_name ) { return $titles; }
  else if ( 'ta_' . $place . '_postdigest_num' == $key_name ) { return $num; }
  else if ( 'ta_' . $place . '_postdigest_full_content_onoff' == $key_name ) { return $full_content_onoff; }
  else if ( 'ta_' . $place . '_postdigest_catlink_onoff' == $key_name ) { return $catlink_onoff; }
  else if ( 'ta_' . $place . '_postdigest_catlink_title' == $key_name ) { return $catlink_title; }
  else if ( 'ta_' . $place . '_postdigest_catlink_title_underline_onoff' == $key_name ) { return $catlink_title_underline_onoff; }
  else if ( 'ta_' . $place . '_postdigest_catlink_title_size' == $key_name ) { return $catlink_title_size; }
  else if ( 'ta_' . $place . '_postdigest_catlink_title_weight' == $key_name ) { return $catlink_title_weight; }
  else if ( 'ta_' . $place . '_postdigest_catlink_title_color_select' == $key_name ) { return $catlink_title_color_select; }
  else if ( 'ta_' . $place . '_postdigest_catlink_title_color' == $key_name ) { return $catlink_title_color; }
  else if ( 'ta_' . $place . '_postdigest_catlink_title_colorhover_select' == $key_name ) { return $catlink_title_colorhover_select; }
  else if ( 'ta_' . $place . '_postdigest_catlink_title_colorhover' == $key_name ) { return $catlink_title_colorhover; }
  else if ( 'ta_' . $place . '_postdigest_catlink_bgcolor_select' == $key_name ) { return $catlink_bgcolor_select; }
  else if ( 'ta_' . $place . '_postdigest_catlink_bgcolor' == $key_name ) { return $catlink_bgcolor; }
  else if ( 'ta_' . $place . '_postdigest_catlink_bgcolorhover_select' == $key_name ) { return $catlink_bgcolorhover_select; }
  else if ( 'ta_' . $place . '_postdigest_catlink_bgcolorhover' == $key_name ) { return $catlink_bgcolorhover; }
  else if ( 'ta_' . $place . '_postdigest_catlink_height' == $key_name ) { return $catlink_height; }
  else if ( 'ta_' . $place . '_postdigest_catlink_minwidth' == $key_name ) { return $catlink_minwidth; }
  else if ( 'ta_' . $place . '_postdigest_catlink_round' == $key_name ) { return $catlink_round; }
  else if ( 'ta_' . $place . '_postdigest_catlink_margintop' == $key_name ) { return $catlink_margintop; }
  else if ( 'ta_' . $place . '_postdigest_pager_type' == $key_name ) { return $pager_type; }
  else if ( 'ta_' . $place . '_postdigest_post_distance' == $key_name ) { return $post_distance; }
  else if ( 'ta_' . $place . '_postdigest_row_num' == $key_name ) { return $row_num; }
  else if ( 'ta_' . $place . '_postdigest_row_distance' == $key_name ) { return $row_distance; }
  else if ( 'ta_' . $place . '_postdigest_post_border_type' == $key_name ) { return $border_type; }
  else if ( 'ta_' . $place . '_postdigest_post_border_size' == $key_name ) { return $border_size; }
  else if ( 'ta_' . $place . '_postdigest_post_border_color_select' == $key_name ) { return $border_color_select; }
  else if ( 'ta_' . $place . '_postdigest_post_border_color' == $key_name ) { return $border_color; }
  else if ( 'ta_' . $place . '_postdigest_post_border_bgcolor_select' == $key_name ) { return $border_bgcolor_select; }
  else if ( 'ta_' . $place . '_postdigest_post_border_bgcolor' == $key_name ) { return $border_bgcolor; }
  else if ( 'ta_' . $place . '_postdigest_post_border_kind' == $key_name ) { return $border_kind; }
  else if ( 'ta_' . $place . '_postdigest_post_border_padding' == $key_name ) { return $border_padding; }
  else { return 'ta_no_fit'; }
}


/********* ダイジェスト記事のデザイン設定を初期化する関数 *********/
function ta_article_digest_design_init(
  $key_name,
  $place_and_role,
  $newwin_onoff,
  $ind,
  $cg_top,
  $cg_bottom,
  $post_title_factor,
  $timecat,
  $time_onoff,
  $cat_onoff,
  $time_color_select,
  $time_color,
  $time_size,
  $time_weight,
  $cat_size,
  $cat_weight,
  $cat_height,
  $cat_width,
  $cat_round,
  $watchmark_onoff,
  $cgp_onoff,
  $img_pos,
  $img_padding,
  $img_size,
  $excerpt,
  $excerpt_minheight,
  $excerpt_tpadding,
  $excerpt_bpadding,
  $excerpt_onlyfor_onoff,
  $excerpt_size,
  $excerpt_weight,
  $excerpt_lineheight,
  $excerpt_anchor_color_select,
  $excerpt_anchor_color,
  $excerpt_anchor_under,
  $excerpt_anchor_colorhover_select,
  $excerpt_anchor_colorhover,
  $excerpt_anchor_underhover,
  $rightmark,
  $rightmark_color_select,
  $rightmark_color,
  $rightmark_size,
  $rightmark_weight,
  $rightmark_width,
  $rightmark_opacity,
  $rightmark_opacityhover,
  $lowermark,
  $lowermark_title,
  $lowermark_title_underline_onoff,
  $lowermark_title_hoverunderline_onoff,
  $lowermark_title_size,
  $lowermark_title_weight,
  $lowermark_title_color_select,
  $lowermark_title_color,
  $lowermark_title_colorhover_select,
  $lowermark_title_colorhover,
  $lowermark_bgcolor_select,
  $lowermark_bgcolor,
  $lowermark_bgcolorhover_select,
  $lowermark_bgcolorhover,
  $lowermark_height,
  $lowermark_minwidth,
  $lowermark_round,
  $lowermark_paddingtop,
  $mark_onoff,
  $mark_days,
  $mark_pic,
  $mark_text,
  $mark_text_color_select,
  $mark_text_color,
  $mark_text_weight,
  $mark_text_bgcolor_select,
  $mark_text_bgcolor,
  $mark_text_round,
  $mark_padding )
{
  if ( 'ta_' . $place_and_role . '_newwin_onoff' == $key_name ) { return $newwin_onoff; }
  else if ( 'ta_' . $place_and_role . '_ind' == $key_name ) { return $ind; }
  else if ( 'ta_' . $place_and_role . '_cg_top' == $key_name ) { return $cg_top; }
  else if ( 'ta_' . $place_and_role . '_cg_bottom' == $key_name ) { return $cg_bottom; }
  else if ( 'ta_' . $place_and_role . '_post_title_factor' == $key_name ) { return $post_title_factor; }
  else if ( 'ta_' . $place_and_role . '_timecat' == $key_name ) { return $timecat; }
  else if ( 'ta_' . $place_and_role . '_time_onoff' == $key_name ) { return $time_onoff; }
  else if ( 'ta_' . $place_and_role . '_cat_onoff' == $key_name ) { return $cat_onoff; }
  else if ( 'ta_' . $place_and_role . '_time_color_select' == $key_name ) { return $time_color_select; }
  else if ( 'ta_' . $place_and_role . '_time_color' == $key_name ) { return $time_color; }
  else if ( 'ta_' . $place_and_role . '_time_size' == $key_name ) { return $time_size; }
  else if ( 'ta_' . $place_and_role . '_time_weight' == $key_name ) { return $time_weight; }
  else if ( 'ta_' . $place_and_role . '_cat_size' == $key_name ) { return $cat_size; }
  else if ( 'ta_' . $place_and_role . '_cat_weight' == $key_name ) { return $cat_weight; }
  else if ( 'ta_' . $place_and_role . '_cat_height' == $key_name ) { return $cat_height; }
  else if ( 'ta_' . $place_and_role . '_cat_width' == $key_name ) { return $cat_width; }
  else if ( 'ta_' . $place_and_role . '_cat_round' == $key_name ) { return $cat_round; }
  else if ( 'ta_' . $place_and_role . '_watchmark_onoff' == $key_name ) { return $watchmark_onoff; }
  else if ( 'ta_' . $place_and_role . '_cgp_onoff' == $key_name ) { return $cgp_onoff; }
  else if ( 'ta_' . $place_and_role . '_img_pos' == $key_name ) { return $img_pos; }
  else if ( 'ta_' . $place_and_role . '_img_padding' == $key_name ) { return $img_padding; }
  else if ( 'ta_' . $place_and_role . '_img_size' == $key_name ) { return $img_size; }
  else if ( 'ta_' . $place_and_role . '_excerpt' == $key_name ) { return $excerpt; }
  else if ( 'ta_' . $place_and_role . '_excerpt_minheight' == $key_name ) { return $excerpt_minheight; }
  else if ( 'ta_' . $place_and_role . '_excerpt_tpadding' == $key_name ) { return $excerpt_tpadding; }
  else if ( 'ta_' . $place_and_role . '_excerpt_bpadding' == $key_name ) { return $excerpt_bpadding; }
  else if ( 'ta_' . $place_and_role . '_excerpt_onlyfor_onoff' == $key_name ) { return $excerpt_onlyfor_onoff; }
  else if ( 'ta_' . $place_and_role . '_excerpt_size' == $key_name ) { return $excerpt_size; }
  else if ( 'ta_' . $place_and_role . '_excerpt_weight' == $key_name ) { return $excerpt_weight; }
  else if ( 'ta_' . $place_and_role . '_excerpt_lineheight' == $key_name ) { return $excerpt_lineheight; }
  else if ( 'ta_' . $place_and_role . '_excerpt_anchor_color_select' == $key_name ) { return $excerpt_anchor_color_select; }
  else if ( 'ta_' . $place_and_role . '_excerpt_anchor_color' == $key_name ) { return $excerpt_anchor_color; }
  else if ( 'ta_' . $place_and_role . '_excerpt_anchor_under' == $key_name ) { return $excerpt_anchor_under; }
  else if ( 'ta_' . $place_and_role . '_excerpt_anchor_colorhover_select' == $key_name ) { return $excerpt_anchor_colorhover_select; }
  else if ( 'ta_' . $place_and_role . '_excerpt_anchor_colorhover' == $key_name ) { return $excerpt_anchor_colorhover; }
  else if ( 'ta_' . $place_and_role . '_excerpt_anchor_underhover' == $key_name ) { return $excerpt_anchor_underhover; }
  else if ( 'ta_' . $place_and_role . '_excerpt_rightmark' == $key_name ) { return $rightmark; }
  else if ( 'ta_' . $place_and_role . '_excerpt_rightmark_color_select' == $key_name ) { return $rightmark_color_select; }
  else if ( 'ta_' . $place_and_role . '_excerpt_rightmark_color' == $key_name ) { return $rightmark_color; }
  else if ( 'ta_' . $place_and_role . '_excerpt_rightmark_size' == $key_name ) { return $rightmark_size; }
  else if ( 'ta_' . $place_and_role . '_excerpt_rightmark_weight' == $key_name ) { return $rightmark_weight; }
  else if ( 'ta_' . $place_and_role . '_excerpt_rightmark_width' == $key_name ) { return $rightmark_width; }
  else if ( 'ta_' . $place_and_role . '_excerpt_rightmark_opacity' == $key_name ) { return $rightmark_opacity; }
  else if ( 'ta_' . $place_and_role . '_excerpt_rightmark_opacityhover' == $key_name ) { return $rightmark_opacityhover; }
  else if ( 'ta_' . $place_and_role . '_excerpt_lowermark' == $key_name ) { return $lowermark; }
  else if ( 'ta_' . $place_and_role . '_excerpt_lowermark_title' == $key_name ) { return $lowermark_title; }
  else if ( 'ta_' . $place_and_role . '_excerpt_lowermark_title_underline_onoff' == $key_name ) { return $lowermark_title_underline_onoff; }
  else if ( 'ta_' . $place_and_role . '_excerpt_lowermark_title_hoverunderline_onoff' == $key_name ) { return $lowermark_title_hoverunderline_onoff; }
  else if ( 'ta_' . $place_and_role . '_excerpt_lowermark_title_size' == $key_name ) { return $lowermark_title_size; }
  else if ( 'ta_' . $place_and_role . '_excerpt_lowermark_title_weight' == $key_name ) { return $lowermark_title_weight; }
  else if ( 'ta_' . $place_and_role . '_excerpt_lowermark_title_color_select' == $key_name ) { return $lowermark_title_color_select; }
  else if ( 'ta_' . $place_and_role . '_excerpt_lowermark_title_color' == $key_name ) { return $lowermark_title_color; }
  else if ( 'ta_' . $place_and_role . '_excerpt_lowermark_title_colorhover_select' == $key_name ) { return $lowermark_title_colorhover_select; }
  else if ( 'ta_' . $place_and_role . '_excerpt_lowermark_title_colorhover' == $key_name ) { return $lowermark_title_colorhover; }
  else if ( 'ta_' . $place_and_role . '_excerpt_lowermark_bgcolor_select' == $key_name ) { return $lowermark_bgcolor_select; }
  else if ( 'ta_' . $place_and_role . '_excerpt_lowermark_bgcolor' == $key_name ) { return $lowermark_bgcolor; }
  else if ( 'ta_' . $place_and_role . '_excerpt_lowermark_bgcolorhover_select' == $key_name ) { return $lowermark_bgcolorhover_select; }
  else if ( 'ta_' . $place_and_role . '_excerpt_lowermark_bgcolorhover' == $key_name ) { return $lowermark_bgcolorhover; }
  else if ( 'ta_' . $place_and_role . '_excerpt_lowermark_height' == $key_name ) { return $lowermark_height; }
  else if ( 'ta_' . $place_and_role . '_excerpt_lowermark_minwidth' == $key_name ) { return $lowermark_minwidth; }
  else if ( 'ta_' . $place_and_role . '_excerpt_lowermark_round' == $key_name ) { return $lowermark_round; }
  else if ( 'ta_' . $place_and_role . '_excerpt_lowermark_paddingtop' == $key_name ) { return $lowermark_paddingtop; }
  else if ( 'ta_' . $place_and_role . '_release_mark_onoff' == $key_name ) { return $mark_onoff; }
  else if ( 'ta_' . $place_and_role . '_release_mark_days' == $key_name ) { return $mark_days; }
  else if ( 'ta_' . $place_and_role . '_release_mark_pic' == $key_name ) { return $mark_pic; }
  else if ( 'ta_' . $place_and_role . '_release_mark_text' == $key_name ) { return $mark_text; }
  else if ( 'ta_' . $place_and_role . '_release_mark_text_color_select' == $key_name ) { return $mark_text_color_select; }
  else if ( 'ta_' . $place_and_role . '_release_mark_text_color' == $key_name ) { return $mark_text_color; }
  else if ( 'ta_' . $place_and_role . '_release_mark_text_weight' == $key_name ) { return $mark_text_weight; }
  else if ( 'ta_' . $place_and_role . '_release_mark_text_bgcolor_select' == $key_name ) { return $mark_text_bgcolor_select; }
  else if ( 'ta_' . $place_and_role . '_release_mark_text_bgcolor' == $key_name ) { return $mark_text_bgcolor; }
  else if ( 'ta_' . $place_and_role . '_release_mark_text_round' == $key_name ) { return $mark_text_round; }
  else if ( 'ta_' . $place_and_role . '_release_mark_padding' == $key_name ) { return $mark_padding; }
  else { return 'ta_no_fit'; }
}


/********* ヘッドライン設定を初期化する関数 *********/
function ta_headline_init(
  $key_name,
  $headline_key_name,
  $type,
  $size,
  $hl_lineheight,
  $centering,
  $position,
  $weight,
  $font_ul_onoff,
  $newwin_onoff,
  $font_hoverul_onoff,
  $color_select,
  $color,
  $linkedcolor_select,
  $linkedcolor,
  $left_size,
  $left_color_select,
  $left_color,
  $over_onoff,
  $over_kind,
  $over_size,
  $over_color_select,
  $over_color,
  $under_onoff,
  $under_kind,
  $under_size,
  $under_color_select,
  $under_color,
  $box_color_select,
  $box_color,
  $box_round,
  $arrow_direction1,
  $arrow_size1,
  $arrow_position1,
  $arrow_direction2,
  $arrow_size2,
  $padding_top,
  $padding_bottom,
  $margin_top,
  $margin_bottom,
  $colorhover_select,
  $colorhover,
  $font_style_onoff,
  $dec_pic,
  $pic_position,
  $pic_repeat_onoff,
  $bpic_rmargin,
  $bpic_toppos
   )
{
  if ( $headline_key_name . '_type' == $key_name ) { return $type; }
  else if ( $headline_key_name . '_size' == $key_name ) { return $size; }
  else if ( $headline_key_name . '_hl_lineheight' == $key_name ) { return $hl_lineheight; }
  else if ( $headline_key_name . '_centering' == $key_name ) { return $centering; }
  else if ( $headline_key_name . '_position' == $key_name ) { return $position; }
  else if ( $headline_key_name . '_weight' == $key_name ) { return $weight; }
  else if ( $headline_key_name . '_font_ul_onoff' == $key_name ) { return $font_ul_onoff; }
  else if ( $headline_key_name . '_newwin_onoff' == $key_name ) { return $newwin_onoff; }
  else if ( $headline_key_name . '_font_hoverul_onoff' == $key_name ) { return $font_hoverul_onoff; }
  else if ( $headline_key_name . '_color_select' == $key_name ) { return $color_select; }
  else if ( $headline_key_name . '_color' == $key_name ) { return $color; }
  else if ( $headline_key_name . '_linkedcolor_select' == $key_name ) { return $linkedcolor_select; }
  else if ( $headline_key_name . '_linkedcolor' == $key_name ) { return $linkedcolor; }
  else if ( $headline_key_name . '_left_size' == $key_name ) { return $left_size; }
  else if ( $headline_key_name . '_left_color_select' == $key_name ) { return $left_color_select; }
  else if ( $headline_key_name . '_left_color' == $key_name ) { return $left_color; }
  else if ( $headline_key_name . '_over_onoff' == $key_name ) { return $over_onoff; }
  else if ( $headline_key_name . '_over_kind' == $key_name ) { return $over_kind; }
  else if ( $headline_key_name . '_over_size' == $key_name ) { return $over_size; }
  else if ( $headline_key_name . '_over_color_select' == $key_name ) { return $over_color_select; }
  else if ( $headline_key_name . '_over_color' == $key_name ) { return $over_color; }
  else if ( $headline_key_name . '_under_onoff' == $key_name ) { return $under_onoff; }
  else if ( $headline_key_name . '_under_kind' == $key_name ) { return $under_kind; }
  else if ( $headline_key_name . '_under_size' == $key_name ) { return $under_size; }
  else if ( $headline_key_name . '_under_color_select' == $key_name ) { return $under_color_select; }
  else if ( $headline_key_name . '_under_color' == $key_name ) { return $under_color; }
  else if ( $headline_key_name . '_box_color_select' == $key_name ) { return $box_color_select; }
  else if ( $headline_key_name . '_box_color' == $key_name ) { return $box_color; }
  else if ( $headline_key_name . '_box_round' == $key_name ) { return $box_round; }
  else if ( $headline_key_name . '_arrow_direction1' == $key_name ) { return $arrow_direction1; }
  else if ( $headline_key_name . '_arrow_size1' == $key_name ) { return $arrow_size1; }
  else if ( $headline_key_name . '_arrow_position1' == $key_name ) { return $arrow_position1; }
  else if ( $headline_key_name . '_arrow_direction2' == $key_name ) { return $arrow_direction2; }
  else if ( $headline_key_name . '_arrow_size2' == $key_name ) { return $arrow_size2; }
  else if ( $headline_key_name . '_padding_top' == $key_name ) { return $padding_top; }
  else if ( $headline_key_name . '_padding_bottom' == $key_name ) { return $padding_bottom; }
  else if ( $headline_key_name . '_margin_top' == $key_name ) { return $margin_top; }
  else if ( $headline_key_name . '_margin_bottom' == $key_name ) { return $margin_bottom; }
  else if ( $headline_key_name . '_colorhover_select' == $key_name ) { return $colorhover_select; }
  else if ( $headline_key_name . '_colorhover' == $key_name ) { return $colorhover; }
  else if ( $headline_key_name . '_font_style_onoff' == $key_name ) { return $font_style_onoff; }
  else if ( $headline_key_name . '_dec_pic' == $key_name ) { return $dec_pic; }
  else if ( $headline_key_name . '_pic_position' == $key_name ) { return $pic_position; }
  else if ( $headline_key_name . '_pic_repeat_onoff' == $key_name ) { return $pic_repeat_onoff; }
  else if ( $headline_key_name . '_bpic_rmargin' == $key_name ) { return $bpic_rmargin; }
  else if ( $headline_key_name . '_bpic_toppos' == $key_name ) { return $bpic_toppos; }
  else { return 'ta_no_fit'; }
}

/********* レスポンシブデザイン詳細設定を初期化する関数 *********/
function ta_responsible_detail_init( $key_name, $text_general_key_name, $onoff, $size2common, $position, $w_padding_onoff, $top_margin, $bottom_margin, $edge_margin ) {
  if ( $text_general_key_name . '_onoff' == $key_name ) { return $onoff; }
  else if ( $text_general_key_name . '_size2common' == $key_name ) { return $size2common; }
  else if ( $text_general_key_name . '_position' == $key_name ) { return $position; }
  else if ( $text_general_key_name . '_w_padding_onoff' == $key_name ) { return $w_padding_onoff; }
  else if ( $text_general_key_name . '_top_margin' == $key_name ) { return $top_margin; }
  else if ( $text_general_key_name . '_bottom_margin' == $key_name ) { return $bottom_margin; }
  else if ( $text_general_key_name . '_edge_margin' == $key_name ) { return $edge_margin; }
  else { return 'ta_no_fit'; }
}


/********* 基本パーツ表示設定を初期化する関数 *********/
function ta_parts_select_init( $key_name, $text_general_key_name, $bgimg_onoff, $banner_onoff, $image_onoff, $global_onoff, $bread_onoff, $title_onoff, $footer_onoff ) {
  if ( $text_general_key_name . '_bgimg_onoff' == $key_name ) { return $bgimg_onoff; }
  else if ( $text_general_key_name . '_banner_onoff' == $key_name ) { return $banner_onoff; }
  else if ( $text_general_key_name . '_image_onoff' == $key_name ) { return $image_onoff; }
  else if ( $text_general_key_name . '_global_onoff' == $key_name ) { return $global_onoff; }
  else if ( $text_general_key_name . '_bread_onoff' == $key_name ) { return $bread_onoff; }
  else if ( $text_general_key_name . '_title_onoff' == $key_name ) { return $title_onoff; }
  else if ( $text_general_key_name . '_footer_onoff' == $key_name ) { return $footer_onoff; }
  else { return 'ta_no_fit'; }
}


/********* コンテンツ先頭余白設定を初期化する関数 *********/
function ta_top_margin_init( $key_name, $text_general_key_name ) {
  if ( $text_general_key_name . '_top_margin' == $key_name ) { return 'mrgn-zero'; }
  else if ( $text_general_key_name . '_top_margin_value' == $key_name ) { return 50; }
  else { return 'ta_no_fit'; }
}

function ta_top_margin_init_fixed_space( $key_name, $text_general_key_name ) {
  if ( $text_general_key_name . '_top_margin' == $key_name ) { return 'fixed-space'; }
  else if ( $text_general_key_name . '_top_margin_value' == $key_name ) { return 50; }
  else { return 'ta_no_fit'; }
}


/********* TA汎用背景装飾を初期化する関数 *********/
function ta_genbg_init( $key_name, $i ) {
  if ( 'ta_genbg' . $i . '_width' == $key_name ) { return "100"; }
  else if ( 'ta_genbg' . $i . '_position' == $key_name ) { return "center"; }
  else if ( 'ta_genbg' . $i . '_contents_position' == $key_name ) { return "none"; }
  else if ( 'ta_genbg' . $i . '_mrgn_edge' == $key_name ) { return "0"; }
  else if ( 'ta_genbg' . $i . '_mrgn_top' == $key_name ) { return "0"; }
  else if ( 'ta_genbg' . $i . '_mrgn_bottom' == $key_name ) { return "0"; }
  else if ( 'ta_genbg' . $i . '_mawarikomi_onoff' == $key_name ) { return "invalid"; }
  else if ( 'ta_genbg' . $i . '_mawarikomi_space' == $key_name ) { return "10"; }
  else if ( 'ta_genbg' . $i . '_border_type' == $key_name ) { return "square"; }
  else if ( 'ta_genbg' . $i . '_border_size' == $key_name ) { return "1"; }
  else if ( 'ta_genbg' . $i . '_border_color_select' == $key_name ) { return "selectable"; }
  else if ( 'ta_genbg' . $i . '_border_color' == $key_name ) { return "#aaaaaa"; }
  else if ( 'ta_genbg' . $i . '_border_bgcolor_select' == $key_name ) { return "selectable"; }
  else if ( 'ta_genbg' . $i . '_border_bgcolor' == $key_name ) { return "transparent"; }
  else if ( 'ta_genbg' . $i . '_tl_brdr_rnd' == $key_name ) { return "0"; }
  else if ( 'ta_genbg' . $i . '_tr_brdr_rnd' == $key_name ) { return "0"; }
  else if ( 'ta_genbg' . $i . '_br_brdr_rnd' == $key_name ) { return "0"; }
  else if ( 'ta_genbg' . $i . '_bl_brdr_rnd' == $key_name ) { return "0"; }
  else if ( 'ta_genbg' . $i . '_border_kind' == $key_name ) { return "solid"; }
  else if ( 'ta_genbg' . $i . '_top_padding' == $key_name ) { return "0"; }
  else if ( 'ta_genbg' . $i . '_right_padding' == $key_name ) { return "10"; }
  else if ( 'ta_genbg' . $i . '_bottom_padding' == $key_name ) { return "0"; }
  else if ( 'ta_genbg' . $i . '_left_padding' == $key_name ) { return "10"; }
  else { return 'ta_no_fit'; }
}


/********* TA汎用背景装飾を初期化する関数 *********/
function ta_paragraph_init( $key_name, $text_general_key_name ) {
  if ( $text_general_key_name . '_onlyfor_onoff' == $key_name ) { return "invalid"; }
  else if ( $text_general_key_name . '_p_lineheight' == $key_name ) { return "1.3"; }
  else if ( $text_general_key_name . '_p_topmargin' == $key_name ) { return "0.5"; }
  else if ( $text_general_key_name . '_p_bottommargin' == $key_name ) { return "1.2"; }
  else if ( $text_general_key_name . '_p_leftmargin' == $key_name ) { return "0"; }
  else if ( $text_general_key_name . '_p_rightmargin' == $key_name ) { return "0"; }
  else { return 'ta_no_fit'; }
}


/********* グラデーション表記設定を初期化する関数 *********/
function ta_gradient_color_init( $key_name, $text_general_key_name ) {
  if ( $text_general_key_name . '_grad_onoff' == $key_name ) { return "invalid"; }
  else if ( $text_general_key_name . '_grd_direct' == $key_name ) { return "bottom"; }
  else if ( $text_general_key_name . '_grd_start_color_select' == $key_name ) { return "selectable"; }
  else if ( $text_general_key_name . '_grd_start_color' == $key_name ) { return "#ffffff"; }
  else if ( $text_general_key_name . '_grd_mid_color_onoff' == $key_name ) { return "invalid"; }
  else if ( $text_general_key_name . '_grd_mid_color_pos' == $key_name ) { return "50"; }
  else if ( $text_general_key_name . '_grd_mid_color_select' == $key_name ) { return "selectable"; }
  else if ( $text_general_key_name . '_grd_mid_color' == $key_name ) { return "#ffffff"; }
  else if ( $text_general_key_name . '_grd_stop_color_select' == $key_name ) { return "selectable"; }
  else if ( $text_general_key_name . '_grd_stop_color' == $key_name ) { return "#ffffff"; }
  else { return 'ta_no_fit'; }
}


/********* 背景バー設定を初期化する関数 *********/
function ta_bg_bar_init( $key_name, $text_general_key_name, $pos ) {
  if ( 'ta_common_top_outframe_bar_top_onoff' == $key_name ) { return ta_initdata_sel( "invalid", "valid" ); }
  else if ( 'ta_common_outframe_bar_top_onoff' == $key_name ) { return ta_initdata_sel( "invalid", "valid" ); }
  else if ( 'ta_common_top_outframe_bar_gmenu_onoff' == $key_name ) { return ta_initdata_sel( "invalid", "valid" ); }
  else if ( 'ta_common_outframe_bar_gmenu_onoff' == $key_name ) { return ta_initdata_sel( "invalid", "valid" ); }
  else if ( 'ta_common_top_outframe_bar_bottom_onoff' == $key_name ) { return ta_initdata_sel( "invalid", "valid" ); }
  else if ( 'ta_common_outframe_bar_bottom_onoff' == $key_name ) { return ta_initdata_sel( "invalid", "valid" ); }
  else if ( 'ta_responsible_top_outframe_bar_top_onoff' == $key_name ) { return ta_initdata_sel( "invalid", "valid" ); }
  else if ( 'ta_responsible_outframe_bar_top_onoff' == $key_name ) { return ta_initdata_sel( "invalid", "valid" ); }
  else if ( 'ta_responsible_top_outframe_bar_bottom_onoff' == $key_name ) { return ta_initdata_sel( "invalid", "valid" ); }
  else if ( 'ta_responsible_outframe_bar_bottom_onoff' == $key_name ) { return ta_initdata_sel( "invalid", "valid" ); }
  else if ( $text_general_key_name . '_bar_' . $pos . '_onoff' == $key_name ) { return "invalid"; }
  else if ( $text_general_key_name . '_bar_top_width' == $key_name ) { return "24"; }
  else if ( $text_general_key_name . '_bar_bottom_width' == $key_name ) { return "38.7"; }
  else if ( $text_general_key_name . '_bar_gmenu_width' == $key_name ) { return "5"; }
  else if ( $text_general_key_name . '_bar_free_width' == $key_name ) { return "10"; }
  else if ( 'ta_common_top_outframe_bar_gmenu_distance' == $key_name ) { return "385"; }
  else if ( 'ta_common_outframe_bar_gmenu_distance' == $key_name ) { return "135"; }
  else if ( $text_general_key_name . '_bar_free_distance' == $key_name ) { return "500"; }
  else if ( $text_general_key_name . '_bar_' . $pos . '_color_select' == $key_name ) { return "selectable"; }
  else if ( 'ta_common_top_outframe_bar_bottom_color' == $key_name ) { return "#dddddd"; }
  else if ( 'ta_common_outframe_bar_bottom_color' == $key_name ) { return "#dddddd"; }
  else if ( 'ta_responsible_top_outframe_bar_bottom_color' == $key_name ) { return "#dddddd"; }
  else if ( 'ta_responsible_outframe_bar_bottom_color' == $key_name ) { return "#dddddd"; }
  else if ( $text_general_key_name . '_bar_' . $pos . '_color' == $key_name ) { return "#00c0c0"; }
  else if ( $text_general_key_name . '_bar_' . $pos . '_color_grad_onoff' == $key_name ) { return "invalid"; }
  else if ( $text_general_key_name . '_bar_' . $pos . '_color_grd_direct' == $key_name ) { return "bottom"; }
  else if ( $text_general_key_name . '_bar_' . $pos . '_color_grd_start_color_select' == $key_name ) { return "selectable"; }
  else if ( $text_general_key_name . '_bar_' . $pos . '_color_grd_start_color' == $key_name ) { return "#ffffff"; }
  else if ( $text_general_key_name . '_bar_' . $pos . '_color_grd_mid_color_onoff' == $key_name ) { return "invalid"; }
  else if ( $text_general_key_name . '_bar_' . $pos . '_color_grd_mid_color_pos' == $key_name ) { return "50"; }
  else if ( $text_general_key_name . '_bar_' . $pos . '_color_grd_mid_color_select' == $key_name ) { return "selectable"; }
  else if ( $text_general_key_name . '_bar_' . $pos . '_color_grd_mid_color' == $key_name ) { return "#ffffff"; }
  else if ( $text_general_key_name . '_bar_' . $pos . '_color_grd_stop_color_select' == $key_name ) { return "selectable"; }
  else if ( $text_general_key_name . '_bar_' . $pos . '_color_grd_stop_color' == $key_name ) { return "#ffffff"; }
  else { return 'ta_no_fit'; }
}


/********* 初期化データを選択する関数 *********/
function ta_initdata_sel( $data1, $data2 ) {
  $init_reset_dataname = ( '' == get_option( '_ta_common_reset_dataname' ) ) ? 1 : get_option( '_ta_common_reset_dataname' );
  if ( 1 == $init_reset_dataname ) {
    $output = $data1;
  } else if ( 2 == $init_reset_dataname ) {
    $output = $data2;
  }
  return $output;
}


/********* 他データを参照する初期化データ関数 *********/
function ta_other_data( $keyname, $init ) {
  if ( false == get_option( '_' . $keyname ) ) {
    return $init;
  } else {
    return get_option( '_' . $keyname );
  }
}