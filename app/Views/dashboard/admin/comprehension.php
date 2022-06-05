<?= $this->extend('dashboard/layout/template') ?>

<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tingkat Pemahaman</h1>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-sort-numeric-up"></i> Tingkat Pemahaman</h4>
                    </div>
                    <div class="card-body">
                        <div class="py-2 px-4" style="border:1px solid blue;border-radius:15px;">
                            <h2 class="text-dark pb-3">Pilih Seminar</h2>
                            <form action="<?= base_url('admin/dashboard/comprehension') ?>" method="get">
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
                                    Dari hasil perhitungan nilai dari setiap mahasiswa yang mengikuti seminar <b><?= $seminar->title ?></b>
                                    dengan total partisipan sebanyak <b><?= count($participants) ?></b> orang,
                                    maka dapat dibuatkan tabel pemahaman seminar sebagai berikut:
                                </p>
                            </div>
                        </div>
                        
                        <?php if($participants) { ?>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-header py-0 bg-primary text-white"><h5>Sangat Paham</h5></div>
                                    <div class="card-body">
                                        <span class="text-muted">Partisipan dengan tingkat pemahaman di atas 80%</span>
                                        <br><br>
                                        <h4 class="text-primary" style="display:inline"><?= round(count($class_1) / count($participants) * 100,2,PHP_ROUND_HALF_UP) .'%' ?></h4><small style="display:inline"> / 100%</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-header py-0 bg-success text-white"><h5>Paham</h5></div>
                                    <div class="card-body">
                                        <span class="text-muted">Partisipan dengan tingkat pemahaman 61% - 80%</span>
                                        <br><br>
                                        <h4 class="text-success" style="display:inline"><?= round(count($class_2) / count($participants) * 100,2,PHP_ROUND_HALF_UP) .'%' ?></h4><small style="display:inline"> / 100%</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-header py-0 bg-warning text-white"><h5>Cukup Paham</h5></div>
                                    <div class="card-body">
                                        <span class="text-muted">Partisipan dengan tingkat pemahaman 50% - 60%</span>
                                        <br><br>
                                        <h4 class="text-warning" style="display:inline"><?= round(count($class_3) / count($participants) * 100,2,PHP_ROUND_HALF_UP) .'%' ?></h4><small style="display:inline"> / 100%</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-header py-0 bg-danger text-white"><h5>Tidak Paham</h5></div>
                                    <div class="card-body">
                                        <span class="text-muted">Partisipan dengan tingkat pemahaman kurang dari 50%</span>
                                        <br><br>
                                        <h4 class="text-danger" style="display:inline"><?= round(count($class_4) / count($participants) * 100,2,PHP_ROUND_HALF_UP) .'%' ?></h4><small style="display:inline"> / 100%</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        
                        <div class="border p-2 p-md-3 mb-4" style="border-radius:5px">
                            <h3 class="text-primary mb-3">Partisipan Sangat Paham</h3>
                            <table class="table dt-responsive nowrap w-100" id="table1">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Tingkat Pemahaman (%)</th>
                                        <?php foreach($criterias as $c) { ?>
                                        <th><?= $c->kriteria ?></th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach($class_1 as $c1) {
                                    ?>
                                        <tr>
                                            <td><?= $no++."." ?></td>
                                            <td><?= $c1->fullname ?></td>
                                            <td><?= "<span class='py-2 px-3 bg-success text-white rounded w-100'>".$c1->percentage." %</span>" ?></td>
                                            <td>
                                                <?php
                                                    if($c1->criteria_1 == '1') {
                                                        echo 'Sangat Kurang';
                                                    } elseif($c1->criteria_1 == '2') {
                                                        echo 'Kurang';
                                                    } elseif($c1->criteria_1 == '3') {
                                                        echo 'Cukup';
                                                    } elseif($c1->criteria_1 == '4') {
                                                        echo 'Bagus';
                                                    } elseif($c1->criteria_1 == '5') {
                                                        echo 'Sangat Bagus';
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if($c1->criteria_2 == '1') {
                                                        echo 'Sangat Kurang';
                                                    } elseif($c1->criteria_2 == '2') {
                                                        echo 'Kurang';
                                                    } elseif($c1->criteria_2 == '3') {
                                                        echo 'Cukup';
                                                    } elseif($c1->criteria_2 == '4') {
                                                        echo 'Mudah';
                                                    } elseif($c1->criteria_2 == '5') {
                                                        echo 'Sangat Mudah';
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if($c1->criteria_3 == '1') {
                                                        echo 'Sangat Kurang';
                                                    } elseif($c1->criteria_3 == '2') {
                                                        echo 'Kurang';
                                                    } elseif($c1->criteria_3 == '3') {
                                                        echo 'Cukup';
                                                    } elseif($c1->criteria_3 == '4') {
                                                        echo 'Bagus';
                                                    } elseif($c1->criteria_3 == '5') {
                                                        echo 'Sangat Bagus';
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if($c1->criteria_4 == '1') {
                                                        echo 'Sangat Kurang';
                                                    } elseif($c1->criteria_4 == '2') {
                                                        echo 'Kurang';
                                                    } elseif($c1->criteria_4 == '3') {
                                                        echo 'Cukup';
                                                    } elseif($c1->criteria_4 == '4') {
                                                        echo 'Bermanfaat';
                                                    } elseif($c1->criteria_4 == '5') {
                                                        echo 'Sangat Bermanfaat';
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if($c1->criteria_5 == '1') {
                                                        echo 'Sangat Kurang';
                                                    } elseif($c1->criteria_5 == '2') {
                                                        echo 'Kurang';
                                                    } elseif($c1->criteria_5 == '3') {
                                                        echo 'Cukup';
                                                    } elseif($c1->criteria_5 == '4') {
                                                        echo 'Sesuai';
                                                    } elseif($c1->criteria_5 == '5') {
                                                        echo 'Sangat Sesuai';
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="border p-2 p-md-3 mb-4" style="border-radius:5px">
                            <h3 class="text-success mb-3">Partisipan Paham</h3>
                            <table class="table dt-responsive nowrap w-100" id="table2">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Tingkat Pemahaman (%)</th>
                                        <?php foreach($criterias as $c) { ?>
                                        <th><?= $c->kriteria ?></th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach($class_2 as $c2) {
                                    ?>
                                        <tr>
                                            <td><?= $no++."." ?></td>
                                            <td><?= $c2->fullname ?></td>
                                            <td><?= "<span class='py-2 px-3 bg-success text-white rounded w-100'>".$c2->percentage." %</span>" ?></td>
                                            <td>
                                                <?php
                                                    if($c2->criteria_1 == '1') {
                                                        echo 'Sangat Kurang';
                                                    } elseif($c2->criteria_1 == '2') {
                                                        echo 'Kurang';
                                                    } elseif($c2->criteria_1 == '3') {
                                                        echo 'Cukup';
                                                    } elseif($c2->criteria_1 == '4') {
                                                        echo 'Bagus';
                                                    } elseif($c2->criteria_1 == '5') {
                                                        echo 'Sangat Bagus';
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if($c2->criteria_2 == '1') {
                                                        echo 'Sangat Kurang';
                                                    } elseif($c2->criteria_2 == '2') {
                                                        echo 'Kurang';
                                                    } elseif($c2->criteria_2 == '3') {
                                                        echo 'Cukup';
                                                    } elseif($c2->criteria_2 == '4') {
                                                        echo 'Mudah';
                                                    } elseif($c2->criteria_2 == '5') {
                                                        echo 'Sangat Mudah';
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if($c2->criteria_3 == '1') {
                                                        echo 'Sangat Kurang';
                                                    } elseif($c2->criteria_3 == '2') {
                                                        echo 'Kurang';
                                                    } elseif($c2->criteria_3 == '3') {
                                                        echo 'Cukup';
                                                    } elseif($c2->criteria_3 == '4') {
                                                        echo 'Bagus';
                                                    } elseif($c2->criteria_3 == '5') {
                                                        echo 'Sangat Bagus';
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if($c2->criteria_4 == '1') {
                                                        echo 'Sangat Kurang';
                                                    } elseif($c2->criteria_4 == '2') {
                                                        echo 'Kurang';
                                                    } elseif($c2->criteria_4 == '3') {
                                                        echo 'Cukup';
                                                    } elseif($c2->criteria_4 == '4') {
                                                        echo 'Bermanfaat';
                                                    } elseif($c2->criteria_4 == '5') {
                                                        echo 'Sangat Bermanfaat';
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if($c2->criteria_5 == '1') {
                                                        echo 'Sangat Kurang';
                                                    } elseif($c2->criteria_5 == '2') {
                                                        echo 'Kurang';
                                                    } elseif($c2->criteria_5 == '3') {
                                                        echo 'Cukup';
                                                    } elseif($c2->criteria_5 == '4') {
                                                        echo 'Sesuai';
                                                    } elseif($c2->criteria_5 == '5') {
                                                        echo 'Sangat Sesuai';
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="border p-2 p-md-3 mb-4" style="border-radius:5px">
                            <h3 class="text-warning mb-3">Partisipan Cukup Paham</h3>
                            <table class="table dt-responsive nowrap w-100" id="table3">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Tingkat Pemahaman (%)</th>
                                        <?php foreach($criterias as $c) { ?>
                                        <th><?= $c->kriteria ?></th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach($class_3 as $c3) {
                                    ?>
                                        <tr>
                                            <td><?= $no++."." ?></td>
                                            <td><?= $c3->fullname ?></td>
                                            <td><?= "<span class='py-2 px-3 bg-success text-white rounded w-100'>".$c3->percentage." %</span>" ?></td>
                                            <td>
                                                <?php
                                                    if($c3->criteria_1 == '1') {
                                                        echo 'Sangat Kurang';
                                                    } elseif($c3->criteria_1 == '2') {
                                                        echo 'Kurang';
                                                    } elseif($c3->criteria_1 == '3') {
                                                        echo 'Cukup';
                                                    } elseif($c3->criteria_1 == '4') {
                                                        echo 'Bagus';
                                                    } elseif($c3->criteria_1 == '5') {
                                                        echo 'Sangat Bagus';
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if($c3->criteria_2 == '1') {
                                                        echo 'Sangat Kurang';
                                                    } elseif($c3->criteria_2 == '2') {
                                                        echo 'Kurang';
                                                    } elseif($c3->criteria_2 == '3') {
                                                        echo 'Cukup';
                                                    } elseif($c3->criteria_2 == '4') {
                                                        echo 'Mudah';
                                                    } elseif($c3->criteria_2 == '5') {
                                                        echo 'Sangat Mudah';
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if($c3->criteria_3 == '1') {
                                                        echo 'Sangat Kurang';
                                                    } elseif($c3->criteria_3 == '2') {
                                                        echo 'Kurang';
                                                    } elseif($c3->criteria_3 == '3') {
                                                        echo 'Cukup';
                                                    } elseif($c3->criteria_3 == '4') {
                                                        echo 'Bagus';
                                                    } elseif($c3->criteria_3 == '5') {
                                                        echo 'Sangat Bagus';
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if($c3->criteria_4 == '1') {
                                                        echo 'Sangat Kurang';
                                                    } elseif($c3->criteria_4 == '2') {
                                                        echo 'Kurang';
                                                    } elseif($c3->criteria_4 == '3') {
                                                        echo 'Cukup';
                                                    } elseif($c3->criteria_4 == '4') {
                                                        echo 'Bermanfaat';
                                                    } elseif($c3->criteria_4 == '5') {
                                                        echo 'Sangat Bermanfaat';
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if($c3->criteria_5 == '1') {
                                                        echo 'Sangat Kurang';
                                                    } elseif($c3->criteria_5 == '2') {
                                                        echo 'Kurang';
                                                    } elseif($c3->criteria_5 == '3') {
                                                        echo 'Cukup';
                                                    } elseif($c3->criteria_5 == '4') {
                                                        echo 'Sesuai';
                                                    } elseif($c3->criteria_5 == '5') {
                                                        echo 'Sangat Sesuai';
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="border p-2 p-md-3" style="border-radius:5px">
                            <h3 class="text-danger mb-3">Partisipan Tidak Paham</h3>
                            <table class="table dt-responsive nowrap w-100" id="table4">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Tingkat Pemahaman (%)</th>
                                        <?php foreach($criterias as $c) { ?>
                                        <th><?= $c->kriteria ?></th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach($class_4 as $c4) {
                                    ?>
                                        <tr>
                                            <td><?= $no++."." ?></td>
                                            <td><?= $c4->fullname ?></td>
                                            <td><?= "<span class='py-2 px-3 bg-success text-white rounded w-100'>".$c4->percentage." %</span>" ?></td>
                                            <td>
                                                <?php
                                                    if($c4->criteria_1 == '1') {
                                                        echo 'Sangat Kurang';
                                                    } elseif($c4->criteria_1 == '2') {
                                                        echo 'Kurang';
                                                    } elseif($c4->criteria_1 == '3') {
                                                        echo 'Cukup';
                                                    } elseif($c4->criteria_1 == '4') {
                                                        echo 'Bagus';
                                                    } elseif($c4->criteria_1 == '5') {
                                                        echo 'Sangat Bagus';
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if($c4->criteria_2 == '1') {
                                                        echo 'Sangat Kurang';
                                                    } elseif($c4->criteria_2 == '2') {
                                                        echo 'Kurang';
                                                    } elseif($c4->criteria_2 == '3') {
                                                        echo 'Cukup';
                                                    } elseif($c4->criteria_2 == '4') {
                                                        echo 'Mudah';
                                                    } elseif($c4->criteria_2 == '5') {
                                                        echo 'Sangat Mudah';
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if($c4->criteria_3 == '1') {
                                                        echo 'Sangat Kurang';
                                                    } elseif($c4->criteria_3 == '2') {
                                                        echo 'Kurang';
                                                    } elseif($c4->criteria_3 == '3') {
                                                        echo 'Cukup';
                                                    } elseif($c4->criteria_3 == '4') {
                                                        echo 'Bagus';
                                                    } elseif($c4->criteria_3 == '5') {
                                                        echo 'Sangat Bagus';
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if($c4->criteria_4 == '1') {
                                                        echo 'Sangat Kurang';
                                                    } elseif($c4->criteria_4 == '2') {
                                                        echo 'Kurang';
                                                    } elseif($c4->criteria_4 == '3') {
                                                        echo 'Cukup';
                                                    } elseif($c4->criteria_4 == '4') {
                                                        echo 'Bermanfaat';
                                                    } elseif($c4->criteria_4 == '5') {
                                                        echo 'Sangat Bermanfaat';
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if($c4->criteria_5 == '1') {
                                                        echo 'Sangat Kurang';
                                                    } elseif($c4->criteria_5 == '2') {
                                                        echo 'Kurang';
                                                    } elseif($c4->criteria_5 == '3') {
                                                        echo 'Cukup';
                                                    } elseif($c4->criteria_5 == '4') {
                                                        echo 'Sesuai';
                                                    } elseif($c4->criteria_5 == '5') {
                                                        echo 'Sangat Sesuai';
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
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