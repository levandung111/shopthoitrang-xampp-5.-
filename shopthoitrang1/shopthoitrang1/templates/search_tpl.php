<div id="main_content_web">


<ul class="breadcrumb">

<li><a href="" class="transitionAll"><?=_trangchu?></a> </li>



<li><a  class="transitionAll"><?=$title_tcat?></a></li>


</ul><!--end breadcrumb-->

<div class="clear"></div>

    
    <div class="clear"></div>

    


  <?php if (!empty($product)) {?> 
		<div class="main_prouduct_dm">
  

    
   <p class="notice" style="text-align:center;"><?=$notice?></p>
	
	

 	'<span class="tukhoa"><?=$tukhoa?></span>' &nbsp;  <b class="chonfont"><?=$com_title?></b>
 
    
	
    <div class="product-group">
        
       
		<?php
		   if(count($product)>0){
			$com_href="san-pham";	 
			
			foreach ($product as $i => $v_sp) {?>
       
        <div class="product-item" <?php if ( ($i+1)%4==0) {?> style="margin-right:0;" <?php }?>>

			<?php if ($v_sp["giamgia"]) { ?>
				<div class="product-sales">
					<span class="product-sales-percent"><?= $v_sp["giamgia"] ?>%</span>
					<p class="product-sales-title">Giảm</p>
				</div>
			<?php } ?>
		 
			<div class="product-image">
								  
			<a href="<?=$com_href?>/<?=$v_sp["tenkhongdau_$lang"]?>-<?=$v_sp["id"]?>.html" title="<?=$v_sp["ten_$lang"]?>">
			<img  effect="mono" inverse="true" class="img-responsive has-tt colorup colorUpped" src="<?php if($v_sp['photo']!=NULL) echo _upload_product_l.$v_sp['photo']; else echo 'images/no-image-available.png';?>" alt="<?=$v_sp["alt"]?>" />
			</a>

			</div><!--end product-image-->
			
			
			 <div class="product-info">
			
				 <div class="product-name">

					<h3> <a href="<?=$com_href?>/<?=$v_sp["tenkhongdau_$lang"]?>-<?=$v_sp["id"]?>.html" title="<?=$v_sp["ten_$lang"]?>"><?=catchuoi($v_sp["ten_$lang"],70)?></a></h3>
					<p class="product-price">
					<span ><?php  if($v_sp["gia"]==0) echo _lienhe; else echo number_format (($v_sp["gia"] * (100 - $v_sp['giamgia']) / 100),0,",",".")." VNĐ";?></span>
					</p>
				
					
				</div><!--end product-name-->  
				
				
				<div class="cart-buy"><a class="add-to-cart-btn" data-id="<?=$v_sp["id"]?>" onclick="return addtocart(<?=$v_sp["id"]?>)"></a></div>

				<div class="clear"></div>	

			</div><!--end product-info-->	
							   




		<div class="clear"></div>
		</div> <!-- product-item -->
	
       
       <?php if(($i+1)%4==0){?> <div class="clear" ></div><?php }?>		
        
        <?php } }else echo '<p class="notice">'._noidungdangcapnhat.'</p>';  ?>    
        <div class="clear"></div>                                 
          <div class="wrap_paging">
            <div class="paging paging_ajax clearfix"><?=pagesListLimit_layout($url_link , $totalRows , $pageSize, $offset)?></div>
        </div><!--end wrap_paging-->     

        <div class="clear"></div>

    </div><!--end show-pro-->	
	


</div><!--end product-group-->

<?php }?>

</div><!--end main_content_web-->