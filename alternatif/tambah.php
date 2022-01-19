<?php
$error = '';
if (isset($_POST['tambah'])) {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $data_kriteria = $_POST['kriteria'];
    if ($kode == '' || $nama == '') {
        $error = 'Kode dan Nama Alternatif tidak boleh kosong';
    } else {
        $query = "INSERT INTO alternatif VALUES('$kode','$nama')";
        foreach ($data_kriteria as $kriteria) {
            $id_kriteria = $kriteria['id_kriteria'];
            $id_subkriteria = $kriteria['sub_kriteria'];
            if ($id_subkriteria != '') {
                $query_subkriteria = "INSERT INTO alternatif_kriteria(id_alternatif,id_kriteria,id_subkriteria) VALUES('$kode','$id_kriteria','$id_subkriteria')";
                $connect->query($query_subkriteria);
            }
        }
        if ($connect->query($query) === true) {
            echo '<script>window.location.replace("./?page=alternatif")</script>';
        }
    }
}
?>
<div class="row">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Tambah Alternatif</h4>
            </div>
            <div class="widget-body">
                <form action="" method="POST">
                    <div class="widget-main">
                        <?= $error != '' ? '<div class="alert alert-danger">' . $error . '</div>' : '' ?>
                        <div class="form-group">
                            <label class="control-label">Kode Alternatif</label>
                            <input type="text" name="kode" id="kode" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nama Alternatif</label>
                            <input type="text" name="nama" id="nama" class="form-control">
                        </div>
                        <?php $query_kriteria = "SELECT * FROM kriteria";
                        $result = $connect->query($query_kriteria);
                        if ($result->num_rows > 0) {
                            while ($kriteria = $result->fetch_array(MYSQLI_ASSOC)) { ?>
                                <input type="hidden" name="kriteria[<?= $kriteria['kode_kriteria'] ?>][id_kriteria]" value="<?= $kriteria['kode_kriteria'] ?>">
                                <div class="form-group">
                                    <label class="control-label"><?= $kriteria['kode_kriteria'] . ' - ' . $kriteria['nama_kriteria'] ?></label>
                                    <select name="kriteria[<?= $kriteria['kode_kriteria'] ?>][sub_kriteria]" class="form-control">
                                        <option value="">-- Pilih --</option>
                                        <?php
                                        $kode_kriteria = $kriteria['kode_kriteria'];
                                        $query_subkriteria = "SELECT * FROM subkriteria WHERE kriteria_subkriteria='$kode_kriteria'";
                                        $resultsub = $connect->query($query_subkriteria);
                                        if ($resultsub->num_rows > 0) {
                                            while ($subkriteria = $resultsub->fetch_array(MYSQLI_ASSOC)) { ?>
                                                <option value="<?= $subkriteria['kode_subkriteria'] ?>"><?= $subkriteria['kode_subkriteria'] . ' - ' . $subkriteria['nama_subkriteria'] ?></option>
                                        <?php }
                                        } ?>
                                    </select>
                                </div>
                        <?php }
                        } ?>
                    </div>
                    <div class="form-actions center">
                        <button type="submit" name="tambah" class="btn btn-sm btn-primary"><i class="ace-icon fa fa-floppy-o"></i> Simpan</button>
                        <a href="./?page=alternatif" class="btn btn-sm btn-danger"><i class="ace-icon glyphicon glyphicon-remove"></i> Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>