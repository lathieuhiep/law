<?php
    /*
     * Method process option
     * # option 1: config font
     * # option 2: process config theme
    */
    if( !is_admin() ):

        add_action( 'wp_head','law_config_theme' );

        function law_config_theme() {

            if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) :

                    global $law_options;
                    $law_favicon = $law_options['law_favicon_upload']['url'];

                    if( $law_favicon != '' ) :

                        echo '<link rel="shortcut icon" href="' . esc_url( $law_favicon ) . '" type="image/x-icon" />';

                    endif;

            endif;
        }

        // Method add custom css, Css custom add here
        // Inline css add here
        /**
         * Enqueues front-end CSS for the custom css.
         *
         * @see wp_add_inline_style()
         */

        add_action( 'wp_enqueue_scripts', 'law_custom_css', 99 );

        function law_custom_css() {

            global $law_options;

            $law_typo_selecter_1   =   $law_options['law_custom_typography_1_selector'];

            $law_typo1_font_family   =   $law_options['law_custom_typography_1']['font-family'] == '' ? '' : $law_options['law_custom_typography_1']['font-family'];

            $law_css_style = '';

            if ( $law_typo1_font_family != '' ) :
                $law_css_style .= ' '.esc_attr( $law_typo_selecter_1 ).' { font-family: '.balanceTags( $law_typo1_font_family, true ).' }';
            endif;

            if ( $law_css_style != '' ) :
                wp_add_inline_style( 'law-style', $law_css_style );
            endif;

        }

    endif;
