<?php
/***************************************************************************************************************/
/*
/* テックエイドの成長する自作ホームページWordPressテーマ『 TAテーマ001 (ta-theme001) 』
/*
/* ta-seocentral-setting.php: ( Latest Version 2.01 2017.02.20 )
/*
/* このプログラムの著作権、使用権、その他全ての権利はde集まれ株式会社に属します。
/* The copyright, royalty and all the other rights of this program belong to deatsumare Corporation.
/*
/* File Version 履歴
/* File Version 2.00 2016.09.26: first edition by Kotaro Kashiwamura.
/* File Version 2.01 2017.02.20: 体裁調整、ajax化 by Kotaro Kashiwamura.
/*
/***************************************************************************************************************/ ?>
<div id="ta-setting-form">
  <!-- タイトルとタブ -->
  <div id="ta-menu-group">
    <div id="ta-menu-title-container">
      <h2 id="ta-menu-title">TAテーマ001・SEO設定集中管理</h2>
      <?php ta_ver_display(); ?>
    </div>
    <a id="ta-menu-talink-anc" href="http://theme001.tec-aid.com/" target="_blank"><div id="ta-menu-talink"></div></a>
  </div>
<?php
ta_development_disp();
ta_setting_scroll();
ta_setting_message_disp( 'invalid' );
$ta_tabs = array( 'toppage' => 'トップページ', 'pages' => '固定ページ', 'posts' => '投稿記事ページ', );
$ta_tabs = apply_filters( 'ta_seocentral_settting_page_tab', $ta_tabs ); //フィルターフック'ta_seocentral_settting_page_tab'を設置
$valid_tab = ta_tab_lists( $ta_tabs );  //タブの設置と有効タブの検出 ?>
  
  
  <?php if ( 'toppage' == $valid_tab ) { ?>
  <!-- トップページ -->
  <div class="table" id="ta-seocentral-tab-toppage">
    <div class="ta-manual-info"><a href="http://theme001.tec-aid.com/thm001_manual_p2/seocentral#toppage" target="_blank"><span class="dashicons dashicons-editor-help"></span></a></div>
    <div id="seo-central-setting-baseset">
      <table class="common-chart">
        <tr>
          <th></th>
          <td>内容</td>
          <td>備考</td>
        </tr>
        <tr>
          <th>共通キーワード</th>
          <td><?php echo ta_read_op( 'ta_common_seo_common_keywords' ); ?></td>
          <td>トップページ設定は共通キーワードの前に追加されます</td>
        </tr>
        <tr>
          <th>共通ディスクリプション</th>
          <td><?php echo ta_read_op( 'ta_common_seo_common_description' ); ?></td>
          <td>トップページ設定が未入力の場合は、共通ディスクリプションが採用されます</td>
        </tr>
        <tr>
          <th>h1共通表記</th>
          <td><?php echo ta_read_op( 'ta_common_seo_common_h1_content' ); ?></td>
          <td>トップページ設定が未入力の場合は、h1共通表記設定が採用されます</td>
        </tr>
      </table>
    </div>
    <p style="font-size:90%;margin-top:15px;color:#ff7f00;">※ 以下の設定は、TAテーマ001・トップページ設定メニュー ⇒ 『SEO・SMO』 ⇒ 『トップページSEO設定』 の設定と同じものです。</p>
    <?php ta_setting_form_start( 'seocentral', 'toppage' ); ?>
    <div id="ta-seocentral-toppage-contents">
      <h4>SEOキーワード（共通キーワードの前に追加されます）</h4>
      <?php ta_text_input( 'ta_top_seo_keywords', 'long_box' ); ?>
      <h4>SEOディスクリプション（120文字以内で入力してください）</h4>
      <?php ta_textarea_input( 'ta_top_seo_description', 4, 80 ); ?>
      <h4>トップページh1表記</h4>
      <?php ta_text_input( 'ta_top_h1_content', 'long_box' ); ?>
      <h4>カノニカルタグ設定</h4>
      <?php ta_text_input( 'ta_top_canonical_domain', 'long_box' ); ?>
    </div>
    <?php ta_setting_form_end( 'seocentral', 'SEO設定集中管理『トップページ』設定更新', 'toppage' ); ?>
  </div><!-- end of #ta-seocentral-tab-toppage -->
  <?php } ?>
  
  
  <?php if ( 'pages' == $valid_tab ) { ?>
  <!-- 固定ページ -->
<?php
$paged = isset( $_GET['paged'] ) ? $_GET['paged'] : 1;
if ( 0 == $paged ) { $paged = 1; } ?>
  <div class="table" id="ta-seocentral-tab-pages">
    <div class="ta-manual-info"><a href="http://theme001.tec-aid.com/thm001_manual_p2/seocentral#pages" target="_blank"><span class="dashicons dashicons-editor-help"></span></a></div>
    <?php ta_setting_form_start( 'seocentral', 'pages' ); ?>
    <input type="hidden" name="paged" value="<?php echo $paged; ?>" />
    <div id="seo-central-setting-baseset">
      <table class="common-chart">
        <tr>
          <th></th>
          <td>内容</td>
          <td>備考</td>
        </tr>
        <tr>
          <th>共通キーワード</th>
          <td><?php echo ta_read_op( 'ta_common_seo_common_keywords' ); ?></td>
          <td>固定ページ設定は共通キーワードの前に追加されます</td>
        </tr>
        <tr>
          <th>共通ディスクリプション</th>
          <td><?php echo ta_read_op( 'ta_common_seo_common_description' ); ?></td>
<?php
if ( 'valid' == ta_read_op( 'ta_common_seo_description_excerptonoff' ) ) { ?>
          <td>固定ページ設定が未入力の場合は、本文の抜粋（120文字）が採用されます</td>
<?php
} else { ?>
          <td>固定ページ設定が未入力の場合は、共通ディスクリプションが採用されます</td>
<?php
} ?>
        </tr>
        <tr>
          <th>h1共通表記</th>
          <td><?php echo ta_read_op( 'ta_common_seo_common_h1_content' ); ?></td>
<?php
if ( 'valid' == ta_read_op( 'ta_common_seo_h1_commononoff' ) ) { ?>
          <td>固定ページ設定が未入力の場合は、h1共通表記設定が採用されます</td>
<?php
} else { ?>
          <td>固定ページ設定が未入力の場合は、各ページの設定が採用されます</td>
<?php
} ?>
        </tr>
      </table>
      <div class="ta-setting-inline-gp" style="margin-top:10px;">
        <div class="inline-gp-30">
          <h4>表示件数</h4>
          <?php $ta_seocentral_pages_num = ta_read_op( 'ta_seocentral_pages_num' ); ?>
          <p>
            <select name="ta_seocentral_pages_num">
              <option value="5" <?php if ( "5" == $ta_seocentral_pages_num ) echo "selected"; ?>>5件</option>
              <option value="10" <?php if ( "10" == $ta_seocentral_pages_num ) echo "selected"; ?>>10件</option>
              <option value="25" <?php if ( "25" == $ta_seocentral_pages_num ) echo "selected"; ?>>25件</option>
              <option value="50" <?php if ( "50" == $ta_seocentral_pages_num ) echo "selected"; ?>>50件</option>
              <option value="100" <?php if ( "100" == $ta_seocentral_pages_num ) echo "selected"; ?>>100件</option>
            </select>
          </p>
        </div>
        <div class="inline-gp-30">
          <h4>ステータス</h4>
          <?php $ta_seocentral_pages_status = ta_read_op( 'ta_seocentral_pages_status' ); ?>
          <p>
            <select name="ta_seocentral_pages_status">
              <option value="any" <?php if ( "any" == $ta_seocentral_pages_status ) echo "selected"; ?>>全て</option>
              <option value="publish" <?php if ( "publish" == $ta_seocentral_pages_status ) echo "selected"; ?>>公開済</option>
              <option value="pending" <?php if ( "pending" == $ta_seocentral_pages_status ) echo "selected"; ?>>承認待ち</option>
              <option value="draft" <?php if ( "draft" == $ta_seocentral_pages_status ) echo "selected"; ?>>下書き</option>
              <option value="future" <?php if ( "future" == $ta_seocentral_pages_status ) echo "selected"; ?>>予約済</option>
              <option value="private" <?php if ( "private" == $ta_seocentral_pages_status ) echo "selected"; ?>>非公開</option>
              <option value="trash" <?php if ( "trash" == $ta_seocentral_pages_status ) echo "selected"; ?>>ゴミ箱</option>
            </select>
          </p>
        </div>
        <div class="inline-gp-30">
          <h4>ソート方法</h4>
          <?php $ta_seocentral_pages_orderby = ta_read_op( 'ta_seocentral_pages_orderby' ); ?>
          <p>
            <select name="ta_seocentral_pages_orderby">
              <option value="menu_order" <?php if ( "menu_order" == $ta_seocentral_pages_orderby ) echo "selected"; ?>>順序番号</option>
              <option value="date" <?php if ( "date" == $ta_seocentral_pages_orderby ) echo "selected"; ?>>作成日</option>
              <option value="title" <?php if ( "title" == $ta_seocentral_pages_orderby ) echo "selected"; ?>>タイトル</option>
            </select>
          </p>
        </div>
        <div class="inline-gp-30">
          <h4>表示順</h4>
          <?php $ta_seocentral_pages_order = ta_read_op( 'ta_seocentral_pages_order' ); ?>
          <p>
            <select name="ta_seocentral_pages_order">
              <option value="ASC" <?php if ( "ASC" == $ta_seocentral_pages_order ) echo "selected"; ?>>昇順</option>
              <option value="DESC" <?php if ( "DESC" == $ta_seocentral_pages_order ) echo "selected"; ?>>降順</option>
            </select>
          </p>
        </div>
        <div class="inline-gp-30">
          <h4>現在の本文抜粋（120文字）の表示</h4>
          <?php ta_alternative_input_checkbox( 'ta_seocentral_pages_excerpt_onoff', '本文の抜粋を表示する' ); ?>
        </div>
        <div>
          <h4>圧縮表示</h4>
          <?php ta_alternative_input_checkbox( 'ta_seocentral_pages_comp_onoff', '圧縮表示をする' ); ?>
        </div>
      </div>
    </div>
    <?php ta_setting_form_end( 'seocentral', 'SEO設定集中管理『固定ページ』設定更新', 'pages' ); ?>
<?php
$front_id = get_option( 'page_on_front' );
$args = array(
  'post_type'       =>  'page',
  'post_status'     =>  $ta_seocentral_pages_status,
  'posts_per_page'  =>  $ta_seocentral_pages_num,
  'orderby'         =>  $ta_seocentral_pages_orderby,
  'order'           =>  $ta_seocentral_pages_order,
  'post__not_in'    =>  array( $front_id, ),
  'paged'           =>  $paged,
);
$sub_query = new WP_Query( $args ); ?>
    <p style="font-size:90%;margin:10px 0;color:#ff7f00;">※ 以下の設定は、TAテーマ001・各固定ページ編集画面の『固定ページSEO設定』の設定と同じものです。</p>
    <div class="ta-seocentral-pager">
<?php
    if ( $paged > 2 ) { ?>
      <div class="ta-prenext-pager-pre"><a href="<?php echo admin_url( 'admin.php?page=' ) . 'ta_seocentral_setting&paged=' . ( $paged - 1 ) . '&vtab=pages'; ?>">前のページ(<?php echo ( $paged - 1 ); ?>)</a></div>
<?php
    } else if ( $paged == 2 ) { ?>
      <div class="ta-prenext-pager-pre"><a href="<?php echo admin_url( 'admin.php?page=' ) . 'ta_seocentral_setting&vtab=pages'; ?>">前のページ(1)</a></div>
<?php
    } ?>
      <div class="ta-prenext-pager-mid">- <?php echo $paged; ?> -</div>
<?php
    if( $paged != $sub_query->max_num_pages ) { ?>
      <div class="ta-prenext-pager-next"><a href="<?php echo admin_url( 'admin.php?page=' ) . 'ta_seocentral_setting&paged=' . ( $paged + 1 ) . '&vtab=pages'; ?>">次のページ(<?php echo ( $paged + 1 ); ?>)</a></div>
<?php
    } ?>
    </div>
<?php
while ( $sub_query->have_posts() ) {
  $sub_query->the_post();
  $post_id = get_the_ID();
  $post_info = get_post( $post_id );
  $menu_order = $post_info->menu_order;
  $status = get_post_status();
  if ( 'publish' == $status ) { $status = '公開済'; }
  else if ( 'pending' == $status ) { $status = '承認待ち'; }
  else if ( 'draft' == $status ) { $status = '下書き'; }
  else if ( 'future' == $status ) { $status = '予約済'; }
  else if ( 'private' == $status ) { $status = '非公開'; }
  else if ( 'trash' == $status ) { $status = 'ゴミ箱'; } ?>
    <form class="ta-post-com" method="post" action="<?php echo admin_url( 'admin-post.php?action=tasetting' ); ?>" enctype="multipart/form-data">
      <?php wp_nonce_field( 'ta_seocentral_post_value_nonce_key', 'ta_seocentral_post_value_setting_menu' ); ?>
      <input type="hidden" name="vtab" value="pages" />
      <input type="hidden" name="post_id" value="<?php echo $post_id; ?>" />
      <input type="hidden" name="paged" value="<?php echo $paged; ?>" />
      <div id="seo-central-setting-<?php echo $post_id; ?>" class="seo-central-setting-id">
<?php
  if ( 'invalid' == ta_read_op( 'ta_seocentral_pages_comp_onoff' ) ) { ?>
        <div class="seo-central-setting-id-title">
          <div class="ta-setting-inline-gp" style="width:100%;">
            <div class="inline-gp-1_0em" style="width:5em;">
              <h4>順番：<?php echo $menu_order; ?></h4>
            </div>
            <div class="inline-gp-1_0em" style="width:11em;">
              <h4>作成日：<?php echo get_the_date(); ?></h4>
            </div>
            <div class="inline-gp-1_0em" style="width:11em;">
              <h4>ステータス：<?php echo $status; ?></h4>
            </div>
          </div>
          <div>
            <h4 style="margin-top:0;">タイトル：<span class="seo-central-setting-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" target="_blank"><?php the_title(); ?></a></span></h4>
          </div>
        </div>
<?php
    if ( 'invalid' == ta_read_op( 'ta_seocentral_pages_excerpt_onoff' ) ) { ?>
        <div class="ta-setting-inline-gp">
          <div class="inline-gp-30">
            <h4>SEOキーワード（共通キーワードの前に追加されます）</h4>
            <?php ta_text_input( 'ta_post_seo_keywords', 'long_box', 'postmeta', $post_id ); ?>
          </div>
          <div>
            <h4>SEOディスクリプション（120文字以内で入力してください）</h4>
            <?php ta_textarea_input( 'ta_post_seo_description', 4, 80, 'postmeta', $post_id ); ?>
          </div>
        </div>
<?php
    } else { ?>
        <h4>SEOキーワード（共通キーワードの前に追加されます）</h4>
        <?php ta_text_input( 'ta_post_seo_keywords', 'long_box', 'postmeta', $post_id ); ?>
        <div class="ta-setting-inline-gp">
          <div class="inline-gp-30">
            <h4>SEOディスクリプション（120文字以内で入力してください）</h4>
            <?php ta_textarea_input( 'ta_post_seo_description', 4, 80, 'postmeta', $post_id ); ?>
          </div>
          <div class="inline-gp-0">
            <h4>現在の本文抜粋（120文字）</h4>
<?php
      $value = get_post()->post_content;
      $value = strip_tags( $value );  //htmlタグの削除
      /* 改行などを無視して文章を設定文字数抜粋する */
      $value = strip_shortcodes( $value );
      $value = str_replace( '&nbsp;', "", $value );
      $value = str_replace( array( "\r\n","\r","\n" ), '', $value );
      $value = wp_html_excerpt( $value, 120 );
      echo '<div class="seo-central-setting-excerpt">' . $value . '</div>'; ?>
          </div>
        </div>
<?php
    } ?>
        <div class="ta-setting-inline-gp">
          <div class="inline-gp-30">
            <h4 style="margin-top:0;">h1表記</h4>
            <?php ta_text_input( 'ta_post_h1_content', 'long_box', 'postmeta', $post_id ); ?>
          </div>
          <div class="inline-gp-30">
            <h4 style="margin-top:0;">カノニカルタグ設定</h4>
            <?php ta_text_input( 'ta_post_canonical_domain', 'long_box', 'postmeta', $post_id ); ?>
          </div>
          <div style="">
            <h4>　</h4>
            <p>
              <input type="submit" class="button-primary" name="ta_seocentral_post_value_setting_submit" value="更新" />
            </p>
          </div>
        </div>
<?php
  } else { ?>
        <div class="seo-central-compsize">
          <div>
            <h4 style="margin:0;">タイトル：<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" target="_blank"><?php the_title(); ?></a></h4>
          </div>
          <div class="ta-setting-inline-gp">
            <div class="inline-gp-30">
              <h4>SEOキーワード（共通キーワードの前に追加されます）</h4>
              <?php ta_text_input( 'ta_post_seo_keywords', 'long_box', 'postmeta', $post_id ); ?>
            </div>
            <div>
              <h4>SEOディスクリプション（120文字以内で入力してください）</h4>
              <?php ta_textarea_input( 'ta_post_seo_description', 3, 80, 'postmeta', $post_id ); ?>
            </div>
          </div>
          <div class="ta-setting-inline-gp">
            <div class="inline-gp-30">
              <h4>h1表記</h4>
              <?php ta_text_input( 'ta_post_h1_content', 'long_box', 'postmeta', $post_id ); ?>
            </div>
            <div class="inline-gp-30">
              <h4>カノニカルタグ設定</h4>
              <?php ta_text_input( 'ta_post_canonical_domain', 'long_box', 'postmeta', $post_id ); ?>
            </div>
            <div style="">
              <h4>　</h4>
              <p>
                <input type="submit" class="button-primary" name="ta_seocentral_post_value_setting_submit" value="更新" />
              </p>
            </div>
          </div>
        </div>
<?php
  } ?>
        
      </div><!-- end of #seo-central-setting-<?php echo $post_id; ?> -->
    </form>
<?php
}
wp_reset_postdata(); ?>
    <div class="ta-seocentral-pager">
<?php
    if ( $paged > 2 ) { ?>
      <div class="ta-prenext-pager-pre"><a href="<?php echo admin_url( 'admin.php?page=' ) . 'ta_seocentral_setting&paged=' . ( $paged - 1 ) . '&vtab=pages'; ?>">前のページ(<?php echo ( $paged - 1 ); ?>)</a></div>
<?php
    } else if ( $paged == 2 ) { ?>
      <div class="ta-prenext-pager-pre"><a href="<?php echo admin_url( 'admin.php?page=' ) . 'ta_seocentral_setting&vtab=pages'; ?>">前のページ(1)</a></div>
<?php
    } ?>
      <div class="ta-prenext-pager-mid">- <?php echo $paged; ?> -</div>
<?php
    if( $paged != $sub_query->max_num_pages ) { ?>
      <div class="ta-prenext-pager-next"><a href="<?php echo admin_url( 'admin.php?page=' ) . 'ta_seocentral_setting&paged=' . ( $paged + 1 ) . '&vtab=pages'; ?>">次のページ(<?php echo ( $paged + 1 ); ?>)</a></div>
<?php
    } ?>
    </div>
  </div><!-- end of #ta-seocentral-tab-pages -->
  <?php } ?>
  
  
  <?php if ( 'posts' == $valid_tab ) { ?>
  <!-- 投稿記事ページ -->
<?php
$paged = isset( $_GET['paged'] ) ? $_GET['paged'] : 1;
if ( 0 == $paged ) { $paged = 1; } ?>
  <div class="table" id="ta-seocentral-tab-posts">
    <div class="ta-manual-info"><a href="http://theme001.tec-aid.com/thm001_manual_p2/seocentral#posts" target="_blank"><span class="dashicons dashicons-editor-help"></span></a></div>
    <?php ta_setting_form_start( 'seocentral', 'posts' ); ?>
    <input type="hidden" name="paged" value="<?php echo $paged; ?>" />
    <div id="seo-central-setting-baseset">
      <table class="common-chart">
        <tr>
          <th></th>
          <td>内容</td>
          <td>備考</td>
        </tr>
        <tr>
          <th>共通キーワード</th>
          <td><?php echo ta_read_op( 'ta_common_seo_common_keywords' ); ?></td>
          <td>投稿記事設定は共通キーワードの前に追加されます</td>
        </tr>
        <tr>
          <th>共通ディスクリプション</th>
          <td><?php echo ta_read_op( 'ta_common_seo_common_description' ); ?></td>
<?php
if ( 'valid' == ta_read_op( 'ta_common_seo_description_excerptonoff' ) ) { ?>
          <td>投稿記事設定が未入力の場合は、本文の抜粋（120文字）が採用されます</td>
<?php
} else { ?>
          <td>投稿記事設定が未入力の場合は、共通ディスクリプションが採用されます</td>
<?php
} ?>
        </tr>
        <tr>
          <th>h1共通表記</th>
          <td><?php echo ta_read_op( 'ta_common_seo_common_h1_content' ); ?></td>
<?php
if ( 'valid' == ta_read_op( 'ta_common_seo_h1_commononoff' ) ) { ?>
          <td>投稿記事設定が未入力の場合は、h1共通表記設定が採用されます</td>
<?php
} else { ?>
          <td>投稿記事設定が未入力の場合は、各ページの設定が採用されます</td>
<?php
} ?>
        </tr>
      </table>
      <div class="ta-setting-inline-gp" style="margin-top:10px;">
        <div class="inline-gp-30">
          <h4 style="margin-top:0;">対象カテゴリー</h4>
<?php 
$ta_seocentral_posts_cat = ta_read_op( 'ta_seocentral_posts_cat' );
$categories = get_categories( 'get=all' ); ?>
          <p>
            <select name="ta_seocentral_posts_cat">
              <option value="" <?php if ( "" == $ta_seocentral_posts_cat ) echo "selected"; ?>>全てのカテゴリー</option>
<?php
foreach ( $categories as $category ) { ?>
              <option value="<?php echo $category->slug; ?>" <?php if ( $category->slug == $ta_seocentral_posts_cat ) echo "selected"; ?>><?php echo $category->name; ?></option>
<?php
} ?>
            </select>
          </p>
        </div>
        <div class="inline-gp-30">
          <h4>表示件数</h4>
          <?php $ta_seocentral_posts_num = ta_read_op( 'ta_seocentral_posts_num' ); ?>
          <p>
            <select name="ta_seocentral_posts_num">
              <option value="5" <?php if ( "5" == $ta_seocentral_posts_num ) echo "selected"; ?>>5件</option>
              <option value="10" <?php if ( "10" == $ta_seocentral_posts_num ) echo "selected"; ?>>10件</option>
              <option value="25" <?php if ( "25" == $ta_seocentral_posts_num ) echo "selected"; ?>>25件</option>
              <option value="50" <?php if ( "50" == $ta_seocentral_posts_num ) echo "selected"; ?>>50件</option>
              <option value="100" <?php if ( "100" == $ta_seocentral_posts_num ) echo "selected"; ?>>100件</option>
            </select>
          </p>
        </div>
        <div class="inline-gp-30">
          <h4>ステータス</h4>
          <?php $ta_seocentral_posts_status = ta_read_op( 'ta_seocentral_posts_status' ); ?>
          <p>
            <select name="ta_seocentral_posts_status">
              <option value="any" <?php if ( "any" == $ta_seocentral_posts_status ) echo "selected"; ?>>全て</option>
              <option value="publish" <?php if ( "publish" == $ta_seocentral_posts_status ) echo "selected"; ?>>公開済</option>
              <option value="pending" <?php if ( "pending" == $ta_seocentral_posts_status ) echo "selected"; ?>>承認待ち</option>
              <option value="draft" <?php if ( "draft" == $ta_seocentral_posts_status ) echo "selected"; ?>>下書き</option>
              <option value="future" <?php if ( "future" == $ta_seocentral_posts_status ) echo "selected"; ?>>予約済</option>
              <option value="private" <?php if ( "private" == $ta_seocentral_posts_status ) echo "selected"; ?>>非公開</option>
              <option value="trash" <?php if ( "trash" == $ta_seocentral_posts_status ) echo "selected"; ?>>ゴミ箱</option>
            </select>
          </p>
        </div>
        <div class="inline-gp-30">
          <h4>ソート方法</h4>
          <?php $ta_seocentral_posts_orderby = ta_read_op( 'ta_seocentral_posts_orderby' ); ?>
          <p>
            <select name="ta_seocentral_posts_orderby">
              <option value="date" <?php if ( "date" == $ta_seocentral_posts_orderby ) echo "selected"; ?>>作成日</option>
              <option value="title" <?php if ( "title" == $ta_seocentral_posts_orderby ) echo "selected"; ?>>タイトル</option>
            </select>
          </p>
        </div>
        <div class="inline-gp-30">
          <h4>表示順</h4>
          <?php $ta_seocentral_posts_order = ta_read_op( 'ta_seocentral_posts_order' ); ?>
          <p>
            <select name="ta_seocentral_posts_order">
              <option value="ASC" <?php if ( "ASC" == $ta_seocentral_posts_order ) echo "selected"; ?>>昇順</option>
              <option value="DESC" <?php if ( "DESC" == $ta_seocentral_posts_order ) echo "selected"; ?>>降順</option>
            </select>
          </p>
        </div>
        <div class="inline-gp-30">
          <h4>現在の本文抜粋（120文字）の表示</h4>
          <?php ta_alternative_input_checkbox( 'ta_seocentral_posts_excerpt_onoff', '本文の抜粋を表示する' ); ?>
        </div>
        <div>
        <h4>圧縮表示</h4>
          <?php ta_alternative_input_checkbox( 'ta_seocentral_posts_comp_onoff', '圧縮表示をする' ); ?>
        </div>
      </div>
    </div>
    <?php ta_setting_form_end( 'seocentral', 'SEO設定集中管理『投稿記事ページ』設定更新', 'posts' ); ?>
<?php
$args = array(
  'post_type'       =>  'post',
  'post_status'     =>  $ta_seocentral_posts_status,
  'category_name'   =>  $ta_seocentral_posts_cat,
  'posts_per_page'  =>  $ta_seocentral_posts_num,
  'orderby'         =>  $ta_seocentral_posts_orderby,
  'order'           =>  $ta_seocentral_posts_order,
  'paged'           =>  $paged,
);
$sub_query = new WP_Query( $args ); ?>
    <p style="font-size:90%;margin:10px 0;color:#ff7f00;">※ 以下の設定は、TAテーマ001・各投稿編集画面の『投稿ページSEO設定』の設定と同じものです。</p>
    <div class="ta-seocentral-pager">
<?php
    if ( $sub_query->max_num_pages && $paged > 2 ) { ?>
      <div class="ta-prenext-pager-pre"><a href="<?php echo admin_url( 'admin.php?page=' ) . 'ta_seocentral_setting&paged=' . ( $paged - 1 ) . '&vtab=posts'; ?>">前のページ(<?php echo ( $paged - 1 ); ?>)</a></div>
<?php
    } else if ( $sub_query->max_num_pages && $paged == 2 ) { ?>
      <div class="ta-prenext-pager-pre"><a href="<?php echo admin_url( 'admin.php?page=' ) . 'ta_seocentral_setting&vtab=posts'; ?>">前のページ(1)</a></div>
<?php
    }
    if ( $sub_query->max_num_pages ) { ?>
      <div class="ta-prenext-pager-mid">- <?php echo $paged; ?> -</div>
<?php
    }
    if( $sub_query->max_num_pages && $paged != $sub_query->max_num_pages ) { ?>
      <div class="ta-prenext-pager-next"><a href="<?php echo admin_url( 'admin.php?page=' ) . 'ta_seocentral_setting&paged=' . ( $paged + 1 ) . '&vtab=posts'; ?>">次のページ(<?php echo ( $paged + 1 ); ?>)</a></div>
<?php
    } ?>
    </div>
<?php
while ( $sub_query->have_posts() ) {
  $sub_query->the_post();
  $post_id = get_the_ID();
  $cat_info = get_the_category();
  $status = get_post_status();
  if ( 'publish' == $status ) { $status = '公開済'; }
  else if ( 'pending' == $status ) { $status = '承認待ち'; }
  else if ( 'draft' == $status ) { $status = '下書き'; }
  else if ( 'future' == $status ) { $status = '予約済'; }
  else if ( 'private' == $status ) { $status = '非公開'; }
  else if ( 'trash' == $status ) { $status = 'ゴミ箱'; } ?>
    <form class="ta-post-com" method="post" action="<?php echo admin_url( 'admin-post.php?action=tasetting' ); ?>" enctype="multipart/form-data">
      <?php wp_nonce_field( 'ta_seocentral_post_value_nonce_key', 'ta_seocentral_post_value_setting_menu' ); ?>
      <input type="hidden" name="vtab" value="posts" />
      <input type="hidden" name="post_id" value="<?php echo $post_id; ?>" />
      <input type="hidden" name="paged" value="<?php echo $paged; ?>" />
      <div id="seo-central-setting-<?php echo $post_id; ?>" class="seo-central-setting-id">
<?php
  if ( 'invalid' == ta_read_op( 'ta_seocentral_posts_comp_onoff' ) ) { ?>
        <div class="seo-central-setting-id-title">
          <div class="ta-setting-inline-gp" style="width:100%;">
            <div class="inline-gp-1_0em" style="width:11em;">
              <h4>作成日：<?php echo get_the_date(); ?></h4>
            </div>
            <div class="inline-gp-1_0em" style="width:11em;">
              <h4>ステータス：<?php echo $status; ?></h4>
            </div>
          </div>
          <div>
            <h4 style="margin-top:0;">タイトル：<span class="seo-central-setting-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" target="_blank"><?php the_title(); ?></a></span></h4>
          </div>
          <div>
            <h4>カテゴリー：<?php for ($i = 0; $i < count( $cat_info ); ++$i) { if ( $i ) { echo ', ' . $cat_info[$i]->cat_name; } else { echo $cat_info[$i]->cat_name; } } ?></h4>
          </div>
        </div>
<?php
    if ( 'invalid' == ta_read_op( 'ta_seocentral_posts_excerpt_onoff' ) ) { ?>
        <div class="ta-setting-inline-gp">
          <div class="inline-gp-30">
            <h4>SEOキーワード（共通キーワードの前に追加されます）</h4>
            <?php ta_text_input( 'ta_post_seo_keywords', 'long_box', 'postmeta', $post_id ); ?>
          </div>
          <div>
            <h4>SEOディスクリプション（120文字以内で入力してください）</h4>
            <?php ta_textarea_input( 'ta_post_seo_description', 4, 80, 'postmeta', $post_id ); ?>
          </div>
        </div>
<?php
    } else { ?>
        <h4>SEOキーワード（共通キーワードの前に追加されます）</h4>
        <?php ta_text_input( 'ta_post_seo_keywords', 'long_box', 'postmeta', $post_id ); ?>
        <div class="ta-setting-inline-gp">
          <div class="inline-gp-30">
            <h4>SEOディスクリプション（120文字以内で入力してください）</h4>
            <?php ta_textarea_input( 'ta_post_seo_description', 4, 80, 'postmeta', $post_id ); ?>
          </div>
          <div class="inline-gp-0">
            <h4>現在の本文抜粋（120文字）</h4>
<?php
      $value = get_post()->post_content;
      $value = strip_tags( $value );  //htmlタグの削除
      /* 改行などを無視して文章を設定文字数抜粋する */
      $value = strip_shortcodes( $value );
      $value = str_replace( '&nbsp;', "", $value );
      $value = str_replace( array( "\r\n","\r","\n" ), '', $value );
      $value = wp_html_excerpt( $value, 120 );
      echo '<div class="seo-central-setting-excerpt">' . $value . '</div>'; ?>
          </div>
        </div>
<?php
    } ?>
        <div class="ta-setting-inline-gp">
          <div class="inline-gp-30">
            <h4 style="margin-top:0;">h1表記</h4>
            <?php ta_text_input( 'ta_post_h1_content', 'long_box', 'postmeta', $post_id ); ?>
          </div>
          <div class="inline-gp-30">
            <h4 style="margin-top:0;">カノニカルタグ設定</h4>
            <?php ta_text_input( 'ta_post_canonical_domain', 'long_box', 'postmeta', $post_id ); ?>
          </div>
          <div style="">
            <h4>　</h4>
            <p>
              <input type="submit" class="button-primary" name="ta_seocentral_post_value_setting_submit" value="更新" />
            </p>
          </div>
        </div>
<?php
  } else { ?>
        <div class="seo-central-compsize">
          <div>
            <h4 style="margin:0;">タイトル：<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" target="_blank"><?php the_title(); ?></a></h4>
          </div>
          <div class="ta-setting-inline-gp">
            <div class="inline-gp-30">
              <h4>SEOキーワード（共通キーワードの前に追加されます）</h4>
              <?php ta_text_input( 'ta_post_seo_keywords', 'long_box', 'postmeta', $post_id ); ?>
            </div>
            <div>
              <h4>SEOディスクリプション（120文字以内で入力してください）</h4>
              <?php ta_textarea_input( 'ta_post_seo_description', 3, 80, 'postmeta', $post_id ); ?>
            </div>
          </div>
          <div class="ta-setting-inline-gp">
            <div class="inline-gp-30">
              <h4>h1表記</h4>
              <?php ta_text_input( 'ta_post_h1_content', 'long_box', 'postmeta', $post_id ); ?>
            </div>
            <div class="inline-gp-30">
              <h4>カノニカルタグ設定</h4>
              <?php ta_text_input( 'ta_post_canonical_domain', 'long_box', 'postmeta', $post_id ); ?>
            </div>
            <div style="">
              <h4>　</h4>
              <p>
                <input type="submit" class="button-primary" name="ta_seocentral_post_value_setting_submit" value="更新" />
              </p>
            </div>
          </div>
        </div>
<?php
  } ?>
      </div><!-- end of #seo-central-setting-<?php echo $post_id; ?> -->
    </form>
<?php
}
wp_reset_postdata(); ?>
    <div class="ta-seocentral-pager">
<?php
    if ( $sub_query->max_num_pages && $paged > 2 ) { ?>
      <div class="ta-prenext-pager-pre"><a href="<?php echo admin_url( 'admin.php?page=' ) . 'ta_seocentral_setting&paged=' . ( $paged - 1 ) . '&vtab=posts'; ?>">前のページ(<?php echo ( $paged - 1 ); ?>)</a></div>
<?php
    } else if ( $sub_query->max_num_pages && $paged == 2 ) { ?>
      <div class="ta-prenext-pager-pre"><a href="<?php echo admin_url( 'admin.php?page=' ) . 'ta_seocentral_setting&vtab=posts'; ?>">前のページ(1)</a></div>
<?php
    }
    if ( $sub_query->max_num_pages ) { ?>
      <div class="ta-prenext-pager-mid">- <?php echo $paged; ?> -</div>
<?php
    }
    if( $sub_query->max_num_pages && $paged != $sub_query->max_num_pages ) { ?>
      <div class="ta-prenext-pager-next"><a href="<?php echo admin_url( 'admin.php?page=' ) . 'ta_seocentral_setting&paged=' . ( $paged + 1 ) . '&vtab=posts'; ?>">次のページ(<?php echo ( $paged + 1 ); ?>)</a></div>
<?php
    } ?>
    </div>
  </div><!-- end of #ta-seocentral-tab-posts -->
  <?php } ?>
</div>
<?php
ta_progress_disp();
ta_info_disp(); ?>
