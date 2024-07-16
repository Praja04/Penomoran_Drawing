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
                                     <h1 class="fs-40 text-white">Number Drawing Pdf</h1>
                                     <p class="text-white mb-0 fs-20">
                                         PT.Century Batteries Indonesia
                                     </p>
                                 </div>
                                 <div class="col-12 col-lg-4">
                                     <img src="<?php base_url() ?>assets\images\custom-15.svg" alt="" />
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>


             <div class="box">
                 <div class="box-header with-border">
                     <h3>List All Revisi Drawing</h3>
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
                                                 <th>Status</th>
                                                 <th>Aksi</th>
                                             </tr>
                                         </thead>
                                         <tbody id="user2">
                                             <?php $i = 1; ?>
                                             <?php
                                                $hasMasspro = false; // Inisialisasi variabel pengecekan masspro
                                                foreach ($data as $user) {
                                                    if ($user['status'] == 'masspro') {
                                                        $hasMasspro = true;
                                                        break;
                                                    }
                                                }
                                                ?>
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
                                                         <?php if ($user['status'] == 'masspro') : ?>
                                                             <span class="badge bg-success">Masspro</span>
                                                         <?php elseif ($user['verifikasi_admin'] == 2 && $user['status'] != 'masspro') : ?>
                                                             <span class="badge bg-danger">Rejected</span>
                                                         <?php else : ?>
                                                             <span class="badge bg-warning">Trial</span>
                                                         <?php endif; ?>
                                                     </td>
                                                     <td>

                                                         <?php if ($user['status'] != 'masspro' && $user['verifikasi_admin'] != 2) : ?>
                                                             <a href="<?= base_url('pdf/setStatusMasspro/' . $user['id']); ?>" class="btn btn-success" onclick="return confirm('Apakah Anda yakin ingin mengubah status menjadi masspro?')">Set Masspro</a>
                                                         <?php elseif ($user['verifikasi_admin'] == 2 && $user['status'] != 'masspro') : ?>
                                                             <a href="<?= base_url('pdf/setStatusMasspro/' . $user['id']); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin mengubah status menjadi masspro?')">Set Masspro Again</a>
                                                         <?php else : ?>
                                                             <span class="text-muted">masspro</span>
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



                 <div class="row">
                     <div class="col-lg-12 col-12" id="form1" style="width: 90%;padding-left: 7%;">
                         <!-- Basic Forms -->
                         <div class="box">
                             <div class="box-header with-border">
                                 <h4 class="box-title">Form Revisi</h4>
                             </div>

                             <form id="revisionForm" enctype="multipart/form-data">
                                 <input type="hidden" name="_method" value="POST" />
                                 <div class="form-group">
                                     <label class="form-label" for="proses_produksi">Proses Produksi:</label>
                                     <input class="form-control" type="text" id="proses_produksi" name="proses_produksi" value="<?= esc($data[0]['proses_produksi']) ?>" required>
                                 </div>
                                 <div class="form-group">
                                     <label class="form-label" for="nama_file">Nama File:</label>
                                     <input class="form-control" type="text" id="nama_file" name="nama_file" value="<?= esc($data[0]['nama_file']) ?>" required>
                                 </div>
                                
                                 <div class="form-group">
                                     <label class="form-label" for="pdf_path">Unggah PDF:</label>
                                     <input class="form-control" type="file" id="pdf_path" name="pdf_path" required>
                                 </div>
                                 <div class="form-group">
                                     <label class="form-label" for="pdf_number_string">PDF Number String:</label>
                                     <input class="form-control" type="text" id="pdf_number_string" name="pdf_number_string" value="<?= esc($data[0]['pdf_number_string']) ?>" required>
                                 </div>
                                 <button type="button" class="btn btn-success" id="submitBtn">Simpan Revisi</button>
                             </form>
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
     const baseUrl = "<?= base_url() ?>";

     $(document).ready(function() {
         $('.btn-pdf-modal').on('click', function() {
             var pdfUrl = $(this).data('pdf');
             $('#pdfViewer').attr('src', pdfUrl);
             $('#pdfModal').modal('show');
         });

         $('#submitBtn').on('click', function() {
             submitData(baseUrl);
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

     function submitData(baseUrl) {
         var formData = new FormData($('#revisionForm')[0]);
         $.ajax({
             url: baseUrl + 'pdf/revise/<?= $data[0]['id'] ?>',
             type: 'POST',
             data: formData,
             contentType: false,
             processData: false,
             dataType: 'json',
             success: function(response) {
                 if (response.status === 'success') {
                     showModal(response.message, function() {
                         window.location.reload();
                     });
                 } else {
                     showModal(response.message);
                 }
             },
             error: function(xhr, status, error) {
                 console.error('Error:', error);
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