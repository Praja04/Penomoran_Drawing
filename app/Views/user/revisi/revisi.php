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
                     <h3>List All Drawing</h3>
                 </div>
                 <div class="row">
                     <div class="col-12">
                         <div class="box">
                             <div class="box-body">
                                 <div class="table-responsive">
                                     <div class="row">
                                         <div class="col-md-3">
                                             <div class="form-group">
                                                 <label class="form-label">Produksi</label>
                                                 <select class="form-select" id="filter-select" style="width: 100px; align-items:right">
                                                     <option value="">Semua</option>
                                                     <option value="Produksi 1">Produksi 1</option>
                                                     <option value="Produksi 2">Produksi 2</option>
                                                     <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                                                 </select>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="form-group">
                                                 <label class="form-label">Proses</label>
                                                 <select class="form-select" id="filter-select2" style="width: 100px; align-items:right">
                                                     <option value="">Semua</option>
                                                     <option value="Lead Part" data-type="Produksi 1" data-proses="Lead Part">Lead Part</option>
                                                     <option value="Grid Casting" data-type="Produksi 1" data-proses="Grid Casting">Grid Casting</option>
                                                     <option value="Lead Powder Pasting" data-type="Produksi 1" data-proses="Lead Powder Pasting">Lead Powder Pasting</option>
                                                     <option value="Formation Drying Charging" data-type="Produksi 1" data-proses="Formation Drying Charging">Formation Drying Charging</option>
                                                     <option value="Assembly" data-type="Produksi 2" data-proses="Assembly">Assembly</option>
                                                     <option value="Wet" data-type="Produksi 2" data-proses="Wet">Wet</option>
                                                     <option value="MCB" data-type="Produksi 2" data-proses="MCB">MCB</option>
                                                     <option value="Telecom" data-type="Produksi 2" data-proses="Telecom">Telecom</option>
                                                     <option value="Wide Strip & Punch Grid" data-type="Produksi 1" data-proses="Wide Strip & Punch Grid">Wide Strip & Punch Grid</option>
                                                     <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                                                 </select>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="form-group">
                                                 <label class="form-label">Sub Proses</label>
                                                 <select class="form-select" id="filter-select3" style="width: 100px; align-items:right">
                                                     <option value="">Semua</option>
                                                 </select>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="form-group">
                                                 <label class="form-label">Type Sub Proses</label>
                                                 <select class="form-select" id="filter-select4" style="width: 100px; align-items:right">
                                                     <option value="">Semua</option>
                                                 </select>
                                             </div>
                                         </div>
                                         <div class="col-md-2">
                                             <button id="reset-button" class="btn btn-secondary mt-2">Reset Filter</button>
                                         </div>
                                     </div><br><br>
                                     <table id="example122" class="table table-bordered table-striped">
                                         <thead>
                                             <tr>
                                                 <th>No</th>
                                                 <th>Number Drawing</th>
                                                 <th>Produksi</th>
                                                 <th>Nama Penulis</th>
                                                 <th>Path Drawing</th>
                                                 <th>Nama Drawing</th>
                                                 <th>Tanggal Pengajuan</th>
                                                 <th>Revisi</th>
                                                 <th>Feedback Admin</th>
                                                 <th>Verifikasi Admin</th>
                                             </tr>
                                         </thead>
                                         <tbody id="user2">
                                             <?php $i = 1;
                                                foreach ($numbers as $user) : ?>
                                                 <?php if ($user['pdf_path'] != null || $user['status'] == 'masspro') : ?>
                                                     <tr>
                                                         <td><?= $i++; ?></td>
                                                         <td><?= $user['number']; ?></td>
                                                         <td><?= $user['proses_produksi']; ?></td>
                                                         <td><?= $user['nama_penulis']; ?></td>
                                                         <td><?= $user['pdf_number_string']; ?></td>
                                                         <td><?= $user['nama_file']; ?></td>
                                                         <td><?= $user['created_at']; ?></td>
                                                         <td><a class="btn btn-primary" href="<?= base_url('pdf/revise/' . $user['id']) ?>">Revisi</a></td>
                                                         <td>
                                                             <?php if ($user['feedback_admin'] != null) : ?>
                                                                 <?= $user['feedback_admin'] ?>
                                                             <?php else : ?>
                                                                 -
                                                             <?php endif; ?>
                                                         </td>


                                                         <td>
                                                             <?php
                                                                if ($user['verifikasi_admin'] == 0) {
                                                                    echo 'Belum Diverifikasi';
                                                                } elseif ($user['verifikasi_admin'] == 1) {
                                                                    echo '<button class="btn btn-success">Verifikasi Diterima</button>';
                                                                } else {
                                                                    echo '<button class="btn btn-danger">Verifikasi Ditolak</button>';
                                                                }
                                                                ?>
                                                         </td>
                                                     </tr>
                                                 <?php endif; ?>
                                             <?php endforeach; ?>
                                         </tbody>
                                     </table>
                                 </div>
                             </div>
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

         handleProsesChange(baseUrl);
         handleItemChange(baseUrl);
         var table = $('#example122').DataTable({
             "paging": true,
             "lengthChange": true,
             "searching": true,
             "ordering": true,
             "info": true,
             "autoWidth": false
         });

         // Handle filter changes
         $('#filter-select, #filter-select2, #filter-select3, #filter-select4').on('change', function() {
             filterTable();
         });

         $('#reset-button').on('click', function() {
             resetFilters();
         });

         function filterTable() {
             const produksi = $('#filter-select').val();
             const proses = $('#filter-select2').val();
             const subProses = $('#filter-select3').val();
             const typeSubProses = $('#filter-select4').val();

             // Filter by Produksi
             table.column(2).search(produksi ? '^' + produksi + '$' : '', true, false);

             // Filter by Proses, Sub Proses, and Type Sub Proses in Column 4
             let searchValue = '';
             if (proses) {
                 searchValue += `(?=.*${proses})`; // Ensure 'proses' is in the text
             }
             if (subProses) {
                 searchValue += `(?=.*${subProses})`; // Ensure 'subProses' is in the text
             }
             if (typeSubProses) {
                 searchValue += `(?=.*${typeSubProses})`; // Ensure 'typeSubProses' is in the text
             }

             table.column(4).search(searchValue ? searchValue : '', true, false);

             table.draw();
         }




         function resetFilters() {
             $('#filter-select').val('');
             $('#filter-select2').val('');
             $('#filter-select3').val('');
             $('#filter-select4').val('');
             filterTable();
         }

         $('.btn-pdf-modal').on('click', function() {
             var pdfUrl = $(this).data('pdf');
             $('#pdfViewer').attr('src', pdfUrl);
             $('#pdfModal').modal('show');
         });




     });



     function handleProsesChange(baseUrl) {
         $('#filter-select2').on('change', function() {
             const proses = $(this).find('option:selected');
             var selected_sub = proses.data('proses');
             updateSubProses(baseUrl, selected_sub);
             console.log($('#nama_file').val());
         });
     }

     function updateSubProses(baseUrl, selected_sub) {
         if (!selected_sub) return;

         $.ajax({
             url: baseUrl + '/sub/proses',
             type: 'GET',
             data: {
                 proses: selected_sub
             },
             success: function(response) {
                 console.log(response);
                 const sub_proses = $('#filter-select3');
                 sub_proses.empty();
                 sub_proses.append('<option value="">Semua</option>');
                 if (response.error) {
                     console.error(response.error);
                     return;
                 }

                 response.forEach(function(item) {
                     const option = $('<option></option>')
                         .val(item.jenis_sub_proses)
                         .text(item.jenis_sub_proses)
                         .data('no_subProses', item.no_sub_proses);
                     sub_proses.append(option);
                 });
             },
             error: function(xhr, status, error) {
                 console.error('Error in AJAX request:', status, error);
             }
         });
     }

     function handleItemChange(baseUrl) {
         $('#filter-select3').on('change', function() {
             var selectedOption2 = $(this).find('option:selected');
             var selectedOption = $('#filter-select2').find('option:selected');
             var data = selectedOption.data('proses');
             var selected_type = selectedOption2.val();
             if (selected_type == 'Connector' || selected_type == 'Pole' || selected_type == 'Bushing') {
                 updateTypeProses2(baseUrl, selected_type);
             } else {
                 updateTypeProses(baseUrl, data);
             }
         });
     }

     function updateTypeProses(baseUrl, selected_type) {
         if (!selected_type) return;

         $.ajax({
             url: baseUrl + 'type/sub',
             type: 'GET',
             data: {
                 typesub: selected_type
             },
             success: function(response) {
                 console.log(response);
                 const type_sub = $('#filter-select4');
                 type_sub.empty();
                 type_sub.append('<option value="">Semua</option>');
                 if (response.error) {
                     console.error(response.error);
                     return;
                 }

                 response.forEach(function(item) {
                     const option = $('<option></option>')
                         .val(item.type_sub_proses)
                         .text(item.type_sub_proses)
                         .data('no_type', item.no_type);
                     type_sub.append(option);
                 });
             },
             error: function(xhr, status, error) {
                 console.error('Error in AJAX request:', status, error);
             }
         });
     }

     function updateTypeProses2(baseUrl, selected_type) {
         if (!selected_type) return;

         $.ajax({
             url: baseUrl + 'type/sub2',
             type: 'GET',
             data: {
                 subProses: selected_type
             },
             success: function(response) {
                 console.log(response);
                 const type_sub = $('#filter-select4');
                 type_sub.empty();
                 type_sub.append('<option value="">Semua</option>');
                 if (response.error) {
                     console.error(response.error);
                     return;
                 }

                 response.forEach(function(item) {
                     const option = $('<option></option>')
                         .val(item.type_sub_proses)
                         .text(item.type_sub_proses)
                         .data('no_type', item.no_type);
                     type_sub.append(option);
                 });
             },
             error: function(xhr, status, error) {
                 console.error('Error in AJAX request:', status, error);
             }
         });
     }
 </script>
 <?= $this->endSection() ?>