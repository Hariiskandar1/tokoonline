<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
	</div>
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<!-- <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
  </div> -->
		<div class="card-body">
			<div class="table-responsive">
        <h5>Role : <?= $role['role'] ?></h5>
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th width="5%" class="text-center">NO</th>
							<th>Nama Menu</th>
							<th width="15%" class="text-center">Access</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach ($menu as $row) : ?>
							<tr>
								<td scope="col-2" class="text-center"><?= $i; ?></td>
								<td scope="col"><?= $row['menu'] ?></td>
								</td>
								<td class="text-center">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" <?= check_access($role['id'], $row['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $row['id']; ?>">
                  </div>
								</td>
							</tr>
							<?php $i++; ?>
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
