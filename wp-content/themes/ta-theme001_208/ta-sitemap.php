<?php
/*******************************************************************************************************/
/*
/* テックエイドの成長する自作ホームページWordPressテーマ『 TAテーマ001 (ta-theme001) 』
/*
/* ta-sitemap.php: ( Latest Version 2.02 2017.02.14 )
/*
/* このプログラムの著作権、使用権、その他全ての権利はde集まれ株式会社に属します。
/* The copyright, royalty and all the other rights of this program belong to deatsumare Corporation.
/*
/* File Version 履歴
/* File Version 2.00 2015.12.14: first edition by Kotaro Kashiwamura.
/* File Version 2.01 2016.08.22: CSS修正 by Kotaro Kashiwamura.
/* File Version 2.02 2017.02.14: CSS修正 by Kotaro Kashiwamura.
/*
/*******************************************************************************************************/

/********* サイトマップ生成 *********/
$ta_common_sitemap_disp_contents = ta_read_op( 'ta_common_sitemap_disp_contents' );
$ta_common_sitemap_link_newwin_onoff = ta_read_op( 'ta_common_sitemap_link_newwin_onoff' );
$ta_common_sitemap_page_title = ta_read_op( 'ta_common_sitemap_page_title' );
$ta_common_sitemap_cat_title = ta_read_op( 'ta_common_sitemap_cat_title' );
$ta_common_sitemap_disp_depth_num = ta_read_op( 'ta_common_sitemap_disp_depth_num' );
$ta_common_sitemap_cat_postnum_onoff = ta_read_op( 'ta_common_sitemap_cat_postnum_onoff' );
$ta_common_sitemap_cat_parent_postnum_onoff = ta_read_op( 'ta_common_sitemap_cat_parent_postnum_onoff' );
$ta_common_sitemap_cat_num_limit = ( 0 == ta_read_op( 'ta_common_sitemap_cat_num_limit' ) ) ? '' : ta_read_op( 'ta_common_sitemap_cat_num_limit' );
$ta_common_sitemap_cat_disp_nopost_onoff = ta_read_op( 'ta_common_sitemap_cat_disp_nopost_onoff' );
$ta_common_sitemap_title_factor = ta_read_op( 'ta_common_sitemap_title_factor' );
//デザイン関係の値取得
$ta_common_sitemap_parent_size = ta_read_op( 'ta_common_sitemap_parent_size' );
$ta_common_sitemap_parent_weight = ta_read_op( 'ta_common_sitemap_parent_weight' );
$ta_common_sitemap_parent_color = ta_select_color_w_image_color( 'ta_common_sitemap_parent_color' );
$ta_common_sitemap_parent_anchor_color = ta_select_color_w_image_color( 'ta_common_sitemap_parent_anchor_color' );
$ta_common_sitemap_parent_anchor_colorhover = ta_select_color_w_image_color( 'ta_common_sitemap_parent_anchor_colorhover' );
$ta_common_sitemap_parent_anchor_underonoff = ta_read_op( 'ta_common_sitemap_parent_anchor_underonoff' );
$ta_common_sitemap_parent_anchor_hoverunderonoff = ta_read_op( 'ta_common_sitemap_parent_anchor_hoverunderonoff' );
$ta_common_sitemap_parent_paddingtop = ta_read_op( 'ta_common_sitemap_parent_paddingtop' );
$ta_common_sitemap_parent_paddingleft = ta_read_op( 'ta_common_sitemap_parent_paddingleft' );
$ta_common_sitemap_parent_listmarker = ta_read_op( 'ta_common_sitemap_parent_listmarker' );

$ta_common_sitemap_children_size = ta_read_op( 'ta_common_sitemap_children_size' );
$ta_common_sitemap_children_weight = ta_read_op( 'ta_common_sitemap_children_weight' );
$ta_common_sitemap_children_color = ta_select_color_w_image_color( 'ta_common_sitemap_children_color' );
$ta_common_sitemap_children_anchor_color = ta_select_color_w_image_color( 'ta_common_sitemap_children_anchor_color' );
$ta_common_sitemap_children_anchor_colorhover = ta_select_color_w_image_color( 'ta_common_sitemap_children_anchor_colorhover' );
$ta_common_sitemap_children_anchor_underonoff = ta_read_op( 'ta_common_sitemap_children_anchor_underonoff' );
$ta_common_sitemap_children_anchor_hoverunderonoff = ta_read_op( 'ta_common_sitemap_children_anchor_hoverunderonoff' );
$ta_common_sitemap_children_paddingtop = ta_read_op( 'ta_common_sitemap_children_paddingtop' );
$ta_common_sitemap_children_paddingleft = ta_read_op( 'ta_common_sitemap_children_paddingleft' );
$ta_common_sitemap_children_listmarker = ta_read_op( 'ta_common_sitemap_children_listmarker' );

//固定ページで非表示設定をしているIDを探してArrayにプッシュする
$ta_top_sitemap_disp_onoff = ta_read_op( 'ta_top_sitemap_disp_onoff' );
$front_id = get_option( 'page_on_front');
$all_pages = get_pages();
$page_no_disp = array();
foreach ( $all_pages as $page ) {
  if ( 'valid' == ta_read_post( $page->ID, 'ta_post_sitemap_disp_onoff' ) ) {
    array_push( $page_no_disp, $page->ID );
  }
}
if ( 'valid' == $ta_top_sitemap_disp_onoff ) { array_push( $page_no_disp, $front_id ); }

//各カテゴリーで非表示設定をしているIDを探してArrayにプッシュする
$all_categories = get_categories( 'get=all' );
$category_no_disp = array();
foreach ( $all_categories as $category ) {
  $ta_cat_sitemap = ( '' == get_option( '_' . 'ta_cat_sitemap_'. $category->term_id ) ) ? 'invalid' : get_option( '_' . 'ta_cat_sitemap_'. $category->term_id );
  if ( 'valid' == $ta_cat_sitemap ) {
    array_push( $category_no_disp, $category->term_id );
  }
}

$pages_args = array(
  'depth'               => $ta_common_sitemap_disp_depth_num,
  'show_date'           => '',
  'date_format'         => '',
  'title_li'            => '',
  'link_before'         => '',
  'link_after'          => '',
  'echo'                => 1,
  'child_of'            => 0,
  'sort_column'         => 'menu_order, post_title',
  'exclude'             => '',              //除外する固定ページのID（省略時はarray()）
  'include'             => '',              //取得する固定ページのID（省略時はarray()）
  'authors'             => '',
  'exclude_tree'        => $page_no_disp,   //取得したくないカテゴリーのID 子カテゴリーも除外される。
); 

$cats_args = array(
  'show_option_all'     => '',
  'show_last_update'    => 0,
  'show_count'          => ( 'valid' == $ta_common_sitemap_cat_postnum_onoff ),
  'use_desc_for_title'  => 1,
  'feed'                => '',
  'feed_type'           => '',
  'feed_image'          => '',
  'current_category'    => 0,
  'title_li'            => '',
  'echo'                => 1,
  'depth'               => $ta_common_sitemap_disp_depth_num,
  'taxonomy'            => 'category',
  'orderby'             => 'name',
  'order'               => 'ASC',
  'hide_empty'          => ( 'valid' == $ta_common_sitemap_cat_disp_nopost_onoff ),
  'exclude'             => $category_no_disp,
  'exclude_tree'        => '', //取得したくないカテゴリーのID（複数指定する場合は,で区切る。省略時は''）。子カテゴリーも除外される。
  'child_of'            => 0,
  'hierarchical'        => 1,
  'include'             => '',
  'number'              => $ta_common_sitemap_cat_num_limit,
  'pad_counts'          => ( 'valid' == $ta_common_sitemap_cat_parent_postnum_onoff ),
); ?>

<div id="ta-sitemap">
<?php
if ( "cat_page" == $ta_common_sitemap_disp_contents || "cat_only" == $ta_common_sitemap_disp_contents ) {
  if ( 'no_disp' != $ta_common_sitemap_cat_title ) { ?>
  <<?php echo $ta_common_sitemap_title_factor; ?> class="title fixed-space">
<?php
    echo $ta_common_sitemap_cat_title; ?>
  </<?php echo $ta_common_sitemap_title_factor; ?>>
<?php
  } ?>
  <ul><?php wp_list_categories( $cats_args ); ?></ul>
<?php
}
if ( "cat_only" != $ta_common_sitemap_disp_contents ) {
  if ( 'no_disp' != $ta_common_sitemap_page_title ) { ?>
  <<?php echo $ta_common_sitemap_title_factor; ?> class="title fixed-space">
<?php
    ta_deleteyen( $ta_common_sitemap_page_title ); ?>
  </<?php echo $ta_common_sitemap_title_factor; ?>>
<?php
  } ?>
  <ul><?php wp_list_pages( $pages_args ); ?></ul>
<?php
}
if ( "page_cat" == $ta_common_sitemap_disp_contents ) {
  if ( 'no_disp' != $ta_common_sitemap_cat_title ) { ?>
  <<?php echo $ta_common_sitemap_title_factor; ?> class="title fixed-space">
<?php
    ta_deleteyen( $ta_common_sitemap_cat_title ); ?>
  </<?php echo $ta_common_sitemap_title_factor; ?>>
<?php
  } ?>
  <ul><?php wp_list_categories( $cats_args ); ?></ul>
<?php
} ?>
</div><!-- end of #ta-sitemap -->

<style type="text/css">
<!--
#ta-sitemap li {
  font-size: <?php echo $ta_common_sitemap_parent_size; ?>%;
  font-weight: <?php echo $ta_common_sitemap_parent_weight; ?>;
  color: <?php echo $ta_common_sitemap_parent_color; ?>;
  padding-top: <?php echo $ta_common_sitemap_parent_paddingtop; ?>px;
  padding-left: <?php echo $ta_common_sitemap_parent_paddingleft; ?>px;
  list-style-type: <?php echo $ta_common_sitemap_parent_listmarker; ?>;
  list-style-position: inside;
}

#main #ta-sitemap li a {
  color: <?php echo $ta_common_sitemap_parent_anchor_color; ?>;
  text-decoration: <?php echo ( 'valid' == $ta_common_sitemap_parent_anchor_underonoff ) ? 'underline' : 'none'; ?>;
}

#main #ta-sitemap li a:hover {
  color: <?php echo $ta_common_sitemap_parent_anchor_colorhover; ?>;
  text-decoration: <?php echo ( 'valid' == $ta_common_sitemap_parent_anchor_hoverunderonoff ) ? 'underline' : 'none'; ?>;
}

#ta-sitemap > ul > li:first-child {
  padding-top: 0px;
}

#ta-sitemap li li {
  font-size: <?php echo $ta_common_sitemap_children_size; ?>%;
  font-weight: <?php echo $ta_common_sitemap_children_weight; ?>;
  color: <?php echo $ta_common_sitemap_children_color; ?>;
  padding-top: <?php echo $ta_common_sitemap_children_paddingtop; ?>px;
  padding-left: <?php echo $ta_common_sitemap_children_paddingleft; ?>px;
  list-style-type: <?php echo $ta_common_sitemap_children_listmarker; ?>;
  list-style-position: inside;
}

#main #ta-sitemap li li a {
  color: <?php echo $ta_common_sitemap_children_anchor_color; ?>;
  text-decoration: <?php echo ( 'valid' == $ta_common_sitemap_children_anchor_underonoff ) ? 'underline' : 'none'; ?>;
}

#main #ta-sitemap li li a:hover {
  color: <?php echo $ta_common_sitemap_children_anchor_colorhover; ?>;
  text-decoration: <?php echo ( 'valid' == $ta_common_sitemap_children_anchor_hoverunderonoff ) ? 'underline' : 'none'; ?>;
}
-->
</style>
<?php
if ( 'valid' == $ta_common_sitemap_link_newwin_onoff ) { ?>
<script type="text/javascript">
  jQuery( '#ta-sitemap a' ).attr( 'target' , '_blank' );
</script>
<?php
}
