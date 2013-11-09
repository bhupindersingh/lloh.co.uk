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

$route['default_controller'] = "login";
$route['404_override'] = 'error404';
//$route['news_category/index.html/(:any)'] = 'news_category/index/$1';
$route['manage_articles/index.html/(:any)'] = 'manage_articles/index/$1';
$route['manage_pages/index.html/(:any)'] = 'manage_pages/index/$1';
$route['manage_news/index.html/(:any)'] = 'manage_news/index/$1';
$route['manage_videos/index.html/(:any)'] = 'manage_videos/index/$1';
$route['manage_images/index.html/(:any)'] = 'manage_images/index/$1';
$route['organization_groups/index.html/(:any)'] = 'organization_groups/index/$1';
$route['manage_directory/index.html/(:any)'] = 'manage_directory/index/$1';
$route['manage_comments/index.html/(:any)'] = 'manage_comments/index/$1';
$route['manage_members/index.html/(:any)'] = 'manage_members/index/$1';
$route['admins_manage/index.html/(:any)'] = 'admins_manage/index/$1';
/* End of file routes.php */
/* Location: ./application/config/routes.php */