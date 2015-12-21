<?php
	
$mobile = isset($_POST['mobile']) ? $_POST['mobile'] : null;
$mobile_readonly=  ($mobile!=null) ? 'readonly' : null ;
$is_valid= isset($valid) ? $valid : null;
$otp_readonly=  ($is_valid=='false') ? 'readonly' : null ;
$validate_button_disabled=  ($is_valid=='false') ? 'disabled' : null ;
$get_button_disabled=($is_valid=='false') ? 'disabled' : null ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex">

    <title>Two Factor Authentication : Dazl Web Salon Sign Up</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <style type="text/css">
    
    </style>
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        window.alert = function(){};
        var defaultCSS = document.getElementById('bootstrap-css');
        function changeCSS(css){
            if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />'); 
            else $('head > link').filter(':first').replaceWith(defaultCSS); 
        }
        $( document ).ready(function() {
          var iframe_height = parseInt($('html').height()); 
          window.parent.postMessage( iframe_height, 'http://bootsnipp.com');
        });
    </script>
    
    <link href="<?php echo base_url() ?>public/css/jquery.noty.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>public/css/noty_theme_default.css" rel="stylesheet">
</head>
<body>
	

    <div id="login-overlay" class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">2 - Step Verification</h4>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-xs-6">
                      <div class="well">
                          <form id="loginForm" method="POST" action="<?php echo base_url();?>otp/get" novalidate="novalidate">
                              <div class="form-group">
                                  <label for="username" class="control-label" >Mobile Number</label>
                                  <input type="text" class="form-control" id="mobile" name="mobile" rquired="requried" placeholder = "Enter mobile number to receive OTP " value="<?php echo $mobile?>" <?php echo $mobile_readonly ?>  >
                                  <span class="help-block"></span>
                              </div>
							  
							               <button type="submit" class="btn btn-success btn-block" <?php echo $get_button_disabled ?>>Get OTP</button>
                          </form>

                          <hr>
						  <form id="validateForm" method="POST" action="<?php echo base_url();?>otp/validate" novalidate="novalidate">
                              <div class="form-group">
								<input type="hidden" name="mobile" value="<?php echo $mobile?>">
                                  <label for="username" class="control-label">Enter your One Time Password</label>
                                  <input type="text" class="form-control" id="username" name="otp" value="" required="" <?php echo $otp_readonly ?>>
                                  <span class="help-block"></span>
                              </div>
							 
							                                <button type="submit" class="btn btn-success btn-block" <?php echo $validate_button_disabled ?> >Validate</button>
                          </form>
                      </div>
                  </div>
				      2-Step verification adds an extra layer of security to your account. In addition to your username and password, you'll enter a code that DAZL 
                          will send you via text/sms to your mobile phone.
                          <hr>
                  <img align="center" src="<?php echo base_url()?>public/img/2-step.jpg" width="250" height="75"/>      
              </div>

          </div>
      </div>
  </div>

<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type='text/javascript' src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>public/js/jquery.noty.js"></script>

	<!-- JavaScript jQuery code from Bootply.com editor  -->

	<script type='text/javascript'>

        $(document).ready(function() {

            <?php if($this->session->flashdata('flashSuccess')):?>

 				noty({
				   text: '<?=$this->session->flashdata('flashSuccess');?> Success ',
				   layout: 'bottom',
				   animateOpen: ['opacity','show'],
				   type: 'success'
				});

          <?php endif; ?> 

        <?php if($this->session->flashdata('flashError')):?>

				noty({
				   text: 'Error : <?=$this->session->flashdata('flashError');?>',
				   layout: 'bottom',
				   animateOpen: ['opacity','show'],
				   type: 'error'
				});

          <?php endif; ?> 

        });
  </script>
  </body>
</html>


