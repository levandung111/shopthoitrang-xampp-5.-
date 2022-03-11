<?php if (!defined('_source')) die("Error");


$d->reset();
$sql_banner_giua = "select banner_$lang from #_banner where com='logo_top' ";
$d->query($sql_banner_giua);
$row_logo = $d->fetch_array();

$image = "http://" . $config_url . "/" . _upload_hinhanh_l . $row_logo["banner_$lang"] . "";
$url_web = "http://" . $config_url . "";
$title_bar = $row_setting["title_$lang"];
$description_web = strip_tags($row_setting["title_$lang"]);


$d->reset();
$sql_news = "select ten_$lang as ten,id,tenkhongdau_$lang as tenkhongdau,photo from #_product_list where hienthi=1 and com='product' and hienthitc>0   order by stt asc";
$d->query($sql_news);
$list_spindex = $d->result_array();


$d->reset();
$sql_news = "select ten_$lang as ten,id,tenkhongdau_$lang as tenkhongdau,photo,gia,giamgia,alt_$lang as alt from #_product where hienthi=1 and com='product' and spmoi>0   order by stt asc limit 9";
$d->query($sql_news);
$spmoi_index = $d->result_array();


?>