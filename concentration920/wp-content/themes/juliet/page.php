<?php get_header(); ?>


<!-- 全体warapper -->
<div class="wrapper">

<!-- メインwrap -->
<div id="main">


<!-- コンテンツブロック -->
<div class="row">


<!-- 本文エリア -->
<article class="twothird">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<h2 class="pagetitle"><?php the_title(); ?></h2>

<?php the_content(); ?>

<?php endwhile; else: ?>
<p><?php echo "お探しの記事、ページは見つかりませんでした。"; ?></p>
<?php endif; ?>

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