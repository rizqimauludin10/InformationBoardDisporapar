<table class="table table-bordered" id="dataPoster" width="100%" cellspacing="0">
    <thead class="table-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Tanggal</th>
            <th style="width: 20%" scope="col">Gambar</th>
            <th scope="col">Ket</th>
        </tr>
    </thead>
            
    <tbody>
        <?php $no = 0;
        foreach($data_poster as $poster) :
            $no++; 
            ?>
            <tr>
                <th scope="row"><?= $no ?></th>
                    <td>
                        <?= $poster['poster_name'] ?>
                    </td>
                    <td>
                        <?= $poster['poster_date'] ?>
                    </td>
                    <td>

                    <img style="width:50%; height:auto" src="<?= $poster['poster_image'] ?>" alt="image">
                        
                    </td>

                <td>
                    <button type="button" class="btn btn-danger btn-sm" onClick="hapus('<?= $poster['id_poster'] ?>')"> <i class="far fa-trash-alt"></i> </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    $(document).ready(function () {
        $('#dataPoster').DataTable({
            "ordering" : true,
        });
    });

    function edit(id){
        $.ajax({
            type: "post",
            url: "<?= site_url('b_poster/poster_edit') ?>",
            data: {
                id : id
            },
            dataType: "json",
            success: function(response) {
                if(response.sukses) {
                    $('.viewdataposter').html(response.sukses).show();
                    $('#edit_poster').modal('show');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }


    function hapus(id) {
        Swal.fire({
            title: 'Hapus',
            text: "Yakin ingin menghapus data poster ini?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "post",
                    url: "<?= site_url('b_poster/deleteData') ?>",
                    data: {
                        id : id
                    },
                    dataType: "json",
                    success: function(response) {
                        if(response.sukses) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.sukses
                            });
                            dataPoster();
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                });
            }
        })
    }
</script>