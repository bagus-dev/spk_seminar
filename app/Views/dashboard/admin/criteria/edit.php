<?= $this->extend('dashboard/layout/template') ?>

<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Kriteria</h1>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4><i class="fas fa-sort-numeric-down"></i> Kriteria</h4>
                        <a href="<?= base_url('admin/dashboard/criteria'); ?>" class="btn bg-warning text-white py-1"><i class="fas fa-arrow-left circle-icon text-warning"></i> &nbsp;Kembali</a>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('admin/dashboard/criteria/update') ?>" method="post">
                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="id" value="<?= $criteria->id ?>">

                            <div class="form-group">
                                <label for="kriteria">Nama Kriteria</label>
                                <input type="text" name="kriteria" class="form-control <?= ($validation->hasError('kriteria')) ? 'is-invalid' : '' ?>" placeholder="Nama Kriteria" value="<?= old('kriteria') ? old('kriteria') : $criteria->kriteria ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('kriteria') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="bobot">Nilai Bobot (%)</label>
                                <input type="number" name="bobot" class="form-control <?= ($validation->hasError('bobot')) ? 'is-invalid' : '' ?>" placeholder="Nilai Bobot (%)" value="<?= old('bobot') ? old('bobot') : $criteria->bobot ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('bobot') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Sifat Kriteria</label>
                                <select name="keterangan" class="custom-select <?= ($validation->hasError('keterangan')) ? 'is-invalid' : '' ?>">
                                    <option value="0">Pilih Sifat</option>
                                    <option value="1" <?php if(old('keterangan') !== NULL){if(old('keterangan') == '1'){echo 'selected'; }}else{if($criteria->keterangan == '1'){echo 'selected'; }} ?>>Benefit</option>
                                    <option value="2" <?php if(old('keterangan') !== NULL){if(old('keterangan') == '2'){echo 'selected'; }}else{if($criteria->keterangan == '2'){echo 'selected'; }} ?>>Cost</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('keterangan') ?>
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