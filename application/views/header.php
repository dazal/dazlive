<!DOCTYPE html>
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
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="<?php echo base_url() ?>public/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>public/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="<?php echo base_url() ?>public/css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="<?php echo base_url() ?>public/css/style-responsive.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.4.5/jquery.datetimepicker.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>public/css/fullcalendar.min.css" rel="stylesheet">

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>

	<!-- end: CSS -->
	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="<?php echo base_url() ?>public/img/favicon.ico">
	<!-- end: Favicon -->
	<!-- start: JavaScript-->

		<script src ="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="<?php echo base_url() ?>public/js/jquery-migrate-1.0.0.min.js"></script>	

		<script src="<?php echo base_url() ?>public/js/jquery-ui-1.10.0.custom.min.js"></script>
		<script src="<?php echo base_url() ?>public/js/jquery.ui.touch-punch.js"></script>
		<script src="<?php echo base_url() ?>public/js/modernizr.js"></script>
		<script src="<?php echo base_url() ?>public/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url() ?>public/js/jquery.cookie.js"></script> <!-- 2.10-->
		<script src='<?php echo base_url() ?>public/js/fullcalendar.min.js'></script>
		<script src='<?php echo base_url() ?>public/js/jquery.dataTables.min.js'></script>
		<script src="<?php echo base_url() ?>public/js/excanvas.js"></script>
		<script src="<?php echo base_url() ?>public/js/jquery.flot.js"></script>
		<script src="<?php echo base_url() ?>public/js/jquery.flot.pie.js"></script>
		<script src="<?php echo base_url() ?>public/js/jquery.flot.stack.js"></script>
		<script src="<?php echo base_url() ?>public/js/jquery.flot.resize.min.js"></script>
		<script src="<?php echo base_url() ?>public/js/jquery.chosen.min.js"></script>
		<script src="<?php echo base_url() ?>public/js/jquery.uniform.min.js"></script>
		<script src="<?php echo base_url() ?>public/js/jquery.cleditor.min.js"></script>
		<script src="<?php echo base_url() ?>public/js/jquery.noty.js"></script>
		<script src="<?php echo base_url() ?>public/js/jquery.elfinder.min.js"></script>
		<script src="<?php echo base_url() ?>public/js/jquery.raty.min.js"></script>
		<script src="<?php echo base_url() ?>public/js/jquery.iphone.toggle.js"></script>
		<script src="<?php echo base_url() ?>public/js/jquery.uploadify-3.1.min.js"></script>
		<script src="<?php echo base_url() ?>public/js/jquery.gritter.min.js"></script>
		<script src="<?php echo base_url() ?>public/js/jquery.imagesloaded.js"></script>
		<script src="<?php echo base_url() ?>public/js/jquery.masonry.min.js"></script>
		<script src="<?php echo base_url() ?>public/js/jquery.knob.modified.js"></script>
		<script src="<?php echo base_url() ?>public/js/jquery.sparkline.min.js"></script>
		<!-- <script src="<?php echo base_url() ?>public/js/custom.js"></script>-->
		<script src="<?php echo base_url() ?>public/js/counter.js"></script>
		<script src="<?php echo base_url() ?>public/js/retina.js"></script>
		<script src="<?php echo base_url() ?>public/js/jquery.flot.axislabels.js"></script>
		<script src="<?php echo base_url() ?>public/js/saloncustom.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.4.5/jquery.datetimepicker.js"></script>


		
	<!-- end: JavaScript-->
	
</head>

<body>
		<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.html"><span>Dazl</span></a>
								
<!-- Header Menu hmenu.php-->
<?php include 'hmenu.php' ;?>
				
			</div>
		</div>
	</div>
	<!-- start: Header -->
	
<!-- Menu Content-->
<?php 
//include 'menu.php' 
;?>
<!-- Dashboard content-->


        <?php if($this->session->flashdata('flashSuccess')):?>
          	<script type="text/javascript">
          	//alert('<?=$this->session->flashdata('flashSuccess')?>!');
				//$.noty.defaults.killer = true;
				noty({
				   text: '<?=$this->session->flashdata('flashSuccess');?>!',
				   layout: 'top',
				   animateOpen: ['opacity','show'],
				   type: 'success'
				});
			</script>
          <?php endif; ?> 

        <?php if($this->session->flashdata('flashError')):?>
          	<script type="text/javascript">
          	//alert('<?=$this->session->flashdata('flashSuccess')?>!');
				//$.noty.defaults.killer = true;
				noty({
				   text: '<?=$this->session->flashdata('flashError');?>!',
				   layout: 'top',
				   animateOpen: ['opacity','show'],
				   type: 'error'
				});
			</script>
          <?php endif; ?> 
        <?php if($this->session->flashdata('flashInfo')):?>
          	<script type="text/javascript">
          	//alert('<?=$this->session->flashdata('flashSuccess')?>!');
				//$.noty.defaults.killer = true;
				noty({
				   text: '<?=$this->session->flashdata('flashInfo'); ?>!',
				   layout: 'top',
				   animateOpen: ['opacity','show'],
				   type: 'info'
				});
			</script>
          <?php endif; ?> 
        <?php if($this->session->flashdata('flashWarning')): ?>
          	<script type="text/javascript">
          	//alert('<?=$this->session->flashdata('flashSuccess')?>!');
				//$.noty.defaults.killer = true;
				noty({
				   text: '<?=$this->session->flashdata('flashWarning'); ?>!',
				   layout: 'top',
				   animateOpen: ['opacity','show'],
				   type: 'warning'
				});
			</script>
          <?php endif; ?>  
        <?php if($this->session->flashdata('flashAlert')):?>
          	<script type="text/javascript">
          	//alert('<?=$this->session->flashdata('flashSuccess')?>!');
				//$.noty.defaults.killer = true;
				noty({
				   text: '<?=$this->session->flashdata('flashAlert');?>!',
				   layout: 'top',
				   animateOpen: ['opacity','show'],
				   type: 'alert'
				});
			</script>
          <?php endif; ?>  
        <?php if($this->session->flashdata('flashConfirm')): ?>
          	<script type="text/javascript">
          	//alert('<?=$this->session->flashdata('flashSuccess')?>!');
				//$.noty.defaults.killer = true;
				noty({
				   text: '<?=$this->session->flashdata('flashConfirm');?>!',
				   layout: 'top',
				   animateOpen: ['opacity','show'],
				   type: 'confirm'
				});
			</script>
          <?php endif; ?> 
