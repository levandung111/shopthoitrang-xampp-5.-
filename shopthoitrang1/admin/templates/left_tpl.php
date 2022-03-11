<?php
$d->reset();
$sql = "select banner_vi from #_banner where com='logo_top'";
$d->query($sql);
$logo = $d->fetch_array();
$d->reset();
$sql = "select id from #_order ";
$d->query($sql);
$count_slorder = $d->result_array();
$soluong_order_menu = count($count_slorder);//láy hết các đơn hàng
?>


<div class="logo"><a href="../" target="_blank"> <img src="<?= _upload_hinhanh . $logo["banner_vi"] ?>"
                                                      style="width:100%;" alt=""/> </a></div>
<div class="sidebarSep mt0"></div>
<!-- Left navigation -->
<ul id="menu" class="nav">
    <li class="dash" id="menu1"><a class=" active" title="" href="index.php"><span>Trang chủ</span></a></li>
    <li class="categories_li<?php if ($_GET['typeparent'] == 'product' || $_GET['typechild'] == 'product' || $_GET['com'] == 'users' || $_GET['typechild'] == 'httt' || $_GET['com'] == 'order') echo ' activemenu' ?>"
        id="menu_danhmucsanpham"><a href="" title="" class="exp"><span>Danh Mục Sản Phẩm</span><strong></strong></a>
        <ul class="sub">
            <li <?php if ($_GET["typeparent"] == "product" && ($_GET['act'] == 'man_list' || $_GET["act"] == "edit_list")) echo ' class="this"' ?>>
                <a href="index.php?com=product&act=man_list&typeparent=product">Danh mục cấp 1</a></li>

            <li <?php if ($_GET["typeparent"] == "product" && ($_GET['act'] == 'man_cat' || $_GET["act"] == "edit_cat")) echo ' class="this"' ?>>
                <a href="index.php?com=product&act=man_cat&typeparent=product">Danh mục cấp 2</a></li>

            <li <?php if ($_GET["com"] == "product" && ($_GET['act'] == 'man_item' || $_GET["act"] == "edit_item")) echo ' class="this"' ?>>
                <a href="index.php?com=product&act=man_item&typeparent=product">Danh mục cấp 3</a></li>


            <li <?php if ($_GET['typechild'] == 'product' && ($_GET["act"] == "man" || $_GET["act"] == "edit")) echo ' class="this"' ?>>
                <a href="index.php?com=product&act=man&typechild=product">Danh Sách Sản Phẩm</a></li>

            <li <?php if ($_GET['typechild'] == 'httt') echo ' class="this"' ?> ><a
                    href="index.php?com=news&act=man&typechild=httt">Hình thức thanh toán</a></li>

            <li <?php if ($_GET['com'] == 'order') echo ' class="this"' ?> ><a href="index.php?com=order&act=man">Đơn
                    hàng</a></li>

            <li <?php if ($_GET['com'] == 'users') echo ' class="this"' ?> ><a href="index.php?com=users&act=man">Thành
                    viên</a></li>

            <li <?php if ($_GET['com'] == 'users') echo ' class="this"' ?> ><a href="index.php?com=store&act=list">Quản Lý Nhập Hàng</a></li>


        </ul>
    </li>
    <li class=" template_li<?php if ($_GET['com'] == 'thongke') echo ' activemenu' ?>" id="menutkbc11">
        <a href="#"
           title=""
           class="exp"><span>Thống Kê - Báo Cáo</span><strong></strong></a>
        <ul class="sub">
            <li <?php if ($_GET['act'] == 'thongke_soluongorder') echo ' class="this"' ?> ><a
                    href="index.php?com=thongke&act=thongke_soluongorder">Tổng số đơn
                    hàng <?php if ($soluong_order_menu > 0) { ?><b><?= $soluong_order_menu ?></b><?php } ?></a></li>
            <li <?php if ($_GET['act'] == 'thongke_sumpriceorder') echo ' class="this"' ?> ><a
                    href="index.php?com=thongke&act=thongke_sumpriceorder">Tổng danh thu theo ngày/tháng</a></li>
            <li <?php if ($_GET['act'] == 'thongke_lai_orders') echo ' class="this"' ?> ><a
                    href="index.php?com=thongke&act=thongke_lai_orders">Tiền lãi theo ngày/tháng</a></li>
            <li <?php if ($_GET['act'] == 'product_buy') echo ' class="this"' ?> ><a
                    href="index.php?com=thongke&act=product_buy">Thống kê Sản phẩm đã mua</a></li>
        </ul>
    </li>
    <li class="article_li<?php if ($_GET['typechild'] == 'nhanhopdong' || $_GET['typechild'] == 'news' || $_GET['typechild'] == 'nhangiacong') echo ' activemenu' ?>"
        id="menu_baiviet"><a href="#" title="" class="exp"><span>Danh Mục Bài Viết</span><strong></strong></a>
        <ul class="sub">

            <li <?php if ($_GET['typechild'] == 'gioithieu') echo ' class="this"' ?> ><a
                    href="index.php?com=info&act=capnhat&typechild=gioithieu">Giới thiệu</a></li>


            <li <?php if ($_GET['typechild'] == 'news') echo ' class="this"' ?> ><a
                    href="index.php?com=news&act=man&typechild=news">Tin tức</a></li>


            <li <?php if ($_GET['typechild'] == 'dichvu') echo ' class="this"' ?> ><a
                    href="index.php?com=news&act=man&typechild=dichvu">Dịch vụ</a></li>


        </ul>

    </li>
    <li class="template_li<?php if ($_GET['typechild'] == 'lienhe' || $_GET['typechild'] == 'footer') echo ' activemenu' ?>"
        id="menu_trangtinh"><a href="#" title="" class="exp"><span>Trang tĩnh</span><strong></strong></a>
        <ul class="sub">


            <li <?php if ($_GET['typechild'] == 'footer') echo ' class="this"' ?> ><a
                    href="index.php?com=info&act=capnhat&typechild=footer">Footer</a></li>


            <li <?php if ($_GET['typechild'] == 'lienhe') echo ' class="this"' ?> ><a
                    href="index.php?com=info&act=capnhat&typechild=lienhe">Liên hệ</a></li>


        </ul>
    </li>
    <li class="gallery_li<?php if ($_GET["com"] == "banner" || $_GET["com"] == "background" || $_GET["com"] == "image_url" || $_GET["com"] == "support_online" || $_GET["typechild"] == "bando") echo ' activemenu' ?>"
        id="menu6"><a href="#" title="" class="exp"><span>Hình Ảnh - Support </span><strong></strong></a>
        <ul class="sub">

            <li <?php if ($_GET['act'] == 'capnhat' && $_GET["typechild"] == "logo_top") echo ' class="this"' ?>><a
                    href="index.php?com=banner&act=capnhat&typechild=logo_top">Cập nhật Logo Top </a></li>


            <li <?php if ($_GET['typechild'] == 'slider') echo ' class="this"' ?>><a
                    href="index.php?com=image_url&act=man_photo&typechild=slider">Slide Show </a></li>


            <li <?php if ($_GET['typechild'] == 'mangxahoi_ft') echo ' class="this"' ?>><a
                    href="index.php?com=image_url&act=man_photo&typechild=mangxahoi_ft">Mạng xã hội Footer</a></li>


            <li <?php if ($_GET['typechild'] == 'support_online') echo ' class="this"' ?> ><a
                    href="index.php?com=support_online&act=man&typechild=support_online">Hỗ trợ trực tuyến</a></li>


        </ul>
    </li>
    <li class="setting_li<?php if ($_GET['com'] == 'setting' || $_GET['com'] == 'lang_define' || $_GET['com'] == 'contact' || $_GET['com'] == 'database' || $_GET['com'] == 'backup' || $_GET['com'] == 'user' || $_GET['com'] == 'newsletter') echo ' activemenu' ?>"
        id="menu8"><a href="#" title="" class="exp"><span>Cấu hình website</span><strong></strong></a>

        <ul class="sub">


            <li <?php if ($_GET['com'] == 'newsletter') echo ' class="this"' ?>><a
                    href="index.php?com=newsletter&act=man" title="">Newsletter</a></li>

            <li <?php if ($_GET['com'] == 'contact') echo ' class="this"' ?>><a href="index.php?com=contact&act=man">Quản
                    lý liên hệ</a></li>

            <li <?php if ($_GET['com'] == 'setting') echo ' class="this"' ?>><a href="index.php?com=setting&act=capnhat"
                                                                                title="">Cấu hình chung</a></li>

            <li <?php if ($_GET['com'] == 'user' && $_GET['act'] == 'admin_edit') echo ' class="this"' ?>><a
                    href="index.php?com=user&act=admin_edit">Thông tin Tài khoản</a></li>
        </ul>
    </li>
</ul>