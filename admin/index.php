<?php
    require 'init.inc.php';
    include 'tpl/header.php';
?>
    <div class="main-content">
        <div class="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="#">Home</a>
                </li>
                <li class="active">Typography</li>
            </ul>
        </div>
        <div class="page-content">
            <div class="page-header position-relative">
                <h1>
                    首页
                    <small>
                        <i class="fa fa-angle-double-right"></i>
                        home
                    </small>
                </h1>
            </div>
           welcome!
            <span>
                <a href="user.php">用户数：<?=$redis->sCard('user')?></a>&nbsp;&nbsp;
                <a href="category.php">分类数：<?=$redis->sCard('categoryIds')?></a>&nbsp;&nbsp;
                <a href="article_list.php">文章数：<?=$redis->lLen('article:list')?>
            </span>
        </div>
    </div>
<?php
    include 'tpl/footer.php';
?>