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
        $('#nip').val(data.nip);
        $('#nama_guru').val(data.nama_guru);
      }
    });
  })
})