<?php 
/* This is about template
/* Template Name: About Template */
?>

<?php get_header() ?>
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
