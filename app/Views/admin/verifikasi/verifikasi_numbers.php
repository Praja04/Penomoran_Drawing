 <?= $this->extend('template/layout'); ?>

 <?= $this->section('content') ?>

 <div class="content-wrapper">
     <div class="container-full">
         <!-- Main content -->
         <section class="content">
             <div class="row">
                 <div class="col-12">
                     <div class="box bg-gradient-primary overflow-hidden pull-up">
                         <div class="box-body pe-0 ps-lg-50 ps-15 py-0">
                             <div class="row align-items-center">
                                 <div class="col-12 col-lg-8">
                                     <h1 class="fs-40 text-white">Verifikasi Number Drawing</h1>
                                     <p class="text-white mb-0 fs-20">
                                         PT.Century Batteries Indonesia
                                     </p>
                                 </div>
                                 <div class="col-12 col-lg-4">
                                     <img src="<?php base_url() ?>\assets\images\custom-15.svg" alt="" />
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>


             <div class="box">
                 <div class="box-header with-border">
                     <h3>List All Revisi for Verifikasi Drawing</h3>
                 </div>
                 <div class="row">
                     <div class="col-12">
                         <div class="box">
                             <div class="box-body">
                                 <div class="table-responsive">
                                     <table id="example125" class="table table-bordered table-separated">
                                         <thead>
                                             <tr>
                                                 <th>No</th>
                                                 <th>Number Drawing</th>
                                                 <th>Nama Penulis</th>
                                                 <th>Nama Drawing</th>
                                                 <th>Tanggal Pengajuan</th>
                                                 <th>Revisi</th>
                                                 <th>Pdf Drawing</th>
                                                 <th>Aksi</th>
                                             </tr>
                                         </thead>
                                         <tbody id="user2">
                                             <?php $i = 1; ?>

                                             <?php foreach ($data as $user) : ?>
                                                 <tr>
                                                     <td><?= $i++; ?></td>
                                                     <td><?= esc($user['number']); ?></td>
                                                     <td><?= esc($user['nama_penulis']); ?></td>
                                                     <td><?= esc($user['nama_file']); ?></td>
                                                     <td><?= esc($user['created_at']); ?></td>
                                                     <td><?= $user['revisi'] ?? 'Pengajuan Pertama'; ?></td>
                                                     <td>
                                                         <button type="button" class="btn btn-link btn-pdf-modal" data-pdf="<?= base_url('uploads/' . $user['pdf_path']); ?>">
                                                             <i class="fa fa-file-pdf-o"></i> Lihat PDF
                                                         </button>
                                                     </td>

                                                     <td>

                                                         <?php if ($user['verifikasi_admin'] == 0 && $user['status'] == 'masspro') : ?>
                                                             <button type="button" class="btn btn-link btn-primary" onclick="ubahHasilVerifikasi(<?php echo $user['id']; ?>)">
                                                                 <i class="fa fa-check-square-o"><a href="#"></a></i>
                                                             </button>
                                                             <button type="button" class="btn btn-link btn-danger" onclick="ubahHasilVerifikasi2(<?php echo $user['id']; ?>)">
                                                                 <i class="fa fa-close"><a href="#"></a></i>
                                                             </button>
                                                         <?php elseif ($user['status'] != 'masspro') : ?>
                                                             <p>not masspro</p>
                                                         <?php endif; ?>
                                                     </td>
                                                 </tr>
                                             <?php endforeach ?>
                                         </tbody>
                                     </table>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>


                 <div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
                     <div class="modal-dialog modal-lg">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <h5 class="modal-title" id="pdfModalLabel">PDF Viewer</h5>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                             </div>
                             <div class="modal-body">
                                 <embed id="pdfViewer" src="" type="application/pdf" width="100%" height="600px">
                             </div>
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
                             <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                         </div>
                     </div>
                 </div>
             </div>

         </section>
     </div>
 </div>
 <script src="<?= base_url() ?>assets/js/jquery-3.7.1.min.js" type="text/javascript"></script>
 <script>
     // Define baseUrl outside the document ready function
     const baseUrl = "<?= base_url() ?>";

     $(document).ready(function() {
         $('.btn-pdf-modal').on('click', function() {
             var pdfUrl = $(this).data('pdf');
             $('#pdfViewer').attr('src', pdfUrl);
             $('#pdfModal').modal('show');
         });

         $('#example125').DataTable({
             "paging": true,
             "lengthChange": true,
             "searching": true,
             "ordering": true,
             "info": true,
             "autoWidth": false
         });
     });

     function ubahHasilVerifikasi(idpdf) {
         $.ajax({
             url: baseUrl + 'admin/updateHasilVerifikasi/' + idpdf,
             type: 'POST',
             success: function(response) {
                 if (response.success === true) {
                     showModal('Berhasil Verifikasi');
                     setTimeout(function() {
                         window.location.href = baseUrl + 'verifikasi';
                     }, 4000);
                 } else {
                     showModal('Gagal mengubah hasil verifikasi!');
                 }
             },
             error: function(xhr, status, error) {
                 console.error(xhr.responseText);
             }
         });
     }

     function ubahHasilVerifikasi2(idpdf) {
         $.ajax({
             url: baseUrl + 'admin/updateHasilVerifikasi2/' + idpdf,
             type: 'POST',
             success: function(response) {
                 if (response.success === true) {
                     showModal('Berhasil Verifikasi');
                     setTimeout(function() {
                         window.location.href = baseUrl + 'verifikasi';
                     }, 4000);
                 } else {
                     showModal('Gagal mengubah hasil verifikasi!');
                 }
             },
             error: function(xhr, status, error) {
                 console.error(xhr.responseText);
             }
         });
     }

     function showModal(message, callback) {
         $('#modalMessage').text(message);
         $('#alertModal').modal('show');

         if (callback) {
             $('#alertModal').on('hidden.bs.modal', function() {
                 callback();
                 $(this).off('hidden.bs.modal'); // Remove the callback to avoid multiple triggers
             });
         }
     }
 </script>
 <?= $this->endSection() ?>