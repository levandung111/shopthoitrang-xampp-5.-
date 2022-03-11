<?php
$sql = "select s.*,u.username as admin_name from table_store s JOIN table_user u ON u.id = s.id_admin";
if($_GET['search']){
    $sql .= " where s.note LIKE '%".$_GET['search']."%' ";
}
$sql .= " order by s.id desc ";
//var_dump($sql);die();
$d->query($sql);
$rows = $d->result_array();
?>

<?php if ($_SESSION['msg_delete_store']) { ?>
    <div class="alert alert-success">
        <?php
        echo $_SESSION['msg_delete_store'];
        unset($_SESSION['msg_delete_store']);
        ?>
    </div>
<?php } ?>

<h3>Danh sách hóa đơn nhập hàng:</h3>
<div class="control_frm" style="margin-top:0;">
    <div style="float:left;">
        <input type="button" class="blueB" value="Thêm"
               onclick="location.href='index.php?com=store&act=add&typechild=product'"/>
    </div>
    <form action="index.php">
    <div style="float:right;">
        <input name="com" value="store" type="hidden">
        <input name="act" value="list" type="hidden">
        <div class="selector">
            Tìm kiếm: <input name="search" id="keyword" type="text" value="<?= $_GET['search']?$_GET['search']:'' ?>"/> <input
                type="submit" value="Tìm" />
        </div>
    </div>
    </form>

</div>
<div class="widget">
    <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" >
        <thead>
        <tr>
            <td class="tb_data_small"><a href="#">STT</a></td>
            <td>
                <div>Mã Hoá Đơn<span></span></div>
            </td>
            <td class="">Ghi Chú</td>
            <td>Người Nhập</td>
            <td>Ngày Nhập</td>
            <td>Tổng Tiền</td>
            <td>Thao Tác</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($rows as $k => $v){ ?>
        <tr>
            <td><?= $k + 1 ?></td>
            <td><?= $v['id'] ?></td>
            <td><?= $v['note'] ?></td>
            <td><?= $v['admin_name'] ?></td>
            <td><?= $v['date_order'] ?></td>
            <td class="title_name_data"><?= $v['price'] ?>VND</td>
            <td class="actBtns">
                <a href="index.php?com=store&act=details&id=<?= $v['id'] ?>"
                   title="" class="smallButton tipS" original-title="xem hoá đơn"><i class="fa fa-eye"></i></a>
                <a href="index.php?com=store&act=delete&id=<?= $v['id'] ?>"
                   onclick="return confirm('bạn muốn xoá ?')"
                   title="" class="smallButton tipS" original-title="Xóa  hoá đơn"><img
                        src="./images/icons/dark/xicon1.png" alt=""></a></td>
            <?php } ?>
        </tbody>
    </table>
</div>
