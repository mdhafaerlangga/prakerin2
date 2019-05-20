<?php
class Perusahaan_model{
  private $table = 'perusahaan';
  private $db;

  public function __construct(){
    $this->db = new Database;
  }
  

  public function getAllPerusahaan(){
    $this->db->query('SELECT * FROM '.$this->table);
    return $this->db->resultSet();
  }
  
  public function getPerusahaanByKodePerusahaan($kode_perusahaan){
    $this->db->query('SELECT * FROM '.$this->table.' WHERE kode_perusahaan=:kode_perusahaan');
    $this->db->bind('kode_perusahaan', $kode_perusahaan);
    return $this->db->single();
  }

  public function tambahDataPerusahaan($data){
    $query = "INSERT INTO perusahaan
    (kode_perusahaan, nama_perusahaan)
    VALUES 
    (:kode_perusahaan, :nama_perusahaan)";

    $this->db->query($query);
    $this->db->bind('kode_perusahaan', $data['kode_perusahaan']);
    $this->db->bind('nama_perusahaan', $data['nama_perusahaan']);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function hapusDataPerusahaan($kode_perusahaan){
    $query = "DELETE FROM perusahaan WHERE kode_perusahaan = :kode_perusahaan";
    $this->db->query($query);
    $this->db->bind('kode_perusahaan', $kode_perusahaan);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function ubahDataPerusahaan($data){
    $query = "UPDATE perusahaan SET
      nama_perusahaan = :nama_perusahaan
      WHERE kode_perusahaan = :kode_perusahaan";

    $this->db->query($query);
    $this->db->bind('kode_perusahaan', $data['kode_perusahaan']);
    $this->db->bind('nama_perusahaan', $data['nama_perusahaan']);
    $this->db->execute();

    return $this->db->rowCount();
  }

  public function cariDataPerusahaan(){
    $keyword = $_POST['keyword'];
    $query = "SELECT * FROM perusahaan WHERE nama_perusahaan LIKE :keyword";
    $this->db->query($query);
    $this->db->bind('keyword', "%$keyword%");
    return $this->db->resultSet();
  }
}