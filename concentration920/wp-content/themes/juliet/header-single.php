<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<title><?php echo trim(wp_title('', false)); if(wp_title('', false)) { echo ' - '; } bloginfo('name'); ?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?php bloginfo('template_directory');?>/responsive.css" type="text/css" media="screen, print" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen, print" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<?php
wp_deregister_script('jquery');
wp_enqueue_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js', array(), '1.7.1');
?>
<?php wp_head(); ?>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/jquery/scrolltopcontrol.js"></script>
<script src="<?php bloginfo('template_directory');?>/jquery/jquery.cycle2.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_directory');?>/jquery/jquery.cycle2.carousel.js" type="text/javascript"></script>
<script type="text/javascript">
 $().ready(function() {
   $(document).ready(
     function(){
     $("a img").hover(function(){
     $(this).fadeTo(200, 0.8);
     },function(){
     $(this).fadeTo(300, 1.0);
     });
   });
 });
</script>
</head>

<body <?php body_class(); ?>>

<!-- ヘッダー -->
<header id="header">

<!-- ヘッダー中身 -->    
<div class="header-inner">

<!-- ロゴ -->
<div class="logo">
<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo (get_option('logo_url')) ? get_option('logo_url') : get_bloginfo('template_url') .'/images/logo.gif' ?>" alt="<?php bloginfo('name'); ?>"/></a>
</div>
<!-- / ロゴ -->

<!-- サーチ -->
<div class="contact">
<?php get_search_form(); ?>
</div>
<!-- / サーチ -->  

</div>    
<!-- / ヘッダー中身 -->    

</header>
<!-- / ヘッダー -->  
<div class="clear"></div>

<!-- トップナビゲーション -->
<nav id="nav" class="main-navigation" role="navigation">
<?php wp_nav_menu( array( 'menu' => 'topnav', 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
</nav>

<!-- / トップナビゲーション -->
<div class="clear"></div>  