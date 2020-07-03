<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class law_widget_services extends Widget_Base {

    public function get_categories() {
        return array( 'law_widgets' );
    }

    public function get_name() {
        return 'law-service';
    }

    public function get_title() {
        return esc_html__( 'Services', 'law' );
    }

    public function get_icon() {
        return 'fa fa-newspaper-o';
    }

    protected function _register_controls() {

        /* Section Query */
        $this->start_controls_section(
            'section_query',
            [
                'label' =>  esc_html__( 'Query', 'law' )
            ]
        );

        $this->add_control(
            'heading',
            [
                'label'         =>  esc_html__( 'Heading', 'law' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  esc_html__( 'Heading', 'law' ),
                'label_block'   =>  true
            ]
        );

        $this->add_control(
            'select_cat',
            [
                'label'         =>  esc_html__( 'Select Category', 'law' ),
                'type'          =>  Controls_Manager::SELECT2,
                'options'       =>  law_check_get_cat( 'service_cat' ),
                'multiple'      =>  true,
                'label_block'   =>  true
            ]
        );

        $this->add_control(
            'limit',
            [
                'label'     =>  esc_html__( 'Number of Posts', 'law' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  12,
                'min'       =>  1,
                'max'       =>  100,
                'step'      =>  1,
            ]
        );

        $this->add_control(
            'order_by',
            [
                'label'     =>  esc_html__( 'Order By', 'law' ),
                'type'      =>  Controls_Manager::SELECT,
                'default'   =>  'id',
                'options'   =>  [
                    'id'            =>  esc_html__( 'Post ID', 'law' ),
                    'author'        =>  esc_html__( 'Post Author', 'law' ),
                    'title'         =>  esc_html__( 'Title', 'law' ),
                    'date'          =>  esc_html__( 'Date', 'law' ),
                    'rand'          =>  esc_html__( 'Random', 'law' ),
                ],
            ]
        );

        $this->add_control(
            'order',
            [
                'label'     =>  esc_html__( 'Order', 'law' ),
                'type'      =>  Controls_Manager::SELECT,
                'default'   =>  'ASC',
                'options'   =>  [
                    'ASC'   =>  esc_html__( 'Ascending', 'law' ),
                    'DESC'  =>  esc_html__( 'Descending', 'law' ),
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings       =   $this->get_settings_for_display();
        $cat_post       =   $settings['select_cat'];
        $limit_post     =   $settings['limit'];
        $order_by_post  =   $settings['order_by'];
        $order_post     =   $settings['order'];

        if ( !empty( $cat_post ) ) :

            $args = array(
                'post_type'             =>  'service',
                'posts_per_page'        =>  $limit_post,
                'orderby'               =>  $order_by_post,
                'order'                 =>  $order_post,
                'ignore_sticky_posts'   =>  1,
                'tax_query'             =>  array(
                    array(
                        'taxonomy' => 'service_cat',
                        'field'    => 'term_id',
                        'terms'    => $cat_post,
                    )
                )
            );

        else:

            $args = array(
                'post_type'             =>  'service',
                'posts_per_page'        =>  $limit_post,
                'orderby'               =>  $order_by_post,
                'order'                 =>  $order_post,
                'ignore_sticky_posts'   =>  1,
            );

        endif;

        $query = new \ WP_Query( $args );

        if ( $query->have_posts() ) :

        ?>
            <div class="element-service">
                <h4 class="heading">
                    <?php echo esc_html( $settings['heading'] ); ?>
                </h4>
                <div class="row">
                    <?php
                    while ( $query->have_posts() ):
                        $query->the_post();

                        $icon = rwmb_meta( 'icon_services' );
                    ?>
                        <div class="col-md-6 item-col">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <?php if ( !empty( $icon ) ) : ?>
                                    <span class="icon">
                                        <i class="<?php echo esc_attr( rwmb_meta( 'icon_services' ) ); ?>"></i>
                                    </span>
                                <?php endif; ?>

                                <span class="text"><?php the_title(); ?></span>
                            </a>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
        <?php

        endif;
    }

    protected function _content_template() {}

}

Plugin::instance()->widgets_manager->register_widget_type( new law_widget_services );