// alert success
const flashdata = $('.flash-data').data('flashdata');
// const flashdata2 = $('.flash-data2').data('flashdata2');

if (flashdata) {
	Swal.fire({
		icon: 'success',
		title: 'Berhasil',
		text: 'Data berhasil ' + flashdata
	});
}
// if (flashdata2) {
// 	Swal.fire({
// 		icon: 'error',
// 		title: 'Berhasil',
// 		text: 'Data berhasil ' + flashdata2
// 	});
// }
// alert hapus
$('.tombol-hapus').on('click', function (e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Yakin Hapus Data ?',
		text: "Data akan di hapus permanent!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus',
		cancelButtonText: 'Batal'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})

});

$('.custom-check-input').on('change', function(){
	let fileName = $(this).val().split('\\').pop();
	$(this).next('.custom-file-label').addClass("selected").html(fileName);
});


$('.form-check-input').on('click' function(){
	const menuId = $(this).data('menu');
	const roleId = $(this).data('role');

	$.ajax({
		url: "<?= base_url('admin/changeaccess'); ?>",
		type: 'post',
		data: {
			menuId: menuId,
			roleId: roleId
		},
		success: function(){
			document.location.href = "<?= base_url('admin/roleaccess') ?>" + roleId;
		}
	});
});
