<?= $this->extend('dashboard/layout/template') ?>

<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Daftar Akun</h1>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-users"></i> Daftar Akun</h4>
                    </div>
                    <div class="card-body">
                        <div class="border p-2 p-md-3" style="border-radius:5px">
                            <table id="example2" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Lengkap</th>
                                        <th>Alamat Email</th>
                                        <th>Tempat, Tanggal Lahir</th>
                                        <th>Asal Perguruan Tinggi</th>
                                        <th>Nomor HP</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach($users as $u) {
                                    ?>
                                    <tr>
                                        <td><?= $no++."." ?></td>
                                        <td><?= $u->email ?></td>
                                        <td><?= $u->fullname ?></td>
                                        <td><?= $u->place.", ".date('d/m/Y',strtotime($u->date_birth)) ?></td>
                                        <td><?= $u->univ ?></td>
                                        <td><?= $u->phone ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>