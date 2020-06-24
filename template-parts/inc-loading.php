<?php

global $law_options;

$law_show_loading = $law_options['law_general_show_loading'] == '' ? '0' : $law_options['law_general_show_loading'];

if(  $law_show_loading == 1 ) :

    $law_loading_url  = $law_options['law_general_image_loading']['url'];
?>

    <div id="site-loadding" class="d-flex align-items-center justify-content-center">

        <?php  if( $law_loading_url !='' ): ?>

            <img class="loading_img" src="<?php echo esc_url( $law_loading_url ); ?>" alt="<?php esc_attr_e('loading...','law') ?>"  >

        <?php else: ?>

            <img class="loading_img" src="<?php echo esc_url(get_theme_file_uri( '/images/loading.gif' )); ?>" alt="<?php esc_attr_e('loading...','law') ?>">

        <?php endif; ?>

    </div>

<?php endif; ?>