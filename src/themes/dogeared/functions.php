<?php

require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
require_once('widgets/class-wp-widget-categories.php');
require_once('widgets/class-wp-widget-recent-posts.php');

// Theme Support
function adv_theme_support(){
    // Featured Imaage Support
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(900, 600);

    // Nav Menus
    register_nav_menus(array(
        'primary' => __('Primary Menu'),
        'footer'  => __('Footer Menu')
    ));
    //Post Format Support
    add_theme_support('post-formats', array('aside', 'gallery', 'link'));
}

add_action('after_setup_theme', 'adv_theme_support');

// Widget Locations
function init_widgets($id)
{
    register_sidebar(array(
        'name' => 'Sidebar',
        'id' => 'sidebar',
        'before_widget' => '<div class="block side-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));
}


// register bootstrap
wp_register_style(
    'my-bootstrap-extension', // handle name
    get_template_directory_uri() . '/css/bootstrap.min.css', // the URL of the stylesheet
    [], // an array of dependent styles
    '1.2', // version number
    'screen'// CSS media type
);

// register normalize
wp_register_style(
    'my-normalize', // handle name
    get_template_directory_uri() . '/css/normalize.css', // the URL of the stylesheet
    [], // an array of dependent styles
    '1.2', // version number
    'screen' // CSS media type
);


// register main
wp_register_style(
    'my-main', // handle name
    get_template_directory_uri() . '/css/main.css', // the URL of the stylesheet
    [], // an array of dependent styles
    '1.2', // version number
    'screen' // CSS media type
);

// if we registered the style before:
wp_enqueue_style( 'my-bootstrap-extension' );

// if we registered the style before:
wp_enqueue_style( 'my-normalize' );

// if we registered the style before:
wp_enqueue_style( 'my-main' );

wp_enqueue_script('bootstrap-js', WP_CONTENT_URL . '/themes/dogeared/js/vendor/bootstrap.js', array('jquery'), '1.0.0', true);
wp_enqueue_script('bs-carousel', WP_CONTENT_URL . '/themes/dogeared/js/vendor/dist/carousel.js', array('jquery'), '1.0.0', true);

/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
    // File does not exist... return an error.
    return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
} else {
    // File exists... require it.
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}

register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'Matter of Act Theatre' ),
) );

function prefix_modify_nav_menu_args( $args ) {
    return array_merge( $args, array(
        'walker' => new WP_Bootstrap_Navwalker(),
    ) );
}
add_filter( 'wp_nav_menu_args', 'prefix_modify_nav_menu_args' );

add_action('widgets_init', 'init_widgets');


function get_top_parent(){
    global $post;
    if($post->post_parent){
        $ancestors = get_post_ancestors($post->ID);
        return $ancestors[0];
    }
    return $post->ID;
}

function page_is_parent(){
    global $post;

    $pages = get_pages('child_of=' .$post->ID);
    return count($pages);
}


//Register Widgets
function wordstrap_register_widgets(){
    register_widget('WP_Widget_Categories_Custom');
    register_widget('WP_Widget_Recent_Posts_Custom');
}
add_action('widgets_init', 'wordstrap_register_widgets');

register_sidebar(array(
    'name' => 'Showcase',
    'id'   => 'showcase',
    'before_widget' => '<div class="showcase">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
));

register_sidebar(array(
    'name' => 'Box 1',
    'id'   => 'box1',
    'before_widget' => '<div class="col-md-4">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
));

register_sidebar(array(
    'name' => 'Box 2',
    'id'   => 'box2',
    'before_widget' => '<div class="col-md-4">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
));

register_sidebar(array(
    'name' => 'Box 3',
    'id'   => 'box3',
    'before_widget' => '<div class="col-md-4">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
));

register_sidebar(array(
    'name' => 'Custom Header Links',
    'id'   => 'custom-header-links',
    'before_widget' => '<ul class="social-media">',
    'after_widget'  => '</uk>',
    'before_title'  => '',
    'after_title'   => ''
));

register_sidebar(array(
    'name' => 'Call to action',
    'id'   => 'call-to-action',
    'before_widget' => '<span>',
    'after_widget'  => '</span>',
    'before_title'  => '',
    'after_title'   => ''
));

register_sidebar(array(
    'name' => 'Footer Call to action',
    'id'   => 'footer-call-to-action',
    'before_widget' => '<span>',
    'after_widget'  => '</span>',
    'before_title'  => '',
    'after_title'   => ''
));

register_sidebar(array(
    'name' => 'Custom Footer Links',
    'id'   => 'custom-footer-links',
    'before_widget' => '<ul class="social-media">',
    'after_widget'  => '</ul>',
    'before_title'  => '',
    'after_title'   => ''
));

register_sidebar(array(
    'name' => 'Featured Content',
    'id'   => 'featured-content',
    'before_widget' => '<div class="col-12 featured-content">',
    'after_widget'  => '</div>',
    'before_title'  => '',
    'after_title'   => ''
));

function dogeared_copyright() {
    global $wpdb;
    $copyright_dates = $wpdb->get_results("
SELECT
YEAR(min(post_date_gmt)) AS firstdate,
YEAR(max(post_date_gmt)) AS lastdate
FROM
$wpdb->posts
WHERE
post_status = 'publish'
");
    $output = '';
    if($copyright_dates) {
        $copyright = "&copy; Toby Harris: " . $copyright_dates[0]->firstdate;
        if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
            $copyright .= '-' . $copyright_dates[0]->lastdate;
        }
        $output = $copyright;
    }
    return $output;
}

add_filter( 'widget_text', 'shortcode_unautop');
add_filter( 'widget_text', 'do_shortcode');

add_filter( 'the_excerpt', 'shortcode_unautop');
add_filter( 'the_excerpt', 'do_shortcode');

add_filter( 'term_description', 'shortcode_unautop');
add_filter( 'term_description', 'do_shortcode' );

add_filter( 'comment_text', 'shortcode_unautop');
add_filter( 'comment_text', 'do_shortcode' );

add_theme_support( 'post-thumbnails' );

function adv_set_excerpt_length(){
    return 50;
}

add_filter('excerpt_length', 'adv_set_excerpt_length');
