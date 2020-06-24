<?php
/**
 * ReduxFramework Config File
 */
if ( ! class_exists( 'Redux' ) ) {
    return;
}


// This is your option name where all the Redux data is stored.
$law_opt_name = "law_options";

/**
 * ---> SET ARGUMENTS
 * All the possible arguments for Redux.
 * */

$law_theme = wp_get_theme(); // For use with some settings. Not necessary.

$law_opt_args = array(

    'opt_name'             => $law_opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name'         => $law_theme->get( 'Name' ),
    // Name that appears at the top of your panel
    'display_version'      => $law_theme->get( 'Version' ),
    // Version that appears at the top of your panel
    'menu_type'            => 'menu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => false,
    // Show the sections below the admin menu item or not
    'menu_title'           => $law_theme->get( 'Name' ) . esc_html__(' Options', 'law'),
    'page_title'           => $law_theme->get( 'Name' ) . esc_html__(' Options', 'law'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => true,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,
    'admin_bar'            => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-portfolio',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => false,
    // Show the time the page took to load, etc
    'update_notice'        => false,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,

    // OPTIONAL -> Give you extra features
    'page_priority'        => 2,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => '',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints'             =>  array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     =>  array(
            'color'     => 'red',
            'shadow'    =>  true,
            'rounded'   =>  false,
            'style'     =>  '',
        ),
        'tip_position'  =>  array(
            'my'        =>  'top left',
            'at'        =>  'bottom right',
        ),
        'tip_effect'    =>  array(
            'show'      =>  array(
                'effect'    =>  'slide',
                'duration'  =>  '500',
                'event'     =>  'mouseover',
            ),
            'hide'  =>  array(
                'effect'    =>  'slide',
                'duration'  =>  '500',
                'event'     =>  'click mouseleave',
            ),
        ),
    )
);
Redux::setArgs( $law_opt_name, $law_opt_args );
/*
 * ---> END ARGUMENTS
 */

/*
 * ---> START HELP TABS
 */

$law_opt_tabs = array(
    array(
        'id'        =>  'redux-help-tab-1',
        'title'     =>  esc_html__( 'Theme Information 1', 'law' ),
        'content'   =>  esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'law' )
    ),
    array(
        'id'        =>  'redux-help-tab-2',
        'title'     =>  esc_html__( 'Theme Information 2', 'law' ),
        'content'   =>  esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'law' )
    )
);
Redux::setHelpTab( $law_opt_name, $law_opt_tabs );

// Set the help sidebar
$law_opt_content = esc_html__( '<p>This is the sidebar content, HTML is allowed.</p>', 'law' );
Redux::setHelpSidebar( $law_opt_name, $law_opt_content );


/*
 * <--- END HELP TABS
 */

/*
 *
 * ---> START SECTIONS
 *
 */

// -> START option background

Redux::setSection( $law_opt_name, array(
    'id'                =>   'law_theme_option',
    'title'             =>   $law_theme->get( 'Name' ).' '.$law_theme->get( 'Version' ),
    'customizer_width'  =>   '400px',
    'icon'              =>   '',
));

// -> END option background

/* Start General Options */

Redux::setSection( $law_opt_name, array(
    'title'             =>  esc_html__( 'General Options', 'law' ),
    'id'                =>  'law_general',
    'desc'              =>  esc_html__( 'General all config', 'law' ),
    'customizer_width'  =>  '400px',
    'icon'              =>  'el el-th-large',
));

// Favicon Config
Redux::setSection( $law_opt_name, array(
    'title'         =>  esc_html__( 'Favicon', 'law' ),
    'id'            =>  'law_favicon_config',
    'desc'          =>  esc_html__( '', 'law' ),
    'subsection'    =>  true,
    'fields'        =>  array(
        array(
            'id'        =>  'law_favicon_upload',
            'type'      =>  'media',
            'url'       =>  true,
            'title'     =>  esc_html__( 'Upload Favicon Image', 'law' ),
            'subtitle'  =>  esc_html__( 'Favicon image for your website', 'law' ),
            'desc'      =>  esc_html__( '', 'law' ),
            'default'   =>  false,
        ),
    )
));

//Loading config
Redux::setSection( $law_opt_name, array(
    'title'         =>  esc_html__( 'Loading config', 'law' ),
    'id'            =>  'law_general_loading',
    'desc'          =>  esc_html__( '', 'law' ),
    'subsection'    =>  true,
    'fields'        =>  array(
        array(
            'id'        =>  'law_general_show_loading',
            'type'      =>  'switch',
            'title'     =>  esc_html__( 'Loading On/Off', 'law' ),
            'default'   =>  false,
        ),
        array(
            'id'        =>  'law_general_image_loading',
            'type'      =>  'media',
            'url'       =>  true,
            'title'     =>  esc_html__( 'Upload image loading', 'law' ),
            'subtitle'  =>  esc_html__( 'Upload image .gif', 'law' ),
            'default'   =>  '',
            'required'  =>  array( 'law_general_show_loading', '=', true ),
        ),
    )
));

//Background Options
Redux::setSection( $law_opt_name, array(
    'title'             =>  esc_html__( 'Background', 'law' ),
    'id'                =>  'law_background',
    'desc'              =>  esc_html__( 'Background all config', 'law' ),
    'customizer_width'  =>  '400px',
    'subsection'        => true,
    'fields'            => array(
        array(
            'id'        =>  'law_background_body',
            'output'    =>  'body',
            'type'      =>  'background',
            'clone'     =>  'true',
            'title'     =>  esc_html__( 'Body background', 'law' ),
            'subtitle'  =>  esc_html__( 'Body background with image, color, etc.', 'law' ),
            'hint'      =>  array(
                'content'   =>  'This is a <b>hint</b> tool-tip for the text field.<br/><br/>Add any HTML based text you like here.',
            )
        ),
    ),
));

/* End General Options */

/* Start Header Options */
Redux::setSection( $law_opt_name, array(
    'title'             =>  esc_html__( 'Header Options', 'law' ),
    'id'                =>  'law_header',
    'desc'              =>  esc_html__( 'Header all config', 'law' ),
    'customizer_width'  =>  '400px',
    'icon'              =>  'el el-arrow-up',
));

//Logo Config
Redux::setSection( $law_opt_name, array(
    'title'         =>  esc_html__( 'Logo', 'law' ),
    'id'            =>  'law_logo_config',
    'desc'          =>  esc_html__( '', 'law' ),
    'subsection'    =>  true,
    'fields'        =>  array(

        array(
            'id'        =>  'law_logo_image',
            'type'      =>  'media',
            'url'       =>  true,
            'title'     =>  esc_html__( 'Upload logo', 'law' ),
            'subtitle'  =>  esc_html__( 'logo image for your website', 'law' ),
            'desc'      =>  esc_html__( '', 'law' ),
            'default'   =>  false,
        ),

        array(
            'id'                => 'law_logo_images_size',
            'type'              => 'dimensions',
            'units'             => array( 'em', 'px', '%' ),
            'title'             => esc_html__( 'Set width/height for logo', 'law' ),
            'subtitle'          => esc_html__( '', 'law' ),
            'units_extended'    => 'true',
            'default'           => array(
                'width'     =>  '',
                'height'    =>  '',
            ),
            'output'         => array('.site-logo img'),
        ),

        array(
            'id'        =>  'law_nav_top_sticky',
            'type'      =>  'select',
            'title'     =>  esc_html__( 'Sticky Menu', 'law' ),
            'default'   =>  1,
            'options'   =>  array(
                1   =>  esc_html__( 'Yes', 'law' ),
                0   =>  esc_html__( 'No', 'law' )
            )
        ),

    )
));

// information
Redux::setSection( $law_opt_name, array(
    'title'         =>  esc_html__( 'Information', 'law' ),
    'id'            =>  'law_information_config',
    'desc'          =>  esc_html__( '', 'law' ),
    'subsection'    =>  true,
    'fields'        =>  array(

        array(
            'id'        =>  'law_information_show_hide',
            'type'      =>  'select',
            'title'     =>  esc_html__( 'Show Or Hide Information', 'law' ),
            'default'   =>  1,
            'options'   =>  array(
                1   =>  esc_html__( 'Show', 'law' ),
                0   =>  esc_html__( 'Hide', 'law' )
            )
        ),

        array(
            'id'        =>  'law_information_address',
            'type'      =>  'text',
            'title'     =>  esc_html__( 'Address', 'law' ),
            'default'   =>  '988782, Our Street, S State.',
        ),

        array(
            'id'        =>  'law_information_mail',
            'type'      =>  'text',
            'title'     =>  esc_html__( 'Mail', 'law' ),
            'default'   =>  'info@domain.com',
        ),

        array(
            'id'        =>  'law_information_phone',
            'type'      =>  'text',
            'title'     =>  esc_html__( 'Phone', 'law' ),
            'default'   =>  '+1 234 567 186',
        ),

    )
));

/* End Header Options */

/* Start Blog Option */
Redux::setSection( $law_opt_name, array(
    'title'             =>  esc_html__( 'Blog Options', 'law' ),
    'id'                =>  'law_blog_option',
    'customizer_width'  =>  '400px',
    'icon'              =>  'el el-blogger',
    'fields'            =>  array(

        array(
            'id'        =>  'law_blog_sidebar_archive',
            'type'      =>  'image_select',
            'title'     =>  esc_html__( 'Sidebar Archive', 'law' ),
            'desc'      =>  esc_html__( 'Use for archive, index, page search', 'law' ),
            'default'   =>  'right',
            'options'   =>  array(
                'hide' =>  array(
                    'alt'   =>  'None Sidebar',
                    'img'   =>  ReduxFramework::$_url . 'assets/img/1col.png'
                ),

                'left' =>  array(
                    'alt'   =>  'Sidebar Left',
                    'img'   =>  ReduxFramework::$_url . 'assets/img/2cl.png'
                ),

                'right' =>  array(
                    'alt'   =>  'Sidebar Right',
                    'img'   =>  ReduxFramework::$_url . 'assets/img/2cr.png'
                ),

            ),
        ),

	    array(
		    'id'        =>  'law_blog_per_row',
		    'type'      =>  'select',
		    'title'     =>  esc_html__( 'Blog Per Row', 'law' ),
		    'default'   =>  2,
		    'options'   =>  array(
			    2   =>  '2 Column',
			    3   =>  '3 Column',
			    4   =>  '4 Column',
		    )
	    ),

    )
));

Redux::setSection( $law_opt_name, array(
	'title'         =>  esc_html__( 'Single Post', 'law' ),
	'id'            =>  'law_single_post_option',
	'desc'          =>  esc_html__( '', 'law' ),
	'subsection'    =>  true,
	'fields'        =>  array(

		array(
			'id'        =>  'law_blog_sidebar_single',
			'type'      =>  'image_select',
			'title'     =>  esc_html__( 'Sidebar Single', 'law' ),
			'default'   =>  'right',
			'options'   =>  array(
				'hide' =>  array(
					'alt'   =>  'None Sidebar',
					'img'   =>  ReduxFramework::$_url . 'assets/img/1col.png'
				),

				'left' =>  array(
					'alt'   =>  'Sidebar Left',
					'img'   =>  ReduxFramework::$_url . 'assets/img/2cl.png'
				),

				'right' =>  array(
					'alt'   =>  'Sidebar Right',
					'img'   =>  ReduxFramework::$_url . 'assets/img/2cr.png'
				),

			),
		),

		array(
			'id'        =>  'law_on_off_share_single',
			'type'      =>  'switch',
			'title'     =>  esc_html__( 'On/Off Share Post Single', 'law' ),
			'default'   =>  true,
		),

		array(
			'id'            =>  'law_related_post_limit',
			'type'          =>  'slider',
			'title'         =>  esc_html__( 'Related Post Limit', 'law' ),
			'min'           =>  1,
			'step'          =>  1,
			'max'           =>  250,
			'default'       =>  3,
			'display_value' => 'text'
		),

	)
));
/* End Blog Option */

/* Start Social Network */
Redux::setSection( $law_opt_name, array(
    'title'             =>  esc_html__( 'Social Network', 'law' ),
    'id'                =>  'law_social_network',
    'customizer_width'  =>  '400px',
    'icon'              =>  'el el-globe-alt',
    'fields'            =>  array(

        array(
            'id'        =>  'law_social_network_facebook',
            'type'      =>  'text',
            'title'     =>  esc_html__( 'Facebook', 'law' ),
            'default'   =>  '#',
        ),

        array(
            'id'        =>  'law_social_network_youtube',
            'type'      =>  'text',
            'title'     =>  esc_html__( 'Youtube', 'law' ),
            'default'   =>  '#',
        ),

        array(
            'id'        =>  'law_social_network_twitter',
            'type'      =>  'text',
            'title'     =>  esc_html__( 'Twitter', 'law' ),
            'default'   =>  '#',
        ),

        array(
            'id'        =>  'law_social_network_instagram',
            'type'      =>  'text',
            'title'     =>  esc_html__( 'Instagram', 'law' ),
            'default'   =>  '#',
        ),

    )
));
/* End Social Network */

/* Start Typography Options */
Redux::setSection( $law_opt_name, array(
    'title'             =>  esc_html__( 'Typography', 'law' ),
    'id'                =>  'law_typography',
    'desc'              =>  esc_html__( 'Typography all config', 'law' ),
    'customizer_width'  =>  '400px',
    'icon'              =>  'el el-fontsize'
));

// Body font
Redux::setSection( $law_opt_name, array(
    'title'         =>  esc_html__( 'Body Typography', 'law' ),
    'id'            =>  'law_body_typography',
    'desc'          =>  esc_html__( '', 'law' ),
    'subsection'    =>  true,
    'fields'        =>  array(

        array(
            'id'        =>  'law_body_typography_font',
            'type'      =>  'typography',
            'output'    =>  array( 'body' ),
            'title'     =>  esc_html__( 'Body Font', 'law' ),
            'subtitle'  =>  esc_html__( 'Specify the body font properties.', 'law' ),
            'google'    =>  true,
            'default'   =>  array(
                'color'         =>  '',
                'font-size'     =>  '',
                'font-family'   =>  '',
                'font-weight'   =>  '',
            ),
        ),

        array(
            'id'        =>  'law_link_color',
            'type'      =>  'link_color',
            'output'    =>  array( 'a' ),
            'title'     =>  esc_html__( 'Link Color', 'law' ),
            'subtitle'  =>  esc_html__( 'Controls the color of all text links.', 'law' ),
            'default'   =>  ''
        ),
    )
));

// Header font
Redux::setSection( $law_opt_name, array(
    'title'         =>  esc_html__( 'Custom Typography', 'law' ),
    'id'            =>  'law_custom_typography',
    'desc'          =>  esc_html__( '', 'law' ),
    'subsection'    =>  true,
    'fields'        =>  array(

        array(
            'id'        =>  'law_custom_typography_1',
            'type'      =>  'typography',
            'title'     =>  esc_html__( 'Custom 1 Typography', 'law' ),
            'subtitle'  =>  esc_html__( 'These settings control the typography for all Custom 1.', 'law' ),
            'google'    =>  true,
            'default'   =>  array(
                'font-size'     =>  '',
                'font-family'   =>  '',
                'font-weight'   =>  '',
                'color'         =>  '',
            ),
        ),

        //selector custom typo 1
        array(
            'id'        =>  'law_custom_typography_1_selector',
            'type'      =>  'textarea',
            'title'     =>  esc_html__( 'Selectors 1', 'law' ),
            'desc'      =>  esc_html__( 'Import selectors. You can import one or multi selector.Example: #selector1,#selector2,.selector3', 'law' ),
            'default'   =>  ''
        ),

        array(
            'id'        =>  'law_custom_typography_2',
            'type'      =>  'typography',
            'title'     =>  esc_html__( 'Custom 2 Typography', 'law' ),
            'subtitle'  =>  esc_html__( 'These settings control the typography for all Custom 2.', 'law' ),
            'google'    =>  true,
            'default'   =>  array(
                'font-size'     =>  '',
                'font-family'   =>  '',
                'font-weight'   =>  '',
                'color'         =>  '',
            ),
        ),

        //selector custom typo 2
        array(
            'id'        => 'law_custom_typography_2_selector',
            'type'      => 'textarea',
            'title'     => esc_html__( 'Selectors 2', 'law' ),
            'desc'      => esc_html__( 'Import selectors. You can import one or multi selector.Example: #selector1,#selector2,.selector3', 'law' ),
            'default'   => ''
        ),

        array(
            'id'        =>  'law_custom_typography_3',
            'type'      =>  'typography',
            'title'     =>  esc_html__( 'Custom 3 Typography', 'law' ),
            'subtitle'  =>  esc_html__( 'These settings control the typography for all Custom 3.', 'law' ),
            'google'    =>  true,
            'default'   =>  array(
                'font-size'     =>  '',
                'font-family'   =>  '',
                'font-weight'   =>  '',
                'color'         =>  '',
            ),
            'output'    =>  '',
        ),

        //selector custom typo 3
        array(
            'id'        =>  'law_custom_typography_3_selector',
            'type'      =>  'textarea',
            'title'     =>  esc_html__( 'Selectors 3', 'law' ),
            'desc'      =>  esc_html__( 'Import selectors. You can import one or multi selector.Example: #selector1,#selector2,.selector3', 'law' ),
            'default'   =>  ''
        ),

    )
));

/* End Typography Options */

/* Start 404 Options */
Redux::setSection( $law_opt_name, array(
    'title'             =>  esc_html__( '404 Options', 'law' ),
    'id'                =>  'law_404',
    'desc'              =>  esc_html__( '404 page all config', 'law' ),
    'customizer_width'  =>  '400px',
    'icon'              =>  'el el-warning-sign',
    'fields'            =>  array(

        array(
            'id'        =>  'law_404_background',
            'type'      =>  'media',
            'url'       =>  true,
            'title'     =>  esc_html__( '404 Background', 'law' ),
            'default'   =>  false,
        ),

        array(
            'id'        =>  'law_404_title',
            'type'      =>  'text',
            'title'     =>  esc_html__( '404 Title', 'law' ),
            'default'   =>  'Awww...Do Not Cry',
        ),

        array(
            'id'        =>  'law_404_editor',
            'type'      =>  'editor',
            'title'     =>  esc_html__( '404 Content', 'law' ),
            'default'   =>  esc_html__( 'It is just a 404 Error! What you are looking for may have been misplaced in Long Term Memory.', 'law' ),
            'args'          =>  array(
                'wpautop'       => false,
                'media_buttons' => false,
                'textarea_rows' => 10,
                'teeny'         => false,
                'quicktags'     => true,
            )
        ),

    )
));
/* End 404 Options */

/* Start Footer Options */
Redux::setSection( $law_opt_name, array(
    'title'             =>  esc_html__( 'Footer Options', 'law' ),
    'id'                =>  'law_footer',
    'desc'              =>  esc_html__( 'Footer all config', 'law' ),
    'customizer_width'  =>  '400px',
    'icon'              =>  'el el-arrow-down'
));

// Footer Sidebar Multi Column
Redux::setSection( $law_opt_name, array(
    'title'         =>  esc_html__( 'Sidebar Footer Multi Column', 'law' ),
    'id'            =>  'law_footer_sidebar_multi_column',
    'subsection'    =>  true,
    'fields'        =>  array(
        array(
            'id'        =>  'law_footer_multi_column',
            'type'      =>  'image_select',
            'title'     =>  esc_html__( 'Number of Footer Columns', 'law' ),
            'subtitle'  =>  esc_html__( 'Controls the number of columns in the footer', 'law' ),
            'default'   =>  4,
            'options'   =>  array(
                0 =>  array(
                    'alt'   =>  'No Footer',
                    'img'   =>  get_theme_file_uri( '/extension/assets/images/no-footer.png' )
                ),

                1 =>  array(
                    'alt'   =>  '1 Columnn',
                    'img'   =>  get_theme_file_uri(  '/extension/assets/images/1column.png' )
                ),

                2 =>  array(
                    'alt'   =>  '2 Columnn',
                    'img'   =>  get_theme_file_uri( '/extension/assets/images/2column.png' )
                ),
                3 =>  array(
                    'alt'   =>  '3 Columnn',
                    'img'   =>  get_theme_file_uri(   '/extension/assets/images/3column.png' )
                ),
                4 =>  array(
                    'alt'   =>  '4 Columnn',
                    'img'   =>  get_theme_file_uri( '/extension/assets/images/4column.png' )
                ),
            ),
        ),

        array(
            'id'            =>  'law_footer_multi_column_1',
            'type'          =>  'slider',
            'title'         =>  esc_html__( 'Column width 1', 'law' ),
            'subtitle'      =>  esc_html__( 'Select the number of columns to display in the footer', 'law' ),
            'desc'          =>  esc_html__( 'Min: 1, max: 12, default value: 1', 'law' ),
            'default'       =>  3,
            'min'           =>  1,
            'step'          =>  1,
            'max'           =>  12,
            'display_value' =>  'label',
            'required'      =>  array(
                array( 'law_footer_multi_column', 'equals','1', '2', '3', '4' ),
                array( 'law_footer_multi_column', '!=', '0' ),
            )
        ),

        array(
            'id'            =>  'law_footer_multi_column_2',
            'type'          =>  'slider',
            'title'         =>  esc_html__( 'Column width 2', 'law' ),
            'subtitle'      =>  esc_html__( 'Select the number of columns to display in the footer', 'law' ),
            'desc'          =>  esc_html__( 'Min: 1, max: 12, default value: 1', 'law' ),
            'default'       =>  3,
            'min'           =>  1,
            'step'          =>  1,
            'max'           =>  12,
            'display_value' =>  'label',
            'required'      =>  array(
                array( 'law_footer_multi_column', 'equals', '2', '3', '4' ),
                array( 'law_footer_multi_column', '!=', '1' ),
                array( 'law_footer_multi_column', '!=', '0' ),
            )
        ),

        array(
            'id'            =>  'law_footer_multi_column_3',
            'type'          =>  'slider',
            'title'         =>  esc_html__( 'Column width 3', 'law' ),
            'subtitle'      =>  esc_html__( 'Select the number of columns to display in the footer', 'law' ),
            'desc'          =>  esc_html__( 'Min: 1, max: 12, default value: 1', 'law' ),
            'default'       =>  3,
            'min'           =>  1,
            'step'          =>  1,
            'max'           =>  12,
            'display_value' =>  'label',
            'required'      =>  array(
                array( 'law_footer_multi_column', 'equals', '3', '4' ),
                array( 'law_footer_multi_column', '!=', '1' ),
                array( 'law_footer_multi_column', '!=', '2' ),
                array( 'law_footer_multi_column', '!=', '0' ),
            )
        ),

        array(
            'id'            =>  'law_footer_multi_column_4',
            'type'          =>  'slider',
            'title'         =>  esc_html__( 'Column width 4', 'law' ),
            'subtitle'      =>  esc_html__( 'Select the number of columns to display in the footer', 'law' ),
            'desc'          =>  esc_html__( 'Min: 1, max: 12, default value: 1', 'law' ),
            'default'       =>  3,
            'min'           =>  1,
            'step'          =>  1,
            'max'           =>  12,
            'display_value' =>  'label',
            'required'      =>  array(
                array( 'law_footer_multi_column',  'equals', '4' ),
                array( 'law_footer_multi_column', '!=', '1' ),
                array( 'law_footer_multi_column', '!=', '2' ),
                array( 'law_footer_multi_column', '!=', '3' ),
                array( 'law_footer_multi_column', '!=', '0' ),
            )
        ),
    )

));

//Copyright
Redux::setSection( $law_opt_name, array(
    'title'         =>  esc_html__( 'Copyright', 'law' ),
    'id'            =>  'law_footer_copyright',
    'desc'          =>  esc_html__( '', 'law' ),
    'subsection'    =>  true,
    'fields'        =>  array(
        array(
            'id'            =>  'law_footer_copyright_editor',
            'type'          =>  'editor',
            'title'         =>  esc_html__( 'Enter content copyright', 'law' ),
            'full_width'    =>  true,
            'default'       =>  'Copyright &amp; DiepLK',
            'args'          =>  array(
                'wpautop'       => false,
                'media_buttons' => false,
                'textarea_rows' => 10,
                'teeny'         => false,
                'quicktags'     => true,
            )
        ),
    )
));

/* End Footer Options */


/*
 * <--- END SECTIONS
 */

// Function to test the compiler hook and demo CSS output.
add_filter('redux/options/' . $law_opt_name . '/compiler', 'compiler_action', 10, 3);

/**
 * This is a test function that will let you see when the compiler hook occurs.
 * It only runs if a field    set with compiler=>true is changed.
 * */
if ( ! function_exists( 'compiler_action' ) ) {
    function compiler_action( $options, $css, $changed_values ) {
        echo '<h1>The compiler hook has run!</h1>';
        echo "<pre>";
        print_r( $changed_values ); // Values that have changed since the last save
        echo "</pre>";
        print_r($options); //Option values
        print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
    }
}
