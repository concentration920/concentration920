<?php get_header('single'); ?>

<!-- 全体warapper -->
<div class="wrapper">

<!-- メインwrap -->
<div id="main">


<!-- コンテンツブロック -->
<div class="row">


<!-- 本文エリア -->
<article class="twothird">

<!-- ページタイトル -->
<div class="pagetitle"><?php the_category(', '); ?></div>
<!-- / ページタイトル -->

<!-- 投稿 -->
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<h1 class="blog-title"><?php the_title(); ?></h1>

<?php the_content(); ?>

<!-- ウィジェットエリア（本文下の広告枠） -->
<div class="row widget-adspace">
<article>	
<div id="topbox">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('本文下の広告枠') ) : ?>
<?php endif; ?>
</div>
</article>	
</div>
<!-- / ウィジェットエリア（本文下の広告枠） -->

<div id="blog-foot"><?php the_time(__('Y-m-d')) ?> ｜ <?php printf(__('Posted in %s'), get_the_category_list(', ')); ?> ｜ <?php comments_popup_link(__('No Comments &#187;'), __('1 Comment &#187;'), __('% Comments &#187;'), '', __('Comments Closed') ); ?>　<?php edit_post_link(__('Edit'), ''); ?></div>
<!-- / 投稿 -->



<!-- 関連記事 -->
<h3 class="similar-head">関連記事</h3>
<div class="similar">
<?php
foreach((get_the_category()) as $cat) {
$catid = $cat->cat_ID ;
break ;
}
$thisID = $post->ID;
$get_posts_parm = "'numberposts=3&category=" . $catid . "&exclude=". $thisID . "'";
?>
<ul>
<?php $posts = get_posts($get_posts_parm); ?>
<?php foreach($posts as $post): ?>
<li><table class="similar-text"><tr><th><a href="<?php the_permalink() ?>"><?php
if ( has_post_thumbnail() ) the_post_thumbnail();
else echo '<img src="'.get_template_directory_uri().'/images/noimage-630x420.jpg" />';
?></a></th>
<td><h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"> <?php the_title(); ?></a></h4></td></tr></table></li>
<?php endforeach;
wp_reset_postdata(); ?>
</ul>
</div>
<!-- / 関連記事 -->


<!-- ページャー -->
<div id="next">
<span class="left"><?php previous_post_link('%link', '＜ %title', 'true'); ?></span>
<span class="right"><?php next_post_link('%link', '%title ＞', 'true'); ?></span>
<div class="clear"></div>
</div>
<!-- / ページャー -->

<!-- コメントエリア -->
<?php comments_template(); ?>
<!-- / コメントエリア -->

<!-- 投稿が無い場合 -->
<?php endwhile; else: ?>
<p><?php echo "お探しの記事、ページは見つかりませんでした。"; ?></p>
<?php endif; ?>
<!-- 投稿が無い場合 -->


<!-- ウィジェットエリア（コメント下の広告枠） -->
<div class="row widget-adspace">
<article>	
<div id="topbox">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('コメント下の広告枠') ) : ?>
<?php endif; ?>
</div>
</article>	
</div>
<!-- / ウィジェットエリア（コメント下の広告枠） -->


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