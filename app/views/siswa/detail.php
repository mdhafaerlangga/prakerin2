<div class="container mt-5">
  <div class="card" style="width : 18rem;">
    <div class="card-body">
      <h5 class="card-title"><?=$data['siswa']['nama_siswa'];  ?></h5>
      <h6 class="card-subtitle mb-2 text-muted"><?=$data['siswa']['nis']; ?></h6>
      <hr>
      <p class="card-text">Nama Perusahaan: <?=$data['perusahaan']['nama_perusahaan']; ?></p>
      <p class="card-text">Nama Pembimbing: <?=$data['guru']['nama_guru']; ?></p>

      <!-- <?php foreach ($data['prakerin'] as $prakerin ): ?>
      <?php if ($prakerin['nis'] == $data['siswa']['nis']) {
        $query = "SELECT perusahaan.perusahaan_nama,guru.nama_guru FROM
        guru JOIN prakerin ON prakerin.nip = guru.nip
        JOIN perusahaan ON perusahaan.kode_perusahaan = prakerin.kode_perusahaan";
      } ?>
      <?php endforeach; ?> -->
      <a href="<?=BASEURL; ?>/siswa" class="card-link">Kembali</a>
    </div>
  </div>
</div>