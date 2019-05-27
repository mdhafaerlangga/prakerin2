<div class="container mt-5">
  <div class="card" style="width : 18rem;">
    <div class="card-body">
      <h5 class="card-title"><?=$data['guru']['nama_guru'];  ?></h5>
      <h6 class="card-subtitle mb-2 text-muted"><?=$data['guru']['nip']; ?></h6>
      <hr>
      <div class="form-group">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Nama Perusahaan</th>
              <th scope="col">Nama Siswa</th>
            </tr>
          </thead>
          <tfoot>
            <?php foreach ($data['database'] as $database): ?>
            <tr>
              <td><?=$database['nama_perusahaan']; ?></td>
              <td><?=$database['nama_siswa']; ?></td>
            </tr>
            <?php endforeach; ?>
          </tfoot>
        </table>
        <a href="<?=BASEURL; ?>/guru" class="card-link">Kembali</a>
      </div>
    </div>
  </div>
</div>