<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Karyon Framework Configuration File
| -------------------------------------------------------------------------
| This file lets you define default values to be passed into views
| when calling MY_Controller's render() function.
|
*/

$config['karyon_config'] = array(

	// Site name
	'site_name' => 'Karyon Framework',

	// Default page title prefix
	'page_title_prefix' => '',

	// Default page title
	'page_title' => 'Karyon Framework',

	// Default meta data
	'meta_data'	=> array(
		'author'		=> 'Karyon Solutions',
		'description'	=> 'Karyon Solutions Framework',
		'keywords'		=> ''
		),

	// Default scripts to embed at page head or end
	'scripts' => array(
		'head'	=> array(
			'assets/admin/plugins/jQuery/jquery-2.2.3.min.js',
			),
		'foot'	=> array(
			'assets/third_party/bootstrap/dist/js/bootstrap.min.js',
			'https://code.jquery.com/ui/1.11.4/jquery-ui.min.js',
			'assets/admin/plugins/datatables/jquery.dataTables.min.js',
			'assets/admin/plugins/datatables/dataTables.bootstrap.min.js',
			'assets/admin/plugins/slimScroll/jquery.slimscroll.min.js',
			'assets/admin/plugins/fastclick/fastclick.js',
			'assets/admin/dist/js/app.min.js',
			'assets/admin/dist/js/demo.js',
			'assets/admin/plugins/select2/select2.full.min.js',
			'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js',
			'assets/admin/plugins/fullcalendar/fullcalendar.min.js',
			'assets/admin/plugins/timepicker/bootstrap-timepicker.min.js',
			'assets/admin/plugins/input-mask/jquery.inputmask.js',
			'assets/admin/plugins/input-mask/jquery.inputmask.date.extensions.js',
			'assets/admin/plugins/iCheck/icheck.min.js',
			'assets/admin/dist/js/custom-file-input.js',
			'https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js',
			'assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js',
			'assets/admin/plugins/daterangepicker.js',
			),
		),

	// Default stylesheets to embed at page head
	'stylesheets' => array(
		'screen' => array(
			'assets/third_party/bootstrap/dist/css/bootstrap.min.css',
			'assets/third_party/font-awesome/css/font-awesome.min.css',
			'https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css',
			'assets/admin/plugins/datatables/dataTables.bootstrap.css',
			'assets/admin/plugins/select2/select2.min.css',
			'assets/admin/plugins/timepicker/bootstrap-timepicker.min.css',
			'assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css',
			'assets/admin/plugins/fullcalendar/fullcalendar.min.css',
			'assets/admin/plugins/fullcalendar/fullcalendar.print.css',
			'assets/admin/dist/css/AdminLTE.css',
			'assets/admin/plugins/iCheck/square/blue.css',
			'assets/admin/dist/css/skins/_all-skins.css',
			'assets/admin/dist/css/demo.css',
			'assets/admin/dist/css/component.css',
			'assets/admin/dist/css/custom.css',
			'assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
			'assets/admin/plugins/daterangepicker.css',
			)
		),

	// Default CSS class for <body> tag
	'body_class' => '',

	// Menu items
	'menu' => array(
		'admin' => array(
			'name'		=> 'admin',
			'url'		=> '',
			),
		),

	// Login page
	'login_url' => 'login/loginPage',

	// Restricted pages
	'page_auth' => array(
		),

	// Debug tools
	'debug' => array(
		'view_data'	=> FALSE,
		'profiler'	=> FALSE
		),
	);
