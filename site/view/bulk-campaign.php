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
								<h2><strong>New Campaign</strong></h2>
							</div>
							<div class="widget-content padding">
								<?php 
								    if (isset($info)) {
								        # code...
								        echo $info;
								    }

								?>
								<form role="form" id="bulkCampaignForm" action="<?php echo $host?>/campaign/bulk" method="post" enctype="multipart/form-data">

								<ul id="demo1" class="nav nav-tabs">
									<li class="active">
										<a href="#file" data-toggle="tab" aria-expanded="true">File Upload</a>
									</li>
									<li>
										<a href="#textarea" data-toggle="tab" aria-expanded="false">Multiple Phone Numbers</a>
									</li>
								</ul>
								
								</br>
								<div class="tab-content">
									<div class="tab-pane fade active in" id="file">
										<div class="form-group">
						
											<div class="form-group">
											  	<label>Select File: </label>
											  	<input type="file" name="file" class="form-control btn btn-default" title="Select file">
											</div>

											<div class="form-group">
											  	<label>Message </label>
											  	<textarea onkeyup="textCounter(this,'counter',2000);" class="form-control" name="msg"></textarea>
											  	<p><input disabled  maxlength="5" size="5" value="0" id="counter"></p>
											</div>
													
										</div>

									</div> <!-- / .tab-pane -->

									<div class="tab-pane fade" id="textarea">
										<div class="form-group">
  											<label for="comment">Separate Phone Numbers with comma:</label>
											<textarea class="form-control" name="msisdn" rows="5" id="msisdn"></textarea>
										</div>

										<div class="form-group">
										  	<label>Message </label>
										  	<textarea onkeyup="textCounter(this,'counter2',2000);" class="form-control" name="msg"></textarea>
										  	<p><input disabled  maxlength="5" size="5" value="0" id="counter2"></p>
										</div>

									</div> <!-- / .tab-pane -->
								</div> <!-- / .tab-content -->

								  
								<div class="form-group">
									<label>Profile</label>
	                                    <select class="form-control" name="profile">
	                                        <option>-- Select PROFILE --</option>
	                                        <?php foreach ($profile as $p) :  ?>
		                                        <option value="<?php echo $p->getUsername() ?>"><?php echo $p->getUsername() ?></option>
	                                    	<?php endforeach?>
	                                    </select>
								  </div>
								  
								  <input type="submit" class="btn btn-primary" name="startCampaignBtn" value="Start Campaign">
								</form>
							</div>
						</div>
			
						
					</div>

				</div>

				<script>

					function textCounter(field,field2,maxlimit)
					{
					 var countfield = document.getElementById(field2);
					 if ( field.value.length > maxlimit ) {
					  field.value = field.value.substring( 0, maxlimit );
					  return false;
					 } else {
					  countfield.value = field.value.length;
					 }
					}
					</script>
				</script>
				  

<?php include_once 'footer.php'; ?>