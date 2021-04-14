<div class="container-fluid">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h5>Poster Pelayanan </h5>
                    </div>

                    <div class="col-sm-6">
                        <button type="button" class="btn btn-primary btn-sm float-end btnAddData">
                        <i class="fa fa-plus"></i> Tambah Data
                        </button>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive viewdatapelayanan">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Content -->
</div>

<div class="viewmodalpelayanan" style="display:none;"> </div>

<script src="<?= base_url(''); ?>/assets/jquery/jquery.min.js"></script>


<script>

function dataPlyn() {
    $.ajax({
        url : "<?= site_url('b_pelayanan/getDataPlyn') ?>",
        dataType : "json",
    success: function(response) {
        $('.viewdatapelayanan').html(response.data);
        },
    error: function(xhr, ajaxOptions, thrownError) {
        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
    }
    });
}

$(document).ready(function() {
    dataPlyn();
    $('.btnAddData').click(function(e){
        e.preventDefault();
        $.ajax({
            url : "<?= site_url('b_pelayanan/formAddData') ?>",
            dataType : "json",
            success: function(response) {
                $('.viewmodalpelayanan').html(response.data).show();
                $('#plyn_tambah').modal('show');
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
    });
    
});

</script>


