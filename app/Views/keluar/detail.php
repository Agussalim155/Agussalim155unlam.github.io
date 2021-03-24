<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-4">Detail Pengeluaran</h2>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><b>Tanggal :</b><?= $keluar['tanggal']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><b>Uraian :</b><?= $keluar['uraian']; ?></h6>
                    <h7 class="card-text"><b>Pengeluaran :</b><?= $keluar['pengeluaran']; ?></h7>
                    <p class="card-text"><b>Saldo :</b><?= $keluar['saldo']; ?></p>
                    <a href="/keluar/edit/<?= $keluar['nomor']; ?>" class="btn btn-warning">Edit</a>

                    <form action="/keluar/<?= $keluar['id']; ?>" method="post" class="d-inline">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">Delete</button>
                    </form>

                    <a href="/keluar/kate" class="btn btn-primary">Print</a>
                    <br></br>
                    <a href="/keluar">Kembali ke daftar keluar</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>