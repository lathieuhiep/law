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
        'id' => 'service_format_option',
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

    /* Start meta box lawyer */
    $law_meta_boxes[] = array(
        'id' => 'lawyer_format_option',
        'title' => esc_html__( 'Option lawyer', 'law' ),
        'post_types' => array( 'lawyer' ),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'id'               => 'lawyer_image',
                'name'             => 'Image Banner',
                'type'             => 'image_advanced',
                'force_delete'     => false,
                'max_file_uploads' => 1,
                'max_status'       => 'false',
                'image_size'       => 'thumbnail',
            ),

            array(
                'name'        => 'Họ và tên',
                'id'          => 'lawyer_full_name',
                'type'        => 'text',
                'placeholder' => 'Họ và tên',
                'size'        => 50,
            ),


            array(
                'id'      => 'lawyer_info',
                'name'    => 'Thông tin',
                'type'    => 'text_list',
                'clone' => true,
                'options' => array(
                    'Tên thông tin' => esc_html__( 'Tên thông tin', 'law' ),
                    'Nội dung thông tin' => esc_html__( 'Nội dung thông tin', 'law' ),
                ),
            ),
        )
    );
    /* End meta box lawyer */

    return $law_meta_boxes;

}