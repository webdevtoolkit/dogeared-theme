<?php get_header();
/* Template Name: Pub Theatre Festival */
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-9 page-content">
            <div class="col-md-12 featured-image">
                <?php if ( has_post_thumbnail() ) {
                    the_post_thumbnail();
                } ?>
            </div>
            <div class="col-md-12">
                <h2><?php the_title(); ?></h2>
                <?php the_content(); ?>
            </div>

            <div class="col-md-12">
                <?php
                if (have_posts()) :
                    $args = array ( 'category' => 3, 'posts_per_page' => 5);
                    $myposts = get_posts( $args );
                    foreach( $myposts as $post ) :
                        //var_dump(setup_postdata($post)); ?>
                        <?php get_template_part('content', get_post_format()); ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-3 sidebar">
            <?php if(is_active_sidebar('sidebar')) : ?>
                <?php dynamic_sidebar('sidebar'); ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>


