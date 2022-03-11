<?php	if(!defined('_source')) die("Error");
$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$urldanhmuc ="";
$urldanhmuc.= (isset($_REQUEST['id_list'])) ? "&id_list=".addslashes($_REQUEST['id_list']) : "";
$urldanhmuc.= (isset($_REQUEST['id_cat'])) ? "&id_cat=".addslashes($_REQUEST['id_cat']) : "";
$urldanhmuc.= (isset($_REQUEST['id_item'])) ? "&id_item=".addslashes($_REQUEST['id_item']) : "";
$urldanhmuc.= (isset($_REQUEST['id_product'])) ? "&id_product=".addslashes($_REQUEST['id_product']) : "";
$url_back=$_SERVER['HTTP_REFERER'];
$id=@$_REQUEST['id'];


switch($act){

	




	
	#=========================START Thống Kê sản phẩm mua nhiều==========================#	
		
		case "product_buy":
		get_product_buys();
		$template = "thongke/product_buys";
		break;

	
	#=========================END Thống Kê sản phẩm mua nhiều==========================#	


	
	
	#=========================START Thống Kê số lượng đơn hàng==========================#	
		
		case "thongke_soluongorder":
		get_thongke_soluongorders();
		$template = "thongke/thongke_soluongorders";
		break;
		

	#=========================END Thống Kê số lượng đơn hàng==========================#
	
	
	
		#=========================START Thống Kê Tổng giá đơn hàng==========================#	
		
		case "thongke_sumpriceorder":
		get_thongke_sumpriceorders();
		$template = "thongke/thongke_sumpriceorders";
		break;
		

	#=========================END Thống Kê Tổng giá đơn hàng==========================#
	
	
	
	
	

		#=========================START Thống Kê Tổng lãi đơn hàng==========================#	
		
		case "thongke_lai_orders":
		get_thongke_lai_orders();
		$template = "thongke/thongke_lai_orders";
		break;
		

	#=========================END Thống Kê Tổng lãi đơn hàng==========================#
	
	
	
	
	
	
	
	default:
		$template = "index";
}

#====================================
function fns_Rand_digit($min,$max,$num)
	{
		$result='';
		for($i=0;$i<$num;$i++){
			$result.=rand($min,$max);
		}
		return $result;	
	}





	#=========================START Thống Kê Số Lượng sản phẩm đơn hàng==========================#	
function get_product_buys(){
	
	
	global $d, $items, $url_link,$totalRows , $pageSize, $offset,$soluong_order;
	
	if(!empty($_POST)){
		$multi=$_REQUEST['multi'];
		$id_array=$_POST['iddel'];
		$count=count($id_array);				
		if($multi=='del'){
			for($i=0;$i<$count;$i++){
								
				
				$sql = "delete from #_order_detail where id_order 	='".$id_array[$i]."'";
				$d->query($sql);
		
				$sql = "delete from table_order where id = '".$id_array[$i]."'";
				mysql_query($sql) or die("Not query sqlUPDATE_ORDER");			
							
			}
			redirect("index.php?com=thongke&act=thongke_soluongorder&type=".$_REQUEST['type']);			
		}
		
		
	}
	
	$where=" where pro.id<> 0 "; 
	if($_GET["ngaybd"]!=''){
	$ngaybatdau = $_GET["ngaybd"];		
	$Ngay_arr = explode("/",$ngaybatdau); // array(17,11,2010)
	if (count($Ngay_arr)==3) {
		$ngay = $Ngay_arr[0]; //17
		$thang = $Ngay_arr[1]; //11
		$nam = $Ngay_arr[2]; //2010
		if (checkdate($thang,$ngay,$nam)==false){ $coloi=true; $error_ngaysinh = "Bạn nhập chưa đúng ngày sinh<br>";} else $ngaybatdau=$nam."-".$thang."-".$ngay;
	}	
		$where.=" and dh.ngaytao>=".strtotime($ngaybatdau)." ";
	}

	if($_GET["ngaykt"]!=''){
	$ngayketthuc = $_GET["ngaykt"];		
	$Ngay_arr = explode("/",$ngayketthuc); // array(17,11,2010)
	if (count($Ngay_arr)==3) {
		$ngay = $Ngay_arr[0]; //17
		$thang = $Ngay_arr[1]; //11
		$nam = $Ngay_arr[2]; //2010
		if (checkdate($thang,$ngay,$nam)==false){ $coloi=true; $error_ngaysinh = "Bạn nhập chưa đúng ngày sinh<br>";} else $ngayketthuc=$nam."-".$thang."-".$ngay;
	}	
		$where.=" and dh.ngaytao<=".strtotime($ngayketthuc)." ";
		
	}

	
	if($_GET["keyword"]!=''){
		$where.=" and (dh.madonhang like '%".$_GET["keyword"]."%' or dh.hoten like '%".$_GET["keyword"]."%' )  ";
	}
	//sotien
	if($_GET["sotien"]!='' && $_GET["sotien"]>0){
		$sql="select giatu,giaden from #_giasearch where id='".$_GET["sotien"]."'";
		$d->query($sql);
		$giatim=$d->fetch_array();
		if($giatim!=null){
			$where.=" and dh.tonggia>=".$giatim['giatu']." and dh.tonggia<=".$giatim['giaden']." ";			
		}
	}
	//httt
	if($_GET["httt"]!='' && $_GET["httt"] > 0){
		$where.=" and dh.httt=".$_GET["httt"]." ";
	}
	//tinhtrang
	if($_GET["tinhtrang"]!='' && $_GET["tinhtrang"]>0){
		$where.=" and dh.trangthai=".$_GET["tinhtrang"]." ";
	}

								
	$sql="SELECT count(pro.id) AS numrows FROM #_product pro $where";
	$d->query($sql);	
	$dem=$d->fetch_array();
	$totalRows=$dem['numrows'];
	$page=$_GET['p'];
	
	$pageSize=10;
	$offset=5;
						
	if ($page=="")
		$page=1;
	else 
		$page=$_GET['p'];
	$page--;
	$bg=$pageSize*$page;		
	
	
	
	$sql = "select DISTINCT pro.ten_vi as ten_sp,pro.gia as gia_sp,pro.stt as stt_sp,pro.id as id_sp from #_product pro,#_order dh,#_order_detail dh_ct  $where and dh_ct.id_product=pro.id  ORDER BY pro.luotmua asc  limit $bg,$pageSize";		
	$d->query($sql);
	$items = $d->result_array();
	$soluong_order=count($items);
	
	$url_link='index.php?com=thongke&act=thongke_soluongorder';		
	
	
}


	#=========================End Thống Kê sản phẩm đã mua==========================#	
	

	
	
	
	
	
	#=========================START Thống Kê Số Lượng Đơn Hàng==========================#	
function get_thongke_soluongorders(){
	
	//global $d, $items, $paging, $url_back ,$url_link,$totalRows , $pageSize, $offset,$config_more_proview;

	global $d, $items, $url_link,$totalRows , $pageSize, $offset,$soluong_order;
	
	if(!empty($_POST)){
		$multi=$_REQUEST['multi'];
		$id_array=$_POST['iddel'];
		$count=count($id_array);				
		if($multi=='del'){
			for($i=0;$i<$count;$i++){
								
				
				$sql = "delete from #_order_detail where id_order 	='".$id_array[$i]."'";
				$d->query($sql);
		
				$sql = "delete from table_order where id = '".$id_array[$i]."'";
				mysql_query($sql) or die("Not query sqlUPDATE_ORDER");			
							
			}
			redirect("index.php?com=thongke&act=thongke_soluongorder&type=".$_REQUEST['type']);			
		}
		
		
	}
	
	$where=" where id<> 0 "; 
	if($_GET["ngaybd"]!=''){
	$ngaybatdau = $_GET["ngaybd"];		
	$Ngay_arr = explode("/",$ngaybatdau); // array(17,11,2010)
	if (count($Ngay_arr)==3) {
		$ngay = $Ngay_arr[0]; //17
		$thang = $Ngay_arr[1]; //11
		$nam = $Ngay_arr[2]; //2010
		if (checkdate($thang,$ngay,$nam)==false){ $coloi=true; $error_ngaysinh = "Bạn nhập chưa đúng ngày sinh<br>";} else $ngaybatdau=$nam."-".$thang."-".$ngay;
	}	
		$where.=" and ngaytao>=".strtotime($ngaybatdau)." ";
	}

	if($_GET["ngaykt"]!=''){
	$ngayketthuc = $_GET["ngaykt"];		
	$Ngay_arr = explode("/",$ngayketthuc); // array(17,11,2010)
	if (count($Ngay_arr)==3) {
		$ngay = $Ngay_arr[0]; //17
		$thang = $Ngay_arr[1]; //11
		$nam = $Ngay_arr[2]; //2010
		if (checkdate($thang,$ngay,$nam)==false){ $coloi=true; $error_ngaysinh = "Bạn nhập chưa đúng ngày sinh<br>";} else $ngayketthuc=$nam."-".$thang."-".$ngay;
	}	
		$where.=" and ngaytao<=".strtotime($ngayketthuc)." ";
		
	}

	
	if($_GET["keyword"]!=''){
		$where.=" and (madonhang like '%".$_GET["keyword"]."%' or hoten like '%".$_GET["keyword"]."%' )  ";
	}
	//sotien
	if($_GET["sotien"]!='' && $_GET["sotien"]>0){
		$sql="select giatu,giaden from #_giasearch where id='".$_GET["sotien"]."'";
		$d->query($sql);
		$giatim=$d->fetch_array();
		if($giatim!=null){
			$where.=" and tonggia>=".$giatim['giatu']." and tonggia<=".$giatim['giaden']." ";			
		}
	}
	//httt
	if($_GET["httt"]!='' && $_GET["httt"] > 0){
		$where.=" and httt=".$_GET["httt"]." ";
	}
	//tinhtrang
	if($_GET["tinhtrang"]!='' && $_GET["tinhtrang"]>0){
		$where.=" and trangthai=".$_GET["tinhtrang"]." ";
	}

								
	$sql="SELECT count(id) AS numrows FROM #_order $where";
	$d->query($sql);	
	$dem=$d->fetch_array();
	$totalRows=$dem['numrows'];
	$page=$_GET['p'];
	
	$pageSize=10;
	$offset=5;
						
	if ($page=="")
		$page=1;
	else 
		$page=$_GET['p'];
	$page--;
	$bg=$pageSize*$page;		
	
	$sql = "select * from #_order $where order by hoten asc limit $bg,$pageSize";		
	$d->query($sql);
	$items = $d->result_array();
	$soluong_order=count($items);
	
	$url_link='index.php?com=thongke&act=thongke_soluongorder';		
	
	
}


	#=========================End Thống Kê Số Lượng Đơn Hàng==========================#	
	
	
	
	
		#=========================START Thống Kê Tổng giá Đơn Hàng==========================#	
function get_thongke_sumpriceorders(){
	
	//global $d, $items, $paging, $url_back ,$url_link,$totalRows , $pageSize, $offset,$config_more_proview;

	global $d, $items, $url_link,$totalRows , $pageSize, $offset,$soluong_order;
	
	if(!empty($_POST)){
		$multi=$_REQUEST['multi'];
		$id_array=$_POST['iddel'];
		$count=count($id_array);				
		if($multi=='del'){
			for($i=0;$i<$count;$i++){
								
				
				$sql = "delete from #_order_detail where id_order 	='".$id_array[$i]."'";
				$d->query($sql);
		
				$sql = "delete from table_order where id = '".$id_array[$i]."'";
				mysql_query($sql) or die("Not query sqlUPDATE_ORDER");			
							
			}
			redirect("index.php?com=thongke&act=thongke_sumpriceorder&type=".$_REQUEST['type']);			
		}
		
		
	}
	
	$where=" where id<> 0 "; 
	if($_GET["ngaybd"]!=''){
	$ngaybatdau = $_GET["ngaybd"];		
	$Ngay_arr = explode("/",$ngaybatdau); // array(17,11,2010)
	if (count($Ngay_arr)==3) {
		$ngay = $Ngay_arr[0]; //17
		$thang = $Ngay_arr[1]; //11
		$nam = $Ngay_arr[2]; //2010
		if (checkdate($thang,$ngay,$nam)==false){ $coloi=true; $error_ngaysinh = "Bạn nhập chưa đúng ngày sinh<br>";} else $ngaybatdau=$nam."-".$thang."-".$ngay;
	}	
		$where.=" and ngaytao>=".strtotime($ngaybatdau)." ";
	}

	if($_GET["ngaykt"]!=''){
	$ngayketthuc = $_GET["ngaykt"];		
	$Ngay_arr = explode("/",$ngayketthuc); // array(17,11,2010)
	if (count($Ngay_arr)==3) {
		$ngay = $Ngay_arr[0]; //17
		$thang = $Ngay_arr[1]; //11
		$nam = $Ngay_arr[2]; //2010
		if (checkdate($thang,$ngay,$nam)==false){ $coloi=true; $error_ngaysinh = "Bạn nhập chưa đúng ngày sinh<br>";} else $ngayketthuc=$nam."-".$thang."-".$ngay;
	}	
		$where.=" and ngaytao<=".strtotime($ngayketthuc)." ";
		
	}

	
	if($_GET["keyword"]!=''){
		$where.=" and (madonhang like '%".$_GET["keyword"]."%' or hoten like '%".$_GET["keyword"]."%' )  ";
	}
	//sotien
	if($_GET["sotien"]!='' && $_GET["sotien"]>0){
		$sql="select giatu,giaden from #_giasearch where id='".$_GET["sotien"]."'";
		$d->query($sql);
		$giatim=$d->fetch_array();
		if($giatim!=null){
			$where.=" and tonggia>=".$giatim['giatu']." and tonggia<=".$giatim['giaden']." ";			
		}
	}
	//httt
	if($_GET["httt"]!='' && $_GET["httt"] > 0){
		$where.=" and httt=".$_GET["httt"]." ";
	}
	//tinhtrang
	if($_GET["tinhtrang"]!='' && $_GET["tinhtrang"]>0){
		$where.=" and trangthai=".$_GET["tinhtrang"]." ";
	}

								
	$sql="SELECT count(id) AS numrows FROM #_order $where and trangthai=4";
	$d->query($sql);	
	$dem=$d->fetch_array();
	$totalRows=$dem['numrows'];
	$page=$_GET['p'];

	
	$pageSize=10;	//chọn 10 sản phẩm hiển thị trang đầu còn lại tiến hàng phân trang
	$offset=5;
						
	if ($page=="")
		$page=1;
	else 
		$page=$_GET['p'];
	$page--;
	$bg=$pageSize*$page;		
	
	$sql = "select * from #_order $where and trangthai=4 order by id desc limit $bg,$pageSize";		
	$d->query($sql);
	$items = $d->result_array();
	$soluong_order=count($items);
	
	$url_link='index.php?com=thongke&act=thongke_sumpriceorder';		
	
	
}


	#=========================End Thống Kê Tổng giá Đơn Hàng==========================#	
	
	




	
#=========================START Thống Kê Tổng lãi Đơn Hàng==========================#	

function get_thongke_lai_orders(){
	
	//global $d, $items, $paging, $url_back ,$url_link,$totalRows , $pageSize, $offset,$config_more_proview;

	global $d, $items, $url_link,$totalRows , $pageSize, $offset,$soluong_order;
	
	if(!empty($_POST)){
		$multi=$_REQUEST['multi'];
		$id_array=$_POST['iddel'];
		$count=count($id_array);				
		if($multi=='del'){
			for($i=0;$i<$count;$i++){
								
				
				$sql = "delete from #_order_detail where id_order 	='".$id_array[$i]."'";
				$d->query($sql);
		
				$sql = "delete from table_order where id = '".$id_array[$i]."'";
				mysql_query($sql) or die("Not query sqlUPDATE_ORDER");			
							
			}
			redirect("index.php?com=thongke&act=thongke_lai_orders&type=".$_REQUEST['type']);			
		}
		
		
	}
	
	$where=" where id<> 0 "; 
	if($_GET["ngaybd"]!=''){
	$ngaybatdau = $_GET["ngaybd"];		
	$Ngay_arr = explode("/",$ngaybatdau); // array(17,11,2010)
	if (count($Ngay_arr)==3) {
		$ngay = $Ngay_arr[0]; //17
		$thang = $Ngay_arr[1]; //11
		$nam = $Ngay_arr[2]; //2010
		if (checkdate($thang,$ngay,$nam)==false){ $coloi=true; $error_ngaysinh = "Bạn nhập chưa đúng ngày sinh<br>";} else $ngaybatdau=$nam."-".$thang."-".$ngay;
	}	
		$where.=" and ngaytao>=".strtotime($ngaybatdau)." ";
	}

	if($_GET["ngaykt"]!=''){
	$ngayketthuc = $_GET["ngaykt"];		
	$Ngay_arr = explode("/",$ngayketthuc); // array(17,11,2010)
	if (count($Ngay_arr)==3) {
		$ngay = $Ngay_arr[0]; //17
		$thang = $Ngay_arr[1]; //11
		$nam = $Ngay_arr[2]; //2010
		if (checkdate($thang,$ngay,$nam)==false){ $coloi=true; $error_ngaysinh = "Bạn nhập chưa đúng ngày sinh<br>";} else $ngayketthuc=$nam."-".$thang."-".$ngay;
	}	
		$where.=" and ngaytao<=".strtotime($ngayketthuc)." ";
		
	}

	
	if($_GET["keyword"]!=''){
		$where.=" and (madonhang like '%".$_GET["keyword"]."%' or hoten like '%".$_GET["keyword"]."%' )  ";
	}
	//sotien
	if($_GET["sotien"]!='' && $_GET["sotien"]>0){
		$sql="select giatu,giaden from #_giasearch where id='".$_GET["sotien"]."'";
		$d->query($sql);
		$giatim=$d->fetch_array();
		if($giatim!=null){
			$where.=" and tonggia>=".$giatim['giatu']." and tonggia<=".$giatim['giaden']." ";			
		}
	}
	//httt
	if($_GET["httt"]!='' && $_GET["httt"] > 0){
		$where.=" and httt=".$_GET["httt"]." ";
	}
	//tinhtrang
	if($_GET["tinhtrang"]!='' && $_GET["tinhtrang"]>0){
		$where.=" and trangthai=".$_GET["tinhtrang"]." ";
	}

								
	$sql="SELECT count(id) AS numrows FROM #_order $where and trangthai=4";
	$d->query($sql);	
	$dem=$d->fetch_array();
	$totalRows=$dem['numrows'];
	$page=$_GET['p'];
	
	$pageSize=10;
	$offset=5;
						
	if ($page=="")
		$page=1;
	else 
		$page=$_GET['p'];
	$page--;
	$bg=$pageSize*$page;		
	
	$sql = "select * from #_order $where  and trangthai=4 order by id desc limit $bg,$pageSize";		
	$d->query($sql);
	$items = $d->result_array();
	$soluong_order=count($items);
	
	$url_link='index.php?com=thongke&act=thongke_lai_orders';		
	
	
}


	#=========================End Thống Kê Tổng lãi Đơn Hàng==========================#	
	
		
	


?>