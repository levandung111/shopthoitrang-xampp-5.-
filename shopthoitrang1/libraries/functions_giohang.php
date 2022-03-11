<?php
function get_tong_tien($id = 0) {
    global $d;
    if ($id > 0) {
        $d->reset();
        $sql = "select gia,soluong from #_order_detail where id_order='" . $id . "'";
        $d->query($sql);
        $result = $d->result_array();
        $tongtien = 0;
        for ($i = 0, $count = count($result); $i < $count; $i++) {
            $tongtien += $result[$i]['gia'] * $result[$i]['soluong'];
        }
        return $tongtien;
    } else return 0;
}


function get_product_name($pid, $lang) {
    global $d, $row;
    $sql = "select ten_$lang from #_product where id=$pid";
    $d->query($sql);
    $row = $d->fetch_array();
    return $row["ten_$lang"];

}

function get_product_img($pid) {
    global $d, $row;
    $sql = "select photo from #_product where id=$pid";
    $d->query($sql);
    $row = $d->fetch_array();
    return $row['photo'];
}

function get_price($pid) {
    global $d, $row;
    $sql = "select gia from table_product where id=$pid";
    $d->query($sql);
    $row = $d->fetch_array();
    return $row['gia'];
}

function get_price_sale($pid) {
    global $d, $row;
    $sql = "select giamgia from table_product where id=$pid";
    $d->query($sql);
    $row = $d->fetch_array();
    return $row['giamgia'];
}


function get_price_nhap($pid) {
    global $d, $row;
    $sql = "select gianhap from table_product where id=$pid";
    $d->query($sql);
    $row = $d->fetch_array();
    return $row['gianhap'];
}

function get_price_km($pid) {
    global $d, $row;
    $sql = "select giamgia from table_product where id=$pid";
    $d->query($sql);
    $row = $d->fetch_array();
    return ($row['giamgia'] / 100);
}

function remove_product($pid) {
    $pid = intval($pid);
    $max = count($_SESSION['cart']);
    for ($i = 0; $i < $max; $i++) {
        if ($pid == $_SESSION['cart'][$i]['productid']) {
            unset($_SESSION['cart'][$i]);
            break;
        }
    }
    $_SESSION['cart'] = array_values($_SESSION['cart']);
}

function get_order_total() {
    $max = count($_SESSION['cart']);
    $sum = 0;
    for ($i = 0; $i < $max; $i++) {
        $pid = $_SESSION['cart'][$i]['productid'];
        $q = $_SESSION['cart'][$i]['qty'];
        $price = (get_price($pid)) - (get_price($pid) * get_price_km($pid));
        $sum += $price * $q;

    }
    return $sum;
}


function get_order_total_nhap() {
    $max = count($_SESSION['cart']);
    $sum = 0;
    for ($i = 0; $i < $max; $i++) {
        $pid = $_SESSION['cart'][$i]['productid'];
        $q = $_SESSION['cart'][$i]['qty'];
        $price = (get_price_nhap($pid)) - (get_price_nhap($pid) * get_price_km($pid));
        $sum += $price * $q;

    }
    return $sum;
}

function get_total() {
    $max = count($_SESSION['cart']);
    $sum = 0;
    for ($i = 0; $i < $max; $i++) {
        $sum++;
    }
    return $sum;
}

function addtocart($pid, $q) {
    if ($pid < 1 or $q < 1) return;

    if (is_array($_SESSION['cart'])) {

        $i = product_exists($pid);

        if ($i != -1) {
            $_SESSION['cart'][$i]['qty'] = $q + $_SESSION['cart'][$i]['qty'];

            return;
        } else {
            $max = count($_SESSION['cart']);
            $_SESSION['cart'][$max]['productid'] = $pid;
            $_SESSION['cart'][$max]['qty'] = $q;
        }
    } else {
        $_SESSION['cart'] = array();
        $_SESSION['cart'][0]['productid'] = $pid;
        $_SESSION['cart'][0]['qty'] = $q;

    }
}

function product_exists($pid) {
    $pid = intval($pid);
    $max = count($_SESSION['cart']);
    $flag = -1;

    for ($i = 0; $i < $max; $i++) {
        if ($pid == $_SESSION['cart'][$i]['productid']) {
            $flag = $i;
            break;
        }
    }
    return $flag;
}


function update_slmua($pid, $q) {
    global $d, $row;
    $sql = "UPDATE #_product SET slmua=slmua+$q  WHERE id=$pid";
    $d->query($sql);
}


function get_total_qty() {
    $sum = 0;
    foreach ($_SESSION['cart'] as $key => $value) {
        $q = $value['qty'];
        $sum += $q;
    }

    return $sum;
}

?>