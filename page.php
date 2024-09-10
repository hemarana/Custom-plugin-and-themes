<?php get_header() ?>
<?php if ( get_header_image() ) : ?>
    <div id="site-header">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <img src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
        </a>
    </div>
<?php endif; ?>
<div class="container">
<?php     $thumnail = get_the_post_thumbnail_url(get_the_id(), 'full');    ?>
    <img src="<?php echo $thumnail ?>" alt="<?php get_the_title()?>" class="img-fluid">
    <?php 

if ( have_posts() ) :
    while ( have_posts() ) : the_post();
    echo the_title();
       echo the_content();

    endwhile;
else :
    _e( 'Sorry, no posts matched your criteria.', 'textdomain' );
endif;
?>
</div>

<?php get_footer() ?>