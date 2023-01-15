<?php
//adding css and js files
function theme_setup(){
    //wp_enqueue_style('google-fonts','//kit.fontawesome.com/7b3db13e0c.js' );
    wp_enqueue_style("style",get_stylesheet_uri(), NULL, microtime());
    wp_enqueue_script("main",get_theme_file_uri('/js/main.js'), NULL, microtime(), true);

}


add_action('wp_enqueue_scripts','theme_setup');
 

