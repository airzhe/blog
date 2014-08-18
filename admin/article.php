<?php
    require 'init.inc.php';
    require 'tpl/header.php';
    $categoryArr = $redis->sMembers('categoryIds');
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
                    文章发布
                    <small>
                        <i class="fa fa-angle-double-right"></i>
                        Articles published
                    </small>
                </h1>
            </div>
            <form class="form-horizontal" role="form" method="post" action="article_edit.php">
                <div class="form-group">
                    <label for="title" class="col-sm-1 control-label">标题：</label>

                    <div class="col-sm-6">
                        <input type="test" class="form-control" id="title" name="title" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="category" class="col-sm-1 control-label">分类：</label>

                    <div class="col-sm-2">
                        <select class="form-control" name="category" id="category" required>
                            <?php foreach ($categoryArr as $k=>$v): $category=$redis->hGetAll("category:$v");?>
                            <option value="<?=$category['id']?>"><?=$category['category']?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="label" class="col-sm-1 control-label">标签：</label>

                    <div class="col-sm-6">
                        <input type="test" class="form-control" id="label" name="tags">
                    </div>
                </div>
                <div class="form-group">
                    <label for="datetime" class="col-sm-1 control-label">内容：</label>
                    <div class="col-sm-9">
                        <textarea name="content" id="content" cols="30" rows="14" class="form-control ckeditor" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label">其他：</label>
                    <span class="col-sm-1 control-label">发布日期</span>
                    <div class="col-sm-2">
                        <input type="test" class="form-control" name="datetime">
                    </div>
                    <span class="col-sm-1 control-label">点击数</span>
                    <div class="col-sm-2">
                        <input type="test" class="form-control" name="hits">
                    </div>
                    <span class="col-sm-1 control-label">模板</span>
                    <div class="col-sm-2">
                        <select class="form-control" name="template">
                            <?php foreach($config['templates'] as $k=>$v):?>
                                <option value="<?=$k?>"><?=$v?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-1 col-sm-offset-1">
                        <button type="submit" class="btn btn-info">确定</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<script src="ckeditor/ckeditor.js"></script>
<?php
    include 'tpl/footer.php';
?>