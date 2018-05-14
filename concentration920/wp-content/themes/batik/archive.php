<?php get_header(); ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<section class="row">
<section class="home-content">

<section class="header">
<div class="title-blog">
<h1 class="page-title">
						<?php if ( is_day() ) : ?>
							<?php printf( __( 'Daily Archives: %s', 'batik' ), '<span>' . get_the_date() . '</span>' ); ?>
						<?php elseif ( is_month() ) : ?>
							<?php printf( __( 'Monthly Archives: %s', 'batik' ), '<span>' . get_the_date( 'F Y' ) . '</span>' ); ?>
						<?php elseif ( is_year() ) : ?>
							<?php printf( __( 'Yearly Archives: %s', 'batik' ), '<span>' . get_the_date( 'Y' ) . '</span>' ); ?>
						<?php else : ?>
							<?php _e( 'Blog Archives', 'batik' ); ?>
						<?php endif; ?>
					</h1>

</div>
<div class="clearfix"></div>
</section>
<section class="content-excerpt">
<div id="navmenu">
<?php wp_nav_menu( array( 'theme_location' => 'primary') );?>
</div>
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="clear"></div>													
<header class="entry-meta">				
<h2 class="title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
<p class="post-info"> <?php batik_posted_on(); ?> | <?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'batik' ) . '</span>', _x( '1 comment', 'comments number', 'batik' ), _x( '% comments', 'comments number', 'batik' ) ); ?></p>
</header>
<div class="ekserp">
<div class="alignleft">
<?php _e('Categories :', 'batik'); ?> <?php the_category(' &bull; '); ?>
<div class="clear"></div>
<?php
					$tags_list = get_the_tag_list( '', ', ' );
					if ( $tags_list ):
				?>
					<span class="tag-links">
						<?php printf( __( '<span class="%1$s">Tagged :</span> %2$s', 'batik' ), '', $tags_list ); ?>
					</span>
				<?php endif; ?>

</div>
</div>
</div>
<div class="clearfix"></div>
<?php endwhile; ?>
<?php batik_content_nav();?>
<?php else : ?>
<h2 class="eror"><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'batik' ); ?></h2>

<?php endif; ?>
</section>
</section>

<section class="side-depan">
<?php echo batik_breadcrumb(); ?>
<?php get_search_form(); ?>
<div class="side-padding2">
<?php get_sidebar('icon'); ?>
<?php get_sidebar('adds'); ?>
<?php if (!dynamic_sidebar('sidebar-right') ) : ?>
<?php endif; ?>
</div>
<div class="row scoloumn">
<div class="six">
<?php if (!dynamic_sidebar('coloumn-one') ) : ?>
<?php endif; ?>
<div class="clearfix"></div>
</div>
<div class="six">
<?php if (!dynamic_sidebar('coloumn-two') ) : ?>
<?php endif; ?>
</div>
</div>
</section>
</section>                   
<?php get_sidebar(); ?>
<?php get_footer(); ?>