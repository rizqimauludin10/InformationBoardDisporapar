<div class="container-fluid">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h5>Jadwal Piket </h5>
                    </div>

                    <div class="col-sm-6">
                        <button type="button" class="btn btn-primary btn-sm float-end btnAddData">
                        <i class="fa fa-plus"></i> Tambah Data
                        </button>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive viewdatapiket">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Content -->
</div>

<div class="viewmodalpiket" style="display:none;"> </div>

<script src="<?= base_url(''); ?>/assets/jquery/jquery.min.js"></script>


<script>

function dataPiket() {
    $.ajax({
        url : "<?= site_url('b_piket/getDataPiket') ?>",
        dataType : "json",
    success: function(response) {
        $('.viewdatapiket').html(response.data);
        },
    error: function(xhr, ajaxOptions, thrownError) {
        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
    }
    });
}

$(document).ready(function() {
    dataPiket();

    $('.btnAddData').click(function(e){
        e.preventDefault();
        $.ajax({
            url : "<?= site_url('b_piket/formAddData') ?>",
            dataType : "json",
            success: function(response) {
                $('.viewmodalpiket').html(response.data).show();
                $('#tambah_piket').modal('show');
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
    });
});

</script>


