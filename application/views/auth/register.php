<?php 
require_once ('vendor/autoload.php');
	
?>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/login/auth_css.css">

<div class="auth_form">
    <div class="row">
        <div class="col-sm-12 kolomatas"></div>
        <div class="col-sm-12 konten">
            <div class="row">
                <div class="col-sm-4 konten_blank"></div>
                <div class="col-sm-4 form_center">
                    <div class="row">
                        <div class="col-3" id="menu_div" style="height: 10vh;margin-left: 2vh;margin-right: 2vh">
                            <button class="col-sm-5 active_menu" id="menu_login" style="border-color: transparent;border-radius: 25px;height: 13vh;margin-top: -3vh;margin-left: -28vh;position: absolute"> <a data-toggle="tab"  href="#login">Login</a></button>
                            <button class="col-sm-5" id="menu_register" style="background-color: transparent;border-color: transparent;border-radius: 25px;height: 13vh;margin-top: -3vh;margin-left: 4.5vh;position: absolute"> <a data-toggle="tab" href="#register">Register</a></button>
                        </div>
                        <div class="tab-content">
                            <div id="login" class="tab-pane fade in active">
                              <div class="col-3" style="background-color: rgb(36 64 94);height: 15vh;padding-top: 8px;">
                            <p style="text-align: center;color: whitesmoke;font-size: 18pt;"> Login Using Social Media</p>
                            <a id="google_login" href="#"><img src="<?php echo base_url('assets/asset_web/login_google.png') ?>" width="180" height="50"></a>
                             <a href="<?php echo $auth_fb_url ?>" id="fb_login"><img src="<?php echo base_url('assets/asset_web/login_fb.png') ?>" width="180" height="50"></a>
                        </div>
                        <div class="col-3" align="center">
                            <p class="teks">or</p>
                            <input class="form-control input_login teks" style="margin: 1vh" type="email" id="email_login" placeholder="Email">
                                <div class="teks alert-danger" id="warningemail">
                                    <strong>Error</strong> Email must be filled!!
                                </div>
                            <input class="input_login teks form-control" type="password" id="password_login" placeholder="Password">
                                <div class=" teks alert-danger" id="warningpass">
                                    <strong>Error</strong> Password must be filled!!
                                </div>
                            <div class="checkbox">
                                <label class="teks"><input type="checkbox" value=""> Remember me </label><br>
                                <a href="#" class="teks">Forgot password</a>
                            </div>                            
                        </div>
                        <div class="col-3" style="margin-top: -1vh">
                            <button class="btn btn_form" id="btn_login" type="button" style="background-color: rgb(35 147 230);font-size: 14pt;color: whitesmoke;"><h3 style="margin-top: -3px">Login</h3></button>
                        </div>  
                            </div>
                            
                            <div id="register" class="tab-pane fade">
                              <div class="col-3" style="background-color: rgb(36 64 94);height: 15vh;padding-top: 8px">
                            <p style="text-align: center;color: whitesmoke;font-size: 18pt;"> Register Using Social Media</p>
                            <a id="google_login" href="#"><img src="<?php echo base_url('assets/asset_web/login_google.png') ?>" width="180" height="50"></a>
                             <a href="#" id="fb_login"><img src="<?php echo base_url('assets/asset_web/login_fb.png') ?>" width="180" height="50"></a>
                        </div>
                        <div class="col-3" align="center">
                            <p class="teks">or</p>
                            <input class="form-control input_login teks" style="margin: 1vh" type="email" id="email_register" placeholder="Email">
                                <div class="teks alert-danger" id="warningemail2">
                                    <strong>Error</strong> Email must be filled!!
                                </div>
                            <input class="input_login teks form-control" style="margin: 1vh" type="password" id="password_register" placeholder="Password">
                                <div class=" teks alert-danger" id="warningpass2">
                                    <strong>Error</strong> Password must be filled!!
                                </div>
                            <input class="input_login teks form-control" type="password" id="confirm_register" placeholder="Confirm Password">
                             <div class="teks alert-danger" id="warningconfirm">
                                    <strong>Error</strong> Confirm Password must be filled!!<br>
                                </div>
                            <span class="error"><p id="error"></p></span
                            <div class="checkbox">
                                <label class="teks"><input type="checkbox" value=""> I agree with BIPALOKA regulations </label><br>
                            </div>                            
                        <div class="col-3" style="margin-top: -1vh">
                            <button class="btn btn_form" id="btn_register" type="button" style="background-color: rgb(35 147 230);font-size: 14pt;color: whitesmoke;"><h3 style="margin-top: -3px">Register</h3></button>
                        </div>
                            </div>
                        
                            </div>
                        </div>
                        
                    </div>                                       
                </div>
                <div class="col-sm-4 konten_blank"></div>   
            </div>
        </div>
        <div class="col-sm-12 kolomatas"></div>
    </div>
		
<script src="<?php echo base_url(); ?>assets/admin-pro/js/vendor/jquery-1.11.3.min.js"></script>
<script>

var menu_login = document.getElementById("menu_login");
var menu_register = document.getElementById("menu_register");

var error_email = $("#warningemail").hide();
var error_password= $("#warningpass").hide();
var error_confirm= $("#warningconfirm").hide();

var error_email2 = $("#warningemail2").hide();
var error_password2= $("#warningpass2").hide();
var error_confirm= $("#warningconfirm").hide();

$('#menu_register').click(function(){
    menu_register.style.backgroundColor = 'rgb(135 149 180)'; 
    menu_register.style.color = 'whitesmoke'; 
    menu_login.style.backgroundColor = 'transparent'; 
});

$('#menu_login').click(function(){
    menu_login.style.backgroundColor = 'rgb(135 149 180)'; 
    menu_login.style.color = 'whitesmoke'; 
    menu_register.style.backgroundColor = 'transparent'; 
});

$('#btn_register').click(function(){
   var email = $('#email_register').val();
   var password = $('#password_register').val();
   var confirm = $('#confirm_register').val();
   
   if (email < 1 || password < 1 || confirm < 1){
      $("#warningemail2").show();
      $("#warningpass2").show();
      $("#warningconfirm").show();
   }
   else{
       $("#warningemail2").hide();
      $("#warningpass2").hide();
      $("#warningconfirm").hide();
      
      if(password != confirm ){
      $("#warningpass2").hide();
      $("#warningconfirm").show();
      $("#warningconfirm").text("Sorry, Password doesn't equal");
   }else {
       $.ajax({
      url : 'register',
      type : 'POST',
      data : {btn:'btn_register', email:email, password:confirm},
      success:function(data){
          if(data == 'a'){
              jQuery('body').load("<?php echo site_url('home') ?>");
          }else{
              alert('gagal');
          }
      } 
   });
   }
   
   }
   
    
   
   
   /* $.ajax({
      url : 'register',
      type : 'POST',
      data : {email:email, password:confirm},
      success:function(data){
          alert('yups');
      } 
   }); */
});

$('#btn_login').click(function(){
   var email2 = $('#email_login').val();
   var password2 = $('#password_login').val();
   
   if (email2 < 1 || password2 < 1){
      $("#warningemail").show();
      $("#warningpass").show();
   }else{
      $("#warningemail").hide();
      $("#warningpass").hide(); 
      
      $.ajax({
         url : 'auth/login',
         type : 'POST',
         data : {btn_login : 'btn_login', email : email2, password : password2},
         success : function (data){
             if (data == 'a'){
                 jQuery('body').load("<?php echo site_url('home') ?>");
             }
             else if(data == 'c') {
                 $("#warningpass").show();
                 $("#warningpass").text("Sorry, Please check your email and password!");
             }else {
                 alert('cc');
             }
         }
      });
   }
   
   /* $.ajax({
      url : 'register',
      type : 'POST',
      data : {email:email, password:confirm},
      success:function(data){
          alert('yups');
      } 
   }); */
});

$('#google_login').click(function(){
   window.location.href = '<?php echo site_url('auth/glogin') ?>'; 
});


$('#fb_login').click(function(){
    
   window.location.href = '<?php echo site_url('auth/fb_login') ?>'; 
});



</script>
  
  