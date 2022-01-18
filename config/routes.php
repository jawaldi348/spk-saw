<?php $page = htmlspecialchars(@$_GET['page']);
$proses = htmlspecialchars(@$_GET['proses']);
if (in_array($page, [null, 'home'])) {
    $data = array(
        'judul' => 'Home',
        'breadcrumb' => '',
        'view' => 'layout/home.php'
    );
} else if ($page == 'alternatif') {
    if ($proses == 'tambah') {
        $data = array(
            'judul' => 'Tambah Alternatif',
            'breadcrumb' => '<li><a href="./?page=alternatif">Alternatif</a></li><li class="active">Tambah Alternatif</li>',
            'view' => 'alternatif/tambah.php'
        );
    } else if ($proses == 'edit') {
        $data = array(
            'judul' => 'Edit Alternatif',
            'breadcrumb' => '<li><a href="./?page=alternatif">Alternatif</a></li><li class="active">Edit Alternatif</li>',
            'view' => 'alternatif/edit.php'
        );
    } else {
        $data = array(
            'judul' => 'Data Alternatif',
            'breadcrumb' => '<li class="active">Data Alternatif</li>',
            'view' => 'alternatif/index.php'
        );
    }
} else if ($page == 'kriteria') {
    if ($proses == 'tambah') {
        $data = array(
            'judul' => 'Tambah Kriteria',
            'breadcrumb' => '<li><a href="./?page=kriteria">Kriteria</a></li><li class="active">Tambah Kriteria</li>',
            'view' => 'kriteria/tambah.php'
        );
    } else if ($proses == 'edit') {
        $data = array(
            'judul' => 'Edit Kriteria',
            'breadcrumb' => '<li><a href="./?page=kriteria">Kriteria</a></li><li class="active">Edit Kriteria</li>',
            'view' => 'kriteria/edit.php'
        );
    } else {
        $data = array(
            'judul' => 'Data Kriteria',
            'breadcrumb' => '<li class="active">Data Kriteria</li>',
            'view' => 'kriteria/index.php'
        );
    }
} else if ($page == 'subkriteria') {
    if ($proses == 'tambah') {
        $data = array(
            'judul' => 'Tambah Sub Kriteria',
            'breadcrumb' => '<li><a href="./?page=subkriteria">Sub Kriteria</a></li><li class="active">Tambah Sub Kriteria</li>',
            'view' => 'subkriteria/tambah.php'
        );
    } else if ($proses == 'edit') {
        $data = array(
            'judul' => 'Edit Sub Kriteria',
            'breadcrumb' => '<li><a href="./?page=subkriteria">Sub Kriteria</a></li><li class="active">Edit Sub Kriteria</li>',
            'view' => 'subkriteria/edit.php'
        );
    } else {
        $data = array(
            'judul' => 'Data Sub Kriteria',
            'breadcrumb' => '<li class="active">Data Sub Kriteria</li>',
            'view' => 'subkriteria/index.php'
        );
    }
} else if ($page == 'user') {
    if ($proses == 'tambah') {
        $data = array(
            'judul' => 'Tambah User',
            'breadcrumb' => '<li><a href="./?page=user">User</a></li><li class="active">Tambah User</li>',
            'view' => 'user/tambah.php'
        );
    } else if ($proses == 'edit') {
        $data = array(
            'judul' => 'Edit User',
            'breadcrumb' => '<li><a href="./?page=user">User</a></li><li class="active">Edit User</li>',
            'view' => 'user/edit.php'
        );
    } else {
        $data = array(
            'judul' => 'Data User',
            'breadcrumb' => '<li class="active">Data User</li>',
            'view' => 'user/index.php'
        );
    }
}

return $data;
