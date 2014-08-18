<?php
include 'tpl/header.php';
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
                    分类管理
                    <small>
                        <i class="fa fa-angle-double-right"></i>
                        Category Management
                    </small>
                </h1>
            </div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#category_list" role="tab" data-toggle="tab"><i class="fa fa-list"></i> 分类列表</a>
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
                        <tr>
                            <td>php</td>
                            <td>
                                <a href="javascript:void(0);"><i class="fa fa-edit"> </i></a>
                                <a href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane" id="add_category">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="title" class="col-sm-1 control-label">名称：</label>
                            <div class="col-sm-4">
                                <input type="test" class="form-control" id="title" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-1 col-sm-1">
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