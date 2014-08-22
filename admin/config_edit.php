<?php
/**
 * Created by PhpStorm.
 * User: runner
 * Date: 14-8-23
 * Time: 上午12:14
 */
require 'init.inc.php';
try{
    $data['webname'] = isset($_POST['webname'])?trim($_POST['webname']):'';
    $data['description'] = isset($_POST['description'])?trim($_POST['description']):'';
    $data['category_page_size'] = isset($_POST['category_page_size'])?(int)$_POST['category_page_size']:5;
    $redis->hMset('config',$data);
    success('设置成功','config.php');
}catch (Exception $e){
    error($e->getMessage());
}
