<?php include_once 'header.php' ?>

		<!-- Start right content -->
        <div class="content-page">
			<!-- ============================================================== -->
			<!-- Start Content here -->
			<!-- ============================================================== -->
            <div class="content">
				<div class="row">
					<div class="col-sm-6 portlets">
						<div class="widget">
							<?php 
							    if (isset($info)) {
							        # code...
							        echo $info;
							    }

							?>
							<div class="widget-header transparent">
								<h2><strong>Create Profile</strong></h2>
							</div>
							<div class="widget-content padding">
								<form role="form" id="registerForm" method="post" action="<?php echo $host ?>/user/add">
								<input type="hidden" name="id" value="<?php echo (!isset($profile)) ? NULL : trim($profile->getId()) ?>">
								  <div class="form-group">
									<label>Username</label>
									<input type="text" class="form-control" name="username" required="yes" value="<?php echo (!isset($profile)) ? NULL : trim($profile->getUsername()) ?>">
								  </div>
								  <div class="form-group">
									<div class="row">
										<div class="col-sm-6">
											<label>Password</label>
											<input id="password" type="password" class="form-control" required="yes" name="password" value="<?php echo (!isset($profile)) ? NULL : $profile->getPassword() ?>">
										</div>
										<div class="col-sm-6">
											<label>Re-Password<span id="error"></span></label>
											<input id="cpassword" type="password" class="cpassword form-control" required="yes" name="cpassword" value="<?php echo (!isset($profile)) ? NULL : $profile->getPassword() ?>">
										</div>
									</div>
								  </div>
								  
								  <?php 
								  
								  	if(isset($role) && $role == 'admin'): 
								  	else:
								  
								  ?>
								  <div class="form-group">
									<label>Network</label>
	                                    <select class="form-control" name="smsc">
	                                        <option>-- Select NETWORK BIND --</option>
	                                        <?php foreach ($smscs as $smsc) :  ?>
		                                        <option value="<?php echo $smsc->id ?>"><?php echo $smsc->id ?></option>
	                                    	<?php endforeach?>
	                                    </select>
								  </div>

								  <div class="form-group">
									<label>Shortcode</label>
	                                    <select class="form-control" name="shortcode">
	                                        <option>-- Select Shortcode --</option>
		                                    <option value="33088">33088</option>
		                                    <option value="33089">33089</option>
		                                    <option value="Mobilotto">Mobilotto</option>
	                                    </select>
								  </div>
								  
								  <?php endif; ?>

								  <?php if (isset($profile)) :?>
								  <button type="submit" class="btn btn-primary" name="editUserBtn">Update</button>
								  <?php else: ?>
								  <button type="submit" class="btn btn-primary" name="addUserBtn">Create</button>
								<?php endif ?>
								</form>
							</div>
						</div>

						<script type="text/javascript">

							password = $("input#password");
							cpassword = $("input#cpassword");

							$( "button" ).click(function() {
							    
								if (password.val() != cpassword.val()) { 
								   alert("Your password and confirmation password do not match.");
								   cpassword.focus();
								   return false; 
								}

							});

						</script>
			
						
					</div>

				</div>

<?php include_once 'footer.php'; ?>