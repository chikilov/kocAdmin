				</div>
				<!-- END PAGE CONTENT -->
			</div>
			<!-- END PAGE CONTAINER -->
			<!-- MESSAGE BOX-->
			<div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
				<div class="mb-container">
					<div class="mb-middle">
						<div class="mb-title"><span class="fa fa-sign-out"></span> 로그아웃 ?</div>
						<div class="mb-content">
							<p>로그아웃 하시겠습니까?</p>
							<p>계속 진행하려면 예를 아니면 아니오를 선택하세요.</p>
						</div>
						<div class="mb-footer">
							<div class="pull-right">
								<a href="/<?php echo ROOTPATH; ?>/index.php/admin/login" class="btn btn-success btn-lg">예</a>
								<button class="btn btn-default btn-lg mb-control-close">아니오</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END MESSAGE BOX-->
			<!-- MODALS -->
			<div class="modal" id="modal_block" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<form class="form_block" role="form_block" action="./ajax/ajax_user_block.php" method="post" >
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							<h4 class="modal-title" id="defModalHead">영구정지 하겠습니다.</h4>
						</div>
						<div class="modal-body form-group">
							<div class="user">
								<div class="name">PID : <?php echo $pid; ?>  | NAME : <?php echo $name; ?> </div>
							</div>
							<div class="form-group">
								<label>사유</label>
								<input name="pid" type="hidden" value="<?php echo $pid; ?>" />
								<input name="type" type="hidden" value="R" />
								<input name="text" type="text" class="form-control" placeholder="정지 사유를 입력하세요."/>
							</div>
							<div class="list-group-item">
								정지된 회원은 계정관리 → 제제관리에서 확인하실 수 있습니다.<br/>
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-default" >Send</button>
						</div>
						</form>
					</div>
				</div>
			</div>
			<!-- MODALS -->
			<!-- MODALS -->
			<div class="modal" id="modal_admin" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<form class="form_block" role="form_block" action="/" method="post" id="form_admin">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							<h4 class="modal-title" id="defModalHead">관리자 정보 변경</h4>
						</div>
						<div class="modal-body form-group">
							<div class="form-group">
								<label>ID</label>&nbsp;:&nbsp;<label id="admin_id">NAME</label>
							</div>
							<div class="form-group">
								<label>NAME</label>
								<input type="text" name="admin_name" class="form-control" value="" />
							</div>
							<div class="form-group">
								<label>NAME</label>
								<input type="text" name="admin_depart" class="form-control" value="" />
							</div>
							<div class="form-group">
								<label>NAME</label>
								<input type="text" name="admin_email" class="form-control" value="" />
							</div>
							<div class="form-group">
								<label>NAME</label>
								<input type="text" name="admin_hp" class="form-control" value="" />
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-success disabled" >Send</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
						</form>
					</div>
				</div>
			</div>
			<!-- MODALS -->
			<div class="modal" id="modal_restore" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<form class="form_restore" role="form_restore" action="./ajax/ajax_user_block.php" method="post" >
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							<h4 class="modal-title" id="defModalHead">영구정지 해지 하겠습니다.</h4>
						</div>
						<div class="modal-body form-group">
							<div class="user">
								<div class="name">PID : <?php echo $pid; ?>  | NAME : <?php echo $name; ?> </div>
							</div>
							<div class="form-group">
								<label>사유</label>
								<input name="pid" type="hidden" value="<?php echo $pid; ?>" />
								<input name="type" type="hidden" value="X" />
								<input name="text" type="text" class="form-control" placeholder="해지 사유를 입력하세요."/>
							</div>
							<div class="list-group-item">정지된 회원은 계정관리 → 제제관리에서 확인하실 수 있습니다.</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-default" >Send</button>
						</div>
						</form>
					</div>
				</div>
			</div>
			<!-- MODALS -->
			<div class="modal" id="modal_basic" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							<h4 class="modal-title" id="defModalHead">코멘트</h4>
						</div>
						<div class="modal-body">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>comment</th>
										<th>Name</th>
										<th>date</th>
									</tr>
								</thead>
								<tbody id = "comment_list">
								</tbody>
							</table>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<div class="modal animated fadeIn" id="modal_change_photo" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							<h4 class="modal-title" id="smallModalHead1">Change photo</h4>
						</div>
						<script type="text/javascript" src="/<?php echo ROOTPATH; ?>/static/js/plugins/bootstrap/bootstrap-file-input.js"></script>
						<div class="modal-body">
							<div class="text-center" id="cp_target">Use form below to upload file. Only .jpg files.</div>
							<form id="cp_crop" method="post" action="assets/crop_image.php">
								<input type="hidden" name="cp_img_path" id="cp_img_path"/>
								<input type="hidden" name="ic_x" id="ic_x"/>
								<input type="hidden" name="ic_y" id="ic_y"/>
								<input type="hidden" name="ic_w" id="ic_w"/>
								<input type="hidden" name="ic_h" id="ic_h"/>
							</form>
							</div>
							<div class="modal-body form-horizontal form-group-separated">
							<form id="cp_upload" method="post" enctype="multipart/form-data" action="assets/upload_image.php">
								<div class="form-group">
									<label class="col-md-4 control-label">New Photo</label>
									<div class="col-md-4">
										<input type="file" class="fileinput btn-info" name="file" id="cp_photo" data-filename-placement="inside" title="Select file" />
									</div>
								</div>
							</form>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-success disabled" id="cp_accept">Accept</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>

			<div class="modal animated fadeIn" id="modal_change_password" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							<h4 class="modal-title" id="smallModalHead2">Change password</h4>
						</div>
						<div class="modal-body">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer faucibus, est quis molestie tincidunt</p>
						</div>
						<div class="modal-body form-horizontal form-group-separated">
						<form id="jvalidate" role="form" class="form-horizontal" >
							<div class="form-group">
								<label class="col-md-3 control-label">Old Password</label>
								<div class="col-md-9">
									<input type="password" name="old_password" class="form-control" id="old_password"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">New Password</label>
								<div class="col-md-9">
									<input type="password" name="new_password"  class="form-control" id="new_password"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Repeat New</label>
								<div class="col-md-9">
									<input type="password" name="re_password"  class="form-control"  id="re_password"/>
								</div>
							</div>
						</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" id="password">Proccess</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<div class="modal animated fadeIn" id="modal_codelist" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							<h4 class="modal-title" id="smallModalHead3"></h4>
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table  class="display table" id="TopSearchTable">
									<thead>
										<tr>
											<th style="width: 10%">코드</th>
											<th style="width: 90%">이름</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td></td>
											<td></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<div class="modal animated fadeIn" id="modal_codeinfo" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							<h4 class="modal-title">캐릭터 확인</h4>
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="display table" id="TopSearchChar">
									<thead style="display: none;">
										<tr>
											<th style="width: 10%">코드</th>
											<th style="width: 90%">이름</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td></td>
											<td></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<div class="modal animated fadeIn" id="modal_sendresult" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							<h4 class="modal-title"></h4>
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table  class="display table" id="SendResultTable">
									<thead>
										<tr>
											<th style="width: 10%">결과</th>
											<th style="width: 90%">대상</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td></td>
											<td></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<div class="modal animated fadeIn" id="modal_couponlist" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							<h4 class="modal-title" id="smallModalHead3">쿠폰 상세</h4>
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table  class="display table" id="coupon_detail">
									<thead>
										<tr>
											<th style="width: 40%">등록일</th>
											<th style="width: 20%">등록자</th>
											<th style="width: 40%">쿠폰번호</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td></td>
											<td></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<!-- EOF MODALS -->
			<!-- BLUEIMP GALLERY -->
        <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
            <div class="slides"></div>
            <h3 class="title"></h3>
            <a class="prev">‹</a>
            <a class="next">›</a>
            <a class="close">×</a>
            <a class="play-pause"></a>
            <ol class="indicator"></ol>
        </div>
        <!-- END BLUEIMP GALLERY -->
<script type="text/javascript">
var jvalidate = $("#jvalidate").validate({
    ignore: [],
    rules: {
    		old_password: {
                    required: true,
                    minlength: 5,
                    maxlength: 10
            },
            new_password: {
                    required: true,
                    minlength: 5,
                    maxlength: 10
            },
            re_password: {
                    required: true,
                    minlength: 5,
                    maxlength: 10,
            },
        }
    });
</script>
<script type="text/javascript" src="/<?php echo ROOTPATH; ?>/static/js/plugins/jquery/jquery-migrate.min.js"></script>
<script type="text/javascript" src="/<?php echo ROOTPATH; ?>/static/js/plugins/bootstrap/bootstrap-file-input.js"></script>
<script type="text/javascript" src="/<?php echo ROOTPATH; ?>/static/js/plugins/form/jquery.form.js"></script>
<script type="text/javascript" src="/<?php echo ROOTPATH; ?>/static/js/plugins/cropper/cropper.min.js"></script>
<script type="text/javascript" src="/<?php echo ROOTPATH; ?>/static/js/demo_edit_profile.js"></script>
 <!-- START PRELOADS -->
        <audio id="audio-alert" src="/<?php echo ROOTPATH; ?>/static/audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="/<?php echo ROOTPATH; ?>/static/audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->
			<!-- START SCRIPTS -->
<?php
	if ( isset($pid) )
	{
?>
			<script type="text/javascript">
				var pid = '<?php echo $pid ?>';
			</script>
			<script type="text/javascript" src="/<?php echo ROOTPATH; ?>/static/js/quick.js"></script>
<?php
	}
?>
		<!-- START PLUGINS -->
		<script type="text/javascript" src="/<?php echo ROOTPATH; ?>/static/js/plugins/jquery/jquery-ui.min.js"></script>
		<!-- END PLUGINS -->
		<!-- THIS PAGE PLUGINS -->
		<script type="text/javascript" src="/<?php echo ROOTPATH; ?>/static/js/plugins/icheck/icheck.min.js"></script>
		<script type="text/javascript" src="/<?php echo ROOTPATH; ?>/static/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
		<script type="text/javascript" src="/<?php echo ROOTPATH; ?>/static/js/plugins/datatables/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="/<?php echo ROOTPATH; ?>/static/js/plugins/form/jquery.form.js"></script>
		<script type="text/javascript" src="/<?php echo ROOTPATH; ?>/static/js/plugins/bootstrap/bootstrap-select.js"></script>
		<script type="text/javascript" src="/<?php echo ROOTPATH; ?>/static/js/plugins/maskedinput/jquery.maskedinput.min.js"></script>
		<script type="text/javascript" src="/<?php echo ROOTPATH; ?>/static/js/excellentexport/excellentexport.min.js"></script>
		<script type="text/javascript" src="/<?php echo ROOTPATH; ?>/static/js/plugins/bootstrap/bootstrap-timepicker.min.js"></script>
		<script type="text/javascript" src="/<?php echo ROOTPATH; ?>/static/js/plugins/bootstrap/bootstrap-datepicker.js"></script>
		<!-- END THIS PAGE PLUGINS -->
		<!-- START TEMPLATE -->
		<!-- <script type="text/javascript" src="js/settings.js"></script> -->
		<script type="text/javascript" src="/<?php echo ROOTPATH; ?>/static/js/plugins.js"></script>
		<script type="text/javascript" src="/<?php echo ROOTPATH; ?>/static/js/actions.js"></script>
		<!-- END TEMPLATE -->
		<!-- END SCRIPTS -->
	</body>
</html>
