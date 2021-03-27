
<!-- Modal -->
<div class="modal fade" id="act_input" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Aktivitas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        
      <?= form_open('b_activity/storeData', ['class' => 'form_actInput']) ?>
      <?= csrf_field(); ?>

        <div class="modal-body">
          <div class="form-group row">
            <label for="title_act" class="col-sm-3 col-form-label">Nama Kegiatan</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="title_act" name="title_act">
              <div class="invalid-feedback errorNamaKegiatan"> </div>
            </div>
          </div>

          <div class="form-group row">
            <label for="desc_act" class="col-sm-3 col-form-label">Deskripsi</label>
            <div class="col-sm-9">
              <textarea class="form-control" id="desc_act" name="desc_act"> </textarea>
              <div class="invalid-feedback errorDescKegiatan"> </div>
            </div>
          </div>

          <div class="form-group row">
            <label for="date_act" class="col-sm-3 col-form-label">Tanggal</label>
            <div class="col-sm-9">
              <input type="date" class="form-control" id="date_act" name="date_act">
              <div class="invalid-feedback errorDate"> </div>

            </div>
          </div>

          <div class="form-group row">
            <label for="startfrom_act" class="col-sm-3 col-form-label">Jam Mulai</label>
            <div class="col-sm-4">
              <input type="time" class="form-control" id="startfrom_act" name="startfrom_act">
              <div class="invalid-feedback errorTimeStart"> </div>
            </div>
            <label for="startuntil_act" class="col-sm-1 col-form-label"> Sampai </label>  
            <div class="col-sm-4">
              <input type="time" class="form-control" id="startuntil_act" name="startuntil_act">
              <div class="invalid-feedback errorTimeUntil"> </div>
            </div>
          </div>

          <div class="form-group row">
            <label for="idKategori" class="col-sm-3 col-form-label">Dihadiri Oleh</label>
            <div class="col-sm-9">
              <select select class="form-control" name="idKategori" id="idKategori">
                <option value=""> --Daftar Pejabat-- </option>
                <option value="Kepala Dinas"> Kepala Dinas </option>
                <option value="Kabid Kepemudaan">Kabid Kepemudaan</option>
                <option value="Kabid Olahraga">Kabid Olahraga</option>
                <option value="Kabid Pariwisata">Kabid Pariwisata</option>
                <option value="Kabid Ekonomi Kreatif">Kabid Ekonomi Kreatif</option>
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
  $('.form_actInput').submit(function(e){
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
          if(response.error.namakegiatan) {
            $('#title_act').addClass('is-invalid');
            $('.errorNamaKegiatan').html(response.error.namakegiatan);
            console.log("erorr nama kegiatan")
          } else {
            $('#title_act').removeClass('is-invalid');
            $('.errorNamaKegiatan').html('');
            console.log("success nama kegiatan")
          }

          if(response.error.desckegiatan) {
            $('#desc_act').addClass('is-invalid');
            $('.errorDescKegiatan').html(response.error.desckegiatan);
            console.log("erorr desc kegiatan")
          } else {
            $('#desc_act').removeClass('is-invalid');
            $('.errorDescKegiatan').html('');
          }

          if(response.error.date) {
            $('#date_act').addClass('is-invalid');
            $('.errorDate').html(response.error.date);
            console.log("erorr date kegiatan")
          } else {
            $('#date_act').removeClass('is-invalid');
            $('.errorDate').html('');
          }

          if(response.error.timeStart) {
            $('#startfrom_act').addClass('is-invalid');
            $('.errorTimeStart').html(response.error.timeStart);
            console.log("erorr jam kegiatan")
          } else {
            $('#startfrom_act').removeClass('is-invalid');
            $('.errorTimeStart').html('');
          }

          if(response.error.timeUntil) {
            $('#startuntil_act').addClass('is-invalid');
            $('.errorTimeUntil').html(response.error.timeUntil);
          } else {
            $('#startuntil_act').removeClass('is-invalid');
            $('.errorTimeUntil').html('');
          }
        } else {
          
          // alert(response.sukses);
          Swal.fire({
          icon: 'success',
          title: 'Berhasil',
          text: response.sukses,
        })
          
          $('#act_input').modal('hide');
          console.log("Sukses")
          dataActivity();
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