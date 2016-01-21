					<script type="text/javascript">
						$(document).ready(function () {
							$("#admin_list").dataTable({
								"ajax": {
									"type"   : "POST",
									"url"    : '/<?php echo ROOTPATH; ?>/index.php/admin/adminmain/getadminlist',
									"data"   : {'pid': '<?php echo $this->pid; ?>', 'start_date': '<?php echo $this->start_date; ?>', 'end_date': '<?php echo $this->end_date; ?>'},
									"dataSrc": ""
								},
								"columns": [
									{"className" : "text-center", "data" : "admin_id", "searchable": false},
									{"className" : "text-center", "data" : "admin_name", "searchable": true},
									{"className" : "text-center", "data" : "admin_depart", "searchable": false},
									{"className" : "text-center", "data" : "admin_email", "searchable": true},
									{"className" : "text-center", "data" : "admin_hp", "searchable": true},
									{"className" : "text-center", "data" : "last_login", "searchable": true},
									{"className" : "text-center", "data" : "admin_id", "searchable": true, "render" : function ( data, type, row, meta ) { return '<button class="btn btn-warning" data-toggle="modal" data-target="#modal_admin" data-adminid="' + row.admin_id + '" data-adminname="' + row.admin_name + '" data-admindepart="' + row.admin_depart + '" data-adminemail="' + row.admin_email + '" data-adminhp="' + row.admin_hp + '">수정</button>'; }}
								],
								"bDestroy": true,
								"oLanguage": {
									"sEmptyTable": "검색된 결과가 없습니다."
								},
								"bSort" : false
							});
							$("#user_block").dataTable.ext.errMode = "none";

							$("#modal_admin").on("show.bs.modal", function (e) {
								var button = $(e.relatedTarget);
								var modal = $(this);
								modal.find(".modal-body #admin_id").html(button.data("adminid"));
								modal.find(".modal-body input[name=admin_name]").val(button.data("adminname"));
								modal.find(".modal-body input[name=admin_depart]").val(button.data("admindepart"));
								modal.find(".modal-body input[name=admin_email]").val(button.data("adminemail"));
								modal.find(".modal-body input[name=admin_hp]").val(button.data("adminhp"));
							});

							$(document).on("change", $("#form_admin").find("input"), function () {
								$("#modal_admin > div > div > form > div > button.btn-success").removeClass("disabled");
							});

							$("#modal_admin").on("hidden.bs.modal", function() {
								$(this).find("form")[0].reset();
								$("#modal_admin > div > div > form > div > button.btn-success").addClass("disabled");
							});

							$(document).on("submit", "#form_admin", function (e) {
								e.preventDefault();
								$.ajax({
									url: '/<?php echo ROOTPATH; ?>/index.php/admin/adminmain/updateadmin',
									type: 'POST',
									data: { 'admin_id' : $(this).find(".modal-body #admin_id").html(), 'admin_name' : $(this).find("input[name=admin_name]").val(), 'admin_depart' : $(this).find("input[name=admin_depart]").val(), 'admin_email' : $(this).find("input[name=admin_email]").val(), 'admin_hp' : $(this).find("input[name=admin_hp]").val() },
									dataType: 'html',
									success: function(data){
										if ( data == '1' )
										{
											alert('수정이 완료되었습니다.');
											$('#admin_list').DataTable().ajax.reload();
											$('#modal_admin').modal('hide');
										}
										else
										{
											alert('오류가 발생하였습니다.');
											$('#modal_admin').modal('hide');
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
							<h2><span class="fa fa fa-envelope-o"></span>Admin list</h2>
						</div>
						<!-- END PAGE TITLE -->
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-horizontal">
									<!-- START DEFAULT DATATABLE -->
									<div class="panel panel-default form-horizontal">
										<div class="panel-heading">
											<h3 class="panel-title">Admin list</h3>
										</div>
										<div class="panel-body">
											<div class="table-responsive">
												<table class="display table table-striped" id="admin_list">
													<thead>
														<tr>
															<th style="width:10%">id</th>
															<th style="width:10%">name</th>
															<th style="width:10%">depart</th>
															<th style="width:20%">email</th>
															<th style="width:10%">hp</th>
															<th style="width:30%">login date</th>
															<th style="width:5%">manage</th>
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