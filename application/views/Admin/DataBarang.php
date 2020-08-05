<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
		<div class="buton ml-auto">
			<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#add"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
		</div>
	</div>
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<!-- <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
  </div> -->
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Gambar</th>
							<th>Nama Barang</th>
							<th>Deskrisi</th>
							<th>Stok</th>
							<th>Harga</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($data_barang as $row) : ?>
							<tr>
								<td><img src="<?= base_url('assets/uploads/' . $row['gambar']) ?>" alt="" width="100"></td>
								<td><?= $row['namabarang'] ?></td>
								</td>
								<td><?= $row['deskripsi'] ?></td>
								<td><?= $row['stok'] ?></td>
								<td><?= $row['harga'] ?></td>
								<td>
									<a href="<?= base_url('Admin/deleteBarang/') ?><?= $row['id'] ?>" class="btn btn-sm btn-danger tombol-hapus"><i class="fas fa-trash"></i></a>
									<a href="<?= base_url('Admin/editbarang/') ?><?= $row['id'] ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
									<a href="<?= base_url('Admin/detailbarang/') ?><?= $row['id'] ?>" class="btn btn-sm btn-primary"><i class="fas fa-search fa-sm"></i></a>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalScrollableTitle">Tambah Barang</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?= base_url('admin/addBarang') ?>" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group">
						<label>Nama Barang</label>
						<input type="text" class="form-control name" name="namabarang" placeholder="......." minlength="4" required>
					</div>
					<div class="form-group">
						<label>Deskripsi</label>
						<input type="text" class="form-control name" name="deskripsi" placeholder="......." minlength="4" required>
					</div>
					<div class="form-group">
						<label>Stok Barang</label>
						<input type="number" class="form-control name" name="stok" placeholder="......." minlength="4" required>
					</div>
					<div class="form-group">
						<label>Harga Barang</label>
						<input type="numbers" class="form-control name" name="harga" placeholder="......." minlength="4" required>
					</div>
					<div class="form-group">
						<label for="image">Gambar</label>
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="image" name="gambar">
							<label class="custom-file-label" for="image">Choose file</label>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
