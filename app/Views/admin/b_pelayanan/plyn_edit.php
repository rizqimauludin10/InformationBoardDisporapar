
<!-- Modal -->
<div class="modal fade" id="plyn_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" >
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Pelayanan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            
        <?= form_open('b_pelayanan/editData', ['class' => 'form_plynEdit']) ?>
        <?= csrf_field(); ?>

        <div class="modal-body">
            
            <div class="form-group row">
                <label for="name_plyn" class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="id" name="id" value="<?= $id?>" hidden>
                    <input type="text" class="form-control" id="name_plyn" name="name_plyn" value="<?= $plyn_name ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="status" class="col-sm-3 col-form-label">Status</label>
                <div class="col-sm-5">
                    <select class="form-control" name="status" id="status">
                        <option value="0" <?php if($plyn_status == '0') echo "selected"; ?> >Tidak Aktif</option>
                        <option value="1" <?php if($plyn_status == '1') echo "selected"; ?> >Aktif</option>
                    </select>
                </div>
            </div>
                
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary btnUpdate">Update</button>
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

$(document).ready(function(){
    $('.form_plynEdit').submit(function(e){
        e.preventDefault();
        $.ajax({ 
            type: "post",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",
        beforeSend:function() {
            $('.btnUpdate').attr('disable', 'disabled');
            $('.btnUpdate').html('<i class="fa fa-spin fa-spinner"></i>');
        },
        complete: function() {
        $('.btnUpdate').removeAttr('disable');
        $('.btnUpdate').html('Update');
        },
        success: function(response) {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: response.sukses,
            })
    
            $('#plyn_edit').modal('hide');
            console.log("Sukses")
            dataPlyn();
        },

        error: function(xhr, ajaxOptions, thrownError) {
        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
    });
    return false;
});
})




</script>