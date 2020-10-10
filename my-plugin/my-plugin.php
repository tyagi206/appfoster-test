<?php
/**
 * @package Hello_Dolly
 * @version 1.7.2
 */
/*
Plugin Name: My Plugin
Plugin URI: 
Description: test plugin
Author: 
Version: 
Author URI: 
*/

function show_table( $atts ){ ?>
    <table id="myTable">
	    <tr>
	        <th>name</th>
	        <th>species</th>
	        <th>foods</th>
	    </tr>
	</table>
<?php
}
add_shortcode( 'show_data', 'show_table' );

add_filter( 'template_include', 'appfoster_page_template', 99 );

function appfoster_page_template( $template ) {
    $file_name = 'template-test.php';

    $url_path = trim(parse_url(add_query_arg(array()), PHP_URL_PATH), '/');
    if ( $url_path === 'berk/appfoster/test' ) {
        
        $template = dirname( __FILE__ ) . '/templates/' . $file_name;
    }

    return $template;
}


function appfoster_enqueue_script() {   

	wp_enqueue_style( 'appfoster-css', plugin_dir_url( __FILE__ ) . 'assets/css/layout.css' );

    wp_enqueue_script( 'appfoster-script', plugin_dir_url( __FILE__ ) . 'assets/js/script.js' );
}
add_action('wp_enqueue_scripts', 'appfoster_enqueue_script');