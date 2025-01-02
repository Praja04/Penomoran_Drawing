 <?= $this->extend('template/layout'); ?>

 <?= $this->section('content') ?>

 <div class="content-wrapper">
     <div class="container-full">
         <!-- Main content -->
         <section class="content">
             <div class="content-header">
                 <div class="d-flex align-items-center">
                     <div class="me-auto">
                         <h3 class="page-title">List Project</h3>
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
                                         List
                                     </li>
                                 </ol>
                             </nav>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="col-12">
                 <div class="box">
                     <div class="box-header with-border d-flex justify-content-between align-items-center">
                         <div>
                             <h6 class="box-subtitle">
                                 List of project created by process engineering
                             </h6>
                         </div>
                         <div>
                             <a data-bs-toggle="modal" data-bs-target="#addDrafterModal" class="btn btn-info me-10 mt-10 d-inline-block ">+ Add New Drafter</a>
                             <a data-bs-toggle="modal" data-bs-target="#createModal" class="btn btn-primary me-10 mt-10 d-inline-block ">+ Add New Project</a>
                         </div>
                     </div>
                     <div class="box-body p-15">
                         <div class="table-responsive">
                             <table id="tickets" class="table mt-0 table-hover no-wrap  text-center" data-page-size="10">
                                 <thead>
                                     <tr>
                                         <th>No</th>
                                         <th>Nama Project</th>
                                         <th>Dibuat Oleh</th>
                                         <th>Status Tim</th>
                                         <th>Action</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php $i = 1; ?>
                                     <?php foreach ($list_project as $data) : ?>
                                         <tr>
                                             <td><?= $i++; ?></td>
                                             <td><?= $data['nama_project']; ?></td>
                                             <td><?= $data['nama_pengaju']; ?></td>
                                             <td>
                                                 <!-- Menampilkan apakah project memiliki detail atau tidak -->
                                                 <?php if ($data['has_detail'] == 1) : ?>
                                                     <span class="badge badge-success">Sudah ada</span>
                                                 <?php else : ?>
                                                     <span class="badge badge-danger">Belum ada</span>
                                                 <?php endif; ?>
                                             </td>
                                             <td>
                                                 <a class="btn text-danger btn-pdf-modal" data-nama-project="<?= $data['nama_project'] ?>" data-id-project="<?= $data['id_project'] ?>" data-bs-toggle="tooltip" data-bs-original-title="Delete"><i class="ti-trash" aria-hidden="true"></i></a>

                                                 <a href="<?= base_url('project/detail/' . $data['id_project']); ?>" class="btn text-secondary" data-bs-toggle="tooltip" data-bs-original-title="Lihat">
                                                     <i class="ti-eye" aria-hidden="true"></i>
                                                 </a>

                                             </td>
                                         </tr>
                                     <?php endforeach; ?>
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>
         </section>

         <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
             <div class="modal-dialog">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title" id="modalLabel">Add New Project</h5>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <div class="modal-body">
                         <!-- Form untuk menambahkan drafter -->
                         <form id="form1-content" enctype="multipart/form-data">
                             <div class=" box-body">

                                 <div class="form-group">
                                     <label class="form-label">Nama Project :</label>
                                     <input type="text" id="nama_project" name="nama_project" class="form-control" required>
                                 </div>

                                 <div class="form-group">
                                     <label class="form-label">Nama Pembuat Project :</label>
                                     <input type="text" id="nama_pengaju" name="nama_pengaju" class="form-control" required value="<?= $nama ?>" disabled>
                                 </div>

                                 <div class="form-group">
                                     <label class="form-label">Keterangan Project :</label>
                                     <input type="text" id="keterangan_project" name="keterangan_project" class="form-control" required>
                                 </div>
                             </div>

                         </form>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                         <button type="submit" id="submitBtn" class="btn btn-success">Save Project</button>
                     </div>
                 </div>
             </div>
         </div>

         <div class="modal fade" id="addDrafterModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
             <div class="modal-dialog">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title" id="modalLabel">Add New Drafter</h5>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <div class="modal-body">
                         <!-- Form untuk menambahkan drafter -->
                         <form id="form2-content" enctype="multipart/form-data">
                             <div class=" box-body">

                                 <div class="form-group">
                                     <label class="form-label">Nama :</label>
                                     <input type="text" id="nama_drafter" name="nama_drafter" class="form-control" required>
                                 </div>

                                 <div class="form-group">
                                     <label class="form-label">NPK :</label>
                                     <input type="number" id="npk_drafter" name="npk_drafter" class="form-control" required>
                                 </div>

                                 <div class="form-group">
                                     <label class="form-label">Role :</label>
                                     <select class="form-select" name="role" id="role">
                                         <option value="" disabled selected>Pilih</option>
                                         <option value="kasi">Kasi</option>
                                         <option value="staff">Staff</option>
                                     </select>
                                 </div>

                                 <div class="form-group">
                                     <label class="form-label">Email :</label>
                                     <input type="email" id="email_drafter" name="email_drafter" class="form-control" required>
                                 </div>
                             </div>

                         </form>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                         <button type="submit" id="submitBtn_addDrafter" class="btn btn-success">Save Project</button>
                     </div>
                 </div>
             </div>
         </div>

         <div class="modal fade" id="deleteProjectModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
             <div class="modal-dialog">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title" id="modalLabel">Delete Project</h5>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <div class="modal-body">
                         <!-- Form untuk menambahkan drafter -->
                         <form id="form-project">
                             <input type="hidden" id="nama_project_delete">
                             <input type="hidden" id="id_project_delete">
                         </form>
                         <label for="delete">Apakah kamu yakin menghapus project ini?</label>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                         <button type="submit" id="deleteProject" class="btn btn-danger">Delete Project</button>
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

     </div>
 </div>

 </div>
 </div>
 <script src="<?= base_url() ?>assets/js/jquery-3.7.1.min.js" type="text/javascript"></script>
 <script>
     const baseUrl = "<?= base_url() ?>";
     $(document).ready(function() {
         const baseUrl = "<?= base_url() ?>";

         $('.btn-pdf-modal').on('click', function() {
             var nama_project = $(this).data('nama-project');
             var id_project = $(this).data('id-project');
             $('#nama_project_delete').val(nama_project);
             $('#id_project_delete').val(id_project);
             $('#deleteProjectModal').modal('show');
         });


         $('#tickets').DataTable({
             "paging": true,
             "lengthChange": true,
             "searching": true,
             "ordering": true,
             "info": true,
             "autoWidth": false
         });


         $('#deleteProject').on('click', function(e) {
             var formData = new FormData();
             formData.append('nama_project', $('#nama_project_delete').val());
             formData.append('id_project', $('#id_project_delete').val());
             $.ajax({
                 url: baseUrl + 'delete/all/project',
                 type: 'POST',
                 data: formData,
                 processData: false,
                 contentType: false,
                 success: function(response) {
                     $('#deleteProjectModal').modal('hide');
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


         $('#submitBtn').on('click', function() {
             const inputs = $('#form1-content').find('input, select');
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

         $('#submitBtn_addDrafter').on('click', function() {
             const inputs = $('#form2-content').find('input, select');
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
                 submitData_addDrafter(baseUrl);
             }
         });

         function submitData(baseUrl) {
             var formData = new FormData();
             formData.append('nama_pengaju', $('#nama_pengaju').val());
             formData.append('nama_project', $('#nama_project').val());
             formData.append('keterangan_project', $('#keterangan_project').val());

             $.ajax({
                 url: baseUrl + 'create/saveProject',
                 type: 'POST',
                 data: formData,
                 processData: false,
                 contentType: false,
                 success: function(response) {
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
         }

         function submitData_addDrafter(baseUrl) {
             var formData = new FormData();
             formData.append('nama_drafter', $('#nama_drafter').val());
             formData.append('npk_drafter', $('#npk_drafter').val());
             formData.append('role', $('#role').val());
             formData.append('email_drafter', $('#email_drafter').val());

             $.ajax({
                 url: baseUrl + 'add/drafter',
                 type: 'POST',
                 data: formData,
                 processData: false,
                 contentType: false,
                 success: function(response) {
                     $('#addDrafterModal').modal('hide');
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
     })
 </script>
 <?= $this->endSection() ?>