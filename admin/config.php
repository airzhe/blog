<?php
require 'init.inc.php';
include 'tpl/header.php';
if($config = $redis->hGetAll('config')){

}else{
    $config = array('webname'=>'','description'=>'','category_page_size');
}
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
        <form class="form-horizontal" role="form" method="post" action="config_edit.php">
           <div class="form-group">
                <label for="webname" class="col-sm-2 control-label">网站标题：</label>
                <div class="col-sm-6">
                    <input type="test" class="form-control" id="webname" name="webname" value="<?=$config['webname']?>" required="">
                </div>
            </div>
            <div class="form-group">
                <label for="description" class="col-sm-2 control-label">网站描述：</label>
                <div class="col-sm-6">
                    <input type="test" class="form-control" id="description" name="description" value="<?=$config['description']?>" required="">
                </div>
            </div>
            <div class="form-group">
                <label for="category_page_size" class="col-sm-2 control-label">文章分页数：</label>
                <div class="col-sm-6">
                    <input type="test" class="form-control" id="page_size" name="page_size" value="<?=$config['page_size']?>" required="">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-1 col-sm-offset-2">
                    <button type="submit" class="btn btn-info">确定</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
include 'tpl/footer.php';
?>