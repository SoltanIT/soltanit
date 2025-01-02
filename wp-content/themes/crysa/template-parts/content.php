<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package crysa
 */
?>
<?php if(is_single()): ?>
    
     <div <?php post_class(); ?> >
        <div class="blog-item-box">
            <div class="item">
                <?php if( has_post_thumbnail() ): ?>
                <!-- Start Post Thumb -->
                <div class="thumb">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('crysa_900x500'); ?>
                    </a>
                </div>
                <!-- Start Post Thumb -->
                <?php endif;?>

                <div class="info">
                    <div class="meta">
                        <ul>
                            <li>
                                <i class="fas fa-calendar-alt"></i><?php echo get_the_date( get_option('date_format')) ;?>
                            </li>
                            <li>
                                <a href="<?php echo get_author_posts_url( get_the_ID(), get_the_author_meta( 'user_nicename' ) ); ?>">
                                    <i class="fas fa-user-circle"></i>
                                    <span><?php echo get_the_author() ;?></span>
                                </a>
                            </li>
                        </ul>
                    </div>

            <?php
                the_content(); 
                $defaults = array(
                    'before'           => '<nav class="page-links">',
                    'after'            => '</nav>',
                    'link_before'      => '',
                    'link_after'       => '',
                    'separator'        => ' ',
                    'pagelink'         => '%',
                    'echo'             => 1
                );
                wp_link_pages($defaults);
            ?>

                <?php if(has_tag()): ?>
                    <div class="footer-entry">
                        <?php 
                            $post_all_tag = wp_get_post_tags($post->ID);
                            $count =count($post_all_tag );
                        ?>
                           <h4><?php echo esc_html($count > 1 ? "Tags:" : "Tag :") ?></h4>
                           <?php the_tags('', '', '' ); ?>
                    </div>
                <?php endif; ?>
                </div>
            </div>
            
            <?php
            $prevpost = get_previous_post();
            $nextpost = get_next_post();
            if( ! empty( $prevpost ||  $nextpost ) ):
            ?>
            <div class="post-pagi-area">
                <?php if( ! empty( $prevpost ) ) { ?>
                    <div class="post-previous">
                        <a class="post-previous" href="<?php echo esc_url( get_permalink( $prevpost->ID ) ) ?>"><h5><i class="fas fa-angle-double-left"></i> <?php echo esc_html("Previous Post",'crysa');?></h5></a>
                    </div>
                <?php } ?>
                <?php if( ! empty( $nextpost ) ) { ?>
                    <div class="post-next">
                        <a class="post-next" href="<?php echo esc_url( get_permalink( $nextpost->ID ) ) ?>"><h5><?php echo esc_html("Next Post",'crysa');?> <i class="fas fa-angle-double-right"></i></h5></a>
                    </div>
                <?php } ?>
            </div>
            <?php 
                endif;
            ?>
        </div>
    </div>
    <!-- Item -->

  
    <div class="blog-comments">
        <!-- Start Comments Form -->
        <?php
            comments_template();
        ?>
        <!-- End Comments Form -->
    </div>

<?php else : 
    if(has_post_thumbnail()){
        $extra_class = '';
    }else{
        $extra_class = 'thumb-less';
    } ?>
    <!-- Single Item -->
    <div <?php post_class('single-item'); ?> >
        <div class="item <?php echo esc_attr($extra_class); ?>">
            <?php if( has_post_thumbnail() ): ?>
            <div class="thumb">
               <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('crysa_900x500'); ?>
                </a>
            </div>
            <?php endif;?>
            <div class="info">
                <div class="meta">
                    <ul>
                        <li>
                            <i class="fas fa-calendar-alt"></i> <?php echo get_the_date( get_option('date_format')) ;?>
                        </li>
                        <li>
                            <a href="<?php echo get_author_posts_url( get_the_ID(), get_the_author_meta( 'user_nicename' ) ); ?>">
                                <i class="fas fa-user-circle"></i>
                                <span><?php echo get_the_author() ;?></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="content">
                    <h3>
                         <a href="<?php  the_permalink();  ?>"><?php the_title(); ?></a>
                    </h3>
                    <?php global $crysa_option; if(!empty($crysa_option['content_length'])):?>
                        <p>
                            <?php echo esc_html(wp_trim_words(get_the_content(),$crysa_option['content_length'],'')); ?>
                        </p>
                    <?php else:?>
                        <p>
                           <?php echo esc_html(wp_trim_words(get_the_content(),'50','')); ?>
                        </p>
                    <?php endif?>
                    <a class="btn btn-theme effect btn-md" href="<?php the_permalink(); ?>"><?php global $crysa_option; if(!empty($crysa_option['blog_readmore'])): echo esc_html($crysa_option['blog_readmore']); else: echo esc_html__("Read More",'crysa'); endif;?></a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Single Item -->
<?php endif; ?>