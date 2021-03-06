<?php

function load_css() {

    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all' );
    wp_enqueue_style('bootstrap');

    wp_register_style('main', get_template_directory_uri() . '/css/main.css', array(), false, 'all' );
    wp_enqueue_style('main');

}

add_action('wp_enqueue_scripts', 'load_css');


function load_js() {

    wp_enqueue_script('jquery');
    wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery', false, true);
    wp_enqueue_script('bootstrap');
}

add_action('wp_enqueue_scripts', 'load_js');

//Theme options

add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('widgets');



//Menus
register_nav_menus(
    array(
        'top-menu' => 'Top Menu Location',
        'mobile-menu' => 'Mobile Menu Location',
        'footer-menu' => 'Footer Menu Location',
    )
);


//Custom Image Size / FALSE means no hard crop
add_image_size('blog-large', 800, 400, false);
add_image_size('blog-small', 200, 100, true);


//Register sidebars
function my_sidebars()
{
    register_sidebar(

        array(
            'name' => 'Page Sidebar',
            'id' => 'page-sidebar',
            'before-title' => '<h4 class="widget-title">',
            'after_title' => '</h4>',
        )
    );

    register_sidebar(

        array(
            'name' => 'blog Sidebar',
            'id' => 'blog-sidebar',
            'before-title' => '<h4 class="widget-title">',
            'after_title' => '</h4>',
        )
    );

    register_sidebar(
        array(
            'name' => 'Video',
            'id' => 'frontpage-video',
            'before-title' => '<h4 class="widget-title">',
            'after_title' => '</h4>',
        )
    );

    register_sidebar(
        array(
            'name' => 'Product Categories Dropdown',
            'id' => 'product-categories',
            'before-title' => '<h4 class="widget-title">',
            'after_title' => '</h4>',
        )
        );

    register_sidebar(
        array(
            'name' => 'Cart Sidebar',
            'id' => 'cart-sidebar',
            'before-title' => '<h4 class="widget-title">',
            'after-title' => '</h4>',
            )
        );

    register_sidebar(
        array(
            'name' => 'Woocommerce Search Bar',
            'id' => 'woocommerce-search-bar',
            'before-title' => '<h4 class="widget-title">',
            'after-title' => '</h4>',
        )
    );

    register_sidebar(
        array(
            'name' => 'Product Filters',
            'id' => 'product-filters',
            'before-title' => '<h4 class="widget-title">',
            'after-title' => '</h4>',
        )
    );
}

add_action('widgets_init', 'my_sidebars');


function my_first_post_type()
{
    $args = array(
        'labels' => array(
            'name' => 'Cars',
            'singular_name' => 'Car',
        ),
        'hierarchical' => true,
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        // 'rewrite' => array('slug' => 'my-cars'),
        // 'menu-icon' => 'find from wordpress site',
    );
    register_post_type('cars', $args);
}
add_action('init', 'my_first_post_type');

function my_first_taxonomy()
{
    $args = array(
        'labels' => array(
            'name' => 'Brands',
            'singular_name' => 'Brand',
        ),
        'public' => true,
        'hierarchical' => true,
    );
    register_taxonomy('brands', array('cars'), $args);
}

add_action('init', 'my_first_taxonomy');


function mytheme_add_woocommerce_support() {
    add_theme_support('woocommerce');
}

add_action('after_setup_theme', 'mytheme_add_woocommerce_support');

add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 3; // 3 products per row
	}
}
?>
