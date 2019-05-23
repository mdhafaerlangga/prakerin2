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
      <button type="button" class="btn btn-primary mt-2 tombol-tambah-data-prakerin" data-toggle="modal"
        data-target="#contohModal">
        Tambah Data Prakerin
      </button>
    </div>
  </div>

  <div class="row">
    <div class="col-6">
      <form action="<?=BASEURL;?>/prakerin/cari" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Cari Prakerin" name="keyword" id="keyword"
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

      <h3 class="">Daftar Prakerin</h3>
      <table class="table table-hover shadow">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">NIS</th>
            <th scope="col">NIP</th>
            <th scope="col">Kode PT.</th>
            <th scope="col">Periode</th>
            <th scope="col">Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data['prakerin'] as $prakerin): ?>
          <tr>

            <td><?=$prakerin['id_prakerin']; ?></td>
            <td><?=$prakerin['nis']; ?></td>
            <td><?=$prakerin['nip']; ?></td>
            <td><?=$prakerin['kode_perusahaan']; ?></td>
            <td><?=$prakerin['periode_prakerin']; ?></td>
            <td>
              <div class="btn-group" role="group" aria-label="Basic example">
                <a href="#" type="button" class="btn btn-info">Detail</a>
                <a href=" <?=BASEURL; ?>/prakerin/ubah/<?=$prakerin['id_prakerin']; ?>" type="button"
                  class="btn btn-success tampil-ubah-data-prakerin" data-toggle="modal" data-target="#contohModal"
                  data-id="<?=$prakerin['id_prakerin']; ?>">Edit</a>
                <a href="<?=BASEURL; ?>/prakerin/hapus/<?=$prakerin['id_prakerin']; ?>" type="button"
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
        <h5 class="modal-title" id="judulModal">Tambah Data Prakerin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?=BASEURL;?>/prakerin/tambah" method="post">
          <div class="form-group">
            <label for="nis">NIS</label>
            <select name="nis" id="nis" class="form-control">
              <?php foreach ($data['siswa'] as $siswa ): ?>
              <option value="<?=$siswa['nis'] ?>"><?=$siswa['nis'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="nip">NIP</label>
            <select name="nip" id="nip" class="form-control">
              <?php foreach ($data['guru'] as $guru ): ?>
              <option value="<?=$guru['nip'] ?>"><?=$guru['nip'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="kode_perusahaan">Kode Perusahaan</label>
            <select name="kode_perusahaan" id="kode_perusahaan" class="form-control">
              <?php foreach ($data['perusahaan'] as $perusahaan ): ?>
              <option value="<?=$perusahaan['kode_perusahaan'] ?>"><?=$perusahaan['kode_perusahaan'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="periode_prakerin">Periode Prakerin</label>
            <select class="form-control" name="periode_prakerin" id="periode_prakerin">
              <option value="Jan - Mar">Januari - Maret</option>
              <option value="Apr - Jun">April - Juni</option>
              <option value="Jul - Sep">Juli - September</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>