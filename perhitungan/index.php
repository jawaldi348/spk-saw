<div class="table-header">Matriks Normalisasi
    <div class="pull-right" style="padding: 2px;">
        <select name="tahun" id="tahun" class="form-control">
            <option value="">Pilih Tahun Akademik</option>
            <?php $query_tahun = "SELECT * FROM tahun_akademik";
            $result_tahun = $connect->query($query_tahun);
            while ($data_tahun = $result_tahun->fetch_array(MYSQLI_ASSOC)) { ?>
                <option value="<?= $data_tahun['id_tahun'] ?>"><?= $data_tahun['nama_tahun'] ?></option>
            <?php } ?>
        </select>
    </div>
</div>
<?php $query_tahun = "SELECT * FROM tahun_akademik WHERE status_tahun='1'";
$execute_tahun = $connect->query($query_tahun);
$data_tahun = $execute_tahun->fetch_array(MYSQLI_ASSOC); ?>
<input type="hidden" name="idtahun" id="idtahun" value="<?= $data_tahun['id_tahun'] ?>">
<div id="data-tabel"></div>
<script>
    $(document).ready(function() {
        var idtahun = $('#idtahun').val();
        data_mahasiswa(idtahun);
    });

    function data_mahasiswa(idtahun) {
        $.ajax({
            url: 'perhitungan/data.php',
            method: 'get',
            data: {
                idtahun: idtahun
            },
            success: function(resp) {
                $('#data-tabel').html(resp);
            }
        })
    }

    $('#tahun').change(function() {
        var idtahun = $(this).val();
        data_mahasiswa(idtahun);
    });
</script>