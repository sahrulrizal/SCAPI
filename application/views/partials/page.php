<div class="container">
	<section>
		<div id="list-music">
		<div class="row">
			<div class="col-md-12">
				<div class="key-info">
					<p>{{'Search for " '+searchn+' "'}}</p>
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
													<button type="button" id="klika" ng-click="oke(val.id)" value="{{val.id}}" class="kbtn btn btn-danger">PLAY</button>
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
							<nav>
								<ul class="pager">
									<!-- <li><a href="#">Previous</a></li> -->
									<li><a href="#/page/1">Next</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</section>
</div>