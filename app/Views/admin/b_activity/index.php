<div class="container-fluid">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
        
          <div class="col-sm-6">
            <h5>Kegiatan Dinas Porapar Kubu Raya</h5> 
          </div>
          <div class="col-sm-6">
            <button type="button" class="btn btn-primary btn-sm float-end btnAddData">
              <i class="fa fa-plus"></i> Tambah Data
            </button>
          </div>
        
        </div>
    </div>

      <div class="card-body">
        <div class="table-responsive viewdata">
          
        </div>
      </div>
      
    </div>
  </div>
</div>
<!-- End of Content -->
</div>

<div class="viewmodal" style="display:none;"> </div>

<script src="<?= base_url(''); ?>/assets/jquery/jquery.min.js"></script>


<script>

function dataActivity() {
  console.log("Activity Get Data")
  $.ajax({
    url : "<?= site_url('b_activity/getdata') ?>",
    dataType : "json",
    success: function(response) {
      $('.viewdata').html(response.data);
    },
    error: function(xhr, ajaxOptions, thrownError) {
      alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
    }
  });
}

$(document).ready(function() {
  dataActivity();

  $('.btnAddData').click(function(e){
    e.preventDefault();
    $.ajax({
      url : "<?= site_url('b_activity/formAddData') ?>",
      dataType : "json",
      success: function(response) {
        $('.viewmodal').html(response.data).show();
        $('#act_input').modal('show');
      },
      error: function(xhr, ajaxOptions, thrownError) {
        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
      }
      });
  });
});

</script>


