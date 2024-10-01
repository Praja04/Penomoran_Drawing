 <?= $this->extend('template/layout'); ?>

 <?= $this->section('content') ?>

 <div class="content-wrapper">
     <div class="container-full">
         <!-- Content Header (Page header) -->
         <div class="content-header">
             <div class="d-flex align-items-center">
                 <div class="me-auto">
                     <h3 class="page-title">Detail Project</h3>
                     <div class="d-inline-block align-items-center">
                         <nav>
                             <ol class="breadcrumb">
                                 <li class="breadcrumb-item">
                                     <a href="#"><i class="mdi mdi-home-outline"></i></a>
                                 </li>
                                 <li class="breadcrumb-item" aria-current="page">
                                     Project
                                 </li>
                                 <li class="breadcrumb-item active" aria-current="page">
                                     Detail
                                 </li>
                             </ol>
                         </nav>
                     </div>
                 </div>
             </div>
         </div>
         <!-- Main content -->
         <section class="content">
             <div class="row">
                 <div class="col-12 col-lg-7 col-xl-8">
                     <div class="nav-tabs-custom">
                         <ul class="nav nav-tabs">
                             <li>
                                 <a href="#timdrafter" data-bs-toggle="tab">Tools</a>
                             </li>
                             <li>
                                 <a class="active" href="#dokumen" data-bs-toggle="tab">Dokumen</a>
                             </li>

                         </ul>

                         <div class="tab-content">
                             <div class="tab-pane" id="timdrafter">
                                 <div class="box">
                                     <div class="media-list media-list-divided media-list-hover">
                                         <?php if (!empty($project_detail)) : ?>
                                             <?php foreach ($project_detail as $data) : ?>
                                                 <div class="media align-items-center">
                                                     <span class="badge badge-dot badge-warning"></span>
                                                     <a class="avatar avatar-lg" href="#">
                                                         <img src="<?= base_url() ?>/images/avatar/5.jpg" alt="..." />
                                                     </a>

                                                     <div class="media-body">
                                                         <p>
                                                             <a href="#"><strong><?= $data['nama_project']; ?></strong></a>
                                                             <small class="sidetitle"><?= count($data) > 0 ? 'Project' : 'Tidak ada detail'; ?></small>
                                                         </p>
                                                         <p><?= $data['nama_drafter']; ?></p>
                                                         <ul>
                                                             <li>Part : <?= $data['nama_part']; ?> </li>
                                                         </ul>

                                                     </div>

                                                     <div class="media-right gap-items">
                                                         <a class="media-action lead" href="#" data-id-drafter="<?= $data['id_drafter'] ?>" data-nama-project="<?= $data['nama_project'] ?>" data-nama-part="<?= $data['nama_part'] ?>" data-bs-toggle="modal" data-bs-target="#updateDetailModal" title="Update"><i class="ti-settings"></i></a>

                                                         <a href="#" class="media-action lead" data-id-drafter="<?= $data['id_drafter'] ?>" data-nama-project="<?= $data['nama_project'] ?>" data-nama-part="<?= $data['nama_part'] ?>" data-bs-toggle="modal" data-bs-target="#deletedrafterModal" title="Delete"><i class="ti-trash"></i></a>
                                                     </div>
                                                 </div>
                                             <?php endforeach; ?>
                                         <?php else : ?>
                                             <div class="media align-items-center">
                                                 <span class="badge badge-dot badge-warning"></span>
                                                 <div class="media-body">

                                                     <i>Belum ada detail project, tambahkan detail!</i>

                                                 </div>


                                             </div>
                                         <?php endif; ?>
                                     </div>
                                 </div>
                             </div>
                             <!-- /.tab-pane -->

                             <div class="active tab-pane" id="dokumen">
                                 <div class="box no-shadow">
                                     <div class="box">
                                         <div class="media-list media-list-divided media-list-hover">
                                             <?php if (!empty($dokumen_detail)) : ?>
                                                 <?php foreach ($dokumen_detail as $data) : ?>
                                                     <div class="media align-items-center" style="margin-bottom:10px;">
                                                         <a href="#" class="avatar avatar-lg btn-pdf-modal" data-pdf="<?= base_url('uploads/dokumen/' . $data['dokumen']); ?>">
                                                             <span class="mdi mdi-file mdi-28px"></span>
                                                         </a>

                                                         <div class="media-body btn-pdf-modal" data-pdf="<?= base_url('uploads/dokumen/' . $data['dokumen']); ?>">
                                                             <p>
                                                                 <a href="#"><strong><?= $data['nama_dokumen']; ?></strong></a>
                                                                 <small class="sidetitle"><?= count($data) > 0 ? 'Dokumen' : 'Tidak ada detail'; ?></small>
                                                             </p>
                                                             <p><i>klik disini</i></p>
                                                         </div>
                                                         <div class="media-right gap-items">
                                                             <a href="#" data-id-dokumen="<?= $data['id_dokumen'] ?>" class="media-action lead" data-bs-toggle="modal" data-bs-target="#deletedokumenModal" title="Delete"><i class="ti-trash"></i></a>
                                                         </div>
                                                     </div>
                                                 <?php endforeach; ?>
                                             <?php else : ?>
                                                 <div class="media align-items-center">
                                                     <span class="badge badge-dot badge-warning"></span>
                                                     <div class="media-body">

                                                         <i>Belum ada dokumen project, tambahkan dokumen!</i>

                                                     </div>


                                                 </div>
                                             <?php endif; ?>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <!-- /.tab-pane -->
                         </div>
                         <!-- /.tab-content -->
                     </div>
                     <!-- /.nav-tabs-custom -->
                 </div>

                 <div class="col-lg-4 col-md-5">
                     <div class="box box-widget widget-user">
                         <!-- Add the bg color to the header using any of the bg-* classes -->
                         <div class="widget-user-header bg-img bbsr-0 bber-0" style="
                         background: #efe1e1
                        center center;
                         " data-overlay="5">
                             <h3 class="widget-user-username text-white">
                                 <?= $project['nama_pengaju'] ?>
                             </h3>
                             <h6 class="widget-user-desc text-white">creator</h6>
                         </div>
                         <div class="widget-user-image">
                             <img class="rounded-circle" src="<?= base_url() ?>assets/template/images/avatar/3.jpg" alt="User Avatar" />
                         </div>
                         <div class="box-footer">
                             <div class="row">
                                 <div class="col-sm-6">
                                     <div class="description-block">
                                         <h5 class="description-header"><?= $project['nama_project'] ?></h5>
                                         <span class="description-text">Project</span>
                                     </div>
                                     <!-- /.description-block -->
                                 </div>
                                 <div class="col-sm-6">
                                     <div class="description-block">
                                         <h5 class="description-header">
                                             <?= date('d F Y', strtotime($project['created_at'])) ?>
                                         </h5>
                                         <span class="description-text">Created at</span>
                                     </div>
                                     <!-- /.description-block -->
                                 </div>
                                 <!-- /.col -->
                             </div>
                             <!-- /.row -->
                         </div>
                     </div>

                     <div class="box no-shadow">
                         <div class="box-body">
                             <a data-bs-toggle="modal" data-bs-target="#drafterModal" class="btn btn-success mt-10 d-block text-center">+ Add New Tools</a>
                             <a data-bs-toggle="modal" data-bs-target="#dokumenModal" class="btn btn-info mt-10 d-block text-center">+ Add New Dokumen</a>
                         </div>
                     </div>

                 </div>
             </div>
             <div class="row">
                 <div class="box">
                     <div class="box-header with-border">
                         <h3>List Order Drawing</h3>
                     </div>
                     <div class="row">
                         <div class="col-12">
                             <div class="box">
                                 <div class="box-body">
                                     <div class="table-responsive">
                                         <table id="example121" class="table mt-0 table-hover no-wrap  text-center">
                                             <thead>
                                                 <tr>
                                                     <th>No</th>
                                                     <th>Nama Drafter</th>
                                                     <th>Nama Part Drawing</th>
                                                     <th>Keterangan </th>
                                                     <th>Tanggal Order</th>
                                                     <th>Due Date</th>
                                                     <th>Status</th>
                                                     <th>File</th>
                                                     <th>Progress Drawing</th>
                                                 </tr>

                                             </thead>
                                             <tbody id="user">
                                                 <?php $i = 1;
                                                    foreach ($order_drawings as $user) : ?>

                                                     <tr class="">
                                                         <td><?= $i++; ?></td>
                                                         <td><?= $user['nama_drafter']; ?></td>
                                                         <td><?= $user['nama_part']; ?></td>
                                                         <td><?= $user['keterangan'] ?></td>
                                                         <td><?= $user['tanggal_order'] ?></td>
                                                         <td>
                                                             <?php
                                                                $tanggal_jatuh_tempo = strtotime($user['tanggal_jatuh_tempo']);
                                                                $tanggal_sekarang = strtotime(date('Y-m-d'));

                                                                if ($tanggal_jatuh_tempo < $tanggal_sekarang && $user['status'] != 'selesai') : ?>
                                                                 <span style="color: red; font-weight: bold;">
                                                                     <?= $user['tanggal_jatuh_tempo']; ?> - Overdue
                                                                 </span>
                                                             <?php else : ?>
                                                                 <?= $user['tanggal_jatuh_tempo']; ?>
                                                             <?php endif; ?>
                                                         </td>
                                                         <td>
                                                             <?php if ($user['status'] == 'open') : ?>
                                                                 <button style="margin: 2px;" class="btn btn-info">Open</button>

                                                             <?php elseif ($user['status'] == 'proses') : ?>
                                                                 <button style="margin: 2px;" class="btn btn-warning">On Progress</button>

                                                             <?php elseif ($user['status'] == 'selesai') : ?>
                                                                 <button class="btn btn-success">Done</button>
                                                             <?php else : ?>
                                                                 -
                                                             <?php endif; ?>

                                                         </td>
                                                         <td>
                                                             <?php if ($user['drawing_pdf'] != null) : ?>
                                                                 <button type="button" class="btn btn-link btn-pdf-modal" data-pdf="<?= base_url('uploads/trial/' . $user['drawing_pdf']); ?>">
                                                                     <i class="fa fa-file-pdf-o"></i> Lihat PDF
                                                                 </button>
                                                             <?php else : ?>
                                                                 Belum Upload
                                                             <?php endif; ?>
                                                         </td>
                                                         <td>
                                                             <?php if ($user['progress'] != null) : ?>
                                                                 <?= $user['progress'] ?>
                                                             <?php else : ?>
                                                                 <span class="badge badge-danger">Belum input</span>
                                                             <?php endif; ?>
                                                         </td>
                                                     </tr>
                                                 <?php endforeach; ?>

                                             </tbody>

                                         </table>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <!-- Modal -->
             <div class="modal fade" id="drafterModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="modalLabel">Add New Tools</h5>
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                         </div>
                         <div class="modal-body">
                             <!-- Form untuk menambahkan drafter -->
                             <form id="form-project">
                                 <input type="hidden" id="nama_project1" value="<?= $project['nama_project'] ?>">
                                 <input type="hidden" id="id_project1" value="<?= $project['id_project'] ?>">
                                 <div class="form-group">
                                     <label class="form-label">Nama Drafter :</label>
                                     <select name="nama_drafter1" id="nama_drafter1" class="form-select" required>
                                         <?php foreach ($data_user as $data) : ?>
                                             <option value="<?= $data['nama'] ?>" data-id-drafter="<?= $data['npk'] ?>"><?= $data['nama'] ?></option>
                                         <?php endforeach; ?>
                                     </select>
                                 </div>

                                 <div class="form-group">
                                     <label class="form-label">Nama Part :</label>
                                     <input type="text" id="nama_part" name="nama_part" class="form-control" required>
                                 </div>

                                 <div class="form-group">
                                     <label class="form-label">Order Dari : </label>
                                     <input type="text" id="seksi" name="seksi" class="form-control" required value="internal" disabled>

                                 </div>
                                 <div class="form-group" id="additional-input-container"></div>
                                 <div class="form-group">
                                     <label class="form-label">Tanggal Order (otomatis - today)</label>
                                     <input type="text" class="form-control" id="tanggal_order" disabled>
                                 </div>

                                 <div class="form-group">
                                     <label class="form-label">Due Date</label>
                                     <input type="date" class="form-control" id="due_date" required>
                                 </div>
                                 <!-- Tambahkan field lain jika perlu -->
                             </form>
                         </div>
                         <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                             <button type="submit" id="submitBtn" class="btn btn-primary">Save Drafter</button>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="modal fade" id="deletedrafterModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="modalLabel">Delete Drafter</h5>
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                         </div>
                         <div class="modal-body">
                             <!-- Form untuk menambahkan drafter -->
                             <form id="form-project">
                                 <input type="hidden" id="nama_project_delete">
                                 <input type="hidden" id="nama_part_delete">
                                 <input type="hidden" id="id_drafter_delete">
                             </form>
                             <label for="delete">Apakah kamu yakin menghapus drafter ini?</label>
                         </div>
                         <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                             <button type="submit" id="deleteDrafter" class="btn btn-danger">Delete Drafter</button>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="modal fade" id="updateDetailModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="modalLabel">Update Detail</h5>
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                         </div>
                         <div class="modal-body">
                             <!-- Form untuk menambahkan drafter -->
                             <form id="form-project">
                                 <input type="hidden" id="nama_project_update">
                                 <input type="hidden" id="nama_part_update">
                                 <input type="hidden" id="id_drafter_update">
                                 <div class="form-group">
                                     <label class="form-label">Nama Part :</label>
                                     <input type="text" id="nama_part_new" name="nama_part_new" class="form-control" required>
                                 </div>
                                 <div class="form-group">
                                     <label class="form-label">Due Date</label>
                                     <input type="date" class="form-control" name="due_date_new" id="due_date_new" required>
                                 </div>
                             </form>
                         </div>
                         <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                             <button type="submit" id="updateDetail" class="btn btn-primary">Update Detail</button>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="modal fade" id="deletedokumenModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="modalLabel">Delete Dokumen</h5>
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                         </div>
                         <div class="modal-body">
                             <!-- Form untuk menambahkan drafter -->
                             <form id="form-project">
                                 <input type="hidden" id="id_dokumen_delete">
                             </form>
                             <label for="delete">Apakah kamu yakin menghapus dokumen ini?</label>
                         </div>
                         <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                             <button type="submit" id="deleteDokumen" class="btn btn-danger">Delete Dokumen</button>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="modal fade" id="dokumenModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="modalLabel">Add New Dokumen</h5>
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                         </div>
                         <div class="modal-body">
                             <!-- Form untuk menambahkan drafter -->
                             <form id="form-dokumen" enctype="multipart/form-data">
                                 <input type="hidden" id="nama_project" value="<?= $project['nama_project'] ?>">
                                 <input type="hidden" id="id_project" value="<?= $project['id_project'] ?>">

                                 <div class="form-group">
                                     <label class="form-label">Nama Dokumen :</label>
                                     <input type="text" id="nama_dokumen" name="nama_dokumen" class="form-control" required>
                                 </div>

                                 <div class="form-group">
                                     <label class="form-label">Dokumen : </label>
                                     <input type="file" id="dokumen" name="dokumen" class="form-control" required>
                                 </div>

                                 <!-- Tambahkan field lain jika perlu -->
                             </form>
                         </div>
                         <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                             <button type="submit" id="submitBtnDokumen" class="btn btn-primary">Save Dokumen</button>
                         </div>
                     </div>
                 </div>
             </div>


             <div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="alertModalLabel">Notif</h5>
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                         </div>
                         <div class="modal-body" id="modalMessage">
                             <!-- Message will be inserted here -->
                         </div>
                         <div class="modal-footer">
                             <button type="button" class="btn btn-primary" id="modalok" data-bs-dismiss="modal">OK</button>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
                 <div class="modal-dialog modal-lg">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="pdfModalLabel">Dokumen Viewer</h5>
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                         </div>
                         <div class="modal-body">
                             <embed id="pdfViewer" src="" type="application/pdf" width="100%" height="600px">
                         </div>
                     </div>
                 </div>
             </div>
         </section>
         <!-- /.content -->
     </div>
 </div>
 <script src="<?= base_url() ?>assets/js/jquery-3.7.1.min.js" type="text/javascript"></script>
 <script>
     $(document).ready(function() {
         const baseUrl = "<?= base_url() ?>";
         const waktuSekarang = new Date();
         const tahun = waktuSekarang.getFullYear();
         const bulan = waktuSekarang.getMonth() + 1;
         const tanggal = waktuSekarang.getDate();
         $('#tanggal_order').val(`${bulan}/${tanggal}/${tahun}`);
         $('.btn-pdf-modal').on('click', function() {
             var pdfUrl = $(this).data('pdf');
             $('#pdfViewer').attr('src', pdfUrl);
             $('#pdfModal').modal('show');
         });
         $('#deletedrafterModal').on('show.bs.modal', function(event) {
             var button = $(event.relatedTarget);
             var id_drafter = button.data('id-drafter');
             var nama_project = button.data('nama-project');
             var nama_part = button.data('nama-part');
             var modal = $(this);
             modal.find('#id_drafter_delete').val(id_drafter);
             modal.find('#nama_part_delete').val(nama_part);
             modal.find('#nama_project_delete').val(nama_project);
         });

         $('#deletedokumenModal').on('show.bs.modal', function(event) {
             var button = $(event.relatedTarget);
             var id_dokumen = button.data('id-dokumen');
             var modal = $(this);
             modal.find('#id_dokumen_delete').val(id_dokumen);
         });

         $('#updateDetailModal').on('show.bs.modal', function(event) {
             var button = $(event.relatedTarget);
             var id_drafter = button.data('id-drafter');
             var nama_project = button.data('nama-project');
             var nama_part = button.data('nama-part');
             var modal = $(this);
             modal.find('#id_drafter_update').val(id_drafter);
             modal.find('#nama_part_update').val(nama_part);
             modal.find('#nama_project_update').val(nama_project);
         });

         $('#nama_drafter').on('change', function() {
             var selectedDrafterId = $(this).find(':selected').data('id-drafter');
             $('#nama_drafter').data('selected-id', selectedDrafterId); // Simpan nilai drafter ID di elemen
         });

         $('#submitBtn').on('click', function() {
             const inputs = $('#form-project').find('input, select');
             let isValid = true;


             inputs.each(function() {
                 if ($(this).prop('required') && !$(this).val()) {
                     showModal('Semua inputan harus diisi.');
                     $(this).focus();
                     isValid = false;
                     return false;
                 }
             });

             if (isValid) {
                 submitData(baseUrl);
             }
         });

         $('#deleteDokumen').on('click', function() {
             var formData = new FormData();
             formData.append('id_dokumen', $('#id_dokumen_delete').val());
             $.ajax({
                 url: baseUrl + 'delete/dokumen',
                 type: 'POST',
                 data: formData,
                 processData: false,
                 contentType: false,
                 success: function(response) {
                     $('#deletedokumenModal').modal('hide');
                     $('#modalok').on('click', function() {
                         location.reload();
                     });
                     showModal(response.message, function() {});
                 },
                 error: function(xhr, status, error) {
                     console.error('Error:', error);
                     showModal('Terjadi kesalahan saat mengirim data.');
                 }
             });
         });


         $('#updateDetail').on('click', function() {
             console.log($('#due_date_new').val());
             var formData = new FormData();
             formData.append('nama_project', $('#nama_project_update').val());
             formData.append('id_drafter', $('#id_drafter_update').val());
             formData.append('nama_part_old', $('#nama_part_update').val());
             formData.append('nama_part_new', $('#nama_part_new').val());
             formData.append('due_date_new', $('#due_date_new').val());
             $.ajax({
                 url: baseUrl + 'update/detail',
                 type: 'POST',
                 data: formData,
                 processData: false,
                 contentType: false,
                 success: function(response) {
                     $('#updateDetailModal').modal('hide');
                     $('#modalok').on('click', function() {
                         location.reload();
                     });
                     showModal(response.message, function() {});
                 },
                 error: function(xhr, status, error) {
                     console.error('Error:', error);

                     showModal('Terjadi kesalahan saat mengirim data.');
                 }
             });
         });



         $('#deleteDrafter').on('click', function() {
             var formData = new FormData();
             formData.append('nama_project', $('#nama_project_delete').val());
             formData.append('id_drafter', $('#id_drafter_delete').val());
             formData.append('nama_part', $('#nama_part_delete').val());

             $.ajax({
                 url: baseUrl + 'delete/drafter',
                 type: 'POST',
                 data: formData,
                 processData: false,
                 contentType: false,
                 success: function(response) {
                     $('#deletedrafterModal').modal('hide');
                     $('#modalok').on('click', function() {
                         location.reload();
                     });
                     showModal(response.message, function() {});
                 },
                 error: function(xhr, status, error) {
                     console.error('Error:', error);
                     showModal('Terjadi kesalahan saat mengirim data.');
                 }
             });
         });

         $('#submitBtnDokumen').on('click', function() {
             const inputs = $('#form-dokumen').find('input, select');
             let isValid = true;

             inputs.each(function() {
                 if ($(this).prop('required') && !$(this).val()) {
                     showModal('Semua inputan harus diisi.');
                     $(this).focus();
                     isValid = false;
                     return false;
                 }
             });

             if (isValid) {
                 submitDataDokumen(baseUrl);
             }
         });

         function submitData(baseUrl) {
             var formData = new FormData();

             var selectedOption = $('#nama_drafter1 option:selected');
             var namaDrafter = selectedOption.val();
             var drafterId = selectedOption.data('id-drafter');
             formData.append('nama_drafter', namaDrafter);
             formData.append('drafter_id', drafterId);
             formData.append('nama_part', $('#nama_part').val());
             formData.append('nama_project', $('#nama_project1').val());
             formData.append('id_project', $('#id_project1').val());
             formData.append('keterangan', 'Project Internal');
             formData.append('seksi', $('#seksi').val());
             formData.append('tanggal_order', $('#tanggal_order').val());
             formData.append('tanggal_jatuh_tempo', $('#due_date').val());

             $.ajax({
                 url: baseUrl + 'submit/detail/project',
                 type: 'POST',
                 data: formData,
                 processData: false,
                 contentType: false,
                 success: function(response) {
                     $('#drafterModal').modal('hide');
                     $('#modalok').on('click', function() {
                         location.reload();
                     });
                     showModal(response.message, function() {});
                 },
                 error: function(xhr, status, error) {
                     showModal(errorMessage);
                 }
             });
         };

         function submitDataDokumen(baseUrl) {
             var formData = new FormData($('#form-dokumen')[0]);
             formData.append('nama_project', $('#nama_project').val());
             formData.append('id_project', $('#id_project').val());

             $.ajax({
                 url: baseUrl + 'submit/dokumen/project',
                 type: 'POST',
                 data: formData,
                 processData: false,
                 contentType: false,
                 success: function(response) {
                     $('#dokumenModal').modal('hide');
                     $('#modalok').on('click', function() {
                         location.reload();
                     });
                     showModal(response.message, function() {});
                 },
                 error: function(xhr, status, error) {
                     console.error('Error:', error);
                     showModal('Terjadi kesalahan saat mengirim data.');
                 }
             });
         };


         function showModal(message, callback) {
             $('#modalMessage').text(message);
             $('#alertModal').modal('show');

             if (callback) {
                 $('#alertModal').on('hidden.bs.modal', function() {
                     callback();
                     $(this).off('hidden.bs.modal'); // Remove the callback to avoid multiple triggers
                 });
             }
         };
     });
 </script>
 <?= $this->endSection() ?>