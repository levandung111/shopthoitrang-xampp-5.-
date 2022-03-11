<?php
  $d->reset();
  $sql_lienket = "select ten_$lang,yahoo,skype,dienthoai,email from #_support_online where hienthi=1 and com='support_online' order by id desc ";
  $d->query($sql_lienket);
  $support_online = $d->result_array();



      $d->reset();
    $sql="select ten_$lang, tenkhongdau_$lang, id,photo,gia from #_product where hienthi=1 and com='product' and spnoibat>0 order by stt,id desc";
    $d->query($sql);
    $sp_noibat=$d->result_array();

	$d->reset();
	$sql="select ten_$lang, tenkhongdau_$lang, id from #_product_list where hienthi=1 and com='product' order by stt,id desc";
	$d->query($sql);
	$tin_cap1=$d->result_array();
	
	
	
	      $d->reset();
    $sql="select ten_$lang as ten, tenkhongdau_$lang as tenkhongdau, id,photo from #_news where hienthi=1 and com='news' and tinnoibat>0 order by stt,id desc";
    $d->query($sql);
    $tintuc_left=$d->result_array();
?>	

<div class="cate-pro">
	 <h4 class="title-catalog"><?=_danhmucsanpham?></h4>
   
    <ul class="cateUl accordion accordion-2" id="sidenav">

  
           <?php for ($i=0;$i<count($tin_cap1);$i++) {?>     

	<li <?php if ( $i==0) {?> style="border-top:none;" <?php }?> class="level1 <?php if($tin_cap1[$i]["tenkhongdau_$lang"]==$id_listhome) {?> selected <?php } else if($tin_cap1[$i]['id']==$id_listhome) {?> selected <?php }?> ">   
       <a href="<?=$tin_cap1[$i]["tenkhongdau_$lang"]?>/" title="<?=$tin_cap1[$i]["ten_$lang"]?>" class="<?php if($tin_cap1[$i]["tenkhongdau_$lang"]==$id_listhome) {?> active_pro <?php } else if($tin_cap1[$i]['id']==$id_listhome) {?> active_pro <?php }?>"><?=$tin_cap1[$i]["ten_$lang"]?></a>
	
      <?php

	$d->reset();
	  $sql="select ten_$lang, tenkhongdau_$lang, id from #_product_cat where hienthi=1 and id_list=".$tin_cap1[$i]["id"]." and com='product' order by stt,id desc";
	  $d->query($sql);
	  $tin_cap2=$d->result_array();

		?>

       <ul <?php if($tin_cap1[$i]["tenkhongdau_$lang"]==$id_listhome) {?> class="block_ul" <?php }?> >

         <?php for ($j=0;$j<count($tin_cap2);$j++) {?>     

        <li class="level1 <?php if($tin_cap1[$i]["tenkhongdau_$lang"]==$id_listhome) {?> selected <?php } else if($tin_cap1[$i]['id']==$id_listhome) {?> selected <?php }?> ">   
       <a href="<?=$tin_cap1[$i]["tenkhongdau_$lang"]?>/<?=$tin_cap2[$j]["tenkhongdau_$lang"]?>/" title="<?=$tin_cap2[$j]["ten_$lang"]?>" class=" <?php if($tin_cap2[$j]['id']==$id) echo 'active_pro'?>"><?=$tin_cap2[$j]["ten_$lang"]?></a>
		
			<ul <?php if($tin_cap1[$i]["tenkhongdau_$lang"]==$id_listhome) {?> class="block_ul" <?php }?>>
			
			  <?php

	$d->reset();
	  $sql="select ten_$lang, tenkhongdau_$lang, id from #_product_item where hienthi=1 and id_list=".$tin_cap1[$i]["id"]." and id_cat=".$tin_cap2[$j]["id"]." and com='product' order by stt,id desc";
	  $d->query($sql);
	  $tin_cap3=$d->result_array();

		?>
		
		<?php for ($z=0;$z<count($tin_cap3);$z++) {?>     

        <li class="level1 <?php if($tin_cap1[$i]["tenkhongdau_$lang"]==$id_listhome) {?> selected <?php } else if($tin_cap1[$i]['id']==$id_listhome) {?> selected <?php }?> ">   
       <a href="<?=$tin_cap1[$i]["tenkhongdau_$lang"]?>/<?=$tin_cap2[$j]["tenkhongdau_$lang"]?>/<?=$tin_cap3[$z]["tenkhongdau_$lang"]?>/" title="<?=$tin_cap3[$z]["ten_$lang"]?>" class=" <?php if($tin_cap3[$z]['id']==$id) echo 'active_pro'?>"><?=$tin_cap3[$z]["ten_$lang"]?></a>
		</li>
		
		<?php }?>
			
			
			</ul>
	   
	   
      </li>

      <?php }?>

       </ul>

  </li>
      
       <?php }?> 
        
    </ul><!--ul.cateUl-->
</div><!--cate-pro-->


<div class="cate-pro">


   <h4 class="title-catalog"><?=_hotrotructuyen?></h4>



  <div class="sub_con_other">

  <p> Nhóm12 Lớp B3D4 thực hiện
  <br> 1. Nguyễn Thị Trình
  <br> 2. Nguyễn Văn Trung
  <br> 3. Phan Thanh Hào
  <br> Trường ĐH Kỹ thuật - Hậu cần CAND
  <br> Liên hệ theo SĐT: 0986312374
  <br> Email: b3d4t36@gmail.com
  </p>
		<?php foreach ($support_online as $i => $v) {?>
		
		<div class="item-support">
		
			<h5><a><?=$v["ten_$lang"]?></a></h5>
			
			<div class="hotline-support">
			
				<p>Hotline:<b><?=$v["dienthoai"]?></b></p>
			
			</div>
			
			<div class="email-support">
			
				<p>Email:<b><?=$v["email"]?></b></p>
			
			</div>
		
		</div><!--end item-support-->
		
		<?php }?>
     
  
  </div><!--end sub_con_other-->

</div><!--end cate-pro-->

<div class="clear"></div>


  <script type="text/javascript" src="js/jquery.simplyscroll.js"></script>
<link rel="stylesheet" href="css/jquery.simplyscroll.css" media="all" 
type="text/css">

<script type="text/javascript">
(function($) {
  $(function() { //on DOM ready
    $("#scroller_quangcao").simplyScroll({
      customClass: 'vert',
      orientation: 'vertical',
            auto: true,
            manualMode: 'loop',
      frameRate: 20,
      speed: 2
    });
  });
})(jQuery);
</script>

<div class="cate-pro">

   <h4 class="title-catalog"><?=_sanphamnoibat?></h4>


  <div class="sub_con_other">

	 <ul id="scroller_quangcao">

       <?php for ($i=0;$i<count($sp_noibat);$i++) {?> 
        <li class="sp_noibat">

          <a href="san-pham/<?=$sp_noibat[$i]["tenkhongdau_$lang"]?>-<?=$sp_noibat[$i]["id"]?>.html">

            <img src="thumb/220x280/2/<?=_upload_product_l.$sp_noibat[$i]["photo"]?>"></a>
			
			
			
			<a class="name-product-nb" href="san-pham/<?=$sp_noibat[$i]["tenkhongdau_$lang"]?>-<?=$sp_noibat[$i]["id"]?>.html">
			
			<?=$sp_noibat[$i]["ten_$lang"]?>

           </a>

        </li>

       <?php }?> 

        <div class="clear"></div>


      </ul>

  
  </div><!--end sub_con_other-->

</div><!--end cate-pro-->

<div class="clear"></div>



<div class="cate-pro">

   <!--h4 class="title-catalog"><?=_tintucsukien?></h4-->


  <!--div class="sub_con_other">
  
	<?php foreach ($tintuc_left as $i=> $v_tintuc) {?>
	
		<div class="item-news-box">
		
			<div class="left-images-news">
			
				<a href="tin-tuc/<?=$v_tintuc["tenkhongdau"]?>-<?=$v_tintuc["id"]?>.html"><img src="thumb/65x55/1/<?=_upload_news_l.$v_tintuc["photo"]?>"></a>
			
			</div>
			
			<div class="right-news-info">
				
				<h4><a href="tin-tuc/<?=$v_tintuc["tenkhongdau"]?>-<?=$v_tintuc["id"]?>.html"><?=$v_tintuc["ten"]?></a></h4>
				
				<div class="des-news">
				<?=strip_tags(catchuoi($v_tintuc["mota"],200))?>
				</div-->
			
			</div>
			
			<div class="clear"></div>
			
		
		</div><!--end item-news-box-->
	
	
	<?php }?>

	
  </div><!--end sub_con_other-->

</div><!--end cate-pro-->

<div class="clear"></div>


