<?php

add_filter( 'rwmb_meta_boxes', 'law_register_meta_boxes' );

function law_register_meta_boxes() {

    /* Start meta box post */
    $law_meta_boxes[] = array(
        'id'         => 'post_format_option',
        'title'      => esc_html__( 'Post Format', 'law' ),
        'post_types' => array( 'post' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(

            array(
                'id'               => 'law_gallery_post',
                'name'             => 'Gallery',
                'type'             => 'image_advanced',
                'force_delete'     => false,
                'max_status'       => false,
                'image_size'       => 'thumbnail',
            ),

            array(
                'id'            => 'law_video_post',
                'name'          => 'Video Or Audio',
                'type'          => 'oembed',
            ),


        )
    );
    /* End meta box post */

    /* Start meta box service */
    $law_meta_boxes[] = array(
        'id' => 'post_format_option',
        'title' => esc_html__( 'Option Service', 'law' ),
        'post_types' => array( 'service' ),
        'context' => 'side',
        'priority' => 'low',
        'fields' => array(
            array(
                'name'        => 'Icon',
                'id'          => 'icon_services',
                'desc'        => 'Link <a href="https://fontawesome.com/icons?d=gallery&m=free" target="_blank">icon</a>',
                'type'        => 'text',
                'clone'       => false,
                'placeholder' => 'ex: fas fa-gavel',
                'size'        => 30,
            ),

        )
    );
    /* End meta box service */

    return $law_meta_boxes;

}