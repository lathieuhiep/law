<?php
get_header();

global $law_options;

$law_title = $law_options['law_404_title'];
$law_content = $law_options['law_404_editor'];
$law_background = $law_options['law_404_background']['id'];

?>

<div class="site-error text-center">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-6">
                <figure class="site-error__image404">
                    <?php
                    if( !empty( $law_background ) ):
                        echo wp_get_attachment_image( $law_background, 'full' );
                    else:
                        echo'<img src="'.esc_url( get_theme_file_uri( '/images/404.jpg' ) ).'" alt="'.get_bloginfo('title').'" />';
                    endif;
                    ?>
                </figure>
            </div>

            <div class="col-md-6">
                <h1 class="site-title-404">
                    <?php
                    if ( $law_title != '' ):
                        echo esc_html( $law_title );
                    else:
                        esc_html_e( 'Awww...Do Not Cry', 'law' );
                    endif;
                    ?>
                </h1>

                <div id="site-error-content">
                    <?php
                    if ( $law_content != '' ) :
                        echo wp_kses_post( $law_content );
                    else:
                    ?>
                        <p>
                            <?php esc_html_e( 'It is just a 404 Error!', 'law' ); ?>
                            <br />
                            <?php esc_html_e( 'What you are looking for may have been misplaced', 'law' ); ?>
                            <br />
                            <?php esc_html_e( 'in Long Term Memory.', 'law' ); ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div id="site-error-back-home">
                    <a href="<?php echo esc_url( get_home_url('/') ); ?>" title="<?php echo esc_html__('Go to the Home Page', 'law'); ?>">
                        <?php esc_html_e('Go to the Home Page', 'law'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>