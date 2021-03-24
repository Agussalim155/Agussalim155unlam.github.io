<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="jumbotron jumbotron-fluid">
      <div class="container text-center">
        <img src="/img/v5.jpg" width="1000" class="" />
      </div>
    </div>

    <div class="jumbotron jumbotron-fluid">
      <div class="container text-center">
        <h1 class="display-4">Welcome To Unlam Banjarmasin</h1>
        <hr class="my-4" />
        <p class="lead">Kami Akan Selalu Melayani Mahasiswa Dengan Baik</p>
      </div>
    </div>

    <section class="service">
        <div class="container">
            <h3>SERVICE</h3>
            <div class="box">
                <div class="col-4">
                    <div class="icon"><i class="fas fa-mobile"></i></div>
                    <h4>MOBILE APP</h4>
                </div>
                <div class="col-4">
                    <div class="icon"><i class="fas fa-globe"></i></div>
                    <h4>WEB DEVELOPMENT</h4>
                </div>
                <div class="col-4">
                    <div class="icon"><i class="fas fa-edit"></i></div>
                    <h4>DESIGN</h4>
                </div>
                <div class="col-4">
                    <div class="icon"><i class="fas fa-chart-bar"></i></div>
                    <h4>DIGITAL MARKETING</h4>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <small>Copyright &copy; 2021 - Agus Salim. All Right Reserved.</small>
        </div>
    </footer>

<?= $this->endSection(); ?>