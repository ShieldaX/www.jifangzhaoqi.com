<?php
/*--------------------------------------------------------------
Copyright (C) pixelemu.com
License: https://www.pixelemu.com/company/license PixelEmu Proprietary Use License
Website: https://www.pixelemu.com
Support: info@pixelemu.com
---------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/*	Scripts and styles functions
/*-----------------------------------------------------------------------------------*/
	get_template_part('/functions/register-scripts' );

/*-----------------------------------------------------------------------------------*/
/*	Include base functions
/*-----------------------------------------------------------------------------------*/
	get_template_part( '/functions/base-functions' );

/*-----------------------------------------------------------------------------------*/
/*	Include theme options
/*-----------------------------------------------------------------------------------*/
	get_template_part( '/functions/option-tree' );

/*-----------------------------------------------------------------------------------*/
/*	Include pagination fuction
/*-----------------------------------------------------------------------------------*/
	get_template_part( '/functions/pagination' );

/*-----------------------------------------------------------------------------------*/
/*	Include contact handler
/*-----------------------------------------------------------------------------------*/
	get_template_part( '/functions/send-email');
/*-----------------------------------------------------------------------------------*/
/*	TGM Activation
/*-----------------------------------------------------------------------------------*/
	require_once dirname( __FILE__ ) . '/functions/class-tgm-plugin-activation.php';
	add_action( 'tgmpa_register', 'pe_theme_register_plugins' );
	get_template_part('functions/class-tgm-plugin-activation-options');
/*-----------------------------------------------------------------------------------*/
/*	Include Plugin dir, required to check if megamenu is active
/*-----------------------------------------------------------------------------------*/
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

/*-----------------------------------------------------------------------------------*/
/*	Include Bootstrap NacWalker if Megamenu is Inactive or Not Installed
/*-----------------------------------------------------------------------------------*/		
	if ( is_plugin_inactive( 'megamenu/megamenu.php' ) ) {
			
			get_template_part( '/functions/includes/wp_bootstrap_navwalker' );
			
	}

remove_action('wp_head', 'wp_generator');