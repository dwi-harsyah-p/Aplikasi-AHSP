const flashData = $('.flash-data').data('flashdata');
    if (flashData) {
        swal({
            title: 'Data',
            text: 'Berhasil ' + flashData,
            icon: 'success'
        });
    }

const flashpass = $('.flash-pass').data('flashdata');
    if (flashpass) {
        swal({
            title: 'Change Password',
            text: 'Berhasil ' + flashpass,
            icon: 'success'
        });
    }

const flashpasspesan = $('.flash-passpesan').data('flashdata');
    if (flashpasspesan) {
        swal({
            title: 'Change Password',
            text: flashpasspesan,
            icon: 'error'
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

const msg = $('.flash-pesan').data('flashdata');
    if (msg) {
        swal({
            title: 'Data',
            text: msg,
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
    
$(document).ready(function(){
    // Set auto Kode Ahsp2
    if ($(location).attr('href') == 'http://localhost/Project/pu/ahsp2/tambah') { 
        $('#kode2').val($('select#kode1').val() + '.');             
        $('select#kode1').on('change', function() {
            $('#kode2').val($(this).val() + '.');
        }); 
    // Set auto Kode Ahsp3   
    }else if ($(location).attr('href') == 'http://localhost/Project/pu/ahsp3/tambah') {         
        $('#kode3').val($('select#kode2').val() + '.'); 
        $('select#kode2').on('change', function() {
            $('#kode3').val($(this).val() + '.');
        });
    // Set auto Kode Ahsp4
    }else if ($(location).attr('href') == 'http://localhost/Project/pu/ahsp4/tambah') {         
        $('#kode4').val($('select#kode3').val() + '.'); 
        $('select#kode3').on('change', function() {
            $('#kode4').val($(this).val() + '.');
        });    
    }

    // Kategori Uraian di Controller Harga
    $('#kategori').change(function () {
       var id = $(this).val();
       $.ajax({
            url : "http://localhost/Project/pu/harga/getUraian",
            method : "POST",
            data : {id: id},
            async : false,
            dataType : 'json',
            success : function(data) {
                var html = '';
                var i;
                for (i = 0; i < data.length; i++) {                    
                    html += "<option value='"+ data[i].id +"'>" + data[i].uraian + "</option>";
                }
                $('#uraian').html(html);
            }
       });
   });
   
});
