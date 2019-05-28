<?php
/*
 * The template for displaying Comments.
 */
global $wdwt_front;
if (post_password_required()) { ?>
    <p class="nocomments"><?php _e('This post is password protected. Enter the password to view any comments.', WDWT_LANG); ?></p>
    
	<?php return; } ?>

<?php if (have_comments()) : ?>
    <h5 id="comments">
			<?php
			printf( _n('One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), WDWT_LANG),
			number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>');
			?>
    </h5> 
    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    <div class="navigation">
        <div class="previous"><?php previous_comments_link(__( '&#8249; Older comments',WDWT_LANG )); ?></div><!-- end of .previous -->
        <div class="next"><?php next_comments_link(__( 'Newer comments &#8250;',WDWT_LANG, 0 )); ?></div><!-- end of .next -->
    </div><!-- end of.navigation -->
    <?php endif; ?>
    <ol class="commentlist">
        <?php wp_list_comments( array(
				'short_ping' => true,
				'avatar_size'=> 60,
			) ); ?>
		<div class="clear"></div>
    </ol>
    
    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    <div class="navigation">
        <div class="previous"><?php previous_comments_link(__( '&#8249; Older comments',WDWT_LANG )); ?></div><!-- end of .previous -->
        <div class="next"><?php next_comments_link(__( 'Newer comments &#8250;',WDWT_LANG, 0 )); ?></div><!-- end of .next -->
    </div><!-- end of.navigation -->
    <?php endif; ?>

<?php else : ?>

<?php endif; ?>

<?php
if (!empty($comments_by_type['pings'])) : // let's seperate pings/trackbacks from comments
    $count = count($comments_by_type['pings']);
    ($count !== 1) ? $txt = __('Pings&#47;Trackbacks',WDWT_LANG) : $txt = __('Pings&#47;Trackbacks',WDWT_LANG);
?>

    <h6 id="pings"><?php printf( __( '%1$d %2$s for "%3$s"', WDWT_LANG ), $count, $txt, get_the_title() )?></h6>

    <ol class="commentlist">
	
        <?php wp_list_comments('type=pings&max_depth=<em>'); ?>
    </ol>
<?php endif; ?>
<?php  comment_form();  ?>