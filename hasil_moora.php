<?php
session_start();
$title = "Hasil Moora - InstaCode_Moora";
require 'layouts/header.php';
require 'layouts/navbar.php';
require 'layouts/sidebar.php';
require 'functions.php';
require 'hitung_moora.php';

if (isset($_POST['rekomendasi'])) {
    $rank = 1;
    $filter = $_POST['jmhs'];

    $sql = "truncate table tb_perangkingan";
    $conn->query($sql);

    foreach ($nilais as $nilai => $value) {
        if ($rank <= $filter) {
            $sqlInput = "INSERT INTO tb_perangkingan (stambuk,nilai,status)
        VALUES ('$nilai','$nilais[$nilai]','Rekomendasi')";
            $conn->query($sqlInput);
        } else {
            $sqlInput = "INSERT INTO tb_perangkingan (stambuk,nilai,status)
        VALUES ('$nilai','$nilais[$nilai]','Tidak Rekomendasi')";
            $conn->query($sqlInput);
        }
        $rank++;
    }
}

if (isset($_POST["reset"])) {
    $sql = "UPDATE tb_perangkingan
            SET status = ''";
    mysqli_query($conn, $sql);
}

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Hasil Moora</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Hasil Moora</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Matriks X -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Perhitungan Hasil Moora</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <form action="" method="POST">
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="jmhs">Jumlah Mahasiswa Rekomendasi</label>
                                            <input type="number" min="1" class="form-control" name="jmhs" id="jmhs" autocomplete="off">
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="rekomendasi">Rekomendasi!</button>
                                        <button type="submit" class="btn btn-danger" name="reset">Reset</button>
                                    </div>
                                </div>
                            </form>

                            <table id="example" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Stambuk</th>
                                        <th>Nama</th>
                                        <th>Nilai</th>
                                        <th>Status Rekomendasi</th>

                                    </tr>
                                </thead>
                                <?php
                                $b = 0;
                                $sql = "SELECT*FROM tb_perangkingan INNER JOIN tb_mahasiswa ON tb_perangkingan.stambuk = tb_mahasiswa.stambuk";
                                $hasil = $conn->query($sql);
                                if ($hasil->num_rows > 0) {
                                    while ($row = $hasil->fetch_assoc()) {
                                ?>
                                        <tr>
                                            <td align="center"><?php echo $b = $b + 1; ?></td>
                                            <td><?= $row["stambuk"] ?></td>
                                            <td align="center"><?= $row["nama"] ?></td>
                                            <td align="center"><?= $row["nilai"] ?></td>
                                            <td align="center"><?= $row["status"] ?></td>
                                        </tr>
                                <?php }
                                } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- /.content -->
</div>

<?php
require 'layouts/footer.php';
?>