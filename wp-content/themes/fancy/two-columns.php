<?php /* Template Name: Two columns */ ?>
<?php get_header()?>

    <div class="container-fluid p-0">

    <?php
      	while (have_posts()) :
      		the_post();
         	get_template_part('partials/page/content','two-columns');
   		endwhile;
    ?>


    </div>

<?php get_footer()?>