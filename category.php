<?php get_header(); ?>
    <div class="mt40"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <?php
                $categoria_slug = '';
                $categoria_nome = '';
                $contador2 = 0;
                while ( have_posts() ) : the_post(); ?>
                    <?php
                    $contador2++;
                    $cur_cat = get_cat_ID( single_cat_title("",false) ); //get the cat id
                    $category = &get_category($cur_cat);
                    $categoria_slug = $category->slug;
                    if($contador2 == 1) {
                        $categoria_nome = $category->name;
                    } ?>

                <?php endwhile; ?>
            </div>
            <div class="col-lg-3 col-xl-12">
                <div class="pai-categoria">
                    <i class="fa fa-bars"></i>
                    TODOS OS ANIMAIS
                </div>

                <?php
                global $ancestor;

                $childcats = get_categories('orderby=name&child_of=1&show_count=1');

                foreach ($childcats as $childcat) {
                    if (cat_is_ancestor_of($ancestor, $childcat->cat_ID) == false){
                        ?>
                        <div class="mt20"></div>
                        <a class="categorias-listagem <?php echo ($childcat->slug == $categoria_slug ? 'selecionada' : ''); ?>" href="<?php echo get_category_link($childcat->cat_ID); ?>">
                            <i class="fa fa-paw"></i> <?php echo $childcat->cat_name; ?>
                            <div class="seta">></div>
                        </a>
                        <?php
                        $ancestor = $childcat->cat_ID;
                    }
                }
                wp_reset_postdata();
                ?>

                <div class="mt40"></div>

                <div class="pai-categoria">
                    <i class="fa fa-bars"></i>
                    TODAS AS MARCAS
                </div>

                <?php
                global $ancestor;

                $childcats = get_categories('orderby=name&child_of=2&show_count=1');

                foreach ($childcats as $childcat) {
                    if (cat_is_ancestor_of($ancestor, $childcat->cat_ID) == false){
                        ?>
                        <div class="mt20"></div>
                        <a class="categorias-listagem <?php echo ($childcat->slug == $categoria_slug ? 'selecionada' : ''); ?>" href="<?php echo get_category_link($childcat->cat_ID); ?>">
                            <i class="fa fa-paw"></i> <?php echo $childcat->cat_name; ?>
                            <div class="seta">></div>
                        </a>
                        <?php
                        $ancestor = $childcat->cat_ID;
                    }
                }
                wp_reset_postdata();
                ?>

                <?php
                $args=array(
                    'orderby' => 'name',
                    'order' => 'ASC'
                );
                $categories=get_categories($args);
                foreach($categories as $category) {
                    echo '<a class="categorias-listagem mt10 '.($category->slug == $categoria_slug ? 'selecionada' : '').'" href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "Ver imóveis em %s" ), $category->name ) . '" ' . '>' . $category->name.'</a>';
                }
                ?>
            </div>
            <div class="col-lg-9 col-xl-12">
                <h1>NOSSOS PRODUTOS</h1>
                <p>Categoria selecionada: <span class="amarelinho"><?php echo $categoria_nome; ?></span></p>
                <div class="row">
                <?php
                $contador = 0;
                while ( have_posts() ) : the_post(); ?>
                    <?php
                        $contador++;
                     ?>

                    <a class="col-lg-4 col-xl-12" href="<?php the_permalink(); ?>">
                        <div class="mt30"></div>
                        <div class="link-noticia">
                            <div class="text-center img-noticia-galeria">
                                <?php the_post_thumbnail(); ?>
                            </div>
                            <div class="mt10"></div>
                            <?php foreach(get_the_category() as $category) { echo '<span class="amarelinho">'.$category->name.'</span>';} ?>
                            <div class="mt10"></div>
                            <div class="line"></div>
                            <div class="mt10"></div>
                            <div class="titulo_noticias"><?php the_title(); ?></div>
                            <div class="mt10"></div>
                            <div class="conteudo escuro">
                                <p><?php echo get_post_meta(get_the_ID(), 'resumo', true) ?></p>
                            </div>
                        </div>
                    </a>
                    <?php
                    if ($contador == 3) { ?>
                        <div class="col-lg-12 col-md-12"></div>
                    <?php } endwhile; ?>
                </div>
            </div>
        </div>
    </div>

<div class="mt100"></div>
<?php get_footer(); ?>
