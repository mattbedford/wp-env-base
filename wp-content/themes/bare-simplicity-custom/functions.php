<?php

namespace BareSimplicity;

if ( function_exists( 'add_theme_support' ) ) {
    /**
     * Essential theme supports
     * */
    include_once( 'includes/supports.php' );
    add_action('after_setup_theme',[Supports::class, 'Register']);
}

add_action('init', function() {
    include_once( 'includes/routes.php' );
    add_action('init', [Routes::class, 'Rewrite']);
    //add_filter('redirect_canonical', [Routes::class, 'UnknownRequest']);
    add_filter('template_include', [Routes::class, 'Template']);
    add_filter('status_header', [Routes::class, 'NoFourOhFour'], 10, 4);
});
