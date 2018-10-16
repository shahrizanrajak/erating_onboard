<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers:        
        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    exit(0);
}

// [url] = [controller/model/item]
//$route['default_controller'] = 'welcome';
// getURL = Controller call
//$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['default_controller'] = 'administrator'; 


// Administrator
$route['administrator'] = 'administrator';
$route['dashboard'] = 'administrator/dashboard';
$route['dashboard/(:any)'] = 'administrator/view/$1';
$route['users'] = 'administrator/user_list_all';
$route['user-details/(:any)'] = 'administrator/user_details/$1';
$route['user-save'] = 'administrator/user_save';
$route['user-update'] = 'administrator/user_update';
$route['user-remove'] = 'administrator/user_remove';
$route['user'] = 'administrator/user_view';
$route['erating-list'] = 'administrator/erating_list';
$route['erating-list2'] = 'administrator/erating_list2';
$route['erating-details/(:any)'] = 'administrator/erating_details/$1';
$route['erating-save-agency'] = 'administrator/erating_save_agency';
$route['erating-update-agency'] = 'administrator/erating_update_agency';
$route['erating-save-config'] = 'administrator/erating_save_config';
$route['erating-update-smiley'] = 'administrator/erating_update_smiley';
$route['erating-update-question'] = 'administrator/erating_update_question';
$route['image-set'] = 'administrator/save_image';
$route['configuration'] = 'administrator/configuration';

// Coordinator controller
$route['coor-dashboard'] = 'coordinator/dashboard';
$route['coor-user'] = 'coordinator/user_view';
$route['coor-erating-list'] = 'coordinator/erating_list';
// $route['user-details/(:any)'] = 'coordinator/user_details/$1';

// User controller 
$route['administrator'] = 'user/admin';
$route['login'] = 'user/login';
$route['logout'] = 'user/logout';
$route['login-validate'] = 'user/validate';
$route['register'] = 'user/register';
$route['display/(:any)'] = 'counter/display/$1';
$route['rateit'] = 'counter/rate_it';

// Report
$route['report'] = 'report/report';
$route['user-report'] = 'report/user_report';

// Admin API 

// $route['api/user-data'] = 'administrator/user_data';
$route['api/erating-data'] = 'administrator/erating_data';
$route['api/user-list-by-agency/(:any)'] = 'administrator/user_list_by_agency/$1';
$route['api/image-get/(:any)/(:any)'] = 'administrator/api_get_image/$1/$2';
$route['api/config-agency/(:any)'] = 'administrator/erating_get_config/$1';
$route['api/user-list-all'] = 'administrator/user_list';
$route['api/report-data'] = 'report/report_data';
$route['api/report-all/(:any)'] = 'report/report_all/$1';
$route['api/report-by-rated/(:any)'] = 'report/report_rated/$1';
$route['api/report-feedback/(:any)'] = 'report/report_feedback/$1';
$route['api/report-by-rated-category'] = 'report/report_rated_category';
$route['api/report-rated-monthly'] = 'report/report_rated_monthly';
$route['api/report-rated-monthly-agency'] = 'report/report_rated_monthly_agency';
$route['api/user-log/(:any)'] = 'report/report_user_log/$1';
$route['api/report-rated-monthly-agency-pivot/(:any)'] = 'report/report_rated_monthly_agency_pivot/$1';
$route['api/dashboard_total_rating'] = 'report/dashboard_get_total_rating';
$route['api/dashboard_total_active'] = 'report/dashboard_get_total_active';
$route['api/dashboard_total_comment'] = 'report/dashboard_get_total_comment';
$route['api/list-smiley'] = 'administrator/list_smiley';
$route['api/list-question'] = 'administrator/list_question';
$route['api/get-smiley/(:any)'] = 'administrator/get_smiley/$1';
$route['api/get-question/(:any)'] = 'administrator/get_question/$1';

// Coordinator API

// API
// $route['rest-call'] = 'api/rest_call';
$route['asnaf-save'] = 'api/asnaf_save';	
$route['user-score/(:any)'] = 'api/client_score/$1';		// PREV: $route['user-score/(:any)'] = 'api/user_score/$1';
$route['user-register'] = 'api/client_save';
$route['asnaf-status-mobile/(:any)'] = 'api/asnaf_status/$1';
$route['users-by-parliment/(:any)'] = 'api/users_by_parliment/$1';
$route['department-by-ministry/(:any)'] = 'api/department_by_ministry/$1';
$route['branch-by-department/(:any)'] = 'api/branch_by_department/$1';

//