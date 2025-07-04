<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package krystian_k
 */

get_header(); ?>

<div class="error-404 not-found">
    <div class="page-content">
        <h1><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'krystian_k' ); ?></h1>
        <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'krystian_k' ); ?></p>
        
        <?php get_search_form(); ?>
        
        <div class="widget widget_recent_entries">
            <h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'krystian_k' ); ?></h2>
            <ul>
                <?php
                wp_list_categories( array(
                    'orderby'    => 'count',
                    'order'      => 'DESC',
                    'show_count' => 1,
                    'title_li'   => '',
                    'number'     => 10,
                ) );
                ?>
            </ul>
        </div>
    </div>
</div>

<?php get_footer(); ?>
