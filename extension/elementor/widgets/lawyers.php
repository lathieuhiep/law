<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class law_widget_lawyers extends Widget_Base {

    public function get_categories() {
        return array( 'law_widgets' );
    }

    public function get_name() {
        return 'law-lawyer-list';
    }

    public function get_title() {
        return esc_html__( 'Lawyers', 'law' );
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
            'limit',
            [
                'label'     =>  esc_html__( 'Number of Posts', 'law' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  15,
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
        $limit_post     =   $settings['limit'];
        $order_by_post  =   $settings['order_by'];
        $order_post     =   $settings['order'];

        $args = array(
            'post_type'             =>  'lawyer',
            'posts_per_page'        =>  $limit_post,
            'orderby'               =>  $order_by_post,
            'order'                 =>  $order_post,
            'ignore_sticky_posts'   =>  1,
        );

        $query = new \ WP_Query( $args );

        if ( $query->have_posts() ) :

            ?>

            <div class="element-lawyer-list">
                <div class="row">
                    <?php while ( $query->have_posts() ): $query->the_post(); ?>
                    <div class="col-12 col-sm-6 col-md-4 col-item">
                        <div class="item">
                            <?php the_post_thumbnail( 'large' ); ?>
                            <div class="content">
                                <h3 class="title">
                                    <?php the_title(); ?>
                                </h3>
                                <span class="hov-separator"></span>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <?php esc_html_e( 'Xem thông tin', 'law' ); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>

        <?php

        endif;
    }

    protected function _content_template() {}

}

Plugin::instance()->widgets_manager->register_widget_type( new law_widget_lawyers );