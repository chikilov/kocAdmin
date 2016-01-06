					<script type="text/javascript">
						$(document).ready(function () {
							$("#user_mail").dataTable({
								"ajax": {
									"type"   : "POST",
									"url"    : '/<?php echo ROOTPATH; ?>/index.php/admin/mailbox/getmaillist',
									"data"   : {'pid': '<?php echo $this->pid; ?>', 'start_date': '<?php echo $this->start_date; ?>', 'end_date': '<?php echo $this->end_date; ?>'},
									"dataSrc": ""
								},
								"columns": [
									{"data" : "send_date", "searchable": false},
									{"data" : "receive_date", "searchable": false},
									{"data" : "expire_date", "searchable": false},
									{"className" : "text-center", "data" : "attach_type", "render" : function ( data, type, row, meta ) { return data + " ( " + row.attach_value + " )";}, "searchable": true},
									{"data" : "title", "searchable": true}
								],
								"bDestroy": true,
								"oLanguage": {
									"sEmptyTable": '검색된 결과가 없습니다.'
								},
								"bSort" : false
							});
							$("#user_mail").dataTable.ext.errMode = 'none';
						});
					</script>
					<!-- PAGE CONTENT WRAPPER -->
					<div class="page-content-wrap">
						<!-- PAGE TITLE -->
						<div class="page-title">
							<h2><span class="fa fa-envelope-o"></span>MAIL LOG</h2>
						</div>
						<!-- END PAGE TITLE -->
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-horizontal">
									<!-- START DEFAULT DATATABLE -->
									<div class="panel panel-default form-horizontal">
										<div class="panel-heading">
											<h3 class="panel-title">우편함</h3>
											<div class="btn-group pull-right">
												<a download="<?php echo date('Y-m-d'); ?>_pid<?=$pid?>_mail.xls" href="#" onclick="return ExcellentExport.excel(this, 'user_mail', 'user_mail');">
													<button class="btn btn-danger"><i class="fa fa-floppy-o"></i>Export XLS</button>
												</a>
											</div>
										</div>
										<div class="panel-body">
											<div class="table-responsive">
												<table class="display table table-striped" id="user_mail">
													<thead>
														<tr>
															<th style="width:15%">발신시간</th>
															<th style="width:15%">수신시간</th>
															<th style="width:15%">유효기간</th>
															<th style="width:20%">첨부아이템</th>
															<th style="width:30%">메세지</th>
														</tr>
													</thead>
													<tbody>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<!-- END DEFAULT DATATABLE -->
								</div>
							</div>
						</div>
					</div>
					<!-- END PAGE CONTENT WRAPPER -->