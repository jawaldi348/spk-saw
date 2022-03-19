<?php $id = $_SESSION['iduser'];
if ($_SESSION['level'] == 'admin') :
    $query = "SELECT *,username AS nama FROM user WHERE id_user='$id'";
elseif ($_SESSION['level'] == 'mhs') :
    $query = "SELECT *,nama_mhs AS nama FROM mahasiswa WHERE kode_mhs='$id'";
endif;
$execute = $connect->query($query);
$data = $execute->fetch_array(MYSQLI_ASSOC);
?>
<div id="navbar" class="navbar navbar-default ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
        </button>

        <div class="navbar-header pull-left">
            <a href="index.html" class="navbar-brand text-center">
                <small>Sistem Seleksi Mahasiswa Penerima KIP</small>
            </a>
        </div>

        <div class="navbar-buttons navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">

                <li class="light-blue dropdown-modal">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo" src="assets/images/avatar3.png" alt="Jason's Photo" />
                        <span class="user-info">
                            <small>Welcome,</small>
                            <?= $data['nama'] ?>
                        </span>

                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>

                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <li>
                            <a href="profile.html">
                                <i class="ace-icon fa fa-user"></i>
                                Profil
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>