<?php
function my_styles_method() {
	wp_enqueue_style(
		'custom-style',
		get_template_directory_uri() . '/assets/css/custom_script.css'
	);
         $footer_copy_color = cs_get_option('footer_copy_color');
         $footer_link_color = cs_get_option('footer_link_color');

        $custom_css = "
                .copyright{
                        color: {$footer_copy_color};
                }
                .footer-link {
                        color: {$footer_link_color};
                }

                ";

        wp_add_inline_style( 'custom-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'my_styles_method' );