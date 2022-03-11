<script type="text/javascript" src="js/my_script_check_form.js"></script>
<script type="text/javascript">
function js_submit(){
  if(isEmpty(document.getElementById('ten'), "<?=_nameError?>")){
    document.getElementById('ten').focus();
    return false;
  }
  
  
  if(!check_email(document.frm.email.value)){
    alert("<?=_emailError1?>");
    document.frm.email.focus();
    return false;
  }
  
  
  if(isEmpty(document.getElementById('dienthoai'), "<?=_phoneError?>")){
    document.getElementById('dienthoai').focus();
    return false;
  }
  
  
  if(!isNumber(document.getElementById('dienthoai'), "<?=_phoneError1?>")){
    document.getElementById('dienthoai').focus();
    return false;
  }
  
  
  


  
  document.frm.submit();
}
</script>


<div id="main_content_web">



<ul class="breadcrumb">

<li><a href="" class="transitionAll"><?=_trangchu?></a> </li>



<li><a href="" class="transitionAll"><?=$title_tcat?></a></li>


</ul><!--end breadcrumb-->



    
    <div class="clear"></div>


<div class="block_content">

    <div class="clear"></div>
    
    <div class="show-pro">
    
    <div class="left-contact">
       

                 <form method="post" name="frm" action="" enctype="multipart/form-data">
            <div class="tablelienhe">
                <div class="input_block">
                    <label for="ten"><span><img src="images/li_bottom.png" alt="" /></span><?=_hovaten?></label>
                    <div class="input_item"><input name="ten" type="text" class="input" id="ten" size="50" /></div><!--input_item-->
                </div>                        
                <div class="input_block">
                    <label for="diachi"><span><img src="images/li_bottom.png" alt="" /></span><?=_diachi?></label>
                    <div class="input_item"><input name="diachi" id="diachi" type="text"  class="input" size="50" /></div>
                </div>
                <div class="input_block">
                    <label for="dienthoai"><span><img src="images/li_bottom.png" alt="" /></span><?=_dienthoai?></label>
                    <div class="input_item"><input name="dienthoai" type="text" class="input" id="dienthoai" size="50"/></div><!--input_item-->
                </div>
                <div class="input_block">
                    <label for="email"><span><img src="images/li_bottom.png" alt="" /></span><?=_email?></label>
                    <div class="input_item"><input name="email" type="text" class="input" size="50"  /></div><!--input_item-->
                </div>                                                  
                <div class="input_block">
                    <label for="tieude1"><span><img src="images/li_bottom.png" alt="" /></span><?=_tieude?></label>
                    <div class="input_item"><input name="tieude1" type="text" class="input" id="tieude1" size="50"  /></div><!--input_item-->
                </div>                         
                <div class="input_block">
                    <label for="noidung"><span><img src="images/li_bottom.png" alt="" /></span><?=_noidung?></label>
                    <div class="input_item">
                    <textarea name="noidung" cols="50" rows="5" class="ta_noidung" id="noidung" style="background-color:#FFFFFF; color:#666666;"></textarea>
                    </div><!--input_item-->
                </div>
                <div class="input_block">
                    <label>&nbsp;</label>
                    <div class="input_item"> 
                        <input class="button" type="button" value="<?=_gui?>" onclick="js_submit();" />
                        <input class="button" type="button" value="<?=_nhaplai?>" onclick="document.frm.reset();" />
                    </div><!--input_item-->
                </div>
             </div><!--tablelienhe-->
         </form>
        </div><!--end left-contact-->
        
        
       
       <div class="map-c">

        <div class="google-map-api"> 
                   <!--?=$company_contact['noidung_'.$lang];?-->  
                    
         </div><!--end google-map-api--> 
                  
    
                
    </div><!--end map-c--> 
       
       
       
       <div class="clear"></div>
    

    </div><!--end show-pro-->

</div><!--end block_content-->


  <div class="clear"></div>
      
</div><!--end main_dm_product-->
