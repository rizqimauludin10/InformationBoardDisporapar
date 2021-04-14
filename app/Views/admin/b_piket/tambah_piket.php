
<!-- Modal -->
<div class="modal fade" id="tambah_piket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Jadwal Piket</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        
      <?= form_open('b_piket/storeData', ['class' => 'form_piketInput']) ?>
      <?= csrf_field(); ?>

        <div class="modal-body">
          <div class="form-group row">
            <label for="name_piket" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="name_piket" name="name_piket">
              <div class="invalid-feedback errorNamapiket"> </div>
            </div>
          </div>

          <div class="form-group row">
            <label for="date_piket" class="col-sm-3 col-form-label">Tanggal</label>
            <div class="col-sm-3">
              <input type="date" class="form-control" id="date_piket" name="date_piket">
              <div class="invalid-feedback errorDatePiket"> </div>

            </div>
          </div>

          <div class="form-group row">
            <label for="shift" class="col-sm-3 col-form-label">Shift</label>
            <div class="col-sm-4">
              <select select class="form-control" name="shift" id="shift">
                <option value=""> --Pilih Shift-- </option>
                <option value="1"> Pagi </option>
                <option value="2"> Siang </option>
              </select>
            </div>
          </div>

        </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btnSave">Simpan</button>
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
  $('.form_piketInput').submit(function(e){
    e.preventDefault();
    $.ajax({ 
        type: "post",
        url: $(this).attr('action'),
        data: $(this).serialize(),
        dataType: "json",
    beforeSend:function() {
        $('.btnSave').attr('disable', 'disabled');
        $('.btnSave').html('<i class="fa fa-spin fa-spinner"></i>');
    },
    complete: function() {
        $('.btnSave').removeAttr('disable');
        $('.btnSave').html('Simpan');
    },
        success: function(response) {
        if(response.error) {
            if(response.error.namapiket) {
                $('#name_piket').addClass('is-invalid');
                $('.errorNamapiket').html(response.error.namapiket);
                console.log("erorr nama piket")
            } else {
                $('#name_piket').removeClass('is-invalid');
                $('.errorNamapiket').html('');
                console.log("success nama piket")
            }

            if(response.error.datepiket) {
                $('#date_piket').addClass('is-invalid');
                $('.errorDatePiket').html(response.error.datepiket);
                console.log("erorr date piket")
            } else {
                $('#date_piket').removeClass('is-invalid');
                $('.errorDatePiket').html('');
            }
        } else {
          // alert(response.sukses);
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: response.sukses,
                })
        
            $('#tambah_piket').modal('hide');
            console.log("Sukses")
            dataPiket();
        }

    },
        error: function(xhr, ajaxOptions, thrownError) {
        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
    }
    });
    return false;
    })

})

</script>