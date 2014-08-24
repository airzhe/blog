<?php
require 'init.inc.php';
try{
    $action = $_GET['action'];
    if(!$action){
        throw new Exception('param error!');
    }
    switch ($action){
        case 'add':
            $category = isset($_POST['category'])?trim($_POST['category']):'';
            if($category){
                $id = $redis->incr('category:count');
                $redis->set("category:$id:name",$category);
                $redis->sAdd('categoryIds',$id);
                success('分类添加成功');
            }else{
                throw new Exception('分类不能为空!');
            }
           break;
        case 'del':
            $id = isset($_GET['id'])?trim($_GET['id']):'';
            if($id){
                $redis->multi();
                $redis->del("category:$id");
                $redis->sRem('categoryIds',$id);
                $redis->exec();
                success('删除成功！','category.php');
            }else{
                throw new Exception('参数错误!');
            }
            break;
    }
}catch (Exception $e){
    error($e->getMessage());
}
