<script type="text/javascript">
$(document).ready(function() { 	



/************************************** Start Send Login **************************/	
	 $('#send_login').click(function() {  

			/// email validation
			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			var emailaddressVal = $("#email_login").val();
			
			if(emailaddressVal == '') {
				$("#email_error").html('');
				$("#email_login").after('<div class="error" id="email_error"><b class=images_error><?=_emailError?>.</b></div>');
				$("#email_login").focus();
				return false
			}
			else if(!emailReg.test(emailaddressVal)) {
				$("#email_error").html('');
				$("#email_login").after('<div class="error" id="email_error"><b class=images_error><?=_emailError1?>.</b></div>');
				$("#email_login").focus();
				return false
			 
			}
			else{
				$("#email_error").html('');
			}
		
			
			// pass validation
			var passVal = $("#pass_login").val();
			if(passVal == '') {
				$("#pass_error").html('');
				$("#pass_login").after('<div class="error" id="pass_error"><b class=images_error><?=_xinnhapmatkhau?>.</b></div>');
				$("#pass_login").focus();
				return false
			}
			else{
				$("#pass_error").html('');
			}
			
			
			
			
			
			$.ajax({
				url:"ajax/login.php",
				type:"POST",
				data:{email:emailaddressVal, pass:passVal},
				async:true,
				dataType:"text",
				success:function(response){
					if(response==1){// thanh cong
						$("#after_submit").html('');
						$("#send_login").after(function() {
                            redirect_login();
                        });
						
					}
					else{
						$("#after_submit").html('');
						$("#send_login").after(function() {
                            $(".customNotify").jmNotify({
								html: '<?=_loitaikhoan?>'
							});	
                        });
						
						clear_form_login();
					}
				}
			})
		return false;
	 });
	 function clear_form_login(){
		$("#email_login").val('');
		$("#pass_login").val('');
	 }
	  function redirect_login(){
		window.setTimeout(function () {
			
			location.href = "http://<?=$config_url?>/index.html";
			
			
		}, 200)
	 }					   
						   
/************************************** End Send Login **************************/							   
						   

/************************************** Start Send register **************************/	

	$('#Send_tk').click(function()	
	{  			
			// email validation
			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			var emailaddressVal = $("#emailtk").val();	
			var code= $('#captcha-code').val();
			
			// name validation
			var nameVal = $("#frm_name").val();
			if(nameVal == '') {
				$("#name_error").html('');
				$("#frm_name").after('<div class="error" id="name_error"><b class=images_error>Vui l??ng nh???p h??? t??n.</b></div>');
				$("#frm_name").focus();
				return false
			}
			else{
				$("#name_error").html('');
			}
		
		

			if(emailaddressVal == '') {
				$("#email_error").html('');
				$("#emailtk").after('<div class="error" id="email_error"><b class=images_error>Xin vui l??ng nh???p Email.</b></div>');
				$("#emailtk").focus();
				return false
			}
			else if(!emailReg.test(emailaddressVal)) {
				$("#email_error").html('');
				$("#emailtk").after('<div class="error" id="email_error"><b class=images_error>Email kh??ng ????ng ?????nh d???ng.</div></div>');
				$("#emailtk").focus();
				return false
			 
			}
			else{
				$("#email_error").html('');
			}
			
			
			
			// pass validation
			var passVal = $("#pass_tk").val();
			if(passVal == '') {
				$("#pass_error").html('');
				$("#pass_tk").after('<div class="error" id="pass_error"><b class=images_error>Xin nh???p m???t kh???u.</b></div>');
				$("#pass_tk").focus();
				return false
			}
			else{
				$("#pass_error").html('');
			}
			
			// repass validation
			var repassVal = $("#repass_tk").val();
			if(repassVal == '') {
				$("#repass_error").html('');
			$("#repass_tk").after('<div class="error" id="repass_error"><b class=images_error>Xin nh???p l???i m???t kh???u.</b></div>');
				$("#repass_tk").focus();
				return false
			}
			else{
				$("#repass_error").html('');
			}
			if(repassVal !=passVal){
				$("#pass_error").html('');
				$("#pass_tk").after('<div class="error" id="pass_error"><b class=images_error>Hai m???t kh???u kh??ng gi???ng nhau.</b></div>');
				$("#pass_tk").focus();
				return false
			}else{
				$("#pass_error").html('');
				$("#repass_error").html('');
			}
			
		
			// birthday validation
			var ngayVal = $("#ngaysinh_tk").val();
			if(ngayVal == "") {
				$("#ngaysinh_error").html('');
				$("#ngaysinh_tk").after('<div class="error" id="ngaysinh_error"><b class=images_error>Xin ch???n ng??y sinh.</b></div>');
				$("#ngaysinh_tk").focus();
				return false
			}
			else{
				$("#ngaysinh_error").html('');
			}
		
		
			var genderVal = $("#gender_tk").val();
			if(genderVal == '') {
				$("#gender_error").html('');
			$("#gender_tk").after('<div class="error" id="gender_error"><b class=images_error>Xin ch???n gi???i t??nh.</b></div>');
				$("#gender_tk").focus();
				return false
			}
			else{
				$("#gender_error").html('');
			}


			// address validation


		


			var diachiVal = $("#diachi").val();
			
			
			// name validation
			var dienthoaiVal = $("#dienthoai").val();
			if(dienthoaiVal == '') {
				$("#dienthoai_error").html('');
				$("#dienthoai").after('<div class="error" id="dienthoai_error"><b class=images_error>Vui l??ng nh???p s??? ??i???n tho???i.</b></div>');
				$("#dienthoai").focus();
				return false
			}
			else{
				$("#dienthoai_error").html('');
			}
			
			
			
			
			$.ajax({
				url:"ajax/register.php",
				type:"POST",
				data:{email:emailaddressVal,pass:passVal,name:nameVal,ngaysinh:ngayVal,gender:genderVal,diachi:diachiVal,dienthoai:dienthoaiVal},
				async:true,
				dataType:"text",
				success:function(response){
					//alert(response);
					if(response==1){//them thanh cong
						$("#after_submit").html('');
						$("#Send_tk").after(function() {
                            $(".customNotify").jmNotify({
								html: '????ng k?? th??nh c??ng',
								delay:1000,
								onClose:redirect_register()
							});	
                        });
					
						change_captcha();
						clear_form_register();
					}else if(response==2){ // trung email
						$("#after_submit").html('');
						$("#Send_tk").after(function() {
                            $(".customNotify").jmNotify({
								html: 'L???i Email n??y ???? t???n t???i'
							});	
                        });
						
						
					}else { // insert ko thanh cong
						$("#after_submit").html('');
						$("#Send_tk").after(function() {
                            $(".customNotify").jmNotify({
								html: 'Vui l??ng quay l???i sau'
							});	
                        });
						
						
						clear_form_register();
					}
					
					
					
					
				}
			})
			
		return false;
	 });

	 
	 function clear_form_register(){
		$("#frm_name").val('');
		$("#emailtk").val('');
		$("#pass_tk").val('');
		$("#repass_tk").val('');
		$("#ngaysinh_tk").val('');
		$("#gender_tk").val('');

	 }
	 

	  function redirect_register(){
		window.setTimeout(function () {location.href = "http://<?=$config_url?>/index.php";}, 2000)
	 }

	 

/************************************** Start Send register **************************/	
	 
	 
});	
</script>		 


<!-- POPUP LOGIN-REGISTER -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
                <h4 class="modal-title" id="myModalLabel">????ng nh???p/????ng K??</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10" style="border-right: 1px dotted #C2C2C2;padding-right: 30px;">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#Login" data-toggle="tab">????ng nh???p</a></li>
                            <li><a href="#Registration" data-toggle="tab">????ng K??</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                        	<!-- LOGIN -->
                            <div class="tab-pane active" id="Login">
                       			<form action="#" name="dangnhap_from" class="form-horizontal" id="dangnhap_from" method="post">   
                                <div class="form-group">
                                    <label for="email_login" class="col-sm-3 control-label">Email*</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="email_login" placeholder="Email" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="pass_login" class="col-sm-3 control-label">Password*</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="pass_login" placeholder="Password" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                    </div>
                                    <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary btn-sm-login" id="send_login">????ng nh???p</button>
                                       
                                    </div>
                                </div>
                                </form>
                            </div>

                            <!-- REGISTER -->
                            <div class="tab-pane fade" id="Registration">
                                <form class="form-horizontal" name="dangkytk_form" action="#" method="post" enctype="multipart/form-data" id="dangkytk_form register">
                                <div class="form-group">
                                    <label for="frm_name" class="col-sm-4 control-label">H??? T??n<span>*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="frm_name" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="emailtk" class="col-sm-4 control-label">Email<span>*</span></label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" id="emailtk" required/>
                                    </div>
                                </div>
                        
                                <div class="form-group">
                                    <label for="pass_tk" class="col-sm-4 control-label">M???t kh???u<span>*</span></label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="pass_tk" required/>
                                        <div class="clear"></div>
                                        
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="repass_tk" class="col-sm-4 control-label">Nh???p l???i m???t kh???u<span>*</span></label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="repass_tk" required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="ngaysinh_tk" class="col-sm-4 control-label">Ng??y sinh<span>*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="ngaysinh_tk" required/>
                                    </div>
                                </div>
                                <script>
									  $(function() {
										$( "#ngaysinh_tk" ).datepicker({
											dateFormat: "dd-mm-yy",
											changeMonth: true,
											changeYear: true,
											// dayNamesMin: [ "CN", "T2", "T3", "T4", "T5", "T6", "T7" ],
											// monthNamesShort: [ "Th??ng 1", "Th??ng 2", "Th??ng 3", "Th??ng 4", "Th??ng 5", "Th??ng 6", "Th??ng 7", "Th??ng 8", "Th??ng 9", "Th??ng 10", "Th??ng 11", "Th??ng 12" ],
											yearRange: "1900:now"
										});
									  });
								  </script>

								  <div class="form-group">
                                    <label for="gender_tk" class="col-sm-4 control-label">Gi???i t??nh<span>*</span></label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="gioitinh" id="gender_tk">
                                        	<option value="" checked>L???a ch???n</option>
                                        	<option value="1">Nam</option>
                                        	<option value="0">N???</option>
                                        	<option value="2">Kh??c</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="diachi" class="col-sm-4 control-label">?????a ch???</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="diachi" class="form-control" id="diachi"/>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="dienthoai" class="col-sm-4 control-label">??i???n tho???i<span>*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="dienthoai" class="form-control" id="dienthoai" />
                                    </div>
                                </div>
								

								
								
								
								
          
                           
                             
				            

                                <div class="row">
                                    <div class="col-sm-4">
                                    </div>
                                    <div class="col-sm-8">
                                        <button type="button" class="btn btn-primary btn-sm btn-regis" id="Send_tk">G???i</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>

                    
	                </div>

	                
				
				
				</div>
            </div>
        </div>
    </div>
</div>