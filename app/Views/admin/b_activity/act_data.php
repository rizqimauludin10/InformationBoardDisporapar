<table class="table table-bordered" id="dataActivity" width="100%" cellspacing="0">
    <thead class="table-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Kegiatan</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Dihadiri</th>
            <th scope="col">Ket</th>
        </tr>
    </thead>
            
    <tbody>
        <?php $no = 0;
        foreach($data_act as $act) :
            $no++; 
            ?>
            <tr>
                <th scope="row"><?= $no ?></th>
                    <td>
                        <?= word_limiter ($act['title_act'], 5) ?>
                    </td>
                    <td>
                        <?= $act['date_act'] ?>
                    </td>
                    <td>
                        <?= $act['name_act'] ?>
                    </td>

                <td>

                    <button type="button" class="btn btn-success btn-sm" onClick="edit('<?= $act['id_act'] ?>')"> <i class="far fa-edit"></i> </button>

                    <button type="button" class="btn btn-danger btn-sm" onClick="hapus('<?= $act['id_act'] ?>')"> <i class="far fa-trash-alt"></i> </button>

                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    $(document).ready(function () {
        $('#dataActivity').DataTable();
    });

    function edit(id){
        $.ajax({
            type: "post",
            url: "<?= site_url('b_activity/act_edit') ?>",
            data: {
                id : id
            },
            dataType: "json",
            success: function(response) {
                if(response.sukses) {
                    $('.viewmodal').html(response.sukses).show();
                    $('#act_edit').modal('show');
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
            text: "Yakin ingin menghapus data kegiatan ini?",
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
                    url: "<?= site_url('b_activity/deleteData') ?>",
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
                            dataActivity();
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