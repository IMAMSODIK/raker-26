let table = $("#basic-1").DataTable();

$("#cancel-edit").on("click", function () {
    $("#edit-data-modal").modal("hide");
});

$("#cancel-add").on("click", function () {
    $("#tambah-data-modal").modal("hide");
});

$("#btn-tambah-kamar").on("click", function () {
    $("#tambah-data-modal").modal("show");
});

$("#btn-store").click(function (e) {
    $("#tambah-data-modal").modal("hide");
    let formData = new FormData();

    formData.append("no_kamar", $("#no-kamar").val());
    formData.append("_token", $("meta[name='csrf-token']").attr("content"));

    $.ajax({
        url: "/kamar/store",
        method: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            if (response.status) {
                Swal.fire({
                    title: "Berhasil",
                    text: "Simpan Data Berhasil",
                    icon: "success",
                });

                setTimeout(() => {
                    location.reload();
                }, 2000);
            } else {
                Swal.fire({
                    title: "Gagal",
                    text: "Simpan Data Gagal",
                    icon: "error",
                });
            }
        },
        error: function (xhr) {
            Swal.fire({
                title: "Gagal",
                text: "Simpan Data Gagal",
                icon: "error",
            });
        },
    });
});

$(document).on("click", ".edit", function () {
    let id = $(this).data("id");

    $.ajax({
        url: "/kamar/edit",
        method: "GET",
        data: {
            id: id,
        },
        success: function (response) {
            if (response.status) {
                $("#id").val(response.data.id);
                $("#edit-no-kamar").val(response.data.no_kamar);

                $("#edit-data-modal").modal("show");
            } else {
                Swal.fire({
                    title: "Gagal",
                    text: "Terjadi Kesalah Saat Mengambil Data",
                    icon: "error",
                });
            }
        },
        error: function (xhr) {
            Swal.fire({
                title: "Gagal",
                text: "Terjadi Kesalah Saat Mengambil Data: " + xhr,
                icon: "error",
            });
        },
    });
});

$("#update").on("click", function () {
    $("#edit-data-modal").modal("hide");
    let formData = new FormData();

    formData.append("_token", $("meta[name='csrf-token']").attr("content"));
    formData.append("id", $("#id").val());
    formData.append("no_kamar", $("#edit-no-kamar").val());

    $.ajax({
        url: "/kamar/update",
        method: "POST",
        processData: false,
        contentType: false,
        data: formData,
        success: function (response) {
            if (response.status) {
                Swal.fire({
                    title: "Berhasil",
                    text: "Ubah Data Berhasil",
                    icon: "success",
                });
                setTimeout(() => {
                    location.reload();
                }, 2000);
            } else {
                Swal.fire({
                    title: "Gagal",
                    text: "Ubah Data Gagal",
                    icon: "error",
                });
            }
        },
        error: function (xhr) {
            Swal.fire({
                title: "Gagal",
                text: "Ubah Data Gagal",
                icon: "error",
            });
        },
    });
});

$(document).on("click", ".delete", function () {
    let id = $(this).data("id");

    Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Data ini akan dihapus secara permanen!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Ya, Hapus!",
        cancelButtonText: "Batal",
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/kamar/delete",
                method: "POST",
                data: {
                    _token: $("meta[name='csrf-token']").attr("content"),
                    id: id,
                },
                success: function (response) {
                    if (response.status) {
                        Swal.fire({
                            title: "Berhasil",
                            text: "Hapus Data Berhasil",
                            icon: "success",
                        });
                        setTimeout(() => {
                            location.reload();
                        }, 2000);
                    } else {
                        Swal.fire({
                            title: "Gagal",
                            text: "Hapus Data Gagal",
                            icon: "error",
                        });
                    }
                },
                error: function (xhr) {
                    Swal.fire({
                        title: "Gagal",
                        text: "Hapus Data Gagal: " + xhr.statusText,
                        icon: "error",
                    });
                },
            });
        }
    });
});
