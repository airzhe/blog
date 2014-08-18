<?php
require 'init.inc.php';
try{
    if(!empty($_POST)){
        $title = isset($_POST['title'])?trim($_POST['title']):'';
        $category = $_POST['category'];
        $tags = isset($_POST['tags'])?trim($_POST['tags']):'';
        $content = isset($_POST['content'])?trim($_POST['content']):'';
        $datetime = isset($_POST['datetime'])?trim($_POST['datetime']):time();
        $hits = isset($_POST['hits'])?(int)$_POST['hits']:100;
        $template = $_POST['$template'];
        $error_msg = array();
        if(!$title){
            $error_msg[] = '文章标题不能为空！';
        }
        if(!$content){
            $error_msg[] = '文章内容不能为空！';
        }
        if(!empty($error_msg)){
            $msg = implode('<br/>',$error_msg);
            throw new Exception($msg);
        }
    }else{
        throw new Exception('请求错误');
    }
}catch (Exception $e){
    error($e->getMessage());
}