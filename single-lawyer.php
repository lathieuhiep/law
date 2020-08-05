<?php
get_header();

$img_banner = get_post_meta( get_the_ID(), 'lawyer_image', true );
$full_name = rwmb_meta( 'lawyer_full_name' );
$lawyer_info = rwmb_meta( 'lawyer_info' );

?>
<div class="site-lawyer">
    <div class="banner">
        <?php echo wp_get_attachment_image( $img_banner, 'full' ); ?>
        <div class="banner-wap d-flex align-items-center">
            <div class="container">
                <h1 class="title">
                    <?php echo esc_html( $full_name ); ?>
                </h1>
                <?php
                if(function_exists('bcn_display')) :
                ?>
                    <div class="breadcrumbs-lawyer">
                        <?php bcn_display(); ?>
                    </div>
               <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="warp-lawyer">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-9">
                    <?php if ( !empty( $lawyer_info ) ) : ?>
                    <div class="info">
                        <?php
                        $i = 1;
                        $total_info = count( $lawyer_info );
                        foreach ( $lawyer_info as $item_info ) :

                            if ( $i == 1 || $total_info % $i == 1 ) :
                        ?>
                            <div class="info-box d-flex">
                        <?php endif; ?>

                                <div class="item">
                                    <strong><?php echo esc_html( $item_info[0] ); ?>:</strong>
                                    <span><?php echo esc_html( $item_info[1] ); ?></span>
                                </div>

                        <?php if ( $i == 2 || $total_info % $i == 2 ||$i == $total_info ) : ?>
                            </div>
                        <?php endif; ?>
                        <?php $i++; endforeach; ?>
                    </div>
                    <?php
                    endif;

                    if ( have_posts() ) :
                        while (have_posts()) :
                            the_post();
                    ?>
                            <div class="content-lawyer">
                                <?php the_content(); ?>
                            </div>
                    <?php
                        endwhile;
                    endif;
                    ?>
                </div>
                <div class="col-12 col-md-3"></div>
            </div>

        </div>
    </div>
</div>
<?php get_footer(); ?>
