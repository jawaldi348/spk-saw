<div>
    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th class="center" width="5%">No</th>
                <th>Kode</th>
                <th>Kriteria</th>
                <th>Sub Kriteria</th>
                <th>Bobot</th>
                <th class="center" width="8%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $query = "SELECT * FROM subkriteria,kriteria WHERE kriteria_subkriteria=kode_kriteria";
            $execute = $connect->query($query);
            if ($execute->num_rows > 0) {
                $no = 1;
                while ($data = $execute->fetch_array(MYSQLI_ASSOC)) { ?>
                    <tr>
                        <td class="center"><?= $no ?></td>
                        <td><?= $data['kode_subkriteria'] ?></td>
                        <td><?= $data['kode_kriteria'] . ' - ' . $data['nama_kriteria'] ?></td>
                        <td><?= $data['nama_subkriteria'] ?></td>
                        <td><?= $data['bobot_subkriteria'] ?></td>
                        <td class="center"></td>
                    </tr>
            <?php $no++;
                }
            } ?>
        </tbody>
    </table>
</div>