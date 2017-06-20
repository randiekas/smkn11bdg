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
|	http://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route["dashboard"] = "dashboard";
$route["dashboard/(:any)"] = "dashboard/$1";
$route["engine"] = "engine";
$route["api/(:any)"] = "api/$1";
$route["api/(:any)/(:any)"] = "api/$1/$2";
$route["api/(:any)/(:any)/(:any)"] = "api/$1/$2/$3";

$route["engine/(:any)"] = "engine/$1";
$route["engine/(:any)/(:any)"] = "engine/$1/$2";
$route["engine/(:any)/(:any)/(:any)"] = "engine/$1/$2/$3";

$json = file_get_contents("application/config/keys.json");
$gate = json_decode($json,TRUE);
$route["(:any)"] = "welcome/failed_othorization";
$route["(:any)/(:any)"] = "welcome/failed_othorization";
$route["setting/module/user_manager"] = "setting/module/user_manager";
$route["setting/module/user_manager/(:any)"] = "setting/module/user_manager/$1";

//$route["setting/pemeliharaan/identitas_yayasan"] = "setting/pemeliharaan/identitas_yayasan";
if(isset($_SESSION["level_id"]))
{
  foreach($gate as $row)
  {
    if($row["level_id"]==$_SESSION["level_id"])
    {
      if($row['parent_id']!="0")
      {
		$r =  substr($row["slug"],strlen($row["slug"])-1,strlen($row["slug"]));
		$r = ($r=="/")?substr($row["slug"],0,strlen($row["slug"])-1):$row["slug"];
		//echo $r."<br>";
		$u =  substr($row["url"],strlen($row["url"])-1,strlen($row["url"]));
		$u = ($u=="/")?substr($row["url"],0,strlen($row["url"])-1):$row["url"];
		
		
		
		$route[$r] = $u;

      }
      else{
        $route[str_replace("/","",$row["slug"])] = "dashboard/list_module";
        }

    }
  }
}
else{
  $route["Module_Settings"] = "Module_Settings";
  $route["Module_Settings/set_key"] = "Module_Settings/set_key";
  $route["Module_Settings/set_key2"] = "Module_Settings/set_key2";
}
$route["(:any)/(:any)/(:any)"] = "welcome/failed_othorization";
$route["(:any)/(:any)/(:any)/(:any)"] = "welcome/failed_othorization";
/*

$route["tes_c"] = "tes_c";
$route["tes_c/create_source"] = "tes_c/create_source";
*/
