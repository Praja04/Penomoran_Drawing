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
								<span>Generate & Upload</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-right pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?= base_url('/pdfnumber') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Penomoran Drawing</a></li>
								<li><a href="<?= base_url('/insert/pdf') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Upload PDF</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
								<span>Log Book </span>
								<span class="pull-right-container">
									<i class="fa fa-angle-right pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?= base_url('/revisi') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Revisi Drawing</a></li>
			
							</ul>
						</li>
					<?php elseif (session()->get('role') == 'admin') : ?>

						<li class="treeview">
							<a href="#">
								<i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
								<span>Verification Admin</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-right pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?= base_url('/verifikasi') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Verifikasi</a></li>
								<li><a href="<?= base_url('/update/subproses/') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Update Sub Proses</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
								<span>Drawing Publish</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-right pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?= base_url('/publish') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>List Drawing Published</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
								<span>Log Book</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-right pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?= base_url('/logbook') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Log Book Drawing</a></li>
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
								<li><a href="<?= base_url('/listpdf') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>List Pdf</a></li>
							</ul>
						</li>
					<?php endif; ?>
					</li>
				</ul>
			</div>
		</div>
	</section>
	<!-- <div class="sidebar-footer">
		<a href="javascript:void(0)" class="link" data-bs-toggle="tooltip" title="Settings"><span class="icon-Settings-2"></span></a>
		<a href="mailbox.html" class="link" data-bs-toggle="tooltip" title="Email"><span class="icon-Mail"></span></a>
		<a href="javascript:void(0)" class="link" data-bs-toggle="tooltip" title="Logout"><span class="icon-Lock-overturning"><span class="path1"></span><span class="path2"></span></span></a>
	</div> -->
</aside>