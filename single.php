<?php get_header(); ?>


<div class="container mt-5">

    <div class="row">
        <?php if (have_posts()): ?>
            <?php while (have_posts()):
                the_post(); ?>
                <?Php the_post_thumbnail('large'); ?>
                <div class="col-sm-8 p-3  ">

                    <h2><?php the_title(); ?></h2>
                    <div><?php the_content(); ?></div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No posts found.</p>
            </div>
        <?php endif; ?>
    </div>
    <div class="col-sm-4 p-3  "> <?php get_sidebar('sidebar-1'); ?></div>
</div>
</div>
<?php get_footer() ?>