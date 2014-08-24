<?php
require 'init.inc.php';
require 'tpl/header.php';
$id = isset($_GET['id'])?(int)$_GET['id']:'';
$article = $redis->hGetAll("article:$id");
?>
<div class="article row <?=$templates[$article['template']]?>">
  <div class="container">
    <div class="col-md-6 col-md-offset-3">
      <header>
        <h1><a href=""><?=$article['title']?></a></h1>
        <p class="meta">
            <a href=""><i class="fa fa-clock-o"></i><?=date('Y年m月d日',$article['datetime'])?></a>
            <a href="category.php?cid=<?=$article['category']?>"><i class="fa fa-folder-open"></i><?=$redis->get("category:$article[category]:name")?></a>
            <?php if($tags):?>
                <span class="tags-links"><a class="fa fa-tag"></a>
                    <?php foreach($tags as $v):?>
                        <a href="tag.php?tag=<?=$v?>" rel="tag"><?=$v?></a><span>,</span>
                    <?php endforeach?>
                  </span>
            <?php endif ?>
        </p>
      </header>
      <div class="content">
          <?=$article['content']?>
      </div>
    </div>
  </div>
</div>
<div>
  <div class="navigation post-navigation">
    <div class="container">
      <div class="nav-previous pull-left"><a href="/?paged=2"><span class="meta-nav">←</span>  世界，你好！</a></div>
      <div class="nav-next pull-right"><a href="/?paged=1">我想，我们努力的又重复了一遍刚才的话。  <span class="meta-nav">→</span></a></div>
    </div>
  </div>
  <div id="comments" class="comments-area row">
   <div class="container">
    <div class="col-md-6 col-md-offset-3">
      <h2 class="comments-title">《<span>世界，你好！</span>》有1个想法</h2>
      <ol class="comment-list row">
        <div class="col-md-3">
          <img src="images/bg4.jpg" alt="" style="width:74px;height:74px;">
          WordPress先生 
        </div>
        <div class="col-md-9">
         <p>2013年11月30日下午3:21</p>
         <p>您好，这是一条评论。
          要删除评论，请先登录，然后再查看这篇文章的评论。登录后您可以看到编辑或者删除评论的选项。</p>
        <p><i class="fa fa-reply"></i> 回复</p>
        </div>
      </ol><!-- .comment-list -->
    </div>
  </div>
  <div  id="respond">
    <div class="container">
      <div class="comment-respond col-md-6 col-md-offset-3">
        <h3 id="reply-title" class="comment-reply-title">发表评论 </h3>
        <form action="http://localhost/wordpress/wp-comments-post.php" method="post" id="commentform" class="comment-form">
          <p class="comment-notes">电子邮件地址不会被公开。 必填项已用<span class="required">*</span>标注</p>              
          <p class="comment-form-author"><label for="author">姓名 <span class="required">*</span></label> <input id="author" name="author" type="text" value="" size="30" aria-required="true"></p>
          <p class="comment-form-email"><label for="email">电子邮件 <span class="required">*</span></label> <input id="email" name="email" type="email" value="" size="30" aria-required="true"></p>
          <p class="comment-form-url"><label for="url">站点</label> <input id="url" name="url" type="url" value="" size="30"></p>
          <p class="comment-form-comment"><label for="comment">评论</label> <textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>
          <p class="form-submit">
            <input name="submit" type="submit" id="submit" value="发表评论">
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