<?php get_header(); ?>


<!-- 全体warapper -->
<div class="wrapper">

<!-- メインwrap -->
<div id="main">

<!-- コンテンツブロック -->
<div class="row">

<!-- 本文エリア -->
<article class="twothird">


<!-- 投稿が存在するかを確認する条件文 -->
<?php if (have_posts()) : ?>

<!-- 投稿一覧の最初を取得 -->
<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

<!-- カテゴリーアーカイブの場合 -->
<?php /* If this is a category archive */ if (is_category()) { ?>
<h2 class="pagetitle"><?php single_cat_title(); ?></h2>

<!-- タグアーカイブの場合 -->
<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
<h2 class="pagetitle"><?php single_tag_title(); ?></h2>

<!-- 日別アーカイブの場合 -->
<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
<h2 class="pagetitle"><?php printf(_c(' %s|Daily archive page'), get_the_time(__('Y-m-d'))); ?></h2>

<!-- 月別アーカイブの場合 -->
<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
<h2 class="pagetitle"><?php printf(_c(' %s|Monthly archive page'), get_the_time(__('Y-m'))); ?></h2>

<!-- 年別アーカイブの場合 -->
<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
<h2 class="pagetitle"><?php printf(_c('Archive for %s|Yearly archive page'), get_the_time(__('Y'))); ?></h2>

<!-- 著者アーカイブの場合 -->
<?php /* If this is an author archive */ } elseif (is_author()) { ?>
<h2 class="pagetitle"><?php _e('Author Archive'); ?></h2>

<!-- 複数ページにアーカイブの場合 -->
<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
<h2 class="pagetitle"><?php _e('Blog Archives'); ?></h2>

<?php } ?>
<!-- / 投稿一覧の最初 -->


<!-- 投稿ループ -->
<?php while (have_posts()) : the_post(); ?>

<h3 class="blog-title" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>

<?php the_content() ?>

<div id="blog-foot"><?php the_time(__('Y-m-d')) ?> ｜ <?php printf(__('Posted in %s'), get_the_category_list(', ')); ?> ｜ <?php comments_popup_link(__('No Comments &#187;'), __('1 Comment &#187;'), __('% Comments &#187;'), '', __('Comments Closed') ); ?>　<?php edit_post_link(__('Edit'), ''); ?></div>
<p style="margin-bottom:50px">　</p>

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

<!-- ページャー -->
<div id="next-archives">
<span class="left"><?php previous_posts_link(__('＜')); ?></span>
<span class="right"><?php next_posts_link(__('＞')); ?></span>
<div class="clear"></div>
</div>
<!-- / ページャー -->
<!-- wp-pagenavi -->
<div class="next-pagenavi"><?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?></div>
<!-- / wp-pagenavi -->

</article>
<!-- / 本文エリア -->


<!-- サイドエリア -->
<article class="third">

<?php get_sidebar(); ?>

</article>
<!-- / サイドエリア -->


</div>
<!-- / コンテンツブロック -->


</div>
<!-- / メインwrap -->

<?php get_footer(); ?>