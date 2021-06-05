<?php 
/**
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the commend
 */
if (post_password_required()) {
    return;
}

?>
    <?php

        // Do not delete these lines
        if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
        die ('Please do not load this page directly. Thanks!');
        ?>
    <div id="comment-area">
        <?php if ( have_comments() ) : ?>

            <h4 class="comments">Comments <?php comments_number( '( 0 )', '<span class="responses">( 1 )</span>', '<span class="response">( % )</span>' ); ?></h4>

            <?php the_comments_navigation(); ?>

            <ol class="commentlist">
                <?php 
                wp_list_comments( array(
                    'callback'      => 'custom_comment_callback',
                    'style'         => 'ol',
                )); 
                ?>
            </ol>

            <?php the_comments_navigation(); ?>

    </div>

        <?php else : // this is displayed if there are no comments so far ?>

        <?php if ('open' == $post->comment_status) : ?>
        <!-- If comments are open, but there are no comments. -->

        <?php else : // comments are closed ?>
            <!-- If comments are closed. -->
            <p class="nocomments">Comments are closed.</p>

        <?php endif; ?>

        <?php endif; ?>

        <?php if ('open' == $post->comment_status) : ?>

            <div id="respond">

                <h4 class="comment-title">
                    <?php comment_form_title( 'Leave a Comment', 'Leave a Reply to %s' );?>
                </h4>

                <div class="cancel-comment-reply">
                    <small><?php cancel_comment_reply_link(); ?></small>
                </div>

        <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
                <p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>

        <?php else : ?>

            <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
                <?php if ( $user_ID ) : ?>

                    <p class="logged-in">Logged in as 
                        <span class="login-user"><?php echo $user_identity; ?></span>. 
                        <a href="<?php echo wp_logout_url(get_permalink()); ?>">Log out <i class="fa fa-angle-right"></i></a>
                    </p>

                <?php else : ?>

                    <p class="comment-form-author fa">
                        <input type="text" name="author" class="author" autocomplete="off" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> placeholder="Name"/>
                    </p>

                    <p class="comment-form-email fa">
                        <input type="email" name="email" class="email" autocomplete="off" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> placeholder="E-Mail"/>
                    </p>

                <?php endif; ?>

                <!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

                    <p class="comment-form-comment fa">
                        <textarea name="comment" class="comment" rows="7" tabindex="3" placeholder="Comment"></textarea>
                    </p>

                    <p class="form-submit">
                        <input name="submit" type="submit" class="submit" tabindex="4" value="Post Comment" />
                        <?php comment_id_fields(); ?>
                    </p>
                <?php do_action('comment_form', $post->ID); ?>
            </form>

            <?php endif; // If registration required and not logged in ?>
        </div>

    <?php endif; // if you delete this the sky will fall on your head ?>