<div class="table-header">
    <a href="./?page=alternatif&proses=tambah" class="btn btn-xs btn-success"><i class="ace-icon glyphicon glyphicon-plus bigger-80"></i> Tambah</a>
</div>
<div>
    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th class="center" width="5%">No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th class="center" width="8%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $query = "SELECT * FROM alternatif";
            $execute = $connect->query($query);
            if ($execute->num_rows > 0) {
                $no = 1;
                while ($data = $execute->fetch_array(MYSQLI_ASSOC)) { ?>
                    <tr>
                        <td class="center"><?= $no ?></td>
                        <td><?= $data['kode_alternatif'] ?></td>
                        <td><?= $data['nama_alternatif'] ?></td>
                        <td class="center">
                            <a class="green" href="./?page=alternatif&proses=edit&id=<?= $data['kode_alternatif'] ?>">
                                <i class="ace-icon glyphicon glyphicon-edit bigger-130"></i>
                            </a>
                        </td>
                    </tr>
            <?php $no++;
                }
            } ?>
        </tbody>
    </table>
</div>