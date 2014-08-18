<?php
include 'init.inc.php';
include 'tpl/header.php';
$articleIds = $redis->lRange('article:list',0,-1);
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
                    文章列表
                    <small>
                        <i class="fa fa-angle-double-right"></i>
                        Article list
                    </small>
                </h1>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th>标题</th>
                    <th>发布日期</th>
                    <th>点击数</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($articleIds as $v): $article = $redis->hGetAll("article:$v")?>
                    <tr>
                        <td><a href=""><?=$article['title']?></a></td>
                        <td><a href=""><?=date('Y-m-d H:i',$article['datetime'])?></a></td>
                        <td><a href=""><?=$article['hits']?></a></td>
                        <td>
                            <a href="article.php?action=edit&id=<?=$article['id']?>"><i class="fa fa-edit"> </i></a>
                            <a href="article_edit.php?action=del&id=<?=$article['id']?>" onclick="return confirm('确定要删除吗')"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>

                </tbody>
            </table>
        </div>
    </div>
<?php
include 'tpl/footer.php';
?>