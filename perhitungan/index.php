<?php
require 'alternatif/data.php';
$data = new data();
$data_mahasiswa = $data->data_mahasiswa();
?>
<div class="table-header">Matriks Normalisasi</div>
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
                        <td class="text-center"><?= number_format($nilai_kriteria['normalisasi_kriteria'], 2, '.', '') ?></td>
                    <?php } ?>
                </tr>
            <?php $no++;
            } ?>
        </tbody>
    </table>
</div>