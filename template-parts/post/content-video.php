<?php

$law_video_post = get_post_meta(  get_the_ID() , 'law_video_post', true );

if ( !empty( $law_video_post ) ):

?>

    <div class="site-post-video">
        <?php echo wp_oembed_get( $law_video_post ); ?>
    </div>

<?php endif;?>