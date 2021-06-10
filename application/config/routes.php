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
$route['default_controller'] = 'auth';
$route['supplier'] = 'supplier/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['supplier/page/(:num)'] = 'supplier/index/$1';
$route['supplier/page'] = 'supplier/index';

$route['home'] = 'home';
$route['default_controller'] = 'home';

$route['towerone'] = 'TowerOne';
$route['towerone/page/(:num)'] = 'TowerOne/index/$1';
$route['towerone/page'] = 'TowerOne/index';


$route['towertwo'] = 'TowerTwo';
$route['towertwo/page/(:num)'] = 'TowerTwo/index/$1';
$route['towertwo/page'] = 'TowerTwo/index';

$route['towertree'] = 'TowerTree';
$route['towertree/page/(:num)'] = 'towerTree/index/$1';
$route['towertree/page'] = 'TowerTree/index';

$route['towerfour'] = 'TowerFour';
$route['towerfour/page/(:num)'] = 'TowerFour/index/$1';
$route['towerfour/page'] = 'TowerFour/index';

$route['towerfive'] = 'TowerFive';
$route['towerfive/page/(:num)'] = 'TowerFive/index/$1';
$route['towerfive/page'] = 'TowerFive/index';

$route['towersix'] = 'TowerSix';
$route['towersix/page/(:num)'] = 'TowerSix/index/$1';
$route['towersix/page'] = 'TowerSix/index';

$route['townhouse'] = 'TownHouse';
$route['townhouse/page/(:num)'] = 'TownHouse/index/$1';
$route['townhouse/page'] = 'TownHouse/index';

$route['report'] = 'Report';
$route['report/page/(:num)'] = 'Report/index/$1';
$route['report/page'] = 'Report/index';

$route['project'] = 'Project';
$route['project/page/(:num)'] = 'Project/index/$1';
$route['project/page'] = 'Project/index';

$route['reportpdf/(:num)'] = 'ReportPdf/index/id=$1';

// $route['exportexcel/export/(:num)'] = 'ExportExcel/Export/id=$1';

$route['towerOneFilter'] = 'towerOneFilter';
$route['towerOneFilter/page/(:num)'] = 'towerOneFilter/index/$1';
$route['towerOneFilter/page'] = 'towerOneFilter/index';

$route['towerTwoFilter'] = 'towerTwoFilter';
$route['towerTwoFilter/page/(:num)'] = 'towerTwoFilter/index/$1';
$route['towerTwoFilter/page'] = 'towerTwoFilter/index';

$route['towerTreeFilter'] = 'towerTreeFilter';
$route['towerTreeFilter/page/(:num)'] = 'towerTreeFilter/index/$1';
$route['towerTreeFilter/page'] = 'towerTreeFilter/index';

$route['towerFourFilter'] = 'towerFourFilter';
$route['towerFourFilter/page/(:num)'] = 'towerFourFilter/index/$1';
$route['towerFourFilter/page'] = 'towerFourFilter/index';

$route['townHouseFilter'] = 'townHouseFilter';
$route['townHouseFilter/page/(:num)'] = 'townHouseFilter/index/$1';
$route['townHouseFilter/page'] = 'townHouseFilter/index';

$route['towerOneFilter/(:any)'] = 'towerOneFilter/index/$1';
$route['towerOneFilter/(:any)/page/(:num)'] = 'towerOneFilter/index/$1/$2';
$route['towerOneFilter/(:any)/page'] = 'towerOneFilter/index/$1';


$route['towerTwoFilter/(:any)'] = 'towerTwoFilter/index/$1';
$route['towerTwoFilter/(:any)/page/(:num)'] = 'towerTwoFilter/index/$1/$2';
$route['towerTwoFilter/(:any)/page'] = 'towerTwoFilter/index/$1';

$route['towerTreeFilter/(:any)'] = 'towerTreeFilter/index/$1';
$route['towerTreeFilter/(:any)/page/(:num)'] = 'towerTreeFilter/index/$1/$2';
$route['towerTreeFilter/(:any)/page'] = 'towerTreeFilter/index/$1';

$route['towerFourFilter/(:any)'] = 'towerFourFilter/index/$1';
$route['towerFourFilter/(:any)/page/(:num)'] = 'towerFourFilter/index/$1/$2';
$route['towerFourFilter/(:any)/page'] = 'towerFourFilter/index/$1';


$route['townHouseFilter/(:any)'] = 'townHouseFilter/index/$1';
$route['townHouseFilter/(:any)/page/(:num)'] = 'townHouseFilter/index/$1/$2';
$route['townHouseFilter/(:any)/page'] = 'townHouseFilter/index/$1';

$route['listdataqc'] = 'Listdataqc';
$route['listdataqc/page/(:num)'] = 'listdataqc/index/$1';
$route['listdataqc/page'] = 'listdataqc/index';
$route['reportundangan/:any'] = 'ReportUndangan/index/$1';

$route['listundangan'] = 'ListUndangan';
$route['listundangan/page/(:num)'] = 'ListUndangan/index/$1';
$route['listundangan/page'] = 'ListUndangan/index';

$route['listDefect/(:any)'] = 'ListDefect/index/$1';
$route['listDefect/adddefect'] = 'ListDefect/adddefect';

?>