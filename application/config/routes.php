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
$route['default_controller']    = 'Guest_Controller/index';
$route['404_override']          = '';
$route['translate_uri_dashes']  = FALSE;
$route['play']                  = 'Guest_Controller/gamesShow';
$route['welcome']               = 'Guest_Controller/index';
$route['contact']               = 'Guest_Controller/contact';
$route['send']                  = 'Guest_Controller/sendMessage';

// Sms
$route['sms']                   = 'Sms_Controller/index';
$route['incoming']              = 'Sms_Controller/incoming';
$route['loginsms']              = 'Sms_Controller/loginSms'; // Post
$route['loginsmslink']          = 'Sms_Controller/loginSmsByLink'; // Get
$route['logoutsms']             = 'Sms_Controller/logoutSms';

// Admin
$route['login']                 = 'Admin_Controller/index';
$route['signin']                = 'Admin_Controller/signin'; // Post

// Category
$route['listcategory']          = 'Category_Controller/listCategory';
$route['addcategory']           = 'Category_Controller/addCategory';
$route['addnewcategory']        = 'Category_Controller/addNewCategory'; // Post
$route['editcategory']          = 'Category_Controller/editCategory';
$route['updatecategory']        = 'Category_Controller/updateCategory'; // Post


// Game
$route['dashboard']             = 'Game_Controller/dashboard';
$route['logout']                = 'Game_Controller/logout';
$route['listgameactive']        = 'Game_Controller/listGameActive';
$route['listgameinactive']      = 'Game_Controller/listGameInactive';
$route['listgamepromo']         = 'Game_Controller/listGamePromo';
$route['addgame']               = 'Game_Controller/addGame';
$route['editgame']              = 'Game_Controller/editGame';
$route['addnewgame']            = 'Game_Controller/addNewGame'; // Post
$route['changestatusgame']      = 'Game_Controller/changeStatGame';
$route['promogame']             = 'Game_Controller/promoGame';

// Report
$route['report']                = 'Report_Controller/allReport';
$route['dailyreport']           = 'Report_Controller/dailyReport';


//BitLy
$route['bitly']                 = 'Bitly_Controller/test';
