<?= $this->extend('template/layout'); ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-lg-12 col-12" id="form3" style="width: 90%;padding-left: 7%;">
                    <!-- Basic Forms -->
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Upload Pdf</h4>
                        </div>
                        <!-- /.box-header -->
                        <form id="form3-content">
                            <div class="box-body">
                                <?php if (isset($data)) : ?>
                                    <h4 class="mt-0 mb-20">Number PDF: <?= esc($data['number']) ?></h4>
                                <?php endif; ?>

                                <h5 id="namapart2"></h5>
                                <div class="form-group">
                                    <label class="form-label">Lampiran Drawing (pdf):</label>
                                    <input id="pdf" data-id="<?= $data['id'] ?>" class="form-control" type="file" name="pdf" required>
                                    <button type="button" id="submitBtn" class="btn btn-success pull-right">Upload PDF</button>
                                </div>

                            </div>
                            <!-- /.box-body -->
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
    </div>
</div>
<script src="../../assets/js/jquery-3.7.1.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {

        initializeDocument();
    });

    function initializeDocument() {
        $('#submitBtn').on('click', function() {
            submitForm();
        });
    }

    function submitForm() {
        var formData = new FormData();
        formData.append('id', $('#pdf').data('id'));
        formData.append('pdf', $('#pdf')[0].files[0]);
        $.ajax({
            url: '/pdfnumber/update',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                alert(berhasil);
                

            },
            error: function(xhr, status, error) {
                // Tangani error
                console.error('Error:', error);
            }
        });
    }
</script>

<?= $this->endSection() ?>