<script type="text/javascript">
	$(document).ready(function() {
							   
	$("#chonhet").click(function(){
		var status=this.checked;
		$("input[name='chon']").each(function(){this.checked=status;})
	});
	
	$("#send").click(function(){
		var listid="";
		$("input[name='chon']").each(function(){
			if (this.checked) listid = listid+","+this.value;
			})
		listid=listid.substr(1);	 //alert(listid);
		if (listid=="") { alert("Bạn chưa chọn email nào"); return false;}
		hoi= confirm("Xác nhận muốn gửi thư đi?");
		if (hoi==true){ document.frm.listid.value=listid; document.frm.submit();}
	});
	});
	
	
	function CheckDelete(l){
		if(confirm('Bạn có chắc muốn xoá mục này?'))
		{
			location.href = l;	
		}
	}	
	
	function ChangeAction(str){
		if(confirm("Bạn có chắc chắn?"))
		{
			document.frm.action = str;
			document.frm.submit();
		}
	}	
	
</script>


<div class="control_frm">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	            <li><a href="index.php?com=newsletter&act=man"><span>Email đăng ký nhận tin</span></a></li>
                                    <li class="current"><a href="#" onclick="return false;">Tất cả</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>


<form  id="f" class="form" name="frm" method="post" action="index.php?com=newsletter&act=send" enctype="multipart/form-data">
<?php /*?><input type="hidden" name="listid"><?php */?>
<div class="control_frm" style="margin-top:0;">
  	<div style="float:left;">
    	<input type="button" class="blueB" value="Thêm" onclick="location.href='index.php?com=newsletter&act=add'" />
        <input type="button" class="blueB" value="Hiện" onclick="ChangeAction('index.php?com=newsletter&act=man&multi=show');return false;" />
        <input type="button" class="blueB" value="Ẩn" onclick="ChangeAction('index.php?com=newsletter&act=man&multi=hide');return false;" />
        <input type="button" class="blueB" value="Xoá" id="xoahet" onclick="ChangeAction('index.php?com=newsletter&act=man&multi=del');return false;"  />
        
        
        
    </div> 
     <div style="float:right;">
        <div class="selector">
			
        </div>  
    </div>
  	
</div>



<div class="widget">
  <div class="title">
    <h6>Danh sách  hiện có</h6>
  </div>
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" >
    <thead>
      <tr>
        <td class="tb_data_small"><a href="#" >STT</a></td>
      
         <td style="width:15%;">Email</td>
                 <td style="width:35%;">Giới tính</td>

        <td class="tb_data_small">Ẩn/Hiện</td>
        <td width="200">Thao tác</td>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <td colspan="10">
        <div class="pagination">
       <?=$paging['paging']?>
            
        </div></td>
      </tr>
    </tfoot>
    
    
    <tbody>
         <?php for($i=0, $count=count($items); $i<$count; $i++){?>
          <tr>
       <td align="center">
             <?= $i +1 ?></td>
        </td>
        
        
          <td>
         <a href="index.php?com=newsletter&act=edit&id=<?=$items[$i]['id']?>" class="tipS SC_bold"><?=$items[$i]['email']?></a>
        </td>
        
        
          <td>
         <a href="index.php?com=newsletter&act=edit&id=<?=$items[$i]['id']?>" class="tipS SC_bold"><?php if ($items[$i]['sex']==1)  {?> Nam <?php } else {?> Nữ <?php }?></a>
        </td>
       
        <td align="center">
           <?php 
			if(@$items[$i]['hienthi']==1)
				{
		?>
            <a href="index.php?com=newsletter&act=man&hienthi=<?=$items[$i]['id']?>" title="" class="smallButton tipS" original-title="Click để ẩn"><img src="./images/icons/color/tick.png" alt=""></a>
            <?php } else { ?>
         <a href="index.php?com=newsletter&act=man&hienthi=<?=$items[$i]['id']?>" title="" class="smallButton tipS" original-title="Click để hiện"><img src="./images/icons/color/xicon.png" alt=""></a>
         <?php } ?>
        </td>
        
        <td class="actBtns">
      <a href="index.php?com=newsletter&act=edit&id=<?=$items[$i]['id']?>" title="" class="smallButton tipS" original-title="Sửa"><img src="./images/icons/dark/1234.png" alt=""></a>
            <a href="index.php?com=newsletter&act=delete&id=<?=$items[$i]['id']?>" onclick="CheckDelete('index.php?com=newsletter&act=delete&id=<?=$items[$i]['id']?>'); return false;" title="" class="smallButton tipS" original-title="Xóa"><img src="./images/icons/dark/xicon1.png" alt=""></a>        </td>
      </tr>
         <?php } ?>
                </tbody>
    
    
    
  </table>
</div>

<br />



</form>
