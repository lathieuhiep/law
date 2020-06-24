<?php
get_header();

global $law_options;

$law_blog_sidebar_single = !empty( $law_options['law_blog_sidebar_single'] ) ? $law_options['law_blog_sidebar_single'] : 'right';

$law_class_col_content = law_col_use_sidebar( $law_blog_sidebar_single, 'law-sidebar-main' );

get_template_part( 'template-parts/breadcrumbs/inc', 'breadcrumbs' );
?>

<div class="site-container site-single">
    <div class="container">
        <div class="row">
            <div class="<?php echo esc_attr( $law_class_col_content ); ?>">

                <?php
                if ( have_posts() ) : while (have_posts()) : the_post();

                    get_template_part( 'template-parts/post/content','single' );

                    endwhile;
                endif;
                ?>

            </div>

            <?php
            if ( $law_blog_sidebar_single !== 'hide' ) :
	            get_sidebar();
            endif;
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>

