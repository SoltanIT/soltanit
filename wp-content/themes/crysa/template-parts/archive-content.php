<?php
/**
 * Template part for displaying archive posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package crysa
 */

if(has_post_thumbnail()){
    $extra_class = '';
}else{
    $extra_class = 'thumb-less';
}
?>
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
                            <i class="fas fa-user"></i>
                            <span><?php echo get_the_author() ;?></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="content">
                <h3>
                     <a href="<?php  the_permalink();  ?>"><?php the_title(); ?></a>
                </h3>
                <p>
                   <?php echo esc_html(wp_trim_words(get_the_content(),esc_html(50),'')); ?>
                </p>
                <a class="btn circle btn-theme effect btn-md" href="<?php  the_permalink();  ?>"><?php echo esc_html__("Read more",'crysa') ?></a>
            </div>
        </div>
    </div>
</div>
<!-- End Single Item -->