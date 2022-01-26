<?php
require 'alternatif/data.php';
$data = new data();
$data_mahasiswa = $data->data_mahasiswa();
?>
<div class="table-header">Data Mahasiswa
    <!-- <a href="./?page=alternatif&proses=tambah" class="btn btn-xs btn-success"><i class="ace-icon glyphicon glyphicon-plus bigger-80"></i> Tambah</a> -->
</div>
<div>
    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th class="center" width="5%">No</th>
                <th>No Pendaftaran</th>
                <th>Nama</th>
                <?php foreach ($data_mahasiswa['kriteria'] as $kriteria) { ?>
                    <td class="text-center"><?= $kriteria['nama_kriteria'] ?></td>
                <?php } ?>
                <th class="center" width="8%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($data_mahasiswa['mahasiswa'] as $mahasiswa) { ?>
                <tr>
                    <td class="center"><?= $no ?></td>
                    <td><?= $mahasiswa['nodaftar_mhs'] ?></td>
                    <td><?= $mahasiswa['nama_mhs'] ?></td>
                    <?php foreach ($mahasiswa['kriteria'] as $nilai_kriteria) { ?>
                        <td class="text-center">
                            <span class="badge badge-danger" style="margin-bottom: 8px">
                                <?= $nilai_kriteria['bobot_subkriteria'] ?>
                            </span><br />
                            <?= $nilai_kriteria['nama_subkriteria'] ?>
                        </td>
                    <?php } ?>
                    <td class="center">
                        <a class="green" href="./?page=alternatif&proses=edit&id=<?= $mahasiswa['kode_mhs'] ?>">
                            <i class="ace-icon glyphicon glyphicon-edit bigger-130"></i>
                        </a>
                        <!-- <a class="red" href="./alternatif/delete.php?id=$mahasiswa['kode_mhs']" onclick="return confirm('Anda yakin hapus data ini?');">
                            <i class="ace-icon glyphicon glyphicon-trash bigger-130"></i>
                        </a> -->
                    </td>
                </tr>
            <?php $no++;
            } ?>
        </tbody>
    </table>
</div>