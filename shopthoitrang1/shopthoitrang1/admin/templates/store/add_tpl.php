<script type="text/javascript" src="js/script_gaconit.js"></script>
<script type="text/javascript">
    <?php
    if(@$_REQUEST['act'] == 'edit' and $item['id_list'] != 0){
    ?>
    load_list_edit('<?=$_GET["typechild"]?>',<?=$item['id_list']?>);
    <?php
    if($item['id_cat'] != 0){
    ?>
    load_cat_edit('<?=$_GET["typechild"]?>',<?=$item['id_list']?>, <?=$item['id_cat']?>);
    <?php
    }else{
    ?>
    load_cat('<?=$_GET["typechild"]?>',<?=$item['id_list']?>);

    <?php
    }
    if($item['id_item'] != 0){
    ?>
    load_item_edit('<?=$_GET["typechild"]?>',<?=$item['id_list']?>, <?=$item['id_cat']?>, <?=$item['id_item']?>);
    <?php
    }else if($item['id_cat'] != 0){
    ?>
    load_item('<?=$_GET["typechild"]?>',<?=$item['id_cat']?>);



    <?php
    }
    if($item['id_sub'] != 0){
    ?>
    load_sub_edit('<?=$_GET["typechild"]?>',<?=$item['id_list']?>, <?=$item['id_cat']?>, <?=$item['id_item']?>, <?=$item['id_sub']?>);
    <?php
    }else if($item['id_item'] != 0){
    ?>
    load_sub('<?=$_GET["typechild"]?>',<?=$item['id_item']?>);


    <?php
    }
    }else{
    ?>
    load_list('<?=$_GET["typechild"]?>');
    <?php
    }
    ?>

</script>
<div class="wrapper">
    <div class="control_frm">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li>
                    <a href="index.php?com=product&act=man&typechild=<?= @$_GET['typechild'] ?>"><span>Quản Lý Hoá Đơn</span></a>
                </li>
                <li class="current"><a href="#" onclick="return false;">Thêm</a></li>
            </ul>
            <div class="clear"></div>
        </div>


    </div><!--end control_frm-->


    <form name="supplier" id="validate" class="form"
          action="index.php?com=product&act=save&typechild=<?= @$_GET['typechild'] ?>&id_list=<?= $_GET['id_list'] ?>&curPage=<?= @$_REQUEST['curPage'] ?>"
          method="post" enctype="multipart/form-data">
        <div class="widget">
            <div class="title"><img src="./images/icons/dark/list.png" alt="" class="titleIcon"/>
                <h6>Nhập dữ liệu</h6>
            </div>


            <div class="clear"></div>

            <input type="hidden" id="idUser" value="<?= $_SESSION['login_admin']['id'] ?>">
            <div class="formRow">
                <label>Người Nhập: </label>
                <div class="formRight">
                    <input type="text" id="username" name="username"
                           value="<?= $_SESSION['login_admin']['username'] ?>"
                           title="" class="tipS" readonly style="width:300px;"/>


                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow">
                <label>Ngày Nhập: </label>
                <div class="formRight">
                    <div class="input-group date">
                        <input type="text" id="datepicker" style="width:300px;" required>
                    </div>
                </div>
                <div class="clear"></div>

            </div>
            <div class="formRow">
                <label>Ghi Chú: </label>
                <div class="formRight">
                    <textarea cols="3" id="note" name="note"></textarea>
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
                <p>Thêm sản phẩm nhập:</p>

                <div class="center_fixex">
                    <div class="formRow check_menu_adv">
                        <label>Danh mục cấp 1</label>
                        <div class="formRight">
                            <div class="selector">
                                <select id="id_list" name="id_list" class="get_thuoctinh" class="main_font"
                                        onchange="load_cat('<?= $_GET["typechild"] ?>',this.value)">
                                    <option value="0">Chọn danh mục cấp 1</option>
                                </select>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="formRow check_menu_adv">
                        <label>Danh mục cấp 2</label>
                        <div class="formRight">
                            <div class="selector">
                                <select id="id_cat" name="id_cat" class="main_font"
                                        onchange="load_item('<?= $_GET["typechild"] ?>',this.value)">
                                    <option value="0">Chọn danh mục cấp 2</option>
                                </select>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="formRow check_menu_adv">
                        <label>Danh mục cấp 3</label>
                        <div class="formRight">
                            <div class="selector ">
                                <select id="id_item" name="id_item" class="main_font"
                                        onchange="load_product(this.value,3)">
                                    <option value="0">Chọn danh mục cấp 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="formRow check_menu_adv">
                        <label>Danh sách sản phẩm</label>
                        <div class="formRight">
                            <div class="selector ">
                                <select id="litsProduct" name="id_item" class="main_font">
                                    <option value="0">Chọn sản phẩm</option>
                                </select>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <strong>Giá sản phẩm</strong>
                        <input id="price" type="number" style="width:200px;">
                        <strong>Số lượng nhập</strong>
                        <input id="number" type="number" style="width:200px;">
                        <button class="btn" type="button" id="addItem">Thêm</button>
                    </div>
                    <div class="clear"></div>


                </div><!--end center_fixex-->
            </div>
            <div class="formRow">
                <table id="listProductTable" class="table table-bordered">
                    <tr>
                        <th>ID sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>số lượng</th>
                        <th>Tổng giá</th>
                        <th>Thao tác</th>
                    </tr>
                </table>
                <strong>Tổng Đơn Hàng: <span id="allPrice">0 VND</span></strong>
            </div>
            <div class="formRow">
                <div class="formRight">
                    <input type="hidden" name="id" id="id" value="<?= @$item['id'] ?>"/>
                    <input type="hidden" name="referer_link" id="id"
                           value="index.php?com=product&act=man&typechild=<?= $_GET['typechild'] ?>&curPage=<?= $_REQUEST['curPage'] ?>"/>

                    <input type="button" id="saveBill" value="Hoàn tất" class="blueB"/>
                    <input type="button" value="Thoát"
                           onclick="javascript:window.location='index.php?com=store&act=list"
                           class="blueB"/>

                </div>
                <div class="clear"></div>
            </div>


        </div>

    </form>


</div><!--end wrapper-->


<script type="text/javascript">


    function updateStthinh(table, id) {
        var num = jQuery('#stt_trich' + id).val();

        $('#loader' + id).css('display', 'block');
        jQuery.ajax({
            type: 'POST',
            url: baseurl + 'ajax/stt_hap.php?act=update',
            data: {'table': table, 'id': id, 'num': num},
            success: function (data) {
                $('#loader' + id).css('display', 'none');
                jQuery('#stt_trich' + id).val(num);
            }
        });
    }
    $(document).ready(function () {

        <?php if(count($list_hasp) >= 13){?>

        $("div.pagination_hasp").quickPagination({pageSize: "13"});

        <?php }?>

        $(".change_stt").click(function (event) {
            var r = confirm("Bạn có thực sự muốn xóa hình ảnh này ?");
            if (r == true) {
                var id = $(this).attr("rel");
                $('#loader' + id).css('display', 'block');
                jQuery.ajax({
                    type: 'POST',
                    url: baseurl + 'ajax/stt_hap.php?act=delete',
                    data: {'table': 'hasp', 'id': id},
                    success: function (data) {
                        $('#loader' + id).css('display', 'none');
                        jQuery('.trich' + id).remove();
                    }
                });
            } else {
                return false;
            }

        });
    });


</script>

<script type="text/javascript">
    $(document).ready(function () {
        var allPrice = 0;

        $('#addItem').on('click', function () {
            var idProduct = $('#litsProduct').find(":selected").val();
            var nameProduct = $('#litsProduct').find(":selected").text();
            $('#litsProduct').find(":selected").remove();
            var price = $('#price').val();
            var number = $('#number').val();
            $('#price').val('');
            $('#number').val('');
            nameProduct.toString();
            var sumPrice = price * number;
            allPrice += sumPrice;
            if (idProduct == 0 || nameProduct == "" || price == "" || number == "" || sumPrice == "") {
                alert('vui lòng nhập thông tin sản phẩm');
            } else {
                var element = '<tr class="itemProduct" data-id=' + idProduct + ' data-name="' + nameProduct + '" data-price=' + price + ' data-number=' + number + '> ' +
                    '<td>' + idProduct + '</td> ' +
                    '<td>' + nameProduct + '</td> ' +
                    '<td>' + price + 'vnd</td> ' +
                    '<td>' + number + '</td> ' +
                    '<td>' + sumPrice + 'vnd</td> ' +
                    '<td><button class="btn" onclick="$(this).parent().parent().remove()" type="button"><i class="fa fa-remove"></i></button></td>' +
                    '</tr>';
                $('#listProductTable').append(element);
            }
            $('#allPrice').html(allPrice + 'VND');
        });

        //save bill
        $('#saveBill').on('click', function () {
            var userid = $('#idUser').val();
            var note = $('#note').val();
            var date_order = $('#datepicker').datepicker({dateFormat: 'y-m-d h:i:s'}).val();
            date_order = (moment(date_order).format('YYYY-MM-DD HH:mm:ss'));
            var listProduct = $('table .itemProduct');
            if (listProduct.length == 0 || userid == "" || note == "" || date_order == "") {
                alert("vui lòng nhập đầy đủ thông tin hoá đơn");
                return false;
            }
            var listItems = Array();
            listProduct.each(function () {
                var itemObject = {
                    idProduct: $(this).data('id'),
                    nameProduct: $(this).data('name'),
                    price: $(this).data('price'),
                    number: $(this).data('number')
                };
                listItems.push(itemObject);
            });
            data_insert = {
                note: note,
                id_admin: userid,
                date_order: date_order,
                price: allPrice,
                dataInsert: listItems
            };
            save_bill(data_insert, 'insert');
        });

        $("#datepicker").datepicker();

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
