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
  
  public function getPrakerinByNIs($nis){
    $this->db->query('SELECT * FROM '.$this->table.' WHERE nis = :nis');
    $this->db->bind('nis', $nis);
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

  public function hapusDataPrakerin($nis){
    $query = "DELETE FROM prakerin WHERE nis = :nis";
    $this->db->query($query);
    $this->db->bind('nis', $nis);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function ubahDataPrakerin($data){
    $query = "UPDATE prakerin SET
      nip = :nip,
      kode_perusahaan = :kode_perusahaan
      WHERE nis = :nis";

    $this->db->query($query);
    $this->db->bind('nis', $data['nis']);
    $this->db->bind('nip', $data['nip']);
    $this->db->bind('kode_perusahaan', $data['kode_perusahaan']);
    $this->db->execute();

    return $this->db->rowCount();
  }

  public function cariDataPrakerin(){
    $keyword = $_POST['keyword'];
    $query = "SELECT * FROM prakerin WHERE nis || nip || kode_perusahaan LIKE :keyword";
    $this->db->query($query);
    $this->db->bind('keyword', "%$keyword%");
    return $this->db->resultSet();
  }

  public function getNamaPerusahaanByNis($nis){
    $query = "SELECT perusahaan FROM siswa JOIN prakerin ON siswa.nis = prakerin.nis JOIN perusahaan ON prakerin.kode_perusahaan = perusahaan.kode_perusahaan WHERE siswa.nis = '$nis'";

    $this->db->query($query);
    $this->db->execute($query);
    $this->db->bind('nis', $nis);
    return $this->db->single();
  }

  public function getNamaGuruByNis($nis){
    $query = "SELECT guru.nama_guru FROM siswa JOIN prakerin ON siswa.nis = prakerin.nis JOIN guru ON prakerin.nip = guru.nip WHERE siswa.nis = '$nis'";

    $this->db->query($query);
    $this->db->execute($query);
    $this->db->bind('nis', $nis);
    return $this->db->single();
  }

  public function getNamaPerusahaanByNip($nip){
    $query = "SELECT perusahaan.nama_perusahaan FROM guru JOIN prakerin ON guru.nip = prakerin.nip JOIN perusahaan ON prakerin.kode_perusahaan = perusahaan.kode_perusahaan WHERE guru.nip= '$nip'";

    $this->db->query($query);
    $this->db->execute($query);
    $this->db->bind('nip', $nip);
    return $this->db->resultSet();
  }

  public function getNamaSiswaByNip($nip){
    $query = "SELECT siswa.nama_siswa FROM guru JOIN prakerin ON guru.nip = prakerin.nip JOIN siswa ON prakerin.nis = siswa.nis WHERE guru.nip = '$nip'";

    $this->db->query($query);
    $this->db->execute($query);
    $this->db->bind('nip', $nip);
    return $this->db->resultSet();
  }

  public function selectAllByNip($nip){
    $query = "SELECT * FROM guru JOIN prakerin ON guru.nip = prakerin.nip JOIN siswa ON prakerin.nis = siswa.nis JOIN perusahaan ON perusahaan.kode_perusahaan = prakerin.kode_perusahaan WHERE guru.nip = '$nip'";

    $this->db->query($query);
    $this->db->execute($query);
    $this->db->bind('nip', $nip);
    return $this->db->resultSet();
  }
}