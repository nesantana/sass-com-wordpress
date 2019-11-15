<?php get_header(); ?>


    <div class="mt100"></div>
<?php
// Start the loop.
while ( have_posts() ) : the_post(); ?>

    <div class="container">
        <div class="col-md-9 col-xs-12">
            <h1><?php the_title(); ?></h1>
            <div class="mt60"></div>
            <?php the_content(); ?>
        </div>
        <div class="col-md-3 col-xs-12">
            <?php get_sidebar(); ?>
        </div>
    </div>

<?php endwhile; ?>
    <div class="mt100"></div>


<?php get_footer(); ?>