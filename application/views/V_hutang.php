<!-- Session Message -->
<?= $this->session->flashdata("msg") ?>

<!-- ///////////////////////// -->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">


	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
				<em class="fa fa-home"></em>
			</a></li>
			<li class="active">Dashboard</li>
		</ol>
	</div><!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Dashboard</h1>
		</div>
	</div><!--/.row-->

	<!-- Bagian Card Informasi Saldo -->
	<div class="panel panel-container">
		<div class="row">
			<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
				<div class="panel panel-teal panel-widget border-right">
					<div class="row no-padding"><em class="fa fa-xl fa-money color-blue"></em>
						<div style="font-size: 2em; margin-top: 10px">Rp.<?= $pengeluaran[1] ?></div>
						<div class="text-muted">Total Pengeluaran bulan ini</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
				<div class="panel panel-blue panel-widget border-right">
					<div class="row no-padding"><em class="fa fa-xl fa-download color-orange"></em>
						<div  style="font-size: 2em; margin-top: 10px"><?= count($pengeluaran[0]) ?></div>
						<div class="text-muted">Jumlah Pemasukan Bulan ini</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
				<div class="panel panel-orange panel-widget border-right">
					<div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
						<div style="font-size: 2em; margin-top: 10px">24</div>
						<div class="text-muted">New Users</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
				<div class="panel panel-red panel-widget ">
					<div class="row no-padding"><em class="fa fa-xl fa-search color-red"></em>
						<div style="font-size: 2em; margin-top: 10px">25.2k</div>
						<div class="text-muted">Page Views</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>

	
	<!-- Bagian Tabel data pinjaman -->
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Data Pinjaman Saya
					<button class="btn btn-success" data-toggle="modal" data-target="#pinjamanModal"><i class="fa fa-plus"></i></button>
					<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<?= $this->session->flashdata("form") ?>
							<table class="table table-striped">
								<thead>
									<tr>
										<td>NO</td>
										<td>Nama</td>
										<td>Hari/Tanggal</td>
										<td>Jam</td>
										<td>Nominal (Rp)</td>
										<td>Keterangan</td>
										<td>Aksi</td>
									</tr>
								</thead>
								<tbody>
									<?php $i=1; foreach ($pinjaman[0] as $key ) { ?>
										<tr>
											<td><?= $i++ ?></td>
											<td><?= $key["Nama"] ?></td>
											<td><?= $key["Hari_tanggal"] ?></td>
											<td><?= $key["Jam"] ?></td>
											<td>Rp.<?= $key["Nominal"] ?></td>
											<td><?= $key["Catatan"] ?></td>
											<td>
												<a class="btn btn-sm btn-danger konfirmasi" href="<?= base_url('Hutang/delete/').encrypt_url($key['ID']) ?>"><i class="fa fa-eraser"></i> Hapus</a>
												<a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#edit<?= $key['ID'] ?>"><i class="fa fa-pencil"></i> Edit</a>
												<a href="<?= base_url('Hutang/lunas').encrypt_url($key['ID']) ?>" class="btn btn-sm btn-success konfirmasi">Lunas</a>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>

						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Bagian Tables penghutang -->
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Data Peminjam
						<button class="btn btn-success" data-toggle="modal" data-target="#penghutangModal"><i class="fa fa-plus"></i></button>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
						<div class="panel-body">
							<div class="canvas-wrapper">
								<?= $this->session->flashdata("form") ?>
								<table class="table table-striped">
									<thead>
										<tr>
											<td>NO</td>
											<td>Nama</td>
											<td>Hari/Tanggal</td>
											<td>Jam</td>
											<td>Nominal (Rp)</td>
											<td>Keterangan</td>
											<td>Aksi</td>
										</tr>
									</thead>
									<tbody>
										<?php $i=1; foreach ($pinjaman[1] as $key ) { ?>
											<tr>
												<td><?= $i++ ?></td>
												<td><?= $key["Nama"] ?></td>
												<td><?= $key["Hari_tanggal"] ?></td>
												<td><?= $key["Jam"] ?></td>
												<td>Rp.<?= $key["Nominal"] ?></td>
												<td><?= $key["Catatan"] ?></td>
												<td>
													<a class="btn btn-sm btn-danger konfirmasi" href="<?= base_url('Hutang/delete/').encrypt_url($key['ID']) ?>"><i class="fa fa-eraser"></i> Hapus</a>
													<a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editPenghutang<?= $key['ID'] ?>"><i class="fa fa-pencil"></i> Edit</a>
												</td>
											</tr>
										<?php } ?>
									</tbody>
								</table>

							</div>
						</div>
					</div>
				</div>
			</div>


		</div>

		<!-- Modal Untuk Tambah data Pinjaman -->

		<div class="modal fade" id="pinjamanModal" tabindex="-1" role="dialog" aria-labelledby="tambah" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title" id="tambah">Tambah Pinjaman</h3>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						
						<?= form_open("Hutang/create/Meminjam") ?>

						<div class="form-group">
							<label>Nama</label>
							<input type="text" name="nama" class="form-control form-control-sm">
						</div>
						<div class="form-group">
							<label>Nominal</label>
							<input type="number" name="nominal" class="form-control form-control-sm">
						</div>
						
						<div class="form-group">
							<label>Catatan</label>
							<textarea class="form-control" name="catatan" ></textarea>
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary" name="save">Simpan</button>
						<?= form_close() ?>
					</div>
				</div>
			</div>
		</div>


		<!-- Modal Untuk edit data pinjaman -->

		
		<?php foreach ($pinjaman[0] as $key) { ?>
			<div class="modal fade" id="edit<?= $key['ID'] ?>" tabindex="-1" role="dialog" aria-labelledby="tambah" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h3 class="modal-title" id="tambah">Edit Data</h3>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							
							<?= form_open( "Hutang/update/".encrypt_url($key["ID"])."/".$key["Status"] ) ?>

							<div class="form-group">
								<label>Nama Pemasukan</label>
								<input type="text" name="nama" class="form-control form-control-sm" value="<?= $key['Nama'] ?>">
							</div>
							<div class="form-group">
								<label>Nominal</label>
								<input type="number" name="nominal" class="form-control form-control-sm" value="<?= $key['Nominal'] ?>">
							</div>
							
							<div class="form-group">
								<label>Keterangan</label>
								<textarea class="form-control" name="catatan"> <?= $key['Catatan'] ?>  </textarea>
							</div>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary" name="save">Simpan</button>
							<?= form_close() ?>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<!-- Modal Untuk Tambah data Penghutang -->

		<div class="modal fade" id="penghutangModal" tabindex="-1" role="dialog" aria-labelledby="tambah" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title" id="tambah">Tambah Penghutang</h3>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						
						<?= form_open("Hutang/create/Dipinjam") ?>

						<div class="form-group">
							<label>Nama</label>
							<input type="text" name="nama" class="form-control form-control-sm">
						</div>
						<div class="form-group">
							<label>Nominal</label>
							<input type="number" name="nominal" class="form-control form-control-sm">
						</div>
						
						<div class="form-group">
							<label>Catatan</label>
							<textarea class="form-control" name="catatan" ></textarea>
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary" name="save">Simpan</button>
						<?= form_close() ?>
					</div>
				</div>
			</div>
		</div>


		<!-- Modal Untuk edit data penghutang -->

		
		<?php foreach ($pinjaman[1] as $key) { ?>
			<div class="modal fade" id="editPenghutang<?= $key['ID'] ?>" tabindex="-1" role="dialog" aria-labelledby="tambah" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h3 class="modal-title" id="tambah">Edit Data</h3>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							
							<?= form_open( "Hutang/update/".encrypt_url($key["ID"])."/".$key["Status"] ) ?>

							<div class="form-group">
								<label>Nama Pemasukan</label>
								<input type="text" name="nama" class="form-control form-control-sm" value="<?= $key['Nama'] ?>">
							</div>
							<div class="form-group">
								<label>Nominal</label>
								<input type="number" name="nominal" class="form-control form-control-sm" value="<?= $key['Nominal'] ?>">
							</div>
							
							<div class="form-group">
								<label>Keterangan</label>
								<textarea class="form-control" name="catatan"> <?= $key['Catatan'] ?>  </textarea>
							</div>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary" name="save">Simpan</button>
							<?= form_close() ?>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
