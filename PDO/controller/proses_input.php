
<?php
include "../model/model_siswa.php";

//unboxing dari html

$ni = $_POST["nis"];
$na = $_POST["nama"];
$ta = $_POST["tanggal_lahir"];

$siswa = new mydb();
$input = $siswa->insert($ni, $na, $ta);

if ($input == true) {
    echo "Input Data Siswa Telah BERHASIL!";
} else {
    echo "Input Data Siswa Telah GAGAL!";
}



?>