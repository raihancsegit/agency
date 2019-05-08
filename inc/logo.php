<?php
if (function_exists('kc_add_map')) 
{ 
  kc_add_map(
      array(
          'logo' => array(
              'name' => 'Logo',
              'category' => 'Agency',
              'icon' => 'fa fa-facebook',
              'title' => 'Agency Logo',
 
              'params' => array(
                  array(
                      'name' => 'image',
                      'label' => 'Image',
                      'type' => 'attach_image',
                  ),
                  array(
                      'name' => 'url',
                      'label' => 'Url',
                      'type' => 'text',
                  ),
              )
            
 
 
          )
      )
  );

 
}



function logo_section_shortcode($atts,$content){

  $short = shortcode_atts(array(
       'image'=> '',
       'url'=> '',

  ),$atts);
  ob_start()
  ?>        
           
            <a href="<?php echo $short['url'];?>">
              <?php 
                 $logo = wp_get_attachment_image_src($short['image'],'thumbnail');
                 //print_r($logo);
              ?>
              <img class="img-fluid d-block mx-auto" src="<?php echo $logo[0];?>" alt="">
            </a>
         
          
    <?php
    return ob_get_clean();
}
add_shortcode('logo','logo_section_shortcode');