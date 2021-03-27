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
                <td><?= $act['title_act'] ?></td>
                <td><?= $act['date_act'] ?></td>
                <td><?= $act['name_act'] ?></td>
                <td>
                    <!-- <a href="#"><span class="badge bg-success">Edit</span></a> -->
                    <!-- <a href="#"> <span class="badge bg-danger">Delete</span></a> -->

                    <button type="button" class="btn btn-success btn-sm" onClick="edit('<?= $act['id_act'] ?>')"> Edit</button>

                    <button type="button" class="btn btn-danger btn-sm" onClick="delete<?= $act['id_act'] ?>"> Delete</button>

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
</script>