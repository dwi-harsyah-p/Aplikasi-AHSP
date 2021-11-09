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

    var j=1;                             
    $('#addalat').click(function(){           
        j++;                
        $('#dynamic_fieldalat').append('<div id="rowalat'+j+'"><select name="id_alat[]" class="" id="alat'+j+'"></select><input type="text" class="" id="koe_alat'+j+'" name="koe_alat[]" placeholder="Koefesien" autocomplete="off" required><button type="button" name="remove" id="'+j+'" class="btn btn-danger btn_removealat">X</button></div>');  

        var id = 'Alat';
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
                    $('#alat'+j).html(html);
                }
        });
    });
    
    $(document).on('click', '.btn_removealat', function(){           
        var button_id = $(this).attr("id");            
        $('#rowalat'+button_id+'').remove();           
    });
   
    var k=1;                             
    $('#addbahan').click(function(){           
        k++;                
        $('#dynamic_fieldbahan').append('<div id="rowbahan'+k+'"><select name="id_bahan[]" class="" id="bahan'+k+'"></select><input type="text" class="" id="koe_bahan'+k+'" name="koe_bahan[]" placeholder="Koefesien" autocomplete="off" required><button type="button" name="remove" id="'+k+'" class="btn btn-danger btn_removebahan">X</button></div>');  

        var id = 'Bahan';
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
                    $('#bahan'+k).html(html);
                }
        });
    });
    
    $(document).on('click', '.btn_removebahan', function(){           
        var button_id = $(this).attr("id");            
        $('#rowbahan'+button_id+'').remove();           
    });

    var l=1;                             
    $('#addupah').click(function(){           
        l++;                
        $('#dynamic_fieldupah').append('<div id="rowupah'+l+'"><select name="id_upah[]" class="" id="upah'+l+'"></select><input type="text" class="" id="koe_upah'+l+'" name="koe_upah[]" placeholder="Koefesien" autocomplete="off" required><button type="button" name="remove" id="'+l+'" class="btn btn-danger btn_removeupah">X</button></div>');  

        var id = 'Upah';
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
                    $('#upah'+l).html(html);
                }
        });
    });
    
    $(document).on('click', '.btn_removeupah', function(){           
        var button_id = $(this).attr("id");            
        $('#rowupah'+button_id+'').remove();           
    });
});