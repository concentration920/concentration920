<?php get_header(); ?>

<!-- 全体warapper -->
<div class="wrapper">

<!-- メインwrap -->
<div id="main">


<!-- コンテンツブロック -->
<div class="row">


<!-- 本文エリア -->
<article class="twothird">

<!-- 検索結果の表示 -->
<h2 class="pagetitle">検索結果：<?php the_search_query(); ?></h2>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<h3 class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
<?php the_excerpt(); ?>
<div style="margin-top:10px;margin-bottom:50px;"><a href="<?php the_permalink(); ?>" class="rm">このエントリーを読む &raquo;</a></div>

<?php endwhile; ?>
<!-- /検索結果の表示 -->


<!-- キーワードが見つからないとき -->
<?php else: ?> 
<p>お探しのキーワードは見つかりませんでした。</p>
<?php endif; ?>
<!-- / キーワードが見つからないとき -->


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