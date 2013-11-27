<?php

require_once('wp_bootstrap_navwalker.php');

register_nav_menu( 'primary', 'Menu Główne' );

function cattery_widgets_init() {

        register_sidebar( array(
		'name' => 'Strona Główna',
		'id' => 'homepage_start',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
                'before_widget' => '<div class="row-fluid">',
		'after_widget' => '</div>',
	));
    
	register_sidebar( array(
		'name' => 'Stopka 1',
		'id' => 'footer_1',
		'before_widget' => '<div class="span4">',
		'after_widget' => '</div>',
		'before_title' => '<h3><span class="font_hotel">',
		'after_title' => '</span></h3>',
	));
	register_sidebar( array(
		'name' => 'Stopka 2',
		'id' => 'footer_2',
		'before_widget' => '<div class="span8 pagination-right">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
}
add_action( 'widgets_init', 'cattery_widgets_init' );

add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form' ) );
add_theme_support('post-thumbnails');
set_post_thumbnail_size( 150, 150 );

add_action('init', 'slide_init');

function slide_init() {
	$labels = array(
		'name' => _x('Slajdy', 'post type general name'),
		'singular_name' => _x('Slajd', 'post type singular name'),
		'add_new' => _x('Dodaj nowy', 'slide'),
		'add_new_item' => __('Dodaj nowy slajd'),
		'edit_item' => __('Edytuj Slajd'),
		'new_item' => __('Nowy Slajd'),
		'view_item' => __('Zobacz Slajd'),
		'search_items' => __('Wyszukuj slajdów'),
		'not_found' => __('Brak slajdów'),
		'not_found_in_trash' => __('Brak slajdów w koszu'), 
		'parent_item_colon' => '',
		'menu_name' => 'Slajdy'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true, 
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title', 'editor', 'thumbnail')
	); 
	register_post_type('slide', $args);
}

/* Update Slide Messages */
add_filter('post_updated_messages', 'slide_updated_messages');
function slide_updated_messages($messages) {
	global $post, $post_ID;
	$messages['slide'] = array(
		0 => '',
		1 => sprintf(__('Slide updated.'), esc_url(get_permalink($post_ID))),
		2 => __('Custom field updated.'),
		3 => __('Custom field deleted.'),
		4 => __('Slide updated.'),
		5 => isset($_GET['revision']) ? sprintf(__('Slide restored to revision from %s'), wp_post_revision_title((int) $_GET['revision'], false)) : false,
		6 => sprintf(__('Slide published.'), esc_url(get_permalink($post_ID))),
		7 => __('Slide saved.'),
		8 => sprintf(__('Slide submitted.'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
		9 => sprintf(__('Slide scheduled for: <strong>%1$s</strong>. '), date_i18n(__('M j, Y @ G:i'), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
		10 => sprintf(__('Slide draft updated.'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
	);
	return $messages;
}

/* Update Slide Help */
add_action('contextual_help', 'slide_help_text', 10, 3);
function slide_help_text($contextual_help, $screen_id, $screen) {
	if ('slide' == $screen->id) {
		$contextual_help =
		'<p>' . __('Things to remember when adding a slide:') . '</p>' .
		'<ul>' .
		'<li>' . __('Give the slide a title. The title will be used as the slide\'s headline.') . '</li>' .
		'<li>' . __('Attach a Featured Image to give the slide its background.') . '</li>' .
		'<li>' . __('Enter text into the Visual or HTML area. The text will appear within each slide during transitions.') . '</li>' .
		'</ul>';
	}
	elseif ('edit-slide' == $screen->id) {
		$contextual_help = '<p>' . __('A list of all slides appears below. To edit a slide, click on the slide\'s title.') . '</p>';
	}
	return $contextual_help;
}


/**
 * Enqueues scripts and styles for front end.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function tworzenieweb_scripts_styles() {
	

	// Loads JavaScript file with functionality specific to Twenty Thirteen.
	wp_enqueue_script("jquery", 'http://code.jquery.com/jquery-1.10.1.min.js', array(), '2013-09-31', true);
	wp_enqueue_script("jquery-migrate", 'http://code.jquery.com/jquery-migrate-1.2.1.min.js', array(), '2013-09-31', true);
	wp_enqueue_script( 'bootstrap-transition', get_template_directory_uri() . '/bootstrap/js/bootstrap-transition.js', array(), '2013-09-31', true );
	wp_enqueue_script( 'bootstrap-collapse', get_template_directory_uri() . '/bootstrap/js/bootstrap-collapse.js', array(), '2013-09-31', true );
	wp_enqueue_script( 'bootstrap-dropdown', get_template_directory_uri() . '/bootstrap/js/bootstrap-dropdown.js', array(), '2013-09-31', true );
	wp_enqueue_script( 'jquery-ui', get_template_directory_uri() . '/js/jquery-ui-1.10.2.custom.min.js', array(), '2013-09-31', true );
	wp_enqueue_script( 'localscroll', get_template_directory_uri() . '/js/jquery.localScroll.min.js', array(), '2013-09-31', true );
//	wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array(), '2013-09-31', true );
	wp_enqueue_script( 'scrollto', get_template_directory_uri() . '/js/jquery.scrollTo-1.4.3.1-min.js', array(), '2013-09-31', true );
	wp_enqueue_script( 'sequence', get_template_directory_uri() . '/js/jquery.sequence-min.js', array(), '2013-09-31', true );
	wp_enqueue_script( 'unveil', get_template_directory_uri() . '/js/jquery.unveil.min.js', array(), '2013-09-31', true );
//	wp_enqueue_script( 'masonry', get_template_directory_uri() . '/js/masonry.pkgd.min.js', array(), '2013-09-31', true );
	
//        wp_enqueue_script( 'ui1', get_template_directory_uri() . '/js/jquery-ui-1.8.23.custom.min.js', array(), null, true );
//        wp_enqueue_script( 'mouse', get_template_directory_uri() . '/js/jquery.mousewheel.min.js', array(), null, true );
//        wp_enqueue_script( 'smoothscroll', get_template_directory_uri() . '/js/jquery.smoothdivscroll-1.3-min.js', array(), null, true );
//        wp_enqueue_script( 'kinetic', get_template_directory_uri() . '/js/jquery.kinetic.min.js', array(), null, true );
//	wp_enqueue_style( 'smoothscroll', get_template_directory_uri() . '/js/smooth-scroll/css/smoothDivScroll.css', array(), '1.00' );
//        wp_enqueue_script( 'waitforimages', 'http://cdnjs.cloudflare.com/ajax/libs/jquery.waitforimages/1.5.0/jquery.waitforimages.min.js', array(), null, true );
        wp_enqueue_script( 'cattery-app', get_template_directory_uri() . '/js/app.js', array(), '2013-09-31', true );

        
        
        
	// Add Open Sans and Bitter fonts, used in the main stylesheet.
	wp_enqueue_style( 'twentythirteen-fonts', '//fonts.googleapis.com/css?family=Libre+Baskerville:400,300,700|Berkshire+Swash', array(), null );


	// Loads our main stylesheet.
	wp_enqueue_style( 'twentythirteen-style', get_stylesheet_uri(), array(), '2013-09-30' );

	
}
add_action( 'wp_enqueue_scripts', 'tworzenieweb_scripts_styles' );
