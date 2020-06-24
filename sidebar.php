
<?php if( is_active_sidebar( 'law-sidebar-main' ) ): ?>

    <aside class="<?php echo esc_attr( law_col_sidebar() ); ?> site-sidebar order-1">
        <?php dynamic_sidebar( 'law-sidebar-main' ); ?>
    </aside>

<?php endif; ?>