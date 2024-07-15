<?= $this->extend('template/layout'); ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xl-12 col-12" style="width: 90%;padding-left: 7%;">
                    <div class="box bg-primary-light">
                        <div class="box-body d-flex px-0">
                            <div class="flex-grow-1 p-30 flex-grow-1 bg-img dask-bg bg-none-md" style="
                        background-position: right bottom;
                        background-size: auto 100%;">
                                <div class="row">
                                    <div class="col-12 col-xl-7">
                                        <h2>Welcome back, <strong><?= $nama ?></strong></h2>

                                        <p class="text-dark my-10 fs-16">
                                            Progress is
                                            <strong class="text-warning">very good!</strong>
                                        </p>
                                        <p class="text-dark my-10 fs-16" style="visibility: hidden;">
                                            Progress is
                                            <strong class="text-warning">very good!</strong>
                                        </p>
                                    </div>
                                    <div class="col-12 col-xl-5"></div>
                                </div>
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
                            <h4 class="box-title">Form Request Penomoran</h4>
                        </div>
                        <!-- /.box-header -->
                        <form id="form1-content">
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="form-label">Nama File :</label>
                                    <input type="text" id="nama_file" name="nama_file" class="form-control" required>
                                </div>
                                <!-- <div class="form-group">
                                    <label class="form-label">Nama Penulis :</label>
                                    <select class="form-select" name="penulis" id="penulis" required>
                                        <option value="" disabled selected>Pilih Opsi</option>
                                        <option value="Jajang">Jajang</option>
                                        <option value="Usep">Usep</option>
                                        <option value="Aman">Aman</option>
                                        <option value="Suep">Suep</option>
                                        <option value="Cecep">Cecep</option>
                                    </select>
                                </div> -->
                                <!-- <div class="form-group">
                                    <label class="form-label">Penggunaan :</label>
                                    <select class="form-select" name="group1" id="group1" required>
                                        <option value="" disabled selected>Pilih Opsi</option>
                                        <option value="1" data-group1="Prototype">Prototype</option>
                                    </select>
                                </div> -->
                                <div class="form-group">
                                    <label class="form-label">Kategori Drawing :</label>
                                    <select class="form-select" name="group2" id="group2" required>
                                        <option value="" disabled selected>Pilih Opsi</option>
                                        <option value="1" data-group2="Jig & Tools">Jig & Tools</option>
                                        <option value="2" data-group2="Mesin">Mesin</option>
                                        <option value="3" data-group2="Layout">Layout</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Proses Produksi :</label>
                                    <select class="form-select" name="group3" id="group3" required>
                                        <option value="" disabled selected>Pilih Opsi</option>
                                        <option value="1" data-type="Produksi 1" data-proses="Lead Part">Lead Part</option>
                                        <option value="2" data-type="Produksi 1" data-proses="Grid Casting">Grid Casting</option>
                                        <option value="3" data-type="Produksi 1" data-proses="Lead Powder Pasting">Lead Powder Pasting</option>
                                        <option value="4" data-type="Produksi 1" data-proses="Formation Drying Charging">Formation Drying Charging</option>
                                        <option value="5" data-type="Produksi 2" data-proses="Assembly">Assembly</option>
                                        <option value="6" data-type="Produksi 2" data-proses="Wet">Wet</option>
                                        <option value="7" data-type="Produksi 2" data-proses="MCB">MCB</option>
                                        <option value="8" data-type="Produksi 2" data-proses="Telecom">Telecom</option>
                                        <option value="9" data-type="Produksi 1" data-proses="Wide Strip & Punch Grid">Wide Strip & Punch Grid</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Sub Proses Produksi:</label>
                                    <select class="form-select" name="sub_proses" id="sub_proses" required>
                                        <option value="" disabled selected>Pilih Opsi</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Type Sub Proses Produksi:</label>
                                    <select class="form-select" name="type_sub" id="type_sub" required>
                                        <option value="">Pilih Item</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Nomer mesin :</label>
                                    <select class="form-select" name="no_mesin" id="no_mesin" required>
                                        <option value="" disabled selected>Pilih Opsi</option>
                                        <option value="L1" data-mesin="Line 1(A)">Line 1 A</option>
                                        <option value="L2" data-mesin="Line 2(A)">Line 2 A</option>
                                        <option value="L3" data-mesin="Line 3(A)">Line 3 A</option>
                                        <option value="L4" data-mesin="Line 4(G)">Line 4 G</option>
                                        <option value="L5" data-mesin="Line 5(G)">Line 5 G</option>
                                        <option value="L6" data-mesin="Line 6(G)">Line 6 G</option>
                                        <option value="L7" data-mesin="Line 7(G)">Line 7 G</option>
                                        <option value="M1" data-mesin="Mesin 1">Mesin 1</option>
                                        <option value="M2" data-mesin="Mesin 2">Mesin 2</option>
                                        <option value="M3" data-mesin="Mesin 3">Mesin 3</option>
                                        <option value="00" data-mesin="">General</option>
                                        <option value="M(N)" data-mesin="">Nomor Mesin Lainnya</option>
                                    </select>
                                    <div id="additional-input-container"></div>
                                </div>
                                <button type="button" class="btn btn-success" id="submitBtn">Submit</button>
                            </div>

                        </form>
                    </div>
                    <!-- /.box -->
                </div>


            </div>
            <!-- Modal -->
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
    $(document).ready(function() {
        initializeDocument();
    });

    function initializeDocument() {
        handleProsesChange();
        handleItemChange();
        handleNoMesinChange();
        $('#submitBtn').on('click', function() {
            handleSubmit();
        });
    }

    function handleNoMesinChange() {
        $('#no_mesin').on('change', function() {
            const selectedOption = $(this).val();
            const additionalInputContainer = $('#additional-input-container');

            if (selectedOption === 'M(N)') {
                // Jika opsi 'M(N)' dipilih, tambahkan input baru
                additionalInputContainer.html(`
                <div class="form-group">
                    <label class="form-label">Masukkan Nomor Mesin:</label>
                    <input type="text" id="input_no_mesin" name="input_no_mesin" class="form-control" placeholder="Masukkan Nomor Mesin" required>
                </div>
            `);
            } else {
                // Jika opsi lain dipilih, hapus input baru jika ada
                additionalInputContainer.empty();
            }
        });
    }

    function handleProsesChange() {
        $('#group3').on('change', function() {
            const proses = $(this).find('option:selected');
            var selected_sub = proses.data('proses');
            updateSubProses(selected_sub);
        });
    }

    function updateSubProses(selected_sub) {
        if (!selected_sub) return;

        $.ajax({
            url: '/sub/proses',
            type: 'GET',
            data: {
                proses: selected_sub
            },
            success: function(response) {
                const sub_proses = $('#sub_proses');
                sub_proses.empty();
                sub_proses.append('<option value="" disabled selected>Pilih Opsi</option>');
                if (response.error) {
                    console.error(response.error);
                    return;
                }

                response.forEach(function(item) {
                    const option = $('<option></option>')
                        .val(item.jenis_sub_proses)
                        .text(item.jenis_sub_proses)
                        .data('no_subProses', item.no_sub_proses)
                    sub_proses.append(option);
                });

            },
            error: function(xhr, status, error) {
                console.error('Error in AJAX request:', status, error);
            }
        });
    }

    function handleItemChange() {
        $('#sub_proses').on('change', function() {
            var selectedOption2 = $(this).find('option:selected');
            var selectedOption = $('#group3').find('option:selected');
            var data = selectedOption.data('proses');
            var selected_type = selectedOption2.val();
            if (selected_type == 'Connector' || selected_type == 'Pole' || selected_type == 'Bushing') {
                updateTypeProses2(selected_type);
            } else {
                updateTypeProses(data);
            }
        });
    }

    function updateTypeProses(selected_type) {
        if (!selected_type) return;

        $.ajax({
            url: 'type/sub',
            type: 'GET',
            data: {
                typesub: selected_type
            },
            success: function(response) {
                console.log(response);
                const type_sub = $('#type_sub');
                type_sub.empty();
                type_sub.append('<option value="" disabled selected>Pilih Opsi</option>');
                if (response.error) {
                    console.error(response.error);
                    return;
                }

                response.forEach(function(item) {
                    const option = $('<option></option>')
                        .val(item.type_sub_proses)
                        .text(item.type_sub_proses)
                        .data('no_type', item.no_type)
                    type_sub.append(option);
                });

            },
            error: function(xhr, status, error) {
                console.error('Error in AJAX request:', status, error);
            }
        });
    }

    function updateTypeProses2(selected_type) {
        if (!selected_type) return;

        $.ajax({
            url: 'type/sub2',
            type: 'GET',
            data: {
                subProses: selected_type
            },
            success: function(response) {
                console.log(response);
                const type_sub = $('#type_sub');
                type_sub.empty();
                type_sub.append('<option value="" disabled selected>Pilih Opsi</option>');
                if (response.error) {
                    console.error(response.error);
                    return;
                }

                response.forEach(function(item) {
                    const option = $('<option></option>')
                        .val(item.type_sub_proses)
                        .text(item.type_sub_proses)
                        .data('no_type', item.no_type)
                    type_sub.append(option);
                });

            },
            error: function(xhr, status, error) {
                console.error('Error in AJAX request:', status, error);
            }
        });
    }

    function handleSubmit() {
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
            submitData();
        }
    }

    function submitData() {
        var formData = new FormData();
        formData.append('nama_file', $('#nama_file').val());
        //formData.append('nama_penulis', $('#penulis').val());
        formData.append('group2', $('#group2').val());
        formData.append('group3', $('#group3').val());
        formData.append('no_mesin', $('#no_mesin').val());
        formData.append('sub_proses', $('#sub_proses').find(':selected').data('no_subProses'));
        formData.append('type_sub', $('#type_sub').find(':selected').data('no_type'));
        formData.append('proses_produksi', $('#group3').find(':selected').data('type'));
        formData.append('no_mesin-string', $('#no_mesin').find(':selected').data('mesin'));
        formData.append('group2-string', $('#group2').find(':selected').data('group2'));
        formData.append('group3-string', $('#group3').find(':selected').data('proses'));
        formData.append('sub_proses-string', $('#sub_proses').val());
        formData.append('type_sub-string', $('#type_sub').val());

        $.ajax({
            url: 'pdfnumber/generate',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                showModal(response.message, function() {
                    setTimeout(function() {
                        window.location.href = '/insert/pdf';
                    }, 4000);
                });
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
</script>

<?= $this->endSection() ?>