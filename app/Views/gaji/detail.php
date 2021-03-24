<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2">Detail Penggajian</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/img/<?= $gaji['sampul']; ?>" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $gaji['nama']; ?></h5>
                            <p class="card-text"><b>Jumlah Gaji :</b> <?= $gaji['jenis']; ?></p>
                            <!-- <p class="card-text"><small class="text-muted"><b>Jumlah Gaji :</b> <?= $gaji['jumlah']; ?></small></p> -->

                            <a href="/gaji/edit/<?= $gaji['jenis']; ?>" class="btn btn-warning">Edit</a>

                            <form action="/gaji/<?= $gaji['jenis']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">Delete</button>
                            </form>

                            <a href="/pager/windows" class="btn btn-primary">Print</a>
                            <br></br>
                            <a href="/gaji">Kembali ke daftar Gaji</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>