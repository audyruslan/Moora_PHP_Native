<?php
global $conn;

// Matriks I
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

// Bobot
$C1 = '';
$C2 = '';
$C3 = '';
$C4 = '';
$C5 = '';
$C6 = '';
$C7 = '';

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

$sql = "SELECT*FROM tb_penilaian";
$hasil = $conn->query($sql);
$nilais = array();
while ($row = $hasil->fetch_row()) {
    $nilais[$row[0]] = round((($row[2] / sqrt($B1)) * $C1) +
        (($row[3] / sqrt($B2)) * $C2) +
        (($row[4] / sqrt($B3)) * $C3) +
        (($row[5] / sqrt($B4)) * $C4) + 
        (($row[6] / sqrt($B5)) * $C5) +
        (($row[7] / sqrt($B6)) * $C6) +
        (($row[8] / sqrt($B7)) * $C7), 4);
    arsort($nilais);
}
