<div id="main_content_web">


<ul class="breadcrumb">

<li><a href="" class="transitionAll"><?=_trangchu?></a> </li>

<li><a href="<?=$com?>.html" class="transitionAll"><?=$com_title?></a> </li>

<li><a href="<?=$com?>/<?=$tintuc_detail[0]["tenkhongdau_$lang"]?>-<?=$tintuc_detail[0]["id"]?>.html" class="transitionAll"><?=$tintuc_detail[0]["ten_$lang"]?></a></li>


</ul><!--end breadcrumb-->


    <div class="clear"></div>

<div class="block_content">



    <div class="clear"></div>
    
    <div class="show-pro">



      
           <div class="chitiettin"><?=$tintuc_detail[0]["noidung_$lang"]?></div>
           <div class="clear"></div>
           <div style="margin:20px 0">
        	<!-- AddThis Button BEGIN -->
            <div class="addthis_toolbox addthis_default_style">
            <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
            <a class="addthis_button_tweet"></a>
            <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
            <a class="addthis_counter addthis_pill_style"></a>
            </div>
            <script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-52843d4e1ff0313a"></script>
            <!-- AddThis Button END -->
        </div>
          <?php
		   	if(!empty($tintuc_khac)){
			?>
            	<div class="othernews">
           <h3><?=_cacbaikhac?></h3>
           <ul>          
            <?php foreach($tintuc_khac as $tinkhac){?>
     <li><a href="<?=$com?>/<?=$tinkhac["tenkhongdau_$lang"]?>-<?=$tinkhac['id']?>.html"><?=$tinkhac["ten_$lang"]?></a> </li>
            <?php }?>
                 </ul>
        </div>
            <?php	
			}
		   ?>
 	</div><!--end show-pro-->
    
 </div><!--end block_content-->
 
 </div><!--end main_content_web-->