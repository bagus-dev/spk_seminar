<?= $this->extend('dashboard/layout/template') ?>

<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dasbor</h1>
        </div>

        <div class="row mb-2">
            <div class="col-md-1 col-3">
                Data
            </div>
            <div class="col-md-11 col-9 pl-0">
                <hr style="margin-top:10px;">
            </div>
        </div>
        <div class="row">
            <?php if(in_groups('admin')) { ?>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fa fa-graduation-cap text-white fa-2x"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Bidang Seminar</h4>
                        </div>
                        <div class="card-body">
                            <?= count($fields) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fa fa-brain text-white fa-2x"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Seminar</h4>
                        </div>
                        <div class="card-body">
                            <?= count($seminars) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fa fa-sort-numeric-down text-white fa-2x"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Kriteria</h4>
                        </div>
                        <div class="card-body">
                            <?= count($criterias) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fa fa-users text-white fa-2x"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Akun</h4>
                        </div>
                        <div class="card-body">
                            <?= count($users) ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php } else { ?>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fa fa-list text-white fa-2x"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Seminar</h4>
                        </div>
                        <div class="card-body">
                            <?= count($seminars) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fa fa-clipboard-list text-white fa-2x"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Keikutsertaan Seminar</h4>
                        </div>
                        <div class="card-body">
                            <?= count($participants) ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>

        <?php if(in_groups('admin')) { ?>
        <div class="row no-gutters mb-2 mt-3">
            <div class="col-md-2 d-none d-md-block">
                Daftar Akun Terbaru
            </div>
            <div class="col-md-10 pl-0 d-none d-md-block">
                <hr style="margin-top:11px;">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 id="users_latest"><i class="fas fa-users"></i> Akun Terbaru</h4>
                        <a href="<?= base_url('admin/dashboard/accounts') ?>" class="btn bg-primary text-white py-1" id="btn_more"><i class="fas fa-arrow-right circle-icon"></i> &nbsp;Selengkapnya</a>
                    </div>
                    <div class="card-body pt-0">
                        <div class="border p-2 p-md-3" style="border-radius:5px">
                            <table id="example" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Nama Lengkap</th>
                                        <th>Tempat, Tanggal Lahir</th>
                                        <th>Asal Perguruan Tinggi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($latest_users as $l) { ?>
                                        <tr>
                                            <td><?= $l->fullname ?></td>
                                            <td><?= $l->place.", ".date('d/m/Y',strtotime($l->date_birth)) ?></td>
                                            <td><?= $l->univ ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </section>
</div>
<?= $this->endSection() ?>