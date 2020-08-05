<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"></h1>
	</div>

	<div class="card shadow mb-4 col-md-12">

		<!-- Card Body -->
		<div class="card-body">
			<div class="row">
				<div class="col-md-5">
					<img src="<?= base_url('assets/uploads/' . $detailbarang['gambar']) ?>" alt="" class="card-img-top">
				</div>
				<div class="col-md-7">
					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="title">Nama Barang</label>
							<input type="text" class="form-control" autocomplete="off" name="namabarang" value="<?= $detailbarang['namabarang'] ?>">
							<label for="title">Deskripsi</label>
							<p><textarea class="form-control"><?= $detailbarang['deskripsi'] ?></textarea></p>
							<label for="title">Stok</label>
							<input type="number" class="form-control" autocomplete="off" name="stok" value="<?= $detailbarang['stok'] ?>">
							<label for="title">Harga</label>
							<input type="number" class="form-control" autocomplete="off" name="harga" value="<?= $detailbarang['harga'] ?>">
							<input type="hidden" class="form-control" autocomplete="off" name="id" id="title" value="<?= $detailbarang['id'] ?>">
							<a href="<?= base_url('admin/data_barang'); ?>" class="btn btn-primary mt-3"><i class="fas fa-angle-double-left"></i>Kembali</a>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<!-- /.container-fluid -->
