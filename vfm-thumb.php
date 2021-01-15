<?php
/**
 * VFM - virtue file manager thumb
 *
 * PHP version >= 7.4
 *
 * @category  ERP
 * @package   VIRTUE-CLOUD File Manager
 * @author    Sylvester Umole
 * @copyright 2021 Virtue-One
 * 
 */
require_once 'vfm-admin/config.php';
if ($_CONFIG['debug_mode'] === true) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}
require_once 'vfm-admin/class/class.setup.php';
require_once 'vfm-admin/class/class.imageserver.php';
require_once 'vfm-admin/class/class.gatekeeper.php';
require_once 'vfm-admin/class/class.utils.php';
$setUp = new SetUp();

if (!GateKeeper::isAccessAllowed() && $setUp->getConfig('share_thumbnails') !== true) {
    die('access denied');
}
$imageServer = new ImageServer();
$imageServer->showImage();

exit;