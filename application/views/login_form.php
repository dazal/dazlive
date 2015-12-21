<html lang="en">
<head>

	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Dazl - A complete SAAS Platform for Salons</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->

	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
  <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<!-- end: JavaScript-->

	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>public/css/jquery.noty.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>public/css/noty_theme_default.css" rel="stylesheet">
</head>

<body>
    <div id="login-overlay" class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Login to DAZL (Salon Owners)</h4>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-xs-6">
                      <div class="well">
                          <form id="loginForm" action="<?php echo base_url();?>login/validate_credentials" method="POST" novalidate="novalidate">
                              <div class="form-group">
                                  <label for="username" class="control-label">Username</label>
                                  <input type="text" class="form-control" id="username" name="username" value="" required="" title="Please enter you username" placeholder="Username">
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="password" class="control-label">Password</label>
                                  <input type="password" class="form-control" id="password" name="password" value="" required="" title="Please enter your password" placeholder="Password">
                                  <span class="help-block"></span>
                              </div>
                              <div id="loginErrorMsg" class="alert alert-error hide">Wrong username or password</div>
                              <div class="checkbox">
                                  <label>
                                      <input type="checkbox" name="remember" id="remember"> Remember login
                                  </label>
                                  <p class="help-block">(if this is a private computer)</p>
                              </div>
                              <button type="submit" class="btn btn-success btn-block">Login</button>
                              <a href="<?php echo base_url();?>login/forgot/" class="btn btn-default btn-block">Forgot Login ?</a>
                          </form>
                          <?php if(validation_errors()) { ?>
                          <div class="alert alert-danger">
                          <?php echo validation_errors(); ?>
                          </div>
                          <?php } ?>
                      </div>
                  </div>
                  <div class="col-xs-6">
                      <p class="lead">Register now for <span class="text-success">FREE</span></p>
                      <ul class="list-unstyled" style="line-height: 2">
                          <li><span class="fa fa-check text-success"></span> Manage all your appointments</li>
                          <li><span class="fa fa-check text-success"></span> Loyal customers </li>
                          <li><span class="fa fa-check text-success"></span> Run your promotions</li>
                          <li><span class="fa fa-check text-success"></span> Dashboard view of trends</li>
                          <li><span class="fa fa-check text-success"></span> Secure <small>(OTP/User/Password Authentication)</small></li>
                          <li><a href="<?php echo base_url();?>/read-more/"><u>Read more</u></a></li>
                      </ul>
                      <p><a href="<?php echo base_url();?>login/signup" class="btn btn-info btn-block">Yes please, register now!</a></p>
                  </div>
              </div>
          </div>
      </div>
  </div>


<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type='text/javascript' src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>public/js/jquery.noty.js"></script>

</body>
       <?php if($this->session->flashdata('flashSuccess')):?>
          	<script type="text/javascript">
				noty({
				   text: "<?=$this->session->flashdata('flashSuccess');?>!",
				   layout: 'bottom',
				   animateOpen: ['opacity','show'],
				   type: 'success'
				});
			</script>
          <?php endif; ?> 

        <?php if($this->session->flashdata('flashError')):?>
          	<script type="text/javascript">
				noty({
				   text: '<?=$this->session->flashdata('flashError');?>!',
				   layout: 'bottom',
				   animateOpen: ['opacity','show'],
				   type: 'error'
				});
			</script>
          <?php endif; ?> 
        <?php if($this->session->flashdata('flashInfo')):?>
          	<script type="text/javascript">
				noty({
				   text: '<?=$this->session->flashdata('flashInfo'); ?>!',
				   layout: 'top',
				   //animateOpen: ['opacity','show'],
				   type: 'info'
				});
			</script>
          <?php endif; ?> 
        <?php if($this->session->flashdata('flashWarning')): ?>
          	<script type="text/javascript">
 				noty({
				   text: '<?=$this->session->flashdata('flashWarning'); ?>!',
				   layout: 'top',
				  // animateOpen: ['opacity','show'],
				   type: 'warning'
				});
			</script>
          <?php endif; ?>  
        <?php if($this->session->flashdata('flashAlert')):?>
          	<script type="text/javascript">
 				noty({
				   text: '<?=$this->session->flashdata('flashAlert');?>!',
				   layout: 'top',
				   //animateOpen: ['opacity','show'],
				   type: 'alert'
				});
			</script>
          <?php endif; ?>  
        <?php if($this->session->flashdata('flashConfirm')): ?>
          	<script type="text/javascript">
				noty({
				   text: '<?=$this->session->flashdata('flashConfirm');?>!',
				   layout: 'top',
				  // animateOpen: ['opacity','show'],
				   type: 'confirm'
				});
			</script>
          <?php endif; ?> 

