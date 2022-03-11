<?php
$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$d = new database($config['database']);
$d->reset();
$sql_setting = "select * from #_setting limit 0,1";
$d->query($sql_setting);
$row_setting = $d->fetch_array();


$d->reset();
$sql = "select * from #_lang_define order by id desc";
$d->query($sql);
$define = $d->result_array();
foreach ($define as $v) {
    @define($v["ten"], $v["lang_" . $lang]);
}

switch ($com) {

    case 'langs':
        if (isset($_GET['lang'])) {
            switch ($_GET['lang']) {
                case 'vi':
                    $_SESSION['lang'] = 'vi';
                    break;
                case 'en':
                    $_SESSION['lang'] = 'en';
                    break;
                case 'cn':
                    $_SESSION['lang'] = 'cn';
                    break;
                case 'ge':
                    $_SESSION['lang'] = 'ge';
                    break;
                default :
                    $_SESSION['lang'] = 'vi';
                    break;
            }
        } else {
            $_SESSION['lang'] = 'vi';
        }
        if (@$_GET['loai'] == 'intro') {
            echo '<script type="text/javascript">
						window.location = "index.html";
					</script>';
        }
        break;


    case 'thoat':
        $source = "logout";
        break;


    case 'gioi-thieu':
        $source = "about";
        $com_type = "gioithieu";
        $com_title = _gioithieu;
        $template = "about";
        break;


    case 'san-pham':
        $source = "product";
        $com_type = "product";// trường dữ liệu table == com table_product
        $com_title = _sanpham;
        $title_other = "sản phẩm liên quan";
        $template = isset($_GET['id']) ? "product_detail" : "product";
        break;

    case 'san-pham-sale':
        $source = "product_sale";
        $com_type = "product";// trường dữ liệu table == com table_product
        $com_title = "sản phẩm giảm giá";
        $title_other = "sản phẩm giảm giá";
        $template = "product_sale";
        break;


    case 'dich-vu':
        $source = "news";
        $com_type = "dichvu";
        $com_title = _dichvu;
        $template = isset($_GET['id']) ? "news_detail" : "news";
        break;


    case 'tin-tuc':
        $source = "news";
        $com_type = "news";
        $com_title = _tintuc;
        $template = isset($_GET['id']) ? "news_detail" : "news";
        break;


    case 'lien-he':
        $source = "contact";
        $template = "contact";
        break;

    case 'tim-kiem':
        $source = "search";
        $com_title = _sanpham;
        $template = "search";
        break;


    case 'gio-hang':
        $source = "giohang";
        $template = "giohang";
        break;

    case 'thanh-toan':
        $source = "thanhtoan";
        $template = "thanhtoan";
        break;


    default:
        $source = "index";
        $template = "index";
        break;
}

//var_dump( _source . $source . ".php");die();
if ($source != "") include _source . $source . ".php";

if ($_REQUEST['com'] == 'logout') {
    session_unregister($login_name);
    header("Location:index.php");
}
?>