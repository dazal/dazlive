


<!DOCTYPE html>
<html>
<head>
    <style>
        .wizard > .content {
min-height: 20em !important;
}
.wizard .content > .body {
width: 100%;
height: auto;
padding: 15px;
position: relative;
}
    </style>
</head>
<body>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/formvalidation/0.6.1/css/formValidation.min.css" />
<link rel="stylesheet" href="http://formvalidation.io/vendor/jquery.steps/css/jquery.steps.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/formvalidation/0.6.1/js/formValidation.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/formvalidation/0.6.1/js/framework/bootstrap.min.js"></script>
<script src="http://formvalidation.io/vendor/jquery.steps/js/jquery.steps.min.js"></script>
<div id="wrapper">
<!-- main container div-->
<div id="container" class="container">
	<div class="row">
		<div id="maincontent" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="row">
				<div id="" class="col-lg-12">
				
					<form id="multiphase" role="form" class="form-horizontal" action="<?php echo base_url();?>login/create_member" method="post" accept-charset="utf-8">
							 <h2>Personal Info</h2>
							<section data-step="0">
								 <B>Personal Info:</B>

								<div class="form-group">
									<label for="first_name" class="col-lg-2 control-label">First Name:</label>
									<div class="col-lg-3">
										<input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" value="" tabindex="1">
									</div>
								</div>
								
								<div class="form-group">
									<label for="last_name" class="col-lg-2 control-label">Last Name:</label>
									<div class="col-lg-3">
										<input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" value="" tabindex="1">
									</div>
								</div>
								
								<div class="form-group">
									<label for="phoneno" class="col-lg-2 control-label">Mobile No.:</label>
									<div class="col-lg-3">
										<input type="text" name="phoneno" id="phoneno" class="form-control" placeholder="Phone or Mobile Number" data-mask="+99-99999-99999" value="" tabindex="1">
									</div>
								</div>
								<div class="form-group">
									<label for="emailid" class="col-lg-2 control-label">E-Mail ID:</label>
									<div class="col-lg-3">
										<input type="text" name="emailid" id="emailid" class="form-control" placeholder="E-Mail ID" value="" tabindex="1">
									</div>
								</div>
							</section>
							 <h2>User Info</h2>

							<section data-step="1">
								 <B>User Info:</B>

								<div class="form-group">
									<label for="username" class="col-lg-2 control-label">User Name:</label>
									<div class="col-lg-3">
										<input type="text" name="username" id="username" class="form-control" placeholder="User Name" value="" tabindex="1">
									</div>
								</div>
								<div class="form-group">
									<label for="password" class="col-lg-2 control-label">Password:</label>
									<div class="col-lg-3">
										<input type="password" name="password" id="password" class="form-control" placeholder="password" value="" tabindex="1">
									</div>
								</div>
								<div class="form-group">
									<label for="password2" class="col-lg-2 control-label">Confirmpassword:</label>
									<div class="col-lg-3">
										<input type="password" name="password2" id="password2" class="form-control" placeholder="Confirm Password" value="" tabindex="1">
									</div>
								</div>
							</section>
							 

							
						<!-- end of wizard-->
					</form>
					<!-- end of form-->
				</div>
			</div>
			<!-- end of row-->
			<div class="modal fade" id="welcomeModal">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							 <h1 class="modal-title text-center">Add new last name</h1>

						</div>
						<div class="modal-body">
							<form method="POST" name="add_lastname">
								<input type="text" name="add_lastname" id="add_lastname" class="form-control" placeholder="Enter your last name here" value="">
								<p class="">The first alphabet of the last name <strong>MUST</strong> be in upper case.</p>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
							<input name="addlastname" type="submit" value="Add" class="btn btn-primary">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row hidden-print">
		<div id="footer" class="col-lg-12"></div>
	</div>
</div>
</div>
    <script type="text/javascript">
        $(document).ready(function () {
    function adjustIframeHeight() {
        var $body   = $('body'),
            $iframe = $body.data('iframe.fv');
        if ($iframe) {
            // Adjust the height of iframe
            $iframe.height($body.height());
        }
    }
    $("#multiphase").steps({
        headerTag: "h2",
        bodyTag: "section",
        saveState: true,
		onStepChanged: function(e, currentIndex, priorIndex) {
                // You don't need to care about it
                // It is for the specific demo
                adjustIframeHeight();
            },
            // Triggered when clicking the Previous/Next buttons
            onStepChanging: function(e, currentIndex, newIndex) {
                var fv         = $('#multiphase').data('formValidation'), // FormValidation instance
                    // The current step container
                    $container = $('#multiphase').find('section[data-step="' + currentIndex +'"]');

                // Validate the container
                fv.validateContainer($container);

                var isValidStep = fv.isValidContainer($container);
                if (isValidStep === false || isValidStep === null) {
                    // Do not jump to the next step
                    return false;
                }

                return true;
            },
            // Triggered when clicking the Finish button
            onFinishing: function(e, currentIndex) {
                var fv         = $('#multiphase').data('formValidation'),
                    $container = $('#multiphase').find('section[data-step="' + currentIndex +'"]');

                // Validate the last step container
                fv.validateContainer($container);

                var isValidStep = fv.isValidContainer($container);
                if (isValidStep === false || isValidStep === null) {
                    return false;
                }

                return true;
            },
            onFinished: function(e, currentIndex) {
                // Uncomment the following line to submit the form using the defaultSubmit() method
                $('#multiphase').formValidation('defaultSubmit');

                // For testing purpose
                //$('#welcomeModal').modal("show");
            }
        }).formValidation({
        excluded: ':disabled',
        message: 'This value is not valid',
        container: 'tooltip',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            //last name validation  
            last_name: {
                container: 'popover',
                validators: {
                    notEmpty: {
                        message: 'The Last Name is required and cannot be empty'
                    }
                }
            },
            //first name validation
            first_name: {
                container: 'popover',
                validators: {
                    notEmpty: {
                        message: 'The First Name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 3,
                        max: 30,
                        message: 'The First Name must be more than 7 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[A-Z]+$/i,
                        message: 'The First Name can only consist of alphabetical characters'
                    }
                }
            },
            //validation of Parent's details step start
            //last name validation  
            //first name validation
            username: {
                container: 'popover',
                validators: {
                    notEmpty: {
                        message: 'The User Name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 4,
                        max: 20,
                        message: 'The User Name must be more than 4 and less than 20 characters long'
                    },
                    regexp: {
                        regexp: /^[A-Z]+$/i,
                        message: 'The First Name can only consist of alphabetical characters'
                    }
                }
            },
            // Validation for Reference details starts
            //School reference name
            rd_schoolrefname: {
                container: 'popover',
                validators: {
                    notEmpty: {
                        message: 'The School Reference Name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 7,
                        max: 40,
                        message: 'The School Reference Name must be more than 7 and less than 40 characters long'
                    },
                    regexp: {
                        regexp: /^[A-Z\s]+$/i,
                        message: 'The School Reference Name can only consist of alphabetical characters'
                    }
                }
            },
            //School reference phone
            phoneno: {
                container: 'popover',
                validators: {
                    notEmpty: {
                        message: 'The Phone or Mobile is required and cannot be empty'
                    }
                }
            },
            emailid: {
                container: 'popover',
                validators: {
                    notEmpty: {
                        message: 'The E-Mail ID is required and cannot be empty'
                    },
                    regexp: {
                        regexp: /[a-zA-Z0-9]+(?:(\.|_)[A-Za-z0-9!#$%&'*+\/=?^`{|}~-]+)*@(?!([a-zA-Z0-9]*\.[a-zA-Z0-9]*\.[a-zA-Z0-9]*\.))(?:[A-Za-z0-9](?:[a-zA-Z0-9-]*[A-Za-z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?/g,
                        message: 'The E-Mail ID is not a valid E-Mail'
                    }
                }
            },
			password: {
				container: 'popover',
				validators: {
				notEmpty: {
					message: 'The password is requried and cannot be empty'
				},
				stringLength: {
                        min: 4,
                        max: 20,
                        message: 'The Password should be min of 4 and max of 20 characters long'
                    },
				}
			},
			
			password2: {
				container: 'popover',
				validators: {
				notEmpty: {
					message: 'The confirm password is requried and cannot be empty'
				},
				identical: {
                            field: 'password',
                            message: 'The confirm password must be the same as original one'
                        },
				
				}
			},
        }

    })

});
    </script>
</body>
</html>