<?php get_header()?>

    <div class="container-fluid p-0">
    <h3>Your search result</h3>
    <?php
    
      	while (have_posts()) :
      		the_post();
         	get_template_part('partials/page/content','search');
   		endwhile;
    ?>

    </div>

<?php get_footer()?>