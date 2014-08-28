<?php
require 'init.inc.php';
try{
    $mysql = new mysqli('localhost','root','purple','blog');
    $mysql->query('set names utf8');

    $result = $mysql->query('select max(id) from article');
    $last_id = current($result->fetch_assoc());

    $article_list = $redis->lRange('article:list',0,-1);
    $key  = array_search($last_id,$article_list);
    if($key){
        $article_list = array_slice($article_list,0,$key);
    }else{
        error('没有新数据要备份');
        return;
    }
    $row = 0;
    foreach($article_list as $v){
        $article = $redis->hgetall("article:$v");

        $id         = $v;
        $title      = $article['title'];
        $category   = $article['category'];
        $content    = addslashes($article['content']);
        $datetime   = $article['datetime'];
        $template   = $article['template'];
//        echo $id;
        $sql = "insert into article (id,title,category,content,datetime,template) values
                ('$id','$title','$category','$content','$datetime','$template')";
        $result = $mysql->query($sql);
        if($result){
            $row++;
        }
    }
    success('备份完成'. $row.'条','index.php');
}catch (mysqli_sql_exception $e){
    echo $e->getMessage();
}


