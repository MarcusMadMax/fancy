<?php

function register_resources(){
	//register a menu
    register_nav_menu('main-menu','Main Menu');
    
    //register section
    $args = array(
        'public' => true,
        'label'  => 'Sections'
    );
    register_post_type( 'section', $args );

    //register section taxonomy
    $args = array(
        'label'        => 'Type',
        'public'       => true,
        'hierarchical' => true,
        'show_in_nav_menus' => true
    );
    register_taxonomy('type','section',$arg);

    //register experience
    $args = array(
        'public' => true,
        'label'  => 'Experience'
    );
    register_post_type( 'experience', $args );


}

add_action('init','register_resources');

function add_class_to_li( $classes, $item, $args, $depth ) { 
	$classes[] = 'nav-item';
	return $classes;
}
add_filter( 'nav_menu_css_class', 'add_class_to_li', 10, 4 ); 


function add_class_to_anchors( $atts ) {
    $atts['class'] = 'nav-link';
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_class_to_anchors', 10 );

?>