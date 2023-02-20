<?php include_once 'header.php' ?>

		<!-- Start right content -->
        <div class="content-page">
			<!-- ============================================================== -->
			<!-- Start Content here -->
			<!-- ============================================================== -->
            <div class="content">

				<div class="row">
					<div  class="col-lg-12 portlets">
						<div id="log-widget" class="widget">
							<div class="widget-header transparent">
								<h2><strong>Access Logs</h2>
								
								
							</div>

							<div class="widget-content padding">
								<div id="log"></div>
							</div>
							<button onclick="getLog('start');">Start Log</button>
						</div>
					</div>
				</div>


				<script>

					function getLog(timer) {
						var url = "<?php echo $host?>/log/tail";
						request.open("GET", url, true);
						request.onreadystatechange = updatePage;
						request.send(null);
						startTail(timer);
					}
					 
					function startTail(timer) {
							if (timer == "stop") {
							stopTail();
						} else {
							t= setTimeout("getLog()",7000);
						}
					}
					 
					function stopTail() {
						clearTimeout(t);
						var pause = "The log viewer has been paused. To begin viewing again, click the Start Viewer button.\n";
						logDiv = document.getElementById("log");
						var newNode=document.createTextNode(pause);
						logDiv.replaceChild(newNode,logDiv.childNodes[0]);
					}
					 
					function updatePage() {
						if (request.readyState == 4) {
							if (request.status == 200) {
								var currentLogValue = request.responseText.split("\n");
								eval(currentLogValue);
								logDiv = document.getElementById("log");
								var logLine = ' ';
								for (i=0; i < currentLogValue.length - 1; i++) {
									logLine += currentLogValue[i] + "\n";
								}
								logDiv.innerHTML=logLine;
							} else
								alert("Error! Request status is " + request.status);
						}
					}

					function createRequest() {
					 var request = null;
					  try {
					   request = new XMLHttpRequest();
					  } catch (trymicrosoft) {
					   try {
					     request = new ActiveXObject("Msxml2.XMLHTTP");
					   } catch (othermicrosoft) {
					     try {
					      request = new ActiveXObject("Microsoft.XMLHTTP");
					     } catch (failed) {
					       request = null;
					     }
					   }
					 }
					 
					 if (request == null) {
					   alert("Error creating request object!");
					 } else {
					   return request;
					 }
					}
					 
					var request = createRequest();
					$( "#log-widget" ).load(function() {
					  // Handler for .load() called.
					  // getLog('start')
					});
				</script>


<?php include_once 'footer.php'; ?>