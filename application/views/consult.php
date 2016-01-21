					<script type="text/javascript">
						$(document).ready(function () {
							$(document).on("click", "#noResult", function () {
								$("#frmResult").submit();
							});

							$(document).on("click", ".clickpid", function (e) {
								e.preventDefault();
								$("#pid").val($(this).children("a").html());
								$("#pid").parent().parent().submit();
							});

							var data = { "pid" : "<?php echo $this->pid; ?>", "result" : "<?php echo $this->input->post('result'); ?>" };
							$('#dataTableList').dataTable({
								"ajax": {
									"type"   : "POST",
									"url"    : '/kocAdmin/index.php/admin/customer/consultList',
									"data"   : data,
									"dataSrc": ""
								},
								"deferRender": true,
								rowId: 'rowId',
								"columns": [
									{"data" : "idx"},
									{"data" : "created"},
									{"data" : "server"},
									{"className": "clickpid", "data" : "appid", "render": function ( data, type, row, meta ) { return "<a href=\"#\">" + data + "</a>";}},
									{"data" : "nick"},
									{"data" : "category"},
									{"className": "clicksubject", "data" : "subject", "render": function ( data, type, row, meta ) {
										return "<a href=\"/kocAdmin/index.php/admin/customer/consultview/" + row.idx + "\">" + data + "</a>";
									}},
									{"data" : "uname", "render": function ( data, type, row, meta ) {
										if ( data == '0' )
										{
											return "<span class=\"label label-danger\">미처리</span>";
										}
										else if ( data.indexOf('0_') >= 0 )
										{
											return "<span class=\"label label-warning\">" + data.substring(2, data.length) + "</span>";
										}
										else
										{
											return data;
										}
									}}
								],
								"order": [0, 'desc'],
								"bDestroy": true
							});

							$("#dataTableList").on( "draw.dt", function () {
								var objRow = $(this).children('tbody').children('tr');
								objRow.each(function () {
									var nowDate, createDate, datediff;
									if ( $(this).children("td").eq(7).html() == "<span class=\"label label-danger\">미처리</span>" )
									{
										nowDate = new Date();
										createDate = new Date( $(this).children("td").eq(1).html() );
										datediff = Math.floor(( Date.parse(nowDate) - Date.parse(createDate) ) / 86400000);
										if ( datediff > 0 )
										{
											$(this).addClass("danger");
										}
									}
								});
							});
						});
					</script>
					<!-- PAGE CONTENT WRAPPER -->
					<div class="page-content-wrap">
						<!-- PAGE TITLE -->
						<div class="page-title">
							<h2><span class="fa fa-envelope-o"></span>1:1 문의</h2>
						</div>
						<!-- END PAGE TITLE -->
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-horizontal">
									<!-- START DEFAULT DATATABLE -->
									<div class="panel panel-default form-horizontal">
										<div class="panel-heading">
											<form id="frmResult" method="post">
												<input type="hidden" name="result" value="no" />
											</form>
											<h3 class="panel-title">1:1 문의</h3> <button id="noResult" type="button" class="btn btn-md btn-danger pull-right" >미처리</button>
										</div>
										<div class="panel-body">
											<div class="table-responsive">
												<table class="display table" id="dataTableList">
													<thead>
														<tr>
															<th style="width:5%">No</th>
															<th style="width:15%">날짜</th>
															<th style="width:5%">서버</th>
															<th style="width:5%">pid</th>
															<th style="width:10%">닉네임</th>
															<th style="width:10%">카테고리</th>
															<th style="width:40%">제목</th>
															<th style="width:10%">처리자</th>
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
