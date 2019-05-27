<?php

class Siswa extends Controller{
  private $flashtag = 'siswa';

  public function index(){
    $data['judul'] = 'Data Siswa';
    $data['siswa'] = $this->model('Siswa_model')->getAllSiswa();

    $this->view('templates/header', $data);
    $this->view('siswa/index', $data);
    $this->view('templates/footer');
  }

  public function detail($nis){
    $data['judul'] = 'Detail Siswa';
    $data['siswa'] = $this->model('Siswa_model')->getSiswaByNis($nis);
    
    $data['prakerin'] = $this->model('Prakerin_model')->getAllPrakerin();
    $data['perusahaan'] = $this->model('Prakerin_model')->getNamaPerusahaanBy($nis);
    $data['guru'] = $this->model('Prakerin_model')->getNamaGuruByNis($nis);



    $this->view('templates/header', $data);
    $this->view('siswa/detail', $data);
    $this->view('templates/footer');
  }

  public function tambah(){
    if ($this->model('Siswa_model')->tambahDataSiswa($_POST) > 0){
      Flasher::setFlash('berhasil', ' ditambahkan', 'success', $this->flashtag);
      header('location: '.BASEURL.'/siswa');
      exit;
    } else {
      Flasher::setFlash('gagal', ' ditambahkan', 'danger', $this->flashtag);
      header('location: '.BASEURL.'/siswa');
      exit;
    }
  }

  public function hapus($nis){
    if ($this->model('Siswa_model')->hapusDataSiswa($nis) > 0){
      Flasher::setFlash('berhasil', ' dihapus', 'success', $this->flashtag);
      header('location: '.BASEURL.'/siswa');
      exit;
    } else {
      Flasher::setFlash('gagal', ' dihapus', 'danger', $this->flashtag);
      header('location: '.BASEURL.'/siswa');
      exit;
    }
  }
  
  public function getUbah(){
    echo json_encode($this->model('Siswa_model')->getSiswaByNis($_POST['nis']));
  }

  public function ubah(){
    if ($this->model('Siswa_model')->ubahDataSiswa($_POST) > 0){
      Flasher::setFlash('berhasil', 'diubah', 'success', $this->flashtag);
      header('location: '.BASEURL.'/siswa');
      exit;
    } else {
      Flasher::setFlash('gagal', 'diubah', 'danger', $this->flashtag);
      header('location: '.BASEURL.'/siswa');
      exit;
    }
  }
  
  public function cari(){
    $data['judul'] = 'Data Siswa';
    $data['siswa'] = $this->model('Siswa_model')->cariDataSiswa();

    $this->view('templates/header', $data);
    $this->view('siswa/index', $data);
    $this->view('templates/footer');
  }
}