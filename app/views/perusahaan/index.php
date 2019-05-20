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
      <button type="button" class="btn btn-primary mt-2 tombol-tambah-data-perusahaan" data-toggle="modal"
        data-target="#contohModal">
        Tambah Data Perusahaan
      </button>
    </div>
  </div>

  <div class="row">
    <div class="col-6">
      <form action="<?=BASEURL;?>/perusahaan/cari" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Cari Perusahaan" name="keyword" id="keyword"
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

      <h3 class="">Daftar Perusahaan</h3>
      <table class="table table-hover shadow">
        <thead class="thead-dark">
          <tr>
            <th scope="col">NIP</th>
            <th scope="col">Nama</th>
            <th scope="col">Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data['perusahaan'] as $perusahaan): ?>
          <tr>
            <td><?=$perusahaan['kode_perusahaan']; ?></td>
            <td><?=$perusahaan['nama_perusahaan']; ?></td>
            <td>
              <div class="btn-group" role="group" aria-label="Basic example">
                <a href="#" type="button" class="btn btn-info">Detail</a>
                <a href=" <?=BASEURL; ?>/perusahaan/ubah/<?=$perusahaan['kode_perusahaan']; ?>" type="button"
                  class="btn btn-success tampil-ubah-data-perusahaan" data-toggle="modal" data-target="#contohModal"
                  data-nis="<?=$perusahaan['kode_perusahaan']; ?>">Edit</a>
                <a href="<?=BASEURL; ?>/perusahaan/hapus/<?=$perusahaan['kode_perusahaan']; ?>" type="button"
                  class="btn btn-danger" onclick="return confirm('Ingin menghapus?');">Hapus</a>
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
        <h5 class="modal-title" id="judulModal">Tambah Data Perusahaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?=BASEURL;?>/perusahaan/tambah" method="post">
          <div class="form-group">
            <label for="kd_perusahaan"></label>
            <input type="number" class="form-control" id="kd_perusahaan" name="kd_perusahaan"
              placeholder="Isi kode perusahaan...">
          </div>
          <div class="form-group">
            <label for="nama_perusahaan">Nama</label>
            <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan"
              placeholder="Isi Nama...">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>