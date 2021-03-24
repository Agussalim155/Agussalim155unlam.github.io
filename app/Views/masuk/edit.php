<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Ubah Data Pemasukan</h2>
            <form action="/masuk/update/<?= $masuk['angka']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="angka" value="<?= $masuk['angka']; ?>">
                <div class="form-group row">
                    <label for="angka" class="col-sm-2 col-form-label">Angka</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('angka')) ? 'is-invalid' : ''; ?>" id="angka" name="angka" autofocus value="<?= old(('angka')) ? old('angka') : $masuk['angka']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('angka'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?= old(('tanggal')) ? old('tanggal') : $masuk['tanggal']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="uraian" class="col-sm-2 col-form-label">Uraian</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="uraian" name="uraian" value="<?= old(('uraian')) ? old('uraian') : $masuk['uraian']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pemasukan" class="col-sm-2 col-form-label">Pemasukan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="pemasukan" name="pemasukan" value="<?= old(('pemasukan')) ? old('pemasukan') : $masuk['pemasukan']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="saldo" class="col-sm-2 col-form-label">Saldo</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="saldo" name="saldo" value="<?= old(('saldo')) ? old('saldo') : $masuk['saldo']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>