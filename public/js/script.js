$(function(){
    $('.tambahData').on('click', function(){
        $('#judulModalLabel').html("Tambah Data Mahasiswa");
        $('.modal-footer button[type=submit]').html("Submit");
    })
    $('.tampilModalUbah').on('click', function(){
        $('#judulModalLabel').html("Ubah Data Mahasiswa");
        $('.modal-footer button[type=submit]').html("Ubah");
        $(".modal-content form").attr("action", "http://localhost/mvc/public/mahasiswa/ubah");

        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost/mvc/public/mahasiswa/getubah',
            data: {id: id},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#id').val(data.id);
                $('#nama').val(data.nama);
                $('#nim').val(data.nim);
                $('#prodi').val(data.prodi);
                $('#fakultas').val(data.fakultas);
            }
        })
    })
})
