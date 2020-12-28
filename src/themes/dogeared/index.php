<?php get_header(); ?>
<div class="row">
    <div class="col-md-3">
        <div class="col-md-12 category-section">
            <?php if(is_active_sidebar('sidebar')) : ?>
                <?php dynamic_sidebar('sidebar'); ?>
            <?php endif; ?>
        </div>

    </div>
    <div class="col-md-9">
        <div class="row">
            <?php if(have_posts()) : ?>
                <?php while(have_posts()) : the_post(); ?>
                    <?php get_template_part('content', get_post_format()); ?>
                <?php endwhile; ?>
            <?php else : ?>
                <?php echo wpautop('Sorry, no posts were found'); ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
