<?php 
function moza_blog_custom_css() {
    wp_enqueue_style('moza-blog-custom', get_stylesheet_directory_uri() . '/assets/css/custom-style.css' );
    $moza_blog_theme_color = get_theme_mod('moza_blog_theme_color','#ff5671'); 
    $moza_blog_secondary_color = get_theme_mod('moza_blog_secondary_color','#ffa21e'); 
    $moza_blog_custom_css = '';
    $moza_blog_custom_css .= '
    a.title-animation-underline  {
        background-image: linear-gradient(90deg,'.esc_attr( $moza_blog_theme_color ).','.esc_attr( $moza_blog_theme_color ).') !important;
    }

    a:hover, 
    .mainmenu li:hover a, 
    .mainmenu li.active a, 
    .site-title a:hover,
    .post-wrapper .title a:hover,
    .comments-link a:hover, 
    .widget-area .widget a:hover,
    .post-author-wrapper a:hover,
    .cat-links a:hover,
    .blog-title span {
        color: '.esc_attr( $moza_blog_theme_color ).' ;
    }
    ';
    $moza_blog_custom_css .= '
    .post-wrapper,
    .widget {
        border-color: '.esc_attr( $moza_blog_secondary_color ).';
    } 
    ';
    
    
    wp_add_inline_style( 'moza-blog-custom', $moza_blog_custom_css );
}
add_action( 'wp_enqueue_scripts', 'moza_blog_custom_css' );