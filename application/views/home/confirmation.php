 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<div style="padding-left: 5%;background: url(<?php echo base_url('assets/trave/images/welcome-hero/gambar.png') ?>)"><br><br><br><br><br><br><br>
    
    <section id="about" style="padding-top: 15%">
        <h2 class="judul" style="color: white">Confirmation Your Order</h2>
        <hr style="background-color: white">
        <div class="card" style="width: 95%;">
       
  <div class="card-body">
    <h5 class="card-title"></h5>
    <div class="container">
        <div class="row">
            <div class="col-md-2 word">Name</div>
            <div class="col-md-10 word">:</div>
        </div>
        <div class="row">
            <div class="col-md-2 word">Email</div>
            <div class="col-md-10 word">:</div>
        </div>
        <div class="row">
            <div class="col-md-2 word">Country</div>
            <div class="col-md-10 word">:</div>
        </div>
        <div class="row">
            <div class="col-md-2 word">ID Skype</div>
            <div class="col-md-10 word">:</div>
        </div>
        <div class="row">
            <div class="col-md-2 word">Package</div>
            <div class="col-md-10 word">:</div>
        </div>
        <div class="row">
            <div class="col-md-2 word">Tutor Name</div>
            <div class="col-md-10 word">:</div>
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
                <div class="tab-pane fade show active" id="nav-tab-card" style="background-color: whitesmoke">
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
                <div class="tab-pane fade" id="nav-tab-paypal" style="background-color: whitesmoke">
                    <p>Paypal is easiest way to pay online</p>
                    <p>
                    <button type="button" class="btn btn-primary"> <i class="fab fa-paypal"></i> Log in my Paypal </button>
                    </p>
                    <p><strong>Note:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. </p>
                </div>
                <div class="tab-pane fade" id="nav-tab-bank" style="background-color: whitesmoke">
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
    </section>
    <div class="judul">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Back</button>
        </div>
    
    </div>

<script src="<?php echo base_url(); ?>assets/trave/js/jquery.js"></script>
		

<script>
$('#menuhome').find('li active').removeClass('active')
$('#menuabout').addClass('active')
</script>