<?php
error_reporting(0);
	session_start();
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
	
	
	$email = ($_REQUEST['email_newsletter']);
	$gender = ($_REQUEST['gender']);
	
		
	$sql = "select * from #_newsletter where email='".$email."'";
	$d->query($sql);
	
	if( $d->num_rows() > 0 )
		{
			
					echo 0;	
			
		}
		
		else if( $d->num_rows() <> 1 )
		{
			
		$d->reset();
		$sql = "insert into #_newsletter (email,hoten,sex,stt,hienthi,ngaytao) value('$email','$hoten','$gender',1,1,".time().")";
		$d->query($sql);
		
	
					echo 1;	
			
		}
		else
		{
			echo 0;
	
		}


?>