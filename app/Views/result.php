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
                        <div class="form-group col-md-6">
                            <a href="<?= site_url('laporan') ?>" class="btn btn-primary text-white"><i class="fas fa-arrow-left"></i> Back</a>
                            <button class="btn btn-primary rounded" data-toggle="modal" data-target="#print"><i class="fas fa-print"></i> Print</button>
                        </div>
                        <table class="table table-responsive table-bordered ">
                            <tr class="text-center" style="background-color: #B6FFFA;">
                                <th width="4%">No</th>
                                <th width="8%">Kode Barang</th>
                                <th width="10%">Kode Lokasi</th>
                                <th width="20%">Jenis Barang</th>
                                <th width="10%">Merk / Type</th>
                                <th width="10%">Bahan</th>
                                <th width="5%">Jumlah Registrasi</th>
                                <th width="5%">Tahun</th>
                                <th width="5%">Kondisi</th>
                                <th width="10%">Harga</th>
                            </tr>
                            <tbody>
                                <?php $no = 1 ?>
                                <?php foreach ($databarang as $data) { ?>
                                    <tr class="text-center">
                                        <td><?= $no++ ?></td>
                                        <td><?= $data['kode_brg'] ?></td>
                                        <td><?= $data['nama_lokasi'] ?></td>
                                        <td><?= $data['jenis_brg'] ?></td>
                                        <td><?= $data['merk'] ?></td>
                                        <td><?= $data['bahan'] ?></td>
                                        <td><?= $data['noreg'] ?></td>
                                        <td><?= $data['tahun'] ?></td>
                                        <td><?= $data['kondisi'] ?></td>
                                        <td><?= $data['harga'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Wrapper END -->

    <!-- MODAL PILIH PEJABAT PENANDA TANGAN -->
    <div class="modal fade" id="print">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahTitle">Tambah Pejabat Penanda Tangan</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <form action="<?= site_url('laporanpdf') ?>" method="post" target="_blank">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_pejabat">SEKRETARIS DAERAH</label>
                            <select id="select2" name="sekretaris" class="form-control select2" style="width: 100%;">n>
                                <?php foreach ($pejabat as $data) { ?>
                                    <option value="<?= $data['id'] ?>"><?= $data['nama_pejabat'] ?></option>
                                <?php } ?>
                            </select>
                            <input type="text" value="<?= $ids; ?>" name="ids" hidden>
                        </div>
                        <div class="form-group">
                            <label for="nip">PENGUNA BARANG</label>
                            <select id="select2" name="penguna" class="form-control select2" style="width: 100%;">
                                <?php foreach ($pejabat as $data) { ?>
                                    <option value="<?= $data['id'] ?>"><?= $data['nama_pejabat'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nip">BAGIAN UMUM</label>
                            <select id="select2" name="bagianumum" class="form-control select2" style="width: 100%;">
                                <?php foreach ($pejabat as $data) { ?>
                                    <option value="<?= $data['id'] ?>"><?= $data['nama_pejabat'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nip">Tanggal Laporan</label>
                            <input type="date" name="tanggal" class="form-control" require>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Print</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- MODAL PILIH PEJABAT PENANDA TANGAN  END-->