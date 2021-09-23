const flashData = $('.flash-data').data('flashdata');

    if (flashData) {
        swal({
            title: 'Data',
            text: 'Berhasil ' + flashData,
            icon: 'success'
        });
    }
    const row = $('.flash-delete').data('flashdata');

    if (row) {
        swal({
            title: 'Data',
            text: 'Masih digunakan Sebanyak ' + row + ' Data',
            icon: 'error'
        });
    }

    $('.tombol-hapus').on('click', function(e) {

        e.preventDefault();
        // Mencegah eksekusi hapus
        const href = $(this).attr('href');

        swal({
            title: 'Apakah Anda Yakin?',
            text: "Data Akan Dihapus!",
            icon: 'warning',
            buttons: [true, 'Hapus Data!'],
        }).then((result) => {
            if (result) {
                document.location.href = href;
            }
        })
    });

    $('select#kode1').on('change', function() {
        $('#kode2').val($(this).val() + '.');
    });

    $('#kode2').val($('select#kode1').val() + '.');