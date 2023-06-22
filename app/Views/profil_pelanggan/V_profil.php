<?= $this->extend('template_pelanggan/V_header') ?>

<?= $this->section('content') ?>

<div class="card card-outline card-teal">
    <div class="card-header">
        <h4 class="card-title">Data Pelanggan</h4>
    </div>
    <form role="form" method="POST" enctype="multipart/form-data" action="<?php echo site_url('C_profil/update') ?>">
        <div class="modal-body">
            <div class="form-group">
                <label>Nama</label>
                <input type="hidden" name="id" value="<?= $data->id ?>" class="form-control">
                <input type="text" name="nama" value="<?= $data->nama_pelanggan ?>" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control" required><?= $data->alamat ?></textarea>
            </div>
            <div class="form-group">
                <label>No Telepon</label>
                <input type="text" name="no_telepon" class="form-control" value="<?= $data->nohp ?>" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" id="email" class="form-control" value="<?= $data->email ?>" required>
            </div>
            <hr>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?= $data->username ?>" required>
            </div>
            <div class="form-group">
                <label>Password(Masukan Jika ingin Merubah Password)</label>
                <input type="password" name="password" class="form-control">
                <input type="hidden" name="old_password" value="<?= $data->password ?>" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-block btn-primary"><i class="fas fa-sync"></i> Update</button>
        </div>
    </form>
</div>


<?= $this->endSection() ?>