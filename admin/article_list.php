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
                    文章列表
                    <small>
                        <i class="fa fa-angle-double-right"></i>
                        Article list
                    </small>
                </h1>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th>标题</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><a href="">这是美好的一天</a></td>
                    <td>
                        <a href="javascript:void(0);"><i class="fa fa-edit"> </i></a>
                        <a href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
<?php
include 'tpl/footer.php';
?>