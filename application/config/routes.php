<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
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
$route['default_controller'] = "front";

$route['imedica/(.*)'] = 'imedica/$1';

$route['404_override'] = '';

$route['delete/(.*)'] = 'delete/$1';

$route['admin/update-order/slider'] = 'admin/updateOrder/slider';
$route['admin/update-order/page'] = 'admin/updateOrder/page';
$route['admin/update-order/clients'] = 'admin/updateOrder/clients';
$route['admin/update-order/services'] = 'admin/updateOrder/services';

$route['front'] = 'front';
$route['process'] = 'front/process';
$route['orderform'] = 'front/orderForm';
$route['verify'] = 'front/verify_order';
//$route['front/doc_category'] = 'front/doc_category';
$route['comment'] = 'front/addComment';
$route['signup_process'] = 'front/signup';
$route['processlogin'] = 'front/login';
$route['search'] = 'front/search';
$route['fb_login'] = 'fb_login';
$route['user_authentication'] = 'user_authentication';
$route['front/suggest'] = 'front/suggest';

$route['googlelogin'] = 'googlelogin';
$route['fblogin'] = 'fblogin';
$route['twitterlogin'] = 'twitterlogin';

$route['admin'] = 'admin';
$route['admin/login'] = 'login/index';
$route['login/verify'] = 'login/verify';
$route['admin/upload'] = 'admin/upload';
$route['admin/logout'] = 'admin/logout';
$route['admin/search'] = 'admin/search';
$route['admin/searchlist'] = 'admin/searchlist';
$route['admin/SearchString'] = 'admin/SearchString';
$route['admin/(.*)'] = 'admin';

$route['user'] = 'user';
$route['user/do_upload'] = 'user/do_upload';
$route['user/login'] = 'user_login/index';
$route['user_login/verify'] = 'user_login/verify';
$route['user/download'] = 'user/download_prescription';
$route['user/logout'] = 'user/logout';
$route['user/show_specific_patient'] = 'user/show_specific_patient';
$route['user/show_patient_details'] = 'user/show_patient_details';
$route['user/select_disease'] = 'user/select_disease';
$route['user/order_details'] = 'user/order_details';
$route['user/order_history'] = 'user/order_history';
$route['logout'] = 'front/logout';
$route['user/cancel_order'] = 'user/cancel_order';
$route['user/(.*)'] = 'user';

$route['default_controller'] = "front";
$route['(.*)/(.*)'] = 'front/twoSegment';
$route['(.*)'] = 'front/oneSegment';




/* End of file routes.php */
/* Location: ./application/config/routes.php */