<?= $this->extend('auth/layout/template'); ?>

<?= $this->section('content'); ?>
<div id="app">
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                    <img src="/assets/img/logo.png" alt="logo" width="200" style="height:auto">
                    </div>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Registrasi</h4>
                        </div>
                        <div class="card-body">
                            <?= view('Myth\Auth\Views\_message_block') ?>

                            <form method="POST" action="<?= route_to('register') ?>" class="needs-validation" id="form-register">
                                <?= csrf_field(); ?>

                                <div class="form-group">
                                    <label for="email">Alamat Email</label>
                                    <input type="email" class="form-control <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" placeholder="Alamat Email" value="<?= old('email') ?>">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Nomor HP</label>
                                    <input type="text" class="form-control <?php if(session('errors.phone')) : ?>is-invalid<?php endif ?>" name="phone" placeholder="Nomor HP" value="<?= old('phone') ?>">
                                    <small id="emailHelp" class="form-text text-muted">Gunakan format 08**-****-***</small>
                                </div>
                                <div class="form-group">
                                    <label for="username"><?=lang('Auth.username')?></label>
                                    <input type="text" class="form-control <?php if(session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?=lang('Auth.username')?>" value="<?= old('username') ?>">
                                </div>
                                <div class="form-group">
                                    <label for="fullname">Nama Lengkap</label>
                                    <input type="text" class="form-control <?php if(session('errors.fullname')) : ?>is-invalid<?php endif ?>" name="fullname" placeholder="Nama Lengkap" value="<?= old('fullname') ?>">
                                </div>
                                <div class="form-group">
                                    <label for="place">Tempat Lahir</label>
                                    <input type="text" name="place" class="form-control <?php if(session('errors.place')) : ?>is-invalid<?php endif ?>" placeholder="Tempat Lahir" value="<?= old('place') ?>">
                                </div>
                                <div class="form-group">
                                    <label for="date_birth">Tanggal Lahir</label>
                                    <input type="date" name="date_birth" class="form-control <?php if(session('errors.date_birth')) : ?>is-invalid<?php endif ?>" placeholder="Tanggal Lahir" value="<?= old('date_birth') ?>">
                                </div>
                                <div class="form-group">
                                    <label for="univ">Asal Perguruan Tinggi</label>
                                    <input type="text" name="univ" class="form-control <?php if(session('errors.univ')) : ?>is-invalid<?php endif ?>" placeholder="Asal Perguruan Tinggi" value="<?= old('univ') ?>">
                                </div>
                                <div class="form-group">
                                    <label for="password"><?=lang('Auth.password')?></label>
                                    <input type="password" name="password" class="form-control <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="pass_confirm">Ulangi Password</label>
                                    <input type="password" name="pass_confirm" class="form-control <?php if(session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="Ulangi Password" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" id="btn-register" tabindex="4">
                                        Registrasi
                                    </button>
                                </div>
                            </form>

                            <hr>

                            <p class="text-center">Sudah mendaftar? <a href="<?= route_to('login') ?>">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>