<?php $page = htmlspecialchars(@$_GET['page']); ?>
<div id="sidebar" class="sidebar responsive ace-save-state">
    <script type="text/javascript">
        try {
            ace.settings.loadState('sidebar')
        } catch (e) {}
    </script>

    <ul class="nav nav-list">
        <li class="<?= in_array($page, ['', 'home']) ? 'active' : '' ?>">
            <a href="./?page=home">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Home </span>
            </a>
            <b class="arrow"></b>
        </li>
        <?php if ($_SESSION['level'] == 'admin') : ?>
            <li class="<?= in_array($page, ['tahun-akademik']) ? 'active' : '' ?>">
                <a href="./?page=tahun-akademik">
                    <i class="menu-icon fa fa-calendar"></i>
                    <span class="menu-text"> Tahun Akademik </span>
                </a>
                <b class="arrow"></b>
            </li>
            <li class="<?= in_array($page, ['kriteria']) ? 'active' : '' ?>">
                <a href="./?page=kriteria">
                    <i class="menu-icon fa fa-list-alt"></i>
                    <span class="menu-text"> Data Kriteria </span>
                </a>
                <b class="arrow"></b>
            </li>
            <li class="<?= in_array($page, ['subkriteria']) ? 'active' : '' ?>">
                <a href="./?page=subkriteria">
                    <i class="menu-icon fa fa-list-alt"></i>
                    <span class="menu-text"> Data Sub Kriteria </span>
                </a>
                <b class="arrow"></b>
            </li>
            <li class="<?= in_array($page, ['alternatif']) ? 'active' : '' ?>">
                <a href="./?page=alternatif">
                    <i class="menu-icon fa fa-list-alt"></i>
                    <span class="menu-text"> Data Mahasiswa </span>
                </a>
                <b class="arrow"></b>
            </li>
            <li class="<?= in_array($page, ['perhitungan']) ? 'active' : '' ?>">
                <a href="./?page=perhitungan">
                    <i class="menu-icon fa fa-pie-chart"></i>
                    <span class="menu-text"> Penerapan Metode </span>
                </a>
                <b class="arrow"></b>
            </li>
            <li class="<?= in_array($page, ['laporan']) ? 'active' : '' ?>">
                <a href="./?page=laporan">
                    <i class="menu-icon glyphicon glyphicon-book"></i>
                    <span class="menu-text"> Laporan </span>
                </a>
                <b class="arrow"></b>
            </li>
            <li class="<?= in_array($page, ['user']) ? 'active' : '' ?>">
                <a href="./?page=user">
                    <i class="menu-icon fa fa-users"></i>
                    <span class="menu-text"> User </span>
                </a>
                <b class="arrow"></b>
            </li>
        <?php elseif ($_SESSION['level'] == 'mhs') : ?>
            <li class="<?= in_array($page, ['biodata']) ? 'active' : '' ?>">
                <a href="./?page=biodata">
                    <i class="menu-icon fa fa-list-alt"></i>
                    <span class="menu-text"> Prasyarat </span>
                </a>
                <b class="arrow"></b>
            </li>
        <?php endif ?>
        <li class="">
            <a href="logout.php">
                <i class="menu-icon fa fa-power-off"></i>
                <span class="menu-text"> Logout </span>
            </a>
            <b class="arrow"></b>
        </li>
    </ul>

    <?php if ($_SESSION['level'] == 'admin') : ?>
        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
            <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>
        <?php else :
        $iduser = $_SESSION['iduser'];
        $query_terima = "SELECT *,nama_mhs AS nama FROM mahasiswa WHERE kode_mhs='$iduser'";
        $execute_terima = $connect->query($query_terima);
        $data_terima = $execute_terima->fetch_array(MYSQLI_ASSOC);
        if ($data_terima['status_terima'] == 1) :
        ?>
            <div class="alert alert-block alert-success text-center" style="margin-top: 30px;">Selamat kamu telah diterima menjadi mahasiswa di Institut Bisnis dan Teknologi Pelita Indonesia.</div>
        <?php elseif ($data_terima['status_terima'] == 2) : ?>
            <div class="alert alert-block alert-danger text-center" style="margin-top: 30px;">Maaf kamu belum diterima di Institut Bisnis dan Teknologi Pelita Indonesia.</div>
        <?php else : echo '';
        endif ?>
    <?php endif ?>
</div>