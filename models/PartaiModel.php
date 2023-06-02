<?php

class PartaiModel {

    private $table = "partai";
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllPartai() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function tambahPartai($data){
        $this->db->query("INSERT INTO partai (nama_partai) VALUES(:nama_partai)");
        $this->db->bind('nama_partai',$data['nama_partai']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getPartaiById($id){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    

    public function updatePartai($data){
        $this->db->query("UPDATE partai SET nama_partai=:nama_partai WHERE id=:id");
        $this->db->bind('id',$data['id']);
        $this->db->bind('nama_partai',$data['nama_partai']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariPartai(){
        $key = $_POST['key'];
        $this->db->query("SELECT * FROM " . $this->table . " WHERE nama_partai LIKE :key");
        $this->db->bind(':key', "%$key%", PDO::PARAM_STR);
        return $this->db->resultSet();
    }

    public function deletePartai($id){
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id',$id);
        $this->db->execute();
    
        return $this->db->rowCount();
    }


    
    



}



?>
