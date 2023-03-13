
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
    }
?>