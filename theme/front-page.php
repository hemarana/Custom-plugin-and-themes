<?php get_header(); ?>
<div class="container">
  <?php get_template_part('templates-part/home', 'feaure') ?>
  <h1>Above this templates</h1>
</div>

<?php
$post_fetch = array(
  'post_type' => 'slider', // Enclose post type in quotes
  'posts_per_page' => 3,
  'order' => 'ASE'
);
$post_query = new WP_Query($post_fetch);
if ($post_query->have_posts()): ?>
  <div class="post-content">
    <div class="container">
      <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
        <div class="carousel-inner">
          <?php $active = true; // Variable to set the active class only for the first item ?>
          <?php while ($post_query->have_posts()): $post_query->the_post(); ?>
            <div class="carousel-item <?php if($active) { echo 'active'; $active = false; } ?>">
           <?php $slider_url = get_post_meta(get_the_id(), 'url_url', true) ?>
            <a href="<?php echo $slider_url ?>" target="blank"><?php the_post_thumbnail('full', array('class' => 'd-block w-100 post-img-theme')); ?></a>
            </div>
          <?php endwhile; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php wp_reset_postdata(); // Reset the global post object to ensure the rest of the page works correctly ?>



<div class="container mt-5">
  <div class="row">
    <div class="col-sm-4">
      <?php get_sidebar('sidebar-1'); ?>
    </div>
    <div class="col-sm-8">
      <?php
      $post_fetch = array(
        'cat' => 1  // Ensure the category ID is correct
      );
      $post_query = new WP_Query($post_fetch);

      if ($post_query->have_posts()): ?>
        <?php while ($post_query->have_posts()):
          $post_query->the_post(); ?>
          <div class="post-content">
            <a href="<?php echo get_the_permalink(get_the_ID()) ?>"> <?php the_title(); ?>
              <?php the_post_thumbnail(
                'full',
                array(
                  'class' => 'post-img-theme',
                  'style' => 'width: 100px; height:100px;'
                )
              ); ?></a>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p>No posts found</p>
      <?php endif; ?>



      <?php if (have_posts()): ?>
        <?php while (have_posts()):
          the_post(); ?>
          <?php the_content(); ?>
        <?php endwhile; ?>
      <?php else: ?>
        <p>No posts found.</p>
      </div>
    <?php endif; ?>
  </div>
</div>

<div class="container">
  <?php
  $post_fetch = array(
    'post_type' => 'product',
    'posts_per_page' => 3,
    'order' => 'DESC'

  );
  $post_query = new WP_Query($post_fetch);

  if ($post_query->have_posts()): ?>
    <?php while ($post_query->have_posts()):
      $post_query->the_post(); ?>
      <div class="post-content">
        <a href="<?php echo get_the_permalink(get_the_ID()) ?>"> <?php the_title(); ?>
          <?php the_post_thumbnail(
            'full',
            array(
              'class' => 'post-img-theme',
              'style' => 'width: 100px; height:100px;'
            )
          ); ?></a>
      </div>
    <?php endwhile; ?>
  <?php else: ?>
    <p>No posts found</p>
  <?php endif; ?>
</div>
<?php get_footer() ?>