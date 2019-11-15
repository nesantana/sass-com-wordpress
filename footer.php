
<?php wp_footer(); ?>

<iframe src="<?php echo get_option('maps')?>" width="100%" height="240" frameborder="0" style="border:0" allowfullscreen></iframe>


<script>
    $(document).ready(function(){
        $('.fancybox').fancybox({
            padding: 0
        });
    });
</script>

</body>
</html>
