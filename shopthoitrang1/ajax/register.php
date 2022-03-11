<?php
	session_start();
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$session=session_id();
	@define ( '_template' , '../templates/');
	@define ( '_source' , '../sources/');
	@define ( '_lib' , '../libraries/');
	@define ( _upload_folder , '../media/upload/' );
	
	//Lưu ngôn ngữ chọn vào $_SESSION
	$lang_arr=array("vi","en","ge");
	if (isset($_GET['lang']) == true){
        if (in_array($_GET['lang'], $lang_arr)==true){
            $lang = $_GET['lang'];
            $_SESSION['lang']=$lang;
		  header('Location: '.$_SERVER['HTTP_REFERER']);
        } 
	}
    if(isset($_SESSION['lang'])){
        $lang= $_SESSION['lang'];
    }else{
        $lang="vi";
    }
	require_once _source."lang_$lang.php";	
	
    include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."functions_giohang.php";
	
	include_once _lib."library.php";
	include_once _lib."class.database.php";	
	
	include_once _lib."file_requick.php";
	$d = new database($config['database']);
	
	
	function fns_Rand_digit($min,$max,$num)
		{
			$result='';
			for($i=0;$i<$num;$i++){
				$result.=rand($min,$max);
			}
			return $result;	
		}
	


		/*$d->reset();
		$d->setTable('user');
		$d->setWhere('email', $_REQUEST['email']);
		$d->select();*/
		
		$sql = "select * from #_user where email='".$_REQUEST['email']."'  and ((com='member'  and mauser!='') )";
		$d->query($sql);
		
		if($d->num_rows()>0){
			echo 2; // trùng email or phone
			exit();
		}else{
			

			$maso = ChuoiNgauNhien(20);
			$mastv = fns_Rand_digit(0,5,5);
			$linkweb = $row_setting["website"];

		

			$data['password'] = md5($_REQUEST['pass']);
			$data['email'] = ($_REQUEST['email']);
			$email_dk = $_REQUEST['email'];
			$data['user'] = $maso;
			$data['mauser'] = $mastv;
			$data['hoten'] = ($_REQUEST['name']);
			$data['ngaysinh'] = strtotime($_POST['ngaysinh']);
			$data['sex'] = ($_REQUEST['gender']);
	
			$data['diachi'] = ($_REQUEST['diachi']);
			$data['dienthoai'] = ($_REQUEST['dienthoai']);
			
			$data['ngaydangky'] = time();
			
	

			$data['hienthi'] = 1;
			$data1['stt'] = 1;
			$data['role'] = 1;
			$data['com'] = "member";
			$d->setTable('user');
			

	
			
			
	
			if($d->insert($data))
			{
				
				
				
				$_SESSION['login_member']['email'] = $data['email'];
				$_SESSION['login_member']['phone'] = $data['dienthoai'];
				$_SESSION['login_member']['hoten'] = $data['hoten'];
				$_SESSION['login_member']['active'] = $data['hienthi'];
				$_SESSION['login_member']['user'] = $data['user'];
				$_SESSION['login_member']['mauser'] = $data['mauser'];
				$_SESSION['login_member']['role'] = 1;
				$_SESSION['login_member']['id'] = mysql_insert_id();

				echo 1; //Thành công
				exit();

			}
			else
			{
				echo 3; //Thất bại insert
				exit();
			}
		}
	
		
	
	
	?>

