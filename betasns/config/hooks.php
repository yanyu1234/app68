<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/


$hook['pre_system'][] = array(
		'class'    => 'H',
		'function' => 'pre_system',
		'filename' => 'H.php',
		'filepath' => 'hooks',
);

$hook['pre_controller'][] = array(
		'class'    => 'H',
		'function' => 'pre_controller',
		'filename' => 'H.php',
		'filepath' => 'hooks',
);

$hook['post_controller_constructor'][] = array(
		'class'    => 'H',
		'function' => 'post_controller_constructor',
		'filename' => 'H.php',
		'filepath' => 'hooks',
);

$hook['post_controller'][] = array(
		'class'    => 'H',
		'function' => 'post_controller',
		'filename' => 'H.php',
		'filepath' => 'hooks',
);

$hook['display_override'][] = array(
		'class'    => 'H',
		'function' => 'display_override',
		'filename' => 'H.php',
		'filepath' => 'hooks',
);

$hook['cache_override'][] = array(
		'class'    => 'H',
		'function' => 'cache_override',
		'filename' => 'H.php',
		'filepath' => 'hooks',
);

$hook['post_system'][] = array(
		'class'    => 'H',
		'function' => 'post_system',
		'filename' => 'H.php',
		'filepath' => 'hooks',
);



/* End of file hooks.php */
/* Location: ./application/config/hooks.php */