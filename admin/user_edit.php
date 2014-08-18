<?php
require 'init.inc.php';
try{
    $action = $_GET['action'];
    if(!$action){
        throw new Exception('param error!');
    }
    switch ($action){
        case 'add':
            if($_POST['passwd'] == $_POST['repasswd']){
                $username = trim($_POST['username']);
                $passwd = md5(md5(trim($_POST['passwd'])));
                // 添加用户到集合
                if($redis->sAdd('user',$username)){
                    $redis->hMSet("user:$username",array('username'=>$username,'passwd'=>$passwd));
                    success('用户添加成功','user.php');
                }else{
                    error("用户{$username}已经存在");
                }
            }else{
                throw new Exception('两次密码不一致!');
            }
           break;
        case 'del':
            if($username = $_GET['username']){
                $redis->multi();
                $redis->del("user:$username");
                $redis->sRem('user',$username);
                $redis->exec();
                success('删除成功！','user.php');
            }else{
                throw new Exception('用户名不能为空!');
            }
            break;
    }
}catch (Exception $e){
    error($e->getMessage());
}
