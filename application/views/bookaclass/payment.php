
<div class="container">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Choose Package</a></li>
                    <li class="breadcrumb-item"><a href="#">Set the Schedule</a></li>
                    <li class="breadcrumb-item"><a href="#"><b>Payment</b></a></li>
                </ol>
            </nav>
        </div>
        <div class="col-lg-2"></div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
            <div class="d-flex flex-row border rounded">
	  	<div>
                    <img src="https://c1.staticflickr.com/3/2862/12328317524_18e52b5972_k.jpg" class="img-thumbnail border-0" style="width: 200px" />
                </div>
            <div class="pl-3 pt-2 pr-2 pb-2 w-75 border-left">
                <h3> Leanne Boulton</h3>	
                <span><i class="text-warning fa fa-star"></i></span>
                <span><i class="text-warning fa fa-star"></i></span>
        	<span><i class="text-warning fa fa-star"></i></span>
        	<span><i class="text-warning fa fa-star"></i></span>
                <span><i class="text-warning fa fa-star"></i></span><br>
                <a href="#" class="btn-secondary" id="changetutor" style="width: 200px;text-align: center">Change a Tutor</a>
            </div>
            <div class="pl-3 pt-2 pr-2 pb-2 w-75">
                <h4 class="text-primary">Short Course Package</h4>
                <p>Paket Singkat belajar Bahasa Indonesia pad Tutor penutur asli</p>
	  	<h4 class="text-primary">8x sessions</h4>
            </div>        
            </div>
            <br><h2 style="text-align: center">PAYMENT METHOD</h2>
            <p style="text-align: center">Choose payment method below</p>
            <div class="card-body" style="width: 100%">
                <ul class="nav bg-light nav-pills rounded nav-fill mb-3" role="tablist">
                     <li class="nav-item">
                        <a class="nav-link active" data-toggle="pill" href="#nav-tab-card">
                        <i class="fa fa-credit-card"></i> Credit Card</a></li>
                     <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#nav-tab-paypal">
                        <i class="fab fa-paypal"></i>  Paypal</a></li>
                     <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#nav-tab-bank">
                        <i class="fa fa-university"></i>  Bank Transfer</a></li>
                </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="nav-tab-card">
                    <p class="alert alert-success">Some text success or error</p>
                    <form role="form">
                        <div class="form-group">
                                <label for="username">Full name (on the card)</label>
                                <input type="text" class="form-control" name="username" placeholder="" required="">
                        </div> <!-- form-group.// -->
                        <div class="form-group">
                                <label for="cardNumber">Card number</label>
                                <div class="input-group">
                                        <input type="text" class="form-control" name="cardNumber" placeholder="">
                                        <div class="input-group-append">
                                                <span class="input-group-text text-muted">
                                                        <i class="fab fa-cc-visa"></i>   <i class="fab fa-cc-amex"></i>   
                                                        <i class="fab fa-cc-mastercard"></i> 
                                                </span>
                                        </div>
                                </div>
                        </div> <!-- form-group.// -->
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label><span class="hidden-xs">Expiration</span> </label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" placeholder="MM" name="">
                                            <input type="number" class="form-control" placeholder="YY" name="">
                                        </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label data-toggle="tooltip" title="" data-original-title="3 digits code on back side of the card">CVV <i class="fa fa-question-circle"></i></label>
                                    <input type="number" class="form-control" required="">
                                </div> <!-- form-group.// -->
                            </div>
                        </div> <!-- row.// -->
                        <button class="subscribe btn btn-primary btn-block" type="button"> Confirm  </button>
                    </form>
                </div> <!-- tab-pane.// -->
                <div class="tab-pane fade" id="nav-tab-paypal">
                    <p>Paypal is easiest way to pay online</p>
                    <p>
                    <button type="button" class="btn btn-primary"> <i class="fab fa-paypal"></i> Log in my Paypal </button>
                    </p>
                    <p><strong>Note:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. </p>
                </div>
                <div class="tab-pane fade" id="nav-tab-bank">
                    <p>Bank accaunt details</p>
                    <dl class="param">
                      <dt>BANK: </dt>
                      <dd> THE WORLD BANK</dd>
                    </dl>
                    <dl class="param">
                      <dt>Accaunt number: </dt>
                      <dd> 12345678912345</dd>
                    </dl>
                    <dl class="param">
                      <dt>IBAN: </dt>
                      <dd> 123456789</dd>
                    </dl>
                    <p><strong>Note:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. </p>
                </div> <!-- tab-pane.// -->
            </div> <!-- tab-content .// -->
            </div> <!-- card-body.// -->
        </div>
    </div>
    <div class="col-lg-1"></div>
</div>
<br>

<script>
    $('#changetutor').click(function(){
       window.location.href = '<?php echo site_url('home/tutor') ?>'; 
    });
</script>


