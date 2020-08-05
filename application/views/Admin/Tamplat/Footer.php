<!-- Footer -->
<footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
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

	<!-- Page level plugins -->
	<script src="<?=base_url('assets/')?>Admin/vendor/chart.js/Chart.min.js"></script>

	<!-- Page level custom scripts -->
	<script src="<?=base_url('assets/')?>Admin/js/demo/chart-area-demo.js"></script>
	<script src="<?=base_url('assets/')?>Admin/js/demo/chart-pie-demo.js"></script>

	<!-- Page level plugins -->
	<script src="<?=base_url('assets/')?>Admin/vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="<?=base_url('assets/')?>Admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

	<!-- Page level custom scripts -->
	<script src="<?=base_url('assets/')?>Admin/js/demo/datatables-demo.js"></script>

	<!-- alert 2 -->
	<script src="<?=base_url('assets/');?>Admin/js/sweetalert2.all.min.js"></script>

	<!-- script -->
	<script src="<?=base_url('assets/');?>Admin/js/script.js"></script>


	<!-- <script type="text/javascript">
	$('.custom-file-input').on('change', function() {
		let fileName = $(this).val().split('\\').pop();
		$(this).next('.custom-file-label').addClass("selected").html(fileName);
	});
	$(document).ready(function() {
		var $regexname = /^([a-zA-Z]{4,16})$/;
		var $regexusername = /^([a-zA-Z]{4,16})$/;
		$('.name').on('keypress keydown keyup', function() {
			if (!$(this).val().match($regexname)) {
				// there is a mismatch, hence show the error message
				$('.emsg').prop('hidden', false);
				$('.emsg').show();
			} else {
				// else, do not display message
				$('.emsg').prop('hidden', true);
			}
		});
		$('.username').on('keypress keydown keyup', function() {
			if (!$(this).val().match($regexusername)) {
				// there is a mismatch, hence show the error message
				$('.emsg2').prop('hidden', false);
				$('.emsg2').show();
			} else {
				// else, do not display message
				$('.emsg2').prop('hidden', true);
			}
		});
		$('.password').on('keypress keydown keyup', function() {
			if (!$(this).val().match($regexusername)) {
				// there is a mismatch, hence show the error message
				$('.emsg3').prop('hidden', false);
				$('.emsg3').show();
			} else {
				// else, do not display message
				$('.emsg3').prop('hidden', true);
			}
		});
	});
</script> -->

</body>

</html>
