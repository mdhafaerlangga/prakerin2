<?php

class Guru extends Controller{
  private $flashtag = 'guru';

  public function index(){
    $data['judul'] = 'Daftar Guru';
    $data['guru'] = $this->model('Guru_model')->getAllGuru();

    $this->view('templates/header', $data);
    $this->view('guru/index', $data);
    $this->view('templates/footer');
  }

  public function detail($nip){
    $data['judul'] = 'Detail Guru';
    $data['guru'] = $this->model('Guru_model')->getGuruByNis($nip);

    $this->view('templates/header', $data);
    $this->view('guru/detail', $data);
    $this->view('templates/footer');
  }

  public function tambah(){
    if ($this->model('Guru_model')->tambahDataGuru($_POST) > 0){
      Flasher::setFlash('berhasil', ' ditambahkan', 'success');
      header('location: '.BASEURL.'/guru');
      exit;
    } else {
      Flasher::setFlash('gagal', ' ditambahkan', 'danger');
      header('location: '.BASEURL.'/guru');
      exit;
    }
  }

  public function hapus($nip){
    if ($this->model('Guru_model')->hapusDataGuru($nip) > 0){
      Flasher::setFlash('berhasil', ' dihapus', 'success', $this->flashtag);
      header('location: '.BASEURL.'/guru');
      exit;
    } else {
      Flasher::setFlash('gagal', ' dihapus', 'danger', $this->flashtag);
      header('location: '.BASEURL.'/guru');
      exit;
    }
  }
  
  public function getUbah(){
    echo json_encode($this->model('Guru_model')->getGuruByNip($_POST['nip']));
  }

  public function ubah(){
    if ($this->model('Guru_model')->ubahDataGuru($_POST) > 0){
      Flasher::setFlash('berhasil', 'diubah', 'success', $this->flashtag);
      header('location: '.BASEURL.'/guru');
      exit;
    } else {
      Flasher::setFlash('gagal', 'diubah', 'danger', $this->flashtag);
      header('location: '.BASEURL.'/guru');
      exit;
    }
  }
  
  public function cari(){
    $data['judul'] = 'Data Guru';
    $data['guru'] = $this->model('Guru_model')->cariDataGuru();

    $this->view('templates/header', $data);
    $this->view('guru/index', $data);
    $this->view('templates/footer');
  }
}