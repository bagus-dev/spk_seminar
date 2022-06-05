<?= $this->extend('auth/layout/template'); ?>

<?= $this->section('content'); ?>
<div id="app">
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                        <img src="/assets/img/logo.png" alt="logo" width="150" style="height:auto">
                    </div>
                    
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Login / Masuk</h4>
                        </div>
                        <div class="card-body">
                            <?= view('Myth\Auth\Views\_message_block') ?>

                            <form method="POST" action="<?= route_to('login') ?>" id="form-login" class="needs-validation">
                                <?= csrf_field(); ?>

                                <?php if ($config->validFields === ['email']): ?>
                                    <div class="form-group">
                                        <label for="login"><?=lang('Auth.email')?></label>
                                        <input type="email" class="form-control <?php if(session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" id="login" placeholder="<?=lang('Auth.email')?>">
                                        <div class="invalid-feedback">
                                            <?= session('errors.login') ?>
                                        </div>
                                    </div>
                                <?php else: ?>
                                <div class="form-group">
                                    <label for="login">Email atau Username</label>
                                    <input type="text" class="form-control <?php if(session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" id="login" placeholder="Masukkan Alamat Email atau Username" tabindex="1" required autofocus>
                                    <div class="invalid-feedback">
                                        <?= session('errors.login') ?>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Password</label>
                                    </div>
                                    <input type="password" class="form-control <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" id="password" placeholder="Masukkan Password" tabindex="2" required>
                                    <div class="invalid-feedback">
                                        <?= session('errors.password') ?>
                                    </div>
                                </div>
                                <?php if ($config->allowRemembering): ?>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me" <?php if(old('remember')) : ?> checked <?php endif ?>>
                                        <label class="custom-control-label" for="remember-me">Ingat Saya</label>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" id="btn-login" tabindex="4">
                                        Login
                                    </button>
                                </div>
                            </form>

                            <?php if ($config->allowRegistration) : ?>
                                <hr>
                                <p class="text-center">Belum punya akun? <a href="<?= route_to('register') ?>">Registrasi</a></p>
                            <?php endif; ?>
                            <!-- <?php if ($config->activeResetter): ?>
                                <hr>
                                <p class="text-center"><a href="<?= route_to('forgot') ?>">Lupa password?</a></p>
                            <?php endif; ?> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>