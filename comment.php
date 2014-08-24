<?php
require 'init.inc.php';
if($article_id = $_POST['id']){
    unset($_POST['id']);
    $_POST['datetime'] = time();
    $comment =serialize($_POST);
    $redis->lPush("article:$article_id:comment",$comment);
    success('提交成功！',"article.php?id=$article_id");
}
