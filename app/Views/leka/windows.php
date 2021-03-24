<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style>
    @media print {
        .button, .button2 {
            display: none;
        }
    }
    </style>

    <!-- Bootstrap CSS -->
    <link href="<?= base_url('bootstrap-4.0.0/dist/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- My Css -->
    <link href="<?= base_url('bootstrap-4.0.0/dist/css/style.css') ?>" rel="stylesheet">

    <!-- My Fonts And Icons -->
    <link href="<?= base_url('fontawesome-free/css/all.min.css') ?>" rel="stylesheet">

    <title><?= $title; ?></title>
</head>
<body onload="window.print()">

<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2">Detail Pelengkapan</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <?php foreach ($leka as $p) : ?>
                    <div class="col-md-4">
                        <img src="/img/<?= $p['sampul']; ?>" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Lemali Karmona</h5>
                            <p class="card-text"><b>Leka :</b> <?= $p['leka']; ?></p>
                            <p class="card-text"><small class="text-muted"><b>Jumlah :</b> <?= $p['jumlah']; ?></small></p>

                            <a class="button" href="/leka/edit/<?= $leka['slug']; ?>" class="btn btn-warning">Edit</a>

                            <form class="button2" action="/leka/<?= $leka['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">Delete</button>
                            </form>

                            <a href="/leka/print/<?= $leka['slug']; ?>" class="btn btn-primary">Print</a>
                            <br></br>
                            <a href="/leka">Kembali ke daftar leka</a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>