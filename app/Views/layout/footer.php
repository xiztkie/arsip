<!-- Footer START -->
<footer class="footer">
    <div class="footer-content justify-content-between">
        <p class="m-b-0">Copyright © <?= date('Y'); ?> Aplikasi Inventory.</p>
        <span>

            <p class="text-gray">Pemerintah Kabupaten Pegunungan Bintang</p>
        </span>
    </div>
</footer>
<!-- Footer END -->

</div>
<!-- Page Container END -->

</div>
</body>
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/js/sweetalert2.min.js') ?>"></script>
<script src="<?= base_url('assets/js/vendors.min.js') ?>"></script>
<script src="<?= base_url('assets/js/select2.min.js') ?>"></script>

<!-- page js -->
<script src="<?= base_url('assets/vendors/chartjs/Chart.min.js') ?>"></script>
<script src="<?= base_url('assets/js/pages/dashboard-default.js') ?>"></script>

<!-- Core JS -->
<script src="<?= base_url('assets/js/app.min.js') ?>"></script>
<script>
    <?php if (session()->getFlashdata('pesan')) : ?>
        Swal.fire(
            'Error!',
            '<?= session()->getFlashdata('pesan') ?>',
            'error'
        )
    <?php endif; ?>
</script>
<script>
    $(document).ready(function() {
        $('#select2').select2();
    });
</script>

</html>