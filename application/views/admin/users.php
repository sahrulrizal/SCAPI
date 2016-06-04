<div class="panel panel-default">
	<div class="panel-heading"><?=$title_c?></div>
	<div class="panel panel-body">
		<div class="row">
			<div class="col-md-6"><a href="#" title="add user"><button class="btn btn-success" data-toggle="modal" data-target="#addUser" type="button">Add User</button></a></div>
			<div class="col-md-6">
				<form action="<?=site_url('admin/users/');?>" method="get" accept-charset="utf-8">
					<input type="text" name="search"  class="form-control" placeholder="Search by name or username !">
				</form>
			</div>
		</div>
		<hr>
		<?php $no=1; if ($circle > 0) { ?>
		<table class="table">
			<tr>
				<td>No</td>
				<td>Name</td>
				<td>Username</td>
				<td>Status</td>
				<td>Action</td>
			</tr>
				<?php foreach ($circle as $key) {?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $key->name; ?></td>
					<td><?php echo $key->username; ?></td>
					<td><?php echo "<div class='label label-success'>active</div>"; ?></td>
					<td>
					<a href="#" title="EDIT" data-toggle="modal" onclick="getUser('<?=$key->id_user?>')" data-target="#editUser">Edit</a> <?php if ($key->id_user != $this->session->userdata('id_user')) { ?>| <a href="<?=site_url('proses/deleteUser/'.$key->id_user)?>" title="DELETE" onclick="return confirm('Are you sure delete this user ?');">Delete</a>
					<?php } ?>
					</td>
				</tr>
				<?php } ?>
			</table>
<?php echo $this->pagination->create_links();  ?>
		<?php }else{
					echo "<span><h3>Sorry data not found!</h3></span>";				
				} ?>

			<!-- Add -->
			<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Add User</h4>
						</div>
						<form action="<?=site_url('proses/addUser');?>" method="post" accept-charset="utf-8">
							<div class="modal-body">
								<p>Name</p>
								<p><input type="text" class="form-control" name="name"></p>
								<p>Username</p>
								<p><input type="text" class="form-control" name="username"></p>
								<p>Password</p>
								<p><input type="password" class="form-control" name="password"></p>
								<p>Re-password_</p>
								<p><input type="password" class="form-control" name="re_password"></p>
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
			<div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Edit User</h4>
						</div>
						<form action="<?=site_url('proses/editUser');?>" method="post" accept-charset="utf-8">
							<div class="modal-body">
								<p>Name</p>
								<input type="hidden" class="form-control" id="id" name="id" required >
								<p><input type="text" class="form-control" id="name" name="name" required ></p>
								<p>Username</p>
								<p><input type="text" class="form-control" id="username" name="username" required></p>
							<!-- 	<p>Password new</p>
								<p><input type="password" class="form-control" name="password"></p>
								<p>Re-password new</p>
								<p><input type="password" class="form-control" name="re-password"></p> -->
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