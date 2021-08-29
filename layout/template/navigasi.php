<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a href="javascript:void(0)" class="navbar-brand">
                <i class="bi bi-book"></i> &nbsp;&nbsp;<strong>Perpustakaan</strong>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($menu == 'home' ? 'active' : '') ?>" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($menu == 'peminjaman' ? 'active' : '') ?>" href="peminjaman.php">Peminjaman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($menu == 'inputan_data' ? 'active' : '') ?>" href="inputan_data.php">Inputan Data</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($menu == 'hasil_rekomendasi' ? 'active' : '') ?>" href="hasil_rekomendasi.php">Hasil Rekomendasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($menu == 'history' ? 'active' : '') ?>" href="history.php">History</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <a href="../proses_logout.php" class="btn btn-success btn-logout" type="submit">Logout</a>
                </form>
            </div>
        </div>
    </nav>
</header>