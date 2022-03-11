<?php if (!defined('_source')) die("Error");

if (isset($_SESSION["login_member"]["id"])) {
    $id_thanhvien = $_SESSION["login_member"]["id"];


    $d->reset();
    $sql = "select * from table_user where com='member' and id='" . $id_thanhvien . "' order by stt asc";//tạo seseion id, gán id để lấy dữ liệu của thành viên để lưu vào đơn hàng
    $d->query($sql);
    $rs_member = $d->fetch_array();

}


$d->reset();
$sql = "select * from table_news where com='httt' order by stt asc";
$d->query($sql);
$list_httt = $d->result_array();

// thanh tieu de
$title_bar = _thanhtoan;
if (!empty($_POST)) {
    $hoten = $_POST['ten'];
    $dienthoai = $_POST['dienthoai'];
    $diachi = $_POST['diachi'];
    $email = $_POST['email'];
    $noidung = $_POST['noidung'];
    $ghichu = $_POST['ghichu'];
    $httt = @$_POST['httt'];
    $checkhttt = @$_POST['checkhttt'];
    $xuathd = @$_POST['checkinvoice'];

    //dump($_POST);

    //validate dữ liệu


    $hoten = trim(strip_tags($hoten));
    $dienthoai = trim(strip_tags($dienthoai));
    $diachi = trim(strip_tags($diachi));
    $email = trim(strip_tags($email));
    $noidung = trim(strip_tags($noidung));
    $ghichu = trim(strip_tags($ghichu));
    $checkhttt = trim(strip_tags($checkhttt));
    $xuathd = trim(strip_tags($xuathd));
    settype($httt, "int");

    if (get_magic_quotes_gpc() == false) {
        $hoten = mysql_real_escape_string($hoten);
        $dienthoai = mysql_real_escape_string($dienthoai);
        $diachi = mysql_real_escape_string($diachi);
        $email = mysql_real_escape_string($email);
        $noidung = mysql_real_escape_string($noidung);
        $ghichu = mysql_real_escape_string($ghichu);
        $checkhttt = mysql_real_escape_string($checkhttt);
        $xuathd = mysql_real_escape_string($xuathd);
    }
    $coloi = false;
    if ($hoten == null) {
        $coloi = true;
        $error_hoten = "Bạn chưa nhập họ tên<br>";
    }
    if ($dienthoai == null) {
        $coloi = true;
        $error_dienthoai = "Bạn chưa nhập điện thoại<br>";
    }
    if ($diachi == null) {
        $coloi = true;
        $error_diachi = "Bạn chưa nhập địa chỉ<br>";
    }

    if ($email == null) {
        $coloi = true;
        $error_email = "Bạn chưa nhập email<br>";
    } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
        $coloi = true;
        $error_email = "Bạn nhập email không đúng<br>";
    }
    /*if ($httt <1 and $httt>2) {
        $coloi=true; $error_httt = "Bạn chưa chọn hình thức thanh toán<br>";
    }*/

    if ($coloi == false) {
        $mahoadon = strtoupper(ChuoiNgauNhien(6));//mã đơn hàng tự sinh :D
        $ngaydangky = time();
        $tonggia = get_order_total();
        $tonggianhap = get_order_total_nhap();

        // lấy địa chỉ IP
        $ip_address = getRealIPAddress();


        $sql_order = "INSERT INTO  table_order (madonhang,id_thanhvien,hoten,dienthoai,diachi,email,httt,tonggia,tonggianhap,noidung,ghichu,ngaytao,trangthai,ip_address,xuathd,id_httt )
				  VALUES ('$mahoadon','$id_thanhvien','$hoten','$dienthoai','$diachi','$email','$httt','$tonggia','$tonggianhap','$noidung','$ghichu','$ngaydangky','1','$ip_address','$xuathd','$checkhttt')";
        // Thêm đơn hàng vào Database
        mysql_query($sql_order) or die(mysql_error());
        $id_order_inserted = mysql_insert_id(); //lấy id của đơn hàng vừa lưu thành công

        // Duyệt từ phần tử trong giỏ hàng để lưu vào chi tiết đơn hàng
        foreach ($_SESSION['cart'] as $item_cart) {
            // lấy dữ liệu cho từng sản phẩm trong giỏ hàng
            $d->reset();
            $sql = "select ten_$lang,id,tenkhongdau_$lang,photo,gia,giamgia,gianhap from table_product where id='" . $item_cart['productid'] . "'";
            $d->query($sql);
            $item_pro = $d->fetch_array();
            // đơn giá của từng item (màu + giảm giá + option)
            $price_item = ($item_pro['gia'] * (100 - $item_pro['giamgia']) / 100 - $v_sp["gia"]*0.1);
            $price_nhap = $item_pro['gianhap'];

            // lưu vào bảng chi tiết đơn hàng
            $sql_order_detail = "INSERT INTO  table_order_detail (id_order,id_product,gia,gianhap,soluong)
				  				VALUES ('$id_order_inserted','$item_pro[id]','$price_item','$price_nhap','$item_cart[qty]')";
            mysql_query($sql_order_detail) or die(mysql_error());


            $sql = "UPDATE #_product SET luotmua=luotmua+1  WHERE id=$item_pro[id]";
            $d->query($sql);


        }


        $iduser = mysql_insert_id();

        unset($_SESSION['cart']);
        transfer("Đơn hàng của bạn đã được gửi", "index.html");


    }

}
?>