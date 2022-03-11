<?php
error_reporting(0);
session_start();
$session = session_id();
@define('_template', '../templates/');
@define('_source', '../sources/');
@define('_lib', '../../libraries/');
$url_back = $_SERVER['HTTP_REFERER'];
include_once _lib . "config.php";
include_once _lib . "constant.php";
include_once _lib . "functions.php";
include_once _lib . "functions_giohang.php";
include_once _lib . "library.php";
include_once _lib . "class.database.php";
$d = new database($config['database']);


if (isset($_POST['id_item']) && $_POST['id_item'] && $_POST['type'] == 3) {
    $d->reset();
    $sql = "select * from #_product where hienthi=1 and id_item = " . $_POST['id_item'] . " order by stt,id";
    $d->query($sql);
    $result = $d->result_array();
    if (!empty($result)) {
        ?>
        <?php foreach ($result as $result_item) { ?>
            <option value="<?= $result_item['id'] ?>"><?= $result_item["ten_vi"] ?></option>
            <?php
        }
    }
} else if (isset($_POST['id_item']) && $_POST['id_item'] && $_POST['type'] == 1) {
    $d->reset();
    $sql = "select * from #_product where hienthi=1 and id_list = " . $_POST['id_item'] . " order by stt,id";
    echo $sql;
    $d->query($sql);
    $result = $d->result_array();
    if (!empty($result)) {
        ?>
        <?php foreach ($result as $result_item) { ?>
            <option value="<?= $result_item['id'] ?>"><?= $result_item["ten_vi"] ?></option>
            <?php
        }
    } else {
        echo 'error';
    }
} else if (isset($_POST['id_item']) && $_POST['id_item'] && $_POST['type'] == 2) {
    $d->reset();
    $sql = "select * from #_product where hienthi=1 and id_cat = " . $_POST['id_item'] . " order by stt,id";
    $d->query($sql);
    $result = $d->result_array();
    if (!empty($result)) {
        ?>
        <?php foreach ($result as $result_item) { ?>
            <option value="<?= $result_item['id'] ?>"><?= $result_item["ten_vi"] ?></option>
            <?php
        }
    } else {
        echo 'error';
    }
} else if (isset($_POST['data_insert']) && $_POST['type'] == 'insert') {
    $note = $_POST["data_insert"]['note'];
    $id_admin = $_POST["data_insert"]['id_admin'];
    $date_order = $_POST["data_insert"]['date_order'];
    $price = $_POST["data_insert"]['price'];
    $dataInsert = $_POST["data_insert"]['dataInsert'];
    $d->reset();
    $sql1 = "INSERT INTO table_store (note,date_order,id_admin, price)VALUES('$note','$date_order','$id_admin',$price)";
    $result1 = $d->query($sql1);
    $last_id = mysql_insert_id();
    foreach ($dataInsert as $item) {
        $sql1 = "INSERT INTO table_store_product (id_store,id_product,price, name_product,number)
VALUES('$last_id','" . $item["idProduct"] . "','" . $item["price"] . "','" . $item["nameProduct"] . "'," . $item["number"] . ")";
        $d->query($sql1);

        $sql_update = "update table_product set soluong = soluong + '".$item["number"]."',gianhap='".$item["price"]."' where id='".$item["idProduct"]."'";
        $d->query($sql_update);
    }
} else {
    echo 'error';
}

?>