
<?php
class mydb
{
    //atribut koneksi database
    public $host = "localhost";
    public $dbname = "db_siswa";
    public $username = "root";
    public $password = "";
    public $db;

    //koneksi
    public function __construct()
    {
        $this->db = new PDO(
            "mysql:host={$this->host};
            dbname={$this->dbname}",
            $this->username,
            $this->password
        );
    }

    public function tampilkan()
    {
        $sql = "SELECT * from tb_siswa";
        $query = $this->db->prepare($sql);
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }

    public function insert($a, $b, $c)
    {
        $sql = "INSERT INTO tb_siswa(nis,nama,tanggal_lahir) values (:nis, :nama, :tanggal_lahir)";

        $query = $this->db->prepare($sql);

        $query->bindParam(":nis", $a);
        $query->bindParam(":nama", $b);
        $query->bindParam(":tanggal_lahir", $c);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update($key, $a, $b)
    {
        $sql = "UPDATE tb_siswa SET nama=:namabr,tanggal_lahir=:tanggalbr 
        WHERE nis=:kunci";

        $query = $this->db->prepare($sql);

        $query->bindParam(":kunci", $key);
        $query->bindParam(":namabr", $a);
        $query->bindParam(":tanggalbr", $b);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($key)
    {

        $sql = "DELETE FROM tb_siswa WHERE nis=:kunci";

        $query = $this->db->prepare($sql);

        $query->bindParam(":kunci", $key);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
