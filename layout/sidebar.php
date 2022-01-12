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
        <li class="<?= in_array($page, ['kriteria']) ? 'active' : '' ?>">
            <a href="./?page=kriteria">
                <i class="menu-icon fa fa-list-alt"></i>
                <span class="menu-text"> Data Kriteria </span>
            </a>
            <b class="arrow"></b>
        </li>
        <li class="">
            <a href="#">
                <i class="menu-icon fa fa-list-alt"></i>
                <span class="menu-text"> Data Alternatif </span>
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
        <li class="">
            <a href="logout.php">
                <i class="menu-icon fa fa-power-off"></i>
                <span class="menu-text"> Logout </span>
            </a>
            <b class="arrow"></b>
        </li>
    </ul>

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>