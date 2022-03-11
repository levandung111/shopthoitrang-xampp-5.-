<?php
$sql = "select s.*,u.username as name_admin from table_store s JOIN table_user u ON u.id = s.id_admin where s.id = " . $_GET['id'];
$d->query($sql);
$row = $d->result_array();

$sql_product = "select * from table_store_product where id_store = " . $_GET['id'];
$d->query($sql_product);
$list_product = $d->result_array();
?>
<div class="wrapper">
    <div class="control_frm">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li>
                    <a href="index.php?com=product&act=man&typechild=<?= @$_GET['typechild'] ?>"><span>Quản Lý Hoá Đơn</span></a>
                </li>
                <li class="current"><a href="#" onclick="return false;">Chi tiết</a></li>
            </ul>
            <div class="clear"></div>
        </div>


    </div><!--end control_frm-->


    <form name="supplier" id="validate" class="form"
          action="index.php?com=product&act=save&typechild=<?= @$_GET['typechild'] ?>&id_list=<?= $_GET['id_list'] ?>&curPage=<?= @$_REQUEST['curPage'] ?>"
          method="post" enctype="multipart/form-data">
        <div class="widget">
            <div class="title"><img src="./images/icons/dark/list.png" alt="" class="titleIcon"/>
                <h6>Thông tin hoá đơn</h6>
            </div>


            <div class="clear"></div>

            <input type="hidden" id="idUser" value="<?= $_SESSION['login_admin']['id'] ?>">
            <div class="formRow">
                <label>Người Nhập: </label>
                <div class="formRight">
                    <input type="text" id="username" name="username"
                           value="<?= $row[0]['name_admin'] ?>"
                           title="" class="tipS" readonly style="width:300px;"/>


                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow">
                <label>Ngày Nhập: </label>
                <div class="formRight">
                    <div class="input-group date">
                        <input type="text" id="" style="width:300px;" readonly value="<?= $row[0]['date_order'] ?>" required>
                    </div>
                </div>
                <div class="clear"></div>

            </div>
            <div class="formRow">
                <label>Ghi Chú: </label>
                <div class="formRight">
                    <textarea cols="3" id="note" name="note" readonly ><?= $row[0]['note'] ?></textarea>
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
                <table id="listProductTable" class="table table-bordered">
                    <tr>
                        <th>ID sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá nhập</th>
                        <th>số lượng</th>
                        <th>Tổng giá</th>
                    </tr>
                    <?php  foreach($list_product as $v) {  ?>
                        <tr>
                            <td><?= $v['id_product'] ?></td>
                            <td><?= $v['name_product'] ?></td>
                            <td><?= $v['price'] ?>vnd</td>
                            <td><?= $v['number'] ?></td>
                            <td><?= $v['price']*$v['number'] ?>vnd</td>
                        </tr>
                    <?php } ?>
                </table>
                <strong>Tổng Đơn Hàng: <span id="allPrice"><?= $row[0]['price'] ?>VND</span></strong>
            </div>
            <div class="formRow">
                <div class="formRight">
                    <input type="button" value="Thoát" onclick="location.href='index.php?com=store&act=list'" class="blueB"/>
                </div>
                <div class="clear"></div>
            </div>


        </div>

    </form>


</div><!--end wrapper-->


<script type="text/javascript">



</script>

<script type="text/javascript">
    $(document).ready(function () {

        $('.file_input').filer({
            showThumbs: true,
            templates: {
                box: '<ul class="jFiler-item-list"></ul>',
                item: '<li class="jFiler-item">\
                            <div class="jFiler-item-container">\
                                <div class="jFiler-item-inner">\
                                    <div class="jFiler-item-thumb">\
                                        <div class="jFiler-item-status"></div>\
                                        <div class="jFiler-item-info">\
                                            <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
                                        </div>\
                                        {{fi-image}}\
                                    </div>\
                                    <div class="jFiler-item-assets jFiler-row">\
                                        <ul class="list-inline pull-left">\
                                            <li><span class="jFiler-item-others">{{fi-icon}} {{fi-size2}}</span></li>\
                                        </ul>\
                                        <ul class="list-inline pull-right">\
                                            <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                        </ul>\
                                    </div>\<input type="text" name="stthinh[]" class="stthinh" />\
                                </div>\
                            </div>\
                        </li>',
                itemAppend: '<li class="jFiler-item">\
                            <div class="jFiler-item-container">\
                                <div class="jFiler-item-inner">\
                                    <div class="jFiler-item-thumb">\
                                        <div class="jFiler-item-status"></div>\
                                        <div class="jFiler-item-info">\
                                            <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
                                        </div>\
                                        {{fi-image}}\
                                    </div>\
                                    <div class="jFiler-item-assets jFiler-row">\
                                        <ul class="list-inline pull-left">\
                                            <span class="jFiler-item-others">{{fi-icon}} {{fi-size2}}</span>\
                                        </ul>\
                                        <ul class="list-inline pull-right">\
                                            <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                        </ul>\
                                    </div>\<input type="text" name="stthinh[]" class="stthinh" />\
                                </div>\
                            </div>\
                        </li>',
                progressBar: '<div class="bar"></div>',
                itemAppendToEnd: true,
                removeConfirmation: true,
                _selectors: {
                    list: '.jFiler-item-list',
                    item: '.jFiler-item',
                    progressBar: '.bar',
                    remove: '.jFiler-item-trash-action',
                }
            },
            addMore: true
        });
    });
</script>
