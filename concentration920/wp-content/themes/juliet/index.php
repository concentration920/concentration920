<?php get_header(); ?>


<!-- スライドショー -->
<div id="top-slide">
<div class="cycle-slideshow"
 data-cycle-fx="scrollHorz"
 data-cycle-pause-on-hover="true"
 data-cycle-speed="500">
<img src="<?php echo (get_option('slideshow1')) ? get_option('slideshow1') : get_bloginfo('template_url') . '/images/main_01.jpg' ?>" alt="<?php bloginfo('name'); ?>" />
<img src="<?php echo (get_option('slideshow2')) ? get_option('slideshow2') : get_bloginfo('template_url') . '/images/main_02.jpg' ?>" alt="<?php bloginfo('name'); ?>" />
<img src="<?php echo (get_option('slideshow3')) ? get_option('slideshow3') : get_bloginfo('template_url') . '/images/main_03.jpg' ?>" alt="<?php bloginfo('name'); ?>" />
</div>
</div>
<!-- / スライドショー -->



<!-- 全体warapper -->
<div class="wrapper">


<!-- メインwrap -->
<div id="main">


<!-- コンテンツブロック -->
<div class="row">
<article class="third">	
<div id="topbox">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('トップ3列左側') ) : ?>
<?php endif; ?>
</div>
</article>	
<article class="third">	
<div id="topbox">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('トップ3列中央') ) : ?>
<?php endif; ?>
</div>
</article>	
<article class="third">
<div id="topbox">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('トップ3列右側') ) : ?>
<?php endif; ?>
</div>
</article>	
</div>
<!-- / コンテンツブロック -->



<h2 class="top-gallery-midashi"><?php echo (get_option('midashi'));?></h2>

<!-- コンテンツブロック -->
<ul class="block-three">

<!-- 最新記事列 -->
<?php query_posts("showposts=12"); ?>
<?php if (have_posts()) : ?>

<!-- 投稿ループ -->
<?php while (have_posts()) : the_post(); ?>

<li class="item">
<div class="gallery-item">
<div class="item-img"><a href="<?php the_permalink() ?>"><?php
if ( has_post_thumbnail() ) the_post_thumbnail();
else echo '<img src="'.get_template_directory_uri().'/images/noimage-630x420.jpg" />';
?></a></div>
<div class="item-date"><?php the_time(__('Y-m-d')) ?> | <?php $cat = get_the_category(); ?><?php $cat = $cat[0]; ?><?php echo get_cat_name($cat->term_id); ?></div>
<h2 class="item-title" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>"><?php echo mb_substr($post->post_title, 0, 40); ?></a></h2>
</div>
</li>

<?php endwhile; ?>
<!-- / 投稿ループ -->

<!-- 投稿がない場合 -->
<?php else: ?> 
<p style="text-align:center">　　No Post.</p>
<?php endif; ?>
<!-- / 投稿がない場合 -->

</ul>
<!-- / コンテンツブロック -->




<!-- コンテンツブロック -->
<div class="row">
<article>	
<div id="topbox">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('トップ下部') ) : ?>
<?php endif; ?>
</div>
</article>	
</div>
<!-- / コンテンツブロック -->



</div>
<!-- / メインwrap -->

<?php get_footer(); ?>