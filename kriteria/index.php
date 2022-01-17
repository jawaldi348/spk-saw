<div class="table-header">
    <a href="./?page=kriteria&proses=tambah" class="btn btn-xs btn-success"><i class="ace-icon glyphicon glyphicon-plus bigger-80"></i> Tambah</a>
</div>
<div>
    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th class="center" width="5%">No</th>
                <th>Kode</th>
                <th>Kriteria</th>
                <th>Bobot</th>
                <th class="center" width="8%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $query = "SELECT * FROM kriteria";
            $execute = $connect->query($query);
            if ($execute->num_rows > 0) {
                $no = 1;
                while ($data = $execute->fetch_array(MYSQLI_ASSOC)) { ?>
                    <tr>
                        <td class="center"><?= $no ?></td>
                        <td><?= $data['kode_kriteria'] ?></td>
                        <td><?= $data['nama_kriteria'] ?></td>
                        <td><?= $data['bobot_kriteria'] ?></td>
                        <td class="center">
                            <a class="green" href="./?page=kriteria&proses=edit&id=<?= $data['kode_kriteria'] ?>">
                                <i class="ace-icon glyphicon glyphicon-edit bigger-130"></i>
                            </a>
                            <a class="red" href="./kriteria/delete.php?id=<?= $data['kode_kriteria'] ?>" onclick="return confirm('Anda yakin hapus data ini?');">
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