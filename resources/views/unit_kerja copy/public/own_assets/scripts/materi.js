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

    let file = $('#file')[0].files[0];
    formData.append('deskripsi', $("#deskripsi").val());
    formData.append('file', file);
    formData.append('_token', $("meta[name='csrf-token']").attr('content'));

    $.ajax({
        url: '/materi-raker/store',
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
                    text: response.message,
                    icon: "error"
                  });
            }
        },
        error: function (xhr) {
            Swal.fire({
                title: "Gagal",
                text: "Pastikan format dokumen telah sesuai",
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