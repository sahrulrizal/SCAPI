<div class="panel panel-default">
	<div class="panel-heading"><?=$title_c?></div>
	<div class="panel panel-body">
		<div class="row">
			<div class="col-md-6"><a href="#" title="add genre"><button class="btn btn-success" data-toggle="modal" data-target="#addAdver" type="button">Add Adver</button></a></div>
			<div class="col-md-6">
				<form action="<?=site_url('admin/advertisement/');?>" method="get" accept-charset="utf-8">
					<input type="text" name="search"  class="form-control" placeholder="Search by title !">
				</form>
			</div>
		</div>
		<hr>
		<?php $no=1; if ($circle > 0) { ?>
		<table class="table">
			<tr>
				<td>No</td>
				<td>Title</td>
				<td>Status</td>
				<td>Action</td>
			</tr>
				<?php foreach ($circle as $key) {?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $key->title; ?></td>
					<td><?php echo "<div class='label label-success'>active</div>"; ?></td>
					<td>
					<a href="#" title="EDIT" data-toggle="modal" onclick="getAdver('<?=$key->id_adver?>')" data-target="#editAdver">Edit</a> | <a href="<?=site_url('proses/deleteAdver/'.$key->id_adver)?>" title="DELETE" onclick="return confirm('Are you sure ?');">Delete</a>
					</td>
				</tr>
				<?php } ?>
			</table>
<?php echo $this->pagination->create_links();  ?>
		<?php }else{
					echo "<span><h3>Sorry data not found!</h3></span>";				
				} ?>

			<!-- Add -->
			<div class="modal fade" id="addAdver" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Add Advertisement</h4>
						</div>
						<form action="<?=site_url('proses/addAdver');?>" method="post" accept-charset="utf-8">
							<div class="modal-body">
								<p>Title</p>
								<p><input type="text" class="form-control" name="title"></p>
								<p>Text/Javascript</p>
								<p>
									<textarea name="text" class="form-control"></textarea>
								</p>
							</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" name="sub" class="btn btn-success">Save</button>
						</div>
						</form>
					</div>
				</div>
			</div>

			<!-- Edit -->
			<div class="modal fade" id="editAdver" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Edit Adver</h4>
						</div>
						<form action="<?=site_url('proses/editAdver');?>" method="post" accept-charset="utf-8">
							<div class="modal-body">
								<input type="hidden" class="form-control" id="id" name="id" required >
								<p>Title</p>
								<p><input type="text" class="form-control" id="title" name="title" required></p>
								<p>Text</p>
								<p><textarea id="text" class="form-control" name="text" required></textarea></p>
							</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" name="sub" class="btn btn-primary">Save Changes</button>
						</div>
						</form>
					</div>
				</div>
			</div>
	</div>
</div>