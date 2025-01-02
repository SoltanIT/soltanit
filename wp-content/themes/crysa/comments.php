<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Crysa
 */ 
 
/**
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */

// Comment list
function crysa_comments( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment; ?>

        <div class="comment-item" id="comment-<?php comment_ID(); ?>"> 
            <?php if ( $avarta = get_avatar( $comment ) ) :
                printf( '<div class="avatar">%1$s</div>', $avarta );
            endif; ?>
            <div class='content'>
                <div class="title">
                    <?php 
                        if ( $comment->user_id != '0' ) {
                            printf( '<h5>%1$s</h5>', get_user_meta( $comment->user_id, 'nickname', true ) );
                        } else {
                            printf( '<h5>%1$s</h5>', get_comment_author_link() );
                        }
                    ?>
                    <span><?php echo get_comment_date( 'j M Y' ); ?></span>
                    <span><?php edit_comment_link( esc_html__( 'Edit', 'crysa' ), '', '' ); ?></span>
                </div>    
               
                <?php comment_text() ?>
                <div class='comments-info'>
                    <?php if ( $comment->comment_approved == '0' ) : ?>
                        <span class="unapproved"><?php esc_html_e( 'Your comment is awaiting moderation.', 'crysa' ); ?></span>
                    <?php endif; ?>
                    <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'],'reply_text' => '<i class="fa fa-reply"></i>Reply' ) ) ) ?>
                </div>
                
            </div>
        </div>

<?php }  
/**
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) return; ?>
<!-- Start comments-area -->

    <div class="comments-area">
        <?php if(have_comments()): ?>
            <?php if( get_comments_number() >= 1 ): ?>
                <div class="comments-title">
                    <div class="title">
                        <h4><?php
                            $crysa_comment_count = get_comments_number();
                            if ( '1' === $crysa_comment_count ) {
                                printf(
                                /* translators: 1: title. */
                                    esc_html__( 'One Comment', 'crysa' ),
                                    '<span>' . get_the_title() . '</span>'
                                );
                            } else {
                                printf( // WPCS: XSS OK.
                                /* translators: 1: comment count number, 2: title. */
                                    esc_html( _nx( '%1$s Comment on &ldquo;%2$s&rdquo;', '%1$s Comments on &ldquo;%2$s&rdquo;', $crysa_comment_count, 'comments title','crysa' ) ),
                                    number_format_i18n( $crysa_comment_count ),
                                    '<span>' . get_the_title() . '</span>'
                                );
                            }
                            ?></h4>
                    </div>    
                    <div class="comments-list">
                        <?php wp_list_comments( array( 'callback' => 'crysa_comments' ) ); ?>
                    </div>
                    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
                        <?php
                        next_comments_link('<span class="fator-n-com">'.esc_html__('Next','crysa').'</span>');
                        previous_comments_link('<span class="fator-p-com">'.esc_html__('Prev','crysa').'</span>');
                        ?>
                    <?php endif; // check for comment navigation ?> 
                </div>
            <?php endif;  ?>
        <?php  endif; // if have_comments(). ?>
        <div class="comments-form">
            <?php
            $commenter = wp_get_current_commenter();
            $req = get_option( 'require_name_email' );
            $aria_req = $req ? " aria-required='true'" : '';
            $required_text = '  ';

            $args = array (
                'class_form'  => 'comment-form',
                'title_reply' => '<div class="title"><h4>'.esc_html__('Leave a comment', 'crysa').'</h4></div>',
                'submit_button' => '<button class="btn brand-btn" type="submit">'.esc_html__('Post Comment','crysa').'</button>',
                'cancel_reply_link' => esc_html__('Cancel reply','crysa'),
                'comment_notes_before' => '',
                'comment_field' =>
                   '<div class="row"><div class="col-md-12"><div class="form-group comments">
                        <textarea  class="form-control" name="comment" id="comment" cols="90" rows="8" placeholder="'.esc_attr__(' Comment','crysa').'" '.$aria_req.'></textarea>
                    </div></div>',
                'fields' =>
                    apply_filters( 'comment_form_default_fields',
                        array(
                            'author' =>
                            '<div class="col-md-6"><div class="form-group">
                            <input type="text" class="form-control" placeholder="'.esc_attr__('Name*','crysa').'" name="author" id="author" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' />
                            </div></div>',
                            'email' => 
                            '<div class="col-md-6"><div class="form-group">
                            <input id="email"  class="form-control" placeholder="'.esc_attr__('Email*','crysa').'" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" ' . $aria_req . ' />
                            </div></div>'
                    )   ),
                'submit_field' => '<div class="col-md-6"><div class="form-group full-width submit">%1$s %2$s</div></div></div>',
                'label_submit' => esc_html__('Send message','crysa'),
            );
            comment_form($args);
            ?>
        </div>
    </div>

<!-- End comments-area -->