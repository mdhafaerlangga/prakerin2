<?php

class Perusahaan extends Controller{
  private $flashtag = 'perusahaan';

  public function index(){
    $data['judul'] = 'Daftar Perusahaan';
    $data['perusahaan'] = $this->model('Perusahaan_model')->getAllPerusahaan();

    $this->view('templates/header', $data);
    $this->view('perusahaan/index', $data);
    $this->view('templates/footer');
  }

  public function detail($kd_perusahaan){
    $data['judul'] = 'Detail Perusahaan';
    $data['perusahaan'] = $this->model('Perusahaan_model')->getPerusahaanByKodePerusahaan($kd_perusahaan);

    $this->view('templates/header', $data);
    $this->view('perusahaan/detail', $data);
    $this->view('templates/footer');
  }

  public function tambah(){
    if ($this->model('Perusahaan_model')->tambahDataPerusahaan($_POST) > 0){
      Flasher::setFlash('berhasil', ' ditambahkan', 'success');
      header('location: '.BASEURL.'/perusahaan');
      exit;
    } else {
      Flasher::setFlash('gagal', ' ditambahkan', 'danger');
      header('location: '.BASEURL.'/perusahaan');
      exit;
    }
  }

  public function hapus($kd_perusahaan){
    if ($this->model('Perusahaan_model')->hapusDataPerusahaan($kd_perusahaan) > 0){
      Flasher::setFlash('berhasil', ' dihapus', 'success', $this->flashtag);
      header('location: '.BASEURL.'/perusahaan');
      exit;
    } else {
      Flasher::setFlash('gagal', ' dihapus', 'danger', $this->flashtag);
      header('location: '.BASEURL.'/perusahaan');
      exit;
    }
  }
  
  public function getUbah(){
    echo json_encode($this->model('Perusahaan_model')->getPerusahaanByNip($_POST['kd_perusahaan']));
  }

  public function ubah(){
    if ($this->model('Perusahaan_model')->ubahDataPerusahaan($_POST) > 0){
      Flasher::setFlash('berhasil', 'diubah', 'success', $this->flashtag);
      header('location: '.BASEURL.'/perusahaan');
      exit;
    } else {
      Flasher::setFlash('gagal', 'diubah', 'danger', $this->flashtag);
      header('location: '.BASEURL.'/perusahaan');
      exit;
    }
  }
  
  public function cari(){
    $data['judul'] = 'Data Perusahaan';
    $data['perusahaan'] = $this->model('Perusahaan_model')->cariDataPerusahaan();

    $this->view('templates/header', $data);
    $this->view('perusahaan/index', $data);
    $this->view('templates/footer');
  }
}