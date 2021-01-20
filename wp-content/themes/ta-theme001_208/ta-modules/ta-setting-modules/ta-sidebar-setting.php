<?php
/***********************************************************************************************************/
/*
/* テックエイドの成長する自作ホームページWordPressテーマ『 TAテーマ001 (ta-theme001) 』
/*
/* ta-sidebar-setting.php: ( Latest Version 2.04 2017.02.22 )
/*
/* このプログラムの著作権、使用権、その他全ての権利はde集まれ株式会社に属します。
/* The copyright, royalty and all the other rights of this program belong to deatsumare Corporation.
/*
/* File Version 履歴
/* File Version 2.00 2016.03.05: first edition by Kotaro Kashiwamura.
/* File Version 2.01 2016.03.07: 各種投稿ダイジェスト位置、ウィジェット位置変更 by Kotaro Kashiwamura.
/* File Version 2.02 2016.06.21: ヘッドライン確認エリア調整、装飾1～4の追加 by Kotaro Kashiwamura.
/* File Version 2.03 2016.08.22: サイドバーパラグラフ設定追加、標準フォントにhover表示追加 by Kotaro Kashiwamura.
/* File Version 2.04 2017.02.22: TAサイドバーメニュー追加、サイドバー区切り線追加、体裁調整、ajax化 by Kotaro Kashiwamura.
/*
/***********************************************************************************************************/
if ( TA_HIEND_PI ) { require_once( TA_HIEND_PI_DIR . '/setting-modules/ta-theme001-highend-sidebar-setting.php' ); } ?>
<div id="ta-setting-form">
  <!-- タイトルとタブ -->
  <div id="ta-menu-group">
    <div id="ta-menu-title-container">
      <h2 id="ta-menu-title">TAテーマ001・サイドバー設定メニュー</h2>
      <?php ta_ver_display(); ?>
    </div>
    <a id="ta-menu-talink-anc" href="http://theme001.tec-aid.com/" target="_blank"><div id="ta-menu-talink"></div></a>
  </div>
<?php
ta_development_disp();
ta_setting_scroll();
ta_setting_message_disp();
$ta_tabs = array( 'frame' => '背景色・画像', 'font' => 'フォント', 'titleh2' => 'h2', 'titleh3' => 'h3', 'titleh4' => 'h4', 'titleh5' => 'h5', 'deco1' => '装飾1', 'deco2' => '装飾2', 'deco3' => '装飾3', 'deco4' => '装飾4', 'freearea' => 'フリーエリア', 'latestposts' => '最新投稿ダイジェスト', 'postdigest' => '各種投稿ダイジェスト', 'widget' => 'ウィジェット', 'menu' => 'TAサイドバーメニュー', 'etc' => 'その他', );
$ta_tabs = apply_filters( 'ta_sidebar_settting_page_tab', $ta_tabs ); //フィルターフック'ta_sidebar_settting_page_tab'を設置
$valid_tab = ta_tab_lists( $ta_tabs );  //タブの設置と有効タブの検出 ?>
  
  
  <?php if ( 'frame' == $valid_tab ) { ?>
  <!-- 背景色・画像 -->
  <div class="table" id="ta-sidebar-tab-frame">
    <?php ta_setting_form_start( 'sidebar', 'frame' ); ?>
    <table class="ta-setting-table">
      <!-- サイドバーの背景色・画像 -->
      <tr>
        <?php ta_sidebar_frame_setting_no_accordion( 'ta_sidebar_frame', 'サイドバー背景色・画像', 'valid', 'valid' ); ?>
      </tr>
    </table>
    <?php ta_setting_form_end( 'sidebar', 'サイドバー『背景色・画像』設定更新', 'frame' ); ?>
  </div><!-- end of #ta-sidebar-tab-frame -->
  <?php } ?>
  
  
  <?php if ( 'font' == $valid_tab ) { ?>
  <!-- フォント -->
  <div class="table" id="ta-sidebar-tab-font">
    <?php ta_setting_form_start( 'sidebar', 'font' ); ?>
    <table class="ta-setting-table">
      <!-- サイドバー標準フォント -->
      <tr>
        <?php ta_common_font_setting( 'ta_sidebar_font', 'サイドバー', 'pulldown', 'anchor' ); ?>
      </tr>
      <!-- サイドバーパラグラフ設定 -->
      <tr>
        <th id="ta_sidebar_paragraph_design_title" class="big-title"><a href="JavaScript:void(0);">サイドバー<br>パラグラフデザイン</a><?php ta_man2_gd( 'sidebar/font#paragraph' ); ?></th>
        <td>
          <div id="ta_sidebar_paragraph_design_disp" class="init-nodisp">
            <?php ta_paragraph_setting( 'ta_sidebar_font', 'サイドバー', 'pc_check' ); ?>
          </div><!-- end of #ta_sidebar_paragraph_design_disp -->
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'sidebar', 'サイドバー『フォント』設定更新', 'font' ); ?>
  </div><!-- end of #ta-sidebar-tab-font -->
  <?php } ?>
  
  
  <?php if ( 'titleh2' == $valid_tab ) { ?>
  <!-- h2 -->
  <div class="table" id="ta-sidebar-tab-titleh2">
    <?php ta_setting_form_start( 'sidebar', 'titleh2' ); ?>
    <table class="ta-setting-table">
      <!-- h2 サイドバータイトル表示 -->
      <tr>
        <th></th>
        <td>
          <div class="h2_area">
            <?php ta_headline_confirm( 'ta_sidebar_headline_h2', 'h2', 'sidebar_title' ); ?>
          </div>
        </td>
      </tr>
      <!-- h2 サイドバータイトル -->
      <tr>
        <th>h2 サイドバータイトル<?php ta_man2_gd( 'sidebar/hl' ); ?><br><span class="small-font"><?php echo esc_html( '<h2 class="sidebar_title"></h2>' ) . '<br>' . esc_html( '[sidebar-h2][/sidebar-h2]' ); ?></span></th>
        <td>
          <?php ta_headline_register( 'ta_sidebar_headline_h2', 'common' ); ?>
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'sidebar', 'サイドバー『h2タイトル』設定更新', 'titleh2' ); ?>
  </div><!-- end of #ta-sidebar-tab-titleh2 -->
  <?php } ?>
  
  
  <?php if ( 'titleh3' == $valid_tab ) { ?>
  <!-- h3 -->
  <div class="table" id="ta-sidebar-tab-titleh3">
    <?php ta_setting_form_start( 'sidebar', 'titleh3' ); ?>
    <table class="ta-setting-table">
      <!-- h3 サイドバータイトル表示 -->
      <tr>
        <th></th>
        <td>
          <div class="h3_area">
            <?php ta_headline_confirm( 'ta_sidebar_headline_h3', 'h3', 'sidebar_title' ); ?>
          </div>
        </td>
      </tr>
      <!-- h3 サイドバータイトル -->
      <tr>
        <th>h3 サイドバータイトル<?php ta_man2_gd( 'sidebar/hl' ); ?><br><span class="small-font"><?php echo esc_html( '<h3 class="sidebar_title"></h3>' ) . '<br>' . esc_html( '[sidebar-h3][/sidebar-h3]' ); ?></span></th>
        <td>
          <?php ta_headline_register( 'ta_sidebar_headline_h3', 'common' ); ?>
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'sidebar', 'サイドバー『h3タイトル』設定更新', 'titleh3' ); ?>
  </div><!-- end of #ta-sidebar-tab-titleh3 -->
  <?php } ?>
  
  
  <?php if ( 'titleh4' == $valid_tab ) { ?>
  <!-- h4 -->
  <div class="table" id="ta-sidebar-tab-titleh4">
    <?php ta_setting_form_start( 'sidebar', 'titleh4' ); ?>
    <table class="ta-setting-table">
      <!-- h4 サイドバータイトル表示 -->
      <tr>
        <th></th>
        <td>
          <div class="h4_area">
            <?php ta_headline_confirm( 'ta_sidebar_headline_h4', 'h4', 'sidebar_title' ); ?>
          </div>
        </td>
      </tr>
      <!-- h4 サイドバータイトル -->
      <tr>
        <th>h4 サイドバータイトル<?php ta_man2_gd( 'sidebar/hl' ); ?><br><span class="small-font"><?php echo esc_html( '<h4 class="sidebar_title"></h4>' ) . '<br>' . esc_html( '[sidebar-h4][/sidebar-h4]' ); ?></span></th>
        <td>
          <?php ta_headline_register( 'ta_sidebar_headline_h4', 'common' ); ?>
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'sidebar', 'サイドバー『h4タイトル』設定更新', 'titleh4' ); ?>
  </div><!-- end of #ta-sidebar-tab-titleh4 -->
  <?php } ?>
  
  
  <?php if ( 'titleh5' == $valid_tab ) { ?>
  <!-- h5 -->
  <div class="table" id="ta-sidebar-tab-titleh5">
    <?php ta_setting_form_start( 'sidebar', 'titleh5' ); ?>
    <table class="ta-setting-table">
      <!-- h5 サイドバータイトル表示 -->
      <tr>
        <th></th>
        <td>
          <div class="h5_area">
            <?php ta_headline_confirm( 'ta_sidebar_headline_h5', 'h5', 'sidebar_title' ); ?>
          </div>
        </td>
      </tr>
      <!-- h5 サイドバータイトル -->
      <tr>
        <th>h5 サイドバータイトル<?php ta_man2_gd( 'sidebar/hl' ); ?><br><span class="small-font"><?php echo esc_html( '<h5 class="sidebar_title"></h5>' ) . '<br>' . esc_html( '[sidebar-h5][/sidebar-h5]' ); ?></span></th>
        <td>
          <?php ta_headline_register( 'ta_sidebar_headline_h5', 'common' ); ?>
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'sidebar', 'サイドバー『h5タイトル』設定更新', 'titleh5' ); ?>
  </div><!-- end of #ta-sidebar-tab-titleh5 -->
  <?php } ?>
  
  
  <?php if ( 'deco1' == $valid_tab ) { ?>
  <!-- 装飾1 -->
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_sidebar_deco_setting( 1 );
} else { ?>
  <div class="table" id="ta-sidebar-tab-deco1">
    <table class="ta-setting-table">
      <tr>
        <th class="no-ta-thm001highend">サイドバー装飾1<?php ta_man2_gd( 'sidebar/deco' ); ?><br><span class="small-font"><?php echo esc_html( '<h6 class="sidebar_deco1"></h6>' ) . '<br>' . esc_html( '[side-deco1][/side-deco1]' ); ?></span></th>
        <td></td>
      </tr>
    </table>
  </div><!-- end of #ta-sidebar-tab-deco1 -->
<?php
} ?>
  <?php } ?>
  
  
  <?php if ( 'deco2' == $valid_tab ) { ?>
  <!-- 装飾2 -->
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_sidebar_deco_setting( 2 );
} else { ?>
  <div class="table" id="ta-sidebar-tab-deco2">
    <table class="ta-setting-table">
      <tr>
        <th class="no-ta-thm001highend">サイドバー装飾2<?php ta_man2_gd( 'sidebar/deco' ); ?><br><span class="small-font"><?php echo esc_html( '<h6 class="sidebar_deco2"></h6>' ) . '<br>' . esc_html( '[side-deco2][/side-deco2]' ); ?></span></th>
        <td></td>
      </tr>
    </table>
  </div><!-- end of #ta-sidebar-tab-deco2 -->
<?php
} ?>
  <?php } ?>
  
  
  <?php if ( 'deco3' == $valid_tab ) { ?>
  <!-- 装飾3 -->
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_sidebar_deco_setting( 3 );
} else { ?>
  <div class="table" id="ta-sidebar-tab-deco3">
    <table class="ta-setting-table">
      <tr>
        <th class="no-ta-thm001highend">サイドバー装飾3<?php ta_man2_gd( 'sidebar/deco' ); ?><br><span class="small-font"><?php echo esc_html( '<h6 class="sidebar_deco3"></h6>' ) . '<br>' . esc_html( '[side-deco3][/side-deco3]' ); ?></span></th>
        <td></td>
      </tr>
    </table>
  </div><!-- end of #ta-sidebar-tab-deco3 -->
<?php
} ?>
  <?php } ?>
  
  
  <?php if ( 'deco4' == $valid_tab ) { ?>
  <!-- 装飾4 -->
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_sidebar_deco_setting( 4 );
} else { ?>
  <div class="table" id="ta-sidebar-tab-deco4">
    <table class="ta-setting-table">
      <tr>
        <th class="no-ta-thm001highend">サイドバー装飾4<?php ta_man2_gd( 'sidebar/deco' ); ?><br><span class="small-font"><?php echo esc_html( '<h6 class="sidebar_deco4"></h6>' ) . '<br>' . esc_html( '[side-deco4][/side-deco4]' ); ?></span></th>
        <td></td>
      </tr>
    </table>
  </div><!-- end of #ta-sidebar-tab-deco4 -->
<?php
} ?>
  <?php } ?>
  
  
  <?php if ( 'freearea' == $valid_tab ) { ?>
  <!-- フリーエリア -->
  <div class="table" id="ta-sidebar-tab-freearea">
    <?php ta_setting_form_start( 'sidebar', 'freearea' ); ?>
    <table class="ta-setting-table">
      <!-- サイドバーフリーエリア -->
      <tr>
        <th>サイドバーフリーエリア<?php ta_man2_gd( 'sidebar/sidebar_fa' ); ?><br>（TAサイドFA）</th>
        <td>
          <h4>サイドバーフリーエリア</h4>
          <?php ta_alternative_input_checkbox( 'ta_sidebar_freearea_onoff', '使用する' ); ?>
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <!-- 詳細設定 -->
          <h4 id="ta_sidebar_freearea_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
          <div id="ta_sidebar_freearea_pro_disp" class="pro-disp init-nodisp">
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <h4>サイドバーフリーエリア<br>タイトルの表示共通設定</h4>
                  <?php ta_alternative_input_checkbox( 'ta_sidebar_freearea_title_onoff', '表示する' ); ?>
                </td>
                <td>
                  <h4>サイドバーフリーエリア<br>タイトル要素名共通設定</h4>
                  <?php ta_factor_selection_process( 'ta_sidebar_freearea_title_factor', 'option', 0, 'none', 'サイドバー' ); ?>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>サイドバーフリーエリア投稿コンテンツ（TAサイドFA）の表示順</h4>
            <?php $init_value = ta_read_op( 'ta_sidebar_freearea_display_order' ); ?>
            <p><input type="radio" name="ta_sidebar_freearea_display_order" value="DESC" <?php if ( "DESC" == $init_value ) echo 'checked="checked"'; ?>> 順序番号の降順（大から小）</p>
            <p><input type="radio" name="ta_sidebar_freearea_display_order" value="ASC" <?php if ( "ASC" == $init_value ) echo 'checked="checked"'; ?>> 順序番号の昇順（小から大）</p>
            <p>※ ステータスが“公開済み”のコンテンツが対象です</p>
          </div><!-- end of #ta_sidebar_freearea_pro_disp -->
          <span class="fixed-space"></span>
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'sidebar', 'サイドバー『フリーエリア』設定更新', 'freearea' ); ?>
  </div><!-- end of #ta-sidebar-tab-freearea -->
  <?php } ?>
  
  
  <?php if ( 'latestposts' == $valid_tab ) { ?>
  <!-- 最新投稿ダイジェスト -->
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_sidebar_latestposts_setting();
} else { ?>
  <div class="table" id="ta-sidebar-tab-latestposts">
    <table class="ta-setting-table">
      <!-- 最新投稿ダイジェスト -->
      <tr>
        <th class="no-ta-thm001highend">最新投稿ダイジェスト<?php ta_man2_gd( 'sidebar/latestposts' ); ?><br>（全ての投稿が対象）</th>
        <td></td>
      </tr>
    </table>
  </div><!-- end of #ta-sidebar-tab-latestposts -->
<?php
} ?>
  <?php } ?>
  
  
  <?php if ( 'postdigest' == $valid_tab ) { ?>
  <!-- 各種投稿ダイジェスト -->
  <div class="table" id="ta-sidebar-tab-postdigest">
    <?php ta_setting_form_start( 'sidebar', 'postdigest' ); ?>
    <table class="ta-setting-table">
      <!-- サイドバー各種投稿ダイジェスト -->
      <tr>
        <th>各種投稿ダイジェスト<?php ta_man2_gd( 'sidebar/postdigest' ); ?></th>
        <td>
          <div class="ta-setting-inline-gp">
            <div class="inline-gp-5_0em">
              <h4>各種投稿ダイジェスト定位置一括表示</h4>
              <div class="digest_steady_onoff_cover">
                <?php ta_alternative_input_checkbox( 'ta_sidebar_postdigest_onoff', '定位置一括表示を使用する' ); ?>
              </div>
            </div>
<?php
if ( TA_HIEND_PI ) { ?>
            <div id="ta_sidebar_postdigest_shortcode" class="inline-gp-0">
              <h4>各種投稿ダイジェスト個別表示ショートコード</h4>
              <p>以下のショートコードをTAサイドFAに張り付けることができます</p>
              <p><input readonly value='[ta_postdigest_disp place=sidebar slug=カテゴリーのslug名]' onclick="this.select(0,this.value.length)" style="width:32em;"/></p>
              <p style="color:#ff0000;">※ 指定の場所以外ではCSSデザインが正しく表示されません</p>
              <p>※ ページャーは使用できません</p>
            </div>
<?php
} else { ?>
            <div class="inline-gp-0">
              <h4 class="no-ta-thm001highend" style="color:#bbbbbb;margin-top:0;">各種投稿ダイジェスト個別表示ショートコード</h4>
            </div>
<?php
} ?>
          </div>
          <span class="fixed-space"></span>
          <hr class="fixed-border">
<?php
if ( TA_HIEND_PI ) { ?>
          <div id="ta_sidebar_postdigest_usable_cover">
            <h4>現在使用可能なカテゴリーとそのslug名</h4>
            <p><span style="color:#ff7f00;">※ 日本語のslug名は文字化けする場合があります</span></p>
            <table class="usable-cat-list">
              <tr class="usable-cat-list-title">
                <td class="usable-cat-list-cat">カテゴリー名</td>
                <td class="usable-cat-list-slug">slug名</td>
              </tr>
<?php
  $usable_oe = 'odd';
  $categories = get_categories( 'get=all' );
  foreach ( $categories as $category ) {
    if ( 'odd' == $usable_oe ) {
      $usable_oe = 'even';
    } else {
      $usable_oe = 'odd';
    } ?>
              <tr class="usable-cat-list-<?php echo $usable_oe; ?>">
                <td class="usable-cat-list-cat"><?php echo $category->name; ?></td>
                <td class="usable-cat-list-slug"><?php echo $category->slug; ?></td>
              </tr>
<?php
  } ?>
            </table>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
          </div>
<?php
} ?>
          <div id="ta_sidebar_postdigest_steady_cat_cover">
            <h4>定位置一括表示対象カテゴリー</h4>
            <p>※ カテゴリーの表示順を変更するには『Category Order and Taxonomy Terms Order』などのプラグインを使用してください</p>
<?php 
  $init_value = ta_read_op( 'ta_sidebar_postdigest_titles' );
  $categories = get_categories( 'get=all' );
  foreach ( $categories as $category ) { ?>
            <p><input type="checkbox" name="ta_sidebar_postdigest_titles[]" value="<?php echo $category->slug; ?>" <?php ta_cat_check( $init_value, $category->slug ); ?>> <?php echo $category->name; ?></p>
<?php
  } ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
          </div>
<?php
  $disp_status = ( 'invalid' == ta_read_op( 'ta_sidebar_postdigest_onoff' ) ) ? 'block': 'none';
  $rdisp_status = ( 'valid' == ta_read_op( 'ta_sidebar_postdigest_onoff' ) ) ? 'block': 'none'; ?>
          <style type="text/css">
            #ta_sidebar_postdigest_shortcode,
            #ta_sidebar_postdigest_usable_cover { display: <?php echo $disp_status; ?>; }
            #ta_sidebar_postdigest_steady_cat_cover { display: <?php echo $rdisp_status; ?>; }
          </style>
<?php
if ( TA_HIEND_PI ) {
          ta_thm001highend_sidebar_postdigest_position_setting(); ?>
          <span class="fixed-space"></span>
          <hr class="fixed-border">
<?php
} else { ?>
          <h4 class="no-ta-thm001highend" style="color:#bbbbbb;">各種投稿ダイジェスト定位置一括表示の位置</h4>
          <p>※サイドバーフリーエリアの下に固定です</p>
          <span class="fixed-space"></span>
          <hr class="fixed-border">
<?php
}
          ta_sidebar_top_margin_setting( 'ta_sidebar_postdigest' ); ?>
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <!-- 詳細設定 -->
          <h4 id="ta_sidebar_postdigest_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
          <div id="ta_sidebar_postdigest_pro_disp" class="pro-disp init-nodisp">
            <?php ta_postdigest_setting_detail( 'sidebar' ); ?>
          </div><!-- end of #ta_sidebar_postdigest_pro_disp -->
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <!-- 記事のデザイン設定 -->
          <h4 id="ta_sidebar_postdigest_article_pro_title" class="pro-title"><a href="JavaScript:void(0);">記事のデザイン設定</a></h4>
          <div id="ta_sidebar_postdigest_article_pro_disp" class="pro-disp init-nodisp">
            <?php ta_article_digest_design( 'sidebar_postdigest' ); ?>
          </div><!-- end of #ta_sidebar_postdigest_article_pro_disp -->
          <span class="fixed-space"></span>
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'sidebar', 'サイドバー『各種投稿ダイジェスト』設定更新', 'postdigest' ); ?>
  </div><!-- end of #ta-sidebar-tab-postdigest -->
  <?php } ?>
  
  
  <?php if ( 'widget' == $valid_tab ) { ?>
  <!-- ウィジェット -->
  <div class="table" id="ta-sidebar-tab-widget">
    <?php ta_setting_form_start( 'sidebar', 'widget' ); ?>
    <table class="ta-setting-table">
      <!-- サイドバーウィジェット -->
      <tr>
        <th>サイドバーウィジェット<?php ta_man2_gd( 'sidebar/widget' ); ?></th>
        <td>
          <h4>ウィジェット</h4>
          <?php ta_alternative_input_checkbox( 'ta_sidebar_widget_onoff', '使用する' ); ?>
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <!-- 詳細設定 -->
          <h4 id="ta_sidebar_widget_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
          <div id="ta_sidebar_widget_pro_disp" class="pro-disp init-nodisp">
            <h4>ウィジェットタイトルの要素名設定</h4>
            <?php ta_factor_selection_process( 'ta_sidebar_widget_title_factor', 'option', 0, 'none', 'サイドバー' ); ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_sidebar_widget_position_setting();
} else { ?>
            <h4 class="no-ta-thm001highend" style="color:#bbbbbb;">ウィジェットの位置</h4>
            <p>※ サイドバーフリーエリアの上に固定です</p>
<?php
} ?>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <h4>センタリング</h4>
            <?php ta_alternative_input_checkbox( 'ta_sidebar_widget_centering', 'センタリングする' ); ?>
            <p>※ センタリングできないウィジェットもあります</p>
          </div><!-- end of #ta_sidebar_widget_pro_disp -->
          <span class="fixed-space"></span>
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'sidebar', 'サイドバー『ウィジェット』設定更新', 'widget' ); ?>
  </div><!-- end of #ta-sidebar-tab-widget -->
  <?php } ?>
  
  
  <?php if ( 'menu' == $valid_tab ) { ?>
  <!-- TAサイドバーメニュー -->
  <div class="table" id="ta-sidebar-tab-menu">
    <p style="margin-top:1em;">本設定はTAサイドFA編集画面にて選択できるTAサイドバーメニューで使用するメニュー項目のヘッドライン装飾を指定します。</p>
    <p style="margin-top:0.5em;">※ TAサイドバーメニュー（子孫展開無しの縦型）はWordPress標準のメニュー機能を使用しています。有効にするためには関連付けが必要です。
    関連付けの方法は<a href="http://theme001.tec-aid.com/thm001_manual_p2/thm001_manual_basicope_p2#readymade_menu" target="_blank">こちら</a>をご覧ください。</p>
    <?php ta_setting_form_start( 'sidebar', 'menu' ); ?>
    <table class="ta-setting-table">
      <!-- TAサイドバーメニュー -->
      <tr>
        <th id="ta_sidebar_menu_title">TAサイドバーメニュー<?php ta_man2_gd( 'sidebar/menu' ); ?></th>
        <td>
          <h4>TAサイドバーメニュー#1</h4>
          <?php $init = ta_read_op( 'ta_sidebar_menu_factor1' ); ?>
          <p>
            <input type="radio" name="ta_sidebar_menu_factor1" value="none" <?php if ( "none" == $init ) echo 'checked="checked"'; ?>> 装飾無し　
            <input type="radio" name="ta_sidebar_menu_factor1" value="h2" <?php if ( "h2" == $init ) echo 'checked="checked"'; ?>> h2（サイドバータイトル）　
            <input type="radio" name="ta_sidebar_menu_factor1" value="h3" <?php if ( "h3" == $init ) echo 'checked="checked"'; ?>> h3（サイドバータイトル）　
            <input type="radio" name="ta_sidebar_menu_factor1" value="h4" <?php if ( "h4" == $init ) echo 'checked="checked"'; ?>> h4（サイドバータイトル）　
            <input type="radio" name="ta_sidebar_menu_factor1" value="h5" <?php if ( "h5" == $init ) echo 'checked="checked"'; ?>> h5（サイドバータイトル）
          </p>
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_sidebar_menu_setting();
} else { ?>
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <h4 class="no-ta-thm001highend" style="color:#bbbbbb;">サイドバーメニュー#2～#10</h4>
          <span class="fixed-space"></span>
<?php
} ?>
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'sidebar', 'サイドバー『サイドバーメニュー』設定更新', 'menu' ); ?>
  </div><!-- end of #ta-sidebar-tab-menu -->
  <?php } ?>
  
  
  <?php if ( 'etc' == $valid_tab ) { ?>
  <!-- その他 -->
  <div class="table" id="ta-sidebar-tab-etc">
    <?php ta_setting_form_start( 'sidebar', 'etc' ); ?>
    <table class="ta-setting-table">
      <!-- サイドバーコンテンツ間隔 -->
      <tr>
        <th id="ta_sidebar_fixed_space_title" class="big-title"><a href="JavaScript:void(0);">サイドバー<br>コンテンツ間隔</a><?php ta_man2_gd( 'sidebar/etc#fixed_space' ); ?></th>
        <td>
          <span class="fixed-space"></span>
          <div id="ta_sidebar_fixed_space_disp" class="init-nodisp">
            <?php ta_simple_input( 'ta_sidebar_fixed_space', 'ピクセル', 'short_box' ); ?>
          </div><!-- end of #ta_sidebar_fixed_space_disp -->
        </td>
      </tr>
      <!-- サイドバー区切り線ショートコード -->
      <tr>
        <th id="ta_sidebar_separator_title" class="big-title"><a href="JavaScript:void(0);">サイドバー区切り線<br>ショートコード</a><?php ta_man2_gd( 'sidebar/etc#separator' ); ?></th>
        <td>
          <div id="ta_sidebar_separator_disp" class="init-nodisp">
            <h4>以下のショートコードをサイドバーの編集画面（TAサイドFA）でお使いください。</h4>
            <p><input readonly value='[sidebar_separator]' onclick="this.select(0,this.value.length)" style="width:13em;"/></p>
            <span class="fixed-space"></span>
            <hr class="fixed-border">
            <table class="ta-2contents-table">
              <tr>
                <td>
                  <h4>区切り線の太さ</h4>
                  <?php ta_simple_input( 'ta_sidebar_separator_size', 'ピクセル', 'short_box' ); ?>
                </td>
                <td>
                  <h4>区切り線の種類</h4>
                  <?php $init = ta_read_op( 'ta_sidebar_separator_kind' ); ?>
                  <table class="ta-fullcontents-table">
                    <tr>
                      <td style="width:7em;">
                        <p><input type="radio" name="ta_sidebar_separator_kind" value="solid" <?php if ( "solid" == $init ) echo 'checked="checked"' ?>> 実線</p>
                      </td>
                      <td>
                        <p><input type="radio" name="ta_sidebar_separator_kind" value="double" <?php if ( "double" == $init ) echo 'checked="checked"' ?>> 二重線</p>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <p><input type="radio" name="ta_sidebar_separator_kind" value="dotted" <?php if ( "dotted" == $init ) echo 'checked="checked"' ?>> 点線</p>
                      </td>
                      <td>
                        <p><input type="radio" name="ta_sidebar_separator_kind" value="groove" <?php if ( "groove" == $init ) echo 'checked="checked"' ?>> groove</p>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <p><input type="radio" name="ta_sidebar_separator_kind" value="dashed" <?php if ( "dashed" == $init ) echo 'checked="checked"' ?>> 破線</p>
                      </td>
                      <td>
                        <p><input type="radio" name="ta_sidebar_separator_kind" value="ridge" <?php if ( "ridge" == $init ) echo 'checked="checked"' ?>> ridge</p>
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
                  <?php ta_color_picker_no_tomei_grad_process( 'ta_sidebar_separator_kind_color', 'valid' ); ?>
                </td>
                <td>
                  <h4>区切り線上部余白</h4>
                  <?php ta_simple_input( 'ta_sidebar_separator_tmargin', 'ピクセル', 'short_box' ); ?>
                </td>
                <td>
                  <h4>区切り線下部余白</h4>
                  <?php ta_simple_input( 'ta_sidebar_separator_bmargin', 'ピクセル', 'short_box' ); ?>
                </td>
              </tr>
            </table>
            <span class="fixed-space"></span>
          </div><!-- end of #ta_sidebar_separator_disp -->
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'sidebar', 'サイドバー『その他』設定更新', 'etc' ); ?>
  </div><!-- end of #ta-sidebar-tab-etc -->
  <?php } ?>
</div>
<?php
ta_progress_disp();
$sidebar_bg_color_select = ta_read_op( 'ta_common_top_outframe_color_select' );
$sidebar_bg_color = ta_read_op( 'ta_common_top_outframe_color' );
if ( 'common_site_bg' == $sidebar_bg_color_select ) { $sidebar_bg_color = ta_read_op( 'ta_common_site_bg_color' ); }
else if ( 'common_site_hl' == $sidebar_bg_color_select ) { $sidebar_bg_color = ta_read_op( 'ta_common_site_hl_color' ); }
else if ( 'common_site_text_on_bg' == $sidebar_bg_color_select ) { $sidebar_bg_color = ta_read_op( 'ta_common_site_text_on_bg_color' ); }
else if ( 'common_site_text_on_hl' == $sidebar_bg_color_select ) { $sidebar_bg_color = ta_read_op( 'ta_common_site_text_on_hl_color' ); } ?>
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
  background-color: <?php echo $sidebar_bg_color; ?>;
-->
</style>
<?php ta_info_disp(); ?>
