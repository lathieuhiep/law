<?php

global $law_options;

$law_on_off_share_single = $law_options['law_on_off_share_single'];

?>

<div id="post-<?php the_ID() ?>" <?php post_class( 'site-post-single-item' ); ?>>
    <?php law_post_formats(); ?>

    <div class="site-post-content">
        <h2 class="site-post-title">
            <?php the_title(); ?>
        </h2>

        <?php law_post_meta(); ?>

        <div class="site-post-excerpt">
            <?php
            the_content();

            law_link_page();
            ?>
        </div>

        <div class="site-post-cat-tag">

            <?php if( get_the_category() != false ): ?>

                <p class="site-post-category">
                    <?php
                    esc_html_e('Category: ','law');
                    the_category( ' ' );
                    ?>
                </p>

            <?php

            endif;

            if( get_the_tags() != false ):

            ?>

                <p class="site-post-tag">
                    <?php
                    esc_html_e( 'Tag: ','law' );
                    the_tags('',' ');
                    ?>
                </p>

            <?php endif; ?>

        </div>
    </div>

    <?php

    if ( $law_on_off_share_single == 1 || $law_on_off_share_single == null ) :

        law_post_share();

    endif;

    ?>
</div>

<?php
law_comment_form();

get_template_part( 'template-parts/post/inc','related-post' );




