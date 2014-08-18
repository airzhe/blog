<?php
require 'init.inc.php';
include 'tpl/header.php';
$userArr = $redis->sMembers('user');
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
                    用户管理
                    <small>
                        <i class="fa fa-angle-double-right"></i>
                        User Management
                    </small>
                </h1>
            </div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#category_list" role="tab" data-toggle="tab"><i class="fa fa-list"></i> 用户列表</a>
                </li>
                <li><a href="#add_category" role="tab" data-toggle="tab"><i class="fa fa-plus-circle"></i> 增加</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="category_list">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>名称</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($userArr as $v):$username = $redis->hGet("user:$v",'username');?>
                        <tr>
                            <td><?=$username?></td>
                            <td>
                                <a href="javascript:void(0);"><i class="fa fa-edit"> </i></a>
                                <a href="user_edit.php?action=del&username=<?=$username?>" onclick="return confirm('确定要删除吗')"><i class="fa fa-trash-o"></i></a>
                            </td
                        </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane" id="add_category">
                    <form class="form-horizontal" role="form" method="post" action="user_edit.php?action=add">
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label">用户名：</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="passwd" class="col-sm-2 control-label">密码：</label>
                            <div class="col-sm-4">
                                <input type="password" class="form-control" id="passwd" name="passwd" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="repasswd" class="col-sm-2 control-label">重复密码：</label>
                            <div class="col-sm-4">
                                <input type="password" class="form-control" id="repasswd" name="repasswd" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-1">
                                <button class="btn btn-info">确定</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
include 'tpl/footer.php';
?>