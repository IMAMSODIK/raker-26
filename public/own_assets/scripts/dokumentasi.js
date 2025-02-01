let table = $("#basic-1").DataTable();

$("#cancel-edit").on("click", function () {
    $("#edit-data-modal").modal("hide");
});
$("#cancel-add").on("click", function () {
    $("#tambah-data-modal").modal("hide");
});

$("#btn-tambah-dokumentasi").on("click", function () {
    $("#tambah-data-modal").modal("show");
});

$(document).ready(function () {
    $("#foto").on("change", function (event) {
        let previewContainer = $("#preview-container");
        previewContainer.empty();

        Array.from(event.target.files).forEach((file) => {
            if (file.type.startsWith("image/")) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    let imgElement = $("<img>")
                        .attr("src", e.target.result)
                        .addClass("m-2 border rounded")
                        .css({ width: "300px", height: "300px" })
                        .on("click", function () {
                            showLargeImage(e.target.result);
                        });

                    previewContainer.append(imgElement);
                };
                reader.readAsDataURL(file);
            }
        });
    });

    function showLargeImage(src) {
        let modal = $("<div>")
            .addClass("modal")
            .css({
                position: "fixed",
                top: "0",
                left: "0",
                width: "100%",
                height: "100%",
                background: "rgba(0, 0, 0, 0.8)",
                display: "flex",
                "justify-content": "center",
                "align-items": "center",
                "z-index": "9999",
            })
            .on("click", function () {
                $(this).remove();
            });

        let img = $("<img>").attr("src", src).css({
            width: "350px",
            height: "350px",
            "object-fit": "cover",
            "border-radius": "10px",
            "box-shadow": "0 4px 10px rgba(0, 0, 0, 0.5)",
        });

        modal.append(img);
        $("body").append(modal);
    }

    $(document).on("click", ".thumb", function () {
        let images = JSON.parse($(this).attr("data-images"));
        let modalContent = $("#modalContent");
        modalContent.html("");

        let rowDiv = $("<div>").addClass(
            "d-flex flex-wrap justify-content-start gap-3"
        );
        $.each(images, function (index, filename) {
            let fullPath = "storage/dokumentasi/" + filename;
            rowDiv.append(`<img src="${fullPath}" class="modal-img">`);
        });
        modalContent.append(rowDiv);
        $("#imageModal").modal("show");
    });
});

$("#btn-close-preview").on("click", function () {
    $("#imageModal").modal("hide");
});

$("#btn-store").on("click", function () {
    let formData = new FormData();
    formData.append("_token", $("meta[name='csrf-token']").attr("content"));
    formData.append("judul", $("#judul-foto").val());
    formData.append("hari", $("#hari").val());

    let files = $("#foto")[0].files;
    for (let i = 0; i < files.length; i++) {
        formData.append("foto[]", files[i]);
    }

    $.ajax({
        url: "/dokumentasi/store",
        method: "POST",
        processData: false,
        contentType: false,
        data: formData,
        success: function (response) {
            if (response.status) {
                Swal.fire({
                    title: "Berhasil",
                    text: "Data berhasil disimpan!",
                    icon: "success",
                });
                setTimeout(() => {
                    location.reload();
                }, 2000);
            } else {
                Swal.fire({
                    title: "Gagal",
                    text: "Data gagal disimpan!",
                    icon: "error",
                });
            }
        },
        error: function (xhr) {
            if (xhr.status === 422) {
                let errors = xhr.responseJSON.errors;
                let errorMessage = "";
                $.each(errors, function (key, value) {
                    errorMessage += value[0] + "<br>";
                });
                Swal.fire({
                    title: "Validasi Gagal!",
                    html: errorMessage,
                    icon: "warning",
                });
            } else {
                Swal.fire({
                    title: "Gagal!",
                    text: "Terjadi kesalahan pada server.",
                    icon: "error",
                });
            }
        },
    });
});

$(document).on("click", ".edit", function () {
    let id = $(this).data("id");

    $.ajax({
        url: "/dokumentasi/edit",
        method: "GET",
        data: { id: id },
        success: function (response) {
            if (response.status) {
                $("#edit-id").val(response.data.id);
                $("#edit-judul").val(response.data.judul);
                $("#edit-hari").val(response.data.hari);

                let imageContainer = $("#edit-preview-images");
                imageContainer.html("");

                response.data.foto.forEach(function (filename, index) {
                    let fullPath = "storage/dokumentasi/" + filename;
                    let imgElement = `
                        <div class="m-2 position-relative">
                            <img src="${fullPath}" class="border rounded edit-thumb"
                                style="width: 150px; height: 150px; cursor: pointer;"
                                data-full="${fullPath}">
                            <button class="btn btn-danger btn-sm remove-image"
                                    data-index="${index}" data-img="${filename}"
                                    style="position: absolute; top: 5px; right: 5px;">X</button>
                        </div>`;
                    imageContainer.append(imgElement);
                });

                $("#edit-data-modal").modal("show");
            } else {
                Swal.fire({
                    title: "Gagal",
                    text: "Terjadi kesalahan saat mengambil data",
                    icon: "error",
                });
            }
        },
        error: function (xhr) {
            Swal.fire({
                title: "Gagal",
                text: "Terjadi kesalahan saat mengambil data",
                icon: "error",
            });
        },
    });
});

$("#edit-foto-baru").on("change", function (event) {
    let previewContainer = $("#preview-container-edit");
    previewContainer.empty();

    Array.from(event.target.files).forEach((file) => {
        if (file.type.startsWith("image/")) {
            let reader = new FileReader();
            reader.onload = function (e) {
                let imgElement = $("<img>")
                    .attr("src", e.target.result)
                    .addClass("m-2 border rounded")
                    .css({ width: "300px", height: "300px" })
                    .on("click", function () {
                        showLargeImage(e.target.result);
                    });
                previewContainer.append(imgElement);
            };
            reader.readAsDataURL(file);
        }
    });
});

$("#btn-cancel-edit").on("click", function () {
    $("#edit-data-modal").modal("hide");
});

$(document).on("click", ".remove-image", function () {
    $(this).parent().remove();
});

$(document).on("click", ".edit-thumb", function () {
    let imgSrc = $(this).data("full");
    Swal.fire({
        title: "Preview Gambar",
        imageUrl: imgSrc,
        imageAlt: "Gambar Dokumentasi",
        showCloseButton: true,
    });
});

$("#save-edit").on("click", function () {
    let id = $("#edit-id").val();
    let judul = $("#edit-judul").val();
    let hari = $("#edit-hari").val();

    let remainingImages = [];
    $("#edit-preview-images img").each(function () {
        let src = $(this).attr("src");

        if (src.indexOf("storage/dokumentasi/") !== -1) {
            remainingImages.push(src.replace("storage/dokumentasi/", ""));
        } else {
            remainingImages.push(src);
        }
    });

    let formData = new FormData();
    formData.append("id", id);
    formData.append("judul", judul);
    formData.append("hari", hari);
    formData.append("existing_images", JSON.stringify(remainingImages));
    formData.append("_token", $('meta[name="csrf-token"]').attr("content"));

    let newImages = $("#edit-foto-baru")[0].files;
    for (let i = 0; i < newImages.length; i++) {
        formData.append("foto[]", newImages[i]);
    }

    $.ajax({
        url: "/dokumentasi/update",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.status) {
                Swal.fire({
                    title: "Sukses",
                    text: "Data berhasil diperbarui",
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
            Swal.fire({
                title: "Gagal",
                text: "Terjadi kesalahan saat menyimpan data",
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
                url: "/dokumentasi/delete",
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
