<div style="padding-top: 15%;padding-left: 5%;background: url(<?php echo base_url('assets/trave/images/welcome-hero/gambar.png') ?>)"><br><br><br><br><br>

<!-- Contact -->
<div class="container contact word boxbipaloka" style="background-color: #000080;color: whitesmoke">
	<div class="row">
            <div class="col-md-3" style="padding-top: 5%">
			<div class="contact-info">
				<img src="https://image.ibb.co/kUASdV/contact-image.png" alt="image"/>
                                <h2 class="judul" style="color: whitesmoke">Contact Us</h2>
                                <h4 class="word" style="color: whitesmoke">We would love to hear from you !</h4>
			</div>
		</div>
		<div class="col-md-9">
			<div class="contact-form">
				<div class="form-group">
				  <label class="control-label col-sm-3" for="fname">First Name:</label>
				  <div class="col-sm-9">          
					<input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="fname">
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-3" for="lname">Last Name:</label>
				  <div class="col-sm-9">          
					<input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lname">
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-3" for="email">Email:</label>
				  <div class="col-sm-9">
					<input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-3" for="comment">Message:</label>
				  <div class="col-sm-9">
					<textarea class="form-control" rows="5" id="comment"></textarea>
				  </div>
				</div>
				<div class="form-group">        
				  <div class="col-sm-offset-2 col-sm-10">
                                      <button type="button" id="submit" class="btn btn-primary" style="width: 90%">Submit</button>
				  </div>
                                </div><br>
			</div>
		</div>
	</div>
</div>

</div>

<script>
$('#menuhome').find('li active').removeClass('active');
$('#menucontact').addClass('active');

$('#submit').click(function(){
    var fname = $('#fname').val();
    var lname = $('#lname').val();
    var email = $('#email').val();
    var message = $('#comment').val();
    
    if(fname != "" || lname != "" || email != "" || message != "") {
    $.ajax({
        url : "sendmessage",
        type : "POST",
        data : {fname:fname,lname:lname,email:email,message:message},
        success:function(data){
            if(data == 'a'){
            alert ('Thankyou for contacting me, we will inform you shortly :)');
                
            }else if (data == 'b') {
                alert ('Something Wrong, Please try again :)');
            }else if (data == 'c'){
                alert ('All filed must be filled');
            } 
        }
    });    
    }else {
    alert ('All field must be filled');     
    }   
    
    
});
</script>
