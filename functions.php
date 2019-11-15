<?php

// Habilitando Thumbnails

add_theme_support( 'post-thumbnails');

// Cadastro de Banners

add_action('init', 'type_post_banners');
function type_post_banners() {
    $labels = array(
        'name' => _x('Banners', 'post type general name'),
        'singular_name' => _x('Banner', 'post type singular name'),
        'add_new' => _x('Adicionar Novo', 'Novo item'),
        'add_new_item' => __('Novo Item'),
        'edit_item' => __('Editar Item'),
        'new_item' => __('Novo Item'),
        'view_item' => __('Ver Item'),
        'search_items' => __('Procurar Itens'),
        'not_found' =>  __('Nenhum registro encontrado'),
        'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
        'parent_item_colon' => '',
        'menu_name' => 'Banners'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => null,
        'menu_icon' => 'dashicons-align-right',
        'supports' => array('title','thumbnail')
    );
    register_post_type( 'banners' , $args );
}

add_action('admin_menu', 'add_global_custom_options');
function add_global_custom_options()
{
    add_options_page('Cadastros Globais', 'Cadastros Globais', 'manage_options', 'functions','global_custom_options');
}

function global_custom_options()
{
    ?>
    <div class="wrap">
        <h2>Página de Opções</h2>
            <form method="post" action="options.php">
                <?php wp_nonce_field('update-options') ?>
                <p>
                    <strong>Nome no facebook:</strong><br/>
                    <input type="text" name="facebook_nome" style="width: 50%;" placeholder="meufacebook" value="<?php echo get_option('facebook_nome'); ?>" />
                </p>
                <p>
                    <strong>Nome do instagram:</strong><br/>
                    <input type="text" name="instagram_nome" style="width: 50%;" placeholder="meuinstagram" value="<?php echo get_option('instagram_nome'); ?>" />
                </p>
                <p>
                    <strong>Número de telefone:</strong><br/>
                    <input type="text" name="numero_telefone" style="width: 50%;" placeholder="(00) 0 0000-0000" value="<?php echo get_option('numero_telefone'); ?>" />
                </p>
                <p>
                    <strong>E-mail:</strong><br/>
                    <input type="text" name="email" style="width: 50%;" placeholder="meunome@dominio.com.br" value="<?php echo get_option('email'); ?>" />
                </p>
                <p>
                    <strong>Iframe do Google Maps</strong><br/>
                    <input type="text" name="maps" style="width: 50%;" placeholder="Cole aqui apenas o link, depois de iframe src='" value="<?php echo get_option('maps'); ?>" />
                </p>
                <p><input type="submit" name="Submit" value="Salvar Opções" /></p>
                <input type="hidden" name="action" value="update" />
                <input type="hidden" name="page_options" value="facebook_nome, instagram_nome, numero_telefone, email, maps" />
            </form>
    </div>
    <?php
}
?>