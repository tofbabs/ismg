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
								<h2><strong>Shortcodes</strong></h2>
							</div>
							<div class="widget-content">
								<div class="data-table-toolbar">
									<div class="row">
										<div class="col-md-12">
											<div class="toolbar-btn-action">
												<a href="<?php echo $host?>/shortcode/add" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add new</a>
											</div>
										</div>
									</div>
								</div>
									
								<div class="table-responsive">
									<table data-sortable class="table table-hover table-striped">
										<thead>
											<tr>
												<th>No</th>
												<th> Shortcode</th>
												<th>SMSC</th>
												<th> Value</th>
												<th>Type</th>
												<th data-sortable="false">Option</th>
											</tr>
										</thead>
										
										<tbody>
											<?php if (isset($info)) :?>
											    <?php echo $info; ?>
											<?php else: ?>
											<?php foreach ($shortcodes as $key => $sc): ?>
											<tr>
												<td><?php echo $key+1 ?></td><td><strong><?php echo $sc->getCode() ?></strong></td>
												<td><?php echo $sc->getSMSC() ?></td>
												<td><?php echo $sc->getValue() ?></td>
												<td><?php echo $sc->getType() ?></td>
												<td>
													<div class="btn-group btn-group-xs">
														<a href="<?php echo $host . '/shortcode/delete/' . $sc->getCode()?>" data-toggle="tooltip" title="Off" class="btn btn-default"><i class="fa fa-trash-o"></i></a>
														<a href="<?php echo $host . '/shortcode/edit/' . $sc->getCode()?>" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-edit"></i></a>
													</div>
												</td>
											</tr>
											<?php endforeach?>
											<?php endif; ?>
										</tbody>
									</table>
								</div>
									
							</div>
						</div>
					</div>
						
				</div>

<?php include_once 'footer.php'; ?>