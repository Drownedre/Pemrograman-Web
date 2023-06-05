
<?php
include "../model/model_siswa.php";

//unboxing dari html
$ni = $_POST["nis"];
$na = $_POST["nama"];
$ta = $_POST["tanggal"];

$siswa = new mydb();
$input = $siswa->insert($ni, $na, $ta);

if ($input == true) {
    echo "Sukses Input Data Siswa";
} else {
    echo "Gagal Input Data Siswa";
}
?>
