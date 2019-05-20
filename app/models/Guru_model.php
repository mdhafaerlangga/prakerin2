<?php
class Guru_model{
  private $table = 'guru';
  private $db;

  public function __construct(){
    $this->db = new Database;
  }
  

  public function getAllGuru(){
    $this->db->query('SELECT * FROM '.$this->table);
    return $this->db->resultSet();
  }
  
  public function getGuruByNip($nip){
    $this->db->query('SELECT * FROM '.$this->table.' WHERE nip=:nip');
    $this->db->bind('nip', $nip);
    return $this->db->single();
  }

  public function tambahDataGuru($data){
    $query = "INSERT INTO guru
    (nip, nama_guru)
    VALUES 
    (:nip, :nama_guru)";

    $this->db->query($query);
    $this->db->bind('nip', $data['nip']);
    $this->db->bind('nama_guru', $data['nama_guru']);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function hapusDataGuru($nip){
    $query = "DELETE FROM guru WHERE nip = :nip";
    $this->db->query($query);
    $this->db->bind('nip', $nip);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function ubahDataGuru($data){
    $query = "UPDATE guru SET
      nama_guru = :nama_guru
      WHERE nip = :nip";

    $this->db->query($query);
    $this->db->bind('nip', $data['nip']);
    $this->db->bind('nama_guru', $data['nama_guru']);
    $this->db->execute();

    return $this->db->rowCount();
  }

  public function cariDataGuru(){
    $keyword = $_POST['keyword'];
    $query = "SELECT * FROM guru WHERE nama_guru LIKE :keyword";
    $this->db->query($query);
    $this->db->bind('keyword', "%$keyword%");
    return $this->db->resultSet();
  }
}