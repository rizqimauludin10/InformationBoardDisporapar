
<!-- Modal -->
<div class="modal fade" id="act_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" >
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Aktivitas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
        
    <?= form_open('b_activity/editData', ['class' => 'form_actEdit']) ?>
    <?= csrf_field(); ?>

    <div class="modal-body">
        <div class="form-group row">
            <label for="title_act" class="col-sm-3 col-form-label">Nama Kegiatan</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" id="id" name="id" value="<?= $id_act ?>" hidden>
                <input type="text" class="form-control" id="title_act" name="title_act" value="<?= $title_act ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="desc_act" class="col-sm-3 col-form-label">Deskripsi</label>
            <div class="col-sm-9">
                <textarea class="form-control" id="desc_act" name="desc_act"><?= $desc_act ?></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="date_act" class="col-sm-3 col-form-label">Tanggal</label>
            <div class="col-sm-9">
                <input type="date" class="form-control" id="date_act" name="date_act" value="<?= $date_act ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="startfrom_act" class="col-sm-3 col-form-label">Jam Mulai</label>
            <div class="col-sm-4">
                <input type="time" class="form-control" id="startfrom_act" name="startfrom_act" value="<?= $startfrom_act ?>">
            </div>
            <label for="startuntil_act" class="col-sm-1 col-form-label"> Sampai </label>  
            <div class="col-sm-4">
                <input type="time" class="form-control" id="startuntil_act" name="startuntil_act" value="<?= $startuntil_act ?>">
            
            </div>
        </div>

        <div class="form-group row">
            <label for="idKategori" class="col-sm-3 col-form-label">Dihadiri Oleh</label>
            <div class="col-sm-9">
                <select select class="form-control" name="idKategori" id="idKategori">
                    <option value="Kepala Dinas" <?php if($name_act == 'Kepala Dinas') echo "selected"; ?> > Kepala Dinas </option>
                    <option value="Kabid Kepemudaan" <?php if($name_act == 'Kabid Kepemudaan') echo "selected"; ?> >Kabid Kepemudaan</option>
                    <option value="Kabid Olahraga" <?php if($name_act == 'Kabid Olahraga') echo "selected"; ?> >Kabid Olahraga</option>
                    <option value="Kabid Pariwisata" <?php if($name_act == 'Kabid Pariwisata') echo "selected"; ?> >Kabid Pariwisata</option>
                    <option value="Kabid Ekonomi Kreatif" <?php if($name_act == 'Kabid Ekonomi Kreatif') echo "selected"; ?> >Kabid Ekonomi Kreatif</option>
                </select>
            </div>
        </div>
        </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-primary btnUpdate">Update</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>

        <?= form_close() ?>

    </div>
</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url(''); ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(''); ?>/assets/bootstrap/js/bootstrap.bundle.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<script>
$(document).ready(function(){
    $('.form_actEdit').submit(function(e){
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
    
            $('#act_edit').modal('hide');
            console.log("Sukses")
            dataActivity();
        },

        error: function(xhr, ajaxOptions, thrownError) {
        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
    });
    return false;
});
})

</script>