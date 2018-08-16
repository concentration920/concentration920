<?php

/*** ヘッダータグの消去 ***/
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'feed_links_extra',3,0);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'rel_canonical');


/*** セルフピンバック禁止 ***/
function no_self_ping( &$links ) {
$home = get_option( 'home' );
foreach ( $links as $l => $link )
if ( 0 === strpos( $link, $home ) )
unset($links[$l]);
}
add_action( 'pre_ping', 'no_self_ping' );


/*** カスタムメニュー ***/
register_nav_menus(array('navigation' => 'ナビゲーションバー'));

/*** カスタム背景 ***/
add_theme_support( 'custom-background' );


/*** ウィジェット ***/
register_sidebar(array(
'name'=>'サイドバー',
'before_widget' => '<div id="%1$s" class="widget %2$s">',
'after_widget' => '</div>',
'before_title' => '<div class="sidebar-title">',
'after_title' => '</div>',
));
register_sidebar(array(
'name'=>'サイドバー2',
'before_widget' => '<div id="%1$s" class="widget %2$s">',
'after_widget' => '</div>',
'before_title' => '<div class="sidebar-title">',
'after_title' => '</div>',
));
register_sidebar(array(
'name'=>'トップ3列左側',
'before_widget' => '<div id="%1$s" class="widget %2$s">',
'after_widget' => '</div>',
'before_title' => '<div class="top-title">',
'after_title' => '</div>',
));
register_sidebar(array(
'name'=>'トップ3列中央',
'before_widget' => '<div id="%1$s" class="widget %2$s">',
'after_widget' => '</div>',
'before_title' => '<div class="top-title">',
'after_title' => '</div>',
));
register_sidebar(array(
'name'=>'トップ3列右側',
'before_widget' => '<div id="%1$s" class="widget %2$s">',
'after_widget' => '</div>',
'before_title' => '<div class="top-title">',
'after_title' => '</div>',
));
register_sidebar(array(
'name'=>'トップ下部',
'before_widget' => '<div id="%1$s" class="widget %2$s">',
'after_widget' => '</div>',
'before_title' => '<div class="top-title">',
'after_title' => '</div>',
));
register_sidebar(array(
'name'=>'フッター3列左側',
'before_widget' => '<div id="%1$s" class="widget %2$s">',
'after_widget' => '</div>',
'before_title' => '<div class="sidebar-title">',
'after_title' => '</div>',
));
register_sidebar(array(
'name'=>'フッター3列中央',
'before_widget' => '<div id="%1$s" class="widget %2$s">',
'after_widget' => '</div>',
'before_title' => '<div class="sidebar-title">',
'after_title' => '</div>',
));
register_sidebar(array(
'name'=>'フッター3列右側',
'before_widget' => '<div id="%1$s" class="widget %2$s">',
'after_widget' => '</div>',
'before_title' => '<div class="sidebar-title">',
'after_title' => '</div>',
));
register_sidebar(array(
'name'=>'本文下の広告枠',
'before_widget' => '<div id="%1$s" class="widget %2$s">',
'after_widget' => '</div>',
'before_title' => '<div class="top-title">',
'after_title' => '</div>',
));
register_sidebar(array(
'name'=>'コメント下の広告枠',
'before_widget' => '<div id="%1$s" class="widget %2$s">',
'after_widget' => '</div>',
'before_title' => '<div class="top-title">',
'after_title' => '</div>',
));



/*** アイキャッチ画像 ***/
add_theme_support( 'post-thumbnails' );


/*** 続きを読む ***/
function new_excerpt_more($more) {
global $post;
return '<a href="'. get_permalink($post->ID) . '"> ...続きを読む</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


/*** #more-$id を削除 ***/
function custom_content_more_link( $output ) {
$output = preg_replace('/#more-[\d]+/i', '', $output );
return $output;
}
add_filter( 'the_content_more_link', 'custom_content_more_link' );


/*** 管理画面フッターテキスト ***/
function remove_footer_admin () {
echo 'お問い合わせは<a href="http://minimalwp.com" target="_blank">Minimal WP</a>まで';
}
add_filter('admin_footer_text', 'remove_footer_admin');


/*** シングルページテンプレート ***/
add_filter('single_template', create_function('$t', 'foreach( (array) get_the_category() as $cat ) { if ( file_exists(TEMPLATEPATH . "/single-{$cat->term_id}.php") ) return TEMPLATEPATH . "/single-{$cat->term_id}.php"; } return $t;' ));


/*** ヴィジュアルエディタ ***/
function ilc_mce_buttons($buttons){
array_push($buttons, "backcolor", "copy", "cut", "paste", "fontsizeselect", "cleanup");
return $buttons;
}
add_filter("mce_buttons", "ilc_mce_buttons");


/*** Minimal WPテーマオプション設定 ***/
function options_admin_menu() {
add_theme_page("Minimal WPテーマ設定", "Minimal WPカスタム", 'edit_themes', basename(__FILE__), 'options_page');
}
add_action('admin_menu', 'options_admin_menu');

function options_page() {
if ( $_POST['update_options'] == 'true' ) { options_update(); }  
?>
<div class="wrap">
<div id="icon-options-general" class="icon32"><br /></div>
<h2>ロゴ画像の変更</h2>
<br />
ロゴ画像をアップロードすると、ロゴが自動的に変更されます。<br />
<form method="post" action="">
<input type="hidden" name="update_options" value="true" />

<table class="form-table">
<tr valign="top">
<th scope="row"><label for="logo_url"><?php _e('◎カスタムロゴのURL'); ?></label></th>
<td><input type="text" name="logo_url" id="logo_url" size="50" value="<?php echo get_option('logo_url'); ?>"/>　（http://〜）<br/><a href="<?php bloginfo("url"); ?>/wp-admin/media-new.php" target="_blank">ロゴをアップロード</a><br />
＊推奨サイズ：高さ45px　横幅280px以下 <br />
＊推奨ファイル：gif、jpg、png<br />
<br />
＜変更方法＞<br />
1 - WordPressのメディアライブラリーに画像をアップロード<br />
2 - ファイルの URLをコピー<br />
3 - 上のボックスにファイルのURLをペースト<br />
4 - ページ一番下の「設定を保存ボタン」を押す<br/>
＊削除する場合は空欄にして保存ボタンを押してください。初期設定のロゴに戻ります。<br />
<br/>
＜現在の画像＞<br />
<img src="<?php echo (get_option('logo_url')) ? get_option('logo_url') : get_bloginfo('template_url') . '/images/logo.gif' ?>"
alt=""/></td>
</tr>
</table>


<p>　</p>
<div id="icon-options-general" class="icon32"><br /></div>
<h2>スライドショー画像の変更</h2>
<br />
画像をアップロードするとTOPページのスライドショー画像が自動的に変更されます。<br />
<form method="post" action="">
<input type="hidden" name="update_options" value="true" />

<table class="form-table">
<tr valign="top">
<th scope="row"><label for="slideshow1"><?php _e('◎スライドショー画像１枚目のURL'); ?></label></th>
<td><input type="text" name="slideshow1" id="slideshow1" size="50" value="<?php echo get_option('slideshow1'); ?>"/>　（http://〜）<br/><a href="<?php bloginfo("url"); ?>/wp-admin/media-new.php" target="_blank">スライドショー画像をアップロード</a><br />
＊サイズ固定：横幅960px  高さ350px<br />
＊推奨ファイル：jpg、png<br />
<br />
＜変更方法＞<br />
1 - WordPressのメディアライブラリーに画像をアップロード<br />
2 - ファイルの URLをコピー<br />
3 - 上のボックスにファイルのURLをペースト<br />
4 - ページ一番下の「設定を保存ボタン」を押す<br/>
＊削除する場合は空欄にして保存ボタンを押してください。初期設定の画像に戻ります。<br />
<br/>
＜現在の画像＞<br />
<img src="<?php echo (get_option('slideshow1')) ? get_option('slideshow1') : get_bloginfo('template_url') . '/images/main_01.jpg' ?>"
alt=""/></td>
</tr>
</table>


<p>　</p>
<form method="post" action="">
<input type="hidden" name="update_options" value="true" />

<table class="form-table">
<tr valign="top">
<th scope="row"><label for="slideshow2"><?php _e('◎スライドショー画像２枚目のURL'); ?></label></th>
<td><input type="text" name="slideshow2" id="slideshow2" size="50" value="<?php echo get_option('slideshow2'); ?>"/>　（http://〜）<br/><a href="<?php bloginfo("url"); ?>/wp-admin/media-new.php" target="_blank">スライドショー画像をアップロード</a><br />
＊サイズ固定：横幅960px  高さ350px<br />
＊推奨ファイル：jpg、png<br />
<br />
＜変更方法＞<br />
1 - WordPressのメディアライブラリーに画像をアップロード<br />
2 - ファイルの URLをコピー<br />
3 - 上のボックスにファイルのURLをペースト<br />
4 - ページ一番下の「設定を保存ボタン」を押す<br/>
＊削除する場合は空欄にして保存ボタンを押してください。初期設定の画像に戻ります。<br />
<br/>
＜現在の画像＞<br />
<img src="<?php echo (get_option('slideshow2')) ? get_option('slideshow2') : get_bloginfo('template_url') . '/images/main_02.jpg' ?>"
alt=""/></td>
</tr>
</table>


<p>　</p>
<form method="post" action="">
<input type="hidden" name="update_options" value="true" />

<table class="form-table">
<tr valign="top">
<th scope="row"><label for="slideshow3"><?php _e('◎スライドショー画像３枚目のURL'); ?></label></th>
<td><input type="text" name="slideshow3" id="slideshow3" size="50" value="<?php echo get_option('slideshow3'); ?>"/>　（http://〜）<br/><a href="<?php bloginfo("url"); ?>/wp-admin/media-new.php" target="_blank">スライドショー画像をアップロード</a><br />
＊サイズ固定：横幅960px  高さ350px<br />
＊推奨ファイル：jpg、png<br />
<br />
＜変更方法＞<br />
1 - WordPressのメディアライブラリーに画像をアップロード<br />
2 - ファイルのURLをコピー<br />
3 - 上のボックスにファイルのURLをペースト<br />
4 - ページ一番下の「設定を保存ボタン」を押す<br/>
＊削除する場合は空欄にして保存ボタンを押してください。初期設定の画像に戻ります。<br />
<br/>
＜現在の画像＞<br />
<img src="<?php echo (get_option('slideshow3')) ? get_option('slideshow3') : get_bloginfo('template_url') . '/images/main_03.jpg' ?>"
alt=""/></td>
</tr>
</table>




<p>　</p>
<div id="icon-options-general" class="icon32"><br /></div>
<h2>トップページ サムネイル画像一覧の見出し設定</h2>
<br />
トップページ サムネイル画像一覧の見出しを指定出来ます。<br />
<form method="post" action="">
<input type="hidden" name="update_options" value="true" />
<table class="form-table">
<tr valign="top">
<th scope="row"><label for="midashi"><?php _e('◎大見出し'); ?></label></th>
<td><input type="text" name="midashi" id="midashi" size="50" value="<?php echo get_option('midashi'); ?>"/>　大見出しを記入して下さい。<br />
<br />
＜現在の見出し＞<br />
<?php echo (get_option('midashi'));?>
<p>　</p>
</td>
</tr>
</table>
<p>　</p>


<p>　</p>
<div id="icon-options-general" class="icon32"><br /></div>
<h2>ソーシャルアイコンの設定（Twitter、Facebook）</h2>
<br />
URLを設定すると、フッターのソーシャルアイコンに自動的にURLがリンクされます。<br />
<form method="post" action="">
<input type="hidden" name="update_options" value="true" />
<table class="form-table">
<tr valign="top">
<th scope="row"><label for="facebook"><?php _e('◎Facebookアカウント'); ?></label></th>
<td><input type="text" name="facebook" id="facebook" size="50" value="<?php echo get_option('facebook'); ?>"/>　FacebookアカウントのURL（http://〜）を記入して下さい。<br />
<br />
＜現在のURL＞<br />
<?php echo (get_option('facebook'));?>
<p>　</p>
</td>
</tr>
<tr valign="top">
<th scope="row"><label for="twitter"><?php _e('◎Twitterアカウント'); ?></label></th>
<td><input type="text" name="twitter" id="twitter" size="50" value="<?php echo get_option('twitter'); ?>"/>　TwitterアカウントのURL（http://〜）を記入して下さい。<br />
<br />
＜現在のURL＞<br />
<?php echo (get_option('twitter'));?>
</td>
</tr>
</table>
<p>　</p>


<p><input type="submit" value="設定を保存" class="button button-primary" /></p>
</form>
</div>
<?php
}
// Update options
function options_update() {
update_option('logo_url', $_POST['logo_url']);
update_option('slideshow1', $_POST['slideshow1']);
update_option('slideshow2', $_POST['slideshow2']);
update_option('slideshow3', $_POST['slideshow3']);

update_option('facebook', $_POST['facebook']);
update_option('twitter', $_POST['twitter']);

update_option('midashi', $_POST['midashi']);
}
?>