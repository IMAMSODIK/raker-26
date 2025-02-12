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

$("#store").click(function (e) {
    $("#tambah-data-modal").modal("hide");
    let formData = new FormData();

    formData.append("nip", $("#nip").val());
    formData.append("nama", $("#nama").val());
    formData.append("jenis_kelamin", $("#jenis_kelamin").val());
    formData.append("no_wa", $("#no_wa").val());
    formData.append("role", $("#role").val());
    formData.append("asal_instansi", $("#asal_instansi").val());
    formData.append("unit_kerja", $("#unit_kerja").val());
    formData.append("jabatan", $("#jabatan").val());
    formData.append("golongan", $("#golongan").val());
    formData.append("bank", $("#bank").val());
    formData.append("no_rek", $("#no_rek").val());
    formData.append("ukuran_baju", $("#ukuran-baju").val());
    formData.append("kamar", $("#kamar").val());
    formData.append("_token", $("meta[name='csrf-token']").attr("content"));

    $.ajax({
        url: "/daftar-peserta/store",
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

$(document).on("click", "#btn-detail", function () {
    let id = $(this).data("id");

    $.ajax({
        url: "/daftar-peserta/detail",
        method: "GET",
        data: {
            id: id,
        },
        success: function (response) {
            if (response.status) {
                // $("#id").val(response.data.id);
                $("#detail-nama").val(response.data.nama);
                $("#detail-nip").val(response.data.nip);
                $("#detail-jenis-kelamin").val(response.data.jenis_kelamin);
                $("#detail-no-wa").val(response.data.no_wa);
                $("#detail-role").val(response.data.role);
                $("#detail-instansi").val(response.data.instansi);
                $("#detail-unit-kerja").val(
                    response.data.unit_kerja
                        ? response.data.unit_kerja.nama
                        : `-`
                );
                $("#detail-jabatan").val(
                    response.data.jabatan ? response.data.jabatan.nama : ""
                );
                $("#detail-golongan").val(response.data.golongan);
                $("#detail-baju").val(response.data.ukuran_baju);
                $("#detail-kamar").val(
                    response.data.kamar ? response.data.kamar.no_kamar : ""
                );
                $("#detail-bank").val(response.data.nama_bank);
                $("#detail-no-rek").val(response.data.no_rek);

                $("#detail-data-modal").modal("show");
            } else {
                Swal.fire({
                    title: "Gagal",
                    text: "Terjadi Kesalahan Saat Mengambil Data",
                    icon: "error",
                });
            }
        },
        error: function (xhr) {
            Swal.fire({
                title: "Gagal",
                text: "data tidak ditemukan",
                icon: "error",
            });
        },
    });
});

$("#btn-close-detail").on("click", function () {
    $("#detail-data-modal").modal("hide");
});

$(document).on("click", ".edit", function () {
    let id = $(this).data("id");

    $.ajax({
        url: "/daftar-peserta/edit",
        method: "GET",
        data: {
            id: id,
        },
        success: function (response) {
            if (response.status) {
                $("#id").val(response.data.id);
                $("#edit-nama").val(response.data.nama);
                $("#edit-nip").val(response.data.nip);
                $("#edit-jenis-kelamin").val(response.data.jenis_kelamin);
                $("#edit-no-wa").val(response.data.no_wa);
                $("#edit-role").val(response.data.role);
                $("#edit-instansi").val(response.data.instansi);
                $("#edit-unit-kerja").val(response.data.unit_kerja_id);
                $("#edit-jabatan").val(response.data.jabatan_id);
                $("#edit-golongan").val(response.data.golongan);
                $("#edit-bank").val(response.data.nama_bank);
                $("#edit-kamar").val(response.data.kamar_id);
                $("#edit-ukuran-baju").val(response.data.ukuran_baju);
                $("#edit-no-rek").val(response.data.no_rek);

                $("#edit-data-modal").modal("show");
            } else {
                Swal.fire({
                    title: "Gagal",
                    text: "Terjadi Kesalahan Saat Mengambil Data",
                    icon: "error",
                });
            }
        },
        error: function (xhr) {
            Swal.fire({
                title: "Gagal",
                text: "data tidak ditemukan",
                icon: "error",
            });
        },
    });
});

$("#update").on("click", function () {
    let formData = {
        _token: $("meta[name='csrf-token']").attr("content"),
        id: $("#id").val(),
        nama: $("#edit-nama").val(),
        nip: $("#edit-nip").val(),
        jenis_kelamin: $("#edit-jenis-kelamin").val(),
        no_wa: $("#edit-no-wa").val(),
        role: $("#edit-role").val(),
        instansi: $("#edit-instansi").val(),
        unit_kerja_id: $("#edit-unit-kerja").val(),
        kamar_id: $("#edit-kamar").val(),
        jabatan_id: $("#edit-jabatan").val(),
        golongan: $("#edit-golongan").val(),
        ukuran_baju: $("#edit-ukuran-baju").val(),
        bank: $("#edit-bank").val(),
        no_rek: $("#edit-no-rek").val(),
    };

    $.ajax({
        url: "/daftar-peserta/update",
        method: "POST",
        data: formData,
        success: function (response) {
            if (response.status) {
                Swal.fire({
                    title: "Berhasil",
                    text: response.message,
                    icon: "success",
                });
                setTimeout(() => {
                    location.reload();
                }, 2000);
            } else {
                Swal.fire({
                    title: "Gagal",
                    text: response.message,
                    icon: "error",
                });
            }
        },
        error: function (xhr) {
            let errors = xhr.responseJSON.errors;
            let errorMessage = "Terjadi kesalahan!";

            if (errors) {
                errorMessage = Object.values(errors)
                    .map((error) => error.join(",\n"))
                    .join(",\n");
            }

            Swal.fire({
                title: "Gagal",
                text: errorMessage,
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
                url: "/daftar-peserta/delete",
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



$(".absensi").on("click", function(){
    let idxAbsensi = $(this).data("absensi")
    let id = $(this).data("id");

    $("#hari-ke").text(idxAbsensi);
    $("#id_absensi").val(id);
    $("#idx_absensi").val(idxAbsensi);

    $("#absensi-modal").modal("show");
})

$("#simpan-absensi").on("click", function(){
    let formData = new FormData();
    let token = $('meta[name="csrf-token"]').attr("content");

    formData.append("_token", token);
    formData.append("id", $("#id_absensi").val());
    formData.append("idx", $("#idx_absensi").val());
    formData.append("date", $("#date").val());
    formData.append("time", $("#time").val());

    $.ajax({
        url: "/data-absensi/store",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response.status) {
                $("#absensi-modal").modal("hide");
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
                    text: response.message,
                    icon: "error",
                });
            }
        },
        error: function(response) {
            Swal.fire({
                title: "Gagal",
                text: "Simpan Data Gagal",
                icon: "error",
            });
        },
    });
})


// $("#pilih_bank").on("click", function(){
//     $("#daftar_bank").modal("show");
//     $("#tambah-data-modal").modal("hide");
// })

// $(".row-data").on("click", function(){
//     $("#bank").val($(this).data('nama'));
//     $("#daftar_bank").modal("hide");
//     $("#tambah-data-modal").modal("show");
// })

// $(".row-jabatan").on("click", function(){
//     $("#jabatan_id").val($(this).data('id'));
//     $("#jabatan").val($(this).data('nama'));
//     $("#daftar_jabatan").modal("hide");
// })

// $(".row-unit_kerja").on("click", function(){
//     $("#unit_kerja_id").val($(this).data('id'));
//     $("#unit_kerja").val($(this).data('nama'));
//     $("#daftar_unit_kerja").modal("hide");
// })

// document.getElementById("no_wa").addEventListener("input", function (e) {
//     this.value = this.value.replace(/[^0-9]/g, "").slice(0, 15);
// });

// document.getElementById("no_rek").addEventListener("input", function (e) {
//     this.value = this.value.replace(/[^0-9]/g, "").slice(0, 50);
// });

// document.getElementById("nip").addEventListener("input", function (e) {
//     this.value = this.value.replace(/[^0-9]/g, "").slice(0, 50);
// });

// fungsi untuk tanda tangan
document.addEventListener("DOMContentLoaded", function() {
    var canvas = document.getElementById("signature-pad");
    var context = canvas.getContext("2d");

    var drawing = false;
    var lastPos = null;

    context.lineWidth = 5;  // Ubah angka ini untuk menyesuaikan ketebalan
    context.lineCap = "round"; // Membuat ujung garis lebih halus
    context.strokeStyle = "#000";

    function getMousePos(canvas, evt) {
        var rect = canvas.getBoundingClientRect();
        return {
            x: evt.clientX - rect.left,
            y: evt.clientY - rect.top,
        };
    }

    function drawLine(context, x1, y1, x2, y2) {
        context.beginPath();
        context.moveTo(x1, y1);
        context.lineTo(x2, y2);
        context.stroke();
    }

    function mouseDownHandler(e) {
        drawing = true;
        lastPos = getMousePos(canvas, e);
    }

    function mouseMoveHandler(e) {
        if (drawing) {
            var mousePos = getMousePos(canvas, e);
            drawLine(context, lastPos.x, lastPos.y, mousePos.x, mousePos.y);
            lastPos = mousePos;
        }
    }

    function endDrawing() {
        drawing = false;
    }

    canvas.addEventListener("mousedown", mouseDownHandler);
    canvas.addEventListener("mousemove", mouseMoveHandler);
    canvas.addEventListener("mouseup", endDrawing);
    canvas.addEventListener("mouseleave", endDrawing);

    canvas.addEventListener(
        "touchstart",
        function(e) {
            mouseDownHandler(e.touches[0]);
        },
        false
    );

    canvas.addEventListener(
        "touchmove",
        function(e) {
            mouseMoveHandler(e.touches[0]);
            e.preventDefault();
        },
        false
    );

    canvas.addEventListener("touchend", endDrawing, false);

    document
        .getElementById("reset-canvas")
        .addEventListener("click", function() {
            context.clearRect(0, 0, canvas.width, canvas.height);
        });
});

// fungsi untuk mendapatkan tanda tangan
function getSignatureData() {
    var canvas = document.getElementById("signature-pad");
    return canvas.toDataURL("image/png");
}

$(document).on("click", ".registrasi", function(){
    let id = $(this).data('id');
    $("#id_ttd").val(id);

    $("#ttd").modal('show');
})

$("#simpan-dokumen").on("click", function(){
    var signatureData = getSignatureData();

    let formData = new FormData();
    let token = $('meta[name="csrf-token"]').attr("content");

    formData.append("_token", token);
    formData.append("signature", signatureData);
    formData.append("id", $("#id_ttd").val());
    formData.append("foto", $("#foto")[0].files[0]);
    formData.append("date", $("#date").val());
    formData.append("time", $("#time").val());

    $.ajax({
        url: "/data-registrasi/store",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
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
        error: function(response) {
            Swal.fire({
                title: "Gagal",
                text: "Simpan Data Gagal",
                icon: "error",
            });
        },
    });
})