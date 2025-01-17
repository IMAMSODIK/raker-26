$("#pekerjaan").on('change', function(){
	let val = $("#pekerjaan").val();
  
	if(val === 'lainnya'){
	  $("#namaPekerjaan").css("display", "");
	  $("#ketik-pekerjaan").prop("required", true);
	}else{
	  $("#namaPekerjaan").css("display", "none");
	  $("#ketik-pekerjaan").prop("required", false);
	}
})

function dataURLtoFile(dataURL, filename) {
    var arr = dataURL.split(','),
        mime = arr[0].match(/:(.*?);/)[1],
        bstr = atob(arr[1]),
        n = bstr.length,
        u8arr = new Uint8Array(n);
    while (n--) {
        u8arr[n] = bstr.charCodeAt(n);
    }
    return new File([u8arr], filename, { type: mime });
}

$("#submit_tablig").on("click", function(){
	let button = $(this);
	button.prop('disabled', true);
	let formData = new FormData();

    formData.append("_token", $("meta[name='csrf-token']").attr('content'));
    formData.append("nama", $("#nama").val());
    formData.append("no_wa", $("#no_wa").val());
    formData.append("jenis_kelamin", $('input[name="jenis_kelamin"]:checked').val());
    formData.append('bukti_bayar', $("#bukti_bayar")[0].files[0]);

    $.ajax({
        url: '/tablig',
        method: 'POST',
        processData: false,
        contentType: false, 
        data: formData,
        success: function(response){
            if(response.status){
				button.prop('disabled', false);
				$("#nama").val("")
				$("#no_wa").val("")
				$("#bukti_bayar").val("")

                $(".alert-success").css('display', '');
				$(".alert-danger").css('display', 'none');

				var qrText = "https://runforpalestinamif2024.id/detail?k=tablig&id=" + response.id;
                var qr = new QRious({
                    element: document.getElementById('qrCanvas'),
                    value: qrText,
                    size: 128,
                    background: 'white',
                    foreground: 'black'
                });

                // Setelah QR Code di-generate
                setTimeout(function() {
                    var imageURL = document.getElementById('qrCanvas').toDataURL("image/png");

                    // Mengirim gambar ke Laravel menggunakan AJAX
                    $.ajax({
                        type: "POST",
                        url: "/store-qrcode-tablig",
                        data: {
                            image: imageURL,
                            id: response.id,
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response2) {
                            console.log(response2.data)
                            var raw = JSON.stringify({
                                instance_key: "BuLoiIvsQfSI",
                                jid: response2.data.no_wa,
                                imageUrl:
                                    "https://runforpalestinamif2024.id/storage/qrcodes/" + response2.data.qr_code,
                                caption: `Terima Kasih Sudah Melakukan Pendaftaran, Silahkan Tunjukkan Kartu Undangan Anda Di Lokasi Acara Untuk Melakukan Registrasi dan Mendapatkan Nomor Undian`,
                            });
                            var requestOptions = {
                                method: "POST",
                                body: raw,
                                redirect: "follow",
                                mode: "no-cors",
                            };
                            fetch("https://whatsva.id/api/sendImageUrl", requestOptions);
                            return ;
                        }
                    });
                }, 1000);
            }else{
                $(".alert-success").css('display', 'none');
				$(".alert-danger").css('display', '');
				$("#error-message").text(response.message);
				button.prop('disabled', false);
            }
        },
        error: function(response){
            alertModal(false, response.message);
        }
    })
});

$("#submit").on("click", function(){
	let button = $(this);
	button.prop('disabled', true);
	let formData = new FormData();

    formData.append("_token", $("meta[name='csrf-token']").attr('content'));
    formData.append("nama", $("#nama").val());
    formData.append("no_wa", $("#no_wa").val());
    formData.append("jenis_kelamin", $('input[name="jenis_kelamin"]:checked').val());
    formData.append("ukuran_baju", $("#ukuran_baju").val());
    formData.append("lengan_baju", $('input[name="lengan_baju"]:checked').val());
    formData.append('bukti_bayar', $("#bukti_bayar")[0].files[0]);

    $.ajax({
        url: '/run-for-palestina',
        method: 'POST',
        processData: false,
        contentType: false, 
        data: formData,
        success: function(response){
            if(response.status){
				button.prop('disabled', false);
				$("#nama").val("")
				$("#no_wa").val("")
				$("#ukuran_baju").val("")
				$("#bukti_bayar").val("")

                $(".alert-success").css('display', '');
				$(".alert-danger").css('display', 'none');

                /////

                var qrText = "https://runforpalestinamif2024.id/detail?k=run&id=" + response.id;
                var qr = new QRious({
                    element: document.getElementById('qrCanvas'),
                    value: qrText,
                    size: 128,
                    background: 'white',
                    foreground: 'black'
                });

                // Setelah QR Code di-generate
                setTimeout(function() {
                    var imageURL = document.getElementById('qrCanvas').toDataURL("image/png");

                    // Mengirim gambar ke Laravel menggunakan AJAX
                    $.ajax({
                        type: "POST",
                        url: "/store-qrcode",
                        data: {
                            image: imageURL,
                            id: response.id,
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response2) {
                            var raw = JSON.stringify({
                                instance_key: "BuLoiIvsQfSI",
                                jid: response2.data.no_wa,
                                imageUrl:
                                    "https://runforpalestinamif2024.id/storage/qrcodes/" + response2.data.qr_code,
                                caption: `Terima Kasih Sudah Melakukan Pendaftaran\nNomor Peserta anda adalah ${response2.data.no_peserta}.\nSilahkan melakukan proses registrasi ulang di salah satu lokasi berikut\n1. Jl. Karya Kasih No. 1A, Pangkalan Masyhur, Kec. Medan Johor, Kota Medan\n2. Asrama Putri Sahabat Yatim Jl. Amal No. 40, Kec. Medan Sunggal, Kota Medan\n3. Asrama Sahabat Yatim Medan Aksara Jl. Ampera No. 42, Kel. Bantan, Kec. Medan Tembung, Kota Medan`,
                            });
                            var requestOptions = {
                                method: "POST",
                                body: raw,
                                redirect: "follow",
                                mode: "no-cors",
                            };
                            fetch("https://whatsva.id/api/sendImageUrl", requestOptions);
                            return ;
                        }
                    });
                }, 1000);

        ///

				// var qrcode = new QRCode(document.getElementById("qrcode-2"), {
				// 	text: "https://mif.com/detail?k=run&id=" + response.id,
				// 	width: 128,
				// 	height: 128,
				// 	colorDark : "#000",
				// 	colorLight : "#ffffff",
				// 	correctLevel : QRCode.CorrectLevel.H
				// });

				// var canvas = document.getElementById("qrcode-2").getElementsByTagName("canvas")[0];
        		// var imageURL = canvas.toDataURL("image/png");

                // console.log(imageURL);
            }else{
                $(".alert-success").css('display', 'none');
				$(".alert-danger").css('display', '');
				$("#error-message").text(response.message);
				button.prop('disabled', false);
            }
        },
        error: function(response){
            alertModal(false, response.message);
        }
    })
});