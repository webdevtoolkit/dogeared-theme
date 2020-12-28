<div class="col-md-4 pic">
    <?php if(has_post_thumbnail()) : ?>
        <div class="post-thumbnail">
            <?php
            $attr = array(
                'class' => 'fadeInRight'
            );
            ?>
        </div>
        <a href="<?php echo the_permalink(); ?>">
            <?php echo get_the_post_thumbnail($id, 'large', $attr); ?>
        </a>
    <?php endif; ?>
    <a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a>
</div>
