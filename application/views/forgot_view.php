<html lang="en">
<head>

<!-- start: Meta -->
<meta charset="utf-8">
<title>Dazl - A complete SAAS Platform for Salons</title>
<meta name="description" content="Bootstrap Metro Dashboard">
<meta name="author" content="Dennis Ji">
<meta name="keyword"
	content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
<!-- end: Meta -->

<!-- start: Mobile Specific -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- end: Mobile Specific -->

<link rel="stylesheet" type="text/css"
	href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<!-- end: JavaScript-->
	<link
		href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css"
		rel="stylesheet">

    <link href="<?php echo base_url() ?>public/css/jquery.noty.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>public/css/noty_theme_default.css" rel="stylesheet">
</head>

<body>


	<div id="SignInForm" class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel">
					<i class="fa fa-lock"></i> Reset Account Password
				</h3>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12">
						<p>To reset your password you must enter a valid email address
							below:</p>
						<div class="well">
							<form id="loginForm" method="POST" action="<?php echo base_url();?>login/reset_password"
								novalidate="novalidate">
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon" id="UserEmail"><i
											class="fa fa-user" title="Enter Your Email"></i></span> <input
											type="email" class="form-control" id="emailid"
											name="emailid" value="" required
											title="Please enter you username"
											placeholder="example@gmail.com" />
									</div>
									<span class="help-block"></span>
								</div>
								<button type="submit" class="btn btn-success btn-block">Reset</button>
								
							<?php if(validation_errors()) { ?>
                          <div class="alert alert-danger">
                          <?php echo validation_errors(); ?>
                          </div>
                          <?php } ?>
							</form>
						</div>
					</div>
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