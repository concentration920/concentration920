<?php
/*
Template Name: サイドバー無し
*/
?>

<?php get_header(); ?>


<!-- 全体warapper -->
<div class="wrapper">

<!-- メインwrap -->
<div id="main">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<h2 class="pagetitle"><?php the_title(); ?></h2>

<?php the_content(); ?>

<?php endwhile; else: ?>
<p><?php echo "お探しの記事、ページは見つかりませんでした。"; ?></p>
<?php endif; ?>

</div>
<!-- / メインwrap -->

<?php get_footer(); ?>