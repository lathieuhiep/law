<?php

    $law_audio = get_post_meta(  get_the_ID() , '_format_audio_embed', true );
    if( $law_audio != '' ):

?>
        <div class="site-post-audio">

            <?php if( wp_oembed_get( $law_audio ) ) : ?>

                <?php echo wp_oembed_get( $law_audio ); ?>

            <?php else : ?>

                <?php echo balanceTags( $law_audio ); ?>

            <?php endif; ?>

        </div>

<?php endif;?>