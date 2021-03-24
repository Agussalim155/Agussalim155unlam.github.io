<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/">Web Unlam 2.0</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" href="/pager/home">Home</a>
                <a class="nav-link" href="/pager/about">About</a>
                <a class="nav-link" href="/pager/contact">Contact</a>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Data Aplikasi
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/pegawai">Pegawai</a>
          <a class="dropdown-item" href="/leka">Pelengkapan</a>
          <a class="dropdown-item" href="/gaji">Penggajian</a>
          <a class="dropdown-item" href="/masuk">Pemasukan</a>
          <a class="dropdown-item" href="/keluar">Pengeluaran</a>
          <div class="dropdown-divider"></div>
            <?php if (logged_in()) : ?>
            <a class="dropdown-item" href="/logout">Logout</a>
            <?php else : ?>
            <a class="dropdown-item" href="/login">Login</a>
            <?php endif; ?>
        </div>
      </li>
            </div>
        </div>
    </div>
    <div class="dropdown">
	<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		Print Data
	</button>
	<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
		<a class="dropdown-item" href="/pager/windows">Print Pegawai</a>
		<a class="dropdown-item" href="/pager/print">Print Pelengkapan</a>
		<a class="dropdown-item" href="/gaji/gaji">Print Penggajian</a>
		<a class="dropdown-item" href="/masuk/mate">Print Pemasukan</a>
		<a class="dropdown-item" href="/keluar/kate">Print Pengeluaran</a>
	</div>
</div>
</nav>