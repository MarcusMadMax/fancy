<?php
  $slug = get_post_field('post_name')
?>
<section class="resume-section p-3 p-lg-5 d-flex d-column" id="<?php echo $slug?>">
  <div class="my-auto">
    <h1 class="mb-0"><?php the_field('firstname')?>
      <span class="text-primary"><?php the_field('lastname')?></span>
    </h1>
    <div class="subheading mb-5"> <?php the_field('address')?>
      <a href="mailto:name@email.com">name@email.com</a>
    </div>
    <p class="lead mb-5"><?php the_field('summary')?></p>

    <?php echo do_shortcode('[socialmedia]')?>
  </div>
</section>

<hr class="m-0">