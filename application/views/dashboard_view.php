<script src="<?php echo base_url() ?>public/js/custom.js"></script>
<script>
		var objbill;
		var objappt;
		$(document).ready(function()
    	{

	    });
</script>

<?php
$totalvoucher=0;
$malevoucher=0;
$femalevoucher=0;
$malevoucherper=0;
$femalevoucherper=0;

foreach ($voucher as $row)
{
	if($row->sex == 'Male')
		$malevoucher=$row->count;
	if($row->sex == 'Female')
		$femalevoucher=$row->count;
}
$totalvoucher=$malevoucher + $femalevoucher;
$malevoucherper = ($malevoucher / $totalvoucher) * 100;
$femalevoucherper = ($femalevoucher / $totalvoucher) * 100;
$totalapptmonth=0;
foreach($apptmonth as $row)
{
	$totalapptmonth=$totalapptmonth+$row->count;
}
$totalbillamt=0;
foreach ($bill as $row)
{
	$totalbillamt=$totalbillamt+$row->amount;
}
$member=0;
$nonmember=0;
$totalmem=0;
foreach ($values as $k)
{
	$member=$k->member;
	$nonmember=$k->nonmember;
}
$totalmem=$member+$nonmember;
$memberper=($member/$totalmem)*100;
$nonmemberper=($nonmember/$totalmem)*100;

$adultmales=0;
$adultfemales=0;
$kids=0;
$kidsfemales=0;
$audltfemaleper=0;
$audltmaleper=0;
$kidsper=0;

$adultmales=$rows['visitorMaleCount'];
$adultfemales=$rows['visitorFemaleCount'];
$count=$rows['visitortotalCount'];
$kids =$rows['visitorKidCount'];
/*
foreach ($rows as $k)
{
	if($k->type == 'M')
	{
		$adultmales = $k->count;
		
	}
	if($k->type == 'F')
	{
		$adultfemales = $k->count;
		
	}
	if($k->type == 'K')
	{
		$kids = $k->count;
		
	}
	$count=$adultmales + $adultfemales + $kids;
}*/

if($adultfemales !=0 && $count != 0)
	$audltfemaleper=($adultfemales/$count)*100;
if($adultmales !=0 && $count != 0)
	$audltmaleper=($adultmales/$count)*100;
if($kids !=0 && $count != 0)
	$kidsper=($kids/$count)*100;



$malesales=0;
$femalesales=0;
$kidsales=0;
$totalsales=0;
$malesalesper=0;
$femalesalesper=0;
$kidsalesper=0;

$malesales=$sales["salemalecount"];
$femalesales=$sales["salefemalecount"];
$totalsales=$sales["saletotalcount"];
$kidsales=$sales["salekidcount"];
/*
foreach ($sales as $k)
{
	if($k->type == 'M')
	{
		$malesales=$k->price;
	}
	if($k->type == 'F')
	{
		$femalesales=$k->price;
	}
	if($k->type == 'K')
	{
		$kidsales=$k->price;
	}
	$totalsales=$malesales+$femalesales+$kidsales;
}*/
if($malesales !=0 && $totalsales != 0)
	$malesalesper=($malesales/$totalsales)*100;
if($femalesales !=0 && $totalsales != 0)
	$femalesalesper=($femalesales/$totalsales)*100;
if($kidsales !=0 && $totalsales != 0)
	$kidsalesper=($kidsales/$totalsales)*100; 
?>
<div class="row-fluid">
		<div class="box-header">
			<h2><i class="halflings-icon list-alt"></i><span class="break"></span>Visitors</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
						
		</div>
		
		<div class="box-content" align="center">
		<!-- <div class="row-fluid hideInIE8 circleStats" align="center"> -->
			
				<div class="span2" onTablet="span4" onDesktop="span2">
                	<div class="circleStatsItemBox yellow">
						<div class="header">Male</div>

						<span class="percent">percent</span>
						
						<div class="circleStat">
                    		<input type="text" value=<?php print ($audltmaleper); ?> class="whiteCircle" href="80"/>
						</div>		
						
						<div class="footer">
							<span class="count">
								<span class="number"><?php print ($adultmales); ?></span>
								<span class="unit"></span>
							</span>
							<span class="sep"> / </span>
							<span class="value">
								<span class="number"><?php print($count); ?></span>
								<span class="unit">No.</span>
							</span>	
							
						</div>
						
                	</div>
                </div>

				<div class="span2" onTablet="span4" onDesktop="span2">
                	<div class="circleStatsItemBox pink">
						<div class="header">Female</div>

						<span class="percent">percent</span>
						
						<div class="circleStat">
                    		<input type="text" value=<?php print ($audltfemaleper); ?> class="whiteCircle" href="80"/>
						</div>		
						
						<div class="footer">
							<span class="count">
								<span class="number"><?php print ($adultfemales); ?></span>
								<span class="unit"></span>
							</span>
							<span class="sep"> / </span>
							<span class="value">
								<span class="number"><?php print($count); ?></span>
								<span class="unit">No.</span>
							</span>	
							
						</div>
						
                	</div>
            	</div>
			
				<div class="span2" onTablet="span4" onDesktop="span2">
                	<div class="circleStatsItemBox blue">
						<div class="header">kid</div>

						<span class="percent">percent</span>
						
						<div class="circleStat">
                    		<input type="text" value=<?php print ($kidsper); ?> class="whiteCircle" href="80"/>
						</div>		
						
						<div class="footer">
							<span class="count">
								<span class="number"><?php print ($kids); ?></span>
								<span class="unit"></span>
							</span>
							<span class="sep"> / </span>
							<span class="value">
								<span class="number"><?php print($count); ?></span>
								<span class="unit">No.</span>
							</span>	
							
						</div>
					</div>
				</div>

					


	</div> 
</div>
<div class="row-fluid">	
	<div class="box-header">
		<h2><i class="halflings-icon list-alt"></i><span class="break"></span>Sales</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>			
	</div>
	<div class="box-content" align="center">
		<div class="span2" onTablet="span4" onDesktop="span2">
                	<div class="circleStatsItemBox greenDark">
						<div class="header">Male</div>
						<span class="percent">percent</span>
						<div class="circleStat">
                    		<input type="text" value=<?php print($malesalesper); ?> class="whiteCircle" />
						</div>
						<div class="footer">
							<span class="count">
								<span class="number"><?php print($malesales); print('M')?></span>
								<span class="unit">&#x20B9;</span>
							</span>
							<span class="sep"> / </span>
							<span class="value">
								<span class="number"><?php print($totalsales); ?></span>
								<span class="unit">&#x20B9;</span>
							</span>	
						</div>
                	</div>
				</div>

			<div class="span2" onTablet="span4" onDesktop="span2">	
                	<div class="circleStatsItemBox green">
						<div class="header">Female</div>
						<span class="percent">percent</span>
						
                    	<div class="circleStat">
                    		<input type="text" value=<?php print ($femalesalesper); ?> class="whiteCircle" />
						</div>

						<div class="footer">
							<span class="count">
								<span class="number"><?php print ($femalesales); ?></span>
								<span class="unit">&#x20B9;</span>
							</span>
							<span class="sep"> / </span>
							<span class="value">
								<span class="number"><?php print ($totalsales); ?></span>
								<span class="unit">&#x20B9;</span>
							</span>	
							

						</div>
                	</div>
                	
			</div>		

			<div class="span2" onTablet="span4" onDesktop="span2">	
                	<div class="circleStatsItemBox blueDark">
						<div class="header">Kid</div>
						<span class="percent">percent</span>
						
                    	<div class="circleStat">
                    		<input type="text" value=<?php print ($kidsalesper); ?> class="whiteCircle" />
						</div>

						<div class="footer">
							<span class="count">
								<span class="number"><?php print ($femalesales); ?></span>
								<span class="unit">&#x20B9;</span>
							</span>
							<span class="sep"> / </span>
							<span class="value">
								<span class="number"><?php print ($totalsales); ?></span>
								<span class="unit">&#x20B9;</span>
							</span>	
							

						</div>
                	</div>
                	
			</div>
			
		</div>
</div>		<!--/.fluid-container-->
<div class="row-fluid">	
		<div class="box-header">
		<h2><i class="halflings-icon list-alt"></i><span class="break"></span>New Walk-in Vs Regular</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>			
	</div>

		<div class="box-content" align="center">

			<div class="span2" onTablet="span4" onDesktop="span2">	
                	<div class="circleStatsItemBox orange">
						<div class="header">New Walk-In</div>
						<span class="percent">percent</span>
						
                    	<div class="circleStat">
                    		<input type="text" value=<?php print ($memberper); ?> class="whiteCircle" />
						</div>

						<div class="footer">
							<span class="count">
								<span class="number"><?php print ($member); ?></span>
								<span class="unit"></span>
							</span>
							<span class="sep"> / </span>
							<span class="value">
								<span class="number"><?php print ($totalmem); ?></span>
								<span class="unit">No.</span>
							</span>	
							

						</div>
                	</div>
                	
			</div>

			<div class="span2" onTablet="span4" onDesktop="span2">	
                	<div class="circleStatsItemBox orangeDark">
						<div class="header">Regular</div>
						<span class="percent">percent</span>
						
                    	<div class="circleStat">
                    		<input type="text" value=<?php print ($nonmemberper); ?> class="whiteCircle" />
						</div>

						<div class="footer">
							<span class="count">
								<span class="number"><?php print ($nonmember); ?></span>
								<span class="unit"></span>
							</span>
							<span class="sep"> / </span>
							<span class="value">
								<span class="number"><?php print ($totalmem); ?></span>
								<span class="unit">No.</span>
							</span>	
							

						</div>
                	</div>
                	
			</div>

		</div>
	</div>
	
		<div class="row-fluid">

			<div class="box-header">
				<h2><i class="halflings-icon list-alt"></i><span class="break"></span>Billing</h2>
							<div class="box-icon">
								<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
								<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
								<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
							</div>
				</div>
				<div  class="box-content">
				<div class="widget green span5" onTablet="span6" onDesktop="span5">
					
					<h2><span class="glyphicons globe"><i></i></span>Billing Type</h2>
					
					<hr>
					
					<div class="content">
						<?php 
						foreach ($bill as $row)
						{
							$v="";
						?>
						<div class="verticalChart">
							
							<div class="singleBar">
							
								<div class="bar">
								
									<div class="value">
										<span><?php print(round(($row->amount/$totalbillamt)*100)); ?>%</span>
									</div>
								
								</div>
								
								<div class="title"><?php $v=$row->transaction_type; 
								if ($v == "CR")  print("Credit"); 
								elseif ($v == "DB") 
									print("Debit");
								elseif ($v == "VR")
									print("Voucher");
								
								?></div>
							
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			
			
			<span class="quick-button metro green span2" >
					<i class="icon-shopping-cart"></i>
					<p>Total Bill Amount</p>
					<span >&#x20B9;<?php print($totalbillamt); ?></span>
				</span>
			</div>
			</div>

			<div class="row-fluid">

			<div class="box-header">
				<h2><i class="halflings-icon list-alt"></i><span class="break"></span>Appointments</h2>
							<div class="box-icon">
								<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
								<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
								<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
							</div>
				</div>
				<div  class="box-content">
				
        					<!--<div id="chart-options" align="right">
								<a href="#"><i>Daily</i></a>
								<a href="#"><i>Weekly</i></a>
								<a href="#"><i>Monthly</i></a>
					     
						    </div> -->
							
				<div class="widget blue span5" onTablet="span6" onDesktop="span5">
					
					<h2><span class="glyphicons globe"><i></i></span>Appointments By Month</h2>
					
					<hr>
					
					<div class="content">
						<?php 
						foreach ($apptmonth as $row)
						{
							$v="";
						?>
						<div class="verticalChart">
							
							<div class="singleBar">
							
								<div class="bar">
								
									<div class="value">
										<span><?php print(round(($row->count/$totalapptmonth)*100)); ?>%</span>
									</div>
								
								</div>
								
								<div class="title"><?php $v=$row->month; 
								print(substr($v,0,3));								
								?></div>
							
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			
			
			<span class="quick-button metro blue span2" >
					<i class="icon-group"></i>
					<p>Total Appointments</p>
					<span>#<?php print($totalapptmonth); ?></span>
				</span>
			</div>
			</div>

<div class="row-fluid">	
		<div class="box-header">
		<h2><i class="halflings-icon list-alt"></i><span class="break"></span>Voucher By Gender</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>			
	</div>

		<div class="box-content" align="center">

			<div class="span2" onTablet="span4" onDesktop="span2">	
                	<div class="circleStatsItemBox red">
						<div class="header">Male</div>
						<span class="percent">percent</span>
						
                    	<div class="circleStat">
                    		<input type="text" value=<?php print ($malevoucherper); ?> class="whiteCircle" />
						</div>

						<div class="footer">
							<span class="count">
								<span class="number"><?php print ($malevoucher); ?></span>
								<span class="unit"></span>
							</span>
							<span class="sep"> / </span>
							<span class="value">
								<span class="number"><?php print ($totalvoucher); ?></span>
								<span class="unit">No.</span>
							</span>	
							

						</div>
                	</div>
                	
			</div>

			<div class="span2" onTablet="span4" onDesktop="span2">	
                	<div class="circleStatsItemBox blue ">
						<div class="header">Female</div>
						<span class="percent">percent</span>
						
                    	<div class="circleStat">
                    		<input type="text" value=<?php print ($femalevoucherper); ?> class="whiteCircle" />
						</div>

						<div class="footer">
							<span class="count">
								<span class="number"><?php print ($femalevoucher); ?></span>
								<span class="unit"></span>
							</span>
							<span class="sep"> / </span>
							<span class="value">
								<span class="number"><?php print ($totalvoucher); ?></span>
								<span class="unit">No.</span>
							</span>	
							

						</div>
                	</div>
                	
			</div>

		</div>
	</div>



