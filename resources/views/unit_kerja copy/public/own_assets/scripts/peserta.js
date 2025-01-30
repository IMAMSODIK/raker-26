let table = $("#basic-1").DataTable();

$("#cancel-edit").on("click", function () {
    $("#edit-data-modal").modal("hide")
})

$("#cancel-add").on("click", function () {
    $("#tambah-data-modal").modal("hide")
})

$("#tambah-data").on("click", function () {
    $("#tambah-data-modal").modal("show");
});

$('#store').click(function (e) {
    $("#tambah-data-modal").modal("hide");
    let formData = new FormData();

    formData.append('kode', $("#kode").val());
    formData.append('nama', $("#nama").val());
    formData.append('_token', $("meta[name='csrf-token']").attr('content'));

    $.ajax({
        url: '/jabatan/store',
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            if (response.status) {

                Swal.fire({
                    title: "Berhasil",
                    text: "Simpan Data Berhasil",
                    icon: "success"
                  });

                setTimeout(() => {
                    location.reload();
                }, 2000);
            } else {
                Swal.fire({
                    title: "Gagal",
                    text: "Simpan Data Gagal",
                    icon: "error"
                  });
            }
        },
        error: function (xhr) {
            Swal.fire({
                title: "Gagal",
                text: "Simpan Data Gagal",
                icon: "error"
            });
        }
    })    
});

$(document).on("click", ".edit", function () {
    let id = $(this).data('id');

    $.ajax({
        url: '/jabatan/edit',
        method: 'GET',
        data: {
            'id': id
        },
        success: function (response) {
            if (response.status) {
                $("#id").val(response.data.id);
                $("#edit_kode").val(response.data.kode);
                $("#edit_nama").val(response.data.nama);

                $("#edit-data-modal").modal("show");
            } else {
                Swal.fire({
                    title: "Gagal",
                    text: "Terjadi Kesalah Saat Mengambil Data",
                    icon: "error"
                  });
            }
        },
        error: function (xhr) {
            Swal.fire({
                title: "Gagal",
                text: "Terjadi Kesalah Saat Mengambil Data",
                icon: "error"
              });
        }
    })
})

$("#update").on("click", function () {
    $("#edit-data-modal").modal("hide");
    let formData = new FormData();

    formData.append("_token", $("meta[name='csrf-token']").attr('content'));
    formData.append("id", $("#id").val());
    formData.append("kode", $("#edit_kode").val());
    formData.append("nama", $("#edit_nama").val());

    $.ajax({
        url: '/jabatan/update',
        method: 'POST',
        processData: false,
        contentType: false,
        data: formData,
        success: function (response) {
            if (response.status) {
                Swal.fire({
                    title: "Berhasil",
                    text: "Simpan Data Berhasil",
                    icon: "success"
                  });
                setTimeout(() => {
                    location.reload();
                }, 2000);
            } else {
                Swal.fire({
                    title: "Gagal",
                    text: "Simpan Data Gagal",
                    icon: "error"
                });
            }
        },
        error: function (xhr) {
            Swal.fire({
                title: "Gagal",
                text: "Simpan Data Gagal",
                icon: "error"
            });
        }
    })
})


$(document).on("click", ".delete", function () {
    $.ajax({
        url: '/jabatan/delete',
        method: 'POST',
        data: {
            '_token': $("meta[name='csrf-token']").attr("content"),
            'id': $(this).data('id'),
        },
        success: function (response) {
            if (response.status) {
                Swal.fire({
                    title: "Berhasil",
                    text: "Simpan Data Berhasil",
                    icon: "success"
                  });
                setTimeout(() => {
                    location.reload();
                }, 2000);
            } else {
                Swal.fire({
                    title: "Gagal",
                    text: "Simpan Data Gagal",
                    icon: "error"
                });
            }
        },
        error: function (xhr) {
            Swal.fire({
                title: "Gagal",
                text: "Simpan Data Gagal",
                icon: "error"
            });
        }
    })
})

$("#pilih_bank").on("click", function(){
    $("#daftar_bank").modal("show");
})

$(".row-data").on("click", function(){
    $("#bank").val($(this).data('nama'));
    $("#daftar_bank").modal("hide");
})

$(".row-jabatan").on("click", function(){
    $("#jabatan_id").val($(this).data('id'));
    $("#jabatan").val($(this).data('nama'));
    $("#daftar_jabatan").modal("hide");
})

$(".row-unit_kerja").on("click", function(){
    $("#unit_kerja_id").val($(this).data('id'));
    $("#unit_kerja").val($(this).data('nama'));
    $("#daftar_unit_kerja").modal("hide");
})

document.getElementById('no_wa').addEventListener('input', function (e) {
    this.value = this.value.replace(/[^0-9]/g, '').slice(0, 15);
});

document.getElementById('no_rek').addEventListener('input', function (e) {
    this.value = this.value.replace(/[^0-9]/g, '').slice(0, 50);
});

document.getElementById('nip').addEventListener('input', function (e) {
    this.value = this.value.replace(/[^0-9]/g, '').slice(0, 50);
});