		<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Create a New Appointment</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="container">
					<div class="box-content">
						<form class="form-horizontal">
						<input type="hidden" name="id"/>
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Customer Name</label>
							  <div class="controls">
								<input type="text" class="span5 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
								<!--<p class="help-block">Start typing to activate auto complete!</p>-->
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Appointment From ">Appointment From</label>
							  <div class="controls">
								<input type="text" class="input" id="datetimepickerstart" name="start_time">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Appointment To">Appointment To</label>
							  <div class="controls">
								<input type="text" class="input" id="datetimepickerend" name="end_time">
							  </div>
							</div>
						  	<div class="control-group">
								<label class="control-label" for="selectError1">Services</label>
								<div class="controls">
								  <select id="selectError1" multiple data-rel="chosen">
									<option>Option 1</option>
									<option selected>Option 2</option>
									<option>Option 3</option>
									<option>Option 4</option>
									<option>Option 5</option>
								  </select>
								</div>
							  </div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save changes</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
					</div> <!-- container -->
				</div><!--/span-->

			</div><!--/row-->     

<script>
	
$(document).ready(function(){
	$('#datetimepickerstart').datetimepicker();
	$('#datetimepickerend').datetimepicker();
});
</script>
