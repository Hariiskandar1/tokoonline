
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $title ; ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?=base_url('assets/')?>Admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?=base_url('assets/')?>Admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-12 col-md-10">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- flash -->
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12 ">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900">Perbaiki Password!</h1>
                    <h5 class="mb-4"><?= $this->session->userdata('reset_email'); ?></h5>
                    <?php echo $this->session->flashdata('massage'); ?>
                  </div>
                  <form class="user" method="post" action="<?= base_url('Auth/changepassword'); ?>">
                    <div class="form-group">
                      <input type="password" name="password1" id="password1" class="form-control form-control-user mb-1" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukan password baru....">
                      <?= form_error('password1', ' <small class="text-danger pl-3">', '</small>'); ?>
                      <input type="password" name="password2" id="password2" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Ulangi password....">
                      <?= form_error('password2', ' <small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <!-- <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div> -->
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Reset password
                    </button>
                    <!-- <hr>
                    <a href="index.html" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a> -->
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url('assets/')?>Admin/vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url('assets/')?>Admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url('assets/')?>Admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url('assets/')?>Admin/js/sb-admin-2.min.js"></script>

  <!-- alert 2 -->
	<script src="<?=base_url('assets/');?>Admin/js/sweetalert2.all.min.js"></script>

	<!-- script -->
	<script src="<?=base_url('assets/');?>Admin/js/script.js"></script>

</body>

</html>
