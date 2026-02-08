let table = $("#basic-1").DataTable();

$("#cancel-edit").on("click", function () {
    $("#edit-data-modal").modal("hide");
});

$("#cancel-add").on("click", function () {
    $("#tambah-data-modal").modal("hide");
});

$("#tambah-data").on("click", function () {
    $("#tambah-data-modal").modal("show");
});

$('.edit').on('click', function () {

    let id = $(this).data('id');

    $.ajax({
        url: '/kit-peserta/edit/',
        data: {
            id: id,
        },
        type: 'GET',
        dataType: 'json',
        success: function (res) {

            let p = res.peserta;
            let kit = res.kit;

            $('#peserta_id').val(p.id);
            $('#peserta_nama').val(p.nama);
            $('#peserta_nip').val(p.nip);

            // reset checkbox
            $('.kit-check').prop('checked', false);

            if (kit) {
                $('#tumbler').prop('checked', kit.tumbler == 1);
                $('#buku_panduan').prop('checked', kit.buku_panduan == 1);
                $('#lanyard').prop('checked', kit.lanyard == 1);
                $('#topi').prop('checked', kit.topi == 1);
                $('#baju').prop('checked', kit.baju == 1);
            }

            $('#edit-data-modal').modal("show");
        },
        error: function () {
            alert('Gagal load peserta');
        }
    });

});


$('#update').on('click', function () {

    let data = {
        peserta_id: $('#peserta_id').val(),
        tumbler: $('#tumbler').is(':checked') ? 1 : 0,
        buku_panduan: $('#buku_panduan').is(':checked') ? 1 : 0,
        lanyard: $('#lanyard').is(':checked') ? 1 : 0,
        topi: $('#topi').is(':checked') ? 1 : 0,
        baju: $('#baju').is(':checked') ? 1 : 0,
        _token: $('meta[name="csrf-token"]').attr('content')
    };

    $.ajax({
        url: '/kit-peserta/update',
        type: 'POST',
        data: data,
        dataType: 'json',

        success: function (res) {

            if (res.success) {
                alert(res.message);

                setTimeout(function(){
                    location.reload();
                }, 1000)

                const modal = bootstrap.Modal.getInstance(
                    document.getElementById('edit-data-modal')
                );
                modal.hide();

                location.reload();
            } else {
                alert(res.message);
            }
        },

        error: function (xhr) {

            let msg = 'Gagal update data';

            if (xhr.responseJSON && xhr.responseJSON.message) {
                msg = xhr.responseJSON.message;
            }

            alert(msg);
        }
    });

});

function updateKitUI() {

    let total = $('.kit-check').length;
    let checked = $('.kit-check:checked').length;

    $('.kit-check').each(function () {
        let card = $(this).closest('.kit-card');

        if ($(this).is(':checked')) {
            card.addClass('active');
        } else {
            card.removeClass('active');
        }
    });

    let percent = (checked / total) * 100;

    $('#kit-progress-bar').css('width', percent + '%');
    $('#kit-progress-text').text(checked + ' / ' + total);
}

// trigger saat klik checkbox
$('.kit-check').on('change', updateKitUI);

// jalankan saat modal dibuka
updateKitUI();
