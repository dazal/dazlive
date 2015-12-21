		<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon grey user"></i><span class="break"></span>Change Password</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="container">
					<div class="box-content">
						<form class="form-horizontal" action="<?php echo base_url();?>profile/change_pwd" method ="POST">
						<input type="hidden" name="username" value="<?php echo ($this->session->userdata('username')); ?>"/>
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="password">Current Password</label>
							  <div class="controls">
								<input type="password" class="input" id="password" name="password" value="<?php echo set_value('password'); ?>">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="new_password">New Password</label>
							  <div class="controls">
								<input type="password" class="input" id="new_password" name="new_password" value="<?php echo set_value('new_password'); ?>">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="confirm_new_password">Confirm New Password</label>
							  <div class="controls">
								<input type="password" class="input" id="confirm_new_password" name="confirm_new_password" value="<?php echo set_value('confirm_new_password'); ?>">
							  </div>
							</div>
							</fieldset>

						  </div>

                          <?php if(validation_errors()) { ?>
                          <div class="alert alert-danger">
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
				</div>
				</div>
			</div>	
				
		</div><!--/row-->   

