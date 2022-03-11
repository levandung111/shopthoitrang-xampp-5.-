<?php
function get_main_category()
	{
		$sql="select * from table_product_list where com='$_GET[typeparent]' order by stt, id";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_list" name="id_list" onchange="select_onchange1()" class="main_font">
			<option>Chọn danh mục</option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==(int)@$_REQUEST["id_list"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	
	?>
<div class="wrapper">
	<div class="control_frm">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	
        	<li><a href="index.php?com=product&act=man_cat&typeparent=<?=$_GET['typeparent']?>"><span><?=$name_cap?></span></a></li>
            <li class="current"><a href="#" onclick="return false;">Thêm</a></li>

        </ul>
        <div class="clear"></div>
    </div>
    
    
</div><!--end control_frm-->



<form name="supplier" id="validate" class="form" action="index.php?com=product&act=save_cat&typeparent=<?=$_GET['typeparent']?>" method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="title"><img src="./images/icons/dark/list.png" alt="" class="titleIcon" />
			<h6>Nhập dữ liệu</h6>
		</div>		
		




        <div class="formRow">
			<label>Danh mục cấp 1</label>
			<div class="formRight">
            	<div class="selector">
					<?=get_main_category();?>
                </div>
			</div>
			<div class="clear"></div>
		</div>



	<?php if ($image_active=="on") {?>	

		 <div class="formRow" >
			<label>Hình ảnh hiện tại:</label>
			<div class="formRight">
            	
      <?php if ($_REQUEST['act']=='edit_cat' && $item['thumb']!='')
        {?>
        <img src="<?php if($item['photo']!=NULL) echo _upload_product_cat.$item['photo']; else echo 'images/no_image.jpg';?>"  alt="NO PHOTO" style="max-width:300px;" />
        
         <a class="delete_img_present" title="Xoá ảnh" onclick="Action_Delete_Img('index.php?com=product&act=save_cat&typeparent=<?=$_GET['typeparent']?>&id=<?=@$item['id']?>&delete_img_present=delete_img');return false;">Xoá ảnh</a>
                    
        <br>
        
        <?php }?>
        
     		<input type="file" id="file" name="file" />
				<img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình đại diện cho sản phẩm (ảnh JPEG, GIF , JPG , PNG)"> <?=$kichthuoc_image?>
			</div>
			<div class="clear"></div>
		</div><!--end formRow-->


	<?php }?>	
        
		
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
				<input type="text" value="<?=@$item['ten_'.$value]?>" name="ten_<?=$value?>" title="Nội dung tiêu đề <?=$value?> bài viết" id="short" class="tipS validate[required]" />
			</div><!--end formRight-->
            
			<div class="clear"></div>           
		</div><!--end formRow-->
        


        </div><!--tab_content-->


     <?php }?>   
      
        
     
    </div><!--end tabs_content_container-->
    
    
    </div><!--end tab_gaconit-->
        
        
		     
        
		
        <div class="formRow">
          <label>Tùy chọn: <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Check vào những tùy chọn "> </label>
          <div class="formRight">
            <input type="checkbox" name="hienthi" id="check1" value="1" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> />
            <label for="check1">Hiển thị</label>            
          </div>
          <div class="clear"></div>
        </div>
        <div class="formRow">
            <label>Số thứ tự: </label>
            <div class="formRight">
                <input type="text" class="tipS" value="<?=isset($item['stt'])?$item['stt']:1?>" name="stt" style="width:20px; text-align:center;" onkeypress="return OnlyNumber(event)" original-title="Số thứ tự của danh mục, chỉ nhập số">
            </div>
            <div class="clear"></div>
        </div>
		
      
		<div class="formRow">
			<div class="formRight">
            
            	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
                <input type="hidden" name="referer_link" id="id" value="index.php?com=product&act=man_cat&typeparent=<?=$_GET['typeparent']?>&curPage=<?=$_REQUEST['curPage']?>" />
                <input type="submit" value="Hoàn tất" class="blueB" />
                <input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=product&act=man_cat&typeparent=<?=$_GET['typeparent']?>&curPage=<?=$_REQUEST['curPage']?>'" class="blueB" />

			</div>
			<div class="clear"></div>
		</div>
		
		
	</div> 
	
	
	
	</form>



</div><!--end wrapper-->