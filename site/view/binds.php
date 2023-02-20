<?php include_once 'header.php' ?>

		<!-- Start right content -->
        <div class="content-page">
			<!-- ============================================================== -->
			<!-- Start Content here -->
			<!-- ============================================================== -->
            <div class="content">
				<div class="row">
						
					<?php foreach ($smscs as $key => $smsc) :  ?>

						
					<div class="col-sm-6 portlets">
						<div class="widget">
							<div class="widget-header ">
								<h2><i class="icon-chart-pie-1"></i> <strong><?php echo $smsc->id ?></strong>
									<span class="label label-success pull-right"><?php echo $smsc->status ?></span>
								</h2>
								
							</div>
							<div class="widget-content padding">
								<div id="bind-details<?php echo $key?>"></div>
								<div id="legend<?php echo $key?>"></div>
								<script>
									var chart = Morris.Donut({
									  element: 'bind-details<?php echo $key?>',
									  data: [
									    {label: "Sent SMS", value: <?php echo $smsc->sms->sent ?>},
									    {label: "Received SMS", value: <?php echo $smsc->sms->received ?>},
									    {label: "Queued SMS", value: <?php echo $smsc->queued ?>},
									    {label: "DLR", value: <?php echo $smsc->dlr->received ?>}
									  ],
									  labels: ['Sent SMS', 'Received SMS'],
									  labelColor: '#000',
									  colors: [
									     '#7a868f',
									     '#000000',
									     '#f57a82',
									     '#f4cda5' 
									     ]
									});
									chart.options.data.forEach(function(data, i){
									    var legendItem = $('<h4 style="font-weight: bold; "></h4>').text(data.label + " - " + data.value).css('color', chart.options.colors[i])
									    $('#legend<?php echo $key?>').append(legendItem)
									})
								</script>

							</div>
						</div>
					</div>

				<?php endforeach?>
				</div>


<?php include_once 'footer.php'; ?>