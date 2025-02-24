<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
define('_STARTCMS', true);
ini_set("allow_url_fopen", "ON");
ini_set("allow_url_include", "ON");
ini_set("memory_limit", "256M");

$statesmaster = array(
    'AP' => 'Andhra Pradesh',
    'AR' => 'Arunachal Pradesh',
    'AS' => 'Assam',
    'BR' => 'Bihar',
    'CT' => 'Chhattisgarh',
    'GA' => 'Goa',
    'GJ' => 'Gujarat',
    'HR' => 'Haryana',
    'HP' => 'Himachal Pradesh',
    'JK' => 'Jammu and Kashmir',
    'JH' => 'Jharkhand',
    'KA' => 'Karnataka',
    'KL' => 'Kerala',
    'MP' => 'Madhya Pradesh',
    'MH' => 'Maharashtra',
    'MN' => 'Manipur',
    'ML' => 'Meghalaya',
    'MZ' => 'Mizoram',
    'NL' => 'Nagaland',
    'OR' => 'Odisha',
    'PB' => 'Punjab',
    'RJ' => 'Rajasthan',
    'SK' => 'Sikkim',
    'TN' => 'Tamil Nadu',
    'TG' => 'Telangana',
    'TR' => 'Tripura',
    'UT' => 'Uttarakhand',
    'UP' => 'Uttar Pradesh',
    'WB' => 'West Bengal',
    'AN' => 'Andaman and Nicobar Islands',
    'CH' => 'Chandigarh',
    'DN' => 'Dadra and Nagar Haveli',
    'DD' => 'Daman and Diu',
    'DL' => 'Delhi',
    'LD' => 'Lakshadweep',
    'PY' => 'Puducherry'
);

if (_STARTCMS == false) {
    die("ACCESS DENIED");
}
define('TB_PREFIX', 'ngo_');
define('SERVER', 'LOCAL');
if (SERVER == "LOCAL") {
    define('DB_USER', 'u404358449_pbvys');
    define('DB_PWD', 'Pwbvy@135');
    define('HOST', 'localhost');
    define('DB_DATABASE', 'u404358449_pbvys');
    define('WEB_ADMIN_PATH', '/pwbvy/software/');
    define('WEB_SITE_PATH', '/pwbvy/software/');
    define('ADMIN_URL', $_SERVER['DOCUMENT_ROOT'] . '/pwbvy/software/');
    define('PTH', '/');
    define('DATABASE_CLASS_PATH', ADMIN_URL . "raw/");
    define('CLASS_PATH', ADMIN_URL . "frames/");
    define('REDIRECT_ADMIN_PATH', ADMIN_URL . "frames/");
    define('FUNCTION_PATH', ADMIN_URL . "action/");
    define('CONTROLLER_PATH', ADMIN_URL . "eventmanager/");
    define('TIME_ZONE', "asia/kolkata");
    define('DATE_FORMAT', 'd-m-Y');
    define('PANEL_MASTER', 'Pragatiwad Bal Vikas Yojna Panel');
    define('WEBSITE_NAME', 'Pragatiwad Bal Vikas Yojna Panel');
    date_default_timezone_set(TIME_ZONE);
}
?>