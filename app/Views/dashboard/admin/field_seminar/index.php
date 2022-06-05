<?= $this->extend('dashboard/layout/template') ?>

<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Bidang Seminar</h1>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-graduation-cap"></i> Bidang Seminar</h4>
                    </div>
                    <div class="card-body">
                        <a href="<?= base_url('admin/dashboard/field_seminar/add') ?>" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah Bidang Seminar</a>
                    
                        <div class="border mt-4 p-2 p-md-3" style="border-radius:5px">
                            <table id="example2" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Bidang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach($fields as $f) {
                                    ?>
                                    <tr>
                                        <td><?= $no++."." ?></td>
                                        <td><?= $f->name ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?= base_url('admin/dashboard/field_seminar/edit/'.$f->id) ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                <a href="javascript:void(0)" class="btn btn-danger" onclick="$('#formDelete')[0].submit();"><i class="fas fa-trash-alt"></i></a>
                                                <form action="<?= base_url('admin/dashboard/field_seminar/delete') ?>" id="formDelete" method="post" style="display:hidden">
                                                    <?= csrf_field() ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="id" value="<?= $f->id ?>">
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