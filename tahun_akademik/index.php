<div class="table-header">
    <a href="./?page=tahun-akademik&proses=tambah" class="btn btn-xs btn-success"><i class="ace-icon glyphicon glyphicon-plus bigger-80"></i> Tambah</a>
</div>
<div>
    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th class="center" width="5%">No</th>
                <th>Tahun</th>
                <th>Status</th>
                <th class="center" width="8%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $query = "SELECT * FROM tahun_akademik";
            $execute = $connect->query($query);
            if ($execute->num_rows > 0) {
                $no = 1;
                while ($data = $execute->fetch_array(MYSQLI_ASSOC)) { ?>
                    <tr>
                        <td class="center"><?= $no ?></td>
                        <td><?= $data['nama_tahun'] ?></td>
                        <td><?= $data['status_tahun'] == 1 ? '<span class="label label-success">Aktif</span>' : '<span class="label label-danger">Tidak Aktif</span>' ?></td>
                        <td class="center">
                            <a class="green" href="./?page=tahun-akademik&proses=edit&id=<?= $data['id_tahun'] ?>">
                                <i class="ace-icon glyphicon glyphicon-edit bigger-130"></i>
                            </a>
                            <a class="red" href="./tahun_akademik/delete.php?id=<?= $data['id_tahun'] ?>" onclick="return confirm('Anda yakin hapus data ini?');">
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