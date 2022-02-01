<div class="row">
    <div class="col-sm-offset-3 col-sm-6">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Laporan Mahasiswa Penerima KIP</h4>
            </div>
            <div class="widget-body">
                <form action="laporan/cetak.php" method="POST" target="_blank">
                    <div class="widget-main">
                        <div class="form-group">
                            <label class="control-label">Tahun Akademik</label>
                            <select name="tahun" id="tahun" class="form-control">
                                <option value="">Pilih Tahun Akademik</option>
                                <?php $query_tahun = "SELECT * FROM tahun_akademik";
                                $result_tahun = $connect->query($query_tahun);
                                while ($data_tahun = $result_tahun->fetch_array(MYSQLI_ASSOC)) { ?>
                                    <option value="<?= $data_tahun['id_tahun'] ?>"><?= $data_tahun['nama_tahun'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Jumlah Mahasiswa</label>
                            <input type="text" name="jumlah" id="jumlah" class="form-control" value="1">
                        </div>
                    </div>
                    <div class="form-actions center">
                        <button type="submit" name="tambah" class="btn btn-sm btn-primary"><i class="ace-icon glyphicon glyphicon-print"></i> Cetak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>