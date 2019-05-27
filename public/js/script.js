$(function () {

  // Siswa

  $('.tombol-tambah-data-siswa').on('click', function () {
    $('#judulModal').html('Tambah Data Siswa');
    $('.modal-footer button[type=submit]').html('Tambah Data');
    $('.modal-body form').attr('action', 'http://localhost/sekolah/tugas/prakerin2/public/siswa/tambah');
    $('#nis').val('');
    $('#nama_siswa').val('');
  })

  $('.tampil-ubah-data-siswa').on('click', function () {
    $('#judulModal').html('Ubah Data Siswa');
    $('.modal-footer button[type=submit]').html('Ubah Data');
    $('.modal-body form').attr('action', 'http://localhost/sekolah/tugas/prakerin2/public/siswa/ubah');

    const nis = $(this).data('nis');

    $.ajax({
      url: 'http://localhost/sekolah/tugas/prakerin2/public/siswa/getubah',
      data: {
        nis: nis
      },
      method: 'post',
      dataType: 'json',
      success: function (data) {
        $('#nis').val(data.nis);
        $('#nama_siswa').val(data.nama_siswa);
      }
    });
  })



  // Guru

  $('.tombol-tambah-data-guru').on('click', function () {
    $('#judulModal').html('Tambah Data Guru');
    $('.modal-footer button[type=submit]').html('Tambah Data');
    $('.modal-body form').attr('action', 'http://localhost/sekolah/tugas/prakerin2/public/guru/tambah');
    $('#nis').val('');
    $('#nama_guru').val('');
  })

  $('.tampil-ubah-data-guru').on('click', function () {
    $('#judulModal').html('Ubah Data Guru');
    $('.modal-footer button[type=submit]').html('Ubah Data');
    $('.modal-body form').attr('action', 'http://localhost/sekolah/tugas/prakerin2/public/guru/ubah');

    const nip = $(this).data('nip');

    $.ajax({
      url: 'http://localhost/sekolah/tugas/prakerin2/public/guru/getubah',
      data: {
        nip: nip
      },
      method: 'post',
      dataType: 'json',
      success: function (data) {
        console.log("OK");
        $('#nip').val(data.nip);
        $('#nama_guru').val(data.nama_guru);
      }
    });
  })



  // Perusahaan

  $('.tombol-tambah-data-perusahaan').on('click', function () {
    $('#judulModal').html('Tambah Data Perusahaan');
    $('.modal-footer button[type=submit]').html('Tambah Data');
    $('.modal-body form').attr('action', 'http://localhost/sekolah/tugas/prakerin2/public/perusahaan/tambah');
    $('#kode_perusahaan').val('');
    $('#nama_perusahaan').val('');
  })

  $('.tampil-ubah-data-perusahaan').on('click', function () {
    $('#judulModal').html('Ubah Data Perusahaan');
    $('.modal-footer button[type=submit]').html('Ubah Data');
    $('.modal-body form').attr('action', 'http://localhost/sekolah/tugas/prakerin2/public/perusahaan/ubah');

    const kode_perusahaan = $(this).data('kode_perusahaan');

    $.ajax({
      url: 'http://localhost/sekolah/tugas/prakerin2/public/perusahaan/getubah',
      data: {
        kode_perusahaan: kode_perusahaan
      },
      method: 'post',
      dataType: 'json',
      success: function (data) {
        $('#kode_perusahaan').val(data.kode_perusahaan);
        $('#nama_perusahaan').val(data.nama_perusahaan);
      }
    });
  })



  // Prakerin

  $('.tombol-tambah-data-prakerin').on('click', function () {
    $('#judulModal').html('Tambah Data Prakerin');
    $('.modal-footer button[type=submit]').html('Tambah Data');
    $('.modal-body form').attr('action', 'http://localhost/sekolah/tugas/prakerin2/public/prakerin/tambah');
  })

  $('.tampil-ubah-data-prakerin').on('click', function () {
    $('#judulModal').html('Ubah Data Prakerin');
    $('.modal-footer button[type=submit]').html('Ubah Data');
    $('.modal-body form').attr('action', 'http://localhost/sekolah/tugas/prakerin2/public/prakerin/ubah');

    const nis = $(this).data('nis');

    $.ajax({
      url: 'http://localhost/sekolah/tugas/prakerin2/public/prakerin/getubah',
      data: {
        nis: nis
      },
      method: 'post',
      dataType: 'json',
      success: function (data) {
        $('#nis').val(data.nis);
        $('#nip').val(data.nip);
        $('#kode_perusahaan').val(data.kode_perusahaan);
        $('#periode_prakerin').val(data.periode_prakerin);
      }
    });
  })
})