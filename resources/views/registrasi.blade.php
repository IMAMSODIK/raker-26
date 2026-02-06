<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Ditutup</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #ffffff;
            color: #333333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            line-height: 1.6;
        }

        .container {
            max-width: 800px;
            width: 100%;
            text-align: center;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 5px 25px rgba(15, 145, 21, 0.1);
            border: 1px solid rgba(15, 145, 21, 0.15);
        }

        .header {
            margin-bottom: 40px;
        }

        .icon-container {
            width: 120px;
            height: 120px;
            margin: 0 auto 30px;
            background-color: rgba(15, 145, 21, 0.1);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .icon {
            font-size: 60px;
            color: #0F9115;
        }

        h1 {
            color: #0F9115;
            font-size: 2.8rem;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .subtitle {
            font-size: 1.4rem;
            color: #555555;
            margin-bottom: 30px;
        }

        .message {
            background-color: rgba(15, 145, 21, 0.05);
            padding: 25px;
            border-radius: 10px;
            margin-bottom: 35px;
            border-left: 5px solid #0F9115;
            text-align: left;
        }

        .message p {
            margin-bottom: 15px;
            font-size: 1.1rem;
        }

        .message p:last-child {
            margin-bottom: 0;
        }

        .highlight {
            color: #0F9115;
            font-weight: 600;
        }

        .next-steps {
            text-align: left;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
        }

        .next-steps h3 {
            color: #0F9115;
            margin-bottom: 15px;
        }

        .next-steps ul {
            padding-left: 20px;
        }

        .next-steps li {
            margin-bottom: 10px;
        }

        .contact-info {
            margin-top: 40px;
            padding-top: 25px;
            border-top: 1px dashed #ddd;
        }

        .contact-info p {
            color: #666666;
            font-size: 1rem;
        }

        .contact-info a {
            color: #0F9115;
            text-decoration: none;
            font-weight: 600;
        }

        .contact-info a:hover {
            text-decoration: underline;
        }

        .footer {
            margin-top: 40px;
            color: #888888;
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            .container {
                padding: 25px 20px;
            }

            h1 {
                font-size: 2.2rem;
            }

            .icon-container {
                width: 100px;
                height: 100px;
            }

            .icon {
                font-size: 50px;
            }
        }
    </style>
    <style>
        .info-card {
            background-color: white;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.03);
            border: 1px solid #eef2f7;
            transition: all 0.3s ease;
            display: flex;
            align-items: flex-start;
        }

        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            border-color: #c3cfe2;
        }

        .info-card:last-child {
            margin-bottom: 0;
        }

        .info-content {
            flex-grow: 1;
        }

        .info-content h3 {
            color: #1a2980;
            margin-bottom: 8px;
            font-size: 1.3rem;
        }

        .info-content p {
            color: #4a5568;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        /* Tombol WhatsApp */
        .whatsapp-btn {
            display: inline-flex;
            align-items: center;
            background-color: #25D366;
            color: white;
            padding: 12px 25px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(37, 211, 102, 0.3);
        }

        .whatsapp-btn:hover {
            background-color: #128C7E;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(37, 211, 102, 0.4);
        }

        .whatsapp-btn i {
            margin-right: 10px;
            font-size: 1.4rem;
        }

        /* Tombol Lokasi */
        .location-btn {
            display: inline-flex;
            align-items: center;
            background-color: #4285F4;
            color: white;
            padding: 12px 25px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(66, 133, 244, 0.3);
        }

        .location-btn:hover {
            background-color: #3367D6;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(66, 133, 244, 0.4);
        }

        .location-btn i {
            margin-right: 10px;
            font-size: 1.4rem;
        }

        .contact-details {
            background-color: #f0f7ff;
            padding: 15px;
            border-radius: 10px;
            margin-top: 15px;
            border-left: 4px solid #4285F4;
        }

        .contact-details p {
            margin: 8px 0;
            color: #2d3748;
        }

        .highlight {
            color: #1a2980;
            font-weight: 600;
        }

        .hotel-name {
            color: #1a2980;
            font-weight: 700;
            font-size: 1.2rem;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="icon-container">
                <div class="icon">
                    <i class="fas fa-door-closed"></i>
                </div>
            </div>
            <h1>PENDAFTARAN TELAH DITUTUP</h1>
            <div class="subtitle">Mohom maaf periode pendaftaran sudah brakhir</div>
        </div>

        <div class="message">
            <p>Kami mengucapkan terima kasih yang sebesar-besarnya atas minat dan antusiasme Anda untuk bergabung dalam
                acara ini.</p>
            <p>Pendaftaran resmi telah kami tutup pada <span class="highlight">06 Februari 2026 pukul 16:00 WIB</span>
            </p>
        </div>

        <div class="contact-info">
            <div class="info-card">
                <div class="info-content">
                    <h3>Kontak Panitia</h3>
                    <p>Untuk informasi lebih lanjut tentang acara, Anda dapat
                        menghubungi
                        panitia kami:</p>

                    <div class="contact-details">
                        <p><span class="highlight">Nama:</span> Dwi Sandhi Romadhon,
                            S.E,
                            M.Si</p>
                        <p><span class="highlight">Jabatan:</span> Koordinator Acara
                        </p>
                        <p><span class="highlight">No. Telepon:</span> +62 811-6584-545
                        </p>
                    </div>

                    <a href="https://wa.me/628116584545?text=Halo%20Pak%20Dwi%20Sandhi%20Romadhon,%20saya%20ingin%20bertanya%20tentang%20acara%20ini"
                        target="_blank" class="whatsapp-btn">
                        <i class="fab fa-whatsapp"></i> Hubungi via WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
