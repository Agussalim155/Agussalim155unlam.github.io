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

<img src="<?=base_url('/img/Logo-Unlam.png')?>" align="left" width="90" height="90">
  <p align="center"><b>
    <font size="5">Rektorat</font> <br> 
    <font size="5">Universitas Lambung Mangkurat</font><br>
    <font size="5">Banjarmasin</font> <br>
    <hr size="2px" color="black">
    <center><font size="2">Alamat : Jl. Brigjen H. Hasan Basri, Pangeran, Kec. Banjarmasin Utara, Kota Banjarmasin, Kalimantan Selatan 70123</font></center>
    <hr size="2px" color="black">
  </b></p>

<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2">Detail Pengeluaran</h2>
            <a class="button" href="/pager/windows" class="btn btn-warning">Print</a>
            <a class="button2" href="/keluar" class="btn btn-danger">Kembali Ke Form Pengeluaran</a>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <?php foreach ($keluar as $m) : ?>
                    <div class="col-md-8">
                     <div class="card-body">
                      <h4 class="card-title"><b>Nomor :</b><?= $m['nomor']; ?></h4>
                      <h5 class="card-subtiltle mb-2 text-muted"><b>Tanggal :</b><?= $m['tanggal']; ?></h5>
                      <h6 class="card-text"><b>Uraian :</b><?= $m['uraian']; ?></h6>
                      <h7 class="card-text"><b>Pemasukan :</b><?= $m['pengeluaran']; ?></h7>
                      <p class="card-text"><b>Saldo :</b><?= $m['saldo']; ?></p>
                            <br></br>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>