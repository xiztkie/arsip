<!-- Page Container START -->
<div class="page-container">
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="page-header">
            <div class="header-sub-title">
                <nav>
                    <a><i class="fas fa-home"></i>&nbsp;&nbsp;<?= session('role'); ?>&nbsp;&nbsp;</a>
                    <i class="fas fa-caret-right"></i>
                    <a>&nbsp;&nbsp;Laporan</a>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-light shadow-sm">
                        <h4 class="card-title">Laporan Kartu Inventaris Ruangan</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= site_url('laporan/result/')?>" method="post">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="filter">Silahkan pilih lokasi untuk laporan anda </label>
                                    <select name="lokasi" id="select2" class="form-control select2" width="20%">
                                        <option value="*">Semua Data</option>
                                        <?php foreach ($lokasi as $data) { ?>
                                            <option value="<?= $data['id'] ?>"><?= $data['nama_lokasi'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <button type="submit" class="btn btn-primary text-white"><i class="fas fa-filter"></i> Filter Data</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Wrapper END -->