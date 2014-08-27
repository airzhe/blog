<?php
include 'init.inc.php';
include 'tpl/header.php';
$articleIds = $redis->zRevRange('article:leaderboard',0,-1);
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
                    排行榜
                    <small>
                        <i class="fa fa-angle-double-right"></i>
                        Article Leaderboard
                    </small>
                </h1>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th>标题</th>
                    <th>发布日期</th>
                    <th>点击数</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($articleIds as $v): $article = $redis->hGetAll("article:$v")?>
                    <tr>
                        <td><a href="../article.php?id=<?=$article['id']?>" target="_blank"><?=$article['title']?></a></td>
                        <td><?=date('Y-m-d H:i',$article['datetime'])?></td>
                        <td><?=$article['hits']?></td>
                    </tr>
                <?php endforeach ?>

                </tbody>
            </table>
        </div>
    </div>
<?php
include 'tpl/footer.php';
?>