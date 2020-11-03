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

//[socialmedia]
function socialmedia_func( $atts ){

    ob_start();

    get_template_part('shortcode/socialmedia');

    return ob_get_clean();
}
add_shortcode( 'socialmedia', 'socialmedia_func' );

//[section name=experience]
function section_func( $atts ){

    ob_start();

 
    // The Query
    $args = array(
        'post_type'=>'section',
        'name'=>$atts['name'],
    );
    $the_query = new WP_Query( $args );
        
    // The Loop
    while ( $the_query->have_posts() ) {
        $the_query->the_post();

        $suffix = 'default';

        //check section for type
        $types = get_the_terms(get_the_ID(),'type');

        if($types != false){

            $type = $types[0];
            $slug = $type->slug;

            if(locate_template('partials/section/content-type-'.$slug.'.php')){
            $suffix = 'type-'.$slug;
            }
            

        }

        //check section by section-slug
        $section_slug = get_post_field('post_name');
        if(locate_template('partials/section/content-'.$section_slug.'.php')){
            $suffix = $section_slug;
        }

        get_template_part('partials/section/content', $suffix);


    }
    
    /* Restore original Post Data */
    wp_reset_postdata();
    
    return ob_get_clean();
}
add_shortcode( 'section', 'section_func' );

?>