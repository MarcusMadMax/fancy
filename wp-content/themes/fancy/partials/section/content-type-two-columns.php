<?php
    $slug = get_post_field('post_name')
?>
<section class="resume-section p-3 p-lg-5 d-flex flex-column" id="<?php echo $slug?>">
    <div class="my-auto">
        <h2 class="mb-5"><?php the_title()?></h2>
        <div class="row">
        <div class="col-8"><?php the_content()?></div>
        <div class="col-4"><?php the_field('extra')?></div>
        </div>
    </div>
</section>

<hr class="m-0">