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
	 
	$d->reset();
  $sql = "select id from #_order ";   
  $d->query($sql);
  $count_slorder = $d->result_array();  
  $soluong_order_menu=count($count_slorder);//láy hết các đơn hàng 
	
?>
<div class="control_frm">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
	            <li><a href="index.php?com=thongke&act=man"><span>Thống Kê tổng số đơn hàng   </span>&nbsp;<!--b class="count_info_bg"--><!--?=$soluong_order_menu?--></b></a></li>
				
              <!--li class="current"><a href="#" onclick="return false;">Tất cả</a></li-->
        </ul>
        <div class="clear"></div>
    </div>
</div>


<div class="widget">
  <div class="titlee" style="padding-bottom:5px;">

     <div class="timkiem" >
    <form name="search" action="index.php" method="GET" class="form giohang_ser">
      <input name="com" value="thongke" type="hidden"  />
      <input name="act" value="thongke_soluongorder" type="hidden" />
      <input name="p" value="<?=($_GET['p']=='')?'1':$_GET['p']?>" type="hidden" />

      <?php /*?><input class="form_or" name="keyword" placeholder="Nhập từ khóa.." value="<?=$_GET['keyword']?>" type="text" /><?php */?>
      <input class="form_or" name="ngaybd" id="datefm" type="text" value="<?=$_GET['ngaybd']?>" placeholder="Từ ngày.."/>
      <input class="form_or" name="ngaykt" id="dateto" type="text" value="<?=$_GET['ngaykt']?>" placeholder="Đến ngày.." />
	
      
      
      
      <input type="submit" class="blueB" value="Tìm kiếm" style="width:100px; margin:0px 0px 0px 10px;"  />
    </form>
    </div><!--end tim kiem-->
    
    
     <div class="tonggia_theongay">
     
       <?php 
     // print_r($result_ctdonhang);
		$tongtien=0;   	
		for($i=0,$count_donhang=count($items);$i<$count_donhang;$i++){	
			$tongtien+=	$items[$i]['tonggia'];
				
		}
				
		?>
    
    <b>Số đơn hàng đặt :</b> &nbsp;<span class="count_info_bg"><?=$soluong_order_menu  //swua thanh tong so don hang k phan theo trang?></span>
    
    </div><!--end tonggia_theongay-->
    
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
		<td class="tb_data_small"><a href="#">Thứ tự</a></td>
       <td class="sortCol" width="120"><div>Mã đơn hàng<span></span></div></td>     
        <td class="sortCol"><div>Họ tên<span></span></div></td>
        <td class="sortCol" width="150"><div>Ngày đặt<span></span></div></td>
        <td width="150">Số tiền</td>
        <td width="150">Tình trạng</td>
        <td width="150">Thao tác</td>
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
        <td align="center">
            <?=$items[$i]['madonhang']?>
        </td> 
        <td>
               <?=$items[$i]['hoten']?>
                </td>
                <td align="center">
               <?=date('d/m/Y',$items[$i]['ngaytao'])?>
                </td>
      
        <td align="center">
           <?=number_format($items[$i]['tonggia'],0, ',', '.')?>&nbsp;VNĐ
        </td>
       
        <td align="center">
           <?php 
		   		$sql="select trangthai from #_tinhtrang where id= '".$items[$i]['trangthai']."' ";
				$d->query($sql);
				$result=$d->fetch_array();
				echo $result['trangthai'];
		   ?>
        </td>
       
        <td class="actBtns">
            <?php /*?><a href="export.php?id=<?=$items[$i]['id']?>" title="" class="smallButton tipS" original-title="Xuất đơn hàng"><img src="./images/icons/dark/excel.png" alt=""></a><?php */?>
            
            <a href="index.php?com=order&act=edit&id=<?=$items[$i]['id']?>" title="" class="smallButton tipS" original-title="Xem và sửa"><img src="./images/icons/dark/tr.png" alt=""></a>
            <a href="" onclick="CheckDelete('index.php?com=order&act=delete&id=<?=$items[$i]['id']?>'); return false;" title="" class="smallButton tipS" original-title="Xóa"><img src="./images/icons/dark/xicon1.png" alt=""></a>        </td>
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
		location.href = "index.php?com=thongke&act=thongke_sumpriceorder&datefm="+datefm+"&dateto="+dateto+"&status="+status;
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