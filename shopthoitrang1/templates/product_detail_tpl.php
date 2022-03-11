<!-- CSS Vs JS MagicZoom -->
<link href="js/magiczoomplus/magiczoomplus.css" rel="stylesheet" type="text/css" media="screen"/>
<script src="js/magiczoomplus/magiczoomplus.js" type="text/javascript"></script>

<!-- Insert to your webpage before the </head> -->
<script src="js/magiczoomplus/thumb-carousel/amazingcarousel.js"></script>
<link rel="stylesheet" type="text/css" href="js/magiczoomplus/thumb-carousel/initcarousel-1.css">
<script src="js/magiczoomplus/thumb-carousel/initcarousel-1.js"></script>
<!-- End of head section HTML codes -->

<!-- Style CSS MagicZoom Plus And Carousel -->
<link href="js/magiczoomplus/magiczoomplus-style.css" rel="stylesheet" type="text/css" media="screen"/>
<style type="text/css">
    .amazingcarousel-1 {
        width: 100% !important;
    }

    #amazingcarousel-container-1 .amazingcarousel-list-container {
        width: 100% !important;
    }

    #amazingcarousel-container-1 .amazingcarousel-list-wrapper {
        width: 100% !important;
    }
</style>


<?php

$d->reset();
$sql = "select * from #_product_list where hienthi=1 and id=" . $row_detail['id_list'];
$d->query($sql);
$dm1 = $d->fetch_array();

$d->reset();
$sql = "select * from #_product_cat where hienthi=1 and id=" . $row_detail['id_cat'];
$d->query($sql);
$dm2 = $d->fetch_array();

$d->reset();
$sql = "select * from #_product_item where hienthi=1 and id=" . $row_detail['id_item'];
$d->query($sql);
$dm3 = $d->fetch_array();

?>


<div id="main_content_web">


    <div id="main_dm_product">


        <ul class="breadcrumb">

            <li><a href="" class="transitionAll"><?= _trangchu ?></a></li>
            <?php if ($dm1 != "") { ?>
                <li><a href="<?= $dm1["tenkhongdau_$lang"] ?>/" class="transitionAll"><?= $dm1["ten_$lang"] ?></a></li>
            <?php } ?>


            <?php if ($dm2 != "") { ?>
                <li><a href="<?= $dm1["tenkhongdau_$lang"] ?>/<?= $dm2["tenkhongdau_$lang"] ?>/"
                       class="transitionAll"><?= $dm2["ten_$lang"] ?></a></li>
            <?php } ?>

            <?php if ($dm3 != "") { ?>
                <li>
                    <a href="<?= $dm1["tenkhongdau_$lang"] ?>/<?= $dm2["tenkhongdau_$lang"] ?>/<?= $dm3["tenkhongdau_$lang"] ?>/"
                       class="transitionAll"><?= $dm3["ten_$lang"] ?></a></li>
            <?php } ?>


            <li><a href="<?= $com ?>/<?= $row_detail["tenkhongdau_$lang"] ?>-<?= $row_detail["id"] ?>.html"
                   class="transitionAll"><?= $row_detail["ten_$lang"] ?></a></li>


        </ul><!--end breadcrumb-->

        <div class="clear"></div>


        <div class="block_content_detail">

            <div class="show-pro-info">


                <div class="left_sp">

                    <div class="gallery-pro">


                        <div class="gallery-pro-detail">

                            <?php if (($row_detail['photo'] != "")) { ?>
                                <a id="Zoom-1" class="MagicZoom" href="<?= _upload_product_l . $row_detail['photo'] ?>">
                                    <img src="<?= _upload_product_l . $row_detail['photo'] ?>" alt="pro-pic-detail">
                                </a>
                            <?php } ?>

                            <!-- Nhiều hình ảnh -->
                            <div class="selectors">
                                <div id="amazingcarousel-container-1">
                                    <div id="amazingcarousel-1"
                                         style="display:none;position:relative;width:100%;margin:0px auto 0px;">
                                        <div class="amazingcarousel-list-container">
                                            <ul class="amazingcarousel-list">

                                                <?php if (($row_detail['photo'] != "")) { ?>

                                                    <li class="amazingcarousel-item">
                                                        <div class="amazingcarousel-item-container">
                                                            <div class="amazingcarousel-image">
                                                                <a data-zoom-id="Zoom-1"
                                                                   href="<?= _upload_product_l . $row_detail['photo'] ?>">
                                                                    <img
                                                                        src="<?= _upload_product_l . $row_detail['photo'] ?>"
                                                                        alt="pro-pic-detail">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>

                                                <?php } ?>

                                                <?php if (!empty($album_hinh)) {
                                                    foreach ($album_hinh as $hinh) {
                                                        ?>

                                                        <li class="amazingcarousel-item">
                                                            <div class="amazingcarousel-item-container">
                                                                <div class="amazingcarousel-image">
                                                                    <a data-zoom-id="Zoom-1"
                                                                       href="<?= _upload_product_l . $hinh['photo'] ?>">
                                                                        <img
                                                                            src="<?= _upload_product_l . $hinh['photo'] ?>"
                                                                            alt="pro-pic-detail">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </li>

                                                    <?php }
                                                } ?>

                                            </ul>
                                            <div class="amazingcarousel-prev"></div>
                                            <div class="amazingcarousel-next"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div><!--end gallery-pro-->


                    <div class="clear"></div>

                </div> <!--LEFT_SP-->


                <div class="right-pro-info">


                    <div class="product-description">


                        <div class="info-pro-detail">
                            <div class="name"><h1><?= $row_detail["ten_$lang"] ?></h1>  <br><?= _mahang ?>
                                : <?= $row_detail['masp'] ?></div>


                            <div class="row-attr">
                                <div class="title-attr"><?= _luotxem ?>:</div>

                                <div class="cont-attr price-buy">
                                    <p><?= $row_detail['luotxem'] ?></p>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="row-attr">
                                <div class="title-attr"><?= _giaban ?>:</div>
                                <div class="cont-attr price-buy" data-price="<?= $row_detail['gia'] ?>">
                                    <p>
                                        <?php
                                        if (!empty($row_detail['gia'])) {
                                            if($row_detail['giamgia']) {
                                                echo '<span class="detail-product-price">'.num_format($row_detail['gia'], $lang) . ' VNĐ </span> ';
                                            }else{
                                                echo '<span class="">'.num_format($row_detail['gia'], $lang) . ' Vnđ </span> ';
                                            }
                                        }else {
                                            echo _lienhe;
                                        }
                                        ?>
                                        <?php
                                        if (($row_detail['giamgia'])) {
                                            echo ' '.num_format(($row_detail["gia"] * (100 - $row_detail['giamgia']) / 100), $lang) . ' Vnđ (Giảm '. $row_detail['giamgia'].'%)';
                                        }
                                        ?>
                                    </p>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <input id="txt_price" type="hidden" name="price_product" value="<?= ($row_detail["gia"] * (100 - $row_detail['giamgia']) / 100) ?>">


                            <div class="row-attr">
                                <div class="des-pro">
                                    <?= $row_detail['mota_' . $lang] ?>
                                </div>
                            </div>

                            <div class="clear"></div>


                            <?php if ($row_detail['gia'] > 0 && $row_detail['soluong'] > 0) { ?>
                                <div class="wrap-buy">
                                    <button style="" class="sub-buy" onclick="return addtocart(<?= $row_detail["id"] ?>)"><?= _muangay ?></button>
                                </div>
                            <?php } else { ?>
                                <div class="wrap-buy">
                                    <button style="background-color:grey;text-decoration: line-through" disabled class="sub-buy" >Hết Hàng</button>
                                </div>
                            <?php }  ?>
                            <div class="clear"></div>
                            <div class="attr-content" style="margin-top: 20px;">
                                <?php $url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>

                                <p class="attr-right">
                                    <a class="tooltip_a share-icon share-facebook" target="_blank"
                                       href="http://www.facebook.com/sharer.php?u=<?= $url ?>" title="Facebook"></a>
                                    <a class="tooltip_a share-icon share-zing" target="_blank"
                                       href="http://link.apps.zing.vn/share?u=<?= $url ?>" title="Zing me"></a>
                                    <a class="tooltip_a share-icon share-twitter" target="_blank"
                                       href="http://twitter.com/share?url=<?= $url ?>&amp;text=<?= $row_detail["ten"] ?>"
                                       title="Twitter"></a>
                                    <a class="tooltip_a share-icon share-googleplus" target="_blank"
                                       href="https://plus.google.com/share?url=<?= $url ?>" title="Google Plus"></a>
                                    <a class="tooltip_a share-icon share-linkedin" target="_blank"
                                       href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?= $url ?>"
                                       title="LinkedIn"></a>
                                    <a class="tooltip_a share-icon share-email" target="_blank"
                                       href="mailto:?Subject=<?= _share ?><?= $row_detail["ten_$lang"] ?>&amp;Body=<?= $row_detail["ten_$lang"] ?><?= $url ?>"
                                       title="Email"></a>
                                </p>
                            </div>

                        </div>


                    </div><!--end product-description-->


                </div><!--end right-pro-info-->


                <div class="clear"></div>


                <div style="margin:10px 0">
                    <!-- AddThis Button BEGIN -->
                    <div class="addthis_toolbox addthis_default_style">
                        <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                        <a class="addthis_button_tweet"></a>
                        <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
                        <a class="addthis_counter addthis_pill_style"></a>
                    </div>
                    <script type="text/javascript">var addthis_config = {"data_track_addressbar": false};</script>
                    <script type="text/javascript"
                            src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-52843d4e1ff0313a"></script>
                    <!-- AddThis Button END -->
                </div>


                <div class="clear"></div>


                <div id="container-tab">
                    <!--tag-->
                    <script type="text/javascript">

                        $(document).ready(function () {
                            $('#tabs div#tab-1').show();
                            $('#tabs div#tab-2').hide();
                            $('#tabs div#tab-3').hide();
                            $('#tabs div#tab-4').hide();
                            $('#tabs div#tab-5').hide();
                            $('#tabs div:first').show();
                            $('#tabs ul li:first').addClass('active');
                            $('#tabs ul li a').click(function () {
                                $('#tabs ul li').removeClass('active');
                                $(this).parent().addClass('active');
                                var currentTab = $(this).attr('href');
                                $('#tabs div#tab-1').hide();
                                $('#tabs div#tab-2').hide();
                                $('#tabs div#tab-3').hide();
                                $('#tabs div#tab-4').hide();
                                $('#tabs div#tab-5').hide();
                                $(currentTab).show();
                                return false;
                            });
                        });
                    </script>


                    <!--tag-->


                    <div id="tab_detail">


                        <div id="tabs">
                            <ul>

                                <li id="tab_spformat"><a href="#tab-1"><?= _thongtinchitiet ?></a></li>


                                <?php /*?><li id="tab_spformat"><a href="#tab-2">Thông tin chi tiết</a></li><?php */ ?>


                            </ul>
                            <div class="clear"></div>


                            <div id="tab-1">

                                <div class="info-content">

                                    <?= $row_detail["noidung_$lang"] ?>

                                </div><!--end content-effect-->

                            </div><!--end tab-1-->


                            <div id="tab-2">

                                <div class="info-content">

                                    <?= $row_detail["noidung_$lang"] ?>

                                </div><!--end content-effect-->

                            </div><!--end tab-2-->

                        </div><!--end tabs-->


                    </div><!--end tab_detail-->


                </div><!--end container-->


            </div>
        </div>


    </div><!--end main_dm_product-->


    <div class="clear"></div>

    <div class="other-pro">

        <div class="title-info">
            <h3 class="title-info-bg"><?= $title_other ?></h3>
        </div><!--END title_info-->


        <div class="clear"></div>

        <div class="product-group">


            <?php
            if (count($sanpham_khac) > 0) {
                $com_href = "san-pham";

                foreach ($sanpham_khac as $i => $v_sp) { ?>

                    <div class="product-item" <?php if (($i + 1) % 3 == 0) { ?> style="margin-right:0;" <?php } ?>>


                        <div class="product-image">

                            <a href="<?= $com_href ?>/<?= $v_sp["tenkhongdau_$lang"] ?>-<?= $v_sp["id"] ?>.html"
                               title="<?= $v_sp["ten_$lang"] ?>">
                                <img effect="mono" inverse="true" class="img-responsive has-tt colorup colorUpped"
                                     src="<?php if ($v_sp['photo'] != null) echo _upload_product_l . $v_sp['photo']; else echo 'images/no-image-available.png'; ?>"
                                     alt="<?= $v_sp["alt"] ?>"/>
                            </a>

                        </div><!--end product-image-->


                        <div class="product-info">

                            <div class="product-name">

                                <h3><a href="<?= $com_href ?>/<?= $v_sp["tenkhongdau_$lang"] ?>-<?= $v_sp["id"] ?>.html"
                                       title="<?= $v_sp["ten_$lang"] ?>"><?= catchuoi($v_sp["ten_$lang"], 70) ?></a>
                                </h3>
                                <p class="product-price">
                                    <span><?php if ($v_sp["gia"] == 0) echo _lienhe; else echo number_format($v_sp["gia"], 0, ",", ".") . " VNĐ"; ?></span>
                                </p>


                            </div><!--end product-name-->


                            <div class="cart-buy"><a class="add-to-cart-btn" data-id="<?= $v_sp["id"] ?>"
                                                     onclick="return addtocart(<?= $v_sp["id"] ?>)"></a></div>

                            <div class="clear"></div>

                        </div><!--end product-info-->


                        <div class="clear"></div>
                    </div> <!-- product-item -->


                    <?php if (($i + 1) % 3 == 0) { ?>
                        <div class="clear"></div><?php } ?>

                <?php }
            } else echo '<p class="notice">' . _noidungdangcapnhat . '</p>'; ?>
            <div class="clear"></div>

            <div class="phantrang"><?= $paging['paging'] ?></div>

        </div><!--end items_frame-->

    </div><!--end other-pro-->


</div>


