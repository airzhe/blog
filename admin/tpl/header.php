<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/admin.js"></script>
</head>
<body>
<div class="header">
<div>
<a href="#" class="brand">
    <small>
        <i class="icon-leaf"></i>
        Ace Admin
    </small>
</a><!--/.brand-->

<ul class="nav ace-nav pull-right">
<li class="grey">
    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
        <i class="fa fa-tasks"></i>
        <span class="badge badge-grey">4</span>
    </a>

    <ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-closer">
        <li class="nav-header">
            <i class="icon-ok"></i>
            4 Tasks to complete
        </li>

        <li>
            <a href="#">
                <div class="clearfix">
                    <span class="pull-left">Software Update</span>
                    <span class="pull-right">65%</span>
                </div>

                <div class="progress progress-mini ">
                    <div style="width:65%" class="bar"></div>
                </div>
            </a>
        </li>

        <li>
            <a href="#">
                <div class="clearfix">
                    <span class="pull-left">Hardware Upgrade</span>
                    <span class="pull-right">35%</span>
                </div>

                <div class="progress progress-mini progress-danger">
                    <div style="width:35%" class="bar"></div>
                </div>
            </a>
        </li>

        <li>
            <a href="#">
                <div class="clearfix">
                    <span class="pull-left">Unit Testing</span>
                    <span class="pull-right">15%</span>
                </div>

                <div class="progress progress-mini progress-warning">
                    <div style="width:15%" class="bar"></div>
                </div>
            </a>
        </li>

        <li>
            <a href="#">
                <div class="clearfix">
                    <span class="pull-left">Bug Fixes</span>
                    <span class="pull-right">90%</span>
                </div>

                <div class="progress progress-mini progress-success progress-striped active">
                    <div style="width:90%" class="bar"></div>
                </div>
            </a>
        </li>

        <li>
            <a href="#">
                See tasks with details
                <i class="icon-arrow-right"></i>
            </a>
        </li>
    </ul>
</li>

<li class="purple">
    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
        <i class="fa fa-bell"></i>
        <span class="badge badge-important">8</span>
    </a>

    <ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-closer">
        <li class="nav-header">
            <i class="icon-warning-sign"></i>
            8 Notifications
        </li>

        <li>
            <a href="#">
                <div class="clearfix">
                                   <span class="pull-left">
                                      <i class="btn btn-mini no-hover btn-pink icon-comment"></i>
                                      New Comments
                                  </span>
                    <span class="pull-right badge badge-info">+12</span>
                </div>
            </a>
        </li>

        <li>
            <a href="#">
                <i class="btn btn-mini btn-primary icon-user"></i>
                Bob just signed up as an editor ...
            </a>
        </li>

        <li>
            <a href="#">
                <div class="clearfix">
                               <span class="pull-left">
                                  <i class="btn btn-mini no-hover btn-success icon-shopping-cart"></i>
                                  New Orders
                              </span>
                    <span class="pull-right badge badge-success">+8</span>
                </div>
            </a>
        </li>

        <li>
            <a href="#">
                <div class="clearfix">
                           <span class="pull-left">
                              <i class="btn btn-mini no-hover btn-info icon-twitter"></i>
                              Followers
                          </span>
                    <span class="pull-right badge badge-info">+11</span>
                </div>
            </a>
        </li>

        <li>
            <a href="#">
                See all notifications
                <i class="icon-arrow-right"></i>
            </a>
        </li>
    </ul>
</li>

<li class="green">
    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
        <i class="fa fa-envelope"></i>
        <span class="badge badge-success">5</span>
    </a>

    <ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-closer">
        <li class="nav-header">
            <i class="icon-envelope-alt"></i>
            5 Messages
        </li>
    </ul>
</li>

<li class="light-blue">
    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
        <img class="nav-user-photo" src="http://www.gravatar.com/avatar/1e1dcac587796b81149fc3869b7ad4e5.jpg?s=36"
             alt="Jason's Photo">
        <span class="user-info">
         <small>Welcome,</small>
         <?=$_SESSION['username']?>
     </span>

        <i class="fa fa-sort-down"></i>
    </a>

    <ul class="user-menu pull-right dropdown-menu">
        <li>
            <a href="#">
                <i class="fa fa-cog"></i>
                Settings
            </a>
        </li>

        <li>
            <a href="#">
                <i class="fa fa-user"></i>
                Profile
            </a>
        </li>

        <li class="divider"></li>

        <li>
            <a href="logout.php">
                <i class="fa fa-power-off"></i>
                Logout
            </a>
        </li>
    </ul>
</li>
</ul>
<!--/.ace-nav-->
</div>
</div>
<div class="wrapper">
    <div class="sidebar">
        <div class="sidebar-shortcuts">
            <!-- 大按钮图标 -->
            <div class="sidebar-shortcuts-large">
                <button class="btn btn-small btn-success">
                    <i class="fa fa-signal"></i>
                </button>
                <button class="btn btn-small btn-info">
                    <i class="fa fa-pencil"></i>
                </button>
                <button class="btn btn-small btn-warning">
                    <i class="fa fa-group"></i>
                </button>
                <button class="btn btn-small btn-danger">
                    <i class="fa fa-cogs"></i>
                </button>
            </div>
            <!-- 小按钮图标 -->
            <div class="sidebar-shortcuts-mini">
                <span class="btn btn-success"></span>
                <span class="btn btn-info"></span>
                <span class="btn btn-warning"></span>
                <span class="btn btn-danger"></span>
            </div>
        </div>
        <ul class="nav nav-list">
            <li class="active">
                <a href="index.php">
                    <i class="fa fa-dashboard"></i>
                    <span class="menu-text"> Dashboard </span>
                </a>
            </li>
            <li>
                <a href="article_list.php">
                    <i class="fa fa-space-shuttle"></i>
                    <span class="menu-text"> 文章列表 </span>
                </a>
            </li>
            <li>
                <a href="category.php">
                    <i class="fa fa-bars"></i>
                    <span class="menu-text"> 分类管理 </span>
                </a>
            </li>
            <li>
                <a href="article.php">
                    <i class="fa fa-paper-plane"></i>
                    <span class="menu-text"> 添加文章 </span>
                </a>
            </li>
            <li>
                <a href="user.php">
                    <i class="fa fa-user"></i>
                    <span class="menu-text"> 用户管理 </span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-text-width"></i>
                    <span class="menu-text"> Typography </span>
                </a>
                <ul class="submenu">
                    <li>
                        <a href="form-elements.html">
                            <i class="fa fa-angle-double-right"></i>
                            Form Elements
                        </a>
                    </li>

                    <li>
                        <a href="form-wizard.html">
                            <i class="fa fa-angle-double-right"></i>
                            Wizard &amp; Validation
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="fa fa-angle-double-right"></i>
                            Three Level Menu
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="form-elements.html">
                                    <i class="fa fa-angle-double-right"></i>
                                    Form Elements
                                </a>
                            </li>

                            <li>
                                <a href="form-wizard.html">
                                    <i class="fa fa-angle-double-right"></i>
                                    WizardValidation
                                </a>
                            </li>

                            <li>
                                <a href="wysiwyg.html">
                                    <i class="fa fa-angle-double-right"></i>
                                    Wysiwyg &amp; Markdown
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="sidebar-collapse">
            <i class="fa fa-angle-double-left"></i>
        </div>
    </div>