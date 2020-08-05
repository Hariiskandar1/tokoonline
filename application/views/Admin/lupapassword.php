<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
  </div>
  <!-- flas -->
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
  <div class="row">
    <div class="col-md-6">
      <?php echo $this->session->flashdata('massage'); ?>

    </div>

  </div>
  <div class="row">
    <div class="col-md-6">
      <form action="<?= base_url('admin/lupapassword') ?>" method="post">
        <div class="form-group">
          <label for="passwordSaatIni">Password Saat Ini</label>
          <input type="password" id="passwordSaatIni" name="passwordsaatini" class="form-control" >
          <?= form_error('passwordsaatini', ' <small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
          <label for="passwordBaru1">Password Baru</label>
          <input type="password" id="passwordBaru1" name="passwordbaru1" class="form-control">
          <?= form_error('passwordbaru1', ' <small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
          <label for="passwordBaru2">Confir Password Baru</label>
          <input type="password" id="passwordBaru2" name="passwordbaru2" class="form-control">
          <?= form_error('passwordbaru2', ' <small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Rubah Password</button>

        </div>


      </form>

    </div>

  </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
