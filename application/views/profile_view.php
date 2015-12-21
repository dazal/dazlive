		<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon grey user"></i><span class="break"></span>My Account / Profile</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="container">
					<div class="box-content">
						<form class="form-horizontal" action="<?php echo base_url();?>profile/update" method ="POST">
						<input type="hidden" name="id"/>

						<ul class="nav nav-tabs">
						  <li class="active"><a data-toggle="tab" href="#profile">Profile</a></li>
						  <li><a data-toggle="tab" href="#address">Address</a></li>
						</ul>
						<div class="tab-content">
						  <div id="profile" class="tab-pane fade in active">
						  <fieldset>
							
							<div class="control-group">
							  <label class="control-label" for="First Name">First Name</label>
							  <div class="controls">
								<input type="text" class="input" id="first_name" name="first_name" value="<?php echo set_value('first_name', $profiledata->first_name); ?>">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="Last Name ">Last Name</label>
							  <div class="controls">
								<input type="text" class="input" id="last_name" name="last_name" value="<?php echo set_value('last_name', $profiledata->last_name); ?>">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Email Address">Email Address</label>
							  <div class="controls">
								<input type="text" class="input" id="emailid" name="emailid" value="<?php echo set_value('emailid', $profiledata->emailid); ?>">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="Phone Number">Phone Number</label>
							  <div class="controls">
								<input type="text" class="input" id="phoneno" name="phoneno" value="<?php echo set_value('phoneno', $profiledata->phoneno); ?>">
							  </div>
							</div>

							</fieldset>

						  </div>
						  <div id="address" class="tab-pane fade">
						  <fieldset>
							
							<div class="control-group">
							  <label class="control-label" for="Address 1">Address 1</label>
							  <div class="controls">
								<input type="text" class="input" id="address1" name="address1" value="<?php echo set_value('address1', $profiledata->address1); ?>">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="Address 2">Address 2</label>
							  <div class="controls">
								<input type="text" class="input" id="address2" name="address2" value="<?php echo set_value('address2', $profiledata->address2); ?>">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="City">City</label>
							  <div class="controls">
								<input type="text" class="input" id="city" name="city" value="<?php echo set_value('city', $profiledata->city); ?>">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="State">State</label>
								<div class="controls">
								<select  class="input" id="state" name="state" selected="<?php echo set_value('state', $profiledata->state); ?>" >
									<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
									<option value="Andhra Pradesh">Andhra Pradesh</option>
									<option value="Arunachal Pradesh">Arunachal Pradesh</option>
									<option value="Assam">Assam</option>
									<option value="Bihar">Bihar</option>
									<option value="Chandigarh">Chandigarh</option>
									<option value="Chhattisgarh">Chhattisgarh</option>
									<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
									<option value="Daman and Diu">Daman and Diu</option>
									<option value="Delhi">Delhi</option>
									<option value="Goa">Goa</option>
									<option value="Gujarat">Gujarat</option>
									<option value="Haryana">Haryana</option>
									<option value="Himachal Pradesh">Himachal Pradesh</option>
									<option value="Jammu and Kashmir">Jammu and Kashmir</option>
									<option value="Jharkhand">Jharkhand</option>
									<option value="Karnataka">Karnataka</option>
									<option value="Kerala">Kerala</option>
									<option value="Lakshadweep">Lakshadweep</option>
									<option value="Madhya Pradesh">Madhya Pradesh</option>
									<option value="Maharashtra">Maharashtra</option>
									<option value="Manipur">Manipur</option>
									<option value="Meghalaya">Meghalaya</option>
									<option value="Mizoram">Mizoram</option>
									<option value="Nagaland">Nagaland</option>
									<option value="Orissa">Orissa</option>
									<option value="Pondicherry">Pondicherry</option>
									<option value="Punjab">Punjab</option>
									<option value="Rajasthan">Rajasthan</option>
									<option value="Sikkim">Sikkim</option>
									<option value="Tamil Nadu">Tamil Nadu</option>
									<option value="Telungana">Telungana</option>
									<option value="Tripura">Tripura</option>
									<option value="Uttarakhand">Uttarakhand</option>
									<option value="Uttar Pradesh">Uttar Pradesh</option>
									<option value="West Bengal">West Bengal</option>
								</select>
							<!-- Script by hscripts.com -->	
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="Postal Code">Postal Code</label>
							  <div class="controls">
								<input type="text" class="input" id="postal_code" name="postal_code" value="<?php echo set_value('postal_code', $profiledata->postal_code); ?>">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="Country">Country</label>
							  <div class="controls">
								<input type="text" class="input" id="country" name="country" value="<?php echo set_value('country', $profiledata->country); ?>">
							  </div>
							</div>

							</fieldset>

						  </div>

						</div> <!-- End Tab -->


<!--
							<fieldset>
							<div class="control-group">
							  <label class="control-label" for="Current Password ">Current Password</label>
							  <div class="controls">
								<input type="text" class="input" id="current_pass" name="current_pass">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="New Password">New Password</label>
							  <div class="controls">
								<input type="text" class="input" id="new_password" name="new_password">
							  </div>
							</div>
							</fieldset>	
-->
                          <?php if(validation_errors()) { ?>
                          <div class="alert alert-warning">
                          <?php echo validation_errors(); ?>
                          </div>
                          <?php } ?>

                          
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save</button>
							  <button type="reset" class="btn" onclick="location.href='<?php echo base_url();?>dashboard'">Cancel</button>
							</div>
						  </fieldset>

						</form>   

					</div>
					</div> <!-- container -->
				</div><!--/span-->

			</div><!--/row-->   