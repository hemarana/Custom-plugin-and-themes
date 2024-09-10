<?php get_header(); ?>
<div class="container">
    <main id="main-content">
        <header class="page-header">
            <?php the_archive_title('<h1 class="page-title">', '</h1>'); ?>
            <?php the_archive_description('<div class="archive-description">', '</div>'); ?>
        </header>

        <?php if (have_posts()): ?>
            <?php while (have_posts()): the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h2 class="entry-title">
                            <a href="<?php the_permalink(); ?>">
                                <?php // the_post_thumbnail('small'); ?>
                                <br><?php the_title(); ?>
                            </a>
                        </h2>
                    </header>
                    <div class="entry-summary">
                        <?php the_excerpt(); ?>
                    </div>
                </article>
            <?php endwhile; ?>

            <?php echo the_posts_pagination(); ?>
        <?php else: ?>
            <p><?php esc_html_e('No products found.', 'theme_learn'); ?></p>
        <?php endif; ?>
    </main>
</div>
<?php get_footer(); ?>
