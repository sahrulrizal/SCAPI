<style type="text/css" media="screen">
	.daza{padding: 10px;}
	.key-info .src-or, .srch{height: 40px}
	.srch{line-height: 40px;}
	.daza .panel{border-radius: 2px;}
	.select {background: #555555;margin: 10px;color: #FFF;}
</style>
<div class="container">
	<section>
		<div id="list-music">
		<div class="row">
			<div class="col-md-12">
				<div class="key-info">
					<div class="row">
						<div class="col-md-4">
						 	<div class="src-or">
						 		{{txtrandom}}
						 	</div>
						</div>
						<div class="col-md-8">
							<div class="srch">
								{{srch}}
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="row">
					<!-- List-music -->
					<div class="col-md-6" ng-repeat="val in sc">
						<div class="music-box">
							<div class="row">
								<div class="col-md-3">
									<div class="music-box-img">
										<img src="{{val.artwork_url}}" alt="{{val.title}}">
									</div>
								</div>
								<div class="col-md-9">
									<div class="music-box-content">
										<div class="music-top">{{val.title}}</div>
										<div class="music-bottom">
											<div class="row">
												<div class="col-md-6">
													<button type="button" id="klika{{val.id}}" ng-click="oke(val.id)" class="kbtn btn btn-danger">PLAY</button>
												</div>
												<div class="col-md-6">
													<a href="<?=site_url('proses/down/');?>{{'/'+val.id}}" title="DOWNLOAD"><button  type="button" class="kbtn btn btn-success">DOWNLOAD</button></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="pagers">
							<div class="row">
								<div class="col-md-6" ng-repeat="val in prev"><a href="{{val.link}}{{val.lim}}{{'/'+val.q}}" class="btn btnw100 btn-warning" id="prev">Previous</a></div>
								<div class="col-md-6" ng-repeat="val in next"><a href="{{val.link+val.lim+val.q}}" class="btn btnw100 btn-primary">Next</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="row">
				<div class="col-md-12">
				 <div class="select daza">
				 	Select your genre :	<br>
					<select name="select" onchange="location = this.value;" class="form-control">
						<option value="#"></option>
						<?php foreach ($this->m_scapi->getAllGenres() as $key) { ?>
						<option value="#/page/1/<?=$key->genre?>"><?=$key->genre?></option>
						<?php } ?>
					</select>
				</div>
				</div>
				<?php foreach ($this->m_scapi->getAllAdver() as $key) { ?>
					<div class="col-md-12">
						<div class="daza">
						<div class="panel panel-danger">
							<div class="panel-heading"><?php echo $key->title; ?></div>
							<div class="panel-body no-padding"><?php echo $key->text; ?></div>
						</div>
						</div>
					</div>
				<?php } ?>
				</div>
			</div>
		</div>
		</div>
	</section>
</div>