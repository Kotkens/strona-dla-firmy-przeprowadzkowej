<?php
/**
 * The template for displaying archive pages
 *
 * @package krystian_k
 */

get_header(); ?>

<div class="archive-container">
    <header class="page-header">
        <?php
        the_archive_title( '<h1 class="page-title">', '</h1>' );
        the_archive_description( '<div class="archive-description">', '</div>' );
        ?>
    </header>

    <?php if ( have_posts() ) : ?>
        <div class="archive-posts">
            <?php
            while ( have_posts() ) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <div class="entry-meta">
                            <?php
                            echo '<span class="posted-on">' . get_the_date() . '</span>';
                            echo '<span class="byline"> by ' . get_the_author() . '</span>';
                            ?>
                        </div>
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
        <div class="no-posts">
            <h2><?php esc_html_e( 'Nothing here', 'krystian_k' ); ?></h2>
            <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'krystian_k' ); ?></p>
            <?php get_search_form(); ?>
        </div>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
