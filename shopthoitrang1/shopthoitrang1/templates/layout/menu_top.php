<?php


$d->reset();
$sql = "select ten_$lang as ten,tenkhongdau_$lang as tenkhongdau,id from #_product_list where hienthi=1 and com='product'  order by stt asc";
$d->query($sql);
$list_product = $d->result_array();


?>


<div id="menu_top">
    <div class="menu_top_main">
        <ul style="margin-left:310px">
            <li class="cap1"><a
                    href="index.html" <?php if (($_GET["com"] == "") || ($_GET["com"] == "index")) { ?> class="active" <?php } ?>
                    title="<?= _trangchu ?>"><?= _trangchu ?></a></li>
            <li class="cap1"><a
			
			 
			
                    href="index.php?com=san-pham-sale">Khuyến Mại <i class="cmsg">HOT</i></a></li>
            <li class="cap1"><a
                    href="gioi-thieu.html" <?php if (($_GET["com"] == "gioi-thieu")) { ?> class="active" <?php } ?>
                    title="<?= _gioithieu ?>"><?= _gioithieu ?></a></li>
            <li class="cap1"><a
                    href="dich-vu.html" <?php if (($_GET["com"] == "dich-vu")) { ?> class="active" <?php } ?>
                    title="<?= _dichvu ?>"><?= _dichvu ?> </a></li>
            <li class="cap1"><a
                    href="lien-he.html" <?php if (($_GET["com"] == "lien-he")) { ?> class="active" <?php } ?>
                    title="<?= _lienhe ?>"><?= _lienhe ?> </a></li>
            <div class="clear"></div>
        </ul>
        <div class="clear"></div>
    </div><!--end menu_top_main-->

</div><!--end menu_top-->


    
 

