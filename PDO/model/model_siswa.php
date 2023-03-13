
<?php
    class mydb {
//Connect
        public $host = "localhost";
        public $dbname = "db_sisw4";
        public $username = "root";
        public $password = "";
        public $db;

//Script Connect
        public function __construct()
        {
            $this->db= new PDO(
                "mysql:host={$this->host};
                dbname={$this->dbname}",
                $this->username,
                $this->password
            );
        }

        public function tampilkan() {
            $sql = "SELECT * from tb_siswa";    
            $query = $this->db->prepare($sql);
            $query->execute();
            $data = $query->fetchAll();
            return $data;
        }
        
        public function insert($a, $b, $c) {
            $sql = "INSERT INTO tb_siswa(nis, nama, tanggal_lahir) values (:nis, :nama, :tanggal_lahir)";
            
            $query = $this->db->prepare($sql);

            $query->bindParam(":nis", $a);
            $query->bindParam(":nama", $b);
            $query->bindParam(":tanggal_lahir", $c);

            if($query->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }
?>
