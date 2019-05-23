<?php
class Prakerin_model{
  private $table = 'prakerin';
  private $db;

  public function __construct(){
    $this->db = new Database;
  }
  

  public function getAllPrakerin(){
    $this->db->query('SELECT * FROM '.$this->table);
    return $this->db->resultSet();
  }
  
  public function getPrakerinById($id){
    $this->db->query('SELECT * FROM '.$this->table.' WHERE id_prakerin=:id');
    $this->db->bind('id', $id);
    return $this->db->single();
  }

  public function tambahDataPrakerin($data){
    $query = "INSERT INTO prakerin
    (nis, nip, kode_perusahaan, periode_prakerin)
    VALUES 
    (:nis, :nip, :kode_perusahaan, :periode_prakerin)";

    $this->db->query($query);
    $this->db->bind('nis', $data['nis']);
    $this->db->bind('nip', $data['nip']);
    $this->db->bind('kode_perusahaan', $data['kode_perusahaan']);
    $this->db->bind('periode_prakerin', $data['periode_prakerin']);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function hapusDataPrakerin($id){
    $query = "DELETE FROM prakerin WHERE id_prakerin = :id";
    $this->db->query($query);
    $this->db->bind('id_prakerin', $id);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function ubahDataPrakerin($data){
    $query = "UPDATE prakerin SET
      nama_guru = :nama_guru
      WHERE id = :id";

    $this->db->query($query);
    $this->db->bind('id_prakerin', $data['id']);
    $this->db->bind('nama_guru', $data['nama_guru']);
    $this->db->execute();

    return $this->db->rowCount();
  }

  public function cariDataPrakerin(){
    $keyword = $_POST['keyword'];
    $query = "SELECT * FROM prakerin WHERE nama_guru LIKE :keyword";
    $this->db->query($query);
    $this->db->bind('keyword', "%$keyword%");
    return $this->db->resultSet();
  }
}