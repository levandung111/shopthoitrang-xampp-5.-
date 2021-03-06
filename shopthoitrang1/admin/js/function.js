// JavaScript Document
$(document).ready(function(e) {
    $('#validate textarea[name="description_vi"]').keyup(function(){
		var num_vn = $(this).val().length;
		$('input[name="deschar_vi"]').val(num_vn);
	})	
	
	
	
	$('#validate textarea[name="description_en"]').keyup(function(){
		var num_en = $(this).val().length;
		$('input[name="deschar_en"]').val(num_en);
	})	
	
	
	
	$('#validate textarea[name="description_cn"]').keyup(function(){
		var num_cn = $(this).val().length;
		$('input[name="deschar_cn"]').val(num_cn);
	})	
	
	
	$('#validate textarea[name="description_ge"]').keyup(function(){
		var num_ge = $(this).val().length;
		$('input[name="deschar_ge"]').val(num_ge);
	})	
	
});

function CreateTitleSEO(){
	var f = document.getElementById("validate");
	
	ten_vi = f.ten_vi.value;
	
	ten_en = f.ten_en.value;

	

	ten_cn = f.ten_cn.value;
	
	ten_ge = f.ten_ge.value;
	

	//name_en = f.name_en.value;
	
	
	f.h1_vi.value = ten_vi;
	
	
	f.h1_en.value = ten_en;
	
	f.h1_cn.value = ten_cn;
	
	f.h1_ge.value = ten_ge;
	
	f.h2_vi.value = ten_vi;
	
	f.h2_en.value = ten_en;
	
	f.h2_cn.value = ten_cn;
	
	f.h2_ge.value = ten_ge;
	
	f.title_vi.value = ten_vi;
	f.title_en.value = ten_en;
	
	f.title_cn.value = ten_cn;
	f.title_ge.value = ten_ge;
	
	
	
	f.alt_vi.value = ten_vi;
	f.alt_en.value = ten_en;
	
	f.alt_cn.value = ten_cn;
	f.alt_ge.value = ten_ge;
	
	//f.title_en.value = name_en;
	
	f.keyword_vi.value = ten_vi.toLowerCase() + ", " + StripVi(name).toLowerCase();
	
	
	f.keyword_en.value = ten_en.toLowerCase() + ", " + StripVi(name).toLowerCase();
	
	
	f.keyword_cn.value = ten_cn.toLowerCase() + ", " + StripVi(name).toLowerCase();
	
	
	f.keyword_ge.value = ten_ge.toLowerCase() + ", " + StripVi(name).toLowerCase();
	
	//f.keyword_en.value = name_en.toLowerCase();
	
	f.description_vi.value = f.mota_vi.value;
	
	f.description_en.value = f.mota_en.value;
	
	f.description_cn.value = f.mota_cn.value;
	
	f.description_ge.value = f.mota_ge.value;
	
	//f.des_en.value = f.short_en.value;

	//f.unique_key.value = StripVi2(f.name.value).toLowerCase();
	//f.unique_key_en.value = StripVi2(f.name_en.value).toLowerCase();
	
	f.deschar_vi.value = f.mota_vi.value.length;
	
	f.deschar_en.value = f.mota_en.value.length;
	
	f.deschar_cn.value = f.mota_cn.value.length;
	
	f.deschar_ge.value = f.mota_ge.value.length;
	
	//f.des_en_char.value = f.short_en.value.length;
}

function CreateTitleSEOWidthTag(){
	var f = document.getElementById("validate");
	
	ten_vi = f.ten_vi.value;
	
	ten_en = f.ten_en.value;
	
	ten_cn = f.ten_cn.value;
	
	ten_ge = f.ten_ge.value;
	
	//name_en = f.name_en.value;
	
	
	f.h1_vn.value = ten_vi;
	f.h1_en.value = ten_en;
	f.h1_cn.value = ten_cn;
	f.h1_ge.value = ten_ge;
	
	
	f.h2_vn.value = ten_vi;
	f.h2_en.value = ten_en;
	f.h2_cn.value = ten_cn;
	f.h2_ge.value = ten_ge;
	
	
	f.title_vn.value = ten_vi;
	
	f.title_en.value = ten_en;
	
	
	f.title_cn.value = ten_cn;
	
	f.title_ge.value = ten_ge;
	
	
	f.alt_vn.value = ten_vi;
	
	f.alt_en.value = ten_en;
	
	f.alt_cn.value = ten_cn;
	
	f.alt_ge.value = ten_ge;
	
	//f.title_en.value = name_en;
	
	if (f.tags.value)
		f.keyword_vn.value = f.keyword_vi.value = f.tags.value;
		
	else
	{
		f.keyword_vn.value = name.toLowerCase() + ", " + StripVi(name).toLowerCase();
		//f.keyword_en.value = name_en.toLowerCase();
	}
	
	
	if (f.tags.value)
		f.keyword_en.value = f.keyword_en.value = f.tags.value;
		
	else
	{
		f.keyword_en.value = name.toLowerCase() + ", " + StripVi(name).toLowerCase();
		//f.keyword_en.value = name_en.toLowerCase();
	}
	
	
	if (f.tags.value)
		f.keyword_cn.value = f.keyword_cn.value = f.tags.value;
		
	else
	{
		f.keyword_cn.value = name.toLowerCase() + ", " + StripVi(name).toLowerCase();
		//f.keyword_en.value = name_en.toLowerCase();
	}
	
	
	if (f.tags.value)
		f.keyword_ge.value = f.keyword_ge.value = f.tags.value;
		
	else
	{
		f.keyword_ge.value = name.toLowerCase() + ", " + StripVi(name).toLowerCase();
		//f.keyword_en.value = name_en.toLowerCase();
	}
	
	f.des_vn.value = f.short_vn.value;
	
	f.des_en.value = f.short_en.value;
	
	
	f.des_cn.value = f.short_cn.value;
	
	f.des_ge.value = f.short_ge.value;
	//f.des_en.value = f.short_en.value;

	f.unique_key_vn.value = StripVi2(f.name.value).toLowerCase();
	
	f.unique_key_en.value = StripVi2(f.name.value).toLowerCase();
	
	f.unique_key_cn.value = StripVi2(f.name.value).toLowerCase();
	
	f.unique_key_ge.value = StripVi2(f.name.value).toLowerCase();
	
	//f.unique_key_en.value = StripVi2(f.name_en.value).toLowerCase();
	
	f.des_vn_char.value = f.short_vn.value.length;
	
	f.des_en_char.value = f.short_en.value.length;
	
	f.des_cn_char.value = f.short_cn.value.length;
	
	f.des_ge_char.value = f.short_ge.value.length;
	//f.des_en_char.value = f.short_en.value.length;
}

function StripVi(str) {
  str= str.toLowerCase();
  str= str.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/g,"a");
  str= str.replace(/??|??|???|???|???|??|???|???|???|???|???/g,"e");
  str= str.replace(/??|??|???|???|??/g,"i");
  str= str.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/g,"o");
  str= str.replace(/??|??|???|???|??|??|???|???|???|???|???/g,"u");
  str= str.replace(/???|??|???|???|???/g,"y");
  str= str.replace(/??/g,"d");
  str= str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'||\"|\&|\#|\[|\]|~|$|_/g,"");
	/* t??m v?? thay th??? c??c k?? t??? ?????c bi???t trong chu???i sang k?? t??? - */
  str= str.replace(/-+-/g,"-"); //thay th??? 2- th??nh 1-
  str= str.replace(/^\-+|\-+$/g,"");
	//c???t b??? k?? t??? - ??? ?????u v?? cu???i chu???i
  return str;
  } 
function StripVi2(str) {
  str= str.toLowerCase();
  str= str.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/g,"a");
  str= str.replace(/??|??|???|???|???|??|???|???|???|???|???/g,"e");
  str= str.replace(/??|??|???|???|??/g,"i");
  str= str.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/g,"o");
  str= str.replace(/??|??|???|???|??|??|???|???|???|???|???/g,"u");
  str= str.replace(/???|??|???|???|???/g,"y");
  str= str.replace(/??/g,"d");
  str= str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\`|\&|\#|\[|\]|~|\$|_/g,"-");
/* t??m v?? thay th??? c??c k?? t??? ?????c bi???t trong chu???i sang k?? t??? - */
  str= str.replace(/-+-/g,"-"); //thay th??? 2- th??nh 1-
  str= str.replace(/^\-+|\-+$/g,"");
	//c???t b??? k?? t??? - ??? ?????u v?? cu???i chu???i
  return str;
  }
function OnlyNumber(evt)
{
 var charCode = (evt.which) ? evt.which : event.keyCode
 if (charCode > 47 && charCode < 58)
	return true;

 return false;
}
 function StripTag(str) {
	  str= str.toLowerCase();
	  str= str.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/g,"a");
	  str= str.replace(/??|??|???|???|???|??|???|???|???|???|???/g,"e");
	  str= str.replace(/??|??|???|???|??/g,"i");
	  str= str.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/g,"o");
	  str= str.replace(/??|??|???|???|??|??|???|???|???|???|???/g,"u");
	  str= str.replace(/???|??|???|???|???/g,"y");
	  str= str.replace(/??/g,"d");
	  str= str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|\.|\:|\;|\'| |\"|\`|\&|\#|\[|\]|~|$|_/g,"-");
	/* t??m v?? thay th??? c??c k?? t??? ?????c bi???t trong chu???i sang k?? t??? - */
	  str= str.replace(/-+-/g,"-"); //thay th??? 2- th??nh 1-
		str= str.replace(/-+,/g,",");
		str= str.replace(/,+-/g,",");
	  str= str.replace(/^\-+|\-+$/g,"");
		//c???t b??? k?? t??? - ??? ?????u v?? cu???i chu???i
	  return str;
} 


  function Action_Delete_Img(str){
    if(confirm("B???n c?? ch???c ch???n mu???n x??a ???nh hi???n t???i ?"))
    {
      document.supplier.action = str;
      document.supplier.submit();
    }
  } 