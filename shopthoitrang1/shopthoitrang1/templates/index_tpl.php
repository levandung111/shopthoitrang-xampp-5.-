<div class="wap_item">
    <div class="container-web">
        <div class="box-product-index">
            <div class="col_left">
                <?php include _template . "layout/left.php"; ?>
            </div><!--col_left-->
            <div class="product-group" style="float: right">
                <div class="title-index">
                    <h3 class="title-index-name"><a href=""><?= _sanphammoi ?></a></h3>
                    <div class="clear"></div>
                </div><!--END title_index-->
                <?php
                if (count($spmoi_index) > 0) {
                    $com_href = "san-pham";
                    foreach ($spmoi_index as $k => $v_sp) { ?>
                        <div class="product-item" <?php if (($k + 1) % 3 == 0) { ?> style="margin-right:0;" <?php } ?>>
                            <?php if ($v_sp["giamgia"]) { ?>
                                <div class="product-sales">
								 <p class="product-sales-title">Giảm</p>
                                    <span class="product-sales-percent"><?= $v_sp["giamgia"] ?>%</span>
                                   
                                </div>
                            <?php } ?>
                            <div class="product-image">
                                <a href="<?= $com_href ?>/<?= $v_sp["tenkhongdau"] ?>-<?= $v_sp["id"] ?>.html"
                                   title="<?= $v_sp["ten"] ?>">
                                    <img effect="mono" inverse="true" class="img-responsive has-tt colorup colorUpped"
                                         src="<?php if ($v_sp['photo'] != null) echo _upload_product_l . $v_sp['photo']; else echo 'images/no-image-available.png'; ?>"
                                         alt="<?= $v_sp["alt"] ?>"/>
                                </a>
                            </div><!--end product-image-->
                            <div class="product-info">
                                <div class="product-name">
                                    <h3>
                                        <a href="<?= $com_href ?>/<?= $v_sp["tenkhongdau"] ?>-<?= $v_sp["id"] ?>.html"
                                           title="<?= $v_sp["ten"] ?>"><?= catchuoi($v_sp["ten"], 70) ?></a>
                                    </h3>
                                    <p class="product-price">
                                        <span><?php if ($v_sp["gia"] == 0) echo _lienhe; else echo number_format(($v_sp["gia"] * (100 - $v_sp['giamgia']) / 100 - $v_sp["gia"]*0.1), 0, ",", ".") . " VNĐ"; ?></span>
                                    </p>
                                </div><!--end product-name-->
                                <div class="cart-buy">
                                    <a class="add-to-cart-btn" data-id="<?= $v_sp["id"] ?>"
                                       onclick="return addtocart(<?= $v_sp["id"] ?>)"></a>
                                </div>
                                <div class="clear"></div>
                            </div><!--end product-info-->
                            <div class="clear"></div>
                        </div> <!-- product-item -->
                        <?php if (($k + 1) % 3 == 0) { ?>
                            <div class="clear"></div>
                        <?php } ?>
                    <?php }
                } else echo '<p class="notice">' . _noidungdangcapnhat . '</p>'; ?>
                <div class="clear"></div>
                <div class="clear"></div>
            </div><!--end show-pro-->
            <div class="clear"></div>
            <div class="show-pro">
                <?php foreach ($list_spindex as $i => $pro_list) { ?>
                    <div class="product-group">
                        <div class="title-index">
                            <h3 class="title-index-name"><a
                                    href="<?= $pro_list["tenkhongdau"] ?>/"><?= $pro_list["ten"] ?></a></h3>
                            <?php
                            $d->reset();
                            $sql_news = "select ten_$lang as ten,id,tenkhongdau_$lang as tenkhongdau,photo from #_product_cat where hienthi=1 and com='product' and id_list='" . $pro_list["id"] . "'   order by stt asc";
                            $d->query($sql_news);
                            $cat_spindex = $d->result_array();
                            if (count($cat_spindex) > 0) {
                                ?>
                                <ul class="sub_catalog">
                                    <?php foreach ($cat_spindex as $j => $pro_cat) { ?>
                                        <li> <?php if ($j != 0) { ?>/<?php } ?> <a
                                                href="<?= $pro_list["tenkhongdau"] ?>/<?= $pro_cat["tenkhongdau"] ?>/"><?= $pro_cat["ten"] ?></a>
                                        </li>
                                    <?php } ?>
                                </ul><!--end sub_catalog-->
                            <?php } ?>
                            <div class="clear"></div>
                        </div><!--END title_index-->
                        <?php
                        $d->reset();
                        $sql_news = "select ten_$lang as ten,id,tenkhongdau_$lang as tenkhongdau,photo,gia,giamgia,alt_$lang as alt from #_product where hienthi=1 and com='product' and id_list='" . $pro_list["id"] . "' order by id desc limit 6";
                        $d->query($sql_news);
                        $sp_index = $d->result_array();
                        if (count($sp_index) > 0) {
                            $com_href = "san-pham";
                            foreach ($sp_index as $k => $index_sp) {  ?>
                                <div
                                    class="product-item" <?php if (($k + 1) % 4 == 0) { ?> style="margin-right:0;" <?php } ?>>
                                    <?php if ($index_sp["giamgia"]) { ?>
                                        <div class="product-sales">
										 <p class="product-sales-title">Giảm</p>
                                            <span class="product-sales-percent"><?= $index_sp["giamgia"] ?>%</span>
                                           
                                        </div>
                                    <?php } ?>
                                    <div class="product-image">
                                        <a href="<?= $com_href ?>/<?= $index_sp["tenkhongdau"] ?>-<?= $index_sp["id"] ?>.html"
                                           title="<?= $index_sp["ten"] ?>">
                                            <img effect="mono" inverse="true"
                                                 class="img-responsive has-tt colorup colorUpped"
                                                 src="<?php if ($index_sp['photo'] != null) echo _upload_product_l . $index_sp['photo']; else echo 'images/no-image-available.png'; ?>"
                                                 alt="<?= $index_sp["alt"] ?>"/>
                                        </a>
                                    </div><!--end product-image-->
                                    <div class="product-info">
                                        <div class="product-name">
                                            <h3>
                                                <a href="<?= $com_href ?>/<?= $index_sp["tenkhongdau"] ?>-<?= $index_sp["id"] ?>.html"
                                                   title="<?= $index_sp["ten"] ?>"><?= catchuoi($index_sp["ten"], 70) ?></a>
                                            </h3>
                                            <p class="product-price">
                                                <span><?php if ($index_sp["gia"] == 0) echo _lienhe; else echo number_format(($index_sp["gia"] * (100 - $v_sp['giamgia']) / 100 - $v_sp["gia"]*0.1), 0, ",", ".") . " VNĐ"; ?></span>
                                            </p>
                                        </div><!--end product-name-->
                                        <div class="cart-buy"><a class="add-to-cart-btn"
                                                                 data-id="<?= $index_sp["id"] ?>"
                                                                 onclick="return addtocart(<?= $index_sp["id"] ?>)"></a>
                                        </div>
                                        <div class="clear"></div>
                                    </div><!--end product-info-->
                                    <div class="clear"></div>
                                </div> <!-- product-item -->
                                <?php if (($k + 1) % 4 == 0) { ?>
                                    <div class="clear"></div><?php } ?>
                            <?php }
                        } else echo '<p class="notice">' . _noidungdangcapnhat . '</p>'; ?>
                        <div class="clear"></div>
                        <div class="clear"></div>
                    </div><!--end show-pro-->
                <?php } ?>
                <div class="clear"></div>
                <?php
                $d->reset();
                $sql_news = "select ten_$lang as ten,id,tenkhongdau_$lang as tenkhongdau from #_product_list where hienthi=1 and com='product' order by stt asc";
                $d->query($sql_news);
                $list_proindex = $d->result_array();
                foreach ($list_proindex as $i => $v_list) { ?>
                    <?php
                    $d->reset();
                    $sql_news = "select ten_$lang as ten,id,tenkhongdau_$lang as tenkhongdau from #_product_cat where hienthi=1 and com='product' and hienthitc>0 and id_list='" . $v_list["id"] . "' order by stt asc";
                    $d->query($sql_news);
                    $cat_proindex = $d->result_array();
                    foreach ($cat_proindex as $j => $v_cat) { ?>
                        <div class="product-group">
                            <div class="title-index">
                                <h3 class="title-index-name"><a
                                        href="<?= $v_list["tenkhongdau"] ?>/<?= $v_cat["tenkhongdau"] ?>/"><?= $v_cat["ten"] ?></a>
                                </h3>
                                <?php
                                $d->reset();
                                $sql_news = "select ten_$lang as ten,id,tenkhongdau_$lang as tenkhongdau,photo from #_product_item where hienthi=1 and com='product' and id_list='" . $v_list["id"] . "' and id_cat='" . $v_cat["id"] . "'   order by stt asc";
                                $d->query($sql_news);
                                $cap3_spindex = $d->result_array();
                                if (count($cap3_spindex) > 0) {
                                    ?>
                                    <ul class="sub_catalog">
                                        <?php foreach ($cap3_spindex as $z => $v_item) { ?>
                                            <li> <?php if ($z != 0) { ?>/<?php } ?> <a
                                                    href="<?= $v_list["tenkhongdau"] ?>/<?= $v_cat["tenkhongdau"] ?>/<?= $v_item["tenkhongdau"] ?>/"><?= $v_item["ten"] ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul><!--end sub_catalog-->
                                <?php } ?>
                                <div class="clear"></div>
                            </div><!--END title_index-->
                            <?php
                            $d->reset();
                            $sql_news = "select ten_$lang as ten,id,tenkhongdau_$lang as tenkhongdau,photo,gia,giamgia,alt_$lang as alt from #_product where hienthi=1 and com='product' and id_list='" . $v_list["id"] . "' and id_cat='" . $v_cat["id"] . "'   order by id desc";
                            $d->query($sql_news);
                            $sanpham_index = $d->result_array();
                            if (count($sanpham_index) > 0) {
                                $com_href = "san-pham";
                                foreach ($sanpham_index as $k => $v_sp) { ?>
                                    <div
                                        class="product-item" <?php if (($k + 1) % 4 == 0) { ?> style="margin-right:0;" <?php } ?>>
                                        <?php if ($v_sp["giamgia"]) { ?>
                                            <div class="product-sales">
											  <p class="product-sales-title">Giảm</p>
                                                <span class="product-sales-percent"><?= $v_sp["giamgia"] ?>%</span>
                                              
                                            </div>
                                        <?php } ?>
                                        <div class="product-image">
                                            <a href="<?= $com_href ?>/<?= $v_sp["tenkhongdau"] ?>-<?= $v_sp["id"] ?>.html"
                                               title="<?= $v_sp["ten"] ?>">
                                                <img effect="mono" inverse="true"
                                                     class="img-responsive has-tt colorup colorUpped"
                                                     src="<?php if ($v_sp['photo'] != null) echo _upload_product_l . $v_sp['photo']; else echo 'images/no-image-available.png'; ?>"
                                                     alt="<?= $v_sp["alt"] ?>"/>
                                            </a>
                                        </div><!--end product-image-->
                                        <div class="product-info">
                                            <div class="product-name">
                                                <h3>
                                                    <a href="<?= $com_href ?>/<?= $v_sp["tenkhongdau"] ?>-<?= $v_sp["id"] ?>.html"
                                                       title="<?= $v_sp["ten"] ?>"><?= catchuoi($v_sp["ten"], 70) ?></a>
                                                </h3>
                                                <p class="product-price">
                                                    <span><?php if ($v_sp["gia"] == 0) echo _lienhe; else echo number_format(($v_sp["gia"] * (100 - $v_sp['giamgia']) / 100 - $v_sp["gia"]*0.1), 0, ",", ".") . " VNĐ"; ?></span>
                                                </p>
                                            </div><!--end product-name-->
                                            <div class="cart-buy"><a class="add-to-cart-btn"
                                                                     data-id="<?= $v_sp["id"] ?>"
                                                                     onclick="return addtocart(<?= $v_sp["id"] ?>)"></a>
                                            </div>
                                            <div class="clear"></div>
                                        </div><!--end product-info-->
                                        <div class="clear"></div>
                                    </div> <!-- product-item -->
                                    <?php if (($k + 1) % 4 == 0) { ?>
                                        <div class="clear"></div><?php } ?>
                                <?php }
                            } else echo '<p class="notice">' . _noidungdangcapnhat . '</p>'; ?>
                            <div class="clear"></div>
                            <div class="clear"></div>
                        </div><!--end show-pro-->
                    <?php }
                } ?>
                <div class="clear"></div>
            </div><!--end show-pro-->
        </div><!--end box-product-index-->
    </div><!--end container-web-->
</div><!--end wap_item-->


