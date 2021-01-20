<?php
/***************************************************************************************************************/
/*
/* テックエイドの成長する自作ホームページWordPressテーマ『 TAテーマ001 (ta-theme001) 』
/*
/* ta-short-setting.php: ( Latest Version 2.02 2017.02.20 )
/*
/* このプログラムの著作権、使用権、その他全ての権利はde集まれ株式会社に属します。
/* The copyright, royalty and all the other rights of this program belong to deatsumare Corporation.
/*
/* File Version 履歴
/* File Version 2.00 2016.03.08: first edition by Kotaro Kashiwamura.
/* File Version 2.01 2016.06.30: 汎用背景装飾追加 by Kotaro Kashiwamura.
/* File Version 2.02 2017.02.20: TA汎用メニュー、TA画像説明付メニュー表記修正、色選択修正、ajax化 by Kotaro Kashiwamura.
/*
/***************************************************************************************************************/
if ( TA_HIEND_PI ) { require_once( TA_HIEND_PI_DIR . '/setting-modules/ta-theme001-highend-short-setting.php' ); } ?>
<div id="ta-setting-form">
  <!-- タイトルとタブ -->
  <div id="ta-menu-group">
    <div id="ta-menu-title-container">
      <h2 id="ta-menu-title">TAテーマ001・汎用ショートコード設定メニュー</h2>
      <?php ta_ver_display(); ?>
    </div>
    <a id="ta-menu-talink-anc" href="http://theme001.tec-aid.com/" target="_blank"><div id="ta-menu-talink"></div></a>
  </div>
<?php
ta_development_disp();
ta_setting_scroll();
ta_setting_message_disp();
$ta_tabs = array( 'simple' => '簡易最新投稿ダイジェスト', 'versatile' => 'TA汎用メニュー', 'imgexp' => 'TA画像説明付メニュー', 'gnrlbg' => 'TA汎用背景装飾', );
$ta_tabs = apply_filters( 'ta_short_settting_page_tab', $ta_tabs ); //フィルターフック'ta_short_settting_page_tab'を設置
$valid_tab = ta_tab_lists( $ta_tabs );  //タブの設置と有効タブの検出 ?>
  
  
  <?php if ( 'simple' == $valid_tab ) { ?>
  <!-- 汎用ショートコード -->
  <div class="table" id="ta-short-tab-simple">
    <?php ta_setting_form_start( 'short', 'simple' ); ?>
    <table class="ta-setting-table">
      <!-- 簡易最新投稿ダイジェスト（ショートコード作成）-->
      <tr>
        <th>簡易最新投稿ダイジェスト<?php ta_man2_gd( 'short/simple' ); ?><br>（ショートコード作成）</th>
        <td>
          <h4>以下のショートコードを投稿記事等に張り付けてください<span style="color:#ff0000;"> ※ 指定の場所以外ではCSSデザインが正しく表示されません</span></h4>
          <div class="ta-setting-inline-gp">
            <div class="inline-gp-30">
              <p style="margin-top:10px;">TAヘッダーFA（フリーエリア）</p>
              <p><input readonly value='[ta_simple_latestposts_disp title_prefix="header"]' onclick="this.select(0,this.value.length)" style="width:27em;"/></p>
            </div>
            <div class="inline-gp-0">
              <p style="margin-top:10px;">固定ページ、投稿ページ、TA説明エリア、TAトップFA（フリーエリア）</p>
              <p><input readonly value="[ta_simple_latestposts_disp]" onclick="this.select(0,this.value.length)" style="width:27em;"/></p>
            </div>
          </div>
          <div class="ta-setting-inline-gp">
            <div class="inline-gp-30">
              <p style="margin-top:10px;">TAサイドFA（フリーエリア）</p>
              <p><input readonly value='[ta_simple_latestposts_disp title_prefix="sidebar"]' onclick="this.select(0,this.value.length)" style="width:27em;"/></p>
            </div>
            <div class="inline-gp-0">
              <p style="margin-top:10px;">TAサブサイドFA（フリーエリア）</p>
              <p><input readonly value='[ta_simple_latestposts_disp title_prefix="sidebarsub"]' onclick="this.select(0,this.value.length)" style="width:27em;"/></p>
            </div>
          </div>
          <p style="margin-top:10px;">TAフッターFA（フリーエリア）</p>
          <p><input readonly value='[ta_simple_latestposts_disp title_prefix="footer"]' onclick="this.select(0,this.value.length)" style="width:27em;"/></p>
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <!-- 詳細設定 -->
          <h4 id="ta_short_simple_latestposts_pro_title" class="pro-title"><a href="JavaScript:void(0);">詳細設定</a></h4>
          <div id="ta_short_simple_latestposts_pro_disp" class="pro-disp init-nodisp">
            <?php ta_simple_latestposts_setting_detail(); ?>
          </div><!-- end of #ta_short_simple_latestposts_pro_disp -->
          <span class="fixed-space"></span>
          <hr class="fixed-border">
          <!-- 記事のデザイン設定 -->
          <h4 id="ta_short_simple_latestposts_article_pro_title" class="pro-title"><a href="JavaScript:void(0);">記事のデザイン設定</a></h4>
          <div id="ta_short_simple_latestposts_article_pro_disp" class="pro-disp init-nodisp">
            <?php ta_simple_article_digest_design(); ?>
          </div><!-- end of #ta_short_simple_latestposts_article_pro_disp -->
          <span class="fixed-space"></span>
        </td>
      </tr>
    </table>
    <?php ta_setting_form_end( 'short', '汎用ショートコード『簡易最新投稿ダイジェスト』設定更新', 'simple' ); ?>
  </div><!-- end of #ta-short-tab-simple -->
  <?php } ?>
  
  
  <?php if ( 'versatile' == $valid_tab ) { ?>
  <!-- TA汎用メニュー（ショートコード作成）-->
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_versatile_menu_setting();
} else { ?>
  <div class="table" id="ta-short-tab-versatile">
    <table class="ta-setting-table">
      <tr>
        <th class="no-ta-thm001highend">TA汎用メニュー#1</a><?php ta_man2_gd( 'short/versatile' ); ?><br>（ショートコード作成）</th>
        <td></td>
      </tr>
      <tr>
        <th class="no-ta-thm001highend">TA汎用メニュー#2</a><?php ta_man2_gd( 'short/versatile' ); ?><br>（ショートコード作成）</th>
        <td></td>
      </tr>
      <tr>
        <th class="no-ta-thm001highend">TA汎用メニュー#3</a><?php ta_man2_gd( 'short/versatile' ); ?><br>（ショートコード作成）</th>
        <td></td>
      </tr>
      <tr>
        <th class="no-ta-thm001highend">TA汎用メニュー#4</a><?php ta_man2_gd( 'short/versatile' ); ?><br>（ショートコード作成）</th>
        <td></td>
      </tr>
      <tr>
        <th class="no-ta-thm001highend">TA汎用メニュー#5</a><?php ta_man2_gd( 'short/versatile' ); ?><br>（ショートコード作成）</th>
        <td></td>
      </tr>
    </table>
  </div><!-- end of #ta-short-tab-versatile -->
<?php
} ?>
  <?php } ?>
  
  
  <?php if ( 'imgexp' == $valid_tab ) { ?>
  <!-- 画像と説明付きメニュー -->
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_imgexp_menu_setting();
} else { ?>
  <div class="table" id="ta-short-tab-imgexp">
    <table class="ta-setting-table">
      <tr>
        <th class="no-ta-thm001highend">画像と説明付きメニューA<?php ta_man2_gd( 'short/imgexp' ); ?><br>（ショートコード作成）</th>
        <td></td>
      </tr>
      <tr>
        <th class="no-ta-thm001highend">画像と説明付きメニューB<?php ta_man2_gd( 'short/imgexp' ); ?><br>（ショートコード作成）</th>
        <td></td>
      </tr>
    </table>
  </div><!-- end of #ta-short-tab-imgexp -->
<?php
} ?>
  <?php } ?>
  
  
  <?php if ( 'gnrlbg' == $valid_tab ) { ?>
  <!-- TA汎用背景装飾 -->
<?php
if ( TA_HIEND_PI ) {
  ta_thm001highend_genbg_setting();
} else { ?>
  <div class="table" id="ta-short-tab-gnrlbg">
    <table class="ta-setting-table">
      <tr>
        <th class="no-ta-thm001highend">TA汎用背景装飾#1</a><?php ta_man2_gd( 'short/genbg' ); ?><br>（ショートコード作成）</th>
        <td></td>
      </tr>
      <tr>
        <th class="no-ta-thm001highend">TA汎用背景装飾#2</a><?php ta_man2_gd( 'short/genbg' ); ?><br>（ショートコード作成）</th>
        <td></td>
      </tr>
      <tr>
        <th class="no-ta-thm001highend">TA汎用背景装飾#3</a><?php ta_man2_gd( 'short/genbg' ); ?><br>（ショートコード作成）</th>
        <td></td>
      </tr>
      <tr>
        <th class="no-ta-thm001highend">TA汎用背景装飾#4</a><?php ta_man2_gd( 'short/genbg' ); ?><br>（ショートコード作成）</th>
        <td></td>
      </tr>
      <tr>
        <th class="no-ta-thm001highend">TA汎用背景装飾#5</a><?php ta_man2_gd( 'short/genbg' ); ?><br>（ショートコード作成）</th>
        <td></td>
      </tr>
    </table>
  </div><!-- end of #ta-short-tab-gnrlbg -->
<?php
} ?>
  <?php } ?>
</div>
<?php
ta_progress_disp();
ta_info_disp(); ?>
