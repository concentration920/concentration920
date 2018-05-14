	<div id="footer-border"></div>
	
	<div id="footer">
	
		<div id="footer-3rd">
			<ul class="footer-bar">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 1') ) : // begin 3rd sidebar widgets ?>
			<?php endif; // end 3rd sidebar widgets  ?>
			</ul>
			<ul class="footer-bar">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 2') ) : // begin 4th sidebar widgets ?>
			<?php endif; // end 3rd sidebar widgets  ?>
			</ul>
			<ul class="footer-bar">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 3') ) : // begin 5th sidebar widgets ?>
			<?php endif; // end 3rd sidebar widgets  ?>
			</ul>
			
			<div ID="footer-text">
			&copy;Copyright <?php echo date("Y") ?>&nbsp;<?php bloginfo('name'); ?>&nbsp;&nbsp;|&nbsp;&nbsp;Theme by <a href="http://nishuang.de/theme/7color/" target="_blank">Nishuang.de</a>
			</div>

		</div><!-- #footer-3rd -->
		
		

		
		
				
		
	</div><!-- #footer -->
	



<?php wp_footer() ?>

</body>
</html>