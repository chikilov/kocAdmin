					<script type="text/javascript">
						$(document).ready(function () {
							$("#userfile").fileinput( { showUpload: false, showRemove:true } );

							$(document).on("click", "#templeteGroup > div > button", function () {
								$("#answer").val($(this).siblings("textarea").val().replace(/<br>/g, '\n'));
							});

							$(document).on("click", "#basicInfoFormSubmit", function (e) {
								e.preventDefault();
								$("#basicInfo").submit();
							});
						});
					</script>
					<!-- PAGE CONTENT WRAPPER -->
					<div class="page-content-wrap">
						<!-- PAGE TITLE -->
						<div class="page-title">
						</div>
						<!-- END PAGE TITLE -->
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-horizontal">
									<!-- START DEFAULT DATATABLE -->
									<div class="col-md-8">
										<!-- START SCROLLBAR -->
										<div class="panel panel-info">
											<div class="panel-heading">
												<h3 class="panel-title"><button type="button" class="btn  btn-info"><?php echo $question['category']; ?></button> <?php echo $question['subject']; ?></h3>
												<label class="form-group text-right pull-right">문의시간 : <?php echo $question['created']; ?></label>
											</div>
											<div class="panel-body scroll" style="height: 356px;">
												<h4><?php echo $question['memo']; ?></h4>
											</div>
										</div>
										<!-- END SCROLLBAR -->
									</div>
									<div class="col-md-4">
										<div class="panel panel-info form-horizontal">
											<div class="panel-body">
											</div>
											<div class="panel-body form-group-separated">
												<div class="form-group">
													<label class="col-md-4 col-xs-5 text-right">PID</label>
													<form id="basicInfo" method="post" action="/<?php echo ROOTPATH; ?>/index.php/admin/player/playerinfo">
													<div class="col-md-8 col-xs-7"><a id="basicInfoFormSubmit" href="#"><input type="hidden" name="pid" value="<?php echo $question['appid']; ?>" /><?php echo $question['appid']; ?></a></div>
													</form>
												</div>
												<div class="form-group">
												<label class="col-md-4 col-xs-5 text-right">닉네임</label>
												<div class="col-md-8 col-xs-7"><?php echo $question['nick']; ?></div>
												</div>
												<div class="form-group">
													<label class="col-md-4 col-xs-5 text-right">게임버전</label>
													<div class="col-md-8 col-xs-7"><?php echo $question['version']; ?></div>
												</div>
												<div class="form-group">
													<label class="col-md-4 col-xs-5 text-right">OS</label>
													<div class="col-md-8 col-xs-7"><?php echo $question['os']; ?></div>
												</div>
												<div class="form-group">
													<label class="col-md-4 col-xs-5 text-right">마켓</label>
													<div class="col-md-8 col-xs-7"><?php echo $question['vender']; ?></div>
												</div>
												<div class="form-group">
													<label class="col-md-4 col-xs-5 text-right">서버</label>
													<div class="col-md-8 col-xs-7"><?php echo $question['server']; ?></div>
												</div>
												<div class="form-group">
													<label class="col-md-4 col-xs-5 text-right">기종</label>
													<div class="col-md-8 col-xs-7"><?php echo $question['hp']; ?></div>
												</div>
												<div class="form-group">
													<label class="col-md-4 col-xs-5 text-right control-label"><button class="btn btn-default" data-toggle="modal" data-target="#modal_basic" id="com">코멘트</button></label>
													<div class="col-md-8 col-xs-7" ><input type="text" value="" class="form-control" id="comment"></div>
												</div>
											</div>
										</div>
									</div>
									<!-- END DEFAULT DATATABLE -->
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-horizontal">
									<!-- START DEFAULT DATATABLE -->
									<div class="col-md-10">
										<!-- START SCROLLBAR -->
										<form enctype="multipart/form-data" action="/<?php echo ROOTPATH; ?>/index.php/admin/customer/consultAnswer" method="post" >
										<div class="panel panel-default">
											<div class="panel-heading">
												<h3 class="panel-title">
<?php
	if ( $question['status'] == 1 )
	{
		echo '<button type="button" class="btn btn-sm btn-info">답변완료</button>';
		echo " ".$question['uname']." : ".$answer['created'];
	}
	else if ( $question['status'] == 2 )
	{
		echo '<button type="button" class="btn btn-sm  btn-warning">확인중</button>';
		echo " ".$question['uname']." : ".$answer['created'];
	}
	else
	{
		echo '<button type="button" class="btn btn-sm btn-danger">답변준비중</button>';
	}

	if ( !empty( $answer ) )
	{
		if ( $answer['check_time'] )
		{
			echo '<button type="button" class="btn btn-sm  btn-warning">답변 확인</button>';
			echo " ".$answer['check_time'];
		}
	}
?>
												</h3>
												<label class="check pull-right"><input type="checkbox" class="icheckbox" name="check" value ='1'<?php echo( $question['status'] == 2 ? " checked" : "");?>>확인중</label>
											</div>
											<div class="panel-body scroll">
<?php
	if ( !empty( $answer ) )
	{
		if ( $answer['up_file'] )
		{
			echo '<img src="/'.ROOTPATH.'/static/upload/csimg/'.$answer['up_file'].'" /><br><br>';
		}
	}
?>
												<input type="hidden" name="up_idx" value="<?php echo $question['idx']; ?>" />
												<input type="hidden" name="idx" value="<?php echo( !empty($answer) ? $answer['idx'] : '' ); ?>" />
												<div class="form-group">
													<div class="col-md-12">
														<input name="userfile" type="file" multiple class="file" data-preview-file-type="any" id="userfile" />
													</div>
												</div>
												<div class="col-md-11">
													<h4><textarea class="form-control" rows="15" name="answer" id="answer"><?php echo( !empty($answer) ? $answer['answer'] : '' ); ?></textarea></h4>
												</div>
												<div class="col-md-1">
													<button type="submit" class="btn btn-primary" style="width:100%; height: 195px">답<br>변<br>등<br>록</button>
												</div>
											</div>
										</div>
										</form>
										<!-- END SCROLLBAR -->
									</div>
								</div>
								<div class="form-horizontal">
									<!-- START DEFAULT DATATABLE -->
									<div class="col-md-2">
										<!-- START SCROLLBAR -->
										<div class="panel">
											<div class="panel-body" id="templeteGroup">
<?php
	if ( !empty( $comTemp ) )
	{
		foreach( $comTemp as $tempRow )
		{
?>
												<div class="form-group text-center">
													<button type="button" style="text-align: left" class="col-md-12 btn btn-md btn-primaty"><?php echo $tempRow['title']; ?></button>
													<textarea style="display:none"><?php echo $tempRow['memo']; ?></textarea>
												</div>
<?php
		}
	}

	if ( !empty( $indTemp ) )
	{
		foreach( $comTemp as $tempRow )
		{
?>
												<div class="form-group text-center">
													<button type="button" style="text-align: left" class="col-md-12 btn btn-md btn-info"><?php echo $tempRow['title']; ?></button>
													<textarea style="display:none"><?php echo $tempRow['memo']; ?></textarea>
												</div>
<?php
		}
	}
?>
											</div>
										</div>
										<!-- END SCROLLBAR -->
									</div>
									<!-- END DEFAULT DATATABLE -->
								</div>
							</div>
						</div>
						<!-- END PAGE CONTENT WRAPPER -->
						<script type="text/javascript" src="/<?php echo ROOTPATH; ?>/static/js/plugins/fileinput/fileinput.min.js"></script>
