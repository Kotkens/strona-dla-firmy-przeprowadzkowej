<?php
/**
 * The template for displaying all single posts
 *
 * @package krystian_k
 */

get_header(); ?>

<div class="single-post-container">
    <?php
    while ( have_posts() ) :
        the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <div class="entry-meta">
                    <?php
                    echo '<span class="posted-on">' . get_the_date() . '</span>';
                    echo '<span class="byline"> by ' . get_the_author() . '</span>';
                    ?>
                </div>
            </header>

            <div class="entry-content">
                <?php
                the_content();
                
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'krystian_k' ),
                    'after'  => '</div>',
                ) );
                ?>
            </div>

            <footer class="entry-footer">
                <?php
                $categories_list = get_the_category_list( esc_html__( ', ', 'krystian_k' ) );
                if ( $categories_list ) {
                    echo '<span class="cat-links">' . $categories_list . '</span>';
                }
                
                $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'krystian_k' ) );
                if ( $tags_list ) {
                    echo '<span class="tags-links">' . $tags_list . '</span>';
                }
                ?>
            </footer>
        </article>
        
        <?php
        the_post_navigation();
        
    endwhile;
    ?>
</div>

<?php get_footer(); ?>
