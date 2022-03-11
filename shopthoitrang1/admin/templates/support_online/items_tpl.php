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



function doEnter(evt){
  // IE         // Netscape/Firefox/Opera
  var key;
  if(evt.keyCode == 13 || evt.which == 13){
    onSearch(evt);
  }
}
function onSearch(evt) {  
    var keyword = document.getElementById("keyword").value;   
    //var encoded = Base64.encode(keyword);
    location.href = "index.php?com=support_online&act=man&keyword="+keyword+"&typechild=<?=@$_GET['typechild']?>&curPage=<?=$_REQUEST['curPage']?>";
    loadPage(document.location);
      
}

  
</script>
<div class="control_frm">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	 
           <li><a href="index.php?com=support_online&act=man&typechild=<?=@$_GET['typechild']?>"><span>Hỗ trợ trực tuyến</span></a></li>
           <li class="current"><a href="#" onclick="return false;">Tất cả</a></li>

        </ul>
        <div class="clear"></div>
    </div>
</div>

<form name="f" id="f" method="post">
<div class="control_frm" style="margin-top:0;">
  	<div style="float:left;">
    	<input type="button" class="blueB" value="Thêm" onclick="location.href='index.php?com=support_online&act=add&typechild=<?=@$_GET['typechild']?>'" />
        <input type="button" class="blueB" value="Hiện" onclick="ChangeAction('index.php?com=support_online&act=man&typechild=<?=@$_GET['typechild']?>&multi=show');return false;" />
        <input type="button" class="blueB" value="Ẩn" onclick="ChangeAction('index.php?com=support_online&act=man&typechild=<?=@$_GET['typechild']?>&multi=hide');return false;" />
        <input type="button" class="blueB" value="Xoá" onclick="ChangeAction('index.php?com=support_online&act=man&typechild=<?=@$_GET['typechild']?>&multi=del');return false;" />
    </div>  



     <div style="float:right;">
        <div class="selector">
Tìm kiếm: <input name="keyword" id="keyword" type="text" value="<?=@$_REQUEST['keyword']?>" /> <input type="button" value=" Tìm "  onclick="onSearch(event)"/>
        </div>  
    </div>

</div>



<div class="widget">
  <div class="title">
    <h6>Danh sách nick hỗ trợ hiện có</h6>
  </div>
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" >
    <thead>
      <tr>
        <td class="tb_data_small"><a href="#" >STT</a></td>
        <td width="200"><div>Tên<span></span></div></td>
		  <td width="200"><div>Email<span></span></div></td>
     
        
        <td class="tb_data_small">Ẩn/Hiện</td>
        <td width="200">Thao tác</td>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <td colspan="10">
        <div class="pagination">
            <?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?>            
        </div></td>
      </tr>
    </tfoot>
    <tbody>
          <?php for($i=0, $count=count($items); $i<$count; $i++){?>
          <tr>
         <td align="center">
             <?= $i +1 ?></td>
        </td> 
        </td>       
        <td class="title_name_data">
            <a href="index.php?com=support_online&act=edit&typechild=<?=@$_GET['typechild']?>&id=<?=$items[$i]['id']?>" class="tipS SC_bold"><?=$items[$i]['ten_vi']?></a>
        </td>


        
         <td >
            <a href="index.php?com=support_online&act=edit&typechild=<?=@$_GET['typechild']?>&id=<?=$items[$i]['id']?>" class="tipS SC_bold"><?=$items[$i]['dienthoai']?></a>
        </td>
        
        <td align="center">
           <?php 
			if(@$items[$i]['hienthi']==1)
				{
		?>
            <a href="index.php?com=support_online&act=man&typechild=<?=@$_GET['typechild']?>&hienthi=<?=$items[$i]['id']?>" title="" class="smallButton tipS" original-title="Click để ẩn"><img src="./images/icons/color/tick.png" alt=""></a>
            <?php } else { ?>
         <a href="index.php?com=support_online&act=man&typechild=<?=@$_GET['typechild']?>&hienthi=<?=$items[$i]['id']?>" title="" class="smallButton tipS" original-title="Click để hiện"><img src="./images/icons/color/xicon.png" alt=""></a>
         <?php } ?>
         
        </td>
        
        <td class="actBtns">
            <a href="index.php?com=support_online&act=edit&typechild=<?=@$_GET['typechild']?>&id=<?=$items[$i]['id']?>" title="" class="smallButton tipS" original-title="Sửa danh mục"><img src="./images/icons/dark/1234.png" alt=""></a>
            <a href="index.php?com=support_online&act=delete&typechild=<?=@$_GET['typechild']?>&id=<?=$items[$i]['id']?>" onclick="CheckDelete('index.php?com=support_online&act=delete&typechild=<?=@$_GET['typechild']?>&id=<?=$items[$i]['id']?>'); return false;" title="" class="smallButton tipS" original-title="Xóa danh mục"><img src="./images/icons/dark/xicon1.png" alt=""></a>
        </td>
      </tr>
           <?php } ?> 
                </tbody>
  </table>
</div>
</form>               