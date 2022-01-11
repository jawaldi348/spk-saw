<?php $page = htmlspecialchars(@$_GET['page']);
if (in_array($page, [null, 'home'])) {
    $data = array(
        'judul' => 'Home',
        'breadcrumb' => '',
        'view' => 'layout/home.php'
    );
} else if ($page == 'kriteria') {
    $data = array(
        'judul' => 'Data Kriteria',
        'breadcrumb' => '<li class="active">Data Kriteria</li>',
        'view' => 'kriteria/index.php'
    );
}

return $data;
