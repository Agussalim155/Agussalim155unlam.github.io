<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-4">Detail Pemasukan</h2>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><b>Tanggal :</b><?= $masuk['tanggal']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><b>Uraian :</b><?= $masuk['uraian']; ?></h6>
                    <h7 class="card-text"><b>Pemasukan :</b><?= $masuk['pemasukan']; ?></h7>
                    <p class="card-text"><b>Saldo :</b><?= $masuk['saldo']; ?></p>
                    <a href="/masuk/edit/<?= $masuk['angka']; ?>" class="btn btn-warning">Edit</a>

                    <form action="/masuk/<?= $masuk['id']; ?>" method="post" class="d-inline">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">Delete</button>
                    </form>

                    <a href="/masuk/mate" class="btn btn-primary">Print</a>
                    <br></br>
                    <a href="/masuk">Kembali ke daftar masuk</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>