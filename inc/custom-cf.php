<?php 

define( 'CS_ACTIVE_FRAMEWORK',   true  ); // default true
define( 'CS_ACTIVE_METABOX',     false ); // default true
define( 'CS_ACTIVE_TAXONOMY',    false ); // default true
define( 'CS_ACTIVE_SHORTCODE',   false ); // default true
define( 'CS_ACTIVE_CUSTOMIZE',   false ); // default true
define( 'CS_ACTIVE_LIGHT_THEME',  true  ); // default false

// framework options filter example
function extra_cs_framework_options( $options ) {

 $options      = array(); // remove old options

  $options[]    = array(
    'name'      => 'header_section_id',
    'title'     => 'Banner Section',
    'icon'      => 'fa fa-heart',
    'fields'    => array(

      array(
        'id' => 'banner',
        'type' => 'image',
        'title' => 'Add Banner Image',
        'add_title' => 'Add Banner',
      ),

      array(
        'id'    => 'option_id',
        'type'  => 'text',
        'title' => 'Sub heading',
      ),
      array(
        'id'    => 'heading',
        'type'  => 'text',
        'title' => 'Heading',
      ),

      array(
        'id'    => 'banner_button_text',
        'type'  => 'text',
        'title' => 'Button text',
      ),

      array(
        'id'    => 'banner_button_url',
        'type'  => 'text',
        'title' => 'Button Url',
      ),



      array(
      		'id'=>'header_color',
      		'type'=>'color_picker',
      		'title'=> 'Header Title'
      )
    )
  );

  $options[]  = array(
    'name'=> 'footer_section',
    'title'=> 'Footer Section',
    'icon'      => 'fa fa-heart',
    'fields' =>array(
      array(
        'id'=>'footer_copy',
        'type' =>'text',
        'title' => 'Footer Copyeight'
      ),
      array(
        'id'=>'footer_copy_color',
        'type' =>'color_picker',
        'title' => 'Footer Copyeight Color'
      ),

      array(
        'id'=>'footer_link_color',
        'type' =>'color_picker',
        'title' => 'Footer Link Color'
      ),
    )
  );

  return $options;

}
add_filter( 'cs_framework_options', 'extra_cs_framework_options' );

