<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "articulos_controller";
$route['404_override'] = '';

// Articulos
$route['articulos'] = "articulos_controller/index";
$route['articulos/edit/(:any)'] = "articulos_controller/edit";
$route['articulos/update'] = "articulos_controller/update";
$route['articulos/new'] = "articulos_controller/nuevo";
$route['articulos/create'] = "articulos_controller/create";
$route['articulos/show/(:any)'] = "articulos_controller/show";
$route['articulos/destroy/(:any)'] = "articulos_controller/destroy";

// Usuarios
$route['usuarios/edit/(:any)'] = "usuarios_controller/edit";
$route['usuarios/update'] = "usuarios_controller/update";
$route['usuarios/new'] = "usuarios_controller/nuevo";
$route['usuarios/create'] = "usuarios_controller/create";
$route['usuarios/show/(:any)'] = "usuarios_controller/show";
$route['usuarios/destroy/(:any)'] = "usuarios_controller/destroy";

// Tags
$route['tags/edit/(:any)'] = "tags_controller/edit";
$route['tags/update'] = "tags_controller/update";
$route['tags/new'] = "tags_controller/nuevo";
$route['tags/create'] = "tags_controller/create";
$route['tags/show/(:any)'] = "tags_controller/show";
$route['tags/destroy/(:any)'] = "tags_controller/destroy";

//Sesiones
$route['sesiones/new'] = "sesiones_controller/nuevo";
$route['sesiones/create'] = "sesiones_controller/create";
$route['sesiones/destroy'] = "sesiones_controller/destroy";

/* End of file routes.php */
/* Location: ./application/config/routes.php */