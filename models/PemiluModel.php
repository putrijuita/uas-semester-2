<?php

class PemiluModel {

    private $table = "pemilu";
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllPemilu() {
        $this->db->query("SELECT pemilu.*, partai.nama_partai FROM " . $this->table . " JOIN partai ON partai.nama_partai = pemilu.partai_nama");
        return $this->db->resultSet();
    }

    public function tambahPemilu($data) {
        $this->db->query("INSERT INTO pemilu (partai_nama, nama_lengkap, umur, jenis_kelamin) 
            VALUES (:partai_nama, :nama_lengkap, :umur, :jenis_kelamin)");
        $this->db->bind('partai_nama', $data['partai_nama']);
        $this->db->bind('nama_lengkap', $data['nama_lengkap']);
        $this->db->bind('umur', $data['umur']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
        $this->db->execute();

        return $this->db->rowCount();
    }


    public function getPemiluById($id){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    

    public function updatePemilu($data) {
        $this->db->query("UPDATE pemilu SET partai_nama=:partai_nama, `nama_lengkap`=:nama_lengkap, umur=:umur, jenis_kelamin=:jenis_kelamin WHERE id=:id");
        $this->db->bind('id', $data['id']);
        $this->db->bind('partai_nama', $data['partai_nama']);
        $this->db->bind('nama_lengkap', $data['nama_lengkap']);
        $this->db->bind('umur', $data['umur']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
        $this->db->execute();
    
        return $this->db->rowCount();
    }
    
    public function cariPemilu() {
        $key = $_POST['key'];
        $this->db->query("SELECT * FROM " . $this->table . " WHERE partai_nama LIKE :key 
                          OR nama_lengkap LIKE :key 
                          OR umur LIKE :key 
                          OR jenis_kelamin LIKE :key");
        $this->db->bind(':key', "%$key%", PDO::PARAM_STR);
        return $this->db->resultSet();
    }
 
    public function deletePemilu($id){
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id',$id);
        $this->db->execute();
    
        return $this->db->rowCount();
    }


    
    



}



?>
