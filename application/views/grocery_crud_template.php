<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<style type='text/css'>
body
{
	font-family: Arial;
	font-size: 14px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
	text-decoration: underline;
}
</style>
</head>
<body>
	<div>
		<a href='<?php echo site_url('AdminCrud/appointments')?>'>Appointments</a> |
		<a href='<?php echo site_url('AdminCrud/branch')?>'>Branch</a> |
		<a href='<?php echo site_url('AdminCrud/brand')?>'>Brand</a> |
		<a href='<?php echo site_url('AdminCrud/review')?>'>Review</a> | 
		<a href='<?php echo site_url('AdminCrud/service')?>'>Service</a> |		 
		<a href='<?php echo site_url('AdminCrud/user')?>'>User</a> |
		<a href='<?php echo site_url('AdminCrud/voucher')?>'>Voucher</a>
		
	</div>
	<div style='height:20px;'></div>  
    <div>
		<?php echo $output; ?>
    </div>
</body>
</html>
