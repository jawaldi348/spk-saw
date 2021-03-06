<div class="table-header">
    <a href="./?page=user&proses=tambah" class="btn btn-xs btn-success"><i class="ace-icon glyphicon glyphicon-plus bigger-80"></i> Tambah</a>
</div>
<div>
    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th class="center" width="5%">No</th>
                <th>Username</th>
                <th class="center" width="8%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $query = "SELECT * FROM user";
            $execute = $connect->query($query);
            if ($execute->num_rows > 0) {
                $no = 1;
                while ($data = $execute->fetch_array(MYSQLI_ASSOC)) { ?>
                    <tr>
                        <td class="center"><?= $no ?></td>
                        <td><?= $data['username'] ?></td>
                        <td class="center">
                            <a class="green" href="./?page=user&proses=edit&id=<?= $data['id_user'] ?>">
                                <i class="ace-icon glyphicon glyphicon-edit bigger-130"></i>
                            </a>
                            <a class="red" href="./user/delete.php?id=<?= $data['id_user'] ?>" onclick="return confirm('Anda yakin hapus data ini?');">
                                <i class="ace-icon glyphicon glyphicon-trash bigger-130"></i>
                            </a>
                        </td>
                    </tr>
            <?php $no++;
                }
            } ?>
        </tbody>
    </table>
</div>