<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <a href="/keluar/create" class="btn btn-primary mt-3">Tambah Data Pengeluaran</a>
            <h1 class="mt-4">Daftar Pengeluaran</h1>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Uraian</th>
                        <th scope="col">Saldo</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($keluar as $k) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $k['uraian']; ?></td>
                            <td><?= $k['pengeluaran']; ?></td>
                            <td>
                                <a href="/keluar/<?= $k['nomor']; ?>" class="btn btn-success">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<footer>
        <div class="container">
            <small>Copyright &copy; 2021 - Agus Salim. All Right Reserved.</small>
        </div>
    </footer>
<?= $this->endSection(); ?>