<?php
require 'init.inc.php';
require 'tpl/header.php';
$id = isset($_GET['id'])?(int)$_GET['id']:'';
if(!id) return;
$article = $redis->hGetAll("article:$id");
$redis->hIncrBy("article:$id",'hits',1);

//pre next
$article_list = $redis->lRange('article:list',0,-1);
$index = array_search($id,$article_list);
if($index != 0){
    $prev_article_id = $article_list[$index-1];
}
if($index != (count($article_list)-1)){
    $next_article_id = $article_list[$index+1];
}

//tag
$tags = $redis->sMembers("article:$id:tags");

//comment
$comment_list = $redis->lrange("article:$id:comment",0,-1);
?>
<div class="article row <?=$templates[$article['template']]?>">
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <header>
                <h1><a href="article.php?id=<?=$v?>"><?=$article['title']?></a></h1>
                <p class="meta">
                    <a href=""><i class="fa fa-clock-o"></i><?=date('Y年m月d日',$article['datetime'])?></a>
                    <a href="category.php?cid=<?=$article['category']?>"><i class="fa fa-folder-open"></i><?=$redis->get("category:$article[category]:name")?></a>
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
  <div class="navigation post-navigation">
    <div class="container">
      <?php if(isset($prev_article_id)):?>
        <div class="nav-previous pull-left"><a href="article.php?id=<?=$prev_article_id?>"><span class="meta-nav">←</span>  <?=$redis->hGet("article:$prev_article_id",'title')?></a></div>
      <?php endif?>
      <?php if(isset($next_article_id)):?>
        <div class="nav-next pull-right"><a href="article.php?id=<?=$next_article_id?>"><?=$redis->hGet("article:$next_article_id",'title')?>  <span class="meta-nav">→</span></a></div>
      <?php endif?>
     </div>
  </div>
  <div id="comments" class="comments-area row">
   <div class="container">
    <?php if(count($comment_list)):?>
        <div class="col-md-6 col-md-offset-3">
            <h2 class="comments-title">《<span><?=$article['title']?></span>》有<?=count($comment_list)?>个想法</h2>
            <?php foreach($comment_list as $v):$comment = unserialize($v);?>
                <div class="comment-list row">
                    <div class="col-md-3">
                      <img src="http://www.gravatar.com/avatar/<?=md5($comment['email'])?>.jpg?s=74" alt="" style="width:74px;height:74px;">
                        <?=$comment['author']?>
                    </div>
                    <div class="col-md-9">
                        <p><?=date('Y年m月d日 H:i',$comment['datetime'])?></p>
                        <p><?=$comment['content']?></p>
<!--                        <p><i class="fa fa-reply"></i> 回复</p>-->
                    </div>
                </div><!-- .comment-list -->
            <?endforeach?>
        </div>
      </div>
    <?php endif?>
  </div>
  <div  id="respond">
    <div class="container">
      <div class="comment-respond col-md-6 col-md-offset-3">
        <h3 id="reply-title" class="comment-reply-title">发表评论 </h3>
        <form action="comment.php" method="post" id="commentform" class="comment-form">
          <p class="comment-notes">
              电子邮件地址不会被公开。 必填项已用<span class="required">*</span>标注
              <input name="id" value="<?=$id?>" type="hidden"/>
          </p>
          <p class="comment-form-author">
              <label for="author">姓名 <span class="required">*</span></label>
              <input id="author" name="author" type="text" required >
          </p>
          <p class="comment-form-email">
              <label for="email">电子邮件 <span class="required">*</span></label>
              <input id="email" name="email" type="email" required>
          </p>
          <p class="comment-form-url">
              <label for="url">站点</label>
              <input id="url" name="url" type="url">
          </p>
          <p class="comment-form-comment">
              <label for="comment">评论</label>
              <textarea id="comment" name="content" cols="45" rows="8" required></textarea>
          </p>
          <p class="form-submit">
              <button id="submit">发表评论</button>
          </p>
        </form>
      </div><!-- #respond -->
    </div>
  </div>
</div>
</div>
<?php
include 'tpl/footer.php';
?>