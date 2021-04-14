<div class="container-fluid">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h5>Poster Hari Besar </h5>
                    </div>

                    <div class="col-sm-6">
                        <button type="button" class="btn btn-primary btn-sm float-end btnAddData">
                        <i class="fa fa-plus"></i> Tambah Data
                        </button>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive viewdataposter">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Content -->
</div>

<div class="viewmodalposter" style="display:none;"> </div>

<script src="<?= base_url(''); ?>/assets/jquery/jquery.min.js"></script>


<script>

function dataPoster() {
    $.ajax({
        url : "<?= site_url('b_poster/getDataPoster') ?>",
        dataType : "json",
    success: function(response) {
        $('.viewdataposter').html(response.data);
        },
    error: function(xhr, ajaxOptions, thrownError) {
        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
    }
    });
}

$(document).ready(function() {
    dataPoster();
    $('.btnAddData').click(function(e){
        e.preventDefault();
        $.ajax({
            url : "<?= site_url('b_poster/formAddData') ?>",
            dataType : "json",
            success: function(response) {
                $('.viewmodalposter').html(response.data).show();
                $('#poster_tambah').modal('show');
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
    });
    
});

</script>


