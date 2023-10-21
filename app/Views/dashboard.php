<!-- Page Container START -->
<div class="page-container">
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="page-header">
            <div class="header-sub-title">
                <nav>
                    <a><i class="fas fa-home"></i>&nbsp;&nbsp;<?= session('role'); ?>&nbsp;&nbsp;</a>
                    <i class="fas fa-caret-right"></i>
                    <a>&nbsp;&nbsp;Dashboard</a>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="avatar avatar-icon avatar-lg avatar-blue">
                                <i class="fas fa-database"></i>
                            </div>
                            <div class="m-l-15">
                                <h2 class="m-b-0"><?= $countbarang; ?></h2>
                                <p class="m-b-0 text-muted">Total Barang</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="avatar avatar-icon avatar-lg avatar-cyan">
                                <i class="anticon anticon-line-chart"></i>
                            </div>
                            <div class="m-l-15">
                                <h2 class="m-b-0"><?= $countlokasi; ?></h2>
                                <p class="m-b-0 text-muted">Total Lokasi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="avatar avatar-icon avatar-lg avatar-gold">
                                <i class="anticon anticon-profile"></i>
                            </div>
                            <div class="m-l-15">
                                <h2 class="m-b-0"><?= $countbarangrusak; ?></h2>
                                <p class="m-b-0 text-muted">Total Barang Kondisi Rusak</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="avatar avatar-icon avatar-lg avatar-purple">
                                <i class="anticon anticon-user"></i>
                            </div>
                            <div class="m-l-15">
                                <h2 class="m-b-0"><?= $countbarangbaik; ?></h2>
                                <p class="m-b-0 text-muted">Total Barang Kondisi Baik</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content Wrapper END -->
