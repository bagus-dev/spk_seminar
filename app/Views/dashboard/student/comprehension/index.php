<?= $this->extend('dashboard/layout/template') ?>

<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pemahaman Seminar</h1>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-list-ol"></i> Pemahaman Seminar</h4>
                    </div>
                    <div class="card-body pt-0">
                        <div class="py-2 px-4" style="border:1px solid blue;border-radius:15px;">
                            <h2 class="text-dark pb-3">Pilih Seminar yang Diikuti</h2>
                            <form action="<?= base_url('student/dashboard/comprehension') ?>" method="get">
                                <?= csrf_field() ?>

                                <div class="form-row">
                                    <div class="form-group col-md-10">
                                        <label for="seminar_id">Judul Seminar</label>
                                        <select name="seminar_id" id="select2" class="custom-select <?= ($validation->hasError('seminar_id')) ? 'is-invalid' : '' ?>">
                                            <option></option>

                                            <?php foreach($seminars as $s) { ?>
                                                <option value="<?= $s->id ?>" <?php if(isset($_GET['seminar_id'])){if($seminar->id == $s->id){echo 'selected'; }} ?>><?= $s->title." --- ".$s->presenter ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="invalid-feedback"><?= $validation->getError('seminar_id') ?></div>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <button type="submit" class="btn btn-primary w-100" style="margin-top:22%">Lihat</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        <?php if(isset($_GET['seminar_id'])) { ?>
                        <div class="card border-left-primary shadow py-2 mt-5">
                            <div class="card-body">
                                <h4 class="text-info"><i class="fas fa-info-circle" style="font-size:18pt"></i> Informasi</h4>
                                <p class="mt-3">
                                    Dari hasil perhitungan nilai dari setiap mahasiswa yang mengikuti seminar <b><?= $seminar->title ?></b>,
                                    maka dapat dibuatkan tabel pemahaman seminar sebagai berikut:
                                </p>
                            </div>
                        </div>
                        
                        <div class="border mt-4 p-2 p-md-3" style="border-radius:5px">
                            <table class="table dt-responsive nowrap w-100" id="example2">
                                <thead>
                                    <tr>
                                        <th>Tingkat Pemahaman (%)</th>
                                        <?php foreach($criterias as $c) { ?>
                                        <th><?= $c->kriteria ?></th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?= "<span class='py-2 px-3 bg-success text-white rounded w-100'>".$participant->percentage." %</span>" ?></td>
                                        <td>
                                            <?php
                                                if($participant->criteria_1 == '1') {
                                                    echo 'Sangat Kurang';
                                                } elseif($participant->criteria_1 == '2') {
                                                    echo 'Kurang';
                                                } elseif($participant->criteria_1 == '3') {
                                                    echo 'Cukup';
                                                } elseif($participant->criteria_1 == '4') {
                                                    echo 'Bagus';
                                                } elseif($participant->criteria_1 == '5') {
                                                    echo 'Sangat Bagus';
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($participant->criteria_2 == '1') {
                                                    echo 'Sangat Kurang';
                                                } elseif($participant->criteria_2 == '2') {
                                                    echo 'Kurang';
                                                } elseif($participant->criteria_2 == '3') {
                                                    echo 'Cukup';
                                                } elseif($participant->criteria_2 == '4') {
                                                    echo 'Mudah';
                                                } elseif($participant->criteria_2 == '5') {
                                                    echo 'Sangat Mudah';
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($participant->criteria_3 == '1') {
                                                    echo 'Sangat Kurang';
                                                } elseif($participant->criteria_3 == '2') {
                                                    echo 'Kurang';
                                                } elseif($participant->criteria_3 == '3') {
                                                    echo 'Cukup';
                                                } elseif($participant->criteria_3 == '4') {
                                                    echo 'Bagus';
                                                } elseif($participant->criteria_3 == '5') {
                                                    echo 'Sangat Bagus';
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($participant->criteria_4 == '1') {
                                                    echo 'Sangat Kurang';
                                                } elseif($participant->criteria_4 == '2') {
                                                    echo 'Kurang';
                                                } elseif($participant->criteria_4 == '3') {
                                                    echo 'Cukup';
                                                } elseif($participant->criteria_4 == '4') {
                                                    echo 'Bermanfaat';
                                                } elseif($participant->criteria_4 == '5') {
                                                    echo 'Sangat Bermanfaat';
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($participant->criteria_5 == '1') {
                                                    echo 'Sangat Kurang';
                                                } elseif($participant->criteria_5 == '2') {
                                                    echo 'Kurang';
                                                } elseif($participant->criteria_5 == '3') {
                                                    echo 'Cukup';
                                                } elseif($participant->criteria_5 == '4') {
                                                    echo 'Sesuai';
                                                } elseif($participant->criteria_5 == '5') {
                                                    echo 'Sangat Sesuai';
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>