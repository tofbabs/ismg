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
							<div class="widget-header transparent">
								<h2><strong>Test Campaign</strong></h2>
							</div>
							<?php 
							    if (isset($info)) {
							        # code...
							        echo $info;
							    }

							?>
							<div class="widget-content padding">
								<form role="form" action="<?php echo $host?>/campaign/single" id="singleCampaignForm" method="post">
								 
								<div class="form-group">
								  	<label>Phone </label>
								  	<input type="text" class="form-control" name="msisdn" required="yes">
								</div>

								<div class="form-group">
								  	<label>Message </label>
								  	<textarea class="form-control" name="msg" required="yes"></textarea>
								</div>

								<div class="form-group">
									<label>Profile</label>
	                                    <select class="form-control" name="profile">
	                                        <option>-- Select PROFILE --</option>
	                                        <?php foreach ($profile as $p) :  ?>
		                                        <option value="<?php echo $p->getUsername() ?>"><?php echo $p->getUsername() ?></option>
	                                    	<?php endforeach?>
	                                    </select>
								  </div>

								  <button type="submit" class="btn btn-primary" name="testCampaignBtn">Test</button>
								</form>
							</div>
						</div>
			
						
					</div>

				</div>
				
				  

<?php include_once 'footer.php'; ?>