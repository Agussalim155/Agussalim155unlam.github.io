<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2">Detail Pelengkapan</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/img/<?= $leka['sampul']; ?>" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $leka['nama']; ?></h5>
                            <p class="card-text"><b>Leka :</b> <?= $leka['leka']; ?></p>
                            <p class="card-text"><small class="text-muted"><b>Jumlah :</b> <?= $leka['jumlah']; ?></small></p>

                            <a href="/leka/edit/<?= $leka['slug']; ?>" class="btn btn-warning">Edit</a>

                            <form action="/leka/<?= $leka['id']; ?>" method="post" class="d-inline">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">Delete</button>
                            </form>

                            <a href="/pager/print" class="btn btn-primary">Print</a>
                            <br></br>
                            <a href="/leka">Kembali ke daftar leka</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>