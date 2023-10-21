<!-- Page Container START -->
<div class="page-container">
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="page-header">
            <div class="header-sub-title">
                <nav>
                    <a><i class="fas fa-home"></i>&nbsp;&nbsp;<?= session('role'); ?>&nbsp;&nbsp;</a>
                    <i class="fas fa-caret-right"></i>
                    <a>&nbsp;&nbsp;Users</a>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-light shadow-sm">
                        <h4 class="card-title">Data Users</h4>
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
                                        <form action="<?= base_url('users') ?>" method="get" class="d-flex">
                                            <input type="text" name="keyword" placeholder="Search data" class="form-control border rounded py-2 px-4">
                                            <button type="submit" class="btn btn-primary rounded">Search</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 py-4">
                                <table class="table table-bordered">
                                    <tr class="text-center" style="background-color: #B6FFFA;">
                                        <th width="4%">No</th>
                                        <th width="30%">Username</th>
                                        <th width="35%">Password</th>
                                        <th width="15%">Role</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                    <tbody>
                                        <?php $no = 1 + (10 * ($currentpage - 1)); ?>
                                        <?php foreach ($users as $data) { ?>
                                            <tr class="text-center">
                                                <td><?= $no++; ?></td>
                                                <td><?= $data['username']; ?></td>
                                                <td><?= $data['password']; ?></td>
                                                <td><?= $data['role']; ?></td>
                                                <td class="d-flex justify-content-center">
                                                    <a href="#edit<?= $data['id']; ?>" data-toggle="modal" title="Edit"><i class="fas fa-pen"></i></a>&nbsp;&nbsp;
                                                    <a href="#delete<?= $data['id']; ?>" data-toggle="modal" title="Delete"><i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?= $pager->links('users', 'pager') ?>
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
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahTitle">Tambah Data Users</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('users') ?>" method="POST">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Masukan Username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukan Password">
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" id="role" class="form-control">
                                <option value="Administrator">Administrator</option>
                                <option value="Operator">Operator</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- MODAL TAMBAH END -->

    <!-- MODAL EDIT -->
    <?php foreach ($users as $data) { ?>
        <div class="modal fade" id="edit<?= $data['id'] ?>">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editTitle">Edit Data Users</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <i class="anticon anticon-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= site_url('users/' . $data['id']) ?>" method="POST">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" value="<?= $data['username']?>" placeholder="Masukan Username" readonly>
                                <input type="hidden" name="_method" value="PUT">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" value="<?= $data['password']?>" placeholder="Masukan Password">
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="<?= $data['role']?>"><?= $data['role']?></option>
                                    <option value="Administrator">Administrator</option>
                                    <option value="Operator">Operator</option>
                                </select>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    </form>
            </div>
        </div>
</div>
<?php } ?>
<!-- MODAL EDIT END -->

<!-- MODAL DELETE -->
<?php foreach ($users as $data) { ?>
    <div class="modal fade" id="delete<?= $data['id']; ?>">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteTitle">Hapus User</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('users/' . $data['id']) ?>" method="post">
                        <div class="text-center">
                            <i class="fas fa-exclamation-circle fa-xl" style="font-size:100px;"></i><br><br>
                            <p>Apakah anda yakin ingin menghapus user <br><b><?= $data['username'] ?></b></p><br>
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