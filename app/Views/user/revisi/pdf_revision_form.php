<?= $this->extend('template/layout'); ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
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
                                <input class="form-control" type="text" id="proses_produksi" name="proses_produksi" value="<?= esc($pdfNumber['proses_produksi']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="nama_file">Nama File:</label>
                                <input class="form-control" type="text" id="nama_file" name="nama_file" value="<?= esc($pdfNumber['nama_file']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="pdf_path">Unggah PDF:</label>
                                <input class="form-control" type="file" id="pdf_path" name="pdf_path" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="pdf_number_string">PDF Number String:</label>
                                <input class="form-control" type="text" id="pdf_number_string" name="pdf_number_string" value="<?= esc($pdfNumber['pdf_number_string']) ?>" required>
                            </div>
                            <button type="button" class="btn btn-success" id="submitBtn">Simpan Revisi</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<script src="<?= base_url('assets/js/jquery-3.7.1.min.js') ?>" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $('#submitBtn').on('click', function() {
            submitData();
        });
    });

    function submitData() {
        var formData = new FormData($('#revisionForm')[0]); // Mengambil semua data dari form, termasuk file

        $.ajax({
            url: '<?= base_url('pdf/revise/' . $pdfNumber['id']) ?>',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    alert(response.message);
                    window.location.href = '<?= base_url('insert/pdf') ?>';
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    }
</script>
<?= $this->endSection() ?>