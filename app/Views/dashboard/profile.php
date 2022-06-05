<?= $this->extend('dashboard/layout/template'); ?>

<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Akun</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-user"></i> Akun</h4>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#basic" class="nav-link active" data-toggle="tab"><i class="fas fa-info-circle"></i> Informasi Utama</a>
                        </li>
                        <?php if(in_groups('admin')) { ?>
                        <li class="nav-item">
                            <a href="#image" class="nav-link" data-toggle="tab"><i class="fas fa-image"></i> Foto Profil</a>
                        </li>
                        <?php } ?>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane container active" id="basic">
                            <div class="row">
                                <div class="col">
                                    <form action="<?= (in_groups('admin')) ? '/admin/dashboard/profile/basic/save' : '/student/dashboard/profile/basic/save' ?>" method="post">
                                        <?= csrf_field(); ?>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="username">Username</label>
                                                <input type="text" name="username" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" placeholder="Username" value="<?= (old('username')) ? old('username') : $profile->username; ?>">
                                                <div class="invalid-feedback" id="invalid-username">
                                                    <?= $validation->getError('username'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="fullname">Nama Lengkap</label>
                                                <input type="text" name="fullname" class="form-control <?= ($validation->hasError('fullname')) ? 'is-invalid' : ''; ?>" id="fullname" placeholder="Nama Lengkap" value="<?= (old('fullname')) ? old('fullname') : $profile->fullname; ?>">
                                                <div class="invalid-feedback" id="invalid-fullname">
                                                    <?= $validation->getError('fullname'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Alamat Email</label>
                                            <input type="text" name="email" id="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" placeholder="Alamat Email" value="<?= (old('email')) ? old('email') : $profile->email; ?>">
                                            <div class="invalid-feedback" id="invalid-email">
                                                <?= $validation->getError('email'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php if(in_groups('admin')) { ?>
                        <div class="tab-pane container fade" id="image">
                            <div class="row">
                                <div class="col-md-5 pt-2">
                                    <h5>Foto Profil Sekarang:</h5>
                                    <img src="<?= base_url().'/assets/img/users/'.$profile->image; ?>" alt="Foto Profil" class="img-fluid" id="pp-settings">
                                </div>
                                <div class="col-md-7 pt-2">
                                    <h5>Ganti Foto Profil:</h5>
                                    <form action="/admin/dashboard/profile/image/save" method="post" enctype="multipart/form-data">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="image_old" value="<?= $profile->image; ?>">

                                        <div class="custom-file">
                                            <input type="file" name="user_image" id="user_image" class="custom-file-input <?= ($validation->hasError('user_image')) ? 'is-invalid' : ''; ?>" accept=".jpg,.jpeg,.png" onchange="imageChange();">
                                            <label for="user_image" class="custom-file-label">Pilih File</label>
                                            <div class="invalid-feedback" id="invalid-image">
                                                <?= $validation->getError('user_image'); ?>
                                            </div>
                                        </div>
                                        <small class="text-muted">Maksimal Ukuran File adalah <b>512KB</b>. Format file yang didukung: <b>JPG, JPEG, dan PNG</b>.</small>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary mt-1" id="btn-image" disabled><i class="fas fa-save"></i> Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>