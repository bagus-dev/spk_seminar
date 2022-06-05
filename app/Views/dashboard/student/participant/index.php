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
                    <div class="card-header">
                        <h4><i class="fas fa-clipboard-list"></i> Keikutsertaan Seminar</h4>
                    </div>
                    <div class="card-body">
                        <a href="<?= base_url('student/dashboard/participant/add') ?>" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah Keikutsertaan</a>
                    
                        <div class="border mt-4 p-2 p-md-3" style="border-radius:5px">
                            <table id="example2" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Judul Seminar yang Diikuti</th>
                                        <th>Pemateri</th>
                                        <th>Kesan</th>
                                        <th>Kritik dan Saran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach($participants as $p) {
                                    ?>
                                    <tr>
                                        <td><?= $no++."." ?></td>
                                        <td><?= $p->title ?></td>
                                        <td><?= $p->presenter ?></td>
                                        <td><?= $p->impression ?></td>
                                        <td><?= $p->suggestion ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?= base_url('student/dashboard/participant/edit/'.$p->id) ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                <a href="javascript:void(0)" class="btn btn-danger" onclick="$('#formDelete')[0].submit();"><i class="fas fa-trash-alt"></i></a>
                                                <form action="<?= base_url('student/dashboard/participant/delete') ?>" id="formDelete" method="post" style="display:hidden">
                                                    <?= csrf_field() ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="id" value="<?= $p->id ?>">
                                                </form>
                                            </div>
                                        </td>
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