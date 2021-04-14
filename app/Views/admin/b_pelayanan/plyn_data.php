<table class="table table-bordered" id="dataPlyn" width="100%" cellspacing="0">
    <thead class="table-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th style="width: 20%" scope="col">Gambar</th>
            <th scope="col">Status</th>
            <th scope="col">Ket</th>
        </tr>
    </thead>
            
    <tbody>
        <?php $no = 0;
        foreach($data_plyn as $plyn) :
            $no++; 
            ?>
            <tr>
                <th scope="row"><?= $no ?></th>
                    <td>
                        <?= $plyn['plyn_name'] ?>
                    </td>
                    <td>

                    <img style="width:50%; height:auto" src="<?= $plyn['plyn_file'] ?>" alt="image">
                        
                    </td>
                    <td>
                    <?php if($plyn['plyn_status'] == 1) {
                        echo ('<span class="badge bg-success">Aktif</span>');
                    } else {
                        echo ('<span class="badge bg-danger">Tidak Aktif</span>');
                    } ?>
                    </td>

                <td>

                    <button type="button" class="btn btn-success btn-sm" onClick="edit('<?= $plyn['id'] ?>')"> <i class="far fa-edit"></i> </button>
                    <button type="button" class="btn btn-danger btn-sm" onClick="hapus('<?= $plyn['id'] ?>')"> <i class="far fa-trash-alt"></i> </button>

                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    $(document).ready(function () {
        $('#dataPlyn').DataTable({
            "ordering" : true,
        });
    });

    function edit(id){
        $.ajax({
            type: "post",
            url: "<?= site_url('b_pelayanan/plyn_edit') ?>",
            data: {
                id : id
            },
            dataType: "json",
            success: function(response) {
                if(response.sukses) {
                    $('.viewmodalpelayanan').html(response.sukses).show();
                    $('#plyn_edit').modal('show');
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
            text: "Yakin ingin menghapus data pelayanan ini?",
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
                    url: "<?= site_url('b_pelayanan/deleteData') ?>",
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
                            dataPlyn();
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