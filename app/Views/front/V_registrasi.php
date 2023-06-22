<?= $this->extend('front/V_base') ?>

<?= $this->section('content') ?>

<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">
        <div class="login-box col-sm-6 offset-3">
            <!-- /.login-logo -->
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <img src="<?= base_url('assets') ?>/dist/img/logo.jpg" width="150">
                    <!-- <a href="../../index2.html" class="h1"><b>ANI</b>JAYA</a> -->
                </div>
                <div class="card-body">
                    <form method="POST" class="needs-validation" action="<?= site_url('C_front/save_reg') ?>" novalidate>
                        <div class="card-body">
                            <h4 class="text-center">Registrasi Akun</h4>
                            <div class="container-fluid">

                                <?php if (session()->getFlashdata('error')) : ?>
                                    <div class="alert alert-danger alert-dismissible">
                                        <?= session()->getFlashdata('error') ?>
                                    </div>
                                <?php elseif (session()->getFlashdata('sukses')) :  ?>
                                    <div class="alert alert-success alert-dismissible">
                                        <?= session()->getFlashdata('sukses') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Lengkap" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="bi bi-person"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="number" name="nohp" class="form-control" placeholder="Telepon" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="bi bi-phone"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <textarea name="alamat" class="form-control" placeholder="Alamat Lengkap" required></textarea>
                                <div class="input-group-append">
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="bi bi-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="input-group mb-3">
                                <input type="text" name="username" class="form-control" placeholder="Username" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="bi bi-person-badge"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                                <div class="input-group-append">
                                    <div class="input-group-text ">
                                        <span class="bi bi-lock"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-grid gap-2">
                                <button class="btn btn-success" type="submit">Registrasi</button>
                                <a href="<?= site_url('C_front') ?>" class="btn btn-danger">Batal</a>
                            </div>
                        </div>
                    </form>


                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.login-box -->
    </div>
</section>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>

<?= $this->endSection() ?>