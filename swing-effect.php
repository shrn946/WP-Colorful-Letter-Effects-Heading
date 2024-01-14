<?php
/*
Plugin Name:WP Colorful Letter Effects Heading
Description: Add a s WP Colorful Letter Effect to your WordPress site. [swing_font font_size="10vh"]Love Bites[/swing_font]
Version: 1.0
Author: Hassan Naqvi
*/

// Enqueue scripts and styles
function swing_font_effect_enqueue_scripts() {
    // Add Charming library
    wp_enqueue_script('charming-min', plugins_url('/js/charming.min.js', __FILE__), array('jquery'), null, true);

    // Add Anime library
    wp_enqueue_script('anime-min', plugins_url('/js/anime.min.js', __FILE__), array('jquery'), null, true);
	
	    // Add demo scripts
    wp_enqueue_script('demo', plugins_url('/js/demo.js', __FILE__), array('jquery', 'charming-min', 'anime-min'), null, true);
    wp_enqueue_script('demo4', plugins_url('/js/demo4.js', __FILE__), array('jquery', 'charming-min', 'anime-min'), null, true);

    // Add demo styles
    wp_enqueue_style('demo-css', plugins_url('/css/demo.css', __FILE__), array(), null);

    // Add swing font styles
    wp_enqueue_style('swing-css', plugins_url('/css/swing.css', __FILE__), array(), null);
}

// Hook into WordPress
add_action('wp_enqueue_scripts', 'swing_font_effect_enqueue_scripts');


function swing_font_shortcode($atts, $content = null) {
    // Parse shortcode attributes
    $atts = shortcode_atts(
        array(
            'font_size' => '16px', // Default font size
        ),
        $atts,
        'swing_font'
    );

    // Sanitize font size attribute
    $font_size = sanitize_text_field($atts['font_size']);

    // Output HTML with the provided content and font size
    $output = '<section class="con">';
    $output .= '<h2 class="word word--swing" style="font-size: ' . esc_attr($font_size) . ';">';
    $output .= esc_html($content);
    $output .= '</h2>';
    $output .= '</section>';

    return $output;
}

// Register the shortcode
add_shortcode('swing_font', 'swing_font_shortcode');
