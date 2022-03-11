<?php
session_start();
@define('_template', './templates/');
@define('_source', './sources/');
@define('_lib', '../libraries/');

include_once _lib . "config.php";
include_once _lib . "constant.php";
include_once _lib . "construct_name.php";
include_once _lib . "functions.php";
include_once _lib . "functions_member.php";
include_once _lib . "functions_giohang.php";
include_once _lib . "library.php";
include_once _lib . "class.database.php";
include_once _lib . "pclzip.php";
$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";


$login_name = 'GaConIT100591';
$d = new database($config['database']);
$archive = new PclZip($file);


$_SESSION['SCRIPT_FILENAME'] = str_replace("/admin/index.php", "", $_SERVER['SCRIPT_FILENAME']);
$_SESSION['SERVER_FOLDER'] = $config['finder']['folder'];
$_SESSION['UPLOAD_DIR'] = $config['finder']['dir'];


switch ($com) {


    case 'thongke':
        $source = "thongke";
        break;

    case 'lang_define':
        $source = "lang_define";
        break;


    case 'contact':
        $source = "contact";
        break;

    case 'newsletter':
        $source = "newsletter";
        break;


    case 'city':
        $source = "city";
        break;


    case 'order':
        $source = "order";
        break;


    case 'info':
        $source = "info";
        break;


    case 'bando':
        $source = "bando";
        break;


    case 'news':
        $source = "news";
        break;


    case 'product':
        $source = "product";
        break;

    case 'store':
            $source = "store";
            break;

    case 'users':
        $source = "users";
        break;

    case 'user':
        $source = "user";
        break;


    case 'setting':
        $source = "setting";
        break;

    case 'support_online':
        $source = "support_online";
        break;


    case 'banner':
        $source = "banner";
        break;

    case 'image_url':
        $source = "image_url";
        break;

    case 'hasp':
        $source = "hasp";
        break;


    default:
        $source = "";
        $template = "index";
        break;
}

if ((!isset($_SESSION[$login_name]) || $_SESSION[$login_name] == false) && $act != "login") {
    redirect("index.php?com=user&act=login");
}

//var_dump(_source . $source . ".php");die();
if ($source != "") include _source . $source . ".php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administrator - Hệ thống quản trị nội dung</title>
    <link href="css/main.css" rel="stylesheet" type="text/css"/>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="assets/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="assets/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->\
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <script type="text/javascript" src="js/jquery-1.7.1.js"></script>
    <script type="text/javascript" src="js/external.js"></script>

    <script src="ckeditor/ckeditor.js" type="text/javascript"></script>
    <script src="ckfinder/ckfinder.js" type="text/javascript"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<?php if (isset($_SESSION[$login_name]) && ($_SESSION[$login_name] == true)) { ?>
    <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="index.html" class="logo">
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Admin</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="http://<?= $config_url ?>" title="" target="_blank">
                                <span><i class="fa fa-external-link"></i> Vào trang web</span>
                            </a>
                        </li>
                        <li><a href="index.php?com=user&act=admin_edit" title="">
                                <span> <i class="fa fa-user"></i> Thông tin tài khoản</span>
                            </a>
                        </li>
                        <!-- Tasks: style can be found in dropdown.less -->
                        <li class="dropdown tasks-menu">
                            <a href="index.php?com=user&act=logout" id="userLogout" title=""><span  class="text-danger"><i class="fa fa-sign-out"></i> Đăng xuất</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="" style="color: white">
                        <a href="#" title=""><img src="images/userPic.png" alt=""/></a>
                        <span>Xin chào, <?= $_SESSION['login_admin']['username'] ?>!</span>
                    </div>
                </div>
                <!-- search form -->
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                    </div>
                </form>
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li>
                        <a title="" href="index.php"><span><i class="fa fa-home"></i> Trang chủ</span></a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-list"></i> <span>Danh Mục Sản Phẩm</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="index.php?com=product&act=man_list&typeparent=product">
                                    <i class="fa fa-circle-o"></i> Danh mục cấp 1</a></li>
                            <li><a href="index.php?com=product&act=man_cat&typeparent=product"><i class="fa fa-circle-o"></i> Danh mục cấp 2</a></li>
                            <li><a href="index.php?com=product&act=man_item&typeparent=product"><i class="fa fa-circle-o"></i> Danh mục cấp 3</a></li>
                            <li>
                                <a href="index.php?com=product&act=man&typechild=product"><i class="fa fa-circle-o"></i> Danh Sách Sản Phẩm</a>
                            </li>
      
                            
                        </ul>
                    </li>
					<li class="treeview">
                        <a href="#">
                            <i class="fa fa-list"></i> <span>Quản Lý bán hàng</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
							<li>
                                <a href="index.php?com=order&act=man"><i class="fa fa-circle-o"></i> Đơn hàng</a>
                            </li>
							<li>
                                <a href="index.php?com=store&act=list"><i class="fa fa-circle-o"></i> Quản Lý Nhập Hàng</a>
                            </li>
							<li>
                                <a href="index.php?com=users&act=man"><i class="fa fa-circle-o"></i> Thành viên</a>
                            </li>
							<li>
                                <a href="index.php?com=news&act=man&typechild=httt"><i class="fa fa-circle-o"></i> Hình thức thanh toán</a>
                            </li>
						</ul>
					</li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-line-chart"></i> <span>Thống Kê - Báo Cáo</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="index.php?com=thongke&act=thongke_soluongorder"><i class="fa fa-circle-o"></i> Tổng số đơn hàng</a>
                            </li>
                            <li>
                                <a
                                    href="index.php?com=thongke&act=thongke_sumpriceorder"><i class="fa fa-circle-o"></i> Tổng danh thu theo ngày/tháng</a>
                            </li>
                            <li>
                                <a
                                    href="index.php?com=thongke&act=thongke_lai_orders"><i class="fa fa-circle-o"></i> Tiền lãi theo ngày/tháng</a>
                            </li>
                            <li>
                                <a
                                    href="index.php?com=thongke&act=product_buy"><i class="fa fa-circle-o"></i> Thống kê Sản phẩm đã mua</a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-list-ul"></i> <span>Danh Mục Bài Viết</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a
                                    href="index.php?com=info&act=capnhat&typechild=gioithieu"><i class="fa fa-circle-o"></i> Giới thiệu</a></li>
                            <li><a
                                    href="index.php?com=news&act=man&typechild=news"><i class="fa fa-circle-o"></i> Tin tức</a></li>
                            <li><a
                                    href="index.php?com=news&act=man&typechild=dichvu"><i class="fa fa-circle-o"></i> Dịch vụ</a></li>
                
						
                        </ul>
                    </li>
                    <!--li class="treeview">
                        <a href="#">
                            <i class="fa fa-pagelines"></i> <span>Trang Tĩnh</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li ><a
                                    href="index.php?com=info&act=capnhat&typechild=footer"><i class="fa fa-circle-o"></i> Footer</a></li>
                            <li><a
                                    href="index.php?com=info&act=capnhat&typechild=lienhe"><i class="fa fa-circle-o"></i> Liên hệ</a></li>
                        </ul>
                    </li!-->
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-file-image-o"></i> <span>Quản lí Trang Web</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">

                            <li <?php if ($_GET['act'] == 'capnhat' && $_GET["typechild"] == "logo_top") echo ' class="this"' ?>><a
                                    href="index.php?com=banner&act=capnhat&typechild=logo_top"><i class="fa fa-circle-o"></i> Logo </a></li>


                            <li <?php if ($_GET['typechild'] == 'slider') echo ' class="this"' ?>><a
                                    href="index.php?com=image_url&act=man_photo&typechild=slider"><i class="fa fa-circle-o"></i> Show </a></li>

                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-file-image-o"></i> <span>Thông tin tài khoản</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?php if ($_GET['com'] == 'newsletter') echo ' class="this"' ?>><a
                                    href="index.php?com=newsletter&act=man" title=""><i class="fa fa-circle-o"></i> Hỗ trợ trực tuyến</a></li>

                            <li <?php if ($_GET['com'] == 'contact') echo ' class="this"' ?>><a href="index.php?com=contact&act=man" title=""><i class="fa fa-circle-o"></i> Liên Hệ</a></li>

                            <!--li <?php if ($_GET['com'] == 'setting') echo ' class="this"' ?>><a href="index.php?com=setting&act=capnhat"
                                                                                                title=""><i class="fa fa-circle-o"></i> Cấu hình chung</a></li!-->

                            <li <?php if ($_GET['com'] == 'user' && $_GET['act'] == 'admin_edit') echo ' class="this"' ?>><a
                                    href="index.php?com=user&act=admin_edit"><i class="fa fa-circle-o"></i> Thông tin Tài khoản</a></li>
                        </ul>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Left side content -->
            <!-- MultiUpload -->
            <link href="js/plugins/multiupload/css/jquery.filer.css" type="text/css" rel="stylesheet"/>
            <link href="js/plugins/multiupload/css/themes/jquery.filer-dragdropbox-theme.css" type="text/css"
                  rel="stylesheet"/>
            <script type="text/javascript" src="js/plugins/multiupload/jquery.filer.min.js"></script>
            <!-- MultiUpload -->
            <!-- Main content -->
            <section class="content">
                <?php include _template . $template . "_tpl.php" ?>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.0
            </div>
            <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Home tab content -->
                <div class="tab-pane" id="control-sidebar-home-tab">
                    <h3 class="control-sidebar-heading">Recent Activity</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                    <p>Will be 23 on April 24th</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-user bg-yellow"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                    <p>New phone +1(800)555-1234</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                    <p>nora@example.com</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-file-code-o bg-green"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                    <p>Execution time 5 seconds</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->

                    <h3 class="control-sidebar-heading">Tasks Progress</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Custom Template Design
                                    <span class="label label-danger pull-right">70%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Update Resume
                                    <span class="label label-success pull-right">95%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Laravel Integration
                                    <span class="label label-warning pull-right">50%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Back End Framework
                                    <span class="label label-primary pull-right">68%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->

                </div>
                <!-- /.tab-pane -->
                <!-- Stats tab content -->
                <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                <!-- /.tab-pane -->
                <!-- Settings tab content -->
                <div class="tab-pane" id="control-sidebar-settings-tab">
                    <form method="post">
                        <h3 class="control-sidebar-heading">General Settings</h3>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Report panel usage
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Some information about this general settings option
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Allow mail redirect
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Other sets of options are available
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Expose author name in posts
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Allow the user to show his name in blog posts
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <h3 class="control-sidebar-heading">Chat Settings</h3>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Show me as online
                                <input type="checkbox" class="pull-right" checked>
                            </label>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Turn off notifications
                                <input type="checkbox" class="pull-right">
                            </label>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Delete chat history
                                <a href="javascript:void(0)" class="text-red pull-right"><i
                                        class="fa fa-trash-o"></i></a>
                            </label>
                        </div>
                        <!-- /.form-group -->
                    </form>
                </div>
                <!-- /.tab-pane -->
            </div>
        </aside>
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
             immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="assets/bower_components/raphael/raphael.min.js"></script>
    <script src="assets/bower_components/morris.js/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="assets/bower_components/moment/min/moment.min.js"></script>
    <!-- datepicker -->
    <!-- Bootstrap WYSIHTML5 -->
    <script src="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="assets/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="assets/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="assets/dist/js/demo.js"></script>

    </body>
<?php } else { ?>
    <body class="nobg loginPage">
    <?php include _template . $template . "_tpl.php" ?>
    <!-- Footer line -->
    <div id="footer">

    </div>
    </body>
<?php } ?>
</html>
