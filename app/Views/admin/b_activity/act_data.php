<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                    <a href="#"><span class="badge bg-success">Edit</span></a>
                    <a href="#"> <span class="badge bg-danger">Delete</span></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    })
</script>