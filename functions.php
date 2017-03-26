<?php
/**
 * organizeOS WP functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage organizeOS_WP
 * @since 1.0
 */


require_once('inc/MailChimp.php');

add_action( 'wp_ajax_organizeos_ajax', 'organizeos_ajax' );
add_action( 'wp_ajax_nopriv_organizeos_ajax', 'organizeos_ajax' );

show_admin_bar(false);


 /*
	* Remove a lot of built-in stuff we don't need.
	*/

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link');

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

remove_filter( 'the_excerpt', 'wpautop' );
add_filter( 'feed_links_show_comments_feed', '__return_false' );





/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function organizeOS_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/organizeOS
	 */
	load_theme_textdomain( 'organizeOS' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'organizeOS-featured-image', 1920, 1080, true );

	add_image_size( 'organizeOS-thumbnail-avatar', 512, 512, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'organizeOS' ),
		'social' => __( 'Social Links Menu', 'organizeOS' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * Return support for this once theme development has reached the next milestone
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
/*	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );
*/

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
add_action( 'after_setup_theme', 'organizeOS_setup' );


//add_filter( 'wp_resource_hints', 'organizeOS_resource_hints', 10, 2 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function organizeOS_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'organizeOS' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'organizeOS' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'organizeOS' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'organizeOS' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'organizeOS' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'organizeOS' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'organizeOS_widgets_init' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and changes auto excerpt length
 *
 * @since organizeOS WP 1.0
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function organizeOS_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'organizeOS' ), get_the_title( get_the_ID() ) )
	);
	return '&hellip;';
}
function organizeOS_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_more', 'organizeOS_excerpt_more' );
add_filter( 'excerpt_length', 'organizeOS_excerpt_length', 999 );



/**
 * Enqueue scripts and styles.
 */
function organizeOS_scripts() {

	// Theme stylesheet
	wp_enqueue_style( 'organizeOS-style', get_stylesheet_uri() );

  // Theme scripts
  wp_enqueue_script( 'organizeOS-scripts', get_theme_file_uri( '/assets/js/organizeos.js' ), array( 'jquery' ), '1.0', true );


	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'organizeOS-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );

	$organizeOS_l10n = array(
		'quote'          => organizeOS_get_svg( array( 'icon' => 'quote-right' ) ),
	);

	if ( has_nav_menu( 'top' ) ) {
		wp_enqueue_script( 'organizeOS-navigation', get_theme_file_uri( '/assets/js/navigation.js' ), array(), '1.0', true );
		$organizeOS_l10n['expand']         = __( 'Expand child menu', 'organizeOS' );
		$organizeOS_l10n['collapse']       = __( 'Collapse child menu', 'organizeOS' );
		$organizeOS_l10n['icon']           = organizeOS_get_svg( array( 'icon' => 'angle-down', 'fallback' => true ) );
	}


	wp_enqueue_script( 'jquery-scrollto', get_theme_file_uri( '/assets/js/jquery.scrollTo.js' ), array( 'jquery' ), '2.1.2', true );

	wp_localize_script( 'organizeOS-skip-link-focus-fix', 'organizeOSScreenReaderText', $organizeOS_l10n );

}
add_action( 'wp_enqueue_scripts', 'organizeOS_scripts' );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @since organizeOS WP 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function organizeOS_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 740 <= $width ) {
		$sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
	}

	if ( is_active_sidebar( 'sidebar-1' ) || is_archive() || is_search() || is_home() || is_page() ) {
		if ( ! ( is_page() && 'one-column' === get_theme_mod( 'page_options' ) ) && 767 <= $width ) {
			 $sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
		}
	}

	return $sizes;
}
// add_filter( 'wp_calculate_image_sizes', 'organizeOS_content_image_sizes_attr', 10, 2 );


/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @since organizeOS WP 1.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function organizeOS_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( is_archive() || is_search() || is_home() ) {
		$attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
	} else {
		$attr['sizes'] = '100vw';
	}

	return $attr;
}
// add_filter( 'wp_get_attachment_image_attributes', 'organizeOS_post_thumbnail_sizes_attr', 10, 3 );




/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );











// Configure WordPress such that the organizeOS theme works consistently

function organizeOS_setdefaults() {

	// set permalink structure to use /blog/%postname% for Blog posts
	global $wp_rewrite;
  $wp_rewrite->set_permalink_structure( '/blog/%postname%' );

}

add_action( 'after_switch_theme', 'organizeOS_setdefaults' );











add_filter('get_the_archive_title', function ($title) {

  if(is_category()) {$title = single_cat_title('', false);}
	elseif ( is_tag() ) {$title = sprintf( __( '%s' ), single_tag_title( '', false ) );}
	elseif ( is_author() ) {$title = sprintf( __( 'All posts by %s' ), '<span class="vcard">' . get_the_author() . '</span>' );}
	elseif ( is_year() ) {$title = sprintf( __( 'All posts in %s' ), get_the_date( _x( 'Y', 'yearly archives date format' ) ) );}
	elseif ( is_month() ) {$title = sprintf( __( 'All posts in %s' ), get_the_date( _x( 'F Y', 'monthly archives date format' ) ) );}
	elseif ( is_day() ) {$title = sprintf( __( 'All posts on %s' ), get_the_date( _x( 'F j, Y', 'daily archives date format' ) ) );}
	elseif ( is_post_type_archive() ) {$title = sprintf( __( 'All %s' ), post_type_archive_title( '', false ) );}
	else {$title = __( 'Archives' );}

  return $title;

});




// Custom post types for organizeOS


// Rename 'Posts' to 'Blog' to make it clearer what the purpose is, in combination with the custom post types

add_action( 'admin_menu', 'organizeOS_changepost' );
function organizeOS_changepost() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Blog';
    $submenu['edit.php'][5][0] = 'Blog Posts';
    $submenu['edit.php'][10][0] = 'Add Blog Post';
    $submenu['edit.php'][16][0] = 'Blog Tags';
}

add_action('init', 'my_init');

function my_init()
{
   $args = objectToArray( get_post_type_object('post') );
   $args['has_archive'] = true;
   $args['rewrite'] = array(
      'slug' => 'blog',
      'with_front' => FALSE,
   );
   register_post_type('post', $args);
}

function objectToArray( $object )
{
   if( !is_object( $object ) && !is_array( $object ) )
   {
      return $object;
   }

   if( is_object( $object ) )
   {
      $object = get_object_vars( $object );
   }

   return array_map('objectToArray', $object);
}



// Create 'Actions' and 'Issues' custom post types

add_action( 'init', 'organizeOS_posttypes' );
function organizeOS_posttypes() {

	add_post_type_support( 'page', 'excerpt' );

	register_post_type( 'organizeOS_actions',
	    array(
	        'labels' => array(
	            'name' => __( 'Actions' ),
	            'singular_name' => __( 'Action' ),
	            'add_new' => __( 'Add New Action' ),
	            'add_new_item' => __( 'Add New Action' ),
	            'edit_item' => __( 'Edit Action' ),
	            'new_item' => __( 'Add New Action' ),
	            'view_item' => __( 'View Action' ),
	            'search_items' => __( 'Search Actions' ),
	            'not_found' => __( 'No action found' ),
	            'not_found_in_trash' => __( 'No action found in trash' )
			),
			'hierarchical' => false,
			'description' => 'An action your organization wants site visitors to take.',
			'public' => true,
			'has_archive' => true,
			'delete_with_user' => false,
			'menu_position' => 5,
			'menu_icon' => 'dashicons-megaphone',
			'supports' => array('title','editor', 'thumbnail', 'excerpt','author','revisions'),
			'rewrite' => array('slug' => 'actions', 'with_front' => false),
			'register_meta_box_cb' => 'organizeOS_metasetup'
        )
    );
    register_post_type( 'organizeOS_issues',
        array(
	        'labels' => array(
	            'name' => __( 'Issues' ),
	            'singular_name' => __( 'Issue' ),
	            'add_new' => __( 'Add New Issue' ),
	            'add_new_item' => __( 'Add New Issue' ),
	            'edit_item' => __( 'Edit Issue' ),
	            'new_item' => __( 'Add New Issue' ),
	            'view_item' => __( 'View Issues' ),
	            'search_items' => __( 'Search Issues' ),
	            'not_found' => __( 'No issue found' ),
	            'not_found_in_trash' => __( 'No issue found in trash' )
			),
			'hierarchical' => false,
			'description' => 'An issue your organization wants to bring attention to.',
			'public' => true,
			'has_archive' => true,
			'delete_with_user' => false,
			'menu_position' => 5,
			'menu_icon' => 'dashicons-flag',
			'supports' => array('title','editor','excerpt', 'thumbnail','author','revisions'),
			'rewrite' => array('slug' => 'issues', 'with_front' => false),
			'register_meta_box_cb' => 'organizeOS_metasetup',
        )
    );
		global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Blog';
    $labels->singular_name = 'Blog';
    $labels->add_new = 'Add Blog Post';
    $labels->add_new_item = 'Add Blog Post';
    $labels->edit_item = 'Edit Blog Posts';
    $labels->new_item = 'Blog';
    $labels->view_item = 'View Blog Posts';
    $labels->search_items = 'Search Blog Posts';
    $labels->not_found = 'No Blog Posts found';
    $labels->not_found_in_trash = 'No Blog Posts found in Trash';
    $labels->all_items = 'All Blog Posts';
    $labels->menu_name = 'Blog';
    $labels->name_admin_bar = 'Blog';
}




function organizeOS_metasetup() {
	add_meta_box('organizeOS_issues', 'Issue Details', 'organizeOS_inputs', 'organizeOS_issues', 'normal', 'high', 'issue');
	add_meta_box('organizeOS_actions', 'Action Details', 'organizeOS_inputs', 'organizeOS_actions', 'normal', 'high', 'action');
}

function organizeOS_inputs($post, $callback) {

	$metas = get_post_meta($post->ID);

	$forms = '<input type="hidden" name="organizeOS_input_nonce" id="organizeOS_input_nonce" value="' . wp_create_nonce('organizeOS_meta_inputs') . '" /><br />';

	$link = '<label>Link to Action <input type="text" name="organizeOS_input_link" id="organizeOS_input_link" value="' . $metas['link'][0] . '"></label><br />';
	$deadline = '<label>Action Deadline <input type="date" name="organizeOS_input_deadline" id="organizeOS_input_deadline" value="' . $metas['deadline'][0] . '"></label><br />';
	$button = '<label>Button Text <input type="text" name="organizeOS_input_button" id="organizeOS_input_button" value="' . $metas['button'][0] . '"></label><br />';


	switch ($callback['args']) {
		case 'issue':
			$forms .= '';
		break;

		case 'action':
			$forms .= $link . $deadline . $button;
		break;

		default:
			/* */
		break;
	}
	echo $forms;

}


function organizeOS_savemeta($post_id, $post) {

	if (!wp_is_post_revision($post_id)) {
		//unset to prevent infinite loop triggered by wp_update_post
		remove_action('save_post', 'organizeOS_savemeta');

		$type = get_post_type($post);

		//for whatever reason these types are actually saved as lowercase, so to compare properly they are lowercase here
		if ($type == "organizeos_actions" || $type == "organizeos_issues" ) {

			//return nonce and capability checking someday?

			$organizeOS['link'] = $organizeOS['deadline'] = '';

			if (isset($_POST['organizeOS_input_link'])) {
			$organizeOS['link'] = $_POST['organizeOS_input_link'];
			}
			if (isset($_POST['organizeOS_input_deadline'])) {
			$organizeOS['deadline'] = $_POST['organizeOS_input_deadline'];
			}
			if (isset($_POST['organizeOS_input_button'])) {
			$organizeOS['button'] = $_POST['organizeOS_input_button'];
			}


			foreach ($organizeOS as $key => $value) {
				if ($value) {
					update_post_meta($post->ID, $key, $value);
				}
				else {
					delete_post_meta($post->ID, $key);
				}
			}

		}
		add_action('save_post', 'organizeOS_savemeta', 10, 2);//reset now that wp_update_post is done
	}
}

add_action('save_post', 'organizeOS_savemeta', 10, 2); // save the custom fields











function organizeos_ajax() {

	switch ($_POST['type']) {


		case 'morecards':
			echo organizeos_cards($_POST['post_type'], $_POST['count'], $_POST['offset']);
			exit();
		break;


		case 'subscribe':
			$email = sanitize_email($_POST['email']);
			$firstname = $lastname = '';
			if (isset($_POST['firstname'])) {
				$firstname = sanitize_text_field($_POST['firstname']);
			}
			if (isset($_POST['lastname'])) {
				$lastname = sanitize_text_field($_POST['lastname']);
			}
			$MailChimp = new \Drewm\MailChimp($apikey);
			$result = $MailChimp->call('lists/subscribe', array(
								'id'								=> $listid,
								'status'            => 'subscribed',
								'email'							=> array('email' => $email),
								'merge_fields'      => array('FNAME'=>$firstname, 'LNAME'=>$lastname),
								'update_existing'		=> true
            ));
            echo 'testing!';
      //print_r($result);
			exit();
		break;


	}
}// organizeos_ajax


// set these in child themes for MailChimp API
$apikey = '';
$listid = '';
