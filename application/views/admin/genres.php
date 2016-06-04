<div class="panel panel-default">
	<div class="panel-heading"><?=$title_c?></div>
	<div class="panel panel-body">
		<div class="row">
			<div class="col-md-6"><a href="#" title="add genre"><button class="btn btn-success" data-toggle="modal" data-target="#addGenre" type="button">Add Genre</button></a></div>
			<div class="col-md-6">
				<form action="<?=site_url('admin/genres/');?>" method="get" accept-charset="utf-8">
					<input type="text" name="search"  class="form-control" placeholder="Search by genre !">
				</form>
			</div>
		</div>
		<hr>
		<?php $no=1; if ($circle > 0) { ?>
		<table class="table">
			<tr>
				<td>No</td>
				<td>Genre</td>
				<td>Status</td>
				<td>Action</td>
			</tr>
				<?php foreach ($circle as $key) {?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $key->genre; ?></td>
					<td><?php echo "<div class='label label-success'>active</div>"; ?></td>
					<td>
					<a href="#" title="EDIT" data-toggle="modal" onclick="getGenre('<?=$key->id_genre?>')" data-target="#editGenre">Edit</a> | <a href="<?=site_url('proses/deleteGenre/'.$key->id_genre)?>" title="DELETE" onclick="return confirm('Are you sure ?');">Delete</a>
					</td>
				</tr>
				<?php } ?>
			</table>
<?php echo $this->pagination->create_links();  ?>
		<?php }else{
					echo "<span><h3>Sorry data not found!</h3></span>";				
				} ?>

			<!-- Add -->
			<div class="modal fade" id="addGenre" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Add Genre</h4>
						</div>
						<form action="<?=site_url('proses/addgenre');?>" method="post" accept-charset="utf-8">
							<div class="modal-body">
								<p>Genre</p>
								<p><input type="text" class="form-control" name="genre"></p>
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
			<div class="modal fade" id="editGenre" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Edit Genre</h4>
						</div>
						<form action="<?=site_url('proses/editgenre');?>" method="post" accept-charset="utf-8">
							<div class="modal-body">
								<input type="hidden" class="form-control" id="id" name="id" required >
								<p>Genre</p>
								<p><input type="text" class="form-control" id="genre" name="genre" required></p>
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