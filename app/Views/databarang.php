<!-- Page Container START -->
<div class="page-container">
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="page-header">
            <div class="header-sub-title">
                <nav>
                    <a><i class="fas fa-home"></i>&nbsp;&nbsp;<?= session('role'); ?>&nbsp;&nbsp;</a>
                    <i class="fas fa-caret-right"></i>
                    <a>&nbsp;&nbsp;Data Barang</a>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-light shadow-sm">
                        <h4 class="card-title">Daftar Data Barang</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="d-flex justify-content-between align-items-center">
                                    <!-- Bagian kiri (tombol) -->
                                    <div>
                                        <button class="btn btn-primary rounded" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus-circle"></i> Tambah</button>
                                    </div>
                                    <!-- Bagian kanan (formulir pencarian) -->
                                    <div class="d-flex">
                                        <form action="/cari" method="get" class="d-flex">
                                            <input type="text" name="search" placeholder="Search data" class="form-control border rounded py-2 px-4">
                                            <button type="submit" class="btn btn-primary rounded">Search</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 py-4">
                                <table class="table table-responsive table-bordered ">
                                    <tr class="text-center" style="background-color: #B6FFFA;">
                                        <th width="4%">No</th>
                                        <th width="8%">Kode Barang</th>
                                        <th width="10%">Lokasi</th>
                                        <th width="20%">Jenis Barang</th>
                                        <th width="10%">Merk / Type</th>
                                        <th width="10%">Bahan</th>
                                        <th width="5%">Nomor Registrasi</th>
                                        <th width="5%">Tahun</th>
                                        <th width="5%">Kondisi</th>
                                        <th width="10%">Harga</th>
                                        <th width="5%">Action</th>
                                    </tr>
                                    <tbody>
                                        <?php $no = 1 + (10 * ($currentpage - 1)); ?>
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
                                                <td>
                                                    <a href="#edit<?= $data['id'] ?>" data-toggle="modal" title="Edit"><i class="fas fa-pen"></i></a>&nbsp;&nbsp;
                                                    <a href="#delete<?= $data['id']; ?>" data-toggle="modal" title="Delete"><i class="fas fa-trash"></i></a>&nbsp;&nbsp;
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <!-- Content Wrapper END -->

    <!-- MODAL TAMBAH -->
    <div class="modal fade" id="tambah">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahTitle">Tambah Data Barang</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <form action="<?= site_url('databarang/add') ?>" method="post">
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="lokasi">Kode Lokasi </label><br>
                                <div>
                                    <select id="select2" name="lokasi_id" class="form-control select2" style="width: 100%;">
                                        <option selected>Pilih Kode Lokasi</option>
                                        <?php foreach ($lokasi as $data) { ?>
                                            <option value="<?= $data['id'] ?>"><?= $data['nama_lokasi'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kodebarang">Kode Barang</label>
                                <input type="text" name="kode_brg" class="form-control" id="kodebarang" placeholder="Kode Barang" require>
                            </div>
                            <div class="form-group">
                                <label for="jenisbarang">Jenis Barang / Nama Barang</label>
                                <input type="text" name="jenis_brg" class="form-control" id="jenisbarang" placeholder="Jenis Barang / Nama Barang" require>
                            </div>
                            <div class="form-group">
                                <label for="merk">Merk / Type Barang</label>
                                <input type="text" name="merk" class="form-control" id="merk" placeholder="Jenis Barang / Nama Barang" require>
                            </div>
                            <div class="form-group">
                                <label for="bahan">Bahan</label>
                                <input type="text" name="bahan" class="form-control" id="bahan" placeholder="Jenis Bahan" require>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="noreg">Jumlah Registrasi</label>
                                    <input type="number" name="noreg" class="form-control" id="noreg" placeholder="Jumlah Registrasi" require>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="tahunbeli">Tahun Pembelian</label>
                                    <select class="form-control" name="tahun">
                                        <?php foreach ($tahun as $data) { ?>
                                            <option value="<?= $data['tahun'] ?>"><?= $data['tahun'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kondisi">Kondisi</label>
                                <select name="kondisi" id="kondisi" class="form-control">
                                    <option value="Baik">Baik</option>
                                    <option value="Kurang Baik">Kurang Baik</option>
                                    <option value="Rusak Berat">Rusak berat</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="text" name="harga" class="form-control" id="harga" placeholder="Harga" require>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- MODAL TAMBAH END -->

    <!-- MODAL EDIT -->
    <?php foreach ($databarang as $data) { ?>
        <div class="modal fade" id="edit<?= $data['id'] ?>">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editTitle">Edit Data Barang</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <i class="anticon anticon-close"></i>
                        </button>
                    </div>
                    <form action="<?= site_url('databarang/' . $data['id'] . '/edit') ?>" method="post">
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="lokasi">Kode Lokasi </label><br>
                                    <div>
                                        <select id="select2" name="lokasi_id" class="form-control select2" style="width: 100%;">
                                            <option value="<?= $data['lokasi_id'] ?>"><?= $data['nama_lokasi'] ?></option>
                                            <?php foreach ($lokasi as $data1) { ?>
                                                <option value="<?= $data1['id'] ?>"><?= $data1['nama_lokasi'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="kodebarang">Kode Barang</label>
                                    <input type="text" name="kode_brg" value="<?= $data['kode_brg'] ?>" class="form-control" id="kodebarang" placeholder="Kode Barang" require>
                                </div>
                                <div class="form-group">
                                    <label for="jenisbarang">Jenis Barang / Nama Barang</label>
                                    <input type="text" name="jenis_brg" value="<?= $data['jenis_brg'] ?>" class="form-control" id="jenisbarang" placeholder="Jenis Barang / Nama Barang" require>
                                </div>
                                <div class="form-group">
                                    <label for="merk">Merk / Type Barang</label>
                                    <input type="text" name="merk" value="<?= $data['merk'] ?>" class="form-control" id="merk" placeholder="Jenis Barang / Nama Barang" require>
                                </div>
                                <div class="form-group">
                                    <label for="bahan">Bahan</label>
                                    <input type="text" name="bahan" value="<?= $data['bahan'] ?>" class="form-control" id="bahan" placeholder="Jenis Bahan" require>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="noreg">Jumlah Registrasi</label>
                                        <input type="number" name="noreg" value="<?= $data['noreg'] ?>" class="form-control" id="noreg" placeholder="Jumlah Registrasi" require>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="tahunbeli">Tahun Pembelian</label>
                                        <select class="form-control" name="tahun">
                                            <option value="<?= $data['tahun'] ?>"><?= $data['tahun'] ?></option>
                                            <?php foreach ($tahun as $data2) { ?>
                                                <option value="<?= $data2['tahun'] ?>"><?= $data2['tahun'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label for="kondisi">Kondisi</label>
                                        <select name="kondisi" id="kondisi" class="form-control">
                                            <option value="<?= $data['kondisi'] ?>"><?= $data['kondisi'] ?></option>
                                            <option value="Baik">Baik</option>
                                            <option value="Kurang Baik">Kurang Baik</option>
                                            <option value="Rusak Berat">Rusak berat</option>
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="text" name="harga" value="<?= $data['harga'] ?>" class="form-control" id="harga" placeholder="Harga" require>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- MODAL EDIT END -->

    <!-- MODAL DELETE -->
    <?php foreach ($databarang as $data) { ?>
        <div class="modal fade" id="delete<?= $data['id']; ?>">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteTitle">Hapus Kode Lokasi</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <i class="anticon anticon-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= site_url('databarang/' . $data['id']) ?>" method="post">
                            <div class="text-center">
                                <i class="fas fa-exclamation-circle fa-xl" style="font-size:100px;"></i><br><br>
                                <p>Apakah anda yakin ingin menghapus barang <br><b><?= $data['kode_brg'] ?><br><?= $data['jenis_brg'] ?></b></p><br>
                            </div>
                            <div class="text-center">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger">Ya, saya yakin</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- MODAL DELETE END -->