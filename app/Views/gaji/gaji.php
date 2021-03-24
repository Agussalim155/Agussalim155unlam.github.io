<?php
// require '/Controllers/Leka.php';
// include '/Models/LekaModel.php';
//     $id = $_GET['id'];
//     $datamhs = $LekaModel->query("SELECT * FROM leka WHERE id = '$id'")->fetch_array();

?>
<script type="text/javascript">
window.print();
</script>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>FORMULIR PPL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="#">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" /> -->

    <!-- Bootstrap CSS -->
    <link href="<?= base_url('bootstrap-4.0.0/dist/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- My Css -->
    <link href="<?= base_url('bootstrap-4.0.0/dist/css/style.css') ?>" rel="stylesheet">

    <!-- My Fonts And Icons -->
    <link href="<?= base_url('fontawesome-free/css/all.min.css') ?>" rel="stylesheet">

    <style>
        .kop {
            text-align: center;
        }

        @media print {
        .button, .button2 {
            display: none;
        }
    }
    </style>
</head>

<body>
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
            <h2 class="mt-2">Detail Penggajian</h2>
            <a class="button" href="/gaji/gaji" class="btn btn-primary">Print</a>
            <a class="button2" href="/gaji">Kembali ke daftar Gaji</a>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                <?php foreach ($gaji as $g) : ?>
                    <div class="col-md-4">
                        <img src="/img/<?= $g['sampul']; ?>" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $g['nama']; ?></h5>
                            <p class="card-text"><b>Jumlah Gaji :</b> <?= $g['jenis']; ?></p>
                            <!-- <p class="card-text"><small class="text-muted"><b>Jumlah Gaji :</b> <?= $g['jumlah']; ?></small></p> -->
                                <?= csrf_field(); ?>
                            <br></br>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>