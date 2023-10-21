<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Selamat Datang Di Aplikasi Inventory Barang | Kabupaten Pegunungan Bintang</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/logo-pegubin.png">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/sweetalert2.min.css') ?>">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow" style="width: 30rem;">
            <img src="<?= base_url('assets/images/header.jpg') ?>" class="card-img-top" height="200px">
            <div class="card-body">
                <h5 class="card-title">Silahkan Login Akun Anda </h5>
                <form method="post" action="<?= site_url('processlogin') ?>">
                    <div class="form-group row py-2">
                        <label for="username" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Silahkan Masukan Username Anda">
                        </div>
                    </div>
                    <div class="form-group row py-2">
                        <label for="password" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Silahkan Masukan Password Anda">
                        </div>
                    </div>
                    <div class="form-group row py-2 mb-4">
                        <div class="col-sm-8"></div>
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-primary w-100">LOGIN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/js/sweetalert2.min.js') ?>"></script>
<script>
    <?php if (session()->getFlashdata('pesan')) : ?>
        Swal.fire(
            'Error!',
            '<?= session()->getFlashdata('pesan') ?>',
            'error'
        )
    <?php endif; ?>
</script>


</html>