<?= $this->extend('dashboard/layout/template') ?>

<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Seminar</h1>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4><i class="fas fa-brain"></i> Seminar</h4>
                        <a href="<?= base_url('admin/dashboard/seminar'); ?>" class="btn bg-warning text-white py-1"><i class="fas fa-arrow-left circle-icon text-warning"></i> &nbsp;Kembali</a>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('admin/dashboard/seminar/save') ?>" method="post">
                            <?= csrf_field() ?>

                            <div class="form-group">
                                <label for="title">Judul Seminar</label>
                                <input type="text" name="title" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : '' ?>" placeholder="Judul Seminar" value="<?= old('title') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('title') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="presenter">Pemateri</label>
                                <input type="text" name="presenter" class="form-control <?= ($validation->hasError('presenter')) ? 'is-invalid' : '' ?>" placeholder="Pemateri" value="<?= old('presenter') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('presenter') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="field_id">Bidang Seminar</label>
                                <select name="field_id" id="select2" class="custom-select <?= ($validation->hasError('field_id')) ? 'is-invalid' : '' ?>">
                                    <option></option>
                                    <?php foreach($fields as $f) { ?>
                                        <option value="<?= $f->id ?>" <?= old('field_id') == $f->id ? 'selected' : '' ?>><?= $f->name ?></option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('field_id') ?></div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="seminar_date">Waktu Seminar</label>
                                    <input type="text" name="seminar_date" id="seminar_date" class="form-control datetimepicker-input <?= ($validation->hasError('seminar_date')) ? 'is-invalid' : '' ?>" placeholder="Waktu Seminar" data-toggle="datetimepicker" data-target="#seminar_date" value="<?= old('seminar_date') ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('seminar_date') ?></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="start">Waktu Mulai</label>
                                    <input type="text" name="start" id="start" class="form-control datetimepicker-input <?= ($validation->hasError('start')) ? 'is-invalid' : '' ?>" placeholder="Waktu Mulai" data-toggle="datetimepicker" data-target="#start" value="<?= old('start') ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('start') ?></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="end">Waktu Berakhir</label>
                                    <input type="text" name="end" id="end" class="form-control datetimepicker-input <?= ($validation->hasError('end')) ? 'is-invalid' : '' ?>" placeholder="Waktu Berakhir" data-toggle="datetimepicker" data-target="#end" value="<?= old('end') ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('end') ?></div>
                                </div>
                            </div>
                            <div class="form-group">
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