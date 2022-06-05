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
                        <form action="<?= base_url('student/dashboard/participant/save') ?>" method="post">
                            <?= csrf_field() ?>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="title">Judul Seminar</label>
                                    <select name="seminar_id" id="select2" class="custom-select <?= ($validation->hasError('seminar_id')) ? 'is-invalid' : '' ?>">
                                        <option></option>
                                        <?php
                                            $no = 1;
                                            $db = \Config\Database::connect();
                                            $builder = $db->table('seminars');
                                            $builder2 = $db->table('participant_seminars');
                                            $query = $builder->get();
                                            
                                            foreach($query->getResult() as $s) {
                                                $search = $builder2->where(['seminar_id' => $s->id, 'user_id' => $user_id])->get();
                                                $row = $search->getNumRows();

                                                if($row === 0) {
                                        ?>
                                            <option value="<?= $s->id ?>" <?= old('seminar_id') == $s->id ? 'selected' : '' ?>><?= $s->title." --- ".$s->presenter ?></option>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </select>
                                    <div class="invalid-feedback"><?= $validation->getError('seminar_id') ?></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Tanggal dan Waktu Seminar</label>
                                    <input type="text" id="date_seminar" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="criteria_1">Sistematika Penyajian Materi</label>
                                    <select name="criteria_1" class="custom-select <?= ($validation->hasError('criteria_1')) ? 'is-invalid' : '' ?>">
                                        <option value="0">Pilih Sistematika Materi</option>
                                        <option value="5">Sangat Bagus</option>
                                        <option value="4">Bagus</option>
                                        <option value="3">Cukup</option>
                                        <option value="2">Kurang</option>
                                        <option value="1">Sangat Kurang</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('criteria_1') ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="criteria_2">Kejelasan / Kemudahan Materi Untuk Dipahami</label>
                                    <select name="criteria_2" class="custom-select <?= ($validation->hasError('criteria_2')) ? 'is-invalid' : '' ?>">
                                        <option value="0">Pilih Kejelasan Materi</option>
                                        <option value="5">Sangat Mudah</option>
                                        <option value="4">Mudah</option>
                                        <option value="3">Cukup</option>
                                        <option value="2">Kurang</option>
                                        <option value="1">Sangat Kurang</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('criteria_2') ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="criteria_3">Kontribusi Dalam Peningkatan Pengetahuan</label>
                                    <select name="criteria_3" class="custom-select <?= ($validation->hasError('criteria_3')) ? 'is-invalid' : '' ?>">
                                        <option value="0">Pilih Kontribusi Peningkatan Pengetahuan</option>
                                        <option value="5">Sangat Bagus</option>
                                        <option value="4">Bagus</option>
                                        <option value="3">Cukup</option>
                                        <option value="2">Kurang</option>
                                        <option value="1">Sangat Kurang</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('criteria_3') ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="criteria_4">Manfaat Dalam Pekerjaan / Perkuliahan</label>
                                    <select name="criteria_4" class="custom-select <?= ($validation->hasError('criteria_4')) ? 'is-invalid' : '' ?>">
                                        <option value="0">Pilih Manfaat</option>
                                        <option value="5">Sangat Bermanfaat</option>
                                        <option value="4">Bermanfaat</option>
                                        <option value="3">Cukup</option>
                                        <option value="2">Kurang</option>
                                        <option value="1">Sangat Kurang</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('criteria_4') ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="criteria_5">Kesesuaian Dengan Tujuan Seminar</label>
                                    <select name="criteria_5" class="custom-select <?= ($validation->hasError('criteria_5')) ? 'is-invalid' : '' ?>">
                                        <option value="0">Pilih Manfaat</option>
                                        <option value="5">Sangat Sesuai</option>
                                        <option value="4">Sesuai</option>
                                        <option value="3">Cukup</option>
                                        <option value="2">Kurang</option>
                                        <option value="1">Sangat Kurang</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('criteria_5') ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="impression">Kesan Saat Mengikuti Seminar</label>
                                    <textarea name="impression" rows="5" class="form-control h-100 <?= ($validation->hasError('impression')) ? 'is-invalid' : '' ?>" placeholder="Kesan Saat Mengikuti Seminar"><?= old('impression') ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('impression') ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="suggestion">Kritik dan Saran</label>
                                    <textarea name="suggestion" rows="5" class="form-control h-100 <?= ($validation->hasError('suggestion')) ? 'is-invalid' : '' ?>" placeholder="Kritik dan Saran"><?= old('suggestion') ?></textarea>
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