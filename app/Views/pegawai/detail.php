<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2">Detail Pegawai</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/img/<?= $pegawai['sampul']; ?>" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $pegawai['nama']; ?></h5>
                            <p class="card-text"><b>NRP :</b> <?= $pegawai['nrp']; ?></p>
                            <p class="card-text"><small class="text-muted"><b>Alamat :</b> <?= $pegawai['alamat']; ?></small></p>

                            <a href="/pegawai/edit/<?= $pegawai['slug']; ?>" class="btn btn-warning">Edit</a>

                            <form action="/pegawai/<?= $pegawai['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">Delete</button>
                            </form>

                            <!-- <a class="button" target="_blank" href="/pager/windows" class="btn btn-sm btn-info pdf">Print</a> -->
                            <br></br>
                            <a class="button" href="/pegawai">Kembali ke daftar pegawai</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>