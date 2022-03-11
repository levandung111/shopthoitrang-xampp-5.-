<?php 
if(!defined('_lib')) die("Error");
error_reporting(0);
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');



/* Config Langs */

$config["langs"] = array('vi'=>'Tiếng Việt','en'=>'Tiếng Anh','cn'=>'Tiếng Trung','ge'=>'Tiếng Đức');//định nghĩa các loại tiếng để dùng, chưa hoàn thiện được
//$config['lang']=array('vi','en','cn','ge'); example
$config['lang']=array('vi'); // excute array langs presents
$config['lang_default'] = 'vi'; #Ngôn ngữ mặc định;

if(count($config['lang']) == 1){
	$config['langs'] = array('vi'=>'Nội dung');
}


/* config Connect Mysql  */
$config_folder='localhost/shopthoitrang1';
$config_url=$config_folder;
$config['debug']=-1;    #Bật chế độ debug dành cho developer
$config['database']['servername'] = 'localhost';
$config['database']['username'] = 'root';
$config['database']['password'] = '';
$config['database']['database'] = 'shopthoitrang1';
$config['database']['refix'] = 'table_';

/* ckfinder config */
	
$config['finder']['folder'] = $config_folder;
$config['finder']['dir'] = "/upload/";
$config['ckeditor']['width'] = '900';
$config['ckeditor']['height'] = '450';





?>