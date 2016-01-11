					<div class="row" style="max-height: 60px;">
						<!-- START INLINE FORM SAMPLE -->
						<div class="panel panel-default">
							<div class="panel-body">
								<form class="form-inline" role="form" action="<?php $_SERVER['PHP_SELF'];?>" method="post">
<?php
	if ( in_array('pid', $searchtype) )
	{
?>
								<div class="form-group">
									<label class="sr-only">PID</label>
									<input id="pid" name="pid" type="text" class="form-control" placeholder="USER PID" value="<?php echo ( $pid != '' ? $pid : '' ); ?>" />
								</div>
<?php
	}
	if ( in_array('name', $searchtype) )
	{
?>
								<div class="form-group">
									<label class=" sr-only">NAME</label>
									<input id="name" name="name" type="text" class="form-control" placeholder="USER NAME" value="<?php echo ( $name != '' ? $name : '' ); ?>" />
								</div>
<?php
	}
	if ( in_array('date', $searchtype) )
	{
?>
								<div class="form-group">
									<label class="col-md-3 sr-only">date</label>
									<div class="input-group">
										<input id = "start_date" name="start_date" type="text" class="form-control datepicker" value="<?php echo ( $start_date != '' ? $start_date : '' ); ?>" />
										<span class="input-group-addon add-on"> - </span>
										<input id = "end_date" name="end_date" type="text" class="form-control datepicker" value="<?php echo ( $end_date != '' ? $end_date : '' ); ?>" />
									</div>
								</div>
<?php
	}
	if ( in_array('datetime', $searchtype) )
	{
?>
								<div class="form-group">
									<label class="col-md-3 sr-only">date</label>
									<div class="input-group">
										<span><input id = "start_date" name="start_date" type="text" class="form-control datepicker" value="<?php echo ( $start_date != '' ? $start_date : '' ); ?>" /></span>
										<span><input id = "start_time" name="start_time" type="text" class="form-control timepicker24" value="<?php echo ( $start_time != '' ? $start_time : '' ); ?>" /></span>
										<span class="input-group-addon add-on"> - </span>
										<span><input id = "end_date" name="end_date" type="text" class="form-control datepicker" value="<?php echo ( $end_date != '' ? $end_date : '' ); ?>" /></span>
										<span><input id = "end_time" name="end_time" type="text" class="form-control timepicker24" value="<?php echo ( $end_time != '' ? $end_time : '' ); ?>" /></span>
									</div>
								</div>
<?php
	}
	if ( in_array('select', $searchtype) )
	{
?>
								<script type="text/javascript">
									$(document).ready(function () {
										$('#stype').val('<?php echo ( $stype ? $stype : '' ); ?>');
									});
								</script>
								<div class="form-group">
									<div class="col-md-12">
										<label class="sr-only">검색종류</label>
										<select class="form-control select" name="stype" id="stype">
											<option value="">검색 타입 선택</option>
											<option value="pid">PID</option>
											<option value="id">KOC ID</option>
											<option value="email">EMAIL</option>
											<option value="affiliate_name">Login Name</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="sr-only">검색어</label>
									<input id="svalue" name="svalue" type="text" class="form-control" value="<?php echo ( $svalue ? $svalue : '' ); ?>" />
								</div>
<?php
	}
?>
								<button id="user_id" class="btn btn-danger">Search</button>
								</form>
							</div>
						</div>
						<!-- END INLINE FORM SAMPLE -->
					</div>
