
<!-- Modal -->
<div class="modal fade" id="plyn_tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" >
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Pelayanan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            
        <?= form_open_multipart('', ['class' => 'form_plynInput']) ?>
        <?= csrf_field(); ?>

        <div class="modal-body">
            <div class="form-group row">
                <label for="name_plyn" class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" id="name_plyn" name="name_plyn">
                <div class="invalid-feedback errorNamaplyn"></div>
                </div>
            </div>

            <div class="form-group row">
                <label for="file_plyn" class="col-sm-3 col-form-label">Gambar</label>
                <div class="col-sm-5">
                <input class="form-control" type="file" id="file_plyn" name="file_plyn">
                <div class="invalid-feedback errorFilePlyn"></div>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary btnUpload">Upload</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>

        <?= form_close()?>

        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url(''); ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(''); ?>/assets/bootstrap/js/bootstrap.bundle.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<script>
$(document).ready(function() {
    console.log("Upload Pelayanan")
    $('.btnUpload').click(function(e) {
    e.preventDefault();

    let form = $('.form_plynInput')[0];
    let data = new FormData(form);

    $.ajax({
            type: "post",
            url: "<?= site_url('b_pelayanan/storeData') ?>",
            data: data,
            enctype : 'multipart/form-data',
            processData : false,
            contentType : false,
            cache: false,
            dataType: "json",
            beforeSend : function(e) {
                $('.btnUpload').prop('disable', 'disabled');
                $('.btnUpload').html('<i class="fa fa-spin fa-spinner"></i>');
            },
            complete : function(e){
                $('.btnUpload').removeAttr('disabled');
                $('.btnUpload').html('Upload');
            },
            success : function (response) {
                if(response.error) {
                    if(response.error.namaplyn) {
                        console.log("Error File")
                        $('#name_plyn').addClass('is-invalid');
                        $('.errorNamaplyn').html(response.error.namaplyn);
                    } else {
                        $('#name_plyn').removeClass('is-invalid');
                        $('.errorNamaplyn').html('');
                    }

                    
                    if(response.error.fileplyn) {
                        console.log("Error File")
                        $('#file_plyn').addClass('is-invalid');
                        $('.errorFilePlyn').html(response.error.fileplyn);
                    } else {
                        $('#file_plyn').removeClass('is-invalid');
                        $('.errorFilePlyn').html('');
                    }
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.sukses,
                    })
        
                    $('#plyn_tambah').modal('hide');
                    console.log("Sukses")
                    dataPlyn();
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    
    });
});


</script>