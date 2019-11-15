<?php
get_header();
?>
<div class="mt100"></div>
    <div class="container search">
        <?php
        $search = array(
            's' => $_GET["s"]
        );
        echo "<input type='hidden' id='hideSearch' value='".$_GET["s"]."'>";
        if( $_GET["posttype"] ){
            $search["post_type"] = $_GET["posttype"];
            echo "<input type='hidden' id='hidePostType' value='".$_GET["posttype"]."'>";
        }
        $query = new WP_Query( $search );
        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                $query->the_post();

                ?>
                <a href="<?php the_permalink(); ?>" class="center-block w-100 noticia-destaque">
                    <h4><?php the_title() ?></h4>
                </a>
                <?php
            }
        }
        ?>
    </div>
<div class="mt100"></div>
<?php
get_footer();
?>