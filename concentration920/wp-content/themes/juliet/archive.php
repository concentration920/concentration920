<?php get_header(); ?>


<!-- 全体warapper -->
<div class="wrapper">

<!-- メインwrap -->
<div id="main">

<!-- 投稿が存在するかを確認する条件文 -->
<?php if (have_posts()) : ?>

<!-- 投稿一覧の最初を取得 -->
<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

<!-- カテゴリーアーカイブの場合 -->
<?php /* If this is a category archive */ if (is_category()) { ?>
<h2 class="pagetitle" style="margin-bottom:35px"><?php single_cat_title(); ?></h2>

<!-- タグアーカイブの場合 -->
<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
<h2 class="pagetitle"><?php single_tag_title(); ?></h2>

<!-- 日別アーカイブの場合 -->
<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
<h2 class="pagetitle"><?php printf(_c(' %s|Daily archive page', 'kubrick'), get_the_time(__('F jS, Y'))); ?>年</h2>

<!-- 月別アーカイブの場合 -->
<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
<h2 class="pagetitle"><?php printf(_c(' %s|Monthly archive page', 'kubrick'), get_the_time(__('Y-m'))); ?></h2>

<!-- 年別アーカイブの場合 -->
<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
<h2 class="pagetitle"><?php printf(_c('Archive for %s|Yearly archive page', 'kubrick'), get_the_time(__('Y'))); ?></h2>

<!-- 著者アーカイブの場合 -->
<?php /* If this is an author archive */ } elseif (is_author()) { ?>
<h2 class="pagetitle"><?php _e('Author Archive'); ?></h2>

<!-- 複数ページアーカイブの場合 -->
<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
<h2 class="pagetitle"><?php _e('Blog Archives'); ?></h2>

<?php } ?>
<!-- / 投稿一覧の最初 -->


<!-- コンテンツ -->
<ul class="block-three">

<!-- 投稿ループ -->
<?php while (have_posts()) : the_post(); ?>

<li class="item">
<div class="gallery-item">
<div class="item-img"><a href="<?php the_permalink() ?>"><?php
if ( has_post_thumbnail() ) the_post_thumbnail();
else echo '<img src="'.get_template_directory_uri().'/images/noimage-630x420.jpg" />';
?></a></div>
<div class="item-date"><?php the_time(__('Y-m-d')) ?></div>
<div class="item-title" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>"><?php echo mb_substr($post->post_title, 0, 40); ?></a></div>
</div>
</li>

<?php endwhile; ?>
<!-- / 投稿ループ -->

<!-- 投稿がない場合 -->
<?php else :
        if ( is_category() ) { // If this is a category archive
            printf("<h4>".__("　　投稿がありません").'</h4>', single_cat_title('',false));
        } else if ( is_date() ) { // If this is a date archive
            echo('<h4>'.__("Sorry, but there aren't any posts with this date.").'</h4>');
        } else if ( is_author() ) { // If this is a category archive
            $userdata = get_userdatabylogin(get_query_var('author_name'));
            printf("<h4>".__("Sorry, but there aren't any posts by %s yet.")."</h4>", $userdata->display_name);
        } else {
            echo("<h4>".__('No posts found.').'</h4>');
        }
    endif;
?>
<!-- / 投稿がない場合 -->


</ul>
<!-- / コンテンツ -->


<!-- ページャー -->
<div id="next">
<span class="left"><?php previous_posts_link(__('＜ 前のページ')); ?></span>
<span class="right"><?php next_posts_link(__('次のページ ＞')); ?></span>
<div class="clear"></div>
</div>
<!-- / ページャー -->
<!-- wp-pagenavi -->
<div class="next-pagenavi"><?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?></div>
<!-- / wp-pagenavi -->


</div>
<!-- / メインwrap -->

<?php get_footer(); ?>