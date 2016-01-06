					<!-- PAGE CONTENT WRAPPER -->
					<div class="page-content-wrap" style="padding-top:10px;">
						<!-- START WIDGETS -->
						<div class="row">
							<div class="col-md-3">
								<!-- START WIDGET SLIDER -->
								<div class="widget widget-default widget-carousel">
									<div class="owl-carousel" id="owl-example">
										<div>
											<div class="widget-title">DAU</div>
											<div class="widget-subtitle plugin-date"></div>
											<div class="widget-int"><?echo number_format($dau)?></div>
										</div>
									</div>
									<div class="widget-controls">
										<a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
									</div>
								</div>
								<!-- END WIDGET SLIDER -->
							</div>
							<div class="col-md-3">
								<!-- START WIDGET REGISTRED -->
								<div class="widget widget-default widget-item-icon">
									<div class="widget-item-left"><span class="fa fa-user"></span></div>
									<div class="widget-data">
										<div class="widget-title">신규 가입 유저</div>
										<div class="widget-subtitle">Robot Heroes</div>
										<div class="widget-int num-count"><?echo number_format($todaynew)?></div>
									</div>
									<div class="widget-controls">
										<a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
									</div>
								</div>
								<!-- END WIDGET REGISTRED -->
							</div>
							<div class="col-md-3">
								<!-- START WIDGET CLOCK -->
								<div class="widget widget-danger widget-padding-sm">
									<div class="widget-big-int plugin-clock">00:00</div>
									<div class="widget-subtitle plugin-date">Loading...</div>
									<div class="widget-controls">
										<a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
									</div>
									<div class="widget-buttons widget-c3">
										<div class="col">
											<a href="#"><span class="fa fa-clock-o"></span></a>
										</div>
										<div class="col">
											<a href="#"><span class="fa fa-bell"></span></a>
										</div>
										<div class="col">
											<a href="#"><span class="fa fa-calendar"></span></a>
										</div>
									</div>
								</div>
								<!-- END WIDGET CLOCK -->
							</div>
						</div>
						<!-- END WIDGETS -->
					</div>
					<script type="text/javascript" src="/<?php echo ROOTPATH; ?>/static/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
					<script type="text/javascript" src="/<?php echo ROOTPATH; ?>/static/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
					<script type="text/javascript" src="/<?php echo ROOTPATH; ?>/static/js/plugins/owl/owl.carousel.min.js"></script>
					<!-- END PAGE CONTENT WRAPPER -->
