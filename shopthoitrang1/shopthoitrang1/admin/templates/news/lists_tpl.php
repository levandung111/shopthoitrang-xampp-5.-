<script language="javascript">
	function CheckDelete(l){
		if(confirm('Bạn có chắc muốn xoá mục này?'))
		{
			location.href = l;	
		}
	}	
	function ChangeAction(str){
		if(confirm("Bạn có chắc chắn?"))
		{
			document.f.action = str;
			document.f.submit();
		}
	}
	
</script>
<script type="text/javascript">
function doEnter(evt){
	// IE					// Netscape/Firefox/Opera
	var key;
	if(evt.keyCode == 13 || evt.which == 13){
		onSearch(evt);
	}
}
function onSearch(evt) {	
		var keyword = document.getElementById("keyword").value;		
		//var encoded = Base64.encode(keyword);
		location.href = "index.php?com=news&act=man_list&keyword="+keyword+"&typeparent=<?=@$_GET['typeparent']?>&curPage=<?=$_REQUEST['curPage']?>";
		loadPage(document.location);
			
}

</script>



<script type="text/javascript">
	function select_onchange()
	{
		var a=document.getElementById("id_thuoctinh");
		window.location ="index.php?com=news&act=man_list&id_thuoctinh="+a.value+"&typeparent=<?=@$_GET['typeparent']?>&curPage=<?=$_REQUEST['curPage']?>";	
		return true;
	}

</script>


<?php
function get_main_thuoctinh()
	{
		$sql="select ten_vi,id from table_product_list where hienthi=1  order by stt asc";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_thuoctinh" name="id_thuoctinh" onchange="select_onchange()" class="main_font">
			<option value="">---Chọn danh mục---</option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==$_REQUEST['id_thuoctinh'])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}


?>

<div class="control_frm">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	            <li><a href="index.php?com=news&act=add_list&typeparent=<?=$_GET['typeparent']?>"><span><?=$name_cap?></span></a></li>
                                    <li class="current"><a href="#" onclick="return false;">Tất cả</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>


<form name="f" id="f" method="post">
<div class="control_frm" style="margin-top:0;">
  	<div style="float:left;">
    	<input type="button" class="blueB" value="Thêm" onclick="location.href='index.php?com=news&act=add_list&typeparent=<?=@$_GET['typeparent']?>&curPage=<?=$_REQUEST['curPage']?>'" />
        <input type="button" class="blueB" value="Hiện" onclick="ChangeAction('index.php?com=news&act=man_list&typeparent=<?=@$_GET['typeparent']?>&curPage=<?=$_REQUEST['curPage']?>&multi=show');return false;" />
        <input type="button" class="blueB" value="Ẩn" onclick="ChangeAction('index.php?com=news&act=man_list&typeparent=<?=@$_GET['typeparent']?>&curPage=<?=$_REQUEST['curPage']?>&multi=hide');return false;" />
        <input type="button" class="blueB" value="Xoá" id="xoahet" onclick="ChangeAction('index.php?com=news&act=man_list&typeparent=<?=$_GET['typeparent']?>&multi=del');return false;"  />
        

        
    </div> 
     <div style="float:right;">
        <div class="selector">
Tìm kiếm: <input name="keyword" id="keyword" type="text" value="<?=@$_REQUEST['keyword']?>" /> <input type="button" value=" Tìm "  onclick="onSearch(event)"/>
        </div>  
    </div>
  	
</div>



<div class="widget">
  <div class="title">
    <h6>Danh sách các danh mục:</h6>
  </div>
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" >
    <thead>
      <tr>
         <td class="tb_data_small"><a href="#">STT</a></td>
        
        <td class="sortCol"><div>Tên danh mục<span></span></div></td>
		
		
		  <?php if ($menutop_active =="on") {?>   
        <td class="sortCol"><div><?=$rename_menutop?><span></span></div></td>    
       <?php }?>
	   
	     <?php if ($nhomtin_active =="on") {?>   
        <td class="sortCol"><div><?=$rename_nhomtin?><span></span></div></td>    
       <?php }?>

        
        <td class="tb_data_small">Ẩn/Hiện</td>
        <td width="200">Thao tác</td>
      </tr>
    </thead>
    <tfoot>
      <tr>
       
          <td colspan="10"><div class="pagination">  <?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?>     </div></td>

      </tr>
    </tfoot>
    
    
    <tbody>
         <?php for($i=0, $count=count($items); $i<$count; $i++){?>
          <tr>
       <td align="center">
             <?= $i +1 ?></td>
        </td>
        
      
        <td class="title_name_data">
            <a href="index.php?com=news&act=edit_list&typeparent=<?=$_GET['typeparent']?>&id=<?=$items[$i]['id']?>" class="tipS SC_bold"><?=$items[$i]['ten_vi']?></a>
        </td>
        
        
		 <?php if ($menutop_active=="on") {?>
    
       <td align="center">

       <?php
		if($items[$i]['menu_top']>0)
		{
		?>
	 <a href="index.php?com=news&act=man_list&menu_top=<?=$items[$i]['id']?>&typeparent=<?=@$_GET['typeparent']?>" title="" class="smallButton tipS" original-title="Click để ẩn"><img src="./images/icons/color/tick.png" alt=""></a>
        <?php
		}
		else
		{
		?>
           <a href="index.php?com=news&act=man_list&menu_top=<?=$items[$i]['id']?>&typeparent=<?=@$_GET['typeparent']?>" title="" class="smallButton tipS" original-title="Click để hiện"><img src="./images/icons/color/xicon.png" alt=""></a>
       <?php }
        ?>     
       
           
        </td>

        <?php }?>
		
		
		 <?php if ($nhomtin_active=="on") {?>
    
       <td align="center">

       <?php
		if($items[$i]['nhom_tin']>0)
		{
		?>
	 <a href="index.php?com=news&act=man_list&nhom_tin=<?=$items[$i]['id']?>&typeparent=<?=@$_GET['typeparent']?>" title="" class="smallButton tipS" original-title="Click để ẩn"><img src="./images/icons/color/tick.png" alt=""></a>
        <?php
		}
		else
		{
		?>
           <a href="index.php?com=news&act=man_list&nhom_tin=<?=$items[$i]['id']?>&typeparent=<?=@$_GET['typeparent']?>" title="" class="smallButton tipS" original-title="Click để hiện"><img src="./images/icons/color/xicon.png" alt=""></a>
       <?php }
        ?>     
       
           
        </td>

        <?php }?>

       
        <td align="center">
           <?php 
			if(@$items[$i]['hienthi']==1)
				{
		?>
            <a href="index.php?com=news&act=man_list&typeparent=<?=$_GET['typeparent']?>&hienthi=<?=$items[$i]['id']?>" title="" class="smallButton tipS" original-title="Click để ẩn"><img src="./images/icons/color/tick.png" alt=""></a>
            <?php } else { ?>
         <a href="index.php?com=news&act=man_list&typeparent=<?=$_GET['typeparent']?>&hienthi=<?=$items[$i]['id']?>" title="" class="smallButton tipS" original-title="Click để hiện"><img src="./images/icons/color/xicon.png" alt=""></a>
         <?php } ?>
        </td>
        
        <td class="actBtns">
            <a href="index.php?com=news&act=edit_list&typeparent=<?=$_GET['typeparent']?>&id=<?=$items[$i]['id']?>" title="" class="smallButton tipS" original-title="Sửa sản phẩm"><img src="./images/icons/dark/1234.png" alt=""></a>
            <a href="index.php?com=news&act=delete_list&typeparent=<?=$_GET['typeparent']?>&id=<?=$items[$i]['id']?>" onclick="CheckDelete('index.php?com=news&act=delete_list&typeparent=<?=$_GET['typeparent']?>&id=<?=$items[$i]['id']?>'); return false;" title="" class="smallButton tipS" original-title="Xóa sản phẩm"><img src="./images/icons/dark/xicon1.png" alt=""></a>        </td>
      </tr>
         <?php } ?>
                </tbody>
    
    
    
  </table>
</div>
</form>