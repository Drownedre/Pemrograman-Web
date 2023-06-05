
<?php
include "../model/model_siswa.php";

//buat objeks
$siswa = new mydb();
$hasil = $siswa->tampilkan();

foreach ($hasil as $a) {
    echo $a["id"] . " | " . $a["nis"] .
        " | " . $a["nama"] . " | " . $a["tanggal_lahir"] .
        "<a href='update.php?nis=" . $a["nis"] . "'>Update</a>
        <a href='../controller/proses_delete.php?nis=" . $a["nis"] . "'>Delete</a><br>";
}
?>
