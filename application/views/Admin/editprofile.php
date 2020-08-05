<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"></h1>
	</div>

	<div class="card shadow mb-4 col-md-12">
    <!-- flash -->
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
		<!-- Card Body -->
		<?=form_open_multipart('admin/editprofil');?>
		<div class="card-body">
			<div class="row">
				<div class="col-md-5">
					<img src="<?=base_url('assets/img/profile/' . $user['gambar'])?>" alt="" class="card-img-top">
					<div class="form-group mt-3">
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="gambar">
							<label class="custom-file-label" for="inputGroupFile04">Pilih file</label>
						</div>
					</div>
				</div>
				<div class="col-md-7">
					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="title">Nama</label>
							<input type="text" class="form-control" autocomplete="off" name="nama" value="<?=$user['nama']?>">
              <?= form_error('nama', '<small class="text-danger">','</small><br>'); ?>
							<label for="title">Email</label>
							<input type="text" class="form-control" autocomplete="off" name="email" value="<?=$user['email']?>" readonly>
							<label for="title">Active</label>
							<input type="number" class="form-control" autocomplete="off" name="" value="">
							<label for="title">role_id</label>
							<input type="number" class="form-control" autocomplete="off" name="" value="">
							<input type="hidden" class="form-control" autocomplete="off" name="id" id="title" value="<?=$user['id']?>">
						</div>
						<div class="col-md-6">
							<a href="<?= base_url('admin/data_barang'); ?>" class="btn btn-primary"><i class="fas fa-angle-double-left"></i>Kembali</a>
						</div>
						<div class="col-md-6">
							<button type="submit" class="btn btn-primary float-right">Simpan</button>
						</div>
					</div>
				</div>
			</div>

		</div>
		</form>
	</div>
</div>
<!-- /.container-fluid -->
