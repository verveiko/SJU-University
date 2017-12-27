<?php
/**
 * My First Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package My_First_Theme
 */

if ( ! function_exists( 'my_first_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function my_first_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on My First Theme, use a find and replace
		 * to change 'my-first-theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'my-first-theme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'my-first-theme' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'my_first_theme_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'my_first_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function my_first_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'my_first_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'my_first_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function my_first_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'my-first-theme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'my-first-theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'my_first_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function my_first_theme_scripts() {
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css' );
    wp_enqueue_style( 'my-first-theme-style', get_stylesheet_uri() );
    wp_enqueue_style( 'your-theme-custom-style', get_template_directory_uri() . '/css/custom.css');
	
    wp_enqueue_script( 'jquery-js', 'http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', array(), '20160804', true );
    wp_enqueue_script( 'bootstrap-js' , get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery-js'), '20160804', true );
	wp_enqueue_script( 'my-first-theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
    
    if ( is_front_page() ){
    wp_enqueue_style( 'slick-css', get_template_directory_uri().'/js/third-party/slick/slick.css');
    wp_enqueue_style( 'slick-css-theme', get_template_directory_uri().'/js/third-party/slick/slick-theme.css');
    wp_enqueue_script( 'slick-js', get_template_directory_uri().'/js/third-party/slick/slick.min.js', array('jquery'), '20170817', true);
    wp_enqueue_script( 'front-page', get_template_directory_uri().'/js/front-page.js', array('slick-js'), '20170817', true);
    } 

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'my_first_theme_scripts' );
require_once('wp-bootstrap-navwalker.php');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}




function create_post_type() {
  register_post_type( 'student',
    array(
      'labels' => array(
        'name' => __( 'Students' ),
        'singular_name' => __( 'Student' )
      ),
      'public' => true,
      'has_archive' => true,
      'menu_icon' => 'dashicons-heart',
      'supports' => array( 'title', 'editor', 'thumbnail')
    )
  );

    register_post_type( 'staff',
        array(
          'labels' => array(
            'name' => __( 'Staff' ),
            'singular_name' => __( 'Staff' )
          ),
          'public' => true,
          'has_archive' => true,
          'menu_icon' => 'dashicons-heart',
          'supports' => array( 'title', 'editor')
        )
    );
}
add_action( 'init', 'create_post_type' );


function project_register_taxonomies() {
    $labels = array(
        'name'              => _x( 'Student Programs', 'taxonomy general name' ),
        'singular_name'     => _x( 'Student Program', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Student Programs' ),
        'all_items'         => __( 'All Student Programs' ),
        'parent_item'       => __( 'Parent Student Program' ),
        'parent_item_colon' => __( 'Parent Student Program:' ),
        'edit_item'         => __( 'Edit Student Program' ),
        'view_item'         => __( 'View Student Program' ),
        'update_item'       => __( 'Update Student Program' ),
        'add_new_item'      => __( 'Add New Student Program' ),
        'new_item_name'     => __( 'New Student Program Name' ),
        'menu_name'         => __( 'Student Program' ),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menu'  => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'student-programs' ),
    );
    register_taxonomy( 'student-program', array( 'student' ), $args );
    
    $staff_labels = array(
        'name'              => _x( 'Staff Department', 'taxonomy general name' ),
        'singular_name'     => _x( 'Staff Department', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Staff Department' ),
        'all_items'         => __( 'All Staff Department' ),
        'parent_item'       => __( 'Parent Staff Department' ),
        'parent_item_colon' => __( 'Parent Staff Department:' ),
        'edit_item'         => __( 'Edit Staff Department' ),
        'view_item'         => __( 'View Staff Department' ),
        'update_item'       => __( 'Update Staff Department' ),
        'add_new_item'      => __( 'Add Staff Department' ),
        'new_item_name'     => __( 'New Staff Department Name' ),
        'menu_name'         => __( 'Staff Department' ),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $staff_labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menu'  => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'staff-department' ),
    );
    register_taxonomy( 'staff-department', array( 'staff' ), $args );

 }
 add_action( 'init', 'project_register_taxonomies');

// Order custom post types alphabetically
function owd_post_order( $query ) {
    if ( $query->is_post_type_archive('student') && $query->is_main_query() ) {
    $query->set( 'orderby', 'title' );
    $query->set( 'order', 'ASC' );
    }
}
add_action( 'pre_get_posts', 'owd_post_order' );

// Excerpt Link

// Excerpt Length

function new_excerpt_more($more) {
       global $post;
    if ($post->post_type == 'student') {
	return ' <a class="moretag" href="'. get_permalink($post->ID) . '">Read more about the student...</a>';
    } else {
    return ' <a class="moretag" href="'. get_permalink($post->ID) . '">Read more...</a>';
    }
}
add_filter('excerpt_more', 'new_excerpt_more');

function isacustom_excerpt_length($length) {
    global $post;
    if ($post->post_type == 'student') {
    return 25;
    } else {
    return 50;
    }
}
    add_filter('excerpt_length', 'isacustom_excerpt_length');

// Thumbnails

add_image_size( 'portrait', 200, 300 );
add_image_size( 'slider', 242, 200 );

// BREADCRUMBS

function dimox_breadcrumbs() {

  $text['home'] = 'Home'; 
  $text['category'] = '%s'; 
  $text['search'] = 'Search results: "%s"'; 
  $text['tag'] = 'Posts with tag "%s"'; 
  $text['author'] = 'Author: %s'; 
  $text['404'] = 'Error 404'; 
  $text['page'] = 'Page %s'; 
  $text['cpage'] = 'Comments %s';
    
    

    
  $wrap_before = '<div id="bc" class="breadcrumbs">'; 
  $wrap_after = '</div><!-- .breadcrumbs -->'; 
  $sep = '›'; 
  $sep_before = '<span class="sep">'; 
  $sep_after = '</span>'; 
  $show_home_link = 1; 
  $show_on_home = 0; 
  $show_current = 1; 
  $before = '<span class="current">'; 
  $after = '</span>';
  
  

  global $post;
  $home_url = home_url('/');
  $link_before = '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
  $link_after = '</span>';
  $link_attr = ' itemprop="item"';
  $link_in_before = '<span itemprop="name">';
  $link_in_after = '</span>';
  $link = $link_before . '<a href="%1$s"' . $link_attr . '>' . $link_in_before . '%2$s' . $link_in_after . '</a>' . $link_after;
  $frontpage_id = get_option('page_on_front');
  $parent_id = ($post) ? $post->post_parent : '';
  $sep = ' ' . $sep_before . $sep . $sep_after . ' ';
  $home_link = $link_before . '<a href="' . $home_url . '"' . $link_attr . ' class="home">' . $link_in_before . $text['home'] . $link_in_after . '</a>' . $link_after;

  if (is_home() || is_front_page()) {

    if ($show_on_home) echo $wrap_before . $home_link . $wrap_after;

  } else {

    echo $wrap_before;
    if ($show_home_link) echo $home_link;

    if ( is_category() ) {
      $cat = get_category(get_query_var('cat'), false);
      if ($cat->parent != 0) {
        $cats = get_category_parents($cat->parent, TRUE, $sep);
        $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
        $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
        if ($show_home_link) echo $sep;
        echo $cats;
      }
      if ( get_query_var('paged') ) {
        $cat = $cat->cat_ID;
        echo $sep . sprintf($link, get_category_link($cat), get_cat_name($cat)) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_current) echo $sep . $before . sprintf($text['category'], single_cat_title('', false)) . $after;
      }

    } elseif ( is_search() ) {
      if (have_posts()) {
        if ($show_home_link && $show_current) echo $sep;
        if ($show_current) echo $before . sprintf($text['search'], get_search_query()) . $after;
      } else {
        if ($show_home_link) echo $sep;
        echo $before . sprintf($text['search'], get_search_query()) . $after;
      }

    } elseif ( is_day() ) {
      if ($show_home_link) echo $sep;
      echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $sep;
      echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F'));
      if ($show_current) echo $sep . $before . get_the_time('d') . $after;

    } elseif ( is_month() ) {
      if ($show_home_link) echo $sep;
      echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'));
      if ($show_current) echo $sep . $before . get_the_time('F') . $after;

    } elseif ( is_year() ) {
      if ($show_home_link && $show_current) echo $sep;
      if ($show_current) echo $before . get_the_time('Y') . $after;

    } elseif ( is_single() && !is_attachment() ) {
      if ($show_home_link) echo $sep;
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        printf($link, $home_url . $slug['slug'] . '/', $post_type->labels->singular_name);
        if ($show_current) echo $sep . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, $sep);
        if (!$show_current || get_query_var('cpage')) $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
        $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
        echo $cats;
        if ( get_query_var('cpage') ) {
          echo $sep . sprintf($link, get_permalink(), get_the_title()) . $sep . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after;
        } else {
          if ($show_current) echo $before . get_the_title() . $after;
        }
      }

    // custom post type
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      if ( get_query_var('paged') ) {
        echo $sep . sprintf($link, get_post_type_archive_link($post_type->name), $post_type->label) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_current) echo $sep . $before . $post_type->label . $after;
      }

    } elseif ( is_attachment() ) {
      if ($show_home_link) echo $sep;
      $parent = get_post($parent_id);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      if ($cat) {
        $cats = get_category_parents($cat, TRUE, $sep);
        $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
        echo $cats;
      }
      printf($link, get_permalink($parent), $parent->post_title);
      if ($show_current) echo $sep . $before . get_the_title() . $after;

    } elseif ( is_page() && !$parent_id ) {
      if ($show_current) echo $sep . $before . get_the_title() . $after;

    } elseif ( is_page() && $parent_id ) {
      if ($show_home_link) echo $sep;
      if ($parent_id != $frontpage_id) {
        $breadcrumbs = array();
        while ($parent_id) {
          $page = get_page($parent_id);
          if ($parent_id != $frontpage_id) {
            $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
          }
          $parent_id = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        for ($i = 0; $i < count($breadcrumbs); $i++) {
          echo $breadcrumbs[$i];
          if ($i != count($breadcrumbs)-1) echo $sep;
        }
      }
      if ($show_current) echo $sep . $before . get_the_title() . $after;

    } elseif ( is_tag() ) {
      if ( get_query_var('paged') ) {
        $tag_id = get_queried_object_id();
        $tag = get_tag($tag_id);
        echo $sep . sprintf($link, get_tag_link($tag_id), $tag->name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_current) echo $sep . $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
      }

    } elseif ( is_author() ) {
      global $author;
      $author = get_userdata($author);
      if ( get_query_var('paged') ) {
        if ($show_home_link) echo $sep;
        echo sprintf($link, get_author_posts_url($author->ID), $author->display_name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_home_link && $show_current) echo $sep;
        if ($show_current) echo $before . sprintf($text['author'], $author->display_name) . $after;
      }

    } elseif ( is_404() ) {
      if ($show_home_link && $show_current) echo $sep;
      if ($show_current) echo $before . $text['404'] . $after;

    } elseif ( has_post_format() && !is_singular() ) {
      if ($show_home_link) echo $sep;
      echo get_post_format_string( get_post_format() );
    }

    echo $wrap_after;

  }
}