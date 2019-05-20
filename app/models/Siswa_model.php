<?php
class Siswa_model{
  private $table = 'siswa';
  private $db;

  public function __construct(){
    $this->db = new Database;
  }
  

  public function getAllSiswa(){
    $this->db->query('SELECT * FROM '.$this->table);
    return $this->db->resultSet();
  }
  
  public function getSiswaByNis($nis){
    $this->db->query('SELECT * FROM '.$this->table.' WHERE nis=:nis');
    $this->db->bind('nis', $nis);
    return $this->db->single();
  }

  public function tambahDataSiswa($data){
    $query = "INSERT INTO siswa
    (nis, nama_siswa)
    VALUES 
    (:nis, :nama_siswa)";

    $this->db->query($query);
    $this->db->bind('nis', $data['nis']);
    $this->db->bind('nama_siswa', $data['nama_siswa']);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function hapusDataSiswa($nis){
    $query = "DELETE FROM siswa WHERE nis = :nis";
    $this->db->query($query);
    $this->db->bind('nis', $nis);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function ubahDataSiswa($data){
    $query = "UPDATE siswa SET
      nama_siswa = :nama_siswa
      WHERE nis = :nis";

    $this->db->query($query);
    $this->db->bind('nis', $data['nis']);
    $this->db->bind('nama_siswa', $data['nama_siswa']);
    $this->db->execute();

    return $this->db->rowCount();
  }

  public function cariDataSiswa(){
    $keyword = $_POST['keyword'];
    $query = "SELECT * FROM siswa WHERE nama_siswa LIKE :keyword";
    $this->db->query($query);
    $this->db->bind('keyword', "%$keyword%");
    return $this->db->resultSet();
  }
}