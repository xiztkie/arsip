<!-- Side Nav START -->
<div class="side-nav">
    <div class="side-nav-inner">
        <ul class="side-nav-menu scrollable">
            <li class="nav-item ">
                <a href="<?= base_url('dashboard'); ?>">
                    <span class="icon-holder">
                        <i class="fas fa-home"></i>
                    </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item ">
                <a href="<?= base_url('databarang'); ?>">
                    <span class="icon-holder">
                        <i class="fas fa-archive"></i>
                    </span>
                    <span class="title">Data Barang</span>
                </a>
            </li>
            <li class="nav-item ">
                <a href="<?= base_url('laporan'); ?>">
                    <span class="icon-holder">
                        <i class="fas fa-copy"></i>
                    </span>
                    <span class="title">Laporan</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="fas fa-database"></i>
                    </span>
                    <span class="title">Master Data</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item <?= (current_url(true)->getSegment(1) === 'datalokasi') ? 'active' : '' ?>">
                        <a class="nav-link" href="<?= base_url('datalokasi') ?>">Daftar Kode Lokasi</a>
                    </li>
                    <li class="nav-item <?= (current_url(true)->getSegment(1) === 'tahun') ? 'active' : '' ?>">
                        <a class="nav-link" href="<?= base_url('tahun') ?>">Tahun</a>
                    </li>
                    <li class="nav-item <?= (current_url(true)->getSegment(1) === 'pejabat') ? 'active' : '' ?>">
                        <a class="nav-link" href="<?= base_url('pejabat') ?>">Pejabat Penanda Tangan</a>
                    </li>
                </ul>

            </li>
            <li class="nav-item ">
                <a href="<?= base_url('users') ?>">
                    <span class="icon-holder">
                        <i class="fas fa-users"></i>
                    </span>
                    <span class="title">Users</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- Side Nav END -->