<?php
add_action("after_setup_theme","theme_start");
function theme_start(){
	add_theme_support('custom-header');
	add_theme_support('custom-background');
	add_theme_support('title-tag');

	register_nav_menus(array(
		'main-menu'=> 'Main Menu',
	));
}

require get_template_directory().'/inc/custom-menu.php';

add_shortcode('ami','custom_shorcode_add');
function custom_shorcode_add($attr,$content){
	//print_r($attr);
	///echo "color:".$attr['kalar'];
	$allattr = shortcode_atts(array(
			'kalar' => '',
			'size' => '',
	),$attr);
	?>
    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase" style="font-size:<?php echo $allattr['size']?>;color:<?php echo $allattr['kalar'];?>"><?php echo $content;?></h2>
            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-primary"></i>
              <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">E-Commerce</h4>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-primary"></i>
              <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Responsive Design</h4>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-primary"></i>
              <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Web Security</h4>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
          </div>
        </div>
      </div>
    </section>

	<?php
}


add_shortcode('user','custom_user_shotcode');
function custom_user_shotcode($atts){
	$user_role = $atts['role'];

	$all_user = get_users(array("role"=>$user_role));

	echo "<pre>";
	foreach ($all_user as $key => $value) {
		echo "Name: " .$value->data->display_name."<br>";
		echo "Email: " .$value->data->user_email."<br>";
	}

	print_r($all_user);


}

add_shortcode('hi',function(){
  return "<h3>hi,How are You</h3>";
});

add_shortcode('hlw',function(){
  ob_start();
  ?>
   <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-primary"></i>
              <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">E-Commerce</h4>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
          </div>
  <?php
  return ob_get_clean();
});

add_action('wp_enqueue_scripts','agency_style_and_script');
function agency_style_and_script(){

  wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/assets/vendor/bootstrap/css/bootstrap.min.css');
  wp_enqueue_style( 'agency-fonts', agecy_fonts_save());

  wp_enqueue_style( 'all', get_template_directory_uri().'/assets/vendor/fontawesome-free/css/all.min.css');

  wp_enqueue_style( 'agency', get_template_directory_uri().'/assets/css/agency.css');

   wp_enqueue_script( 'bootstrap-bundle', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', array('jquery'), '1.0.0', true );

   wp_enqueue_script( 'easing', get_template_directory_uri() . '/assets/vendor/jquery-easing/jquery.easing.min.js', array('jquery'), '1.0.0', true );

   wp_enqueue_script( 'jqBootstrapValidation', get_template_directory_uri() . '/assets/js/jqBootstrapValidation.js', array('jquery'), '1.0.0', true );

   wp_enqueue_script( 'contact_me', get_template_directory_uri() . '/assets/js/contact_me.js', array('jquery'), '1.0.0', true );
   
   wp_enqueue_script( 'agency', get_template_directory_uri() . '/assets/js/agency.min.js', array('jquery'), '1.0.0', true );
}

function agecy_fonts_save(){
      $fonts_url = '';

      /*
       * Translators: If there are characters in your language that are not
       * supported by Libre Franklin, translate this to 'off'. Do not translate
       * into your own language.
       */
      $libre_franklin = _x( 'on', 'Libre Franklin font: on or off', 'twentyseventeen' );

      if ( 'off' !== $libre_franklin ) {
        $font_families = array();

        $font_families[] = 'Montserrat:400,700';
        $font_families[] = 'Kaushan Script';
        $font_families[] = 'Droid Serif:400,700,400italic,700italic';
        $font_families[] = 'Roboto Slab:400,100,300,700';

        $query_args = array(
          'family' => urlencode( implode( '|', $font_families ) ),
          'subset' => urlencode( 'latin,latin-ext' ),
        );

        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
      }

      return esc_url_raw( $fonts_url );
}
?>

<?php
if (function_exists('kc_add_map')) 
{ 
  kc_add_map(
      array(
          'title_description' => array(
              'name' => 'Title And Description',
              'category' => 'Agency',
              'icon' => 'fa fa-facebook',
              'title' => 'Title And Description',
 
              'params' => array(
                  array(
                      'name' => 'title',
                      'label' => 'Title',
                      'type' => 'text',
                  ),
                  array(
                      'name' => 'description',
                      'label' => 'Description',
                      'type' => 'text',
                  ),
              )
            
 
 
          )
      )
  );

    kc_add_map(
      array(
          'service' => array(
              'name' => 'Service',
              'category' => 'Agency',
              'icon' => 'fa fa-facebook',
 
              'params' => array(
                  array(
                      'name' => 'icon',
                      'label' => 'Icon',
                      'type' => 'icon_picker',
                  ),
                  array(
                      'name' => 'title',
                      'label' => 'Title',
                      'type' => 'text',
                  ),

                  array(
                      'name' => 'description',
                      'label' => 'Description',
                      'type' => 'textarea',
                  ),
              )
            
 
 
          )
      )
  );
 
}

function title_description_shortcoder($atts,$content){

  $short = shortcode_atts(array(
       'title'=> '',
       'description'=>''

  ),$atts);
  ?>
  <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase"><?php echo $short['title']?></h2>
            <h3 class="section-subheading text-muted"><?php echo $short['description']?></h3>
          </div>
    <?php
}
add_shortcode('title_description','title_description_shortcoder');

function service_section_shortcode($atts,$content){

  $short = shortcode_atts(array(
       'icon'=> '',
       'title'=> '',
       'description'=>''

  ),$atts);
  ob_start()
  ?>
          <div class="text-center">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-primary"></i>
              <i class="<?php echo $short['icon'];?> fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading"><?php echo $short['title'];?></h4>
            <p class="text-muted"><?php echo $short['description'];?></p>
          </div>
          
    <?php
    return ob_get_clean();
}
add_shortcode('service','service_section_shortcode');
 

 require get_template_directory().'/inc/logo.php';
 //require get_template_directory().'/inc/cf/cs-framework.php';
 require get_template_directory().'/inc/custom-cf.php';
 require get_template_directory().'/inc/helper.php';
 require get_template_directory().'/inc/class-tgm-plugin-activation.php';
 require get_template_directory(). '/inc/plugin.php';
 require get_template_directory(). '/inc/demo.php';

?>