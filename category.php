<?php
require 'init.inc.php';
require 'tpl/header.php';
$cid  = isset($_GET['cid'])?(int)$_GET['cid']:'';
if(!$cid) reuturn;
$article_list = $redis->lRange("category:$cid.article_list",0,-1);
?>
<header class="archive-header">
<h1 class="archive-title">分类目录归档：<?=$redis->get("category:$cid:name")?></h1>
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
                                    <?php foreach($tags as $v):?>
                                        <a href="tag.php?tag=<?=$v?>" rel="tag" target="_blank"><?=$v?></a><span>,</span>
                                    <?php endforeach?>
                  </span>
                            <?php endif ?>
                        </p>
                    </header>
                    <div class="content clearfix">
                        <?=$article['content']?>
                    </div>
                    <footer class="meta">
                        <?php if(isset($article['comment']) && $article['comment']):?>
                            <div class="comments-link">
                                <a href="article.php#comments" title="《世界，你好！》上的评论"><i class="fa fa-comment"></i> 有一条评论</a>
                            </div>
                        <?php else:?>
                            <a href="article.php?id=<?=$v?>#respond"><i class="fa fa-comment"> </i><span class="leave-reply">发表回复</span></a>
                        <?php endif ?>
                    </footer>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>
<div>
  <div class="navigation paging-navigation">
    <div class="container">
      <div class="col-md-6 col-md-offset-3">
        <div class="nav-previous pull-left"><a href="/?paged=2"><span class="meta-nav">←</span> 早期文章</a></div>
        <div class="nav-next pull-right"><a href="/?paged=1">较新文章 <span class="meta-nav">→</span></a></div>
      </div>
    </div>
  </div>
</div>
<?php
include 'tpl/footer.php';
?>