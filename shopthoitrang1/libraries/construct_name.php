<?php if(!@defined('_lib')) die("Error");
/////////////////////////////////////////////////////// Khai Báo Biến Thay Đổi Tên ////////////////////////////////////////////


	$btn_them_active=""; // Nếu $btn_them_active="on" là có sử dụng  
	$btn_hien_active=""; // Nếu $btn_hien_active="on" là có sử dụng  
	$btn_an_active=""; // Nếu $btn_an_active="on" là có sử dụng  
	$btn_xoa_active=""; // Nếu $btn_xoa_active="on" là có sử dụng  
	$check_rating=""; // rating
	$kichthuoc_image=""; // Đặt kích thước ảnh 
	$name_photo=""; // Đặt tiêu đề cho mục hình ảnh
	$name_cap=""; // Đặt tiêu đề cho danh mục và bài viết
	$image_active=""; // Nếu $image_active="on" là có sử dụng add ảnh 

	if ($_GET["com"]=="product" || $_REQUEST['typeparent']=='product' || $_REQUEST['typechild']=='product') //dùng GET để lấy dữ liệu và hiển thị
	{


		//Thêm Cấp 1


		if($_REQUEST['typeparent']=='product' && ($_GET["act"]=="man_list" ||  $_GET["act"]=="add_list") )
		{

			$kichthuoc_image="Width: 380px - Height: 250px";
			$name_cap="Thêm Danh Mục Sản Phẩm Cấp 1";
			$icon_active="off";
			$image_active="off";
			$check_httc="on";
			
		}



		//Sửa Cấp 1


		if($_REQUEST['typeparent']=='product' && $_GET["act"]=="edit_list" )
		{

			$kichthuoc_image="Width: 380px - Height: 250px";
			$name_cap="Sửa Danh Mục Sản Phẩm Cấp 1";
			$image_active="off";
			$icon_active="off";
			
		}



		//Thêm Cấp 2


		if($_REQUEST['typeparent']=='product' && ($_GET["act"]=="man_cat" ||  $_GET["act"]=="add_cat") )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thêm Danh Mục Sản Phẩm Cấp 2";
			$image_active="off";
			$check_httc="on";
			
		}



		//Sửa Cấp 2


		if($_REQUEST['typeparent']=='product' && $_GET["act"]=="edit_cat" )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Danh Mục Sản Phẩm Cấp 2";
			$image_active="off";
			$check_httc="on";
			
		}





		//Thêm Cấp 3


		if($_REQUEST['typeparent']=='product' &&  ($_GET["act"]=="man_item" || $_GET["act"]=="add_item") )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thêm Danh Mục Sản Phẩm Cấp 3";
			$image_active="off";
			
		}



		//Sửa Cấp 3


		if($_REQUEST['typeparent']=='product' && $_GET["act"]=="edit_item")
		{ 

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Danh Mục Sản Phẩm Cấp 3";
			$image_active="off";
			
		}






		//Thêm Cấp 4


		if($_REQUEST['typeparent']=='product' && ($_GET["act"]=="man_sub" || $_GET["act"]=="add_sub") )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thêm Danh Mục Sản Phẩm Cấp 4";
			$image_active="on";
			
		}



		//Sửa Cấp 4


		if($_REQUEST['typeparent']=='product' && $_GET["act"]=="edit_sub")
		{ 

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Danh Mục Sản Phẩm Cấp 4";
			$image_active="on";
			
		}





		//Thêm Danh Sach San Pham


		if($_REQUEST['typechild']=='product'  && ($_GET["act"]=="man" || $_GET["act"]=="add" ) )
		{

			$kichthuoc_image="Width: 600px - Height: 750px";
			$name_cap="Thêm Danh Sách Sản Phẩm ";
			$image_active="on";
			$mutile_image_active="on";

			$check_rating="off";


			$mota_active ="on";
			$noidung_active="on";

			$danhmuc_cap1="on";
			$danhmuc_cap2="on";
			$danhmuc_cap3="on";
			$danhmuc_cap4="off";


			$check_moi="on";


			$check_noibat="on";


			$btn_them_active="on";  
			$btn_hien_active="on"; 
			$btn_an_active="on"; 
			$btn_sua_active="on"; 
			$btn_xoa_active="on"; 
			
		}



		//Sửa Danh Sách Sản Phẩm


		if($_REQUEST['typechild']=='product' &&  $_GET["act"]=="edit")
		{ 

			$kichthuoc_image="Width: 600px - Height: 750px";
			$name_cap="Sửa Danh Sách Sản Phẩm";
			$image_active="on";
			$mutile_image_active="on";

			$check_rating="off";


			$mota_active ="on";
			$noidung_active="on";

			$danhmuc_cap1="on";
			$danhmuc_cap2="on";
			$danhmuc_cap3="on";
			$danhmuc_cap4="off";




			$btn_them_active="on";  
			$btn_hien_active="on"; 
			$btn_an_active="on"; 
			$btn_sua_active="on"; 
			$btn_xoa_active="on"; 
			
		}
	





	}





/***********************************************************Start Muc Luc Tin Tức ********************************************/


	if ($_GET["com"]=="news")
	{


		//Thêm Cấp 1


		if($_REQUEST['typeparent']=='news' &&  ( $_GET["act"]=="man_list" || $_GET["act"]=="add_list") )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thêm Danh Mục Tin Cấp 1";
			$image_active="off";
			$menutop_active="on";
			$rename_menutop="Nhóm Menu top";
			
			$nhomtin_active="on";
			$rename_nhomtin="Nhóm Tin Nổi Bật";
			
		}



		//Sửa Cấp 1


		if($_REQUEST['typeparent']=='news' && $_GET["act"]=="edit_list" )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Danh Mục Tin Cấp 1";
			$image_active="off";
			$menutop_active="on";
			$rename_menutop="Nhóm Menu top";
			
			$nhomtin_active="on";
			$rename_nhomtin="Nhóm Tin Nổi Bật";
			
		}



		//Thêm Cấp 2


		if($_REQUEST['typeparent']=='news' && ( $_GET["act"]=="man_cat" || $_GET["act"]=="add_cat") )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thêm Danh Mục Tin Cấp 2";
			$image_active="off";
			
		}



		//Sửa Cấp 2


		if($_REQUEST['typeparent']=='news' && $_GET["act"]=="edit_cat" )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Danh Mục Tin Cấp 2";
			$image_active="off";
			
		}





			//Thêm Cấp 3


		if($_REQUEST['typeparent']=='news' && ($_GET["act"]=="man_item" || $_GET["act"]=="add_item") )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thêm Danh Mục Tin Cấp 3";
			$image_active="on";
			
		}



		//Sửa Cấp 3


		if($_REQUEST['typeparent']=='news' && $_GET["act"]=="edit_item"  )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Danh Mục Tin Cấp 3";
			$image_active="on";
			
		}




		//Thêm Cấp 4


		if($_REQUEST['typeparent']=='news' && ( $_GET["act"]=="man_sub" || $_GET["act"]=="add_sub") )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thêm Danh Mục Tin Cấp 4";
			$image_active="on";
			
		}



		//Sửa Cấp 4


		if($_REQUEST['typeparent']=='news' && $_GET["act"]=="edit_sub" )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Danh Mục Tin Cấp 4";
			$image_active="on";
			
		}



		//Thêm Danh Sách Tin 


		if($_REQUEST['typechild']=='news' && $_GET["act"]=="man" || $_GET["act"]=="add")
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thêm Danh Sách Tin";
		

			$btn_them_active="on";  
			$btn_hien_active="on"; 
			$btn_an_active="on"; 
			$btn_sua_active="on"; 
			$btn_xoa_active="on"; 

			$check_tinnoibat="on";
			$rename_tinnoibat="Tin nổi bật";

			$check_tinmoi="off"; 
			$rename_tinmoi="Tin mới"; 

			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";
			
			$image_active ="on";
			$mutile_image_active="off";

			$mota_active ="on";
			$noidung_active="on";
			
		}



		//Sửa Danh Sách Tin 


		if($_REQUEST['typechild']=='news' && $_GET["act"]=="edit" )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Danh Sách Tin";
			
			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";

			$image_active="on";
			$mutile_image_active="off";


			$mota_active ="on";
			$noidung_active="on";

			
		}



	}


	/***********************************************************End Muc Luc Tin Tức ********************************************/


	//Thêm Cấp 1


		if($_REQUEST['typeparent']=='dichvu' &&  ( $_GET["act"]=="man_list" || $_GET["act"]=="add_list") )
		{

			$kichthuoc_image="Width: 365px - Height: 245px";
			$name_cap="Thêm Danh Dịch vụ Cấp 1";
			$image_active="on";
			$nhomtin_active="on";
			$rename_nhomtin="Nhóm Tin Nổi Bật";
			$mota_active ="on";
			
		}



		//Sửa Cấp 1


		if($_REQUEST['typeparent']=='dichvu' && $_GET["act"]=="edit_list" )
		{

			$kichthuoc_image="Width: 365px - Height: 245px";
			$name_cap="Sửa Danh Dịch vụ Cấp 1";
			$image_active="on";
			$nhomtin_active="on";
			$rename_nhomtin="Nhóm Tin Nổi Bật";
			$mota_active ="on";
			
		}




		//Thêm Danh Sách Tin 


		if($_REQUEST['typechild']=='dichvu' && ($_GET["act"]=="man" || $_GET["act"]=="add") )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thêm Danh Sách Dịch vụ";
		

			$btn_them_active="on";  
			$btn_hien_active="on"; 
			$btn_an_active="on"; 
			$btn_sua_active="on"; 
			$btn_xoa_active="on"; 

			$check_tinnoibat="on";
			$rename_tinnoibat="Tin nổi bật";

			$check_tinmoi="off"; 
			$rename_tinmoi="Tin mới"; 

			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";
			
			$image_active ="on";
			$mutile_image_active="off";

			$mota_active ="on";
			$noidung_active="on";
			
		}



		//Sửa Danh Sách Tin 


		if($_REQUEST['typechild']=='dichvu' && $_GET["act"]=="edit" )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Danh Sách Dịch vụ";
			
			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";

			$image_active="on";
			$mutile_image_active="off";


			$mota_active ="on";
			$noidung_active="on";

			
		}



/***********************************************************Start Muc Luc Cập Nhật Nhiều Bài Viết ********************************************/	


	if ($_GET["com"]=="news"  )
	{
		
		
		
		
		

		





		//Thêm Danh Sách Tin 
		
		if($_REQUEST['typechild']=='httt' &&  ($_GET["act"]=="man" || $_GET["act"]=="add" ) )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thêm Hình thức thanh toán";
			
			$image_active ="off";
			$mutile_image_active="off";


			$mota_active ="off";
			$noidung_active="on";

			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";

			$check_tinnoibat="off";
			$rename_tinnoibat="Tin nổi bật";

			$check_tinmoi="off"; 
			$rename_tinmoi="Tin mới"; 


			$btn_them_active="on";  
			$btn_hien_active="on"; 
			$btn_an_active="on"; 
			$btn_sua_active="on"; 
			$btn_xoa_active="on"; 
			
		}



		//Sửa Danh Sách Tin 


		if($_REQUEST['typechild']=='httt' && $_GET["act"]=="edit" )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Hình thức thanh toán";
			
			$image_active="off";
			$mutile_image_active="off";

			$mota_active ="off";
			$noidung_active="on";

			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";



			
		}




		






	}



/***********************************************************End Muc Luc Cập Nhật Nhiều Bài Viết ********************************************/	



	/***********************************************************Start Muc Luc Cập Nhật 1 Bài Viết ********************************************/


	if ($_GET["com"]=="info")
	{


		// Cập nhật 1 bài viết

		if($_REQUEST['typechild']=='gioithieu' && ( $_GET["act"]=="man" || $_GET["act"]=="capnhat") )
		{

			$kichthuoc_image="Width: 545px - Height: 340px";
			$name_cap="Giới thiệu";
			$image_active="off";
			$tieude_active="off";
			$mota_active="off";
			$noidung_active="on";
			
		}


		if($_REQUEST['typechild']=='footer' && ($_GET["act"]=="man" || $_GET["act"]=="capnhat") )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Footer";
			$image_active="off";
			$tieude_active="off";
			$mota_active="off";
			$noidung_active="on";
			
		}


		if($_REQUEST['typechild']=='lienhe' && ($_GET["act"]=="man" || $_GET["act"]=="capnhat") )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Liên hệ";
			$image_active="off";
			$tieude_active="off";
			$mota_active="off";
			$noidung_active="on";
			
		}

		
		
		
	
		


	}
			
	
	/***********************************************************END Muc Luc Cập Nhật Bài Viết ********************************************/




	/***********************************************************Start Muc Luc Hình ảnh và Link ********************************************/





	if ($_GET["com"]=="image_url")
	{




		
		

		if($_REQUEST['typechild']=='slider')
		{
			$kichthuoc_image="Width: 1366px - Height: 485px";
			$name_photo="Slide Show";

			$mota_active="off";
			$link_active="on";
			$image_active="on";

			$btn_them_active="on";
			$btn_hien_active="on";
			$btn_an_active="on";
			$btn_sua_active="on"; 
			$btn_xoa_active="on";
		}	
		
		
		


		

		

		if($_REQUEST['typechild']=='mangxahoi')
		{
			$kichthuoc_image="Width: 40px - Height: 40px";
			$name_photo="Mạng Xã Hội Top";
			$image_active="on";

			$mota_active="off";
			$link_active="on";

			$btn_them_active="on";
			$btn_hien_active="on";
			$btn_an_active="on";
			$btn_sua_active="on"; 
			$btn_xoa_active="on";
		}	
	
	
		if($_REQUEST['typechild']=='mangxahoi_ft')
		{
			$kichthuoc_image="Width: 40px - Height: 40px";
			$name_photo="Mạng Xã Hội Footer";
			$image_active="on";

			$mota_active="off";
			$link_active="on";

			$btn_them_active="on";
			$btn_hien_active="on";
			$btn_an_active="on";
			$btn_sua_active="on"; 
			$btn_xoa_active="on";
		}	



		




	}	


	/***********************************************************END Muc Luc Cập Nhật Bài Viết ********************************************/







	/***********************************************************Start Muc Bản Đồ ********************************************/





	//Thêm Danh Sách Map 
		
		if($_REQUEST['typechild']=='bando' &&  ($_GET["act"]=="man" || $_GET["act"]=="add" ) )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thêm Bản đồ";
			
			$image_active ="off";
			$mutile_image_active="off";

			$toado_active="on";

			$mota_active ="on";
			$noidung_active="off";

			$btn_them_active="on";  
			$btn_hien_active="on"; 
			$btn_an_active="on"; 
			$btn_sua_active="on"; 
			$btn_xoa_active="on"; 
			
		}



		//Sửa Danh Sách Tin 


		if($_REQUEST['typechild']=='bando' && $_GET["act"]=="edit" )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Danh Sách Bản đồ";
			
			$image_active="off";
			$mutile_image_active="off";

			$toado_active="on";

			$mota_active ="on";
			$noidung_active="off";

			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";



			
		}


	/***********************************************************END Muc Bản Đồ ********************************************/





	

	/***********************************************************Start Background ********************************************/

	if ($_GET["com"]=="background")
	{


		// Cập nhật BG WEB 


		if($_REQUEST['typechild']=='bg_banner' && ( $_GET["act"]=="man" || $_GET["act"]=="capnhat") )
		{

			$kichthuoc_image="Width: 1366px - Height: 145px";
			$name_cap="Background Banner top";
			
			
		}
		
		
		if($_REQUEST['typechild']=='bg_header' && ( $_GET["act"]=="man" || $_GET["act"]=="capnhat") )
		{

			$kichthuoc_image="Width: 1366px - Height: 575px";
			$name_cap="Background Header";
			
			
		}


		if($_REQUEST['typechild']=='bg_footer' && ( $_GET["act"]=="man" || $_GET["act"]=="capnhat") )
		{

			$kichthuoc_image="Width: 1366px - Height: 560px";
			$name_cap="Background Footer";
			
			
		}


		if($_REQUEST['typechild']=='bg_web' && ( $_GET["act"]=="man" || $_GET["act"]=="capnhat") )
		{

			$kichthuoc_image="Width: 1366px - Height: 560px";
			$name_cap="Background Web";
			
			
		}

	}













	/***********************************************************Start Muc Luc Cập Nhật Banner ********************************************/


	if ($_GET["com"]=="banner")
	{


		// Cập nhật 1 bài viết

		if($_REQUEST['typechild']=='banner_center' && ( $_GET["act"]=="man" || $_GET["act"]=="capnhat") )
		{

			$kichthuoc_image="Width: 560px - Height: 115px";
			$name_cap="Cập nhật ảnh Banner Center";
			$image_active="on";
			$tieude_active="on";
			$mota_active="on";
			$noidung_active="on";
			
		}



		if($_REQUEST['typechild']=='logo_top' && ( $_GET["act"]=="man" || $_GET["act"]=="capnhat") )
		{

			$kichthuoc_image="Width: 220px - Height:95px";
			$name_cap="Cập nhật ảnh Logo Top";
			$image_active="on";
			$tieude_active="on";
			$mota_active="on";
			$noidung_active="on";
			
		}



		

		
	}
	
	
	/***********************************************************END Muc Luc Cập Nhật Bài Viết ********************************************/

if ($_GET["com"]=="info")
{


	// Cập nhật 1 bài viết

	if($_REQUEST['typechild']=='gioithieu' && ( $_GET["act"]=="man" || $_GET["act"]=="capnhat") )
	{

		$kichthuoc_image="Width: 545px - Height: 340px";
		$name_cap="Giới thiệu";
		$image_active="off";
		$tieude_active="off";
		$mota_active="off";
		$noidung_active="on";

	}


	if($_REQUEST['typechild']=='footer' && ($_GET["act"]=="man" || $_GET["act"]=="capnhat") )
	{

		$kichthuoc_image="Width: 240px - Height: 165px";
		$name_cap="Footer";
		$image_active="off";
		$tieude_active="off";
		$mota_active="off";
		$noidung_active="on";

	}


	if($_GET['com']=='store' && ($_GET["act"]=="add" || $_GET["act"]=="list") )
	{
		$danhmuc_cap1="on";
		$danhmuc_cap2="on";
		$danhmuc_cap3="on";
		$danhmuc_cap4="off";

	}








}
?>