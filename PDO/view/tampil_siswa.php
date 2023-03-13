 
 <?php
//mengambil folder lain
include ("../model/model_siswa.php");

$siswa = new mydb();
$hasil = $siswa->tampilkan();
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, td, th {
  border: 1px solid;
}

table {
  width: 100%;
  border-collapse: collapse;
}
    </style>
 </head>
 <body align='center'>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>NIS</th>
                <th>NAMA</th>
                <th>TANGGAL LAHIR</th>
            </tr>
        </thead>
        <?php foreach($hasil as $a){?>
            <tbody>
                <tr>
                    <td><?php echo $a['id'];?></td>
                    <td><?php echo $a['nis'];?></td>
                    <td><?php echo $a['nama'];?></td>
                    <td><?php echo $a['tanggal_lahir'];?></td>             
                    <?php }; ?>
                </tr>
        </tbody>
    </table>
 </body>
 </html>