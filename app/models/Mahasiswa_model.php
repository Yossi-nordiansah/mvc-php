<?php

class Mahasiswa_model
{

    private $table = "mahasiswa",
        $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMahasiswa()
    {
        $this->db->query("SELECT * FROM $this->table");
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id)
    {
        $this->db->query("SELECT * FROM mahasiswa WHERE id=:id");
        $this->db->bind("id", $id);
        return $this->db->single();
    }

    public function tambahDataMahasiswa($data)
    {
        $query = "INSERT INTO mahasiswa (nama, nim, prodi, fakultas) VALUES (:nama, :nim, :prodi, :fakultas)";

        $this->db->query($query);
        $this->db->bind('nama', $data["nama"]);
        $this->db->bind('nim', $data["nim"]);
        $this->db->bind('prodi', $data["prodi"]);
        $this->db->bind('fakultas', $data["fakultas"]);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataMahasiswa($id)
    {

        $query = "DELETE FROM mahasiswa WHERE id=:id";
        $this->db->query($query);
        $this->db->bind("id", $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataMahasiswa($data)
    {
        $query = "UPDATE mahasiswa set nama=:nama, nim=:nim, prodi=:prodi, fakultas=:fakultas WHERE id=:id";

        $this->db->query($query);
        $this->db->bind('nama', $data["nama"]);
        $this->db->bind('nim', $data["nim"]);
        $this->db->bind('prodi', $data["prodi"]);
        $this->db->bind('fakultas', $data["fakultas"]);
        $this->db->bind('id', $data["id"]);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariDataMahasiswa(){

        $keyword = $_POST["keyword"];
        $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind("keyword", "%$keyword%");
        return $this->db->resultSet();

    }
}
