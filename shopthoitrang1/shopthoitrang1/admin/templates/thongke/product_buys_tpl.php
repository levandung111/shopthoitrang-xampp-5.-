<?php
function tinhtrang($i=0)
	{
		$sql="select * from table_tinhtrang order by id";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_tinhtrang" name="id_tinhtrang" class="main_font">					
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==$i)
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["trangthai"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	
?>
<div class="control_frm" style="">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
	            <li><a href="index.php?com=thongke&act=product_buy"><span>Thống Kê số lượng sản phẩm đơn hàng</span></a></li>
              <!--li class="current"><a href="#" onclick="return false;">Tất cả</a></li-->
        </ul>
        <div class="clear"></div>
    </div>
</div>

<script src="js/jquery.datetimepicker.full.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $(".datetimepicker").datetimepicker({
      yearOffset:222,
      lang:'ch',
      timepicker:false,
      format:'m/d/Y',
      formatDate:'Y/m/d',
      minDate:'-1970/01/02', // yesterday is minimum date
      maxDate:'+1970/01/02' // and tommorow is maximum date calendar
    });
  });
</script>
<div class="widget">
  <div class="titlee" style="padding-bottom:5px;">

     <div class="timkiem" >
    <form name="search" action="index.php" method="GET" class="form giohang_ser">
      <input name="com" value="thongke" type="hidden"  />
      <input name="act" value="product_buy" type="hidden" />
      <input name="p" value="<?=($_GET['p']=='')?'1':$_GET['p']?>" type="hidden" />

      <?php /*?><input class="form_or" name="keyword" placeholder="Nhập từ khóa.." value="<?=$_GET['keyword']?>" type="text" /><?php */?>
      <input class="form_or" name="ngaybd" id="datefm" type="text" value="<?=$_GET['ngaybd']?>" placeholder="Từ ngày.."/>
      <input class="form_or" name="ngaykt" id="dateto" type="text" value="<?=$_GET['ngaykt']?>" placeholder="Đến ngày.." />

      
      
      
      <input type="submit" class="blueB" value="Tìm kiếm" style="width:100px; margin:0px 0px 0px 10px;"  />
    </form>
    </div><!--end tim kiem-->
    
    
    
    
  </div>
</div>
<script language="javascript">
	function CheckDelete(l){
		if(confirm('Bạn có chắc muốn xoá đơn hàng này?'))
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
<form name="f" id="f" method="post">


<div class="widget">
  <div class="title">
    <h6>Danh sách đơn hàng</h6>
  </div>
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" >
    <thead>
      <tr>
       
        <td class="tb_data_small"><a href="#" >STT</a></td>    
        <td class="sortCol" width="250"><div>Tên sản phẩm<span></span></div></td>
		<td width="150">Giá bán</td>
        <td class="sortCol" width="150"><div>Số lượt mua<span></span></div></td>
        
        <td width="150">Tổng tiền</td>
       
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
        
        <td>
         <?=$items[$i]['ten_sp']?>
       </td>
      
	  <td align="center">
      <?php if($items[$i]["gia_sp"]==0) echo "chưa có"; else echo number_format ($items[$i]["gia_sp"],0,",",".")." VNĐ";?> 
      </td>
      
        <td align="center">
          <?=get_numberorder_pro($items[$i]['id_sp'])?>
        </td>
       
        <td align="center">
		
		<?php 
		
		$soluotmua= get_numberorder_pro($items[$i]['id_sp']);
		
		
		?>
            <?=number_format(($items[$i]['gia_sp']*$soluotmua),0, ',', '.')?>&nbsp;VNĐ
        </td>
       

      </tr>
         <?php } ?>
                </tbody>
  </table>
</div>
</form>               


<script type="text/javascript">
function onSearch(evt) {	
		var datefm = document.getElementById("datefm").value;	
		var dateto = document.getElementById("dateto").value;
		var status = document.getElementById("id_tinhtrang").value;		
		//var encoded = Base64.encode(keyword);
		location.href = "index.php?com=thongke&act=product_buy&datefm="+datefm+"&dateto="+dateto+"&status="+status;
		loadPage(document.location);
			
}
$(document).ready(function(){						
	var dates = $( "#datefm, #dateto" ).datepicker({
			defaultDate: "+1w",
			format: 'dd/mm/yyyy',
			changeMonth: true,			
			numberOfMonths: 3,
			onSelect: function( selectedDate ) {
				var option = this.id == "datefm" ? "minDate" : "maxDate",
					instance = $( this ).data( "datepicker" ),
					date = $.datepicker.parseDate(
						instance.settings.dateFormat ||
						$.datepicker._defaults.dateFormat,
						selectedDate, instance.settings );
				dates.not( this ).datepicker( "option", option, date );
			}
		});
        
		});
		
</script>