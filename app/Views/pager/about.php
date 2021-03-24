<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="mt-4">About Us</h1>
        <p>Aplikasi ini dibuat dengan Codeigniter 4 dan Bootstrap 4.6.0.</p>
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