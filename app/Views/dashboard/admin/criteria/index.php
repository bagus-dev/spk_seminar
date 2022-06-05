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
                    <div class="card-header">
                        <h4><i class="fas fa-sort-numeric-down"></i> Kriteria</h4>
                    </div>
                    <div class="card-body">
                        <a href="<?= base_url('admin/dashboard/criteria/add') ?>" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah Kriteria</a>
                    
                        <div class="border mt-4 p-2 p-md-3" style="border-radius:5px">
                            <table id="example2" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Kriteria</th>
                                        <th>Nilai Bobot (%)</th>
                                        <th>Sifat Kriteria</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach($criterias as $c){
                                    ?>
                                    <tr>
                                        <td><?= $no++."." ?></td>
                                        <td><?= $c->kriteria ?></td>
                                        <td><?= $c->bobot ?></td>
                                        <td>
                                            <?php
                                                if($c->keterangan == 1) {
                                                    echo "Benefit";
                                                } else {
                                                    echo "Cost";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?= base_url('admin/dashboard/criteria/edit/'.$c->id) ?>" class="btn btn-warning" title="Edit Kriteria"><i class="fas fa-edit"></i></a>
                                                <a href="javascript:void(0)" class="btn btn-danger" title="Hapus Kriteria" onclick="$('#formDelete')[0].submit();"><i class="fas fa-trash-alt"></i></a>
                                                <form action="<?= base_url('admin/dashboard/criteria/delete') ?>" id="formDelete" method="post" style="display:hidden">
                                                    <?= csrf_field() ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="id" value="<?= $c->id ?>">
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