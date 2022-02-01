<div class="table-header">Data Mahasiswa
    <!-- <a href="./?page=alternatif&proses=tambah" class="btn btn-xs btn-success"><i class="ace-icon glyphicon glyphicon-plus bigger-80"></i> Tambah</a> -->
</div>
<div>
    <?php $query_tahun = "SELECT * FROM tahun_akademik WHERE status_tahun='1'";
    $execute_tahun = $connect->query($query_tahun);
    $data_tahun = $execute_tahun->fetch_array(MYSQLI_ASSOC); ?>
    <input type="hidden" name="idtahun" id="idtahun" value="<?= $data_tahun['id_tahun'] ?>">
    <div id="data-tabel"></div>
</div>
<script>
    $(document).ready(function() {
        var idtahun = $('#idtahun').val();
        data_kelas_kuliah(idtahun);
    });

    function data_kelas_kuliah(idtahun) {
        $.ajax({
            url: 'alternatif/data.php',
            method: 'get',
            data: {
                idtahun: idtahun
            },
            success: function(resp) {
                $('#data-tabel').html(resp);
            }
        })
    }
</script>