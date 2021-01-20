<?php
/****************************************************************************************************/
/*
/* テックエイドの成長する自作ホームページWordPressテーマ『 TAテーマ001 (ta-theme001) 』
/*
/* ta-setting-functions.php: ( Latest Version 2.07 2017.04.15 )
/*
/* このプログラムの著作権、使用権、その他全ての権利はde集まれ株式会社に属します。
/* The copyright, royalty and all the other rights of this program belong to deatsumare Corporation.
/*
/* File Version 履歴
/* File Version 2.00 2016.02.28: first edition by Kotaro Kashiwamura.
/* File Version 2.01 2016.04.01: ヘッドラインに文字下線追加
/*                               カテゴリーの閲覧制限設定変更
/*                               ta_post_setting_show()追加
/*                               ダイジェストデザインコンテンツグループ表示追加
/*                               ダイジェストデザイン記事境界線内の背景色追加
/*                               ta_color_picker_process_posttype追加
/*                               自動配列ショートコードののりしろ(padding)追加 by Kotaro Kashiwamura.
/* File Version 2.02 2016.05.10: ta_img_upload_processに初期値(built_in)設定を追加
/*                               ta_read_op_builtin_imgに初期値(built_in)表示機能を追加
/*                               ショートコード説明文に取説ページへのリンク追加
/*                               ta_deletedirにディレクトリー判別追加
/*                               ta_update_optionの'url'に'built_in'処理追加
/*                               ta_info_dispのURL変更 by Kotaro Kashiwamura.
/* File Version 2.03 2016.06.22: ta_headline_confirmのタイトル前方装飾画像位置調整追加
/*                               ta_responsive_headline_register追加
/*                               ta_simple_input, ta_text_inputにid($key_name)追加
/*                               修飾1～修飾4の説明追加 by Kotaro Kashiwamura.
/* File Version 2.04 2016.07.01: ta_google_map_message()削除
/*                               カスタムボックス注釈（メッセージ）の一本化
/*                               ta_genbg_message()追加 by Kotaro Kashiwamura.
/* File Version 2.05 2016.08.29: パラグラフの設定関数追加、フレームフォント設定関数修正
/*                               ta_headline_register, ta_responsive_headline_registerに線の種類を追加
/*                               ta_article_digest_designに抜粋文字装飾追加、
/*                               カスタムボックスでのメッセージ修正
/*                               各ページ専用ヘッダー画像の設定追加 by Kotaro Kashiwamura.
/* File Version 2.06 2017.03.11: メイン・（サブ）サイドバー区切り線注釈追加
/*                               グラデーション表示追加、背景バー追加、ta_color_picker_process系関数修正
/*                               ta_select_color_w_image_color関数追加、色選択修正、
/*                               bloginfo修正、ta_progress_disp()追加 by Kotaro Kashiwamura.
/* File Version 2.07 2017.04.15: 各編集ページの『便利情報』に貼り付け用コード追加、
/*                               ta_headline_confirm()共通フォントバグ修正、
/*                               ajax失敗時のメッセージの文言修正と消去時間設定、
/*                               ta_setting_form_startにHiend場合分け追加、
/*                               ta_headline_confirm()左縦線の初期化とheight修正 by Kotaro Kashiwamura.
/*
/****************************************************************************************************/

/********* DBからデータを読み出す関数 *********/
//設定情報をオプションから読み出す関数
function ta_read_op( $key_name ) {
  $data = ( '' == get_option( '_' . $key_name ) ) ? ta_init( $key_name ) : get_option( '_' . $key_name );
  return $data;
}

//設定情報をオプションから読み出す関数（テーマ内蔵画像を使用している場合）
function ta_read_op_builtin_img( $key_name ) {
  //テーマ内蔵画像配列
  $builtin = array( 'ta_common_top_outframe_pic', 'ta_common_outframe_pic', 'ta_top_topcatch_pic1', 'ta_top_topcatch_pic2', 
                    'ta_top_topcatch_pic3', 'ta_header_logo_pic', 'ta_footer_frame_pic', 'ta_responsible_footer_frame_pic',
                    'ta_common_back2top_img', 'ta_common_favicon_img', 'ta_common_appletouch_img' );
  $data = ( '' == get_option( '_' . $key_name ) ) ? ta_init( $key_name ) : get_option( '_' . $key_name );
  if ( in_array( $key_name, $builtin ) && 'built_in' == $data ) {
    switch ( $key_name ) {
      case 'ta_common_top_outframe_pic':
        $data = get_template_directory_uri() . "/images/ta-bg-images/bodyhome_bg.png";
        break;
      case 'ta_common_outframe_pic':
        $data = get_template_directory_uri() . "/images/ta-bg-images/body_bg.png";
        break;
      case 'ta_top_topcatch_pic1':
        $data = get_template_directory_uri() . "/images/ta-top-catch/valentine-candy.jpg";
        break;
      case 'ta_top_topcatch_pic2':
        $data = get_template_directory_uri() . "/images/ta-top-catch/jelly-babies.jpg";
        break;
      case 'ta_top_topcatch_pic3':
        $data = get_template_directory_uri() . "/images/ta-top-catch/bananas.jpg";
        break;
      case 'ta_header_logo_pic':
        $data = get_template_directory_uri() . "/images/ta-header-images/logo.png";
        break;
      case 'ta_footer_frame_pic':
        $data = get_template_directory_uri() . "/images/ta-bg-images/footer_bg.png";
        break;
      case 'ta_responsible_footer_frame_pic':
        $data = get_template_directory_uri() . "/images/ta-res-bg-images/res_footer_bg.png";
        break;
      case 'ta_common_back2top_img':
        $data = get_template_directory_uri() . "/images/ta-back2top-images/ta-back2top.png";
        break;
      case 'ta_common_favicon_img':
        $data = get_template_directory_uri() . "/images/ta-favicon-images/favicon.ico";
        break;
      case 'ta_common_appletouch_img':
        $data = get_template_directory_uri() . "/images/ta-favicon-images/apple-touch-icon.png";
        break;
      default:
        $data = 'no_image';
    }
  }
  return $data;
}

//設定情報をpostmetaから読み出す関数
function ta_read_post( $post_id, $key_name ) {
  $data = ( '' == get_post_meta( $post_id, '_' . $key_name, true ) ) ? ta_init( $key_name ) : get_post_meta( $post_id, '_' . $key_name, true );
  return $data;
}


/********* オプションに保存する関数 *********/
function ta_update_option( $process, $create_dir, $key_name, $type = 'as_is', $excerpt_num = 120, $limit_num = 'no_limit' ) {
  if ( 'create' == $process ) {
    global $file_names;
    $file_names .= TASOURCEFILE_SEPARATOR . $key_name;
  } else if ( 'reset' == $process ) {
    delete_option( '_' . $key_name );
  } else {
    if ( 'as_is' == $type || 'asis' == $type ) {
      $value = isset( $_POST[$key_name] ) ? $_POST[$key_name] : 'TA_No_Key_For_Update';              //そのまま格納する
    } else if ( 'text' == $type || 'txt' == $type ) {
      $value = isset( $_POST[$key_name] ) ? esc_html( $_POST[$key_name] ) : 'TA_No_Key_For_Update';  //htmlエスケープして格納する
    } else if ( 'url' == $type ) {
      if ( isset( $_POST[$key_name] ) ) {
        if ( 'no_image' == $_POST[$key_name] || 'no_link' == $_POST[$key_name] || 'built_in' == $_POST[$key_name] ) {
          $value = $_POST[$key_name];             //そのまま格納する
        } else {
          $value = esc_url( $_POST[$key_name] );  //urlエスケープして格納する
        }
      } else {
        $value = 'TA_No_Key_For_Update';
      }
    } else if ( 'numeral' == $type || 'num' == $type ) {
      if ( isset( $_POST[$key_name] ) ) {
        $value = mb_convert_kana( $_POST[$key_name], "n" );  //「全角」数字を「半角」に変換
        if ( 'no_limit' != $limit_num ) {
          $value = ( $value > $limit_num ) ? $limit_num : $value;
        }
        if ( ! is_numeric( $value) ) {  //数値で無い場合
          $value = '';
        }
      } else {
        $value = 'TA_No_Key_For_Update';
      }
    } else if ( 'excerpt_nocr' == $type ) {
      if ( isset( $_POST[$key_name] ) ) {
        $value = strip_tags( $_POST[$key_name] );  //htmlタグの削除
        /* 改行などを無視して文章を設定文字数抜粋する */
        $value = strip_shortcodes( $value );
        $value = str_replace( '&nbsp;', "", $value );
        $value = str_replace( array( "\r\n","\r","\n" ), '', $value );
        $value = wp_html_excerpt( $value, $excerpt_num );
      } else {
        $value = 'TA_No_Key_For_Update';
      }
    } else if ( 'single_check' == $type ) {
      if ( isset( $_POST[$key_name] ) ) {
        $value = 'valid';
      } else {
        $value = 'invalid';
      }
    } else if ( 'check_array' == $type ) {
      if ( isset( $_POST[$key_name] ) ) {
        $value = $_POST[$key_name];
      } else {
        $value = array();
      }
    } else if ( 'strip_html' == $type ) {
      if ( isset( $_POST[$key_name] ) ) {
        $value = strip_tags( $_POST[$key_name] );  //htmlタグの削除
      } else {
        $value = 'TA_No_Key_For_Update';
      }
    }
    if ( 'TA_No_Key_For_Update' != $value ) { update_option( '_' . $key_name, $value ); }
  }
}


/********* postmetaに保存する関数（ta-save-post.phpで使用する）*********/
function ta_update_postmeta( $post_id, $key_name, $type = 'as_is', $excerpt_num = 120 ) {
  if ( 'as_is' == $type || 'asis' == $type ) {
    $value = isset( $_POST[$key_name] ) ? $_POST[$key_name] : '';              //そのまま格納する
  } else if ( 'text' == $type || 'txt' == $type ) {
    $value = isset( $_POST[$key_name] ) ? esc_html( $_POST[$key_name] ) : '';  //htmlエスケープして格納する
  } else if ( 'url' == $type ) {
    if ( isset( $_POST[$key_name] ) ) {
      if ( 'no_image' == $_POST[$key_name] || 'no_link' == $_POST[$key_name] ) {
        $value = $_POST[$key_name];             //そのまま格納する
      } else {
        $value = esc_url( $_POST[$key_name] );  //urlエスケープして格納する
      }
    } else {
      $value = '';
    }
  } else if ( 'numeral' == $type || 'num' == $type ) {
    if ( isset( $_POST[$key_name] ) ) {
      $value = mb_convert_kana( $_POST[$key_name], "n" );  //「全角」数字を「半角」に変換
      if ( ! is_numeric( $value ) ) {  //数値で無い場合
        $value = '';
      }
    } else {
      $value = '';
    }
  } else if ( 'nump100' == $type ) {
    if ( isset( $_POST[$key_name] ) ) {
      $value = mb_convert_kana( $_POST[$key_name], "n" ) + 100;  //「全角」数字を「半角」に変換後100を加算
      if ( ! is_numeric( $value ) || $value < 100 ) {  //数値で無い場合または入力が負の場合
        $value = 100;
      }
    } else {
      $value = '';
    }
  } else if ( 'excerpt_nocr' == $type ) {
    if ( isset( $_POST[$key_name] ) ) {
      $value = strip_tags( $_POST[$key_name] );  //htmlタグの削除
      /* 改行などを無視して文章を設定文字数抜粋する */
      $value = strip_shortcodes( $value );
      $value = str_replace( '&nbsp;', "", $value );
      $value = str_replace( array( "\r\n","\r","\n" ), '', $value );
      $value = wp_html_excerpt( $value, $excerpt_num );
    } else {
      $value = '';
    }
  } else if ( 'single_check' == $type ) {
    if ( isset( $_POST[$key_name] ) ) {
      $value = 'valid';
    } else {
      $value = 'invalid';
    }
  } else if ( 'strip_html' == $type ) {
    if ( isset( $_POST[$key_name] ) ) {
      $value = strip_tags( $_POST[$key_name] );  //htmlタグの削除
    } else {
      $value = '';
    }
  }
  if ( ! empty( $value ) ) update_post_meta( $post_id, '_' . $key_name, $value );
  else delete_post_meta( $post_id, '_' . $key_name );
}


/********* htmlエスケープされた元に戻してhtml表示させる関数 *********/
//改行の<br/>変換も行う（テキストエリア入力などに使用する）
function ta_eschtml2html_wbr( $value ) {
 echo stripslashes( htmlspecialchars_decode( nl2br( $value ), ENT_QUOTES ) );
}

//改行は無視
function ta_eschtml2html( $value ) {
  echo stripslashes( htmlspecialchars_decode( $value, ENT_QUOTES ) );
}


/********* htmlエスケープされた表記から\マークを削除して表示させる関数 *********/
function ta_deleteyen( $value ) {
  echo stripslashes( $value );
}


/********* ディレクトリー削除に関する関数 *********/
function ta_deletedir( $delete_dir, $err_name ) {
  if( ! $dh = opendir( $delete_dir ) ) {
    return 'err=' . $err_name . 'ddlt';
  }
  while ( false !== ( $obj = readdir( $dh ) ) ) {
    if ( $obj == '.' || $obj == '..' ) {
      continue;
    }
    if ( is_dir( $delete_dir . '/' . $obj ) ) {
      ta_deletedir( $delete_dir.'/'.$obj, $err_name );
    } else {
      unlink( $delete_dir.'/'.$obj );
    }
  }
  closedir( $dh );
  if ( ! rmdir( $delete_dir ) ) { return 'err=' . $err_name . 'ddlt'; }
  return '';
}


/********* フレームタイプの選択に関する共通関数 *********/
function ta_frametype_selection_process( $key_name, $type = "option", $post_id = 0 ) {
  if ( "option" == $type || "common_setting" == $type ) {
    $init_value = ta_read_op( $key_name );
  } else if ( "postmeta" == $type ) {
    $init_value = ta_read_post( $post_id, $key_name );
  }
  if ( "common_setting" != $type ) { ?>
  <p><input type="radio" name="<?php echo $key_name; ?>" value="common_style" <?php if ( "common_style" == $init_value ) echo 'checked="checked"'; ?>> 共通設定</p>
<?php
  } ?>
  <p><input type="radio" name="<?php echo $key_name; ?>" value="main_sidebar" <?php if ( "main_sidebar" == $init_value ) echo 'checked="checked"'; ?>> 2列： メインコンテンツ（左）＋ サイドバー（右）</p>
  <p><input type="radio" name="<?php echo $key_name; ?>" value="sidebar_main" <?php if ( "sidebar_main" == $init_value ) echo 'checked="checked"'; ?>> 2列： サイドバー（左）＋ メインコンテンツ（右）</p>
  <p><input type="radio" name="<?php echo $key_name; ?>" value="main_only" <?php if ( "main_only" == $init_value ) echo 'checked="checked"'; ?>> 1列： メインコンテンツのみ</p>
  <p><input type="radio" name="<?php echo $key_name; ?>" value="sidebarsub_main_sidebar" <?php if ( "sidebarsub_main_sidebar" == $init_value ) echo 'checked="checked"'; ?>> 3列： サブサイドバー（左）＋ メインコンテンツ（中央）＋ サイドバー（右）</p>
<?php
}


/********* イメージカラー選択に関する共通関数 *********/
function ta_select_color_w_image_color( $key_name ) {
  $ta_common_site_bg_color = ta_read_op( 'ta_common_site_bg_color' );
  $ta_common_site_hl_color = ta_read_op( 'ta_common_site_hl_color' );
  $ta_common_site_text_on_bg_color = ta_read_op( 'ta_common_site_text_on_bg_color' );
  $ta_common_site_text_on_hl_color = ta_read_op( 'ta_common_site_text_on_hl_color' );
  $ta_common_font_anchor_color = ta_read_op( 'ta_common_font_anchor_color' );
  $ta_common_font_anchor_colorhover = ta_read_op( 'ta_common_font_anchor_colorhover' );
  $select_info = ta_read_op( $key_name . '_select' );
  $selected_color = ta_read_op( $key_name );
  if ( 'common_site_bg' == $select_info ) {
    $selected_color = $ta_common_site_bg_color;
  } else if ( 'common_site_hl' == $select_info ) {
    $selected_color = $ta_common_site_hl_color;
  } else if ( 'common_site_text_on_bg' == $select_info ) {
    $selected_color = $ta_common_site_text_on_bg_color;
  } else if ( 'common_site_text_on_hl' == $select_info ) {
    $selected_color = $ta_common_site_text_on_hl_color;
  } else if ( 'common_font_anchor_color' == $select_info ) {
    $selected_color = $ta_common_font_anchor_color;
  } else if ( 'common_font_anchor_colorhover' == $select_info ) {
    $selected_color = $ta_common_font_anchor_colorhover;
  }
  return $selected_color;
}

function ta_select_color_w_image_color_posttype( $post_id, $key_name ) {
  $ta_common_site_bg_color = ta_read_op( 'ta_common_site_bg_color' );
  $ta_common_site_hl_color = ta_read_op( 'ta_common_site_hl_color' );
  $ta_common_site_text_on_bg_color = ta_read_op( 'ta_common_site_text_on_bg_color' );
  $ta_common_site_text_on_hl_color = ta_read_op( 'ta_common_site_text_on_hl_color' );
  $ta_common_font_anchor_color = ta_read_op( 'ta_common_font_anchor_color' );
  $ta_common_font_anchor_colorhover = ta_read_op( 'ta_common_font_anchor_colorhover' );
  $select_info = ta_read_post( $post_id, $key_name . '_select' );
  $selected_color = ta_read_post( $post_id, $key_name );
  if ( 'common_site_bg' == $select_info ) {
    $selected_color = $ta_common_site_bg_color;
  } else if ( 'common_site_hl' == $select_info ) {
    $selected_color = $ta_common_site_hl_color;
  } else if ( 'common_site_text_on_bg' == $select_info ) {
    $selected_color = $ta_common_site_text_on_bg_color;
  } else if ( 'common_site_text_on_hl' == $select_info ) {
    $selected_color = $ta_common_site_text_on_hl_color;
  } else if ( 'common_font_anchor_color' == $select_info ) {
    $selected_color = $ta_common_font_anchor_color;
  } else if ( 'common_font_anchor_colorhover' == $select_info ) {
    $selected_color = $ta_common_font_anchor_colorhover;
  }
  return $selected_color;
}


/********* 各フレームの背景色・画像設定に関する共通関数 *********/
function ta_common_bodywrap_setting( $key_name, $description, $colorselect = 'invalid' ) {
  if ( 'ta_common_top_outframe' == $key_name ) {
    $hashmark = '#top';
  } else {
    $hashmark = '#nontop';
  }
  $description = $description . '<br>body背景色・画像'; ?>
  <tr>
    <th id="<?php echo $key_name; ?>_title" class="big-title"><a href="JavaScript:void(0);"><?php echo $description; ?></a><?php ta_man2_gd( 'common/bodywrap' . $hashmark ); ?></th>
    <td>
      <div id="<?php echo $key_name; ?>_disp" class="init-nodisp">
        <!-- 背景色(グラデーション) -->
        <h4>背景色</h4>
        <?php ta_color_picker_grad_process( $key_name . '_color', $colorselect ); ?>
        <span class="fixed-space"></span>
        <hr class="fixed-border">
        <!-- 背景画像#1：上位 -->
        <h4 id="<?php echo $key_name; ?>_pro_title" class="pro-title"><a href="JavaScript:void(0);">背景画像#1：上位</a></h4>
        <div id="<?php echo $key_name; ?>_pro_disp" class="pro-disp init-nodisp">
          <h4>背景画像#1</h4>
          <?php ta_img_upload_process( $key_name . '_pic' ); ?>
          <p>※ 縦横幅の最大値を500ピクセルに制限しています</p>
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <h4>背景画像#1の場所と繰り返しルール</h4>
          <?php ta_image_position_rule( $key_name . '_pic_rule' ); ?>
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <h4>背景画像#1の上下部端からの距離</h4>
          <?php ta_simple_input( $key_name . '_pic_margin', 'ピクセル', 'short_box' ); ?>
          <p>※ y方向の繰り返しが無い場合のみ有効（グラデーションは背景画像扱いのため画像と同様にシフトします）</p>
          <span class="fixed-space"></span>
        </div><!-- end of #<?php echo $key_name; ?>_pro_disp -->
        <span class="fixed-space"></span>
        <hr class="fixed-border">
        <!-- 背景画像#2：下位 -->
        <h4 id="<?php echo $key_name; ?>_pro2_title" class="pro-title"><a href="JavaScript:void(0);">背景画像#2：下位</a></h4>
        <div id="<?php echo $key_name; ?>_pro2_disp" class="pro-disp init-nodisp">
          <h4>背景画像#2</h4>
          <?php ta_img_upload_process( $key_name . '_pic2' ); ?>
          <p>※ 縦横幅の最大値を500ピクセルに制限しています</p>
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <h4>背景画像#2の場所と繰り返しルール</h4>
          <?php ta_image_position_rule( $key_name . '_pic2_rule' ); ?>
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <h4>背景画像#2の上下部端からの距離</h4>
          <?php ta_simple_input( $key_name . '_pic2_margin', 'ピクセル', 'short_box' ); ?>
          <p>※ y方向の繰り返しが無い場合のみ有効（グラデーションは背景画像扱いのため画像と同様にシフトします）</p>
          <span class="fixed-space"></span>
        </div><!-- end of #<?php echo $key_name; ?>_pro2_disp -->
        <span class="fixed-space"></span>
      </div><!-- end of #<?php echo $key_name; ?>_disp -->
    </td>
  </tr>
<?php
}

function ta_common_bodybar_setting( $key_name, $description, $colorselect = 'invalid' ) {
  $description = $description . '<br>body背景バー'; ?>
  <tr>
    <th id="<?php echo $key_name; ?>_bar_title" class="big-title"><a href="JavaScript:void(0);"><?php echo $description; ?></a><?php ta_man2_gd( 'common/bodybar' ); ?></th>
    <td>
      <div id="<?php echo $key_name; ?>_bar_disp" class="init-nodisp">
        <!-- サイト上端背景バー -->
        <h4 id="<?php echo $key_name; ?>_pro3_title" class="pro-title"><a href="JavaScript:void(0);">サイト上端背景バー</a></h4>
        <div id="<?php echo $key_name; ?>_pro3_disp" class="pro-disp init-nodisp">
          <?php ta_bodywrap_bar_setting( $key_name, 'top' ); ?>
        </div><!-- end of #<?php echo $key_name; ?>_pro3_disp -->
        <span class="fixed-space"></span>
        <hr class="fixed-border">
        <!-- サイト下端背景バー -->
        <h4 id="<?php echo $key_name; ?>_pro4_title" class="pro-title"><a href="JavaScript:void(0);">サイト下端背景バー</a></h4>
        <div id="<?php echo $key_name; ?>_pro4_disp" class="pro-disp init-nodisp">
          <p style="color:#ff0000;margin-bottom:0.7em;">※ サイト下端背景バーはフッター領域内でお使いください。</p>
          <?php ta_bodywrap_bar_setting( $key_name, 'bottom' ); ?>
        </div><!-- end of #<?php echo $key_name; ?>_pro4_disp -->
        <span class="fixed-space"></span>
        <hr class="fixed-border">
        <!-- グローバルメニュー背景バー -->
        <h4 id="<?php echo $key_name; ?>_pro5_title" class="pro-title"><a href="JavaScript:void(0);">グローバルメニュー背景バー</a></h4>
        <div id="<?php echo $key_name; ?>_pro5_disp" class="pro-disp init-nodisp">
          <?php ta_bodywrap_bar_setting( $key_name, 'gmenu' ); ?>
        </div><!-- end of #<?php echo $key_name; ?>_pro5_disp -->
        <span class="fixed-space"></span>
        <hr class="fixed-border">
        <!-- 任意位置背景バー -->
        <h4 id="<?php echo $key_name; ?>_pro6_title" class="pro-title"><a href="JavaScript:void(0);">任意位置背景バー</a></h4>
        <div id="<?php echo $key_name; ?>_pro6_disp" class="pro-disp init-nodisp">
          <p style="color:#ff0000;margin-bottom:0.7em;">※ 任意位置背景バーはフッター領域では表示されません。</p>
          <?php ta_bodywrap_bar_setting( $key_name, 'free' ); ?>
        </div><!-- end of #<?php echo $key_name; ?>_pro6_disp -->
        <span class="fixed-space"></span>
      </div><!-- end of #<?php echo $key_name; ?>_bar_disp -->
    </td>
  </tr>
<?php
}

function ta_common_frame_setting( $key_name, $description, $contents_area_onoff, $colorselect = 'invalid' ) {
  if ( 'ta_header_frame' == $key_name ) {
    $manual_page = 'header/frame#background';
  } else if ( 'ta_footer_frame' == $key_name ) {
    $manual_page = 'footer/frame#background';
  } else if ( 'ta_responsible_top_outframe' == $key_name || 'ta_responsible_outframe' == $key_name ) {
    $manual_page = 'responsible/frame';
  } else if ( 'ta_responsible_header_frame' == $key_name ) {
    $manual_page = 'reshead/basic#background';
  } else if ( 'ta_responsible_footer_frame' == $key_name ) {
    $manual_page = 'resfoot/basic#background';
  } else {
    $manual_page = '';
  } ?>
  <th id="<?php echo $key_name; ?>_title" class="big-title"><a href="JavaScript:void(0);"><?php echo $description; ?></a><?php ta_man2_gd( $manual_page ); ?></th>
  <td>
    <div id="<?php echo $key_name; ?>_disp" class="init-nodisp">
      <!-- 背景色(グラデーション) -->
      <h4>背景色</h4>
      <?php ta_color_picker_grad_process( $key_name . '_color', $colorselect ); ?>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <!-- 背景画像 -->
      <h4 id="<?php echo $key_name; ?>_pro_title" class="pro-title"><a href="JavaScript:void(0);">背景画像</a></h4>
      <div id="<?php echo $key_name; ?>_pro_disp" class="pro-disp init-nodisp">
        <h4>背景画像</h4>
        <?php ta_img_upload_process( $key_name . '_pic' ); ?>
        <p>※ 縦横幅の最大値を500ピクセルに制限しています</p>
        <span class="fixed-space"></span>
        <hr class="fixed-border">
        <h4>背景画像の場所と繰り返しルール</h4>
        <?php ta_image_position_rule( $key_name . '_pic_rule' ); ?>
        <span class="fixed-space"></span>
        <hr class="fixed-border">
        <h4>背景画像の上下部端からの距離</h4>
        <?php ta_simple_input( $key_name . '_pic_margin', 'ピクセル', 'short_box' ); ?>
        <p>※ y方向の繰り返しが無い場合のみ有効（グラデーションは背景画像扱いのため画像と同様にシフトします）</p>
        <span class="fixed-space"></span>
<?php
  if ( 'valid' == $contents_area_onoff ) { ?>
        <hr class="fixed-border">
        <h4>コンテンツエリアの枠幅（上下左右に同じ幅ののりしろが出来る）</h4>
        <?php ta_simple_input( $key_name . '_padding', 'ピクセル', 'short_box' );
  } ?>
      </div><!-- end of #<?php echo $key_name; ?>_pro_disp -->
      <span class="fixed-space"></span>
    </div><!-- end of #<?php echo $key_name; ?>_disp -->
  </td>
<?php
}

function ta_responsible_bar_setting( $key_name, $description, $contents_area_onoff, $colorselect = 'invalid' ) { ?>
  <th id="<?php echo $key_name; ?>_bar_title" class="big-title"><a href="JavaScript:void(0);"><?php echo $description; ?></a><?php ta_man2_gd( 'responsible/bodybar' ); ?></th>
  <td>
    <div id="<?php echo $key_name; ?>_bar_disp" class="init-nodisp">
      <!-- サイト上端背景バー -->
      <h4 id="<?php echo $key_name; ?>_pro1_title" class="pro-title"><a href="JavaScript:void(0);">サイト上端背景バー</a></h4>
      <div id="<?php echo $key_name; ?>_pro1_disp" class="pro-disp init-nodisp">
        <?php ta_bodywrap_bar_setting( $key_name, 'top' ); ?>
      </div><!-- end of #<?php echo $key_name; ?>_pro1_disp -->
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <!-- サイト下端背景バー -->
      <h4 id="<?php echo $key_name; ?>_pro2_title" class="pro-title"><a href="JavaScript:void(0);">サイト下端背景バー</a></h4>
      <div id="<?php echo $key_name; ?>_pro2_disp" class="pro-disp init-nodisp">
        <p style="color:#ff0000;margin-bottom:0.7em;">※ サイト下端背景バーはフッター領域内でお使いください。</p>
        <?php ta_bodywrap_bar_setting( $key_name, 'bottom' ); ?>
      </div><!-- end of #<?php echo $key_name; ?>_pro2_disp -->
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <!-- 任意位置背景バー -->
      <h4 id="<?php echo $key_name; ?>_pro3_title" class="pro-title"><a href="JavaScript:void(0);">任意位置背景バー</a></h4>
      <div id="<?php echo $key_name; ?>_pro3_disp" class="pro-disp init-nodisp">
        <p style="color:#ff0000;margin-bottom:0.7em;">※ 任意位置背景バーはフッター領域では表示されません。</p>
        <?php ta_bodywrap_bar_setting( $key_name, 'free' ); ?>
      </div><!-- end of #<?php echo $key_name; ?>_pro3_disp -->
      <span class="fixed-space"></span>
    </div><!-- end of #<?php echo $key_name; ?>_bar_disp -->
  </td>
<?php
}

function ta_highend_frame_setting( $key_name, $description ) {
  if ( 'ta_responsible_main_frame' == $key_name ) {
    $manual_page = 'resmain/basic#background';
  } else if ( 'ta_responsible_sidebar_frame' == $key_name ) {
    $manual_page = 'resside/basic#background';
  } else if ( 'ta_responsible_sidebarsub_frame' == $key_name ) {
    $manual_page = 'resside/basic#background';
  } else {
    $manual_page = '';
  } ?>
  <th id="<?php echo $key_name; ?>_title" class="big-title"><a href="JavaScript:void(0);"><?php echo $description; ?></a><?php ta_man2_gd( $manual_page ); ?></th>
  <td>
    <div id="<?php echo $key_name; ?>_disp" class="init-nodisp">
      <!-- 背景色(グラデーション) -->
      <h4>背景色</h4>
      <?php ta_color_picker_grad_process( $key_name . '_color', 'valid' ); ?>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
<?php
  if ( TA_HIEND_PI ) {
    ta_thm001highend_responsible_frame_setting( $key_name );
  } else { ?>
      <h4 style="color:#bbbbbb;" class="no-ta-thm001highend">背景画像</h4>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <h4 style="color:#bbbbbb;" class="no-ta-thm001highend">背景画像の場所と繰り返しルール</h4>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <h4 style="color:#bbbbbb;" class="no-ta-thm001highend">背景画像の上下部端からの距離</h4>
      <span class="fixed-space"></span>
<?php
  } ?>
    </div><!-- end of #<?php echo $key_name; ?>_disp -->
  </td>
<?php
}

function ta_common_frame_setting_no_accordion( $key_name, $description, $contents_area_onoff, $colorselect = 'invalid' ) { ?>
  <h3><?php echo $description; ?></h3>
    <h4>背景色</h4>
    <?php ta_color_picker_process( $key_name . '_color', $colorselect ); ?>
    <!-- 詳細設定 -->
    <h4 id="<?php echo $key_name; ?>_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
    <div id="<?php echo $key_name; ?>_pro_disp" class="pro-disp init-nodisp">
      <h4>背景画像（縦横幅の最大値を500ピクセルに制限しています）</h4>
      <?php ta_img_upload_process( $key_name . '_pic' ); ?>
      <h4>背景画像の場所と繰り返しルール</h4>
      <?php ta_image_position_rule( $key_name . '_pic_rule' ); ?>
      <h4>背景画像の上下部端からの距離（y方向の繰り返しが無い場合のみ有効）</h4>
      <?php ta_simple_input( $key_name . '_pic_margin', 'ピクセル', 'short_box' );
  if ( 'valid' == $contents_area_onoff ) { ?>
      <h4>コンテンツエリアの枠幅（上下左右に同じ幅ののりしろが出来る）</h4>
      <?php ta_simple_input( $key_name . '_padding', 'ピクセル', 'short_box' );
  } ?>
  </div><!-- end of #<?php echo $key_name; ?>_disp -->
<?php
}

function ta_main_frame_setting_no_accordion() { ?>
  <th>メイン背景色・画像<?php ta_man2_gd( 'main/background' ); ?></ht>
  <td>
    <!-- 背景色(グラデーション) -->
    <h4>背景色</h4>
    <?php ta_color_picker_grad_process( 'ta_main_frame_color', 'valid' ); ?>
    <span class="fixed-space"></span>
    <hr class="fixed-border">
<?php
  if ( TA_HIEND_PI ) {
    ta_thm001highend_main_frame_setting();
  } else { ?>
    <h4 style="color:#bbbbbb;" class="no-ta-thm001highend">背景画像</h4>
    <span class="fixed-space"></span>
    <hr class="fixed-border">
    <h4 style="color:#bbbbbb;" class="no-ta-thm001highend">背景画像の場所と繰り返しルール</h4>
    <span class="fixed-space"></span>
    <hr class="fixed-border">
    <h4 style="color:#bbbbbb;" class="no-ta-thm001highend">背景画像の上下部端からの距離</h4>
    <span class="fixed-space"></span>
    <hr class="fixed-border">
    <h4>コンテンツエリアの枠幅</h4>
    <?php ta_simple_input( 'ta_main_frame_padding', 'ピクセル', 'short_box' ); ?>
    <p>※ 上下左右に同じ幅ののりしろが出来る</p>
    <span class="fixed-space"></span>
<?php
  } ?>
  </td>
<?php
}

function ta_sidebar_frame_setting_no_accordion( $key_name, $description, $contents_area_onoff, $colorselect = 'invalid' ) {
  if ( 'ta_sidebar_frame' == $key_name ) {
    $manual_page = 'sidebar/background';
  } else if ( 'ta_sidebarsub_frame' == $key_name ) {
    $manual_page = 'sidebar/background';
  } else {
    $manual_page = '';
  } ?>
  <th><?php echo $description; ta_man2_gd( $manual_page ); ?></th>
  <td>
    <!-- 背景色(グラデーション) -->
    <h4>背景色</h4>
    <?php ta_color_picker_grad_process( $key_name . '_color', $colorselect ); ?>
    <span class="fixed-space"></span>
    <hr class="fixed-border">
<?php
  if ( TA_HIEND_PI ) { ?>
    <h4>メインコンテンツに高さを揃える</h4>
    <?php ta_thm001highend_arrange_height_onoff_setting( $key_name ); ?>
    <p>※ PCデザインのみ有効</p>
    <span class="fixed-space"></span>
    <hr class="fixed-border">
<?php
  } else { ?>
    <h4 style="color:#bbbbbb;" class="no-ta-thm001highend">メインコンテンツに高さを揃える</h4>
    <span class="fixed-space"></span>
    <hr class="fixed-border">
<?php
  }
  if ( TA_HIEND_PI ) {
    ta_thm001highend_side_frame_setting(  $key_name, $contents_area_onoff  );
  } else { ?>
    <h4 style="color:#bbbbbb;" class="no-ta-thm001highend">背景画像</h4>
    <span class="fixed-space"></span>
    <hr class="fixed-border">
    <h4 style="color:#bbbbbb;" class="no-ta-thm001highend">背景画像の場所と繰り返しルール</h4>
    <span class="fixed-space"></span>
    <hr class="fixed-border">
    <h4 style="color:#bbbbbb;" class="no-ta-thm001highend">背景画像の上下部端からの距離</h4>
    <span class="fixed-space"></span>
    <hr class="fixed-border">
    <h4>コンテンツエリアの枠幅</h4>
    <?php ta_simple_input( $key_name . '_padding', 'ピクセル', 'short_box' ); ?>
    <p>※ 上下左右に同じ幅ののりしろが出来る</p>
    <span class="fixed-space"></span>
<?php
  } ?>
  </td>
<?php
}


/********* 背景バーに関する共通関数 *********/
function ta_bodywrap_bar_setting( $key_name, $pos ) {
  if ( 'top' == $pos ) {
    $name = 'サイト上端';
  } else if ( 'gmenu' == $pos ) {
    $name = 'グローバルメニュー';
  } else if ( 'free' == $pos ) {
    $name = '任意位置';
  } else if ( 'bottom' == $pos ) {
    $name = 'サイト下端';
  }
  if ( 'ta_common_outframe' == $key_name ) {
    $nonhome = 'valid';
  } else {
    $nonhome = 'invalid';
  } ?>
  <table class="ta-2contents-table">
    <tr>
      <td>
        <h4>背景バーの表示</h4>
        <?php ta_alternative_input_checkbox( $key_name . '_bar_' . $pos . '_onoff', '背景バーを表示する' ); ?>
      </td>
      <td>
        <h4>背景バーの高さ</h4>
        <?php ta_simple_input( $key_name . '_bar_' . $pos . '_width', 'ピクセル', 'short_box' ); ?>
      </td>
    </tr>
  </table>
<?php
  if ( 'gmenu' == $pos ) { ?>
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <div class="ta-setting-inline-gp">
    <div class="inline-gp-30">
      <h4>背景バーのサイト上端からの距離</h4>
      <?php ta_simple_input( $key_name . '_bar_gmenu_distance', 'ピクセル', 'short_box' ); ?>
    </div>
<?php
    $gmenu_position = ta_read_op( 'ta_header_glabalmenu_position' );
    if ( 'top' == $gmenu_position || ( 'valid' == $nonhome && 'top_only' == ta_read_op( 'ta_header_headimg_insertpage' ) ) ) { ?>
    <span class="fixed-space"></span>
    <div class="inline-gp-10">
      <p>
        1. ヘッダーバナーエリア高さ：<span id="bg-bar-cal-height1"><?php echo ta_read_op( 'ta_header_height' ); ?></span>px<br>
        2. グローバルメニューの高さ：<span id="bg-bar-cal-height2"><?php echo ta_read_op( 'ta_header_glabalmenu_wholeheight' ); ?></span>px
      </p>
    </div>
    <div class="inline-gp-0">
      <p>
        <a href="JavaScript:void(0);" onClick="ta_cal_1('#<?php echo $key_name; ?>_bar_gmenu_distance');" >1をサイト上端からの距離に入力</a><br>
        <a href="JavaScript:void(0);" onClick="ta_cal_1p2('#<?php echo $key_name; ?>_bar_gmenu_distance');" >1+2をサイト上端からの距離に入力</a>
      </p>
    </div>
  </div>
<?php
    } else if ( 'bottom' == $gmenu_position ) { ?>
    <span class="fixed-space"></span>
    <div class="inline-gp-10">
      <p>
        1. ヘッダーバナーエリア高さ：<span id="bg-bar-cal-height1"><?php echo ta_read_op( 'ta_header_height' ); ?></span>px<br>
        2. WP標準ヘッダー画像高さ：<span id="bg-bar-cal-height2"><?php echo ta_read_op( 'ta_header_headimg_height' ); ?></span>px<br>
        3. グローバルメニューの高さ：<span id="bg-bar-cal-height3"><?php echo ta_read_op( 'ta_header_glabalmenu_wholeheight' ); ?></span>px
      </p>
    </div>
    <div class="inline-gp-0">
      <p>
        <a href="JavaScript:void(0);" onClick="ta_cal_1('#<?php echo $key_name; ?>_bar_gmenu_distance');" >1をサイト上端からの距離に入力</a><br>
        <a href="JavaScript:void(0);" onClick="ta_cal_1p2('#<?php echo $key_name; ?>_bar_gmenu_distance');" >1+2をサイト上端からの距離に入力</a><br>
        <a href="JavaScript:void(0);" onClick="ta_cal_1p2p3('#<?php echo $key_name; ?>_bar_gmenu_distance');" >1+2+3をサイト上端からの距離に入力</a>
      </p>
    </div>
  </div>
<?php
    } else { ?>
    <span class="fixed-space"></span>
    <div class="inline-gp-0">
      <p>※ グローバルメニューは非表示です</p>
    </div>
  </div>
<?php
    }
  } else if ( 'free' == $pos ) { ?>
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <h4>背景バーのサイト上端からの距離</h4>
  <?php ta_simple_input( $key_name . '_bar_free_distance', 'ピクセル', 'short_box' ); ?>
<?php
  } ?>
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <!-- 背景バーの色(グラデーション) -->
  <h4>背景バーの色</h4>
  <?php ta_color_picker_no_tomei_grad_process( $key_name . '_bar_' . $pos . '_color', 'valid' );
}

/********* 画像のアップロードに関する共通関数 *********/
function ta_img_upload_process( $key_name, $meta_type = "option", $post_id = 0 ) {
  //テーマ内蔵画像配列
  $builtin = array( 'ta_common_top_outframe_pic', 'ta_common_outframe_pic', 'ta_top_topcatch_pic1', 'ta_top_topcatch_pic2', 
                    'ta_top_topcatch_pic3', 'ta_header_logo_pic', 'ta_footer_frame_pic', 'ta_responsible_footer_frame_pic',
                    'ta_common_back2top_img', 'ta_common_favicon_img', 'ta_common_appletouch_img' );
  if ( "option" == $meta_type ) {
    $init_value = ta_read_op( $key_name );
  } else if ( "postmeta" == $meta_type ) {
    $init_value = ta_read_post( $post_id, $key_name );
  }
  if ( in_array( $key_name, $builtin ) && 'built_in' == $init_value ) {
    switch ( $key_name ) {
      case 'ta_common_top_outframe_pic':
        $img_value = get_template_directory_uri() . "/images/ta-bg-images/bodyhome_bg.png";
        break;
      case 'ta_common_outframe_pic':
        $img_value = get_template_directory_uri() . "/images/ta-bg-images/body_bg.png";
        break;
      case 'ta_top_topcatch_pic1':
        $img_value = get_template_directory_uri() . "/images/ta-top-catch/valentine-candy.jpg";
        break;
      case 'ta_top_topcatch_pic2':
        $img_value = get_template_directory_uri() . "/images/ta-top-catch/jelly-babies.jpg";
        break;
      case 'ta_top_topcatch_pic3':
        $img_value = get_template_directory_uri() . "/images/ta-top-catch/bananas.jpg";
        break;
      case 'ta_header_logo_pic':
        $img_value = get_template_directory_uri() . "/images/ta-header-images/logo.png";
        break;
      case 'ta_footer_frame_pic':
        $img_value = get_template_directory_uri() . "/images/ta-bg-images/footer_bg.png";
        break;
      case 'ta_responsible_footer_frame_pic':
        $img_value = get_template_directory_uri() . "/images/ta-res-bg-images/res_footer_bg.png";
        break;
      case 'ta_common_back2top_img':
        $img_value = get_template_directory_uri() . "/images/ta-back2top-images/ta-back2top.png";
        break;
      case 'ta_common_favicon_img':
        $img_value = get_template_directory_uri() . "/images/ta-favicon-images/favicon.ico";
        break;
      case 'ta_common_appletouch_img':
        $img_value = get_template_directory_uri() . "/images/ta-favicon-images/apple-touch-icon.png";
        break;
      default:
        $img_value = $init_value;
    }
  } else if ( 'no_image' == $init_value ) {
    $img_value = get_template_directory_uri() . '/images/ta_no_img.png';
  } else {
    $img_value = $init_value;
  } ?>
  <p id="<?php echo $key_name; ?>_info"><?php if ( 'no_image' != $init_value && 'built_in' != $init_value ) { ?>現在の登録画像：<?php echo $init_value; } ?></p>
  <p><img id="<?php echo $key_name; ?>_disp" alt="<?php echo $key_name; ?>" src="<?php echo $img_value; ?>" /></p>
  <p><input class="long_box" type="text" id="<?php echo $key_name; ?>" name="<?php echo $key_name; ?>" value="<?php echo $init_value; ?>" />　
  <a class="media-upload" href="JavaScript:void(0);" rel="<?php echo $key_name; ?>" >画像を変更</a>　<a href="JavaScript:void(0);" onClick="ta_no_img('#<?php echo $key_name; ?>');" >画像無し</a>
<?php
  if ( in_array( $key_name, $builtin ) ) { ?>
  　<a href="JavaScript:void(0);" onClick="ta_built_in('#<?php echo $key_name; ?>');" >内蔵画像</a>
<?php
  } ?>
  </p>
  <p>※ 画像アップローダー画面の『リンク URL』が空欄の場合は“ファイルのURL”ボタンをクリックしてください。</p>
<?php
}


/********* 色を選ぶ（カラーピッカー）に関する共通関数 *********/
//コア関数
function ta_color_picker_process_core( $key_name, $select, $imagecolor, $anchorcolor, $tomei, $grad ) {
  if ( 'valid' == $grad ) {
    $grad_onoff = ta_read_op( $key_name . '_grad_onoff' );
    $direct = ta_read_op( $key_name . '_grd_direct' );
    $start_color = ta_select_color_w_image_color( $key_name . '_grd_start_color' );
    $mid_onoff = ta_read_op( $key_name . '_grd_mid_color_onoff' );
    $mid_pos = ta_read_op( $key_name . '_grd_mid_color_pos' );
    if ( $mid_pos < 0 ) { $mid_pos = 0; } else if ( $mid_pos > 100 ) { $mid_pos = 100; }
    $mid_color = ta_select_color_w_image_color( $key_name . '_grd_mid_color' );
    if ( 'valid' == $mid_onoff ) { $mid_info = $mid_color . ' ' . $mid_pos . '%, '; } else { $mid_info = ''; }
    $stop_color = ta_select_color_w_image_color( $key_name . '_grd_stop_color' );
    switch ( $direct ) {
      case 'bottom':
        $new_direct = 'top';
        $direct_num = 0;
        $new_start_color = $start_color;
        $new_stop_color = $stop_color;
        break;
      case 'top':
        $new_direct = 'bottom';
        $direct_num = 0;
        $new_start_color = $stop_color;
        $new_stop_color = $start_color;
        break;
      case 'right':
        $new_direct = 'left';
        $direct_num = 1;
        $new_start_color = $start_color;
        $new_stop_color = $stop_color;
        break;
      case 'left':
        $new_direct = 'right';
        $direct_num = 1;
        $new_start_color = $stop_color;
        $new_stop_color = $start_color;
        break;
      default:
        $new_direct = 'top';
        $direct_num = 0;
        $new_start_color = $start_color;
        $new_stop_color = $stop_color;
    }
  }
  if ( 'valid' == $select ) {
    $init_select = ta_read_op( $key_name . '_select' );
    $init_value = ta_read_op( $key_name );
    $current_color = ta_select_color_w_image_color( $key_name );
    if ( 'transparent' == $current_color ) { $current_color_disp = '透明'; } else { $current_color_disp = $current_color; }
    if ( 'valid' == $imagecolor ) { ?>
  <div id="<?php echo $key_name; ?>_cover" class="color-picker-exp">
    <div class="ta-setting-inline-gp">
      <div class="inline-gp-0_5em">
<?php
      if ( TA_HIEND_PI && 'valid' == $grad && 'valid' == $grad_onoff ) { ?>
        <div id="<?php echo $key_name; ?>-colorinfo-container" class="colorinfo-container">
          <div class="colorcode-disp"><span class="grad-disp-img"><img src="<?php echo get_template_directory_uri(); ?>/images/grad_disp.png"/></span></div>
          <div class="color-picker-current-color-frame"></div>
        </div>
        <style type="text/css">
          #<?php echo $key_name; ?>-colorinfo-container .color-picker-current-color-frame {
            filter: progid:DXImageTransform.Microsoft.Gradient(GradientType=<?php echo $direct_num; ?>, StartColorStr='<?php echo $new_start_color; ?>', EndColorStr='<?php echo $new_stop_color; ?>');
            background: -ms-linear-gradient(<?php echo $new_direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%);
            background: -o-linear-gradient(<?php echo $new_direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%);
            background: -moz-linear-gradient(<?php echo $new_direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%);
            background: -webkit-linear-gradient(<?php echo $new_direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%);
            background: linear-gradient(to <?php echo $direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%);
          }
        </style>
<?php
      } else { ?>
        <div id="<?php echo $key_name; ?>-colorinfo-container" class="colorinfo-container">
          <div class="colorcode-disp"><?php echo $current_color_disp; ?></div>
          <div class="color-picker-current-color-frame"></div>
        </div>
        <style type="text/css">
          #<?php echo $key_name; ?>-colorinfo-container .color-picker-current-color-frame {
            background-color:<?php echo $current_color; ?>
          }
        </style>
<?php
      } ?>
      </div>
      <div class="inline-gp-0">
        <div class="color-detail-container">
          <div id="<?php echo $key_name; ?>_picker_title" class="nocookie-class-big-title simple-color-setting"><a href="JavaScript:void(0);">単色変更</a></div>
        </div>
      </div>
    </div>
    <div class="<?php echo $key_name; ?>_picker_disp color-picker-exp-disp init-nodisp">
      <p class="color-picker-color-cat">サイトイメージカラー</p>
      <table>
        <tr>
          <td style="border:none;">
            <input id="<?php echo $key_name; ?>-c-s-bg-input" class="c-s-bg-input" type="radio" name="<?php echo $key_name; ?>_select" value="common_site_bg" <?php if ( "common_site_bg" == $init_select ) echo 'checked="checked"'; ?>>
          </td>
          <td style="border:none;">
            <div class="color-picker-color-frame c-s-bg-color" style="background-color:<?php echo ta_read_op( 'ta_common_site_bg_color' ); ?>"></div>
          </td>
          <td style="border:none;">
            <p>背景色</p>
          </td>
        </tr>
      </table>
      <table>
        <tr>
          <td style="border:none;">
            <input id="<?php echo $key_name; ?>-c-s-hl-input" class="c-s-hl-input" type="radio" name="<?php echo $key_name; ?>_select" value="common_site_hl" <?php if ( "common_site_hl" == $init_select ) echo 'checked="checked"'; ?>>
          </td>
          <td style="border:none;">
            <div class="color-picker-color-frame c-s-hl-color" style="background-color:<?php echo ta_read_op( 'ta_common_site_hl_color' ); ?>"></div>
          </td>
          <td style="border:none;">
            <p>ハイライト色</p>
          </td>
        </tr>
      </table>
      <table>
        <tr>
          <td style="border:none;">
            <input id="<?php echo $key_name; ?>-c-s-tonbg-input" class="c-s-tonbg-input" type="radio" name="<?php echo $key_name; ?>_select" value="common_site_text_on_bg" <?php if ( "common_site_text_on_bg" == $init_select ) echo 'checked="checked"' ?>>
          </td>
          <td style="border:none;">
            <div class="color-picker-color-frame c-s-tonbg-color" style="background-color:<?php echo ta_read_op( 'ta_common_site_text_on_bg_color' ); ?>"></div>
          </td>
          <td style="border:none;">
            <p>標準テキスト色</p>
          </td>
        </tr>
      </table>
      <table>
        <tr>
          <td style="border:none;">
            <input id="<?php echo $key_name; ?>-c-s-tonhl-input" class="c-s-tonhl-input" type="radio" name="<?php echo $key_name; ?>_select" value="common_site_text_on_hl" <?php if ( "common_site_text_on_hl" == $init_select ) echo 'checked="checked"'; ?>>
          </td>
          <td style="border:none;">
            <div class="color-picker-color-frame c-s-tonhl-color" style="background-color:<?php echo ta_read_op( 'ta_common_site_text_on_hl_color' ); ?>"></div>
          </td>
          <td style="border:none;">
            <p>ハイライト背景用<br><span style="line-height:2.0em;">テキスト色</span></p>
          </td>
        </tr>
      </table>
<?php
    }
    if ( 'valid' == $anchorcolor ) { ?>
      <p class="color-picker-color-cat">リンク付共通フォント</p>
      <table>
        <tr>
          <td style="border:none;">
            <input id="<?php echo $key_name; ?>-c-f-a-input" class="c-f-a-input" type="radio" name="<?php echo $key_name; ?>_select" value="common_font_anchor_color" <?php if ( "common_font_anchor_color" == $init_select ) echo 'checked="checked"'; ?>>
          </td>
          <td style="border:none;">
            <div class="color-picker-color-frame c-f-a-color" style="background-color:<?php echo ta_read_op( 'ta_common_font_anchor_color' ); ?>"></div>
          </td>
          <td style="border:none;">
            <p>テキスト色</p>
          </td>
        </tr>
      </table>
      <table>
        <tr>
          <td style="border:none;">
            <input id="<?php echo $key_name; ?>-c-f-ahover-input" class="c-f-ahover-input" type="radio" name="<?php echo $key_name; ?>_select" value="common_font_anchor_colorhover" <?php if ( "common_font_anchor_colorhover" == $init_select ) echo 'checked="checked"'; ?>>
          </td>
          <td style="border:none;">
            <div class="color-picker-color-frame c-f-ahover-color" style="background-color:<?php echo ta_read_op( 'ta_common_font_anchor_colorhover' ); ?>"></div>
          </td>
          <td style="border:none;">
            <p>テキストHOVER色</p>
          </td>
        </tr>
      </table>
<?php
    } ?>
      <p class="color-picker-color-cat">任意選択</p>
      <div class="ta-setting-inline-gp" style="margin-left:4px;">
        <div class="inline-gp-0_5em">
          <input id="<?php echo $key_name; ?>-selectable-input" class="selectable-input" type="radio" name="<?php echo $key_name; ?>_select" value="selectable" <?php if ( "selectable" == $init_select ) echo 'checked="checked"'; ?> style="margin-top:0.2em;margin-bottom:0.5em;">
        </div>
        <div id="<?php echo $key_name; ?>_cp_cover" class="inline-gp-0">
          <input id="<?php echo $key_name; ?>" type="text" name="<?php echo $key_name; ?>" class="selectable_color_picker" value="<?php echo $init_value; ?>" />
        </div>
<?php
    if ( 'valid' == $tomei ) { ?>
        <div class="inline-gp-0" style="margin-top:0.6em;">
          <a href="JavaScript:void(0);" onClick="tomei('#<?php echo $key_name; ?>');" >透明</a>
        </div>
<?php
    } ?>
      </div>
    </div>
<?php
    if ( TA_HIEND_PI && 'valid' == $grad ) { ?>
    <div class="grad-setting-container">
      <div class="grd_onoff_cover">
        <?php ta_alternative_input_checkbox( $key_name . '_grad_onoff', 'グラデーション' ); ?>
      </div>
      <div id="<?php echo $key_name; ?>_grad_title" class="grad-pup"><a href="JavaScript:void(0);">詳細設定</a></div>
    </div>
    <div id="<?php echo $key_name; ?>_grad_disp" class="init-nodisp grad-pup-body">
      <?php ta_thm001highend_gradient_color_setting( $key_name ); ?>
    </div><!-- end of #<?php echo $key_name; ?>_grad_disp -->
<?php
    } else if ( !TA_HIEND_PI && 'valid' == $grad ) { ?>
    <h4 style="color:#bbbbbb;" class="no-ta-thm001highend-grad">グラデーション</h4>
    <p class="thm001highend-grad-disp">HighEndの機能</p>
<?php
    } ?>
  </div>
<?php
  } else {
    $init_value = ta_read_op( $key_name ); ?>
  <div id="<?php echo $key_name; ?>_cover">
    <div class="ta-setting-inline-gp">
      <div id="<?php echo $key_name; ?>_cp_cover" class="inline-gp-0">
        <input id="<?php echo $key_name; ?>" type="text" name="<?php echo $key_name; ?>" class="color_picker" value="<?php echo $init_value; ?>" />
      </div>
<?php
    if ( 'valid' == $tomei ) { ?>
      <div class="inline-gp-0" style="margin-top:0.6em;">
        <a href="JavaScript:void(0);" onClick="tomei('#<?php echo $key_name; ?>');" >透明</a>
      </div>
<?php
    } ?>
    </div>
  </div>
<?php
  }
}

//透明を含む処理
function ta_color_picker_process( $key_name, $select = 'invalid', $imagecolor = 'valid', $anchorcolor = 'valid' ) {
  ta_color_picker_process_core( $key_name, $select, $imagecolor, $anchorcolor, 'valid', 'invalid' );
}

//透明を含まない処理
function ta_color_picker_no_tomei_process( $key_name, $select = 'invalid', $imagecolor = 'valid', $anchorcolor = 'valid' ) {
  ta_color_picker_process_core( $key_name, $select, $imagecolor, $anchorcolor, 'invalid', 'invalid' );
}

//透明を含む処理(グラデーション)
function ta_color_picker_grad_process( $key_name, $select = 'invalid', $imagecolor = 'valid', $anchorcolor = 'valid' ) {
  ta_color_picker_process_core( $key_name, $select, $imagecolor, $anchorcolor, 'valid', 'valid' );
}

//透明を含まない処理(グラデーション)
function ta_color_picker_no_tomei_grad_process( $key_name, $select = 'invalid', $imagecolor = 'valid', $anchorcolor = 'valid' ) {
  ta_color_picker_process_core( $key_name, $select, $imagecolor, $anchorcolor, 'invalid', 'valid' );
}

//コア関数（post_idタイプ）
function ta_color_picker_process_posttype_core( $key_name, $post_id, $tomei ) {
  $init_select = ta_read_post( $post_id, $key_name . '_select' );
  $init_value = ta_read_post( $post_id, $key_name );
  $current_color = ta_select_color_w_image_color_posttype( $post_id, $key_name );
  if ( 'transparent' == $current_color ) { $current_color_disp = '透明'; } else { $current_color_disp = $current_color; } ?>
  <div id="<?php echo $key_name; ?>_cover" class="color-picker-exp">
    <div class="ta-setting-inline-gp">
      <div class="inline-gp-0_5em">
        <div id="<?php echo $key_name; ?>-colorinfo-container" class="colorinfo-container">
          <div class="colorcode-disp"><?php echo $current_color_disp; ?></div>
          <div class="color-picker-current-color-frame"></div>
        </div>
        <style type="text/css">
          #<?php echo $key_name; ?>-colorinfo-container .color-picker-current-color-frame {
            background-color:<?php echo $current_color; ?>
          }
        </style>
      </div>
      <div class="inline-gp-0">
        <div class="color-detail-container">
          <div id="<?php echo $key_name; ?>_picker_title" class="nocookie-class-big-title simple-color-setting"><a href="JavaScript:void(0);">単色変更</a></div>
        </div>
      </div>
    </div>
    <div class="<?php echo $key_name; ?>_picker_disp color-picker-exp-disp init-nodisp">
      <p class="color-picker-color-cat">サイトイメージカラー</p>
      <table>
        <tr>
          <td style="border:none;">
            <input id="<?php echo $key_name; ?>-c-s-bg-input" class="c-s-bg-input" type="radio" name="<?php echo $key_name; ?>_select" value="common_site_bg" <?php if ( "common_site_bg" == $init_select ) echo 'checked="checked"'; ?>>
          </td>
          <td style="border:none;">
            <div class="color-picker-color-frame c-s-bg-color" style="background-color:<?php echo ta_read_op( 'ta_common_site_bg_color' ); ?>"></div>
          </td>
          <td style="border:none;">
            <p>背景色</p>
          </td>
        </tr>
      </table>
      <table>
        <tr>
          <td style="border:none;">
            <input id="<?php echo $key_name; ?>-c-s-hl-input" class="c-s-hl-input" type="radio" name="<?php echo $key_name; ?>_select" value="common_site_hl" <?php if ( "common_site_hl" == $init_select ) echo 'checked="checked"'; ?>>
          </td>
          <td style="border:none;">
            <div class="color-picker-color-frame c-s-hl-color" style="background-color:<?php echo ta_read_op( 'ta_common_site_hl_color' ); ?>"></div>
          </td>
          <td style="border:none;">
            <p>ハイライト色</p>
          </td>
        </tr>
      </table>
      <table>
        <tr>
          <td style="border:none;">
            <input id="<?php echo $key_name; ?>-c-s-tonbg-input" class="c-s-tonbg-input" type="radio" name="<?php echo $key_name; ?>_select" value="common_site_text_on_bg" <?php if ( "common_site_text_on_bg" == $init_select ) echo 'checked="checked"' ?>>
          </td>
          <td style="border:none;">
            <div class="color-picker-color-frame c-s-tonbg-color" style="background-color:<?php echo ta_read_op( 'ta_common_site_text_on_bg_color' ); ?>"></div>
          </td>
          <td style="border:none;">
            <p>標準テキスト色</p>
          </td>
        </tr>
      </table>
      <table>
        <tr>
          <td style="border:none;">
            <input id="<?php echo $key_name; ?>-c-s-tonhl-input" class="c-s-tonhl-input" type="radio" name="<?php echo $key_name; ?>_select" value="common_site_text_on_hl" <?php if ( "common_site_text_on_hl" == $init_select ) echo 'checked="checked"'; ?>>
          </td>
          <td style="border:none;">
            <div class="color-picker-color-frame c-s-tonhl-color" style="background-color:<?php echo ta_read_op( 'ta_common_site_text_on_hl_color' ); ?>"></div>
          </td>
          <td style="border:none;">
            <p>ハイライト背景用<br><span style="line-height:2.0em;">テキスト色</span></p>
          </td>
        </tr>
      </table>
      <p class="color-picker-color-cat">リンク付共通フォント</p>
      <table>
        <tr>
          <td style="border:none;">
            <input id="<?php echo $key_name; ?>-c-f-a-input" class="c-f-a-input" type="radio" name="<?php echo $key_name; ?>_select" value="common_font_anchor_color" <?php if ( "common_font_anchor_color" == $init_select ) echo 'checked="checked"'; ?>>
          </td>
          <td style="border:none;">
            <div class="color-picker-color-frame c-f-a-color" style="background-color:<?php echo ta_read_op( 'ta_common_font_anchor_color' ); ?>"></div>
          </td>
          <td style="border:none;">
            <p>テキスト色</p>
          </td>
        </tr>
      </table>
      <table>
        <tr>
          <td style="border:none;">
            <input id="<?php echo $key_name; ?>-c-f-ahover-input" class="c-f-ahover-input" type="radio" name="<?php echo $key_name; ?>_select" value="common_font_anchor_colorhover" <?php if ( "common_font_anchor_colorhover" == $init_select ) echo 'checked="checked"'; ?>>
          </td>
          <td style="border:none;">
            <div class="color-picker-color-frame c-f-ahover-color" style="background-color:<?php echo ta_read_op( 'ta_common_font_anchor_colorhover' ); ?>"></div>
          </td>
          <td style="border:none;">
            <p>テキストHOVER色</p>
          </td>
        </tr>
      </table>
      <p class="color-picker-color-cat">任意選択</p>
      <div class="ta-setting-inline-gp" style="margin-left:4px;">
        <div class="inline-gp-0_5em">
          <input class="selectable-input" type="radio" name="<?php echo $key_name; ?>_select" value="selectable" <?php if ( "selectable" == $init_select ) echo 'checked="checked"'; ?> style="margin-top:0.2em;margin-bottom:0.5em;">
        </div>
        <div id="<?php echo $key_name; ?>_cp_cover" class="inline-gp-0">
          <input id="<?php echo $key_name; ?>" type="text" name="<?php echo $key_name; ?>" class="selectable_color_picker" value="<?php echo $init_value; ?>" />
        </div>
<?php
  if ( 'valid' == $tomei ) { ?>
        <div class="inline-gp-0" style="margin-top:0.6em;">
          <a href="JavaScript:void(0);" onClick="tomei('#<?php echo $key_name; ?>');" >透明</a>
        </div>
<?php
  } ?>
      </div>
    </div>
  </div>
<?php
}

//透明を含む処理（post_idタイプ）
function ta_color_picker_process_posttype( $key_name, $post_id ) {
  ta_color_picker_process_posttype_core( $key_name, $post_id, 'valid' );
}

//透明を含まない処理（post_idタイプ）
function ta_color_picker_no_tomei_process_posttype( $key_name, $post_id ) {
  ta_color_picker_process_posttype_core( $key_name, $post_id, 'invalid' );
}


/********* テキスト一般設定共通関数 *********/
function ta_text_general_setting(
  $base_key_name,
  $base_exp_text,
  $size_add = '',
  $weight_add = '',
  $color_add = '',
  $anchor_color_add = '',
  $anchor_underonoff_add = '',
  $anchor_colorhover_add ='',
  $paddingtop_add ='',
  $paddingleft_add = '',
  $listmarker_add = 'none',
  $class = 'group-disp' ) { ?>
  <h4 class="group-title" id ="<?php echo $base_key_name; ?>_group_title" ><a href="JavaScript:void(0);"><?php echo $base_exp_text; ?>の詳細設定</a></h4>
  <div id="<?php echo $base_key_name; ?>_group_disp" class="<?php echo $class; ?> init-nodisp">
<?php
  if ( 'none' != $size_add ) { ?>
    <h4><?php echo $base_exp_text; ?>のテキストサイズ<?php echo $size_add; ?></h4>
    <?php ta_simple_input( $base_key_name . '_size', '％', 'short_box' );
  }
  if ( 'none' != $weight_add ) { ?>
    <h4><?php echo $base_exp_text; ?>のテキストの太さ<?php echo $weight_add; ?></h4>
    <?php ta_fontweight_selection( $base_key_name . '_weight' );
  }
  if ( 'none' != $color_add ) { ?>
    <h4><?php echo $base_exp_text; ?>テキストの色<?php echo $color_add; ?></h4>
    <?php ta_color_picker_no_tomei_process( $base_key_name . '_color', 'valid' );
  }
  if ( 'none' != $anchor_color_add ) { ?>
    <h4>リンク付<?php echo $base_exp_text; ?>テキストの色<?php echo $anchor_color_add; ?></h4>
    <?php ta_color_picker_no_tomei_process( $base_key_name . '_anchor_color' );
  }
  if ( 'none' != $anchor_underonoff_add ) { ?>
    <h4>リンク付<?php echo $base_exp_text; ?>テキストの下線表示<?php echo $anchor_underonoff_add; ?></h4>
    <?php ta_alternative_input_checkbox( $base_key_name . '_anchor_underonoff', 'リンク下線を付ける' );
  }
  if ( 'none' != $anchor_colorhover_add ) { ?>
    <h4>リンク付<?php echo $base_exp_text; ?>テキストのHOVER色<?php echo $anchor_colorhover_add; ?></h4>
    <?php ta_color_picker_no_tomei_process( $base_key_name . '_anchor_colorhover' );
  }
  if ( 'none' != $paddingtop_add ) { ?>
    <h4><?php echo $base_exp_text; ?>テキストの上側余白<?php echo $paddingtop_add; ?></h4>
    <?php ta_simple_input( $base_key_name . '_paddingtop', 'ピクセル', 'short_box' );
  }
  if ( 'none' != $paddingleft_add ) { ?>
    <h4><?php echo $base_exp_text; ?>テキストの左側余白<?php echo $paddingleft_add; ?></h4>
    <?php ta_simple_input( $base_key_name . '_paddingleft', 'ピクセル', 'short_box' );
  }
  if ( 'none' != $listmarker_add ) { ?>
    <h4><?php echo $base_exp_text; ?>テキストのリストマーカー（ブラウザーに依存します）<?php echo $listmarker_add; ?></h4>
    <?php $init_value = ta_read_op( $base_key_name . '_listmarker' ); ?>
    <p><input type="radio" name="<?php echo $base_key_name; ?>_listmarker" value="none" <?php if ( "none" == $init_value ) echo 'checked="checked"'; ?>> 無し</p>
    <p><input type="radio" name="<?php echo $base_key_name; ?>_listmarker" value="disc" <?php if ( "disc" == $init_value ) echo 'checked="checked"'; ?>> ●</p>
    <p><input type="radio" name="<?php echo $base_key_name; ?>_listmarker" value="circle" <?php if ( "circle" == $init_value ) echo 'checked="checked"'; ?>> ○</p>
    <p><input type="radio" name="<?php echo $base_key_name; ?>_listmarker" value="square" <?php if ( "square" == $init_value ) echo 'checked="checked"'; ?>> ■</p>
    <p><input type="radio" name="<?php echo $base_key_name; ?>_listmarker" value="decimal" <?php if ( "decimal" == $init_value ) echo 'checked="checked"'; ?>> 連番</p>
    <p><input type="radio" name="<?php echo $base_key_name; ?>_listmarker" value="upper-alpha" <?php if ( "upper-alpha" == $init_value ) echo 'checked="checked"'; ?>> 大文字アルファベット</p>
    <p><input type="radio" name="<?php echo $base_key_name; ?>_listmarker" value="lower-alpha" <?php if ( "lower-alpha" == $init_value ) echo 'checked="checked"'; ?>> 小文字アルファベット</p>
    <p><input type="radio" name="<?php echo $base_key_name; ?>_listmarker" value="upper-roman" <?php if ( "upper-roman" == $init_value ) echo 'checked="checked"'; ?>> 大文字ローマ数字</p>
    <p><input type="radio" name="<?php echo $base_key_name; ?>_listmarker" value="lower-roman" <?php if ( "lower-roman" == $init_value ) echo 'checked="checked"'; ?>> 小文字ローマ数字</p>
<?php
  } ?>
  </div><!-- end of #<?php echo $base_key_name; ?>_group_disp -->
<?php
}


/********* サイトマップ一般設定共通関数 *********/
function ta_sitemap_general_setting( $base_key_name, $base_exp_text, $class = 'group-disp' ) { ?>
  <h4 class="group-title" id ="<?php echo $base_key_name; ?>_group_title" ><a href="JavaScript:void(0);"><?php echo $base_exp_text; ?>の詳細設定</a></h4>
  <div id="<?php echo $base_key_name; ?>_group_disp" class="<?php echo $class; ?> init-nodisp">
    <table class="ta-2contents-table">
      <tr>
        <td>
          <h4><?php echo $base_exp_text; ?>のテキストサイズ</h4>
          <?php ta_simple_input( $base_key_name . '_size', '％', 'short_box' ); ?>
        </td>
        <td>
          <h4><?php echo $base_exp_text; ?>のテキストの太さ</h4>
          <?php ta_fontweight_selection( $base_key_name . '_weight' ); ?>
        </td>
      </tr>
    </table>
    <span class="fixed-space"></span>
    <hr class="fixed-border">
    <?php ta_linkedtext_setting( 
            $base_exp_text . 'テキスト',
            $base_key_name . '_anchor_color', 'invalid',
            $base_key_name . '_anchor_underonoff',
            $base_key_name . '_anchor_colorhover', 'invalid',
            $base_key_name . '_anchor_hoverunderonoff' ); ?>
    <span class="fixed-space"></span>
    <hr class="fixed-border">
    <table class="ta-fullcontents-table">
      <tr>
        <td style="width:20em;">
          <h4><?php echo $base_exp_text; ?>テキストの上側余白</h4>
          <?php ta_simple_input( $base_key_name . '_paddingtop', 'ピクセル', 'short_box' ); ?>
          <p>※ タイトル直下には適応されません</p>
        </td>
        <td>
          <h4><?php echo $base_exp_text; ?>テキストの左側余白</h4>
          <?php ta_simple_input( $base_key_name . '_paddingleft', 'ピクセル', 'short_box' ); ?>
        </td>
      </tr>
    </table>
    <span class="fixed-space"></span>
    <hr class="fixed-border">
    <table class="ta-2contents-table">
      <tr>
        <td>
          <h4><?php echo $base_exp_text; ?>リストマーカー</h4>
          <?php $init_value = ta_read_op( $base_key_name . '_listmarker' ); ?>
          <table class="ta-fullcontents-table">
            <tr>
              <td style="width:5em;">
                <p><input type="radio" name="<?php echo $base_key_name; ?>_listmarker" value="none" <?php if ( "none" == $init_value ) echo 'checked="checked"'; ?>> 無し</p>
              </td>
              <td></td>
            </tr>
            <tr>
              <td>
                <p><input type="radio" name="<?php echo $base_key_name; ?>_listmarker" value="disc" <?php if ( "disc" == $init_value ) echo 'checked="checked"'; ?>> ●</p>
              </td>
              <td>
                <p><input type="radio" name="<?php echo $base_key_name; ?>_listmarker" value="upper-alpha" <?php if ( "upper-alpha" == $init_value ) echo 'checked="checked"'; ?>> 大文字アルファベット</p>
              </td>
            </tr>
            <tr>
              <td>
                <p><input type="radio" name="<?php echo $base_key_name; ?>_listmarker" value="circle" <?php if ( "circle" == $init_value ) echo 'checked="checked"'; ?>> ○</p>
              </td>
              <td>
                <p><input type="radio" name="<?php echo $base_key_name; ?>_listmarker" value="lower-alpha" <?php if ( "lower-alpha" == $init_value ) echo 'checked="checked"'; ?>> 小文字アルファベット</p>
              </td>
            </tr>
            <tr>
              <td>
                <p><input type="radio" name="<?php echo $base_key_name; ?>_listmarker" value="square" <?php if ( "square" == $init_value ) echo 'checked="checked"'; ?>> ■</p>
              </td>
              <td>
                <p><input type="radio" name="<?php echo $base_key_name; ?>_listmarker" value="upper-roman" <?php if ( "upper-roman" == $init_value ) echo 'checked="checked"'; ?>> 大文字ローマ数字</p>
              </td>
            </tr>
            <tr>
              <td>
                <p><input type="radio" name="<?php echo $base_key_name; ?>_listmarker" value="decimal" <?php if ( "decimal" == $init_value ) echo 'checked="checked"'; ?>> 連番</p>
              </td>
              <td>
                <p><input type="radio" name="<?php echo $base_key_name; ?>_listmarker" value="lower-roman" <?php if ( "lower-roman" == $init_value ) echo 'checked="checked"'; ?>> 小文字ローマ数字</p>
              </td>
            </tr>
          </table>
          <p>※ 詳細はブラウザーに依存します</p>
        </td>
        <td>
          <h4><?php echo $base_exp_text; ?>リストマーカーの色</h4>
          <?php ta_color_picker_no_tomei_process( $base_key_name . '_color', 'valid' ); ?>
          <p>※ "カテゴリー毎の投稿数の色”<br>にも採用されます</p>
        </td>
      </tr>
    </table>
  </div><!-- end of #<?php echo $base_key_name; ?>_group_disp -->
<?php
}


/********* フッターメニュー一般設定共通関数 *********/
function ta_footermenu_general_setting( $base_key_name, $base_exp_text, $class = 'group-disp' ) { ?>
  <h4 class="group-title" id ="<?php echo $base_key_name; ?>_group_title" ><a href="JavaScript:void(0);"><?php echo $base_exp_text; ?>の詳細設定</a></h4>
  <div id="<?php echo $base_key_name; ?>_group_disp" class="<?php echo $class; ?> init-nodisp">
    <table class="ta-2contents-table">
      <tr>
        <td>
          <h4><?php echo $base_exp_text; ?>のテキストサイズ</h4>
          <?php ta_simple_input( $base_key_name . '_size', '％', 'short_box' ); ?>
        </td>
        <td>
          <h4><?php echo $base_exp_text; ?>のテキストの太さ</h4>
          <?php ta_fontweight_selection( $base_key_name . '_weight' ); ?>
        </td>
      </tr>
    </table>
    <span class="fixed-space"></span>
    <hr class="fixed-border">
    <?php ta_linkedtext_setting( 
            $base_exp_text . 'テキスト',
            $base_key_name . '_anchor_color', 'invalid',
            $base_key_name . '_anchor_underonoff',
            $base_key_name . '_anchor_colorhover', 'invalid',
            $base_key_name . '_anchor_hoverunderonoff' ); ?>
    <span class="fixed-space"></span>
    <hr class="fixed-border">
<?php
  if ( 'ta_footer_menu_parent' == $base_key_name ) { ?>
    <table class="ta-2contents-table">
      <tr>
        <td>
          <h4><?php echo $base_exp_text; ?>テキストの上側余白</h4>
          <?php ta_simple_input( $base_key_name . '_paddingtop', 'ピクセル', 'short_box' ); ?>
          <p>※ タイトル直下には適応されません</p>
        </td>
        <td>
          <h4><?php echo $base_exp_text; ?>テキストの左側余白</h4>
          <?php ta_simple_input( $base_key_name . '_paddingleft', 'ピクセル', 'short_box' ); ?>
          <p>※ 横型時は項目間の余白になります</p>
        </td>
      </tr>
    </table>
<?php
  } else { ?>
    <table class="ta-2contents-table">
      <tr>
        <td>
          <h4><?php echo $base_exp_text; ?>テキストの上側余白</h4>
          <?php ta_simple_input( $base_key_name . '_paddingtop', 'ピクセル', 'short_box' ); ?>
        </td>
        <td>
          <h4><?php echo $base_exp_text; ?>テキストの左側余白</h4>
          <?php ta_simple_input( $base_key_name . '_paddingleft', 'ピクセル', 'short_box' ); ?>
        </td>
      </tr>
    </table>
<?php
  } ?>
    <span class="fixed-space"></span>
    <hr class="fixed-border">
    <table class="ta-2contents-table">
      <tr>
        <td>
          <h4><?php echo $base_exp_text; ?>リストマーカー</h4>
          <?php $init_value = ta_read_op( $base_key_name . '_listmarker' ); ?>
          <table class="ta-fullcontents-table">
            <tr>
              <td style="width:5em;">
                <p><input type="radio" name="<?php echo $base_key_name; ?>_listmarker" value="none" <?php if ( "none" == $init_value ) echo 'checked="checked"'; ?>> 無し</p>
              </td>
              <td></td>
            <tr>
              <td>
                <p><input type="radio" name="<?php echo $base_key_name; ?>_listmarker" value="disc" <?php if ( "disc" == $init_value ) echo 'checked="checked"'; ?>> ●</p>
              </td>
              <td>
                <p><input type="radio" name="<?php echo $base_key_name; ?>_listmarker" value="upper-alpha" <?php if ( "upper-alpha" == $init_value ) echo 'checked="checked"'; ?>> 大文字アルファベット</p>
              </td>
            </tr>
            <tr>
              <td>
                <p><input type="radio" name="<?php echo $base_key_name; ?>_listmarker" value="circle" <?php if ( "circle" == $init_value ) echo 'checked="checked"'; ?>> ○</p>
              </td>
              <td>
                <p><input type="radio" name="<?php echo $base_key_name; ?>_listmarker" value="lower-alpha" <?php if ( "lower-alpha" == $init_value ) echo 'checked="checked"'; ?>> 小文字アルファベット</p>
              </td>
            </tr>
            <tr>
              <td>
                <p><input type="radio" name="<?php echo $base_key_name; ?>_listmarker" value="square" <?php if ( "square" == $init_value ) echo 'checked="checked"'; ?>> ■</p>
              </td>
              <td>
                <p><input type="radio" name="<?php echo $base_key_name; ?>_listmarker" value="upper-roman" <?php if ( "upper-roman" == $init_value ) echo 'checked="checked"'; ?>> 大文字ローマ数字</p>
              </td>
            </tr>
            <tr>
              <td>
                <p><input type="radio" name="<?php echo $base_key_name; ?>_listmarker" value="decimal" <?php if ( "decimal" == $init_value ) echo 'checked="checked"'; ?>> 連番</p>
              </td>
              <td>
                <p><input type="radio" name="<?php echo $base_key_name; ?>_listmarker" value="lower-roman" <?php if ( "lower-roman" == $init_value ) echo 'checked="checked"'; ?>> 小文字ローマ数字</p>
              </td>
            </tr>
          </table>
          <p>※ 詳細はブラウザーに依存します</p>
        </td>
        <td>
          <h4><?php echo $base_exp_text; ?>リストマーカーの色</h4>
          <?php ta_color_picker_no_tomei_process( $base_key_name . '_color', 'valid' ); ?>
        </td>
      </tr>
    </table>
  </div><!-- end of #<?php echo $base_key_name; ?>_group_disp -->
<?php
}


/********* フォント等設定関数 *********/
//パラグラフの設定関数
function ta_paragraph_setting( $base_key_name, $base_exp_text, $valid_check = 'pc_check' ) {
  if ( '共通' != $base_exp_text ) { $base_exp_text2 = '専用'; } else { $base_exp_text2 = '共通'; }
  if ( 'pc_check' == $valid_check ) { ?>
  <table class="ta-2contents-table">
    <tr>
      <td>
        <h4>共通設定 or <?php echo $base_exp_text; ?>専用</h4>
        <?php ta_alternative_input_checkbox( $base_key_name . '_onlyfor_onoff', $base_exp_text . '専用を使用する' ); ?>
      </td>
      <td>
        <h4><?php echo $base_exp_text2; ?>パラグラフの高さ</h4>
        <?php ta_simple_input( $base_key_name . '_p_lineheight', 'em', 'short_box' ); ?>
        <p>※ line-heightに反映されます</p>
      </td>
    </tr>
  </table>
  <span class="fixed-space"></span>
  <hr class="fixed-border">
<?php
  } else if ( 'responsive_check' == $valid_check ) { ?>
  <table class="ta-2contents-table">
    <tr>
      <td>
        <h4>PC設定流用 or <?php echo $base_exp_text; ?>専用</h4>
        <?php ta_alternative_input_checkbox( $base_key_name . '_onlyfor_onoff', $base_exp_text . '専用を使用する' ); ?>
      </td>
      <td>
        <h4><?php echo $base_exp_text2; ?>パラグラフの高さ</h4>
        <?php ta_simple_input( $base_key_name . '_p_lineheight', 'em', 'short_box' ); ?>
        <p>※ line-heightに反映されます</p>
      </td>
    </tr>
  </table>
  <span class="fixed-space"></span>
  <hr class="fixed-border">
<?php
  } else { ?>
  <h4><?php echo $base_exp_text2; ?>パラグラフの高さ</h4>
  <?php ta_simple_input( $base_key_name . '_p_lineheight', 'em', 'short_box' ); ?>
  <p>※ line-heightに反映されます</p>
  <span class="fixed-space"></span>
  <hr class="fixed-border">
<?php
  } ?>
  <table class="ta-2contents-table">
    <tr>
      <td>
        <h4><?php echo $base_exp_text2; ?>パラグラフの上マージン</h4>
        <?php ta_simple_input( $base_key_name . '_p_topmargin', 'em', 'short_box' ); ?>
      </td>
      <td>
        <h4><?php echo $base_exp_text2; ?>パラグラフの下マージン</h4>
        <?php ta_simple_input( $base_key_name . '_p_bottommargin', 'em', 'short_box' ); ?>
      </td>
    </tr>
  </table>
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <table class="ta-2contents-table">
    <tr>
      <td>
        <h4><?php echo $base_exp_text2; ?>パラグラフの左マージン</h4>
        <?php ta_simple_input( $base_key_name . '_p_leftmargin', 'em', 'short_box' ); ?>
      </td>
      <td>
        <h4><?php echo $base_exp_text2; ?>パラグラフの右マージン</h4>
        <?php ta_simple_input( $base_key_name . '_p_rightmargin', 'em', 'short_box' ); ?>
      </td>
    </tr>
  </table>
  <span class="fixed-space"></span>
  <p>※ パラグラフとは&lt;p&gt; &lt;/p&gt;の箇所のことです</p>
  <span class="fixed-space"></span>
<?php
}

//フレームフォント設定関数
function ta_common_font_setting( $base_key_name, $base_exp_text, $pulldown = 'off', $anchor = 'off' ) {
  if ( 'ta_header_font' == $base_key_name ) {
    $manual_page = 'header/font#font';
  } else if ( 'ta_main_font' == $base_key_name ) {
    $manual_page = 'main/font#font';
  } else if ( 'ta_sidebar_font' == $base_key_name ) {
    $manual_page = 'sidebar/font#font';
  } else if ( 'ta_sidebarsub_font' == $base_key_name ) {
    $manual_page = 'sidebar/font#font';
  } else if ( 'ta_footer_font' == $base_key_name ) {
    $manual_page = 'footer/font#font';
  } else {
    $manual_page = '';
  }
  if ( 'pulldown' == $pulldown ) { ?>
  <th id="<?php echo $base_key_name; ?>_title" class="big-title"><a href="JavaScript:void(0);"><?php echo $base_exp_text; ?>フォント</a><?php ta_man2_gd( $manual_page ); ?></th>
  <td>
    <div id="<?php echo $base_key_name; ?>_disp" class="init-nodisp">
<?php
  } else { ?>
  <th><?php echo $base_exp_text; ?>フォント</th>
  <td>
<?php
  } ?>
      <p>※ 対象範囲のスタイル指定無しフォントに適応されます</p>
      <h4><?php echo $base_exp_text; ?>のテキストサイズ</h4>
      <?php ta_simple_input( $base_key_name . '_size', '％', 'short_box' ); ?>
      <span class="fixed-space"></span>
<?php
  if ( 'anchor' == $anchor ) { ?>
      <hr class="fixed-border">
      <table class="ta-2contents-table">
        <tr>
          <td>
            <h4>共通設定 or 専用設定</h4>
            <?php ta_alternative_input_checkbox( $base_key_name . '_anchor_onlyfor_onoff', '専用設定を使用する' ); ?>
          </td>
          <td>
            <h4>専用のテキスト色</h4>
            <?php ta_color_picker_no_tomei_process( $base_key_name . '_normal_text_color', 'valid' ); ?>
          </td>
        </tr>
      </table>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <?php ta_linkedtext_setting( 
              '専用のリンク付テキスト',
              $base_key_name . '_anchor_color', 'invalid',
              $base_key_name . '_anchor_under',
              $base_key_name . '_anchor_colorhover', 'invalid',
              $base_key_name . '_anchor_underhover' );
  } ?>
      <span class="fixed-space"></span>
<?php
  if ( 'pulldown' == $pulldown ) { ?>
    </div><!-- end of #<?php echo $base_key_name; ?>_disp -->
  </td>
<?php
  }
}


/********* チェックボックス配列から名前を探す関数 *********/
function ta_cat_check( $cat_array, $cat_name ) {
  foreach ( (array)$cat_array as $name ) {  //配列にキャスト
    if ( $cat_name == $name ) {
      echo 'checked="checked"';
    }
  }
}


/********* ヘッドラインを設定する共通関数 *********/
function ta_headline_register( $key_name, $common = 'common' ) {
  $headline_type = ta_read_op( $key_name . '_type' );
  $common_font_style = ( 'valid' == ta_read_op( $key_name . '_font_style_onoff' ) ); ?>
  <div id="<?php echo $key_name . '_disp'; ?>">
    <h4>ヘッドライン装飾タイプ</h4>
    <div class="headline_type_sel_cover">
<?php
  if ( "common" == $common ) { ?>
      <p><input class= "<?php echo $key_name . '_type'; ?>" type="radio" name="<?php echo $key_name . '_type'; ?>" value="common" <?php if ( "common" == $headline_type ) echo 'checked="checked"'; ?>> メインタイトルと同設定</p>
<?php
  } ?>
      <p><input class= "<?php echo $key_name . '_type'; ?>" type="radio" name="<?php echo $key_name . '_type'; ?>" value="simple" <?php if ( "simple" == $headline_type ) echo 'checked="checked"'; ?>> シンプル</p>
      <p><input class= "<?php echo $key_name . '_type'; ?>" type="radio" name="<?php echo $key_name . '_type'; ?>" value="left" <?php if ( "left" == $headline_type ) echo 'checked="checked"'; ?>> 左縦線</p>
      <p><input class= "<?php echo $key_name . '_type'; ?>" type="radio" name="<?php echo $key_name . '_type'; ?>" value="box" <?php if ( "box" == $headline_type ) echo 'checked="checked"'; ?>> 背景ボックス</p>
      <p><input class= "<?php echo $key_name . '_type'; ?>" type="radio" name="<?php echo $key_name . '_type'; ?>" value="balloon1" <?php if ( "balloon1" == $headline_type ) echo 'checked="checked"'; ?>> 背景ボックス（吹き出し#1）</p>
      <p><input class= "<?php echo $key_name . '_type'; ?>" type="radio" name="<?php echo $key_name . '_type'; ?>" value="balloon2" <?php if ( "balloon2" == $headline_type ) echo 'checked="checked"'; ?>> 背景ボックス（吹き出し#2）</p>
    </div>
    <span class="fixed-space"></span>
    <hr class="fixed-border">
    <!-- 詳細設定 -->
    <h4 id="<?php echo $key_name . '_pro_title'; ?>" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
    <div id="<?php echo $key_name . '_pro_disp'; ?>" class="pro-disp init-nodisp">
      <div id="<?php echo $key_name . '_box_color_container'; ?>">
        <!-- 背景ボックスの色(グラデーション) -->
        <h4>背景ボックスの色</h4>
        <?php ta_color_picker_no_tomei_grad_process( $key_name . '_box_color', 'valid' ); ?>
        <span class="fixed-space"></span>
        <hr class="fixed-border">
      </div>
      <?php if ( 'simple' != $headline_type && 'left' != $headline_type ) { $css_value = 'block'; } else { $css_value = 'none'; } ?>
      <style type="text/css"> #<?php echo $key_name . '_box_color_container'; ?> { display: <?php echo $css_value; ?>; } </style>
      <h4>共通フォント設定</h4>
      <div class="headline_font_style_onoff_cover">
        <?php ta_alternative_input_checkbox( $key_name . '_font_style_onoff', '共通フォント設定を採用する' ); ?>
      </div>
      <p>※ 文字色、リンク付文字色、文字下線の有無、HOVER色が共通フォント設定と同じになります</p>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <h4 class="<?php echo $key_name . '_common_font_valid'; ?>">文字の色</h4>
      <?php ta_color_picker_no_tomei_process( $key_name . '_color', 'valid' ); ?>
      <p>※ Ver.2.06 までは“文字の色”と“リンク付文字色”が共通でしたがVer.2.07から分離しました</p>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <table class="ta-3contents-table">
        <tr>
          <td>
            <h4 class="<?php echo $key_name . '_common_font_valid'; ?>">リンク付文字色</h4>
            <?php ta_color_picker_no_tomei_process( $key_name . '_linkedcolor', 'valid' ); ?>
          </td>
          <td>
            <h4 class="<?php echo $key_name . '_common_font_valid'; ?>">リンク付文字色下線表示</h4>
            <?php ta_alternative_input_checkbox( $key_name . '_font_ul_onoff', '表示する' ); ?>
          </td>
          <td>
            <h4>リンク時の新規ウィンドウ</h4>
            <?php ta_alternative_input_checkbox( $key_name . '_newwin_onoff', 'リンク時に新規ウィンドウで開く' ); ?>
          </td>
        </tr>
      </table>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <table class="ta-2contents-table">
        <tr>
          <td>
            <h4 class="<?php echo $key_name . '_common_font_valid'; ?>">HOVER時のリンク付文字色</h4>
            <?php ta_color_picker_no_tomei_process( $key_name . '_colorhover', 'valid' ); ?>
          </td>
          <td>
            <h4 class="<?php echo $key_name . '_common_font_valid'; ?>">HOVER時のリンク付文字下線表示</h4>
            <?php ta_alternative_input_checkbox( $key_name . '_font_hoverul_onoff', '表示する' ); ?>
          </td>
        </tr>
      </table>
      <?php if ( $common_font_style ) { $css_value = '#bbbbbb'; } else { $css_value = '#777777'; } ?>
      <style type="text/css"> #ta-setting-form #<?php echo $key_name . '_disp'; ?> .<?php echo $key_name . '_common_font_valid'; ?> { color: <?php echo $css_value; ?>; } </style>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <table class="ta-2contents-table">
        <tr>
          <td>
            <h4>文字のサイズ</h4>
            <?php ta_simple_input( $key_name . '_size', 'ピクセル', 'short_box' ); ?>
          </td>
          <td>
            <h4>文字の高さ</h4>
            <?php ta_simple_input( $key_name . '_hl_lineheight', 'em', 'short_box' ); ?>
          </td>
        </tr>
      </table>
      <p>※ “文字の高さ”は1.3em（文字自体の高さに30%の余白が付く）程度にするとバランスが良いです</p>
      <p>※ タイトルの高さは“文字のサイズ”、“文字の高さ”、“装飾画像”に従って自動的に調整されます</p>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <table class="ta-3contents-table">
        <tr>
          <td>
            <h4>文字の左端からの位置</h4>
            <?php ta_simple_input( $key_name . '_position', '％', 'short_box' ); ?>
          </td>
          <td>
            <h4>文字の太さ</h4>
            <?php ta_fontweight_selection( $key_name . '_weight' ); ?>
          </td>
          <td>
            <h4>文字のセンタリング</h4>
            <?php ta_alternative_input_checkbox( $key_name . '_centering', 'センタリングする' ); ?>
          </td>
        </tr>
      </table>
      <p>※ “文字の左端からの位置”の対象はタイトル前方の装飾画像も含みます</p>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <table class="ta-2contents-table">
        <tr>
          <td>
            <h4>ヘッドラインの上側延長（padding）</h4>
            <?php ta_simple_input( $key_name . '_padding_top', 'ピクセル', 'short_box' ); ?>
          </td>
          <td>
            <h4>ヘッドラインの下側延長（padding）</h4>
            <?php ta_simple_input( $key_name . '_padding_bottom', 'ピクセル', 'short_box' ); ?>
          </td>
        </tr>
      </table>
      <p>※ “文字の高さ”を大きく上回る余白（タイトルの延長）を上下非対称に付けることができます</p>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <table class="ta-2contents-table">
        <tr>
          <td>
            <h4>ヘッドラインの上側余白（margin）</h4>
            <?php ta_simple_input( $key_name . '_margin_top', 'ピクセル', 'short_box' ); ?>
          </td>
          <td>
            <h4>ヘッドラインの下側余白（margin）</h4>
            <?php ta_simple_input( $key_name . '_margin_bottom', 'ピクセル', 'short_box' ); ?>
          </td>
        </tr>
      </table>
      <p>※ 隣接する上下のコンテンツとの距離を設定します（この余白はタイトルの延長にはなりません）</p>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <div id="<?php echo $key_name . '_left_color_container'; ?>">
        <table class="ta-fullcontents-table">
          <tr>
            <td style="width:20em;">
              <h4>ヘッドラインの左縦線の太さ</h4>
              <?php ta_simple_input( $key_name . '_left_size', 'ピクセル', 'short_box' ); ?>
            </td>
            <td>
              <!-- ヘッドライン左縦線の色(グラデーション) -->
              <h4>ヘッドライン左縦線の色</h4>
              <?php ta_color_picker_no_tomei_grad_process( $key_name . '_left_color', 'valid' ); ?>
            </td>
          </tr>
        </table>
        <span class="fixed-space"></span>
        <hr class="fixed-border">
      </div>
      <?php if ( 'left' == $headline_type ) { $css_value = 'block'; } else { $css_value = 'none'; } ?>
      <style type="text/css"> #<?php echo $key_name . '_left_color_container'; ?> { display: <?php echo $css_value; ?>; } </style>
      <div id="<?php echo $key_name . '_overunderline_container'; ?>">
        <table class="ta-2contents-table">
          <tr>
            <td>
              <h4>ヘッドライン上線</h4>
              <?php ta_alternative_input_checkbox( $key_name . '_over_onoff', '表示する' ); ?>
              <p>※ 枠幅（100％）の線になります</p>
            </td>
            <td>
              <h4>ヘッドライン上線の種類</h4>
              <?php $init = ta_read_op( $key_name . '_over_kind' ); ?>
              <p><input type="radio" name="<?php echo $key_name . '_over_kind'; ?>" value="solid" <?php if ( "solid" == $init ) echo 'checked="checked"' ?>> 実線</p>
              <p><input type="radio" name="<?php echo $key_name . '_over_kind'; ?>" value="dotted" <?php if ( "dotted" == $init ) echo 'checked="checked"' ?>> 点線</p>
              <p><input type="radio" name="<?php echo $key_name . '_over_kind'; ?>" value="dashed" <?php if ( "dashed" == $init ) echo 'checked="checked"' ?>> 破線</p>
              <p><input type="radio" name="<?php echo $key_name . '_over_kind'; ?>" value="double" <?php if ( "double" == $init ) echo 'checked="checked"' ?>> 二重線</p>
              <p>※ グラデーション使用時は実線になります</p>
            </td>
          </tr>
        </table>
        <span class="fixed-space"></span>
        <hr class="fixed-border">
        <table class="ta-2contents-table">
          <tr>
            <td>
              <h4>ヘッドライン上線の太さ</h4>
              <?php ta_simple_input( $key_name . '_over_size', 'ピクセル', 'short_box' ); ?>
            </td>
            <td>
              <!-- ヘッドライン上線の色(グラデーション) -->
              <h4>ヘッドライン上線の色</h4>
              <?php ta_color_picker_no_tomei_grad_process( $key_name . '_over_color', 'valid' ); ?>
              <?php if ( TA_HIEND_PI ) { ?><p id="<?php echo $key_name; ?>-left-grad-limit" style="color:#ff0000;">※ 左縦線の時は単色設定が採用されます</p><?php } ?>
              <?php if ( 'left' == $headline_type ) { ?><style type="text/css">#<?php echo $key_name; ?>-left-grad-limit { display: block; }</style><?php } else { ?><style type="text/css">#<?php echo $key_name; ?>-left-grad-limit { display: none; }</style><?php } ?>
            </td>
          </tr>
        </table>
        <span class="fixed-space"></span>
        <hr class="fixed-border">
        <table class="ta-2contents-table">
          <tr>
            <td>
              <h4>ヘッドライン下線</h4>
              <?php ta_alternative_input_checkbox( $key_name . '_under_onoff', '表示する' ); ?>
              <p>※ 枠幅（100％）の線になります</p>
            </td>
            <td>
              <h4>ヘッドライン下線の種類</h4>
              <?php $init = ta_read_op( $key_name . '_under_kind' ); ?>
              <p><input type="radio" name="<?php echo $key_name . '_under_kind'; ?>" value="solid" <?php if ( "solid" == $init ) echo 'checked="checked"' ?>> 実線</p>
              <p><input type="radio" name="<?php echo $key_name . '_under_kind'; ?>" value="dotted" <?php if ( "dotted" == $init ) echo 'checked="checked"' ?>> 点線</p>
              <p><input type="radio" name="<?php echo $key_name . '_under_kind'; ?>" value="dashed" <?php if ( "dashed" == $init ) echo 'checked="checked"' ?>> 破線</p>
              <p><input type="radio" name="<?php echo $key_name . '_under_kind'; ?>" value="double" <?php if ( "double" == $init ) echo 'checked="checked"' ?>> 二重線</p>
              <p>※ グラデーション使用時は実線になります</p>
            </td>
          </tr>
        </table>
        <span class="fixed-space"></span>
        <hr class="fixed-border">
        <table class="ta-2contents-table">
          <tr>
            <td>
              <h4>ヘッドライン下線の太さ</h4>
              <?php ta_simple_input( $key_name . '_under_size', 'ピクセル', 'short_box' ); ?>
            </td>
            <td>
              <!-- ヘッドライン下線の色(グラデーション) -->
              <h4>ヘッドライン下線の色</h4>
              <?php ta_color_picker_no_tomei_grad_process( $key_name . '_under_color', 'valid' ); ?>
            </td>
          </tr>
        </table>
        <span class="fixed-space"></span>
        <hr class="fixed-border">
      </div>
      <?php if ( 'simple' == $headline_type || 'left' == $headline_type || "box" == $headline_type ) { $css_value = 'block'; } else { $css_value = 'none'; }
      if ( 'left' != $headline_type ) { $css_value2 = 'block'; $css_value3 = 'none';} else { $css_value2 = 'none'; $css_value3 = 'block'; } ?>
      <style type="text/css">
        #<?php echo $key_name . '_overunderline_container'; ?> { display: <?php echo $css_value; ?>; }
        #<?php echo $key_name . '_over_color'; ?>_grad_container { display: <?php echo $css_value2; ?>; }
        #<?php echo $key_name . '_over_color'; ?>_grad_container_off_disp { display: <?php echo $css_value3; ?>; }
      </style>
      <div id="<?php echo $key_name . '_box_round_container'; ?>">
        <h4>背景ボックス角の丸み</h4>
        <?php ta_simple_input( $key_name . '_box_round', 'ピクセル', 'short_box' ); ?>
        <p>※ 丸みを付けない場合は0を入力してください</p>
        <p>※ グラデーションの上下線はボックスの丸みに追従しませんのでご留意ください</p>
        <span class="fixed-space"></span>
        <hr class="fixed-border">
      </div>
      <?php if ( 'simple' != $headline_type && 'left' != $headline_type ) { $css_value = 'block'; } else { $css_value = 'none'; } ?>
      <style type="text/css"> #<?php echo $key_name . '_box_round_container'; ?> { display: <?php echo $css_value; ?>; } </style>
      <div id="<?php echo $key_name . '_balloon1_container'; ?>">
        <table class="ta-3contents-table">
          <tr>
            <td>
              <h4>吹き出しの方向（吹き出し#1）</h4>
              <?php $arrow_direction1 = ta_read_op( $key_name . '_arrow_direction1' ); ?>
              <p><input type="radio" name="<?php echo $key_name . '_arrow_direction1'; ?>" value="top" <?php if ( "top" == $arrow_direction1 ) echo 'checked="checked"'; ?>> ボックスの上</p>
              <p><input type="radio" name="<?php echo $key_name . '_arrow_direction1'; ?>" value="left" <?php if ( "left" == $arrow_direction1 ) echo 'checked="checked"'; ?>> ボックスの左横</p>
              <p><input type="radio" name="<?php echo $key_name . '_arrow_direction1'; ?>" value="bottom" <?php if ( "bottom" == $arrow_direction1 ) echo 'checked="checked"'; ?>> ボックスの下</p>
              <p><input type="radio" name="<?php echo $key_name . '_arrow_direction1'; ?>" value="right" <?php if ( "right" == $arrow_direction1 ) echo 'checked="checked"'; ?>> ボックスの右横</p>
            </td>
            <td>
              <h4>吹き出しの大きさ（吹き出し#1）</h4>
              <?php ta_simple_input( $key_name . '_arrow_size1', '％', 'short_box' ); ?>
            </td>
            <td>
              <h4>吹き出しの左端からの位置（吹き出し#1）</h4>
              <?php ta_simple_input( $key_name . '_arrow_position1', '％', 'short_box' ); ?>
            </td>
          </tr>
        </table>
        <p>※ 吹き出しの色は背景ボックスの色が採用されます。</p>
        <span class="fixed-space"></span>
        <hr class="fixed-border">
      </div>
      <?php if ( 'balloon1' == $headline_type ) { $css_value = 'block'; } else { $css_value = 'none'; } ?>
      <style type="text/css"> #<?php echo $key_name . '_balloon1_container'; ?> { display: <?php echo $css_value; ?>; } </style>
      <div id="<?php echo $key_name . '_balloon2_container'; ?>">
        <table class="ta-2contents-table">
          <tr>
            <td>
              <h4>吹き出しの方向（吹き出し#2）</h4>
              <?php $arrow_direction2 = ta_read_op( $key_name . '_arrow_direction2' ); ?>
              <p><input type="radio" name="<?php echo $key_name . '_arrow_direction2'; ?>" value="right-top" <?php if ( "right-top" == $arrow_direction2 ) echo 'checked="checked"'; ?>> ボックスの右上</p>
              <p><input type="radio" name="<?php echo $key_name . '_arrow_direction2'; ?>" value="left-top" <?php if ( "left-top" == $arrow_direction2 ) echo 'checked="checked"'; ?>> ボックスの左上</p>
              <p><input type="radio" name="<?php echo $key_name . '_arrow_direction2'; ?>" value="right-bottom" <?php if ( "right-bottom" == $arrow_direction2 ) echo 'checked="checked"'; ?>> ボックスの右下</p>
              <p><input type="radio" name="<?php echo $key_name . '_arrow_direction2'; ?>" value="left-bottom" <?php if ( "left-bottom" == $arrow_direction2 ) echo 'checked="checked"'; ?>> ボックスの左下</p>
            </td>
            <td>
              <h4>吹き出しの大きさ（吹き出し#2）</h4>
              <?php ta_simple_input( $key_name . '_arrow_size2', '％', 'short_box' ); ?>
            </td>
          </tr>
        </table>
        <p>※ 吹き出しの色は背景ボックスの色が採用されます。</p>
        <span class="fixed-space"></span>
        <hr class="fixed-border">
      </div>
      <?php if ( 'balloon2' == $headline_type ) { $css_value = 'block'; } else { $css_value = 'none'; } ?>
      <style type="text/css"> #<?php echo $key_name . '_balloon2_container'; ?> { display: <?php echo $css_value; ?>; } </style>
<?php
  if ( TA_HIEND_PI ) {
    ta_thm001highend_headline_bgimg_setting( $key_name );
  } else { ?>
      <h4 style="color:#bbbbbb" class="no-ta-thm001highend">装飾画像</h4>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <h4 style="color:#bbbbbb" class="no-ta-thm001highend">装飾画像のレイアウト</h4>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <h4 style="color:#bbbbbb" class="no-ta-thm001highend">タイトル背景時のX方向繰り返し</h4>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <h4 style="color:#bbbbbb" class="no-ta-thm001highend">タイトル前方装飾画像の位置調整</h4>
<?php
  } ?>
    </div><!-- end of <?php echo $key_name . '_pro_disp'; ?> -->
    <span class="fixed-space"></span>
  </div><!-- end of <?php echo $key_name . '_disp'; ?> -->
<?php
}


/********* レスポンシブデザイン専用ヘッドラインを設定する関数 *********/
function ta_responsive_headline_register( $key_name, $common = 'common' ) {
  $headline_type = ta_read_op( $key_name . '_type' );
  $common_font_style = ( 'valid' == ta_read_op( $key_name . '_font_style_onoff' ) ); ?>
  <div id="<?php echo $key_name . '_input_disp'; ?>">
    <h4>ヘッドライン装飾タイプ</h4>
    <div class="headline_type_sel_cover">
<?php
  if ( "common" == $common ) { ?>
      <p><input class= "<?php echo $key_name . '_type'; ?>" type="radio" name="<?php echo $key_name . '_type'; ?>" value="common" <?php if ( "common" == $headline_type ) echo 'checked="checked"'; ?>> メインタイトルと同設定</p>
<?php
  } ?>
      <p><input class= "<?php echo $key_name . '_type'; ?>" type="radio" name="<?php echo $key_name . '_type'; ?>" value="simple" <?php if ( "simple" == $headline_type ) echo 'checked="checked"'; ?>> シンプル</p>
      <p><input class= "<?php echo $key_name . '_type'; ?>" type="radio" name="<?php echo $key_name . '_type'; ?>" value="left" <?php if ( "left" == $headline_type ) echo 'checked="checked"'; ?>> 左縦線</p>
      <p><input class= "<?php echo $key_name . '_type'; ?>" type="radio" name="<?php echo $key_name . '_type'; ?>" value="box" <?php if ( "box" == $headline_type ) echo 'checked="checked"'; ?>> 背景ボックス</p>
      <p><input class= "<?php echo $key_name . '_type'; ?>" type="radio" name="<?php echo $key_name . '_type'; ?>" value="balloon1" <?php if ( "balloon1" == $headline_type ) echo 'checked="checked"'; ?>> 背景ボックス（吹き出し#1）</p>
      <p><input class= "<?php echo $key_name . '_type'; ?>" type="radio" name="<?php echo $key_name . '_type'; ?>" value="balloon2" <?php if ( "balloon2" == $headline_type ) echo 'checked="checked"'; ?>> 背景ボックス（吹き出し#2）</p>
    </div>
    <span class="fixed-space"></span>
    <hr class="fixed-border">
    <div id="<?php echo $key_name . '_box_color_container'; ?>">
      <!-- 背景ボックスの色(グラデーション) -->
      <h4>背景ボックスの色</h4>
      <?php ta_color_picker_no_tomei_grad_process( $key_name . '_box_color', 'valid' ); ?>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
    </div>
    <?php if ( 'simple' != $headline_type && 'left' != $headline_type ) { $css_value = 'block'; } else { $css_value = 'none'; } ?>
    <style type="text/css"> #<?php echo $key_name . '_box_color_container'; ?> { display: <?php echo $css_value; ?>; } </style>
    <h4>共通フォント設定</h4>
    <div class="headline_font_style_onoff_cover">
      <?php ta_alternative_input_checkbox( $key_name . '_font_style_onoff', '共通フォント設定を採用する' ); ?>
    </div>
    <p>※ 文字色、リンク付文字色、文字下線の有無、HOVER色が共通フォント設定と同じになります</p>
    <span class="fixed-space"></span>
    <hr class="fixed-border">
    <h4 class="<?php echo $key_name . '_common_font_valid'; ?>">文字の色</h4>
    <?php ta_color_picker_no_tomei_process( $key_name . '_color', 'valid' ); ?>
    <p>※ Ver.2.06 までは“文字の色”と“リンク付文字色”が共通でしたがVer.2.07から分離しました</p>
    <span class="fixed-space"></span>
    <hr class="fixed-border">
    <table class="ta-2contents-table">
      <tr>
        <td>
          <h4 class="<?php echo $key_name . '_common_font_valid'; ?>">リンク付文字色</h4>
          <?php ta_color_picker_no_tomei_process( $key_name . '_linkedcolor', 'valid' ); ?>
        </td>
        <td>
          <h4 class="<?php echo $key_name . '_common_font_valid'; ?>">リンク付文字色下線表示</h4>
          <?php ta_alternative_input_checkbox( $key_name . '_font_ul_onoff', '表示する' ); ?>
        </td>
      </tr>
    </table>
    <span class="fixed-space"></span>
    <hr class="fixed-border">
    <table class="ta-2contents-table">
      <tr>
        <td>
          <h4 class="<?php echo $key_name . '_common_font_valid'; ?>">HOVER時のリンク付文字色</h4>
          <?php ta_color_picker_no_tomei_process( $key_name . '_colorhover', 'valid' ); ?>
        </td>
        <td>
          <h4 class="<?php echo $key_name . '_common_font_valid'; ?>">HOVER時のリンク付文字下線表示</h4>
          <?php ta_alternative_input_checkbox( $key_name . '_font_hoverul_onoff', '表示する' ); ?>
        </td>
      </tr>
    </table>
    <?php if ( $common_font_style ) { $css_value = '#bbbbbb'; } else { $css_value = '#777777'; } ?>
    <style type="text/css"> #ta-setting-form #<?php echo $key_name . '_disp'; ?> .<?php echo $key_name . '_common_font_valid'; ?> { color: <?php echo $css_value; ?>; } </style>
    <span class="fixed-space"></span>
    <hr class="fixed-border">
    <table class="ta-2contents-table">
      <tr>
        <td>
          <h4>文字のサイズ</h4>
          <?php ta_simple_input( $key_name . '_size', 'ピクセル', 'short_box' ); ?>
        </td>
        <td>
          <h4>文字の高さ</h4>
          <?php ta_simple_input( $key_name . '_hl_lineheight', 'em', 'short_box' ); ?>
        </td>
      </tr>
    </table>
    <p>※ “文字の高さ”は1.3em（文字自体の高さに30%の余白が付く）程度にするとバランスが良いです</p>
    <p>※ タイトルの高さは“文字のサイズ”、“文字の高さ”、“装飾画像”に従って自動的に調整されます</p>
    <span class="fixed-space"></span>
    <hr class="fixed-border">
    <table class="ta-3contents-table">
      <tr>
        <td>
          <h4>文字の左端からの位置</h4>
          <?php ta_simple_input( $key_name . '_position', '％', 'short_box' ); ?>
        </td>
        <td>
          <h4>文字の太さ</h4>
          <?php ta_fontweight_selection( $key_name . '_weight' ); ?>
        </td>
        <td>
          <h4>文字のセンタリング</h4>
          <?php ta_alternative_input_checkbox( $key_name . '_centering', 'センタリングする' ); ?>
        </td>
      </tr>
    </table>
    <p>※ “文字の左端からの位置”の対象はタイトル前方の装飾画像も含みます</p>
    <span class="fixed-space"></span>
    <hr class="fixed-border">
    <table class="ta-2contents-table">
      <tr>
        <td>
          <h4>ヘッドラインの上側延長（padding）</h4>
          <?php ta_simple_input( $key_name . '_padding_top', 'ピクセル', 'short_box' ); ?>
        </td>
        <td>
          <h4>ヘッドラインの下側延長（padding）</h4>
          <?php ta_simple_input( $key_name . '_padding_bottom', 'ピクセル', 'short_box' ); ?>
        </td>
      </tr>
    </table>
    <p>※ “文字の高さ”を大きく上回る余白（タイトルの延長）を上下非対称に付けることができます</p>
    <span class="fixed-space"></span>
    <hr class="fixed-border">
    <table class="ta-2contents-table">
      <tr>
        <td>
          <h4>ヘッドラインの上側余白（margin）</h4>
          <?php ta_simple_input( $key_name . '_margin_top', 'ピクセル', 'short_box' ); ?>
        </td>
        <td>
          <h4>ヘッドラインの下側余白（margin）</h4>
          <?php ta_simple_input( $key_name . '_margin_bottom', 'ピクセル', 'short_box' ); ?>
        </td>
      </tr>
    </table>
    <p>※ 隣接する上下のコンテンツとの距離を設定します（この余白はタイトルの延長にはなりません）</p>
    <span class="fixed-space"></span>
    <hr class="fixed-border">
    <div id="<?php echo $key_name . '_left_color_container'; ?>">
      <table class="ta-fullcontents-table">
        <tr>
          <td style="width:20em;">
            <h4>ヘッドラインの左縦線の太さ</h4>
            <?php ta_simple_input( $key_name . '_left_size', 'ピクセル', 'short_box' ); ?>
          </td>
          <td>
            <!-- ヘッドライン左縦線の色(グラデーション) -->
            <h4>ヘッドライン左縦線の色</h4>
            <?php ta_color_picker_no_tomei_grad_process( $key_name . '_left_color', 'valid' ); ?>
          </td>
        </tr>
      </table>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
    </div>
    <?php if ( 'left' == $headline_type ) { $css_value = 'block'; } else { $css_value = 'none'; } ?>
    <style type="text/css"> #<?php echo $key_name . '_left_color_container'; ?> { display: <?php echo $css_value; ?>; } </style>
    <div id="<?php echo $key_name . '_overunderline_container'; ?>">
      <table class="ta-2contents-table">
        <tr>
          <td>
            <h4>ヘッドライン上線</h4>
            <?php ta_alternative_input_checkbox( $key_name . '_over_onoff', '表示する' ); ?>
            <p>※ 枠幅（100％）の線になります</p>
          </td>
          <td>
            <h4>ヘッドライン上線の種類</h4>
            <?php $init = ta_read_op( $key_name . '_over_kind' ); ?>
            <p><input type="radio" name="<?php echo $key_name . '_over_kind'; ?>" value="solid" <?php if ( "solid" == $init ) echo 'checked="checked"' ?>> 実線</p>
            <p><input type="radio" name="<?php echo $key_name . '_over_kind'; ?>" value="dotted" <?php if ( "dotted" == $init ) echo 'checked="checked"' ?>> 点線</p>
            <p><input type="radio" name="<?php echo $key_name . '_over_kind'; ?>" value="dashed" <?php if ( "dashed" == $init ) echo 'checked="checked"' ?>> 破線</p>
            <p><input type="radio" name="<?php echo $key_name . '_over_kind'; ?>" value="double" <?php if ( "double" == $init ) echo 'checked="checked"' ?>> 二重線</p>
            <p>※ グラデーション使用時は実線になります</p>
          </td>
        </tr>
      </table>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <table class="ta-2contents-table">
        <tr>
          <td>
            <h4>ヘッドライン上線の太さ</h4>
            <?php ta_simple_input( $key_name . '_over_size', 'ピクセル', 'short_box' ); ?>
          </td>
          <td>
            <!-- ヘッドライン上線の色(グラデーション) -->
            <h4>ヘッドライン上線の色</h4>
            <?php ta_color_picker_no_tomei_grad_process( $key_name . '_over_color', 'valid' ); ?>
            <?php if ( TA_HIEND_PI ) { ?><p id="<?php echo $key_name; ?>-left-grad-limit" style="color:#ff0000;">※ 左縦線の時は単色設定が採用されます</p><?php } ?>
            <?php if ( 'left' == $headline_type ) { ?><style type="text/css">#<?php echo $key_name; ?>-left-grad-limit { display: block; }</style><?php } else { ?><style type="text/css">#<?php echo $key_name; ?>-left-grad-limit { display: none; }</style><?php } ?>
          </td>
        </tr>
      </table>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <table class="ta-2contents-table">
        <tr>
          <td>
            <h4>ヘッドライン下線</h4>
            <?php ta_alternative_input_checkbox( $key_name . '_under_onoff', '表示する' ); ?>
            <p>※ 枠幅（100％）の線になります</p>
          </td>
          <td>
            <h4>ヘッドライン下線の種類</h4>
            <?php $init = ta_read_op( $key_name . '_under_kind' ); ?>
            <p><input type="radio" name="<?php echo $key_name . '_under_kind'; ?>" value="solid" <?php if ( "solid" == $init ) echo 'checked="checked"' ?>> 実線</p>
            <p><input type="radio" name="<?php echo $key_name . '_under_kind'; ?>" value="dotted" <?php if ( "dotted" == $init ) echo 'checked="checked"' ?>> 点線</p>
            <p><input type="radio" name="<?php echo $key_name . '_under_kind'; ?>" value="dashed" <?php if ( "dashed" == $init ) echo 'checked="checked"' ?>> 破線</p>
            <p><input type="radio" name="<?php echo $key_name . '_under_kind'; ?>" value="double" <?php if ( "double" == $init ) echo 'checked="checked"' ?>> 二重線</p>
            <p>※ グラデーション使用時は実線になります</p>
          </td>
        </tr>
      </table>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <table class="ta-2contents-table">
        <tr>
          <td>
            <h4>ヘッドライン下線の太さ</h4>
            <?php ta_simple_input( $key_name . '_under_size', 'ピクセル', 'short_box' ); ?>
          </td>
          <td>
            <!-- ヘッドライン下線の色(グラデーション) -->
            <h4>ヘッドライン下線の色</h4>
            <?php ta_color_picker_no_tomei_grad_process( $key_name . '_under_color', 'valid' ); ?>
          </td>
        </tr>
      </table>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
    </div>
    <?php if ( 'simple' == $headline_type || 'left' == $headline_type || "box" == $headline_type ) { $css_value = 'block'; } else { $css_value = 'none'; }
    if ( 'left' != $headline_type ) { $css_value2 = 'block'; $css_value3 = 'none';} else { $css_value2 = 'none'; $css_value3 = 'block'; } ?>
    <style type="text/css">
      #<?php echo $key_name . '_overunderline_container'; ?> { display: <?php echo $css_value; ?>; }
      #<?php echo $key_name . '_over_color'; ?>_grad_container { display: <?php echo $css_value2; ?>; }
      #<?php echo $key_name . '_over_color'; ?>_grad_container_off_disp { display: <?php echo $css_value3; ?>; }
    </style>
    <div id="<?php echo $key_name . '_box_round_container'; ?>">
      <h4>背景ボックス角の丸み</h4>
      <?php ta_simple_input( $key_name . '_box_round', 'ピクセル', 'short_box' ); ?>
      <p>※ 丸みを付けない場合は0を入力してください</p>
      <p>※ グラデーションの上下線はボックスの丸みに追従しませんのでご留意ください</p>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
    </div>
    <?php if ( 'simple' != $headline_type && 'left' != $headline_type ) { $css_value = 'block'; } else { $css_value = 'none'; } ?>
    <style type="text/css"> #<?php echo $key_name . '_box_round_container'; ?> { display: <?php echo $css_value; ?>; } </style>
    <div id="<?php echo $key_name . '_balloon1_container'; ?>">
      <table class="ta-3contents-table">
        <tr>
          <td>
            <h4>吹き出しの方向（吹き出し#1）</h4>
            <?php $arrow_direction1 = ta_read_op( $key_name . '_arrow_direction1' ); ?>
            <p><input type="radio" name="<?php echo $key_name . '_arrow_direction1'; ?>" value="top" <?php if ( "top" == $arrow_direction1 ) echo 'checked="checked"'; ?>> ボックスの上</p>
            <p><input type="radio" name="<?php echo $key_name . '_arrow_direction1'; ?>" value="left" <?php if ( "left" == $arrow_direction1 ) echo 'checked="checked"'; ?>> ボックスの左横</p>
            <p><input type="radio" name="<?php echo $key_name . '_arrow_direction1'; ?>" value="bottom" <?php if ( "bottom" == $arrow_direction1 ) echo 'checked="checked"'; ?>> ボックスの下</p>
            <p><input type="radio" name="<?php echo $key_name . '_arrow_direction1'; ?>" value="right" <?php if ( "right" == $arrow_direction1 ) echo 'checked="checked"'; ?>> ボックスの右横</p>
          </td>
          <td>
            <h4>吹き出しの大きさ（吹き出し#1）</h4>
            <?php ta_simple_input( $key_name . '_arrow_size1', '％', 'short_box' ); ?>
          </td>
          <td>
            <h4>吹き出しの左端からの位置（吹き出し#1）</h4>
            <?php ta_simple_input( $key_name . '_arrow_position1', '％', 'short_box' ); ?>
          </td>
        </tr>
      </table>
      <p>※ 吹き出しの色は背景ボックスの色が採用されます。</p>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
    </div>
    <?php if ( 'balloon1' == $headline_type ) { $css_value = 'block'; } else { $css_value = 'none'; } ?>
    <style type="text/css"> #<?php echo $key_name . '_balloon1_container'; ?> { display: <?php echo $css_value; ?>; } </style>
    <div id="<?php echo $key_name . '_balloon2_container'; ?>">
      <table class="ta-2contents-table">
        <tr>
          <td>
            <h4>吹き出しの方向（吹き出し#2）</h4>
            <?php $arrow_direction2 = ta_read_op( $key_name . '_arrow_direction2' ); ?>
            <p><input type="radio" name="<?php echo $key_name . '_arrow_direction2'; ?>" value="right-top" <?php if ( "right-top" == $arrow_direction2 ) echo 'checked="checked"'; ?>> ボックスの右上</p>
            <p><input type="radio" name="<?php echo $key_name . '_arrow_direction2'; ?>" value="left-top" <?php if ( "left-top" == $arrow_direction2 ) echo 'checked="checked"'; ?>> ボックスの左上</p>
            <p><input type="radio" name="<?php echo $key_name . '_arrow_direction2'; ?>" value="right-bottom" <?php if ( "right-bottom" == $arrow_direction2 ) echo 'checked="checked"'; ?>> ボックスの右下</p>
            <p><input type="radio" name="<?php echo $key_name . '_arrow_direction2'; ?>" value="left-bottom" <?php if ( "left-bottom" == $arrow_direction2 ) echo 'checked="checked"'; ?>> ボックスの左下</p>
          </td>
          <td>
            <h4>吹き出しの大きさ（吹き出し#2）</h4>
            <?php ta_simple_input( $key_name . '_arrow_size2', '％', 'short_box' ); ?>
          </td>
        </tr>
      </table>
      <p>※ 吹き出しの色は背景ボックスの色が採用されます。</p>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
    </div>
    <?php if ( 'balloon2' == $headline_type ) { $css_value = 'block'; } else { $css_value = 'none'; } ?>
    <style type="text/css"> #<?php echo $key_name . '_balloon2_container'; ?> { display: <?php echo $css_value; ?>; } </style>
<?php
  if ( TA_HIEND_PI ) {
    ta_thm001highend_headline_bgimg_setting( $key_name );
  } else { ?>
    <h4 style="color:#bbbbbb" class="no-ta-thm001highend">装飾画像</h4>
    <span class="fixed-space"></span>
    <hr class="fixed-border">
    <h4 style="color:#bbbbbb" class="no-ta-thm001highend">装飾画像のレイアウト</h4>
    <span class="fixed-space"></span>
    <hr class="fixed-border">
    <h4 style="color:#bbbbbb" class="no-ta-thm001highend">タイトル背景時のX方向繰り返し</h4>
    <span class="fixed-space"></span>
    <hr class="fixed-border">
    <h4 style="color:#bbbbbb" class="no-ta-thm001highend">タイトル前方装飾画像の位置調整</h4>
<?php
  } ?>
    <span class="fixed-space"></span>
  </div><!-- end of <?php echo $key_name . '_disp'; ?> -->
<?php
}


/********* ヘッドラインを設定画面で表示する関数 *********/
function ta_headline_confirm( $key_name, $factor_name, $classname = 'title' ) { ?>
  <div id="headline-confirm-container">
    <p>上部のテキストコンテンツ例です。 背景は多くのサイトで使用されている白色(#FFFFFF)です。 お使いのWordPress管理画面標準のfont familyで表示されます。</p>
    <p>実際の見え方はサイトのfont family、背景色との兼ね合いで大きく異なります。最終確認は本サイトで行ってください。</p>
    <<?php echo $factor_name; ?> class="<?php echo $classname; ?>"><?php echo $factor_name; ?> title <a href="#">(Link view)</a>（最終確認は本サイトで）</<?php echo $factor_name; ?>>
    <p>下部のテキストコンテンツ例です。 背景は多くのサイトで使用されている白色(#FFFFFF)です。 お使いのWordPress管理画面標準のfont familyで表示されます。</p>
    <p>実際の見え方はサイトのfont family、背景色との兼ね合いで大きく異なります。最終確認は本サイトで行ってください。</p>
  </div>
<?php
  $headline_type = ta_read_op( $key_name . '_type' );
  /* タイプがcommonの時はkeynameをmainの名前に変更して共通設定を読み込む */
  if ( 'common' == $headline_type ) {
    $key_name = str_replace("sidebarsub", "main", $key_name );
    $key_name = str_replace("sidebar", "main", $key_name );
    $key_name = str_replace("footer", "main", $key_name );
  }
  $headline_type = ta_read_op( $key_name . '_type' );
  $headline_size = ta_read_op( $key_name . '_size' );
  $headline_hl_lineheight = ta_read_op( $key_name . '_hl_lineheight' );
  $headline_centering = ta_read_op( $key_name . '_centering' );
  $headline_position = ta_read_op( $key_name . '_position' );
  $headline_weight = ta_read_op( $key_name . '_weight' );
  $headline_color = ta_select_color_w_image_color( $key_name . '_color' );
  $headline_linkedcolor = ta_select_color_w_image_color( $key_name . '_linkedcolor' );
  $headline_left_size = ta_read_op( $key_name . '_left_size' );
  $headline_left_color = ta_select_color_w_image_color( $key_name . '_left_color' );
  if ( TA_HIEND_PI ) {
    $headline_left_color_grad_onoff = ta_read_op( $key_name . '_left_color_grad_onoff' );
  } else {
    $headline_left_color_grad_onoff = "invalid";
  }
  $headline_over_onoff = ta_read_op( $key_name . '_over_onoff' );
  $headline_over_kind = ta_read_op( $key_name . '_over_kind' );
  $headline_over_size = ta_read_op( $key_name . '_over_size' );
  $headline_over_color = ta_select_color_w_image_color( $key_name . '_over_color' );
  if ( TA_HIEND_PI ) {
    if ( 'left' != $headline_type ) {
      $headline_over_color_grad_onoff = ta_read_op( $key_name . '_over_color_grad_onoff' );
    } else {
      $headline_over_color_grad_onoff = "invalid";
    }
  } else {
    $headline_over_color_grad_onoff = "invalid";
  }
  $headline_under_onoff = ta_read_op( $key_name . '_under_onoff' );
  $headline_under_kind = ta_read_op( $key_name . '_under_kind' );
  $headline_under_size = ta_read_op( $key_name . '_under_size' );
  $headline_under_color = ta_select_color_w_image_color( $key_name . '_under_color' );
  if ( TA_HIEND_PI ) {
    $headline_under_color_grad_onoff = ta_read_op( $key_name . '_under_color_grad_onoff' );
  } else {
    $headline_under_color_grad_onoff = "invalid";
  }
  $headline_box_color = ta_select_color_w_image_color( $key_name . '_box_color' );
  if ( TA_HIEND_PI ) {
    $headline_box_color_grad_onoff = ta_read_op( $key_name . '_box_color_grad_onoff' );
  } else {
    $headline_box_color_grad_onoff = "invalid";
  }
  $headline_box_round = ta_read_op( $key_name . '_box_round' );
  $headline_arrow_direction1 = ta_read_op( $key_name . '_arrow_direction1' );
  $headline_arrow_size1 = round( 15 * ta_read_op( $key_name . '_arrow_size1' ) / 100 );
  $headline_arrow_position1 = ta_read_op( $key_name . '_arrow_position1' );
  $headline_arrow_direction2 = ta_read_op( $key_name . '_arrow_direction2' );
  $headline_arrow_size2 = ta_read_op( $key_name . '_arrow_size2' );
  $headline_padding_top = ta_read_op( $key_name . '_padding_top' );
  $headline_padding_bottom = ta_read_op( $key_name . '_padding_bottom' );
  $headline_margin_top = ta_read_op( $key_name . '_margin_top' );
  $headline_margin_bottom = ta_read_op( $key_name . '_margin_bottom' );
  $headline_colorhover = ta_select_color_w_image_color( $key_name . '_colorhover' );
  $headline_font_style_onoff = ta_read_op( $key_name . '_font_style_onoff' );
  $headline_font_underline = ( 'valid' == ta_read_op( $key_name . '_font_ul_onoff' ) ) ? 'underline' : 'none';
  $headline_font_hoverunderline = ( 'valid' == ta_read_op( $key_name . '_font_hoverul_onoff' ) ) ? 'underline' : 'none';
  if ( TA_HIEND_PI ) {
    $headline_dec_pic = ta_read_op( $key_name . '_dec_pic' );
    $headline_pic_position = ta_read_op( $key_name . '_pic_position' );
    $headline_pic_repeat_onoff = ( 'valid' == ta_read_op( $key_name . '_pic_repeat_onoff' ) ) ? 'repeat-x' : 'no-repeat';
  } else {
    $headline_dec_pic = 'no_image';
    $headline_pic_position = 'back';
    $headline_pic_repeat_onoff = 'no-repeat';
  } ?>
  <style type="text/css">
  <!--
    #headline-confirm-container {
      width: 95%;
      background-color: #ffffff;
      padding: 1em;
    }
    
    <?php echo $factor_name . '.' . $classname; ?>::before {
      top: auto;
      bottom: auto;
      left: auto;
      right: auto;
      position: static;
      content: normal;
      margin: auto;
      display: inline;
      width: auto;
      height: auto;
      background: none;
      border-radius: 0;
      all: initial;
      font-size: 100%;
    }
    
    <?php echo $factor_name . '.' . $classname; ?> {
      width: auto;
      box-sizing: border-box;
      position: static;
      vertical-align: baseline;
      text-align: left;
      border: none;
      background: none;
      border-radius: 0;
      box-shadow: none;
      margin: 0;
      padding: 0;
      outline: 0;
      font-size: 100%;
      text-decoration: none;
      text-shadow: none;
      all: initial;
      display: block;
    }
    
    <?php echo $factor_name . '.' . $classname; ?> a,
    <?php echo $factor_name . '.' . $classname; ?> a:hover {
      margin: 0;
      padding: 0;
      outline: 0;
      font-size: 100%;
      vertical-align: baseline;
      background: transparent;
      text-decoration: none;
      border: none;
      box-shadow: none;
      text-shadow: none;
    }
    
    <?php echo $factor_name . '.' . $classname; ?>::after {
      top: auto;
      bottom: auto;
      left: auto;
      right: auto;
      content: normal;
      position: static;
      display: inline;
      width: auto;
      height: auto;
      border: none;
      margin: auto;
      background: none;
      border-radius: 0;
      all: initial;
      font-size: 100%;
    }
    
    <?php echo $factor_name . '.' . $classname; ?> {
<?php
  if ( 'no_image' != $headline_dec_pic && 'back' ==$headline_pic_position ) { ?>
      background-image: url(<?php echo $headline_dec_pic; ?>);
<?php
  } ?>
      margin: 0;
      padding: 0;
      border: none;
      font-size: <?php echo $headline_size; ?>px;
      line-height: <?php echo $headline_hl_lineheight; ?>em;
      min-height: <?php echo $headline_hl_lineheight; ?>em;
<?php
  if ( 'valid' == $headline_centering ) { ?>
      text-align: center;
<?php
  }
  if ( 'left' == $headline_type && 'valid' == $headline_left_color_grad_onoff ) { ?>
      padding-left: <?php echo $headline_position; ?>%;
      padding-left: -webkit-calc(<?php echo $headline_position; ?>% + <?php echo $headline_left_size; ?>px);
      padding-left: calc(<?php echo $headline_position; ?>% + <?php echo $headline_left_size; ?>px);
<?php
  } else { ?>
      padding-left: <?php echo $headline_position; ?>%;
<?php
  } ?>
      width: <?php echo ( 80 - round( $headline_position  / 2 ) ); ?>%;
      font-weight: <?php echo $headline_weight; ?>;
      padding-top: <?php echo $headline_padding_top; ?>px;
      padding-bottom: <?php echo $headline_padding_bottom; ?>px;
      margin-top: <?php echo $headline_margin_top; ?>px;
      margin-bottom: <?php echo $headline_margin_bottom; ?>px;
<?php
  if ( 'left' == $headline_type ) {
    if ( 'invalid' == $headline_left_color_grad_onoff ) { ?>
      border-left: <?php echo $headline_left_size; ?>px solid <?php echo $headline_left_color; ?>;
<?php
    } else { ?>
      position: relative;
<?php
    }
  }
  if ( 'simple' == $headline_type || 'left' == $headline_type || 'box' == $headline_type ) {
    if ( 'valid' == $headline_under_onoff ) {
      if ( 'invalid' == $headline_under_color_grad_onoff ) { ?>
      border-bottom: <?php echo $headline_under_size; ?>px <?php echo $headline_under_kind; ?> <?php echo $headline_under_color; ?>;
<?php
      } else { ?>
      position: relative;
<?php
      }
    }
    if ( 'valid' == $headline_over_onoff ) {
      if ( 'invalid' == $headline_over_color_grad_onoff ) { ?>
      border-top: <?php echo $headline_over_size; ?>px <?php echo $headline_over_kind; ?> <?php echo $headline_over_color; ?>;
<?php
      } else { ?>
      position: relative;
<?php
      }
    }
  }
  /* Box */
  if ( 'simple' != $headline_type && 'left' != $headline_type ) { ?>
      width: <?php echo ( 80 - round( $headline_position  / 2 ) ); ?>%;
      position: relative;
      display: inline-block;
      vertical-align: bottom;
<?php
    if ( 'invalid' == $headline_box_color_grad_onoff ) { ?>
      background-color: <?php echo $headline_box_color; ?>;
<?php
    } else {
      if ( 'back' == $headline_pic_position ) {
        ta_confirm_gradient_color_style( $key_name . '_box_color', $headline_dec_pic );
      } else {
        ta_confirm_gradient_color_style( $key_name . '_box_color' );
      }
    } ?>
      border-radius: <?php echo $headline_box_round; ?>px;
<?php
  } ?>
    }
    
    <?php
  // over
  $over_grad_cond = ( ( 'simple' == $headline_type || 'box' == $headline_type ) && 'valid' == $headline_over_color_grad_onoff && 'valid' == $headline_over_onoff ); //上線がグラデーションである条件
  if ( $over_grad_cond ) {
    echo $factor_name . '.' . $classname; ?>::before {
      content: "";
      position: absolute;
      display: block;
      width: 100%;
      height: <?php echo $headline_over_size; ?>px;
      top: -<?php echo $headline_over_size; ?>px;
      left: 0;
      <?php ta_confirm_gradient_color_style( $key_name . '_over_color' ); ?>
    }

    <?php
  }
  // under
  if ( ( 'simple' == $headline_type || 'left' == $headline_type || 'box' == $headline_type ) && 'valid' == $headline_under_color_grad_onoff && 'valid' == $headline_under_onoff ) {
    echo $factor_name . '.' . $classname; ?>::after {
      content: "";
      position: absolute;
      display: block;
      width: 100%;
      height: <?php echo $headline_under_size; ?>px;
      bottom: -<?php echo $headline_under_size; ?>px;
      left: 0;
      <?php ta_confirm_gradient_color_style( $key_name . '_under_color' ); ?>
    }

    <?php
  }
  // left
  if ( 'left' == $headline_type && 'valid' == $headline_left_color_grad_onoff ) {
    echo $factor_name . '.' . $classname; ?>::before {
      content: "";
      position: absolute;
      display: block;
      width: <?php echo $headline_left_size; ?>px;
      height: <?php echo $headline_hl_lineheight; ?>em;
      padding-top: <?php echo $headline_padding_top; ?>px;
      padding-bottom: <?php echo $headline_padding_bottom; ?>px;
      top: 0;
      left: 0;
      <?php ta_confirm_gradient_color_style( $key_name . '_left_color' ); ?>
    }

    <?php
  }
    /* Arrow for balloon1*/
  if ( 'balloon1' == $headline_type ) {
    echo $factor_name . '.' . $classname; ?>:after {
      content: "";
      position: absolute;
      display: block;
      width: 0px;
      height: 0px;
      border-style: solid;
<?php
    if ( 'top' == $headline_arrow_direction1 ) { ?>
      top: -<?php echo $headline_arrow_size1; ?>px; left: <?php echo $headline_arrow_position1; ?>%;
      margin-left: -<?php echo $headline_arrow_size1; ?>px;
      border-width: 0 <?php echo $headline_arrow_size1; ?>px <?php echo $headline_arrow_size1; ?>px <?php echo $headline_arrow_size1; ?>px;
      border-color: transparent transparent <?php echo $headline_box_color; ?> transparent;
<?php
    } else if ( 'left' == $headline_arrow_direction1 ) { ?>
      top: 50%; left: -<?php echo $headline_arrow_size1; ?>px;
      margin-top: -<?php echo $headline_arrow_size1; ?>px;
      border-width: <?php echo $headline_arrow_size1; ?>px <?php echo $headline_arrow_size1; ?>px <?php echo $headline_arrow_size1; ?>px 0;
      border-color: transparent <?php echo $headline_box_color; ?> transparent transparent;
<?php
    } else if ( 'bottom' == $headline_arrow_direction1 ) { ?>
      bottom: -<?php echo $headline_arrow_size1; ?>px; left: <?php echo $headline_arrow_position1; ?>%;
      margin-left: -<?php echo $headline_arrow_size1; ?>px;
      border-width: <?php echo $headline_arrow_size1; ?>px <?php echo $headline_arrow_size1; ?>px 0 <?php echo $headline_arrow_size1; ?>px;
      border-color: <?php echo $headline_box_color; ?> transparent transparent transparent;
<?php
    } else if ( 'right' == $headline_arrow_direction1 ) { ?>
      top: 50%; right: -<?php echo $headline_arrow_size1; ?>px;
      margin-top: -<?php echo $headline_arrow_size1; ?>px;
      border-width: <?php echo $headline_arrow_size1; ?>px 0 <?php echo $headline_arrow_size1; ?>px <?php echo $headline_arrow_size1; ?>px;
      border-color: transparent transparent transparent <?php echo $headline_box_color; ?>;
<?php
    } ?>
    }
    
    <?php
  }
  /* Arrow for balloon2*/
  if ( 'balloon2' == $headline_type ) {
    echo $factor_name . '.' . $classname; ?>:before {
      content: "";
      position: absolute;
      display: block;
      width: <?php echo round( 15 * $headline_arrow_size2 / 100 ); ?>px;
      height: <?php echo round( 15 * $headline_arrow_size2 / 100 ); ?>px;
      background: <?php echo $headline_box_color; ?>;
      border-radius: 50%;
<?php
    if ( 'right-top' == $headline_arrow_direction2 ) { ?>
      top: <?php echo round( -17 * $headline_arrow_size2 / 100 ); ?>px; right: <?php echo round( 15 * $headline_arrow_size2 / 100 ); ?>px;
<?php
    } else if ( 'left-top' == $headline_arrow_direction2 ) { ?>
      top: <?php echo round( -17 * $headline_arrow_size2 / 100 ); ?>px; left: <?php echo round( 15 * $headline_arrow_size2 / 100 ); ?>px;
<?php
    } else if ( 'right-bottom' == $headline_arrow_direction2 ) { ?>
      bottom: <?php echo round( -17 * $headline_arrow_size2 / 100 ); ?>px; right: <?php echo round( 15 * $headline_arrow_size2 / 100 ); ?>px;
<?php
    } else if ( 'left-bottom' == $headline_arrow_direction2 ) { ?>
      bottom: <?php echo round( -17 * $headline_arrow_size2 / 100 ); ?>px; left: <?php echo round( 15 * $headline_arrow_size2 / 100 ); ?>px;
<?php
    } ?>
    }
    
    <?php
  }
  if ( 'balloon2' == $headline_type ) {
    echo $factor_name . '.' . $classname; ?>:after {
      content: "";
      position: absolute;
      display: block;
      width: <?php echo round( 8 * $headline_arrow_size2 / 100 ); ?>px;
      height: <?php echo round( 8 * $headline_arrow_size2 / 100 ); ?>px;
      background: <?php echo $headline_box_color; ?>;
      border-radius: 50%;
<?php
    if ( 'right-top' == $headline_arrow_direction2 ) { ?>
      top: <?php echo round( -25 * $headline_arrow_size2 / 100 ); ?>px; right: <?php echo round( 25 * $headline_arrow_size2 / 100 ); ?>px;
<?php
    } else if ( 'left-top' == $headline_arrow_direction2 ) { ?>
      top: <?php echo round( -25 * $headline_arrow_size2 / 100 ); ?>px; left: <?php echo round( 25 * $headline_arrow_size2 / 100 ); ?>px;
<?php
    } else if ( 'right-bottom' == $headline_arrow_direction2 ) { ?>
      bottom: <?php echo round( -25 * $headline_arrow_size2 / 100 ); ?>px; right: <?php echo round( 25 * $headline_arrow_size2 / 100 ); ?>px;
<?php
    } else if ( 'left-bottom' == $headline_arrow_direction2 ) { ?>
      bottom: <?php echo round( -25 * $headline_arrow_size2 / 100 ); ?>px; left: <?php echo round( 25 * $headline_arrow_size2 / 100 ); ?>px;
<?php
    } ?>
    }
    
    <?php
  }
  if ( 'no_image' != $headline_dec_pic && 'back' == $headline_pic_position ) {
    echo $factor_name . '.' . $classname; ?> {
      background-repeat: <?php echo $headline_pic_repeat_onoff; ?>;
    }
    
    <?php
  }
  if ( 'invalid' == $headline_font_style_onoff ) {
    echo $factor_name . '.' . $classname; ?> {
      color: <?php echo $headline_color; ?>;
    }
    
    <?php echo $factor_name . '.' . $classname; ?> a {
      color: <?php echo $headline_linkedcolor; ?>;
      text-decoration: <?php echo $headline_font_underline; ?>;
    }
    
    <?php echo $factor_name . '.' . $classname; ?> a:hover {
      color: <?php echo $headline_colorhover; ?>;
      text-decoration: <?php echo $headline_font_hoverunderline; ?>;
    }
    
    <?php
  } else {
    echo $factor_name . '.' . $classname; ?> {
      color: <?php echo ta_select_color_w_image_color( 'ta_common_font_color' ); ?>;
    }
    
    <?php echo $factor_name . '.' . $classname; ?> a {
      color: <?php echo ta_read_op( 'ta_common_font_anchor_color' ); ?>;
      text-decoration: <?php echo ( 'valid' == ta_read_op( 'ta_common_font_anchor_under' ) ) ? 'underline' : 'none'; ?>;
    }
    
    <?php echo $factor_name . '.' . $classname; ?> a:hover {
      color: <?php echo ta_read_op( 'ta_common_font_anchor_colorhover' ); ?>;
      text-decoration: <?php echo ( 'valid' == ta_read_op( 'ta_common_font_anchor_underhover' ) ) ? 'underline' : 'none'; ?>;
    }
    
    <?php
  }
  $headline_bpic_rmargin = ta_read_op( $key_name . '_bpic_rmargin' );
  $headline_bpic_toppos = ta_read_op( $key_name . '_bpic_toppos' );
  if ( ( 'no_image' != $headline_dec_pic && 'before' == $headline_pic_position ) && ! ( $over_grad_cond || 'balloon2' == $headline_type ) ) {
  echo $factor_name . '.' . $classname; ?>::before {
      position: relative;
      content: url(<?php echo $headline_dec_pic; ?>);
      top: <?php echo $headline_bpic_toppos; ?>em;
      margin-right: <?php echo $headline_bpic_rmargin; ?>em;
    }
<?php
  } ?>
  -->
  </style>
<?php
}

//グラデーション関するスタイル
function ta_confirm_gradient_color_style( $keyname, $imgurl = 'no_image' ) {
  $direct = ta_read_op( $keyname . '_grd_direct' );
  $start_color = ta_select_color_w_image_color( $keyname . '_grd_start_color' );
  $mid_onoff = ta_read_op( $keyname . '_grd_mid_color_onoff' );
  $mid_pos = ta_read_op( $keyname . '_grd_mid_color_pos' );
  if ( $mid_pos < 0 ) { $mid_pos = 0; } else if ( $mid_pos > 100 ) { $mid_pos = 100; }
  $mid_color = ta_select_color_w_image_color( $keyname . '_grd_mid_color' );
  if ( 'valid' == $mid_onoff ) { $mid_info = $mid_color . ' ' . $mid_pos . '%, '; } else { $mid_info = ''; }
  $stop_color = ta_select_color_w_image_color( $keyname . '_grd_stop_color' );
  switch ( $direct ) {
    case 'bottom':
      $new_direct = 'top';
      $direct_num = 0;
      $new_start_color = $start_color;
      $new_stop_color = $stop_color;
      break;
    case 'top':
      $new_direct = 'bottom';
      $direct_num = 0;
      $new_start_color = $stop_color;
      $new_stop_color = $start_color;
      break;
    case 'right':
      $new_direct = 'left';
      $direct_num = 1;
      $new_start_color = $start_color;
      $new_stop_color = $stop_color;
      break;
    case 'left':
      $new_direct = 'right';
      $direct_num = 1;
      $new_start_color = $stop_color;
      $new_stop_color = $start_color;
      break;
    default:
      $new_direct = 'top';
      $direct_num = 0;
      $new_start_color = $start_color;
      $new_stop_color = $stop_color;
  }
  if ( 'no_image' != $imgurl ) { ?>
  background-image: url("<?php echo $imgurl; ?>");
  background: url("<?php echo $imgurl; ?>"), -ms-linear-gradient(<?php echo $new_direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%);
  background: url("<?php echo $imgurl; ?>"), -o-linear-gradient(<?php echo $new_direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%);
  background: url("<?php echo $imgurl; ?>"), -moz-linear-gradient(<?php echo $new_direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%);
  background: url("<?php echo $imgurl; ?>"), -webkit-linear-gradient(<?php echo $new_direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%);
  background: url("<?php echo $imgurl; ?>"), linear-gradient(to <?php echo $direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%);
<?php
  } else { ?>
  filter: progid:DXImageTransform.Microsoft.Gradient(GradientType=<?php echo $direct_num; ?>, StartColorStr='<?php echo $new_start_color; ?>', EndColorStr='<?php echo $new_stop_color; ?>');
  background: -ms-linear-gradient(<?php echo $new_direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%);
  background: -o-linear-gradient(<?php echo $new_direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%);
  background: -moz-linear-gradient(<?php echo $new_direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%);
  background: -webkit-linear-gradient(<?php echo $new_direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%);
  background: linear-gradient(to <?php echo $direct; ?>, <?php echo $start_color; ?> 0%, <?php echo $mid_info . $stop_color; ?> 100%);
<?php
  }
}


/********* SNSを表示する位置選択に関する共通関数 *********/
function ta_sns_position_selection( $key_name, $common = 'common', $type = "option", $post_id = 0 ) {
  if ( "option" == $type ) {
    $init_value = ta_read_op( $key_name );
  } else if ( "postmeta" == $type ) {
    $init_value = ta_read_post( $post_id, $key_name );
  }
  if ( "common" != $common ) { ?>
  <p><input type="radio" name="<?php echo $key_name; ?>" value="common_style" <?php if ( "common_style" == $init_value ) echo 'checked="checked"' ?>> 共通設定</p>
<?php
  } ?>
  <p><input type="radio" name="<?php echo $key_name; ?>" value="none" <?php if ( "none" == $init_value ) echo 'checked="checked"' ?>> 表示しない</p>
  <p><input type="radio" name="<?php echo $key_name; ?>" value="top" <?php if ( "top" == $init_value ) echo 'checked="checked"' ?>> 1箇所：メインコンテンツ上部</p>
  <p><input type="radio" name="<?php echo $key_name; ?>" value="bottom" <?php if ( "bottom" == $init_value ) echo 'checked="checked"' ?>> 1箇所：メインコンテンツ下部</p>
  <p><input type="radio" name="<?php echo $key_name; ?>" value="top_bottom" <?php if ( "top_bottom" == $init_value ) echo 'checked="checked"' ?>> 2箇所：メインコンテンツ上下部</p>
<?php
}


/********* 要素を選択する共通関数 *********/
function ta_factor_selection_process( $key_name, $meta_type = "option", $post_id = 0, $common_type = "none", $frame_name = "表示フレーム用" ) {
  if ( "option" == $meta_type ) {
    $init_value = ta_read_op( $key_name );
  } else if ( "postmeta" == $meta_type ) {
    $init_value = ta_read_post( $post_id, $key_name );
  }
  if ( "common" == $common_type ) { ?>
  <p><input type="radio" name="<?php echo $key_name; ?>" value="common" <?php if ( "common" == $init_value ) echo 'checked="checked"'; ?>> 共通設定</p>
<?php
  } ?>
  <p><input type="radio" name="<?php echo $key_name; ?>" value="h2" <?php if ( "h2" == $init_value ) echo 'checked="checked"'; ?>> h2 (<?php echo $frame_name; ?>タイトル）</p>
  <p><input type="radio" name="<?php echo $key_name; ?>" value="h3" <?php if ( "h3" == $init_value ) echo 'checked="checked"'; ?>> h3 (<?php echo $frame_name; ?>タイトル）</p>
  <p><input type="radio" name="<?php echo $key_name; ?>" value="h4" <?php if ( "h4" == $init_value ) echo 'checked="checked"'; ?>> h4 (<?php echo $frame_name; ?>タイトル）</p>
  <p><input type="radio" name="<?php echo $key_name; ?>" value="h5" <?php if ( "h5" == $init_value ) echo 'checked="checked"'; ?>> h5 (<?php echo $frame_name; ?>タイトル）</p>
<?php
  if ( '表示フレーム用' == $frame_name ) { ?>
  <p>※ 表示フレームはヘッダー（設定はメインと同様）、メイン、サイドバー、サブサイドバー、フッターのいずれかです。</p>
<?php
  }
}


/********* リンクを処理する共通関数 *********/
function ta_link_process( $key_name, $meta_type = "option", $post_id = 0 ) {
  if ( "option" == $meta_type ) {
    $init_value = ta_read_op( $key_name );
  } else if ( "postmeta" == $meta_type ) {
    $init_value = ta_read_post( $post_id, $key_name );
  } ?>
  <p id="<?php echo $key_name; ?>_info"><?php if ( 'no_link' != $init_value ) { ?>現在の登録リンク先：<?php echo $init_value; } ?></p>
  <p><input id="<?php echo $key_name; ?>" class="long_box" type="text" name="<?php echo $key_name; ?>" value="<?php echo $init_value; ?>" />　<a href="JavaScript:void(0);" onClick="ta_no_link('#<?php echo $key_name; ?>');" >リンク無し</a></p>
<?php
}

function ta_link_process_w_newwin( $key_name, $meta_type = "option", $post_id = 0 ) {
  if ( "option" == $meta_type ) {
    $init_value = ta_read_op( $key_name );
    $init_newwin_value = ta_read_op( $key_name . '_newwin_onoff' );
  } else if ( "postmeta" == $meta_type ) {
    $init_value = ta_read_post( $post_id, $key_name );
    $init_newwin_value = ta_read_post( $post_id, $key_name . '_newwin_onoff' );
  } ?>
  <p id="<?php echo $key_name; ?>_info"><?php if ( 'no_link' != $init_value ) { ?>現在の登録リンク先：<?php echo $init_value; } ?></p>
  <p><input id="<?php echo $key_name; ?>" class="long_box" type="text" name="<?php echo $key_name; ?>" value="<?php echo $init_value; ?>" />　<a href="JavaScript:void(0);" onClick="ta_no_link('#<?php echo $key_name; ?>');" >リンク無し</a>　<input type="checkbox" name="<?php echo $key_name; ?>_newwin_onoff" value="valid" <?php if ( 'valid' == $init_newwin_value ) echo 'checked="checked"'; ?>> 新規ウィンドウで開く</p>
<?php
}

function ta_target_blank( $key_name, $meta_type = "option", $post_id = 0 ) {
  if ( "option" == $meta_type ) {
    $value = ta_read_op( $key_name . '_newwin_onoff' );
  } else if ( "postmeta" == $meta_type ) {
    $value = ta_read_post( $post_id, $key_name . '_newwin_onoff' );
  }
  if ( 'valid' == $value ) {
    echo 'target="_blank"';
  } else {
    echo '';
  }
}

function ta_link_15em_process( $key_name, $meta_type = "option", $post_id = 0 ) {
  if ( "option" == $meta_type ) {
    $init_value = ta_read_op( $key_name );
  } else if ( "postmeta" == $meta_type ) {
    $init_value = ta_read_post( $post_id, $key_name );
  } ?>
  <p id="<?php echo $key_name; ?>_info"><?php if ( 'no_link' != $init_value ) { ?>現在の登録リンク先：<?php echo $init_value; } ?></p>
  <p><input id="<?php echo $key_name; ?>" style="width:13em;" type="text" name="<?php echo $key_name; ?>" value="<?php echo $init_value; ?>" />　<a href="JavaScript:void(0);" onClick="ta_no_link('#<?php echo $key_name; ?>');" >リンク無し</a></p>
<?php
}


/********* 入力共通関数 *********/
//一般入力（htmlエスケープ無し）
function ta_simple_input( $key_name, $unit, $box_type, $meta_type = "option", $post_id = 0 ) {
  if ( "option" == $meta_type ) {
    $init_value = ta_read_op( $key_name );
  } else if ( "postmeta" == $meta_type ) {
    $init_value = ta_read_post( $post_id, $key_name );
  } ?>
  <p><input id="<?php echo $key_name; ?>" class="<?php echo $box_type; ?>" type="text" name="<?php echo $key_name; ?>" value="<?php echo $init_value; ?>" /> <?php echo $unit; ?></p>
<?php
}

//テキスト入力（\マーク削除有り）
function ta_text_input( $key_name, $box_type, $meta_type = "option", $post_id = 0 ) {
  if ( "option" == $meta_type ) {
    $init_value = ta_read_op( $key_name );
  } else if ( "postmeta" == $meta_type ) {
    $init_value = ta_read_post( $post_id, $key_name );
  } ?>
  <p><input id="<?php echo $key_name; ?>" class="<?php echo $box_type; ?>" type="text" name="<?php echo $key_name; ?>" value="<?php ta_deleteyen( $init_value ); ?>" /></p>
<?php
}

//テキスト入力 表示無し表記付き（\マーク削除有り）
function ta_text_input_w_nodisp( $key_name, $box_type, $meta_type = "option", $post_id = 0 ) {
  if ( "option" == $meta_type ) {
    $init_value = ta_read_op( $key_name );
  } else if ( "postmeta" == $meta_type ) {
    $init_value = ta_read_post( $post_id, $key_name );
  } ?>
  <p>
    <div class="ta-setting-inline-gp">
      <div class="inline-gp-0" style="margin-right:0.5em;">
        <input id="<?php echo $key_name; ?>" class="<?php echo $box_type; ?>" type="text" name="<?php echo $key_name; ?>" value="<?php ta_deleteyen( $init_value ); ?>" />
      </div>
      <div class="inline-gp-0" style="margin-top:0.7em;">
        <a href="JavaScript:void(0);" onClick="ta_no_disp('#<?php echo $key_name; ?>');" >表示無し</a>
      </div>
    </div>
  </p>
<?php
}

//テキストエリア入力（\マーク削除有り）
function ta_textarea_input( $key_name, $rows, $cols, $meta_type = "option", $post_id = 0 ) {
  if ( "option" == $meta_type ) {
    $init_value = ta_read_op( $key_name );
  } else if ( "postmeta" == $meta_type ) {
    $init_value = ta_read_post( $post_id, $key_name );
  } ?>
  <p><textarea id="<?php echo $key_name; ?>" name="<?php echo $key_name; ?>" rows="<?php echo $rows; ?>" cols="<?php echo $cols; ?>"><?php ta_deleteyen( $init_value ); ?></textarea></p>
<?php
}


/********* 有効無効二者択一共通関数 *********/
function ta_alternative_input( $key_name, $valid_name, $invalid_name, $meta_type = "option", $common_type = "none", $post_id = 0 ) {
  if ( "option" == $meta_type ) {
    $init_value = ta_read_op( $key_name );
  } else if ( "postmeta" == $meta_type ) {
    $init_value = ta_read_post( $post_id, $key_name );
  }
  if ( "common" == $common_type ) { ?>
  <p><input type="radio" name="<?php echo $key_name; ?>" value="common" <?php if ( "common" == $init_value ) echo 'checked="checked"' ?>> 共通設定</p>
<?php
  } ?>
  <p><input type="radio" name="<?php echo $key_name; ?>" value="valid" <?php if ( "valid" == $init_value ) echo 'checked="checked"' ?>> <?php echo $valid_name; ?></p>
  <p><input type="radio" name="<?php echo $key_name; ?>" value="invalid" <?php if ( "invalid" == $init_value ) echo 'checked="checked"'; ?>> <?php echo $invalid_name; ?></p>
<?php
}

function ta_alternative_input_checkbox( $key_name, $valid_name, $meta_type = 'option', $post_id = 0 ) {
  if ( "option" == $meta_type ) {
    $value = ta_read_op( $key_name );
  } else if ( "postmeta" == $meta_type ) {
    $value = ta_read_post( $post_id, $key_name );
  } ?>
  <p><input id="<?php echo $key_name; ?>" type="checkbox" name="<?php echo $key_name; ?>" value="valid" <?php if ( 'valid' == $value ) echo 'checked="checked"'; ?>> <?php echo $valid_name; ?></p>
<?php
}

function ta_alternative_input_checkbox_hidden( $key_name, $meta_type = 'option', $post_id = 0 ) {
  if ( "option" == $meta_type ) {
    $value = ta_read_op( $key_name );
  } else if ( "postmeta" == $meta_type ) {
    $value = ta_read_post( $post_id, $key_name );
  }
  if ( 'valid' == $value ) { ?>
  <input id="<?php echo $key_name; ?>" type="hidden" name="<?php echo $key_name; ?>" value="valid">
<?php
  }
}


/********* 基本パーツ表示の共通設定関数 *********/
function ta_parts_select_checkboxes( $key_name, $meta_type = 'option', $common_type = "none", $post_id = 0 ) {
  if ( "option" == $meta_type ) {
    $banner_area = ta_read_op( $key_name . '_banner_onoff' );
    $header_img = ta_read_op( $key_name . '_image_onoff' );
    $global_menu = ta_read_op( $key_name . '_global_onoff' );
    $bread_menu = ta_read_op( $key_name . '_bread_onoff' );
  } else if ( "postmeta" == $meta_type ) {
    $common_value = ta_read_post( $post_id, $key_name . '_common_onoff' );
    $banner_area = ta_read_post( $post_id, $key_name . '_banner_onoff' );
    $header_img = ta_read_post( $post_id, $key_name . '_image_onoff' );
    $global_menu = ta_read_post( $post_id, $key_name . '_global_onoff' );
    $bread_menu = ta_read_post( $post_id, $key_name . '_bread_onoff' );
  }
  if ( "common" == $common_type ) { ?>
  <h4>body背景画表示の設定</h4>
<?php
    ta_alternative_input( $key_name . '_bgimg_onoff', '非表示', '表示', 'postmeta', 'common', $post_id );
  } else { ?>
  <h4>body背景画表示の共通設定</h4>
<?php
    ta_alternative_input_checkbox( $key_name . '_bgimg_onoff', 'body背景画を非表示にする' );
  } ?>
  <span class="fixed-space"></span>
  <hr class="fixed-border">
<?php
  if ( "common" == $common_type ) { ?>
  <h4>ヘッダー部表示の設定</h4>
  <p><input type="radio" name="<?php echo $key_name . '_common_onoff'; ?>" value="valid" <?php if ( "valid" == $common_value ) echo 'checked="checked"' ?>> 共通設定</p>
  <p><input type="radio" name="<?php echo $key_name . '_common_onoff'; ?>" value="invalid" <?php if ( "invalid" == $common_value ) echo 'checked="checked"' ?>> カスタマイズ（下記の設定が有効になります）</p>
  <span class="fixed-space"></span>
<?php
  } else { ?>
  <h4>ヘッダー部表示の共通設定</h4>
<?php
  } ?>
  <p><input type="checkbox" name="<?php echo $key_name . '_banner_onoff'; ?>" value="valid" <?php if ( 'valid' == $banner_area ) echo 'checked="checked"'; ?>> バナーエリアを非表示にする</p>
  <p><input type="checkbox" name="<?php echo $key_name . '_image_onoff'; ?>" value="valid" <?php if ( 'valid' == $header_img ) echo 'checked="checked"'; ?>> ヘッダー画像部を非表示にする</p>
  <p><input type="checkbox" name="<?php echo $key_name . '_global_onoff'; ?>" value="valid" <?php if ( 'valid' == $global_menu ) echo 'checked="checked"'; ?>> グローバルメニューを非表示にする</p>
  <p><input type="checkbox" name="<?php echo $key_name . '_bread_onoff'; ?>" value="valid" <?php if ( 'valid' == $bread_menu ) echo 'checked="checked"'; ?>> パンくずナビを非表示にする</p>
  <span class="fixed-space"></span>
  <hr class="fixed-border">
<?php
  if ( "common" == $common_type ) { ?>
  <h4>ページタイトル表示の設定</h4>
<?php
    ta_alternative_input( $key_name . '_title_onoff', '非表示', '表示', 'postmeta', 'common', $post_id );
  } else { ?>
  <h4>ページタイトル表示の共通設定</h4>
<?php
    ta_alternative_input_checkbox( $key_name . '_title_onoff', 'タイトルを非表示にする' );
  } ?>
  <p>※ ページタイトルの要素はメイン用h2です</p>
  <span class="fixed-space"></span>
  <hr class="fixed-border">
<?php
  if ( "common" == $common_type ) { ?>
  <h4>フッター部表示の設定</h4>
<?php
    ta_alternative_input( $key_name . '_footer_onoff', '非表示', '表示', 'postmeta', 'common', $post_id );
  } else { ?>
  <h4>フッター部表示の共通設定</h4>
<?php
    ta_alternative_input_checkbox( $key_name . '_footer_onoff', '非表示にする' );
  }
}


/********* 字の太さの選択共通関数 *********/
function ta_fontweight_selection( $key_name ) {
  $init_value = ta_read_op( $key_name ); ?>
  <p><input type="radio" name="<?php echo $key_name; ?>" value="normal" <?php if ( "normal" == $init_value ) echo 'checked="checked"'; ?>> 標準</p>
  <p><input type="radio" name="<?php echo $key_name; ?>" value="bold" <?php if ( "bold" == $init_value ) echo 'checked="checked"'; ?>> 太字（bold）</p>
<?php
}


/********* 字の太さの選択共通関数（post_idタイプ）*********/
function ta_fontweight_selection_posttype( $key_name, $post_id ) {
  $init_value = ta_read_post( $post_id, $key_name ); ?>
  <p><input type="radio" name="<?php echo $key_name; ?>" value="normal" <?php if ( "normal" == $init_value ) echo 'checked="checked"'; ?>> 標準</p>
  <p><input type="radio" name="<?php echo $key_name; ?>" value="bold" <?php if ( "bold" == $init_value ) echo 'checked="checked"'; ?>> 太字（bold）</p>
<?php
}


/********* 画像位置と繰り返しルール共通関数 *********/
function ta_image_position_rule( $key_name ) {
  $init_value = ta_read_op( $key_name ); ?>
  <p><input type="radio" name="<?php echo $key_name; ?>" value="top_x" <?php if ( "top_x" == $init_value ) echo 'checked="checked"' ?>> 上部x方向繰り返し</p>
  <p><input type="radio" name="<?php echo $key_name; ?>" value="bottom_x" <?php if ( "bottom_x" == $init_value ) echo 'checked="checked"'; ?>> 下部x方向繰り返し</p>
  <p><input type="radio" name="<?php echo $key_name; ?>" value="top_only" <?php if ( "top_only" == $init_value ) echo 'checked="checked"'; ?>> 上部中央繰り返し無し</p>
  <p><input type="radio" name="<?php echo $key_name; ?>" value="bottom_only" <?php if ( "bottom_only" == $init_value ) echo 'checked="checked"'; ?>> 下部中央繰り返し無し</p>
  <p><input type="radio" name="<?php echo $key_name; ?>" value="x_y" <?php if ( "x_y" == $init_value ) echo 'checked="checked"'; ?>> x方向y方向繰り返し</p>
<?php
}


/********* リンク付テキスト共通設定関数 *********/
function ta_linkedtext_setting( 
  $text_name,
  $text_color_key, $text_color_key_w_tomei,
  $text_underline_key,
  $hover_color_key, $hover_color_key_w_tomei,
  $hover_underline_key,
  $tablewidth=40 ) { ?>
  <table class="ta-2contents-table"<?php if ( 40 != $tablewidth ) { echo ' style="width:' . $tablewidth . 'em;"'; } ?>>
    <tr>
      <td>
        <h4><?php echo $text_name; ?>色</h4>
<?php
  if ( 'valid' == $text_color_key_w_tomei ) {
    ta_color_picker_process( $text_color_key, 'valid' );
  } else {
    ta_color_picker_no_tomei_process( $text_color_key, 'valid' );
  } ?>
      </td>
      <td>
        <h4><?php echo $text_name; ?>下線</h4>
        <?php ta_alternative_input_checkbox( $text_underline_key, '表示する' ); ?>
      </td>
    </tr>
  </table>
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <table class="ta-2contents-table"<?php if ( 40 != $tablewidth ) { echo ' style="width:' . $tablewidth . 'em;"'; } ?>>
    <tr>
      <td>
        <h4>HOVER時の<br><?php echo $text_name; ?>色</h4>
<?php
  if ( 'valid' == $hover_color_key_w_tomei ) {
    ta_color_picker_process( $hover_color_key, 'valid' );
  } else {
    ta_color_picker_no_tomei_process( $hover_color_key, 'valid' );
  } ?>
      </td>
      <td>
        <h4>HOVER時の<br><?php echo $text_name; ?>下線</h4>
        <?php ta_alternative_input_checkbox( $hover_underline_key, '表示する' ); ?>
      </td>
    </tr>
  </table>
<?php
}


/********* カテゴリー編集に項目を追加（削除）する関数 *********/
//'category_add_form_fields': Runs when category add form is cerated in admin. Useful to add a field in this form before the submit button
add_action ( 'category_add_form_fields', 'ta_add_category_fields'); 
function ta_add_category_fields( $taxonomy ) {
  if ( 'category' == $taxonomy ) { //タクソノミーがカテゴリーの時のみ有効 ?>
  <hr class="fixed-border">
  <div class="ta-manual-info" style="margin-bottom:1em;"><a href="http://theme001.tec-aid.com/thm001_manual_p2/thm001_manual_basicope_p2#cat_use" target="_blank"><span class="dashicons dashicons-editor-help"></span></a></div>
  <div class="form-field ta-precatform-setting">
    <label for="ta_cat_sitemap">テックエイドサイトマップ表示</label>
    <p><input type="checkbox" name="ta_cat_sitemap" value="valid" > テックエイドサイトマップの表示から除外する</p>
    <p>　</p>
  </div>
  <div class="form-field ta-precatform-setting">
    <label for="ta_cat_bg_color">カテゴリー背景カラー設定</label>
    <p><input id="ta_cat_bg_color" type="text" name="ta_cat_bg_color" class="color_picker" value="transparent" /></p>
    <p>　</p>
  </div>
  <div class="form-field ta-precatform-setting">
    <label for="ta_cat_text_color">カテゴリーテキストカラー設定</label>
    <p><input id="ta_cat_text_color" type="text" name="ta_cat_text_color" class="color_picker" value="#000000" /></p>
    <p>　</p>
  </div>
  <div class="form-field ta-precatform-setting">
    <label for="ta_cat_bgimg_onoff">body背景画表示の設定</label>
    <p><input type="radio" name="ta_cat_bgimg_onoff" value="common" checked="checked"> 共通設定</p>
    <p><input type="radio" name="ta_cat_bgimg_onoff" value="valid"> 非表示</p>
    <p><input type="radio" name="ta_cat_bgimg_onoff" value="invalid"> 表示</p>
    <p>　</p>
  </div>
  <div class="form-field ta-precatform-setting">
    <label for="ta_cat_header_common_onoff">ヘッダー部表示の設定</label>
    <p><input type="radio" name="ta_cat_header_common_onoff" value="valid" checked="checked"> 共通設定</p>
    <p><input type="radio" name="ta_cat_header_common_onoff" value="invalid"> カスタマイズ（下記の設定が有効になります）</p>
    <p>　</p>
    <label for="ta_cat_custom">ヘッダー部表示のカスタム設定</label>
    <p><input type="checkbox" name="ta_cat_banner_onoff" value="valid"> バナーエリアを非表示にする</p>
    <p><input type="checkbox" name="ta_cat_image_onoff" value="valid"> ヘッダー画像部を非表示にする</p>
    <p><input type="checkbox" name="ta_cat_global_onoff" value="valid"> グローバルメニューを非表示にする</p>
    <p><input type="checkbox" name="ta_cat_bread_onoff" value="valid"> パンくずナビを非表示にする</p>
    <p>　</p>
  </div>
  <div class="form-field ta-precatform-setting">
    <label for="ta_cat_title_onoff">タイトル表示の設定</label>
    <p><input type="radio" name="ta_cat_title_onoff" value="common" checked="checked"> 共通設定</p>
    <p><input type="radio" name="ta_cat_title_onoff" value="valid"> 非表示</p>
    <p><input type="radio" name="ta_cat_title_onoff" value="invalid"> 表示</p>
    <p>　</p>
  </div>
  <div class="form-field ta-precatform-setting">
    <label for="ta_cat_footer_onoff">フッター部表示の設定</label>
    <p><input type="radio" name="ta_cat_footer_onoff" value="common" checked="checked"> 共通設定</p>
    <p><input type="radio" name="ta_cat_footer_onoff" value="valid"> 非表示</p>
    <p><input type="radio" name="ta_cat_footer_onoff" value="invalid"> 表示</p>
    <p>　</p>
  </div>
  <div class="form-field ta-precatform-setting">
    <label for="ta_cat_sns_position">一覧ページSNSボタン</label>
    <p><input type="radio" name="ta_cat_sns_position" value="common_style" checked="checked"> 共通設定</p>
    <p><input type="radio" name="ta_cat_sns_position" value="none"> 表示しない</p>
    <p><input type="radio" name="ta_cat_sns_position" value="top"> 1箇所：メインコンテンツ上部</p>
    <p><input type="radio" name="ta_cat_sns_position" value="bottom"> 1箇所：メインコンテンツ下部</p>
    <p><input type="radio" name="ta_cat_sns_position" value="top_bottom"> 2箇所：メインコンテンツ上下部</p>
    <p>　</p>
  </div>
  <div class="form-field ta-precatform-setting">
<?php
    if ( TA_HIEND_PI ) {
      ta_thm001highend_ta_cat_view_limit_setting1();
    } else { ?>
    <h4 class="no-ta-thm001highend" style="padding-left:0.5em;">カテゴリーの閲覧制限設定</h4>
<?php
    } ?>
  </div>
  <div class="form-field ta-precatform-setting">
<?php
    if ( TA_HIEND_PI ) {
      ta_thm001highend_cat_header_img_setting1();
    } else { ?>
    <h4 class="no-ta-thm001highend" style="padding-left:0.5em;">カテゴリーのヘッダー画像</h4>
<?php
    } ?>
  </div>
  <style type="text/css">
<?php
    $categories = get_categories( 'get=all' );
    foreach ( $categories as $category ) {
      $ta_cat_bg_color = ( '' == get_option( '_' . 'ta_cat_bg_color_'. $category->term_id ) ) ? 'transparent' : get_option( '_' . 'ta_cat_bg_color_'. $category->term_id );
      $ta_cat_text_color = ( '' == get_option( '_' . 'ta_cat_text_color_'. $category->term_id ) ) ? '#0073aa' : get_option( '_' . 'ta_cat_text_color_'. $category->term_id ); ?>
    #tag-<?php echo $category->term_id; ?> .name a.row-title {
      background-color: <?php echo $ta_cat_bg_color; ?>;
      color: <?php echo $ta_cat_text_color; ?>;
      padding: 0 5px;
    }
    #tag-<?php echo $category->term_id; ?> .name a.row-title:hover {
      background-color: transparent;
      color: #00a0d2;
    }
<?php
    } ?>
  </style>
<?php
  }
}

//'edit_category_form_fields': Runs when category edit form is opened in admin.
add_action ( 'edit_category_form_fields', 'ta_edit_category_fields');
function ta_edit_category_fields( $tag ) {
  if ( 'category' == $tag->taxonomy ) { //タクソノミーがカテゴリーの時のみ有効
    $ta_cat_sitemap = ( '' == get_option( '_' . 'ta_cat_sitemap_'. $tag->term_id ) ) ? 'invalid' : get_option( '_' . 'ta_cat_sitemap_'. $tag->term_id );
    $ta_cat_bg_color = ( '' == get_option( '_' . 'ta_cat_bg_color_'. $tag->term_id ) ) ? 'transparent' : get_option( '_' . 'ta_cat_bg_color_'. $tag->term_id );
    $ta_cat_text_color = ( '' == get_option( '_' . 'ta_cat_text_color_'. $tag->term_id ) ) ? '#000000' : get_option( '_' . 'ta_cat_text_color_'. $tag->term_id );
    $ta_cat_bgimg_onoff = ( '' == get_option( '_' . 'ta_cat_bgimg_onoff_'. $tag->term_id ) ) ? 'common' : get_option( '_' . 'ta_cat_bgimg_onoff_'. $tag->term_id );
    $ta_cat_header_common_onoff = ( '' == get_option( '_' . 'ta_cat_header_common_onoff_'. $tag->term_id ) ) ? 'valid' : get_option( '_' . 'ta_cat_header_common_onoff_'. $tag->term_id );
    $ta_cat_banner_onoff = ( '' == get_option( '_' . 'ta_cat_banner_onoff_'. $tag->term_id ) ) ? 'invalid' : get_option( '_' . 'ta_cat_banner_onoff_'. $tag->term_id );
    $ta_cat_image_onoff = ( '' == get_option( '_' . 'ta_cat_image_onoff_'. $tag->term_id ) ) ? 'invalid' : get_option( '_' . 'ta_cat_image_onoff_'. $tag->term_id );
    $ta_cat_global_onoff = ( '' == get_option( '_' . 'ta_cat_global_onoff_'. $tag->term_id ) ) ? 'invalid' : get_option( '_' . 'ta_cat_global_onoff_'. $tag->term_id );
    $ta_cat_bread_onoff = ( '' == get_option( '_' . 'ta_cat_bread_onoff_'. $tag->term_id ) ) ? 'invalid' : get_option( '_' . 'ta_cat_bread_onoff_'. $tag->term_id );
    $ta_cat_title_onoff = ( '' == get_option( '_' . 'ta_cat_title_onoff_'. $tag->term_id ) ) ? 'common' : get_option( '_' . 'ta_cat_title_onoff_'. $tag->term_id );
    $ta_cat_footer_onoff = ( '' == get_option( '_' . 'ta_cat_footer_onoff_'. $tag->term_id ) ) ? 'common' : get_option( '_' . 'ta_cat_footer_onoff_'. $tag->term_id );
    $ta_cat_sns_position = ( '' == get_option( '_' . 'ta_cat_sns_position_'. $tag->term_id ) ) ? 'common_style' : get_option( '_' . 'ta_cat_sns_position_'. $tag->term_id ); ?>
  <div class="ta-manual-info" style="margin-bottom:1em;"><a href="http://theme001.tec-aid.com/thm001_manual_p2/thm001_manual_basicope_p2#cat_use" target="_blank"><span class="dashicons dashicons-editor-help"></span></a></div>
  <tr class="form-field ta-catform-setting" style="border-top:1px solid #dddddd;">
    <th><label for="ta_cat_sitemap">テックエイドサイトマップ表示</label></th>
    <td>
      <input type="checkbox" name="ta_cat_sitemap" value="valid" <?php if ( 'valid' == $ta_cat_sitemap ) echo 'checked="checked"'; ?>> テックエイドサイトマップの表示から除外する
    </td>
  </tr>
  <tr class="form-field ta-catform-setting">
    <th><label for="ta_cat_bg_color">カテゴリー背景カラー設定</label></th>
    <td>
      <input id="ta_cat_bg_color" type="text" name="ta_cat_bg_color" class="color_picker" value="<?php echo $ta_cat_bg_color; ?>" />
    </td>
  </tr>
  <tr class="form-field ta-catform-setting">
    <th><label for="ta_cat_text_color">カテゴリーテキストカラー設定</label></th>
    <td>
      <input id="ta_cat_text_color" type="text" name="ta_cat_text_color" class="color_picker" value="<?php echo $ta_cat_text_color; ?>" />
    </td>
  </tr>
  <tr class="form-field ta-catform-setting">
    <th><label for="ta_cat_bgimg_onoff">body背景画表示の設定</label></th>
    <td>
      <p><input type="radio" name="ta_cat_bgimg_onoff" value="common" <?php if ( 'common' == $ta_cat_bgimg_onoff ) echo 'checked="checked"'; ?>> 共通設定</p>
      <p><input type="radio" name="ta_cat_bgimg_onoff" value="valid" <?php if ( 'valid' == $ta_cat_bgimg_onoff ) echo 'checked="checked"'; ?>> 非表示</p>
      <p><input type="radio" name="ta_cat_bgimg_onoff" value="invalid" <?php if ( 'invalid' == $ta_cat_bgimg_onoff ) echo 'checked="checked"'; ?>> 表示</p>
    </td>
  </tr>
  <tr class="form-field ta-catform-setting">
    <th><label for="ta_cat_header_common_onoff">ヘッダー部表示の設定</label></th>
    <td>
      <p><input type="radio" name="ta_cat_header_common_onoff" value="valid" <?php if ( 'valid' == $ta_cat_header_common_onoff ) echo 'checked="checked"'; ?>> 共通設定</p>
      <p><input type="radio" name="ta_cat_header_common_onoff" value="invalid" <?php if ( 'invalid' == $ta_cat_header_common_onoff ) echo 'checked="checked"'; ?>> カスタマイズ（下記の設定が有効になります）</p>
    </td>
  </tr>
  <tr class="form-field ta-catform-setting">
    <th><label for="ta_cat_custom">ヘッダー部表示のカスタム設定</label></th>
    <td>
      <p><input type="checkbox" name="ta_cat_banner_onoff" value="valid" <?php if ( 'valid' == $ta_cat_banner_onoff ) echo 'checked="checked"'; ?>> バナーエリアを非表示にする</p>
      <p><input type="checkbox" name="ta_cat_image_onoff" value="valid" <?php if ( 'valid' == $ta_cat_image_onoff ) echo 'checked="checked"'; ?>> ヘッダー画像部を非表示にする</p>
      <p><input type="checkbox" name="ta_cat_global_onoff" value="valid" <?php if ( 'valid' == $ta_cat_global_onoff ) echo 'checked="checked"'; ?>> グローバルメニューを非表示にする</p>
      <p><input type="checkbox" name="ta_cat_bread_onoff" value="valid" <?php if ( 'valid' == $ta_cat_bread_onoff ) echo 'checked="checked"'; ?>> パンくずナビを非表示にする</p>
    </td>
  </tr>
  <tr class="form-field ta-catform-setting">
    <th><label for="ta_cat_title_onoff">タイトル表示の設定</label></th>
    <td>
      <p><input type="radio" name="ta_cat_title_onoff" value="common" <?php if ( 'common' == $ta_cat_title_onoff ) echo 'checked="checked"'; ?>> 共通設定</p>
      <p><input type="radio" name="ta_cat_title_onoff" value="valid" <?php if ( 'valid' == $ta_cat_title_onoff ) echo 'checked="checked"'; ?>> 非表示</p>
      <p><input type="radio" name="ta_cat_title_onoff" value="invalid" <?php if ( 'invalid' == $ta_cat_title_onoff ) echo 'checked="checked"'; ?>> 表示</p>
    </td>
  </tr>
  <tr class="form-field ta-catform-setting">
    <th><label for="ta_cat_footer_onoff">フッター部表示の設定</label></th>
    <td>
      <p><input type="radio" name="ta_cat_footer_onoff" value="common" <?php if ( 'common' == $ta_cat_footer_onoff ) echo 'checked="checked"'; ?>> 共通設定</p>
      <p><input type="radio" name="ta_cat_footer_onoff" value="valid" <?php if ( 'valid' == $ta_cat_footer_onoff ) echo 'checked="checked"'; ?>> 非表示</p>
      <p><input type="radio" name="ta_cat_footer_onoff" value="invalid" <?php if ( 'invalid' == $ta_cat_footer_onoff ) echo 'checked="checked"'; ?>> 表示</p>
    </td>
  </tr>
  <tr class="form-field ta-catform-setting">
    <th><label for="ta_cat_sns_position">一覧ページSNSボタン</label></th>
    <td>
      <p><input type="radio" name="ta_cat_sns_position" value="common_style" <?php if ( 'common_style' == $ta_cat_sns_position ) echo 'checked="checked"'; ?>> 共通設定</p>
      <p><input type="radio" name="ta_cat_sns_position" value="none" <?php if ( 'none' == $ta_cat_sns_position ) echo 'checked="checked"'; ?>> 表示しない</p>
      <p><input type="radio" name="ta_cat_sns_position" value="top" <?php if ( 'top' == $ta_cat_sns_position ) echo 'checked="checked"'; ?>> 1箇所：メインコンテンツ上部</p>
      <p><input type="radio" name="ta_cat_sns_position" value="bottom" <?php if ( 'bottom' == $ta_cat_sns_position ) echo 'checked="checked"'; ?>> 1箇所：メインコンテンツ下部</p>
      <p><input type="radio" name="ta_cat_sns_position" value="top_bottom" <?php if ( 'top_bottom' == $ta_cat_sns_position ) echo 'checked="checked"'; ?>> 2箇所：メインコンテンツ上下部</p>
    </td>
  </tr>
  <tr class="form-field ta-catform-setting">
<?php
    if ( TA_HIEND_PI ) {
      ta_thm001highend_ta_cat_view_limit_setting2( $tag );
    } else { ?>
    <th><h4 style="color:#bbbbbb;">カテゴリーの閲覧制限設定</h4></th>
    <td class="no-ta-thm001highend-yoko"></td>
<?php
    } ?>
  </tr>
<?php
    if ( TA_HIEND_PI ) {
      ta_thm001highend_cat_header_img_setting2( $tag );
    } else { ?>
  <tr class="form-field ta-catform-setting">
    <th><h4 style="color:#bbbbbb;">カテゴリーのヘッダー画像</h4></th>
    <td class="no-ta-thm001highend-yoko"></td>
  </tr>
<?php
    }
  }
}

add_action ( 'create_category', 'ta_update_private_category_fileds'); //カテゴリーが新規作成された際に実行される
add_action ( 'edited_term', 'ta_update_private_category_fileds');     //カテゴリーが編集された際に実行される
function ta_update_private_category_fileds( $term_id ) {
  $current_term = get_term( $term_id );
  if ( 'category' == $current_term->taxonomy ) {  //タクソノミーがカテゴリーの時のみ有効
    //共通key名で受けたデータをID付きのkey名に書き込む
    if ( isset( $_POST['ta_cat_sitemap'] ) ) { update_option( '_ta_cat_sitemap_'. $term_id, 'valid' ); } else { update_option( '_ta_cat_sitemap_'. $term_id, 'invalid' ); }
    if ( isset( $_POST['ta_cat_bg_color'] ) ) { update_option( '_ta_cat_bg_color_'. $term_id, $_POST['ta_cat_bg_color'] ); }
    if ( isset( $_POST['ta_cat_text_color'] ) ) { update_option( '_ta_cat_text_color_'. $term_id, $_POST['ta_cat_text_color'] ); }
    if ( isset( $_POST['ta_cat_bgimg_onoff'] ) ) { update_option( '_ta_cat_bgimg_onoff_'. $term_id, $_POST['ta_cat_bgimg_onoff'] ); }
    if ( isset( $_POST['ta_cat_header_common_onoff'] ) ) { update_option( '_ta_cat_header_common_onoff_'. $term_id, $_POST['ta_cat_header_common_onoff'] ); }
    if ( isset( $_POST['ta_cat_banner_onoff'] ) ) { update_option( '_ta_cat_banner_onoff_'. $term_id, 'valid' ); } else { update_option( '_ta_cat_banner_onoff_'. $term_id, 'invalid' ); }
    if ( isset( $_POST['ta_cat_image_onoff'] ) ) { update_option( '_ta_cat_image_onoff_'. $term_id, 'valid' ); } else { update_option( '_ta_cat_image_onoff_'. $term_id, 'invalid' ); }
    if ( isset( $_POST['ta_cat_global_onoff'] ) ) { update_option( '_ta_cat_global_onoff_'. $term_id, 'valid' ); } else { update_option( '_ta_cat_global_onoff_'. $term_id, 'invalid' ); }
    if ( isset( $_POST['ta_cat_bread_onoff'] ) ) { update_option( '_ta_cat_bread_onoff_'. $term_id, 'valid' ); } else { update_option( '_ta_cat_bread_onoff_'. $term_id, 'invalid' ); }
    if ( isset( $_POST['ta_cat_title_onoff'] ) ) { update_option( '_ta_cat_title_onoff_'. $term_id, $_POST['ta_cat_title_onoff'] ); }
    if ( isset( $_POST['ta_cat_footer_onoff'] ) ) { update_option( '_ta_cat_footer_onoff_'. $term_id, $_POST['ta_cat_footer_onoff'] ); }
    if ( isset( $_POST['ta_cat_sns_position'] ) ) { update_option( '_ta_cat_sns_position_'. $term_id, $_POST['ta_cat_sns_position'] ); }
    if ( TA_HIEND_PI && isset( $_POST['ta_cat_view_limit'] ) ) { update_option( '_ta_cat_view_limit_'. $term_id, $_POST['ta_cat_view_limit'] ); }
    if ( TA_HIEND_PI && isset( $_POST['ta_cat_header_img_kind'] ) ) { update_option( '_ta_cat_header_img_kind_'. $term_id, $_POST['ta_cat_header_img_kind'] ); }
    if ( TA_HIEND_PI && isset( $_POST['ta_cat_header_img_pic'] ) ) { update_option( '_ta_cat_header_img_pic_'. $term_id, $_POST['ta_cat_header_img_pic'] ); }
    if ( TA_HIEND_PI && isset( $_POST['ta_cat_header_img_link'] ) ) { update_option( '_ta_cat_header_img_link_'. $term_id, $_POST['ta_cat_header_img_link'] ); }
    if ( TA_HIEND_PI && isset( $_POST['ta_cat_header_img_link_newwin_onoff'] ) ) { update_option( '_ta_cat_header_img_link_newwin_onoff_'. $term_id, 'valid' ); } else { update_option( '_ta_cat_header_img_link_newwin_onoff_'. $term_id, 'invalid' ); }
    if ( TA_HIEND_PI && isset( $_POST['ta_cat_header_img_shortcode'] ) ) { update_option( '_ta_cat_header_img_shortcode_'. $term_id, $_POST['ta_cat_header_img_shortcode'] ); }
  }
}

add_action ( 'delete_category', 'ta_delete_private_category_fileds'); //カテゴリーが削除された際に実行される
function ta_delete_private_category_fileds( $term_id ) {
  delete_option( '_ta_cat_sitemap_'. $term_id );
  delete_option( '_ta_cat_bg_color_'. $term_id );
  delete_option( '_ta_cat_text_color_'. $term_id );
  delete_option( '_ta_cat_bgimg_onoff_'. $term_id );
  delete_option( '_ta_cat_header_common_onoff_'. $term_id );
  delete_option( '_ta_cat_banner_onoff_'. $term_id );
  delete_option( '_ta_cat_image_onoff_'. $term_id );
  delete_option( '_ta_cat_global_onoff_'. $term_id );
  delete_option( '_ta_cat_bread_onoff_'. $term_id );
  delete_option( '_ta_cat_title_onoff_'. $term_id );
  delete_option( '_ta_cat_footer_onoff_'. $term_id );
  delete_option( '_ta_cat_sns_position_'. $term_id );
  delete_option( '_ta_cat_view_limit_'. $term_id );
  delete_option( '_ta_cat_header_img_kind_'. $term_id );
  delete_option( '_ta_cat_header_img_pic_'. $term_id );
  delete_option( '_ta_cat_header_img_link_'. $term_id );
  delete_option( '_ta_cat_header_img_link_newwin_onoff_'. $term_id );
  delete_option( '_ta_cat_header_img_shortcode_'. $term_id );
}


/********* ディレクトリーコピーに関する関数 *********/
function ta_dircopy( $original_name, $destination_name, $err_name ) {
  if ( ! is_dir( $destination_name ) ) {
    mkdir( $destination_name );
  } else {
    return 'err=' . $err_name . 'dcexit';      //ディレクトリーコピーエラー：既に同名のディレクトリーが存在
  }
  if ( is_dir( $original_name ) ) {
    if ( $dh = opendir( $original_name ) ) {
      while ( ( $file = readdir( $dh ) ) !== false) {
        if ( $file == "." || $file == ".." ) {
          continue;
        }
        if ( is_dir( $original_name . "/" . $file ) ) {
          ta_dircopy( $original_name . "/" . $file, $destination_name . "/" . $file );
        } else {
          copy( $original_name . "/" . $file, $destination_name . "/" . $file );
        }
      }
      closedir( $dh );
    } else {
      return 'err=' . $err_name . 'dcfopen';   //ディレクトリーコピーエラー：オリジナルファイルオープンエラー
    }
  } else {
    return 'err=' . $err_name . 'dcothers';    //ディレクトリーコピーエラー：予期しないエラー
  }
  return '';
}


/********* 管理画面でのメッセージ表示 *********/
function ta_setting_message_disp( $cssmsg = 'valid') { ?>
  <!--WordPressデバッグモード-->
  <div id="ta-wpdebugmsg-disp" class="updated">
    <ul>
      <li><span class="ta-updated-message">WordPressデバッグモードが有効です:</span>wp-config.phpの'WP_DEBUG'をtrueからfalseにすると無効にできます。（通常サイトの一般公開時は無効にします）</li>
    </ul>
  </div>
  <?php if ( 1 == WP_DEBUG ) { $css_value = 'block'; } else { $css_value = 'none'; } ?>
  <style type="text/css"> #ta-wpdebugmsg-disp { display: <?php echo $css_value; ?>; } </style>
  <!--メンテナンスモード-->
  <div id="ta-maintemodemsg-disp" class="updated">
    <ul>
      <li><span class="ta-updated-message">メンテナンスモードが有効です:</span>TAテーマ001・共通設定メニュー　⇒　『その他』　⇒　『メンテナンスモード』の設定で無効にできます。</li>
    </ul>
  </div>
  <?php if ( 'valid' == ta_read_op( 'ta_common_mainte_mode_onoff' ) ) { $css_value = 'block'; } else { $css_value = 'none'; } ?>
  <style type="text/css"> #ta-maintemodemsg-disp { display: <?php echo $css_value; ?>; } </style>
  <!--デモ表示中-->
  <div id="ta-demomsg-disp" class="updated">
    <ul>
      <li><span class="ta-updated-message">デモ表示中です:</span>TAテーマ001・共通設定メニュー　⇒　『基本設定』　⇒　『デモ表示』の設定で非表示にできます。</li>
    </ul>
  </div>
  <?php if ( 'valid' == ta_read_op( 'ta_theme_demo' ) ) { $css_value = 'block'; } else { $css_value = 'none'; } ?>
  <style type="text/css"> #ta-demomsg-disp { display: <?php echo $css_value; ?>; } </style>
  <!--CSSファイル生成-->
  <div id="ta-cssmsg-disp" class="updated">
    <ul>
      <li><span class="ta-updated-message">CSSファイル生成は設定更新と同時に行いません:</span>TAテーマ001・便利ツール設定メニュー　⇒　『基本設定』　⇒　『CSSファイル生成』の設定で同時生成にできます。</li>
    </ul>
  </div>
  <?php if ( 'valid' == ta_read_op( 'ta_theme_no_cssfile' ) && 'valid' == $cssmsg ) { $css_value = 'block'; } else { $css_value = 'none'; } ?>
  <style type="text/css"> #ta-cssmsg-disp { display: <?php echo $css_value; ?>; } </style>
  <!--共通フレームタイプの確認モード実行中-->
  <div id="ta-frame-sizemsg-disp" class="updated">
    <ul>
      <li><span class="ta-updated-message">共通フレームタイプの確認モード実行中です:</span>TAテーマ001・共通設定メニュー　⇒　『基本設定』　⇒　『共通フレームタイプ確認』の設定で解除できます。</li>
    </ul>
  </div>
  <?php if ( 'valid' == ta_read_op( 'ta_common_frame_size_check_onoff' ) ) { $css_value = 'block'; } else { $css_value = 'none'; } ?>
  <style type="text/css"> #ta-frame-sizemsg-disp { display: <?php echo $css_value; ?>; } </style>
  <!--ヘッダーバナーエリアタイプの確認モード実行中-->
  <div id="ta-header-sizemsg-disp" class="updated">
    <ul>
      <li><span class="ta-updated-message">ヘッダーバナーエリアタイプの確認モード実行中です:</span>TAテーマ001・ヘッダー設定メニュー　⇒　『基本設定』　⇒　『ヘッダーバナーエリアタイプ』の設定で解除できます。</li>
    </ul>
  </div>
  <?php if ( 'valid' == ta_read_op( 'ta_header_size_check' ) ) { $css_value = 'block'; } else { $css_value = 'none'; } ?>
  <style type="text/css"> #ta-header-sizemsg-disp { display: <?php echo $css_value; ?>; } </style>
  <!--フッター各ブロックの確認モード実行中-->
  <div id="ta-footer-sizemsg-disp" class="updated">
    <ul>
      <li><span class="ta-updated-message">フッター各ブロックの確認モード実行中です:</span>TAテーマ001・フッター設定メニュー　⇒　『各ブロック設定』　⇒　『フッター各ブロック設定』の設定で解除できます。</li>
    </ul>
  </div>
  <?php if ( 'valid' == ta_read_op( 'ta_footer_block_size_check' ) ) { $css_value = 'block'; } else { $css_value = 'none'; } ?>
  <style type="text/css"> #ta-footer-sizemsg-disp { display: <?php echo $css_value; ?>; } </style>
<?php
}


/********* 管理画面でのスクロール関数 *********/
function ta_setting_scroll() {
  if ( isset( $_GET['page'] ) ) { ?>
    <script type="text/javascript">
      jQuery('html,body').animate({ scrollTop: 0 }, 'fast');
    </script>
<?php
  }
}


/********* カスタムボックスでのメッセージ表示 *********/
function ta_custombox_message_disp() { ?>
  <th id="ta_custombox_message_title" class="big-title first-title"><a href="JavaScript:void(0);">便利情報</a></th>
  <td>
    <div id="ta_custombox_message_disp" class="init-nodisp">
      <p id="ta_msg1_title" class="nocookie-big-title"><a href="JavaScript:void(0);">TAテーマ設定の『メイン』で設定したh2～h5のヘッドラインが使用できます。</a></p>
      <div style="display:none;" id="ta_msg1_disp">
        <p><?php echo esc_html( '<h2 class="title">***</h2>、<h3 class="title">***</h3>、<h4 class="title">***</h4>、<h5 class="title">***</h5>' ); ?></p>
        <p>上記の様にクラス"title"を付けてください。</p>
        <span class="fixed-space"></span>
        <p>貼り付け用コード（クリックしてコピー＆ペーストで使いください）</p>
        <p><input readonly value='<h2 class="title">***</h2>' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <p style="margin-top:0.5em;"><input readonly value='<h3 class="title">***</h3>' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <p style="margin-top:0.5em;"><input readonly value='<h4 class="title">***</h4>' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <p style="margin-top:0.5em;"><input readonly value='<h5 class="title">***</h5>' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <span class="fixed-space"></span>
        <p>※ ショートコード[main-h2]***[/main-h2]、[main-h3]***[/main-h3]、[main-h4]***[/main-h4]、[main-h5]***[/main-h5]も使用できます。</p>
        <span class="fixed-space"></span>
        <p>貼り付け用コード（クリックしてコピー＆ペーストで使いください）</p>
        <p><input readonly value='[main-h2]***[/main-h2]' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <p style="margin-top:0.5em;"><input readonly value='[main-h3]***[/main-h3]' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <p style="margin-top:0.5em;"><input readonly value='[main-h4]***[/main-h4]' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <p style="margin-top:0.5em;"><input readonly value='[main-h5]***[/main-h5]' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
      </div>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <?php ta_main_deco_message(); ?>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <p id="ta_msg3_title" class="nocookie-big-title"><a href="JavaScript:void(0);">TAテーマ設定の『メイン』で設定したメインコンテンツ間隔クラスが使用できます。</a></p>
      <div style="display:none;" id="ta_msg3_disp">
        <p><?php echo esc_html( '<p class="fixed-space">***</p>' ); ?>の様にクラス"fixed-space"を付けてください。</p>
        <span class="fixed-space"></span>
        <p>※ コンテンツ上部に設定された間隔が発生します。（margin-topを使用しています）</p>
        <span class="fixed-space"></span>
        <p>貼り付け用コード（クリックしてコピー＆ペーストで使いください）</p>
        <p><input readonly value='class="fixed-space"' onclick="this.select(0,this.value.length)" style="width:25em;"/>　新規のクラス設置用</p>
        <p style="margin-top:0.5em;"><input readonly value='fixed-space' onclick="this.select(0,this.value.length)" style="width:25em;"/>　クラス追加用</p>
      </div>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <p id="ta_msg4_title" class="nocookie-big-title"><a href="JavaScript:void(0);">TAテーマ設定の『メイン』で設定したメイン区切り線ショートコードが使用できます。</a></p>
      <div style="display:none;" id="ta_msg4_disp">
        <p>区切りたい箇所で[main_separator]を使用してください。</p>
        <span class="fixed-space"></span>
        <p>貼り付け用コード（クリックしてコピー＆ペーストで使いください）</p>
        <p><input readonly value='[main_separator]' onclick="this.select(0,this.value.length)" style="width:25em;"/></p>
      </div>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <?php ta_inline_block_message(); ?>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <?php ta_accordion_message(); ?>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <?php ta_genbg_message(); ?>
      <span class="fixed-space"></span>
    </div><!-- end of #ta_custombox_message_disp -->
  </td>
<?php
}

function ta_top_custombox_message_disp() { ?>
  <th id="ta_custombox_message_title" class="big-title first-title"><a href="JavaScript:void(0);">便利情報</a></th>
  <td>
    <div id="ta_custombox_message_disp" class="init-nodisp">
      <p id="ta_msg1_title" class="nocookie-big-title"><a href="JavaScript:void(0);">TAテーマ設定の『メイン』で設定したh2～h5のヘッドラインが使用できます。</a></p>
      <div style="display:none;" id="ta_msg1_disp">
        <p><?php echo esc_html( '<h2 class="title">***</h2>、<h3 class="title">***</h3>、<h4 class="title">***</h4>、<h5 class="title">***</h5>' ); ?></p>
        <p>上記の様にクラス"title"を付けてください。</p>
        <span class="fixed-space"></span>
        <p>貼り付け用コード（クリックしてコピー＆ペーストで使いください）</p>
        <p><input readonly value='<h2 class="title">***</h2>' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <p style="margin-top:0.5em;"><input readonly value='<h3 class="title">***</h3>' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <p style="margin-top:0.5em;"><input readonly value='<h4 class="title">***</h4>' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <p style="margin-top:0.5em;"><input readonly value='<h5 class="title">***</h5>' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <span class="fixed-space"></span>
        <p>※ ショートコード[main-h2]***[/main-h2]、[main-h3]***[/main-h3]、[main-h4]***[/main-h4]、[main-h5]***[/main-h5]も使用できます。</p>
        <span class="fixed-space"></span>
        <p>貼り付け用コード（クリックしてコピー＆ペーストで使いください）</p>
        <p><input readonly value='[main-h2]***[/main-h2]' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <p style="margin-top:0.5em;"><input readonly value='[main-h3]***[/main-h3]' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <p style="margin-top:0.5em;"><input readonly value='[main-h4]***[/main-h4]' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <p style="margin-top:0.5em;"><input readonly value='[main-h5]***[/main-h5]' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
      </div>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <?php ta_main_deco_message(); ?>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <p id="ta_msg3_title" class="nocookie-big-title"><a href="JavaScript:void(0);">TAテーマ設定の『トップページ』で設定したトップページコンテンツ間隔クラスが使用できます。</a></p>
      <div style="display:none;" id="ta_msg3_disp">
        <p><?php echo esc_html( '<p class="fixed-space">***</p>' ); ?>の様にクラス"fixed-space"を付けてください。</p>
        <span class="fixed-space"></span>
        <p>※ コンテンツ上部に設定された間隔が発生します。（margin-topを使用しています）</p>
        <span class="fixed-space"></span>
        <p>貼り付け用コード（クリックしてコピー＆ペーストで使いください）</p>
        <p><input readonly value='class="fixed-space"' onclick="this.select(0,this.value.length)" style="width:25em;"/>　新規のクラス設置用</p>
        <p style="margin-top:0.5em;"><input readonly value='fixed-space' onclick="this.select(0,this.value.length)" style="width:25em;"/>　クラス追加用</p>
      </div>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <p id="ta_msg4_title" class="nocookie-big-title"><a href="JavaScript:void(0);">TAテーマ設定の『メイン』で設定したメイン区切り線ショートコードが使用できます。</a></p>
      <div style="display:none;" id="ta_msg4_disp">
        <p>区切りたい箇所で[main_separator]を使用してください。</p>
        <span class="fixed-space"></span>
        <p>貼り付け用コード（クリックしてコピー＆ペーストで使いください）</p>
        <p><input readonly value='[main_separator]' onclick="this.select(0,this.value.length)" style="width:25em;"/></p>
      </div>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <?php ta_inline_block_message(); ?>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <?php ta_accordion_message(); ?>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <?php ta_genbg_message(); ?>
      <span class="fixed-space"></span>
    </div><!-- end of #ta_custombox_message_disp -->
  </td>
<?php
}

function ta_endroll_custombox_message_disp() { ?>
  <th id="ta_custombox_message_title" class="big-title first-title"><a href="JavaScript:void(0);">便利情報</a></th>
  <td>
    <div id="ta_custombox_message_disp" class="init-nodisp">
      <p id="ta_msg1_title" class="nocookie-big-title"><a href="JavaScript:void(0);">TAテーマ設定の『メイン』で設定したh2～h5のヘッドラインが使用できます。</a></p>
      <div style="display:none;" id="ta_msg1_disp">
        <p><?php echo esc_html( '<h2 class="title">***</h2>、<h3 class="title">***</h3>、<h4 class="title">***</h4>、<h5 class="title">***</h5>' ); ?></p>
        <p>上記の様にクラス"title"を付けてください。</p>
        <span class="fixed-space"></span>
        <p>貼り付け用コード（クリックしてコピー＆ペーストで使いください）</p>
        <p><input readonly value='<h2 class="title">***</h2>' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <p style="margin-top:0.5em;"><input readonly value='<h3 class="title">***</h3>' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <p style="margin-top:0.5em;"><input readonly value='<h4 class="title">***</h4>' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <p style="margin-top:0.5em;"><input readonly value='<h5 class="title">***</h5>' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <span class="fixed-space"></span>
        <p>※ ショートコード[main-h2]***[/main-h2]、[main-h3]***[/main-h3]、[main-h4]***[/main-h4]、[main-h5]***[/main-h5]も使用できます。</p>
        <span class="fixed-space"></span>
        <p>貼り付け用コード（クリックしてコピー＆ペーストで使いください）</p>
        <p><input readonly value='[main-h2]***[/main-h2]' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <p style="margin-top:0.5em;"><input readonly value='[main-h3]***[/main-h3]' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <p style="margin-top:0.5em;"><input readonly value='[main-h4]***[/main-h4]' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <p style="margin-top:0.5em;"><input readonly value='[main-h5]***[/main-h5]' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
      </div>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <?php ta_main_deco_message(); ?>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <p id="ta_msg3_title" class="nocookie-big-title"><a href="JavaScript:void(0);">TAテーマ設定の『メイン』で設定したメインコンテンツ間隔クラスが使用できます。</a></p>
      <div style="display:none;" id="ta_msg3_disp">
        <p><?php echo esc_html( '<p class="fixed-space">***</p>' ); ?>の様にクラス"fixed-space"を付けてください。</p>
        <span class="fixed-space"></span>
        <p>※ コンテンツ上部に設定された間隔が発生します。（margin-topを使用しています）</p>
        <p>※ 表示がトップページの時には、TAテーマ設定の『トップページ』で設定したトップページコンテンツ間隔が適応されます</p>
        <span class="fixed-space"></span>
        <p>貼り付け用コード（クリックしてコピー＆ペーストで使いください）</p>
        <p><input readonly value='class="fixed-space"' onclick="this.select(0,this.value.length)" style="width:25em;"/>　新規のクラス設置用</p>
        <p style="margin-top:0.5em;"><input readonly value='fixed-space' onclick="this.select(0,this.value.length)" style="width:25em;"/>　クラス追加用</p>
      </div>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <p id="ta_msg4_title" class="nocookie-big-title"><a href="JavaScript:void(0);">TAテーマ設定の『メイン』で設定したメイン区切り線ショートコードが使用できます。</a></p>
      <div style="display:none;" id="ta_msg4_disp">
        <p>区切りたい箇所で[main_separator]を使用してください。</p>
        <span class="fixed-space"></span>
        <p>貼り付け用コード（クリックしてコピー＆ペーストで使いください）</p>
        <p><input readonly value='[main_separator]' onclick="this.select(0,this.value.length)" style="width:25em;"/></p>
      </div>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <?php ta_inline_block_message(); ?>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <?php ta_accordion_message(); ?>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <?php ta_genbg_message(); ?>
      <span class="fixed-space"></span>
    </div><!-- end of #ta_custombox_message_disp -->
  </td>
<?php
}

function ta_header_custombox_message_disp() { ?>
  <th id="ta_custombox_message_title" class="big-title first-title"><a href="JavaScript:void(0);">便利情報</a></th>
  <td>
    <div id="ta_custombox_message_disp" class="init-nodisp">
      <p id="ta_msg1_title" class="nocookie-big-title"><a href="JavaScript:void(0);">TAテーマ設定の『メイン』で設定したh2～h5のヘッドラインが使用できます。（設定を流用します）</a></p>
      <div style="display:none;" id="ta_msg1_disp">
        <p><?php echo esc_html( '<h2 class="header_title">***</h2>、<h3 class="header_title">***</h3>、<h4 class="header_title">***</h4>、<h5 class="header_title">***</h5>' ); ?></p>
        <p>上記の様にクラス"header_title"を付けてください。</p>
        <span class="fixed-space"></span>
        <p>貼り付け用コード（クリックしてコピー＆ペーストで使いください）</p>
        <p><input readonly value='<h2 class="header_title">***</h2>' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <p style="margin-top:0.5em;"><input readonly value='<h3 class="header_title">***</h3>' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <p style="margin-top:0.5em;"><input readonly value='<h4 class="header_title">***</h4>' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <p style="margin-top:0.5em;"><input readonly value='<h5 class="header_title">***</h5>' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <span class="fixed-space"></span>
        <p>※ ショートコード[header-h2]***[/header-h2]、[header-h3]***[/header-h3]、[header-h4]***[/header-h4]、[header-h5]***[/header-h5]も使用できます。</p>
        <span class="fixed-space"></span>
        <p>貼り付け用コード（クリックしてコピー＆ペーストで使いください）</p>
        <p><input readonly value='[header-h2]***[/header-h2]' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <p style="margin-top:0.5em;"><input readonly value='[header-h3]***[/header-h3]' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <p style="margin-top:0.5em;"><input readonly value='[header-h4]***[/header-h4]' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <p style="margin-top:0.5em;"><input readonly value='[header-h5]***[/header-h5]' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
      </div>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <?php ta_inline_block_message(); ?>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <?php ta_accordion_message(); ?>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <?php ta_genbg_message(); ?>
      <span class="fixed-space"></span>
    </div><!-- end of #ta_custombox_message_disp -->
  </td>
<?php
}

function ta_sidebar_custombox_message_disp() { ?>
  <th id="ta_custombox_message_title" class="big-title first-title"><a href="JavaScript:void(0);">便利情報</a></th>
  <td>
    <div id="ta_custombox_message_disp" class="init-nodisp">
      <p id="ta_msg1_title" class="nocookie-big-title"><a href="JavaScript:void(0);">TAテーマ設定の『サイドバー』で設定したh2～h5のヘッドラインが使用できます。</a></p>
      <div style="display:none;" id="ta_msg1_disp">
        <p><?php echo esc_html( '<h2 class="sidebar_title">***</h2>、<h3 class="sidebar_title">***</h3>、<h4 class="sidebar_title">***</h4>、<h5 class="sidebar_title">***</h5>' ); ?></p>
        <p>上記の様にクラス"sidebar_title"を付けてください。</p>
        <span class="fixed-space"></span>
        <p>貼り付け用コード（クリックしてコピー＆ペーストで使いください）</p>
        <p><input readonly value='<h2 class="sidebar_title">***</h2>' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <p style="margin-top:0.5em;"><input readonly value='<h3 class="sidebar_title">***</h3>' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <p style="margin-top:0.5em;"><input readonly value='<h4 class="sidebar_title">***</h4>' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <p style="margin-top:0.5em;"><input readonly value='<h5 class="sidebar_title">***</h5>' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <span class="fixed-space"></span>
        <p>※ ショートコード[sidebar-h2]***[/sidebar-h2]、[sidebar-h3]***[/sidebar-h3]、[sidebar-h4]***[/sidebar-h4]、[sidebar-h5]***[/sidebar-h5]も使用できます。</p>
        <span class="fixed-space"></span>
        <p>貼り付け用コード（クリックしてコピー＆ペーストで使いください）</p>
        <p><input readonly value='[sidebar-h2]***[/sidebar-h2]' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <p style="margin-top:0.5em;"><input readonly value='[sidebar-h3]***[/sidebar-h3]' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <p style="margin-top:0.5em;"><input readonly value='[sidebar-h4]***[/sidebar-h4]' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <p style="margin-top:0.5em;"><input readonly value='[sidebar-h5]***[/sidebar-h5]' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
      </div>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <?php ta_sidebar_deco_message(); ?>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <p id="ta_msg3_title" class="nocookie-big-title"><a href="JavaScript:void(0);">TAテーマ設定の『サイドバー』で設定したサイドバーコンテンツ間隔クラスが使用できます。</a></p>
      <div style="display:none;" id="ta_msg3_disp">
        <p><?php echo esc_html( '<p class="fixed-space">***</p>' ); ?>の様にクラス"fixed-space"を付けてください。</p>
        <span class="fixed-space"></span>
        <p>※ コンテンツ上部に設定された間隔が発生します。（margin-topを使用しています）</p>
        <span class="fixed-space"></span>
        <p>貼り付け用コード（クリックしてコピー＆ペーストで使いください）</p>
        <p><input readonly value='class="fixed-space"' onclick="this.select(0,this.value.length)" style="width:25em;"/>　新規のクラス設置用</p>
        <p style="margin-top:0.5em;"><input readonly value='fixed-space' onclick="this.select(0,this.value.length)" style="width:25em;"/>　クラス追加用</p>
      </div>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <p id="ta_msg4_title" class="nocookie-big-title"><a href="JavaScript:void(0);">TAテーマ設定の『サイドバー』で設定したサイドバー区切り線ショートコードが使用できます。</a></p>
      <div style="display:none;" id="ta_msg4_disp">
        <p>区切りたい箇所で[sidebar_separator]を使用してください。</p>
        <span class="fixed-space"></span>
        <p>貼り付け用コード（クリックしてコピー＆ペーストで使いください）</p>
        <p><input readonly value='[sidebar_separator]' onclick="this.select(0,this.value.length)" style="width:25em;"/></p>
      </div>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <?php ta_inline_block_message(); ?>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <?php ta_accordion_message(); ?>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <?php ta_genbg_message(); ?>
      <span class="fixed-space"></span>
    </div><!-- end of #ta_custombox_message_disp -->
  </td>
<?php
}

function ta_sidebarsub_custombox_message_disp() { ?>
  <th id="ta_custombox_message_title" class="big-title first-title"><a href="JavaScript:void(0);">便利情報</a></th>
  <td>
    <div id="ta_custombox_message_disp" class="init-nodisp">
      <p id="ta_msg1_title" class="nocookie-big-title"><a href="JavaScript:void(0);">TAテーマ設定の『サブサイドバー』で設定したh2～h5のヘッドラインが使用できます。</a></p>
      <div style="display:none;" id="ta_msg1_disp">
        <p><?php echo esc_html( '<h2 class="sidebarsub_title">***</h2>、<h3 class="sidebarsub_title">***</h3>、<h4 class="sidebarsub_title">***</h4>、<h5 class="sidebarsub_title">***</h5>' ); ?></p>
        <p>上記の様にクラス"sidebarsub_title"を付けてください。</p>
        <span class="fixed-space"></span>
        <p>貼り付け用コード（クリックしてコピー＆ペーストで使いください）</p>
        <p><input readonly value='<h2 class="sidebarsub_title">***</h2>' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <p style="margin-top:0.5em;"><input readonly value='<h3 class="sidebarsub_title">***</h3>' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <p style="margin-top:0.5em;"><input readonly value='<h4 class="sidebarsub_title">***</h4>' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <p style="margin-top:0.5em;"><input readonly value='<h5 class="sidebarsub_title">***</h5>' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <span class="fixed-space"></span>
        <p>※ ショートコード[sidebarsub-h2]***[/sidebarsub-h2]、[sidebarsub-h3]***[/sidebarsub-h3]、[sidebarsub-h4]***[/sidebarsub-h4]、[sidebarsub-h5]***[/sidebarsub-h5]も使用できます。</p>
        <span class="fixed-space"></span>
        <p>貼り付け用コード（クリックしてコピー＆ペーストで使いください）</p>
        <p><input readonly value='[sidebarsub-h2]***[/sidebarsub-h2]' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <p style="margin-top:0.5em;"><input readonly value='[sidebarsub-h3]***[/sidebarsub-h3]' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <p style="margin-top:0.5em;"><input readonly value='[sidebarsub-h4]***[/sidebarsub-h4]' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <p style="margin-top:0.5em;"><input readonly value='[sidebarsub-h5]***[/sidebarsub-h5]' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
      </div>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <p id="ta_msg2_title" class="nocookie-big-title"><a href="JavaScript:void(0);">TAテーマ設定の『サブサイドバー』で設定したサブサイドバーコンテンツ間隔クラスが使用できます。</a></p>
      <div style="display:none;" id="ta_msg2_disp">
        <p><?php echo esc_html( '<p class="fixed-space">***</p>' ); ?>の様にクラス"fixed-space"を付けてください。</p>
        <span class="fixed-space"></span>
        <p>※ コンテンツ上部に設定された間隔が発生します。（margin-topを使用しています）</p>
        <span class="fixed-space"></span>
        <p>貼り付け用コード（クリックしてコピー＆ペーストで使いください）</p>
        <p><input readonly value='class="fixed-space"' onclick="this.select(0,this.value.length)" style="width:25em;"/>　新規のクラス設置用</p>
        <p style="margin-top:0.5em;"><input readonly value='fixed-space' onclick="this.select(0,this.value.length)" style="width:25em;"/>　クラス追加用</p>
      </div>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <p id="ta_msg4_title" class="nocookie-big-title"><a href="JavaScript:void(0);">TAテーマ設定の『サブサイドバー』で設定したサブサイドバー区切り線ショートコードが使用できます。</a></p>
      <div style="display:none;" id="ta_msg4_disp">
        <p>区切りたい箇所で[sidebarsub_separator]を使用してください。</p>
        <span class="fixed-space"></span>
        <p>貼り付け用コード（クリックしてコピー＆ペーストで使いください）</p>
        <p><input readonly value='[sidebarsub_separator]' onclick="this.select(0,this.value.length)" style="width:25em;"/></p>
      </div>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <?php ta_inline_block_message(); ?>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <?php ta_accordion_message(); ?>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <?php ta_genbg_message(); ?>
      <span class="fixed-space"></span>
    </div><!-- end of #ta_custombox_message_disp -->
  </td>
<?php
}

function ta_footer_custombox_message_disp() { ?>
  <th id="ta_custombox_message_title" class="big-title first-title"><a href="JavaScript:void(0);">便利情報</a></th>
  <td>
    <div id="ta_custombox_message_disp" class="init-nodisp">
      <p id="ta_msg1_title" class="nocookie-big-title"><a href="JavaScript:void(0);">TAテーマ設定の『フッター』で設定したh2～h5のヘッドラインが使用できます。</a></p>
      <div style="display:none;" id="ta_msg1_disp">
        <p><?php echo esc_html( '<h2 class="footer_title">***</h2>、<h3 class="footer_title">***</h3>、<h4 class="footer_title">***</h4>、<h5 class="footer_title">***</h5>' ); ?></p>
        <p>上記の様にクラス"footer_title"を付けてください。</p>
        <span class="fixed-space"></span>
        <p>貼り付け用コード（クリックしてコピー＆ペーストで使いください）</p>
        <p><input readonly value='<h2 class="footer_title">***</h2>' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <p style="margin-top:0.5em;"><input readonly value='<h3 class="footer_title">***</h3>' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <p style="margin-top:0.5em;"><input readonly value='<h4 class="footer_title">***</h4>' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <p style="margin-top:0.5em;"><input readonly value='<h5 class="footer_title">***</h5>' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <span class="fixed-space"></span>
        <p>※ ショートコード[footer-h2]***[/footer-h2]、[footer-h3]***[/footer-h3]、[footer-h4]***[/footer-h4]、[footer-h5]***[/footer-h5]も使用できます。</p>
        <span class="fixed-space"></span>
        <p>貼り付け用コード（クリックしてコピー＆ペーストで使いください）</p>
        <p><input readonly value='[footer-h2]***[/footer-h2]' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <p style="margin-top:0.5em;"><input readonly value='[footer-h3]***[/footer-h3]' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <p style="margin-top:0.5em;"><input readonly value='[footer-h4]***[/footer-h4]' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
        <p style="margin-top:0.5em;"><input readonly value='[footer-h5]***[/footer-h5]' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
      </div>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <p id="ta_msg2_title" class="nocookie-big-title"><a href="JavaScript:void(0);">TAテーマ設定の『フッター』で設定したフッターコンテンツ間隔クラスが使用できます。</a></p>
      <div style="display:none;" id="ta_msg2_disp">
        <p><?php echo esc_html( '<p class="fixed-space">***</p>' ); ?>の様にクラス"fixed-space"を付けてください。</p>
        <span class="fixed-space"></span>
        <p>※ コンテンツ上部に設定された間隔が発生します。（margin-topを使用しています）</p>
        <span class="fixed-space"></span>
        <p>貼り付け用コード（クリックしてコピー＆ペーストで使いください）</p>
        <p><input readonly value='class="fixed-space"' onclick="this.select(0,this.value.length)" style="width:25em;"/>　新規のクラス設置用</p>
        <p style="margin-top:0.5em;"><input readonly value='fixed-space' onclick="this.select(0,this.value.length)" style="width:25em;"/>　クラス追加用</p>
      </div>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <?php ta_inline_block_message(); ?>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <?php ta_accordion_message(); ?>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <?php ta_genbg_message(); ?>
      <span class="fixed-space"></span>
    </div><!-- end of #ta_custombox_message_disp -->
  </td>
<?php
}

function ta_main_deco_message() {
  if ( TA_HIEND_PI ) { ?>
  <p id="ta_msg2_title" class="nocookie-big-title"><a href="JavaScript:void(0);">TAテーマ設定の『メイン』で設定した装飾1～装飾4が使用できます。</a></p>
  <div style="display:none;" id="ta_msg2_disp">
    <p><?php echo esc_html( '<h6 class="deco1">***</h6>、<h6 class="deco2">***</h6>、<h6 class="deco3">***</h6>、<h6 class="deco4">***</h6>' ); ?></p>
    <p>上記の様にh6にクラス"deco1～deco4"を付けてください。</p>
    <span class="fixed-space"></span>
    <p>貼り付け用コード（クリックしてコピー＆ペーストで使いください）</p>
    <p><input readonly value='<h6 class="deco1">***</h6>' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
    <p style="margin-top:0.5em;"><input readonly value='<h6 class="deco2">***</h6>' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
    <p style="margin-top:0.5em;"><input readonly value='<h6 class="deco3">***</h6>' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
    <p style="margin-top:0.5em;"><input readonly value='<h6 class="deco4">***</h6>' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
    <span class="fixed-space"></span>
    <p>※ ショートコード[main-deco1]***[/main-deco1]、[main-deco2]***[/main-deco2]、[main-deco3]***[/main-deco3]、[main-deco4]***[/main-deco4]も使用できます。</p>
    <span class="fixed-space"></span>
    <p>貼り付け用コード（クリックしてコピー＆ペーストで使いください）</p>
    <p><input readonly value='[main-deco1]***[/main-deco1]' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
    <p style="margin-top:0.5em;"><input readonly value='[main-deco2]***[/main-deco2]' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
    <p style="margin-top:0.5em;"><input readonly value='[main-deco3]***[/main-deco3]' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
    <p style="margin-top:0.5em;"><input readonly value='[main-deco4]***[/main-deco4]' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
  </div>
<?php
  } else { ?>
  <p class="no-ta-thm001highend" style="margin-top:5px;">TAテーマ設定の『メイン』で設定した装飾1～装飾4が使用できます。</p>
<?php
  }
}

function ta_sidebar_deco_message() {
  if ( TA_HIEND_PI ) { ?>
  <p id="ta_msg2_title" class="nocookie-big-title"><a href="JavaScript:void(0);">TAテーマ設定の『サイドバー』で設定した装飾1～装飾4が使用できます。</a></p>
  <div style="display:none;" id="ta_msg2_disp">
    <p><?php echo esc_html( '<h6 class="sidebar_deco1">***</h6>、<h6 class="sidebar_deco2">***</h6>、<h6 class="sidebar_deco3">***</h6>、<h6 class="sidebar_deco4">***</h6>' ); ?></p>
    <p>上記の様にh6にクラス"sidebar_deco1～sidebar_deco4"を付けてください。</p>
    <span class="fixed-space"></span>
    <p>貼り付け用コード（クリックしてコピー＆ペーストで使いください）</p>
    <p><input readonly value='<h6 class="sidebar_deco1">***</h6>' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
    <p style="margin-top:0.5em;"><input readonly value='<h6 class="sidebar_deco2">***</h6>' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
    <p style="margin-top:0.5em;"><input readonly value='<h6 class="sidebar_deco3">***</h6>' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
    <p style="margin-top:0.5em;"><input readonly value='<h6 class="sidebar_deco4">***</h6>' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
    <span class="fixed-space"></span>
    <p>※ ショートコード[side-deco1]***[/side-deco1]、[side-deco2]***[/side-deco2]、[side-deco3]***[/side-deco3]、[side-deco4]***[/side-deco4]も使用できます。</p>
    <span class="fixed-space"></span>
    <p>貼り付け用コード（クリックしてコピー＆ペーストで使いください）</p>
    <p><input readonly value='[side-deco1]***[/side-deco1]' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
    <p style="margin-top:0.5em;"><input readonly value='[side-deco2]***[/side-deco2]' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
    <p style="margin-top:0.5em;"><input readonly value='[side-deco3]***[/side-deco3]' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
    <p style="margin-top:0.5em;"><input readonly value='[side-deco4]***[/side-deco4]' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入</p>
  </div>
<?php
  } else { ?>
  <p class="no-ta-thm001highend" style="margin-top:5px;">※ TAテーマ設定の『サイドバー』で設定した装飾1～装飾4が使用できます。</p>
<?php
  }
}

function ta_inline_block_message() {
  if ( TA_HIEND_PI ) { ?>
  <p id="ta_inline_block_message_title" class="nocookie-big-title" style="margin-top:5px;"><a href="JavaScript:void(0);">コンテンツを自動配列するオリジナルショートコードが使用できます。</a></p>
  <div style="display:none;" id="ta_inline_block_message_disp">
    <p>自動配列を行いたいコンテンツグループを[auto_layout_begin]と[auto_layout_end]で囲みます。</p>
    <span class="fixed-space"></span>
    <p>グループ内の各コンテンツは、左側に寄せたい場合には[left_content_begin]と[left_content_end]、右側に寄せたい場合には[right_content_begin]と[right_content_end]で囲みます。</p>
    <span class="fixed-space"></span>
    <p>各コンテンツは、幅（％単位）、上側余白（em単位）、右側余白（％単位）、下側余白（em単位）、左側余白（％単位）の指定ができます。
    また、テキストの画像左右への回り込みを行う際に便利な画像のりしろは、左寄りの場合には画像右と画像下（px単位）、右寄りの場合には画像左と画像下（px単位）で指定できます。</p>
    <span class="fixed-space"></span>
    <p>例えば、[left_content_begin w=20 t=4 r=3 b=2 l=5 p=10]の様に記載します。</p>
    <p>上の例は、幅(w)が横幅の20％、上側余白(t)が文字高さの4倍、右側余白(r)が横幅の3％、下側余白(b)が文字高さの2倍、左側余白(l)が横幅の5％、右側と下側に10ピクセルののりしろを意味します。</p>
    <span class="fixed-space"></span>
    <p>貼り付け用コード（クリックしてコピー＆ペーストで使いください）</p>
    <p><input readonly value='[auto_layout_begin]***[auto_layout_end]' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***に自動配列コンテンツを挿入</p>
    <p style="margin-top:0.5em;"><input readonly value='[left_content_begin w=30]***[left_content_end]' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***に左寄せコンテンツを挿入（幅は30%に調整）</p>
    <p style="margin-top:0.5em;"><input readonly value='[right_content_begin w=30]***[right_content_end]' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***に右寄せコンテンツを挿入（幅は30%に調整）</p>
    <span class="fixed-space"></span>
    <p>※ 詳細説明は<a href="http://theme001.tec-aid.com/thm001_manual_p2/short/etc_short#auto_arrange" target="_blank">『TAテーマ001』の取扱い説明（汎用ショートコード）その他</a>をご覧ください。</p>
  </div>
<?php
  } else { ?>
  <p class="no-ta-thm001highend" style="margin-top:5px;">コンテンツを自動配列するオリジナルショートコードが使用できます。</p>
<?php
  }
}

function ta_accordion_message() {
  if ( TA_HIEND_PI ) { ?>
  <p id="ta_accordion_message_title" class="nocookie-big-title" style="margin-top:5px;"><a href="JavaScript:void(0);">コンテンツをアコーディオン展開するオリジナルショートコードが使用できます。</a></p>
  <div style="display:none;" id="ta_accordion_message_disp">
    <p>アコーディオン展開を支持する題目（タイトル）を[slide_title_begin]と[slide_title_end]で囲みます。</p>
    <span class="fixed-space"></span>
    <p>次にアコーディオン展開したい内容（コンテンツ）を[slide_content_begin]と[slide_content_end]で囲みます。</p>
    <span class="fixed-space"></span>
    <p>また、題目（タイトル）と内容（コンテンツ）を一致させるために同一のidの指定を行います。</p>
    <span class="fixed-space"></span>
    <p>例えば、[slide_title_begin id=abc]題目（タイトル）[slide_title_end] ・・・・ [slide_content_begin id=abc]内容（コンテンツ）[slide_content_end]の様に記載します。</p>
    <span class="fixed-space"></span>
    <p>上の例は、idが"abc_title"の題目（タイトル）をクリックするとidが"abc_disp"で囲まれた内容（コンテンツ）が展開したり閉じたりすることを意味します。
   （idの"_title"と"_disp"はショートコードが自動付加します）CSSデザインを施したい場合は、題目（タイトル）に"#abc_title"が、内容（コンテンツ）に"#abc_disp"が使用できます。</p>
    <span class="fixed-space"></span>
    <p>貼り付け用コード（クリックしてコピー＆ペーストで使いください）</p>
    <p><input readonly value='[slide_title_begin id=abc]***[slide_title_end]' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***にタイトルを挿入（idはコンテンツと同じでユニーク）</p>
    <p style="margin-top:0.5em;"><input readonly value='[slide_content_begin id=abc]***[slide_content_end]' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***に展開させたいコンテンツを挿入（idはタイトルと同じでユニーク）</p>
    <span class="fixed-space"></span>
    <p>※ 詳細説明は<a href="http://theme001.tec-aid.com/thm001_manual_p2/short/etc_short#contents_slide" target="_blank">『TAテーマ001』の取扱い説明（汎用ショートコード）その他</a>をご覧ください。</p>
  </div>
<?php
  } else { ?>
  <p class="no-ta-thm001highend" style="margin-top:5px;">コンテンツをアコーディオン展開するオリジナルショートコードが使用できます。</p>
<?php
  }
}

function ta_genbg_message() {
  if ( TA_HIEND_PI ) { ?>
  <p id="ta_genbg_message_title" class="nocookie-big-title" style="margin-top:5px;"><a href="JavaScript:void(0);">TAテーマ設定の『汎用ショートコード』で設定した背景装飾#1～#5が使用できます。</a></p>
  <div style="display:none;" id="ta_genbg_message_disp">
    <p>装飾を施したいコンテンツ（画像やテキスト）を[ta_genbg_begin id=1～5]と[ta_genbg_end id=1～5]（id=1の場合は省略できます）で囲みます。</p>
    <span class="fixed-space"></span>
    <p>貼り付け用コード（クリックしてコピー＆ペーストで使いください）</p>
    <p><input readonly value='[ta_genbg_begin id=1～5]***[ta_genbg_end id=1～5]' onclick="this.select(0,this.value.length)" style="width:25em;"/>　***に装飾したいコンテンツを挿入（idは1～5から選択）</p>
    <span class="fixed-space"></span>
    <p>※ 詳細説明は<a href="http://theme001.tec-aid.com/thm001_manual_p2/short/genbg" target="_blank">『TAテーマ001』の取扱い説明（汎用ショートコード）TA汎用背景装飾</a>をご覧ください。</p>
  </div>
<?php
  } else { ?>
  <p class="no-ta-thm001highend" style="margin-top:5px;">TAテーマ設定の『汎用ショートコード』で設定した背景装飾#1～#5が使用できます。</p>
<?php
  }
}


/********* 簡易最新投稿ダイジェスト詳細設定関数 *********/
function ta_simple_latestposts_setting_detail() { ?>
  <h4>簡易最新投稿ダイジェストタイトル</h4>
  <?php ta_alternative_input_checkbox( 'ta_common_simple_latestposts_title_onoff', '表示する' ); ?>
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <h4>簡易最新投稿ダイジェストタイトルの要素名</h4>
  <?php ta_factor_selection_process( 'ta_common_simple_latestposts_title_factor' ); ?>
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <h4 class="ta-html-strip">簡易最新投稿ダイジェストタイトル名</h4>
  <?php ta_text_input( 'ta_common_simple_latestposts_title', 'middle_box' ); ?>
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <h4>非対象カテゴリー選択</h4>
  <p>※ 簡易最新投稿表示を行わないカテゴリー</p>
<?php 
  $init_value = ta_read_op( 'ta_common_simple_latestposts_nodis_cats' );
  $categories = get_categories( 'get=all' );
  foreach ( $categories as $category ) { ?>
    <p><input type="checkbox" name="ta_common_simple_latestposts_nodis_cats[]" value="<?php echo $category->term_id; ?>" <?php ta_cat_check( $init_value, $category->term_id ); ?>> <?php echo $category->name; ?></p>
<?php
  } ?>
  
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <table class="ta-2contents-table">
    <tr>
      <td>
        <h4>表示数</h4>
        <?php ta_simple_input( 'ta_common_simple_latestposts_num', '個', 'short_box' ); ?>
        <p>※ 全数表示は-1を設定してください</p>
      </td>
      <td>
        <h4>記事行間（縦方向）の余白</h4>
        <?php ta_simple_input( 'ta_common_simple_latestposts_padding', 'ピクセル', 'short_box' ); ?>
      </td>
    </tr>
  </table>
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <table class="ta-3contents-table">
    <tr>
      <td>
        <h4>記事境界線の種類</h4>
        <?php $init = ta_read_op( 'ta_common_simple_latestposts_post_border_kind' ); ?>
        <p><input type="radio" name="<?php echo 'ta_common_simple_latestposts_post_border_kind'; ?>" value="solid" <?php if ( "solid" == $init ) echo 'checked="checked"' ?>> 実線</p>
        <p><input type="radio" name="<?php echo 'ta_common_simple_latestposts_post_border_kind'; ?>" value="dotted" <?php if ( "dotted" == $init ) echo 'checked="checked"' ?>> 点線</p>
        <p><input type="radio" name="<?php echo 'ta_common_simple_latestposts_post_border_kind'; ?>" value="dashed" <?php if ( "dashed" == $init ) echo 'checked="checked"' ?>> 破線</p>
        <p><input type="radio" name="<?php echo 'ta_common_simple_latestposts_post_border_kind'; ?>" value="double" <?php if ( "double" == $init ) echo 'checked="checked"' ?>> 二重線</p>
        <p><input type="radio" name="<?php echo 'ta_common_simple_latestposts_post_border_kind'; ?>" value="none" <?php if ( "none" == $init ) echo 'checked="checked"' ?>> 無し</p>
      </td>
      <td>
        <h4>記事境界線の太さ</h4>
        <?php ta_simple_input( 'ta_common_simple_latestposts_post_border_size', 'ピクセル', 'short_box' ); ?>
      </td>
      <td>
        <h4>記事境界線の色</h4>
        <?php ta_color_picker_no_tomei_process( 'ta_common_simple_latestposts_post_border_color', 'valid' ); ?>
      </td>
    </tr>
  </table>
<?php
}


/********* 簡易最新投稿ダイジェスト用ダイジェスト記事のデザイン設定関数 *********/
function ta_simple_article_digest_design() { ?>
  <h4>リンク時の新規ウィンドウ</h4>
  <?php ta_alternative_input_checkbox( 'ta_common_simple_latestposts_post_newwin_onoff', 'リンク時に新規ウィンドウで開く' ); ?>
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <table class="ta-2contents-table">
    <tr>
      <td>
        <h4>記事タイトルのサイズ</h4>
        <?php ta_simple_input( 'ta_common_simple_latestposts_post_title_size', '％', 'short_box' ); ?>
      </td>
      <td>
        <h4>記事タイトルの太さ</h4>
        <?php ta_fontweight_selection( 'ta_common_simple_latestposts_post_title_weight' ); ?>
      </td>
    </tr>
  </table>
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <?php ta_linkedtext_setting( 
          '記事タイトル',
          'ta_common_simple_latestposts_post_title_color', 'invalid',
          'ta_common_simple_latestposts_post_title_underline_onoff',
          'ta_common_simple_latestposts_post_title_color_hover', 'invalid',
          'ta_common_simple_latestposts_post_title_underlinehover_onoff' ); ?>
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <table class="ta-2contents-table">
    <tr>
      <td>
        <h4>日時文字の色</h4>
        <?php ta_color_picker_no_tomei_process( 'ta_common_simple_latestposts_time_color', 'valid' ); ?>
      </td>
      <td>
        <h4>日時文字の太さ</h4>
        <?php ta_fontweight_selection( 'ta_common_simple_latestposts_time_weight' ); ?>
      </td>
    </tr>
  </table>
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <table class="ta-2contents-table">
    <tr>
      <td>
        <h4>日時文字エリアの幅</h4>
        <?php ta_simple_input( 'ta_common_simple_latestposts_time_width', 'em', 'short_box' ); ?>
        <p>※ 8.5em程度が標準です</p>
      </td>
      <td>
        <h4>日時文字の時計マーク <span class="dashicons dashicons-clock"></span></h4>
        <?php ta_alternative_input_checkbox( 'ta_common_simple_latestposts_watchmark_onoff', '表示する' ); ?>
      </td>
    </tr>
  </table>
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <table class="ta-2contents-table">
    <tr>
      <td>
        <h4>新規投稿マーク</h4>
        <?php ta_alternative_input_checkbox( 'ta_common_simple_latestposts_release_mark_onoff', '表示する' ); ?>
      </td>
      <td>
        <h4>新規投稿の日数定義</h4>
        <?php ta_simple_input( 'ta_common_simple_latestposts_release_mark_days', '日間', 'short_box' ); ?>
        <p>※ 投稿日から何日間マークを表示するか</p>
      </td>
    </tr>
  </table>
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <h4>新規投稿マーク画像</h4>
  <?php ta_img_upload_process( 'ta_common_simple_latestposts_release_mark_pic' ); ?>
  <p>※ 縦横幅の最大値を500ピクセルに制限しています</p>
  <p>※ 新規投稿マーク画像は記事タイトルの文字サイズに自動で合わせます</p>
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <h4 class="ta-html-strip">新規投稿マーク画像の代替テキスト</h4>
  <?php ta_text_input( 'ta_common_simple_latestposts_release_mark_text', 'middle_box' ); ?>
  <p>※ 画像がある場合は無効</p>
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <table class="ta-2contents-table">
    <tr>
      <td>
        <h4>代替テキストの色</h4>
        <?php ta_color_picker_no_tomei_process( 'ta_common_simple_latestposts_release_mark_text_color', 'valid' ); ?>
      </td>
      <td>
        <h4>代替テキストの太さ</h4>
        <?php ta_fontweight_selection( 'ta_common_simple_latestposts_release_mark_text_weight' ); ?>
      </td>
    </tr>
  </table>
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <table class="ta-2contents-table">
    <tr>
      <td>
        <h4>代替テキストの背景色</h4>
        <?php ta_color_picker_no_tomei_process( 'ta_common_simple_latestposts_release_mark_text_bgcolor', 'valid' ); ?>
      </td>
      <td>
        <h4>代替テキスト背景の角の丸み</h4>
        <?php ta_simple_input( 'ta_common_simple_latestposts_release_mark_text_round', 'ピクセル', 'short_box' ); ?>
        <p>※ 丸み無しは0を入力してください</p>
      </td>
    </tr>
  </table>
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <h4>新規投稿マーク画像（代替テキスト）と記事タイトルの間隔</h4>
  <?php ta_simple_input( 'ta_common_simple_latestposts_release_mark_padding', 'ピクセル', 'short_box' ); ?>
  <span class="fixed-space"></span>
<?php
}


/********* 最新投稿ダイジェスト詳細設定関数 *********/
function ta_latestposts_setting_detail( $place ) { ?>
  <h4 id="ta_<?php echo $place; ?>_latestposts_detail_frametitle_pro_title" class="pro-title"><a href="JavaScript:void(0);">最新投稿ダイジェストタイトル</a></h4>
  <div id="ta_<?php echo $place; ?>_latestposts_detail_frametitle_pro_disp" class="pro-disp init-nodisp">
    <h4>最新投稿ダイジェストタイトル</h4>
    <?php ta_alternative_input_checkbox( 'ta_' . $place . '_latestposts_title_onoff', '表示する' ); ?>
    <span class="fixed-space"></span>
    <hr class="related-border">
    <table class="ta-fullcontents-table">
      <tr>
        <td style="width:20em;">
          <h4>最新投稿ダイジェストタイトルの要素名</h4>
<?php
  $factor_place = '表示フレーム用';
  if ( 'top' == $place ) { 
    $factor_place = 'メイン';
  } else if ( 'sidebar' == $place ) { 
    $factor_place = 'サイドバー';
  } else if ( 'sidebarsub' == $place ) { 
    $factor_place = 'サブサイドバー';
  }
          ta_factor_selection_process( 'ta_' . $place . '_latestposts_title_factor', 'option', 0, 'none', $factor_place ); ?>
        </td>
        <td>
          <h4 class="ta-html-strip">最新投稿ダイジェストタイトル名</h4>
          <?php ta_text_input( 'ta_' . $place . '_latestposts_title', 'middle_box' ); ?>
        </td>
      </tr>
    </table>
  </div><!-- end of #ta_<?php echo $place; ?>_latestposts_detail_frametitle_pro_disp -->
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <h4 id="ta_<?php echo $place; ?>_latestposts_detail_nodiscats_pro_title" class="pro-title"><a href="JavaScript:void(0);">非対象カテゴリー</a></h4>
  <div id="ta_<?php echo $place; ?>_latestposts_detail_nodiscats_pro_disp" class="pro-disp init-nodisp">
    <h4>非対象カテゴリー選択</h4>
    <p>※ 最新投稿表示をしないカテゴリー</p>
<?php 
  $init_value = ta_read_op( 'ta_' . $place . '_latestposts_nodis_cats' );
  $categories = get_categories( 'get=all' );
  foreach ( $categories as $category ) { ?>
    <p><input type="checkbox" name="ta_<?php echo $place; ?>_latestposts_nodis_cats[]" value="<?php echo $category->term_id; ?>" <?php ta_cat_check( $init_value, $category->term_id ); ?>> <?php echo $category->name; ?></p>
<?php
  } ?>
  </div><!-- end of #ta_<?php echo $place; ?>_latestposts_detail_nodiscats_pro_disp -->
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <h4 id="ta_<?php echo $place; ?>_latestposts_detail_dispmethod_pro_title" class="pro-title"><a href="JavaScript:void(0);">表示方法</a></h4>
  <div id="ta_<?php echo $place; ?>_latestposts_detail_dispmethod_pro_disp" class="pro-disp init-nodisp">
    <table class="ta-fullcontents-table">
      <tr>
        <td style="width:20em;">
          <h4>表示数</h4>
          <?php ta_simple_input( 'ta_' . $place . '_latestposts_num', '個', 'short_box' ); ?>
          <p>※ 全数表示は-1を設定してください</p>
        </td>
        <td>
          <h4>全コンテンツ表示モード</h4>
          <?php ta_alternative_input_checkbox( 'ta_' . $place . '_latestposts_full_content_onoff', '有効にする' ); ?>
          <p>※ アイキャッチ画像はフルサイズになります</p>
        </td>
      </tr>
    </table>
    <span class="fixed-space"></span>
    <hr class="fixed-border">
    <table class="ta-3contents-table">
      <tr>
        <td>
          <h4>記事行間縦方向の距離</h4>
          <?php ta_simple_input( 'ta_' . $place . '_latestposts_post_distance', 'ピクセル', 'short_box' ); ?>
        </td>
        <td>
          <h4>記事列数</h4>
          <?php $init = ta_read_op( 'ta_' . $place . '_latestposts_row_num' ); ?>
          <p><input type="radio" name="<?php echo 'ta_' . $place . '_latestposts_row_num'; ?>" value=1 <?php if ( 1 == $init ) echo 'checked="checked"'; ?>> 1列</p>
          <p><input type="radio" name="<?php echo 'ta_' . $place . '_latestposts_row_num'; ?>" value=2 <?php if ( 2 == $init ) echo 'checked="checked"'; ?>> 2列</p>
          <p><input type="radio" name="<?php echo 'ta_' . $place . '_latestposts_row_num'; ?>" value=3 <?php if ( 3 == $init ) echo 'checked="checked"'; ?>> 3列</p>
        </td>
        <td>
          <h4>記事列間横方向の距離</h4>
          <?php ta_simple_input( 'ta_' . $place . '_latestposts_row_distance', '％', 'short_box' ); ?>
          <p>※ 有効最大幅に対しての比率</p>
        </td>
      </tr>
    </table>
  </div><!-- end of #ta_<?php echo $place; ?>_latestposts_detail_dispmethod_pro_disp -->
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <h4 id="ta_<?php echo $place; ?>_latestposts_detail_pager_pro_title" class="pro-title"><a href="JavaScript:void(0);">ページャー</a></h4>
  <div id="ta_<?php echo $place; ?>_latestposts_detail_pager_pro_disp" class="pro-disp init-nodisp">
    <?php $init = ta_read_op( 'ta_' . $place . '_latestposts_pager_type' ); ?>
    <p><input type="radio" name="<?php echo 'ta_' . $place . '_latestposts_pager_type'; ?>" value="none" <?php if ( "none" == $init ) echo 'checked="checked"'; ?>> 非表示</p>
    <p><input type="radio" name="<?php echo 'ta_' . $place . '_latestposts_pager_type'; ?>" value="numdisp" <?php if ( "numdisp" == $init ) echo 'checked="checked"'; ?>> ページ番号表記</p>
    <p><input type="radio" name="<?php echo 'ta_' . $place . '_latestposts_pager_type'; ?>" value="prenext" <?php if ( "prenext" == $init ) echo 'checked="checked"'; ?>> 前後表記</p>
    <p>※ 同一ページ内で複数のダイジェストページャーを使用すると互いの動作に意図しない影響を与えます。
    <br>ダイジェストページャーの使用は同一ページ内で一つにすることをおすすめします</p>
  </div><!-- end of #ta_<?php echo $place; ?>_latestposts_detail_pager_pro_disp -->
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <h4 id="ta_<?php echo $place; ?>_latestposts_detail_border_pro_title" class="pro-title"><a href="JavaScript:void(0);">記事境界線</a></h4>
  <div id="ta_<?php echo $place; ?>_latestposts_detail_border_pro_disp" class="pro-disp init-nodisp">
    <table class="ta-3contents-table">
      <tr>
        <td>
          <h4>記事境界線</h4>
          <?php $init = ta_read_op( 'ta_' . $place . '_latestposts_post_border_type' ); ?>
          <table class="ta-fullcontents-table">
            <tr>
              <td style="width:7em;">
                <p><input type="radio" name="<?php echo 'ta_' . $place . '_latestposts_post_border_type'; ?>" value="none" <?php if ( "none" == $init ) echo 'checked="checked"' ?>> 非表示</p>
              </td>
              <td></td>
            </tr>
            <tr>
              <td>
                <p><input type="radio" name="<?php echo 'ta_' . $place . '_latestposts_post_border_type'; ?>" value="b" <?php if ( "b" == $init ) echo 'checked="checked"' ?>> 下</p>
              </td>
              <td>
                <p><input type="radio" name="<?php echo 'ta_' . $place . '_latestposts_post_border_type'; ?>" value="r-b" <?php if ( "r-b" == $init ) echo 'checked="checked"' ?>> 右＋下</p>
              </td>
            </tr>
            <tr>
              <td>
                <p><input type="radio" name="<?php echo 'ta_' . $place . '_latestposts_post_border_type'; ?>" value="l-b" <?php if ( "l-b" == $init ) echo 'checked="checked"' ?>> 左＋下</p>
              </td>
              <td>
                <p><input type="radio" name="<?php echo 'ta_' . $place . '_latestposts_post_border_type'; ?>" value="square" <?php if ( "square" == $init ) echo 'checked="checked"' ?>> 四方</p>
              </td>
            </tr>
          </table>
          <p>※ 余白挿入位置も兼ねます</p>
        </td>
        <td>
          <h4>記事境界線の種類</h4>
          <?php $init = ta_read_op( 'ta_' . $place . '_latestposts_post_border_kind' ); ?>
          <table class="ta-fullcontents-table">
            <tr>
              <td style="width:7em;">
                <p><input type="radio" name="<?php echo 'ta_' . $place . '_latestposts_post_border_kind'; ?>" value="solid" <?php if ( "solid" == $init ) echo 'checked="checked"' ?>> 実線</p>
              </td>
              <td>
                <p><input type="radio" name="<?php echo 'ta_' . $place . '_latestposts_post_border_kind'; ?>" value="double" <?php if ( "double" == $init ) echo 'checked="checked"' ?>> 二重線</p>
              </td>
            </tr>
            <tr>
              <td>
                <p><input type="radio" name="<?php echo 'ta_' . $place . '_latestposts_post_border_kind'; ?>" value="dotted" <?php if ( "dotted" == $init ) echo 'checked="checked"' ?>> 点線</p>
              </td>
              <td>
                <p><input type="radio" name="<?php echo 'ta_' . $place . '_latestposts_post_border_kind'; ?>" value="groove" <?php if ( "groove" == $init ) echo 'checked="checked"' ?>> groove</p>
              </td>
            </tr>
            <tr>
              <td>
                <p><input type="radio" name="<?php echo 'ta_' . $place . '_latestposts_post_border_kind'; ?>" value="dashed" <?php if ( "dashed" == $init ) echo 'checked="checked"' ?>> 破線</p>
              </td>
              <td>
                <p><input type="radio" name="<?php echo 'ta_' . $place . '_latestposts_post_border_kind'; ?>" value="ridge" <?php if ( "ridge" == $init ) echo 'checked="checked"' ?>> ridge</p>
              </td>
            </tr>
          </table>
        </td>
        <td>
          <h4>記事境界線の太さ</h4>
          <?php ta_simple_input( 'ta_' . $place . '_latestposts_post_border_size', 'ピクセル', 'short_box' ); ?>
        </td>
      </tr>
    </table>
    <span class="fixed-space"></span>
    <hr class="related-border">
    <table class="ta-3contents-table">
      <tr>
        <td>
          <h4>記事境界線の色</h4>
          <?php ta_color_picker_no_tomei_process( 'ta_' . $place . '_latestposts_post_border_color', 'valid' ); ?>
        </td>
        <td>
          <h4>記事境界線内の背景色</h4>
          <?php ta_color_picker_process( 'ta_' . $place . '_latestposts_post_border_bgcolor', 'valid' ); ?>
        </td>
        <td>
          <h4>記事境界とコンテンツの余白</h4>
          <?php ta_simple_input( 'ta_' . $place . '_latestposts_post_border_padding', 'ピクセル', 'short_box' ); ?>
          <p>※ コンテンツと境界線の距離</p>
        </td>
      </tr>
    </table>
    <span class="fixed-space"></span>
  </div><!-- end of #ta_<?php echo $place; ?>_latestposts_detail_border_pro_disp -->
<?php
}


/********* 各種投稿ダイジェスト詳細設定関数 *********/
function ta_postdigest_setting_detail( $place ) { ?>
  <h4 id="ta_<?php echo $place; ?>_postdigest_detail_cattitle_pro_title" class="pro-title"><a href="JavaScript:void(0);">カテゴリータイトル</a></h4>
  <div id="ta_<?php echo $place; ?>_postdigest_detail_cattitle_pro_disp" class="pro-disp init-nodisp">
    <h4>カテゴリータイトル</h4>
    <?php ta_alternative_input_checkbox( 'ta_' . $place . '_postdigest_title_onoff', '表示する' ); ?>
    <span class="fixed-space"></span>
    <hr class="related-border">
    <table class="ta-2contents-table">
      <tr>
        <td>
          <h4>カテゴリータイトルの要素名</h4>
<?php
  $factor_place = '表示フレーム用';
  if ( 'top' == $place ) {
    $factor_place = 'メイン';
  } else if ( 'sidebar' == $place ) {
    $factor_place = 'サイドバー';
  } else if ( 'sidebarsub' == $place ) {
    $factor_place = 'サブサイドバー';
  }
  ta_factor_selection_process( 'ta_' . $place . '_postdigest_title_factor', 'option', 0, 'none', $factor_place ); ?>
        </td>
        <td>
          <h4>カテゴリータイトルの一覧へのリンク</h4>
          <?php ta_alternative_input_checkbox( 'ta_' . $place . '_postdigest_title_link_onoff', 'リンクを張る' ); ?>
        </td>
      </tr>
    </table>
  </div><!-- end of #ta_<?php echo $place; ?>_postdigest_detail_cattitle_pro_disp -->
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <h4 id="ta_<?php echo $place; ?>_postdigest_detail_dispmethod_pro_title" class="pro-title"><a href="JavaScript:void(0);">表示方法</a></h4>
  <div id="ta_<?php echo $place; ?>_postdigest_detail_dispmethod_pro_disp" class="pro-disp init-nodisp">
    <table class="ta-fullcontents-table">
      <tr>
        <td style="width:20em;">
          <h4>表示数</h4>
          <?php ta_simple_input( 'ta_' . $place . '_postdigest_num', '個', 'short_box' ); ?>
          <p>※ 全数表示は-1を設定してください</p>
        </td>
        <td>
          <h4>全コンテンツ表示モード</h4>
          <?php ta_alternative_input_checkbox( 'ta_' . $place . '_postdigest_full_content_onoff', '有効にする' ); ?>
          ※ アイキャッチ画像はフルサイズになります
        </td>
      </tr>
    </table>
    <span class="fixed-space"></span>
    <hr class="fixed-border">
    <table class="ta-3contents-table">
      <tr>
        <td>
          <h4>記事行間縦方向の距離</h4>
          <?php ta_simple_input( 'ta_' . $place . '_postdigest_post_distance', 'ピクセル', 'short_box' ); ?>
        </td>
        <td>
          <h4>記事列数</h4>
          <?php $init = ta_read_op( 'ta_' . $place . '_postdigest_row_num' ); ?>
          <p><input type="radio" name="<?php echo 'ta_' . $place . '_postdigest_row_num'; ?>" value=1 <?php if ( 1 == $init ) echo 'checked="checked"'; ?>> 1列</p>
          <p><input type="radio" name="<?php echo 'ta_' . $place . '_postdigest_row_num'; ?>" value=2 <?php if ( 2 == $init ) echo 'checked="checked"'; ?>> 2列</p>
          <p><input type="radio" name="<?php echo 'ta_' . $place . '_postdigest_row_num'; ?>" value=3 <?php if ( 3 == $init ) echo 'checked="checked"'; ?>> 3列</p>
        </td>
        <td>
          <h4>記事列間横方向の距離</h4>
          <?php ta_simple_input( 'ta_' . $place . '_postdigest_row_distance', '％', 'short_box' ); ?>
          <p>※ 有効最大幅に対しての比率</p>
        </td>
      </tr>
    </table>
  </div><!-- end of #ta_<?php echo $place; ?>_postdigest_detail_dispmethod_pro_disp -->
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <h4 id="ta_<?php echo $place; ?>_postdigest_detail_catlink_pro_title" class="pro-title"><a href="JavaScript:void(0);">一覧リンク</a></h4>
  <div id="ta_<?php echo $place; ?>_postdigest_detail_catlink_pro_disp" class="pro-disp init-nodisp">
    <table class="ta-fullcontents-table">
      <tr>
        <td style="width:20em;">
          <h4>一覧リンク表示</h4>
          <?php ta_alternative_input_checkbox( 'ta_' . $place . '_postdigest_catlink_onoff', '表示する' ); ?>
        </td>
        <td>
          <h4>一覧リンク表示名</h4>
          <?php ta_text_input( 'ta_' . $place . '_postdigest_catlink_title', 'middle_box' ); ?>
          <p>※ %cat%の箇所にカテゴリー名を表示させることができます</p>
        </td>
      </tr>
    </table>
    <span class="fixed-space"></span>
    <hr class="related-border">
    <table class="ta-3contents-table">
      <tr>
        <td>
          <h4>一覧リンク表示名の下線</h4>
          <?php ta_alternative_input_checkbox( 'ta_' . $place . '_postdigest_catlink_title_underline_onoff', '表示する' ); ?>
        </td>
        <td>
          <h4>一覧リンク表示名のサイズ</h4>
          <?php ta_simple_input( 'ta_' . $place . '_postdigest_catlink_title_size', '％', 'short_box' ); ?>
        </td>
        <td>
          <h4>一覧リンク表示名の太さ</h4>
          <?php ta_fontweight_selection( 'ta_' . $place . '_postdigest_catlink_title_weight' ); ?>
        </td>
      </tr>
    </table>
    <span class="fixed-space"></span>
    <hr class="related-border">
    <table class="ta-2contents-table">
      <tr>
        <td>
          <h4>一覧リンク表示名色</h4>
          <?php ta_color_picker_no_tomei_process( 'ta_' . $place . '_postdigest_catlink_title_color', 'valid' ); ?>
        </td>
        <td>
          <h4>HOVER時の一覧リンク表示名色</h4>
          <?php ta_color_picker_no_tomei_process( 'ta_' . $place . '_postdigest_catlink_title_colorhover', 'valid' ); ?>
        </td>
      </tr>
    </table>
    <span class="fixed-space"></span>
    <hr class="related-border">
    <table class="ta-2contents-table">
      <tr>
        <td>
          <h4>一覧リンク表示背景色</h4>
          <?php ta_color_picker_no_tomei_process( 'ta_' . $place . '_postdigest_catlink_bgcolor', 'valid' ); ?>
        </td>
        <td>
          <h4>HOVER時の一覧リンク表示背景色</h4>
          <?php ta_color_picker_no_tomei_process( 'ta_' . $place . '_postdigest_catlink_bgcolorhover', 'valid' ); ?>
        </td>
      </tr>
    </table>
    <span class="fixed-space"></span>
    <hr class="related-border">
    <table class="ta-2contents-table">
      <tr>
        <td>
          <h4>一覧リンク表示背景の高さ</h4>
          <?php ta_simple_input( 'ta_' . $place . '_postdigest_catlink_height', 'em', 'short_box' ); ?>
        </td>
        <td>
          <h4>一覧リンク表示背景の最小幅</h4>
          <?php ta_simple_input( 'ta_' . $place . '_postdigest_catlink_minwidth', 'em', 'short_box' ); ?>
        </td>
      </tr>
    </table>
    <span class="fixed-space"></span>
    <hr class="related-border">
    <table class="ta-2contents-table">
      <tr>
        <td>
          <h4>一覧リンク表示背景の角の丸み</h4>
          <?php ta_simple_input( 'ta_' . $place . '_postdigest_catlink_round', 'ピクセル', 'short_box' ); ?>
          <p>※ 丸み無しは0を入力してください</p>
        </td>
        <td>
          <h4>一覧リンク表示のリスト下部との距離</h4>
          <?php ta_simple_input( 'ta_' . $place . '_postdigest_catlink_margintop', 'ピクセル', 'short_box' ); ?>
        </td>
      </tr>
    </table>
  </div><!-- end of #ta_<?php echo $place; ?>_postdigest_detail_catlink_pro_disp -->
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <h4 id="ta_<?php echo $place; ?>_postdigest_detail_pager_pro_title" class="pro-title"><a href="JavaScript:void(0);">ページャー</a></h4>
  <div id="ta_<?php echo $place; ?>_postdigest_detail_pager_pro_disp" class="pro-disp init-nodisp">
    <?php $init = ta_read_op( 'ta_' . $place . '_postdigest_pager_type' ); ?>
    <p><input type="radio" name="<?php echo 'ta_' . $place . '_postdigest_pager_type'; ?>" value="none" <?php if ( "none" == $init ) echo 'checked="checked"'; ?>> 非表示</p>
    <p><input type="radio" name="<?php echo 'ta_' . $place . '_postdigest_pager_type'; ?>" value="numdisp" <?php if ( "numdisp" == $init ) echo 'checked="checked"'; ?>> ページ番号表記</p>
    <p><input type="radio" name="<?php echo 'ta_' . $place . '_postdigest_pager_type'; ?>" value="prenext" <?php if ( "prenext" == $init ) echo 'checked="checked"'; ?>> 前後表記</p>
    <p>※ 同一ページ内で複数のダイジェストページャーを使用すると互いの動作に意図しない影響を与えます。
    <br>ダイジェストページャーの使用は同一ページ内で一つにすることをおすすめします</p>
  </div><!-- end of #ta_<?php echo $place; ?>_postdigest_detail_pager_pro_disp -->
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <h4 id="ta_<?php echo $place; ?>_postdigest_detail_border_pro_title" class="pro-title"><a href="JavaScript:void(0);">記事境界線</a></h4>
  <div id="ta_<?php echo $place; ?>_postdigest_detail_border_pro_disp" class="pro-disp init-nodisp">
    <table class="ta-3contents-table">
      <tr>
        <td>
          <h4>記事境界線</h4>
          <?php $init = ta_read_op( 'ta_' . $place . '_postdigest_post_border_type' ); ?>
          <table class="ta-fullcontents-table">
            <tr>
              <td style="width:7em;">
                <p><input type="radio" name="<?php echo 'ta_' . $place . '_postdigest_post_border_type'; ?>" value="none" <?php if ( "none" == $init ) echo 'checked="checked"' ?>> 非表示</p>
              </td>
              <td></td>
            </tr>
            <tr>
              <td>
                <p><input type="radio" name="<?php echo 'ta_' . $place . '_postdigest_post_border_type'; ?>" value="b" <?php if ( "b" == $init ) echo 'checked="checked"' ?>> 下</p>
              </td>
              <td>
                <p><input type="radio" name="<?php echo 'ta_' . $place . '_postdigest_post_border_type'; ?>" value="r-b" <?php if ( "r-b" == $init ) echo 'checked="checked"' ?>> 右＋下</p>
              </td>
            </tr>
            <tr>
              <td>
                <p><input type="radio" name="<?php echo 'ta_' . $place . '_postdigest_post_border_type'; ?>" value="l-b" <?php if ( "l-b" == $init ) echo 'checked="checked"' ?>> 左＋下</p>
              </td>
              <td>
                <p><input type="radio" name="<?php echo 'ta_' . $place . '_postdigest_post_border_type'; ?>" value="square" <?php if ( "square" == $init ) echo 'checked="checked"' ?>> 四方</p>
              </td>
            </tr>
          </table>
          <p>※ 余白挿入位置も兼ねます</p>
        <td>
          <h4>記事境界線の種類</h4>
          <?php $init = ta_read_op( 'ta_' . $place . '_postdigest_post_border_kind' ); ?>
          <table class="ta-fullcontents-table">
            <tr>
              <td style="width:7em;">
                <p><input type="radio" name="<?php echo 'ta_' . $place . '_postdigest_post_border_kind'; ?>" value="solid" <?php if ( "solid" == $init ) echo 'checked="checked"' ?>> 実線</p>
              </td>
              <td>
                <p><input type="radio" name="<?php echo 'ta_' . $place . '_postdigest_post_border_kind'; ?>" value="double" <?php if ( "double" == $init ) echo 'checked="checked"' ?>> 二重線</p>
              </td>
            </tr>
            <tr>
              <td>
                <p><input type="radio" name="<?php echo 'ta_' . $place . '_postdigest_post_border_kind'; ?>" value="dotted" <?php if ( "dotted" == $init ) echo 'checked="checked"' ?>> 点線</p>
              </td>
              <td>
                <p><input type="radio" name="<?php echo 'ta_' . $place . '_postdigest_post_border_kind'; ?>" value="groove" <?php if ( "groove" == $init ) echo 'checked="checked"' ?>> groove</p>
              </td>
            </tr>
            <tr>
              <td>
                <p><input type="radio" name="<?php echo 'ta_' . $place . '_postdigest_post_border_kind'; ?>" value="dashed" <?php if ( "dashed" == $init ) echo 'checked="checked"' ?>> 破線</p>
              </td>
              <td>
                <p><input type="radio" name="<?php echo 'ta_' . $place . '_postdigest_post_border_kind'; ?>" value="ridge" <?php if ( "ridge" == $init ) echo 'checked="checked"' ?>> ridge</p>
              </td>
            </tr>
          </table>
        </td>
        <td>
          <h4>記事境界線の太さ</h4>
          <?php ta_simple_input( 'ta_' . $place . '_postdigest_post_border_size', 'ピクセル', 'short_box' ); ?>
        </td>
      </tr>
    </table>
    <span class="fixed-space"></span>
    <hr class="related-border">
    <table class="ta-3contents-table">
      <tr>
        <td>
          <h4>記事境界線の色</h4>
          <?php ta_color_picker_no_tomei_process( 'ta_' . $place . '_postdigest_post_border_color', 'valid' ); ?>
        </td>
        <td>
          <h4>記事境界線内の背景色</h4>
          <?php ta_color_picker_process( 'ta_' . $place . '_postdigest_post_border_bgcolor', 'valid' ); ?>
        </td>
        <td>
          <h4>記事境界とコンテンツの余白</h4>
          <?php ta_simple_input( 'ta_' . $place . '_postdigest_post_border_padding', 'ピクセル', 'short_box' ); ?>
          <p>※ コンテンツと境界線の距離</p>
        </td>
      </tr>
    </table>
  </div><!-- end of #ta_<?php echo $place; ?>_postdigest_detail_border_pro_disp -->
<?php
}


/********* アーカイブ詳細設定関数 *********/
function ta_archive_setting_detail() { ?>
  <h4>全コンテンツ表示モード</h4>
  <?php ta_alternative_input_checkbox( 'ta_common_listpage_full_content_onoff', '有効にする（アイキャッチ画像はフルサイズになります）' ); ?>
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <table class="ta-3contents-table">
    <tr>
      <td>
        <h4>記事行間縦方向の距離</h4>
        <?php ta_simple_input( 'ta_common_listpage_post_distance', 'ピクセル', 'short_box' ); ?>
      </td>
      <td>
        <h4>記事列数</h4>
        <?php $init = ta_read_op( 'ta_common_listpage_row_num' ); ?>
        <p><input type="radio" name="<?php echo 'ta_common_listpage_row_num'; ?>" value=1 <?php if ( 1 == $init ) echo 'checked="checked"'; ?>> 1列</p>
        <p><input type="radio" name="<?php echo 'ta_common_listpage_row_num'; ?>" value=2 <?php if ( 2 == $init ) echo 'checked="checked"'; ?>> 2列</p>
        <p><input type="radio" name="<?php echo 'ta_common_listpage_row_num'; ?>" value=3 <?php if ( 3 == $init ) echo 'checked="checked"'; ?>> 3列</p>
      </td>
      <td>
        <h4>記事列間横方向の距離</h4>
        <?php ta_simple_input( 'ta_common_listpage_row_distance', '％', 'short_box' ); ?>
        <p>※ 有効最大幅に対しての比率</p>
      </td>
    </tr>
  </table>
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <h4>ページャー</h4>
  <?php $init = ta_read_op( 'ta_common_listpage_pager_type' ); ?>
  <p><input type="radio" name="ta_common_listpage_pager_type" value="none" <?php if ( "none" == $init ) echo 'checked="checked"'; ?>> 非表示</p>
  <p><input type="radio" name="ta_common_listpage_pager_type" value="numdisp" <?php if ( "numdisp" == $init ) echo 'checked="checked"'; ?>> ページ番号表記</p>
  <p><input type="radio" name="ta_common_listpage_pager_type" value="prenext" <?php if ( "prenext" == $init ) echo 'checked="checked"'; ?>> 前後表記</p>
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <table class="ta-3contents-table">
    <tr>
      <td>
        <h4>記事境界線</h4>
        <?php $init = ta_read_op( 'ta_common_listpage_post_border_type' ); ?>
        <table class="ta-fullcontents-table">
          <tr>
            <td style="width:7em;">
              <p><input type="radio" name="<?php echo 'ta_common_listpage_post_border_type'; ?>" value="none" <?php if ( "none" == $init ) echo 'checked="checked"' ?>> 非表示</p>
            </td>
            <td></td>
          </tr>
          <tr>
            <td>
              <p><input type="radio" name="<?php echo 'ta_common_listpage_post_border_type'; ?>" value="b" <?php if ( "b" == $init ) echo 'checked="checked"' ?>> 下</p>
            </td>
            <td>
              <p><input type="radio" name="<?php echo 'ta_common_listpage_post_border_type'; ?>" value="r-b" <?php if ( "r-b" == $init ) echo 'checked="checked"' ?>> 右＋下</p>
            </td>
          </tr>
          <tr>
            <td>
              <p><input type="radio" name="<?php echo 'ta_common_listpage_post_border_type'; ?>" value="l-b" <?php if ( "l-b" == $init ) echo 'checked="checked"' ?>> 左＋下</p>
            </td>
            <td>
              <p><input type="radio" name="<?php echo 'ta_common_listpage_post_border_type'; ?>" value="square" <?php if ( "square" == $init ) echo 'checked="checked"' ?>> 四方</p>
            </td>
          </tr>
        </table>
        <p>※ 余白挿入位置も兼ねます</p>
      </td>
      <td>
        <h4>記事境界線の種類</h4>
        <?php $init = ta_read_op( 'ta_common_listpage_post_border_kind' ); ?>
        <table class="ta-fullcontents-table">
          <tr>
            <td style="width:7em;">
              <p><input type="radio" name="<?php echo 'ta_common_listpage_post_border_kind'; ?>" value="solid" <?php if ( "solid" == $init ) echo 'checked="checked"' ?>> 実線</p>
            </td>
            <td>
              <p><input type="radio" name="<?php echo 'ta_common_listpage_post_border_kind'; ?>" value="double" <?php if ( "double" == $init ) echo 'checked="checked"' ?>> 二重線</p>
            </td>
          </tr>
          <tr>
            <td>
              <p><input type="radio" name="<?php echo 'ta_common_listpage_post_border_kind'; ?>" value="dotted" <?php if ( "dotted" == $init ) echo 'checked="checked"' ?>> 点線</p>
            </td>
            <td>
              <p><input type="radio" name="<?php echo 'ta_common_listpage_post_border_kind'; ?>" value="groove" <?php if ( "groove" == $init ) echo 'checked="checked"' ?>> groove</p>
            </td>
          </tr>
          <tr>
            <td>
              <p><input type="radio" name="<?php echo 'ta_common_listpage_post_border_kind'; ?>" value="dashed" <?php if ( "dashed" == $init ) echo 'checked="checked"' ?>> 破線</p>
            </td>
            <td>
              <p><input type="radio" name="<?php echo 'ta_common_listpage_post_border_kind'; ?>" value="ridge" <?php if ( "ridge" == $init ) echo 'checked="checked"' ?>> ridge</p>
            </td>
          </tr>
        </table>
      </td>
      <td>
        <h4>記事境界線の太さ</h4>
        <?php ta_simple_input( 'ta_common_listpage_post_border_size', 'ピクセル', 'short_box' ); ?>
      </td>
    </tr>
  </table>
  <span class="fixed-space"></span>
  <hr class="related-border">
  <table class="ta-3contents-table">
    <tr>
      <td>
        <h4>記事境界線の色</h4>
        <?php ta_color_picker_no_tomei_process( 'ta_common_listpage_post_border_color', 'valid' ); ?>
      </td>
      <td>
        <h4>記事境界線内の背景色</h4>
        <?php ta_color_picker_process( 'ta_common_listpage_post_border_bgcolor', 'valid' ); ?>
      </td>
      <td>
        <h4>記事境界とコンテンツの余白</h4>
        <?php ta_simple_input( 'ta_common_listpage_post_border_padding', 'ピクセル', 'short_box' ); ?>
        <p>※ コンテンツと境界線の距離</p>
      </td>
    </tr>
  </table>
  <span class="fixed-space"></span>
<?php
}


/********* ダイジェスト記事のデザイン設定関数 *********/
function ta_article_digest_design( $place_and_role ) { ?>
  <h4 id="ta_<?php echo $place_and_role; ?>_newwin_pro_title" class="pro-title"><a href="JavaScript:void(0);">リンク時の新規ウィンドウ</a></h4>
  <div id="ta_<?php echo $place_and_role; ?>_newwin_pro_disp" class="pro-disp init-nodisp">
    <h4>リンク時の新規ウィンドウ</h4>
    <?php ta_alternative_input_checkbox( 'ta_' . $place_and_role . '_newwin_onoff', 'リンク時に新規ウィンドウで開く' ); ?>
  </div><!-- end of #ta_<?php echo $place_and_role; ?>_newwin_pro_disp -->
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <h4 id="ta_<?php echo $place_and_role; ?>_timecattitle_pro_title" class="pro-title"><a href="JavaScript:void(0);">日時カテゴリー・記事タイトルの表記</a></h4>
  <div id="ta_<?php echo $place_and_role; ?>_timecattitle_pro_disp" class="pro-disp init-nodisp">
    <table class="ta-3contents-table">
      <tr>
        <td>
          <h4>独立欄</h4>
          <?php $init = ta_read_op( 'ta_' . $place_and_role . '_ind' ); ?>
          <p><input type="radio" name="<?php echo 'ta_' . $place_and_role . '_ind'; ?>" value="timecat-title" <?php if ( "timecat-title" == $init ) echo 'checked="checked"'; ?>> 上: 日時カテゴリー, 下: 記事タイトル</p>
          <p><input type="radio" name="<?php echo 'ta_' . $place_and_role . '_ind'; ?>" value="title-timecat" <?php if ( "title-timecat" == $init ) echo 'checked="checked"'; ?>> 上: 記事タイトル, 下: 日時カテゴリー</p>
          <p><input type="radio" name="<?php echo 'ta_' . $place_and_role . '_ind'; ?>" value="timecat" <?php if ( "timecat" == $init ) echo 'checked="checked"'; ?>> 日時カテゴリー単独</p>
          <p><input type="radio" name="<?php echo 'ta_' . $place_and_role . '_ind'; ?>" value="title" <?php if ( "title" == $init ) echo 'checked="checked"'; ?>> 記事タイトル単独</p>
          <p><input type="radio" name="<?php echo 'ta_' . $place_and_role . '_ind'; ?>" value="none" <?php if ( "none" == $init ) echo 'checked="checked"'; ?>> 未使用</p>
        </td>
        <td>
          <h4>コンテンツグループ上部</h4>
          <?php $init = ta_read_op( 'ta_' . $place_and_role . '_cg_top' ); ?>
          <p><input type="radio" name="<?php echo 'ta_' . $place_and_role . '_cg_top'; ?>" value="timecat-title" <?php if ( "timecat-title" == $init ) echo 'checked="checked"'; ?>> 上: 日時カテゴリー, 下: 記事タイトル</p>
          <p><input type="radio" name="<?php echo 'ta_' . $place_and_role . '_cg_top'; ?>" value="title-timecat" <?php if ( "title-timecat" == $init ) echo 'checked="checked"'; ?>> 上: 記事タイトル, 下: 日時カテゴリー</p>
          <p><input type="radio" name="<?php echo 'ta_' . $place_and_role . '_cg_top'; ?>" value="timecat" <?php if ( "timecat" == $init ) echo 'checked="checked"'; ?>> 日時カテゴリー単独</p>
          <p><input type="radio" name="<?php echo 'ta_' . $place_and_role . '_cg_top'; ?>" value="title" <?php if ( "title" == $init ) echo 'checked="checked"'; ?>> 記事タイトル単独</p>
          <p><input type="radio" name="<?php echo 'ta_' . $place_and_role . '_cg_top'; ?>" value="none" <?php if ( "none" == $init ) echo 'checked="checked"'; ?>> 未使用</p>
        </td>
        <td>
          <h4>コンテンツグループ下部</h4>
          <?php $init = ta_read_op( 'ta_' . $place_and_role . '_cg_bottom' ); ?>
          <p><input type="radio" name="<?php echo 'ta_' . $place_and_role . '_cg_bottom'; ?>" value="timecat-title" <?php if ( "timecat-title" == $init ) echo 'checked="checked"'; ?>> 上: 日時カテゴリー, 下: 記事タイトル</p>
          <p><input type="radio" name="<?php echo 'ta_' . $place_and_role . '_cg_bottom'; ?>" value="title-timecat" <?php if ( "title-timecat" == $init ) echo 'checked="checked"'; ?>> 上: 記事タイトル, 下: 日時カテゴリー</p>
          <p><input type="radio" name="<?php echo 'ta_' . $place_and_role . '_cg_bottom'; ?>" value="timecat" <?php if ( "timecat" == $init ) echo 'checked="checked"'; ?>> 日時カテゴリー単独</p>
          <p><input type="radio" name="<?php echo 'ta_' . $place_and_role . '_cg_bottom'; ?>" value="title" <?php if ( "title" == $init ) echo 'checked="checked"'; ?>> 記事タイトル単独</p>
          <p><input type="radio" name="<?php echo 'ta_' . $place_and_role . '_cg_bottom'; ?>" value="none" <?php if ( "none" == $init ) echo 'checked="checked"'; ?>> 未使用</p>
        </td>
      </tr>
    </table>
  </div><!-- end of #ta_<?php echo $place_and_role; ?>_timecattitle_pro_disp -->
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <h4 id="ta_<?php echo $place_and_role; ?>_articletitle_pro_title" class="pro-title"><a href="JavaScript:void(0);">記事タイトル</a></h4>
  <div id="ta_<?php echo $place_and_role; ?>_articletitle_pro_disp" class="pro-disp init-nodisp">
    <h4>記事タイトルの要素名</h4>
<?php
  $factor_place = '表示フレーム用';
  if ( 'top_latestposts' == $place_and_role || 'top_postdigest' == $place_and_role ) { 
    $factor_place = 'メイン';
  } else if ( 'sidebar_latestposts' == $place_and_role || 'sidebar_postdigest' == $place_and_role ) { 
    $factor_place = 'サイドバー';
  } else if ( 'sidebarsub_latestposts' == $place_and_role || 'sidebarsub_postdigest' == $place_and_role ) { 
    $factor_place = 'サブサイドバー';
  } else if ( 'common_listpage' == $place_and_role ) {
    $factor_place = 'メイン';
  }
  ta_factor_selection_process( 'ta_' . $place_and_role . '_post_title_factor', 'option', 0, 'none', $factor_place ); ?>
  </div><!-- end of #ta_<?php echo $place_and_role; ?>_articletitle_place_pro_disp -->
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <h4 id="ta_<?php echo $place_and_role; ?>_timecat_pro_title" class="pro-title"><a href="JavaScript:void(0);">日時カテゴリー</a></h4>
  <div id="ta_<?php echo $place_and_role; ?>_timecat_pro_disp" class="pro-disp init-nodisp">
    <table class="ta-3contents-table">
      <tr>
        <td>
          <h4>日時カテゴリー</h4>
          <?php $init = ta_read_op( 'ta_' . $place_and_role . '_timecat' ); ?>
          <p><input type="radio" name="<?php echo 'ta_' . $place_and_role . '_timecat'; ?>" value="time-cat" <?php if ( "time-cat" == $init ) echo 'checked="checked"'; ?>> 左：日時、右：カテゴリー</p>
          <p><input type="radio" name="<?php echo 'ta_' . $place_and_role . '_timecat'; ?>" value="cat-time" <?php if ( "cat-time" == $init ) echo 'checked="checked"'; ?>> 左：カテゴリー、右：日時</p>
        </td>
        <td>
          <h4>日時</h4>
          <?php ta_alternative_input_checkbox( 'ta_' . $place_and_role . '_time_onoff', '表示する' ); ?>
        </td>
        <td>
          <h4>カテゴリー</h4>
          <?php ta_alternative_input_checkbox( 'ta_' . $place_and_role . '_cat_onoff', '表示する' ); ?>
        </td>
      </tr>
    </table>
    <span class="fixed-space"></span>
    <hr class="fixed-border">
    <table class="ta-3contents-table">
      <tr>
        <td>
          <h4>日時文字の色</h4>
          <?php ta_color_picker_no_tomei_process( 'ta_' . $place_and_role . '_time_color', 'valid' ); ?>
        </td>
        <td>
          <h4>日時文字のサイズ</h4>
          <?php ta_simple_input( 'ta_' . $place_and_role . '_time_size', '％', 'short_box' ); ?>
        </td>
        <td>
          <h4>日時文字の太さ</h4>
          <?php ta_fontweight_selection( 'ta_' . $place_and_role . '_time_weight' ); ?>
        </td>
      </tr>
    </table>
    <span class="fixed-space"></span>
    <hr class="related-border">
    <h4>日時文字の時計マーク <span class="dashicons dashicons-clock"></span></h4>
    <?php ta_alternative_input_checkbox( 'ta_' . $place_and_role . '_watchmark_onoff', '表示する' ); ?>
    <span class="fixed-space"></span>
    <hr class="fixed-border">
    <table class="ta-2contents-table">
      <tr>
        <td>
          <h4>カテゴリー文字のサイズ</h4>
          <?php ta_simple_input( 'ta_' . $place_and_role . '_cat_size', '％', 'short_box' ); ?>
        </td>
        <td>
          <h4>カテゴリー文字の太さ</h4>
          <?php ta_fontweight_selection( 'ta_' . $place_and_role . '_cat_weight' ); ?>
        </td>
      </tr>
    </table>
    <span class="fixed-space"></span>
    <hr class="related-border">
    <table class="ta-3contents-table">
      <tr>
        <td>
          <h4>カテゴリー表示の高さ</h4>
          <?php ta_simple_input( 'ta_' . $place_and_role . '_cat_height', 'em', 'short_box' ); ?>
        </td>
        <td>
          <h4>カテゴリー表示の最小幅</h4>
          <?php ta_simple_input( 'ta_' . $place_and_role . '_cat_width', 'em', 'short_box' ); ?>
        </td>
        <td>
          <h4>カテゴリー表示の角の丸み</h4>
          <?php ta_simple_input( 'ta_' . $place_and_role . '_cat_round', 'ピクセル', 'short_box' ); ?>
          <p>※ 丸み無しは0を入力してください</p>
        </td>
      </tr>
    </table>
  </div><!-- end of #ta_<?php echo $place_and_role; ?>_timecat_pro_disp -->
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <h4 id="ta_<?php echo $place_and_role; ?>_contents_gp_pro_title" class="pro-title"><a href="JavaScript:void(0);">コンテンツグループ</a></h4>
  <div id="ta_<?php echo $place_and_role; ?>_contents_gp_pro_disp" class="pro-disp init-nodisp">
    <h4>コンテンツグループ表示</h4>
    <?php ta_alternative_input_checkbox( 'ta_' . $place_and_role . '_cgp_onoff', '表示する' ); ?>
    <span class="fixed-space"></span>
    <hr class="fixed-border">
    <table class="ta-3contents-table">
      <tr>
        <td>
          <h4>コンテンツグループ画像の位置</h4>
          <?php $init = ta_read_op( 'ta_' . $place_and_role . '_img_pos' ); ?>
          <p><input type="radio" name="<?php echo 'ta_' . $place_and_role . '_img_pos'; ?>" value="left" <?php if ( "left" == $init ) echo 'checked="checked"'; ?>> 左</p>
          <p><input type="radio" name="<?php echo 'ta_' . $place_and_role . '_img_pos'; ?>" value="right" <?php if ( "right" == $init ) echo 'checked="checked"'; ?>> 右</p>
          <span class="fixed-space"></span>
        </td>
        <td>
          <h4>コンテンツグループ画像の余白</h4>
          <?php ta_simple_input( 'ta_' . $place_and_role . '_img_padding', 'ピクセル', 'short_box' ); ?>
          <p>※ 左または右端からのPadding値</p>
        </td>
        <td>
          <h4>コンテンツグループ画像のサイズ</h4>
          <?php $init = ta_read_op( 'ta_' . $place_and_role . '_img_size' ); ?>
          <table class="ta-fullcontents-table">
            <tr>
              <td style="width:10em;">
                <p><input type="radio" name="<?php echo 'ta_' . $place_and_role . '_img_size'; ?>" value="ta_square_image240" <?php if ( "ta_square_image240" == $init ) echo 'checked="checked"'; ?>> 240 x 240 px</p>
              </td>
              <td>
                <p><input type="radio" name="<?php echo 'ta_' . $place_and_role . '_img_size'; ?>" value="ta_square_image90" <?php if ( "ta_square_image90" == $init ) echo 'checked="checked"'; ?>> 90 x 90 px</p>
              </td>
            </tr>
            <tr>
              <td>
                <p><input type="radio" name="<?php echo 'ta_' . $place_and_role . '_img_size'; ?>" value="ta_square_image180" <?php if ( "ta_square_image180" == $init ) echo 'checked="checked"'; ?>> 180 x 180 px</p>
              </td>
              <td>
                <p><input type="radio" name="<?php echo 'ta_' . $place_and_role . '_img_size'; ?>" value="ta_square_image60" <?php if ( "ta_square_image60" == $init ) echo 'checked="checked"'; ?>> 60 x 60 px</p>
              </td>
            </tr>
            <tr>
              <td>
                <p><input type="radio" name="<?php echo 'ta_' . $place_and_role . '_img_size'; ?>" value="ta_square_image120" <?php if ( "ta_square_image120" == $init ) echo 'checked="checked"'; ?>> 120 x 120 px</p>
              </td>
              <td>
                <p><input type="radio" name="<?php echo 'ta_' . $place_and_role . '_img_size'; ?>" value="none" <?php if ( "none" == $init ) echo 'checked="checked"'; ?>> 非表示
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
    <span class="fixed-space"></span>
    <hr class="fixed-border">
    <table class="ta-fullcontents-table">
      <tr>
        <td style="width:20em;">
          <h4>コンテンツグループ抜粋文字数</h4>
          <?php ta_simple_input( 'ta_' . $place_and_role . '_excerpt', '個', 'short_box' ); ?>
          <p>※ 非表示は0を入力してください</p>
        </td>
        <td>
          <h4>コンテンツグループ抜粋枠の最小高さ</h4>
          <?php ta_simple_input( 'ta_' . $place_and_role . '_excerpt_minheight', 'ピクセル', 'short_box' ); ?>
          <p>※ コンテンツグループ画像とサイズバランスを取るため</p>
        </td>
      </tr>
    </table>
    <span class="fixed-space"></span>
    <hr class="related-border">
    <table class="ta-2contents-table">
      <tr>
        <td>
          <h4>抜粋文字の上部余白</h4>
          <?php ta_simple_input( 'ta_' . $place_and_role . '_excerpt_tpadding', 'em', 'short_box' ); ?>
        </td>
        <td>
          <h4>抜粋文字の下部余白</h4>
          <?php ta_simple_input( 'ta_' . $place_and_role . '_excerpt_bpadding', 'em', 'short_box' ); ?>
        </td>
      </tr>
    </table>
    <span class="fixed-space"></span>
    <hr class="related-border">
    <h4>抜粋文字装飾（共通設定 or 専用装飾）</h4>
    <?php ta_alternative_input_checkbox( 'ta_' . $place_and_role . '_excerpt_onlyfor_onoff', '専用装飾を使用する' ); ?>
    <span class="fixed-space"></span>
    <hr class="related-border">
    <table class="ta-3contents-table">
      <tr>
        <td>
          <h4>専用装飾の抜粋文字サイズ</h4>
          <?php ta_simple_input( 'ta_' . $place_and_role . '_excerpt_size', '％', 'short_box' ); ?>
        </td>
        <td>
          <h4>専用装飾の抜粋文字太さ</h4>
          <?php ta_fontweight_selection( 'ta_' . $place_and_role . '_excerpt_weight' ); ?>
        </td>
        <td>
          <h4>専用装飾の抜粋文字高さ</h4>
          <?php ta_simple_input( 'ta_' . $place_and_role . '_excerpt_lineheight', 'em', 'short_box' ); ?>
        </td>
      </tr>
    </table>
    <span class="fixed-space"></span>
    <hr class="related-border">
    <?php ta_linkedtext_setting( 
            '専用装飾の抜粋文字',
            'ta_' . $place_and_role . '_excerpt_anchor_color', 'invalid',
            'ta_' . $place_and_role . '_excerpt_anchor_under',
            'ta_' . $place_and_role . '_excerpt_anchor_colorhover', 'invalid',
            'ta_' . $place_and_role . '_excerpt_anchor_underhover' ); ?>
  </div><!-- end of #ta_<?php echo $place_and_role; ?>_contents_gp_pro_disp -->
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <h4 id="ta_<?php echo $place_and_role; ?>_excerpt_rightmark_pro_title" class="pro-title"><a href="JavaScript:void(0);">右側続き誘導マーク</a></h4>
  <div id="ta_<?php echo $place_and_role; ?>_excerpt_rightmark_pro_disp" class="pro-disp init-nodisp">
    <h4>コンテンツグループ抜粋枠右側の続き誘導マーク</h4>
    <?php $init_value = ta_read_op( 'ta_' . $place_and_role . '_excerpt_rightmark' ); $init_color = ta_read_op( 'ta_' . $place_and_role . '_excerpt_rightmark_color' ); ?>
    <span style="color:<?php echo $init_color; ?>">
      <p><input type="radio" name="<?php echo 'ta_' . $place_and_role . '_excerpt_rightmark'; ?>" value="f139" <?php if ( "f139" == $init_value ) echo 'checked="checked"'; ?>> <span class="dashicons dashicons-arrow-right"></span></p>
      <p><input type="radio" name="<?php echo 'ta_' . $place_and_role . '_excerpt_rightmark'; ?>" value="f344" <?php if ( "f344" == $init_value ) echo 'checked="checked"'; ?>> <span class="dashicons dashicons-arrow-right-alt"></span></p>
      <p><input type="radio" name="<?php echo 'ta_' . $place_and_role . '_excerpt_rightmark'; ?>" value="f345" <?php if ( "f345" == $init_value ) echo 'checked="checked"'; ?>> <span class="dashicons dashicons-arrow-right-alt2"></span></p>
    </span>
    <p><input type="radio" name="<?php echo 'ta_' . $place_and_role . '_excerpt_rightmark'; ?>" value="none" <?php if ( "none" == $init_value ) echo 'checked="checked"'; ?>> 非表示</p>
    <span class="fixed-space"></span>
    <hr class="related-border">
    <table class="ta-3contents-table">
      <tr>
        <td>
          <h4>右側続き誘導マークの色</h4>
          <?php ta_color_picker_no_tomei_process( 'ta_' . $place_and_role . '_excerpt_rightmark_color', 'valid' ); ?>
        </td>
        <td>
          <h4>右側続き誘導マークのサイズ</h4>
          <?php ta_simple_input( 'ta_' . $place_and_role . '_excerpt_rightmark_size', '％', 'short_box' ); ?>
        </td>
        <td>
          <h4>右側続き誘導マークの太さ</h4>
          <?php ta_fontweight_selection( 'ta_' . $place_and_role . '_excerpt_rightmark_weight' ); ?>
        </td>
      </tr>
    </table>
    <span class="fixed-space"></span>
    <hr class="related-border">
    <table class="ta-3contents-table">
      <tr>
        <td>
          <h4>右側続き誘導マークの表示幅</h4>
          <?php ta_simple_input( 'ta_' . $place_and_role . '_excerpt_rightmark_width', '％', 'short_box' ); ?>
        </td>
        <td>
          <h4>右側続き誘導マークの透明度</h4>
          <?php ta_simple_input( 'ta_' . $place_and_role . '_excerpt_rightmark_opacity', '', 'short_box' ); ?>
          <p>※ 0.0：透明 ～ 1.0：非透明</p>
        </td>
        <td>
          <h4>右側続き誘導マークのHOVER透明度</h4>
          <?php ta_simple_input( 'ta_' . $place_and_role . '_excerpt_rightmark_opacityhover', '', 'short_box' ); ?>
          <p>※ 0.0：透明 ～ 1.0：非透明</p>
        </td>
      </tr>
    </table>
  </div><!-- end of #ta_<?php echo $place_and_role; ?>_excerpt_rightmark_pro_disp -->
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <h4 id="ta_<?php echo $place_and_role; ?>_excerpt_lowermark_pro_title" class="pro-title"><a href="JavaScript:void(0);">下側続き誘導マーク</a></h4>
  <div id="ta_<?php echo $place_and_role; ?>_excerpt_lowermark_pro_disp" class="pro-disp init-nodisp">
    <table class="ta-2contents-table">
      <tr>
        <td>
          <h4>コンテンツグループ抜粋下<br>続き誘導マーク</h4>
          <?php $init_value = ta_read_op( 'ta_' . $place_and_role . '_excerpt_lowermark' ); ?>
          <p><input type="radio" name="<?php echo 'ta_' . $place_and_role . '_excerpt_lowermark'; ?>" value="left" <?php if ( "left" == $init_value ) echo 'checked="checked"'; ?>> 左側に表示</p>
          <p><input type="radio" name="<?php echo 'ta_' . $place_and_role . '_excerpt_lowermark'; ?>" value="right" <?php if ( "right" == $init_value ) echo 'checked="checked"'; ?>> 右側に表示</p>
          <p><input type="radio" name="<?php echo 'ta_' . $place_and_role . '_excerpt_lowermark'; ?>" value="none" <?php if ( "none" == $init_value ) echo 'checked="checked"'; ?>> 非表示</p>
        </td>
        <td>
          <h4>続き誘導マークの抜粋枠からの距離</h4>
          <?php ta_simple_input( 'ta_' . $place_and_role . '_excerpt_lowermark_paddingtop', 'ピクセル', 'short_box' ); ?>
        </td>
      </tr>
    </table>
    <span class="fixed-space"></span>
    <hr class="fixed-border">
    <table class="ta-3contents-table">
      <tr>
        <td>
          <h4>下側続き誘導マーク</h4>
          <?php ta_text_input( 'ta_' . $place_and_role . '_excerpt_lowermark_title', 'middle_box' ); ?>
        </td>
        <td>
          <h4>下側続き誘導マークのサイズ</h4>
          <?php ta_simple_input( 'ta_' . $place_and_role . '_excerpt_lowermark_title_size', '％', 'short_box' ); ?>
        </td>
        <td>
          <h4>下側続き誘導マークの太さ</h4>
          <?php ta_fontweight_selection( 'ta_' . $place_and_role . '_excerpt_lowermark_title_weight' ); ?>
        </td>
      </tr>
    </table>
    <span class="fixed-space"></span>
    <hr class="related-border">
    <?php ta_linkedtext_setting( 
          '下側続き誘導マーク',
          'ta_' . $place_and_role . '_excerpt_lowermark_title_color', 'invalid',
          'ta_' . $place_and_role . '_excerpt_lowermark_title_underline_onoff',
          'ta_' . $place_and_role . '_excerpt_lowermark_title_colorhover', 'invalid',
          'ta_' . $place_and_role . '_excerpt_lowermark_title_hoverunderline_onoff' ); ?>
    <span class="fixed-space"></span>
    <hr class="fixed-border">
    <table class="ta-fullcontents-table">
      <tr>
        <td style="width:20em;">
          <h4>下側続き誘導マーク背景色</h4>
          <?php ta_color_picker_process( 'ta_' . $place_and_role . '_excerpt_lowermark_bgcolor', 'valid' ); ?>
        </td>
        <td>
          <h4>HOVER時の下側続き誘導マーク背景色</h4>
          <?php ta_color_picker_process( 'ta_' . $place_and_role . '_excerpt_lowermark_bgcolorhover', 'valid' ); ?>
        </td>
      </tr>
    </table>
    <span class="fixed-space"></span>
    <hr class="related-border">
    <table class="ta-3contents-table">
      <tr>
        <td>
          <h4>下側続き誘導マーク背景の高さ</h4>
          <?php ta_simple_input( 'ta_' . $place_and_role . '_excerpt_lowermark_height', 'em', 'short_box' ); ?>
        </td>
        <td>
          <h4>下側続き誘導マーク背景の最小幅</h4>
          <?php ta_simple_input( 'ta_' . $place_and_role . '_excerpt_lowermark_minwidth', 'em', 'short_box' ); ?>
        </td>
        <td>
          <h4>下側続き誘導マーク背景の角の丸み</h4>
          <?php ta_simple_input( 'ta_' . $place_and_role . '_excerpt_lowermark_round', 'ピクセル', 'short_box' ); ?>
          <p>※ 丸み無しは0を入力してください</p>
        </td>
      </tr>
    </table>
    <span class="fixed-space"></span>
  </div><!-- end of #ta_<?php echo $place_and_role; ?>_excerpt_lowermark_pro_disp -->
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <h4 id="ta_<?php echo $place_and_role; ?>_release_mark_pro_title" class="pro-title"><a href="JavaScript:void(0);">新規投稿マーク</a></h4>
  <div id="ta_<?php echo $place_and_role; ?>_release_mark_pro_disp" class="pro-disp init-nodisp">
    <table class="ta-2contents-table">
      <tr>
        <td>
          <h4>新規投稿マーク</h4>
          <?php ta_alternative_input_checkbox( 'ta_' . $place_and_role . '_release_mark_onoff', '表示する' ); ?>
        </td>
        <td>
          <h4>新規投稿の日数定義</h4>
          <?php ta_simple_input( 'ta_' . $place_and_role . '_release_mark_days', '日間', 'short_box' ); ?>
          <p>※ 投稿日から何日間マークを表示するか</p>
        </td>
      </tr>
    </table>
    <span class="fixed-space"></span>
    <hr class="fixed-border">
    <h4>新規投稿マーク画像</h4>
    <?php ta_img_upload_process( 'ta_' . $place_and_role . '_release_mark_pic' ); ?>
    <p>※ 縦横幅の最大値を500ピクセルに制限しています</p>
    <p>※ 新規投稿マーク画像は記事タイトルの文字サイズに自動で合わせます</p>
    <span class="fixed-space"></span>
    <hr class="fixed-border">
    <h4 class="ta-html-strip">新規投稿マーク画像の代替テキスト</h4>
    <?php ta_text_input( 'ta_' . $place_and_role . '_release_mark_text', 'middle_box' ); ?>
    <p>※ 画像がある場合は無効</p>
    <span class="fixed-space"></span>
    <hr class="related-border">
    <table class="ta-2contents-table">
      <tr>
        <td>
          <h4>代替テキストの色</h4>
          <?php ta_color_picker_no_tomei_process( 'ta_' . $place_and_role . '_release_mark_text_color', 'valid' ); ?>
        </td>
        <td>
          <h4>代替テキストの太さ</h4>
          <?php ta_fontweight_selection( 'ta_' . $place_and_role . '_release_mark_text_weight' ); ?>
        </td>
      </tr>
    </table>
    <span class="fixed-space"></span>
    <hr class="related-border">
    <table class="ta-2contents-table">
      <tr>
        <td>
          <h4>代替テキストの背景色</h4>
          <?php ta_color_picker_no_tomei_process( 'ta_' . $place_and_role . '_release_mark_text_bgcolor', 'valid' ); ?>
        </td>
        <td>
          <h4>代替テキスト背景の角の丸み</h4>
          <?php ta_simple_input( 'ta_' . $place_and_role . '_release_mark_text_round', 'ピクセル', 'short_box' ); ?>
          <p>※ 丸み無しは0を入力してください</p>
        </td>
      </tr>
    </table>
    <span class="fixed-space"></span>
    <hr class="fixed-border">
    <h4>新規投稿マーク画像（代替テキスト）と記事タイトルの間隔</h4>
    <?php ta_simple_input( 'ta_' . $place_and_role . '_release_mark_padding', 'ピクセル', 'short_box' ); ?>
    <span class="fixed-space"></span>
  </div><!-- end of #ta_<?php echo $place_and_role; ?>_release_mark_pro_disp -->
<?php
}


/********* レスポンシブデザイン詳細設定関数 *********/
function ta_responsible_detail_setting( $base_key_name, $base_exp_text, $size2common_onoff='valid' ) { ?>
  <div style="margin-left:20px;">
<?php
  if ( 'ta_responsible_header_searcharea_search' == $base_key_name ) { ?>
    <!-- 通常表示 -->
    <table class="ta-fullcontents-table">
      <tr>
        <td style="width:20em;">
          <h4><?php echo $base_exp_text; ?>の表示</h4>
          <?php ta_alternative_input_checkbox( $base_key_name . '_onoff', '表示する' ); ?>
        </td>
        <td>
          <h4><?php echo $base_exp_text; ?>の幅</h4>
          <?php ta_simple_input( $base_key_name . '_width', '％', 'short_box' ); ?>
        </td>
      </tr>
    </table>
    <p class="res-onoff-exp-under" style="margin-top:-0.5em;"></p>
<?php
  } else { ?>
    <!-- 通常表示 -->
    <span class="fixed-space"></span>
    <h4><?php echo $base_exp_text; ?>の表示</h4>
    <?php ta_alternative_input_checkbox( $base_key_name . '_onoff', '表示する' ); ?>
    <p class="res-onoff-exp-under"></p>
<?php
  } ?>
    <span class="fixed-space"></span>
    <hr class="fixed-border">
    <!-- 詳細設定 -->
    <h4 id="<?php echo $base_key_name; ?>_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
    <div id="<?php echo $base_key_name; ?>_pro_disp" class="pro-disp init-nodisp">
<?php
  if ( 'valid' == $size2common_onoff ) { ?>
      <h4><?php echo $base_exp_text; ?>のフォントサイズ </h4>
      <?php ta_simple_input( $base_key_name . '_size2common', '％', 'short_box' ); ?>
      <p>※ ヘッダーレスポンシブデザイン共通フォントサイズに対する比率</p>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
<?php
  } ?>
      <table class="ta-fullcontents-table">
        <tr>
          <td style="width:20em;">
            <h4><?php echo $base_exp_text; ?>の位置</h4>
            <?php $init_value = ta_read_op( $base_key_name . '_position' ); ?>
            <p><input type="radio" name="<?php echo $base_key_name; ?>_position" value="left" <?php if ( "left" == $init_value ) echo 'checked="checked"'; ?>> 左寄せ</p>
            <p><input type="radio" name="<?php echo $base_key_name; ?>_position" value="center" <?php if ( "center" == $init_value ) echo 'checked="checked"'; ?>> 中央</p>
            <p><input type="radio" name="<?php echo $base_key_name; ?>_position" value="right" <?php if ( "right" == $init_value ) echo 'checked="checked"'; ?>> 右寄せ</p>
          </td>
          <td>
            <h4><?php echo $base_exp_text; ?>の表示方法</h4>
            <?php ta_alternative_input_checkbox( $base_key_name . '_w_padding_onoff', '左右余白付きコンテンツ' ); ?>
            <p>※ 無効の場合は左右余白無し</p>
          </td>
        </tr>
      </table>
      <span class="fixed-space"></span>
      <hr class="fixed-border">
      <table class="ta-fullcontents-table">
        <tr>
          <td style="width:20em;">
            <h4><?php echo $base_exp_text; ?>の上側余白</h4>
            <?php ta_simple_input( $base_key_name . '_top_margin', 'ピクセル', 'short_box' ); ?>
          </td>
          <td style="width:20em;">
            <h4><?php echo $base_exp_text; ?>の下側余白</h4>
            <?php ta_simple_input( $base_key_name . '_bottom_margin', 'ピクセル', 'short_box' ); ?>
          </td>
          <td>
            <h4><?php echo $base_exp_text; ?>の端余白</h4>
            <?php ta_simple_input( $base_key_name . '_edge_margin', '％（50％以下）', 'short_box' ); ?>
            <p>※ 位置が中央の場合は無効</p>
          </td>
        </tr>
      </table>
    </div><!-- end of #<?php echo $base_key_name; ?>_pro_disp -->
  </div>
<?php
}


/********* コンテンツトップ余白共通設定関数(固定ページ、標準投稿用：main) *********/
function ta_main_top_margin_common_setting( $base_key_name, $post_id='option' ) {
  if ( 'ta_common_page' == $base_key_name || 'ta_common_post' == $base_key_name || 'ta_post' == $base_key_name ) {
    $fixed_text = 'メインコンテンツ間隔設定（先頭コンテンツのため自動的に0になります）';
  } else {
    $fixed_text = 'メインコンテンツ間隔設定（TAテーマ001・メイン設定メニュー ⇒ 『その他』 の設定）';
  }
  if ( 'option' == $post_id ) {
    $init = ta_read_op( $base_key_name . '_top_margin' ); ?>
  <h4>コンテンツトップ余白共通設定</h4>
  <p><input type="radio" name="<?php echo $base_key_name . '_top_margin'; ?>" value="fixed-space" <?php if ( "fixed-space" == $init ) echo 'checked="checked"'; ?>> <?php echo $fixed_text; ?></p>
  <p><input type="radio" name="<?php echo $base_key_name . '_top_margin'; ?>" value="mrgn-zero" <?php if ( "mrgn-zero" == $init ) echo 'checked="checked"'; ?>> 0 ピクセル</p>
  <p><input type="radio" name="<?php echo $base_key_name . '_top_margin'; ?>" value="value" <?php if ( "value" == $init ) echo 'checked="checked"'; ?>> コンテンツトップ余白共通設定値</p>
  <p>※ 各コンテンツにて変更可能です。</p>
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <h4>コンテンツトップ余白共通設定値</h4>
<?php
    ta_simple_input( $base_key_name . '_top_margin_value', 'ピクセル', 'short_box' ); ?>
  <p>※ 各コンテンツにて変更可能です</p>
<?php
  } else {
    $init = ta_read_post( $post_id, $base_key_name . '_each_top_margin' ); ?>
  <h4>コンテンツトップ余白</h4>
  <p><input type="radio" name="<?php echo $base_key_name . '_each_top_margin'; ?>" value="common" <?php if ( "common" == $init ) echo 'checked="checked"'; ?>> 共通設定</p>
  <p><input type="radio" name="<?php echo $base_key_name . '_each_top_margin'; ?>" value="fixed-space" <?php if ( "fixed-space" == $init ) echo 'checked="checked"'; ?>> <?php echo $fixed_text; ?></p>
  <p><input type="radio" name="<?php echo $base_key_name . '_each_top_margin'; ?>" value="mrgn-zero" <?php if ( "mrgn-zero" == $init ) echo 'checked="checked"'; ?>> 0 ピクセル</p>
  <p><input type="radio" name="<?php echo $base_key_name . '_each_top_margin'; ?>" value="value" <?php if ( "value" == $init ) echo 'checked="checked"'; ?>> コンテンツトップ余白設定値</p>
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <h4>コンテンツトップ余白設定値</h4>
<?php
    ta_simple_input( $base_key_name . '_each_top_margin_value', 'ピクセル', 'short_box', 'postmeta', $post_id );
  }
}


/********* コンテンツトップ余白設定関数(header) *********/
function ta_header_top_margin_setting( $base_key_name, $post_id='option' ) { ?>
  <h4>コンテンツトップ余白</h4>
<?php
  if ( 'option' == $post_id ) {
    $init = ta_read_op( $base_key_name . '_header_top_margin' );
  } else {
    $init = ta_read_post( $post_id, $base_key_name . '_header_top_margin' );
  } ?>
  <p><input type="radio" name="<?php echo $base_key_name . '_header_top_margin'; ?>" value="mrgn-zero" <?php if ( "mrgn-zero" == $init ) echo 'checked="checked"'; ?>> 0 ピクセル</p>
  <p><input type="radio" name="<?php echo $base_key_name . '_header_top_margin'; ?>" value="value" <?php if ( "value" == $init ) echo 'checked="checked"'; ?>> コンテンツトップ余白設定値</p>
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <h4>コンテンツトップ余白設定値</h4>
<?php
  if ( 'option' == $post_id ) {
    ta_simple_input( $base_key_name . '_top_margin_value', 'ピクセル', 'short_box' );
  } else {
    ta_simple_input( $base_key_name . '_top_margin_value', 'ピクセル', 'short_box', 'postmeta', $post_id );
  }
}


/********* コンテンツトップ余白設定関数(toppage) *********/
function ta_toppage_top_margin_setting( $base_key_name, $post_id='option' ) { ?>
  <h4>コンテンツトップ余白</h4>
<?php
  if ( 'option' == $post_id ) {
    $init = ta_read_op( $base_key_name . '_top_margin' );
  } else {
    $init = ta_read_post( $post_id, $base_key_name . '_top_margin' );
  } ?>
  <p><input type="radio" name="<?php echo $base_key_name . '_top_margin'; ?>" value="fixed-space" <?php if ( "fixed-space" == $init ) echo 'checked="checked"'; ?>> トップページコンテンツ間隔設定（TAテーマ001・トップページ設定メニュー ⇒ 『その他』 の設定）</p>
  <p><input type="radio" name="<?php echo $base_key_name . '_top_margin'; ?>" value="mrgn-zero" <?php if ( "mrgn-zero" == $init ) echo 'checked="checked"'; ?>> 0 ピクセル</p>
  <p><input type="radio" name="<?php echo $base_key_name . '_top_margin'; ?>" value="value" <?php if ( "value" == $init ) echo 'checked="checked"'; ?>> コンテンツトップ余白設定値</p>
  <p>※ 先頭コンテンツの場合は自動的に0になります</p>
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <h4>コンテンツトップ余白設定値</h4>
<?php
  if ( 'option' == $post_id ) {
    ta_simple_input( $base_key_name . '_top_margin_value', 'ピクセル', 'short_box' );
  } else {
    ta_simple_input( $base_key_name . '_top_margin_value', 'ピクセル', 'short_box', 'postmeta', $post_id );
  }
}


/********* コンテンツトップ余白設定関数(main) *********/
function ta_main_top_margin_setting( $base_key_name, $post_id='option' ) {
  if ( 'ta_top_topcatch' == $base_key_name ) {
    $fixed_text = 'トップページコンテンツ間隔設定（TAテーマ001・トップページ設定メニュー ⇒ 『その他』 の設定）';
  } else if ( 'ta_common_listpage' == $base_key_name ) {
    $fixed_text = 'メインコンテンツ間隔設定（先頭コンテンツのため自動的に0になります）';
  } else {
    $fixed_text = 'メインコンテンツ間隔設定（TAテーマ001・メイン設定メニュー ⇒ 『その他』 の設定）';
  } ?>
  <h4>コンテンツトップ余白</h4>
<?php
  if ( 'option' == $post_id ) {
    $init = ta_read_op( $base_key_name . '_top_margin' );
  } else {
    $init = ta_read_post( $post_id, $base_key_name . '_top_margin' );
  } ?>
  <p><input type="radio" name="<?php echo $base_key_name . '_top_margin'; ?>" value="fixed-space" <?php if ( "fixed-space" == $init ) echo 'checked="checked"'; ?>> <?php echo $fixed_text; ?></p>
  <p><input type="radio" name="<?php echo $base_key_name . '_top_margin'; ?>" value="mrgn-zero" <?php if ( "mrgn-zero" == $init ) echo 'checked="checked"'; ?>> 0 ピクセル</p>
  <p><input type="radio" name="<?php echo $base_key_name . '_top_margin'; ?>" value="value" <?php if ( "value" == $init ) echo 'checked="checked"'; ?>> コンテンツトップ余白設定値</p>
  <p>※ 先頭コンテンツの場合は自動的に0になります</p>
  <span class="fixed-space"></span>
  <hr class="related-border">
  <h4>コンテンツトップ余白設定値</h4>
<?php
  if ( 'option' == $post_id ) {
    ta_simple_input( $base_key_name . '_top_margin_value', 'ピクセル', 'short_box' );
  } else {
    ta_simple_input( $base_key_name . '_top_margin_value', 'ピクセル', 'short_box', 'postmeta', $post_id );
  }
}


/********* コンテンツトップ余白設定関数(endroll) *********/
function ta_endroll_top_margin_setting( $base_key_name, $post_id='option' ) {
  $fixed_text = 'メインコンテンツ間隔設定（※1 TAテーマ001・メイン設定メニュー ⇒ 『その他』 の設定）'; ?>
  <h4>コンテンツトップ余白</h4>
<?php
  if ( 'option' == $post_id ) {
    $init = ta_read_op( $base_key_name . '_top_margin' );
  } else {
    $init = ta_read_post( $post_id, $base_key_name . '_top_margin' );
  } ?>
  <p><input type="radio" name="<?php echo $base_key_name . '_top_margin'; ?>" value="fixed-space" <?php if ( "fixed-space" == $init ) echo 'checked="checked"'; ?>> <?php echo $fixed_text; ?></p>
  <p><input type="radio" name="<?php echo $base_key_name . '_top_margin'; ?>" value="mrgn-zero" <?php if ( "mrgn-zero" == $init ) echo 'checked="checked"'; ?>> 0 ピクセル</p>
  <p><input type="radio" name="<?php echo $base_key_name . '_top_margin'; ?>" value="value" <?php if ( "value" == $init ) echo 'checked="checked"'; ?>> コンテンツトップ余白設定値</p>
  <p>※1 表示がトップページの時には、トップページコンテンツ間隔が適応されます</p>
  <p>※ 先頭コンテンツの場合は自動的に0になります</p>
  <span class="fixed-space"></span>
  <hr class="related-border">
  <h4>コンテンツトップ余白設定値</h4>
<?php
  if ( 'option' == $post_id ) {
    ta_simple_input( $base_key_name . '_top_margin_value', 'ピクセル', 'short_box' );
  } else {
    ta_simple_input( $base_key_name . '_top_margin_value', 'ピクセル', 'short_box', 'postmeta', $post_id );
  }
}


/********* コンテンツトップ余白設定関数(sidebar) *********/
function ta_sidebar_top_margin_setting( $base_key_name, $post_id='option' ) { ?>
  <h4>コンテンツトップ余白</h4>
<?php
  if ( 'option' == $post_id ) {
    $init = ta_read_op( $base_key_name . '_top_margin' );
  } else {
    $init = ta_read_post( $post_id, $base_key_name . '_top_margin' );
  } ?>
  <p><input type="radio" name="<?php echo $base_key_name . '_top_margin'; ?>" value="fixed-space" <?php if ( "fixed-space" == $init ) echo 'checked="checked"'; ?>> サイドバーコンテンツ間隔設定（TAテーマ001・サイドバー設定メニュー ⇒ 『その他』 の設定）</p>
  <p><input type="radio" name="<?php echo $base_key_name . '_top_margin'; ?>" value="mrgn-zero" <?php if ( "mrgn-zero" == $init ) echo 'checked="checked"'; ?>> 0 ピクセル</p>
  <p><input type="radio" name="<?php echo $base_key_name . '_top_margin'; ?>" value="value" <?php if ( "value" == $init ) echo 'checked="checked"'; ?>> コンテンツトップ余白設定値</p>
  <p>※ 先頭コンテンツの場合は自動的に0になります</p>
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <h4>コンテンツトップ余白設定値</h4>
<?php
  if ( 'option' == $post_id ) {
    ta_simple_input( $base_key_name . '_top_margin_value', 'ピクセル', 'short_box' );
  } else {
    ta_simple_input( $base_key_name . '_top_margin_value', 'ピクセル', 'short_box', 'postmeta', $post_id );
  }
}


/********* コンテンツトップ余白設定関数(sidebarsub) *********/
function ta_sidebarsub_top_margin_setting( $base_key_name, $post_id='option' ) { ?>
  <h4>コンテンツトップ余白</h4>
<?php
  if ( 'option' == $post_id ) {
    $init = ta_read_op( $base_key_name . '_top_margin' );
  } else {
    $init = ta_read_post( $post_id, $base_key_name . '_top_margin' );
  } ?>
  <p><input type="radio" name="<?php echo $base_key_name . '_top_margin'; ?>" value="fixed-space" <?php if ( "fixed-space" == $init ) echo 'checked="checked"'; ?>> サブサイドバーコンテンツ間隔設定（TAテーマ001・サブサイドバー設定メニュー ⇒ 『その他』 の設定）</p>
  <p><input type="radio" name="<?php echo $base_key_name . '_top_margin'; ?>" value="mrgn-zero" <?php if ( "mrgn-zero" == $init ) echo 'checked="checked"'; ?>> 0 ピクセル</p>
  <p><input type="radio" name="<?php echo $base_key_name . '_top_margin'; ?>" value="value" <?php if ( "value" == $init ) echo 'checked="checked"'; ?>> コンテンツトップ余白設定値</p>
  <p>※ 先頭コンテンツの場合は自動的に0になります</p>
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <h4>コンテンツトップ余白設定値</h4>
<?php
  if ( 'option' == $post_id ) {
    ta_simple_input( $base_key_name . '_top_margin_value', 'ピクセル', 'short_box' );
  } else {
    ta_simple_input( $base_key_name . '_top_margin_value', 'ピクセル', 'short_box', 'postmeta', $post_id );
  }
}


/********* コンテンツトップ余白設定関数(footer) *********/
function ta_footer_top_margin_setting( $base_key_name, $post_id='option' ) { ?>
  <h4>コンテンツトップ余白</h4>
<?php
  if ( 'option' == $post_id ) {
    $init = ta_read_op( $base_key_name . '_top_margin' );
  } else {
    $init = ta_read_post( $post_id, $base_key_name . '_top_margin' );
  } ?>
  <p><input type="radio" name="<?php echo $base_key_name . '_top_margin'; ?>" value="fixed-space" <?php if ( "fixed-space" == $init ) echo 'checked="checked"'; ?>> フッターコンテンツ間隔設定（TAテーマ001・フッター設定メニュー ⇒ 『その他』 の設定）</p>
  <p><input type="radio" name="<?php echo $base_key_name . '_top_margin'; ?>" value="mrgn-zero" <?php if ( "mrgn-zero" == $init ) echo 'checked="checked"'; ?>> 0 ピクセル</p>
  <p><input type="radio" name="<?php echo $base_key_name . '_top_margin'; ?>" value="value" <?php if ( "value" == $init ) echo 'checked="checked"'; ?>> コンテンツトップ余白設定値</p>
  <p>※ 先頭コンテンツの場合は自動的に0になります</p>
  <span class="fixed-space"></span>
  <hr class="fixed-border">
  <h4>コンテンツトップ余白設定値</h4>
<?php
  if ( 'option' == $post_id ) {
    ta_simple_input( $base_key_name . '_top_margin_value', 'ピクセル', 'short_box' );
  } else {
    ta_simple_input( $base_key_name . '_top_margin_value', 'ピクセル', 'short_box', 'postmeta', $post_id );
  }
}


/********* 開発モード表示関数 *********/
function ta_development_disp() {
  if ( TA_DVLP_PI ) {
    if ( TATHEME001 == TA_DVLP_PI ) {
      $content = '（ Ver.' . TA_DVLP_PI . ' 開発サイト ）'; ?>
  <style type="text/css">
    #ta-menu-title {
      color: #68B4FF;
    }
    #ta-menu-title::after {
      content: '<?php echo $content; ?>';
    }
  </style>
<?php
    } else {
      $content = '（ Ver.' . TA_DVLP_PI . ' 開発サイト ）style.cssのバージョンと一致しません！'; ?>
  <style type="text/css">
    #ta-menu-title {
      color: #FF0000;
    }
    #ta-menu-title::after {
      content: '<?php echo $content; ?>';
    }
  </style>
<?php
    }
  }
}


/********* 連絡先表示関数 *********/
function ta_info_disp() { ?>
  <script type="text/javascript">
  jQuery( function() {
    ta_menu_talink_display();
    ta_menu_talink_startfnc();
  });
  function ta_menu_talink_startfnc() {
    setInterval( 'ta_menu_talink_display()', 8500 );
  }
  function ta_menu_talink_display(){
    var template_dir = "<?php echo get_template_directory_uri(); ?>";
    var current_pic = jQuery( '#ta-menu-talink' ).css( 'background-image' );
    if ( current_pic.match(/talink3/) ) {
      jQuery( '#ta-menu-talink' ).css( 'background-image', 'url("' + template_dir + '/images/ta-admin-images/ta-menu-talink1.png")' );
      jQuery( '#ta-menu-talink-anc' ).attr( 'href', 'http://theme001.tec-aid.com/');
    } else if ( current_pic.match(/talink1/) ) {
      jQuery( '#ta-menu-talink' ).css( 'background-image', 'url("' + template_dir + '/images/ta-admin-images/ta-menu-talink2.png")' );
      jQuery( '#ta-menu-talink-anc' ).attr( 'href', 'http://theme001.tec-aid.com/thm001_inquiry');
    } else {
      jQuery( '#ta-menu-talink' ).css( 'background-image', 'url("' + template_dir + '/images/ta-admin-images/ta-menu-talink3.png")' );
      jQuery( '#ta-menu-talink-anc' ).attr( 'href', 'http://tec-aid.com/');
    }
    jQuery( '#ta-menu-talink' ).fadeTo( 5000, 1.0 );
    jQuery( '#ta-menu-talink' ).fadeTo( 3000, 0 );
  }
  </script>
<?php
}


/********* #ta-post-setting-form表示制御関数 *********/
function ta_post_setting_show() { ?>
  <style type="text/css">
    #ta-post-setting-form { 
      display: none;
    }
  </style>
  <script type="text/javascript">
    window.onload = function() { jQuery('#ta-post-setting-form').show(); }
  </script>
<?php
}


/********* 設定フォーム関数 *********/
//form開始
function ta_setting_form_start( $title, $tab_name ) { ?>
  <form method="post" action="<?php echo admin_url( 'admin-ajax.php?action=tasetting' ); ?>" enctype="multipart/form-data">
    <?php wp_nonce_field( 'ta_' . $title . '_nonce_key', 'ta_' . $title . '_setting_menu' ); ?>
    <input type="hidden" name="page" value="ta_<?php echo $title; ?>_setting" />
    <input type="hidden" name="tab_name" value="<?php echo $tab_name; ?>" />
<?php
}

//form終了（送信）
function ta_setting_form_end( $title, $discription, $tab_name='' ) { ?>
    <div id="ta_<?php echo $title; ?>_<?php echo $tab_name; ?>_renew_ok" class="normal-renew-ok">
      <ul>
        <li><?php echo $discription; ?>を行いました。</li>
        <li id="ta_reload_disp">表示を更新するために現ページを再読み込み（リロード）します。</li>
      </ul>
    </div>
    <div id="ta_<?php echo $title; ?>_<?php echo $tab_name; ?>_renew_ng" class="normal-renew-ng">
      <ul>
        <li><?php echo $discription; ?>が失敗しました。</li>
        <li>サーバーや通信系の一時的な問題の可能性があります。</li>
        <li>メッセージは10秒後に消えます。再度お試しください。</li>
      </ul>
    </div>
    <div id="ta_<?php echo $title; ?>_css_ok" class="cssfile-create-ok">
      <ul>
        <li>すべてのCSSファイルの生成が完了しました。</li>
      </ul>
    </div>
    <div id="ta_<?php echo $title; ?>_css_ng" class="cssfile-create-ng">
      <ul>
        <li>CSSファイルの生成が失敗しました。</li>
        <li>サーバーや通信系の一時的な問題の可能性があります。</li>
        <li>メッセージは10秒後に消えます。再度お試しください。</li>
      </ul>
    </div>
    <script type="text/javascript">
      var title = "<?php echo $title; ?>";
      var tab_name = "<?php echo $tab_name; ?>";
      var taHiend = "<?php echo TA_HIEND_PI; ?>";
      jQuery( '#ta-' + title + '-tab-' + tab_name + ' form:not(.ta-post-com)' ).on( 'submit', function( event ) {
        var ajaxRead = setInterval( 'ta_setting_source_progress()', 500 );  //進捗表示のプロセス開始
        //使用ブラウザのFormData対応判別
        if ( window.FormData ) {
          var formEles = jQuery( this ).get(0);               //対象form内の要素取得（jQueryオブジェクト配列取得の[0]のみ）
          var formData = new FormData( formEles );            //対象form要素内のフォームデータ取得
          var pdValue = false;                                //dataに指定したオブジェクトをクエリ文字列に変換しない
          var ctValue = false;                                //サーバにデータを送信する際に用いるcontent-typeヘッダを使用しない
        } else {
          var formData = jQuery( this ).serializeArray();     //FormDataを使用しない対象form要素内のフォームデータ取得
          var pdValue = true;                                 //dataに指定したオブジェクトをクエリ文字列に変換する
          var ctValue = "application/x-www-form-urlencoded";  //サーバにデータを送信する際に用いるcontent-typeヘッダの値は"application/x-www-form-urlencoded"
        }
        if ( jQuery( '#ta_common_setting_source_upload' ).length && '' != jQuery( '#ta_common_setting_source_upload' ).val() ) {
          var postAction = "<?php echo admin_url( 'admin-post.php?action=tasetting' ); ?>";
          jQuery( this ).attr( 'action', postAction );  //ファイル情報通信のみ通常のPOST送信
        } else {
          event.preventDefault();   // 本来のPOSTを打ち消すおまじない
          jQuery.ajax({
            type: 'POST',
            cache: false,   // キャッシュさせない
            url: jQuery( this ).attr( 'action' ),
            data: formData,
            processData: pdValue,
            contentType: ctValue,
            timeout: 60000, //タイムアウト60秒
            beforeSend: function( xhr, settings ) {
              jQuery( '#setting_submit input' ).attr( 'disabled', true );  // 送信ボタン無効化
            }
          }).done( function( data ) {
            clearInterval(ajaxRead);              //進捗表示のプロセス終了
            setTimeout( function() { jQuery( '#ta-progress-box' ).hide(); } , 1000 ); //進捗表示の中止
            jQuery( '.before-done' ).css( 'display', 'none' );    //画像アップローダーの未実行コメントの削除
            jQuery( '.grad-pup-body' ).css( 'display', 'none' );  //グラデーション設定画面の削除
            if ( data.match(/normalerr=/) ) {
              jQuery( '#ta_' + title + '_' + tab_name + '_err_' + data.replace( 'normalerr=', '') ).show();
              setTimeout( function() { jQuery( '#ta_' + title + '_' + tab_name + '_err_' + data.replace( 'normalerr=', '') ).fadeOut(); }, 5000 );
            } else if ( data.match(/createerr=/) ) {
              jQuery( '#ta_tools_source_createerr_' + data.replace( 'createerr=', '') ).show();
            } else if ( data.match(/deleteerr=/) ) {
              jQuery( '#ta_tools_source_deleteerr_' + data.replace( 'deleteerr=', '') ).show();
            } else if ( data.match(/dwnlderr=/) ) {
              jQuery( '#ta_tools_source_dwnlderr_' + data.replace( 'dwnlderr=', '') ).show();
            } else if ( data.match(/normalmsg=/) ) {
              jQuery( '#ta_' + title + '_' + tab_name + '_msg_' + data.replace( 'normalmsg=', '') ).show();
              setTimeout( function() { jQuery( '#ta_' + title + '_' + tab_name + '_msg_' + data.replace( 'normalmsg=', '') ).fadeOut(); }, 3000 );
            } else if ( data.match(/allcssmsg=/) ) {
              jQuery( '#ta_tools_cssfile_msg' ).show();
              jQuery( '#ta_tools_cssfile_msg ul' ).html( '<li><span class="ta-updated-message">すべてのCSSファイルの生成が完了しました。</span></li>' );
              jQuery( '[name="ta_theme_allcss_onoff"]' ).prop( 'checked', false );
              setTimeout( function() { jQuery( '#ta_tools_cssfile_msg' ).fadeOut(); }, 3000 );
            } else if ( data.match(/selsetmsg=/) ) {
              jQuery( '#ta_tools_source_selectmsg' ).show();
              jQuery( '#ta_tools_source_selectmsg ul' ).html(
                '<li><span class="ta-updated-message">設定ソースファイル『' + data.replace( "selsetmsg=", "") + '』を反映しました。（すべてのCSSファイル生成済み）</span></li>'
                + '<li id="ta_reload_disp">表示を更新するために現ページを再読み込み（リロード）します。</li>'
              );
              ta_match_reload ( 'page=ta_tools_setting', 'vtab=source', 'invalid' );   //便利ツール設定メニュー設定ソースファイルリロード
            } else if ( data.match(/createmsg=/) ) {
              jQuery( '#ta_tools_source_createmsg' ).show();
              jQuery( '#ta_tools_source_createmsg ul' ).html(
                '<li><span class="ta-updated-message">設定ソースファイル『' + data.replace( "createmsg=", "") + '』が作成されました。</span></li>'
                + '<li id="ta_reload_disp">表示を更新するために現ページを再読み込み（リロード）します。</li>'
              );
              ta_match_reload ( 'page=ta_tools_setting', 'vtab=source', 'invalid' );   //便利ツール設定メニュー設定ソースファイルリロード
            } else if ( data.match(/deletemsg=/) ) {
              jQuery( '#ta_tools_source_deletemsg' ).show();
              jQuery( '#ta_tools_source_deletemsg ul' ).html(
                '<li><span class="ta-updated-message">設定ソースファイル『' + data.replace( "deletemsg=", "") + '』を削除しました。</span></li>'
                + '<li id="ta_reload_disp">表示を更新するために現ページを再読み込み（リロード）します。</li>'
              );
              ta_match_reload ( 'page=ta_tools_setting', 'vtab=source', 'invalid' );   //便利ツール設定メニュー設定ソースファイルリロード
            } else if ( data.match(/dwnldmsg=/) ) {
              jQuery( 'input[name=ta_common_setting_source_download]' ).val( ['none'] );  //再誤送信防止
              jQuery( '#ta_tools_source_dwnldmsg' ).show();
              var zip_file_uri = "<?php echo get_template_directory_uri(); ?>" + '/ta-working-temp/export/' + data.replace( "dwnldmsg=", "") + '.zip';
              jQuery( '#ta_tools_source_dwnldmsg ul' ).html(
                '<li><span class="ta-updated-message">zipファイル『' + data.replace( "dwnldmsg=", "") + '.zip』が作成されました。</span></li>'
                + '<li><a href= "' + zip_file_uri + '">こちら</a>をクリックしてダウンロードして下さい。</li>'
                + '<li>※ 他のページに移動するとエクスポートファイルは削除されますのでご注意ください。</li>'
              );
            } else if ( data.match(/resetmsg=/) ) {
              jQuery( '#ta_tools_source_resetmsg' ).show();
              jQuery( '#ta_tools_source_resetmsg ul' ).html(
                '<li><span class="ta-updated-message">テーマ出荷時値への初期化（データ' + data.replace( "resetmsg=", "") + '）が完了しました（すべてのCSSファイル生成済み）</span></li>'
                + '<li id="ta_reload_disp">表示を更新するために現ページを再読み込み（リロード）します。</li>'
              );
              ta_match_reload ( 'page=ta_tools_setting', 'vtab=source', 'invalid' );   //便利ツール設定メニュー設定ソースファイルリロード
            } else if ( jQuery( '#ta-seocentral-tab-pages' ).length || jQuery( '#ta-seocentral-tab-posts' ).length ) {
              location.reload();
            } else {
              //通常の更新完了メッセージ
              jQuery( '#ta_' + title + '_' + tab_name + '_renew_ok' ).show();
              //共通設定メニュー
              if ( 'common' == title ) {
                if ( 'frame' == tab_name || '' == tab_name ) {
                  var currentValue1 = ( jQuery( 'input[name=ta_theme_demo]' ).prop( 'checked' ) ) ? 'block' : 'none';
                  jQuery( '#ta-demomsg-disp' ).css( 'display', currentValue1 );
                  jQuery( '#ta_theme_demo_title_span' ).css( 'display', currentValue1 );
                  var recordValue2 = "<?php echo ta_read_op( 'ta_common_frame_type' ); ?>";
                  var currentValue2 = jQuery( 'input[name=ta_common_frame_type]:checked' ).val();
                  var recordValue3 = "<?php echo ta_read_op( 'ta_common_frame_width' ); ?>";
                  var currentValue3 = jQuery( 'input[name=ta_common_frame_width]' ).val();
                  var recordValue4 = "<?php echo ta_read_op( 'ta_common_sidebarsub_width' ); ?>";
                  var currentValue4 = jQuery( 'input[name=ta_common_sidebarsub_width]' ).val();
                  var recordValue5 = "<?php echo ta_read_op( 'ta_common_sidebar_width' ); ?>";
                  var currentValue5 = jQuery( 'input[name=ta_common_sidebar_width]' ).val();
                  var recordValue6 = "<?php echo ta_read_op( 'ta_common_mainleft_margin' ); ?>";
                  var currentValue6 = jQuery( 'input[name=ta_common_mainleft_margin]' ).val();
                  var recordValue7 = "<?php echo ta_read_op( 'ta_common_mainright_margin' ); ?>";
                  var currentValue7 = jQuery( 'input[name=ta_common_mainright_margin]' ).val();
                  if ( 0 != taHiend ) {
                    var recordValue8 = "<?php echo ta_read_op( 'ta_common_side2wrap_onoff' ); ?>";
                    var currentValue8 = ( jQuery( 'input[name=ta_common_side2wrap_onoff]' ).prop( 'checked' ) ) ? 'valid' : 'invalid';
                  } else {
                    var recordValue8 = "invalid";
                    var currentValue8 = "invalid";
                  }
                  if ( recordValue2 != currentValue2 || recordValue3 != currentValue3 || recordValue4 != currentValue4 ||
                       recordValue5 != currentValue5 || recordValue6 != currentValue6 || recordValue7 != currentValue7 || recordValue8 != currentValue8 ) {
                    ta_match_reload ( 'page=ta_common_setting', 'vtab=frame', 'valid' );
                  }
                  var currentValue9 = ( jQuery( 'input[name=ta_common_frame_size_check_onoff]:checked' ).prop( 'checked' ) ) ? 'block' : 'none';
                  jQuery( '#ta-frame-sizemsg-disp' ).css( 'display', currentValue9 );
                  jQuery( '#ta_common_frame_size_check_title_span' ).css( 'display', currentValue9 );
                } else if ( 'limit' == tab_name ) {
                  if ( 0 != taHiend ) {
                    var currentValue5 = ( jQuery( 'input[name=ta_common_page_view_limit_onoff]' ).prop( 'checked' ) ) ? 'inline' : 'none';
                    jQuery( '#ta_common_page_view_limit_title_span' ).css( 'display', currentValue5 );
                    var currentValue6 = ( jQuery( 'input[name=ta_common_cat_view_limit_onoff]' ).prop( 'checked' ) ) ? 'inline' : 'none';
                    jQuery( '#ta_common_cat_view_limit_title_span' ).css( 'display', currentValue6 );
                    var currentValue7 = ( jQuery( 'input[name=ta_common_yearmonth_view_limit_onoff]' ).prop( 'checked' ) ) ? 'inline' : 'none';
                    jQuery( '#ta_common_yearmonth_view_limit_title_span' ).css( 'display', currentValue7 );
                    var currentValue8 = ( jQuery( 'input[name=ta_common_search_view_limit_onoff]' ).prop( 'checked' ) ) ? 'inline' : 'none';
                    jQuery( '#ta_common_search_view_limit_title_span' ).css( 'display', currentValue8 );
                  }
                } else if ( 'basic' == tab_name ) {
                  var recordValue1 = "<?php echo ta_read_op( 'ta_common_site_bg_color' ); ?>";
                  var currentValue1 = jQuery( 'input[name=ta_common_site_bg_color]' ).val();
                  var recordValue2 = "<?php echo ta_read_op( 'ta_common_site_hl_color' ); ?>";
                  var currentValue2 = jQuery( 'input[name=ta_common_site_hl_color]' ).val();
                  var recordValue3 = "<?php echo ta_read_op( 'ta_common_site_text_on_bg_color' ); ?>";
                  var currentValue3 = jQuery( 'input[name=ta_common_site_text_on_bg_color]' ).val();
                  var recordValue4 = "<?php echo ta_read_op( 'ta_common_site_text_on_hl_color' ); ?>";
                  var currentValue4 = jQuery( 'input[name=ta_common_site_text_on_hl_color]' ).val();
                  var recordValue5 = "<?php echo ta_read_op( 'ta_common_font_family' ); ?>";
                  var currentValue5 = jQuery( 'input[name=ta_common_font_family]:checked' ).val();
                  var recordValue6 = "<?php echo ta_read_op( 'ta_common_font_size' ); ?>";
                  var currentValue6 = jQuery( 'input[name=ta_common_font_size]' ).val();
                  var recordValue7 = "<?php echo ta_read_op( 'ta_common_font_color_select' ); ?>";
                  var currentValue7 = jQuery( 'input[name=ta_common_font_color_select]:checked' ).val();
                  var recordValue8 = "<?php echo ta_read_op( 'ta_common_font_color' ); ?>";
                  var currentValue8 = jQuery( 'input[name=ta_common_font_color]' ).val();
                  var recordValue9 = "<?php echo ta_read_op( 'ta_common_font_anchor_color' ); ?>";
                  var currentValue9 = jQuery( 'input[name=ta_common_font_anchor_color]' ).val();
                  var recordValue10 = "<?php echo ta_read_op( 'ta_common_font_anchor_under' ); ?>";
                  var currentValue10 = ( jQuery( 'input[name=ta_common_font_anchor_under]' ).prop( 'checked' ) ) ? 'valid' : 'invalid';
                  var recordValue11 = "<?php echo ta_read_op( 'ta_common_font_anchor_colorhover' ); ?>";
                  var currentValue11 = jQuery( 'input[name=ta_common_font_anchor_colorhover]' ).val();
                  var recordValue12 = "<?php echo ta_read_op( 'ta_common_font_anchor_underhover' ); ?>";
                  var currentValue12 = ( jQuery( 'input[name=ta_common_font_anchor_underhover]' ).prop( 'checked' ) ) ? 'valid' : 'invalid';
                  if ( recordValue1  != currentValue1  || recordValue2  != currentValue2  || recordValue3  != currentValue3 ||
                       recordValue4  != currentValue4  || recordValue5  != currentValue5  || recordValue6  != currentValue6 ||
                       recordValue7  != currentValue7  || recordValue8  != currentValue8  || recordValue9  != currentValue9 ||
                       recordValue10 != currentValue10 || recordValue11 != currentValue11 || recordValue12 != currentValue12 ) {
                    ta_match_reload ( 'page=ta_common_setting', 'vtab=basic', 'invalid' );
                  }
                } else if ( 'etc' == tab_name ) {
                  var currentValue = ( jQuery( 'input[name=ta_common_mainte_mode_onoff]' ).prop( 'checked' ) ) ? 'block' : 'none';
                  jQuery( '#ta-maintemodemsg-disp' ).css( 'display', currentValue );
                }
              }
              //トップページ設定メニュー
              else if ( 'top' == title ) {
                if ( 'frame' == tab_name || '' == tab_name ) {
                  if ( 0 != taHiend ) {
                    var currentValue = ( jQuery( 'input[name=ta_top_view_limit_onoff]' ).prop( 'checked' ) ) ? 'inline' : 'none';
                    jQuery( '#ta_top_view_limit_title_span' ).css( 'display', currentValue );
                  }
                }
              }
              //ヘッダー設定メニュー
              else if ( 'header' == title ) {
                if ( 'frame' == tab_name || '' == tab_name ) {
                  var recordValue = "<?php echo ta_read_op( 'ta_header_bannerarea_type' ); ?>";
                  var currentValue = jQuery( 'input[name=ta_header_bannerarea_type]:checked' ).val();
                  if ( recordValue != currentValue ) {
                    ta_match_reload ( 'page=ta_header_setting', 'vtab=frame', 'valid' );
                  }
                  var currentValue = ( jQuery( 'input[name=ta_header_size_check]' ).prop( 'checked' ) ) ? 'block' : 'none';
                  jQuery( '#ta_header_bannerarea_type_title_span' ).css( 'display', currentValue );
                  jQuery( '#ta-header-sizemsg-disp' ).css( 'display', currentValue );
                } else if ( 'headimg' == tab_name ) {
                  var currentValue = ( 'fa' == jQuery( 'input[name=ta_header_headimg_select]:checked' ).val() ) ? 'inline' : 'none';
                  jQuery( '#ta_header_headimg_select_warning' ).css( 'display', currentValue );
                }
              }
              //メイン設定メニュー
              else if ( 'main' == title ) {
                if ( 'titleh2' == tab_name ) {
                  ta_match_reload ( 'page=ta_main_setting', 'vtab=titleh2', 'invalid' );
                } else if ( 'titleh3' == tab_name ) {
                  ta_match_reload ( 'page=ta_main_setting', 'vtab=titleh3', 'invalid' );
                } else if ( 'titleh4' == tab_name ) {
                  ta_match_reload ( 'page=ta_main_setting', 'vtab=titleh4', 'invalid' );
                } else if ( 'titleh5' == tab_name ) {
                  ta_match_reload ( 'page=ta_main_setting', 'vtab=titleh5', 'invalid' );
                } else if ( 'deco1' == tab_name && 0 != taHiend ) {
                  ta_match_reload ( 'page=ta_main_setting', 'vtab=deco1', 'invalid' );
                } else if ( 'deco2' == tab_name && 0 != taHiend ) {
                  ta_match_reload ( 'page=ta_main_setting', 'vtab=deco2', 'invalid' );
                } else if ( 'deco3' == tab_name && 0 != taHiend ) {
                  ta_match_reload ( 'page=ta_main_setting', 'vtab=deco3', 'invalid' );
                } else if ( 'deco4' == tab_name && 0 != taHiend ) {
                  ta_match_reload ( 'page=ta_main_setting', 'vtab=deco4', 'invalid' );
                }
              }
              //サイドバー設定メニュー
              else if ( 'sidebar' == title ) {
                if ( 'titleh2' == tab_name ) {
                  ta_match_reload ( 'page=ta_sidebar_setting', 'vtab=titleh2', 'invalid' );
                } else if ( 'titleh3' == tab_name ) {
                  ta_match_reload ( 'page=ta_sidebar_setting', 'vtab=titleh3', 'invalid' );
                } else if ( 'titleh4' == tab_name ) {
                  ta_match_reload ( 'page=ta_sidebar_setting', 'vtab=titleh4', 'invalid' );
                } else if ( 'titleh5' == tab_name ) {
                  ta_match_reload ( 'page=ta_sidebar_setting', 'vtab=titleh5', 'invalid' );
                } else if ( 'deco1' == tab_name && 0 != taHiend ) {
                  ta_match_reload ( 'page=ta_sidebar_setting', 'vtab=deco1', 'invalid' );
                } else if ( 'deco2' == tab_name && 0 != taHiend ) {
                  ta_match_reload ( 'page=ta_sidebar_setting', 'vtab=deco2', 'invalid' );
                } else if ( 'deco3' == tab_name && 0 != taHiend ) {
                  ta_match_reload ( 'page=ta_sidebar_setting', 'vtab=deco3', 'invalid' );
                } else if ( 'deco4' == tab_name && 0 != taHiend ) {
                  ta_match_reload ( 'page=ta_sidebar_setting', 'vtab=deco4', 'invalid' );
                }
              }
              //サブサイドバー設定メニュー
              else if ( 'sidebarsub' == title ) {
                if ( 'titleh2' == tab_name ) {
                  ta_match_reload ( 'page=ta_sidebarsub_setting', 'vtab=titleh2', 'invalid' );
                } else if ( 'titleh3' == tab_name ) {
                  ta_match_reload ( 'page=ta_sidebarsub_setting', 'vtab=titleh3', 'invalid' );
                } else if ( 'titleh4' == tab_name ) {
                  ta_match_reload ( 'page=ta_sidebarsub_setting', 'vtab=titleh4', 'invalid' );
                } else if ( 'titleh5' == tab_name ) {
                  ta_match_reload ( 'page=ta_sidebarsub_setting', 'vtab=titleh5', 'invalid' );
                }
              }
              //フッター設定メニュー
              else if ( 'footer' == title ) {
                if ( 'titleh2' == tab_name ) {
                  ta_match_reload ( 'page=ta_footer_setting', 'vtab=titleh2', 'invalid' );
                } else if ( 'titleh3' == tab_name ) {
                  ta_match_reload ( 'page=ta_footer_setting', 'vtab=titleh3', 'invalid' );
                } else if ( 'titleh4' == tab_name ) {
                  ta_match_reload ( 'page=ta_footer_setting', 'vtab=titleh4', 'invalid' );
                } else if ( 'titleh5' == tab_name ) {
                  ta_match_reload ( 'page=ta_footer_setting', 'vtab=titleh5', 'invalid' );
                } else if ( 'block' == tab_name ) {
                  currentValue = ( jQuery( 'input[name=ta_footer_block_size_check]' ).prop( 'checked' ) ) ? 'block' : 'none';
                  jQuery( '#ta_footer_block_size_check_span' ).css( 'display', currentValue );
                  jQuery( '#ta-footer-sizemsg-disp' ).css( 'display', currentValue );
                }
              }
              //便利ツール設定メニュー
              else if ( 'tools' == title ) {
                if ( 'frame' == tab_name || '' == tab_name ) {
                  var recordValue = "<?php echo ta_read_op( 'ta_theme_no_cssfile' ); ?>";
                  var currentValue = ( jQuery( 'input[name=ta_theme_no_cssfile]' ).prop( 'checked' ) ) ? 'valid' : 'invalid';
                  if ( recordValue != currentValue ) {
                    ta_match_reload ( 'page=ta_tools_setting', 'vtab=frame', 'valid' );
                  }
                }
              }
              //『レスポンシブデザイン』メイン（トップ）設定メニュー
              else if ( 'responsiblemain' == title ) {
                if ( 'headline' == tab_name ) {
                  ta_match_reload ( 'page=ta_responsiblemain_setting', 'vtab=headline', 'invalid' );
                } else if ( 'decoline' == tab_name && 0 != taHiend ) {
                  ta_match_reload ( 'page=ta_responsiblemain_setting', 'vtab=decoline', 'invalid' );
                }
              }
              //『レスポンシブデザイン』サイドバー設定メニュー
              else if ( 'responsibleside' == title ) {
                if ( 'headline' == tab_name ) {
                  ta_match_reload ( 'page=ta_responsibleside_setting', 'vtab=headline', 'invalid' );
                } else if ( 'decoline' == tab_name && 0 != taHiend ) {
                  ta_match_reload ( 'page=ta_responsibleside_setting', 'vtab=decoline', 'invalid' );
                }
              }
              //『レスポンシブデザイン』サブサイドバー設定メニュー
              else if ( 'responsiblesidesub' == title ) {
                if ( 'headline' == tab_name ) {
                  ta_match_reload ( 'page=ta_responsiblesidesub_setting', 'vtab=headline', 'invalid' );
                }
              }
              //『レスポンシブデザイン』フッター設定メニュー
              else if ( 'responsiblefoot' == title ) {
                if ( 'headline' == tab_name ) {
                  ta_match_reload ( 'page=ta_responsiblefoot_setting', 'vtab=headline', 'invalid' );
                }
              }
              //通常の更新完了メッセージの自動消去（3秒後）
              setTimeout( function() { jQuery( '#ta_' + title + '_' + tab_name + '_renew_ok' ).fadeOut(); }, 3000 );
            }
          }).fail( function() {
            clearInterval(ajaxRead);              //進捗表示のプロセス終了
            setTimeout( function() { jQuery( '#ta-progress-box' ).hide(); } , 1000 ); //進捗表示の中止
            jQuery( '.before-done' ).css( 'display', 'none' );    //画像アップローダーの未実行コメントの削除
            jQuery( '.grad-pup-body' ).css( 'display', 'none' );  //グラデーション設定画面の削除
            jQuery( '#ta_' + title + '_' + tab_name + '_renew_ng' ).show();
            //NGメッセージの自動消去（10秒後）
            setTimeout( function() { jQuery( '#ta_' + title + '_' + tab_name + '_renew_ng' ).fadeOut(); }, 10000 );
          }).always( function( xhr, textStatus ) {
            jQuery( '#setting_submit input' ).attr( 'disabled', false );  // 送信ボタン有効化
          });
        }
      });
      
      function ta_match_reload( targetPage, targetTab, targetWotab ) {
        jQuery( '#ta_reload_disp' ).show();
        setTimeout( function() {
          var currentProtocol = jQuery(location).attr('protocol');
          var currentHost = jQuery(location).attr('host');
          var currentPath = jQuery(location).attr('pathname');
          var currentPara = jQuery(location).attr('search');
          var newPage = currentPara.split( '&' );
          var newTab = currentPara.split( '&vtab=' );
          if ( 1 == newTab.length ) {
            var newUrl = currentProtocol + '//' + currentHost + currentPath + newPage[0];
          } else {
            var newUrl = currentProtocol + '//' + currentHost + currentPath + newPage[0] + '&vtab=' + newTab[1];
          }
          var tpObj = new RegExp( targetPage );
          var ttObj = new RegExp( targetTab );
          if ( currentPara.match( tpObj ) ) {
            if ( 'valid' == targetWotab ) {
              if ( ! currentPara.match(/vtab=/) || currentPara.match( ttObj ) ) {
                window.location.href = newUrl;
              }
            } else {
              if ( currentPara.match( ttObj ) ) {
                window.location.href = newUrl;
              }
            }
          }
        }, 3000 );
      }
      
      function ta_setting_source_progress() {
        var php_value_file = "<?php echo get_template_directory_uri() . '/ta-modules/ta-php2ajax.php'; ?>";
        jQuery.ajax({
          type: 'POST',
          cache: false,   // キャッシュさせない
          url: php_value_file,
          timeout: 60000  //タイムアウト60秒
        }).done( function( data ) {
          if ( '' == data || 0 == data ) {
            jQuery( '#ta-progress-box' ).hide();
          } else {
            jQuery( '#ta-progress-box' ).show();
            var datum = data.split( '|' );
            if ( 'waiting' == datum[0] ) {
              jQuery( '#ta-progress-bar' ).hide();
              jQuery( '#ta-waiting-gif' ).show();
            } else {
              jQuery( '#ta-progress-box #ta-progress-bar' ).val( datum[0] );
              jQuery( '#ta-progress-box #ta-progress-num' ).text( datum[0] + ' ％' );
            }
            jQuery( '#ta-progress-box #ta-progress-text' ).text( datum[1] );
          }
        }).always( function( data ) {
          if ( '' == data || 0 == data ) {
            jQuery( '#ta-progress-box' ).hide();
          }
        }).fail( function() {
          jQuery( '#ta-progress-box' ).hide();
        });
      }
    </script>
<?php
  if ( 'valid' != ta_read_op( 'ta_theme_no_cssfile' ) || 'seocentral' == $title ) { ?>
    <div id="setting_submit">
      <p><input type="submit" class="button-primary" name="ta_<?php echo $title; ?>_setting_submit" value="<?php echo $discription; ?>" /></p>
    </div>
  </form>
<?php
  } else { ?>
    <div id="setting_submit">
      <p><input type="submit" class="button-primary" name="ta_<?php echo $title; ?>_setting_submit" value="<?php echo $discription; ?>" /></p>
    </div>
  </form>
</div>
<div id="ta-<?php echo $title; ?>-cssfile-submit" class="ta-cssfile-container">
  <form method="post" action="<?php echo admin_url( 'admin-ajax.php?action=tasetting' ); ?>" enctype="multipart/form-data">
    <?php wp_nonce_field( 'ta_' . $title . '_nonce_key', 'ta_' . $title . '_setting_menu' ); ?>
    <input type="hidden" name="ta_<?php echo $title; ?>_cssfile_create"/>
    <script type="text/javascript">
      var title = "<?php echo $title; ?>";
      jQuery( '#ta-' + title + '-cssfile-submit form' ).on( 'submit', function( event ) {
        var ajaxRead = setInterval( 'ta_setting_source_progress()', 500 );  //進捗表示のプロセス開始
        event.preventDefault();   // 本来のPOSTを打ち消すおまじない
        jQuery.ajax({
          type: 'POST',
          cache: false,   // キャッシュさせない
          url: jQuery( this ).attr( 'action' ),
          data: jQuery( this ).serializeArray(),
          timeout: 60000, //タイムアウト60秒
          beforeSend: function( xhr, settings ) {
            jQuery( '#cssfile_submit input' ).attr( 'disabled', true );  // 送信ボタン無効化
          }
        }).done( function( data ) {
          clearInterval(ajaxRead);              //進捗表示のプロセス終了
          setTimeout( function() { jQuery( '#ta-progress-box' ).hide(); } , 1000 ); //進捗表示の中止
          jQuery( '.before-done' ).css( 'display', 'none' );    //画像アップローダーの未実行コメントの削除
          jQuery( '.grad-pup-body' ).css( 'display', 'none' );  //グラデーション設定画面の削除
          jQuery( '#ta_' + title + '_css_ok' ).show();
          //OKメッセージの自動消去（3秒後）
          setTimeout( function() { jQuery( '#ta_' + title + '_css_ok' ).fadeOut(); }, 3000 );
        }).fail( function() {
          clearInterval(ajaxRead);              //進捗表示のプロセス終了
          setTimeout( function() { jQuery( '#ta-progress-box' ).hide(); } , 1000 ); //進捗表示の中止
          jQuery( '.before-done' ).css( 'display', 'none' );    //画像アップローダーの未実行コメントの削除
          jQuery( '.grad-pup-body' ).css( 'display', 'none' );  //グラデーション設定画面の削除
          jQuery( '#ta_' + title + '_css_ng' ).show();
          //NGメッセージの自動消去（10秒後）
          setTimeout( function() { jQuery( '#ta_' + title + '_css_ng' ).fadeOut(); }, 10000 );
        }).always( function( xhr, textStatus ) {
          jQuery( '#cssfile_submit input' ).attr( 'disabled', false );  // 送信ボタン有効化
        });
      });
    </script>
    <div id="cssfile_submit">
      <p><input type="submit" class="button-primary" name="ta_<?php echo $title; ?>_cssfile_submit" value="すべてのCSSファイルを生成する" /></p>
    </div>
  </form>
<?php
  }
}


/********* PHP to JS関数 *********/
function ta_newwin_setting_php2js( $key_name ) {
  if ( 'common' == ta_read_op( $key_name . '_type' ) ) {
    $key_name = str_replace("sidebarsub", "main", $key_name );
    $key_name = str_replace("sidebar", "main", $key_name );
    $key_name = str_replace("footer", "main", $key_name );
  }
  return ta_read_op( $key_name . '_newwin_onoff' );
}


/********* 進捗表示関数 *********/
function ta_progress_disp() { ?>
  <div id="ta-progress-box" style="display:none;">
    <div style="font-size:120%;display:inline-block;vertical-align:bottom;width:100%;">
      <h2 style="float:left;margin-top: 0;margin-bottom:1em;">進捗状況</h2>
      <img style="height:2em;float:right;display:block;" src="<?php echo get_template_directory_uri(); ?>/images/ta-header-images/logo.png"/>
    </div>
    <p id="ta-progress-text"></p>
    <progress id="ta-progress-bar" max="100"></progress>
    <img id="ta-waiting-gif" style="display:none;" src="<?php echo get_template_directory_uri(); ?>/images/ta-admin-images/ta-waiting.gif"/>
    <p id="ta-progress-num"></p>
  </div>
<?php
}


/********* マニュアルPII誘導表示関数 *********/
function ta_man2_gd( $page_name ) { ?>
  <div class="ta-manual2-info"><a href="http://theme001.tec-aid.com/thm001_manual_p2/<?php echo $page_name; ?>" target="_blank"><span class="dashicons dashicons-editor-help"></span></a></div>
<?php
}


/********* タブ表示&有効タブ検出関数 *********/
function ta_tab_lists( $ta_tabs ) {
  echo '<h2 class="ta-tab-lists">';
  $cal_ta_tabs = $ta_tabs;
  reset( $cal_ta_tabs );
  $first_key = key( $cal_ta_tabs );
  $valid_tab = isset( $_GET['vtab'] ) ? $_GET['vtab'] : $first_key;
  foreach ( $ta_tabs as $id => $name ) {
    $current_url = ( empty( $_SERVER["HTTPS"] ) ? "http://" : "https://" ) . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
    $clear_url = explode( '&vtab=', $current_url );
    if ( false !== strpos( $clear_url[0], '?' ) ) {
      $add_url = $clear_url[0] . '&vtab=' . $id;
    } else {
      $add_url = $clear_url[0] . '?vtab=' . $id;
    }
    if ( $id == $valid_tab ) {
      echo '<a href="' . $add_url . '" class="nav-tab nav-tab-active">' . $name . '</a>';
    } else {
      echo '<a href="' . $add_url . '" class="nav-tab">' . $name . '</a>';
    }
  }
  echo '</h2>';
  return $valid_tab;
}
