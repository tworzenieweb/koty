<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
        wp_deregister_script('jquery');
	wp_head();
?>
</head>

<body class="theme_blue">
    <div id="wrapper">

     <!-- Start section content Top -->
      <section id="content_top">
        <!-- STart sequence Slider  -->
        <div id="sequence">
          <a href="#" class="sequence-prev">Poprzednie</a>
          <a href="#" class="sequence-next">Następne</a>
          <ul class="sequence-canvas unstyled">       
            <?php
                $args = array('post_type' => 'slide', 'posts_per_page' => 5);
                $loop = new WP_Query($args);
                while ($loop->have_posts()) : $loop->the_post(); ?>
                    <li class="animate-in ">
                        <div class="start_anime">
                                <?php the_post_thumbnail(null, array('class' => 'bg_slider')); ?>  
                                <div class="box_area_slider">
                                  <div class="panel" >
                                    <?php the_content(); ?>
                                  </div>
                        </div>
                    </li>
                <?php endwhile; ?> 

          </ul>
        </div><!-- End sequence Slider  -->
      </section><!-- End section content page -->
      <section id="top_header">
        <div class="inner-wrapper text_center">
          <!--Start Main Navigation-->
          <div class="togle_menu_mobile"><a class="btn btn-primary flat" data-toggle="collapse" data-target=".main_navbar"> <i class="icon-th-list icon-2x"></i> </a> <strong>&nbsp;&nbsp;Menu </strong></div>

          
          <?php
            wp_nav_menu( array(
                'menu'              => 'primary',
                'theme_location'    => 'primary',
                'depth'             => 2,
                'container'         => 'nav',
                'container_class'   => 'collapse main_navbar',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>
          
              
          <!--ENd Main Navigation-->
        </div>
    </section> 
    
    <!-- Start section logo message area -->
    <section id="logo_message_area">
        <div class="inner-wrapper">
         
          <!-- Start Message Your own -->
          <div class="row-fluid">
            <div class="span8">
              <p class="no_margin"><?php bloginfo( 'description' ); ?></p>
            </div>
          </div><!-- End Message Your own -->
        </div>
        <div class="inner-wrapper driver_space"></div>
    </section><!-- End section logo message area -->