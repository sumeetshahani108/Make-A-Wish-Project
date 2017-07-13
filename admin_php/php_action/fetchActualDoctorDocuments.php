<?php
/**
 * Created by PhpStorm.
 * User: Sumeet
 * Date: 11-07-2017
 * Time: 21:53
 */
include '../../php_action/db_connect.php';
$files = array();
$path = '../../'.$_POST['path'];

if (is_dir($path)){
    if ($dh = opendir($path)){
        while (($file = readdir($dh)) !== false){
            if($file != '.' && $file != '..')
            array_push($files, $file);
        }
        closedir($dh);
    }
}

echo  json_encode($files);
?>