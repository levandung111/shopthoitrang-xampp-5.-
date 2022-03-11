<div class="control_frm">
<div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	            <li><a href="index.php?com=setting&act=capnhat"><span>Thiết lập hệ thống</span></a></li>
                                    <li class="current"><a href="#" onclick="return false;">Cấu hình website</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<script type="text/javascript">		
	function TreeFilterChanged2(){		
				$('#validate').submit();		
	}
</script>
<form name="supplier" id="validate" class="form" action="index.php?com=setting&act=save&curPage=<?=$_REQUEST['curPage']?>" method="post" enctype="multipart/form-data">
	

      
      



	

    <div class="widget">
		<div class="title"><img src="./images/icons/dark/users.png" alt="" class="titleIcon" />
			<h6>Thông tin công ty</h6>
		</div>			
        
        
        
        <div class="tab_gaconit">      
        
    <div id="tabs_container">
    	
        <ul id="tabs">
            
            <?php foreach ($config["lang"] as $key => $value) {
            # code...
            $active='';
            if ($key==0)
            {
              $active="active";

            }

            echo '<li class="'.$active.'"><a href="#tab'.$value.'">'.$config["langs"][$value].'</a></li>';

          }?>
          
         
        </ul><!--tabs-->
	</div><!--tabs_container-->
    
    
    <div id="tabs_content_container">


    <?php foreach ($config["lang"] as $key => $value) {
      # code...
      $active='';
      $active_block='';
      if ($key==0)
      {

        $active="active";
        $active_block="style='display:block;'";

      }
     ?> 	
      
        <div id="tab<?=$value?>" class="tab_content" <?=$active_block?>>

         <div class="formRow">
			<label>Tiêu đề <?=$value?></label>
			<div class="formRight">
				<input type="text" value="<?=@$item['ten_'.$value]?>" name="ten_<?=$value?>" title="Nội dung tiêu đề <?=$value?> bài viết" class="tipS" />
			</div><!--end formRight-->
            
			<div class="clear"></div>           
		</div><!--end formRow-->


        
        
        <div class="formRow">
			<label>Địa chỉ <?=$value?></label>
			<div class="formRight">
            
            <textarea cols="10" rows="10" name="diachi_<?=$value?>" id="diachi_<?=$value?>"><?=@$item['diachi_'.$value]?></textarea>
            
			</div>
			<div class="clear"></div>
		</div>


		
        


         <div class="formRow">
			<label>Copyright <?=$value?></label>
			<div class="formRight">
				<input type="text" value="<?=@$item['copyright_'.$value]?>" name="copyright_<?=$value?>" title="Nhập copyright <?=$value?>" class="tipS" />
			</div><!--end formRight-->
            
			<div class="clear"></div>           
		</div><!--end formRow-->



	

        </div><!--tab_content-->
      
      <?php }?>  
     
    </div><!--end tabs_content_container-->
    
    
    </div><!--end tab_gaconit-->
        
        
        
        
        
        
        
        
        
           
     <div class="formRow">
			<label>Author</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['author']?>" name="author" title="Nhập author" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
        
        
		
      
		<div class="formRow">
			<label>Email</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['email']?>" name="email" title="Nhập địa chỉ email" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
        
    
         
		<div class="formRow">
			<label>Website</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['website']?>" name="website" title="Nhập địa chỉ website" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
        
     
        
        
       <div class="formRow">
			<label>Fanpage Facebook</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['fanpage']?>" name="fanpage" title="Nhập địa chỉ fanpage" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
        
        
        
        					
	</div>
    
    <div class="widget">
		
		<div class="title">
			<img src="./images/icons/dark/users.png" alt="" class="titleIcon" />
			<h6>Thông tin thêm</h6>
		</div>			
		
        
    
		
        
        
       
    
        <div class="formRow">
			<label>Hotline </label>
			<div class="formRight">
				<input type="text" value="<?=@$item['hotline']?>" name="hotline" title="Nhập số điện thoại hotline" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>


		

		
        <div class="formRow">
			<label>Favicon</label>
			<div class="formRight">
            
            <?php if ($_REQUEST['act']=='capnhat')
        {?>
      <img src="<?=_upload_hinhanh.$item['favicon']?>"  alt="NO PHOTO" style="max-width:100px;" /><br />
        <?php }?>
				<input type="file" id="file" name="img" /> <img src="./images/question-button.png" alt="Upload favicon" class="icon_question tipS" original-title="Tải hình đại diện website (ảnh JPEG, GIF , JPG , PNG, ICO)"> Width:15px |Hieght:15px
			</div>
			<div class="clear"></div>
		</div>	



		
	

		



	 <div class="formRow">
			<div class="formRight">
                <input type="hidden" name="id" id="id_this_setting" value="<?=@$item['id']?>" />
            	<input type="button" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
			</div>
			<div class="clear"></div>
		</div> 	

        			
	</div><!--END widget-->
    
    
      
</form>   