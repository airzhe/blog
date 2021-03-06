<?php
require 'init.inc.php';
require 'tpl/header.php';
$m = isset($_GET['m'])?$_GET['m']:'';
if(!$m) reuturn;
$year = substr($m,0,4);
$month = substr($m,4,2);
//$redis->sort('abc');
$article_list = $redis->sort("archive:$m",array('by'=>'article:*->datetime','sort'=>'desc'));
?>
<header class="archive-header">
    <h1 class="archive-title">归档：<?=$year.'年'.$month.'月'?></h1>
</header>
<div >
    <?php foreach($article_list as $v):
        $article = $redis->hGetAll("article:$v");
        $category_id = $article['category'];
        $tags = $redis->sMembers("article:$v:tags");
        ?>
        <div class="article row <?=$templates[$article['template']]?>">
            <div class="container">
                <div class="col-md-6 col-md-offset-3">
                    <header>
                        <h1><a href="article.php?id=<?=$v?>"><?=$article['title']?></a></h1>
                        <p class="meta">
                            <a href=""><i class="fa fa-clock-o"></i><?=date('Y年m月d日',$article['datetime'])?></a>
                            <a href="category.php?cid=<?=$category_id?>"><i class="fa fa-folder-open"></i><?=$redis->get("category:$category_id:name")?></a>
                            <?php if($tags):?>
                                <span class="tags-links"><a class="fa fa-tag"></a>
                                    <?php foreach($tags as $_v):?>
                                        <a href="tag.php?tag=<?=$_v?>" rel="tag" target="_blank"><?=$_v?></a><span>,</span>
                                    <?php endforeach?>
                                </span>
                            <?php endif ?>
                        </p>
                    </header>
                    <div class="content clearfix">
                        <i class="fa fa-volume-up fa-4x"></i>
                        <div <?=$templates[$article['template']]=='format-audio'?"class='audio-content'":'';?>>
                            <?=$article['content']?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>
<?php
include 'tpl/footer.php';
?>