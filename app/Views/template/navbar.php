<aside class="main-sidebar">
	<!-- sidebar-->
	<section class="sidebar position-relative">
		<div class="multinav">
			<div class="multinav-scroll" style="height: 100%;">
				<!-- sidebar menu-->
				<ul class="sidebar-menu" data-widget="tree">
					<li class="header">Menu</li>
					<?php if (session()->get('role') == 'uploader') : ?>
						<li class="treeview">
							<a href="#">
								<i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
								<span>Dashboard PCE</span>
								<span class="pull-right-container" id="verifikasi">
									<i class="fa fa-angle-right pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?= base_url('dashboard') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Dashboard</a></li>

							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="mdi mdi-message-bulleted"><span class="path1"></span><span class="path2"></span></i>
								<span>Order Drawing</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-right pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?= base_url('order/drawing') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Order Drawing</a></li>
								<li><a href="<?= base_url('status/order') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Status Order Drawing</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="mdi mdi-file-multiple"><span class="path1"></span><span class="path2"></span></i>
								<span>Generate & Upload</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-right pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?= base_url('pdfnumber') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Penomoran Drawing</a></li>
								<li><a href="<?= base_url('insert/pdf') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Upload PDF</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="mdi mdi-book-multiple"><span class="path1"></span><span class="path2"></span></i>
								<span>Log Book </span>
								<span class="pull-right-container">
									<i class="fa fa-angle-right pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?= base_url('revisi') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Revisi Drawing</a></li>

							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="mdi mdi-publish"><span class="path1"></span><span class="path2"></span></i>
								<span>Publish & Trial</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-right pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?= base_url('listpdf') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>List Drawing Publish</a></li>
								<li><a href="<?= base_url('trial/drawing') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>List Drawing Trial</a></li>
							</ul>
						</li>
					<?php elseif (session()->get('role') == 'admin') : ?>
						<li class="treeview">
							<a href="#">
								<i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
								<span>Dashboard</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-right pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?= base_url('dashboard') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Dashboard</a></li>

							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="mdi mdi-verified"><span class="path1"></span><span class="path2"></span></i>
								<span>Verification Admin</span>
								<span class="pull-right-container" id="verifikasi">
									<i class="fa fa-angle-right pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?= base_url('verifikasi') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Verifikasi <span id="notif_verifikasi"></a></li>
								<li><a href="<?= base_url('update/subproses/') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Update Sub Proses</a></li>
								<li><a href="<?= base_url('update/typesubproses') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Update Type Sub Proses</a></li>
								<li><a href="<?= base_url('jenis_project') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Update Jenis Project</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="mdi mdi-publish"><span class="path1"></span><span class="path2"></span></i>
								<span>Publish & Trial</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-right pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?= base_url('publish') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>List Drawing Published</a></li>
								<li><a href="<?= base_url('trial/drawing') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>List Drawing Trial</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="mdi mdi-book-multiple"><span class="path1"></span><span class="path2"></span></i>
								<span>Log Book</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-right pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?= base_url('logbook') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Log Book Drawing</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="mdi mdi-message-bulleted"><span class="path1"></span><span class="path2"></span></i>
								<span>Order Drawing</span>
								<span class="pull-right-container" id="approve">
									<i class="fa fa-angle-right pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?= base_url('order/external') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Order Eksternal PCE <span id="notif_approve"></a></li>
								<li><a href="<?= base_url('order/internal') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Order Internal PCE</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
								<span>Project</span>
								<span class="pull-right-container" id="approve">
									<i class="fa fa-angle-right pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?= base_url('listproject') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>List Project<span id="notif_approve"></a></li>
							</ul>
						</li>
						<li class="header">Mold CBI</li>
						<li class="">
							<a target="_blank" href="https://portal3.incoe.astra.co.id/pce-mold-management/public/dashboard-admin">
								<i class="icon-File"><span class="path1"></span><span class="path2"></span></i>
								<span>Mold Management</span>
							</a>
						</li>
					<?php elseif (session()->get('role') == 'kasi') : ?>

						<li class="treeview">
							<a href="#">
								<i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
								<span>Dashboard</span>
								<span class="pull-right-container" id="verifikasi">
									<i class="fa fa-angle-right pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?= base_url('dashboard') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Dashboard</a></li>

							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
								<span>Publish & Trial</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-right pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?= base_url('publish/drawing') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>List Drawing Published</a></li>
								<li><a href="<?= base_url('trial/drawing') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>List Drawing Trial</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
								<span>Order Drawing</span>
								<span class="pull-right-container" id="approve">
									<i class="fa fa-angle-right pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?= base_url('order/external') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Order Eksternal PCE <span id="notif_approve"></a></li>
								<li><a href="<?= base_url('order/internal') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Order Internal PCE</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
								<span>Project</span>
								<span class="pull-right-container" id="approve">
									<i class="fa fa-angle-right pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?= base_url('create/project') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Create Project<span id="notif_approve"></a></li>
								<li><a href="<?= base_url('list/project') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>List Project<span id="notif_approve"></a></li>
							</ul>
						</li>
						<li class="header">Mold CBI</li>
						<li class="">
							<a target="blank" href="https://portal3.incoe.astra.co.id/pce-mold-management/public/dashboard-admin">
								<i class="icon-File"><span class="path1"></span><span class="path2"></span></i>
								<span>Mold Management</span>
							</a>
						</li>
					<?php elseif (session()->get('role') == 'reader_pce') : ?>
						<li class="treeview">
							<a href="#">
								<i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
								<span>Dashboard PCE</span>
								<span class="pull-right-container" id="verifikasi">
									<i class="fa fa-angle-right pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?= base_url('dashboard') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Dashboard</a></li>

							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
								<span>View Drawing</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-right pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?= base_url('listpdf') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>List Drawing Publish</a></li>
								<li><a href="<?= base_url('trial/drawing') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>List Drawing Trial</a></li>
							</ul>
						</li>
					<?php else : ?>
						<li class="treeview">
							<a href="#">
								<i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
								<span>View Drawing</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-right pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?= base_url('listpdf') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>List Drawing</a></li>
							</ul>
						</li>
					<?php endif; ?>
					</li>
				</ul>
			</div>
		</div>
	</section>

</aside>

<script src="<?= base_url() ?>/assets/js/jquery-3.7.1.min.js" type="text/javascript"></script>
<?php if (session()->get('role') == 'admin') : ?>
	<script>
		$(document).ready(function() {

			$.ajax({
				url: '<?= base_url() ?>total/masspro',
				type: 'GET',
				success: function(response) {
					const data = response.massproCount;

					if (data != 0) {
						$('#verifikasi').html('<i class="si-info si"></i>').css('color', 'red');
						$('#notif_verifikasi').text(data).css('color', 'red');

					} else {
						$('#verifikasi').removeAttr('id');
						$('#notif_verifikasi').removeAttr('id');

					}

				},
				error: function(error) {
					console.log('Error fetching data:', error);
				}
			});
			$.ajax({
				url: '<?= base_url() ?>total/approve',
				type: 'GET',
				success: function(response) {
					const data = response.ApproveCount;

					if (data != 0) {
						$('#approve').html('<i class="si-info si"></i>').css('color', 'red');
						$('#notif_approve').text(data).css('color', 'red');

					} else {
						$('#approve').removeAttr('id');
						$('#notif_approve').removeAttr('id');

					}

				},
				error: function(error) {
					console.log('Error fetching data:', error);
				}
			});

		});
	</script>
<?php else : ?>
	<script>

	</script>
<?php endif; ?>