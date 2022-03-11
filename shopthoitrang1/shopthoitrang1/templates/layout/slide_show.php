<?php
	
	$d->reset();
	$sql = "select photo,link, ten_$lang, mota_$lang from #_image_url where hienthi=1 and com='slider' order by stt,id desc";
	$d->query($sql);
	$slider=$d->result_array();
	
		$d->reset();
	$sql_news = "select ten_$lang,id,tenkhongdau_$lang,photo from #_product_list where hienthi=1 and com='product'   order by stt asc";
	$d->query($sql_news);
	$sp_list = $d->result_array();

	

	
?>

<link href="camera/css/camera.css" type="text/css" rel="stylesheet" />
<link href="camera/css/slider.css" type="text/css" rel="stylesheet" />
<script src="camera/scripts/jquery.mobile.customized.min.js"></script>
<script src="camera/scripts/camera.min.js"></script>
<script src="camera/scripts/jquery.easing.1.3.js"></script>


 <script type="text/javascript">
            jQuery(document).ready(function($) {
                jQuery('#camera_wrap_1').camera({
				
				width: '1366px',
				height:'365px',
				pagination: false,
				thumbnails: false
                });
            });
 </script>               
        
  

<div id="slider-camera-wrapper">

<div class="camera_wrap camera_magenta_skin" id="camera_wrap_1">

	<?php for ($i=0;$i<count($slider);$i++) {?>	 		
		<div  data-src="<?=_upload_hinhanh_l.$slider[$i]["photo"]?>" data-link="<?=$slider[$i]["link"]?>" data-title="<?=$slider[$i]["ten_$lang"]?>" data-target="_blank">
		</div>
     <?php }?>   
				
	</div>#camera_wrap_1
	

</div> <!--end slider-camera-wrapper-->


<div class="clear"></div>
