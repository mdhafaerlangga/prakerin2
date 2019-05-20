<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Halaman <?= $data['judul']; ?></title>
  <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="<?=BASEURL; ?>">PRAKERIN v2</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link active" href="<?=BASEURL; ?>">Home <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" href="<?=BASEURL; ?>/siswa">Siswa</a>
        <a class="nav-item nav-link" href="<?=BASEURL; ?>/guru">Guru</a>
        <a class="nav-item nav-link" href="<?=BASEURL; ?>/perusahaan">Perusahaan</a>
        <a class="nav-item nav-link" href="<?=BASEURL; ?>/prakerin">Prakerin</a>
        <a class="nav-item nav-link" href="<?=BASEURL; ?>/about">About</a>
      </div>
    </div>
  </div>
</nav>