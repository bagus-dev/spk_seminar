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
                    <div class="card-header">
                        <h4><i class="fas fa-brain"></i> Seminar</h4>
                    </div>
                    <div class="card-body">
                        <a href="<?= base_url('admin/dashboard/seminar/add') ?>" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah Seminar</a>
                    
                        <div class="border mt-4 p-2 p-md-3" style="border-radius:5px">
                            <table id="example2" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Judul Seminar</th>
                                        <th>Nama Pemateri</th>
                                        <th>Bidang Seminar</th>
                                        <th>Tanggal Seminar</th>
                                        <th>Waktu Seminar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach($seminars as $s) {
                                    ?>
                                    <tr>
                                        <td><?= $no++."." ?></td>
                                        <td><?= $s->title ?></td>
                                        <td><?= $s->presenter ?></td>
                                        <td><?= $s->name ?></td>
                                        <td><?= date('d/m/Y',strtotime($s->seminar_date)) ?></td>
                                        <td><?= date('H:i',strtotime($s->start))." - ".date('H:i',strtotime($s->end))." WIB" ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?= base_url('admin/dashboard/seminar/edit/'.$s->id) ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                <a href="javascript:void(0)" class="btn btn-danger" onclick="$('#formDelete')[0].submit();"><i class="fas fa-trash-alt"></i></a>
                                                <form action="<?= base_url('admin/dashboard/seminar/delete') ?>" id="formDelete" method="post" style="display:hidden">
                                                    <?= csrf_field() ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="id" value="<?= $s->id ?>">
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