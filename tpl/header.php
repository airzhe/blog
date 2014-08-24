<?php
try{
    $config = $redis->hGetAll('config');
    $catgoryIds = $redis->sMembers('categoryIds');
    $recent_article_list = $redis->lRange('article:list',-5,5);
//    $archive_list = $redis->
}catch (Exception $e){
    error($e->getMessage());
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title><?=$config['webname']?> - Power by Redis</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>

<header id="site-header">
    <div class="container">
        <a class="home-link" href="./" title="Runner的小站" rel="home">
            <h1 class="site-title"><?=$config['webname']?></h1>
            <h2 class="site-description"><?=$config['description']?></h2>
        </a>
    </div>
    <div class="navbar">
        <div class="container">
            <ul class="pull-left">
                <li class="current-menu-item"><a href="./" >首页</a></li>
                <?php foreach($catgoryIds as $v):?>
                <li><a href="category.php?cid=<?=$v?>"><?=$redis->get("category:$v:name")?></a></li>
                <?php endforeach ?>
                <li><a href="about.php">关于我</a></li>
            </ul>
            <form method="get" class="search-form pull-right" action="search.html">
                <input type="search" class="search-field" placeholder="搜索…" value="" name="s" title="搜索：">
            </form>
        </div>
    </div>
</header>