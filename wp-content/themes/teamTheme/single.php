<?php


$T_P = get_template_directory_uri();

get_header();
?>



<?php while (have_posts()):the_post(); ?>
    <div class="container">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-4">
                    <?php the_post_thumbnail('medium'); ?>

                </div>
                <div class="col-md-8" >
                    <h2 class="text-left titlePost"><?php the_title(); ?></h2>
                    
                    <div class="movieInfo"><br/>



                        <p> <?php the_taxonomies(); ?></p>

                    </div>
                    <?php the_content(); ?>

                </div>

            </div>
        </div>
        <div class="col-md-2">
            <div class="row sidebar">
                <?php get_sidebar('actors'); ?>
            </div>
            <div class="row sidebar ">
                <?php get_sidebar('director'); ?>
            </div>
        </div>

    <?php endwhile; ?>
</div>

<?php
get_footer();



