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
								<h2><strong>Add New Shortcode</strong></h2>
							</div>
							<div class="widget-content padding">
								<form role="form" id="registerForm" method="post" action="<?php echo $host ?>/shortcode/add">
								  <div class="form-group">
									<label>Code</label>
									<input type="text" class="form-control" name="code" required="yes" value="<?php echo (!isset($shortcode)) ? NULL : $shortcode->getCode() ?>">
								  </div>

								  <div class="form-group">
									<label>Value <small>Cost Assigned to code</small></label>
									<input type="text" class="form-control" name="value" required="yes" value="<?php echo (!isset($shortcode)) ? NULL : $shortcode->getValue() ?>">
								  </div>

								  <div class="form-group">
									<label>Type <small>MO or MT</small></label>
										<select class="form-control" name="type">
	                                        <option>-- Select Type --</option>
		                                    <option value="MO" <?php echo (isset($shortcode) && "MO" == $shortcode->getType()) ? "selected='selected'": NULL ?> >MO</option>
		                                    <option value="MT" <?php echo (isset($shortcode) && "MT" == $shortcode->getType()) ? "selected='selected'": NULL ?> >MT</option>
	                                    </select>
								  </div>

								  <div class="form-group">
									<label>SMSC</label>
	                                    <select class="form-control" name="smsc">
	                                        <option value="">-- Select SMSC --</option>
	                                        <?php foreach ($smscs as $s): ?>
		                                        <option value="<?php echo $s->id ?>" <?php echo (isset($shortcode) && $s->id == $shortcode->getSMSC()) ? "selected='selected'": NULL ?>><?php echo $s->id ?></option>
	                                    	<?php endforeach?>
	                                    </select>
								  </div>
								  <?php if (isset($shortcode)) :?>
								  <button type="submit" class="btn btn-primary" name="editBtn">Update</button>
								  <?php else: ?>
								  <button type="submit" class="btn btn-primary" name="addBtn">Create</button>
								<?php endif ?>
								</form>
							</div>
						</div>
			
						
					</div>

				</div>

<?php include_once 'footer.php'; ?>