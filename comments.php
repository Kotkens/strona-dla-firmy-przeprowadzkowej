<?php
/**
 * The template for displaying comments
 *
 * @package krystian_k
 */

if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">
    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title">
            <?php
            $krystian_k_comment_count = get_comments_number();
            if ( '1' === $krystian_k_comment_count ) {
                echo esc_html__( 'One thought on &ldquo;' . get_the_title() . '&rdquo;', 'krystian_k' );
            } else {
                echo esc_html( 
                    sprintf(
                        _n(
                            '%1$s thought on &ldquo;%2$s&rdquo;',
                            '%1$s thoughts on &ldquo;%2$s&rdquo;',
                            $krystian_k_comment_count,
                            'krystian_k'
                        ),
                        number_format_i18n( $krystian_k_comment_count ),
                        get_the_title()
                    )
                );
            }
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments( array(
                'style'      => 'ol',
                'short_ping' => true,
            ) );
            ?>
        </ol>

        <?php
        the_comments_navigation();

        if ( ! comments_open() ) :
            ?>
            <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'krystian_k' ); ?></p>
            <?php
        endif;

    endif;

    comment_form();
    ?>
</div>
