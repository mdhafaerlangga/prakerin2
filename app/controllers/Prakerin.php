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

  public function detail($nis){
    $data['judul'] = 'Detail Prakerin';
    $data['prakerin'] = $this->model('Prakerin_model')->getPrakerinById($nis);

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

  public function hapus($nis){
    if ($this->model('Prakerin_model')->hapusDataPrakerin($nis) > 0){
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
    echo json_encode($this->model('Prakerin_model')->getPrakerinByNis($_POST['nis']));
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

  public function getNamaSiswa (){
    echo json_encode($this->model('Prakerin_model')->getNamaPerusahaanByNip($_POST['nip']));
  }
}