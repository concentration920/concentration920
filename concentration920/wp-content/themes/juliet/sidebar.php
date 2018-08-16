<!-- サイドバー -->
<div id="sidebar">

<div id="sidebox">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('サイドバー') ) : ?>
<?php endif; ?>
</div>

<div id="sidebox-new">
<!-- 新着記事 -->
<div class="sidebar-title">新着記事</div>
<ul>
<?php query_posts("showposts=5"); ?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>
<li><table class="similar-side"><tr><th><a href="<?php the_permalink() ?>"><?php
if ( has_post_thumbnail() ) the_post_thumbnail();
else echo '<img src="'.get_template_directory_uri().'/images/noimage-630x420.jpg" />';
?></a></th>
<td><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"> <?php the_title(); ?></a></td></tr></table></li>
<?php endwhile; else: ?>
<li>記事はありません</li>
<?php endif; ?>
</ul>
<!-- / 新着記事 -->
</div>

<div id="sidebox">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('サイドバー2') ) : ?>
<?php endif; ?>
</div>

</div>
<!-- /  サイドバー  -->