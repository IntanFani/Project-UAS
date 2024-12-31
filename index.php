<?php
// Konfigurasi Database
$host = "localhost"; // Nama host
$user = "root"; // Username database
$password = ""; // Password database
$database = "db_cv_fani"; // Nama database
// Membuat koneksi ke database
$conn = new mysqli($host, $user, $password, $database);
// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
// Query untuk mengambil data dari tabel
$sql = "SELECT id, nama, jenis_kelamin, alamat, deskripsi, foto FROM users";
$result = $conn->query($sql);
// Query untuk mengambil data dari tabel
$sql1 = "SELECT id, pendidikan, tahun, nama_sekolah FROM education";
$result_edu = $conn->query($sql1);
// Query untuk mengambil data dari tabel
$sql2 = "SELECT id, project, keterangan, foto, link FROM project";
$result_pro = $conn->query($sql2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand text-white" href="#">2303010042 | FANI INTAN NURAINI | C</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#hero"><b>HOME</b></a></li>
                    <li class="nav-item"><a class="nav-link" href="#education"><b>EDUCATION</b></a></li>
                    <li class="nav-item"><a class="nav-link" href="#project"><b>PROJECT</b></a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact"><b>CONTACT</b></a></li>
                    <li class="nav-item">
                        <button class="btn hire-btn"><b>Hire me</b></button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section" id="hero">
        <div class="container">
            <div class="row align-items-center">
                <!-- Hero Text -->
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="col-md-6 hero-content">
                        <h1><span>I’m</span> <br> <?= $row['nama'] ?></h1>
                        <!-- Tampilkan Deskripsi -->
                        <p class="my-3">
                            <?= $row['deskripsi'] ?>
                        </p>
                        <a href="#" class="btn btn-custom">Download CV</a>
                    </div>
                    <!-- Hero Image -->
                    <div class="col-md-6 text-center hero-image">
                        <img src="../backend/assets/images/<?= $row['foto'] ?>" alt="Foto" width="100">
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </section>

    <section class="education-section" id="education">
        <div class="container">
            <div class="head-edu">
                <h2><strong>EDUCATION</strong></h2>
                <p>Riwayat Pendidikan</p>
            </div>
            <table class="table table-light table-bordered border-dark">
                <thead class="table-dark">
                    <trt>
                        <th scope="col">No</th>
                        <th scope="col">Pendidikan</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">Nama Sekolah/Kampus</th>
                    </trt>
                </thead>
                <tbody class="text-light">
                    <?php if ($result_edu && $result_edu->num_rows > 0): ?>
                        <?php while ($row = $result_edu->fetch_assoc()): ?>
                            <tr>
                                <td scope="row"><?= $row['id'] ?></td>
                                <td><?= $row['pendidikan'] ?></td>
                                <td><?= $row['tahun'] ?></td>
                                <td><?= $row['nama_sekolah'] ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">Tidak ada data yang tersedia</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>

    <section class="project-section" id="project">
        <div class="container">
            <div class="head-pro">
                <h2><strong>PROJECT</strong></h2>
                <p>Project yang pernah saya buat</p>
            </div>
            <?php if ($result_pro && $result_pro->num_rows > 0): ?>
                <div class="row">
                    <?php while ($row = $result_pro->fetch_assoc()): ?>
                        <div class="col-md-4">
                            <div class="card" style="width: 22rem;">
                                <img src="../backend/assets/images/<?= $row['foto'] ?>" class="card-img-top" alt="Foto">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $row['project'] ?></h5>
                                    <p class="card-text"><?= $row['keterangan'] ?></p>
                                    <a href="<?= $row['link'] ?>" class="btn btn-dark">Link</a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <p>Tidak Ada Project</p>
            <?php endif; ?>
        </div>
    </section>

    <footer class="footer" id="contact">
        <div class="contact-section">
            <h3><strong>Contact</strong></h3>
            <p>
                <strong>Address:</strong><br>
                Parungponteng, Tasikmalaya<br>
                Jawa Barat, Indonesia
            </p>
            <div class="social-media">
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-facebook"></i> </a>
                <a href="#"><i class="bi bi-twitter"></i></a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2024 Fani Intan. All rights reserved.</p>
            <div class="links">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
            </div>
        </div>
    </footer>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>