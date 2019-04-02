<?php
require "connect.php";
$mahasiswas = mysqli_query($conn, "SELECT * FROM mhs");
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./bootstrap/bootstrap.min.css">

    <title>Data Mahasiswa!</title>
</head>

<body>
a
1

    <!-- Heading -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <p class="lead">Pelatihan CRUD PHP Native Bootcamp LUG 2019</p>
            <h1 class="display-4">Tabel Data Mahasiswa</h1>
        </div>
    </div>

    <div class="container">
        <!-- Button Tambah Mahasiswa -->
        <form action="create.php">
            <button class="btn btn-primary">Tambah Mahasiswa</button>
        </form>

        <br><br>
        <!-- Tabel Mahasiswa -->
        <table class="table">

            <!-- Tabel Heading -->
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIM</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">JURUSAN</th>
                    <th scope="col">FOTO</th>
                    <th scope="col">AKSI</th>
                </tr>
            </thead>

            <!-- Tabel Body -->
            <tbody>

                <!-- Baris 1 -->
                <?php
                $no = 1;
                foreach ($mahasiswas as $mhs) :
                ?>
                <tr>
                    <th scope="row"><?php echo $no ?></th>
                    <td><?php echo $mhs['nim'] ?></td>
                    <td><?php echo $mhs['nama'] ?></td>
                    <td><?php echo $mhs['jurusan'] ?></td>
                    <td>
                        <img src="foto-mhs/<?php echo $mhs['foto'] ?>" width="150px" alt="<?= $mhs['nim'].'jpg'?>">
                    </td>
                    <td>
                        <form action="update.php" method="get">
                            <input type="hidden" value="<?= $mhs['id'] ?>"name="id">
                            <button class="btn btn-secondary">Edit</button>
                        </form>
                        <br>
                        <form action="delete.php" method="get">
                            <input type="hidden" value="<?= $mhs['id']?> "name="id">
                            <button class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                    <?php
                    $no++;
                endforeach; 
                    ?>
            </tbody>
        </table>

        <br><br>

        <!-- Pagination -->
        <ul class="pagination">
            <li class="page-item disabled">
                <span class="page-link">Sebelumnyas</span>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Selanjutnya</a>
            </li>
        </ul>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="./bootstrap/jquery.js"></script>
    <script src="./bootstrap/popper.js"></script>
    <script src="./bootstrap/bootstrap.js"></script>
</body>

</html>