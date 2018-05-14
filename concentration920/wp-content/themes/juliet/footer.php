</div>
<!-- / 全体wrapper -->

<!-- フッターエリア -->
<footer id="footer">
<div class="footer-inner">

<!-- フッターウィジェット -->
<div class="row">
<article class="third">
<div id="topbox">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('フッター3列左側') ) : ?>
<?php endif; ?>
</div>
</article>
<article class="third">
<div id="topbox">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('フッター3列中央') ) : ?>
<?php endif; ?>
</div>
</article>
<article class="third">
<div id="topbox">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('フッター3列右側') ) : ?>
<?php endif; ?>
</div>
</article>
</div>
<!-- / フッターウィジェット -->
<div class="clear"></div>

<!-- コピーライト表示 -->
<div id="copyright">
© <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>. all rights reserved.
</div>
<!-- /コピーライト表示 -->

</div>
</footer>
<!-- / フッターエリア -->

<?php wp_footer(); ?>


</body>
</html>