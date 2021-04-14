
<!-- Modal -->
<div class="modal fade" id="edit_piket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Jadwal Piket</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        
      <?= form_open('b_piket/editData', ['class' => 'form_piketEdit']) ?>
      <?= csrf_field(); ?>

        <div class="modal-body">
          <div class="form-group row">
            <label for="name_piket" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" id="id" name="id" value="<?= $id ?>" hidden>
              <input type="text" class="form-control" id="name_piket" name="name_piket" value="<?= $name_piket ?>">
            </div>
          </div>

          <div class="form-group row">
            <label for="date_piket" class="col-sm-3 col-form-label">Tanggal</label>
            <div class="col-sm-4">
              <input type="date" class="form-control" id="date_piket" name="date_piket" value="<?= $date_piket ?>" >

            </div>
          </div>

          <div class="form-group row">
            <label for="shift_piket" class="col-sm-3 col-form-label">Shift</label>
            <div class="col-sm-4">
              <select class="form-control" name="shift_piket" id="shift_piket">
                <option value="1" <?php if($shift_piket == '1') echo "selected"; ?> >Pagi</option>
                <option value="2" <?php if($shift_piket == '2') echo "selected"; ?> >Siang</option>
              </select>
            </div>
          </div>

        </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btnUpdate">Simpan</button>
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
  $('.form_piketEdit').submit(function(e){
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
        $('.btnUpdate').html('Simpan');
    },
        success: function(response) {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: response.sukses,
                })
        
            $('#edit_piket').modal('hide');
            console.log("Sukses")
            dataPiket();
    },
        error: function(xhr, ajaxOptions, thrownError) {
        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
    }
    });
    return false;
    })

})

</script>