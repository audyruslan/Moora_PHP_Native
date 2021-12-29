<?php
session_start();
$title = "Proses Moora - InstaCode_Moora";
require 'layouts/header.php';
require 'layouts/navbar.php';
require 'layouts/sidebar.php';
require 'functions.php';


?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Proses Moora</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Proses Moora</li>
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
                            <h3 class="card-title">Matriks X</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Alternatif</th>
                                        <th>Pendapatan Ortu</th>
                                        <th>Tanggungan Ortu</th>
                                        <th>Pengeluaran Ortu</th>
                                        <th>IPK</th>
                                        <th>Semester</th>
                                        <th>Tingkah Laku</th>
                                        <th>Keaktifan Organisasi</th>

                                    </tr>
                                </thead>
                                <?php
                                $b = 0;
                                $sql = "SELECT*FROM tb_penilaian ORDER BY stambuk ASC";
                                $hasil = $conn->query($sql);
                                if ($hasil->num_rows > 0) {
                                    while ($row = $hasil->fetch_row()) {
                                ?>
                                        <tr>
                                            <td align="center"><?php echo $b = $b + 1; ?></td>
                                            <td><?= $row[1] ?></td>
                                            <td align="center"><?= $row[2] ?></td>
                                            <td align="center"><?= $row[3] ?></td>
                                            <td align="center"><?= $row[4] ?></td>
                                            <td align="center"><?= $row[5] ?></td>
                                            <td align="center"><?= $row[6] ?></td>
                                            <td align="center"><?= $row[7] ?></td>
                                            <td align="center"><?= $row[8] ?></td>
                                        </tr>
                                <?php }
                                } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Matriks Keputusan -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Matriks Keputusan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Alternatif</th>
                                        <th>Pendapatan Ortu</th>
                                        <th>Tanggungan Ortu</th>
                                        <th>Pengeluaran Ortu</th>
                                        <th>IPK</th>
                                        <th>Semester</th>
                                        <th>Tingkah Laku</th>
                                        <th>Keaktifan Organisasi</th>

                                    </tr>
                                </thead>
                                <?php
                                $b = 0;
                                $B1 = 0;
                                $B2 = 0;
                                $B3 = 0;
                                $B4 = 0;
                                $B5 = 0;
                                $B6 = 0;
                                $B7 = 0;

                                $sql = "SELECT*FROM tb_penilaian";
                                $hasil = $conn->query($sql);
                                if ($hasil->num_rows > 0) {
                                    while ($row = $hasil->fetch_row()) {
                                        $B1 += pow($row[2], 2);
                                        $B2 += pow($row[3], 2);
                                        $B3 += pow($row[4], 2);
                                        $B4 += pow($row[5], 2);
                                        $B5 += pow($row[6], 2);
                                        $B6 += pow($row[7], 2);
                                        $B7 += pow($row[8], 2);
                                    }
                                }


                                $sql = "SELECT*FROM tb_penilaian";
                                $hasil = $conn->query($sql);
                                if ($hasil->num_rows > 0) {
                                    while ($row = $hasil->fetch_row()) {
                                ?>
                                        <tr>
                                            <td align="center"><?php echo $b = $b + 1; ?></td>
                                            <td><?= $row[1] ?></td>
                                            <td><?= round($row[2] / round(sqrt($B1), 4), 4); ?></td>
                                            <td><?= round($row[3] / round(sqrt($B2), 4), 4); ?></td>
                                            <td><?= round($row[4] / round(sqrt($B3), 4), 4); ?></td>
                                            <td><?= round($row[5] / round(sqrt($B4), 4), 4); ?></td>
                                            <td><?= round($row[6] / round(sqrt($B5), 4), 4); ?></td>
                                            <td><?= round($row[7] / round(sqrt($B6), 4), 4); ?></td>
                                            <td><?= round($row[8] / round(sqrt($B7), 4), 4); ?></td>
                                        </tr>
                                <?php }
                                } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- Matriks Terbobot -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Matriks Terbobot</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Alternatif</th>
                                        <th>Pendapatan Ortu</th>
                                        <th>Tanggungan Ortu</th>
                                        <th>Pengeluaran Ortu</th>
                                        <th>IPK</th>
                                        <th>Semester</th>
                                        <th>Tingkah Laku</th>
                                        <th>Keaktifan Organisasi</th>

                                    </tr>
                                </thead>
                                <?php $i = 1; ?>
                                <?php
                                global $conn;

                                // Matriks 
                                $B1 = 0;
                                $B2 = 0;
                                $B3 = 0;
                                $B4 = 0;
                                $B5 = 0;
                                $B6 = 0;
                                $B7 = 0;

                                $sql = "SELECT*FROM tb_penilaian";
                                $hasil = $conn->query($sql);
                                if ($hasil->num_rows > 0) {
                                    while ($row = $hasil->fetch_row()) {
                                        $B1 += pow($row[2], 2);
                                        $B2 += pow($row[3], 2);
                                        $B3 += pow($row[4], 2);
                                        $B4 += pow($row[5], 2);
                                        $B5 += pow($row[6], 2);
                                        $B6 += pow($row[7], 2);
                                        $B7 += pow($row[8], 2);
                                    }
                                }

                                $C1 = '';
                                $C2 = '';
                                $C3 = '';
                                $C4 = '';
                                $C5 = '';
                                $C6 = '';
                                $C7 = '';
                                global $conn;

                                $sql = "SELECT*FROM tb_bobot";
                                $hasil = $conn->query($sql);
                                if ($hasil->num_rows > 0) {
                                    $row = $hasil->fetch_row();
                                    $C1 = $row[1];
                                    $C2 = $row[2];
                                    $C3 = $row[3];
                                    $C4 = $row[4];
                                    $C5 = $row[5];
                                    $C6 = $row[6];
                                    $C7 = $row[7];
                                }

                                $sql = mysqli_query($conn, "SELECT * FROM tb_penilaian");
                                if ($sql->num_rows > 0) {
                                    while ($row = $sql->fetch_row()) {
                                ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?= $row[1]; ?></td>
                                            <td><?= round($row[2] / sqrt($B1) * $C1, 4); ?></td>
                                            <td><?= round($row[3] / sqrt($B2) * $C2, 4); ?></td>
                                            <td><?= round($row[4] / sqrt($B3) * $C3, 4); ?></td>
                                            <td><?= round($row[5] / sqrt($B4) * $C4, 4); ?></td>
                                            <td><?= round($row[6] / sqrt($B5) * $C5, 4); ?></td>
                                            <td><?= round($row[7] / sqrt($B6) * $C6, 4); ?></td>
                                            <td><?= round($row[8] / sqrt($B7) * $C7, 4); ?></td>
                                        </tr>
                                        <?php $i++; ?>
                                <?php
                                    }
                                }
                                ?>
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