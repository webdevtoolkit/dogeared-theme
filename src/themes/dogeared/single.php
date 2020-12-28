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
<?php if(have_posts()) : ?>
    <?php while(have_posts()) : the_post(); ?>
    <?php endwhile; ?>
    <article class="post animate">
        <p class="meta">
            Posted at <?php the_time(); ?> on <?php the_date(); ?> by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
        </p>

        <hr/>

        <?php if(has_post_thumbnail()) : ?>
            <div class="post-thumbnail animated fadeInRight">
                <?php
                $attr = array(
                    'class' => '.fadeInRight'
                );
                ?>

                <?php echo get_the_post_thumbnail($id,
                    'large', $attr);   ?>

            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-md-12 back-section">
                <br />
                <a href="<?php echo site_url(); ?>" class="btn btn-sm btn-danger">Back</a>
            </div>
            <div class="col-md-12 article-body">
                <h1><?php the_title(); ?></h1>
                <p><?php the_content(); ?></p>
            </div>
        </div>
    </article>
<?php else : ?>
    <?php echo wpautop('Sorry, there are no posts'); ?>
<?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
