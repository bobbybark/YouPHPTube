<?php
require_once '../../../../videos/configuration.php';
require_once $global['systemRootPath'] . 'plugin/{pluginName}/Objects/{classname}.php';
header('Content-Type: application/json');

$obj = new stdClass();
$obj->error = true;

$plugin = AVideoPlugin::loadPluginIfEnabled('{pluginName}');

if(!User::isAdmin()){
    $obj->msg = "You cant do this";
    die(json_encode($obj));
}

$id = intval($_POST['id']);
$row = new {classname}($id);
$obj->error = !$row->delete();
die(json_encode($obj));
?>