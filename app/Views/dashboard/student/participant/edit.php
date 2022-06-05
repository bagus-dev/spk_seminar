<?= $this->extend('dashboard/layout/template') ?>

<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Keikutsertaan Seminar</h1>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4><i class="fas fa-clipboard-list"></i> Keikutsertaan Seminar</h4>
                        <a href="<?= base_url('student/dashboard/participant'); ?>" class="btn bg-warning text-white py-1"><i class="fas fa-arrow-left circle-icon text-warning"></i> &nbsp;Kembali</a>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('student/dashboard/participant/update') ?>" method="post">
                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="id" value="<?= $participant->id ?>">

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="title">Judul Seminar</label>
                                    <input type="text" class="form-control" value="<?= $participant->title ?>" disabled>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="title">Pemateri</label>
                                    <input type="text" class="form-control" value="<?= $participant->presenter ?>" disabled>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Tanggal dan Waktu Seminar</label>
                                    <input type="text" class="form-control" value="<?= date('d/m/Y',strtotime($participant->seminar_date)).', '.date('H:i',strtotime($participant->start)).' - '.date('H:i',strtotime($participant->end)).' WIB' ?>" disabled>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="criteria_1">Sistematika Penyajian Materi</label>
                                    <select name="criteria_1" class="custom-select <?= ($validation->hasError('criteria_1')) ? 'is-invalid' : '' ?>">
                                        <option value="0">Pilih Sistematika Materi</option>
                                        <option value="5" <?php if(old('criteria_1') == '5'){echo 'selected'; }else{if($participant->criteria_1 == '5'){echo 'selected'; }} ?>>Sangat Bagus</option>
                                        <option value="4" <?php if(old('criteria_1') == '4'){echo 'selected'; }else{if($participant->criteria_1 == '4'){echo 'selected'; }} ?>>Bagus</option>
                                        <option value="3" <?php if(old('criteria_1') == '3'){echo 'selected'; }else{if($participant->criteria_1 == '3'){echo 'selected'; }} ?>>Cukup</option>
                                        <option value="2" <?php if(old('criteria_1') == '2'){echo 'selected'; }else{if($participant->criteria_1 == '2'){echo 'selected'; }} ?>>Kurang</option>
                                        <option value="1" <?php if(old('criteria_1') == '1'){echo 'selected'; }else{if($participant->criteria_1 == '1'){echo 'selected'; }} ?>>Sangat Kurang</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('criteria_1') ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="criteria_2">Kejelasan / Kemudahan Materi Untuk Dipahami</label>
                                    <select name="criteria_2" class="custom-select <?= ($validation->hasError('criteria_2')) ? 'is-invalid' : '' ?>">
                                        <option value="0">Pilih Kejelasan Materi</option>
                                        <option value="5" <?php if(old('criteria_2') == '5'){echo 'selected'; }else{if($participant->criteria_2 == '5'){echo 'selected'; }} ?>>Sangat Mudah</option>
                                        <option value="4" <?php if(old('criteria_2') == '4'){echo 'selected'; }else{if($participant->criteria_2 == '4'){echo 'selected'; }} ?>>Mudah</option>
                                        <option value="3" <?php if(old('criteria_2') == '3'){echo 'selected'; }else{if($participant->criteria_2 == '3'){echo 'selected'; }} ?>>Cukup</option>
                                        <option value="2" <?php if(old('criteria_2') == '2'){echo 'selected'; }else{if($participant->criteria_2 == '2'){echo 'selected'; }} ?>>Kurang</option>
                                        <option value="1" <?php if(old('criteria_2') == '1'){echo 'selected'; }else{if($participant->criteria_2 == '1'){echo 'selected'; }} ?>>Sangat Kurang</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('criteria_2') ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="criteria_3">Kontribusi Dalam Peningkatan Pengetahuan</label>
                                    <select name="criteria_3" class="custom-select <?= ($validation->hasError('criteria_3')) ? 'is-invalid' : '' ?>">
                                        <option value="0">Pilih Kontribusi Peningkatan Pengetahuan</option>
                                        <option value="5" <?php if(old('criteria_3') == '5'){echo 'selected'; }else{if($participant->criteria_3 == '5'){echo 'selected'; }} ?>>Sangat Bagus</option>
                                        <option value="4" <?php if(old('criteria_3') == '4'){echo 'selected'; }else{if($participant->criteria_3 == '4'){echo 'selected'; }} ?>>Bagus</option>
                                        <option value="3" <?php if(old('criteria_3') == '3'){echo 'selected'; }else{if($participant->criteria_3 == '3'){echo 'selected'; }} ?>>Cukup</option>
                                        <option value="2" <?php if(old('criteria_3') == '2'){echo 'selected'; }else{if($participant->criteria_3 == '2'){echo 'selected'; }} ?>>Kurang</option>
                                        <option value="1" <?php if(old('criteria_3') == '1'){echo 'selected'; }else{if($participant->criteria_3 == '1'){echo 'selected'; }} ?>>Sangat Kurang</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('criteria_3') ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="criteria_4">Manfaat Dalam Pekerjaan / Perkuliahan</label>
                                    <select name="criteria_4" class="custom-select <?= ($validation->hasError('criteria_4')) ? 'is-invalid' : '' ?>">
                                        <option value="0">Pilih Manfaat</option>
                                        <option value="5" <?php if(old('criteria_4') == '5'){echo 'selected'; }else{if($participant->criteria_4 == '5'){echo 'selected'; }} ?>>Sangat Bermanfaat</option>
                                        <option value="4" <?php if(old('criteria_4') == '4'){echo 'selected'; }else{if($participant->criteria_4 == '4'){echo 'selected'; }} ?>>Bermanfaat</option>
                                        <option value="3" <?php if(old('criteria_4') == '3'){echo 'selected'; }else{if($participant->criteria_4 == '3'){echo 'selected'; }} ?>>Cukup</option>
                                        <option value="2" <?php if(old('criteria_4') == '2'){echo 'selected'; }else{if($participant->criteria_4 == '2'){echo 'selected'; }} ?>>Kurang</option>
                                        <option value="1" <?php if(old('criteria_4') == '1'){echo 'selected'; }else{if($participant->criteria_4 == '1'){echo 'selected'; }} ?>>Sangat Kurang</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('criteria_4') ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="criteria_5">Kesesuaian Dengan Tujuan Seminar</label>
                                    <select name="criteria_5" class="custom-select <?= ($validation->hasError('criteria_5')) ? 'is-invalid' : '' ?>">
                                        <option value="0">Pilih Manfaat</option>
                                        <option value="5" <?php if(old('criteria_5') == '5'){echo 'selected'; }else{if($participant->criteria_5 == '5'){echo 'selected'; }} ?>>Sangat Sesuai</option>
                                        <option value="4" <?php if(old('criteria_5') == '4'){echo 'selected'; }else{if($participant->criteria_5 == '4'){echo 'selected'; }} ?>>Sesuai</option>
                                        <option value="3" <?php if(old('criteria_5') == '3'){echo 'selected'; }else{if($participant->criteria_5 == '3'){echo 'selected'; }} ?>>Cukup</option>
                                        <option value="2" <?php if(old('criteria_5') == '2'){echo 'selected'; }else{if($participant->criteria_5 == '2'){echo 'selected'; }} ?>>Kurang</option>
                                        <option value="1" <?php if(old('criteria_5') == '1'){echo 'selected'; }else{if($participant->criteria_5 == '1'){echo 'selected'; }} ?>>Sangat Kurang</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('criteria_5') ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="impression">Kesan Saat Mengikuti Seminar</label>
                                    <textarea name="impression" rows="5" class="form-control h-100 <?= ($validation->hasError('impression')) ? 'is-invalid' : '' ?>" placeholder="Kesan Saat Mengikuti Seminar"><?= old('impression') ? old('impression') : $participant->impression ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('impression') ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="suggestion">Kritik dan Saran</label>
                                    <textarea name="suggestion" rows="5" class="form-control h-100 <?= ($validation->hasError('suggestion')) ? 'is-invalid' : '' ?>" placeholder="Kritik dan Saran"><?= old('suggestion') ? old('suggestion') : $participant->suggestion ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('suggestion') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-5">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>