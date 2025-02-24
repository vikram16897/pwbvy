<?php
/**
 * Include all Required Files
 */
include("config.php");
include(DATABASE_CLASS_PATH . "class.database.php");
include(FUNCTION_PATH . "admin_function.php");

/**
 * Object Creations
 */
global $obj_database;

$obj_database = new Database();

if (isset($_SESSION['user_detail'])) {
    $GLOBALS['usertype'] = $_SESSION['user_detail']['user_type'] ?? null;
    $GLOBALS['panchayat'] = $_SESSION['user_detail']['panchayat'] ?? null;
    $GLOBALS['block'] = $_SESSION['user_detail']['block'] ?? null;
    $GLOBALS['state'] = $_SESSION['user_detail']['state'] ?? null;
} else {
    // Handle the case where 'user_detail' is not set in the session
    $GLOBALS['usertype'] = null;
    $GLOBALS['panchayat'] = null;
    $GLOBALS['block'] = null;
    $GLOBALS['state'] = null;
}
?>
