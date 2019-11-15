<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

    <link href="https://fonts.googleapis.com/css?family=Rationale&display=swa" rel="stylesheet">

    <link rel="stylesheet" href="<?php bloginfo("template_url"); ?>/assets/css/default.min.css">
    <script src="<?php bloginfo("template_url"); ?>/assets/js/scripts.min.js"></script>
    <script type="text/javascript" src="https://use.fontawesome.com/a4f52dacd1.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/asvd/dragscroll/master/dragscroll.js"></script>

    <?php wp_head(); ?>

</head>
<body>
<header class="dt h100 w-100 text-center">
    <div class="dt-c">
        <a href="/">
            <img src="<?php bloginfo("template_url"); ?>/img/logo.png">
        </a>
        <div class="mt60"></div>
        <div class="menu-n1 hidden-xs hidden-sm">
            <?php wp_nav_menu(array( 'menu' => 'menu'));  ?>
        </div>
    </div>
</header>
<div class="abre">
    <span class="first"></span>
    <span class="meio"></span>
    <span class="last"></span>
</div>
<div class="menu-resp text-center">
    <div class="dt h100 w-100">
        <div class="dt-c">
            <ul id="menu" class="list-unstyled">
                <?php wp_nav_menu(array( 'menu' => 'menu'));  ?>
            </ul>
            <div class="mt100"></div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.abre').click(function(){
            if($(this).hasClass('open')){
                $(this).removeClass('open');
                $('.menu-resp').css({'pointer-events': 'none'}).find('ul').css({'right': '100%'});
            }else{
                $(this).addClass('open');
                $('.menu-resp').css({'pointer-events': 'auto'}).find('ul').css({'right': '0'});
            }
        });

        function h100(){
            $('.h100').css('height', window.innerHeight);
        }h100();
        $(window).load(h100).resize(h100);

    });
</script>
