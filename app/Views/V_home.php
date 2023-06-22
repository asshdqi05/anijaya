<?= $this->extend('template/V_header') ?>

<?= $this->section('content') ?>


<div class="card card-outline card-dark">
    <div class="card-header">
        <div class="card-title">Welcome</div>
    </div>
    <div class="card-body">
        <div class="text-center">
            <img src="<?= base_url('assets') ?>/dist/img/logo.jpg" class="img-fluid rounded" width="400px">
        </div>
    </div>
</div>



<?= $this->endSection() ?>