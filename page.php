<?php get_header(); ?>

    <div class="mt100"></div>

<?php
// Start the loop.
while ( have_posts() ) : the_post(); ?>

    <div class="container">
        <div class="col-lg-8 col-lg-offset-2 col-lg-12">
            <h1 class="text-center"><?php the_title(); ?></h1>
            <div class="mt30"></div>
            <div class="conteudo">
                <?php the_content(); ?>
            </div>
        </div>
    </div>

<?php endwhile; ?>

<div class="mt100"></div>
<?php get_footer(); ?>
