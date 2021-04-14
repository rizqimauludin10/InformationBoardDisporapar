<table class="table table-bordered" id="dataPiket" width="100%" cellspacing="0">
    <thead class="table-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Shift</th>
            <th scope="col">Ket</th>
        </tr>
    </thead>
            
    <tbody>
        <?php $no = 0;
        foreach($data_piket as $piket) :
            $no++; 
            ?>
            <tr>
                <th scope="row"><?= $no ?></th>
                    <td>
                        <?= $piket['name_piket'] ?>
                    </td>
                    <td>
                        <?= $piket['date_piket'] ?>
                    </td>
                    <td>

                    <?php if($piket['shift_piket'] == 1) {
                        echo ('<span class="badge bg-success">Pagi</span>');
                    } else {
                        echo ('<span class="badge bg-danger">Siang</span>');
                    } ?>
                    </td>

                <td>

                    <button type="button" class="btn btn-success btn-sm" onClick="edit('<?= $piket['id'] ?>')"> <i class="far fa-edit"></i> </button>

                    <button type="button" class="btn btn-danger btn-sm" onClick="hapus('<?= $piket['id'] ?>')"> <i class="far fa-trash-alt"></i> </button>

                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    $(document).ready(function () {
        $('#dataPiket').DataTable({
            "ordering" : true,
        });
    });

    function edit(id){
        $.ajax({
            type: "post",
            url: "<?= site_url('b_piket/piket_edit') ?>",
            data: {
                id : id
            },
            dataType: "json",
            success: function(response) {
                if(response.sukses) {
                    $('.viewmodalpiket').html(response.sukses).show();
                    $('#edit_piket').modal('show');
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
            text: "Yakin ingin menghapus data piket ini?",
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
                    url: "<?= site_url('b_piket/deleteData') ?>",
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
                            dataPiket();
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