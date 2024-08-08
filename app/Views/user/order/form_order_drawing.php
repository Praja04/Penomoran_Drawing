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
                                            Form order drawing

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
                            <h4 class="box-title">Form Order Drawing</h4>
                        </div>
                        <!-- /.box-header -->
                        <form id="form1-content">
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="form-label">Nama Drafter :</label>
                                    <input type="text" id="nama_drafter" name="nama_drafter" class="form-control" required disabled value="<?= $nama ?>">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Nama Part :</label>
                                    <input type="text" id="nama_part" name="nama_part" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Order Dari : </label>
                                    <select class="form-select" name="seksi" id="seksi" required>
                                        <option value="" disabled selected>Pilih Seksi</option>
                                        <option value="eksternal">Eksternal PCE</option>
                                        <option value="internal">Internal PCE</option>
                                    </select>
                                </div>
                                <div class="form-group" id="additional-input-container"></div>
                                <div class="form-group">
                                    <label class="form-label">Tanggal Order (otomatis - today)</label>
                                    <input type="text" class="form-control" id="tanggal_order" disabled>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Due Date</label>
                                    <input type="date" class="form-control" id="due_date">
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
                            <button type="button" class="btn btn-primary" id="modalok" data-bs-dismiss="modal">OK</button>
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

        const waktuSekarang = new Date();
        const tahun = waktuSekarang.getFullYear();
        const bulan = waktuSekarang.getMonth() + 1;
        const tanggal = waktuSekarang.getDate();
        $('#tanggal_order').val(`${bulan}/${tanggal}/${tahun}`);

        $('#seksi').on('change', function() {
            const selectedOption = $(this).val();
            const additionalInputContainer = $('#additional-input-container');

            if (selectedOption === 'eksternal') {
                additionalInputContainer.html(`
                    <div class="form-group">
                        <label class="form-label">Keterangan :</label>
                        <input type="text" id="keterangan_eksternal" name="keterangan_eksternal" class="form-control" placeholder="Masukkan nama Requester atau nama Departemen (Adam - PCE)" required>
                    </div>
                `);
            } else {
                additionalInputContainer.empty();
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        const baseUrl = "<?= base_url() ?>";

        initializeDocument(baseUrl);

    });

    function initializeDocument(baseUrl) {

        $('#submitBtn').on('click', function() {
            handleSubmit(baseUrl);
        });
        $('#modalok').on('click', function() {
            location.reload();
        });
    }


    function handleSubmit(baseUrl) {
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
    }

    function submitData(baseUrl) {
        var formData = new FormData();
        formData.append('nama_drafter', $('#nama_drafter').val());
        formData.append('nama_part', $('#nama_part').val());
        formData.append('seksi', $('#seksi').val());
        formData.append('tanggal_order', $('#tanggal_order').val());
        formData.append('tanggal_jatuh_tempo', $('#due_date').val());

        const seksiValue = $('#seksi').val();
        if (seksiValue === 'eksternal') {
            formData.append('keterangan', $('#keterangan_eksternal').val());
        } else {
            formData.append('keterangan', '-');
        }
        $.ajax({
            url: baseUrl + 'submit/order',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                showModal(response.message, function() {

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