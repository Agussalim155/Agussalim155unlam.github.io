<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Tambah Data Pengeluaran</h2>
            <form action="/keluar/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <label for="nomor" class="col-sm-2 col-form-label">Nomor</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nomor')) ? 'is-invalid' : ''; ?>" id="nomor" name="nomor" autofocus value="<?= old('nomor'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nomor'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?= old('tanggal'); ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="uraian" class="col-sm-2 col-form-label">Uraian</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="uraian" name="uraian" value="<?= old('uraian'); ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pengeluaran" class="col-sm-2 col-form-label">Pengeluaran</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="pengeluaran" name="pengeluaran" value="<?= old('pengeluaran'); ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="saldo" class="col-sm-2 col-form-label">Saldo</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="saldo" name="saldo" value="<?= old('saldo'); ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>