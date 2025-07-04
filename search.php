<?php
/**
 * The template for displaying search results pages
 *
 * @package krystian_k
 */

get_header(); ?>

<div class="search-results">
    <header class="page-header">
        <h1 class="page-title">
            <?php
            printf( esc_html__( 'Search Results for: %s', 'krystian_k' ), '<span>' . get_search_query() . '</span>' );
            ?>
        </h1>
    </header>

    <?php if ( have_posts() ) : ?>
        <div class="search-results-list">
            <?php
            while ( have_posts() ) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </header>
                    
                    <div class="entry-summary">
                        <?php the_excerpt(); ?>
                    </div>
                </article>
                <?php
            endwhile;
            
            the_posts_navigation();
            ?>
        </div>
    <?php else : ?>
        <div class="no-results">
            <h2><?php esc_html_e( 'Nothing here', 'krystian_k' ); ?></h2>
            <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'krystian_k' ); ?></p>
            <?php get_search_form(); ?>
        </div>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
