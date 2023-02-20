<?php include_once 'header.php' ?>

		<!-- Start right content -->
        <div class="content-page">
			<!-- ============================================================== -->
			<!-- Start Content here -->
			<!-- ============================================================== -->
            <div class="content">
				<div class="row">
					<div class="col-sm-12 portlets">
						<div class="widget">
							<div class="widget-header transparent">
								<h2><strong>New Service</strong></h2>
							</div>
							<div class="widget-content padding">
								<form role="form" id="bulkCampaignForm">
								  <div class="form-group">
									<label>Name</label>
									<input type="text" class="form-control" name="title">
								  </div>
								  <div class="form-group">
									<label>Message</label>
									<textarea class="form-control" name="description" style="height: 140px; resize: none;"></textarea>
								  </div>

								  <div class="form-group">
									<label>Network</label>
	                                    <select class="form-control" name="network">
	                                        <option value="">-- Select Network --</option>
	                                        <option value="admin">Etisalat</option>
	                                        <option value="monitor">Glo</option>
	                                    </select>
								  </div>
								  <button type="submit" class="btn btn-primary" name="startCampaignBtn">Create Service</button>
								</form>
							</div>
						</div>
			
						
					</div>

				</div>
				
				  

<?php include_once 'footer.php'; ?>