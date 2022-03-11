<?php
error_reporting(0);//báo cáo lỗi code
session_start();
$session = session_id();
@define('_template', './templates/'); // thư mục các templates web (sản phẩm, tin tức, liên hệ)


@define('_source', './sources/'); // thư mục chứa code xử lý các câu lện truy vấn database để lấy dữ liệu ra ngoài web
@define('_lib', './libraries/'); // thư viện chứa các function
@define(_upload_folder, './media/upload/'); //  định nghĩa thư mục upload


include_once _lib . "config.php"; //  cấu hình và kết nối với database (username,pass,.. connect database)

//Lưu ngôn ngữ chọn vào $_SESSION (phần này đang nghiên cứu triển khai dùng cho ngôn ngữ tạo dữ liệu database)
$lang_arr = array("vi", "en", "cn", "ge");
if (isset($_GET['lang']) == true) {
    if (in_array($_GET['lang'], $lang_arr) == true) {
        $lang = $_GET['lang'];
        $_SESSION['lang'] = $lang;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
if (isset($_SESSION['lang'])) {
    $lang = $_SESSION['lang'];
} else {

    $lang = $config["lang_default"];
}


require_once _source . "lang_$lang.php";

include_once _lib . "constant.php"; // Function định nghĩa xử lý code thư mục upload
include_once _lib . "functions.php"; // Function xử lý các chức năng
include_once _lib . "functions_giohang.php"; // Function xử lý giỏ hàng
include_once _lib . "library.php";

include_once _lib . "class.database.php"; // Function xử lý và thay thế câu lệnh php cơ bản (insert,update,select)

include_once _lib . "file_requick.php"; // Function xử lý requick đường dẫn vs .htacess

include_once _source . "counter.php"; //  xử lý thống kê truy cập

include_once _source . "useronline.php"; //  xử lý thống kê user dang truy cap

$d = new database($config['database']); //  khởi tạo database trên fucntion class database


if ($_REQUEST['command'] == 'add' && $_REQUEST['productid'] > 0) {
    $pid = $_REQUEST["productid"];
    $q = isset($_GET['quality']) ? ($_GET['quality']) : "1";
    addtocart($pid, $q);
    redirect("http://$config_url/gio-hang.html");
}

// unset($_SESSION["cart"]);

?>


<html lang="en-US" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<!--<![endif]-->
<head>
    <base href="http://<?= $config_url ?>/"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php if (isset($title_bar)) echo $title_bar; else echo $row_setting["title_$lang"]; ?></title>
    <meta name="viewport" content="width=1300, initial-scale=1.0">
    <meta name="robots" content="index, follow"/>


    <meta name="author" content="<?= $row_setting["author"] ?>">


    <meta http-equiv="Content-Language" content="vi"/>
    <meta name="Language" content="vietnamese"/>


    <link rel="shortcut icon" href="<?= _upload_hinhanh_l . $row_setting["favicon"] ?>">

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <?php include _template . "layout/style_web.php"; ?>
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css "/>


    <link rel='stylesheet' id='font-awesome-css' href='fonts/font-awesome/css/font-awesome.min.css?ver=4.0.3'
          type='text/css' media='all'/>
    <link rel="stylesheet" type="text/css" href="css/style_frm_dkdn.css">


    <script src="js/jquery-1.11.2.min.js"></script>

    <script src="bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="js/jquery.jmNotify.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="owl-carousel/owl.carousel.js"></script>
    <!-- Owl Carousel Assets -->
    <link href="owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="owl-carousel/owl.theme.css" rel="stylesheet">
    <link href="owl-carousel/my_css.css" rel="stylesheet">

    <script type="text/javascript" src="js/my_srcipt_full.js"></script>
    <script type="text/javascript" src="js/jquery.hoverIntent.minified.js"></script>
    <script type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js/jquery.cycle.all.js"></script>
    <script type="text/javascript" language="javascript">
        $(document).ready(function () {

            $('.accordion-2').dcAccordion({
                eventType: 'hover',
                autoClose: false,
                menuClose: true,
                classExpand: 'dcjq-current-parent',
                saveState: false,
                disableLink: false,
                showCount: false,
                hoverDelay: 50,
                speed: 'slow'
            });
            $('.fade').cycle();
        });
    </script>


</head>

<body>

<div class="alert-container"></div>
<div class="customNotify"></div>
<script language="javascript">
    function addtocart(pid) {
        document.form1.productid.value = pid;
        document.form1.command.value = 'add';
        document.form1.submit();
        return false;
    }
</script>
<form name="form1" action="index.php">
    <input type="hidden" name="productid"/>
    <input type="hidden" name="command"/>
</form>

<div id="container_NNT">

    <div class="main-wrap">


        <header id="header" class="header header-style-2 header-scheme-light" role="banner" itemscope="itemscope"
                itemtype="http://schema.org/WPHeader">


            <?php include _template . "layout/header.php"; ?>


        </header><!--end header-->


        <div class="clear"></div>


        <nav class="nav-menu-header">


            <?php include _template . "layout/menu_top.php"; ?>

        </nav><!--end nav-menu-heade-->


        <main class="main-wrap-bg">

            <?php if ($_GET["com"] == "" || $_GET["com"] == "index") { ?>

                <div class="slider-container slider-container-2">

                    <?php include _template . "layout/slide_show.php"; ?>

                </div><!--end slider-container-->

            <?php } ?>


            <div class="content-wrap">


                <div
                    class="col_main <?php if (isset($_GET['com']) and $_GET['com'] != 'index') { ?> center_full <?php } ?> " <?php if (!isset($_GET['com']) || $_GET['com'] == 'index') echo ' style="width:100%;padding-top: 0px;margin-top: 30px;background: none; "'; ?>>
                    <?php
                    if (isset($_GET['com']) and $_GET['com'] != 'index' and $_GET['com'] != 'tim-kiem' and $_GET['com'] != 'tim-kiem' and $_GET['com'] != 'lien-he') {
                        ?>
                        <div class="col_left">
                            <?php include _template . "layout/left.php"; ?>
                        </div><!--col_left-->

                        <?php
                    }
                    ?>

                    <div <?php if (isset($_GET['com']) and $_GET['com'] != 'index' and $_GET['com'] != 'tim-kiem' and $_GET['com'] != 'lien-he') echo 'class="col_center "'; ?> <?php if (!isset($_GET['com']) || $_GET['com'] == 'index' || $_GET['com'] == '' || $_GET['com'] == 'lien-he' || $_GET['com'] == 'tim-kiem') echo ' style="margin-left:0px; width:100%;margin-top: 0px; float:right;background:none; "'; ?> >

                        <?php  include _template . $template . "_tpl.php"; ?>
                        <!---?php// _template(thư mục templates) / $template(product|| product_detail) => product_tpl.php ?---->


                        <div class="clear"></div>

                    </div><!--col_center-->


                    <div class="clear"></div>

                </div><!--col_main-->


                <div class="clear"></div>


            </div><!--end content-wrap-->


            <div class="bottom-instagram clearfix">

                <?php include _template . "layout/bottom.php"; ?>

            </div><!--end bottom-instagram-->

            <div class="footer-instagram clearfix">

                <?php include _template . "layout/footer.php"; ?>

            </div><!--end footer-instagram-->


        </main> <!--end main-wrap-bg-->

    </div><!--end main-wrap-->

</div><!--END container_NNT-->

<?php include _template . "layout/back-top.php"; ?>
<?php include _template . "layout/login_register.php"; ?>
<script lang="javascript">(function() {var pname = ( (document.title !='')? document.title : ((document.querySelector('h1') != null)? document.querySelector('h1').innerHTML : '') );var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async=1; ga.src = '//live.vnpgroup.net/js/web_client_box.php?hash=5b044dbf11ffde3bae0d3f7eb3df0985&data=eyJzc29faWQiOjMzNzM5NjQsImhhc2giOiI0ZjE1ZmZiYjg3NDM4ZDBkMzc5NDM2NjZkMDM3ZWFkMSJ9&pname='+pname;var s = document.getElementsByTagName('script');s[0].parentNode.insertBefore(ga, s[0]);})();</script>	
</body>
<?php
//require('facebookchat.php');
?>

<div class="phonering-alo-phone phonering-alo-green phonering-alo-show" id="phonering-alo-phoneIcon" style="left: -50px; bottom: 150px; position: fixed;">
 <div class="phonering-alo-ph-circle"></div>
 <div class="phonering-alo-ph-circle-fill"></div>
 <a href="tel:+84986312374"></a>
 <div class="phonering-alo-ph-img-circle">
 <a href="tel:+84986312374"></a>
 <a href="tel:+84986312374" class="pps-btn-img " title="Liên hệ">
 <img src="https://i.imgur.com/v8TniL3.png" alt="Liên hệ" width="50" onmouseover="this.src='https://i.imgur.com/v8TniL3.png';" onmouseout="this.src='https://i.imgur.com/v8TniL3.png';">
 </a>
 </div>
</div>
<a href="tel:+84986312374">
 <span style="left: 90px; bottom: 30px; position: fixed; color: yellow; padding: 5px 10px; border-radius: 5px; font-size: 20px; z-index: 10000;"><strong></strong></span></a>

</html>