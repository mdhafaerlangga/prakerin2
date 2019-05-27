<div class="container">
  <div class="row">
    <div class="col-6">
      <?php
      Flasher::flash();
      ?>
    </div>
  </div>

  <div class="row">
    <div class="col-6">
      <button type="button" class="btn btn-primary mt-2 tombol-tambah-data-siswa" data-toggle="modal"
        data-target="#contohModal">
        Tambah Data Siswa
      </button>
    </div>
  </div>

  <div class="row">
    <div class="col-6">
      <form action="<?=BASEURL;?>/siswa/cari" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Cari Siswa" name="keyword" id="keyword"
            autocomplete="off">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit" id="tombol-cari">Cari</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="row">
    <div class="col-12">

      <h3 class="">Daftar Siswa</h3>
      <table class="table table-hover shadow">
        <thead class="thead-dark">
          <tr>
            <th scope="col">NIS</th>
            <th scope="col">Nama</th>
            <th scope="col">Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data['siswa'] as $siswa): ?>
          <tr>
            <td><?=$siswa['nis']; ?></td>
            <td><?=$siswa['nama_siswa']; ?></td>
            <td>
              <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                <a href="<?=BASEURL; ?>/siswa/detail/<?=$siswa['nis']; ?>" type="button" class="btn btn-info">Detail</a>
                <a href=" <?=BASEURL; ?>/siswa/ubah/<?=$siswa['nis']; ?>" type="button"
                  class="btn btn-success tampil-ubah-data-siswa" data-toggle="modal" data-target="#contohModal"
                  data-nis="<?=$siswa['nis']; ?>">Edit</a>
                <a href="<?=BASEURL; ?>/siswa/hapus/<?=$siswa['nis']; ?>" type="button" class="btn btn-danger"
                  onclick="return confirm('Ingin menghapus?');">Hapus</a>
              </div>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!--Modal Tambah Data-->
<div class="modal fade" id="contohModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModal">Tambah Data Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?=BASEURL;?>/siswa/tambah" method="post">
          <div class="form-group">
            <label for="nis">NIS</label>
            <input type="number" class="form-control" id="nis" name="nis" placeholder="Isi nis...">
          </div>
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" placeholder="Isi Nama...">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>