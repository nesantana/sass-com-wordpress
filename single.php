<?php get_header(); ?>


<?php
// Start the loop.
while ( have_posts() ) : the_post(); ?>

    <div class="mt100"></div>
    <div class="container campo-texto dentro-produtos">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="foto-post" style="background: url(<?php echo the_post_thumbnail_url(); ?>) no-repeat center center;"></div>
                <div class="mt80"></div>
                <h2>INFORMAÇÕES DO PRODUTO</h2>
                <div class="mt40"></div>
                <?php the_content(); ?>
                <div class="mt30"></div>
                <div class="mt100"></div>
            </div>
            <div class="col-lg-6 col-md-12">
                <h1><?php the_title(); ?></h1>
                <div class="mt10"></div>
                <span class="escrita-post-top">
                    QUANTIDADE: <?php echo get_post_meta(get_the_ID(), 'quantidade', true) ?>
                </span>
                <span class="escrita-post-top">
                    ANIMAL: <?php echo get_post_meta(get_the_ID(), 'animal', true) ?>
                </span>
                <span class="escrita-post-top">
                    SABOR: <?php echo get_post_meta(get_the_ID(), 'sabor', true) ?>
                </span>
                <div class="mt20"></div>
                <h5>DESCRIÇÃO DO PRODUTO</h5>
                <div class="mt10"></div>
                <p class="grande"><?php echo get_post_meta(get_the_ID(), 'descricao_do_produto', true) ?></p>
                <div class="mt25"></div>
                <div class="line"></div>
                <div class="mt25"></div>
                <h5>PARA ANIMAIS DE.</h5>
                <div class="mt10"></div>
                <p class="grande"><?php echo get_post_meta(get_the_ID(), 'para_animais_de', true) ?></p>
                <div class="mt35"></div>
                <a class="botao-azul-grande" href="/contato">EU QUERO ESSE PRODUTO</a>

            </div>
        </div>
    </div>
<?php endwhile; ?>
<div class="mt100"></div>
<div class="banners_topo text-center">
    <ul class="list-unstyled">
        <?php
        $newsArgs = array( 'post_type' => 'banners', 'posts_per_page' => 99);

        $newsLoop = new WP_Query( $newsArgs );

        while ( $newsLoop->have_posts() ) : $newsLoop->the_post();

            if(get_post_meta(get_the_ID(), 'tipo_do_banner', true) == 'tipo_02') { ?>

                <li>
                    <a href="<?php echo get_post_meta(get_the_ID(), 'link', true) ?>" <?php echo (get_post_meta(get_the_ID(), 'nova_aba', true) == 1 ? 'target="_blank"': ''); ?>>
                        <?php the_post_thumbnail(); ?>
                    </a>
                </li>

            <?php } endwhile; ?>

    </ul>
</div>
<div class="mt100"></div>

<?php get_footer(); ?>
