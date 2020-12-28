<?php get_header(); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 sidebar">
            <?php if(is_active_sidebar('sidebar')) : ?>
                <?php dynamic_sidebar('sidebar'); ?>
            <?php endif; ?>
        </div>
        <div class="col-md-9 page-content">
            <div class="col-md-12 page-header-container">
                <h2 class="page-header">
                    <?php
                    if(is_category()){
                        single_cat_title();
                    }else if(is_author()){
                        the_post();
                        echo 'Archives By Author: ' .get_the_author();
                        rewind_posts();
                    }else if(is_tag()){
                        single_tag_title();
                    }else if(is_day()){
                        echo 'Archives By Day: ' .get_the_date();
                    }else if(is_month()){
                        echo 'Archives By Month: ' .get_the_date('F Y');
                    }else if(is_year()){
                        echo 'Archives By Year: ' .get_the_date('Y');
                    }else{
                        echo 'Archives';
                    }
                    ?>
                </h2>
            </div>
            <div class="col-md-12">
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
</div>

<?php get_footer(); ?>



