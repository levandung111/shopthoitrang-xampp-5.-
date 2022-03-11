<?php

	$d->reset();
	$sql_banner_giua = "select banner_$lang from #_banner where com='logo_top' ";
	$d->query($sql_banner_giua);
	$row_logo = $d->fetch_array();


	
	
	$d->reset();
	$sql="select ten_$lang,id,link,photo from #_image_url where hienthi=1 and com='mangxahoi' order by stt asc";
	$d->query($sql);
	$mxh_social=$d->result_array();
	
	
	$d->reset();
    $sql="select ten_$lang as ten, tenkhongdau_$lang as tenkhongdau, id,photo from #_news where hienthi=1 and com='news' and tinnoibat>0 order by stt,id desc limit 1";
    $d->query($sql);
    $tintuc_header=$d->result_array();

	
?>

	
<div id="header_top">


<div class="header_top_web">

	<!--div class="left-header">
	
		<h4><?=_tintuc?>:</h4>
		
		<ul>
	
		<?php foreach ($tintuc_header as $i =>$v) {?>
			
			<li><a href="tin-tuc/<?=$v["tenkhongdau"]?>-<?=$v["id"]?>.html"><?=$v["ten"]?></a></li>
			
		<?php }?>	
		
		</ul>
	
	</div!--><!--end left-header-->
	
	
	<div class="right-top-header">
	
		  <?php if(isset($_SESSION['login_member']['id'], $_SESSION['nguyenthitrinh']) ){?>       
        
		<?php 
		
	$d->reset();
	$sql = "select id,hienthi from #_user where hienthi=1 and id='".$_SESSION["login_member"]["id"]."'";	
	$d->query($sql);
	$user_active = $d->fetch_array();
	

		
		?>
        
        <?php }?>
		
		<ul class="regis-login">	
		
		
		
		
	
	<?php if(isset($_SESSION['login_member']['id']) and  ($user_active["hienthi"]==1) ){?>
	
	<div class="selebox_header">
			<span class="name"><a class="regis-login-sesion"><i class="fa fa-user" aria-hidden="true"></i><?=$_SESSION["login_member"]["email"]?><i class="fa fa-angle-down" aria-hidden="true"></i></a> </span>
		   <li><a href="http://<?=$config_url?>/thoat.html"><?=_dangxuat?></a></li>
       
	
    </div><!--end selebox-->
	
	
	<?php  } else {?>
	
	
		
		<li><a href="javascript:void(0);" data-toggle="modal" data-target="#myModal"><i class="fa fa-user" aria-hidden="true"></i> <span><?=_dangky?></span></a></li>
		
		<li><a href="javascript:void(0);" data-toggle="modal" data-target="#myModal"><i class="fa fa-lock" aria-hidden="true"></i> <span><?=_dangnhap?></span></a></li>
		
		
		
		
       
      
    <?php }?>  
	
		
		
		</ul><!--end regis-login-->
		
	
		

	
	
	</div><!--end right-top-header-->
	
	
	<div class="right-header">
	
	<div class="email-header"><img src="images/email.png"> <span>Email:<?=$row_setting["email"]?></span></div>
	
	<div class="hotline-header"><img src="images/tr3.png"> <span>Hotline:<?=$row_setting["hotline"]?></span></div>
	
	</div><!--end right-header-->
	
	<div class="clear"></div>

</div><!--end header_top_web-->

<div class="bg-banner">



	<div class="banner_top">

	<div class="left-banner">


		<div class="logo_web">

		<a href="index.html"><img src="<?=_upload_hinhanh_l.$row_logo["banner_$lang"]?>"  /></a>

		<div class="clear"></div>

		</div><!--end logo_web-->



	</div><!--end left-banner-->


	


	<div class="center-banner">

	   <div class="info-company"> 

	   	  
<div class="bg_input">

<div id="search_frm_<?=$lang?>" class="search_frm" >
            <form action=""  method="get" name="frm_search" id="frm_search" onsubmit="return false;">
                <input type="text" id="search_input" name="keyword" onkeypress="doEnter(event)" value="<?=_valuetk?>" onblur="if(this.value=='') this.value='<?=_valuetk?>'" onfocus="if(this.value =='<?=_valuetk?>') this.value=''" />
               
                <div class="img_search">
   <a href="javascript:void(0);" id="tnSearch" name="searchAct"><?=_timkiem?></a>
  </div><!--end img_search-->
  

            </form>
            <script type="text/javascript">
               
        jQuery(document).ready(function($) {
                        
          $('#tnSearch').click(function(evt){
                        onSearch(evt);
                    });             
                        
         });                  
        
                function onSearch(evt){
                    var keyword = document.frm_search.keyword;
                    if( keyword.value == '' || keyword.value ==='<?=_valuetk?>' && keyword.value==sql_escape(keyword.value)){alert('<?=_banchuanhaptukhoa?>'); keyword.focus(); return false;}
                    location.href='http://<?=$config_url?>/tim-kiem/keyword='+keyword.value;  
                }
                
                function doEnter(evt){
                // IE         // Netscape/Firefox/Opera
                var key;
                if(evt.keyCode == 13 || evt.which == 13){
                    onSearch(evt);
                }else{
                    return false; 
                }
                }
            </script>
        </div><!--search_frm-->
        
      </div><!--end bg_input-->


	
			
		</div><!--end info-company-->	


	</div>	<!--end center-banner-->



    <div class="right-banner">


		<div class="wrap-cart">
			<div class="icon"><a href="gio-hang.html"><img src="images/cart-icon.png"></a></div>
			<div class="text load-cart-status">(<span><?=get_total_qty()?></span>) <?=_sp?></div>
		</div>
	
	 
	  <div class="clear"></div>

		

    </div> <!--end right-banner--> 






<div class="clear"></div>



</div><!--end banner_top-->



</div><!--end bg-banner-->	




<div class="clear"></div>




