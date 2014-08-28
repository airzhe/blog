<?php
try{
    require 'init.inc.php';
    require 'tpl/header.php';

    $page = isset($_GET['page']) && $_GET['page']?(int)$_GET['page']:'1';
    $page_size = $redis->hGet('config','page_size');
    $count = $redis->llen('article:list');
    $pageObj = new Page($page,$page_size,$count);
    $page_html = $pageObj->create_links();
    $offset = ($page-1) * $page_size;
    $article_list = $redis->lRange('article:list',$offset,$offset+$page_size-1);
    //$article_list = $redis->sort("article:list",array('by'=>'article:*->datetime','sort'=>'desc'));
}catch (Exception $e){
    echo $e->getMessage();
    $mysql = new mysqli('localhost','root','purple','blog');
    $mysql->query('set names utf8');
    $result = $mysql->query('select * from article');
    while($row = $result->fetch_assoc()){
       $row['datetime'] = date('Y-m-d H:i:s',$row['datetime']);
       echo "<h1>$row[title]</h1>";
       echo "<p>$row[datetime]</p>";
       echo  $row[content];
       echo "<hr/>";
    }
    die;
//    error($e->getMessage());
}
?>
<?php foreach($article_list as $v):
    $article = $redis->hGetAll("article:$v");
    $category_id = $article['category'];
    $tags = $redis->sMembers("article:$v:tags");
    $article['comment'] = $redis->llen("article:$v:comment");
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
        <footer class="meta">
            <?php if(isset($article['comment']) && $article['comment']):?>
                <div class="comments-link">
                    <a href="article.php?id=<?=$v?>#comments" title="<?=$article['title']?>上的评论"><i class="fa fa-comment"></i> 有<?=$article['comment']?>条评论</a>
                </div>
            <?php else:?>
              <a href="article.php?id=<?=$v?>#respond"><i class="fa fa-comment"> </i><span class="leave-reply">发表回复</span></a>
            <?php endif ?>
        </footer>
      </div>
    </div>
</div>
<?php endforeach ?>
<?=$page_html?>
<?php
include 'tpl/footer.php';
?>