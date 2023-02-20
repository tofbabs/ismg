<?php global $host ?>
<?php include_once 'header.php' ?>

		<!-- Start right content -->
        <div class="content-page">
			<!-- ============================================================== -->
			<!-- Start Content here -->
			<!-- ============================================================== -->
            <div class="content">
				<div class="row">
				
		
					<div class="col-md-12">
						<div class="widget">
							<div class="widget-header transparent">
								<h2><strong>Users</strong></h2>
								<h5>Sample URL: <a href='http://64.150.185.206/ismg/sendsms?username=mobilloto&password=mobilloto&to=2348182113062&msg=Testing'>Sample URL: http://64.150.185.206/ismg/sendsms?username=campaign&password=campaign&to=2348182113062&msg=Testing</a></h5>
								
							</div>
							<div class="widget-content">
								<div class="data-table-toolbar">
									<div class="row">
										<div class="col-md-12">
											<div class="toolbar-btn-action">
												<a href="<?php echo $host?>/user/add" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add new</a>
											</div>
										</div>
									</div>
								</div>
									
								<div class="table-responsive">
									<table data-sortable class="table table-hover table-striped">
										<thead>
											<tr>
												<th>No</th>
												<th>Send Profile</th>
												<th>Shortcode</th>
												<th>SMSC</th>
												<th data-sortable="false">Option</th>
											</tr>
										</thead>
										
										<tbody>
											<?php if (isset($info)) :?>
											    <?php echo $info; ?>
											<?php endif; ?>
					
											<?php foreach ($users as $key => $user): ?>
											<tr>
												<td><?php echo $key+1 ?></td><td><strong><?php echo $user->getUsername() ?></strong></td>
												<td><?php echo $user->getShortCode() ?></td>
												<td><?php echo $user->getSMSC() ?></td>
												<td>
													<div class="btn-group btn-group-xs">
														<a href="<?php echo $host . '/user/delete/' . $user->getUsername()?>" data-toggle="tooltip" title="Off" class="btn btn-default"><i class="fa fa-trash-o"></i></a>
														<a href="<?php echo $host . '/user/edit/' . $user->getId()?>" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-edit"></i></a>
													</div>
												</td>
											</tr>
											<?php endforeach?>
											
										</tbody>
									</table>
								</div>
									
							</div>
						</div>
					</div>
						
				</div>

<?php include_once 'footer.php'; ?>