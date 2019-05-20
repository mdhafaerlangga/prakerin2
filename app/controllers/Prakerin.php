<?php

class Prakerin extends Controller{
  private $flashtag = 'prakerin';

  public function index(){
    $data['judul'] = 'Daftar Prakerin';
    $data['prakerin'] = $this->model('Prakerin_model')->getAllPrakerin();
    
    $data['siswa'] = $this->model('Siswa_model')->getAllSiswa();
    $data['guru'] = $this->model('Guru_model')->getAllGuru();
    $data['perusahaan'] = $this->model('Perusahaan_model')->getAllPerusahaan();

    $this->view('templates/header', $data);
    $this->view('prakerin/index', $data);
    $this->view('templates/footer');
  }

  public function detail($id){
    $data['judul'] = 'Detail Prakerin';
    $data['prakerin'] = $this->model('Prakerin_model')->getPrakerinById($id);

    $this->view('templates/header', $data);
    $this->view('prakerin/detail', $data);
    $this->view('templates/footer');
  }

  public function tambah(){
    if ($this->model('Prakerin_model')->tambahDataPrakerin($_POST) > 0){
      Flasher::setFlash('berhasil', ' ditambahkan', 'success', $this->flashtag);
      header('location: '.BASEURL.'/prakerin');
      exit;
    } else {
      Flasher::setFlash('gagal', ' ditambahkan', 'danger', $this->flashtag);
      header('location: '.BASEURL.'/prakerin');
      exit;
    }
  }

  public function hapus($id){
    if ($this->model('Prakerin_model')->hapusDataPrakerin($id) > 0){
      Flasher::setFlash('berhasil', ' dihapus', 'success', $this->flashtag);
      header('location: '.BASEURL.'/prakerin');
      exit;
    } else {
      Flasher::setFlash('gagal', ' dihapus', 'danger', $this->flashtag);
      header('location: '.BASEURL.'/prakerin');
      exit;
    }
  }
  
  public function getUbah(){
    echo json_encode($this->model('Prakerin_model')->getPrakerinByNip($_POST['nip']));
  }

  public function ubah(){
    if ($this->model('Prakerin_model')->ubahDataPrakerin($_POST) > 0){
      Flasher::setFlash('berhasil', 'diubah', 'success', $this->flashtag);
      header('location: '.BASEURL.'/prakerin');
      exit;
    } else {
      Flasher::setFlash('gagal', 'diubah', 'danger', $this->flashtag);
      header('location: '.BASEURL.'/prakerin');
      exit;
    }
  }
  
  public function cari(){
    $data['judul'] = 'Data Prakerin';
    $data['prakerin'] = $this->model('Prakerin_model')->cariDataPrakerin();

    $this->view('templates/header', $data);
    $this->view('prakerin/index', $data);
    $this->view('templates/footer');
  }
}