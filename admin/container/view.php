<div class="content sm-gutter">
	<div class="container sm-padding-10 p-t-20">
		<div class="row m-b-30">
			<div class="col-lg-12 sm-m-t-10 d-flex">
				<div class="widget-11-2 card no-border card-condensed no-margin widget-loader-circle d-flex flex-column align-self-stretch">
					<div class="padding-25">
						<div class="pull-left">
							<h2 class="text-success no-margin">Data Container</h2>
							<!-- <p class="no-margin">Today's sales</p> -->
						</div>
						<div class="pull-right">
							<input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
						</div>
						<form method="post" action="index.php?page=container&aksi=tambah">
							<div class="pull-right"><button type="submit" class="btn btn-primary btn-cons">Tambah Data</button></div>
						</form>
						<div class="clearfix"></div>
					</div>
					<div class="auto-overflow widget">
						<table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch">
							<thead>
								<tr>
								<th style="width: 1%;">#</th>
								<th style="width: 15%;">No Container</th>
								<th style="width: 15%;">Nama Container</th>
								<th style="width: 20%;">Asal / Tujuan Container</th>								
								<th>Status</th>
								<th style="width: 20%;">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$query="SELECT * FROM container";
									$container->dataview($query);
								?>						    	
							</tbody>
						</table>				
						<br>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>