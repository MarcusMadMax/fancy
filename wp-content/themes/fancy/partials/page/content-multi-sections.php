  <?php
    $sectionIDs = get_field('sections');

    // The Query
    $args = array(
      'post_type'=>'section',
      'post__in'=>$sectionIDs,
      'orderby'=>'post__in',
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
  
  ?> 
   