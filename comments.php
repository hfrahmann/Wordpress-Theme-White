<?php
// Do not delete these lines
if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die ('Please do not load this page directly. Thanks!');

if ( post_password_required() ) { ?>
<p class="nocomments">Dieser Eintrag ist Passwortgeschützt.</p>
<?php
    return;
}
?>

<div style="height:50px;"></div>

<!-- You can start editing here. -->
<a name="comments"></a>

<?php if ( have_comments() ) : ?>

    <?php $commentcount = 0; ?>

    <div class="hf-comment">
    <?php while (have_comments()) : the_comment(); ?>

        <div class="hf-comment-details"></div>
        <div <?php comment_class("hf-comment-content"); ?>>

            <?php if($commentcount == 0) : ?>
                <?php $commentcount++; ?>
                <h3 style="padding-bottom:20px;" class="hf-comment-title">
                    <?php comments_number("Keine Kommentare", "Ein Kommentar", "% Kommentare");?>
                    <?php printf('zu &#8220;%s&#8221;', the_title('', '', false)); ?>
                </h3>
            <?php endif; ?>

            <div id="comment-<?php comment_ID(); ?>">
                <span style="float:left;font-size:12px;">
                    <?php echo get_avatar($comment,$size='32' ); ?>
                    <?php printf('von <i>%s</i>', get_comment_author_link()) ?>
                </span>
                <span style="float:right;text-align:right;">
                    <span style="font-size:11px;color:#9a9a9a;"><?php printf('%1$s um %2$s', get_comment_date(),  get_comment_time()) ?></span>
                </span>

                <div style="clear:left;border-bottom:1px solid #dedede;"></div>
                <div style="float: right;">
                    <small><?php edit_comment_link("Bearbeiten",'  ','') ?></small>
                </div>

                <?php if ($comment->comment_approved == '0') : ?>
                <p>
                    <em style="color:#9a9a9a;font-size:80%;">Dein Kommentar muss noch freigeschaltet werden.</em>
                </p>
                <?php endif; ?>
                <?php comment_text() ?>
            </div>

        </div>

        <div style="clear:both;"></div>

    <?php endwhile; ?>
    </div>

<?php else: ?>

<!-- keine Kommentare -->

<?php endif; ?>





<?php if ( comments_open() ) : ?>

<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p>
    <?php printf('Du musst <a href="%s">angemeldet</a> sein um ein Kommentar zu hinterlassen.', wp_login_url( get_permalink() )); ?>
</p>
<?php else : ?>

    <div class="hf-comment" style="margin-top:20px;">
        <div class="hf-comment-details"></div>
        <div class="hf-comment-content">

            <h2 class="ondesktop">Neuer Kommentar</h2>
            <h2 class="onmobile"><a href="javascript:void(0);" onclick="document.getElementById('commentform').style.display='block';">Neuer Kommentar</a></h2>

            <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

                <?php if ( is_user_logged_in() ) : ?>
                <p>
                    <?php printf('Eingeloggt als <a href="%1$s">%2$s</a>.', get_option('siteurl') . '/wp-admin/profile.php', $user_identity); ?>
                    <small>(<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Abmelden">Abmelden</a>)</small>
                </p>
                <?php else : ?>

                <p>
                    <small>Name *</small><br>
                    <input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
                </p>
                <p>
                    <small>Email *</small><br>
                    <input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
                </p>
                <p>
                    <small>Webseite</small><br>
                    <input type="text" name="url" id="url" value="<?php echo  esc_attr($comment_author_url); ?>" tabindex="3" />
                </p>

                <?php endif; ?>
                <p>
                    <small>Kommentar *</small><br>
                    <textarea name="comment" id="comment"  tabindex="4"></textarea>
                </p>
                <input name="submit" type="submit" id="submit" tabindex="5" value="Kommentar abschicken" />
                <?php comment_id_fields(); ?>

                <?php do_action('comment_form', $post->ID); ?>

		<?php /*do_action( 'akismet_privacy_policies' );*/ ?>

            </form>

	    <br>&nbsp;<br>
        </div>

        <div style="clear:both;"></div>
    </div>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>