<!DOCTYPE html>
<html <?php language_attributes();?>>

  <head>

    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Custom styles for this template -->
    
<?php wp_head();?>
  </head>

  <body id="page-top" <?php body_class();?>>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"><?php bloginfo('name')?></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">

        <!--   <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#team">Team</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
          </ul> -->
        <?php wp_nav_menu(array(
        	"theme_location"=>'main-menu',
        	"menu_class" => 'navbar-nav text-uppercase ml-auto',
          "walker" => new Walker_Nav_Menuss(),
        	));



        	?>

        </div>
      </div>
    </nav>
 <?php
if (function_exists('cs_get_option')) {

    $banner = cs_get_option('banner');
    $banner_url = wp_get_attachment_image_src($banner, 'full');
    //var_dump($banner_url);
    $bannaer_pre = cs_get_option('option_id');
    $heading = cs_get_option('heading');
    $banner_button_text = cs_get_option('banner_button_text');
    $banner_button_url = cs_get_option('banner_button_url');
}
?>
    <!-- Header -->
    <header class="masthead" style="background-image:url(<?php echo $banner_url[0]?>);">
      <div class="container">
        <div class="intro-text">
         
          <div class="intro-lead-in"><?php echo esc_html($bannaer_pre);?></div>
          <div class="intro-heading text-uppercase"><?php echo esc_html($heading);?></div>
          <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="<?php echo esc_url($banner_button_url);?>"><?php echo esc_html($banner_button_text);?></a>
        </div>
      </div>
    </header>