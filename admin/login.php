<?php
require 'init.inc.php';
try{
    $username = isset($_POST['username'])? trim($_POST['username']):'';
    $passwd   = isset($_POST['passwd'])? md5(md5($_POST['passwd'])):'';
    if($username && $passwd){
        if($user = $redis->hGetAll("user:$username")){
            if($passwd == $user['passwd']){
                session_id() || session_start();
                $_SESSION['username'] = $username;
                success('登录成功','index.php');
            }else{
                throw new Exception('密码错误！');
            }
        }else{
            throw new Exception('用户不存在！');
        }
    }else{
        throw new Exception('用户名密码不能为空！');
    }
}catch (Exception $e){
    error($e->getMessage());
}