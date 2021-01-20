<?php
/******************************************************************************************************************/
/*
/* テックエイドの成長する自作ホームページWordPressテーマ『 TAテーマ001 (ta-theme001) 』
/*
/* ta-admin-update.php: ( Latest Version 2.08 2017.04.11 )
/*
/* このプログラムの著作権、使用権、その他全ての権利はde集まれ株式会社に属します。
/* The copyright, royalty and all the other rights of this program belong to deatsumare Corporation.
/*
/* File Version 履歴
/* File Version 2.00 2016.03.07: first edition by Kotaro Kashiwamura.
/* File Version 2.01 2016.03.30: トップ最新投稿ダイジェスト位置、トップウィジェット位置追加
/*                               サイド各種投稿ダイジェスト位置、サイドウィジェット位置追加
/*                               フッターウィジェット位置追加、フリーPHP削除
/*                               ページ表示速度改善機能をプロへ変更
/*                               ヘッドラインに文字下線追加
/*                               SNSボタンオンオフ機能追加、viewport系の修正
/*                               ダイジェストデザインコンテンツグループ表示追加
/*                               ダイジェストデザイン記事境界線内の背景色追加 by Kotaro Kashiwamura.
/* File Version 2.02 2016.05.05: 設定ソースファイルのエクスポートにエラー通知追加
/*                               ta_thm001pro_style_last_update削除 by Kotaro Kashiwamura.
/* File Version 2.03 2016.06.20: レスポンシブデザイン専用ヘッドラインの追加
/*                               メインとサイドバーに装飾1～4の追加
/*                               ロゴエリア・連絡先エリアのコンテンツ表示方法追加
/*                               無効フレームサイズ、ヘッダー無効サイズの計算修正
/*                               他メニューの関連設定をブラウザ全幅表示設定に追加（利便性向上）
/*                               ProとHighendの統合 by Kotaro Kashiwamura.
/* File Version 2.04 2016.06.30: TA汎用背景装飾追加 by Kotaro Kashiwamura.
/* File Version 2.05 2016.08.29: 共通パラグラフ設定に高さと左右マージン追加、SEOツールの出力オンオフ追加、
/*                               パラグラフ設定追加、ta_headline_update_option修正、h1表記修正、
/*                               共通フォントにhover下線表示追加、各標準フォントにhover表示追加、
/*                               パンくずナビのメインコンテンツへの移動等の修正、
/*                               トップキャッチテキスト装飾追加、ダイジェストの抜粋文字装飾追加 by Kotaro Kashiwamura.
/* File Version 2.06 2016.09.26: SEO設定の集中管理画面追加 by Kotaro Kashiwamura.
/* File Version 2.07 2017.03.11: TAサイドバーメニュー追加、メイン・（サブ）サイドバー区切り線追加
/*                               背景色グラデーション、背景バー追加、サイトマップ修正、色選択修正
/*                               進捗表示追加、ajax化 by Kotaro Kashiwamura.
/* File Version 2.08 2017.04.11: ta_common_body_wrap_marginbottom_select追加 by Kotaro Kashiwamura.
/*
/******************************************************************************************************************/
if ( TA_HIEND_PI ) { require_once( TA_HIEND_PI_DIR . '/general-modules/ta-theme001-highend-update.php' ); }
require_once( TEMPLATEPATH . '/ta-modules/ta-php2css-modules/ta-dynamic-php2css.php' );
/********* 設定の更新 *********/
//共通設定メニュー
if ( isset( $_POST['page'] ) && 'ta_common_setting' == $_POST['page'] ) {
  if ( check_admin_referer( 'ta_common_nonce_key', 'ta_common_setting_menu' ) ) {
    $msg = '';
    $process = '';
    $create_dir = '';
    //プログレス表示開始
    update_option( '_ta_progress_value', 'waiting|しばらくお待ちください。' );
    $tab_name = isset( $_POST['tab_name'] ) ? $_POST['tab_name'] : '';
    $err = ta_common_items( $process, $create_dir, $tab_name );
    //CSSファイル生成
    if ( '' == $err ) {
      ta_dynamic_common_css_output( '', $tab_name );
    } else {
      echo $err;
    }
    //プログレス表示終了
    delete_option( '_ta_progress_value' );
    die();
  }
}
//便利ツールメニュー
if ( isset( $_POST['page'] ) && 'ta_tools_setting' == $_POST['page'] ) {
  if ( check_admin_referer( 'ta_tools_nonce_key', 'ta_tools_setting_menu' ) ) {
    $err = '';
    $msg = '';
    $value = '';
    $post_method = 'ajax';
    $allcss_onoff = isset( $_POST['ta_theme_allcss_onoff'] ) ? $_POST['ta_theme_allcss_onoff'] : 'invalid';
    $create_onoff = isset( $_POST['ta_common_setting_source_create_onoff'] ) ? $_POST['ta_common_setting_source_create_onoff'] : 'invalid';
    $create_name = isset( $_POST['ta_common_setting_source_create_name'] ) ? ta_namecheck( $_POST['ta_common_setting_source_create_name'] ) : ''; //英数字の判別（先頭は英字）
    $create_date_onoff = isset( $_POST['ta_common_setting_source_create_date_onoff'] ) ? $_POST['ta_common_setting_source_create_date_onoff'] : 'invalid';
    $create_memo = isset( $_POST['ta_common_setting_source_create_memo'] ) ? esc_html( $_POST['ta_common_setting_source_create_memo'] ) : '';     //htmlタグのエスケープ
    $selected_name = isset( $_POST['ta_common_selected_setting_source'] ) ? $_POST['ta_common_selected_setting_source'] : 'none';
    $delete_name = isset( $_POST['ta_common_delete_setting_source'] ) ? $_POST['ta_common_delete_setting_source'] : 'none';
    $download_name = isset( $_POST['ta_common_setting_source_download'] ) ? $_POST['ta_common_setting_source_download'] : 'none';
    $reset_dataname = isset( $_POST['ta_common_reset_dataname'] ) ? $_POST['ta_common_reset_dataname'] : 1;
    $reset_onoff = isset( $_POST['ta_common_reset_onoff'] ) ? $_POST['ta_common_reset_onoff'] : 'invalid';
    if ( 'none' != $selected_name ) { update_option( '_ta_common_selected_setting_source', $selected_name ); }
    //すべてのCSSファイル生成
    if ( 'valid' == $allcss_onoff ) {
      update_option( '_ta_progress_value', 'waiting|すべてのCSSファイルを生成しています。しばらくお待ちください。' );
      ta_dynamic_css_output( 'all' );
      $msg = 'allcssmsg=done';  //すべてのCSSファイルの生成完了
      echo $msg;
    }
    //設定ソースファイルによる初期化
    else if ( 'none' != $selected_name ) {
      if ( TA_HIEND_PI ) {
        $msg = ta_thm001highend_source_init( $selected_name );
        echo $msg;
      }
    }
    //設定ソースファイル作成
    else if ( 'valid' == $create_onoff ) {
      if ( TA_HIEND_PI ) {
        $value = ta_thm001highend_source_create( $create_name, $create_date_onoff, $create_memo );
        echo $value;
      }
    }
    //設定ソースファイルの削除
    else if ( 'none' != $delete_name ) {
      if ( TA_HIEND_PI ) {
        $value = ta_thm001highend_source_delete( $delete_name );
        echo $value;
      }
    }
    //設定ソースファイルのエクスポート
    else if ( 'none' != $download_name ) {
      if ( TA_HIEND_PI ) {
        $value = ta_thm001highend_source_export( $download_name );
        echo $value;
      }
    }
    //設定ソースファイルのインポート
    else if ( ! empty( $_FILES['ta_common_setting_source_upload']['name'] ) ) {
      if ( TA_HIEND_PI ) {
        $value = ta_thm001highend_source_import();
        if ( strstr( $value, 'uplderr=' ) ) {
          $err = str_replace( 'uplderr=', '&uplderr=', $value );
        } else if ( strstr( $value, 'upldmsg=' ) ) {
          $msg = str_replace( 'upldmsg=', '&upldmsg=', $value );
        }
        $post_method = 'post';
      }
    }
    //テーマ固有値への初期化
    else if ( 'valid' == $reset_onoff ) {
      $process = 'reset';
      $create_name = '';
      update_option( '_ta_progress_value', '0|共通設定を削除しています。' );
      ta_common_items( $process, $create_name );
      update_option( '_ta_progress_value', '6.4|便利ツール設定を削除しています。' );
      ta_tools_items( $process, $create_name );
      update_option( '_ta_progress_value', '8.0|汎用ショートコード設定を削除しています。' );
      ta_short_items( $process, $create_name );
      update_option( '_ta_progress_value', '17.4|トップページ設定を削除しています。' );
      ta_top_items( $process, $create_name );
      update_option( '_ta_progress_value', '21.6|ヘッダー設定を削除しています。' );
      ta_header_items( $process, $create_name );
      update_option( '_ta_progress_value', '25.1|メイン設定を削除しています。' );
      ta_main_items( $process, $create_name );
      update_option( '_ta_progress_value', '35.2|サイドバー設定を削除しています。' );
      ta_sidebar_items( $process, $create_name );
      update_option( '_ta_progress_value', '48.4|サブサイドバー設定を削除しています。' );
      ta_sidebarsub_items( $process, $create_name );
      update_option( '_ta_progress_value', '56.9|フッター設定を削除しています。' );
      ta_footer_items( $process, $create_name );
      update_option( '_ta_progress_value', '63.1|レスポンシブデザイン『基本・共通』設定を削除しています。' );
      ta_responsible_items( $process, $create_name );
      update_option( '_ta_progress_value', '65.9|レスポンシブデザイン『ヘッダー』設定を削除しています。' );
      ta_responsiblehead_items( $process, $create_name );
      update_option( '_ta_progress_value', '69.3|レスポンシブデザイン『メイン（トップ）』設定を削除しています。' );
      ta_responsiblemain_items( $process, $create_name );
      update_option( '_ta_progress_value', '79.2|レスポンシブデザイン『サイドバー』設定を削除しています。' );
      ta_responsibleside_items( $process, $create_name );
      update_option( '_ta_progress_value', '89.2|レスポンシブデザイン『サブサイドバー』設定を削除しています。' );
      ta_responsiblesidesub_items( $process, $create_name );
      update_option( '_ta_progress_value', '94.4|レスポンシブデザイン『フッター』設定を削除しています。' );
      ta_responsiblefoot_items( $process, $create_name );
      update_option( '_ta_progress_value', '99.8|SEO設定集中管理設定を削除しています。' );
      ta_seocentral_items( $process, $create_name );
      delete_option( '_ta_common_selected_setting_source' );
      update_option( '_ta_common_reset_dataname', $reset_dataname );
      //CSSファイル生成
      update_option( '_ta_progress_value', '100|すべてのCSSファイルを生成しています。しばらくお待ちください。' );
      ta_dynamic_css_output( 'all' );
      $msg = 'resetmsg=' . $reset_dataname;  //テーマ出荷時値への初期化成功
      echo $msg;
    }
    //通常処理
    else {
      $process = '';
      $create_dir = '';
      //プログレス表示開始
      update_option( '_ta_progress_value', 'waiting|しばらくお待ちください。' );
      $tab_name = isset( $_POST['tab_name'] ) ? $_POST['tab_name'] : '';
      ta_tools_items( $process, $create_dir, $tab_name );
      //CSSファイル生成
      ta_dynamic_tools_css_output( '', $tab_name );
    }
    if ( 'ajax' == $post_method ) {
      //プログレス表示終了
      delete_option( '_ta_progress_value' );
      die();
    } else {
      //プログレス表示終了
      delete_option( '_ta_progress_value' );
      //リダイレクト処理
      $page = isset( $_POST['page'] ) ? $_POST['page'] : '';
      $vtab = isset( $_POST['tab_name'] ) ? '&vtab=' . $_POST['tab_name'] : '';
      wp_safe_redirect( admin_url( 'admin.php?page=' ) . $page . $err . $msg . $vtab );
      exit;
    }
  }
}
//汎用ショートコード設定メニュー
if ( isset( $_POST['page'] ) && 'ta_short_setting' == $_POST['page'] ) {
  if ( check_admin_referer( 'ta_short_nonce_key', 'ta_short_setting_menu' ) ) {
    $process = '';
    $create_dir = '';
    //プログレス表示開始
    update_option( '_ta_progress_value', 'waiting|しばらくお待ちください。' );
    $tab_name = isset( $_POST['tab_name'] ) ? $_POST['tab_name'] : '';
    ta_short_items( $process, $create_dir, $tab_name );
    //CSSファイル生成
    ta_dynamic_short_css_output( '', $tab_name );
    //プログレス表示終了
    delete_option( '_ta_progress_value' );
    die();
  }
}
//トップページ設定メニュー
if ( isset( $_POST['page'] ) && 'ta_top_setting' == $_POST['page'] ) {
  if ( check_admin_referer( 'ta_top_nonce_key', 'ta_top_setting_menu' ) ) {
    $process = '';
    $create_dir = '';
    //プログレス表示開始
    update_option( '_ta_progress_value', 'waiting|しばらくお待ちください。' );
    $tab_name = isset( $_POST['tab_name'] ) ? $_POST['tab_name'] : '';
    ta_top_items( $process, $create_dir, $tab_name );
    //CSSファイル生成
    ta_dynamic_top_css_output( '', $tab_name );
    //プログレス表示終了
    delete_option( '_ta_progress_value' );
    die();
  }
}
//ヘッダー設定メニュー
if ( isset( $_POST['page'] ) && 'ta_header_setting' == $_POST['page'] ) {
  if ( check_admin_referer( 'ta_header_nonce_key', 'ta_header_setting_menu' ) ) {
    $process = '';
    $create_dir = '';
    //プログレス表示開始
    update_option( '_ta_progress_value', 'waiting|しばらくお待ちください。' );
    $tab_name = isset( $_POST['tab_name'] ) ? $_POST['tab_name'] : '';
    $err = ta_header_items( $process, $create_dir, $tab_name );
    //CSSファイル生成
    if ( '' == $err ) {
      ta_dynamic_header_css_output( '', $tab_name );
    } else {
      echo $err;
    }
    //プログレス表示終了
    delete_option( '_ta_progress_value' );
    die();
  }
}
//メイン設定メニュー
if ( isset( $_POST['page'] ) && 'ta_main_setting' == $_POST['page'] ) {
  if ( check_admin_referer( 'ta_main_nonce_key', 'ta_main_setting_menu' ) ) {
    $process = '';
    $create_dir = '';
    //プログレス表示開始
    update_option( '_ta_progress_value', 'waiting|しばらくお待ちください。' );
    $tab_name = isset( $_POST['tab_name'] ) ? $_POST['tab_name'] : '';
    ta_main_items( $process, $create_dir, $tab_name );
    //CSSファイル生成
    ta_dynamic_main_css_output( '', $tab_name );
    //プログレス表示終了
    delete_option( '_ta_progress_value' );
    die();
  }
}
//サイドバー設定メニュー
if ( isset( $_POST['page'] ) && 'ta_sidebar_setting' == $_POST['page'] ) {
  if ( check_admin_referer( 'ta_sidebar_nonce_key', 'ta_sidebar_setting_menu' ) ) {
    $process = '';
    $create_dir = '';
    //プログレス表示開始
    update_option( '_ta_progress_value', 'waiting|しばらくお待ちください。' );
    $tab_name = isset( $_POST['tab_name'] ) ? $_POST['tab_name'] : '';
    ta_sidebar_items( $process, $create_dir, $tab_name );
    //CSSファイル生成
    ta_dynamic_sidebar_css_output( '', $tab_name );
    //プログレス表示終了
    delete_option( '_ta_progress_value' );
    die();
  }
}
//サブサイドバー設定メニュー
if ( isset( $_POST['page'] ) && 'ta_sidebarsub_setting' == $_POST['page'] ) {
  if ( check_admin_referer( 'ta_sidebarsub_nonce_key', 'ta_sidebarsub_setting_menu' ) ) {
    $process = '';
    $create_dir = '';
    //プログレス表示開始
    update_option( '_ta_progress_value', 'waiting|しばらくお待ちください。' );
    $tab_name = isset( $_POST['tab_name'] ) ? $_POST['tab_name'] : '';
    ta_sidebarsub_items( $process, $create_dir, $tab_name );
    //CSSファイル生成
    ta_dynamic_sidebarsub_css_output( '', $tab_name );
    //プログレス表示終了
    delete_option( '_ta_progress_value' );
    die();
  }
}
//フッター設定メニュー
if ( isset( $_POST['page'] ) && 'ta_footer_setting' == $_POST['page'] ) {
  if ( check_admin_referer( 'ta_footer_nonce_key', 'ta_footer_setting_menu' ) ) {
    $process = '';
    $create_dir = '';
    //プログレス表示開始
    update_option( '_ta_progress_value', 'waiting|しばらくお待ちください。' );
    $tab_name = isset( $_POST['tab_name'] ) ? $_POST['tab_name'] : '';
    $err = ta_footer_items( $process, $create_dir, $tab_name );
    //CSSファイル生成
    if ( '' == $err ) {
      ta_dynamic_footer_css_output( '', $tab_name );
    } else {
      echo $err;
    }
    //プログレス表示終了
    delete_option( '_ta_progress_value' );
    die();
  }
}
//レスポンシブデザイン『基本・共通』設定メニュー
if ( isset( $_POST['page'] ) && 'ta_responsible_setting' == $_POST['page'] ) {
  if ( check_admin_referer( 'ta_responsible_nonce_key', 'ta_responsible_setting_menu' ) ) {
    $process = '';
    $create_dir = '';
    //プログレス表示開始
    update_option( '_ta_progress_value', 'waiting|しばらくお待ちください。' );
    $tab_name = isset( $_POST['tab_name'] ) ? $_POST['tab_name'] : '';
    ta_responsible_items( $process, $create_dir, $tab_name );
    //CSSファイル生成
    ta_dynamic_responsible_css_output( '', $tab_name );
    //プログレス表示終了
    delete_option( '_ta_progress_value' );
    die();
  }
}
//レスポンシブデザイン『ヘッダー』設定メニュー
if ( isset( $_POST['page'] ) && 'ta_responsiblehead_setting' == $_POST['page'] ) {
  if ( check_admin_referer( 'ta_responsiblehead_nonce_key', 'ta_responsiblehead_setting_menu' ) ) {
    $process = '';
    $create_dir = '';
    //プログレス表示開始
    update_option( '_ta_progress_value', 'waiting|しばらくお待ちください。' );
    $tab_name = isset( $_POST['tab_name'] ) ? $_POST['tab_name'] : '';
    ta_responsiblehead_items( $process, $create_dir, $tab_name );
    //CSSファイル生成
    ta_dynamic_responsiblehead_css_output();
    //プログレス表示終了
    delete_option( '_ta_progress_value' );
    die();
  }
}
//レスポンシブデザイン『メイン（トップページ）』設定メニュー
if ( isset( $_POST['page'] ) && 'ta_responsiblemain_setting' == $_POST['page'] ) {
  if ( check_admin_referer( 'ta_responsiblemain_nonce_key', 'ta_responsiblemain_setting_menu' ) ) {
    $process = '';
    $create_dir = '';
    //プログレス表示開始
    update_option( '_ta_progress_value', 'waiting|しばらくお待ちください。' );
    $tab_name = isset( $_POST['tab_name'] ) ? $_POST['tab_name'] : '';
    ta_responsiblemain_items( $process, $create_dir, $tab_name );
    //CSSファイル生成
    ta_dynamic_responsiblemain_css_output( '', $tab_name );
    //プログレス表示終了
    delete_option( '_ta_progress_value' );
    die();
  }
}
//レスポンシブデザイン『サイドバー』設定メニュー
if ( isset( $_POST['page'] ) && 'ta_responsibleside_setting' == $_POST['page'] ) {
  if ( check_admin_referer( 'ta_responsibleside_nonce_key', 'ta_responsibleside_setting_menu' ) ) {
    $process = '';
    $create_dir = '';
    //プログレス表示開始
    update_option( '_ta_progress_value', 'waiting|しばらくお待ちください。' );
    $tab_name = isset( $_POST['tab_name'] ) ? $_POST['tab_name'] : '';
    ta_responsibleside_items( $process, $create_dir, $tab_name );
    //CSSファイル生成
    ta_dynamic_responsibleside_css_output( '', $tab_name );
    //プログレス表示終了
    delete_option( '_ta_progress_value' );
    die();
  }
}
//レスポンシブデザイン『サブサイドバー』設定メニュー
if ( isset( $_POST['page'] ) && 'ta_responsiblesidesub_setting' == $_POST['page'] ) {
  if ( check_admin_referer( 'ta_responsiblesidesub_nonce_key', 'ta_responsiblesidesub_setting_menu' ) ) {
    $process = '';
    $create_dir = '';
    //プログレス表示開始
    update_option( '_ta_progress_value', 'waiting|しばらくお待ちください。' );
    $tab_name = isset( $_POST['tab_name'] ) ? $_POST['tab_name'] : '';
    ta_responsiblesidesub_items( $process, $create_dir, $tab_name );
    //CSSファイル生成
    ta_dynamic_responsiblesidesub_css_output( '', $tab_name );
    //プログレス表示終了
    delete_option( '_ta_progress_value' );
    die();
  }
}
//レスポンシブデザイン『フッター』設定メニュー
if ( isset( $_POST['page'] ) && 'ta_responsiblefoot_setting' == $_POST['page'] ) {
  if ( check_admin_referer( 'ta_responsiblefoot_nonce_key', 'ta_responsiblefoot_setting_menu' ) ) {
    $process = '';
    $create_dir = '';
    //プログレス表示開始
    update_option( '_ta_progress_value', 'waiting|しばらくお待ちください。' );
    $tab_name = isset( $_POST['tab_name'] ) ? $_POST['tab_name'] : '';
    ta_responsiblefoot_items( $process, $create_dir, $tab_name );
    //CSSファイル生成
    ta_dynamic_responsiblefoot_css_output( '', $tab_name );
    //プログレス表示終了
    delete_option( '_ta_progress_value' );
    die();
  }
}
//SEO設定集中管理設定メニュー
if ( isset( $_POST['page'] ) && 'ta_seocentral_setting' == $_POST['page'] ) {
  if ( check_admin_referer( 'ta_seocentral_nonce_key', 'ta_seocentral_setting_menu' ) ) {
    $process = '';
    $create_dir = '';
    //プログレス表示開始
    update_option( '_ta_progress_value', 'waiting|しばらくお待ちください。' );
    $tab_name = isset( $_POST['tab_name'] ) ? $_POST['tab_name'] : '';
    ta_seocentral_items( $process, $create_dir, $tab_name );
    //プログレス表示終了
    delete_option( '_ta_progress_value' );
    die();
  }
}
if ( isset( $_POST['ta_seocentral_post_value_setting_submit'] ) && $_POST['ta_seocentral_post_value_setting_submit'] ) {
  if ( check_admin_referer( 'ta_seocentral_post_value_nonce_key', 'ta_seocentral_post_value_setting_menu' ) ) {
    $post_id = isset( $_POST['post_id'] ) ? $_POST['post_id'] : '';
    ta_update_postmeta( $post_id, 'ta_post_seo_keywords', 'strip_html' );
    ta_update_postmeta( $post_id, 'ta_post_seo_description', 'excerpt_nocr', 120 );
    ta_update_postmeta( $post_id, 'ta_post_h1_content', 'text' );
    ta_update_postmeta( $post_id, 'ta_post_canonical_domain', 'url' );
    //リダイレクト処理
    $page = 'ta_seocentral_setting';
    $paged = isset( $_POST['paged'] ) ? $_POST['paged'] : '';
    if ( 1 == $paged ) { $paged = ''; } else { $paged = '&paged=' . $paged; }
    $vtab = isset( $_POST['vtab'] ) ? '&vtab=' . $_POST['vtab'] : '';
    wp_safe_redirect( admin_url( 'admin.php?page=' ) . $page . $paged . $vtab );
    exit;
  }
}


/********* CSSファイル生成 *********/
//共通設定メニュー
if ( isset( $_POST['ta_common_cssfile_create'] ) ) {
  if ( check_admin_referer( 'ta_common_nonce_key', 'ta_common_setting_menu' ) ) {
    //プログレス表示開始
    update_option( '_ta_progress_value', 'waiting|すべてのCSSファイルを生成しています。しばらくお待ちください。' );
    //CSSファイル生成
    ta_dynamic_common_css_output( 'all' );
    //プログレス表示終了
    delete_option( '_ta_progress_value' );
    die();
  }
}
//便利ツールメニュー
if ( isset( $_POST['ta_tools_cssfile_create'] ) ) {
  if ( check_admin_referer( 'ta_tools_nonce_key', 'ta_tools_setting_menu' ) ) {
    //プログレス表示開始
    update_option( '_ta_progress_value', 'waiting|すべてのCSSファイルを生成しています。しばらくお待ちください。' );
    //CSSファイル生成
    ta_dynamic_tools_css_output( 'all' );
    //プログレス表示終了
    delete_option( '_ta_progress_value' );
    die();
  }
}
//汎用ショートコード設定メニュー
if ( isset( $_POST['ta_short_cssfile_create'] ) ) {
  if ( check_admin_referer( 'ta_short_nonce_key', 'ta_short_setting_menu' ) ) {
    //プログレス表示開始
    update_option( '_ta_progress_value', 'waiting|すべてのCSSファイルを生成しています。しばらくお待ちください。' );
    //CSSファイル生成
    ta_dynamic_short_css_output( 'all' );
    //プログレス表示終了
    delete_option( '_ta_progress_value' );
    die();
  }
}
//トップページ設定メニュー
if ( isset( $_POST['ta_top_cssfile_create'] ) ) {
  if ( check_admin_referer( 'ta_top_nonce_key', 'ta_top_setting_menu' ) ) {
    //プログレス表示開始
    update_option( '_ta_progress_value', 'waiting|すべてのCSSファイルを生成しています。しばらくお待ちください。' );
    //CSSファイル生成
    ta_dynamic_top_css_output( 'all' );
    //プログレス表示終了
    delete_option( '_ta_progress_value' );
    die();
  }
}
//ヘッダー設定メニュー
if ( isset( $_POST['ta_header_cssfile_create'] ) ) {
  if ( check_admin_referer( 'ta_header_nonce_key', 'ta_header_setting_menu' ) ) {
    //プログレス表示開始
    update_option( '_ta_progress_value', 'waiting|すべてのCSSファイルを生成しています。しばらくお待ちください。' );
    //CSSファイル生成
    ta_dynamic_header_css_output( 'all' );
    //プログレス表示終了
    delete_option( '_ta_progress_value' );
    die();
  }
}
//メイン設定メニュー
if ( isset( $_POST['ta_main_cssfile_create'] ) ) {
  if ( check_admin_referer( 'ta_main_nonce_key', 'ta_main_setting_menu' ) ) {
    //プログレス表示開始
    update_option( '_ta_progress_value', 'waiting|すべてのCSSファイルを生成しています。しばらくお待ちください。' );
    //CSSファイル生成
    ta_dynamic_main_css_output( 'all' );
    //プログレス表示終了
    delete_option( '_ta_progress_value' );
    die();
  }
}
//サイドバー設定メニュー
if ( isset( $_POST['ta_sidebar_cssfile_create'] ) ) {
  if ( check_admin_referer( 'ta_sidebar_nonce_key', 'ta_sidebar_setting_menu' ) ) {
    //プログレス表示開始
    update_option( '_ta_progress_value', 'waiting|すべてのCSSファイルを生成しています。しばらくお待ちください。' );
    //CSSファイル生成
    ta_dynamic_sidebar_css_output( 'all' );
    //プログレス表示終了
    delete_option( '_ta_progress_value' );
    die();
  }
}
//サブサイドバー設定メニュー
if ( isset( $_POST['ta_sidebarsub_cssfile_create'] ) ) {
  if ( check_admin_referer( 'ta_sidebarsub_nonce_key', 'ta_sidebarsub_setting_menu' ) ) {
    //プログレス表示開始
    update_option( '_ta_progress_value', 'waiting|すべてのCSSファイルを生成しています。しばらくお待ちください。' );
    //CSSファイル生成
    ta_dynamic_sidebarsub_css_output( 'all' );
    //プログレス表示終了
    delete_option( '_ta_progress_value' );
    die();
  }
}
//フッター設定メニュー
if ( isset( $_POST['ta_footer_cssfile_create'] ) ) {
  if ( check_admin_referer( 'ta_footer_nonce_key', 'ta_footer_setting_menu' ) ) {
    //プログレス表示開始
    update_option( '_ta_progress_value', 'waiting|すべてのCSSファイルを生成しています。しばらくお待ちください。' );
    //CSSファイル生成
    ta_dynamic_footer_css_output( 'all' );
    //プログレス表示終了
    delete_option( '_ta_progress_value' );
    die();
  }
}
//レスポンシブデザイン『基本・共通』設定メニュー
if ( isset( $_POST['ta_responsible_cssfile_create'] ) ) {
  if ( check_admin_referer( 'ta_responsible_nonce_key', 'ta_responsible_setting_menu' ) ) {
    //プログレス表示開始
    update_option( '_ta_progress_value', 'waiting|すべてのCSSファイルを生成しています。しばらくお待ちください。' );
    //CSSファイル生成
    ta_dynamic_responsible_css_output( 'all' );
    //プログレス表示終了
    delete_option( '_ta_progress_value' );
    die();
  }
}
//レスポンシブデザイン『ヘッダー』設定メニュー
if ( isset( $_POST['ta_responsiblehead_cssfile_create'] ) ) {
  if ( check_admin_referer( 'ta_responsiblehead_nonce_key', 'ta_responsiblehead_setting_menu' ) ) {
    //プログレス表示開始
    update_option( '_ta_progress_value', 'waiting|すべてのCSSファイルを生成しています。しばらくお待ちください。' );
    //CSSファイル生成
    ta_dynamic_responsiblehead_css_output( 'all' );
    //プログレス表示終了
    delete_option( '_ta_progress_value' );
    die();
  }
}
//レスポンシブデザイン『メイン（トップページ）』設定メニュー
if ( isset( $_POST['ta_responsiblemain_cssfile_create'] ) ) {
  if ( check_admin_referer( 'ta_responsiblemain_nonce_key', 'ta_responsiblemain_setting_menu' ) ) {
    //プログレス表示開始
    update_option( '_ta_progress_value', 'waiting|すべてのCSSファイルを生成しています。しばらくお待ちください。' );
    //CSSファイル生成
    ta_dynamic_responsiblemain_css_output( 'all' );
    //プログレス表示終了
    delete_option( '_ta_progress_value' );
    die();
  }
}
//レスポンシブデザイン『サイドバー』設定メニュー
if ( isset( $_POST['ta_responsibleside_cssfile_create'] ) ) {
  if ( check_admin_referer( 'ta_responsibleside_nonce_key', 'ta_responsibleside_setting_menu' ) ) {
    //プログレス表示開始
    update_option( '_ta_progress_value', 'waiting|すべてのCSSファイルを生成しています。しばらくお待ちください。' );
    //CSSファイル生成
    ta_dynamic_responsibleside_css_output( 'all' );
    //プログレス表示終了
    delete_option( '_ta_progress_value' );
    die();
  }
}
//レスポンシブデザイン『サブサイドバー』設定メニュー
if ( isset( $_POST['ta_responsiblesidesub_cssfile_create'] ) ) {
  if ( check_admin_referer( 'ta_responsiblesidesub_nonce_key', 'ta_responsiblesidesub_setting_menu' ) ) {
    //プログレス表示開始
    update_option( '_ta_progress_value', 'waiting|すべてのCSSファイルを生成しています。しばらくお待ちください。' );
    //CSSファイル生成
    ta_dynamic_responsiblesidesub_css_output( 'all' );
    //プログレス表示終了
    delete_option( '_ta_progress_value' );
    die();
  }
}
//レスポンシブデザイン『フッター』設定メニュー
if ( isset( $_POST['ta_responsiblefoot_cssfile_create'] ) ) {
  if ( check_admin_referer( 'ta_responsiblefoot_nonce_key', 'ta_responsiblefoot_setting_menu' ) ) {
    //プログレス表示開始
    update_option( '_ta_progress_value', 'waiting|すべてのCSSファイルを生成しています。しばらくお待ちください。' );
    //CSSファイル生成
    ta_dynamic_responsiblefoot_css_output( 'all' );
    //プログレス表示終了
    delete_option( '_ta_progress_value' );
    die();
  }
}


/******************************************************************************************/
/********************************** UPDATE関数（設定用）**********************************/
/******************************************************************************************/
/********* 共通設定メニューアイテム関数 *********/
function ta_common_items( $process = '', $create_dir = '', $tab_name = 'all' ) {
  //フレームサイズエラー処理
  if ( 'reset' != $process && 'create' != $process && 'frame' == $tab_name ) {
    $ta_common_frame_type       = isset( $_POST['ta_common_frame_type'] ) ? $_POST['ta_common_frame_type'] : 'none';
    $ta_common_side2wrap_onoff  = isset( $_POST['ta_common_side2wrap_onoff'] ) ? $_POST['ta_common_side2wrap_onoff'] : 'none';
    $ta_common_sidebar_width    = isset( $_POST['ta_common_sidebar_width'] ) ? $_POST['ta_common_sidebar_width'] : 'none';
    $ta_common_sidebarsub_width = isset( $_POST['ta_common_sidebarsub_width'] ) ? $_POST['ta_common_sidebarsub_width'] : 'none';
    $ta_common_mainright_margin = isset( $_POST['ta_common_mainright_margin'] ) ? $_POST['ta_common_mainright_margin'] : 'none';
    $ta_common_mainleft_margin  = isset( $_POST['ta_common_mainleft_margin'] ) ? $_POST['ta_common_mainleft_margin'] : 'none';
    if ( 'main_sidebar' == $ta_common_frame_type ) {
      $ta_common_sidebarsub_width = '0';
      if ( ! ( TA_HIEND_PI && 'valid' == $ta_common_side2wrap_onoff ) ) {
        $ta_common_mainleft_margin = '0';
      }
    } else if ( 'sidebar_main' == $ta_common_frame_type ) {
      $ta_common_sidebarsub_width = '0';
      if ( ! ( TA_HIEND_PI && 'valid' == $ta_common_side2wrap_onoff ) ) {
        $ta_common_mainright_margin = '0';
      }
    } else if ( 'main_only' == $ta_common_frame_type ) {
      $ta_common_sidebar_width = '0';
      $ta_common_sidebarsub_width = '0';
      if ( ! ( TA_HIEND_PI && 'valid' == $ta_common_side2wrap_onoff ) ) {
        $ta_common_mainleft_margin = '0';
        $ta_common_mainright_margin = '0';
      }
    }
    if ( 'none' == $ta_common_sidebar_width || 'none' == $ta_common_sidebarsub_width || 'none' == $ta_common_mainright_margin || 'none' == $ta_common_mainleft_margin ) {
      return 'normalerr=frm_det';  //受信データエラー（予期しないエラー）
    } else if ( ( $ta_common_sidebar_width + $ta_common_sidebarsub_width + $ta_common_mainright_margin + $ta_common_mainleft_margin ) > 100 ) {
      return 'normalerr=frm_over'; //フレーム幅計算が100%を超える
    } 
  }
  //フレーム
  if ( 'all' == $tab_name || 'frame' == $tab_name ) {
    //デモ画像
    ta_update_option( $process, $create_dir, 'ta_theme_demo', 'single_check' );
    //フレームタイプ
    ta_update_option( $process, $create_dir, 'ta_common_frame_type', 'as_is' );
    //フレームサイズ
    ta_update_option( $process, $create_dir, 'ta_common_frame_width', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_wrap_add_width', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_sidebar_width', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_sidebarsub_width', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_mainleft_margin', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_mainright_margin', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_frame_size_check_onoff', 'single_check' );
    //サイドバー・サブサイドバーの位置（フレーム外への移動）
    if ( TA_HIEND_PI ) { ta_thm001highend_fullwidth_update( $process, $create_dir ); }
    //コンテンツフレーム位置
    ta_update_option( $process, $create_dir, 'ta_common_container_paddingtop', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_body_wrap_marginbottom_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_body_wrap_marginbottom', 'numeral' );
  }
  //フレーム(例外処理)
  if ( 'frame' == $tab_name ) {
    if ( TA_HIEND_PI ) {
      //ヘッダーバナーエリアの位置（フレーム外への移動）
      ta_thm001highend_bannerarea2wrap_update( $process, $create_dir );
      //グローバルメニューとヘッダー画像の位置（メイン枠への移動）
      ta_thm001highend_glblnv_img_2main_update( $process, $create_dir );
      //フッターの位置（メイン枠への移動）
      ta_thm001highend_footer_container2main_update( $process, $create_dir );
    }
  }
  //カラー・フォント
  if ( 'all' == $tab_name || 'basic' == $tab_name ) {
    //サイトイメージカラー
    ta_update_option( $process, $create_dir, 'ta_common_site_bg_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_site_hl_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_site_text_on_bg_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_site_text_on_hl_color', 'as_is' );
    //フォント
    ta_update_option( $process, $create_dir, 'ta_common_font_family', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_font_size', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_font_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_font_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_font_anchor_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_font_anchor_under', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_common_font_anchor_colorhover', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_font_anchor_underhover', 'single_check' );
    //その他共通デザイン
    ta_update_option( $process, $create_dir, 'ta_common_font_p_lineheight', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_font_p_topmargin', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_font_p_bottommargin', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_font_p_leftmargin', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_font_p_rightmargin', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_font_aimg_opacity', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_font_aimg_opacityhover', 'numeral' );
  }
  //背景色・背景画像
  if ( 'all' == $tab_name || 'background' == $tab_name ) {
    //トップページのフレーム外背景色・背景画像
    ta_update_option( $process, $create_dir, 'ta_common_top_outframe_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_top_outframe_color', 'as_is' );
    ta_gradient_color_update_option( $process, $create_dir, 'ta_common_top_outframe_color' );
    ta_update_option( $process, $create_dir, 'ta_common_top_outframe_pic', 'url' );
    ta_update_option( $process, $create_dir, 'ta_common_top_outframe_pic_rule', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_top_outframe_pic_margin', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_top_outframe_pic2', 'url' );
    ta_update_option( $process, $create_dir, 'ta_common_top_outframe_pic2_rule', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_top_outframe_pic2_margin', 'numeral' );
    //トップページ以外のフレーム外背景色・背景画像
    ta_update_option( $process, $create_dir, 'ta_common_outframe_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_outframe_color', 'as_is' );
    ta_gradient_color_update_option( $process, $create_dir, 'ta_common_outframe_color' );
    ta_update_option( $process, $create_dir, 'ta_common_outframe_pic', 'url' );
    ta_update_option( $process, $create_dir, 'ta_common_outframe_pic_rule', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_outframe_pic_margin', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_outframe_pic2', 'url' );
    ta_update_option( $process, $create_dir, 'ta_common_outframe_pic2_rule', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_outframe_pic2_margin', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_outframe_bar1_onoff', 'single_check' );
  }
  //背景バー
  if ( 'all' == $tab_name || 'bgbar' == $tab_name ) {
    //トップページの背景バー
    ta_bg_bar_update_option( $process, $create_dir, 'ta_common_top_outframe', 'top' );
    ta_bg_bar_update_option( $process, $create_dir, 'ta_common_top_outframe', 'bottom' );
    ta_bg_bar_update_option( $process, $create_dir, 'ta_common_top_outframe', 'gmenu' );
    ta_bg_bar_update_option( $process, $create_dir, 'ta_common_top_outframe', 'free' );
    //トップページ以外の背景バー
    ta_bg_bar_update_option( $process, $create_dir, 'ta_common_outframe', 'top' );
    ta_bg_bar_update_option( $process, $create_dir, 'ta_common_outframe', 'bottom' );
    ta_bg_bar_update_option( $process, $create_dir, 'ta_common_outframe', 'gmenu' );
    ta_bg_bar_update_option( $process, $create_dir, 'ta_common_outframe', 'free' );
  }
  //各種ページ表示
  if ( 'all' == $tab_name || 'contents' == $tab_name ) {
    //固定ページ共通設定
    ta_update_option( $process, $create_dir, 'ta_common_page_h1_disp', 'as_is' );
    ta_parts_select_update_option( $process, $create_dir, 'ta_common_page_custom' );
    ta_top_margin_update_option( $process, $create_dir, 'ta_common_page' );
    ta_update_option( $process, $create_dir, 'ta_common_page_eyecatch_onoff', 'single_check' );
    //投稿記事共通設定
    ta_update_option( $process, $create_dir, 'ta_common_post_h1_disp', 'as_is' );
    ta_parts_select_update_option( $process, $create_dir, 'ta_common_post_custom' );
    ta_top_margin_update_option( $process, $create_dir, 'ta_common_post' );
    ta_update_option( $process, $create_dir, 'ta_common_post_eyecatch_size', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_post_eyecatch_position', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_post_title_timecat', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_post_timecat', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_post_time_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_common_post_cat_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_common_post_time_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_post_time_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_post_time_size', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_post_time_weight', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_post_watchmark_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_common_post_cat_size', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_post_cat_weight', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_post_cat_height', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_post_cat_width', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_post_cat_round', 'numeral' );
    //一覧（アーカイブ）
    ta_update_option( $process, $create_dir, 'ta_common_listpage_h1_disp', 'as_is' );
    ta_parts_select_update_option( $process, $create_dir, 'ta_common_listpage' );
    ta_update_option( $process, $create_dir, 'ta_common_listpage_indexfollow', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_listpage_pager_type', 'as_is' );
    ta_top_margin_update_option( $process, $create_dir, 'ta_common_listpage' );
    ta_update_option( $process, $create_dir, 'ta_common_listpage_full_content_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_common_listpage_post_distance', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_listpage_row_num', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_listpage_row_distance', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_listpage_post_border_type', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_listpage_post_border_size', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_listpage_post_border_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_listpage_post_border_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_listpage_post_border_bgcolor_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_listpage_post_border_bgcolor', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_listpage_post_border_kind', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_listpage_post_border_padding', 'numeral' );
    ta_article_digest_design_update_option( $process, $create_dir, 'common_listpage' );
  }
  //各種ページ閲覧制限
  if ( 'all' == $tab_name || 'limit' == $tab_name ) {
    if ( TA_HIEND_PI ) { ta_thm001highend_common_view_limit_update( $process, $create_dir ); }
  }
  //SEO・SMO
  if ( 'all' == $tab_name || 'seosmo' == $tab_name ) {
    //SEO
    ta_update_option( $process, $create_dir, 'ta_common_seo_title_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_common_seo_keywords_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_common_seo_description_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_common_seo_common_keywords', 'strip_html' );
    ta_update_option( $process, $create_dir, 'ta_common_seo_common_description', 'excerpt_nocr', 120 );
    ta_update_option( $process, $create_dir, 'ta_common_seo_common_h1_content', 'text' );
    ta_update_option( $process, $create_dir, 'ta_common_seo_site_title_format', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_seo_cat_keywordonoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_common_seo_tag_keywordonoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_common_seo_description_excerptonoff', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_seo_h1_commononoff', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_seo_h1_after_content_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_common_seo_h1_after_content', 'text' );
    ta_update_option( $process, $create_dir, 'ta_common_seo_canonicalonoff', 'single_check' );
    //SMO
    //SNSボタン
    ta_update_option( $process, $create_dir, 'ta_common_smo_sns_button_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_common_smo_header_display_sns', 'check_array' );
    ta_update_option( $process, $create_dir, 'ta_common_smo_main_display_sns', 'check_array' );
    ta_update_option( $process, $create_dir, 'ta_common_smo_page_common_sns_position', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_smo_post_common_sns_position', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_smo_listpage_sns_position', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_smo_top_sns_top_toppadding', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_smo_top_sns_top_bottompadding', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_smo_top_sns_bottom_toppadding', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_smo_top_sns_bottom_bottompadding', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_smo_page_sns_top_toppadding', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_smo_page_sns_top_bottompadding', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_smo_page_sns_bottom_toppadding', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_smo_page_sns_bottom_bottompadding', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_smo_post_sns_top_toppadding', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_smo_post_sns_top_bottompadding', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_smo_post_sns_bottom_toppadding', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_smo_post_sns_bottom_bottompadding', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_smo_listpage_sns_top_toppadding', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_smo_listpage_sns_top_bottompadding', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_smo_listpage_sns_bottom_toppadding', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_smo_listpage_sns_bottom_bottompadding', 'numeral' );
    //OGP
    ta_update_option( $process, $create_dir, 'ta_common_smo_ogp_common_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_common_smo_ogp_admins', 'strip_html' );
    ta_update_option( $process, $create_dir, 'ta_common_smo_ogp_appid', 'strip_html' );
    ta_update_option( $process, $create_dir, 'ta_common_smo_ogp_common_image', 'url' );
    ta_update_option( $process, $create_dir, 'ta_common_smo_ogp_def_img', 'as_is' );
    //Twitter Cards
    ta_update_option( $process, $create_dir, 'ta_common_smo_twittercards_common_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_common_smo_twittercards_account', 'strip_html' );
    ta_update_option( $process, $create_dir, 'ta_common_smo_twittercards_common_image', 'url' );
    ta_update_option( $process, $create_dir, 'ta_common_smo_twittercards_def_img', 'as_is' );
  }
  //サイトマップ
  if ( 'all' == $tab_name || 'sitemap' == $tab_name ) {
    ta_update_option( $process, $create_dir, 'ta_common_sitemap_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_common_sitemap_disp_contents', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_sitemap_link_newwin_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_common_sitemap_page_title', 'strip_html' );
    ta_update_option( $process, $create_dir, 'ta_common_sitemap_cat_title', 'strip_html' );
    ta_update_option( $process, $create_dir, 'ta_common_sitemap_disp_depth_num', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_sitemap_cat_postnum_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_common_sitemap_cat_parent_postnum_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_common_sitemap_cat_num_limit', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_sitemap_cat_disp_nopost_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_common_sitemap_page_slug', 'strip_html' );
    //デザイン設定
    ta_update_option( $process, $create_dir, 'ta_common_sitemap_title_factor', 'as_is' );
    ta_sitemap_general_update_option( $process, $create_dir, 'ta_common_sitemap_parent' );     //親項目の詳細設定
    ta_sitemap_general_update_option( $process, $create_dir, 'ta_common_sitemap_children' );   //子孫項目の詳細設定
  }
  //フリーCSS・JS
  if ( 'all' == $tab_name || 'freecssjsphp' == $tab_name ) {
    //フリーCSS
    ta_update_option( $process, $create_dir, 'ta_common_freecss_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_common_freecss_code', 'text' );
    //フリーJavaScript
    if ( TA_HIEND_PI ) { ta_thm001highend_freejs_update( $process, $create_dir ); }
  }
  //その他
  if ( 'all' == $tab_name || 'etc' == $tab_name ) {
    //コメント機能
    ta_update_option( $process, $create_dir, 'ta_common_comment_func_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_common_comment_disp_title_factor', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_comment_disp_title', 'strip_html' );
    ta_update_option( $process, $create_dir, 'ta_common_comment_disp_avatar_size', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_comment_write_title_factor', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_comment_write_title', 'strip_html' );
    //モバイル端末のランドスケープ表示
    ta_update_option( $process, $create_dir, 'ta_common_landscape_no_as_onoff', 'single_check' );
    //エラー４０４表示
    ta_update_option( $process, $create_dir, 'ta_common_error404_title', 'strip_html' );
    ta_update_option( $process, $create_dir, 'ta_common_error404_freetext', 'text' );
    //メンテナンスモード
    ta_update_option( $process, $create_dir, 'ta_common_mainte_mode_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_common_mainte_work_person', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_mainte_title', 'text' );
    ta_update_option( $process, $create_dir, 'ta_common_mainte_subtitle', 'text' );
    ta_update_option( $process, $create_dir, 'ta_common_mainte_content', 'text' );
    ta_update_option( $process, $create_dir, 'ta_common_mainte_copyright', 'text' );
    ta_update_option( $process, $create_dir, 'ta_common_mainte_mode_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_mainte_mode_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_mainte_font_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_mainte_font_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_mainte_font_anchor_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_mainte_font_anchor_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_mainte_font_anchor_under', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_common_mainte_font_anchor_underhover', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_common_mainte_font_anchor_colorhover_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_mainte_font_anchor_colorhover', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_mainte_login_onoff', 'single_check' );
    //管理画面アクセス制限
    ta_update_option( $process, $create_dir, 'ta_common_adminpage_limit', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_adminpage_limit_bar_onoff', 'single_check' );
    //JavaScript未使用（未設定）ブラウザへの注意文表示
    ta_update_option( $process, $create_dir, 'ta_common_js_warning_onoff', 'single_check' );
  }
}


/********* 便利ツールメニューアイテム関数 *********/
function ta_tools_items( $process = '', $create_dir = '', $tab_name = 'all' ) {
  //フレーム
  if ( 'all' == $tab_name || 'frame' == $tab_name ) {
    //CSSファイル生成
    ta_update_option( $process, $create_dir, 'ta_theme_no_cssfile', 'single_check' );
    //wpautop関数
    if ( TA_HIEND_PI ) { ta_thm001highend_wpautop_invalid_update( $process, $create_dir ); }
    //挿入画像の「リンク先」の初期値
    $value = isset( $_POST['image_default_link_type'] ) ? $_POST['image_default_link_type'] : 'none';
    update_option( 'image_default_link_type', $value );
    //ページスロー表示
    if ( TA_HIEND_PI ) { ta_thm001highend_slowshow_update( $process, $create_dir ); }
    //制御用コード挿入
    if ( TA_HIEND_PI ) { ta_thm001highend_insert_dscrptn_update( $process, $create_dir ); }
  }
  //ページャー
  if ( 'all' == $tab_name || 'pager' == $tab_name ) {
    //ページャー（ページ番号表記タイプ）
    ta_update_option( $process, $create_dir, 'ta_common_pager1_text_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_pager1_text_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_pager1_margintop', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_pager1_text_size', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_pager1_text_weight', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_pager1_text_colorhover_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_pager1_text_colorhover', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_pager1_text_bgcolor_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_pager1_text_bgcolor', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_pager1_text_bgcolorhover_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_pager1_text_bgcolorhover', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_pager1_text_paddingtb', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_pager1_text_paddinglr', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_pager1_frame_size', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_pager1_frame_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_pager1_frame_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_pager1_frame_colorhover_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_pager1_frame_colorhover', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_pager1_selected_text_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_pager1_selected_text_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_pager1_selected_text_bgcolor_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_pager1_selected_text_bgcolor', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_pager1_selected_frame_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_pager1_selected_frame_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_pager1_dots_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_pager1_dots_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_pager1_dots_weight', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_pager1_mid_size', 'numeral' );
    //ページャー（前次表記タイプ）
    ta_update_option( $process, $create_dir, 'ta_common_pager_prenext_pre_name', 'strip_html' );
    ta_update_option( $process, $create_dir, 'ta_common_pager_prenext_next_name', 'strip_html' );
    ta_update_option( $process, $create_dir, 'ta_common_pager_prenext_margintop', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_pager_prenext_underline_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_common_pager_prenext_size', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_pager_prenext_weight', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_pager_prenext_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_pager_prenext_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_pager_prenext_colorhover_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_pager_prenext_colorhover', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_pager_prenext_bgcolor_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_pager_prenext_bgcolor', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_pager_prenext_bgcolorhover_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_pager_prenext_bgcolorhover', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_pager_prenext_height', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_pager_prenext_minwidth', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_pager_prenext_round', 'numeral' );
    //ページャー（投稿の前後記事へのリンク）
    ta_update_option( $process, $create_dir, 'ta_common_pager2_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_common_pager2_text_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_pager2_pre_insert', 'strip_html' );
    ta_update_option( $process, $create_dir, 'ta_common_pager2_after_insert', 'strip_html' );
    ta_update_option( $process, $create_dir, 'ta_common_pager2_text_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_pager2_margintop', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_pager2_marginleft', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_pager2_marginright', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_pager2_text_size', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_pager2_text_weight', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_pager2_text_colorhover_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_pager2_text_colorhover', 'as_is' );
  }
  //装飾・小物
  if ( 'all' == $tab_name || 'gadget' == $tab_name ) {
    //パンくずナビ
    ta_update_option( $process, $create_dir, 'ta_common_bread_top_text', 'strip_html' );
    ta_update_option( $process, $create_dir, 'ta_common_bread_text_between_pages', 'strip_html' );
    ta_update_option( $process, $create_dir, 'ta_common_bread_tomain_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_common_bread_parent_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_bread_parent_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_bread_current_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_bread_current_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_bread_parent_colorhover_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_bread_parent_colorhover', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_bread_parent_underonoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_common_bread_text_size', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_bread_text_weight', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_bread_paddingtop', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_bread_paddingleft', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_bread_paddingbottom', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_bread_margin2arrow', 'numeral' );
    //バックトゥートップスクロール
    ta_update_option( $process, $create_dir, 'ta_common_back2top_disponoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_common_back2top_img', 'url' );
    ta_update_option( $process, $create_dir, 'ta_common_back2top_img_height', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_back2top_img_opacity', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_back2top_img_opacityhover', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_back2top_text', 'strip_html' );
    ta_update_option( $process, $create_dir, 'ta_common_back2top_text_size', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_back2top_text_weight', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_back2top_text_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_back2top_text_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_back2top_text_under', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_common_back2top_text_underhover', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_common_back2top_text_bgcolor_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_back2top_text_bgcolor', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_back2top_text_colorhover_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_back2top_text_colorhover', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_back2top_text_bgcolorhover_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_back2top_text_bgcolorhover', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_back2top_text_height', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_back2top_text_lr_padding', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_back2top_text_round', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_back2top_text_round_upper_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_common_back2top_text_fixed_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_common_back2top_text_fixed_bottom', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_back2top_text_fixed_right', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_back2top_topmargin', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_back2top_position', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_back2top_edge_margin', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_back2top_fm_top_amount', 'numeral' );
    //ファビコン
    ta_update_option( $process, $create_dir, 'ta_common_favicon_disponoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_common_favicon_img', 'url' );
    //アップルタッチアイコン
    ta_update_option( $process, $create_dir, 'ta_common_appletouch_disponoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_common_appletouch_img', 'url' );
  }
}


/********* 汎用ショートコードメニューアイテム関数 *********/
function ta_short_items( $process = '', $create_dir = '', $tab_name = 'all' ) {
  //簡易最新投稿ダイジェスト設定
  if ( 'all' == $tab_name || 'simple' == $tab_name ) {
    ta_update_option( $process, $create_dir, 'ta_common_simple_latestposts_title_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_common_simple_latestposts_title_factor', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_simple_latestposts_title', 'strip_html' );
    ta_update_option( $process, $create_dir, 'ta_common_simple_latestposts_nodis_cats', 'check_array' );
    ta_update_option( $process, $create_dir, 'ta_common_simple_latestposts_num', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_simple_latestposts_padding', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_simple_latestposts_post_border_size', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_simple_latestposts_post_border_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_simple_latestposts_post_border_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_simple_latestposts_post_border_kind', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_simple_latestposts_post_title_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_simple_latestposts_post_title_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_simple_latestposts_post_title_color_hover_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_simple_latestposts_post_title_color_hover', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_simple_latestposts_post_title_underline_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_common_simple_latestposts_post_title_underlinehover_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_common_simple_latestposts_post_newwin_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_common_simple_latestposts_post_title_size', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_simple_latestposts_post_title_weight', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_simple_latestposts_time_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_simple_latestposts_time_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_simple_latestposts_time_weight', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_simple_latestposts_time_width', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_simple_latestposts_watchmark_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_common_simple_latestposts_release_mark_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_common_simple_latestposts_release_mark_days', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_simple_latestposts_release_mark_pic', 'url' );
    ta_update_option( $process, $create_dir, 'ta_common_simple_latestposts_release_mark_text', 'strip_html' );
    ta_update_option( $process, $create_dir, 'ta_common_simple_latestposts_release_mark_text_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_simple_latestposts_release_mark_text_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_simple_latestposts_release_mark_text_weight', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_simple_latestposts_release_mark_text_bgcolor_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_simple_latestposts_release_mark_text_bgcolor', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_common_simple_latestposts_release_mark_text_round', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_common_simple_latestposts_release_mark_padding', 'numeral' );
  }
  //TA汎用メニュー
  if ( 'all' == $tab_name || 'versatile' == $tab_name ) {
    if ( TA_HIEND_PI ) { ta_thm001highend_versatile_menu_update( $process, $create_dir ); }
  }
  //画像と説明付きメニュー
  if ( 'all' == $tab_name || 'imgexp' == $tab_name ) {
    if ( TA_HIEND_PI ) { ta_thm001highend_imgexp_menu_update( $process, $create_dir ); }
  }
  //TA汎用背景装飾
  if ( 'all' == $tab_name || 'gnrlbg' == $tab_name ) {
    if ( TA_HIEND_PI ) { ta_thm001highend_genbg_update( $process, $create_dir ); }
  }
}


/********* トップページメニューアイテム関数 *********/
function ta_top_items( $process = '', $create_dir = '', $tab_name = 'all' ) {
  //フレームタイプ
  if ( 'all' == $tab_name || 'frame' == $tab_name ) {
    ta_update_option( $process, $create_dir, 'ta_top_frame_type', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_top_main_width', 'numeral' );
    if ( TA_HIEND_PI ) { ta_thm001highend_top_view_limit_update( $process, $create_dir ); }
  }
  //トップページ説明エリア
  if ( 'all' == $tab_name || 'exparea' == $tab_name ) {
    if ( TA_HIEND_PI ) { ta_thm001highend_exp_freearea_update( $process, $create_dir ); }
  }
  //トップキャッチエリア
  if ( 'all' == $tab_name || 'topcatch' == $tab_name ) {
    ta_top_margin_update_option( $process, $create_dir, 'ta_top_topcatch' );
    ta_update_option( $process, $create_dir, 'ta_top_topcatch_num', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_top_topcatch_link_newwin_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_top_topcatch_frame_title_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_top_topcatch_frame_title_factor', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_top_topcatch_frame_title', 'strip_html' );
    ta_update_option( $process, $create_dir, 'ta_top_topcatch_title_factor', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_top_topcatch_space', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_top_topcatch_continue_text', 'strip_html' );
    ta_update_option( $process, $create_dir, 'ta_top_topcatch_text_onlyfor_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_top_topcatch_text_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_top_topcatch_text_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_top_topcatch_text_size', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_top_topcatch_text_weight', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_top_topcatch_text_p_lineheight', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_top_topcatch_text_p_topmargin', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_top_topcatch_text_p_bottommargin', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_top_topcatch_text_p_leftmargin', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_top_topcatch_text_p_rightmargin', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_top_topcatch_continue_text_size', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_top_topcatch_continue_text_weight', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_top_topcatch_continue_text_anchor_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_top_topcatch_continue_text_anchor_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_top_topcatch_continue_text_anchor_under', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_top_topcatch_continue_text_anchor_colorhover_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_top_topcatch_continue_text_anchor_colorhover', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_top_topcatch_continue_text_anchor_underhover', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_top_topcatch_title_onoff1', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_top_topcatch_title1', 'strip_html' );
    ta_update_option( $process, $create_dir, 'ta_top_topcatch_pic1', 'url' );
    ta_update_option( $process, $create_dir, 'ta_top_topcatch_text1', 'strip_html' );
    ta_update_option( $process, $create_dir, 'ta_top_topcatch_link1', 'url' );
    ta_update_option( $process, $create_dir, 'ta_top_topcatch_title_onoff2', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_top_topcatch_title2', 'strip_html' );
    ta_update_option( $process, $create_dir, 'ta_top_topcatch_pic2', 'url' );
    ta_update_option( $process, $create_dir, 'ta_top_topcatch_text2', 'strip_html' );
    ta_update_option( $process, $create_dir, 'ta_top_topcatch_link2', 'url' );
    ta_update_option( $process, $create_dir, 'ta_top_topcatch_title_onoff3', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_top_topcatch_title3', 'strip_html' );
    ta_update_option( $process, $create_dir, 'ta_top_topcatch_pic3', 'url' );
    ta_update_option( $process, $create_dir, 'ta_top_topcatch_text3', 'strip_html' );
    ta_update_option( $process, $create_dir, 'ta_top_topcatch_link3', 'url' );
    if ( TA_HIEND_PI ) { ta_thm001highend_top_topcatch_update( $process, $create_dir ); }
  }
  //トップページフリーエリア
  if ( 'all' == $tab_name || 'freearea' == $tab_name ) {
    ta_update_option( $process, $create_dir, 'ta_top_freearea_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_top_freearea_title_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_top_freearea_title_factor', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_top_freearea_display_order', 'as_is' );
  }
  //最新投稿ダイジェスト（全ての投稿が対象）
  if ( 'all' == $tab_name || 'latestposts' == $tab_name ) {
    ta_update_option( $process, $create_dir, 'ta_top_latestposts_onoff', 'single_check' );
    if ( TA_HIEND_PI ) { ta_thm001highend_top_latestposts_position_update( $process, $create_dir ); }
    ta_top_margin_update_option( $process, $create_dir, 'ta_top_latestposts' );
    ta_latestposts_detail_update_option( $process, $create_dir, 'top' );
    ta_article_digest_design_update_option( $process, $create_dir, 'top_latestposts' );
  }
  //各種投稿ダイジェスト
  if ( 'all' == $tab_name || 'postdigest' == $tab_name ) {
    if ( TA_HIEND_PI ) { ta_thm001highend_top_postdigest_update( $process, $create_dir ); }
  }
  //トップページウィジェット
  if ( 'all' == $tab_name || 'widget' == $tab_name ) {
    ta_update_option( $process, $create_dir, 'ta_top_widget_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_top_widget_title_factor', 'as_is' );
    if ( TA_HIEND_PI ) { ta_thm001highend_top_widget_position_update( $process, $create_dir ); }
    ta_update_option( $process, $create_dir, 'ta_top_widget_centering', 'single_check' );
  }
  //SEO・SMO
  if ( 'all' == $tab_name || 'seosmo' == $tab_name ) {
    //SEO
    ta_update_option( $process, $create_dir, 'ta_top_seo_keywords', 'strip_html' );
    ta_update_option( $process, $create_dir, 'ta_top_seo_description', 'excerpt_nocr', 120 );
    ta_update_option( $process, $create_dir, 'ta_top_h1_content', 'text' );
    ta_update_option( $process, $create_dir, 'ta_top_h1_disp', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_top_canonical_domain', 'url' );
    //トップページSNSボタン
    ta_update_option( $process, $create_dir, 'ta_top_sns_position', 'as_is' );
    //トップページOGP設定
    ta_update_option( $process, $create_dir, 'ta_top_ogp_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_top_ogp_title', 'strip_html' );
    ta_update_option( $process, $create_dir, 'ta_top_ogp_site_name', 'strip_html' );
    ta_update_option( $process, $create_dir, 'ta_top_ogp_description', 'strip_html' );
    ta_update_option( $process, $create_dir, 'ta_top_ogp_image', 'url' );
    //トップページTwitter Cards設定
    ta_update_option( $process, $create_dir, 'ta_top_twittercards_onoff', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_top_twittercards_title', 'strip_html' );
    ta_update_option( $process, $create_dir, 'ta_top_twittercards_description', 'strip_html' );
    ta_update_option( $process, $create_dir, 'ta_top_twittercards_image', 'url' );
  }
  //その他
  if ( 'all' == $tab_name || 'etc' == $tab_name ) {
    ta_update_option( $process, $create_dir, 'ta_top_sitemap_disp_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_top_indexfollow', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_top_fixed_space', 'numeral' );
  }
}


/********* ヘッダーメニューアイテム関数 *********/
function ta_header_items( $process = '', $create_dir = '', $tab_name = 'all' ) {
  //ヘッダーバナーエリアサイズエラー処理
  if ( 'reset' != $process && 'create' != $process && 'frame' == $tab_name ) {
    $ta_header_bannerarea_type = isset( $_POST['ta_header_bannerarea_type'] ) ? $_POST['ta_header_bannerarea_type'] : 'none';
    $ta_header_logo_left_padding = isset( $_POST['ta_header_logo_left_padding'] ) ? $_POST['ta_header_logo_left_padding'] : 'none';
    $ta_header_logo_width = isset( $_POST['ta_header_logo_width'] ) ? $_POST['ta_header_logo_width'] : 'none';
    $ta_header_logo_right_padding = isset( $_POST['ta_header_logo_right_padding'] ) ? $_POST['ta_header_logo_right_padding'] : 'none';
    $ta_header_info_width = isset( $_POST['ta_header_info_width'] ) ? $_POST['ta_header_info_width'] : 'none';
    $ta_header_info_right_padding = isset( $_POST['ta_header_info_right_padding'] ) ? $_POST['ta_header_info_right_padding'] : 'none';
    $ta_header_search_width = isset( $_POST['ta_header_search_width'] ) ? $_POST['ta_header_search_width'] : 'none';
    $ta_header_search_right_padding = isset( $_POST['ta_header_search_right_padding'] ) ? $_POST['ta_header_search_right_padding'] : 'none';
    if ( 'logo_info' == $ta_header_bannerarea_type ) {
      $ta_header_search_width = '0';
      $ta_header_search_right_padding = '0';
    } else if ( 'logo_search' == $ta_header_bannerarea_type ) {
      $ta_header_info_width = '0';
      $ta_header_info_right_padding = '0';
    } else if ( 'logo_only' == $ta_header_bannerarea_type ) {
      $ta_header_info_width = '0';
      $ta_header_info_right_padding = '0';
      $ta_header_search_width = '0';
      $ta_header_search_right_padding = '0';
    }
    if ( 'none' == $ta_header_logo_width    || 'none' == $ta_header_logo_left_padding     || 'none' == $ta_header_logo_right_padding ||
         'none' == $ta_header_info_width    || 'none' == $ta_header_info_right_padding    || 
         'none' == $ta_header_search_width  || 'none' == $ta_header_search_right_padding ) {
      return 'normalerr=hdbn_det';  //受信データエラー（予期しないエラー）
    } else if ( ( $ta_header_logo_left_padding + $ta_header_logo_width + $ta_header_logo_right_padding + 
                  $ta_header_info_width   + $ta_header_info_right_padding   +
                  $ta_header_search_width + $ta_header_search_right_padding ) > 100 ) {
      return 'normalerr=hdbn_over'; //幅計算が100%を超える
    }
  }
  //フレーム
  if ( 'all' == $tab_name || 'frame' == $tab_name ) {
    //ヘッダーの背景色・背景画像
    ta_update_option( $process, $create_dir, 'ta_header_frame_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_frame_color', 'as_is' );
    ta_gradient_color_update_option( $process, $create_dir, 'ta_header_frame_color' );
    ta_update_option( $process, $create_dir, 'ta_header_frame_pic', 'url' );
    ta_update_option( $process, $create_dir, 'ta_header_frame_pic_rule', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_frame_pic_margin', 'numeral' );
    //ヘッダーバナーエリアタイプ
    ta_update_option( $process, $create_dir, 'ta_header_bannerarea_type', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_size_check', 'single_check' );
    //ヘッダーバナーエリアのサイズ
    ta_update_option( $process, $create_dir, 'ta_header_logo_left_padding', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_logo_width', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_logo_right_padding', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_info_width', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_info_right_padding', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_search_width', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_search_right_padding', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_height', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_marginbottom', 'numeral' );
    //ヘッダーバナーエリアの位置（フレーム外への移動）
    if ( TA_HIEND_PI ) { ta_thm001highend_bannerarea2wrap_update( $process, $create_dir ); }
    //グローバルメニューとヘッダー画像の位置（メイン枠への移動）
    if ( TA_HIEND_PI ) { ta_thm001highend_glblnv_img_2main_update( $process, $create_dir ); }
  }
  //フォント
  if ( 'all' == $tab_name || 'font' == $tab_name ) {
    ta_update_option( $process, $create_dir, 'ta_header_font_size', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_font_anchor_onlyfor_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_header_font_normal_text_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_font_normal_text_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_font_anchor_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_font_anchor_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_font_anchor_under', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_header_font_anchor_colorhover_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_font_anchor_colorhover', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_font_anchor_underhover', 'single_check' );
    ta_paragraph_update_option( $process, $create_dir, 'ta_header_font' );
  }
  //ロゴエリア
  if ( 'all' == $tab_name || 'logoarea' == $tab_name ) {
    //ロゴエリアの調整
    ta_update_option( $process, $create_dir, 'ta_header_logo_top_padding', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_logoimg_height', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_logo_contents_layout', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_h1_position', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_h1_size', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_h1_lineheight', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_h1_margin_t', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_h1_margin_b', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_h1_margin_l', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_h1_content_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_h1_content_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_h1_content_color_fontweight', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_h1_content_anchor_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_h1_content_anchor_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_h1_content_anchor_under', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_header_h1_content_anchor_colorhover_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_h1_content_anchor_colorhover', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_h1_content_anchor_underhover', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_header_h1_content_link_newwin_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_header_h1_long_onoff', 'single_check' );
    //ロゴエリアの画像・リンク
    ta_update_option( $process, $create_dir, 'ta_header_logo_pic', 'url' );
    ta_update_option( $process, $create_dir, 'ta_header_logo_link', 'url' );
    ta_update_option( $process, $create_dir, 'ta_header_logo_link_newwin_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_header_logo_text', 'text' );
    ta_update_option( $process, $create_dir, 'ta_header_logo_text_size', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_logo_text_fontweight', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_logo_text_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_logo_text_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_logo_text_under_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_header_logo_text_hover_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_logo_text_hover', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_logo_text_hoverunder_onoff', 'single_check' );
  }
  //連絡先エリア
  if ( 'all' == $tab_name || 'infoarea' == $tab_name ) {
    //連絡先エリアの調整
    ta_update_option( $process, $create_dir, 'ta_header_info_top_padding', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_infoimg_height', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_info_contents_layout', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_info_menu_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_header_info_menu_left_margin', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_info_menu_margin2info_pic', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_info_sns_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_header_info_sns_margin2info_pic', 'numeral' );
    //連絡エリアの画像・リンク
    ta_update_option( $process, $create_dir, 'ta_header_info_pic', 'url' );
    ta_update_option( $process, $create_dir, 'ta_header_info_link', 'url' );
    ta_update_option( $process, $create_dir, 'ta_header_info_link_newwin_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_header_info_text', 'text' );
    ta_update_option( $process, $create_dir, 'ta_header_info_text_size', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_info_text_fontweight', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_info_text_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_info_text_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_info_text_under_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_header_info_text_hover_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_info_text_hover', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_info_text_hoverunder_onoff', 'single_check' );
    //連絡先エリアの簡易メニュー
    ta_update_option( $process, $create_dir, 'ta_header_info_simplemenu_fontsize', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_info_simplemenu_fontweight', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_info_simplemenu_underline_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_header_info_simplemenu_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_info_simplemenu_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_info_simplemenu_colorhover_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_info_simplemenu_colorhover', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_info_simplemenu_hoverunderline_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_header_info_simplemenu_layout', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_info_simplemenu_num', 'numeral' );
  }
  //検索エリア
  if ( 'all' == $tab_name || 'searcharea' == $tab_name ) {
    //検索エリアの調整
    ta_update_option( $process, $create_dir, 'ta_header_search_top_padding', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_search_width_size', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_search_height_size', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_search_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_search_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_search_bgcolor_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_search_bgcolor', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_search_border_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_search_border_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_search_radius_size', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_search_submit_title', 'strip_html' );
    ta_update_option( $process, $create_dir, 'ta_header_search_submit_title_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_search_submit_title_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_search_submit_bgcolor_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_search_submit_bgcolor', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_search_submit_width_size', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_search_glass', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_search_menu_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_header_search_menu_right_margin', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_search_menu_margin2search_pic', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_search_sns_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_header_search_sns_margin2search_pic', 'numeral' );
    //検索エリアの簡易メニュー
    ta_update_option( $process, $create_dir, 'ta_header_search_simplemenu_fontsize', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_search_simplemenu_fontweight', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_search_simplemenu_underline_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_header_search_simplemenu_hoverunderline_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_header_search_simplemenu_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_search_simplemenu_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_search_simplemenu_colorhover_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_search_simplemenu_colorhover', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_search_simplemenu_layout', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_search_simplemenu_num', 'numeral' );
  }
  //グローバル（ヘッダー）メニュー
  if ( 'all' == $tab_name || 'glabalmenu' == $tab_name ) {
    //グローバルメニューバー
    ta_update_option( $process, $create_dir, 'ta_header_glabalmenu_position', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_glabalmenu_itemnum', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_glabalmenu_wholeheight', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_glabalmenu_topmargin', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_glabalmenu_bottommargin', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_glabalmenu_frame_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_glabalmenu_frame_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_glabalmenu_frame_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_glabalmenu_frame_size', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_glabalmenu_frame_margin_size', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_glabalmenu_current_frame_color_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_header_glabalmenu_current_text_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_glabalmenu_current_text_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_glabalmenu_current_frame_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_glabalmenu_current_frame_color', 'as_is' );
    ta_gradient_color_update_option( $process, $create_dir, 'ta_header_glabalmenu_current_frame_color' );
    //グローバルメインメニューテキスト
    ta_update_option( $process, $create_dir, 'ta_header_glabalmenu_fontsize', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_glabalmenu_fontweight', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_glabalmenu_fontcolor_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_glabalmenu_fontcolor', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_glabalmenu_fontcolorhover_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_glabalmenu_fontcolorhover', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_glabalmenu_backcolor_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_glabalmenu_backcolor', 'as_is' );
    ta_gradient_color_update_option( $process, $create_dir, 'ta_header_glabalmenu_backcolor' );
    ta_update_option( $process, $create_dir, 'ta_header_glabalmenu_backcolorhover_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_glabalmenu_backcolorhover', 'as_is' );
    ta_gradient_color_update_option( $process, $create_dir, 'ta_header_glabalmenu_backcolorhover' );
    //グローバルサブメニューテキスト
    ta_update_option( $process, $create_dir, 'ta_header_glabalsubmenu_fontsize', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_glabalsubmenu_fontweight', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_glabalsubmenu_fontcolor_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_glabalsubmenu_fontcolor', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_glabalsubmenu_fontcolorhover_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_glabalsubmenu_fontcolorhover', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_glabalsubmenu_backcolor_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_glabalsubmenu_backcolor', 'as_is' );
    ta_gradient_color_update_option( $process, $create_dir, 'ta_header_glabalsubmenu_backcolor' );
    ta_update_option( $process, $create_dir, 'ta_header_glabalsubmenu_backcolorhover_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_glabalsubmenu_backcolorhover', 'as_is' );
    ta_gradient_color_update_option( $process, $create_dir, 'ta_header_glabalsubmenu_backcolorhover' );
    ta_update_option( $process, $create_dir, 'ta_header_glabalsubmenu_width', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_glabalsubmenu_height', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_glabalsubmenu_border_size', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_glabalsubmenu_border_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_glabalsubmenu_border_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_glabalsubmenu_border_kind', 'as_is' );
  }
  //ヘッダー画像
  if ( 'all' == $tab_name || 'headimg' == $tab_name ) {
    ta_update_option( $process, $create_dir, 'ta_header_headimg_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_headimg_width', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_headimg_height', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_headimg_link', 'url' );
    ta_update_option( $process, $create_dir, 'ta_header_headimg_link_newwin_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_header_headimg_insertpage', 'as_is' );
    //ヘッダー画像に被せるテキスト
    ta_update_option( $process, $create_dir, 'ta_header_headimg_text_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_header_headimg_text', 'strip_html' );
    ta_update_option( $process, $create_dir, 'ta_header_headimg_fontsize', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_headimg_fontweight', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_headimg_fontcolor_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_headimg_fontcolor', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_header_headimg_position_x', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_header_headimg_position_y', 'numeral' );
  }
  //ヘッダーフリーエリア
  if ( 'all' == $tab_name || 'freearea' == $tab_name ) {
    if ( TA_HIEND_PI ) { ta_thm001highend_header_freearea_update( $process, $create_dir ); }
  }
}


/********* メインコンテンツメニューアイテム関数 *********/
function ta_main_items( $process = '', $create_dir = '', $tab_name = 'all' ) {
  //フレーム
  if ( 'all' == $tab_name || 'frame' == $tab_name ) {
    //メインコンテンツの背景色・背景画像
    ta_update_option( $process, $create_dir, 'ta_main_frame_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_main_frame_color', 'as_is' );
    if ( TA_HIEND_PI ) { ta_thm001highend_main_frame_update( $process, $create_dir ); }
    ta_update_option( $process, $create_dir, 'ta_main_frame_padding', 'numeral' );
  }
  //フォント
  if ( 'all' == $tab_name || 'font' == $tab_name ) {
    ta_update_option( $process, $create_dir, 'ta_main_font_size', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_main_font_anchor_onlyfor_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_main_font_normal_text_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_main_font_normal_text_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_main_font_anchor_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_main_font_anchor_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_main_font_anchor_under', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_main_font_anchor_colorhover_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_main_font_anchor_colorhover', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_main_font_anchor_underhover', 'single_check' );
    ta_paragraph_update_option( $process, $create_dir, 'ta_main_font' );
  }
  //h2
  if ( 'all' == $tab_name || 'titleh2' == $tab_name ) {
    ta_headline_update_option( $process, $create_dir, 'ta_main_headline_h2' );
  }
  //h3
  if ( 'all' == $tab_name || 'titleh3' == $tab_name ) {
    ta_headline_update_option( $process, $create_dir, 'ta_main_headline_h3' );
  }
  //h4
  if ( 'all' == $tab_name || 'titleh4' == $tab_name ) {
    ta_headline_update_option( $process, $create_dir, 'ta_main_headline_h4' );
  }
  //h5
  if ( 'all' == $tab_name || 'titleh5' == $tab_name ) {
    ta_headline_update_option( $process, $create_dir, 'ta_main_headline_h5' );
  }
  //装飾1
  if ( 'all' == $tab_name || 'deco1' == $tab_name ) {
    if ( TA_HIEND_PI ) { ta_thm001highend_deco_update( $process, $create_dir, 'ta_main_deco1' ); }
  }
  //装飾2
  if ( 'all' == $tab_name || 'deco2' == $tab_name ) {
    if ( TA_HIEND_PI ) { ta_thm001highend_deco_update( $process, $create_dir, 'ta_main_deco2' ); }
  }
  //装飾3
  if ( 'all' == $tab_name || 'deco3' == $tab_name ) {
    if ( TA_HIEND_PI ) { ta_thm001highend_deco_update( $process, $create_dir, 'ta_main_deco3' ); }
  }
  //装飾4
  if ( 'all' == $tab_name || 'deco4' == $tab_name ) {
    if ( TA_HIEND_PI ) { ta_thm001highend_deco_update( $process, $create_dir, 'ta_main_deco4' ); }
  }
  //フリーエリア
  if ( 'all' == $tab_name || 'freearea' == $tab_name ) {
    if ( TA_HIEND_PI ) { ta_thm001highend_endroll_freearea_update( $process, $create_dir ); }
  }
  //その他
  if ( 'all' == $tab_name || 'etc' == $tab_name ) {
    ta_update_option( $process, $create_dir, 'ta_main_fixed_space', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_main_separator_size', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_main_separator_kind', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_main_separator_kind_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_main_separator_kind_color', 'as_is' );
    ta_gradient_color_update_option( $process, $create_dir, 'ta_main_separator_kind_color' );
    ta_update_option( $process, $create_dir, 'ta_main_separator_tmargin', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_main_separator_bmargin', 'numeral' );
  }
}


/********* サイドバーメニューアイテム関数 *********/
function ta_sidebar_items( $process = '', $create_dir = '', $tab_name = 'all' ) {
  //フレーム
  if ( 'all' == $tab_name || 'frame' == $tab_name ) {
    //サイドバーの背景色・背景画像
    ta_update_option( $process, $create_dir, 'ta_sidebar_frame_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_sidebar_frame_color', 'as_is' );
    if ( TA_HIEND_PI ) { ta_thm001highend_arrange_height_onoff_update( 'sidebar', $process, $create_dir ); }
    if ( TA_HIEND_PI ) { ta_thm001highend_side_frame_update( 'sidebar', $process, $create_dir ); }
    ta_update_option( $process, $create_dir, 'ta_sidebar_frame_padding', 'numeral' );
  }
  //フォント
  if ( 'all' == $tab_name || 'font' == $tab_name ) {
    ta_update_option( $process, $create_dir, 'ta_sidebar_font_size', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_sidebar_font_anchor_onlyfor_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_sidebar_font_normal_text_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_sidebar_font_normal_text_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_sidebar_font_anchor_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_sidebar_font_anchor_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_sidebar_font_anchor_under', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_sidebar_font_anchor_colorhover_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_sidebar_font_anchor_colorhover', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_sidebar_font_anchor_underhover', 'single_check' );
    ta_paragraph_update_option( $process, $create_dir, 'ta_sidebar_font' );
  }
  //h2
  if ( 'all' == $tab_name || 'titleh2' == $tab_name ) {
    ta_headline_update_option( $process, $create_dir, 'ta_sidebar_headline_h2' );
  }
  //h3
  if ( 'all' == $tab_name || 'titleh3' == $tab_name ) {
    ta_headline_update_option( $process, $create_dir, 'ta_sidebar_headline_h3' );
  }
  //h4
  if ( 'all' == $tab_name || 'titleh4' == $tab_name ) {
    ta_headline_update_option( $process, $create_dir, 'ta_sidebar_headline_h4' );
  }
  //h5
  if ( 'all' == $tab_name || 'titleh5' == $tab_name ) {
    ta_headline_update_option( $process, $create_dir, 'ta_sidebar_headline_h5' );
  }
  //装飾1
  if ( 'all' == $tab_name || 'deco1' == $tab_name ) {
    if ( TA_HIEND_PI ) { ta_thm001highend_deco_update( $process, $create_dir, 'ta_sidebar_deco1' ); }
  }
  //装飾2
  if ( 'all' == $tab_name || 'deco2' == $tab_name ) {
    if ( TA_HIEND_PI ) { ta_thm001highend_deco_update( $process, $create_dir, 'ta_sidebar_deco2' ); }
  }
  //装飾3
  if ( 'all' == $tab_name || 'deco3' == $tab_name ) {
    if ( TA_HIEND_PI ) { ta_thm001highend_deco_update( $process, $create_dir, 'ta_sidebar_deco3' ); }
  }
  //装飾4
  if ( 'all' == $tab_name || 'deco4' == $tab_name ) {
    if ( TA_HIEND_PI ) { ta_thm001highend_deco_update( $process, $create_dir, 'ta_sidebar_deco4' ); }
  }
  //フリーエリア
  if ( 'all' == $tab_name || 'freearea' == $tab_name ) {
    ta_update_option( $process, $create_dir, 'ta_sidebar_freearea_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_sidebar_freearea_title_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_sidebar_freearea_title_factor', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_sidebar_freearea_display_order', 'as_is' );
  }
  //最新投稿ダイジェスト（全ての投稿が対象）
  if ( 'all' == $tab_name || 'latestposts' == $tab_name ) {
    if ( TA_HIEND_PI ) { ta_thm001highend_sidebar_latestposts_update( $process, $create_dir ); }
  }
  //各種投稿ダイジェスト
  if ( 'all' == $tab_name || 'postdigest' == $tab_name ) {
    ta_update_option( $process, $create_dir, 'ta_sidebar_postdigest_onoff', 'single_check' );
    if ( TA_HIEND_PI ) { ta_thm001highend_sidebar_postdigest_position_update( $process, $create_dir ); }
    ta_top_margin_update_option( $process, $create_dir, 'ta_sidebar_postdigest' );
    ta_postdigest_detail_update_option( $process, $create_dir, 'sidebar' );
    ta_article_digest_design_update_option( $process, $create_dir, 'sidebar_postdigest' );
  }
  //ウィジェット
  if ( 'all' == $tab_name || 'widget' == $tab_name ) {
    ta_update_option( $process, $create_dir, 'ta_sidebar_widget_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_sidebar_widget_title_factor', 'as_is' );
    if ( TA_HIEND_PI ) { ta_thm001highend_sidebar_widget_position_update( $process, $create_dir ); }
    ta_update_option( $process, $create_dir, 'ta_sidebar_widget_centering', 'single_check' );
  }
  //TAサイドバーメニュー
  if ( 'all' == $tab_name || 'menu' == $tab_name ) {
    ta_update_option( $process, $create_dir, 'ta_sidebar_menu_factor1', 'as_is' );
    if ( TA_HIEND_PI ) { ta_thm001highend_sidebar_menu_update( $process, $create_dir ); }
  }
  //その他
  if ( 'all' == $tab_name || 'etc' == $tab_name ) {
    //サイドバーコンテンツ間隔設定
    ta_update_option( $process, $create_dir, 'ta_sidebar_fixed_space', 'numeral' );
    //サイドバー区切り線設定
    ta_update_option( $process, $create_dir, 'ta_sidebar_separator_size', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_sidebar_separator_kind', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_sidebar_separator_kind_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_sidebar_separator_kind_color', 'as_is' );
    ta_gradient_color_update_option( $process, $create_dir, 'ta_sidebar_separator_kind_color' );
    ta_update_option( $process, $create_dir, 'ta_sidebar_separator_tmargin', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_sidebar_separator_bmargin', 'numeral' );
  }
}


/********* サブサイドバーメニューアイテム関数 *********/
function ta_sidebarsub_items( $process = '', $create_dir = '', $tab_name = 'all' ) {
  //フレーム
  if ( 'all' == $tab_name || 'frame' == $tab_name ) {
    //サブサイドバーの背景色・背景画像
    ta_update_option( $process, $create_dir, 'ta_sidebarsub_frame_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_sidebarsub_frame_color', 'as_is' );
    if ( TA_HIEND_PI ) { ta_thm001highend_arrange_height_onoff_update( 'sidebarsub', $process, $create_dir ); }
    if ( TA_HIEND_PI ) { ta_thm001highend_side_frame_update( 'sidebarsub', $process, $create_dir ); }
    ta_update_option( $process, $create_dir, 'ta_sidebarsub_frame_padding', 'numeral' );
  }
  //フォント
  if ( 'all' == $tab_name || 'font' == $tab_name ) {
    ta_update_option( $process, $create_dir, 'ta_sidebarsub_font_size', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_sidebarsub_font_anchor_onlyfor_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_sidebarsub_font_normal_text_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_sidebarsub_font_normal_text_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_sidebarsub_font_anchor_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_sidebarsub_font_anchor_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_sidebarsub_font_anchor_under', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_sidebarsub_font_anchor_colorhover_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_sidebarsub_font_anchor_colorhover', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_sidebarsub_font_anchor_underhover', 'single_check' );
    ta_paragraph_update_option( $process, $create_dir, 'ta_sidebarsub_font' );
  }
  //h2
  if ( 'all' == $tab_name || 'titleh2' == $tab_name ) {
    ta_headline_update_option( $process, $create_dir, 'ta_sidebarsub_headline_h2' );
  }
  //h3
  if ( 'all' == $tab_name || 'titleh3' == $tab_name ) {
    ta_headline_update_option( $process, $create_dir, 'ta_sidebarsub_headline_h3' );
  }
  //h4
  if ( 'all' == $tab_name || 'titleh4' == $tab_name ) {
    ta_headline_update_option( $process, $create_dir, 'ta_sidebarsub_headline_h4' );
  }
  //h5
  if ( 'all' == $tab_name || 'titleh5' == $tab_name ) {
    ta_headline_update_option( $process, $create_dir, 'ta_sidebarsub_headline_h5' );
  }
  //フリーエリア
  if ( 'all' == $tab_name || 'freearea' == $tab_name ) {
    if ( TA_HIEND_PI ) { ta_thm001highend_sidebarsub_freearea_update( $process, $create_dir ); }
  }
  //最新投稿ダイジェスト（全ての投稿が対象）
  if ( 'all' == $tab_name || 'latestposts' == $tab_name ) {
    if ( TA_HIEND_PI ) { ta_thm001highend_sidebarsub_latestposts_update( $process, $create_dir ); }
  }
  //各種投稿ダイジェスト
  if ( 'all' == $tab_name || 'postdigest' == $tab_name ) {
    if ( TA_HIEND_PI ) { ta_thm001highend_sidebarsub_postdigest_update( $process, $create_dir ); }
  }
  //ウィジェット
  if ( 'all' == $tab_name || 'widget' == $tab_name ) {
    ta_update_option( $process, $create_dir, 'ta_sidebarsub_widget_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_sidebarsub_widget_title_factor', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_sidebarsub_widget_position', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_sidebarsub_widget_centering', 'single_check' );
  }
  //その他
  if ( 'all' == $tab_name || 'etc' == $tab_name ) {
    //サブサイドバーコンテンツ間隔設定
    ta_update_option( $process, $create_dir, 'ta_sidebarsub_fixed_space', 'numeral' );
    //サブサイドバー区切り線設定
    ta_update_option( $process, $create_dir, 'ta_sidebarsub_separator_size', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_sidebarsub_separator_kind', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_sidebarsub_separator_kind_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_sidebarsub_separator_kind_color', 'as_is' );
    ta_gradient_color_update_option( $process, $create_dir, 'ta_sidebarsub_separator_kind_color' );
    ta_update_option( $process, $create_dir, 'ta_sidebarsub_separator_tmargin', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_sidebarsub_separator_bmargin', 'numeral' );
  }
}


/********* フッターメニューアイテム関数 *********/
function ta_footer_items( $process = '', $create_dir = '', $tab_name = 'all' ) {
  //フッター各ブロックサイズエラー処理
  if ( 'reset' != $process && 'create' != $process && 'block' == $tab_name ) {
    $ta_footer_group1_block_size = isset( $_POST['ta_footer_group1_block_size'] ) ? $_POST['ta_footer_group1_block_size'] : 'none';
    $ta_footer_group2_block_size = isset( $_POST['ta_footer_group2_block_size'] ) ? $_POST['ta_footer_group2_block_size'] : 'none';
    if ( 'none' == $ta_footer_group1_block_size || 'none' == $ta_footer_group2_block_size ) {
      return 'normalerr=ftr_det';  //受信データエラー（予期しないエラー）
    } else if ( ( $ta_footer_group1_block_size + $ta_footer_group2_block_size ) > 100 ) {
      return 'normalerr=ftr_over'; //幅計算が100%を超える
    }
  }
  //フレーム
  if ( 'all' == $tab_name || 'frame' == $tab_name ) {
    //フッターの背景色・背景画像
    ta_update_option( $process, $create_dir, 'ta_footer_frame_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_footer_frame_color', 'as_is' );
    ta_gradient_color_update_option( $process, $create_dir, 'ta_footer_frame_color' );
    ta_update_option( $process, $create_dir, 'ta_footer_frame_pic', 'url' );
    ta_update_option( $process, $create_dir, 'ta_footer_frame_pic_rule', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_footer_frame_pic_margin', 'numeral' );
    //フッターコンテンツ群先頭ラインの位置
    ta_update_option( $process, $create_dir, 'ta_footer_container_paddingtop', 'numeral' );
    //フッターの位置（メイン枠への移動）
    if ( TA_HIEND_PI ) { ta_thm001highend_footer_container2main_update( $process, $create_dir ); }
  }
  //フォント
  if ( 'all' == $tab_name || 'font' == $tab_name ) {
    ta_update_option( $process, $create_dir, 'ta_footer_font_size', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_footer_font_anchor_onlyfor_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_footer_font_normal_text_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_footer_font_normal_text_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_footer_font_anchor_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_footer_font_anchor_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_footer_font_anchor_under', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_footer_font_anchor_colorhover_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_footer_font_anchor_colorhover', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_footer_font_anchor_underhover', 'single_check' );
    ta_paragraph_update_option( $process, $create_dir, 'ta_footer_font' );
  }
  //h2
  if ( 'all' == $tab_name || 'titleh2' == $tab_name ) {
    ta_headline_update_option( $process, $create_dir, 'ta_footer_headline_h2' );
  }
  //h3
  if ( 'all' == $tab_name || 'titleh3' == $tab_name ) {
    ta_headline_update_option( $process, $create_dir, 'ta_footer_headline_h3' );
  }
  //h4
  if ( 'all' == $tab_name || 'titleh4' == $tab_name ) {
    ta_headline_update_option( $process, $create_dir, 'ta_footer_headline_h4' );
  }
  //h5
  if ( 'all' == $tab_name || 'titleh5' == $tab_name ) {
    ta_headline_update_option( $process, $create_dir, 'ta_footer_headline_h5' );
  }
  //フリーエリア
  if ( 'all' == $tab_name || 'freearea' == $tab_name ) {
    if ( TA_HIEND_PI ) { ta_thm001highend_footer_freearea_update( $process, $create_dir ); }
  }
  //各ブロック設定
  if ( 'all' == $tab_name || 'block' == $tab_name ) {
    ta_update_option( $process, $create_dir, 'ta_footer_disp_group', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_footer_group1_block_title', 'strip_html' );
    ta_update_option( $process, $create_dir, 'ta_footer_group2_block_title', 'strip_html' );
    ta_update_option( $process, $create_dir, 'ta_footer_group_title_factor', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_footer_group1_block_size', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_footer_vertical_group1_distance', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_footer_group2_block_size', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_footer_vertical_group2_distance', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_footer_block_size_check', 'single_check' );
  }
  //フッター画像
  if ( 'all' == $tab_name || 'footimg' == $tab_name ) {
    //フッター画像
    ta_update_option( $process, $create_dir, 'ta_footer_pic', 'url' );
    ta_update_option( $process, $create_dir, 'ta_footer_pic_link', 'url' );
    ta_update_option( $process, $create_dir, 'ta_footer_pic_link_newwin_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_footer_pic_size', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_footer_pic_text', 'text' );
    ta_update_option( $process, $create_dir, 'ta_footer_pic_text_size', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_footer_pic_text_hoverunder', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_footer_pic_text_hoverunder2', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_footer_pic_text_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_footer_pic_text_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_footer_pic_text_hover_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_footer_pic_text_hover', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_footer_pic_text_weight', 'as_is' );
    //サブフッター画像
    ta_update_option( $process, $create_dir, 'ta_footer_subpic', 'url' );
    ta_update_option( $process, $create_dir, 'ta_footer_subpic_link', 'url' );
    ta_update_option( $process, $create_dir, 'ta_footer_subpic_link_newwin_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_footer_subpic_size', 'numeral' );
  }
  //フッターコンテンツ
  if ( 'all' == $tab_name || 'contents' == $tab_name ) {
    //フッターフリーテキスト
    ta_update_option( $process, $create_dir, 'ta_footer_freetext', 'text' );
    //フッターメニュー
    ta_update_option( $process, $create_dir, 'ta_footer_menu_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_footer_menu_style', 'as_is' );
    ta_footermenu_general_update_option( $process, $create_dir, 'ta_footer_menu_parent' );     //親項目の詳細設定
    ta_footermenu_general_update_option( $process, $create_dir, 'ta_footer_menu_children' );   //子孫項目の詳細設定
  }
  //ウィジェット
  if ( 'all' == $tab_name || 'widget' == $tab_name ) {
    ta_update_option( $process, $create_dir, 'ta_footer_widget_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_footer_widget_title_factor', 'as_is' );
    if ( TA_HIEND_PI ) { ta_thm001highend_footer_widget_position_update( $process, $create_dir ); }
    ta_update_option( $process, $create_dir, 'ta_footer_widget_centering', 'single_check' );
  }
  //コピーライト
  if ( 'all' == $tab_name || 'copyright' == $tab_name ) {
    ta_update_option( $process, $create_dir, 'ta_footer_copyright_paddingtop', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_footer_copyright_paddingbottom', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_footer_copyright_title', 'text' );
    ta_update_option( $process, $create_dir, 'ta_footer_copyright_position', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_footer_copyright_title_size', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_footer_copyright_title_weight', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_footer_copyright_title_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_footer_copyright_title_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_footer_copyright_bg_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_footer_copyright_bg_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_footer_copyright_padding', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_footer_copyright_border_size', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_footer_copyright_border_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_footer_copyright_border_color', 'as_is' );
  }
  //その他
  if ( 'all' == $tab_name || 'etc' == $tab_name ) {
    //フッターコンテンツ間隔設定
    ta_update_option( $process, $create_dir, 'ta_footer_fixed_space', 'numeral' );
  }
}


/********* レスポンシブデザイン『基本・共通』メニューアイテム関数 *********/
function ta_responsible_items( $process = '', $create_dir = '', $tab_name = 'all' ) {
  //基本設定
  if ( 'all' == $tab_name || 'basic' == $tab_name ) {
    ta_update_option( $process, $create_dir, 'ta_responsible_base_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_base_sidebar_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_base_sidebarsub_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_base_switch_width', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_base_width_w_padding', 'numeral', '', 100 );
    //レスポンシブデザイン有効時のviewport設定
    ta_update_option( $process, $create_dir, 'ta_responsible_viewport_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_viewport_width', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_viewport_init_scale', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_viewport_min_scale', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_viewport_max_scale', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_viewport_scalable', 'as_is' );
  }
  //背景
  if ( 'all' == $tab_name || 'bg' == $tab_name ) {
    //レスポンシブデザイン時のトップページフレーム外背景色・背景画像
    ta_update_option( $process, $create_dir, 'ta_responsible_top_outframe_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_top_outframe_color', 'as_is' );
    ta_gradient_color_update_option( $process, $create_dir, 'ta_responsible_top_outframe_color' );
    ta_update_option( $process, $create_dir, 'ta_responsible_top_outframe_pic', 'url' );
    ta_update_option( $process, $create_dir, 'ta_responsible_top_outframe_pic_rule', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_top_outframe_pic_margin', 'numeral' );
    //レスポンシブデザイン時のトップページ以外ページのフレーム外背景色・背景画像
    ta_update_option( $process, $create_dir, 'ta_responsible_outframe_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_outframe_color', 'as_is' );
    ta_gradient_color_update_option( $process, $create_dir, 'ta_responsible_outframe_color' );
    ta_update_option( $process, $create_dir, 'ta_responsible_outframe_pic', 'url' );
    ta_update_option( $process, $create_dir, 'ta_responsible_outframe_pic_rule', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_outframe_pic_margin', 'numeral' );
  }
  //背景バー
  if ( 'all' == $tab_name || 'bgbar' == $tab_name ) {
    //レスポンシブデザイン時のトップページフレーム外背景バー
    ta_bg_bar_update_option( $process, $create_dir, 'ta_responsible_top_outframe', 'top' );
    ta_bg_bar_update_option( $process, $create_dir, 'ta_responsible_top_outframe', 'bottom' );
    ta_bg_bar_update_option( $process, $create_dir, 'ta_responsible_top_outframe', 'free' );
    //レスポンシブデザイン時のトップページ以外ページのフレーム外背景バー
    ta_bg_bar_update_option( $process, $create_dir, 'ta_responsible_outframe', 'top' );
    ta_bg_bar_update_option( $process, $create_dir, 'ta_responsible_outframe', 'bottom' );
    ta_bg_bar_update_option( $process, $create_dir, 'ta_responsible_outframe', 'free' );
  }
  //アディショナルモード設定
  if ( 'all' == $tab_name || 'additional' == $tab_name ) {
    if ( TA_HIEND_PI ) { ta_thm001highend_additional_mode_update( $process, $create_dir ); }
  }
  //ダイジェスト・一覧
  if ( 'all' == $tab_name || 'digest' == $tab_name ) {
    ta_update_option( $process, $create_dir, 'ta_responsible_top_latestposts_rows_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_top_latestposts_excerpt_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_top_latestposts_img_size', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_top_latestposts_excerpt_minheight_type', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_top_latestposts_excerpt_minheight', 'numeral' );
    if ( TA_HIEND_PI ) { ta_thm001highend_responsible_dl_top_postdigest_update( $process, $create_dir ); }
    if ( TA_HIEND_PI ) { ta_thm001highend_responsible_dl_sidebar_latestposts_update( $process, $create_dir ); }
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebar_postdigest_rows_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebar_postdigest_excerpt_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebar_postdigest_img_size', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebar_postdigest_excerpt_minheight_type', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebar_postdigest_excerpt_minheight', 'numeral' );
    if ( TA_HIEND_PI ) { ta_thm001highend_responsible_dl_sidebarsub_digest_update( $process, $create_dir ); }
    ta_update_option( $process, $create_dir, 'ta_responsible_archive_rows_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_archive_excerpt_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_archive_img_size', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_archive_excerpt_minheight_type', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_archive_excerpt_minheight', 'numeral' );
  }
  //レスポンシブデザインフリーCSS
  if ( 'all' == $tab_name || 'freecss' == $tab_name ) {
    ta_update_option( $process, $create_dir, 'ta_responsible_freecss_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_freecss_code', 'text' );
  }
}


/********* レスポンシブデザイン『ヘッダー』メニューアイテム関数 *********/
function ta_responsiblehead_items( $process = '', $create_dir = '', $tab_name = 'all' ) {
  //ヘッダー
  if ( 'all' == $tab_name || 'header' == $tab_name ) {
    //ヘッダーのレスポンシブデザイン設定
    ta_update_option( $process, $create_dir, 'ta_responsible_header_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_font_size', 'numeral' );
    ta_paragraph_update_option( $process, $create_dir, 'ta_responsible_header_font' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_top_margin', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_bottom_margin', 'numeral' );
    //レスポンシブデザイン時のヘッダーの背景色・背景画像
    ta_update_option( $process, $create_dir, 'ta_responsible_header_frame_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_frame_color', 'as_is' );
    ta_gradient_color_update_option( $process, $create_dir, 'ta_responsible_header_frame_color' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_frame_pic', 'url' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_frame_pic_rule', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_frame_pic_margin', 'numeral' );
  }
  //ロゴエリア
  if ( 'all' == $tab_name || 'logoarea' == $tab_name ) {
    ta_update_option( $process, $create_dir, 'ta_responsible_header_logoarea_onoff', 'single_check' );
    ta_responsible_detail_update_option( $process, $create_dir, 'ta_responsible_header_logoarea_h1' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_logoarea_h1_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_logoarea_h1_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_logoarea_h1_fontweight', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_logoarea_h1_anchor_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_logoarea_h1_anchor_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_logoarea_h1_anchor_under', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_logoarea_h1_anchor_colorhover_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_logoarea_h1_anchor_colorhover', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_logoarea_h1_anchor_underhover', 'single_check' );
    ta_responsible_detail_update_option( $process, $create_dir, 'ta_responsible_header_logoarea_img' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_logoarea_img_fontweight', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_logoarea_img_text_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_logoarea_img_text_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_logoarea_img_text_under', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_logoarea_img_text_colorhover_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_logoarea_img_text_colorhover', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_logoarea_img_text_underhover', 'single_check' );
  }
  //連絡先エリア
  if ( 'all' == $tab_name || 'infoarea' == $tab_name ) {
    ta_update_option( $process, $create_dir, 'ta_responsible_header_infoarea_onoff', 'single_check' );
    ta_responsible_detail_update_option( $process, $create_dir, 'ta_responsible_header_infoarea_img' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_infoarea_img_fontweight', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_infoarea_img_text_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_infoarea_img_text_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_infoarea_img_text_under', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_infoarea_img_text_colorhover_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_infoarea_img_text_colorhover', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_infoarea_img_text_underhover', 'single_check' );
    ta_responsible_detail_update_option( $process, $create_dir, 'ta_responsible_header_infoarea_menu' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_infoarea_menu_fontweight', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_infoarea_menu_text_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_infoarea_menu_text_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_infoarea_menu_text_under', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_infoarea_menu_text_colorhover_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_infoarea_menu_text_colorhover', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_infoarea_menu_text_underhover', 'single_check' );
    ta_responsible_detail_update_option( $process, $create_dir, 'ta_responsible_header_infoarea_sns' );
  }
  //検索エリア
  if ( 'all' == $tab_name || 'searcharea' == $tab_name ) {
    ta_update_option( $process, $create_dir, 'ta_responsible_header_searcharea_onoff', 'single_check' );
    ta_responsible_detail_update_option( $process, $create_dir, 'ta_responsible_header_searcharea_search' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_searcharea_search_width', 'numeral' );
    ta_responsible_detail_update_option( $process, $create_dir, 'ta_responsible_header_searcharea_menu' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_searcharea_menu_fontweight', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_searcharea_menu_text_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_searcharea_menu_text_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_searcharea_menu_text_under', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_searcharea_menu_text_colorhover_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_searcharea_menu_text_colorhover', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_header_searcharea_menu_text_underhover', 'single_check' );
    ta_responsible_detail_update_option( $process, $create_dir, 'ta_responsible_header_searcharea_sns' );
  }
  //グローバルメニュー
  if ( 'all' == $tab_name || 'globalmenu' == $tab_name ) {
    //グローバルナビのレスポンシブデザイン設定
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_top_margin', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_bottom_margin', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_w_padding_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_text_size_ratio', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_height_size_ratio', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_vertical_onoff', 'single_check' );
    //メニューボックスのレスポンシブデザイン設定
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_menubox_text', 'strip_html' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_menubox_anchor_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_menubox_anchor_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_menubox_box_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_menubox_box_color', 'as_is' );
    ta_gradient_color_update_option( $process, $create_dir, 'ta_responsible_glbnavi_menubox_box_color' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_menubox_size', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_menubox_weight', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_menubox_position', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_menubox_edge_margin', 'numeral', '', 50 );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_menubox_w_padding_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_menubox_height', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_menubox_anchor_colorhover_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_menubox_anchor_colorhover', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_menubox_box_colorhover_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_menubox_box_colorhover', 'as_is' );
    ta_gradient_color_update_option( $process, $create_dir, 'ta_responsible_glbnavi_menubox_box_colorhover' );
    //メインメニューのレスポンシブデザイン設定
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_mainmenu_height', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_mainmenu_marker_before_text', 'text' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_mainmenu_menubar_ratio', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_mainmenu_fontsize', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_mainmenu_fontweight', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_mainmenu_fontcolor_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_mainmenu_fontcolor', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_mainmenu_fontcolorhover_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_mainmenu_fontcolorhover', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_mainmenu_backcolor_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_mainmenu_backcolor', 'as_is' );
    ta_gradient_color_update_option( $process, $create_dir, 'ta_responsible_glbnavi_mainmenu_backcolor' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_mainmenu_backcolorhover_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_mainmenu_backcolorhover', 'as_is' );
    ta_gradient_color_update_option( $process, $create_dir, 'ta_responsible_glbnavi_mainmenu_backcolorhover' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_mainmenu_position', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_mainmenu_edge_margin', 'numeral', '', 50 );
    //サブメニューのレスポンシブデザイン設定
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_submenu_height', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_submenu_marker_before_text', 'text' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_submenu_menubar_ratio', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_submenu_fontsize', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_submenu_fontweight', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_submenu_fontcolor_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_submenu_fontcolor', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_submenu_fontcolorhover_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_submenu_fontcolorhover', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_submenu_backcolor_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_submenu_backcolor', 'as_is' );
    ta_gradient_color_update_option( $process, $create_dir, 'ta_responsible_glbnavi_submenu_backcolor' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_submenu_backcolorhover_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_submenu_backcolorhover', 'as_is' );
    ta_gradient_color_update_option( $process, $create_dir, 'ta_responsible_glbnavi_submenu_backcolorhover' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_submenu_position', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_glbnavi_submenu_edge_margin', 'numeral', '', 50 );
  }
  //ヘッダー画像
  if ( 'all' == $tab_name || 'headimg' == $tab_name ) {
    ta_update_option( $process, $create_dir, 'ta_responsible_headerimg_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_headerimg_w_padding_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_headerimg_top_margin', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_headerimg_bottom_margin', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_headerimg_text_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_headerimg_fontsize', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_headerimg_fontweight', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_headerimg_position_x', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_headerimg_position_y', 'numeral' );
  }
}


/********* レスポンシブデザイン『メイン（トップページ）』メニューアイテム関数 *********/
function ta_responsiblemain_items( $process = '', $create_dir = '', $tab_name = 'all' ) {
  //基本設定
  if ( 'all' == $tab_name || 'basic' == $tab_name ) {
    ta_update_option( $process, $create_dir, 'ta_responsible_top_topcatch_tate_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_top_topcatch_img_width', 'numeral' );
    if ( TA_HIEND_PI ) { ta_thm001highend_responsible_imgexp_menu_update( $process, $create_dir ); }
    ta_update_option( $process, $create_dir, 'ta_responsible_main_top_latestposts_onoff', 'single_check' );
    if ( TA_HIEND_PI ) { ta_thm001highend_responsible_top_postdigest_update( $process, $create_dir ); }
    ta_update_option( $process, $create_dir, 'ta_responsible_main_top_widgetarea_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_main_top_widgetarea_centering', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_top_fixed_space', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_main_fixed_space', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_main_font_size', 'numeral' );
    ta_paragraph_update_option( $process, $create_dir, 'ta_responsible_main_font' );
    ta_update_option( $process, $create_dir, 'ta_responsible_main_bread_size2common', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_main_top_margin', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_main_bottom_margin', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_main_tb_padding', 'numeral' );
    //レスポンシブデザイン時のメインコンテンツの背景色・背景画像
    ta_update_option( $process, $create_dir, 'ta_responsible_main_frame_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_main_frame_color', 'as_is' );
    if ( TA_HIEND_PI ) { ta_thm001highend_responsible_frame_update( 'main', $process, $create_dir ); }
  }
  //ヘッドライン（h2～h5）
  if ( 'all' == $tab_name || 'headline' == $tab_name ) {
    ta_update_option( $process, $create_dir, 'ta_responsible_main_h2_senyo_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_main_h3_senyo_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_main_h4_senyo_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_main_h5_senyo_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_main_h2_size2common', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_main_h3_size2common', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_main_h4_size2common', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_main_h5_size2common', 'numeral' );
    ta_headline_update_option( $process, $create_dir, 'ta_responsible_main_h2' );
    ta_headline_update_option( $process, $create_dir, 'ta_responsible_main_h3' );
    ta_headline_update_option( $process, $create_dir, 'ta_responsible_main_h4' );
    ta_headline_update_option( $process, $create_dir, 'ta_responsible_main_h5' );
  }
  //装飾（1～4）
  if ( 'all' == $tab_name || 'decoline' == $tab_name ) {
    if ( TA_HIEND_PI ) {
      ta_thm001highend_responsive_deco_update( $process, $create_dir, 'ta_responsible_main_deco1' );
      ta_thm001highend_responsive_deco_update( $process, $create_dir, 'ta_responsible_main_deco2' );
      ta_thm001highend_responsive_deco_update( $process, $create_dir, 'ta_responsible_main_deco3' );
      ta_thm001highend_responsive_deco_update( $process, $create_dir, 'ta_responsible_main_deco4' );
    }
  }
}


/********* レスポンシブデザイン『サイドバー』メニューアイテム関数 *********/
function ta_responsibleside_items( $process = '', $create_dir = '', $tab_name = 'all' ) {
  //基本設定
  if ( 'all' == $tab_name || 'basic' == $tab_name ) {
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebar_fixed_space', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebar_font_size', 'numeral' );
    ta_paragraph_update_option( $process, $create_dir, 'ta_responsible_sidebar_font' );
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebar_top_margin', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebar_bottom_margin', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebar_tb_padding', 'numeral' );
    if ( TA_HIEND_PI ) { ta_thm001highend_responsible_sidebar_latestposts_update( $process, $create_dir ); }
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebar_postdigest_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebar_widgetarea_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebar_widgetarea_centering', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebar_top_border_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebar_top_border_size', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebar_top_border_kind', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebar_top_border_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebar_top_border_color', 'as_is' );
    //レスポンシブデザイン時のサイドバーの背景色・背景画像
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebar_frame_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebar_frame_color', 'as_is' );
    if ( TA_HIEND_PI ) { ta_thm001highend_responsible_frame_update( 'sidebar', $process, $create_dir ); }
  }
  //ヘッドライン（h2～h5）
  if ( 'all' == $tab_name || 'headline' == $tab_name ) {
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebar_h2_senyo_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebar_h3_senyo_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebar_h4_senyo_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebar_h5_senyo_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebar_h2_size2common', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebar_h3_size2common', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebar_h4_size2common', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebar_h5_size2common', 'numeral' );
    ta_headline_update_option( $process, $create_dir, 'ta_responsible_sidebar_h2' );
    ta_headline_update_option( $process, $create_dir, 'ta_responsible_sidebar_h3' );
    ta_headline_update_option( $process, $create_dir, 'ta_responsible_sidebar_h4' );
    ta_headline_update_option( $process, $create_dir, 'ta_responsible_sidebar_h5' );
  }
  //装飾（1～4）
  if ( 'all' == $tab_name || 'decoline' == $tab_name ) {
    if ( TA_HIEND_PI ) {
      ta_thm001highend_responsive_deco_update( $process, $create_dir, 'ta_responsible_sidebar_deco1' );
      ta_thm001highend_responsive_deco_update( $process, $create_dir, 'ta_responsible_sidebar_deco2' );
      ta_thm001highend_responsive_deco_update( $process, $create_dir, 'ta_responsible_sidebar_deco3' );
      ta_thm001highend_responsive_deco_update( $process, $create_dir, 'ta_responsible_sidebar_deco4' );
    }
  }
}


/********* レスポンシブデザイン『サブサイドバー』メニューアイテム関数 *********/
function ta_responsiblesidesub_items( $process = '', $create_dir = '', $tab_name = 'all' ) {
  //基本設定
  if ( 'all' == $tab_name || 'basic' == $tab_name ) {
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebarsub_fixed_space', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebarsub_font_size', 'numeral' );
    ta_paragraph_update_option( $process, $create_dir, 'ta_responsible_sidebarsub_font' );
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebarsub_top_margin', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebarsub_bottom_margin', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebarsub_tb_padding', 'numeral' );
    if ( TA_HIEND_PI ) { ta_thm001highend_responsible_sidebarsub_digest_update( $process, $create_dir ); }
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebarsub_widgetarea_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebarsub_widgetarea_centering', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebarsub_top_border_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebarsub_top_border_size', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebarsub_top_border_kind', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebarsub_top_border_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebarsub_top_border_color', 'as_is' );
    //レスポンシブデザイン時のサブサイドバーの背景色・背景画像
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebarsub_frame_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebarsub_frame_color', 'as_is' );
    if ( TA_HIEND_PI ) { ta_thm001highend_responsible_frame_update( 'sidebarsub', $process, $create_dir ); }
  }
  //ヘッドライン（h2～h5）
  if ( 'all' == $tab_name || 'headline' == $tab_name ) {
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebarsub_h2_senyo_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebarsub_h3_senyo_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebarsub_h4_senyo_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebarsub_h5_senyo_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebarsub_h2_size2common', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebarsub_h3_size2common', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebarsub_h4_size2common', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_sidebarsub_h5_size2common', 'numeral' );
    ta_headline_update_option( $process, $create_dir, 'ta_responsible_sidebarsub_h2' );
    ta_headline_update_option( $process, $create_dir, 'ta_responsible_sidebarsub_h3' );
    ta_headline_update_option( $process, $create_dir, 'ta_responsible_sidebarsub_h4' );
    ta_headline_update_option( $process, $create_dir, 'ta_responsible_sidebarsub_h5' );
  }
}


/********* レスポンシブデザイン『フッター』メニューアイテム関数 *********/
function ta_responsiblefoot_items( $process = '', $create_dir = '', $tab_name = 'all' ) {
  //基本設定
  if ( 'all' == $tab_name || 'basic' == $tab_name ) {
    ta_update_option( $process, $create_dir, 'ta_responsible_footer_fixed_space', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_footer_font_size', 'numeral' );
    ta_paragraph_update_option( $process, $create_dir, 'ta_responsible_footer_font' );
    ta_update_option( $process, $create_dir, 'ta_responsible_footer_top_padding', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_footer_group1block_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_footer_group1block_margintop', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_footer_group2block_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_footer_group2block_margintop', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_footer_footerimg_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_footer_footerimg_width', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_footer_footerimg_fontweight', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_footer_footerimg_text_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_footer_footerimg_text_color', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_footer_footerimg_text_under', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_footer_footerimg_text_colorhover_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_footer_footerimg_text_colorhover', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_footer_footerimg_text_underhover', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_footer_freetext_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_footer_freetext_width', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_footer_footerimgsub_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_footer_footerimgsub_width', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_footer_footermenu_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_footer_footermenu_width', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_footer_widgetarea_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_footer_widgetarea_centering', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_footer_copyrightcontainer_paddingtop', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_footer_copyrightcontainer_paddingbottom', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_footer_copyright_padding', 'numeral' );
    //レスポンシブデザイン時のフッター背景色・背景画像
    ta_update_option( $process, $create_dir, 'ta_responsible_footer_frame_color_select', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_footer_frame_color', 'as_is' );
    ta_gradient_color_update_option( $process, $create_dir, 'ta_responsible_footer_frame_color' );
    ta_update_option( $process, $create_dir, 'ta_responsible_footer_frame_pic', 'url' );
    ta_update_option( $process, $create_dir, 'ta_responsible_footer_frame_pic_rule', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_responsible_footer_frame_pic_margin', 'numeral' );
  }
  //ヘッドライン（h2～h5）
  if ( 'all' == $tab_name || 'headline' == $tab_name ) {
    ta_update_option( $process, $create_dir, 'ta_responsible_footer_h2_senyo_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_footer_h3_senyo_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_footer_h4_senyo_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_footer_h5_senyo_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_responsible_footer_h2_size2common', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_footer_h3_size2common', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_footer_h4_size2common', 'numeral' );
    ta_update_option( $process, $create_dir, 'ta_responsible_footer_h5_size2common', 'numeral' );
    ta_headline_update_option( $process, $create_dir, 'ta_responsible_footer_h2' );
    ta_headline_update_option( $process, $create_dir, 'ta_responsible_footer_h3' );
    ta_headline_update_option( $process, $create_dir, 'ta_responsible_footer_h4' );
    ta_headline_update_option( $process, $create_dir, 'ta_responsible_footer_h5' );
  }
}


/********* SEO設定集中管理メニューアイテム関数 *********/
function ta_seocentral_items( $process = '', $create_dir = '', $tab_name = 'all' ) {
  //トップページ
  if ( 'toppage' == $tab_name ) {
    ta_update_option( $process, $create_dir, 'ta_top_seo_keywords', 'strip_html' );
    ta_update_option( $process, $create_dir, 'ta_top_seo_description', 'excerpt_nocr', 120 );
    ta_update_option( $process, $create_dir, 'ta_top_h1_content', 'text' );
    ta_update_option( $process, $create_dir, 'ta_top_canonical_domain', 'url' );
  }
  //固定ページ
  if ( 'all' == $tab_name || 'pages' == $tab_name ) {
    //表示方法基本設定
    ta_update_option( $process, $create_dir, 'ta_seocentral_pages_num', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_seocentral_pages_status', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_seocentral_pages_orderby', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_seocentral_pages_order', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_seocentral_pages_excerpt_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_seocentral_pages_comp_onoff', 'single_check' );
  }
  //投稿記事ページ
  if ( 'all' == $tab_name || 'posts' == $tab_name ) {
    //表示方法基本設定
    ta_update_option( $process, $create_dir, 'ta_seocentral_posts_cat', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_seocentral_posts_num', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_seocentral_posts_status', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_seocentral_posts_orderby', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_seocentral_posts_order', 'as_is' );
    ta_update_option( $process, $create_dir, 'ta_seocentral_posts_excerpt_onoff', 'single_check' );
    ta_update_option( $process, $create_dir, 'ta_seocentral_posts_comp_onoff', 'single_check' );
  }
}


/********* テキスト一般設定をオプションに保存する関数 *********/
function ta_text_general_update_option( $process, $create_dir, $base_key_name ) {
  ta_update_option( $process, $create_dir, $base_key_name . '_size', 'numeral' );
  ta_update_option( $process, $create_dir, $base_key_name . '_weight', 'as_is' );
  ta_update_option( $process, $create_dir, $base_key_name . '_color_select', 'as_is' );
  ta_update_option( $process, $create_dir, $base_key_name . '_color', 'as_is' );
  ta_update_option( $process, $create_dir, $base_key_name . '_anchor_color', 'as_is' );
  ta_update_option( $process, $create_dir, $base_key_name . '_anchor_underonoff', 'single_check' );
  ta_update_option( $process, $create_dir, $base_key_name . '_anchor_colorhover', 'as_is' );
  ta_update_option( $process, $create_dir, $base_key_name . '_paddingtop', 'numeral' );
  ta_update_option( $process, $create_dir, $base_key_name . '_paddingleft', 'numeral' );
  ta_update_option( $process, $create_dir, $base_key_name . '_listmarker', 'as_is' );
}


/********* サイトマップ一般設定をオプションに保存する関数 *********/
function ta_sitemap_general_update_option( $process, $create_dir, $base_key_name ) {
  ta_update_option( $process, $create_dir, $base_key_name . '_size', 'numeral' );
  ta_update_option( $process, $create_dir, $base_key_name . '_weight', 'as_is' );
  ta_update_option( $process, $create_dir, $base_key_name . '_color_select', 'as_is' );
  ta_update_option( $process, $create_dir, $base_key_name . '_color', 'as_is' );
  ta_update_option( $process, $create_dir, $base_key_name . '_anchor_color_select', 'as_is' );
  ta_update_option( $process, $create_dir, $base_key_name . '_anchor_color', 'as_is' );
  ta_update_option( $process, $create_dir, $base_key_name . '_anchor_colorhover_select', 'as_is' );
  ta_update_option( $process, $create_dir, $base_key_name . '_anchor_colorhover', 'as_is' );
  ta_update_option( $process, $create_dir, $base_key_name . '_anchor_underonoff', 'single_check' );
  ta_update_option( $process, $create_dir, $base_key_name . '_anchor_hoverunderonoff', 'single_check' );
  ta_update_option( $process, $create_dir, $base_key_name . '_paddingtop', 'numeral' );
  ta_update_option( $process, $create_dir, $base_key_name . '_paddingleft', 'numeral' );
  ta_update_option( $process, $create_dir, $base_key_name . '_listmarker', 'as_is' );
}


/********* フッターメニュー一般設定をオプションに保存する関数 *********/
function ta_footermenu_general_update_option( $process, $create_dir, $base_key_name ) {
  ta_update_option( $process, $create_dir, $base_key_name . '_size', 'numeral' );
  ta_update_option( $process, $create_dir, $base_key_name . '_weight', 'as_is' );
  ta_update_option( $process, $create_dir, $base_key_name . '_color_select', 'as_is' );
  ta_update_option( $process, $create_dir, $base_key_name . '_color', 'as_is' );
  ta_update_option( $process, $create_dir, $base_key_name . '_anchor_color_select', 'as_is' );
  ta_update_option( $process, $create_dir, $base_key_name . '_anchor_color', 'as_is' );
  ta_update_option( $process, $create_dir, $base_key_name . '_anchor_colorhover_select', 'as_is' );
  ta_update_option( $process, $create_dir, $base_key_name . '_anchor_colorhover', 'as_is' );
  ta_update_option( $process, $create_dir, $base_key_name . '_anchor_underonoff', 'single_check' );
  ta_update_option( $process, $create_dir, $base_key_name . '_anchor_hoverunderonoff', 'single_check' );
  ta_update_option( $process, $create_dir, $base_key_name . '_paddingtop', 'numeral' );
  ta_update_option( $process, $create_dir, $base_key_name . '_paddingleft', 'numeral' );
  ta_update_option( $process, $create_dir, $base_key_name . '_listmarker', 'as_is' );
}


/********* 最新投稿ダイジェスト詳細設定をオプションに保存する関数 *********/
function ta_latestposts_detail_update_option( $process, $create_dir, $place ) {
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_latestposts_title_onoff', 'single_check' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_latestposts_title_factor', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_latestposts_title', 'strip_html' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_latestposts_nodis_cats', 'check_array' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_latestposts_num', 'numeral' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_latestposts_full_content_onoff', 'single_check' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_latestposts_pager_type', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_latestposts_post_distance', 'numeral' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_latestposts_row_num', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_latestposts_row_distance', 'numeral' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_latestposts_post_border_type', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_latestposts_post_border_size', 'numeral' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_latestposts_post_border_color_select', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_latestposts_post_border_color', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_latestposts_post_border_bgcolor_select', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_latestposts_post_border_bgcolor', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_latestposts_post_border_kind', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_latestposts_post_border_padding', 'numeral' );
}


/********* 各種投稿ダイジェスト詳細設定をオプションに保存する関数 *********/
function ta_postdigest_detail_update_option( $process, $create_dir, $place ) {
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_postdigest_title_onoff', 'single_check' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_postdigest_title_link_onoff', 'single_check' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_postdigest_title_factor', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_postdigest_titles', 'check_array' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_postdigest_num', 'numeral' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_postdigest_full_content_onoff', 'single_check' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_postdigest_catlink_onoff', 'single_check' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_postdigest_catlink_title', 'strip_html' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_postdigest_catlink_title_underline_onoff', 'single_check' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_postdigest_catlink_title_size', 'numeral' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_postdigest_catlink_title_weight', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_postdigest_catlink_title_color_select', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_postdigest_catlink_title_color', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_postdigest_catlink_title_colorhover_select', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_postdigest_catlink_title_colorhover', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_postdigest_catlink_bgcolor_select', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_postdigest_catlink_bgcolor', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_postdigest_catlink_bgcolorhover_select', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_postdigest_catlink_bgcolorhover', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_postdigest_catlink_height', 'numeral' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_postdigest_catlink_minwidth', 'numeral' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_postdigest_catlink_round', 'numeral' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_postdigest_catlink_margintop', 'numeral' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_postdigest_pager_type', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_postdigest_post_distance', 'numeral' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_postdigest_row_num', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_postdigest_row_distance', 'numeral' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_postdigest_post_border_type', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_postdigest_post_border_size', 'numeral' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_postdigest_post_border_color_select', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_postdigest_post_border_color', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_postdigest_post_border_bgcolor_select', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_postdigest_post_border_bgcolor', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_postdigest_post_border_kind', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place . '_postdigest_post_border_padding', 'numeral' );
}


/********* ダイジェスト記事のデザイン設定をオプションに保存する関数 *********/
function ta_article_digest_design_update_option( $process, $create_dir, $place_and_role ) {
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_newwin_onoff', 'single_check' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_ind', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_cg_top', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_cg_bottom', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_post_title_factor', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_timecat', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_time_onoff', 'single_check' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_cat_onoff', 'single_check' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_time_color_select', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_time_color', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_time_size', 'numeral' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_time_weight', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_cat_size', 'numeral' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_cat_weight', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_cat_height', 'numeral' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_cat_width', 'numeral' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_cat_round', 'numeral' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_watchmark_onoff', 'single_check' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_cgp_onoff', 'single_check' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_img_pos', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_img_padding', 'numeral' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_img_size', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_excerpt', 'numeral' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_excerpt_minheight', 'numeral' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_excerpt_tpadding', 'numeral' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_excerpt_bpadding', 'numeral' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_excerpt_onlyfor_onoff', 'single_check' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_excerpt_size', 'numeral' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_excerpt_weight', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_excerpt_lineheight', 'numeral' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_excerpt_anchor_color_select', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_excerpt_anchor_color', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_excerpt_anchor_under', 'single_check' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_excerpt_anchor_colorhover_select', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_excerpt_anchor_colorhover', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_excerpt_anchor_underhover', 'single_check' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_excerpt_rightmark', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_excerpt_rightmark_color_select', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_excerpt_rightmark_color', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_excerpt_rightmark_size', 'numeral' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_excerpt_rightmark_weight', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_excerpt_rightmark_width', 'numeral' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_excerpt_rightmark_opacity', 'numeral' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_excerpt_rightmark_opacityhover', 'numeral' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_excerpt_lowermark', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_excerpt_lowermark_title', 'strip_html' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_excerpt_lowermark_title_size', 'numeral' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_excerpt_lowermark_title_weight', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_excerpt_lowermark_title_color_select', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_excerpt_lowermark_title_color', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_excerpt_lowermark_title_underline_onoff', 'single_check' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_excerpt_lowermark_title_colorhover_select', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_excerpt_lowermark_title_colorhover', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_excerpt_lowermark_title_hoverunderline_onoff', 'single_check' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_excerpt_lowermark_bgcolor_select', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_excerpt_lowermark_bgcolor', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_excerpt_lowermark_bgcolorhover_select', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_excerpt_lowermark_bgcolorhover', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_excerpt_lowermark_height', 'numeral' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_excerpt_lowermark_minwidth', 'numeral' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_excerpt_lowermark_round', 'numeral' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_excerpt_lowermark_paddingtop', 'numeral' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_release_mark_onoff', 'single_check' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_release_mark_days', 'numeral' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_release_mark_pic', 'url' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_release_mark_text', 'strip_html' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_release_mark_text_color_select', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_release_mark_text_color', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_release_mark_text_bgcolor_select', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_release_mark_text_bgcolor', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_release_mark_text_weight', 'as_is' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_release_mark_text_round', 'numeral' );
  ta_update_option( $process, $create_dir, 'ta_' . $place_and_role . '_release_mark_padding', 'numeral' );
}


/********* ヘッドライン設定をオプションに保存する関数 *********/
function ta_headline_update_option( $process, $create_dir, $base_key_name ) {
  ta_update_option( $process, $create_dir, $base_key_name . '_type', 'as_is' );
  ta_update_option( $process, $create_dir, $base_key_name . '_color_select', 'as_is' );
  ta_update_option( $process, $create_dir, $base_key_name . '_color', 'as_is' );
  ta_update_option( $process, $create_dir, $base_key_name . '_linkedcolor_select', 'as_is' );
  ta_update_option( $process, $create_dir, $base_key_name . '_linkedcolor', 'as_is' );
  ta_update_option( $process, $create_dir, $base_key_name . '_box_color_select', 'as_is' );
  ta_update_option( $process, $create_dir, $base_key_name . '_box_color', 'as_is' );
  ta_gradient_color_update_option( $process, $create_dir, $base_key_name . '_box_color' );
  ta_update_option( $process, $create_dir, $base_key_name . '_colorhover_select', 'as_is' );
  ta_update_option( $process, $create_dir, $base_key_name . '_colorhover', 'as_is' );
  ta_update_option( $process, $create_dir, $base_key_name . '_font_style_onoff', 'single_check' );
  ta_update_option( $process, $create_dir, $base_key_name . '_size', 'numeral' );
  ta_update_option( $process, $create_dir, $base_key_name . '_hl_lineheight', 'numeral' );
  ta_update_option( $process, $create_dir, $base_key_name . '_centering', 'single_check' );
  ta_update_option( $process, $create_dir, $base_key_name . '_position', 'numeral' );
  ta_update_option( $process, $create_dir, $base_key_name . '_weight', 'as_is' );
  ta_update_option( $process, $create_dir, $base_key_name . '_font_ul_onoff', 'single_check' );
  if ( strpos( $base_key_name, 'responsible' ) === false ) {
    ta_update_option( $process, $create_dir, $base_key_name . '_newwin_onoff', 'single_check' );
  }
  ta_update_option( $process, $create_dir, $base_key_name . '_font_hoverul_onoff', 'single_check' );
  ta_update_option( $process, $create_dir, $base_key_name . '_padding_top', 'numeral' );
  ta_update_option( $process, $create_dir, $base_key_name . '_padding_bottom', 'numeral' );
  ta_update_option( $process, $create_dir, $base_key_name . '_margin_top', 'numeral' );
  ta_update_option( $process, $create_dir, $base_key_name . '_margin_bottom', 'numeral' );
  ta_update_option( $process, $create_dir, $base_key_name . '_left_size', 'numeral' );
  ta_update_option( $process, $create_dir, $base_key_name . '_left_color_select', 'as_is' );
  ta_update_option( $process, $create_dir, $base_key_name . '_left_color', 'as_is' );
  ta_gradient_color_update_option( $process, $create_dir, $base_key_name . '_left_color' );
  ta_update_option( $process, $create_dir, $base_key_name . '_over_onoff', 'single_check' );
  ta_update_option( $process, $create_dir, $base_key_name . '_over_kind', 'as_is' );
  ta_update_option( $process, $create_dir, $base_key_name . '_over_size', 'numeral' );
  ta_update_option( $process, $create_dir, $base_key_name . '_over_color_select', 'as_is' );
  ta_update_option( $process, $create_dir, $base_key_name . '_over_color', 'as_is' );
  ta_gradient_color_update_option( $process, $create_dir, $base_key_name . '_over_color' );
  ta_update_option( $process, $create_dir, $base_key_name . '_under_onoff', 'single_check' );
  ta_update_option( $process, $create_dir, $base_key_name . '_under_kind', 'as_is' );
  ta_update_option( $process, $create_dir, $base_key_name . '_under_size', 'numeral' );
  ta_update_option( $process, $create_dir, $base_key_name . '_under_color_select', 'as_is' );
  ta_update_option( $process, $create_dir, $base_key_name . '_under_color', 'as_is' );
  ta_gradient_color_update_option( $process, $create_dir, $base_key_name . '_under_color' );
  ta_update_option( $process, $create_dir, $base_key_name . '_box_round', 'numeral' );
  ta_update_option( $process, $create_dir, $base_key_name . '_arrow_direction1', 'as_is' );
  ta_update_option( $process, $create_dir, $base_key_name . '_arrow_size1', 'numeral' );
  ta_update_option( $process, $create_dir, $base_key_name . '_arrow_position1', 'numeral' );
  ta_update_option( $process, $create_dir, $base_key_name . '_arrow_direction2', 'as_is' );
  ta_update_option( $process, $create_dir, $base_key_name . '_arrow_size2', 'numeral' );
  if ( TA_HIEND_PI ) { ta_thm001highend_headline_bgimg_update( $process, $create_dir, $base_key_name ); }
}


/********* レスポンシブデザイン詳細設定をオプションに保存する関数 *********/
function ta_responsible_detail_update_option( $process, $create_dir, $base_key_name ) {
  ta_update_option( $process, $create_dir, $base_key_name . '_onoff', 'single_check' );
  ta_update_option( $process, $create_dir, $base_key_name . '_size2common', 'numeral' );
  ta_update_option( $process, $create_dir, $base_key_name . '_position', 'as_is' );
  ta_update_option( $process, $create_dir, $base_key_name . '_w_padding_onoff', 'single_check' );
  ta_update_option( $process, $create_dir, $base_key_name . '_top_margin', 'numeral' );
  ta_update_option( $process, $create_dir, $base_key_name . '_bottom_margin', 'numeral' );
  ta_update_option( $process, $create_dir, $base_key_name . '_edge_margin', 'numeral', '', 50 );
}


/********* 基本パーツ共通設定をオプションに保存する関数 *********/
function ta_parts_select_update_option( $process, $create_dir, $base_key_name ) {
  ta_update_option( $process, $create_dir, $base_key_name . '_bgimg_onoff', 'single_check' );
  ta_update_option( $process, $create_dir, $base_key_name . '_banner_onoff', 'single_check' );
  ta_update_option( $process, $create_dir, $base_key_name . '_image_onoff', 'single_check' );
  ta_update_option( $process, $create_dir, $base_key_name . '_global_onoff', 'single_check' );
  ta_update_option( $process, $create_dir, $base_key_name . '_bread_onoff', 'single_check' );
  ta_update_option( $process, $create_dir, $base_key_name . '_title_onoff', 'single_check' );
  ta_update_option( $process, $create_dir, $base_key_name . '_footer_onoff', 'single_check' );
}


/********* コンテンツ先頭余白設定をオプションに保存する関数 *********/
function ta_top_margin_update_option( $process, $create_dir, $base_key_name ) {
  ta_update_option( $process, $create_dir, $base_key_name . '_top_margin', 'as_is' );
  ta_update_option( $process, $create_dir, $base_key_name . '_top_margin_value', 'numeral' );
}


/********* パラグラフ設定をオプションに保存する関数 *********/
function ta_paragraph_update_option( $process, $create_dir, $base_key_name ) {
  ta_update_option( $process, $create_dir, $base_key_name . '_onlyfor_onoff', 'single_check' );
  ta_update_option( $process, $create_dir, $base_key_name . '_p_lineheight', 'numeral' );
  ta_update_option( $process, $create_dir, $base_key_name . '_p_topmargin', 'numeral' );
  ta_update_option( $process, $create_dir, $base_key_name . '_p_bottommargin', 'numeral' );
  ta_update_option( $process, $create_dir, $base_key_name . '_p_leftmargin', 'numeral' );
  ta_update_option( $process, $create_dir, $base_key_name . '_p_rightmargin', 'numeral' );
}


/********* グラデーション設定をオプションに保存する関数 *********/
function ta_gradient_color_update_option( $process, $create_dir, $base_key_name ) {
  if ( TA_HIEND_PI ) {
    ta_thm001highend_gradient_color_update( $process, $create_dir, $base_key_name );
  }
}


/********* 背景バー設定をオプションに保存する関数 *********/
function ta_bg_bar_update_option( $process, $create_dir, $base_key_name, $pos ) {
  ta_update_option( $process, $create_dir, $base_key_name . '_bar_' . $pos . '_onoff', 'single_check' );
  ta_update_option( $process, $create_dir, $base_key_name . '_bar_' . $pos . '_width', 'numeral' );
  if ( 'gmenu' == $pos || 'free' == $pos ) {
    ta_update_option( $process, $create_dir, $base_key_name . '_bar_' . $pos . '_distance', 'numeral' );
  }
  ta_update_option( $process, $create_dir, $base_key_name . '_bar_' . $pos . '_color_select', 'as_is' );
  ta_update_option( $process, $create_dir, $base_key_name . '_bar_' . $pos . '_color', 'as_is' );
  ta_gradient_color_update_option( $process, $create_dir, $base_key_name . '_bar_' . $pos . '_color' );
}


/********* CSSファイルを自動生成する関数 *********/
//全てのCSSファイルの生成
function ta_dynamic_css_output( $mode = '' ) {
  if ( 'valid' != ta_read_op( 'ta_theme_no_cssfile' ) || 'all' == $mode ) {
    ta_dynamic_css_create();
    ta_dynamic_dg_css_create();
    ta_dynamic_hl_css_create();
    ta_dynamic_st_css_create();
    ta_dynamic_reshl_css_create();
    ta_dynamic_maintecss_create();
    ta_dynamic_freecss_create();
  }
}

//共通設定のCSSファイルの生成
function ta_dynamic_common_css_output( $mode = '', $tab_name = '' ) {
  if ( 'all' == $mode ) {
    ta_dynamic_css_output( 'all' );
  } else if ( 'valid' != ta_read_op( 'ta_theme_no_cssfile' ) ) {
    if ( 'freecssjsphp' == $tab_name ) {
      ta_dynamic_freecss_create();
    } else if ( 'etc' == $tab_name ) {
      ta_dynamic_css_create();
      ta_dynamic_maintecss_create();
    } else if ( 'basic' == $tab_name ) {
      ta_dynamic_css_create();
      ta_dynamic_hl_css_create();
      ta_dynamic_reshl_css_create();
    } else if ( 'limit' != $tab_name && 'sitemap' != $tab_name ) {
      ta_dynamic_css_create();
    }
  }
}

//トップページ設定のCSSファイルの生成
function ta_dynamic_top_css_output( $mode = '', $tab_name = '' ) {
  if ( 'all' == $mode ) {
    ta_dynamic_css_output( 'all' );
  } else if ( 'valid' != ta_read_op( 'ta_theme_no_cssfile' ) ) {
    if ( 'latestposts' == $tab_name || 'postdigest' == $tab_name ) {
      ta_dynamic_dg_css_create();
    } else if ( 'exparea' != $tab_name && 'freearea' != $tab_name ) {
      ta_dynamic_css_create();
    }
  }
}

//ヘッダー設定のCSSファイルの生成
function ta_dynamic_header_css_output( $mode = '', $tab_name = '' ) {
  if ( 'all' == $mode ) {
    ta_dynamic_css_output( 'all' );
  } else if ( 'valid' != ta_read_op( 'ta_theme_no_cssfile' ) ) {
    if ( 'freearea' != $tab_name ) {
      ta_dynamic_css_create();
    }
  }
}

//メイン設定のCSSファイルの生成
function ta_dynamic_main_css_output( $mode = '', $tab_name = '' ) {
  if ( 'all' == $mode ) {
    ta_dynamic_css_output( 'all' );
  } else if ( 'valid' != ta_read_op( 'ta_theme_no_cssfile' ) ) {
    if ( 'titleh2' == $tab_name || 'titleh3' == $tab_name || 'titleh4' == $tab_name || 'titleh5' == $tab_name ||
         'deco1' == $tab_name   || 'deco2' == $tab_name   || 'deco3' == $tab_name   || 'deco4' == $tab_name ) {
      ta_dynamic_hl_css_create();
    } else if ( 'freearea' != $tab_name ) {
      ta_dynamic_css_create();
    }
  }
}

//サイドバー設定のCSSファイルの生成
function ta_dynamic_sidebar_css_output( $mode = '', $tab_name = '' ) {
  if ( 'all' == $mode ) {
    ta_dynamic_css_output( 'all' );
  } else if ( 'valid' != ta_read_op( 'ta_theme_no_cssfile' ) ) {
    if ( 'titleh2' == $tab_name || 'titleh3' == $tab_name || 'titleh4' == $tab_name || 'titleh5' == $tab_name ||
         'deco1' == $tab_name   || 'deco2' == $tab_name   || 'deco3' == $tab_name   || 'deco4' == $tab_name ) {
      ta_dynamic_hl_css_create();
    } else if ( 'latestposts' == $tab_name || 'postdigest' == $tab_name ) {
      ta_dynamic_dg_css_create();
    } else if ( 'freearea' != $tab_name && 'menu' != $tab_name ) {
      ta_dynamic_css_create();
    }
  }
}

//サブサイドバー設定のCSSファイルの生成
function ta_dynamic_sidebarsub_css_output( $mode = '', $tab_name = '' ) {
  if ( 'all' == $mode ) {
    ta_dynamic_css_output( 'all' );
  } else if ( 'valid' != ta_read_op( 'ta_theme_no_cssfile' ) ) {
    if ( 'titleh2' == $tab_name || 'titleh3' == $tab_name || 'titleh4' == $tab_name || 'titleh5' == $tab_name ) {
      ta_dynamic_hl_css_create();
    } else if ( 'latestposts' == $tab_name || 'postdigest' == $tab_name ) {
      ta_dynamic_dg_css_create();
    } else if ( 'freearea' != $tab_name ) {
      ta_dynamic_css_create();
    }
  }
}

//フッター設定のCSSファイルの生成
function ta_dynamic_footer_css_output( $mode = '', $tab_name = '' ) {
  if ( 'all' == $mode ) {
    ta_dynamic_css_output( 'all' );
  } else if ( 'valid' != ta_read_op( 'ta_theme_no_cssfile' ) ) {
    if ( 'titleh2' == $tab_name || 'titleh3' == $tab_name || 'titleh4' == $tab_name || 'titleh5' == $tab_name ) {
      ta_dynamic_hl_css_create();
    } else if ( 'freearea' != $tab_name ) {
      ta_dynamic_css_create();
    }
  }
}

//便利ツール設定のCSSファイルの生成
function ta_dynamic_tools_css_output( $mode = '', $tab_name = '' ) {
  if ( 'all' == $mode ) {
    ta_dynamic_css_output( 'all' );
  } else if ( 'valid' != ta_read_op( 'ta_theme_no_cssfile' ) ) {
    if ( 'frame' != $tab_name && 'source' != $tab_name ) {
      ta_dynamic_css_create();
    }
  }
}

//汎用ショートコード設定のCSSファイルの生成
function ta_dynamic_short_css_output( $mode = '', $tab_name = '' ) {
  if ( 'all' == $mode ) {
    ta_dynamic_css_output( 'all' );
  } else if ( 'valid' != ta_read_op( 'ta_theme_no_cssfile' ) ) {
    if ( 'versatile' == $tab_name || 'imgexp' == $tab_name ) {
      ta_dynamic_st_css_create();
    } else if ( 'gnrlbg' != $tab_name ) {
      ta_dynamic_css_create();
    }
  }
}

//レスポンシブデザイン『基本・共通』設定のCSSファイルの生成
function ta_dynamic_responsible_css_output( $mode = '', $tab_name = '' ) {
  if ( 'all' == $mode ) {
    ta_dynamic_css_output( 'all' );
  } else if ( 'valid' != ta_read_op( 'ta_theme_no_cssfile' ) ) {
    if ( 'basic' == $tab_name ) {
      ta_dynamic_reshl_css_create();
      ta_dynamic_css_create();
    } else if ( 'freecss' == $tab_name ) {
      ta_dynamic_freecss_create();
    } else {
      ta_dynamic_css_create();
    }
  }
}

//レスポンシブデザイン『ヘッダー』設定のCSSファイルの生成
function ta_dynamic_responsiblehead_css_output( $mode = '' ) {
  if ( 'all' == $mode ) {
    ta_dynamic_css_output( 'all' );
  } else if ( 'valid' != ta_read_op( 'ta_theme_no_cssfile' ) ) {
    ta_dynamic_css_create();
  }
}

//レスポンシブデザイン『メイン（トップ）』設定のCSSファイルの生成
function ta_dynamic_responsiblemain_css_output( $mode = '', $tab_name = '' ) {
  if ( 'all' == $mode ) {
    ta_dynamic_css_output( 'all' );
  } else if ( 'valid' != ta_read_op( 'ta_theme_no_cssfile' ) ) {
    if ( 'headline' == $tab_name || 'decoline' == $tab_name ) {
      ta_dynamic_reshl_css_create();
    } else {
      ta_dynamic_css_create();
    }
  }
}

//レスポンシブデザイン『サイドバー』設定のCSSファイルの生成
function ta_dynamic_responsibleside_css_output( $mode = '', $tab_name = '' ) {
  if ( 'all' == $mode ) {
    ta_dynamic_css_output( 'all' );
  } else if ( 'valid' != ta_read_op( 'ta_theme_no_cssfile' ) ) {
    if ( 'headline' == $tab_name || 'decoline' == $tab_name ) {
      ta_dynamic_reshl_css_create();
    } else {
      ta_dynamic_css_create();
    }
  }
}

//レスポンシブデザイン『サブサイドバー』設定のCSSファイルの生成
function ta_dynamic_responsiblesidesub_css_output( $mode = '', $tab_name = '' ) {
  if ( 'all' == $mode ) {
    ta_dynamic_css_output( 'all' );
  } else if ( 'valid' != ta_read_op( 'ta_theme_no_cssfile' ) ) {
    if ( 'headline' == $tab_name ) {
      ta_dynamic_reshl_css_create();
    } else {
      ta_dynamic_css_create();
    }
  }
}

//レスポンシブデザイン『フッター』設定のCSSファイルの生成
function ta_dynamic_responsiblefoot_css_output( $mode = '', $tab_name = '' ) {
  if ( 'all' == $mode ) {
    ta_dynamic_css_output( 'all' );
  } else if ( 'valid' != ta_read_op( 'ta_theme_no_cssfile' ) ) {
    if ( 'headline' == $tab_name ) {
      ta_dynamic_reshl_css_create();
    } else {
      ta_dynamic_css_create();
    }
  }
}


/********* ディレクトリー・ファイル名を判別する関数 *********/
function ta_namecheck( $str ) {
  if ( ! ctype_alnum( str_replace( '_', '', $str ) ) ) {  //'_'以外は全ての文字が英数字かどうか
    $str = '';
  }
  if ( '' != $str && ( ! ctype_alpha( $str[0] ) || '_' == $str[0] ) ) {     //先頭が英字かどうか
    $str = '';
  }
  return $str;
}
