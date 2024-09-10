<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo get_the_title();?> | <?php bloginfo('name')?></title>
   <?php wp_head(); ?>

   

</head>


<body>
    

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <div class="logo">
        <a href="<?php bloginfo('url')?>">
<?php the_custom_logo()?>
        </a>
   
    </div>
    <ul class="navbar-nav">
    <?php
    wp_nav_menu( array( 
        'theme_location' => 'header-menu',
        'menu_class' => 'navbar-nav',
        'container' => false,
        'li_class' => 'nav-item',
        'a_class' => 'nav-link',
        'active_class' => 'active',
        'walker' => new Custom_Submenu_Walker()
    ) );
    ?>
 
</ul>
<div class="dropdown">
    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
      Dropdown button
    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="#">Link 1</a></li>
      <li><a class="dropdown-item" href="#">Link 2</a></li>
      <li><a class="dropdown-item" href="#">Link 3</a></li>
    </ul>
  </div>

 
</div>
  </div>
  

  
</nav>

