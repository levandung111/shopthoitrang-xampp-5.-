<?php if(!defined('_source')) die("Error");
		$title_bar= _lienhe;
		if(!empty($_POST)){
			
			/*if($_SESSION['captcha_code']!= strtoupper($_POST['capcha']))
				{
					transfer("incorrect Security Code", "lien-he.html");
					exit();
				}
				*/
			
			
			$data["hoten"] = $_POST["ten"];
			$data['diachi'] = $_POST['diachi'];
			$data['dienthoai'] = $_POST['dienthoai'];
			$data['email'] = $_POST['email'];
			$data['tieude'] = $_POST['tieude1'];
			$data['noidung'] = $_POST['noidung'];		
			$data['ngaytao'] = time();
			$data['stt'] = 1;
			$data['hienthi'] = 1;
			
			
					
			$d->setTable('contact');
			if($d->insert($data))
			{
				 transfer("Gửi liên hệ thành công!<br/>", "index.html");
			}
			else{
				
				 transfer( "Có lỗi xảy ra!","index.html");
			}
			
			
		}
			$d->reset();
			$sql_contact = "select noidung_$lang,mota_$lang,ten_$lang from #_info where com='lienhe' ";
			$d->query($sql_contact);
			$company_contact = $d->fetch_array();
			
			
			

			
			
	
	$title_tcat=_lienhe;
	
	$d->reset();
	$sql_banner_giua = "select banner_$lang from #_banner where com='banner_top' ";
	$d->query($sql_banner_giua);
	$row_logo = $d->fetch_array();

	$image="http://".$config_url."/"._upload_hinhanh_l.$row_logo["banner_$lang"]."";
	$url_web="http://".$config_url."/"."".$com."".".html";
	
	$description_web=strip_tags($row_setting["title_$lang"]);
			



	
?>